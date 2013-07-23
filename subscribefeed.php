<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Subscribe Feed</title>
</head>

<body>
<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mca"; // Mysql password
$db_name="rss"; // Database name
$tbl_name="departments"; // Table name

// Connect to server and select databse.
mysql_connect($host, $username, $password)or die("cannot connect");
mysql_select_db($db_name)or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name ";
$result=mysql_query($sql);

//echo "<BR /><BR />$result, $r[0]";
echo "<table border=\"2\">";
while ($row= mysql_fetch_row($result))

{	
		echo "
      	  <tr>
          <td>&nbsp;To Subscribe $row[0]&nbsp; <a href='$row[1]'>Click here</a></td>
          </tr>  ";
        
	  
}
echo "</table>";

?>


</body>
</html>
