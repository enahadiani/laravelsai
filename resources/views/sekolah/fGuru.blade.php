    <!-- STYLE TAMBAHAN -->
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
        /* #input-matpel td{
            padding:0 !important;
        } */
        #input-matpel .selectize-input.focus, #input-matpel input.form-control, #input-matpel .custom-file-label
        {
            border:1px solid black !important;
            border-radius:0 !important;
        }

        #input-matpel .selectize-input
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
        #input-matpel td:not(:nth-child(1)):not(:nth-child(9)):hover
        {
            /* background: var(--theme-color-6) !important;
            color:white; */
            background:#f8f8f8;
            color:black;
        }
        #input-matpel input:hover,
        #input-matpel .selectize-input:hover,
        {
            width:inherit;
        }
        #input-matpel ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }
        #input-matpel td
        {
            /* overflow:hidden !important; */
            height:37.2px !important;
            padding:0px !important;
        }

        #input-matpel span
        {
            padding:0px 10px !important;
        }
    </style>
    <!-- END STYLE -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Guru Mata Pelajaran</h5>
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
                <div class="card-body" style="min-height: 560px !important;padding-top:0;">                    
                    <div class="table-responsive ">
                        <table id="table-data" style='width:100%'>                                    
                            <thead>
                                <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kode PP</th>
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
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_pp" class="col-md-2 col-sm-12 col-form-label">Kode PP</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_pp" name="kode_pp" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_pp" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nik_guru" class="col-md-2 col-sm-12 col-form-label">NIK Guru</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="nik_guru" name="nik_guru" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_nik_guru" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="flag_aktif" class="col-md-2 col-sm-12 col-form-label">Status</label>
                            <div class="col-md-3 col-sm-12">
                                <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                    <option value='' disabled>--- Pilih Status Aktif ---</option>
                                    <option value='1'>Aktif</option>
                                    <option value='0'>Non Aktif</option>
                                </select>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-matpel" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Matpel</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0 mb-2">
                            <div class="tab-pane active" id="data-matpel" role="tabpanel">
                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;width:1200px !important;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-matpel" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:3%">No</th>
                                                <th style="width:10%">Kode Matpel</th>
                                                <th style="width:20%">Nama Matpel</th>
                                                <th style="width:10%">Kode Status</th>
                                                <th style="width:17%">Nama Status</th>
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
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Siswa <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
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
        var total_row = $('#input-matpel tbody tr').length;
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

    $('.selectize').selectize();
    $('[data-toggle="tooltip"]').tooltip(); 

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = $('#table-data').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        "ordering": true,
        "order": [[3, "desc"]],
        'ajax': {
            'url': "{{url('sekolah-master/guru-matpel')}}",
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
                "targets": [3],
                "visible": false,
                "searchable": false
            },
            {'targets': 4, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'pp' },
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
        $('#judul-form').html('Tambah Data Guru Mata Pelajaran');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        if("{{ Session::get('kodePP') }}" != ""){
            $('#kode_pp').val("{{ Session::get('kodePP') }}");
            $('#kode_pp').trigger('change');
        }
        $('#input-matpel tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
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

    // CBBL
    function showFilter(param,target1,target2){
        var par = param;
        
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        var parameter = {'param':par};
        
        switch(par){
            case 'kode_matpel[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sekolah-master/matpel') }}";
                var columns = [
                    { data: 'kode_matpel' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Mata Pelajaran";
                var pilih = "parameter";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target2 = "."+$target2;
                $target3 = "";
                $target4 = ".td-status";
                parameter = {'kode_pp':$('#kode_pp').val()};
            break;
            case 'kode_status[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sekolah-master/status-guru') }}";
                var columns = [
                    { data: 'kode_status' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Status";
                var pilih = "parameter";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                $target4 = "";
                parameter = {'kode_pp':$('#kode_pp').val()};
            break;
            case 'kode_pp': 
                header = ['Kode PP', 'Nama'];
                var toUrl = "{{ url('sekolah-master/pp') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
                var jTarget1 = "val";
                var pilih = "pp";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target3 = ".td"+$target2;
                $target2 = "#"+$target2;
                $target3 = "";
                $target4 = "";
            break;
            case 'nik_guru': 
                header = ['NIK', 'Nama'];
                var toUrl = "{{ url('sekolah-master/guru-nik') }}";
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Guru";
                var jTarget1 = "val";
                var pilih = "nik";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target3 = ".td"+$target2;
                $target2 = "#"+$target2;
                $target4 = "";
                parameter = {'kode_pp':$('#kode_pp').val(),'flag_aktif':1};
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
                    $($target).text(kode);
                }
                
                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }
                
                if($target3 != ""){
                    $($target3).click();
                }
                
                if($target4 != ""){
                    if(par == "kode_matpel[]"){
                        $($target).closest('tr').find($target4).click();
                        setTimeout(function() {  $($target).parents("tr").find(".inp-status").focus(); }, 50);
                    }
                    else{
                        $($target4).click();
                    }
                }
                $('#modal-search').modal('hide');
            }
        });
    }
    
    function getPP(id){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/pp') }}",
            dataType: 'json',
            data:{kode_pp : kode},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        $('#kode_pp').val(result.daftar[0].kode_pp);
                        $('#label_kode_pp').val(result.daftar[0].nama);
                    }else{
                        $('#kode_pp').val('');
                        $('#label_kode_pp').val('');
                        $('#kode_pp').focus();
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
                        $('#nik_guru').val(result.data[0].nik_guru);
                        $('#label_nik_guru').val(result.data[0].nama);
                    }else{
                        $('#nik_guru').val('');
                        $('#label_nik_guru').val('');
                        $('#nik_guru').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
            }
        });
    }
    
    function getMatpel(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        var kode = tmp[0];
        var kode_pp = $('#kode_pp').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/matpel') }}",
            dataType: 'json',
            data:{kode_matpel:kode,kode_pp:kode_pp},
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
                            
                            $("#input-matpel td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");
                            
                            $('.'+target1).closest('tr').find('.search-matpel').hide();
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
                            
                            $("#input-matpel td").removeClass("px-0 py-0 aktif");
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
    });
    
    $('#form-tambah').on('change', '#nik_guru', function(){
        var par = $(this).val();
        var pp = $('#kode_pp').val();
        getNIKGuru(par,pp);
    });
    
    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('input').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });
    
    // END CBBL
    function hideUnselectedRow() {
        $('#input-matpel > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                
                var kode_matpel = $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-matpel").val();
                var nama = $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-nmatpel").val();
                var kode_status = $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-status").val();
                var nama_status = $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-nstatus").val();
                
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-matpel").val(kode_matpel);
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".td-matpel").text(kode_matpel);
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-nmatpel").val(nama);
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".td-nmatpel").text(nama);
                
                $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-status").val(kode_status);
                $('#input-status > tbody > tr:eq('+index+') > td').find(".td-status").text(kode_status);
                $('#input-status > tbody > tr:eq('+index+') > td').find(".inp-nstatus").val(nama_status);
                $('#input-status > tbody > tr:eq('+index+') > td').find(".td-nstatus").text(nama_status);
                
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-matpel").hide();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".td-matpel").show();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".search-matpel").hide();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-nmatpel").hide();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".td-nmatpel").show();
                
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-status").hide();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".td-status").show();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".search-status").hide();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".inp-nstatus").hide();
                $('#input-matpel > tbody > tr:eq('+index+') > td').find(".td-nstatus").show();
            }
        })
    }

    $('#input-matpel').on('keydown','.inp-matpel, .inp-nmatpel, .inp-status,.inp-nstatus',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-matpel','.inp-nmatpel','.inp-status','.inp-nstatus'];
        var nxt2 = ['.td-matpel','.td-nmatpel','.td-status','.td-nstatus'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-matpel").text();
                    var kode = $(this).val();
                    var target1 = "matpelke"+noidx;
                    var target2 = "nmatpelke"+noidx;
                    getMatpel(kode,target1,target2,null,'tab');                    
                break;
                case 1:
                    $("#input-matpel td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find('.search-status').show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();                        
                break;
                case 2:
                    var noidx = $(this).parents("tr").find(".no-matpel").text();
                    var kode = $(this).val();
                    var target1 = "statuske"+noidx;
                    var target2 = "nstatuske"+noidx;
                    getStatus(kode,target1,target2,null,'tab');  
                break;
                case 3:
                    $("#input-matpel td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();

                    var cek = $(this).parents('tr').next('tr').find('.td-matpel');
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
        var no=$('#input-matpel .row-matpel:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-matpel'>";
        input += "<td class='no-matpel text-center'>"+no+"</td>";
        input += "<td><span class='td-matpel tdmatpelke"+no+" tooltip-span'></span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='matpelkode"+no+"'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nmatpel tdnmatpelke"+no+"'></span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmatpelke"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'></span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nstatus tdnstatuske"+no+"'></span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-matpel tbody').append(input);
        hitungTotalRow();
        hideUnselectedRow();
        $('#input-matpel td').removeClass('px-0 py-0 aktif');
        $('#input-matpel tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-matpel tbody tr:last').find(".inp-matpel").show();
        $('#input-matpel tbody tr:last').find(".td-matpel").hide();
        $('#input-matpel tbody tr:last').find(".search-matpel").show();
        $('#input-matpel tbody tr:last').find(".inp-matpel").focus();
    });

    $('#input-matpel').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-matpel').each(function(){
            var nom = $(this).closest('tr').find('.no-matpel');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-matpel tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-matpel tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-matpel').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-matpel td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_matpel = $(this).parents("tr").find(".inp-matpel").val();
                var nama_matpel = $(this).parents("tr").find(".inp-nmatpel").val();
                var kode_status = $(this).parents("tr").find(".inp-status").val();
                var nama_status = $(this).parents("tr").find(".inp-nstatus").val();
                var no = $(this).parents("tr").find(".no-guru").text();
                $(this).parents("tr").find(".inp-matpel").val(kode_matpel);
                $(this).parents("tr").find(".td-matpel").text(kode_matpel);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-matpel").show();
                    $(this).parents("tr").find(".td-matpel").hide();
                    $(this).parents("tr").find(".search-matpel").show();
                    $(this).parents("tr").find(".inp-matpel").focus();
                }else{
                    $(this).parents("tr").find(".inp-matpel").hide();
                    $(this).parents("tr").find(".td-matpel").show();
                    $(this).parents("tr").find(".search-matpel").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nmatpel").val(nama_matpel);
                $(this).parents("tr").find(".td-nmatpel").text(nama_matpel);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nmatpel").show();
                    $(this).parents("tr").find(".td-nmatpel").hide();
                    $(this).parents("tr").find(".inp-nmatpel").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nmatpel").hide();
                    $(this).parents("tr").find(".td-nmatpel").show();
                }
        
                $(this).parents("tr").find(".inp-status").val(kode_status);
                $(this).parents("tr").find(".td-status").text(kode_status);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-status").show();
                    $(this).parents("tr").find(".td-status").hide();
                    $(this).parents("tr").find(".search-status").show();
                    $(this).parents("tr").find(".inp-status").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-status").hide();
                    $(this).parents("tr").find(".td-status").show();
                    $(this).parents("tr").find(".search-status").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nstatus").val(nama_status);
                $(this).parents("tr").find(".td-nstatus").text(nama_status);
                if(idx == 4){
                    
                    $(this).parents("tr").find(".inp-nstatus").show();
                    $(this).parents("tr").find(".td-nstatus").hide();
                    $(this).parents("tr").find(".inp-nstatus").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nstatus").hide();
                    $(this).parents("tr").find(".td-nstatus").show();
                }
            }
        }
    });

    $('#input-matpel').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_matpel[]': 
                var par2 = "nama_matpel[]";

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

    $('#input-matpel').on('change', '.inp-matpel', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-matpel').html();
        target1 = "matpelke"+noidx;
        target2 = "nmatpelke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-matpel').val()).length){
            var kode = $(this).val();
            getMatpel(kode,target1,target2,'change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Matpel yang dimasukkan tidak valid');
            return false;
        }
    });

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            var kode_matpel = $('#input-matpel tbody tr.selected-row').find(".inp-matpel").val();
            var nama_matpel = $('#input-matpel tbody tr.selected-row').find(".inp-nmatpel").val();
            var kode_status = $('#input-matpel tbody tr.selected-row').find(".inp-status").val();
            var nama_status = $('#input-matpel tbody tr.selected-row').find(".inp-nstatus").val();
            var no=$('#input-matpel .row-matpel:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-matpel'>";
            input += "<td class='no-matpel text-center'>"+no+"</td>";
            input += "<td><span class='td-matpel tdmatpelke"+no+" tooltip-span'>"+kode_matpel+"</span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='"+kode_matpel+"' required='' style='z-index: 1;position: relative;'  id='matpelkode"+no+"'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nmatpel tdnmatpelke"+no+"'>"+nama_matpel+"</span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmatpelke"+no+" hidden'  value='"+nama_matpel+"' readonly></td>";
            input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'>"+kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+kode_status+"' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nstatus tdnstatuske"+no+"'>"+nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='"+nama_status+"' readonly></td>";
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-matpel tbody').append(input);
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
                var url = "{{ url('sekolah-master/guru-matpel') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('sekolah-master/guru-matpel') }}";
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
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Guru Mata Pelajaran');
                        $('#input-matpel tbody').html('');
                        $('#method').val('post');
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
    function hapusData(id,kode_pp){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sekolah-master/guru-matpel') }}",
            dataType: 'json',
            data: {nik_guru : id, kode_pp : kode_pp},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Guru Matpel ('+id+') berhasil dihapus ');
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
        msgDialog({
            id: kode,
            kode: kode_pp,
            type:'hapus'
        });
    });
    
    // END DELETE

    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        $('#form-tambah').validate().resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Guru Mata Peljaran');
        var id= $(this).closest('tr').find('td').eq(0).html(); 
        var tmp = $(this).closest('tr').find('td').eq(2).html().split("-");
        var kode_pp = tmp[0];
        
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/guru-matpel-detail') }}",
            dataType: 'json',
            data:{nik_guru: id, kode_pp:kode_pp},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#nik_guru').val(id);
                    $('#nik_guru').attr('readonly', true);
                    $('#label_nik_guru').val(result.data[0].nama_guru);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#label_kode_pp').val(result.data[0].nama_pp);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    var input = "";
                    $('#input-matpel tbody').html('');
                    if(result.data_detail.length > 0){
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line = result.data_detail[i];
                            input += "<tr class='row-matpel'>";
                            input += "<td class='no-matpel text-center'>"+no+"</td>";
                            input += "<td><span class='td-matpel tdmatpelke"+no+" tooltip-span'>"+line.kode_matpel+"</span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='"+line.kode_matpel+"' required='' style='z-index: 1;position: relative;'  id='matpelkode"+no+"'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nmatpel tdnmatpelke"+no+"'>"+line.nama_matpel+"</span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmatpelke"+no+" hidden'  value='"+line.nama_matpel+"' readonly></td>";
                            input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'>"+line.kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+line.kode_status+"' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nstatus tdnstatuske"+no+"'>"+line.nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='"+line.nama_status+"' readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-matpel tbody').append(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                    }
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
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
        if($(this).index() != 3){
            
            var id = $(this).closest('tr').find('td').eq(0).html();
            var tmp = $(this).closest('tr').find('td').eq(2).html().split("-");
            var kode_pp = tmp[0];
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-master/guru-matpel-detail') }}",
                dataType: 'json',
                data:{nik_guru: id, kode_pp:kode_pp},
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
                            <td colspan='2'>
                                <table id='table-param-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode Matpel</th>
                                            <th style="width:22%">Nama Matpel</th>
                                            <th style="width:10%">Kode Status</th>
                                            <th style="width:20%">Nama Status</th>
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
                                input += "<td >"+line2.kode_matpel+"</td>";
                                input += "<td >"+line2.nama_matpel+"</td>";
                                input += "<td >"+line2.kode_status+"</td>";
                                input += "<td >"+line2.nama_status+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-param-preview tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview-kode').text(line.kode_pp);
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
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            kode:kode,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        $('#form-tambah').validate().resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Guru Mata Pelajaran');
        var id= $('#modal-preview-id').text(); 
        var kode_pp = $('#modal-preview-kode').text();
        
        $.ajax({
            type: 'GET',
            url: "{{ url('sekolah-master/guru-matpel-detail') }}",
            dataType: 'json',
            data:{nik_guru: id, kode_pp:kode_pp},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#nik_guru').val(id);
                    $('#nik_guru').attr('readonly', true);
                    $('#label_nik_guru').val(result.data[0].nama_guru);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#label_kode_pp').val(result.data[0].nama_pp);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    var input = "";
                    $('#input-matpel tbody').html('');
                    if(result.data_detail.length > 0){
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line = result.data_detail[i];
                            input += "<tr class='row-matpel'>";
                            input += "<td class='no-matpel text-center'>"+no+"</td>";
                            input += "<td><span class='td-matpel tdmatpelke"+no+" tooltip-span'>"+line.kode_matpel+"</span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='"+line.kode_matpel+"' required='' style='z-index: 1;position: relative;'  id='matpelkode"+no+"'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nmatpel tdnmatpelke"+no+"'>"+line.nama_matpel+"</span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmatpelke"+no+" hidden'  value='"+line.nama_matpel+"' readonly></td>";
                            input += "<td><span class='td-status tdstatuske"+no+" tooltip-span'>"+line.kode_status+"</span><input type='text' name='kode_status[]' class='form-control inp-status statuske"+no+" hidden' value='"+line.kode_status+"' required='' style='z-index: 1;position: relative;'  id='statuskode"+no+"'><a href='#' class='search-item search-status hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nstatus tdnstatuske"+no+"'>"+line.nama_status+"</span><input type='text' name='nama_status[]' class='form-control inp-nstatus nstatuske"+no+" hidden'  value='"+line.nama_status+"' readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-matpel tbody').append(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                    }
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    hitungTotalRow();
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
    $('#kode_pp,#nik_guru,#flag_aktif').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','nik_guru','flag_aktif'];
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

    </script>