<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

        case 'fncdsplypersonalinfo':
        	$user = mysqli_fetch_array(mysqli_query($connection, "SELECT CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END, contactnum, email, address FROM tbl_user WHERE userID = '" . $_SESSION['userID'] . "';"));

            echo $user[0] . "|" . $user[1] . "|" . $user[2] . "|" . $user[3];
		break;

		case 'fncdsplypetslist':
			$res = mysqli_query($connection, "SELECT petID, petname, pettype, breed, gender, weight FROM pets WHERE userID = '" . $_SESSION['userID']  . "' ORDER BY petID ASC");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[3] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[4] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[5] . "</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case 'fncdsplybookings':
			$res = mysqli_query($connection, "SELECT a.transactionID, a.appointmentID, b.serviceID, a.amount, a.amountpaid FROM payments AS a LEFT JOIN appointments AS b ON a.appointmentID = b.appointmentID WHERE a.userID = '" . $_SESSION['userID']  . "' ORDER BY a.transactionID ASC");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					$getservice = mysqli_fetch_array(mysqli_query($connection, "SELECT servicename FROM services WHERE serviceID = '" . $row[2] . "';"));

					$balance = $row[3] - $row[4];

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $getservice[0] . "</td>
	                        <td style='white-space: pre-wrap;'>₱ " . number_format($row[3], "2", ".", ",") . "</td>
	                        <td style='white-space: pre-wrap;'>₱ " . number_format($row[4], "2", ".", ",") . "</td>
	                        <td style='white-space: pre-wrap;'>₱ " . number_format($balance, "2", ".", ",") . "</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case 'fncdsplyacquiredserv':
			$res = mysqli_query($connection, "SELECT appointmentID, userID, petID, serviceID, serviceamt, bookdate, booktime, appstatus FROM appointments WHERE userID = '" . $_SESSION['userID']  . "' ORDER BY appointmentID DESC;");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					$getpet = mysqli_fetch_array(mysqli_query($connection, "SELECT petname FROM pets WHERE petID = '" . $row[2] . "';"));
					$getservice = mysqli_fetch_array(mysqli_query($connection, "SELECT servicename FROM services WHERE serviceID = '" . $row[3] . "';"));

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $getservice[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $getpet[0] . "</td>
	                        <td style='white-space: pre-wrap;'>" . date('F d, Y', strtotime($row[5])) . "</td>
	                        <td style='white-space: pre-wrap;'>" . date('g:i a', strtotime($row[6])) . "</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case 'fncdsplyprescription':
			$res = mysqli_query($connection, "SELECT a.prescriptionID, b.petID, a.vetID, a.date_added FROM prescriptions AS a LEFT JOIN appointments AS b ON a.appointmentID = b.appointmentID WHERE b.userID = '" . $_SESSION['userID']  . "' ORDER BY a.prescriptionID ASC");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					$getpet = mysqli_fetch_array(mysqli_query($connection, "SELECT petname FROM pets WHERE petID = '" . $row[1] . "';"));

					$getvet = mysqli_fetch_array(mysqli_query($connection, "SELECT CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END FROM vet WHERE userID = '" . $row[2] . "';"));

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $getpet[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $getvet[0] . "</td>
	                        <td style='white-space: pre-wrap;'>" . date('F d, Y', strtotime($row[3])) . "</td>
	                        <td>
	                        	<button class='tblbookbutton2' onclick='openmdlviewpresdet(\"". $row[0] ."\")'>View</button>
	                        </td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case 'fncdsplyprescriptdet':
			$presdet = mysqli_fetch_array(mysqli_query($connection, "SELECT a.prescriptionID, b.petID, a.vetID, a.date_added, a.medication, a.quantity, a.dosage, a.directions FROM prescriptions AS a LEFT JOIN appointments AS b ON a.appointmentID = b.appointmentID WHERE a.prescriptionID = '" . $_POST['prescriptionID']  . "';"));

            $getpet = mysqli_fetch_array(mysqli_query($connection, "SELECT petname FROM pets WHERE petID = '" . $presdet[1] . "';"));
            $getvet = mysqli_fetch_array(mysqli_query($connection, "SELECT CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END FROM vet WHERE userID = '" . $presdet[2] . "';"));

            echo $getpet[0] . "|" . date('F d, Y', strtotime($presdet[3])) . "|" . $getvet[0] . "|" . $presdet[4] . "|" . $presdet[5] . "|" . $presdet[6] . "|" . $presdet[7];
		break;
	}
?>