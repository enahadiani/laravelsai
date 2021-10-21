<style>
    .selectize-input.locked{
        background:#e9ecef;
    }
    .selectize-input.locked:focus{
        background:#e9ecef !important;
    }
    .selectize-input.locked:active{
        background:#e9ecef !important;
    }
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
                <div class="card-body form-header header-48" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px" class="mt-1">Tambah Data Pengajuan</h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="submit" id="btn-save" class="btn float-right btn-primary" style="margin-right:-30px"><i class="fa fa-save"></i> Submit</button>
                    <button type="submit" id="btn-draft" class="btn float-right btn-info mr-2"><i class="simple-icon-note"></i> Draft</button>
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
                                    <input type="text" readonly value="" name="tahun" class="form-control" id="tahun">
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
                    <div class="form-group col-md-2 ">                            
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="tot_agg_lalu" >Anggaran Tahun Lalu</label>
                                <input class="form-control currency" type="text" placeholder="Anggaran Tahun Lalu" readonly id="tot_agg_lalu" name="tot_agg_lalu" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">                            
                        <div class="row">
                            <div class="col-md-12 ">
                                <label for="growth" >Growth</label>
                                <input class="form-control currency" type="text" placeholder="Growth" readonly id="growth" name="growth" value="0">
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
                                  }
                                  #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover
                                  {
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
                                      padding:0px 4px !important;
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
                              </style>
                                <div style="">
                                    <table class="table table-bordered table-condensed display nowrap" id="input-grid" style="width:2820px !important;">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:20px !important">No</th>
                                            <th style="width:20px !important"></th>
                                            <th style="width:150px !important">Kode Rkm</th>
                                            <th style="width:150px !important">Kegiatan</th>
                                            <th style="width:150px !important">Detail</th>
                                            <th style="width:50px !important">Satuan</th>
                                            <th style="width:90px !important">Tarif</th>
                                            <th style="width:90px !important">Vol Jan</th>
                                            <th style="width:90px !important">Jml Jan</th>
                                            <th style="width:90px !important">Vol Feb</th>
                                            <th style="width:90px !important">Jml Feb</th>
                                            <th style="width:90px !important">Vol Mar</th>
                                            <th style="width:90px !important">Jml Mar</th>
                                            <th style="width:90px !important">Vol Apr</th>
                                            <th style="width:90px !important">Jml Apr</th>
                                            <th style="width:90px !important">Vol Mei</th>
                                            <th style="width:90px !important">Jml Mei</th>
                                            <th style="width:90px !important">Vol Jun</th>
                                            <th style="width:90px !important">Jml Jun</th>
                                            <th style="width:90px !important">Vol Jul</th>
                                            <th style="width:90px !important">Jml Jul</th>
                                            <th style="width:90px !important">Vol Agt</th>
                                            <th style="width:90px !important">Jml Agt</th>
                                            <th style="width:90px !important">Vol Sep</th>
                                            <th style="width:90px !important">Jml Sep</th>
                                            <th style="width:90px !important">Vol Okt</th>
                                            <th style="width:90px !important">Jml Okt</th>
                                            <th style="width:90px !important">Vol Nov</th>
                                            <th style="width:90px !important">Jml Nov</th>
                                            <th style="width:90px !important">Vol Des</th>
                                            <th style="width:90px !important">Jml Des</th>
                                            <th style="width:120px !important">Total</th>
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
                  <!-- <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                      <div style="vertical-align: middle;" class="col-md-7 text-right p-0">
                          <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                      </div>
                      <div style="text-align: right;" class="col-md-5 p-0 ">
                          <button type="submit" style="margin-top: 10px;" id="btn-draft" class="btn btn-info mr-2"><i class="simple-icon-note"></i> Draft</button>
                          <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                  </div> -->
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
@include('modal_search')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    showInfoField("kode_pp","{{ Session::get('kodePP') }}","{{ Session::get('namaPP') }}");
    function cekAksesForm(){
        // $('#grid-load').show();
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/cek-akses-form') }}",
            dataType: 'json',
            data: { modul:'INV',status_edit:$edit},
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

    function hapusDok(param){
        var no_bukti = param.no_bukti; 
        var nama_file= param.nama_file;
        var td_nama_file= param.td_nama_file;
        var action_dok= param.action_dok;
        var no_urut= param.no_urut;
        console.log(param);
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
    
    function delGrid(){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rkap-trans/aju-usul-hapus-tmp') }}",
            dataType: 'json',
            success:function(result){
                if(result.data.status){
                    gridReload();
                }else{
                    msgDialog({
                        id:'-',
                        title:'Error',
                        back: false,
                        text:result.data.message
                    });
                }
            }
        });
    }
    
    cekAksesForm();
    setHeightForm();
    if($edit != 1){
        delGrid();
    }
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
        // var now= new Date();
        // var y= now.getFullYear();
        $('#tahun').val("{{ Session::get('tahun') }}");
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

        var data = grid.data();
        for(var j=0; j < data.length; j++){
            var subtot=0;
            for(var i=0; i<12; i++)//total bulan
            {
                var vol= parseFloat(data[j]['vol_'+pad_left(i+1,2)]);
                var tarif= parseFloat(data[j]['tarif']);
                var jml =(vol*tarif);
				subtot+=jml;
                if(typeof tot_per_bln[i]!=='undefined')
                {
                    tot_per_bln[i].jumlah+=jml;
                }else
                {
                    tot_per_bln.push({
                        bln : pad_left(i+1,2), 
                        jumlah : jml 
                    });
                }
            }
            total+= +subtot;
        }

        $('#total_anggaran').val(total);
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

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $('.selectize').selectize();

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

    // $('#kode_akun').typeahead({
    //     source:$dtkode_akun,
    //     fitToElement:true,
    //     displayText:function(item){
    //         return item.id+' - '+item.name;
    //     },
    //     autoSelect:false,
    //     changeInputOnSelect:false,
    //     changeInputOnMove:false,
    //     selectOnBlur:false,
    //     afterSelect: function (item) {
    //         // console.log(item.id);
    //     }
    // });
    // END SUGGESTION

    // CBBL

    function getAkun(id,pp){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/rkap-trans/aju-usul-akun') }}",
            dataType: 'json',
            data:{kode_akun: kode,kode_pp:pp},
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
                                confirm: 'OK',
                                type:'custom',
                                showCustom:function(result){
                                    if (result.value) {
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
    $('#tahun,#keterangan,#kode_pp,#kode_akun,#keterangan').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tahun','keterangan','kode_pp','kode_akun','keterangan'];
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
                width : ["30%","70%"],
                parameter: {
                    kode_pp: $('#kode_pp').val()
                }
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
        $('#modal-search .modal-body').html('');
        $("#table-search").DataTable().destroy();
        showInpFilterBSheet(options);
    });

    $('#form-tambah').on('change', '#kode_akun', function(){
        var par = $(this).val();
        
        getAkun(par,$('#kode_pp').val());
    });

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
    });

    // GRID 

    var grid = $("#input-grid").DataTable({
        destroy: true,
        scrollY: 250,
        scrollX: true,
        paging:false,
        data: [],
        columns:[
            { data: 'no' },
            { data: 'aksi' },
            { data: 'kode_rkm' },
            { data: 'deskripsi' },
            { data: 'detail' },
            { data: 'satuan' },
            { data: 'tarif' },
            { data: 'vol_01' },
            { data: 'jml_01' },
            { data: 'vol_02' },
            { data: 'jml_02' },
            { data: 'vol_03' },
            { data: 'jml_03' },
            { data: 'vol_04' },
            { data: 'jml_04' },
            { data: 'vol_05' },
            { data: 'jml_05' },
            { data: 'vol_06' },
            { data: 'jml_06' },
            { data: 'vol_07' },
            { data: 'jml_07' },
            { data: 'vol_08' },
            { data: 'jml_08' },
            { data: 'vol_09' },
            { data: 'jml_09' },
            { data: 'vol_10' },
            { data: 'jml_10' },
            { data: 'vol_11' },
            { data: 'jml_11' },
            { data: 'vol_12' },
            { data: 'jml_12' },
            { data: 'total' }
        ],
        columnDefs: [
            {
                "targets": 1,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a class='hapus-item' style='font-size:14px !important' href='#'><i class='simple-icon-trash'></i></a>&nbsp;<a class='edit-item' style='font-size:14px !important' href='#'><i class='simple-icon-pencil'></i></a>&nbsp;";
                }
            },
            {
                "targets": 2,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return row.kode_rkm+'-'+row.nama_rkm;
                }
            },
            {   'targets': [6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            }, 
        ],
        ordering: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>'
    });

    function addRow(edit = false, data = null){
        if(!edit){
            var judul = 'Tambah Data Detail';
            var id = '';
            var method = 'post';
        }else{
            var judul = 'Edit Data Detail';
            var id = data.no;
            var method = 'put';
        }
        var html = `
        <form id='form-detail' class="tooltip-label-right" novalidate> 
            <div class="detail-header row" style="display:block;height:59px;padding: 0 1.75rem">
                <h6 style="position: absolute;" id="detail-judul" class="col-md-6 mt-1">`+judul+`</h6>
                <span id="detail-id" style="display:none">`+id+`</span> 
                <button type="submit" id="btn-save-detail" class="btn btn-primary col-md-2 float-right"><i class="fa fa-save"></i> Simpan</button>
                <div class="form-group col-md-3 col-12 float-right text-right">
                    <label for="jml_02" style="">Total</label>
                    <p id="total_detail" class="mb-0" style="font-weight: bold;">0</p>
                </div>
            </div>
            <div class='separator'></div>
            <div class='detail-body' style='padding: 0 1.75rem;height: calc(80vh - 56px);position:sticky'>
                <input type="hidden" class="form-control" readonly id="method_detail" name="_method" value="`+method+`">
                <div class='form-row mt-3'>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="kode_rkm">RKM</label>
                        <div class="input-group">
                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                <span class="input-group-text info-code_kode_rkm" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                            </div>
                            <input type="text" class="form-control inp-label-kode_rkm" id="kode_rkm" autocomplete="off" name="kode_rkm" data-input="cbbl" value="" title="" required readonly>
                            <span class="info-name_kode_rkm hidden">
                                <span></span> 
                            </span>
                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                            <i class="simple-icon-magnifier search-item2" id="search_kode_rkm"></i>
                        </div>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-12 col-12'>
                        <label for="kegiatan">Kegiatan</label>
                        <textarea class="form-control" rows="1" id="kegiatan" name="kegiatan" required></textarea>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-12 col-12'>
                        <label for="detail">Detail</label>
                        <textarea class="form-control" rows="1" id="detail" name="detail" required></textarea>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-3 col-12'>
                        <label for="satuan">Satuan</label>
                        <div class="input-group">
                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                <span class="input-group-text info-code_satuan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                            </div>
                            <input type="text" class="form-control inp-label-satuan" id="satuan" autocomplete="off" name="satuan" data-input="cbbl" value="" title="" required readonly>
                            <span class="info-name_satuan hidden">
                                <span></span> 
                            </span>
                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                            <i class="simple-icon-magnifier search-item2" id="search_satuan"></i>
                        </div>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="tarif">Tarif</label>
                        <input class="form-control currency" id="tarif" name="tarif" required>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_01">Volume Januari</label>
                        <input class="form-control currency" id="vol_01" name="vol_01" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_01">Jumlah Januari</label>
                        <input class="form-control currency" readonly id="jml_01" name="jml_01" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_02">Volume Februari</label>
                        <input class="form-control currency" id="vol_02" name="vol_02" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_02">Jumlah Februari</label>
                        <input class="form-control currency" readonly id="jml_02" name="jml_02" required>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_03">Volume Maret</label>
                        <input class="form-control currency" id="vol_03" name="vol_03" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_03">Jumlah Maret</label>
                        <input class="form-control currency" readonly id="jml_03" name="jml_03" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_04">Volume April</label>
                        <input class="form-control currency" id="vol_04" name="vol_04" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_04">Jumlah April</label>
                        <input class="form-control currency" readonly id="jml_04" name="jml_04" required>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_05">Volume Mei</label>
                        <input class="form-control currency" id="vol_05" name="vol_05" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_05">Jumlah Mei</label>
                        <input class="form-control currency" readonly id="jml_05" name="jml_05" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_06">Volume Juni</label>
                        <input class="form-control currency" id="vol_06" name="vol_06" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_06">Jumlah Juni</label>
                        <input class="form-control currency" readonly id="jml_06" name="jml_06" required>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_07">Volume Juli</label>
                        <input class="form-control currency" id="vol_07" name="vol_07" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_07">Jumlah Juli</label>
                        <input class="form-control currency" readonly id="jml_07" name="jml_07" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_08">Volume Agustus</label>
                        <input class="form-control currency" id="vol_08" name="vol_08" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_08">Jumlah Agustus</label>
                        <input class="form-control currency" readonly id="jml_08" name="jml_08" required>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_09">Volume September</label>
                        <input class="form-control currency" id="vol_09" name="vol_09" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_09">Jumlah September</label>
                        <input class="form-control currency" readonly id="jml_09" name="jml_09" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_10">Volume Oktober</label>
                        <input class="form-control currency" id="vol_10" name="vol_10" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_10">Jumlah Oktober</label>
                        <input class="form-control currency" readonly id="jml_10" name="jml_10" required>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_11">Volume November</label>
                        <input class="form-control currency" id="vol_11" name="vol_11" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_11">Jumlah November</label>
                        <input class="form-control currency" readonly id="jml_11" name="jml_11" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="vol_12">Volume Desember</label>
                        <input class="form-control currency" id="vol_12" name="vol_12" required>
                    </div>
                    <div class='form-group col-md-3 col-12'>
                        <label for="jml_12">Jumlah Desember</label>
                        <input class="form-control currency" readonly id="jml_12" name="jml_12" required>
                    </div>
                </div>
                <div class='form-row' style='height:50px'></div>
            </div>
        </form> 
        `;

        $('#content-bottom-sheet').html(html);

        if(data != null){
            $('#kode_rkm').val(data.kode_rkm);
            $('#kegiatan').val(data.deskripsi);
            $('#detail').val(data.detail);
            $('#satuan').val(data.satuan);
            $('#tarif').val(data.tarif);
            $('#vol_01').val(data.vol_01);
            $('#jml_01').val(data.jml_01);
            $('#vol_02').val(data.vol_02);
            $('#jml_02').val(data.jml_02);
            $('#vol_03').val(data.vol_03);
            $('#jml_03').val(data.jml_03);
            $('#vol_04').val(data.vol_04);
            $('#jml_04').val(data.jml_04);
            $('#vol_05').val(data.vol_05);
            $('#jml_05').val(data.jml_05);
            $('#vol_06').val(data.vol_06);
            $('#jml_06').val(data.jml_06);
            $('#vol_07').val(data.vol_07);
            $('#jml_07').val(data.jml_07);
            $('#vol_08').val(data.vol_08);
            $('#jml_08').val(data.jml_08);
            $('#vol_09').val(data.vol_09);
            $('#jml_09').val(data.jml_09);
            $('#vol_10').val(data.vol_10);
            $('#jml_10').val(data.jml_10);
            $('#vol_11').val(data.vol_11);
            $('#jml_11').val(data.jml_11);
            $('#vol_12').val(data.vol_12);
            $('#jml_12').val(data.jml_12);
            $('#total_detail').html(format_number(data.total));
            showInfoField("kode_rkm",data.kode_rkm,data.nama_rkm);
        }

        var scroll = document.querySelector('.detail-body');
        var psscroll = new PerfectScrollbar(scroll);

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });

        // HANDLER untuk enter dan tab
        $('#kode_rkm, #kegiatan, #detail, #satuan, #tarif, #vol_01, #jml_01, #vol_02, #jml_02, #vol_03, #jml_03, #vol_04, #jml_04, #vol_05, #jml_05, #vol_06, #jml_06, #vol_07, #jml_07, #vol_08, #jml_08, #vol_09, #jml_09, #vol_10, #jml_10, #vol_11, #jml_11, #vol_12, #jml_12, #total').keydown(function(e){
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['kode_rkm', 'kegiatan', 'detail', 'satuan', 'tarif', 'vol_01', 'jml_01', 'vol_02', 'jml_02', 'vol_03', 'jml_03', 'vol_04', 'jml_04', 'vol_05', 'jml_05', 'vol_06', 'jml_06', 'vol_07', 'jml_07', 'vol_08', 'jml_08', 'vol_09', 'jml_09', 'vol_10', 'jml_10', 'vol_11', 'jml_11', 'vol_12', 'jml_12', 'total'];
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

        $('#form-detail').on('click', '.search-item2', function(){
            var id = $(this).closest('div').find('input').attr('name');
            if(id==="kode_rkm")
            {
                var options = {
                    id : id,
                    header : ['Kode RKM', 'Nama'],
                    url : "{{ url('rkap-trans/aju-usul-rkm') }}",
                    columns : [
                        { data: 'kode_rkm' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar RKM",
                    pilih : "kode_rkm",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    parameter : {
                        kode_pp: $('#kode_pp').val()
                    }
                }
            }
            else if(id==='satuan')
            {
                var options = {
                    id : id,
                    header : ['Satuan', 'Nama'],
                    url : "{{ url('rkap-trans/aju-usul-satuan') }}",
                    columns : [
                        { data: 'satuan' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Satuan",
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

            showInpFilter(options);
        });

        function hitungTotalDet(){
            var total=0;
            for(i=0;i<12;i++){
                var jml = toNilai($('#jml_'+pad_left(i+1,2)).val());
                total+=+jml;
            }
            $('#total_detail').html(format_number(total));
        }

        function hitungJumlah(bln){  
            var tarif=toNilai($('#tarif').val());
            var vol=toNilai($('#vol_'+bln).val());
            var jml=tarif*vol;
            $('#jml_'+bln).val(format_number(jml));
            hitungTotalDet();
        }

        function onChangeTarif()
        {
            for(i=0;i<12;i++)//total bulan
            {
                hitungJumlah(pad_left(i+1,2));
            }
        }

        $('#form-detail').on('change keyup keypress','#tarif',function(e){
            onChangeTarif();
        });

        $('#form-detail').on('change keyup keypress','#vol_01,#vol_02,#vol_03,#vol_04,#vol_05,#vol_06,#vol_07,#vol_08,#vol_09,#vol_10,#vol_11,#vol_12',function(e){
            var kode = $(this).attr('id').substr(-2);
            hitungJumlah(kode);
        });

        $("#form-detail").validate({
            rules: {
                kode_rkm  : {
                    required: true 
                },
                kegiatan  : {
                    required: true 
                },
                detail  : {
                    required: true 
                },
                satuan  : {
                    required: true 
                },
                tarif : {
                    required: true 
                },
                vol_01 : {
                    required: true 
                },
                jml_01 : {
                    required: true 
                },
                vol_02 : {
                    required: true 
                },
                jml_02 : {
                    required: true 
                },
                vol_03 : {
                    required: true 
                },
                jml_03 : {
                    required: true 
                },
                vol_04 : {
                    required: true 
                },
                jml_04 : {
                    required: true 
                },
                vol_05 : {
                    required: true 
                },
                jml_05 : {
                    required: true 
                },
                vol_06 : {
                    required: true 
                },
                jml_06 : {
                    required: true 
                },
                vol_07 : {
                    required: true 
                },
                jml_07 : {
                    required: true 
                },
                vol_08 : {
                    required: true 
                },
                jml_08 : {
                    required: true 
                },
                vol_09 : {
                    required: true 
                },
                jml_09 : {
                    required: true 
                },
                vol_10 : {
                    required: true 
                },
                jml_10 : {
                    required: true 
                },
                vol_11 : {
                    required: true 
                },
                jml_11 : {
                    required: true 
                },
                vol_12 : {
                    required: true 
                },
                jml_12 : {
                    required: true 
                }
            },
            messages: {
                file: {required: 'Harus diisi!', accept: 'Hanya import dari file excel.'}
            },
            errorElement: "label",
            submitHandler: function (form) {

                var formData = new FormData(form);
                if(data != null){
                    formData.append('id',data.no);
                    var url = "{{ url('rkap-trans/aju-usul-detail-edit') }}";
                }else{
                    var url = "{{ url('rkap-trans/aju-usul-detail') }}";
                }
                formData.append('total',$('#total_detail').html());
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: formData,
                    // async:false,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    success:function(result){
                        if(result.data.status){
                            gridReload();
                            msgDialog({
                                id: '-',
                                type: 'warning',
                                title: 'Tersimpan',
                                text: result.data.message
                            });
                            $('.c-bottom-sheet').removeClass('active');
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


        $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});
        $('#trigger-bottom-sheet').trigger("click");

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

    function pad_left(number, length) {
        var my_string = '' + number;
        while (my_string.length < length) {
            my_string = '0' + my_string;
        }

        return my_string;
    }

    $('#form-tambah').on('click', '.add-row', function(e){
        e.preventDefault();
        addRow(false);
    });

    $('#input-grid').on('click', '.edit-item', function(e){
        e.preventDefault();
        var data = grid.row($(this).parents('tr')).data();
        addRow(true,data);
    });

    $('#input-grid').on('click', '.hapus-item', function(e){
        e.preventDefault();
        var data = grid.row($(this).parents('tr')).data();
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rkap-trans/aju-usul-detail') }}",
            dataType: 'json',
            data: {'id':data.no},
            success:function(result){
                // console.log(result.data.message);
                if(result.data.status){
                    gridReload();
                    msgDialog({
                        id:'-',
                        type:'sukses',
                        title:'Sukses',
                        text:result.data.message
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
    });

    $('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
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
    });
        
    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('/rkap-trans/aju-usul-tmp') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                grid.clear().draw();
                var result= res.data;
                if(result.status){
                    if(result.data_detail.length > 0){
                        grid.rows.add(result.data_detail).draw(false);
                        grid.columns.adjust().draw();
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
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
                   
                    setTimeout(() => {
                        grid.clear().draw();
                        if(result.data_detail.length > 0){
                            grid.rows.add(result.data_detail).draw(false);
                            grid.columns.adjust().draw();
                            $('.tooltip-span').tooltip({
                                title: function(){
                                    return $(this).text();
                                }
                            });
                        }
                        hitungTotal();
                        hitungTotalRow();
                    }, 1000);

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

    function gridReload(){
        console.log('exec grid load');
        $.ajax({
            type: 'GET',
            url: "{{ url('/rkap-trans/aju-usul-tmp') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                grid.clear().draw();
                if(result.status){
                    if(result.data_detail.length > 0){
                        grid.rows.add(result.data_detail).draw(false);
                        grid.columns.adjust().draw();
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                    }
                    hitungTotal();
                    hitungTotalRow();
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
</script>
