<?php include ("LoginComponents.php"); ?>
<?php
	$obj = new login_components();
	$obj->displayContent("<form id='feedDetails' name='feedDetails' action='createfeed.php' method='post'>
	<table>
		<tr>
			<td> Feed Title</td>
			<td><input type='text' name='title' id='title' /></td>
		</tr>
		<tr>
			<td> Feed Description </td>
			<td> <textarea name='description' id='description'></textarea></td>
		</tr>
		<tr>
			<td> Link </td>
			<td> <input name='link' id='link' /></td>
		</tr>
		<tr>
			 <td> Source </td>
			 <td> <input name='source' id='source' /></td>
		</tr>
		<tr>
			<td> Source Link </td>
			<td> <input name='sourceUrl' id='sourceUrl' /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type='submit' name='submit' id='submit' value='Submit' /></td>
		</tr>
	</table>
</form>");
?>