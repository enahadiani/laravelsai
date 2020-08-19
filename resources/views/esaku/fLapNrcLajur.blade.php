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
            font-size:18px;
            cursor:pointer;
        }
        #table-filter td:not(:nth-child(1))
        {
            padding:0 !important;
        }
        .selectize-input{
            border-radius:0;
            height:38.4px !important;
        }
        .hidden{
            display:none;
        }
        #table-filter td, #table-filter th
        {
            vertical-align:middle !important;
        }
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
                                    <h6>Filter</h6>
                                    <table class="table no-border table-bordered table-striped" id="table-filter" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="30%">Judul</th>
                                                <th class="text-center" width="10%">Jenis</th>
                                                <th class="text-center" width="30%">Rentang Awal</th>
                                                <th class="text-center" width="30%">Rentang Akhir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="sai-rpt-filter-entry-row">
                                                <td>Periode<p class="jenis" hidden>select</p></td>
                                                <td class="text-center">
                                                    <span class="td-type">=</span>
                                                    <select name='periode[]' class='form-control sai-rpt-filter-type selectize hidden'><option value='All'>All</option><option value='=' selected>=</option><option value='Range'>Range</option></select>
                                                </td>
                                                <td>
                                                    <span class="td-from"></span>
                                                    <select name='periode[]' id="periode_from" class='form-control sai-rpt-filter-from hidden' value=''></select>
                                                </td>
                                                <td>
                                                    <span class="td-to"></span>
                                                    <select name='periode[]' id="periode_to" class='form-control sai-rpt-filter-to hidden' value=''></select>
                                                </td>
                                            </tr>
                                            <tr class="sai-rpt-filter-entry-row">
                                                <td>Kode Akun<p class="jenis" hidden>input</p></td>
                                                <td class="text-center">
                                                    <span class="td-type">All</span>
                                                    <select name='kode_akun[]' class='form-control sai-rpt-filter-type selectize hidden'><option value='All' selected>All</option><option value='='>=</option><option value='Range'>Range</option></select>
                                                </td>
                                                <td>      
                                                    <span class="td-from"></span>                                          
                                                    <div class="input-group sai-rpt-filter-from hidden" >
                                                        <input type="text" class="form-control border-right-0 " name="kode_akun[]" id="kode_akun_from">
                                                        <div class="input-group-append border-left-0">
                                                        <i class="simple-icon-magnifier input-group-text search-item"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="td-to"></span>
                                                    <div class="input-group sai-rpt-filter-to hidden" >
                                                        <input type="text" class="form-control border-right-0 " name="kode_akun[]" id="kode_akun_to">
                                                        <div class="input-group-append border-left-0">
                                                        <i class="simple-icon-magnifier input-group-text search-item"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="button" >Tampilkan</button>
                                    <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="collapse" id="collapsePaging">
                                <div class="p-4">
                                    <div class='col-sm-2' style='padding-top: 0'>
                                        <select name="show" id="show" class="form-control" style=''>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="All">All</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-10">
                                        <div id="pager" style='padding-top: 0px;position: absolute;top: 0;right: 0;'>
                                            <ul id="pagination" class="pagination pagination-sm2"></ul>
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
                <div class="card" style="min-height:200px">
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

        function showFilter(param,target1){
            var par = param;

            var modul = '';
            var header = [];
            $target = target1;
            
            switch(par){
                case 'kode_akun[]': 
                    header = ['Kode', 'Nama'];
                    var toUrl = "{{ url('esaku-report/filter-akun') }}";
                    var columns = [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Akun";
                    var pilih = "akun";
                    var jTarget1 = "val";
                    $target = $target;
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

            // searchTable.$('tr.selected').removeClass('selected');
            // $('#table-search tbody').find('tr:first').addClass('selected');
            $('#modal-search .modal-title').html(judul);
            // $('#memilih').html(pilih);
            $('#modal-search').modal('show');
            searchTable.columns.adjust().draw();

            $('#table-search tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    searchTable.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');

                    var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                    if(jTarget1 == "val"){
                        $($target).val(kode);
                    }else{
                        $($target).text(kode);
                    }
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
                    if(jTarget1 == "val"){
                        $($target).val(kode);
                    }else{
                        $($target).text(kode);
                    }
                    $('#modal-search').modal('hide');
                }
            })
        }
        
        function getPeriode(){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-report/filter-periode') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    var select = $('#periode_from').selectize();
                    select = select[0];
                    var control = select.selectize;
                    control.clearOptions();
                    
                    var select2 = $('#periode_to').selectize();
                    select2 = select2[0];
                    var control2 = select2.selectize;
                    control2.clearOptions();
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){

                            for(i=0;i<result.daftar.length;i++){
                                control.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                                control2.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                            }
                        }
                    }
                }
            });
        }

        getPeriode();

        // $('#table-filter').on('change', '.sai-rpt-filter-type', function(){
        //     var val = $(this).val();
        //     var from =  $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from');
        //     var to =  $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to');
        //     if(val == 'all'){
        //         // from.hide();
        //         // to.hide();
        //         if(from.hasClass('selectize')){
                    
        //             $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from.single').hide();

        //         }else{
        //             from.hide();
        //         }
        //         if(to.hasClass('selectize')){
                    
        //             $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to.single').hide();
                    
        //         }else{
        //             to.hide();
        //         }
        //     }else if(val == 'exact'){
        //         if(from.hasClass('selectize')){
        //             // from.show();
        //             $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from.single').show();
                    
        //         }else{
        //             from.show();
        //         }
        //         to.hide();
        //     }else{
        //         if(from.hasClass('selectize')){
                    
        //             $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from.single').show();
                    

        //         }else{
        //             from.show();
        //         }
        //         if(to.hasClass('selectize')){
        //             $(this).closest('.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to.single').show();
                    
        //         }else{
        //             to.show();
        //         }
        //     }
        // });

        $('#table-filter tbody').on('click', 'tr', function(){
            if ( $(this).hasClass('selected-row') ) {
                $(this).removeClass('selected-row');
            }
            else {
                $('#table-filter tbody tr').removeClass('selected-row');
                $(this).addClass('selected-row');
            }
        });

        $('#table-filter').on('click', '.search-item', function(){

            var par = $(this).closest('td').find('input').attr('name');
            var target1 = $(this).closest('td').find('input');

            showFilter(par,target1);
        });


        $('#table-filter').on('click', 'td', function(){
            var idx = $(this).index();
            var jenis = $(this).closest("tr").find("p.jenis").text();
            //cari aktif td
            var aktif = $('td.aktif');
            if(aktif != undefined){
                var jenis_aktif = $('td.aktif').closest('tr').find('.jenis').text();
                var idx_aktif = $('td.aktif').index();
                if(jenis_aktif == "select"){
                    switch(idx_aktif){
                        case 1 :
                            var isi = $('td.aktif').find(".sai-rpt-filter-type option:selected").text();
                            $('td.aktif').find('.sai-rpt-filter-type.selectize-control').addClass('hidden');
                            $('td.aktif').find('.td-type').text(isi);
                            $('td.aktif').find('.td-type').removeClass('hidden');
                        break;
                        case 2 :
                            var isi = $('td.aktif').find(".sai-rpt-filter-from option:selected").text();
                            $('td.aktif').find('.sai-rpt-filter-from.selectize-control').addClass('hidden');
                            $('td.aktif').find('.td-from').text(isi);
                            $('td.aktif').find('.td-from').removeClass('hidden');
                        break;
                        case 3 :
                            var isi = $('td.aktif').find(".sai-rpt-filter-to option:selected").text();
                            $('td.aktif').find('.sai-rpt-filter-to.selectize-control').addClass('hidden');
                            $('td.aktif').find('.td-to').text(isi);
                            $('td.aktif').find('.td-to').removeClass('hidden');
                        break;
                    }
                }else{
                    switch(idx_aktif){
                        case 1 :
                            var isi = $('td.aktif').find(".sai-rpt-filter-type option:selected").text();
                            $('td.aktif').find('.sai-rpt-filter-type.selectize-control').addClass('hidden');
                            $('td.aktif').find('.td-type').text(isi);
                            $('td.aktif').find('.td-type').removeClass('hidden');
                        break;
                        case 2 :
                            var isi = $('td.aktif').find(".sai-rpt-filter-from input").val();
                            $('td.aktif').find('.sai-rpt-filter-from').addClass('hidden');
                            $('td.aktif').find('.td-from').text(isi);
                            $('td.aktif').find('.td-from').removeClass('hidden');
                        break;
                        case 3 :
                            var isi = $('td.aktif').find(".sai-rpt-filter-to input").val();
                            $('td.aktif').find('.sai-rpt-filter-to').addClass('hidden');
                            $('td.aktif').find('.td-to').text(isi);
                            $('td.aktif').find('.td-to').removeClass('hidden');
                        break;
                    }
                }
            }

            if(jenis == "select"){

                var type = $(this).closest("tr").find("td:eq(1)").find(".sai-rpt-filter-type option:selected").text();
                var from = $(this).closest("tr").find("td:eq(2)").find(".sai-rpt-filter-from option:selected").text();
                var to = $(this).closest("tr").find("td:eq(3)").find(".sai-rpt-filter-to option:selected").text();
                $(this).closest("tr").find(".td-type").text(type);
                $(this).closest("tr").find(".sai-rpt-filter-type")[0].selectize.setValue(type);
                $(this).closest("tr").find(".td-from").text(from);
                $(this).closest("tr").find(".sai-rpt-filter-from")[0].selectize.setValue(from);
                $(this).closest("tr").find(".td-to").text(to);
                $(this).closest("tr").find(".sai-rpt-filter-to")[0].selectize.setValue(to);
            }else{
                var type = $(this).closest("tr").find("td:eq(1)").find(".sai-rpt-filter-type option:selected").text();
                var from = $(this).closest("tr").find("td:eq(2)").find(".sai-rpt-filter-from input").val();
                var to = $(this).closest("tr").find("td:eq(3)").find(".sai-rpt-filter-to input").val();
                $(this).closest("tr").find(".td-type").text(type);
                $(this).closest("tr").find(".sai-rpt-filter-type")[0].selectize.setValue(type);
                $(this).closest("tr").find(".td-from").text(from);
                $(this).closest("tr").find(".sai-rpt-filter-from input").val(from);
                $(this).closest("tr").find(".td-to").text(to);
                $(this).closest("tr").find(".sai-rpt-filter-to input").val(to);
            }

            $('#table-filter td').removeClass('aktif'); 
            if(idx == 0){
                return false;
            }else{
                if($(this).hasClass('aktif')){
                    return false;            
                }else{
                    $(this).addClass('aktif');                    
                    if(idx == 1){
                        $(this).closest("tr").find(".td-type").addClass("hidden");
                        $(this).closest("tr").find(".sai-rpt-filter-type.selectize-control").removeClass("hidden");
                        $(this).closest("tr").find(".sai-rpt-filter-type")[0].selectize.focus()
                    }
                    if(jenis == "select"){

                        if(idx == 2){
                            $(this).closest("tr").find(".td-from").addClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-from.selectize-control").removeClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-from")[0].selectize.focus()
                        }
                        if(idx == 3){
                            $(this).closest("tr").find(".td-to").addClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-to.selectize-control").removeClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-to")[0].selectize.focus()
                        }
                    }else{
                        if(idx == 2){
                            $(this).closest("tr").find(".td-from").addClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-from").removeClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-from input").focus();
                        }

                        if(idx == 3){
                            $(this).closest("tr").find(".td-to").addClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-to").removeClass("hidden");
                            $(this).closest("tr").find(".sai-rpt-filter-to input").focus();
                        }
                    }
                }
            }
        });

    </script>