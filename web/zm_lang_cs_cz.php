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

// ZoneMinder Czech Translation by Lukas Pokorny/Mlada Boleslav

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
//require_once( 'zm_lang_en_gb.php' );

// You may need to change the character set here, if your web server does not already
// do this by default, uncomment this if required.
//
// Example
//header( "Content-Type: text/html; charset=iso-8859-2" );

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
//setlocale( 'LC_ALL', 'cs_CZ' ); All locale settings pre-4.3.0
// setlocale( LC_ALL, 'en_GB' ); All locale settings 4.3.0 and after
// setlocale( LC_CTYPE, 'en_GB' ); Character class settings 4.3.0 and after
// setlocale( LC_TIME, 'en_GB' ); Date and time formatting 4.3.0 and after

// Simple String Replacements
$zmSlang24BitColour          = '24 bit barevn�';
$zmSlang8BitGrey             = '8 bit �ed� �k�la';
$zmSlangAction               = 'Akce';
$zmSlangActual               = 'Skute�n�';
$zmSlangAddNewControl        = 'P�idat nov� ��zen�';
$zmSlangAddNewMonitor        = 'P�idat kameru';
$zmSlangAddNewUser           = 'P�idat u�ivatele';
$zmSlangAddNewZone           = 'P�idat z�nu';
$zmSlangAlarm                = 'Alarm';
$zmSlangAlarmBrFrames        = 'Alarm<br/>Sn�mky';
$zmSlangAlarmFrame           = 'Alarm sn�mek';
$zmSlangAlarmFrameCount      = 'Po�et alarm sn�mk�';
$zmSlangAlarmLimits          = 'Limity alarmu';
$zmSlangAlarmMaximumFPS      = 'Alarm Maximum FPS';
$zmSlangAlarmPx              = 'Alarm Px';
$zmSlangAlarmRGBUnset        = 'You must set an alarm RGB colour';
$zmSlangAlert                = 'Pozor';
$zmSlangAll                  = 'V�echny';
$zmSlangApplyingStateChange  = 'Aplikuji zm�nu stavu';
$zmSlangApply                = 'Pou��t';
$zmSlangArchArchived         = 'Pouze archivovan�';
$zmSlangArchive              = 'Archiv';
$zmSlangArchived             = 'Archivov�n';
$zmSlangArchUnarchived       = 'Pouze nearchivovan�';
$zmSlangArea                 = 'Area';
$zmSlangAreaUnits            = 'Area (px/%)';
$zmSlangAttrAlarmFrames      = 'Alarm sn�mky';
$zmSlangAttrArchiveStatus    = 'Archiv status';
$zmSlangAttrAvgScore         = 'Pr�m. sk�re';
$zmSlangAttrCause            = 'P���ina';
$zmSlangAttrDate             = 'Datum';
$zmSlangAttrDateTime         = 'Datum/�as';
$zmSlangAttrDiskBlocks       = 'Bloky disku';
$zmSlangAttrDiskPercent      = 'Zapln�n� disku';
$zmSlangAttrDuration         = 'Pr�b�h';
$zmSlangAttrFrames           = 'Sn�mky';
$zmSlangAttrId               = 'Id';
$zmSlangAttrMaxScore         = 'Max. sk�re';
$zmSlangAttrMonitorId        = 'Kamera Id';
$zmSlangAttrMonitorName      = 'Jm�no kamery';
$zmSlangAttrName             = 'Jm�no';
$zmSlangAttrNotes            = 'Notes';
$zmSlangAttrSystemLoad       = 'System Load';
$zmSlangAttrTime             = '�as';
$zmSlangAttrTotalScore       = 'Celkov� sk�re';
$zmSlangAttrWeekday          = 'Den v t�dnu';
$zmSlangAuto                 = 'Auto';
$zmSlangAutoStopTimeout      = '�asov� limit pro vypr�en�';
$zmSlangAvgBrScore           = 'Pr�m.<br/>Sk�re';
$zmSlangBackground           = 'Background';
$zmSlangBackgroundFilter     = 'Run filter in background';
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
$zmSlangBadNameChars         = 'Jm�na moho obsahovat pouze alfanumerick� znaky a podtr��tko �i poml�ku';
$zmSlangBadPath              = 'Path must be set to a valid value';
$zmSlangBadPort              = 'Port must be set to a valid number';
$zmSlangBadPostEventCount    = 'Post event image count must be an integer of zero or more';
$zmSlangBadPreEventCount     = 'Pre event image count must be at least zero, and less than image buffer size';
$zmSlangBadRefBlendPerc      = 'Reference blend percentage must be a positive integer';
$zmSlangBadSectionLength     = 'Section length must be an integer of 30 or more';
$zmSlangBadSignalCheckColour = 'Signal check colour must be a valid RGB colour string';
$zmSlangBadStreamReplayBuffer= 'Stream replay buffer must be an integer of zero or more';
$zmSlangBadWarmupCount       = 'Warmup frames must be an integer of zero or more';
$zmSlangBadWebColour         = 'Web colour must be a valid web colour string';
$zmSlangBadWidth             = 'Width must be set to a valid value';
$zmSlangBandwidth            = 'Rychlost s�t�';
$zmSlangBlobPx               = 'Zna�ka Px';
$zmSlangBlobSizes            = 'Velikost zna�ky';
$zmSlangBlobs                = 'Zna�ky';
$zmSlangBrightness           = 'Sv�tlost';
$zmSlangBuffers              = 'Bufery';
$zmSlangCanAutoFocus         = 'Um� automaticky zaost�it';
$zmSlangCanAutoGain          = 'Um� automatick� zisk';
$zmSlangCanAutoIris          = 'Um� auto iris';
$zmSlangCanAutoWhite         = 'Um� automaticky vyv�it b�lou';
$zmSlangCanAutoZoom          = 'Um� automaticky zoomovat';
$zmSlangCancelForcedAlarm    = 'Zastavit spu�t�n� alarm';
$zmSlangCancel               = 'Zru�it';
$zmSlangCanFocusAbs          = 'Um� zaost�it absolutn�';
$zmSlangCanFocusCon          = 'Um� pr�b�n� zaost�it';
$zmSlangCanFocusRel          = 'Um� relativn� zaost�it';
$zmSlangCanFocus             = 'Um� zaost�it';
$zmSlangCanGainAbs           = 'Um� absolutn� zisk';
$zmSlangCanGainCon           = 'Um� pr�b�n� zisk';
$zmSlangCanGainRel           = 'Um� relativn� zisk';
$zmSlangCanGain              = 'Um� zisk';
$zmSlangCanIrisAbs           = 'Um� absolutn� iris';
$zmSlangCanIrisCon           = 'Um� pr�b�n� iris';
$zmSlangCanIrisRel           = 'Um� relativn� iris';
$zmSlangCanIris              = 'Um� iris';
$zmSlangCanMoveAbs           = 'Um� absoultn� pohyb';
$zmSlangCanMoveCon           = 'Um� pr�b�n� pohyb';
$zmSlangCanMoveDiag          = 'Um� diagon�ln� pohyb';
$zmSlangCanMoveMap           = 'Um� mapovan� pohyb';
$zmSlangCanMoveRel           = 'Um� relativn� pohyb';
$zmSlangCanMove              = 'Um� pohyb';
$zmSlangCanPan               = 'Um� ot��en�';
$zmSlangCanReset             = 'Um� reset';
$zmSlangCanSetPresets        = 'Um� navolit p�edvolby';
$zmSlangCanSleep             = 'M��e sp�t';
$zmSlangCanTilt              = 'Um� n�klon';
$zmSlangCanWake              = 'Lze vzbudit';
$zmSlangCanWhiteAbs          = 'Um� absolutn� vyv�en� b�l�';
$zmSlangCanWhiteBal          = 'Um� vyv�en� b�l�';
$zmSlangCanWhiteCon          = 'Um� pr�b�n� vyv�en� b�l�';
$zmSlangCanWhiteRel          = 'Um� relativn� vyv�en� b�l�';
$zmSlangCanWhite             = 'Um� vyv�en� b�l�';
$zmSlangCanZoomAbs           = 'Um� absolutn� zoom';
$zmSlangCanZoomCon           = 'Um� pr�b�n� zoom';
$zmSlangCanZoomRel           = 'Um� relativn� zoom';
$zmSlangCanZoom              = 'Um� zoom';
$zmSlangCaptureHeight        = 'V��ka zdrojov�ho sn�mku';
$zmSlangCapturePalette       = 'Paleta zdrojov�ho sn�mku';
$zmSlangCaptureWidth         = '���ka zdrojov�ho sn�mku';
$zmSlangCause                = 'P���ina';
$zmSlangCheckMethod          = 'Metoda zna�kov�n� alarmem';
$zmSlangChooseFilter         = 'Vybrat filtr';
$zmSlangChoosePreset         = 'Choose Preset';
$zmSlangClose                = 'Zav��t';
$zmSlangColour               = 'Barva';
$zmSlangCommand              = 'P��kaz';
$zmSlangConfig               = 'Nastaven�';
$zmSlangConfiguredFor        = 'Nastaveno pro';
$zmSlangConfirmDeleteEvents  = 'Are you sure you wish to delete the selected events?';
$zmSlangConfirmPassword      = 'Potvrdit heslo';
$zmSlangConjAnd              = 'a';
$zmSlangConjOr               = 'nebo';
$zmSlangConsole              = 'Konzola';
$zmSlangContactAdmin         = 'Pro detailn� info kontaktujte Va�eho administr�tora.';
$zmSlangContinue             = 'Pokra�ovat';
$zmSlangContrast             = 'Kontrast';
$zmSlangControlAddress       = 'Adresa ��zen�';
$zmSlangControlCap           = 'Schopnosti ��zen�';
$zmSlangControlCaps          = 'Typy ��zen�';
$zmSlangControlDevice        = 'Za��zen� ��zen�';
$zmSlangControllable         = '��diteln�';
$zmSlangControlType          = 'Typ ��zen�';
$zmSlangControl              = '��zen�';
$zmSlangCycle                = 'Cyklus';
$zmSlangCycleWatch           = 'Cyklick� prohl�en�';
$zmSlangDay                  = 'Den';
$zmSlangDebug                = 'Debug';
$zmSlangDefaultRate          = 'Default Rate';
$zmSlangDefaultScale         = 'P�ednastaven� velikost';
$zmSlangDefaultView          = 'Default View';
$zmSlangDeleteAndNext        = 'Smazat &amp; Dal��';
$zmSlangDeleteAndPrev        = 'Smazat &amp; P�edchoz�';
$zmSlangDeleteSavedFilter    = 'Smazat filtr';
$zmSlangDelete               = 'Smazat';
$zmSlangDescription          = 'Popis';
$zmSlangDeviceChannel        = 'Kan�l za��zen�';
$zmSlangDeviceFormat         = 'Form�t za��zen�';
$zmSlangDeviceNumber         = '��slo zar�zen�';
$zmSlangDevicePath           = 'Cesta k za��zen�';
$zmSlangDevices              = 'Devices';
$zmSlangDimensions           = 'Rozm�ry';
$zmSlangDisableAlarms        = 'Zak�zat alarmy';
$zmSlangDisk                 = 'Disk';
$zmSlangDonateAlready        = 'Ne, u� jsem podpo�il';
$zmSlangDonateEnticement     = 'Ji� n�jakou dobu pou��v�te software ZoneMinder k ochran� sv�ho majetku a p�edpokl�d�m, �e jej shled�v�te u�ite�n�m. P�esto�e je ZoneMinder, znovu p�ipom�n�m, zdarma a voln� ���en� software, stoj� jeho v�voj a podpora n�jak� pen�ze. Pokud byste cht�l/a podpo�it budouc� v�voj a nov� mo�nosti softwaru, pros�m zva�te darov�n� finan�n� pomoci. Darov�n� je, samoz�ejm�, dobrovoln�, ale zato velmi cen�n� m��ete p�isp�t jakou ��stkou chcete.<br><br>Pokud m�te z�jem podpo�it n� t�m, pros�m, vyberte n�e uvedenou mo�nost, nebo nav�tivte http://www.zoneminder.com/donate.html.<br><br>D�kuji V�m �e jste si vybral/a software ZoneMinder a nezapome�te nav�t�vit f�rum na ZoneMinder.com pro podporu a n�vrhy jak ud�lat ZoneMinder je�t� lep��m ne� je dnes.';
$zmSlangDonate               = 'Pros�m podpo�te';
$zmSlangDonateRemindDay      = 'Nyn� ne, p�ipomenout za 1 den';
$zmSlangDonateRemindHour     = 'Nyn� ne, p�ipomenout za hodinu';
$zmSlangDonateRemindMonth    = 'Nyn� ne, p�ipomenout za m�s�c';
$zmSlangDonateRemindNever    = 'Ne, nechci podpo�it ZoneMinder, nep�ipom�nat';
$zmSlangDonateRemindWeek     = 'Nyn� ne, p�ipomenout za t�den';
$zmSlangDonateYes            = 'Ano, chcit podpo�it ZoneMinder nyn�';
$zmSlangDownload             = 'St�hnout';
$zmSlangDuration             = 'Pr�b�h';
$zmSlangEdit                 = 'Editovat';
$zmSlangEmail                = 'Email';
$zmSlangEnableAlarms         = 'Povolit alarmy';
$zmSlangEnabled              = 'Povoleno';
$zmSlangEnterNewFilterName   = 'Zadejte nov� jm�no filtru';
$zmSlangErrorBrackets        = 'Chyba, zkontrolujte pros�m z�vorky';
$zmSlangError                = 'Chyba';
$zmSlangErrorValidValue      = 'Chyba, zkontrolujte �e podm�nky maj� spr�vn� hodnoty';
$zmSlangEtc                  = 'atd';
$zmSlangEventFilter          = 'Filtr z�znam�';
$zmSlangEventId              = 'Id z�znamu';
$zmSlangEventName            = 'Jm�no z�znamu';
$zmSlangEventPrefix          = 'Prefix z�znamu';
$zmSlangEvents               = 'Z�znamy';
$zmSlangEvent                = 'Z�znam';
$zmSlangExclude              = 'Vyjmout';
$zmSlangExecute              = 'Execute';
$zmSlangExportDetails        = 'Exportovat detaily z�znamu';
$zmSlangExport               = 'Exportovat';
$zmSlangExportFailed         = 'Chyba p�i exportu';
$zmSlangExportFormat         = 'Form�t exportovan�ho souboru';
$zmSlangExportFormatTar      = 'Tar';
$zmSlangExportFormatZip      = 'Zip';
$zmSlangExportFrames         = 'Exportovat detaily sn�mku';
$zmSlangExportImageFiles     = 'Exportovat obrazov� soubory';
$zmSlangExporting            = 'Exportuji';
$zmSlangExportMiscFiles      = 'Exportovat ostatn� soubory (jestli existuj�)';
$zmSlangExportOptions        = 'Mo�nosti exportu';
$zmSlangExportVideoFiles     = 'Exportovat video soubory (jestli existuj�)';
$zmSlangFar                  = 'Daleko';
$zmSlangFastForward          = 'Fast Forward';
$zmSlangFeed                 = 'Nasytit';
$zmSlangFileColours          = 'Barvy souboru';
$zmSlangFilePath             = 'Cesta k souboru';
$zmSlangFile                 = 'Soubor';
$zmSlangFilterArchiveEvents  = 'Archivovat v�echny nalezen�';
$zmSlangFilterDeleteEvents   = 'Smazat v�echny nalezen�';
$zmSlangFilterEmailEvents    = 'Poslat email s detaily nalezen�ch';
$zmSlangFilterExecuteEvents  = 'Spustit p��kaz na v�ech nalezen�ch';
$zmSlangFilterMessageEvents  = 'Podat zpr�vu o v�ech nalezen�ch';
$zmSlangFilterPx             = 'Filtr Px';
$zmSlangFilters              = 'Filtry';
$zmSlangFilterUnset          = 'You must specify a filter width and height';
$zmSlangFilterUploadEvents   = 'Uploadovat nalezen�';
$zmSlangFilterVideoEvents    = 'Create video for all matches';
$zmSlangFirst                = 'Prvn�';
$zmSlangFlippedHori          = 'P�eklopen� vodorovn�';
$zmSlangFlippedVert          = 'P�eklopen� svisle';
$zmSlangFocus                = 'Zaost�en�';
$zmSlangForceAlarm           = 'Spustit alarm';
$zmSlangFormat               = 'Form�t';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'FPS Interval pro report';
$zmSlangFrameId              = 'Sn�mek Id';
$zmSlangFrameRate            = 'Rychlost sn�mk�';
$zmSlangFrameSkip            = 'Vynechat sn�mek';
$zmSlangFrame                = 'Sn�mek';
$zmSlangFrames               = 'Sn�mky';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = 'Funkce';
$zmSlangFunction             = 'Funkce';
$zmSlangGain                 = 'Zisk';
$zmSlangGeneral              = 'General';
$zmSlangGenerateVideo        = 'Generovat video';
$zmSlangGeneratingVideo      = 'Generuji video';
$zmSlangGoToZoneMinder       = 'J�t na ZoneMinder.com';
$zmSlangGrey                 = '�ed�';
$zmSlangGroup                = 'Group';
$zmSlangGroups               = 'Skupiny';
$zmSlangHasFocusSpeed        = 'M� rychlost zaost�en�';
$zmSlangHasGainSpeed         = 'M� rychlost zisku';
$zmSlangHasHomePreset        = 'M� Home volbu';
$zmSlangHasIrisSpeed         = 'M� rychlost irisu';
$zmSlangHasPanSpeed          = 'M� rychlost ot��en�';
$zmSlangHasPresets           = 'M� p�edvolby';
$zmSlangHasTiltSpeed         = 'M� rychlost n�klonu';
$zmSlangHasTurboPan          = 'M� Turbo ot��en�';
$zmSlangHasTurboTilt         = 'M� Turbo n�klon';
$zmSlangHasWhiteSpeed        = 'M� rychlost vyv�en� b�l�';
$zmSlangHasZoomSpeed         = 'M� rychlost zoomu';
$zmSlangHighBW               = 'Rychl�&nbsp;B/W';
$zmSlangHigh                 = 'Rychl�';
$zmSlangHome                 = 'Dom�';
$zmSlangHour                 = 'Hodina';
$zmSlangHue                  = 'Odst�n';
$zmSlangId                   = 'Id';
$zmSlangIdle                 = 'P�ipraven';
$zmSlangIgnore               = 'Ignorovat';
$zmSlangImageBufferSize      = 'Velikost buferu sn�mk�';
$zmSlangImage                = 'Obraz';
$zmSlangImages               = 'Images';
$zmSlangInclude              = 'Vlo�it';
$zmSlangIn                   = 'Dovnit�';
$zmSlangInverted             = 'P�evr�cen�';
$zmSlangIris                 = 'Iris';
$zmSlangKeyString            = 'Key String';
$zmSlangLabel                = 'Label';
$zmSlangLanguage             = 'Jazyk';
$zmSlangLast                 = 'Posledn�';
$zmSlangLimitResultsPost     = 'v�sledk�'; // This is used at the end of the phrase 'Limit to first N results only'
$zmSlangLimitResultsPre      = 'Zobrazit pouze prvn�ch'; // This is used at the beginning of the phrase 'Limit to first N results only'
$zmSlangLinkedMonitors       = 'Linked Monitors';
$zmSlangList                 = 'Seznam';
$zmSlangLoad                 = 'Load';
$zmSlangLocal                = 'Lok�ln�';
$zmSlangLoggedInAs           = 'P�ihl�en jako';
$zmSlangLoggingIn            = 'P�ihla�uji';
$zmSlangLogin                = 'P�ihl�sit';
$zmSlangLogout               = 'Odhl�sit';
$zmSlangLowBW                = 'Pomal�&nbsp;B/W';
$zmSlangLow                  = 'Pomal�';
$zmSlangMain                 = 'Hlavn�';
$zmSlangMan                  = 'Man';
$zmSlangManual               = 'Manu�l';
$zmSlangMark                 = 'Ozna�it';
$zmSlangMaxBandwidth         = 'Max bandwidth';
$zmSlangMaxBrScore           = 'Max.<br/>sk�re';
$zmSlangMaxFocusRange        = 'Max rozsah zaost�en�';
$zmSlangMaxFocusSpeed        = 'Max rychlost zaost�en�';
$zmSlangMaxFocusStep         = 'Max krok zaost�en�';
$zmSlangMaxGainRange         = 'Max rozsah zisku';
$zmSlangMaxGainSpeed         = 'Max rychlost zisku';
$zmSlangMaxGainStep          = 'Max krok zisku';
$zmSlangMaximumFPS           = 'Maximum FPS';
$zmSlangMaxIrisRange         = 'Max rozsah iris';
$zmSlangMaxIrisSpeed         = 'Max rychlost iris';
$zmSlangMaxIrisStep          = 'Max krok iris';
$zmSlangMax                  = 'Max';
$zmSlangMaxPanRange          = 'Max rozsah ot��en�';
$zmSlangMaxPanSpeed          = 'Max rychlost ot��en�';
$zmSlangMaxPanStep           = 'Max krok ot��en�';
$zmSlangMaxTiltRange         = 'Max rozsah n�klonu';
$zmSlangMaxTiltSpeed         = 'Max rychlost n�klonu';
$zmSlangMaxTiltStep          = 'Max krok n�klonu';
$zmSlangMaxWhiteRange        = 'Max rozsah vyv�en� b�l�';
$zmSlangMaxWhiteSpeed        = 'Max rychlost vyv�en� b�l�';
$zmSlangMaxWhiteStep         = 'Max krok vyv�en� b�l�';
$zmSlangMaxZoomRange         = 'Max rozsah zoomu';
$zmSlangMaxZoomSpeed         = 'Max rychlost zoomu';
$zmSlangMaxZoomStep          = 'Max krok zoomu';
$zmSlangMediumBW             = 'St�edn�&nbsp;B/W';
$zmSlangMedium               = 'St�edn�';
$zmSlangMinAlarmAreaLtMax    = 'Minimum alarm area should be less than maximum';
$zmSlangMinAlarmAreaUnset    = 'You must specify the minimum alarm pixel count';
$zmSlangMinBlobAreaLtMax     = 'Minimum zna�kovan� oblasti by m�lo b�t men�� ne� maximum';
$zmSlangMinBlobAreaUnset     = 'You must specify the minimum blob pixel count';
$zmSlangMinBlobLtMinFilter   = 'Minimum blob area should be less than or equal to minimum filter area';
$zmSlangMinBlobsLtMax        = 'Minimum zna�ek by m�lo b�t men�� ne� maximum';
$zmSlangMinBlobsUnset        = 'You must specify the minimum blob count';
$zmSlangMinFilterAreaLtMax   = 'Minimum filter area should be less than maximum';
$zmSlangMinFilterAreaUnset   = 'You must specify the minimum filter pixel count';
$zmSlangMinFilterLtMinAlarm  = 'Minimum filter area should be less than or equal to minimum alarm area';
$zmSlangMinFocusRange        = 'Min rozsah zaost�en�';
$zmSlangMinFocusSpeed        = 'Min rychlost zaost�en�';
$zmSlangMinFocusStep         = 'Min krok zaost�en�';
$zmSlangMinGainRange         = 'Min rozsah zisku';
$zmSlangMinGainSpeed         = 'Min rychlost zisku';
$zmSlangMinGainStep          = 'Min krok zisku';
$zmSlangMinIrisRange         = 'Min rozsah iris';
$zmSlangMinIrisSpeed         = 'Min rychlost iris';
$zmSlangMinIrisStep          = 'Min krok iris';
$zmSlangMinPanRange          = 'Min rozsah ot��en�';
$zmSlangMinPanSpeed          = 'Min rychlost ot��en�';
$zmSlangMinPanStep           = 'Min krok ot��en�';
$zmSlangMinPixelThresLtMax   = 'Minim�ln� pr�h pixelu by m�l b�t men�� ne�  maximum�ln�';
$zmSlangMinPixelThresUnset   = 'You must specify a minimum pixel threshold';
$zmSlangMinTiltRange         = 'Min rozsah n�klonu';
$zmSlangMinTiltSpeed         = 'Min rychlost n�klonu';
$zmSlangMinTiltStep          = 'Min krok n�klonu';
$zmSlangMinWhiteRange        = 'Min rozsah vyv�en� b�l�';
$zmSlangMinWhiteSpeed        = 'Min rychlost vyv�en� b�l�';
$zmSlangMinWhiteStep         = 'Min krok vyv�en� b�l�';
$zmSlangMinZoomRange         = 'Min rozsah zoomu';
$zmSlangMinZoomSpeed         = 'Min rychlost zoomu';
$zmSlangMinZoomStep          = 'Min krok zoomu';
$zmSlangMisc                 = 'Ostatn�';
$zmSlangMonitorIds           = 'Id&nbsp;kamer';
$zmSlangMonitor              = 'Kamera';
$zmSlangMonitorPresetIntro   = 'Select an appropriate preset from the list below.<br><br>Please note that this may overwrite any values you already have configured for this monitor.<br><br>';
$zmSlangMonitorPreset        = 'Monitor Preset';
$zmSlangMonitors             = 'Kamery';
$zmSlangMontage              = 'Sest�ih';
$zmSlangMonth                = 'M�s�c';
$zmSlangMove                 = 'Pohyb';
$zmSlangMustBeGe             = 'mus� b�t v�t�� nebo rovno ne�';
$zmSlangMustBeLe             = 'mus� b�t men�� nebo rovno ne�';
$zmSlangMustConfirmPassword  = 'Mus�te potvrdit heslo';
$zmSlangMustSupplyPassword   = 'Mus�te zadat heslo';
$zmSlangMustSupplyUsername   = 'Mus�te zadat u�ivatelsk� jm�no';
$zmSlangName                 = 'Jm�no';
$zmSlangNear                 = 'Bl�zko';
$zmSlangNetwork              = 'S�';
$zmSlangNewGroup             = 'Nov� skupina';
$zmSlangNewLabel             = 'New Label';
$zmSlangNew                  = 'Nov�';
$zmSlangNewPassword          = 'Nov� heslo';
$zmSlangNewState             = 'Nov� stav';
$zmSlangNewUser              = 'Nov� u�ivatel';
$zmSlangNext                 = 'Dal��';
$zmSlangNoFramesRecorded     = 'Pro tento sn�mek nejsou ��dn� z�znamy';
$zmSlangNoGroup              = 'No Group';
$zmSlangNo                   = 'Ne';
$zmSlangNoneAvailable        = '��dn� nen� dostupn�';
$zmSlangNone                 = 'Zak�zat';
$zmSlangNormal               = 'Normaln�';
$zmSlangNoSavedFilters       = '��dn� ulo�en� filtry';
$zmSlangNoStatisticsRecorded = 'Pro tento z�znam/sn�mek nejsou zaznamen�ny ��dn� statistiky';
$zmSlangNotes                = 'Pozn�mky';
$zmSlangNumPresets           = 'Po�et p�edvoleb';
$zmSlangOff                  = 'Off';
$zmSlangOn                   = 'On';
$zmSlangOpen                 = 'Otev��t';
$zmSlangOpEq                 = 'rovno';
$zmSlangOpGtEq               = 'v�t�� nebo rovno';
$zmSlangOpGt                 = 'v�t��';
$zmSlangOpIn                 = 'nin set';
$zmSlangOpLtEq               = 'men�� nebo rovno';
$zmSlangOpLt                 = 'men��';
$zmSlangOpMatches            = 'obsahuje';
$zmSlangOpNe                 = 'nerovn� se';
$zmSlangOpNotIn              = 'nnot in set';
$zmSlangOpNotMatches         = 'neobsahuje';
$zmSlangOptionHelp           = 'Mo�nostHelp';
$zmSlangOptionRestartWarning = 'Tyto zm�ny se neprojev�\ndokud syst�m b��. Jakmile\ndokon��te prov�d�n� zm�n pros�m\nrestartujte ZoneMinder.';
$zmSlangOptions              = 'Mo�nosti';
$zmSlangOrder                = 'Po�ad�';
$zmSlangOrEnterNewName       = 'nebo vlo�te nov� jm�no';
$zmSlangOrientation          = 'Orientace';
$zmSlangOut                  = 'Ven';
$zmSlangOverwriteExisting    = 'P�epsat existuj�c�';
$zmSlangPaged                = 'Str�kov�';
$zmSlangPanLeft              = 'Posunout vlevo';
$zmSlangPan                  = 'Ot��en�';
$zmSlangPanRight             = 'Posunout vpravo';
$zmSlangPanTilt              = 'Ot��en�/N�klon';
$zmSlangParameter            = 'Parametr';
$zmSlangPassword             = 'Heslo';
$zmSlangPasswordsDifferent   = 'Hesla se neshoduj�';
$zmSlangPaths                = 'Cesty';
$zmSlangPause                = 'Pause';
$zmSlangPhoneBW              = 'Modem&nbsp;B/W';
$zmSlangPhone                = 'Modem';
$zmSlangPixelDiff            = 'Pixel Diff';
$zmSlangPixels               = 'pixely';
$zmSlangPlayAll              = 'P�ehr�t v�e';
$zmSlangPlay                 = 'Play';
$zmSlangPleaseWait           = 'Pros�m �ekejte';
$zmSlangPoint                = 'Point';
$zmSlangPostEventImageBuffer = 'Poz�znamov� bufer';
$zmSlangPreEventImageBuffer  = 'P�edz�znamov� bufer';
$zmSlangPreserveAspect       = 'Preserve Aspect Ratio';
$zmSlangPreset               = 'P�edvolba';
$zmSlangPresets              = 'P�edvolby';
$zmSlangPrev                 = 'Zp�t';
$zmSlangProtocol             = 'Protocol';
$zmSlangRate                 = 'Rychlost';
$zmSlangReal                 = 'Skute�n�';
$zmSlangRecord               = 'Nahr�vat';
$zmSlangRefImageBlendPct     = 'Reference Image Blend %ge';
$zmSlangRefresh              = 'Obnovit';
$zmSlangRemoteHostName       = 'Adresa';
$zmSlangRemoteHostPath       = 'Cesta';
$zmSlangRemoteHostPort       = 'Port';
$zmSlangRemoteImageColours   = 'Barvy';
$zmSlangRemote               = 'S�ov�';
$zmSlangRename               = 'P�ejmenovat';
$zmSlangReplayAll            = 'All Events';
$zmSlangReplayGapless        = 'Gapless Events';
$zmSlangReplay               = 'P�ehr�t znovu';
$zmSlangReplay               = 'Replay';
$zmSlangReplaySingle         = 'Single Event';
$zmSlangResetEventCounts     = 'Resetovat po�ty z�znam�';
$zmSlangReset                = 'Reset';
$zmSlangRestarting           = 'Restartuji';
$zmSlangRestart              = 'Restartovat';
$zmSlangRestrictedCameraIds  = 'Povolen� id kamer';
$zmSlangRestrictedMonitors   = 'Restricted Monitors';
$zmSlangReturnDelay          = 'Prodleva vracen�';
$zmSlangReturnLocation       = 'Lokace vr�cen�';
$zmSlangRewind               = 'Rewind';
$zmSlangRotateLeft           = 'Oto�it vlevo';
$zmSlangRotateRight          = 'Oto�it vpravo';
$zmSlangRunMode              = 'Re�im';
$zmSlangRunning              = 'B��';
$zmSlangRunState             = 'Stav';
$zmSlangSaveAs               = 'Ulo�it jako';
$zmSlangSaveFilter           = 'Ulo�it filtr';
$zmSlangSave                 = 'Ulo�it';
$zmSlangScale                = 'Velikost';
$zmSlangScore                = 'Sk�re';
$zmSlangSecs                 = 'D�lka(s)';
$zmSlangSectionlength        = 'D�lka sekce';
$zmSlangSelectMonitors       = 'Select Monitors';
$zmSlangSelect               = 'Vybrat';
$zmSlangSelfIntersecting     = 'Polygon edges must not intersect';
$zmSlangSetLearnPrefs        = 'Set Learn Prefs'; // This can be ignored for now
$zmSlangSet                  = 'Nastavit';
$zmSlangSetNewBandwidth      = 'Nastavit novou rychlost s�t�';
$zmSlangSetPreset            = 'Nastavit p�edvolbu';
$zmSlangSettings             = 'Nastaven�';
$zmSlangShowFilterWindow     = 'Zobrazit filtr';
$zmSlangShowTimeline         = 'Zobrazit �asovou linii ';
$zmSlangSignalCheckColour    = 'Signal Check Colour';
$zmSlangSize                 = 'Velikost';
$zmSlangSleep                = 'Sp�t';
$zmSlangSortAsc              = 'Vzestupn�';
$zmSlangSortBy               = '�adit dle';
$zmSlangSortDesc             = 'Sestupn�';
$zmSlangSourceType           = 'Typ zdroje';
$zmSlangSource               = 'Zdroj';
$zmSlangSpeedHigh            = 'Vysok� rychlost';
$zmSlangSpeedLow             = 'N�zk� rychlost';
$zmSlangSpeedMedium          = 'St�edn� rychlost';
$zmSlangSpeed                = 'Rychlost';
$zmSlangSpeedTurbo           = 'Turbo rychlost';
$zmSlangStart                = 'Start';
$zmSlangState                = 'Stav';
$zmSlangStats                = 'Statistiky';
$zmSlangStatus               = 'Status';
$zmSlangStepBack             = 'Step Back';
$zmSlangStepForward          = 'Step Forward';
$zmSlangStep                 = 'Krok';
$zmSlangStepLarge            = 'Velk� krok';
$zmSlangStepMedium           = 'St�edn� krok';
$zmSlangStepNone             = '��dn� krok';
$zmSlangStepSmall            = 'Mal� krok';
$zmSlangStills               = 'Sn�mky';
$zmSlangStopped              = 'Zastaven';
$zmSlangStop                 = 'Zastavit';
$zmSlangStreamReplayBuffer   = 'Stream Replay Image Buffer';
$zmSlangStream               = 'Stream';
$zmSlangSubmit               = 'Potvrdit';
$zmSlangSystem               = 'System';
$zmSlangTele                 = 'P�ibl�it';
$zmSlangThumbnail            = 'Miniatura';
$zmSlangTilt                 = 'N�klon';
$zmSlangTime                 = '�as';
$zmSlangTimeDelta            = 'Delta �asu';
$zmSlangTimeline             = '�asov� linie';
$zmSlangTimeStamp            = '�asov� raz�tko';
$zmSlangTimestampLabelFormat = 'Form�t �asov�ho raz�tka';
$zmSlangTimestampLabelX      = '�asov� raz�tko X';
$zmSlangTimestampLabelY      = '�asov� raz�tko Y';
$zmSlangTimestamp            = 'Raz�tko';
$zmSlangToday                = 'Dnes';
$zmSlangTools                = 'N�stroje';
$zmSlangTotalBrScore         = 'Celkov�<br/>sk�re';
$zmSlangTrackDelay           = 'Prodleva dr�hy';
$zmSlangTrackMotion          = 'Pohyb po dr�ze';
$zmSlangTriggers             = 'Trigery';
$zmSlangTurboPanSpeed        = 'Rychlost Turbo ot��en�';
$zmSlangTurboTiltSpeed       = 'Rychlost Turbo n�klonu';
$zmSlangType                 = 'Typ';
$zmSlangUnarchive            = 'Vyjmout z archivu';
$zmSlangUnits                = 'Jednotky';
$zmSlangUnknown              = 'Nezn�m�';
$zmSlangUpdateAvailable      = 'Je dostupn� nov� update ZoneMinder.';
$zmSlangUpdateNotNecessary   = 'Update nen� pot�eba.';
$zmSlangUpdate               = 'Update';
$zmSlangUseFilterExprsPost   = '&nbsp;v�raz�'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = 'Pou��t&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = 'Pou��t filtr';
$zmSlangUsername             = 'U�ivatelsk� jm�no';
$zmSlangUsers                = 'U�ivatel�';
$zmSlangUser                 = 'U�ivatel';
$zmSlangValue                = 'Hodnota';
$zmSlangVersionIgnore        = 'Ignorovat tuto verzi';
$zmSlangVersionRemindDay     = 'P�ipomenout za 1 den';
$zmSlangVersionRemindHour    = 'P�ipomenout za hodinu';
$zmSlangVersionRemindNever   = 'Nep�ipom�nat nov� veze';
$zmSlangVersionRemindWeek    = 'P�ipomenout za t�den';
$zmSlangVersion              = 'Verze';
$zmSlangVideoFormat          = 'Video form�t';
$zmSlangVideoGenFailed       = 'Chyba p�i generov�n� videa!';
$zmSlangVideoGenFiles        = 'Existuj�c� video soubory';
$zmSlangVideoGenNoFiles      = '��dn� video soubory nenalezeny';
$zmSlangVideoGenParms        = 'Parametry generov�n� videa';
$zmSlangVideoGenSucceeded    = 'Video vygenerov�no �sp�n�!';
$zmSlangVideoSize            = 'Velikost videa';
$zmSlangVideo                = 'Video';
$zmSlangViewAll              = 'Zobrazit v�echny';
$zmSlangViewEvent            = 'Zobrazit z�znam';
$zmSlangViewPaged            = 'Zobrazit str�kov�';
$zmSlangView                 = 'Zobrazit';
$zmSlangWake                 = 'Vzbudit';
$zmSlangWarmupFrames         = 'Zah��vac� sn�mky';
$zmSlangWatch                = 'Sledovat';
$zmSlangWebColour            = 'Webov� barva';
$zmSlangWeb                  = 'Web';
$zmSlangWeek                 = 'T�den';
$zmSlangWhiteBalance         = 'Vyv�en� b�l�';
$zmSlangWhite                = 'B�l�';
$zmSlangWide                 = 'Odd�lit';
$zmSlangX10ActivationString  = 'X10 aktiva�n� �et�zec';
$zmSlangX10InputAlarmString  = 'X10 input alarm �et�zec';
$zmSlangX10OutputAlarmString = 'X10 output alarm �et�zec';
$zmSlangX10                  = 'X10';
$zmSlangX                    = 'X';
$zmSlangYes                  = 'Ano';
$zmSlangYouNoPerms           = 'K tomuto zdroji nem�te opr�vn�n�.';
$zmSlangY                    = 'Y';
$zmSlangZoneAlarmColour      = 'Barva alarmu (Red/Green/Blue)';
$zmSlangZoneArea             = 'Zone Area';
$zmSlangZoneFilterSize       = 'Filter Width/Height (pixels)';
$zmSlangZoneMinMaxAlarmArea  = 'Min/Max Alarmed Area';
$zmSlangZoneMinMaxBlobArea   = 'Min/Max Blob Area';
$zmSlangZoneMinMaxBlobs      = 'Min/Max Blobs';
$zmSlangZoneMinMaxFiltArea   = 'Min/Max Filtered Area';
$zmSlangZoneMinMaxPixelThres = 'Min/Max Pixel Threshold (0-255)';
$zmSlangZoneOverloadFrames   = 'Overload Frame Ignore Count';
$zmSlangZones                = 'Z�ny';
$zmSlangZone                 = 'Z�na';
$zmSlangZoomIn               = 'Zv�t�it';
$zmSlangZoomOut              = 'Zmen�it';
$zmSlangZoom                 = 'Zoom';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = 'Pr�v� je p�ihl�en \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s'; // For example '37 Events' (from Vlang below)
$zmClangLastEvents           = 'Posledn�ch %1$s %2$s'; // For example 'Last 37 Events' (from Vlang below)
$zmClangLatestRelease        = 'Posledn� verze je v%1$s, vy m�te v%2$s.';
$zmClangMonitorCount         = '%1$s %2$s'; // For example '4 Monitors' (from Vlang below)
$zmClangMonitorFunction      = 'Funkce %1$s kamery';
$zmClangRunningRecentVer     = 'Pou��v�te posledn� verzi ZoneMinder, v%s.';

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
$zmVlangEvent                = array( 0=>'Z�znam�', 1=>'Z�znam', 2=>'Z�znamy', 5=>'Z�znam�' );
$zmVlangMonitor              = array( 0=>'Kamer', 1=>'Kamera', 2=>'Kamery', 5=>'Kamer' );

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
