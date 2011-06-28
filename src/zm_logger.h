/*
 * ZoneMinder Logger Interface, $Date$, $Revision$
 * Copyright (C) 2001-2008 Philip Coombes
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/  

#ifndef ZM_LOGGER_H
#define ZM_LOGGER_H

#include <string>
#include <map>
#include <mysql/mysql.h>

class Logger
{
public:
    enum { 
        NOOPT=-6,
        NOLOG,
        PANIC,
        FATAL,
        ERROR,
        WARNING,
        INFO,
        DEBUG1,
        DEBUG2,
        DEBUG3,
        DEBUG4,
        DEBUG5,
        DEBUG6,
        DEBUG7,
        DEBUG8,
        DEBUG9
    };

    typedef int Level;

    typedef std::map<Level,std::string> StringMap;
    typedef std::map<Level,int> IntMap;

    class Options
    {
    public:
        int mTermLevel;
        int mDatabaseLevel;
        int mFileLevel;
        int mSyslogLevel;

        std::string mLogPath;
        std::string mLogFile;

    public:
        Options( Level termLevel=NOOPT, Level databaseLevel=NOOPT, Level fileLevel=NOOPT, Level syslogLevel=NOOPT, const std::string &logPath=".", const std::string &logFile="" ) :
            mTermLevel( termLevel ),
            mDatabaseLevel( databaseLevel ),
            mFileLevel( fileLevel ),
            mSyslogLevel( syslogLevel ),
            mLogPath( logPath ),
            mLogFile( logFile )
        {
        }
    };

private:
    static bool smInitialised;
    static Logger *smInstance;

    static StringMap smCodes;
    static IntMap smSyslogPriorities;

private:
    bool mInitialised;

    std::string mId;
    std::string mIdRoot;
    std::string mIdArgs;

    Level mLevel;           // Level that is currently in operation
    Level mTermLevel;       // Maximum level output via terminal
    Level mDatabaseLevel;   // Maximum level output via database
    Level mFileLevel;       // Maximum level output via file
    Level mSyslogLevel;     // Maximum level output via syslog
    Level mEffectiveLevel;  // Level optimised to take account of maxima

    bool mDbConnected;
    MYSQL mDbConnection;
    std::string mLogPath;
    std::string mLogFile;
    FILE *mLogFileFP;

    bool mHasTerm;
    bool mFlush;

private:
    static void usrHandler( int sig );

public:
    friend void logInit( const char *name, const Options &options );

    static Logger *fetch()
    {
        if ( !smInstance )
        {
            smInstance = new Logger();
            Options options;
            smInstance->initialise( "undef", options );
        }
        return( smInstance );
    }

private:
    Logger();
    ~Logger();

public:
    void initialise( const std::string &id, const Options &options );
    void terminate();

private:
    int limit( int level )
    {
        if ( level > DEBUG9 )
            return( DEBUG9 );
        if ( level < NOLOG )
            return( NOLOG );
        return( level );
    }

    bool boolEnv( const std::string &name, bool defaultValue=false );
    int intEnv( const std::string &name, bool defaultValue=0 );
    std::string strEnv( const std::string &name, const std::string defaultValue="" );
    char *getTargettedEnv( const std::string &name );

    void loadEnv();

public:
    const std::string &id() const
    {
        return( mId );
    }

    const std::string &id( const std::string &id );

    Level level() const
    {
        return( mLevel );
    }
    Level level( Level=NOOPT );

    bool debugOn()
    {
        return( mEffectiveLevel >= DEBUG1 );
    }

    Level termLevel( Level=NOOPT );
    Level databaseLevel( Level=NOOPT );
    Level fileLevel( Level=NOOPT );
    Level syslogLevel( Level=NOOPT );

private:
    void logFile( const std::string &logFile );
    void openFile();
    void closeFile();
    void openSyslog();
    void closeSyslog();

public:
    void logPrint( bool hex, const char * const file, const int line, const int level, const char *fstring, ... );
};

void logInit( const char *name, const Logger::Options &options=Logger::Options() );
void logTerm();
inline const std::string &logId()
{
    return( Logger::fetch()->id() );
}
inline Logger::Level logLevel()
{
    return( Logger::fetch()->level() );
}
inline void logCapLevel( Logger::Level level )
{
    Logger::fetch()->level( level );
}
inline Logger::Level logDebugging()
{
    return( Logger::fetch()->debugOn() );
}

#define logPrintf(logLevel,params...)  {\
        if ( logLevel <= Logger::fetch()->level() )\
            Logger::fetch()->logPrint( false, __FILE__, __LINE__, logLevel, ##params );\
    }

#define logHexdump(logLevel,data,len)  {\
        if ( logLevel <= Logger::fetch()->level() )\
            Logger::fetch()->logPrint( true, __FILE__, __LINE__, logLevel, "%p (%d)", data, len );\
    }

/* Debug compiled out */
#ifndef DBG_OFF
#define Debug(level,params...)  logPrintf(level,##params)
#define Hexdump(level,data,len) logHexdump(level,data,len)
#else
#define Debug(level,params...)
#define Hexdump(level,data,len)
#endif

/* Standard debug calls */
#define Info(params...)     logPrintf(Logger::INFO,##params)
#define Warning(params...)  logPrintf(Logger::WARNING,##params)
#define Error(params...)    logPrintf(Logger::ERROR,##params)
#define Fatal(params...)    logPrintf(Logger::FATAL,##params)
#define Panic(params...)    logPrintf(Logger::PANIC,##params)
#define Mark()              Info("Mark/%s/%d",__FILE__,__LINE__)
#define Log()               Info("Log")
#ifdef __GNUC__
#define Enter(level)        logPrintf(level,("Entering %s",__PRETTY_FUNCTION__))
#define Exit(level)         logPrintf(level,("Exiting %s",__PRETTY_FUNCTION__))
#else
#define Enter(level)        
#define Exit(level)         
#endif

#endif // ZM_LOGGER_H
