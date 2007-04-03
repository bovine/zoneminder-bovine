<?php
//
// ZoneMinder web watch status view file, $Date$, $Revision$
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

if ( !canView( 'Stream' ) )
{
	$view = "error";
	return;
}

$zmu_command = getZmuCommand( " -m $mid -s -f" );
if ( canEdit( 'Monitors' ) )
{
	if ( isset($force) )
	{
		$zmu_command .= ($force?" -a":" -c"); 
	}
	elseif ( isset($disable) )
	{
		$zmu_command .= ($disable?" -n":" -c"); 
	}
}

$zmu_output = exec( escapeshellcmd( $zmu_command ) );
list( $status, $fps ) = split( ' ', $zmu_output );
$status_string = $zmSlangUnknown;
$fps_string = "--.--";
$class = "text";
if ( $status <= STATE_PREALARM )
{
	$status_string = $zmSlangIdle;
}
elseif ( $status == STATE_ALARM )
{
	$status_string = $zmSlangAlarm;
	$class = "redtext";
}
elseif ( $status == STATE_ALERT )
{
	$status_string = $zmSlangAlert;
	$class = "ambtext";
}
elseif ( $status == STATE_TAPE )
{
	$status_string = $zmSlangRecord;
}
$fps_string = sprintf( "%.2f", $fps );

$is_alarmed = ( $status == STATE_ALARM || $status == STATE_ALERT );
$was_alarmed = ( $last_status == STATE_ALARM || $last_status == STATE_ALERT );

$new_alarm = ( $is_alarmed && !$was_alarmed );
$old_alarm = ( !$is_alarmed && $was_alarmed );


$refresh = (isset($force)||$forced||isset($disable)||$disabled||(($status>=STATE_PREALARM)&&($status<=STATE_ALERT)))?1:ZM_WEB_REFRESH_STATUS;
$url = "$PHP_SELF?view=watchstatus&mid=$mid&last_status=$status".(($force||$forced)?"&forced=1":"").(($disable||$disabled)?"&disabled=1":"");
if ( ZM_WEB_REFRESH_METHOD == "http" )
	header("Refresh: $refresh; URL=$url" );
noCacheHeaders();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="zm_html_styles.css" type="text/css">
<script type="text/javascript">
<?php
if ( $new_alarm )
{
	if ( ZM_WEB_SOUND_ON_ALARM )
	{
?>
if ( window.parent.Siren<?= $mid ?> != null )
{
	window.parent.Siren<?= $mid ?>.location = '<?= $PHP_SELF ?>?view=siren&mid=<?= $mid ?>';
}
<?php
	}
	if ( ZM_WEB_POPUP_ON_ALARM )
	{
?>
top.window.focus();
<?php
	}
}
if ( $old_alarm )
{
?>
if ( window.parent.Siren<?= $mid ?> != null )
{
	window.parent.Siren<?= $mid ?>.location = '<?= $PHP_SELF ?>?view=blank';
}
if ( window.parent.MonitorEvents<?= $mid ?> != null )
{
	window.parent.MonitorEvents<?= $mid ?>.location.reload(true);
}
<?php
}
if ( ZM_WEB_REFRESH_METHOD == "javascript" )
{
?>
window.setTimeout( "window.location.replace( '<?= $url ?>' )", <?= $refresh*1000 ?> );
<?php
}
?>
</script>
</head>
<body>
<table width="96%" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
<?php
if ( !($force || $forced) )
{
	if ( canEdit( 'Monitors' ) && ($disable || $disabled) )
	{
?>
<td width="25%" align="left" class="text"><a href="<?= $PHP_SELF ?>?view=watchstatus&mid=<?= $mid ?>&last_status=<?= $status ?>&disable=0"><?= $zmSlangEnableAlarms ?></a></td>
<?php
	}
	elseif ( canEdit( 'Monitors' ) && zmaCheck( $mid ) )
	{
?>
<td width="25%" align="left" class="text"><a href="<?= $PHP_SELF ?>?view=watchstatus&mid=<?= $mid ?>&last_status=<?= $status ?>&disable=1"><?= $zmSlangDisableAlarms ?></a></td>
<?php
	}
}
else
{
?>
<td width="25%" align="left" class="text">&nbsp;</td>
<?php
}
?>
<td width="50%" class="<?= $class ?>" align="center" valign="middle"><?= $zmSlangStatus ?>:&nbsp;<?= $status_string ?>&nbsp;-&nbsp;<?= $fps_string ?>&nbsp;fps</td>
<?php
if ( !($disable || $disabled) )
{
	if ( canEdit( 'Monitors' ) && ($force || $forced) )
	{
?>
<td width="25%" align="right" class="text"><a href="<?= $PHP_SELF ?>?view=watchstatus&mid=<?= $mid ?>&last_status=<?= $status ?>&force=0"><?= $zmSlangCancelForcedAlarm ?></a></td>
<?php
	}
	elseif ( canEdit( 'Monitors' ) && zmaCheck( $mid ) )
	{
?>
<td width="25%" align="right" class="text"><a href="<?= $PHP_SELF ?>?view=watchstatus&mid=<?= $mid ?>&last_status=<?= $status ?>&force=1"><?= $zmSlangForceAlarm ?></a></td>
<?php
	}
}
else
{
?>
<td width="25%" align="right" class="text">&nbsp;</td>
<?php
}
?>
</tr>
</table>
</body>
</html>
