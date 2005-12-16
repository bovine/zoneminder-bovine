#!/usr/bin/perl -wT
#
# ==========================================================================
#
# ZoneMinder External Trigger Script, $Date$, $Revision$
# Copyright (C) 2003, 2004, 2005  Philip Coombes
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
# ==========================================================================
#
# This script is used to trigger and cancel alarms from external sources
# using an arbitrary text based format
#
use strict;
use bytes;

# ==========================================================================
#
# User config
#
# ==========================================================================

use constant LOG_FILE => ZM_PATH_LOGS.'/zmtrigger.log';
use constant MAX_CONNECT_DELAY => 10;
use constant VERBOSE => 0; # Whether to output more verbose debug

# Now define the trigger sources, can be inet socket, unix socket or file based
# Ignore parser field for now.

my @sources = (
	{ name=>"S1", type=>"inet", port=>"6802", parser=>"", },
	{ name=>"S2", type=>"unix", path=>"/tmp/test.sock", parser=>"", },
	{ name=>"S3", type=>"file", path=>"/dev/ttyS0", parser=>"", },
);

# Need to make sure each parser function is defined
sub parseTrigger1
{
}

# ==========================================================================
#
# Don't change anything from here on down
#
# ==========================================================================

use ZoneMinder;
use DBI;
use POSIX;
use Fcntl;
use Socket;
use IO::Handle;
use Data::Dumper;

$| = 1;

$ENV{PATH}  = '/bin:/usr/bin';
$ENV{SHELL} = '/bin/sh' if exists $ENV{SHELL};
delete @ENV{qw(IFS CDPATH ENV BASH_ENV)};

open( LOG, ">>".LOG_FILE ) or die( "Can't open log file: $!" );
open(STDOUT, ">&LOG") || die( "Can't dup stdout: $!" );
select( STDOUT ); $| = 1;
open(STDERR, ">&LOG") || die( "Can't dup stderr: $!" );
select( STDERR ); $| = 1;
select( LOG ); $| = 1;

print( "Trigger daemon starting at ".strftime( '%y/%m/%d %H:%M:%S', localtime() )."\n" );

my $dbh = DBI->connect( "DBI:mysql:database=".ZM_DB_NAME.";host=".ZM_DB_SERVER, ZM_DB_USER, ZM_DB_PASS );

my $sql = "select * from Monitors where Id = ? or Name = ?";
my $sth = $dbh->prepare_cached( $sql ) or die( "Can't prepare '$sql': ".$dbh->errstr() );

$SIG{HUP} = \&status;

my $base_rin = '';
foreach my $source ( @sources )
{
	print( "Opening source '$source->{name}'\n" );
	if ( $source->{type} eq "inet" )
	{
		local *sfh;
		my $saddr = sockaddr_in( $source->{port}, INADDR_ANY );
		socket( *sfh, PF_INET, SOCK_STREAM, getprotobyname('tcp') ) or die( "Can't open socket: $!" );
		setsockopt( *sfh, SOL_SOCKET, SO_REUSEADDR, 1 );
		bind( *sfh, $saddr ) or die( "Can't bind: $!" );
		listen( *sfh, SOMAXCONN ) or die( "Can't listen: $!" );
		$source->{handle} = *sfh;
		vec( $base_rin, fileno($source->{handle}),1) = 1;
	}
	elsif ( $source->{type} eq "unix" )
	{
		local *sfh;
		unlink( $source->{path} );
		my $saddr = sockaddr_un( $source->{path} );
		socket( *sfh, PF_UNIX, SOCK_STREAM, 0 ) or die( "Can't open socket: $!" );
		bind( *sfh, $saddr ) or die( "Can't bind: $!" );
		listen( *sfh, SOMAXCONN ) or die( "Can't listen: $!" );
		$source->{handle} = *sfh;
		vec( $base_rin, fileno($source->{handle}),1) = 1;
	}
	elsif ( $source->{type} eq "file" )
	{
		local *sfh;
		#sysopen( *sfh, $source->{path}, O_NONBLOCK|O_RDONLY ) or die( "Can't sysopen: $!" );
		#open( *sfh, "<".$source->{path} ) or die( "Can't open: $!" );
		open( *sfh, "+<".$source->{path} ) or die( "Can't open: $!" );
		$source->{handle} = *sfh;
		vec( $base_rin, fileno($source->{handle}),1) = 1;
	}
	else
	{
		die( "Bogus source type '$source->{type}' found for '$source->{name}'" );
	}
}

