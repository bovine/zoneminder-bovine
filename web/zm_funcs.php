<?php
//
// ZoneMinder web function library, $Date$, $Revision$
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

// Compatibility functions
if ( version_compare( phpversion(), "4.3.0", "<") )
{
	function ob_get_clean()
	{
		$buffer = ob_get_contents();
		ob_end_clean();
		return( $buffer );
	}
}

function userLogin( $username, $password="" )
{
	global $user, $cookies;
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SESSION, $_SERVER;
	}

	if ( version_compare( phpversion(), "4.3.0", "<") )
	{
		$mysql_username = mysql_escape_string($username);
		$mysql_password = mysql_escape_string($password);
	}
	else
	{
		$mysql_username = mysql_real_escape_string($username);
		$mysql_password = mysql_real_escape_string($password);
	}

	if ( ZM_AUTH_TYPE == "builtin" )
	{
		$sql = "select * from Users where Username = '$mysql_username' and Password = password('$mysql_password') and Enabled = 1";
	}
	else
	{
		$sql = "select * from Users where Username = '$mysql_username' and Enabled = 1";
	}
	$result = mysql_query( $sql );
	if ( !$result )
		echo mysql_error();
	$_SESSION['username'] = $username;
	if ( ZM_AUTH_RELAY == "plain" )
	{
		// Need to save this in session
		$_SESSION['password'] = $password;
	}
	$_SESSION['remote_addr'] = $_SERVER['REMOTE_ADDR']; // To help prevent session hijacking
	if ( $db_user = mysql_fetch_assoc( $result ) )
	{
		$_SESSION['user'] = $user = $db_user;
		if ( ZM_AUTH_TYPE == "builtin" )
		{
			$_SESSION['password_hash'] = $user['Password'];
		}
	}
	else
	{
		unset( $user );
	}
	mysql_free_result( $result );
	if ( $cookies ) session_write_close();
}

function userLogout()
{
	global $user;
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SESSION;
	}

	unset( $_SESSION['user'] );
	unset( $user );

	session_destroy();
}

function authHash( $use_remote_addr )
{
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SESSION;
	}

	if ( ZM_OPT_USE_AUTH && ZM_AUTH_RELAY == "hashed" )
	{
		$time = localtime();
		if ( $use_remote_addr )
		{
			$auth_key = ZM_AUTH_HASH_SECRET.$_SESSION['username'].$_SESSION['password_hash'].$_SESSION['remote_addr'].$time[2].$time[3].$time[4].$time[5];
		}
		else
		{
			$auth_key = ZM_AUTH_HASH_SECRET.$_SESSION['username'].$_SESSION['password_hash'].$time[2].$time[3].$time[4].$time[5];
		}
		$auth = md5( $auth_key );
	}
	else
	{
		$auth = "";
	}
	return( $auth );
}

function getStreamSrc( $args )
{
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SESSION, $_SERVER;
	}

	$stream_src = ZM_BASE_URL.ZM_PATH_ZMS;

	if ( ZM_OPT_USE_AUTH )
	{
		if ( ZM_AUTH_RELAY == "hashed" )
		{
			$args[] = "auth=".authHash( ZM_AUTH_HASH_IPS );
		}
		elseif ( ZM_AUTH_RELAY == "plain" )
		{
			$args[] = "user=".$_SESSION['username'];
			$args[] = "pass=".$_SESSION['password'];
		}
		elseif ( ZM_AUTH_RELAY == "none" )
		{
			$args[] = "user=".$_SESSION['username'];
		}
	}
	if ( ZM_RAND_STREAM )
	{
		$args[] = "rand=".time();
	}

	if ( count($args) )
	{
		$stream_src .= "?".join( "&", $args );
	}

	return( $stream_src );
}

function outputVideoStream( $src, $width, $height, $name, $format )
{
	switch ( $format )
	{
		case "asf" :
				$mime_type = "video/x-ms-asf";
				break;
		case "swf" :
				$mime_type = "application/x-shockwave-flash";
				break;
		case "mp4" :
				$mime_type = "video/mp4";
				break;
		case "mov" :
				$mime_type = "video/quicktime";
				break;
		default :
				$mime_type = "video/$format";
				break;
	} 
	$object_tag = false;
	if ( ZM_WEB_USE_OBJECT_TAGS )
	{
		switch( $format )
		{
			case "asf" :
			case "wmv" :
			{
				if ( isWindows() )
				{
?>
<object id="<?= $name ?>" width="<?= $width ?>" height="<?= $height ?>"
classid="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"
codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,0,02,902"
standby="Loading Microsoft Windows Media Player components..."
type="<?= $mime_type ?>">
<param name="FileName" value="<?= $src ?>">
<param name="autoStart" value="1">
<param name="showControls" value="0">
<embed type="<?= $mime_type ?>"
pluginspage="http://www.microsoft.com/Windows/MediaPlayer/"
src="<?= $src ?>"
name="<?= $name ?>"
width="<?= $width ?>"
height="<?= $height ?>"
autostart="1"
showcontrols="0">
</embed>
</object>
<?php
					$object_tag = true;
				}
				break;
			}
			case "mov" :
			{
?>
<object id="<?= $name ?>" width="<?= $width ?>" height="<?= $height ?>"
classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"
codebase="http://www.apple.com/qtactivex/qtplugin.cab"
type="<?= $mime_type ?>">
<param name="src" value="<?= $src ?>">
<param name="autoplay" VALUE="true">
<param name="controller" VALUE="false">
<embed type="<?= $mime_type ?>"
src="<?= $src ?>"
pluginspage="http://www.apple.com/quicktime/download/"
name="<?= $name ?>"
width="<?= $width ?>"
height="<?= $height ?>"
autoplay="true"
controller="true"
</embed>
</object>
<?php
				$object_tag = true;
				break;
			}
			case "swf" :
			{
?>
<object id="<?= $name ?>" width="<?= $width ?>" height="<?= $height ?>"
classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"
type="<?= $mime_type ?>">
<param name="movie" value="<?= $src ?>">
<param name=quality value="high">
<param name=bgcolor value="#ffffff">
<embed type="<?= $mime_type ?>"
pluginspage="http://www.macromedia.com/go/getflashplayer"
src="<?= $src ?>"
width="<?= $width ?>"
height="<?= $height ?>"
name="<?= $name ?>"
quality="high"
bgcolor="#ffffff"
</embed>
</object>
<?php
				$object_tag = true;
				break;
			}
		}
	}
	if ( !$object_tag )
	{
?>
<embed<?= isset($mime_type)?(' type="'.$mime_type.'"'):"" ?> 
src="<?= $src ?>"
width="<?= $width ?>"
height="<?= $height ?>"
name="<?= $name ?>"
autostart="1"
autoplay="1"
showcontrols="0"
controller="0">
</embed>
<?php
	}
}

