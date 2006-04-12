#!/usr/bin/perl -wT
#
# ==========================================================================
#
# ZoneMinder WatchDog Script, $Date$, $Revision$
# Copyright (C) 2003, 2004, 2005, 2006  Philip Coombes
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
# This does some basic setup for ZoneMinder to run and then periodically
# checks the fps output of the active daemons to check they haven't 
# locked up. If they have then they are killed and restarted
#
use strict;
use bytes;

# ==========================================================================
#
# These are the elements you can edit to suit your installation
#
# ==========================================================================

use constant DBG_ID => "zmwatch"; # Tag that appears in debug to identify source
use constant DBG_LEVEL => 0; # 0 is errors, warnings and info only, > 0 for debug

use constant START_DELAY => 30; # To give everything else time to start

# ==========================================================================
#
# Don't change anything below here
#
# ==========================================================================

use ZoneMinder;
use POSIX;
use DBI;
use Data::Dumper;

$| = 1;

$ENV{PATH}  = '/bin:/usr/bin';
$ENV{SHELL} = '/bin/sh' if exists $ENV{SHELL};
delete @ENV{qw(IFS CDPATH ENV BASH_ENV)};

sub Usage
{
    print( "
Usage: zmwatch.pl
");
	exit( -1 );
}

zmDbgInit( DBG_ID, level=>DBG_LEVEL );

Info( "Watchdog starting\n" );
Info( "Watchdog pausing for ".START_DELAY." seconds\n" );
sleep( START_DELAY );

my $dbh = DBI->connect( "DBI:mysql:database=".ZM_DB_NAME.";host=".ZM_DB_HOST, ZM_DB_USER, ZM_DB_PASS );

my $sql = "select * from Monitors";
my $sth = $dbh->prepare_cached( $sql ) or die( "Can't prepare '$sql': ".$dbh->errstr() );

while( 1 )
{
	my $now = time();
	my $res = $sth->execute() or die( "Can't execute: ".$sth->errstr() );
	while( my $monitor = $sth->fetchrow_hashref() )
	{
		if ( $monitor->{Function} ne 'None' )
		{
			if ( zmShmVerify( $monitor ) && zmShmRead( $monitor, "shared_data:valid" ) )
			{
				# Check we have got an image recently
				my $image_time = zmGetLastImageTime( $monitor );
				next if ( !defined($image_time) ); # Can't read from shared memory
				next if ( !$image_time ); # We can't get the last capture time so can't be sure it's died.

				my $max_image_delay = ($monitor->{MaxFPS}&&($monitor->{MaxFPS}<1))?(3/$monitor->{MaxFPS}):ZM_WATCH_MAX_DELAY;
				my $image_delay = $now-$image_time;
				Debug( "Monitor $monitor->{Id} last captured $image_delay seconds ago, max is $max_image_delay\n" );
				if ( $image_delay <= $max_image_delay )
				{
					# Yes, so continue
					next;
				}
				Info( "Restarting capture daemon for ".$monitor->{Name}.", time since last capture $image_delay seconds ($now-$image_time)\n" );
			}
			else
			{
				Info( "Restarting capture daemon for ".$monitor->{Name}.", shared memory not valid\n" );
			}

			my $command;
			# If we are here then something bad has happened
			if ( $monitor->{Type} eq 'Local' )
			{
				$command = ZM_PATH_BIN."/zmdc.pl restart zmc -d $monitor->{Device}";
			}
			else
			{
				$command = ZM_PATH_BIN."/zmdc.pl restart zmc -m $monitor->{Id}";
			}
			Info( qx( $command ) );
		}
	}
	sleep( ZM_WATCH_CHECK_INTERVAL );
}
Info( "Watchdog exiting\n" );
exit();
