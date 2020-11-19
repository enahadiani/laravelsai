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
        #input-nilai .selectize-input.focus, #input-nilai input.form-control, #input-nilai .custom-file-label,  #input-dok .selectize-input.focus, #input-dok input.form-control, #input-dok .custom-file-label
        {
            border:1px solid black !important;
            border-radius:0 !important;
        }
        
        #input-nilai .selectize-input,  #input-dok .selectize-input
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
        #input-nilai td:not(:nth-child(1)):not(:nth-child(5)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-dok td:not(:nth-child(1)):not(:nth-child(7)):hover
        {
            background:#f8f8f8;
            color:black;
        }

        #input-nilai input:hover,
        #input-nilai .selectize-input:hover,
        {
            width:inherit;
        }

        #input-dok input:hover,
        #input-dok .selectize-input:hover,
        {
            width:inherit;
        }

        #input-nilai ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }

        #input-dok ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }
        #input-nilai td
        {
            overflow:hidden !important;
            height:calc(1.3rem + 1rem) !important;
            padding:0px !important;
        }
        
        #input-nilai span
        {
            padding:0px 10px !important;
        }
        
        #input-nilai input,#input-nilai .selectize-input
        {
            overflow:hidden !important;
        }

        #input-dok td
        {
            overflow:hidden !important;
            height:calc(1.3rem + 1rem) !important;
            padding:0px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }
        
        #input-dok span
        {
            padding:0px 10px !important;
        }
        
        #input-dok input,#input-dok .selectize-input
        {
            overflow:hidden !important;
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
            display:none;
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
                    <h5 style="position:absolute;top: 25px;">Data Penilaian Siswa</h5>
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
                                    <th>No Bukti</th>
                                    <th>Kode TA</th>
                                    <th>Kode Kelas </th>
                                    <th>Kode Jenis</th>
                                    <th>Kode Matpel</th>
                                    <th>Kode Semester</th>
                                    <th>Kode PP</th>
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
                <div class="card" style=''>
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                        <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                                        <input class="form-control" type="hidden" id="flag_kelas" name="flag_kelas" readonly >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
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
                                            <div class="col-md-6 col-sm-12">
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
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_kd">KD</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_kd" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control input-label-kode_kd" id="kode_kd" name="kode_kd" value="" title="" readonly style="
                                                    background: #e9ecef !important;">
                                                    <span class="info-name_kode_kd hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_kd" style="background: #e9ecef !important;"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_kelas">Kelas</label>
                                                <div class="input-group" style="margin-bottom:1rem">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_kelas" readonly="readonly" title=""></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kode_kelas" id="kode_kelas" name="kode_kelas" value="" title="">
                                                    <span class="info-name_kode_kelas hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_kelas"></i>
                                                </div>
                                                <label for="kode_matpel">Mata Pelajaran</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_matpel" readonly="readonly" title=""></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kode_matpel" id="kode_matpel" name="kode_matpel" value="" title="">
                                                    <span class="info-name_kode_matpel hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_matpel"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_jenis">Jenis Penilaian</label>
                                                <div class="input-group" style="margin-bottom:1rem">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_jenis" readonly="readonly" title=""></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kode_jenis"  id="kode_jenis" name="kode_jenis" value="" title="">
                                                    <span class="info-name_kode_jenis hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_jenis"></i>
                                                </div>

                                                <label for="kode_sem">Semester</label>
                                                <select class='form-control selectize' id="kode_sem" name="kode_sem">
                                                <option value=''>--- Pilih Semester ---</option>
                                                <option value='1' selected>GANJIL</option>
                                                <option value='2'>GENAP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="nama_kd" >Isi KD</label>
                                                <textarea id="nama_kd" name="nama_kd" readonly class="form-control" style="height:112px"></textarea>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="pelaksanaan" >Pelaksanaan</label>
                                                <textarea id="pelaksanaan" name="pelaksanaan" class="form-control" style="height:112px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-nilai" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Nilai</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-nilai" role="tabpanel">
                                        <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                            <div class="dropdown d-inline-block mx-0">
                                                <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                                <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Import Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href='#' id="download-template" >Download Template</a>
                                                    <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                                </div>
                                            </div>
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                        </div>
                                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="input-nilai" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:3%">No</th>
                                                    <th style="width:15%">ID</th>
                                                    <th style="width:20%">NIS</th>
                                                    <th style="width:40%">Nama</th>
                                                    <th style="width:17%">Nilai</th>
                                                    <th width="5%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                            <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                        </div>
                                    </div>
                                    <!-- <div class="tab-pane" id="data-dok" role="tabpanel">
                                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed" id="input-dok" style='width:100%'>
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="10%">NIS</th>
                                                        <th width="20%">Nama</th>
                                                        <th width="20%">Nama Dokumen</th>
                                                        <th width="20%">Nama File Upload</th>
                                                        <th width="20%">Upload File</th>
                                                        <th width="5%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <a type="button" href="#" data-id="0" title="add-row-dok" class="add-row-dok btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                        </div>
                                    </div> -->
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
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Nilai <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
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
                                <option value='#'>Pilih Kode PP</option>
                            </select>
                        </div>
                        <!-- <div class="form-group row">
                            <label>Status</label>
                            <select class="form-control" data-width="100%" name="inp-filter_status" id="inp-filter_status">
                                <option value='#'>Pilih Status</option>
                            </select>
                        </div> -->
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
        var total_row = $('#input-nilai tbody tr').length;
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

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('sekolah-trans/penilaian') }}",
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
                "targets": [7],
                "visible": false,
                "searchable": false
            },
            {'targets': 8, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'kode_ta' },
            { data: 'kode_kelas' },
            { data: 'kode_jenis' },
            { data: 'kode_matpel' },
            { data: 'kode_sem' },
            { data: 'kode_pp' },
            { data: 'tgl_input' }
        ],
        order:[[7,'desc']],
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
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sekolah-master/pp') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                var judul = "Daftar PP";
                var pilih = "pp";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                var width = ["30%","70%"];
            break;
            case 'kode_kelas': 
                header = ['Kode Kelas', 'Nama', 'Jenis Kelas'];
                if("{{ Session::get('statusAdmin') }}" == "G" ){
                    var toUrl = "{{ url('sekolah-trans/penilaian-kelas') }}";
                }else{
                    var toUrl = "{{ url('sekolah-master/multi-kelas') }}";
                }
                var columns = [
                    { data: 'kode_kelas' },
                    { data: 'nama' },
                    { data: 'flag_kelas'}
                ];
                
                var judul = "Daftar Kelas";
                var pilih = "kelas";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "#flag_kelas";
                $target4 = "";
                parameter = {kode_pp:$('#kode_pp').val()};
                var width = ["30%","55%","15%"];
            break;
            case 'kode_matpel': 
                header = ['Kode Matpel', 'Nama'];
                // if("{{ Session::get('statusAdmin') }}" == "G" ){
                    var toUrl = "{{ url('sekolah-trans/penilaian-matpel') }}";
                // }else{
                //     var toUrl = "{{ url('sekolah-master/matpel') }}";
                // }
                var columns = [
                    { data: 'kode_matpel' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Matpel";
                var pilih = "matpel";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {kode_pp:$('#kode_pp').val(),kode_kelas:$('#kode_kelas').val(),flag_kelas:$('#flag_kelas').val()};
                var width = ["30%","70%"];
            break;
            case 'kode_kd': 
                header = ['Kode KD', 'Nama'];
                var toUrl = "{{ url('sekolah-trans/penilaian-kd') }}";
                var columns = [
                    { data: 'kode_kd' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Kompetensi";
                var jTarget1 = "val";
                var pilih = "kompetensi";
                var jTarget1 = "val";
                var jTarget2 = "text2";
                $target = "#kode_kd";
                $target2 = "#nama_kd";
                $target3 = "";
                $target4 = "";
                parameter = {kode_pp:$('#kode_pp').val(),kode_matpel:$('#kode_matpel').val(),kode_kelas:$('#kode_kelas').val(),kode_sem:$('#kode_sem').val()};
                if(parameter.kode_pp == "" || parameter.kode_matpel == ""  || parameter.kode_kelas == "" || parameter.kode_sem == ""){
                    return false;
                    // break;
                }
                
                var width = ["30%","70%"];
            break;
            case 'kode_jenis': 
                header = ['Kode Jenis', 'Nama'];
                var toUrl = "{{ url('sekolah-master/jenis-penilaian') }}";
                var columns = [
                    { data: 'kode_jenis' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar jenis";
                var pilih = "jenis";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {kode_pp:$('#kode_pp').val(),flag_aktif:1};
                var width = ["30%","70%"];
            break;
            case 'kode_ta': 
                header = ['Kode TA', 'Nama'];
                var toUrl = "{{ url('sekolah-master/tahun-ajaran') }}";
                var columns = [
                    { data: 'kode_ta' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Tahun Ajaran";
                var pilih = "tahun ajaran";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {kode_pp:$('#kode_pp').val(),flag_aktif:1};
                var width = ["30%","70%"];
            break;
            case 'nis[]': 
                header = ['ID', 'NIS','Nama'];
                var toUrl = "{{ url('sekolah-trans/penilaian-siswa') }}";
                var columns = [
                    { data: 'nis' },
                    { data: 'nis2' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Siswa";
                var pilih = "siswa";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                $target4 = ".td-nilai";
                parameter = {kode_pp:$('#kode_pp').val(),kode_kelas:$('#kode_kelas').val(),kode_matpel:$('#kode_matpel').val(),flag_aktif:1,flag_kelas:$('#flag_kelas').val()};
                var width = ["20%","20%","60%"];
            break;
        }

        var header_html = '';
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
                if(kode == "No data available in table"){
                    return false;
                }

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
                    console.log(par);
                    $('#'+par).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                    $($target2).width($('#'+par).width()-$('#search_'+par).width()-10).css({'left':pos.left,'height':height});
                    $($target2+' span').text(nama);
                    $($target2).attr("title",nama);
                    $($target2).removeClass('hidden');
                    $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden')
                }

                if($target3 != ""){
                    $($target3).text(nama);
                    if(par == "kode_kelas"){
                        var flag_kelas = $(this).closest('tr').find('td:nth-child(3)').text();
                        $($target3).val(flag_kelas);
                    }
                }

                if($target4 != ""){
                    if($target4 != ""){
                        if(par == "nis[]"){
                            var nama2 = $(this).closest('tr').find('td:nth-child(3)').text();
                            $($target).closest('tr').find('.inp-nama').val(nama2);
                            $($target).closest('tr').find($target4).click();
                            setTimeout(function() {  $($target).parents("tr").find(".inp-nilai").focus(); }, 50);
                        }
                        else{
                            $($target).closest('tr').find($target4).click();
                        }
                    }
                }
                var kode_pp = $('#kode_pp').val(); 
                var kode_ta = $('#kode_ta').val(); 
                var kode_sem = $('#kode_sem').val(); 
                var kode_kelas = $('#kode_kelas').val(); 
                var kode_matpel = $('#kode_matpel').val(); 
                var kode_jenis = $('#kode_jenis').val();
                if(kode_pp != "" && kode_ta != "" && kode_sem != "" && kode_kelas != "" && kode_matpel != "" && kode_jenis != ""){
                    getPenilaianKe(kode_pp,kode_ta,kode_sem,kode_kelas,kode_matpel,kode_jenis);
                }
                $('#modal-search').modal('hide');
            }
        });
    }

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
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

    function getKelas(id,pp=null){
        var tmp = id.split(" - ");
        kode = tmp[0];
        if("{{ Session::get('statusAdmin') }}" == "G" ){
            var toUrl = "{{ url('sekolah-trans/penilaian-kelas') }}";
        }else{
            var toUrl = "{{ url('sekolah-master/kelas') }}";
        }
        $.ajax({
            type: 'GET',
            url: toUrl,
            dataType: 'json',
            data:{kode_pp:pp,kode_kelas:kode},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_kelas',result.daftar[0].kode_kelas,result.daftar[0].nama);
                    }else{
                        $('#kode_kelas').attr('readonly',false);
                        $('#kode_kelas').css('border-left','1px solid #d7d7d7');
                        $('#kode_kelas').val('');
                        $('#kode_kelas').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getKD(id,pp=null,kode_matpel=null,kode_kelas=null,kode_sem=null){
        var tmp = id.split(" - ");
        kode = tmp[0];
        if(id == ""){
            return false;
        }

        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-trans/penilaian-kd') }}",
            dataType: 'json',
            data:{kode_pp:pp,kode_matpel:kode_matpel,kode_kd:kode,kode_kelas:kode_kelas,kode_sem:kode_sem},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_kd').val(result.daftar[0].kode_kd);
                         $('#nama_kd').text(result.daftar[0].nama);
                    }else{
                        // $('#kode_kd').val('');
                        $('#nama_kd').text('');
                        $('#kode_kd').focus();
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
                         $('#kode_ta').val(result.daftar[0].kode_ta);
                        //  $('#label_kode_ta').val(result.daftar[0].nama);
                    }else{
                        $('#kode_ta').val('');
                        // $('#label_kode_ta').val('');
                        $('#kode_ta').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getMatpel(id,pp=null){
        var tmp = id.split(" - ");
        kode = tmp[0];

        // if("{{ Session::get('statusAdmin') }}" == "G" ){
            var toUrl = "{{ url('sekolah-trans/penilaian-matpel') }}";
        // }else{
        //     var toUrl = "{{ url('sekolah-master/matpel') }}";
        // }
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/matpel') }}",
            dataType: 'json',
            data:{kode_pp:pp,kode_matpel:kode,kode_kelas:$('#kode_kelas').val(),flag_kelas:$('#flag_kelas').val()},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_matpel',result.daftar[0].kode_matpel,result.daftar[0].nama);
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
    function getJenisPenilaian(id,pp=null){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/jenis-penilaian') }}",
            dataType: 'json',
            data:{kode_pp:pp,kode_jenis:kode,flag_aktif:1},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_jenis',result.daftar[0].kode_jenis,result.daftar[0].nama);
                    }else{
                        $('#kode_jenis').attr('readonly',false);
                        $('#kode_jenis').css('border-left','1px solid #d7d7d7');
                        $('#kode_jenis').val('');
                        $('#kode_jenis').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getPenilaianKe(kode_pp,kode_ta,kode_sem,kode_kelas,kode_matpel,kode_jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-trans/penilaian-ke') }}",
            dataType: 'json',
            data:{kode_pp:kode_pp,kode_ta:kode_ta,kode_sem:kode_sem,kode_kelas:kode_kelas,kode_matpel:kode_matpel,kode_jenis:kode_jenis},
            async:false,
            success:function(result){    
                if(result.data.status){
                    $('#penilaian_ke').val(result.data.jumlah);
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getSiswa(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-trans/penilaian-siswa') }}",
            data:{kode_pp:$('#kode_pp').val(),nis:kode,kode_kelas:$('#kode_kelas').val(),flag_kelas:$('#flag_kelas').val(),kode_matpel:$('#kode_matpel').val()},
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.td'+target3).text('');
                        }else{

                            $("#input-nilai td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-nis').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                            $('.td'+target3).text('');
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('NIS tidak valid');
                    }
                }
            }
        });
    }

    // END CBBL

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

    $('#kode_pp,#kode_ta,#kode_sem,#kode_kelas,#kode_matpel,#kode_jenis').change(function(){
        var kode_pp = $('#kode_pp').val(); 
        var kode_ta = $('#kode_ta').val(); 
        var kode_sem = $('#kode_sem').val(); 
        var kode_kelas = $('#kode_kelas').val(); 
        var kode_matpel = $('#kode_matpel').val(); 
        var kode_jenis = $('#kode_jenis').val();
        if(kode_pp != "" && kode_ta != "" && kode_sem != "" && kode_kelas != "" && kode_matpel != "" && kode_jenis != ""){
            getPenilaianKe(kode_pp,kode_ta,kode_sem,kode_kelas,kode_matpel,kode_jenis);
        }
    });

    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var tmp= $(this).closest('tr').find('td').eq(6).html().split("-");
        var kode_pp = tmp[0];
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Penilaian Siswa');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-trans/penilaian-detail') }}",
            dataType: 'json',
            data:{kode_pp:kode_pp,no_bukti:id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#flag_kelas').val(result.data[0].flag_kelas);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#kode_sem')[0].selectize.setValue(result.data[0].kode_sem);
                    $('#kode_kelas').val(result.data[0].kode_kelas);
                    $('#kode_matpel').val(result.data[0].kode_matpel);
                    $('#kode_jenis').val(result.data[0].kode_jenis);
                    $('#kode_kd').val(result.data[0].kode_kd);
                    $('#nama_kd').text(result.data[0].nama_kd);
                    $('#pelaksanaan').text(result.data[0].pelaksanaan);
                    $('#penilaian_ke').val(result.data[0].jumlah);
                
                    if(result.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdniske"+no+" tooltip-span'>"+line.nis+"</span><input type='text' id='niskode"+no+"' name='nis[]' class='form-control inp-kode niske"+no+" hidden' value='"+line.nis+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-nis hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
                            input += "<td ><span class='td-nis2 tdnis2ke"+no+" tooltip-span'>"+line.nis2+"</span><input type='text' name='nis2[]' class='form-control inp-nis2 nis2ke"+no+" hidden'  value='"+line.nis2+"' readonly></td>";
                            input += "<td ><span class='td-nama tdnmsiswake"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama_siswa[]' class='form-control inp-nama nmsiswake"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+format_number(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-nilai tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            $('.nilke'+no).inputmask("numeric", {
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
                    showInfoField('kode_kelas',result.data[0].kode_kelas,result.data[0].nama_kelas);
                    showInfoField('kode_matpel',result.data[0].kode_matpel,result.data[0].nama_matpel);
                    showInfoField('kode_jenis',result.data[0].kode_jenis,result.data[0].nama_jenis);
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
    function hapusData(id,kode){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sekolah-trans/penilaian') }}",
            dataType: 'json',
            data:{kode_pp:kode,no_bukti:id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Penilaian ('+id+') berhasil dihapus ');
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
        var tmp = $(this).closest('tr').find('td').eq(6).html().split("-");
        var kode_pp = tmp[0];
        msgDialog({
            id: id,
            kode: kode_pp,
            type:'hapus'
        });
    });
    // END HAPUS DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Penilaian Siswa');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-nilai tbody').html('');
        $('#nama_kd').text('');
        $('#pelaksanaan').text('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
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
        if($(this).index() != 7){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var tmp = $(this).closest('tr').find('td').eq(6).html().split("-");
            var kode_pp = tmp[0];
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-trans/penilaian-detail') }}",
                data:{kode_pp:kode_pp,no_bukti:id},
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){

                        var html = `<tr>
                            <td style='border:none'>No Bukti</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td>PP</td>
                            <td>`+result.data[0].kode_pp+`-`+result.data[0].nama_pp+`</td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>`+result.data[0].kode_ta+`-`+result.data[0].nama_ta+`</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>`+result.data[0].kode_sem+`</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>`+result.data[0].kode_kelas+`-`+result.data[0].nama_kelas+`</td>
                        </tr>
                        <tr>
                            <td>Mata Pelajaran</td>
                            <td>`+result.data[0].kode_matpel+`-`+result.data[0].nama_matpel+`</td>
                        </tr>
                        <tr>
                            <td>Jenis Penilaian</td>
                            <td>`+result.data[0].kode_jenis+`-`+result.data[0].nama_jenis+`</td>
                        </tr>
                        <tr>
                            <td>Komptensi Dasar</td>
                            <td>`+result.data[0].kode_kd+`-`+result.data[0].nama_kd+`</td>
                        </tr>
                        <tr>
                            <td>Pelaksanaan</td>
                            <td>`+result.data[0].pelaksanaan+`</td>
                        </tr>
                        <tr>
                            <td>Penilaian ke - </td>
                            <td>`+result.data[0].jumlah+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-ju-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:20%">ID</th>
                                            <th style="width:20%">NIS</th>
                                            <th style="width:37%">Nama Siswa</th>
                                            <th style="width:20%">Nilai</th>
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
                                input += "<td >"+line.nis+"</td>";
                                input += "<td >"+line.nis2+"</td>";
                                input += "<td >"+line.nama+"</td>";
                                input += "<td class='text-right'>"+format_number(line.nilai)+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-ju-preview tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview-kode').text(result.data[0].kode_pp);
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
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            kode:kode_pp,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        var kode_pp= $('#modal-preview-kode').text();
        $('#judul-form').html('Edit Data Penilaian Siswa');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-trans/penilaian-detail') }}",
            dataType: 'json',
            data:{kode_pp:kode_pp,no_bukti:id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#flag_kelas').val(result.data[0].flag_kelas);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#kode_sem')[0].selectize.setValue(result.data[0].kode_sem);
                    $('#kode_kelas').val(result.data[0].kode_kelas);
                    $('#kode_matpel').val(result.data[0].kode_matpel);
                    $('#kode_jenis').val(result.data[0].kode_jenis);
                    $('#kode_kd').val(result.data[0].kode_kd);
                    $('#nama_kd').text(result.data[0].nama_kd);
                    $('#pelaksanaan').text(result.data[0].pelaksanaan);
                    $('#penilaian_ke').val(result.data[0].jumlah);
                
                    if(result.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdniske"+no+" tooltip-span'>"+line.nis+"</span><input type='text' id='niskode"+no+"' name='nis[]' class='form-control inp-kode niske"+no+" hidden' value='"+line.nis+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-nis hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
                            input += "<td ><span class='td-nis2 tdnis2ke"+no+" tooltip-span'>"+line.nis2+"</span><input type='text' name='nis2[]' class='form-control inp-nis2 nis2ke"+no+" hidden'  value='"+line.nis2+"' readonly></td>";
                            input += "<td ><span class='td-nama tdnmsiswake"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama_siswa[]' class='form-control inp-nama nmsiswake"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+format_number(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-nilai tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            $('.nilke'+no).inputmask("numeric", {
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
                    showInfoField('kode_kelas',result.data[0].kode_kelas,result.data[0].nama_kelas);
                    showInfoField('kode_matpel',result.data[0].kode_matpel,result.data[0].nama_matpel);
                    showInfoField('kode_jenis',result.data[0].kode_jenis,result.data[0].nama_jenis);
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
        rules: 
        {
            kode_pp:
            {
                required: true,
                maxlength:10   
            },
            kode_kelas:
            {
                required: true
            },
            kode_matpel:
            {
                required: true
            },
            kode_jenis:
            {
                required: true
            },
            kode_ta:
            {
                required: true
            },
            kode_sem:
            {
                required: true
            },
            kode_kd:
            {
                required: true
            },
            nama_kd:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            var jumdet = $('#input-nilai tr').length;
            
            var param = $('#id').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('sekolah-trans/penilaian') }}";
            }else{
                var url = "{{ url('sekolah-trans/penilaian') }}";
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

                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Data Penilaian Siswa');
                            $('#id').val('');
                            $('#input-nilai tbody').html('');
                            $('#nama_kd').text('');
                            $('#pelaksanaan').text('');
                            $('[id^=label]').html('');                            
                            $('.input-group-prepend').addClass('hidden');
                            $('span[class^=info-name]').addClass('hidden');
                            $('.info-icon-hapus').addClass('hidden');
                            $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
                            if("{{ Session::get('kodePP') }}" != ""){
                                $('#kode_pp').val("{{ Session::get('kodePP') }}");
                                $('#kode_pp').trigger('change');
                            }
                            hitungTotalRow();

                            msgDialog({
                                id:result.data.no_bukti,
                                type:'simpan'
                            });
                            
                            last_add("no_bukti",result.data.no_bukti);
                        }
                        else if(!result.data.status && result.data.message === "Unauthorized"){
                            window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                        }else{
                            if(result.data.jenis == 'duplicate'){
                                msgDialog({
                                    id: result.data.no_bukti,
                                    type: result.data.jenis,
                                    text: result.data.message
                                });
                            }else{

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                    footer: '<a href>'+result.data.message+'</a>'
                                })
                            }
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
    $('#tanggal,#jenis,#no_dokumen,#total_debet,#deskripsi,#total_kredit,#nik_periksa,#label_nik_periksa').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','jenis','no_dokumen','total_debet','deskripsi','total_kredit','nik_periksa','label_nik_periksa'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
                $('#'+nxt[idx]).focus();
            }
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

    // $('#form-tambah').on('change', '#nik_periksa', function(){
    //     var par = $(this).val();
    //     getNIKPeriksa(par);
    // });

    // GRID JURNAL

    function hideUnselectedRow() {
        $('#input-nilai > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                
                var nis = $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama = $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var nilai = $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();
                var nis2 = $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nis2").val();
               
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-kode").val(nis);
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-kode").text(nis);
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nis2").val(nis2);
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-nis2").text(nis2);
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama);
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama);
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);
                
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".search-nis").hide();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nis2").hide();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-nis2").show();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#input-nilai > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }
    
    $('#input-nilai tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-nilai tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-nilai').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        
        var modul = '';
        var header = [];
        
        switch(par){
            case 'nis[]': 
                var par2 = "nis2[]";
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        
        showFilter(par,target1,target2);
    });
    
    
    $('#input-nilai').on('keydown','.inp-kode, .inp-nis2, .inp-nama, .inp-nilai',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nis2','.inp-nama','.inp-nilai'];
        var nxt2 = ['.td-kode','.td-nis2','.td-nama','.td-nilai'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-nilai").text();
                    var kode = $(this).val();
                    var target1 = "niske"+noidx;
                    var target2 = "nis2ke"+noidx;
                    var target3 = "nmsiswake"+noidx;
                    getSiswa(kode,target1,target2,target3,'tab');                    
                    break;
                case 1:
                    $("#input-nilai td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();                    
                    break;
                case 2:
                    $("#input-nilai td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();                    
                    break;
                case 3:
                    if(isi != "" && isi != 0){
                        $("#input-nilai td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        var cek = $(this).parents('tr').next('tr').find('.td-kode');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                        hitungTotalRow();
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
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

    $('#form-tambah').on('click', '.add-row', function(){
        var kode_pp =$('#kode_pp').val();
        var kode_kelas =$('#kode_kelas').val();
        if(kode_pp != "" && kode_kelas != ""){

            var no=$('#input-nilai .row-nilai:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-nilai'>";
            input += "<td class='no-nilai text-center'>"+no+"</td>";
            input += "<td ><span class='td-kode tdniske"+no+" tooltip-span'></span><input type='text' id='niskode"+no+"' name='nis[]' class='form-control inp-kode niske"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-nis hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
            input += "<td ><span class='td-nis2 tdnis2ke"+no+" tooltip-span'></span><input type='text' name='nis2[]' class='form-control inp-nis2 nis2ke"+no+" hidden'  value='' readonly></td>";
            input += "<td ><span class='td-nama tdnmsiswake"+no+" tooltip-span'></span><input type='text' name='nama_siswa[]' class='form-control inp-nama nmsiswake"+no+" hidden'  value='' readonly></td>";
            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'></span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='' required></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-nilai tbody').append(input);
            $('.nilke'+no).inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { self.Value(''); }
            });

            hitungTotalRow();
            hideUnselectedRow();

            $('#input-nilai td').removeClass('px-0 py-0 aktif');
            $('#input-nilai tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-nilai tbody tr:last').find(".inp-kode").show();
            $('#input-nilai tbody tr:last').find(".td-kode").hide();
            $('#input-nilai tbody tr:last').find(".search-nis").show();
            $('#input-nilai tbody tr:last').find(".inp-kode").focus();

            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
        }else{
            alert('Harap pilih terlebih dahulu Kode PP dan Kode Kelas untuk menambah baris siswa !');
        }

    });

    // $('.nav-control').on('click', '#copy-row', function(){
    //     if($(".selected-row").length != 1){
    //         alert('Harap pilih row yang akan dicopy terlebih dahulu!');
    //         return false;
    //     }else{
    //         var kode_akun = $('#input-nilai tbody tr.selected-row').find(".inp-kode").val();
    //         var nama_akun = $('#input-nilai tbody tr.selected-row').find(".inp-nama").val();
    //         var dc = $('#input-nilai tbody tr.selected-row').find(".td-dc").text();
    //         var keterangan = $('#input-nilai tbody tr.selected-row').find(".inp-ket").val();
    //         var nilai = $('#input-nilai tbody tr.selected-row').find(".inp-nilai").val();
    //         var kode_pp = $('#input-nilai tbody tr.selected-row').find(".inp-pp").val();
    //         var nama_pp = $('#input-nilai tbody tr.selected-row').find(".inp-nama_pp").val();
    //         var no=$('#input-nilai .row-jurnal:last').index();
    //         no=no+2;
    //         var input = "";
    //         input += "<tr class='row-jurnal'>";
    //         input += "<td class='no-jurnal text-center'>"+no+"</td>";
    //         input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
    //         input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
    //         input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
    //         input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
    //         input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
    //         input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
    //         input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
    //         input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
    //         input += "</tr>";
    //         $('#input-nilai tbody').append(input);
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

    $('#input-nilai').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-nilai td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var nis = $(this).parents("tr").find(".inp-kode").val();
                var nama = $(this).parents("tr").find(".inp-nama").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var nis2 = $(this).parents("tr").find(".inp-nis2").val();
                var no = $(this).parents("tr").find(".no-nilai").text();

                $(this).parents("tr").find(".inp-kode").val(nis);
                $(this).parents("tr").find(".td-kode").text(nis);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-nis").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-nis").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nis2").val(nis2);
                $(this).parents("tr").find(".td-nis2").text(nis2);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nis2").show();
                    $(this).parents("tr").find(".td-nis2").hide();
                    $(this).parents("tr").find(".inp-nis2").focus();
                }else{
                    $(this).parents("tr").find(".inp-nis2").hide();
                    $(this).parents("tr").find(".td-nis2").show();
                }

                $(this).parents("tr").find(".inp-nama").val(nama);
                $(this).parents("tr").find(".td-nama").text(nama);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }
        
                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
                hitungTotalRow();
                var nis2 = $(this).parents("tr").find(".inp-nis2").val();
                console.log(nis2);
            }
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#input-nilai').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-nilai').each(function(){
            var nom = $(this).closest('tr').find('.no-nilai');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    // IMPORT EXCEL

    $('#import-excel').click(function(e){
        $('.custom-file-input').val('');
        $('.custom-file-label').text('File upload');
        $('.pesan-upload .pesan-upload-judul').html('');
        $('.pesan-upload .pesan-upload-isi').html('')        
        $('.pesan-upload').hide();
        $('#modal-import').modal('show');
    });

    $("#form-import").validate({
        rules: {
            file: {required: true, accept: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"}
        },
        messages: {
            file: {required: 'Harus diisi!', accept: 'Hanya import dari file excel.'}
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            formData.append('kode_pp',$('#kode_pp').val());
            formData.append('kode_kelas',$('#kode_kelas').val());
            $('.pesan-upload').show();
            $('.pesan-upload-judul').html('Proses upload...');
            $('.pesan-upload-judul').removeClass('text-success');
            $('.pesan-upload-judul').removeClass('text-danger');
            $('.progress').removeClass('hidden');
            $('.progress-bar').attr('aria-valuenow', 0).css({
                                width: 0 + '%'
                            }).html(parseFloat(0 * 100).toFixed(2) + '%');
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            $('.progress-bar').attr('aria-valuenow', percentComplete * 100).css({
                                width: percentComplete * 100 + '%'
                            }).html(parseFloat(percentComplete * 100).toFixed(2) + '%');
                            // if (percentComplete === 1) {
                            //     $('.progress').addClass('hidden');
                            // }
                        }
                    }, false);
                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            $('.progress-bar').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ url('sekolah-trans/import-excel') }}",
                dataType: 'json',
                data: formData,
                // async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        if(result.data.validate){
                            $('#process-upload').removeClass('disabled');
                            $('#process-upload').prop('disabled', false);
                            $('#process-upload').removeClass('btn-light');
                            $('#process-upload').addClass('btn-primary');
                            $('.pesan-upload-judul').html('Berhasil upload!');
                            $('.pesan-upload-judul').removeClass('text-danger');
                            $('.pesan-upload-judul').addClass('text-success');
                            $('.pesan-upload-isi').html('File berhasil diupload!');
                        }else{
                            if(!$('#process-upload').hasClass('disabled')){
                                $('#process-upload').addClass('disabled');
                                $('#process-upload').prop('disabled', true);
                            }
                            
                            var kode_lokasi = "{{ Session::get('lokasi') }}";
                            var nik_user = "{{ Session::get('nikUser') }}";
                            var nik = "{{ Session::get('userLog') }}";

                            var link = "{{ config('api.url').'sekolah/penilaian-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=non&kode_pp="+$('#kode_pp').val()+"&kode_kelas="+$('#kode_kelas').val()+"&kode_matpel="+$('.info-name_kode_matpel > span ').text()+"&kode_jenis="+$('#kode_jenis').val()+"&kode_kd="+$('#kode_kd').val()+"&kode_sem="+$('#kode_sem option:selected').text()+"&flag_kelas="+$('#flag_kelas').val()+"&kode_matpel2="+$('.info-code_kode_matpel').text();

                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
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
                        $('.pesan-upload-judul').html('Gagal upload!');
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
                },
                error: function(jqXHR, textStatus, errorThrown) { 
                    $('.progress').addClass('hidden');      
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
                    $('.pesan-upload-judul').html('Gagal upload!');
                    $('.pesan-upload-isi').html(msg);
                    
                }
            });

        },
        errorPlacement: function (error, element) {
            $('#label-file').html(error);
            $('#label-file').addClass('error');
        }
    });

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);  
        getTA(par);
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


    $('#form-tambah').on('change', '#kode_ta', function(){
        var par = $(this).val();
        var pp = $('#kode_pp').val();
        getTA(par,pp);
    });

    $('#form-tambah').on('change', '#kode_kelas', function(){
        var pp = $('#kode_pp').val();
        var par = $(this).val();
        getKelas(par,pp);
    });

    $('#form-tambah').on('change', '#kode_matpel', function(){
        var par = $(this).val();
        var pp = $('#kode_pp').val();
        getMatpel(par,pp);
    });

    $('#form-tambah').on('change', '#kode_jenis', function(){
        var par = $(this).val();
        var pp = $('#kode_pp').val();
        getJenisPenilaian(par,pp);
    });

    $('#form-tambah').on('change', '#kode_kd', function(){
        var par = $(this).val();
        var pp = $('#kode_pp').val();
        var matpel = $('#kode_matpel').val();
        var kelas = $('#kode_kelas').val();
        getKD(par,pp,matpel,kelas);
    });

    
    $('.custom-file-input').change(function(){
        var fileName = $(this).val();
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-trans/nilai-tmp') }}",
            dataType: 'json',
            data:{'kode_pp':$('#kode_pp').val()},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdniske"+no+" tooltip-span'>"+line.nis+"</span><input type='text' id='niskode"+no+"' name='nis[]' class='form-control inp-kode niske"+no+" hidden' value='"+line.nis+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-nis hidden' style='position: absolute;z-index: 2;margin-top:0.6rem;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 16px;'></i></a></td>";
                            input += "<td ><span class='td-nis2 tdnis2ke"+no+" tooltip-span'>"+line.nis2+"</span><input type='text' name='nis2[]' class='form-control inp-nis2 nis2ke"+no+" hidden'  value='"+line.nis2+"' readonly></td>";
                            input += "<td ><span class='td-nama tdnmsiswake"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama_siswa[]' class='form-control inp-nama nmsiswake"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+format_number(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-nilai tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            $('.nilke'+no).inputmask("numeric", {
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
                    $('#modal-import').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }else{
                    alert('error');
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
    });

    $('#download-template').click(function(){
        var kode_lokasi = "{{ Session::get('lokasi') }}";
        var nik_user = "{{ Session::get('nikUser') }}";
        var nik = "{{ Session::get('userLog') }}";
        var link = "{{ config('api.url').'sekolah/penilaian-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=template&kode_pp="+$('#kode_pp').val()+"&kode_kelas="+$('#kode_kelas').val()+"&kode_matpel="+$('.info-name_kode_matpel > span ').text()+"&kode_jenis="+$('#kode_jenis').val()+"&kode_kd="+$('#kode_kd').val()+"&kode_sem="+$('#kode_sem option:selected').text()+"&flag_kelas="+$('#flag_kelas').val()+"&kode_matpel2="+$('.info-code_kode_matpel').text();
        window.open(link, '_blank'); 
    });

    
    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var tmp = $('#inp-filter_kode_pp').val().split("-");
                var kode_pp = tmp[0];
                // var status = $('#inp-filter_status').val();
                var col_kode_pp = data[6];
                // var col_status = data[5];
                if(kode_pp != "" ){
                    if(kode_pp == col_kode_pp){
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
    
    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_kode_pp')[0].selectize.setValue('');
        $('#inp-filter_status')[0].selectize.setValue('');
        jumFilter();
    });

    $('[name^=inp-filter]').change(function(e){
        e.preventDefault();
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