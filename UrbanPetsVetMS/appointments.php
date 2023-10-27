<?php
    session_start();
    if(empty($_SESSION['userID']))
    {   echo "<script> window.location = 'index.php?url=login';</script>"; }
?>

<style type="text/css">
    .table_desc .cart_page table thead tr th {
        font-size: 15px;
    }

    .table-responsive table tbody tr td {
        font-size: 13px;
    }

    @media only screen and (max-width: 767px) {
        .tablebuttonneed {
            padding: 10px 10px !important;
        }

        .coupon_code.left {
            margin-bottom: 10px;
        }

        .product-details-tab {
            margin-bottom: 10px;
        }

        .product_d_info {
            margin-bottom: 20px;
        }

        .product_details {
            margin-top: 10px;
        }

        .modal-content button.close {
            left: 88% !important;
        }

        .shopping_cart_area {
            margin-top: 10px;
        }

        .marginebottomforpaymeth {
            margin-bottom: 10px;
        }

        .table_desc .cart_page table thead tr th {
            font-size: 13px;
        }

        .table-responsive table tbody tr td {
            font-size: 11px;
        }

        .table_desc .cart_page table tbody tr td.product_name a {
            font-size: 11px;
        }
    }
</style>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>APPOINTMENTS</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="shopping_cart_area" style="margin-top:30px;">
    <div class="container">
        <form action="#">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc" style="margin-bottom: 40px;">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="white-space: nowrap;min-width:1px!important;">APPOINTMENT NO.</th>
                                        <th style="white-space: nowrap;min-width:50px!important;">PET</th>
                                        <th style="white-space: nowrap;min-width:2px!important;">SERVICE</th>
                                        <th style="white-space: nowrap;min-width:2px!important;">AMOUNT</th>
                                        <th style="white-space: nowrap;min-width:2px!important;">DATE</th>
                                        <th style="white-space: nowrap;min-width:2px!important;">TIME</th>
                                        <th style="white-space: nowrap;min-width:2px!important;">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody id="listofappointments"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--shopping cart area end -->

<script type="text/javascript">
    $(function() {
        $("#appointments").addClass('active');

        fncdsplylistofappointments();
    })

    function fncdsplylistofappointments(){
        $.ajax({
            type: 'POST',
            url: 'appointments_class.php',
            data: 'form=fncdsplylistofappointments',
            success: function(data){
                var show = data.split("|");
                $("#listofappointments").html(show[0]);
            }
        });    
    }
</script>