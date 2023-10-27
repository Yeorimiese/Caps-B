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
			$res = mysqli_query($connection, "SELECT a.appointmentID, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END, c.petname, d.servicename, a.bookdate, a.booktime FROM appointments AS a LEFT JOIN tbl_user AS b ON a.userID = b.userID LEFT JOIN pets AS c ON a.petID = c.petID LEFT JOIN services AS d ON a.serviceID = d.serviceID WHERE a.appstatus = 'PENDING' " . $searchuseracc . " ORDER BY a.appointmentID ASC LIMIT ". $limit .",10");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[3] . "</td>
	                        <td style='white-space: nowrap;'>" . date('F d, Y', strtotime($row[4])) . "</td>
	                        <td style='white-space: nowrap;'>" . date('g:i a', strtotime($row[5])) . "</td>
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
	}
?>