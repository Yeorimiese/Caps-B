<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'fncdisplayservicedet':
			$getpackdet = mysqli_fetch_array(mysqli_query($connection, "SELECT serviceID, servicename, servicedesc, price, image FROM services WHERE serviceID = '" . $_POST['textserviceID'] . "';"));

			echo $getpackdet[4] . "|" . $getpackdet[1] . "|₱ " . number_format($getpackdet[3], "2", ".", ",") . "|" . $getpackdet[2] . "|" . number_format($getpackdet[3], "2", ".", ",");
		break;

		case 'checktime':
            $b = 1;
            for($a=9; $a<=17; $a++){

                $firsttime = $a . ":00:00";
                $secondtime = $a . ":30:00";

                $firsttime2 = $b . ":00:00";
                $secondtime2 = $b . ":30:00";

                $checkifmaynakabookdate = mysqli_num_rows(mysqli_query($connection, "SELECT appointmentID FROM appointments WHERE serviceID = '" . $_POST['textserviceID'] . "' AND appstatus = 'PENDING' AND bookdate = '" . date('Y-m-d', strtotime($_POST['textbookdate'])) . "' AND booktime = '" . $firsttime . "';"));

                $checkifmaynakabookdate2 = mysqli_num_rows(mysqli_query($connection, "SELECT appointmentID FROM appointments WHERE serviceID = '" . $_POST['textserviceID'] . "' AND appstatus = 'PENDING' AND bookdate = '" . date('Y-m-d', strtotime($_POST['textbookdate'])) . "' AND booktime = '" . $secondtime . "';"));

                if($a>= 9 && $a<=11){

                    if($checkifmaynakabookdate == TRUE){
                        ?> <option value="<?php echo $firsttime; ?>" style="color: red" disabled><?php echo $firsttime . " AM"; ?></option> <?php
                    } else{
                        ?> <option value="<?php echo $firsttime; ?>"><?php echo $firsttime . " AM"; ?></option> <?php
                    }

                    if($checkifmaynakabookdate2 == TRUE){
                        ?> <option value="<?php echo $secondtime; ?>" style="color: red" disabled><?php echo $secondtime . " AM"; ?></option> <?php
                    } else{
                        ?> <option value="<?php echo $secondtime; ?>"><?php echo $secondtime . " AM"; ?></option> <?php
                    }
                }
                else if($a==12){
                    if($checkifmaynakabookdate == TRUE){
                        ?> <option value="<?php echo $firsttime; ?>" style="color: red" disabled><?php echo $firsttime . " PM"; ?></option> <?php
                    } else{
                        ?> <option value="<?php echo $firsttime; ?>"><?php echo $firsttime . " PM"; ?></option> <?php
                    }

                    if($checkifmaynakabookdate2 == TRUE){
                        ?> <option value="<?php echo $secondtime; ?>" style="color: red" disabled><?php echo $secondtime . " PM"; ?></option> <?php
                    } else{
                        ?> <option value="<?php echo $secondtime; ?>"><?php echo $secondtime . " PM"; ?></option> <?php
                    }

                }if($a>= 13 && $a<=16){
                    if($checkifmaynakabookdate == TRUE){
                        ?> <option value="<?php echo $firsttime; ?>" style="color: red" disabled><?php echo $firsttime2 . " PM"; ?></option> <?php
                    } else{
                        ?> <option value="<?php echo $firsttime; ?>"><?php echo $firsttime2 . " PM"; ?></option> <?php
                    }

                    if($checkifmaynakabookdate2 == TRUE){
                        ?> <option value="<?php echo $secondtime; ?>" style="color: red" disabled><?php echo $secondtime2 . " PM"; ?></option> <?php
                    } else{
                        ?> <option value="<?php echo $secondtime; ?>"><?php echo $secondtime2 . " PM"; ?></option> <?php
                    }

                    $b++;
                }
            }
        break;

        case 'dsplaylistoftime':
            $res = mysqli_query($connection, "SELECT petID, petname FROM pets WHERE userID = '" . $_SESSION['userID']  . "';");
            ?> <option value=""></option> <?php
            while($row = mysqli_fetch_array($res)) {
                ?> <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option> <?php
            }
        break;

		case 'submitbooknow':
			$genID = generateID($connection, 'appointmentID', 'appointments', 'APP');

			$book = mysqli_query($connection, "INSERT INTO appointments SET appointmentID = '" . $genID . "', userID = '" . $_SESSION['userID'] . "', petID = '" . $_POST['textbookpet'] . "', serviceID = '" . $_POST['textserviceID'] . "', serviceamt = '" . $_POST['textpackagepricehidden'] . "', bookdate = '" . date('Y-m-d', strtotime($_POST['textbookdate'])) . "', booktime = '" . $_POST['textbooktime'] . "', totalamt = '" . $_POST['textpackagepricehidden'] . "', balance = '" . $_POST['textpackagepricehidden'] . "', appstatus = 'PENDING', paymentstat = 'UNPAID', date_added = '" . date("Y-m-d") . "';");
			
			echo $genpayID;
		break;

        case 'vetSchedule':
            $vetSchedArray = mysqli_query($connection, "SELECT schedate, schedstarttime, schedendtime FROM vetsched;");
            $obj = [];
            while($row = mysqli_fetch_array($vetSchedArray)) {
                $tempArray = ['date' => $row[0], 'start' => $row[1], 'end' => $row[2]];
                array_push($obj, $tempArray);
            }
            header('Content-Type: application/json');
            echo json_encode($obj);
            break;
	}
?>