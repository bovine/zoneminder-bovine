<?php
//
// ZoneMinder web Polish language file, $Date$, $Revision$
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

// ZoneMinder Polish Translation by Robert Krysztof

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
header( "Content-Type: text/html; charset=iso-8859-2" );

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
setlocale( 'LC_ALL', 'pl_PL' ); // All locale settings pre-4.3.0
//setlocale( LC_ALL, 'pl_PL' );   // All locale settings 4.3.0 and after
// setlocale( LC_CTYPE, 'pl_PL' ); // Character class settings 4.3.0 and after
// setlocale( LC_TIME, 'pl_PL' );  // Date and time formatting 4.3.0 and after

// Simple String Replacements
$zmSlang24BitColour          = 'Kolor (24 bity)';
$zmSlang8BitGrey             = 'Cz/b (8 bit�w)';
$zmSlangActual               = 'Aktualny';
$zmSlangAddNewMonitor        = 'Dodaj nowy monitor';
$zmSlangAddNewUser           = 'Dodaj u�ytkownika';
$zmSlangAddNewZone           = 'Dodaj now� stref�';
$zmSlangAlarm                = 'Alarm';
$zmSlangAlarmBrFrames        = 'Ramki<br/>alarmowe';
$zmSlangAlarmFrame           = 'Ramka alarmowa';
$zmSlangAlarmLimits          = 'Ograniczenia alarmu';
$zmSlangAlarmPx              = 'Alarm Px';
$zmSlangAlert                = 'Gotowosc';
$zmSlangAll                  = 'Wszystko';
$zmSlangApplyingStateChange  = 'Zmieniam stan pracy';
$zmSlangApply                = 'Zastosuj';
$zmSlangArchArchived         = 'Tylko zarchiwizowane';
$zmSlangArchive              = 'Archiwum';
$zmSlangArchUnarchived       = 'Tylko niezarchiwizowane';
$zmSlangAttrAlarmFrames      = 'Ramki alarmowe';
$zmSlangAttrArchiveStatus    = 'Status archiwum';
$zmSlangAttrAvgScore         = '�red. wynik';
$zmSlangAttrDate             = 'Data';
$zmSlangAttrDateTime         = 'Data/Czas';
$zmSlangAttrDuration         = 'Czas trwania';
$zmSlangAttrFrames           = 'Ramek';
$zmSlangAttrMaxScore         = 'Maks. wynik';
$zmSlangAttrMonitorId        = 'Nr monitora';
$zmSlangAttrMonitorName      = 'Nazwa monitora';
$zmSlangAttrMontage          = 'Monta�';
$zmSlangAttrTime             = 'Czas';
$zmSlangAttrTotalScore       = 'Ca�kowity wynik';
$zmSlangAttrWeekday          = 'Dzie� roboczy';
$zmSlangAutoArchiveEvents    = 'Automatycznie archiwizuj wszystkie pasuj�ce zdarzenia';
$zmSlangAutoDeleteEvents     = 'Automatycznie kasuj wszystkie pasuj�ce zdarzenia';
$zmSlangAutoEmailEvents      = 'Automatycznie wysy�aj emailem szczeg�y o pasuj�cych zdarzeniach';
$zmSlangAutoMessageEvents    = 'Automatycznie  komunikat o pasuj�cych zdarzeniach';
$zmSlangAutoUploadEvents     = 'Automatycznie wysy�aj wszystkie pasuj�ce zdarzenia';
$zmSlangAvgBrScore           = '�red.<br/>wynik';
$zmSlangBadMonitorChars      = 'Nazwy monitor�w mog� zawiera� tylko litery, cyfry oraz my�lnik i podkre�lenie';
$zmSlangBandwidth            = 'przepustowo��';
$zmSlangBlobPx               = 'Plamka Px';
$zmSlangBlobSizes            = 'Rozmiary plamek';
$zmSlangBlobs                = 'Plamki';
$zmSlangBrightness           = 'Jaskrawo��';
$zmSlangBuffers              = 'Bufory';
$zmSlangCancel               = 'Anuluj';
$zmSlangCancelForcedAlarm    = 'Anuluj&nbsp;wymuszony&nbsp;alarm';
$zmSlangCaptureHeight        = 'Wysoko�� obrazu';
$zmSlangCapturePalette       = 'Paleta kolor�w obrazu';
$zmSlangCaptureWidth         = 'Szeroko�� obrazu';
$zmSlangCheckAll             = 'Zaznacz wszystko';
$zmSlangCheckMethod          = 'Metoda sprawdzenia alarmu';
$zmSlangChooseFilter         = 'Wybierz filtr';
$zmSlangClose                = 'Zamknij';
$zmSlangColour               = 'Nasycenie';
$zmSlangConfig               = 'Config';
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
$zmSlangDeleteSavedFilter    = 'Usu� zapisany filtr';
$zmSlangDelete               = 'Usu�';
$zmSlangDescription          = 'Opis';
$zmSlangDeviceChannel        = 'Numer wej�cia w urz�dzeniu';
$zmSlangDeviceFormat         = 'System TV (0=PAL,1=NTSC itd)';
$zmSlangDeviceNumber         = 'Numer urz�dzenia (/dev/video?)';
$zmSlangDimensions           = 'Rozmiary';
$zmSlangDuration             = 'Czas trwania';
$zmSlangEdit                 = 'Edycja';
$zmSlangEmail                = 'Email';
$zmSlangEnabled              = 'Zezwolono';
$zmSlangEnterNewFilterName   = 'Wpisz now� nazw� filtra';
$zmSlangError                = 'B��d';
$zmSlangErrorBrackets        = 'B��d, prosz� sprawdzi� ilo�� nawias�w otwieraj�cych i zamykaj�cych';
$zmSlangErrorValidValue      = 'B��d, prosz� sprawdzi� czy wszystkie warunki maj� poprawne warto�ci';
$zmSlangEtc                  = 'itp';
$zmSlangEventFilter          = 'Filtr zdarze�';
$zmSlangEvents               = 'Zdarzenia';
$zmSlangEvent                = 'Zdarzenie';
$zmSlangExclude              = 'Wyklucz';
$zmSlangFeed                 = 'Dostarcz';
$zmSlangFilterPx             = 'Filtr Px';
$zmSlangFirst                = 'Pierwszy';
$zmSlangForceAlarm           = 'Wymu�&nbsp;alarm';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'Raport (ramek/s)';
$zmSlangFrameId              = 'Nr ramki';
$zmSlangFrame                = 'Ramka';
$zmSlangFrameRate            = 'Tempo ramek';
$zmSlangFrameSkip            = 'Pomi� ramk�';
$zmSlangFrames               = 'Ramek';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = 'Funkcja';
$zmSlangFunction             = 'Funkcja';
$zmSlangGenerateVideo        = 'Generowanie Video';
$zmSlangGeneratingVideo      = 'Generuj� Video';
$zmSlangGoToZoneMinder       = 'Przejd� na ZoneMinder.com';
$zmSlangGrey                 = 'Cz/b';
$zmSlangHighBW               = 'Wys.&nbsp;prz.';
$zmSlangHigh                 = 'wysoka';
$zmSlangHour                 = 'Godzina';
$zmSlangHue                  = 'Odcie�';
$zmSlangIdle                 = 'Bezczynny';
$zmSlangId                   = 'Nr';
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
$zmSlangMark                 = 'Znacznik';
$zmSlangMaxBrScore           = 'Maks.<br/>wynik';
$zmSlangMaximumFPS           = 'Maks. FPS';
$zmSlangMax                  = 'Maks.';
$zmSlangMediumBW             = '�red.&nbsp;prz.';
$zmSlangMedium               = '�rednia';
$zmSlangMinAlarmGeMinBlob    = 'Minimalny rozmiar piksela alarmu musi by� wi�kszy lub r�wny od najmniejszego piksela plamki';
$zmSlangMinAlarmGeMinFilter  = 'Minimalny rozmiar piksela alarmu musi by� wi�kszy lub r�wny od najmniejszego piksela filtru';
$zmSlangMinAlarmPixelsLtMax  = 'Minimalna liczba pikseli alarmu powinna by� wi�ksza od maksymalnej liczby pikseli alarmu';
$zmSlangMinBlobAreaLtMax     = 'Minimalny obszar plamki powinien by� mniejszy od maksymalnego obszaru plamki';
$zmSlangMinBlobsLtMax        = 'Najmniejsze plamki powinny by� mniejsze od najwi�kszych plamek' ;
$zmSlangMinFilterPixelsLtMax = 'Najmniejsze piksele filtru powinny by� mniejsze od najwi�kszych pikseli';
$zmSlangMinPixelThresLtMax   = 'Najmniejsze progi pikseli powinny by� mniejsze od najwi�kszych prog�w pikseli';
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
$zmSlangNoStatisticsRecorded = 'Brak zapisanych statystyk dla tego zdarzenia/ramki';
$zmSlangOpEq                 = 'r�wny';
$zmSlangOpGtEq               = 'wi�ksze lub r�wne od';
$zmSlangOpGt                 = 'wi�ksze od';
$zmSlangOpIn                 = 'w zestawie';
$zmSlangOpLtEq               = 'mniejsze lub r�wne od';
$zmSlangOpLt                 = 'mniejsze od';
$zmSlangOpMatches            = 'pasuj�ce';
$zmSlangOpNe                 = 'r�ne od';
$zmSlangOpNotIn              = 'brak w zestawie';
$zmSlangOpNotMatches         = 'nie pasuj�ce';
$zmSlangOptionHelp           = 'OpcjePomoc';
$zmSlangOptionRestartWarning = 'Te zmiany nie przynios� natychmiastowego efektu\ndop�ki system pracuje. Kiedy zako�czysz robi� zmiany\nprosz� koniecznie zrestartowa� ZoneMinder.';
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
$zmSlangPrev                 = 'Poprzedni';
$zmSlangRate                 = 'Tempo';
$zmSlangReal                 = 'Rzeczywiste';
$zmSlangRecord               = 'Zapis';
$zmSlangRefImageBlendPct     = 'Miks z obrazem odniesienia';
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
$zmSlangTime                 = 'Czas';
$zmSlangTimeDelta            = 'R�nica czasu';
$zmSlangTimestamp            = 'Czas';
$zmSlangTimestampLabelFormat = 'Format etykiety czasu';
$zmSlangTimestampLabelX      = 'Wsp. X etykiety czasu';
$zmSlangTimestampLabelY      = 'Wsp. Y etykiety czasu';
$zmSlangTimeStamp            = 'Piecz�� czasu';
$zmSlangTools                = 'Narz�dzia';
$zmSlangTotalBrScore         = 'Ca�kowity<br/>wynik';
$zmSlangTriggers             = 'Wyzwalacze';
$zmSlangType                 = 'Typ';
$zmSlangUnarchive            = 'Nie archiwizuj';
$zmSlangUnits                = 'Jednostki';
$zmSlangUnknown              = 'Nieznany';
$zmSlangUpdateAvailable      = 'Jest dost�pne uaktualnienie ZoneMinder ';
$zmSlangUpdateNotNecessary   = 'Nie jest wymagane uaktualnienie';
$zmSlangUseFilterExprsPost   = '&nbsp;wyra�enie&nbsp;filtru'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = 'U�yj&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = 'U�yj filtru';
$zmSlangUsername             = 'Nazwa u�ytkownika';
$zmSlangUsers                = 'U�ytkownicy';
$zmSlangUser                 = 'U�ytkownik';
$zmSlangValue                = 'Warto��';
$zmSlangVersionIgnore        = 'Zignoruj t� wersj�';
$zmSlangVersionRemindDay     = 'Przypomnij po 1 dniu';
$zmSlangVersionRemindHour    = 'Przypomnij po 1 godzinie';
$zmSlangVersionRemindNever   = 'Nie przypominaj o nowych wersjach';
$zmSlangVersionRemindWeek    = 'Przypomnij po 1 tygodniu';
$zmSlangVersion              = 'Wersja';
$zmSlangVideoGenFailed       = 'Generowanie filmu Video nie powiod�o si�!';
$zmSlangVideoGenParms        = 'Parametery generowania filmu Video';
$zmSlangVideoSize            = 'Rozmiar filmu Video';
$zmSlangVideo                = 'Video';
$zmSlangViewAll              = 'Poka� wszystko';
$zmSlangViewPaged            = 'Poka� stronami';
$zmSlangView                 = 'Podgl�d';
$zmSlangWarmupFrames         = 'Ignorowane ramki';
$zmSlangWatch                = 'podgl�d';
$zmSlangWeb                  = 'Web';
$zmSlangWeek                 = 'Tydzie�';
$zmSlangX10ActivationString  = 'X10: �a�cuch aktywuj�cy';
$zmSlangX10InputAlarmString  = 'X10: �a�cuch wej�cia alarmu';
$zmSlangX10OutputAlarmString = 'X10: �a�cuch wyj�cia alarmu';
$zmSlangX10                  = 'X10';
$zmSlangYes                  = 'Tak';
$zmSlangYouNoPerms           = 'Nie masz uprawnie� na dost�p do tego zasobu.';
$zmSlangZoneAlarmColour      = 'Kolor alarmu (RGB)';
$zmSlangZoneAlarmThreshold   = 'Pr�g alarmu (0>=?<=255)';
$zmSlangZoneFilterHeight     = 'Wysoko�� filtru (piksele)';
$zmSlangZoneFilterWidth      = 'Szeroko�� filtru (piksele)';
$zmSlangZoneMaxAlarmedArea   = 'Najwi�kszy obszar alarmowany';
$zmSlangZoneMaxBlobArea      = 'Najwi�kszy obszar plamki';
$zmSlangZoneMaxBlobs         = 'Najwi�ksze plamki';
$zmSlangZoneMaxFilteredArea  = 'Najwi�kszy obszar filtrowany';
$zmSlangZoneMaxPixelThres    = 'Najwi�kszy pr�g piksela (0>=?<=255)';
$zmSlangZoneMaxX             = 'Najwi�ksze X (prawo)';
$zmSlangZoneMaxY             = 'Najwi�ksze Y (d�)';
$zmSlangZoneMinAlarmedArea   = 'Najmniejszy obszar alarmowany';
$zmSlangZoneMinBlobArea      = 'Najmniejszy obszar plamki';
$zmSlangZoneMinBlobs         = 'Najmniejsze plamki';
$zmSlangZoneMinFilteredArea  = 'Najmniejszy obszar filtrowany';
$zmSlangZoneMinPixelThres    = 'Minimalny pr�g piksela (0>=?<=255)';
$zmSlangZoneMinX             = 'Najmniejsze X (lewo)';
$zmSlangZoneMinY             = 'Najmniejsze Y (g�ra)';
$zmSlangZones                = 'Strefy';
$zmSlangZone                 = 'Strefa';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = 'Aktualny login \'%1$s\'';
$zmClangEventCount           = '%1$s %2$s';
$zmClangLastEvents           = 'Ostatnie %1$s %2$s';
$zmClangLatestRelease        = 'Najnowsza wersja to v%1$s, Ty posiadasz v%2$s.';
$zmClangMonitorCount         = '%1$s %2$s';
$zmClangMonitorFunction      = 'Monitor %1$s Funkcja';
$zmClangRunningRecentVer     = 'Uruchomi�e� najnowsz� wersj� ZoneMinder, v%s.';

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
$zmVlangEvent                = array( 0=>'Zdarze�', 1=>'Zdarzenie', 2=>'Zdarzenia');
$zmVlangMonitor              = array( 0=>'Monitor�w', 1=>'Monitor', 2=>'Monitory');

