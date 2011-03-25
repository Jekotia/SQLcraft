<?php
	//Set this to your MySQL host address. Some servers are configured oddly and there CAN be a difference
	//between localhost and 127.0.0.1
		$mysql_host			=	'localhost';
	//The username you want to connect to MySQL with
		$mysql_user			=	'root';
	//The MySQL password for the above user
		$mysql_pass			=	'derp';
	//The MySQL database used by minecraft 
		$mysql_db			=	'sqlcraft';

	//Set this to true only if your Minecraft server is running on the same server as SQLcraft
	//This enables local-only features like SQLite support
		$sc_local			=	false;
	//The webroot for SQLcraft. EXCLUDE TRAILING /
		$sc_path_wr		 	=	'http://localhost/SQLcraft';
	//The absolute path to SQLcraft on the filesystem. EXCLUDE TRAILING /
		$sc_path_fs		 	=	'C:/xampp/htdocs/SQLcraft';
	//The absolute path to the Minecraft server. EXCLUDE TRAILING /
		$sc_path_mc			=	'C:/SQLcraft';
	//Enables linux only functionality, such as sending commands to a MC server running in a screen!
	//Reliant on $sc_local = true
		$sc_linux 			=	false;
	//The name of the the screen session the Minecraft server is run in
		$sc_screen 			=	'mcserver';
	//Enable or disable the built in, buggy authentication system
		$auth_enabled		=	true;
	//WARNING: Debug mode is intended for developers only and should not be used on a SQLcraft
	//installation connected to a server. It reveals data that could compromise a 'live'
	//installation, such as passwords. It is intended for DEVELOPMENT PURPOSES ONLY
		$debug				=	false;
		//$auth_enabled == true and $ignore_redirect == false and 
		
		include_once ''.$sc_path_fs.'/mysql.php';

		if (isset($_COOKIE["sqlcraft_user"]))
  			echo "<br />Welcome " . $_COOKIE["sqlcraft_user"] . "!";
		else
  			echo "<br />Welcome guest!";

  		if (isset($_COOKIE["sqlcraft_token"]))
  			echo "," . $_COOKIE["sqlcraft_token"] . "!";
  			
		//echo '<br />COOKIE1 '.$_COOKIE['sqlcraft_user'];
		//echo '<br />COOKIE2 '.$_COOKIE['sqlcraft_token'];
		//echo "<br /><br /><br />";
		if (isset($_COOKIE["sqlcraft_user"]) and isset($_COOKIE["sqlcraft_token"]))
		{
			echo '<br />'.$_COOKIE['sqlcraft_user'];
			$cookie_user = $_COOKIE['sqlcraft_user'];
			echo '<br />'.$_COOKIE['sqlcraft_user'];

			echo '<br />'.$_COOKIE['sqlcraft_token'];
			$cookie_token = $_COOKIE['sqlcraft_token'];
			echo '<br />'.$_COOKIE['sqlcraft_token'];
			
			$db = ''.$sc_path_fs.'/sqlcraft.db';
			$db = new SQLite3($db);
			$result = $db->query("SELECT * FROM users WHERE username='$cookie_user' and token='$cookie_token'");
			while($row = $result->fetchArray(SQLITE3_ASSOC))
			if($cookie_user = $row['username'] and $cookie_token = $row['token']){;}
			$cookie_valid = true;
		}
		elseif ($ignore_redirect==false)
	 	{
			$cookie_valid = false;
			echo '$cookie_valid = false;';
			header("location:".$sc_path_wr."");
	 	}
	 	if ($ignore_redirect==true)
	 	{
	 		echo "derp";
	 	}
		else
		{
			echo "-DERP-";
			//header("location:".$sc_path_wr."");
		}		
		
	$sc_ver 				=	'0.1.1';
?>