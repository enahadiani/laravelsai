    <!-- CSS tambahan -->
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
    <!-- LIST DATA -->
    <div class="row mb-3" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Konten</h5>
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
                    <table id="table-data" style='width:100%'>
                        <thead>
                            <tr>
                                <th width="15%">ID</th>
                                <th width="20%">Tanggal</th>
                                <th width="55%">Judul</th>
                                <th width="0%">Tgl Input</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-group row  ">
                            <label for="judul" class="col-md-2 col-sm-12 col-form-label">Judul</label>
                            <div class="col-md-6 col-sm-12">
                                <input class="form-control" type="text" placeholder="Judul Konten" id="judul" name="judul" required>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="tanggal" class="col-md-2 col-sm-2 col-form-label">Tanggal Publish</label>
                            <div class="col-md-3 col-sm-9">
                                <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                <i style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="header" class="col-md-2 col-sm-12 col-form-label">Header</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="header" name="header" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_header" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-md-2 col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-md-10 col-sm-12">
                                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_klp" class="col-md-2 col-sm-12 col-form-label">Kelompok</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_klp" name="kode_klp" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_klp" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div>
                        <!-- <div class="form-group row ">
                            <label for="kode_kategori" class="col-md-2 col-sm-12 col-form-label">Kategori</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_kategori" name="kode_kategori" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>                            
                            <div class="col-md-2 col-sm-12 px-0" >
                                <input id="label_kode_kategori" class="form-control" style="border:none;border-bottom: 1px solid #d7d7d7;"/>
                            </div>
                        </div> -->
                        <div class="form-group row ">
                            <label for="tag" class="col-md-2 col-sm-12 col-form-label">Tag</label>
                            <div class="col-md-6 col-sm-12" >
                                 <input class="form-control" type="text" data-role="tagsinput" id="tag" name="tag" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

    <!-- MODAL CBBL -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content">
                <div style="display: block;" class="modal-header">
                    <h5 class="modal-title" style="position: absolute;margin-bottom:10px"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL CBBL -->

    <!-- MODAL PREVIEW -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:0.75em">
                <div class="modal-header py-0" style="display:block;">
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Konten <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span> </h6>
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
                <div class="modal-body" id="content-preview" style="height:520px">
                    <table id="table-preview" class="table no-border">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL PREVIEW -->

    <!-- JAVASCRIPT  -->
    
    <script src="{{ asset('asset_dore/js/vendor/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $("#tag").tagsinput({
        cancelConfirmKeysOnEmpty: true
    });
    
    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    var editor = ClassicEditor.create( document.querySelector( '#keterangan' ) )
        .catch( error => {
            console.error( error );
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
        console.log('last-add');
        setTimeout(function() {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }
    
    // BAGIAN CBBL 
    var $target = "";
    var $target2 = "";
    function getHeader(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/konten-header') }}",
            dataType: 'json',
            data:{'id':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        $('#header').val(result.daftar[0].id);
                        $('#label_header').val(result.daftar[0].nama);
                    }else{
                        // alert('Kode Akun tidak valid');
                        $('#header').val('');
                        $('#label_header').val('');
                        $('#header').focus();
                    }
                }
            }
        });
    }

    function getKlp(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/konten-klp') }}",
            dataType: 'json',
            data:{'id':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        $('#kode_klp').val(result.daftar[0].kode_klp);
                        $('#label_kode_klp').val(result.daftar[0].nama);
                    }else{
                        // alert('Kode Akun tidak valid');
                        $('#kode_klp').val('');
                        $('#label_kode_klp').val('');
                        $('#kode_klp').focus();
                    }
                }
            }
        });
    }

    function getKategori(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/konten-kategori') }}",
            dataType: 'json',
            data:{'id':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        $('#kode_kategori').val(result.daftar[0].id);
                        $('#label_kode_kategori').val(result.daftar[0].nama);
                    }else{
                        // alert('Kode Akun tidak valid');
                        $('#kode_kategori').val('');
                        $('#label_kode_kategori').val('');
                        $('#kode_kategori').focus();
                    }
                }
            }
        });
    }

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'header': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('admginas-master/konten-header') }}";
                var columns = [
                    { data: 'id' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Header";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'kode_klp': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('admginas-master/konten-klp') }}";
                var columns = [
                    { data: 'kode_klp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Kelompok";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'kode_kategori': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('admginas-master/konten-kategori') }}";
                var columns = [
                    { data: 'kode_kategori' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Kategori";
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

        var table = "<table width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f><"clearfix">>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
            ajax: {
                "url": toUrl,
                "data": {'param':par},
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
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            },
        });

        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
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
                    $($target).val(kode);
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

    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('input').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    $('#form-tambah').on('change', '#header', function(){
        var par = $(this).val();
        getHeader(par);
    });

    $('#form-tambah').on('change', '#kode_klp', function(){
        var par = $(this).val();
        getKlp(par);
    });

    $('#form-tambah').on('change', '#kode_kategori', function(){
        var par = $(this).val();
        getKategori(par);
    });

    // END BAGIAN CBBL

    // SUGGESSION DI CBBL
    var $dtkonten = new Array();

    function getkontenAkun() {
        $.ajax({
            type:'GET',
            url:"{{ url('admginas-master/konten-akun') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    
                    for(i=0;i<result.daftar.length;i++){
                        $dtkonten[i] = {kode_akun:result.daftar[i].kode_akun};  
                    }
                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
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
                    window.location="{{ url('/admginas-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    // getkontenAkun();

    $('#akun_hutang').typeahead({
        source: function (cari, result) {
            result($.map($dtkonten, function (item) {
                return item.kode_akun;
            }));
        },
        afterSelect: function (item) {
            // console.log('cek');
        }
    });
    // END SUGGESTION

    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('admginas-master/konten') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else if(!json.status && json.message == "Unauthorized"){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                    return [];
                }else{
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
            }
        ],
        'columns': [
            { data: 'id' },
            { data: 'tanggal' },
            { data: 'judul' },
            { data: 'tgl_input' },
        ],
        order:[[3,'desc']],
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
        $('#judul-form').html('Tambah Data Konten');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editor.then(editor => {
            editor.setData('');
        })
        $('#keterangan').val('');
        $('#method').val('post');
        $('#id').attr('readonly', false);
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
        var kode = $('#id').val();
        editor.then(editor => {
            $('#keterangan').val(editor.getData()); 
        });
        msgDialog({
            id:kode,
            with:'editor',
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            judul:{
                required: true 
            },
            tanggal:{
                required: true
            },
            header:{
                required: true 
            },
            kode_klp:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            if(parameter == "edit"){
                var url = "{{ url('admginas-master/konten') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('admginas-master/konten') }}";
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
                        $('#judul-form').html('Tambah Data konten');
                        $('#method').val('post');
                        $('#id').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("id",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/admginas-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode konten sudah digunakan'
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

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('admginas-master/konten') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data konten ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
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
    
    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        editor.then(editor => {
            editor.setData('');
        })
        $('#keterangan').val('');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Konten');
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/konten') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#judul').val(result.data[0].judul);
                    $('#header').val(result.data[0].header_url);
                    $('#label_header').val(result.data[0].nama_header); 
                    editor.then(editor => {
                        editor.setData(result.data[0].keterangan);//here i am 
                    });
                    $('#kode_klp').val(result.data[0].kode_klp); 
                    $('#label_kode_klp').val(result.data[0].nama_klp); 
                    if(result.data[0].tag != "" && result.data[0].tag != null){

                        var tmp = result.data[0].tag.split(",");
                        if(tmp.length > 0){
                            for(var i=0;i< tmp.length;i++){
                                $('#tag').tagsinput('add', tmp[i]);
                            }
                        }
                    }            
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#judul,#header,#keterangan,#kode_klp,#tag').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['judul','header','keterangan','kode_klp','tag'];
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


    // PREVIEW saat klik di list data

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 3){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>ID Konten</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>`+data.judul+`</td>
            </tr>
            <tr>
                <td>Tanggal Publish</td>
                <td>`+data.tanggal+`</td>
            </tr>
            <tr>
                <td>Header URL</td>
                <td>`+data.header_url+`-`+data.nama_header+`</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>`+data.keterangan+`</td>
            </tr>
            <tr>
                <td>Kelompok</td>
                <td>`+data.kode_klp+`-`+data.nama_klp+`</td>
            </tr>
            <tr>
                <td>Tag</td>
                <td>`+data.tag+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data konten');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editor.then(editor => {
            editor.setData('');
        })
        $('#keterangan').val('');
        
        $.ajax({
            type: 'GET',
            url: "{{ url('admginas-master/konten') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#judul').val(result.data[0].judul);
                    $('#header').val(result.data[0].header_url);
                    $('#label_header').val(result.data[0].nama_header);
                    editor.then(editor => {
                        editor.setData(result.data[0].keterangan);//here i am 
                    });
                    $('#kode_klp').val(result.data[0].kode_klp); 
                    $('#label_kode_klp').val(result.data[0].nama_klp); 
                    if(result.data[0].tag != "" && result.data[0].tag != null){

                        var tmp = result.data[0].tag.split(",");
                        if(tmp.length > 0){
                            for(var i=0;i< tmp.length;i++){
                                $('#tag').tagsinput('add', tmp[i]);
                            }
                        }
                    }                      
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('admginas-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
        console.log('ok');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });


    </script>