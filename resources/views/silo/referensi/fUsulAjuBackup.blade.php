<style>
    #grid-load
  {
      position: absolute;
      text-align: center;
      width: 100%;
      top: 200px;
      display:none;
  }

  div.inp-div-jenis > input{
      border-radius:0 !important;
      z-index:1;
      position:relative;
  }

  div.inp-div-jenis > .search-item{
      position: absolute;
      font-size: 18px;
      margin-top: -27px;
      z-index: 2;
      margin-left: 99px;
  }
  .btn-full-round{
      border-radius: 20px !important;
  }
  .btn-light3{
      background: #b3b3b3;
      color: white;
  }
  .icon-tambah{
      background: #505050;
      /* mask: url("{{ url('img/add.svg') }}"); */
      -webkit-mask-image: url("{{ url('img/add.svg') }}");
      mask-image: url("{{ url('img/add.svg') }}");
      width: 12px;
      height: 12px;
  }
  .icon-close{
      background: #D4D4D4;
      /* mask: url("{{ url('img/lock.svg') }}");
       */
      -webkit-mask-image: url("{{ url('img/lock.svg') }}");
      mask-image: url("{{ url('img/lock.svg') }}");
      width: 18px;
      height: 18px;
  }
  .icon-open{
      background: #D4D4D4;
      /* mask: url("{{ url('img/lock.svg') }}");
       */
      -webkit-mask-image: url("{{ url('img/lock.svg') }}");
      mask-image: url("{{ url('img/lock.svg') }}");
      width: 18px;
      height: 18px;
  }
  .popover{
      top: -80px !important;
  }

  .btn-back
  {
      line-height:1.5;padding: 0;background: none;appearance: unset;opacity: unset;right: -40px;position: relative;
      top: 5px;
      z-index: 10;
      float: right;
      margin-top: -30px;
  }
  .btn-back > span 
  {
      border-radius: 50%;padding: 0 0.45rem 0.1rem 0.45rem;font-size: 1.2rem !important;font-weight: lighter;box-shadow:0px 1px 5px 1px #80808054;
      color:white;
      background:red;
  }

  .btn-back > span:hover
  {
      color:white;
      background:red;
  }
  .card-body-footer{
      background: white;
      position: fixed;
      bottom: 15px;
      right: 0;
      margin-right: 30px;
      z-index:3;
      height: 60px;
      border-top: ;
      border-bottom-right-radius: 1rem;
      border-bottom-left-radius: 1rem;
      box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
  }

  .card-body-footer > button{
      float: right;
      margin-top: 10px;
      margin-right: 25px;
  }

  .bold{
      font-weight:bold;
  }
  .modal p{
      color: #505050 !important;
  }
  .table-header-prev td,th{
      padding: 2px 8px !important;
  }
  #modal-preview .modal-content
  {
      border-bottom-left-radius: 0px !important;
      border-bottom-right-radius: 0px !important;
  }

  #modal-preview
  {
      top: calc(100vh - calc(100vh - 30px)) !important;
      overflow: hidden;
  }

  #modal-preview #content-preview 
  {
      height: calc(100vh - 105px) !important;
  }

  .animate-bottom {
      animation: animatebottom 0.5s;
  }
  
  @keyframes animatebottom {
      from {
          bottom: -400px;
          opacity: 0.8;
      }
      
      to {
          bottom: 0;
          opacity: 1;
      }
  }
  
  /* .bottom-sheet{
      max-height: 100% !important;
  }
  
  .bottom-sheet .modal.content{
      width: 60%; 
      margin: 0px auto
  } */

  #tanggal-dp .datepicker-dropdown
  {
      left: 20px !important;
      top: 190px !important;
  }
</style>
<?php 
function getNamaBulan($no_bulan){
    switch ($no_bulan){
            case 1 : case '1' : case '01': $bulan = "Januari"; break;
            case 2 : case '2' : case '02': $bulan = "Februari"; break;
            case 3 : case '3' : case '03': $bulan = "Maret"; break;
            case 4 : case '4' : case '04': $bulan = "April"; break;
            case 5 : case '5' : case '05': $bulan = "Mei"; break;
            case 6 : case '6' : case '06': $bulan = "Juni"; break;
            case 7 : case '7' : case '07': $bulan = "Juli"; break;
            case 8 : case '8' : case '08': $bulan = "Agustus"; break;
            case 9 : case '9' : case '09': $bulan = "September"; break;
            case 10 : case '10' : case '10': $bulan = "Oktober"; break;
            case 11 : case '11' : case '11': $bulan = "November"; break;
            case 12 : case '12' : case '12': $bulan = "Desember"; break;
            default: $bulan = null;
        }
        return $bulan;
    }
?>
<!-- FORM INPUT -->
<div id='grid-load'><img src='{{ asset("img/loadgif.gif") }}' style='width:25px;height:25px'></div>
<form id="form-tambah" class="tooltip-label-right" novalidate>
  <div class="row" id="saku-form">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                  <h6 id="judul-form" style="position:absolute;top:13px">Tambah Data Pengajuan</h6>
                  <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="separator mb-2"></div>
              <div class="card-body pt-3 form-body">
                  <input type="hidden" id="method" name="_method" value="post">
                  <div class="form-group row" id="row-id" hidden>
                      <div class="col-9">
                          <input class="form-control" type="text" id="id" name="id" readonly hidden>
                          <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                          <input class="form-control" type="hidden" placeholder="No Bukti" id="kode_form" name="kode_form" readonly>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6 col-sm-12">
                          <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tahun" >Tahun</label>
                                    <select name='tahun' id='tahun' class='form-control selectize'>
                                        <option value=''>Pilih Tahun</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-2" hidden>
                                    <input type="text" name="flag_draft" value="0" id="flag_draft" class="form-control" readonly>
                                </div>
                          </div>
                      </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label for="kode_pp">PP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" autocomplete="off" name="kode_pp" data-input="cbbl" value="" title="" required readonly>
                                    <span class="info-name_kode_pp hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="kode_akun" >Akun</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_akun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_akun" id="kode_akun" name="kode_akun" value="" title="">
                                    <span class="info-name_kode_akun hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_akun"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" rows="3" id="keterangan" name="keterangan" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                          <div class="row">
                              <div class="col-md-12">
                                  <label for="komentar">Komentar</label>
                                  <textarea class="form-control" rows="3" id="komentar" name="komentar" required></textarea>
                              </div>
                          </div>
                      </div>
                </div>
                <div class="form-row">
                    @for ($i=0;$i<12;$i++)
                    <div class="form-group col-md-2 ">                            
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="total_anggaran_<?=str_pad($i+1, 2, '0', STR_PAD_LEFT)?>" >Total <?php echo getNamaBulan($i+1);?></label>
                                <input class="form-control currency" type="text" placeholder="Total" readonly id="total_anggaran_<?=str_pad($i+1, 2, '0', STR_PAD_LEFT)?>" name="total_anggaran_<?=str_pad($i+1, 2, '0', STR_PAD_LEFT)?>" value="0">
                            </div>
                        </div>
                    </div>
                    @endfor
                    
                    <div class="form-group col-md-2 ">                            
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="total_anggaran" >Total Usulan</label>
                                <input class="form-control currency" type="text" placeholder="Total Usulan" readonly id="total_anggaran" name="total_anggaran" value="0">
                            </div>
                        </div>
                    </div>
                </div>

                  <ul class="nav nav-tabs col-12 " role="tablist">
                      <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-detail" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail</span></a> </li>
                      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Berkas</span></a> </li>
                  </ul>
                  <div class="tab-content tabcontent-border col-12 p-0">
                      <div class="tab-pane active" id="data-detail" role="tabpanel">
                          <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                              <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                              <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                              
                              <div class="dropdown d-inline-block mx-0">
                                  <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                  <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                      <a class="dropdown-item" href="#" id="download-template" >Download Template</a>
                                      <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                  </div>
                              </div>
                              <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                          </div>
                          <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                              <style>
                                  th{
                                      vertical-align:middle !important;
                                  }
                                  /* #input-grid td{
                                      padding:0 !important;
                                  } */
                                  #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid .custom-file-label
                                  {
                                      border:1px solid black !important;
                                      border-radius:0 !important;
                                  }

                                  #input-grid .selectize-input
                                  {
                                      border-radius:0 !important;
                                  } 
                                  
                                  .modal-header .close {
                                      padding: 1rem;
                                      margin: -1rem 0 -1rem auto;
                                  }
                                  .hapus-item{
                                      cursor:pointer;
                                  }
                                  .selected{
                                      cursor:pointer;
                                      /* background:#4286f5 !important; */
                                      /* color:white; */
                                  }
                                  #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover
                                  {
                                      /* background: var(--theme-color-6) !important;
                                      color:white; */
                                      background:#f8f8f8;
                                      color:black;
                                  }
                                  #input-grid input:hover,
                                  #input-grid .selectize-input:hover,
                                  {
                                      width:inherit;
                                  }
                                  #input-grid ul.typeahead.dropdown-menu
                                  {
                                      width:max-content !important;
                                  }
                                  #input-grid td
                                  {
                                      overflow:hidden !important;
                                      height:37.2px !important;
                                      padding:0px !important;
                                  }

                                  #input-grid span
                                  {
                                      padding:0px 10px !important;
                                  }

                                  #input-grid input,#input-grid .selectize-input
                                  {
                                      overflow:hidden !important;
                                      height:35px !important;
                                  }


                                  /* #input-grid td:nth-child(4)
                                  {
                                      overflow:unset !important;
                                  } */
                              </style>
                                <div style="overflow-x:scroll;width:100%">
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:220%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:5%">No</th>
                                            <th style="width:5%"></th>
                                            <th style="width:20%">Kode Rkm</th>
                                            <th style="width:15%">Kegiatan</th>
                                            <th style="width:15%">Detail</th>
                                            <th style="width:10%">Satuan</th>
                                            <th style="width:5%">Tarif</th>
                                            <th style="width:5%">Vol Jan</th>
                                            <th style="width:5%">Jml Jan</th>
                                            <th style="width:5%">Vol Feb</th>
                                            <th style="width:5%">Jml Feb</th>
                                            <th style="width:5%">Vol Mar</th>
                                            <th style="width:5%">Jml Mar</th>
                                            <th style="width:5%">Vol Apr</th>
                                            <th style="width:5%">Jml Apr</th>
                                            <th style="width:5%">Vol Mei</th>
                                            <th style="width:5%">Jml Mei</th>
                                            <th style="width:5%">Vol Jun</th>
                                            <th style="width:5%">Jml Jun</th>
                                            <th style="width:5%">Vol Jul</th>
                                            <th style="width:5%">Jml Jul</th>
                                            <th style="width:5%">Vol Agt</th>
                                            <th style="width:5%">Jml Agt</th>
                                            <th style="width:5%">Vol Sep</th>
                                            <th style="width:5%">Jml Sep</th>
                                            <th style="width:5%">Vol Okt</th>
                                            <th style="width:5%">Jml Okt</th>
                                            <th style="width:5%">Vol Nov</th>
                                            <th style="width:5%">Jml Nov</th>
                                            <th style="width:5%">Vol Des</th>
                                            <th style="width:5%">Jml Des</th>
                                            <th style="width:5%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    </div>
                              <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                          </div>
                      </div>
                      <div class="tab-pane" id="data-dok" role="tabpanel">
                          <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                              <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                          </div>
                          <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                              <table class="table table-bordered table-condensed gridexample" id="input-dok" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                  <thead style="background:#F8F8F8">
                                      <tr>
                                          <th style="width:3%">No</th>
                                          <th style="width:37%">Nama</th>
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
                  </div>
                  <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                      <div style="vertical-align: middle;" class="col-md-7 text-right p-0">
                          <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                      </div>
                      <div style="text-align: right;" class="col-md-5 p-0 ">
                          <button type="submit" style="margin-top: 10px;" id="btn-draft" class="btn btn-info mr-2"><i class="simple-icon-note"></i> Draft</button>
                          <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</form>
