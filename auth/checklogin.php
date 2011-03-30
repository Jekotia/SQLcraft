<?php
	$db = '../sqlcraft.db';
//Initialize
	session_start();
	$ignore_redirect = true;
	include_once '../init.php';
	if ($sc_auth == false){header("location:../home.php");}
//username and password sent from form
	$auth_username = $_POST['auth_username'];
	$auth_password = $_POST['auth_password'];
//prepare vars to avoid issues, possibly unnecessary precaution
	$db_username = '';
	$db_password = '';
// To protect MySQL injection (copy+paste from w3schools, slight modification)
	$auth_username = stripslashes($auth_username);
	$auth_password = stripslashes($auth_password);
	$auth_username = mysql_real_escape_string($auth_username);
	$auth_password = mysql_real_escape_string($auth_password);
//'Encrypt' the password as a md5 hash
	$auth_password = md5($auth_password);
//Prepare for SQLite access
	$db = '../sqlcraft.db';
	$db = new SQLite3($db);
//Compare username and password hash against database
	$result = $db->query("SELECT * FROM users WHERE username='$auth_username' and password='$auth_password'");
		while($row = $result->fetchArray(SQLITE3_ASSOC))
		{
//If the username and password hash match the database, store the database values in vars
			$db_username	=	$row['username'];
			$db_password	=	$row['password'];
//Variable to indicate the login info is valid
			$valid_login	=	true;
//Generate the 64char token
			$db_token_1 = rand(1000000,9999999);
			$db_token_1 = md5($db_token_1);
			$db_token_2 = rand(1000000,9999999);
			$db_token_2 = md5($db_token_2);
			$db_token = ($db_token_1.$db_token_2);
//Write the generated token to the 'token' column of the users' row in the database
			$db->exec(" UPDATE users SET token='".$db_token."' WHERE username='".$db_username."' ");
//Set cookies containing the username and token
			setcookie("sqlcraft_user", "$db_username", time()+1800, '/');
			setcookie("sqlcraft_token", "$db_token", time()+1800, '/');
//If debug mode is off, enable 'automatic-forwarding'
			if ($debug==false){header("location:login_success.php");}
		}
	if (!isset($valid_login))
	{
		$valid_login = false;
		$_SESSION['valid_login'] = $valid_login;
		if ($debug==false){header("location:../");}
	}
?>