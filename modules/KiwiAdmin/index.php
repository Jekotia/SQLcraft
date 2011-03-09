<?php
	include_once '../../config.php';
	include_once '../../auth.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>KiwiAdmin Web UI</title>
	</head>
		<body>
			<table border='1' cellspacing='0' cellpadding='0'>
				<tr>
					<th>name</th>
					<th>reason</th>
					<th>admin</th>
					<th>time</th>
				</tr>			
					<?php	
						$result = mysql_query("SELECT * FROM banlist");
						while($row = mysql_fetch_array($result))
						{
						echo "
						<tr>
							<td>".$row['name']."</td>
							<td>".$row['reason']."</td>
							<td>".$row['admin']."</td>
							<td>".$row['time']."</td>
						</tr>
						";
						}
					?>
		</table>
		<form action="addban.php" method="post" name="Add Ban">
			<fieldset>
				<legend>Add Ban</legend>
				<input name="addban_name" type="text" size="32" value="name" maxlength="32"  />
				<input name="addban_reason" type="text" size="10" value="reason" maxlength="255" />
				<input name="addban_admin" type="text" size="32" value="admin" maxlength="32" />
				<input name="" type="submit" value="Ban" />
			</fieldset>
		</form>
	</body>
</html>