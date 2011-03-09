<?php
	//Set this to your MySQL host address. Some servers are configured oddly and there CAN be a difference
	//between localhost and 127.0.0.1
		$mysql_host			=	'localhost';
	//The username you want to connect to MySQL with
		$mysql_user			=	'root';
	//The MySQL password for the above user
		$mysql_pass			=	'derp';
	//
		$mysql_db			=	'sqlcraft';

	//Set this to true only if your Minecraft server is running on the same server as SQLcraft
	//This enables local-only features like SQLite support
		$sc_local			=	false;
	//The absolute path to SQLcraft. Include ALL /'s
		$sc_path_sc		 	=	'C:/xampp/htdocs/SQLcraft/';
	//The absolute path to the Minecraft server. include ALL /'s
		$sc_path_mc			=	'C:/SQLcraft/';
	//Enables linux only functionality, such as sending commands to a MC server running in a screen!
	//Reliant on $sc_local = true
		$sc_linux 			=	false;
	//The name of the the screen session the Minecraft server is run in
		$sc_screen 			=	'mcserver';
?>