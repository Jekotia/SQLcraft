<?php 
	$db = 'sqlcraft.db';
	session_start();
	if (isset($_COOKIE['sqlcraft_user']) and isset($_COOKIE['sqlcraft_token'])) {
		header("location:home.php");
	}
	$ignore_redirect = true;
// Retrieve the PHP variable (using PHP).
	$valid_login = $_SESSION['valid_login'];
//echo $valid_login;
	include_once 'init.php';
	if ($sc_auth == false){header('location:home.php');}
	$page_title = 'SQLcraft - Login';
	$page = 'index';
	include_once 'auth/tpl1.php';
?>
	<form name="login" method="post" action="auth/checklogin.php">
		<table align="center" border="0" cellpadding="3" cellspacing="1" >
			<tr>
				<td colspan="2">
					<strong>Administrator Login</strong>
					<?php
						if ($valid_login == false) {
							$_SESSION['valid_login'] = true;
							echo $valid_login;
							echo "<br /><span class='bad_login'>Bad Login: Wrong Username and/or password!</span>";
						}
					?>
				</td>
			</tr>
			<tr>
				<td width="78">Username</td>
				<td><input name="auth_username" type="text" id="auth_username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input name="auth_password" type="password" id="auth_password"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="Submit" value="Login"></td>
			</tr>
		</table>
	</form>
<?php include_once 'auth/tpl2.php'; ?>