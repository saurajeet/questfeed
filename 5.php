<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
echo "PHP Mail";
$to = "vention.gothics@gmail.com";
$subject = "Test Mail";
$message = "Hello thhis is the body";
$from = "vention.gothics@gmail.com";
$headers = "From: $from";

if (mail($to, $subject, $message, $headers))
	echo "Mail Sent";
else
	echo "Mail Not sent";
?>
</body>
</html>
