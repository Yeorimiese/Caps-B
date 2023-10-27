<?php
	include("../connect.php");
	session_start();

	switch ($_POST['form']) {

		case 'displaypetlist':
            if($_POST['srchprod'] != ''){
                $searchuseracc = "WHERE (a.petname LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchuseracc = "";
            }

            $page = $_POST["page"];
            $limit = ($page-1) * 10;
			$res = mysqli_query($connection, "SELECT a.petID, a.petname, a.pettype, a.breed, a.sex, a.weight, a.id, CASE WHEN b.middlename = '' OR b.middlename IS NULL THEN CONCAT(b.lastname, ', ', b.firstname) ELSE CONCAT(b.lastname, ', ', b.firstname, ' ', LEFT(b.middlename, '1'), '.') END FROM pets AS a LEFT JOIN tbl_user AS b ON a.userID = b.userID " . $searchuseracc . " ORDER BY a.petID ASC LIMIT ". $limit .",10");
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
	                        <td style='white-space: nowrap;'>" . $row[7] . "</td>
	                        <td style='white-space: nowrap; text-align: center;'>
	                        	<i class='fas fa-edit text-success Iclass' onclick='modaleditpet(\"". $row[0] ."\");'></i>
	                        	<i class='fas fa-trash-alt text-danger Iclass' onclick='deletepet(\"". $row[6] ."\");'></i>
							</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;

		case "loadproductlistPagination":
			if($_POST['srchprod'] != ''){
                $searchuseracc = "WHERE (a.petname LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchuseracc = "";
            }

			$page = $_POST["page"];
			$rowCount = mysqli_fetch_row(mysqli_query($connection, "SELECT COUNT(a.id) FROM pets AS a LEFT JOIN tbl_user AS b ON a.userID = b.userID " . $searchuseracc . ";"));
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

        case 'addpet':
        	$genID = generateID($connection, 'petID', 'pets', 'PET');

			$addpet = mysqli_query($connection, "INSERT INTO pets SET petID = '" . $genID . "', userID = '" . $_POST['textselectuser'] . "', petname = '" . $_POST['textpetpetname'] . "', pettype = '" . $_POST['textpetpettype'] . "', breed = '" . $_POST['textpetbreed'] . "', sex = '" . $_POST['textpetsex'] . "', weight = '" . $_POST['textpetweight'] . "', date_added = '" . date("Y-m-d") . "';");

			echo $genID;
		break;

		case 'modaleditpet':
            $proddet = mysqli_fetch_array(mysqli_query($connection, "SELECT petID, petname, pettype, breed, sex, weight, userID FROM pets WHERE petID = '" . $_POST['petID'] . "';"));

            echo $proddet[1] . "|" . $proddet[2] . "|" . $proddet[3] . "|" . $proddet[4] . "|" . $proddet[5] . "|" . $proddet[6];
		break;

		case 'editpet':
			$editpet = mysqli_query($connection, "UPDATE pets SET userID = '" . $_POST['textselectuser'] . "', petname = '" . $_POST['textpetpetname'] . "', pettype = '" . $_POST['textpetpettype'] . "', breed = '" . $_POST['textpetbreed'] . "', sex = '" . $_POST['textpetsex'] . "', weight = '" . $_POST['textpetweight'] . "' WHERE petID = '" . $_POST['textpetID'] . "';");
		break;

		case 'deletepet':
			$deletepet = mysqli_query($connection, "DELETE FROM pets WHERE id = '".$_POST['id']."'");
		break;

		case 'fncselectuserlist':
            if($_POST['srchprod'] != ''){
                $searchuseracc = "WHERE (userID LIKE '%". $_POST['srchprod'] ."%' OR  CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END LIKE '%". $_POST['srchprod'] ."%')"; 
            } else {
                $searchuseracc = "";
            }

			$res = mysqli_query($connection, "SELECT userID, CASE WHEN middlename = '' OR middlename IS NULL THEN CONCAT(lastname, ', ', firstname) ELSE CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, '1'), '.') END, contactnum, email FROM tbl_user " . $searchuseracc . " ORDER BY userID ASC");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					echo "<tr style='cursor:pointer;' onclick='dsplayuserinfo(\"". $row[0] ."\")'>
							<td style='white-space: nowrap;'><span style='font-weight:400'>" . $row[0] . "</span></td>
	                        <td style='white-space: nowrap;'>" . $row[1] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[2] . "</td>
	                        <td style='white-space: nowrap;'>" . $row[3] . "</td>
	                    </tr>";
				}
			} else {
				echo "<tr><td  colspan='12' style='text-align:center'>No Record Found . . .</td></tr>";
			}
		break;
	}
?>