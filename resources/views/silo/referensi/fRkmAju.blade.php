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
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" required></textarea>
                                    </div>
                                    <div class="col-md-2" hidden>
                                        <input type="text" name="flag_draft" value="0" id="flag_draft" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="komentar">Komentar</label>
                                        <textarea class="form-control" rows="3" id="komentar" name="komentar" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-rkm" role="tab" aria-selected="true"><span class="hidden-xs-down">Data RKM</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true"><span class="hidden-xs-down">Berkas</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-rkm" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                    <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload <i class='simple-icon-arrow-down' style="font-size:10px"></i></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#" target='_blank' id="download-template" >Download Template</a>
                                            <a class="dropdown-item" href="#" id="import-excelx" >Upload</a>
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
                                            <th width="10%" colspan="2">Aksi</th>
                                            <th width="40%">Nama RKM</th>
                                            <th width="50%">DAM</th>
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
                                <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
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

    function cekAksesForm(){
        // $('#grid-load').show();
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/cek-akses-form') }}",
            dataType: 'json',
            data: { modul:'RKM' },
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

    // FUNCTION TAMBAHAN
    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
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

    var scrollformupl = document.querySelector('.form-upload');
    var psscrollformupl = new PerfectScrollbar(scrollformupl);


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

    function getDAM(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/rkap-trans/aju-dam') }}",
            dataType: 'json',
            data:{kode_dam:kode},
            async:false,
            success:function(result){
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode+" - "+result.daftar[0].nama);
                            $('.td'+target1).text(kode+" - "+result.daftar[0].nama);
                        }else{
                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target1).closest('tr').find('.search-jenis').hide();
                            $('.'+target1).val(kode+" - "+result.daftar[0].nama);
                            $('.td'+target1).text(kode+" - "+result.daftar[0].nama);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            // $('.td'+target2).addClass("px-0 py-0 aktif");
                            // $('.'+target2).show();
                            // $('.td'+target2).hide();
                            // $('.'+target2).focus();
                            var cek = $('.'+target1).parents('tr').next('tr').find('.td-nama');
                            if(cek.length > 0){
                                cek.click();
                            }else{
                                $('.add-row').click();
                            }
                        }
                    }else{
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
                            alert('Kode DAM tidak valid');
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
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
                        alert('Kode DAM tidak valid');
                    }
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
                    $('a[data-href="fRkmDash"]').addClass('active');
                    var url = "{{ url('rkap-auth/form')}}/fRkmMenu";
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
        rules:
        {
            deskripsi:{
                required: true
            },
            komentar:{
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
            }
            var jumdet = $('#input-grid tr').length;

            var param = $('#id').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('rkap-trans/aju') }}/"+id;
            }else{
                var url = "{{ url('rkap-trans/aju') }}";
            }

            if(jumdet <= 1){
                alert('Transaksi tidak valid. Detail RKM tidak boleh kosong ');
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
                            $('#judul-form').html('Tambah Data Pengajuan');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
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
                                        $('a[data-href="fRkmDash"]').addClass('active');
                                        var url = "{{ url('rkap-auth/form')}}/fRkmMenu";
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
                                text: ( typeof result.data.message === 'object' ? JSON.stringify(result.data.message) : result.data.message )
                            });
                        }
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
    $('#deskripsi,#komentar').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['deskripsi','komentar'];
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

    // GRID JURNAL
    function addRow(param){
        if(param == "copy"){
            var nama_rkm = $('#input-grid tbody tr.selected-row').find(".inp-nama").val();
            var dam = $('#input-grid tbody tr.selected-row').find(".inp-dam").val();
        }else{
            var nama_rkm = "";
            var dam = "";
        }
        var no=$('#input-grid .row-rkm:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-rkm'>";
        input += "<td class='no-rkm text-center'>"+no+"</td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-nama tdnmrkmke"+no+" tooltip-span'>"+nama_rkm+"</span><input type='text' name='nama[]' class='form-control inp-nama nmrkmke"+no+" hidden' value='"+nama_rkm+"' required='' style='z-index: 1;position: relative;' id='rkmnama"+no+"'></td>";
        input += "<td><span class='td-dam tddamke"+no+" tooltip-span'>"+dam+"</span><input type='text' name='dam[]' class='form-control inp-dam damke"+no+" hidden' value='"+dam+"' required='' readonly style='z-index: 1;position: relative;' id='damkode"+no+"'><a href='#' class='search-item search-dam hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);

        if(param != "copy"){
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');
        }

        hideUnselectedRow();
        if(param == "add"){
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(2)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-nama").show();
            $('#input-grid tbody tr:last').find(".td-nama").hide();
            $('#input-grid tbody tr:last').find(".inp-nama").focus();
        }

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
        var no =  $(this).parents("tr").find(".no-rkm").text();

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        switch(par){
            case 'dam[]':
                var options = {
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('rkap-trans/aju-dam') }}",
                    columns : [
                        { data: 'kode_dam' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar DAM",
                    pilih : "dam",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data){
                        $('.damke'+no).val(data.kode_dam+" - "+data.nama);
                        $('.tddamke'+no).html(data.kode_dam+" - "+data.nama);
                        var cek = $('.tdnamake'+(no+1));
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                    },
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilterBSheet(options);

    });

    $('#input-grid').on('keydown','.inp-nama, .inp-dam',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-nama','.inp-dam'];
        var nxt2 = ['.td-nama','.td-dam'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index() - 2;
            var idx_next = idx + 1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0 :
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest("tr").find(".search-dam").show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    break;
                case 1 :
                    var noidx = $(this).parents("tr").find(".no-rkm").text();
                    var kode = $(this).val();
                    var target1 = "damke"+noidx;
                    var target2 = "namake"+noidx;
                    var target3 = "";
                    getDAM(kode,target1,target2,target3,'tab');
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

    $('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
    });

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var nama_rkm = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var dam = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dam").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_rkm);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_rkm);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dam").val(dam);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dam").text(dam);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dam").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dam").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-dam").hide();
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
            $('.row-rkm').each(function(){
                var nom = $(this).closest('tr').find('.no-rkm');
                nom.html(no);
                no++;
            });
            hitungTotalRow();
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

                var nama_rkm = $(this).parents("tr").find(".inp-nama").val();
                var dam = $(this).parents("tr").find(".inp-dam").val();
                var no = $(this).parents("tr").find(".no-rkm").text();

                $(this).parents("tr").find(".inp-nama").val(nama_rkm);
                $(this).parents("tr").find(".td-nama").text(nama_rkm);

                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();

                }

                $(this).parents("tr").find(".inp-dam").val(dam);
                $(this).parents("tr").find(".td-dam").text(dam);

                if(idx == 3){
                    $(this).parents("tr").find(".inp-dam").show();
                    $(this).parents("tr").find(".td-dam").hide();
                    $(this).parents("tr").find(".inp-dam").focus();
                    $(this).parents("tr").find(".search-dam").show();
                }else{
                    $(this).parents("tr").find(".inp-dam").hide();
                    $(this).parents("tr").find(".td-dam").show();
                    $(this).parents("tr").find(".search-dam").hide();

                }
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
        $('.row-rkm').each(function(){
            var nom = $(this).closest('tr').find('.no-rkm');
            nom.html(no);
            no++;
        });
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
                url: "{{ url('rkap-trans/import-excel') }}",
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
                            var link = "{{ config('api.url').'rkap-trans/export?kode_lokasi='.Session::get('lokasi').'&nik_user='.Session::get('nikUser').'&nik='.Session::get('userLog') }}";
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
        console.log(fileName);
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('/rkap-trans/aju-tmp') }}",
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
                            input += "<tr class='row-rkm'>";
                            input += "<td class='no-rkm text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-nama tdnmrkmke"+no+" tooltip-span'>"+line.nama_rkm+"</span><input type='text' name='nama_rkm[]' class='form-control inp-nama nmrkmke"+no+" hidden'  value='"+line.nama_rkm+"'></td>";
                            input += "<td><span class='td-dam tddamke"+no+" tooltip-span'>"+line.dam+"</span><input type='text' name='dam[]' class='form-control inp-dam damke"+no+" hidden' value='"+line.dam+"' required='' readonly style='z-index: 1;position: relative;' id='damkode"+no+"'><a href='#' class='search-item search-dam hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })

                    }
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
            data:{'no_pooling': id},
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
            url: "{{ url('/rkap-trans/aju') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#deskripsi').val(result.data[0].keterangan);
                    $('#komentar').val(result.data[0].komentar);
                    if(result.data_detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.data_detail.length;i++){
                            var line =result.data_detail[i];
                            input += "<tr class='row-rkm'>";
                            input += "<td class='no-rkm text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-nama tdnmrkmke"+no+" tooltip-span'>"+line.nama_rkm+"</span><input type='text' id='rkmnama"+no+"' name='nama[]' class='form-control inp-nama nmrkmke"+no+" hidden' value='"+line.nama_rkm+"' required=''></td>";
                            input += "<td><span class='td-dam tddamke"+no+" tooltip-span'>"+line.dam+"</span><input type='text' name='dam[]' class='form-control inp-dam damke"+no+" hidden' value='"+line.dam+"' required='' readonly style='z-index: 1;position: relative;' id='damkode"+no+"'><a href='#' class='search-item search-dam hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });

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
                    hitungTotalRow();
                    hitungTotalRowUpload("form-tambah");
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#kode_form').val($form_aktif);
                    showInfoField("kode_pp",result.data[0].kode_pp,result.data[0].nama_pp);
                    showInfoField("kode_dam",result.data[0].kode_dam,result.data[0].nama_dam);
                    setWidthFooterCardBody();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rkap-auth/sesi-habis') }}";
                }
            }
        });
    }
    // END BUTTON EDIT



    </script>
