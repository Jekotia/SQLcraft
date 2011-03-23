<?php
		$ignore_redirect = false;
		include_once '../../init.php';
		include_once ''.$sc_path_fs.'/modules/KiwiAdmin/config.php';
		$page_title = 'SQLcraft - KiwiAdmin Module - Overview';
		$page = 'KiwiAdmin';
		include_once ''.$sc_path_fs.'/tpl1.php';
?>
		<form action="ban.php" method="post" name="Ban Player">
			<fieldset>
				<legend>Ban Player</legend>
				<table>
					<tr>
						<th>name</th>
						<th>reason</th>
						<th>admin</th>
					</tr>
					<tr>
						<td><input name="addban_name" type="text" size="32" maxlength="32"  /></td>
						<td><input name="addban_reason" type="text" size="10" maxlength="255" /></td>
						<td><input name="addban_admin" type="text" size="32" maxlength="32" /></td>
						<td><input name="" type="submit" value="Ban Player" /></td>
					</tr>
				</table>
			</fieldset>
		</form>
		<form action="unban.php" method="post" name="Unban Player">
			<fieldset>
				<legend>Unban Player</legend>
				<select name="unban_name">
					<option value=""></option>
					<?php
						$result = mysql_query("SELECT * FROM ".$ka_bantable);
						while($row = mysql_fetch_array($result))
						{
							?>
							<option value="<?php echo $row['name']; ?>"><?php echo $row['name'];?></option>
							<?php
						}
					?>
				</select>
				<input type="submit" value="Unban Player" />
			</fieldset>
		</form>
		<br />
		<table border='1' cellspacing='0' cellpadding='0' width="100%">
			<tr>
				<th width="15%">name</th>
				<th width="30%">reason</th>
				<th width="15%">admin</th>
				<th width="20%">time</th>
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
		
		<?php include_once ''.$sc_path_fs.'/tpl2.php'; ?>