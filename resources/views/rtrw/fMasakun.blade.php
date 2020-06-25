<div class="container-fluid mt-3">
        <div class="row" id="saku-data">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Master Akun 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <!-- <h6 class="card-subtitle">Tabel Pengajuan</h6> -->
                        <hr>
                        <div class="table-responsive ">
                            <style>
                                th,td{
                                    padding:8px !important;
                                    vertical-align:middle !important;
                                }
                                .hidden{
                                    display:none;
                                }
                                .form-group{
                                    margin-bottom:5px !important;
                                }
                                .form-control{
                                    font-size:13px !important;
                                    padding: .275rem .6rem !important;
                                }
                                .selectize-control, .selectize-dropdown{
                                    padding: 0 !important;
                                }

                                th{
                                    vertical-align:middle !important;
                                }
                                /* #input-flag td{
                                    padding:0 !important;
                                } */
                                #input-flag .selectize-input, #input-flag .form-control, #input-flag .custom-file-label, #input-keu .selectize-input, #input-keu .form-control, #input-keu .custom-file-label{
                                    border:0 !important;
                                    border-radius:0 !important;
                                }
                                .modal-header .close {
                                    padding: 1rem;
                                    margin: -1rem 0 -1rem auto;
                                }
                                .check-item{
                                    cursor:pointer;
                                }
                                .selected{
                                    cursor:pointer;
                                    background:#4286f5 !important;
                                    color:white;
                                }
                                #input-flag td:hover, #input-keu td:hover{
                                    background:#f4d180 !important;
                                    color:white;
                                }
                                #input-flag td, #input-keu td{
                                    overflow:hidden !important;
                                }

                                #input-flag td:nth-child(4), #input-keu td:nth-child(4){
                                    overflow:unset !important;
                                }

                            </style>
                            <table id="table-data" class="table table-bordered table-striped " width="100%">
                                <thead>
                                    <tr>
                                        <th width="10%">Kode</th>
                                        <th width="50%">Nama</th>
                                        <th width="5%">Curr</th>
                                        <th width="10%">Modul</th>
                                        <th width="10%">Jenis</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="form mb-5" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Masakun
                            <button type="button" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:450px'>
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-3">   
                                <label for="kode_akun" class="col-3 col-form-label">Kode Akun</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Kode Akun" id="kode_akun" name="kode_akun">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="nama" class="col-3 col-form-label">Nama Akun</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Kode Akun" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="curr" class="col-3 col-form-label">Currency</label>
                                <div class="col-3">
                                    <select class='form-control' id="curr" name="curr" required>
                                    <option value=''>--- Pilih Curr ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modul" class="col-3 col-form-label">Modul</label>
                                <div class="col-3">
                                    <select class='form-control' id="modul" name="modul" required>
                                    <option value=''>--- Pilih Modul ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-3 col-form-label">Jenis</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="jenis" name="jenis" required>
                                    <option value=''>--- Pilih Jenis ---</option>
                                    <option value='Neraca'>Neraca</option>
                                    <option value='Pendapatan'>Pendapatan</option>
                                    <option value='Beban'>Beban</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="block" class="col-3 col-form-label">Status Aktifasi</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="block" name="block" required>
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='0'>AKTIF</option>
                                    <option value='1'>BLOCK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gar" class="col-3 col-form-label">Status Budget</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="gar" name="gar" required>
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='0'>0 - NON</option>
                                    <option value='1'>1 - BUDGET</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="normal" class="col-3 col-form-label">Normal Account</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="normal" name="normal" required>
                                    <option value=''>--- Pilih Normal Account ---</option>
                                    <option value='C'>C - Kredit</option>
                                    <option value='D'>D - Debet</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#flag" role="tab" aria-selected="true"><span class="hidden-xs-down">Flag Akun</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#keu" role="tab" aria-selected="false"><span class="hidden-xs-down">Lap Keuangan</span></a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#agg" role="tab" aria-selected="false"><span class="hidden-xs-down">Lap Anggaran</span></a> </li> -->
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="flag" role="tabpanel">
                                    <div class='col-xs-12 nav-control-flag' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                        <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                    </div>
                                    <div class='col-xs-12 mt-2' style='height:450px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed gridexample" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap"  id="input-flag">
                                            <thead style="background:#ff9500;color:white">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="20%">Kode Flag</th>
                                                    <th width="65%">Nama Flag</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="keu" role="tabpanel">
                                    <div class='col-xs-12 nav-control-keu' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                        <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                    </div>
                                    <div class='col-xs-12 mt-2' style='height:450px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed gridexample" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap" id="input-keu">
                                            <thead style="background:#ff9500;color:white">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="15%">Kode FS</th>
                                                    <th width="25%">Nama FS</th>
                                                    <th width="15%">Kode Lap</th>
                                                    <th width="30%">Nama Lap</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane" id="agg" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-agg">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="40%">Kode FS</th>
                                                <th width="40%">Kode Lap</th>
                                                <th width="15%"><button type="button" href="#" id="add-row-agg" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="slide-history" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <div class="profiletimeline mt-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- MODAL SEARCH-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
