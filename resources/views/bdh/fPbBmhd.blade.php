<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
    .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;
    }
</style>

<!-- LIST DATA -->
<x-list-data judul="Data BY BMHD" tambah="true" :thead="array('No Bukti','Tanggal','No Dokumen','Deskripsi','Nilai','Progress','Aksi')" :thwidth="array(15,15,20,25,10,35,10)" :thclass="array('','','','','','','text-center')" />
<!-- END LIST DATA -->

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="tanggal" name="tanggal">
    <div class="row" id="saku-form" style="display: none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_dokumen">Nomor Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <input class="form-control" type="hidden" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                                    <input class="form-control" type="hidden" placeholder="No Bukti" id="kode_form" name="kode_form" readonly>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nik_periksa" >Due Date</label>
                                    <input class='form-control datepicker' type="text" id="duedate" name="duedate" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-6 col-sm-12">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_debet" >Total Jurnal</label>
                                    <input class="form-control currency" type="text" placeholder="Total Debet" readonly id="total_debet" name="total_debet" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_kredit" >Total Net Rekening</label>
                                    <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total_kredit" name="total_kredit" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-bmhd" role="tab" aria-selected="true"><span class="hidden-xs-down">Data BMHD</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-atensi" role="tab" aria-selected="true"><span class="hidden-xs-down">Atensi Pembayaran</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-jurnal" role="tab" aria-selected="true"><span class="hidden-xs-down">Jurnal ++</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-otorisasi" role="tab" aria-selected="true"><span class="hidden-xs-down">Otorisasi</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-catatan" role="tab" aria-selected="true"><span class="hidden-xs-down">Catatan Verifikator</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">File Dok</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-budget" role="tab" aria-selected="true"><span class="hidden-xs-down">Budget</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-bmhd" role="tabpanel">
                            <div class="form-row mt-2">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="pp_penerima">Data BMHD</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_pp_penerima" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-pp_penerima" id="pp_penerima" name="pp_penerima" value="" title="" readonly>
                                        <span class="info-name_pp_penerima hidden">
                                            <span id="label_pp_penerima"></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_pp_penerima"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="mitra">Data Mitra</label>
                                    <input class="form-control" name="mitra" id="mitra" value="" readonly required>
                                </div>

                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="saldo">Saldo BMHD</label>
                                    <input class="form-control currency" name="saldo" id="saldo" value="0" readonly required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="nilai_penyelesaian">Nilai Penyelesaian</label>
                                    <input class="form-control currency" name="nilai_penyelesaian" id="nilai_penyelesaian" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-atensi" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed gridexample" id="atensi-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:15%">Atensi</th>
                                            <th style="width:15%">Bank Cabang</th>
                                            <th style="width:15%">Nama Rekening</th>
                                            <th style="width:15%">No Rekening</th>
                                            <th style="width:15%">Bruto</th>
                                            <th style="width:15">Potongan</th>
                                            <th style="width:15">Netto</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <a type="button" href="#" data-id="0" title="add-row-atensi" id="add-row-atensi" class="add-row-atensi btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                        </div>
                        {{-- begin data jurnal tab --}}
                        <div class="tab-pane" id="data-jurnal" role="tabpanel">

                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>

                            <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>

                                <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:13%">Kode Akun</th>
                                        <th style="width:15%">Nama Akun</th>
                                        <th style="width:5%">DC</th>
                                        <th style="width:20%">Keterangan</th>
                                        <th style="width:15%">Nilai</th>
                                        <th style="width:7">Kode PP</th>
                                        <th style="width:17">Nama PP</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                            </div>
                        </div>
                        {{-- end data jurnal tab --}}
                                                {{-- begin otorisasi tab --}}
                                                <div class="tab-pane" id="data-otorisasi" role="tabpanel">
                                                    <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                                        <div class="col-md-6 col-sm-12 mt-2">
                                                            <label for="nik_buat" >Dibuat Oleh</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                    <span class="input-group-text info-code_nik_buat" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                                </div>
                                                                <input type="text" class="form-control inp-label-nik_buat" id="nik_buat" name="nik_buat" value="" title="">
                                                                <span class="info-name_nik_buat hidden">
                                                                    <span></span>
                                                                </span>
                                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                                <i class="simple-icon-magnifier search-item2" id="search_nik_buat"></i>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-12 mt-2">
                                                            <label for="nik_tahu" >Nik Mengetahui</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                    <span class="input-group-text info-code_nik_tahu" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                                </div>
                                                                <input type="text" class="form-control inp-label-nik_tahu" id="nik_tahu" name="nik_tahu" value="" title="">
                                                                <span class="info-name_nik_tahu hidden">
                                                                    <span></span>
                                                                </span>
                                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                                <i class="simple-icon-magnifier search-item2" id="search_nik_tahu"></i>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-sm-12 mt-2">
                                                            <label for="nik_ver" >Nik Verifikator</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                                    <span class="input-group-text info-code_nik_ver" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                                </div>
                                                                <input type="text" class="form-control inp-label-nik_ver" id="nik_ver" name="nik_ver" value="" title="">
                                                                <span class="info-name_nik_ver hidden">
                                                                    <span></span>
                                                                </span>
                                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                                <i class="simple-icon-magnifier search-item2" id="search_nik_ver"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- end otorisasi tab --}}

                                                 {{-- begin catatan verifikator tab --}}
                                                 <div class="tab-pane" id="data-catatan" role="tabpanel">
                                                    <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                                        <div class="col-md-10 mt-3">
                                                            {{-- <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" readonly>
                                                                Catatan tidak ditemukan
                                                            </textarea> --}}
                                                            <p>Catatan tidak ditemukan</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                 {{-- end catatan verifikator tab --}}

                                                {{-- begin data dok tab  --}}
                                                <div class="tab-pane" id="data-dok" role="tabpanel">
                                                    <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                                        <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                                                    </div>
                                                    <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                                        <table class="table table-bordered table-condensed gridexample" id="input-dok" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                                            <thead style="background:#F8F8F8">
                                                                <tr>
                                                                    <th style="width:3%">No</th>
                                                                    <th style="width:10%">Jenis</th>
                                                                    <th style="width:27%">Nama</th>
                                                                    <th style="width:20%">Path File</th>
                                                                    <th width="20%">Upload File</th>
                                                                    <th width="10%">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        <a type="button" href="#" data-id="0" title="add-row-dok" class="add-row-dok btn btn-light2 btn-block btn-sm">
                                                        <i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                                    </div>
                                                </div>
                                                {{-- end data dok tab --}}
                        {{-- begin budget tab --}}
                                                <div class="tab-pane" id="data-budget" role="tabpanel">
                                                    <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-2">Cek Budget</button>
                                                        <table class="table table-bordered table-condensed gridexample"  style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                                            <thead style="background:#F8F8F8">
                                                                <th style="width: 3%">No</th>
                                                                <th>Kode Akun</th>
                                                                <th>Kode PP</th>
                                                                <th>Kode DRK</th>
                                                                <th>Saldo Awal</th>
                                                                <th>Nilai</th>
                                                                <th>Saldo Akhir</th>
                                                            </thead>

                                                            <tbody>

                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                                {{-- end budget tab --}}

                        <div class="tab-pane" id="data-controlling" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-controlling" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="controlling-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:30%">Akun</th>
                                        <th style="width:30%">PP</th>
                                        <th style="width:30%">DRK</th>
                                        <th style="width:10%">Bulan</th>
                                        <th style="width:15%">Saldo Awal</th>
                                        <th style="width:15%">Nilai</th>
                                        <th style="width:15%">Saldo Akhir</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a type="button" href="#" data-id="0" title="add-row" id="add-row-controlling" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action">
                            {{-- <button type="button" id="btn-sheet" class="btn btn-sheet">Catatan Approval</button> --}}
                        </div>
                        {{-- <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div> --}}
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_search')

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">

    var $tahun = "{{ date('Y') }}"
    var valid = true
    var $mataAnggaran = []
    var $ppAnggaran = []
    var $drkAnggaran = []
    var $totalPemberi = 0;
    var $akunPenerima = []
    var $ppPenerima = []
    var $nikApprove = []

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/nik-approve') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            var data = result.daftar
            if(data.length > 0) {
                for(var i=0;i<data.length;i++) {
                    var dt = data[i]
                    $nikApprove.push({ id: dt.nik, name: dt.nama })
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/esaku-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/akun-terima') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            var data = result.daftar
            if(data.length > 0) {
                for(var i=0;i<data.length;i++) {
                    var dt = data[i]
                    $akunPenerima.push({ id: dt.kode_akun, name: dt.nama })
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/esaku-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/pp-terima') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            var data = result.daftar
            if(data.length > 0) {
                for(var i=0;i<data.length;i++) {
                    var dt = data[i]
                    $ppPenerima.push({ id: dt.kode_pp, name: dt.nama })
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/esaku-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/mata-anggaran') }}",
        dataType: 'json',
        data: { tahun: $tahun },
        async:false,
        success:function(result){
            var data = result.daftar
            if(data.length > 0) {
                for(var i=0;i<data.length;i++) {
                    var dt = data[i]
                    $mataAnggaran.push({ id: dt.kode_akun, name: dt.nama })
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/esaku-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/pp-anggaran') }}",
        dataType: 'json',
        data: { tahun: $tahun },
        async:false,
        success:function(result){
            var data = result.daftar
            if(data.length > 0) {
                for(var i=0;i<data.length;i++) {
                    var dt = data[i]
                    $ppAnggaran.push({ id: dt.kode_pp, name: dt.nama })
                    $drkAnggaran.push({ id: dt.kode_pp, name: dt.nama })
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/esaku-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
        }
    });

    function filterNikApprove(value) {
        for(var i=0;i<$nikApprove.length;i++) {
            var data = $nikApprove[i]
            if(data.id == value) {
                console.log(data)
                showInfoField('nik_approve', data.id, data.name)
                break;
            }
        }
    }

    function filterPPPenerima(value) {
        for(var i=0;i<$ppPenerima.length;i++) {
            var data = $ppPenerima[i]
            if(data.id == value) {
                showInfoField('pp_penerima', data.id, data.name)
                break;
            }
        }
    }

    function filterDrkPenerima(value) {
        for(var i=0;i<$ppPenerima.length;i++) {
            var data = $ppPenerima[i]
            if(data.id == value) {
                showInfoField('drk_penerima', data.id, data.name)
                break;
            }
        }
    }

    function filterAkunPenerima(value) {
        for(var i=0;i<$akunPenerima.length;i++) {
            var data = $akunPenerima[i]
            if(data.id == value) {
                showInfoField('akun_penerima', data.id, data.name)
                break;
            }
        }
    }

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function hitungTotalPemberi() {
        $totalPemberi = 0;
        $('#pemberi-grid tbody tr').each(function(index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            $totalPemberi += nilai
        })
    }

    function resetForm() {
        $('#pemberi-grid tbody').empty()
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=info-name]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function(e){
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function(e){
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function(e){
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function(e){
            $(this).addClass('hidden');
        });
    }
    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

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
        console.log('last-add');
        setTimeout(function() {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('bdh-trans/ptg-beban') }}",
        [
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            }
        ],
        [
            { data: 'no_pb' },
            { data: 'tgl' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            {data: 'nilai'},
            {data: 'status'}
        ],
        "{{ url('bdh-auth/sesi-habis') }}",
        [[4 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA

    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data PB BYMHD');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#id_edit').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').val('')
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

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

    $('#bulan_penerima').on('change', function(){
        var bulan = $(this).val()
        var pp = $('#pp_penerima').val()
        var anggaran = $('#akun_penerima').val()
        var periode = $tahun.concat(bulan)

        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/cek-saldo') }}",
            dataType: 'json',
            data: { bulan: bulan, kode_pp: pp, kode_akun: anggaran, periode: periode },
            async:false,
            success:function(result){
                var saldo = result.daftar
                $('#saldo').val(parseInt(saldo))
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
            }
        });
    })

    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'nik_approve':
                var settings = {
                    id : id,
                    header : ['NIK', 'Nama'],
                    url : "{{ url('esaku-trans/nik-approve') }}",
                    columns : [
                        { data: 'nik' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar NIK Approve",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'pp_penerima':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-terima') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP Penerima",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'drk_penerima':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-terima') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar DRK Penerima",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'akun_penerima':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/akun-terima') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun Penerima",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            default:
            break;
        }
        showInpFilter(settings);
    })

    function hideAllRowAtensi() {
        $('#atensi-grid tbody tr').removeClass('selected-row');
        $('#atensi-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#atensi-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var anggaran = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val();
                var pp = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var drk = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val();
                var bulan = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val();
                var saldo = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val();
                var nilai = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val(anggaran);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").text(anggaran);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(pp);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(pp);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val(drk);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(drk);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val(bulan);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text(bulan);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val(saldo);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").text(saldo);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".search-anggaran").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".search-drk").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }


    function hitungTotalRowAtensi(){
        var total_row = $('#atensi-grid tbody tr').length;
        $('#atensi-row-pemberi').html(total_row+' Baris');
    }

    function hideUnselectedRowAtensi() {
        $('#atensi-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var atensi = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-atensi").val();
                var cabang_bank = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-cabang_bank").val();
                var nama_rek = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_rek").val();
                var no_rek = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-no_rek").val();
                var bruto = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-bruto").val();
                var potongan = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-potongan").val();
                var netto = $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-netto").val();

                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-atensi").val(atensi);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-atensi").text(atensi);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-cabang_bank").val(cabang_bank)
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-cabang_bank").text(cabang_bank);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_rek").val(nama_rek)
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-nama_rek").text(nama_rek);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-no_rek").val(no_rek)
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-no_rek").text(no_rek);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-bruto").val(bruto)
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-bruto").text(bruto);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-potongan").val(potongan)
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-potongan").text(potongan);
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-netto").val(netto)
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-netto").text(netto);

                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-atensi").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-atensi").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-cabang_bank").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-cabang_bank").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_rek").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-nama_rek").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-no_rek").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-no_rek").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-bruto").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-bruto").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-potongan").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-potongan").show();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".inp-netto").hide();
                $('#atensi-grid > tbody > tr:eq('+index+') > td').find(".td-netto").show();
            }
        })
    }

    function addRowAtensi() {
        var no=$('#atensi-grid .row-atensi:last').index();
        var no = no + 2
        var html = "";

        html += "<tr class='row-atensi row-atensi-"+no+"'>"

        html += "<td><span class='td-atensi tdatensike"+no+"'>0</span>"
        html += "<input type='text' name='atensi[]' class='inp-atensi form-control atensike"+no+" hidden'  value='' required>"
        html += "</td>"

        html += "<td><span class='td-cabang_bank tdcabang_bankke"+no+"'>0</span>"
        html += "<input type='text' name='cabang_bank[]' class='inp-cabang_bank form-control cabang_bankke"+no+" hidden'  value='' required>"
        html += "</td>"

        html += "<td><span class='td-nama_rek tdnama_rekke"+no+"'>0</span>"
        html += "<input type='text' name='nama_rek[]' class='inp-nama_rek form-control nama_rekke"+no+" hidden'  value='' required>"
        html += "</td>"

        html += "<td><span class='td-no_rek tdno_rekke"+no+"'>0</span>"
        html += "<input type='text' name='no_rek[]' class='inp-no_rek form-control no_rekke"+no+" hidden'  value='' required>"
        html += "</td>"

        html += "<td><span class='td-bruto tdbrutoke"+no+"'>0</span>"
        html += "<input type='text' name='bruto[]' class='inp-bruto form-control brutoke"+no+" currency hidden'  value='0' required>"
        html += "</td>"

        html += "<td><span class='td-potongan tdpotonganke"+no+"'>0</span>"
        html += "<input type='text' name='potongan[]' class='inp-potongan form-control potonganke"+no+" currency hidden'  value='0' required>"
        html += "</td>"

        html += "<td><span class='td-netto tdnettoke"+no+"'>0</span>"
        html += "<input type='text' name='netto[]' class='inp-netto form-control nettoke"+no+" currency hidden'  value='0' readonly required>"
        html += "</td>"

        html += "<td class='text-center'><a class='hapus-atensi' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";

        html += "</tr>"

        $('#atensi-grid tbody').append(html);

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {  }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        $('.inp-anggaran').typeahead({
            source:$mataAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-pp').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-drk').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        hideUnselectedRowAtensi()

        $('#atensi-grid td').removeClass('px-0 py-0 aktif');
        $('#atensi-grid tbody tr:last').find("td:eq(0)").addClass('px-0 py-0 aktif');
        $('#atensi-grid tbody tr:last').find(".inp-atensi").show();
        $('#atensi-grid tbody tr:last').find(".td-atensi").hide();
        $('#atensi-grid tbody tr:last').find(".inp-atensi").focus();

        $('.inp-nilai').on('change', function(){
            hitungTotalAtensi()
        })

        hitungTotalRowAtensi()
    }

    $('#atensi-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#atensi-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowAtensi();
    });

    $('#atensi-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 7){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#atensi-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var atensi = $(this).parents("tr").find(".inp-atensi").val();
                var cabang_bank = $(this).parents("tr").find(".inp-cabang_bank").val();
                var nama_rek = $(this).parents("tr").find(".inp-nama_rek").val();
                var no_rek = $(this).parents("tr").find(".inp-no_rek").val();
                var bruto = $(this).parents("tr").find(".inp-bruto").val();
                var potongan = $(this).parents("tr").find(".inp-potongan").val();
                var netto = $(this).parents("tr").find(".inp-netto").val();


                $(this).parents("tr").find(".inp-atensi").val(atensi);
                $(this).parents("tr").find(".td-atensi").text(atensi);
                if(idx == 0){
                    $(this).parents("tr").find(".inp-atensi").show();
                    $(this).parents("tr").find(".search-atensi").show();
                    $(this).parents("tr").find(".td-atensi").hide();
                    $(this).parents("tr").find(".inp-atensi").focus();
                }else{
                    $(this).parents("tr").find(".inp-atensi").hide();
                    $(this).parents("tr").find(".search-atensi").hide();
                    $(this).parents("tr").find(".td-atensi").show();
                }

                $(this).parents("tr").find(".inp-cabang_bank").val(cabang_bank);
                $(this).parents("tr").find(".td-cabang_bank").text(cabang_bank);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-cabang_bank").show();
                    $(this).parents("tr").find(".td-cabang_bank").hide();
                    $(this).parents("tr").find(".inp-cabang_bank").focus();
                }else{
                    $(this).parents("tr").find(".inp-cabang_bank").hide();
                    $(this).parents("tr").find(".td-cabang_bank").show();
                }

                $(this).parents("tr").find(".inp-nama_rek").val(nama_rek);
                $(this).parents("tr").find(".td-nama_rek").text(nama_rek);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama_rek").show();
                    $(this).parents("tr").find(".td-nama_rek").hide();
                    $(this).parents("tr").find(".inp-nama_rek").focus();
                }else{
                    $(this).parents("tr").find(".inp-nama_rek").hide();
                    $(this).parents("tr").find(".td-nama_rek").show();
                }

                $(this).parents("tr").find(".inp-no_rek").val(no_rek);
                $(this).parents("tr").find(".td-no_rek").text(no_rek);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-no_rek").show();
                    $(this).parents("tr").find(".td-no_rek").hide();
                    $(this).parents("tr").find(".inp-no_rek").focus();
                }else{
                    $(this).parents("tr").find(".inp-no_rek").hide();
                    $(this).parents("tr").find(".td-no_rek").show();
                }

                $(this).parents("tr").find(".inp-bruto").val(bruto);
                $(this).parents("tr").find(".td-bruto").text(bruto);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-bruto").show();
                    $(this).parents("tr").find(".td-bruto").hide();
                    $(this).parents("tr").find(".inp-bruto").focus();
                }else{
                    $(this).parents("tr").find(".inp-bruto").hide();
                    $(this).parents("tr").find(".td-bruto").show();
                }

                $(this).parents("tr").find(".inp-potongan").val(potongan);
                $(this).parents("tr").find(".td-potongan").text(potongan);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-potongan").show();
                    $(this).parents("tr").find(".td-potongan").hide();
                    $(this).parents("tr").find(".inp-potongan").focus();
                }else{
                    $(this).parents("tr").find(".inp-potongan").hide();
                    $(this).parents("tr").find(".td-potongan").show();
                }

                $(this).parents("tr").find(".inp-netto").val(netto);
                $(this).parents("tr").find(".td-netto").text(netto);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-netto").show();
                    $(this).parents("tr").find(".td-netto").hide();
                    $(this).parents("tr").find(".inp-netto").focus();
                }else{
                    $(this).parents("tr").find(".inp-netto").hide();
                    $(this).parents("tr").find(".td-netto").show();
                }
            }
        }
    });

    var $twicePressAtensi = 0;
    $('#atensi-grid').on('keydown','.inp-atensi',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-atensi'];
        var nxt2 = ['.td-atensi'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    if(isi.length > 30) {
                        isi = isi.substr(0, 30) + '...'
                    }
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-anggaran').hide();
                    $(this).closest('tr').find('.search-pp').show();
                break;
                case 1:
                    $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-pp').hide();
                    $(this).closest('tr').find('.search-drk').show();
                break;
                case 2:
                    $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-drk').hide();
                break;
                case 3:
                    $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");

                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Saldo yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 5:
                    if(isi != "" && isi != 0){
                        $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        if(code == 13 || code == 9) {
                            if($twicePressPemberi == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-atensi');
                                if(cek.length > 0){
                                    cek.click();
                                }else{
                                    $('#add-row-atensi').click();
                                }
                            }
                            $twicePressPemberi = 1
                            setTimeout(() => $twicePressPemberi = 0, 1000)
                        }
                    }else{
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

    $('#form-tambah').on('click','#add-row-atensi', function(){
        addRowAtensi()
    });

    $('#atensi-grid').on('click', '.hapus-atensi', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-atensi').each(function(){
            var nom = $(this).closest('tr').find('.no-atensi');
            nom.html(no);
            no++;
        });
        hitungTotalRowPemberi();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });



    function hideAllRowJurnal() {
        $('#pemberi-grid tbody tr').removeClass('selected-row');
        $('#pemberi-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#pemberi-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var anggaran = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val();
                var pp = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var drk = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val();
                var bulan = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val();
                var saldo = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val();
                var nilai = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").text(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").text(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function hideUnselectedRowJurnal() {
        $('#pemberi-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var anggaran = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val();
                var pp = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var drk = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val();
                var bulan = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val();
                var saldo = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val();
                var nilai = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").text(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").text(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function hitungTotalRowJurnal(){
        var total_row = $('#pemberi-grid tbody tr').length;
        $('#total-row-pemberi').html(total_row+' Baris');
    }

    function addRowJurnal() {
        var no=$('#pemberi-grid .row-pemberi:last').index();
        var no = no + 2
        var html = "";
        html += "<tr class='row-pemberi row-pemberi-"+no+"'>"
        html += "<td class='no-pemberi text-center hidden'>"+no+"</td>"
        html += "<td><div>"
        html += "<span class='td-anggaran tdanggaranke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='anggaran[]' class='inp-anggaran anggaranke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='anggarankode"+no+"'><a href='#' class='search-item search-anggaran hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-pp tdppke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='pp[]' class='inp-pp ppke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='ppkode"+no+"'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-drk tddrkke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='drk[]' class='inp-drk drkke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='drkkode"+no+"'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td class='text-center'><div>"
        html += "<span class='td-bulan tdbulanke"+no+" tooltip-span'></span>"
        html += "<select class='hidden form-control inp-bulan bulanke"+no+"' name='bulan[]'>"
        html += "<option value='01' selected>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>"
        html += "</select>"
        html += "</div></td>"
        html += "<td class='text-right'><div>"
        html += "<span class='td-saldo tdsaldoke"+no+"'>0</span>"
        html += "<input type='text' name='saldo[]' class='inp-saldo form-control saldoke"+no+" hidden currency'  value='0' required>"
        html += "</div></td>"
        html += "<td class='text-right'>"
        html += "<span class='td-nilai tdnilaike"+no+"'>0</span>"
        html += "<input type='text' name='nilai[]' class='inp-nilai form-control nilaike"+no+" hidden currency'  value='0' required>"
        html += "</td>"
        html += "<td class='text-center'><a class='hapus-pemberi' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        html += "</tr>"

        $('#pemberi-grid tbody').append(html);

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {  }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        $('.inp-anggaran').typeahead({
            source:$mataAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-pp').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-drk').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        hideUnselectedRowPemberi()

        $('#pemberi-grid td').removeClass('px-0 py-0 aktif');
        $('#pemberi-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#pemberi-grid tbody tr:last').find(".inp-anggaran").show();
        $('#pemberi-grid tbody tr:last').find(".search-anggaran").show();
        $('#pemberi-grid tbody tr:last').find(".td-anggaran").hide();
        $('#pemberi-grid tbody tr:last').find(".inp-anggaran").focus();

        $('.inp-nilai').on('change', function(){
            hitungTotalPemberi()
        })

        hitungTotalRowPemberi()
    }

    $('#form-tambah').on('click', '#add-row-jurnal', function(){
        addRowPemberi()
    });

    $('#jurnal-grid').on('click', '.hapus-jurnal', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-pemberi').each(function(){
            var nom = $(this).closest('tr').find('.no-pemberi');
            nom.html(no);
            no++;
        });
        hitungTotalRowPemberi();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#jurnal-grid').on('click', '.search-item', function() {
        var idx = $(this).closest('tr').find('.no-pemberi').text()
        var param = $(this).closest('div').find('input[type="text"]').attr('name')
        var target1 = $(this).closest('div').find('input[type="text"]').attr('class')
        var target2 = $(this).closest('div').find('span').attr('class')
        var target3 = $(this).closest('td').next('td').find('input[type="text"]').attr('class')
        var target4 = $(this).closest('td').next('td').find('span').attr('class')
        var tmp = target1.split(" ");
        var tmp2 = target2.split(" ")
        console.log(idx)
        if(typeof target3 !== 'undefined') {
            var tmp3 = target3.split(" ")
            target3 = tmp3[1]
        }
        if(typeof target4 !== 'undefined') {
            var tmp4 = target4.split(" ")
            target4 = tmp4[1]
        }
        target1 = tmp[1];
        target2 = tmp2[1]

        switch(param){
            case 'anggaran[]':
                var options = {
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/mata-anggaran') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar Mata Anggaran",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_akun+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.row-pemberi-'+idx).find('.search-anggaran').hide()
                        $('.'+target2).show()
                        $('.row-pemberi-'+idx).find('.search-pp').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'pp[]':
                var options = {
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar PP",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.search-pp').hide()
                        $('.'+target2).show()
                        $('.search-drk').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'drk[]':
                var options = {
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar DRK",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.'+target2).show()
                        $('.search-drk').hide()
                        $('.tdbulanke'+idx).hide()
                        $('.bulanke'+idx).show()
                        $('.bulanke'+idx).focus()
                    },
                    width : ["30%","70%"]
                };
            break;
            default:
            break;
        }

        showInpFilter(options);
    })

    $('#jurnal-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#pemberi-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowPemberi();
    });

    $('#jrunal-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 7){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#pemberi-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var anggaran = $(this).parents("tr").find(".inp-anggaran").val();
                var pp = $(this).parents("tr").find(".inp-pp").val();
                var drk = $(this).parents("tr").find(".inp-drk").val();
                var bulan = $(this).parents("tr").find(".inp-bulan").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var saldo = $(this).parents("tr").find(".inp-saldo").val();

                $(this).parents("tr").find(".inp-anggaran").val(anggaran);
                $(this).parents("tr").find(".td-anggaran").text(anggaran);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-anggaran").show();
                    $(this).parents("tr").find(".search-anggaran").show();
                    $(this).parents("tr").find(".td-anggaran").hide();
                    $(this).parents("tr").find(".inp-anggaran").focus();
                }else{
                    $(this).parents("tr").find(".inp-anggaran").hide();
                    $(this).parents("tr").find(".search-anggaran").hide();
                    $(this).parents("tr").find(".td-anggaran").show();
                }

                $(this).parents("tr").find(".inp-pp").val(pp);
                $(this).parents("tr").find(".td-pp").text(pp);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-pp").show();
                    $(this).parents("tr").find(".search-pp").show();
                    $(this).parents("tr").find(".td-pp").hide();
                    $(this).parents("tr").find(".inp-pp").focus();
                }else{
                    $(this).parents("tr").find(".inp-pp").hide();
                    $(this).parents("tr").find(".search-pp").hide();
                    $(this).parents("tr").find(".td-pp").show();
                }

                $(this).parents("tr").find(".inp-drk").val(drk);
                $(this).parents("tr").find(".td-drk").text(drk);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-drk").show();
                    $(this).parents("tr").find(".search-drk").show();
                    $(this).parents("tr").find(".td-drk").hide();
                    $(this).parents("tr").find(".inp-drk").focus();
                }else{
                    $(this).parents("tr").find(".inp-drk").hide();
                    $(this).parents("tr").find(".search-drk").hide();
                    $(this).parents("tr").find(".td-drk").show();
                }

                $(this).parents("tr").find(".inp-bulan").val(bulan);
                $(this).parents("tr").find(".td-bulan").text(bulan);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-bulan").show();
                    $(this).parents("tr").find(".td-bulan").hide();
                }else{
                    $(this).parents("tr").find(".inp-bulan").hide();
                    $(this).parents("tr").find(".td-bulan").show();
                }

                $(this).parents("tr").find(".inp-saldo").val(saldo);
                $(this).parents("tr").find(".td-saldo").text(saldo);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-saldo").show();
                    $(this).parents("tr").find(".td-saldo").hide();
                    $(this).parents("tr").find(".inp-saldo").focus();
                }else{
                    $(this).parents("tr").find(".inp-saldo").hide();
                    $(this).parents("tr").find(".td-saldo").show();
                }

                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
            }
        }
    });

    $('#jurnal-grid').on('change', '.inp-bulan', function(e){
        e.preventDefault();
        var noidx =  $(this).parents("tr").find(".no-pemberi").text();
        target1 = "saldoke"+noidx;
        target2 = "tdsaldoke"+noidx;
        var value = $(this).val();
        $('.tdbulanke'+noidx).text(value)
        $('.bulanke'+noidx).hide()
        $('.tdbulanke'+noidx).show()
        $('.saldoke'+noidx).show()
        $('.tdsaldoke'+noidx).hide()
        setTimeout(() => $('.saldoke'+noidx).focus(), 800)
    });

    var $twicePressPemberi = 0;
    $('#jurnal-grid').on('keydown','.inp-anggaran, .inp-pp, .inp-drk, .inp-saldo, .inp-nilai',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-anggaran','.inp-pp', '.inp-drk', '.inp-bulan', '.inp-saldo', '.inp-nilai'];
        var nxt2 = ['.td-anggaran','.td-pp', '.td-drk', '.td-bulan', '.td-saldo', '.td-nilai'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    if(isi.length > 30) {
                        isi = isi.substr(0, 30) + '...'
                    }
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-anggaran').hide();
                    $(this).closest('tr').find('.search-pp').show();
                break;
                case 1:
                    $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-pp').hide();
                    $(this).closest('tr').find('.search-drk').show();
                break;
                case 2:
                    $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-drk').hide();
                break;
                case 3:
                    $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");

                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Saldo yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 5:
                    if(isi != "" && isi != 0){
                        $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        if(code == 13 || code == 9) {
                            if($twicePressPemberi == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-anggaran');
                                if(cek.length > 0){
                                    cek.click();
                                }else{
                                    $('#add-row-pemberi').click();
                                }
                            }
                            $twicePressPemberi = 1
                            setTimeout(() => $twicePressPemberi = 0, 1000)
                        }
                    }else{
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


    function hideAllRowControlling() {
        $('#controlling-grid tbody tr').removeClass('selected-row');
        $('#controlling-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#controlling-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var akun = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val();
                var pp = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val();
                var drk = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val();
                var bulan = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val();
                var saldoAwal = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val();
                var nilai = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val();
                var saldoAkhir = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val();

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").text(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").text(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").text(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").text(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").text(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val(saldoAkhir);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").text(saldoAkhir);

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").show();
            }
        })
    }

    function hideUnselectedRowControlling() {
        $('#controlling-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var akun = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val();
                var pp = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val();
                var drk = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val();
                var bulan = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val();
                var saldoAwal = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val();
                var nilai = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val();
                var saldoAkhir = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val();

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").text(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").text(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").text(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").text(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").text(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val(saldoAkhir);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").text(saldoAkhir);

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").show();
            }
        })
    }

    function hitungTotalRowControlling(){
        var total_row = $('#controlling-grid tbody tr').length;
        $('#total-row-controlling').html(total_row+' Baris');
    }

    function addRowControlling() {
        var no=$('#controlling-grid .row-controlling:last').index();
        var no = no + 2
        var html = "";
        html += "<tr class='row-controlling'>"
        html += "<td class='no-controlling text-center hidden'>"+no+"</td>"
        html += "<td><div>"
        html += "<span class='td-akun tdakunke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='akun[]' class='inp-akun akunke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-pp-controlling tdppcontrollingke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='pp_controlling[]' class='inp-pp-controlling ppcontrollingke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='ppcontrollingkode"+no+"'><a href='#' class='search-item search-pp-controlling hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-drk-controlling tddrkcontrollingke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='drk_controlling[]' class='inp-drk-controlling drkcontrollingke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='drkcontrollingkode"+no+"'><a href='#' class='search-item search-drk-controlling hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td class='text-center'><div>"
        html += "<span class='td-bulan-controlling tdbulancontrollingke"+no+" tooltip-span'></span>"
        html += "<select class='hidden form-control inp-bulan-controlling bulancontrollingke"+no+"' name='bulan_controlling[]'>"
        html += "<option value='01' selected>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>"
        html += "</select>"
        html += "</div></td>"
        html += "<td class='text-right'><div>"
        html += "<span class='td-saldo-awal tdsaldoawalke"+no+"'>0</span>"
        html += "<input type='text' name='saldo_awal[]' class='inp-saldo-awal form-control saldoawalke"+no+" hidden currency' value='0' required>"
        html += "</div></td>"
        html += "<td class='text-right'>"
        html += "<span class='td-nilai-controlling tdnilaicontrollingke"+no+"'>0</span>"
        html += "<input type='text' name='nilai_controlling[]' class='inp-nilai-controlling form-control nilaicontrollingke"+no+" hidden currency'  value='0' required>"
        html += "</td>"
        html += "<td class='text-right'><div>"
        html += "<span class='td-saldo-akhir tdsaldoakhirke"+no+"'>0</span>"
        html += "<input type='text' name='saldo_akhir[]' class='inp-saldo-akhir form-control saldoakhirke"+no+" hidden currency' value='0' required>"
        html += "</div></td>"
        html += "<td class='text-center'><a class='hapus-controlling' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        html += "</tr>"

        $('#controlling-grid tbody').append(html);

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {  }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        $('.inp-akun').typeahead({
            source:$mataAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-pp-controlling').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-drk-controlling').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        hideUnselectedRowControlling()

        $('#controlling-grid td').removeClass('px-0 py-0 aktif');
        $('#controlling-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#controlling-grid tbody tr:last').find(".inp-akun").show();
        $('#controlling-grid tbody tr:last').find(".search-akun").show();
        $('#controlling-grid tbody tr:last').find(".td-akun").hide();
        $('#controlling-grid tbody tr:last').find(".inp-akun").focus();

        hitungTotalRowControlling()
    }

    $('#form-tambah').on('click', '#add-row-controlling', function(){
        addRowControlling()
    });

    $('#controlling-grid').on('click', '.hapus-controlling', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-controlling').each(function(){
            var nom = $(this).closest('tr').find('.no-controlling');
            nom.html(no);
            no++;
        });
        hitungTotalRowControlling();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#controlling-grid').on('click', '.search-item', function() {
        var idx = $(this).closest('tr').find('.no-controlling').text()
        var param = $(this).closest('div').find('input[type="text"]').attr('name')
        var target1 = $(this).closest('div').find('input[type="text"]').attr('class')
        var target2 = $(this).closest('div').find('span').attr('class')
        var target3 = $(this).closest('td').next('td').find('input[type="text"]').attr('class')
        var target4 = $(this).closest('td').next('td').find('span').attr('class')
        var tmp = target1.split(" ");
        var tmp2 = target2.split(" ")
        if(typeof target3 !== 'undefined') {
            var tmp3 = target3.split(" ")
            target3 = tmp3[1]
        }
        if(typeof target4 !== 'undefined') {
            var tmp4 = target4.split(" ")
            target4 = tmp4[1]
        }
        target1 = tmp[1];
        target2 = tmp2[1]

        switch(param){
            case 'akun[]':
                var options = {
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/mata-anggaran') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar Akun",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_akun+'-'+data.nama
                        if(string.length > 25) {
                            string = string.substr(0, 25) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.search-akun').hide()
                        $('.'+target2).show()
                        $('.search-pp-controlling').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'pp_controlling[]':
                var options = {
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar PP",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.search-pp-controlling').hide()
                        $('.'+target2).show()
                        $('.search-drk-controlling').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'drk_controlling[]':
                var options = {
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar DRK",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.'+target2).show()
                        $('.search-drk-controlling').hide()
                        $('.tdbulancontrollingke'+idx).hide()
                        $('.bulancontrollingke'+idx).show()
                        $('.bulancontrollingke'+idx).focus()
                    },
                    width : ["30%","70%"]
                };
            break;
            default:
            break;
        }

        showInpFilter(options);
    })

    $('#controlling-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#controlling-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowControlling();
    });

    $('#controlling-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 8){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#controlling-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var akun = $(this).parents("tr").find(".inp-akun").val();
                var pp = $(this).parents("tr").find(".inp-pp-controlling").val();
                var drk = $(this).parents("tr").find(".inp-drk-controlling").val();
                var bulan = $(this).parents("tr").find(".inp-bulan-controlling").val();
                var nilai = $(this).parents("tr").find(".inp-nilai-controlling").val();
                var saldoAwal = $(this).parents("tr").find(".inp-saldo-awal").val();
                var saldoAkhir = $(this).parents("tr").find(".inp-saldo-akhir").val();

                $(this).parents("tr").find(".inp-akun").val(akun);
                $(this).parents("tr").find(".td-akun").text(akun);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-akun").show();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".td-akun").hide();
                    $(this).parents("tr").find(".inp-akun").focus();
                }else{
                    $(this).parents("tr").find(".inp-akun").hide();
                    $(this).parents("tr").find(".search-akun").hide();
                    $(this).parents("tr").find(".td-akun").show();
                }

                $(this).parents("tr").find(".inp-pp-controlling").val(pp);
                $(this).parents("tr").find(".td-pp-controlling").text(pp);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-pp-controlling").show();
                    $(this).parents("tr").find(".search-pp-controlling").show();
                    $(this).parents("tr").find(".td-pp-controlling").hide();
                    $(this).parents("tr").find(".inp-pp-controlling").focus();
                }else{
                    $(this).parents("tr").find(".inp-pp-controlling").hide();
                    $(this).parents("tr").find(".search-pp-controlling").hide();
                    $(this).parents("tr").find(".td-pp-controlling").show();
                }

                $(this).parents("tr").find(".inp-drk-controlling").val(drk);
                $(this).parents("tr").find(".td-drk-controlling").text(drk);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-drk-controlling").show();
                    $(this).parents("tr").find(".search-drk-controlling").show();
                    $(this).parents("tr").find(".td-drk-controlling").hide();
                    $(this).parents("tr").find(".inp-drk-controlling").focus();
                }else{
                    $(this).parents("tr").find(".inp-drk-controlling").hide();
                    $(this).parents("tr").find(".search-drk-controlling").hide();
                    $(this).parents("tr").find(".td-drk-controlling").show();
                }

                $(this).parents("tr").find(".inp-bulan-controlling").val(bulan);
                $(this).parents("tr").find(".td-bulan-controlling").text(bulan);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-bulan-controlling").show();
                    $(this).parents("tr").find(".td-bulan-controlling").hide();
                }else{
                    $(this).parents("tr").find(".inp-bulan-controlling").hide();
                    $(this).parents("tr").find(".td-bulan-controlling").show();
                }

                $(this).parents("tr").find(".inp-saldo-awal").val(saldoAwal);
                $(this).parents("tr").find(".td-saldo-awal").text(saldoAwal);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-saldo-awal").show();
                    $(this).parents("tr").find(".td-saldo-awal").hide();
                    $(this).parents("tr").find(".inp-saldo-awal").focus();
                }else{
                    $(this).parents("tr").find(".inp-saldo-awal").hide();
                    $(this).parents("tr").find(".td-saldo-awal").show();
                }

                $(this).parents("tr").find(".inp-nilai-controlling").val(nilai);
                $(this).parents("tr").find(".td-nilai-controlling").text(nilai);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-nilai-controlling").show();
                    $(this).parents("tr").find(".td-nilai-controlling").hide();
                    $(this).parents("tr").find(".inp-nilai-controlling").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai-controlling").hide();
                    $(this).parents("tr").find(".td-nilai-controlling").show();
                }

                $(this).parents("tr").find(".inp-saldo-akhir").val(saldoAkhir);
                $(this).parents("tr").find(".td-saldo-akhir").text(saldoAkhir);
                if(idx == 7){
                    $(this).parents("tr").find(".inp-saldo-akhir").show();
                    $(this).parents("tr").find(".td-saldo-akhir").hide();
                    $(this).parents("tr").find(".inp-saldo-akhir").focus();
                }else{
                    $(this).parents("tr").find(".inp-saldo-akhir").hide();
                    $(this).parents("tr").find(".td-saldo-akhir").show();
                }
            }
        }
    });

    $('#controlling-grid').on('change', '.inp-bulan-controlling', function(e){
        e.preventDefault();
        var noidx =  $(this).parents("tr").find(".no-controlling").text();
        target1 = "saldocontrollingke"+noidx;
        target2 = "tdsaldocontrollingke"+noidx;
        var value = $(this).val();
        $('.tdbulancontrollingke'+noidx).text(value)
        $('.bulancontrollingke'+noidx).hide()
        $('.tdbulancontrollingke'+noidx).show()
        $('.saldoawalke'+noidx).show()
        $('.tdsaldoawalke'+noidx).hide()
        setTimeout(() => $('.saldoawalke'+noidx).focus(), 800)
    });

    var $twicePressControlling = 0;
    $('#controlling-grid').on('keydown','.inp-akun, .inp-pp-controlling, .inp-drk-controlling, .inp-saldo-awal, .inp-nilai-controlling, .inp-saldo-akhir',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-akun','.inp-pp-controlling', '.inp-drk-controlling', '.inp-bulan-controlling', '.inp-saldo-awal', '.inp-nilai-controlling', '.inp-saldo-akhir'];
        var nxt2 = ['.td-akun','.td-pp-controlling', '.td-drk-controlling', '.td-bulan-controlling', '.td-saldo-awal', '.td-nilai-controlling', '.td-saldo-akhir'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    if(isi.length > 25) {
                        isi = isi.substr(0, 25) + '...'
                    }
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-akun').hide();
                    $(this).closest('tr').find('.search-pp-controlling').show();
                break;
                case 1:
                    $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-pp-controlling').hide();
                    $(this).closest('tr').find('.search-drk-controlling').show();
                break;
                case 2:
                    $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-drk-controlling').hide();
                break;
                case 3:
                    $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");

                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Saldo Awal yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 5:
                    if(isi != "" && isi != 0){
                        $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 6:
                    if(isi != "" && isi != 0){
                        $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");

                        if(code == 13 || code == 9) {
                            if($twicePressControlling == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-akun');
                                if(cek.length > 0){
                                    cek.click();
                                }else{
                                    $('#add-row-controlling').click();
                                }
                            }
                            $twicePressControlling = 1
                            setTimeout(() => $twicePressControlling = 0, 1000)
                        }
                    }else{
                        alert('Saldo Akhir yang dimasukkan tidak valid');
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

    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();

            $("#pemberi-grid tbody tr td:not(:first-child):not(:last-child)").each(function() {
                if($(this).find('span').text().trim().length == 0) {
                    console.log($(this).find('span').text().length)
                    alert('Data pemberi tidak boleh kosong, harap dihapus untuk melanjutkan')
                    valid = false;
                    return false;
                }
            });

            var parameter = $('#id_edit').val();
            var id = $('#id').val();

            if(parameter == "edit"){
                var url = "{{ url('esaku-trans/pengajuan-rra-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-trans/pengajuan-rra') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            $('#pemberi-grid tbody tr').each(function(index) {
                formData.append('no_pemberi[]', $(this).find('.no-pemberi').text())
            })
            formData.append('donor', $totalPemberi)

            if(parameter == "edit") {
                formData.append('no_bukti', id)
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
            }
            if(valid) {
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
                        if(result.data.success.status){
                            dataTable.ajax.reload();
                            $('#row-id').hide();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('[id^=label]').html('');
                            $('#id_edit').val('');
                            $('#judul-form').html('Pengajuan RRA Anggaran');
                            $('#method').val('post');
                            resetForm();
                            msgDialog({
                                id:result.data.success.no_bukti,
                                type:'simpan'
                            });
                            last_add("no_pdrk",result.data.success.no_bukti);
                        }else if(!result.data.success.status && result.data.success.message === "Unauthorized"){
                            window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.success.message+'</a>'
                            })
                        }
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
                $('#btn-simpan').html("Simpan").removeAttr('disabled');
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/pengajuan-rra-detail') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data.success;
                if(result.status) {
                    var tanggal = result.data[0].tanggal.split(' ')
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#tanggal').val(tanggal[0])
                    $('#id').val(id)
                    $('#no_dok').val(result.data[0].no_dokumen);
                    $('#id').val(id);
                    $('#keterangan').val(result.data[0].keterangan)
                    filterNikApprove(result.data[0].nik_app3)
                    filterPPPenerima(result.detail_penerima[0].kode_pp)
                    filterDrkPenerima(result.detail_penerima[0].kode_pp)
                    filterAkunPenerima(result.detail_penerima[0].kode_akun)
                    $('#bulan_penerima').val(result.detail_penerima[0].bulan)
                    $('#nilai_penerima').val(parseInt(result.detail_penerima[0].nilai))
                    if(result.detail_pemberi.length > 0) {
                        var html = "";
                        var no = 1;
                        for(var i=0;i<result.detail_pemberi.length;i++) {
                            $totalPemberi = 0
                            var data = result.detail_pemberi[i]
                            $totalPemberi += parseInt(data.nilai)
                            var string = data.kode_akun+'-'+data.nama_akun
                            if(string.length > 30) {
                                string = string.substr(0, 30) + '...'
                            }
                            html += "<tr class='row-pemberi row-pemberi-"+no+"'>"
                            html += "<td class='no-pemberi text-center hidden'>"+no+"</td>"
                            html += "<td><div>"
                            html += "<span class='td-anggaran tdanggaranke"+no+" tooltip-span'>"+string+"</span>"
                            html += "<input autocomplete='off' type='text' name='anggaran[]' class='inp-anggaran anggaranke"+no+" form-control hidden' value='"+data.kode_akun+"-"+data.nama_akun+"' required='' style='z-index: 1;position: relative;' id='anggarankode"+no+"'><a href='#' class='search-item search-anggaran hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-pp tdppke"+no+" tooltip-span'>"+data.kode_pp+"-"+data.nama_pp+"</span>"
                            html += "<input autocomplete='off' type='text' name='pp[]' class='inp-pp ppke"+no+" form-control hidden' value='"+data.kode_pp+"-"+data.nama_pp+"' required='' style='z-index: 1;position: relative;' id='ppkode"+no+"'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-drk tddrkke"+no+" tooltip-span'>"+data.kode_pp+"-"+data.nama_pp+"</span>"
                            html += "<input autocomplete='off' type='text' name='drk[]' class='inp-drk drkke"+no+" form-control hidden' value='"+data.kode_pp+"-"+data.nama_pp+"' required='' style='z-index: 1;position: relative;' id='drkkode"+no+"'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td class='text-center'><div>"
                            html += "<span class='td-bulan tdbulanke"+no+" tooltip-span'>"+data.bulan+"</span>"
                            html += "<select class='hidden form-control inp-bulan bulanke"+no+"' name='bulan[]'>"
                            html += "<option value='01' selected>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>"
                            html += "</select>"
                            html += "</div></td>"
                            html += "<td class='text-right'><div>"
                            html += "<span class='td-saldo tdsaldoke"+no+"'>0</span>"
                            html += "<input type='text' name='saldo[]' class='inp-saldo form-control saldoke"+no+" hidden currency'  value='0' required>"
                            html += "</div></td>"
                            html += "<td class='text-right'>"
                            html += "<span class='td-nilai tdnilaike"+no+"'>"+format_number(data.nilai)+"</span>"
                            html += "<input type='text' name='nilai[]' class='inp-nilai form-control nilaike"+no+" hidden currency'  value='"+parseInt(data.nilai)+"' required>"
                            html += "</td>"
                            html += "<td class='text-center'><a class='hapus-pemberi' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            html += "</tr>"

                            no++;
                        }

                        $('#pemberi-grid tbody').append(html);


                        var no = 1;
                        for(var i=0;i<result.detail_pemberi.length;i++) {
                            var data =  result.detail_pemberi[i]
                            $('.bulanke'+no).val(data.bulan)
                            no++;
                        }

                        $('.currency').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () {  }
                        });

                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });

                        $('.inp-anggaran').typeahead({
                            source:$mataAnggaran,
                            displayText:function(item){
                                return item.id+'-'+item.name;
                            },
                            autoSelect:false,
                            changeInputOnSelect:false,
                            changeInputOnMove:false,
                            selectOnBlur:false,
                            afterSelect: function (item) {
                                console.log(item.id);
                            }
                        });

                        $('.inp-pp').typeahead({
                            source:$ppAnggaran,
                            displayText:function(item){
                                return item.id+'-'+item.name;
                            },
                            autoSelect:false,
                            changeInputOnSelect:false,
                            changeInputOnMove:false,
                            selectOnBlur:false,
                            afterSelect: function (item) {
                                console.log(item.id);
                            }
                        });

                        $('.inp-drk').typeahead({
                            source:$ppAnggaran,
                            displayText:function(item){
                                return item.id+'-'+item.name;
                            },
                            autoSelect:false,
                            changeInputOnSelect:false,
                            changeInputOnMove:false,
                            selectOnBlur:false,
                            afterSelect: function (item) {
                                console.log(item.id);
                            }
                        });

                        $('.inp-nilai').on('change', function(){
                            hitungTotalPemberi()
                        })

                        hitungTotalRowPemberi()
                    }

                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();

        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Pengajuan RRA Anggaran');
        editData(id);
    });

    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/pengajuan-rra') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.success.status){
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success",'Hapus Data','Data Pengajuan RRA ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.success.status && result.data.success.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.success.message+'</a>'
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

</script>
