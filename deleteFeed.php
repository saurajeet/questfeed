<?php require("LoginComponents.php") ?>
<?php
	$obj = new login_components();
	$obj->displayContent("
	<form name='deleteFeed' id='deleteFeed' action='processDelete.php' method='post'>
		Please enter the guid to delete. <br />
		<input type='text' id='toDelete' name='toDelete' />
		<br />
		After deletion the feed has to be republished to affect changes.<br />
	</form>");
	?>