function outputImageStream( $src, $width, $height, $name="" )
{
?>
<img src="<?= $src ?>" alt="<?= $name ?>" border="0" width="<?= $width ?>" height="<?= $height ?>">
<?php
}

function outputControlStream( $src, $width, $height, $monitor, $scale, $target )
{
	global $PHP_SELF;
?>
<form name="ctrl_form" method="post" action="<?= $PHP_SELF ?>" target="<?= $target ?>">
<input type="hidden" name="view" value="blank">
<input type="hidden" name="mid" value="<?= $monitor['Id'] ?>">
<input type="hidden" name="action" value="control">
<?php
				if ( $monitor['CanMoveMap'] ) 
				{
?>
<input type="hidden" name="control" value="move_map">
<?php
				}
				elseif ( $monitor['CanMoveRel'] )
				{
?>
<input type="hidden" name="control" value="move_pseudo_map">
<?php
				}
				elseif ( $monitor['CanMoveCon'] )
				{
?>
<input type="hidden" name="control" value="move_con_map">
<?php
				}
?>
<input type="hidden" name="scale" value="<?= $scale ?>">
<input type="image" src="<?= $src ?>" border="0" width="<?= $width ?>" height="<?= $height ?>">
</form>
<?php
}

function outputHelperStream( $src, $width, $height, $name="" )
{
?>
<applet code="com.charliemouse.cambozola.Viewer"
archive="<?= ZM_PATH_CAMBOZOLA ?>"
align="middle"
width="<?= $width ?>"
height="<?= $height ?>">
<param name="url" value="<?= $src ?>">
</applet>
<?php
}

function outputImageStill( $src, $width, $height, $name="" )
{
?>
<img name="zmImage" src="<?= $src ?>" alt="<?= $name ?>" border="0" width="<?= $width ?>" height="<?= $height ?>">
<?php
}

function outputControlStill( $src, $width, $height, $monitor, $scale, $target )
{
	global $PHP_SELF;
?>
<form name="ctrl_form" method="post" action="<?= $PHP_SELF ?>" target="<?= $target ?>">
<input type="hidden" name="view" value="blank">
<input type="hidden" name="mid" value="<?= $monitor['Id'] ?>">
<input type="hidden" name="action" value="control">
<?php
				if ( $monitor['CanMoveMap'] ) 
				{
?>
<input type="hidden" name="control" value="move_map">
<?php
				}
				elseif ( $monitor['CanMoveRel'] )
				{
?>
<input type="hidden" name="control" value="move_pseudo_map">
<?php
				}
				elseif ( $monitor['CanMoveCon'] )
				{
?>
<input type="hidden" name="control" value="move_con_map">
<?php
				}
?>
<input type="hidden" name="scale" value="<?= $scale ?>">
<input type="image" src="<?= $src ?>" border="0" width="<?= $width ?>" height="<?= $height ?>">
</form>
<?php
}

function getZmuCommand( $args )
{
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SESSION;
	}

	$zmu_command = ZMU_PATH;

	if ( ZM_OPT_USE_AUTH )
	{
		if ( ZM_AUTH_RELAY == "hashed" )
		{
			$zmu_command .= " -A ".authHash( false );
		}
		elseif ( ZM_AUTH_RELAY == "plain" )
		{
			$zmu_command .= " -U ".$_SESSION['username']." -P ".$_SESSION['password'];
		}
		elseif ( ZM_AUTH_RELAY == "none" )
		{
			$zmu_command .= " -U ".$_SESSION['username'];
		}
	}

	$zmu_command .= $args;

	return( $zmu_command );
}

function visibleMonitor( $mid )
{
	global $user;

	return( empty($user['MonitorIds']) || in_array( $mid, split( ',', $user['MonitorIds'] ) ) );
}

function canView( $area, $mid=false )
{
	global $user;

	return( ($user[$area] == 'View' || $user[$area] == 'Edit') && ( !$mid || visibleMonitor( $mid ) ) );
}

function canEdit( $area, $mid=false )
{
	global $user;

	return( $user[$area] == 'Edit' && ( !$mid || visibleMonitor( $mid ) ) );
}

function deleteEvent( $eid )
{
	global $user;

	if ( $user['Events'] == 'Edit' && $eid )
	{
		$result = mysql_query( "delete from Events where Id = '$eid'" );
		if ( !$result )
			die( mysql_error() );
		if ( !ZM_OPT_FAST_DELETE )
		{
			$result = mysql_query( "delete from Stats where EventId = '$eid'" );
			if ( !$result )
				die( mysql_error() );
			$result = mysql_query( "delete from Frames where EventId = '$eid'" );
			if ( !$result )
				die( mysql_error() );
			system( escapeshellcmd( "rm -rf ".ZM_DIR_EVENTS."/*/".sprintf( "%d", $eid ) ) );
		}
	}
}

function makeLink( $url, $label, $condition=1, $options="" )
{
	$string = "";
	if ( $condition )
	{
		$string .= '<a href="'.$url.'"'.($options?(' '.$options):'').'>';
	}
	$string .= $label;
	if ( $condition )
	{
		$string .= '</a>';
	}
	return( $string );
}

function truncText( $text, $length, $deslash=1 )
{       
	return( preg_replace( "/^(.{".$length.",}?)\b.*$/", "\\1&hellip;", ($deslash?stripslashes($text):$text) ) );       
}               

function buildSelect( $name, $contents, $behaviours=false )
{
	if ( preg_match( "/^(\w+)\s*\[\s*['\"]?(\w+)[\"']?\s*]$/", $name, $matches ) )
	{
		$arr = $matches[1];
		$idx = $matches[2];
		global $$arr;
		$value = ${$arr}[$idx];
	}
	else
	{
		global $$name;
		$value = $$name;
	}
	ob_start();
	$behaviour_text = "";
	if ( !empty($behaviours) )
	{
		if ( is_array($behaviours) )
		{
			foreach ( $behaviours as $event=>$action )
			{
				$behaviour_text .= ' '.$event.'="'.$action.'"';
			}
		}
		else
		{
			$behaviour_text = ' onChange="'.$behaviours.'"';
		}
	}
?>
<select name="<?= $name ?>" class="form"<?= $behaviour_text ?>>
<?php
	foreach ( $contents as $content_value => $content_text )
	{
?>
<option value="<?= $content_value ?>"<?php if ( $value == $content_value ) { echo " selected"; } ?>><?= htmlentities($content_text) ?></option>
<?php
	}
?>
</select>
<?php
	$html = ob_get_contents();
	ob_end_clean();
	
	return( $html );
}

