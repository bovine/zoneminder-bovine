<?php
//
// ZoneMinder web zones view file, $Date$, $Revision$
// Copyright (C) 2003, 2004, 2005  Philip Coombes
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
chdir( ZM_DIR_IMAGES );
$status = exec( escapeshellcmd( getZmuCommand( " -m $mid -z" ) ) );
chdir( '..' );

$result = mysql_query( "select * from Monitors where Id = '$mid'" );
if ( !$result )
	die( mysql_error() );
$monitor = mysql_fetch_assoc( $result );
mysql_free_result( $result );

$result = mysql_query( "select * from Zones where MonitorId = '$mid' order by Area desc" );
if ( !$result )
	die( mysql_error() );
$zones = array();
while( $row = mysql_fetch_assoc( $result ) )
{
	if ( $row['Points'] = coordsToPoints( $row['Coords'] ) )
	{
		$row['AreaCoords'] = preg_replace( '/\s+/', ',', $row['Coords'] );
		$zones[] = $row;
	}
}
mysql_free_result( $result );

$image = $monitor['Name']."-Zones.jpg";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?= ZM_WEB_TITLE_PREFIX ?> - <?= $monitor['Name'] ?> - <?= $zmSlangZones ?></title>
<link rel="stylesheet" href="zm_html_styles.css" type="text/css">
<script type="text/javascript">
window.focus();
function newWindow(Url,Name,Width,Height)
{
	var Win = window.open(Url,Name,"resizable,width="+Width+",height="+Height);
}
function closeWindow()
{
	window.close();
}
function configureButton(form,name)
{
	var checked = false;
	for (var i = 0; i < form.elements.length; i++)
	{
		if ( form.elements[i].name.indexOf(name) == 0)
		{
			if ( form.elements[i].checked )
			{
				checked = true;
				break;
			}
		}
	}
	form.delete_btn.disabled = !checked;
}
</script>
</head>
<body>
<map name="zonemap">
<?php
foreach( array_reverse($zones) as $zone )
{
?>
<area shape="poly" coords="<?= $zone['AreaCoords'] ?>" href="javascript: newWindow( '<?= $PHP_SELF ?>?view=zone&mid=<?= $mid ?>&zid=<?= $zone['Id'] ?>', 'zmZone', <?= $monitor['Width']+$jws['zone']['w'] ?>, <?= $monitor['Height']<$jws['zone']['h']?$jws['zone']['h']:$monitor['Height'] ?> );">
<?php
}
?>
<area shape="default" nohref>
</map>
<table align="center" border="0" cellspacing="2" cellpadding="2" width="96%">
<tr>
<td width="33%" align="left" class="text">&nbsp;</td>
<td width="34%" align="center" class="head"><strong><?= $monitor['Name'] ?> <?= $zmSlangZones ?></strong></td>
<td width="33%" align="right" class="text"><a href="javascript: closeWindow();"><?= $zmSlangClose ?></a></td>
</tr>
<tr><td colspan="3" align="center"><img src="<?= ZM_DIR_IMAGES.'/'.$image ?>" usemap="#zonemap" width="<?= $monitor['Width'] ?>" height="<?= $monitor['Height'] ?>" border="0"></td></tr>
</table>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="96%">
<form name="zone_form" method="get" action="<?= $PHP_SELF ?>">
<input type="hidden" name="view" value="<?= $view ?>">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="mid" value="<?= $mid ?>">
<tr><td align="center" class="smallhead"><?= $zmSlangId ?></td>
<td align="center" class="smallhead"><?= $zmSlangName ?></td>
<td align="center" class="smallhead"><?= $zmSlangType ?></td>
<td align="center" class="smallhead"><?= $zmSlangAreaUnits ?></td>
<td align="center" class="smallhead"><?= $zmSlangMark ?></td>
</tr>
<?php
foreach( $zones as $zone )
{
?>
<tr>
<td align="center" class="text"><a href="javascript: newWindow( '<?= $PHP_SELF ?>?view=zone&mid=<?= $mid ?>&zid=<?= $zone['Id'] ?>', 'zmZone', <?= $monitor['Width']+$jws['zone']['w'] ?>, <?= $monitor['Height']<$jws['zone']['h']?$jws['zone']['h']:$monitor['Height'] ?> );"><?= $zone['Id'] ?>.</a></td>
<td align="center" class="text"><a href="javascript: newWindow( '<?= $PHP_SELF ?>?view=zone&mid=<?= $mid ?>&zid=<?= $zone['Id'] ?>', 'zmZone', <?= $monitor['Width']+$jws['zone']['w'] ?>, <?= $monitor['Height']<$jws['zone']['h']?$jws['zone']['h']:$monitor['Height'] ?> );"><?= $zone['Name'] ?></a></td>
<td align="center" class="text"><?= $zone['Type'] ?></td>
<td align="center" class="text"><?= $zone['Area'] ?>&nbsp;/&nbsp;<?= sprintf( "%.2f", ($zone['Area']*100)/($monitor['Width']*$monitor['Height']) ) ?></td>
<td align="center" class="text"><input type="checkbox" name="mark_zids[]" value="<?= $zone['Id'] ?>" onClick="configureButton( document.zone_form, 'mark_zids' );"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>></td>
</tr>
<?php
}
?>
<tr>
<td align="center" class="text">&nbsp;</td>
<td colspan="3" align="center"><input type="button" value="<?= $zmSlangAddNewZone ?>" class="form" onClick="javascript: newWindow( '<?= $PHP_SELF ?>?view=zone&mid=<?= $mid ?>&zid=0', 'zmZone', <?= $monitor['Width']+$jws['zone']['w'] ?>, <?= $monitor['Height']<$jws['zone']['h']?$jws['zone']['h']:$monitor['Height'] ?> );"<?php if ( !canEdit( 'Monitors' ) ) { ?> disabled<?php } ?>></td>
<td align="center"><input type="submit" name="delete_btn" value="<?= $zmSlangDelete ?>" class="form" disabled></td>
</tr>
</form>
</table>
</body>
</html>
