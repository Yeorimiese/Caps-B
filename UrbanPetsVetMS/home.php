<style type="text/css">
    /*  HOME IMAGE  */
        .marginbothome {
            margin-bottom: 0px;
        }
        .single_slider {
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: center center;
            background-size: 100% 100%;
            height: 640px;
        }
    /*  HOME IMAGE  */

    /*  PACKAGES  */
        .packageborder {
            border:1px solid #e0e0e0;
            padding: 10px;
            cursor:pointer;
            border-radius: 2px;
        }

        .packageborder:hover{
            box-shadow: 0 0 4px 4px rgba(0, 0, 0, 0.1);
        }

        .packagesimages img {
            height: 230px;
            width: 100%;
        }

        .labelnotavailable {
            top: 14px;
            left: 15px;
            text-transform: uppercase;
            color: #ffffff;
            background: #DC0F0F;
            font-size: 14px;
            height: 24px;
            line-height: 24px;
            padding: 0 14px;
            text-align: center;
            display: block;
            border-radius: 2px;
        }

        .labelavailable {
            top: 14px;
            left: 15px;
            text-transform: uppercase;
            color: #ffffff;
            background: #00c168;
            font-size: 14px;
            height: 24px;
            line-height: 24px;
            padding: 0 14px;
            text-align: center;
            display: block;
            border-radius: 2px;
        }

        .packagecontent p {
            text-align: justify;
            display: -webkit-box;
            -webkit-line-clamp: 4; /* Limit the content to 3 lines */
            -webkit-box-orient: vertical;
            white-space: normal; /* Allow normal white-space behavior */
            overflow: hidden; /* Hide overflowing text */
            white-space: pre-wrap;
        }

        .packagecontent h3 {
            font-weight: 600
        }

        .comments_form button {
            border: 0;
            line-height: 30px;
            background: #000000;
            font-weight: 500;
            text-transform: capitalize;
            font-size: 12;
            height: 43;
        }

        .comments_form button:hover {
            background: #777777;
        }

        .product_variant.quantity button:hover {
            background: #3E444A;
        }

        .buynowbutton {
            margin-top: 15px;
            background: #76b2f6;
            color: #ffffff;
            border: 0;
            box-shadow: none;
            border-radius: 2px; 
            height: 30px;
            line-height: 10px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
            padding: 0px 8px;
            text-transform: capitalize;
        }

        .buynowbutton:hover {
            background: #4792e9;
        }

        .buynowbutton2 {
            margin-top: 15px;
            background: #ffffff;
            border: 1px solid #46997c;
            box-shadow: none;
            border-radius: 2px; 
            height: 30px;
            line-height: 10px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
            padding: 0px 8px;
            text-transform: capitalize;
        }

        .buynowbutton2:hover {
            background: #46997c;
            color: #ffffff;
        }
    /*  PACKAGES  */
</style>

<!--slider area start-->
<section class="slider_section marginbothome">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg="assets/images/cover.png">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content" style="text-align:center;">
                            <h1 style="background-color: #ffffff96;font-weight: 600;">WELCOME TO<br>URBAN PETS VETERINARY SYSTEM</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

<!--services img area-->
<div class="services_gallery" style="padding-bottom: 0px;">
    <div class="container" style="border-bottom: 1px solid #e1e1e1; padding-top: 60px; padding-bottom: 50px;">
        <div class="row" style="justify-content:center;"  id="displaylistofpackages">
        </div>
    </div>
</div>
<!--services img end-->

<script type="text/javascript">
    $(function() {
        $("#home").addClass('active');

        fncdisplaylistofpackages();
    })

    function morepackageoffer(){
        window.location = "index.php?url=services";
    }

    function fncdisplaylistofpackages(){
        $.ajax({
            type: 'POST',
            url: 'home_class.php',
            data: 'form=fncdisplaylistofpackages',
            success: function(data){
                $("#displaylistofpackages").html(data);
            }
        });    
    }

    function openbooknowpage(serviceID){
       window.location = "index.php?url=booknow&serviceID=" + serviceID;    
    }
</script>