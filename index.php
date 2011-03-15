<?php 
	$ignore_redirect = true;
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
							<td colspan="3"><strong>Administrator Login </strong></td>
						</tr>
						<tr>
							<td width="78">Username</td>
							<td width="6">:</td>
							<td width="294"><input name="auth_username" type="text" id="auth_username"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
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
	<a href="home.php">Home</a>
<?php include_once 'auth/tpl2.php'; ?>