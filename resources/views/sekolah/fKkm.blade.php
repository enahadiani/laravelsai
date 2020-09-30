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

    </style>
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data KKM</h5>
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
                                    <th>Kode KKM</th>
                                    <th>Kode TA</th>
                                    <th>Kode Tingkat</th>
                                    <th>Kode Jurusan</th>
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
                <div class="card" style="min-height:560px !important">
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
                                <input class="form-control" type="text" id="kode_kkm" name="kode_kkm" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pp" class="col-3 col-form-label">Kode PP</label>
                            <div class="input-group col-3">
                                <input type='text' name="kode_pp" id="kode_pp" class="form-control" value="" required>
                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-6">
                                <label id="label_kode_pp" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_ta" class="col-3 col-form-label">Tahun Ajaran</label>
                            <div class="input-group col-3">
                                <input type='text' name="kode_ta" id="kode_ta" class="form-control" value="" required>
                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                                <div class="col-6">
                                    <label id="label_kode_ta" style="margin-top: 10px;"></label>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_tingkat" class="col-3 col-form-label">Tingkat</label>
                            <div class="input-group col-3">
                                <input type='text' name="kode_tingkat" id="kode_tingkat" class="form-control" value="" required>
                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                                <div class="col-6">
                                    <label id="label_kode_tingkat" style="margin-top: 10px;"></label>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_jur" class="col-3 col-form-label">Jurusan</label>
                            <div class="input-group col-3">
                                <input type='text' name="kode_jur" id="kode_jur" class="form-control" value="" required>
                                    <i class='fa fa-search search-item2'' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                             </div>
                                <div class="col-6">
                                    <label id="label_kode_jur" style="margin-top: 10px;"></label>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="flag_aktif" class="col-3 col-form-label">Status</label>
                            <div class="col-3">
                                <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                    <option value='' disabled>--- Pilih Status Aktif ---</option>
                                    <option value='1'>Aktif</option>
                                    <option value='0'>Non Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                            <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                            <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                            <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                        </div>
                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                            <style>
                                th{
                                    vertical-align:middle !important;
                                }
                                /* #input-jurnal td{
                                    padding:0 !important;
                                } */
                                #input-jurnal .selectize-input, #input-jurnal .form-control, #input-jurnal .custom-file-label{
                                    border:0 !important;
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
                                    background:#4286f5 !important;
                                    color:white;
                                }
                                #input-jurnal td:hover{
                                    background:#f4d180 !important;
                                    color:white;
                                }
                                #input-jurnal td{
                                    overflow:hidden !important;
                                }

                                #input-jurnal td:nth-child(4){
                                    overflow:unset !important;
                                }
                            </style>
                            <table class="table table-striped table-bordered table-condensed gridexample" id="input-kkm" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                            <thead style="background:#ff9500;color:white">
                                <tr>
                                    <th style="width:3%">No</th>
                                    <th style="width:10%">Kode Matpel</th>
                                    <th style="width:20%">Nama Matpel</th>
                                    <th style="width:22%">KKM</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            </table>
                        </div>
                      
                        <!-- <button type="button" href="#" id="add-row" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

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

    <!-- MODAL SEARCH AKUN-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script>
        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

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

        function getPP(){
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var select2 = $('#kode_pp2').selectize();
                            select2 = select2[0];
                            var control2 = select2.selectize;
                            for(i=0;i<result.daftar.length;i++){
                                control2.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp + '-' + result.daftar[i].nama}]);
                            }
                        }
                    }
                }
            });
        }

    getPP();

    function getDataPP(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#kode_pp').val(result.daftar[0].kode_pp);
                            $('#label_kode_pp').text(result.daftar[0].nama);
                        }else{
                            alert('Kode PP tidak valid');
                            $('#kode_pp').val('');
                            $('#kode_pp').focus();
                        }
                    }
                }
            });
    }

    function getLabelDataPP(id){
            $.ajax({
                type: 'GET',
                url: "{{ url('sekolah/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_pp === id){
                                $('#label_kode_pp').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode PP tidak valid');
                            $('#kode_pp').val('');
                            $('#kode_pp').focus();
                        }
                    }
                }
            });
    }

    function getTahunAjaran(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/sekolah/getDataTahunAjaran')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_ta').val(result.daftar[0].kode_ta);
                         $('#label_kode_ta').text(result.daftar[0].nama);
                    }else{
                        alert('Kode TA tidak valid');
                        $('#kode_ta').val('');
                        $('#kode_ta').focus();
                    }
                }
            }
        });
    }

    function getLabelTahunAjaran(ta){
        $.ajax({
            type: 'GET',
            url: "{{url('/sekolah/getDataTahunAjaran')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].kode_ta === ta){
                            $('#label_kode_ta').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('Tahun ajaran tidak valid');
                        $('#kode_ta').val('');
                        $('#kode_ta').focus();
                    }
                }
            }
        });
    }

    function getTingkatan(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/sekolah/getTingkatan')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_tingkat').val(result.daftar[0].kode_ta);
                         $('#label_kode_tingkat').text(result.daftar[0].nama);
                    }else{
                        alert('Tahun ajaran tidak valid');
                        $('#kode_tingkat').val('');
                        $('#kode_tingkat').focus();
                    }
                }
            }
        });
    }

    function getLabelTingkatan(kode){
        $.ajax({
            type: 'GET',
            url: "{{url('/sekolah/getTingkatan')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].kode_tingkat === kode){
                            $('#label_kode_tingkat').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('Tingkatan tidak valid');
                        $('#kode_tingkat').val('');
                        $('#kode_tingkat').focus();
                    }
                }
            }
        });
    }

    function getJurusan(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/sekolah/getDataJurusan')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_jur').val(result.daftar[0].kode_jur);
                         $('#label_kode_jur').text(result.daftar[0].nama);
                    }else{
                        alert('Tahun ajaran tidak valid');
                        $('#kode_jur').val('');
                        $('#kode_jur').focus();
                    }
                }
            }
        });
    }

    function getLabelJurusan(kode){
        $.ajax({
            type: 'GET',
            url: "{{url('/sekolah/getDataJurusan')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].kode_jur === kode){
                            $('#label_kode_jur').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('Jurusan tidak valid');
                        $('#kode_jur').val('');
                        $('#kode_jur').focus();
                    }
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = $('#table-data').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        "ordering": true,
        "order": [[5, "desc"]],
        'ajax': {
            'url': "{{url('sekolah-master/kkm')}}",
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
            {'targets': 6, data: null, 'defaultContent': action_html }
        ],
        'columns': [
            { data: 'kode_kkm' },
            { data: 'kode_ta' },
            { data: 'kode_tingkat' },
            { data: 'kode_jur' },
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

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#label_kode_pp').text('');
        $('#label_kode_ta').text('');
        $('#label_kode_tingkat').text('');
        $('#label_kode_jur').text('');
        $('#input-kkm tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#flag_aktif')[0].selectize.setValue('');
        // $('#form-tambah #add-row').click();
    });

     $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        console.log(this);
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

        function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'kode_matpel[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sekolah/getDataMatpel') }}";
                var columns = [
                    { data: 'kode_matpel' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Matpel";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
            break;
            case 'kode_jur':
            header = ['Kode', 'Nama'];
            var toUrl = "{{url('/sekolah/getDataJurusan')}}";
                var columns = [
                    { data: 'kode_jur' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Jurusan";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'kode_tingkat':
            header = ['Kode', 'Nama'];
            var toUrl = "{{url('/sekolah/getTingkatan')}}";
                var columns = [
                    { data: 'kode_tingkat' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Tingkatan";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'kode_ta':
            header = ['Kode', 'Nama'];
            var toUrl = "{{url('/sekolah/getDataTahunAjaran')}}";
                var columns = [
                    { data: 'kode_ta' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Tahun Ajaran";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'kode_pp': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('sekolah/getPP') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
        }

        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table class='table table-bordered table-striped' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            // fixedHeader: true,
            // "scrollY": "300px",
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": toUrl,
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            "columnDefs": [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': columns
            // "iDisplayLength": 25,
        });

        // searchTable.$('tr.selected').removeClass('selected');
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).attr('value',kode);
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
            console.log($target3);
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
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
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
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

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getDataPP(par);
    });

    $('#form-tambah').on('change', '#kode_ta', function(){
        var par = $(this).val();
        getTahunAjaran(par);
    });

    $('#form-tambah').on('change', '#kode_tingkat', function(){
        var par = $(this).val();
        getTingkatan(par);
    });

    $('#form-tambah').on('change', '#kode_jur', function(){
        var par = $(this).val();
        getJurusan(par);
    });

    $('#form-tambah').on('click', '#add-row', function(){
        var no=$('#input-kkm .row-kkm:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-kkm'>";
        input += "<td class='no-kkm text-center'>"+no+"</td>";
        input += "<td><span class='td-matpel tdmatpelke"+no+"'></span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nmatpel tdnmmatpelke"+no+"'></span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmmatpelke"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-kkm tdkkmke"+no+"'></span><input type='text' name='kkm[]' class='form-control inp-kkm kkmke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-kkm tbody').append(input);
        $('#input-kkm td').removeClass('px-0 py-0 aktif');
        $('#input-kkm tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-kkm tbody tr:last').find(".inp-matpel").show();
        $('#input-kkm tbody tr:last').find(".td-matpel").hide();
        $('#input-kkm tbody tr:last').find(".search-matpel").show();
        $('#input-kkm tbody tr:last').find(".inp-matpel").focus();

        $('.inp-kkm').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            onCleared: function () { self.Value(''); }
        });

    });

     $('#input-kkm').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-kkm').each(function(){
            var nom = $(this).closest('tr').find('.no-kkm');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-kkm tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-kkm tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-kkm').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-kkm td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_matpel = $(this).parents("tr").find(".inp-matpel").val();
                var nama_matpel = $(this).parents("tr").find(".inp-nmatpel").val();
                var kkm = $(this).parents("tr").find(".inp-kkm").val();
                var no = $(this).parents("tr").find(".no-kkm").text();
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
            }
        }
    });

    $('#input-kkm').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_matpel[]': 
                var par2 = "nama_matpel[]";

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

    $('#input-kkm').on('change', '.inp-matpel', function(e){
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

    function getMatpel(id,target1,target2,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('/sekolah/getMatpel') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                        }else{

                            $("#input-kkm td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-matpel').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('saku/login') }}";
                    })
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
                    }
                    alert('Kode akun tidak valid');
                }
            }
        });
    }

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            var kode_matpel = $('#input-kkm tbody tr.selected-row').find(".inp-matpel").val();
            var nama_matpel = $('#input-kkm tbody tr.selected-row').find(".inp-nmatpel").val();
            var kkm = $('#input-kkm tbody tr.selected-row').find(".inp-kkm").val();
            var no=$('#input-kkm .row-matpel:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-matpel'>";
            input += "<td class='no-matpel text-center'>"+no+"</td>";
            input += "<td ><span class='td-matpel tdmatpelke"+no+"'>"+kode_matpel+"</span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='"+kode_matpel+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nmatpel tdnmmatpelke"+no+"'>"+nama_matpel+"</span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmmatpelke"+no+" hidden'  value='"+nama_matpel+"' readonly></td>";
            input += "<td><span class='td-kkm tdkkmke"+no+"'>"+kkm+"</span><input type='text' name='kkm[]' class='form-control inp-kkm kkmke"+no+" hidden'  value='"+kkm+"' required></td>";
            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-kkm tbody').append(input);
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#kode_kkm').val();
        if(parameter == "edit"){
            var url = "{{ url('/sekolah/postKkm') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('/sekolah/postKkm') }}";
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
                    url: "{{ url('sekolah/deleteKkm') }}/"+kode +"/"+ kode_pp,
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

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var ta = $(this).closest('tr').find('td').eq(1).html();
        var tingkat = $(this).closest('tr').find('td').eq(2).html();
        var jur = $(this).closest('tr').find('td').eq(3).html();
        var tmp= $(this).closest('tr').find('td').eq(4).html();
        var tmp = tmp.split("-");
        var kode_pp = tmp[0];
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{url('/sekolah/getKkm')}}/"+id+"/"+kode_pp,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    console.log(result);
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_kkm').val(id);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#kode_ta').val(result.data[0].kode_ta);
                    $('#kode_tingkat').val(result.data[0].kode_tingkat);
                    $('#kode_jur').val(result.data[0].kode_jur);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    getLabelDataPP(kode_pp);
                    getLabelTahunAjaran(ta);
                    getLabelTingkatan(tingkat);
                    getLabelJurusan(jur);
                    if(res.data.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            var kkm = line.kkm.slice(0,-2);
                            input += "<tr class='row-matpel'>";
                            input += "<td class='no-matpel text-center'>"+no+"</td>";
                            input += "<td ><span class='td-matpel tdmatpelke"+no+"'>"+line.kode_matpel+"</span><input type='text' name='kode_matpel[]' class='form-control inp-matpel matpelke"+no+" hidden' value='"+line.kode_matpel+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-matpel hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nmatpel tdnmmatpelke"+no+"'>"+line.nama_matpel+"</span><input type='text' name='nama_matpel[]' class='form-control inp-nmatpel nmmatpelke"+no+" hidden'  value='"+line.nama_matpel+"' readonly></td>";
                            input += "<td><span class='td-kkm tdkkmke"+no+"'>"+kkm+"</span><input type='text' name='kkm[]' class='form-control inp-kkm kkmke"+no+" hidden'  value='"+kkm+"' required></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-kkm tbody').html(input);                        
                    }
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

    </script>