<?php require("LoginComponents.php"); ?>
<?php
	$obj = new login_components();
	$obj->displayContent("	<form name='input' action='passch.php' method='post'>
	<fieldset>
	<legend><h3>Change Password</h3></legend>
		<table>
		<tr>
			<td style='color:White;'>Old Passphrase: </td>
			<td><input type='password' size='20' name='old' /></td>
		</tr>
		<tr>
			<td style='color:White;'>New Passphrase: </td>
			<td><input type='password' size='20' name='new'/></td>
		</tr>
		<tr>
			<td style='color:White;'>Re-enter: </td>
			<td><input type='password' size='20' name='new1'/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' value='Change' /></td>	
		</table>
	</fieldset>
	</form>");
	?>
