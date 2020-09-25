<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3">
    <div id='saiweb_container'>
        <div id='web_datatable'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card' style='border-top:none' >
                        <div class='card-body'>
                            <div class='row'>
                                <div class="col-md-6">
                                <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Pembayaran Non Cash
                                </h4>
                                <hr style="margin-bottom:0px;margin-top:25px">
                                </div>
                                <div class='col-md-6'>
                                </div>
                                <div class='col-md-12'>
                                <!--     <div class="tab-content">
                                        <div class="tab-pane active" id="sai-tab-new" style="position: relative;"> -->
                                            <div class='sai-container-overflow-x'>
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

                                            i.search-item2:hover{
                                                cursor: pointer;
                                                color: #4286f5;
                                            }

                                            i.search-item2{
                                                color: #4286f5;
                                            }

                                            th{
                                                vertical-align:middle !important;
                                            }

                                            #input-biaya .selectize-input, #input-biaya .form-control, #input-biaya .custom-file-label
                                            {
                                                border:0 !important;
                                                border-radius:0 !important;
                                            }
                                            #input-biaya td:hover
                                            {
                                                background:#f4d180 !important;
                                                color:white;
                                            }
                                            #input-biaya td
                                            {
                                                overflow:hidden !important;
                                            }

                                            #input-biaya thead, #table-his thead
                                            {
                                                background:#ff9500;color:white;
                                            }

                                            </style>
                                                <table class='table table-bordered table-striped DataTable' style='width: 100%;' id='table-new'>
                                                <thead>
                                                    <tr>
                                                        <th>No Registrasi</th>
                                                        <th>No Peserta</th>
                                                        <th>Nama Peserta</th>
                                                        <th>Tanggal</th>
                                                        <th>Paket</th>
                                                        <th>Jadwal</th>
                                                        <th>Nilai Paket</th>
                                                        <th>Bayar Paket</th>
                                                        <th>Saldo Paket</th>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                </table>
                                            </div>
                                        <!-- </div> -->
                                        <!-- <div class="tab-pane" id="sai-tab-finish" style="position: relative;">
                                            <div class='sai-container-overflow-x'>
                                                <table class='table table-bordered table-striped DataTable' style='width: 100%;' id='table-finish'>
                                                    <thead>
                                                        <tr>
                                                        <td>No Bukti</td>
                                                        <td>Tanggal</td>
                                                        <td>No Registrasi</td>
                                                        <td>Paket</td>
                                                        <td>Jadwal</td>
                                                        <td>Nilai Paket</td>
                                                        <td>Nilai Tambahan</td>
                                                        <td>Total</td>
                                                        <td>Action</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>-->
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="form" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Pembayaran Non Cash
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:450px' >
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id">
                                </div>
                                <div class="col-3">
                                <input class="form-control" type="hidden" id="no_bukti" name="no_bukti" required >
                                <input class="form-control" type="hidden" readonly id="akunTitip" name="akunTitip">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_akun" class="col-3 col-form-label">Rekening Diskon</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_akun" id="kode_akun" class="form-control" value="" >
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_akun" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_reg" class="col-3 col-form-label">No Registrasi</label>
                                <div class="col-3">
                                <input class="form-control" type="text" id="no_reg" name="no_reg" readonly required>
                                </div>
                                <label for="tgl_berangkat" class="col-3 col-form-label">Jadwal</label>
                                <div class="col-3">
                                <input class="form-control" type="text" id="tgl_berangkat" name="tgl_berangkat" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                <div class="col-9">
                                <input class="form-control" type="text" readonly id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paket" class="col-3 col-form-label">Paket</label>
                                <div class="col-9">
                                <input class="form-control" type="text" readonly id="paket" name="paket">
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detBayar" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Pembayaran</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detBiaya" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Biaya</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detHis" role="tab" aria-selected="true"><span class="hidden-xs-down">History Pembayaran</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detKurs" role="tab" aria-selected="true"><span class="hidden-xs-down">Kalkulator Kurs</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border" style='margin-bottom:30px'>
                                <div class="tab-pane active" id="detBayar" role="tabpanel">
                                    <div class="form-group row mt-2">
                                        <label for="deskripsi" class="col-3 col-form-label">Deskripsi</label>
                                        <div class="col-9">
                                        <input class="form-control" type="text" id="deskripsi" name="deskripsi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status_bayar" class="col-3 col-form-label">Status Bayar</label>
                                        <div class="col-3">
                                            <select class='form-control selectize' id="status_bayar" name="status_bayar">
                                                <option value='' disabled>--- Pilih Status Bayar ---</option>
                                                <option value='TUNAI'>TUNAI</option>
                                                <option value='TRANSFER'>TRANSFER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kode_curr" class="col-3 col-form-label">Curr</label>
                                        <div class="col-3">
                                        <input class="form-control" type="text" id="kode_curr" name="kode_curr" readonly>
                                        </div>

                                        <label for="kurs" class="col-3 col-form-label">Kurs</label>
                                        <div class="col-3">
                                        <input class="form-control currency " type="text" value="0" id="kurs" name="kurs">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="saldo_paket" class="col-3 col-form-label">Saldo Paket + Room</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0" readonly id="saldo_paket" name="saldo_paket">
                                        </div>
                                        <label for="bayar_paket" class="col-3 col-form-label">Bayar Paket Curr</label>
                                        <div class="col-3">
                                        <input class="form-control currency " readonly type="text" value="0" id="bayar_paket" name="bayar_paket">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="saldo_biaya" class="col-3 col-form-label">Saldo Biaya Tambahan</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0" readonly id="saldo_biaya" name="saldo_biaya">
                                        </div>
                                        <label for="bayar_tambahan" class="col-3 col-form-label">Bayar Tambahan</label>
                                        <div class="col-3">
                                        <input class="form-control currency " type="text"  readonly value="0" id="bayar_tambahan" name="bayar_tambahan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="saldo_dok" class="col-3 col-form-label">Saldo Biaya Dokumen</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0" readonly id="saldo_dok" name="saldo_dok">
                                        </div>
                                        <label for="bayar_dok" class="col-3 col-form-label">Bayar Dokumen</label>
                                        <div class="col-3">
                                        <input class="form-control currency " type="text" readonly value="0" id="bayar_dok" name="bayar_dok">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total_bayar" class="col-3 col-form-label">Total Bayar</label>
                                        <div class="col-3">
                                        <input class="form-control currency" type="text" value="0"  id="total_bayar" name="total_bayar" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="detBiaya" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-biaya">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Kode</th>
                                                <th width="25%">Nama Biaya</th>
                                                <th width="10%">Nilai Tagihan</th>
                                                <th width="10%" class="hidden">Jumlah</th>
                                                <th width="15%">Terbayar</th>
                                                <th width="15%">Saldo</th>
                                                <th width="15%">Nilai Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="detHis" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="table-his">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">No Bukti</th>
                                                <th width="10%">Tgl Bayar</th>
                                                <th width="15%">Nilai Paket + Room</th>
                                                <th width="15%">Nilai Tambahan</th>
                                                <th width="15%">Nilai Dokumen</th>
                                                <th width="15%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="detKurs" role="tabpanel">
                                    <div class="form-group row mt-2">
                                        <label for="jenis_bayar" class="col-3 col-form-label">Bayar</label>
                                        <div class="col-3">
                                            <select class='form-control selectize' id="jenis_bayar" name="jenis_bayar">
                                                <option value='' disabled>--- Pilih ---</option>
                                                <option value='PAKET'>PAKET</option>
                                                <option value='ROOM'>ROOM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="konversi" class="col-3 col-form-label">IDR --> USD</label>
                                        <div class="col-3">
                                            <input class="form-control currency" type="text" value="0" id="konversi" name="konversi">
                                        </div>
                                        <div class="col-2">
                                            <a class="btn btn-info" id="konversi_btn" href="#">Konversi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- PRINT PEMBAYARAN -->
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="display:none">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 0" id="btnPreview"><i class="far fa-list-alt"></i> Preview</button>
                                <button type="button" id='btn-lanjut' class="btn btn-secondary" style="margin-left: 6px;margin-top: 0"><i class="fa fa-filter"></i> Filter</button>
                                <div id="pager" style='padding-top: 0px;position: absolute;top: 0;right: 0;'>
                                    <ul id="pagination" class="pagination pagination-sm2"></ul>
                                </div>
                            </div>
                            <div class='col-sm-1' style='padding-top: 0'>
                                <select name="show" id="show" class="form-control" style=''>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px;padding:10px;font-size:12pt !important'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- MODAL SEARCH AKUN-->
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
</div>
<script>
    
    $('#show').selectize();
    function terbilang2(kode_curr){
        if(kode_curr == "IDR"){
            var ket_curr = " rupiah";
        }else if(kode_curr == "USD"){
            var ket_curr = " dollar Amerika";
        }
        return ket_curr;
    }
    
    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function format_number2(x){
        var num = parseFloat(x).toFixed(2);
        num = sepNum(num);
        return num;
    }

    function sepNum2(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(2);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

    function format_number3(x){
        var num = parseFloat(x).toFixed(2);
        num = sepNum2(num);
        return num;
    }

    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }
    
    var $iconLoad = $('.preloader');
    var $kurs_closing = 1;
    var $akunTambah = "-";
    var $akunDokumen = "-";
    var action_html = "<a href='#' title='Edit' class='badge badge-info web_datatable_bayar' ><i class='fas fa-pencil-alt'></i>&nbsp; Bayar</a>";
    var action_html2 = "<a href='#' title='Edit' class='badge badge-info web_datatable_edit' ><i class='fas fa-pencil-alt'></i>&nbsp; Edit</a>";
    var dataTable = $('#table-new').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        "ordering": true,
        "order": [[0, "desc"]],
        'ajax': {
            'url': "{{ url('dago-trans/noncash') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columns': [
            { data: 'no_reg' },
            { data: 'no_peserta' },
            { data: 'nama' },
            { data: 'tgl_input' },
            { data: 'nama_paket' },
            { data: 'tgl_berangkat' },
            { data: 'nilai_paket' },
            { data: 'bayar_paket' },
            { data: 'saldo_paket' },
            { data: 'action' },
            { data: 'status' }
        ],
        "columnDefs": [
            {
                "targets": 0,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='#' title='Edit' class='lap-kartu' data-no_reg='"+row.no_reg+"'>"+row.no_reg+"</a>";
                }
            },
            {'targets': [6,7,8],
                    'className': 'text-right',
                    'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            }, 
            {
                "targets": 9,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a href='#' title='Edit' class='badge badge-info web_datatable_bayar' ><i class='fas fa-pencil-alt'></i>&nbsp; Bayar</a>";
                }
            },{
                "targets": 10,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    if(row.status == "-"){
                        return "";
                    }else{
                        return "<a href='#' title='Sudah Lunas' class='badge badge-success' ><i class='fas fa-check'></i> Lunas</a>";
                    }
                }
            }
        ]
    });

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        var parameter = {};
        switch(par){
            case 'kode_akun': 
                header = ['Kode Akun', 'Nama'];
            var toUrl = "{{ url('dago-trans/noncash-rekbank') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Akun";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                parameter = {'param':par};
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
                "data": parameter,
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
                $($target).trigger("change");
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
                $($target2).trigger("change");
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
                $($target).trigger("change");
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
                $($target2).trigger("change");
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
                    $($target).trigger("change");
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                    $($target2).trigger("change");
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

    function getRekBank(kode_akun){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/noncash-rekbank') }}",
            dataType: 'json',
            data:{'kode_akun':kode_akun},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_akun').val(result.daftar[0].kode_akun);
                         $('#label_kode_akun').text(result.daftar[0].nama);
                    }else{
                        alert('Kode Akun tidak valid');
                        $('#kode_akun').val('');
                        $('#label_kode_akun').text('');
                        $('#kode_akun').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }else{
                    alert('Kode Akun tidak valid');
                    $('#kode_akun').val('');
                    $('#label_kode_akun').text('');
                    $('#kode_akun').focus();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
    }

    function getKurs(curr){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/pembayaran-kurs') }}",
            dataType: 'json',
            data:{'kode_curr':curr},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.kurs !== 'undefined'){
                        $('#kurs').val(format_number(result.kurs));
                    }else{
                        $('#kurs').val(1);
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }else{
                    $('#kurs').val(1);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
    }

    // getRekBank();
    $('.selectize').selectize();

    function hitungTotal(){
        
        var total_t = 0;
        var total_d = 0;
        var total_p = 0;
        var kurs = toNilai($('#kurs').val());

        $('.row-biaya').each(function(){
            var jenis = $(this).closest('tr').find('.inp-jenis_biaya').val();
            var nilai = $(this).closest('tr').find('.inp-nbiaya_bayar').val();
            if(jenis == "TAMBAHAN"){
                total_t += +toNilai(nilai);
            }else if(jenis == "DOKUMEN"){
                total_d += +toNilai(nilai);
            }else{
                total_p += +toNilai(nilai);
            }
        });

        $('#bayar_tambahan').val(total_t);
        $('#bayar_dok').val(total_d);
        $('#bayar_paket').val(format_number2(total_p));
        var total =(toNilai($('#bayar_paket').val())*kurs) + toNilai($('#bayar_tambahan').val()) + toNilai($('#bayar_dok').val());
        total = Math.round(total);
        $('#total_bayar').val(total);
        
    }

    function konversiKurs(){

        var kurs = toNilai($('#kurs').val());
        var konversi = toNilai($('#konversi').val());
        var hasil = konversi/kurs;
        hasil = Math.round(hasil * 100) / 100;
        var jenis = $('#jenis_bayar').val();
        if(jenis == "PAKET"){
            var saldo = toNilai($("[value=PAKET]").closest('tr').find('.inp-saldo_det').val());
            if(hasil <= saldo){
                $("[value=PAKET]").closest('tr').find('.td-nbiaya_bayar').text(format_number2(hasil));
                $("[value=PAKET]").closest('tr').find('.inp-nbiaya_bayar').val(format_number2(hasil));
                $("[value=PAKET]").closest('tr').find('.inp-nbiaya_bayar').trigger('change');
            }else{
                alert('Nilai bayar melebihi saldo Paket');
                $("[value=PAKET]").closest('tr').find('.td-nbiaya_bayar').text(0);
                $("[value=PAKET]").closest('tr').find('.inp-nbiaya_bayar').val(0);
            }
        }else if(jenis == "ROOM"){
            var saldo = toNilai($("[value=ROOM]").closest('tr').find('.inp-saldo_det').val());
            if(hasil <= saldo){
                $("[value=ROOM]").closest('tr').find('.td-nbiaya_bayar').text(format_number2(hasil));
                $("[value=ROOM]").closest('tr').find('.inp-nbiaya_bayar').val(format_number2(hasil));
                $("[value=ROOM]").closest('tr').find('.inp-nbiaya_bayar').trigger('change');
            }else{
                alert('Nilai bayar melebihi saldo Room');
                $("[value=ROOM]").closest('tr').find('.td-nbiaya_bayar').text(0);
                $("[value=ROOM]").closest('tr').find('.inp-nbiaya_bayar').val(0);
            }
        }
    }

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#saiweb_container').on('click', '#btn-kembali', function(){
        
        $('#saku-form').hide();
        $('#web_datatable').show();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        // console.log('clikc');
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    $('#form-tambah').on('click', '#konversi_btn', function(){
        konversiKurs();
    });

    $('#form-tambah').on('change', '#kode_akun', function(){
        var par = $(this).val();
        getRekBank(par);
    });

    $('#input-biaya').on('click', 'td', function(){
        var idx = $(this).index();
        var bayar = $(this).parents("tr").find(".inp-nbiaya_bayar").val();
        var no = $(this).parents("tr").find(".no-biaya").text();
        $(this).parents("tr").find(".inp-nbiaya_bayar").val(bayar);
        $(this).parents("tr").find(".td-nbiaya_bayar").text(bayar);
        if(idx != 7){
            $(this).parents("tr").find(".inp-nbiaya_bayar").hide();
            $(this).parents("tr").find(".td-nbiaya_bayar").show();
            $(this).closest('tr').find('td').removeClass('px-0 py-0 aktif');
            // return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $(this).closest('tr').find('td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                if(idx == 7){
                    $(this).parents("tr").find(".inp-nbiaya_bayar").show();
                    $(this).parents("tr").find(".td-nbiaya_bayar").hide();
                    $(this).parents("tr").find(".inp-nbiaya_bayar").focus();
                }else{
                    $(this).parents("tr").find(".inp-nbiaya_bayar").hide();
                    $(this).parents("tr").find(".td-nbiaya_bayar").show();
                }
        
                hitungTotal();
            }
        }
    });

    
    $('#input-biaya').on('keydown','.inp-nbiaya_bayar',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['','','','','','',' .inp-nbiaya_bayar'];
        var nxt2 = ['','','','','','','.td-nbiaya_bayar'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                    return false;
                    break;
                case 6:
                    if(toNilai(isi) != "" && toNilai(isi) > 0){
                        var bayar = $(this).val();
                        var saldo = $(this).closest('tr').find('.inp-saldo_det').val();
                        if(toNilai(bayar) > toNilai(saldo)){
                            $(this).val(0);
                            $(this).focus();
                            alert('nilai bayar tidak boleh melebihi saldo');
                            
                        }else{
                            $(this).closest("tr").find("td").removeClass("px-0 py-0 aktif");
                            $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                            $(this).closest('tr').find(nxt[idx]).val(isi);
                            $(this).closest('tr').find(nxt2[idx]).text(isi);
                            $(this).closest('tr').find(nxt[idx]).hide();
                            $(this).closest('tr').find(nxt2[idx]).show();
                            hitungTotal();
                        }
                    }else{
                        $(this).closest('tr').find(nxt[idx]).val(0);
                        $(this).closest('tr').find(nxt2[idx]).text(0);
                        $(this).closest('tr').find(nxt[idx]).focus();
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('#saku-datatable').on('click','#btn-print',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        printPbyr(id);
    });

    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#saku-form').hide();
        $('#saku-datatable').show();
        $('#slide-print').hide();
    });

    $('#kode_curr').on('change', function(){
        var kode_curr = $(this).val();
        getKurs(kode_curr);
        
    });

    $('#saiweb_container').on('click', '.web_datatable_bayar', function(){
                      // getset value
        var kode = $(this).closest('tr').find('td:eq(0)').text();
        $('#form-tambah')[0].reset();
        $('#input-biaya tbody').html('');
        // $iconLoad.show();
        $.ajax({
          type: 'GET',
          url: "{{ url('dago-trans/noncash-detail') }}",
          dataType: 'json',
          data: {'no_reg':kode},
          success:function(res){
              if(res.data.status == "SUCCESS"){  
                if(res.data.data_jamaah.length > 0 ){
                    var line = res.data.data_jamaah[0];
                    $('#id_edit').val('');
                    $('#no_bukti').val('');
                    $('#no_reg').val(line.no_reg);
                    $('#nama').val(line.nama);
                    $('#kode_curr').val(line.kode_curr);
                    $('#kode_curr').trigger('change');
                    $('#tgl_berangkat').val(line.tgl_berangkat);						
                    $('#paket').val(line.paket);
                    var hargapaket = parseFloat(line.harga_tot);
                    var akunTitip = line.kode_akun;
                    $('#akunTitip').val(akunTitip);
                    $kurs_closing = parseFloat(line.kurs_closing);
                    var diskon = parseFloat(line.diskon);
                    
                    if (line.no_closing != "-") {
                        $akunDokumen = line.akun_piutang;
                        $akunTambah = line.akun_piutang;
                    }

                    if (res.data.detail_bayar.length){
                        var line2 = res.data.detail_bayar[0];							
                        if (line2 != undefined){										
                            var bayarTambah = parseFloat(line2.tambahan);
                            var bayarPaket = parseFloat(line2.paket);
                            var bayarDok = parseFloat(line2.dokumen);					
                        }
                    }
                    var html='';
                    $('#input-biaya tbody').html('');
                    if (res.data.detail_biaya.length){
                        var no=1;
                        for(var i=0;i< res.data.detail_biaya.length;i++){
                            var line3 = res.data.detail_biaya[i];	
                            // var trbyr = parseFloat(line3.nilai)-parseFloat(line3.saldo);						
                            html+=`<tr class='row-biaya'>
                                <td class='no-biaya'>`+no+`</td>
                                <td>`+line3.kode_biaya+`<input type='text' name='kode_biaya[]' class='form-control inp-kode_biaya biayakode_biayake`+no+` hidden' value='`+line3.kode_biaya+`'></td>
                                <td>`+line3.nama+`<input type='text' name='kode_akunbiaya[]' class='form-control inp-kode_akun biayakode_akunbiayake`+no+` hidden' value='`+line3.akun_pdpt+`'></td>
                                <td class='text-right'>`+format_number(line3.nilai)+`</td>
                                <td class='text-right hidden'>`+format_number(line3.jml)+`<input type='hidden' name='jenis_biaya[]' class='form-control inp-jenis_biaya' value='`+line3.jenis+`'></td>
                                <td class='text-right'>`+format_number(line3.byr)+`<input type='hidden' name='nilai_biaya[]' class='form-control inp-nilai_biaya' value='`+format_number(line3.byr)+`'></td>
                                <td class='text-right'>`+format_number(line3.saldo)+`<input type='hidden' name='saldo_det[]' class='form-control inp-saldo_det' value='`+format_number(line3.saldo)+`'></td>`;
                                html+=`
                                <td class='text-right'><span class='td-nbiaya_bayar tdnbiaya_bayarke`+no+`'>0</span><input type='text' name='nbiaya_bayar[]' class='form-control inp-nbiaya_bayar nbiaya_bayarke`+no+` hidden' value='0' ></td>`;
                                html+=`
                            </tr>`;
                            no++;
                        }
                        $('#input-biaya tbody').html(html);

                        
                        $('.inp-nbiaya_bayar').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('#input-biaya').on('change', '.inp-nbiaya_bayar', function(){
                            var bayar = $(this).val();
                            var saldo = $(this).closest('tr').find('.inp-saldo_det').val();
                            if(toNilai(bayar) > toNilai(saldo)){
                                $(this).val(0);
                                $(this).focus();
                                alert('nilai bayar tidak boleh melebihi saldo');
                            }else{

                                hitungTotal();
                            }
                        });

                    }

                    var saldo = hargapaket - bayarPaket - diskon;
                    var saldot = parseFloat(res.data.totTambah) - bayarTambah;						 
                    var saldom = parseFloat(res.data.totDok) - bayarDok;	
                    $('#saldo_paket').val(format_number(saldo));
                    $('#saldo_biaya').val(format_number(saldot));
                    $('#saldo_dok').val(format_number(saldom));   

                    var html='';
                    $('#table-his tbody').html('');
                    if (res.data.histori_bayar.length){
                        var no=1;
                        for(var i=0;i< res.data.histori_bayar.length;i++){
                            var line4 = res.data.histori_bayar[i];						
                            html+=`<tr class='row-his'>
                                <td class='no-his'>`+no+`</td>
                                <td>`+line4.no_kwitansi+`</td>
                                <td>`+line4.tgl_bayar+`</td>
                                <td class='text-right'>`+format_number(line4.nilai_p)+`</td>
                                <td class='text-right'>`+format_number(line4.nilai_t)+`</td>
                                <td class='text-right'>`+format_number(line4.nilai_m)+`</td>
                                <td class='text-right'>`+format_number(line4.total_idr)+`</td>
                            </tr>`;
                            no++;
                        }
                        $('#table-his tbody').html(html);
                    }
                    $('#web_datatable').hide();
                    $('#saku-form').show();
                } 
              }
            //   $iconLoad.hide();
          },
          fail: function(xhr, textStatus, errorThrown){
              alert('request failed:');
            //   $iconLoad.hide();
          },
          error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status==422){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href>'+jqXHR.responseText+'</a>'
                })
            }
            // $iconLoad.hide();
          }
      });

      
    });     
   
    $('#saiweb_container').on('submit', '#form-tambah', function(e){
      e.preventDefault();
        var nilai_p = toNilai($('#bayar_paket').val());
        var nilai_t = toNilai($('#bayar_tambahan').val());
        var nilai_d = toNilai($('#bayar_dok').val());
        var saldo = toNilai($('#saldo_paket').val());
        var saldo_t = toNilai($('#saldo_biaya').val());
        var saldo_d = toNilai($('#saldo_dok').val());
        var total = toNilai($('#total_bayar').val());
        var kurs = toNilai($('#kurs').val());
        var kode_akun = $('#kode_akun').val();
        var deskripsi = $('#deskripsi').val();

        if (nilai_p > saldo) {
            alert("Transaksi tidak valid. Nilai Bayar Paket melebihi Saldo Paket.");
            return false;						
        }	
        if (nilai_t > saldo_t ) {
            alert("Transaksi tidak valid. Nilai Bayar Biaya Tambahan melebihi Saldo Biaya Tambahan.");
            return false;						
        }	
        if (nilai_d > saldo_d) {
           alert("Transaksi tidak valid. Nilai Bayar Dokumen melebihi Saldo Dokumen.");
            return false;						
        }			
        if (total <= 0) {
            alert("Transaksi tidak valid. Total Bayar tidak boleh nol atau kurang");
            return false;						
        }	
        if(kurs <= 0){
            alert("Kurs tidak valid. Kurs tidak boleh nol atau kurang");
            return false;	
        }
        if(kode_akun == ""){
            alert("Transaksi tidak valid. Rekening kas tidak boleh kosong");
            return false;	
        }
        if(deskripsi == ""){
            alert("Transaksi tidak valid. Deskripsi tidak boleh kosong");
            return false;	
        }

        var formData = new FormData(this);        
        formData.append('kurs_closing',$kurs_closing);
        formData.append('akun_tambah',$akunTambah);
        formData.append('akun_dokumen',$akunTambah);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $iconLoad.show();
        
        $.ajax({
            type: 'POST',
            url: "{{ url('dago-trans/noncash') }}",
            dataType: 'json',
            data: formData,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status == "SUCCESS"){
                    dataTable.ajax.reload();
                    // dataTable2.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been saved.'+result.data.message,
                        'success'
                    )
                    printPbyr(result.data.no_kwitansi);
                    
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
                $iconLoad.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
                $iconLoad.hide();
            }
        });
    });

    //PRINT
    $('#slide-print').on('click','#btn-print',function(e){
        e.preventDefault();
        $('#print-area').printThis();
    });


    function printPbyr(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/pembayaran-preview') }}",
            dataType: 'json',
            async:false,
            data: {'no_kwitansi':id},
            success:function(result){    
                if(result.data.status == "SUCCESS"){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        var line =result.data.data[0];
                        
                        var foto = "{{ asset('asset_elite/images/dago.png') }}";
                        var html=`
                        <style>
                            td,th{
                                padding:4px !important;
                            }
                        </style>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-body printableArea">
                                    <h3 class='text-left'><b>TANDA TERIMA</b> <span class="pull-right">#`+line.no_kwitansi+`</span></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <address>
                                                    <div class="row">
                                                        <div class="col-6 text-left"><img src="`+foto+`" width="150" height="90"></div>
                                                        <div class="col-6 text-right">
                                                        Jl. Puter No. 7 Bandung<br>
                                                        Tlp. 022-2500307, 022-2531259,<br>02517062
                                                        </div>
                                                    </div>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive m-t-40" style="clear: both;">
                                                <table class="table no-border">
                                                    <tbody>
                                                        <tr>
                                                            <td width="154">TANGGAL BAYAR</td>
                                                            <td width="244">: `+line.tgl_bayar+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="154">STATUS BAYAR</td>
                                                            <td width="244">: `+line.sistem_bayar+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td width="154">AKUN</td>
                                                            <td width="244">: `+line.nama_akun+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>DITERIMA DARI</td>
                                                            <td>: `+line.peserta+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>NO TELP</td>
                                                            <td>: `+line.telp+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>PAKET / ROOM</td>
                                                            <td>: `+line.paket+` / `+line.room+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>HARGA PAKET </td>
                                                            <td>: `+line.kode_curr+` `+format_number(line.harga_paket)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>KEBERANGKATAN </td>
                                                            <td>: `+line.jadwal+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>MARKETING / AGEN</td>
                                                            <td>: `+line.nama_marketing+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>AGEN / REFERAL</td>
                                                            <td>:  `+line.nama_agen+` / `+line.referal+`</td>
                                                        </tr>
                                                        <tr><td>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center"><b>DATA PEMBAYARAN</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="border-top:1px dotted black;border-bottom:1px dotted black" width="154">BIAYA PAKET (RP) </td>
                                                            <td style="border-top:1px dotted black;border-bottom:1px dotted black" width="244">: `+format_number(line.biaya_paket)+` - KURS : `+format_number(line.kurs)+`</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SISTEM PEMBAYARAN</td>
                                                            <td>: Cicilan Ke-`+line.cicil_ke+`</td>
                                                            </tr>`;
                                                    if(line.kode_curr == "IDR"){
                                                        html+=`
                                                                <tr>
                                                                    <td>SALDO </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+sepNumPas(line.saldo)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TOTAL BAYAR </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+sepNumPas(line.bayar)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TERBILANG </td>
                                                                    <td width="300" colspan='2'>: `+terbilang(line.bayar)+` `+terbilang2(line.kode_curr)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SISA </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+sepNumPas(line.sisa)+`</td>
                                                                </tr>`;
                                                    }else{
                                                        html+=`
                                                                <tr>
                                                                    <td>SALDO </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+format_number2(line.saldo)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TOTAL BAYAR </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+format_number2(line.bayar)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TERBILANG </td>
                                                                    <td width="300" colspan='2'>: `+terbilangkoma(line.bayar)+` `+terbilang2(line.kode_curr)+`</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>SISA </td>
                                                                    <td colspan='2'>: `+line.kode_curr+` `+format_number2(line.sisa)+`</td>
                                                                </tr>`;
                                                    }
                                                    html+=` 
                                                    <tr>
                                                            <td>DIINPUT OLEH </td>
                                                            <td colspan='2'>: `+line.nik_user+` </td>
                                                        </tr>
                                                        <tr><td colspan='3'>&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    <tr>
                                                        <td align="center" style="width:30%">Customer</td>
                                                        <td align="center" style="width:30%"></td>
                                                        <td align="center" style="width:40%">Penerima</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="">&nbsp;</td>
                                                        <td style="">&nbsp;</td>
                                                        <td style="">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="center">`+line.peserta+`</td>
                                                        <td>&nbsp;</td>
                                                        <td align="center">-------------------------</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="center">KEU/DWI/FORM/001</td>
                                                        <td align="center">Rev 0.0</td>
                                                        <td align="center">Tanggal `+line.tgl_bayar.substr(0,2)+` `+getNamaBulan(line.tgl_bayar.substr(3,2))+` `+line.tgl_bayar.substr(6,4)+`</td>
                                                    </tr>
                                                    <tr><td colspan='3'>&nbsp;</td>
                                                        </tr>
                                                    <tr>
                                                            <td colspan='3' style='font-size:12px;'><i>Catatan: Tanda terima ini bukan kwitansi pembayaran, pembayaran dianggap sah setelah mendapat kwitansi yang ditanda tangani dan diberi cap Finance</i></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><DIV style='page-break-after:always'></DIV>`;
                        $('#print-area').html(html);
                        $('#slide-print').show();
                        $('#web_datatable').hide();
                        $('#saku-form').hide();
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
                $iconLoad.hide();
            }
        });
    }

    $('#kode_akun').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['no_peserta','kode_akun'];
        if (code == 13){
            e.preventDefault();
            return false;
        } 
        // else if( code == 40 || code == 9) {
        //     e.preventDefault();
        //     var idx = nxt.indexOf(e.target.id);
        //     idx++;
        //     $('#'+nxt[idx]).focus();
            
        // }else if(code == 38){
        //     e.preventDefault();
        //     var idx = nxt.indexOf(e.target.id);
        //     idx--;
        //     if(idx != -1){ 
        //         $('#'+nxt[idx]).focus();
        //     }
        // }
    });

    var $formData = new FormData(); 
    $('#saiweb_container').on('click', '.lap-kartu', function(){
        
        $formData.forEach(function(val, key, fD){
            $formData.delete(key);
        });

        var kode = $(this).data('no_reg');
        $formData.append("no_reg", kode);
        xurl = "{{ url('/dago-auth/form')}}/rptKartuPbyr";
        $('#print-area').load(xurl);
        $('#slide-print').show();
        $('#web_datatable').hide();
    }); 

       
</script>