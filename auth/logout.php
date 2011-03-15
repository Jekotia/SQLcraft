<?php 
	$ignore_redirect = true;
	include_once "../init.php";
	$page_title = "SQLcraft - Logout";
	include_once "tpl1.php";
?>
	<style> div#content {text-align: center; padding-top: 10px; padding-bottom: 10px;} </style>
	Successfully logged out.<br />
	Click <a href="<?php echo ''.$sc_path_wr.'/'; ?>">here</a> to return to the login page.
<?php
	session_start();
	session_destroy();
	include_once "tpl2.php";
?>