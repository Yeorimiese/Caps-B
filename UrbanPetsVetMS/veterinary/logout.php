<?php
	include("connect.php");
	session_start();
	$_SESSION['vetuserID'] = "";
	$_SESSION['vetusername'] = "";
	$_SESSION['vetfullname'] = "";
	$_SESSION['vetfirstname'] = "";
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