my $sigset = POSIX::SigSet->new;
my $blockset = POSIX::SigSet->new( SIGCHLD );
sigprocmask( SIG_BLOCK, $blockset, $sigset ) or die( "Can't block SIGCHLD: $!" );

my %connections;

$! = undef;
my $rin = '';
my $win = $rin;
my $ein = $win;
my $timeout = 1;
my %actions;
while( 1 )
{
	$rin = $base_rin;
	foreach my $fileno ( keys(%connections) )
	{
		vec( $rin, $fileno,1) = 1;
	}
	my $nfound = select( my $rout = $rin, undef, my $eout = $ein, $timeout );
	if ( $nfound > 0 )
	{
		print( "Got input from $nfound sources\n" ) if ( VERBOSE );
		foreach my $source ( @sources )
		{
			if ( vec( $rout, fileno($source->{handle}),1) )
			{
				print( "Got input from source $source->{name} (".fileno($source->{handle}).")\n" ) if ( VERBOSE );
				if ( $source->{type} eq "inet" || $source->{type} eq "unix" )
				{
					local *cfh;
					my $paddr = accept( *cfh, $source->{handle} );
					$connections{fileno(*cfh)} = { source=>$source, handle=>*cfh };
					print( "Added new connection (".fileno(*cfh)."), ".int(keys(%connections))." connections\n" ) if ( VERBOSE );
				}
				else
				{
					my $buffer;
					my $nbytes = sysread( $source->{handle}, $buffer, POSIX::BUFSIZ );
					if ( !$nbytes )
					{
						die( "Got unexpected close on source $source->{name}" );
					}
					else
					{
						print( "Got '$buffer' ($nbytes bytes)\n" ) if ( VERBOSE );
						handleMessage( $buffer );
					}
				}
			}
		}
		foreach my $connection ( values(%connections) )
		{
			print( "Got input from connection on ".$connection->{source}->{name}." (".fileno($connection->{handle}).")\n" ) if ( VERBOSE );
			if ( vec( $rout, fileno($connection->{handle}),1) )
			{
				my $buffer;
				my $nbytes = sysread( $connection->{handle}, $buffer, POSIX::BUFSIZ );
				if ( !$nbytes )
				{
					delete( $connections{fileno($connection->{handle})} );
					print( "Removed connection (".fileno($connection->{handle})."), ".int(keys(%connections))." connections\n" ) if ( VERBOSE );
					close( $connection->{handle} );
				}
				else
				{
					print( "Got '$buffer' ($nbytes bytes)\n" ) if ( VERBOSE );
					handleMessage( $buffer );
				}
			}
		}
	}
	elsif ( $nfound < 0 )
	{
		if ( $! == EINTR )
		{
			# Dead child, will be reaped
			#print( "Probable dead child\n" );
		}
		else
		{
			die( "Can't select: $!" );
		}
	}
	else
	{
		print( "Checking for timed actions at ".time()."\n" ) if ( VERBOSE && int(keys(%actions)) );
		my $now = time();
		foreach my $action_time ( sort( grep { $_ < $now } keys( %actions ) ) )
		{
			print( "Found actions expiring at $action_time\n" );
			foreach my $action ( @{$actions{$action_time}} )
			{
				print( "Found action '$action'\n" );
				handleMessage( $action );
			}
			delete( $actions{$action_time} );
		}
	}
}
print( "Trigger daemon exiting\n" );

