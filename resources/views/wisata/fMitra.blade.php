    <!-- CSS tambahan -->
    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
        }
        .form-control[readonly]:focus {
            background-color: #e9ecef;
            opacity: 1;
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
        
        #table-search tbody tr:hover
        {
            background:#E8E8E8 !important;
            cursor:pointer;
        }

        #table-search tbody tr.selected
        {
            background:#E8E8E8 !important;
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
    </style>
    <!-- LIST DATA -->
    <div class="row mb-3" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Mitra</h5>
                    <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="" style="padding-right:1.75rem;padding-left:1.75rem">
                
                <div class="dataTables_length" id="table-data_length"></div>
                    <div class="d-block d-md-inline-block float-left">
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
                    <div class="d-block d-md-inline-block float-right">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData">
                            <div class="input-group-append">
                                <span class="input-group-text" id="filter-btn"><i class="simple-icon-equalizer"></i></span>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="card-body" style="min-height: 560px !important;padding-top:0;">                    
                    <table id="table-data" style='width:100%'>
                        <thead>
                            <tr>
                                <th width="20%">Kode</th>
                                <th width="30%">Nama</th>
                                <th width="38%">Alamat</th>                                
                                <th width="12%" class="text-center">Aksi</th>
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
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
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
                            <label for="kode_mitra" class="col-md-2 col-sm-12 col-form-label">Kode</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Kode Mitra" id="kode_mitra" name="kode_mitra" required>                                
                            </div>                                                      
                        </div>

                        <div class="form-group row ">
                            <label for="nama" class="col-md-2 col-sm-12 col-form-label">Nama Mitra</label>
                            <div class="col-md-5 col-sm-12">
                                <input class="form-control" type="text" placeholder="Nama Mitra" id="nama" name="nama" required>
                            </div>
                            <div class="col-md-2 col-sm-12">
                            </div>                            
                        </div>

                        <div class="form-group row ">
                            <label for="alamat" class="col-md-2 col-sm-12 col-form-label">Alamat</label>
                            <div class="col-md-10 col-sm-12">
                                <input class="form-control" type="text" placeholder="Alamat Mitra" id="alamat" name="alamat" required>
                            </div>                           
                        </div>

                        <div class="form-group row ">
                            <label for="kode_camat" class="col-md-2 col-sm-12 col-form-label">Kecamatan</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_camat" name="kode_camat" data-input="cbbl" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>
                            <div class="col-md-4 col-sm-12" style="border-bottom: 1px solid #d7d7d7;">
                                <label id="label_kode_camat" style="margin-top: 10px;"></label>
                            </div>
                        </div>

                        <div class="form-group row  ">
                            <label for="no_tel" class="col-md-2 col-sm-12 col-form-label">No Telpon</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="No Telpon" id="no_tel" name="no_tel" required>
                            </div>    

                            <div class="col-md-2 col-sm-12">
                            </div>
                            
                            <label for="status" class="col-md-2 col-sm-12 col-form-label">Status</label>
                            <div class="col-md-3 col-sm-12">                            
                                <select class='form-control' id="status" name="status" required>
                                <option value=''>--- Pilih Status ---</option>
                                <option value='Bintang'>Bintang</option>
                                <option value='NonBintang'>NonBintang</option>
                                <option value='NonHotel'>NonHotel</option>                                
                                </select>
                            </div>                        
                        </div>

                        <div class="form-group row  ">
                            <label for="pic" class="col-md-2 col-sm-12 col-form-label">PIC</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="PIC" id="pic" name="pic" required>                                
                            </div>
                            
                            <div class="col-md-2 col-sm-12">
                            </div>

                            <label for="no_hp" class="col-md-2 col-sm-12 col-form-label">HP PIC</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="HP PIC" id="no_hp" name="no_hp" required>
                            </div>                            
                        </div>

                        <div class="form-group row  ">
                            <label for="website" class="col-md-2 col-sm-12 col-form-label">Website</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Website" id="website" name="website" required>                                
                            </div>
                            
                            <div class="col-md-2 col-sm-12">
                            </div>

                            <label for="email" class="col-md-2 col-sm-12 col-form-label">Email</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Email" id="email" name="email" required>
                            </div>                            
                        </div>

                        <!-- <div class="form-group row">                            
                            <label for="status" class="col-md-2 col-sm-12 col-form-label">Status</label>
                            <div class="col-md-3 col-sm-12">                            
                                <select class='form-control' id="status" name="status" required>
                                <option value=''>--- Pilih Status ---</option>
                                <option value='Bintang'>Bintang</option>
                                <option value='NonBintang'>NonBintang</option>
                                <option value='NonHotel'>NonHotel</option>                                
                                </select>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="coor_x" class="col-md-2 col-sm-12 col-form-label">Koordinat X</label>
                            <div class="col-md-10 col-sm-12">
                                <input class="form-control" type="text" placeholder="Koordinat X" id="coor_x" name="coor_x" required>
                            </div>                           
                        </div>

                        <div class="form-group row">
                            <label for="coor_y" class="col-md-2 col-sm-12 col-form-label">Koordinat Y</label>
                            <div class="col-md-10 col-sm-12">
                                <input class="form-control" type="text" placeholder="Koordinat Y" id="coor_y" name="coor_y" required>
                            </div>                           
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#btambah" role="tab" aria-selected="true"><span class="hidden-xs-down">Bidang Wisata</span></a> </li>                                
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bupload" role="tab" aria-selected="true"><span class="hidden-xs-down">Upload</span></a> </li>                                
                        </ul>
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="btambah" role="tabpanel">
                                <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                    <style>
                                    th,td{
                                        padding:8px !important;
                                        vertical-align:middle !important;
                                    }
                                    </style>
                                    <table class="table table-striped table-bordered table-condensed" id="table-btambah">
                                        <thead>
                                        <tr>
                                        <th width="5%" class="text-center">No</th>
                                        <th width="12%" class="text-center">Cek List</th>   
                                        <th width="30%" class="text-center">Kode Sub Jenis</th>
                                        <th width="53%" class="text-center">Nama Sub Jenis</th>                                                                                                                                   
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>   
                            <div class="tab-pane" id="bupload" role="tabpanel">
                                <table class="table table-bordered table-condensed gridexample" id="upload-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap;margin-top:5px;">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th width="3%">No</th>
                                            <th width="10%"></th>
                                            <th width="20%">Nama File Upload</th>
                                            <th width="25%">Upload File</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>                         
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

    <!-- MODAL HAPUS -->    
    <div class="modal" tabindex="-1" role="dialog" id="modal-delete">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:1rem">
                <div class="modal-body text-center pb-0" style="border:none">
                    <span id="modal-delete-id" style="display:none"></span>
                    <i class="simple-icon-trash" style="font-size:40px;display:block"></i>
                    <h1 style="font-weight:bold">Hapus Data</h1>
                    <p class="mt-4">Data akan terhapus secara permanen dan kamu tidak bisa mengembalikannya</p>
                </div>
                <div class="modal-footer" style="border:none">
                    <button type="button" class="btn btn-light" data-dismiss="modal" >Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-ya" style="background:#FC3030">Hapus Data Mitra</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL HAPUS -->

    <!-- MODAL PREVIEW -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header" style="display:block">
                    <h6 class="modal-title" style="position: absolute;">Preview Data Mitra <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span> </h6>
                    <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="btn btn-primary float-right ml-2" id="btn-delete2" >Hapus</button>
                    <button type="button" class="btn btn-primary float-right" id="btn-edit2" >Edit</button>
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

    <!-- MODAL CBBL -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
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

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    //HELPER FUNCTION//
    function getKecamatan(kode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/kecamatan') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_camat == kode);
                        if(filter.length > 0) {
                            $('#kode_camat').val(filter[0].kode_camat);
                            $('#kode_camat').attr('value',filter[0].kode_camat);
                            $('#label_kode_camat').text(filter[0].nama);
                        } else {
                            $('#kode_camat').val('');
                            $('#label_kode_camat').text('');
                            $('#kode_camat').focus();
                        }
                    }
                }
            }
        });
    }
    //END HELPER FUNCTION//

    // EVENT CHANGE CHECKBOX //
    $('#table-btambah').on('click', '.checkbox-generate', function(){
        var input    = $(this).closest('tr').find('input[type=hidden]').attr('id');
        var checkbox = $(this).closest('tr').find('input[type=checkbox]').attr('id');
        var row = $(this).closest('tr');
        if(row.hasClass('generate')){
            row.removeClass('generate');
        }else{
            row.addClass('generate');
        }
        
        if($('#'+checkbox).is(':checked')) {
            $('#'+input).val(true);
        }else{
            $('#'+input).val(false);
        }
    });
    // END EVENT CHANGE CHECKBOX //

    // GET DATA BIDANG //
    function getDataSubJenis() {
        $.ajax({
            type:'GET',
            url: "{{ url('wisata-master/subjenis') }}",
            dataType: 'json',
            async:false,
            success: function(result) {
                var row = "";
                var no  = 1;
                if(result.status) {
                    $('#table-btambah tbody').empty();
                    for(var i=0;i<result.daftar.length;i++) {
                        var data = result.daftar[i];
                        row += "<tr>";
                        row += "<td>"+no+"</td>";
                        row += "<td style='text-align:center;vertical-align:middle;''><input type='checkbox' class='checkbox-generate' id='checkbox-"+no+"'><input type='hidden' name='generate[]' class='hidden' id='generate-ke"+no+"' value='false'></td>";
                        row += "<td style='text-align:center;'>"+data.kode_subjenis+"<input type='hidden' name='kode_subjenis[]' value='"+data.kode_subjenis+"'/></td>";
                        row += "<td>"+data.nama+"</td>";
                        row += "</tr>";
                        no++;
                    }
                    $('#table-btambah tbody').append(row);
                }
            }
        });
    }
    // END GET DATA BIDANG //
  
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
            'url': "{{ url('wisata-master/mitra') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    window.location.href = "{{ url('wisata-auth/sesi-habis') }}";
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        'columns': [
            { data: 'kode_mitra' },
            { data: 'nama' },
            { data: 'alamat' }
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
            '</select>'
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

    $('#status').selectize();

    //SHOW FILTER POP UP//
    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
            
        switch(par){
        case 'kode_camat': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('wisata-master/kecamatan') }}";
                    var columns = [
                        { data: 'kode_camat' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Kecamatan";
                    var jTarget1 = "val";
                    var jTarget2 = "text";
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
                        $($target).val(kode).change();
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
    //END SHOW FILTER POP UP//
    //EVENT TO CALL FILTER POP UP//
    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });
    //ENDEVENT TO CALL FILTER POP UP//    
    //EVENT CHANGE//
    $('#kode_camat').change(function(){
        var par = $(this).val();
        getKecamatan(par);
    });
    //END EVENT CHANGE//

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#kode_camat').val('');
        $('[id^=label]').html('');
        $('#upload-grid tbody').empty();
        $('#judul-form').html('Tambah Data Mitra');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('input[data-input="cbbl"]').val('');
        $('#kode_mitra').attr('readonly', false);        
        $('#saku-datatable').hide();
        $('#saku-form').show();
        getDataSubJenis();
    });
    // END BUTTON TAMBAH
    
    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            if(parameter == "edit"){
                var url = "{{ url('wisata-master/mitra') }}/"+id;
                var pesan = "updated";
                console.log('edit')
            }else{
                var url = "{{ url('wisata-master/mitra') }}";
                var pesan = "saved";
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
                        Swal.fire(
                            'Data berhasil tersimpan!',
                            'Your data has been '+pesan,
                            'success'
                            )
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('#kode_camat').val('');
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('input[data-input="cbbl"]').val('');
                        $('#judul-form').html('Tambah Data Mitra');
                        $('#upload-grid tbody').empty();
                        $('#method').val('post');
                        $('#kode_mitra').attr('readonly', false);
                    
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/wisata-auth/sesi-habis') }}";
                        
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
    // END BUTTON SIMPAN

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('wisata-master/mitra') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    );
                    
                    showNotification("top", "center", "success",'Hapus Data','Data Mitra ('+id+') berhasil dihapus ');
                    $('#modal-delete-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
        var id = $(this).closest('tr').find('td').eq(0).html();
        $('#modal-delete-id').text(id);
        $('#modal-delete').modal('show');
    });

    $('.modal-footer').on('click','#btn-ya',function(e){
        e.preventDefault();
        var id = $('#modal-delete-id').text();
        hapusData(id);
    });
    // END BUTTON HAPUS
    
    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#upload-grid tbody').empty();
        // $iconLoad.show();
        $('#table-btambah tbody').empty();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Mitra');
        $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/mitra') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#kode_mitra').attr('readonly', true);
                    $('#kode_mitra').val(id);
                    $('#id').val(id);                    
                    $('#nama').val(result.data[0].nama);        
                    $('#alamat').val(result.data[0].alamat);        
                    $('#no_tel').val(result.data[0].no_tel);        
                    $('#pic').val(result.data[0].pic);        
                    $('#no_hp').val(result.data[0].no_hp);        
                    $('#website').val(result.data[0].website);        
                    $('#email').val(result.data[0].email);  
                    $('#coor_x').val(result.data[0].coor_x);        
                    $('#coor_y').val(result.data[0].coor_y);      
                    $('#status')[0].selectize.setValue(result.data[0].status);
                    getKecamatan(result.data[0].kecamatan);
                    var row = '';
                    var no = 1;
                    for(var i=0;i<result.arrsub.length;i++){
                        var data = result.arrsub[i];
                        if(data.status == "CEK") {
                            row += "<tr>";
                            row += "<td>"+no+"</td>";
                            row += "<td style='text-align:center;vertical-align:middle;''><input type='checkbox' class='checkbox-generate' id='checkbox-"+no+"' checked><input type='hidden' name='generate[]' class='hidden' id='generate-ke"+no+"' value='true'></td>";
                            row += "<td style='text-align:center;'>"+data.kode_subjenis+"<input type='hidden' name='kode_subjenis[]' value='"+data.kode_subjenis+"'/></td>";
                            row += "<td>"+data.nama+"</td>";
                            row += "</tr>";
                        } else {
                            row += "<tr>";
                            row += "<td>"+no+"</td>";
                            row += "<td style='text-align:center;vertical-align:middle;''><input type='checkbox' class='checkbox-generate' id='checkbox-"+no+"'><input type='hidden' name='generate[]' class='hidden' id='generate-ke"+no+"' value='false'></td>";
                            row += "<td style='text-align:center;'>"+data.kode_subjenis+"<input type='hidden' name='kode_subjenis[]' value='"+data.kode_subjenis+"'/></td>";
                            row += "<td>"+data.nama+"</td>";
                            row += "</tr>";
                        }
                        no++;
                    }
                    $('#table-btambah tbody').append(row);
                    
                    if(result.arrdok.length > 0) {
                        var no = 1;
                        var row = '';
                        for(var i=0;i<result.arrdok.length;i++) {
                            var data = result.arrdok[i];
                            row += "<tr class='row-upload'>";
                            row += "<td class='no-upload text-center'>"+no+"</td>";
                            row += "<td class='text-center'><a class='hapus-item' title='Hapus' style='cursor:pointer; font-size:18px;'><i class='simple-icon-trash'></i></a>&nbsp;<a class='download-item' title='Download' style='cursor:pointer; font-size:18px;' href='https://api.simkug.com/api/wisata-auth/storage/"+data.file_dok+"' target='_blank'><i class='iconsminds-data-download'></i></a></td>";
                            row += "<td><span>"+data.nama+"</span><input type='hidden' name='nama_file[]' value='"+data.file_dok+"' class='inp-file_dok' readonly></td>";
                            row += "<td><input type='file' name='file_dok[]' class='inp-file_dok'></td>";
                            row += "</tr>";
                        }
                        $('#upload-grid tbody').append(row);
                    }

                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#kode_mitra,#nama').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_mitra','nama','alamat','kecamatan','no_tel','pic','no_hp','website','email','status'];
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
                <td style='border:none'>Kode Mitra</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama Mitra</td>
                <td>`+data.nama+`</td>
            </tr>            
            <tr>
                <td>Alamat</td>
                <td>`+data.alamat+`</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>`+data.kecamatan+`</td>
            </tr>
            <tr>
                <td>No Telpon</td>
                <td>`+data.no_tel+`</td>
            </tr>
            <tr>
                <td>Contact Person</td>
                <td>`+data.pic+`</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>`+data.no_hp+`</td>
            </tr>
            <tr>
                <td>Website</td>
                <td>`+data.website+`</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>`+data.email+`</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>`+data.status+`</td>
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
        $('#modal-delete-id').text(id);
        $('#modal-delete').modal('show');
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#table-btambah tbody').empty();
        $('#upload-grid tbody').empty();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Mitra');
        $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/mitra') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_mitra').attr('readonly', true);
                    $('#kode_mitra').val(id);
                    $('#id').val(id);                    
                    $('#nama').val(result.data[0].nama);        
                    $('#alamat').val(result.data[0].alamat);        
                    $('#no_tel').val(result.data[0].no_tel);        
                    $('#pic').val(result.data[0].pic);        
                    $('#no_hp').val(result.data[0].no_hp);        
                    $('#website').val(result.data[0].website);        
                    $('#email').val(result.data[0].email);        
                    $('#coor_x').val(result.data[0].coor_x);        
                    $('#coor_y').val(result.data[0].coor_y);        
                    $('#status')[0].selectize.setValue(result.data[0].status);
                    getKecamatan(result.data[0].kecamatan);
                    var row = '';
                    var no = 1;
                    for(var i=0;i<result.arrsub.length;i++){
                        var data = result.arrsub[i];
                        if(data.status == "CEK") {
                            row += "<tr>";
                            row += "<td>"+no+"</td>";
                            row += "<td style='text-align:center;vertical-align:middle;''><input type='checkbox' class='checkbox-generate' id='checkbox-"+no+"' checked><input type='hidden' name='generate[]' class='hidden' id='generate-ke"+no+"' value='true'></td>";
                            row += "<td style='text-align:center;'>"+data.kode_subjenis+"<input type='hidden' name='kode_subjenis[]' value='"+data.kode_subjenis+"'/></td>";
                            row += "<td>"+data.nama+"</td>";
                            row += "</tr>";
                        } else {
                            row += "<tr>";
                            row += "<td>"+no+"</td>";
                            row += "<td style='text-align:center;vertical-align:middle;''><input type='checkbox' class='checkbox-generate' id='checkbox-"+no+"'><input type='hidden' name='generate[]' class='hidden' id='generate-ke"+no+"' value='false'></td>";
                            row += "<td style='text-align:center;'>"+data.kode_subjenis+"<input type='hidden' name='kode_subjenis[]' value='"+data.kode_subjenis+"'/></td>";
                            row += "<td>"+data.nama+"</td>";
                            row += "</tr>";
                        }
                        no++;
                    }
                    $('#table-btambah tbody').append(row);

                    if(result.arrdok.length > 0) {
                        var no = 1;
                        var row = '';
                        for(var i=0;i<result.arrdok.length;i++) {
                            var data = result.arrdok[i];
                            row += "<tr class='row-upload'>";
                            row += "<td class='no-upload text-center'>"+no+"</td>";
                            row += "<td class='text-center'><a class='hapus-item' title='Hapus' style='cursor:pointer; font-size:18px;'><i class='simple-icon-trash'></i></a>&nbsp;<a class='download-item' title='Download' style='cursor:pointer; font-size:18px;' href='https://api.simkug.com/api/wisata-auth/storage/"+data.file_dok+"' target='_blank'><i class='iconsminds-data-download'></i></a></td>";
                            row += "<td><span>"+data.nama+"</span><input type='hidden' name='nama_file[]' value='"+data.file_dok+"' class='inp-file_dok' readonly></td>";
                            row += "<td><input type='file' name='file_dok[]' class='inp-file_dok'></td>";
                            row += "</tr>";
                        }
                        $('#upload-grid tbody').append(row);
                    }
                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    // ADD ROW UPLOAD EVENT //
    $('#form-tambah').on('click', '.add-row', function(){
        var no=$('#upload-grid .row-upload:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-upload'>";
        input += "<td class='no-upload text-center'>"+no+"</td>";
        input += "<td class='text-center'><a class='hapus-item' title='Hapus' style='cursor:pointer; font-size=18px;'><i class='simple-icon-trash'></i></a>&nbsp;&nbsp;</td>";
        input += "<td><span>-</span><input type='hidden' name='nama_file[]' value='-' class='inp-file_dok' readonly></td>";
        input += "<td><input type='file' name='file_dok[]' class='inp-file_dok'></td>";
        input += "</tr>";
        $('#upload-grid tbody').append(input);
    });
    // END ADD ROW UPLOAD EVENT

    // DELETE UPLOAD ROW //
    $('#upload-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-upload').each(function(){
            var nom = $(this).closest('tr').find('.no-upload');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    // END DELETE UPLOAD ROW //
    </script>