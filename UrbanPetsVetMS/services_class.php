<?php
	include("connect.php");
	session_start();

	switch ($_POST['form']) {

        case 'fncdisplaylistofpackages':
        	echo "<script src='assets/js/main.js'></script>";

	        // PACKAGES LIST
        	$res = mysqli_query($connection, "SELECT serviceID, servicename, servicedesc, price, image FROM services WHERE id != '' ORDER BY id ASC");
			$numrows = mysqli_num_rows($res);
			if($numrows == TRUE){
				while($row = mysqli_fetch_array($res)){

					echo "<div class='col-md-12'>
	                        <article class='single_product packageborder'>
	                            <figure>
	                                <div class='product_thumb'>
	                                    <a class='primary_img' href='javascript:void(0)'>
	                                        <img src='" . $row[4] . "' alt=''>
	                                    </a>
	                                </div>
	                                <div class='product_content list_content'>
	                                    <h4 class='product_name packagedescname'>
	                                        <a href='javascript:void(0)'>" . $row[1] . "</a>
	                                    </h4>
	                                    <div class='price_box'>
	                                        <span class='current_price'>₱ " . number_format($row[3], "2", ".", ",") . "</span>
	                                    </div>
	                                    <div class='product_desc packagedesc'>
	                                        <p>" . $row[2] . "</p>
	                                    </div>

	                                    <br>
	                                    <button class='buynowbutton' onclick='openbooknowpage(\"". $row[0] ."\")'>Book Now</button>
	                                </div>
	                            </figure>
	                        </article>
	                    </div>";
				}
			} else {
				echo "<div class='col-md-12'><span><i>No Record Found . . .</i></span></div>";
			}
		break;
	}
?>