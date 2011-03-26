<?php
	session_start();
	$ignore_redirect = false;
	include_once '../init.php';
	if ($auth_enabled == false){header("location:../home.php");}
	$pass_changed = false;
	$page_title = 'Manage Users';
	$page = 'manageusers';
	include_once ''.$sc_path_fs.'/tpl1.php';
?>

			$db = '../sqlcraft.db';
			$db = new SQLite3($db);
//Compare username and password hash against database
			$result = $db->query("SELECT * FROM users WHERE username='$user' and password='$pass_old'");
			while($row = $result->fetchArray(SQLITE3_ASSOC))

<?php include_once ''.$sc_path_fs.'/tpl2.php'; ?>