function getFormChanges( $values, $new_values, $types=false, $columns=false )
{
	$changes = array();
	if ( !$types )
		$types = array();

	foreach( $new_values as $key=>$value )
	{
		if ( $columns && !$columns[$key] )
			continue;

		switch( $types[$key] )
		{
			case 'set' :
			{
				if ( is_array( $new_values[$key] ) )
				{
					if ( join(',',$new_values[$key]) != $values[$key] )
					{
						$changes[$key] = "$key = '".join(',',$new_values[$key])."'";
					}
				}
				elseif ( $values[$key] )
				{
					$changes[$key] = "$key = ''";
				}
				break;
			}
			case 'image' :
			{
				if ( is_array( $new_values[$key] ) )
				{
					$image_data = getimagesize( $new_values[$key]['tmp_name'] );
					$changes[$key.'Width'] = $key."Width = ".$image_data[0];
					$changes[$key.'Height'] = $key."Height = ".$image_data[1];
					$changes[$key.'Type'] = $key."Type = '".$new_values[$key]['type']."'";
					$changes[$key.'Size'] = $key."Size = ".$new_values[$key]['size'];
					ob_start();
					readfile( $new_values[$key]['tmp_name'] );
					$changes[$key] = $key." = '".addslashes( ob_get_contents() )."'";
					ob_end_clean();
				}
				else
				{
					$changes[$key] = "$key = '$value'";
				}
				break;
			}
			case 'document' :
			{
				if ( is_array( $new_values[$key] ) )
				{
					$image_data = getimagesize( $new_values[$key]['tmp_name'] );
					$changes[$key.'Type'] = $key."Type = '".$new_values[$key]['type']."'";
					$changes[$key.'Size'] = $key."Size = ".$new_values[$key]['size'];
					ob_start();
					readfile( $new_values[$key]['tmp_name'] );
					$changes[$key] = $key." = '".addslashes( ob_get_contents() )."'";
					ob_end_clean();
				}
				else
				{
					$changes[$key] = "$key = '$value'";
				}
				break;
			}
			case 'file' :
			{
				$changes[$key.'Type'] = $key."Type = '".$new_values[$key]['type']."'";
				$changes[$key.'Size'] = $key."Size = ".$new_values[$key]['size'];
				ob_start();
				readfile( $new_values[$key]['tmp_name'] );
				$changes[$key] = $key." = '".addslashes( ob_get_contents() )."'";
				ob_end_clean();
				break;
			}
			case 'raw' :
			{
				if ( $values[$key] != $value )
				{
					$changes[$key] = "$key = $value";
				}
				break;
			}
			default :
			{
				if ( $values[$key] != $value )
				{
					$changes[$key] = "$key = '$value'";
				}
				break;
			}
		}
	}
	foreach( $values as $key=>$value )
	{
		if ( $columns[$key] && $types[$key] == 'toggle' )
		{
			if ( !isset($new_values[$key]) && !empty($value) )
			{
				$changes[$key] = "$key = 0";
			}
		}
	}
	return( $changes );
}

function getBrowser( &$browser, &$version )
{
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SERVER;
	}

	if (ereg( 'MSIE ([0-9].[0-9]{1,2})',$_SERVER['HTTP_USER_AGENT'],$log_version))
	{
		$version = $log_version[1];
		$browser = 'ie';
	}
	elseif (ereg( 'Safari/([0-9.]+)',$_SERVER['HTTP_USER_AGENT'],$log_version))
	{
		$version = $log_version[1];
		$browser = 'safari';
	}
	elseif (ereg( 'Opera ([0-9].[0-9]{1,2})',$_SERVER['HTTP_USER_AGENT'],$log_version))
	{
		$version = $log_version[1];
		$browser = 'opera';
	}
	elseif (ereg( 'Mozilla/([0-9].[0-9]{1,2})',$_SERVER['HTTP_USER_AGENT'],$log_version))
	{
		$version = $log_version[1];
		$browser = 'mozilla';
	}
	else
	{
		$version = 0;
		$browser = 'unknown';
	}
}

function isNetscape()
{
	getBrowser( $browser, $version );

	return( $browser == "mozilla" );
}

function isInternetExplorer()
{
	getBrowser( $browser, $version );

	return( $browser == "ie" );
}

function isWindows()
{
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SERVER;
	}

	return ( preg_match( '/Win/', $_SERVER['HTTP_USER_AGENT'] ) );
}

function canStreamNative()
{
	return( ZM_CAN_STREAM == "yes" || ( ZM_CAN_STREAM == "auto" && isNetscape() ) );
}

function canStreamApplet()
{
	return( (ZM_OPT_CAMBOZOLA && file_exists( ZM_PATH_WEB.'/'.ZM_PATH_CAMBOZOLA )) );
}

function canStream()
{
	return( canStreamNative() | canStreamApplet() );
}

function fixDevices()
{
	$string = ZM_PATH_BIN."/zmfix";
	$string .= " 2>/dev/null >&- <&- >/dev/null";
	exec( $string );
}

function packageControl( $command )
{
	$string = ZM_PATH_BIN."/zmpkg.pl $command";
	$string .= " 2>/dev/null >&- <&- >/dev/null";
	exec( $string );
}

function daemonControl( $command, $daemon=false, $args=false )
{
	$string = ZM_PATH_BIN."/zmdc.pl $command";
	if ( $daemon )
	{
		$string .= " $daemon";
		if ( $args )
		{
			$string .= " $args";
		}
	}
	$string .= " 2>/dev/null >&- <&- >/dev/null";
	exec( $string );
}

function zmcControl( $monitor, $mode=false )
{
	if ( $monitor['Type'] == "Local" )
	{
		$sql = "select count(if(Function!='None',1,NULL)) as ActiveCount from Monitors where Device = '".$monitor['Device']."'";
		$zmc_args = "-d ".$monitor['Device'];
	}
	else
	{
		$sql = "select count(if(Function!='None',1,NULL)) as ActiveCount from Monitors where Id = '".$monitor['Id']."'";
		$zmc_args = "-m ".$monitor['Id'];
	}
	$result = mysql_query( $sql );
	if ( !$result )
		echo mysql_error();
	$row = mysql_fetch_assoc( $result );
	$active_count = $row['ActiveCount'];

	if ( !$active_count )
	{
		daemonControl( "stop", "zmc", $zmc_args );
	}
	else
	{
		if ( $mode == "restart" )
		{
			daemonControl( "stop", "zmc", $zmc_args );
		}
		daemonControl( "start", "zmc", $zmc_args );
	}
}

