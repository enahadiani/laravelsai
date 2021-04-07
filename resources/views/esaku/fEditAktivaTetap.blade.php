<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
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

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px">Form Edit Data Aktiva Tetap</h6>
                    {{-- <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <input type="hidden" placeholder="Deskripsi Akun" class="form-control" id="deskripsi_akun" name="deskripsi_akun" readonly>
                    <input type="hidden" placeholder="Persentase" class="form-control currency" id="persen" name="persen" value="0" readonly>
                    <input type="hidden" class="cbbl form-control inp-label-kode_pp1" id="kode_pp1" name="kode_pp1" value="-" title="" readonly>
                    <input type="hidden" class="cbbl form-control inp-label-kode_pp2" id="kode_pp2" name="kode_pp2" value="-" title="" readonly>

                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="aktiva_tetap">Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_aktiva_tetap" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-aktiva_tetap" id="aktiva_tetap" name="aktiva_tetap" value="" title="" readonly>
                                <span class="info-name_aktiva_tetap hidden">
                                    <span id="label_aktiva_tetap"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_aktiva_tetap"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tgl_perolehan">Tanggal Perolehan</label>
                            <input class='form-control datepicker' type="text" id="tgl_perolehan" name="tgl_perolehan" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tgl_susut">Tanggal Susut</label>
                            <input class='form-control datepicker' type="text" id="tgl_susut" name="tgl_susut" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="kode_klpakun">Akun Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_klpakun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-kode_klpakun" id="kode_klpakun" name="kode_klpakun" value="" title="" readonly>
                                <span class="info-name_kode_klpakun hidden">
                                    <span id="label_kode_klpakun"></span> 
                                </span>
                                {{-- <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_klpakun"></i> --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="kode_klpfa">Kelompok Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_klpfa" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-kode_klpfa" id="kode_klpfa" name="kode_klpfa" value="" title="" readonly>
                                <span class="info-name_kode_klpfa hidden">
                                    <span id="label_kode_klpfa"></span> 
                                </span>
                                {{-- <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_klpfa"></i> --}}
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_bukti">No Bukti</label>
                            <input type="text" placeholder="No Bukti" class="form-control" id="no_bukti" name="no_bukti" required readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="deskripsi">Keterangan Aktiva Tetap</label>
                            <input type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="umur">Umur (Bulan)</label>
                            <input type="text" placeholder="Umur" class="form-control currency" id="umur" name="umur" value="0" readonly required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" placeholder="Jumlah" class="form-control currency" id="jumlah" name="jumlah" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai">Nilai Perolehan</label>
                            <input type="text" placeholder="Nilai Perolehan" class="form-control currency" id="nilai_perolehan" name="nilai_perolehan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="residu">Nilai Residu</label>
                            <input type="text" placeholder="Nilai Residu" class="form-control currency" id="residu" name="residu" value="0" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Total</label>
                            <input type="text" placeholder="Total" class="form-control currency" id="total" name="total" value="0" readonly required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_seri">Nomor Seri</label>
                            <input type="text" placeholder="Nomor Seri" class="form-control" id="no_seri" name="no_seri" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="merk">Merk</label>
                            <input type="text" placeholder="Merk" class="form-control" id="merk" name="merk" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Tipe</label>
                            <input type="text" placeholder="Tipe" class="form-control" id="tipe" name="tipe" required>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div>
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('modal_search')

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>