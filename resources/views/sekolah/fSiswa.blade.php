    <!-- STYLE TAMBAHAN -->
    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
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
        
        #table-search
        {
            border-collapse:collapse !important;
        }

        .hidden{
            display:none;
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
            padding-right: 5px; 
        }

        .dataTables_length select {
            border: 0;
            background: none;
            box-shadow: none;
            border:none;
            width:120px !important;
            transition-duration: 0.3s; 
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
        .last-add::before{
            content: "***";
            background: var(--theme-color-1);
            border-radius: 50%;
            font-size: 3px;
            position: relative;
            top: -2px;
            left: -5px;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }

        .input-group-prepend{
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
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

        .search-item2{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
        }
    </style>
    <!-- END STYLE -->
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                    <h5 style="position:absolute;top: 25px;">Data Siswa</h5>
                    <!-- <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;" ><i class="fa fa-plus-circle"></i> Tambah</button> -->
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
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>PP</th>
                                    <th>Angkatan</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Tgl Input</th>
                                    <!-- <th>Aksi</th> -->
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
                            <label for="flag_aktif" class="col-md-2 col-sm-12 col-form-label">Status Siswa</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="flag_aktif" name="flag_aktif" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_flag_aktif" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
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
                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;width:1200px !important;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                
                                <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
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
                        <div class="form-group row">
                            <label>Status</label>
                            <select class="form-control" data-width="100%" name="inp-filter_status" id="inp-filter_status">
                                <option value='#'>Pilih Status</option>
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

        function hitungTotalRow(){
            var total_row = $('#input-param tbody tr').length;
            $('#total-row').html(total_row+' Baris');
        }
        
        function getPeriodeParam(kode_pp,param,param2,val1=null,val2=null){
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

                            if(val1 != undefined && val1 != null){
                                control.setValue(val1);
                            }
                            
                            if(val2 != undefined && val2 != null){
                                control2.setValue(val2);
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
                            getTASts("{{ Session::get('kodePP').'-'.Session::get('namaPP') }}")
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

        function getTASts(kode_pp = null) {
            var tmp = kode_pp.split("-");
            kode_pp = tmp[0];
            $.ajax({
                type:'GET',
                url:"{{ url('sekolah-master/status-siswa') }}",
                dataType: 'json',
                data: {kode_pp:kode_pp},
                async: false,
                success: function(result) {
                    
                    var select = $('#inp-filter_status').selectize();
                    select = select[0];
                    var control = select.selectize;
                    control.clearOptions();
                    if(result.status) {
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].nama, value:result.daftar[i].nama}]); 
                        }
                        control.setValue('Aktif');
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
        
        // getTASts();

        $('#inp-filter_kode_pp').change(function(){
            getTASts($(this).val());
            jumFilter();
        });

        $('#inp-filter_status').change(function(){
            jumFilter();
        });

        // LIST DATA
        var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
        var dataTable = $('#table-data').DataTable({
            destroy: true,
            bLengthChange: false,
            sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            "ordering": true,
            "order": [[6, "desc"]],
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
                    "targets": [6],
                    "visible": false,
                    "searchable": true
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
                { data: 'nama_status' },
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

        // SUGGESTION
        var $dtPP = new Array();
        var $dtAngkatan = new Array();
        var $dtKelas = new Array();
        var $dtParam = new Array();
        
        function getDtPP() {
            $.ajax({
                type:'GET',
                url:"{{ url('sekolah-master/pp') }}",
                dataType: 'json',
                async: false,
                success: function(result) {
                    if(result.status) {
                        for(i=0;i<result.daftar.length;i++){
                            $dtPP[i] = {id:result.daftar[i].kode_pp,name:result.daftar[i].nama};  
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

        function getDtAngkatan(kode_pp) {
            $.ajax({
                type:'GET',
                url:"{{ url('sekolah-master/angkatan') }}",
                dataType: 'json',
                data:{kode_pp:kode_pp},
                async: false,
                success: function(result) {
                    if(result.status) {
                    
                        for(i=0;i<result.daftar.length;i++){
                            $dtAngkatan[i] = {id:result.daftar[i].kode_akt,name:result.daftar[i].nama};  
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

        function getDtKelas(kode_pp) {
            $.ajax({
                type:'GET',
                url:"{{ url('sekolah-master/kelas') }}",
                dataType: 'json',
                data:{kode_pp: kode_pp},
                async: false,
                success: function(result) {
                    if(result.status) {
                    
                        for(i=0;i<result.daftar.length;i++){
                            $dtKelas[i] = {id:result.daftar[i].kode_kelas,name:result.daftar[i].nama};  
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

        function getDtParam(kode_pp,kode_akt,kode_jur,kode_tingkat) {
            $.ajax({
                type:'GET',
                url:"{{ url('sekolah-trans/siswa-param') }}",
                dataType: 'json',
                data: {kode_pp:kode_pp,kode_akt:kode_akt,kode_jur:kode_jur,kode_tingkat:kode_tingkat},
                async: false,
                success: function(result) {
                    $dtParam = new Array();
                    if(result.status) {
                    
                        for(i=0;i<result.daftar.length;i++){
                            $dtParam[i] = {id:result.daftar[i].kode_param,name:result.daftar[i].nama};  
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

        // getDtPP();
        
        // $('#kode_pp').typeahead({
        //     source:$dtPP,
        //     fitToElement:true,
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
        // END SUGGESTION

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
            if("{{ Session::get('kodePP') }}" != ""){
                $('#kode_pp').val("{{ Session::get('kodePP') }}");
                $('#kode_pp').trigger('change');
            }
            $('#nis').attr('readonly', false);
            $('#input-param tbody').html('');
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
                case 'flag_aktif': 
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
                        // if(par == "kode_pp"){
                        //     $('#kode_akt').typeahead({
                        //         source:$dtAngkatan,
                        //         fitToElement:true,
                        //         displayText:function(item){
                        //             return item.id+' - '+item.name;
                        //         },
                        //         autoSelect:false,
                        //         changeInputOnSelect:false,
                        //         changeInputOnMove:false,
                        //         selectOnBlur:false,
                        //         afterSelect: function (item) {
                        //             console.log(item.id);
                        //         }
                        //     });
                        //     $('#kode_kelas').typeahead({
                        //         source:$dtKelas,
                        //         fitToElement:true,
                        //         displayText:function(item){
                        //             return item.id+' - '+item.name;
                        //         },
                        //         autoSelect:false,
                        //         changeInputOnSelect:false,
                        //         changeInputOnMove:false,
                        //         selectOnBlur:false,
                        //         afterSelect: function (item) {
                        //             console.log(item.id);
                        //         }
                        //     });
                        // }
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
                        }
                        else if(par == "kode_param[]"){
                            $($target).closest('tr').find($target4).click();
                            setTimeout(function() {  $($target).parents("tr").find(".inp-tarif").focus(); }, 50);
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
                success:function(res){   
                    var result = res.data; 
                    if(result.status){
                        if(typeof result.data !== 'undefined' && result.data.length>0){
                            $('#flag_aktif').val(result.data[0].kode_ss);
                            $('#label_flag_aktif').val(result.data[0].nama);
                        }else{
                            $('#flag_aktif').val('');
                            $('#label_flag_aktif').val('');
                            $('#flag_aktif').focus();
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
            var kode_akt = $('#kode_akt').val();
            var kode_jur = $('#kode_jur').val();
            var kode_tingkat = $('#kode_tingkat').val();
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-trans/siswa-param') }}",
                dataType: 'json',
                data:{kode_param:kode,kode_pp:kode_pp,kode_akt:kode_akt,kode_jur:kode_jur,kode_tingkat:kode_tingkat},
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

                                $("#input-param td").removeClass("px-0 py-0 aktif");
                                $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                                $('.'+target1).closest('tr').find('.search-akun').hide();
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
            // getDtAngkatan(par);
            // getDtKelas(par);
            // $('#kode_akt').typeahead({
            //     source:$dtAngkatan,
            //     fitToElement:true,
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
            // $('#kode_kelas').typeahead({
            //     source:$dtKelas,
            //     fitToElement:true,
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
            // var kode_akt = $('#kode_akt').val();
            // var kode_jur = $('#kode_jur').val();
            // var kode_tingkat = $('#kode_tingkat').val();
            // if(par != "" && kode_jur != "" && kode_tingkat != "" && kode_akt != ""){
            //     getDtParam(par,kode_akt,kode_jur,kode_tingkat);
            // }
        });

        $('#form-tambah').on('change', '#kode_akt', function(){
            var par = $(this).val();
            getAngkatan(par);
            // var kode_pp = $('#kode_pp').val();
            // var kode_akt = $('#kode_akt').val();
            // var kode_jur = $('#kode_jur').val();
            // var kode_tingkat = $('#kode_tingkat').val();
            // if(kode_pp != "" && kode_jur != "" && kode_tingkat != "" && kode_akt != ""){
            //     getDtParam(par,kode_akt,kode_jur,kode_tingkat);
            // }
        });

        $('#form-tambah').on('change', '#kode_kelas', function(){
            var par = $(this).val();
            getKelas(par);
            // var kode_pp = $('#kode_pp').val();
            // var kode_akt = $('#kode_akt').val();
            // var kode_jur = $('#kode_jur').val();
            // var kode_tingkat = $('#kode_tingkat').val();
            // if(kode_pp != "" && kode_jur != "" && kode_tingkat != "" && kode_akt != ""){
            //     getDtParam(par,kode_akt,kode_jur,kode_tingkat);
            // }
        });

        $('#form-tambah').on('change', '#kode_jur', function(){
            var par = $(this).val();
            getJurusan(par);
            // var kode_pp = $('#kode_pp').val();
            // var kode_akt = $('#kode_akt').val();
            // var kode_jur = $('#kode_jur').val();
            // var kode_tingkat = $('#kode_tingkat').val();
            // if(kode_pp != "" && kode_jur != "" && kode_tingkat != "" && kode_akt != ""){
            //     getDtParam(par,kode_akt,kode_jur,kode_tingkat);
            // }
        });

        $('#form-tambah').on('change', '#kode_tingkat', function(){
            var par = $(this).val();
            getTingkat(par);
            // var kode_pp = $('#kode_pp').val();
            // var kode_akt = $('#kode_akt').val();
            // var kode_jur = $('#kode_jur').val();
            // var kode_tingkat = $('#kode_tingkat').val();
            // if(kode_pp != "" && kode_jur != "" && kode_tingkat != "" && kode_akt != ""){
            //     getDtParam(par,kode_akt,kode_jur,kode_tingkat);
            // }
        });

        
        $('#form-tambah').on('change', '#flag_aktif', function(){
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
        $('#form-tambah').validate({
            ignore: [],
            rules: 
            {
                nis:{
                    required: true,
                    maxlength:50   
                },
                nama:{
                    required: true,
                    maxlength:100   
                },
                id_bank:{
                    required: true,
                    maxlength:30    
                },
                kode_pp:{
                    required: true,
                    maxlength:10  
                },
                kode_akt:
                {
                    required: true,
                    maxlength:10
                },
                kode_kelas:
                {
                    required: true,
                    maxlength:10
                },
                flag_aktif:
                {
                    required: true,
                    maxlength:1
                },
                tgl_lulus:
                {
                    required: true
                }
            },
            errorElement: "label",
            submitHandler: function (form) {
                var parameter = $('#id_edit').val();
                var id = $('#nis').val();

                if(parameter == "edit"){
                    var url = "{{ url('sekolah-trans/siswa') }}";
                    var pesan = "updated";
                    var text = "Perubahan data "+id+" telah tersimpan";
                }else{
                    var url = "{{ url('sekolah-trans/siswa') }}";
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
                            $('#judul-form').html('Tambah Data Siswa');
                            $('#input-param tbody').html('');
                            $('#method').val('post');
                            $('#nis').attr('readonly', false);
                            msgDialog({
                                id:result.data.nis,
                                type:'simpan'
                            });
                            last_add("nis",result.data.nis);
                            
                        
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
                url: "{{ url('sekolah-trans/siswa') }}",
                dataType: 'json',
                data: {nis : id, kode_pp : kode_pp},
                async:false,
                success:function(result){
                    if(result.data.status){
                        dataTable.ajax.reload(); 
                        $('#btn-tampil').click();                       
                        showNotification("top", "center", "success",'Hapus Data','Data Siswa ('+id+') berhasil dihapus ');
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
            $('#judul-form').html('Edit Data Siswa');
            var id= $(this).closest('tr').find('td').eq(0).html(); 
            var tmp = $(this).closest('tr').find('td').eq(2).html().split("-");
            var kode_pp = tmp[0];

            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-trans/siswa-detail') }}",
                dataType: 'json',
                data:{nis: id, kode_pp:kode_pp},
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        $('#id_edit').val('edit');
                        $('#method').val('put');
                        $('#nis').val(id);
                        $('#nis').attr('readonly', true);
                        $('#nama').val(result.data[0].nama);
                        $('#id_bank').val(result.data[0].id_bank);
                        $('#kode_pp').val(result.data[0].kode_pp);
                        $('#labe_kode_pp').val(result.data[0].nama_pp);
                        $('#kode_akt').val(result.data[0].kode_akt);
                        $('#kode_kelas').val(result.data[0].kode_kelas);
                        $('#label_kode_kelas').val(result.data[0].nama_kelas);
                        $('#kode_jur').val(result.data[0].kode_jur);
                        $('#label_kode_jur').val(result.data[0].nama_jur);
                        $('#kode_tingkat').val(result.data[0].kode_tingkat);
                        $('#label_kode_tingkat').val(result.data[0].nama_tingkat);
                        $('#flag_aktif').val(result.data[0].flag_aktif);
                        $('#label_flag_aktif').val(result.data[0].nama_status);
                        $('#tgl_lulus').val(result.data[0].tgl_lulus);
                        var input = "";
                        $('#input-param tbody').html('');
                        if(result.data_detail.length > 0){
                            var no=1;
                            for(var i=0;i<result.data_detail.length;i++){
                                var line = result.data_detail[i];
                                input += "<tr class='row-param'>";
                                input += "<td class='no-param text-center'>"+no+"</td>";
                                input += "<td><span class='td-kode_param tdparamke"+no+" tooltip-span'>"+line.kode_param+"</span><input type='text' name='kode_param[]' class='form-control inp-kode_param paramke"+no+" hidden' value='"+line.kode_param+"' required='' style='z-index: 1;position: relative;'  id='paramkode"+no+"'><a href='#' class='search-item search-param hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama_param tdnmparamke"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama_param[]' class='form-control inp-nama_param nmparamke"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                                input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'>"+format_number(line.tarif)+"</span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='"+parseFloat(line.tarif)+"' required></td>";
                                input += "<td><span class='td-periodeawl tdperiodeawlke"+no+" tooltip-span'>"+line.per_awal+"</span><select hidden name='per_awal[]' class='form-control inp-periodeawl periodeawlke"+no+"' value='' required></select></td>";
                                input += "<td><span class='td-periodeakr tdperiodeakrke"+no+" tooltip-span'>"+line.per_akhir+"</span><select hidden name='per_akhir[]' class='form-control inp-periodeakr periodeakrke"+no+"' value='' required></select></td>";
                                input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            
                                input += "</tr>";
                                no++;
                            }
                            $('#input-param tbody').append(input);
                            $('.tooltip-span').tooltip({
                                title: function(){
                                    return $(this).text();
                                }
                            });
                            no= 1;
                            for(var i=0;i<result.data_detail.length;i++){
                                var line =result.data_detail[i];
                                getPeriodeParam($('#kode_pp').val(),'periodeawlke'+no,'periodeakrke'+no,line.per_awal,line.per_akhir);
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
                                no++;
                            }
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

        // $('#table-data tbody').on('click','td',function(e){
        //     if($(this).index() != 5){

        //         var id = $(this).closest('tr').find('td').eq(0).html();
        //         var tmp = $(this).closest('tr').find('td').eq(2).html().split("-");
        //         var kode_pp = tmp[0];
        //         $.ajax({
        //             type: 'GET',
        //             url: "{{ url('sekolah-trans/siswa-detail') }}",
        //             dataType: 'json',
        //             data:{nis: id, kode_pp:kode_pp},
        //             async:false,
        //             success:function(res){
        //                 var result= res.data;
        //                 if(result.status){
        //                     var line = result.data[0];
        //                     var html = `<tr>
        //                         <td style='border:none'>NIS</td>
        //                         <td style='border:none'>`+id+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>ID Bank</td>
        //                         <td>`+line.id_bank+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>Nama</td>
        //                         <td>`+line.nama+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>PP</td>
        //                         <td>`+line.kode_pp+` - `+line.nama_pp+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>Angkatan</td>
        //                         <td>`+line.kode_akt+` - `+line.nama_akt+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>Kelas</td>
        //                         <td>`+line.kode_kelas+` - `+line.nama_kelas+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>Jurusan</td>
        //                         <td>`+line.kode_jur+` - `+line.nama_jur+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>Tingkat</td>
        //                         <td>`+line.kode_tingkat+` - `+line.nama_tingkat+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>Status</td>
        //                         <td>`+line.flag_aktif+` - `+line.nama_status+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td>Tgl Lulus</td>
        //                         <td>`+line.tgl_lulus+`</td>
        //                     </tr>
        //                     <tr>
        //                         <td colspan='2'>
        //                             <table id='table-param-preview' class='table table-bordered'>
        //                                 <thead>
        //                                     <tr>
        //                                         <th style="width:3%">No</th>
        //                                         <th style="width:15%">Kode Param</th>
        //                                         <th style="width:30%">Nama Param</th>
        //                                         <th style="width:17%">Tarif</th>
        //                                         <th style="width:15">Periode Awal</th>
        //                                         <th style="width:15">Periode Akhir</th>
        //                                     </tr>
        //                                 </thead>
        //                                 <tbody>
        //                                 </tbody>
        //                             </table>
        //                         </td>
        //                     </tr>
        //                     `;
        //                     $('#table-preview tbody').html(html);
        //                     var det = ``;
        //                     if(result.data_detail.length > 0){
        //                         var input = '';
        //                         var no=1;
        //                         for(var i=0;i<result.data_detail.length;i++){
        //                             var line2 =result.data_detail[i];
        //                             input += "<tr>";
        //                             input += "<td>"+no+"</td>";
        //                             input += "<td >"+line2.kode_param+"</td>";
        //                             input += "<td >"+line2.nama+"</td>";
        //                             input += "<td class='text-right'>"+format_number(line2.tarif)+"</td>";
        //                             input += "<td >"+line2.per_awal+"</td>";
        //                             input += "<td >"+line2.per_akhir+"</td>";
        //                             input += "</tr>";
        //                             no++;
        //                         }
        //                         $('#table-param-preview tbody').html(input);
        //                     }
        //                     $('#modal-preview-id').text(id);
        //                     $('#modal-preview-kode').text(line.kode_pp);
        //                     $('#modal-preview').modal('show');
        //                 }
        //                 else if(!result.status && result.message == 'Unauthorized'){
        //                     window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
        //                 }
        //             }
        //         });
        //     }
        // });

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
            $('#judul-form').html('Edit Data Siswa');
            var id= $('#modal-preview-id').text(); 
            var kode_pp = $('#modal-preview-kode').text();

            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah-trans/siswa-detail') }}",
                dataType: 'json',
                data:{nis: id, kode_pp:kode_pp},
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        $('#id_edit').val('edit');
                        $('#method').val('put');
                        $('#nis').val(id);
                        $('#nis').attr('readonly', true);
                        $('#nama').val(result.data[0].nama);
                        $('#id_bank').val(result.data[0].id_bank);
                        $('#kode_pp').val(result.data[0].kode_pp);
                        $('#labe_kode_pp').val(result.data[0].nama_pp);
                        $('#kode_akt').val(result.data[0].kode_akt);
                        $('#kode_kelas').val(result.data[0].kode_kelas);
                        $('#label_kode_kelas').val(result.data[0].nama_kelas);
                        $('#kode_jur').val(result.data[0].kode_jur);
                        $('#label_kode_jur').val(result.data[0].nama_jur);
                        $('#kode_tingkat').val(result.data[0].kode_tingkat);
                        $('#label_kode_tingkat').val(result.data[0].nama_tingkat);
                        $('#flag_aktif').val(result.data[0].flag_aktif);
                        $('#label_flag_aktif').val(result.data[0].nama_status);
                        $('#tgl_lulus').val(result.data[0].tgl_lulus);
                        var input = "";
                        $('#input-param tbody').html('');
                        if(result.data_detail.length > 0){
                            
                            var no=1;
                            for(var i=0;i<result.data_detail.length;i++){
                                var line = result.data_detail[i];
                                input += "<tr class='row-param'>";
                                input += "<td class='no-param text-center'>"+no+"</td>";
                                input += "<td><span class='td-kode_param tdparamke"+no+" tooltip-span'>"+line.kode_param+"</span><input type='text' name='kode_param[]' class='form-control inp-kode_param paramke"+no+" hidden' value='"+line.kode_param+"' required='' style='z-index: 1;position: relative;'  id='paramkode"+no+"'><a href='#' class='search-item search-param hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama_param tdnmparamke"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama_param[]' class='form-control inp-nama_param nmparamke"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                                input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'>"+format_number(line.tarif)+"</span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='"+parseFloat(line.tarif)+"' required></td>";
                                input += "<td><span class='td-periodeawl tdperiodeawlke"+no+" tooltip-span'>"+line.per_awal+"</span><select hidden name='per_awal[]' class='form-control inp-periodeawl periodeawlke"+no+"' value='' required></select></td>";
                                input += "<td><span class='td-periodeakr tdperiodeakrke"+no+" tooltip-span'>"+line.per_akhir+"</span><select hidden name='per_akhir[]' class='form-control inp-periodeakr periodeakrke"+no+"' value='' required></select></td>";
                                input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            
                                input += "</tr>";
                                no++;
                            }
                            $('#input-param tbody').append(input);
                            $('.tooltip-span').tooltip({
                                title: function(){
                                    return $(this).text();
                                }
                            });
                            no= 1;
                            for(var i=0;i<result.data_detail.length;i++){
                                var line =result.data_detail[i];
                                getPeriodeParam($('#kode_pp').val(),'periodeawlke'+no,'periodeakrke'+no,line.per_awal,line.per_akhir);
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
                                no++;
                            }
                        }
                        $('#row-id').show();
                        $('#saku-datatable').hide();
                        $('#saku-form').show();
                        $('#modal-preview').modal('hide');
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
            // $('#dropdownAksi').dropdown('toggle');
            e.stopPropagation();
            $('.dropdown-ke1').removeClass('hidden');
            $('.dropdown-ke2').addClass('hidden');
        });
        // END PREVIEW

        // HANDLER untuk enter dan tab
        $('#nis,#id_bank,#nama,#kode_pp,#kode_akt,#kode_kelas,#flag_aktif,#tgl_lulus').keydown(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['nis','id_bank','nama','kode_pp','kode_akt','kode_kelas','flag_aktif','tgl_lulus'];
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
            input += "<td><span class='td-periodeawl tdperiodeawlke"+no+" tooltip-span'></span><select hidden name='per_awal[]' class='form-control inp-periodeawl periodeawlke"+no+"' value='' required></select></td>";
            input += "<td><span class='td-periodeakr tdperiodeakrke"+no+" tooltip-span'></span><select hidden name='per_akhir[]' class='form-control inp-periodeakr periodeakrke"+no+"' value='' required></select></td>";
            
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

        function hideUnselectedRow() {
            $('#input-param > tbody > tr').each(function(index, row) {
                if(!$(row).hasClass('selected-row')) {

                    var kode_param = $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-kode_param").val();
                    var nama_param = $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-nama_param").val();
                    var tarif = $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-tarif").val();
                    var per_awal = $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-periodeawl  option:selected").text();
                    var per_akhir = $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-periodeakr  option:selected").text();
                
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-kode_param").val(kode_param);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-kode_param").text(kode_param);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-nama_param").val(nama_param);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-nama_param").text(nama_param);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-tarif").val(tarif);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-tarif").text(tarif);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-periodeawl")[0].selectize.setValue(per_awal);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-periodeawl").text(per_awal);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-periodeakr")[0].selectize.setValue(per_akhir);
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-periodeakr").text(per_akhir);

                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-kode_param").hide();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-kode_param").show();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".search-param").hide();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-nama_param").hide();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-nama_param").show();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".selectize-control.inp-periodeawl").hide();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".selectize-control.inp-periodeakr").hide();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-periodeawl").show();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-periodeakr").show();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".inp-tarif").hide();
                    $('#input-param > tbody > tr:eq('+index+') > td').find(".td-tarif").show();
                }
            })
        }

        $('#input-param tbody').on('click', 'tr', function(){
            $(this).addClass('selected-row');
            $('#input-param tbody tr').not(this).removeClass('selected-row');
            hideUnselectedRow();
        });


        $('#input-param').on('keydown','.inp-kode_param, .inp-nama_param, .inp-tarif, .inp-periodeawl, .inp-periodeakr',function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['.inp-kode_param','.inp-nama_param','.inp-tarif','.inp-periodeawl','.inp-periodeakr'];
            var nxt2 = ['.td-kode_param','.td-nama_param','.td-tarif','.td-periodeawl','.td-periodeakr'];
            if (code == 13 || code == 9) {
                e.preventDefault();
                var idx = $(this).closest('td').index()-1;
                var idx_next = idx+1;
                var kunci = $(this).closest('td').index()+1;
                var isi = $(this).val();
                console.log(idx);
                switch (idx) {
                    case 0:
                        var noidx = $(this).parents("tr").find(".no-param").text();
                        var kode = $(this).val();
                        var target1 = "paramke"+noidx;
                        var target2 = "nmparamke"+noidx;
                        var target3 = "tarifke"+noidx;
                        getParam(kode,target1,target2,target3,'tab');                    
                        break;
                    case 1:
                        $("#input-param td").removeClass("px-0 py-0 aktif");
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
                        if(isi != "" && isi != 0){
                            $("#input-param td").removeClass("px-0 py-0 aktif");
                            $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                            $(this).closest('tr').find(nxt[idx]).val(isi);
                            $(this).closest('tr').find(nxt2[idx]).text(isi);
                            $(this).closest('tr').find(nxt[idx]).hide();
                            $(this).closest('tr').find(nxt2[idx]).show();

                            $(this).parents("tr").find(".selectize-control.inp-periodeawl").show();
                            $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                            $(this).closest('tr').find(nxt2[idx_next]).hide();
                        }else{
                            alert('Tarif yang dimasukkan tidak valid');
                            return false;
                        }
                        break;
                    case 3:
                        console.log(nxt[idx]);
                        var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                        $("#input-param td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control.inp-periodeawl").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        
                        $(this).parents("tr").find(".selectize-control.inp-periodeakr").show();
                        $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
            
                        break;
                    case 4:
                        var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                        $("#input-param td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control.inp-periodeakr").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        var cek = $(this).parents('tr').next('tr').find('.td-kode_param');
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
            var kode_pp = $('#kode_pp').val();
            var kode_akt = $('#kode_akt').val();
            var kode_jur = $('#kode_jur').val();
            var kode_tingkat = $('#kode_tingkat').val();
            if(kode_pp != "" && kode_akt != "" && kode_jur != "" && kode_tingkat != ""){

                var no=$('#input-param .row-param:last').index();
                no=no+2;
                var input = "";
                input += "<tr class='row-param'>";
                input += "<td class='no-param text-center'>"+no+"</td>";              
                input += "<td><span class='td-kode_param tdparamke"+no+" tooltip-span'></span><input type='text' name='kode_param[]' class='form-control inp-kode_param paramke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'  id='paramkode"+no+"'><a href='#' class='search-item search-param hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                input += "<td><span class='td-nama_param tdnmparamke"+no+" tooltip-span'></span><input type='text' name='nama_param[]' class='form-control inp-nama_param nmparamke"+no+" hidden'  value='' readonly></td>";
                input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'></span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='' required></td>";
                input += "<td><span class='td-periodeawl tdperiodeawlke"+no+" tooltip-span'></span><select hidden name='per_awal[]' class='form-control inp-periodeawl periodeawlke"+no+"' value='' required></select></td>";
                input += "<td><span class='td-periodeakr tdperiodeakrke"+no+" tooltip-span'></span><select hidden name='per_akhir[]' class='form-control inp-periodeakr periodeakrke"+no+"' value='' required></select></td>";
                
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
                
                
                hitungTotalRow();
                hideUnselectedRow();

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
            }else{
                alert('Harap pilih terlebih dahulu PP, Angkatan, Jurusan dan Tingkat untuk menambah baris siswa !');
            }
        });

        // $('#input-param tbody').on('click', 'tr', function(){
        //     if ( $(this).hasClass('selected-row') ) {
        //         $(this).removeClass('selected-row');
        //     }
        //     else {
        //         $('#input-param tbody tr').removeClass('selected-row');
        //         $(this).addClass('selected-row');
        //     }
        // });
        

        $('.nav-control').on('click', '#copy-row', function(){
            if($(".selected-row").length != 1){
                alert('Harap pilih row yang akan dicopy terlebih dahulu!');
                return false;
            }else{
                var kode_param = $('#input-param tbody tr.selected-row').find(".inp-kode_param").val();
                var nama_param = $('#input-param tbody tr.selected-row').find(".inp-nama_param").val();
                var tarif = $('#input-param tbody tr.selected-row').find(".inp-tarif").val();
                var per_awal = $('#input-param tbody tr.selected-row').find(".inp-periodeawl option:selected ").text();
                var per_akhir = $('#input-param tbody tr.selected-row').find(".inp-periodeakr  option:selected ").text();
                var no=$('#input-param .row-param:last').index();
                no=no+2;
                var input = "";
                input += "<tr class='row-param'>";
                input += "<td class='no-param text-center'>"+no+"</td>";
                input += "<td><span class='td-kode_param tdparamke"+no+" tooltip-span'>"+kode_param+"</span><input type='text' name='kode_param[]' class='form-control inp-kode_param paramke"+no+" hidden' value='"+kode_param+"' required='' style='z-index: 1;position: relative;'  id='paramkode"+no+"'><a href='#' class='search-item search-param hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                input += "<td><span class='td-nama_param tdnmparamke"+no+" tooltip-span'>"+nama_param+"</span><input type='text' name='nama_param[]' class='form-control inp-nama_param nmparamke"+no+" hidden'  value='"+nama_param+"' readonly></td>";
                input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'>"+format_number(tarif)+"</span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='"+tarif+"' required></td>";
                input += "<td><span class='td-periodeawl tdperiodeawlke"+no+" tooltip-span'>"+per_awal+"</span><select hidden name='per_awal[]' class='form-control inp-periodeawl periodeawlke"+no+"' value='' required></select></td>";
                input += "<td><span class='td-periodeakr tdperiodeakrke"+no+" tooltip-span'>"+per_akhir+"</span><select hidden name='per_akhir[]' class='form-control inp-periodeakr periodeakrke"+no+"' value='' required></select></td>";
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
            hitungTotalRow();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
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

        $('#btn-reset').click(function(e){
            e.preventDefault();
            $('#inp-filter_kode_pp')[0].selectize.setValue('');
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
    </script>