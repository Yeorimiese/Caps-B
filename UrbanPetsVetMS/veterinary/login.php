<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
    <style type="text/css">
        .auth {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
        /*            background-color: #bebebe;*/
            overflow-x: hidden;
            overflow-y: auto;

            background-image: url('../admin/assets/images/cover.png');
            background-repeat: no-repeat; /* Prevent image from repeating */
            background-size: cover; /* Cover the entire element */
            background-position: center; /* Center the image */
        }

        .auth-container {
            width: 450px;
            min-height: 330px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%);
            transform: translateY(-50%) translateX(-50%);
        }

        .card {
            background-color: #fff;
            -webkit-box-shadow: 1px 1px 5px rgb(126 142 159);
            box-shadow: 1px 1px 5px rgb(126 142 159);
            margin-bottom: 10px;
            border-radius: 0;
            border: none;
        }

        .auth-container .auth-header {
            text-align: center;
            margin-top: 30px;
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
    </style>
</head>

<body>
    <div class="preloader">
      <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> 
      </svg>
    </div>

    <div class="auth">
        <div class="auth-container">
            <div class="card" style="background-color: #fffffff2;">
                <header class="auth-header">
                    <a href="javascript:void(0)" class="text-center db" style="padding-top: 10px;padding-bottom: 10px;"><img src="../admin/assets/images/logo.png" alt="Home" width ="30%" height="auto" style="border: 0px solid #e2e2e2;" />
                    </a>  
                </header>
                <div class="card-body cardbodylogin" style="padding: 1.25rem 1.8rem;">
                    <div class="form-horizontal form-material">
                        <div class="form-group row" style="margin-bottom: 5px;">
                            <div class="col-md-12">
                                <p class="text-center" style="margin-bottom: 5px; font-weight: 400; font-size: 1rem">SIGN IN YOUR ACCOUNT</p>
                            </div>
                        </div>

                        <label class="mt-3" for="username" style="margin-bottom: 0px; font-weight: 500">Username</label>
                        <div class="form-group row">
                            <span class="text-danger"></span>
                            <div class="col-md-11" style="flex: 0 0 98.2%; max-width: 98.2%;">
                                <input type="email" class="form-control underlined" name="txtusername" id="txtusername" placeholder="Enter your username" required style="height: 40px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" style="margin-bottom: 0px; font-weight: 500">Password</label>
                            <span class="text-danger"></span>
                            <div class="row">
                                <div class="col-md-11" style="padding-right: 0px; flex: 0 0 95%; max-width: 95%;">
                                    <input type="password" class="form-control underlined" name="txtpassword" id="txtpassword" placeholder="Enter your password" required style="height: 40px;">
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;padding-right: 0px; flex: 1%; max-width: 1%;">
                                    <i class="fa fa-eye-slash" style="margin-left: -23px; cursor: pointer; font-size: 1.1rem; margin-top: .7rem" id="logineye" onclick="fncloginpassattribunHash()"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-md btn-block text-uppercase waves-effect waves-light" onclick="loginuser();" style="padding: 10px 10px; font-weight: 500; background-color: #1287dd; border: #1287dd 1px solid">LogIn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include('jscripts.php'); ?>

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
        $(".preloader").show().css('background','rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'adminclass.php',
            data: 'txtusername='+txtusername+
            '&txtpassword='+txtpassword+
            '&form=loginuser',
            success: function(data){
                setTimeout(function(){
                    $(".preloader").hide().css('background','');
                    if(data == 1){
                        window.location = 'index.php';
                    } else if(data == 3){
                        Swal.fire(
                          'USER INACTIVE',
                          'Your account is currently inactive, Please contact your admin.',
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

    function fncloginpassattribHash(){
        $("#txtpassword").attr("type", "password");
        $("#logineye").attr("onclick", "fncloginpassattribunHash()");
        $("#logineye").removeClass("fa-eye");
        $("#logineye").addClass("fa-eye-slash");
    }

    function fncloginpassattribunHash(){
        $("#txtpassword").attr("type", "text");
        $("#logineye").attr("onclick", "fncloginpassattribHash()");
        $("#logineye").addClass("fa-eye");
        $("#logineye").removeClass("fa-eye-slash");
    }


</script>