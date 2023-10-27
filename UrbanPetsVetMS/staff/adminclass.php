<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'loginuser':
			$sqllogin = "SELECT id, userID, username, firstname, lastname FROM staff WHERE username = '".$_POST['txtusername']."' AND password = '". $_POST['txtpassword'] ."'";
			$reslogin = mysqli_query($connection, $sqllogin);
			$rowlogin = mysqli_fetch_array($reslogin);
			$numlogin = mysqli_num_rows($reslogin);

			if($numlogin > 0){
				$count = 1;
				$_SESSION['staffuserID'] = $rowlogin['userID'];
				$_SESSION['staffusername'] = $rowlogin['username'];
				$_SESSION['stafffullname'] = $rowlogin['firstname'] . " " . $rowlogin['lastname'];
				$_SESSION['stafffirstname'] = $rowlogin['firstname'];
			} else{
				$count = 2;
				$_SESSION['staffuserID'] = "";
				$_SESSION['staffusername'] = "";
				$_SESSION['stafffullname'] = "";
				$_SESSION['stafffirstname'] = "";
			}
			echo $count;
		break;

		case 'opensettingmod':
			$return_array = array();

			$getprofile = mysqli_fetch_array(mysqli_query($connection, "SELECT username, password FROM staff WHERE userID = '". $_SESSION['staffuserID'] ."'"));

			$DateJoined = date('F d, Y', strtotime($Dateuserpharmacy[0]));
			array_push($return_array, $getprofile[0], $getprofile[1]);
			echo json_encode($return_array);
		break;

		case 'updateuser2':
			$ressavelog = mysqli_query($connection, "UPDATE staff SET username = '" . $_POST['textsetemail'] . "', password = '" . $_POST['textsetpassword'] . "' WHERE userID = '". $_SESSION['staffuserID'] ."';");
		break;
	}
?>