<?php
    session_start();
    if(empty($_SESSION['userID']))
    {   echo "<script> window.location = 'index.php?url=login';</script>"; }
?>

<style type="text/css">
    .dashboard_tab_button ul li a.active {
        background: #69a9f1;
    }

    .dashboard_tab_button ul li a:hover {
      background: #69a9f1;
      color: #ffffff;
    }

    .nav-link:focus, .nav-link:hover {
        color: #ffffff;
    }

    .dashboard_tab_button ul li {
        margin: 5px;
        min-width: 200px;
        text-align: center;
    }

    .product_d_table table tbody tr td:first-child {
        width: 20%;
    }

    .personalinfobutton{
        padding: 0 15px !important;
        height: 32px !important;
        line-height: 32px !important;
        background-color: #fbb75c !important;
        color: #ffffff !important;
    }

    .swal2-icon {
        position: relative;
        box-sizing: content-box;
        justify-content: center;
        width: 5em;
        height: 5em;
        margin: .5em auto .5em;
        border: 0.25em solid transparent;
        border-radius: 50%;
        border-color: #000;
        font-family: inherit;
        line-height: 5em;
        cursor: default;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .swal2-title {
        position: relative;
        max-width: 100%;
        margin: 0 0 0em;
        padding: 0;
        color: #595959;
        font-size: 1.875em;
        font-weight: 600;
        text-align: center;
        text-transform: none;
        word-wrap: break-word;
    }

    .swal2-actions {
        display: flex;
        z-index: 1;
        box-sizing: border-box;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin: 20px auto 0;
        padding: 0;
    }

    .swal2-styled.swal2-confirm {
        border: 0;
        border-radius: 0.25em;
        background: initial;
        background-color: #2778c4;
        color: #fff;
        font-size: 1em;
        padding: 8px 30px;
    }

    /*  BOOKING DETAILS  */
        .tblbookbutton {
            background: #ffac3e !important;
            color: #ffffff !important;
            border: 0 !important;
            box-shadow: none;
            border-radius: 2px; 
            height: 30px;
            line-height: 10px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
            padding: 0px 8px;
            text-transform: capitalize;
        }

        .tblbookbutton:hover {
            background: #ffbb61 !important;
        }

        .tblbookbutton2 {
            background: #289fec !important;
            color: #ffffff !important;
            border: 0 !important;
            box-shadow: none;
            border-radius: 2px; 
            height: 30px;
            line-height: 10px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
            padding: 0px 8px;
            text-transform: capitalize;
        }

        .tblbookbutton2:hover {
            background: #52bbff !important;
        }
    
    @media only screen and (min-width: 1200px) and (max-width: 1600px){
        .modaldsplyeditpersonal{
            min-width: 900px !important;
        }

        .modaldsplysearchaddress {
            min-width: 550px !important;
        }

        .modalbodypadding {
            padding: 29px 6px 25px;
        }
        .modalbodypadding2 {
            padding: 15px 6px 15px;
        }
    }

    @media only screen and (min-width: 1601px){
        .modaldsplyeditpersonal{
            min-width: 900px !important;
        }

        .modaldsplysearchaddress {
            min-width: 550px !important;
        }

        .modalbodypadding {
            padding: 29px 6px 25px;
        }
        .modalbodypadding2 {
            padding: 15px 6px 15px;
        }
    }
</style>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>More Information</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
<section class="main_content_area" style="padding: 40px 0 50px;">
    <div class="container">
        <div class="account_dashboard">
            <div class="row" style="justify-content:center;">
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-bottom:30px">
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list" style="flex-direction: row!important;justify-content:center;">
                            <li style="margin-left:0px;"><a href="#personalinfo" data-bs-toggle="tab" class="nav-link active">My Profile</a></li>
                            <li><a href="#petinfo" data-bs-toggle="tab" class="nav-link">My Pets</a></li>
                            <li> <a href="#transactionrec" data-bs-toggle="tab" class="nav-link">Transaction Record</a></li>
                            <li><a href="#acquiredserv" data-bs-toggle="tab" class="nav-link">Acquired Services</a></li>
                            <li><a href="#prescriptions" data-bs-toggle="tab" class="nav-link">Prescription</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <!-- PERSONAL INFORMATION -->
                        <div class="tab-pane fade show active" id="personalinfo">
                            <h3 style="text-align:center">Personal Information</h3>
                            <div class="product_d_table">
                                <form action="#">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="first_child" style="font-weight:500">Fullname</td>
                                                <td><span id="txtfullname"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child" style="font-weight:500">Contact No.</td>
                                                <td><span id="txtcontactno"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child" style="font-weight:500">Email</td>
                                                <td><span id="txtemail"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="first_child" style="font-weight:500">Address</td>
                                                <td><span id="txtaddress"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>

                        <!-- PETS INFORMATION -->
                        <div class="tab-pane fade" id="petinfo">
                            <h3 style="text-align:center">My Pets</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>PET ID</th>
                                            <th>NAME</th>
                                            <th>PET TYPE</th>
                                            <th>BREED</th>
                                            <th>GENDER</th>
                                            <th>WEIGHT</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dsplytblpets"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- TRANSACTION RECORD -->
                        <div class="tab-pane fade" id="transactionrec">
                            <h3 style="text-align:center">Transaction Record</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>TRANSACTION NO.</th>
                                            <th>APPOINTMENT NO.</th>
                                            <th>SERVICE</th>
                                            <th>AMOUNT</th>
                                            <th>PAID</th>
                                            <th>BALANCE</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dsplytbltransactions"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- ACQUIRED SERVICES -->
                        <div class="tab-pane fade" id="acquiredserv">
                            <h3 style="text-align:center">Acquired Services</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SERVICE</th>
                                            <th>PET</th>
                                            <th>DATE</th>
                                            <th>TIME</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dsplytblacquiredserv"></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- PRESCRIPTIONS -->
                        <div class="tab-pane fade" id="prescriptions">
                            <h3 style="text-align:center">Prescriptions</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>PRESCRIPTION NO.</th>
                                            <th>PET</th>
                                            <th>VET</th>
                                            <th>DATE</th>
                                            <th>OPTION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dsplytblprescriptions"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account end   -->

<!-- modal area start-->
<div class="modal fade" id="mdlviewprescript" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modaldsplysearchaddress">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="left: 91%;">
                <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>
            <div class="modal_body modalbodypadding2">
                <div class="container">
                    <div class="modal_title mb-20">
                        <h2>Prescription</h2>
                    </div>

                    <h5 style="font-size: 15px;"><span style="font-weight:500">Patient:</span> <span id="txtprescpatient"></span></h5>
                    <h5 style="font-size: 15px;"><span style="font-weight:500">Date:</span> <span id="txtpresdate"></span></h5>
                    <h5 style="font-size: 15px;margin-bottom: 20px;"><span style="font-weight:500">Doctor:</span> <span id="txtprescdoctor"></span></h5>

                    <h5 style="font-size: 15px;"><span style="font-weight:500">Medication:</span> <span id="txtprescmedication"></span></h5>
                    <h5 style="font-size: 15px;"><span style="font-weight:500">Quantity:</span> <span id="txtprescqty"></span></h5>
                    <h5 style="font-size: 15px;"><span style="font-weight:500">Dosage:</span> <span id="txtprescdosage"></span></h5>
                    <h5 style="font-size: 15px;margin-bottom: 20px;"><span style="font-weight:500">Directions:</span> <span id="txtprescdirections"></span></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->

<script type="text/javascript">
    $(function() {
        fncdsplypersonalinfo();
        fncdsplypetslist();
        fncdsplybookings();
        fncdsplyacquiredserv();
        fncdsplyprescription();
    })

    // PERSONAL INFORMATION START
        function fncdsplypersonalinfo(){
            $.ajax({
                type: 'POST',
                url: 'moreinformation_class.php',
                data: 'form=fncdsplypersonalinfo',
                success: function(data){
                    var show = data.split("|");
                    $("#txtfullname").text(show[0]);
                    $("#txtcontactno").text(show[1]);
                    $("#txtemail").text(show[2]);
                    $("#txtaddress").text(show[3]);
                }
            });    
        }
    // PERSONAL INFORMATION END

    // MY PETS START
        function fncdsplypetslist(){
            $.ajax({
                type: 'POST',
                url: 'moreinformation_class.php',
                data: 'form=fncdsplypetslist',
                success: function(data){
                    $("#dsplytblpets").html(data);
                }
            });    
        }
    // MY PETS END

    // TRANSACTION RECORD START
        function fncdsplybookings(){
            $.ajax({
                type: 'POST',
                url: 'moreinformation_class.php',
                data: 'form=fncdsplybookings',
                success: function(data){
                    $("#dsplytbltransactions").html(data);
                }
            });    
        }
    // TRANSACTION RECORD END

    // ACQUIRED SERVICES START
        function fncdsplyacquiredserv(){
            $.ajax({
                type: 'POST',
                url: 'moreinformation_class.php',
                data: 'form=fncdsplyacquiredserv',
                success: function(data){
                    $("#dsplytblacquiredserv").html(data);
                }
            });    
        }
    // ACQUIRED SERVICES END

    // PRESCRIPTION START
        function fncdsplyprescription(){
            $.ajax({
                type: 'POST',
                url: 'moreinformation_class.php',
                data: 'form=fncdsplyprescription',
                success: function(data){
                    $("#dsplytblprescriptions").html(data);
                }
            });    
        }

        function openmdlviewpresdet(prescriptionID) {
            $("#mdlviewprescript").modal('show');

            $.ajax({
                type: 'POST',
                url: 'moreinformation_class.php',
                data: 'prescriptionID=' + prescriptionID + '&form=fncdsplyprescriptdet',
                success: function(data){
                    var show = data.split("|");
                    $("#txtprescpatient").text(show[0]);
                    $("#txtpresdate").text(show[1]);
                    $("#txtprescdoctor").text(show[2]);
                    $("#txtprescmedication").text(show[3]);
                    $("#txtprescqty").text(show[4]);
                    $("#txtprescdosage").text(show[5]);
                    $("#txtprescdirections").text(show[6]);
                }
            });
        }
    // PRESCRIPTION END
</script>