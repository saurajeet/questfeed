<?php require ("LoginComponents.php"); ?>
<?php require ("RSSReader.php"); ?>
	<?php
	$obj = new login_components();
	$host="localhost"; // Host name
	$username="root"; // Mysql username
	$password="mca"; // Mysql password
	$db_name="rss"; // Database name
	$tbl_name="departments"; // Table name

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
	
	$sql = "SELECT department FROM members WHERE username='".$myusername."'";
	$result = mysql_query ($sql) or die("Cannot query to database");
	$rowset = mysql_fetch_row($result);
	
	$sql1="SELECT dloc FROM ".$tbl_name." WHERE dname='".$rowset[0]."'";
	//echo "$sql1\n";
	$result1 = mysql_query($sql1) or die ("Cannot Query to databse");
	$rowset1 = mysql_fetch_row($result1);
	$path = $rowset1[0];
//	$cdir = getcwd();
	
	//$path = $cdir."\\".$path."\n\n";
	$domainpath = "http://localhost/rss/".$path;
	//echo $domainpath;
	
	$rss = new RSSReader($domainpath);
	$rss->Read();
	$data = $rss->feed['items'];
	$strCnt = "";
	$strCnt = $strCnt."<table style='color:white'>";
	for ($i = 0; $i < count($data); $i++)
	{	$strCnt = $strCnt."<tr><td>";
		//print_r ($data[$i]["TITLE"])."";
		$strCnt = $strCnt.($data[$i]["TITLE"])."<br />";
		//print_r ($data[$i]["DESCRIPTION"])."";
		$strCnt =  $strCnt.($data[$i]["DESCRIPTION"])."<br />";
		//print_r ($data[$i]["PUBDATE"])."";
		$strCnt = $strCnt.($data[$i]["PUBDATE"])."<br />";
		//echo "<br/>";
		//print_r ($data[$i]["SOURCE"])."";
		$strCnt = $strCnt.($data[$i]["SOURCE"])."<br />";
		//echo "<br />";
		//print_r ($data[$i]["GUID"])."";
		$strCnt = $strCnt.($data[$i]["GUID"])."<br />";
		//echo "<br />";
		//print_r ($data[$i]["LINK"])."";
		$strCnt = $strCnt.($data[$i]["LINK"])."<br /><hr /></td></tr>";
		//echo "<br />";
		//echo "</tr></td>";
	}
	$strCnt = $strCnt."</table>";
	$obj->displayContent($strCnt);
	?>