sub handleMessage
{
	my $buffer = shift;
	#chomp( $buffer );

	print( "Processing buffer '$buffer'\n" ) if ( VERBOSE );
	foreach my $message ( split( /\r?\n/, $buffer ) )
	{
		next if ( !$message );
		print( "Processing message '$message'\n" ) if ( VERBOSE );
		my ( $id, $action, $score, $cause, $text, $showtext ) = split( /\|/, $message );
		$score = 0 if ( !defined($score) );
		$cause = 0 if ( !defined($cause) );
		$text = 0 if ( !defined($text) );

		my $res = $sth->execute( $id, $id ) or die( "Can't execute '$sql': ".$sth->errstr() );
		my $monitor = $sth->fetchrow_hashref();

		if ( !$monitor )
		{
			print( "Can't find monitor '$id' for message '$message'\n" );
			next;
		}
		print( "Found monitor for id '$id'\n" ) if ( VERBOSE );
		my $size = 512; # We only need the first 512 bytes really for the shared data and trigger section
		$monitor->{ShmKey} = hex(ZM_SHM_KEY)|$monitor->{Id};
		$monitor->{ShmId} = shmget( $monitor->{ShmKey}, $size, 0 );
		if ( !defined($monitor->{ShmId}) )
		{
			printf( "Can't get shared memory id '%x': $!\n", $monitor->{ShmKey}, $! );
			next;
		}

		my $shm_data_size;
		if ( !shmread( $monitor->{ShmId}, $shm_data_size, 0, 4 ) )
		{
			print( "Can't read from shared memory: $!\n" );
			exit( -1 );
		}
		$shm_data_size = unpack( "l", $shm_data_size );
		my $trigger_data_offset = $shm_data_size+4; # Allow for 'size' member of trigger data

		print( "Handling action '$action'\n" ) if ( VERBOSE );
		if ( $action =~ /^(on|off)(?:\+(\d+))?$/ )
		{
			my $trigger = $1;
			my $delay = $2;
			my $trigger_data;
			if ( defined($showtext) )
			{
				$trigger_data = pack( "llZ32Z256Z32", $trigger eq "on"?1:2, $trigger eq "on"?$score:0, $cause, $text, $showtext );
			}
			else
			{
				$trigger_data = pack( "llZ32Z256", $trigger eq "on"?1:2, $trigger eq "on"?$score:0, $cause, $text );
			}
			if ( !shmwrite( $monitor->{ShmId}, $trigger_data, $trigger_data_offset, length($trigger_data) ) )
			{
				print( "Can't write to shared memory: $!\n" );
			}
			print( "Triggered event $trigger '$cause'\n" );
			if ( $delay )
			{
				my $action_time = time()+$delay;
				my $action_text = $id."|cancel|0|".$cause."|".$text;
				my $action_array = $actions{$action_time};
				if ( !$action_array )
				{
					$action_array = $actions{$action_time} = [];
				}
				push( @$action_array, $action_text );
				print( "Added timed event '$action_text', expires at $action_time (+$delay secs)\n" ) if ( VERBOSE );
			}
		}
		elsif( $action eq "cancel" )
		{
			my $trigger_data;
			if ( defined($showtext) )
			{
				$trigger_data = pack( "llZ32Z256Z32", 0, 0, "", "", $showtext );
			}
			else
			{
				$trigger_data = pack( "llZ32Z256", 0, 0, "", "" );
			}
			if ( !shmwrite( $monitor->{ShmId}, $trigger_data, $trigger_data_offset, length($trigger_data) ) )
			{
				print( "Can't write to shared memory: $!\n" );
			}
			print( "Cancelled event '$cause'\n" );
		}
		elsif( $action eq "show" )
		{
			my $trigger_data = pack( "Z32", $showtext );
			if ( !shmwrite( $monitor->{ShmId}, $trigger_data, $trigger_data_offset, length($trigger_data) ) )
			{
				print( "Can't write to shared memory: $!\n" );
			}
			print( "Updated show text to '$showtext'\n" );
		}
		else
		{
			print( "Unrecognised action '$action' in message '$message'\n" );
		}
	}
}
