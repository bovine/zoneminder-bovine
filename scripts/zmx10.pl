#!/usr/bin/perl -wT
#
# ==========================================================================
#
# ZoneMinder X10 Control Script, $Date$, $Revision$
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
# This script controls the monitoring of the X10 interface and the consequent
# management of the ZM daemons based on the receipt of X10 signals.
#
use strict;
use bytes;

# ==========================================================================
#
# These are the elements you can edit to suit your installation
#
# ==========================================================================

use constant DBG_LEVEL => 0; # 0 is errors, warnings and info only, > 0 for debug

# ==========================================================================
#
# Don't change anything below here
#
# ==========================================================================

use ZoneMinder;
use POSIX;
use Socket;
use Getopt::Long;
use Data::Dumper;

use constant X10_SOCK_FILE => ZM_PATH_SOCKS.'/zmx10.sock';
use constant X10_LOG_FILE => ZM_PATH_LOGS.'/zmx10.log';

$| = 1;

$ENV{PATH}  = '/bin:/usr/bin';
$ENV{SHELL} = '/bin/sh' if exists $ENV{SHELL};
delete @ENV{qw(IFS CDPATH ENV BASH_ENV)};

sub Usage
{
    print( "
Usage: zmx10.pl -c <command>,--command=<command> [-u <unit code>,--unit-code=<unit code>]
Parameters are :-
-c <command>, --command=<command>       - Command to issue, one of 'on','off','dim','bright','status','shutdown'
-u <unit code>, --unit-code=<unit code> - Unit code to act on required for all commands except 'status' (optional) and 'shutdown'
");
	exit( -1 );
}

my $command;
my $unit_code;

if ( !GetOptions( 'command=s'=>\$command, 'unit-code=i'=>\$unit_code ) )
{
    Usage();
}

die( "No command given" ) unless( $command );
die( "No unit code given" ) unless( $unit_code || ($command =~ /(?:start|status|shutdown)/) );

if ( $command eq "start" )
{
	X10Server::runServer();
	exit();
}

socket( CLIENT, PF_UNIX, SOCK_STREAM, 0 ) or die( "Can't open socket: $!" );

my $saddr = sockaddr_un( X10_SOCK_FILE );

if ( !connect( CLIENT, $saddr ) )
{
	# The server isn't there 
	print( "Unable to connect, starting server\n" );
	close( CLIENT );

	if ( my $cpid = fork() )
	{
		# Parent process just sleep and fall through
		sleep( 2 );
		socket( CLIENT, PF_UNIX, SOCK_STREAM, 0 ) or die( "Can't open socket: $!" );
		connect( CLIENT, $saddr ) or die( "Can't connect: $!" );
	}
	elsif ( defined($cpid) )
	{
		setpgrp();

		X10Server::runServer();
	}
	else
	{
		die( "Can't fork: $!" );
	}
}
# The server is there, connect to it
#print( "Writing commands\n" );
CLIENT->autoflush();
my $message = "$command";
$message .= ";$unit_code" if ( $unit_code );
print( CLIENT $message );
shutdown( CLIENT, 1 );
while ( my $line = <CLIENT> )
{
	chomp( $line );
	print( "$line\n" );
}
close( CLIENT );
#print( "Finished writing, bye\n" );
exit;

#
# ==========================================================================
#
# This is the X10 Server package
#
# ==========================================================================
#
package X10Server;

use strict;
use bytes;

use POSIX;
use DBI;
use Socket;
use X10::ActiveHome;
use Data::Dumper;

our $dbh;
our $x10;

our %monitor_hash;
our %device_hash;
our %pending_tasks;

sub runServer
{
	my $log_file = main::X10_LOG_FILE;
	open( LOG, ">>$log_file" ) or die( "Can't open log file: $!" );
	open( STDOUT, ">&LOG" ) || die( "Can't dup stdout: $!" );
	select( STDOUT ); $| = 1;
	open( STDERR, ">&LOG" ) || die( "Can't dup stderr: $!" );
	select( STDERR ); $| = 1;
	select( LOG ); $| = 1;

	Info( "X10 server starting at ".strftime( '%y/%m/%d %H:%M:%S', localtime() )."\n" );

	socket( SERVER, PF_UNIX, SOCK_STREAM, 0 ) or die( "Can't open socket: $!" );
	unlink( main::X10_SOCK_FILE );
	my $saddr = sockaddr_un( main::X10_SOCK_FILE );
	bind( SERVER, $saddr ) or die( "Can't bind: $!" );
	listen( SERVER, SOMAXCONN ) or die( "Can't listen: $!" );

	$dbh = DBI->connect( "DBI:mysql:database=".main::ZM_DB_NAME.";host=".main::ZM_DB_HOST, main::ZM_DB_USER, main::ZM_DB_PASS );

	$x10 = new X10::ActiveHome( port=>main::ZM_X10_DEVICE, house_code=>main::ZM_X10_HOUSE_CODE, debug=>1 );

	loadTasks();

	$x10->register_listener( \&x10listen );

	my $rin = '';
	vec( $rin, fileno(SERVER),1) = 1;
	vec( $rin, $x10->select_fds(),1) = 1;
	my $timeout = 0.2;
	#print( "F:".fileno(SERVER)."\n" );
	my $reload = undef;
	my $reload_count = 0;
	my $reload_limit = (main::ZM_X10_DB_RELOAD_INTERVAL)/$timeout;
	while( 1 )
	{
		my $nfound = select( my $rout = $rin, undef, undef, $timeout );
		#print( "Off select, NF:$nfound, ER:$!\n" );
		#print( vec( $rout, fileno(SERVER),1)."\n" );
		#print( vec( $rout, $x10->select_fds(),1)."\n" );
		if ( $nfound > 0 )
		{
			if ( vec( $rout, fileno(SERVER),1) )
			{
				my $paddr = accept( CLIENT, SERVER );
				my $message = <CLIENT>;

				my ( $command, $unit_code ) = split( ';', $message );

				my $device;
				if ( defined($unit_code) )
				{
					if ( $unit_code < 1 || $unit_code > 16 )
					{
						dprint( "Error, invalid unit code '$unit_code'\n" );
						next;
					}

					$device = $device_hash{$unit_code};
					if ( !$device )
					{
						$device = $device_hash{$unit_code} = { appliance=>$x10->Appliance( unit_code=>$unit_code ), status=>'unknown' };
					}
				}

				my $result;
				if ( $command eq 'on' )
				{
					$result = $device->{appliance}->on();
				}
				elsif ( $command eq 'off' )
				{
					$result = $device->{appliance}->off();
				}
				#elsif ( $command eq 'dim' )
				#{
					#$result = $device->{appliance}->dim();
				#}
				#elsif ( $command eq 'bright' )
				#{
					#$result = $device->{appliance}->bright();
				#}
				elsif ( $command eq 'status' )
				{
					if ( $device )
					{
						dprint( $unit_code." ".$device->{status}."\n" );
					}
					else
					{
						foreach my $unit_code ( sort( keys(%device_hash) ) )
						{
							my $device = $device_hash{$unit_code};
							dprint( $unit_code." ".$device->{status}."\n" );
						}
					}
				}
				elsif ( $command eq 'shutdown' )
				{
					last;
				}
				else
				{
					dprint( "Error, invalid command '$command'\n" );
				}
				if ( defined($result) )
				{
					if ( 1 || $result )
					{
						$device->{status} = uc($command);
						dprint( $device->{appliance}->address()." $command, ok\n" );
						#x10listen( new X10::Event( sprintf("%s %s", $device->{appliance}->address, uc($command) ) ) );
					}
					else
					{
						dprint( $device->{appliance}->address()." $command, failed\n" );
					}
				}
				close( CLIENT );
			}
			elsif ( vec( $rout, $x10->select_fds(),1) )
			{
				$x10->handle_input();
			}
			else
			{
				die( "Bogus descriptor" );
			}
		}
		elsif ( $nfound < 0 )
		{
			die( "Can't select: $!" );
		}
		else
		{
			#print( "Select timed out\n" );
			# Check for state changes
			foreach my $monitor_id ( sort(keys(%monitor_hash) ) )
			{
				my $monitor = $monitor_hash{$monitor_id};
				my $state;
				if ( !shmread( $monitor->{ShmId}, $state, 8, 4 ) )
				{
					Error( "Can't read from shared memory: $!\n" );
					$reload = !undef;
					next;
				}
				$state = unpack( "l", $state );
				if ( defined( $monitor->{LastState} ) )
				{
					my $task_list;
					if ( $state == 2 && $monitor->{LastState} == 0 ) # Gone into alarm state
					{
						Debug( "Applying ON_list for $monitor_id\n" );
						$task_list = $monitor->{"ON_list"};
					}
					elsif ( $state == 0 && $monitor->{LastState} > 0 ) # Come out of alarm state
					{
						Debug( "Applying OFF_list for $monitor_id\n" );
						$task_list = $monitor->{"OFF_list"};
					}
					if ( $task_list )
					{
						foreach my $task ( @$task_list )
						{
							processTask( $task );
						}
					}
				}
				$monitor->{LastState} = $state;
			}

			# Check for pending tasks
			my $now = time();
			foreach my $activation_time ( sort(keys(%pending_tasks) ) )
			{
				last if ( $activation_time > $now );
				my $pending_list = $pending_tasks{$activation_time};
				foreach my $task ( @$pending_list )
				{
					processTask( $task );
				}
				delete( $pending_tasks{$activation_time} );
			}
			if ( $reload || ++$reload_count >= $reload_limit )
			{
				loadTasks();
				$reload = undef;
				$reload_count = 0;
			}
		}
	}
	Info( "X10 server exiting at ".strftime( '%y/%m/%d %H:%M:%S', localtime() )."\n" );
	close( LOG );
	close( SERVER );
	exit();
}

sub addToDeviceList
{
	my $unit_code = shift;
	my $event = shift;
	my $monitor = shift;
	my $function = shift;
	my $limit = shift;

	Debug( "Adding to device list, uc:$unit_code, ev:$event, mo:$monitor, fu:$function, li:$limit\n" );
	my $device = $device_hash{$unit_code};
	if ( !$device )
	{
		$device = $device_hash{$unit_code} = { appliance=>$x10->Appliance( unit_code=>$unit_code ), status=>'unknown' };
	}

	my $task = { type=>"device", monitor=>$monitor, function=>$function };
	if ( $limit )
	{
		$task->{limit} = $limit
	}

	my $task_list = $device->{$event."_list"};
	if ( !$task_list )
	{
		$task_list = $device->{$event."_list"} = [];
	}
	push( @$task_list, $task );
}

sub addToMonitorList
{
	my $monitor = shift;
	my $event = shift;
	my $unit_code = shift;
	my $function = shift;
	my $limit = shift;

	Debug( "Adding to monitor list, uc:$unit_code, ev:$event, mo:$monitor, fu:$function, li:$limit\n" );
	my $device = $device_hash{$unit_code};
	if ( !$device )
	{
		$device = $device_hash{$unit_code} = { appliance=>$x10->Appliance( unit_code=>$unit_code ), status=>'unknown' };
	}

	my $task = { type=>"monitor", device=>$device, function=>$function };
	if ( $limit )
	{
		$task->{limit} = $limit;
	}

	my $task_list = $monitor->{$event."_list"};
	if ( !$task_list )
	{
		$task_list = $monitor->{$event."_list"} = [];
	}
	push( @$task_list, $task );
}

sub loadTasks
{
	%monitor_hash = ();

	Debug( "Loading tasks\n" );
	# Clear out all old device task lists
	foreach my $unit_code ( sort( keys(%device_hash) ) )
	{
		my $device = $device_hash{$unit_code};
		$device->{ON_list} = [];
		$device->{OFF_list} = [];
	}

	my $sql = "select M.*,T.* from Monitors as M inner join TriggersX10 as T on (M.Id = T.MonitorId) where find_in_set( M.Function, 'Modect,Record,Mocord' ) and M.RunMode = 'Triggered' and find_in_set( 'X10', M.Triggers )";
	my $sth = $dbh->prepare_cached( $sql ) or die( "Can't prepare '$sql': ".$dbh->errstr() );
	my $res = $sth->execute() or die( "Can't execute: ".$sth->errstr() );
	while( my $monitor = $sth->fetchrow_hashref() )
	{
		my $size = 512; # We only need the first 512 bytes really for the alarm state and forced alarm
		$monitor->{ShmKey} = hex(main::ZM_SHM_KEY)|$monitor->{Id};
		$monitor->{ShmId} = shmget( $monitor->{ShmKey}, $size, 0 );
		if ( !defined($monitor->{ShmId}) )
		{
			Error( "Can't get shared memory id '$monitor->{ShmKey}': $!\n" );
			next;
		}

		$monitor_hash{$monitor->{Id}} = $monitor;

		if ( $monitor->{Activation} )
		{
			Debug( "$monitor->{Name} has active string '$monitor->{Activation}'\n" );
			foreach my $code_string ( split( ',', $monitor->{Activation} ) )
			{
				#Debug( "Code string: $code_string\n" );
				my ( $invert, $unit_code, $modifier, $limit ) = ( $code_string =~ /^([!~])?(\d+)(?:([+-])(\d+)?)?$/ );
				$limit = 0 if ( !$limit );
				if ( $unit_code )
				{
					if ( !$modifier || $modifier eq '+' )
					{
						addToDeviceList( $unit_code, "ON", $monitor, !$invert?"start_active":"stop_active", $limit );
					}
					if ( !$modifier || $modifier eq '-' )
					{
						addToDeviceList( $unit_code, "OFF", $monitor, !$invert?"stop_active":"start_active", $limit );
					}
				}
			}
		}
		if ( $monitor->{AlarmInput} )
		{
			Debug( "$monitor->{Name} has alarm input string '$monitor->{AlarmInput}'\n" );
			foreach my $code_string ( split( ',', $monitor->{AlarmInput} ) )
			{
				#Debug( "Code string: $code_string\n" );
				my ( $invert, $unit_code, $modifier, $limit ) = ( $code_string =~ /^([!~])?(\d+)(?:([+-])(\d+)?)?$/ );
				$limit = 0 if ( !$limit );
				if ( $unit_code )
				{
					if ( !$modifier || $modifier eq '+' )
					{
						addToDeviceList( $unit_code, "ON", $monitor, !$invert?"start_alarm":"stop_alarm", $limit );
					}
					if ( !$modifier || $modifier eq '-' )
					{
						addToDeviceList( $unit_code, "OFF", $monitor, !$invert?"stop_alarm":"start_alarm", $limit );
					}
				}
			}
		}
		if ( $monitor->{AlarmOutput} )
		{
			Debug( "$monitor->{Name} has alarm output string '$monitor->{AlarmOutput}'\n" );
			foreach my $code_string ( split( ',', $monitor->{AlarmOutput} ) )
			{
				#Debug( "Code string: $code_string\n" );
				my ( $invert, $unit_code, $modifier, $limit ) = ( $code_string =~ /^([!~])?(\d+)(?:([+-])(\d+)?)?$/ );
				$limit = 0 if ( !$limit );
				if ( $unit_code )
				{
					if ( !$modifier || $modifier eq '+' )
					{
						addToMonitorList( $monitor, "ON", $unit_code, !$invert?"on":"off", $limit );
					}
					if ( !$modifier || $modifier eq '-' )
					{
						addToMonitorList( $monitor, "OFF", $unit_code, !$invert?"off":"on", $limit );
					}
				}
			}
		}
	}
}

sub addPendingTask
{
	my $task = shift;

	# Check whether we are just extending a previous pending task
	# and remove it if it's there
	foreach my $activation_time ( sort(keys(%pending_tasks) ) )
	{
		my $pending_list = $pending_tasks{$activation_time};
		my $new_pending_list = [];
		foreach my $pending_task ( @$pending_list )
		{
			if ( $task->{type} ne $pending_task->{type} )
			{
				push( @$new_pending_list, $pending_task )
			}
			elsif ( $task->{type} eq "device" )
			{
				if (( $task->{monitor}->{Id} != $pending_task->{monitor}->{Id} )
				|| ( $task->{function} ne $pending_task->{function} ))
				{
					push( @$new_pending_list, $pending_task )
				}
			}
			elsif ( $task->{type} eq "monitor" )
			{
				if (( $task->{device}->{appliance}->unit_code() != $pending_task->{device}->{appliance}->unit_code() )
				|| ( $task->{function} ne $pending_task->{function} ))
				{
					push( @$new_pending_list, $pending_task )
				}
			}
		}
		if ( @$new_pending_list )
		{
			$pending_tasks{$activation_time} = $new_pending_list;
		}
		else
		{
			delete( $pending_tasks{$activation_time} );
		}
	}

	my $end_time = time() + $task->{limit};
	my $pending_list = $pending_tasks{$end_time};
	if ( !$pending_list )
	{
		$pending_list = $pending_tasks{$end_time} = [];
	}
	my $pending_task;
	if ( $task->{type} eq "device" )
	{
		$pending_task = { type=>$task->{type}, monitor=>$task->{monitor}, function=>$task->{function} };
		$pending_task->{function} =~ s/start/stop/;
	}
	elsif ( $task->{type} eq "monitor" )
	{
		$pending_task = { type=>$task->{type}, device=>$task->{device}, function=>$task->{function} };
		$pending_task->{function} =~ s/on/off/;
	}
	push( @$pending_list, $pending_task );
}

sub processTask
{
	my $task = shift;

	if ( $task->{type} eq "device" )
	{
		my ( $instruction, $class ) = ( $task->{function} =~ /^(.+)_(.+)$/ );

		my @commands;
		if ( $class eq "active" )
		{
			if ( $instruction eq "start" )
			{
				push( @commands, main::ZM_PATH_BIN."/zmdc.pl start zma -m ".$task->{monitor}->{Id} );
				push( @commands, main::ZM_PATH_BIN."/zmdc.pl start zmf -m ".$task->{monitor}->{Id} );
				if ( main::ZM_OPT_FRAME_SERVER )
				{
				}
				if ( $task->{limit} )
				{
					addPendingTask( $task );
				}
			}
			elsif( $instruction eq "stop" )
			{
				$command = main::ZM_PATH_BIN."/zmdc.pl stop zma -m ".$task->{monitor}->{Id};
				push( @commands, main::ZM_PATH_BIN."/zmdc.pl stop zma -m ".$task->{monitor}->{Id} );
				push( @commands, main::ZM_PATH_BIN."/zmdc.pl stop zmf -m ".$task->{monitor}->{Id} );
			}
		}
		elsif( $class eq "alarm" )
		{
			if ( $instruction eq "start" )
			{
				#$command = main::ZM_PATH_BIN."/zmu --monitor ".$task->{monitor}->{Id}." --alarm";
				my $force_data = pack( "llZ*", 1, 0, "X10" );
				if ( !shmwrite( $task->{monitor}->{ShmId}, $force_data, 52, 12 ) )
				{
					Error( "Can't write to shared memory: $!\n" );
				}
				if ( $task->{limit} )
				{
					addPendingTask( $task );
				}
			}
			elsif( $instruction eq "stop" )
			{
				#$command = main::ZM_PATH_BIN."/zmu --monitor ".$task->{monitor}->{Id}." --cancel";
				my $force_data = pack( "llZ*", 0, 0, "" );
				if ( !shmwrite( $task->{monitor}->{ShmId}, $force_data, 52, 12 ) )
				{
					Error( "Can't write to shared memory: $!\n" );
				}
			}
		}
		foreach my $command ( @commands )
		{
			Info( "Executing command '$command'\n" );
			qx( $command );
		}
	}
	elsif( $task->{type} eq "monitor" )
	{
		if ( $task->{function} eq "on" )
		{
			$task->{device}->{appliance}->on();
			if ( $task->{limit} )
			{
				addPendingTask( $task );
			}
		}
		elsif ( $task->{function} eq "off" )
		{
			$task->{device}->{appliance}->off();
		}
	}
}

sub dprint
{
	if ( fileno(CLIENT) )
	{
		print CLIENT @_
	}
	Info( @_ );
}

sub x10listen
{
	foreach my $event ( @_ )
	{
		#print( Data::Dumper( $_ )."\n" );
		if ( $event->house_code() eq main::ZM_X10_HOUSE_CODE )
		{
			my $unit_code = $event->unit_code();
			my $device = $device_hash{$unit_code};
			if ( !$device )
			{
				$device = $device_hash{$unit_code} = { appliance=>$x10->Appliance( unit_code=>$unit_code ), status=>'unknown' };
			}
			next if ( $event->func() !~ /(?:ON|OFF)/ );
			$device->{status} = $event->func();
			my $task_list = $device->{$event->func()."_list"};
			if ( $task_list )
			{
				foreach my $task ( @$task_list )
				{
					processTask( $task );
				}
			}
		}
		Info( strftime( "%y/%m/%d %H:%M:%S", localtime() )." - ".$event->as_string()."\n" );
	}
}

1;
