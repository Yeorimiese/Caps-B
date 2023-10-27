<div id="mdladdproduct" class="modal" data-keyboard="false" data-backdrop="static" style="padding-right: 0px !important;">
    <div class="modal-dialog modal-md"style="max-width: 500px;">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <div style="display: flex;justify-content: space-between !important;">
                            <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;" id="txtopenproductheader"></h4>
                            <button type="button" class="close stylestyle" data-dismiss="modal" aria-hidden="true" onclick="clearproduct()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
                        </div>
                    </div>

                    <input type="hidden" class="form-control clearinfo" id="txtappointmentID">


                    <div class="col-md-12 mb-2">
                        <span>Medication</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtprescriptmedication">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Dosage</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtprescriptdosage">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Quantity</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtprescriptquantity">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Directions</span>
                        <textarea class="form-control clearinfo reqresinfo" id="txtprescriptdirections" rows="5" style="white-space: pre-wrap;"></textarea>
                    </div>

                    <div class="col-md-12">
                        <button class="btn waves-effect waves-light btn-secondary btnuseraccSAVE" style="background-color: #599dea !important; border-color: #599dea; padding: 7px 17px;font-weight: 500;" onclick="addprescription();">SAVE</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>