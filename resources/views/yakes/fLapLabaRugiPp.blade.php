        <link rel="stylesheet" href="{{ asset('report.css') }}" />
        <div class="row" id="saku-filter">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body pt-4 pb-2 px-4" style="min-height:69.2px">
                        <h5 style="position:absolute;top: 25px;">Laporan Aktivitas Area</h5>
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
                                <div class="px-4 pb-4 pt-2">
                                    <form id="form-filter">
                                        <h6>Filter</h6>
                                        <!-- COMPONENT -->
                                        @php
                                            $periodeOptions = array('3');
                                            $kodePPOptions = array('1','2','3','i');
                                            $kodeFSOptions = array('3');
                                            $levelOptions = array('3');
                                            $formatOptions = array('3');
                                        @endphp
                                        <x-inp-filter kode="periode" nama="Periode" selected="3" :option="$periodeOptions"/>
                                        <x-inp-filter kode="kode_pp" nama="Area" selected="1" :option="$kodePPOptions"/>
                                        <x-inp-filter kode="kode_fs" nama="Kode FS" selected="3" :option="$kodeFSOptions"/>
                                        <x-inp-filter kode="level" nama="Level" selected="3" :option="$levelOptions"/>
                                        <x-inp-filter kode="format" nama="Format" selected="3" :option="$formatOptions"/>
                                        
                                        <!-- END COMPONENT -->
                                        <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                        <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="collapse" id="collapsePaging">
                                <div class="px-4 py-0 row"  style="min-height:63px">
                                    <label class="col-sm-1 pr-0" style="padding-top: 0;margin:auto">Menampilkan</label>
                                    <div class='col-sm-2 pl-0' style='padding-top: 0;margin:auto'>
                                        <select name="show" id="show" class="" style='border:none'>
                                            <option value="10">10 per halaman</option>
                                            <option value="25">25 per halaman</option>
                                            <option value="50">50 per halaman</option>
                                            <option value="100">100 per halaman</option>
                                            <option value="All" selected>Semua halaman</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9 text-center">
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
                <div class="card px-4 py-4" style="min-height:200px">
                    <div class="border-bottom px-0 py-3 mb-2 navigation-lap hidden">
                        <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb py-0 my-0">
                                <li class="breadcrumb-item active">
                                    Aktivitas Area
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
        @include('yakes.modal_search')
        @include('yakes.modal_email')

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
        var display = "";
        var periode = {
            type : "=",
            from : "{{ date('Ym') }}",
            fromname : namaPeriode("{{ date('Ym') }}"),
            to : "",
            toname : "",
        }
        var kode_pp = {
            type : "All",
            from : "",
            fromname : "",
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

        // $('#show').selectize();

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
                    var toUrl = "{{ url('yakes-report/filter-fs') }}";
                    var columns = [
                        { data: 'kode_fs' },
                        { data: 'nama' }
                    ];
                    header_pilih = ['Kode', 'Nama','Action'];
                    var judul = "Daftar FS <span class='modal-subtitle'></span>";
                    var pilih = "FS";
                    $target = $target;
                    $target2 = target2;
                    display = "kode";
                    var field = eval("kode_fs");
                    var kunci = "kode_fs";
                    var orderby = [];
                break;
                case 'kode_pp[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('yakes-report/filter-pp') }}";
                    var columns = [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ];
                    header_pilih = ['Kode', 'Nama','Action'];
                    var judul = "Daftar PP <span class='modal-subtitle'></span>";
                    var pilih = "PP";
                    $target = $target;
                    $target2 = target2;
                    display = "kode";
                    var field = eval("kode_pp");
                    var kunci = "kode_pp";
                    var orderby = [];
                break;
                case 'level[]': 
                    header = ['Kode'];
                    var toUrl = "{{ url('yakes-report/filter-level') }}";
                    var columns = [
                        { data: 'kode' }
                    ];
                    header_pilih = ['Kode','Action'];
                    var judul = "Daftar Level <span class='modal-subtitle'></span>";
                    var pilih = "Level";
                    $target = $target;
                    $target2 = target2;
                    display = "kode";
                    var field = eval("level");
                    var kunci = "level";
                    var orderby = [];
                break;
                case 'format[]': 
                    header = ['Kode'];
                    var toUrl = "{{ url('yakes-report/filter-format') }}";
                    var columns = [
                        { data: 'kode' }
                    ];
                    header_pilih = ['Kode','Action'];
                    var judul = "Daftar format <span class='modal-subtitle'></span>";
                    var pilih = "format";
                    $target = $target;
                    $target2 = target2;
                    display = "kode";
                    var field = eval("format");
                    var kunci = "format";
                    var orderby = [];
                break;
                case 'periode[]': 
                    header = ['Periode', 'Nama'];
                    var toUrl = "{{ url('yakes-report/filter-periode-keu') }}";
                    var columns = [
                        { data: 'periode' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Periode <span class='modal-subtitle'></span>";
                    var pilih = "periode";
                    $target = $target;
                    $target2 = target2;
                    var field = eval("periode");
                    display = "name";
                    var kunci = "periode";
                    var orderby = [[0,"desc"]];
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
                order: orderby,
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
                    order: orderby,
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
                    order: orderby,
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
                            console.log('close');
        
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-8');
                            $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-3');
                            if(display == "nama"){
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.toname);
                            }else if(display == "kodename"){
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.from+' - '+field.fromname);
                                $aktif.closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to input').val(field.to+' - '+field.toname);
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
            $formData.append("periode[]",periode.type);
            $formData.append("periode[]",periode.from);
            $formData.append("periode[]",periode.to);
            $formData.append("kode_fs[]",kode_fs.type);
            $formData.append("kode_fs[]",kode_fs.from);
            $formData.append("kode_fs[]",kode_fs.to);
            $formData.append("kode_pp[]",kode_pp.type);
            $formData.append("kode_pp[]",kode_pp.from);
            $formData.append("kode_pp[]",kode_pp.to);
            $formData.append("level[]",level.type);
            $formData.append("level[]",level.from);
            $formData.append("level[]",level.to);
            $formData.append("format[]",format.type);
            $formData.append("format[]",format.from);
            $formData.append("format[]",format.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('yakes-auth/form/rptLabaRugiPp') }}";
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
            $formData.append("kode_pp[]",kode_pp.type);
            $formData.append("kode_pp[]",kode_pp.from);
            $formData.append("kode_pp[]",kode_pp.to);
            $formData.append("level[]",level.type);
            $formData.append("level[]",level.from);
            $formData.append("level[]",level.to);
            $formData.append("format[]",format.type);
            $formData.append("format[]",format.from);
            $formData.append("format[]",format.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('yakes-auth/form/rptLabaRugiPp') }}";
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
                    <a href="#" class="klik-report" data-href="laba-rugi" >Laba Rugi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="neraca-lajur" >Neraca Lajur</li>
            `);
            xurl ="yakes-auth/form/rptNrcLajur";
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
                    <a href="#" class="klik-report" data-href="laba-rugi">Laba Rugi</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item active" aria-current="buku-besar">Buku Besar</li>
            `);
            xurl ="yakes-auth/form/rptBukuBesar";
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
                    <a href="#" class="klik-report" data-href="laba-rugi">Laba Rugi</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="buku-besar">Buku Besar</a>
                </li>
                <li class="breadcrumb-item active" aria-current="jurnal">Jurnal</li>
            `);
            xurl ="yakes-auth/form/rptBuktiJurnal";
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
                xurl = "yakes-auth/form/rptLabaRugiPp";
                $formData.delete('back');
                $formData.delete('kode_fs[]');
                $formData.append("kode_fs[]",kode_fs.type);
                $formData.append("kode_fs[]",kode_fs.from);
                $formData.append("kode_fs[]",kode_fs.to);
                
                $formData.append("kode_pp[]",kode_pp.type);
                $formData.append("kode_pp[]",kode_pp.from);
                $formData.append("kode_pp[]",kode_pp.to);
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="laba-rugi">Laba Rugi</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }
            else if(aktif == "buku-besar"){
                xurl = "yakes-auth/form/rptNrcLajur";
                $formData.delete('kode_neraca[]');
                $formData.append("kode_neraca[]","=");
                $formData.append("kode_neraca[]",param_trace.kode_neraca);
                $formData.append("kode_neraca[]","");
                $formData.delete('kode_akun[]');
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="laba-rugi" >Laba Rugi</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="neraca-lajur">Neraca Lajur</li>
                `);
            }else if(aktif == "jurnal"){
                xurl = "yakes-auth/form/rptBukuBesar";
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param_trace.kode_akun);
                $formData.append("kode_akun[]","");
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="laba-rugi" >Laba Rugi</a>
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
            if(tujuan == "laba-rugi"){
                $formData.delete('back');
                $formData.delete('kode_fs[]');
                $formData.append("kode_fs[]",kode_fs.type);
                $formData.append("kode_fs[]",kode_fs.from);
                $formData.append("kode_fs[]",kode_fs.to);
                $formData.append("kode_pp[]",kode_pp.type);
                $formData.append("kode_pp[]",kode_pp.from);
                $formData.append("kode_pp[]",kode_pp.to);
                xurl = "yakes-auth/form/rptLabaRugiPp";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="laba-rugi" >Laba Rugi</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }else if(tujuan == "neraca-lajur"){
                $formData.delete('kode_neraca[]');
                $formData.append("kode_neraca[]","=");
                $formData.append("kode_neraca[]",param_trace.kode_neraca);
                $formData.append("kode_neraca[]","");
                $formData.delete('kode_akun[]');
                xurl = "yakes-auth/form/rptNrcLajur";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="laba-rugi">Laba Rugi</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="neraca-lajur">Neraca Lajur</li>
                `);
            }else if(tujuan == "buku-besar"){
                
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param_trace.kode_akun);
                $formData.append("kode_akun[]","");
                xurl = "yakes-auth/form/rptBukuBesar";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="laba-rugi">Laba Rugi</a>
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

        $('#sai-rpt-print-prev').click(function(){
            var newWindow = window.open();
            var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
            newWindow.document.write(html);
        });

        $("#sai-rpt-excel").click(function(e) {
            e.preventDefault();
            $("#saku-report #canvasPreview").table2excel({
                // exclude: ".excludeThisClass",
                name: "LabaRugi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "LabaRugi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
            $formData.append("periode[]",periode.type);
            $formData.append("periode[]",periode.from);
            $formData.append("periode[]",periode.to);
            $formData.append("kode_pp[]",kode_pp.type);
            $formData.append("kode_pp[]",kode_pp.from);
            $formData.append("kode_pp[]",kode_pp.to);
            $formData.append("kode_fs[]",kode_fs.type);
            $formData.append("kode_fs[]",kode_fs.from);
            $formData.append("kode_fs[]",kode_fs.to);
            $formData.append("level[]",level.type);
            $formData.append("level[]",level.from);
            $formData.append("level[]",level.to);
            $formData.append("format[]",format.type);
            $formData.append("format[]",format.from);
            $formData.append("format[]",format.to);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('yakes-report/send-laporan') }}",
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