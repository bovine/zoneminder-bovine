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
$zmSlang24BitColour          = '24�ޯĶװ';
$zmSlang8BitGrey             = '8�ޯĔZ�W�摜';
$zmSlangActual               = '�����p';
$zmSlangAddNewMonitor        = '�����ǉ�';
$zmSlangAddNewUser           = 'հ�ޒǉ�';
$zmSlangAddNewZone           = '�ްݒǉ�';
$zmSlangAlarm                = '�װ�';
$zmSlangAlarmBrFrames        = '�װ�<br/>�ڰ�';	
$zmSlangAlarmFrame           = '�װ� �ڰ�';
$zmSlangAlarmLimits          = '�װь��x';
$zmSlangAlarmPx              = '�װ� Px';
$zmSlangAlert                = '�x��';
$zmSlangAll                  = '�S��';
$zmSlangApply                = '�K�p';
$zmSlangApplyingStateChange  = '�ύX�K�p��';
$zmSlangArchArchived         = '�ۑ����̂�';
$zmSlangArchive              = '������';
$zmSlangArchUnarchived       = '�ۑ����ȊO�̂�';
$zmSlangAttrAlarmFrames      = '�װ� �ڰ�';
$zmSlangAttrArchiveStatus    = '�ۑ����';
$zmSlangAttrAvgScore         = '���Ͻ���';
$zmSlangAttrDate             = '���t';
$zmSlangAttrDateTime         = '����';
$zmSlangAttrDuration         = '�p������';
$zmSlangAttrFrames           = '�ڰ�';
$zmSlangAttrMaxScore         = '�ō�����';
$zmSlangAttrMontage          = '�����ޭ';
$zmSlangAttrTime             = '����';
$zmSlangAttrTotalScore       = '���v����';
$zmSlangAttrWeekday          = '�j��';
$zmSlangAutoArchiveEvents    = '��v����Ă������ۑ�';
$zmSlangAutoDeleteEvents     = '��v����Ă������폜';
$zmSlangAutoEmailEvents      = '��v����ďڍׂ�����Ұ�';
$zmSlangAutoMessageEvents    = '��v����ďڍׂ�����ү����';
$zmSlangAutoUploadEvents     = '��v����Ă���������۰��';
$zmSlangAvgBrScore           = '����<br/>����';
$zmSlangBandwidth            = '�ш敝';
$zmSlangBlobPx               = '����� Px';
$zmSlangBlobs                = '�����';
$zmSlangBlobSizes            = '����� ����';
$zmSlangBrightness           = '�P�x';
$zmSlangBuffers              = '�ޯ̧';
$zmSlangCancel               = '��ݾ�';
$zmSlangCancelForcedAlarm    = '�����װѷ�ݾ�';
$zmSlangCaptureHeight        = '��荞�ݍ���';
$zmSlangCapturePalette       = '��荞����گ�';
$zmSlangCaptureWidth         = '��荞�ݕ�';
$zmSlangCheckAll             = '�S�đI��';
$zmSlangChooseFilter         = '̨����̑I��';
$zmSlangClose                = '����';
$zmSlangColour               = '�F';
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
$zmSlangDuration             = '�p������';
$zmSlangEdit                 = '�ҏW';
$zmSlangEmail                = 'Ұ�';
$zmSlangEnabled              = '�g�p�\';
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
$zmSlangFrame                = '�ڰ�';
$zmSlangFrameId              = '�ڰ� ID';
$zmSlangFrameRate            = '�ڰ�ڰ�';
$zmSlangFrames               = '�ڰ�';
$zmSlangFrameSkip            = '�ڰѽ����';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = '�@�\';
$zmSlangFunction             = '�@�\';
$zmSlangGenerateVideo        = '���޵�̐���';
$zmSlangGeneratingVideo      = '���޵������';
$zmSlangGrey                 = '��ڰ';
$zmSlangHighBW               = '���ш�';
$zmSlangHigh                 = '��';
$zmSlangHour                 = '��';
$zmSlangHue                  = '�F��';
$zmSlangId                   = 'ID';
$zmSlangIdle                 = '�ҋ@���';
$zmSlangIgnore               = '����';
$zmSlangImageBufferSize      = '�摜 �ޯ̧ ����';
$zmSlangImage                = '�摜';
$zmSlangInclude              = '�g�ݍ���';
$zmSlangInverted             = '���]';
$zmSlangLanguage             = '����';
$zmSlangLast                 = '�ŏI';
$zmSlangLocal                = '۰��';
$zmSlangLoggedInAs           = '۸޲ݍς�:';
$zmSlangLoggingIn            = '۸޲ݒ�';
$zmSlangLogin                = '۸޲�';
$zmSlangLogout               = '۸ޱ��';
$zmSlangLowBW                = '��ш�';
$zmSlangLow                  = '��';
$zmSlangMark                 = '�I��';
$zmSlangMaxBrScore           = '�ō�<br/>����';
$zmSlangMaximumFPS           = '�ō� FPS';
$zmSlangMax                  = '�ō�';
$zmSlangMediumBW             = '���ш�';
$zmSlangMedium               = '��';
$zmSlangMinAlarmGeMinBlob    = '�Œ�A���[���s�N�Z�����Œ�u���u�s�N�Z���������ȏ�łȂ���΂����Ȃ�';
$zmSlangMinAlarmGeMinFilter  = '�Œ�A���[���s�N�Z�����Œ�t�B���^�[�s�N�Z���������ȏ�łȂ���΂����Ȃ�';
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
$zmSlangNew                  = '�V�K';
$zmSlangNewPassword          = '�V�����߽ܰ��';
$zmSlangNewState             = '�V�K���';	
$zmSlangNewUser              = '�V����հ��';
$zmSlangNext                 = '��';
$zmSlangNoFramesRecorded     = '���̲���Ă��ڰт͓o�^����Ă��܂���';
$zmSlangNoneAvailable        = '����܂���';
$zmSlangNone                 = '����܂���';
$zmSlangNo                   = '������';
$zmSlangNormal               = '����';
$zmSlangNoSavedFilters       = '�ۑ����ꂽ̨����͂���܂���';
$zmSlangNoStatisticsRecorded = '���̲����/�ڰт̓��v�͓o�^����Ă��܂���';
$zmSlangOpEq                 = '����';
$zmSlangOpGtEq               = '�������ȏ�';
$zmSlangOpGt                 = '�ȉ�';
$zmSlangOpLtEq               = '�������ȉ�';
$zmSlangOpLt                 = '�ȉ�';
$zmSlangOpNe                 = '�����łȂ�';
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
$zmSlangRestarting           = '�ċN����';
$zmSlangRestart              = '�ċN��';
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
$zmSlangServerLoad           = '���ް ���S��';
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
$zmSlangStopped              = '��~���';
$zmSlangStop                 = '��~';
$zmSlangStream               = '��ذ�';
$zmSlangSystem               = '����';
$zmSlangTimeDelta            = '���� ���';
$zmSlangTimestampLabelFormat = '��ѽ���� ���� ̫�ϯ�';
$zmSlangTimestampLabelX      = '��ѽ���� ���� X';
$zmSlangTimestampLabelY      = '��ѽ���� ���� Y';
$zmSlangTimestamp            = '��ѽ����';
$zmSlangTimeStamp            = '��� �����';
$zmSlangTime                 = '����';
$zmSlangTools                = '°�';
$zmSlangTotalBrScore         = '���v<br/>����';
$zmSlangTriggers             = '�ضް';
$zmSlangType                 = '����';
$zmSlangUnarchive            = '��';
$zmSlangUnits                = '�Ư�';
$zmSlangUnknown              = '�s��';
$zmSlangUseFilterExprsPost   = '&nbsp;̨�����'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = '�w�肵�Ă�������:&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = '̨������g�p���Ă�������';
$zmSlangUsername             = 'հ�ޖ�';
$zmSlangUsers                = 'հ��';
$zmSlangUser                 = 'հ��';
$zmSlangValue                = '���l';
$zmSlangVideoGenFailed       = '���޵�����̎��s�I';
$zmSlangVideoGenParms        = '���޵���� ���Ұ�';
$zmSlangVideoSize            = '���޵ ����';
$zmSlangVideo                = '���޵';
$zmSlangViewAll              = '�S���\��';
$zmSlangViewPaged            = '�߰�މ��̕\��';
$zmSlangView                 = '�\��';
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
$zmSlangZoneMaxX             = 'X (�E)�ō�';
$zmSlangZoneMaxY             = 'Y (��)�ō�';
$zmSlangZoneMinAlarmedArea   = '�Œ�װї̈�';
$zmSlangZoneMinBlobArea      = '�Œ�����ޗ̈�';
$zmSlangZoneMinBlobs         = '�Œ�����ސ�';
$zmSlangZoneMinFilteredArea  = '�Œ�̨����̈�';
$zmSlangZoneMinX             = 'X (�E)�Œ�';
$zmSlangZoneMinY             = 'Y (��)�Œ�';
$zmSlangZones                = '�ް�';
$zmSlangZone                 = '�ް�';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = '������\\'%1$s\��۸޲݂��Ă��܂�';
$zmClangEventCount           = '%1$s %2$s';
$zmClangLastEvents           = '�ŏI %1$s %2$s';
$zmClangMonitorCount         = '%1$s %2$s';
$zmClangMonitorFunction      = '����%1$s �@�\';

// Variable arrays expressing plurality
$zmVlangEvent                = array( 0=>'�����', 1=>'�����', 2=>'�����' );
$zmVlangMonitor              = array( 0=>'����', 1=>'����', 2=>'����' );

?>
