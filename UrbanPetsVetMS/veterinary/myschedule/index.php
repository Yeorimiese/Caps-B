<style>
    table > thead {
    /* background: rgb(26,115,162) !important; */
    /* background: linear-gradient(90deg, rgb(255 255 255) 0%, rgb(255 255 255) 35%, rgb(255 255 255) 100%) !important; */
    background: none !important;
    }

    .fc-basic-view .fc-body .fc-row {
    min-height: 6.5em !important;
    }

    .fc-scroller {
        overflow: hidden scroll;
        height: 470px !important;
    }

    .fc-toolbar h2 {
        font-size: 24px;
        font-weight: 500;
        line-height: 0px;
        text-transform: uppercase;
    }

    .fc-toolbar.fc-header-toolbar {
        margin-bottom: 1.2em !important;
        background-color: #fff;
        border-radius: 0.25rem;
    }

    .fc-toolbar {
        margin: 0px;
        padding: 10px 10px;
    }

    .fc-day-grid-event .fc-time {
        display: none;
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
</style>

<div class="main-panel" style="margin-bottom:15px">
    <div class="content">
        <div class="page-inner">           
            <div id="calendar"></div>
        </div>
    </div>
</div>

<button type="button" class="btn waves-effect waves-light btn-info" onclick="modaladdschedule()">Add Schedule</button>

<?php include('datatables.php');?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<?php 
    include("myschedule/modal.php"); 
?>

<script>
    let activeRemoveId;
    $(document).ready(function() {
        $(".date-picker").datepicker({
            autoHide: true,
            format: 'mm/dd/yyyy',
            todayHighlight: true,
            startDate: '+0d',
        });

        displaycalendar();
        dsplylistofappointments();
    });

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

    function displaycalendar(){
        var calendar = $('#calendar').fullCalendar({
                editable:true,
                height: 500,
                header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events: 'myschedule/eventsdata.php',
            selectable:true,
            selectHelper:false,
          
            editable:true,
            eventResize:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;

            },
            eventClick: function(event) {
                $("#modalRemoveSched").modal('show');
                activeRemoveId = event.id;
            }
            // eventColor: '#0052ba',
            // eventTextColor: '#fff'
        });
    }

    function modaladdschedule(){
        $("#mdladdschedule").modal('show');
        $('#txtopenproductheader').text("Add Schedule");
    }

    function addschedule(){
        var textscheduledate = $("#txtscheduledate").val();
        var textschedulefrom = $("#txtschedulefrom").val();
        var textschedto = $("#txtschedto").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'myschedule/class.php',
                data: 'textscheduledate=' + textscheduledate + '&textschedulefrom=' + textschedulefrom + '&textschedto=' + textschedto + '&form=addschedule',
                success: function(data){
                    $("#mdladdschedule").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        Swal.fire({
                            title: "Success!",
                            text: "Successfully Scheduled.",
                            type: "success",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#009efb",
                            confirmButtonText: "Okay",
                            closeOnConfirm: false
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });  
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

    function clearproduct(){
        $(".clearinfo").css('border','');
        $(".clearinfo").val("");
    }

    function cancelDeleteSched(){
        $("#modalRemoveSched").modal('hide');
    }

    function submitDeletion(){
        $.ajax ({
            type: 'POST',
            url: 'myschedule/class.php',
            data: { form: 'deleteSched', id: activeRemoveId },
            async: false,
            success: function(data) {
                $('#calendar').fullCalendar('refetchEvents');
                $("#modalRemoveSched").modal('hide');
            }
        })
    }
</script>