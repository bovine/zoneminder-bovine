<?php
//
// ZoneMinder web UK English language file, $Date$, $Revision$
// Copyright (C) 2003, 2004, 2005, 2006  Philip Coombes
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
$SLANG = array(
    '24BitColour'          => '24 ������ ����',
    '8BitGrey'             => '256 �������� ������',
    'Action'               => 'Action',
    'Actual'               => '��������������',
    'AddNewControl'        => 'Add New Control',
    'AddNewMonitor'        => '�������� �������',
    'AddNewUser'           => '�������� ������������',
    'AddNewZone'           => '�������� ����',
    'Alarm'                => '�������',
    'AlarmBrFrames'        => '�����<br/>�������',
    'AlarmFrame'           => '���� �������',
    'AlarmFrameCount'      => 'Alarm Frame Count',
    'AlarmLimits'          => '����.&nbsp;����&nbsp;����.',
    'AlarmMaximumFPS'      => 'Alarm Maximum FPS',
    'AlarmPx'              => '���&nbsp;����.',
    'AlarmRGBUnset'        => 'You must set an alarm RGB colour',
    'Alert'                => '���������',
    'All'                  => '���',
    'Apply'                => '���������',
    'ApplyingStateChange'  => '��������� ������� ����������',
    'ArchArchived'         => '������ � ������',
    'Archive'              => '�����',
    'Archived'             => 'Archived',
    'ArchUnarchived'       => '������ �� � ������',
    'Area'                 => 'Area',
    'AreaUnits'            => 'Area (px/%)',
    'AttrAlarmFrames'      => '���-�� ������ �������',
    'AttrArchiveStatus'    => '������ ���������',
    'AttrAvgScore'         => '����. ������',
    'AttrCause'            => 'Cause',
    'AttrDate'             => '����',
    'AttrDateTime'         => '����/�����',
    'AttrDiskBlocks'       => 'Disk Blocks',
    'AttrDiskPercent'      => 'Disk Percent',
    'AttrDuration'         => '������������',
    'AttrFrames'           => '���-�� ������',
    'AttrId'               => 'Id',
    'AttrMaxScore'         => '����. ������',
    'AttrMonitorId'        => 'Id ��������',
    'AttrMonitorName'      => '�������� ��������',
    'AttrMontage'          => '������',
    'AttrName'             => 'Name',
    'AttrNotes'            => 'Notes',
    'AttrSystemLoad'       => 'System Load',
    'AttrTime'             => '�����',
    'AttrTotalScore'       => '����. ������',
    'AttrWeekday'          => '���� ������',
    'Auto'                 => 'Auto',
    'AutoStopTimeout'      => 'Auto Stop Timeout',
    'AvgBrScore'           => '����.<br/>������',
    'Background'           => 'Background',
    'BackgroundFilter'     => 'Run filter in background',
    'BadAlarmFrameCount'   => 'Alarm frame count must be an integer of one or more',
    'BadAlarmMaxFPS'       => 'Alarm Maximum FPS must be a positive integer or floating point value',
    'BadChannel'           => 'Channel must be set to an integer of zero or more',
    'BadDevice'            => 'Device must be set to a valid value',
    'BadFormat'            => 'Format must be set to an integer of zero or more',
    'BadFPSReportInterval' => 'FPS report interval buffer count must be an integer of 100 or more',
    'BadFrameSkip'         => 'Frame skip count must be an integer of zero or more',
    'BadHeight'            => 'Height must be set to a valid value',
    'BadHost'              => 'Host must be set to a valid ip address or hostname, do not include http://',
    'BadImageBufferCount'  => 'Image buffer size must be an integer of 10 or more',
    'BadLabelX'            => 'Label X co-ordinate must be set to an integer of zero or more',
    'BadLabelY'            => 'Label Y co-ordinate must be set to an integer of zero or more',
    'BadMaxFPS'            => 'Maximum FPS must be a positive integer or floating point value',
    'BadNameChars'         => 'Names may only contain alphanumeric characters plus hyphen and underscore',
    'BadPath'              => 'Path must be set to a valid value',
    'BadPort'              => 'Port must be set to a valid number',
    'BadPostEventCount'    => 'Post event image count must be an integer of zero or more',
    'BadPreEventCount'     => 'Pre event image count must be at least zero, and less than image buffer size',
    'BadRefBlendPerc'      => 'Reference blend percentage must be a positive integer',
    'BadSectionLength'     => 'Section length must be an integer of 30 or more',
    'BadSignalCheckColour' => 'Signal check colour must be a valid RGB colour string',
    'BadStreamReplayBuffer'=> 'Stream replay buffer must be an integer of zero or more',
    'BadWarmupCount'       => 'Warmup frames must be an integer of zero or more',
    'BadWebColour'         => 'Web colour must be a valid web colour string',
    'BadWidth'             => 'Width must be set to a valid value',
    'Bandwidth'            => '�����',
    'BlobPx'               => '��� �������',
    'Blobs'                => '���-�� ��������',
    'BlobSizes'            => '������ ��������',
    'Brightness'           => '�������',
    'Buffers'              => '������',
    'CanAutoFocus'         => 'Can Auto Focus',
    'CanAutoGain'          => 'Can Auto Gain',
    'CanAutoIris'          => 'Can Auto Iris',
    'CanAutoWhite'         => 'Can Auto White Bal.',
    'CanAutoZoom'          => 'Can Auto Zoom',
    'Cancel'               => '��������',
    'CancelForcedAlarm'    => '�������� ������������� �������',
    'CanFocusAbs'          => 'Can Focus Absolute',
    'CanFocus'             => 'Can Focus',
    'CanFocusCon'          => 'Can Focus Continuous',
    'CanFocusRel'          => 'Can Focus Relative',
    'CanGainAbs'           => 'Can Gain Absolute',
    'CanGain'              => 'Can Gain ',
    'CanGainCon'           => 'Can Gain Continuous',
    'CanGainRel'           => 'Can Gain Relative',
    'CanIrisAbs'           => 'Can Iris Absolute',
    'CanIris'              => 'Can Iris',
    'CanIrisCon'           => 'Can Iris Continuous',
    'CanIrisRel'           => 'Can Iris Relative',
    'CanMoveAbs'           => 'Can Move Absolute',
    'CanMove'              => 'Can Move',
    'CanMoveCon'           => 'Can Move Continuous',
    'CanMoveDiag'          => 'Can Move Diagonally',
    'CanMoveMap'           => 'Can Move Mapped',
    'CanMoveRel'           => 'Can Move Relative',
    'CanPan'               => 'Can Pan' ,
    'CanReset'             => 'Can Reset',
    'CanSetPresets'        => 'Can Set Presets',
    'CanSleep'             => 'Can Sleep',
    'CanTilt'              => 'Can Tilt',
    'CanWake'              => 'Can Wake',
    'CanWhiteAbs'          => 'Can White Bal. Absolute',
    'CanWhiteBal'          => 'Can White Bal.',
    'CanWhite'             => 'Can White Balance',
    'CanWhiteCon'          => 'Can White Bal. Continuous',
    'CanWhiteRel'          => 'Can White Bal. Relative',
    'CanZoomAbs'           => 'Can Zoom Absolute',
    'CanZoom'              => 'Can Zoom',
    'CanZoomCon'           => 'Can Zoom Continuous',
    'CanZoomRel'           => 'Can Zoom Relative',
    'CaptureHeight'        => '������ �� Y',
    'CapturePalette'       => '����� �������',
    'CaptureWidth'         => '������ �� X',
    'Cause'                => 'Cause',
    'CheckMethod'          => '����� �������� �������',
    'ChooseFilter'         => '������� ������',
    'ChoosePreset'         => 'Choose Preset',
    'Close'                => '�������',
    'Colour'               => '����',
    'Command'              => 'Command',
    'Config'               => 'Config',
    'ConfiguredFor'        => '�������� ��',
    'ConfirmDeleteEvents'  => 'Are you sure you wish to delete the selected events?',
    'ConfirmPassword'      => '����������� ������',
    'ConjAnd'              => '�',
    'ConjOr'               => '���',
    'Console'              => '������',
    'ContactAdmin'         => '���������� ���������� � ������ ��������������.',
    'Continue'             => 'Continue',
    'Contrast'             => '��������',
    'ControlAddress'       => 'Control Address',
    'ControlCap'           => 'Control Capability',
    'ControlCaps'          => 'Control Capabilities',
    'Control'              => 'Control',
    'ControlDevice'        => 'Control Device',
    'Controllable'         => 'Controllable',
    'ControlType'          => 'Control Type',
    'Cycle'                => 'Cycle',
    'CycleWatch'           => '����������� ��������',
    'Day'                  => '����',
    'Debug'                => 'Debug',
    'DefaultRate'          => 'Default Rate',
    'DefaultScale'         => 'Default Scale',
    'DefaultView'          => 'Default View',
    'Delete'               => '�������',
    'DeleteAndNext'        => '������� &amp; ����.',
    'DeleteAndPrev'        => '������� &amp; ����.',
    'DeleteSavedFilter'    => '������� ����������� ������',
    'Description'          => '��������',
    'DeviceChannel'        => '�����',
    'DeviceFormat'         => '������',
    'DeviceNumber'         => '����� ����������',
    'DevicePath'           => 'Device Path',
    'Devices'              => 'Devices',
    'Dimensions'           => '�������',
    'DisableAlarms'        => 'Disable Alarms',
    'Disk'                 => 'Disk',
    'DonateAlready'        => 'No, I\'ve already donated',
    'DonateEnticement'     => 'You\'ve been running ZoneMinder for a while now and hopefully are finding it a useful addition to your home or workplace security. Although ZoneMinder is, and will remain, free and open source, it costs money to develop and support. If you would like to help support future development and new features then please consider donating. Donating is, of course, optional but very much appreciated and you can donate as much or as little as you like.<br><br>If you would like to donate please select the option below or go to http://www.zoneminder.com/donate.html in your browser.<br><br>Thank you for using ZoneMinder and don\'t forget to visit the forums on ZoneMinder.com for support or suggestions about how to make your ZoneMinder experience even better.',
    'Donate'               => 'Please Donate',
    'DonateRemindDay'      => 'Not yet, remind again in 1 day',
    'DonateRemindHour'     => 'Not yet, remind again in 1 hour',
    'DonateRemindMonth'    => 'Not yet, remind again in 1 month',
    'DonateRemindNever'    => 'No, I don\'t want to donate, never remind',
    'DonateRemindWeek'     => 'Not yet, remind again in 1 week',
    'DonateYes'            => 'Yes, I\'d like to donate now',
    'Download'             => 'Download',
    'Duration'             => '������������',
    'Edit'                 => '��������������',
    'Email'                => 'Email',
    'EnableAlarms'         => 'Enable Alarms',
    'Enabled'              => '��������',
    'EnterNewFilterName'   => '������� ����� �������� �������',
    'Error'                => '������',
    'ErrorBrackets'        => '������: ���������� ����������� � ����������� ������ ������ ���� ����������',
    'ErrorValidValue'      => '������: ��������� ��� ��� ����� ����� �������������� ��������',
    'Etc'                  => '� �.�.',
    'Event'                => '�������',
    'EventFilter'          => '������ �������',
    'EventId'              => 'Event Id',
    'EventName'            => 'Event Name',
    'EventPrefix'          => 'Event Prefix',
    'Events'               => '�������',
    'Exclude'              => '���������',
    'Execute'              => 'Execute',
    'ExportDetails'        => 'Export Event Details',
    'Export'               => 'Export',
    'ExportFailed'         => 'Export Failed',
    'ExportFormat'         => 'Export File Format',
    'ExportFormatTar'      => 'Tar',
    'ExportFormatZip'      => 'Zip',
    'ExportFrames'         => 'Export Frame Details',
    'ExportImageFiles'     => 'Export Image Files',
    'Exporting'            => 'Exporting',
    'ExportMiscFiles'      => 'Export Other Files (if present)',
    'ExportOptions'        => 'Export Options',
    'ExportVideoFiles'     => 'Export Video Files (if present)',
    'Far'                  => 'Far',
    'FastForward'          => 'Fast Forward',
    'Feed'                 => 'Feed',
    'FileColours'          => 'File Colours',
    'File'                 => 'File',
    'FilePath'             => 'File Path',
    'FilterArchiveEvents'  => 'Archive all matches',
    'FilterDeleteEvents'   => 'Delete all matches',
    'FilterEmailEvents'    => 'Email details of all matches',
    'FilterExecuteEvents'  => 'Execute command on all matches',
    'FilterMessageEvents'  => 'Message details of all matches',
    'FilterPx'             => '��� �������',
    'Filters'              => 'Filters',
    'FilterUnset'          => 'You must specify a filter width and height',
    'FilterUploadEvents'   => 'Upload all matches',
    'FilterVideoEvents'    => 'Create video for all matches',
    'First'                => '������',
    'FlippedHori'          => 'Flipped Horizontally',
    'FlippedVert'          => 'Flipped Vertically',
    'Focus'                => 'Focus',
    'ForceAlarm'           => '�������� �������',
    'Format'               => 'Format',
    'FPS'                  => '�/c',
    'FPSReportInterval'    => '������ ���������� ��������� ��������',
    'Frame'                => '����',
    'FrameId'              => 'Id �����',
    'FrameRate'            => '��������',
    'Frames'               => '�����',
    'FrameSkip'            => '���������� �����',
    'FTP'                  => 'FTP',
    'Func'                 => '����.',
    'Function'             => '�������',
    'Gain'                 => 'Gain',
    'General'              => 'General',
    'GenerateVideo'        => '������������ �����',
    'GeneratingVideo'      => '������������ �����',
    'GoToZoneMinder'       => '������� �� ZoneMinder.com',
    'Grey'                 => '�/�',
    'Group'                => 'Group',
    'Groups'               => 'Groups',
    'HasFocusSpeed'        => 'Has Focus Speed',
    'HasGainSpeed'         => 'Has Gain Speed',
    'HasHomePreset'        => 'Has Home Preset',
    'HasIrisSpeed'         => 'Has Iris Speed',
    'HasPanSpeed'          => 'Has Pan Speed',
    'HasPresets'           => 'Has Presets',
    'HasTiltSpeed'         => 'Has Tilt Speed',
    'HasTurboPan'          => 'Has Turbo Pan',
    'HasTurboTilt'         => 'Has Turbo Tilt',
    'HasWhiteSpeed'        => 'Has White Bal. Speed',
    'HasZoomSpeed'         => 'Has Zoom Speed',
    'High'                 => '�������',
    'HighBW'               => '������� �����',
    'Home'                 => 'Home',
    'Hour'                 => '���',
    'Hue'                  => '�������',
    'Id'                   => 'Id',
    'Idle'                 => 'Idle',
    'Ignore'               => '������������',
    'Image'                => '�����������',
    'ImageBufferSize'      => '������ ������ �����������',
    'Images'               => 'Images',
    'Include'              => '��������',
    'In'                   => 'In',
    'Inverted'             => '�������������',
    'Iris'                 => 'Iris',
    'KeyString'            => 'Key String',
    'Label'                => 'Label',
    'Language'             => '����',
    'Last'                 => '���������',
    'LimitResultsPost'     => 'results only;', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'      => 'Limit to first', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'       => 'Linked Monitors',
    'List'                 => 'List',
    'Load'                 => 'Load',
    'Local'                => '���������',
    'LoggedInAs'           => '������������',
    'LoggingIn'            => '���� � �������',
    'Login'                => '�����',
    'Logout'               => '�����',
    'Low'                  => '�����',
    'LowBW'                => '����� �����',
    'Main'                 => 'Main',
    'Man'                  => 'Man',
    'Manual'               => 'Manual',
    'Mark'                 => '�����',
    'Max'                  => '����.',
    'MaxBandwidth'         => 'Max Bandwidth',
    'MaxBrScore'           => '����.<br/>������',
    'MaxFocusRange'        => 'Max Focus Range',
    'MaxFocusSpeed'        => 'Max Focus Speed',
    'MaxFocusStep'         => 'Max Focus Step',
    'MaxGainRange'         => 'Max Gain Range',
    'MaxGainSpeed'         => 'Max Gain Speed',
    'MaxGainStep'          => 'Max Gain Step',
    'MaximumFPS'           => '����������� �������� ������ (�/�)',
    'MaxIrisRange'         => 'Max Iris Range',
    'MaxIrisSpeed'         => 'Max Iris Speed',
    'MaxIrisStep'          => 'Max Iris Step',
    'MaxPanRange'          => 'Max Pan Range',
    'MaxPanSpeed'          => 'Max Pan Speed',
    'MaxPanStep'           => 'Max Pan Step',
    'MaxTiltRange'         => 'Max Tilt Range',
    'MaxTiltSpeed'         => 'Max Tilt Speed',
    'MaxTiltStep'          => 'Max Tilt Step',
    'MaxWhiteRange'        => 'Max White Bal. Range',
    'MaxWhiteSpeed'        => 'Max White Bal. Speed',
    'MaxWhiteStep'         => 'Max White Bal. Step',
    'MaxZoomRange'         => 'Max Zoom Range',
    'MaxZoomSpeed'         => 'Max Zoom Speed',
    'MaxZoomStep'          => 'Max Zoom Step',
    'Medium'               => '�������',
    'MediumBW'             => '������� �����',
    'MinAlarmAreaLtMax'    => 'Minimum alarm area should be less than maximum',
    'MinAlarmAreaUnset'    => 'You must specify the minimum alarm pixel count',
    'MinBlobAreaLtMax'     => '����������� ������� ������� ������ ���� ������ ��� ������������ ������� �������',
    'MinBlobAreaUnset'     => 'You must specify the minimum blob pixel count',
    'MinBlobLtMinFilter'   => 'Minimum blob area should be less than or equal to minimum filter area',
    'MinBlobsLtMax'        => '����������� ����� �������� ������ ���� ������ ��� ������������ ����� ��������',
    'MinBlobsUnset'        => 'You must specify the minimum blob count',
    'MinFilterAreaLtMax'   => 'Minimum filter area should be less than maximum',
    'MinFilterAreaUnset'   => 'You must specify the minimum filter pixel count',
    'MinFilterLtMinAlarm'  => 'Minimum filter area should be less than or equal to minimum alarm area',
    'MinFocusRange'        => 'Min Focus Range',
    'MinFocusSpeed'        => 'Min Focus Speed',
    'MinFocusStep'         => 'Min Focus Step',
    'MinGainRange'         => 'Min Gain Range',
    'MinGainSpeed'         => 'Min Gain Speed',
    'MinGainStep'          => 'Min Gain Step',
    'MinIrisRange'         => 'Min Iris Range',
    'MinIrisSpeed'         => 'Min Iris Speed',
    'MinIrisStep'          => 'Min Iris Step',
    'MinPanRange'          => 'Min Pan Range',
    'MinPanSpeed'          => 'Min Pan Speed',
    'MinPanStep'           => 'Min Pan Step',
    'MinPixelThresLtMax'   => '������ ����� ���-�� �������� ������ ���� ���� �������� ������ ���-�� ��������',
    'MinPixelThresUnset'   => 'You must specify a minimum pixel threshold',
    'MinTiltRange'         => 'Min Tilt Range',
    'MinTiltSpeed'         => 'Min Tilt Speed',
    'MinTiltStep'          => 'Min Tilt Step',
    'MinWhiteRange'        => 'Min White Bal. Range',
    'MinWhiteSpeed'        => 'Min White Bal. Speed',
    'MinWhiteStep'         => 'Min White Bal. Step',
    'MinZoomRange'         => 'Min Zoom Range',
    'MinZoomSpeed'         => 'Min Zoom Speed',
    'MinZoomStep'          => 'Min Zoom Step',
    'Misc'                 => '������',
    'Monitor'              => '�������',
    'MonitorIds'           => 'Id&nbsp;���������',
    'MonitorPresetIntro'   => 'Select an appropriate preset from the list below.<br><br>Please note that this may overwrite any values you already have configured for this monitor.<br><br>',
    'MonitorPreset'        => 'Monitor Preset',
    'Monitors'             => '��������',
    'Montage'              => 'Montage',
    'Month'                => '�����',
    'Move'                 => 'Move',
    'MustBeGe'             => '������ ���� ������ ��� �����',
    'MustBeLe'             => '������ ���� ������ ��� �����',
    'MustConfirmPassword'  => '�� ������ ����������� ������',
    'MustSupplyPassword'   => '�� ������ ������ ������',
    'MustSupplyUsername'   => '�� ������ ������ ��� ������������',
    'Name'                 => '���',
    'Near'                 => 'Near',
    'Network'              => '����',
    'New'                  => '���.',
    'NewGroup'             => 'New Group',
    'NewLabel'             => 'New Label',
    'NewPassword'          => '����� ������',
    'NewState'             => '����� ���������',
    'NewUser'              => '����� ������������',
    'Next'                 => '����.',
    'No'                   => '���',
    'NoFramesRecorded'     => '��� ������� �� ������� ������',
    'NoGroup'              => 'No Group',
    'None'                 => '�����������',
    'NoneAvailable'        => '�� ��������',
    'Normal'               => '����������',
    'NoSavedFilters'       => '��� ����������� ��������',
    'NoStatisticsRecorded' => '���������� �� ����� �������/����� �� ��������',
    'Notes'                => 'Notes',
    'NumPresets'           => 'Num Presets',
    'Off'                  => 'Off',
    'On'                   => 'On',
    'Open'                 => 'Open',
    'OpEq'                 => '�����',
    'OpGt'                 => '������',
    'OpGtEq'               => '������ ���� �����',
    'OpIn'                 => '� ������',
    'OpLt'                 => '������',
    'OpLtEq'               => '������ ��� �����',
    'OpMatches'            => '���������',
    'OpNe'                 => '�� �����',
    'OpNotIn'              => '�� � ������',
    'OpNotMatches'         => '�� ���������',
    'OptionHelp'           => 'OptionHelp',
    'OptionRestartWarning' => '��� ��������� ����������� ������ ����� ����������� ���������.',
    'Options'              => '�����',
    'Order'                => 'Order',
    'OrEnterNewName'       => '��� ������� ����� ���',
    'Orientation'          => '����������',
    'Out'                  => 'Out',
    'OverwriteExisting'    => '������������ ������������',
    'Paged'                => '�� ���������',
    'PanLeft'              => 'Pan Left',
    'Pan'                  => 'Pan',
    'PanRight'             => 'Pan Right',
    'PanTilt'              => 'Pan/Tilt',
    'Parameter'            => '�������',
    'Password'             => '������',
    'PasswordsDifferent'   => '������ �� ���������',
    'Paths'                => '����',
    'Pause'                => 'Pause',
    'PhoneBW'              => '���������� �����',
    'Phone'                => 'Phone',
    'PixelDiff'            => 'Pixel Diff',
    'Pixels'               => '� ��������',
    'PlayAll'              => 'Play All',
    'Play'                 => 'Play',
    'PleaseWait'           => '���������� ���������',
    'Point'                => 'Point',
    'PostEventImageBuffer' => '����� ����� �������',
    'PreEventImageBuffer'  => '����� �� �������',
    'PreserveAspect'       => 'Preserve Aspect Ratio',
    'Preset'               => 'Preset',
    'Presets'              => 'Presets',
    'Prev'                 => '����.',
    'Protocol'             => 'Protocol',
    'Rate'                 => '��������',
    'Real'                 => '��������',
    'Record'               => 'Record',
    'RefImageBlendPct'     => '������������ �������� �����, %',
    'Refresh'              => '��������',
    'Remote'               => '���������',
    'RemoteHostName'       => '��� ���������� �����',
    'RemoteHostPath'       => '���� �� ��������� �����',
    'RemoteHostPort'       => '��������� ����',
    'RemoteImageColours'   => '��������� �� ��������� �����',
    'Rename'               => '�������������',
    'Replay'               => '���������',
    'ReplayAll'            => 'All Events',
    'ReplayGapless'        => 'Gapless Events',
    'Replay'               => 'Replay',
    'ReplaySingle'         => 'Single Event',
    'ResetEventCounts'     => '�������� ������� �������',
    'Reset'                => 'Reset',
    'Restart'              => '�������������',
    'Restarting'           => '���������������',
    'RestrictedCameraIds'  => 'Id ����������� �����',
    'RestrictedMonitors'   => 'Restricted Monitors',
    'ReturnDelay'          => 'Return Delay',
    'ReturnLocation'       => 'Return Location',
    'Rewind'               => 'Rewind',
    'RotateLeft'           => '��������� �����',
    'RotateRight'          => '��������� ������',
    'RunMode'              => '����� ������',
    'Running'              => '�����������',
    'RunState'             => '���������',
    'Save'                 => '���������',
    'SaveAs'               => '��������� ���',
    'SaveFilter'           => '��������� ������',
    'Scale'                => '�������',
    'Score'                => '������',
    'Secs'                 => '���.',
    'Sectionlength'        => '����� ������ (� ������)',
    'SelectMonitors'       => 'Select Monitors',
    'Select'               => 'Select',
    'SelfIntersecting'     => 'Polygon edges must not intersect',
    'SetNewBandwidth'      => '��������� ����� ������ ������',
    'SetPreset'            => 'Set Preset',
    'Set'                  => 'Set',
    'Settings'             => '���������',
    'ShowFilterWindow'     => '�������� ���� �������',
    'ShowTimeline'         => 'Show Timeline',
    'SignalCheckColour'    => 'Signal Check Colour',
    'Size'                 => 'Size',
    'Sleep'                => 'Sleep',
    'SortAsc'              => 'Asc',
    'SortBy'               => 'Sort by',
    'SortDesc'             => 'Desc',
    'Source'               => '��������',
    'SourceType'           => '��� ���������',
    'SpeedHigh'            => 'High Speed',
    'SpeedLow'             => 'Low Speed',
    'SpeedMedium'          => 'Medium Speed',
    'Speed'                => 'Speed',
    'SpeedTurbo'           => 'Turbo Speed',
    'Start'                => '���������',
    'State'                => '���������',
    'Stats'                => '����������',
    'Status'               => '������',
    'StepBack'             => 'Step Back',
    'StepForward'          => 'Step Forward',
    'StepLarge'            => 'Large Step',
    'StepMedium'           => 'Medium Step',
    'StepNone'             => 'No Step',
    'StepSmall'            => 'Small Step',
    'Step'                 => 'Step',
    'Stills'               => '����-�����',
    'Stop'                 => '����������',
    'Stopped'              => '����������',
    'Stream'               => '�����',
    'StreamReplayBuffer'   => 'Stream Replay Image Buffer',
    'Submit'               => 'Submit',
    'System'               => '�������',
    'Tele'                 => 'Tele',
    'Thumbnail'            => 'Thumbnail',
    'Tilt'                 => 'Tilt',
    'Time'                 => '�����',
    'TimeDelta'            => '������������� �����',
    'Timeline'             => 'Timeline',
    'Timestamp'            => '����� �������',
    'TimeStamp'            => '����� �������',
    'TimestampLabelFormat' => '������ �����',
    'TimestampLabelX'      => 'X-���������� �����',
    'TimestampLabelY'      => 'Y-���������� �����',
    'Today'                => 'Today',
    'Tools'                => '�����������',
    'TotalBrScore'         => '����.<br/>������',
    'TrackDelay'           => 'Track Delay',
    'TrackMotion'          => 'Track Motion',
    'Triggers'             => '��������',
    'TurboPanSpeed'        => 'Turbo Pan Speed',
    'TurboTiltSpeed'       => 'Turbo Tilt Speed',
    'Type'                 => '���',
    'Unarchive'            => '��.&nbsp;��&nbsp;������',
    'Units'                => '��. ���������',
    'Unknown'              => 'Unknown',
    'UpdateAvailable'      => '�������� ���������� ZoneMinder',
    'UpdateNotNecessary'   => '���������� �� ���������',
    'Update'               => 'Update',
    'UseFilter'            => '������������ ������',
    'UseFilterExprsPost'   => '&nbsp;���������&nbsp;���&nbsp;�������', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'    => '�����.&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'User'                 => '������������',
    'Username'             => '��� ������������',
    'Users'                => '������������',
    'Value'                => '��������',
    'Version'              => '������',
    'VersionIgnore'        => '������������ ��� ������',
    'VersionRemindDay'     => '��������� ����� ����',
    'VersionRemindHour'    => '��������� ����� ���',
    'VersionRemindNever'   => '�� �������� � ����� �������',
    'VersionRemindWeek'    => '��������� ����� ������',
    'Video'                => '�����',
    'VideoFormat'          => 'Video Format',
    'VideoGenFailed'       => '������ ��������� �����!',
    'VideoGenFiles'        => 'Existing Video Files',
    'VideoGenNoFiles'      => 'No Video Files Found',
    'VideoGenParms'        => '��������� ��������� �����',
    'VideoGenSucceeded'    => 'Video Generation Succeeded!',
    'VideoSize'            => '������ �����������',
    'View'                 => '��������',
    'ViewAll'              => '�����. ���',
    'ViewEvent'            => 'View Event',
    'ViewPaged'            => '�����. �����������',
    'Wake'                 => 'Wake',
    'WarmupFrames'         => '����� ���������',
    'Watch'                => 'Watch',
    'Web'                  => '���������',
    'WebColour'            => 'Web Colour',
    'Week'                 => '������',
    'WhiteBalance'         => 'White Balance',
    'White'                => 'White',
    'Wide'                 => 'Wide',
    'X10ActivationString'  => 'X10 Activation String',
    'X10InputAlarmString'  => 'X10 Input Alarm String',
    'X10OutputAlarmString' => 'X10 Output Alarm String',
    'X10'                  => 'X10',
    'X'                    => 'X',
    'Yes'                  => '��',
    'YouNoPerms'           => '� ��� �� ���������� ���� ��� ������� � ����� �������.',
    'Y'                    => 'Y',
    'Zone'                 => '����',
    'ZoneAlarmColour'      => '���� ������� (Red/Green/Blue)',
    'ZoneArea'             => 'Zone Area',
    'ZoneFilterSize'       => 'Filter Width/Height (pixels)',
    'ZoneMinMaxAlarmArea'  => 'Min/Max Alarmed Area',
    'ZoneMinMaxBlobArea'   => 'Min/Max Blob Area',
    'ZoneMinMaxBlobs'      => 'Min/Max Blobs',
    'ZoneMinMaxFiltArea'   => 'Min/Max Filtered Area',
    'ZoneMinMaxPixelThres' => 'Min/Max Pixel Threshold (0-255)',
    'ZoneOverloadFrames'   => 'Overload Frame Ignore Count',
    'Zones'                => '����',
    'ZoomIn'               => 'Zoom In',
    'ZoomOut'              => 'Zoom Out',
    'Zoom'                 => 'Zoom',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'         => '������� ������������: \'%1$s\'',
    'EventCount'           => '%1$s %2$s', // For example '37 Events' (from Vlang below)
    'LastEvents'           => '��������� %1$s %2$s', // For example 'Last 37 Events' (from Vlang below)
    'LatestRelease'        => '��������� ������: v%1$s, � ��� �����������: v%2$s.',
    'MonitorCount'         => '%1$s %2$s', // For example '4 Monitors' (from Vlang below)
    'MonitorFunction'      => '������� �������� %1$s',
    'RunningRecentVer'     => '� ��� ����������� �������� ������ ZoneMinder, v%s.', 
);

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
$VLANG = array(
    'Event'                => array( 1=>'�������', 2=>'�������', 3=>'�������' ),
    'Monitor'              => array( 1=>'���������', 2=>'�������', 3=>'��������' ),
);

