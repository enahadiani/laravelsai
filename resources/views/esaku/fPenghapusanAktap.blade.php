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
                    <h6 id="judul-form" style="position:absolute;top:13px">Hapus Aktiva Tetap</h6>
                    {{-- <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tanggal">Tanggal</label>
                            <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}" required>
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_dokumen">No Dokumen</label>
                            <input type="text" placeholder="No Dokumen" class="form-control" id="no_dokumen" name="no_dokumen" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="aktiva_tetap">No Aktiva Tetap</label>
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
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="keterangan">Keterangan</label>
                            <input class='form-control' type="text" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="beban_penghapusan">Beban Penghapusan</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_beban_penghapusan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-beban_penghapusan" id="beban_penghapusan" name="aktiva_tetap" value="" title="" readonly>
                                <span class="info-name_beban_penghapusan hidden">
                                    <span id="label_beban_penghapusan"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_beban_penghapusan"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_perolehan">Nilai Perolehan</label>
                            <input type="text" placeholder="Nilai Perolehan" class="form-control currency" id="nilai_perolehan" name="nilai_perolehan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="total_perolehan">Total Penyusutan</label>
                            <input type="text" placeholder="Total Penyusutan" class="form-control currency" id="total_penyusutan" name="total_penyusutan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_buku">Nilai Buku</label>
                            <input type="text" placeholder="Nilai Buku" class="form-control currency" id="nilai_buku" name="nilai_buku" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_residu">Nilai Residu</label>
                            <input type="text" placeholder="Nilai Residu" class="form-control currency" id="nilai_residu" name="nilai_residu" value="0" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_referensi">Nilai Referensi Susut</label>
                            <input type="text" placeholder="Nilai Referensi Susut" class="form-control currency" id="nilai_referensi_susut" name="nilai_referensi_susut" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_seri">No Seri</label>
                            <input type="text" placeholder="No Seri" class="form-control" id="no_seri" name="no_seri" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="merk">Merk</label>
                            <input type="text" placeholder="Merk" class="form-control" id="merk" name="merk" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Tipe</label>
                            <input type="text" placeholder="Tipe" class="form-control" id="tipe" name="tipe" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="akun_akumulasi">Akun Akumulasi</label>
                            <input type="text" placeholder="Akun Akumulasi" class="form-control" id="akun_akumulasi" name="akun_akumulasi" required readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="akun_beban_penyusutan">Akun Beban Penyusutan</label>
                            <input type="text" placeholder="Akun Beban Penyusutan" class="form-control" id="akun_beban_penyusutan" name="akun_beban_penyusutan" required readonly>
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