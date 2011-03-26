<?php 
	session_start();
	$ignore_redirect = true;
	include_once "../init.php";
	if ($auth_enabled == false){header("location:../home.php");}
	$page_title = "Logout";
	include_once "tpl1.php";
	
	setcookie("sqlcraft_user", "", time()-1800, '/');
	setcookie("sqlcraft_token", "", time()-1800, '/');
?>
	<style> div#content {text-align: center; padding-top: 10px; padding-bottom: 10px;} </style>
	Successfully logged out.<br />
	Click <a href="<?php echo ''.$sc_path_wr.'/'; ?>">here</a> to return to the login page.
<?php
	include_once "tpl2.php";
?>