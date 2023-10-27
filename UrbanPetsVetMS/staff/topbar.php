<style type="text/css">
    @media (max-width:1100px) {
        .logoutneedmawala4 {
            display: block !important;
        }

        .logoutneedmawala3 {
            display: none !important;
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

        .stylestyle:activate{
            border: 0 !important;
            outline: none;
        }

        .stylestyle:focus{
            border: 0 !important;
            outline: none;
        }
    }
</style>
<!-----header for admin ----->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header logoutneedmawala3" style="padding-bottom: 1px;width: 240px;background-color: #007edb;">
            <a class="navbar-brand" href="javascript:void(0)">
                <h5 class="text-white" style="margin-bottom:0px;"><img src="../admin/assets/images/logo.png" alt="homepage" class="dark-logo imagetopbar" style="width: 120px;"/></h5>
            </a>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0 ">
                <!-- This is  -->
                <li class="nav-item kailangan" style="display:none;"> 
                    <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a> 
                </li>

                <li class="nav-item dropdown kailangan2 logoutneedmawala4" style="padding-left:5px;display:none;">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h5 class="text-white" style="margin-bottom:0px;"><img src="../admin/assets/images/logo.png" alt="homepage" class="dark-logo imagetopbar" style="width: 40px;"/></h5>
                    </a>
                </li>
                
                <li class="nav-item kailangan" style=""> 
                    <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-arrow-left-circle"></i>
                    </a> 
                </li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                <li class="nav-item">
                    <a href="javascript:void(0)" onclick="opensettingmod();" class="nav-link text-muted waves-effect waves-dark" style="font-size: 26px;"><i class="fas fa-cog" style="color:#ffffff;"></i></a>
                </li>

                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-muted waves-effect waves-dark" style="font-size: 27px;padding-left: .2rem;"><i class="fas fa-sign-out-alt" style="color:#ffffff;"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div id="modalupdateprofileset" class="modal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-md"style="max-width: 400px;">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div style="display: flex;justify-content: space-between !important;">
                            <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Account Settings</h4>
                            <button type="button" class="close stylestyle" data-dismiss="modal" aria-hidden="true" onclick="cleardata()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="txtsetemail" style="margin-bottom: 0px;">Username</label>
                        <input type="text" class="form-control reqdistitem5" name="txtsetemail" id="txtsetemail" style="height: 40px;">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="txtsetpassword" style="margin-bottom: 0px;">Password</label>
                        <div class="input-group">
                            <input type="Password" class="form-control reqdistitem5" id="txtsetpassword">
                            <div class="input-group-prepend" style="cursor: pointer;" onclick="fncaddpassattribunHash();" id="inputaddusereye">
                                <span class="input-group-text"><i class="fas fa-eye-slash" id="addusereye"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn waves-effect waves-light btn-secondary" style="background-color: #599dea !important; border-color: #599dea;" onclick="updateuser2();">UPDATE</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        fncdisplayuserinfo();
    })

    function logoutuser(){
        Swal.fire({
          title: 'Are you sure?',
          text: 'You want to logout your account?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "logout.php";
          }
        });
    }

    function opensettingmod(){
        $("#modalupdateprofileset").modal('show');

        $.ajax({
            type: 'POST',
            url: 'adminclass.php',
            data: 'form=opensettingmod',
            success: function(data){
                var arr = JSON.parse(data);
                $("#txtsetemail").val(arr[0]);
                $("#txtsetpassword").val(arr[1]);
            }
        });
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

    function fncaddpassattribHash(){
        $("#txtsetpassword").attr("type", "password");
        $("#inputaddusereye").attr("onclick", "fncaddpassattribunHash()");
        $("#addusereye").removeClass("fa-eye");
        $("#addusereye").addClass("fa-eye-slash");
    }

    function fncaddpassattribunHash(){
        $("#txtsetpassword").attr("type", "text");
        $("#inputaddusereye").attr("onclick", "fncaddpassattribHash()");
        $("#addusereye").addClass("fa-eye");
        $("#addusereye").removeClass("fa-eye-slash");
    }

    function updateuser2(){
        var textsetemail = $("#txtsetemail").val();
        var textsetpassword = $("#txtsetpassword").val();
        if( reqField1( 'reqdistitem5' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'adminclass.php',
                data: 'textsetemail=' + textsetemail + '&textsetpassword=' + textsetpassword + '&form=updateuser2',
                success: function(data){
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');
                        $("#modalupdateprofileset").modal('hide');
                        Swal.fire(
                          'Success!',
                          'Successfully Updated Account.',
                          'success'
                        )
                    },1000);
                    setTimeout(function(){
                        window.location.reload();
                    },3000);
                }
            })
        } else{
            alert('Please review your entries. Ensure all required fields are filled out');
        }
    }
</script>