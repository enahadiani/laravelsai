    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
        }

        input.error{
            border:1px solid #dc3545;
        }
        label.error{
            color:#dc3545;
            margin:0;
        }
        #table-data_paginate,#table-search_paginate
        {
            margin-top:0 !important;
        }

        #table-data_paginate ul,#table-search_paginate ul
        {
            float:right;
        }

        .form-body 
        {
            position: relative;
            overflow: auto;
        }

        #content-delete
        {
            position: relative;
            overflow: auto;
        }
        .hidden{
            display:none;
        }

        .datetime-reset-button {
            margin-right: 20px !important;
            margin-top: 3px !important;
        }
        #table-search
        {
            border-collapse:collapse !important;
        }

        #table-search_filter label, #table-search_filter input
        {
            width:100%;
        }

        .dataTables_wrapper .paginate_button.previous {
        margin-right: 0px; }

        .dataTables_wrapper .paginate_button.next {
        margin-left: 0px; }

        div.dataTables_wrapper div.dataTables_paginate {
        margin-top: 25px; }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center; }

        .dataTables_wrapper .paginate_button.page-item {
        padding-left: 5px;
        padding-right: 5px; }
        .px-0{
            padding-left: 2px !important;
            padding-right: 2px !important;
        }

        #table-data_filter label
        {
            width:100%;
        }
        #table-data_filter label input
        {
            width:inherit;
        }
        
        #searchData
        {
            font-size: .75rem;
            height: 31px;
        }
        .dropdown-toggle::after {
            display:none;
        }
        .dropdown-aksi > .dropdown-item{
            font-size : 0.7rem;
        }

        .btn-light2{
            background:#F8F8F8;
            color:#D4D4D4;
        }

        .btn-light2:hover{
            color:#131113;
        }

        .btn-light2:active{
            color: #131113;
            background-color: #d8d8d8;
        }

        .custom-file-label::after{
            content:"Cari berkas" !important;
            border-left:0;
            color: var(--theme-color-1) !important;
        }
        .focus{
            /* border:none !important; */
            box-shadow:none !important;
        }
        .last-add::before{
            content: "***";
            background: var(--theme-color-1);
            border-radius: 50%;
            font-size: 3px;
            position: relative;
            top: -2px;
            left: -5px;
        }
        th{
            vertical-align:middle !important;
        }
        #input-kd .selectize-input.focus, #input-kd input.form-control, #input-kd .custom-file-label,  #input-dok .selectize-input.focus, #input-dok input.form-control, #input-dok .custom-file-label
        {
            border:1px solid black !important;
            border-radius:0 !important;
        }
        
        #input-kd .selectize-input,  #input-dok .selectize-input
        {
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
            /* background:#4286f5 !important; */
            /* color:white; */
        }
        #input-kd td:not(:nth-child(1)):not(:nth-child(5)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-dok td:not(:nth-child(1)):not(:nth-child(7)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-kd input:hover,
        #input-kd .selectize-input:hover,
        {
            width:inherit;
        }

        #input-dok input:hover,
        #input-dok .selectize-input:hover,
        {
            width:inherit;
        }

        #input-kd ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }

        #input-dok ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }
        #input-kd td
        {
            overflow:hidden !important;
            height:37.2px !important;
            padding:0px !important;
        }
        
        #input-kd span
        {
            padding:0px 10px !important;
        }
        
        #input-kd input,#input-kd .selectize-input
        {
            overflow:hidden !important;
            height:35px !important;
        }

        #input-dok td
        {
            overflow:hidden !important;
            height:37.2px !important;
            padding:0px !important;
        }
        
        #input-dok span
        {
            padding:0px 10px !important;
        }
        
        #input-dok input,#input-dok .selectize-input
        {
            overflow:hidden !important;
            height:35px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }

    
        .input-group-prepend{
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .readonly > .input-group-prepend{
            background: #e9ecef !important;
        }

        .readonly > .search-item2{
            background: #e9ecef !important;
            cursor:not-allowed;
        }

        .input-group > .form-control 
        {
            border-radius: 0.5rem !important;
        }

        .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #e9ecef !important;
            border: 1px solid #e9ecef !important;
            border-radius: 0.25rem !important;
            color: var(--theme-color-1);
            font-weight:bold;
            cursor:pointer;
        }

        .readonly > .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #d7d7d7 !important;
            border: 1px solid #d7d7d7 !important;
            border-radius: 0.25rem !important;
            color: black;
            font-weight:bold;
            cursor:pointer;
        }

        span[class^=info-name]{
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;
        }

        .readonly > span[class^=info-name] {
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;
            background: #e9ecef !important;

        }

        .info-icon-hapus{
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 35px;
            z-index: 3;
        }

        .readonly >  .info-icon-hapus{
            display:none;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem;
            
        }

        .readonly >  .form-control{
            background: #e9ecef !important;
        }

        .selectize-input {
            min-height: unset !important;
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            line-height: 30px;
            border-radius: 0.5rem;
        }

        label{
            margin-bottom: 0.2rem;
        }

        
    </style>
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Kompetensi Dasar</h5>
                    <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                        <div class="page-countdata">
                            <label>Menampilkan 
                            <select style="border:none" id="page-count">
                                <option value="10">10 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                            </label>
                        </div>
                    </div>
                    <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;">
                            <div class="input-group-append" >
                                <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                    <div class="table-responsive ">
                        <table id="table-data" class="" style='width:100%'>
                            <thead>
                                <tr>
                                    <th>Kode Matpel</th>
                                    <th>Kode PP</th>
                                    <th>Kode Tingkat</th>
                                    <th>Kode Sem</th>
                                    <th>Kode TA</th>
                                    <th>Tgl Input</th>
                                    <th class="text-center">Aksi</th>
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
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator"></div>
                    <!-- FORM BODY -->
                    <div class="card-body form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                        <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-12">
                                                <label for="kode_pp">PP</label>
                                                @if(Session::get('statusAdmin') == "A")
                                                <div class="input-group">
                                                @else
                                                <div class="input-group readonly">
                                                @endif
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control input-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="">
                                                    <span class="info-name_kode_pp hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-12">
                                                <label for="kode_ta">Tahun Ajaran</label>
                                                @if(Session::get('statusAdmin') == "A")
                                                <div class="input-group">
                                                @else
                                                <div class="input-group readonly">
                                                @endif
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_ta" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control input-label-kode_ta" id="kode_ta" name="kode_ta" value="" title="">
                                                    <span class="info-name_kode_ta hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_ta"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-12">
                                                <label for="kode_matpel">Mata Pelajaran</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_matpel" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control input-label-kode_matpel" id="kode_matpel" name="kode_matpel" value="" title="">
                                                    <span class="info-name_kode_matpel hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_matpel"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-12">
                                                <label for="kode_tingkat">Tingkat Sekolah</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_tingkat" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control input-label-kode_tingkat" id="kode_tingkat" name="kode_tingkat" value="" title="">
                                                    <span class="info-name_kode_tingkat hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_tingkat"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-12">
                                                <label for="kode_sem">Semester</label>
                                                <select class='form-control selectize' id="kode_sem" name="kode_sem">
                                                <option value=''>--- Pilih Semester ---</option>
                                                <option value='1' selected>GANJIL</option>
                                                <option value='2'>GENAP</option>
                                                </select>
                                                
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-kd" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Kompetensi</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-kd" role="tabpanel">
                                        <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                            
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                        </div>
                                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="input-kd" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:3%">No</th>
                                                    <th style="width:10%">Kode KD</th>
                                                    <th style="width:62%">Deskripsi</th>
                                                    <th style="width:20%">KKM</th>
                                                    <th width="5%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                            <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    <!-- MODAL SEARCH-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content">
                <div style="display: block;" class="modal-header">
                    <h5 class="modal-title" style="position: absolute;"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
                    <span aria-hidden="true">&times;</span>
                    </button> 
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <!-- MODAL PREVIEW -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px">
            <div class="modal-content" style="border-radius:0.75em">
                <div class="modal-header py-0" style="display:block;">
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Kompetensi Dasar <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span><span id="modal-preview-ref1" style="display:none"></span><span id="modal-preview-ref2" style="display:none"></span><span id="modal-preview-ref3" style="display:none"></span> </h6>
                    <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" style="line-height:1.5">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="dropdown d-inline-block float-right">
                        <button class="btn dropdown-toggle mb-1" type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding:0">
                        <h6 class="mx-0 my-0 py-2">Aksi <i class="simple-icon-arrow-down ml-1" style="font-size: 10px;"></i></h6>
                        </button>
                        <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                            <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="content-preview" style="height:450px">
                    <table id="table-preview" class="table no-border">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL PREVIEW -->

    <!-- MODAL UPLOAD -->
    <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="modal-importLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0.75em">
                <form id="form-import">
                    <div class="modal-header py-2">
                        <h6 class="modal-title" id="modal-importLabel">Upload Berkas</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0" style="border:0">
                        <div class="input-group mb-1">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" style="display: unset;" name="file">
                                <label class="custom-file-label" for="inputGroupFile01" style="display: block;">File input</label>
                            </div>
                        </div>
                        <label id="label-file" class="mb-0"></label>
                        <div style="height: 10px;" class="progress hidden mb-2">
                            <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="5" style="width:5%" >5%</div>
                        </div>
                        <div class="pesan-upload" style="background:#F5F5F5;display:none;padding: 10px 25px;border-radius: 0.75em;" >
                            <p class="pesan-upload-judul" style="font-weight:bold;font-size:12px;margin:0"></p>
                            <p class="pesan-upload-isi" style="font-size:12px"></p>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:0">
                        <button type="button"  id="process-upload" class="btn btn-light" >Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
    
      <!-- MODAL FILTER -->
      <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row">
                            <label>Kode PP</label>
                            <select class="form-control" data-width="100%" name="inp-filter_kode_pp" id="inp-filter_kode_pp">
                                <option value='' disabled>Pilih Kode PP</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Semester</label>
                            <select class="form-control selectize" data-width="100%" name="inp-filter_kode_sem" id="inp-filter_kode_sem">
                                <option value='' disabled>Pilih Semester</option>
                                <option value='1' selected>GANJIL</option>
                                <option value='2'>GENAP</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
    
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);
    
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // FUNCTION TAMBAHAN
    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function hitungTotalRow(){
        var total_row = $('#input-kd tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    
    function last_add(param,isi){
        var rowIndexes = [];
        dataTable.rows( function ( idx, data, node ) {             
            if(data[param] === isi){
                rowIndexes.push(idx);                  
            }
            return false;
        }); 
        dataTable.row(rowIndexes).select();
        $('.selected td:eq(0)').addClass('last-add');
        setTimeout(function() {
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    $('.selectize').selectize();
    $('[id^=label]').attr('readonly',true);
    // END 

    var $dtPP = new Array();

    function getTAPp() {
        $.ajax({
            type:'GET',
            url:"{{ url('sekolah-master/pp') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                
                var select = $('#inp-filter_kode_pp').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status) {
                    
                    for(i=0;i<result.daftar.length;i++){
                        // $dtPP[i] = {kode_pp:result.daftar[i].kode_pp};  
                        control.addOption([{text:result.daftar[i].kode_pp+'-'+result.daftar[i].nama, value:result.daftar[i].kode_pp+'-'+result.daftar[i].nama}]);
                        $dtPP[i] = {id:result.daftar[i].kode_pp,name:result.daftar[i].nama};  
                    }

                    if("{{ Session::get('kodePP') }}" != ""){
                        control.setValue("{{ Session::get('kodePP').'-'.Session::get('namaPP') }}");
                    }
                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/sekolah-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getTAPp();
    
    jumFilter();

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('sekolah-master/kd') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else if(!json.status && json.message == "Unauthorized"){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    return [];
                }else{
                    return [];
                }
            }
        },
        'columnDefs': [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                "targets": [5],
                "visible": false,
                "searchable": false
            },
            {'targets': 6, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        'columns': [
            { data: 'kode_matpel' },
            { data: 'pp' },
            { data: 'kode_tingkat' },
            { data: 'kode_sem' },
            { data: 'kode_ta' },
            { data: 'tgl_input' }
        ],
        order:[[5,'desc']],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    // END LIST DATA

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var search = ($('#search_'+kode).width() == undefined ? 0 : $('#search_'+kode).width());
        var width = $('#'+kode).width()-search-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    // CBBL
    function showFilter(param,target1=null,target2=null){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        var parameter = {param:par};
        
        switch(par){
            case 'kode_pp': 
                header = ['Kode PP', 'Nama'];
                var toUrl = "{{ url('sekolah-master/pp') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
            break;
            case 'kode_ta': 
                header = ['Kode Tahun Ajaran', 'Nama'];
                var toUrl = "{{ url('sekolah-master/tahun-ajaran') }}";
                var columns = [
                    { data: 'kode_ta' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Tahun Ajaran";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {'kode_pp':$('#kode_pp').val(),'flag_aktif':1};
            break;
            case 'kode_tingkat': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sekolah-master/tingkatan') }}";
                var columns = [
                    { data: 'kode_tingkat' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Tingkat";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {'kode_pp':$('#kode_pp').val()};
            break;
            case 'kode_matpel': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sekolah-master/matpel') }}";
                var columns = [
                    { data: 'kode_matpel' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Mata Pelajaran";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {'kode_pp':$('#kode_pp').val()};
            break;
        }

        var header_html = '';
        var width = ["30%","70%"];
        for(i=0; i<header.length; i++){
            header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
        }

        var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            ajax: {
                "url": toUrl,
                "data": parameter,
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            columns: columns,
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            },
        });

        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');

                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $('#'+par).css('border-left',0);
                    $('#'+par).val(kode);
                    $($target).text(kode);
                    $($target).attr("title",nama);
                    $($target).parents('div').removeClass('hidden');
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else if(jTarget2 == "title"){
                    $($target2).attr("title",nama);
                    $($target2).removeClass('hidden');
                }else if(jTarget2 == "text2"){
                    $($target2).text(nama);
                }else{
                    var width= $('#'+par).width()-$('#search_'+par).width()-10;
                    var pos =$('#'+par).position();
                    var height = $('#'+par).height();
                    $('#'+par).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                    $($target2).width($('#'+par).width()-$('#search_'+par).width()-10).css({'left':pos.left,'height':height});
                    $($target2+' span').text(nama);
                    $($target2).attr("title",nama);
                    $($target2).removeClass('hidden');
                    $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden')
                }
                
                if($target3 != ""){
                    $($target3).click();
                }

                if(par == "kode_pp"){
                    getTA(kode);
                }
               
                $('#modal-search').modal('hide');
            }
        });
    }


    function getPP(id){
        var tmp = id.split(" - ");
        kode = tmp[0];

        if(kode == ""){
            return false;
        }
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/pp') }}",
            dataType: 'json',
            data:{kode_pp:kode},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_pp',result.daftar[0].kode_pp,result.daftar[0].nama);
                    }else{
                        $('#kode_pp').attr('readonly',false);
                        $('#kode_pp').css('border-left','1px solid #d7d7d7');
                        $('#kode_pp').val('');
                        $('#kode_pp').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getTA(pp=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/tahun-ajaran') }}",
            dataType: 'json',
            data:{kode_pp:pp,flag_aktif:1},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_ta',result.daftar[0].kode_ta,result.daftar[0].nama);
                    }else{
                        $('#kode_ta').attr('style','border-left:1px solid #d7d7d7;border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
                        $('.info-code_kode_ta').parent('div').addClass('hidden');
                        $('.info-name_kode_ta').addClass('hidden');
                        $('#kode_ta').val('');
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }
    
    
    function getTingkat(id){
        var tmp = id.split(" - ");
        kode = tmp[0];
        kode_pp = $('#kode_pp').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/sekolah-master/tingkatan') }}",
            dataType: 'json',
            data:{kode_pp : kode_pp, kode_tingkat: kode},
            async:false,
            success:function(res){
                var result = res.data;    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_tingkat',result.data[0].kode_tingkat,result.data[0].nama);
                    }else{
                        $('#kode_tingkat').attr('readonly',false);
                        $('#kode_tingkat').css('border-left','1px solid #d7d7d7');
                        $('#kode_tingkat').val('');
                        $('#kode_tingkat').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getMatpel(id,pp){
        var tmp = pp.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/matpel') }}",
            dataType: 'json',
            data:{kode_pp : kode, kode_matpel: id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_matpel',result.data[0].nik,result.data[0].nama);
                    }else{
                        $('#kode_matpel').attr('readonly',false);
                        $('#kode_matpel').css('border-left','1px solid #d7d7d7');
                        $('#kode_matpel').val('');
                        $('#kode_matpel').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }

    // END CBBL

    $('#kode_pp').change(function(){
        var kode_pp = $('#kode_pp').val(); 
        getPP(kode_pp);
        getTA(kode_pp);
    });

    $('#kode_matpel').change(function(){
        var kode_pp = $('#kode_pp').val(); 
        var kode_matpel = $('#kode_matpel').val(); 
        getMatpel(kode_matpel,kode_pp);
    });

    $('#kode_tingkat').change(function(){
        var kode_pp = $('#kode_pp').val(); 
        var kode_tingkat = $('#kode_tingkat').val(); 
        getTingkat(kode_tingkat,kode_pp);
    });

    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var tmp= $(this).closest('tr').find('td').eq(1).html().split("-");
        var kode_pp = tmp[0];
        var kode_tingkat =  $(this).closest('tr').find('td').eq(2).html();
        var kode_sem =  $(this).closest('tr').find('td').eq(3).html();
        var kode_ta =  $(this).closest('tr').find('td').eq(4).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Kompetensi Dasar');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/kd-detail') }}",
            dataType: 'json',
            data:{kode_pp:kode_pp,kode_matpel:id,kode_tingkat:kode_tingkat,kode_sem:kode_sem,kode_ta:kode_ta},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#kode_matpel').val(result.data[0].kode_matpel);
                    $('#kode_tingkat').val(result.data[0].kode_tingkat);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#kode_sem')[0].selectize.setValue(result.data[0].kode_sem);
                
                    if(result.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            input += "<tr class='row-kd'>";
                            input += "<td class='no-kd text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode_kd tdkode_kdke"+no+" tooltip-span'>"+line.kode_kd+"</span><input type='text' name='kode_kd[]' class='form-control inp-kode_kd kode_kdke"+no+" hidden'  value='"+line.kode_kd+"' ></td>";
                            input += "<td ><span class='td-nama tdnnamake"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama[]' class='form-control inp-nama nnamake"+no+" hidden'  value='"+line.nama+"' ></td>";
                            input += "<td class='text-right'><span class='td-kkm tdkkmke"+no+" tooltip-span'>"+line.kkm+"</span><input type='text' name='kkm[]' class='form-control inp-kkm kkmke"+no+" hidden'  value='"+line.kkm+"' ></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-kd tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            $('.kkmke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                        
                    }
                    hitungTotalRow();
                    // $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    showInfoField('kode_pp',result.data[0].kode_pp,result.data[0].nama_pp);
                    showInfoField('kode_ta',result.data[0].kode_ta,result.data[0].nama_ta);
                    showInfoField('kode_tingkat',result.data[0].kode_tingkat,result.data[0].nama_tingkat);
                    showInfoField('kode_matpel',result.data[0].kode_matpel,result.data[0].nama_matpel);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
                $iconLoad.hide();
            }
        });
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(param){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sekolah-master/kd') }}",
            dataType: 'json',
            data:param,
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();  
                    $('#btn-tampil').click();                      
                    showNotification("top", "center", "success",'Hapus Data','Data KD ('+param.kode_matpel+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        var tmp = $(this).closest('tr').find('td').eq(1).html().split("-");
        var kode_pp = tmp[0];
        var kode_tingkat = $(this).closest('tr').find('td').eq(2).html();
        var kode_sem = $(this).closest('tr').find('td').eq(3).html();
        var kode_ta = $(this).closest('tr').find('td').eq(4).html();
        msgDialog({
            id: id,
            param: {kode_pp:kode_pp,kode_matpel:id,kode_tingkat:kode_tingkat,kode_sem:kode_sem,kode_ta:kode_ta},
            type:'hapus'
        });
    });
    // END HAPUS DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Kompetensi Dasar');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-kd tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=input-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        if("{{ Session::get('kodePP') }}" != ""){
            $('#kode_pp').val("{{ Session::get('kodePP') }}");
            $('#kode_pp').trigger('change');
        }
        hitungTotalRow();
    });
    // END BUTTON TAMBAH

     // BUTTON KEMBALI
     $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
    // END BUTTON KEMBALI

    // BUTTON UPDATE DATA
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON UPDATE

    // PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var tmp = $(this).closest('tr').find('td').eq(1).html().split("-");
            var kode_pp = tmp[0];
            var kode_tingkat = $(this).closest('tr').find('td').eq(2).html();
            var kode_sem = $(this).closest('tr').find('td').eq(3).html();
            var kode_ta = $(this).closest('tr').find('td').eq(4).html();

            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-master/kd-detail') }}",
                data:{kode_pp:kode_pp,kode_matpel:id,kode_tingkat:kode_tingkat,kode_sem:kode_sem,kode_ta:kode_ta},
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){

                        var html = `
                        <tr>
                            <td>PP</td>
                            <td>`+result.data[0].kode_pp+`-`+result.data[0].nama_pp+`</td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>`+result.data[0].kode_ta+`-`+result.data[0].nama_ta+`</td>
                        </tr>
                        <tr>
                            <td>Mata Pelajaran</td>
                            <td>`+result.data[0].kode_matpel+`-`+result.data[0].nama_matpel+`</td>
                        </tr>
                        <tr>
                            <td>Tingkat</td>
                            <td>`+result.data[0].kode_tingkat+`-`+result.data[0].nama_tingkat+`</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>`+result.data[0].kode_sem+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-ju-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:20%">Kode KD</th>
                                            <th style="width:57%">Nama</th>
                                            <th style="width:20%">KKM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>`;
                        
                        $('#table-preview tbody').html(html);
                        var det = ``;
                        if(result.data_detail.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.data_detail.length;i++){
                                var line =result.data_detail[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td >"+line.kode_kd+"</td>";
                                input += "<td >"+line.nama+"</td>";
                                input += "<td >"+line.kkm+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-ju-preview tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview-kode').text(result.data[0].kode_pp);
                        $('#modal-preview-ref1').text(result.data[0].kode_tingkat);
                        $('#modal-preview-ref2').text(result.data[0].kode_sem);
                        $('#modal-preview-ref3').text(result.data[0].kode_ta);
                        $('#modal-preview').modal('show');
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        var kode_pp = $('#modal-preview-kode').text();
        var kode_tingkat = $('#modal-preview-ref1').text();
        var kode_sem = $('#modal-preview-ref2').text();
        var kode_ta = $('#modal-preview-ref3').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            param:{kode_matpel:id,kode_tingkat:kode_tingkat,kode_pp:kode_pp,kode_sem:kode_sem,kode_ta:kode_ta},
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        var kode_pp = $('#modal-preview-kode').text();
        var kode_tingkat = $('#modal-preview-ref1').text();
        var kode_sem = $('#modal-preview-ref2').text();
        var kode_ta = $('#modal-preview-ref3').text();
        $('#judul-form').html('Edit Data Kompetensi Dasar');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/kd-detail') }}",
            dataType: 'json',
            data:{kode_pp:kode_pp,kode_matpel:id,kode_tingkat:kode_tingkat,kode_sem:kode_sem},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#kode_matpel').val(result.data[0].kode_matpel);
                    $('#kode_tingkat').val(result.data[0].kode_tingkat);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#kode_sem')[0].selectize.setValue(result.data[0].kode_sem);
                
                    if(result.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            input += "<tr class='row-kd'>";
                            input += "<td class='no-kd text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode_kd tdkode_kdke"+no+" tooltip-span'>"+line.kode_kd+"</span><input type='text' name='kode_kd[]' class='form-control inp-kode_kd kode_kdke"+no+" hidden'  value='"+line.kode_kd+"' ></td>";
                            input += "<td ><span class='td-nama tdnnamake"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama[]' class='form-control inp-nama nnamake"+no+" hidden'  value='"+line.nama+"' ></td>";
                            input += "<td class='text-right'><span class='td-kkm tdkkmke"+no+" tooltip-span'>"+line.kkm+"</span><input type='text' name='kkm[]' class='form-control inp-kkm kkmke"+no+" hidden'  value='"+line.kkm+"' ></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-kd tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        
                        no= 1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            $('.kkmke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                        
                    }
                    hitungTotalRow();
                    $('#modal-preview').modal('hide');
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    showInfoField('kode_pp',result.data[0].kode_pp,result.data[0].nama_pp);
                    showInfoField('kode_ta',result.data[0].kode_ta,result.data[0].nama_ta);
                    showInfoField('kode_ta',result.data[0].kode_ta,result.data[0].nama_ta);
                    showInfoField('kode_matpel',result.data[0].kode_matpel,result.data[0].nama_matpel);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                   window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });

    // END PREVIEW

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            var jumdet = $('#input-kd tr').length;
            
            var param = $('#id').val();
            var id = $('#kode_matpel').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('sekolah-master/kd') }}";
            }else{
                var url = "{{ url('sekolah-master/kd') }}";
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(jumdet <= 1){
                alert('Transaksi tidak valid. Detail nilai tidak boleh kosong ');
            }else{
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: formData,
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            $('#btn-tampil').click();    
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Data Kompetensi Dasar Siswa');
                            $('#id').val('');
                            $('#input-kd tbody').html('');
                            $('.input-group-prepend').addClass('hidden');
                            $('span[class^=info-name]').addClass('hidden');
                            $('.info-icon-hapus').addClass('hidden');
                            $('[class*=input-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
                            if("{{ Session::get('kodePP') }}" != ""){
                                $('#kode_pp').val("{{ Session::get('kodePP') }}");
                                $('#kode_pp').trigger('change');
                            }
                            hitungTotalRow();
                            msgDialog({
                                id:result.data.kode,
                                type:'simpan'
                            });
                            
                            last_add("kode_matpel",result.data.kode);
                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                        $iconLoad.hide();
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
            }

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    // ENTER FIELD FORM
    $('#kode_pp,#kode_ta,#kode_matpel,#kode_tingkat,#kode_sem').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','kode_ta','kode_matpel','kode_tingkat','kode_sem'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            // if(idx == 2){
            //     $('#'+nxt[idx])[0].selectize.focus();
            // }else{
                $('#'+nxt[idx]).focus();
            // }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    // END ENTER FIELD FORM

    $('#form-tambah').on('click', '.search-item2', function(){
        if($(this).css('cursor') == "not-allowed"){
            return false;
        }
        var par = $(this).closest('div').find('input').attr('name');
        showFilter(par);
    });

    // GRID 

    function hideUnselectedRow() {
        $('#input-kd > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                
                var kode = $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-kode_kd").val();
                var nama = $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var kkm = $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-kkm").val();
               
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-kode_kd").val(kode);
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".td-kode_kd").text(kode);
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama);
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama);
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-kkm").val(kkm);
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".td-kkm").text(kkm);
                
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-kode_kd").hide();
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".td-kode_kd").show();
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".inp-kkm").hide();
                $('#input-kd > tbody > tr:eq('+index+') > td').find(".td-kkm").show();
            }
        })
    }
    
    $('#input-kd tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-kd tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    
    $('#input-kd').on('keydown','.inp-kode_kd, .inp-nama, .inp-kkm',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode_kd','.inp-nama','.inp-kkm'];
        var nxt2 = ['.td-kode_kd','.td-nama','.td-kkm'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    if(isi != ""){
                        $("#input-kd td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Kode yang dimasukkan tidak valid');
                        return false;
                    }                    
                    break;
                case 1:
                    if(isi != ""){
                        $("#input-kd td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Deskripsi yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 2:
                    if(isi != "" && isi != 0){
                        $("#input-kd td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        var cek = $(this).parents('tr').next('tr').find('.td-kode_kd');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                        hitungTotalRow();
                    }else{
                        alert('KKM yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    $('#form-tambah').on('click', '.add-row', function(){
        var kode_pp =$('#kode_pp').val();
        var kode_matpel =$('#kode_matpel').val();
        if(kode_pp != "" && kode_matpel != ""){

            var no=$('#input-kd .row-kd:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-kd'>";
            input += "<td class='no-kd text-center'>"+no+"</td>";
            input += "<td ><span class='td-kode_kd tdkode_kdke"+no+" tooltip-span'></span><input type='text' name='kode_kd[]' class='form-control inp-kode_kd kode_kdke"+no+" hidden'  value=''></td>";
            input += "<td ><span class='td-nama tdnnamake"+no+" tooltip-span'></span><input type='text' name='nama[]' class='form-control inp-nama nnamake"+no+" hidden'  value=''></td>";
            input += "<td class='text-right'><span class='td-kkm tdkkmke"+no+" tooltip-span'></span><input type='text' name='kkm[]' class='form-control inp-kkm kkmke"+no+" hidden'  value=''></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-kd tbody').append(input);
            hitungTotalRow();
            hideUnselectedRow();

            $('#input-kd td').removeClass('px-0 py-0 aktif');
            $('#input-kd tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-kd tbody tr:last').find(".inp-kode_kd").show();
            $('#input-kd tbody tr:last').find(".td-kode_kd").hide();
            $('#input-kd tbody tr:last').find(".inp-kode_kd").focus();

            $('.inp-kkm').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                onCleared: function () { self.Value(''); }
            });
            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
        }else{
            alert('Harap pilih terlebih dahulu Kode PP dan Kode Matpel untuk menambah baris kompetensi !');
        }

    });

    // $('.nav-control').on('click', '#copy-row', function(){
    //     if($(".selected-row").length != 1){
    //         alert('Harap pilih row yang akan dicopy terlebih dahulu!');
    //         return false;
    //     }else{
    //         var kode_akun = $('#input-kd tbody tr.selected-row').find(".inp-kode").val();
    //         var nama_akun = $('#input-kd tbody tr.selected-row').find(".inp-nama").val();
    //         var dc = $('#input-kd tbody tr.selected-row').find(".td-dc").text();
    //         var keterangan = $('#input-kd tbody tr.selected-row').find(".inp-ket").val();
    //         var nilai = $('#input-kd tbody tr.selected-row').find(".inp-nilai").val();
    //         var kode_pp = $('#input-kd tbody tr.selected-row').find(".inp-pp").val();
    //         var nama_pp = $('#input-kd tbody tr.selected-row').find(".inp-nama_pp").val();
    //         var no=$('#input-kd .row-jurnal:last').index();
    //         no=no+2;
    //         var input = "";
    //         input += "<tr class='row-jurnal'>";
    //         input += "<td class='no-jurnal text-center'>"+no+"</td>";
    //         input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
    //         input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
    //         input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
    //         input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
    //         input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
    //         input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
    //         input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
    //         input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
    //         input += "</tr>";
    //         $('#input-kd tbody').append(input);
    //         $('.dcke'+no).selectize({
    //             selectOnTab:true,
    //             onChange: function(value) {
    //                 $('.tddcke'+no).text(value);
    //                 hitungTotal();
    //             }
    //         });
    //         $('.selectize-control.dcke'+no).addClass('hidden');
    //         $('.nilke'+no).inputmask("numeric", {
    //             radixPoint: ",",
    //             groupSeparator: ".",
    //             digits: 2,
    //             autoGroup: true,
    //             rightAlign: true,
    //             oncleared: function () { self.Value(''); }
    //         });
    //         hitungTotal();
    //         $('.tooltip-span').tooltip({
    //             title: function(){
    //                 return $(this).text();
    //             }
    //         })
    //         $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    //     }

    // });

    $('#input-kd').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-kd td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode = $(this).parents("tr").find(".inp-kode_kd").val();
                var nama = $(this).parents("tr").find(".inp-nama").val();
                var kkm = $(this).parents("tr").find(".inp-kkm").val();
                var no = $(this).parents("tr").find(".no-kd").text();
                $(this).parents("tr").find(".inp-kode_kd").val(kode);
                $(this).parents("tr").find(".td-kode_kd").text(kode);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode_kd").show();
                    $(this).parents("tr").find(".td-kode_kd").hide();
                    $(this).parents("tr").find(".inp-kode_kd").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode_kd").hide();
                    $(this).parents("tr").find(".td-kode_kd").show();
                }
        
                $(this).parents("tr").find(".inp-nama").val(nama);
                $(this).parents("tr").find(".td-nama").text(nama);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }

                $(this).parents("tr").find(".inp-kkm").val(kkm);
                $(this).parents("tr").find(".td-kkm").text(kkm);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-kkm").show();
                    $(this).parents("tr").find(".td-kkm").hide();
                    $(this).parents("tr").find(".inp-kkm").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-kkm").hide();
                    $(this).parents("tr").find(".td-kkm").show();
                }
                hitungTotalRow();
            }
        }
    });

    $('#input-kd').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-kd').each(function(){
            var nom = $(this).closest('tr').find('.no-kd');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    
    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var kode_pp = $('#inp-filter_kode_pp').val();
                var kode_sem = $('#inp-filter_kode_sem').val();
                var col_kode_pp = data[1];
                var col_kode_sem = data[3];
                if(kode_pp != "" && kode_sem != ""){
                    if(kode_pp == col_kode_pp && kode_sem == col_kode_sem){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_pp !="" && kode_sem == "") {
                    if(kode_pp == col_kode_pp){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_pp == "" && kode_sem != ""){
                    if(kode_sem == col_kode_sem){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return true;
                }
            }
        );
        dataTable.draw();
        $.fn.dataTable.ext.search.pop();
        $('#modalFilter').modal('hide');
    });

    $('[name^=inp-filter]').change(function(){
        jumFilter();
    });

    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_kode_pp')[0].selectize.setValue('');
        // $('#inp-filter_status')[0].selectize.setValue('');
        jumFilter();
    });
    
    $('#filter-btn').click(function(){
        $('#modalFilter').modal('show');
    });

    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        $('#modalFilter').modal('hide');
    });
    $('#btn-tampil').click();
    </script>