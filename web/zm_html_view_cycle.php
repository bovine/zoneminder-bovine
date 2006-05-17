<?php
//
// ZoneMinder web cycle view file, $Date$, $Revision$
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
if ( empty($mode) )
{
	if ( ZM_WEB_USE_STREAMS && canStream() )
		$mode = "stream";
	else
		$mode = "still";
}

if ( $group )
{
	$sql = "select * from Groups where Id = '$group'";
	$result = mysql_query( $sql );
	if ( !$result )
		die( mysql_error() );
	$row = mysql_fetch_assoc( $result );
	mysql_free_result( $result );
	$group_sql = "and find_in_set( Id, '".$row['MonitorIds']."' )";
}

$sql = "select * from Monitors where Function != 'None' $group_sql order by Sequence";
$result = mysql_query( $sql );
if ( !$result )
	die( mysql_error() );
$monitors = array();
$mon_idx = 0;
while( $row = mysql_fetch_assoc( $result ) )
{
	if ( !visibleMonitor( $row['Id'] ) )
	{
		continue;
	}
	if ( isset($mid) && $row['Id'] == $mid )
		$mon_idx = count($monitors);
	$row['ScaledWidth'] = reScale( $monitor['Width'], $row['DefaultScale'], ZM_WEB_DEFAULT_SCALE );
	$row['ScaledHeight'] = reScale( $monitor['Height'], $row['DefaultScale'], ZM_WEB_DEFAULT_SCALE );
	$monitors[] = $row;
}
mysql_free_result( $result );

$monitor = $monitors[$mon_idx];
$next_mid = $mon_idx==(count($monitors)-1)?$monitors[0]['Id']:$monitors[$mon_idx+1]['Id'];
$montage_width = ZM_WEB_MONTAGE_WIDTH?ZM_WEB_MONTAGE_WIDTH:$monitor['ScaledWidth'];
$montage_height = ZM_WEB_MONTAGE_HEIGHT?ZM_WEB_MONTAGE_HEIGHT:$monitor['ScaledHeight'];
$width_scale = ($montage_width*SCALE_BASE)/$monitor['Width'];
$height_scale = ($montage_height*SCALE_BASE)/$monitor['Height'];
$scale = (int)(($width_scale<$height_scale)?$width_scale:$height_scale);
    
if ( ZM_WEB_REFRESH_METHOD == "http" )
{
	header("Refresh: ".ZM_WEB_REFRESH_CYCLE."; URL=$PHP_SELF?view=cycle&group=$group&mid=$next_mid&mode=$mode" );
}
noCacheHeaders();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?= ZM_WEB_TITLE_PREFIX ?> - <?= $zmSlangCycleWatch ?></title>
<link rel="stylesheet" href="zm_html_styles.css" type="text/css">
<script type="text/javascript">
function newWindow(Url,Name,Width,Height)
{
	var Win = window.open(Url,Name,"resizable,scrollbars,width="+Width+",height="+Height);
}
function closeWindow()
{
	top.window.close();
}
<?php
if ( ZM_WEB_REFRESH_METHOD == "javascript" )
{
?>
window.setTimeout( "window.location.replace( '<?= "$PHP_SELF?view=cycle&group=$group&mid=$next_mid&mode=$mode" ?>' )", <?= ZM_WEB_REFRESH_CYCLE*1000 ?> );
<?php
}
?>
</script>
</head>
<body style="margin: 0px">
<table width="96%" align="center" border="0" cellspacing="0" cellpadding="4">
<tr>
<td width="33%" align="left" class="text"><b><?= $monitor['Name'] ?></b></td>
<?php if ( $mode == "stream" ) { ?>
<td width="34%" align="center" class="text"><a href="<?= $PHP_SELF ?>?view=<?= $view ?>&mode=still&group=<?= $group ?>&mid=<?= $mid ?>"><?= $zmSlangStills ?></a></td>
<?php } elseif ( canStream() ) { ?>
<td width="34%" align="center" class="text"><a href="<?= $PHP_SELF ?>?view=<?= $view ?>&mode=stream&group=<?= $group ?>&mid=<?= $mid ?>"><?= $zmSlangStream ?></a></td>
<?php } else { ?>
<td width="34%" align="center" class="text">&nbsp;</td>
<?php } ?>
<td width="33%" align="right" class="text"><a href="javascript: closeWindow();"><?= $zmSlangClose ?></a></td>
</tr>
<?php
if ( $mode == "stream" )
{
	$stream_src = getStreamSrc( array( "mode=jpeg", "monitor=".$monitor['Id'], "scale=".$scale, "maxfps=".ZM_WEB_VIDEO_MAXFPS, "ttl=".ZM_WEB_REFRESH_CYCLE ) );
	if ( canStreamNative() )
	{
?>
<tr><td colspan="3" align="center"><a href="javascript: newWindow( '<?= $PHP_SELF ?>?view=watch&mid=<?= $monitor['Id'] ?>', 'zmWatch<?= $monitor['Id'] ?>', <?= $monitor['Width']+$jws['watch']['w'] ?>, <?= $monitor['Height']+$jws['watch']['h'] ?> );"><?php outputImageStream( $stream_src, reScale( $monitor['Width'], $scale ), reScale( $monitor['Height'], $scale ), $monitor['Name'] ) ?></a></td></tr>
<?php
	}
	else
	{
?>
<tr><td colspan="3" align="center"><?php outputHelperStream( $stream_src, reScale( $monitor['Width'], $scale ), reScale( $monitor['Height'], $scale ) ) ?></td></tr>
<?php
	}
}
else
{
	$image_src = getStreamSrc( array( "mode=single", "monitor=".$monitor['Id'], "scale=".$scale ) );
?>
<tr><td colspan="3" align="center"><a href="javascript: newWindow( '<?= $PHP_SELF ?>?view=watch&mid=<?= $monitor['Id'] ?>', 'zmWatch<?= $monitor['Id'] ?>', <?= $monitor['Width']+$jws['watch']['w'] ?>, <?= $monitor['Height']+$jws['watch']['h'] ?> );"><?php outputImageStill( $image_src, reScale( $monitor['Width'], $scale ), reScale( $monitor['Height'], $scale ), $monitor['Name'] ) ?></a></td></tr>
<?php
}
?>
</table>
</body>
</html>
