<div id="mdladduser" class="modal" data-keyboard="false" data-backdrop="static" style="padding-right: 0px !important;">
    <div class="modal-dialog modal-md"style="max-width: 420px;">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <div style="display: flex;justify-content: space-between !important;">
                            <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;" id="txtopenproductheader"></h4>
                            <button type="button" class="close stylestyle" data-dismiss="modal" aria-hidden="true" onclick="clearuser()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
                        </div>
                    </div>

                    <input type="hidden" class="form-control clearinfo" id="txtuserID">

                    <div class="col-md-12 mb-2">
                        <span style="font-weight:400">First Name</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtadduserFname">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span style="font-weight:400">Middle Name</span>
                        <input type="text" class="form-control clearinfo" id="txtadduserMname">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span style="font-weight:400">Last Name</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtadduserLname">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span style="font-weight:400">Contact Number</span>
                        <input type="text" class="form-control clearinfo contactnum reqresinfo" id="txtadduserContact">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span style="font-weight:400">Email Address</span>
                        <input type="email" class="form-control clearinfo reqresinfo" id="txtadduserEmail">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span style="font-weight:400">Address</span>
                        <textarea class="form-control clearinfo reqresinfo" id="txtadduseraddress" rows="4" style="white-space: pre-wrap;"></textarea>
                    </div>

                    <div class="col-md-12 mb-2">
                        <span style="font-weight:400">Username</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtadduserUsername">
                    </div>

                    <div class="col-md-12 mb-3">
                        <span style="font-weight:400">Password</span>
                        <div class="input-group">
                            <input type="Password" class="form-control clearinfo reqresinfo" id="txtadduserpass">
                            <div class="input-group-prepend" id="inputaddusereye2" style="cursor: pointer;" onclick="fncaddpassattribunHash();">
                                <span class="input-group-text"><i class="fas fa-eye-slash" id="addusereye2"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn waves-effect waves-light btn-secondary btnuseraccSAVE" style="background-color: #599dea !important; border-color: #599dea; padding: 7px 17px;font-weight: 500;" onclick="adduser();">SAVE</button>
                        <button class="btn waves-effect waves-light btn-secondary btnuseraccUPDATE" style="background-color: #599dea !important; border-color: #599dea; padding: 7px 17px; display: none;font-weight: 500;" onclick="edituser();">UPDATE</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>