// You will need to choose or write a function that can correlate the plurality string arrays
// with variable counts. This is used to conjugate the Vlang arrays above with a number passed
// in to generate the correct noun form.
//
// In languages such as English this is fairly simple
// Note this still has to be used with printf etc to get the right formating
/*function zmVlang( $langVarArray, $count )
{
    krsort( $langVarArray );
    foreach ( $langVarArray as $key=>$value )
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
function zmVlang( $langVarArray, $count )
{
    $secondlastdigit = ($count/10)%10;
    $lastdigit = $count%10;

    // Get rid of the special cases first, the teens
    if ( $secondlastdigit == 1 && $lastdigit != 0 )
    {
        return( $langVarArray[1] );
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
            return( $langVarArray[1] );
            break;
        }
        case 1 :
    {
            return( $langVarArray[2] );
            break;
        }
        case 2 :
        case 3 :
        case 4 :
        {
            return( $langVarArray[3] );
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
// These overrides are in the form show below where the array key represents the option name minus the initial ZM_
// So for example, to override the help text for ZM_LANG_DEFAULT do
$OLANG = array(
//    'LANG_DEFAULT' => array(
//        'Prompt' => "This is a new prompt for this option",
//        'Help' => "This is some new help for this option which will be displayed in the popup window when the ? is clicked"
//    ),
);

?>
