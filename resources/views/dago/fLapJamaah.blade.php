{{-- Referensi fLapTerimaBaru --}}
    <style>
        td,th{
            padding:8px !important;
        }
        .border-right-0{
            border-right:0;
        }
        .border-left-0{
            border: 1px solid #929090;
            border-left:0;
            border-bottom-right-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }
        .sai-rpt-filter-entry-row:nth-child(2n+1) {
            background:unset ;
            padding: unset;
        }
        .separator{
            border-bottom:1px solid #d7d7d7
        }
        .sai-rpt-filter-entry-row {
            margin:0 !important;
        }
        .search-item{
            /* font-size:18px; */
            cursor:pointer;
        }
        .selectize-input{
            /* border-radius:0; */
            height:38.4px !important;
        }
        .hidden{
            display:none;
        }
        .form-control[readonly] {
            background-color: #e9ecef !important;
            opacity: 1;
        }
        .input-group-append >.input-group-text{
            background-color: #e9ecef !important;
        }

        #table-search,#table-search2
        {
            border-collapse:collapse !important;
        }
        
        #table-search tbody tr:hover,#table-search2 tbody tr:hover
        {
            background:#F8F8F8 !important;
            cursor:pointer;
        }

        #table-search tr.selected
        {
            background:#E8E8E8 !important;
        }

        #table-search_filter label, #table-search_filter input,
        #table-search2_filter label, #table-search2_filter input
        {
            width:100%;
        }

        div.dataTables_filter{
            width:100% !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination{
            float:right !important;
        }

        .bootstrap-tagsinput{
            margin-bottom:10px
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

        ul.pagination .pagination-sm{
            float:right !important;
        }
        #table-search_paginate
        {
            margin-top:0;
        }

        .bootstrap-tagsinput input{
            width:auto !important;
        }
        
    </style>
    <div class="container-fluid">
        <div class="row" id="saku-filter" style="margin-top: 20px;">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body pt-2 pb-2 px-2" style="min-height:51px">
                        <h5 style="position: absolute;font-weight: bold;padding-left: 10px;top: 15px">Laporan Data Jamaah</h5>
                        <button id="btn-filter" style="float:right;width:110px" class="btn btn-light ml-2 hidden" type="button"><i class="simple-icon-equalizer mr-2" style="transform-style: ;" ></i>Filter</button>
                        <div class="dropdown float-right">
                            <button id="btn-export" type="button" class="btn btn-outline-primary dropdown-toggle float-right hidden"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="simple-icon-share-alt mr-1"></i> Export 
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btn-export" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                <a class="dropdown-item" href="#" id="sai-rpt-print"><img src="{{ asset('img/Print.svg') }}" style="width:16px;"> <span class="ml-2">Print</span></a>
                                <a class="dropdown-item" href="#" id="sai-rpt-print-prev"><img src="{{ asset('img/PrintPreview.svg') }}" style="width:16px;height: 16px;"> <span class="ml-2">Print Preview</span></a>
                                <a class="dropdown-item" href="#" id="sai-rpt-excel"><img src="{{ asset('img/excel.svg') }}" style="width:16px;"> <span class="ml-2">Excel</span></a>
                                <a class="dropdown-item" href="#" id="sai-rpt-email"><img src="{{ asset('img/email.svg') }}" style="width:16px;height: 16px;margin-right: 3px;"><span class="ml-2">Email</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="collapse show" id="collapseFilter">
                                <div class="px-2 pb-2 pt-2">
                                    <form id="form-filter">
                                        <h6 style="padding-left:10px">Filter</h6>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>jk</p>
                                            <label for="jk" class="col-md-2 col-sm-12 col-form-label">Jenis Kelamin</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='jk[]' class='form-control sai-rpt-filter-type selectize'><option value='all' selected>Semua</option><option value='='>Sama dengan</option><option value='range'>Rentang</option><option value='in'>Pilihan</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="jk[]" id="jk-from" readonly value="Menampilkan semua jenis kelamin">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="jk[]" id="jk_to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>status</p>
                                            <label for="status" class="col-md-2 col-sm-12 col-form-label">Status</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='status[]' class='form-control sai-rpt-filter-type selectize'><option value='all' selected>Semua</option><option value='='>Sama dengan</option><option value='range'>Rentang</option><option value='in'>Pilihan</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="status[]" id="status-from" readonly value="Menampilkan semua status">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="status[]" id="status_to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>usia</p>
                                            <label for="usia" class="col-md-2 col-sm-12 col-form-label">Status</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='usia[]' class='form-control sai-rpt-filter-type selectize'><option value='all' selected>Semua</option><option value='='>Sama dengan</option><option value='range'>Rentang</option><option value='in'>Pilihan</option></select>
                                            </div>
                                            <div class="col-md-8 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="usia[]" id="usia-from" readonly value="Menampilkan semua usia">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai dengan
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="usia[]" id="usia_to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                        <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="collapse" id="collapsePaging">
                                <div class="px-3 py-0 row"  style="min-height:63px">
                                    <label class="col-sm-2 pr-0" style="padding-top: 0;margin:auto">Menampilkan</label>
                                    <div class='col-sm-2 pl-0' style='padding-top: 0;margin:auto'>
                                        <select name="show" id="show" class="" style='border:none'>
                                            <option value="10">10 per halaman</option>
                                            <option value="25">25 per halaman</option>
                                            <option value="50">50 per halaman</option>
                                            <option value="100">100 per halaman</option>
                                            <option value="All">Semua halaman</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-8 text-center" style="margin:auto">
                                        <div id="pager">
                                            <ul id="pagination" class="pagination pagination-sm2 float-right mb-0"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="row mt-2 hidden" id="saku-report">
            <div class="col-12">
                <div class="card px-2 py-2" style="min-height:200px">
                    <div class="border-bottom px-0 py-3 mb-2 navigation-lap hidden">
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb py-0 my-0">
                                <li class="breadcrumb-item active">
                                    Jurnal
                                </li>
                            </ol>
                        </nav>            
                        <button type="button" id="btn-back" style="position: absolute;right: 25px;
                        top: 30px;" class="btn btn-light float-right">
                        <i class=""></i> Back</button>
                    </div>
                    <div class="row h-100" id="report-load" style="display: none;">
                        <div class="col-12 col-md-10 mx-auto my-auto">
                            <div style="box-shadow:none" class="card auth-card text-center">
                                <div style="padding:50px;width:50%;" class="my-auto mx-auto">
                                    <div class="progress" style="height:10px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" id="report-load-bar">0.00%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="canvasPreview">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL SEARCH AKUN-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div style="display: block;" class="modal-header">
                    <h5 class="modal-title" style="position: absolute;"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right:15px ;">
                    <span aria-hidden="true">&times;</span>
                    </button> 
                    <ul class="nav nav-tabs col-12 hidden" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#list" role="tab" aria-selected="true"><span class="hidden-xs-down">Data</span></a></li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#terpilih" role="tab" aria-selected="false"><span class="hidden-xs-down">Terpilih</span></a> </li>
                    </ul>
                </div>
                <div class="modal-body pt-3">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <div id="modalEmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id='formEmail'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Kirim Email</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='form-group row'>
                            <label for="modal-email" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type='text' class='form-control' maxlength='100' name='email' id='modal-email' required>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type="button" disabled="" style="display:none" id='loading-bar2' class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button>
                        <button type='submit' id='email-submit' class='btn btn-primary'>Kirim</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
    </div>
    @php
        date_default_timezone_set("Asia/Bangkok");
    @endphp
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
      
        var jk = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var status = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var usia = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
        var $aktif = "";
        
        $.fn.DataTable.ext.pager.numbers_length = 5;

        // $('#show').selectize();

        $('#btn-filter').click(function(e){
            $('#collapseFilter').show();
            $('#collapsePaging').hide();
            if($(this).hasClass("btn-primary")){
                $(this).removeClass("btn-primary");
                $(this).addClass("btn-light");
            }
            
            $('#btn-filter').addClass("hidden");
            $('#btn-export').addClass("hidden");
        });
        
        $('#btn-tutup').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
        });

        $('#btn-tampil').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
        });

        $('.selectize').selectize();

        function showFilter(param,target1,type = null){
            var par = param;
            var parameter = {};

            var header = [];
            $target = target1;
            var tmp = $target.attr('id');
            tmp = tmp.split("-");
            target2 = tmp[1];
            target3 = tmp[1]+'name';
            
            switch(par){
                
                case 'jk[]': 
                    header = ['Kode'];
                    var toUrl = "{{ url('dago-report/filter2-jk') }}";
                    var columns = [
                        { data: 'jk' }
                    ];
                    header_pilih = ['Kode','Action'];
                    var judul = "Daftar Jenis Kelamin <span class='modal-subtitle'></span>";
                    var pilih = "jk";
                    $target = $target;
                    $target2 = target2;
                    var display = "kode";
                    var field = eval("jk");
                    var kunci = "jk";
                    var orderby = [];
                    parameter = {}
                break;
                case 'status[]': 
                    header = ['Kode'];
                    var toUrl = "{{ url('dago-report/filter2-status') }}";
                    var columns = [
                        { data: 'status' }
                    ];
                    header_pilih = ['Kode','Action'];
                    var judul = "Daftar Status <span class='modal-subtitle'></span>";
                    var pilih = "status";
                    $target = $target;
                    $target2 = target2;
                    var display = "kode";
                    var field = eval("status");
                    var kunci = "status";
                    var orderby = [];
                    parameter = {}
                break;
                case 'usia[]': 
                    header = ['Usia'];
                    var toUrl = "{{ url('dago-report/filter2-usia') }}";
                    var columns = [
                        { data: 'kode' }
                    ];
                    header_pilih = ['Usia','Action'];
                    var judul = "Daftar Rentang Usia <span class='modal-subtitle'></span>";
                    var pilih = "usia";
                    $target = $target;
                    $target2 = target2;
                    var display = "kode";
                    var field = eval("usia");
                    var kunci = "usia";
                    var orderby = [];
                    parameter = {}
                break;
                
            }

            var header_html = '';
            var width = ["30%","70%"];
            for(i=0; i<header.length; i++){
                header_html +=  "<th style='width:"+width[i]+"'>"+header[i]+"</th>";
            }

            if(type == "range"){
                var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
                table += "<tbody></tbody></table><table width='100%' id='table-search2'><thead><tr>"+header_html+"</tr></thead>";
                table += "<tbody></tbody></table>";
                if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                    $('#modal-search .modal-header ul').addClass('hidden');
                    $('#modal-search .modal-header').css('padding-bottom','1.75rem');
                }
            }
            else if(type == "in"){
                var headerpilih_html = '';
                var width = ["25%","70%","5%"];
                for(i=0; i<header_pilih.length; i++){
                    headerpilih_html +=  "<th style='width:"+width[i]+"'>"+header_pilih[i]+"</th>";
                }

                var table = `
                <div class="tab-content tabcontent-border col-12 p-0">
                    <div class="tab-pane active" id="list" role="tabpanel">
                        <table class='' width='100%' id='table-search'><thead><tr>`+header_html+`</tr></thead>
                        <tbody></tbody></table>
                    </div>
                    <div class="tab-pane" id="terpilih" role="tabpanel">
                        <table class='' width='100%' id='table-search2'><thead><tr>`+headerpilih_html+`</tr></thead>
                        <tbody></tbody></table>
                    </div>
                </div>
                <button class='btn btn-primary float-right' id='btn-ok'>OK</button>`;
                $('#modal-search .modal-header').css('padding-bottom','0');
                $('#modal-search .modal-header ul').removeClass('hidden');
            }
            else{
                var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
                table += "<tbody></tbody></table>";
                if(!$('#modal-search .modal-header ul').hasClass('hidden')){
                    $('#modal-search .modal-header ul').addClass('hidden');
                    $('#modal-search .modal-header').css('padding-bottom','1.75rem');
                }
            }

            $('#modal-search .modal-body').html(table);
            
            $('#btn-ok').addClass('disabled');
            $('#btn-ok').prop('disabled', true);

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
                "columnDefs": [
                    { "orderable": false, "targets": 0 }
                ],
                order : orderby,
                columns: columns,
                language: {
                    paginate: {
                        previous: "<i class='fa fa-arrow-left'></i>",
                        next: "<i class='fa fa-arrow-right'></i>"
                    },
                    search: "_INPUT_",
                    searchPlaceholder: "Search...",
                    lengthMenu: "Items Per Page _MENU_"
                },
            });

            $('#modal-search .modal-title').html(judul);
            $('#modal-search').modal('show');
            searchTable.columns.adjust().draw();

            if(type == "range"){
                var searchTable2 = $("#table-search2").DataTable({
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
                    order : orderby,
                    language: {
                        paginate: {
                            previous: "<i class='fa fa-arrow-left'></i>",
                            next: "<i class='fa fa-arrow-right'></i>"
                        },
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                        lengthMenu: "Items Per Page _MENU_"
                    },
                });

                $('#modal-search .modal-subtitle').html('[Rentang Awal]');
                searchTable2.columns.adjust().draw();
                
                $('#table-search2_wrapper').addClass('hidden');

                $("<input class='form-control mb-1' type='text' id='rentang-tag'>").insertAfter('#table-search_filter label');
                $("<input class='form-control mb-1' type='text' id='rentang-tag2'>").insertAfter('#table-search2_filter label');
                $("#rentang-tag").tagsinput({
                    cancelConfirmKeysOnEmpty: true,
                    confirmKeys: [13],
                    itemValue: 'id',
                    itemText: 'text'
                });
                $("#rentang-tag2").tagsinput({
                    cancelConfirmKeysOnEmpty: true,
                    confirmKeys: [13],
                    itemValue: 'id',
                    itemText: 'text'
                });
                $('#rentang-tag').on('itemAdded', function(event) {
                    $('#rentang-tag2').tagsinput('add', {id:event.item.id,text:event.item.text});
                }); 
                
                $('#rentang-tag2').on('itemRemoved', function(event) {
                    $('#rentang-tag').tagsinput('remove', {id:event.item.id,text:event.item.text});
                    var rowIndexes = [];
                    searchTable.rows( function ( idx, data, node ) {   
                        console.log(data[kunci]);
                        console.log(event.item.id);
                        console.log(idx);          
                        if(data[kunci] === event.item.id){
                            rowIndexes.push(idx);                  
                        }
                        return false;
                    }); 
                    searchTable.row(rowIndexes).deselect();
                    
                    $('#table-search_wrapper').removeClass('hidden');
                    $('#table-search2_wrapper').addClass('hidden');
                    $('#modal-search .modal-subtitle').html('[Rentang Awal]');
                }); 
                $('.bootstrap-tagsinput').css({'text-align':'left','border':'0','min-height':'41.2px'});
            }else if(type == "in"){
                var searchTable2 = $("#table-search2").DataTable({
                    sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
                    columns: columns,
                    order : orderby,
                    language: {
                        paginate: {
                            previous: "<i class='fa fa-arrow-left'></i>",
                            next: "<i class='fa fa-arrow-right'></i>"
                        },
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                        lengthMenu: "Items Per Page _MENU_"
                    },
                    "columnDefs": [{
                        "targets": header.length, "data": null, "defaultContent": "<a class='hapus-item'><i class='fa fa-trash' style='font-size:18px'></i></a>"
                    }]
                });
                searchTable2.columns.adjust().draw();
            }

            $('#table-search tbody').on('click', 'tr', function () {
                
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    if(type == "in"){
                        
                        console.log('in');
                        var datain = searchTable.rows('.selected').data();
                        if(datain.length > 1){
                            
                            $('#btn-ok').removeClass('disabled');
                            $('#btn-ok').prop('disabled', false);
                        }else{
                            
                            $('#btn-ok').addClass('disabled');
                            $('#btn-ok').prop('disabled', true);
                        }
                        searchTable2.clear().draw();
                        if(typeof datain !== 'undefined' && datain.length>0){
                            searchTable2.rows.add(datain).draw(false);
                        }
                    }
                }
                else {
                    if(type == "range"){
                        
                        searchTable.$('tr.selected').removeClass('selected');
                        searchTable2.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
                        if(header.length == 1){
                            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                            var nama = kode;
                        }else{
                            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        }
    
                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
                        field["from"] = kode;
                        field["fromname"] = nama;
                        console.log(field);
                        
                        $('#rentang-tag').tagsinput('add', {id:kode,text:'Rentang Awal :'+kode});
                       
                        $('#table-search_wrapper').addClass('hidden');
                        $('#table-search2_wrapper').removeClass('hidden');
                        $('#modal-search .modal-subtitle').html('[Rentang Akhir]');
                    }
                    else if (type == "in"){
                        console.log('in');
                        $(this).addClass('selected');
                        var datain = searchTable.rows('.selected').data();
                        if(datain.length > 1){
                            
                            $('#btn-ok').removeClass('disabled');
                            $('#btn-ok').prop('disabled', false);
                        }else{
                            
                            $('#btn-ok').addClass('disabled');
                            $('#btn-ok').prop('disabled', true);
                        }
                        searchTable2.clear().draw();
                        if(typeof datain !== 'undefined' && datain.length>0){
                            searchTable2.rows.add(datain).draw(false);
                        }
                    }
                    else{
                        
                        searchTable.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');

                        if(header.length == 1){
                            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                            var nama = $(this).closest('tr').find('td:nth-child(1)').text();
                        }else{
                            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        }

                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
                        field[target2] = kode;
                        field[target3] = nama;
                        $('#modal-search').modal('hide');
                    }

                }
            });

            $('#table-search2 tbody').on('click', 'tr', function () {
                if(type == "range"){

                    if ( $(this).hasClass('selected') ) {
                        $(this).removeClass('selected');
                    }
                    else {
                        
                        searchTable.$('tr.selected').removeClass('selected');
                        searchTable2.$('tr.selected').removeClass('selected');
                        $(this).addClass('selected');
    
                        if(header.length == 1){
                            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                            var nama = $(this).closest('tr').find('td:nth-child(1)').text();
                        }else{
                            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        }

                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
    
                        field["to"] = kode;
                        field["toname"] = nama;    
                        
                        $('#rentang-tag2').tagsinput('add', { id: kode, text: 'Rentang akhir:'+kode });       
                        $('#modal-search').modal('hide');
                    }
                }
            });

            $('#table-search2 tbody').on('click', '.hapus-item', function () {
                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                searchTable2.row( $(this).parents('tr') ).remove().draw();
                var rowIndexes = [];
                searchTable.rows( function ( idx, data, node ) {             
                    if(data[kunci] === kode){
                        rowIndexes.push(idx);                  
                    }
                    return false;
                }); 
                searchTable.row(rowIndexes).deselect();
            });

            $('#modal-search').on('click','#btn-ok',function(){
                var datain = searchTable.cells('.selected',0).data();
                console.log(datain.length);
                var kode = '';
                var nama = '';
                for(var i=0;i<datain.length;i++){
                    if(i == 0){
                        kode +=datain[i];
                    }else{
                        kode +=','+datain[i];
                    }
                }   
                $($target).val(kode);
                field[target2] = kode;
                field[target3] = kode;
                $('#modal-search').modal('hide');
            });
        }
        

        $('#form-filter').on('change', '.sai-rpt-filter-type', function(){
            var type = $(this).val();
            console.log(type);
            var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
            var field = eval(kunci);
            switch(type){
                case "all":
                    
                    $aktif = '';
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('Menampilkan semua '+kunci);
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').removeClass('search-item');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('');
                    
                    field.type = "all";
                    field.from = "";
                    field.to = "";
                    field.fromname = "";
                    field.toname = "";
                    $('#modal-search').on('hide.bs.modal', function (e) {
                        //
                    });
                    
                break;
                case "=":
                    
                    $aktif = "";
                    var par = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').attr('name'); 
                    var target = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                    showFilter(par,target);
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                    field.type = "=";
                    field.from = field.from;
                    field.to = "";
                    field.fromname = field.fromname;
                    field.toname = "";
                    $('#modal-search').on('hide.bs.modal', function (e) {
                        //
                    });
                break;
                case "range":                    
                    $aktif = $(this);
                    var par = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').attr('name'); 
                    var target = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                    showFilter(par,target,"range");
                    $('#modal-search').on('hide.bs.modal', function (e) {
                        if($aktif != ""){
                            field.type = "range";
                            field.from = field.from;
                            field.to = field.to;
                            field.fromname =  field.fromname ;
                            field.toname =  field.toname ;
        
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                            if(kunci == "periode"){
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                            }else{
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from);
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to);
                            }
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').removeClass('hidden');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').removeClass('hidden');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                        }
                    });
                    
                break;
                case "in":
                    
                    $aktif = '';
                    var par = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').attr('name'); 
                    var target = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                    showFilter(par,target,"in");
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                    
                    field.type = "in";
                    field.from = "";
                    field.to = "";
                    field.fromname = "";
                    field.toname = "";
                    $('#modal-search').on('hide.bs.modal', function (e) {
                        //
                    });
                    
                break;
            }
           
        });

        $('#form-filter').on('click', '.search-item', function(){
            var par = $(this).closest('.input-group').find('input').attr('name');
            var target1 = $(this).closest('.input-group').find('input');
            
            var type = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-type')[0].selectize.getValue();
            console.log(type);
            if(type == "in"){
                showFilter(par,target1,type);
            }else{
                showFilter(par,target1);
            }
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("jk[]",jk.type);
            $formData.append("jk[]",jk.from);
            $formData.append("jk[]",jk.to);
            $formData.append("status[]",status.type);
            $formData.append("status[]",status.from);
            $formData.append("status[]",status.to);
            $formData.append("usia[]",usia.type);
            $formData.append("usia[]",usia.from);
            $formData.append("usia[]",usia.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('dago-auth/form/rptJamaah') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("jk[]",jk.type);
            $formData.append("jk[]",jk.from);
            $formData.append("jk[]",jk.to);
            $formData.append("status[]",status.type);
            $formData.append("status[]",status.from);
            $formData.append("status[]",status.to);
            $formData.append("usia[]",usia.type);
            $formData.append("usia[]",usia.from);
            $formData.append("usia[]",usia.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('dago-auth/form/rptJamaah') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#sai-rpt-print').click(function(){
            $('#saku-report #canvasPreview').printThis({
                removeInline: true
            });
        });

        $('#sai-rpt-print-prev').click(function(){
            var newWindow = window.open();
            var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
            newWindow.document.write(html);
        });

        $("#sai-rpt-excel").click(function(e) {
            e.preventDefault();
            $("#saku-report #canvasPreview").table2excel({
                // exclude: ".excludeThisClass",
                name: "LapMKUOpr_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "LapMKUOpr_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        });

        
        $("#sai-rpt-email").click(function(e) {
            e.preventDefault();
            $('#formEmail')[0].reset();
            $('#modalEmail').modal('show');
        });

        $('#modalEmail').on('submit','#formEmail',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $formData.append("jk[]",jk.type);
            $formData.append("jk[]",jk.from);
            $formData.append("jk[]",jk.to);
            $formData.append("status[]",status.type);
            $formData.append("status[]",status.from);
            $formData.append("status[]",status.to);
            $formData.append("usia[]",usia.type);
            $formData.append("usia[]",usia.from);
            $formData.append("usia[]",usia.to);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('dago-report/send-laporan') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    alert(result.message);
                    if(result.status){
                        $('#modalEmail').modal('hide');
                    }
                    // $loadBar2.hide();
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            
        });

    </script>