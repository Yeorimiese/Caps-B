<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtproductlistPageCount").val("1");
        $("#txtsearchappointment").keyup(function(e){
            if($('#txtsearchappointment').val() == ""){
                $("#txtproductlistPageCount").val("1");
                displayappointmentlist();
            } else{
                $("#txtproductlistPageCount").val("1");
                displayappointmentlist();
            }
        });
        displayappointmentlist();

        $(".txtAmountFields").change(function(){
            var x = ($(this).val()).replace(/,/g,"");
            var v = parseFloat(x||0);
            $(this).val(v.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });

        $(".numonly").keydown(function(event) {
            if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 190 || event.keyCode == 9 || event.keyCode == 188) {

            }else{
                if (event.keyCode < 48 || event.keyCode > 57 || event.keyCode == 17) {
                   event.preventDefault(); 
                }   
            }
        });

        $(".focus").focus(function(){
            this.select();
        });
    });

    function reqField1 ( classN ){
        var isValid = 1;
        $('.'+classN).each(function(){
            if( $(this).val() == '' || $(this).val() == '0.00' || $(this).val() == '0'){
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

// DISPLAY PENDING APPOINTMENTS
    function displayappointmentlist(){
        var srchprod = $("#txtsearchappointment").val();
        var page = $("#txtproductlistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'pendingappointment/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displayappointmentlist' ,
            success: function(data) {
                var arr = data.split("|");
                $("#tblappointmentlist").html(arr[0]);
                loadproductlistPagination();
            }
        })
    }

    function loadproductlistPagination() {
        var srchprod = $("#txtsearchappointment").val();
        var page = $("#txtproductlistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'pendingappointment/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadproductlistPagination',
            success: function(data){
                var arr = data.split("|");
                if(arr[1] != 1){
                    $("#upproductlistPageList").html(arr[0]);
                } else{
                    $("#upproductlistPageList").html('');
                }
            }
        })
    }

    function productlistPageFunc(page, pagenums) {
        $(".pgnumproductlistPageFunc").removeClass("active");
        $("#pgproductlistPageFunc" + pagenums).addClass("active");
        $("#txtproductlistPageCount").val(page);
        displayappointmentlist();
    }
// DISPLAY PRODUCT END
    function modaladdpayment(appointmentID, userID, totalamt){
        $("#mdladdproduct").modal('show');
        $('#txtopenproductheader').text("Add Payment");

        $('#txtappointmentID').val(appointmentID);
        $('#txtuserID').val(userID);
        $('#txttotalamtID').val(totalamt);
    }

    function addpayment(){
        var textappointmentID = $("#txtappointmentID").val();
        var textuserID = $("#txtuserID").val();
        var texttotalamtID = ($("#txttotalamtID").val()).replace(/,/g,"");
        var textaddpayment = ($("#txtaddpayment").val()).replace(/,/g,"");

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'pendingappointment/class.php',
                data: 'textappointmentID=' + textappointmentID + '&textuserID=' + textuserID + '&texttotalamtID=' + texttotalamtID + '&textaddpayment=' + textaddpayment + '&form=addpayment',
                success: function(data){
                    $("#mdladdproduct").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');
                        
                        displayappointmentlist();
                        clearproduct();

                        Swal.fire(
                          'Success!',
                          'Payment successfully added.',
                          'success'
                        )
                    },1500);
                }
            });    
        } else{
            Swal.fire(
              'ALERT',
              'Please review your entries. Ensure all required fields are filled out',
              'warning'
            )
        }
    }

    function clearproduct(){
        $(".clearinfo").css('border','');
        $(".clearinfo").val("");
    }

    function completebutton(appointmentID){
        $(".preloader").show().css('background','rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'pendingappointment/class.php',
            data: 'appointmentID=' + appointmentID + '&form=completebutton',
            success: function(data){
                setTimeout(function(){
                $(".preloader").hide().css('background','');
                    displayappointmentlist();

                    Swal.fire(
                      'Success!',
                      'Appointment successfully completed.',
                      'success'
                    )
                },1500);
            }
        })
    }
</script>