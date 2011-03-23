<?php 
	$ignore_redirect = true;
	// Retrieve the PHP variable (using PHP).
	session_start();
	$valid_login = $_SESSION['valid_login'];
	//echo $valid_login;
	include_once "init.php";
	if ($auth_enabled == false){header("location:home.php");}
	$page_title = "SQLcraft - Login";
	include_once 'auth/tpl1.php';
?>
	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" >
		<tr>
			<form name="login" method="post" action="auth/checklogin.php">
				<td>
					<table width="100%" border="0" cellpadding="3" cellspacing="1" >
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
							<td width="294"><input name="auth_username" type="text" id="auth_username"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input name="auth_password" type="password" id="auth_password"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Login"></td>
						</tr>
					</table>
				</td>
			</form>
		</tr>
	</table>
	<a class="nav" href="home.php">Home</a>
<?php include_once 'auth/tpl2.php'; ?>