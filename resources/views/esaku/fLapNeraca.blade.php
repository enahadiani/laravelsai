<style>
        td,th{
            padding:8px !important;
        }
        .border-right-0{
            border-right:0;
        }
        .border-left-0{
            border-left:0;
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
            background:#E8E8E8 !important;
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

  
        .page-item.next .page-link, .page-item.all .page-link {
            background: #900604;
            color: #fff;
            border: 1px solid #900604; 
        }
        .page-item.prev .page-link {
            background: #900604;
            border: 1px solid #900604;
            color: #fff; 
        }
        .page-item.first .page-link, .page-item.last .page-link 
        {
            background: transparent;
            color: #900604;
            border: 1px solid #900604;
            border-radius: 30px; 
        }
        .page-item.first .page-link:hover, .page-item.last .page-link:hover 
        {
            background: #900604;
            color: white;
            border: 1px solid #900604; 
        }
        .page-item .page-link:hover 
        {
            background-color: transparent;
            border-color: #c20805;
            color: #900604; 
        }
        .page-item.active .page-link 
        {
            background: transparent;
            border: 1px solid #900604;
            color: #900604; 
        }
        .page-item.disabled .page-link 
        {
            border-color: #d7d7d7;
            color: #d7d7d7;
            background: transparent; 
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
        <div class="row" id="saku-filter">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body pt-4 pb-2 px-4" style="min-height:69.2px">
                        <h5 style="position:absolute;top: 25px;">Laporan Neraca</h5>
                        <button id="btn-filter" style="float:right;width:110px" class="btn btn-light ml-2 hidden" type="button"><i class="simple-icon-equalizer mr-2" style="transform-style: ;" ></i>Filter</button>
                        <div class="dropdown float-right">
                            <button id="btn-export" type="button" class="btn btn-outline-primary dropdown-toggle float-right hidden"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btn-export" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                <a class="dropdown-item" href="#" id="sai-rpt-print">Print</a>
                                <a class="dropdown-item" href="#" id="sai-rpt-excel">Excel</a>
                                <a class="dropdown-item" href="#" id="sai-rpt-email">Email</a>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="collapse show" id="collapseFilter">
                                <div class="px-4 pb-4 pt-2">
                                    <form id="form-filter">
                                        <h6>Filter</h6>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>periode</p>
                                            <label for="periode" class="col-md-3 col-sm-12 col-form-label">Periode</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='periode[]' class='form-control sai-rpt-filter-type selectize'><option value='=' selected>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-7 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="periode[]" id="periode-from" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="periode[]" id="periode-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>kode_fs</p>
                                            <label for="kode_fs" class="col-md-3 col-sm-12 col-form-label">Kode FS</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='kode_fs[]' class='form-control sai-rpt-filter-type selectize'><option value='=' selected>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-7 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="kode_fs[]" id="kode_fs-from" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="kode_fs[]" id="kode_fs-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>level</p>
                                            <label for="level" class="col-md-3 col-sm-12 col-form-label">Level</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='level[]' class='form-control sai-rpt-filter-type selectize'><option value='=' selected>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-7 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="level[]" id="level-from" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="level[]" id="level-to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>format</p>
                                            <label for="format" class="col-md-3 col-sm-12 col-form-label">Format</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='format[]' class='form-control sai-rpt-filter-type selectize'><option value='=' selected>Sama dengan</option></select>
                                            </div>
                                            <div class="col-md-7 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="format[]" id="format-from" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="format[]" id="format-to" readonly>
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
                                <div class="px-4 py-0 row"  style="min-height:63px">
                                    <div class='col-sm-2' style='padding-top: 0;margin:auto'>
                                        <select name="show" id="show" class="form-control" style=''>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="All" selected>All</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-10 text-center">
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
        <div class="row mt-2" id="saku-report">
            <div class="col-12">
                <div class="card px-2 py-2" style="min-height:200px">
                    <div class="border-bottom px-0 py-3 mb-2 navigation-lap hidden">
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb py-0 my-0">
                                <li class="breadcrumb-item active">
                                    Neraca
                                </li>
                            </ol>
                        </nav>            
                        <button type="button" id="btn-back" style="position: absolute;right: 15px;top: 15px;" class="btn btn-light float-right">
                        <i class=""></i> Back</button>
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
                    <h5 class="modal-title" style="position: absolute;"></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
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
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
            }
        });
        var periode = {
            type : "=",
            from : "{{ date('Ym') }}",
            fromname : namaPeriode("{{ date('Ym') }}"),
            to : "",
            toname : "",
        }
        var kode_fs = {
            type : "=",
            from : "{{ Session::get('kode_fs') }}",
            fromname : "{{ Session::get('kode_fs') }}",
            to : "",
            toname : "",
        }

        var level = {
            type : "=",
            from : "1",
            fromname : "1",
            to : "",
            toname : "",
        }

        var format = {
            type : "=",
            from : "Saldo Akhir",
            fromname : "Saldo Akhir",
            to : "",
            toname : "",
        }

        var $aktif = "";

        var param_trace = {
            kode_neraca : "",
            kode_akun : "",
            no_bukti : ""
        };
        function fnSpasi(level)
        {
            var tmp="";
            for (var iS=1; iS<=level; iS++)
            {
                tmp=tmp+"&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            return tmp;
        }
        $.fn.DataTable.ext.pager.numbers_length = 5;

        $('#show').selectize();

        $('#periode-from').val(namaPeriode("{{ date('Ym') }}"));
        $('#kode_fs-from').val("{{ Session::get('kode_fs') }}");
        $('#level-from').val("1");
        $('#format-from').val("Saldo Akhir");

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

            var modul = '';
            var header = [];
            $target = target1;
            var tmp = $target.attr('id');
            tmp = tmp.split("-");
            target2 = tmp[1];
            target3 = tmp[1]+'name';
            
            switch(par){
                case 'kode_fs[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('esaku-report/filter-fs') }}";
                    var columns = [
                        { data: 'kode_fs' },
                        { data: 'nama' }
                    ];
                    header_pilih = ['Kode', 'Nama','Action'];
                    var judul = "Daftar FS <span class='modal-subtitle'></span>";
                    var pilih = "FS";
                    $target = $target;
                    $target2 = target2;
                    var display = "kode";
                    var field = eval("kode_fs");
                    var kunci = "kode_fs";
                break;
                case 'level[]': 
                    header = ['Kode'];
                    var toUrl = "{{ url('esaku-report/filter-level') }}";
                    var columns = [
                        { data: 'kode' }
                    ];
                    header_pilih = ['Kode','Action'];
                    var judul = "Daftar Level <span class='modal-subtitle'></span>";
                    var pilih = "Level";
                    $target = $target;
                    $target2 = target2;
                    var display = "kode";
                    var field = eval("level");
                    var kunci = "level";
                break;
                case 'format[]': 
                    header = ['Kode'];
                    var toUrl = "{{ url('esaku-report/filter-format') }}";
                    var columns = [
                        { data: 'kode' }
                    ];
                    header_pilih = ['Kode','Action'];
                    var judul = "Daftar format <span class='modal-subtitle'></span>";
                    var pilih = "format";
                    $target = $target;
                    $target2 = target2;
                    var display = "kode";
                    var field = eval("format");
                    var kunci = "format";
                break;
                case 'periode[]': 
                    header = ['Periode', 'Nama'];
                    var toUrl = "{{ url('esaku-report/filter-periode-keu') }}";
                    var columns = [
                        { data: 'periode' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Periode <span class='modal-subtitle'></span>";
                    var pilih = "periode";
                    $target = $target;
                    $target2 = target2;
                    var field = eval("periode");
                    var display = "name";
                    var kunci = "periode";
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
                        lengthMenu: "Items Per Page _MENU_"
                    },
                    "columnDefs": [{
                        "targets": 2, "data": null, "defaultContent": "<a class='hapus-item'><i class='simple-icon-trash' style='font-size:18px'></i></a>"
                    }]
                });
                searchTable2.columns.adjust().draw();
            }

            $('#table-search tbody').on('click', 'tr', function () {
                
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                    if(type == "in"){
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
    
                        var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                        var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
                        field["from"] = kode;
                        field["fromname"] = nama;
                        
                        $('#rentang-tag').tagsinput('add', {id:kode,text:'Rentang Awal :'+kode});
                       
                        $('#table-search_wrapper').addClass('hidden');
                        $('#table-search2_wrapper').removeClass('hidden');
                        $('#modal-search .modal-subtitle').html('[Rentang Akhir]');
                    }
                    else if (type == "in"){
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

                        var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                        var nama = $(this).closest('tr').find('td:nth-child(2)').text();
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
    
                        var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                        var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                        if(display == "kodename"){
                            $($target).val(kode+' - '+nama);
                        }else if(display == "name"){
                            $($target).val(nama);
                        }else{   
                            $($target).val(kode);
                        }
    
                        field["to"] = kode;
                        field["toname"] = nama;   
                        console.log(field);      
                        
                        $('#rentang-tag2').tagsinput('add', { id: kode, text: 'Rentang akhir:'+kode });       
                        $('#modal-search').modal('hide');
                    }
                }
            });

            $('#table-search2 tbody').on('click', '.hapus-item', function () {
                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                searchTable2.row( $(this).parents('tr') ).remove().draw();
                console.log('kode_akun='+kode);
                var rowIndexes = [];
                searchTable.rows( function ( idx, data, node ) {             
                    if(data[kunci] === kode){
                        rowIndexes.push(idx);                  
                    }
                    return false;
                }); 
                console.log(rowIndexes);
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
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-7');
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
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-7');
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
                            console.log('close');
        
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-7');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                            if(kunci == "periode"){
        
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                            }else if(kunci == "akun"){
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from+' - '+field.fromname);
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to+' - '+field.toname);
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
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-7');
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
            $formData.append("periode[]",periode.type);
            $formData.append("periode[]",periode.from);
            $formData.append("periode[]",periode.to);
            $formData.append("kode_fs[]",kode_fs.type);
            $formData.append("kode_fs[]",kode_fs.from);
            $formData.append("kode_fs[]",kode_fs.to);
            $formData.append("level[]",level.type);
            $formData.append("level[]",level.from);
            $formData.append("level[]",level.to);
            $formData.append("format[]",format.type);
            $formData.append("format[]",format.from);
            $formData.append("format[]",format.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('esaku-auth/form/rptNeraca') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("periode[]",periode.type);
            $formData.append("periode[]",periode.from);
            $formData.append("periode[]",periode.to);
            $formData.append("kode_fs[]",kode_fs.type);
            $formData.append("kode_fs[]",kode_fs.from);
            $formData.append("kode_fs[]",kode_fs.to);
            $formData.append("level[]",level.type);
            $formData.append("level[]",level.from);
            $formData.append("level[]",level.to);
            $formData.append("format[]",format.type);
            $formData.append("format[]",format.from);
            $formData.append("format[]",format.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('esaku-auth/form/rptNeraca') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        // TRACE
        $('#saku-report #canvasPreview').on('click', '.neraca-lajur', function(e){
            e.preventDefault();
            var kode_neraca = $(this).data('kode_neraca');
            param_trace.kode_neraca = kode_neraca;
            var back = true;
            
            $formData.delete('kode_neraca[]');
            $formData.append('kode_neraca[]', "=");
            $formData.append('kode_neraca[]', kode_neraca);
            $formData.append('kode_neraca[]', "");

            $formData.delete('trail[]');
            $formData.append('trail[]', "=");
            $formData.append('trail[]', "1");
            $formData.append('trail[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca" >Neraca</a>
                </li>
                <li class="breadcrumb-item active" aria-current="neraca-lajur" >Neraca Lajur</li>
            `);
            xurl ="esaku-auth/form/rptNrcLajur";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('#saku-report #canvasPreview').on('click', '.bukubesar', function(e){
        e.preventDefault();
            var kode_akun = $(this).data('kode_akun');
            param_trace.kode_akun = kode_akun;
            var back = true;
            
            $formData.delete('kode_akun[]');
            $formData.append('kode_akun[]', "=");
            $formData.append('kode_akun[]', kode_akun);
            $formData.append('kode_akun[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item active" aria-current="buku-besar">Buku Besar</li>
            `);
            xurl ="esaku-auth/form/rptBukuBesar";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('#saku-report #canvasPreview').on('click', '.jurnal', function(e){
            e.preventDefault();
            var no_bukti = $(this).data('no_bukti');
            param_trace.no_bukti = no_bukti;
            var back = true;
            
            $formData.delete('no_bukti[]');
            $formData.append('no_bukti[]', "=");
            $formData.append('no_bukti[]', no_bukti);
            $formData.append('no_bukti[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="buku-besar">Buku Besar</a>
                </li>
                <li class="breadcrumb-item active" aria-current="jurnal">Jurnal</li>
            `);
            xurl ="esaku-auth/form/rptBuktiJurnal";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.navigation-lap').on('click', '#btn-back', function(e){
            e.preventDefault();
            $formData.delete('periode[]');
            $formData.append("periode[]",periode.type);
            $formData.append("periode[]",periode.from);
            $formData.append("periode[]",periode.to);

            var aktif = $('.breadcrumb-item.active').attr('aria-current');

            if(aktif == "neraca-lajur"){
                xurl = "esaku-auth/form/rptNeraca";
                $formData.delete('back');
                $formData.delete('kode_fs[]');
                $formData.append("kode_fs[]",kode_fs.type);
                $formData.append("kode_fs[]",kode_fs.from);
                $formData.append("kode_fs[]",kode_fs.to);
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="neraca">Neraca</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }
            else if(aktif == "buku-besar"){
                xurl = "esaku-auth/form/rptNrcLajur";
                $formData.delete('kode_neraca[]');
                $formData.append("kode_neraca[]","=");
                $formData.append("kode_neraca[]",param_trace.kode_neraca);
                $formData.append("kode_neraca[]","");
                $formData.delete('kode_akun[]');
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca" >Neraca</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="neraca-lajur">Neraca Lajur</li>
                `);
            }else if(aktif == "jurnal"){
                xurl = "esaku-auth/form/rptBukuBesar";
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param_trace.kode_akun);
                $formData.append("kode_akun[]","");
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca" >Neraca</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="buku-besar">Buku Besar</li>
                `);
            }
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.breadcrumb').on('click', '.klik-report', function(e){
            e.preventDefault();
            var tujuan = $(this).data('href');
            $formData.delete('periode[]');
            $formData.append("periode[]",periode.type);
            $formData.append("periode[]",periode.from);
            $formData.append("periode[]",periode.to);
            if(tujuan == "neraca"){
                $formData.delete('back');
                $formData.delete('kode_fs[]');
                $formData.append("kode_fs[]",kode_fs.type);
                $formData.append("kode_fs[]",kode_fs.from);
                $formData.append("kode_fs[]",kode_fs.to);
                xurl = "esaku-auth/form/rptNeraca";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="neraca" >Neraca</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }else if(tujuan == "neraca-lajur"){
                $formData.delete('kode_neraca[]');
                $formData.append("kode_neraca[]","=");
                $formData.append("kode_neraca[]",param_trace.kode_neraca);
                $formData.append("kode_neraca[]","");
                $formData.delete('kode_akun[]');
                xurl = "esaku-auth/form/rptNrcLajur";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="neraca-lajur">Neraca Lajur</li>
                `);
            }else if(tujuan == "buku-besar"){
                
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param_trace.kode_akun);
                $formData.append("kode_akun[]","");
                xurl = "esaku-auth/form/rptBukuBesar";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca-lajur" >Neraca Lajur</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="buku-besar"Buku Besar</li>
                `);
            }
            $('#saku-report #canvasPreview').load(xurl);
            
        });

        $('#sai-rpt-print').click(function(){
            $('#saku-report #canvasPreview').printThis();
        });

        $("#sai-rpt-excel").click(function(e) {
            e.preventDefault();
            $("#saku-report #canvasPreview").table2excel({
                // exclude: ".excludeThisClass",
                name: "Neraca_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "Neraca_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
            formData.append("periode[]",periode.type);
            formData.append("periode[]",periode.from);
            formData.append("periode[]",periode.to);
            formData.append("kode_fs[]",kode_fs.type);
            formData.append("kode_fs[]",kode_fs.from);
            formData.append("kode_fs[]",kode_fs.to);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-report/send-laporan') }}",
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