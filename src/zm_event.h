//
// ZoneMinder Core Interfaces, $Date$, $Revision$
// Copyright (C) 2003  Philip Coombes
// 
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
// 

#ifndef ZM_EVENT_H
#define ZM_EVENT_H

#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <errno.h>
#include <limits.h>
#include <time.h>
#include <sys/time.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <mysql/mysql.h>

#include "zm.h"
#include "zm_image.h"

class Monitor;

#define MAX_PRE_ALARM_FRAMES	16 // Maximum number of prealarm frames that can be stored

//
// Class describing events, i.e. captured periods of activity.
//
class Event
{
protected:
	static bool		initialised;
	static bool		timestamp_on_capture;
	static int		bulk_frame_interval;
	static char		capture_file_format[PATH_MAX];
	static char		analyse_file_format[PATH_MAX];
	static char		general_file_format[PATH_MAX];

protected:
	static int		sd;

protected:
	struct PreAlarmData
	{
		Image *image;
		struct timeval timestamp;
		unsigned int score;
		Image *alarm_frame;
	};

	static int pre_alarm_count;
	static PreAlarmData pre_alarm_data[MAX_PRE_ALARM_FRAMES];

protected:
	int				id;
	Monitor			*monitor;
	struct timeval	start_time;
	struct timeval	end_time;
	int				frames;
	int				alarm_frames;
	unsigned int	tot_score;
	unsigned int	max_score;
	char			path[PATH_MAX];

protected:
	int				last_db_frame;

protected:
	static void Initialise()
	{
		initialised = true;

		timestamp_on_capture = (bool)config.Item( ZM_TIMESTAMP_ON_CAPTURE );
		bulk_frame_interval = (int)config.Item( ZM_BULK_FRAME_INTERVAL );
		snprintf( capture_file_format, sizeof(capture_file_format), "%%s/%%0%dd-capture.jpg", (int)config.Item( ZM_EVENT_IMAGE_DIGITS ) );
		snprintf( analyse_file_format, sizeof(analyse_file_format), "%%s/%%0%dd-analyse.jpg", (int)config.Item( ZM_EVENT_IMAGE_DIGITS ) );
		snprintf( general_file_format, sizeof(general_file_format), "%%s/%%0%dd-%%s.jpg", (int)config.Item( ZM_EVENT_IMAGE_DIGITS ) );
	}

public:
	static bool OpenFrameSocket( int );
	static bool ValidateFrameSocket( int );

public:
	Event( Monitor *p_monitor, struct timeval p_start_time, const char *event_cause, const char *event_text="" );
	~Event();

	int Id() const { return( id ); }
	int Frames() const { return( frames ); }
	int AlarmFrames() const { return( alarm_frames ); }

	const struct timeval &StartTime() const { return( start_time ); }
	const struct timeval &EndTime() const { return( end_time ); }
	struct timeval &EndTime() { return( end_time ); }

	bool SendFrameImage( const Image *image, bool alarm_frame=false );
	bool WriteFrameImage( Image *image, struct timeval timestamp, const char *event_file, bool alarm_frame=false );

	void AddFrames( int n_frames, Image **images, struct timeval **timestamps );
	void AddFrame( Image *image, struct timeval timestamp, int score=0, Image *alarm_frame=NULL );

	static void StreamEvent( int event_id, int scale=100, int rate=100, int maxfps=10 );
#if HAVE_LIBAVCODEC
	static void StreamMpeg( int event_id, const char *format, int scale=100, int rate=100, int maxfps=10, int bitrate=100000 );
#endif // HAVE_LIBAVCODEC

public:
	static int PreAlarmCount()
	{
		return( pre_alarm_count );
	}
	static void EmptyPreAlarmFrames()
	{
		if ( pre_alarm_count > 0 )
		{
			for ( int i = 0; i < MAX_PRE_ALARM_FRAMES; i++ )
			{
				delete pre_alarm_data[i].image;
				delete pre_alarm_data[i].alarm_frame;
			}
			memset( pre_alarm_data, 0, sizeof(pre_alarm_data) );
		}
		pre_alarm_count = 0;
	}
	static void AddPreAlarmFrame( Image *image, struct timeval timestamp, int score=0, Image *alarm_frame=NULL )
	{
		pre_alarm_data[pre_alarm_count].image = new Image( *image );
		pre_alarm_data[pre_alarm_count].timestamp = timestamp;
		pre_alarm_data[pre_alarm_count].score = score;
		if ( alarm_frame )
		{
			pre_alarm_data[pre_alarm_count].alarm_frame = new Image( *alarm_frame );
		}
		pre_alarm_count++;
	}
	void SavePreAlarmFrames()
	{
		for ( int i = 0; i < pre_alarm_count; i++ )
		{
			AddFrame( pre_alarm_data[i].image, pre_alarm_data[i].timestamp, pre_alarm_data[i].score, pre_alarm_data[i].alarm_frame );
		}
		EmptyPreAlarmFrames();
	}

};

#endif // ZM_EVENT_H
