<?php

define('INCLUDE_CHECK',true);

require 'connect.php';
require 'functions.php';
// Those two files can be included only if INCLUDE_CHECK is defined
$ipAdd=$_SERVER['REMOTE_ADDR'];
session_name('MyLogin');
// Starting the session

session_set_cookie_params(2*7*24*60*60);
// Making the cookie live for 2 weeks

session_start();

if($_SESSION['id'] && !isset($_COOKIE['MyRemember']) && !$_SESSION['rememberMe'])
{
	// If you are logged in, but you don't have the tzRemember cookie (browser restart)
	// and you have not checked the rememberMe checkbox:

	$_SESSION = array();
	session_destroy();
	
	// Destroy the session
}


if(isset($_GET['logoff']))
{
	$_SESSION = array();
	session_destroy();
	
	header("Location: index.php");
	exit;
}

if($_POST['submit']=='Login')
{
	// Checking whether the Login form has been submitted
	
	$err = array();
	// Will hold our errors
	
	
	if(!$_POST['nickname'] || !$_POST['password'])
		$err[] = 'All the fields must be filled in!';
	
	if(!count($err))
	{
		$_POST['username'] = mysql_real_escape_string($_POST['username']);
		$_POST['password'] = mysql_real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];
		
		// Escaping all input data

		$row = mysql_fetch_assoc(mysql_query("SELECT id,nickname FROM usermaster WHERE nickname='{$_POST['nickname']}' AND password='".md5($_POST['password'])."'"));

		if($row['nickname'])
		{
			// If everything is OK login
			
			$_SESSION['nick']=$row['nickname'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['rememberMe'] = $_POST['rememberMe'];
			
			// Store some data in the session
			
			setcookie('MyRemember',$_POST['rememberMe']);
			header("Location: home.php");
			exit;
		}
		else $err[]='Wrong username and/or password!';
	}
	
	if($err)
	$_SESSION['msg']['login-err'] = implode('<br />',$err);
	// Save the error messages in the session

	header("Location: index.php");
	exit;
}
else if($_POST['submit']=='Register')
{
	// If the Register form has been submitted
	
	$err = array();
	
	if(strlen($_POST['nickname'])<6 || strlen($_POST['nickname'])>21)
	{
		$err[]='Your nickname must be between 5 and 20 characters!';
	}
	
	if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['nickname']))
	{
		$err[]='Your nickname contains invalid characters!';
	}
	
	if(!checkEmail($_POST['email']))
	{
		$err[]='Your email is not valid!';
	}
	
	if(!$_POST['password'])
		{$err[] = 'You didnt choose a password!';
		}
		
		if(strlen($_POST['password'])<6 || strlen($_POST['nickname'])>21)
	{
		$err[]='Your password must be between 5 and 20 characters!';
	}
	
	
	if(!count($err))
	{
		// If there are no errors
		$_POST['email'] = mysql_real_escape_string($_POST['email']);
		$_POST['nickname'] = mysql_real_escape_string($_POST['nickname']);
		$_POST['password'] = mysql_real_escape_string($_POST['password']);
				// Escape the input data
		
		
		mysql_query("	INSERT INTO usermaster(nickname,password,email,ip,insertDate)
						VALUES(
						
							'".$_POST['nickname']."',
							'".$_POST['password']."',
							'".$_POST['email']."',
							'".$ipAdd."',
							NOW()
						)");
		
		if(mysql_affected_rows($link)==1)
		{
		//	send_mail(	'mystique.bitmesra@gmail.com',
			//			$_POST['email'],
				//		'Mystique Treasure Hunt - Your Password',
					//	'Hi '.$_POST['nickname'].',<br>Welcome to Mystique Treasure Hunt!<br>Your password is: '.$pass.'Please login with your nickname and this password. <br><h1>Good luck!</h1>');

			$_SESSION['msg']['reg-success']='You have been succesfully registered. You may begin the quest!';
						}
		else $err[]='Damn! This nickname is already taken!';
	}

	if(count($err))
	{
		$_SESSION['msg']['reg-err'] = implode('<br />',$err);
	}	
	
	header("Location: index.php");
	exit;
}

