    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h6 style="position:absolute;top: 25px;">Data Notifikasi Umum</h6>
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
                        <div class="input-group input-group-sm" style="width:321px;float:right">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;width:230px !important">
                            <div class="input-group-append" style="width:92px !important">
                                <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height:560px !important;padding-top:1rem;">
                    <div class="table-responsive ">
                        <table id="table-data" class="" style='width:100%'>
                            <thead>
                                <tr>
                                    <th>No Bukti</th>
                                    <th>Jenis</th>
                                    <th>Kontak</th>
                                    <th>Judul</th>
                                    <th>Tgl Input</th>
                                    <th>Kode PP</th>
                                    <th class="text-center">Aksi</th>
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

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row hidden" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                        <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="jenis">Kepada</label>
                                                <select class='form-control selectize' id="jenis" name="jenis">
                                                <option value=''>--- Pilih ---</option>
                                                @if(Session::get('statusAdmin') != "G")
                                                <option value='Semua'>Semua</option>
                                                @endif
                                                <option value='Kelas'>Kelas</option>
                                                <option value='Siswa'>Siswa</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="kontak">Kontak</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_kontak" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-kontak" id="kontak" name="kontak" value="" title="">
                                                    <span class="info-name_kontak">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_kontak"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="judul">Judul Pesan</label>
                                                <input class="form-control" type="text"  id="judul" name="judul" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="deskripsi">Isi Pesan</label>
                                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Dokumen</span></a> 
                                    </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-dok" role="tabpanel">
                                        <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                        </div>
                                        <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table class="table table-bordered table-condensed gridexample" id="input-dok" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th style="width:3%">No</th>
                                                    <th style="width:44%">Path File</th>
                                                    <th width="43%">Upload File</th>
                                                    <th width="10%">Aksi</th>
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
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    <!-- MODAL SEARCH-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:600px">
            <div class="modal-content">
                <div style="display: block;" class="modal-header">
                    <h6 class="modal-title" style="position: absolute;"></h6><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right: ;">
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
                <div class="modal-header py-0" style="display:block;height:49px">
                    <h6 class="modal-title py-2" style="position: absolute;">Preview Data Notifikasi Umum <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span><span id="modal-preview-kode" style="display:none"></span> </h6>
                    <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" id="preview-close">
                    <span>×</span>
                    </button>
                    <div class="dropdown d-inline-block float-right" style="margin-top: 10px;">
                        <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
                        <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
                        </button>
                        <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                            <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                            <!-- <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a> -->
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
    var $target3 = "";
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

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function hitungTotalRow(){
        var total_row = $('#input-dok tbody tr').length;
        $('#total-row').html(total_row+' Baris');
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
        setTimeout(function() {
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    $('.selectize').selectize();
    // END 

    var $dtPP = new Array();

    function getTAPp() {
        $.ajax({
            type:'GET',
            url:"{{ url('ts-trans/notif-umum-pp') }}",
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
                    }
                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
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
                    window.location="{{ url('/ts-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getTAPp();
    jumFilter();

    // LIST DATA
    var action_html = "<a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('ts-trans/notif-umum') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else if(!json.status && json.message == "Unauthorized"){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
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
                "targets": [4],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [5],
                "visible": false,
                "searchable": true
            },
            {'targets': 6, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'jenis' },
            { data: 'kontak' },
            { data: 'judul' },
            { data: 'tgl_input' },
            { data: 'kode_pp'}
        ],
        order:[[4,'desc']],
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

    function getKontak(id,pp=null,jenis){

        if(jenis == "Siswa"){
            var toUrl = "{{ url('ts-trans/notif-umum-siswa') }}";
            var param = {kode_pp:pp,nis:id};
        }else{  
            var toUrl = "{{ url('ts-trans/notif-umum-kelas') }}";
            var param = {kode_pp:pp,kode_kelas:id};
        }
        $.ajax({
            type: 'GET',
            url: toUrl,
            dataType: 'json',
            data:param,
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == "Siswa"){
                            showInfoField('kontak',result.daftar[0].nis,result.daftar[0].nama);
                        }else{
                            showInfoField('kontak',result.daftar[0].kode_kelas,result.daftar[0].nama);
                        }
                    }else{
                        $('#kontak').attr('readonly',false);
                        $('#kontak').css('border-left','1px solid #d7d7d7');
                        $('#kontak').val('');
                        $('#kontak').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                }
            }
        });
    }

    // CBBL
    function showFilter(param,target1=null,target2=null){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        var parameter = {param:par};
        
        switch(par){
            case 'kontak': 
                if($('#jenis')[0].selectize.getValue() == "Siswa"){
                    header = ['ID', 'Nama','Kelas'];  
                    var toUrl = "{{ url('ts-trans/notif-umum-siswa') }}";
                    
                    var columns = [
                        { data: 'nis' },
                        { data: 'nama' },
                        { data: 'kode_kelas' }
                    ];
                    var judul = "Daftar Siswa";
                    var pilih = "siswa";
                }else{  
                    header = ['Kode', 'Nama'];  
                    var toUrl = "{{ url('ts-trans/notif-umum-kelas') }}";
                    var columns = [
                        { data: 'kode_kelas' },
                        { data: 'nama' }
                    ];
                    var judul = "Daftar Kelas";
                    var pilih = "kelas";
                }
                var jTarget1 = "text";
                var jTarget2 = "text";
                $target = ".info-code_"+par;
                $target2 = ".info-name_"+par;
                $target3 = "";
                $target4 = "";
                var tmp = $('#inp-filter_kode_pp').val().split('-');
                parameter = {kode_pp:tmp[0],flag_aktif:1};
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

                var kode = $(this).closest('tr').find('td:nth-child(1)').text();
                var nama = $(this).closest('tr').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $('#'+par).css('border-left',0);
                    $('#'+par).val(kode);
                    $($target).text(kode);
                    $($target).attr("title",nama);
                    $($target).parents('div').removeClass('hidden');
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else if(jTarget2 == "title"){
                    $($target2).attr("title",nama);
                    $($target2).removeClass('hidden');
                }else if(jTarget2 == "text2"){
                    $($target2).text(nama);
                }else{
                    var width= $('#'+par).width()-$('#search_'+par).width()-10;
                    var pos =$('#'+par).position();
                    var height = $('#'+par).height();
                    console.log(par);
                    $('#'+par).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                    $($target2).width($('#'+par).width()-$('#search_'+par).width()-10).css({'left':pos.left,'height':height});
                    $($target2+' span').text(nama);
                    $($target2).attr("title",nama);
                    $($target2).removeClass('hidden');
                    $($target2).closest('div').find('.info-icon-hapus').removeClass('hidden')
                }

                if($target3 != ""){
                    $($target3).text(nama);
                }

                if($target4 != ""){
                    if($target4 != ""){
                        if(par == "nis[]"){
                            $($target).closest('tr').find($target4).click();
                            setTimeout(function() {  $($target).parents("tr").find(".inp-nilai").focus(); }, 50);
                        }
                        else{
                            $($target).closest('tr').find($target4).click();
                        }
                    }
                }
                
                $('#modal-search').modal('hide');
            }
        });
    }

    
    // END CBBL

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var data = dataTable.row( $(this).parents('tr') ).data();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Notifikasi Umum');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('ts-trans/notif-umum-detail') }}",
            dataType: 'json',
            data:{no_bukti:id, kode_pp:data.kode_pp},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#jenis')[0].selectize.setValue(result.data[0].jenis);
                    $('#kontak').val(result.data[0].kontak);
                    $('#judul').val(result.data[0].judul);
                    $('#deskripsi').text(result.data[0].pesan);
                
                    var input = '';
                    $('#input-dok tbody').html(input);
                    if(result.data_dok.length > 0){
                        var no=1;
                        for(var i=0;i<result.data_dok.length;i++){
                            var line =result.data_dok[i];
                            input += "<tr class='row-dok'>";
                            input += "<td class='no-dok text-center'>"+no+"</td>";

                            var dok = "{{ config('api.url').'ts/storage' }}/"+line.file_dok;
                            input += "<td><span class='td-nama_file_seb tdnmfileke"+no+" tooltip-span'>"+line.file_dok+"</span><input type='text' name='nama_file_seb[]' class='form-control inp-nama_file_seb nmfileke"+no+" hidden'  value='"+line.file_dok+"' readonly></td>";
                            if(line.file_dok == "-" || line.file_dok == ""){
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]' class='inp-file_dok'>
                                </td>`;
                            }else{
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]'>
                                </td>`;
                            }
                            input+=`
                                <td class='text-center action-dok'>`;
                                if(line.file_dok != "-"){
                                   var link =`<a class='download-dok' style='font-size:18px' href='`+dok+`'target='_blank' title='Download'><i class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok' style='font-size:18px' href='#' title='Hapus Dokumen'><i class='simple-icon-trash'></i></a>`;
                                }else{
                                    var link =``;
                                }
                            input+=link+"</td></tr>";
                            no++;
                        }
                        $('#input-dok tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        
                    }
                    hitungTotalRow();
                    // $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    getKontak(result.data[0].kontak,data.kode_pp,result.data[0].jenis);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                }
                $iconLoad.hide();
            }
        });
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(id,kode){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('ts-trans/notif-umum') }}",
            dataType: 'json',
            data:{kode_pp:kode,no_bukti:id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Notifikasi Umum ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
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
        var data = dataTable.row( $(this).parents('tr') ).data();
        console.log(data)
        
        
        // var tmp = $(this).closest('tr').find('td').eq(6).html().split("-");
        var kode_pp = data['kode_pp'];
        msgDialog({
            id: id,
            kode: kode_pp,
            type:'hapus'
        });
    });
    // END HAPUS DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Notifikasi Umum');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#jenis')[0].selectize.setValue('');
        // $('#tipe')[0].selectize.setValue('');
        $('#pesan').text('');
        $('#input-dok tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        
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
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON UPDATE

    // PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 4){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row( $(this).parents('tr') ).data();
            var kode_pp = data.kode_pp;
            $.ajax({
                type: 'GET',
                url: "{{ url('ts-trans/notif-umum-detail') }}",
                data:{kode_pp:kode_pp,no_bukti:id},
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){

                        var html = `<tr>
                            <td style='border:none'>No Bukti</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Tipe</td>
                            <td style='border:none'>`+result.data[0].tipe+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Kepada</td>
                            <td style='border:none'>`+result.data[0].jenis+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Kontak</td>
                            <td style='border:none'>`+result.data[0].kontak+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Judul</td>
                            <td style='border:none'>`+result.data[0].judul+`</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Pesan</td>
                            <td style='border:none'>`+result.data[0].pesan+`</td>
                        </tr>
                        `;
                        
                        $('#table-preview tbody').html(html);
                        $('#modal-preview-id').text(id);
                        $('#modal-preview-kode').text(result.data[0].kode_pp);
                        $('#modal-preview').modal('show');
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        var kode_pp = $('#modal-preview-kode').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            kode:kode_pp,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        var kode_pp= $('#modal-preview-kode').text();
        $('#judul-form').html('Edit Data Notifikasi Umum');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $.ajax({
            type: 'GET',
            url: "{{ url('ts-trans/notif-umum-detail') }}",
            dataType: 'json',
            data:{kode_pp:kode_pp,no_bukti:id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#jenis')[0].selectize.setValue(result.data[0].jenis);
                    // $('#tipe')[0].selectize.setValue(result.data[0].tipe);
                    $('#kontak').val(result.data[0].kontak);
                    $('#judul').val(result.data[0].judul);
                    $('#deskripsi').text(result.data[0].pesan);
                
                    if(result.data_dok.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_dok.length;i++){
                            input += "<tr class='row-dok'>";
                            input += "<td class='no-dok text-center'>"+no+"</td>";

                            var dok = "{{ config('api.url').'ts/storage' }}/"+line.file_dok;
                            input += "<td><span class='td-nama_file_seb tdnmfileke"+no+" tooltip-span'>"+line.file_dok+"</span><input type='text' name='nama_file_seb[]' class='form-control inp-nama_file_seb nmfileke"+no+" hidden'  value='"+line.file_dok+"' readonly></td>";
                            if(line.file_dok == "-" || line.file_dok == ""){
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]' class='inp-file_dok'>
                                </td>`;
                            }else{
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]'>
                                </td>`;
                            }
                            input+=`
                                <td class='text-center action-dok'>`;
                                if(line.file_dok != "-"){
                                   var link =`<a class='download-dok' style='font-size:18px' href='`+dok+`'target='_blank' title='Download'><i class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok' style='font-size:18px' href='#' title='Hapus Dokumen'><i class='simple-icon-trash'></i></a>`;
                                }else{
                                    var link =``;
                                }
                            input+=link+"</td></tr>";
                            no++;
                        }
                        $('#input-dok tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        
                    }
                    hitungTotalRow();
                    // $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                    showInfoField('kontak',result.data[0].kontak,result.data[0].nama_kontak);
                   
                }
                else if(!result.status && result.message == 'Unauthorized'){
                   window.location.href = "{{ url('ts-auth/sesi-habis') }}";
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

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            var jumdet = $('#input-dok tr').length;
            
            var param = $('#id').val();
            var id = $('#no_bukti').val();
            var tmp = $('#inp-filter_kode_pp').val().split('-');
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('ts-trans/notif-umum-ubah') }}";
            }else{
                var url = "{{ url('ts-trans/notif-umum') }}";
            }
            formData.append('kode_pp', tmp[0]);
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
                        
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('#row-id').hide();
                        $('#method').val('post');
                        $('#judul-form').html('Tambah Data Notifikasi Umum');
                        $('#id').val('');
                        $('#jenis')[0].selectize.setValue('');
                        $('#pesan').text('');
                        $('#input-dok tbody').html('');
                        $('.input-group-prepend').addClass('hidden');
                        $('span[class^=info-name]').addClass('hidden');
                        $('.info-icon-hapus').addClass('hidden');
                        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
                        if("{{ Session::get('kodePP') }}" != ""){
                            $('#kode_pp').val("{{ Session::get('kodePP') }}");
                            $('#kode_pp').trigger('change');
                        }
                        hitungTotalRow();
                        
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'simpan'
                        });
                        
                        last_add("no_bukti",result.data.no_bukti);
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                    $iconLoad.hide();
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
           

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    // ENTER FIELD FORM
    $('#jenis,#kontak,#judul,#deskripsi').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['jenis','kontak','judul','deskripsi'];
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
    // END ENTER FIELD FORM

    $('#form-tambah').on('click', '.search-item2', function(){

        var par = $(this).closest('div').find('input').attr('name');
        showFilter(par);
    });

    $('#form-tambah').on('change','#jenis',function(){
        if($(this).val() == "Semua"){
            $('#kontak').parents('div').find('.input-group').addClass('readonly');
            $('#kontak').attr('readonly',true);
            $('#kontak').val('-');
            $('#kontak').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
            $('.info-code_kontak').parent('div').addClass('hidden');
            $('.info-name_kontak').addClass('hidden');
            $('.info-icon-hapus').addClass('hidden');
        }else{
            $('#kontak').parents('div').find('.input-group').removeClass('readonly');
            $('#kontak').attr('readonly',false);
            $('#kontak').val('');
            $('#kontak').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
            $('.info-code_kontak').parent('div').addClass('hidden');
            $('.info-name_kontak').addClass('hidden');
            $('.info-icon-hapus').addClass('hidden');
        }
    });

    // GRID JURNAL  
    
    $('#input-dok').on('change','.custom-file-input',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    $('#form-tambah').on('click', '.add-row', function(){
        var no=$('#input-dok .row-dok:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-dok'>";
        input += "<td class='no-dok text-center'>"+no+"</td>";
        input += "<td><span class='td-nama_file_seb tdnmfilesebke"+no+" tooltip-span'>-</span><input type='text' name='nama_file_seb[]' class='form-control inp-nama_file_seb nmfilesebke"+no+" hidden'  value='-' readonly></td>";
        input+=` <td><input type="file" name="file_dok[]" id="file_dok"></td>`;
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-dok tbody').append(input);        
        hitungTotalRow();
        
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

    });


    $('#input-dok').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    // FILTER
    $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var tmp = $('#inp-filter_kode_pp').val().split("-");
                var kode_pp = tmp[0];
                var col_kode_pp = data[5];
                if(kode_pp != ""){
                    if(kode_pp == col_kode_pp){
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
        jumFilter();
    });

    $('[name^=inp-filter]').change(function(e){
        e.preventDefault();
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