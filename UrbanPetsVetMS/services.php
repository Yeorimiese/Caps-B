<style type="text/css">
    .labelnotavailable {
        top: 5px;
        left: 6px;
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
        top: 5px;
        left: 6px;
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

    .packagedescname a{
        font-weight: 600;
        font-size: 20px;
        font-family: "Lora", serif;
    }

    .packagedesc p{
        text-align: justify;
        display: -webkit-box;
        -webkit-line-clamp: 6; /* Limit the content to 3 lines */
        -webkit-box-orient: vertical;
        white-space: normal; /* Allow normal white-space behavior */
        overflow: hidden; /* Hide overflowing text */
        white-space: pre-wrap;
    }

    .packagedesc{
        margin-bottom: 10px !important;
    }

    .packageborder {
        border:1px solid #e0e0e0;
        padding: 10px;
        cursor:pointer;
        border-radius: 2px;
        box-shadow: 0 0 4px 4px rgba(0, 0, 0, 0.1);
    }

    .packageborder:hover{
        background: #f8fbff;       
    }

    /*  MODAL  */
        .modal-paymentneed {
            min-width: 830px !important;
        }

        .mdlpackagename h2{
            font-weight: 600;
            font-size: 20px;
            font-family: "Lora", serif;
        }

        .mdlpackagedesc p{
            white-space: pre-wrap;   
        }
    /*  MODAL  */
</style>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>SERVICES</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_fullwidth" style="padding-top: 60px; padding-bottom: 20px;">
    <div class="container">
        <div class="row" style="justify-content:center;">
            <div class="col-md-10">
                <div class="row shop_wrapper grid_list" id="displaylistofpackages">
                </div>
            </div>
        </div>
    </div>
</div>
<!--shop  area end-->

<!-- modal area start-->
<div class="modal fade" id="modalmoredetails" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-paymentneed">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="icon-x"></i></span>
            </button>

            <div class="modal_body">
                <div class="container">
                    <input type="hidden" id="txtmdlpackID">

                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel" style='position: relative;'>
                                        <div class="modal_tab_img">
                                            <a href="javascript:void(0)">
                                                <img src="" alt="" id="txtmdlpackimage">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mdlpackagename mb-10">
                                    <h2 id="txtmdlpackname"></h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price" id="txtmdlpackprice"></span>
                                </div>
                                <div class="modal_description mdlpackagedesc">
                                    <p id="txtmdlpackdesc"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end-->

<script type="text/javascript">
    $(function() {
        $("#services").addClass('active');
        
        fncdisplaylistofpackages();
    })

    function fncdisplaylistofpackages(){
        $.ajax({
            type: 'POST',
            url: 'services_class.php',
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