<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

        case 'loginuser':
			$sqllogin = "SELECT id, userID, username, firstname, lastname, status FROM tbl_user WHERE username = '".$_POST['txtusername']."' AND password = '". $_POST['txtpassword'] ."';";
			$reslogin = mysqli_query($connection, $sqllogin);
			$rowlogin = mysqli_fetch_array($reslogin);
			$numlogin = mysqli_num_rows($reslogin);

			if($numlogin > 0){
				if($rowlogin['status'] == "1"){
					$count = 1;
					$_SESSION['userID'] = $rowlogin['userID'];
					$_SESSION['username'] = $rowlogin['username'];
					$_SESSION['fullname'] = $rowlogin['firstname'] . " " . $rowlogin['lastname'];
					$_SESSION['firstname'] = $rowlogin['firstname'];
				} else{
					$count = 3;
					$_SESSION['userID'] = "";
					$_SESSION['username'] = "";
					$_SESSION['fullname'] = "";
					$_SESSION['firstname'] = "";
				}
			} else{
				$count = 2;
				$_SESSION['userID'] = "";
				$_SESSION['username'] = "";
				$_SESSION['fullname'] = "";
				$_SESSION['firstname'] = "";
			}
			echo $count;
		break;
	}
?>