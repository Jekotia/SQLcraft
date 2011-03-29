<?php
	session_start();
	$ignore_redirect = false;
	include_once '../init.php';
	if ($auth_enabled == false){header("location:../home.php");}
	$pass_changed = false;
	$page_title = 'Manage Users';
	$page = 'manageusers';
	include_once ''.$sc_path_fs.'/tpl1.php';

//Pretty much useless as-is base code. Copied from another script in the project as a starting point.
			$db = '../sqlcraft.db';
			$db = new SQLite3($db);
			$result = $db->query("SELECT * FROM users");
			while($row = $result->fetchArray(SQLITE3_ASSOC))
			{
				echo $row['username'];
			}

	include_once ''.$sc_path_fs.'/tpl2.php';
?>