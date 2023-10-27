<style type="text/css">
    .header_middle5 {
        border-bottom: 1px solid #e1e1e1 !important;
        padding: 0px 0;
    }

    .main_menu nav > ul > li > a {
        display: block;
        font-size: 14px;
        line-height: 54px;
        text-transform: uppercase !important;
        font-weight: 500;
        position: relative;
        color: #fff;
    }

    .main_menu nav > ul > li:hover > a {
        font-weight: 600;
        font-size: 15px;
        color: #ffde8c;
    }

    .main_menu nav > ul > li > a.active {
        font-weight: 600;
        font-size: 15px !important;
        color: #ffde8c;
    }

    .offcanvas_menutabs {
      display: block;
    }

    .loginsugnupfontsize {
        font-size: 15px !important;
    }

    .loginsugnupmargin {
    /*        margin-right: 5px;*/
    }

    .toplogoneed img {
        max-width: 120px;
    }

    .header_account_area {
        justify-content: right;
        padding: 27px 0px;
    }

    .header_account-list > a {
        font-size: 27px;
    }

    .header_account-list > a:hover {
        color: #3e85d6;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .offcanvas_menutabs {
            display: none;
        }

        .header_account-list:last-child {
          margin-right: 12px;
        }

        .headerneedko{
            margin-right: 0px !important;
        }

        .loginsugnupfontsize {
            font-size: 8px !important;
        }

        .loginsugnupmargin {
            margin-right: 5px;
        }

        .listviewleftside {
            right: -50px !important;
        }
    }

    @media only screen and (max-width: 767px) {
        .offcanvas_menutabs {
            display: none;
        }

        .header_account-list:last-child {
          margin-right: 12px;
        }
        .headerneedko{
            margin-right: 0px !important;
        }

        .loginsugnupfontsize {
            font-size: 7px !important;
        }

        .loginsugnupmargin {
            margin-right: 5px;
        }

        .toplogoneed img {
            max-width: 70px !important;
        }

        .listviewleftside {
            right: 0px !important;
        }

        .header_account_area {
            padding: 0px 0px !important;
        }
    }
</style>

<div class="main_header header_five sticky-header">
    <div class="header_middle header_middle5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-3">
                    <div class="logo toplogoneed">
                        <a href="#"><img src="assets/images/logo.png"></a>
                    </div>
                </div>

                <div class="col-6 offcanvas_menutabs">
                    <div class="main_menu menu_position">
                        <nav style="background-color: #1287dd;">
                            <ul>
                                <li><a id="home" href="index.php?url=home">Home</a></li>
                                <li><a id="services" href="index.php?url=services">Services</a></li>
                                <li><a id="appointments" href="index.php?url=appointments">Appointments</a></li>
                                <li><a id="contactus" href="index.php?url=contactus">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-4 offcanvas_menu">

                </div>

                <?php if(empty($_SESSION['userID'])) { ?>
                    <div class="col-3">
                        <div class="header_right_info">
                            <div class="header_account_area">
                                <div class="header_account-list mini_cart_wrapper loginsugnupmargin">
                                    <a href="index.php?url=login" class="loginsugnupfontsize">SIGN IN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-3">
                        <div class="header_right_info">
                            <div class="header_account_area">
                                <div class="header_account-list top_links">
                                    <a href="index.php?url=moreinformation"><i class="icon-users"></i></a>
                                    <!-- <ul class="dropdown_links">
                                        <li><a href="checkout.html">Checkout </a></li>
                                        <li><a href="my-account.html">My Account </a></li>
                                    </ul> -->
                                </div>
                                <div class="header_account-list header_wishlist">
                                    <a href="logout.php"><i class="icon-log-out"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-1 offcanvas_menu">
                    <div class="header_account-list">
                        <div class="canvas_open listviewleftside" style="position: relative; top: 0;">
                            <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                        </div>
                        <div class="offcanvas_menu_wrapper">
                            <div class="canvas_close">
                                <a href="javascript:void(0)"><i class="icon-x"></i></a>
                            </div>
                            <div id="menu" class="text-left ">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children"><a href="index.php?url=home">Home</a></li>
                                    <li class="menu-item-has-children"><a href="index.php?url=services">Services</a></li>
                                    <li class="menu-item-has-children"><a href="index.php?url=appointments">Appointments</a></li>
                                    <li class="menu-item-has-children"><a href="index.php?url=contactus">Contact Us</a></li>
                                    <li class="menu-item-has-children"><a href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>