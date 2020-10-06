{{-- Referensi folder sekolah form fSiswa --}}
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
        /* #input-param td{
            padding:0 !important;
        } */
        #input-param .selectize-input.focus, #input-param input.form-control, #input-param .custom-file-label
        {
            border:1px solid black !important;
            border-radius:0 !important;
        }

        #input-param .selectize-input
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
        #input-param td:not(:nth-child(1)):not(:nth-child(9)):hover
        {
            /* background: var(--theme-color-6) !important;
            color:white; */
            background:#f8f8f8;
            color:black;
        }
        #input-param input:hover,
        #input-param .selectize-input:hover,
        {
            width:inherit;
        }
        #input-param ul.typeahead.dropdown-menu
        {
            width:max-content !important;
        }
        #input-param td
        {
            /* overflow:hidden !important; */
            height:37.2px !important;
            padding:0px !important;
        }

        #input-param span
        {
            padding:0px 10px !important;
        }

        /* #input-param input,#input-param .selectize-input
        {
            overflow:hidden !important;
            height:35px !important;
        } */

        /* #input-param td:nth-child(4)
        {
            overflow:unset !important;
        } */
    </style>
    <!-- END STYLE -->
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                    <h5 style="position:absolute;top: 25px;">Data Hak Akses</h5>
                    <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;" ><i class="fa fa-plus-circle"></i> Tambah</button>
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
                            <div class="input-group-append" id="filter-btn">
                                <span class="input-group-text"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i>Filter</span>
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
                                    <th>Kode Menu</th>
                                    <th>Kode Lokasi</th>
                                    <th>Status Admin</th>
                                    <th>Aksi</th>
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
    <!-- FORM  -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12" style="height: 90px;">
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
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-md-2 col-sm-12 col-form-label">NIK</label>
                            <div class="col-md-2 col-sm-12" >
                                 <input class="form-control" type="text"  id="nik" name="nik" data-input="cbbl" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_nik" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_klp_menu" class="col-md-2 col-sm-12 col-form-label">Kelompok Menu</label>
                            <div class="col-md-2 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_klp_menu" name="kode_klp_menu" data-input="cbbl" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_klp_menu" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;" readonly/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="status" class="col-md-2 col-sm-12 col-form-label">Status Admin</label>
                            <div class="col-md-3 col-sm-12" >
                                <select class='form-control' id="status" name="status_admin">
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='A'>Admin</option>
                                    <option value='U'>User</option>
                                    <option value='P'>P</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu_mobile" class="col-md-2 col-sm-12 col-form-label">Menu Mobile</label>
                            <div class="col-md-2 col-sm-12" >
                                 <input class="form-control" type="text"  id="menu_mobile" name="menu_mobile" data-input="cbbl" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_menu_mobile" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="path_view" class="col-md-2 col-sm-12 col-form-label">Path View</label>
                            <div class="col-md-2 col-sm-12" >
                                 <input class="form-control" type="text"  id="path_view" name="path_view" data-input="cbbl" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_path_view" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;" readonly/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-sm-12 col-form-label">Password</label>
                            <div class="col-md-5 col-sm-12">
                                <input class="form-control" type="text" placeholder="Password" id="password" name="pass">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="klp_akses" class="col-md-2 col-sm-12 col-form-label">Kelompok Akses</label>
                            <div class="col-md-5 col-sm-12">
                                <input class="form-control" type="text" placeholder="Kelompok Akses" id="klp_akses" name="klp_akses">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_menu_lab" class="col-md-2 col-sm-12 col-form-label">Kode Menu Lab</label>
                            <div class="col-md-5 col-sm-12">
                                <input class="form-control" type="text" placeholder="Kode Menu Lab" id="kode_menu_lab" name="kode_menu_lab">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- END FORM -->
   
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
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Kota <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
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
                            <label>Kode Menu</label>
                            <select class="form-control" data-width="100%" name="inp-filter_menu" id="inp-filter_menu">
                                <option value=''>Pilih Menu</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Status Admin</label>
                            <select class="form-control" data-width="100%" name="inp-filter_status" id="inp-filter_status">
                                <option value=''>Pilih Status</option>
                                <option value='A'>Admin</option>
                                <option value='U'>User</option>
                                <option value='P'>P</option>
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

    
    <!-- MODAL CBBL -->
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
    <!-- END MODAL CBBL -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script type="text/javascript">
    // SET UP FORM //
    var $iconLoad = $('.preloader');
    var selectMenu = $('#inp-filter_menu').selectize();
    var selectStatus = $('#inp-filter_status').selectize();
    var selectStatusForm = $('#status').selectize();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

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
            console.log('last-add');
            setTimeout(function() {
                console.log('timeout');
                $('.selected td:eq(0)').removeClass('last-add');
                dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }
    
    $('.sidepanel').on('click', '#btnClose', function(e){
        e.preventDefault();
        openFilter();
    });

    $('[data-toggle="tooltip"]').tooltip(); 
    // END SET UP FORM //
    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input
    // FUNCTION GET DATA //
    function getMenuFilter() {
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/hakakses_menu') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    var select = selectMenu[0];
                    var control = select.selectize;
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].kode_klp + ' - ' + result.data[i].kode_klp, value:result.data[i].kode_klp}]);
                        }
                    }
                }
            }
        });
    }

    function getNIK(kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/karyawan') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                     if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.nik == kode);
                        if(filter.length > 0) {
                            $('#nik').val(filter[0].nik);
                            $('#label_nik').val(filter[0].nama);
                        } else {
                            $('#nik').val('');
                            $('#label_nik').val('');
                            $('#nik').focus();
                        }
                    }
                }
            }
        });
    }

    function getKlpMenu(kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/hakakses_menu') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_klp == kode);
                        if(filter.length > 0) {
                            $('#kode_klp_menu').val(filter[0].kode_klp);
                            $('#label_kode_klp_menu').val(filter[0].kode_klp);
                        } else {
                            $('#kode_klp_menu').val('');
                            $('#label_kode_klp_menu').val('');
                            $('#kode_klp_menu').focus();
                        }
                    }
                }
            }
        });
    }

    
    function getMenu(kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/form') }}",
            dataType: 'json',
            async:false,
            success:function(res){ 
                var result = res.data;   
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_form == kode);
                        if(filter.length > 0) {
                            $('#menu_mobile').val(filter[0].kode_form);
                            $('#label_menu_mobile').val(filter[0].nama_form);
                        } else {
                            $('#menu_mobile').val('');
                            $('#label_menu_mobile').val('');
                            $('#menu_mobile').focus();
                        }
                    }
                }
            }
        });
    }

    function getPath(kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/form') }}",
            dataType: 'json',
            async:false,
            success:function(res){    
                var result = res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_form == kode);
                        if(filter.length > 0) {
                            $('#path_view').val(filter[0].kode_form);
                            $('#label_path_view').val(filter[0].nama_form);
                        } else {
                            $('#path_view').val('');
                            $('#label_path_view').val('');
                            $('#path_view').focus();
                        }
                    }
                }
            }
        });
    }

    getMenuFilter();
    jumFilter();
    // END FUNCTION GET DATA //
    // EVENT CHANGE //
    $('#nik').change(function(){
        var value = $(this).val();
        getNIK(value);
    });
    $('#kode_klp_menu').change(function(){
        var value = $(this).val();
        getKlpMenu(value);
    });
    $('#menu_mobile').change(function(){
        var value = $(this).val();
        getMenu(value);
    });
    $('#path_view').change(function(){
        var value = $(this).val();
        getPath(value);
    });
    $('#inp-filter_menu').change(function(){
        jumFilter();
    });
    $('#inp-filter_status').change(function(){
        jumFilter();
    });
    // END EVENT CHANGE //
    // LIST DATA
     var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = $('#table-data').DataTable({
            destroy: true,
            bLengthChange: false,
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            "ordering": true,
            "order": [[5, "desc"]],
            'ajax': {
                'url': "{{url('apv/hakakses')}}",
                'async':false,
                'type': 'GET',
                'dataSrc' : function(json) {
                    if(json.status){
                        return json.daftar;   
                    }else if(!json.status && json.message == "Unauthorized"){
                        window.location.href = "{{ url('silo-auth/sesi-habis') }}";
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
                    'targets': 5, data: null, 'defaultContent': action_html 
                }
            ],
            'columns': [
                { data: 'nik' },
                { data: 'nama' },
                { data: 'kode_klp_menu' },
                { data: 'kode_lokasi' },
                { data: 'status_admin' }
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
    // END LIST DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('input[data-input="cbbl"]').val('');
        $('[id^=label]').html('');
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Hak Akses');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#saku-datatable').hide();
        $('#saku-form').show();
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

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_fs').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_kota:{
                required: true,   
            },
            nama:{
                required: true,   
            },
            kode_pp:{
                required: true,   
            },
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#nik').val();
            if(parameter == "edit"){
                var url = "{{ url('apv/hakakses') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('apv/hakakses') }}";
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
                        var kode = $('#kode').val();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Hak Akses');
                        $('#method').val('post');
                        $('input[data-input="cbbl"]').val('');
                        $('[id^=label]').html('');
                        msgDialog({
                            id:kode,
                            type:'simpan'
                        });
                        last_add("nik",kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/silo-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'NIK sudah digunakan'
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
    // END BUTTON SIMPAN

    // BUTTON EDIT TABLE //
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#form-tambah').validate().resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Hak Akses');
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/hakakses') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#password').val(result.data[0].pass);
                    $('#klp_akses').val(result.data[0].klp_akses);
                    $('#kode_menu_lab').val(result.data[0].kode_menu_lab);
                    $('#status')[0].selectize.setValue(result.data[0].status_admin);
                    getNIK(id);
                    getKlpMenu(result.data[0].kode_klp_menu);
                    getMenu(result.data[0].menu_mobile);
                    getPath(result.data[0].path_view);
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    // END BUTTON TABLE EDIT //

    // PREVIEW saat klik di list data //
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>NIK</td>
                <td style='border:none'>`+data.nik+`</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Kode Menu</td>
                <td>`+data.kode_klp_menu+`</td>
            </tr>
            <tr>
                <td>Kode Lokasi</td>
                <td>`+data.kode_lokasi+`</td>
            </tr>
            <tr>
                <td>Status Admin</td>
                <td>`+data.status_admin+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Kota');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/kota') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#password').val(result.data[0].pass);
                    $('#klp_akses').val(result.data[0].klp_akses);
                    $('#kode_menu_lab').val(result.data[0].kode_menu_lab);
                    $('#status')[0].selectize.setValue(result.data[0].status_admin);
                    getNIK(id);
                    getKlpMenu(result.data[0].kode_klp_menu);
                    getMenu(result.data[0].menu_mobile);
                    getPath(result.data[0].path_view);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });
    // END PREVIEW saat klik di list data //

    
    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('apv/hakakses') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Hak Akses ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
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
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    // END BUTTON HAPUS

    // FILTER DATA //
     $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var kode_menu = $('#inp-filter_menu').val();
                var status = $('#inp-filter_status').val();
                var col_kode_menu = data[2];
                var col_status = data[4];
                if(kode_menu != "" && status != ""){
                    if(kode_menu == col_kode_menu && status == col_status){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_menu != "" && status == ""){
                    if(kode_menu == col_kode_menu) {
                        return true;
                    } else {
                        return false;
                    }
                }else if(kode_menu == "" && status != ""){
                    if(status == col_status) {
                        return true;
                    } else {
                        return false;
                    }
                } else{
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
        $('#inp-filter_menu')[0].selectize.setValue('');
        $('#inp-filter_status')[0].selectize.setValue('');
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
    // END FILTER DATA //

    // CBBL
    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'nik': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/karyawan') }}";
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                var judul = "Daftar NIK";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'kode_klp_menu': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/hakakses_menu') }}";
                var columns = [
                    { data: 'kode_klp' },
                    { data: 'kode_klp' }
                ];
                var judul = "Daftar Kelompok Menu";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'menu_mobile': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/form') }}";
                var columns = [
                    { data: 'kode_form' },
                    { data: 'nama_form' }
                ];
                var judul = "Daftar Menu";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'path_view': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('apv/form') }}";
                var columns = [
                    { data: 'kode_form' },
                    { data: 'nama_form' }
                ];
                var judul = "Daftar Form";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
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
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    console.log(json)
                    if(json.daftar == undefined) {
                        return json.data.data
                    } else {
                        return json.daftar
                    }
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
                    $($target).val(kode).change();
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama).change();
                }else{
                    $($target2).text(nama);
                }

                if($target3 != ""){
                    $($target3).text(nama).change();
                }
                $('#modal-search').modal('hide');
            }
        });

        $(document).keydown(function(e) {
            if (e.keyCode == 40){ //arrow down
                var tr = searchTable.$('tr.selected');
                tr.removeClass('selected');
                tr.next().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }
            if (e.keyCode == 38){ //arrow up
                
                var tr = searchTable.$('tr.selected');
                searchTable.$('tr.selected').removeClass('selected');
                tr.prev().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }

            if (e.keyCode == 13){
                var kode = $('tr.selected').find('td:nth-child(1)').text();
                var nama = $('tr.selected').find('td:nth-child(2)').text();
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
                    $($target3).text(nama);
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    $('#form-tambah').on('click', '.search-item2', function(){ //Bukan CBBL Grid //
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('input').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });
    //END SHOW CBBL//

    $('#nik,#kode_klp_menu,#status,#password,#menu_mobile,#path_view,#klp_akses,#kode_menu_lab').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['nik','kode_klp_menu','status','password','menu_mobile','path_view','klp_akses','kode_menu_mobile'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2 || idx == 3){
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
    </script>