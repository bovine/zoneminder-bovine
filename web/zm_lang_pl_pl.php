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
//require_once( 'zm_lang_en_gb.php' );

// Simple String Replacements
$zmSlang24BitColour          = 'Kolor (24 bity)';
$zmSlang8BitGrey             = 'Szary (8 bit�w)';
$zmSlangActual               = 'Aktualny';
$zmSlangAddNewMonitor        = 'Dodaj nowy monitor';
$zmSlangAddNewUser           = 'Dodaj u�ytkownika';
$zmSlangAddNewZone           = 'Dodaj now� stref�';
$zmSlangAlarm                = 'Alarm';
$zmSlangAlarmBrFrames        = 'Alarm<br/>ramek';
$zmSlangAlarmFrame           = 'Ramka alarmu';
$zmSlangAlarmLimits          = 'Ograniczenia alarmu';
$zmSlangAlarmPx              = 'Alarm Px';
$zmSlangAlert                = 'Alert';
$zmSlangAll                  = 'Wszystko';
$zmSlangApply                = 'Zastosuj';
$zmSlangApplyingStateChange  = 'Zastosuj zmien� stanu';
$zmSlangArchArchived         = 'Tylko zarchiwizowane';
$zmSlangArchive              = 'Archiwa';
$zmSlangArchUnarchived       = 'Tylko niezarchiwizowane';
$zmSlangAttrAlarmFrames      = 'Alarm Ramek';
$zmSlangAttrArchiveStatus    = 'Status archiwum';
$zmSlangAttrAvgScore         = '�red. wynik';
$zmSlangAttrDate             = 'Data';
$zmSlangAttrDateTime         = 'Data/Czas';
$zmSlangAttrDuration         = 'Czas trwania';
$zmSlangAttrFrames           = 'Ramek';
$zmSlangAttrMaxScore         = 'Maks. wynik';
$zmSlangAttrMontage          = 'Monta�';
$zmSlangAttrTime             = 'Czas';
$zmSlangAttrTotalScore       = 'Ca�kowity wynik';
$zmSlangAttrWeekday          = 'Dzie� roboczy';
$zmSlangAutoArchiveEvents    = 'Automatycznie archiwizuj wszystkie pasuj�ce zdarzenia';
$zmSlangAutoDeleteEvents     = 'Automatycznie kasuj wszystkie pasuj�ce zdarzenia';
$zmSlangAutoEmailEvents      = 'Automatycznie wysy�aj emailem szczeg�y o pasuj�cych zdarzeniach';
$zmSlangAutoMessageEvents    = 'Automatycznie wysy�aj komunikat o pasuj�cych zdarzeniach';
$zmSlangAutoUploadEvents     = 'Automatycznie upload-uj wszystkie pasuj�ce zdarzenia';
$zmSlangAvgBrScore           = '�red.<br/>wynik';
$zmSlangBandwidth            = 'przepustowo��';
$zmSlangBlobPx               = 'Blob Px';
$zmSlangBlobs                = 'Bloby';
$zmSlangBlobSizes            = 'Rozmiary Blob�w';
$zmSlangBrightness           = 'Jaskrawo��';
$zmSlangBuffers              = 'Bufory';
$zmSlangCancel               = 'Anuluj';
$zmSlangCancelForcedAlarm    = 'Anuluj&nbsp;wymuszony&nbsp;alarm';
$zmSlangCaptureHeight        = 'Wysoko�� obrazu';
$zmSlangCapturePalette       = 'Paleta kolor�w obrazu';
$zmSlangCaptureWidth         = 'Szeroko�� obrazu';
$zmSlangCheckAll             = 'Sprawd� wszystko';
$zmSlangChooseFilter         = 'Wybierz filtr';
$zmSlangClose                = 'Zamknij';
$zmSlangColour               = 'Nasycenie';
$zmSlangConfiguredFor        = 'Ustawiona';
$zmSlangConfirmPassword      = 'Potwierd� has�o';
$zmSlangConjAnd              = 'i';
$zmSlangConjOr               = 'lub';
$zmSlangConsole              = 'Konsola';
$zmSlangContactAdmin         = 'Skontaktuj si� z Twoim adminstratorem w sprawie szczeg��w.';
$zmSlangContrast             = 'Kontrast';
$zmSlangCycleWatch           = 'Cykl podgl�du';
$zmSlangDay                  = 'Dzie�';
$zmSlangDeleteAndNext        = 'Usu� &amp; nast�pny';
$zmSlangDeleteAndPrev        = 'Usu� &amp; poprzedni';
$zmSlangDelete               = 'Usu�';
$zmSlangDeleteSavedFilter    = 'Usu� zapisany filtr';
$zmSlangDescription          = 'Opis';
$zmSlangDeviceChannel        = 'Numer wej�cia';
$zmSlangDeviceFormat         = 'System TV (0=PAL,1=NTSC itd)';
$zmSlangDeviceNumber         = 'Numer urz�dzenia (/dev/video?)';
$zmSlangDimensions           = 'Rozmiary';
$zmSlangDuration             = 'Czas trwania';
$zmSlangEdit                 = 'Edycja';
$zmSlangEmail                = 'Email';
$zmSlangEnabled              = 'Zezwolono';
$zmSlangEnterNewFilterName   = 'Wpisz now� nazw� filtra';
$zmSlangErrorBrackets        = 'B��d, prosz� sprawdzi� ilo�� nawias�w otwieraj�cych i zamykaj�cych';
$zmSlangError                = 'B��d';
$zmSlangErrorValidValue      = 'B��d, prosz� sprawdzi� czy wszystkie warunki maj� poprawne warto�ci';
$zmSlangEtc                  = 'itp';
$zmSlangEvent                = 'Zdarzenie';
$zmSlangEventFilter          = 'Filtr zdarze�';
$zmSlangEvents               = 'Zdarzenia';
$zmSlangExclude              = 'Wyklucz';
$zmSlangFeed                 = 'Dostarcz';
$zmSlangFilterPx             = 'Filtr Px';
$zmSlangFirst                = 'Pierwszy';
$zmSlangForceAlarm           = 'Wymu�&nbsp;alarm';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'Interwa� raportu FPS';
$zmSlangFrame                = 'Ramka';
$zmSlangFrameId              = 'Nr ramki';
$zmSlangFrameRate            = 'Tempo ramek';
$zmSlangFrames               = 'Ramek';
$zmSlangFrameSkip            = 'Pomi� ramk�';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = 'Funkcja';
$zmSlangFunction             = 'Funkcja';
$zmSlangGenerateVideo        = 'Generowanie Video';
$zmSlangGeneratingVideo      = 'Generuj� Video';
$zmSlangGrey                 = 'Szary';
$zmSlangHighBW               = 'Wys.&nbsp;prz.';
$zmSlangHigh                 = 'wysoka';
$zmSlangHour                 = 'Godzina';
$zmSlangHue                  = 'Odcie�';
$zmSlangId                   = 'Lp';
$zmSlangIdle                 = 'Bezczynny';
$zmSlangIgnore               = 'Ignoruj';
$zmSlangImageBufferSize      = 'Rozmiar bufora obrazu (ramek)';
$zmSlangImage                = 'Obraz';
$zmSlangInclude              = 'Do��cz';
$zmSlangInverted             = 'Odwr�cony';
$zmSlangLanguage             = 'J�zyk';
$zmSlangLast                 = 'Ostatni';
$zmSlangLocal                = 'Lokalny';
$zmSlangLoggedInAs           = 'Zalogowany jako';
$zmSlangLoggingIn            = 'Logowanie';
$zmSlangLogin                = 'Login';
$zmSlangLogout               = 'Wyloguj';
$zmSlangLowBW                = 'Nis.&nbsp;prz.';
$zmSlangLow                  = 'niska';
$zmSlangMark                 = 'Zacznik';
$zmSlangMaxBrScore           = 'Maks.<br/>wynik';
$zmSlangMaximumFPS           = 'Maks. FPS';
$zmSlangMax                  = 'Maks';
$zmSlangMediumBW             = '�red.&nbsp;prz.';
$zmSlangMedium               = '�rednia';
$zmSlangMinAlarmGeMinBlob    = 'Minimalny rozmiar piksela alarmu musi by� wi�kszy lub r�wny od najmniejszego piksela bloba';
$zmSlangMinAlarmGeMinFilter  = 'Minimalny rozmiar piksela alarmu musi by� wi�kszy lub r�wny od najmniejszego piksela filtru';
$zmSlangMisc                 = 'Inne';
$zmSlangMonitorIds           = 'Numery&nbsp;monitor�w';
$zmSlangMonitor              = 'Monitor';
$zmSlangMonitors             = 'Monitory';
$zmSlangMontage              = 'Monta�';
$zmSlangMonth                = 'Miesi�c';
$zmSlangMustBeGe             = 'musi by� wi�ksze lub r�wne od';
$zmSlangMustBeLe             = 'musi by� mniejsze lub r�wne od';
$zmSlangMustConfirmPassword  = 'Musisz potwierdzi� has�o';
$zmSlangMustSupplyPassword   = 'Musisz poda� has�o';
$zmSlangMustSupplyUsername   = 'Musisz poda� nazw� u�ytkownika';
$zmSlangName                 = 'Nazwa';
$zmSlangNetwork              = 'Sie�';
$zmSlangNew                  = 'Nowy';
$zmSlangNewPassword          = 'Nowe has�o';
$zmSlangNewState             = 'Nowy stan';
$zmSlangNewUser              = 'nowy';
$zmSlangNext                 = 'Nast�pny';
$zmSlangNoFramesRecorded     = 'Brak zapisanych ramek dla tego zdarzenia';
$zmSlangNoneAvailable        = 'Niedost�pne';
$zmSlangNone                 = 'Brak';
$zmSlangNo                   = 'Nie';
$zmSlangNormal               = 'Normalny';
$zmSlangNoSavedFilters       = 'BrakZapisanychFiltr�w';
$zmSlangNoStatisticsRecorded = 'Brak zapisanych satystyk dla tego zdarzenia/ramki';
$zmSlangOpEq                 = 'r�wny';
$zmSlangOpGtEq               = 'wi�ksze lub r�wne od';
$zmSlangOpGt                 = 'wi�ksze od';
$zmSlangOpLtEq               = 'mniejsze lub r�wne od';
$zmSlangOpLt                 = 'mniejsze od';
$zmSlangOpNe                 = 'r�ne od';
$zmSlangOptionHelp           = 'OpcjePomoc';
$zmSlangOptionRestartWarning = 'Te zmiany mog� nie przynie� natychmiastowego efektu\ndop�ki system pracuje. Kiedy sko�czysz\nrobi� zmiany prosz� konicznie\nzrestartowa� ZoneMinder.';
$zmSlangOptions              = 'Opcje';
$zmSlangOrEnterNewName       = 'lub wpisz now� nazw�';
$zmSlangOrientation          = 'Orientacja';
$zmSlangOverwriteExisting    = 'Nadpisz istniej�ce';
$zmSlangPaged                = 'Stronicowane';
$zmSlangParameter            = 'Parametr';
$zmSlangPassword             = 'Has�o';
$zmSlangPasswordsDifferent   = 'Has�a: nowe i potwierdzone s� r�ne!';
$zmSlangPaths                = '�cie�ki';
$zmSlangPhoneBW              = 'Tel.&nbsp;prz.';
$zmSlangPixels               = 'pikseli';
$zmSlangPleaseWait           = 'Prosz� czeka�';
$zmSlangPostEventImageBuffer = 'Bufor obraz�w po zdarzeniu';
$zmSlangPreEventImageBuffer  = 'Bufor obraz�w przed zdarzeniem';
$zmSlangPrev                 = 'Wstecz';
$zmSlangRate                 = 'Tempo';
$zmSlangReal                 = 'Rzeczywiste';
$zmSlangRecord               = 'Zapis';
$zmSlangRefImageBlendPct     = 'Mix z obrazem odniesienia';
$zmSlangRefresh              = 'Od�wie�';
$zmSlangRemoteHostName       = 'Nazwa zdalnego hosta';
$zmSlangRemoteHostPath       = 'Scie�ka zdalnego hosta';
$zmSlangRemoteHostPort       = 'Port zdalnego hosta';
$zmSlangRemoteImageColours   = 'Kolory zdalnego obrazu';
$zmSlangRemote               = 'Zdalny';
$zmSlangRename               = 'Zmie� nazw�';
$zmSlangReplay               = 'Powt�rka';
$zmSlangResetEventCounts     = 'Kasuj licznik zdarze�';
$zmSlangRestarting           = 'Restartuj�';
$zmSlangRestart              = 'Restart';
$zmSlangRestrictedCameraIds  = 'Numery kamer';
$zmSlangRotateLeft           = 'Obr�� w lewo';
$zmSlangRotateRight          = 'Obr�� w prawo';
$zmSlangRunMode              = 'Tryb pracy';
$zmSlangRunning              = 'Pracuje';
$zmSlangRunState             = 'Stan pracy';
$zmSlangSaveAs               = 'Zapisz jako';
$zmSlangSaveFilter           = 'Zapisz filtr';
$zmSlangSave                 = 'Zapisz';
$zmSlangScale                = 'Skala';
$zmSlangScore                = 'Wynik';
$zmSlangSecs                 = 'Sekund';
$zmSlangSectionlength        = 'D�ugo�� sekcji';
$zmSlangServerLoad           = 'Obci��enie serwera';
$zmSlangSetLearnPrefs        = 'Ustaw preferencje nauki'; // This can be ignored for now
$zmSlangSetNewBandwidth      = 'Ustaw now� przepustowo��';
$zmSlangSettings             = 'Ustawienia';
$zmSlangShowFilterWindow     = 'Poka�OknoFiltru';
$zmSlangSource               = '�r�d�o';
$zmSlangSourceType           = 'Typ �r�d�a';
$zmSlangStart                = 'Start';
$zmSlangState                = 'Stan';
$zmSlangStats                = 'Statystyki';
$zmSlangStatus               = 'Status';
$zmSlangStills               = 'Nieruchome';
$zmSlangStopped              = 'Zatrzymany';
$zmSlangStop                 = 'Stop';
$zmSlangStream               = 'Ruchomy';
$zmSlangSystem               = 'System';
$zmSlangTimeDelta            = 'R�nica czasu';
$zmSlangTimestampLabelFormat = 'Format etykiety czasu';
$zmSlangTimestampLabelX      = 'Etykieta czasu X';
$zmSlangTimestampLabelY      = 'Etykieta czasu Y';
$zmSlangTimestamp            = 'Czas';
$zmSlangTimeStamp            = 'Piecz�� czasu';
$zmSlangTime                 = 'Czas';
$zmSlangTools                = 'Narz�dzia';
$zmSlangTotalBrScore         = 'Ca�kowity<br/>wynik';
$zmSlangTriggers             = 'Wyzwalacze';
$zmSlangType                 = 'Typ';
$zmSlangUnarchive            = 'Niezarchiwizowane';
$zmSlangUnits                = 'Jednostki';
$zmSlangUnknown              = 'Nieznany';
$zmSlangUseFilterExprsPost   = '&nbsp;wyra�enie&nbsp;filtru'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = 'U�yj&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = 'U�yj filtru';
$zmSlangUsername             = 'Nazwa u�ytkownika';
$zmSlangUsers                = 'U�ytkownicy';
$zmSlangUser                 = 'U�ytkownik';
$zmSlangValue                = 'Warto��';
$zmSlangVideoGenFailed       = 'Generowanie Video nie powiod�o si�!';
$zmSlangVideoGenParms        = 'Parametery generowania Video';
$zmSlangVideoSize            = 'Rozmiar Video';
$zmSlangVideo                = 'Video';
$zmSlangViewAll              = 'Zobacz wszystko';
$zmSlangViewPaged            = 'Zobacz stronami';
$zmSlangView                 = 'Podgl�d';
$zmSlangWarmupFrames         = 'Ciep�e ramki';
$zmSlangWatch                = 'podgl�d';
$zmSlangWeb                  = 'Web';
$zmSlangWeek                 = 'Tydzie�';
$zmSlangX10ActivationString  = 'X10 String aktywuj�cy';
$zmSlangX10InputAlarmString  = 'X10 String wej�cia alarmu';
$zmSlangX10OutputAlarmString = 'X10 String wyj�cia alarmu';
$zmSlangX10                  = 'X10';
$zmSlangYes                  = 'Tak';
$zmSlangYouNoPerms           = 'Nie masz uprawnie� na dost�p do tego zasobu.';
$zmSlangZoneAlarmColour      = 'Kolor alarmu (RGB)';
$zmSlangZoneAlarmThreshold   = 'Pr�g alarmu (0>=?<=255)';
$zmSlangZoneFilterHeight     = 'Wysoko�� filtru (piksele)';
$zmSlangZoneFilterWidth      = 'Szeroko�� filtru (piksele)';
$zmSlangZoneMaxAlarmedArea   = 'Maksymalny obszar alamowany';
$zmSlangZoneMaxBlobArea      = 'Maksymalny obszar Bloba';
$zmSlangZoneMaxBlobs         = 'Maksymalne Bloby';
$zmSlangZoneMaxFilteredArea  = 'Maksymalny obszar filtrowany';
$zmSlangZoneMaxX             = 'Maksimum X (prawo)';
$zmSlangZoneMaxY             = 'Maksimum Y (d�)';
$zmSlangZoneMinAlarmedArea   = 'Minimalny obszar alamowany';
$zmSlangZoneMinBlobArea      = 'Minimalny obszar Bloba';
$zmSlangZoneMinBlobs         = 'Minimalne Bloby';
$zmSlangZoneMinFilteredArea  = 'Minimalny obszar filtrowany';
$zmSlangZoneMinX             = 'Minimum X (lewo)';
$zmSlangZoneMinY             = 'Minimum Y (g�ra)';
$zmSlangZones                = 'Strefy';
$zmSlangZone                 = 'Strefa';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = 'Aktualny login \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s';
$zmClangLastEvents           = 'Ostatnie %1$s %2$s';
$zmClangMonitorCount         = '%1$s %2$s';
$zmClangMonitorFunction      = 'Monitor %1$s Funkcja';

// Variable arrays expressing plurality
$zmVlangEvent                = array( 0=>'Zdarze�', 1=>'Zdarzenie', 2=>'Zdarzenia' );
$zmVlangMonitor              = array( 0=>'Monitor�w', 1=>'Monitor', 2=>'Monitory' );

?>
