<?php
//
// ZoneMinder web Swedish language file, $Date$, $Revision$
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

// ZoneMinder Swedish Translation by Mikael Carlsson

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
// header( "Content-Type: text/html; charset=iso-8859-1" );

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
    '24BitColour'          => '24 bitars f�rg',
    '8BitGrey'             => '8 bit gr�skala',
    'Action'               => 'Action',
    'Actual'               => 'Verklig',
    'AddNewControl'        => 'Ny kontroll',
    'AddNewMonitor'        => 'Ny bevakare',
    'AddNewUser'           => 'Ny anv�ndare',
    'AddNewZone'           => 'Ny zon',
    'AlarmBrFrames'        => 'Larm<br/>ramar',
    'AlarmFrameCount'      => 'Larmramsr�knare',
    'AlarmFrame'           => 'Larmram',
    'Alarm'                => 'Larm',
    'AlarmLimits'          => 'Larmgr�nser',
    'AlarmMaximumFPS'      => 'Alarm Maximum FPS',
    'AlarmPx'              => 'Larm Pix',
    'AlarmRGBUnset'        => 'Du m�ste s�tta en lam RGB f�rg',
    'Alert'                => 'Varning',
    'All'                  => 'Alla',
    'ApplyingStateChange'  => 'Aktivera status�ndring',
    'Apply'                => 'L�gg till',
    'ArchArchived'         => 'Arkivera endast',
    'Archive'              => 'Arkiv',
    'Archived'             => 'Arkiverad',
    'ArchUnarchived'       => 'Unarchived Only',
    'Area'                 => 'Area',
    'AreaUnits'            => 'Area (px/%)',
    'AttrAlarmFrames'      => 'Larmramar',
    'AttrArchiveStatus'    => 'Arkivstatus',
    'AttrAvgScore'         => 'Ung. v�rde',
    'AttrCause'            => 'Orsak',
    'AttrDate'             => 'Datum',
    'AttrDateTime'         => 'Datum/Tid',
    'AttrDiskBlocks'       => 'Diskblock',
    'AttrDiskPercent'      => 'Diskprocent',
    'AttrDuration'         => 'L�ngd',
    'AttrFrames'           => 'Ramar',
    'AttrId'               => 'Id',
    'AttrMaxScore'         => 'Max. v�rde',
    'AttrMonitorId'        => 'Bevakningsid',
    'AttrMonitorName'      => 'Bevakningsnamn',
    'AttrName'             => 'Namn',
    'AttrNotes'            => 'Not',
    'AttrSystemLoad'       => 'System Load',
    'AttrTime'             => 'Tid',
    'AttrTotalScore'       => 'Totalv�rde',
    'AttrWeekday'          => 'Veckodag',
    'Auto'                 => 'Auto',
    'AutoStopTimeout'      => 'Auto Stop Timeout',
    'AvgBrScore'           => 'Ung.<br/>tr�ff',
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
    'BadNameChars'         => 'Namn kan endast inneh�lla alfanumeriska tecken, bindestreck och understreck',
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
    'Bandwidth'            => 'Bandbredd',
    'BlobPx'               => 'Blob Px',
    'Blobs'                => 'Blobbar',
    'BlobSizes'            => 'Blobstorlek',
    'Brightness'           => 'Ljusstyrka',
    'Buffers'              => 'Buffrar',
    'CanAutoFocus'         => 'Har autofokus',
    'CanAutoGain'          => 'Har autoniv�',
    'CanAutoIris'          => 'Har autoiris',
    'CanAutoWhite'         => 'Har autovitbalans.',
    'CanAutoZoom'          => 'Har autozoom',
    'CancelForcedAlarm'    => '�ngra tvingande larm',
    'Cancel'               => '�ngra',
    'CanFocusAbs'          => 'Har absolut fokus',
    'CanFocusCon'          => 'har kontinuerlig fokus',
    'CanFocus'             => 'Har fokus',
    'CanFocusRel'          => 'Har relativ fokus',
    'CanGainAbs'           => 'Har absolut niv�',
    'CanGainCon'           => 'Har kontinuerlig niv�',
    'CanGain'              => 'Har niv�',
    'CanGainRel'           => 'Har relativ niv�',
    'CanIrisAbs'           => 'Har absolut iris',
    'CanIrisCon'           => 'Har kontinuerlig iris',
    'CanIris'              => 'Har iris',
    'CanIrisRel'           => 'Har relativ iris',
    'CanMoveAbs'           => 'Har absolut f�rflyttning',
    'CanMoveCon'           => 'Har kontinuerlig f�rflyttning',
    'CanMoveDiag'          => 'Har diagonal f�rflyttning',
    'CanMove'              => 'Har f�rflyttning',
    'CanMoveMap'           => 'Har mappad f�rflyttning',
    'CanMoveRel'           => 'Har relativ f�rflyttning',
    'CanPan'               => 'Har panorering',
    'CanReset'             => 'Har �terst�llning',
    'CanSetPresets'        => 'Har f�rinst�llningar',
    'CanSleep'             => 'Kan vila',
    'CanTilt'              => 'Kan tilta',
    'CanWake'              => 'Kan vakna',
    'CanWhiteAbs'          => 'Har absolut vitbalans',
    'CanWhiteBal'          => 'Kan vitbalans',
    'CanWhiteCon'          => 'Kan kontinuerligt vitbalansera',
    'CanWhite'             => 'Kan vitbalansera',
    'CanWhiteRel'          => 'Kan relativt vitbalansera',
    'CanZoomAbs'           => 'Kan zooma absolut',
    'CanZoomCon'           => 'Kan zooma kontinuerligt',
    'CanZoom'              => 'Kan zooma',
    'CanZoomRel'           => 'Kan zooma realativt',
    'CaptureHeight'        => 'F�ngsth�jd',
    'CapturePalette'       => 'F�ngstpalett',
    'CaptureWidth'         => 'F�ngstbredd',
    'Cause'                => 'Orsak',
    'CheckMethod'          => 'Larmkontrollmetod',
    'ChooseFilter'         => 'V�lj filter',
    'ChoosePreset'         => 'V�lj standard',
    'Close'                => 'St�ng',
    'Colour'               => 'F�rg',
    'Command'              => 'Kommando',
    'Config'               => 'Konfigurera',
    'ConfiguredFor'        => 'Konfigurerad f�r',
    'ConfirmDeleteEvents'  => 'Are you sure you wish to delete the selected events?',
    'ConfirmPassword'      => 'Bekr�fta l�senord',
    'ConjAnd'              => 'och',
    'ConjOr'               => 'eller',
    'Console'              => 'Konsoll',
    'ContactAdmin'         => 'Kontakta din administrat�r f�r detaljer.',
    'Continue'             => 'Forts�tt',
    'Contrast'             => 'Kontrast',
    'ControlAddress'       => 'Kontrolladress',
    'ControlCap'           => 'Control Capability',
    'ControlCaps'          => 'Control Capabilities',
    'ControlDevice'        => 'Kontrollenhet',
    'Control'              => 'Kontroll',
    'Controllable'         => 'Kontrollerbar',
    'ControlType'          => 'Kontrolltyp',
    'Cycle'                => 'Cycle',
    'CycleWatch'           => 'Cycle Watch',
    'Day'                  => 'Dag',
    'Debug'                => 'Avlusa',
    'DefaultRate'          => 'Standard hastighet',
    'DefaultScale'         => 'Standardskala',
    'DefaultView'          => 'Default View',
    'DeleteAndNext'        => 'Radera &amp; N�sta',
    'DeleteAndPrev'        => 'Radera &amp; F�reg.',
    'Delete'               => 'Radera',
    'DeleteSavedFilter'    => 'Radera sparade filter',
    'Description'          => 'Beskrivning',
    'DeviceChannel'        => 'Enhetskanal',
    'DeviceFormat'         => 'Enhetsformat',
    'DeviceNumber'         => 'Enhetsnummer',
    'DevicePath'           => 'Enhetss�kv�g',
    'Devices'              => 'Devices',
    'Dimensions'           => 'Dimensioner',
    'DisableAlarms'        => 'Avaktivera larm',
    'Disk'                 => 'Disk',
    'DonateAlready'        => 'Nej, Jag har redan donerat',
    'DonateEnticement'     => 'Du har k�rt ZoneMinder ett tag nu och f�rhoppningsvis har du sett att det fungerar bra hemma eller p� ditt f�retag. �ven om ZoneMinder �r, och kommer att vara, fri programvara och �ppen kallkod, s� kostar det pengar att utveckla och underh�lla. Om du vill hj�lpa till med framtida utveckling och nya funktioner s� var vanlig och bidrag med en slant. Bidragen �r naturligtvis en option men mycket uppskattade och du kan bidra med precis hur mycket du vill.<br><br>Om du vill ge ett bidrag v�ljer du nedan eller surfar till http://www.zoneminder.com/donate.html.<br><br>Tack f�r att du anv�nder ZoneMinder, gl�m inte att bes�ka forumen p� ZoneMinder.com f�r support och f�rslag om hur du f�r din ZoneMinder att fungera lite b�ttre.',
    'DonateRemindDay'      => 'Inte �n, p�minn om 1 dag',
    'DonateRemindHour'     => 'Inte �n, p�minn om en 1 timme',
    'DonateRemindMonth'    => 'Inte �n, p�minn om 1 m�nad',
    'DonateRemindNever'    => 'Nej, Jag vill inte donera, p�minn mig inte mer',
    'DonateRemindWeek'     => 'Inte �n, p�minn om 1 vecka',
    'Donate'               => 'Var v�nlig och donera',
    'DonateYes'            => 'Ja, jag vill g�rna donera nu',
    'Download'             => 'Ladda ner',
    'Duration'             => 'L�ngd',
    'Edit'                 => 'Redigera',
    'Email'                => 'E-post',
    'EnableAlarms'         => 'Aktivera larm',
    'Enabled'              => 'Aktiverad',
    'EnterNewFilterName'   => 'Mata in nytt filternamn',
    'ErrorBrackets'        => 'Fel, kontrollera att du har samma antal v�nster som h�ger-hakar',
    'Error'                => 'Fel',
    'ErrorValidValue'      => 'Fel, kontrollera att alla terms har giltligt v�rde',
    'Etc'                  => 'etc',
    'EventFilter'          => 'H�ndelsefilter',
    'Event'                => 'H�ndelse',
    'EventId'              => 'H�ndelse nr',
    'EventName'            => 'H�ndelsenamn',
    'EventPrefix'          => 'H�ndelseprefix',
    'Events'               => 'H�ndelser',
    'Exclude'              => 'Exkludera',
    'Execute'              => 'Execute',
    'ExportDetails'        => 'Exportera h�ndelsedetaljer',
    'Export'               => 'Exportera',
    'ExportFailed'         => 'Exporten misslyckades',
    'ExportFormat'         => 'Exportera fileformat',
    'ExportFormatTar'      => 'Tar',
    'ExportFormatZip'      => 'Zip',
    'ExportFrames'         => 'Exportera ramdetaljer',
    'ExportImageFiles'     => 'Exportera bildfiler',
    'Exporting'            => 'Exporterar',
    'ExportMiscFiles'      => 'Exportera andra filer (om dom finns)',
    'ExportOptions'        => 'Konfiguera export',
    'ExportVideoFiles'     => 'Exportera videofiler (om dom finns)',
    'Far'                  => 'Far',
    'FastForward'          => 'Fast Forward',
    'Feed'                 => 'Matning',
    'FileColours'          => 'Filf�rg',
    'File'                 => 'Fil',
    'FilePath'             => 'S�kvag',
    'FilterArchiveEvents'  => 'Arkivera alla tr�ffar',
    'FilterDeleteEvents'   => 'Radera alla tr�ffar',
    'FilterEmailEvents'    => 'Skicka e-post med detaljer om alla tr�ffar',
    'FilterExecuteEvents'  => 'Exekvera kommando p� alla tr�ffar',
    'FilterMessageEvents'  => 'Meddela detaljer om alla tr�ffar',
    'FilterPx'             => 'Filter Px',
    'Filters'              => 'Filter',
    'FilterUnset'          => 'Du m�ste specificera filtrets bredd och h�jd',
    'FilterUploadEvents'   => 'Ladda upp alla tr�ffar',
    'FilterVideoEvents'    => 'Skapa video f�r alla tr�ffar',
    'First'                => 'F�rst',
    'FlippedHori'          => 'V�nd horisontellt',
    'FlippedVert'          => 'V�nd vertikalt',
    'Focus'                => 'Fokus',
    'ForceAlarm'           => 'Tvinga larm',
    'Format'               => 'Format',
    'FPS'                  => 'fps',
    'FPSReportInterval'    => 'FPS rapportintervall',
    'FrameId'              => 'Ram id',
    'Frame'                => 'Ram',
    'FrameRate'            => 'Ram hastighet',
    'FrameSkip'            => 'Hoppa �ver ram',
    'Frames'               => 'Ramar',
    'FTP'                  => 'FTP',
    'Func'                 => 'Funk',
    'Function'             => 'Funktion',
    'Gain'                 => 'Niv�',
    'General'              => 'Generell',
    'GenerateVideo'        => 'Skapa video',
    'GeneratingVideo'      => 'Skapar video',
    'GoToZoneMinder'       => 'G� till ZoneMinder.com',
    'Grey'                 => 'Gr�',
    'Group'                => 'Group',
    'Groups'               => 'Grupper',
    'HasFocusSpeed'        => 'Har focushastighet',
    'HasGainSpeed'         => 'Har niv�hastighet',
    'HasHomePreset'        => 'Har normalinst�llning',
    'HasIrisSpeed'         => 'Har irishastighet',
    'HasPanSpeed'          => 'Har panoramahastighet',
    'HasPresets'           => 'Har f�rinst�llningar',
    'HasTiltSpeed'         => 'Har tilthastighet',
    'HasTurboPan'          => 'Har turbopanorering',
    'HasTurboTilt'         => 'Har turbotilt',
    'HasWhiteSpeed'        => 'Har vitbalanshastighet',
    'HasZoomSpeed'         => 'Har Zoomhastighet',
    'HighBW'               => 'H�g&nbsp;B/W',
    'High'                 => 'H�g',
    'Home'                 => 'Hem',
    'Hour'                 => 'Timme',
    'Hue'                  => 'Hue',
    'Idle'                 => 'Vila',
    'Id'                   => 'nr',
    'Ignore'               => 'Ignorera',
    'Image'                => 'Bild',
    'ImageBufferSize'      => 'Bildbufferstorlek (ramar)',
    'Images'               => 'Images',
    'Include'              => 'Inkludera',
    'In'                   => 'I',
    'Inverted'             => 'Inverterad',
    'Iris'                 => 'Iris',
    'KeyString'            => 'Key String',
    'Label'                => 'Label',
    'Language'             => 'Spr�k',
    'Last'                 => 'Sist',
    'LimitResultsPost'     => 'resultaten;', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'      => 'Begr�nsa till f�rsta', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'       => 'Linked Monitors',
    'List'                 => 'Lista',
    'Load'                 => 'Belastning',
    'Local'                => 'Lokal',
    'LoggedInAs'           => 'Inloggad som',
    'LoggingIn'            => 'Loggar in',
    'Login'                => 'Logga in',
    'Logout'               => 'Logga ut',
    'LowBW'                => 'L�g&nbsp;B/W',
    'Low'                  => 'L�g',
    'Main'                 => 'Huvudmeny',
    'Man'                  => 'Man',
    'Manual'               => 'Manuell',
    'Mark'                 => 'Markera',
    'MaxBandwidth'         => 'Max bandbredd',
    'MaxBrScore'           => 'Max.<br/>Score',
    'MaxFocusRange'        => 'Max fokusomr�de',
    'MaxFocusSpeed'        => 'Max fokushastighet',
    'MaxFocusStep'         => 'Max fokussteg',
    'MaxGainRange'         => 'Max niv�omr�de',
    'MaxGainSpeed'         => 'Max niv�hastighet',
    'MaxGainStep'          => 'Max niv�steg',
    'MaximumFPS'           => 'Max FPS',
    'MaxIrisRange'         => 'Max irsiomr�de',
    'MaxIrisSpeed'         => 'Max irishastighet',
    'MaxIrisStep'          => 'Max irissteg',
    'Max'                  => 'Max',
    'MaxPanRange'          => 'Max panoramaomr�de',
    'MaxPanSpeed'          => 'Max panoramahastighet',
    'MaxPanStep'           => 'Max panoramasteg',
    'MaxTiltRange'         => 'Max tiltomr�de',
    'MaxTiltSpeed'         => 'Max tilthastighet',
    'MaxTiltStep'          => 'Max tiltsteg',
    'MaxWhiteRange'        => 'Max vitbalansomr�de',
    'MaxWhiteSpeed'        => 'Max vitbalanshastighet',
    'MaxWhiteStep'         => 'Max vitbalanssteg',
    'MaxZoomRange'         => 'Max zoomomr�de',
    'MaxZoomSpeed'         => 'Max zoomhastighet',
    'MaxZoomStep'          => 'Max zoomsteg',
    'MediumBW'             => 'Mellan&nbsp;B/W',
    'Medium'               => 'Mellan',
    'MinAlarmAreaLtMax'    => 'Minsta larmarean skall vara mindre �n st�rsta',
    'MinAlarmAreaUnset'    => 'Du m�ste ange minsta antal larmpixlar',
    'MinBlobAreaLtMax'     => 'Minsta blobarean skall vara mindre �n h�gsta',
    'MinBlobAreaUnset'     => 'Du m�ste ange minsta antalet blobpixlar',
    'MinBlobLtMinFilter'   => 'Minsta blobarean skall vara mindre �n eller lika med minsta filterarean',
    'MinBlobsLtMax'        => 'Minsta antalet blobbar skall vara mindre �n st�rsta',
    'MinBlobsUnset'        => 'Du m�ste ange minsta antalet blobbar',
    'MinFilterAreaLtMax'   => 'Minsta filterarean skall vara mindre �n h�gsta',
    'MinFilterAreaUnset'   => 'Du m�ste ange minsta antal filterpixlar',
    'MinFilterLtMinAlarm'  => 'Minsta filterarean skall vara mindre �n eller lika med minsta larmarean',
    'MinFocusRange'        => 'Min fokusomr�de',
    'MinFocusSpeed'        => 'Min fokushastighet',
    'MinFocusStep'         => 'Min fokussteg',
    'MinGainRange'         => 'Min niv�omr�de',
    'MinGainSpeed'         => 'Min niv�hastighet',
    'MinGainStep'          => 'Min niv�steg',
    'MinIrisRange'         => 'Min irisomr�de',
    'MinIrisSpeed'         => 'Min irishastighet',
    'MinIrisStep'          => 'Min irissteg',
    'MinPanRange'          => 'Min panoramaomr�de',
    'MinPanSpeed'          => 'Min panoramahastighet',
    'MinPanStep'           => 'Min panoramasteg',
    'MinPixelThresLtMax'   => 'Minsta pixel threshold skall vara mindre �n h�gsta',
    'MinPixelThresUnset'   => 'Du m�ste ange minsta pixel threshold',
    'MinTiltRange'         => 'Min tiltomr�de',
    'MinTiltSpeed'         => 'Min tilthastighet',
    'MinTiltStep'          => 'Min tiltsteg',
    'MinWhiteRange'        => 'Min vitbalansomr�de',
    'MinWhiteSpeed'        => 'Min vitbalanshastighet',
    'MinWhiteStep'         => 'Min vitbalanssteg',
    'MinZoomRange'         => 'Min zoomomr�de',
    'MinZoomSpeed'         => 'Min zoomhastighet',
    'MinZoomStep'          => 'Min zoomsteg',
    'Misc'                 => '�vrigt',
    'Monitor'              => 'Bevakning',
    'MonitorIds'           => 'Bevaknings&nbsp;nr',
    'MonitorPreset'        => 'F�rinst�lld bevakning',
    'MonitorPresetIntro'   => 'V�lj en f�rinst�llning fr�n listan.<br><br>Var medveten om att detta kan skriva �ver inst�llningar du redan gjort f�r denna bevakare.<br><br>',
    'Monitors'             => 'Bevakare',
    'Montage'              => 'Montera',
    'Month'                => 'M�nad',
    'Move'                 => 'Flytta',
    'MustBeGe'             => 'm�ste vara st�rre �n eller lika med',
    'MustBeLe'             => 'm�ste vara mindre �n eller lika med',
    'MustConfirmPassword'  => 'Du m�ste bekr�fta l�senordet',
    'MustSupplyPassword'   => 'Du m�ste ange ett l�senord',
    'MustSupplyUsername'   => 'Du m�ste ange ett anv�ndarnamn',
    'Name'                 => 'Namn',
    'Near'                 => 'N�ra',
    'Network'              => 'N�tverk',
    'NewGroup'             => 'Ny grupp',
    'NewLabel'             => 'New Label',
    'New'                  => 'Ny',
    'NewPassword'          => 'Nytt l�senord',
    'NewState'             => 'Nytt l�ge',
    'NewUser'              => 'Ny anv�ndare',
    'Next'                 => 'N�sta',
    'NoFramesRecorded'     => 'Det finns inga ramar inspelade f�r denna h�ndelse',
    'NoGroup'              => 'Ingen grupp',
    'NoneAvailable'        => 'Ingen tillg�nglig',
    'None'                 => 'Ingen',
    'No'                   => 'Nej',
    'Normal'               => 'Normal',
    'NoSavedFilters'       => 'Inga sparade filter',
    'NoStatisticsRecorded' => 'Det finns ingen statistik inspelad f�r denna h�ndelse/ram',
    'Notes'                => 'Not.',
    'NumPresets'           => 'Antal f�rinst�llningar',
    'Off'                  => 'Off',
    'On'                   => 'On',
    'Open'                 => '�ppna',
    'OpEq'                 => 'lika med',
    'OpGtEq'               => 'st�rre �n eller lika med',
    'OpGt'                 => 'st�rre �n',
    'OpIn'                 => 'in set',
    'OpLtEq'               => 'mindre �n eller lika med',
    'OpLt'                 => 'mindre �n',
    'OpMatches'            => 'matchar',
    'OpNe'                 => 'inte lika med',
    'OpNotIn'              => 'inte i set',
    'OpNotMatches'         => 'matchar inte',
    'OptionHelp'           => 'Optionhj�lp',
    'OptionRestartWarning' => 'Dessa �ndringar kommer inte att vara implementerade\nn�r systemet k�rs. N�r du �r klar starta om\n ZoneMinder.',
    'Options'              => 'Alternativ',
    'Order'                => 'Sortera',
    'OrEnterNewName'       => 'eller skriv in nytt namn',
    'Orientation'          => 'Orientation',
    'Out'                  => 'Ut',
    'OverwriteExisting'    => 'Skriv �ver',
    'Paged'                => 'Paged',
    'PanLeft'              => 'Panorera v�nster',
    'Pan'                  => 'Panorera',
    'PanRight'             => 'Panorera h�ger',
    'PanTilt'              => 'Pan/Tilt',
    'Parameter'            => 'Parameter',
    'Password'             => 'L�senord',
    'PasswordsDifferent'   => 'L�senorden skiljer sig �t',
    'Paths'                => 'S�kv�gar',
    'Pause'                => 'Pause',
    'PhoneBW'              => 'Mobil&nbsp;B/W',
    'Phone'                => 'Mobil',
    'PixelDiff'            => 'Pixel Diff',
    'Pixels'               => 'bildpunkter',
    'PlayAll'              => 'Visa alla',
    'Play'                 => 'Play',
    'PleaseWait'           => 'V�nta...',
    'Point'                => 'Punkt',
    'PostEventImageBuffer' => 'Post Event Image Count',
    'PreEventImageBuffer'  => 'Pre Event Image Count',
    'PreserveAspect'       => 'Preserve Aspect Ratio',
    'Preset'               => 'F�rinst�llning',
    'Presets'              => 'F�rinst�llningar',
    'Prev'                 => 'F�reg.',
    'Protocol'             => 'Protocol',
    'Rate'                 => 'Hastighet',
    'Real'                 => 'Verklig',
    'Record'               => 'Spela in',
    'RefImageBlendPct'     => 'Reference Image Blend %ge',
    'Refresh'              => 'Uppdatera',
    'Remote'               => 'Fj�rr',
    'RemoteHostName'       => 'Fj�rrnamn',
    'RemoteHostPath'       => 'Fj�rrs�kv�g',
    'RemoteHostPort'       => 'Fj�rrport',
    'RemoteImageColours'   => 'Fj�rrbildf�rger',
    'Rename'               => 'Byt namn',
    'ReplayAll'            => 'All Events',
    'ReplayGapless'        => 'Gapless Events',
    'Replay'               => 'Replay',
    'Replay'               => 'Repris',
    'ReplaySingle'         => 'Single Event',
    'ResetEventCounts'     => '�terst�ll h�ndelser�knare',
    'Reset'                => '�terst�ll',
    'Restarting'           => '�terstartar',
    'Restart'              => '�terstart',
    'RestrictedCameraIds'  => 'Begr�nsade kameranr.',
    'RestrictedMonitors'   => 'Restricted Monitors',
    'ReturnDelay'          => 'F�rdr�jd retur',
    'ReturnLocation'       => '�terv�nd till position',
    'Rewind'               => 'Rewind',
    'RotateLeft'           => 'Rotera v�nster',
    'RotateRight'          => 'Rotera h�ger',
    'RunMode'              => 'K�rl�ge',
    'Running'              => 'K�rs',
    'RunState'             => 'K�rl�ge',
    'SaveAs'               => 'Spara som',
    'SaveFilter'           => 'Spara filter',
    'Save'                 => 'Spara',
    'Scale'                => 'Skala',
    'Score'                => 'Resultat',
    'Secs'                 => 'Sek',
    'Sectionlength'        => 'Sektionsl�ngd',
    'SelectMonitors'       => 'Select Monitors',
    'Select'               => 'V�lj',
    'SelfIntersecting'     => 'Polygon�ndarna f�r inte �verlappa',
    'SetLearnPrefs'        => 'Set Learn Prefs', // This can be ignored for now
    'SetNewBandwidth'      => 'St�ll in ny bandbredd',
    'SetPreset'            => 'St�ll in f�rinst�llning',
    'Set'                  => 'St�ll in',
    'Settings'             => 'Inst�llningar',
    'ShowFilterWindow'     => 'Visa f�nsterfilter',
    'ShowTimeline'         => 'Visa tidslinje',
    'SignalCheckColour'    => 'Signal Check Colour',
    'Size'                 => 'Storlek',
    'Sleep'                => 'Vila',
    'SortAsc'              => 'Stigande',
    'SortBy'               => 'Sortera',
    'SortDesc'             => 'Fallande',
    'Source'               => 'K�lla',
    'SourceType'           => 'K�lltyp',
    'Speed'                => 'Hastighet',
    'SpeedHigh'            => 'H�ghastighet',
    'SpeedLow'             => 'L�ghastighet',
    'SpeedMedium'          => 'Normalhastighet',
    'SpeedTurbo'           => 'Turbohastighet',
    'Start'                => 'Start',
    'State'                => 'L�ge',
    'Stats'                => 'Statistik',
    'Status'               => 'Status',
    'StepBack'             => 'Step Back',
    'StepForward'          => 'Step Forward',
    'StepLarge'            => 'Stora steg',
    'StepMedium'           => 'Normalsteg',
    'StepNone'             => 'Inga steg',
    'StepSmall'            => 'Sm� steg',
    'Step'                 => 'Steg',
    'Stills'               => 'Stillbilder',
    'Stopped'              => 'Stoppad',
    'Stop'                 => 'Stopp',
    'StreamReplayBuffer'   => 'Stream Replay Image Buffer',
    'Stream'               => 'Str�mmande',
    'Submit'               => 'Skicka',
    'System'               => 'System',
    'Tele'                 => 'Tele',
    'Thumbnail'            => 'Miniatyrer',
    'Tilt'                 => 'Tilt',
    'TimeDelta'            => 'tidsdelta',
    'Timeline'             => 'Tidslinje',
    'TimestampLabelFormat' => 'Format p� tidsst�mpel',
    'TimestampLabelX'      => 'V�rde p� tidsst�mpel X',
    'TimestampLabelY'      => 'V�rde p� tidsst�mpel Y',
    'Timestamp'            => 'Tidsst�mpel',
    'TimeStamp'            => 'Tidsst�mpel',
    'Time'                 => 'Tid',
    'Today'                => 'Idag',
    'Tools'                => 'Verktyg',
    'TotalBrScore'         => 'Total<br/>Score',
    'TrackDelay'           => 'Sp�rf�rdr�jning',
    'TrackMotion'          => 'Sp�ra r�relse',
    'Triggers'             => 'Triggers',
    'TurboPanSpeed'        => 'Turbo panoramahastighet',
    'TurboTiltSpeed'       => 'Turbo tilthastighet',
    'Type'                 => 'Typ',
    'Unarchive'            => 'Packa upp',
    'Units'                => 'Enheter',
    'Unknown'              => 'Ok�nd',
    'UpdateAvailable'      => 'En uppdatering till ZoneMinder finns tillg�nglig.',
    'UpdateNotNecessary'   => 'Ingen uppdatering beh�vs.',
    'Update'               => 'Uppdatera',
    'UseFilter'            => 'Anv�nd filter',
    'UseFilterExprsPost'   => '&nbsp;filter&nbsp;expressions', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'    => 'Anv�nd&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'User'                 => 'Anv�ndare',
    'Username'             => 'Anv�ndarnamn',
    'Users'                => 'Anv�ndare',
    'Value'                => 'V�rde',
    'VersionIgnore'        => 'Ignorera denna version',
    'VersionRemindDay'     => 'P�minn om 1 dag',
    'VersionRemindHour'    => 'P�minn om 1 timme',
    'VersionRemindNever'   => 'P�minn inte om nya versioner',
    'VersionRemindWeek'    => 'P�minn om en 1 vecka',
    'Version'              => 'Version',
    'VideoFormat'          => 'Videoformat',
    'VideoGenFailed'       => 'Videogenereringen misslyckades!',
    'VideoGenFiles'        => 'Befintliga videofiler',
    'VideoGenNoFiles'      => 'Inga videofiler',
    'VideoGenParms'        => 'Inst�llningar f�r videogenerering',
    'VideoGenSucceeded'    => 'Videogenereringen lyckades!',
    'VideoSize'            => 'Videostorlek',
    'Video'                => 'Video',
    'ViewAll'              => 'Visa alla',
    'ViewEvent'            => 'Visa h�ndelse',
    'ViewPaged'            => 'Visa Paged',
    'View'                 => 'Visa',
    'Wake'                 => 'Vakna',
    'WarmupFrames'         => 'V�rm upp ramar',
    'Watch'                => 'Se',
    'WebColour'            => 'Webbf�rg',
    'Web'                  => 'Webb',
    'Week'                 => 'Vecka',
    'WhiteBalance'         => 'Vitbalans',
    'White'                => 'Vit',
    'Wide'                 => 'Vid',
    'X10ActivationString'  => 'X10 aktiveringsstr�ng',
    'X10InputAlarmString'  => 'X10 larming�ngsstr�ng',
    'X10OutputAlarmString' => 'X10 larmutg�ngsstr�ng',
    'X10'                  => 'X10',
    'X'                    => 'X',
    'Yes'                  => 'Ja',
    'Y'                    => 'J',
    'YouNoPerms'           => 'Du har inte tillst�nd till denna resurs.',
    'ZoneAlarmColour'      => 'Larmf�rg (R�d/Gr�n/Bl�)',
    'ZoneArea'             => 'Zonarea',
    'ZoneFilterSize'       => 'Filterbredd/h�jd (pixlar)',
    'ZoneMinMaxAlarmArea'  => 'Min/Max larmarea',
    'ZoneMinMaxBlobArea'   => 'Min/Max blobbarea',
    'ZoneMinMaxBlobs'      => 'Min/Max blobbar',
    'ZoneMinMaxFiltArea'   => 'Min/Max filterarea',
    'ZoneMinMaxPixelThres' => 'Min/Max pixel Threshold (0-255)',
    'ZoneOverloadFrames'   => 'Overload Frame Ignore Count',
    'Zones'                => 'Zoner',
    'Zone'                 => 'Zon',
    'ZoomIn'               => 'Zooma in',
    'ZoomOut'              => 'Zooma ut',
    'Zoom'                 => 'Zoom',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'         => 'Aktuell inloggning �r \'%1$s\'',
    'EventCount'           => '%1$s %2$s', // For example '37 Events' (from Vlang below)
    'LastEvents'           => 'Senaste %1$s %2$s', // For example 'Last 37 Events' (from Vlang below)
    'LatestRelease'        => 'Aktuell version �r v%1$s, du har v%2$s.',
    'MonitorCount'         => '%1$s %2$s', // For example '4 Monitors' (from Vlang below)
    'MonitorFunction'      => 'Bevakare %1$s funktion',
    'RunningRecentVer'     => 'Du anv�nder den senaste versionen av ZoneMinder, v%s.',
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
//
// and the zmVlang function decides that the first form is used for counts ending in
// 0, 5-9 or 11-19 and the second form when ending in 1 etc.
//