<!-- FORM INPUT  -->

    <!-- FORM UPLOAD -->
    <form id="form-upload" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form-upload" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 class="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali-upload" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body form-upload" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <label for="tanggal">Tanggal</label>
                                                <input class='form-control datepicker' type="text" id="tanggal_upload" readonly name="tanggal" value="{{ date('d/m/Y') }}">
                                                <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar"></i>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <label for="no_bukti_upload">No Bukti</label>
                                                <input class='form-control' type="text" id="no_bukti_upload" name="no_bukti" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Dokumen</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-dok" role="tabpanel">
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
                                            <i class="saicon icon-tambah mr-1"></i>Tambah Baris
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                            <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                                <p class="text-success" style="margin-top: 20px;"></p>
                            </div>
                            <div style="text-align: right;" class="col-md-2 p-0 ">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM UPLOAD  -->

    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    @include('modal_upload')
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>

    showInfoField("kode_pp","{{ Session::get('kodePP') }}","{{ Session::get('namaPP') }}");

    function cekAksesForm(){
        // $('#grid-load').show();
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/aju-usul-cek-akses-form') }}",
            dataType: 'json',
            data: { modul:'USUL' },
            async:false,
            success:function(result){
                if(!result.status){
                    $('#btn-tambah').hide();
                    // $('#saku-datatable #btn-edit').hide();
                    // $('#saku-datatable #btn-delete').hide();
                    $('#saku-form').hide();
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Form dilock',
                        text:  ( typeof result.message === 'object' ? JSON.stringify(result.message) : result.message )
                    });
                }else{
                    if($edit == 1 && $id_edit != ""){
                        $('#btn-save').attr('type','button');
                        $('#btn-save').attr('id','btn-update');
                        $('#judul-form').html('Edit Data Pengajuan');
                        editData($id_edit);
                    }else{
                        
                        $('#btn-update').attr('id','btn-save');
                        $('#btn-save').attr('type','submit');
                        $('#id').val('');
                        $('#input-grid tbody').html('');
                        $('#input-dok tbody').html('');
                        $('#judul-form').html("Tambah Data Pengajuan");
                    }
                }
            },
            complete:function(){
                // $('#grid-load').hide();
            }
        });
    }

    cekAksesForm();
    setHeightForm();
    setWidthFooterCardBody();


var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;

$('#process-upload').addClass('disabled');
$('#process-upload').prop('disabled', true);
$('#kode_form').val($form_aktif);

var $iconLoad = $('.preloader');
var $target = "";
var $target2 = "";
var $target3 = "";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
$(document).ready(function(){
    populateTahun();
});

function populateTahun(){
    var select = $('#tahun').selectize();
        select = select[0];
        var control = select.selectize;
        control.clearOptions();
        var now= new Date();
        var y= now.getFullYear();
        for(i=y+1;i>=2020;i--){
            control.addOption([{text:i, value:i}]);  
        }
        $('#tahun')[0].selectize.setValue(y);
}


// FUNCTION TAMBAHAN
function format_number(x){
    var num = parseFloat(x).toFixed(0);
    num = sepNumX(num);
    return num;
}

function reverseDate2(date_str, separator, newseparator){
    if(typeof separator === 'undefined'){separator = '-'}
    if(typeof newseparator === 'undefined'){newseparator = '-'}
    date_str = date_str.split(' ');
    var str = date_str[0].split(separator);

    return str[2]+newseparator+str[1]+newseparator+str[0];
}

function hitungTotalRow(){
    var total_row = $('#input-grid tbody tr').length;
    $('#total-row').html(total_row+' Baris');
}
function hitungTotalRowUpload(form){
        var total_row = $('#'+form+' #input-dok tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }

function hitungTotal(){        
    var total = 0;
    var tot_per_bln = new Array();

    $('.row-detdata').each(function(){
        //PR hitung total by totalkan jumlah
        var subtot=0;
        for(i=0;i<12;i++)//total bulan
        {
            var jml=toNilai($(this).closest('tr').find('.inp-jml_'+pad_left(i+1,2)).val());
            subtot+=jml;
            //total per bulan
            if(typeof tot_per_bln[i]!=='undefined')
            {
                tot_per_bln[i].jumlah+=jml;
                console.log('undefined');
            }else
            {
                tot_per_bln.push({
                    bln : pad_left(i+1,2), 
                    jumlah : jml 
                });
                console.log('tot_per_bln step');
                console.log(tot_per_bln);
            }
        }
        $(this).closest('tr').find('.inp-total').val(format_number(subtot));
        $(this).closest('tr').find('.td-total').text(format_number(subtot));

        //hitung total usulan
        var tot = $(this).closest('tr').find('.inp-total').val();
        total += +toNilai(tot);
    });
    console.log('total');

    console.log(total);

    $('#total_anggaran').val(total);
    //fill total per bulan
    console.log('tot_per_bln');
    console.log(tot_per_bln);

    for(i=0;i<tot_per_bln.length;i++)
    {
        $('#total_anggaran_'+tot_per_bln[i].bln).val(tot_per_bln[i].jumlah);
    }
}

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

// END FUNCTION TAMBAHAN

// INISIASI AWAL FORM

// var scrollform = document.querySelector('.form-body');
// var psscrollform = new PerfectScrollbar(scrollform);

$('.selectize').selectize();

$("input.datepicker").bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    }
});

function getPP(id){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-master/role-pp') }}",
            dataType: 'json',
            data:{kode_pp:kode},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_pp',result.daftar[0].nik,result.daftar[0].nama);
                    }else{
                        $('#kode_pp').attr('readonly',false);
                        $('#kode_pp').css('border-left','1px solid #d7d7d7');
                        $('#kode_pp').val('');
                        $('#kode_pp').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                }
            }
        });
    }

// END 

// SUGGESTION    
var $dtkode_rkm = [];
var $dtkode_akun = [];
var $dtsatuan = [];

function getDataTypeAhead(url,param,kode){
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        async:false,
        success:function(result){    
            if(result.status) {
                for(i=0;i<result.daftar.length;i++){
                    eval('$dt'+param+'['+i+'] = '+JSON.stringify({id:eval('result.daftar['+i+'].'+kode),name:result.daftar[i].nama}));  
                }
            }else if(!result.status && result.message == "Unauthorized"){
                window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
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
                window.location="{{ url('/rkap-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

//getDataTypeAhead("{{ url('rkap-trans/aju-usul-akun') }}","kode_akun","kode_akun");
//getDataTypeAhead("{{ url('rkap-trans/aju-usul-rkm') }}","kode_rkm","kode_rkm");
//getDataTypeAhead("{{ url('rkap-trans/aju-usul-satuan') }}","satuan","satuan");//perlu atau tidak

$('#kode_akun').typeahead({
    source:$dtkode_akun,
    fitToElement:true,
    displayText:function(item){
        return item.id+' - '+item.name;
    },
    autoSelect:false,
    changeInputOnSelect:false,
    changeInputOnMove:false,
    selectOnBlur:false,
    afterSelect: function (item) {
        // console.log(item.id);
    }
});
// END SUGGESTION

// CBBL

function getAkun(id){
    var tmp = id.split(" - ");
    kode = tmp[0];
    $.ajax({
        type: 'GET',
        url: "{{ url('/rkap-trans/aju-usul-akun') }}",
        dataType: 'json',
        data:{kode_akun: kode},
        async:false,
        success:function(result){    
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    showInfoField('kode_akun',result.daftar[0].kode_akun,result.daftar[0].nama);
                }else{
                    $('#kode_akun').attr('readonly',false);
                    $('#kode_akun').css('border-left','1px solid #d7d7d7');
                    $('#kode_akun').val('');
                    $('#kode_akun').focus();
                }
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
            }
        }
    });
}

// END CBBL

    // BUTTON KEMBALI

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#saku-form').on('click', '#btn-save', function(){
        $('#flag_draft').val(0);
    });
    
    $('#saku-form').on('click', '#btn-draft', function(){
        $('#flag_draft').val(1);
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            btn1: 'btn btn-primary',
            btn2: 'btn btn-light',
            title: 'Keluar Form?',
            text: 'Semua perubahan tidak akan disimpan.',
            confirm: 'Keluar',
            cancel: 'Batal',
            type:'custom',
            showCustom:function(result){
                if (result.value) {
                    $('.navbar-top a').removeClass('active');
                    $('a[data-href="fUsulDash"]').addClass('active');
                    var url = "{{ url('rkap-auth/form')}}/fUsulMenu";
                    $('#trans-body').load(url);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // console.log('cancel');
                }
            }
        });
    });

    // END BUTTON KEMBALI

// SIMPAN DATA
$('#form-tambah').validate({
    ignore: [],
    errorElement: "label",
    submitHandler: function (form) {

        var formData = new FormData(form);
        // for(var pair of formData.entries()) {
        //     console.log(pair[0]+ ', '+ pair[1]); 
        // }
        var total = $('#total_anggaran').val();
        var jumdet = $('#input-grid tr').length;

        var param = $('#id').val();
        var id = $('#no_bukti').val();
        // $iconLoad.show();
        if(param == "edit"){
            var url = "{{ url('/rkap-trans/aju-usul') }}/"+id;
        }else{
            var url = "{{ url('/rkap-trans/aju-usul') }}";
        }

       if( total <= 0 ){
            alert('Transaksi tidak valid. Total Tagihan tidak boleh sama dengan 0 atau kurang');
        }else if(jumdet <= 1){
            alert('Transaksi tidak valid. Detail Tagihan tidak boleh kosong ');
        }else{

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

                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('#row-id').hide();
                        $('#method').val('post');
                        $('#judul-form').html('Tambah Data Tagihan');
                        $('#id').val('');
                        $('#input-grid tbody').html('');
                        $('[id^=label]').html('');
                        $('#kode_form').val($form_aktif);
                        
                        // msgDialog({
                        //     id:result.data.no_tagihan,
                        //     type:'simpan'
                        // });
                        $edit = 0;
                        $id_edit = "";
                        var kode = result.data.no_aju;
                        msgDialog({
                            id:kode,
                            btn1: 'btn btn-primary',
                            btn2: 'btn btn-outline-primary',
                            title: 'Tersimpan',
                            text: 'Data tersimpan dengan No Transaksi <br><b>'+kode+'</b>',
                            confirm: 'Input Baru',
                            cancel: 'Selesai',
                            type:'custom',
                            showCustom:function(result){
                                if (result.value) {
                                    showNotification("top", "center", "success",'Simpan Data','Data ('+kode+') berhasil disimpan ');
                                } else if (result.dismiss === Swal.DismissReason.cancel) {
                                    $('.navbar-top a').removeClass('active');
                                    $('a[data-href="fUsulDash"]').addClass('active');
                                    var url = "{{ url('rkap-auth/form')}}/fUsulMenu";
                                    showNotification("top", "center", "success",'Simpan Data','Data ('+kode+') berhasil disimpan ');
                                    $('#trans-body').load(url);
                                }
                            }
                        });


                        if(result.data.no_pooling != undefined){
                            kirimWAEmail(result.data.no_pooling);
                        }

                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Gagal',
                            text: result.data.message
                        });
                    }
                    $iconLoad.hide();
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }
    },
    errorPlacement: function (error, element) {
        var id = element.attr("id");
        $("label[for="+id+"]").append("<br/>");
        $("label[for="+id+"]").append(error);
    }
});

// END SIMPAN

