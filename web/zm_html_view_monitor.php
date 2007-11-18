<?php
//
// ZoneMinder web monitor view file, $Date$, $Revision$
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

if ( !canView( 'Monitors' ) )
{
	$view = "error";
	return;
}

$tabs = array();
$tabs["general"] = $zmSlangGeneral;
$tabs["source"] = $zmSlangSource;
$tabs["timestamp"] = $zmSlangTimestamp;
$tabs["buffers"] = $zmSlangBuffers;
if ( ZM_OPT_CONTROL && canView( 'Control' ) )
{
	$tabs["control"] = $zmSlangControl;
}
if ( ZM_OPT_X10 )
{
	$tabs["x10"] = $zmSlangX10;
}
$tabs["misc"] = $zmSlangMisc;

if ( !isset($tab) )
	$tab = "general";

if ( !empty($mid) )
{
    $monitor = dbFetchMonitor( $mid );
	if ( ZM_OPT_X10 )
	{
		$x10_monitor = dbFetchOne( "select * from TriggersX10 where MonitorId = '$mid'" );
	}
}
else
{
	$monitor = array();
	$monitor['Name'] = $zmSlangNew;
	$monitor['Function'] = "None";
	$monitor['Enabled'] = true;
	$monitor['Type'] = "Local";
	$monitor['Device'] = "/dev/video";
	$monitor['Channel'] = "0";
	$monitor['Format'] = "0";
	$monitor['Host'] = "";
	$monitor['Path'] = "";
	$monitor['Port'] = "80";
	$monitor['Palette'] = "4";
	$monitor['Width'] = "";
	$monitor['Height'] = "";
	$monitor['Orientation'] = "0";
	$monitor['LabelFormat'] = '%N - %y/%m/%d %H:%M:%S';
	$monitor['LabelX'] = 0;
	$monitor['LabelY'] = 0;
	$monitor['ImageBufferCount'] = 40;
	$monitor['WarmupCount'] = 25;
	$monitor['PreEventCount'] = 10;
	$monitor['PostEventCount'] = 10;
	$monitor['StreamReplayBuffer'] = 1000;
	$monitor['AlarmFrameCount'] = 1;
	$monitor['Controllable'] = 0;
	$monitor['ControlType'] = 0;
	$monitor['ControlDevice'] = "";
	$monitor['ControlAddress'] = "";
	$monitor['AutoStopTimeout'] = "";
	$monitor['TrackMotion'] = 0;
	$monitor['TrackDelay'] = "";
	$monitor['ReturnLocation'] = -1;
	$monitor['ReturnDelay'] = "";
	$monitor['SectionLength'] = 600;
	$monitor['FrameSkip'] = 0;
	$monitor['EventPrefix'] = 'Event-';
	$monitor['MaxFPS'] = "";
	$monitor['AlarmMaxFPS'] = "";
	$monitor['FPSReportInterval'] = 1000;
	$monitor['RefBlendPerc'] = 7;
	$monitor['DefaultView'] = 'Events';
	$monitor['DefaultRate'] = '100';
	$monitor['DefaultScale'] = '100';
	$monitor['SignalCheckColour'] = '#0100BE';
	$monitor['WebColour'] = 'red';
	$monitor['Triggers'] = "";
}
if ( !isset( $new_monitor ) )
{
	$new_monitor = $monitor;
	$new_monitor['Triggers'] = split( ',', isset($monitor['Triggers'])?$monitor['Triggers']:"" );
	$new_x10_monitor = isset($x10_monitor)?$x10_monitor:array();
}
if ( !empty($preset) )
{
	$preset = dbFetchOne( "select Type, Device, Channel, Format, Host, Port, Path, Width, Height, Palette, MaxFPS, Controllable, ControlId, ControlDevice, ControlAddress, DefaultRate, DefaultScale from MonitorPresets where Id = '$preset'" );
	foreach ( $preset as $name=>$value )
	{
		if ( isset($value) )
		{
			$new_monitor[$name] = $value;
		}
	}
}

$device_formats = array( "PAL"=>0, "NTSC"=>1, "SECAM"=>2, "AUTO"=>3, "FMT4"=>4, "FMT5"=>5, "FMT6"=>6, "FMT7"=>7 );
$device_channels = array();
for ( $i = 0; $i <= 15; $i++ )
    $device_channels["$i"] = $i;
