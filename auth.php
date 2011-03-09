<?php
$con=mysql_connect("localhost","root","derp"); if (!$con) { die('Could not connect: ' . mysql_error()); } mysql_select_db("sqlcraft", $con);
?>