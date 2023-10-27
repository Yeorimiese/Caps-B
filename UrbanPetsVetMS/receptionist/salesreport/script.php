<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtproductlistPageCount").val("1");
        displayappointmentlist();
    });

    function displayappointmentlist(){
        var page = $("#txtproductlistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'salesreport/class.php',
            data: 'page=' + page + '&form=displayappointmentlist' ,
            success: function(data) {
                var arr = data.split("|");
                $("#tblappointmentlist").html(arr[0]);
                loadproductlistPagination();
            }
        })
    }

    function loadproductlistPagination() {
        var page = $("#txtproductlistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'salesreport/class.php',
            data: 'page=' + page + '&form=loadproductlistPagination',
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
</script>