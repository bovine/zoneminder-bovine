<?php
	if ( !canView( 'Stream' ) )
	{
		$view = "error";
		return;
	}
	$zmu_command = ZMU_COMMAND." -m $mid -s -f";
	if ( canEdit( 'Monitors' ) && isset($force) )
	{
		$zmu_command .= ($force?" -a":" -c"); 
	}

	$zmu_output = exec( escapeshellcmd( $zmu_command ) );
	list( $status, $fps ) = split( ' ', $zmu_output );
	$status_string = "Unknown";
	$fps_string = "--.--";
	$class = "text";
	if ( $status == 0 )
	{
		$status_string = "Idle";
	}
	elseif ( $status == 1 )
	{
		$status_string = "Alarm";
		$class = "redtext";
	}
	elseif ( $status == 2 )
	{
		$status_string = "Alert";
		$class = "ambtext";
	}
	elseif ( $status == 3 )
	{
		$status_string = "Record";
	}
	$fps_string = sprintf( "%.2f", $fps );
	$new_alarm = ( $status > 0 && $last_status == 0 );
	$old_alarm = ( $status == 0 && $last_status > 0 );

	$refresh = (isset($force)||$forced||$status)?1:REFRESH_STATUS;
	$url = "$PHP_SELF?view=watchstatus&mid=$mid&last_status=$status".(($force||$forced)?"&forced=1":"");
	if ( ZM_WEB_REFRESH_METHOD == "http" )
		header("Refresh: $refresh; URL=$url" );
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");			  // HTTP/1.0
?>
<html>
<head>
<link rel="stylesheet" href="zm_styles.css" type="text/css">
<script language="JavaScript">
<?php
	if ( ZM_WEB_POPUP_ON_ALARM && $new_alarm )
	{
?>
top.window.focus();
<?php
	}
	if ( $old_alarm )
	{
?>
parent.frames[2].location.reload(true);
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
<td width="15%" class="text" align="left">&nbsp;</td>
<td width="70%" class="<?= $class ?>" align="center" valign="middle">Status:&nbsp;<?= $status_string ?>&nbsp;-&nbsp;<?= $fps_string ?>&nbsp;fps</td>
<?php
	if ( canEdit( 'Monitors' ) && ($force || $forced) )
	{
?>
<td width="15%" align="right" class="text"><a href="<?= $PHP_SELF ?>?view=watchstatus&mid=<?= $mid ?>&last_status=$status&force=0">Cancel&nbsp;Forced&nbsp;Alarm</a></td>
<?php
	}
	elseif ( canEdit( 'Monitors' ) && zmaCheck( $mid ) )
	{
?>
<td width="15%" align="right" class="text"><a href="<?= $PHP_SELF ?>?view=watchstatus&mid=<?= $mid ?>&last_status=$status&force=1">Force&nbsp;Alarm</a></td>
<?php
	}
	else
	{
?>
<td width="15%" align="right" class="text">&nbsp;</td>
<?php
	}
?>
</tr>
</table>
<?php
	if ( ZM_WEB_SOUND_ON_ALARM && $status == 1 )
	{
?>
<embed src="<?= ZM_DIR_SOUNDS.'/'.ZM_WEB_ALARM_SOUND ?>" autostart="yes" hidden="true"></embed>
<?php
	}
?>
</body>
</html>
