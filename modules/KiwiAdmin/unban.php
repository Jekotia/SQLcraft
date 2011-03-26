<?php
	session_start();
	$ignore_redirect = false;
	include_once '../../init.php';
	include_once ''.$sc_path_fs.'/modules/KiwiAdmin/config.php';
	$page_title = 'KiwiAdmin Module - Unban Script';
	$page = 'KiwiAdmin';
	include_once ''.$sc_path_fs.'/tpl1.php';

//store POST data in variable
	$unban_name = $_POST['unban_name'];

//query to report unban
	if ($unban_name == NULL)
	{	
		echo "You must specify a players name!<br />Click <a href='index.php'>here</a> to continue.";
	}
	else
	{
		$result = mysql_query("SELECT * FROM ".$ka_bantable." WHERE name='".$unban_name."'");
		while($row = mysql_fetch_array($result))
		{
			echo "<i>".$row['name']."</i> is about to be unbanned. They were originally banned for <u>".$row['reason']."</u> by <b>".$row['admin']."</b> at the date and time of ".$row['time']."";
		}
		echo "<br /> Executing query...";
			
		$query = "DELETE FROM ".$ka_bantable." WHERE name='".$unban_name."'";
		if (!mysql_query($query))
		{
			echo "<br />Error updating database! Either this player is <i>not</i> banned or something in SQLcraft broke!";
		}
		else
		{
			mysql_query($query);
			if ($sc_linux == true AND $sc_local == true)
			{
				shell_exec('screen -S '.$sc_screen.' -X exec .\!\! echo "reloadka"');
				echo "<br />Issuing 'reloadka' to the server screen...";
			}
			echo "<br />Unban successful!";
		}
		echo "<br />Click <a href='index.php'>here</a> to continue.";
	}
	include_once ''.$sc_path_fs.'/tpl2.php';
?>