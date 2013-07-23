<html><head><title>QuestFeed :: Birla Institute Of Technology, Mesra</title></head><body>
<div id="header"></div>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><center><strong>Who Are You??</strong></center></td>
</tr>
<tr>
<td width="78">Feeder</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Passphrase</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>Department</td>
<td>:</td>
<td>
<?php
	echo "<select>";
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password="mca"; // Mysql password
	$db_name="rss"; // Database name
	$tbl_name="departments"; // Table name

	// Connect to server and select databse.
	mysql_connect($host, $username, $password)or die("cannot connect");
	mysql_select_db($db_name)or die("cannot select DB");
	
	$sql="SELECT dname FROM $tbl_name";
	$result=mysql_query($sql);
	
	$rows = mysql_num_rows ($result);
	//echo "<option>$rows</option>";
	for ($i = 0; $i < $rows; $i = $i + 1)
	{	$menu = mysql_fetch_row($result);
		echo "<option>$menu[0]</option>";
	}	
	//echo "<option>Administrator</option>";
	echo "</select>";
?>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<br/><br />
<center>
<img src="images/art.png" height="30%" />
</center>
</body>
</html>