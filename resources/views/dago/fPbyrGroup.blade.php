<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size:16px">Data Pembayaran Group 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr style="margin-bottom:0px;margin-top:25px">
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
                            .selected-row{
                                cursor:pointer;
                                background:#001cff59 !important;
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

                            #table-reg .selectize-input, #table-reg .form-control, #table-reg .custom-file-label, #table-bdok .selectize-input, #table-bdok .form-control, #table-bdok .custom-file-label
                            {
                                border:0 !important;
                                border-radius:0 !important;
                            }
                            #table-reg td:hover,  #table-bdok td:hover
                            {
                                background:#f4d180 !important;
                                color:white;
                            }
                            #table-reg td, #table-bdok td
                            {
                                overflow:hidden !important;
                            }

                            #table-reg thead, #table-bdok thead
                            {
                                background:#ff9500;color:white;
                            }

                            #input-biaya .selectize-input, #input-biaya .form-control, #input-biaya .custom-file-label,
                            #input-biaya2 .selectize-input, #input-biaya2 .form-control, #input-biaya2 .custom-file-label
                            {
                                border:0 !important;
                                border-radius:0 !important;
                            }
                            #input-biaya td:hover,#input-biaya2 td:hover
                            {
                                background:#f4d180 !important;
                                color:white;
                            }
                            #input-biaya td,#input-biaya2 td
                            {
                                overflow:hidden !important;
                            }
                            
                            #input-biaya thead, #table-his thead,#input-biaya2 thead
                            {
                                background:#ff9500;color:white;
                            }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tanggal</th>
                                        <th>Nama Agen</th>
                                        <th>Total</th>
                                        <th>Action</th>
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
                    <div class="card-body">
                        <form class="form" id="form-tambah">
                            <h4 class="card-title" style="font-size:16px">Form Pembayaran Group 
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr style="margin-bottom:0px;margin-top:25px">
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy" required value="{{ date('d-m-Y')}}">
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="no_bukti" class="col-2 col-form-label">No Bukti</label>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti" name="no_bukti" required readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-info" id="btn-bukti" type="button"><i class="mdi mdi-sync"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <label for="status_bayar" class="col-2 col-form-label">Status Bayar</label>
                                <div class="col-3">
                                <select class='form-control selectize' id="status_bayar" name="status_bayar">
                                <option value='' disabled>--- Pilih Status Bayar ---</option>
                                <option value='TUNAI'>TUNAI</option>
                                <option value='TRANSFER'>TRANSFER</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_akun" class="col-2 col-form-label">Rekening Kas Bank</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_akun" id="kode_akun" class="form-control" value="" >
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-2">
                                    <label id="label_kode_akun" style="margin-top: 10px;"></label>
                                </div>
                                <label for="bayar_paket" class="col-2 col-form-label">Bayar Paket Curr</label>
                                <div class="col-3">
                                <input class="form-control currency " readonly type="text" value="0" id="bayar_paket" name="bayar_paket">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agen" class="col-2 col-form-label">Agen</label>
                                <div class="input-group col-3">
                                    <input type='text' name="agen" id="agen" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-2">
                                    <label id="label_agen" style="margin-top: 10px;"></label>
                                </div>
                                <label for="bayar_tambahan" class="col-2 col-form-label">Bayar Tambahan</label>
                                <div class="col-3">
                                <input class="form-control currency " type="text"  readonly value="0" id="bayar_tambahan" name="bayar_tambahan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_curr" class="col-2 col-form-label">Currency</label>
                                <div class="col-3">
                                <input class="form-control" type="text" id="kode_curr" name="kode_curr" readonly>
                                </div>
                                <div class="col-2"></div>
                                <label for="bayar_dok" class="col-2 col-form-label">Bayar Dokumen</label>
                                <div class="col-3">
                                <input class="form-control currency " type="text" readonly value="0" id="bayar_dok" name="bayar_dok">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kurs" class="col-2 col-form-label">Kurs</label>
                                <div class="col-3">
                                <input class="form-control currency " type="text" value="" id="kurs" name="kurs">
                                </div>
                                <div class="col-2"></div>
                                <label for="total_bayar" class="col-2 col-form-label">Total Bayar</label>
                                <div class="col-3">
                                <input class="form-control currency" type="text" value="0"  id="total_bayar" name="total_bayar">
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-filter" role="tab" aria-selected="true"><span class="hidden-xs-down">Filter</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-reg" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Registrasi</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-konversi" role="tab" aria-selected="true"><span class="hidden-xs-down">Kalkulator Kurs</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="data-filter" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='height:300px;'>
                                        <div class="form-group row">
                                            <label for="deskripsi" class="col-2 col-form-label">Deskripsi</label>
                                            <div class="col-9">
                                            <input class="form-control" type="text" id="deskripsi" name="deskripsi">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="paket" class="col-2 col-form-label">Paket</label>
                                            <div class="input-group col-3">
                                                <input type='text' name="paket" id="paket" class="form-control" value="" >
                                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_paket" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jadwal" class="col-2 col-form-label">Jadwal</label>
                                            <div class="input-group col-3">
                                                <input type='text' name="jadwal" id="jadwal" class="form-control" value="" >
                                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_jadwal" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_peserta" class="col-2 col-form-label">No Jamaah</label>
                                            <div class="input-group col-3">
                                                <input type='text' name="no_peserta" id="no_peserta" class="form-control" value="" >
                                                    <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                            </div>
                                            <div class="col-6">
                                                <label id="label_no_peserta" style="margin-top: 10px;"></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <button type="button" id="btn-load" class="btn btn-info ml-2" style=""><i class="fa fa-plus-circle"></i> Tampil Data</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="data-reg" role="tabpanel">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="bayar-btn" data-toggle="tooltip" title="bayar" style='font-size:18px'><i class='fa fa-pencil-alt'></i></a>
                                    </div>
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px;overflow-x: auto;white-space: nowrap;'>
                                        <style>
                                        th,td{
                                            padding:8px !important;
                                            vertical-align:middle !important;
                                        }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="table-reg">
                                            <thead>
                                                <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">No Reg</th>
                                                <th width="20%">Jadwal</th>
                                                <th width="50%">Paket</th>
                                                <th width="20%">No Jamaah</th>
                                                <th width="50%">Nama</th>
                                                <th width="20%">Saldo Paket</th>
                                                <th width="20%">Saldo Tambahan</th>
                                                <th width="20%">Saldo Dokumen</th>
                                                <th width="20%">Bayar Paket</th>
                                                <th width="20%">Bayar Tambahan</th>
                                                <th width="20%">Bayar Dokumen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="data-konversi" role="tabpanel">
                                    <div class="col-xs-12 mt-2">
                                        <div class="form-group row mt-2">
                                            <label for="jenis_bayar" class="col-2 col-form-label">Bayar</label>
                                            <div class="col-3">
                                                <select class='form-control selectize' id="jenis_bayar" name="jenis_bayar">
                                                <option value='' disabled>--- Pilih ---</option>
                                                <option value='PAKET'>PAKET</option>
                                                <option value='ROOM'>ROOM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="konversi" class="col-2 col-form-label">IDR --> USD</label>
                                            <div class="col-3">
                                                <input class="form-control currency" type="text" value="0" id="konversi" name="konversi">
                                            </div>
                                            <div class="col-2">
                                                <a class="btn btn-info" id="konversi_btn" href="#">Konversi</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                        th,td{
                                            padding:8px !important;
                                            vertical-align:middle !important;
                                        }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-biaya2">
                                            <thead>
                                                <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Kode</th>
                                                <th width="30%">Nama Biaya</th>
                                                <th width="20%">Saldo</th>
                                                <th width="20%">Nilai Bayar</th>
                                                <th width="15%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
       
        <!-- PRINT FORM REG -->
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-reg-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
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
    <!-- MODAL BAYAR DETAIL-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-bayar">
        <div class="modal-dialog modal-lg" role="document" style="max-width:1000px">
            <div class="modal-content">
            <form id="form-bayar">
                <div class='modal-header'>
                    <div class='row' style='width:100%'>
                        <div class='col-9'>
                            <h5 class='modal-title' id='header_modal'></h5>
                        </div>
                        <div class='col-3 text-right'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary'>Simpan</button> 
                        </div>
                    </div>
                </div> 
                <div class="modal-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detBiaya" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Biaya</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#detKurs" role="tab" aria-selected="true"><span class="hidden-xs-down">Kalkulator Kurs</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border" style='margin-bottom:30px'>
                        <div class="tab-pane active" id="detBiaya" role="tabpanel">
                            <div class="form-group row mt-2">
                                <label for="modal_no_reg" class="col-2 col-form-label">No Reg</label>
                                <div class="input-group col-3">
                                    <input type='text' name="modal_no_reg" id="modal_no_reg" class="form-control" value="" required>
                                </div>
                            </div>
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
                                        <th width="10%">Kode</th>
                                        <th width="20%">Nama Biaya</th>
                                        <th width="10%">Nilai Tagihan</th>
                                        <th width="10%">Jumlah</th>
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
                        <div class="tab-pane" id="detKurs" role="tabpanel">
                            <div class='col-xs-12 mt-2' style='height:300px; margin:0px; padding:0px;'>
                                <div class="form-group row mt-2">
                                    <label for="jenis_bayar" class="col-2 col-form-label">Bayar</label>
                                    <div class="col-3">
                                        <select class='form-control selectize' id="jenis_bayar" name="jenis_bayar">
                                        <option value='' disabled>--- Pilih ---</option>
                                        <option value='PAKET'>PAKET</option>
                                        <option value='ROOM'>ROOM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="konversi" class="col-2 col-form-label">IDR --> USD</label>
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
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- END MODAL --> 
    <script>
    function reverseDateNew(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
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

    function format_number3(x){
        var num = parseFloat(x).toFixed(2);
        if(num.toString().substr(-2) == "00"){
            num = parseFloat(x).toFixed(0);
            num = sepNumX(num);
        }else{
            num = parseFloat(x).toFixed(2);
            num = sepNum(num);
        }
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
            var toUrl = "{{ url('dago-trans/pembayaran-rekbank') }}";
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
            case 'no_peserta': 
                header = ['No Peserta', 'Nama'];
            var toUrl = "{{ url('dago-trans/jamaah') }}";
                var columns = [
                    { data: 'no_peserta' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Peserta Jamaah";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                parameter = {'param':par};
            break;
            case 'paket': 
                header = ['No Paket', 'Nama'];
                var toUrl = "{{ url('dago-master/paket') }}";
                var columns = [
                    { data: 'no_paket' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Paket";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                parameter = {'param':par};
            break;
            case 'jadwal': 
                header = ['No Jadwal', 'Tgl Berangkat'];
                var toUrl = "{{ url('dago-trans/jadwal-detail') }}";
                var columns = [
                    { data: 'no_jadwal' },
                    { data: 'tgl_berangkat' }
                ];
                
                var judul = "Daftar Jadwal";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                var no_paket = $('#paket').val();
                parameter = {'no_paket':no_paket};
            break;
            case 'agen': 
                header = ['Kode Agen', 'Nama'];
                var toUrl = "{{ url('dago-master/agen') }}";
                var columns = [
                    { data: 'no_agen' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Agen";
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
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
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
            url: "{{ url('dago-trans/pembayaran-rekbank') }}",
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

    function clearTmp(kode_akun){
        var kode = $('#no_bukti').val();     
        $.ajax({
            type: 'DELETE',
            url: "{{ url('dago-trans/pembayaran-group-det') }}",
            dataType: 'json',
            async:false,
            data: {'no_bukti':kode},
            success:function(result){
                if(result.data.status){
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    //     )
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
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

    function getNoBukti(){
        var tanggal = $('#tanggal').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/pembayaran-group-nobukti') }}",
            dataType: 'json',
            data:{'tanggal':tanggal},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.no_bukti !== 'undefined'){
                        $('#no_bukti').val(result.no_bukti);
                    }else{
                        $('#no_bukti').val('');
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
                    $('#no_bukti').val('');
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

    function getReg(){
        var no_agen = $('#agen').val();
        var no_bukti = $('#no_bukti').val();
        var tanggal = $('#tanggal').val();
        var no_peserta = $('#no_peserta').val();
        var no_jadwal = $('#jadwal').val();
        var no_paket = $('#paket').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/pembayaran-group-reg') }}",
            dataType: 'json',
            data:{'tanggal':tanggal,'no_bukti':no_bukti,'no_agen':no_agen,'no_peserta':no_peserta,'no_jadwal':no_jadwal,'no_paket':no_paket},
            async:false,
            success:function(result){ 
                var html ='';
                if(result.data.status == "SUCCESS"){
                    if(result.data.data.length > 0){
                        var no=1;
                        for(var i=0;i<result.data.data.length;i++){
                            var line =result.data.data[i];
                            html+=`<tr class='row-datareg'>
                            <td class='no-datareg'>`+no+`</td>
                            <td ><span class='td-no_reg tdno_regke`+no+`'>`+line.no_reg+`</span><input type='text' name='no_reg[]' class='form-control inp-no_reg no_regke`+no+` hidden' value='`+line.no_reg+`' readonly>
                            <input type='text' name='no_closing[]' class='form-control inp-no_closing no_closingke`+no+` hidden' value='`+line.no_closing+`' readonly>
                            <input type='text' name='akun_titip[]' class='form-control inp-akun_titip akun_titipke`+no+` hidden' value='`+line.kode_akun+`' readonly>
                            <input type='text' name='kurs_closing[]' class='form-control inp-kurs_closing kurs_closingke`+no+` currency2 hidden'  value='`+format_number(line.kurs_closing)+`' readonly required>
                            </td>
                            <td ><span class='td-tgl_berangkat tdtgl_berangkatke`+no+`'>`+line.tgl_berangkat+`</span><input type='text' name='tgl_berangkat[]' class='form-control inp-tgl_berangkat tgl_berangkatke`+no+` hidden' value='`+line.tgl_berangkat+`' readonly></td>
                            <td ><span class='td-no_paket tdno_paketke`+no+`'>`+line.paket+`</span><input type='text' name='no_paket[]' class='form-control inp-no_paket no_paketke`+no+` hidden' value='`+line.no_paket+`' readonly></td>
                            <td ><span class='td-no_peserta2 tdno_peserta2ke`+no+`'>`+line.no_peserta+`</span><input type='text' name='no_peserta2[]' class='form-control inp-no_peserta2 no_peserta2ke`+no+` hidden' value='`+line.no_peserta+`' readonly></td>
                            <td ><span class='td-nama tdnamake`+no+`'>`+line.nama+`</span><input type='text' name='nama[]' class='form-control inp-nama namake`+no+` hidden' value='`+line.nama+`' readonly></td>
                            <td style='text-align:right'><span class='td-saldo_p tdsaldo_pke`+no+`'>`+format_number3(line.saldo_p)+`</span><input type='text' name='saldo_p[]' class='form-control inp-saldo_p saldo_pke`+no+` currency2 hidden'  value='`+format_number3(line.saldo_p)+`' readonly required></td>
                            <td style='text-align:right'><span class='td-saldo_t tdsaldo_tke`+no+`'>`+format_number(line.saldo_t)+`</span><input type='text' name='saldo_t[]' class='form-control inp-saldo_t saldo_tke`+no+` currency2 hidden'  value='`+format_number(line.saldo_t)+`' readonly required></td>
                            <td style='text-align:right'><span class='td-saldo_m tdsaldo_mke`+no+`'>`+format_number(line.saldo_m)+`</span><input type='text' name='saldo_m[]' class='form-control inp-saldo_m saldo_mke`+no+` currency2 hidden'  value='`+format_number(line.saldo_m)+`' readonly required></td>
                            <td width='10%' style='text-align:right'><span class='td-nilai_paket tdnilai_paketke`+no+`'>0</span><input type='text' name='nilai_paket[]' class='form-control inp-nilai_paket nilai_paketke`+no+` hidden currency2'  value='0' required></td>
                            <td width='10%' style='text-align:right'><span class='td-nilai_tambahan tdnilai_tambahanke`+no+`'>0</span><input type='text' name='nilai_tambahan[]' class='form-control inp-nilai_tambahan nilai_tambahanke`+no+` hidden currency2'  value='0' required></td>
                            <td width='10%' style='text-align:right'><span class='td-nilai_dok tdnilai_dokke`+no+`'>0</span><input type='text' name='nilai_dok[]' class='form-control inp-nilai_dok nilai_dokke`+no+` hidden currency2'  value='0' required></td>
                            </tr>`;
                            no++;
                        }
                        $('#table-reg tbody').html(html);
                        $('.currency2').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });

                        var html='';
                        $('#input-biaya2 tbody').html('');
                        if (result.data.data_detail.length){
                            var no=1;
                            for(var i=0;i< result.data.data_detail.length;i++){
                                var line3 = result.data.data_detail[i];	
                                // var trbyr = parseFloat(line3.nilai)-parseFloat(line3.saldo);	
                                var saldo = parseFloat(line3.saldo)*4;					
                                html+=`<tr class='row-biaya'>
                                <td class='no-biaya'>`+no+`</td>
                                <td>`+line3.kode_biaya+`<input type='text' name='kode_biaya[]' class='form-control inp-kode_biaya biayakode_biayake`+no+` hidden' value='`+line3.kode_biaya+`'></td>
                                <td>`+line3.nama+`<input type='text' name='kode_akunbiaya[]' class='form-control inp-kode_akun biayakode_akunbiayake`+no+` hidden' value='`+line3.akun_pdpt+`'><input type='hidden' name='jenis_biaya[]' class='form-control inp-jenis_biaya' value='`+line3.jenis+`'></td>
                                <td class='text-right'>`+format_number3(saldo)+`<input type='hidden' name='saldo_det[]' class='form-control inp-saldo_det' value='`+format_number3(saldo)+`'></td>`;
                                html+=`
                                <td class='text-right'><span class='td-nbiaya_bayar tdnbiaya_bayarke`+no+`'>0</span><input type='text' name='nbiaya_bayar[]' class='form-control inp-nbiaya_bayar nbiaya_bayarke`+no+` hidden' value='0' ></td>`;
                                html+=`
                                <td><a href='#' class='btn-dist btn btn-primary btn-sm'>Distribusi</a></td>
                                </tr>`;
                                no++;
                            }
                            $('#input-biaya2 tbody').html(html);
                            
                            
                            $('.inp-nbiaya_bayar').inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('#input-biaya2').on('change', '.inp-nbiaya_bayar', function(){
                                var bayar = $(this).val();
                                var saldo = $(this).closest('tr').find('.inp-saldo_det').val();
                                if(toNilai(bayar) > toNilai(saldo)){
                                    $(this).val(0);
                                    $(this).focus();
                                    alert('nilai bayar tidak boleh melebihi saldo');
                                }else{
                                    
                                    // hitungTotal();
                                }
                            });
                            
                        }   

                        hitungBayar();
                        $('a[href=\"#data-reg\"]').click();
                        
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
            }
        });
    }


    var $iconLoad = $('.preloader');
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        "ordering": true,
        "order": [[0, "desc"]],
        'ajax': {
            'url': "{{ url('dago-trans/pembayaran-group') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                    //     window.location.href = "{{ url('dago-auth/login') }}";
                    // })
                    return [];
                }  
            }
        },
        'columns': [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'agen' },
            { data: 'nilai1' }
        ],
        "columnDefs": [
            {
                "targets": 4,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    if("{{ Session::get('userStatus') }}" == "U"){
                        return "";
                    }else{
                        return "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
                    }
                }
            },
            {
                'targets': 3, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            }
        ]
    });
    
    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    
    $('.selectize').selectize();
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#form-tambah')[0].reset();
        $('#id').val('');
        $('#kode_curr').val('USD');
        getNoBukti();
        clearTmp();
        getKurs('USD');
        $('#table-reg tbody').html('');
        $('#input-biaya tbody').html('');
        $('#input-biaya2 tbody').html('');
        // $('#agen').val('AG-001');
        // $('#tanggal').val('06-07-2020');
        // $('#paket').val('C.01');
        // $('#jadwal').val('1');
        // $('#no_peserta').val('2000065');

        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#table-reg tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#table-reg tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('.nav-control').on('click', '#bayar-btn', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row No Reg yang akan dibayar terlebih dahulu!');
            return false;
        }else{
            var kode = $('#table-reg tbody tr.selected-row').find(".inp-no_reg").val();
            var no_bukti = $('#no_bukti').val(); 
            $.ajax({
                type: 'GET',
                url: "{{ url('dago-trans/pembayaran-group-det') }}",
                dataType: 'json',
                data: {'no_reg':kode,'no_bukti':no_bukti},
                success:function(res){
                    if(res.data.status == "SUCCESS"){  
                       
                        $('#modal_no_reg').val(kode);
                        var html='';
                        $('#input-biaya tbody').html('');
                        if (res.data.data.length){
                            var no=1;
                            for(var i=0;i< res.data.data.length;i++){
                                var line3 = res.data.data[i];	
                                // var trbyr = parseFloat(line3.nilai)-parseFloat(line3.saldo);						
                                html+=`<tr class='row-biaya'>
                                <td class='no-biaya'>`+no+`</td>
                                <td>`+line3.kode_biaya+`<input type='text' name='kode_biaya[]' class='form-control inp-kode_biaya biayakode_biayake`+no+` hidden' value='`+line3.kode_biaya+`'></td>
                                <td>`+line3.nama+`<input type='text' name='kode_akunbiaya[]' class='form-control inp-kode_akun biayakode_akunbiayake`+no+` hidden' value='`+line3.akun_pdpt+`'></td>
                                <td class='text-right'>`+format_number3(line3.nilai)+`</td>
                                <td class='text-right'>`+format_number3(line3.jml)+`<input type='hidden' name='jenis_biaya[]' class='form-control inp-jenis_biaya' value='`+line3.jenis+`'></td>
                                <td class='text-right'>`+format_number3(line3.byr)+`<input type='hidden' name='nilai_biaya[]' class='form-control inp-nilai_biaya' value='`+format_number3(line3.byr)+`'></td>
                                <td class='text-right'>`+format_number3(line3.saldo)+`<input type='hidden' name='saldo_det[]' class='form-control inp-saldo_det' value='`+format_number3(line3.saldo)+`'></td>`;
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
                                    
                                    // hitungTotal();
                                }
                            });
                            
                            $('#modal-bayar .modal-title').html('Form Detail Bayar');
                            $('#modal-bayar').modal('show');
                            
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
        }
    });

    $('#form-tambah').on('click', '#btn-bukti', function(){
        getNoBukti();
    });

    $('#form-tambah').on('click', '#btn-load', function(){
        clearTmp();
        getReg();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    function hitungBayar(){
        
        var total_t = 0;
        var total_d = 0;
        var total_p = 0;
        var kurs = toNilai($('#kurs').val());

        $('.row-datareg').each(function(){
            var nilai_p = $(this).closest('tr').find('.inp-nilai_paket').val();
            var nilai_t = $(this).closest('tr').find('.inp-nilai_tambahan').val();
            var nilai_d = $(this).closest('tr').find('.inp-nilai_dok').val();
            total_t += +toNilai(nilai_t);
            total_d += +toNilai(nilai_d);
            total_p += +toNilai(nilai_p);
        });

        $('#bayar_tambahan').val(total_t);
        $('#bayar_dok').val(total_d);
        $('#bayar_paket').val(format_number3(total_p));
        var total =(toNilai($('#bayar_paket').val())*kurs) + toNilai($('#bayar_tambahan').val()) + toNilai($('#bayar_dok').val());
        total = Math.round(total);
        $('#total_bayar').val(total);
        
    }

    function konversiKurs(id_table){

        var kurs = toNilai($('#kurs').val());
        var konversi = toNilai($('#konversi').val());
        var hasil = konversi/kurs;
        hasil = Math.round(hasil * 100) / 100;
        var jenis = $('#jenis_bayar').val();
        if(jenis == "PAKET"){
            var saldo = toNilai($(id_table+" [value=PAKET]").closest('tr').find('.inp-saldo_det').val());
            if(hasil <= saldo){
                $(id_table+" [value=PAKET]").closest('tr').find('.td-nbiaya_bayar').text(format_number3(hasil));
                $(id_table+" [value=PAKET]").closest('tr').find('.inp-nbiaya_bayar').val(format_number3(hasil));
                $(id_table+" [value=PAKET]").closest('tr').find('.inp-nbiaya_bayar').trigger('change');
            }else{
                alert('Nilai bayar melebihi saldo Paket');
                $(id_table+" value=PAKET]").closest('tr').find('.td-nbiaya_bayar').text(0);
                $(id_table+" value=PAKET]").closest('tr').find('.inp-nbiaya_bayar').val(0);
            }
        }else if(jenis == "ROOM"){
            var saldo = toNilai($(id_table+" [value=ROOM]").closest('tr').find('.inp-saldo_det').val());
            if(hasil <= saldo){
                $(id_table+" [value=ROOM]").closest('tr').find('.td-nbiaya_bayar').text(format_number3(hasil));
                $(id_table+" [value=ROOM]").closest('tr').find('.inp-nbiaya_bayar').val(format_number3(hasil));
                $(id_table+" [value=ROOM]").closest('tr').find('.inp-nbiaya_bayar').trigger('change');
            }else{
                alert('Nilai bayar melebihi saldo Room');
                $(id_table+" [value=ROOM]").closest('tr').find('.td-nbiaya_bayar').text(0);
                $(id_table+" [value=ROOM]").closest('tr').find('.inp-nbiaya_bayar').val(0);
            }
        }
        if(id_table == "#input-biaya"){
            $('a[href=\"#detBiaya\"]').click();
        }
    }

    function distribusi(ini,jenis = null){
        // try{
			//nilai paket = USD
            var no_bukti = $('#no_bukti').val();
            var kode_biaya = ini.find('.inp-kode_biaya').val();
            var kode_akunbiaya = ini.find('.inp-kode_akun').val();
            var jenis_biaya = ini.find('.inp-jenis_biaya').val();
            var nbiaya_bayar = ini.find('.inp-nbiaya_bayar').val();

            var formData = new FormData();     
            formData.append('no_bukti',no_bukti);
            formData.append('kode_biaya',kode_biaya); 
            formData.append('kode_akunbiaya',kode_akunbiaya);
            formData.append('jenis_biaya',jenis_biaya);
            formData.append('nbiaya_bayar',nbiaya_bayar);
            $('.row-datareg').each(function(){
                var kode = $(this).closest("tr").find('.td-no_reg').text();
                var saldo_paket = $(this).closest("tr").find('.td-saldo_p').text();
                var saldo_tambahan = $(this).closest("tr").find('.td-saldo_t').text();
                var saldo_dokumen = $(this).closest("tr").find('.td-saldo_m').text();
                formData.append('no_reg[]',kode); 
                formData.append('saldo_paket[]',saldo_paket); 
                formData.append('saldo_tambahan[]',saldo_tambahan); 
                formData.append('saldo_dokumen[]',saldo_dokumen);  
            });

            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            $.ajax({
                type: 'POST',
                url: "{{ url('dago-trans/pembayaran-group-det2') }}",
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status == "SUCCESS"){
                        switch(jenis){
                            case 'TAMBAHAN':
                                var nm_colom = 'nilai_tambahan';
                                var col1 = 7;
                                var col2 = 10;
                                var nilaiUSD = toNilai(format_number(result.data.bayar_tambahan));
                            break;
                            case 'DOKUMEN':
                                var nm_colom = 'nilai_dok';
                                var col1 = 8;
                                var col2 = 11;
                                
                                var nilaiUSD = toNilai(format_number(result.data.bayar_dokumen));
                            break;
                            case '-' :
                                var nm_colom = 'nilai_paket';
                                var col1 = 6;
                                var col2 = 9;
                                
                                var nilaiUSD = toNilai(format_number3(result.data.bayar_paket));
                            break;
                        }

                        var jmlRow = $('#table-reg tbody tr').length;
                        if (nilaiUSD != "" && nilaiUSD != "0" && jmlRow != 0) {
                            var total = nilaiUSD / jmlRow;
                            var nilaiDis = Math.round(total*100)/100;
                            var nTemp = 0;
                            for (var i=0;i < jmlRow ;i++){
                                var saldo = $("#table-reg tbody tr:eq("+i+") td:eq("+col1+")");
                                var bayar = $("#table-reg tbody tr:eq("+i+") td:eq("+col2+")");
                                if (toNilai(saldo.text())  > 0) {
                                    if (toNilai(saldo.text()) > nilaiDis) {
                                        if(jenis == "-"){
                                            bayar.parents("tr").find('.td-'+nm_colom).text(format_number3(nilaiDis));
                                            bayar.parents("tr").find('.inp-'+nm_colom).val(format_number3(nilaiDis));

                                        }else{
                                            bayar.parents("tr").find('.td-'+nm_colom).text(format_number(nilaiDis));
                                            bayar.parents("tr").find('.inp-'+nm_colom).val(format_number(nilaiDis));
                                        }
                                        nTemp += nilaiDis;
                                    }
                                    else {
                                        bayar.parents("tr").find('.td-'+nm_colom).text(saldo.text());
                                        bayar.parents("tr").find('.inp-'+nm_colom).val(saldo.text());
                                        nTemp += toNilai(saldo.text());
                                    }
                                    var j=i;
                                }
                            }	

                            var selisih = (nilaiUSD * 100) - (nTemp * 100);
                            var recAkhir = Math.round(selisih + (toNilai($("#table-reg tbody tr:eq("+j+") td:eq("+col2+")").text()) * 100));
                            if(jenis == "-"){
                                $("#table-reg tbody tr:eq("+j+") td:eq("+col2+")").parents("tr").find('.td-'+nm_colom).text(format_number3(recAkhir/100));
                                $("#table-reg tbody tr:eq("+j+") td:eq("+col2+")").parents("tr").find('.inp-'+nm_colom).val(format_number3(recAkhir/100));			
                            }else{
                                $("#table-reg tbody tr:eq("+j+") td:eq("+col2+")").parents("tr").find('.td-'+nm_colom).text(format_number(recAkhir/100));
                                $("#table-reg tbody tr:eq("+j+") td:eq("+col2+")").parents("tr").find('.inp-'+nm_colom).val(format_number(recAkhir/100));	
                            }
                        }
                        hitungBayar();
                        $('a[href=\"#data-reg\"]').click();

                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                    // $iconLoad.hide();
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

		// } catch(e){
		// 	alert(e);
		// }
    }


    $('#form-bayar').on('click', '#konversi_btn', function(){
        konversiKurs("#input-biaya");
    });
    $('#form-tambah').on('click', '#konversi_btn', function(){
        konversiKurs("#input-biaya2");
    });

    $('#input-biaya2').on('click', '.btn-dist', function(){
        var jenis = $(this).parents("tr").find('.inp-jenis_biaya').val();
        distribusi($(this).parents("tr"),jenis);
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
                
                // hitungTotal();
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
                            // hitungTotal();
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

    $('#input-biaya2').on('click', 'td', function(){
        var idx = $(this).index();
        var bayar = $(this).parents("tr").find(".inp-nbiaya_bayar").val();
        var no = $(this).parents("tr").find(".no-biaya").text();
        $(this).parents("tr").find(".inp-nbiaya_bayar").val(bayar);
        $(this).parents("tr").find(".td-nbiaya_bayar").text(bayar);
        if(idx != 4){
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
                
                if(idx == 4){
                    $(this).parents("tr").find(".inp-nbiaya_bayar").show();
                    $(this).parents("tr").find(".td-nbiaya_bayar").hide();
                    $(this).parents("tr").find(".inp-nbiaya_bayar").focus();
                }else{
                    $(this).parents("tr").find(".inp-nbiaya_bayar").hide();
                    $(this).parents("tr").find(".td-nbiaya_bayar").show();
                }
                
                // hitungTotal();
            }
        }
    });

    $('#input-biaya2').on('keydown','.inp-nbiaya_bayar',function(e){
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
                    return false;
                break;
                case 3:
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
                            // hitungTotal();
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

    $('#modal-bayar').on('submit', '#form-bayar', function(e){
      e.preventDefault();
        
        var formData = new FormData(this);     
        var no_bukti = $('#no_bukti').val();   
        formData.append('no_bukti',no_bukti);
        // for(var pair of formData.entries()) {
        //     console.log(pair[0]+ ', '+ pair[1]); 
        // }
        // $iconLoad.show();
        
        $.ajax({
            type: 'POST',
            url: "{{ url('dago-trans/pembayaran-group-det') }}",
            dataType: 'json',
            data: formData,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status == "SUCCESS"){
                    $('#modal-bayar').modal('hide');
                    $('.selected-row').closest('tr').find('.inp-nilai_paket').val(format_number3(result.data.bayar_paket));
                    $('.selected-row').closest('tr').find('.td-nilai_paket').text(format_number3(result.data.bayar_paket));
                    $('.selected-row').closest('tr').find('.inp-nilai_tambahan').val(format_number(result.data.bayar_tambahan));
                    $('.selected-row').closest('tr').find('.td-nilai_tambahan').text(format_number(result.data.bayar_tambahan));
                    $('.selected-row').closest('tr').find('.inp-nilai_dok').val(format_number(result.data.bayar_dokumen));
                    $('.selected-row').closest('tr').find('.td-nilai_dok').text(format_number(result.data.bayar_dokumen));
                    $('a[href=\"#data-reg\"]').click();
                    hitungBayar();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
                // $iconLoad.hide();
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

    $('#saku-form').on('submit', '#form-tambah', function(e){
      e.preventDefault();
        var bayar_p = toNilai($('#bayar_paket').val());
        var bayar_t = toNilai($('#bayar_tambahan').val());
        var bayar_d = toNilai($('#bayar_dok').val());
        var total = toNilai($('#total_bayar').val());
        var kurs = toNilai($('#kurs').val());
        var kode_akun = $('#kode_akun').val();
        var deskripsi = $('#deskripsi').val();
		
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

        var totP=0;
        var totT=0;
        var totM=0;
        var i=0;
        $('.row-datareg').each(function(){
            var nilai_p = $(this).closest('tr').find('.inp-nilai_paket').val();
            var nilai_t = $(this).closest('tr').find('.inp-nilai_tambahan').val();
            var nilai_d = $(this).closest('tr').find('.inp-nilai_dok').val();
            var saldo_p = $(this).closest('tr').find('.inp-saldo_p').val();
            var saldo_t = $(this).closest('tr').find('.inp-saldo_t').val();
            var saldo_d = $(this).closest('tr').find('.inp-saldo_m').val();
            totT += +toNilai(nilai_t);
            totM += +toNilai(nilai_d);
            totP += +toNilai(nilai_p);
            if ((toNilai(saldo_p) < toNilai(nilai_p)) || (toNilai(saldo_t) < toNilai(nilai_t)) || (toNilai(saldo_d) < toNilai(nilai_d)) ) {
				var j = i+1;
				alert("Transaksi tidak valid. Nilai Pembayaran melebihi Saldo.[Baris : "+j+"]");
				return false;
			}
            i++;
        });

        totP = Math.round(totP * 100) / 100;
        if (bayar_p != totP) {
            alert(this,"Transaksi tidak valid.","Total Bayar Paket tidak sama dengan rincian");
            return false;						
        }
        if (bayar_t != totT) {
            alert(this,"Transaksi tidak valid.","Total Bayar Tambahan tidak sama dengan rincian");
            return false;						
        }
        if (bayar_d != totM) {
            alert(this,"Transaksi tidak valid.","Total Bayar Tambahan tidak sama dengan rincian");
            return false;						
        }		

        var formData = new FormData(this);        
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $iconLoad.show();
        
        $.ajax({
            type: 'POST',
            url: "{{ url('dago-trans/pembayaran-group') }}",
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
                    // printPbyr(result.data.no_kwitansi);
                    $('#saku-datatable').show();
                    $('#saku-form').hide();
                    
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

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var no_bukti = $(this).closest('tr').find('td:eq(0)').text();
        $('#form-tambah')[0].reset();
        $('#input-reg tbody').html('');
        $('#input-biaya tbody').html('');
        $('#input-biaya2 tbody').html('');
        $.ajax({
              type: 'GET',
              url: "{{ url('dago-trans/pembayaran-group-edit') }}",
              dataType: 'json',
              data: {'no_kwitansi':no_bukti},
              success:function(result){
                if(result.data.status){ 
                    if(result.data.data.length > 0){ 
                       var line =result.data.data[0];
                       $('#no_bukti').val(no_bukti);
                       $('#id_edit').val('edit');
                       $('#method').val('put');
                    //    $('#tanggal').val(line.tanggal);
                       $('#kode_akun').val(line.param1);
                       $('#kode_curr').val('USD');
                       $('#deskripsi').val(line.keterangan);
                       $('#status_bayar').val(line.sistem_bayar);
                       $('#agen').val(line.nik1);
                       $('#kurs').val(line.kurs);
                       
                       $('#bayar_paket').val(format_number3(line.nilai_p));
                       $('#bayar_tambahan').val(format_number3(line.nilai_t));
                       $('#bayar_dok').val(format_number3(line.nilai_m));
                       $('#total_bayar').val(format_number3(line.nilai1));
                    }
                    if(result.data.detail_reg.length > 0){ 
                        var html='';
                        var no=1;
                        for(var i=0;i<result.data.detail_reg.length;i++){
                            var line =result.data.detail_reg[i];
                            html+=`<tr class='row-datareg'>
                            <td class='no-datareg'>`+no+`</td>
                            <td ><span class='td-no_reg tdno_regke`+no+`'>`+line.no_reg+`</span><input type='text' name='no_reg[]' class='form-control inp-no_reg no_regke`+no+` hidden' value='`+line.no_reg+`' readonly>
                            <input type='text' name='no_closing[]' class='form-control inp-no_closing no_closingke`+no+` hidden' value='`+line.no_closing+`' readonly>
                            <input type='text' name='akun_titip[]' class='form-control inp-akun_titip akun_titipke`+no+` hidden' value='`+line.kode_akun+`' readonly>
                            <input type='text' name='kurs_closing[]' class='form-control inp-kurs_closing kurs_closingke`+no+` currency2 hidden'  value='`+format_number(line.kurs_closing)+`' readonly required>
                            </td>
                            <td ><span class='td-tgl_berangkat tdtgl_berangkatke`+no+`'>`+line.tgl_berangkat+`</span><input type='text' name='tgl_berangkat[]' class='form-control inp-tgl_berangkat tgl_berangkatke`+no+` hidden' value='`+line.tgl_berangkat+`' readonly></td>
                            <td ><span class='td-no_paket tdno_paketke`+no+`'>`+line.paket+`</span><input type='text' name='no_paket[]' class='form-control inp-no_paket no_paketke`+no+` hidden' value='`+line.no_paket+`' readonly></td>
                            <td ><span class='td-no_peserta2 tdno_peserta2ke`+no+`'>`+line.no_peserta+`</span><input type='text' name='no_peserta2[]' class='form-control inp-no_peserta2 no_peserta2ke`+no+` hidden' value='`+line.no_peserta+`' readonly></td>
                            <td ><span class='td-nama tdnamake`+no+`'>`+line.nama+`</span><input type='text' name='nama[]' class='form-control inp-nama namake`+no+` hidden' value='`+line.nama+`' readonly></td>
                            <td style='text-align:right'><span class='td-saldo_p tdsaldo_pke`+no+`'>`+format_number3(line.saldo_p)+`</span><input type='text' name='saldo_p[]' class='form-control inp-saldo_p saldo_pke`+no+` currency2 hidden'  value='`+format_number3(line.saldo_p)+`' readonly required></td>
                            <td style='text-align:right'><span class='td-saldo_t tdsaldo_tke`+no+`'>`+format_number(line.saldo_t)+`</span><input type='text' name='saldo_t[]' class='form-control inp-saldo_t saldo_tke`+no+` currency2 hidden'  value='`+format_number(line.saldo_t)+`' readonly required></td>
                            <td style='text-align:right'><span class='td-saldo_m tdsaldo_mke`+no+`'>`+format_number(line.saldo_m)+`</span><input type='text' name='saldo_m[]' class='form-control inp-saldo_m saldo_mke`+no+` currency2 hidden'  value='`+format_number(line.saldo_m)+`' readonly required></td>
                            <td width='10%' style='text-align:right'><span class='td-nilai_paket tdnilai_paketke`+no+`'>`+format_number3(line.nilai_p)+`</span><input type='text' name='nilai_paket[]' class='form-control inp-nilai_paket nilai_paketke`+no+` hidden currency2'  value='`+format_number3(line.nilai_p)+`' required></td>
                            <td width='10%' style='text-align:right'><span class='td-nilai_tambahan tdnilai_tambahanke`+no+`'>`+format_number(line.nilai_t)+`</span><input type='text' name='nilai_tambahan[]' class='form-control inp-nilai_tambahan nilai_tambahanke`+no+` hidden currency2'  value='`+format_number(line.nilai_t)+`' required></td>
                            <td width='10%' style='text-align:right'><span class='td-nilai_dok tdnilai_dokke`+no+`'>`+format_number(line.nilai_m)+`</span><input type='text' name='nilai_dok[]' class='form-control inp-nilai_dok nilai_dokke`+no+` hidden currency2'  value='`+format_number(line.nilai_m)+`' required></td>
                            </tr>`;
                            no++;
                        }
                        $('#table-reg tbody').html(html);
                        $('.currency2').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                    }

                    if (result.data.detail_biaya.length){
                        var html='';
                        var no=1;
                        for(var i=0;i< result.data.detail_biaya.length;i++){
                            var line3 = result.data.detail_biaya[i];	
                            // var trbyr = parseFloat(line3.nilai)-parseFloat(line3.saldo);	
                            var saldo = parseFloat(line3.saldo);	
                            var byr_e = parseFloat(line3.byr_e);					
                            html+=`<tr class='row-biaya'>
                            <td class='no-biaya'>`+no+`</td>
                            <td>`+line3.kode_biaya+`<input type='text' name='kode_biaya[]' class='form-control inp-kode_biaya biayakode_biayake`+no+` hidden' value='`+line3.kode_biaya+`'></td>
                            <td>`+line3.nama+`<input type='text' name='kode_akunbiaya[]' class='form-control inp-kode_akun biayakode_akunbiayake`+no+` hidden' value='`+line3.akun_pdpt+`'><input type='hidden' name='jenis_biaya[]' class='form-control inp-jenis_biaya' value='`+line3.jenis+`'></td>
                            <td class='text-right'>`+format_number3(saldo)+`<input type='hidden' name='saldo_det[]' class='form-control inp-saldo_det' value='`+format_number3(saldo)+`'></td>`;
                            html+=`
                            <td class='text-right'><span class='td-nbiaya_bayar tdnbiaya_bayarke`+no+`'>`+format_number3(byr_e)+`</span><input type='text' name='nbiaya_bayar[]' class='form-control inp-nbiaya_bayar nbiaya_bayarke`+no+` hidden' value='`+format_number3(byr_e)+`' ></td>`;
                            html+=`
                            <td><a href='#' class='btn-dist btn btn-primary btn-sm'>Distribusi</a></td>
                            </tr>`;
                            no++;
                        }
                        $('#input-biaya2 tbody').html(html);
                        
                        
                        $('.inp-nbiaya_bayar').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('#input-biaya2').on('change', '.inp-nbiaya_bayar', function(){
                            var bayar = $(this).val();
                            var saldo = $(this).closest('tr').find('.inp-saldo_det').val();
                            if(toNilai(bayar) > toNilai(saldo)){
                                $(this).val(0);
                                $(this).focus();
                                alert('nilai bayar tidak boleh melebihi saldo');
                            }else{
                                
                                // hitungTotal();
                            }
                        });
                        
                    }  

                    $('#saku-datatable').hide();
                    $('#saku-form').show(); 

                }
              },
              fail: function(xhr, textStatus, errorThrown){
                  alert('request failed:');
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
                var kode = $(this).closest('tr').find('td:eq(0)').html();     
                
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('dago-trans/pembayaran-group') }}",
                    dataType: 'json',
                    async:false,
                    data: {'no_bukti':kode},
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                            })
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
                
            }else{
                return false;
            }
        })
    });
    </script>
    
