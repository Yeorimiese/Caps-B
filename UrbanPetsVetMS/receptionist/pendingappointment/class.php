<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'displayappointmentlist':
            if($_POST['srchprod'] != ''){
                $searchuseracc = "AND (CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchuseracc = "";
            }

            $page = $_POST["page"];
            $limit = ($page-1) * 10;
			$res = mysqli_query($connection, "SELECT a.appointmentID, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END, c.petname, d.servicename, a.bookdate, a.booktime, a.totalamt, a.balance, a.userID, a.paymentstat FROM appointments AS a LEFT JOIN tbl_user AS b ON a.userID = b.userID LEFT JOIN pets AS c ON a.petID = c.petID LEFT JOIN services AS d ON a.serviceID = d.serviceID WHERE a.appstatus = 'PENDING' " . $searchuseracc . " ORDER BY a.appointmentID ASC LIMIT ". $limit .",10");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					if($row[9] == "PAID"){
						$paymentbutton = "<i class='fas fa-credit-card text-secondary' title='Add Payment' style='font-size:1.4rem;'></i>";
						$completebutton = "<i class='fas fa-check-circle text-success' title='Complete' style='font-size:1.4rem;' onclick='completebutton(\"". $row[0] ."\");'></i>";
					} else{
						$paymentbutton = "<i class='fas fa-credit-card text-info' title='Add Payment' style='font-size:1.4rem;' onclick='modaladdpayment(\"". $row[0] ."\", \"". $row[8] ."\", \"". number_format($row[6], "2", ".", ",") ."\");'></i>";
						$completebutton = "<i class='fas fa-check-circle text-secondary' title='Complete Appointment' style='font-size:1.4rem;margin-left: 5px'></i>";
					}

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[3] . "</td>
	                        <td style='white-space: nowrap;'>" . date('F d, Y', strtotime($row[4])) . "</td>
	                        <td style='white-space: nowrap;'>" . date('g:i a', strtotime($row[5])) . "</td>
	                        <td style='white-space: nowrap;'>₱ " . number_format($row[6], "2", ".", ",") . "</td>
	                        <td style='white-space: nowrap;'>₱ " . number_format($row[7], "2", ".", ",") . "</td>
	                        <td style='white-space: nowrap; text-align: center;'>
	                        	" . $paymentbutton . "
	                        	" . $completebutton . "
							</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case "loadproductlistPagination":
			if($_POST['srchprod'] != ''){
                $searchuseracc = "AND (CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchuseracc = "";
            }

			$page = $_POST["page"];
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(a.id) FROM appointments AS a LEFT JOIN tbl_user AS b ON a.userID = b.userID LEFT JOIN pets AS c ON a.petID = c.petID LEFT JOIN services AS d ON a.serviceID = d.serviceID WHERE a.appstatus = 'PENDING' " . $searchuseracc . ";"));
			$rowsperpage = 10;
			$range = 1;
			$totalpages = ceil($rowCount[0] / $rowsperpage);
			$prevpage;
			$nextpage;

			if($page > 1 ){
			   	echo "<li style='width:50px !important;' onclick='productlistPageFunc(1)'><< </li>";
			   	$prevpage = $page - 1;
			   	echo "<li style='width:70px !important;' onclick='productlistPageFunc(". $prevpage .")'>< </li>";
			}

			for($x = ($page - $range); $x < (($page + $range) + 1); $x++){
			   	if (($x > 0) && ($x <= $totalpages)){
			      	if ($x == $page){
		   				echo "<li id='pgproductlistPageFunc" . $x . "' class='pgnumproductlistPageFunc active' onclick='productlistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
		   				$ex = $x;
		   			} else{
						echo "<li id='pgproductlistPageFunc" . $x . "' class='pgnumproductlistPageFunc' onclick='productlistPageFunc(" . $x . ",". $x .")'>" . $x . "</li>"; 
						$ex = $x;
					}
		      	}
		    }

		    if($page < ($totalpages - $range)){ 
		    	echo "<li>...</li>"; 
		    }

		    if ($page != $totalpages && $rowCount[0] != 0){
		       	$nextpage = $page + 1;
		       	echo "<li style='width:50px !important;' onclick='productlistPageFunc(". $nextpage .", ". $nextpage .")'> ></li>";
		       	echo "<li style='width:50px !important;' onclick='productlistPageFunc(". $totalpages .", ". $totalpages .")'> >></li>";
		    }

		    echo "|". $ex;
		break;

        case 'addpayment':
        	$genID = generateID($connection, 'transactionID', 'payments', 'TRANS');

			$addpayment = mysqli_query($connection, "INSERT INTO payments SET transactionID = '" . $genID . "', appointmentID = '" . $_POST['textappointmentID'] . "', userID = '" . $_POST['textuserID'] . "', amount = '" . $_POST['texttotalamtID'] . "', amountpaid = '" . $_POST['textaddpayment'] . "', date_added = '" . date("Y-m-d") . "';");

			$getamountpaid = mysqli_fetch_array(mysqli_query($connection, "SELECT tlamountpaid FROM appointments WHERE appointmentID = '" . $_POST['textappointmentID'] . "';"));

			$totalamtpaid = $getamountpaid[0] + $_POST['textaddpayment'];
			$balance = $_POST['texttotalamtID'] - $totalamtpaid;

			if($balance <= 0){
				$balance = 0;
				$paymentstatus = "PAID";
			} else{
				$paymentstatus = "UNPAID";
			}

			$updateappointment = mysqli_query($connection, "UPDATE appointments SET tlamountpaid = '" . $totalamtpaid . "', balance = '" . $balance . "', paymentstat = '" . $paymentstatus . "' WHERE appointmentID = '" . $_POST['textappointmentID'] . "';");
		break;

		case 'completebutton':
			$completebutton = mysqli_query($connection, "UPDATE appointments SET appstatus = 'COMPLETED' WHERE appointmentID = '". $_POST['appointmentID'] ."'");
		break;
	}
?>