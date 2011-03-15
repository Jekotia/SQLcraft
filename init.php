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
		$auth_enabled		=	false;
		
		include_once ''.$sc_path_fs.'/mysql.php';

	if ($auth_enabled == true)
	{
		if ($ignore_redirect == false)
		{
			//session_start();
			if(!session_is_registered(auth_username))
			{
				$head_loc = $sc_path_wr.'/index.php';
				//header("location:'$head_loc'");
				//header("location:''.$head_loc.'/SQLcraft/auth/login.php'");
				//header("location:/SQLcraft/auth/login.php");
				header( "Location:".$head_loc."");
			}
		}
	}
	
	$sc_ver 				=	'0.1.1';
?>