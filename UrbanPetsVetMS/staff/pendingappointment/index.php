<style type="text/css">
    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {
        cursor: pointer;
        display: inline;
        color: #e6d447 !important;
        font-weight: 600;
        padding: 4px 8px;
        border: 1px solid #e6d548;
    }

    .pagination li:first-child{
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .pagination li:last-child{
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    ul.pagination li:hover{
        background-color: #e6d447;
        color: white !important;
    }

    .pagination .active{
        background-color: #e6d447;
        color: white !important;
    }

    .table thead th, .table th {
        background-color: #aaaaaa !important;
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

    .inputclassneed:focus {
        box-shadow: inset 0 0px 0 #e1e1e1 !important;
        border: 1px solid #e1e1e1;
        font-size: inherit;
    }

    .modalpaddingnew {
        padding-left: 5px;
        margin-bottom: 10px;
    }

    .loginbutton:focus {
        box-shadow: inset 0 0px 0 #aa7736 !important;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card" style="margin-bottom: 0px;">
            <div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
                <div class="row page-titles rowpageheaderpadd" style="padding-bottom: 0px;">
                    <div class="col-md-6 col-6 align-self-center" style="padding-left:10px;">
                        <h3 class="mb-0 mt-0 headerfontfont text-themecolor" style="font-weight: 600;">PENDING APPOINTMENTS</h3>
                    </div>
                    <div class="col-md-6 col-6 align-self-center" style="padding-right:10px;">
                        <ol class="breadcrumb float-right headerfontfont">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Pending</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
    <div class="row" style="margin-bottom: .5rem;">
        <div class="col-md-4 coldashboardbox3" style="margin-bottom:15px;">
            <div class="form-horizontal form-material">
                <div class="row">
                    <div class="col-md-11" style="padding-right: 0px; flex: 0 0 95%; max-width: 95%;">
                        <input type="text" class="form-control underlined" id="txtsearchappointment" placeholder="Search Customer. . ." style="height: 40px;font-size: .9rem;padding-left: 5px;">
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;padding-right: 0px; flex: 1%; max-width: 1%;">
                        <i class="fas fa-search" style="margin-left: -23px; cursor: pointer; font-size: 1rem; margin-top: .7rem;color: #bababa;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <table data-height="350" class="table table-bordered fixTable table-hover table-striped" style="margin-bottom: 0px;">
                    <thead class="bg-success text-white">
                        <tr>
                            <th style="width: 5%;white-space: nowrap;"> Appointment ID </th>
                            <th style="width: 15%;white-space: nowrap;"> Customer </th>
                            <th style="width: 10%;white-space: nowrap;"> Pet </th>
                            <th style="width: 10%;white-space: nowrap;"> Service </th>
                            <th style="width: 5%;white-space: nowrap;"> Date </th>
                            <th style="width: 5%;white-space: nowrap;"> Time </th>
                        </tr>
                    </thead>
                    <tbody id="tblappointmentlist"></tbody>
                </table>
            </div>

            <input id="txtproductlistPageCount" type="hidden">
            <ul id="upproductlistPageList" class="pagination float-right"></ul>
        </div>
    </div>
</div>

<?php
    include("pendingappointment/script.php"); 
?>
