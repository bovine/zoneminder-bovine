<?php
//
// ZoneMinder web UK English language file, $Date$, $Revision$
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

// ZoneMinder Russian Translation by Borodin A.S.

// Notes for Translators
// 0. Get some credit, put your name in the line above (optional)
// 1. When composing the language tokens in your language you should try and keep to roughly the
//   same length text if possible. Abbreviate where necessary as spacing is quite close in a number of places.
// 2. There are four types of string replacement
//   a) Simple replacements are words or short phrases that are static and used directly. This type of
//     replacement can be used 'as is'.
//   b) Complex replacements involve some dynamic element being included and so may require substitution
//     or changing into a different order. The token listed in this file will be passed through sprintf as
//     a formatting string. If the dynamic element is a number you will usually need to use a variable
//     replacement also as described below.
//   c) Variable replacements are used in conjunction with complex replacements and involve the generation
//     of a singular or plural noun depending on the number passed into the zmVlang function. See the
//     the zmVlang section below for a further description of this.
//   d) Optional strings which can be used to replace the prompts and/or help text for the Options section
//     of the web interface. These are not listed below as they are quite large and held in the database
//     so that they can also be used by the zmconfig.pl script. However you can build up your own list
//     quite easily from the Config table in the database if necessary.
// 3. The tokens listed below are not used to build up phrases or sentences from single words. Therefore
//   you can safely assume that a single word token will only be used in that context.
// 4. In new language files, or if you are changing only a few words or phrases it makes sense from a
//   maintenance point of view to include the original language file and override the old definitions rather
//   than copy all the language tokens across. To do this change the line below to whatever your base language
//   is and uncomment it.
// require_once( 'zm_lang_en_gb.php' );

// You may need to change the character set here, if your web server does not already
// do this by default, uncomment this if required.
//
// Example
header( "Content-Type: text/html; charset=koi8-r" );

// You may need to change your locale here if your default one is incorrect for the
// language described in this file, or if you have multiple languages supported.
// If you do need to change your locale, be aware that the format of this function
// is subtlely different in versions of PHP before and after 4.3.0, see
// http://uk2.php.net/manual/en/function.setlocale.php for details.
// Also be aware that changing the whole locale may affect some floating point or decimal
// arithmetic in the database, if this is the case change only the individual locale areas
// that don't affect this rather than all at once. See the examples below.
// Finally, depending on your setup, PHP may not enjoy have multiple locales in a shared
// threaded environment, if you get funny errors it may be this.
//
// Examples
// setlocale( 'LC_ALL', 'en_GB' ); All locale settings pre-4.3.0
// setlocale( LC_ALL, 'en_GB' ); All locale settings 4.3.0 and after
// setlocale( LC_CTYPE, 'en_GB' ); Character class settings 4.3.0 and after
// setlocale( LC_TIME, 'en_GB' ); Date and time formatting 4.3.0 and after

