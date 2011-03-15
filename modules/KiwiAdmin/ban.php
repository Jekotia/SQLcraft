<?php
		include_once '../../init.php';
		include_once ''.$sc_path_fs.'/modules/KiwiAdmin/config.php';
		$page_title = 'SQLcraft - KiwiAdmin Module - Ban Script';
		$page = 'KiwiAdmin';
		include_once ''.$sc_path_fs.'/tpl1.php';

	//Gets ban query data from $_POST
		$addban_name = $_POST['addban_name'];
		$addban_reason = $_POST['addban_reason'];
		$addban_admin = $_POST['addban_admin'];
		
	//Sanatizes the the player name and the admin name
		$addban_name = strtolower($addban_name);
		$addban_admin = strtolower($addban_admin);
		$addban_name = trim($addban_name);
		$addban_admin = trim($addban_admin);
		$addban_name = preg_replace("/[^a-z0-9\s]/", "", $addban_name);
		$addban_admin = preg_replace("/[^a-z0-9\s]/", "", $addban_admin);

	//Old incomplete method preserved incase the above thing that I Googled breaks
		//$addban_name = filter_var($addban_name, FILTER_FLAG_STRIP_HIGH);
		//$addban_admin = filter_var($addban_admin, FILTER_FLAG_STRIP_HIGH);
		
		if ($addban_name == NULL)
		{
			echo "You must specify a players name!<br />Click <a href='index.php'>here</a> to continue.";
		}
		else
		{
			echo "".$addban_name." is to be banned for ''".$addban_reason.",'' by ".$addban_admin."";
			echo "<br />Executing query... ";
	
			$query = "INSERT INTO ".$ka_bantable." (name,reason,admin)
			VALUES ('".$addban_name."','".$addban_reason."','".$addban_admin."')";
			if (!mysql_query($query))
			{
				echo "<br />Error updating database! Either this player is already banned or something in SQLcraft broke!";
			}
			else
			{
				mysql_query($query);
				if ($sc_linux == true AND $sc_local == true)
				{
					shell_exec('screen -S '.$sc_screen.' -X exec .\!\! echo "reloadka"');
					echo "<br />Issuing 'reloadka' to the server screen...";
				}
				echo "<br />Ban successful!";
			}
			echo "<br />Click <a href='index.php'>here</a> to continue.";
		}
		include_once ''.$sc_path_fs.'/tpl2.php';
?>