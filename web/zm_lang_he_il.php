<?php
//
// ZoneMinder web IL Hebrew language file, $Date$, $Revision$
// Copyright (C) 2003, 2004, 2005, 2006, 2007  Philip Coombes
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

// ZoneMinder Hebrew Translation by oc666@netvision.net.il

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
 header( "Content-Type: text/html; charset=iso-8859-8-i" );

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
 // setlocale( 'LC_ALL', 'he_IL' ); All locale settings pre-4.3.0
 setlocale( LC_ALL, 'he_IL' ); //All locale settings 4.3.0 and after
// setlocale( LC_CTYPE, 'he_IL' ); Character class settings 4.3.0 and after
// setlocale( LC_TIME, 'he_IL' ); Date and time formatting 4.3.0 and after

// Simple String Replacements
$zmSlang24BitColour          = '��� 24 ���';
$zmSlang8BitGrey             = '����� ���� 8 ���';
$zmSlangAction               = '�����';
$zmSlangActual               = '�����';
$zmSlangAddNewControl        = '���� ������� ���';
$zmSlangAddNewMonitor        = '���� ������� ���';
$zmSlangAddNewUser           = '���� ����� ���';
$zmSlangAddNewZone           = '���� ����� ���';
$zmSlangAlarm                = '�����';
$zmSlangAlarmBrFrames        = '�����<br/>�������';
$zmSlangAlarmFrame           = '����� �������';
$zmSlangAlarmFrameCount      = '����� ������ �������';
$zmSlangAlarmLimits          = '������ �����';
$zmSlangAlarmMaximumFPS      = 'Alarm Maximum FPS';
$zmSlangAlarmPx              = '����� Px';
$zmSlangAlarmRGBUnset        = '���� ���� ����� ����� ���';
$zmSlangAlert                = '�����';
$zmSlangAll                  = '���';
$zmSlangApply                = '���';
$zmSlangApplyingStateChange  = '��� ����� ���';
$zmSlangArchArchived         = '����� ����';
$zmSlangArchive              = '�����';
$zmSlangArchived             = '�����';
$zmSlangArchUnarchived       = '�� ������ ����';
$zmSlangArea                 = '����';
$zmSlangAreaUnits            = '���� (px/%)';
$zmSlangAttrAlarmFrames      = 'Alarm Frames';
$zmSlangAttrArchiveStatus    = 'Archive Status';
$zmSlangAttrAvgScore         = '����� �����';
$zmSlangAttrCause            = '����';
$zmSlangAttrDate             = '�����';
$zmSlangAttrDateTime         = '�����/���';
$zmSlangAttrDiskBlocks       = 'Disk Blocks';
$zmSlangAttrDiskPercent      = 'Disk Percent';
$zmSlangAttrDuration         = '��� ���';
$zmSlangAttrFrames           = '�������';
$zmSlangAttrId               = 'Id';
$zmSlangAttrMaxScore         = '����� �������';
$zmSlangAttrMonitorId        = 'Monitor Id';
$zmSlangAttrMonitorName      = '�� �������';
$zmSlangAttrName             = '��';
$zmSlangAttrNotes            = '�����';
$zmSlangAttrTime             = '���';
$zmSlangAttrTotalScore       = '�� ����';
$zmSlangAttrWeekday          = '��� �����';
$zmSlangAuto                 = '����';
$zmSlangAutoStopTimeout      = '��� ��� ����� ����';
$zmSlangAvgBrScore           = '�����<br/>�����';
$zmSlangBackground           = '���';
$zmSlangBackgroundFilter     = '��� ���� ����';
$zmSlangBadAlarmFrameCount   = 'Alarm frame count must be an integer of one or more';
$zmSlangBadAlarmMaxFPS       = 'Alarm Maximum FPS must be a positive integer or floating point value';
$zmSlangBadChannel           = 'Channel must be set to an integer of zero or more';
$zmSlangBadDevice            = 'Device must be set to a valid value';
$zmSlangBadFormat            = 'Format must be set to an integer of zero or more';
$zmSlangBadFPSReportInterval = 'FPS report interval buffer count must be an integer of 100 or more';
$zmSlangBadFrameSkip         = 'Frame skip count must be an integer of zero or more';
$zmSlangBadHeight            = 'Height must be set to a valid value';
$zmSlangBadHost              = 'Host must be set to a valid ip address or hostname, do not include http://';
$zmSlangBadImageBufferCount  = 'Image buffer size must be an integer of 10 or more';
$zmSlangBadLabelX            = 'Label X co-ordinate must be set to an integer of zero or more';
$zmSlangBadLabelY            = 'Label Y co-ordinate must be set to an integer of zero or more';
$zmSlangBadMaxFPS            = 'Maximum FPS must be a positive integer or floating point value';
$zmSlangBadNameChars         = 'Names may only contain alphanumeric characters plus hyphen and underscore';
$zmSlangBadPath              = 'Path must be set to a valid value';
$zmSlangBadPort              = 'Port must be set to a valid number';
$zmSlangBadPostEventCount    = 'Post event image buffer must be an integer of zero or more';
$zmSlangBadPreEventCount     = 'Pre event image buffer must be at least zero, and less than image buffer size';
$zmSlangBadRefBlendPerc      = 'Reference blendpercentage must be a positive integer';
$zmSlangBadSectionLength     = 'Section length must be an integer of 30 or more';
$zmSlangBadWarmupCount       = 'Warmup frames must be an integer of zero or more';
$zmSlangBadWebColour         = 'Web colour must be a valid web colour string';
$zmSlangBadWidth             = 'Width must be set to a valid value';
$zmSlangBandwidth            = '���� ��';
$zmSlangBlobPx               = 'Blob Px';
$zmSlangBlobs                = 'Blobs';
$zmSlangBlobSizes            = 'Blob Sizes';
$zmSlangBrightness           = '������';
$zmSlangBuffers              = 'Buffers';
$zmSlangCanAutoFocus         = '���� ������� �������';
$zmSlangCanAutoGain          = 'Can Auto Gain';
$zmSlangCanAutoIris          = 'Can Auto Iris';
$zmSlangCanAutoWhite         = 'Can Auto White Bal.';
$zmSlangCanAutoZoom          = '���� ��� �������';
$zmSlangCancel               = '���';
$zmSlangCancelForcedAlarm    = 'Cancel&nbsp;Forced&nbsp;Alarm';
$zmSlangCanFocusAbs          = '���� ������� ��������';
$zmSlangCanFocus             = '���� �������';
$zmSlangCanFocusCon          = '���� ������� �����';
$zmSlangCanFocusRel          = '���� ������� ����';
$zmSlangCanGainAbs           = 'Can Gain Absolute';
$zmSlangCanGain              = 'Can Gain ';
$zmSlangCanGainCon           = 'Can Gain Continuous';
$zmSlangCanGainRel           = 'Can Gain Relative';
$zmSlangCanIrisAbs           = 'Can Iris Absolute';
$zmSlangCanIris              = 'Can Iris';
$zmSlangCanIrisCon           = 'Can Iris Continuous';
$zmSlangCanIrisRel           = 'Can Iris Relative';
$zmSlangCanMoveAbs           = '���� ����� ���������';
$zmSlangCanMove              = '���� �����';
$zmSlangCanMoveCon           = '���� ����� ������';
$zmSlangCanMoveDiag          = 'Can Move Diagonally';
$zmSlangCanMoveMap           = 'Can Move Mapped';
$zmSlangCanMoveRel           = '���� ����� �����';
$zmSlangCanPan               = 'Can Pan' ;
$zmSlangCanReset             = '���� �����';
$zmSlangCanSetPresets        = 'Can Set Presets';
$zmSlangCanSleep             = '���� ��� ����';
$zmSlangCanTilt              = '���� �����';
$zmSlangCanWake              = '���� ����� ���� ����';
$zmSlangCanWhiteAbs          = 'Can White Bal. Absolute';
$zmSlangCanWhiteBal          = 'Can White Bal.';
$zmSlangCanWhite             = 'Can White Balance';
$zmSlangCanWhiteCon          = 'Can White Bal. Continuous';
$zmSlangCanWhiteRel          = 'Can White Bal. Relative';
$zmSlangCanZoomAbs           = '���� ��� ��������';
$zmSlangCanZoom              = '���� ���';
$zmSlangCanZoomCon           = '���� ��� �����';
$zmSlangCanZoomRel           = '���� ��� ����';
$zmSlangCaptureHeight        = 'Capture Height';
$zmSlangCapturePalette       = 'Capture Palette';
$zmSlangCaptureWidth         = 'Capture Width';
$zmSlangCause                = '����';
$zmSlangCheckMethod          = 'Alarm Check Method';
$zmSlangChooseFilter         = '��� ����';
$zmSlangChoosePreset         = 'Choose Preset';
$zmSlangClose                = '����';
$zmSlangColour               = '���';
$zmSlangCommand              = '�����';
$zmSlangConfig               = '�����';
$zmSlangConfiguredFor        = '����� ����';
$zmSlangConfirmDeleteEvents  = 'Are you sure you wish to delete the selected events?';
$zmSlangConfirmPassword      = '��� �����';
$zmSlangConjAnd              = '�';
$zmSlangConjOr               = '��';
$zmSlangConsole              = '������';
$zmSlangContactAdmin         = '��� ��� �� ���� ������ ����� ����� ������.';
$zmSlangContinue             = '����';
$zmSlangContrast             = '��������';
$zmSlangControlAddress       = '����� ��������';
$zmSlangControlCap           = '����� ��������';
$zmSlangControlCaps          = '������ ��������';
$zmSlangControl              = '�������';
$zmSlangControlDevice        = '���� ��������';
$zmSlangControllable         = 'Controllable';
$zmSlangControlType          = '��� ��������';
$zmSlangCycle                = '������';
$zmSlangCycleWatch           = '����� �������';
$zmSlangDay                  = '���';
$zmSlangDebug                = 'Debug';
$zmSlangDefaultRate          = 'Default Rate';
$zmSlangDefaultScale         = 'Default Scale';
$zmSlangDefaultView          = 'Default View';
$zmSlangDeleteAndNext        = '��� &amp; ���';
$zmSlangDeleteAndPrev        = '��� &amp; �����';
$zmSlangDelete               = '���';
$zmSlangDeleteSavedFilter    = '��� ���� ����';
$zmSlangDescription          = '�����';
$zmSlangDeviceChannel        = '���� �����';
$zmSlangDeviceFormat         = '����� �����';
$zmSlangDeviceNumber         = '���� �����';
$zmSlangDevicePath           = '���� �����';
$zmSlangDevices              = '������';
$zmSlangDimensions           = '������';
$zmSlangDisableAlarms        = '���� ������';
$zmSlangDisk                 = '����';
$zmSlangDonateAlready        = '��, ����� ���';
$zmSlangDonateEnticement     = 'You\'ve been running ZoneMinder for a while now and hopefully are finding it a useful addition to your home or workplace security. Although ZoneMinder is, and will remain, free and open source, it costs money to develop and support. If you would like to help support future development and new features then please consider donating. Donating is, of course, optional but very much appreciated and you can donate as much or as little as you like.<br><br>If you would like to donate please select the option below or go to http://www.zoneminder.com/donate.html in your browser.<br><br>Thank you for using ZoneMinder and don\'t forget to visit the forums on ZoneMinder.com for support or suggestions about how to make your ZoneMinder experience even better.';
$zmSlangDonate               = '���� �����';
$zmSlangDonateRemindDay      = '����� ��, ���� �� ���� ��� ���';
$zmSlangDonateRemindHour     = '����� ��, ���� �� ���� ��� ���';
$zmSlangDonateRemindMonth    = '����� ��, ���� �� ���� ���� ���';
$zmSlangDonateRemindNever    = '��, ��� �� ���� �����, �� ����� ����';
$zmSlangDonateRemindWeek     = '����� ��, ���� �� ���� ���� ���';
$zmSlangDonateYes            = '��, ��� ������� ����� �����';
$zmSlangDownload             = '����';
$zmSlangDuration             = '��� ���';
$zmSlangEdit                 = '����';
$zmSlangEmail                = '���"�';
$zmSlangEnableAlarms         = '���� ������';
$zmSlangEnabled              = '����';
$zmSlangEnterNewFilterName   = '��� ���� ���';
$zmSlangErrorBrackets        = 'Error, please check you have an equal number of opening and closing brackets';
$zmSlangError                = '�����';
$zmSlangErrorValidValue      = 'Error, please check that all terms have a valid value';
$zmSlangEtc                  = '���\'';
$zmSlangEvent                = '�����';
$zmSlangEventFilter          = '���� �����';
$zmSlangEventId              = '����� �����';
$zmSlangEventName            = '�� �����';
$zmSlangEventPrefix          = 'Event Prefix';
$zmSlangEvents               = '�������';
$zmSlangExclude              = '���';
$zmSlangExecute              = '���';
$zmSlangExportDetails        = '��� ���� �����';
$zmSlangExport               = '���';
$zmSlangExportFailed         = '���� ����';
$zmSlangExportFormat         = '��� ����� ����';
$zmSlangExportFormatTar      = 'Tar';
$zmSlangExportFormatZip      = 'Zip';
$zmSlangExportFrames         = 'Export Frame Details';
$zmSlangExportImageFiles     = '��� ���� �����';
$zmSlangExporting            = '�����';
$zmSlangExportMiscFiles      = '��� ����� ����� (�� ����)';
$zmSlangExportOptions        = '��� ��������';
$zmSlangExportVideoFiles     = 'Export Video Files (if present)';
$zmSlangFar                  = 'Far';
$zmSlangFeed                 = 'Feed';
$zmSlangFileColours          = '���� ����';
$zmSlangFile                 = '����';
$zmSlangFilePath             = '���� ����';
$zmSlangFilterArchiveEvents  = '���� ������';
$zmSlangFilterDeleteEvents   = '��� ������';
$zmSlangFilterEmailEvents    = '��� ���� �� �� �������';
$zmSlangFilterExecuteEvents  = 'Execute command on all matches';
$zmSlangFilterMessageEvents  = 'Message details of all matches';
$zmSlangFilterPx             = 'Filter Px';
$zmSlangFilters              = '������';
$zmSlangFilterUnset          = '���� ����� ���� ����� ����';
$zmSlangFilterUploadEvents   = '��� �� �� �������';
$zmSlangFilterVideoEvents    = '��� ����� ��� �������';
$zmSlangFirst                = '������';
$zmSlangFlippedHori          = 'Flipped Horizontally';
$zmSlangFlippedVert          = 'Flipped Vertically';
$zmSlangFocus                = '�����';
$zmSlangForceAlarm           = '����&nbsp;�����';
$zmSlangFormat               = '�����';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'FPS Report Interval';
$zmSlangFrame                = '�����';
$zmSlangFrameId              = 'Frame Id';
$zmSlangFrameRate            = 'Frame Rate';
$zmSlangFrames               = '�������';
$zmSlangFrameSkip            = '��� �����';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = '����';
$zmSlangFunction             = '�������';
$zmSlangGain                 = 'Gain';
$zmSlangGeneral              = '����';
$zmSlangGenerateVideo        = '��� �����';
$zmSlangGeneratingVideo      = '����� �����';
$zmSlangGoToZoneMinder       = '��� ZoneMinder.com';
$zmSlangGrey                 = '����';
$zmSlangGroup                = '�����';
$zmSlangGroups               = '������';
$zmSlangHasFocusSpeed        = 'Has Focus Speed';
$zmSlangHasGainSpeed         = 'Has Gain Speed';
$zmSlangHasHomePreset        = 'Has Home Preset';
$zmSlangHasIrisSpeed         = 'Has Iris Speed';
$zmSlangHasPanSpeed          = 'Has Pan Speed';
$zmSlangHasPresets           = 'Has Presets';
$zmSlangHasTiltSpeed         = 'Has Tilt Speed';
$zmSlangHasTurboPan          = 'Has Turbo Pan';
$zmSlangHasTurboTilt         = 'Has Turbo Tilt';
$zmSlangHasWhiteSpeed        = 'Has White Bal. Speed';
$zmSlangHasZoomSpeed         = 'Has Zoom Speed';
$zmSlangHighBW               = '����&nbsp;�/�';
$zmSlangHigh                 = '����';
$zmSlangHome                 = '���';
$zmSlangHour                 = '���';
$zmSlangHue                  = 'Hue';
$zmSlangId                   = '�����';
$zmSlangIdle                 = '�����';
$zmSlangIgnore               = '�����';
$zmSlangImageBufferSize      = 'Image Buffer Size (frames)';
$zmSlangImage                = '�����';
$zmSlangImages               = '������';
$zmSlangInclude              = '����';
$zmSlangIn                   = '����';
$zmSlangInverted             = '����';
$zmSlangIris                 = 'Iris';
$zmSlangKeyString            = '������ ����';
$zmSlangLabel                = '�����';
$zmSlangLanguage             = '���';
$zmSlangLast                 = '�����';
$zmSlangLimitResultsPost     = '������ ����;'; // This is used at the end of the phrase 'Limit to first N results only'
$zmSlangLimitResultsPre      = '���� ������'; // This is used at the beginning of the phrase 'Limit to first N results only'
$zmSlangLinkedMonitors       = '��������� �������';
$zmSlangList                 = '�����';
$zmSlangLoad                 = '���';
$zmSlangLocal                = '�����';
$zmSlangLoggedInAs           = '����� �';
$zmSlangLoggingIn            = '�����';
$zmSlangLogin                = '�����';
$zmSlangLogout               = '�����';
$zmSlangLowBW                = '����&nbsp;�/�';
$zmSlangLow                  = '����';
$zmSlangMain                 = '�����';
$zmSlangMan                  = '�����';
$zmSlangManual               = '�����';
$zmSlangMark                 = '���';
$zmSlangMaxBandwidth         = '���� �� ���';
$zmSlangMaxBrScore           = '�����<br/>�������';
$zmSlangMaxFocusRange        = 'Max Focus Range';
$zmSlangMaxFocusSpeed        = 'Max Focus Speed';
$zmSlangMaxFocusStep         = 'Max Focus Step';
$zmSlangMaxGainRange         = 'Max Gain Range';
$zmSlangMaxGainSpeed         = 'Max Gain Speed';
$zmSlangMaxGainStep          = 'Max Gain Step';
$zmSlangMaximumFPS           = 'Maximum FPS';
$zmSlangMaxIrisRange         = 'Max Iris Range';
$zmSlangMaxIrisSpeed         = 'Max Iris Speed';
$zmSlangMaxIrisStep          = 'Max Iris Step';
$zmSlangMax                  = '���';
$zmSlangMaxPanRange          = 'Max Pan Range';
$zmSlangMaxPanSpeed          = 'Max Pan Speed';
$zmSlangMaxPanStep           = 'Max Pan Step';
$zmSlangMaxTiltRange         = 'Max Tilt Range';
$zmSlangMaxTiltSpeed         = 'Max Tilt Speed';
$zmSlangMaxTiltStep          = 'Max Tilt Step';
$zmSlangMaxWhiteRange        = 'Max White Bal. Range';
$zmSlangMaxWhiteSpeed        = 'Max White Bal. Speed';
$zmSlangMaxWhiteStep         = 'Max White Bal. Step';
$zmSlangMaxZoomRange         = 'Max Zoom Range';
$zmSlangMaxZoomSpeed         = 'Max Zoom Speed';
$zmSlangMaxZoomStep          = 'Max Zoom Step';
$zmSlangMediumBW             = 'Medium&nbsp;B/W';
$zmSlangMedium               = '������';
$zmSlangMinAlarmAreaLtMax    = 'Minimum alarm area should be less than maximum';
$zmSlangMinAlarmAreaUnset    = 'You must specify the minimum alarm pixel count';
$zmSlangMinBlobAreaLtMax     = 'Minimum blob area should be less than maximum';
$zmSlangMinBlobAreaUnset     = 'You must specify the minimum blob pixel count';
$zmSlangMinBlobLtMinFilter   = 'Minimum blob area should be less than or equal to minimum filter area';
$zmSlangMinBlobsLtMax        = 'Minimum blobs should be less than maximum';
$zmSlangMinBlobsUnset        = 'You must specify the minimum blob count';
$zmSlangMinFilterAreaLtMax   = 'Minimum filter area should be less than maximum';
$zmSlangMinFilterAreaUnset   = 'You must specify the minimum filter pixel count';
$zmSlangMinFilterLtMinAlarm  = 'Minimum filter area should be less than or equal to minimum alarm area';
$zmSlangMinFocusRange        = 'Min Focus Range';
$zmSlangMinFocusSpeed        = 'Min Focus Speed';
$zmSlangMinFocusStep         = 'Min Focus Step';
$zmSlangMinGainRange         = 'Min Gain Range';
$zmSlangMinGainSpeed         = 'Min Gain Speed';
$zmSlangMinGainStep          = 'Min Gain Step';
$zmSlangMinIrisRange         = 'Min Iris Range';
$zmSlangMinIrisSpeed         = 'Min Iris Speed';
$zmSlangMinIrisStep          = 'Min Iris Step';
$zmSlangMinPanRange          = 'Min Pan Range';
$zmSlangMinPanSpeed          = 'Min Pan Speed';
$zmSlangMinPanStep           = 'Min Pan Step';
$zmSlangMinPixelThresLtMax   = 'Minimum pixel threshold should be less than maximum';
$zmSlangMinPixelThresUnset   = 'You must specify a minimum pixel threshold';
$zmSlangMinTiltRange         = 'Min Tilt Range';
$zmSlangMinTiltSpeed         = 'Min Tilt Speed';
$zmSlangMinTiltStep          = 'Min Tilt Step';
$zmSlangMinWhiteRange        = 'Min White Bal. Range';
$zmSlangMinWhiteSpeed        = 'Min White Bal. Speed';
$zmSlangMinWhiteStep         = 'Min White Bal. Step';
$zmSlangMinZoomRange         = 'Min Zoom Range';
$zmSlangMinZoomSpeed         = 'Min Zoom Speed';
$zmSlangMinZoomStep          = 'Min Zoom Step';
$zmSlangMisc                 = 'Misc';
$zmSlangMonitorIds           = 'Monitor&nbsp;Ids';
$zmSlangMonitor              = '�������';
$zmSlangMonitorPresetIntro   = 'Select an appropriate preset from the list below.<br><br>Please note that this may overwrite any values you already have configured for this monitor.<br><br>';
$zmSlangMonitorPreset        = 'Monitor Preset';
$zmSlangMonitors             = '���������';
$zmSlangMontage              = 'Montage';
$zmSlangMonth                = '����';
$zmSlangMove                 = '���';
$zmSlangMustBeGe             = 'must be greater than or equal to';
$zmSlangMustBeLe             = 'must be less than or equal to';
$zmSlangMustConfirmPassword  = 'You must confirm the password';
$zmSlangMustSupplyPassword   = 'You must supply a password';
$zmSlangMustSupplyUsername   = 'You must supply a username';
$zmSlangName                 = '��';
$zmSlangNear                 = '���';
$zmSlangNetwork              = '���';
$zmSlangNewGroup             = '����� ����';
$zmSlangNewLabel             = '����� ����';
$zmSlangNew                  = '���';
$zmSlangNewPassword          = '����� ����';
$zmSlangNewState             = '��� ���';
$zmSlangNewUser              = '����� ���';
$zmSlangNext                 = '���';
$zmSlangNoFramesRecorded     = 'There are no frames recorded for this event';
$zmSlangNoGroup              = '��� �����';
$zmSlangNoneAvailable        = '���� ����';
$zmSlangNone                 = '���';
$zmSlangNo                   = '��';
$zmSlangNormal               = '������';
$zmSlangNoSavedFilters       = 'NoSavedFilters';
$zmSlangNoStatisticsRecorded = 'There are no statistics recorded for this event/frame';
$zmSlangNotes                = 'Notes';
$zmSlangNumPresets           = 'Num Presets';
$zmSlangOff                  = '����';
$zmSlangOn                   = '����';
$zmSlangOpen                 = '���';
$zmSlangOpEq                 = '���� �';
$zmSlangOpGtEq               = 'greater than or equal to';
$zmSlangOpGt                 = '���� �';
$zmSlangOpIn                 = 'in set';
$zmSlangOpLtEq               = 'less than or equal to';
$zmSlangOpLt                 = '���� �';
$zmSlangOpMatches            = 'matches';
$zmSlangOpNe                 = '���� ����';
$zmSlangOpNotIn              = 'not in set';
$zmSlangOpNotMatches         = '���� ����';
$zmSlangOptionHelp           = 'OptionHelp';
$zmSlangOptionRestartWarning = 'These changes may not come into effect fully\nwhile the system is running. When you have\nfinished making your changes please ensure that\nyou restart ZoneMinder.';
$zmSlangOptions              = '��������';
$zmSlangOrder                = '����';
$zmSlangOrEnterNewName       = 'or enter new name';
$zmSlangOrientation          = 'Orientation';
$zmSlangOut                  = 'Out';
$zmSlangOverwriteExisting    = 'Overwrite Existing';
$zmSlangPaged                = 'Paged';
$zmSlangPanLeft              = 'Pan Left';
$zmSlangPan                  = 'Pan';
$zmSlangPanRight             = 'Pan Right';
$zmSlangPanTilt              = 'Pan/Tilt';
$zmSlangParameter            = '�����';
$zmSlangPassword             = '�����';
$zmSlangPasswordsDifferent   = 'The new and confirm passwords are different';
$zmSlangPaths                = '������';
$zmSlangPhoneBW              = '�/�&nbsp;�����';
$zmSlangPhone                = '�����';
$zmSlangPixelDiff            = 'Pixel Diff';
$zmSlangPixels               = '�������';
$zmSlangPlayAll              = '��� ���';
$zmSlangPleaseWait           = '���� �����';
$zmSlangPoint                = '�����';
$zmSlangPostEventImageBuffer = 'Post Event Image Buffer';
$zmSlangPreEventImageBuffer  = 'Pre Event Image Buffer';
$zmSlangPreset               = 'Preset';
$zmSlangPresets              = 'Presets';
$zmSlangPrev                 = '�����';
$zmSlangRate                 = '�����';
$zmSlangReal                 = '�����';
$zmSlangRecord               = '�����';
$zmSlangRefImageBlendPct     = 'Reference Image Blend %ge';
$zmSlangRefresh              = '�����';
$zmSlangRemoteHostName       = '�� ���� �����';
$zmSlangRemoteHostPath       = '���� ���� �����';
$zmSlangRemoteHostPort       = '���� ���� �����';
$zmSlangRemoteImageColours   = 'Remote Image Colours';
$zmSlangRemote               = '�����';
$zmSlangRename               = '��� ��';
$zmSlangReplay               = '��� ���';
$zmSlangResetEventCounts     = 'Reset Event Counts';
$zmSlangReset                = '���';
$zmSlangRestarting           = '�����';
$zmSlangRestart              = '����';
$zmSlangRestrictedCameraIds  = 'Restricted Camera Ids';
$zmSlangRestrictedMonitors   = 'Restricted Monitors';
$zmSlangReturnDelay          = '���� ������';
$zmSlangReturnLocation       = '����� ����';
$zmSlangRotateLeft           = '���� �����';
$zmSlangRotateRight          = '���� �����';
$zmSlangRunMode              = '���� ����';
$zmSlangRunning              = '����';
$zmSlangRunState             = '��� ����';
$zmSlangSaveAs               = '���� ���';
$zmSlangSaveFilter           = '���� ����';
$zmSlangSave                 = '����';
$zmSlangScale                = '�����';
$zmSlangScore                = '�����';
$zmSlangSecs                 = '�����';
$zmSlangSectionlength        = '���� ���';
$zmSlangSelectMonitors       = '��� ���������';
$zmSlangSelect               = '���';
$zmSlangSelfIntersecting     = 'Polygon edges must not intersect';
$zmSlangSetLearnPrefs        = 'Set Learn Prefs'; // This can be ignored for now
$zmSlangSetNewBandwidth      = 'Set New Bandwidth';
$zmSlangSetPreset            = 'Set Preset';
$zmSlangSet                  = '���';
$zmSlangSettings             = '������';
$zmSlangShowFilterWindow     = 'Show Filter Window';
$zmSlangShowTimeline         = 'Show Timeline';
$zmSlangSize                 = '����';
$zmSlangSleep                = '����';
$zmSlangSortAsc              = 'Asc';
$zmSlangSortBy               = 'Sort by';
$zmSlangSortDesc             = 'Desc';
$zmSlangSource               = '����';
$zmSlangSourceType           = '��� ����';
$zmSlangSpeedHigh            = '������ �����';
$zmSlangSpeedLow             = '������ �����';
$zmSlangSpeedMedium          = '����� �������';
$zmSlangSpeed                = '������';
$zmSlangSpeedTurbo           = '������ �����';
$zmSlangStart                = '����';
$zmSlangState                = '���';
$zmSlangStats                = '�����';
$zmSlangStatus               = '�����';
$zmSlangStepLarge            = '��� ����';
$zmSlangStepMedium           = '��� ������';
$zmSlangStepNone             = '�� ����';
$zmSlangStepSmall            = '��� ���';
$zmSlangStep                 = '���';
$zmSlangStills               = '�����';
$zmSlangStopped              = '����';
$zmSlangStop                 = '����';
$zmSlangStream               = '�����';
$zmSlangSubmit               = 'Submit';
$zmSlangSystem               = '�����';
$zmSlangTele                 = '��';
$zmSlangThumbnail            = 'Thumbnail';
$zmSlangTilt                 = 'Tilt';
$zmSlangTimeDelta            = '����� ����';
$zmSlangTimeline             = '�� ���';
$zmSlangTimestampLabelFormat = 'Timestamp Label Format';
$zmSlangTimestampLabelX      = 'Timestamp Label X';
$zmSlangTimestampLabelY      = 'Timestamp Label Y';
$zmSlangTimestamp            = '����� ���';
$zmSlangTimeStamp            = '����� ���';
$zmSlangTime                 = '���';
$zmSlangToday                = '����';
$zmSlangTools                = '����';
$zmSlangTotalBrScore         = '��<br/>�����';
$zmSlangTrackDelay           = 'Track Delay';
$zmSlangTrackMotion          = 'Track Motion';
$zmSlangTriggers             = '�������';
$zmSlangTurboPanSpeed        = 'Turbo Pan Speed';
$zmSlangTurboTiltSpeed       = 'Turbo Tilt Speed';
$zmSlangType                 = '���';
$zmSlangUnarchive            = '���� �����';
$zmSlangUnits                = '������';
$zmSlangUnknown              = '���� ����';
$zmSlangUpdateAvailable      = '����� ����-����� �����.';
$zmSlangUpdateNotNecessary   = '����� ���� �����.';
$zmSlangUpdate               = '�����';
$zmSlangUseFilterExprsPost   = '&nbsp;filter&nbsp;expressions'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = '�����&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = '����� �����';
$zmSlangUsername             = '�� �����';
$zmSlangUsers                = '�������';
$zmSlangUser                 = '�����';
$zmSlangValue                = '���';
$zmSlangVersionIgnore        = '����� ������ ��';
$zmSlangVersionRemindDay     = '���� �� ���� ��� ���';
$zmSlangVersionRemindHour    = '���� �� ���� ��� ���';
$zmSlangVersionRemindNever   = 'Don\'t remind about new versions';
$zmSlangVersionRemindWeek    = 'Remind again in 1 week';
$zmSlangVersion              = '�����';
$zmSlangVideoFormat          = '����� �����';
$zmSlangVideoGenFailed       = 'Video Generation Failed!';
$zmSlangVideoGenFiles        = 'Existing Video Files';
$zmSlangVideoGenNoFiles      = 'No Video Files Found';
$zmSlangVideoGenParms        = 'Video Generation Parameters';
$zmSlangVideoGenSucceeded    = 'Video Generation Succeeded!';
$zmSlangVideoSize            = '���� �����';
$zmSlangVideo                = '�����';
$zmSlangViewAll              = '��� ���';
$zmSlangViewEvent            = '��� �����';
$zmSlangViewPaged            = 'View Paged';
$zmSlangView                 = '���';
$zmSlangWake                 = '���';
$zmSlangWarmupFrames         = 'Warmup Frames';
$zmSlangWatch                = '���';
$zmSlangWebColour            = '��� �������';
$zmSlangWeb                  = '�������';
$zmSlangWeek                 = '����';
$zmSlangWhiteBalance         = 'White Balance';
$zmSlangWhite                = '���';
$zmSlangWide                 = '���';
$zmSlangX10ActivationString  = 'X10 Activation String';
$zmSlangX10InputAlarmString  = 'X10 Input Alarm String';
$zmSlangX10OutputAlarmString = 'X10 Output Alarm String';
$zmSlangX10                  = 'X10';
$zmSlangX                    = 'X';
$zmSlangYes                  = '��';
$zmSlangYouNoPerms           = '��� �� ����� ������ ����� ��.';
$zmSlangY                    = 'Y';
$zmSlangZoneAlarmColour      = 'Alarm Colour (Red/Green/Blue)';
$zmSlangZoneArea             = 'Zone Area';
$zmSlangZoneFilterSize       = 'Filter Width/Height (pixels)';
$zmSlangZoneMinMaxAlarmArea  = 'Min/Max Alarmed Area';
$zmSlangZoneMinMaxBlobArea   = 'Min/Max Blob Area';
$zmSlangZoneMinMaxBlobs      = 'Min/Max Blobs';
$zmSlangZoneMinMaxFiltArea   = 'Min/Max Filtered Area';
$zmSlangZoneMinMaxPixelThres = 'Min/Max Pixel Threshold (0-255)';
$zmSlangZones                = '������';
$zmSlangZone                 = '����';
$zmSlangZoomIn               = '��� �����';
$zmSlangZoomOut              = '��� �����';
$zmSlangZoom                 = '���';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = 'Current login is \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s'; // For example '37 Events' (from Vlang below)
$zmClangLastEvents           = 'Last %1$s %2$s'; // For example 'Last 37 Events' (from Vlang below)
$zmClangLatestRelease        = 'The latest release is v%1$s, you have v%2$s.';
$zmClangMonitorCount         = '%1$s %2$s'; // For example '4 Monitors' (from Vlang below)
$zmClangMonitorFunction      = 'Monitor %1$s Function';
$zmClangRunningRecentVer     = 'You are running the most recent version of ZoneMinder, v%s.';

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
//
// and the zmVlang function decides that the first form is used for counts ending in
// 0, 5-9 or 11-19 and the second form when ending in 1 etc.
//

