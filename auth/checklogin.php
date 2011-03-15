<?php
	//'Initialize' SQLcraft
		include_once '../init.php';
	
		ob_start();
	// username and password sent from form
		$auth_username = $_POST['auth_username'];
		$auth_password = $_POST['auth_password'];
		$login_valid = false;
		$db_username = '';
		$db_password = '';
	
	// To protect MySQL injection (more detail about MySQL injection)
		$auth_username = stripslashes($auth_username);
		$auth_password = stripslashes($auth_password);
		$auth_username = mysql_real_escape_string($auth_username);
		$auth_password = mysql_real_escape_string($auth_password);
		$auth_password = md5($auth_password);
	
		$db = new SQLite3('../sqlcraft.db');
	
		$result = $db->query("SELECT * FROM users WHERE username='$auth_username' and password='$auth_password'");
			while($row = $result->fetchArray(SQLITE3_ASSOC))
			{
				//echo ''.$row['uid'].','.$row['username'].','.$row['password'].'';
				$db_username = $row['username'];
				$db_password = $row['password'];
				$login_valid = true;
			};
	
		if ($auth_username = $db_username and $auth_password = $db_password and $login_valid == true)
		{
		// Register $auth_username, $auth_password and redirect to file "login_success.php"
			session_register("auth_username");
			session_register("auth_password");
			header("location:login_success.php");
			//setcookie("user","'$login_user'","time()+1800");
			//echo("$auth_username,$auth_password,$db_username,$db_password");
		}
		else
		{
			echo "Wrong Username or Password";
		}
		ob_end_flush();
?>