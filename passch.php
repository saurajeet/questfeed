<?php require("LoginComponents.php"); ?>
	<?php
	$obj = new login_components();
	if($_POST["new"] == $_POST["new1"])
	{
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password="mca"; // Mysql password
	$db_name="rss"; // Database name
	$tbl_name="members"; // Table name

	// Connect to server and select databse.
	mysql_connect($host, $username, $password)or die("cannot connect");
	mysql_select_db($db_name)or die("cannot select DB");

	// username and password sent from form
	$myusername=$_SESSION['username'];
	$mypassword=$_SESSION['password'];

	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	
	$sql="UPDATE ".$tbl_name." SET password='".$_POST["new"]."'"."WHERE username='".$myusername."' AND password='".$_POST["old"]."'";
	$sql1="SELECT password FROM ".$tbl_name." WHERE username='".$myusername."'";
	//echo $sql."<BR /> $sql1 <br />";
	//echo "Aghh! ".$_POST["new"];
	$result=mysql_query($sql);
	$result1=mysql_query($sql1);
	//echo "yyyt".$result;
	
	if(mysql_num_rows($result1)==1)
	{
		$r=mysql_fetch_row($result1);
		//echo $r[0];
		if($r[0]==$_POST["new"])
		{
			$obj->displayContent("Password changed Successfully..");
		}
		else
		{
			$obj->displayContent("Password Not Changed..");
		}
	}
	// Mysql_num_row is counting table row
	// $count=mysql_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row

	//if(true)
	//{
	
	//}
	//else 
	//{
		//echo "<fieldset><legend><h3>Change Password</h3></legend><table><tr><td><style type='text/css'>#user{color: white;";
		//echo "font-family: Verdana, Arial, Helvetica, sans-serif;text-align: right;float: left; height: 30px;}</style><div id=\'user\'>";
		//echo "Changing failed.. ,";
		//echo $_SESSION["username"];
		//echo "</div></td></tr></table></fieldset>";
	//}
	}
	else
	{	echo "passwords entered dont match";
		}
	?>
	</div>