// You will need to choose or write a function that can correlate the plurality string arrays
// with variable counts. This is used to conjugate the Vlang arrays above with a number passed
// in to generate the correct noun form.

// This is an version that could be used in the Polish language
// 
function zmVlang( $lang_var_array, $count )
{
 	$secondlastdigit = substr( $count, -2, 1 );
 	$lastdigit = substr( $count, -1, 1 );
 	if ( $count == 1 )
	{
		return( $lang_var_array[1] );
	}
 	if (($secondlastdigit == 0)|( $secondlastdigit == 1))
 	{
 		return( $lang_var_array[0] );
 	}
 	if ( $secondlastdigit >= 2)
	{
 		switch ( $lastdigit )
 		{
 			case 0 :
	 		case 1 :
 			case 5 :
 			case 6 :
	 		case 7 :
 			case 8 :
 			case 9 :
	 		{
 				return( $lang_var_array[0] );
 				break;
	 		}
 			case 2 :
 			case 3 :
	 		case 4 :
 			{
 				return( $lang_var_array[2] );
	 			break;
 			}
	 	}
	}
 	die( 'B��D! zmVlang nie mo�e skorelowac �a�cucha!' );
}

// This is an example of how the function is used in the code which you can uncomment and 
// use to test your custom function.
// $monitors = 12; // Choose any number
// echo $monitors." ";
// echo zmVlang( $zmVlangMonitor, $monitors);

// In this section you can override the default prompt and help texts for the options area
// These overrides are in the form of $zmOlangPrompt<option> and $zmOlangHelp<option>
// where <option> represents the option name minus the initial ZM_
// So for example, to override the help text for ZM_LANG_DEFAULT do
// $zmOlangPromptLANG_DEFAULT = "This is a new prompt for this option";
// $zmOlangHelpLANG_DEFAULT = "This is some new help for this option which will be displayed in the popup window when the ? is clicked";
//

?>
