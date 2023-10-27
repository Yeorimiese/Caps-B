<style type="text/css">
    .pstylefooter{
        width: 80%;
    }

    .footer_logo{
        text-align:left;
    }

    .footer_top {
        padding: 30px 0 30px;
    }

    .footer_bottom {
        padding: 20px 0;
    }

    @media only screen and (max-width: 767px) {
        .pstylefooter{
            width: 100% !important;
        }

        .footer_logo{
            text-align:center;
        }
    }
</style>
<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-sm-12">
                    <div class="widgets_container widget_menu">
                        <h3>Quick Links</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="index.php?url=home">Home</a></li>
                                <li><a href="index.php?url=services">Services</a></li>
                                <li><a href="index.php?url=appointments">Appointments</a></li>
                                <li><a href="index.php?url=contactus">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-8 col-sm-12">
                    <div class="widgets_container widget_menu">
                        <div class="footer_menu">
                            <ul>
                                <li><a class="mb-1" href="javascript:void(0)" style="line-height: 15px;"><i class="fa fa-map-marker" aria-hidden="true"></i><span id="txtfootaddress"> #49 B, Road 3, Project 6, Quezon City, Philippines</span></a></li>
                                <li><div class="mb-2" id="map_canvas" style="height: 300px; width:100% !important; border-radius: 0px !important;"></div></li>
                                <li><a class="mb-2" href="javascript:void(0)" style="line-height: 25px;"><i class="fa fa-phone" aria-hidden="true"></i> 09361692512 • 73421924</a></li>
                                <li><a class="mb-0" href="javascript:void(0)" style="line-height: 25px;"><i class="fa fa-envelope" aria-hidden="true"></i> urbanpetsanimalclinic@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom" style="background-color: #002856;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="copyright_area">
                        <p class="copyright-text" style="text-align:Center; color: #fff">© Urban Pets Veterinary Management System</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript">
    $(function() {
        getLocation();
    })

    function getLocation(){
        GMaps.geocode({
        address: $("#txtfootaddress").text(),
            callback: function(results, status) {
            if (status == 'OK') {
              var latlng = results[0].geometry.location;
              var maps = new GMaps({
                    el: '#map_canvas',
                    lat: latlng.lat(),
                    lng: latlng.lng(),
                    width: '100%',
                    height: '15em',
              });
              maps.addMarker({
                    lat: latlng.lat(),
                    lng: latlng.lng(),
                    title: 'Your Address'
              });
            }
          }
        });
        
        if (navigator.geolocation){
            } else{ 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

</script>
<!--footer area end-->