// ENTER FIELD FORM
$('#tahun,#tanggal,#keterangan,#kode_pp, #kode_akun,#keterangan').keydown(function(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    var nxt = ['tahun','tanggal','keterangan','kode_pp','kode_akun','keterangan'];
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
$('#form-tambah').on('click', '.search-item1', function(){
    var id = $(this).closest('div').find('input').attr('name');
     showInpFilterBSheet(options);
});

$('#form-tambah').on('click', '.search-item2', function(){
    var id = $(this).closest('div').find('input').attr('name');
    if(id==="kode_akun")
    {
        var options = {
            id : id,
            header : ['Kode akun', 'Nama'],
            url : "{{ url('rkap-trans/aju-usul-akun') }}",
            columns : [
                { data: 'kode_akun' },
                { data: 'nama' }
            ],
            judul : "Daftar akun",
            pilih : "kode_akun",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            width : ["30%","70%"]
        }
    }
    else if(id==='kode_pp')
    {
        var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('rkap-master/role-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
        }

    }

    showInpFilterBSheet(options);
});

$('#form-tambah').on('change', '#kode_akun', function(){
    var par = $(this).val();
    getAkun(par);
});


$('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
    });



// GRID JURNAL
function addRow(param){
    if(param == "copy"){
        var kode_rkm = $('#input-grid tbody tr.selected-row').find(".inp-rkm").val();
        var tarif = $('#input-grid tbody tr.selected-row').find(".inp-tarif").val();
        var deskripsi = $('#input-grid tbody tr.selected-row').find(".inp-deskripsi").val();
        var detail = $('#input-grid tbody tr.selected-row').find(".inp-detail").val();

        var satuan = $('#input-grid tbody tr.selected-row').find(".inp-satuan").val();
        var vol_01 = $('#input-grid tbody tr.selected-row').find(".inp-vol_01").val();
        var jml_01 = $('#input-grid tbody tr.selected-row').find(".inp-jml_01").val();
        var vol_02 = $('#input-grid tbody tr.selected-row').find(".inp-vol_02").val();
        var jml_02 = $('#input-grid tbody tr.selected-row').find(".inp-jml_02").val();
        var vol_03 = $('#input-grid tbody tr.selected-row').find(".inp-vol_03").val();
        var jml_03 = $('#input-grid tbody tr.selected-row').find(".inp-jml_03").val();
        var vol_04 = $('#input-grid tbody tr.selected-row').find(".inp-vol_04").val();
        var jml_04 = $('#input-grid tbody tr.selected-row').find(".inp-jml_04").val();
        var vol_05 = $('#input-grid tbody tr.selected-row').find(".inp-vol_05").val();
        var jml_05 = $('#input-grid tbody tr.selected-row').find(".inp-jml_05").val();
        var vol_06 = $('#input-grid tbody tr.selected-row').find(".inp-vol_06").val();
        var jml_06 = $('#input-grid tbody tr.selected-row').find(".inp-jml_06").val();
        var vol_07 = $('#input-grid tbody tr.selected-row').find(".inp-vol_07").val();
        var jml_07 = $('#input-grid tbody tr.selected-row').find(".inp-jml_07").val();
        var vol_08 = $('#input-grid tbody tr.selected-row').find(".inp-vol_08").val();
        var jml_08 = $('#input-grid tbody tr.selected-row').find(".inp-jml_08").val();
        var vol_09 = $('#input-grid tbody tr.selected-row').find(".inp-vol_09").val();
        var jml_09 = $('#input-grid tbody tr.selected-row').find(".inp-jml_09").val();
        var vol_10 = $('#input-grid tbody tr.selected-row').find(".inp-vol_10").val();
        var jml_10 = $('#input-grid tbody tr.selected-row').find(".inp-jml_10").val();
        var vol_11 = $('#input-grid tbody tr.selected-row').find(".inp-vol_11").val();
        var jml_11 = $('#input-grid tbody tr.selected-row').find(".inp-jml_11").val();
        var vol_12 = $('#input-grid tbody tr.selected-row').find(".inp-vol_12").val();
        var jml_12 = $('#input-grid tbody tr.selected-row').find(".inp-jml_12").val();

        var total = $('#input-grid tbody tr.selected-row').find(".inp-total").val();

    }else{
        
        var kode_rkm = "";
        var tarif = "";
        var deskripsi = "";
        var detail = "";
        var satuan = "";
        var vol_01 = "";
        var jml_01 = "";
        var vol_02 = "";
        var jml_02 = "";
        var vol_03 = "";
        var jml_03 = "";
        var vol_04 = "";
        var jml_04 = "";
        var vol_05 = "";
        var jml_05 = "";
        var vol_06 = "";
        var jml_06 = "";
        var vol_07 = "";
        var jml_07 = "";
        var vol_08 = "";
        var jml_08 = "";
        var vol_09 = "";
        var jml_09 = "";
        var vol_10 = "";
        var jml_10 = "";
        var vol_11 = "";
        var jml_11 = "";
        var vol_12 = "";
        var jml_12 = "";

        var total = "";

    }
    var no=$('#input-grid .row-detdata:last').index();
    no=no+2;
    var input = "";
    input += "<tr class='row-detdata'>";
    input += "<td class='no-detdata text-center'>"+no+"</td>";
    input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
    input += "<td><span class='td-rkm tdrkmke"+no+" tooltip-span'>"+kode_rkm+"</span><input type='text' name='kode_rkm[]' class='form-control inp-rkm rkmke"+no+" hidden' value='"+kode_rkm+"' required='' style='z-index: 1;position: relative;' id='rkmkode"+no+"'><a href='#' class='search-item search-rkm hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
    input += "<td class='text-left'><span class='td-deskripsi tddeskripsike"+no+" tooltip-span'>"+deskripsi+"</span><input type='text' name='deskripsi[]' class='form-control inp-deskripsi deskripsike"+no+" hidden'  value='"+deskripsi+"' required></td>";
    input += "<td class='text-left'><span class='td-detail tddetailke"+no+" tooltip-span'>"+detail+"</span><input type='text' name='detail[]' class='form-control inp-detail detailke"+no+" hidden'  value='"+detail+"' required></td>";
    //input += "<td class='text-left'><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden'  value='"+satuan+"' required></td>";
    input += "<td><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden' value='"+satuan+"' required='' style='z-index: 1;position: relative;' id='satuan"+no+"'><a href='#' class='search-item search-satuan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
    input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'>"+tarif+"</span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='"+tarif+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_01 tdvol_01ke"+no+" tooltip-span'>"+vol_01+"</span><input type='text' name='vol_01[]' class='form-control inp-vol_01 vol_01ke"+no+" hidden'  value='"+vol_01+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_01 tdjml_01ke"+no+" tooltip-span'>"+jml_01+"</span><input type='text' name='jml_01[]' class='form-control inp-jml_01 jml_01ke"+no+" hidden'  value='"+jml_01+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_02 tdvol_02ke"+no+" tooltip-span'>"+vol_02+"</span><input type='text' name='vol_02[]' class='form-control inp-vol_02 vol_02ke"+no+" hidden'  value='"+vol_02+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_02 tdjml_02ke"+no+" tooltip-span'>"+jml_02+"</span><input type='text' name='jml_02[]' class='form-control inp-jml_02 jml_02ke"+no+" hidden'  value='"+jml_02+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_03 tdvol_03ke"+no+" tooltip-span'>"+vol_03+"</span><input type='text' name='vol_03[]' class='form-control inp-vol_03 vol_03ke"+no+" hidden'  value='"+vol_03+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_03 tdjml_03ke"+no+" tooltip-span'>"+jml_03+"</span><input type='text' name='jml_03[]' class='form-control inp-jml_03 jml_03ke"+no+" hidden'  value='"+jml_03+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_04 tdvol_04ke"+no+" tooltip-span'>"+vol_04+"</span><input type='text' name='vol_04[]' class='form-control inp-vol_04 vol_04ke"+no+" hidden'  value='"+vol_04+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_04 tdjml_04ke"+no+" tooltip-span'>"+jml_04+"</span><input type='text' name='jml_04[]' class='form-control inp-jml_04 jml_04ke"+no+" hidden'  value='"+jml_04+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_05 tdvol_05ke"+no+" tooltip-span'>"+vol_05+"</span><input type='text' name='vol_05[]' class='form-control inp-vol_05 vol_05ke"+no+" hidden'  value='"+vol_05+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_05 tdjml_05ke"+no+" tooltip-span'>"+jml_05+"</span><input type='text' name='jml_05[]' class='form-control inp-jml_05 jml_05ke"+no+" hidden'  value='"+jml_05+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_06 tdvol_06ke"+no+" tooltip-span'>"+vol_06+"</span><input type='text' name='vol_06[]' class='form-control inp-vol_06 vol_06ke"+no+" hidden'  value='"+vol_06+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_06 tdjml_06ke"+no+" tooltip-span'>"+jml_06+"</span><input type='text' name='jml_06[]' class='form-control inp-jml_06 jml_06ke"+no+" hidden'  value='"+jml_06+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_07 tdvol_07ke"+no+" tooltip-span'>"+vol_07+"</span><input type='text' name='vol_07[]' class='form-control inp-vol_07 vol_07ke"+no+" hidden'  value='"+vol_07+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_07 tdjml_07ke"+no+" tooltip-span'>"+jml_07+"</span><input type='text' name='jml_07[]' class='form-control inp-jml_07 jml_07ke"+no+" hidden'  value='"+jml_07+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_08 tdvol_08ke"+no+" tooltip-span'>"+vol_08+"</span><input type='text' name='vol_08[]' class='form-control inp-vol_08 vol_08ke"+no+" hidden'  value='"+vol_08+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_08 tdjml_08ke"+no+" tooltip-span'>"+jml_08+"</span><input type='text' name='jml_08[]' class='form-control inp-jml_08 jml_08ke"+no+" hidden'  value='"+jml_08+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_09 tdvol_09ke"+no+" tooltip-span'>"+vol_09+"</span><input type='text' name='vol_09[]' class='form-control inp-vol_09 vol_09ke"+no+" hidden'  value='"+vol_09+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_09 tdjml_09ke"+no+" tooltip-span'>"+jml_09+"</span><input type='text' name='jml_09[]' class='form-control inp-jml_09 jml_09ke"+no+" hidden'  value='"+jml_09+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_10 tdvol_10ke"+no+" tooltip-span'>"+vol_10+"</span><input type='text' name='vol_10[]' class='form-control inp-vol_10 vol_10ke"+no+" hidden'  value='"+vol_10+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_10 tdjml_10ke"+no+" tooltip-span'>"+jml_10+"</span><input type='text' name='jml_10[]' class='form-control inp-jml_10 jml_10ke"+no+" hidden'  value='"+jml_10+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_11 tdvol_11ke"+no+" tooltip-span'>"+vol_11+"</span><input type='text' name='vol_11[]' class='form-control inp-vol_11 vol_11ke"+no+" hidden'  value='"+vol_11+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_11 tdjml_11ke"+no+" tooltip-span'>"+jml_11+"</span><input type='text' name='jml_11[]' class='form-control inp-jml_11 jml_11ke"+no+" hidden'  value='"+jml_11+"' required></td>";
    input += "<td class='text-right'><span class='td-vol_12 tdvol_12ke"+no+" tooltip-span'>"+vol_12+"</span><input type='text' name='vol_12[]' class='form-control inp-vol_12 vol_12ke"+no+" hidden'  value='"+vol_12+"' required></td>";
    input += "<td class='text-right'><span class='td-jml_12 tdjml_12ke"+no+" tooltip-span'>"+jml_12+"</span><input type='text' name='jml_12[]' class='form-control inp-jml_12 jml_12ke"+no+" hidden'  value='"+jml_12+"' required></td>";
    input += "<td class='text-right'><span class='td-total tdtotalke"+no+" tooltip-span'>"+total+"</span><input type='text' name='total[]' class='form-control inp-total totalke"+no+" hidden'  value='"+total+"' required></td>";
    input += "</tr>";
    $('#input-grid tbody').append(input);

    if(param != "copy"){
        $('.row-grid:last').addClass('selected-row');
        $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');
    }

    $('.tarifke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_01ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.jml_01ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_02ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_02ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_03ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_03ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_04ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_04ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_05ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_05ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_06ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_06ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_07ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_07ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_08ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_08ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_09ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_09ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_10ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_10ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_11ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_11ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.vol_12ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });                        
    $('.jml_12ke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    $('.totalke'+no).inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    

    
    hideUnselectedRow();
    if(param == "add"){
        $('#input-grid td').removeClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find(".inp-rkm").show();
        $('#input-grid tbody tr:last').find(".td-rkm").hide();
        $('#input-grid tbody tr:last').find(".search-rkm").show();
        $('#input-grid tbody tr:last').find(".inp-rkm").focus();
    }

    $('#rkmkode'+no).typeahead({
        source:$dtkode_rkm,
        displayText:function(item){
            return item.id+' - '+item.name;
        },
        autoSelect:false,
        changeInputOnSelect:false,
        changeInputOnMove:false,
        selectOnBlur:false,
        afterSelect: function (item) {
            // console.log(item.id);
        }
    });
    $('#satuan'+no).typeahead({
        source:$dtsatuan,
        displayText:function(item){
            return item.id+' - '+item.name;
        },
        autoSelect:false,
        changeInputOnSelect:false,
        changeInputOnMove:false,
        selectOnBlur:false,
        afterSelect: function (item) {
            // console.log(item.id);
        }
    });

    $('.tooltip-span').tooltip({
        title: function(){
            return $(this).text();
        }
    });
    hitungTotalRow();
}

function addRowDok(form){
        var no=$('#'+form+' #input-dok .row-dok:last').index();
        no=no+2;
        //console.log(no);
        var input = "";
        input += "<tr class='row-dok'>";
        input += "<td class='no-dok text-center'>"+no+"</td>";
        input += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value=''></td>";
        input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>-</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='-' readonly></td>";
        input+=`
        <td>
        <input type='file' name='file_dok[]'>
        <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
        </td>`;
        input+=`
        <td class='text-center action-dok'><a class='hapus-dok2'><i class='simple-icon-trash' style='font-size:18px'></i></a></td></tr>`;
        $('#'+form+' #input-dok tbody').append(input);
        hitungTotalRowUpload(form);
    }



$('#input-grid').on('click', '.search-item', function(){
    var par = $(this).closest('td').find('input').attr('name');
    
    var no =  $(this).parents("tr").find(".no-detdata").text();
    
    var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
    var tmp2 = tmp.split(" ");
    target1 = tmp2[2];
    
    switch(par){
        case 'kode_rkm[]': 
            var options = { 
                id : par,
                header : ['Kode', 'Nama'],
                url : "{{ url('rkap-trans/aju-usul-rkm') }}",
                columns : [
                    { data: 'kode_rkm' },
                    { data: 'nama' }
                ],
                judul : "Daftar rkm",
                pilih : "rkm",
                jTarget1 : "val",
                jTarget2 : "val",
                target1 : "."+target1,
                target2 : "",
                target3 : "",
                target4 : "",
                onItemSelected: function(data){
                    $('.rkmke'+no).val(data.kode_rkm+" - "+data.nama);
                    $('.tdrkmke'+no).html(data.kode_rkm+" - "+data.nama);
                    setTimeout(function() {
                        //$('.tdtotalke'+no).trigger("click");
                        $('.tddeskripsike'+no).trigger("click");                         
                    }, 1000);
                },
                width : ["30%","70%"]
            };
        break;
        case 'satuan[]': 
            var options = { 
                id : par,
                header : ['Kode', 'Nama'],
                url : "{{ url('rkap-trans/aju-usul-satuan') }}",
                columns : [
                    { data: 'satuan' },
                    { data: 'nama' }
                ],
                judul : "Daftar Satuan",
                pilih : "satuan",
                jTarget1 : "val",
                jTarget2 : "val",
                target1 : "."+target1,
                target2 : "",
                target3 : "",
                target4 : "",
                onItemSelected: function(data){
                    $('.satuanke'+no).val(data.satuan); //data.satuan+" - "+data.nama)
                    $('.tdsatuanke'+no).html(data.satuan); //+" - "+data.nama
                    setTimeout(function() {
                        //$('.tdtotalke'+no).trigger("click");
                        $('.tdtarifke'+no).trigger("click");                         
                    }, 1000);
                },
                width : ["30%","70%"]
            };
        break;
    }
    showInpFilterBSheet(options);

});

/*sementara tutup

end sementara tutup*/

function hitungJumlah(bln,_this){    
    //console.log('bln');
    //console.log(bln);

    var tarif=toNilai($(_this).closest('tr').find('.inp-tarif').val());
    var vol=toNilai($(_this).closest('tr').find('.inp-vol_'+bln).val());
    var jml=tarif*vol;
    $(_this).closest('tr').find('.inp-jml_'+bln).val(format_number(jml));
    $(_this).closest('tr').find('.td-jml_'+bln).text(format_number(jml));
    hitungTotal();
}

function pad_left(number, length) {
    var my_string = '' + number;
    while (my_string.length < length) {
        my_string = '0' + my_string;
    }

    return my_string;
}

function onChangeTarif(_this)
{
    for(i=0;i<12;i++)//total bulan
    {
        hitungJumlah(pad_left(i+1,2),_this);
    }
}

$('#input-grid').on('change keyup keypress', '.inp-tarif', function(){
    if($(this).closest('tr').find('.inp-tarif').val() != "" && $(this).closest('tr').find('.inp-tarif').val() != 0){
        onChangeTarif(this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_01', function(){
    if($(this).closest('tr').find('.inp-vol_01').val() != "" && $(this).closest('tr').find('.inp-vol_01').val() != 0){
        hitungJumlah('01',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_01', function(){
    if($(this).closest('tr').find('.inp-jml_01').val() != "" && $(this).closest('tr').find('.inp-jml_01').val() != 0){
        hitungJumlah('01',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_02', function(){
    if($(this).closest('tr').find('.inp-vol_02').val() != "" && $(this).closest('tr').find('.inp-vol_02').val() != 0){
        hitungJumlah('02',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_02', function(){
    if($(this).closest('tr').find('.inp-jml_02').val() != "" && $(this).closest('tr').find('.inp-jml_02').val() != 0){
        hitungJumlah('02',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_03', function(){
    if($(this).closest('tr').find('.inp-vol_03').val() != "" && $(this).closest('tr').find('.inp-vol_03').val() != 0){
        hitungJumlah('03',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_03', function(){
    if($(this).closest('tr').find('.inp-jml_03').val() != "" && $(this).closest('tr').find('.inp-jml_03').val() != 0){
        hitungJumlah('03',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_04', function(){
    if($(this).closest('tr').find('.inp-vol_04').val() != "" && $(this).closest('tr').find('.inp-vol_04').val() != 0){
        hitungJumlah('04',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_04', function(){
    if($(this).closest('tr').find('.inp-jml_04').val() != "" && $(this).closest('tr').find('.inp-jml_04').val() != 0){
        hitungJumlah('04',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_05', function(){
    if($(this).closest('tr').find('.inp-vol_05').val() != "" && $(this).closest('tr').find('.inp-vol_05').val() != 0){
        hitungJumlah('05',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_05', function(){
    if($(this).closest('tr').find('.inp-jml_05').val() != "" && $(this).closest('tr').find('.inp-jml_05').val() != 0){
        hitungJumlah('05',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_06', function(){
    if($(this).closest('tr').find('.inp-vol_06').val() != "" && $(this).closest('tr').find('.inp-vol_06').val() != 0){
        hitungJumlah('06',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_06', function(){
    if($(this).closest('tr').find('.inp-jml_06').val() != "" && $(this).closest('tr').find('.inp-jml_06').val() != 0){
        hitungJumlah('06',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_07', function(){
    if($(this).closest('tr').find('.inp-vol_07').val() != "" && $(this).closest('tr').find('.inp-vol_07').val() != 0){
        hitungJumlah('07',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_07', function(){
    if($(this).closest('tr').find('.inp-jml_07').val() != "" && $(this).closest('tr').find('.inp-jml_07').val() != 0){
        hitungJumlah('07',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_08', function(){
    if($(this).closest('tr').find('.inp-vol_08').val() != "" && $(this).closest('tr').find('.inp-vol_08').val() != 0){
        hitungJumlah('08',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_08', function(){
    if($(this).closest('tr').find('.inp-jml_08').val() != "" && $(this).closest('tr').find('.inp-jml_08').val() != 0){
        hitungJumlah('08',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_09', function(){
    if($(this).closest('tr').find('.inp-vol_09').val() != "" && $(this).closest('tr').find('.inp-vol_09').val() != 0){
        hitungJumlah('09',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_09', function(){
    if($(this).closest('tr').find('.inp-jml_09').val() != "" && $(this).closest('tr').find('.inp-jml_09').val() != 0){
        hitungJumlah('09',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_10', function(){
    if($(this).closest('tr').find('.inp-vol_10').val() != "" && $(this).closest('tr').find('.inp-vol_10').val() != 0){
        hitungJumlah('10',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_10', function(){
    if($(this).closest('tr').find('.inp-jml_10').val() != "" && $(this).closest('tr').find('.inp-jml_10').val() != 0){
        hitungJumlah('10',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_11', function(){
    if($(this).closest('tr').find('.inp-vol_11').val() != "" && $(this).closest('tr').find('.inp-vol_11').val() != 0){
        hitungJumlah('11',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_11', function(){
    if($(this).closest('tr').find('.inp-jml_11').val() != "" && $(this).closest('tr').find('.inp-jml_11').val() != 0){
        hitungJumlah('11',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-vol_12', function(){
    if($(this).closest('tr').find('.inp-vol_12').val() != "" && $(this).closest('tr').find('.inp-vol_12').val() != 0){
        hitungJumlah('12',this);
    }
    else{
        //alert('Volume yang dimasukkan tidak valid');
        return false;
    }
});
$('#input-grid').on('change keyup keypress', '.inp-jml_12', function(){
    if($(this).closest('tr').find('.inp-jml_12').val() != "" && $(this).closest('tr').find('.inp-jml_12').val() != 0){
        hitungJumlah('12',this);
    }
    else{
        //alert('Jumlah yang dimasukkan tidak valid');
        return false;
    }
});


$('#input-grid').on('change keyup keypress', '.inp-total', function(){
    if($(this).closest('tr').find('.inp-total').val() != "" && $(this).closest('tr').find('.inp-total').val() != 0){
        hitungTotal();
    }
    else{
        alert('total yang dimasukkan tidak valid');
        return false;
    }
});

$('#form-tambah').on('click', '.add-row', function(e){
    e.preventDefault();
    addRow("add");
});

$('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
});


function hideUnselectedRow() {
    $('#input-grid > tbody > tr').each(function(index, row) {
        if(!$(row).hasClass('selected-row')) {
            var kode_rkm = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-rkm").val();
            var tarif = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tarif").val();
            var deskripsi = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-deskripsi").val();
            var detail = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-detail").val();

            var satuan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").val();
            var vol_01 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_01").val();
            var jml_01 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_01").val();
            var vol_02 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_02").val();
            var jml_02 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_02").val();
            var vol_03 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_03").val();
            var jml_03 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_03").val();
            var vol_04 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_04").val();
            var jml_04 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_04").val();
            var vol_05 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_05").val();
            var jml_05 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_05").val();
            var vol_06 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_06").val();
            var jml_06 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_06").val();
            var vol_07 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_07").val();
            var jml_07 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_07").val();
            var vol_08 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_08").val();
            var jml_08 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_08").val();
            var vol_09 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_09").val();
            var jml_09 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_09").val();
            var vol_10 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_10").val();
            var jml_10 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_10").val();
            var vol_11 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_11").val();
            var jml_11 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_11").val();
            var vol_12 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_12").val();
            var jml_12 = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_12").val();
            var total = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").val();


            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-rkm").val(kode_rkm);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-rkm").text(kode_rkm);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-deskripsi").val(deskripsi);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-deskripsi").text(deskripsi);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-detail").val(detail);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-detail").text(detail);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").val(satuan);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-satuan").text(satuan);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tarif").val(tarif);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tarif").text(tarif);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_01").val(vol_01);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_01").text(vol_01);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_01").val(jml_01);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_01").text(jml_01);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_02").val(vol_02);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_02").text(vol_02);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_02").val(jml_02);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_02").text(jml_02);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_03").val(vol_03);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_03").text(vol_03);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_03").val(jml_03);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_03").text(jml_03);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_04").val(vol_04);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_04").text(vol_04);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_04").val(jml_04);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_04").text(jml_04);            

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_05").val(vol_05);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_05").text(vol_05);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_05").val(jml_05);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_05").text(jml_05);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_06").val(vol_06);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_06").text(vol_06);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_06").val(jml_06);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_06").text(jml_06);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_07").val(vol_07);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_07").text(vol_07);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_07").val(jml_07);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_07").text(jml_07);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_08").val(vol_08);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_08").text(vol_08);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_08").val(jml_08);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_08").text(jml_08);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_09").val(vol_09);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_09").text(vol_09);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_09").val(jml_09);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_09").text(jml_09);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_10").val(vol_10);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_10").text(vol_10);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_10").val(jml_10);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_10").text(jml_10);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_11").val(vol_11);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_11").text(vol_11);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_11").val(jml_11);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_11").text(jml_11);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_12").val(vol_12);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_12").text(vol_12);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_12").val(jml_12);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_12").text(jml_12);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").val(total);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-total").text(total);


            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-rkm").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-rkm").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-rkm").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-deskripsi").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-deskripsi").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-detail").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-detail").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-satuan").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-satuan").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tarif").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tarif").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_01").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_01").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_01").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_01").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_02").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_02").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_02").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_02").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_03").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_03").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_03").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_03").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_04").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_04").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_04").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_04").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_05").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_05").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_05").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_05").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_06").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_06").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_06").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_06").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_07").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_07").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_07").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_07").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_08").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_08").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_08").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_08").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_09").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_09").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_09").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_09").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_10").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_10").show();            
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_10").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_10").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_11").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_11").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_11").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_11").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jml_12").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jml_12").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-vol_12").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-vol_12").show();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-total").show();
        }
    })
}

