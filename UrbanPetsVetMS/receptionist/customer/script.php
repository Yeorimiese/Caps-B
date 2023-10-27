<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();
         $(".contactnum").inputmask("+63 999-999-9999");

        $("#txtuserlistPageCount").val("1");
        $("#txtsearchuser").keyup(function(e){
            if($('#txtsearchuser').val() == ""){
                $("#txtuserlistPageCount").val("1");
                displayuserlist();
            } else{
                $("#txtuserlistPageCount").val("1");
                displayuserlist();
            }
        });
        displayuserlist();
    });

    function fncaddpassattribHash(){
        $("#txtadduserpass").attr("type", "password");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribunHash()");
        $("#addusereye2").removeClass("fa-eye");
        $("#addusereye2").addClass("fa-eye-slash");
    }

    function fncaddpassattribunHash(){
        $("#txtadduserpass").attr("type", "text");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribHash()");
        $("#addusereye2").addClass("fa-eye");
        $("#addusereye2").removeClass("fa-eye-slash");
    }

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

    function displayuserlist(){
        var srchprod = $("#txtsearchuser").val();
        var page = $("#txtuserlistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'customer/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displayuserlist' ,
            success: function(data) {
                var arr = data.split("|");
                $("#tbluserlist").html(arr[0]);
                loadproductlistPagination();
            }
        })
    }

    function loadproductlistPagination() {
        var srchprod = $("#txtsearchuser").val();
        var page = $("#txtuserlistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'customer/class.php',
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
        $("#txtuserlistPageCount").val(page);
        displayuserlist();
    }

    // ADD, EDIT, DELETE
    function modaladdproduct(){
        $("#mdladduser").modal('show');
        $('#txtopenproductheader').text("Add Customer");

        $(".btnuseraccSAVE").css("display", "block");
        $(".btnuseraccUPDATE").css("display", "none");
    }

    function adduser(){
        var textadduserFname = $("#txtadduserFname").val();
        var textadduserMname = $("#txtadduserMname").val();
        var textadduserLname = $("#txtadduserLname").val();
        var textadduserContact = $("#txtadduserContact").val();
        var textadduserEmail = $("#txtadduserEmail").val();
        var textadduseraddress = $("#txtadduseraddress").val();
        var textadduserUsername = $("#txtadduserUsername").val();
        var textadduserpass = $("#txtadduserpass").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'customer/class.php',
                data: 'textadduserFname=' + textadduserFname + '&textadduserMname=' + textadduserMname + '&textadduserLname=' + textadduserLname + '&textadduserContact=' + encodeURIComponent(textadduserContact) + '&textadduserEmail=' + encodeURIComponent(textadduserEmail) + '&textadduseraddress=' + textadduseraddress + '&textadduserUsername=' + encodeURIComponent(textadduserUsername) + '&textadduserpass=' + encodeURIComponent(textadduserpass) + '&form=adduser',
                success: function(data){
                    $("#mdladduser").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        displayuserlist();
                        clearuser();

                        Swal.fire(
                          'Success!',
                          'Customer successfully added.',
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

    function clearuser(){
        $(".clearinfo").css('border','');
        $(".clearinfo").val("");

        fncaddpassattribHash();
    }

    function modaledituser(userID){
        $("#mdladduser").modal('show');
        $('#txtopenproductheader').text("Edit Customer");

        $(".btnuseraccSAVE").css("display", "none");
        $(".btnuseraccUPDATE").css("display", "block");

        $.ajax({
            type: 'POST',
            url: 'customer/class.php',
            data: 'userID=' + userID + '&form=modaledituser',
            success: function(data){
                var show = data.split("|");
                $('#txtuserID').val(userID);

                $('#txtadduserFname').val(show[0]);
                $('#txtadduserMname').val(show[1]);
                $('#txtadduserLname').val(show[2]);
                $('#txtadduserContact').val(show[3]);
                $('#txtadduserEmail').val(show[4]);
                $('#txtadduseraddress').val(show[5]);
                $('#txtadduserUsername').val(show[6]);
                $('#txtadduserpass').val(show[7]);
            }
        }); 
    }

    function edituser(){
        var textuserID = $("#txtuserID").val();
        var textadduserFname = $("#txtadduserFname").val();
        var textadduserMname = $("#txtadduserMname").val();
        var textadduserLname = $("#txtadduserLname").val();
        var textadduserContact = $("#txtadduserContact").val();
        var textadduserEmail = $("#txtadduserEmail").val();
        var textadduseraddress = $("#txtadduseraddress").val();
        var textadduserUsername = $("#txtadduserUsername").val();
        var textadduserpass = $("#txtadduserpass").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'customer/class.php',
                data: 'textuserID=' + textuserID + '&textadduserFname=' + textadduserFname + '&textadduserMname=' + textadduserMname + '&textadduserLname=' + textadduserLname + '&textadduserContact=' + encodeURIComponent(textadduserContact) + '&textadduserEmail=' + encodeURIComponent(textadduserEmail) + '&textadduseraddress=' + textadduseraddress + '&textadduserUsername=' + encodeURIComponent(textadduserUsername) + '&textadduserpass=' + encodeURIComponent(textadduserpass) + '&form=edituser',
                success: function(data){
                    $("#mdladduser").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        displayuserlist();
                        clearuser();

                        Swal.fire(
                          'Success!',
                          'Customer successfully updated.',
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

    function deleteuser(id){
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
                    url: 'customer/class.php',
                    data: 'id=' + id + '&form=deleteuser',
                    success: function(data){
                        setTimeout(function(){
                        $(".preloader").hide().css('background','');
                            Swal.fire(
                              'Success!',
                              'Customer successfully deleted.',
                              'success'
                            )
                            displayuserlist();
                        },1000);
                    }
                })
            }
        })
    }
</script>