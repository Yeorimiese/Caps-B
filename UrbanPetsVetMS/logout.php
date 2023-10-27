<?php
	include("connect.php");
	session_start();

	$_SESSION['userID'] = "";
	$_SESSION['username'] = "";
	$_SESSION['fullname'] = "";
	$_SESSION['firstname'] = "";

	echo "<script>window.location='index.php?url=login';</script>";
?>