// Simple String Replacements
$zmSlang24BitColour          = '24 ������ ����';
$zmSlang8BitGrey             = '256 �������� ������';
$zmSlangActual               = '��������������';
$zmSlangAddNewMonitor        = '�������� �������';
$zmSlangAddNewUser           = '�������� ������������';
$zmSlangAddNewZone           = '�������� ����';
$zmSlangAlarmBrFrames        = '�����<br/>�������';
$zmSlangAlarmFrame           = '���� �������';
$zmSlangAlarmLimits          = '����.&nbsp;����&nbsp;����.';
$zmSlangAlarm                = '�������';
$zmSlangAlarmPx              = '���&nbsp;����.';
$zmSlangAlert                = '���������';
$zmSlangAll                  = '���';
$zmSlangApply                = '���������';
$zmSlangApplyingStateChange  = '��������� ������� ����������';
$zmSlangArchArchived         = '������ � ������';
$zmSlangArchive              = '�����';
$zmSlangArchUnarchived       = '������ �� � ������';
$zmSlangAttrAlarmFrames      = '���-�� ������ �������';
$zmSlangAttrArchiveStatus    = '������ ���������';
$zmSlangAttrAvgScore         = '����. ������';
$zmSlangAttrDate             = '����';
$zmSlangAttrDateTime         = '����/�����';
$zmSlangAttrDiskBlocks       = 'Disk Blocks';
$zmSlangAttrDiskPercent      = 'Disk Percent';
$zmSlangAttrDuration         = '������������';
$zmSlangAttrFrames           = '���-�� ������';
$zmSlangAttrId               = 'Id';
$zmSlangAttrMaxScore         = '����. ������';
$zmSlangAttrMonitorId        = 'Id ��������';
$zmSlangAttrMonitorName      = '�������� ��������';
$zmSlangAttrMontage          = '������';
$zmSlangAttrName             = 'Name';
$zmSlangAttrTime             = '�����';
$zmSlangAttrTotalScore       = '����. ������';
$zmSlangAttrWeekday          = '���� ������';
$zmSlangAutoArchiveEvents    = 'Automatically archive all matches';
$zmSlangAutoDeleteEvents     = 'Automatically delete all matches';
$zmSlangAutoEmailEvents      = 'Automatically email details of all matches';
$zmSlangAutoExecuteEvents    = 'Automatically execute command on all matches';
$zmSlangAutoMessageEvents    = 'Automatically message details of all matches';
$zmSlangAutoUploadEvents     = 'Automatically upload all matches';
$zmSlangAvgBrScore           = '����.<br/>������';
$zmSlangBadMonitorChars      = '�������� �������� ����� ��������� ������ �����, ����� � �������������';
$zmSlangBandwidth            = '�����';
$zmSlangBlobPx               = '��� �������';
$zmSlangBlobs                = '���-�� ��������';
$zmSlangBlobSizes            = '������ ��������';
$zmSlangBrightness           = '�������';
$zmSlangBuffers              = '������';
$zmSlangCancelForcedAlarm    = '��������&nbsp;�������������&nbsp;�������';
$zmSlangCancel               = '��������';
$zmSlangCaptureHeight        = '������ �� Y';
$zmSlangCapturePalette       = '����� �������';
$zmSlangCaptureWidth         = '������ �� X';
$zmSlangCheckAll             = '�������� ���';
$zmSlangCheckMethod          = '����� �������� �������';
$zmSlangChooseFilter         = '������� ������';
$zmSlangClose                = '�������';
$zmSlangColour               = '����';
$zmSlangConfig               = 'Config';
$zmSlangConfiguredFor        = '�������� ��';
$zmSlangConfirmPassword      = '����������� ������';
$zmSlangConjAnd              = '�';
$zmSlangConjOr               = '���';
$zmSlangConsole              = '������';
$zmSlangContactAdmin         = '���������� ���������� � ������ ��������������.';
$zmSlangContrast             = '��������';
$zmSlangCycleWatch           = '����������� ��������';
$zmSlangDay                  = '����';
$zmSlangDeleteAndNext        = '������� &amp; ����.';
$zmSlangDeleteAndPrev        = '������� &amp; ����.';
$zmSlangDelete               = '�������';
$zmSlangDeleteSavedFilter    = '������� ����������� ������';
$zmSlangDescription          = '��������';
$zmSlangDeviceChannel        = '�����';
$zmSlangDeviceFormat         = '������ (0=PAL,1=NTSC � �.�.)';
$zmSlangDeviceNumber         = '����� ���������� (/dev/video?)';
$zmSlangDimensions           = '�������';
$zmSlangDisk                 = 'Disk';
$zmSlangDuration             = '������������';
$zmSlangEdit                 = '��������������';
$zmSlangEmail                = 'Email';
$zmSlangEnabled              = '��������';
$zmSlangEnterNewFilterName   = '������� ����� �������� �������';
$zmSlangErrorBrackets        = '������: ���������� ����������� � ����������� ������ ������ ���� ����������';
$zmSlangError                = '������';
$zmSlangErrorValidValue      = '������: ��������� ��� ��� ����� ����� �������������� ��������';
$zmSlangEtc                  = '� �.�.';
$zmSlangEventFilter          = '������ �������';
$zmSlangEventId              = 'Event Id';
$zmSlangEvent                = '�������';
$zmSlangEvents               = '�������';
$zmSlangExclude              = '���������';
$zmSlangFeed                 = 'Feed';
$zmSlangFilterPx             = '��� �������';
$zmSlangFirst                = '������';
$zmSlangForceAlarm           = '��������&nbsp;�������';
$zmSlangFPS                  = '�/c';
$zmSlangFPSReportInterval    = '������ ���������� ��������� ��������';
$zmSlangFrame                = '����';
$zmSlangFrameId              = 'Id �����';
$zmSlangFrameRate            = '��������';
$zmSlangFrames               = '�����';
$zmSlangFrameSkip            = '���������� �����';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = '����.';
$zmSlangFunction             = '�������';
$zmSlangGenerateVideo        = '������������ �����';
$zmSlangGeneratingVideo      = '������������ �����';
$zmSlangGoToZoneMinder       = '������� �� ZoneMinder.com';
$zmSlangGrey                 = '�/�';
$zmSlangHighBW               = '������� �����';
$zmSlangHigh                 = '�������';
$zmSlangHour                 = '���';
$zmSlangHue                  = '�������';
$zmSlangId                   = 'Id';
$zmSlangIdle                 = 'Idle';
$zmSlangIgnore               = '������������';
$zmSlangImageBufferSize      = '������ ������ �����������';
$zmSlangImage                = '�����������';
$zmSlangInclude              = '��������';
$zmSlangInverted             = '�������������';
$zmSlangLanguage             = '����';
$zmSlangLast                 = '���������';
$zmSlangLimitResultsPost     = 'results only;'; // This is used at the end of the phrase 'Limit to first N results only'
$zmSlangLimitResultsPre      = 'Limit to first'; // This is used at the beginning of the phrase 'Limit to first N results only'
$zmSlangLoad                 = 'Load';
$zmSlangLocal                = '���������';
$zmSlangLoggedInAs           = '������������';
$zmSlangLoggingIn            = '���� � �������';
$zmSlangLogin                = '�����';
$zmSlangLogout               = '�����';
$zmSlangLowBW                = '����� �����';
$zmSlangLow                  = '�����';
$zmSlangMark                 = '�����';
$zmSlangMaxBrScore           = '����.<br/>������';
$zmSlangMax                  = '����.';
$zmSlangMaximumFPS           = '����������� �������� ������ (�/�)';
$zmSlangMediumBW             = '������� �����';
$zmSlangMedium               = '�������';
$zmSlangMinAlarmGeMinBlob    = '���. ���������� �������� ������� ������ ���� ������ ��� ����� ���. ���������� �������� �������';
$zmSlangMinAlarmGeMinFilter  = '���. ���������� �������� ������� ������ ���� ������ ��� ����� ���. ���������� �������� ����� ����������';
$zmSlangMinAlarmPixelsLtMax  = '����������� ���-�� �������� ������� ������ ���� ������ ������������� ���-�� �������� �������';
$zmSlangMinBlobAreaLtMax     = '����������� ������� ������� ������ ���� ������ ��� ������������ ������� �������';
$zmSlangMinBlobsLtMax        = '����������� ����� �������� ������ ���� ������ ��� ������������ ����� ��������';
$zmSlangMinFilterPixelsLtMax = '����������� ����� �������� ����� ���������� ������ ���� ������ ��� ������������ ����� �������� ����������';
$zmSlangMinPixelThresLtMax   = '������ ����� ���-�� �������� ������ ���� ���� �������� ������ ���-�� ��������';
$zmSlangMisc                 = '������';
$zmSlangMonitorIds           = 'Id&nbsp;���������';
$zmSlangMonitor              = '�������';
$zmSlangMonitors             = '��������';
$zmSlangMontage              = 'Montage';
$zmSlangMonth                = '�����';
$zmSlangMustBeGe             = '������ ���� ������ ��� �����';
$zmSlangMustBeLe             = '������ ���� ������ ��� �����';
$zmSlangMustConfirmPassword  = '�� ������ ����������� ������';
$zmSlangMustSupplyPassword   = '�� ������ ������ ������';
$zmSlangMustSupplyUsername   = '�� ������ ������ ��� ������������';
$zmSlangName                 = '���';
$zmSlangNetwork              = '����';
$zmSlangNew                  = '���.';
$zmSlangNewPassword          = '����� ������';
$zmSlangNewState             = '����� ���������';
$zmSlangNewUser              = '����� ������������';
$zmSlangNext                 = '����.';
$zmSlangNoFramesRecorded     = '��� ������� �� ������� ������';
$zmSlangNo                   = '���';
$zmSlangNoneAvailable        = '�� ��������';
$zmSlangNone                 = '�����������';
$zmSlangNormal               = '����������';
$zmSlangNoSavedFilters       = '��� ����������� ��������';
$zmSlangNoStatisticsRecorded = '���������� �� ����� �������/����� �� ��������';
$zmSlangOpEq                 = '�����';
$zmSlangOpGt                 = '������';
$zmSlangOpGtEq               = '������ ���� �����';
$zmSlangOpIn                 = '� ������';
$zmSlangOpLtEq               = '������ ��� �����';
$zmSlangOpLt                 = '������';
$zmSlangOpMatches            = '���������';
$zmSlangOpNe                 = '�� �����';
$zmSlangOpNotIn              = '�� � ������';
$zmSlangOpNotMatches         = '�� ���������';
$zmSlangOptionHelp           = 'OptionHelp';
$zmSlangOptionRestartWarning = '��� ��������� ����������� ������ ����� ����������� ���������.';
$zmSlangOptions              = '�����';
$zmSlangOrEnterNewName       = '��� ������� ����� ���';
$zmSlangOrientation          = '����������';
$zmSlangOverwriteExisting    = '������������ ������������';
$zmSlangPaged                = '�� ���������';
$zmSlangParameter            = '�������';
$zmSlangPassword             = '������';
$zmSlangPasswordsDifferent   = '������ �� ���������';
$zmSlangPaths                = '����';
$zmSlangPhoneBW              = '���������� �����';
$zmSlangPixels               = '� ��������';
$zmSlangPleaseWait           = '���������� ���������';
$zmSlangPostEventImageBuffer = '����� ����� �������';
$zmSlangPreEventImageBuffer  = '����� �� �������';
$zmSlangPrev                 = '����.';
$zmSlangRate                 = '��������';
$zmSlangReal                 = '��������';
$zmSlangRecord               = 'Record';
$zmSlangRefImageBlendPct     = '������������ �������� �����, %';
$zmSlangRefresh              = '��������';
$zmSlangRemoteHostName       = '��� ���������� �����';
$zmSlangRemoteHostPath       = '���� �� ��������� �����';
$zmSlangRemoteHostPort       = '��������� ����';
$zmSlangRemoteImageColours   = '��������� �� ��������� �����';
$zmSlangRemote               = '���������';
$zmSlangRename               = '�������������';
$zmSlangReplay               = '���������';
$zmSlangResetEventCounts     = '�������� ������� �������';
$zmSlangRestart              = '�������������';
$zmSlangRestarting           = '���������������';
$zmSlangRestrictedCameraIds  = 'Id ����������� �����';
$zmSlangRotateLeft           = '��������� �����';
$zmSlangRotateRight          = '��������� ������';
$zmSlangRunMode              = '����� ������';
$zmSlangRunning              = '�����������';
$zmSlangRunState             = '���������';
$zmSlangSaveAs               = '��������� ���';
$zmSlangSaveFilter           = '��������� ������';
$zmSlangSave                 = '���������';
$zmSlangScale                = '�������';
$zmSlangScore                = '������';
$zmSlangSecs                 = '���.';
$zmSlangSectionlength        = '����� ������ (� ������)';
$zmSlangSetLearnPrefs        = 'Set Learn Prefs'; // This can be ignored for now
$zmSlangSetNewBandwidth      = '��������� ����� ������ ������';
$zmSlangSettings             = '���������';
$zmSlangShowFilterWindow     = '�������� ���� �������';
$zmSlangSortAsc              = 'Asc';
$zmSlangSortBy               = 'Sort by';
$zmSlangSortDesc             = 'Desc';
$zmSlangSource               = '��������';
$zmSlangSourceType           = '��� ���������';
$zmSlangStart                = '���������';
$zmSlangState                = '���������';
$zmSlangStats                = '����������';
$zmSlangStatus               = '������';
$zmSlangStills               = '����-�����';
$zmSlangStop                 = '����������';
$zmSlangStopped              = '����������';
$zmSlangStream               = '�����';
$zmSlangSystem               = '�������';
$zmSlangTimeDelta            = '������������� �����';
$zmSlangTime                 = '�����';
$zmSlangTimestamp            = '����� �������';
$zmSlangTimeStamp            = '����� �������';
$zmSlangTimestampLabelFormat = '������ �����';
$zmSlangTimestampLabelX      = 'X-���������� �����';
$zmSlangTimestampLabelY      = 'Y-���������� �����';
$zmSlangTools                = '�����������';
$zmSlangTotalBrScore         = '����.<br/>������';
$zmSlangTriggers             = '��������';
$zmSlangType                 = '���';
$zmSlangUnarchive            = '��.&nbsp;��&nbsp;������';
$zmSlangUnits                = '��. ���������';
$zmSlangUnknown              = 'Unknown';
$zmSlangUpdateAvailable      = '�������� ���������� ZoneMinder';
$zmSlangUpdateNotNecessary   = '���������� �� ���������';
$zmSlangUseFilter            = '������������ ������';
$zmSlangUseFilterExprsPost   = '&nbsp;���������&nbsp;���&nbsp;�������'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = '�����.&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUser                 = '������������';
$zmSlangUsername             = '��� ������������';
$zmSlangUsers                = '������������';
$zmSlangValue                = '��������';
$zmSlangVersion              = '������';
$zmSlangVersionIgnore        = '������������ ��� ������';
$zmSlangVersionRemindDay     = '��������� ����� ����';
$zmSlangVersionRemindHour    = '��������� ����� ���';
$zmSlangVersionRemindNever   = '�� �������� � ����� �������';
$zmSlangVersionRemindWeek    = '��������� ����� ������';
$zmSlangVideo                = '�����';
$zmSlangVideoGenFailed       = '������ ��������� �����!';
$zmSlangVideoGenParms        = '��������� ��������� �����';
$zmSlangVideoSize            = '������ �����������';
$zmSlangViewAll              = '�����. ���';
$zmSlangView                 = '��������';
$zmSlangViewPaged            = '�����. �����������';
$zmSlangWarmupFrames         = '����� ���������';
$zmSlangWatch                = 'Watch';
$zmSlangWeb                  = '���������';
$zmSlangWeek                 = '������';
$zmSlangX10ActivationString  = 'X10 Activation String';
$zmSlangX10InputAlarmString  = 'X10 Input Alarm String';
$zmSlangX10OutputAlarmString = 'X10 Output Alarm String';
$zmSlangX10                  = 'X10';
$zmSlangYes                  = '��';
$zmSlangYouNoPerms           = '� ��� �� ���������� ���� ��� ������� � ����� �������.';
$zmSlangZoneAlarmColour      = '���� ������� (RGB)';
$zmSlangZoneAlarmThreshold   = '����� ������������ (0>=?<=255)';
$zmSlangZoneFilterHeight     = '������ ������� (� ���.)';
$zmSlangZoneFilterWidth      = '������ ������� (� ���.)';
$zmSlangZoneMaxAlarmedArea   = '����. ������� �������';
$zmSlangZoneMaxBlobArea      = '����. ������� �������';
$zmSlangZoneMaxBlobs         = '����. ���-�� ��������';
$zmSlangZoneMaxFilteredArea  = '���c. ������� ����� ����������';
$zmSlangZoneMaxPixelThres    = '������� ����� ���-�� �������� (0>=?<=255)';
$zmSlangZoneMaxX             = '����. X ���������� (������ ����)';
$zmSlangZoneMaxY             = 'M���. Y ���������� (������ ����)';
$zmSlangZoneMinAlarmedArea   = '���. ������� �������';
$zmSlangZoneMinBlobArea      = '���. ������� �������';
$zmSlangZoneMinBlobs         = '���. ���-�� ��������';
$zmSlangZoneMinFilteredArea  = '���. ������� ����� ����������';
$zmSlangZoneMinPixelThres    = '������ ����� ���-�� �������� (0>=?<=255)';
$zmSlangZoneMinX             = '���. X ���������� (����� ����)';
$zmSlangZoneMinY             = 'M��. Y ���������� (������� ����)';
$zmSlangZones                = '����';
$zmSlangZone                 = '����';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = '������� ������������: \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s'; // For example '37 Events' (from Vlang below)
$zmClangLastEvents           = '��������� %1$s %2$s'; // For example 'Last 37 Events' (from Vlang below)
$zmClangLatestRelease        = '��������� ������: v%1$s, � ��� �����������: v%2$s.';
$zmClangMonitorCount         = '%1$s %2$s'; // For example '4 Monitors' (from Vlang below)
$zmClangMonitorFunction      = '������� �������� %1$s';
$zmClangRunningRecentVer     = '� ��� ����������� �������� ������ ZoneMinder, v%s.'; 