function zmaControl( $monitor, $mode=false )
{
	if ( !is_array( $monitor ) )
	{
		$sql = "select Id,Function,Enabled from Monitors where Id = '$monitor'";
		$result = mysql_query( $sql );
		if ( !$result )
			echo mysql_error();
		$monitor = mysql_fetch_assoc( $result );
	}
	switch ( $monitor['Function'] )
	{
		case 'Modect' :
		case 'Record' :
		case 'Mocord' :
		case 'Nodect' :
		{
			if ( $mode == restart )
			{
				if ( ZM_OPT_CONTROL )
				{
					daemonControl( "stop", "zmtrack.pl", "-m ".$monitor['Id'] );
				}
				daemonControl( "stop", "zma", "-m ".$monitor['Id'] );
				if ( ZM_OPT_FRAME_SERVER )
				{
					daemonControl( "stop", "zmf", "-m ".$monitor['Id'] );
				}
			}
			if ( ZM_OPT_FRAME_SERVER )
			{
				daemonControl( "start", "zmf", "-m ".$monitor['Id'] );
			}
			daemonControl( "start", "zma", "-m ".$monitor['Id'] );
			if ( ZM_OPT_CONTROL && $monitor['Controllable'] && $monitor['TrackMotion'] && ( $monitor['Function'] == 'Modect' || $monitor['Function'] == 'Mocord' ) )
			{
				daemonControl( "start", "zmtrack.pl", "-m ".$monitor['Id'] );
			}
			if ( $mode == "reload" )
			{
				daemonControl( "reload", "zma", "-m ".$monitor['Id'] );
			}
			break;
		}
		default :
		{
			if ( ZM_OPT_CONTROL )
			{
				daemonControl( "stop", "zmtrack.pl", "-m ".$monitor['Id'] );
			}
			daemonControl( "stop", "zma", "-m ".$monitor['Id'] );
			if ( ZM_OPT_FRAME_SERVER )
			{
				daemonControl( "stop", "zmf", "-m ".$monitor['Id'] );
			}
			break;
		}
	}
}

function initDaemonStatus()
{
	global $daemon_status;

	if ( !isset($daemon_status) )
	{
		if ( daemonCheck() )
		{
			$string = ZM_PATH_BIN."/zmdc.pl status";
			$daemon_status = shell_exec( $string );
		}
		else
		{
			$daemon_status = "";
		}
	}
}

function daemonStatus( $daemon, $args=false )
{
	global $daemon_status;

	initDaemonStatus();
	
	$string = "$daemon";
	if ( $args )
		$string .= " $args";
	return( strpos( $daemon_status, "'$string' running" ) !== false );
}

function zmcStatus( $monitor )
{
	if ( $monitor['Type'] == 'Local' )
	{
		$zmc_args = "-d ".$monitor['Device'];
	}
	else
	{
		$zmc_args = "-m ".$monitor['Id'];
	}
	return( daemonStatus( "zmc", $zmc_args ) );
}

function zmaStatus( $monitor )
{
	if ( is_array( $monitor ) )
	{
		$monitor = $monitor['Id'];
	}
	return( daemonStatus( "zma", "-m $monitor" ) );
}

function daemonCheck( $daemon=false, $args=false )
{
	$string = ZM_PATH_BIN."/zmdc.pl check";
	if ( $daemon )
	{
		$string .= " $daemon";
		if ( $args )
			$string .= " $args";
	}
	$result = exec( $string );
	return( preg_match( '/running/', $result ) );
}

function zmcCheck( $monitor )
{
	if ( $monitor['Type'] == 'Local' )
	{
		$zmc_args = "-d ".$monitor['Device'];
	}
	else
	{
		$zmc_args = "-m ".$monitor['Id'];
	}
	return( daemonCheck( "zmc", $zmc_args ) );
}

function zmaCheck( $monitor )
{
	if ( is_array( $monitor ) )
	{
		$monitor = $monitor['Id'];
	}
	return( daemonCheck( "zma", "-m $monitor" ) );
}

function getImageSrc( $event, $frame, $scale, $capture_only=false, $overwrite=false )
{
	$event_path = ZM_DIR_EVENTS.'/'.$event['MonitorId'].'/'.$event['Id'];

	//echo "S:$scale, CO:$capture_only<br>";
	$capt_image = sprintf( "%0".ZM_EVENT_IMAGE_DIGITS."d-capture.jpg", $frame['FrameId'] );
	$capt_path = $event_path.'/'.$capt_image;
	$thumb_capt_path = ZM_DIR_IMAGES.'/'.$event['Id'].'-'.$capt_image;
	//echo "CI:$capt_image, CP:$capt_path, TCP:$thumb_capt_path<br>";

	$anal_image = sprintf( "%0".ZM_EVENT_IMAGE_DIGITS."d-analyse.jpg", $frame['FrameId'] );
	$anal_path = $event_path.'/'.$anal_image;
	$thumb_anal_path = ZM_DIR_IMAGES.'/'.$event['Id'].'-'.$anal_image;
	//echo "AI:$anal_image, AP:$anal_path, TAP:$thumb_anal_path<br>";

	$alarm_frame = $frame['Type']=='Alarm';

	$has_anal_image = $alarm_frame && file_exists( $anal_path ) && filesize( $anal_path );
	$is_anal_image = $has_anal_image && !$capture_only;

	if ( $scale >= 100 || !file_exists( ZM_PATH_NETPBM."/jpegtopnm" ) )
	{
		$image_path = $thumb_path = $is_anal_image?$anal_path:$capt_path;
	}
	else
	{
		if ( version_compare( phpversion(), "4.3.10", ">=") )
			$fraction = sprintf( "%.3F", $scale/100 );
		else
			$fraction = sprintf( "%.3f", $scale/100 );
		$scale = (int)round( $scale );

		$thumb_capt_path = preg_replace( "/\.jpg$/", "-$scale.jpg", $thumb_capt_path );
		$thumb_anal_path = preg_replace( "/\.jpg$/", "-$scale.jpg", $thumb_anal_path );

		if ( $is_anal_image )
		{
			$image_path = $anal_path;
			$thumb_path = $thumb_anal_path;
		}
		else
		{
			$image_path = $capt_path;
			$thumb_path = $thumb_capt_path;
		}

		if ( !file_exists( $thumb_path ) || !filesize( $thumb_path ) )
		{
			if ( ZM_WEB_SCALE_THUMBS )
			{
				$command = ZM_PATH_NETPBM."/jpegtopnm -quiet -dct fast $image_path | ".ZM_PATH_NETPBM."/pnmscalefixed -quiet $fraction | ".ZM_PATH_NETPBM."/pnmtojpeg -quiet -dct=fast > $thumb_path";
				exec( $command );
			}
			else
			{
				$image_path = $thumb_path = $is_anal_image?$anal_path:$capt_path;
			}
		}
	}

	$image_data = array(
		'eventPath' => $event_path,
		'imagePath' => $image_path,
		'thumbPath' => $thumb_path,
		'imageClass' => $alarm_frame?"alarm":"normal",
		'isAnalImage' => $is_anal_image,
		'hasAnalImage' => $has_anal_image,
	);

	//echo "IP:$image_path<br>";
	//echo "TP:$thumb_path<br>";
	return( $image_data );
}

