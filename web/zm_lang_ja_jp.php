<?php
//
// ZoneMinder web Japanese language file, $Date$, $Revision$
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

// ZoneMinder Japanese Translation by Andrew Arkley

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
$zmSlang24BitColour          = '24�ޯĶװ';
$zmSlang8BitGrey             = '8�ޯĔZ�W�摜';
$zmSlangActual               = '�����p';
$zmSlangAddNewMonitor        = '�����ǉ�';
$zmSlangAddNewUser           = 'հ�ޒǉ�';
$zmSlangAddNewZone           = '�ްݒǉ�';
$zmSlangAlarmBrFrames        = '�װ�<br/>�ڰ�';	
$zmSlangAlarmFrame           = '�װ� �ڰ�';
$zmSlangAlarmLimits          = '�װь��x';
$zmSlangAlarm                = '�װ�';
$zmSlangAlarmPx              = '�װ� Px';
$zmSlangAlert                = '�x��';
$zmSlangAll                  = '�S��';
$zmSlangApplyingStateChange  = '�ύX�K�p��';
$zmSlangApply                = '�K�p';
$zmSlangArchArchived         = '�ۑ����̂�';
$zmSlangArchive              = '������';
$zmSlangArchUnarchived       = '�ۑ����ȊO�̂�';
$zmSlangAttrAlarmFrames      = '�װ� �ڰ�';
$zmSlangAttrArchiveStatus    = '�ۑ����';
$zmSlangAttrAvgScore         = '���Ͻ���';
$zmSlangAttrDateTime         = '����';
$zmSlangAttrDate             = '���t';
$zmSlangAttrDuration         = '�p������';
$zmSlangAttrFrames           = '�ڰ�';
$zmSlangAttrMaxScore         = '�ō�����';
$zmSlangAttrMonitorId        = '���� Id';
$zmSlangAttrMonitorName      = '���� ���O';
$zmSlangAttrTime             = '����';
$zmSlangAttrTotalScore       = '���v����';
$zmSlangAttrWeekday          = '�j��';
$zmSlangAutoArchiveEvents    = '��v����Ă������ۑ�';
$zmSlangAutoDeleteEvents     = '��v����Ă������폜';
$zmSlangAutoEmailEvents      = '��v����ďڍׂ�����Ұ�';
$zmSlangAutoMessageEvents    = '��v����ďڍׂ�����ү����';
$zmSlangAutoUploadEvents     = '��v����Ă���������۰��';
$zmSlangAvgBrScore           = '����<br/>����';
$zmSlangBadMonitorChars      = '�����̖��O�Ɏg���镶���͏�������a-z�A0-9�A-��_�����ł�';
$zmSlangBandwidth            = '�ш敝';
$zmSlangBlobPx               = '����� Px';
$zmSlangBlobSizes            = '����� ����';
$zmSlangBlobs                = '�����';
$zmSlangBrightness           = '�P�x';
$zmSlangBuffers              = '�ޯ̧';
$zmSlangCancelForcedAlarm    = '�����װѷ�ݾ�';
$zmSlangCancel               = '��ݾ�';
$zmSlangCaptureHeight        = '��荞�ݍ���';
$zmSlangCapturePalette       = '��荞����گ�';
$zmSlangCaptureWidth         = '��荞�ݕ�';
$zmSlangCheckAll             = '�S�đI��';
$zmSlangCheckMethod          = '�װ� �������@';
$zmSlangChooseFilter         = '̨����̑I��';
$zmSlangClose                = '����';
$zmSlangColour               = '�F';
$zmSlangConfig               = 'Config';
$zmSlangConfiguredFor        = '�ݒ�:';
$zmSlangConfirmPassword      = '�߽ܰ�ނ̊m�F';
$zmSlangConjAnd              = '�y��';
$zmSlangConjOr               = '����';
$zmSlangConsole              = '�ݿ��';
$zmSlangContactAdmin         = '�Ǘ��҂ɂ��₢���킹���������B';
$zmSlangContrast             = '���׽�';
$zmSlangCycleWatch           = '���يώ@';
$zmSlangDay                  = '�j��';
$zmSlangDeleteAndNext        = '�����폜';
$zmSlangDeleteAndPrev        = '�O���폜';
$zmSlangDelete               = '�폜';
$zmSlangDeleteSavedFilter    = '�ۑ�̨����̍폜';
$zmSlangDescription          = '����';
$zmSlangDeviceChannel        = '���޲� �����';
$zmSlangDeviceFormat         = '���޲� ̫�ϯ� (0=PAL,1=NTSC �� )';
$zmSlangDeviceNumber         = '���޲��ԍ� (/dev/video?)';
$zmSlangDimensions           = '���@';
$zmSlangDisk                 = 'Disk';
$zmSlangDuration             = '�p������';
$zmSlangEdit                 = '�ҏW';
$zmSlangEmail                = 'Ұ�';
$zmSlangEnabled              = '�g�p�\\';
$zmSlangEnterNewFilterName   = '�V����̨������̓���';
$zmSlangErrorBrackets        = '�G���[�A�J�����ʂƕ����ʂ̐��������Ă���̂����m�F���Ă�������';
$zmSlangError                = '�G���[';
$zmSlangErrorValidValue      = '�G���[�A�S�Ă̍��̐��l���L�����ǂ������m�F���Ă�������';
$zmSlangEtc                  = '��';
$zmSlangEvent                = '�����';
$zmSlangEventFilter          = '����� ̨���';
$zmSlangEvents               = '�����';
$zmSlangExclude              = '�r��';
$zmSlangFeed                 = '���荞��';
$zmSlangFilterPx             = '̨��� Px';
$zmSlangFirst                = '�ŏ�';
$zmSlangForceAlarm           = '�����װ�';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'FPS�񍐊Ԋu';
$zmSlangFrameId              = '�ڰ� ID';
$zmSlangFrame                = '�ڰ�';
$zmSlangFrameRate            = '�ڰ�ڰ�';
$zmSlangFrames               = '�ڰ�';
$zmSlangFrameSkip            = '�ڰѽ����';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = '�@�\\';
$zmSlangFunction             = '�@�\\';
$zmSlangGenerateVideo        = '���޵�̐���';
$zmSlangGeneratingVideo      = '���޵������';
$zmSlangGoToZoneMinder       = 'ZoneMinder.com�ɍs��';
$zmSlangGrey                 = '��ڰ';
$zmSlangHigh                 = '��';
$zmSlangHighBW               = '���ш�';
$zmSlangHour                 = '��';
$zmSlangHue                  = '�F��';
$zmSlangId                   = 'ID';
$zmSlangIdle                 = '�ҋ@���';
$zmSlangIgnore               = '����';
$zmSlangImage                = '�摜';
$zmSlangImageBufferSize      = '�摜 �ޯ̧ ����';
$zmSlangInclude              = '�g�ݍ���';
$zmSlangInverted             = '���]';
$zmSlangLanguage             = '����';
$zmSlangLast                 = '�ŏI';
$zmSlangLoad                 = 'Load';
$zmSlangLocal                = '۰��';
$zmSlangLoggedInAs           = '۸޲ݍς�:';
$zmSlangLoggingIn            = '۸޲ݒ�';
$zmSlangLogin                = '۸޲�';
$zmSlangLogout               = '۸ޱ��';
$zmSlangLow                  = '��';
$zmSlangLowBW                = '��ш�';
$zmSlangMark                 = '�I��';
$zmSlangMax                  = '�ō�';
$zmSlangMaxBrScore           = '�ō�<br/>����';
$zmSlangMaximumFPS           = '�ō� FPS';
$zmSlangMedium               = '��';
$zmSlangMediumBW             = '���ш�';
$zmSlangMinAlarmGeMinBlob    = '�Œ�A���[���s�N�Z�����Œ�u���u�s�N�Z���������ȏ�łȂ���΂����Ȃ�';
$zmSlangMinAlarmGeMinFilter  = '�Œ�A���[���s�N�Z�����Œ�t�B���^�[�s�N�Z���������ȏ�łȂ���΂����Ȃ�';
$zmSlangMinAlarmPixelsLtMax  = '�Œ�װ��߸�ق͍ō��l���ȉ��łȂ���΂����Ȃ�';
$zmSlangMinBlobAreaLtMax     = '�Œ���ۯ�ޔ͈͍͂ō��l���ȉ��łȂ���΂����Ȃ�';
$zmSlangMinBlobsLtMax        = '�Œ���ۯ�ސ��͍ō������ȉ��łȂ���΂����Ȃ�';
$zmSlangMinFilterPixelsLtMax = '�Œ�̨����߸�ِ��͍ō������ȉ��łȂ���΂����Ȃ�';
$zmSlangMinPixelThresLtMax   = '�Œ��߸��臒l�͍ō��l���ȉ��łȂ���΂����Ȃ�';
$zmSlangMisc                 = '���̑�';
$zmSlangMonitorIds           = '���� ID';
$zmSlangMonitor              = '����';
$zmSlangMonitors             = '����';
$zmSlangMontage              = '�����ޭ';
$zmSlangMonth                = '��';
$zmSlangMustBeGe             = '�������ȏ�łȂ���΂����Ȃ�';
$zmSlangMustBeLe             = '�������ȉ��łȂ���΂����Ȃ�';
$zmSlangMustConfirmPassword  = '�p�X���[�h�̊m�F�����Ă�������';
$zmSlangMustSupplyPassword   = '�p�X���[�h����͂��Ă�������';
$zmSlangMustSupplyUsername   = '���[�U������͂��Ă�������';
$zmSlangName                 = '���O';
$zmSlangNetwork              = 'ȯ�ܰ�';
$zmSlangNewPassword          = '�V�����߽ܰ��';
$zmSlangNewState             = '�V�K���';	
$zmSlangNewUser              = '�V����հ��';
$zmSlangNew                  = '�V�K';
$zmSlangNext                 = '��';
$zmSlangNo                   = '������';
$zmSlangNoFramesRecorded     = '���̲���Ă��ڰт͓o�^����Ă��܂���';
$zmSlangNoneAvailable        = '����܂���';
$zmSlangNone                 = '����܂���';
$zmSlangNormal               = '����';
$zmSlangNoSavedFilters       = '�ۑ����ꂽ̨����͂���܂���';
$zmSlangNoStatisticsRecorded = '���̲����/�ڰт̓��v�͓o�^����Ă��܂���';
$zmSlangOpEq                 = '����';
$zmSlangOpGt                 = '�ȉ�';
$zmSlangOpGtEq               = '�������ȏ�';
$zmSlangOpIn                 = '��Ăɓ����Ă���';
$zmSlangOpLt                 = '�ȉ�';
$zmSlangOpLtEq               = '�������ȉ�';
$zmSlangOpMatches            = '��v����';
$zmSlangOpNe                 = '�����łȂ�';
$zmSlangOpNotIn              = '��Ăɓ����Ă��Ȃ�';
$zmSlangOpNotMatches         = '��v���Ȃ�';
$zmSlangOptionHelp           = '��߼�� ����';
$zmSlangOptionRestartWarning = '���̕ύX�͋N�������f����Ȃ��ꍇ������܂��B\n�ύX���Ă���ZoneMinder���ċN�����Ă��������B';
$zmSlangOptions              = '��߼��';
$zmSlangOrEnterNewName       = '���͐V�������O����͂��Ă�������';
$zmSlangOrientation          = '�ص�ð���';
$zmSlangOverwriteExisting    = '�㏑�����܂�';
$zmSlangPaged                = '�߰�މ�';
$zmSlangParameter            = '���Ұ�';
$zmSlangPassword             = '�߽ܰ��';
$zmSlangPasswordsDifferent   = '�V�����p�X���[�h�ƍē��̓p�X���[�h����v���܂���';
$zmSlangPaths                = '�߽';
$zmSlangPhoneBW              = '�g�їp';
$zmSlangPixels               = '�߸��';
$zmSlangPleaseWait           = '���҂���������';
$zmSlangPostEventImageBuffer = '����� �Ұ�� �ޯ̧��';
$zmSlangPreEventImageBuffer  = '����� �Ұ�� �ޯ̧�O<';
$zmSlangPrev                 = '�O';
$zmSlangRate                 = 'ڰ�';
$zmSlangReal                 = '�����p';
$zmSlangRecord               = '�^��';
$zmSlangRefImageBlendPct     = '�Ұ�� ������ �Q�� %';
$zmSlangRefresh              = '�ŐV�̏��ɍX�V';
$zmSlangRemoteHostName       = '�Ӱ� ν� ��';
$zmSlangRemoteHostPath       = '�Ӱ� ν� �߽';
$zmSlangRemoteHostPort       = '�Ӱ� ν� �߰�';
$zmSlangRemoteImageColours   = '�Ӱ� �Ұ�� �װ';
$zmSlangRemote               = '�Ӱ�';
$zmSlangRename               = '�V�������O������';
$zmSlangReplay               = '�Đ�';
$zmSlangResetEventCounts     = '����� ���� ؾ��';
$zmSlangRestart              = '�ċN��';
$zmSlangRestarting           = '�ċN����';
$zmSlangRestrictedCameraIds  = '�������ꂽ��� ID';
$zmSlangRotateLeft           = '���ɉ�]';
$zmSlangRotateRight          = '�E�ɉ�]';
$zmSlangRunMode              = '�N��Ӱ��';
$zmSlangRunning              = '�N����';
$zmSlangRunState             = '�N�����';
$zmSlangSaveAs               = '���O�����ĕۑ�';
$zmSlangSaveFilter           = '̨�����ۑ�';
$zmSlangSave                 = '�ۑ�';
$zmSlangScale                = '����';
$zmSlangScore                = '����';
$zmSlangSecs                 = '�b';
$zmSlangSectionlength        = '����';
$zmSlangSetLearnPrefs        = 'Set Learn Prefs'; // �V�����ݒ�̎����ۑ��@This can be ignored for now
$zmSlangSetNewBandwidth      = '�V�����ш敝�̐ݒ�';
$zmSlangSettings             = '�ݒ�';
$zmSlangShowFilterWindow     = '̨��� ����ް�̕\��';
$zmSlangSource               = '���';
$zmSlangSourceType           = '��� ����';
$zmSlangStart                = '����';
$zmSlangState                = '���';
$zmSlangStats                = '���v';
$zmSlangStatus               = '���';
$zmSlangStills               = '���ى摜';
$zmSlangStop                 = '��~';
$zmSlangStopped              = '��~���';
$zmSlangStream               = '��ذ�';
$zmSlangSystem               = '����';
$zmSlangTimeDelta            = '���� ���';
$zmSlangTime                 = '����';
$zmSlangTimestamp            = '��ѽ����';
$zmSlangTimeStamp            = '��� �����';
$zmSlangTimestampLabelFormat = '��ѽ���� ���� ̫�ϯ�';
$zmSlangTimestampLabelX      = '��ѽ���� ���� X';
$zmSlangTimestampLabelY      = '��ѽ���� ���� Y';
$zmSlangTools                = '°�';
$zmSlangTotalBrScore         = '���v<br/>����';
$zmSlangTriggers             = '�ضް';
$zmSlangType                 = '����';
$zmSlangUnarchive            = '��';
$zmSlangUnits                = '�Ư�';
$zmSlangUnknown              = '�s��';
$zmSlangUpdateAvailable      = 'ZoneMinder�̱����ްĂ�����܂�';
$zmSlangUpdateNotNecessary   = '�����ްĂ̕K�v�͂���܂���';
$zmSlangUseFilterExprsPost   = '&nbsp;̨�����'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = '�w�肵�Ă�������:&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = '̨������g�p���Ă�������';
$zmSlangUsername             = 'հ�ޖ�';
$zmSlangUser                 = 'հ��';
$zmSlangUsers                = 'հ��';
$zmSlangValue                = '���l';
$zmSlangVersion              = '�ް�ޮ�';
$zmSlangVersionIgnore        = '�����ް�ޮ݂𖳎�';
$zmSlangVersionRemindDay     = '1����ɍēx�m�点��';
$zmSlangVersionRemindHour    = '1���Ԍ�ɍēx�m�点��';
$zmSlangVersionRemindNever   = '�V�����ް�ޮ݂̒m�点�͕K�v�Ȃ�';
$zmSlangVersionRemindWeek    = '1�T�Ԍ�ɍēx�m�点��';
$zmSlangVideo                = '���޵';
$zmSlangVideoGenFailed       = '���޵�����̎��s�I';
$zmSlangVideoGenParms        = '���޵���� ���Ұ�';
$zmSlangVideoSize            = '���޵ ����';
$zmSlangView                 = '�\��';
$zmSlangViewAll              = '�S���\��';
$zmSlangViewPaged            = '�߰�މ��̕\��';
$zmSlangWarmupFrames         = '���ѱ��� �ڰ�';
$zmSlangWatch                = '�Ď�';
$zmSlangWeb                  = '����';
$zmSlangWeek                 = '�T';
$zmSlangX10ActivationString  = 'X10�N��������';
$zmSlangX10InputAlarmString  = 'X10���ͱװѕ�����';
$zmSlangX10OutputAlarmString = 'X10�o�ͱװѕ�����';
$zmSlangX10                  = 'X10';
$zmSlangYes                  = '�͂�';
$zmSlangYouNoPerms           = '���̎����̱�����������܂���B';
$zmSlangZoneAlarmColour      = '�װ� �װ (RGB)';
$zmSlangZoneAlarmThreshold   = '�װ� 臒l(0>=?<=255)';
$zmSlangZoneFilterHeight     = '̨��� ���� (�߸��)';
$zmSlangZoneFilterWidth      = '̨��� �� (�߸��)';
$zmSlangZoneMaxAlarmedArea   = '�ō��װї̈�';
$zmSlangZoneMaxBlobArea      = '�ō�����ޗ̈�';
$zmSlangZoneMaxBlobs         = '�ō�����ސ�';
$zmSlangZoneMaxFilteredArea  = '�ō�̨����̈�';
$zmSlangZoneMaxPixelThres    = '�ō��߸��臒l (0>=?<=255)';
$zmSlangZoneMaxX             = 'X (�E)�ō�';
$zmSlangZoneMaxY             = 'Y (��)�ō�';
$zmSlangZoneMinAlarmedArea   = '�Œ�װї̈�';
$zmSlangZoneMinBlobArea      = '�Œ�����ޗ̈�';
$zmSlangZoneMinBlobs         = '�Œ�����ސ�';
$zmSlangZoneMinFilteredArea  = '�Œ�̨����̈�';
$zmSlangZoneMinPixelThres    = '�Œ��߸��臒l (0>=?<=255)';
$zmSlangZoneMinX             = 'X (�E)�Œ�';
$zmSlangZoneMinY             = 'Y (��)�Œ�';
$zmSlangZones                = '�ް�';
$zmSlangZone                 = '�ް�';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = '������\'%1$s\��۸޲݂��Ă��܂�';
$zmClangEventCount           = '%1$s %2$s';
$zmClangLastEvents           = '�ŏI %1$s %2$s';
$zmClangLatestRelease        = '�ŐV�ް�ޮ݂� v%1$s�A�����p�ް�ޮ݂�v%2$s.';
$zmClangMonitorCount         = '%1$s %2$s';
$zmClangMonitorFunction      = '����%1$s �@�\\';
$zmClangRunningRecentVer     = '���Ȃ���ZoneMinder�̍ŐV�ް�ޮ� v%s.���g���Ă��܂�';

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
$zmVlangEvent                = array( 0=>'�����', 1=>'�����', 2=>'�����' );
$zmVlangMonitor              = array( 0=>'����', 1=>'����', 2=>'����' );

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
