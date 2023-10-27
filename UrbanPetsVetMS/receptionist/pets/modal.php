<div id="mdladdpet" class="modal" data-keyboard="false" data-backdrop="static" style="padding-right: 0px !important;">
    <div class="modal-dialog modal-md"style="max-width: 400px;">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <div style="display: flex;justify-content: space-between !important;">
                            <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;" id="txtopenproductheader"></h4>
                            <button type="button" class="close stylestyle" data-dismiss="modal" aria-hidden="true" onclick="clearpet()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
                        </div>
                    </div>

                    <input type="hidden" class="form-control clearinfo" id="txtpetID">

                    <div class="col-md-12 mb-2">
                        <div class="input-group">
                            <input type="text" class="form-control clearinfo reqresinfo" id="txtselectuser" placeholder="Search Owner . . ." readonly="" style="cursor: pointer; background-color: white!important; color: black; border:1px solid #b9bec3;" onclick="openmdlselectuser();">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Pet Name</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtpetpetname">
                    </div>
<!--
                    <div class="col-md-12 mb-2">
                        <span>Type</span>
                        <input type="dropdown" class="form-control clearinfo reqresinfo" id="txtpetpettype">
                    </div>
-->
                    <div class="col-md-12 mb-2">
                        <span>Type</span>
                        <select class="form-control clearinfo reqresinfo" id="txtpetpettype" style="cursor: pointer; padding: .375rem .60rem;" onchange="viewreturnedinfo();">
                            <option value=""></option>
                            <option value="DOG">Dog</option>
                            <option value="CAT">Cat</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Breed</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtpetbreed">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Sex</span>
                        <select class="form-control clearinfo reqresinfo" id="txtpetsex" style="cursor: pointer; padding: .375rem .60rem;" onchange="viewreturnedinfo();">
                            <option value=""></option>
                            <option value="FEMALE">Female</option>
                            <option value="MALE">Male</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <span>Weight (kg)</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtpetweight">
                    </div>

                    <div class="col-md-12">
                        <button class="btn waves-effect waves-light btn-secondary btnuseraccSAVE" style="background-color: #599dea !important; border-color: #599dea; padding: 7px 17px;font-weight: 500;" onclick="addpet();">SAVE</button>
                        <button class="btn waves-effect waves-light btn-secondary btnuseraccUPDATE" style="background-color: #599dea !important; border-color: #599dea; padding: 7px 17px; display: none;font-weight: 500;" onclick="editpet();">UPDATE</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div id="mdlselectuser" class="modal" data-keyboard="false" data-backdrop="static" style="padding-right: 0px !important;">
    <div class="modal-dialog modal-md"style="max-width: 850px;">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div style="display: flex;justify-content: space-between !important;">
                            <h4 class="headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Select Owner</h4>
                            <button type="button" class="close stylestyle" data-dismiss="modal" aria-hidden="true" onclick="clearproduct()" style="padding: 1rem 1rem;margin: -1.6rem -1rem -1rem auto;">×</button>
                        </div>
                    </div>
                </div>

                <div class="form-horizontal form-material">
                    <div class="row">
                        <div class="col-md-11" style="padding-right: 0px; flex: 0 0 50%; max-width: 50%;">
                            <input type="text" class="form-control underlined" id="txtsearchuser" placeholder="Search . . ." style="height: 40px;font-size: .9rem;padding-left: 5px;">
                        </div>
                        <div class="col-md-1" style="padding-left: 0px;padding-right: 0px; flex: 1%; max-width: 1%;">
                            <i class="fas fa-search" style="margin-left: -23px; cursor: pointer; font-size: 1rem; margin-top: .7rem;color: #bababa;"></i>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-12">
                        <div>
                            <table data-height="350" class="table table-bordered table-hover fixTable" style="margin-bottom: 0px;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;white-space: nowrap;"> User ID </th>
                                        <th style="width: 15%;white-space: nowrap;"> Name </th>
                                        <th style="width: 15%;white-space: nowrap;"> Contact No. </th>
                                        <th style="width: 5%;white-space: nowrap;"> Email </th>
                                    </tr>
                                </thead>
                                <tbody id="tblselectuserlist"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>