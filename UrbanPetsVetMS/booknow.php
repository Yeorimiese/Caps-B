<?php
    session_start();
    if(empty($_SESSION['userID']))
    {   echo "<script> window.location = 'index.php?url=login';</script>"; }
?>

<style type="text/css">
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

    .booknowbutton {
        border: 0;
        font-size: 16px;
        background: #76b2f6;
        height: 42px;
        line-height: 42px;
        text-transform: capitalize;
        min-width: 130px;
        margin-top: 15px;
    }

    .booknowbutton:hover {
        background: #4792e9;
    }

    .clsservicename {
        text-transform: uppercase;
        line-height: 20px;
        font-size: 22px;
        font-weight: 600 !important;
        margin-bottom: 22px;
        font-family: "Lora", serif;
    }

    .clsserviceprice {
        font-size: 20px !important;
    }
</style>

<?php if(isset($_GET['serviceID'])){ ?>
    <input type="hidden" value="<?php echo $_GET['serviceID']; ?>" id="txtserviceID">
<?php } else{ ?> 
    <input type="hidden" value="" id="txtserviceID">
<?php } ?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>BOOK NOW</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details" style="padding-top: 60px; padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="javascript:void(0)">
                            <img id="txtpackageimage" src="" data-zoom-image="" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <h1 class="clsservicename"><a href="javascript:void(0)" id="txtpackagename"></a></h1>
                    <div class="price_box">
                        <span class="current_price clsserviceprice" id="txtpackageprice"></span>
                    </div>

                    <div class="product_desc">
                        <p style="white-space: pre-wrap;" id="txtpackagedet"></p>
                    </div>

                    <div class="row">
                        <input type="hidden" id="txtpackagepricehidden">

                        <div class="col-lg-9 col-md-12" style="margin-bottom: 20px;">
                            <div class="contact_message form">
                                <p>
                                    <label>Select Pet</label>
                                    <select class="nice-select reqresinfo" name="orderby" id="txtbookpet" style="border: 1px solid #e1e1e1; height: 45px; max-width: 100%; padding: 0 16px; background: none; width: 100%; color: #757575; border-radius: 0px;">
                                        <option selected value=""></option>
                                    </select>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-12">
                            <div class="contact_message form">
                                <p>
                                    <label>Date</label>
                                    <input type="text" class="date-picker reqresinfo" placeholder="MM/DD/YYYY" id="txtbookdate" onchange="$('#txtbookdate').datepicker('hide');settime();" readonly style="cursor: pointer;">
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="contact_message form">
                                <p>
                                    <label>Time</label>
                                    <select class="nice-select reqresinfo" name="orderby" id="txtbooktime" style="border: 1px solid #e1e1e1; height: 45px; max-width: 100%; padding: 0 20px; background: none; width: 100%; color: #757575; border-radius: 0px;">
                                        <option selected value=""></option>
                                    </select>
                                </p>
                            </div>
                        </div>
                    </div>

                    <button class="button booknowbutton" onclick="submitbooknow()">Book Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product details end-->

<script type="text/javascript">
    $(function() {
        var dateNow = new Date();
        // loop through dates
        // available dates are plus one in the datepicker need to use momentjs to fix timezones
        let dates = ['2023-11-01', '2023-11-02']; 
        dates = dates.map(date => {
            date = new Date(date);
            date = date.setDate(date.getDate());
            return new Date(date).toUTCString().slice(0, -13)
        });
        $(".date-picker").datepicker({
            autoHide: true,
            format: 'mm/dd/yyyy',
            todayHighlight: true,
            startDate: '+0d',
            beforeShowDay: function(date) {
                var string = new Date(date).toUTCString().slice(0, -13)
                // console.log(dates, string)
                return dates.indexOf(string) !== -1;
            }
        });

        fncdisplayservicedet();
        dsplaylistoftime();
    })

    function reqField1 ( classN ){
        var isValid = 1;
        $('.'+classN).each(function(){
            if( $(this).val() == '' ){
                $(this).css('border','1px #a94442 solid');
                $(this).addClass('lala');
                isValid = 0;
            } else {
                $(this).css('border','');
                $(this).removeClass('lala');
            }
        });

        return isValid;
    }

    function fncdisplayservicedet(){
        var textserviceID = $("#txtserviceID").val();

        $.ajax({
            type: 'POST',
            url: 'booknow_class.php',
            data: 'textserviceID=' + textserviceID + '&form=fncdisplayservicedet',
            success: function(data){
                var show = data.split("|");
                $("#txtpackageimage").attr("src", show[0]);
                $("#txtpackageimage").attr("data-zoom-image", show[0]);

                $("#txtpackagename").text(show[1]);
                $("#txtpackageprice").text(show[2]);
                $("#txtpackagedet").text(show[3]);

                $("#txtpackagepricehidden").val(show[4]);
            }
        });    
    }

    function dsplaylistoftime(){
        $.ajax ({
            type: 'POST',
            url: 'booknow_class.php',
            data: 'form=dsplaylistoftime' ,
            success: function(data) {
                $("#txtbookpet").html(data);
            }
        }) 
    }

    function settime(){
        var textserviceID = $("#txtserviceID").val();
        var textbookdate = $("#txtbookdate").val();

        if(textserviceID == "" || textbookdate == ""){
            $("#txtbooktime").html("<option value=''></option>");
        } else{
            $.ajax ({
                type: 'POST',
                url: 'booknow_class.php',
                data: 'textserviceID=' + textserviceID + '&textbookdate=' + textbookdate + '&form=checktime' ,
                success: function(data) {
                    $("#txtbooktime").html(data);
                }
            })  
        }
    }

    function submitbooknow(){
        var textserviceID = $("#txtserviceID").val();
        var textpackagepricehidden = ($("#txtpackagepricehidden").val()).replace(/,/g,"");
        var textbookdate = $("#txtbookdate").val();
        var textbooktime = $("#txtbooktime").val();
        var textbookpet = $("#txtbookpet").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".loadload").show();
            $.ajax({
                type: 'POST',
                url: 'booknow_class.php',
                data: 'textserviceID=' + textserviceID + '&textpackagepricehidden=' + textpackagepricehidden + '&textbookdate=' + textbookdate + '&textbooktime=' + textbooktime + '&textbookpet=' + textbookpet + '&form=submitbooknow',
                success: function(data){
                    setTimeout(function(){
                        $(".loadload").hide();
                        Swal.fire({
                            title: "Success!",
                            text: "Successfully Booked.",
                            type: "success",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#009efb",
                            confirmButtonText: "Okay",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location = "index.php?url=home"; 
                            }
                        });  
                    },500);
                }
            })
        } else{
            Swal.fire(
              'ALERT',
              'Please review your entries. Ensure all required fields are filled out',
              'warning'
            )
        }
    }
</script>