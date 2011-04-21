<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">		
		<link rel="shortcut icon" type="image/gif" href="<?php echo $path_wr ?>favicon.gif" />
		<link rel="stylesheet" href="<?php echo $path_wr; ?>css/style.css" type="text/css" />
		<title>
			SQLcraft - <?php echo $page_title; ?> 
		</title>
		<style>
			div#<?php echo $page; ?> {width: auto; background-color: #fff; text-align: right; padding-right: 5px;} a#<?php echo $page; ?>:link, a#<?php echo $page; ?>:visited {color:#000;}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="border">
				<div id="header">
					SQLcraft
					<span id="header">
						<?php echo $sc_ver;?>

					</span>
					<div id="page_head">
						<?php echo $page_title; ?>

					</div>
				</div>
				<div id="left">
					<div id="home" class="nav">
						<a id="home" class="nav" href="<?php echo $path_wr; ?>home.php">
							Home
						</a>
					</div>
					<div id="modules" class="nav">
						Modules
					</div>
					<?php
						// open this directory 
							$myDirectory = opendir("".$path_fs."modules");
						// get each entry
							while($entryName = readdir($myDirectory)) {
								$dirArray[] = $entryName;
							}
						//close directory
							closedir($myDirectory);					
						//count elements in array
							$indexCount	= count($dirArray);
						//sort 'em
							sort($dirArray);
						//loop through the array of files and print them all
							for($index=0; $index < $indexCount; $index++)
							{
						        if (substr("$dirArray[$index]", 0, 1) != ".")// don't list hidden files
						        {
									echo '<div id="'.$dirArray[$index].'"class="nav">
						<a id='.$dirArray[$index].' class="nav" href="'.$path_wr.'modules/'.$dirArray[$index].'/" >
							'.$dirArray[$index].'
						</a>
					</div>
					';
								}
							}
					?>
<div id="system" class="nav">
						System
					</div>
					<div id="configure" class="nav">
						<a id="configure" class="nav" href="<?php echo $path_wr; ?>configure.php">
							Configure
						</a>
					</div>
					<?php
						if ($sc_auth == true AND $gid >= 1) {
						echo '<div id="manageusers" class="nav">
						<a id="manageusers" class="nav" href="'.$path_wr.'auth/manage.php">
							Manage Users
						</a>
					</div>';}
					?>

					<div id="template" class="nav">
						<a id="template" class="nav" href="<?php echo $path_wr; ?>template.php">
							Template
						</a>
					</div>
					<div id="contrib" class="nav">
						<a id="contrib" class="nav" href="<?php echo $path_wr; ?>contrib.php">
							Contributors
						</a>
					</div>
					<?php
						if ($sc_auth == true AND $gid >= 1) {
						echo '<div id="changepass" class="nav">
						<a id="changepass" class="nav" href="'.$path_wr.'auth/changepassword.php">
							Change Password
						</a>
					</div>
					<div id="logout" class="nav">
						<a id="logout" class="nav" href="'.$path_wr.'auth/logout.php">
							Logout
						</a>
					</div>';}
					?> 
				</div>
				<div id="right">
					