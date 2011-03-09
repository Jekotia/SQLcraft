<?php
		include_once '../../config.php';
		include_once ''.$sc_path_sc.'auth.php';
		include_once ''.$sc_path_sc.'modules/KiwiAdmin/config.php';
		$page_title = 'SQLcraft - KiwiAdmin Module - Overview';
		include_once ''.$sc_path_sc.'tpl1.php';
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
		
		<?php include_once ''.$sc_path_sc.'tpl2.php'; ?>