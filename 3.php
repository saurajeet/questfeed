<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php include("2.php") ?>
<?php 
echo "if ...else<br />";
$d = date("D");
if ($d == "Fri")
{	echo "Hello !<br />";
	echo "Hav a nce weekend";
}
elseif ($d == "tuesday")
{	echo "Weekend is far away";
}
else
{	echo "Check your tray";
}
?>
</body>
</html>
