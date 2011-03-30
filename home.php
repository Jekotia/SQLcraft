<?php
	$db = 'sqlcraft.db';
	session_start();
	$ignore_redirect = false;
	include_once 'init.php';
	$page_title = 'Home';
	$page = 'home';
	include_once 'tpl1.php';
?>
Welcome to SQLcraft! It's a bit bare and empty here right now, but there's a lot planned!
<?php include_once 'tpl2.php'; ?>