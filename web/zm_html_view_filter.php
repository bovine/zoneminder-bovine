<?php
	if ( !canView( 'Events' ) )
	{
		$view = "error";
		return;
	}
	$result = mysql_query( "select * from Monitors where Id = '$mid'" );
	if ( !$result )
		die( mysql_error() );
	$monitor = mysql_fetch_assoc( $result );

	$select_name = "filter_name";
	$filter_names = array( ''=>'<?= $zmSlangChooseFilter ?>' );
	$result = mysql_query( "select * from Filters where MonitorId = '$mid' order by Name" );
	if ( !$result )
		die( mysql_error() );
	while ( $row = mysql_fetch_assoc( $result ) )
	{
		$filter_names[$row['Name']] = $row['Name'];
		if ( isset($filter_name) && $filter_name == $row['Name'] )
		{
			$filter_data = $row;
		}
	}

	if ( isset($filter_data) )
	{
		foreach( split( '&', $filter_data['Query'] ) as $filter_parm )
		{
			list( $key, $value ) = split( '=', $filter_parm, 2 );
			if ( $key )
			{
				$$key = $value;
			}
		}
	}

	$conjunction_types = array(
		'and' => $zmSlangConjAnd,
		'or'  => $zmSlangConjOr
	);
	$obracket_types = array( '' => '' );
	$cbracket_types = array( '' => '' );
	for ( $i = 1; $i <= ceil(($trms-1)/2); $i++ )
	{
		$obracket_types[$i] = str_repeat( "(", $i );
		$cbracket_types[$i] = str_repeat( ")", $i );
	}
	$attr_types = array(
		'DateTime'    => $zmSlangAttrDateTime,
		'Date'        => $zmSlangAttrDate,
		'Time'        => $zmSlangAttrTime,
		'Weekday'     => $zmSlangAttrWeekday,
		'Length'      => $zmSlangAttrDuration,
		'Frames'      => $zmSlangAttrFrames,
		'AlarmFrames' => $zmSlangAttrAlarmFrames,
		'TotScore'    => $zmSlangAttrTotalScore,
		'AvgScore'    => $zmSlangAttrAvgScore,
		'MaxScore'    => $zmSlangAttrMaxScore,
		'Archived'    => $zmSlangAttrArchiveStatus,
		);
	$op_types = array(
		'='  => $zmSlangOpEq,
		'!=' => $zmSlangOpNe,
		'>=' => $zmSlangOpGtEq,
		'>'  => $zmSlangOpGt,
		'<'  => $zmSlangOpLt,
		'<=' => $zmSlangOpLtEq,
	);
	$archive_types = array(
		'0' => $zmSlangArchUnarchived,
		'1' => $zmSlangArchArchived
	);
