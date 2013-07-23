<?php require("LoginComponents.php");?>
<?php
$obj = new login_components();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="mca"; // Mysql password
$db_name="rss"; // Database name
$tbl_name="members"; // Table name

// Connect to server and select databse.
mysql_connect($host, $username, $password)or die("cannot connect");
mysql_select_db($db_name)or die("cannot select DB");

// username and password sent from form
$myusername=$_SESSION['myusername'];
$mypassword=$_SESSION['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM ".$tbl_name." WHERE username='".$myusername."' and password='".$mypassword."'";
//echo $sql;
$result=mysql_query($sql) or die("cannot query");

$r=mysql_fetch_row($result);

//echo "<BR /><BR />$result, $r[0]";
$str = "";
if(mysql_num_rows($result)!=0)
{	//echo "<h2> Profile </h2>";
	$str = $str."Profile Details <br /><br />";
	$str = $str."<table border=\"2\">
      <tr>
        <th scope=\"row\">&nbsp;Name&nbsp;</th>
        <td>&nbsp;$r[1]&nbsp;</td>
      </tr>
	  <tr>
        <th scope=\"row\">&nbsp;Qualification&nbsp;</th>
        <td>&nbsp;$r[5]&nbsp;</td>
      </tr>  
      <tr>
        <th scope=\"row\">&nbsp;Designation&nbsp;</th>
        <td>&nbsp;$r[4]&nbsp;</td>
      </tr>
      <tr>
        <th scope=\"row\">&nbsp;Department&nbsp;</th>
        <td>&nbsp;$r[3]&nbsp;</td>
      </tr>
	  <tr>
        <th scope=\"row\">&nbsp;Phone Number&nbsp;</th>
        <td>&nbsp;$r[8]&nbsp;</td>
      </tr>
      <tr>
        <th scope=\"row\">&nbsp;Address&nbsp;</th>
        <td>&nbsp;$r[7]&nbsp;</td>
      </tr>  
	  <tr>
        <th scope=\"row\">&nbsp;Email&nbsp;</th>
        <td>&nbsp;$r[6]&nbsp;</td>
      </tr>  
	  </table>";
}
 else
{
	$str = $str."<BR /><BR />No user exists....";
}
$obj->displayContent($str);
?>
