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

// Notes for Translators
// 1. When composing the language tokens in your language you should try and keep to roughly the
//   same length text if possible. Abbreviate where necessary as spacing is quite close in a number of places.
// 2. There are three types of string replacement
//   a) Simple replacements are words or short phrases that are static and used directly. This type of
//     replacement can be used 'as is'.
//   b) Complex replacements involve some dynamic element being included and so may require substitution
//     or changing into a different order. The token listed in this file will be passed through sprintf as
//     a formatting string. If the dynamic element is a number you will usually need to use a variable
//     replacement also as described below.
//   c) Variable replacements are used in conjunction with complex replacements and involve the generation
//     of a singular or plural noun depending on the number passed into the zmVlang function. This is
//     intended to allow phrases such a '0 potatoes', '1 potato', '2 potatoes' etc to conjunct correctly
//     with the associated numerator. Variable replacements are expressed are arrays with a series of
//     counts and their associated words. When doing a replacement the passed value is compared with 
//     those counts in descending order and the nearest match below is used if no exact match is found.
//     Therefore is you have a variable replacement with 0,1 and 2 counts, which would be the normal form
//     in English, if you have 5 'things' then the nearest match below is '2' and so that plural would be used.
// 3. The tokens listed below are not used to build up phrases or sentences from single words. Therefore
//   you can safely assume that a single word token will only be used in that context.
// 4. In new language files, or if you are changing only a few words or phrases it makes sense from a 
//   maintenance point of view to include the original language file and override the old definitions rather
//   than copy all the language tokens across. To do this change the line below to whatever your base language
//   is and uncomment it.
// require_once( 'zm_lang_en_gb.php' );

