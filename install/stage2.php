<?php
	if(isset($_POST['acl_attempt']))
	{
		echo 'WHAT THE FUCK';
		$mysql_host = $_POST['mysql_host'];
		$mysql_user = $_POST['mysql_user'];
		$mysql_pass = $_POST['mysql_pass'];
		$mysql_db = $_POST['mysql_db'];
		$path_wr = $_POST['path_wr'];
		$path_fs = $_POST['path_fs'];
		$path_mc = $_POST['path_mc'];
		if (isset($_POST['sc_auth'])) {$sc_auth = $_POST['sc_auth'];}
		else {$sc_auth = 0;}
		if (isset($_POST['sc_local'])) {$sc_local = $_POST['sc_local'];}
		else {$sc_local = 0;}
		if (isset($_POST['sc_linux'])) {$sc_linux = $_POST['sc_linux'];}
		else {$sc_linux = 0;}
		$sc_screen = $_POST['sc_screen'];
		$cn_user = $_POST['cn_user'];
		$cn_token = $_POST['cn_token'];		
		
		$db->exec(' UPDATE configuration SET value="'.$mysql_host.'" WHERE id="mysql_host" ');
		$db->exec(' UPDATE configuration SET value="'.$mysql_user.'" WHERE id="mysql_user" ');
		$db->exec(' UPDATE configuration SET value="'.$mysql_pass.'" WHERE id="mysql_pass" ');
		$db->exec(' UPDATE configuration SET value="'.$mysql_db.'" WHERE id="mysql_db" ');

		$db->exec(' UPDATE configuration SET value="'.$path_wr.'" WHERE id="path_wr" ');
		$db->exec(' UPDATE configuration SET value="'.$path_fs.'" WHERE id="path_fs" ');
		$db->exec(' UPDATE configuration SET value="'.$path_mc.'" WHERE id="path_mc" ');

		$db->exec(' UPDATE configuration SET value="'.$sc_auth.'" WHERE id="sc_auth" ');
		$db->exec(' UPDATE configuration SET value="'.$sc_local.'" WHERE id="sc_local" ');
		$db->exec(' UPDATE configuration SET value="'.$sc_linux.'" WHERE id="sc_linux" ');
		$db->exec(' UPDATE configuration SET value="'.$sc_screen.'" WHERE id="sc_screen" ');
		
		$db->exec(' UPDATE configuration SET value="'.$cn_user.'" WHERE id="cn_user" ');
		$db->exec(' UPDATE configuration SET value="'.$cn_token.'" WHERE id="cn_token" ');
		
		setcookie(''.$cn_user.'', ''.$user.'', time()+1800, '/');
		setcookie(''.$cn_token.'', ''.$token.'', time()+1800, '/');

		echo 'Configuration has been written!';
		$step_1 = true;
	}

		echo '<style>
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
					Username
				</div>
				<div id="field_data">
					<input name="username" type="text">
				</div>
			</div>
			<br />
			<div id="field_row">
				<div id="field_name">
					Password
				</div>
				<div id="field_data">
					<input name="pass_new" type="password">
				</div>
			</div>
			<br />
			<div id="field_row">
				<div id="field_name">
					Confirm Password
				</div>
				<div id="field_data">
					<input name="pass_confirm" type="password">
				</div>
			</div>
			<div id="submit">
				<input type="submit" name="Submit" value="Create First User">
			</div>
			<input name="acl_attempt" type="hidden" value="true">
			<input name="trigger" type="hidden" value="2">
		</form>';
?>