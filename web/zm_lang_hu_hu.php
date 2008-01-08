<?php
//
// ZoneMinder web HU Hungarian language file, $Date$, $Revision$
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

// ZoneMinder Hungarian Translation by szimszon at oregpreshaz dot eu, robi
// version: 0.4 - 2007.12.30. - friss�t�s 1.23.0-hoz
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

setlocale(LC_TIME, 'hu_HU');

// Simple String Replacements
$zmSlang24BitColour          = '24 bites sz�n';
$zmSlang8BitGrey             = '8 bit sz�rke�rnyalat';
$zmSlangAction               = 'M�velet';
$zmSlangActual               = 'T�nyleges';
$zmSlangAddNewControl        = '�j vez�rl�s';
$zmSlangAddNewMonitor        = '�j monitor';
$zmSlangAddNewUser           = '�j felhaszn�l�';
$zmSlangAddNewZone           = '�j z�na';
$zmSlangAlarmBrFrames        = 'Riad�<br/>k�pek';
$zmSlangAlarmFrameCount      = 'Riad� k�pek sz�ma';
$zmSlangAlarmFrame           = 'Riad� k�p';
$zmSlangAlarmLimits          = 'Riaszt�si hat�rok';
$zmSlangAlarmMaximumFPS      = 'Maxim�lis FPS riaszt�sn�l';
$zmSlangAlarmPx              = 'Riad� k�ppont';
$zmSlangAlarmRGBUnset        = 'Be kell �ll�tani egy RGB sz�nt a riaszt�shoz';
$zmSlangAlarm                = 'Riad�';
$zmSlangAlert                = 'Riaszt�s';
$zmSlangAll                  = 'Mind';
$zmSlangApply                = 'Alkalmaz';
$zmSlangApplyingStateChange  = '�llapot v�lt�s...';
$zmSlangArchArchived         = 'Csak archiv�lt';
$zmSlangArchive              = 'Arch�vum';
$zmSlangArchived             = 'Archiv�lt';
$zmSlangArchUnarchived       = 'Csak archiv�latlan';
$zmSlangArea                 = 'Ter�let';
$zmSlangAreaUnits            = 'Ter�let (px/%)';
$zmSlangAttrAlarmFrames      = 'Riad� k�pkock�k';
$zmSlangAttrArchiveStatus    = 'Archiv�lt �llapot';
$zmSlangAttrAvgScore         = '�tlagos �rt�k';
$zmSlangAttrCause            = 'Okoz�';
$zmSlangAttrDate             = 'D�tum';
$zmSlangAttrDateTime         = 'D�tum/Id�';
$zmSlangAttrDiskBlocks       = 'Lemez blokkok';
$zmSlangAttrDiskPercent      = 'Lemez sz�zal�k';
$zmSlangAttrDuration         = 'Id�tartam';
$zmSlangAttrFrames           = 'K�pkock�k';
$zmSlangAttrId               = 'Azonos�t�';
$zmSlangAttrMaxScore         = 'Max. �rt�k';
$zmSlangAttrMonitorId        = 'Monitor azon.';
$zmSlangAttrMonitorName      = 'Monitor n�v';
$zmSlangAttrName             = 'N�v';
$zmSlangAttrNotes            = 'Megjegyz�s';
$zmSlangAttrSystemLoad       = 'System Load';
$zmSlangAttrTime             = 'Id�';
$zmSlangAttrTotalScore       = '�ssz. �rt�k';
$zmSlangAttrWeekday          = 'H�tk�znap';
$zmSlangAuto                 = 'Auto';
$zmSlangAutoStopTimeout      = 'Auto meg�ll�si id� t�ll�p�s';
$zmSlangAvgBrScore           = '�tlag<br/>�rt�k';
$zmSlangBackgroundFilter     = 'Sz�r� futtat�sa a h�tt�rben';
$zmSlangBackground           = 'H�tt�r';
$zmSlangBadAlarmFrameCount   = 'Riad� k�pek sz�ma 1 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadAlarmMaxFPS       = 'A riad� maxim�lis FPS sz�ma pozit�v sz�m legyen';
$zmSlangBadChannel           = 'A csatorna sz�ma 0 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadDevice            = 'Az eszk�z �rt�k val�s legyen';
$zmSlangBadFormat            = 'A t�pus 0 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadFPSReportInterval = 'FPS inform�ci�s id�k�z puffer sz�ml�l�ja 100 vagy nagyobb eg�sz legyen';
$zmSlangBadFrameSkip         = 'K�pkocka eldob�sok sz�ma 0 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadHeight            = 'A k�pmagass�g �rv�nyes �rt�k legyen k�ppontban';
$zmSlangBadHost              = 'A hoszt val�s IP c�m vagy hosztn�v legyen, http:// n�lk�l';
$zmSlangBadImageBufferCount  = 'K�p puffer m�rete legyen 10 vagy nagyobb sz�m';
$zmSlangBadLabelX            = 'A cimke X koordin�t�ja legyen 0 vagy nagyobb eg�sz sz�m';
$zmSlangBadLabelY            = 'A cimke Y koordin�t�ja legyen 0 vagy nagyobb eg�sz sz�m';
$zmSlangBadMaxFPS            = 'A maxim�lis FPS null�n�l nagyobb sz�m legyen';
$zmSlangBadNameChars         = 'A n�v csak alfanumerikus karaktereket, plusz-, k�t�-, �s al�h�z�sjelet tartalmazhat';
$zmSlangBadPath              = 'A k�p el�r�si �tvonala val�s legyen';
$zmSlangBadPort              = 'A portsz�m val�s legyen';
$zmSlangBadPostEventCount    = 'Az esem�ny ut�ni k�pek puffere 0 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadPreEventCount     = 'Az esem�ny el�tti k�pek puffere 0 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadRefBlendPerc      = 'A referencia k�pkever�k-sz�zal�k pozit�v eg�sz sz�m legyen';
$zmSlangBadSectionLength     = 'Egy egys�g hossza 30 vagy hosszabb legyen';
$zmSlangBadSignalCheckColour = 'A jel ellen�rz�si sz�n egy �rv�nyes RGP k�d kell legyen';
$zmSlangBadStreamReplayBuffer= 'Folyam visszaj�tsz� puffer 0 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadWarmupCount       = 'Bemeleg�t� k�pek sz�ma 0 vagy nagyobb eg�sz sz�m legyen';
$zmSlangBadWebColour         = 'A web sz�n �rv�nyes web sz�n k�d legyen';
$zmSlangBadWidth             = 'A k�psz�less�g �rv�nyes �rt�k legyen k�ppontban';
$zmSlangBandwidth            = 'S�vsz�less�gre';
$zmSlangBlobPx               = 'Blob k�ppont';
$zmSlangBlobs                = 'Blob-ok';
$zmSlangBlobSizes            = 'Blob m�rete';
$zmSlangBrightness           = 'F�nyer�';
$zmSlangBuffers              = 'Pufferek';
$zmSlangCanAutoFocus         = 'Auto f�kusz van';
$zmSlangCanAutoGain          = 'Auto gain van';
$zmSlangCanAutoIris          = 'Auto �risz van';
$zmSlangCanAutoWhite         = 'Van aut�mata feh�r egyens�ly';
$zmSlangCanAutoZoom          = 'Auto zoom van';
$zmSlangCancelForcedAlarm    = 'K�zi riaszt�s le�ll�t�sa';
$zmSlangCancel               = 'M�gsem';
$zmSlangCanFocusAbs          = 'Tud abszol�t f�kuszt';
$zmSlangCanFocusCon          = 'Tud folyamatos f�kuszt';
$zmSlangCanFocusRel          = 'Tud relat�v f�kuszt';
$zmSlangCanFocus             = 'Tud f�kusz�lni';
$zmSlangCanGainAbs           = 'Tud abszol�t er�s�t�st';
$zmSlangCanGainCon           = 'Tud folyamatos er�s�t�st';
$zmSlangCanGainRel           = 'Tud relat�v er�s�t�st';
$zmSlangCanGain              = 'Tud er�s�teni';
$zmSlangCanIrisAbs           = 'Tud abszolut �riszt';
$zmSlangCanIrisCon           = 'Folyamatosan tud �riszt v�ltoztatni';
$zmSlangCanIrisRel           = 'Relat�ven tud �riszt v�ltoztatni';
$zmSlangCanIris              = 'Tud �riszt v�ltoztatni';
$zmSlangCanMoveAbs           = 'Tud abszolult mozg�st';
$zmSlangCanMoveCon           = 'Folyamatosan tud mozogni';
$zmSlangCanMoveDiag          = 'Diagon�lban tud mozogni';
$zmSlangCanMoveMap           = '�tvonalon tud mozogni';
$zmSlangCanMoveRel           = 'Relat�ven tud mozogni';
$zmSlangCanMove              = 'Tud mozogni';
$zmSlangCanPan               = 'Tud jobb-bal mozg�st' ;
$zmSlangCanReset             = 'Tud alaphelyzetbe j�nni';
$zmSlangCanSetPresets        = 'Tud menteni profilokat';
$zmSlangCanSleep             = 'Tud phihen� �zemm�dot';
$zmSlangCanTilt              = 'Tud fel-le mozg�st';
$zmSlangCanWake              = 'Tud fel�ledni';
$zmSlangCanWhiteAbs          = 'Tud abszolut feh�r egyens�lyt';
$zmSlangCanWhiteBal          = 'Tud feh�r egyens�lyt';
$zmSlangCanWhiteCon          = 'Tud folyamatos feh�r egyens�lyt';
$zmSlangCanWhiteRel          = 'Tud relat�v feh�r egyens�lyt';
$zmSlangCanWhite             = 'Tud feh�r egyens�lyt';
$zmSlangCanZoomAbs           = 'Tud abszolut zoom-ot';
$zmSlangCanZoomCon           = 'Tud folyamatos zoom-ot';
$zmSlangCanZoomRel           = 'Tud relat�v zoom-ot';
$zmSlangCanZoom              = 'Tud zoom-olni';
$zmSlangCaptureHeight        = 'K�pmagass�g';
$zmSlangCapturePalette       = 'Felv�tel sz�n-paletta';
$zmSlangCaptureWidth         = 'K�psz�less�g';
$zmSlangCause                = 'Okoz�';
$zmSlangCheckMethod          = 'A riaszt�s figyel�s�nek m�dja';
$zmSlangChooseFilter         = 'V�lassz sz�r�t';
$zmSlangChoosePreset         = 'V�lassz profilt';
$zmSlangClose                = 'Bez�r';
$zmSlangColour               = 'Sz�n';
$zmSlangCommand              = 'Parancs';
$zmSlangConfig               = 'Be�ll�t�s';
$zmSlangConfiguredFor        = 'Be�ll�tva';
$zmSlangConfirmDeleteEvents  = 'Biztos benne, hogy t�rli a kiv�lasztott esem�nyeket?';
$zmSlangConfirmPassword      = 'Jelsz� meger�s�t�s';
$zmSlangConjAnd              = '�s';
$zmSlangConjOr               = 'vagy';
$zmSlangConsole              = 'Konzol';
$zmSlangContactAdmin         = 'K�rem vegye fel a kapcsolatot a rendszergazd�val a r�szletek�rt.';
$zmSlangContinue             = 'Folytat�s';
$zmSlangContrast             = 'Kontraszt';
$zmSlangControlAddress       = 'Vez�rl�si jogok';
$zmSlangControlCaps          = 'Vez�rl�si lehet�s�gek';
$zmSlangControlCap           = 'Vez�rl�si lehet�s�g';
$zmSlangControlDevice        = 'Vez�rl� eszk�z';
$zmSlangControllable         = 'Vez�relhet�';
$zmSlangControlType          = 'Vez�rl�s t�pusa';
$zmSlangControl              = 'Vez�rl�s';
$zmSlangCycle                = 'K�rkapcsol�s';
$zmSlangCycleWatch           = 'K�rkapcsol�s';
$zmSlangDay                  = 'Napon';
$zmSlangDebug                = 'Nyomon<br>k�vet�s';
$zmSlangDefaultRate          = 'Alap�rtelmezett FPS';
$zmSlangDefaultScale         = 'Alap�rtelmezett ar�ny';
$zmSlangDefaultView          = 'Alap�rtelmezett n�zet';
$zmSlangDeleteAndNext        = 'T�r�l &amp;<br>k�vetkez�';
$zmSlangDeleteAndPrev        = 'T�r�l &amp;<br>el�z�';
$zmSlangDeleteSavedFilter    = 'Mentett sz�r� t�rl�se';
$zmSlangDelete               = 'T�r�l';
$zmSlangDescription          = 'Le�r�s';
$zmSlangDeviceChannel        = 'Eszk�z csatorn�ja';
$zmSlangDeviceFormat         = 'Eszk�z form�tuma';
$zmSlangDeviceNumber         = 'Eszk�z sz�m';
$zmSlangDevicePath           = 'Eszk�z el�r�si �tvonala';
$zmSlangDevices              = 'Eszk�z�k';
$zmSlangDimensions           = 'Dimenzi�k';
$zmSlangDisableAlarms        = 'Riaszt�s tilt�sa';
$zmSlangDisk                 = 'T�rhely';
$zmSlangDonateAlready        = 'Nem, �n m�r t�mogattam';
$zmSlangDonateEnticement     = '�n m�r j� ideje haszn�lja a ZoneMindert rem�lhet�leg hasznos kieg�sz�t�snek tartja h�za vagy munkahelye biztos�t�s�ban. B�r ZoneMinder szabad, ny�lt forr�sk�d�, �s az is marad; a fejleszt�se p�nzbe ker�l. Ha t�mogatni szeretn� a j�v�beni fejleszt�seket �s az �j funkci�kat k�rem t�mogasson. A t�mogat�s teljesen �nk�ntes, de nagyon megbecs�lt �s annyival tud t�mogatni amennyivel k�v�n.<br><br>Ha t�mogatni szertne k�rem v�lasszon az al�bbi lehet�s�gekb�l vagy l�togassa meg a http://www.zoneminder.com/donate.html oldalt.<br><br>K�sz�n�m, hogy haszn�lja a ZoneMinder-t �s ne felejtse el megl�togatni a f�rumokat a ZoneMinder.com oldalon t�mogat�s�rt �s �tletek�rt, hogy tudja m�g jobban haszn�lni a ZoneMinder-t.';
$zmSlangDonate               = 'K�rem t�mogasson';
$zmSlangDonateRemindDay      = 'Nem most, figyelmeztess 1 nap m�lva';
$zmSlangDonateRemindHour     = 'Nem most, figyelmeztess 1 �ra m�lva';
$zmSlangDonateRemindMonth    = 'Nem most, figyelmeztess 1 h�nap m�lva';
$zmSlangDonateRemindNever    = 'Nem akarom t�mogatni, ne is eml�keztess';
$zmSlangDonateRemindWeek     = 'Nem most, figyelmeztess 1 h�t m�lva';
$zmSlangDonateYes            = 'Igen, most szeretn�m t�mogatni';
$zmSlangDownload             = 'Let�lt';
$zmSlangDuration             = 'Id�tartam';
$zmSlangEdit                 = 'Szerkeszt';
$zmSlangEmail                = 'Email';
$zmSlangEnableAlarms         = 'Riaszt�s felold�sa';
$zmSlangEnabled              = 'Enged�lyezve';
$zmSlangEnterNewFilterName   = '�rd be az �j sz�r� nev�t';
$zmSlangErrorBrackets        = 'Hiba, ellen�rizd, hogy ugyanannyi nyit� �s z�r� z�r�jel van';
$zmSlangError                = 'Hiba';
$zmSlangErrorValidValue      = 'Hiba, ellen�rizd, hogy minden be�ll�t�snak �rv�nyes �rt�ke van';
$zmSlangEtc                  = 'stb';
$zmSlangEvent                = 'Esem�ny';
$zmSlangEventFilter          = 'Esem�ny sz�r�';
$zmSlangEventId              = 'Esem�ny azonos�t�';
$zmSlangEventName            = 'Esem�ny n�v';
$zmSlangEventPrefix          = 'Esem�ny el�tag';
$zmSlangEvents               = 'Esem�nyek';
$zmSlangExclude              = 'Kiz�r';
$zmSlangExecute              = 'Futtat';
$zmSlangExportDetails        = 'Esem�ny adatainak export�l�sa';
$zmSlangExport               = 'Export�l';
$zmSlangExportFailed         = 'Hib�s export�l�s';
$zmSlangExportFormat         = 'Export�lt f�jl form�tuma';
$zmSlangExportFormatTar      = 'TAR';
$zmSlangExportFormatZip      = 'ZIP';
$zmSlangExportFrames         = 'K�pek adatainak export�l�sa';
$zmSlangExportImageFiles     = 'K�pek export�l�sa';
$zmSlangExporting            = 'Export�l�s...';
$zmSlangExportMiscFiles      = 'Egy�b f�jlok export�l�sa (ha vannak)';
$zmSlangExportOptions        = 'Export�l�s be�ll�t�sai';
$zmSlangExportVideoFiles     = 'Vide� f�jlok export�l�sa (ha vannak)';
$zmSlangFar                  = 'T�vol';
$zmSlangFastForward          = 'El�re teker�s';
$zmSlangFeed                 = 'Folyam';
$zmSlangFileColours          = 'F�jl sz�nei';
$zmSlangFile                 = 'F�jl';
$zmSlangFilePath             = 'F�jl el�r�si �tvonala';
$zmSlangFilterArchiveEvents  = 'Minden tal�lat archiv�l�sa';
$zmSlangFilterDeleteEvents   = 'Minden tal�lat t�rl�se';
$zmSlangFilterEmailEvents    = 'Minden tal�lat adatainak elk�ld�se E-mailben';
$zmSlangFilterExecuteEvents  = 'Parancs futtat�sa minden tal�laton';
$zmSlangFilterMessageEvents  = 'Minden tal�lat adatainak �zen�se';
$zmSlangFilterPx             = 'Sz�rt k�pkock�k';
$zmSlangFilters              = 'Sz�r�k';
$zmSlangFilterUnset          = 'Meg kell adnod a sz�r� sz�less�g�t �s magass�g�t';
$zmSlangFilterUploadEvents   = 'Minden tal�lat felt�lt�se';
$zmSlangFilterVideoEvents    = 'Vide� k�sz�t�se minden tal�latr�l';
$zmSlangFirst                = 'Els�';
$zmSlangFlippedHori          = 'V�zszintes t�kr�z�s';
$zmSlangFlippedVert          = 'F�gg�leges t�kr�z�s';
$zmSlangFocus                = 'F�kusz';
$zmSlangForceAlarm           = 'K�zi riaszt�s';
$zmSlangFormat               = 'Form�tum';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'FPS jelent�s id�k�ze';
$zmSlangFrameId              = 'K�pkocka azonos�t�';
$zmSlangFrame                = 'K�pkocka';
$zmSlangFrameRate            = 'FPS';
$zmSlangFrameSkip            = 'K�pk. kihagy�s';
$zmSlangFrames               = 'K�pkocka';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = 'Funk.';
$zmSlangFunction             = 'Funkci�';
$zmSlangGain                 = 'Er�s�t�s';
$zmSlangGeneral              = '�ltal�nos';
$zmSlangGenerateVideo        = 'Vide� k�sz�t�s';
$zmSlangGeneratingVideo      = 'Vide� k�sz�t�se...';
$zmSlangGoToZoneMinder       = 'L�togat�s a ZoneMinder.com-ra';
$zmSlangGrey                 = 'Sz�rke';
$zmSlangGroup                = 'Csoport';
$zmSlangGroups               = 'Csoportok';
$zmSlangHasFocusSpeed        = 'Van f�kusz sebess�g';
$zmSlangHasGainSpeed         = 'Van er�s�t�s sebess�g';
$zmSlangHasHomePreset        = 'Van kedvenc profilja';
$zmSlangHasIrisSpeed         = 'Van �risz sebess�g';
$zmSlangHasPanSpeed          = 'Van jobb-bal sebess�g';
$zmSlangHasPresets           = 'Vannak profiljai';
$zmSlangHasTiltSpeed         = 'Van le-fel sebess�g';
$zmSlangHasTurboPan          = 'Van turb� jobb-bal';
$zmSlangHasTurboTilt         = 'Van turb� le-fel';
$zmSlangHasWhiteSpeed        = 'Van feh�r egyens�ly sebess�g';
$zmSlangHasZoomSpeed         = 'Van zoom sebess�g';
$zmSlangHighBW               = 'Magas<br>s�vsz.';
$zmSlangHigh                 = 'Magas';
$zmSlangHome                 = 'Home';
$zmSlangHour                 = '�r�ban';
$zmSlangHue                  = 'Sz�n�rnyalat';
$zmSlangId                   = 'Az.';
$zmSlangIdle                 = 'Nyugalom';
$zmSlangIgnore               = 'Figyelmen k�v�l hagy';
$zmSlangImageBufferSize      = 'K�ppuffer m�rete (k�pkock�k)';
$zmSlangImage                = 'K�p';
$zmSlangImages               = 'K�p';
$zmSlangInclude              = 'Be�gyaz';
$zmSlangIn                   = 'In';
$zmSlangInverted             = 'Invert�lva';
$zmSlangIris                 = '�risz';
$zmSlangKeyString            = 'Kulcs karaktersor';
$zmSlangLabel                = 'Cimke';
$zmSlangLanguage             = 'Nyelv';
$zmSlangLast                 = 'Utols�';
$zmSlangLimitResultsPost     = 'tal�latig korl�toz'; // This is used at the end of the phrase 'Limit to first N results only'
$zmSlangLimitResultsPre      = 'Az els�'; // This is used at the beginning of the phrase 'Limit to first N results only'
$zmSlangLinkedMonitors       = '�sszef�gg� monitorok';
$zmSlangList                 = 'Lista';
$zmSlangLoad                 = 'Terhel�s';
$zmSlangLocal                = 'Helyi';
$zmSlangLoggedInAs           = 'Bejelentkezve mint';
$zmSlangLoggingIn            = 'Bejelentkez�s folyamatban';
$zmSlangLogin                = 'Bejelentkez�s';
$zmSlangLogout               = 'Kil�p�s';
$zmSlangLow                  = 'Alacsony';
$zmSlangLowBW                = 'Alacsony<br>s�vsz.';
$zmSlangMain                 = 'F�';
$zmSlangMan                  = 'Man';
$zmSlangManual               = 'K�zik�nyv';
$zmSlangMark                 = 'Jel�l�s';
$zmSlangMaxBandwidth         = 'Max. s�vsz�less�g';
$zmSlangMaxBrScore           = 'Max.<br/>�rt�k';
$zmSlangMaxFocusRange        = 'Max. f�kusz tartom�ny';
$zmSlangMaxFocusSpeed        = 'Max. f�kusz sebess�g';
$zmSlangMaxFocusStep         = 'Max. f�kusz l�p�s';
$zmSlangMaxGainRange         = 'Max Gain Range';
$zmSlangMaxGainSpeed         = 'Max Gain Speed';
$zmSlangMaxGainStep          = 'Max Gain Step';
$zmSlangMaximumFPS           = 'Maximum FPS';
$zmSlangMaxIrisRange         = 'Max. �risz tartom�ny';
$zmSlangMaxIrisSpeed         = 'Max. �risz sebess�g';
$zmSlangMaxIrisStep          = 'Max. �risz l�p�s';
$zmSlangMax                  = 'Max.';
$zmSlangMaxPanRange          = 'Max. jobb-bal tartom�ny';
$zmSlangMaxPanSpeed          = 'Max. jobb-bal sebess�g';
$zmSlangMaxPanStep           = 'Max. jobb-bal l�p�s';
$zmSlangMaxTiltRange         = 'Max. fel-le tartom�ny';
$zmSlangMaxTiltSpeed         = 'Max. fel-le sebess�g';
$zmSlangMaxTiltStep          = 'Max. fel-le l�p�s';
$zmSlangMaxWhiteRange        = 'Max. feh�r egyens�ly tartom�ny';
$zmSlangMaxWhiteSpeed        = 'Max. feh�r egyens�ly sebess�g';
$zmSlangMaxWhiteStep         = 'Max. feh�r egyens�ly l�p�s';
$zmSlangMaxZoomRange         = 'Max. zoom tartom�ny';
$zmSlangMaxZoomSpeed         = 'Max. zoom sebess�g';
$zmSlangMaxZoomStep          = 'Max. zoom l�p�s';
$zmSlangMediumBW             = 'K�zepes<br>s�vsz.';
$zmSlangMedium               = 'K�zepes';
$zmSlangMinAlarmAreaLtMax    = 'A minimum riasztott ter�letnek kisebbnek kell lennie mint a maximumnak';
$zmSlangMinAlarmAreaUnset    = 'Meg kell adnod a minimum riasztott k�ppontok sz�m�t';
$zmSlangMinBlobAreaLtMax     = 'A minimum blob ter�letnek kisebbnek kell lennie mint a maximumnak';
$zmSlangMinBlobAreaUnset     = 'Meg kell adnod a minimum blob k�ppontok sz�m�t';
$zmSlangMinBlobLtMinFilter   = 'A minimum blob ter�letnek kisebbnek vagy egyenl�nek kell lennie a megsz�rt ter�lettel';
$zmSlangMinBlobsLtMax        = 'A minimum bloboknak kisebbeknek kell lenni�k, mint a maximum';
$zmSlangMinBlobsUnset        = 'Meg kell adnod a blobok sz�m�t';
$zmSlangMinFilterAreaLtMax   = 'A minimum megsz�rt ter�letnek kisebbnek kell lennie mint a maximum';
$zmSlangMinFilterAreaUnset   = 'Meg kell adnod a megsz�rt ter�let k�ppontjainak sz�m�t';
$zmSlangMinFilterLtMinAlarm  = 'A megsz�rt ter�letnek kisebbnek vagy ugyanakkor�nak kell lennie mint a riasztott ter�let';
$zmSlangMinFocusRange        = 'Min. f�kusz ter�let';
$zmSlangMinFocusSpeed        = 'Min. f�kusz sebess�g';
$zmSlangMinFocusStep         = 'Min. f�kusz l�p�s';
$zmSlangMinGainRange         = 'Min Gain Range';
$zmSlangMinGainSpeed         = 'Min Gain Speed';
$zmSlangMinGainStep          = 'Min Gain Step';
$zmSlangMinIrisRange         = 'Min. �risz ter�let';
$zmSlangMinIrisSpeed         = 'Min. �risz sebess�g';
$zmSlangMinIrisStep          = 'Min. �risz l�p�s';
$zmSlangMinPanRange          = 'Min. jobb-bal tartom�ny';
$zmSlangMinPanSpeed          = 'Min. jobb-bal sebess�g';
$zmSlangMinPanStep           = 'Min. jobb-bal l�p�s';
$zmSlangMinPixelThresLtMax   = 'A minimum k�sz�b k�ppontnak kisebbnek kell lennie, mint a maximum';
$zmSlangMinPixelThresUnset   = 'Meg kell adnod a minimum k�ppont k�sz�b�t';
$zmSlangMinTiltRange         = 'Min. fel-le tartom�ny';
$zmSlangMinTiltSpeed         = 'Min. fel-le sebess�g';
$zmSlangMinTiltStep          = 'Min. fel-le l�p�s';
$zmSlangMinWhiteRange        = 'Min. feh�r egyens�ly ter�let';
$zmSlangMinWhiteSpeed        = 'Min. feh�r egyens�ly sebess�g';
$zmSlangMinWhiteStep         = 'Min. feh�r egyens�ly l�p�s';
$zmSlangMinZoomRange         = 'Min. zoom ter�let';
$zmSlangMinZoomSpeed         = 'Min. zoom sebess�g';
$zmSlangMinZoomStep          = 'Min. zoom l�p�s';
$zmSlangMisc                 = 'Egy�b';
$zmSlangMonitorIds           = 'Monitor&nbsp;Azonos�t�k';
$zmSlangMonitor              = 'Monitor';
$zmSlangMonitorPreset        = 'El�re be�ll�tott �rt�kprofilok megfigyel�shez';
$zmSlangMonitorPresetIntro   = 'V�lassz egy, az el�re meghat�rozott<br> �rt�kprofilt az al�bbiak k�z�l.<br><br>Vedd figyelembe, hogy ez fel�l�rhatja <br>az �ltalad m�r be�ll�tott �rt�keket.<br><br>';
$zmSlangMonitors             = 'Megfigyel�sek';
$zmSlangMontage              = 'T�bbkamer�s n�zet';
$zmSlangMonth                = 'H�napban';
$zmSlangMove                 = 'Mozg�s';
$zmSlangMustBeGe             = 'nagyobbnak vagy egyenl�nek kell lennie';
$zmSlangMustBeLe             = 'kisebbnek vagy egyenl�nek kell lennie';
$zmSlangMustConfirmPassword  = 'Meg kell er�s�tened a jelsz�t';
$zmSlangMustSupplyPassword   = 'Meg kell adnod a jelsz�t';
$zmSlangMustSupplyUsername   = 'Meg kell adnod felhaszn�l�i nevet';
$zmSlangName                 = 'N�v';
$zmSlangNear                 = 'K�zel';
$zmSlangNetwork              = 'H�l�zat';
$zmSlangNewGroup             = '�j csoport';
$zmSlangNewLabel             = '�j cimke';
$zmSlangNewPassword          = '�j jelsz�';
$zmSlangNewState             = '�j �llapot';
$zmSlangNew                  = 'Uj';
$zmSlangNewUser              = '�j felhaszn�l�';
$zmSlangNext                 = 'K�vetkez�';
$zmSlangNoFramesRecorded     = 'Nincs felvett k�pkocka ehhez az esem�nyhez';
$zmSlangNoGroup              = 'Nincs csoport';
$zmSlangNoneAvailable        = 'Nincs el�rhet�';
$zmSlangNo                   = 'Nem';
$zmSlangNone                 = 'Nincs kiv�lasztva';
$zmSlangNormal               = 'Norm�lis';
$zmSlangNoSavedFilters       = 'Nincs mentett sz�r�';
$zmSlangNoStatisticsRecorded = 'Nincs mentett statisztika ehhez az esem�nyhez/k�pkock�hoz';
$zmSlangNotes                = 'Megjegyz�sek';
$zmSlangNumPresets           = 'Profilok sz�ma';
$zmSlangOff                  = 'Ki';
$zmSlangOn                   = 'Be';
$zmSlangOpen                 = 'Megnyit�s';
$zmSlangOpEq                 = 'egyenl�';
$zmSlangOpGtEq               = 'nagyobb van egyenl�';
$zmSlangOpGt                 = 'nagyobb mint';
$zmSlangOpIn                 = 'be�ll�tva';
$zmSlangOpLtEq               = 'kisebb vagy egyenl�';
$zmSlangOpLt                 = 'kisebb mint';
$zmSlangOpMatches            = 'tal�latok';
$zmSlangOpNe                 = 'nem egyenl�';
$zmSlangOpNotIn              = 'nincs be�ll�tva';
$zmSlangOpNotMatches         = 'nincs tal�lat';
$zmSlangOptionHelp           = 'Be�ll�t�si seg�ts�g';
$zmSlangOptionRestartWarning = 'Ez a be�ll�t�s nem jut teljesen �rv�nyre\nam�g a rendszer fut. Ha megtett�l minden\nbe�ll�t�st, ind�tsd �jra a ZoneMinder szolg�ltat�st.';
$zmSlangOptions              = 'Be�ll�t�sok';
$zmSlangOrder                = 'Sorrend';
$zmSlangOrEnterNewName       = 'vagy adj meg �j nevet';
$zmSlangOrientation          = 'Orient�ci�';
$zmSlangOut                  = 'Kifel�';
$zmSlangOverwriteExisting    = 'Megl�v� fel�l�r�sa';
$zmSlangPaged                = 'Lapozva';
$zmSlangPan                  = 'Jobb-bal mozg�s';
$zmSlangPanLeft              = 'Mozg�s balra';
$zmSlangPanRight             = 'Mozg�s jobbra';
$zmSlangPanTilt              = 'Mozgat';
$zmSlangParameter            = 'Param�ter';
$zmSlangPassword             = 'Jelsz�';
$zmSlangPasswordsDifferent   = 'Az �j �s a meger�s�tett jelsz� k�l�nb�zik!';
$zmSlangPaths                = '�tvonalak';
$zmSlangPause                = 'Sz�net';
$zmSlangPhoneBW              = 'Bet�rcs�z�<br>s�vsz.';
$zmSlangPhone                = 'Telefonon bet�rcs�zva';
$zmSlangPixelDiff            = 'K�ppont elt�r�s';
$zmSlangPixels               = 'k�ppont';
$zmSlangPlayAll              = 'Mind lej�tsz�sa';
$zmSlangPlay                 = 'Lej�tsz�s';
$zmSlangPleaseWait           = 'K�rlek v�rj...';
$zmSlangPoint                = 'Pont';
$zmSlangPostEventImageBuffer = 'Esem�ny ut�ni k�ppuffer';
$zmSlangPreEventImageBuffer  = 'Esem�ny el�tti k�ppuffer';
$zmSlangPreserveAspect	     = 'K�par�ny megtart�sa';
$zmSlangPreset               = 'El�re be�ll�tott profil';
$zmSlangPresets              = 'El�re be�ll�tott profilok';
$zmSlangPrev                 = 'El�z�';
$zmSlangProtocol             = 'Protocol';
$zmSlangRate                 = 'FPS';
$zmSlangReal                 = 'Val�s';
$zmSlangRecord               = 'Felv�tel';
$zmSlangRefImageBlendPct     = 'V�ltoz�s a referenciak�pt�l %-ban';
$zmSlangRefresh              = 'Friss�t';
$zmSlangRemote               = 'H�l�zati';
$zmSlangRemoteHostName       = 'H�l�zati IP c�m/hosztn�v';
$zmSlangRemoteHostPath       = 'A k�p el�r�si �tja';
$zmSlangRemoteHostPort       = 'H�l�zati g�p portsz�ma';
$zmSlangRemoteImageColours   = 'A k�p sz�ne';
$zmSlangRename               = '�tnevez';
$zmSlangReplayAll            = 'Minden esem�nyt';
$zmSlangReplay               = 'Az elej�t�l';
$zmSlangReplayGapless        = 'Folyamatos esem�nyeket';
$zmSlangReplaySingle         = 'Egy�ni esem�ny';
$zmSlangReplay               = 'Visszaj�tsz�s';
$zmSlangReset                = 'Alap�rt�kre �ll�t';
$zmSlangResetEventCounts     = 'Esem�ny sz�ml�l� null�z�sa';
$zmSlangRestarting           = '�jraind�t�s';
$zmSlangRestart              = '�jraind�t';
$zmSlangRestrictedCameraIds  = 'Korl�tozott kamer�k azonos�t�i';
$zmSlangRestrictedMonitors   = 'Korl�tozott kamer�k';
$zmSlangReturnDelay          = 'Vissza�rkez�s k�sleltet�se';
$zmSlangReturnLocation       = 'Vissza�rkez�s helye';
$zmSlangRewind               = 'Visszateker�s';
$zmSlangRotateLeft           = 'Balra forgat�s';
$zmSlangRotateRight          = 'Jobbra forgat�s';
$zmSlangRunMode              = 'Fut�si m�d';
$zmSlangRunning              = '�les';
$zmSlangRunState             = 'Fut�si �llapot';
$zmSlangSaveAs               = 'Ment�s mint';
$zmSlangSaveFilter           = 'Sz�r� ment�se';
$zmSlangSave                 = 'Ment�s';
$zmSlangScale                = 'M�ret';
$zmSlangScore                = 'Pontsz�m';
$zmSlangSecs                 = 'mp.';
$zmSlangSectionlength        = 'R�sz hossz';
$zmSlangSelect               = 'Kiv�laszt�s';
$zmSlangSelectMonitors       = 'Monitorok kiv�laszt�sa';
$zmSlangSelfIntersecting     = 'A soksz�g sz�lei nem keresztez�dhetnek';
$zmSlangSet                  = 'Be�ll�t';
$zmSlangSetLearnPrefs        = 'Set Learn Prefs'; // This can be ignored for now
$zmSlangSetNewBandwidth      = '�j s�vsz�less�g be�ll�t�s';
$zmSlangSetPreset            = 'Alap�rtelmezett be�ll�t�sa';
$zmSlangSettings             = 'Be�ll�t�sok';
$zmSlangShowFilterWindow     = 'Sz�r�ablak megjelen�t�s';
$zmSlangShowTimeline         = 'Id�vonal megjelen�t�s';
$zmSlangSignalCheckColour    = 'Sz�n a jel kimarad�sakor';
$zmSlangSize                 = 'F�jlm�ret';
$zmSlangSleep                = 'Alv�s';
$zmSlangSortAsc              = 'N�vekv�';
$zmSlangSortBy               = 'Sorbarendez�s:';
$zmSlangSortDesc             = 'Cs�kken�';
$zmSlangSource               = 'Forr�s';
$zmSlangSourceType           = 'Forr�s t�pusa';
$zmSlangSpeedHigh            = 'Nagy sebss�g';
$zmSlangSpeedLow             = 'Alacsony sebess�g';
$zmSlangSpeedMedium          = 'K�zepes sebess�g';
$zmSlangSpeed                = 'Sebess�g';
$zmSlangSpeedTurbo           = 'Turb� sebess�g';
$zmSlangStart                = 'Ind�t';
$zmSlangState                = '�llapot';
$zmSlangStats                = 'Statisztik�k';
$zmSlangStatus               = 'St�tusz';
$zmSlangStepBack             = 'Visszal�p�s';
$zmSlangStepForward          = 'El�rel�p�s';
$zmSlangStepLarge            = 'Nagy ugr�s';
$zmSlangStepMedium           = 'K�zepes ugr�s';
$zmSlangStepNone             = 'Nincs ugr�s';
$zmSlangStepSmall            = 'Kis ugr�s';
$zmSlangStep                 = 'Ugr�s';
$zmSlangStills               = '�ll�k�pek';
$zmSlangStop                 = 'Meg�ll�t�s';
$zmSlangStopped              = 'Meg�ll�tva';
$zmSlangStream               = '�l� folyam';
$zmSlangStreamReplayBuffer   = 'Folyam visszaj�tsz� k�ppuffer';
$zmSlangSubmit               = 'Elk�ld';
$zmSlangSystem               = 'Rendszer';
$zmSlangTele                 = 'T�v';
$zmSlangThumbnail            = 'El�n�zet';
$zmSlangTilt                 = 'Fel-le mozg�s';
$zmSlangTimeDelta            = 'Id� v�ltoz�s';
$zmSlangTime                 = 'Id�pont';
$zmSlangTimeline             = 'Id�vonal';
$zmSlangTimestamp            = 'Id�b�lyeg';
$zmSlangTimeStamp            = 'Id�b�lyeg';
$zmSlangTimestampLabelFormat = 'Id�b�lyeg form�tum';
$zmSlangTimestampLabelX      = 'Elhelyez�s X pozici�';
$zmSlangTimestampLabelY      = 'Elhelyez�s Y pozici�';
$zmSlangToday                = 'Ma';
$zmSlangTools                = 'Eszk�z�k';
$zmSlangTotalBrScore         = '�ssz.<br/>pontsz�m';
$zmSlangTrackDelay           = 'K�sleltet�s k�vet�se';
$zmSlangTrackMotion          = 'Mozg�s k�vet�se';
$zmSlangTriggers             = 'El�id�z�k';
$zmSlangTurboPanSpeed        = 'Turb� jobb-bal sebess�g';
$zmSlangTurboTiltSpeed       = 'Turbo fel-le sebess�g';
$zmSlangType                 = 'T�pus';
$zmSlangUnarchive            = 'Arch�vumb�l ki';
$zmSlangUnits                = 'Egys�gek';
$zmSlangUnknown              = 'Ismeretlen';
$zmSlangUpdateAvailable      = 'El�rhet� ZoneMinder friss�t�s.';
$zmSlangUpdate               = 'Friss�t�s';
$zmSlangUpdateNotNecessary   = 'Nem sz�ks�ges a friss�t�s.';
$zmSlangUseFilterExprsPost   = '&nbsp;sz�r�&nbsp;kifejez�s haszn�lata'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = '&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = 'Sz�r�t haszn�l';
$zmSlangUser                 = 'Felhaszn�l�';
$zmSlangUsername             = 'Felhaszn�l�n�v';
$zmSlangUsers                = 'Felhaszn�l�k';
$zmSlangValue                = '�rt�k';
$zmSlangVersionIgnore        = 'Ennek a verzi�nak a figyelmen k�v�l hagy�sa';
$zmSlangVersionRemindDay     = '1 nap m�lva eml�keztess';
$zmSlangVersionRemindHour    = '1 �ra m�lva eml�keztess';
$zmSlangVersionRemindNever   = 'Ne eml�keztess az �j verzi�r�l';
$zmSlangVersionRemindWeek    = '1 h�t m�lva eml�keztess';
$zmSlangVersion              = 'Verzi�';
$zmSlangVideoFormat          = 'Vide� form�tum';
$zmSlangVideoGenFailed       = 'Hiba a vide� k�sz�t�sekor!';
$zmSlangVideoGenFiles        = 'L�tez� vide�k';
$zmSlangVideoGenNoFiles      = 'Nem tal�lhat�k vide�k';
$zmSlangVideoGenParms        = 'Vide� k�sz�t�si param�terek';
$zmSlangVideoGenSucceeded    = 'A vide� elk�sz�lt!';
$zmSlangVideoSize            = 'K�p m�rete';
$zmSlangVideo                = 'Vide�';
$zmSlangViewAll              = 'Az �sszes list�z�sa';
$zmSlangViewEvent            = 'Esem�nyek n�zet';
$zmSlangView                 = 'Megtekint';
$zmSlangViewPaged            = 'Oldal n�zet';
$zmSlangWake                 = '�breszt';
$zmSlangWarmupFrames         = 'Bemeleg�t� k�pkock�k';
$zmSlangWatch                = 'Figyel';
$zmSlangWebColour            = 'Sz�n az id�vonal ablakban';
$zmSlangWeb                  = 'Web';
$zmSlangWeek                 = 'H�ten';
$zmSlangWhiteBalance         = 'Feh�r egyens�ly';
$zmSlangWhite                = 'Feh�r';
$zmSlangWide                 = 'Sz�les';
$zmSlangX10ActivationString  = 'X10 �les�t� karaktersor';
$zmSlangX10InputAlarmString  = 'X10 bemeneti riad� karaktersor';
$zmSlangX10OutputAlarmString = 'X10 kimeneti riad� karaktersor';
$zmSlangX10                  = 'X10';
$zmSlangX                    = 'X';
$zmSlangYes                  = 'Igen';
$zmSlangYouNoPerms           = 'Nincs jogod az er�forr�s el�r�s�hez.';
$zmSlangY                    = 'Y';
$zmSlangZoneAlarmColour      = 'Riad� sz�n (R/G/B)';
$zmSlangZoneArea             = 'Z�na ter�let';
$zmSlangZoneFilterSize       = 'Sz�rt sz�less�g/magass�g (k�ppontok)';
$zmSlangZoneMinMaxAlarmArea  = 'Min/Max riad� ter�let';
$zmSlangZoneMinMaxBlobArea   = 'Min/Max Blob ter�let';
$zmSlangZoneMinMaxBlobs      = 'Min/Max Blobok';
$zmSlangZoneMinMaxFiltArea   = 'Min/Max sz�rt ter�let';
$zmSlangZoneMinMaxPixelThres = 'Min/Max k�ppont k�sz�b (0-255)';
$zmSlangZoneOverloadFrames   = 'Overload Frame Ignore Count';
$zmSlangZones                = 'Z�n�k';
$zmSlangZone                 = 'Z�na:';
$zmSlangZoomIn               = 'Zoom be';
$zmSlangZoomOut              = 'Zoom ki';
$zmSlangZoom                 = 'Zoom';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = 'Jelenleg bel�pve mint \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s'; // For example '37 Events' (from Vlang below)
$zmClangLastEvents           = 'Utols� %1$s %2$s'; // For example 'Last 37 Events' (from Vlang below)
$zmClangLatestRelease        = 'Az utols� kiad�s v%1$s, ami neked van v%2$s.';
$zmClangMonitorCount         = '%1$s %2$s'; // For example '4 Monitors' (from Vlang below)
$zmClangMonitorFunction      = 'Megfigyel�s funkci�: %1$s';
$zmClangRunningRecentVer     = 'A legfrissebb ZoneMinder verzi�t haszn�lod, v%s.';

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
$zmVlangEvent                = array( 0=>'Esem�nyek', 1=>'Esem�ny', 2=>'Esem�ny' );
$zmVlangMonitor              = array( 0=>'Monitorok', 1=>'Monitor', 2=>'Monitor' );

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

