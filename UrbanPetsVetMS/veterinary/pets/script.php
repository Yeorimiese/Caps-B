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

// DISPLAY PENDING APPOINTMENTS
    function displayappointmentlist(){
        var srchprod = $("#txtsearchappointment").val();
        var page = $("#txtproductlistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'pets/class.php',
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
            url: 'pets/class.php',
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
    function modaleditprod(prescriptionID){
        $("#mdladdproduct").modal('show');
        $('#txtopenproductheader').text("Prescription Details");

        $.ajax({
            type: 'POST',
            url: 'pets/class.php',
            data: 'prescriptionID=' + prescriptionID + '&form=fncdsplyprescriptdet',
            success: function(data){
                var show = data.split("|");
                $("#txtprescpatient").text(show[0]);
                $("#txtpresdate").text(show[1]);
                $("#txtprescmedication").text(show[2]);
                $("#txtprescqty").text(show[3]);
                $("#txtprescdosage").text(show[4]);
                $("#txtprescdirections").text(show[5]);
            }
        });
    }
</script>