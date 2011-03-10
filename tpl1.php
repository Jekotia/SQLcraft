<?php
		include_once 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">		
		<?php
		echo "<link rel='shortcut icon' type='image/gif' href='".$sc_path_wr."favicon.gif' />
		";	echo "<link rel='stylesheet' href='".$sc_path_wr."css/style.css' type='text/css' />
		";	echo "<title>".$page_title."</title>
		";	echo "<style> div#".$page." {width: auto; background-color: #fff; text-align: right; padding-right: 5px;} a#".$page.":link, a#".$page.":visited {color:#000;}</style>
		";?>
	</head>
	<body>
		<div id="container">
			<div id="border">
				<div id="header">
					SQLcraft
					<span id="header">0.1.0</span>
				</div>
				<div id="left">
					<div id="index" class='nav'>
						<a id="index" class="nav" href="<?php echo $sc_path_wr; ?>index.php">Home</a>
					</div>
					<?php
						// open this directory 
							$myDirectory = opendir("".$sc_path_fs."modules");
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
							for($index=0; $index < $indexCount; $index++) {
						        if (substr("$dirArray[$index]", 0, 1) != "."){ // don't list hidden files
									echo '<div id="'.$dirArray[$index].'"class="nav">
									';
									echo 	'<a id='.$dirArray[$index].' class="nav" href="'.$sc_path_wr.'modules/'.$dirArray[$index].'/" >'.$dirArray[$index].'</a>
									';
									echo '</div>
									';
								}
							}
					?>
					<div id="template" class='nav'>
						<a id="template" class='nav' href='<?php echo $sc_path_wr; ?>template.php'>Template</a>
					</div>
					<div id="contrib" class='nav'>
						<a id="contrib" class='nav' href='<?php echo $sc_path_wr; ?>contrib.php'>Contributors</a>
					</div>
				</div>
				<div id="right">