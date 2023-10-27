<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'addschedule':
			$addschedule = mysqli_query($connection, "INSERT INTO staffsched SET staffID = '" . $_SESSION['staffuserID'] . "', schedate = '" . date('Y-m-d', strtotime($_POST['textscheduledate'])) . "', schedstarttime = '" . date('H:i:s', strtotime($_POST['textschedulefrom'])) . "', schedendtime = '" . date('H:i:s', strtotime($_POST['textschedto'])) . "';");
		break;
	}
?>