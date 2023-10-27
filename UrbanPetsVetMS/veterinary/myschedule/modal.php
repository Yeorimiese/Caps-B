<div id="mdladdschedule" class="modal" data-keyboard="false" data-backdrop="static" style="padding-right: 0px !important;">
    <div class="modal-dialog modal-md"style="max-width: 400px;">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <div style="display: flex;justify-content: space-between !important;">
                            <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;" id="txtopenproductheader"></h4>
                            <button type="button" class="close stylestyle" data-dismiss="modal" aria-hidden="true" onclick="clearproduct()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Schedule Date</span>
                        <input type="text" class="form-control clearinfo reqresinfo date-picker" id="txtscheduledate" placeholder="MM/DD/YYYY" onchange="$('#txtscheduledate').datepicker('hide');settime();" readonly style="cursor: pointer; background-color: white!important; color: black; border:1px solid #b9bec3;">
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-2">
                        <span>From</span>
                        <input type="time" class="form-control clearinfo reqresinfo" id="txtschedulefrom">
                    </div>

                    <div class="col-md-6 mb-3">
                        <span>To</span>
                        <input type="time" class="form-control clearinfo reqresinfo" id="txtschedto">
                    </div>

                    <div class="col-md-12">
                        <button class="btn waves-effect waves-light btn-secondary btnuseraccSAVE" style="background-color: #599dea !important; border-color: #599dea; padding: 7px 17px;font-weight: 500;" onclick="addschedule();">SAVE</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>