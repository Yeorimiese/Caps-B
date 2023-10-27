<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'loginuser':
			$sqllogin = "SELECT id, userID, username, firstname, lastname FROM vet WHERE username = '".$_POST['txtusername']."' AND password = '". $_POST['txtpassword'] ."'";
			$reslogin = mysqli_query($connection, $sqllogin);
			$rowlogin = mysqli_fetch_array($reslogin);
			$numlogin = mysqli_num_rows($reslogin);

			if($numlogin > 0){
				$count = 1;
				$_SESSION['vetuserID'] = $rowlogin['userID'];
				$_SESSION['vetusername'] = $rowlogin['username'];
				$_SESSION['vetfullname'] = $rowlogin['firstname'] . " " . $rowlogin['lastname'];
				$_SESSION['vetfirstname'] = $rowlogin['firstname'];
			} else{
				$count = 2;
				$_SESSION['vetuserID'] = "";
				$_SESSION['vetusername'] = "";
				$_SESSION['vetfullname'] = "";
				$_SESSION['vetfirstname'] = "";
			}
			echo $count;
		break;

		case 'opensettingmod':
			$return_array = array();

			$getprofile = mysqli_fetch_array(mysqli_query($connection, "SELECT username, password FROM vet WHERE userID = '". $_SESSION['vetuserID'] ."'"));

			$DateJoined = date('F d, Y', strtotime($Dateuserpharmacy[0]));
			array_push($return_array, $getprofile[0], $getprofile[1]);
			echo json_encode($return_array);
		break;

		case 'updateuser2':
			$ressavelog = mysqli_query($connection, "UPDATE vet SET username = '" . $_POST['textsetemail'] . "', password = '" . $_POST['textsetpassword'] . "' WHERE userID = '". $_SESSION['vetuserID'] ."';");
		break;
	}
?>