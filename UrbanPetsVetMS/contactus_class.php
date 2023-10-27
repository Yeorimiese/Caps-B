<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

        case 'submitmessage':
			$submitmessage = mysqli_query($connection, "INSERT INTO message SET name = '" . $_POST['textcontactname'] . "', email = '" . $_POST['textcontactemail'] . "', message = '" . $_POST['textcontactmessage'] . "', date_added = '" . date("Y-m-d") . "';");
		break;
	}
?>