// The next section allows you to describe a series of word ending and counts used to
// generate the correctly conjugated forms of words depending on a count that is associated
// with that word.
// This intended to allow phrases such a '0 potatoes', '1 potato', '2 potatoes' etc to
// conjugate correctly with the associated count.
// In some languages such as English this is fairly simple and can be expressed by assigning
// a count with a singular or plural form of a word and then finding the nearest (lower) value.
// So '0' of something generally ends in 's', 1 of something is singular and has no extra
// ending and 2 or more is a plural and ends in 's' also. So to find the ending for '187' of
// something you would find the nearest lower count (2) and use that ending.
//
// So examples of this would be
// $zmVlangPotato = array( 0=>'Potatoes', 1=>'Potato', 2=>'Potatoes' );
// $zmVlangSheep = array( 0=>'Sheep' );
//
// where you can have as few or as many entries in the array as necessary
// If your language is similar in form to this then use the same format and choose the
// appropriate zmVlang function below.
// If however you have a language with a different format of plural endings then another
// approach is required . For instance in Russian the word endings change continuously
// depending on the last digit (or digits) of the numerator. In this case then zmVlang
// arrays could be written so that the array index just represents an arbitrary 'type'
// and the zmVlang function does the calculation about which version is appropriate.
//
// So an example in Russian might be (using English words, and made up endings as I
// don't know any Russian!!)
// $zmVlangPotato = array( 1=>'Potati', 2=>'Potaton', 3=>'Potaten' );
// --> actually, if written in 'translit', or russian words in english letters,
// the example would be ( 1=>"Kartoshek", 2=>"Katroshka", 3=>"Kartoshki"); :)
//
// and the zmVlang function decides that the first form is used for counts ending in
// 0, 5-9 or 11-19 and the second form when ending in 1 etc.
//

