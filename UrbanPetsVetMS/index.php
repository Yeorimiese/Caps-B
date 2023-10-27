<?php
    include("connect.php");
    session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php
        include('header.php'); 
    ?>

    <style>
        .loadload{
            width: 100%;
            height: 100%;
            top: 0px;
            position: fixed;
            z-index: 99999;
            background: rgba(255, 255, 255, 0.5);
            transition: all 0.2s;
        }

        .spinner-border{
            height: 50px;
            transform-origin: center center;
            width: 50px;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="loadload">
        <div class="spinner-border text-secondary" role="status"></div>
    </div>

    <script type="text/javascript">
        $(function() {
            setTimeout(function(){
                $(".loadload").hide();
            },300);
        })
    </script>

    <!--offcanvas menu area end-->
    <header>
        <?php
            include('topbar.php'); 
        ?>
    </header>
    <!--header area end-->

    <?php
        if(!isset($_GET['url'])){
            echo "<script>window.location='index.php?url=home';</script>";
        } else{
            if ($_GET['url'] == "home"){
                include "home.php";
            } elseif ($_GET['url'] == "services"){
                include "services.php";
            } elseif ($_GET['url'] == "appointments"){
                include "appointments.php";
            } elseif ($_GET['url'] == "contactus"){
                include "contactus.php";
            } elseif ($_GET['url'] == "moreinformation"){
                include "moreinformation.php";
            } elseif ($_GET['url'] == "booknow"){
                include "booknow.php";
            } elseif ($_GET['url'] == "login"){
                include "login.php";
            }
        }
    ?>

    <?php include('footer.php'); ?>

    <?php include('jscripts.php'); ?>
</body>

</html>