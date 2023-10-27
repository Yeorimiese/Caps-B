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

    .auth-header {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 30px;
        justify-content: center;
    }

    .passwordclass {
        border: 1px solid #e1e1e1;
        height: 45px !important;
        background: #ffffff;
        width: 100%;
        padding: 0 20px;
        color: #757575;
        border-radius: 0rem;
        font-size: inherit;
    }

    .passwordclass:focus {
        box-shadow: inset 0 0px 0 #e1e1e1 !important;
        border: 1px solid #e1e1e1;
        font-size: inherit;
    }

    .account_form button {
        background: #82bdff;
        margin-left: 0px;
    }
</style>

<!-- customer login start -->
<div class="customer_login" style="margin-top: 50px;padding-bottom: 50px;">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <!--login area start-->
            <div class="col-lg-5 col-md-5">
                <div class="account_form">
                    <div style="border: 1px solid #e1e1e1; padding: 28px 20px 28px; border-radius: 5px;">

                        <div class="contact_message form" style="text-align: center;margin-top: 25px;margin-bottom: 35px;">
                            <h2 style="font-size: 35px;">LOGIN</h2>
                        </div>

                        <p>
                            <label>Email <span>*</span></label>
                            <input type="text" id="txtusername">
                        </p>

                        <label>Password <span>*</span></label>
                        <div class="input-group" style="margin-top: 0px;margin-bottom: 25px">
                            <input type="Password" class="form-control passwordclass" id="txtpassword">
                            <div class="input-group-prepend" style="cursor: pointer;" onclick="fncaddpassattribunHash2();" id="inputaddusereye2">
                                <span class="input-group-text" style="height: 45px;border-radius: 0rem;"><i class="fa fa-eye-slash" id="addusereye2"></i></span>
                            </div>
                        </div>

                        <div class="login_submit" style="margin-bottom:20px;text-align: left;">
                            <button style="padding: 5px 30px;height: 38px;" onclick="loginuser()">login</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--login area start-->
        </div>
    </div>
</div>
<!-- customer login end -->

<script type="text/javascript">
    $(document).keyup(function(e){
        var e = e || window.event; // for IE to cover IEs window event-object
        if(e.which == 13 ){
            loginuser();
        }
    });
    
    function loginuser(){
        var txtusername = $("#txtusername").val();
        var txtpassword = $("#txtpassword").val();

        $(".loadload").show();
        $.ajax({
            type: 'POST',
            url: 'login_class.php',
            data: 'txtusername=' + txtusername + '&txtpassword=' + txtpassword + '&form=loginuser',
            success: function(data){
                setTimeout(function(){
                    $(".loadload").hide();

                    if(data == 1){
                        setTimeout(function(){
                            window.location = "index.php?url=home";
                        },1500);

                    } else if(data == 3){
                        Swal.fire(
                          'USER INACTIVE',
                          'Your account is currently not approve, Please contact your admin.',
                          'warning'
                        )

                    } else{
                        Swal.fire(
                          'USER NOT FOUND',
                          'You have entered invalid username or password.',
                          'warning'
                        )
                    }
                },1000);
            }
        })
    }

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

    function fncaddpassattribHash2(){
        $("#txtpassword").attr("type", "password");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribunHash2()");
        $("#addusereye2").removeClass("fa-eye");
        $("#addusereye2").addClass("fa-eye-slash");
    }

    function fncaddpassattribunHash2(){
        $("#txtpassword").attr("type", "text");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribHash2()");
        $("#addusereye2").addClass("fa-eye");
        $("#addusereye2").removeClass("fa-eye-slash");
    }
</script>