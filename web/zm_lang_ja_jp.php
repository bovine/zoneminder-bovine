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
$zmSlang24BitColour          = '24�r�b�g�J���[';
$zmSlang8BitGrey             = '8�r�b�g�Z�W�摜';
$zmSlangActual               = '�����p';
$zmSlangAddNewMonitor        = '���j�^�[�ǉ�';
$zmSlangAddNewUser           = '���[�U�ǉ�';
$zmSlangAddNewZone           = '�]�[���ǉ�';
$zmSlangAlarm                = '�A���[��';
$zmSlangAlarmBrFrames        = '�A���[��<br/>�t���[��';	
$zmSlangAlarmFrame           = '�A���[�� �t���[��';
$zmSlangAlarmLimits          = '�A���[�����x';
$zmSlangAlarmPx              = '�A���[�� Px';
$zmSlangAlert                = '�x��';
$zmSlangAll                  = '�S��';
$zmSlangApply                = '�K�p';
$zmSlangApplyingStateChange  = '�ύX�K�p��';
$zmSlangArchArchived         = '�ۑ����̂�';
$zmSlangArchive              = '�ۑ�';
$zmSlangArchUnarchived       = '�ۑ����ȊO�̂�';
$zmSlangAttrAlarmFrames      = '�A���[�� �t���[��';
$zmSlangAttrArchiveStatus    = '�ۑ����';
$zmSlangAttrAvgScore         = '���σX�R�A�[';
$zmSlangAttrDate             = '���t';
$zmSlangAttrDateTime         = '����';
$zmSlangAttrDuration         = '�p������';
$zmSlangAttrFrames           = '�t���[��';
$zmSlangAttrMaxScore         = '�ō��X�R�A�[';
$zmSlangAttrMontage          = '�����^�[�W��';
$zmSlangAttrTime             = '����';
$zmSlangAttrTotalScore       = '���v�X�R�A�[';
$zmSlangAttrWeekday          = '�j��';
$zmSlangAutoArchiveEvents    = '��v�C�x���g�������ۑ�';
$zmSlangAutoDeleteEvents     = '��v�C�x���g�������폜';
$zmSlangAutoEmailEvents      = '��v�C�x���g�ڍׂ��������[��';
$zmSlangAutoMessageEvents    = '��v�C�x���g�ڍׂ��������b�Z�[�W';
$zmSlangAutoUploadEvents     = '��v�C�x���g�������A�b�v���[�h';
$zmSlangAvgBrScore           = '����<br/>�X�R�A�[';
$zmSlangBandwidth            = '�ш敝';
$zmSlangBlobPx               = '�u���u Px';
$zmSlangBlobs                = '�u���u';
$zmSlangBlobSizes            = '�u���u �T�C�Y';
$zmSlangBrightness           = '�P�x';
$zmSlangBuffers              = '�o�b�t�@';
$zmSlangCancel               = '�L�����Z��';
$zmSlangCancelForcedAlarm    = '�����A���[���̃L�����Z��';
$zmSlangCaptureHeight        = '��荞�ݍ���';
$zmSlangCapturePalette       = '��荞�݃p���b�g';
$zmSlangCaptureWidth         = '��荞�ݕ�';
$zmSlangCheckAll             = '�S�đI��';
$zmSlangChooseFilter         = '�t�B���^�[�̑I��';
$zmSlangClose                = '����';
$zmSlangColour               = '�F';
$zmSlangConfiguredFor        = '�ݒ肳�ꂽ:';
$zmSlangConfirmPassword      = '�p�[�X���[�h�̊m�F';
$zmSlangConjAnd              = '�y��';
$zmSlangConjOr               = '����';
$zmSlangConsole              = '�R���\�[��';
$zmSlangContactAdmin         = '�Ǘ��҂ɂ��₢���킹���������B';
$zmSlangContrast             = '�R���g���X�g';
$zmSlangCycleWatch           = '�T�C�N���ώ@';
$zmSlangDay                  = '�j��';
$zmSlangDeleteAndNext        = '�����폜';
$zmSlangDeleteAndPrev        = '�O���폜';
$zmSlangDelete               = '�폜';
$zmSlangDeleteSavedFilter    = '�ۑ��t�B���^�[�̍폜';
$zmSlangDescription          = '����';
$zmSlangDeviceChannel        = '�f�o�C�X �`�����l��';
$zmSlangDeviceFormat         = '�f�o�C�X �t�H�[�}�b�g (0=PAL,1=NTSC �� )';
$zmSlangDeviceNumber         = '�f�o�C�X�ԍ� (/dev/video?)';
$zmSlangDimensions           = '���@';
$zmSlangDuration             = '�p������';
$zmSlangEdit                 = '�ҏW';
$zmSlangEmail                = '���[��';
$zmSlangEnabled              = '�g�p�\';
$zmSlangEnterNewFilterName   = '�V�����t�B���^�[���̓���';
$zmSlangErrorBrackets        = '�G���[�A�J�����ʂƕ����ʂ̐��������Ă���̂����m�F���Ă�������';
$zmSlangError                = '�G���[';
$zmSlangErrorValidValue      = '�G���[�A�S�Ă̍��̐��l���L�����ǂ������m�F���Ă�������';
$zmSlangEtc                  = '��';
$zmSlangEvent                = '�C�x���g';
$zmSlangEventFilter          = '�C�x���g �t�B���^�[';
$zmSlangEvents               = '�C�x���g';
$zmSlangExclude              = '�r��';
$zmSlangFeed                 = '���荞��';
$zmSlangFilterPx             = '�t�B���^�[ Px';
$zmSlangFirst                = '�ŏ�';
$zmSlangForceAlarm           = '�����A���[��';
$zmSlangFPS                  = 'fps';
$zmSlangFPSReportInterval    = 'FPS�񍐊Ԋu';
$zmSlangFrame                = '�t���[��';
$zmSlangFrameId              = '�t���[�� ID';
$zmSlangFrameRate            = '�t���[�����[�g';
$zmSlangFrames               = '�t���[��';
$zmSlangFrameSkip            = '�t���[���X�L�b�v';
$zmSlangFTP                  = 'FTP';
$zmSlangFunc                 = '�@�\';
$zmSlangFunction             = '�@�\';
$zmSlangGenerateVideo        = '�r�f�I�̐���';
$zmSlangGeneratingVideo      = '�r�f�I������';
$zmSlangGrey                 = '�O���[';
$zmSlangHighBW               = '���ш�';
$zmSlangHigh                 = '��';
$zmSlangHour                 = '��';
$zmSlangHue                  = '�F��';
$zmSlangId                   = 'ID';
$zmSlangIdle                 = '�ҋ@���';
$zmSlangIgnore               = '����';
$zmSlangImageBufferSize      = '�摜 �o�b�t�@ �T�C�Y';
$zmSlangImage                = '�摜';
$zmSlangInclude              = '�g�ݍ���';
$zmSlangInverted             = '���]';
$zmSlangLanguage             = '����';
$zmSlangLast                 = '�ŏI';
$zmSlangLocal                = '���[�J��';
$zmSlangLoggedInAs           = '���O�C���ς�:';
$zmSlangLoggingIn            = '���O�C����';
$zmSlangLogin                = '���O�C��';
$zmSlangLogout               = '���O�A�E�g';
$zmSlangLowBW                = '��ш�';
$zmSlangLow                  = '��';
$zmSlangMark                 = '�I��';
$zmSlangMaxBrScore           = '�ō�<br/>�X�R�A�[';
$zmSlangMaximumFPS           = '�ō� FPS';
$zmSlangMax                  = '�ō�';
$zmSlangMediumBW             = '���ш�';
$zmSlangMedium               = '��';
$zmSlangMinAlarmGeMinBlob    = '�Œ�A���[���s�N�Z�����Œ�u���u�s�N�Z���������ȏ�łȂ���΂����Ȃ�';
$zmSlangMinAlarmGeMinFilter  = '�Œ�A���[���s�N�Z�����Œ�t�B���^�[�s�N�Z���������ȏ�łȂ���΂����Ȃ�';
$zmSlangMisc                 = '��';
$zmSlangMonitorIds           = '���j�^�[ ID';
$zmSlangMonitor              = '���j�^�[';
$zmSlangMonitors             = '���j�^�[';
$zmSlangMontage              = '�����^�[�W��';
$zmSlangMonth                = '��';
$zmSlangMustBeGe             = '�������ȏ�łȂ���΂����Ȃ�';
$zmSlangMustBeLe             = '�������ȉ��łȂ���΂����Ȃ�';
$zmSlangMustConfirmPassword  = '�p�X���[�h�̊m�F�����Ă�������';
$zmSlangMustSupplyPassword   = '�p�X���[�h����͂��Ă�������';
$zmSlangMustSupplyUsername   = '���[�U������͂��Ă�������';
$zmSlangName                 = '���O';
$zmSlangNetwork              = '�l�b�g���[�N';
$zmSlangNew                  = '�V�K';
$zmSlangNewPassword          = '�V�����p�X���[�h';
$zmSlangNewState             = '�V�K���';	
$zmSlangNewUser              = '�V�������[�U';
$zmSlangNext                 = '��';
$zmSlangNoFramesRecorded     = '���̃C�x���g�̃t���[���͓o�^����Ă��܂���';
$zmSlangNoneAvailable        = '����܂���';
$zmSlangNone                 = '����܂���';
$zmSlangNo                   = '������';
$zmSlangNormal               = '����';
$zmSlangNoSavedFilters       = '�ۑ����ꂽ�t�B���^�[�͂���܂���';
$zmSlangNoStatisticsRecorded = '���̃C�x���g/�t���[���̓��v�͓o�^����Ă��܂���';
$zmSlangOpEq                 = '����';
$zmSlangOpGtEq               = '�������ȏ�';
$zmSlangOpGt                 = '�ȉ�';
$zmSlangOpLtEq               = '�������ȉ�';
$zmSlangOpLt                 = '�ȉ�';
$zmSlangOpNe                 = '�����łȂ�';
$zmSlangOptionHelp           = '�I�v�V���� �w���v';
$zmSlangOptionRestartWarning = '���̕ύX�͋N�������f����Ȃ��ꍇ������܂��B\n�ύX���Ă���ZoneMinder���ċN�����Ă��������B';
$zmSlangOptions              = '�I�v�V����';
$zmSlangOrEnterNewName       = '���͐V�������O����͂��Ă�������';
$zmSlangOrientation          = '�I���I���e�[�V����';
$zmSlangOverwriteExisting    = '�㏑�����܂�';
$zmSlangPaged                = '�y�[�W��';
$zmSlangParameter            = '�p�����[�^';
$zmSlangPassword             = '�p�X���[�h';
$zmSlangPasswordsDifferent   = '�V�����p�X���[�h�ƍē��̓p�X���[�h����v���܂���';
$zmSlangPaths                = '�p�X';
$zmSlangPhoneBW              = '�g�їp';
$zmSlangPixels               = '�s�N�Z��';
$zmSlangPleaseWait           = '���҂���������';
$zmSlangPostEventImageBuffer = '�C�x���g �C���[�W �o�b�t�@��';
$zmSlangPreEventImageBuffer  = '�C�x���g �C���[�W �o�b�t�@�O<';
$zmSlangPrev                 = '�O';
$zmSlangRate                 = '���[�g';
$zmSlangReal                 = '�����p';
$zmSlangRecord               = '�^��';
$zmSlangRefImageBlendPct     = '�C���[�W �u�����h �Q�� %ge';
$zmSlangRefresh              = '�ŐV�̏��ɍX�V';
$zmSlangRemoteHostName       = '�����[�g �z�X�g ��';
$zmSlangRemoteHostPath       = '�����[�g �z�X�g �p�X';
$zmSlangRemoteHostPort       = '�����[�g �z�X�g �|�[�g';
$zmSlangRemoteImageColours   = '�����[�g �C���[�W �J���[';
$zmSlangRemote               = '�����[�g';
$zmSlangRename               = '�V�������O������';
$zmSlangReplay               = '�Đ�';
$zmSlangResetEventCounts     = '�C�x���g �J�E���g ���Z�b�g';
$zmSlangRestarting           = '�ċN����';
$zmSlangRestart              = '�ċN��';
$zmSlangRestrictedCameraIds  = '�������ꂽ�J���� ID';
$zmSlangRotateLeft           = '���ɉ�]';
$zmSlangRotateRight          = '�E�ɉ�]';
$zmSlangRunMode              = '�N�����[�h';
$zmSlangRunning              = '�N����';
$zmSlangRunState             = '�N�����';
$zmSlangSaveAs               = '���O�����ĕۑ�';
$zmSlangSaveFilter           = '�t�B���^�[��ۑ�';
$zmSlangSave                 = '�ۑ�';
$zmSlangScale                = '�X�P�[��';
$zmSlangScore                = '�X�R�A�[';
$zmSlangSecs                 = '�b';
$zmSlangSectionlength        = '����';
$zmSlangServerLoad           = '�T�[�o�[ ���S��';
$zmSlangSetLearnPrefs        = 'Set Learn Prefs'; // �V�����ݒ�̎����ۑ��@This can be ignored for now
$zmSlangSetNewBandwidth      = '�V�����ш敝�̐ݒ�';
$zmSlangSettings             = '�ݒ�';
$zmSlangShowFilterWindow     = '�t�B���^�[ �E�C���h�[�̕\��';
$zmSlangSource               = '�\�[�X';
$zmSlangSourceType           = '�\�[�X �^�C�v';
$zmSlangStart                = '�X�^�[�g';
$zmSlangState                = '���';
$zmSlangStats                = '���v';
$zmSlangStatus               = '���';
$zmSlangStills               = '�X�`�[���摜';
$zmSlangStopped              = '��~���';
$zmSlangStop                 = '��~';
$zmSlangStream               = '�X�g���[��';
$zmSlangSystem               = '�V�X�e��';
$zmSlangTimeDelta            = '�f���^ �^�C��';
$zmSlangTimestampLabelFormat = '�^�C���X�^���v ���x�� �t�H�[�}�b�g';
$zmSlangTimestampLabelX      = '�^�C���X�^���v ���x�� X';
$zmSlangTimestampLabelY      = '�^�C���X�^���v ���x�� Y';
$zmSlangTimestamp            = '�^�C���X�^���v';
$zmSlangTimeStamp            = '�^�C�� �X�^���v';
$zmSlangTime                 = '����';
$zmSlangTools                = '�c�[��';
$zmSlangTotalBrScore         = '���v<br/>�X�R�A�[';
$zmSlangTriggers             = '�g���K�[';
$zmSlangType                 = '�^�C�v';
$zmSlangUnarchive            = '��';
$zmSlangUnits                = '���j�b�g';
$zmSlangUnknown              = '�s��';
$zmSlangUseFilterExprsPost   = '&nbsp;�t�B���^�[��`'; // This is used at the end of the phrase 'use N filter expressions'
$zmSlangUseFilterExprsPre    = '�w�肵�Ă�������:&nbsp;'; // This is used at the beginning of the phrase 'use N filter expressions'
$zmSlangUseFilter            = '�t�B���^�[���g�p���Ă�������';
$zmSlangUsername             = '���[�U��';
$zmSlangUsers                = '���[�U';
$zmSlangUser                 = '���[�U';
$zmSlangValue                = '���l';
$zmSlangVideoGenFailed       = '�r�f�I�����̎��s�I';
$zmSlangVideoGenParms        = '�r�f�I���� �p�����[�^';
$zmSlangVideoSize            = '�r�f�I �T�C�Y';
$zmSlangVideo                = '�r�f�I';
$zmSlangViewAll              = '�S���\��';
$zmSlangViewPaged            = '�y�[�W���̕\��';
$zmSlangView                 = '�\��';
$zmSlangWarmupFrames         = '�E�H�[���A�b�v �t���[��';
$zmSlangWatch                = '����';
$zmSlangWeb                  = '�E�F�u';
$zmSlangWeek                 = '�T';
$zmSlangX10ActivationString  = 'X10�N��������';
$zmSlangX10InputAlarmString  = 'X10���̓A���[��������';
$zmSlangX10OutputAlarmString = 'X10�o�̓A���[��������';
$zmSlangX10                  = 'X10';
$zmSlangYes                  = '�͂�';
$zmSlangYouNoPerms           = '���̎����̃A�N�Z�X��������܂���B';
$zmSlangZoneAlarmColour      = '�A���[�� �J���[ (RGB)';
$zmSlangZoneAlarmThreshold   = '�A���[�� 臒l(0>=?<=255)';
$zmSlangZoneFilterHeight     = '�t�B���^�[ ���� �i�s�N�Z���j';
$zmSlangZoneFilterWidth      = '�t�B���^�[ �� �i�s�N�Z���j';
$zmSlangZoneMaxAlarmedArea   = '�ō��A���[���̈�';
$zmSlangZoneMaxBlobArea      = '�ō��u���u�̈�';
$zmSlangZoneMaxBlobs         = '�ō��u���u��';
$zmSlangZoneMaxFilteredArea  = '�ō��t�B���^�[�̈�';
$zmSlangZoneMaxX             = 'X �i�E�j�ō�';
$zmSlangZoneMaxY             = 'Y �i���j�ō�';
$zmSlangZoneMinAlarmedArea   = '�Œ�A���[���̈�';
$zmSlangZoneMinBlobArea      = '�Œ�u���u�̈�';
$zmSlangZoneMinBlobs         = '�Œ�u���u��';
$zmSlangZoneMinFilteredArea  = '�Œ�t�B���^�[�̈�';
$zmSlangZoneMinX             = 'X �i�E�j�Œ�';
$zmSlangZoneMinY             = 'Y �i���j�Œ�';
$zmSlangZones                = '�]�[��';
$zmSlangZone                 = '�]�[��';

// Complex replacements with formatting and/or placements, must be passed through sprintf
$zmClangCurrentLogin         = '������\'%1$s\�����O�C�����Ă��܂�';
$zmClangEventCount           = '%1$s %2$s';	
$zmClangLastEvents           = '�ŏI %1$s %2$s';
$zmClangMonitorCount         = '%1$s %2$s';
$zmClangMonitorFunction      = '���j�^�[%1$s �@�\';

// Variable arrays expressing plurality
$zmVlangEvent                = array( 0=>'�C�x���g', 1=>'�C�x���g', 2=>'�C�x���g' );
$zmVlangMonitor              = array( 0=>'���j�^�[', 1=>'���j�^�[', 2=>'���j�^�[' );

?>
