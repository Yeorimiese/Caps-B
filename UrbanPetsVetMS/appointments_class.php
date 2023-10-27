<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

        case 'fncdsplylistofappointments':
        	$count = 0;
        	$res = mysqli_query($connection, "SELECT appointmentID, userID, petID, serviceID, serviceamt, bookdate, booktime, appstatus FROM appointments WHERE userID = '" . $_SESSION['userID']  . "' ORDER BY appointmentID DESC;");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){
					$count++;

					$getpet = mysqli_fetch_array(mysqli_query($connection, "SELECT petname FROM pets WHERE petID = '" . $row[2] . "';"));
					$getservice = mysqli_fetch_array(mysqli_query($connection, "SELECT servicename FROM services WHERE serviceID = '" . $row[3] . "';"));

					if($row[7]=="PENDING"){
						$orderstatus = "<span class='label label-light-danger'>Pending</span>";
					} elseif ($row[7]=="COMPLETED") {
						$orderstatus = "<span class='label label-light-success'>Completed</span>";
					}

					echo "<tr>
                            <td  style='min-width: 1px;white-space: nowrap;'>
                            	 <a href='javascript:void(0)'>" . $row[0] . "</a>
                            </td>
                            <td class='product_name' style='white-space: nowrap;'>
                                <a href='javascript:void(0)'>" . $getpet[0] . "</a>
                            </td>
                            <td class='product_name' style='min-width: 2px;white-space: nowrap;'>
                                <a href='javascript:void(0)'>" . $getservice[0] . "</a>
                            </td>
                            <td class='product_name' style='min-width: 2px;white-space: nowrap;'>
                                <a href='javascript:void(0)'>₱ " . number_format($row[4], "2", ".", ",") . "</a>
                            </td>
                            <td class='product_name' style='min-width: 2px;white-space: nowrap;'>
                            	<a href='javascript:void(0)'>" . date('F d, Y', strtotime($row[5])) . "</a>
                            </td>
                            <td class='product_name' style='min-width: 2px;white-space: nowrap;'>
                            	<a href='javascript:void(0)'>" . date('g:i a', strtotime($row[6])) . "</a>
                            </td>
                            <td class='product_name' style='min-width: 2px;white-space: nowrap;'>
                                <a href='javascript:void(0)'>" . $orderstatus . "</a>
                            </td>
                        </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;
	}
?>