<?
session_start();
if(!session_is_registered(auth_username)){
//header("location:../home.php");
}
?>

<?php 
	$ignore_redirect = true;
	include_once "../init.php";
	$page_title = "SQLcraft - Logout";
	include_once "tpl1.php";
?>
	<style> div#content {text-align: center; padding-top: 10px; padding-bottom: 10px;} </style>
	Login Successful.<br />
	Click <a href="<?php echo ''.$sc_path_wr.'/home.php'; ?>">here</a> to continue.
<?php
	include_once "tpl2.php";
?>