// Variable arrays expressing plurality, see the zmVlang description above
$zmVlangEvent                = array( 1=>'�������', 2=>'�������', 3=>'�������' );
$zmVlangMonitor              = array( 1=>'���������', 2=>'�������', 3=>'��������' );

// You will need to choose or write a function that can correlate the plurality string arrays
// with variable counts. This is used to conjugate the Vlang arrays above with a number passed
// in to generate the correct noun form.
//
// In languages such as English this is fairly simple
// Note this still has to be used with printf etc to get the right formating
/*function zmVlang( $lang_var_array, $count )
{
	krsort( $lang_var_array );
	foreach ( $lang_var_array as $key=>$value )
	{
		if ( abs($count) >= $key )
		{
			return( $value );
		}
	}
	die( 'Error, unable to correlate variable language string' );
}*/

// This is an version that could be used in the Russian example above
// The rules are that the first word form is used if the count ends in
// 0, 5-9 or 11-19. The second form is used then the count ends in 1
// (not including 11 as above) and the third form is used when the
// count ends in 2-4, again excluding any values ending in 12-14.
//
function zmVlang( $lang_var_array, $count )
{
	$secondlastdigit = ($count/10)%10;
	$lastdigit = $count%10;

	// Get rid of the special cases first, the teens
	if ( $secondlastdigit == 1 && $lastdigit != 0 )
	{
		return( $lang_var_array[1] );
	}
	switch ( $lastdigit )
	{
		case 0 :
		case 5 :
		case 6 :
		case 7 :
		case 8 :
		case 9 :
		{
			return( $lang_var_array[1] );
			break;
		}
		case 1 :
	{
			return( $lang_var_array[2] );
			break;
		}
		case 2 :
		case 3 :
		case 4 :
		{
			return( $lang_var_array[3] );
			break;
		}
	}
	die( 'Error, unable to correlate variable language string' );
}

// This is an example of how the function is used in the code which you can uncomment and
// use to test your custom function.
//$monitors = array();
//$monitors[] = 1; // Choose any number
//echo sprintf( $zmClangMonitorCount, count($monitors), zmVlang( $zmVlangMonitor, count($monitors) ) );

// In this section you can override the default prompt and help texts for the options area
// These overrides are in the form of $zmVarOlangPrompt<option> and $zmVarOlangHelp<option>
// where <option> represents the option name minus the initial ZM_
// So for example, to override the help text for ZM_LANG_DEFAULT do
// $zmVarOlangPromptLANG_DEFAULT = "This is a new prompt for this option";
// $zmVarOlangHelpLANG_DEFAULT = "This is some new help for this option which will be displayed in the popup window when the ? is clicked";
//

?>