function createListThumbnail( $event, $overwrite=false )
{
	$sql = "select * from Frames where EventId = '".$event['Id']."' and Score = '".$event['MaxScore']."' order by FrameId limit 0,1";
	if ( !($result = mysql_query( $sql )) )
		die( mysql_error() );
	$frame = mysql_fetch_assoc( $result );
	mysql_free_result( $result );
	$frame_id = $frame['FrameId'];

	if ( ZM_WEB_LIST_THUMB_WIDTH )
	{
		$thumb_width = ZM_WEB_LIST_THUMB_WIDTH;
		$scale = (SCALE_BASE*ZM_WEB_LIST_THUMB_WIDTH)/$event['Width'];
		$thumb_height = reScale( $event['Height'], $scale );
	}
	elseif ( ZM_WEB_LIST_THUMB_HEIGHT )
	{
		$thumb_height = ZM_WEB_LIST_THUMB_HEIGHT;
		$scale = (SCALE_BASE*ZM_WEB_LIST_THUMB_HEIGHT)/$event['Height'];
		$thumb_width = reScale( $event['Width'], $scale );
	}
	else
	{
		die( "No thumbnail width or height specified, please check in Options->Web" );
	}

	$image_data = getImageSrc( $event, $frame, $scale );
	$thumb_data = $frame;
	$thumb_data['Path'] = $image_data['thumbPath'];
	$thumb_data['Width'] = (int)$thumb_width;
	$thumb_data['Height'] = (int)$thumb_height;

	return( $thumb_data );
}

function createVideo( $event, $format, $rate, $scale, $overwrite=false )
{
	if ( version_compare( phpversion(), "4.3.10", ">=") )
		$command = ZM_PATH_BIN."/zmvideo.pl -e ".$event['Id']." -f ".$format." -r ".sprintf( "%.2F", ($rate/RATE_BASE) )." -s ".sprintf( "%.2F", ($scale/SCALE_BASE) );
	else
		$command = ZM_PATH_BIN."/zmvideo.pl -e ".$event['Id']." -f ".$format." -r ".sprintf( "%.2f", ($rate/RATE_BASE) )." -s ".sprintf( "%.2f", ($scale/SCALE_BASE) );
	if ( $overwrite )
		$command .= " -o";
	$result = exec( $command, $output, $status );
	return( $status?"":rtrim($result) );
}

// Now deprecated
function createImage( $monitor, $scale )
{
	if ( is_array( $monitor ) )
	{
		$monitor = $monitor['Id'];
	}
	chdir( ZM_DIR_IMAGES );
	$command = getZmuCommand( " -m $monitor -i" );
	if ( !empty($scale) && $scale < 100 )
		$command .= " -S $scale";
	$status = exec( escapeshellcmd( $command ) );
	chdir( '..' );
	return( $status );
}

function reScale( $dimension, $dummy )
{
	for ( $i = 1; $i < func_num_args(); $i++ )
	{
		$scale = func_get_arg( $i );
		if ( !empty($scale) && $scale != SCALE_BASE )
			$dimension = (int)(($dimension*$scale)/SCALE_BASE);
	}
	return( $dimension );
}

function deScale( $dimension, $dummy )
{
	for ( $i = 1; $i < func_num_args(); $i++ )
	{
		$scale = func_get_arg( $i );
		if ( !empty($scale) && $scale != SCALE_BASE )
			$dimension = (int)(($dimension*SCALE_BASE)/$scale);
	}
	return( $dimension );
}

function parseSort( $save_to_session=false, $term_sep='&' )
{
	global $sort_field, $sort_asc; // Inputs
	global $sort_query, $sort_column, $sort_order; // Outputs
	global $limit;

	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SESSION;
	}

	if ( !isset($sort_field) )
	{
		$sort_field = ZM_WEB_EVENT_SORT_FIELD;
		$sort_asc = (ZM_WEB_EVENT_SORT_ORDER == "asc");
	}
	switch( $sort_field )
	{
		case 'Id' :
			$sort_column = "E.Id";
			break;
		case 'MonitorName' :
			$sort_column = "M.Name";
			break;
		case 'Name' :
			$sort_column = "E.Name";
			break;
		case 'Cause' :
			$sort_column = "E.Cause";
			break;
		case 'DateTime' :
		case 'StartTime' :
			$sort_column = "E.StartTime";
			break;
		case 'Length' :
			$sort_column = "E.Length";
			break;
		case 'Frames' :
			$sort_column = "E.Frames";
			break;
		case 'AlarmFrames' :
			$sort_column = "E.AlarmFrames";
			break;
		case 'TotScore' :
			$sort_column = "E.TotScore";
			break;
		case 'AvgScore' :
			$sort_column = "E.AvgScore";
			break;
		case 'MaxScore' :
			$sort_column = "E.MaxScore";
			break;
		default:
			$sort_column = "E.StartTime";
			break;
	}
	$sort_order = $sort_asc?"asc":"desc";
	if ( !$sort_asc ) $sort_asc = 0;
	$sort_query = $term_sep."sort_field=".$sort_field.$term_sep."sort_asc=".$sort_asc;
	if ( !isset($limit) ) $limit = "";
	if ( $save_to_session )
	{
		$_SESSION['sort_field'] = $sort_field;
		$_SESSION['sort_asc'] = $sort_asc;
	}
}

