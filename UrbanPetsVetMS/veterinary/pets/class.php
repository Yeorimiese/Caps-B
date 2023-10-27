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
			$res = mysqli_query($connection, "SELECT p.prescriptionID, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END, c.petname, p.date_added FROM prescriptions AS p LEFT JOIN appointments AS a ON p.appointmentID = a.appointmentID LEFT JOIN tbl_user AS b ON a.userID = b.userID LEFT JOIN pets AS c ON a.petID = c.petID WHERE p.vetID = '" . $_SESSION['vetuserID'] . "' " . $searchuseracc . " ORDER BY p.prescriptionID ASC LIMIT ". $limit .",10");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . date('F d, Y', strtotime($row[3])) . "</td>
	                        <td style='white-space: nowrap; text-align: center;'>
	                        	<i class='fas fa-file-alt text-info' style='font-size:1.4rem;' onclick='modaleditprod(\"". $row[0] ."\");'></i>
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
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(a.id) FROM prescriptions AS p LEFT JOIN appointments AS a ON p.appointmentID = a.appointmentID LEFT JOIN tbl_user AS b ON a.userID = b.userID LEFT JOIN pets AS c ON a.petID = c.petID WHERE p.vetID = '" . $_SESSION['vetuserID'] . "' " . $searchuseracc . ";"));
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

        case 'fncdsplyprescriptdet':
			$presdet = mysqli_fetch_array(mysqli_query($connection, "SELECT a.prescriptionID, b.petID, a.vetID, a.date_added, a.medication, a.quantity, a.dosage, a.directions FROM prescriptions AS a LEFT JOIN appointments AS b ON a.appointmentID = b.appointmentID WHERE a.prescriptionID = '" . $_POST['prescriptionID']  . "';"));

            $getpet = mysqli_fetch_array(mysqli_query($connection, "SELECT petname FROM pets WHERE petID = '" . $presdet[1] . "';"));

            echo $getpet[0] . "|" . date('F d, Y', strtotime($presdet[3])) . "|" . $presdet[4] . "|" . $presdet[5] . "|" . $presdet[6] . "|" . $presdet[7];
		break;
	}
?>