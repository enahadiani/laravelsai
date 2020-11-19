    <!-- STYLE TAMBAHAN -->
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
        /* #input-kelas td{
            padding:0 !important;
        } */
        #input-kelas .selectize-input.focus, #input-kelas input.form-control, #input-kelas .custom-file-label
        {
            border:1px solid black !important;
            border-radius:0 !important;
        }

        #input-kelas .selectize-input
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
        #input-kelas td:not(:nth-child(1)):not(:nth-child(9)):hover
        {
            /* background: var(--theme-color-6) !important;
            color:white; */
            background:#f8f8f8;
            color:black;
        }
        #input-kelas input:hover,
        #input-kelas .selectize-input:hover,
        {
            width:inherit;
        }
        #input-kelas ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }
        #input-kelas td
        {
            /* overflow:hidden !important; */
            height:37.2px !important;
            padding:0px !important;
        }

        #input-kelas span
        {
            padding:0px 10px !important;
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
    <!-- END STYLE -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Guru Multi Kelas</h5>
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
                <div class="card-body" style="min-height: 560px !important;padding-top:0;">                    
                    <div class="table-responsive ">
                        <table id="table-data" style='width:100%'>                                    
                            <thead>
                                <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kode PP</th>
                                <th>Kode Matpel</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Kode TA</th>
                                <th>Tgl Input</th>
                                <th>Action</th>
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

    <!-- FORM  -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator"></div>
                    <!-- FORM BODY -->
                    <div class="card-body form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                        <input type="hidden" id="method" name="_method" value="post">
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
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="nik_guru">NIK Guru</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_nik_guru" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control label-nik_guru" id="nik_guru" name="nik_guru" value="" title="">
                                                    <span class="info-name_nik_guru hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_nik_guru"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                
                                                <label for="kode_matpel">Mata Pelajaran</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kode_matpel" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control label-kode_matpel" id="kode_matpel" name="kode_matpel" value="" title="">
                                                    <span class="info-name_kode_matpel hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kode_matpel"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="flag_aktif">Status</label>
                                                <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                                    <option value='' disabled>--- Pilih Status Aktif ---</option>
                                                    <option value='1'>Aktif</option>
                                                    <option value='0'>Non Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-kelas" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Kelas</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0 mb-2">
                                    <div class="tab-pane active" id="data-kelas" role="tabpanel">
                                        <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;width:1200px !important;">
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                        </div>
                                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="input-kelas" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                                <thead style="background:#F8F8F8">
                                                    <tr>
                                                        <th style="width:3%">No</th>
                                                        <th style="width:20%">Kode Kelas</th>
                                                        <th style="width:62%">Nama Kelas</th>
                                                        <th style="width:12%">Jenis Kelas</th>
                                                        <th style="width:5%"></th>
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
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Siswa <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span><span id="modal-preview-ref" style="display:none"></span><span id="modal-preview-ref2" style="display:none"></span> </h6>
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
                            <label>Status</label>
                            <select class="form-control selectize" data-width="100%" name="inp-filter_status" id="inp-filter_status">
                                <option value='' disabled>Pilih Status</option>
                                <option value='AKTIF' selected>AKTIF</option>
                                <option value='NONAKTIF'>NONAKTIF</option>
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
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.selectize').selectize();
    $('[id^=label]').attr('readonly',true);
    
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
    
    function openFilter() {
        var element = $('#mySidepanel');
        
        var x = $('#mySidepanel').attr('class');
        var y = x.split(' ');
        if(y[1] == 'close'){
            element.removeClass('close');
            element.addClass('open');
        }else{
            element.removeClass('open');
            element.addClass('close');
        }
    }

    function hitungTotalRow(){
        var total_row = $('#input-kelas tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }
        
    $('.sidepanel').on('click', '#btnClose', function(e){
        e.preventDefault();
        openFilter();
    });

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    $('[data-toggle="tooltip"]').tooltip(); 

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
    var dataTable = $('#table-data').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        "ordering": true,
        "order": [[7, "desc"]],
        'ajax': {
            'url': "{{url('sekolah-master/guru-multi-kelas')}}",
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
            {'targets': 8, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'pp' },
            { data: 'kode_matpel' },
            { data: 'kelas' },
            { data: 'flag_aktif'},
            { data: 'kode_ta'},
            { data: 'tgl_input' },
        ],
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
            // lengthMenu: "Items Per Page _MENU_"
            "lengthMenu": 'Menampilkan <select>'+
            '<option value="10">10 per halaman</option>'+
            '<option value="25">25 per halaman</option>'+
            '<option value="50">50 per halaman</option>'+
            '<option value="100">100 per halaman</option>'+
            '</select>',
            
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

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Guru Multi Kelas');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#input-kelas tbody').html('');
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
        var kode = $('#nis').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON UPDATE
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
        var parameter = {'param':par};
        
        switch(par){
            case 'kode_kelas[]': 
                header = ['Kode', 'Nama', 'Jenis Kelas'];
                var toUrl = "{{ url('sekolah-master/multi-kelas') }}";
                var columns = [
                    { data: 'kode_kelas' },
                    { data: 'nama' },
                    { data: 'flag_kelas' }
                ];
                var judul = "Daftar Kelas";
                var pilih = "parameter";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                $target4 = "flag_kelas";
                parameter = {'kode_pp':$('#kode_pp').val(),'kode_matpel':$('#kode_matpel').val()};
            break;
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
            case 'nik_guru': 
                header = ['NIK', 'Nama'];
                var toUrl = "{{ url('sekolah-master/guru-nik') }}";
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Guru";
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                parameter = {'kode_pp':$('#kode_pp').val(),'flag_aktif':1};
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
                
                var dtrow = searchTable.row(this).data();  
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

                console.log(jTarget2);
                console.log($target2);

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
                    $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden');
                    console.log($target2);
                }
                
                // if($target3 != "" && par != "kode_kelas[]"){
                //     $($target3).click();
                // }

                if(par == "kode_pp"){
                    getTA(kode);
                }
                else if (par == "kode_kelas[]"){
                    var flag_kelas = $(this).closest('tr').find('td:nth-child(3)').text();
                    $($target).parents("tr").find(".inp-flag_kelas").val(flag_kelas);
                    $($target).parents("tr").find(".td-flag_kelas").text(flag_kelas);
                    setTimeout(function() {  $($target).parents("tr").find(".inp-flag_kelas").trigger('click'); }, 50);
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
    
    
    function getNIKGuru(id){
        var tmp = id.split(" - ");
        kode = tmp[0];
        kode_pp = $('#kode_pp').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('/sekolah-master/guru-nik') }}",
            dataType: 'json',
            data:{kode_pp : kode_pp, nik_guru: kode},
            async:false,
            success:function(res){
                var result = res.data;    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('nik_guru',result.data[0].nik,result.data[0].nama);
                    }else{
                        $('#nik_guru').attr('readonly',false);
                        $('#nik_guru').css('border-left','1px solid #d7d7d7');
                        $('#nik_guru').val('');
                        $('#nik_guru').focus();
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
    
    function getKelas(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        var kode = tmp[0];
        var kode_pp = $('#kode_pp').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/multi-kelas') }}",
            dataType: 'json',
            data:{kode_kelas:kode,kode_pp:kode_pp,kode_matpel:$('#kode_matpel').val()},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);
                            
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target1).closest('tr').find('.td-flag_kelas').text(result.daftar[0].flag_kelas);
                            $('.'+target1).closest('tr').find('.inp-flag_kelas').val(result.daftar[0].flag_kelas);
                            $('.'+target1).closest('tr').find('.td-flag_kelas').click();
                        }else{
                            
                            $("#input-kelas td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");
                            
                            $('.'+target1).closest('tr').find('.search-kelas').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();
                            
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target1).closest('tr').find('.td-flag_kelas').text(result.daftar[0].flag_kelas);
                            $('.'+target1).closest('tr').find('.inp-flag_kelas').val(result.daftar[0].flag_kelas);
                            $('.'+target1).closest('tr').find('.td-flag_kelas').click();
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){
                        $('.'+target1).val('');
                        $('.'+target2).val(''); 
                        $('.'+target1).closest('tr').find('.inp-flag_kelas').val('');
                        $('.'+target1).closest('tr').find('.td-flag_kelas').text('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        $('.'+target1).closest('tr').find('.inp-flag_kelas').val('');
                        $('.'+target1).closest('tr').find('.td-flag_kelas').text('');
                        alert('Kode Param tidak valid');
                    }
                }
            }
        });
    }

    function getStatus(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        var kode = tmp[0];
        var kode_pp = $('#kode_pp').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/status-guru') }}",
            dataType: 'json',
            data:{kode_status:kode,kode_pp:kode_pp},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);
                            
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.td'+target3).click();
                        }else{
                            
                            $("#input-kelas td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");
                            
                            $('.'+target1).closest('tr').find('.search-status').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();
                            
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                            $('.td'+target3).click();
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
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
                        alert('Kode Param tidak valid');
                    }
                }
            }
        });
    }
    
    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
        getTA(par);
    });
    
    $('#form-tambah').on('change', '#nik_guru', function(){
        var par = $(this).val();
        var pp = $('#kode_pp').val();
        getNIKGuru(par,pp);
    });
    
    $('#form-tambah').on('click', '.search-item2', function(){
        if($(this).css('cursor') == "not-allowed"){
            return false;
        }
        var par = $(this).closest('div').find('input').attr('name');
        showFilter(par);
    });
    
    // END CBBL
    function hideUnselectedRow() {
        $('#input-kelas > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                
                var kode_kelas = $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-kelas").val();
                var nama = $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-nkelas").val();
                var flag_kelas = $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-flag_kelas").val();
                // var kode_status = $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-status").val();
                // var nama_status = $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-nstatus").val();
                
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-kelas").val(kode_kelas);
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-kelas").text(kode_kelas);
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-nkelas").val(nama);
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-nkelas").text(nama);
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-flag_kelas").val(flag_kelas);
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-flag_kelas").text(flag_kelas);
                
                // $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-status").val(kode_status);
                // $('#input-status > tbody > tr:eq('+index+') > td').find(".td-status").text(kode_status);
                // $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-nstatus").val(nama_status);
                // $('#input-status > tbody > tr:eq('+index+') > td').find(".td-nstatus").text(nama_status);
                
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-kelas").hide();
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-kelas").show();
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".search-kelas").hide();
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-nkelas").hide();
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-nkelas").show();
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-flag_kelas").hide();
                $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-flag_kelas").show();
                
                // $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-status").hide();
                // $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-status").show();
                // $('#input-kelas > tbody > tr:eq('+index+') > td').find(".search-status").hide();
                // $('#input-kelas > tbody > tr:eq('+index+') > td').find(".inp-nstatus").hide();
                // $('#input-kelas > tbody > tr:eq('+index+') > td').find(".td-nstatus").show();
            }
        })
    }

    $('#input-kelas').on('keydown','.inp-kelas, .inp-nkelas, .inp-flag_kelas',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kelas','.inp-nkelas','.inp-flag_kelas'];
        var nxt2 = ['.td-kelas','.td-nkelas','.td-flag_kelas'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-kelas").text();
                    var kode = $(this).val();
                    var target1 = "kelaske"+noidx;
                    var target2 = "nkelaske"+noidx;
                    getKelas(kode,target1,target2,null,'tab');                    
                break;
                // case 1:
                //     $("#input-kelas td").removeClass("px-0 py-0 aktif");
                //     $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                //     $(this).closest('tr').find(nxt[idx]).val(isi);
                //     $(this).closest('tr').find(nxt2[idx]).text(isi);
                //     $(this).closest('tr').find(nxt[idx]).hide();
                //     $(this).closest('tr').find(nxt2[idx]).show();
                //     $(this).closest('tr').find(nxt[idx_next]).show();
                //     $(this).closest('tr').find('.search-status').show();
                //     $(this).closest('tr').find(nxt2[idx_next]).hide();
                //     $(this).closest('tr').find(nxt[idx_next]).focus();                        
                // break;
                // case 2:
                //     var noidx = $(this).parents("tr").find(".no-kelas").text();
                //     var kode = $(this).val();
                //     var target1 = "statuske"+noidx;
                //     var target2 = "nstatuske"+noidx;
                //     getStatus(kode,target1,target2,null,'tab');  
                // break;
                case 1:
                    $("#input-kelas td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();  

                break;
                case 2:
                    $("#input-kelas td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();

                    var cek = $(this).parents('tr').next('tr').find('.td-kelas');
                    if(cek.length > 0){
                        cek.click();
                    }else{
                        $('.add-row').click();
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
        var no=$('#input-kelas .row-kelas:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-kelas'>";
        input += "<td class='no-kelas text-center'>"+no+"</td>";
        input += "<td><span class='td-kelas tdkelaske"+no+" tooltip-span'></span><input type='text' name='kode_kelas[]' class='form-control inp-kelas kelaske"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='kelaskode"+no+"'><a href='#' class='search-item search-kelas hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nkelas tdnkelaske"+no+"'></span><input type='text' name='nama_kelas[]' class='form-control inp-nkelas nkelaske"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-flag_kelas tdflag_kelaske"+no+"'></span><input type='text' name='flag_kelas[]' class='form-control inp-flag_kelas flag_kelaske"+no+" hidden'  value='' readonly></td>";
        // input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'></span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        // input += "<td><span class='td-nstatus tdnstatuske"+no+"'></span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-kelas tbody').append(input);

        hitungTotalRow();
        hideUnselectedRow();

        $('#input-kelas td').removeClass('px-0 py-0 aktif');
        $('#input-kelas tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-kelas tbody tr:last').find(".inp-kelas").show();
        $('#input-kelas tbody tr:last').find(".td-kelas").hide();
        $('#input-kelas tbody tr:last').find(".search-kelas").show();
        $('#input-kelas tbody tr:last').find(".inp-kelas").focus();
    });

    $('#input-kelas').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-kelas').each(function(){
            var nom = $(this).closest('tr').find('.no-kelas');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-kelas tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-kelas tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-kelas').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-kelas td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_kelas = $(this).parents("tr").find(".inp-kelas").val();
                var nama_kelas = $(this).parents("tr").find(".inp-nkelas").val();
                var flag_kelas = $(this).parents("tr").find(".inp-flag_kelas").val();
                // var kode_status = $(this).parents("tr").find(".inp-status").val();
                // var nama_status = $(this).parents("tr").find(".inp-nstatus").val();
                var no = $(this).parents("tr").find(".no-guru").text();
                $(this).parents("tr").find(".inp-kelas").val(kode_kelas);
                $(this).parents("tr").find(".td-kelas").text(kode_kelas);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kelas").show();
                    $(this).parents("tr").find(".td-kelas").hide();
                    $(this).parents("tr").find(".search-kelas").show();
                    $(this).parents("tr").find(".inp-kelas").focus();
                }else{
                    $(this).parents("tr").find(".inp-kelas").hide();
                    $(this).parents("tr").find(".td-kelas").show();
                    $(this).parents("tr").find(".search-kelas").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nkelas").val(nama_kelas);
                $(this).parents("tr").find(".td-nkelas").text(nama_kelas);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nkelas").show();
                    $(this).parents("tr").find(".td-nkelas").hide();
                    $(this).parents("tr").find(".inp-nkelas").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nkelas").hide();
                    $(this).parents("tr").find(".td-nkelas").show();
                }

                $(this).parents("tr").find(".inp-flag_kelas").val(flag_kelas);
                $(this).parents("tr").find(".td-flag_kelas").text(flag_kelas);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-flag_kelas").show();
                    $(this).parents("tr").find(".td-flag_kelas").hide();
                    $(this).parents("tr").find(".inp-flag_kelas").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-flag_kelas").hide();
                    $(this).parents("tr").find(".td-flag_kelas").show();
                }
        
                // $(this).parents("tr").find(".inp-status").val(kode_status);
                // $(this).parents("tr").find(".td-status").text(kode_status);
                // if(idx == 3){
                //     $(this).parents("tr").find(".inp-status").show();
                //     $(this).parents("tr").find(".td-status").hide();
                //     $(this).parents("tr").find(".search-status").show();
                //     $(this).parents("tr").find(".inp-status").focus();
                // }else{
                    
                //     $(this).parents("tr").find(".inp-status").hide();
                //     $(this).parents("tr").find(".td-status").show();
                //     $(this).parents("tr").find(".search-status").hide();
                // }
        
                
                // $(this).parents("tr").find(".inp-nstatus").val(nama_status);
                // $(this).parents("tr").find(".td-nstatus").text(nama_status);
                // if(idx == 4){
                    
                //     $(this).parents("tr").find(".inp-nstatus").show();
                //     $(this).parents("tr").find(".td-nstatus").hide();
                //     $(this).parents("tr").find(".inp-nstatus").focus();
                // }else{
                    
                //     $(this).parents("tr").find(".inp-nstatus").hide();
                //     $(this).parents("tr").find(".td-nstatus").show();
                // }
            }
        }
    });

    $('#input-kelas').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_kelas[]': 
                var par2 = "nama_kelas[]";

            break;
            case 'kode_status[]': 
                var par2 = "nama_status[]";
            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        console.log(tmp);
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        showFilter(par,target1,target2);
    });

    $('#input-kelas').on('change', '.inp-kelas', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-kelas').html();
        target1 = "kelaske"+noidx;
        target2 = "nkelaske"+noidx;
        if($.trim($(this).closest('tr').find('.inp-kelas').val()).length){
            var kode = $(this).val();
            getKelas(kode,target1,target2,'change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Kelas yang dimasukkan tidak valid');
            return false;
        }
    });

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            var kode_kelas = $('#input-kelas tbody tr.selected-row').find(".inp-kelas").val();
            var nama_kelas = $('#input-kelas tbody tr.selected-row').find(".inp-nkelas").val();
            var flag_kelas = $('#input-kelas tbody tr.selected-row').find(".inp-flag_kelas").val();
            // var kode_status = $('#input-kelas tbody tr.selected-row').find(".inp-status").val();
            // var nama_status = $('#input-kelas tbody tr.selected-row').find(".inp-nstatus").val();
            var no=$('#input-kelas .row-kelas:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-kelas'>";
            input += "<td class='no-kelas text-center'>"+no+"</td>";
            input += "<td><span class='td-kelas tdkelaske"+no+" tooltip-span'>"+kode_kelas+"</span><input type='text' name='kode_kelas[]' class='form-control inp-kelas kelaske"+no+" hidden' value='"+kode_kelas+"' required='' style='z-index: 1;position: relative;'  id='kelaskode"+no+"'><a href='#' class='search-item search-kelas hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nkelas tdnkelaske"+no+"'>"+nama_kelas+"</span><input type='text' name='nama_kelas[]' class='form-control inp-nkelas nkelaske"+no+" hidden'  value='"+nama_kelas+"' readonly></td>";
            input += "<td><span class='td-flag_kelas tdflag_kelaske"+no+"'>"+flag_kelas+"</span><input type='text' name='flag_kelas[]' class='form-control inp-flag_kelas flag_kelaske"+no+" hidden'  value='"+flag_kelas+"' readonly></td>";
            // input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'>"+kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+kode_status+"' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
            // input += "<td><span class='td-nstatus tdnstatuske"+no+"'>"+nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='"+nama_status+"' readonly></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-kelas tbody').append(input);
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }
    });

    // END GRID

    // BUTTON SIMPAN
    
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_pp:{
                required: true,
                maxlength:10  
            },
            nik_guru:
            {
                required: true
            },
            flag_aktif:
            {
                required: true,
                maxlength:1
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#nik_guru').val();
            
            if(parameter == "edit"){
                var url = "{{ url('sekolah-master/guru-multi-kelas') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('sekolah-master/guru-multi-kelas') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }
            
            var formData = new FormData(form);
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
                        $('#btn-tampil').click();    
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Guru Multi Kelas');
                        $('#input-kelas tbody').html('');
                        $('#method').val('post');
                        $('.input-group-prepend').addClass('hidden');
                        $('span[class^=info-name]').addClass('hidden');
                        $('.info-icon-hapus').addClass('hidden');
                        $('[class*=input-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
                        if("{{ Session::get('kodePP') }}" != ""){
                            $('#kode_pp').val("{{ Session::get('kodePP') }}");
                            $('#kode_pp').trigger('change');
                        }
                        msgDialog({
                            id:result.data.nik_guru,
                            type:'simpan'
                        });
                        last_add("nik_guru",result.data.nik_guru);
                        
                        
                    }else if(!result.data.status && result.data.message == "Unauthorized"){
                        window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    }else{
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
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    // BUTTON DELETE
    function hapusData(param){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sekolah-master/guru-multi-kelas') }}",
            dataType: 'json',
            data: param,
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload(); 
                    $('#btn-tampil').click();                       
                    showNotification("top", "center", "success",'Hapus Data','Data Guru Multi Kelas ('+param.nik_guru+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
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
        var kode = $(this).closest('tr').find('td').eq(0).html();
        var tmp = $(this).closest('tr').find('td').eq(2).html().split("-");
        var kode_pp = tmp[0];
        var tmp2 = $(this).closest('tr').find('td').eq(3).html().split("-");
        var matpel = tmp2[0];
        msgDialog({
            id: kode,
            param:{nik_guru:kode,kode_pp:kode_pp,kode_matpel:matpel},
            type:'hapus'
        });
    });
    
    // END DELETE

    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        $('#form-tambah').validate().resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Guru Multi Kelas');
        var id= $(this).closest('tr').find('td').eq(0).html(); 
        var tmp = $(this).closest('tr').find('td').eq(2).html().split("-");
        var kode_pp = tmp[0];
        var tmp2 = $(this).closest('tr').find('td').eq(3).html().split("-");
        var kode_matpel = tmp2[0];
        var kode_ta = $(this).closest('tr').find('td').eq(6).html(); 
        
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/guru-multi-kelas-detail') }}",
            dataType: 'json',
            data:{nik_guru: id, kode_pp:kode_pp, kode_matpel:kode_matpel,kode_ta:kode_ta},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#nik_guru').val(id);
                    $('#nik_guru').attr('readonly', true);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#kode_matpel').val(result.data[0].kode_matpel);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    var input = "";
                    $('#input-kelas tbody').html('');
                    if(result.data_detail.length > 0){
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line = result.data_detail[i];
                            input += "<tr class='row-kelas'>";
                            input += "<td class='no-kelas text-center'>"+no+"</td>";
                            input += "<td><span class='td-kelas tdkelaske"+no+" tooltip-span'>"+line.kode_kelas+"</span><input type='text' name='kode_kelas[]' class='form-control inp-kelas kelaske"+no+" hidden' value='"+line.kode_kelas+"' required='' style='z-index: 1;position: relative;'  id='kelaskode"+no+"'><a href='#' class='search-item search-kelas hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nkelas tdnkelaske"+no+"'>"+line.nama_kelas+"</span><input type='text' name='nama_kelas[]' class='form-control inp-nkelas nkelaske"+no+" hidden'  value='"+line.nama_kelas+"' readonly></td>";
                            input += "<td><span class='td-flag_kelas tdflag_kelaske"+no+"'>"+line.flag_kelas+"</span><input type='text' name='flag_kelas[]' class='form-control inp-flag_kelas flag_kelaske"+no+" hidden'  value='"+line.flag_kelas+"' readonly></td>";
                            // input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'>"+line.kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+line.kode_status+"' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            // input += "<td><span class='td-nstatus tdnstatuske"+no+"'>"+line.nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='"+line.nama_status+"' readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-kelas tbody').append(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                    }
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    showInfoField('kode_pp',result.data[0].kode_pp,result.data[0].nama_pp);
                    showInfoField('kode_ta',result.data[0].kode_ta,result.data[0].nama_ta);
                    showInfoField('nik_guru',result.data[0].nik_guru,result.data[0].nama_guru);
                    showInfoField('kode_matpel',result.data[0].kode_matpel,result.data[0].nama_matpel);
                    
                    hitungTotalRow();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    });
    // END EDIT

     // PREVIEW saat klik di list data

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 7){
            
            var id = $(this).closest('tr').find('td').eq(0).html();
            var tmp = $(this).closest('tr').find('td').eq(2).html().split("-");
            var kode_pp = tmp[0];
            var tmp2 = $(this).closest('tr').find('td').eq(3).html().split("-");
            var kode_matpel = tmp2[0];
            var kode_ta = $(this).closest('tr').find('td').eq(6).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-master/guru-multi-kelas-detail') }}",
                dataType: 'json',
                data:{nik_guru: id, kode_pp:kode_pp, kode_matpel:kode_matpel,kode_ta:kode_ta},
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        var line = result.data[0];
                        var html = `
                        <tr>
                            <td>PP</td>
                            <td>`+line.kode_pp+` - `+line.nama_pp+`</td>
                        </tr>
                        <tr>
                            <td>NIK Guru</td>
                            <td>`+line.nik_guru+` - `+line.nama_guru+`</td>
                        </tr>
                        <tr>
                        <td>Status</td>
                            <td>`+line.flag_aktif+` - `+line.nama_status+`</td>
                        </tr>
                        <tr>
                            <td>Kode TA</td>
                            <td>`+line.kode_ta+` - `+line.nama_ta+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-param-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode Kelas</th>
                                            <th style="width:77%">Nama Kelas</th>
                                            <th style="width:17%">Jenis Kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        `;
                        $('#table-preview tbody').html(html);
                        var det = ``;
                        if(result.data_detail.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.data_detail.length;i++){
                                var line2 =result.data_detail[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td >"+line2.kode_kelas+"</td>";
                                input += "<td >"+line2.nama_kelas+"</td>";
                                input += "<td >"+line2.flag_kelas+"</td>";
                                // input += "<td >"+line2.kode_status+"</td>";
                                // input += "<td >"+line2.nama_status+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-param-preview tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview-kode').text(line.kode_pp);
                        $('#modal-preview-ref').text(line.kode_matpel);
                        $('#modal-preview-ref2').text(line.kode_ta);
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
        var kode = $('#modal-preview-kode').text();
        var matpel = $('#modal-preview-ref').text();
        var kode_ta = $('#modal-preview-ref2').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            param:{nik_guru:id,kode_pp:kode,kode_matpel:matpel,kode_ta:kode_ta},
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        $('#form-tambah').validate().resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Guru Multi Kelas');
        var id= $('#modal-preview-id').text(); 
        var kode_pp = $('#modal-preview-kode').text();
        var kode_matpel = $('#modal-preview-ref').text();
        var kode_ta = $('#modal-preview-ref2').text();
        
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/guru-multi-kelas-detail') }}",
            dataType: 'json',
            data:{nik_guru: id, kode_pp:kode_pp, kode_matpel:kode_matpel,kode_ta:kode_ta},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#nik_guru').val(id);
                    $('#nik_guru').attr('readonly', true);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    var input = "";
                    $('#input-kelas tbody').html('');
                    if(result.data_detail.length > 0){
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line = result.data_detail[i];
                            input += "<tr class='row-kelas'>";
                            input += "<td class='no-kelas text-center'>"+no+"</td>";
                            input += "<td><span class='td-kelas tdkelaske"+no+" tooltip-span'>"+line.kode_kelas+"</span><input type='text' name='kode_kelas[]' class='form-control inp-kelas kelaske"+no+" hidden' value='"+line.kode_kelas+"' required='' style='z-index: 1;position: relative;'  id='kelaskode"+no+"'><a href='#' class='search-item search-kelas hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nkelas tdnkelaske"+no+"'>"+line.nama_kelas+"</span><input type='text' name='nama_kelas[]' class='form-control inp-nkelas nkelaske"+no+" hidden'  value='"+line.nama_kelas+"' readonly></td>";
                            input += "<td><span class='td-flag_kelas tdflag_kelaske"+no+"'>"+line.flag_kelas+"</span><input type='text' name='flag_kelas[]' class='form-control inp-flag_kelas flag_kelaske"+no+" hidden'  value='"+line.flag_kelas+"' readonly></td>";
                            // input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'>"+line.kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+line.kode_status+"' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            // input += "<td><span class='td-nstatus tdnstatuske"+no+"'>"+line.nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='"+line.nama_status+"' readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-kelas tbody').append(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                    }
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    showInfoField('kode_pp',result.data[0].kode_pp,result.data[0].nama_pp);
                    showInfoField('kode_ta',result.data[0].kode_ta,result.data[0].nama_ta);
                    showInfoField('nik_guru',result.data[0].nik_guru,result.data[0].nama_guru);
                    showInfoField('kode_matpel',result.data[0].kode_matpel,result.data[0].nama_matpel);
                    hitungTotalRow();
                    $('#modal-preview').modal('hide');
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
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });
    // END PREVIEW

    // HANDLER untuk enter dan tab
    $('#kode_pp,#kode_ta,#nik_guru,#kode_matpel,#flag_aktif').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','kode_ta','nik_guru','kode_matpel','flag_aktif'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    // END

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });
    
    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var kode_pp = $('#inp-filter_kode_pp').val();
                var status = $('#inp-filter_status').val();
                var col_kode_pp = data[2];
                var col_status = data[5];
                if(kode_pp != "" && status != ""){
                    if(kode_pp == col_kode_pp && status == col_status){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_pp !="" && status == "") {
                    if(kode_pp == col_kode_pp){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_pp == "" && status != ""){
                    if(status == col_status){
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

    $("[name^=inp-filter]").change(function(){
        jumFilter();
    });

    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_kode_pp')[0].selectize.setValue('');
        $('#inp-filter_status')[0].selectize.setValue('');
        jumFilter()
        
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