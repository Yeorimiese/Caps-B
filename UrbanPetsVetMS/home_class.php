<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

        case 'fncdisplaylistofpackages':
        	echo "<script src='assets/js/main.js'></script>";

        	// HEADER
        	echo "<div class='col-12' style='margin-bottom: 20px;text-align: center;'>
	                <div class='welcome_lukani_header'>
	                    <h2>Our Services</h2>
	                </div>
	            </div>";

	        // PACKAGES LIST
        	$res = mysqli_query($connection, "SELECT serviceID, servicename, servicedesc, price, image FROM services WHERE id != '' ORDER BY id ASC LIMIT 3");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					echo "<div class='col-lg-4 col-md-4'>
		                    <div class='single_services packageborder' style='position: relative;'>
			                    <div class='services_thumb packagesimages'>
			                        <img src='" . $row[4] . "' alt=''>
			                    </div>
			                    <div class='services_content packagecontent'>
			                        <h3>" . $row[1] . "</h3>
			                        <p>" . $row[2] . "</p>
			                    </div>

				                <button class='buynowbutton' onclick='openbooknowpage(\"". $row[0] ."\")'>Book Now</button>
			                </div>
		                </div>
		            ";
				}
			} else {
				echo "<div class='col-12'><span><i>No Services Found . . .</i></span></div>";
			}

			// BOTTOM BUTTON
			echo "<div class='col-lg-12' style='text-align:center; margin-top: 20px;'>
	                <div class='comments_form'>
	                    <button class='button' onclick='morepackageoffer()'>More Services Offer</button>
	                </div>
	            </div>";
		break;
	}
?>