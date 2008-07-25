<?php
//
// ZoneMinder web HU Hungarian language file, $Date$, $Revision$
// Copyright (C) 2001-2008 Philip Coombes
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

// ZoneMinder Hungarian Translation by szimszon at oregpreshaz dot eu, robi
// version: 0.5 - 2007.12.30. - friss�t�s 1.23.1-hez (robi)
// version: 0.4 - 2007.12.30. - friss�t�s 1.23.0-hoz (robi)
// version: 0.3 - 2006.04.27. - ford�t�s befejez�se, elrendez�se elf�r�shez (robi)
// version: 0.2 - 2006.12.05. - par javitas
// version: 0.1 - 2006.11.27. - sok typoval es par leforditatlan resszel

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
header( "Content-Type: text/html; charset=iso8859-2" );

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
// setlocale( LC_ALL, 'hu_HU' ); //All locale settings 4.3.0 and after
//setlocale( LC_CTYPE, 'hu_HU'); //Character class settings 4.3.0 and after
//setlocale( LC_TIME, 'hu_HU'); //Date and time formatting 4.3.0 and after

setlocale( LC_TIME, 'hu_HU' );
setlocale( LC_ALL, 'hu_HU' );

// Simple String Replacements
$SLANG = array(
    '24BitColour'          => '24 bites sz�n',
    '8BitGrey'             => '8 bit sz�rke�rnyalat',
    'Action'               => 'M�velet',
    'Actual'               => 'T�nyleges',
    'AddNewControl'        => '�j vez�rl�s',
    'AddNewMonitor'        => '�j monitor',
    'AddNewUser'           => '�j felhaszn�l�',
    'AddNewZone'           => '�j z�na',
    'AlarmBrFrames'        => 'Riad�<br/>k�pek',
    'AlarmFrameCount'      => 'Riad� k�pek sz�ma',
    'AlarmFrame'           => 'Riad� k�p',
    'AlarmLimits'          => 'Riaszt�si hat�rok',
    'AlarmMaximumFPS'      => 'Maxim�lis FPS riaszt�sn�l',
    'AlarmPx'              => 'Riad� k�ppont',
    'AlarmRGBUnset'        => 'Be kell �ll�tani egy RGB sz�nt a riaszt�shoz',
    'Alarm'                => 'Riad�',
    'Alert'                => 'Riaszt�s',
    'All'                  => 'Mind',
    'Apply'                => 'Alkalmaz',
    'ApplyingStateChange'  => '�llapot v�lt�s...',
    'ArchArchived'         => 'Csak archiv�lt',
    'Archive'              => 'Archiv�l�s',
    'Archived'             => 'Arch�vum',
    'ArchUnarchived'       => 'Csak archiv�latlan',
    'Area'                 => 'Ter�let',
    'AreaUnits'            => 'Ter�let (px/%)',
    'AttrAlarmFrames'      => 'Riad� k�pkock�k',
    'AttrArchiveStatus'    => 'Archiv�lt �llapot',
    'AttrAvgScore'         => '�tlagos �rt�k',
    'AttrCause'            => 'Okoz�',
    'AttrDate'             => 'D�tum',
    'AttrDateTime'         => 'D�tum/Id�',
    'AttrDiskBlocks'       => 'Lemez blokkok',
    'AttrDiskPercent'      => 'Lemez sz�zal�k',
    'AttrDuration'         => 'Id�tartam',
    'AttrFrames'           => 'K�pkock�k',
    'AttrId'               => 'Azonos�t�',
    'AttrMaxScore'         => 'Max. �rt�k',
    'AttrMonitorId'        => 'Monitor azon.',
    'AttrMonitorName'      => 'Monitor n�v',
    'AttrName'             => 'N�v',
    'AttrNotes'            => 'Megjegyz�s',
    'AttrSystemLoad'       => 'Rendszer terhel�s',
    'AttrTime'             => 'Id�',
    'AttrTotalScore'       => '�ssz. �rt�k',
    'AttrWeekday'          => 'H�tk�znap',
    'Auto'                 => 'Auto',
    'AutoStopTimeout'      => 'Auto meg�ll�si id� t�ll�p�s',
    'AvgBrScore'           => '�tlag<br/>�rt�k',
    'BackgroundFilter'     => 'Sz�r� futtat�sa a h�tt�rben',
    'Background'           => 'H�tt�r',
    'BadAlarmFrameCount'   => 'Riad� k�pek sz�ma 1 vagy nagyobb eg�sz sz�m legyen',
    'BadAlarmMaxFPS'       => 'A riad� maxim�lis FPS sz�ma pozit�v sz�m legyen',
    'BadChannel'           => 'A csatorna sz�ma 0 vagy nagyobb eg�sz sz�m legyen',
    'BadDevice'            => 'Az eszk�z �rt�k val�s legyen',
    'BadFormat'            => 'A t�pus 0 vagy nagyobb eg�sz sz�m legyen',
    'BadFPSReportInterval' => 'FPS inform�ci�s id�k�z puffer sz�ml�l�ja 100 vagy nagyobb eg�sz legyen',
    'BadFrameSkip'         => 'K�pkocka eldob�sok sz�ma 0 vagy nagyobb eg�sz sz�m legyen',
    'BadHeight'            => 'A k�pmagass�g �rv�nyes �rt�k legyen k�ppontban',
    'BadHost'              => 'A hoszt val�s IP c�m vagy hosztn�v legyen, http:// n�lk�l',
    'BadImageBufferCount'  => 'K�p puffer m�rete legyen 10 vagy nagyobb sz�m',
    'BadLabelX'            => 'A cimke X koordin�t�ja legyen 0 vagy nagyobb eg�sz sz�m',
    'BadLabelY'            => 'A cimke Y koordin�t�ja legyen 0 vagy nagyobb eg�sz sz�m',
    'BadMaxFPS'            => 'A maxim�lis FPS null�n�l nagyobb sz�m legyen',
    'BadNameChars'         => 'A n�v csak alfanumerikus karaktereket, plusz-, k�t�-, �s al�h�z�sjelet tartalmazhat',
    'BadPath'              => 'A k�p el�r�si �tvonala val�s legyen',
    'BadPort'              => 'A portsz�m val�s legyen',
    'BadPostEventCount'    => 'Az esem�ny ut�ni k�pek puffere 0 vagy nagyobb eg�sz sz�m legyen',
    'BadPreEventCount'     => 'Az esem�ny el�tti k�pek puffere 0 vagy nagyobb eg�sz sz�m legyen',
    'BadRefBlendPerc'      => 'A referencia k�pkever�k-sz�zal�k pozit�v eg�sz sz�m legyen',
    'BadSectionLength'     => 'Egy egys�g hossza 30 vagy hosszabb legyen',
    'BadSignalCheckColour' => 'A jel ellen�rz�si sz�n egy �rv�nyes RGP k�d kell legyen',
    'BadStreamReplayBuffer'=> 'Folyam visszaj�tsz� puffer 0 vagy nagyobb eg�sz sz�m legyen',
    'BadWarmupCount'       => 'Bemeleg�t� k�pek sz�ma 0 vagy nagyobb eg�sz sz�m legyen',
    'BadWebColour'         => 'A web sz�n �rv�nyes web sz�n k�d legyen',
    'BadWidth'             => 'A k�psz�less�g �rv�nyes �rt�k legyen k�ppontban',
    'Bandwidth'            => 'S�vsz�less�gre',
    'BlobPx'               => 'Blob k�ppont',
    'Blobs'                => 'Blob-ok',
    'BlobSizes'            => 'Blob m�rete',
    'Brightness'           => 'F�nyer�',
    'Buffers'              => 'Pufferek',
    'CanAutoFocus'         => 'Auto f�kusz van',
    'CanAutoGain'          => 'Auto gain van',
    'CanAutoIris'          => 'Auto �risz van',
    'CanAutoWhite'         => 'Van aut�mata feh�r egyens�ly',
    'CanAutoZoom'          => 'Auto zoom van',
    'CancelForcedAlarm'    => 'K�zi riaszt�s le�ll�t�sa',
    'Cancel'               => 'M�gsem',
    'CanFocusAbs'          => 'Tud abszol�t f�kuszt',
    'CanFocusCon'          => 'Tud folyamatos f�kuszt',
    'CanFocusRel'          => 'Tud relat�v f�kuszt',
    'CanFocus'             => 'Tud f�kusz�lni',
    'CanGainAbs'           => 'Tud abszol�t er�s�t�st',
    'CanGainCon'           => 'Tud folyamatos er�s�t�st',
    'CanGainRel'           => 'Tud relat�v er�s�t�st',
    'CanGain'              => 'Tud er�s�teni',
    'CanIrisAbs'           => 'Tud abszolut �riszt',
    'CanIrisCon'           => 'Folyamatosan tud �riszt v�ltoztatni',
    'CanIrisRel'           => 'Relat�ven tud �riszt v�ltoztatni',
    'CanIris'              => 'Tud �riszt v�ltoztatni',
    'CanMoveAbs'           => 'Tud abszolult mozg�st',
    'CanMoveCon'           => 'Folyamatosan tud mozogni',
    'CanMoveDiag'          => 'Diagon�lban tud mozogni',
    'CanMoveMap'           => '�tvonalon tud mozogni',
    'CanMoveRel'           => 'Relat�ven tud mozogni',
    'CanMove'              => 'Tud mozogni',
    'CanPan'               => 'Tud jobb-bal mozg�st' ,
    'CanReset'             => 'Tud alaphelyzetbe j�nni',
    'CanSetPresets'        => 'Tud menteni profilokat',
    'CanSleep'             => 'Tud phihen� �zemm�dot',
    'CanTilt'              => 'Tud fel-le mozg�st',
    'CanWake'              => 'Tud fel�ledni',
    'CanWhiteAbs'          => 'Tud abszolut feh�r egyens�lyt',
    'CanWhiteBal'          => 'Tud feh�r egyens�lyt',
    'CanWhiteCon'          => 'Tud folyamatos feh�r egyens�lyt',
    'CanWhiteRel'          => 'Tud relat�v feh�r egyens�lyt',
    'CanWhite'             => 'Tud feh�r egyens�lyt',
    'CanZoomAbs'           => 'Tud abszolut zoom-ot',
    'CanZoomCon'           => 'Tud folyamatos zoom-ot',
    'CanZoomRel'           => 'Tud relat�v zoom-ot',
    'CanZoom'              => 'Tud zoom-olni',
    'CaptureHeight'        => 'K�pmagass�g',
    'CapturePalette'       => 'Felv�tel sz�n-paletta',
    'CaptureWidth'         => 'K�psz�less�g',
    'Cause'                => 'Okoz�',
    'CheckMethod'          => 'A riaszt�s figyel�s�nek m�dja',
    'ChooseFilter'         => 'V�lassz sz�r�t',
    'ChoosePreset'         => 'V�lassz profilt',
    'Close'                => 'Bez�r',
    'Colour'               => 'Sz�n',
    'Command'              => 'Parancs',
    'Config'               => 'Be�ll�t�s',
    'ConfiguredFor'        => 'Be�ll�tva',
    'ConfirmDeleteEvents'  => 'Biztos benne, hogy t�rli a kiv�lasztott esem�nyeket?',
    'ConfirmPassword'      => 'Jelsz� meger�s�t�s',
    'ConjAnd'              => '�s',
    'ConjOr'               => 'vagy',
    'Console'              => 'Konzol',
    'ContactAdmin'         => 'K�rem vegye fel a kapcsolatot a rendszergazd�val a r�szletek�rt.',
    'Continue'             => 'Folytat�s',
    'Contrast'             => 'Kontraszt',
    'ControlAddress'       => 'Vez�rl�si jogok',
    'ControlCaps'          => 'Vez�rl�si lehet�s�gek',
    'ControlCap'           => 'Vez�rl�si lehet�s�g',
    'ControlDevice'        => 'Vez�rl� eszk�z',
    'Controllable'         => 'Vez�relhet�',
    'ControlType'          => 'Vez�rl�s t�pusa',
    'Control'              => 'Vez�rl�s',
    'Cycle'                => 'K�rkapcsol�s',
    'CycleWatch'           => 'K�rkapcsol�s',
    'Day'                  => 'Napon',
    'Debug'                => 'Nyomon<br>k�vet�s',
    'DefaultRate'          => 'Alap�rtelmezett FPS',
    'DefaultScale'         => 'Alap�rtelmezett ar�ny',
    'DefaultView'          => 'Alap�rtelmezett n�zet',
    'DeleteAndNext'        => 'T�r�l &amp;<br>k�vetkez�',
    'DeleteAndPrev'        => 'T�r�l &amp;<br>el�z�',
    'DeleteSavedFilter'    => 'Mentett sz�r� t�rl�se',
    'Delete'               => 'T�r�l',
    'Description'          => 'Le�r�s',
    'DeviceChannel'        => 'Eszk�z csatorn�ja',
    'DeviceFormat'         => 'Eszk�z form�tuma',
    'DeviceNumber'         => 'Eszk�z sz�m',
    'DevicePath'           => 'Eszk�z el�r�si �tvonala',
    'Devices'              => 'Eszk�z�k',
    'Dimensions'           => 'Dimenzi�k',
    'DisableAlarms'        => 'Riaszt�s tilt�sa',
    'Disk'                 => 'T�rhely',
    'DonateAlready'        => 'Nem, �n m�r t�mogattam',
    'DonateEnticement'     => '�n m�r j� ideje haszn�lja a ZoneMindert rem�lhet�leg hasznos kieg�sz�t�snek tartja h�za vagy munkahelye biztos�t�s�ban. B�r ZoneMinder szabad, ny�lt forr�sk�d�, �s az is marad; a fejleszt�se p�nzbe ker�l. Ha t�mogatni szeretn� a j�v�beni fejleszt�seket �s az �j funkci�kat k�rem t�mogasson. A t�mogat�s teljesen �nk�ntes, de nagyon megbecs�lt �s annyival tud t�mogatni amennyivel k�v�n.<br><br>Ha t�mogatni szertne k�rem v�lasszon az al�bbi lehet�s�gekb�l vagy l�togassa meg a http://www.zoneminder.com/donate.html oldalt.<br><br>K�sz�n�m, hogy haszn�lja a ZoneMinder-t �s ne felejtse el megl�togatni a f�rumokat a ZoneMinder.com oldalon t�mogat�s�rt �s �tletek�rt, hogy tudja m�g jobban haszn�lni a ZoneMinder-t.',
    'Donate'               => 'K�rem t�mogasson',
    'DonateRemindDay'      => 'Nem most, figyelmeztess 1 nap m�lva',
    'DonateRemindHour'     => 'Nem most, figyelmeztess 1 �ra m�lva',
    'DonateRemindMonth'    => 'Nem most, figyelmeztess 1 h�nap m�lva',
    'DonateRemindNever'    => 'Nem akarom t�mogatni, ne is eml�keztess',
    'DonateRemindWeek'     => 'Nem most, figyelmeztess 1 h�t m�lva',
    'DonateYes'            => 'Igen, most szeretn�m t�mogatni',
    'Download'             => 'Let�lt',
    'Duration'             => 'Id�tartam',
    'Edit'                 => 'Szerkeszt',
    'Email'                => 'Email',
    'EnableAlarms'         => 'Riaszt�s felold�sa',
    'Enabled'              => 'Enged�lyezve',
    'EnterNewFilterName'   => '�rd be az �j sz�r� nev�t',
    'ErrorBrackets'        => 'Hiba, ellen�rizd, hogy ugyanannyi nyit� �s z�r� z�r�jel van',
    'Error'                => 'Hiba',
    'ErrorValidValue'      => 'Hiba, ellen�rizd, hogy minden be�ll�t�snak �rv�nyes �rt�ke van',
    'Etc'                  => 'stb',
    'Event'                => 'Esem�ny',
    'EventFilter'          => 'Esem�ny sz�r�',
    'EventId'              => 'Esem�ny azonos�t�',
    'EventName'            => 'Esem�ny n�v',
    'EventPrefix'          => 'Esem�ny el�tag',
    'Events'               => 'Esem�nyek',
    'Exclude'              => 'Kiz�r',
    'Execute'              => 'Futtat',
    'ExportDetails'        => 'Esem�ny adatainak export�l�sa',
    'Export'               => 'Export�l',
    'ExportFailed'         => 'Hib�s export�l�s',
    'ExportFormat'         => 'Export�lt f�jl form�tuma',
    'ExportFormatTar'      => 'TAR',
    'ExportFormatZip'      => 'ZIP',
    'ExportFrames'         => 'K�pek adatainak export�l�sa',
    'ExportImageFiles'     => 'K�pek export�l�sa',
    'Exporting'            => 'Export�l�s...',
    'ExportMiscFiles'      => 'Egy�b f�jlok export�l�sa (ha vannak)',
    'ExportOptions'        => 'Export�l�s be�ll�t�sai',
    'ExportVideoFiles'     => 'Vide� f�jlok export�l�sa (ha vannak)',
    'Far'                  => 'T�vol',
    'FastForward'          => 'El�re teker�s',
    'Feed'                 => 'Folyam',
    'FileColours'          => 'F�jl sz�nei',
    'File'                 => 'F�jl',
    'FilePath'             => 'F�jl el�r�si �tvonala',
    'FilterArchiveEvents'  => 'Minden tal�lat archiv�l�sa',
    'FilterDeleteEvents'   => 'Minden tal�lat t�rl�se',
    'FilterEmailEvents'    => 'Minden tal�lat adatainak elk�ld�se E-mailben',
    'FilterExecuteEvents'  => 'Parancs futtat�sa minden tal�laton',
    'FilterMessageEvents'  => 'Minden tal�lat adatainak �zen�se',
    'FilterPx'             => 'Sz�rt k�pkock�k',
    'Filters'              => 'Sz�r�k',
    'FilterUnset'          => 'Meg kell adnod a sz�r� sz�less�g�t �s magass�g�t',
    'FilterUploadEvents'   => 'Minden tal�lat felt�lt�se',
    'FilterVideoEvents'    => 'Vide� k�sz�t�se minden tal�latr�l',
    'First'                => 'Els�',
    'FlippedHori'          => 'V�zszintes t�kr�z�s',
    'FlippedVert'          => 'F�gg�leges t�kr�z�s',
    'Focus'                => 'F�kusz',
    'ForceAlarm'           => 'K�zi riaszt�s',
    'Format'               => 'Form�tum',
    'FPS'                  => 'fps',
    'FPSReportInterval'    => 'FPS jelent�s id�k�ze',
    'FrameId'              => 'K�pkocka azonos�t�',
    'Frame'                => 'K�pkocka',
    'FrameRate'            => 'FPS',
    'FrameSkip'            => 'K�pk. kihagy�s',
    'Frames'               => 'K�pkocka',
    'FTP'                  => 'FTP',
    'Func'                 => 'Funk.',
    'Function'             => 'Funkci�',
    'Gain'                 => 'Er�s�t�s',
    'General'              => '�ltal�nos',
    'GenerateVideo'        => 'Vide� k�sz�t�s',
    'GeneratingVideo'      => 'Vide� k�sz�t�se...',
    'GoToZoneMinder'       => 'L�togat�s a ZoneMinder.com-ra',
    'Grey'                 => 'Sz�rke',
    'Group'                => 'Csoport',
    'Groups'               => 'Csoportok',
    'HasFocusSpeed'        => 'Van f�kusz sebess�g',
    'HasGainSpeed'         => 'Van er�s�t�s sebess�g',
    'HasHomePreset'        => 'Van kedvenc profilja',
    'HasIrisSpeed'         => 'Van �risz sebess�g',
    'HasPanSpeed'          => 'Van jobb-bal sebess�g',
    'HasPresets'           => 'Vannak profiljai',
    'HasTiltSpeed'         => 'Van le-fel sebess�g',
    'HasTurboPan'          => 'Van turb� jobb-bal',
    'HasTurboTilt'         => 'Van turb� le-fel',
    'HasWhiteSpeed'        => 'Van feh�r egyens�ly sebess�g',
    'HasZoomSpeed'         => 'Van zoom sebess�g',
    'HighBW'               => 'Magas<br>s�vsz.',
    'High'                 => 'Magas',
    'Home'                 => 'Home',
    'Hour'                 => '�r�ban',
    'Hue'                  => 'Sz�n�rnyalat',
    'Id'                   => 'Az.',
    'Idle'                 => 'Nyugalom',
    'Ignore'               => 'Figyelmen k�v�l hagy',
    'ImageBufferSize'      => 'K�ppuffer m�rete (k�pkock�k)',
    'Image'                => 'K�p',
    'Images'               => 'K�p',
    'Include'              => 'Be�gyaz',
    'In'                   => 'In',
    'Inverted'             => 'Invert�lva',
    'Iris'                 => '�risz',
    'KeyString'            => 'Kulcs karaktersor',
    'Label'                => 'Cimke',
    'Language'             => 'Nyelv',
    'Last'                 => 'Utols�',
    'LimitResultsPost'     => 'tal�latig korl�toz', // This is used at the end of the phrase 'Limit to first N results only'
    'LimitResultsPre'      => 'Az els�', // This is used at the beginning of the phrase 'Limit to first N results only'
    'LinkedMonitors'       => '�sszef�gg� monitorok',
    'List'                 => 'Lista',
    'Load'                 => 'Terhel�s',
    'Local'                => 'Helyi',
    'LoggedInAs'           => 'Bejelentkezve mint',
    'LoggingIn'            => 'Bejelentkez�s folyamatban',
    'Login'                => 'Bejelentkez�s',
    'Logout'               => 'Kil�p�s',
    'Low'                  => 'Alacsony',
    'LowBW'                => 'Alacsony<br>s�vsz.',
    'Main'                 => 'F�',
    'Man'                  => 'Man',
    'Manual'               => 'K�zik�nyv',
    'Mark'                 => 'Jel�l�s',
    'MaxBandwidth'         => 'Max. s�vsz�less�g',
    'MaxBrScore'           => 'Max.<br/>�rt�k',
    'MaxFocusRange'        => 'Max. f�kusz tartom�ny',
    'MaxFocusSpeed'        => 'Max. f�kusz sebess�g',
    'MaxFocusStep'         => 'Max. f�kusz l�p�s',
    'MaxGainRange'         => 'Max Gain Range',
    'MaxGainSpeed'         => 'Max Gain Speed',
    'MaxGainStep'          => 'Max Gain Step',
    'MaximumFPS'           => 'Maximum FPS',
    'MaxIrisRange'         => 'Max. �risz tartom�ny',
    'MaxIrisSpeed'         => 'Max. �risz sebess�g',
    'MaxIrisStep'          => 'Max. �risz l�p�s',
    'Max'                  => 'Max.',
    'MaxPanRange'          => 'Max. jobb-bal tartom�ny',
    'MaxPanSpeed'          => 'Max. jobb-bal sebess�g',
    'MaxPanStep'           => 'Max. jobb-bal l�p�s',
    'MaxTiltRange'         => 'Max. fel-le tartom�ny',
    'MaxTiltSpeed'         => 'Max. fel-le sebess�g',
    'MaxTiltStep'          => 'Max. fel-le l�p�s',
    'MaxWhiteRange'        => 'Max. feh�r egyens�ly tartom�ny',
    'MaxWhiteSpeed'        => 'Max. feh�r egyens�ly sebess�g',
    'MaxWhiteStep'         => 'Max. feh�r egyens�ly l�p�s',
    'MaxZoomRange'         => 'Max. zoom tartom�ny',
    'MaxZoomSpeed'         => 'Max. zoom sebess�g',
    'MaxZoomStep'          => 'Max. zoom l�p�s',
    'MediumBW'             => 'K�zepes<br>s�vsz.',
    'Medium'               => 'K�zepes',
    'MinAlarmAreaLtMax'    => 'A minimum riasztott ter�letnek kisebbnek kell lennie mint a maximumnak',
    'MinAlarmAreaUnset'    => 'Meg kell adnod a minimum riasztott k�ppontok sz�m�t',
    'MinBlobAreaLtMax'     => 'A minimum blob ter�letnek kisebbnek kell lennie mint a maximumnak',
    'MinBlobAreaUnset'     => 'Meg kell adnod a minimum blob k�ppontok sz�m�t',
    'MinBlobLtMinFilter'   => 'A minimum blob ter�letnek kisebbnek vagy egyenl�nek kell lennie a megsz�rt ter�lettel',
    'MinBlobsLtMax'        => 'A minimum bloboknak kisebbeknek kell lenni�k, mint a maximum',
    'MinBlobsUnset'        => 'Meg kell adnod a blobok sz�m�t',
    'MinFilterAreaLtMax'   => 'A minimum megsz�rt ter�letnek kisebbnek kell lennie mint a maximum',
    'MinFilterAreaUnset'   => 'Meg kell adnod a megsz�rt ter�let k�ppontjainak sz�m�t',
    'MinFilterLtMinAlarm'  => 'A megsz�rt ter�letnek kisebbnek vagy ugyanakkor�nak kell lennie mint a riasztott ter�let',
    'MinFocusRange'        => 'Min. f�kusz ter�let',
    'MinFocusSpeed'        => 'Min. f�kusz sebess�g',
    'MinFocusStep'         => 'Min. f�kusz l�p�s',
    'MinGainRange'         => 'Min Gain Range',
    'MinGainSpeed'         => 'Min Gain Speed',
    'MinGainStep'          => 'Min Gain Step',
    'MinIrisRange'         => 'Min. �risz ter�let',
    'MinIrisSpeed'         => 'Min. �risz sebess�g',
    'MinIrisStep'          => 'Min. �risz l�p�s',
    'MinPanRange'          => 'Min. jobb-bal tartom�ny',
    'MinPanSpeed'          => 'Min. jobb-bal sebess�g',
    'MinPanStep'           => 'Min. jobb-bal l�p�s',
    'MinPixelThresLtMax'   => 'A minimum k�sz�b k�ppontnak kisebbnek kell lennie, mint a maximum',
    'MinPixelThresUnset'   => 'Meg kell adnod a minimum k�ppont k�sz�b�t',
    'MinTiltRange'         => 'Min. fel-le tartom�ny',
    'MinTiltSpeed'         => 'Min. fel-le sebess�g',
    'MinTiltStep'          => 'Min. fel-le l�p�s',
    'MinWhiteRange'        => 'Min. feh�r egyens�ly ter�let',
    'MinWhiteSpeed'        => 'Min. feh�r egyens�ly sebess�g',
    'MinWhiteStep'         => 'Min. feh�r egyens�ly l�p�s',
    'MinZoomRange'         => 'Min. zoom ter�let',
    'MinZoomSpeed'         => 'Min. zoom sebess�g',
    'MinZoomStep'          => 'Min. zoom l�p�s',
    'Misc'                 => 'Egy�b',
    'MonitorIds'           => 'Monitor&nbsp;Azonos�t�k',
    'Monitor'              => 'Monitor',
    'MonitorPreset'        => 'El�re be�ll�tott �rt�kprofilok megfigyel�shez',
    'MonitorPresetIntro'   => 'V�lassz egy, az el�re meghat�rozott<br> �rt�kprofilt az al�bbiak k�z�l.<br><br>Vedd figyelembe, hogy ez fel�l�rhatja <br>az �ltalad m�r be�ll�tott �rt�keket.<br><br>',
    'Monitors'             => 'Megfigyel�sek',
    'Montage'              => 'T�bbkamer�s n�zet',
    'Month'                => 'H�napban',
    'Move'                 => 'Mozg�s',
    'MustBeGe'             => 'nagyobbnak vagy egyenl�nek kell lennie',
    'MustBeLe'             => 'kisebbnek vagy egyenl�nek kell lennie',
    'MustConfirmPassword'  => 'Meg kell er�s�tened a jelsz�t',
    'MustSupplyPassword'   => 'Meg kell adnod a jelsz�t',
    'MustSupplyUsername'   => 'Meg kell adnod felhaszn�l�i nevet',
    'Name'                 => 'N�v',
    'Near'                 => 'K�zel',
    'Network'              => 'H�l�zat',
    'NewGroup'             => '�j csoport',
    'NewLabel'             => '�j cimke',
    'NewPassword'          => '�j jelsz�',
    'NewState'             => '�j �llapot',
    'New'                  => 'Uj',
    'NewUser'              => '�j felhaszn�l�',
    'Next'                 => 'K�vetkez�',
    'NoFramesRecorded'     => 'Nincs felvett k�pkocka ehhez az esem�nyhez',
    'NoGroup'              => 'Nincs csoport',
    'NoneAvailable'        => 'Nincs el�rhet�',
    'No'                   => 'Nem',
    'None'                 => 'Nincs kiv�lasztva',
    'Normal'               => 'Norm�lis',
    'NoSavedFilters'       => 'Nincs mentett sz�r�',
    'NoStatisticsRecorded' => 'Nincs mentett statisztika ehhez az esem�nyhez/k�pkock�hoz',
    'Notes'                => 'Megjegyz�sek',
    'NumPresets'           => 'Profilok sz�ma',
    'Off'                  => 'Ki',
    'On'                   => 'Be',
    'Open'                 => 'Megnyit�s',
    'OpEq'                 => 'egyenl�',
    'OpGtEq'               => 'nagyobb van egyenl�',
    'OpGt'                 => 'nagyobb mint',
    'OpIn'                 => 'be�ll�tva',
    'OpLtEq'               => 'kisebb vagy egyenl�',
    'OpLt'                 => 'kisebb mint',
    'OpMatches'            => 'tal�latok',
    'OpNe'                 => 'nem egyenl�',
    'OpNotIn'              => 'nincs be�ll�tva',
    'OpNotMatches'         => 'nincs tal�lat',
    'OptionHelp'           => 'Be�ll�t�si seg�ts�g',
    'OptionRestartWarning' => 'Ez a be�ll�t�s nem jut teljesen �rv�nyre\nam�g a rendszer fut. Ha megtett�l minden\nbe�ll�t�st, ind�tsd �jra a ZoneMinder szolg�ltat�st.',
    'Options'              => 'Be�ll�t�sok',
    'Order'                => 'Sorrend',
    'OrEnterNewName'       => 'vagy adj meg �j nevet',
    'Orientation'          => 'Orient�ci�',
    'Out'                  => 'Kifel�',
    'OverwriteExisting'    => 'Megl�v� fel�l�r�sa',
    'Paged'                => 'Lapozva',
    'Pan'                  => 'Jobb-bal mozg�s',
    'PanLeft'              => 'Mozg�s balra',
    'PanRight'             => 'Mozg�s jobbra',
    'PanTilt'              => 'Mozgat',
    'Parameter'            => 'Param�ter',
    'Password'             => 'Jelsz�',
    'PasswordsDifferent'   => 'Az �j �s a meger�s�tett jelsz� k�l�nb�zik!',
    'Paths'                => '�tvonalak',
    'Pause'                => 'Sz�net',
    'PhoneBW'              => 'Bet�rcs�z�<br>s�vsz.',
    'Phone'                => 'Telefonon bet�rcs�zva',
    'PixelDiff'            => 'K�ppont elt�r�s',
    'Pixels'               => 'k�ppont',
    'PlayAll'              => 'Mind lej�tsz�sa',
    'Play'                 => 'Lej�tsz�s',
    'PleaseWait'           => 'K�rlek v�rj...',
    'Point'                => 'Pont',
    'PostEventImageBuffer' => 'Esem�ny ut�ni k�ppuffer',
    'PreEventImageBuffer'  => 'Esem�ny el�tti k�ppuffer',
    'PreserveAspect'       => 'K�par�ny megtart�sa',
    'Preset'               => 'El�re be�ll�tott profil',
    'Presets'              => 'El�re be�ll�tott profilok',
    'Prev'                 => 'El�z�',
    'Protocol'             => 'Protocol',
    'Rate'                 => 'FPS',
    'Real'                 => 'Val�s',
    'Record'               => 'Felv�tel',
    'RefImageBlendPct'     => 'V�ltoz�s a referenciak�pt�l %-ban',
    'Refresh'              => 'Friss�t',
    'Remote'               => 'H�l�zati',
    'RemoteHostName'       => 'H�l�zati IP c�m/hosztn�v',
    'RemoteHostPath'       => 'A k�p el�r�si �tja',
    'RemoteHostPort'       => 'H�l�zati g�p portsz�ma',
    'RemoteImageColours'   => 'A k�p sz�ne',
    'Rename'               => '�tnevez',
    'ReplayAll'            => 'Minden esem�nyt',
    'Replay'               => 'Az elej�t�l',
    'ReplayGapless'        => 'Folyamatos esem�nyeket',
    'ReplaySingle'         => 'Egy�ni esem�ny',
    'Replay'               => 'Visszaj�tsz�s',
    'Reset'                => 'Alap�rt�kre �ll�t',
    'ResetEventCounts'     => 'Esem�ny sz�ml�l� null�z�sa',
    'Restarting'           => '�jraind�t�s',
    'Restart'              => '�jraind�t',
    'RestrictedCameraIds'  => 'Korl�tozott kamer�k azonos�t�i',
    'RestrictedMonitors'   => 'Korl�tozott kamer�k',
    'ReturnDelay'          => 'Vissza�rkez�s k�sleltet�se',
    'ReturnLocation'       => 'Vissza�rkez�s helye',
    'Rewind'               => 'Visszateker�s',
    'RotateLeft'           => 'Balra forgat�s',
    'RotateRight'          => 'Jobbra forgat�s',
    'RunMode'              => 'Fut�si m�d',
    'Running'              => '�les',
    'RunState'             => 'Fut�si �llapot',
    'SaveAs'               => 'Ment�s mint',
    'SaveFilter'           => 'Sz�r� ment�se',
    'Save'                 => 'Ment�s',
    'Scale'                => 'M�ret',
    'Score'                => 'Pontsz�m',
    'Secs'                 => 'mp.',
    'Sectionlength'        => 'R�sz hossz',
    'Select'               => 'Kiv�laszt�s',
    'SelectMonitors'       => 'Monitorok kiv�laszt�sa',
    'SelfIntersecting'     => 'A soksz�g sz�lei nem keresztez�dhetnek',
    'Set'                  => 'Be�ll�t',
    'SetNewBandwidth'      => '�j s�vsz�less�g be�ll�t�s',
    'SetPreset'            => 'Alap�rtelmezett be�ll�t�sa',
    'Settings'             => 'Be�ll�t�sok',
    'ShowFilterWindow'     => 'Sz�r�ablak megjelen�t�s',
    'ShowTimeline'         => 'Id�vonal megjelen�t�s',
    'SignalCheckColour'    => 'Sz�n a jel kimarad�sakor',
    'Size'                 => 'F�jlm�ret',
    'Sleep'                => 'Alv�s',
    'SortAsc'              => 'N�vekv�',
    'SortBy'               => 'Sorbarendez�s:',
    'SortDesc'             => 'Cs�kken�',
    'Source'               => 'Forr�s',
    'SourceType'           => 'Forr�s t�pusa',
    'SpeedHigh'            => 'Nagy sebss�g',
    'SpeedLow'             => 'Alacsony sebess�g',
    'SpeedMedium'          => 'K�zepes sebess�g',
    'Speed'                => 'Sebess�g',
    'SpeedTurbo'           => 'Turb� sebess�g',
    'Start'                => 'Ind�t',
    'State'                => '�llapot',
    'Stats'                => 'Statisztik�k',
    'Status'               => 'St�tusz',
    'StepBack'             => 'Visszal�p�s',
    'StepForward'          => 'El�rel�p�s',
    'StepLarge'            => 'Nagy ugr�s',
    'StepMedium'           => 'K�zepes ugr�s',
    'StepNone'             => 'Nincs ugr�s',
    'StepSmall'            => 'Kis ugr�s',
    'Step'                 => 'Ugr�s',
    'Stills'               => '�ll�k�pek',
    'Stop'                 => 'Meg�ll�t�s',
    'Stopped'              => 'Meg�ll�tva',
    'Stream'               => '�l� folyam',
    'StreamReplayBuffer'   => 'Folyam visszaj�tsz� k�ppuffer',
    'Submit'               => 'Elk�ld',
    'System'               => 'Rendszer',
    'Tele'                 => 'T�v',
    'Thumbnail'            => 'El�n�zet',
    'Tilt'                 => 'Fel-le mozg�s',
    'TimeDelta'            => 'Id� v�ltoz�s',
    'Time'                 => 'Id�pont',
    'Timeline'             => 'Id�vonal',
    'Timestamp'            => 'Id�b�lyeg',
    'TimeStamp'            => 'Id�b�lyeg',
    'TimestampLabelFormat' => 'Id�b�lyeg form�tum',
    'TimestampLabelX'      => 'Elhelyez�s X pozici�',
    'TimestampLabelY'      => 'Elhelyez�s Y pozici�',
    'Today'                => 'Ma',
    'Tools'                => 'Eszk�z�k',
    'TotalBrScore'         => '�ssz.<br/>pontsz�m',
    'TrackDelay'           => 'K�sleltet�s k�vet�se',
    'TrackMotion'          => 'Mozg�s k�vet�se',
    'Triggers'             => 'El�id�z�k',
    'TurboPanSpeed'        => 'Turb� jobb-bal sebess�g',
    'TurboTiltSpeed'       => 'Turbo fel-le sebess�g',
    'Type'                 => 'T�pus',
    'Unarchive'            => 'Arch�vumb�l ki',
    'Units'                => 'Egys�gek',
    'Unknown'              => 'Ismeretlen',
    'UpdateAvailable'      => 'El�rhet� ZoneMinder friss�t�s.',
    'Update'               => 'Friss�t�s',
    'UpdateNotNecessary'   => 'Nem sz�ks�ges a friss�t�s.',
    'UseFilterExprsPost'   => '&nbsp;sz�r�&nbsp;kifejez�s haszn�lata', // This is used at the end of the phrase 'use N filter expressions'
    'UseFilterExprsPre'    => '&nbsp;', // This is used at the beginning of the phrase 'use N filter expressions'
    'UseFilter'            => 'Sz�r�t haszn�l',
    'User'                 => 'Felhaszn�l�',
    'Username'             => 'Felhaszn�l�n�v',
    'Users'                => 'Felhaszn�l�k',
    'Value'                => '�rt�k',
    'VersionIgnore'        => 'Ennek a verzi�nak a figyelmen k�v�l hagy�sa',
    'VersionRemindDay'     => '1 nap m�lva eml�keztess',
    'VersionRemindHour'    => '1 �ra m�lva eml�keztess',
    'VersionRemindNever'   => 'Ne eml�keztess az �j verzi�r�l',
    'VersionRemindWeek'    => '1 h�t m�lva eml�keztess',
    'Version'              => 'Verzi�',
    'VideoFormat'          => 'Vide� form�tum',
    'VideoGenFailed'       => 'Hiba a vide� k�sz�t�sekor!',
    'VideoGenFiles'        => 'L�tez� vide�k',
    'VideoGenNoFiles'      => 'Nem tal�lhat�k vide�k',
    'VideoGenParms'        => 'Vide� k�sz�t�si param�terek',
    'VideoGenSucceeded'    => 'A vide� elk�sz�lt!',
    'VideoSize'            => 'K�p m�rete',
    'Video'                => 'Vide�',
    'ViewAll'              => 'Az �sszes list�z�sa',
    'ViewEvent'            => 'Esem�nyek n�zet',
    'View'                 => 'Megtekint',
    'ViewPaged'            => 'Oldal n�zet',
    'Wake'                 => '�breszt',
    'WarmupFrames'         => 'Bemeleg�t� k�pkock�k',
    'Watch'                => 'Figyel',
    'WebColour'            => 'Sz�n az id�vonal ablakban',
    'Web'                  => 'Web',
    'Week'                 => 'H�ten',
    'WhiteBalance'         => 'Feh�r egyens�ly',
    'White'                => 'Feh�r',
    'Wide'                 => 'Sz�les',
    'X10ActivationString'  => 'X10 �les�t� karaktersor',
    'X10InputAlarmString'  => 'X10 bemeneti riad� karaktersor',
    'X10OutputAlarmString' => 'X10 kimeneti riad� karaktersor',
    'X10'                  => 'X10',
    'X'                    => 'X',
    'Yes'                  => 'Igen',
    'YouNoPerms'           => 'Nincs jogod az er�forr�s el�r�s�hez.',
    'Y'                    => 'Y',
    'ZoneAlarmColour'      => 'Riad� sz�n (R/G/B)',
    'ZoneArea'             => 'Z�na ter�let',
    'ZoneFilterSize'       => 'Sz�rt sz�less�g/magass�g (k�ppontok)',
    'ZoneMinMaxAlarmArea'  => 'Min/Max riad� ter�let',
    'ZoneMinMaxBlobArea'   => 'Min/Max Blob ter�let',
    'ZoneMinMaxBlobs'      => 'Min/Max Blobok',
    'ZoneMinMaxFiltArea'   => 'Min/Max sz�rt ter�let',
    'ZoneMinMaxPixelThres' => 'Min/Max k�ppont k�sz�b (0-255)',
    'ZoneOverloadFrames'   => 'T�lterhel�s eset�n ennyi k�pkocka hagyhat� ki',
    'Zones'                => 'Z�n�k',
    'Zone'                 => 'Z�na:',
    'ZoomIn'               => 'Zoom be',
    'ZoomOut'              => 'Zoom ki',
    'Zoom'                 => 'Zoom',
);

