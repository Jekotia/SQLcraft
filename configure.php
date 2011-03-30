<?php
	$db = 'sqlcraft.db';
	session_start();
	$ignore_redirect = false;
	include_once 'init.php';
	$page_title = 'Configure';
	$page = 'configure';
	include_once 'tpl1.php';

	if (isset($_POST['trigger']) and $_POST['trigger'] == true)
	{
		$mysql_host = $_POST['mysql_host'];
		$mysql_user = $_POST['mysql_user'];
		$mysql_pass = $_POST['mysql_pass'];
		$mysql_db = $_POST['mysql_db'];
		$path_wr = $_POST['path_wr'];
		$path_fs = $_POST['path_fs'];
		$path_mc = $_POST['path_mc'];
		if (isset($_POST['sc_auth']))
			{$sc_auth = $_POST['sc_auth'];}
			else {$sc_auth = 0;}
		if (isset($_POST['sc_local']))			
			{$sc_local = $_POST['sc_local'];}
			else {$sc_local = 0;}
		if (isset($_POST['sc_linux']))
			{$sc_linux = $_POST['sc_linux'];}
			else {$sc_linux = 0;}
		$sc_screen = $_POST['sc_screen'];
		
		$db->exec(" UPDATE configuration SET value='".$mysql_host."' WHERE id='mysql_host' ");
		$db->exec(" UPDATE configuration SET value='".$mysql_user."' WHERE id='mysql_user' ");
		$db->exec(" UPDATE configuration SET value='".$mysql_pass."' WHERE id='mysql_pass' ");
		$db->exec(" UPDATE configuration SET value='".$mysql_db."' WHERE id='mysql_db' ");

		$db->exec(" UPDATE configuration SET value='".$path_wr."' WHERE id='path_wr' ");
		$db->exec(" UPDATE configuration SET value='".$path_fs."' WHERE id='path_fs' ");
		$db->exec(" UPDATE configuration SET value='".$path_mc."' WHERE id='path_mc' ");

		$db->exec(" UPDATE configuration SET value='".$sc_auth."' WHERE id='sc_auth' ");
		$db->exec(" UPDATE configuration SET value='".$sc_local."' WHERE id='sc_local' ");
		$db->exec(" UPDATE configuration SET value='".$sc_linux."' WHERE id='sc_linux' ");
		$db->exec(" UPDATE configuration SET value='".$sc_screen."' WHERE id='sc_screen' ");

		echo 'Configuration has been updated!';
		include_once 'tpl2.php';
		die();
	}
?>
	<form name="configuration" method="post" action="configure.php">
		MySQL Settings
		<br />
		mysql_host <input type="text" name="mysql_host" value="<?php echo $mysql_host; ?>"/>
		<br />
		mysql_user <input type="text" name="mysql_user" value="<?php echo $mysql_user; ?>"/>
		<br />
		mysql_pass <input type="password" name="mysql_pass" value="<?php echo $mysql_pass; ?>"/>
		<br />
		mysql_db <input type="text" name="mysql_db" value="<?php echo $mysql_db; ?>"/>
		<br /><br />
		Path Settings
		<br />
		path_wr <input type="text" name="path_wr" value="<?php echo $path_wr; ?>"/>
		<br />
		path_fs <input type="text" name="path_fs" value="<?php echo $path_fs; ?>"/>
		<br />
		path_mc <input type="text" name="path_mc" value="<?php echo $path_mc; ?>"/>
		<br /><br />
		System Settings
		<br />
		sc_auth <input type="checkbox" name="sc_auth" value="1" <?php if ($sc_auth == true){echo 'checked';} ?>/>
		<br />
		sc_local <input type="checkbox" name="sc_local" value="1" <?php if ($sc_local == true){echo 'checked';} ?>/>
		<br />
		sc_linux <input type="checkbox" name="sc_linux" value="1" <?php if ($sc_linux == true){echo 'checked';} ?>/>
		<br />
		sc_screen <input type="text" name="sc_screen" value="<?php echo $sc_screen; ?>"/>
		<br /><br />
		<input name="trigger" type="hidden" value="true">
		<input type="submit" value="Save Changes" />
	</form>
<?php include_once 'tpl2.php'; ?>