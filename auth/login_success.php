<?
	$db = '../sqlcraft.db';
	session_start();
	$ignore_redirect = false;
	include_once '../init.php';
	if ($sc_auth == false){header('location:../home.php');}
	$page_title = 'Login Successful';
	$page = 'login_success';
	include_once 'tpl1.php';
?>
	<style> div#content {text-align: center; padding-top: 10px; padding-bottom: 10px;} </style>
	Login Successful.<br />Welcome <?php echo $_COOKIE[''.$cn_user.'']; ?>!
	<br />Click <a href="<?php echo '../home.php'; ?>">here</a> to continue.
<?php
	include_once 'tpl2.php';
?>