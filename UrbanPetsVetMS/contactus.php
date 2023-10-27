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
</style>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>CONTACT US</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--contact area start-->
<div class="contact_area" style="margin-bottom: 0px; padding: 60px 0 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact_message content">
                    <h3>Get in Touch</h3>
                    <p>If you have any questions, just fill in the contact form, and we will answer you shortly. If you are living nearby, come visit us directly here in Urban Pets.</p>
                    <ul>
                        <li><i class="fa fa-fax"></i> Address : <span id="txtcontactaddress"> #49 B, Road 3, Project 6, Quezon City, Philippines</span>
                        <div id="contact_map_canvas" style="height: 300px; width:100% !important; border-radius: 0px !important;"></div></li>
                        <li><i class="fa fa-phone"></i> <a href="#"> 09361692512 • 73421924</a></li>
                        <li><i class="fa fa-envelope"></i>urbanpetsanimalclinic@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="contact_message form">
                    <h3>Leave Message</h3>
                    <p>
                        <label> Your Name (required)</label>
                        <input class="reqresinfo" name="name" placeholder="Name *" type="text" id="txtcontactname">
                    </p>
                    <p>
                        <label> Your Email (required)</label>
                        <input class="reqresinfo" name="email" placeholder="Email *" type="email" id="txtcontactemail">
                    </p>
                    <div class="contact_textarea">
                        <label> Your Message</label>
                        <textarea placeholder="Message *" name="message" class="form-control2 reqresinfo" id="txtcontactmessage"></textarea>
                    </div>
                    <button type="button" onclick="submitmessage()"> Send</button>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--contact area end-->

<script type="text/javascript">
    $(function() {
        $("#contactus").addClass('active');
        getLocation2();
    })

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

    function getLocation2(){
        GMaps.geocode({
        address: $("#txtcontactaddress").text(),
            callback: function(results, status) {
            if (status == 'OK') {
              var latlng = results[0].geometry.location;
              var maps = new GMaps({
                    el: '#contact_map_canvas',
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

    function submitmessage(){
        var textcontactname = $("#txtcontactname").val();
        var textcontactemail = $("#txtcontactemail").val();
        var textcontactmessage = $("#txtcontactmessage").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".loadload").show();
            $.ajax({
                type: 'POST',
                url: 'contactus_class.php',
                data: 'textcontactname=' + textcontactname + '&textcontactemail=' + textcontactemail + '&textcontactmessage=' + textcontactmessage + '&form=submitmessage',
                success: function(data){
                    setTimeout(function(){
                        $(".loadload").hide();
                        Swal.fire(
                          'Success!',
                          'Message sent successfully.',
                          'success'
                        )
                    },1000);

                    setTimeout(function(){
                        window.location = "index.php?url=contactus";
                    },2000);
                }
            });    
        } else{
            // alert("Please review your entries. Ensure all required fields are filled out");
            Swal.fire(
              'ALERT',
              'Please review your entries. Ensure all required fields are filled out',
              'warning'
            )
        }
    }
</script>