// Variable arrays expressing plurality, see the zmVlang description above
$VLANG = array(
    'Event'                => array( 0=>'H�ndelser', 1=>'H�ndelsen', 2=>'H�ndelserna' ),
    'Monitor'              => array( 0=>'Bevakare', 1=>'Bevakare', 2=>'Bevakare' ),
);

// You will need to choose or write a function that can correlate the plurality string arrays
// with variable counts. This is used to conjugate the Vlang arrays above with a number passed
// in to generate the correct noun form.
//
// In languages such as English this is fairly simple 
// Note this still has to be used with printf etc to get the right formating
function zmVlang( $langVarArray, $count )
{
    krsort( $langVarArray );
    foreach ( $langVarArray as $key=>$value )
    {
        if ( abs($count) >= $key )
        {
            return( $value );
        }
    }
    die( 'Fel, kan inte correlate variabel spr�kstr�ng' );
}

// This is an version that could be used in the Russian example above
// The rules are that the first word form is used if the count ends in
// 0, 5-9 or 11-19. The second form is used then the count ends in 1
// (not including 11 as above) and the third form is used when the 
// count ends in 2-4, again excluding any values ending in 12-14.
// 
// function zmVlang( $langVarArray, $count )
// {
//  $secondlastdigit = substr( $count, -2, 1 );
//  $lastdigit = substr( $count, -1, 1 );
//  // or
//  // $secondlastdigit = ($count/10)%10;
//  // $lastdigit = $count%10;
// 
//  // Get rid of the special cases first, the teens
//  if ( $secondlastdigit == 1 && $lastdigit != 0 )
//  {
//      return( $langVarArray[1] );
//  }
//  switch ( $lastdigit )
//  {
//      case 0 :
//      case 5 :
//      case 6 :
//      case 7 :
//      case 8 :
//      case 9 :
//      {
//          return( $langVarArray[1] );
//          break;
//      }
//      case 1 :
//      {
//          return( $langVarArray[2] );
//          break;
//      }
//      case 2 :
//      case 3 :
//      case 4 :
//      {
//          return( $langVarArray[3] );
//          break;
//      }
//  }
//  die( 'Error, unable to correlate variable language string' );
// }

// This is an example of how the function is used in the code which you can uncomment and 
// use to test your custom function.
//$monitors = array();
//$monitors[] = 1; // Choose any number
//echo sprintf( $zmClangMonitorCount, count($monitors), zmVlang( $zmVlangMonitor, count($monitors) ) );

// In this section you can override the default prompt and help texts for the options area
// These overrides are in the form show below where the array key represents the option name minus the initial ZM_
$OLANG = array(
    'LANG_DEFAULT' => array(
        'Prompt' => "V�lj spr�k f�r ZoneMinder",
        'Help' => "ZoneMinder kan anv�nda annat spr�k �n engelska i menyer och texter. V�lj h�r det spr�k du vill anv�nda till ZoneMinder."
    ),
);

?>
