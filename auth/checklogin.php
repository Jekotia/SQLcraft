<?php	//Excessive debug you say? yes, most certaintly. This page gave me hours of trouble, and I don't feel like removing all of those useful debug lines since I may need them again.
		$ignore_redirect = true;
		//'Initialize' SQLcraft
		include_once '../init.php';
if ($debug==true){echo '<br /><b>Whether or not to ignore the <i>potential</i> redirect to the login screen</b>';}
if ($debug==true){echo '<br>'; if($ignore_redirect==true){echo '$ignore_redirect==true';}elseif($ignore_redirect==false){echo '$ignore_redirect==false';}else{echo '$ignore_redirect is returning no value';}}
	
		ob_start();

if ($debug==true){echo '<br /><br /><b>Sets $valid_login to false by default</b>';}
		$valid_login = false;
if ($debug==true){echo "<br />";if($valid_login==true){echo '$valid_login==true';}elseif($valid_login==false){echo '$valid_login==false';}else{echo '$valid_login is returning no value';}}

		//username and password sent from form
if ($debug==true){echo '<br /><br /><b>Username and password from login form</b>';}
		$auth_username = $_POST['auth_username'];
if ($debug==true){echo '<br />$auth_username='.$auth_username.'';}
		$auth_password = $_POST['auth_password'];
if ($debug==true){echo '<br />$auth_password='.$auth_password.'';}

if ($debug==true){echo '<br /><br /><b>Defines $db_username and $db_password to avoid undefined variable issues</b>';}
		$db_username = '';
if ($debug==true){echo '<br />$db_username='.$db_username.' <- This should be blank';}
		$db_password = '';
if ($debug==true){echo '<br />$db_password='.$db_password.' <- This should be blank';}
	
	// To protect MySQL injection (copy+paste from w3schools, slight modification)
if ($debug==true){echo '<br /><br /><b>Some stuff from w3schools to protect against database injection, dont really understand what it does</b>';}
		$auth_username = stripslashes($auth_username);
if ($debug==true){echo '<br />$auth_username=stripslashes('.$auth_username.')';}
		$auth_password = stripslashes($auth_password);
if ($debug==true){echo '<br />$auth_password=stripslashes('.$auth_password.')';}
		$auth_username = mysql_real_escape_string($auth_username);
if ($debug==true){echo '<br />$auth_username=mysql_real_escape_string('.$auth_username.')';}
		$auth_password = mysql_real_escape_string($auth_password);
if ($debug==true){echo '<br />$auth_password=mysql_real_escape_string('.$auth_password.')';}

if ($debug==true){echo '<br /><br /><b>Encrypts the password using a md5 hash</b>';}
		$auth_password = md5($auth_password);
if ($debug==true){echo '<br />$auth_password=md5('.$auth_password.')';}

if ($debug==true){echo '<br /><br /><b>SQLcrafts local SQLite database</b>';}
		$db = '../sqlcraft.db';
if ($debug==true){echo '<br />$db='.$db.'';}

if ($debug==true){echo '<br /><br /><b>Invisibly open the database file</b>';}
		$db = new SQLite3($db);

if ($debug==true){echo '<br /><br /><b>This is where the invisible database access starts. Its selecting the row that matches the submitted login info (if any)</b>';}
		$result = $db->query("SELECT * FROM users WHERE username='$auth_username' and password='$auth_password'");
			while($row = $result->fetchArray(SQLITE3_ASSOC))
			{
if ($debug==true){echo '<br /><br /><b>And this is where the invisible database access ends</b>';}

if ($debug==true){echo '<br /><br /><b>The results from the database query</b>';}
if ($debug==true){echo '<br />uid='.$row['uid'].'';}
				$db_username	=	$row['username'];
if ($debug==true){echo '<br />$db_username='.$row['username'].'';}
				$db_password	=	$row['password'];
if ($debug==true){echo '<br />$db_password='.$row['password'].'';}
				$valid_login	=	true;
if ($debug==true){echo "<br />";if($valid_login==true){echo '$valid_login==true';}elseif($valid_login==false){echo '$valid_login==false';}else{echo '$valid_login is returning no value';}}
			};

if ($debug==true){echo '<br /><br /><b>Invisible if confirming that  the submitted username and password are valid. Sets the cookie</b>';}
		if ($auth_username = $db_username and $auth_password = $db_password and $valid_login == true)
		{
		// Register $auth_username, $auth_password and redirect to file "login_success.php"
if ($debug==true){echo '<br /><br /><b>The token for the cookie! Two random numbers resulting in two 32char md5 hashes concatenated together for a 64char token</b>';}
			$db_token_1 = rand(1000000,9999999);
			$db_token_1 = md5($db_token_1);
if ($debug==true){echo '<br />'.$db_token_1.'';}
			$db_token_2 = rand(1000000,9999999);
			$db_token_2 = md5($db_token_2);
if ($debug==true){echo '<br />'.$db_token_2.'';}
			$db_token = ($db_token_1.$db_token_2);
if ($debug==true){echo '<br />'.$db_token.'';}

			$db->exec(" UPDATE users SET token='".$db_token."' WHERE username='".$db_username."' ");
if ($debug==true){echo '<br />'.$db_token.'';}
			$db_token=$db_token;
if ($debug==true){echo "<br /> $db_token";}
			setcookie("sqlcraft_user", "$db_username", time()+1800);
if ($debug==true){echo '<br />'.$_COOKIE['sqlcraft_user'].'';}
			setcookie("sqlcraft_token", "$db_token", time()+1800);
if ($debug==true){echo '<br />'.$_COOKIE['sqlcraft_token'].'';}
if ($debug==true){echo "<br /> $db_token";}
			session_start();			
			$_SESSION['cookie_name'] = $cookie_name;
			$_SESSION['cookie_token'] = $cookie_token;

			//echo("$auth_username,$auth_password,$db_username,$db_password");
if ($debug==false){header("location:login_success.php");}
if ($debug==true){echo '<br /><br /><b>The end of that if</b>';}
		}
		else
		{
			$valid_login = false;
if ($debug==true){echo "<br />";if($valid_login==true){echo '$valid_login==true';}elseif($valid_login==false){echo '$valid_login==false';}else{echo '$valid_login is returning no value';}}
			$_SESSION['valid_login'] = $valid_login;

if ($debug==false){header("location:../");}
		}
		ob_end_flush();
?>