$local_palettes = array( $zmSlangGrey=>1, "RGB24"=>4, "RGB565"=>3, "RGB555"=>6, "YUV422"=>7, "YUYV"=>8, "YUV422P"=>13, "YUV420P"=>15 );
$remote_palettes = $file_palettes = array( $zmSlang8BitGrey=>1, $zmSlang24BitColour=>4 );
$orientations = array( $zmSlangNormal=>'0', $zmSlangRotateRight=>'90', $zmSlangInverted=>'180', $zmSlangRotateLeft=>'270', $zmSlangFlippedHori=>'hori', $zmSlangFlippedVert=>'vert' );

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?= ZM_WEB_TITLE_PREFIX ?> - <?= $zmSlangMonitor ?> - <?= $monitor['Name'] ?></title>
<link rel="stylesheet" href="zm_html_styles.css" type="text/css">
<script type="text/javascript">
<?php
if ( !empty($refresh_parent) )
{
?>
opener.location.reload(true);
<?php
}
?>
window.focus();
function validateForm(form)
{
	var errors = new Array();

	if ( form.elements['new_monitor[Name]'].value.search( /[^\w-]/ ) >= 0 )
	{
		errors[errors.length] = "<?= $zmSlangBadNameChars ?>";
	}
	if ( form.elements['new_monitor[MaxFPS]'].value && !(parseFloat(form.elements['new_monitor[MaxFPS]'].value) > 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadMaxFPS ?>";
	}
	if ( form.elements['new_monitor[AlarmMaxFPS]'].value && !(parseFloat(form.elements['new_monitor[AlarmMaxFPS]'].value) > 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadAlarmMaxFPS ?>";
	}
	if ( !form.elements['new_monitor[RefBlendPerc]'].value || !(parseInt(form.elements['new_monitor[RefBlendPerc]'].value) > 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadRefBlendPerc ?>";
	}
	if ( form.elements['new_monitor[Type]'].value == 'Local' )
	{
		if ( !form.elements['new_monitor[Device]'].value )
		{
			errors[errors.length] = "<?= $zmSlangBadDevice ?>";
		}
		if ( !form.elements['new_monitor[Channel]'].value || !form.elements['new_monitor[Channel]'].value.match( /^\d+$/ ) )
		{
			errors[errors.length] = "<?= $zmSlangBadChannel ?>";
		}
		if ( !form.elements['new_monitor[Format]'].value || !form.elements['new_monitor[Format]'].value.match( /^\d+$/ ) )
		{
			errors[errors.length] = "<?= $zmSlangBadFormat ?>";
		}
	}
	else if ( form.elements['new_monitor[Type]'].value == 'Remote' )
	{
		if ( !form.elements['new_monitor[Host]'].value || !form.elements['new_monitor[Host]'].value.match( /^[0-9a-zA-Z_.:@-]+$/ ) )
		{
			errors[errors.length] = "<?= $zmSlangBadHost ?>";
		}
		if ( form.elements['new_monitor[Port]'].value && !form.elements['new_monitor[Port]'].value.match( /^\d+$/ ) )
		{
			errors[errors.length] = "<?= $zmSlangBadPort ?>";
		}
		if ( !form.elements['new_monitor[Path]'].value )
		{
			errors[errors.length] = "<?= $zmSlangBadPath ?>";
		}
	}
	else if ( form.elements['new_monitor[Type]'].value == 'File' )
	{
		if ( !form.elements['new_monitor[Path]'].value )
		{
			errors[errors.length] = "<?= $zmSlangBadPath ?>";
		}
	}
	if ( !form.elements['new_monitor[Width]'].value || !(parseInt(form.elements['new_monitor[Width]'].value) > 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadWidth ?>";
	}
	if ( !form.elements['new_monitor[Height]'].value || !(parseInt(form.elements['new_monitor[Height]'].value) > 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadHeight ?>";
	}
	if ( !form.elements['new_monitor[LabelX]'].value || !(parseInt(form.elements['new_monitor[LabelX]'].value) >= 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadLabelX ?>";
	}
	if ( !form.elements['new_monitor[LabelY]'].value || !(parseInt(form.elements['new_monitor[LabelY]'].value) >= 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadLabelY ?>";
	}
	if ( !form.elements['new_monitor[ImageBufferCount]'].value || !(parseInt(form.elements['new_monitor[ImageBufferCount]'].value) >= 10 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadImageBufferCount ?>";
	}
	if ( !form.elements['new_monitor[WarmupCount]'].value || !(parseInt(form.elements['new_monitor[WarmupCount]'].value) >= 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadWarmupCount ?>";
	}
	if ( !form.elements['new_monitor[PreEventCount]'].value || !(parseInt(form.elements['new_monitor[PreEventCount]'].value) > 0 ) || (parseInt(form.elements['new_monitor[PreEventCount]'].value) > parseInt(form.elements['new_monitor[ImageBufferCount]'].value)) )
	{
		errors[errors.length] = "<?= $zmSlangBadPreEventCount ?>";
	}
	if ( !form.elements['new_monitor[PostEventCount]'].value || !(parseInt(form.elements['new_monitor[PostEventCount]'].value) >= 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadPostEventCount ?>";
	}
	if ( !form.elements['new_monitor[StreamReplayBuffer]'].value || !(parseInt(form.elements['new_monitor[StreamReplayBuffer]'].value) >= 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadStreamReplayBuffer ?>";
	}
	if ( !form.elements['new_monitor[AlarmFrameCount]'].value || !(parseInt(form.elements['new_monitor[AlarmFrameCount]'].value) > 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadAlarmFrameCount ?>";
	}
	if ( !form.elements['new_monitor[SectionLength]'].value || !(parseInt(form.elements['new_monitor[SectionLength]'].value) >= 30 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadSectionLength ?>";
	}
	if ( !form.elements['new_monitor[FPSReportInterval]'].value || !(parseInt(form.elements['new_monitor[FPSReportInterval]'].value) >= 100 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadFPSReportInterval ?>";
	}
	if ( !form.elements['new_monitor[FrameSkip]'].value || !(parseInt(form.elements['new_monitor[FrameSkip]'].value) >= 0 ) )
	{
		errors[errors.length] = "<?= $zmSlangBadFrameSkip ?>";
	}
	if ( form.elements['new_monitor[Type]'].value == 'Local' )
	{
	    if ( !form.elements['new_monitor[SignalCheckColour]'].value || !form.elements['new_monitor[SignalCheckColour]'].value.match( /^[#0-9a-zA-Z]+$/ ) )
	    {
		    errors[errors.length] = "<?= $zmSlangBadSignalCheckColour ?>";
	    }
    }
	if ( !form.elements['new_monitor[WebColour]'].value || !form.elements['new_monitor[WebColour]'].value.match( /^[#0-9a-zA-Z]+$/ ) )
	{
		errors[errors.length] = "<?= $zmSlangBadWebColour ?>";
	}
	if ( errors.length )
	{
		alert( errors.join( "\n" ) );
		return( false );
	}
	return( true );
}

function submitTab(form,tab)
{
	form.action.value = "";
	form.tab.value = tab;
	form.submit();
}

function selectLinkedMonitors()
{
	newWindow( "<?= $PHP_SELF ?>?view=monitorselect&callForm=<?= urlencode( 'monitor_form' ) ?>&callField=<?= urlencode( 'new_monitor[LinkedMonitors]' ) ?>", "zmLinkedMonitors", <?= $jws['monitorselect']['w'] ?>, <?= $jws['monitorselect']['h'] ?> );
}

function newWindow(Url,Name,Width,Height)
{
	var Win = window.open(Url,Name,"resizable,width="+Width+",height="+Height);
}

function closeWindow()
{
	window.close();
}

<?php
if ( ZM_OPT_CONTROL && $tab == 'control' )
{
?>
function loadLocations( form )
{
	var controlIdSelect = form.elements['new_monitor[ControlId]'];
	var returnLocationSelect = form.elements['new_monitor[ReturnLocation]'];

	returnLocationSelect.options[option_count++] = new Option( '<?= $zmSlangNone ?>', -1 );
	if ( controlIdSelect.selectedIndex )
	{
		var option_count = 1;
<?php
	$sql = "select * from Controls where Type = '".$monitor['Type']."'";
	$control_types = array( ''=>$zmSlangNone );
    foreach( dbFetchAll( $sql ) as $row )
	{
		$control_types[$row['Id']] = $row['Name'];
?>
		if ( controlIdSelect.selectedIndex > 0 )
		{
			if ( controlIdSelect.options[controlIdSelect.selectedIndex].value == <?= $row['Id'] ?> )
			{
<?php
		if ( $row['HasHomePreset'] )
		{
?>
				returnLocationSelect.options[option_count++] = new Option( '<?= $zmSlangHome ?>', 0 );
<?php
		}
		for ( $i = 1; $i <= $row['NumPresets']; $i++ )
		{
?>
				returnLocationSelect.options[option_count++] = new Option( '<?= $zmSlangPreset.' '.$i ?>', <?= $i ?> );
<?php
		}
?>
			}
		}
		returnLocationSelect.options.length = option_count;
<?php
	}
?>
	}
	else
	{
		returnLocationSelect.options.length = 1;
	}
}
<?php
}
?>
</script>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" class="head"><?= $zmSlangMonitor ?> - <?= $monitor['Name'] ?></td>
<td align="right" valign="bottom" class="text"><?= makeLink( "javascript:newWindow( '$PHP_SELF?view=monitorpreset&mid=$mid', 'zmMonitorPreset$mid', ".$jws['monitorpreset']['w'].", ".$jws['monitorpreset']['h']." );", $zmSlangPresets, canEdit( 'Monitors' ) ) ?></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
<?php
foreach ( $tabs as $name=>$value )
{
	if ( $tab == $name )
	{
?>
<td width="10" class="activetab"><?= $value ?></td>
<?php
	}
	else
	{
?>
<td width="10" class="passivetab"><a href="javascript: submitTab( document.monitor_form, '<?= $name ?>' );"><?= $value ?></a></td>
<?php
	}
}
?>
<td class="nontab">&nbsp;</td>
</tr>
</table>
<table border="0" cellspacing="0" cellpadding="2" width="100%">
<form name="monitor_form" method="post" action="<?= $PHP_SELF ?>" onsubmit="return validateForm( document.monitor_form )">
<input type="hidden" name="view" value="<?= $view ?>">
<input type="hidden" name="tab" value="<?= $tab ?>">
<input type="hidden" name="action" value="monitor">
<input type="hidden" name="mid" value="<?= $mid ?>">
<?php
if ( $tab != 'general' )
{
?>
<input type="hidden" name="new_monitor[Name]" value="<?= $new_monitor['Name'] ?>">
<input Type="hidden" name="new_monitor[Type]" value="<?= $new_monitor['Type'] ?>">
<input type="hidden" name="new_monitor[Function]" value="<?= $new_monitor['Function'] ?>">
<input type="hidden" name="new_monitor[Enabled]" value="<?= $new_monitor['Enabled'] ?>">
<input type="hidden" name="new_monitor[LinkedMonitors]" value="<?= $new_monitor['LinkedMonitors'] ?>">
<input type="hidden" name="new_monitor[RefBlendPerc]" value="<?= $new_monitor['RefBlendPerc'] ?>">
<input type="hidden" name="new_monitor[MaxFPS]" value="<?= $new_monitor['MaxFPS'] ?>">
<input type="hidden" name="new_monitor[AlarmMaxFPS]" value="<?= $new_monitor['AlarmMaxFPS'] ?>">
<?php
	if ( isset($new_monitor['Triggers']) )
	{
		foreach( $new_monitor['Triggers'] as $new_trigger )
		{
?>
<input type="hidden" name="new_monitor[Triggers][]" value="<?= $new_trigger ?>">
<?php
		}
	}
}
if ( $tab != 'source' || $new_monitor['Type'] != 'Local' )
{
?>
<input type="hidden" name="new_monitor[Device]" value="<?= $new_monitor['Device'] ?>">
<input type="hidden" name="new_monitor[Channel]" value="<?= $new_monitor['Channel'] ?>">
<input type="hidden" name="new_monitor[Format]" value="<?= $new_monitor['Format'] ?>">
<?php
}
if ( $tab != 'source' || $new_monitor['Type'] != 'Remote' )
{
?>
<input type="hidden" name="new_monitor[Host]" value="<?= $new_monitor['Host'] ?>">
<input type="hidden" name="new_monitor[Port]" value="<?= $new_monitor['Port'] ?>">
<?php
}
if ( $tab != 'source' || ($new_monitor['Type'] != 'Remote' && $new_monitor['Type'] != 'File') )
{
?>
<input type="hidden" name="new_monitor[Path]" value="<?= $new_monitor['Path'] ?>">
<?php
}
if ( $tab != 'source' )
{
?>
<input type="hidden" name="new_monitor[Palette]" value="<?= $new_monitor['Palette'] ?>">
<input type="hidden" name="new_monitor[Width]" value="<?= $new_monitor['Width'] ?>">
<input type="hidden" name="new_monitor[Height]" value="<?= $new_monitor['Height'] ?>">
<input type="hidden" name="new_monitor[Orientation]" value="<?= $new_monitor['Orientation'] ?>">
<?php
}
if ( $tab != 'timestamp' )
{
?>
<input type="hidden" name="new_monitor[LabelFormat]" value="<?= $new_monitor['LabelFormat'] ?>">
<input type="hidden" name="new_monitor[LabelX]" value="<?= $new_monitor['LabelX'] ?>">
<input type="hidden" name="new_monitor[LabelY]" value="<?= $new_monitor['LabelY'] ?>">
<?php
}
if ( $tab != 'buffers' )
{
?>
<input type="hidden" name="new_monitor[ImageBufferCount]" value="<?= $new_monitor['ImageBufferCount'] ?>">
<input type="hidden" name="new_monitor[WarmupCount]" value="<?= $new_monitor['WarmupCount'] ?>">
<input type="hidden" name="new_monitor[PreEventCount]" value="<?= $new_monitor['PreEventCount'] ?>">
<input type="hidden" name="new_monitor[PostEventCount]" value="<?= $new_monitor['PostEventCount'] ?>">
<input type="hidden" name="new_monitor[StreamReplayBuffer]" value="<?= $new_monitor['StreamReplayBuffer'] ?>">
<input type="hidden" name="new_monitor[AlarmFrameCount]" value="<?= $new_monitor['AlarmFrameCount'] ?>">
<?php
}
if ( ZM_OPT_CONTROL && $tab != 'control' )
{
?>
<input type="hidden" name="new_monitor[Controllable]" value="<?= $new_monitor['Controllable'] ?>">
<input type="hidden" name="new_monitor[ControlId]" value="<?= $new_monitor['ControlId'] ?>">
<input type="hidden" name="new_monitor[ControlDevice]" value="<?= $new_monitor['ControlDevice'] ?>">
<input type="hidden" name="new_monitor[ControlAddress]" value="<?= $new_monitor['ControlAddress'] ?>">
<input type="hidden" name="new_monitor[AutoStopTimeout]" value="<?= $new_monitor['AutoStopTimeout'] ?>">
<input type="hidden" name="new_monitor[TrackMotion]" value="<?= $new_monitor['TrackMotion'] ?>">
<input type="hidden" name="new_monitor[TrackDelay]" value="<?= $new_monitor['TrackDelay'] ?>">
<input type="hidden" name="new_monitor[ReturnLocation]" value="<?= $new_monitor['ReturnLocation'] ?>">
<input type="hidden" name="new_monitor[ReturnDelay]" value="<?= $new_monitor['ReturnDelay'] ?>">
<?php
}
if ( ZM_OPT_X10 && $tab != 'x10' )
{
?>
<input type="hidden" name="new_x10_monitor[Activation]" value="<?= $new_x10_monitor['Activation'] ?>">
<input type="hidden" name="new_x10_monitor[AlarmInput]" value="<?= $new_x10_monitor['AlarmInput'] ?>">
<input type="hidden" name="new_x10_monitor[AlarmOutput]" value="<?= $new_x10_monitor['AlarmOutput'] ?>">
<?php
}
if ( $tab != 'misc' )
{
?>
<input type="hidden" name="new_monitor[EventPrefix]" value="<?= $new_monitor['EventPrefix'] ?>">
<input type="hidden" name="new_monitor[SectionLength]" value="<?= $new_monitor['SectionLength'] ?>">
<input type="hidden" name="new_monitor[FrameSkip]" value="<?= $new_monitor['FrameSkip'] ?>">
<input type="hidden" name="new_monitor[FPSReportInterval]" value="<?= $new_monitor['FPSReportInterval'] ?>">
<input type="hidden" name="new_monitor[DefaultView]" value="<?= $new_monitor['DefaultView'] ?>">
<input type="hidden" name="new_monitor[DefaultRate]" value="<?= $new_monitor['DefaultRate'] ?>">
<input type="hidden" name="new_monitor[DefaultScale]" value="<?= $new_monitor['DefaultScale'] ?>">
<input type="hidden" name="new_monitor[WebColour]" value="<?= $new_monitor['WebColour'] ?>">
<?php
}
if ( $tab != 'misc' || $new_monitor['Type'] != 'Local' )
{
?>
<input type="hidden" name="new_monitor[SignalCheckColour]" value="<?= $new_monitor['SignalCheckColour'] ?>">
<?php
}
?>
<tr>
<td align="left" class="smallhead" width="50%"><?= $zmSlangParameter ?></td><td align="left" class="smallhead" width="50%"><?= $zmSlangValue ?></td>
</tr>
<?php
switch ( $tab )
{
	case 'general' :
	{
?>
<tr><td align="left" class="text"><?= $zmSlangName ?></td><td align="left" class="text"><input type="text" name="new_monitor[Name]" value="<?= $new_monitor['Name'] ?>" size="16" class="form"></td></tr>
<?php
		$select_name = "new_monitor[Type]";
		$source_types = array(
			'Local'=>$zmSlangLocal,
			'Remote'=>$zmSlangRemote,
			'File'=>$zmSlangFile
		);
?>
<tr><td align="left" class="text"><?= $zmSlangSourceType ?></td><td><?= buildSelect( $select_name, $source_types ); ?></td></tr>
<tr><td align="left" class="text"><?= $zmSlangFunction ?></td><td align="left" class="text"><select name="new_monitor[Function]" class="form">
<?php
		foreach ( getEnumValues( 'Monitors', 'Function' ) as $opt_function )
		{
?>
<option value="<?= $opt_function ?>"<?php if ( $opt_function == $new_monitor['Function'] ) { ?> selected<?php } ?>><?= $opt_function ?></option>
<?php
		}
?>
</select></td></tr>
<tr><td align="left" class="text"><?= $zmSlangEnabled ?></td><td align="left" class="text"><input type="checkbox" name="new_monitor[Enabled]" value="1" class="form-noborder"<?php if ( !empty($new_monitor['Enabled']) ) { ?> checked<?php } ?>></td></tr>
<tr><td align="left" class="text"><?= $zmSlangLinkedMonitors ?></td><td align="left" class="text"><input type="text" name="new_monitor[LinkedMonitors]" value="<?= $new_monitor['LinkedMonitors'] ?>" size="16" class="form">&nbsp;<a href="#" onClick="selectLinkedMonitors()"><?= $zmSlangSelect ?></a></td></tr>
<tr><td align="left" class="text"><?= $zmSlangMaximumFPS ?></td><td align="left" class="text"><input type="text" name="new_monitor[MaxFPS]" value="<?= $new_monitor['MaxFPS'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangAlarmMaximumFPS ?></td><td align="left" class="text"><input type="text" name="new_monitor[AlarmMaxFPS]" value="<?= $new_monitor['AlarmMaxFPS'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangRefImageBlendPct ?></td><td align="left" class="text"><input type="text" name="new_monitor[RefBlendPerc]" value="<?= $new_monitor['RefBlendPerc'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangTriggers ?></td><td align="left" class="text">
<?php
		$opt_triggers = getSetValues( 'Monitors', 'Triggers' );
		$break_count = (int)(ceil(count($opt_triggers)));
		$break_count = min( 3, $break_count );
		$opt_count = 0;
		foreach( $opt_triggers as $opt_trigger )
		{
			if ( !ZM_OPT_X10 && $opt_trigger == 'X10' )
				continue;
			if ( $opt_count && ($opt_count%$break_count == 0) )
				echo "</br>";
?>
<input type="checkbox" name="new_monitor[Triggers][]" value="<?= $opt_trigger ?>" class="form-noborder"<?php if ( isset($new_monitor['Triggers']) && in_array( $opt_trigger, $new_monitor['Triggers'] ) ) { ?> checked<?php } ?>><?= $opt_trigger ?>
<?php
			$opt_count ++;
		}
		if ( !$opt_count )
		{
?>
<em><?= $zmSlangNoneAvailable ?></em>
<?php
		}
?>
</td></tr>
<?php
		break;
	}
	case 'source' :
	{
		if ( $new_monitor['Type'] == "Local" )
		{
?>
<tr><td align="left" class="text"><?= $zmSlangDevicePath ?></td><td align="left" class="text"><input type="text" name="new_monitor[Device]" value="<?= $new_monitor['Device'] ?>" size="24" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangDeviceChannel ?></td><td align="left" class="text"><select name="new_monitor[Channel]" class="form"><?php foreach ( $device_channels as $name => $value ) { ?><option value="<?= $value ?>"<?php if ( $value == $new_monitor['Channel'] ) { ?> selected<?php } ?>><?= $name ?></option><?php } ?></select></td></tr>
<tr><td align="left" class="text"><?= $zmSlangDeviceFormat ?></td><td align="left" class="text"><select name="new_monitor[Format]" class="form"><?php foreach ( $device_formats as $name => $value ) { ?><option value="<?= $value ?>"<?php if ( $value == $new_monitor['Format'] ) { ?> selected<?php } ?>><?= $name ?></option><?php } ?></select></td></tr>
<tr><td align="left" class="text"><?= $zmSlangCapturePalette ?></td><td align="left" class="text"><select name="new_monitor[Palette]" class="form"><?php foreach ( $local_palettes as $name => $value ) { ?><option value="<?= $value ?>"<?php if ( $value == $new_monitor['Palette'] ) { ?> selected<?php } ?>><?= $name ?></option><?php } ?></select></td></tr>
<?php
		}
		elseif ( $new_monitor['Type'] == "Remote" )
		{
?>
<tr><td align="left" class="text"><?= $zmSlangRemoteHostName ?></td><td align="left" class="text"><input type="text" name="new_monitor[Host]" value="<?= $new_monitor['Host'] ?>" size="36" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangRemoteHostPort ?></td><td align="left" class="text"><input type="text" name="new_monitor[Port]" value="<?= $new_monitor['Port'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangRemoteHostPath ?></td><td align="left" class="text"><input type="text" name="new_monitor[Path]" value="<?= $new_monitor['Path'] ?>" size="36" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangRemoteImageColours ?></td><td align="left" class="text"><select name="new_monitor[Palette]" class="form"><?php foreach ( $remote_palettes as $name => $value ) { ?><option value="<?= $value ?>"<?php if ( $value == $new_monitor['Palette'] ) { ?> selected<?php } ?>><?= $name ?></option><?php } ?></select></td></tr>
<?php
		}
		elseif ( $new_monitor['Type'] == "File" )
		{
?>
<tr><td align="left" class="text"><?= $zmSlangFilePath ?></td><td align="left" class="text"><input type="text" name="new_monitor[Path]" value="<?= $new_monitor['Path'] ?>" size="36" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangFileColours ?></td><td align="left" class="text"><select name="new_monitor[Palette]" class="form"><?php foreach ( $file_palettes as $name => $value ) { ?><option value="<?= $value ?>"<?php if ( $value == $new_monitor['Palette'] ) { ?> selected<?php } ?>><?= $name ?></option><?php } ?></select></td></tr>
<?php
		}
?>
<tr><td align="left" class="text"><?= $zmSlangCaptureWidth ?> (<?= $zmSlangPixels ?>)</td><td align="left" class="text"><input type="text" name="new_monitor[Width]" value="<?= $new_monitor['Width'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangCaptureHeight ?> (<?= $zmSlangPixels ?>)</td><td align="left" class="text"><input type="text" name="new_monitor[Height]" value="<?= $new_monitor['Height'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangOrientation ?></td><td align="left" class="text"><select name="new_monitor[Orientation]" class="form"><?php foreach ( $orientations as $name => $value ) { ?><option value="<?= $value ?>"<?php if ( $value == $new_monitor['Orientation'] ) { ?> selected<?php } ?>><?= $name ?></option><?php } ?></select></td></tr>
<?php
		break;
	}
	case 'timestamp' :
	{
?>
<tr><td align="left" class="text"><?= $zmSlangTimestampLabelFormat ?></td><td align="left" class="text"><input type="text" name="new_monitor[LabelFormat]" value="<?= $new_monitor['LabelFormat'] ?>" size="32" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangTimestampLabelX ?></td><td align="left" class="text"><input type="text" name="new_monitor[LabelX]" value="<?= $new_monitor['LabelX'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangTimestampLabelY ?></td><td align="left" class="text"><input type="text" name="new_monitor[LabelY]" value="<?= $new_monitor['LabelY'] ?>" size="4" class="form"></td></tr>
<?php
		break;
	}
	case 'buffers' :
	{
?>
<tr><td align="left" class="text"><?= $zmSlangImageBufferSize ?></td><td align="left" class="text"><input type="text" name="new_monitor[ImageBufferCount]" value="<?= $new_monitor['ImageBufferCount'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangWarmupFrames ?></td><td align="left" class="text"><input type="text" name="new_monitor[WarmupCount]" value="<?= $new_monitor['WarmupCount'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangPreEventImageBuffer ?></td><td align="left" class="text"><input type="text" name="new_monitor[PreEventCount]" value="<?= $new_monitor['PreEventCount'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangPostEventImageBuffer ?></td><td align="left" class="text"><input type="text" name="new_monitor[PostEventCount]" value="<?= $new_monitor['PostEventCount'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangStreamReplayBuffer ?></td><td align="left" class="text"><input type="text" name="new_monitor[StreamReplayBuffer]" value="<?= $new_monitor['StreamReplayBuffer'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangAlarmFrameCount ?></td><td align="left" class="text"><input type="text" name="new_monitor[AlarmFrameCount]" value="<?= $new_monitor['AlarmFrameCount'] ?>" size="4" class="form"></td></tr>
<?php
		break;
	}
	case 'control' :
	{
?>
<tr><td align="left" class="text"><?= $zmSlangControllable ?></td><td align="left" class="text"><input type="checkbox" name="new_monitor[Controllable]" value="1" class="form-noborder"<?php if ( !empty($new_monitor['Controllable']) ) { ?> checked<?php } ?>></td></tr>
<tr><td align="left" class="text"><?= $zmSlangControlType ?></td><td class="text"><?= buildSelect( "new_monitor[ControlId]", $control_types, 'loadLocations( document.monitor_form )' ); ?><?php if ( canEdit( 'Control' ) ) { ?>&nbsp;<a href="javascript: newWindow( '<?= $PHP_SELF ?>?view=controlcaps', 'zmControlCaps', <?= $jws['controlcaps']['w'] ?>, <?= $jws['controlcaps']['h'] ?> );"><?= $zmSlangEdit ?></a><?php } ?></td></tr>
<tr><td align="left" class="text"><?= $zmSlangControlDevice ?></td><td align="left" class="text"><input type="text" name="new_monitor[ControlDevice]" value="<?= $new_monitor['ControlDevice'] ?>" size="32" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangControlAddress ?></td><td align="left" class="text"><input type="text" name="new_monitor[ControlAddress]" value="<?= $new_monitor['ControlAddress'] ?>" size="32" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangAutoStopTimeout ?></td><td align="left" class="text"><input type="text" name="new_monitor[AutoStopTimeout]" value="<?= $new_monitor['AutoStopTimeout'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangTrackMotion ?></td><td align="left" class="text"><input type="checkbox" name="new_monitor[TrackMotion]" value="1" class="form-noborder"<?php if ( !empty($new_monitor['TrackMotion']) ) { ?> checked<?php } ?>></td></tr>
<?php
		$return_options = array(
			'-1' => $zmSlangNone,
			'0' => $zmSlangHome,
			'1' => $zmSlangPreset." 1",
		);
?>
<tr><td align="left" class="text"><?= $zmSlangTrackDelay ?></td><td align="left" class="text"><input type="text" name="new_monitor[TrackDelay]" value="<?= $new_monitor['TrackDelay'] ?>" size="4" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangReturnLocation ?></td><td><?= buildSelect( "new_monitor[ReturnLocation]", $return_options ); ?></td></tr>
<tr><td align="left" class="text"><?= $zmSlangReturnDelay ?></td><td align="left" class="text"><input type="text" name="new_monitor[ReturnDelay]" value="<?= $new_monitor['ReturnDelay'] ?>" size="4" class="form"></td></tr>
<?php
		break;
	}
	case 'x10' :
	{
?>
<tr><td align="left" class="text"><?= $zmSlangX10ActivationString ?></td><td align="left" class="text"><input type="text" name="new_x10_monitor[Activation]" value="<?= $new_x10_monitor['Activation'] ?>" size="20" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangX10InputAlarmString ?></td><td align="left" class="text"><input type="text" name="new_x10_monitor[AlarmInput]" value="<?= $new_x10_monitor['AlarmInput'] ?>" size="20" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangX10OutputAlarmString ?></td><td align="left" class="text"><input type="text" name="new_x10_monitor[AlarmOutput]" value="<?= $new_x10_monitor['AlarmOutput'] ?>" size="20" class="form"></td></tr>
<?php
		break;
	}
	case 'misc' :
	{
?>
<tr><td align="left" class="text"><?= $zmSlangEventPrefix ?></td><td align="left" class="text"><input type="text" name="new_monitor[EventPrefix]" value="<?= $new_monitor['EventPrefix'] ?>" size="24" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangSectionlength ?></td><td align="left" class="text"><input type="text" name="new_monitor[SectionLength]" value="<?= $new_monitor['SectionLength'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangFrameSkip ?></td><td align="left" class="text"><input type="text" name="new_monitor[FrameSkip]" value="<?= $new_monitor['FrameSkip'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangFPSReportInterval ?></td><td align="left" class="text"><input type="text" name="new_monitor[FPSReportInterval]" value="<?= $new_monitor['FPSReportInterval'] ?>" size="6" class="form"></td></tr>
<tr><td align="left" class="text"><?= $zmSlangDefaultView ?></td><td align="left" class="text"><select name="new_monitor[DefaultView]" class="form">
<?php
		foreach ( getEnumValues( 'Monitors', 'DefaultView' ) as $opt_view )
		{
          if ( $opt_view == 'Control' && ( !ZM_OPT_CONTROL || !$monitor['Controllable'] ) )
            continue;
?>
<option value="<?= $opt_view ?>"<?php if ( $opt_view == $new_monitor['DefaultView'] ) { ?> selected<?php } ?>><?= $opt_view ?></option>
<?php
		}
?>
</select></td></tr>
<tr><td align="left" class="text"><?= $zmSlangDefaultRate ?></td><td align="left" class="text"><?= buildSelect( "new_monitor[DefaultRate]", $rates ); ?></td></tr>
<tr><td align="left" class="text"><?= $zmSlangDefaultScale ?></td><td align="left" class="text"><?= buildSelect( "new_monitor[DefaultScale]", $scales ); ?></td></tr>
<?php
		if ( $new_monitor['Type'] == "Local" )
		{
?>
<tr><td align="left" class="text"><?= $zmSlangSignalCheckColour ?></td><td align="left" class="text"><input type="text" name="new_monitor[SignalCheckColour]" value="<?= $new_monitor['SignalCheckColour'] ?>" size="10" class="form" onChange="document.getElementById('SignalCheckSwatch').style.backgroundColor=this.value">&nbsp;&nbsp;<span id="SignalCheckSwatch" style="background-color: <?= $new_monitor['SignalCheckColour'] ?>; border: 1px solid black; width: 20px; height: 10px; padding: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></td></tr>
<?php
        }
?>
<tr><td align="left" class="text"><?= $zmSlangWebColour ?></td><td align="left" class="text"><input type="text" name="new_monitor[WebColour]" value="<?= $new_monitor['WebColour'] ?>" size="10" class="form" onChange="document.getElementById('WebSwatch').style.backgroundColor=this.value">&nbsp;&nbsp;<span id="WebSwatch" style="background-color: <?= $new_monitor['WebColour'] ?>; border: 1px solid black; width: 20px; height: 10px; padding: 0px;">&nbsp;&nbsp;&nbsp;&nbsp;</span></td></tr>
<?php
		break;
	}
}
?>
<tr><td colspan="2" align="left" class="text">&nbsp;</td></tr>
<tr style="height: 100%; vertical-align: bottom;">
<td colspan="2" align="right"><input type="submit" value="<?= $zmSlangSave ?>" class="form"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>>&nbsp;&nbsp;<input type="button" value="<?= $zmSlangCancel ?>" class="form" onClick="closeWindow()"></td>
</tr>
</table>
</form>
</body>
</html>