function parseFilter( $save_to_session=false, $term_sep='&' )
{
	global $trms; // Inputs
	global $filter_query, $filter_sql, $filter_fields; // Outputs
	if ( version_compare( phpversion(), "4.1.0", "<") )
	{
		global $_SESSION;
	}

	$filter_query = ''; 
	$filter_sql = '';
	$filter_fields = '';

	if ( $trms )
	{
		if ( $save_to_session )
		{
			$_SESSION['trms'] = $trms;
		}
		$filter_query .= $term_sep."trms=".$trms;
		$filter_fields .= '<input type="hidden" name="trms" value="'.$trms.'"/>'."\n";

		for ( $i = 1; $i <= $trms; $i++ )
		{
			$conjunction_name = "cnj$i";
			$obracket_name = "obr$i";
			$cbracket_name = "cbr$i";
			$attr_name = "attr$i";
			$op_name = "op$i";
			$value_name = "val$i";

			global $$conjunction_name, $$obracket_name, $$cbracket_name, $$attr_name, $$op_name, $$value_name;

			if ( isset($$conjunction_name) )
			{
				$filter_query .= $term_sep.$conjunction_name."=".$$conjunction_name;
				$filter_sql .= " ".$$conjunction_name." ";
				$filter_fields .= '<input type="hidden" name="'.$conjunction_name.'" value="'.$$conjunction_name.'"/>'."\n";
				if ( $save_to_session )
				{
					$_SESSION[$conjunction_name] = $$conjunction_name;
				}
			}
			if ( isset($$obracket_name) )
			{
				$filter_query .= $term_sep.$obracket_name."=".$$obracket_name;
				$filter_sql .= str_repeat( "(", $$obracket_name );
				$filter_fields .= '<input type="hidden" name="'.$obracket_name.'" value="'.$$obracket_name.'"/>'."\n";
				if ( $save_to_session )
				{
					$_SESSION[$obracket_name] = $$obracket_name;
				}
			}
			if ( isset($$attr_name) )
			{
				$filter_query .= $term_sep.$attr_name."=".$$attr_name;
				$filter_fields .= '<input type="hidden" name="'.$attr_name.'" value="'.$$attr_name.'"/>'."\n";
				switch ( $$attr_name )
				{
					case 'MonitorName':
						$filter_sql .= 'M.'.preg_replace( '/^Monitor/', '', $$attr_name );
						break;
					case 'DateTime':
						$filter_sql .= "E.StartTime";
						break;
					case 'Date':
						$filter_sql .= "to_days( E.StartTime )";
						break;
					case 'Time':
						$filter_sql .= "extract( hour_second from E.StartTime )";
						break;
					case 'Weekday':
						$filter_sql .= "weekday( E.StartTime )";
						break;
					case 'Id':
					case 'Name':
					case 'MonitorId':
					case 'Length':
					case 'Frames':
					case 'AlarmFrames':
					case 'TotScore':
					case 'AvgScore':
					case 'MaxScore':
					case 'Cause':
					case 'Notes':
					case 'Archived':
						$filter_sql .= "E.".$$attr_name;
						break;
					case 'DiskPercent':
						$filter_sql .= getDiskPercent();
						break;
					case 'DiskBlocks':
						$filter_sql .= getDiskBlocks();
						break;
				}
				$value_list = array();
				foreach ( preg_split( '/["\'\s]*?,["\'\s]*?/', preg_replace( '/^["\']+?(.+)["\']+?$/', '$1', $$value_name ) ) as $value )
				{
					switch ( $$attr_name )
					{
						case 'MonitorName':
						case 'Name':
						case 'Cause':
						case 'Notes':
							$value = "'$value'";
							break;
						case 'DateTime':
							$value = "'".strftime( "%Y-%m-%d %H:%M:%S", strtotime( $value ) )."'";
							break;
						case 'Date':
							$value = "to_days( '".strftime( "%Y-%m-%d %H:%M:%S", strtotime( $value ) )."' )";
							break;
						case 'Time':
							$value = "extract( hour_second from '".strftime( "%Y-%m-%d %H:%M:%S", strtotime( $value ) )."' )";
							break;
						case 'Weekday':
							$value = "weekday( '".strftime( "%Y-%m-%d %H:%M:%S", strtotime( $value ) )."' )";
							break;
					}
					$value_list[] = $value;
				}

				switch ( $$op_name )
				{
					case '=' :
					case '!=' :
					case '>=' :
					case '>' :
					case '<' :
					case '<=' :
						$filter_sql .= " ".$$op_name." $value";
						break;
					case '=~' :
						$filter_sql .= " regexp $value";
						break;
					case '!~' :
						$filter_sql .= " not regexp $value";
						break;
					case '=[]' :
						$filter_sql .= " in (".join( ",", $value_list ).")";
						break;
					case '![]' :
						$filter_sql .= " not in (".join( ",", $value_list ).")";
						break;
				}

				$filter_query .= $term_sep.$op_name."=".urlencode($$op_name);
				$filter_fields .= '<input type="hidden" name="'.$op_name.'" value="'.$$op_name.'"/>'."\n";
				$filter_query .= $term_sep.$value_name."=".urlencode($$value_name);
				$filter_fields .= '<input type="hidden" name="'.$value_name.'" value="'.$$value_name.'"/>'."\n";
				if ( $save_to_session )
				{
					$_SESSION[$attr_name] = $$attr_name;
					$_SESSION[$op_name] = $$op_name;
					$_SESSION[$value_name] = $$value_name;
				}
			}
			if ( isset($$cbracket_name) )
			{
				$filter_query .= $term_sep.$cbracket_name."=".$$cbracket_name;
				$filter_sql .= str_repeat( ")", $$cbracket_name );
				$filter_fields .= '<input type="hidden" name="'.$cbracket_name.'" value="'.$$cbracket_name.'"/>'."\n";
				if ( $save_to_session )
				{
					$_SESSION[$cbracket_name] = $$cbracket_name;
				}
			}
		}
		$filter_sql = " and ( $filter_sql )";
	}
}

function getLoad()
{
	$uptime = shell_exec( 'uptime' );
	$load = '';
	if ( preg_match( '/load average: ([\d.]+)/', $uptime, $matches ) )
		$load = $matches[1];
	return( $load );
}

function getDiskPercent()
{
	$df = shell_exec( 'df '.ZM_DIR_EVENTS );
	$space = -1;
	if ( preg_match( '/\s(\d+)%/ms', $df, $matches ) )
		$space = $matches[1];
	return( $space );
}

function getDiskBlocks()
{
	$df = shell_exec( 'df '.ZM_DIR_EVENTS );
	$space = -1;
	if ( preg_match( '/\s(\d+)\s+\d+\s+\d+%/ms', $df, $matches ) )
		$space = $matches[1];
	return( $space );
}

// Function to fix a problem whereby the built in PHP session handling 
// features want to put the sid as a hidden field after the form or 
// fieldset tag, neither of which will work with strict XHTML Basic.
function sidField()
{
	if ( SID )
	{
		list( $sessname, $sessid ) = split( "=", SID );
?>
<input type="hidden" name="<?= $sessname ?>" value="<?= $sessid ?>"/>
<?php
	}
}

function verNum( $version )
{
	$vNum = "";
	$maxFields = 3;
	$vFields = explode( ".", $version );
	array_splice( $vFields, $maxFields );
	while ( count($vFields) < $maxFields )
	{
		$vFields[] = 0;
	}
	foreach ( $vFields as $vField )
	{
		$vField = sprintf( "%02d", $vField );
		while ( strlen($vField) < 2 )
		{
			$vField = "0".$vField;
		}
		$vNum .= $vField;
	}
	return( $vNum );
}

