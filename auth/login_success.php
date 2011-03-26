<?
	session_start();
	$ignore_redirect = false;
	include_once "../init.php";
	if ($auth_enabled == false){header("location:../home.php");}
	$page_title = "Login Successful";
	include_once "tpl1.php";
?>
	<style> div#content {text-align: center; padding-top: 10px; padding-bottom: 10px;} </style>
	Login Successful.<br />Welcome <?php echo $_COOKIE['sqlcraft_user']; ?>!
	<br />Click <a href="<?php echo ''.$sc_path_wr.'/home.php'; ?>">here</a> to continue.
<?php
	include_once "tpl2.php";
?>