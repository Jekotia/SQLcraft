<?php
//if (!isset($_POST['trigger'])){$derp = md5("admin");	echo $derp;$db = '../sqlcraft.db';$db = new SQLite3($db);$db->exec("UPDATE users SET password='".$derp."' WHERE username='admin' ");}

	session_start();
	$ignore_redirect = false;
	include_once '../init.php';
	if ($auth_enabled == false){header("location:../home.php");}
	$page_title = 'Change Password';
	$page = 'changepass';
	include_once ''.$sc_path_fs.'/tpl1.php';

	if (isset($_POST['trigger']) and $_POST['trigger'] == true)
	{
		$user = $_COOKIE['sqlcraft_user'];
		$pass_old = $_POST['pass_old'];
		$pass_new = $_POST['pass_new'];
		$pass_confirm = $_POST['pass_confirm'];
		$user = stripslashes($user);
		$pass_old = stripslashes($pass_old);
		$pass_new = stripslashes($pass_new);
		$pass_confirm = stripslashes($pass_confirm);
		$user = mysql_real_escape_string($user);
		$pass_old = mysql_real_escape_string($pass_old);
		$pass_new = mysql_real_escape_string($pass_new);
		$pass_confirm = mysql_real_escape_string($pass_confirm);
		$pass_old = md5($pass_old);
		$pass_new = md5($pass_new);
		$pass_confirm = md5($pass_confirm);

		$pass_changed = false;

		$db = '../sqlcraft.db';
		$db = new SQLite3($db);
		$result = $db->query("SELECT password FROM users WHERE username='$user'");
		while($row = $result->fetchArray(SQLITE3_ASSOC))
		$db_password = $row['password'];

		if (strcmp($pass_new,$pass_confirm) == 0)
			{$mismatch = false;}
		else
			{$mismatch = true;}
		
		if (strcmp($pass_old,$db_password) == 0)
			{$wrongpass=false;}
		else
			{$wrongpass=true;}
		
		if ($mismatch==false and $wrongpass==false)
		{
			$db->exec(" UPDATE users SET password='".$pass_new."' WHERE username='".$user."' ");
			$db_token_1 = rand(1000000,9999999);
			$db_token_1 = md5($db_token_1);
			$db_token_2 = rand(1000000,9999999);
			$db_token_2 = md5($db_token_2);
			$db_token = ($db_token_1.$db_token_2);
			$db->exec(" UPDATE users SET token='".$db_token."' WHERE username='".$user."' ");
			setcookie("sqlcraft_user", "$user", time()+1800, '/');
			setcookie("sqlcraft_token", "$db_token", time()+1800, '/');
			
			echo '<span align="center">Password successfully updated!</span>';
			include_once '../tpl2.php';
			die();
		}
		elseif ($mismatch==true and $wrongpass==false)
		{
			echo '<span align="center">The new passwords do not match!</span>';
		}
		elseif ($wrongpass==true and $mismatch==false)
		{
			echo '<span align="center">The <i>old</i> password is incorrect!</span>';
		}
		elseif ($wrongpass==true and $mismatch==true)
		{
			echo '<span align="center">The <u>old</u> password is incorrect, and the new passwords do <u>not</u> match.</span>';
		}
	}

	echo '
	<style>
		div#fields {margin-left: auto; margin-right: 350px; width: 310px; padding: 10px; height: auto;}
		div#field_row {	width: 310px; float: none;}
		div#field_name {width: 150px; float: left;}
		div#field_data {float: right;}
		div#submit {padding-top: 35px; padding-left: 85px;}
	</style>
	<div id="fields">
		<form name="change_password" method="post" action="changepassword.php">
			<div id="field_row">
				<div id="field_name">
					Old Password
				</div>
				<div id="field_data">
					<input name="user" type="hidden" id="user" value"'.$_COOKIE['sqlcraft_user'].'">
					<input name="pass_old" type="password" id="pass_old">
				</div>
			</div>
			<br />
			<div id="field_row">
				<div id="field_name">
					New Password
				</div>
				<div id="field_data">
					<input name="pass_new" type="password" id="pass_new">
				</div>
			</div>
			<br />
			<div id="field_row">
				<div id="field_name">
					Confirm New Password
				</div>
				<div id="field_data">
					<input name="pass_confirm" type="password" id="pass_confirm">
				</div>
			</div>
			<div id="submit">
				<input type="submit" name="Submit" value="Change Password">
			</div>
			<input name="trigger" type="hidden" id="trigger" value="true">
		</form>
	</div>';
include_once ''.$sc_path_fs.'/tpl2.php'; ?>