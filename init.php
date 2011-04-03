<?php
	$db = new SQLite3($db);

	$result = $db->query("SELECT value FROM configuration WHERE id='mysql_host'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$mysql_host = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='mysql_user'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$mysql_user = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='mysql_pass'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$mysql_pass = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='mysql_db'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$mysql_db = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='path_wr'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$path_wr = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='path_fs'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$path_fs = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='path_mc'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$path_mc = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='sc_auth'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$sc_auth = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='sc_local'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$sc_local = $row['value'];
	
	$result = $db->query("SELECT value FROM configuration WHERE id='sc_linux'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$sc_linux = $row['value'];

	$result = $db->query("SELECT value FROM configuration WHERE id='sc_screen'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$sc_screen = $row['value'];

	$result = $db->query("SELECT value FROM configuration WHERE id='cn_user'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$cn_user = $row['value'];

	$result = $db->query("SELECT value FROM configuration WHERE id='cn_token'");
    $row = $result->fetchArray(SQLITE3_ASSOC);
	$cn_token = $row['value'];

	$sc_ver 				=	'0.1.1';

//WARNING: Debug mode is intended for developers only and should not be used on a SQLcraft
//installation connected to a server. It may reveal data that could compromise a 'live'
//installation, such as passwords. It can also seemingly break SQLcraft as certain lines of
//code are not executed as they normally would. It is intended for DEVELOPMENT PURPOSES ONLY
	$debug				=	false;
	
		
	include_once ''.$path_fs.'/mysql.php';

	if ($sc_auth == true)
	{
		echo '1';
  		if (isset($_COOKIE[''.$cn_user.'']) and isset($_COOKIE[''.$cn_token.'']))
		{
			echo '2';
			$cookie_user = md5($_COOKIE[''.$cn_user.'']);
			$cookie_token = $_COOKIE[''.$cn_token.''];
			$result = $db->query('SELECT * FROM users WHERE username="'.$cookie_user.'" and token="'.$cookie_token.'"');
			while($row = $result->fetchArray(SQLITE3_ASSOC))
			if($cookie_user = $row['username'] and $cookie_token = $row['token'])
			{
				echo '3';
				$cookie_valid = true;
				if ($cookie_valid == false and $ignore_redirect == true)
				{
					echo '4';
					setcookie(''.$cn_user.'', '', time()-1800, '/');
					setcookie(''.$cn_token.'', '', time()-1800, '/');
					header('location:'.$path_wr);
				}
			}
		}
		elseif ($ignore_redirect==false)
	 	{
			$cookie_valid = false;
			echo '$cookie_valid = false;';
			header('location:'.$path_wr);
	 	}
	}
?>