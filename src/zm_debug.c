//
// ZoneMinder Debug Implementation, $Date$, $Revision$
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

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <time.h>
#include <sys/time.h>
#include <syslog.h>
#include <signal.h>
#include <stdarg.h>
#include <errno.h>

#include "zm_debug.h"

static char zm_temp_dbg_string[4096];
static char zm_dbg_string[4096+512];
static const char *zm_dbg_file;
static int zm_dbg_line;
static int zm_dbg_code;
static char zm_dbg_class[4];
const char *zm_dbg_name = "";
int zm_dbg_pid = -1;
static int zm_dbg_switched_on = FALSE;

int zm_dbg_level = 0;
char zm_dbg_log[128] = "";
FILE *zm_dbg_log_fd = (FILE *)NULL;
int zm_dbg_print = FALSE;
int zm_dbg_flush = FALSE;
int zm_dbg_runtime = FALSE;
int zm_dbg_add_log_id = FALSE;
struct timeval zm_dbg_start;

static int zm_dbg_running = FALSE;

void zmUsrHandler( int sig )
{
	if( sig == SIGUSR1)
	{
		zm_dbg_switched_on = TRUE;
		if ( zm_dbg_level < 9 )
		{
			zm_dbg_level++;
		}
	}
	else if ( sig == SIGUSR2 )
	{
		if( zm_dbg_level > -3 )
		{
			zm_dbg_level--;
		}
	}
	Info(( "Debug Level Changed to %d", zm_dbg_level ));
}

int zmGetDebugEnv( const char * const command )
{
	char buffer[128];
	char *env_ptr;

	/* zm_dbg_level = 0; */
	/* zm_dbg_log[0] = '\0'; */

	env_ptr = getenv( "ZM_DBG_PRINT" );
	if ( env_ptr == (char *)NULL )
	{
		zm_dbg_print = FALSE;
	}
	else
	{
		zm_dbg_print = atoi( env_ptr );
	}

	env_ptr = getenv( "ZM_DBG_FLUSH" );
	if ( env_ptr == (char *)NULL )
	{
		zm_dbg_flush = FALSE;
	}
	else
	{
		zm_dbg_flush = atoi( env_ptr );
	}

	env_ptr = getenv( "ZM_DBG_RUNTIME" );
	if ( env_ptr == (char *)NULL )
	{
		zm_dbg_runtime = FALSE;
	}
	else
	{
		zm_dbg_runtime = atoi( env_ptr );
	}

	sprintf(buffer,"ZM_DBG_LEVEL_%s",command);
	env_ptr = getenv(buffer);
	if( env_ptr != (char *)NULL )
	{
		zm_dbg_level = atoi(env_ptr);
	}
	sprintf( buffer, "ZM_DBG_LOG_%s", command );
	env_ptr = getenv( buffer );
	if ( env_ptr != (char *)NULL )
	{
		/* If we do not want to add a pid to the debug logs
		 * which is the default, and original method
		 */
		if ( env_ptr[strlen(env_ptr)-1] == '+' )
		{
			/* remove the + character from the string */
			env_ptr[strlen(env_ptr)-1] = '\0';
			zm_dbg_add_log_id = TRUE;
		}
		if ( zm_dbg_add_log_id == FALSE )
		{
			strcpy( zm_dbg_log, env_ptr );
		}
		else
		{
			sprintf( zm_dbg_log, "%s.%05d", env_ptr, getpid() );
		}
	}

	return(0);
}

int zmDebugInitialise()
{
	FILE *tmp_fp;

	int status;

	struct timezone tzp;

	gettimeofday( &zm_dbg_start, &tzp );

	Debug(1,("Initialising Debug"));

	/* Now set up the syslog stuff */
	(void) openlog( zm_dbg_name, LOG_PID|LOG_NDELAY, LOG_LOCAL1 );

	zm_temp_dbg_string[0] = '\0';
	zm_dbg_class[0] = '\0';

	zm_dbg_pid = getpid();
	zm_dbg_log_fd = (FILE *)NULL;
	if( (status = zmGetDebugEnv(zm_dbg_name) ) < 0)
	{
		Error(("Debug Environment Error, status = %d",status));
		return(ZM_DBG_ERROR);
	}

	if ( ( zm_dbg_add_log_id == FALSE && zm_dbg_log[0] ) && ( zm_dbg_log[strlen(zm_dbg_log)-1] == '~' ) )
	{
		zm_dbg_log[strlen(zm_dbg_log)-1] = '\0';

		if ( (tmp_fp = fopen(zm_dbg_log, "r")) != NULL )
		{
			char old_pth[256];
			
			sprintf(old_pth, "%s.old", zm_dbg_log);
			rename(zm_dbg_log, old_pth);
			fclose(tmp_fp);		/* should maybe fclose() before rename() ? */
		}
	}

	if( zm_dbg_log[0] && (zm_dbg_log_fd = fopen(zm_dbg_log,"w")) == (FILE *)NULL )
	{
	    Error(("fopen() for %s, error = %s",zm_dbg_log,strerror(errno)));
		return(ZM_DBG_ERROR);
	}
	Info(("Debug Level = %d, Debug Log = %s",zm_dbg_level,zm_dbg_log));

	{
	struct sigaction action, old_action;
	action.sa_handler = zmUsrHandler;
	action.sa_flags = SA_RESTART;

	if ( sigaction( SIGUSR1, &action, &old_action ) < 0 )
	{
		Error(("sigaction(), error = %s",strerror(errno)));
		return(ZM_DBG_ERROR);
	}
	if ( sigaction( SIGUSR2, &action, &old_action ) < 0)
	{
		Error(("sigaction(), error = %s",strerror(errno)));
		return(ZM_DBG_ERROR);
	}
	}
	zm_dbg_running = TRUE;
	return(ZM_DBG_OK);
}

