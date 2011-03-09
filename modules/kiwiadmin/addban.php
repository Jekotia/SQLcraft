<?php
	include_once("../../config.php");
	include_once("../../auth.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Add Ban</title>
	</head>
	<body>
		<?php
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
			
			echo "".$addban_name." is to be banned for ''".$addban_reason.",'' by ".$addban_admin."";
			echo "</br>Executing query... ";

			$query = "INSERT INTO banlist (name,reason,admin)
			VALUES ('".$addban_name."','".$addban_reason."','".$addban_admin."')";
			if (!mysql_query($query))
				{
				echo "Error updating database! Either this player is already banned or you managed to break one of the most basic scripts in all of Minecraft...</br>";
				}
			else
				{
				mysql_query($query);
				echo "Ban successful!</br>";
				}
			echo "Click <a href='index.php'>here</a> to continue.";
		?>
		</br>
	</body>
</html>