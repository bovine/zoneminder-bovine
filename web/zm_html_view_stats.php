<?php
//
// ZoneMinder web stats view file, $Date$, $Revision$
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

if ( !canView( 'Events' ) )
{
	$view = "error";
	return;
}
$sql = "select S.*,E.*,Z.Name as ZoneName,Z.Units,Z.Area,M.Name as MonitorName,M.Width,M.Height from Stats as S left join Events as E on S.EventId = E.Id left join Zones as Z on S.ZoneId = Z.Id left join Monitors as M on E.MonitorId = M.Id where S.EventId = '$eid' and S.FrameId = '$fid' order by S.ZoneId";
$stats = dbFetchAll( $sql );

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?= ZM_WEB_TITLE_PREFIX ?> - <?= $zmSlangStats ?> <?= $eid."-".$fid ?></title>
<link rel="stylesheet" href="zm_html_styles.css" type="text/css">
<script type="text/javascript">
window.focus();
function closeWindow()
{
	window.close();
}
</script>
</head>
<body scroll="auto">
<table align="center" width="96%" border="0">
<tr>
<td align="left" class="smallhead"><b><?= $zmSlangFrame ?> <?= $eid."-".$fid ?></b></td>
<td align="right" class="text"><a href="javascript: closeWindow();"><?= $zmSlangClose ?></a></td>
</tr>
<tr><td colspan="2"><table width="100%" border="0" bgcolor="#7F7FB2" cellpadding="3" cellspacing="1"><tr bgcolor="#FFFFFF">
<td class="smallhead"><?= $zmSlangZone ?></td>
<td class="smallhead" align="center"><?= $zmSlangPixelDiff ?></td>
<td class="smallhead" align="center"><?= $zmSlangAlarmPx ?></td>
<td class="smallhead" align="center"><?= $zmSlangFilterPx ?></td>
<td class="smallhead" align="center"><?= $zmSlangBlobPx ?></td>
<td class="smallhead" align="center"><?= $zmSlangBlobs ?></td>
<td class="smallhead" align="center"><?= $zmSlangBlobSizes ?></td>
<td class="smallhead" align="center"><?= $zmSlangAlarmLimits ?></td>
<td class="smallhead" align="center"><?= $zmSlangScore ?></td>
</tr>
<?php
if ( count($stats) )
{
	foreach ( $stats as $stat )
	{
?>
<tr bgcolor="#FFFFFF">
<td class="text"><?= $stat['ZoneName'] ?></td>
<td class="text" align="center"><?= $stat['PixelDiff'] ?></td>
<td class="text" align="center"><?= sprintf( "%d (%d%%)", $stat['AlarmPixels'], (100*$stat['AlarmPixels']/$stat['Area']) ) ?></td>
<td class="text" align="center"><?= sprintf( "%d (%d%%)", $stat['FilterPixels'], (100*$stat['FilterPixels']/$stat['Area']) ) ?></td>
<td class="text" align="center"><?= sprintf( "%d (%d%%)", $stat['BlobPixels'], (100*$stat['BlobPixels']/$stat['Area']) ) ?></td>
<td class="text" align="center"><?= $stat['Blobs'] ?></td>
<?php
if ( $stat['Blobs'] > 1 )
{
?>
<td class="text" align="center"><?= sprintf( "%d-%d (%d%%-%d%%)", $stat['MinBlobSize'], $stat['MaxBlobSize'], (100*$stat['MinBlobSize']/$stat['Area']), (100*$stat['MaxBlobSize']/$stat['Area']) ) ?></td>
<?php
}
else
{
?>
<td class="text" align="center"><?= sprintf( "%d (%d%%)", $stat['MinBlobSize'], 100*$stat['MinBlobSize']/$stat['Area'] ) ?></td>
<?php
}
?>
<td class="text" align="center"><?= $stat['MinX'].",".$stat['MinY']."-".$stat['MaxX'].",".$stat['MaxY'] ?></td>
<td class="text" align="center"><?= $stat['Score'] ?></td>
</tr>
<?php
	}
}
else
{
?>
<tr bgcolor="#FFFFFF">
<td class="text" colspan="8" align="center"><br><?= $zmSlangNoStatisticsRecorded ?><br><br></td>
</tr>
<?php
}
?>
</table></td>
</tr>
</table>
</body>
</html>
