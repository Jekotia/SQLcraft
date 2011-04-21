<?php
	$query =
		'CREATE TABLE configuration (id  TEXT, value  TEXT, PRIMARY KEY ("id"));' .
		'INSERT INTO configuration VALUES ("mysql_host","");' .
		'INSERT INTO configuration VALUES ("mysql_user","");' .
		'INSERT INTO configuration VALUES ("mysql_pass","");' .
		'INSERT INTO configuration VALUES ("mysql_db","");' .
		'INSERT INTO configuration VALUES ("path_wr","");' .
		'INSERT INTO configuration VALUES ("path_fs","");' .
		'INSERT INTO configuration VALUES ("path_mc","");' .
		'INSERT INTO configuration VALUES ("sc_auth","");' .
		'INSERT INTO configuration VALUES ("sc_local","");' .
		'INSERT INTO configuration VALUES ("sc_linux","");' .
		'INSERT INTO configuration VALUES ("sc_screen","");' .
		'INSERT INTO configuration VALUES ("cn_user","");' .
		'INSERT INTO configuration VALUES ("cn_token","");'
	;
	if(@!$db->exec($query)){}
	
	
	$query =
		'CREATE TABLE groups (gid  INTEGER, name  TEXT(32), PRIMARY KEY ("gid"));' .
		'INSERT INTO groups VALUES (0, "system");' .
		'INSERT INTO groups VALUES (1, "owner");' .
		'INSERT INTO groups VALUES (2, "admin");' .
		'INSERT INTO groups VALUES (3, "mod");'
	;
	if(@!$db->exec($query)){}
	
	
	$query =
		'CREATE TABLE notes (gid  INTEGER, content  BLOB, PRIMARY KEY ("gid"));' .
		'INSERT INTO "notes" VALUES (0, null);' .
		'INSERT INTO "notes" VALUES (1, null);' .
		'INSERT INTO "notes" VALUES (2, null);' .
		'INSERT INTO "notes" VALUES (3, null);'
	;
	if(@!$db->exec($query)){}
	
	
	$query =
		'CREATE TABLE users (' .
		'uid  INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,' .
		'username  TEXT(32) NOT NULL,' .
		'password  TEXT(64) NOT NULL,' .
		'token  TEXT(64) NOT NULL,' .
		'gid  INTEGER NOT NULL)'
	;
	if(@!$db->exec($query)){}


    function genRandomString()
    {
	    $length = 32;
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $string = '';
	
	    for ($p = 0; $p < $length; $p++) {
	        $string .= $characters[mt_rand(0, strlen($characters))];
	    }
	
	    return $string;
	}

	$cn_user = @genRandomString();
	$cn_token = @genRandomString();
	
	$url = 'http://'.$_SERVER['HTTP_HOST'].'/SQLcraft';
	echo '
	<form name="install" method="post" action="install.php">
		<div id="fields">
			MySQL Settings
			<div id="field_row">
				<div id="field_name">
					mysql_host
				</div>
				<div id="field_data">
					<input type="text" name="mysql_host" value="localhost"/>
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					mysql_user
				</div>
				<div id="field_data">
					<input type="text" name="mysql_user" value="root" />
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					mysql_pass
				</div>
				<div id="field_data">
					<input type="password" name="mysql_pass" value=""/>
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					mysql_db
				</div>
				<div id="field_data">
					<input type="text" name="mysql_db" value="minecraft"/>
				</div>
			</div>

			Path Settings
			<br />

			<div id="field_row">
				<div id="field_name">
					path_wr
				</div>
				<div id="field_data">
					<input type="text" name="path_wr" value="'.$url.'"/>
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					path_fs
				</div>
				<div id="field_data">
					<input type="text" name="path_fs" value="'.realpath('').'"/>
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					path_mc
				</div>
				<div id="field_data">
					<input type="text" name="path_mc" />
				</div>
			</div>
			
			System Settings
			<div id="field_row">
				<div id="field_name">
					sc_auth
				</div>
				<div id="field_data">
					<input type="checkbox" name="sc_auth" value="1" checked />
				</div>
			</div>			

			<div id="field_row">
				<div id="field_name">
					sc_local
				</div>
				<div id="field_data">
					<input type="checkbox" name="sc_local" value="1" />
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					sc_linux
				</div>
				<div id="field_data">
					<input type="checkbox" name="sc_linux" value="1" />
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					sc_screen
				</div>
				<div id="field_data">
					<input type="text" name="sc_screen" value="mcserver"/>
				</div>
			</div>
		
			<div id="field_row">
				<div id="field_name">
					cn_user
				</div>
				<div id="field_data">
					<input type="text" name="cn_user" value="'.$cn_user.'"/>
				</div>
			</div>
			
			<div id="field_row">
				<div id="field_name">
					cn_token
				</div>
				<div id="field_data">
					<input type="text" name="cn_token" value="'.$cn_token.'"/>
				</div>
			</div>				

			<input name="trigger" type="hidden" value="1">
			<div id="submit">
				<input type="submit" value="Continue" />
			</div>
		</div>
	</form>';
	$step_1 = true;
?>