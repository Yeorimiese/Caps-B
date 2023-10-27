<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'displayuserlist':
            if($_POST['srchprod'] != ''){
                $searchuseracc = "WHERE (CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchuseracc = "";
            }

            $page = $_POST["page"];
            $limit = ($page-1) * 10;
			$res = mysqli_query($connection, "SELECT userID, CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END, contactnum, email, address, id FROM tbl_user " . $searchuseracc . " ORDER BY userID ASC LIMIT ". $limit .",10");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){
					echo "<tr style='cursor:pointer;'>
	                        <td style='white-space: nowrap;'>" . $row[0] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[3] . "</td>
	                        <td style='white-space: pre-wrap;'>" . $row[4] . "</td>
	                        <td style='white-space: nowrap; text-align: center;'>
	                        	<i class='fas fa-edit text-success Iclass' onclick='modaledituser(\"". $row[0] ."\");'></i>
	                        	<i class='fas fa-trash-alt text-danger Iclass' onclick='deleteuser(\"". $row[5] ."\");'></i>
							</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case "loadproductlistPagination":
			if($_POST['srchprod'] != ''){
                $searchuseracc = "WHERE (CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchuseracc = "";
            }

			$page = $_POST["page"];
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(id) FROM tbl_user " . $searchuseracc . ";"));
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

        case 'adduser':
        	$genID = generateID($connection, 'userID', 'tbl_user', 'USER');

			$adduser = mysqli_query($connection, "INSERT INTO tbl_user SET userID = '" . $genID . "', firstname = '" . $_POST['textadduserFname'] . "', middlename = '" . $_POST['textadduserMname'] . "', lastname = '" . $_POST['textadduserLname'] . "', contactnum = '" . $_POST['textadduserContact'] . "', email = '" . $_POST['textadduserEmail'] . "', address = '" . $_POST['textadduseraddress'] . "', username = '" . $_POST['textadduserUsername'] . "', password = '" . $_POST['textadduserpass'] . "', status = '1', date_added = '" . date("Y-m-d") . "';");
		break;

		case 'modaledituser':
            $proddet = mysqli_fetch_array(mysqli_query($connection, "SELECT userID, firstname, middlename, lastname, contactnum, email, address, username, password FROM tbl_user WHERE userID = '" . $_POST['userID'] . "';"));

            echo $proddet[1] . "|" . $proddet[2] . "|" . $proddet[3] . "|" . $proddet[4] . "|" . $proddet[5] . "|" . $proddet[6] . "|" . $proddet[7] . "|" . $proddet[8];
		break;

		case 'edituser':
			$edituser = mysqli_query($connection, "UPDATE tbl_user SET firstname = '" . $_POST['textadduserFname'] . "', middlename = '" . $_POST['textadduserMname'] . "', lastname = '" . $_POST['textadduserLname'] . "', contactnum = '" . $_POST['textadduserContact'] . "', email = '" . $_POST['textadduserEmail'] . "', address = '" . $_POST['textadduseraddress'] . "', username = '" . $_POST['textadduserUsername'] . "', password = '" . $_POST['textadduserpass'] . "' WHERE userID = '" . $_POST['textuserID'] . "';");
		break;

		case 'deleteuser':
			$deleteuser = mysqli_query($connection, "DELETE FROM tbl_user WHERE id = '".$_POST['id']."'");
		break;
	}
?>