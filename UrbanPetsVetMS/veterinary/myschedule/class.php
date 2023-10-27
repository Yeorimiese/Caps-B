<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'addschedule':
			$addschedule = mysqli_query($connection, "INSERT INTO vetsched SET vetID = '" . $_SESSION['vetuserID'] . "', schedate = '" . date('Y-m-d', strtotime($_POST['textscheduledate'])) . "', schedstarttime = '" . date('H:i:s', strtotime($_POST['textschedulefrom'])) . "', schedendtime = '" . date('H:i:s', strtotime($_POST['textschedto'])) . "';");
		break;
	}
?>