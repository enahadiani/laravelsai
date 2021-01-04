    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2-readonly{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
            background:#e9ecef;
            display:none;
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
        
        .selectize-input.locked {
            background:#e9ecef !important;
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
            height:37.2px !important;
            padding:0px !important;
        }
        
        #input-nilai span
        {
            padding:0px 10px !important;
        }
        
        #input-nilai input,#input-nilai .selectize-input
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

        .input-group > .form-control
        {
            border-radius: 0.5rem !important;
        }

        .readonly{
            background: #e9ecef !important;
        }

        
        .input-group-prepend > span {
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

        .info-icon-hapus{
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 35px;
            z-index: 3;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem;
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

        
        #preview-close
        {
            line-height:1.5;padding: 0;background: none;appearance: unset;opacity: unset;right: -20px;position: relative;top: 3px;
        }
        #preview-close > span 
        {
            border-radius: 50%;padding: 0 0.45rem 0.1rem 0.45rem;background: white;color: black;font-size: 1.2rem !important;font-weight: lighter;box-shadow:0px 1px 5px 1px #80808054
        }

        #preview-close > span:hover
        {
            color:white;
            background:red;
        }
        
    </style>
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                    <h6 style="position:absolute;top: 25px;">Upload Dokumen Penilaian Siswa</h6>
                    <!-- <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button> -->
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
                        <div class="input-group input-group-sm" style="width:321px;float:right">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;width:230px !important">
                            <div class="input-group-append" style="width:92px !important">
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
                                    <th>Progress</th>
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
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row hidden" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                        <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_pp">PP</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden readonly" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kode_pp readonly" id="kode_pp" name="kode_pp" value="" title="">
                                                    <span class="info-name_kode_pp hidden readonly">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-magnifier search-item2-readonly" id="search_kode_pp"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_ta">Tahun Ajaran</label>
                                                <input class="form-control" type="text"  id="kode_ta" name="kode_ta" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_kd">Kompetensi Dasar</label>
                                                <input class="form-control" type="text"  id="kode_kd" name="kode_kd" required readonly>
                                                <i class='simple-icon-magnifier search-item2-readonly' style="top: 28px;right: 24px;"></i>
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
                                                    <div class="input-group-prepend hidden readonly" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_kelas" readonly="readonly" title=""></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kode_kelas readonly" id="kode_kelas" name="kode_kelas" value="" title="">
                                                    <span class="info-name_kode_kelas hidden readonly">
                                                        <span></span> 
                                                    </span>
                                                    
                                                    <i class="simple-icon-magnifier search-item2-readonly" id="search_kode_kelas"></i>
                                                </div>
                                                <label for="kode_matpel">Mata Pelajaran</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden readonly" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_matpel" readonly="readonly" title=""></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kode_matpel readonly" id="kode_matpel" name="kode_matpel" value="" title="" readonly>
                                                    <span class="info-name_kode_matpel hidden readonly">
                                                        <span></span> 
                                                    </span>
                                                    <!-- <i class="simple-icon-close float-right info-icon-hapus hidden"></i> -->
                                                    <i class="simple-icon-magnifier search-item2-readonly" id="search_kode_matpel"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kode_jenis">Jenis Penilaian</label>
                                                <div class="input-group" style="margin-bottom:1rem">
                                                    <div class="input-group-prepend hidden readonly" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_jenis" readonly="readonly" title=""></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kode_jenis readonly"  id="kode_jenis" name="kode_jenis" value="" title="">
                                                    <span class="info-name_kode_jenis hidden readonly">
                                                        <span></span> 
                                                    </span>
                                                    <!-- <i class="simple-icon-close float-right info-icon-hapus hidden"></i> -->
                                                    <i class="simple-icon-magnifier search-item2-readonly" id="search_kode_jenis"></i>
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
                                                <textarea id="nama_kd" name="nama_kd" class="form-control" style="height:112px" readonly></textarea>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="pelaksanaan" >Pelaksanaan</label>
                                                <textarea id="pelaksanaan" name="pelaksanaan" class="form-control" style="height:112px" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Dokumen</span></a> </li>
                                    <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Dokumen</span></a> </li> -->
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-dok" role="tabpanel">
                                        <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                            <div class="dropdown d-inline-block mx-0">
                                                <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                                <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" id="download-template" >Download Template</a>
                                                    <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                                </div>
                                            </div>
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                        </div>
                                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="input-dok" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:3%">No</th>
                                                    <th style="width:10%">ID</th>
                                                    <th style="width:10%">NIS</th>
                                                    <th style="width:29%">Nama</th>
                                                    <!-- <th style="width:18%">Nama Dok</th> -->
                                                    <th style="width:18%">Path File</th>
                                                    <th width="20%">Upload File</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
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
                    <h6 class="modal-title" style="position: absolute;"></h6><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
                    <span aria-hidden="true">&times;</span>
                    </button> 
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    
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
        var total_row = $('#input-dok tbody tr').length;
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
    
    $('.selectize').selectize();
    $('[id^=label]').attr('readonly',true);
    
    jumFilter();
    // END 

    // LIST DATA
    var action_html = "<a href='#' title='Upload' id='btn-upload'><i class='simple-icon-cloud-upload' style='font-size:18px'></i></a> &nbsp;";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('sekolah-trans/penilaian-dok-list') }}",
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
                "targets": [8],
                "visible": false,
                "searchable": false
            },
            {   'targets': [7],
                'className': 'text-right',
                // 'render': $.fn.dataTable.render.number( '.', ',', 1, '' )
                "render": function ( data, type, row, meta ) {
                    if(row.persen > 0){
                        return sepNum(row.persen)+'%';
                    }else if (row.persen == 100){
                        return '100%';
                    }else{
                        return '0%';
                    }
                }
            }, 
            {'targets': 9, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'kode_ta' },
            { data: 'kode_kelas' },
            { data: 'kode_jenis' },
            { data: 'kode_matpel' },
            { data: 'kode_sem' },
            { data: 'kode_pp' },
            { data: 'persen' },
            { data: 'tgl_input' }
        ],
        order:[[8,'desc']],
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
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/kelas') }}",
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
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/matpel') }}",
            dataType: 'json',
            data:{kode_pp:pp,kode_matpel:kode},
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
            data:{kode_pp:pp,kode_jenis:kode},
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
    $('#saku-datatable').on('click', '#btn-upload', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var tmp= $(this).closest('tr').find('td').eq(6).html().split("-");
        var kode_pp = tmp[0];
        $('#judul-form').html('Upload Dokumen Penilaian Siswa');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-trans/penilaian-dok') }}",
            dataType: 'json',
            data:{kode_pp:kode_pp,no_bukti:id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#kode_sem')[0].selectize.setValue(result.data[0].kode_sem);
                    $('#kode_sem')[0].selectize.lock();
                    $('#kode_kelas').val(result.data[0].kode_kelas);
                    $('#kode_matpel').val(result.data[0].kode_matpel);
                    $('#kode_jenis').val(result.data[0].kode_jenis);
                    $('#kode_kd').val(result.data[0].kode_kd);
                    $('#nama_kd').text(result.data[0].nama_kd);
                    $('#pelaksanaan').text(result.data[0].pelaksanaan);
                    $('#penilaian_ke').val(result.data[0].jumlah);
                
                    if(result.data_dokumen.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_dokumen.length;i++){
                            var line =result.data_dokumen[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdniske"+no+" tooltip-span'>"+line.nis+"</span><input type='hidden' name='nis[]' class='form-control inp-nis' value='"+line.nis+"'></td>";
                            input += "<td ><span class='td-nis2 tdnis2ke"+no+" tooltip-span'>"+line.nis2+"</span></td>";
                            input += "<td ><span class='td-nama_siswa tdnmsiswake"+no+" tooltip-span'>"+line.nama_siswa+"</span></td>";
                            // if(line.nama != undefined && line.nama != "null"){

                            //     input += "<td ><input type='text' name='nama_dok[]' class='form-control inp-nama_dok' value='"+line.nama+"'></td>";
                            // }else{
                            //     input += "<td ><input type='text' name='nama_dok[]' class='form-control inp-nama_dok' value=''></td>";
                            // }
                            var dok = "{{ config('api.url').'sekolah/storage' }}/"+line.fileaddres;
                            input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>"+line.fileaddres+"</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='"+line.fileaddres+"' readonly></td>";
                            if(line.fileaddres == "-" || line.fileaddres == ""){
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]' class='inp-file_dok'>
                                </td>`;
                            }else{
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]'>
                                </td>`;
                            }
                            input+=`
                                <td class='text-center action-dok'>`;
                                if(line.fileaddres != "-"){
                                   var link =`<a class='download-dok' style='font-size:18px' href='`+dok+`'target='_blank' title='Download'><i class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok' style='font-size:18px' href='#' title='Hapus Dokumen'><i class='simple-icon-trash'></i></a>`;
                                }else{
                                    var link =``;
                                }
                            input+=link+"</td></tr>";
                            no++;
                        }
                        $('#input-dok tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        
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
            }
        });
    });
    // END BUTTON EDIT

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
    // END BUTTON KEMBALI

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            
            var param = $('#id').val();
            var id = $('#no_bukti').val();
            if(param == "edit"){
                var url = "{{ url('sekolah-trans/penilaian-dok') }}";
            }else{
                var url = "{{ url('sekolah-trans/penilaian-dok') }}";
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

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
                        $('#input-dok tbody').html('');
                        $('#judul-form').html('Upload Dokumen Penilaian Siswa');
                        $('#id').val('');
                        $('[id^=label]').html('');
                        hitungTotalRow();

                        msgDialog({
                            id:result.data.no_bukti,
                            title:'Sukses',
                            text:'Dokumen Penilaian Siswa berhasil diupload'
                        });

                        // last_add("no_bukti",result.data.no_bukti);
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
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    // HAPUS DOK
    function hapusData(param){
        var no_bukti = param.no_bukti; 
        var nis = param.nis; 
        var kode_pp= param.kode_pp;
        var nama_file= param.nama_file;
        var td_nama_file= param.td_nama_file;
        var action_dok= param.action_dok;
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sekolah-trans/penilaian-dok') }}",
            dataType: 'json',
            data: {'no_bukti':no_bukti,'nis':nis,'kode_pp':kode_pp},
            success:function(result){
                // console.log(result.data.message);
                if(result.data.status){
                    nama_file.val('-');
                    td_nama_file.html('-');
                    action_dok.html('');
                    msgDialog({
                        id:result.data.no_bukti,
                        title:'Sukses',
                        back: false,
                        text:'Dokumen Penilaian Siswa '+nis+' berhasil dihapus'
                    });
                }else{
                    msgDialog({
                        id:result.data.no_bukti,
                        title:'Error',
                        back: false,
                        text:result.data.message
                    });
                }
            }
        });
    }

    $('#input-dok').on('click', '.hapus-dok', function(){
        var no_bukti = $('#no_bukti').val();
        var kode_pp = $('#kode_pp').val();
        var nis = $(this).closest('tr').find('.inp-nis').val();
        var nama_file = $(this).closest('tr').find('.inp-nama_file');
        var td_nama_file = $(this).closest('tr').find('.td-nama_file');
        var action_dok = $(this).closest('tr').find('.action-dok');
        msgDialog({
            id: nis,
            text: 'Dokumen akan terhapus secara permanen dari server dan tidak dapat mengurungkan.<br> ID Data : <b>'+nis+'</b>',
            param: {'kode_pp':kode_pp,'no_bukti':no_bukti,'nis':nis,'nama_file':nama_file,'td_nama_file':td_nama_file,'action_dok':action_dok},
            type:'hapus'
        });
       
    });

    $('#input-dok').on('change', '.inp-file_dok', function(){
        if($(this).val() != ""){
            var action_dok = $(this).closest('tr').find('.action-dok');
            console.log(action_dok);
            action_dok.html("<a class='hapus-dok2' style='font-size:18px' href='#' title='Hapus Dokumen'><i class='simple-icon-trash'></i></a>"); 
        }
    });

    $('#input-dok').on('click', '.hapus-dok2', function(){
        if(confirm('Apakah anda ingin menghapus dokumen ini? ')){
            $(this).closest('tr').find('.inp-file_dok').val('');
            $(this).closest('tr').find('.action-dok').html('');
        }else{
            return false;
        }       
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