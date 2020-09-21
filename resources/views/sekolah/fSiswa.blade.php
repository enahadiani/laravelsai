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
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Siswa</h5>
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
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>PP</th>
                                    <th>Angkatan</th>
                                    <th>Kelas</th>
                                    <th>Tgl Input</th>
                                    <!-- <th>Action</th> -->
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
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nis" class="col-md-2 col-sm-12 col-form-label">NIS</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="NIS" id="nis" name="nis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_bank" class="col-md-2 col-sm-12 col-form-label">ID Bank</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="ID Bank" id="id_bank" name="id_bank">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-2 col-sm-12 col-form-label">Nama</label>
                            <div class="col-md-10 col-sm-12">
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama">
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
                            <label for="kode_akt" class="col-md-2 col-sm-12 col-form-label">Angkatan</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_akt" name="kode_akt" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_akt" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_kelas" class="col-md-2 col-sm-12 col-form-label">Kelas</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_kelas" name="kode_kelas" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_kelas" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_jur" class="col-md-2 col-sm-12 col-form-label">Jurusan</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_jur" name="kode_jur" required readonly>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_jur" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_tingkat" class="col-md-2 col-sm-12 col-form-label">Tingkat</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_tingkat" name="kode_tingkat" required readonly>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_tingkat" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_status" class="col-md-2 col-sm-12 col-form-label">Status Siswa</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_status" name="kode_status" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_status" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_lulus" class="col-md-2 col-sm-2 col-form-label">Tgl Lulus</label>
                            <div class="col-md-3 col-sm-9">
                                <input class='form-control datepicker' type="text" id="tgl_lulus" name="tgl_lulus" value="{{ date('d/m/Y') }}">
                                <i style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-tarif" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Tarif</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0 mb-2">
                            <div class="tab-pane active" id="data-tarif" role="tabpanel">
                                <table class="table table-bordered table-condensed gridexample" id="input-param" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:15%">Kode</th>
                                            <th style="width:30%">Nama</th>
                                            <th style="width:17%">Tarif</th>
                                            <th style="width:15%">Periode Awal</th>
                                            <th style="width:15%">Periode Akhir</th>
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
    </form>
    <!-- END FORM -->
    <!-- <div id='mySidepanel' class='sidepanel close'>
        <h3 style='margin-bottom:20px;position: absolute;'>Filter Data</h3>
        <a href='#' id='btnClose'><i class="float-right ti-close" style="margin-top: 10px;margin-right: 10px;"></i></a>
        <form id="formFilter2" style='margin-top:50px'>
        <div class="row" style="margin-left: -5px;">
            <div class="col-sm-12">
                <div class="form-group" style='margin-bottom:0'>
                    <label for="kode_pp2">Kode PP</label>
                    <select name="kode_pp" id="kode_pp2" class="form-control">
                    <option value="">Pilih PP</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 28px;"><i class="fa fa-search" id="btnPreview2"></i> Preview</button>
            </div>
        </div>
        </form>
    </div> -->
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

        function getPeriodeParam(kode_pp,param,param2){
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-trans/siswa-periode') }}",
                dataType: 'json',
                data: {kode_pp: kode_pp},
                async:false,
                success:function(res){
                    var result = res.data;    
                    if(result.status){
                        if(typeof result.periodeAwal !== 'undefined' && result.periodeAwal !== ""){
                         
                            var select = $('.'+param).selectize();
                            select = select[0];
                            var control = select.selectize;

                            var select2 = $('.'+param2).selectize();
                            select2 = select2[0];
                            var control2 = select2.selectize;

                            control.clearOptions();
                            control2.clearOptions();
                            var j=ix=0;
                            for (var i=1;i < 13;i++){
                                ix=i;
                                if (i <= 9) var bulan = "0"+ix.toString();
                                else var bulan = ix.toString();
                                if (i > 6){
                                    control.addOption([{text:result.periodeAwal.substr(0,4)+bulan, value:result.periodeAwal.substr(0,4)+bulan}]);
                                    
                                } 
                                else {
                                    
                                    control2.addOption([{text:result.periodeAkhir.substr(0,4)+bulan, value:result.periodeAkhir.substr(0,4)+bulan}]);				
                                }
                                j++;
                            }

                        }
                    }
                }
            });
        }

        // INISIASI AWAL FORM

        var scrollform = document.querySelector('.form-body');
        var psscrollform = new PerfectScrollbar(scrollform);
        
        var scroll = document.querySelector('#content-preview');
        var psscroll = new PerfectScrollbar(scroll);
        
        $('.selectize').selectize();
        
        
        $("input.datepicker").datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy',
            templates: {
                leftArrow: '<i class="simple-icon-arrow-left"></i>',
                rightArrow: '<i class="simple-icon-arrow-right"></i>'
            }
        });

        $('.sidepanel').on('click', '#btnClose', function(e){
            e.preventDefault();
            openFilter();
        });

        $('[data-toggle="tooltip"]').tooltip(); 
        // END 

        // LIST DATA
        var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
        var dataTable = $('#table-data').DataTable({
            destroy: true,
            bLengthChange: false,
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            "ordering": true,
            "order": [[5, "desc"]],
            'ajax': {
                'url': "{{url('sekolah-trans/siswa')}}",
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
                // {
                //     'targets': 6, data: null, 'defaultContent': action_html 
                // }
            ],
            'columns': [
                { data: 'nis' },
                { data: 'nama' },
                { data: 'pp' },
                { data: 'kode_akt' },
                { data: 'kode_kelas' },
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

        // END LIST DATA

        // BUTTON TAMBAH
        $('#saku-datatable').on('click', '#btn-tambah', function(){
            $('#row-id').hide();
            $('#id_edit').val('');
            $('#method').val('post');
            $('#judul-form').html('Tambah Data Siswa');
            $('#btn-update').attr('id','btn-save');
            $('#btn-save').attr('type','submit');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            $('#nis').attr('readonly', false);
            $('#input-param tbody').html('');
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

        // CBBL
        function showFilter(param,target1,target2){
            var par = param;

            var modul = '';
            var header = [];
            $target = target1;
            $target2 = target2;
            var parameter = {'param':par};
            
            switch(par){
                case 'kode_param[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('sekolah-trans/siswa-param') }}";
                    var columns = [
                        { data: 'kode_param' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Param";
                    var pilih = "parameter";
                    var jTarget1 = "val";
                    var jTarget2 = "val";
                    $target = "."+$target;
                    $target3 = ".td"+$target2;
                    $target2 = "."+$target2;
                    $target4 = ".td-tarif";
                    parameter = {'kode_pp':$('#kode_pp').val(),'kode_jur':$('#kode_jur').val(),'kode_akt':$('#kode_akt').val(),'kode_tingkat':$('#kode_tingkat').val()};
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
                    $target2 = "#"+$target2;
                    $target3 = "";
                    $target4 = "";
                break;
                case 'kode_akt': 
                    header = ['Kode Angkatan', 'Nama'];
                var toUrl = "{{ url('sekolah-master/angkatan') }}";
                    var columns = [
                        { data: 'kode_akt' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Angkatan";
                    var jTarget1 = "val";
                    var pilih = "angkatan";
                    var jTarget2 = "val";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
                    $target3 = "";
                    $target4 = "";
                    parameter = {'kode_pp':$('#kode_pp').val()};
                break;
                case 'kode_kelas': 
                    header = ['Kode Kelas', 'Nama'];
                    var toUrl = "{{ url('sekolah-master/kelas') }}";
                    var columns = [
                        { data: 'kode_kelas' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Kelas";
                    var jTarget1 = "val";
                    var pilih = "kelas";
                    var jTarget2 = "val";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
                    $target3 = "#kode_jur";
                    $target4 = "#kode_tingkat";
                    parameter = {'kode_pp':$('#kode_pp').val()};
                break;
                case 'kode_jur': 
                    header = ['Kode Jurusan', 'Nama'];
                    var toUrl = "{{ url('sekolah-master/jurusan') }}";
                    var columns = [
                        { data: 'kode_jur' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar JUrusan";
                    var jTarget1 = "val";
                    var pilih = "jurusan";
                    var jTarget2 = "val";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
                    $target3 = "";
                    $target4 = "";
                    parameter = {'kode_pp':$('#kode_pp').val()};
                break;
                case 'kode_tingkat': 
                    header = ['Kode Tingkat', 'Nama'];
                    var toUrl = "{{ url('sekolah-master/tingkatan') }}";
                    var columns = [
                        { data: 'kode_tingkat' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Tingkat";
                    var jTarget1 = "val";
                    var pilih = "tingkat";
                    var jTarget2 = "val";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
                    $target3 = "";
                    $target4 = "";
                    parameter = {'kode_pp':$('#kode_pp').val()};
                break;
                case 'kode_status': 
                    header = ['Kode Status', 'Nama'];
                    var toUrl = "{{ url('sekolah-master/status-siswa') }}";
                    var columns = [
                        { data: 'kode_ss' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Status";
                    var jTarget1 = "val";
                    var pilih = "status";
                    var jTarget2 = "val";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
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
                        $($target).text(kode);
                    }

                    if(jTarget2 == "val"){
                        $($target2).val(nama);
                    }else{
                        $($target2).text(nama);
                    }

                    if($target3 != ""){
                        if(par == "kode_kelas"){
                            $($target3).val(dtrow.kode_jur);
                            $($target3).trigger('change');
                        }else{
                            $($target3).click();
                        }
                    }

                    if($target4 != ""){
                        if(par == "kode_kelas"){
                            $($target4).val(dtrow.kode_tingkat);
                            $($target4).trigger('change');
                        }else{
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
                url: "{{ url('/sekolah-master/pp-detail') }}",
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

        function getAngkatan(id){
            var tmp = id.split(" - ");
            kode = tmp[0];
            kode_pp = $('#kode_pp').val();
            $.ajax({
                type: 'GET',
                url: "{{ url('/sekolah-master/angkatan-detail') }}",
                dataType: 'json',
                data:{kode_pp : kode_pp, kode_akt: kode},
                async:false,
                success:function(res){
                    var result = res.data;    
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0){
                            $('#kode_akt').val(result.data[0].kode_akt);
                            $('#label_kode_akt').val(result.data[0].nama);
                        }else{
                            $('#kode_akt').val('');
                            $('#label_kode_akt').val('');
                            $('#kode_akt').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    }
                }
            });
        }

        function getKelas(id){
            var tmp = id.split(" - ");
            kode = tmp[0];
            kode_pp = $('#kode_pp').val();
            $.ajax({
                type: 'GET',
                url: "{{ url('/sekolah-master/kelas-detail') }}",
                dataType: 'json',
                data:{kode_pp : kode_pp, kode_kelas: kode},
                async:false,
                success:function(res){    
                    var result = res.data;
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0){
                            $('#kode_kelas').val(result.data[0].kode_kelas);
                            $('#label_kode_kelas').val(result.data[0].nama);
                            $('#kode_jur').val(result.data[0].kode_jur);
                            $('#kode_tingkat').val(result.data[0].kode_tingkat);
                            $('#kode_jur').trigger('change');
                            $('#kode_tingkat').trigger('change');
                        }else{
                            $('#kode_kelas').val('');
                            $('#label_kode_kelas').val('');
                            $('#kode_kelas').focus();
                            $('#kode_jur').val('');
                            $('#kode_tingkat').val('');
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    }
                }
            });
        }

        function getJurusan(id){
            var tmp = id.split(" - ");
            kode = tmp[0];
            kode_pp = $('#kode_pp').val();
            $.ajax({
                type: 'GET',
                url: "{{ url('/sekolah-master/jurusan-detail') }}",
                dataType: 'json',
                data:{kode_pp : kode_pp, kode_jur: kode},
                async:false,
                success:function(res){    
                    var result = res.data;
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0){
                            $('#kode_jur').val(result.data[0].kode_jur);
                            $('#label_kode_jur').val(result.data[0].nama);
                        }else{
                            $('#kode_jur').val('');
                            $('#label_kode_jur').val('');
                            $('#kode_jur').focus();
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
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#kode_tingkat').val(result.daftar[0].kode_tingkat);
                            $('#label_kode_tingkat').val(result.daftar[0].nama);
                        }else{
                            $('#kode_tingkat').val('');
                            $('#label_kode_tingkat').val('');
                            $('#kode_tingkat').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    }
                }
            });
        }

        function getStatusSiswa(id){
            var tmp = id.split(" - ");
            kode = tmp[0];
            kode_pp = $('#kode_pp').val();
            $.ajax({
                type: 'GET',
                url: "{{ url('/sekolah-master/status-siswa-detail') }}",
                dataType: 'json',
                data:{kode_pp : kode_pp, kode_ss: kode},
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#kode_status').val(result.daftar[0].kode_ss);
                            $('#label_kode_status').val(result.daftar[0].nama);
                        }else{
                            $('#kode_status').val('');
                            $('#label_kode_status').val('');
                            $('#kode_status').focus();
                        }
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                    }
                }
            });
        }

        function getParam(id,target1,target2,target3,jenis){
            var tmp = id.split(" - ");
            var kode = tmp[0];
            var kode_pp = $('#kode_pp').val();
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-trans/siswa-param') }}",
                dataType: 'json',
                data:{kode_param:kode,kode_pp:kode_pp},
                async:false,
                success:function(result){    
                    if(result.data.status){
                        if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                            if(jenis == 'change'){
                                $('.'+target1).val(kode);
                                $('.td'+target1).text(kode);

                                $('.'+target2).val(result.data.data[0].nama);
                                $('.td'+target2).text(result.data.data[0].nama);
                                $('.td'+target3).click();
                            }else{

                                $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                                $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                                $('.'+target1).closest('tr').find('.search-akun').hide();
                                $('.'+target1).val(id);
                                $('.td'+target1).text(id);
                                $('.'+target1).hide();
                                $('.td'+target1).show();

                                $('.'+target2).val(result.data.data[0].nama);
                                $('.td'+target2).text(result.data.data[0].nama);
                                $('.'+target2).show();
                                $('.td'+target2).hide();
                                $('.'+target2).focus();
                                $('.td'+target3).click();
                            }
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
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
            getDataPP(par);
        });

        $('#form-tambah').on('change', '#kode_akt', function(){
            var par = $(this).val();
            getAngkatan(par);
        });

        $('#form-tambah').on('change', '#kode_kelas', function(){
            var par = $(this).val();
            getKelas(par);
        });

        $('#form-tambah').on('change', '#kode_jur', function(){
            var par = $(this).val();
            getJurusan(par);
        });

        $('#form-tambah').on('change', '#kode_tingkat', function(){
            var par = $(this).val();
            getTingkat(par);
        });

        
        $('#form-tambah').on('change', '#kode_status', function(){
            var par = $(this).val();
            getStatusSiswa(par);
        });

        $('#form-tambah').on('click', '.search-item2', function(){
            var par = $(this).closest('div').find('input').attr('name');
            var par2 = $(this).closest('div').siblings('div').find('input').attr('id');
            target1 = par;
            target2 = par2;
            showFilter(par,target1,target2);
        });

        // END CBBL

        // BUTTON SIMPAN
        $('#saku-form').on('submit', '#form-tambah', function(e){
            e.preventDefault();
            var parameter = $('#id_edit').val();
            var id = $('#kode_kelas').val();
            if(parameter == "edit"){
                var url = "{{ url('/sekolah/postKelas') }}/"+id;
                var pesan = "updated";
            }else{
                var url = "{{ url('/sekolah/postKelas') }}";
                var pesan = "saved";
            }

            var formData = new FormData(this);
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
                    // alert('Input data '+result.message);
                    if(result.data.status){
                        // location.reload();
                        dataTable.ajax.reload();
                        Swal.fire(
                            'Great Job!',
                            'Your data has been '+pesan,
                            'success'
                            )
                            $('#saku-datatable').show();
                            $('#saku-form').hide();
                    
                    }else if(!result.data.status && result.data.message == "Unauthorized"){
                        Swal.fire({
                            title: 'Session telah habis',
                            text: 'harap login terlebih dahulu!',
                            icon: 'error'
                        }).then(function() {
                            window.location.href = "{{ url('/sekolah/login') }}";
                        }) 
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
        });

        // END SIMPAN

        // BUTTON DELETE
        $('#saku-datatable').on('click','#btn-delete',function(e){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    var kode = $(this).closest('tr').find('td:eq(0)').html();      
                    var temp = $(this).closest('tr').find('td').eq(4).html().split('-');
                    var kode_pp = temp[0]; 
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('sekolah/deleteKelas') }}/"+kode +"/"+ kode_pp,
                        dataType: 'json',
                        async:false,
                        success:function(result){
                            if(result.data.status){
                                dataTable.ajax.reload();
                                Swal.fire(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success'
                                )
                            }else if(!result.data.status && result.data.message == "Unauthorized"){
                                Swal.fire({
                                    title: 'Session telah habis',
                                    text: 'harap login terlebih dahulu!',
                                    icon: 'error'
                                }).then(function() {
                                    window.location.href = "{{ url('sekolah/login') }}";
                                })
                            }else{
                                Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                                })
                            }
                        }
                    });
                    
                }else{
                    return false;
                }
            })
        });
        // END DELETE

        // BUTTON EDIT
        $('#saku-datatable').on('click', '#btn-edit', function(){
            var id= $(this).closest('tr').find('td').eq(0).html();
            var tingkat = $(this).closest('tr').find('td').eq(2).html();
            var jurTemp = $(this).closest('tr').find('td').eq(3).html().split('|');
            var temp = $(this).closest('tr').find('td').eq(4).html().split('-');
            var kode_pp = temp[0];
            var jur = jurTemp[0].trim();
            $iconLoad.show();
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah/getKelas') }}/" + id + "/" + kode_pp,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        console.log(result);
                        $('#id_edit').val('edit');
                        $('#method').val('put');
                        $('#kode_kelas').val(id);
                        $('#kode_kelas').attr('readonly', true);
                        $('#nama').val(result.data[0].nama);
                        $('#kode_pp').val(result.data[0].kode_pp);
                        $('#kode_tingkat').val(result.data[0].kode_tingkat);
                        $('#kode_jur').val(result.data[0].kode_jur);
                        $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                        getLabelDataPP(kode_pp);
                        getLabelTingkatan(tingkat);
                        getLabelJurusan(jur);
                        $('#row-id').show();
                        $('#saku-datatable').hide();
                        $('#saku-form').show();
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        Swal.fire({
                            title: 'Session telah habis',
                            text: 'harap login terlebih dahulu!',
                            icon: 'error'
                        }).then(function() {
                            window.location.href = "{{ url('saku/login') }}";
                        })
                    }
                    $iconLoad.hide();
                }
            });
        });
        // END EDIT

        // GRID PARAM TARIF
        function addRowDef(){
            var no=$('#input-param .row-param:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-param'>";
            input += "<td class='no-param text-center'>"+no+"</td>";              
            input += "<td><span class='td-kode_param tdparamke"+no+" tooltip-span'></span><input type='text' name='kode_param[]' class='form-control inp-kode_param paramke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='paramkode"+no+"'><a href='#' class='search-item search-param hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nama_param tdnmparamke"+no+" tooltip-span'></span><input type='text' name='nama_param[]' class='form-control inp-nama_param nmparamke"+no+" hidden'  value='' readonly></td>";
            input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'></span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='' required></td>";
            input += "<td><span class='td-periodeawl tdperiodeawlke"+no+" tooltip-span'></span><select hidden name='periodeawl[]' class='form-control inp-periodeawl periodeawlke"+no+"' value='' required></select></td>";
            input += "<td><span class='td-periodeakr tdperiodeakrke"+no+" tooltip-span'></span><select hidden name='periodeakr[]' class='form-control inp-periodeakr periodeakrke"+no+"' value='' required></select></td>";
            
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-param tbody').append(input);
            getPeriodeParam($('#kode_pp').val(),'periodeawlke'+no,'periodeakrke'+no);
            $('.selectize-control.periodeawlke'+no).addClass('hidden');
            $('.selectize-control.periodeakrke'+no).addClass('hidden');
            $('.tarifke'+no).inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { self.Value(''); }
            });
            // $('#paramkode'+no).typeahead({
            //     source:$dtParam,
            //     displayText:function(item){
            //         return item.id+' - '+item.name;
            //     },
            //     autoSelect:false,
            //     changeInputOnSelect:false,
            //     changeInputOnMove:false,
            //     selectOnBlur:false,
            //     afterSelect: function (item) {
            //         console.log(item.id);
            //     }
            // });

            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });
        }

        $('#input-param').on('keydown','.inp-kode, .inp-nama, .inp-dc, .inp-ket, .inp-nilai, .inp-pp, .inp-nama_pp',function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['.inp-kode','.inp-nama','.inp-dc','.inp-ket','.inp-nilai','.inp-pp','.inp-nama_pp'];
            var nxt2 = ['.td-kode','.td-nama','.td-dc','.td-ket','.td-nilai','.td-pp','.td-nama_pp'];
            if (code == 13 || code == 9) {
                e.preventDefault();
                var idx = $(this).closest('td').index()-1;
                var idx_next = idx+1;
                var kunci = $(this).closest('td').index()+1;
                var isi = $(this).val();
                switch (idx) {
                    case 0:
                        var noidx = $(this).parents("tr").find(".no-param").text();
                        var kode = $(this).val();
                        var target1 = "akunke"+noidx;
                        var target2 = "nmakunke"+noidx;
                        var target3 = "dcke"+noidx;
                        getAkun(kode,target1,target2,target3,'tab');                    
                        break;
                    case 1:
                        $("#input-param td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).parents("tr").find(".selectize-control").show();
                        $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        
                        break;
                    case 2:
                        var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                        if(isi == 'D' || isi == 'C'){
                            $("#input-param td").removeClass("px-0 py-0 aktif");
                            $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                            $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi);
                            $(this).parents("tr").find(nxt2[idx]).text(isi);
                            $(this).parents("tr").find(".selectize-control").hide();
                            $(this).closest('tr').find(nxt2[idx]).show();

                            $(this).closest('tr').find(nxt[idx_next]).show();
                            $(this).closest('tr').find(nxt[idx_next]).focus();
                            $(this).closest('tr').find(nxt2[idx_next]).hide();
                        }else{
                            alert('Posisi yang dimasukkan tidak valid');
                            return false;
                        }
                        break;
                    case 3:
                        if($.trim($(this).val()).length){
                            $("#input-param td").removeClass("px-0 py-0 aktif");
                            $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                            $(this).closest('tr').find(nxt[idx]).val(isi);
                            $(this).closest('tr').find(nxt2[idx]).text(isi);
                            $(this).closest('tr').find(nxt[idx]).hide();
                            $(this).closest('tr').find(nxt2[idx]).show();
                            $(this).closest('tr').find(nxt[idx_next]).show();
                            $(this).closest('tr').find(nxt2[idx_next]).hide();
                            $(this).closest('tr').find(nxt[idx_next]).focus();
                        }else{
                            alert('Keterangan yang dimasukkan tidak valid');
                            return false;
                        }
                        break;
                    case 4:
                        if(isi != "" && isi != 0){
                            $("#input-param td").removeClass("px-0 py-0 aktif");
                            $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                            $(this).closest('tr').find(nxt[idx]).val(isi);
                            $(this).closest('tr').find(nxt2[idx]).text(isi);
                            $(this).closest('tr').find(nxt[idx]).hide();
                            $(this).closest('tr').find(nxt2[idx]).show();
                            $(this).closest('tr').find(nxt[idx_next]).show();
                            $(this).closest('tr').find(nxt[idx_next]).focus();
                            $(this).closest('tr').find(nxt2[idx_next]).hide();
                            $(this).closest('tr').find('.search-pp').show();
                            hitungTotal();
                        }else{
                            alert('Nilai yang dimasukkan tidak valid');
                            return false;
                        }
                        break;
                    case 5:
                        var noidx = $(this).parents("tr").find(".no-param").text();
                        var kode = $(this).val();
                        var target1 = "ppke"+noidx;
                        var target2 = "nmppke"+noidx;
                        getPP(kode,target1,target2,'tab');
                        break;
                    case 6:
                        $("#input-param td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        // $('.add-row').click();
                        var cek = $(this).parents('tr').next('tr').find('.td-kode');
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
            var no=$('#input-param .row-param:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-param'>";
            input += "<td class='no-param text-center'>"+no+"</td>";              
            input += "<td><span class='td-kode_param tdparamke"+no+" tooltip-span'></span><input type='text' name='kode_param[]' class='form-control inp-kode_param paramke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='paramkode"+no+"'><a href='#' class='search-item search-param hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nama_param tdnmparamke"+no+" tooltip-span'></span><input type='text' name='nama_param[]' class='form-control inp-nama_param nmparamke"+no+" hidden'  value='' readonly></td>";
            input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'></span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='' required></td>";
            input += "<td><span class='td-periodeawl tdperiodeawlke"+no+" tooltip-span'></span><select hidden name='periodeawl[]' class='form-control inp-periodeawl periodeawlke"+no+"' value='' required></select></td>";
            input += "<td><span class='td-periodeakr tdperiodeakrke"+no+" tooltip-span'></span><select hidden name='periodeakr[]' class='form-control inp-periodeakr periodeakrke"+no+"' value='' required></select></td>";
            
            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-param tbody').append(input);
            getPeriodeParam($('#kode_pp').val(),'periodeawlke'+no,'periodeakrke'+no);
            $('.selectize-control.periodeawlke'+no).addClass('hidden');
            $('.selectize-control.periodeakrke'+no).addClass('hidden');
            $('.tarifke'+no).inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { self.Value(''); }
            });
            $('#input-param td').removeClass('px-0 py-0 aktif');
            $('#input-param tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-param tbody tr:last').find(".inp-kode_param").show();
            $('#input-param tbody tr:last').find(".td-kode_param").hide();
            $('#input-param tbody tr:last').find(".search-param").show();
            $('#input-param tbody tr:last').find(".inp-kode_param").focus();

            $('.tooltip-span').tooltip({
                title: function(){
                    return $(this).text();
                }
            });

        });

        $('#input-param tbody').on('click', 'tr', function(){
            if ( $(this).hasClass('selected-row') ) {
                $(this).removeClass('selected-row');
            }
            else {
                $('#input-param tbody tr').removeClass('selected-row');
                $(this).addClass('selected-row');
            }
        });

        $('.nav-control').on('click', '#copy-row', function(){
            if($(".selected-row").length != 1){
                alert('Harap pilih row yang akan dicopy terlebih dahulu!');
                return false;
            }else{
                var kode_akun = $('#input-param tbody tr.selected-row').find(".inp-kode").val();
                var nama_akun = $('#input-param tbody tr.selected-row').find(".inp-nama").val();
                var dc = $('#input-param tbody tr.selected-row').find(".td-dc").text();
                var keterangan = $('#input-param tbody tr.selected-row').find(".inp-ket").val();
                var nilai = $('#input-param tbody tr.selected-row').find(".inp-nilai").val();
                var kode_pp = $('#input-param tbody tr.selected-row').find(".inp-pp").val();
                var nama_pp = $('#input-param tbody tr.selected-row').find(".inp-nama_pp").val();
                var no=$('#input-param .row-param:last').index();
                no=no+2;
                var input = "";
                input += "<tr class='row-param'>";
                input += "<td class='no-param text-center'>"+no+"</td>";
                input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
                input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
                input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
                input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
                input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
                input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                input += "</tr>";
                $('#input-param tbody').append(input);
                $('.dcke'+no).selectize({
                    selectOnTab:true,
                    onChange: function(value) {
                        $('.tddcke'+no).text(value);
                        hitungTotal();
                    }
                });
                $('.selectize-control.dcke'+no).addClass('hidden');
                $('.nilke'+no).inputmask("numeric", {
                    radixPoint: ",",
                    groupSeparator: ".",
                    digits: 2,
                    autoGroup: true,
                    rightAlign: true,
                    oncleared: function () { self.Value(''); }
                });
                hitungTotal();
                $('.tooltip-span').tooltip({
                    title: function(){
                        return $(this).text();
                    }
                })
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            }

        });

        $('#input-param').on('click', 'td', function(){
            var idx = $(this).index();
            if(idx == 0){
                return false;
            }else{
                if($(this).hasClass('px-0 py-0 aktif')){
                    return false;            
                }else{
                    $('#input-param td').removeClass('px-0 py-0 aktif');
                    $(this).addClass('px-0 py-0 aktif');
            
                    var kode_param = $(this).parents("tr").find(".inp-kode_param").val();
                    var nama_param = $(this).parents("tr").find(".inp-nama_param").val();
                    var tarif = $(this).parents("tr").find(".inp-tarif").val();
                    var periodeawl = $(this).parents("tr").find(".inp-periodeawl option:selected").text();
                    var periodeakr = $(this).parents("tr").find(".inp-periodeakr option:selected").text();
                    var no = $(this).parents("tr").find(".no-param").text();
                    $(this).parents("tr").find(".inp-kode_param").val(kode_param);
                    $(this).parents("tr").find(".td-kode_param").text(kode_param);
                    if(idx == 1){
                        $(this).parents("tr").find(".inp-kode_param").show();
                        $(this).parents("tr").find(".td-kode_param").hide();
                        $(this).parents("tr").find(".search-param").show();
                        $(this).parents("tr").find(".inp-kode_param").focus();
                    }else{
                        $(this).parents("tr").find(".inp-kode_param").hide();
                        $(this).parents("tr").find(".td-kode_param").show();
                        $(this).parents("tr").find(".search-param").hide();
                        
                    }
            
                    $(this).parents("tr").find(".inp-nama_param").val(nama_param);
                    $(this).parents("tr").find(".td-nama_param").text(nama_param);
                    if(idx == 2){
                        $(this).parents("tr").find(".inp-nama_param").show();
                        $(this).parents("tr").find(".td-nama_param").hide();
                        $(this).parents("tr").find(".inp-nama_param").focus();
                    }else{
                        
                        $(this).parents("tr").find(".inp-nama_param").hide();
                        $(this).parents("tr").find(".td-nama_param").show();
                    }
                    
                    $(this).parents("tr").find(".inp-tarif").val(tarif);
                    $(this).parents("tr").find(".td-tarif").text(tarif);
                    if(idx == 3){
                        $(this).parents("tr").find(".inp-tarif").show();
                        $(this).parents("tr").find(".td-tarif").hide();
                        $(this).parents("tr").find(".inp-tarif").focus();
                    }else{
                        $(this).parents("tr").find(".inp-tarif").hide();
                        $(this).parents("tr").find(".td-tarif").show();
                    }
            
                    $(this).parents("tr").find(".inp-periodeawl")[0].selectize.setValue(periodeawl);
                    $(this).parents("tr").find(".td-periodeawl").text(periodeawl);
                    if(idx == 4){
                        $('.periodeawlke'+no)[0].selectize.setValue(periodeawl);
                        var periodeawlx = $('.tdperiodeawlke'+no).text();
                        
                        $(this).parents("tr").find(".selectize-control.inp-periodeawl").show();
                        $(this).parents("tr").find(".td-periodeawl").hide();
                        $(this).parents("tr").find(".inp-periodeawl")[0].selectize.focus();
                        
                    }else{
                        
                        $(this).parents("tr").find(".selectize-control.inp-periodeawl").hide();
                        $(this).parents("tr").find(".td-periodeawl").show();
                    }

                    $(this).parents("tr").find(".inp-periodeakr")[0].selectize.setValue(periodeakr);
                    $(this).parents("tr").find(".td-periodeakr").text(periodeakr);
                    if(idx == 5){
                        $('.periodeakrke'+no)[0].selectize.setValue(periodeakr);
                        var periodeakrx = $('.tdperiodeakrke'+no).text();
                        
                        $(this).parents("tr").find(".selectize-control.inp-periodeakr").show();
                        $(this).parents("tr").find(".td-periodeakr").hide();
                        $(this).parents("tr").find(".inp-periodeakr")[0].selectize.focus();
                        
                    }else{
                        
                        $(this).parents("tr").find(".selectize-control.inp-periodeakr").hide();
                        $(this).parents("tr").find(".td-periodeakr").show();
                    }
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

        $('#input-param').on('click', '.hapus-item', function(){
            $(this).closest('tr').remove();
            no=1;
            $('.row-param').each(function(){
                var nom = $(this).closest('tr').find('.no-param');
                nom.html(no);
                no++;
            });
            // hitungTotalRow();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#input-param').on('change', '.inp-kode', function(e){
            e.preventDefault();
            var noidx =  $(this).parents('tr').find('.no-param').html();
            target1 = "akunke"+noidx;
            target2 = "nmakunke"+noidx;
            target3 = "dcke"+noidx;
            if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
                var kode = $(this).val();
                getAkun(kode,target1,target2,target3,'change');
                // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
            }else{
                alert('Akun yang dimasukkan tidak valid');
                return false;
            }
        });

        $('#input-param').on('keypress', '.inp-kode', function(e){
            var this_index = $(this).closest('tbody tr').index();
            if (e.which == 42) {
                e.preventDefault();
                if($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                    $(this).val($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
                }else{
                    $(this).val('');
                }
            }
        });

        $('#input-param').on('keypress', '.inp-dc', function(e){
            var this_index = $(this).closest('tbody tr').index();
            if (e.which == 42) {
                e.preventDefault();
                if($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue() != undefined){
                    $(this)[0].selectize.setValue($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue());
                }else{
                    $(this)[0].selectize.setValue('');
                }
            }
        });

        $('#input-param').on('keypress', '.inp-ket', function(e){
            var this_index = $(this).closest('tbody tr').index();
            if (e.which == 42) {
                e.preventDefault();
                if($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val() != undefined){
                    $(this).val($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val());
                }else{
                    $(this).val('');
                }
            }
        });

        $('#input-param').on('keypress', '.inp-nilai', function(e){
            if (e.which == 42) {
                e.preventDefault();
                var dc = $(this).closest('tr').find('.inp-dc')[0].selectize.getValue();
                if(dc == 'D' || dc == 'C'){
                    var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
                    $(this).val(selisih);
                }else{
                    alert('Posisi tidak valid, harap pilih posisi akun');
                    $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
                }
            }
        });

        $('#input-param').on('change', '.inp-nilai', function(){
            console.log('change-nilai');
            if($(this).closest('tr').find('.inp-nilai').val() != "" && $(this).closest('tr').find('.inp-nilai').val() != 0){
                hitungTotal();
                $(this).closest('tr').find('.inp-pp').val();
            }
            else{
                alert('Nilai yang dimasukkan tidak valid');
                return false;
            }
        });

        $('#input-param').on('change', '.inp-pp', function(e){
            e.preventDefault();
            var noidx =  $(this).closest('tr').find('.no-param').html();
            target1 = "ppke"+noidx;
            target2 = "nmppke"+noidx;
            if($.trim($(this).closest('tr').find('.inp-pp').val()).length){
                var kode = $(this).val();
                getPP(kode,target1,target2,'change');
                // hitungTotal();
            }else{
                alert('PP yang dimasukkan tidak valid');
                return false;
            }
        });

        $('#input-param').on('keypress', '.inp-pp', function(e){
            var this_index = $(this).closest('tbody tr').index();
            if (e.which == 42) {
                e.preventDefault();
                if($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val() != undefined){
                    $(this).val($("#input-param tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val());
                }else{
                    $(this).val('');
                }
            }
        });

        $('#input-param').on('click', '.search-item', function(){

            var par = $(this).closest('td').find('input').attr('name');
            var modul = '';
            var header = [];

            switch(par){
                case 'kode_param[]': 
                    var par2 = "nama_param[]";   
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

    </script>