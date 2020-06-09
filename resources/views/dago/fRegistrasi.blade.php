<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-data-reg">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size:16px">Data Registrasi 
                        <button type="button" id="btn-reg-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
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

                            </style>
                            <table id="table-reg" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No Registrasi</th>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Paket</th>
                                        <th>Jadwal</th>
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
        <div class="row" id="form-tambah-reg" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" id="form-tambah">
                            <h4 class="card-title" style="font-size:16px">Form Registrasi
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-reg-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr style="margin-bottom:0px;margin-top:25px">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <label for="tgl_input" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" id="tgl_input" name="tgl_input" required value="{{ date('Y-m-d')}}">
                                </div>
                                <label for="periode" class="col-3 col-form-label">Periode</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="periode" name="periode2"  readonly value="{{ date('Ym') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_input" class="col-3 col-form-label">No Registrasi</label>
                                <div class="col-3">
                                    <input class="form-control" readonly type="text" placeholder="No Register" id="no_reg" name="no_reg" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_peserta" class="col-3 col-form-label">No Jamaah</label>
                                <div class="col-3">
                                    <select class='form-control' id="no_peserta" name="no_peserta" required>
                                    <option value=''>--- Pilih No Jamaah ---</option>
                                    </select>
                                </div>
                                <label for="flag_group" class="col-3 col-form-label">Status Group</label>
                                <div class="col-3">
                                    <select class='form-control' id="flag_group" name="flag_group" >
                                    <option value='0'>Tidak</option>
                                    <option value='1'>Ya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="paket" class="col-3 col-form-label">Paket</label>
                                <div class="col-3">
                                    <select class='form-control' id="paket" name="paket" required>
                                    <option value=''>--- Pilih Paket ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="jadwal" class="col-3 col-form-label">Jadwal</label>
                                <div class="col-3">
                                    <select class='form-control' id="jadwal" name="jadwal" required>
                                    <option value=''>--- Pilih Jadwal ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pp" class="col-3 col-form-label">PP/Cabang</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_pp" name="kode_pp2" required>
                                    <option value=''>--- Pilih Kode PP ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis_paket" class="col-3 col-form-label">Jenis Paket</label>
                                <div class="col-3">
                                    <select class='form-control' id="jenis_paket" name="jenis_paket" required>
                                    <option value=''>--- Pilih Jenis paket ---</option>
                                    <option value='STANDAR'>STANDAR</option>
                                    <option value='SEMI'>SEMI</option>
                                    <option value='EKSEKUTIF'>EKSEKUTIF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="jenis_promo" class="col-3 col-form-label">Jenis Promo</label>
                                <div class="col-3">
                                    <select class='form-control' id="jenis_promo" name="jenis_promo" required>
                                    <option value=''>--- Pilih Jenis Promo ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quota" class="col-3 col-form-label">Sisa Quota</label>
                                <div class="col-3">
                                    <input class="form-control currency" readonly type="text" id="quota" name="quota" >
                                </div>
                                <label for="tgl_berangkat" class="col-3 col-form-label">Tgl Berangkat</label>
                                <div class="col-3">
                                    <input class="form-control" readonly type="date" id="tgl_berangkat" name="tgl_berangkat" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lama_hari" class="col-3 col-form-label">Lama Hari</label>
                                <div class="col-3">
                                    <input class="form-control currency" readonly type="text" id="lama_hari" name="lama_hari" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_curr" class="col-3 col-form-label">Currency</label>
                                <div class="col-3">
                                    <input class="form-control" readonly type="text" id="kode_curr" name="kode_curr" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga_paket" class="col-3 col-form-label">Harga Paket</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text" id="harga_paket" name="harga_paket" >
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="type_room" class="col-3 col-form-label">Type Room</label>
                                <div class="col-3">
                                    <select class='form-control' id="type_room" name="type_room" required>
                                    <option value=''>--- Pilih Type Room ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga_room" class="col-3 col-form-label">Harga Room</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text" id="harga_room" name="harga_room" >
                                </div>
                                <label for="referal" class="col-3 col-form-label">Referal</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="referal" name="referal" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="brkt_dgn" class="col-3 col-form-label">Berangkat dengan</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="brkt_dgn" name="brkt_dgn" >
                                </div>
                                <label for="hubungan" class="col-3 col-form-label">Hubungan</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="hubungan" name="hubungan" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ukuran_pakaian" class="col-3 col-form-label">Ukuran Pakaian</label>
                                <div class="col-3">
                                    <select class='form-control' id="ukuran_pakaian" name="ukuran_pakaian" required>
                                    <option value=''>--- Pilih Ukuran ---</option>
                                    <option value='S'>S</option>
                                    <option value='XS'>XS</option>
                                    <option value='L'>L</option>
                                    <option value='2L'>2L</option>
                                    <option value='3L'>3L</option>
                                    <option value='4L'>4L</option>
                                    <option value='5L'>5L</option>
                                    <option value='6L'>6L</option>
                                    <option value='7L'>7L</option>
                                    <option value='8L'>8L</option>
                                    <option value='9L'>9L</option>
                                    <option value='10'>10</option>
                                    </select>
                                </div>
                                <label for="ket_diskon" class="col-3 col-form-label">Keterangan Diskon</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" max-length="100" id="ket_diskon" name="ket_diskon" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agen" class="col-3 col-form-label">Agen</label>
                                <div class="col-3">
                                    <select class='form-control' id="agen" name="agen" required>
                                    <option value=''>--- Pilih Agen ---</option>
                                    </select>
                                </div>
                                <label for="diskon" class="col-3 col-form-label">Diskon Biaya</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text"  id="diskon" name="diskon" required value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="marketing" class="col-3 col-form-label">Marketing</label>
                                <div class="col-3">
                                    <select class='form-control' id="marketing" name="marketing" required>
                                    <option value=''>--- Pilih Marketing ---</option>
                                    </select>
                                </div>
                                
                                <label for="tot_tambah" class="col-3 col-form-label">Total Tambahan</label>
                                <div class="col-3">
                                    <input class="form-control text-right" type="text"  id="tot_tambah" name="tot_tambah" required readonly value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sumber" class="col-3 col-form-label">Sumber Informasi</label>
                                <div class="col-3">
                                    <select class='form-control' id="sumber" name="sumber" required>
                                    <option value=''>--- Pilih Sumber Informasi ---</option>
                                    <option value='Brosur'>Brosur</option>
                                    <option value='Internet (Web)'>Internet (Web)</option>
                                    <option value='Baligho'>Baligho</option>
                                    <option value='Surat Kabar'>Surat Kabar</option>
                                    <option value='Marketing'>Marketing</option>
                                    <option value='Agen Umroh'>Agen Umroh</option>
                                    </select>
                                </div>
                                <label for="tot_dokumen" class="col-3 col-form-label">Total Dokumen</label>
                                <div class="col-3">
                                    <input class="form-control text-right" type="text"  id="tot_dokumen" name="tot_dokumen" required readonly value="0">
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#btambah" role="tab" aria-selected="true"><span class="hidden-xs-down">Biaya Tambahan</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bdok" role="tab" aria-selected="true"><span class="hidden-xs-down">Biaya Dokumen</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="btambah" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                        th,td{
                                            padding:8px !important;
                                            vertical-align:middle !important;
                                        }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="table-btambah">
                                            <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Kode</th>
                                            <th width="35%">Nama Biaya</th>
                                            <th width="20%">Tarif</th>
                                            <th width="10%">Jumlah</th>
                                            <th width="20%">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bdok" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                        th,td{
                                            padding:8px !important;
                                            vertical-align:middle !important;
                                        }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="table-bdok">
                                            <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Kode</th>
                                            <th width="35%">Nama Biaya</th>
                                            <th width="20%">Tarif</th>
                                            <th width="10%">Jumlah</th>
                                            <th width="20%">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dok" role="tabpanel" hidden>
                                    <table class="table table-striped table-bordered table-condensed mt-3" id="table-dok">
                                        <thead>
                                        <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Kode Dokumen</th>
                                        <th width="45%">Nama Dokumen</th>
                                        <th width="30%">Jenis</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- UPLOAD DOK -->
        <div class="row" id="form-upload-reg" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" id="form-tambah">
                            <h4 class="card-title">Form Upload Dokumen
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-upload-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <div class="form-group row" id="row-id_upload">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <input class="form-control" type="hidden" placeholder="No Bukti" id="upload_no_bukti" name="upload_no_bukti" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_no_reg" class="col-3 col-form-label">No Registrasi</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" readonly id="upload_no_reg" name="upload_no_reg">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_jamaah" class="col-3 col-form-label">Jamaah</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" readonly id="upload_jamaah" name="upload_jamaah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_paket" class="col-3 col-form-label">Paket</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" readonly  id="upload_paket" name="upload_paket"  required>
                                </div>
                                <label for="upload_jadwal" class="col-3 col-form-label">Jadwal</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" readonly id="upload_jadwal" name="upload_jadwal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_alamat" class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" readonly id="upload_alamat" name="upload_alamat"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_tgl_terima" class="col-3 col-form-label">Tgl Terima</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" id="upload_tgl_terima" name="upload_tgl_terima" required value='<?=date('Y-m-d')?>'>
                                </div>
                            </div>
                            
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detDok" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Dokumen</span></a> </li>
                                
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="detDok" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-dok">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Kode Jenis</th>
                                                <th width="20%">Jenis Dokumen</th>
                                                <th width="20%">Path File</th>
                                                <th width="20%">User</th>
                                                <th width="20%">Upload File</th>
                                                <th width="5%">Download</th>
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
        <!-- FORM GROUPING -->
         <div class="row" id="form-group-reg" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" id="form-tambah">
                            <h4 class="card-title">Form Grouping Registrasi
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-group-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <div class="form-group row" id="row-id_group">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <input class="form-control" type="hidden" placeholder="No Bukti" id="group_no_bukti" name="group_no_bukti" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_no_reg" class="col-3 col-form-label">No Registrasi</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" readonly id="group_no_reg" name="group_no_reg">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_jamaah" class="col-3 col-form-label">Jamaah</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" readonly id="group_jamaah" name="group_jamaah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_paket" class="col-3 col-form-label">Paket</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" readonly  id="group_paket" name="group_paket"  required>
                                </div>
                                <label for="group_jadwal" class="col-3 col-form-label">Jadwal</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" readonly id="group_jadwal" name="group_jadwal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_alamat" class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" readonly id="group_alamat" name="group_alamat"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="group_tgl_terima" class="col-3 col-form-label">Tgl Terima</label>
                                <div class="col-3">
                                    <input class="form-control" type="date" id="group_tgl_terima" name="group_tgl_terima" required value='<?=date('Y-m-d')?>'>
                                </div>
                            </div>
                            
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detAnggota" role="tab" aria-selected="true"><span class="hidden-xs-down">Daftar Anggota</span></a> </li>
                                
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="detAnggota" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-anggota">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="90%">Peserta</th>
                                                <th width="5%"><button type="button" href="#" id="add-row-anggota" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
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
                        <button type="button" class="btn btn-secondary ml-2" id="btn-reg-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-reg-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px;padding:10px;font-size:12pt !important'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <script>
    var $iconLoad = $('.preloader');
    var dataTable = $('#table-reg').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        "ordering": true,
        "order": [[0, "desc"]],
        'ajax': {
            'url': "{{ url('dago-trans/registrasi') }}",
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
            { data: 'action'}
        ]
    });
    </script>
    
