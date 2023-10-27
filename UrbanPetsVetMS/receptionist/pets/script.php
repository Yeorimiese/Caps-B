<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtpetlistPageCount").val("1");
        $("#txtsearchpet").keyup(function(e){
            if($('#txtsearchpet').val() == ""){
                $("#txtpetlistPageCount").val("1");
                displaypetlist();
            } else{
                $("#txtpetlistPageCount").val("1");
                displaypetlist();
            }
        });
        displaypetlist();

        $("#txtsearchuser").keyup(function(e){
            if($('#txtsearchuser').val() == ""){
                fncselectuserlist();
            } else{
                fncselectuserlist();
            }
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

    function displaypetlist(){
        var srchprod = $("#txtsearchpet").val();
        var page = $("#txtpetlistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'pets/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displaypetlist' ,
            success: function(data) {
                var arr = data.split("|");
                $("#tblpetlist").html(arr[0]);
                loadproductlistPagination();
            }
        })
    }

    function loadproductlistPagination() {
        var srchprod = $("#txtsearchpet").val();
        var page = $("#txtpetlistPageCount").val();
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
        $("#txtpetlistPageCount").val(page);
        displaypetlist();
    }

    // ADD, EDIT, DELETE
    function modaladdproduct(){
        $("#mdladdpet").modal('show');
        $('#txtopenproductheader').text("Add Pet");

        $(".btnuseraccSAVE").css("display", "block");
        $(".btnuseraccUPDATE").css("display", "none");
    }

    function addpet(){
        var textselectuser = $("#txtselectuser").val();
        var textpetpetname = $("#txtpetpetname").val();
        var textpetpettype = $("#txtpetpettype").val();
        var textpetbreed = $("#txtpetbreed").val();
        var textpetsex = $("#txtpetsex").val();
        var textpetweight = $("#txtpetweight").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'pets/class.php',
                data: 'textselectuser=' + textselectuser + '&textpetpetname=' + textpetpetname + '&textpetpettype=' + textpetpettype + '&textpetbreed=' + textpetbreed + '&textpetsex=' + textpetsex + '&textpetweight=' + textpetweight + '&form=addpet',
                success: function(data){
                    $("#mdladdpet").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        displaypetlist();
                        clearpet();

                        Swal.fire(
                          'Success!',
                          'Pet successfully added.',
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

    function clearpet(){
        $(".clearinfo").css('border','');
        $(".clearinfo").val("");
    }

    function modaleditpet(petID){
        $("#mdladdpet").modal('show');
        $('#txtopenproductheader').text("Edit Pet");

        $(".btnuseraccSAVE").css("display", "none");
        $(".btnuseraccUPDATE").css("display", "block");

        $.ajax({
            type: 'POST',
            url: 'pets/class.php',
            data: 'petID=' + petID + '&form=modaleditpet',
            success: function(data){
                var show = data.split("|");
                $('#txtpetID').val(petID);

                $('#txtpetpetname').val(show[0]);
                $('#txtpetpettype').val(show[1]);
                $('#txtpetbreed').val(show[2]);
                $('#txtpetsex').val(show[3]);
                $('#txtpetweight').val(show[4]);

                $('#txtselectuser').val(show[5]);
            }
        }); 
    }

    function editpet(){
        var textpetID = $("#txtpetID").val();
        var textselectuser = $("#txtselectuser").val();
        var textpetpetname = $("#txtpetpetname").val();
        var textpetpettype = $("#txtpetpettype").val();
        var textpetbreed = $("#txtpetbreed").val();
        var textpetsex = $("#txtpetsex").val();
        var textpetweight = $("#txtpetweight").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'pets/class.php',
                data: 'textpetID=' + textpetID + '&textselectuser=' + textselectuser + '&textpetpetname=' + textpetpetname + '&textpetpettype=' + textpetpettype + '&textpetbreed=' + textpetbreed + '&textpetsex=' + textpetsex + '&textpetweight=' + textpetweight + '&form=editpet',
                success: function(data){
                    $("#mdladdpet").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        displaypetlist();
                        clearpet();

                        Swal.fire(
                          'Success!',
                          'Pet successfully updated.',
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

    function deletepet(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.value) {
                $(".preloader").show().css('background','rgba(255,255,255,0.5)');
                $.ajax({
                    type: 'POST',
                    url: 'pets/class.php',
                    data: 'id=' + id + '&form=deletepet',
                    success: function(data){
                        setTimeout(function(){
                        $(".preloader").hide().css('background','');
                            Swal.fire(
                              'Success!',
                              'Pet successfully deleted.',
                              'success'
                            )
                            displaypetlist();
                        },1000);
                    }
                })
            }
        })
    }

    // SEARCH USER
    function openmdlselectuser(){
        $("#mdlselectuser").modal('show');
        $("#txtsearchuser").val("");
        fncselectuserlist();
    }

    function fncselectuserlist(){
        var srchprod = $("#txtsearchuser").val();
        $.ajax ({
            type: 'POST',
            url: 'pets/class.php',
            data: 'srchprod=' + srchprod + '&form=fncselectuserlist' ,
            success: function(data) {
                $("#tblselectuserlist").html(data);
            }
        })
    }

    function dsplayuserinfo(userID){
        $("#mdlselectuser").modal('hide');
        $('#txtselectuser').val(userID);
    }
</script>