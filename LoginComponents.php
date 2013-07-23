<?php
session_start();
if(!session_is_registered(myusername)){
header("location:login.php");
}

class login_components
{	var $contentText;
	function __construct()
	{	$dateserver = date('D, d M Y H:m');
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
		<title>Feeder WorkBench:: Questfeed</title>
		<style type='text/css'>
			body
			{	margin: 0 0 0 0;
				padding: 0 0 0 0;
				width: 100%;
				background-color:#000099;
			}
			#header
			{	margin:  0 0 0 0;
				padding: 0 0 0 0;
				width: 100%;
				background-color:#3366CC;
				height: 50px;
			}
			#logo
			{	width: 6%;
				height: 50px;
				float: left;
			}
			#caption
			{	width: 62%;
				height: 50px;
				color: White;
				font-family: Geneva, Arial, Helvetica, sans-serif;
				font-size: xx-large;
				float: left;
				margin-top: 10px;
				text-align: left;
			}
			#user
			{	width: 20%;
				color: white;
				font-family: Verdana, Arial, Helvetica, sans-serif;
				text-align: right;
				float: left;
				margin-top: 8px;
				height: 50px;
			}
			#rpanel
			{	color: white;
				width: 8%; 
				float: left;
				text-align: right;
				height: 50px;
				margin-top: 7px;
			}
			#content
			{	color: white;
				width: 78%;
				float: right;
				text-align : left;
				height: 100%;
			}
			#workbench
			{	clear: both;
				width: 100%;
				float: left;
				font: Corbel, Euphemia, Gisha, 'Segoe UI';
				font-size: x-large;
			}
			#menu
			{	text-align: left;
				color: White;
				width: 20%;
				float:left;
			}
			#menu ul li a
			{	display: block;
				border : 0 0 0 0;
				margin : 0 0 0 0;
				padding : 0 0 0 0;
				vertical-align:middle;
				text-decoration: none;
				font-family: 'Segoe UI';
			}
			#menu ul li
			{	display: block;
				border : 0 0 0 0;
				margin : 0 0 0 0;
				padding : 0 0 0 0;
				vertical-align:middle;
				overflow: none;
				padding: 5 5 5 5;
			}
			#menu ul li a:hover
			{	display: block;
				background-color:#f0FFFF;
				border : 0 0 0 0;
				margin : 0 0 0 0;
				vertical-align: middle;
				padding : 0 0 0 0;
				overflow: none;
				color: #000000;
			}
			#menu ul
			{	list-style: none;
				margin : 0 0 0 0;
				margin-left: 50px;
				padding: 0 0 0 0;
			}
		</style>
		<script type='text/javascript'>
		var abc = document.getElementById('content').innerHTML;
		alert (abc);
		</script>
	</head>
	<body alink='#FFFFFF' vlink='#FFFFFF' link='#FFFFFF'>
	<center>
	<div id='header'>
		<div id='logo'></div>
		<div id='caption'> QuestFeed </div>
		<div id='user'>Hello, ";
	echo $_SESSION['username']."<br />".$dateserver;
	echo "</div>
	<div id='rpanel'><a href='logout.php'><img src='images/logoutfy3.png' alt='Logout' width=70px height=70px></a></div>
	</div>
	<div id='workbench'>
	<div id='menu'>
	<ul>
		<li><a href='enterfeed.php'><img src='images/newfeed.jpg' alt='New Feed' width=50px height=50px>&nbsp;&nbsp;New Feed</a></li>
		<li><a href='deleteFeed.php'><img src='images/delete1.jpg' alt='Delete Feed' width=50px height=50px>&nbsp;&nbsp;Delete Feed</a></li>
		<li><a href='create-xml-rss.php'><img src='images/publish1.jpg' alt='Publish Feed' width=50px height=50px>&nbsp;&nbsp;Publish Feed</a></li>
		<li><a href='read_rss.php'><img src='images/readn.jpg' alt='Read Feed' width=50px height=50px>&nbsp;&nbsp;Read Feed</a></li>
		<li><a href='change_pass.php'><img src='images/changen.jpg' alt='Logout' width=50px height=50px>&nbsp;&nbsp;Change Pass</a></li>
		<li><a href='feeder.php'><img src='images/home.jpg' alt='Feeder Profile' width=50px height=50px>&nbsp;&nbsp;Feeder Profile</a></li>
	</ul>
	</div>";
	}
	function displayContent($text_in)
	{	echo "<div id='content'>$text_in</div>";
		echo "
		</div>
	</center> 
	</body>
	</html>";
	}
}
?>