// Complex replacements with formatting and/or placements, must be passed through sprintf
$CLANG = array(
    'CurrentLogin'         => 'Jelenleg bel�pve mint \'%1$s\'',
    'EventCount'           => '%1$s %2$s', // For example '37 Events' (from Vlang below)
    'LastEvents'           => 'Utols� %1$s %2$s', // For example 'Last 37 Events' (from Vlang below)
    'LatestRelease'        => 'Az utols� kiad�s v%1$s, ami neked van v%2$s.',
    'MonitorCount'         => '%1$s %2$s', // For example '4 Monitors' (from Vlang below)
    'MonitorFunction'      => 'Megfigyel�s funkci�: %1$s',
    'RunningRecentVer'     => 'A legfrissebb ZoneMinder verzi�t haszn�lod, v%s.',
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
    'Event'                => array( 0=>'Esem�nyek', 1=>'Esem�ny', 2=>'Esem�ny' ),
    'Monitor'              => array( 0=>'Monitorok', 1=>'Monitor', 2=>'Monitor' ),
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
    die( 'Error, unable to correlate variable language string' );
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
// So for example, to override the help text for ZM_LANG_DEFAULT do
$OLANG = array(
//    'LANG_DEFAULT' => array(
//        'Prompt' => "This is a new prompt for this option",
//        'Help' => "This is some new help for this option which will be displayed in the popup window when the ? is clicked"
//    ),
);

?>

