<?
session_start();
//if(!session_is_registered(auth_username)){header("location:../home.php");}

$cookie_name = $_SESSION['cookie_name'];
$cookie_token = $_SESSION['cookie_token'];

//setcookie("sqlcraft_user", "$cookie_name", time()+1800);
//setcookie("sqlcraft_token", "$cookie_token", time()+1800);
echo $_COOKIE['sqlcraft_user'];
echo $_COOKIE['sqlcraft_token'];
//setcookie("user","'$login_user'","time()+1800"); 

?>

<?php 
	$ignore_redirect = false;
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