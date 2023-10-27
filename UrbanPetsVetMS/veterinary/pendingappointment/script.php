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
    function modaleditprod(appointmentID){
        $("#mdladdproduct").modal('show');
        $('#txtopenproductheader').text("Add Prescription");

        $('#txtappointmentID').val(appointmentID);
    }

    function addprescription(){
        var textappointmentID = $("#txtappointmentID").val();
        var textprescriptmedication = $("#txtprescriptmedication").val();
        var textprescriptdosage = $("#txtprescriptdosage").val();
        var textprescriptquantity = $("#txtprescriptquantity").val();
        var textprescriptdirections = $("#txtprescriptdirections").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'pendingappointment/class.php',
                data: 'textappointmentID=' + textappointmentID + '&textprescriptmedication=' + textprescriptmedication + '&textprescriptdosage=' + textprescriptdosage + '&textprescriptquantity=' + textprescriptquantity + '&textprescriptdirections=' + encodeURIComponent(textprescriptdirections) + '&form=addprescription',
                success: function(data){
                    $("#mdladdproduct").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        displayappointmentlist();
                        clearproduct();

                        Swal.fire(
                          'Success!',
                          'Prescription successfully added.',
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
</script>