$script = '';

if($_SESSION['msg'])
{
	// The script below shows the sliding panel on page load
	
	$script = '
	<script type="text/javascript">
	
		$(function(){
		
			$("div#panel").show();
			$("#toggle a").toggle();
		});
	
	</script>';
	
}
?>

   <link rel="stylesheet" type="text/css" href="demo.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="login_panel/css/slide.css" media="screen" />
    
    <script type="text/javascript" src="jqueryapi.js"></script>
    
    <!-- PNG FIX for IE6 -->
    <!-- http://24ways.org/2007/supersleight-transparent-png-in-ie6 -->
    <!--[if lte IE 6]>
        <script type="text/javascript" src="login_panel/js/pngfix/supersleight-min.js"></script>
    <![endif]-->
    
    <script src="login_panel/js/slide.js" type="text/javascript"></script>
    
    <?php echo $script; ?>
    
<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
  <?php

			if(!isset$_SESSION['id']) {

			?>
			<div class="left">
				<h1>Mystique Treasure Hunt</h1>
				<h2>Login/Register</h2>
				<p class="grey">You will be automatically redirected to the level at which you last logged off. Good luck!</p>
				<h2>Any problems?</h2>
				<p class="grey">For clarifications or queries or donations, <a href="support.php" title="Support">tell us.<a></p>
			</div>
            
             <?php } else { ?>
             
             	<div class="left">
				<img src="mystiquelogo.png" height="160" width="400"/></div>
              <?} ?>
             
            <?php
			
			if(!$_SESSION['id']):
			
			?>
            
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="" method="post">
					<h1>Player Login</h1>
                    
                    <?php
						
						if($_SESSION['msg']['login-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
					?>
					
					<label class="grey" for="username">Nickname:</label>
					<input class="field" type="text" name="nickname" id="nickname" value="" size="23" />
					<label class="grey" for="password">Password:</label>
					<input class="field" type="password" name="password" id="password" size="23" />
	            	<label><input name="rememberMe" id="rememberMe" type="checkbox" checked="checked" value="1" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				<form action="" method="post">
					<h1>Sign Up!</h1>
                    
                    <?php
						
						if($_SESSION['msg']['reg-err'])
						{
							echo '<div class="err">'.$_SESSION['msg']['reg-err'].'</div>';
							unset($_SESSION['msg']['reg-err']);
						}
						
						if($_SESSION['msg']['reg-success'])
						{
							echo '<div class="success">'.$_SESSION['msg']['reg-success'].'</div>';
							unset($_SESSION['msg']['reg-success']);
						}
					?>
                    		
					<label class="grey" for="username">Nickname: (Subject to availability)</label>
					<input class="field" type="text" name="nickname" id="nickname" value="" size="23" />
					<label class="grey" for="email">Password:</label>
					<input class="field" type="password" name="password" id="password" size="23" />
					<label class="grey" for="email">Email:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
				
                    <label>Your IP address: <strong><?=$_SERVER['REMOTE_ADDR']?> </strong><br>This is being stored as your alternate identity.
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
            
            <?php
			
			else:
			
			?>
            
            <div class="left">
            
            <h1>Dashboard</h1>
            <?
			$row = mysql_fetch_assoc(mysql_query("SELECT distance FROM progressdata WHERE nickname='{$_SESSION['nick']}'"));

			?>
            <p>You are currently <? echo($row[distance])?> lightyears away from Earth. </p>
            <a href="leaderboard.php">View leaderboard.</a>
            <p></p>
            <a href="?logoff">Log off</a>
            
            </div>
            <div class="left">

            <h1>Navigate</h1>
            <p><a href="instructions.php">Instructions</a></p>
            <p><a href="support.php">Support</a></p>
            <p></p>
            </div>
            <div class="left right">
            </div>
            
            <?php
			endif;
			?>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Hello <?php echo $_SESSION['usr'] ? $_SESSION['usr'] : 'Guest';?>!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#"><?php echo $_SESSION['id']?'View Panel':'Log In | Register';?></a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div>