$('#input-grid tbody').on('click', 'tr', function(){
    $(this).addClass('selected-row');
    $('#input-grid tbody tr').not(this).removeClass('selected-row');
    hideUnselectedRow();
});


$('.nav-control').on('click', '#delete-row', function(){
    if($(".selected-row").length != 1){
        alert('Harap pilih row yang akan dihapus terlebih dahulu!');
        return false;
    }else{
        $('#input-grid tbody').find('.selected-row').remove();
        no=1;
        $('.row-detdata').each(function(){
            var nom = $(this).closest('tr').find('.no-detdata');
            nom.html(no);
            no++;
        });
        hitungTotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    }

});

$('.nav-control').on('click', '#copy-row', function(){
    if($(".selected-row").length != 1){
        alert('Harap pilih row yang akan dicopy terlebih dahulu!');
        return false;
    }else{
        addRow("copy");
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    }

});

$('#input-grid').on('click', 'td', function(){
    var idx = $(this).index();
    if(idx == 0){
        return false;
    }else{
        if($(this).hasClass('px-0 py-0 aktif')){
            return false;            
        }else{
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $(this).addClass('px-0 py-0 aktif');
    
            var kode_rkm = $(this).parents("tr").find(".inp-rkm").val();
            var tarif = $(this).parents("tr").find(".inp-tarif").val();
            var deskripsi = $(this).parents("tr").find(".inp-deskripsi").val();
            var detail = $(this).parents("tr").find(".inp-detail").val();

            var satuan = $(this).parents("tr").find(".inp-satuan").val();
            var vol_01 = $(this).parents("tr").find(".inp-vol_01").val();
            var jml_01 = $(this).parents("tr").find(".inp-jml_01").val();
            var vol_02 = $(this).parents("tr").find(".inp-vol_02").val();
            var jml_02 = $(this).parents("tr").find(".inp-jml_02").val();
            var vol_03 = $(this).parents("tr").find(".inp-vol_03").val();
            var jml_03 = $(this).parents("tr").find(".inp-jml_03").val();
            var vol_04 = $(this).parents("tr").find(".inp-vol_04").val();
            var jml_04 = $(this).parents("tr").find(".inp-jml_04").val();
            var vol_05 = $(this).parents("tr").find(".inp-vol_05").val();
            var jml_05 = $(this).parents("tr").find(".inp-jml_05").val();
            var vol_06 = $(this).parents("tr").find(".inp-vol_06").val();
            var jml_06 = $(this).parents("tr").find(".inp-jml_06").val();
            var vol_07 = $(this).parents("tr").find(".inp-vol_07").val();
            var jml_07 = $(this).parents("tr").find(".inp-jml_07").val();
            var vol_08 = $(this).parents("tr").find(".inp-vol_08").val();
            var jml_08 = $(this).parents("tr").find(".inp-jml_08").val();
            var vol_09 = $(this).parents("tr").find(".inp-vol_09").val();
            var jml_09 = $(this).parents("tr").find(".inp-jml_09").val();
            var vol_10 = $(this).parents("tr").find(".inp-vol_10").val();
            var jml_10 = $(this).parents("tr").find(".inp-jml_10").val();
            var vol_11 = $(this).parents("tr").find(".inp-vol_11").val();
            var jml_11 = $(this).parents("tr").find(".inp-jml_11").val();
            var vol_12 = $(this).parents("tr").find(".inp-vol_12").val();
            var jml_12 = $(this).parents("tr").find(".inp-jml_12").val();



            var total = $(this).parents("tr").find(".inp-total").val();

            var no = $(this).parents("tr").find(".no-detdata").text();

            $(this).parents("tr").find(".inp-rkm").val(kode_rkm);
            $(this).parents("tr").find(".td-rkm").text(kode_rkm);
            if(idx == 2){
                $(this).parents("tr").find(".inp-rkm").show();
                $(this).parents("tr").find(".td-rkm").hide();
                $(this).parents("tr").find(".search-rkm").show();
                $(this).parents("tr").find(".inp-rkm").focus();
            }else{
                $(this).parents("tr").find(".inp-rkm").hide();
                $(this).parents("tr").find(".td-rkm").show();
                $(this).parents("tr").find(".search-rkm").hide();
            }

            $(this).parents("tr").find(".inp-deskripsi").val(deskripsi);
            $(this).parents("tr").find(".td-deskripsi").text(deskripsi);
            if(idx == 3){
                $(this).parents("tr").find(".inp-deskripsi").show();
                $(this).parents("tr").find(".td-deskripsi").hide();
                $(this).parents("tr").find(".inp-deskripsi").focus();
            }else{
                $(this).parents("tr").find(".inp-deskripsi").hide();
                $(this).parents("tr").find(".td-deskripsi").show();
            }

            $(this).parents("tr").find(".inp-detail").val(detail);
            $(this).parents("tr").find(".td-detail").text(detail);
            if(idx == 4){
                $(this).parents("tr").find(".inp-detail").show();
                $(this).parents("tr").find(".td-detail").hide();
                $(this).parents("tr").find(".inp-detail").focus();
            }else{
                $(this).parents("tr").find(".inp-detail").hide();
                $(this).parents("tr").find(".td-detail").show();
            }

            $(this).parents("tr").find(".inp-satuan").val(satuan);
            $(this).parents("tr").find(".td-satuan").text(satuan);
            if(idx == 5){
                $(this).parents("tr").find(".inp-satuan").show();
                $(this).parents("tr").find(".td-satuan").hide();
                $(this).parents("tr").find(".search-satuan").show();
                $(this).parents("tr").find(".inp-satuan").focus();
            }else{
                $(this).parents("tr").find(".inp-satuan").hide();
                $(this).parents("tr").find(".td-satuan").show();
                $(this).parents("tr").find(".search-satuan").hide();
            }

            $(this).parents("tr").find(".inp-tarif").val(tarif);
            $(this).parents("tr").find(".td-tarif").text(tarif);
            if(idx == 6){
                $(this).parents("tr").find(".inp-tarif").show();
                $(this).parents("tr").find(".td-tarif").hide();
                $(this).parents("tr").find(".inp-tarif").focus();
            }else{
                $(this).parents("tr").find(".inp-tarif").hide();
                $(this).parents("tr").find(".td-tarif").show();
            }
            //01
            $(this).parents("tr").find(".inp-vol_01").val(vol_01);
            $(this).parents("tr").find(".td-vol_01").text(vol_01);
            if(idx == 7){
                $(this).parents("tr").find(".inp-vol_01").show();
                $(this).parents("tr").find(".td-vol_01").hide();
                $(this).parents("tr").find(".inp-vol_01").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_01").hide();
                $(this).parents("tr").find(".td-vol_01").show();
            }

            $(this).parents("tr").find(".inp-jml_01").val(jml_01);
            $(this).parents("tr").find(".td-jml_01").text(jml_01);
            if(idx == 8){
                $(this).parents("tr").find(".inp-jml_01").show();
                $(this).parents("tr").find(".td-jml_01").hide();
                $(this).parents("tr").find(".inp-jml_01").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_01").hide();
                $(this).parents("tr").find(".td-jml_01").show();
            }
            //02
            $(this).parents("tr").find(".inp-vol_02").val(vol_02);
            $(this).parents("tr").find(".td-vol_02").text(vol_02);
            if(idx == 9){
                $(this).parents("tr").find(".inp-vol_02").show();
                $(this).parents("tr").find(".td-vol_02").hide();
                $(this).parents("tr").find(".inp-vol_02").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_02").hide();
                $(this).parents("tr").find(".td-vol_02").show();
            }

            $(this).parents("tr").find(".inp-jml_02").val(jml_02);
            $(this).parents("tr").find(".td-jml_02").text(jml_02);
            if(idx == 10){
                $(this).parents("tr").find(".inp-jml_02").show();
                $(this).parents("tr").find(".td-jml_02").hide();
                $(this).parents("tr").find(".inp-jml_02").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_02").hide();
                $(this).parents("tr").find(".td-jml_02").show();
            }
            //03
            $(this).parents("tr").find(".inp-vol_03").val(vol_03);
            $(this).parents("tr").find(".td-vol_03").text(vol_03);
            if(idx == 11){
                $(this).parents("tr").find(".inp-vol_03").show();
                $(this).parents("tr").find(".td-vol_03").hide();
                $(this).parents("tr").find(".inp-vol_03").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_03").hide();
                $(this).parents("tr").find(".td-vol_03").show();
            }

            $(this).parents("tr").find(".inp-jml_03").val(jml_03);
            $(this).parents("tr").find(".td-jml_03").text(jml_03);
            if(idx == 12){
                $(this).parents("tr").find(".inp-jml_03").show();
                $(this).parents("tr").find(".td-jml_03").hide();
                $(this).parents("tr").find(".inp-jml_03").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_03").hide();
                $(this).parents("tr").find(".td-jml_03").show();
            }
            //04
            $(this).parents("tr").find(".inp-vol_04").val(vol_04);
            $(this).parents("tr").find(".td-vol_04").text(vol_04);
            if(idx == 13){
                $(this).parents("tr").find(".inp-vol_04").show();
                $(this).parents("tr").find(".td-vol_04").hide();
                $(this).parents("tr").find(".inp-vol_04").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_04").hide();
                $(this).parents("tr").find(".td-vol_04").show();
            }

            $(this).parents("tr").find(".inp-jml_04").val(jml_04);
            $(this).parents("tr").find(".td-jml_04").text(jml_04);
            if(idx == 14){
                $(this).parents("tr").find(".inp-jml_04").show();
                $(this).parents("tr").find(".td-jml_04").hide();
                $(this).parents("tr").find(".inp-jml_04").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_04").hide();
                $(this).parents("tr").find(".td-jml_04").show();
            }
            //05
            $(this).parents("tr").find(".inp-vol_05").val(vol_05);
            $(this).parents("tr").find(".td-vol_05").text(vol_05);
            if(idx == 15){
                $(this).parents("tr").find(".inp-vol_05").show();
                $(this).parents("tr").find(".td-vol_05").hide();
                $(this).parents("tr").find(".inp-vol_05").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_05").hide();
                $(this).parents("tr").find(".td-vol_05").show();
            }

            $(this).parents("tr").find(".inp-jml_05").val(jml_05);
            $(this).parents("tr").find(".td-jml_05").text(jml_05);
            if(idx == 16){
                $(this).parents("tr").find(".inp-jml_05").show();
                $(this).parents("tr").find(".td-jml_05").hide();
                $(this).parents("tr").find(".inp-jml_05").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_05").hide();
                $(this).parents("tr").find(".td-jml_05").show();
            }
            //06
            $(this).parents("tr").find(".inp-vol_06").val(vol_06);
            $(this).parents("tr").find(".td-vol_06").text(vol_06);
            if(idx == 17){
                $(this).parents("tr").find(".inp-vol_06").show();
                $(this).parents("tr").find(".td-vol_06").hide();
                $(this).parents("tr").find(".inp-vol_06").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_06").hide();
                $(this).parents("tr").find(".td-vol_06").show();
            }

            $(this).parents("tr").find(".inp-jml_06").val(jml_06);
            $(this).parents("tr").find(".td-jml_06").text(jml_06);
            if(idx == 18){
                $(this).parents("tr").find(".inp-jml_06").show();
                $(this).parents("tr").find(".td-jml_06").hide();
                $(this).parents("tr").find(".inp-jml_06").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_06").hide();
                $(this).parents("tr").find(".td-jml_06").show();
            }
            //07
            $(this).parents("tr").find(".inp-vol_07").val(vol_07);
            $(this).parents("tr").find(".td-vol_07").text(vol_07);
            if(idx == 19){
                $(this).parents("tr").find(".inp-vol_07").show();
                $(this).parents("tr").find(".td-vol_07").hide();
                $(this).parents("tr").find(".inp-vol_07").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_07").hide();
                $(this).parents("tr").find(".td-vol_07").show();
            }

            $(this).parents("tr").find(".inp-jml_07").val(jml_07);
            $(this).parents("tr").find(".td-jml_07").text(jml_07);
            if(idx == 20){
                $(this).parents("tr").find(".inp-jml_07").show();
                $(this).parents("tr").find(".td-jml_07").hide();
                $(this).parents("tr").find(".inp-jml_07").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_07").hide();
                $(this).parents("tr").find(".td-jml_07").show();
            }
            //08
            $(this).parents("tr").find(".inp-vol_08").val(vol_08);
            $(this).parents("tr").find(".td-vol_08").text(vol_08);
            if(idx == 21){
                $(this).parents("tr").find(".inp-vol_08").show();
                $(this).parents("tr").find(".td-vol_08").hide();
                $(this).parents("tr").find(".inp-vol_08").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_08").hide();
                $(this).parents("tr").find(".td-vol_08").show();
            }

            $(this).parents("tr").find(".inp-jml_08").val(jml_08);
            $(this).parents("tr").find(".td-jml_08").text(jml_08);
            if(idx == 22){
                $(this).parents("tr").find(".inp-jml_08").show();
                $(this).parents("tr").find(".td-jml_08").hide();
                $(this).parents("tr").find(".inp-jml_08").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_08").hide();
                $(this).parents("tr").find(".td-jml_08").show();
            }
            //09
            $(this).parents("tr").find(".inp-vol_09").val(vol_09);
            $(this).parents("tr").find(".td-vol_09").text(vol_09);
            if(idx == 23){
                $(this).parents("tr").find(".inp-vol_09").show();
                $(this).parents("tr").find(".td-vol_09").hide();
                $(this).parents("tr").find(".inp-vol_09").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_09").hide();
                $(this).parents("tr").find(".td-vol_09").show();
            }

            $(this).parents("tr").find(".inp-jml_09").val(jml_09);
            $(this).parents("tr").find(".td-jml_09").text(jml_09);
            if(idx == 24){
                $(this).parents("tr").find(".inp-jml_09").show();
                $(this).parents("tr").find(".td-jml_09").hide();
                $(this).parents("tr").find(".inp-jml_09").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_09").hide();
                $(this).parents("tr").find(".td-jml_09").show();
            }
            //10
            $(this).parents("tr").find(".inp-vol_10").val(vol_10);
            $(this).parents("tr").find(".td-vol_10").text(vol_10);
            if(idx == 25){
                $(this).parents("tr").find(".inp-vol_10").show();
                $(this).parents("tr").find(".td-vol_10").hide();
                $(this).parents("tr").find(".inp-vol_10").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_10").hide();
                $(this).parents("tr").find(".td-vol_10").show();
            }

            $(this).parents("tr").find(".inp-jml_10").val(jml_10);
            $(this).parents("tr").find(".td-jml_10").text(jml_10);
            if(idx == 26){
                $(this).parents("tr").find(".inp-jml_10").show();
                $(this).parents("tr").find(".td-jml_10").hide();
                $(this).parents("tr").find(".inp-jml_10").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_10").hide();
                $(this).parents("tr").find(".td-jml_10").show();
            }
            //11
            $(this).parents("tr").find(".inp-vol_11").val(vol_11);
            $(this).parents("tr").find(".td-vol_11").text(vol_11);
            if(idx == 27){
                $(this).parents("tr").find(".inp-vol_11").show();
                $(this).parents("tr").find(".td-vol_11").hide();
                $(this).parents("tr").find(".inp-vol_11").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_11").hide();
                $(this).parents("tr").find(".td-vol_11").show();
            }

            $(this).parents("tr").find(".inp-jml_11").val(jml_11);
            $(this).parents("tr").find(".td-jml_11").text(jml_11);
            if(idx == 28){
                $(this).parents("tr").find(".inp-jml_11").show();
                $(this).parents("tr").find(".td-jml_11").hide();
                $(this).parents("tr").find(".inp-jml_11").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_11").hide();
                $(this).parents("tr").find(".td-jml_11").show();
            }
            //12
            $(this).parents("tr").find(".inp-vol_12").val(vol_12);
            $(this).parents("tr").find(".td-vol_12").text(vol_12);
            if(idx == 29){
                $(this).parents("tr").find(".inp-vol_12").show();
                $(this).parents("tr").find(".td-vol_12").hide();
                $(this).parents("tr").find(".inp-vol_12").focus();
            }else{
                $(this).parents("tr").find(".inp-vol_12").hide();
                $(this).parents("tr").find(".td-vol_12").show();
            }

            $(this).parents("tr").find(".inp-jml_12").val(jml_12);
            $(this).parents("tr").find(".td-jml_12").text(jml_12);
            if(idx == 30){
                $(this).parents("tr").find(".inp-jml_12").show();
                $(this).parents("tr").find(".td-jml_12").hide();
                $(this).parents("tr").find(".inp-jml_12").focus();
            }else{
                $(this).parents("tr").find(".inp-jml_12").hide();
                $(this).parents("tr").find(".td-jml_12").show();
            }
            

            $(this).parents("tr").find(".inp-total").val(total);
            $(this).parents("tr").find(".td-total").text(total);
            if(idx == 31){
                $(this).parents("tr").find(".inp-total").show();
                $(this).parents("tr").find(".td-total").hide();
                $(this).parents("tr").find(".inp-total").focus();
            }else{
                $(this).parents("tr").find(".inp-total").hide();
                $(this).parents("tr").find(".td-total").show();
            }


            hitungTotal();
        }
    }
});

