<?php
	$db = 'sqlcraft.db';
		$ignore_redirect = false;	
	//includes config and MySQL auth
		include_once 'init.php';

	//Reports the document root
		echo "SQLcraft's Document Root is ".$_SERVER["DOCUMENT_ROOT"]."";
	
	//Confirms MySQL is connecting
		if ($con)
		{
			echo '<br /><br />MySQL: Successfully connected to <i>'.$mysql_db.'</i> as <i>'.$mysql_user.'</i> on <i>'.$mysql_host.'</i> using the provided password.';
		}

	//Simple check of the sc_local variable
		if ($sc_local == true)
		{
			echo "<br /><br />SQLcraft is <u>not</u> running on the same server as your Minecraft server.";
		}
		elseif ($sc_local == false)
		{
			echo "<br /><br />SQLcraft <b>is</b> running on the same server as your Minecraft server.";
		}
	//Reports value of $sc_path_sc
		echo "<br /><br /><i>".$sc_path_sc."</i> is the location of SQLcraft on your server";
	//Reports value of $sc_path_mc, IF SQLcraft is running on the same server as the MC server ($sc_local == true)
		if ($sc_local == true)
		{
			echo "<br /><br /><i>".$sc_path_mc."</i> is the location of Minecraft on your server";
			if ($sc_linux == true)
			{
				echo "<br /><br />Linux-only functionality is <u>enabled</u>.";
				echo "<br /><br />The name of the screensession SQLcraft will send commands to is <i>".$sc_screen."</i>";
			}
			elseif ($sc_linux == false)
			{
				echo "<br /><br />Linux only functionality is <u>disabled</u>";
			}
		}
	//Simple check of the auth_enabled variable
		if ($auth_enabled == false)
		{
			echo "<br /><br />SQLcraft's built-in authentication system is <u>not</u> in use.";
		}
		elseif ($sc_local == true)
		{
			echo "<br /><br />SQLcraft's built-in authentication system <b>is</b> in use.";
		}
?>