<?php include ("LoginComponents.php"); ?>
<?php
	mysql_connect ("localhost", "root", "mca");
	mysql_select_db ("rss");
	
	$title = $_POST["title"];
	$description = $_POST["description"];
	$link = $_POST["link"];
	$pubDate = date(DATE_RFC822);
	$myusr = $_SESSION['myusername'];
	
	$tableset  = mysql_query("SELECT email FROM members WHERE username='$myusr'");
	$rowset = mysql_fetch_row ($tableset);
	$author = $rowset[0];
	$source = $_POST["source"];
	$sourceUrl = $_POST["sourceUrl"];
	$sql = "INSERT INTO rssData (title, author, link, description, pubDate, source, sourceUrl)
				VALUES ('$title', '$author', '$link', '$description', '$pubDate', '$source', '$sourceUrl');";
	//echo "$sql";
	$str="Successfully Recorded to Server!! <br />You can now publish the feed, else will be kept as draft in server until you publish it.";
	$status = mysql_query ($sql) or $str="Failed to Insert into Database. Please Contact your Administrator.";
	$obj = new login_components();
	$obj->displayContent($str);
?>