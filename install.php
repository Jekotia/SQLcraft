<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">		
		<link rel="shortcut icon" type="image/gif" href="favicon.gif" />
		<link rel="stylesheet" href="install/install.css" type="text/css" />
		<title>SQLcraft - Installation</title>
	</head>
	<body>
		<div id="container">
			<div id="border">
				<div id="header">
					SQLcraft
					<span id="header">Installation</span>
				</div>
				<div id="content">

<?php
	session_start();
	$db = '../sqlcraft-dev.db';
	$db = new SQLite3($db);
	$page = 'install';
	$step_1 = false;
	if (isset($_POST['trigger']) and $_POST['trigger'] == 2)
	{
		include_once 'install/stage3.php';
	}
	elseif (isset($_POST['trigger']) and $_POST['trigger'] == 1)
	{
		include_once 'install/stage2.php';
	}

	elseif (!isset($_POST['trigger']) OR $step_1 == false)
	{
		include_once 'install/stage1.php';
	}
?>
				</div>
				<div id="footer">
					<?php include_once 'footer.php'; ?>
				</div>
			</div>
		</div>
	</body>
</html>