$('.currency').inputmask("numeric", {
    radixPoint: ",",
    groupSeparator: ".",
    digits: 2,
    autoGroup: true,
    rightAlign: true,
    oncleared: function () { self.Value(''); }
});

$('#input-grid').on('click', '.hapus-item', function(){
    $(this).closest('tr').remove();
    no=1;
    $('.row-detdata').each(function(){
        var nom = $(this).closest('tr').find('.no-detdata');
        nom.html(no);
        no++;
    });
    hitungTotal();
    hitungTotalRow();
    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
});

    // IMPORT EXCEL
    $('#import-excel').click(function(e){
        $('.custom-file-input').val('');
        $('.custom-file-label').text('File upload');
        $('.pesan-upload .pesan-upload-judul').html('');
        $('.pesan-upload .pesan-upload-isi').html('')        
        $('.pesan-upload').hide();
        if(typeof M == 'undefined'){
            $('#modal-import').modal('show');
        }else{
            $('#modal-import').bootstrapMD('show');
        }
    });

    $("#form-import").validate({
        rules: {
            file: {required: true, accept: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"}
        },
        messages: {
            file: {required: 'Harus diisi!', accept: 'Hanya import dari file excel.'}
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            // for(var pair of formData.entries()) {
            //     console.log(pair[0]+ ', '+ pair[1]); 
            // }
            $('.pesan-upload').show();
            $('.pesan-upload-judul').html('Proses upload...');
            $('.pesan-upload-judul').removeClass('text-success');
            $('.pesan-upload-judul').removeClass('text-danger');
            $('.progress').removeClass('hidden');
            $('.progress-bar').attr('aria-valuenow', 0).css({
                                width: 0 + '%'
                            }).html(parseFloat(0 * 100).toFixed(2) + '%');
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //console.log(percentComplete);
                            $('.progress-bar').attr('aria-valuenow', percentComplete * 100).css({
                                width: percentComplete * 100 + '%'
                            }).html(parseFloat(percentComplete * 100).toFixed(2) + '%');
                            // if (percentComplete === 1) {
                            //     $('.progress').addClass('hidden');
                            // }
                        }
                    }, false);
                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //console.log(percentComplete);
                            $('.progress-bar').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ url('rkap-trans/aju-usul-import') }}",
                dataType: 'json',
                data: formData,
                // async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        if(result.data.validate){
                            $('#process-upload').removeClass('disabled');
                            $('#process-upload').prop('disabled', false);
                            $('#process-upload').removeClass('btn-light');
                            $('#process-upload').addClass('btn-primary');
                            $('.pesan-upload-judul').html('Berhasil upload!');
                            $('.pesan-upload-judul').removeClass('text-danger');
                            $('.pesan-upload-judul').addClass('text-success');
                            $('.pesan-upload-isi').html('File berhasil diupload!');
                        }else{
                            if(!$('#process-upload').hasClass('disabled')){
                                $('#process-upload').addClass('disabled');
                                $('#process-upload').prop('disabled', true);
                            }
                            var link = "{{ config('api.url').'rkap-trans/aju-usul-export?kode_lokasi='.Session::get('lokasi').'&nik_user='.Session::get('nikUser').'&nik='.Session::get('userLog').'&type=error_log' }}";
                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: result.data.message
                        });
                        $('.pesan-upload-judul').html('Gagal upload!');
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
                }
            });

        },
        errorPlacement: function (error, element) {
            $('#label-file').html(error);
            $('#label-file').addClass('error');
        }
    });

    
    $('.custom-file-input').change(function(){
        var fileName = $(this).val();
        //console.log(fileName);
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('/rkap-trans/aju-usul-tmp') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    if(result.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            input += "<tr class='row-detdata'>";
                            input += "<td class='no-detdata text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td><span class='td-rkm tdrkmke"+no+" tooltip-span'>"+line.kode_rkm+" - "+line.nama_rkm+"</span><input type='text' name='kode_rkm[]' class='form-control inp-rkm rkmke"+no+" hidden' value='"+line.kode_rkm+" - "+line.nama_rkm+"' required='' style='z-index: 1;position: relative;' id='rkmkode"+no+"'><a href='#' class='search-item search-rkm hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td class='text-left'><span class='td-deskripsi tddeskripsike"+no+" tooltip-span'>"+line.deskripsi+"</span><input type='text' name='deskripsi[]' class='form-control inp-deskripsi deskripsike"+no+" hidden'  value='"+line.deskripsi+"' required></td>";
                            input += "<td class='text-left'><span class='td-detail tddetailke"+no+" tooltip-span'>"+line.detail+"</span><input type='text' name='detail[]' class='form-control inp-detail detailke"+no+" hidden'  value='"+line.detail+"' required></td>";

                            //input += "<td class='text-left'><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+line.satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden'  value='"+line.satuan+"' required></td>";
                            input += "<td><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+line.satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden' value='"+line.satuan+"' required='' style='z-index: 1;position: relative;' id='satuan"+no+"'><a href='#' class='search-item search-satuan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";              //+" - "+line.nama_satuan //+" - "+line.nama_satuan
                            input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'>"+format_number(line.tarif)+"</span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='"+format_number(line.tarif)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_01 tdvol_01ke"+no+" tooltip-span'>"+format_number(line.vol_01)+"</span><input type='text' name='vol_01[]' class='form-control inp-vol_01 vol_01ke"+no+" hidden'  value='"+format_number(line.vol_01)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_01 tdjml_01ke"+no+" tooltip-span'>"+format_number(line.jml_01)+"</span><input type='text' name='jml_01[]' class='form-control inp-jml_01 jml_01ke"+no+" hidden'  value='"+format_number(line.jml_01)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_02 tdvol_02ke"+no+" tooltip-span'>"+format_number(line.vol_02)+"</span><input type='text' name='vol_02[]' class='form-control inp-vol_02 vol_02ke"+no+" hidden'  value='"+format_number(line.vol_02)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_02 tdjml_02ke"+no+" tooltip-span'>"+format_number(line.jml_02)+"</span><input type='text' name='jml_02[]' class='form-control inp-jml_02 jml_02ke"+no+" hidden'  value='"+format_number(line.jml_02)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_03 tdvol_03ke"+no+" tooltip-span'>"+format_number(line.vol_03)+"</span><input type='text' name='vol_03[]' class='form-control inp-vol_03 vol_03ke"+no+" hidden'  value='"+format_number(line.vol_03)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_03 tdjml_03ke"+no+" tooltip-span'>"+format_number(line.jml_03)+"</span><input type='text' name='jml_03[]' class='form-control inp-jml_03 jml_03ke"+no+" hidden'  value='"+format_number(line.jml_03)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_04 tdvol_04ke"+no+" tooltip-span'>"+format_number(line.vol_04)+"</span><input type='text' name='vol_04[]' class='form-control inp-vol_04 vol_04ke"+no+" hidden'  value='"+format_number(line.vol_04)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_04 tdjml_04ke"+no+" tooltip-span'>"+format_number(line.jml_04)+"</span><input type='text' name='jml_04[]' class='form-control inp-jml_04 jml_04ke"+no+" hidden'  value='"+format_number(line.jml_04)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_05 tdvol_05ke"+no+" tooltip-span'>"+format_number(line.vol_05)+"</span><input type='text' name='vol_05[]' class='form-control inp-vol_05 vol_05ke"+no+" hidden'  value='"+format_number(line.vol_05)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_05 tdjml_05ke"+no+" tooltip-span'>"+format_number(line.jml_05)+"</span><input type='text' name='jml_05[]' class='form-control inp-jml_05 jml_05ke"+no+" hidden'  value='"+format_number(line.jml_05)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_06 tdvol_06ke"+no+" tooltip-span'>"+format_number(line.vol_06)+"</span><input type='text' name='vol_06[]' class='form-control inp-vol_06 vol_06ke"+no+" hidden'  value='"+format_number(line.vol_06)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_06 tdjml_06ke"+no+" tooltip-span'>"+format_number(line.jml_06)+"</span><input type='text' name='jml_06[]' class='form-control inp-jml_06 jml_06ke"+no+" hidden'  value='"+format_number(line.jml_06)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_07 tdvol_07ke"+no+" tooltip-span'>"+format_number(line.vol_07)+"</span><input type='text' name='vol_07[]' class='form-control inp-vol_07 vol_07ke"+no+" hidden'  value='"+format_number(line.vol_07)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_07 tdjml_07ke"+no+" tooltip-span'>"+format_number(line.jml_07)+"</span><input type='text' name='jml_07[]' class='form-control inp-jml_07 jml_07ke"+no+" hidden'  value='"+format_number(line.jml_07)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_08 tdvol_08ke"+no+" tooltip-span'>"+format_number(line.vol_08)+"</span><input type='text' name='vol_08[]' class='form-control inp-vol_08 vol_08ke"+no+" hidden'  value='"+format_number(line.vol_08)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_08 tdjml_08ke"+no+" tooltip-span'>"+format_number(line.jml_08)+"</span><input type='text' name='jml_08[]' class='form-control inp-jml_08 jml_08ke"+no+" hidden'  value='"+format_number(line.jml_08)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_09 tdvol_09ke"+no+" tooltip-span'>"+format_number(line.vol_09)+"</span><input type='text' name='vol_09[]' class='form-control inp-vol_09 vol_09ke"+no+" hidden'  value='"+format_number(line.vol_09)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_09 tdjml_09ke"+no+" tooltip-span'>"+format_number(line.jml_09)+"</span><input type='text' name='jml_09[]' class='form-control inp-jml_09 jml_09ke"+no+" hidden'  value='"+format_number(line.jml_09)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_10 tdvol_10ke"+no+" tooltip-span'>"+format_number(line.vol_10)+"</span><input type='text' name='vol_10[]' class='form-control inp-vol_10 vol_10ke"+no+" hidden'  value='"+format_number(line.vol_10)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_10 tdjml_10ke"+no+" tooltip-span'>"+format_number(line.jml_10)+"</span><input type='text' name='jml_10[]' class='form-control inp-jml_10 jml_10ke"+no+" hidden'  value='"+format_number(line.jml_10)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_11 tdvol_11ke"+no+" tooltip-span'>"+format_number(line.vol_11)+"</span><input type='text' name='vol_11[]' class='form-control inp-vol_11 vol_11ke"+no+" hidden'  value='"+format_number(line.vol_11)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_11 tdjml_11ke"+no+" tooltip-span'>"+format_number(line.jml_11)+"</span><input type='text' name='jml_11[]' class='form-control inp-jml_11 jml_11ke"+no+" hidden'  value='"+format_number(line.jml_11)+"' required></td>";
                            input += "<td class='text-right'><span class='td-vol_12 tdvol_12ke"+no+" tooltip-span'>"+format_number(line.vol_12)+"</span><input type='text' name='vol_12[]' class='form-control inp-vol_12 vol_12ke"+no+" hidden'  value='"+format_number(line.vol_12)+"' required></td>";
                            input += "<td class='text-right'><span class='td-jml_12 tdjml_12ke"+no+" tooltip-span'>"+format_number(line.jml_12)+"</span><input type='text' name='jml_12[]' class='form-control inp-jml_12 jml_12ke"+no+" hidden'  value='"+format_number(line.jml_12)+"' required></td>";
                        
                            input += "<td class='text-right'><span class='td-total tdtotalke"+no+" tooltip-span'>"+format_number(line.total)+"</span><input type='text' name='total[]' class='form-control inp-total totalke"+no+" hidden'  value='"+format_number(line.total)+"' required></td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        no= 1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            

                            $('#rkmkode'+no).typeahead({
                                source:$dtkode_rkm,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    // console.log(item.id);
                                }
                            });
                            $('#satuan'+no).typeahead({
                                source:$dtsatuan,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    // console.log(item.id);
                                }
                            });


                            $('.tarifke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_01ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_01ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_02ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_02ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_03ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_03ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_04ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_04ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_05ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_05ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_06ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_06ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_07ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_07ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_08ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_08ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_09ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_09ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_10ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_10ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_11ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_11ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.vol_12ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });                        
                            $('.jml_12ke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            $('.totalke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                        
                    }
                    hitungTotal();
                    hitungTotalRow();
                    if(typeof M == 'undefined'){
                        $('#modal-import').modal('hide');
                    }else{
                        $('#modal-import').bootstrapMD('hide');
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                }else{
                    alert('error');
                }
            }
        });
    });

    function hapusDok(param){
        var no_bukti = param.no_bukti; 
        var nama_file= param.nama_file;
        var td_nama_file= param.td_nama_file;
        var action_dok= param.action_dok;
        var no_urut= param.no_urut;
        //console.log(param);
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rkap-trans/aju-dok') }}",
            dataType: 'json',
            data: {'no_bukti':no_bukti,'no_urut':no_urut},
            success:function(result){
                // console.log(result.data.message);
                if(result.data.status){
                    td_nama_file.closest('tr').remove();
                    no=1;
                    $('.row-dok').each(function(){
                        var nom = td_nama_file.closest('tr').find('.no-dok');
                        nom.html(no);
                        no++;
                    });
                    hitungTotalRowUpload(param.form);
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
                    msgDialog({
                        id:result.data.no_bukti,
                        type:'sukses',
                        title:'Sukses',
                        text:'Dokumen Pengajuan '+kode_jenis+' dengan no urut: '+no_urut+' berhasil dihapus'
                    });

                }else{
                    msgDialog({
                        id:result.data.no_bukti,
                        title:'Error',
                        back: false,
                        text:result.data.message
                    });
                }
            }
        });
    }

    $('#form-tambah > #input-dok').on('click', '.hapus-dok', function(){
        var no_bukti = $('#no_bukti').val();
        var nama_file = $(this).closest('tr').find('.inp-nama_file');
        var td_nama_file = $(this).closest('tr').find('.td-nama_file');
        var action_dok = $(this).closest('tr').find('.action-dok');
        var no_urut = $(this).closest('tr').find('.inp-no_urut').val();
        var ini = $(this);
        msgDialog({
            id: kode_jenis,
            text: 'Dokumen akan terhapus secara permanen dari server dan tidak dapat mengurungkan.<br> No urut : <b>'+no_urut+'</b>',
            param: {'no_bukti':no_bukti,'nama_file':nama_file,'td_nama_file':td_nama_file,'action_dok':action_dok, 'no_urut':no_urut,'ini':ini,'form':'form-tambah'},
            type:'hapusDok'
        });
       
    });

    $('#form-tambah > #input-dok').on('click', '.hapus-dok2', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        hitungTotalRowUpload('form-tambah');
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
    });

    function kirimWAEmail(id){
        
        $.ajax({
            type: 'POST',
            url: "{{ url('rkap-trans/aju-notifikasi') }}",
            dataType: 'json',
            data:{'no_pooling': id, 'modul': 'DURK'},
            async:false,
            success:function(res){
                console.log(res);
            }
        });
    }