function fixSequences()
{
	$sql = "select * from Monitors order by Sequence asc, Id asc";
	$result = mysql_query( $sql );
	if ( !$result )
		echo mysql_error();
	$sequence = 1;
	while ( $monitor = mysql_fetch_assoc( $result ) )
	{
		if ( $monitor['Sequence'] != $sequence )
		{
			$sql2 = "update Monitors set Sequence = '".$sequence."' where Id = '".$monitor['Id']."'";
			$result2 = mysql_query( $sql2 );
			if ( !$result2 )
				echo mysql_error();
		}
		$sequence++;
	}
	mysql_free_result( $result );
}

function firstSet()
{
	foreach ( func_get_args() as $arg )
	{
		if ( !empty( $arg ) )
			return( $arg );
	}
}

function linesIntersect( $line1, $line2 )
{
	global $debug;

	$min_x1 = min( $line1[0]['x'], $line1[1]['x'] );
	$max_x1 = max( $line1[0]['x'], $line1[1]['x'] );
	$min_x2 = min( $line2[0]['x'], $line2[1]['x'] );
	$max_x2 = max( $line2[0]['x'], $line2[1]['x'] );
	$min_y1 = min( $line1[0]['y'], $line1[1]['y'] );
	$max_y1 = max( $line1[0]['y'], $line1[1]['y'] );
	$min_y2 = min( $line2[0]['y'], $line2[1]['y'] );
	$max_y2 = max( $line2[0]['y'], $line2[1]['y'] );

	// Checking if bounding boxes intersect
	if ( $max_x1 < $min_x2 || $max_x2 < $min_x1 ||$max_y1 < $min_y2 || $max_y2 < $min_y1 )
	{
		if ( $debug ) echo "Not intersecting, out of bounds<br>";
		return( false );
	}

	$dx1 = $line1[1]['x'] - $line1[0]['x'];
	$dy1 = $line1[1]['y'] - $line1[0]['y'];
	$dx2 = $line2[1]['x'] - $line2[0]['x'];
	$dy2 = $line2[1]['y'] - $line2[0]['y'];

	if ( $dx1 )
	{
		$m1 = $dy1/$dx1;
		$b1 = $line1[0]['y'] - ($m1 * $line1[0]['x']);
	}
	else
	{
		$b1 = $line1[0]['y'];
	}
	if ( $dx2 )
	{
		$m2 = $dy2/$dx2;
		$b2 = $line2[0]['y'] - ($m2 * $line2[0]['x']);
	}
	else
	{
		$b2 = $line2[0]['y'];
	}

	if ( $dx1 && $dx2 ) // Both not vertical
	{
		if ( $m1 != $m2 ) // Not parallel or colinear
		{
			$x = ( $b2 - $b1 ) / ( $m1 - $m2 );

			if ( $x >= $min_x1 && $x <= $max_x1 && $x >= $min_x2 && $x <= $max_x2 )
			{
				if ( $debug ) echo "Intersecting, at x $x<br>";
				return( true );
			}
			else
			{
				if ( $debug ) echo "Not intersecting, out of range at x $x<br>";
				return( false );
			}
		}
		elseif ( $b1 == $b2 )
		{
			// Colinear, must overlap due to box check, intersect? 
			if ( $debug ) echo "Intersecting, colinear<br>";
			return( true );
		}
		else
		{
			// Parallel
			if ( $debug ) echo "Not intersecting, parallel<br>";
			return( false );
		}
	}
	elseif ( !$dx1 ) // Line 1 is vertical
	{
		$y = ( $m2 * $line1[0]['x'] ) * $b2;
		if ( $y >= $min_y1 && $y <= $max_y1 )
		{
			if ( $debug ) echo "Intersecting, at y $y<br>";
			return( true );
		}
		else
		{
			if ( $debug ) echo "Not intersecting, out of range at y $y<br>";
			return( false );
		}
	}
	elseif ( !$dx2 ) // Line 2 is vertical
	{
		$y = ( $m1 * $line2[0]['x'] ) * $b1;
		if ( $y >= $min_y2 && $y <= $max_y2 )
		{
			if ( $debug ) echo "Intersecting, at y $y<br>";
			return( true );
		}
		else
		{
			if ( $debug ) echo "Not intersecting, out of range at y $y<br>";
			return( false );
		}
	}
	else // Both lines are vertical
	{
		if ( $line1[0]['x'] == $line2[0]['x'] )
		{
			// Colinear, must overlap due to box check, intersect? 
			if ( $debug ) echo "Intersecting, vertical, colinear<br>";
			return( true );
		}
		else
		{
			// Parallel
			if ( $debug ) echo "Not intersecting, vertical, parallel<br>";
			return( false );
		}
	}
	if ( $debug ) echo "Whoops, unexpected scenario<br>";
	return( false );
}

function isSelfIntersecting( $points )
{
	global $debug;

	$n_coords = count($points);
	$edges = array();
	for ( $j = 0, $i = $n_coords-1; $j < $n_coords; $i = $j++ )
	{
		$edges[] = array( $points[$i], $points[$j] );
	}

	for ( $i = 0; $i <= ($n_coords-2); $i++ )
	{
		for ( $j = $i+2; $j < $n_coords+min(0,$i-1); $j++ )
		{
			if ( $debug ) echo "Checking $i and $j<br>";
			if ( linesIntersect( $edges[$i], $edges[$j] ) )
			{
				if ( $debug ) echo "Lines $i and $j intersect<br>";
				return( true );
			}
		}
	}
	return( false );
}

function getPolyCentre( $points, $area=0 )
{
	$cx = 0.0;
	$cy = 0.0;
	if ( !$area )
		$area = getPolyArea( $points );
	for ( $i = 0, $j = count($points)-1; $i < count($points); $j = $i++ )
	{
		$ct = ($points[$i]['x'] * $points[$j]['y']) - ($points[$j]['x'] * $points[$i]['y']);
		$cx += ($points[$i]['x'] + $points[$j]['x']) * ct;
		$cy += ($points[$i]['y'] + $points[$j]['y']) * ct;
	}
	$cx = intval(round(abs($cx/(6.0*$area))));
	$cy = intval(round(abs($cy/(6.0*$area))));
	printf( "X:%cx, Y:$cy<br>" );
	return( array( 'x'=>$cx, 'y'=>$cy ) );
}

function _CompareXY( $a, $b )
{
	if ( $a['min_y'] == $b['min_y'] )
		return( intval($a['min_x'] - $b['min_x']) );
	else
		return( intval($a['min_y'] - $b['min_y']) );
}

function _CompareX( $a, $b )
{
	return( intval($a['min_x'] - $b['min_x']) );
}

