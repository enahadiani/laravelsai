    <link rel="stylesheet" href="{{ asset('trans-new.css?version=_').time() }}" />
    <link rel="stylesheet" href="{{ asset('form-new.css?version=_').time() }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Pengajuan RRA" tambah="" :thead="array('No Bukti','Kegiatan','Periode','Jenis','Unit Kerja','Nilai','Tgl Input','Aksi')" :thwidth="array(10,20,10,10,15,10,0,10)" :thclass="array('','','','','','','','text-center')" />
    <!-- END LIST DATA -->
    <style>
        #tanggal-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }

        #input-terima tbody td, #input-beri tbody td
        {
            overflow:hidden;
        }

        #input-beri td:nth-child(9), #input-terima td:nth-child(9)
        {
            overflow:unset !important;
        }
    </style>
    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 id="judul-form" style="position:absolute;top:15px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="submit" id="btn-save" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                <input type="hidden" name="kode_form" id="kode_form">
                                <input type="hidden" name="jenis_upload" id="jenis_upload">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="tanggal">Tanggal</label>
                                        <span id="tanggal-dp"></span>
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="no_bukti">No Bukti</label>
                                        <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                        <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;cursor:pointer" class="simple-icon-refresh" id="generate-nobukti"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_juskeb">No Juskeb</label>
                                        <input type="text" class="form-control" id="no_juskeb" name="no_juskeb" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="jenis_rra">Jenis RRA</label>
                                        <div class="input-group readonly">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_jenis_rra" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-jenis_rra" id="jenis_rra" name="jenis_rra" value="" title="">
                                            <span class="info-name_jenis_rra hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_jenis_rra"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12">
                                        <label for="no_dokumen">Dokumen</label>
                                        <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp_juskeb" >Unit Kerja</label>
                                        <input class="form-control " type="text"  readonly id="kode_pp_juskeb" name="kode_pp_juskeb">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_terima" >Nilai Penerima</label>
                                        <input class="form-control currency" type="text" placeholder="Total Terima" readonly id="total_terima" name="total_terima" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input class="form-control" id="deskripsi" name="deskripsi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nilai_juskeb" >Nilai Juskeb</label>
                                        <input class="form-control currency" type="text" readonly id="nilai_juskeb" name="nilai_juskeb" value="0">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_beri" >Total Pemberi</label>
                                        <input class="form-control currency" type="text" placeholder="Total Pemberi" readonly id="total_beri" name="total_beri" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-lokasi" role="tab" aria-selected="true"><span class="hidden-xs-down">Lokasi</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-terima" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Penerima</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-beri" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pemberi</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Berkas Bukti</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-approval" role="tab" aria-selected="true"><span class="hidden-xs-down">Approval</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-lokasi" role="tabpanel">
                                <div class="form-row mt-3">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="lokasi_terima">Lokasi Penerima</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_lokasi_terima" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-lokasi_terima" id="lokasi_terima" name="lokasi_terima" value="" title="">
                                                    <span class="info-name_lokasi_terima hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_lokasi_terima"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label for="lokasi_beri">Lokasi Pemberi</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_lokasi_beri" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-lokasi_beri" id="lokasi_beri" name="lokasi_beri" value="" title="">
                                                    <span class="info-name_lokasi_beri hidden">
                                                        <span></span> 
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_lokasi_beri"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-terima" role="tabpanel">
                                <div class='col-md-12 nav-control nav-control-terima' style="padding: 0px 5px;">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                    {{-- <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px !important'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Data<i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#"  id="download-template" >Download Template</a>
                                            <a class="dropdown-item" href="#" id="import-excel-terima" >Upload</a>
                                        </div>
                                    </div> --}}
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-terima" style="width:1125px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:15px">No</th>
                                            <th style="width:20px"></th>
                                            <th style="width:80px">Kode MTA</th>
                                            <th style="width:250px">Nama MTA</th>
                                            <th style="width:80px">Kode PP</th>
                                            <th style="width:200px">Nama PP</th>
                                            <th style="width:80px">Kode DRK</th>
                                            <th style="width:250px">Nama DRK</th>
                                            <th style="width:100px">TW</th>
                                            <th style="width:100px">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row-terima btn btn-light2 btn-block btn-sm" style="margin-bottom:100px"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-beri" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                    {{-- <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px !important'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Data<i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#"  id="download-template2" >Download Template</a>
                                            <a class="dropdown-item" href="#" id="import-excel-beri" >Upload</a>
                                        </div>
                                    </div> --}}
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-beri" style="width:1125px;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:15px">No</th>
                                            <th style="width:20px"></th>
                                            <th style="width:80px">Kode MTA</th>
                                            <th style="width:200px">Nama MTA</th>
                                            <th style="width:80px">Kode PP</th>
                                            <th style="width:200px">Nama PP</th>
                                            <th style="width:80px">Kode DRK</th>
                                            <th style="width:200px">Nama DRK</th>
                                            <th style="width:100px">TW</th>
                                            <th style="width:100px">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm" style="margin-bottom:100px"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-dok" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                                </div>
                                <div class='col-md-12' style='margin:0px; padding:0px;'>
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
                            <div class="tab-pane" id="data-approval" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a type="button" href="#" id="load-app" data-toggle="tooltip" title="Load Approval" style=""><i class="simple-icon-refresh" style="font-size: 18px !important;position: relative;top: 5px;"></i> <span style="font-size:12.8px;top: 3px !important;position: relative;">Tampil Approval</span></a>
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-ap" ></span></a>
                                </div>
                                <div class='col-md-12 table-responsive' style='margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-flow" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:20px">No</th>
                                            <th style="width:80px">Kode Role</th>
                                            <th style="width:80px">Kode Jab</th>
                                            <th style="width:80px">NIK</th>
                                            <th style="width:200px">Nama</th>
                                            <th style="width:150px">Email</th>
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
    <!-- FORM INPUT  -->

    {{-- PRINT PREVIEW --}}
    <div id="saku-print" class="row" style="display: none;">
        <div class="col-12">
            <div class="card" style="height: 100%;">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:42.8px">
                    <button type="button" id="btn-back" aria-label="Kembali" class="btn btn-back" style="top: 28px !important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="btn btn-primary ml-2 mr-4" id="btn-cetak" style="float:right;"><i class="fa fa-print"></i> Print</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body" id="print-content">

                </div>
            </div>
        </div>
    </div>
    {{-- END PRINT PREVIEW --}}

    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    @include('modal_upload')
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>

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

    function hitungTotalRowBeri(){
        var total_row = $('#input-beri tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotalRowTerima(){
        var total_row = $('#input-terima tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotalRowUpload(form){
        var total_row = $('#'+form+' #input-dok tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }

    function hitungTotalBeri(){
        var total = 0;
        $('.row-beri').each(function(){
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            total += +toNilai(nilai);
        });
        $('#total_beri').val(total);
    }

    function hitungTotalTerima(){
        var total = 0;
        $('.row-terima').each(function(){
            var nilai = $(this).closest('tr').find('.inp-nilai_terima').val();
            total += +toNilai(nilai);
        });
        $('#total_terima').val(total);
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

    function resizeNameField(kode){
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
    }

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
    
    $("#tanggal").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container:'span#tanggal-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });
    // END 

    // SUGGESTION    
    var $dtkode_pp = [];
    var $dtkode_akun = [];
    var $dtnik_periksa = [];

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
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                } else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Failed',
                        text: JSON.stringify(result.message)
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/sukka-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getLokasi(id){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/aju-rra-lokasi') }}",
            dataType: 'json',
            data:{kode_lokasi: id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_lokasi',result.daftar[0].kode_lokasi,result.daftar[0].nama);
                    }else{
                        $('#kode_lokasi').attr('readonly',false);
                        $('#kode_lokasi').css('border-left','1px solid #d7d7d7');
                        $('#kode_lokasi').val('');
                        $('#kode_lokasi').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
            }
        });
    }

    function activaTab(tab){
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    }

    function getAppFlow(kode_jenis,nilai){
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/aju-rra-flow') }}",
            dataType: 'json',
            data: {kode_jenis: kode_jenis, nilai: nilai},
            async:false,
            success:function(result){    
                var html ='';
                $('#input-flow tbody').html(html)
                activaTab('data-approval');
                if(result.status){
                    if(typeof result.daftar == 'object' && result.daftar.length > 0){
                        var no=1;
                        for(i=0; i < result.daftar.length; i++){
                            var row = result.daftar[i];
                            html+=`
                            <tr>
                                <td>${no}</td>    
                                <td>${row.kode_role}</td>    
                                <td>${row.kode_jab}</td>    
                                <td>${row.nik}</td>    
                                <td>${row.nama}</td>    
                                <td>${row.email}</td>    
                            </tr>
                            `;
                            no++;
                        }
                        $('#input-flow tbody').html(html);
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
            }
        });
    }

    function generateNoBukti(tanggal){
        $.ajax({
            type: 'GET',
            url: "{{ url('sukka-trans/aju-rra-nobukti') }}",
            dataType: 'json',
            async:false,
            data:{tanggal: tanggal},
            success:function(result){   
                $('#no_bukti').val('');
                if(result.status){
                    $('#no_bukti').val(result.no_bukti);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: 'Generate ID Gagal'
                    });
                }
            }
        });
    }

    $('#generate-nobukti').click(function(e){
        e.preventDefault();
        var tanggal = $('#tanggal').val();
        if(tanggal == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Tanggal wajib diisi'
            });
            return false;
        }
        generateNoBukti(tanggal);
    });

    $('#tanggal').change(function(e){
        // e.preventDefault();
        var tanggal = $('#tanggal').val();
        if(tanggal == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Tanggal wajib diisi'
            });
            return false;
        }
        generateNoBukti(tanggal);
    })

    // LIST DATA
    var action_html = "<a href='#' title='Pilih' id='btn-edit'><i class='simple-icon-check' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp;";
    var action_html2 = "<a href='#' title='Preview' id='btn-preview'><i class='simple-icon-doc' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('sukka-trans/aju-rra-juskeb') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {   'targets': 5, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {
                "targets": [6],
                "visible": false,
                "searchable": false
            },
            {
                "targets" : 7,
                "data": null,
                'className' : 'text-center',
                "render": function ( data, type, row, meta ) {
                    return action_html;
                }
            }
        ],
        [
            { data: 'no_bukti' },
            { data: 'kegiatan' },
            { data: 'periode' },
            { data: 'jenis' },
            { data: 'kode_pp' },
            { data: 'nilai' },
            { data: 'tanggal' }
        ],
        "{{ url('sukka-auth/sesi-habis') }}",
        [[5 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({ trigger: "focus" });
    // END LIST DATA

    // CBBL
    function getPP(id,target1,target2,jenis,kode_lokasi,table){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/aju-rra-pp') }}",
            dataType: 'json',
            data:{kode_pp: id,kode_lokasi:kode_lokasi},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);

                        }else{
                            $("#"+table+" td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            var kode2 = table.replace('input-','');
                            if(kode2 == 'terima'){
                                $('.'+target1).closest('tr').find('.search-pp_terima').hide();
                            }else{
                                $('.'+target1).closest('tr').find('.search-pp').hide();
                            }
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Inputan tidak valid',
                            text: 'Kode PP tidak valid'
                        });
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
                else{
                    $('.'+target1).val('');
                    $('.'+target2).val('');
                    $('.td'+target2).text('');
                    $('.'+target1).focus();
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Inputan tidak valid',
                        text: 'Kode PP tidak valid'
                    });
                }
            }
        });
    }

    function getAkun(id,target1,target2,target3,jenis,table){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('sukka-trans/aju-rra-akun') }}",
            dataType: 'json',
            data:{kode_akun: id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            // $('.'+target3)[0].selectize.focus();
                            $('.td'+target3).text('D');
                        }else{

                            $("#"+table+" td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            var kode2 = table.replace('input-','');
                            if(kode2 == 'terima'){
                                $('.'+target1).closest('tr').find('.search-akun_terima').hide();
                            }else{
                                $('.'+target1).closest('tr').find('.search-akun').hide();
                            }
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                            $('.td'+target3).text('D');
                        }
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Inputan tidak valid',
                            text: 'Kode MTA tidak valid'
                        });
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
                else{
                    $('.'+target1).val('');
                    $('.'+target2).val('');
                    $('.td'+target2).text('');
                    $('.'+target1).focus();
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Inputan tidak valid',
                        text: 'Kode MTA tidak valid'
                    });
                }
            }
        });
    }

    function getDRK(id,target1,target2,target3,jenis,kode_akun,kode_pp,periode,kode_lokasi,table){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/aju-rra-drk') }}",
            dataType: 'json',
            data:{kode_drk: id,kode_akun:kode_akun,kode_pp:kode_pp,periode:periode,kode_lokasi:kode_lokasi},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(result.daftar[0].kode_drk);
                            $('.td'+target1).text(result.daftar[0].kode_drk);

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            // $('.'+target3)[0].selectize.focus();
                            $('.td'+target3).text('D');
                        }else{

                            $("#"+table+" td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-drk_terima').hide();
                            $('.'+target1).val(result.daftar[0].kode_drk);
                            $('.td'+target1).text(result.daftar[0].kode_drk);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }else{
                        
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Inputan tidak valid',
                            text: 'Kode DRK tidak valid'
                        });
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
                else{
                    $('.'+target1).val('');
                    $('.'+target2).val('');
                    $('.td'+target2).text('');
                    $('.'+target1).focus();
                    
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Inputan tidak valid',
                        text: 'Kode DRK tidak valid'
                    });
                }
            }
        });
    }

    function getDRKPemberi(id,target1,target2,target3,jenis,kode_akun,kode_pp,periode,kode_lokasi,table){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/aju-rra-drk-beri') }}",
            dataType: 'json',
            data:{kode_drk: id,kode_akun:kode_akun,kode_pp:kode_pp,periode:periode,kode_lokasi:kode_lokasi},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(result.daftar[0].kode_drk);
                            $('.td'+target1).text(result.daftar[0].kode_drk);

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            // $('.'+target3)[0].selectize.focus();
                            $('.td'+target3).text('D');
                        }else{

                            $("#"+table+" td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-drk').hide();
                            $('.'+target1).val(result.daftar[0].kode_drk);
                            $('.td'+target1).text(result.daftar[0].kode_drk);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Inputan tidak valid',
                            text: 'Kode DRK tidak valid'
                        });
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
                else{
                    $('.'+target1).val('');
                    $('.'+target2).val('');
                    $('.td'+target2).text('');
                    $('.'+target1).focus();
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Inputan tidak valid',
                        text: 'Kode DRK tidak valid'
                    });
                }
            }
        });
    }

    // END CBBL

    // BUTTON EDIT
    function editData(id){
        
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/aju-rra') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#input-beri tbody').html('');
                    $('#input-terima tbody').html('');
                    $('#input-dok tbody').html('');
                    $('#id').val('edit');
                    $('#method').val('post');
                    var tanggal = $('#tanggal').val();
                    generateNoBukti(tanggal);
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#deskripsi').val(result.data[0].keterangan);
                    $('#no_juskeb').val(result.data[0].no_bukti); 
                    $('#kode_pp_juskeb').val(result.data[0].nama_pp); 
                    $('#jenis_rra').val(result.data[0].kode_jenis); 
                    $('#lokasi_beri').val(result.data[0].lok_donor);
                    $('#lokasi_terima').val(result.data[0].lok_terima);
                    $('#nilai_juskeb').val(result.data[0].nilai);
                    $('#total_terima').val(result.data[0].nilai);
                    $('#total_beri').val(result.data[0].nilai);
                    if(result.detail_beri.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail_beri.length;i++){
                            var line =result.detail_beri[i];
                            input += "<tr class='row-beri'>";
                            input += "<td class='no-beri text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a href='#' class='hapus-item'  style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+line.kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+line.kode_akun+"'  style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+line.nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                            input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+line.kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+line.kode_pp+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+line.nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+line.nama_pp+"' readonly ></td>";
                            input += "<td><span class='td-drk tddrkke"+no+" tooltip-span'>"+line.kode_drk+"</span><input type='text' id='drkkode"+no+"' name='kode_drk[]' class='form-control inp-drk drkke"+no+" hidden' value='"+line.kode_drk+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_drk tdnmdrkke"+no+" tooltip-span'>"+line.nama_drk+"</span><input type='text' name='nama_drk[]' class='form-control inp-nama_drk nmdrkke"+no+" hidden'  value='"+line.nama_drk+"' readonly ></td>";
                            input += "<td ><span class='td-tw tdtwke"+no+" tooltip-span'></span><select hidden name='tw[]' class='form-control inp-tw twke"+no+"' value='' ><option value='TW1'>TW1</option><option value='TW2'>TW2</option><option value='TW3'>TW3</option><option value='TW4'>TW4</option></select></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+number_format(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+number_format(line.nilai)+"' ></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-beri tbody').html(input);
                        $('.tooltip-span').attr('title','tooltip');
                        $('.tooltip-span').tooltip({
                            content: function(){
                                return $(this).text();
                            },
                            tooltipClass: "custom-tooltip-sai"
                        });
                        no= 1;
                        for(var i=0;i<result.detail_beri.length;i++){
                            var line =result.detail_beri[i];
                            
                            if (line.bulan == "01")	var tw = "TW1";
                            if (line.bulan == "04")	var tw = "TW2";
                            if (line.bulan == "07")	var tw = "TW3";
                            if (line.bulan == "10")	var tw = "TW4";	
                            $('.twke'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    $('.tdtwke'+no).text(value);
                                    hitungTotalBeri();
                                }
                            });
                            $('.twke'+no)[0].selectize.setValue(tw,true);
                            $('.tdtwke'+no).text(tw);
                            $('.selectize-control.twke'+no).addClass('hidden');
                            $('.nilke'+no).inputmask("numeric", {
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

                    if(result.detail_terima.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail_terima.length;i++){
                            var line =result.detail_terima[i];
                            input += "<tr class='row-terima'>";
                            input += "<td class='no-terima text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a href='#' class='hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td><span class='td-kode_terima tdakunterimake"+no+" tooltip-span'>"+line.kode_akun+"</span><input type='text' name='kode_akun_terima[]' class='form-control inp-kode_terima akun_terimake"+no+" hidden' value='"+line.kode_akun+"' style='z-index: 1;position: relative;' id='akun_terimakode"+no+"'><a href='#' class='search-item search-akun_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_terima tdnmakun_terimake"+no+" tooltip-span'>"+line.nama_akun+"</span><input type='text' name='nama_akun_terima[]' class='form-control inp-nama_terima nmakun_terimake"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                            input += "<td><span class='td-pp_terima tdpp_terimake"+no+" tooltip-span'>"+line.kode_pp+"</span><input type='text' id='pp_terimakode"+no+"' name='kode_pp_terima[]' class='form-control inp-pp_terima pp_terimake"+no+" hidden' value='"+line.kode_pp+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_pp_terima tdnmpp_terimake"+no+" tooltip-span'>"+line.nama_pp+"</span><input type='text' name='nama_pp_terima[]' class='form-control inp-nama_pp_terima nmpp_terimake"+no+" hidden'  value='"+line.nama_pp+"' readonly ></td>";
                            input += "<td><span class='td-drk_terima tddrk_terimake"+no+" tooltip-span'>"+line.kode_drk+"</span><input type='text' id='drk_terimakode"+no+"' name='kode_drk_terima[]' class='form-control inp-drk_terima drk_terimake"+no+" hidden' value='"+line.kode_drk+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_drk_terima tdnmdrk_terimake"+no+" tooltip-span'>"+line.nama_drk+"</span><input type='text' name='nama_drk_terima[]' class='form-control inp-nama_drk_terima nmdrk_terimake"+no+" hidden'  value='"+line.nama_drk+"' readonly ></td>";
                            input += "<td ><span class='td-tw_terima tdtw_terimake"+no+" tooltip-span'></span><select hidden name='tw_terima[]' class='form-control inp-tw_terima tw_terimake"+no+"' value='' ><option value='TW1'>TW1</option><option value='TW2'>TW2</option><option value='TW3'>TW3</option><option value='TW4'>TW4</option></select></td>";
                            input += "<td class='text-right'><span class='td-nilai_terima tdnil_terimake"+no+" tooltip-span'>"+number_format(line.nilai)+"</span><input type='text' name='nilai_terima[]' class='form-control inp-nilai_terima nil_terimake"+no+" hidden'  value='"+number_format(line.nilai)+"' ></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-terima tbody').html(input);
                        $('.tooltip-span').attr('title','tooltip');
                        $('.tooltip-span').tooltip({
                            content: function(){
                                return $(this).text();
                            },
                            tooltipClass: "custom-tooltip-sai"
                        });
                        no= 1;
                        for(var i=0;i<result.detail_terima.length;i++){
                            var line =result.detail_terima[i];
                            
                            if (line.bulan == "01")	var tw = "TW1";
                            if (line.bulan == "04")	var tw = "TW2";
                            if (line.bulan == "07")	var tw = "TW3";
                            if (line.bulan == "10")	var tw = "TW4";	
                            $('.tw_terimake'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    $('.tdtw_terimake'+no).text(value);
                                    hitungTotalTerima();
                                }
                            });
                            $('.tw_terimake'+no)[0].selectize.setValue(tw,true);
                            $('.tdtw_terimake'+no).text(tw);
                            $('.selectize-control.tw_terimake'+no).addClass('hidden');
                            $('.nil_terimake'+no).inputmask("numeric", {
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
                    if(result.dokumen.length > 0){
                        var no=1;
                        for(var i=0;i<result.dokumen.length;i++){
                            var line =result.dokumen[i];
                            input2 += "<tr class='row-dok'>";
                            input2 += "<td class='no-dok text-center'>"+no+"</td>";
                            input2 += "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='kode_jenis[]' class='form-control inp-jenis jeniske"+no+" ' value='"+line.jenis+"'  style='z-index: 1;' id='jeniskode"+no+"'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
                            input2 += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='"+line.nama+"' readonly></td>";
                            var dok = "{{ config('api.url').'sukka-auth/storage' }}/"+line.fileaddres;
                            input2 += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>"+line.fileaddres+"</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='"+line.fileaddres+"' readonly></td>";
                            if(line.fileaddres == "-" || line.fileaddres == ""){
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
                                if(line.fileaddres != "-"){
                                   var link =`<a class='download-dok' href='`+dok+`'target='_blank' title='Download'><i style='font-size:18px' class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok' href='#' title='Hapus Dokumen'><i class='simple-icon-trash' style='font-size:18px' ></i></a>`;
                                }else{
                                    var link =``;
                                }
                            input2+=link+"</td></tr>";
                            no++;
                        }
                    }
                    $('#form-tambah #input-dok tbody').html(input2);

                    hitungTotalBeri();
                    hitungTotalTerima();
                    hitungTotalRowTerima();
                    hitungTotalRowUpload("form-tambah");
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#kode_form').val($form_aktif);
                    
                    showInfoField("jenis_rra",result.data[0].kode_jenis,result.data[0].nama_jenis);
                    showInfoField("lokasi_terima",result.data[0].lok_terima,result.data[0].nama_terima);
                    showInfoField("lokasi_beri",result.data[0].lok_donor,result.data[0].nama_beri);
                    setHeightForm();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Data Pengajuan RRA');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sukka-trans/aju-rra') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Pengajuan RRA ('+id+') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if(typeof M == 'undefined'){
                        $('#modal-delete').modal('hide');
                    }else{
                        $('#modal-delete').bootstrapMD('hide');
                    }
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.data.message
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus'
        });
    });
    // END HAPUS DATA

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-datatable').on('click','#btn-preview',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        printPreview(id);
    });

    // END BUTTON KEMBALI

    function printPreview(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('sukka-trans/aju-rra-preview') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result) {
                if(typeof result.data !== 'undefined' && result.data.length > 0) {
                    var html = "";
                    var no = 1;
                    var total = 0
                    var data = result.data[0];
                    html += `
                    <div class="row px-4">
                        <div class="col-12" style="border-bottom:3px solid black;text-align:center">
                            <h6 style="margin-bottom:0px !important">PENGAJUAN</h6>
                            <h6>RRA</h6>
                        </div>
                        <div class="col-12 my-2" style="text-align:center">
                            <h6>Nomor : ${data.no_pdrk}</h6>
                        </div>
                        <div class="col-12">
                            <table class="table table-condensed table-bordered" width="100%"  id="table-m">
                                <tbody>
                                    <tr>
                                        <td width="5%">1</td>
                                        <td width="25">PERIODE</td>
                                        <td width="70%" id="print-unit">${data.periode}</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">2</td>
                                        <td width="25">TANGGAL</td>
                                        <td width="70%" id="print-unit">${data.tanggal}</td>
                                    </tr>
                                    <tr>
                                        <td width="5%">3</td>
                                        <td width="25">KETERANGAN</td>
                                        <td width="70%" id="print-unit">${data.keterangan}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>DIBUAT OLEH</td>
                                        <td id="print-pic">${data.nik_buat} ${data.nama_buat}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <p style="font-weight:bold"># <u>DETAIL</u></p>
                        </div>
                        <div class="col-12">
                            <table class="table table-condensed table-bordered" style='border:1px solid black;border-collapse:collapse' border="1" width="100%" id="table-penutup">
                                <thead class="text-center">
                                <tr>
                                <td width="5%">NO</td>
                                <td width="10">KODE AKUN</td>
                                <td width="25">NAMA AKUN</td>
                                <td width="10">KODE PP</td>
                                <td width="25">NAMA PP</td>
                                <td width="10">KODE DRK</td>
                                <td width="25">NAMA DRK</td>
                                <td width="10%">PERIODE</td>
                                <td width="10%">DONOR</td>
                                <td width="10%">PENERIMA</td>
                                </tr>
                            </thead>
                            <tbody>`;
                            var total =0; var no=0; 
                            for(i=0; i < data.detail.length; i++){
                                var line2 = data.detail[i];
                                no++;
                                html+=`
                                <tr>
                                <td>${no}</td>
                                <td>${line2.kode_akun}</td>
                                <td>${line2.nama_akun}</td>
                                <td>${line2.kode_pp}</td>
                                <td>${line2.nama_pp}</td>
                                <td>${line2.kode_drk}</td>
                                <td>${line2.nama_drk}</td>
                                <td>${line2.periode}</td>
                                <td align='right' class='isi_laporan'>${number_format(line2.kredit)}</td>
                                <td align='right' class='isi_laporan'>${number_format(line2.debet)}</td>
                                </tr>`;
                            } 
                            html+=`
                            </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <p style="font-weight:bold"># <u>LAMPIRAN</u></p>
                        </div>
                        <div class="col-12">
                            <table class="table table-condensed table-bordered" style='border:1px solid black;border-collapse:collapse' border="1" width="100%" id="table-penutup">
                                <thead class="text-center">
                                <tr>
                                <td width="10%"></td>
                                <td width="25">NAMA/NIK</td>
                                <td width="15%">JABATAN</td>
                                <td width="10%">TANGGAL</td>
                                <td width="15%">NO APPROVAL</td>
                                <td width="10%">STATUS</td>
                                <td width="15%">TTD</td>
                                </tr>
                            </thead>
                            <tbody>`;
                                var total =0; var no=0; 
                                for(i=0; i < result.detail.length; i++){
                                    var line2 = result.detail[i];
                                    no++;
                                    html+=`
                                    <tr>
                                    <td>${line2.ket} </td>
                                    <td>${line2.nama_kar} / ${line2.nik} </td>
                                    <td>${line2.nama_jab} </td>
                                    <td>${line2.tanggal} </td>
                                    <td>${line2.no_app} </td>
                                    <td>${line2.status} </td>
                                    <td>&nbsp;</td>
                                    </tr>`;
                                }
                            html+=`
                            </tbody>
                            </table>
                        </div>
                    </div>
                    `;
                        
                    $('#print-content').html(html)
                    $('#saku-form').hide()
                    $('#saku-datatable').hide()
                    $('#saku-print').show()
                }
            }
        });
    }

    $('#saku-print #btn-back').click(function() {
        $('#saku-print').hide()
        $('#saku-datatable').show()
        $('#saku-form').hide()
    });

    $('#saku-print #btn-cetak').click(function() {
        $('#print-content').printThis({
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
        });
    });

    // BUTTON UPDATE DATA
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON UPDATE

    // PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 6 && $(this).index() != 5){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var posted = data.posted;
            $.ajax({
                type: 'GET',
                url: "{{ url('/sukka-trans/aju-rra') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){

                        var html = `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
                            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
                            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span> 
                            <div class="dropdown d-inline-block float-right">
                                <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
                                <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
                                </button>
                                <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                                </div>
                            </div>
                        </div>
                        <div class='separator'></div>
                        <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) ;position:sticky'>
                            <div style='border-bottom: double #d7d7d7;padding:0 1.5rem'>
                                <table class="borderless mb-2" width="100%" >
                                    <tr>
                                        <td width="25%" style="vertical-align:top !important"><h6 class="text-primary bold">PENGAJUAN RRA</h6></td>
                                        <td width="75%" style="vertical-align:top !important;text-align:right"><h6 class="mb-2 bold">`+result.lokasi[0].nama+`</h6><p style="line-height:1">`+result.lokasi[0].alamat+`<br>`+result.lokasi[0].kota+` `+result.lokasi[0].kodepos+` </p><p class="mt-2">`+result.lokasi[0].email+` | `+result.lokasi[0].no_telp+`</p></td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.5rem">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">Tanggal</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].tgl+`</td>
                                        <td width="30%" rowspan="3"></td>
                                        <td width="10%" rowspan="3" style="vertical-align:top !important">Deskripsi</td>
                                        <td width="1%" rowspan="3" style="vertical-align:top !important">:</td>
                                        <td width="24%" rowspan="3" style="vertical-align:top !important">`+result.data[0].keterangan+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">No Transaksi</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].no_pdrk+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">No Dokumen</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].no_dokumen+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Lokasi Penerima</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].lokasi_terima+` - `+result.data[0].nama_terima+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Lokasi Pemberi</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].lokasi_beri+` - `+result.data[0].nama_beri+`</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.9rem">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#prev-terima" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Penerima</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#prev-beri" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pemberi</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="prev-terima" role="tabpanel">
                                        <table class="table table-striped table-body-prev mt-2" width="100%">
                                        <tr style="background: var(--theme-color-1) !important;color:white !important">
                                                <th style="width:15%">Kode MTA</th>
                                                <th style="width:15%">Nama MTA</th>
                                                <th style="width:15">Nama PP</th>
                                                <th style="width:15">Nama DRK</th>
                                                <th style="width:10%">TW</th>
                                                <th style="width:15%">Nilai</th>
                                        </tr>`;
                                            var det = ''; var total =0;
                                            if(result.detail_terima.length > 0){
                                                var no=1;
                                                for(var i=0;i<result.detail_terima.length;i++){
                                                    var line =result.detail_terima[i];
                                                    total+=parseFloat(line.nilai);
                                                    if (line.bulan == "01")	var tw = "TW1";
                                                    if (line.bulan == "04")	var tw = "TW2";
                                                    if (line.bulan == "07")	var tw = "TW3";
                                                    if (line.bulan == "10")	var tw = "TW4";	
                                                    det += "<tr>";
                                                    det += "<td >"+line.kode_akun+"</td>";
                                                    det += "<td >"+line.nama_akun+"</td>";
                                                    det += "<td >"+line.nama_pp+"</td>";
                                                    det += "<td >"+line.nama_drk+"</td>";
                                                    det += "<td >"+tw+"</td>";
                                                    det += "<td class='text-right'>"+format_number(line.nilai)+"</td>";
                                                    det += "</tr>";
                                                    no++;
                                                }
                                            }
                                            det+=`<tr style="background: var(--theme-color-1) !important;color:white !important">
                                                <th colspan="5"></th>
                                                <th style="width:10%" class="text-right">`+format_number(total)+`</th>
                                        </tr>`;
                                        
                                        html+=det+`
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="prev-beri" role="tabpanel">
                                        <table class="table table-striped table-body-prev mt-2" width="100%">
                                        <tr style="background: var(--theme-color-1) !important;color:white !important">
                                                <th style="width:15%">Kode MTA</th>
                                                <th style="width:15%">Nama MTA</th>
                                                <th style="width:15">Nama PP</th>
                                                <th style="width:15">Nama DRK</th>
                                                <th style="width:10%">TW</th>
                                                <th style="width:15%">Nilai</th>
                                        </tr>`;
                                            var det = ''; var total =0;
                                            if(result.detail_beri.length > 0){
                                                var no=1;
                                                for(var i=0;i<result.detail_beri.length;i++){
                                                    var line =result.detail_beri[i];
                                                    total+=parseFloat(line.nilai);
                                                    if (line.bulan == "01")	var tw = "TW1";
                                                    if (line.bulan == "04")	var tw = "TW2";
                                                    if (line.bulan == "07")	var tw = "TW3";
                                                    if (line.bulan == "10")	var tw = "TW4";	
                                                    det += "<tr>";
                                                    det += "<td >"+line.kode_akun+"</td>";
                                                    det += "<td >"+line.nama_akun+"</td>";
                                                    det += "<td >"+line.nama_pp+"</td>";
                                                    det += "<td >"+line.nama_drk+"</td>";
                                                    det += "<td >"+tw+"</td>";
                                                    det += "<td class='text-right'>"+format_number(line.nilai)+"</td>";
                                                    det += "</tr>";
                                                    no++;
                                                }
                                            }
                                            det+=`<tr style="background: var(--theme-color-1) !important;color:white !important">
                                                <th colspan="5"></th>
                                                <th style="width:10%" class="text-right">`+format_number(total)+`</th>
                                        </tr>`;
                                        
                                        html+=det+`
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        $('#content-bottom-sheet').html(html);
                        
                        var scroll = document.querySelector('.preview-body');
                        var psscroll = new PerfectScrollbar(scroll);

                        
                        $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});

                        $('.preview-header').on('click','#btn-delete2',function(e){
                            var id = $('#preview-id').text();
                            $('.c-bottom-sheet').removeClass('active');
                            msgDialog({
                                id:id,
                                type:'hapus'
                            });
                        });

                        $('.preview-header').on('click', '#btn-edit2', function(){
                            var id= $('#preview-id').text();
                            $('#judul-form').html('Data Pengajuan RRA');
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            
                            $('#btn-save').attr('type','button');
                            $('#btn-save').attr('id','btn-update');
                            $('.c-bottom-sheet').removeClass('active');
                            editData(id);
                        });

                        $('.preview-header').on('click','#btn-cetak',function(e){
                            e.stopPropagation();
                            $('.dropdown-ke1').addClass('hidden');
                            $('.dropdown-ke2').removeClass('hidden');
                            console.log('ok');
                        });

                        $('.preview-header').on('click','#btn-cetak2',function(e){
                            // $('#dropdownAksi').dropdown('toggle');
                            e.stopPropagation();
                            $('.dropdown-ke1').removeClass('hidden');
                            $('.dropdown-ke2').addClass('hidden');
                        });

                        if(posted == "Close"){
                            console.log(posted);
                            $('.preview-header #btn-delete2').css('display','none');
                            $('.preview-header #btn-edit2').css('display','none');
                        }else{
                            $('.preview-header #btn-delete2').css('display','inline-block');
                            $('.preview-header #btn-edit2').css('display','inline-block');
                        }
                        $('#trigger-bottom-sheet').trigger("click");
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });

    // END PREVIEW

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            $("#input-flow tbody tr").each(function(i, v){
                var kode_role = $(this).closest('tr').find('td:eq(1)').text()
                var kode_jab = $(this).closest('tr').find('td:eq(2)').text()
                var nik = $(this).closest('tr').find('td:eq(3)').text()
                var email = $(this).closest('tr').find('td:eq(5)').text()
                formData.append('kode_role[]',kode_role)
                formData.append('kode_jab[]',kode_jab)
                formData.append('nik[]',nik)
                formData.append('email[]',email)
            });
            
            var total_d = toNilai($('#total_beri').val());
            var total_k = toNilai($('#total_terima').val());
            var jumdet = $('#input-beri tr').length;
            var jumdet2 = $('#input-terima tr').length;

            var param = $('#id').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/sukka-trans/aju-rra') }}/"+id;
            }else{
                var url = "{{ url('/sukka-trans/aju-rra') }}";
            }

            if(total_d != total_k){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Transaksi tidak valid',
                    text: "Total Pemberi,Total Terima, dan Nilai Juskeb tidak sama"
                });
            }else if( total_d <= 0 || total_k <= 0){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Transaksi tidak valid',
                    text: "Total Pemberi dan Total Terima tidak boleh sama dengan 0 atau kurang"
                });
            }else if(jumdet <= 1 && jumdet2 <= 1){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Transaksi tidak valid',
                    text: "Detail Pemberi dan Penerima tidak boleh kosong "
                });
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
                        if(result.data.status){
                            dataTable.ajax.reload();

                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Data Pengajuan RRA');
                            $('#id').val('');
                            $('#input-beri tbody').html('');
                            $('#input-terima tbody').html('');
                            $('#input-dok tbody').html('');
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
                            
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'warning',
                                title: 'Sukses',
                                text:result.data.message
                            });

                            printPreview(result.data.no_bukti);

                            if(result.data.no_pooling != undefined){
                                kirimWAEmail(result.data.no_pooling);
                            }

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
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
                    error: function(xhr, status, error) {
                        var error = JSON.parse(xhr.responseText);
                        var detail = Object.values(error.errors);
                        if(xhr.status == 422){
                            var keys = Object.keys(error.errors);
                            var tab =  $('#'+keys[0]).parents('.tab-pane').attr('id');
                            $('a[href="#'+tab+'"]').click();
                            $('#'+keys[0]).addClass('error');
                            $('#'+keys[0]).parent('.input-group').addClass('input-group-error');
                            $("label[for="+keys[0]+"]").append("<br/>");
                            $("label[for="+keys[0]+"]").append('<label id="'+keys[0]+'-error" class="error" for="'+keys[0]+'">'+detail[0]+'</label>');
                            $('#'+keys[0]).focus();
                        }
                        Swal.fire({
                            type: 'error',
                            title: error.message,
                            text: detail[0]
                        })
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Failed',
                            text: JSON.stringify(textStatus)
                        });
                        
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
    $('#tanggal,#no_bukti,#no_dokumen,#deskripsi,#no_juskeb,#kode_pp_juskeb,#nilai_juskeb,#jenis_rra,#total_terima,#total_beri,#lokasi_terima,#lokasi_beri').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','no_bukti','no_dokumen','deskripsi','no_juskeb','kode_pp_juskeb','nilai_juskeb','jenis_rra','total_terima','total_beri','lokasi_terima','lokasi_beri'];
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
        switch(id){
            case 'lokasi_beri':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-lokasi') }}",
                    columns : [
                        { data: 'kode_lokasi' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Lokasi",
                    pilih : "lokasi",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                }
            break;
            case 'lokasi_terima':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-lokasi') }}",
                    columns : [
                        { data: 'kode_lokasi' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Lokasi",
                    pilih : "lokasi",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                }
            break;
        }
        showInpFilterBSheet(options);
    });

    $('#form-tambah').on('change', '#lokasi_terima', function(){
        var par = $(this).val();
        getLokasi(par);
    });

    $('#form-tambah').on('change', '#lokasi_beri', function(){
        var par = $(this).val();
        getLokasi(par);
    });

    $('#form-tambah').on('change', '#no_juskeb', function(){
        var par = $(this).val();
        getJuskeb(par);
    });

    $('#form-tambah').on('click', '#load-app', function(){
        var kode_jenis = $('#jenis_rra').val();
        var nilai = $('#total_terima').val();
        getAppFlow(kode_jenis,nilai);
    });

    // GRID 
    function addRow(param){
        if($('#lokasi_beri').val() == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Lokasi Pemberi wajib diisi terlebih dahulu!'
            });
            return false;
        }
        if(param == "copy"){
            var kode_akun = $('#input-beri tbody tr.selected-row').find(".inp-kode").val();
            var nama_akun = $('#input-beri tbody tr.selected-row').find(".inp-nama").val();
            var kode_pp = $('#input-beri tbody tr.selected-row').find(".inp-pp").val();
            var nama_pp = $('#input-beri tbody tr.selected-row').find(".inp-nama_pp").val();
            var kode_drk = $('#input-beri tbody tr.selected-row').find(".inp-drk").val();
            var nama_drk = $('#input-beri tbody tr.selected-row').find(".inp-nama_drk").val();
            var tw = $('#input-beri tbody tr.selected-row').find(".inp-tw")[0].selectize.getValue();
            var nilai = $('#input-beri tbody tr.selected-row').find(".inp-nilai").val();
        }else{
            
            var kode_akun = "";
            var nama_akun = "";
            var kode_pp = "";
            var nama_pp = "";
            var kode_drk = "";
            var nama_drk = "";
            var tw = "";
            var nilai = "";
        }
        var no=$('#input-beri .row-beri:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-beri'>";
        input += "<td class='no-beri text-center'>"+no+"</td>";
        input += "<td class='text-center'><a href='#' class='hapus-item'  style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"'  style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
        input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly ></td>";
        input += "<td><span class='td-drk tddrkke"+no+" tooltip-span'>"+kode_drk+"</span><input type='text' id='drkkode"+no+"' name='kode_drk[]' class='form-control inp-drk drkke"+no+" hidden' value='"+kode_drk+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_drk tdnmdrkke"+no+" tooltip-span'>"+nama_drk+"</span><input type='text' name='nama_drk[]' class='form-control inp-nama_drk nmdrkke"+no+" hidden'  value='"+nama_drk+"' readonly ></td>";
        input += "<td ><span class='td-tw tdtwke"+no+" tooltip-span'>"+tw+"</span><select hidden name='tw[]' class='form-control inp-tw twke"+no+"' value='' ><option value='TW1'>TW1</option><option value='TW2'>TW2</option><option value='TW3'>TW3</option><option value='TW4'>TW4</option></select></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' ></td>";
        input += "</tr>";
        $('#input-beri tbody').append(input);

        if(param != "copy"){
            $('.row-beri:last').addClass('selected-row');
            $('#input-beri tbody tr').not('.row-beri:last').removeClass('selected-row');
        }
        $('.twke'+no).selectize({
            selectOnTab:true,
            onChange: function(value) {
                $('.tdtwke'+no).text(value);
                hitungTotalBeri();
            }
        });
        $('.twke'+no)[0].selectize.setValue(tw,true);
        $('.selectize-control.twke'+no).addClass('hidden');
        $('.nilke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });

        hideUnselectedRow();
        if(param == "add"){
            $('#input-beri td').removeClass('px-0 py-0 aktif');
            $('#input-beri tbody tr:last').find("td:eq(2)").addClass('px-0 py-0 aktif');
            $('#input-beri tbody tr:last').find(".inp-kode").show();
            $('#input-beri tbody tr:last').find(".td-kode").hide();
            $('#input-beri tbody tr:last').find(".search-akun").show();
            $('#input-beri tbody tr:last').find(".inp-kode").focus();
        }

        $('.tooltip-span').attr('title','tooltip');
        $('.tooltip-span').tooltip({
            content: function(){
                return $(this).text();
            }
        });
        hitungTotalRowBeri();
    }

    function addRowTerima(param){
        if($('#lokasi_terima').val() == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Lokasi Penerima wajib diisi terlebih dahulu!'
            });
            return false;
        }
        if(param == "copy"){
            var kode_akun = $('#input-terima tbody tr.selected-row').find(".inp-kode_terima").val();
            var nama_akun = $('#input-terima tbody tr.selected-row').find(".inp-nama_terima").val();
            var kode_pp = $('#input-terima tbody tr.selected-row').find(".inp-pp_terima").val();
            var nama_pp = $('#input-terima tbody tr.selected-row').find(".inp-nama_pp_terima").val();
            var kode_drk = $('#input-terima tbody tr.selected-row').find(".inp-drk_terima").val();
            var nama_drk = $('#input-terima tbody tr.selected-row').find(".inp-nama_drk_terima").val();
            var tw = $('#input-terima tbody tr.selected-row').find(".inp-tw_terima")[0].selectize.getValue();
            var nilai = $('#input-terima tbody tr.selected-row').find(".inp-nilai_terima").val();
        }else{
            
            var kode_akun = "";
            var nama_akun = "";
            var kode_pp = "";
            var nama_pp = "";
            var kode_drk = "";
            var nama_drk = "";
            var tw = "";
            var nilai = "";
        }
        var no=$('#input-terima .row-terima:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-terima'>";
        input += "<td class='no-terima text-center'>"+no+"</td>";
        input += "<td class='text-center'><a href='#' class='hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode_terima tdakunterimake"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun_terima[]' class='form-control inp-kode_terima akun_terimake"+no+" hidden' value='"+kode_akun+"' style='z-index: 1;position: relative;' id='akun_terimakode"+no+"'><a href='#' class='search-item search-akun_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_terima tdnmakun_terimake"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun_terima[]' class='form-control inp-nama_terima nmakun_terimake"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
        input += "<td><span class='td-pp_terima tdpp_terimake"+no+" tooltip-span'>"+kode_pp+"</span><input type='text' id='pp_terimakode"+no+"' name='kode_pp_terima[]' class='form-control inp-pp_terima pp_terimake"+no+" hidden' value='"+kode_pp+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_pp_terima tdnmpp_terimake"+no+" tooltip-span'>"+nama_pp+"</span><input type='text' name='nama_pp_terima[]' class='form-control inp-nama_pp_terima nmpp_terimake"+no+" hidden'  value='"+nama_pp+"' readonly ></td>";
        input += "<td><span class='td-drk_terima tddrk_terimake"+no+" tooltip-span'>"+kode_drk+"</span><input type='text' id='drk_terimakode"+no+"' name='kode_drk_terima[]' class='form-control inp-drk_terima drk_terimake"+no+" hidden' value='"+kode_drk+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_drk_terima tdnmdrk_terimake"+no+" tooltip-span'>"+nama_drk+"</span><input type='text' name='nama_drk_terima[]' class='form-control inp-nama_drk_terima nmdrk_terimake"+no+" hidden'  value='"+nama_drk+"' readonly ></td>";
        input += "<td ><span class='td-tw_terima tdtw_terimake"+no+" tooltip-span'></span><select hidden name='tw_terima[]' class='form-control inp-tw_terima tw_terimake"+no+"' value='' ><option value='TW1'>TW1</option><option value='TW2'>TW2</option><option value='TW3'>TW3</option><option value='TW4'>TW4</option></select></td>";
        input += "<td class='text-right'><span class='td-nilai_terima tdnil_terimake"+no+" tooltip-span'>"+number_format(nilai)+"</span><input type='text' name='nilai_terima[]' class='form-control inp-nilai_terima nil_terimake"+no+" hidden'  value='"+number_format(nilai)+"' ></td>";
        input += "</tr>";
        $('#input-terima tbody').append(input);

        if(param != "copy"){
            $('.row-terima:last').addClass('selected-row');
            $('#input-terima tbody tr').not('.row-terima:last').removeClass('selected-row');
        }
        $('.tw_terimake'+no).selectize({
            selectOnTab:true,
            onChange: function(value) {
                $('.tdtw_terimake'+no).text(value);
                hitungTotalTerima();
            }
        });
        $('.tw_terimake'+no)[0].selectize.setValue(tw,true);
        $('.selectize-control.tw_terimake'+no).addClass('hidden');
        $('.nil_terimake'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });

        hideUnselectedRowTerima();
        if(param == "add"){
            $('#input-terima td').removeClass('px-0 py-0 aktif');
            $('#input-terima tbody tr:last').find("td:eq(2)").addClass('px-0 py-0 aktif');
            $('#input-terima tbody tr:last').find(".inp-kode_terima").show();
            $('#input-terima tbody tr:last').find(".td-kode_terima").hide();
            $('#input-terima tbody tr:last').find(".search-akun_terima").show();
            $('#input-terima tbody tr:last').find(".inp-kode_terima").focus();
        }

        $('.tooltip-span').attr('title','tooltip');
        $('.tooltip-span').tooltip({
            content: function(){
                return $(this).text();
            }
        });
        hitungTotalRowTerima();
    }

    function addRowDok(form){
        var no=$('#'+form+' #input-dok .row-dok:last').index();
        no=no+2;
        console.log(no);
        var input = "";
        input += "<tr class='row-dok'>";
        input += "<td class='no-dok text-center'>"+no+"</td>";
        input += "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='kode_jenis[]' class='form-control inp-jenis jeniske"+no+" ' value=''  style='z-index: 1;' id='jeniskode"+no+"'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
        input += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='' readonly></td>";
        input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>-</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='-' readonly></td>";
        input+=`
        <td>
        <input type='file' name='file_dok[]'>
        <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
        </td>`;
        input+=`
        <td class='text-center action-dok'><a href='#' class='hapus-dok2'><i class='simple-icon-trash' style='font-size:18px'></i></a></td></tr>`;
        console.log(form);
        $('#'+form+' #input-dok tbody').append(input);
        hitungTotalRowUpload(form);
    }

    $('#form-tambah #input-dok').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        var tmp = $(this).closest('tr').find('input[name="nama_dok[]"]').attr('class');
        var tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        console.log(par,target1,target2)
        
        switch(par){
            case 'kode_jenis[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-jenis-dok') }}",
                    columns : [
                        { data: 'kode_jenis' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jenis Dokumen",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilterBSheet(options);

    });

    $('#input-beri').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        
        switch(par){
            case 'kode_akun[]': 
                var par2 = "nama_akun[]";
            break;
            case 'kode_pp[]': 
                var par2 = "nama_pp[]";
            break;
            case 'kode_drk[]': 
                var par2 = "nama_drk[]";
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        
        switch(par){
            case 'kode_akun[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-akun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar MTA",
                    pilih : "akun",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected: function(data){
                        $('.'+target1).closest('tr').removeClass('px-0 py-0 aktif');
                        $('.'+target1).closest("tr").find(".inp-kode").val(data.kode_akun).hide();
                        $('.'+target1).closest("tr").find(".td-kode").text(data.kode_akun).show();
                        $('.'+target1).closest("tr").find(".search-akun").hide();
                        $('.'+target1).closest("tr").find(".inp-nama").val(data.nama).show();
                        $('.'+target1).closest("tr").find(".td-nama").html(data.nama).hide();
                        $('.'+target1).closest("tr").find(".td-nama").closest('td').addClass('px-0 py-0 aktif');
                        
                        var idx_next = tmp[1].replace("td","");
                        var kode_akun = data.kode_akun;
                        var kode_pp = $('.'+target1).closest("tr").find(".td-pp").text();
                        var kode_drk = $('.'+target1).closest("tr").find(".td-drk").text();
                        var tw = $('.'+target1).closest("tr").find(".inp-tw")[0].selectize.getValue();
                        var periode = $('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2);
                        var kode_lokasi = $('#lokasi_beri').val();
                        setTimeout(function() {  $('.'+target1).closest("tr").find(".inp-nama").focus(); }, 100);
                    },
                };
            break;
            case 'kode_pp[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "pp",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    onItemSelected: function(data){
                        $('.'+target1).closest('tr').removeClass('px-0 py-0 aktif');
                        $('.'+target1).closest("tr").find(".inp-pp").val(data.kode_pp).hide();
                        $('.'+target1).closest("tr").find(".td-pp").text(data.kode_pp).show();
                        $('.'+target1).closest("tr").find(".search-pp").hide();
                        $('.'+target1).closest("tr").find(".inp-nama_pp").val(data.nama).show();
                        $('.'+target1).closest("tr").find(".td-nama_pp").html(data.nama).hide();
                        $('.'+target1).closest("tr").find(".td-nama_pp").closest('td').addClass('px-0 py-0 aktif');
                        
                        setTimeout(function() {  $('.'+target1).closest("tr").find(".inp-nama_pp").focus(); }, 100);
                    },
                    parameter:{
                        kode_lokasi: $('#lokasi_beri').val(),
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'kode_drk[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-drk-beri') }}",
                    columns : [
                        { data: 'kode_drk' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar DRK",
                    pilih : "drk",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    onItemSelected: function(data){
                        $('.'+target1).closest('tr').removeClass('px-0 py-0 aktif');
                        $('.'+target1).closest("tr").find(".inp-drk").val(data.kode_drk).hide();
                        $('.'+target1).closest("tr").find(".td-drk").text(data.kode_drk).show();
                        $('.'+target1).closest("tr").find(".search-drk").hide();
                        $('.'+target1).closest("tr").find(".inp-nama_drk").val(data.nama).show();
                        $('.'+target1).closest("tr").find(".td-nama_drk").html(data.nama).hide();
                        $('.'+target1).closest("tr").find(".td-nama_drk").closest('td').addClass('px-0 py-0 aktif');

                        setTimeout(function() {  $('.'+target1).closest("tr").find(".inp-nama_drk").focus(); }, 100);
                    },
                    width : ["30%","70%"],
                    parameter:{
                        kode_pp: $(this).closest('tr').find('input[name="kode_pp[]"]').val(),
                        kode_akun: $(this).closest('tr').find('input[name="kode_akun[]"]').val(),
                        periode: $('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2),
                        kode_lokasi: $('#lokasi_beri').val()
                    }
                };
            break;
        }
        showInpFilterBSheet(options);

    });

    $('#input-terima').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        
        switch(par){
            case 'kode_akun_terima[]': 
                var par2 = "nama_akun_terima[]";
            break;
            case 'kode_pp_terima[]': 
                var par2 = "nama_pp_terima[]";
            break;
            case 'kode_drk_terima[]': 
                var par2 = "nama_drk_terima[]";
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        
        switch(par){
            case 'kode_akun_terima[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-akun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar MTA",
                    pilih : "akun",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected: function(data){
                        $('.'+target1).closest('tr').removeClass('px-0 py-0 aktif');
                        $('.'+target1).closest("tr").find(".inp-kode_terima").val(data.kode_akun).hide();
                        $('.'+target1).closest("tr").find(".td-kode_terima").text(data.kode_akun).show();
                        $('.'+target1).closest("tr").find(".search-akun_terima").hide();
                        $('.'+target1).closest("tr").find(".inp-nama_terima").val(data.nama).show();
                        $('.'+target1).closest("tr").find(".td-nama_terima").html(data.nama).hide();
                        $('.'+target1).closest("tr").find(".td-nama_terima").closest('td').addClass('px-0 py-0 aktif');
                        setTimeout(function() {  $('.'+target1).closest("tr").find(".inp-nama_terima").focus(); }, 100);
                    },
                };
            break;
            case 'kode_pp_terima[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "pp",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    onItemSelected: function(data){
                        $('.'+target1).closest('tr').removeClass('px-0 py-0 aktif');
                        $('.'+target1).closest("tr").find(".inp-pp_terima").val(data.kode_pp).hide();
                        $('.'+target1).closest("tr").find(".td-pp_terima").text(data.kode_pp).show();
                        $('.'+target1).closest("tr").find(".search-pp_terima").hide();
                        $('.'+target1).closest("tr").find(".inp-nama_pp_terima").val(data.nama).show();
                        $('.'+target1).closest("tr").find(".td-nama_pp_terima").html(data.nama).hide();
                        $('.'+target1).closest("tr").find(".td-nama_pp_terima").closest('td').addClass('px-0 py-0 aktif');
                        setTimeout(function() {  $('.'+target1).closest("tr").find(".inp-nama_pp_terima").focus(); }, 100);
                    },
                    parameter:{
                        kode_lokasi: $('#lokasi_terima').val(),
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'kode_drk_terima[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/aju-rra-drk') }}",
                    columns : [
                        { data: 'kode_drk' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar DRK",
                    pilih : "drk",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    onItemSelected: function(data){
                        $('.'+target1).closest('tr').removeClass('px-0 py-0 aktif');
                        $('.'+target1).closest("tr").find(".inp-drk_terima").val(data.kode_drk).hide();
                        $('.'+target1).closest("tr").find(".td-drk_terima").text(data.kode_drk).show();
                        $('.'+target1).closest("tr").find(".search-drk_terima").hide();
                        $('.'+target1).closest("tr").find(".inp-nama_drk_terima").val(data.nama).show();
                        $('.'+target1).closest("tr").find(".td-nama_drk_terima").html(data.nama).hide();
                        $('.'+target1).closest("tr").find(".td-nama_drk_terima").closest('td').addClass('px-0 py-0 aktif');
                        setTimeout(function() {  $('.'+target1).closest("tr").find(".inp-nama_drk_terima").focus(); }, 100);
                    },
                    width : ["30%","70%"],
                    parameter:{
                        kode_pp: $(this).closest('tr').find('input[name="kode_pp[]"]').val(),
                        kode_akun: $(this).closest('tr').find('input[name="kode_akun[]"]').val(),
                        periode: $('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2),
                        kode_lokasi: $('#lokasi_terima').val()
                    }
                };
            break;
        }
        showInpFilterBSheet(options);

    });
    
    $('#input-beri').on('keydown','.inp-kode, .inp-nama, .inp-pp, .inp-nama_pp, .inp-drk, .inp-nama_drk, .inp-tw, .inp-nilai',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama','.inp-pp','.inp-nama_pp','.inp-drk','.inp-nama_drk','.inp-tw','.inp-nilai'];
        var nxt2 = ['.td-kode','.td-nama','.td-pp','.td-nama_pp','.td-drk','.td-nama_drk','.td-tw','.td-nilai'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-2;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-beri").text();
                    var kode = $(this).val();
                    var target1 = "akunke"+noidx;
                    var target2 = "nmakunke"+noidx;
                    var target3 = "";
                    getAkun(kode,target1,target2,target3,'tab','input-beri');                    
                    break;
                case 1:
                    $("#input-beri td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find('.search-pp').show();
                    break;
                case 2:
                    var noidx = $(this).parents("tr").find(".no-beri").text();
                    var kode = $(this).val();
                    var target1 = "ppke"+noidx;
                    var target2 = "nmppke"+noidx;
                    var target3 = "";
                    var kode_lokasi= $('#lokasi_beri').val();
                    getPP(kode,target1,target2,'tab',kode_lokasi,'input-beri');   
                    break;
                case 3:
                    $("#input-beri td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find('.search-drk').show();
                    break;
                case 4:
                    var noidx = $(this).parents("tr").find(".no-beri").text();
                    var kode = $(this).val();
                    var target1 = "drkke"+noidx;
                    var target2 = "nmdrkke"+noidx;
                    var target3 = "";
                    var kode_akun = $(this).parents("tr").find(".td-kode").text();
                    var kode_pp = $(this).parents("tr").find(".td-pp").text();
                    var periode = $('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2);
                    var kode_lokasi = $('#lokasi_beri').val();
                    getDRKPemberi(kode,target1,target2,target3,'tab',kode_akun,kode_pp,periode,kode_lokasi,'input-beri'); 
                    break;
                case 5:
                    $("#input-beri td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    break;
                case 6:
                    var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                    if(isi == 'TW1' || isi == 'TW2' || isi == 'TW3' || isi == 'TW4' ){
                        $("#input-beri td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi,true);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                    }else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Inputan tidak valid',
                            text: 'TW yang dimasukkan tidak valid'
                        });
                        
                        return false;
                    }
                    break;
                case 7:
                    $("#input-beri td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    break;
                case 8:
                    $("#input-beri td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    hitungTotalBeri();
                    var cek = $(this).parents('tr').next('tr').find('.td-kode');
                    if(cek.length > 0){
                        cek.click();
                    }else{
                        $('.add-row').click();
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

    $('#input-terima').on('keydown','.inp-kode_terima, .inp-nama_terima, .inp-pp_terima, .inp-nama_pp_terima, .inp-drk_terima, .inp-nama_drk_terima, .inp-tw_terima, .inp-nilai_terima',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode_terima','.inp-nama_terima','.inp-pp_terima','.inp-nama_pp_terima','.inp-drk_terima','.inp-nama_drk_terima','.inp-tw_terima','.inp-nilai_terima'];
        var nxt2 = ['.td-kode_terima','.td-nama_terima','.td-pp_terima','.td-nama_pp_terima','.td-drk_terima','.td-nama_drk_terima','.td-tw_terima','.td-nilai_terima'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-2;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-terima").text();
                    var kode = $(this).val();
                    var target1 = "akun_terimake"+noidx;
                    var target2 = "nmakun_terimake"+noidx;
                    var target3 = "";
                    getAkun(kode,target1,target2,target3,'tab','input-terima');                    
                    break;
                case 1:
                    $("#input-terima td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find('.search-pp_terima').show();
                    break;
                case 2:
                    var noidx = $(this).parents("tr").find(".no-terima").text();
                    var kode = $(this).val();
                    var target1 = "pp_terimake"+noidx;
                    var target2 = "nmpp_terimake"+noidx;
                    var target3 = "";
                    var kode_lokasi= $('#lokasi_terima').val();
                    getPP(kode,target1,target2,'tab',kode_lokasi,'input-terima');     
                    break;
                case 3:
                    $("#input-terima td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find('.search-drk_terima').show();
                    break;
                case 4:
                    var noidx = $(this).parents("tr").find(".no-terima").text();
                    var kode = $(this).val();
                    var target1 = "drk_terimake"+noidx;
                    var target2 = "nmdrk_terimake"+noidx;
                    var target3 = "";
                    var kode_akun = $(this).parents("tr").find(".td-kode_terima").text();
                    var kode_pp = $(this).parents("tr").find(".td-pp_terima").text();
                    var periode = $('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2);
                    var kode_lokasi = $('#lokasi_terima').val();
                    getDRK(kode,target1,target2,target3,'tab',kode_akun,kode_pp,periode,kode_lokasi,'input-terima'); 
                    break;
                case 5:
                    $("#input-terima td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    break;
                case 6:
                    var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                    if(isi == 'TW1' || isi == 'TW2' || isi == 'TW3' || isi == 'TW4' ){
                        $("#input-terima td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi,true);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                    }else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Inputan tidak valid',
                            text: 'TW yang dimasukkan tidak valid'
                        });
                        
                        return false;
                    }
                    break;
                case 7:
                    $("#input-terima td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    hitungTotalTerima();
                    var cek = $(this).parents('tr').next('tr').find('.td-kode_terima');
                    if(cek.length > 0){
                        cek.click();
                    }else{
                        $('.add-row-terima').click();
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

    $('#form-tambah').on('click', '.add-row', function(){
        addRow("add");
    });

    $('#form-tambah').on('click', '.add-row-terima', function(){
        addRowTerima("add");
    });

    $('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
    });

    function hideUnselectedRow() {
        $('#input-beri > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var kode_pp = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var nama_pp = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val();
                var kode_drk = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-drk").val();
                var nama_drk = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama_drk").val();
                var tw = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-tw")[0].selectize.getValue();
                var nilai = $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-pp").val(kode_pp);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-pp").text(kode_pp);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val(nama_pp);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nama_pp").text(nama_pp);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-drk").val(kode_drk);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-drk").text(kode_drk);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama_drk").val(nama_drk);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nama_drk").text(nama_drk);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-tw")[0].selectize.setValue(tw,true);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-tw").text(tw);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nama_pp").show();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-drk").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".search-drk").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nama_drk").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nama_drk").show();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-tw").show();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#input-beri > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function hideUnselectedRowTerima() {
        $('#input-terima > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-kode_terima").val();
                var nama_akun = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_terima").val();
                var kode_pp = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-pp_terima").val();
                var nama_pp = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_pp_terima").val();
                var kode_drk = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-drk_terima").val();
                var nama_drk = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_drk_terima").val();
                var tw = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-tw_terima")[0].selectize.getValue();
                var nilai = $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nilai_terima").val();

                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-kode_terima").val(kode_akun);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-kode_terima").text(kode_akun);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_terima").val(nama_akun);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nama_terima").text(nama_akun);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-pp_terima").val(kode_pp);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-pp_terima").text(kode_pp);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_pp_terima").val(nama_pp);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nama_pp_terima").text(nama_pp);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-drk_terima").val(kode_drk);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-drk_terima").text(kode_drk);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_drk_terima").val(nama_drk);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nama_drk_terima").text(nama_drk);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-tw_terima")[0].selectize.setValue(tw,true);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-tw_terima").text(tw);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nilai_terima").val(nilai);
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nilai_terima").text(nilai);

                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-kode_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-kode_terima").show();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".search-akun_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nama_terima").show();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-pp_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-pp_terima").show();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".search-pp_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_pp_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nama_pp_terima").show();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-drk_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-drk_terima").show();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".search-drk_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nama_drk_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nama_drk_terima").show();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-tw_terima").show();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".inp-nilai_terima").hide();
                $('#input-terima > tbody > tr:eq('+index+') > td').find(".td-nilai_terima").show();
            }
        })
    }

    $('#input-beri tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-beri tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-terima tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row-terima');
        $('#input-terima tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowTerima();
    });

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Harap pilih row yang akan dicopy terlebih dahulu!'
            });
            return false;
        }else{
            addRow("copy");
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }
    });

    $('.nav-control-terima').on('click', '#copy-row', function(){
        if($(".selected-row-terima").length != 1){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Harap pilih row yang akan dicopy terlebih dahulu!'
            });
            return false;
        }else{
            addRowTerima("copy");
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }

    });

    $('#input-beri').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-beri td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var kode_pp = $(this).parents("tr").find(".inp-pp").val();
                var nama_pp = $(this).parents("tr").find(".inp-nama_pp").val();
                var kode_drk = $(this).parents("tr").find(".inp-drk").val();
                var nama_drk = $(this).parents("tr").find(".inp-nama_drk").val();
                var tw = $(this).parents("tr").find(".inp-tw")[0].selectize.getValue();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var no = $(this).parents("tr").find(".no-beri").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-akun").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama").val(nama_akun);
                $(this).parents("tr").find(".td-nama").text(nama_akun);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }
        
                $(this).parents("tr").find(".inp-pp").val(kode_pp);
                $(this).parents("tr").find(".td-pp").text(kode_pp);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-pp").show();
                    $(this).parents("tr").find(".td-pp").hide();
                    $(this).parents("tr").find(".search-pp").show();
                    $(this).parents("tr").find(".inp-pp").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-pp").hide();
                    $(this).parents("tr").find(".td-pp").show();
                    $(this).parents("tr").find(".search-pp").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama_pp").val(nama_pp);
                $(this).parents("tr").find(".td-nama_pp").text(nama_pp);
                if(idx == 5){
                    
                    $(this).parents("tr").find(".inp-nama_pp").show();
                    $(this).parents("tr").find(".td-nama_pp").hide();
                    $(this).parents("tr").find(".inp-nama_pp").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_pp").hide();
                    $(this).parents("tr").find(".td-nama_pp").show();
                }

                $(this).parents("tr").find(".inp-drk").val(kode_drk);
                $(this).parents("tr").find(".td-drk").text(kode_drk);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-drk").show();
                    $(this).parents("tr").find(".td-drk").hide();
                    $(this).parents("tr").find(".search-drk").show();
                    $(this).parents("tr").find(".inp-drk").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-drk").hide();
                    $(this).parents("tr").find(".td-drk").show();
                    $(this).parents("tr").find(".search-drk").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama_drk").val(nama_drk);
                $(this).parents("tr").find(".td-nama_drk").text(nama_drk);
                if(idx == 7){
                    
                    $(this).parents("tr").find(".inp-nama_drk").show();
                    $(this).parents("tr").find(".td-nama_drk").hide();
                    $(this).parents("tr").find(".inp-nama_drk").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_drk").hide();
                    $(this).parents("tr").find(".td-nama_drk").show();
                }

                $(this).parents("tr").find(".inp-tw")[0].selectize.setValue(tw,true);
                $(this).parents("tr").find(".td-tw").text(tw);
                if(idx == 8){
                    $('.twke'+no)[0].selectize.setValue(tw,true);
                    
                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-tw").hide();
                    $(this).parents("tr").find(".inp-tw")[0].selectize.focus();
                    
                }else{
                    
                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-tw").show();
                }
        
                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 9){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
                hitungTotalBeri();
            }
        }
    });

    $('#input-terima').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-terima td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_akun = $(this).parents("tr").find(".inp-kode_terima").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama_terima").val();
                var kode_pp = $(this).parents("tr").find(".inp-pp_terima").val();
                var nama_pp = $(this).parents("tr").find(".inp-nama_pp_terima").val();
                var kode_drk = $(this).parents("tr").find(".inp-drk_terima").val();
                var nama_drk = $(this).parents("tr").find(".inp-nama_drk_terima").val();
                var tw = $(this).parents("tr").find(".inp-tw_terima")[0].selectize.getValue();
                var nilai = $(this).parents("tr").find(".inp-nilai_terima").val();
                var no = $(this).parents("tr").find(".no-terima").text();
                $(this).parents("tr").find(".inp-kode_terima").val(kode_akun);
                $(this).parents("tr").find(".td-kode_terima").text(kode_akun);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-kode_terima").show();
                    $(this).parents("tr").find(".td-kode_terima").hide();
                    $(this).parents("tr").find(".search-akun_terima").show();
                    $(this).parents("tr").find(".inp-kode_terima").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode_terima").hide();
                    $(this).parents("tr").find(".td-kode_terima").show();
                    $(this).parents("tr").find(".search-akun_terima").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama_terima").val(nama_akun);
                $(this).parents("tr").find(".td-nama_terima").text(nama_akun);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-nama_terima").show();
                    $(this).parents("tr").find(".td-nama_terima").hide();
                    $(this).parents("tr").find(".inp-nama_terima").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_terima").hide();
                    $(this).parents("tr").find(".td-nama_terima").show();
                }
        
                $(this).parents("tr").find(".inp-pp_terima").val(kode_pp);
                $(this).parents("tr").find(".td-pp_terima").text(kode_pp);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-pp_terima").show();
                    $(this).parents("tr").find(".td-pp_terima").hide();
                    $(this).parents("tr").find(".search-pp_terima").show();
                    $(this).parents("tr").find(".inp-pp_terima").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-pp_terima").hide();
                    $(this).parents("tr").find(".td-pp_terima").show();
                    $(this).parents("tr").find(".search-pp_terima").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama_pp_terima").val(nama_pp);
                $(this).parents("tr").find(".td-nama_pp_terima").text(nama_pp);
                if(idx == 5){
                    
                    $(this).parents("tr").find(".inp-nama_pp_terima").show();
                    $(this).parents("tr").find(".td-nama_pp_terima").hide();
                    $(this).parents("tr").find(".inp-nama_pp_terima").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_pp_terima").hide();
                    $(this).parents("tr").find(".td-nama_pp_terima").show();
                }

                $(this).parents("tr").find(".inp-drk_terima").val(kode_drk);
                $(this).parents("tr").find(".td-drk_terima").text(kode_drk);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-drk_terima").show();
                    $(this).parents("tr").find(".td-drk_terima").hide();
                    $(this).parents("tr").find(".search-drk_terima").show();
                    $(this).parents("tr").find(".inp-drk_terima").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-drk_terima").hide();
                    $(this).parents("tr").find(".td-drk_terima").show();
                    $(this).parents("tr").find(".search-drk_terima").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama_drk_terima").val(nama_drk);
                $(this).parents("tr").find(".td-nama_drk_terima").text(nama_drk);
                if(idx == 7){
                    
                    $(this).parents("tr").find(".inp-nama_drk_terima").show();
                    $(this).parents("tr").find(".td-nama_drk_terima").hide();
                    $(this).parents("tr").find(".inp-nama_drk_terima").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_drk_terima").hide();
                    $(this).parents("tr").find(".td-nama_drk_terima").show();
                }

                $(this).parents("tr").find(".inp-tw_terima")[0].selectize.setValue(tw,true);
                $(this).parents("tr").find(".td-tw_terima").text(tw);
                if(idx == 8){
                    $('.tw_terimake'+no)[0].selectize.setValue(tw,true);
                    
                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-tw_terima").hide();
                    $(this).parents("tr").find(".inp-tw_terima")[0].selectize.focus();
                    
                }else{
                    
                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-tw_terima").show();
                }
        
                $(this).parents("tr").find(".inp-nilai_terima").val(nilai);
                $(this).parents("tr").find(".td-nilai_terima").text(nilai);
                if(idx == 9){
                    $(this).parents("tr").find(".inp-nilai_terima").show();
                    $(this).parents("tr").find(".td-nilai_terima").hide();
                    $(this).parents("tr").find(".inp-nilai_terima").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai_terima").hide();
                    $(this).parents("tr").find(".td-nilai_terima").show();
                }
        
                hitungTotalTerima();
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

    $('#input-beri').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-beri').each(function(){
            var nom = $(this).closest('tr').find('.no-beri');
            nom.html(no);
            no++;
        });
        hitungTotalBeri();
        hitungTotalRowBeri();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-terima').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-terima').each(function(){
            var nom = $(this).closest('tr').find('.no-terima');
            nom.html(no);
            no++;
        });
        hitungTotalTerima();
        hitungTotalRowTerima();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-beri').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var noidx =  $(this).parents('tr').find('.no-beri').html();
        target1 = "akunke"+noidx;
        target2 = "nmakunke"+noidx;
        target3 = "";
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getAkun(kode,target1,target2,target3,'change','input-beri');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'MTA yang dimasukkan tidak valid'
            });
            return false;
        }
    });

    $('#input-terima').on('change', '.inp-kode_terima', function(e){
        e.preventDefault();
        var noidx =  $(this).parents('tr').find('.no-terima').html();
        target1 = "akun_terimake"+noidx;
        target2 = "nmakun_terimake"+noidx;
        target3 = "";
        if($.trim($(this).closest('tr').find('.inp-kode_terima').val()).length){
            var kode = $(this).val();
            getAkun(kode,target1,target2,target3,'change','input-terima');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'MTA yang dimasukkan tidak valid'
            });
            return false;
        }
    });

    $('#input-beri').on('keypress', '.inp-kode', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-beri tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-beri tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-terima').on('keypress', '.inp-kode_terima', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-terima tbody tr:eq("+(this_index - 1)+")").find('.inp-kode_terima').val() != undefined){
                $(this).val($("#input-terima tbody tr:eq("+(this_index - 1)+")").find('.inp-kode_terima').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-beri').on('change', '.inp-nilai', function(){
        
        console.log('nilai change');
        if($(this).closest('tr').find('.inp-nilai').val() != "" && $(this).closest('tr').find('.inp-nilai').val() != 0){
            hitungTotalBeri();
        }
        else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'Nilai yang dimasukkan tidak valid'
            });
            return false;
        }
    });

    $('#input-terima').on('change', '.inp-nilai_terima', function(){
        
        if($(this).closest('tr').find('.inp-nilai_terima').val() != "" && $(this).closest('tr').find('.inp-nilai_terima').val() != 0){
            hitungTotalTerima();
        }
        else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'Nilai yang dimasukkan tidak valid'
            });
            return false;
        }
    });

    $('#input-beri').on('change', '.inp-pp', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-beri').html();
        target1 = "ppke"+noidx;
        target2 = "nmppke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-pp').val()).length){
            var kode = $(this).val();
            var kode_lokasi= $('#lokasi_beri').val();
            getPP(kode,target1,target2,'change',kode_lokasi,'input-beri');   
            // hitungTotal();
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'PP yang dimasukkan tidak valid'
            });
            return false;
        }
    });

    $('#input-beri').on('keypress', '.inp-pp', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-beri tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val() != undefined){
                $(this).val($("#input-beri tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-terima').on('change', '.inp-pp_terima', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-terima').html();
        target1 = "pp_terimake"+noidx;
        target2 = "nmpp_terimake"+noidx;
        if($.trim($(this).closest('tr').find('.inp-pp_terima').val()).length){
            var kode = $(this).val();
            var kode_lokasi= $('#lokasi_terima').val();
            getPP(kode,target1,target2,'change',kode_lokasi,'input-terima');   
            // hitungTotal();
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'PP yang dimasukkan tidak valid'
            });
            return false;
        }
    });

    $('#input-terima').on('keypress', '.inp-pp_terima', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-terima tbody tr:eq("+(this_index - 1)+")").find('.inp-pp_terima').val() != undefined){
                $(this).val($("#input-terima tbody tr:eq("+(this_index - 1)+")").find('.inp-pp_terima').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-beri').on('change', '.inp-drk', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-beri').html();
        target1 = "drkke"+noidx;
        target2 = "nmdrkke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-drk').val()).length){
            var kode = $(this).val();
            var kode_akun = $(this).parents("tr").find(".td-kode").text();
            var kode_pp = $(this).parents("tr").find(".td-pp").text();
            var periode = $('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2);
            var kode_lokasi = $('#lokasi_beri').val();
            getDRKPemberi(kode,target1,target2,'','change',kode_akun,kode_pp,periode,kode_lokasi,'input-beri');
            // hitungTotal();
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'DRK yang dimasukkan tidak valid'
            });
            return false;
        }
    });

    $('#input-beri').on('keypress', '.inp-drk', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-beri tbody tr:eq("+(this_index - 1)+")").find('.inp-drk').val() != undefined){
                $(this).val($("#input-beri tbody tr:eq("+(this_index - 1)+")").find('.inp-drk').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-terima').on('change', '.inp-drk_terima', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-terima').html();
        target1 = "drk_terimake"+noidx;
        target2 = "nmdrk_terimake"+noidx;
        if($.trim($(this).closest('tr').find('.inp-drk_terima').val()).length){
            var kode = $(this).val();
            var kode_akun = $(this).parents("tr").find(".td-kode_terima").text();
            var kode_pp = $(this).parents("tr").find(".td-pp_terima").text();
            var periode = $('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2);
            var kode_lokasi = $('#lokasi_terima').val();
            getDRK(kode,target1,target2,'','change',kode_akun,kode_pp,periode,kode_lokasi,'input-terima');
            // hitungTotal();
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Inputan tidak valid',
                text: 'DRK yang dimasukkan tidak valid'
            });
            
            return false;
        }
    });

    $('#input-terima').on('keypress', '.inp-drk_terima', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-terima tbody tr:eq("+(this_index - 1)+")").find('.inp-drk_terima').val() != undefined){
                $(this).val($("#input-terima tbody tr:eq("+(this_index - 1)+")").find('.inp-drk_terima').val());
            }else{
                $(this).val('');
            }
        }
    });

    // IMPORT EXCEL

    $('#import-excel-beri').click(function(e){
        $('#jenis_upload').val('BERI');
        var kode_lokasi = $('#lokasi_beri').val();
        if(kode_lokasi == "" || jenis == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Lokasi Pemberi dan Jenis Budget wajib diisi terlebih dahulu!'
            });
            return false;
        }
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

    $('#import-excel-terima').click(function(e){
        $('#jenis_upload').val('TERIMA');
        var kode_lokasi = $('#lokasi_terima').val();
        if(kode_lokasi == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Lokasi Penerima dan Jenis Budget wajib diisi terlebih dahulu!'
            });
            return false;
        }
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
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            formData.append('no_bukti',$('#no_bukti').val());
            formData.append('jenis',$('#jenis_upload').val());
            formData.append('periode',$('#tanggal').val().substr(6,4)+''+$('#tanggal').val().substr(3,2));
            if($('#jenis_upload').val() == "BERI"){
                formData.append('kode_lokasi',$('#lokasi_beri').val());
            }else{
                formData.append('kode_lokasi',$('#lokasi_terima').val());
            }
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
                            console.log(percentComplete);
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
                            console.log(percentComplete);
                            $('.progress-bar').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ url('sukka-trans/aju-rra-excel') }}",
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
                            var jenis = $('#jenis_upload').val();
                            if(jenis == "BERI"){
                                var lokasi = $('#lokasi_beri').val();
                            }else{
                                var lokasi = $('#lokasi_terima').val();
                            }
                            var link = "{{ config('api.url').'sukka-trans/aju-rra-export?nik_user='.Session::get('nikUser').'&nik='.Session::get('userLog') }}&jenis="+jenis+"&kode_lokasi="+lokasi;
                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: JSON.stringify(result.data.message)
                        });
                        $('.pesan-upload-judul').html('Gagal upload!');
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Failed',
                        text: JSON.stringify(textStatus)
                    });
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
        console.log(fileName);
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        var jenis = $('#jenis_upload').val();
        if(jenis == "BERI"){
            var kode_lokasi = $('#lokasi_beri').val();
        }else{
            var kode_lokasi = $('#lokasi_terima').val();
        }
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/aju-rra-tmp') }}",
            dataType: 'json',
            data:{jenis: jenis, kode_lokasi: kode_lokasi},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    if(jenis == "BERI"){
                        if(result.detail.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.detail.length;i++){
                                var line =result.detail[i];
                                input += "<tr class='row-beri'>";
                                input += "<td class='no-beri text-center'>"+no+"</td>";
                                input += "<td class='text-center'><a href='#' class='hapus-item'  style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                                input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+line.kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+line.kode_akun+"'  style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+line.nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                                input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+line.kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+line.kode_pp+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+line.nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+line.nama_pp+"' readonly ></td>";
                                input += "<td><span class='td-drk tddrkke"+no+" tooltip-span'>"+line.kode_drk+"</span><input type='text' id='drkkode"+no+"' name='kode_drk[]' class='form-control inp-drk drkke"+no+" hidden' value='"+line.kode_drk+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama_drk tdnmdrkke"+no+" tooltip-span'>"+line.nama_drk+"</span><input type='text' name='nama_drk[]' class='form-control inp-nama_drk nmdrkke"+no+" hidden'  value='"+line.nama_drk+"' readonly ></td>";
                                input += "<td ><span class='td-tw tdtwke"+no+" tooltip-span'></span><select hidden name='tw[]' class='form-control inp-tw twke"+no+"' value='' ><option value='TW1'>TW1</option><option value='TW2'>TW2</option><option value='TW3'>TW3</option><option value='TW4'>TW4</option></select></td>";
                                input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+number_format(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+number_format(line.nilai)+"' ></td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#input-beri tbody').html(input);
                            $('.tooltip-span').attr('title','tooltip');
                            $('.tooltip-span').tooltip({
                                content: function(){
                                    return $(this).text();
                                },
                                tooltipClass: "custom-tooltip-sai"
                            });
                            no= 1;
                            for(var i=0;i<result.detail.length;i++){
                                var line =result.detail[i];
                                var tw = line.tw;
                                $('.twke'+no).selectize({
                                    selectOnTab:true,
                                    onChange: function(value) {
                                        $('.tdtwke'+no).text(value);
                                        hitungTotalBeri();
                                    }
                                });
                                $('.twke'+no)[0].selectize.setValue(tw,true);
                                $('.tdtwke'+no).text(tw);
                                $('.selectize-control.twke'+no).addClass('hidden');
                                $('.nilke'+no).inputmask("numeric", {
                                    radixPoint: ",",
                                    groupSeparator: ".",
                                    digits: 2,
                                    autoGroup: true,
                                    rightAlign: true,
                                    oncleared: function () { self.Value(''); }
                                });
                                no++;
                            }
                            
                            hitungTotalBeri();
                            hitungTotalRowBeri();
                            
                        }
                    }else{

                        if(result.detail.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.detail.length;i++){
                                var line =result.detail[i];
                                input += "<tr class='row-terima'>";
                                input += "<td class='no-terima text-center'>"+no+"</td>";
                                input += "<td class='text-center'><a href='#' class='hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                                input += "<td><span class='td-kode_terima tdakunterimake"+no+" tooltip-span'>"+line.kode_akun+"</span><input type='text' name='kode_akun_terima[]' class='form-control inp-kode_terima akun_terimake"+no+" hidden' value='"+line.kode_akun+"' style='z-index: 1;position: relative;' id='akun_terimakode"+no+"'><a href='#' class='search-item search-akun_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama_terima tdnmakun_terimake"+no+" tooltip-span'>"+line.nama_akun+"</span><input type='text' name='nama_akun_terima[]' class='form-control inp-nama_terima nmakun_terimake"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                                input += "<td><span class='td-pp_terima tdpp_terimake"+no+" tooltip-span'>"+line.kode_pp+"</span><input type='text' id='pp_terimakode"+no+"' name='kode_pp_terima[]' class='form-control inp-pp_terima pp_terimake"+no+" hidden' value='"+line.kode_pp+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama_pp_terima tdnmpp_terimake"+no+" tooltip-span'>"+line.nama_pp+"</span><input type='text' name='nama_pp_terima[]' class='form-control inp-nama_pp_terima nmpp_terimake"+no+" hidden'  value='"+line.nama_pp+"' readonly ></td>";
                                input += "<td><span class='td-drk_terima tddrk_terimake"+no+" tooltip-span'>"+line.kode_drk+"</span><input type='text' id='drk_terimakode"+no+"' name='kode_drk_terima[]' class='form-control inp-drk_terima drk_terimake"+no+" hidden' value='"+line.kode_drk+"'   style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk_terima hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                                input += "<td><span class='td-nama_drk_terima tdnmdrk_terimake"+no+" tooltip-span'>"+line.nama_drk+"</span><input type='text' name='nama_drk_terima[]' class='form-control inp-nama_drk_terima nmdrk_terimake"+no+" hidden'  value='"+line.nama_drk+"' readonly ></td>";
                                input += "<td ><span class='td-tw_terima tdtw_terimake"+no+" tooltip-span'></span><select hidden name='tw_terima[]' class='form-control inp-tw_terima tw_terimake"+no+"' value='' ><option value='TW1'>TW1</option><option value='TW2'>TW2</option><option value='TW3'>TW3</option><option value='TW4'>TW4</option></select></td>";
                                input += "<td class='text-right'><span class='td-nilai_terima tdnil_terimake"+no+" tooltip-span'>"+number_format(line.nilai)+"</span><input type='text' name='nilai_terima[]' class='form-control inp-nilai_terima nil_terimake"+no+" hidden'  value='"+number_format(line.nilai)+"' ></td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#input-terima tbody').html(input);
                            $('.tooltip-span').attr('title','tooltip');
                            $('.tooltip-span').tooltip({
                                content: function(){
                                    return $(this).text();
                                },
                                tooltipClass: "custom-tooltip-sai"
                            });
                            no= 1;
                            for(var i=0;i<result.detail.length;i++){
                                var line =result.detail[i];
                                var tw = line.tw;
                                $('.tw_terimake'+no).selectize({
                                    selectOnTab:true,
                                    onChange: function(value) {
                                        $('.tdtw_terimake'+no).text(value);
                                        hitungTotalTerima();
                                    }
                                });
                                $('.tw_terimake'+no)[0].selectize.setValue(tw,true);
                                $('.tdtw_terimake'+no).text(tw);
                                $('.selectize-control.tw_terimake'+no).addClass('hidden');
                                $('.nil_terimake'+no).inputmask("numeric", {
                                    radixPoint: ",",
                                    groupSeparator: ".",
                                    digits: 2,
                                    autoGroup: true,
                                    rightAlign: true,
                                    oncleared: function () { self.Value(''); }
                                });
                                no++;
                            }
                            
                            hitungTotalTerima();
                            hitungTotalRowTerima();
                        }
                    }

                    if(typeof M == 'undefined'){
                        $('#modal-import').modal('hide');
                    }else{
                        $('#modal-import').bootstrapMD('hide');
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Failed',
                        text: JSON.stringify(result.message)
                    });
                }
            }
        });
    });

    function hapusDok(param){
        var no_bukti = param.no_bukti; 
        var kode_jenis= param.kode_jenis;
        var nama_file= param.nama_file;
        var td_nama_file= param.td_nama_file;
        var action_dok= param.action_dok;
        var no_urut= param.no_urut;
        console.log(param);
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sukka-trans/aju-rra-dok') }}",
            dataType: 'json',
            data: {'no_bukti':no_bukti,'kode_jenis':kode_jenis, 'no_urut':no_urut},
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
                        text:'Dokumen Pengajuan RRA '+kode_jenis+' dengan no urut: '+no_urut+' berhasil dihapus'
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

    $('#input-dok').on('click', '.hapus-dok', function(){
        var no_bukti = $('#no_bukti').val();
        var kode_jenis = $(this).closest('tr').find('.inp-jenis').val();
        var nama_file = $(this).closest('tr').find('.inp-nama_file');
        var td_nama_file = $(this).closest('tr').find('.td-nama_file');
        var action_dok = $(this).closest('tr').find('.action-dok');
        var no_urut = $(this).closest('tr').find('.inp-no_urut').val();
        var ini = $(this);
        msgDialog({
            id: kode_jenis,
            text: 'Dokumen akan terhapus secara permanen dari server dan tidak dapat mengurungkan.<br> ID Data : <b>'+kode_jenis+'</b> No urut : <b>'+no_urut+'</b>',
            param: {'kode_jenis':kode_jenis,'no_bukti':no_bukti,'nama_file':nama_file,'td_nama_file':td_nama_file,'action_dok':action_dok, 'no_urut':no_urut,'ini':ini,'form':'form-tambah'},
            type:'hapusDok'
        });
       
    });

    $('#input-dok').on('click', '.hapus-dok2', function(){
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
            url: "{{ url('sukka-trans/aju-rra-email') }}",
            dataType: 'json',
            data:{'no_pooling': id},
            async:false,
            success:function(res){
                console.log(res);
            }
        });
    }

    $('a[href="#data-lokasi"]').on('shown.bs.tab', function (e) {
        resizeNameField("lokasi_beri");
        resizeNameField("lokasi_terima");
    })

    $('#download-template').click(function(){
        var kode_lokasi = $('#lokasi_terima').val();
        if(kode_lokasi == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Lokasi Penerima wajib diisi terlebih dahulu!'
            });
            return false;
        }
        var nik_user = "{{ Session::get('nikUser') }}";
        var nik = "{{ Session::get('userLog') }}";
        var jenis = "TERIMA";
        var link = "{{ config('api.url').'sukka-trans/aju-rra-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=template&jenis="+jenis;
        window.open(link, '_blank'); 
    });

    $('#download-template2').click(function(){
        var kode_lokasi = $('#lokasi_beri').val();
        if(kode_lokasi == ""){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Lokasi Pemberi wajib diisi terlebih dahulu!'
            });
            return false;
        }
        var nik_user = "{{ Session::get('nikUser') }}";
        var nik = "{{ Session::get('userLog') }}";
        var jenis = "BERI";
        var link = "{{ config('api.url').'sukka-trans/aju-rra-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=template&jenis="+jenis;
        window.open(link, '_blank'); 
    });
    
    </script>