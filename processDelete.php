<?php require("LoginComponents.php"); ?>
<?php
	$obj = new login_components();
	mysql_connect ("localhost", "root", "mca");
	mysql_select_db ("rss");
	$del = $_POST["toDelete"];
	mysql_query ("DELETE FROM rssdata where guid='$del'");
	$obj->displayContent ("Deleted");
	?>