// BUTTON EDIT
function editData(id){
    
    $.ajax({
        type: 'GET',
        url: "{{ url('/rkap-trans/aju-usul') }}/"+id,
        dataType: 'json',
        async:false,
        success:function(res){
            var result= res.data;
            //console.log(result);
            if(result.status){
                $('#id').val('edit');
                $('#method').val('post');
                $('#no_bukti').val(id);
                $('#no_bukti').attr('readonly', true);
                //$('#tahun')[0].selectize.setValue(result.data[0].tahun);
                $('#tanggal').val(result.data[0].tanggal);
                $('#keterangan').val(result.data[0].keterangan);
                $('#kode_pp').val(result.data[0].kode_pp);
                $('#kode_akun').val(result.data[0].kode_akun);
                $('#komentar').val(result.data[0].komentar);
                if(result.data_detail.length > 0){
                    var input = '';
                    var no=1;
                    for(var i=0;i<result.data_detail.length;i++){
                        var line =result.data_detail[i];
                        input += "<tr class='row-detdata'>";
                        input += "<td class='no-detdata text-center'>"+no+"</td>";
                        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                        input += "<td><span class='td-rkm tdrkmke"+no+" tooltip-span'>"+line.kode_rkm+" - "+line.nama_rkm+"</span><input type='text' name='kode_rkm[]' class='form-control inp-rkm rkmke"+no+" hidden' value='"+line.kode_rkm+" - "+line.nama_rkm+"' required='' style='z-index: 1;position: relative;' id='rkmkode"+no+"'><a href='#' class='search-item search-rkm hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                        input += "<td class='text-left'><span class='td-deskripsi tddeskripsike"+no+" tooltip-span'>"+line.deskripsi+"</span><input type='text' name='deskripsi[]' class='form-control inp-deskripsi deskripsike"+no+" hidden'  value='"+line.deskripsi+"' required></td>";
                        input += "<td class='text-left'><span class='td-detail tddetailke"+no+" tooltip-span'>"+line.detail+"</span><input type='text' name='detail[]' class='form-control inp-detail detailke"+no+" hidden'  value='"+line.detail+"' required></td>";

                        //input += "<td class='text-left'><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+line.satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden'  value='"+line.satuan+"' required></td>";
                        input += "<td><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+line.satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden' value='"+line.satuan+"' required='' style='z-index: 1;position: relative;' id='satuan"+no+"'><a href='#' class='search-item search-satuan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";              //+" - "+line.nama_satuan //+" - "+line.nama_satuan
                        input += "<td class='text-right'><span class='td-tarif tdtarifke"+no+" tooltip-span'>"+format_number(line.tarif)+"</span><input type='text' name='tarif[]' class='form-control inp-tarif tarifke"+no+" hidden'  value='"+format_number(line.tarif)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_01 tdvol_01ke"+no+" tooltip-span'>"+format_number(line.vol_01)+"</span><input type='text' name='vol_01[]' class='form-control inp-vol_01 vol_01ke"+no+" hidden'  value='"+format_number(line.vol_01)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_01 tdjml_01ke"+no+" tooltip-span'>"+format_number(line.jml_01)+"</span><input type='text' name='jml_01[]' class='form-control inp-jml_01 jml_01ke"+no+" hidden'  value='"+format_number(line.jml_01)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_02 tdvol_02ke"+no+" tooltip-span'>"+format_number(line.vol_02)+"</span><input type='text' name='vol_02[]' class='form-control inp-vol_02 vol_02ke"+no+" hidden'  value='"+format_number(line.vol_02)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_02 tdjml_02ke"+no+" tooltip-span'>"+format_number(line.jml_02)+"</span><input type='text' name='jml_02[]' class='form-control inp-jml_02 jml_02ke"+no+" hidden'  value='"+format_number(line.jml_02)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_03 tdvol_03ke"+no+" tooltip-span'>"+format_number(line.vol_03)+"</span><input type='text' name='vol_03[]' class='form-control inp-vol_03 vol_03ke"+no+" hidden'  value='"+format_number(line.vol_03)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_03 tdjml_03ke"+no+" tooltip-span'>"+format_number(line.jml_03)+"</span><input type='text' name='jml_03[]' class='form-control inp-jml_03 jml_03ke"+no+" hidden'  value='"+format_number(line.jml_03)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_04 tdvol_04ke"+no+" tooltip-span'>"+format_number(line.vol_04)+"</span><input type='text' name='vol_04[]' class='form-control inp-vol_04 vol_04ke"+no+" hidden'  value='"+format_number(line.vol_04)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_04 tdjml_04ke"+no+" tooltip-span'>"+format_number(line.jml_04)+"</span><input type='text' name='jml_04[]' class='form-control inp-jml_04 jml_04ke"+no+" hidden'  value='"+format_number(line.jml_04)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_05 tdvol_05ke"+no+" tooltip-span'>"+format_number(line.vol_05)+"</span><input type='text' name='vol_05[]' class='form-control inp-vol_05 vol_05ke"+no+" hidden'  value='"+format_number(line.vol_05)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_05 tdjml_05ke"+no+" tooltip-span'>"+format_number(line.jml_05)+"</span><input type='text' name='jml_05[]' class='form-control inp-jml_05 jml_05ke"+no+" hidden'  value='"+format_number(line.jml_05)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_06 tdvol_06ke"+no+" tooltip-span'>"+format_number(line.vol_06)+"</span><input type='text' name='vol_06[]' class='form-control inp-vol_06 vol_06ke"+no+" hidden'  value='"+format_number(line.vol_06)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_06 tdjml_06ke"+no+" tooltip-span'>"+format_number(line.jml_06)+"</span><input type='text' name='jml_06[]' class='form-control inp-jml_06 jml_06ke"+no+" hidden'  value='"+format_number(line.jml_06)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_07 tdvol_07ke"+no+" tooltip-span'>"+format_number(line.vol_07)+"</span><input type='text' name='vol_07[]' class='form-control inp-vol_07 vol_07ke"+no+" hidden'  value='"+format_number(line.vol_07)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_07 tdjml_07ke"+no+" tooltip-span'>"+format_number(line.jml_07)+"</span><input type='text' name='jml_07[]' class='form-control inp-jml_07 jml_07ke"+no+" hidden'  value='"+format_number(line.jml_07)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_08 tdvol_08ke"+no+" tooltip-span'>"+format_number(line.vol_08)+"</span><input type='text' name='vol_08[]' class='form-control inp-vol_08 vol_08ke"+no+" hidden'  value='"+format_number(line.vol_08)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_08 tdjml_08ke"+no+" tooltip-span'>"+format_number(line.jml_08)+"</span><input type='text' name='jml_08[]' class='form-control inp-jml_08 jml_08ke"+no+" hidden'  value='"+format_number(line.jml_08)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_09 tdvol_09ke"+no+" tooltip-span'>"+format_number(line.vol_09)+"</span><input type='text' name='vol_09[]' class='form-control inp-vol_09 vol_09ke"+no+" hidden'  value='"+format_number(line.vol_09)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_09 tdjml_09ke"+no+" tooltip-span'>"+format_number(line.jml_09)+"</span><input type='text' name='jml_09[]' class='form-control inp-jml_09 jml_09ke"+no+" hidden'  value='"+format_number(line.jml_09)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_10 tdvol_10ke"+no+" tooltip-span'>"+format_number(line.vol_10)+"</span><input type='text' name='vol_10[]' class='form-control inp-vol_10 vol_10ke"+no+" hidden'  value='"+format_number(line.vol_10)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_10 tdjml_10ke"+no+" tooltip-span'>"+format_number(line.jml_10)+"</span><input type='text' name='jml_10[]' class='form-control inp-jml_10 jml_10ke"+no+" hidden'  value='"+format_number(line.jml_10)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_11 tdvol_11ke"+no+" tooltip-span'>"+format_number(line.vol_11)+"</span><input type='text' name='vol_11[]' class='form-control inp-vol_11 vol_11ke"+no+" hidden'  value='"+format_number(line.vol_11)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_11 tdjml_11ke"+no+" tooltip-span'>"+format_number(line.jml_11)+"</span><input type='text' name='jml_11[]' class='form-control inp-jml_11 jml_11ke"+no+" hidden'  value='"+format_number(line.jml_11)+"' required></td>";
                        input += "<td class='text-right'><span class='td-vol_12 tdvol_12ke"+no+" tooltip-span'>"+format_number(line.vol_12)+"</span><input type='text' name='vol_12[]' class='form-control inp-vol_12 vol_12ke"+no+" hidden'  value='"+format_number(line.vol_12)+"' required></td>";
                        input += "<td class='text-right'><span class='td-jml_12 tdjml_12ke"+no+" tooltip-span'>"+format_number(line.jml_12)+"</span><input type='text' name='jml_12[]' class='form-control inp-jml_12 jml_12ke"+no+" hidden'  value='"+format_number(line.jml_12)+"' required></td>";
                        
                        input += "<td class='text-right'><span class='td-total tdtotalke"+no+" tooltip-span'>"+format_number(line.total)+"</span><input type='text' name='total[]' class='form-control inp-total totalke"+no+" hidden'  value='"+format_number(line.total)+"' required></td>";
                        input += "</tr>";
    
                        no++;
                    }
                    $('#input-grid tbody').html(input);
                    $('.tooltip-span').tooltip({
                        title: function(){
                            return $(this).text();
                        }
                    })
                    no= 1;
                    for(var i=0;i<result.data_detail.length;i++){
                        var line =result.data_detail[i];
                        

                        $('#rkmkode'+no).typeahead({
                            source:$dtkode_rkm,
                            displayText:function(item){
                                return item.id+' - '+item.name;
                            },
                            autoSelect:false,
                            changeInputOnSelect:false,
                            changeInputOnMove:false,
                            selectOnBlur:false,
                            afterSelect: function (item) {
                                // console.log(item.id);
                            }
                        });
                        $('#satuan'+no).typeahead({
                            source:$dtsatuan,
                            displayText:function(item){
                                return item.id+' - '+item.name;
                            },
                            autoSelect:false,
                            changeInputOnSelect:false,
                            changeInputOnMove:false,
                            selectOnBlur:false,
                            afterSelect: function (item) {
                                // console.log(item.id);
                            }
                        });


                        $('.tarifke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_01ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_01ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_02ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_02ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_03ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_03ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_04ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_04ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_05ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_05ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_06ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_06ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_07ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_07ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_08ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_08ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_09ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_09ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_10ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_10ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_11ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_11ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.vol_12ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });                        
                        $('.jml_12ke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        $('.totalke'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        no++;
                    }
                    
                }

                var input2 = "";
                    if(result.data_dokumen.length > 0){
                        var no=1;
                        for(var i=0;i<result.data_dokumen.length;i++){
                            var line =result.data_dokumen[i];
                            input2 += "<tr class='row-dok'>";
                            input2 += "<td class='no-dok text-center'>"+no+"</td>";
                            input2 += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='"+line.nama+"'></td>";
                            var dok = "{{ config('api.url').'rkap-auth/storage' }}/"+line.file_dok;
                            input2 += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>"+line.file_dok+"</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='"+line.file_dok+"' readonly></td>";
                            if(line.file_dok == "-" || line.file_dok == ""){
                                input2+=`
                                <td>
                                    <input type='file' name='file_dok[]' class='inp-file_dok'>
                                    <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
                                </td>`;
                            }else{
                                input2+=`
                                <td>
                                    <input type='file' name='file_dok[]'>
                                    <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
                                </td>`;
                            }
                            input2+=`
                                <td class='text-center action-dok'>`;
                                if(line.file_dok != "-"){
                                   var link =`<a class='download-dok' href='`+dok+`'target='_blank' title='Download'><i style='font-size:18px' class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok' href='#' title='Hapus Dokumen'><i class='simple-icon-trash' style='font-size:18px' ></i></a>`;
                                }else{
                                    var link =``;
                                }
                            input2+=link+"</td></tr>";
                            no++;
                        }
                    }
                    $('#form-tambah #input-dok tbody').html(input2);
               
                hitungTotal();
                hitungTotalRow();
                hitungTotalRowUpload("form-tambah");
                $('#saku-datatable').hide();
                $('#saku-form').show();
                $('#kode_form').val($form_aktif);
                showInfoField("kode_akun",result.data[0].kode_akun,result.data[0].nama_akun);
                showInfoField("kode_pp",result.data[0].kode_pp,result.data[0].nama_pp);
                setWidthFooterCardBody();
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
            }
        }
    });
}


$('#download-template').click(function(){
    var kode_lokasi = "{{ Session::get('lokasi') }}";
    var nik_user = "{{ Session::get('nikUser') }}";
    var nik = "{{ Session::get('userLog') }}";
    var link = "{{ config('api.url').'rkap-trans/aju-usul-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=template";
    window.open(link, '_blank'); 
});


// END BUTTON EDIT
