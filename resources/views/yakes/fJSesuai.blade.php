    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
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
    </style>
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Jurnal</h5>
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
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData">
                            <div class="input-group-append">
                                <span class="input-group-text" id="filter-btn"><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                    <div class="table-responsive ">
                        <table id="table-data" class="" style='width:100%'>
                            <thead>
                                <tr>
                                    <th style="width:15%">No Bukti</th>
                                    <th style="width:10%">Tanggal</th>
                                    <th style="width:15%">No Dokumen</th>
                                    <th style="width:35%">Deskripsi</th>
                                    <th style="width:15%">Nilai</th>
                                    <th style="width:10%" class="text-center">Action</th>
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
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal" class="col-md-2 col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-md-3 col-sm-9">
                                <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                <i style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                            </div>
                            <div class="col-md-2 col-sm-9">
                            </div>
                            <label for="jenis" class="col-md-2 col-sm-2 col-form-label">Jenis</label>
                            <div class="col-md-3 col-sm-9">
                                <select class='form-control selectize' id="jenis" name="jenis">
                                <option value=''>--- Pilih Jenis ---</option>
                                <option value='MI' selected>MI</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-9" style="display:none">
                                <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_dokumen" class="col-md-2 col-sm-2 col-form-label">No Dokumen</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="No Dokumen" id="no_dokumen" name="no_dokumen" required>
                            </div>
                            <div class="col-md-2 col-sm-9">
                            </div>
                            <label for="total_debet" class="col-md-2 col-sm-2 col-form-label">Total Debet</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control currency" type="text" placeholder="Total Debet" readonly id="total_debet" name="total_debet" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-2 col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Deskripsi" id="deskripsi" name="deskripsi" required>
                            </div>
                            <div class="col-md-2 col-sm-9">
                            </div>
                            <label for="total_kredit" class="col-md-2 col-sm-2 col-form-label">Total Kredit</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total_kredit" name="total_kredit" value="0">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nik_periksa" class="col-md-2 col-sm-2 col-form-label">NIK Periksa</label>
                            <div class="col-md-3 col-sm-9" >
                                <input class="form-control" type="text"  id="nik_periksa" name="nik_periksa" required>
                                <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>
                            <div class="col-md-2 col-sm-9 px-0" >
                                <input id="label_nik_periksa" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-jurnal" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Jurnal</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-jurnal" role="tabpanel">

                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-1" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                    
                                    <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Import Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="{{ config('api.url').'toko-auth/storage/template_upload_jurnal_esaku.xlsx' }}" target='_blank' id="download-template" >Download Template</a>
                                            <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                        </div>
                                    </div>
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <style>
                                        th{
                                            vertical-align:middle !important;
                                        }
                                        /* #input-grid td{
                                            padding:0 !important;
                                        } */
                                        #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid .custom-file-label
                                        {
                                            border:1px solid black !important;
                                            border-radius:0 !important;
                                        }

                                        #input-grid .selectize-input
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
                                        #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover
                                        {
                                            /* background: var(--theme-color-6) !important;
                                            color:white; */
                                            background:#f8f8f8;
                                            color:black;
                                        }
                                        #input-grid input:hover,
                                        #input-grid .selectize-input:hover,
                                        {
                                            width:inherit;
                                        }
                                        #input-grid ul.typeahead.dropdown-menu
                                        {
                                            width:max-content !important;
                                        }
                                        #input-grid td
                                        {
                                            overflow:hidden !important;
                                            height:37.2px !important;
                                            padding:0px !important;
                                        }

                                        #input-grid span
                                        {
                                            padding:0px 10px !important;
                                        }

                                        #input-grid input,#input-grid .selectize-input
                                        {
                                            overflow:hidden !important;
                                            height:35px !important;
                                        }


                                        #input-grid td:nth-child(4)
                                        {
                                            overflow:unset !important;
                                        }
                                    </style>
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:13%">Kode Akun</th>
                                            <th style="width:15%">Nama Akun</th>
                                            <th style="width:5%">DC</th>
                                            <th style="width:20%">Keterangan</th>
                                            <th style="width:15%">Nilai</th>
                                            <th style="width:7">Kode PP</th>
                                            <th style="width:17">Nama PP</th>
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
    </form>
    <!-- FORM INPUT  -->

    <!-- MODAL SEARCH AKUN-->
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
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Vendor <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span> </h6>
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
    <!-- END MODAL UPLOAD  -->

    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>

    <script type="text/javascript">
    // DEFAULT SETTING //
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);
    
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $dtPP = [];
    var $dtAkun = [];
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    // END DEFAULT SETTING //

    // FORM SETTINGS//
    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    $('.selectize').selectize();
    // END FORM SETTINGS //

    // FUNCTION HELPERS //
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
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotal(){
        var total_d = 0;
        var total_k = 0;

        $('.row-jurnal').each(function(){
            var dc = $(this).closest('tr').find('.td-dc').text();
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            if(dc == "D"){
                total_d += +toNilai(nilai);
            }else{
                total_k += +toNilai(nilai);
            }
        });

        $('#total_debet').val(total_d);
        $('#total_kredit').val(total_k);   
    }

    function createPeriode(tanggal) {
        var split = tanggal.split('/');
        return split[0];
    }
    // END FUNCTION HELPERS //

    // FUNCTION GET DATA //
    function getTanggalServer(){
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/helper-tanggal') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                console.log(result)
            }
        });
    }

    function generateBukti(){
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/helper-bukti') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                console.log(result)
            }
        });
    }

    function getDataPP() {
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/helper-pp') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                console.log(result)
            }
        });
    }

    function getDataFS() {
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/fs') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                console.log(result)
            }
        });
    }

    function getDataAkun() {
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/helper-akun') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                console.log(result)
            }
        });
    }
    // END FUNCTION GET DATA //

    // DATATABLE FUNCTION //
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('yakes-trans/jurnal-sesuai') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    // window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    return [];
                }
            }
        },
        'columnDefs': [
            {   'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 5, data: null, 'defaultContent': action_html, 'className': 'text-center' }
            ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai' }
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
    // END DATATABLE FUNCTION //
    </script>