// Variable arrays expressing plurality, see the zmVlang description above
$zmVlangEvent                = array( 0=>'Events', 1=>'Event', 2=>'Events' );
$zmVlangMonitor              = array( 0=>'Monitors', 1=>'Monitor', 2=>'Monitors' );

// You will need to choose or write a function that can correlate the plurality string arrays
// with variable counts. This is used to conjugate the Vlang arrays above with a number passed
// in to generate the correct noun form.
//
// In languages such as English this is fairly simple 
// Note this still has to be used with printf etc to get the right formating
function zmVlang( $lang_var_array, $count )
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
}

// This is an version that could be used in the Russian example above
// The rules are that the first word form is used if the count ends in
// 0, 5-9 or 11-19. The second form is used then the count ends in 1
// (not including 11 as above) and the third form is used when the 
// count ends in 2-4, again excluding any values ending in 12-14.
// 
// function zmVlang( $lang_var_array, $count )
// {
// 	$secondlastdigit = substr( $count, -2, 1 );
// 	$lastdigit = substr( $count, -1, 1 );
// 	// or
// 	// $secondlastdigit = ($count/10)%10;
// 	// $lastdigit = $count%10;
// 
// 	// Get rid of the special cases first, the teens
// 	if ( $secondlastdigit == 1 && $lastdigit != 0 )
// 	{
// 		return( $lang_var_array[1] );
// 	}
// 	switch ( $lastdigit )
// 	{
// 		case 0 :
// 		case 5 :
// 		case 6 :
// 		case 7 :
// 		case 8 :
// 		case 9 :
// 		{
// 			return( $lang_var_array[1] );
// 			break;
// 		}
// 		case 1 :
// 		{
// 			return( $lang_var_array[2] );
// 			break;
// 		}
// 		case 2 :
// 		case 3 :
// 		case 4 :
// 		{
// 			return( $lang_var_array[3] );
// 			break;
// 		}
// 	}
// 	die( 'Error, unable to correlate variable language string' );
// }

// This is an example of how the function is used in the code which you can uncomment and 
// use to test your custom function.
//$monitors = array();
//$monitors[] = 1; // Choose any number
//echo sprintf( $zmClangMonitorCount, count($monitors), zmVlang( $zmVlangMonitor, count($monitors) ) );

// In this section you can override the default prompt and help texts for the options area
// These overrides are in the form of $zmOlangPrompt<option> and $zmOlangHelp<option>
// where <option> represents the option name minus the initial ZM_
// So for example, to override the help text for ZM_LANG_DEFAULT do
//$zmOlangPromptLANG_DEFAULT = "This is a new prompt for this option";
//$zmOlangHelpLANG_DEFAULT = "This is some new help for this option which will be displayed in the popup window when the ? is clicked";
//

?>
