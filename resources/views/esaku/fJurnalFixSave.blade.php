    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Jurnal" tambah="true" :thead="array('No Bukti','Tanggal','No Dokumen','Deskripsi','Nilai','Posting','Tgl Input','Aksi')" :thwidth="array(15,15,15,20,15,10,0,10)" :thclass="array('','','','','','','','text-center')" />
    <!-- END LIST DATA -->
    <style>
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
    
        #btn-kembali
        {
            line-height:1.5;padding: 0;background: none;appearance: unset;opacity: unset;right: -40px;position: relative;
            top: 0;
            z-index: 10;
            float: right;
            margin-top: -30px;
        }
        #btn-kembali > span 
        {
            border-radius: 50%;padding: 0 0.45rem 0.1rem 0.45rem;background: white;color: black;font-size: 1.2rem !important;font-weight: lighter;box-shadow:0px 1px 5px 1px #80808054
        }

        #btn-kembali > span:hover
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
    </style>
    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <!-- <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button> -->
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="tanggal">Tanggal</label>
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_dokumen">Dokumen</label>
                                        <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <!-- <label for="jenis" >Jenis</label>
                                        <select class='form-control selectize' id="jenis" name="jenis">
                                        <option value=''>--- Pilih Jenis ---</option>
                                        <option value='MI' selected>MI</option>
                                        </select> -->
                                        <input class="form-control" type="hidden" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                                        <input class="form-control" type="hidden" placeholder="No Bukti" id="kode_form" name="kode_form" readonly>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nik_periksa" >NIK Periksa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_nik_periksa" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-nik_periksa" id="nik_periksa" name="nik_periksa" value="" title="">
                                            <span class="info-name_nik_periksa hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_nik_periksa"></i>
                                        </div>
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
                                        <label for="total_debet" >Total Debet</label>
                                        <input class="form-control currency" type="text" placeholder="Total Debet" readonly id="total_debet" name="total_debet" value="0">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="total_kredit" >Total Kredit</label>
                                        <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total_kredit" name="total_kredit" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-jurnal" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Jurnal</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Berkas Bukti</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-jurnal" role="tabpanel">

                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                    
                                    <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Jurnal <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="{{ config('api.url').'toko-auth/storage/template_upload_jurnal_esaku.xlsx' }}" target='_blank' id="download-template" >Download Template</a>
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


                                        #input-grid td:nth-child(4)
                                        {
                                            overflow:unset !important;
                                        }
                                    </style>
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
                        </div>
                        <div class="card-body-footer">
                            <button type="submit" class="btn btn-primary ml-2"  style="float: right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
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
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 class="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2 btn-save"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali-upload" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
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
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM UPLOAD  -->

    @include('modal_search')
    @include('modal_upload')
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    
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

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotalRowUpload(form){
        var total_row = $('#'+form+' #input-dok tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }

    function hitungTotal(){
        
        var total_d = 0;
        var total_k = 0;

        $('.row-jurnal').each(function(){
            var dc = $(this).closest('tr').find('.td-dc').text();
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            if(dc == "D"){
                total_d += +toNilai(nilai);
            }else{
                total_k += +toNilai(nilai);
            }
        });

        $('#total_debet').val(total_d);
        $('#total_kredit').val(total_k);
        
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
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollformupl = document.querySelector('.form-upload');
    var psscrollformupl = new PerfectScrollbar(scrollformupl);
    
    
    $('.selectize').selectize();
    
    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
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
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getDataTypeAhead("{{ url('esaku-master/unit') }}","kode_pp","kode_pp");
    getDataTypeAhead("{{ url('esaku-master/nikperiksa') }}","nik_periksa","nik");
    getDataTypeAhead("{{ url('esaku-master/masakun') }}","kode_akun","kode_akun");

    $('#nik_periksa').typeahead({
        source:$dtnik_periksa,
        fitToElement:true,
        displayText:function(item){
            return item.id+' - '+item.name;
        },
        autoSelect:false,
        changeInputOnSelect:false,
        changeInputOnMove:false,
        selectOnBlur:false,
        afterSelect: function (item) {
            console.log(item.id);
        }
    });
    // END SUGGESTION

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var action_html2 = "<a href='#' title='Upload' id='btn-upload'><i class='simple-icon-cloud-upload' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/jurnal') }}", 
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
            {   'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {
                "targets" : 5,
                "data": null,
                "className": 'text-center',
                "render": function ( data, type, row, meta ) {
                    if(row.posted == "Close"){
                        return `<button type="button" class="btn p-0"  
                                data-toggle="popover" data-placement="top"
                                data-content="Transaksi ini telah diposting sehingga tidak dapat dirubah ataupun dihapus."><i class="saicon icon-close bg-success"></i>
                            </button>`;
                    }else{
                        return `<button type="button" class="btn p-0"  
                                data-toggle="popover" data-placement="top"
                                data-content="Transaksi ini belum diposting sehingga dapat dirubah ataupun dihapus.">
                                <i class="saicon icon-open"></i>
                            </button>`;
                    }
                }
            },
            {
                "targets": [6],
                "visible": false,
                "searchable": false
            },
            {
                "targets" : 7,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    if(row.posted == "Close"){
                        return action_html2;
                    }else{
                        return action_html;
                    }
                }
            }
            // {   'targets': 7, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai1' },
            { data: 'posted' },
            { data: 'tgl_input' }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[6 ,"desc"]]
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
    function getPP(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-master/unit') }}/"+kode,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);

                        }else{
                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-pp').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode PP tidak valid');   
                    }
                }
            }
        });
    }

    function getNIKPeriksa(id){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/nikperiksa') }}/"+kode,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('nik_periksa',result.daftar[0].nik,result.daftar[0].nama);
                    }else{
                        $('#nik_periksa').attr('readonly',false);
                        $('#nik_periksa').css('border-left','1px solid #d7d7d7');
                        $('#nik_periksa').val('');
                        $('#nik_periksa').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getAkun(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-master/masakun') }}/"+kode,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            // $('.'+target3)[0].selectize.focus();
                            $('.td'+target3).text('D');
                        }else{

                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-akun').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                            $('.td'+target3).text('D');
                        }
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode akun tidak valid');
                    }
                }
            }
        });
    }

    // END CBBL

    // BUTTON EDIT
    function editData(id){
        
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/jurnal') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#tanggal').val(reverseDate2(result.jurnal[0].tanggal,'-','/'));
                    $('#deskripsi').val(result.jurnal[0].deskripsi);
                    $('#nik_periksa').val(result.jurnal[0].nik_periksa);
                    $('#no_dokumen').val(result.jurnal[0].no_dokumen);
                    $('#total_debet').val(result.jurnal[0].nilai1);
                    $('#total_kredit').val(result.jurnal[0].nilai1);
                    // $('#jenis').val(result.jurnal[0].jenis);
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-jurnal'>";
                            input += "<td class='no-jurnal text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+line.kode_akun+"</span><input type='text' id='akunkode"+no+"' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+line.kode_akun+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+line.nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                            input += "<td ><span class='td-dc tddcke"+no+" tooltip-span'>"+line.dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+line.dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
                            input += "<td ><span class='td-ket tdketke"+no+" tooltip-span'>"+line.keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+line.keterangan+"' required></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+format_number(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td ><span class='td-pp tdppke"+no+" tooltip-span'>"+line.kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+line.kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+line.nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+line.nama_pp+"' readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
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
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            $('.dcke'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    $('.tddcke'+no).text(value);
                                    hitungTotal();
                                }
                            });
                            $('#akunkode'+no).typeahead({
                                source:$dtkode_akun,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });

                            $('#ppkode'+no).typeahead({
                                source:$dtkode_pp,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            $('.dcke'+no)[0].selectize.setValue(line.dc);
                            $('.selectize-control.dcke'+no).addClass('hidden');
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

                    var input2 = "";
                    if(result.dokumen.length > 0){
                        var no=1;
                        for(var i=0;i<result.dokumen.length;i++){
                            var line =result.dokumen[i];
                            input2 += "<tr class='row-dok'>";
                            input2 += "<td class='no-dok text-center'>"+no+"</td>";
                            input2 += "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='jenis[]' class='form-control inp-jenis jeniske"+no+" ' value='"+line.jenis+"' required='' style='z-index: 1;' id='jeniskode"+no+"'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
                            input2 += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='"+line.nama+"' readonly></td>";
                            var dok = "{{ config('api.url').'toko-auth/storage' }}/"+line.fileaddres;
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
                    hitungTotal();
                    hitungTotalRow();
                    hitungTotalRowUpload("form-tambah");
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#kode_form').val($form_aktif);
                    showInfoField("nik_periksa",result.jurnal[0].nik_periksa,result.jurnal[0].nama_periksa);
                    setWidthFooterCardBody();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Jurnal');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/jurnal') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Jurnal ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Jurnal');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-grid tbody').html('');
        $('#input-dok tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#kode_form').val($form_aktif);
        addRow("default");
        setWidthFooterCardBody();
    });
    // END BUTTON TAMBAH

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form-upload').on('click', '#btn-kembali-upload', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
    // END BUTTON KEMBALI

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
            var posted = $(this).closest('tr').find('td').eq(5).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-trans/jurnal') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(res){
                    var result= res.data;
                    if(result.status){

                        var html = `<tr>
                            <td style='border:none'>No Bukti</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>`+reverseDate2(result.jurnal[0].tanggal,'-','/')+`</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>`+result.jurnal[0].deskripsi+`</td>
                        </tr>
                        <tr>
                            <td>No Dokumen</td>
                            <td>`+result.jurnal[0].no_dokumen+`</td>
                        </tr>
                        <tr>
                            <td>NIK Verifikasi</td>
                            <td>`+result.jurnal[0].nik_periksa+`</td>
                        </tr>
                        <tr>
                            <td>Total Debet</td>
                            <td>`+format_number(result.jurnal[0].nilai1)+`</td>
                        </tr>
                        <tr>
                            <td>Total Kredit</td>
                            <td>`+format_number(result.jurnal[0].nilai1)+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-ju-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode Akun</th>
                                            <th style="width:18%">Nama Akun</th>
                                            <th style="width:5%">DC</th>
                                            <th style="width:20%">Keterangan</th>
                                            <th style="width:15%">Nilai</th>
                                            <th style="width:7">Kode PP</th>
                                            <th style="width:17">Nama PP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>`;
                        
                        $('#table-preview tbody').html(html);
                        var det = ``;
                        if(result.detail.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.detail.length;i++){
                                var line =result.detail[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td >"+line.kode_akun+"</td>";
                                input += "<td >"+line.nama_akun+"</td>";
                                input += "<td >"+line.dc+"</td>";
                                input += "<td >"+line.keterangan+"</td>";
                                input += "<td class='text-right'>"+format_number(line.nilai)+"</td>";
                                input += "<td >"+line.kode_pp+"</td>";
                                input += "<td >"+line.nama_pp+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-ju-preview tbody').html(input);
                        }
                        if(posted == "Close"){
                            $('#btn-delete2').css('display','none');
                            $('#btn-edit2').css('display','none');
                        }else{
                            $('#btn-delete2').css('display','inline-block');
                            $('#btn-edit2').css('display','inline-block');
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#judul-form').html('Edit Data Jurnal');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#modal-preview').modal('hide');
        editData(id);
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
        console.log('ok');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
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
            var total_d = $('#total_debet').val();
            var total_k = $('#total_kredit').val();
            var jumdet = $('#input-grid tr').length;

            var param = $('#id').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/esaku-trans/jurnal') }}/"+id;
            }else{
                var url = "{{ url('/esaku-trans/jurnal') }}";
            }

            if(total_d != total_k){
                alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak sama');
            }else if( total_d <= 0 || total_k <= 0){
                alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak boleh sama dengan 0 atau kurang');
            }else if(jumdet <= 1){
                alert('Transaksi tidak valid. Detail jurnal tidak boleh kosong ');
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
                            $('#judul-form').html('Tambah Data Jurnal');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
                            
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'simpan'
                            });
                                

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
    $('#tanggal,#no_dokumen,#deskripsi,#nik_periksa,#total_debet,#total_kredit').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','no_dokumen','deskripsi','nik_periksa','total_debet','total_kredit'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 3){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
                $('#'+nxt[idx]).focus();
            }
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
        var options = {
            id : id,
            header : ['NIK', 'Nama'],
            url : "{{ url('esaku-trans/nikperiksa') }}",
            columns : [
                { data: 'nik' },
                { data: 'nama' }
            ],
            judul : "Daftar Karyawan",
            pilih : "nik",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            width : ["30%","70%"]
        }
        showInpFilter(options);
    });

    $('#form-tambah').on('change', '#nik_periksa', function(){
        var par = $(this).val();
        getNIKPeriksa(par);
    });


    // GRID JURNAL
    function addRow(param){
        if(param == "copy"){
            var kode_akun = $('#input-grid tbody tr.selected-row').find(".inp-kode").val();
            var nama_akun = $('#input-grid tbody tr.selected-row').find(".inp-nama").val();
            var dc = $('#input-grid tbody tr.selected-row').find(".td-dc").text();
            var keterangan = $('#input-grid tbody tr.selected-row').find(".inp-ket").val();
            var nilai = $('#input-grid tbody tr.selected-row').find(".inp-nilai").val();
            var kode_pp = $('#input-grid tbody tr.selected-row').find(".inp-pp").val();
            var nama_pp = $('#input-grid tbody tr.selected-row').find(".inp-nama_pp").val();
        }else{
            
            var kode_akun = "";
            var nama_akun = "";
            var dc = "";
            var keterangan = "";
            var nilai = "";
            var kode_pp = "";
            var nama_pp = "";
        }
        var no=$('#input-grid .row-jurnal:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-jurnal'>";
        input += "<td class='no-jurnal text-center'>"+no+"</td>";
                                    
        input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
        input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='' required><option value='D'>D</option><option value='C'>C</option></select></td>";
        input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
        input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly ></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);

        if(param != "copy"){
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');
        }

        $('.dcke'+no).selectize({
            selectOnTab:true,
            onChange: function(value) {
                $('.tddcke'+no).text(value);
                hitungTotal();
            }
        });
        $('.dcke'+no)[0].selectize.setValue(dc);
        $('.selectize-control.dcke'+no).addClass('hidden');
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
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-kode").show();
            $('#input-grid tbody tr:last').find(".td-kode").hide();
            $('#input-grid tbody tr:last').find(".search-akun").show();
            $('#input-grid tbody tr:last').find(".inp-kode").focus();
        }

        $('#akunkode'+no).typeahead({
            source:$dtkode_akun,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('#ppkode'+no).typeahead({
            source:$dtkode_pp,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
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
        console.log(no);
        var input = "";
        input += "<tr class='row-dok'>";
        input += "<td class='no-dok text-center'>"+no+"</td>";
        input += "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='jenis[]' class='form-control inp-jenis jeniske"+no+" ' value='' required='' style='z-index: 1;' id='jeniskode"+no+"'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
        input += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='' readonly></td>";
        input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>-</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='-' readonly></td>";
        input+=`
        <td>
        <input type='file' name='file_dok[]'>
        <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
        </td>`;
        input+=`
        <td class='text-center action-dok'><a class='hapus-dok2'><i class='simple-icon-trash' style='font-size:18px'></i></a></td></tr>`;
        console.log(form);
        $('#'+form+' #input-dok tbody').append(input);
        hitungTotalRowUpload(form);
    }

    function custTarget(target,tr){
        $(target).parents("tr").find(".inp-pp").val(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".td-pp").text(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".inp-pp").hide();
        $(target).parents("tr").find(".td-pp").show();
        $(target).parents("tr").find(".search-pp").hide();
        $(target).parents("tr").find(".inp-nama_pp").show();
        $(target).parents("tr").find(".td-nama_pp").hide();
        // $($target).parents("tr").find(".inp-nama_pp").attr('readonly',false);
        
        setTimeout(function() {  $(target).parents("tr").find(".inp-nama_pp").focus(); }, 100);
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
            case 'jenis[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/dok-jenis') }}",
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
        showInpFilter(options);

    });

    $('#form-upload #input-dok').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        var tmp = $(this).closest('tr').find('input[name="nama_dok[]"]').attr('class');
        var tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        console.log(par,target1,target2)
        
        switch(par){
            case 'jenis[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/dok-jenis') }}",
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
        showInpFilter(options);

    });

    $('#input-grid').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        
        switch(par){
            case 'kode_akun[]': 
                var par2 = "nama_akun[]";
                
            break;
            case 'kode_pp[]': 
                var par2 = "nama_pp[]";
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
                    url : "{{ url('esaku-master/masakun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : ".td-dc",
                    width : ["30%","70%"]
                };
            break;
            case 'kode_pp[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/unit') }}",
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
                    target4 : "custom",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilter(options);

    });
    
    $('#input-grid').on('keydown','.inp-kode, .inp-nama, .inp-dc, .inp-ket, .inp-nilai, .inp-pp, .inp-nama_pp',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama','.inp-dc','.inp-ket','.inp-nilai','.inp-pp','.inp-nama_pp'];
        var nxt2 = ['.td-kode','.td-nama','.td-dc','.td-ket','.td-nilai','.td-pp','.td-nama_pp'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-jurnal").text();
                    var kode = $(this).val();
                    var target1 = "akunke"+noidx;
                    var target2 = "nmakunke"+noidx;
                    var target3 = "dcke"+noidx;
                    getAkun(kode,target1,target2,target3,'tab');                    
                    break;
                case 1:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    
                    break;
                case 2:
                    var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                    if(isi == 'D' || isi == 'C'){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        if ($(this).closest('tr').find(nxt[idx_next]).val() == ""){
                            var index = $(this).closest('tr').index();
                            if(index == 0){
                                $(this).closest('tr').find(nxt[idx_next]).val($('#deskripsi').val());
                            }else{
                                var deskripsi = $("#input-grid tbody tr:eq("+(index - 1)+")").find('.inp-ket').val();
                                $(this).closest('tr').find(nxt[idx_next]).val(deskripsi);
                            }
                        }

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                    }else{
                        alert('Posisi yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 3:
                    if($.trim($(this).val()).length){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        if ($(this).closest('tr').find(nxt[idx_next]).val() == ""){
                            var index = $(this).closest('tr').index();
                            var dc = $(this).closest('tr').find(nxt[idx-1]).val();
                            if(dc == 'D' || dc == 'C'){
                                var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
                                $(this).closest('tr').find(nxt[idx_next]).val(selisih);
                                $(this).closest('tr').find(nxt2[idx_next]).text(selisih);
                            }else{
                                alert('Posisi tidak valid, harap pilih posisi akun');
                                $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
                            }
                        }

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Keterangan yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find('.search-pp').show();
                        hitungTotal();
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 5:
                    var noidx = $(this).parents("tr").find(".no-jurnal").text();
                    var kode = $(this).val();
                    var target1 = "ppke"+noidx;
                    var target2 = "nmppke"+noidx;
                    getPP(kode,target1,target2,'tab');
                    break;
                case 6:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    // $('.add-row').click();
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

    $('#form-tambah').on('click', '.add-row', function(){
        addRow("add");
    });

    $('#form-upload').on('click', '.add-row-dok', function(){
        addRowDok("form-upload");
    });

    $('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
    });

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var dc = $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text();
                var keterangan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val();
                var nilai = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();
                var kode_pp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var nama_pp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dc")[0].selectize.setValue(dc);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text(dc);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-ket").text(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(kode_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(kode_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val(nama_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").text(nama_pp);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-ket").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").show();
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
            $('.row-jurnal').each(function(){
                var nom = $(this).closest('tr').find('.no-jurnal');
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
        
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var dc = $(this).parents("tr").find(".td-dc").text();
                var keterangan = $(this).parents("tr").find(".inp-ket").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var kode_pp = $(this).parents("tr").find(".inp-pp").val();
                var nama_pp = $(this).parents("tr").find(".inp-nama_pp").val();
                var no = $(this).parents("tr").find(".no-jurnal").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if(idx == 1){
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
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }
        
                
                $(this).parents("tr").find(".inp-dc")[0].selectize.setValue(dc);
                $(this).parents("tr").find(".td-dc").text(dc);
                if(idx == 3){
                    $('.dcke'+no)[0].selectize.setValue(dc);
                    var dcx = $('.tddcke'+no).text();
                    if(dcx == ""){
                        $('.tddcke'+no).text('D');  
                    }
                    
                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-dc").hide();
                    $(this).parents("tr").find(".inp-dc")[0].selectize.focus();
                    
                }else{
                    
                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-dc").show();
                }
        
                var idx_tr = $(this).closest('tr').index();
                if(keterangan == "" && idx == 4){
                    if(idx_tr == 0){
                        var deskripsi = $('#deskripsi').val();
                    }else{
                        var deskripsi = $("#input-grid tbody tr:eq("+(idx_tr - 1)+")").find('.inp-ket').val();
                    }
                    $(this).parents("tr").find(".inp-ket").val(deskripsi);
                    $(this).parents("tr").find(".td-ket").text(deskripsi);
                }else{

                    $(this).parents("tr").find(".inp-ket").val(keterangan);
                    $(this).parents("tr").find(".td-ket").text(keterangan);
                }
                if(idx == 4){
                    $(this).parents("tr").find(".inp-ket").show();
                    $(this).parents("tr").find(".td-ket").hide();
                    $(this).parents("tr").find(".inp-ket").focus();
                }else{
                    $(this).parents("tr").find(".inp-ket").hide();
                    $(this).parents("tr").find(".td-ket").show();
                }
        
                if(nilai == "" && idx == 5){
                    if(dc == 'D' || dc == 'C'){
                        var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
                        $(this).parents("tr").find(".inp-nilai").val(selisih);
                        $(this).parents("tr").find(".td-nilai").text(selisih);
                    }else{
                        alert('Posisi tidak valid, harap pilih posisi akun');
                        $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
                    }
                    
                }else{

                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                }
                if(idx == 5){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
        
                $(this).parents("tr").find(".inp-pp").val(kode_pp);
                $(this).parents("tr").find(".td-pp").text(kode_pp);
                if(idx == 6){
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
                if(idx == 7){
                    
                    $(this).parents("tr").find(".inp-nama_pp").show();
                    $(this).parents("tr").find(".td-nama_pp").hide();
                    $(this).parents("tr").find(".inp-nama_pp").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_pp").hide();
                    $(this).parents("tr").find(".td-nama_pp").show();
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
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotal();
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-grid').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var noidx =  $(this).parents('tr').find('.no-jurnal').html();
        target1 = "akunke"+noidx;
        target2 = "nmakunke"+noidx;
        target3 = "dcke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getAkun(kode,target1,target2,target3,'change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Akun yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('keypress', '.inp-kode', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-grid').on('keypress', '.inp-dc', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue() != undefined){
                $(this)[0].selectize.setValue($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue());
            }else{
                $(this)[0].selectize.setValue('');
            }
        }
    });

    $('#input-grid').on('keypress', '.inp-ket', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-grid').on('keypress', '.inp-nilai', function(e){
        if (e.which == 42) {
            e.preventDefault();
            var dc = $(this).closest('tr').find('.inp-dc')[0].selectize.getValue();
            if(dc == 'D' || dc == 'C'){
                var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
                $(this).val(selisih);
            }else{
                alert('Posisi tidak valid, harap pilih posisi akun');
                $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
            }
        }
    });

    $('#input-grid').on('change', '.inp-nilai', function(){
        console.log('change-nilai');
        if($(this).closest('tr').find('.inp-nilai').val() != "" && $(this).closest('tr').find('.inp-nilai').val() != 0){
            hitungTotal();
            $(this).closest('tr').find('.inp-pp').val();
        }
        else{
            alert('Nilai yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('change', '.inp-pp', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no-jurnal').html();
        target1 = "ppke"+noidx;
        target2 = "nmppke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-pp').val()).length){
            var kode = $(this).val();
            getPP(kode,target1,target2,'change');
            // hitungTotal();
        }else{
            alert('PP yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('keypress', '.inp-pp', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val());
            }else{
                $(this).val('');
            }
        }
    });

    // IMPORT EXCEL

    $('#import-excel').click(function(e){
        $('.custom-file-input').val('');
        $('.custom-file-label').text('File upload');
        $('.pesan-upload .pesan-upload-judul').html('');
        $('.pesan-upload .pesan-upload-isi').html('')        
        $('.pesan-upload').hide();
        $('#modal-import').modal('show');
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
                url: "{{ url('esaku-trans/import-excel') }}",
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
                            var link = "{{ config('api.url').'toko-trans/export?kode_lokasi='.Session::get('lokasi').'&nik_user='.Session::get('nikUser').'&nik='.Session::get('userLog') }}";
                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
        console.log(fileName);
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/jurnal-tmp') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-jurnal'>";
                            input += "<td class='no-jurnal text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+line.kode_akun+"</span><input type='text' id='akunkode"+no+"' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+line.kode_akun+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+line.nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                            input += "<td ><span class='td-dc tddcke"+no+" tooltip-span'>"+line.dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+line.dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
                            input += "<td ><span class='td-ket tdketke"+no+" tooltip-span'>"+line.keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+line.keterangan+"' required></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+format_number(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td ><span class='td-pp tdppke"+no+" tooltip-span'>"+line.kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+line.kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+line.nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+line.nama_pp+"' readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
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
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            $('.dcke'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    $('.tddcke'+no).text(value);
                                    hitungTotal();
                                }
                            });
                            $('#akunkode'+no).typeahead({
                                source:$dtkode_akun,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });

                            $('#ppkode'+no).typeahead({
                                source:$dtkode_pp,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            $('.dcke'+no)[0].selectize.setValue(line.dc);
                            $('.selectize-control.dcke'+no).addClass('hidden');
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
                    hitungTotal();
                    hitungTotalRow();
                    $('#modal-import').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    alert('error');
                }
            }
        });
    });

    // UPLOAD DOK
    $('#saku-datatable').on('click', '#btn-upload', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('.judul-form').html('Upload Dokumen Jurnal');
        $('#form-upload')[0].reset();
        $('#form-upload').validate().resetForm();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/jurnal-dok') }}",
            dataType: 'json',
            data:{no_bukti:id},
            async:false,
            success:function(res){
                var result= res.data;
                var input = '';
                $('#input-dok tbody').html(input);
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti_upload').val(id);
                    if(result.data_dokumen.length > 0){
                        var no=1;
                        for(var i=0;i<result.data_dokumen.length;i++){
                            var line =result.data_dokumen[i];
                            input += "<tr class='row-dok'>";
                            input += "<td class='no-dok text-center'>"+no+"</td>";
                            input += "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='jenis[]' class='form-control inp-jenis jeniske"+no+" ' value='"+line.jenis+"' required='' style='z-index: 1;' id='jeniskode"+no+"'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
                            input += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='"+line.nama+"' readonly></td>";
                            var dok = "{{ config('api.url').'toko-auth/storage' }}/"+line.fileaddres;
                            input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>"+line.fileaddres+"</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='"+line.fileaddres+"' readonly></td>";
                            if(line.fileaddres == "-" || line.fileaddres == ""){
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]' class='inp-file_dok'>
                                    <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
                                </td>`;
                            }else{
                                input+=`
                                <td>
                                    <input type='file' name='file_dok[]'>
                                    <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
                                </td>`;
                            }
                            input+=`
                                <td class='text-center action-dok'>`;
                                if(line.fileaddres != "-"){
                                   var link =`<a class='download-dok' href='`+dok+`'target='_blank' title='Download'><i style='font-size:18px' class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok' href='#' title='Hapus Dokumen'><i class='simple-icon-trash' style='font-size:18px' ></i></a>`;
                                }else{
                                    var link =``;
                                }
                            input+=link+"</td></tr>";
                            no++;
                        }
                        $('#input-dok tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        
                    }
                    hitungTotalRowUpload('form-upload');
                    $('#saku-datatable').hide();
                    $('#saku-form-upload').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
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
            url: "{{ url('esaku-trans/jurnal-dok') }}",
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
                        text:'Dokumen Jurnal '+kode_jenis+' dengan no urut: '+no_urut+' berhasil dihapus'
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

    $('#form-upload > #input-dok').on('click', '.hapus-dok', function(){
        var no_bukti = $('#no_bukti_upload').val();
        var kode_jenis = $(this).closest('tr').find('.inp-jenis').val();
        var nama_file = $(this).closest('tr').find('.inp-nama_file');
        var td_nama_file = $(this).closest('tr').find('.td-nama_file');
        var action_dok = $(this).closest('tr').find('.action-dok');
        var no_urut = $(this).closest('tr').find('.inp-no_urut').val();
        var ini = $(this);
        msgDialog({
            id: kode_jenis,
            text: 'Dokumen akan terhapus secara permanen dari server dan tidak dapat mengurungkan.<br> ID Data : <b>'+kode_jenis+'</b> No urut : <b>'+no_urut+'</b>',
            param: {'kode_jenis':kode_jenis,'no_bukti':no_bukti,'nama_file':nama_file,'td_nama_file':td_nama_file,'action_dok':action_dok, 'no_urut':no_urut,'ini':ini,'form':'form-upload'},
            type:'hapusDok'
        });
       
    });

    $('#form-tambah > #input-dok').on('click', '.hapus-dok', function(){
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

    $('#form-upload > #input-dok').on('click', '.hapus-dok2', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        hitungTotalRowUpload('form-upload');
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
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

    $("#form-upload").validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-trans/jurnal-dok') }}",
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'simpan'
                        });
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

    
    </script>