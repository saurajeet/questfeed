<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Feed</title>
</head>

<body>
<h1>Update Feed</h1>
<?php
	mysql_connect ("localhost", "root","mca");
	mysql_select_db ("rss");
	$dept = "Administrator";
	$result = mysql_query("Select * from departments where dname='$dept'") or die("Internal Error");
	$rows= mysql_num_rows($result);
	if ($rows==1)
	{	$t =mysql_fetch_row($result);
		$feedfile = $t[1];
	}
	//$fp = fopen ($feedfile, "w+");
	/*
		ALGORITHM
			OPEN THE FEED FILE
			GET THE NODE TO CHANNEL
			CREATE CHILD ELEMENT
	*/
	//APPENDING THE XML DOCUMENT
	//$xdoc = new DomDocument;
	//$xdoc->Load('./QuestFeed-Admin/feed.xml');
	echo (date(DATE_RFC822));
?>
</body>
</html>