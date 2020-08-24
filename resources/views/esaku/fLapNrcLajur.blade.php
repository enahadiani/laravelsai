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
  
    .page-item.next .page-link, .page-item.all .page-link {
      background: #900604;
      color: #fff;
      border: 1px solid #900604; }
    .page-item.prev .page-link {
      background: #900604;
      border: 1px solid #900604;
      color: #fff; }
    .page-item.first .page-link, .page-item.last .page-link {
      background: transparent;
      color: #900604;
      border: 1px solid #900604;
      border-radius: 30px; }
      .page-item.first .page-link:hover, .page-item.last .page-link:hover {
        background: #900604;
        color: white;
        border: 1px solid #900604; }
    .page-item .page-link:hover {
      background-color: transparent;
      border-color: #c20805;
      color: #900604; }
  .page-item.active .page-link {
    background: transparent;
    border: 1px solid #900604;
    color: #900604; }
  .page-item.disabled .page-link {
    border-color: #d7d7d7;
    color: #d7d7d7;
    background: transparent; }

    </style>
        <div class="row" id="saku-filter">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body pt-4 pb-2 px-4">
                        <h5 style="position:absolute;top: 25px;">Laporan Neraca Lajur</h5>
                        <button id="btn-filter" style="float:right;width:110px" class="btn btn-light ml-2" type="button"><i class="simple-icon-equalizer mr-2" style="transform-style: ;" ></i>Filter</button>
                        <button type="button" id="btn-export" class="btn btn-light" style="float:right;width:110px">Export</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="collapse show" id="collapseFilter">
                                <div class="px-4 pb-4 pt-0">
                                    <form id="form-filter">
                                        <h6>Filter</h6>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>periode</p>
                                            <label for="periode" class="col-md-3 col-sm-12 col-form-label">Periode</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='periode[]' class='form-control sai-rpt-filter-type selectize'><option value='All'>Semua</option><option value='=' selected>Sama dengan</option><option value='Range'>Rentang</option></select>
                                            </div>
                                            <div class="col-md-7 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="periode[]" id="periode_from" readonly>
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
                                                    <input type="text" class="form-control border-right-0 " name="periode[]" id="periode_to" readonly>
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text search-item">ubah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row sai-rpt-filter-entry-row">
                                            <p class="kunci" hidden>akun</p>
                                            <label for="kode_akun" class="col-md-3 col-sm-12 col-form-label">Akun</label>
                                            <div class="col-md-2 col-sm-12" >
                                                <select name='kode_akun[]' class='form-control sai-rpt-filter-type selectize'><option value='All' selected>Semua</option><option value='='>Sama dengan</option><option value='Range'>Rentang</option></select>
                                            </div>
                                            <div class="col-md-7 col-sm-12 sai-rpt-filter-from">
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-right-0 " name="kode_akun[]" id="akun_from" readonly value="Menampilkan semua akun">
                                                    <div class="input-group-append border-left-0">
                                                    <a href="#" class="text-primary input-group-text"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-12 sai-rpt-filter-sampai hidden">
                                                Sampai
                                            </div>
                                            <div class="col-md-3 col-sm-12 sai-rpt-filter-to hidden" >
                                                <div class="input-group" >
                                                    <input type="text" class="form-control border-right-0 " name="kode_akun[]" id="akun_to" readonly>
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
                                <div class="p-4 row">
                                    <div class='col-sm-2' style='padding-top: 0'>
                                        <select name="show" id="show" class="form-control" style=''>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="All">All</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-10 text-center">
                                        <div id="pager">
                                            <ul id="pagination" class="pagination pagination-sm2 float-right"></ul>
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
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
        var periode = {
            type : "=",
            from : "{{ date('Ym') }}",
            fromname : namaPeriode("{{ date('Ym') }}"),
            to : "",
            toname : "",
        }
        var akun = {
            type : "All",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $aktif = "";

        $('#show').selectize();

        $('#periode_from').val(namaPeriode("{{ date('Ym') }}"));
        $('#btn-filter').click(function(e){
            $('#collapseFilter').show();
            $('#collapsePaging').hide();
            if($(this).hasClass("btn-primary")){
                $(this).removeClass("btn-primary");
                $(this).addClass("btn-light");
            }
        });
        
        $('#btn-tutup').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
        });

        $('#btn-tampil').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
        });

        $('.selectize').selectize();

        function showFilter(param,target1,type = null){
            var par = param;

            var modul = '';
            var header = [];
            $target = target1;
            var tmp = $target.attr('id');
            tmp = tmp.split("_");
            target2 = tmp[1];
            target3 = tmp[1]+'name';
            
            switch(par){
                case 'kode_akun[]':
                case 'akun[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('esaku-report/filter-akun') }}";
                    var columns = [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Akun <span class='modal-subtitle'></span>";
                    var pilih = "akun";
                    $target = $target;
                    $target2 = target2;
                    var display = "kodename";
                    var field = eval("akun");
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
            }else{
                var table = "<table class='' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
                table += "<tbody></tbody></table>";
            }


            $('#modal-search .modal-body').html(table);

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
            }

            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    
                    if(type == "range"){
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
                        
                        $('#table-search_wrapper').addClass('hidden');
                        $('#table-search2_wrapper').removeClass('hidden');
                        $('#modal-search .modal-subtitle').html('[Rentang Akhir]');
                    }else{
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
                    $('#modal-search').modal('hide');
                }
            });
        }
        

        $('#form-filter').on('change', '.sai-rpt-filter-type', function(){
            console.log('change');
            var type = $(this).val();
            var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
            var field = eval(kunci);
            switch(type){
                case "All":
                    
                    $aktif = '';
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-7');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('Menampilkan semua '+kunci);
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').removeClass('search-item');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('');
                    
                    field.type = "All";
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
                    console.log(par,target);
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
                case "Range":
                    
                    $aktif = $(this);
                    var par = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').attr('name'); 
                    var target = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
                    console.log(par,target);
                    showFilter(par,target,"range");
                    $('#modal-search').on('hide.bs.modal', function (e) {
                        if($aktif != ""){

                            field.type = "Range";
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
            }
           
        });

        $('#form-filter').on('click', '.search-item', function(){
            var par = $(this).closest('.input-group').find('input').attr('name');
            var target1 = $(this).closest('.input-group').find('input');
            
            showFilter(par,target1);
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("periode[]",periode.type);
            $formData.append("periode[]",periode.from);
            $formData.append("periode[]",periode.to);
            $formData.append("kode_akun[]",akun.type);
            $formData.append("kode_akun[]",akun.from);
            $formData.append("kode_akun[]",akun.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('esaku-auth/form/rptNrcLajur') }}";
            console.log(xurl);
            $('#saku-report .card').load(xurl);
        });

    </script>