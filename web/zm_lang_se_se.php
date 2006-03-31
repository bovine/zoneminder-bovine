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
$zmSlang24BitColour          = '24 bitars f�rg';
$zmSlang8BitGrey             = '8 bit gr�skala';
$zmSlangAction               = 'Action';
$zmSlangActual               = 'Verklig';
$zmSlangAddNewControl        = 'Ny kontroll';
$zmSlangAddNewMonitor        = 'Ny bevakare';
$zmSlangAddNewUser           = 'Ny anv�ndare';
$zmSlangAddNewZone           = 'Ny zon';
$zmSlangAlarmBrFrames        = 'Larm<br/>ramar';
$zmSlangAlarmFrameCount      = 'Larmramsr�knare';
$zmSlangAlarmFrame           = 'Larmram';
$zmSlangAlarm                = 'Larm';
$zmSlangAlarmLimits          = 'Larmgr�nser';
$zmSlangAlarmMaximumFPS      = 'Alarm Maximum FPS';
$zmSlangAlarmPx              = 'Larm Pix';
$zmSlangAlarmRGBUnset        = 'Du m�ste s�tta en lam RGB f�rg';
$zmSlangAlert                = 'Varning';
$zmSlangAll                  = 'Alla';
$zmSlangApplyingStateChange  = 'Aktivera status�ndring';
$zmSlangApply                = 'L�gg till';
$zmSlangArchArchived         = 'Arkivera endast';
$zmSlangArchive              = 'Arkiv';
$zmSlangArchived             = 'Arkiverad';
$zmSlangArchUnarchived       = 'Unarchived Only';
$zmSlangArea                 = 'Area';
$zmSlangAreaUnits            = 'Area (px/%)';
$zmSlangAttrAlarmFrames      = 'Larmramar';
$zmSlangAttrArchiveStatus    = 'Arkivstatus';
$zmSlangAttrAvgScore         = 'Ung. v�rde';
$zmSlangAttrCause            = 'Orsak';
$zmSlangAttrDate             = 'Datum';
$zmSlangAttrDateTime         = 'Datum/Tid';
$zmSlangAttrDiskBlocks       = 'Diskblock';
$zmSlangAttrDiskPercent      = 'Diskprocent';
$zmSlangAttrDuration         = 'L�ngd';
$zmSlangAttrFrames           = 'Ramar';
$zmSlangAttrId               = 'Id';
$zmSlangAttrMaxScore         = 'Max. v�rde';
$zmSlangAttrMonitorId        = 'Bevakningsid';
$zmSlangAttrMonitorName      = 'Bevakningsnamn';
$zmSlangAttrName             = 'Namn';
$zmSlangAttrNotes            = 'Not';
$zmSlangAttrTime             = 'Tid';
$zmSlangAttrTotalScore       = 'Totalv�rde';
$zmSlangAttrWeekday          = 'Veckodag';
$zmSlangAutoArchiveAbbr      = 'Arkivera';
$zmSlangAutoArchiveEvents    = 'Arkivera alla tr�ffar automatiskt';
$zmSlangAuto                 = 'Auto';
$zmSlangAutoDeleteAbbr       = 'Radera';
$zmSlangAutoDeleteEvents     = 'Radera alla tr�ffar automatiskt';
$zmSlangAutoEmailAbbr        = 'E-post';
$zmSlangAutoEmailEvents      = 'Skicka e-post med detaljer om alla tr�ffar auyomatiskt';
$zmSlangAutoExecuteAbbr      = 'Utf�r';
$zmSlangAutoExecuteEvents    = 'Exekvera kommando p� alla tr�ffar automatiskt';
$zmSlangAutoMessageAbbr      = 'Meddelande';
$zmSlangAutoMessageEvents    = 'Meddela detaljer om alla tr�ffar automatiskt';
$zmSlangAutoStopTimeout      = 'Auto Stop Timeout';
$zmSlangAutoUploadAbbr       = 'Ladda upp';
$zmSlangAutoUploadEvents     = 'Ladda upp alla tr�ffar automatiskt';
$zmSlangAutoVideoAbbr        = 'Video';
$zmSlangAutoVideoEvents      = 'Skapa video f�r alla tr�ffar automatiskt';
$zmSlangAvgBrScore           = 'Ung.<br/>tr�ff';
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
$zmSlangBadNameChars         = 'Namn kan endast inneh�lla alfanumeriska tecken, bindestreck och understreck';
$zmSlangBadPath              = 'Path must be set to a valid value';
$zmSlangBadPort              = 'Port must be set to a valid number';
$zmSlangBadPostEventCount    = 'Post event image buffer must be an integer of zero or more';
$zmSlangBadPreEventCount     = 'Pre event image buffer must be at least zero, and less than image buffer size';
$zmSlangBadRefBlendPerc      = 'Reference blendpercentage must be a positive integer';
$zmSlangBadSectionLength     = 'Section length must be an integer of 30 or more';
$zmSlangBadWarmupCount       = 'Warmup frames must be an integer of zero or more';
$zmSlangBadWebColour         = 'Web colour must be a valid web colour string';
$zmSlangBadWidth             = 'Width must be set to a valid value';
$zmSlangBandwidth            = 'Bandbredd';
$zmSlangBlobPx               = 'Blob Px';
$zmSlangBlobs                = 'Blobbar';
$zmSlangBlobSizes            = 'Blobstorlek';
$zmSlangBrightness           = 'Ljusstyrka';
$zmSlangBuffers              = 'Buffrar';
$zmSlangCanAutoFocus         = 'Har autofokus';
$zmSlangCanAutoGain          = 'Har autoniv�';
$zmSlangCanAutoIris          = 'Har autoiris';
$zmSlangCanAutoWhite         = 'Har autovitbalans.';
$zmSlangCanAutoZoom          = 'Har autozoom';
$zmSlangCancel               = '�ngra';
$zmSlangCancelForcedAlarm    = '�ngra&nbsp;tvingande&nbsp;larm';
$zmSlangCanFocusAbs          = 'Har absolut fokus';
$zmSlangCanFocusCon          = 'har kontinuerlig fokus';
$zmSlangCanFocus             = 'Har fokus';
$zmSlangCanFocusRel          = 'Har relativ fokus';
$zmSlangCanGainAbs           = 'Har absolut niv�';
$zmSlangCanGainCon           = 'Har kontinuerlig niv�';
$zmSlangCanGain              = 'Har niv�';
$zmSlangCanGainRel           = 'Har relativ niv�';
$zmSlangCanIrisAbs           = 'Har absolut iris';
$zmSlangCanIrisCon           = 'Har kontinuerlig iris';
$zmSlangCanIris              = 'Har iris';
$zmSlangCanIrisRel           = 'Har relativ iris';
$zmSlangCanMoveAbs           = 'Har absolut f�rflyttning';
$zmSlangCanMoveCon           = 'Har kontinuerlig f�rflyttning';
$zmSlangCanMoveDiag          = 'Har diagonal f�rflyttning';
$zmSlangCanMove              = 'Har f�rflyttning';
$zmSlangCanMoveMap           = 'Har mappad f�rflyttning';
$zmSlangCanMoveRel           = 'Har relativ f�rflyttning';
$zmSlangCanPan               = 'Har panorering';
$zmSlangCanReset             = 'Har �terst�llning';
$zmSlangCanSetPresets        = 'Har f�rinst�llningar';
$zmSlangCanSleep             = 'Kan vila';
$zmSlangCanTilt              = 'Kan tilta';
$zmSlangCanWake              = 'Kan vakna';
$zmSlangCanWhiteAbs          = 'Har absolut vitbalans';
$zmSlangCanWhiteBal          = 'Kan vitbalans';
$zmSlangCanWhiteCon          = 'Kan kontinuerligt vitbalansera';
$zmSlangCanWhite             = 'Kan vitbalansera';
$zmSlangCanWhiteRel          = 'Kan relativt vitbalansera';
$zmSlangCanZoomAbs           = 'Kan zooma absolut';
$zmSlangCanZoomCon           = 'Kan zooma kontinuerligt';
$zmSlangCanZoom              = 'Kan zooma';
$zmSlangCanZoomRel           = 'Kan zooma realativt';
$zmSlangCaptureHeight        = 'F�ngsth�jd';
$zmSlangCapturePalette       = 'F�ngstpalett';
$zmSlangCaptureWidth         = 'F�ngstbredd';
$zmSlangCause                = 'Orsak';
$zmSlangCheckMethod          = 'Larmkontrollmetod';
$zmSlangChooseFilter         = 'V�lj filter';
$zmSlangChoosePreset         = 'V�lj standard';
$zmSlangClose                = 'St�ng';
$zmSlangColour               = 'F�rg';
$zmSlangCommand              = 'Kommando';
$zmSlangConfig               = 'Konfigurera';
$zmSlangConfiguredFor        = 'Konfigurerad f�r';
$zmSlangConfirmDeleteEvents  = 'Are you sure you wish to delete the selected events?';
$zmSlangConfirmPassword      = 'Bekr�fta l�senord';
$zmSlangConjAnd              = 'och';
$zmSlangConjOr               = 'eller';
$zmSlangConsole              = 'Konsoll';
$zmSlangContactAdmin         = 'Kontakta din administrat�r f�r detaljer.';
$zmSlangContinue             = 'Forts�tt';
$zmSlangContrast             = 'Kontrast';
$zmSlangControlAddress       = 'Kontrolladress';
$zmSlangControlCap           = 'Control Capability';
$zmSlangControlCaps          = 'Control Capabilities';
$zmSlangControlDevice        = 'Kontrollenhet';
$zmSlangControl              = 'Kontroll';
$zmSlangControllable         = 'Kontrollerbar';
$zmSlangControlType          = 'Kontrolltyp';
$zmSlangCycle                = 'Cycle';
$zmSlangCycleWatch           = 'Cycle Watch';
$zmSlangDay                  = 'Dag';
$zmSlangDebug                = 'Avlusa';
$zmSlangDefaultRate          = 'Standard hastighet';
$zmSlangDefaultScale         = 'Standardskala';
$zmSlangDeleteAndNext        = 'Radera &amp; N�sta';
$zmSlangDeleteAndPrev        = 'Radera &amp; F�reg.';
$zmSlangDelete               = 'Radera';
$zmSlangDeleteSavedFilter    = 'Radera sparade filter';
$zmSlangDescription          = 'Beskrivning';
$zmSlangDeviceChannel        = 'Enhetskanal';
$zmSlangDeviceFormat         = 'Enhetsformat (0=PAL,1=NTSC etc)';
$zmSlangDeviceNumber         = 'Enhetsnummer (/dev/video?)';
$zmSlangDevicePath           = 'Enhetss�kv�g';
$zmSlangDimensions           = 'Dimensioner';
$zmSlangDisableAlarms        = 'Avaktivera larm';
$zmSlangDisk                 = 'Disk';
$zmSlangDonateAlready        = 'Nej, Jag har redan donerat';
$zmSlangDonateEnticement     = 'Du har k�rt ZoneMinder ett tag nu och f�rhoppningsvis har du sett att det fungerar bra hemma eller p� ditt f�retag. �ven om ZoneMinder �r, och kommer att vara, fri programvara och �ppen kallkod, s� kostar det pengar att utveckla och underh�lla. Om du vill hj�lpa till med framtida utveckling och nya funktioner s� var vanlig och bidrag med en slant. Bidragen �r naturligtvis en option men mycket uppskattade och du kan bidra med precis hur mycket du vill.<br><br>Om du vill ge ett bidrag v�ljer du nedan eller surfar till http://www.zoneminder.com/donate.html.<br><br>Tack f�r att du anv�nder ZoneMinder, gl�m inte att bes�ka forumen p� ZoneMinder.com f�r support och f�rslag om hur du f�r din ZoneMinder att fungera lite b�ttre.';
$zmSlangDonateRemindDay      = 'Inte �n, p�minn om 1 dag';
$zmSlangDonateRemindHour     = 'Inte �n, p�minn om en 1 timme';
$zmSlangDonateRemindMonth    = 'Inte �n, p�minn om 1 m�nad';
$zmSlangDonateRemindNever    = 'Nej, Jag vill inte donera, p�minn mig inte mer';
$zmSlangDonateRemindWeek     = 'Inte �n, p�minn om 1 vecka';
$zmSlangDonate               = 'Var v�nlig och donera';
$zmSlangDonateYes            = 'Ja, jag vill g�rna donera nu';
$zmSlangDownload             = 'Ladda ner';
$zmSlangDuration             = 'L�ngd';
$zmSlangEdit                 = 'Redigera';
$zmSlangEmail                = 'E-post';
$zmSlangEnableAlarms         = 'Aktivera larm';
$zmSlangEnabled              = 'Aktiverad';
$zmSlangEnterNewFilterName   = 'Mata in nytt filternamn';
$zmSlangErrorBrackets        = 'Fel, kontrollera att du har samma antal v�nster som h�ger-hakar';
$zmSlangError                = 'Fel';
$zmSlangErrorValidValue      = 'Fel, kontrollera att alla terms har giltligt v�rde';
$zmSlangEtc                  = 'etc';
$zmSlangEventFilter          = 'H�ndelsefilter';
$zmSlangEvent                = 'H�ndelse';
$zmSlangEventId              = 'H�ndelse nr';
$zmSlangEventName            = 'H�ndelsenamn';
$zmSlangEventPrefix          = 'H�ndelseprefix';
$zmSlangEvents               = 'H�ndelser';
$zmSlangExclude              = 'Exkludera';
$zmSlangExportDetails        = 'Exportera h�ndelsedetaljer';
$zmSlangExport               = 'Exportera';
$zmSlangExportFailed         = 'Exporten misslyckades';
$zmSlangExportFormat         = 'Exportera fileformat';
$zmSlangExportFormatTar      = 'Tar';
$zmSlangExportFormatZip      = 'Zip';
$zmSlangExportFrames         = 'Exportera ramdetaljer';
$zmSlangExportImageFiles     = 'Exportera bildfiler';
$zmSlangExporting            = 'Exporterar';
$zmSlangExportMiscFiles      = 'Exportera andra filer (om dom finns)';
$zmSlangExportOptions        = 'Konfiguera export';
$zmSlangExportVideoFiles     = 'Exportera videofiler (om dom finns)';
$zmSlangFar                  = 'Far';
$zmSlangFeed                 = 'Matning';
$zmSlangFileColours          = 'Filf�rg';
$zmSlangFile                 = 'Fil';
$zmSlangFilePath             = 'S�kvag';
$zmSlangFilterPx             = 'Filter Px';
$zmSlangFilters              = 'Filter';
$zmSlangFilterUnset          = 'Du m�ste specificera filtrets bredd och h�jd';
$zmSlangFirst                = 'F�rst';
$zmSlangFlippedHori          = 'V�nd horisontellt';
$zmSlangFlippedVert          = 'V�nd vertikalt';
$zmSlangFocus                = 'Fokus';
$zmSlangForceAlarm           = 'Tvinga&nbsp;larm';
$zmSlangFormat               = 'Format';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'FPS rapportintervall';
$zmSlangFrameId              = 'Ram id';
$zmSlangFrame                = 'Ram';
$zmSlangFrameRate            = 'Ram hastighet';
$zmSlangFrameSkip            = 'Hoppa �ver ram';
$zmSlangFrames               = 'Ramar';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = 'Funk';
$zmSlangFunction             = 'Funktion';
$zmSlangGain                 = 'Niv�';
$zmSlangGeneral              = 'Generell';
$zmSlangGenerateVideo        = 'Skapa video';
$zmSlangGeneratingVideo      = 'Skapar video';
$zmSlangGoToZoneMinder       = 'G� till ZoneMinder.com';
$zmSlangGrey                 = 'Gr�';
$zmSlangGroup                = 'Group';
$zmSlangGroups               = 'Grupper';
$zmSlangHasFocusSpeed        = 'Har focushastighet';
$zmSlangHasGainSpeed         = 'Har niv�hastighet';
$zmSlangHasHomePreset        = 'Har normalinst�llning';
$zmSlangHasIrisSpeed         = 'Har irishastighet';
$zmSlangHasPanSpeed          = 'Har panoramahastighet';
$zmSlangHasPresets           = 'Har f�rinst�llningar';
$zmSlangHasTiltSpeed         = 'Har tilthastighet';
$zmSlangHasTurboPan          = 'Har turbopanorering';
$zmSlangHasTurboTilt         = 'Har turbotilt';
$zmSlangHasWhiteSpeed        = 'Har vitbalanshastighet';
$zmSlangHasZoomSpeed         = 'Har Zoomhastighet';
$zmSlangHighBW               = 'H�g&nbsp;B/W';
$zmSlangHigh                 = 'H�g';
$zmSlangHome                 = 'Hem';
$zmSlangHour                 = 'Timme';
$zmSlangHue                  = 'Hue';
$zmSlangIdle                 = 'Vila';
$zmSlangId                   = 'nr';
$zmSlangIgnore               = 'Ignorera';
$zmSlangImage                = 'Bild';
$zmSlangImageBufferSize      = 'Bildbufferstorlek (ramar)';
$zmSlangInclude              = 'Inkludera';
$zmSlangIn                   = 'I';
$zmSlangInverted             = 'Inverterad';
$zmSlangIris                 = 'Iris';
$zmSlangLanguage             = 'Spr�k';
$zmSlangLast                 = 'Sist';
$zmSlangLimitResultsPost     = 'resultaten;'; // This is used at the end of the phrase 'Limit to first N results only'
$zmSlangLimitResultsPre      = 'Begr�nsa till f�rsta'; // This is used at the beginning of the phrase 'Limit to first N results only'
$zmSlangLinkedMonitors       = 'Linked Monitors';
$zmSlangList                 = 'Lista';
$zmSlangLoad                 = 'Belastning';
$zmSlangLocal                = 'Lokal';
$zmSlangLoggedInAs           = 'Inloggad som';
$zmSlangLoggingIn            = 'Loggar in';
$zmSlangLogin                = 'Logga in';
$zmSlangLogout               = 'Logga ut';
$zmSlangLowBW                = 'L�g&nbsp;B/W';
$zmSlangLow                  = 'L�g';
$zmSlangMain                 = 'Huvudmeny';
$zmSlangMan                  = 'Man';
$zmSlangManual               = 'Manuell';
$zmSlangMark                 = 'Markera';
$zmSlangMaxBandwidth         = 'Max bandbredd';
$zmSlangMaxBrScore           = 'Max.<br/>Score';
$zmSlangMaxFocusRange        = 'Max fokusomr�de';
$zmSlangMaxFocusSpeed        = 'Max fokushastighet';
$zmSlangMaxFocusStep         = 'Max fokussteg';
$zmSlangMaxGainRange         = 'Max niv�omr�de';
$zmSlangMaxGainSpeed         = 'Max niv�hastighet';
$zmSlangMaxGainStep          = 'Max niv�steg';
$zmSlangMaximumFPS           = 'Max FPS';
$zmSlangMaxIrisRange         = 'Max irsiomr�de';
$zmSlangMaxIrisSpeed         = 'Max irishastighet';
$zmSlangMaxIrisStep          = 'Max irissteg';
$zmSlangMax                  = 'Max';
$zmSlangMaxPanRange          = 'Max panoramaomr�de';
$zmSlangMaxPanSpeed          = 'Max panoramahastighet';
$zmSlangMaxPanStep           = 'Max panoramasteg';
$zmSlangMaxTiltRange         = 'Max tiltomr�de';
$zmSlangMaxTiltSpeed         = 'Max tilthastighet';
$zmSlangMaxTiltStep          = 'Max tiltsteg';
$zmSlangMaxWhiteRange        = 'Max vitbalansomr�de';
$zmSlangMaxWhiteSpeed        = 'Max vitbalanshastighet';
$zmSlangMaxWhiteStep         = 'Max vitbalanssteg';
$zmSlangMaxZoomRange         = 'Max zoomomr�de';
$zmSlangMaxZoomSpeed         = 'Max zoomhastighet';
$zmSlangMaxZoomStep          = 'Max zoomsteg';
$zmSlangMediumBW             = 'Mellan&nbsp;B/W';
$zmSlangMedium               = 'Mellan';
$zmSlangMinAlarmAreaLtMax    = 'Minsta larmarean skall vara mindre �n st�rsta';
$zmSlangMinAlarmAreaUnset    = 'Du m�ste ange minsta antal larmpixlar';
$zmSlangMinBlobAreaLtMax     = 'Minsta blobarean skall vara mindre �n h�gsta';
$zmSlangMinBlobAreaUnset     = 'Du m�ste ange minsta antalet blobpixlar';
$zmSlangMinBlobLtMinFilter   = 'Minsta blobarean skall vara mindre �n eller lika med minsta filterarean';
$zmSlangMinBlobsLtMax        = 'Minsta antalet blobbar skall vara mindre �n st�rsta';
$zmSlangMinBlobsUnset        = 'Du m�ste ange minsta antalet blobbar';
$zmSlangMinFilterAreaLtMax   = 'Minsta filterarean skall vara mindre �n h�gsta';
$zmSlangMinFilterAreaUnset   = 'Du m�ste ange minsta antal filterpixlar';
$zmSlangMinFilterLtMinAlarm  = 'Minsta filterarean skall vara mindre �n eller lika med minsta larmarean';
$zmSlangMinFocusRange        = 'Min fokusomr�de';
$zmSlangMinFocusSpeed        = 'Min fokushastighet';
$zmSlangMinFocusStep         = 'Min fokussteg';
$zmSlangMinGainRange         = 'Min niv�omr�de';
$zmSlangMinGainSpeed         = 'Min niv�hastighet';
$zmSlangMinGainStep          = 'Min niv�steg';
$zmSlangMinIrisRange         = 'Min irisomr�de';
$zmSlangMinIrisSpeed         = 'Min irishastighet';
$zmSlangMinIrisStep          = 'Min irissteg';
$zmSlangMinPanRange          = 'Min panoramaomr�de';
$zmSlangMinPanSpeed          = 'Min panoramahastighet';
$zmSlangMinPanStep           = 'Min panoramasteg';
$zmSlangMinPixelThresLtMax   = 'Minsta pixel threshold skall vara mindre �n h�gsta';
$zmSlangMinPixelThresUnset   = 'Du m�ste ange minsta pixel threshold';
$zmSlangMinTiltRange         = 'Min tiltomr�de';
$zmSlangMinTiltSpeed         = 'Min tilthastighet';
$zmSlangMinTiltStep          = 'Min tiltsteg';
$zmSlangMinWhiteRange        = 'Min vitbalansomr�de';
$zmSlangMinWhiteSpeed        = 'Min vitbalanshastighet';
$zmSlangMinWhiteStep         = 'Min vitbalanssteg';
$zmSlangMinZoomRange         = 'Min zoomomr�de';
$zmSlangMinZoomSpeed         = 'Min zoomhastighet';
$zmSlangMinZoomStep          = 'Min zoomsteg';
$zmSlangMisc                 = '�vrigt';
$zmSlangMonitor              = 'Bevakning';
$zmSlangMonitorIds           = 'Bevaknings&nbsp;nr';
$zmSlangMonitorPreset        = 'F�rinst�lld bevakning';
$zmSlangMonitorPresetIntro   = 'V�lj en f�rinst�llning fr�n listan.<br><br>Var medveten om att detta kan skriva �ver inst�llningar du redan gjort f�r denna bevakare.<br><br>';
$zmSlangMonitors             = 'Bevakare';
$zmSlangMontage              = 'Montera';
$zmSlangMonth                = 'M�nad';
$zmSlangMove                 = 'Flytta';
$zmSlangMustBeGe             = 'm�ste vara st�rre �n eller lika med';
$zmSlangMustBeLe             = 'm�ste vara mindre �n eller lika med';
$zmSlangMustConfirmPassword  = 'Du m�ste bekr�fta l�senordet';
$zmSlangMustSupplyPassword   = 'Du m�ste ange ett l�senord';
$zmSlangMustSupplyUsername   = 'Du m�ste ange ett anv�ndarnamn';
$zmSlangName                 = 'Namn';
$zmSlangNear                 = 'N�ra';
$zmSlangNetwork              = 'N�tverk';
$zmSlangNewGroup             = 'Ny grupp';
$zmSlangNew                  = 'Ny';
$zmSlangNewPassword          = 'Nytt l�senord';
$zmSlangNewState             = 'Nytt l�ge';
$zmSlangNewUser              = 'Ny anv�ndare';
$zmSlangNext                 = 'N�sta';
$zmSlangNoFramesRecorded     = 'Det finns inga ramar inspelade f�r denna h�ndelse';
$zmSlangNoGroup              = 'Ingen grupp';
$zmSlangNoneAvailable        = 'Ingen tillg�nglig';
$zmSlangNone                 = 'Ingen';
$zmSlangNo                   = 'Nej';
$zmSlangNormal               = 'Normal';
$zmSlangNoSavedFilters       = 'Inga sparade filter';
$zmSlangNoStatisticsRecorded = 'Det finns ingen statistik inspelad f�r denna h�ndelse/ram';
$zmSlangNotes                = 'Not.';
$zmSlangNumPresets           = 'Antal f�rinst�llningar';
$zmSlangOpen                 = '�ppna';
$zmSlangOpEq                 = 'lika med';
$zmSlangOpGtEq               = 'st�rre �n eller lika med';
$zmSlangOpGt                 = 'st�rre �n';
$zmSlangOpIn                 = 'in set';
$zmSlangOpLtEq               = 'mindre �n eller lika med';
$zmSlangOpLt                 = 'mindre �n';
$zmSlangOpMatches            = 'matchar';
$zmSlangOpNe                 = 'inte lika med';
$zmSlangOpNotIn              = 'inte i set';
$zmSlangOpNotMatches         = 'matchar inte';
$zmSlangOptionHelp           = 'Optionhj�lp';
$zmSlangOptionRestartWarning = 'Dessa �ndringar kommer inte att vara implementerade\nn�r systemet k�rs. N�r du �r klar starta om\n ZoneMinder.';
$zmSlangOptions              = 'Alternativ';
$zmSlangOrder                = 'Sortera';
$zmSlangOrEnterNewName       = 'eller skriv in nytt namn';
$zmSlangOrientation          = 'Orientation';
$zmSlangOut                  = 'Ut';
$zmSlangOverwriteExisting    = 'Skriv �ver';
$zmSlangPaged                = 'Paged';
$zmSlangPanLeft              = 'Panorera v�nster';
$zmSlangPan                  = 'Panorera';
$zmSlangPanRight             = 'Panorera h�ger';
$zmSlangPanTilt              = 'Pan/Tilt';
$zmSlangParameter            = 'Parameter';
$zmSlangPassword             = 'L�senord';
$zmSlangPasswordsDifferent   = 'L�senorden skiljer sig �t';
$zmSlangPaths                = 'S�kv�gar';
$zmSlangPhoneBW              = 'Mobil&nbsp;B/W';
$zmSlangPhone                = 'Mobil';
$zmSlangPixelDiff            = 'Pixel Diff';
$zmSlangPixels               = 'bildpunkter';
$zmSlangPlayAll              = 'Visa alla';
$zmSlangPleaseWait           = 'V�nta...';
$zmSlangPoint                = 'Punkt';
$zmSlangPostEventImageBuffer = 'Post Event Image Buffer';
$zmSlangPreEventImageBuffer  = 'Pre Event Image Buffer';
$zmSlangPreset               = 'F�rinst�llning';
$zmSlangPresets              = 'F�rinst�llningar';
$zmSlangPrev                 = 'F�reg.';
$zmSlangRate                 = 'Hastighet';
$zmSlangReal                 = 'Verklig';
$zmSlangRecord               = 'Spela in';
$zmSlangRefImageBlendPct     = 'Reference Image Blend %ge';
$zmSlangRefresh              = 'Uppdatera';
$zmSlangRemote               = 'Fj�rr';
$zmSlangRemoteHostName       = 'Fj�rrnamn';
$zmSlangRemoteHostPath       = 'Fj�rrs�kv�g';
$zmSlangRemoteHostPort       = 'Fj�rrport';
$zmSlangRemoteImageColours   = 'Fj�rrbildf�rger';
$zmSlangRename               = 'Byt namn';
$zmSlangReplay               = 'Repris';
$zmSlangReset                = '�terst�ll';
$zmSlangResetEventCounts     = '�terst�ll h�ndelser�knare';
$zmSlangRestart              = '�terstart';
$zmSlangRestarting           = '�terstartar';
$zmSlangRestrictedCameraIds  = 'Begr�nsade kameranr.';
$zmSlangRestrictedMonitors   = 'Restricted Monitors';
$zmSlangReturnDelay          = 'F�rdr�jd retur';
$zmSlangReturnLocation       = '�terv�nd till position';
$zmSlangRotateLeft           = 'Rotera v�nster';
$zmSlangRotateRight          = 'Rotera h�ger';
$zmSlangRunMode              = 'K�rl�ge';
$zmSlangRunning              = 'K�rs';
$zmSlangRunState             = 'K�rl�ge';
$zmSlangSaveAs               = 'Spara som';
$zmSlangSaveFilter           = 'Spara filter';
$zmSlangSave                 = 'Spara';
$zmSlangScale                = 'Skala';
$zmSlangScore                = 'Resultat';
$zmSlangSecs                 = 'Sek';
$zmSlangSectionlength        = 'Sektionsl�ngd';
$zmSlangSelectMonitors       = 'Select Monitors';
$zmSlangSelect               = 'V�lj';
$zmSlangSelfIntersecting     = 'Polygon�ndarna f�r inte �verlappa';
$zmSlangSetLearnPrefs        = 'Set Learn Prefs'; // This can be ignored for now
$zmSlangSetNewBandwidth      = 'St�ll in ny bandbredd';
$zmSlangSetPreset            = 'St�ll in f�rinst�llning';
$zmSlangSet                  = 'St�ll in';
$zmSlangSettings             = 'Inst�llningar';
$zmSlangShowFilterWindow     = 'Visa f�nsterfilter';
$zmSlangShowTimeline         = 'Visa tidslinje';
$zmSlangSize                 = 'Storlek';
$zmSlangSleep                = 'Vila';
$zmSlangSortAsc              = 'Stigande';
$zmSlangSortBy               = 'Sortera';
$zmSlangSortDesc             = 'Fallande';
$zmSlangSource               = 'K�lla';
$zmSlangSourceType           = 'K�lltyp';
$zmSlangSpeed                = 'Hastighet';
$zmSlangSpeedHigh            = 'H�ghastighet';
$zmSlangSpeedLow             = 'L�ghastighet';
$zmSlangSpeedMedium          = 'Normalhastighet';
$zmSlangSpeedTurbo           = 'Turbohastighet';
$zmSlangStart                = 'Start';
$zmSlangState                = 'L�ge';
$zmSlangStats                = 'Statistik';
$zmSlangStatus               = 'Status';
$zmSlangStepLarge            = 'Stora steg';
$zmSlangStepMedium           = 'Normalsteg';
$zmSlangStepNone             = 'Inga steg';
$zmSlangStepSmall            = 'Sm� steg';
$zmSlangStep                 = 'Steg';
$zmSlangStills               = 'Stillbilder';
$zmSlangStopped              = 'Stoppad';
$zmSlangStop                 = 'Stopp';
$zmSlangStream               = 'Str�mmande';
$zmSlangSubmit               = 'Skicka';
$zmSlangSystem               = 'System';
$zmSlangTele                 = 'Tele';
$zmSlangThumbnail            = 'Miniatyrer';
$zmSlangTilt                 = 'Tilt';
$zmSlangTimeDelta            = 'tidsdelta';
$zmSlangTimeline             = 'Tidslinje';
$zmSlangTimestampLabelFormat = 'Format p� tidsst�mpel';
$zmSlangTimestampLabelX      = 'V�rde p� tidsst�mpel X';
$zmSlangTimestampLabelY      = 'V�rde p� tidsst�mpel Y';
$zmSlangTimestamp            = 'Tidsst�mpel';
$zmSlangTimeStamp            = 'Tidsst�mpel';
$zmSlangTime                 = 'Tid';
$zmSlangToday                = 'Idag';
$zmSlangTools                = 'Verktyg';
$zmSlangTotalBrScore         = 'Total<br/>Score';
$zmSlangTrackDelay           = 'Sp�rf�rdr�jning';
$zmSlangTrackMotion          = 'Sp�ra r�relse';
$zmSlangTriggers             = 'Triggers';
$zmSlangTurboPanSpeed        = 'Turbo panoramahastighet';
$zmSlangTurboTiltSpeed       = 'Turbo tilthastighet';
$zmSlangType                 = 'Typ';
$zmSlangUnarchive            = 'Packa upp';
$zmSlangUnits                = 'Enheter';
$zmSlangUnknown              = 'Ok�nd';
$zmSlangUpdateAvailable      = 'En uppdatering till ZoneMinder finns tillg�nglig.';
$zmSlangUpdateNotNecessary   = 'Ingen uppdatering beh�vs.';
$zmSlangUpdate               = 'Uppdatera';
$zmSlangUseFilter            = 'Anv�nd filter';
$zmSlangUseFilterExprsPost   = '&nbsp;filter&nbsp;expressions'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = 'Anv�nd&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUser                 = 'Anv�ndare';
$zmSlangUsername             = 'Anv�ndarnamn';
$zmSlangUsers                = 'Anv�ndare';
$zmSlangValue                = 'V�rde';
$zmSlangVersionIgnore        = 'Ignorera denna version';
$zmSlangVersionRemindDay     = 'P�minn om 1 dag';
$zmSlangVersionRemindHour    = 'P�minn om 1 timme';
$zmSlangVersionRemindNever   = 'P�minn inte om nya versioner';
$zmSlangVersionRemindWeek    = 'P�minn om en 1 vecka';
$zmSlangVersion              = 'Version';
$zmSlangVideoFormat          = 'Videoformat';
$zmSlangVideoGenFailed       = 'Videogenereringen misslyckades!';
$zmSlangVideoGenFiles        = 'Befintliga videofiler';
$zmSlangVideoGenNoFiles      = 'Inga videofiler';
$zmSlangVideoGenParms        = 'Inst�llningar f�r videogenerering';
$zmSlangVideoGenSucceeded    = 'Videogenereringen lyckades!';
$zmSlangVideoSize            = 'Videostorlek';
$zmSlangVideo                = 'Video';
$zmSlangViewAll              = 'Visa alla';
$zmSlangViewEvent            = 'Visa h�ndelse';
$zmSlangViewPaged            = 'Visa Paged';
$zmSlangView                 = 'Visa';
$zmSlangWake                 = 'Vakna';
$zmSlangWarmupFrames         = 'V�rm upp ramar';
$zmSlangWatch                = 'Se';
$zmSlangWebColour            = 'Webbf�rg';
$zmSlangWeb                  = 'Webb';
$zmSlangWeek                 = 'Vecka';
$zmSlangWhiteBalance         = 'Vitbalans';
$zmSlangWhite                = 'Vit';
$zmSlangWide                 = 'Vid';
$zmSlangX10ActivationString  = 'X10 aktiveringsstr�ng';
$zmSlangX10InputAlarmString  = 'X10 larming�ngsstr�ng';
$zmSlangX10OutputAlarmString = 'X10 larmutg�ngsstr�ng';
$zmSlangX10                  = 'X10';
$zmSlangX                    = 'X';
$zmSlangYes                  = 'Ja';
$zmSlangY                    = 'J';
$zmSlangYouNoPerms           = 'Du har inte tillst�nd till denna resurs.';
$zmSlangZoneAlarmColour      = 'Larmf�rg (R�d/Gr�n/Bl�)';
$zmSlangZoneArea             = 'Zonarea';
$zmSlangZoneFilterSize       = 'Filterbredd/h�jd (pixlar)';
$zmSlangZoneMinMaxAlarmArea  = 'Min/Max larmarea';
$zmSlangZoneMinMaxBlobArea   = 'Min/Max blobbarea';
$zmSlangZoneMinMaxBlobs      = 'Min/Max blobbar';
$zmSlangZoneMinMaxFiltArea   = 'Min/Max filterarea';
$zmSlangZoneMinMaxPixelThres = 'Min/Max pixel Threshold (0-255)';
$zmSlangZones                = 'Zoner';
$zmSlangZone                 = 'Zon';
$zmSlangZoomIn               = 'Zooma in';
$zmSlangZoomOut              = 'Zooma ut';
$zmSlangZoom                 = 'Zoom';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = 'Aktuell inloggning �r \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s'; // For example '37 Events' (from Vlang below)
$zmClangLastEvents           = 'Senaste %1$s %2$s'; // For example 'Last 37 Events' (from Vlang below)
$zmClangLatestRelease        = 'Aktuell version �r v%1$s, du har v%2$s.';
$zmClangMonitorCount         = '%1$s %2$s'; // For example '4 Monitors' (from Vlang below)
$zmClangMonitorFunction      = 'Bevakare %1$s funktion';
$zmClangRunningRecentVer     = 'Du anv�nder den senaste versionen av ZoneMinder, v%s.';

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
$zmVlangEvent                = array( 0=>'H�ndelser', 1=>'H�ndelsen', 2=>'H�ndelserna' );
$zmVlangMonitor              = array( 0=>'Bevakare', 1=>'Bevakare', 2=>'Bevakare' );

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
	die( 'Fel, kan inte correlate variabel spr�kstr�ng' );
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

$zmOlangPromptLANG_DEFAULT = "V�lj spr�k f�r ZoneMinder";
$zmOlangHelpLANG_DEFAULT = "ZoneMinder kan anv�nda annat spr�k �n engelska i menyer och texter. V�lj h�r det spr�k du vill anv�nda till ZoneMinder.";


?>
