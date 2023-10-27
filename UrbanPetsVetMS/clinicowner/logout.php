<?php
	include("connect.php");
	session_start();
	$_SESSION['owneruserID'] = "";
	$_SESSION['ownerusername'] = "";
	$_SESSION['ownerfullname'] = "";
	$_SESSION['ownerfirstname'] = "";
	echo "<script>window.location='index.php';</script>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Untitled Document</title>
	</head>
	<body>
	</body>
</html>