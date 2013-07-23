<?php require ('LoginComponents.php') ?>
<?php
//  Begin Function
function createRSSFile($post_title, $post_description, $post_link, $post_author, $post_guid, $post_pubDate, $post_src, $post_srcurl)
{
	$returnITEM = "<item>\n";
	# this will return the Title of the Article.
	$returnITEM .= "<title>".$post_title."</title>\n";
	# this will return the Description of the Article.
	$returnITEM .= "<description>".$post_description."</description>\n";
	# this will return the URL to the post.
	$returnITEM .= "<author>".$post_author."</author>\n";
	# this will return the author of the post.
	$returnITEM .= "<link>".$post_link."</link>\n";
	# this will return the link to be opened from the feed.
	$returnITEM .= "<guid>".$post_guid."</guid>\n";
	# this will return the link to be opened from the feed.
	$returnITEM .= "<pubDate>".$post_pubDate."</pubDate>\n";
	# this will return the link to be opened from the feed.
	$returnITEM .= "<source url='".$post_srcurl."'>".$post_src."</source>\n";
	# this will return the link to be opened from the feed.
	$returnITEM .= "</item>\n";
	return $returnITEM;
}
// Lets build the page
$obj = new login_components();
mysql_connect ("localhost", "root", "mca");
mysql_select_db ("rss");
$tableset  = mysql_query("select dloc from departments where dname=(select department from members where username='$myusr')");
$rowset = mysql_fetch_row ($tableset);

#$filename = $rowset[0];
$filename = "QuestFeed-Admin/feed.xml";
//echo "$filename";
#$rootURL = "http://www.YOURSITE.com/feeds/";
$latestBuild = date("r");
// Lets define the the type of doc we're creating.
$createXML = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$createXML .= "<rss version=\"0.92\">\n";
$createXML .= "<channel>
	<title>QuestFeed</title>
	<link>http://localhost</link>
	<language>en-US</language>";

// Lets Get the News Articles
$content_search = "SELECT * FROM rssdata";
$content_results = mysql_query($content_search);
// Lets get the results
while ($articleInfo = mysql_fetch_row($content_results))
{
	$guid = $articleInfo[0];
	$title = $articleInfo[1];
	$author = $articleInfo[2];
	$page = $articleInfo[3];
	$description = $articleInfo[4];
	$pubDate = $articleInfo[5];
	$source = $articleInfo[6];
	$sourceurl = $articleInfo[7];
	$createXML .= createRSSFile($title,$description,$page, $author, $guid, $pubDate, $source, $sourceurl);
}
$createXML .= "</channel>\n </rss>";
// Finish it up
$filehandle = fopen($filename,"w") or die("Can't open the file");
fwrite($filehandle,$createXML);
fclose($filehandle);
$obj->displayContent("Feed Published in your channel\n");
?>