?>
<html>
<head>
<title>ZM - <?= $monitor['Name'] ?> - <?= $zmSlangEventFilter ?></title>
<link rel="stylesheet" href="zm_styles.css" type="text/css">
<script language="JavaScript">
function newWindow(Url,Name,Width,Height)
{
   	var Name = window.open(Url,Name,"resizable,scrollbars,width="+Width+",height="+Height);
}
function closeWindow()
{
	top.window.close();
}
function validateForm( form )
{
<?php
	if ( $trms > 2 )
	{
?>
	var bracket_count = 0;
<?php
		for ( $i = 1; $i <= $trms; $i++ )
		{
?>
	bracket_count += form.obr<?= $i ?>.value;
	bracket_count -= form.cbr<?= $i ?>.value;
<?php
		}
?>
	if ( bracket_count )
	{
		alert( "<?= $zmSlangErrorBrackets ?>" );
		return( false );
	}
<?php
	}
?>
<?php
	for ( $i = 1; $i <= $trms; $i++ )
	{
?>
		if ( form.val<?= $i?>.value == '' )
		{
			alert( "<?= $zmSlangErrorValidValue ?>" );
			return( false );
		}
<?php
	}
?>
	return( true );
}
function submitToFilter( form )
{
	form.target = window.name;
	form.view.value = 'filter';
	form.submit();
}
function submitToEvents( form )
{
	var Url = '<?= $PHP_SELF ?>';
	var Name = 'zmEvents<?= $monitor['Name'] ?>';
	var Width = <?= $jws['events']['w'] ?>;
	var Height = <?= $jws['events']['h'] ?>;
	var Options = 'resizable,scrollbars,width='+Width+',height='+Height;

	form.target = Name;
	form.view.value = 'events';
	form.submit();
}
function saveFilter( form )
{
	var Url = '<?= $PHP_SELF ?>';
	var Name = 'zmEventsFilterSave';
	var Width = <?= $jws['filtersave']['w'] ?>;
	var Height = <?= $jws['filtersave']['h'] ?>;
	var Options = 'resizable,scrollbars,width='+Width+',height='+Height;

	window.open( Url, Name, Options );
	form.target = Name;
	form.view.value = 'filtersave';
	form.submit();
}
function deleteFilter( form, name, id )
{
	if ( confirm( "<?= $zmSlangDeleteSavedFilter ?> '"+name+"'" ) )
	{
		form.action.value = 'delete';
		form.fid.value = name;
		submitToFilter( form );
	}
}
window.focus();
</script>
</head>
<body>
<form name="filter_form" method="get" action="<?= $PHP_SELF ?>">
<input type="hidden" name="view" value="filter">
<input type="hidden" name="mid" value="<?= $mid ?>">
<input type="hidden" name="page" value="<?= $page ?>">
<input type="hidden" name="action" value="">
<input type="hidden" name="fid" value="">
<center><table width="96%" align="center" border="0" cellspacing="1" cellpadding="0">
<tr>
<td valign="top"><table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" class="text"><? $zmSlangUseFilterExprsPre ?><select name="trms" class="form" onChange="submitToFilter( document.filter_form );"><?php for ( $i = 0; $i <= 8; $i++ ) { ?><option value="<?= $i ?>"<?php if ( $i == $trms ) { echo " selected"; } ?>><?= $i ?></option><?php } ?></select><?= $zmSlangUseFilterExprsPost ?></td>
<td align="center" class="text"><?= $zmSlangUseFilter ?>:&nbsp;<?php if ( count($filter_names) > 1 ) { echo buildSelect( $select_name, $filter_names, "submitToFilter( document.filter_form );" ); } else { ?><select class="form" disabled><option><?= $zmSlangNoSavedFilters ?></option></select><?php } ?></td>
<?php if ( canEdit( 'Events' ) ) { ?>
<td align="center" class="text"><a href="javascript: saveFilter( document.filter_form );"><?= $zmSlangSave ?></a></td>
<?php } else { ?>
<td align="center" class="text">&nbsp;</a></td>
<?php } ?>
<?php if ( canEdit( 'Events' ) && isset($filter_data) ) { ?>
<td align="center" class="text"><a href="javascript: deleteFilter( document.filter_form, '<?= $filter_data['Name'] ?>', <?= $filter_data['Id'] ?> );"><?= $zmSlangDelete ?></a></td>
<?php } else { ?>
<td align="center" class="text">&nbsp;</a></td>
<?php } ?>
<td align="right" class="text"><a href="javascript: closeWindow();"><?= $zmSlangClose ?></a></td>
</tr>
<tr>
<td colspan="5" class="text">&nbsp;</td>
</tr>
<tr>
<td colspan="5">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
	for ( $i = 1; $i <= $trms; $i++ )
	{
		$conjunction_name = "cnj$i";
		$obracket_name = "obr$i";
		$cbracket_name = "cbr$i";
		$attr_name = "attr$i";
		$op_name = "op$i";
		$value_name = "val$i";
?>
<tr>
<?php
		if ( $i == 1 )
		{
?>
<td class="text">&nbsp;</td>
<?php
		}
		else
		{
?>
<td class="text"><?= buildSelect( $conjunction_name, $conjunction_types ); ?></td>
<?php
		}
?>
<td class="text"><?php if ( $trms > 2 ) { echo buildSelect( $obracket_name, $obracket_types ); } else { ?>&nbsp;<?php } ?></td>
<td class="text"><?= buildSelect( $attr_name, $attr_types, "$value_name.value = ''; submitToFilter( document.filter_form );" ); ?></td>
<?php if ( $$attr_name == "Archived" ) { ?>
<td class="text"><center>is equal to</center></td>
<td class="text"><?= buildSelect( $value_name, $archive_types ); ?></td>
<?php } elseif ( $$attr_name ) { ?>
<td class="text"><?= buildSelect( $op_name, $op_types ); ?></td>
<td class="text"><input name="<?= $value_name ?>" value="<?= $$value_name ?>" class="form" size="16"></td>
<?php } else { ?>
<td class="text"><?= buildSelect( $op_name, $op_types ); ?></td>
<td class="text"><input name="<?= $value_name ?>" value="<?= isset($$value_name)?$$value_name:'' ?>" class="form" size="16"></td>
<?php } ?>
<td class="text"><?php if ( $trms > 2 ) { echo buildSelect( $cbracket_name, $cbracket_types ); } else { ?>&nbsp;<?php } ?></td>
</tr>
<?php
	}
?>
</table>
</td>
</tr>
<tr><td colspan="5" class="text">&nbsp;</td></tr>
<tr><td colspan="5" align="right"><input type="reset" value="Reset" class="form">&nbsp;&nbsp;<input type="button" value="Submit" class="form" onClick="if ( validateForm( document.filter_form ) ) submitToEvents( document.filter_form );"></td></tr>
</table></center>
</form>
</body>
</html>
