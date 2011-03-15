<?php
	$con = mysql_connect($mysql_host,$mysql_user,$mysql_pass);
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_db, $con);
?>