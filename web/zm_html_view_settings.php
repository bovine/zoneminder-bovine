<?php
	if ( !canView( 'Monitors' ) )
	{
		$view = "error";
		return;
	}
	$result = mysql_query( "select * from Monitors where Id = '$mid'" );
	if ( !$result )
		die( mysql_error() );
	$monitor = mysql_fetch_assoc( $result );

	$zmu_command = ZMU_COMMAND." -m $mid -B -C -H -O";
	$zmu_output = exec( escapeshellcmd( $zmu_command ) );
	list( $brightness, $contrast, $hue, $colour ) = split( ' ', $zmu_output );
?>
<html>
<head>
<title>ZM - <?= $monitor['Name'] ?> - <?= $zmSlangSettings ?></title>
<link rel="stylesheet" href="zm_styles.css" type="text/css">
<script language="JavaScript">
<?php
	if ( !empty($refresh_parent) )
	{
?>
opener.location.reload(true);
<?php
	}
?>
window.focus();
function validateForm(Form)
{
	return( true );
}

function closeWindow()
{
	window.close();
}
</script>
</head>
<body>
<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr>
<td colspan="2" align="left" class="head">Monitor <?= $monitor['Name'] ?> - <?= $zmSlangSettings ?></td>
</tr>
<form name="settings_form" method="post" action="<?= $PHP_SELF ?>" onsubmit="return validateForm( document.settings_form )">
<input type="hidden" name="view" value="<?= $view ?>">
<input type="hidden" name="action" value="settings">
<input type="hidden" name="mid" value="<?= $mid ?>">
<tr>
<td align="right" class="smallhead"><?= $zmSlangParameter ?></td><td align="left" class="smallhead"><?= $zmSlangValue ?></td>
</tr>
<tr><td align="right" class="text"><?= $zmSlangBrightness ?></td><td align="left" class="text"><input type="text" name="new_brightness" value="<?= $brightness ?>" size="8" class="form"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>></td></tr>
<tr><td align="right" class="text"><?= $zmSlangContrast ?></td><td align="left" class="text"><input type="text" name="new_contrast" value="<?= $contrast ?>" size="8" class="form"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>></td></tr>
<tr><td align="right" class="text"><?= $zmSlangHue ?></td><td align="left" class="text"><input type="text" name="new_hue" value="<?= $hue ?>" size="8" class="form"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>></td></tr>
<tr><td align="right" class="text"><?= $zmSlangColour ?></td><td align="left" class="text"><input type="text" name="new_colour" value="<?= $colour ?>" size="8" class="form"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>></td></tr>
<tr>
<td colspan="2" align="right"><input type="submit" value="<?= $zmSlangSave ?>" class="form"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>>&nbsp;&nbsp;<input type="button" value="<?= $zmSlangClose ?>" class="form" onClick="closeWindow()"></td>
</tr>
</table>
</body>
</html>