// Simple String Replacements
$zmSlang24BitColour          = '24 bit Farbe';
$zmSlang8BitGrey             = '8 bit Graustufe';
$zmSlangActual               = 'Aktuell';
$zmSlangAddNewMonitor        = 'Neuer Monitor';
$zmSlangAddNewUser           = 'Neuer User';
$zmSlangAddNewZone           = 'Neue Zone';
$zmSlangAlarm                = 'Alarm';
$zmSlangAlarmBrFrames        = 'Alarm<br/>Bilder';
$zmSlangAlarmFrame           = 'Alarm Bilder';
$zmSlangAlarmLimits          = 'Alarm Limits';
$zmSlangAlarmPx              = 'Alarm Pixel';
$zmSlangAlert                = 'Alarm';
$zmSlangAll                  = 'Alles';
$zmSlangApply                = 'Zuweisen';
$zmSlangApplyingStateChange  = 'Aktiviere neuen Status';
$zmSlangArchArchived         = 'Nur Archivierte';
$zmSlangArchive              = 'Archiv';
$zmSlangArchUnarchived       = 'Nur nichtarchivierte';
$zmSlangAttrAlarmFrames      = 'Alarm Bilder';
$zmSlangAttrArchiveStatus    = 'Archiv Status';
$zmSlangAttrAvgScore         = 'Avg. Z�hler';
$zmSlangAttrDate             = 'Datum';
$zmSlangAttrDateTime         = 'Datum/Zeit';
$zmSlangAttrDuration         = 'Dauer';
$zmSlangAttrFrames           = 'Bilder';
$zmSlangAttrMaxScore         = 'Max. Z�hler';
$zmSlangAttrMontage          = 'Montage';
$zmSlangAttrTime             = 'Zeit';
$zmSlangAttrTotalScore       = 'Total Z�hler';
$zmSlangAttrWeekday          = 'Wochentag';
$zmSlangAutoArchiveEvents    = 'Automatisches Archivieren aller zutreffender Ereignisse';
$zmSlangAutoDeleteEvents     = 'Automatisches L�schen aller zutreffender Ereignisse';
$zmSlangAutoEmailEvents      = 'Automatisches mailen der Details aller zutreffender Ereignisse';
$zmSlangAutoMessageEvents    = 'Automatisches mitteilen der Details aller zutreffender Ereignisse';
$zmSlangAutoUploadEvents     = 'Automatisches hochladen aller zutreffender Ereignisse';
$zmSlangAvgBrScore           = 'Avg.<br/>Z�hler';
$zmSlangBandwidth            = 'Bandbreite';
$zmSlangBlobPx               = 'Gebiets Pixel';
$zmSlangBlobs                = 'Gebiet ';
$zmSlangBlobSizes            = 'Gebiets Gr��e';
$zmSlangBrightness           = 'Helligkeit';
$zmSlangBuffers              = 'Puffer';
$zmSlangCancel               = 'Abbruch';
$zmSlangCancelForcedAlarm    = 'Abbruch&nbsp;Unbedingter&nbsp;Alarm';
$zmSlangCaptureHeight        = 'Capture H�he';
$zmSlangCapturePalette       = 'Capture FarbPalette';
$zmSlangCaptureWidth         = 'Capture Breite';
$zmSlangCheckAll             = 'Pr�fe Alles';
$zmSlangChooseFilter         = 'Filterauswahl';
$zmSlangClose                = 'Schlie�en';
$zmSlangColour               = 'Farbe';
$zmSlangConfiguredFor        = 'Eingerichtet f�r';
$zmSlangConfirmPassword      = 'Passwortbest�tigung';
$zmSlangConjAnd              = 'und';
$zmSlangConjOr               = 'oder';
$zmSlangConsole              = 'Konsole';
$zmSlangContactAdmin         = 'Bitte den Administrator f�r Details ansprechen.';
$zmSlangContrast             = 'Kontrast';
$zmSlangCycleWatch           = 'Zeitzyklus';
$zmSlangDay                  = 'Tag';
$zmSlangDeleteAndNext        = 'L�schen &amp; N�chstes';
$zmSlangDeleteAndPrev        = 'L�schen &amp; Voriges';
$zmSlangDelete               = 'L�schen';
$zmSlangDeleteSavedFilter    = 'L�sche gespeichertes Filter';
$zmSlangDescription          = 'Beschreibung';
$zmSlangDeviceChannel        = 'Ger�te Kanal';
$zmSlangDeviceFormat         = 'Ger�te Format (0=PAL,1=NTSC etc)';
$zmSlangDeviceNumber         = 'Ger�te Nummer (/dev/video?)';
$zmSlangDimensions           = 'Abma�e';
$zmSlangDuration             = 'Dauer';
$zmSlangEdit                 = 'Bearbeiten';
$zmSlangEmail                = 'Email';
$zmSlangEnabled              = 'Aktiviert';
$zmSlangEnterNewFilterName   = 'Neuen Filtername eingeben';
$zmSlangErrorBrackets        = 'Fehler , Bitte nur gleiche anzahl offener und geschlossener Brackets .';
$zmSlangError                = 'Fehler';
$zmSlangErrorValidValue      = 'Fehler ,Bitte alle Werte auf richtige Eingabe pr�fen';
$zmSlangEtc                  = 'etc';
$zmSlangEvent                = 'Ereigniss';
$zmSlangEventFilter          = 'Ereigniss Filter';
$zmSlangEvents               = 'Ereignisse';
$zmSlangExclude              = 'Ausschlu�';
$zmSlangFeed                 = 'Feed';
$zmSlangFilterPx             = 'Filter Px';
$zmSlangFirst                = 'Erstes';
$zmSlangForceAlarm           = 'Unbedingter&nbsp;Alarm';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'FPS Report Interval';
$zmSlangFrame                = 'Bild';
$zmSlangFrameId              = 'Bild Id';
$zmSlangFrameRate            = 'Bildrate';
$zmSlangFrames               = 'Bilder';
$zmSlangFrameSkip            = 'Bilder auslassen';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = 'Funktion';
$zmSlangFunction             = 'Funktion';
$zmSlangGenerateVideo        = 'Erzeuge Video';
$zmSlangGeneratingVideo      = 'Erzeuge Video';
$zmSlangGrey                 = 'Grau';
$zmSlangHighBW               = 'Hohe&nbsp;B/W';
$zmSlangHigh                 = 'Hohe';
$zmSlangHour                 = 'Stunde';
$zmSlangHue                  = 'Farbabstufung';
$zmSlangId                   = 'Id';
$zmSlangIdle                 = 'Leerlauf';
$zmSlangIgnore               = 'Ignoriere';
$zmSlangImageBufferSize      = 'Bildpuffergr��e';
$zmSlangImage                = 'Bild';
$zmSlangInclude              = 'Einschlu�';
$zmSlangInverted             = 'Invertiert';
$zmSlangLanguage             = 'Sprache';
$zmSlangLast                 = 'Letztes';
$zmSlangLocal                = 'Lokal';
$zmSlangLoggedInAs           = 'Angemeldet als';
$zmSlangLoggingIn            = 'Amnelden ';
$zmSlangLogin                = 'Anmeldung';
$zmSlangLogout               = 'Abmelden';
$zmSlangLowBW                = 'Niedrige&nbsp;B/W';
$zmSlangLow                  = 'Niedrige';
$zmSlangMark                 = 'Markiert';
$zmSlangMaxBrScore           = 'Max.<br/>Z�hler';
$zmSlangMaximumFPS           = 'Maximal FPS';
$zmSlangMax                  = 'Max';
$zmSlangMediumBW             = 'Mittlere&nbsp;B/W';
$zmSlangMedium               = 'Mittlere';
$zmSlangMinAlarmGeMinBlob    = 'Minimale alarmpixelzahl muss gr��er oder gleich der minimum Arealpixel sein';
$zmSlangMinAlarmGeMinFilter  = 'Minimale alarmpixelzahl muss gr��er oder gleich der minimum Filterpixel sein';
$zmSlangMisc                 = 'Misc';
$zmSlangMonitorIds           = 'Monitor&nbsp;Id';
$zmSlangMonitor              = 'Monitor';
$zmSlangMonitors             = 'Monitors';
$zmSlangMontage              = 'Montage';
$zmSlangMonth                = 'Monat';
$zmSlangMustBeGe             = 'muss gr��er oder gleich sein wie';
$zmSlangMustBeLe             = 'muss kleiner oder gleich sein wie';
$zmSlangMustConfirmPassword  = 'Sie m�ssen das Passwort best�tigen';
$zmSlangMustSupplyPassword   = 'Sie m�ssen ein Passwort vergeben';
$zmSlangMustSupplyUsername   = 'Sie m�ssen einen Usernamen vergeben';
$zmSlangName                 = 'Name';
$zmSlangNetwork              = 'Netzwerk';
$zmSlangNew                  = 'Neu';
$zmSlangNewPassword          = 'Neues Passwort';
$zmSlangNewState             = 'Neuer Status';
$zmSlangNewUser              = 'Neuer User';
$zmSlangNext                 = 'N�chstes';
$zmSlangNoFramesRecorded     = 'Es gibt keine Aufnahmen von diesem Ereigniss';
$zmSlangNoneAvailable        = 'Nichts verf�gbar';
$zmSlangNone                 = 'Nichts';
$zmSlangNo                   = 'Nein';
$zmSlangNormal               = 'Normal';
$zmSlangNoSavedFilters       = 'Keine gespeicherten Filter';
$zmSlangNoStatisticsRecorded = 'Keine Statistik f�r dieses Ereigniss/Bilder';
$zmSlangOpEq                 = 'gleich zu';
$zmSlangOpGtEq               = 'gr��er oder gleich wie';
$zmSlangOpGt                 = 'gr��er als';
$zmSlangOpLtEq               = 'kleiner oder gleich wie';
$zmSlangOpLt                 = 'kleiner als';
$zmSlangOpNe                 = 'nicht gleich wie';
$zmSlangOptionHelp           = 'OptionHilfe';
$zmSlangOptionRestartWarning = 'Ver�nderungen werden erst bei Neustart des Programms aktiv\nF�r eine sofortige �nderungen  starten Sie das Programm bitte neu.';
$zmSlangOptions              = 'Optionen';
$zmSlangOrEnterNewName       = 'oder neuen Name eingeben';
$zmSlangOrientation          = 'Ausrichtung';
$zmSlangOverwriteExisting    = '�berschreibe bestehende';
$zmSlangPaged                = 'Paged';
$zmSlangParameter            = 'Parameter';
$zmSlangPassword             = 'Passwort';
$zmSlangPasswordsDifferent   = 'Die Passw�rter sind unterschiedlich';
$zmSlangPaths                = 'Pfade';
$zmSlangPhoneBW              = 'Telefon&nbsp;B/W';
$zmSlangPixels               = 'Punkte';
$zmSlangPleaseWait           = 'Bitte Warten';
$zmSlangPostEventImageBuffer = 'Post Ereigniss Bildpuffer';
$zmSlangPreEventImageBuffer  = 'Voriges Ereigniss Bildpuffer';
$zmSlangPrev                 = 'Voriges';
$zmSlangRate                 = 'Rate';
$zmSlangReal                 = 'Real';
$zmSlangRecord               = 'Aufnahme';
$zmSlangRefImageBlendPct     = 'Referenz Bild Blend %ge';
$zmSlangRefresh              = 'Refresh';
$zmSlangRemoteHostName       = 'Remote Host Name';
$zmSlangRemoteHostPath       = 'Remote Host Pfad';
$zmSlangRemoteHostPort       = 'Remote Host Port';
$zmSlangRemoteImageColours   = 'Remote Bildfarbe';
$zmSlangRemote               = 'Remote';
$zmSlangRename               = 'Umbenennen';
$zmSlangReplay               = 'Wiederholung';
$zmSlangResetEventCounts     = 'L�sche Ereignissz�hler';
$zmSlangRestarting           = 'Neustarten';
$zmSlangRestart              = 'Neustart';
$zmSlangRestrictedCameraIds  = 'Verbotene Kamera Id';
$zmSlangRotateLeft           = 'Drehung Links';
$zmSlangRotateRight          = 'Drehung Rechts';
$zmSlangRunMode              = 'Betriebsmodus';
$zmSlangRunning              = 'In Betrieb';
$zmSlangRunState             = 'Laufender Status';
$zmSlangSaveAs               = 'Speichere als';
$zmSlangSaveFilter           = 'Speichere Filter';
$zmSlangSave                 = 'Speichern';
$zmSlangScale                = 'Skaliere';
$zmSlangScore                = 'Z�hler';
$zmSlangSecs                 = 'Sekunden';
$zmSlangSectionlength        = 'Sektions L�nge';
$zmSlangServerLoad           = 'Server Last';
$zmSlangSetLearnPrefs        = 'Setze Lernmerkmale'; // This can be ignored for now
$zmSlangSetNewBandwidth      = 'Setze Neue Bandbreite';
$zmSlangSettings             = 'Einstellungen';
$zmSlangShowFilterWindow     = 'ZeigeFilterFenster';
$zmSlangSource               = 'Quelle';
$zmSlangSourceType           = 'Quellen Typ';
$zmSlangStart                = 'Start';
$zmSlangState                = 'Status';
$zmSlangStats                = 'Status';
$zmSlangStatus               = 'Status';
$zmSlangStills               = 'Standbilder';
$zmSlangStopped              = 'Gestoppt';
$zmSlangStop                 = 'Stop';
$zmSlangStream               = 'Stream';
$zmSlangSystem               = 'System';
$zmSlangTimeDelta            = 'Zeitdifferenz';
$zmSlangTimestampLabelFormat = 'Zeitstempel Marke Format';
$zmSlangTimestampLabelX      = 'Zeitstempel Marke X';
$zmSlangTimestampLabelY      = 'Zeitstempel Marke Y';
$zmSlangTimestamp            = 'Zeitstempel';
$zmSlangTimeStamp            = 'Zeit Stempel';
$zmSlangTime                 = 'Zeit';
$zmSlangTools                = 'Tools';
$zmSlangTotalBrScore         = 'Total<br/>Z�hler';
$zmSlangTriggers             = 'Ausl�ser';
$zmSlangType                 = 'Typ';
$zmSlangUnarchive            = 'Nichtarchiviert';
$zmSlangUnits                = 'Einheiten';
$zmSlangUnknown              = 'Unbekannt';
$zmSlangUseFilterExprsPost   = '&nbsp;Filter&nbsp;Ausdr�cke'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = 'Benutze&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = 'Benutze  Filter';
$zmSlangUsername             = 'Benutzername';
$zmSlangUsers                = 'Benutzer';
$zmSlangUser                 = 'Benutzer';
$zmSlangValue                = 'Wert';
$zmSlangVideoGenFailed       = 'Videoerzeugung fehlgeschlagen!';
$zmSlangVideoGenParms        = 'Videoerzeugung Parameter';
$zmSlangVideoSize            = 'Video Gr��e';
$zmSlangVideo                = 'Video';
$zmSlangViewAll              = 'Alles Anschauen';
$zmSlangViewPaged            = 'Seitenansicht';
$zmSlangView                 = 'Anschauen';
$zmSlangWarmupFrames         = 'Aufw�rm Bilder';
$zmSlangWatch                = 'Beobachte';
$zmSlangWeb                  = 'Web';
$zmSlangWeek                 = 'Woche';
$zmSlangX10ActivationString  = 'X10 Aktivierungs Wert';
$zmSlangX10InputAlarmString  = 'X10 Eingabe Alarm Wert';
$zmSlangX10OutputAlarmString = 'X10 Ausgabe Alarm Wert';
$zmSlangX10                  = 'X10';
$zmSlangYes                  = 'Ja';
$zmSlangYouNoPerms           = 'Keine Erlaubniss zum Zugang dieser Resource.';
$zmSlangZoneAlarmColour      = 'Alarm Farbe (RGB)';
$zmSlangZoneAlarmThreshold   = 'Alarm Schwellwert (0>=?<=255)';
$zmSlangZoneFilterHeight     = 'Filter H�he (pixels)';
$zmSlangZoneFilterWidth      = 'Filter Breite (pixels)';
$zmSlangZoneMaxAlarmedArea   = 'Maximal �berwachte Fl�che';
$zmSlangZoneMaxBlobArea      = 'Maximale Gebietsfl�che';
$zmSlangZoneMaxBlobs         = 'Maximale Gebietsanzahl';
$zmSlangZoneMaxFilteredArea  = 'Maximal gefilterte Fl�che';
$zmSlangZoneMaxX             = 'Maximum X (rechts)';
$zmSlangZoneMaxY             = 'Maximum Y (unten)';
$zmSlangZoneMinAlarmedArea   = 'Minimal �berwachte Fl�che';
$zmSlangZoneMinBlobArea      = 'Minimale Gebietsfl�che';
$zmSlangZoneMinBlobs         = 'Minimale Gebietsanzahl';
$zmSlangZoneMinFilteredArea  = 'Minimal gefilterte Fl�che';
$zmSlangZoneMinX             = 'Minimum X (links)';
$zmSlangZoneMinY             = 'Minimum Y (oben)';
$zmSlangZones                = 'Zonen';
$zmSlangZone                 = 'Zone';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = 'Momentan angemeldet ist \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s'; // For example '37 Events' (from Vlang below)
$zmClangLastEvents           = 'Letzen %1$s %2$s'; // For example 'Last 37 Events' (from Vlang below)
$zmClangMonitorCount         = '%1$s %2$s'; // For example '4 Monitors' (from Vlang below)
$zmClangMonitorFunction      = 'Monitor %1$s Function';

// Variable arrays expressing plurality
$zmVlangEvent                = array( 0=>'Ereigniss', 1=>'Ereigisse', 2=>'Ereignisse' );
$zmVlangMonitor              = array( 0=>'Monitors', 1=>'Monitor', 2=>'Monitors' );

?>