function getPolyArea( $points )
{
	//error_reporting( E_ALL );
	global $debug;

	$n_coords = count($points);
	$global_edges = array();
	for ( $j = 0, $i = $n_coords-1; $j < $n_coords; $i = $j++ )
	{
		$x1 = $points[$i]['x'];
		$x2 = $points[$j]['x'];
		$y1 = $points[$i]['y'];
		$y2 = $points[$j]['y'];

		//printf( "x1:%d,y1:%d x2:%d,y2:%d\n", x1, y1, x2, y2 );
		if ( $y1 == $y2 )
			continue;

		$dx = $x2 - $x1;
		$dy = $y2 - $y1;

		$global_edges[] = array(
			"min_y" => $y1<$y2?$y1:$y2,
			"max_y" => ($y1<$y2?$y2:$y1)+1,
			"min_x" => $y1<$y2?$x1:$x2,
			"_1_m" => $dx/$dy,
		);
	}

	usort( $global_edges, "_CompareXY" );

	if ( $debug )
	{
		for ( $i = 0; $i < count($global_edges); $i++ )
		{
			printf( "%d: min_y: %d, max_y:%d, min_x:%.2f, 1/m:%.2f<br>", $i, $global_edges[$i]['min_y'], $global_edges[$i]['max_y'], $global_edges[$i]['min_x'], $global_edges[$i]['_1_m'] );
		}
	}

	$area = 0.0;
	$active_edges = array();
	$y = $global_edges[0]['min_y'];
	do 
	{
		for ( $i = 0; $i < count($global_edges); $i++ )
		{
			if ( $global_edges[$i]['min_y'] == $y )
			{
				if ( $debug ) printf( "Moving global edge<br>" );
				$active_edges[] = $global_edges[$i];
				array_splice( $global_edges, $i, 1 );
				$i--;
			}
			else
			{
				break;
			}
		}
		usort( $active_edges, "_CompareX" );
		if ( $debug )
		{
			for ( $i = 0; $i < count($active_edges); $i++ )
			{
				printf( "%d - %d: min_y: %d, max_y:%d, min_x:%.2f, 1/m:%.2f<br>", $y, $i, $active_edges[$i]['min_y'], $active_edges[$i]['max_y'], $active_edges[$i]['min_x'], $active_edges[$i]['_1_m'] );
			}
		}
		$last_x = 0;
		$row_area = 0;
		$parity = false;
		for ( $i = 0; $i < count($active_edges); $i++ )
		{
			$x = intval(round($active_edges[$i]['min_x']));
			if ( $parity )
			{
				$row_area += ($x - $last_x)+1;
				$area += $row_area;
			}
			if ( $active_edges[$i]['max_y'] != $y )
				$parity = !$parity;
			$last_x = $x;
		}
		if ( $debug ) printf( "%d: Area:%d<br>", $y, $row_area );
		$y++;
		for ( $i = 0; $i < count($active_edges); $i++ )
		{
			if ( $y >= $active_edges[$i]['max_y'] ) // Or >= as per sheets
			{
				if ( $debug ) printf( "Deleting active_edge<br>" );
				array_splice( $active_edges, $i, 1 );
				$i--;
			}
			else
			{
				$active_edges[$i]['min_x'] += $active_edges[$i]['_1_m'];
			}
		}
	} while ( count($global_edges) || count($active_edges) );
	if ( $debug ) printf( "Area:%d<br>", $area );
	return( $area );
}

function getPolyAreaOld( $points )
{
	$area = 0.0;
	$edge = 0.0;
	for ( $i = 0, $j = count($points)-1; $i < count($points); $j = $i++ )
	{
		$x_diff = ($points[$i]['x'] - $points[$j]['x']);
		$y_diff = ($points[$i]['y'] - $points[$j]['y']);
		$y_sum = ($points[$i]['y'] + $points[$j]['y']);
		$trap_edge = sqrt(pow(abs($x_diff)+1,2) + pow(abs($y_diff)+1,2) );
		$edge += $trap_edge;
		$trap_area = ($x_diff * $y_sum );
		$area += $trap_area;
		printf( "%d->%d, %d-%d=%.2f, %d+%d=%.2f(%.2f), %.2f, %.2f<br>", i, j, $points[$i]['x'], $points[$j]['x'], $x_diff, $points[$i]['y'], $points[$j]['y'], $y_sum, $y_diff, $trap_area, $trap_edge );
	}
	$edge = intval(round(abs($edge)));
	$area = intval(round((abs($area)+$edge)/2));
	echo "E:$edge<br>";
	echo "A:$area<br>";
	return( $area );
}

function mapCoords( $a )
{
	return( $a['x'].",".$a['y'] );
}

function pointsToCoords( $points )
{
	return( join( " ", array_map( "mapCoords", $points ) ) );
}

function coordsToPoints( $coords )
{
	$points = array();
	if ( preg_match_all( '/(\d+,\d+)+/', $coords, $matches ) )
	{
		for ( $i = 0; $i < count($matches[1]); $i++ )
		{
			if ( preg_match( '/(\d+),(\d+)/', $matches[1][$i], $cmatches ) )
			{
				$points[] = array( 'x'=>$cmatches[1], 'y'=>$cmatches[2] );
			}
			else
			{
				echo( "Bogus coordinates '".$matches[$i]."'" );
				return( false );
			}
		}
	}
	else
	{
		echo( "Bogus coordinate string '$coords'" );
		return( false );
	}
	return( $points );
}

function getLanguages()
{
	$langs = array();
	foreach ( glob("zm_lang_*_*.php") as $file )
	{
		preg_match( '/zm_lang_(.+_.+)\.php/', $file, $matches );
		$langs[$matches[1]] = $matches[1];
	}
	return( $langs );
}

function trimString( $string, $length )
{
	return( preg_replace( '/^(.{'.$length.',}?)\b.*$/', '\\1&hellip;', $string ) );
}

function monitorIdsToNames( $ids )
{
	global $mITN_monitors;
	if ( !$mITN_monitors )
	{
		$sql = "select Id, Name from Monitors";
		$result = mysql_query( $sql );
		if ( !$result )
			echo mysql_error();
		while ( $monitor = mysql_fetch_assoc( $result ) )
		{
			$mITN_monitors[$monitor['Id']] = $monitor;
		}
	}
	$names = array();
	foreach ( preg_split( '/\s*,\s*/', $ids ) as $id )
	{
		if ( visibleMonitor( $id ) )
		{
			if ( isset($mITN_monitors[$id]) )
			{
				$names[] = $mITN_monitors[$id]['Name'];
			}
		}
	}
	$name_string = join( ', ', $names );
	return( $name_string );
}
?>
