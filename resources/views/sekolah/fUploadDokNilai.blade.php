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
        
    </style>
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                    <h5 style="position:absolute;top: 25px;">Upload Dokumen Penilaian Siswa</h5>
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
                                <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pp" class="col-md-2 col-sm-2 col-form-label">Kode PP</label>
                            <div class="col-md-3 col-sm-9" >
                                <input class="form-control" type="text"  id="kode_pp" name="kode_pp" required readonly>
                            </div>
                            <div class="col-md-2 col-sm-9 px-0" >
                                <input id="label_kode_pp" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_ta" class="col-md-2 col-sm-2 col-form-label">Tahun Ajaran</label>
                            <div class="col-md-3 col-sm-9" >
                                <input class="form-control" type="text"  id="kode_ta" name="kode_ta" required readonly>
                            </div>
                            <div class="col-md-2 col-sm-9 px-0" >
                                <input id="label_kode_ta" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                            <label for="kode_sem" class="col-md-2 col-sm-2 col-form-label">Semester</label>
                            <div class="col-md-3 col-sm-9">
                                <select class='form-control selectize' id="kode_sem" name="kode_sem">
                                <option value=''>--- Pilih Semester ---</option>
                                <option value='1' selected>GANJIL</option>
                                <option value='2'>GENAP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_kelas" class="col-md-2 col-sm-2 col-form-label">Kelas</label>
                            <div class="col-md-3 col-sm-9" >
                                <input class="form-control" type="text"  id="kode_kelas" name="kode_kelas" required readonly>
                            </div>
                            <div class="col-md-2 col-sm-9 px-0" >
                                <input id="label_kode_kelas" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_matpel" class="col-md-2 col-sm-2 col-form-label">Matpel</label>
                            <div class="col-md-3 col-sm-9" >
                                <input class="form-control" type="text"  id="kode_matpel" name="kode_matpel" required readonly>
                            </div>
                            <div class="col-md-2 col-sm-9 px-0" >
                                <input id="label_kode_matpel" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_jenis" class="col-md-2 col-sm-2 col-form-label">Jenis Penilaian</label>
                            <div class="col-md-3 col-sm-9" >
                                <input class="form-control" type="text"  id="kode_jenis" name="kode_jenis" required readonly>
                            </div>
                            <div class="col-md-2 col-sm-9 px-0" >
                                <input id="label_kode_jenis" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                            <label for="penilaian_ke" class="col-md-2 col-sm-2 col-form-label"> Penilaian Ke</label>
                            <div class="col-md-3 col-sm-9" >
                                <input class="form-control" type="text"  id="penilaian_ke" name="penilaian_ke" readonly>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Dokumen</span></a> </li>
                            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Dokumen</span></a> </li> -->
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-dok" role="tabpanel">
                                <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                    <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Import Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
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
                                            <th style="width:10%">NIS</th>
                                            <th style="width:21%">Nama</th>
                                            <th style="width:18%">Nama Dok</th>
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
    // END 

    // LIST DATA
    var action_html = "<a href='#' title='Upload' id='btn-upload'><i class='simple-icon-cloud-upload' style='font-size:18px'></i></a> &nbsp;";
    
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
                    $('#label_kode_pp').val(result.data[0].nama_pp);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#label_kode_ta').val(result.data[0].nama_ta);
                    $('#kode_sem')[0].selectize.setValue(result.data[0].kode_sem);
                    $('#kode_sem')[0].selectize.lock();
                    $('#kode_kelas').val(result.data[0].kode_kelas);
                    $('#label_kode_kelas').val(result.data[0].nama_kelas);
                    $('#kode_matpel').val(result.data[0].kode_matpel);
                    $('#label_kode_matpel').val(result.data[0].nama_matpel);
                    $('#kode_jenis').val(result.data[0].kode_jenis);
                    $('#label_kode_jenis').val(result.data[0].nama_jenis);
                    $('#penilaian_ke').val(result.data[0].jumlah);
                
                    if(result.data_dokumen.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_dokumen.length;i++){
                            var line =result.data_dokumen[i];
                            input += "<tr class='row-nilai'>";
                            input += "<td class='no-nilai text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdniske"+no+" tooltip-span'>"+line.nis+"</span><input type='hidden' name='nis[]' class='form-control inp-nis' value='"+line.nis+"'></td>";
                            input += "<td ><span class='td-nama_siswa tdnmsiswake"+no+" tooltip-span'>"+line.nama_siswa+"</span></td>";
                            if(line.nama != undefined && line.nama != "null"){

                                input += "<td ><input type='text' name='nama_dok[]' class='form-control inp-nama_dok' value='"+line.nama+"'></td>";
                            }else{
                                input += "<td ><input type='text' name='nama_dok[]' class='form-control inp-nama_dok' value=''></td>";
                            }
                            var dok = "{{ config('api.url').'sekolah/storage' }}/"+line.fileaddres;
                            input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>"+line.fileaddres+"</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='"+line.fileaddres+"' readonly></td>";
                            if(line.fileaddres == "-" || line.fileaddres == ""){
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]'>
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
                        $('#judul-form').html('Tambah Data Penilaian Siswa');
                        $('#id').val('');
                        $('#input-nilai tbody').html('');
                        $('[id^=label]').html('');
                        hitungTotalRow();

                        msgDialog({
                            id:result.data.no_bukti,
                            type:'simpan'
                        });
                        
                        last_add("no_bukti",result.data.no_bukti);
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

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    $('#input-dok').on('click', '.hapus-dok', function(){
        if(confirm('Sistem akan menghapus file dari server. Apakah anda ingin menghapus data ini? ')){
            var no_bukti = $('#no_bukti').val();
            var kode_pp = $('#kode_pp').val();
            var nis = $(this).closest('tr').find('.inp-nis').val();
            var nama_dok = $(this).closest('tr').find('.inp-nama_dok');
            var nama_file = $(this).closest('tr').find('.inp-nama_file');
            var td_nama_file = $(this).closest('tr').find('.td-nama_file');
            var action_dok = $(this).closest('tr').find('.action-dok');
            
            $.ajax({
                type: 'DELETE',
                url: "{{ url('sekolah-trans/penilaian-dok') }}",
                dataType: 'json',
                data: {'no_bukti':no_bukti,'nis':nis,'kode_pp':kode_pp},
                success:function(result){
                    alert(result.data.message);
                    if(result.data.status){
                        console.log(nama_dok);
                        console.log(nama_file);
                        console.log(td_nama_file);
                        nama_dok.val(''); 
                        nama_file.val('-');
                        td_nama_file.html('-');
                        action_dok.html('');
                    }
                }
            });

        }else{
            return false;
        }
    });
    </script>