int zmDbgInit()
{
	return((zmDebugInitialise() == ZM_DBG_OK ? 0 : 1));
}

int zmDebugTerminate()
{
	Debug(1,("Terminating Debug"));
	fflush(zm_dbg_log_fd);
	if((fclose(zm_dbg_log_fd)) == -1)
	{
		Error(("fclose(), error = %s",strerror(errno)));
		return(ZM_DBG_ERROR);
	}
	zm_dbg_log_fd = (FILE *)NULL;
	(void) closelog();

	zm_dbg_running = FALSE;
	return(ZM_DBG_OK);
}

int zmDbgTerm()
{
	return((zmDebugTerminate() == ZM_DBG_OK ? 0 : 1));
}

void zmDbgSubtractTime( struct timeval * const tp1, struct timeval * const tp2 )
{
	tp1->tv_sec -= tp2->tv_sec;
	if ( tp1->tv_usec <= tp2->tv_usec )
	{
		tp1->tv_sec--;
		tp1->tv_usec = 1000000 - (tp2->tv_usec - tp1->tv_usec);
	}
	else
	{
		tp1->tv_usec = tp1->tv_usec - tp2->tv_usec;
	}
}

int zmDbgPrepare( const char * const file, const int line, const int code )
{
	zm_dbg_file = file;
	zm_dbg_line = line;
	zm_dbg_code = code;
	switch(code)
	{
	case ZM_DBG_INF:
		strcpy(zm_dbg_class,"INF");
		break;
	case ZM_DBG_WAR:
		strcpy(zm_dbg_class,"WAR");
		break;
	case ZM_DBG_ERR:
		strcpy(zm_dbg_class,"ERR");
		break;
	case ZM_DBG_FAT:
		strcpy(zm_dbg_class,"FAT");
		break;
	default:
		if(code > 0 && code <= 9)
		{
			sprintf(zm_dbg_class,"DB%d",code);
		}
		else
		{
			Error(("Unknown Error Code %d",code));
		}
		break;
	}
	return(code);
}

int zmDbgOutput( const char *fstring, ... )
{
	char			time_string[64];
	va_list			arg_ptr;
	int				log_code;
	struct timeval	tp;
	struct timezone tzp;
	
	zm_temp_dbg_string[0] = '\0';
	va_start(arg_ptr,fstring);
	vsprintf(zm_temp_dbg_string,fstring,arg_ptr);

	gettimeofday( &tp, &tzp );

	if ( zm_dbg_runtime )
	{
		zmDbgSubtractTime( &tp, &zm_dbg_start );

		sprintf( time_string, "%ld.%03ld", tp.tv_sec, tp.tv_usec/1000 );
	}
	else
	{
		time_t the_time;

		the_time = tp.tv_sec;

        strftime(time_string,63,"%x %H:%M:%S",localtime(&the_time));
		sprintf(&(time_string[strlen(time_string)]), ".%06ld", tp.tv_usec);

	}
	sprintf(zm_dbg_string,"%s %s[%d].%s-%s/%d [%s]\n", 
              	time_string,zm_dbg_name,zm_dbg_pid,
               	zm_dbg_class,zm_dbg_file,zm_dbg_line,zm_temp_dbg_string);
	if ( zm_dbg_print )
	{
		printf("%s", zm_dbg_string);
		fflush(stdout);
	}
	if ( zm_dbg_log_fd != (FILE *)NULL )
	{
		fprintf( zm_dbg_log_fd, "%s", zm_dbg_string );

		if ( zm_dbg_flush )
		{
			fflush(zm_dbg_log_fd);
		}
	}
	/* For Info, Warning, Errors etc we want to log them */
	if ( zm_dbg_code <= ZM_DBG_INF )
	{
		if ( !zm_dbg_flush )
		{
			fflush(zm_dbg_log_fd);
		}
		switch(zm_dbg_code)
		{
			case ZM_DBG_INF:
				log_code = LOG_INFO;
				break;
			case ZM_DBG_WAR:
				log_code = LOG_WARNING;
				break;
			case ZM_DBG_ERR:
				log_code = LOG_ERR;
				break;
			case ZM_DBG_FAT:
				log_code = LOG_CRIT;
				break;
			default:
				log_code = LOG_CRIT;
				break;
		}
		log_code |= LOG_LOCAL1;
		syslog( log_code, "%s [%s]", zm_dbg_class, zm_temp_dbg_string );
	}
	va_end(arg_ptr);
	if ( zm_dbg_code == ZM_DBG_FAT )
	{
		exit(-1);
	}
	return( strlen( zm_temp_dbg_string ) );
}
