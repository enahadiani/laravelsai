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
        .dropdown-toggle::after {
            display:none;
        }
        .dropdown-aksi > .dropdown-item{
            font-size : 0.7rem;
        }
    </style>

    <!-- LIST DATA -->
    <div class="row mb-3" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Kunjungan</h5>
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
                                <th width="15%">No Bukti</th>
                                <th width="15%">Mitra</th>
                                <th width="38%">Alamat</th>
                                <th width="15%">Bidang</th>                                
                                <th width="10%">Periode</th>                                
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

                        <div class="form-group row ">
                            <label for="tgl_kunjungan" class="col-md-2 col-sm-12 col-form-label">Tanggal</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control datepicker" type="text" placeholder="Tanggal Kunjungan" id="tgl_kunjungan" name="tgl_kunjungan" autocomplete="off">
                            </div>                            
                        </div>
                       
                        <div class="form-group row" id="no-bukti-div">
                            <label for="no_bukti" class="col-md-2 col-sm-12 col-form-label">No Bukti</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="No Bukti" id="no-bukti" name="no_bukti" readonly>                                
                            </div>                                                      
                        </div>

                        <div class="form-group row ">
                            <label for="kode_mitra" class="col-md-2 col-sm-12 col-form-label">Mitra</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_mitra" name="kode_mitra" data-input="cbbl" required>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>
                            <div class="col-md-4 col-sm-12" style="border-bottom: 1px solid #d7d7d7;">
                                <label id="label_kode_mitra" style="margin-top: 10px;"></label>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="alamat" class="col-md-2 col-sm-12 col-form-label">Alamat</label>
                            <div class="col-md-10 col-sm-12">
                                <input class="form-control" type="text" placeholder="Alamat Mitra" id="alamat" name="alamat" data-input="cbbl" required readonly>
                            </div>
                            <div class="col-md-2 col-sm-12">
                            </div>                            
                        </div>

                        <div class="form-group row ">
                            <label for="kode_bidang" class="col-md-2 col-sm-12 col-form-label">Bidang</label>
                            <div class="col-md-3 col-sm-12" >
                                 <input class="form-control" type="text"  id="kode_bidang" name="kode_bidang" data-input="cbbl" required readonly>
                                 <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 25px;"></i>
                            </div>
                            <div class="col-md-4 col-sm-12" style="border-bottom: 1px solid #d7d7d7;">
                                <label id="label_kode_bidang" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="bulan" class="col-md-2 col-sm-12 col-form-label">Bulan</label>
                            <div class="col-md-3 col-sm-12" >
                                 <select class="form-control" id="bulan" required>
                                    <option value='01'>Januari</option>
                                    <option value='02'>Februari</option>
                                    <option value='03'>Maret</option>
                                    <option value='04'>April</option>
                                    <option value='05'>Mei</option>
                                    <option value='06'>Juni</option>
                                    <option value='07'>Juli</option>
                                    <option value='08'>Agustus</option>
                                    <option value='09'>September</option>
                                    <option value='10'>Oktober</option>
                                    <option value='11'>November</option>
                                    <option value='12'>Desember</option>
                                 </select>
                                 <input class="form-control" type="hidden" id="bulan-input" name="bulan">
                                 <input class="form-control" type="text" id="bulan-input-text" readonly>
                            </div>
                            <label for="tahun" class="col-md-2 col-sm-12 col-form-label">Tahun</label>
                            <div class="col-md-3 col-sm-12" >
                                 <select class="form-control" id="tahun" required></select>
                                 <input class="form-control" type="hidden" id="tahun-input" name="tahun">
                                 <input class="form-control" type="text" id="tahun-input-text" readonly>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#btambah" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Kunjungan</span></a> </li>                                
                        </ul>
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="btambah" role="tabpanel">
                                <div class='col-xs-12 mt-2' style='overflow-y: hidden; height:auto; margin:0px; padding:0px;'>
                                    <style>
                                    th,td{
                                        padding:8px !important;
                                        vertical-align:middle !important;
                                    }
                                    </style>
                                    <table class="table table-striped table-bordered table-condensed" id="table-btambah" style="width: 120px !important;">
                                        <thead>
                                        <tr>
                                        <th width="5%" class="text-center">Tanggal</th>
                                        <th class="text-center">Jumlah</th>                                                                                                                                      
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
                    <button type="button" class="btn btn-primary" id="btn-ya" style="background:#FC3030">Hapus Data Kunjungan</button>
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
                    <h6 class="modal-title" style="position: absolute;">Preview Data Kunjungan <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span> </h6>
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
    <script type="text/javascript">
        setHeightForm();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        //DATEPICKER FORMAT//
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            autoclose: true,
            orientation: "bottom"
        });
        //END DATEPICKER FORMAT//

        //HELPER FUNCTION//
        function NameBulan(bulan) {
            var array = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            return array[bulan - 1];
        }
        function getMitra(kode) {
            $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/getMitra') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_mitra == kode);
                        if(filter.length > 0) {
                            $('#kode_mitra').val(filter[0].kode_mitra);
                            $('#kode_mitra').attr('value',filter[0].kode_mitra);
                            $('#label_kode_mitra').text(filter[0].nama);
                            $('#alamat').val(filter[0].alamat);
                            $('#kode_bidang').val('')
                            $('#label_kode_bidang').text('')
                        } else {
                            $('#kode_mitra').val('');
                            $('#label_kode_mitra').text('');
                            $('#alamat').val('');
                            $('#kode_mitra').focus();
                        }
                    }
                }
            }
            });
        }
        function getTglServer() {
            $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/getTglServer') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    var tgl = result.daftar[0].tglnow;
                    tgl = tgl.split(' ');
                    var tglNow = tgl[0];
                    var splitTglNow = tglNow.split('-');
                    var tanggal = `${splitTglNow[2]}/${splitTglNow[1]}/${splitTglNow[0]}`
                    $('#tgl_kunjungan').val(tanggal);
                    $('#bulan').val(splitTglNow[1]);
                    $('#bulan-input').val(splitTglNow[1]);
                    $('#tahun').val(splitTglNow[0]);
                    $('#tahun-input').val(splitTglNow[0]);
                }
            }
            });
        }
        function getTahunList() {
            $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/getTahunList') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    for(var i=0;i<result.daftar.length;i++){
                        var data = result.daftar[i];
                        $('#tahun').append($('<option>',{
                            value: data.tahun,
                            text: data.tahun
                        }));
                    }
                }
            }
            });
        }
        function getJumlahTgl(tahun,bulan) {
            $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/getJumlahTgl') }}/"+ tahun + "/" + bulan,
            dataType: 'json',
            async:false,
            success:function(result){
                $('#table-btambah tbody').empty();
                if(result.status){
                    var tgl = 1;
                    var row = "";
                    for(var i=0;i<parseInt(result.daftar[0].jum_tgl);i++) {
                        row += "<tr>";
                        row += "<td style='text-align:center;vertical-align:middle;'><input name='tanggal[]' value='"+("0"+tgl).slice(-2)+"' type='hidden' readonly />"+("0"+tgl).slice(-2)+"</td>"
                        row += "<td style='width: 120px !important;'><input name='jumlah[]' type='text' value='0' class='form-control jumlah' style='width: 120px !important; text-align:right;' required/></td>"
                        row += "</tr>";
                        tgl++;
                    }
                    $('#table-btambah tbody').append(row);
                    $('.jumlah').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        oncleared: function () { self.Value(''); }
                    });
                }
            }
            });
        }
        function getBidang(kodeMitra,kodeBidang) {
            $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/getMitraBid') }}",
            dataType: 'json',
            data:{'param':kodeMitra},
            async:false,
            success:function(result){
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_bidang == kodeBidang);
                        if(filter.length > 0) {
                            $('#kode_bidang').val(filter[0].kode_bidang);
                            $('#kode_bidang').attr('value',filter[0].kode_bidang);
                            $('#label_kode_bidang').text(filter[0].nama);
                        } else {
                            $('#kode_bidang').val('');
                            $('#label_kode_bidang').text('');
                            $('#kode_bidang').focus();
                        }
                    }
                }
            }
            });
        }
        //END HELPER FUNCTION//  

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
                'url': "{{ url('wisata-master/kunjungan') }}",
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
                {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' },
            ],
            'columns': [
                { data: 'no_bukti' },
                { data: 'nama_mitra' },
                { data: 'alamat' },
                { data: 'nama_bidang' },
                { data: function(data) {
                    return NameBulan(parseInt(data.bulan)) +" "+ data.tahun
                } }
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

        // BUTTON TAMBAH
        $('#saku-datatable').on('click', '#btn-tambah', function(){
            $('[id^=label]').html('');
            $('#kode_mitra').val('');
            $('#kode_bidang').val('');
            $('#kode_mitra').attr('value','');
            $('#kode_bidang').attr('value','');
            $('#row-id').hide();
            $('#tgl_kunjungan').attr('readonly', false);
            $('#kode_mitra').attr('readonly', false);
            $('#kode_bidang').attr('readonly', true);
            $('.search-item2').show();
            $('.selectize-control').show();
            $('#table-btambah tbody').empty();
            $('#no-bukti-div').hide();
            $('#bulan-input-text').hide();
            $('#tahun-input-text').hide();
            $('#bulan').hide();
            $('#tahun').hide();
            $('#id_edit').val('');
            $('#judul-form').html('Tambah Data Kunjungan');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            $('#method').val('post');        
            $('#saku-datatable').hide();
            $('#saku-form').show();
            getTahunList();
            getTglServer();
            var bulan = $('#bulan').val();
            var tahun = $('#tahun').val();
            getJumlahTgl(tahun,bulan);
            $('select').selectize();
        });
        // END BUTTON TAMBAH

        // BUTTON KEMBALI
        $('#saku-form').on('click', '#btn-kembali', function(){
            $('#saku-datatable').show();
            $('#saku-form').hide();
        });
        // END BUTTON KEMBALI

        //SHOW FILTER POP UP//
        function showFilter(param,target1,target2){
            var mitra = $('#kode_mitra').val();
            var par = param;
            var modul = '';
            var header = [];
            $target = target1;
            $target2 = target2;
            
            switch(par){
            case 'kode_mitra': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('wisata-master/getMitra') }}";
                    var columns = [
                        { data: 'kode_mitra' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Mitra";
                    var jTarget1 = "val";
                    var jTarget2 = "text";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
                    $target3 = "";
                break;
            case 'kode_bidang':
                header = ['Kode', 'Nama'];
                par = mitra;
                var toUrl = "{{ url('wisata-master/getMitraBid') }}";
                    var columns = [
                        { data: 'kode_bidang' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Bidang";
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
                    // $($target).attr('value',kode);
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
        $('#kode_mitra').change(function(){
            var par = $(this).val();
            getMitra(par);
        });
        $('#bulan').change(function(){
            var bulan = $(this).val();
            var tahun = $('#tahun').val();
            $('#bulan-input').val(bulan);
            getJumlahTgl(tahun, bulan);
        });
        $('#tahun').change(function(){
            var tahun = $(this).val();
            var bulan = $('#bulan').val();
            $('#tahun-input').val(tahun);
            getJumlahTgl(tahun, bulan);
        });
        $('#table-btambah tbody').on('change', 'input', function(){
            var result = $(this).val();
            if(result == '') {
                $(this).val(0);
            }
        })
        //END EVENT CHANGE//

        //BUTTON SIMPAN /SUBMIT
        $('#form-tambah').validate({
            ignore: [],
            errorElement: "label",
            submitHandler: function (form) {
                var parameter = $('#id_edit').val();
                var bulan = $('#bulan').val();
                var tahun = $('#tahun').val();
                var id = $('#id').val();
                if(parameter == "edit"){
                    var url = "{{ url('wisata-master/kunjungan') }}/"+id;
                    var pesan = "updated";
                }else{
                    var url = "{{ url('wisata-master/kunjungan') }}";
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
                            $('#table-btambah tbody').empty();
                            $('#row-id').hide();
                            $('#no-bukti-div').hide();
                            $('#no-bukti').val('');
                            $('input[data-input="cbbl"]').val(''); 
                            // $('#form-tambah')[0].reset();
                            // document.getElementById('form-tambah').reset()
                            // $('#form-tambah').validate().resetForm();
                            $('[id^=label]').html('');
                            $('#id_edit').val('');
                            $('#judul-form').html('Tambah Data Kunjungan');
                            $('#method').val('post');
                            getJumlahTgl(tahun,bulan);
                        
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

        // PREVIEW saat klik di list data
        $('#table-data tbody').on('click','td',function(e){
            if($(this).index() != 5){

                var id = $(this).closest('tr').find('td').eq(0).html();
                $('#modal-delete-id').text(id);
                var data = dataTable.row(this).data();
                var html = `<tr>
                    <td style='border:none'>No Bukti</td>
                    <td style='border:none'>`+id+`</td>
                </tr>
                <tr>
                    <td>Mitra</td>
                    <td>`+data.nama_mitra+`</td>
                </tr>            
                <tr>
                    <td>Alamat</td>
                    <td>`+data.alamat+`</td>
                </tr>
                <tr>
                    <td>Bidang</td>
                    <td>`+data.nama_bidang+`</td>
                </tr>
                <tr>
                    <td>Periode</td>
                    <td>`+NameBulan(parseInt(data.bulan)) +" "+ data.tahun+`</td>
                </tr>
                `;
                $('#table-preview tbody').html(html);
                
                $('#modal-preview-id').text(id);
                $('#modal-preview').modal('show');
            }
        });
        // END PREVIEW saat klik di list data

        // BUTTON EDIT
        $('#saku-datatable').on('click', '#btn-edit', function(){
            var id= $(this).closest('tr').find('td').eq(0).html();
            // $iconLoad.show();
            $('#table-btambah tbody').empty();
            $('#form-tambah').validate().resetForm();
            $('#judul-form').html('Edit Data Kunjungan');
            $.ajax({
                type: 'GET',
                url: "{{ url('wisata-master/kunjungan') }}/" + id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        var dataDate = result.data[0].tanggal.split('-');
                        var tgl = dataDate[2];
                        var bln = dataDate[1];
                        var tahun = dataDate[0]
                        var tanggal =  tgl+"/"+bln+"/"+tahun;

                        $('#id_edit').val('edit');
                        $('#method').val('put');
                        $('#tgl_kunjungan').attr('readonly', true);
                        $('#kode_mitra').attr('readonly', true);
                        $('#kode_bidang').attr('readonly', true);
                        $('#bulan-input-text').show();
                        $('#tahun-input-text').show();
                        $('#bulan').hide();
                        $('#tahun').hide();
                        $('.selectize-control').hide();
                        $('.search-item2').hide();
                        $('#no-bukti-div').show();
                        $('#id_edit').val('edit');
                        $('#method').val('put');
                        $('#id').val(id);                    
                        $('#no-bukti').val(id);                    
                        $('#tgl_kunjungan').val(tanggal);        
                        $('#tahun-input').val(result.data[0].tahun);        
                        $('#bulan-input').val(result.data[0].bulan);
                        $('#tahun-input-text').val(result.data[0].tahun);        
                        $('#bulan-input-text').val(NameBulan(result.data[0].bulan));
                        getMitra(result.data[0].kode_mitra);
                        getBidang(result.data[0].kode_mitra,result.data[0].kode_bidang);

                        var row = '';
                        var no = 1;

                        for(var i=0;i<result.arrbid.length;i++){
                            var data = result.arrbid[i];
                            var split = data.tanggal.split('-');
                            var tanggal = split[2];

                            row += "<tr>";
                            row += "<td style='text-align:center;vertical-align:middle;'><input name='tanggal[]' value='"+tanggal+"' type='hidden' readonly />"+tanggal+"</td>"
                            row += "<td style='width: 120px !important;'><input name='jumlah[]' type='text' value='"+parseInt(data.jumlah)+"' class='form-control jumlah' style='width: 120px !important; text-align:right;' required/></td>"
                            row += "</tr>";
                        }

                        $('#table-btambah tbody').append(row);
                        $('.jumlah').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
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

        // BUTTON HAPUS DATA
        function hapusData(id){
            $.ajax({
                type: 'DELETE',
                url: "{{ url('wisata-master/kunjungan') }}/"+id,
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
                        
                        showNotification("top", "center", "success",'Hapus Data','Data Kunjungan ('+id+') berhasil dihapus ');
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
        //END BUTTON HAPUS//
        //BUTTON HAPUS DI MODAL//
        $('.modal-header').on('click','#btn-delete2',function(e){
            var id = $('#modal-delete-id').text();
            $('#modal-preview').modal('hide');
            $('#modal-delete-id').text(id);
            $('#modal-delete').modal('show');
        });
        //END BUTTON HAPUS DI MODAL//

        //BUTTON EDIT DI MODAL//
        $('.modal-header').on('click', '#btn-edit2', function(){
            var id= $('#modal-preview-id').text();
            $('#table-btambah tbody').empty();
            $('#form-tambah').validate().resetForm();
            $('#judul-form').html('Edit Data Kunjungan');
            $.ajax({
                type: 'GET',
                url: "{{ url('wisata-master/kunjungan') }}/" + id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){
                        var dataDate = result.data[0].tanggal.split('-');
                        var tgl = dataDate[2];
                        var bln = dataDate[1];
                        var tahun = dataDate[0]
                        var tanggal =  tgl+"/"+bln+"/"+tahun;

                        $('#id_edit').val('edit');
                        $('#method').val('put');
                        $('#tgl_kunjungan').attr('readonly', true);
                        $('#kode_mitra').attr('readonly', true);
                        $('#kode_bidang').attr('readonly', true);
                        $('#bulan-input-text').show();
                        $('#tahun-input-text').show();
                        $('#bulan').hide();
                        $('#tahun').hide();
                        $('.selectize-control').hide();
                        $('.search-item2').hide();
                        $('#no-bukti-div').show();
                        $('#id_edit').val('edit');
                        $('#method').val('put');
                        $('#id').val(id);                    
                        $('#no-bukti').val(id);                    
                        $('#tgl_kunjungan').val(tanggal);        
                        $('#tahun-input').val(result.data[0].tahun);        
                        $('#bulan-input').val(result.data[0].bulan);
                        $('#tahun-input-text').val(result.data[0].tahun);        
                        $('#bulan-input-text').val(NameBulan(result.data[0].bulan));
                        getMitra(result.data[0].kode_mitra);
                        getBidang(result.data[0].kode_mitra,result.data[0].kode_bidang);

                        var row = '';
                        var no = 1;

                        for(var i=0;i<result.arrbid.length;i++){
                            var data = result.arrbid[i];
                            var split = data.tanggal.split('-');
                            var tanggal = split[2];

                            row += "<tr>";
                            row += "<td style='text-align:center;vertical-align:middle;'><input name='tanggal[]' value='"+tanggal+"' type='hidden' readonly />"+tanggal+"</td>"
                            row += "<td style='width: 120px !important;'><input name='jumlah[]' type='text' value='"+parseInt(data.jumlah)+"' class='form-control jumlah' style='width: 120px !important; text-align:right;' required/></td>"
                            row += "</tr>";
                        }

                        $('#table-btambah tbody').append(row);
                        $('.jumlah').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
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
        //END BUTTON EDIT DI MODAL//
    </script>