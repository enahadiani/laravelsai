<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="min-height: 560px;">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Tagihan 
                            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr style="margin-bottom:0">
                        <div class="table-responsive ">
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .hidden{
                                display:none;
                            }
                            .form-group{
                                margin-bottom:5px !important;
                            }
                            .form-control{
                                font-size:13px !important;
                                padding: .275rem .6rem !important;
                            }
                            .selectize-control, .selectize-dropdown{
                                padding: 0 !important;
                            }
                            i:hover{
                                cursor: pointer;
                                color: blue;
                            }

                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Tagihan</th>
                                        <th>No Dokumen</th>
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
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
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form id="form-tambah" style=''>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Data Tagihan
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style="min-height: auto;">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row no_tagihan">
                                <label for="no_tagihan" class="col-3 col-form-label">No Tagihan</label>
                                <div class="input-group col-3">
                                    <input type='text' name="no_tagihan" id="no_tagihan" class="form-control" value="" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_dokumen" class="col-3 col-form-label">No Dokumen</label>
                                <div class="input-group col-3">
                                    <input type='text' name="no_dokumen" id="no_dokumen" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="app_nik" class="col-3 col-form-label">NIK Karyawan</label>
                                <div class="input-group col-3">
                                    <input type='text' name="app_nik" id="app_nik" class="form-control" value="" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info search-item2" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label id="label_app_nik" class="label-kode" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_cust" class="col-3 col-form-label">Kode Customer</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_cust" id="kode_cust" class="form-control" value="" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info search-item2" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_cust" class="label-kode" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="data-customer">
                                <div class="form-group row">
                                    <label for="bank" class="col-3 col-form-label">Bank</label>
                                    <div class="input-group col-3">
                                        <input class="form-control" type="text" placeholder="Bank" id="bank" name="bank" readonly>
                                    </div>
                                    <label for="cabang" class="col-3 col-form-label">Cabang</label>
                                    <div class="input-group col-3">
                                        <input class="form-control" type="text" placeholder="Cabang" id="cabang" name="cabang" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_rek" class="col-3 col-form-label">No Rek</label>
                                    <div class="input-group col-3">
                                        <input class="form-control" type="text" placeholder="No Rek" id="no_rek" name="no_rek" readonly>
                                    </div>
                                    <label for="nama_rek" class="col-3 col-form-label">Nama Rek</label>
                                    <div class="input-group col-3">
                                        <input class="form-control" type="text" placeholder="Nama Rek" id="nama_rek" name="nama_rek" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_kontrak" class="col-3 col-form-label">No Kontrak</label>
                                <div class="input-group col-3">
                                    <input type='text' name="no_kontrak" id="no_kontrak" class="form-control" value="" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info search-item2" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label id="label_no_kontrak" class="label-kode" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai" class="col-3 col-form-label">Nilai Tagihan</label>
                                <div class="input-group col-3">
                                    <input class="form-control currency" type="text" placeholder="Nilai Tagihan" id="total_nilai" name="total_nilai">
                                </div>
                                <label for="nilai_ppn" class="col-3 col-form-label">Nilai PPN</label>
                                <div class="input-group col-3">
                                    <input class="form-control currency" type="text" placeholder="Nilai PPN" id="total_nilai_ppn" name="total_nilai_ppn" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" placeholder="Tanggal" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-3 col-form-label">Keterangan</label>
                                <div class="input-group col-9">
                                    <input class="form-control" type="text" placeholder="Keterangan" id="keterangan" name="keterangan">
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#bitem" role="tab" aria-selected="true"><span class="hidden-xs-down">Rincian</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bupload" role="tab" aria-selected="true"><span class="hidden-xs-down">Dokumen</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="bitem" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
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
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-tagihan" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#ff9500;color:white">
                                            <tr>
                                                <th style="width:5%">No</th>
                                                <th style="width:30%">Item</th>
                                                <th style="width:15%">Jumlah</th>
                                                <th style="width:15%">Harga</th>
                                                <th style="width:15%">Subtotal</th>
                                                <th style="width:15%">PPN</th>
                                                <th style="width:5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bupload" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row2" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
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
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-tagihan2" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#ff9500;color:white">
                                            <tr>
                                                <th style="width:10%">No</th>
                                                <th style="width:40%">Nama Dokumen</th>
                                                <th style="width:40%">Upload File</th>
                                                <th style="width:10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> 

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

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
        });

        function toNilai(str_num){
            var parts = str_num.split('.');
            number = parts.join('');
            number = number.replace('Rp', '');
            // number = number.replace(',', '.');
            return +number;
        }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('sai-trans/tagihan') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    if(json.daftar.length > 0){
                    return json.daftar;   
                    }else {
                    return [];
                    }
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 4, data: null, 'defaultContent': action_html },
             {
                'targets': 3,
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            }
            ],
        'columns': [
            { data: 'no_bill' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai' },
        ],
        dom: 'lBfrtip',
        language: {
                "emptyTable": "No data available in table"
         },
        buttons: [
            // {
            //     text: '<i class="fa fa-filter"></i> Filter',
            //     action: function ( e, dt, node, config ) {
            //         openFilter();
            //     },
            //     className: 'btn btn-default ml-2' 
            // }
        ]
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#input-tagihan tbody').empty();
        $('#input-tagihan2 tbody').empty();
        $('#row-id').hide();
        $('#id_edit').val('');
        $('.data-customer').hide();
        $('#form-tambah')[0].reset();
        $('.no_tagihan').hide();
        $('#kode_cust').val('');
        $('#no_kontrak').val('');
        $('#app_nik').val('');
        $('#label_kode_cust').text('');
        $('#label_no_kontrak').text('');
        $('#label_app_nik').text('');
        $('#method').val('post');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    function getCustomer(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('sai-master/customer') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.kode_cust == id);
                            if(filter.length > 0) {
                                $('#kode_cust').val(filter[0].kode_cust);
                                $('#label_kode_cust').text(filter[0].nama);
                                $('#bank').val(filter[0].bank);
                                $('#cabang').val(filter[0].cabang);
                                $('#no_rek').val(filter[0].no_rek);
                                $('#nama_rek').val(filter[0].nama_rek);
                                $('.data-customer').show();
                            } else {
                                alert('Customer tidak valid');
                                $('#kode_cust').val('');
                                $('#label_kode_cust').text('');
                                $('#kode_cust').focus();
                            }
                        }
                    }
                }
            });
        }

        function getKontrak(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('sai-trans/kontrak') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.no_kontrak == id);
                            if(filter.length > 0) {
                                $('#no_kontrak').val(filter[0].no_kontrak);
                                $('#label_no_kontrak').text(filter[0].no_dokumen);
                            } else {
                                alert('Kontrak tidak valid');
                                $('#no_kontrak').val('');
                                $('#label_no_kontrak').text('');
                                $('#no_kontrak').focus();
                            }
                        }
                    }
                }
            });
        }

        function getNIK(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('sai-master/karyawan') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.nik == id);
                            if(filter.length > 0) {
                                $('#app_nik').val(filter[0].nik);
                                $('#label_app_nik').text(filter[0].nama);
                            } else {
                                alert('NIK tidak valid');
                                $('#app_nik').val('');
                                $('#label_app_nik').text('');
                                $('#app_nik').focus();
                            }
                        }
                    }
                }
            });
        }

    $('#form-tambah').on('change', '#kode_cust', function(){
        var par = $(this).val();
        getCustomer(par);
    });

    $('#form-tambah').on('change', '#no_kontrak', function(){
        var par = $(this).val();
        getKontrak(par);
    });

    $('#form-tambah').on('change', '#app_nik', function(){
        var par = $(this).val();
        getNIK(par);
    });

    $('#total_nilai').change(function(){
        var nominal = $(this).val();
        var ppn = toNilai(nominal) * 10/100;
        $('#total_nilai_ppn').val(ppn);
    });

        function showFilter(param,target1,target2){
            var par = param;
            var modul = '';
            var header = [];
            $target = target1;
            $target2 = target2;
            
            switch(par){
                case 'app_nik': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sai-master/karyawan') }}";
                    var columns = [
                        { data: 'nik' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Karyawan";
                    var jTarget1 = "val";
                    var jTarget2 = "text";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
                    $target3 = "";
                break;
                case 'no_kontrak': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sai-trans/kontrak') }}";
                    var columns = [
                        { data: 'no_kontrak' },
                        { data: 'no_dokumen' }
                    ];
                    
                    var judul = "Daftar Dokumen";
                    var jTarget1 = "val";
                    var jTarget2 = "text";
                    $target = "#"+$target;
                    $target2 = "#"+$target2;
                    $target3 = "";
                break;
                case 'kode_cust': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sai-master/customer') }}";
                    var columns = [
                        { data: 'kode_cust' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Customer";
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
                    $($target).val(kode);
                    $($target).attr('value',kode);
                    $($target).trigger('change');
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

        $('#form-tambah').on('click', '.search-item2', function(){
            var par = $(this).closest('.row').find('input').attr('name');
            var par2 = $(this).closest('.row').find('label.label-kode').attr('id');
            target1 = par;
            target2 = par2;
            showFilter(par,target1,target2);
        });

        $('#form-tambah').on('click', '#add-row', function(){
            var no=$('#input-tagihan .row-tagihan:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-tagihan'>";
            input += "<td class='no-tagihan text-center'>"+no+"</td>";
            input += "<td><input type='text' name='item[]' class='form-control inp-item itemke"+no+"' value='' required='' style='z-index: 1;position: relative;'></td>";
            input += "<td><input type='text' name='jumlah[]' class='form-control inp-tagihan jumlah jumlahke"+no+"'  value='0'></td>";
            input += "<td><input type='text' name='harga[]' class='form-control inp-tagihan harga hargake"+no+"'  value='0' required></td>";
            input += "<td><input type='text' name='nilai[]' class='form-control inp-tagihan nilai nilaike"+no+"'  value='0' required readonly></td>";
            input += "<td><input type='text' name='nilai_ppn[]' class='form-control inp-tagihan nilai_ppn nilai_ppnke"+no+"'  value='0' required readonly></td>";
            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-tagihan tbody').append(input);
            var jumlah = $('.jumlahke'+no).val();
            var harga = $('.hargake'+no).val();
            var sub = jumlah * harga;
            $('.subtotalke'+no).val(sub);

            $('.inp-tagihan').inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                onCleared: function () { self.Value(''); }
            });
        });

        $('#input-tagihan').on('click', '.hapus-item', function(){
            $(this).closest('tr').remove();
            no=1;
            $('.row-tagihan').each(function(){
                var nom = $(this).closest('tr').find('.no-tagihan');
                nom.html(no);
                no++;
            });
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

        $('#input-tagihan tbody').on('change','.jumlah, .harga', function(){
            var index = $(this).closest('tr').index();
            var harga = $(this).closest('tr').find('.harga').val();
            var jumlah = $(this).closest('tr').find('.jumlah').val();
            var sub = toNilai(jumlah) * toNilai(harga);
            var ppn = sub * 10/100;
            $(this).closest('tr').find('.nilai').val(sub); 
            $(this).closest('tr').find('.nilai_ppn').val(ppn); 
        });

        $('#form-tambah').on('click', '#add-row2', function(){
            var no2=$('#input-tagihan2 .row-tagihan2:last').index();
            no2=no2+2;
            var input2 = "";
            input2 += "<tr class='row-tagihan2'>";
            input2 += "<td class='no-tagihan2 text-center'>"+no2+"</td>";
            input2 += "<td><span>-</span><input type='hidden' name='nama_file[]' value='-' class='inp-file_dok' readonly></td>";
            input2 += "<td><input type='file' name='file_dok[]' required  class='inp-file_dok'></td>";
            input2 += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item2' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
            input2 += "</tr>";
            $('#input-tagihan2 tbody').append(input2);
        });

        $('#input-tagihan2').on('click', '.hapus-item2', function(){
            $(this).closest('tr').remove();
            no=1;
            $('.row-tagihan2').each(function(){
                var nom = $(this).closest('tr').find('.no-tagihan2');
                nom.html(no);
                no++;
            });
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('sai-trans/tagihan-ubah') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('sai-trans/tagihan') }}";
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
                 
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('/sai-auth/login') }}";
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
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('sai-trans/tagihan') }}/"+id,
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
                                window.location.href = "{{ url('sai-auth/login') }}";
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
        var tglM= $(this).closest('tr').find('td').eq(2).html();
        var tglS= $(this).closest('tr').find('td').eq(3).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('sai-trans/tagihan') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#input-tagihan tbody').empty();
                    $('#input-tagihan2 tbody').empty();
                    var tanggal = result.data[0].tanggal;
                    var split = tanggal.split(/[- :]/);
                    tanggal = split[2]+"/"+split[1]+"/"+split[0];
                    $('.no_tagihan').show();
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id').val(id);
                    $('#no_tagihan').val(result.data[0].no_bill);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#tanggal').val(tanggal);
                    $('#total_nilai').val(parseFloat(result.data[0].nilai));
                    $('#total_nilai_ppn').val(parseFloat(result.data[0].nilai_ppn));
                    getCustomer(result.data[0].kode_cust);
                    getKontrak(result.data[0].no_kontrak);
                    getNIK(result.data[0].nik_app);
                    
                    if(result.data_detail.length > 0) {
                        var input = "";
                        var nomor = 1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line = result.data_detail[i];
                            input += "<tr class='row-tagihan'>";
                            input += "<td class='no-tagihan text-center'>"+nomor+"</td>";
                            input += "<td><input type='text' name='item[]' class='form-control inp-item itemke"+nomor+"' value='"+line.item+"' required='' style='z-index: 1;position: relative;'></td>";
                            input += "<td><input type='text' name='jumlah[]' class='form-control inp-tagihan jumlah jumlahke"+nomor+"'  value='"+toNilai(line.harga)+"'></td>";
                            input += "<td><input type='text' name='harga[]' class='form-control inp-tagihan harga hargake"+nomor+"'  value='"+toNilai(line.jumlah)+"' required></td>";
                            input += "<td><input type='text' name='nilai[]' class='form-control inp-tagihan nilai nilaike"+nomor+"'  value='"+toNilai(line.nilai)+"' required readonly></td>";
                            input += "<td><input type='text' name='nilai_ppn[]' class='form-control inp-tagihan nilai_ppn nilai_ppnke"+nomor+"'  value='"+toNilai(line.nilai_ppn)+"' required readonly></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            nomor++;
                        }
                        $('#input-tagihan tbody').html(input);
                        $('.inp-tagihan').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            onCleared: function () { self.Value(''); }
                        });
                    }

                    if(result.data_dokumen.length > 0) {
                        var input2 = "";
                        var nomor = 1;
                        for(var i=0;i<result.data_dokumen.length;i++){
                            var line = result.data_dokumen[i];
                            input2 += "<tr class='row-tagihan2'>";
                            input2 += "<td class='no-tagihan2 text-center'>"+nomor+"</td>";
                            input2 += "<td><span>"+line.no_gambar+"</span><input type='hidden' name='nama_file[]' required  class='inp-file_dok' value='"+line.no_gambar+"' readonly></td>";
                            input2 += "<td><input type='file' name='file_dok[]'  class='inp-file_dok'></td>";
                            input2 += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item2' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-success btn-sm down-dok' style='font-size:8px' href='https://api.simkug.com/api/sai-auth/storage/"+line.no_gambar+"' target='_blank'><i class='fa fa-download fa-1'></i></a></td>";
                            input2 += "</tr>";
                            nomor++;
                        }
                        $('#input-tagihan2 tbody').html(input2);

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
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                }
                $iconLoad.hide();
            }
        });
    });

    </script>