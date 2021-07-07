    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <style>
        select.form-control{
            border-radius:0 !important;
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

        #tgl_masuk-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }
    
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Warga" tambah="" :thead="array('Kode Rumah','Tipe','Blok','RT','RW','Status Huni','Aksi')" :thwidth="array(20,10,15,15,15,15,10)" :thclass="array('','','','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
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
                                    <div class="col-md-6">
                                        <label for="kode_rw">RW</label>
                                        <input type="text" class="form-control" id="kode_rw" name="kode_rw" required readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kode_rt">RT</label>
                                        <input type="text" class="form-control" id="kode_rt" name="kode_rt" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="blok">Blok</label>
                                        <input type="text" class="form-control" id="blok" name="blok" required readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_rumah">No Rumah</label>
                                        <input type="text" class="form-control" id="no_rumah" name="no_rumah" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tgl_masuk">Tgl Masuk</label>
                                        <span id="tgl_masuk-dp"></span>
                                        <input type="text" class="form-control datepicker" id="tgl_masuk" name="tgl_masuk" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sts_masuk">Status Masuk</label>
                                        <select class='form-control' id="sts_masuk" name="sts_masuk">
                                        <option value='' disabled selected>--- Pilih Status ---</option>
                                        <option value='Pindah'>Pindah</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-warga" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Warga</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-warga" role="tabpanel">

                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                    
                                    <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Excel<i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
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
                                        #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid select.form-control, #input-grid .custom-file-label
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
                                    <div class="table-responsive mb-2">
                                        <table class="table table-bordered table-condensed gridexample" id="input-grid" style="table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:10px">No</th>
                                                <th style="width:10px"></th>
                                                <th style="width:200px">Nama</th>
                                                <th style="width:100px">Alias</th>
                                                <th style="width:100px">Jenis Kelamin</th>
                                                <th style="width:100px">Tempat Lahir</th>
                                                <th style="width:100px">Tgl Lahir</th>
                                                <th style="width:100px">Agama</th>
                                                <th style="width:100px">Gol. Darah</th>
                                                <th style="width:100px">Pendidikan</th>
                                                <th style="width:100px">Pekerjaan</th>
                                                <th style="width:100px">Status Nikah</th>
                                                <th style="width:100px">Hubungan</th>
                                                <th style="width:100px">Status WNI</th>
                                                <th style="width:100px">No HP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                            <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                                <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                            </div>
                            <div style="text-align: right;" class="col-md-2 p-0 ">
                                <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>

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

    $("#tgl_masuk").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container:'span#tgl_masuk-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });

    $('#sts_masuk').selectize();

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

    function hitungTotal(){
        
        var total = 0;

        $('.row-tagihan').each(function(){
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            total += +toNilai(nilai);
        });

        $('#total_tagihan').val(total);
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
    
    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });
    // END 

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('rtrw-master/rumah') }}", 
        [
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        [
            { data: 'kode_rumah' },
            { data: 'tipe' },
            { data: 'blok' },
            { data: 'rt' },
            { data: 'rw' },
            { data: 'status_huni' }
        ],
        "{{ url('rtrw-auth/sesi-habis') }}",
        [[0 ,"desc"]]
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

    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/mawar-detail') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_rumah').val(id);
                    $('#kode_rw').val(result.data[0].kode_lokasi);
                    $('#kode_rt').val(result.data[0].kode_pp);
                    $('#blok').val(result.data[0].kode_blok);
                    $('#sts_masuk')[0].selectize.setValue(result.data[0].sts_masuk);
                    $('#tgl_masuk').val(result.data[0].tgl_masuk);
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'>"+no+"</td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-nama tdnamake"+no+" tooltip-span'>"+line.nama+"</span><input type='text' name='nama[]' class='form-control inp-nama namake"+no+" hidden'  value='"+line.nama+"' required></td>";
                            input += "<td ><span class='td-alias tdaliaske"+no+" tooltip-span'>"+line.alias+"</span><input type='text' name='alias[]' class='form-control inp-alias aliaske"+no+" hidden'  value='"+line.alias+"' required></td>";
                            input += "<td ><span class='td-jk tdjkke"+no+" tooltip-span'>"+line.jk+"</span><select  name='jk[]' class='form-control inp-jk jkke"+no+" hidden' value='"+line.jk+"' required><option value='P'>P</option><option value='L'>L</option></select></td>";
                            input += "<td ><span class='td-tempat_lahir tdtempat_lahirke"+no+" tooltip-span'>"+line.tempat_lahir+"</span><input type='text' name='tempat_lahir[]' class='form-control inp-tempat_lahir tempat_lahirke"+no+" hidden'  value='"+line.tempat_lahir+"' required></td>";
                            input += "<td ><span class='td-tgl_lahir tdtgl_lahirke"+no+" tooltip-span datepicker'>"+line.tgl_lahir+"</span><input type='text' name='tgl_lahir[]' class='form-control inp-tgl_lahir tgl_lahirke"+no+" hidden'  value='"+line.tgl_lahir+"' placeholder='yyyy-mm-dd' required></td>";
                            input += "<td ><span class='td-agama tdagamake"+no+" tooltip-span'>"+line.agama+"</span><select  name='agama[]' class='form-control inp-agama agamake"+no+" hidden' value='"+line.agama+"' required><option value='ISLAM'>ISLAM</option><option value='BUDHA'>BUDHA</option><option value='KRISTEN'>KRISTEN</option><option value='HINDU'>HINDU</option><option value='PROTESTAN'>PROTESTAN</option><option value='LAINNYA'>LAINNYA</option></select></td>";
                            input += "<td ><span class='td-goldar tdgoldarke"+no+" tooltip-span'>"+line.goldar+"</span><select  name='goldar[]' class='form-control inp-goldar goldarke"+no+" hidden' value='"+line.goldar+"' required><option value='A'>A</option><option value='B'>B</option><option value='AB'>AB</option><option value='O'>O</option></select></td>";
                            input += "<td ><span class='td-pendidikan tdpendidikanke"+no+" tooltip-span'>"+line.pendidikan+"</span><input type='text' name='pendidikan[]' class='form-control inp-pendidikan pendidikanke"+no+" hidden'  value='"+line.pendidikan+"' required></td>";
                            input += "<td ><span class='td-pekerjaan tdpekerjaanke"+no+" tooltip-span'>"+line.pekerjaan+"</span><input type='text' name='pekerjaan[]' class='form-control inp-pekerjaan pekerjaanke"+no+" hidden'  value='"+line.pekerjaan+"' required></td>";
                            input += "<td ><span class='td-sts_nikah tdsts_nikahke"+no+" tooltip-span'>"+line.sts_nikah+"</span><select  name='sts_nikah[]' class='form-control inp-sts_nikah sts_nikahke"+no+" hidden' value='"+line.sts_nikah+"' required><option value='KAWIN'>KAWIN</option><option value='BELUM KAWIN'>BELUM KAWIN</option></select></td>";
                            input += "<td ><span class='td-sts_hub tdsts_hubke"+no+" tooltip-span'>"+line.sts_hub+"</span><select  name='sts_hub[]' class='form-control inp-sts_hub sts_hubke"+no+" hidden' value='"+line.sts_hub+"' required><option value='KEPALA KEL.'>KEPALA KEL.</option><option value='ISTRI'>ISTRI</option><option value='ANAK'>ANAK</option><option value='ORANGTUA'>ORANGTUA</option><option value='ART'>ART</option><option value='PENGASUH'>PENGASUH</option><option value='KELUARGA LAIN'>KELUARGA LAIN</option></select></td>";
                            input += "<td ><span class='td-sts_wni tdsts_wnike"+no+" tooltip-span'>"+line.sts_wni+"</span><select  name='sts_wni[]' class='form-control inp-sts_wni sts_wnike"+no+" hidden' value='"+line.sts_wni+"' required><option value='WNI'>WNI</option><option value='WNA'>WNA</option></select></td>";
                            input += "<td ><span class='td-no_hp tdno_hpke"+no+" tooltip-span'>"+line.no_hp+"</span><input type='text' name='no_hp[]' class='form-control inp-no_hp no_hpke"+no+" hidden'  value='"+line.no_hp+"' required></td>";
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
                        // for(var i=0;i<result.detail.length;i++){
                        //     $(".tgl_lahirke"+no).bootstrapDP({
                        //         autoclose: true,
                        //         format: 'dd/mm/yyyy',
                        //         container:'span#tgl_lahirke'+no,
                        //         templates: {
                        //             leftArrow: '<i class="simple-icon-arrow-left"></i>',
                        //             rightArrow: '<i class="simple-icon-arrow-right"></i>'
                        //         },
                        //         orientation: 'bottom left'
                        //     });
                        //     no++;
                        // }
                    }
                    hitungTotal();
                    hitungTotalRow();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#kode_form').val($form_aktif);
                    setWidthFooterCardBody();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Warga');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });
    // END BUTTON EDIT

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
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

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 6){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
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
            <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) position:sticky;min-height:300px'>
                <table class="table table-prev mt-2" width="100%" style="padding-bottom:200px">
                    <tr>
                    <td style='border:none'>Kode Rumah</td>
                    <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                    <td>Tipe</td>
                    <td>`+data.tipe+`</td>
                    </tr>
                    <tr>
                    <td>Blok</td>
                    <td>`+data.blok+`</td>
                    </tr>
                    <tr>
                    <td>RT</td>
                    <td>`+data.rt+`</td>
                    </tr>
                    <tr>
                    <td>RW</td>
                    <td>`+data.rw+`</td>
                    </tr>
                    <tr>
                    <td>Status Huni</td>
                    <td>`+data.status_huni+`</td>
                    </tr>
                </table>
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
                $('#judul-form').html('Edit Data Rumah');
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
            
            $('#trigger-bottom-sheet').trigger("click");
        }
    });

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            var jumdet = $('#input-grid tr').length;

            var param = $('#id').val();
            var id = $('#no_rumah').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('rtrw-master/mawar') }}";
            }else{
                var url = "{{ url('rtrw-master/mawar') }}";
            }

            if(jumdet <= 1){
                alert('Transaksi tidak valid. Detail Warga tidak boleh kosong ');
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
                            $('#judul-form').html('Tambah Data Warga');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
                            
                            msgDialog({
                                id:result.data.no_tagihan,
                                type:'simpan',
                                text:result.data.message
                            });

                            if(result.data.no_pooling != undefined){
                                kirimWAEmail(result.data.no_pooling);
                            }

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
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
    $('#kode_rw,#kode_rt,#blok,#no_rumah,#tgl_masuk,#sts_masuk').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_rw','kode_rt','blok','no_rumah','tgl_masuk','sts_masuk'];
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
            var nama = $('#input-grid tbody tr.selected-row').find(".inp-nama").val();
            var alias = $('#input-grid tbody tr.selected-row').find(".inp-alias").val();
            var jk = $('#input-grid tbody tr.selected-row').find(".inp-jk").val();
            var tempat_lahir = $('#input-grid tbody tr.selected-row').find(".inp-tempat_lahir").val();
            var tgl_lahir = $('#input-grid tbody tr.selected-row').find(".inp-tgl_lahir").val();
            var agama = $('#input-grid tbody tr.selected-row').find(".inp-agama").val();
            var goldar = $('#input-grid tbody tr.selected-row').find(".inp-goldar").val();
            var pendidikan = $('#input-grid tbody tr.selected-row').find(".inp-pendidikan").val();
            var pekerjaan = $('#input-grid tbody tr.selected-row').find(".inp-pekerjaan").val();
            var sts_nikah = $('#input-grid tbody tr.selected-row').find(".inp-sts_nikah").val();
            var sts_hub = $('#input-grid tbody tr.selected-row').find(".inp-sts_hub").val();
            var sts_wni = $('#input-grid tbody tr.selected-row').find(".inp-sts_wni").val();
            var no_hp = $('#input-grid tbody tr.selected-row').find(".inp-no_hp").val();
        }else{
            
            var nama = "";
            var alias = "";
            var jk = "";
            var tempat_lahir = "";
            var tgl_lahir = "";
            var agama = "";
            var goldar = "";
            var pendidikan = "";
            var pekerjaan = "";
            var sts_nikah = "";
            var sts_hub = "";
            var sts_wni = "";
            var no_hp = "";
        }
        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'>"+no+"</td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td ><span class='td-nama tdnamake"+no+" tooltip-span'>"+nama+"</span><input type='text' name='nama[]' class='form-control inp-nama namake"+no+" hidden'  value='"+nama+"' required></td>";
        input += "<td ><span class='td-alias tdaliaske"+no+" tooltip-span'>"+alias+"</span><input type='text' name='alias[]' class='form-control inp-alias aliaske"+no+" hidden'  value='"+alias+"' required></td>";
        input += "<td ><span class='td-jk tdjkke"+no+" tooltip-span'>"+jk+"</span><select name='jk[]' class='form-control hidden inp-jk jkke"+no+"' value='"+jk+"' required><option value='P'>P</option><option value='L'>L</option></select></td>";
        input += "<td ><span class='td-tempat_lahir tdtempat_lahirke"+no+" tooltip-span'>"+tempat_lahir+"</span><input type='text' name='tempat_lahir[]' class='form-control inp-tempat_lahir tempat_lahirke"+no+" hidden'  value='"+tempat_lahir+"' required></td>";
        input += "<td ><span class='td-tgl_lahir tdtgl_lahirke"+no+" tooltip-span datepicker'>"+tgl_lahir+"</span><input type='text' name='tgl_lahir[]' placeholder='yyyy-mm-dd'  class='form-control inp-tgl_lahir tgl_lahirke"+no+" hidden'  value='"+tgl_lahir+"' required></td>";
        input += "<td ><span class='td-agama tdagamake"+no+" tooltip-span'>"+agama+"</span><select name='agama[]' class='form-control inp-agama agamake"+no+" hidden' value='"+agama+"' required><option value='ISLAM'>ISLAM</option><option value='BUDHA'>BUDHA</option><option value='KRISTEN'>KRISTEN</option><option value='HINDU'>HINDU</option><option value='PROTESTAN'>PROTESTAN</option><option value='LAINNYA'>LAINNYA</option></select></td>";
        input += "<td ><span class='td-goldar tdgoldarke"+no+" tooltip-span'>"+goldar+"</span><select name='goldar[]' class='form-control inp-goldar goldarke"+no+" hidden' value='"+goldar+"' required><option value='A'>A</option><option value='B'>B</option><option value='AB'>AB</option><option value='O'>O</option></select></td>";
        input += "<td ><span class='td-pendidikan tdpendidikanke"+no+" tooltip-span'>"+pendidikan+"</span><input type='text' name='pendidikan[]' class='form-control inp-pendidikan pendidikanke"+no+" hidden'  value='"+pendidikan+"' required></td>";
        input += "<td ><span class='td-pekerjaan tdpekerjaanke"+no+" tooltip-span'>"+pekerjaan+"</span><input type='text' name='pekerjaan[]' class='form-control inp-pekerjaan pekerjaanke"+no+" hidden'  value='"+pekerjaan+"' required></td>";
        input += "<td ><span class='td-sts_nikah tdsts_nikahke"+no+" tooltip-span'>"+sts_nikah+"</span><select name='sts_nikah[]' class='form-control inp-sts_nikah sts_nikahke"+no+" hidden' value='"+sts_nikah+"' required><option value='KAWIN'>KAWIN</option><option value='BELUM KAWIN'>BELUM KAWIN</option></select></td>";
        input += "<td ><span class='td-sts_hub tdsts_hubke"+no+" tooltip-span'>"+sts_hub+"</span><select name='sts_hub[]' class='form-control inp-sts_hub sts_hubke"+no+" hidden' value='"+sts_hub+"' required><option value='KEPALA KEL.'>KEPALA KEL.</option><option value='ISTRI'>ISTRI</option><option value='ANAK'>ANAK</option><option value='ORANGTUA'>ORANGTUA</option><option value='ART'>ART</option><option value='PENGASUH'>PENGASUH</option><option value='KELUARGA LAIN'>KELUARGA LAIN</option></select></td>";
        input += "<td ><span class='td-sts_wni tdsts_wnike"+no+" tooltip-span'>"+sts_wni+"</span><select name='sts_wni[]' class='form-control inp-sts_wni sts_wnike"+no+" hidden' value='"+sts_wni+"' required><option value='WNI'>WNI</option><option value='WNA'>WNA</option></select></td>";
        input += "<td ><span class='td-no_hp tdno_hpke"+no+" tooltip-span'>"+no_hp+"</span><input type='text' name='no_hp[]' class='form-control inp-no_hp no_hpke"+no+" hidden'  value='"+no_hp+"' required></td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);

        if(param != "copy"){
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');
        }
        
        hideUnselectedRow();
        if(param == "add"){
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
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

    $('#input-grid tbody').on('keydown','.inp-nama ,.inp-alias, .inp-jk, .inp-tempat_lahir, .inp-tgl_lahir, .inp-agama, .inp-goldar, .inp-pendidikan, .inp-pekerjaan, .inp-sts_nikah, .inp-sts_hub, .inp-sts_wni, .inp-no_hp',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-nama', '.inp-alias', '.inp-jk', '.inp-tempat_lahir', '.inp-tgl_lahir', '.inp-agama', '.inp-goldar', '.inp-pendidikan', '.inp-pekerjaan', '.inp-sts_nikah', '.inp-sts_hub', '.inp-sts_wni', '.inp-no_hp'];
        var nxt2 = ['.td-nama', '.td-alias', '.td-jk', '.td-tempat_lahir', '.td-tgl_lahir', '.td-agama', '.td-goldar', '.td-pendidikan', '.td-pekerjaan', '.td-sts_nikah', '.td-sts_hub', '.td-sts_wni', '.td-no_hp'];
        if(code == 13 || code == 9){
            e.preventDefault()
            var idx = $(this).closest('td').index()-2;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+2;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                case 10:
                case 11:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).parents("tr").find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                break;
                case 12:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show(); 
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);

                    $(this).parents("tr").find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    var cek = $(this).parents('tr').next('tr').find('.td-nama');
                    console.log(cek,cek.length);
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

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var nama = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var alias = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-alias").val();
                var jk = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jk").val();
                var agama = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-agama").val();
                var tempat_lahir = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tempat_lahir").val();
                var tgl_lahir = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tgl_lahir").val();
                var goldar = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-goldar").val();
                var pendidikan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pendidikan").val();
                var pekerjaan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pekerjaan").val();
                var sts_nikah = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_nikah").val();
                var sts_hub = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_hub").val();
                var sts_wni = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_wni").val();
                var no_hp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-no_hp").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-alias").val(alias);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-alias").text(alias);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jk").val(jk);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jk").text(jk);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tempat_lahir").val(tempat_lahir);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tempat_lahir").text(tempat_lahir);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tgl_lahir").val(tgl_lahir);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tgl_lahir").text(tgl_lahir);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-agama").val(agama);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-agama").text(agama);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-goldar").val(goldar);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-goldar").text(goldar);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pekerjaan").val(pekerjaan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pekerjaan").text(pekerjaan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pendidikan").val(pendidikan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pendidikan").text(pendidikan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_nikah").val(sts_nikah);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-sts_nikah").text(sts_nikah);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_hub").val(sts_hub);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-sts_hub").text(sts_hub);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_wni").val(sts_wni);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-sts_wni").text(sts_wni);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-no_hp").val(no_hp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-no_hp").text(no_hp);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-alias").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-alias").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-jk").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-jk").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tempat_lahir").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tempat_lahir").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tgl_lahir").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tgl_lahir").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-agama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-agama").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pendidikan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pendidikan").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pekerjaan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pekerjaan").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_nikah").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-sts_nikah").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_hub").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-sts_hub").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-sts_wni").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-sts_wni").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-no_hp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-no_hp").show();
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
            $('.row-tagihan').each(function(){
                var nom = $(this).closest('tr').find('.no-tagihan');
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
        
                var nama = $(this).parents("tr").find(".inp-nama").val();
                var alias = $(this).parents("tr").find(".inp-alias").val();
                var jk = $(this).parents("tr").find(".inp-jk").val();
                var tempat_lahir = $(this).parents("tr").find(".inp-tempat_lahir").val();
                var tgl_lahir = $(this).parents("tr").find(".inp-tgl_lahir").val();
                var agama = $(this).parents("tr").find(".inp-agama").val();
                var goldar = $(this).parents("tr").find(".inp-goldar").val();
                var pendidikan = $(this).parents("tr").find(".inp-pendidikan").val();
                var pekerjaan = $(this).parents("tr").find(".inp-pekerjaan").val();
                var sts_nikah = $(this).parents("tr").find(".inp-sts_nikah").val();
                var sts_hub = $(this).parents("tr").find(".inp-sts_hub").val();
                var sts_wni = $(this).parents("tr").find(".inp-sts_wni").val();
                var no_hp = $(this).parents("tr").find(".inp-no_hp").val();
                var no = $(this).parents("tr").find(".no-grid").text();

                $(this).parents("tr").find(".inp-nama").val(nama);
                $(this).parents("tr").find(".td-nama").text(nama);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                    
                }

                $(this).parents("tr").find(".inp-alias").val(alias);
                $(this).parents("tr").find(".td-alias").text(alias);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-alias").show();
                    $(this).parents("tr").find(".td-alias").hide();
                    $(this).parents("tr").find(".inp-alias").focus();
                }else{
                    $(this).parents("tr").find(".inp-alias").hide();
                    $(this).parents("tr").find(".td-alias").show();
                }

                $(this).parents("tr").find(".inp-jk").val(jk);
                $(this).parents("tr").find(".td-jk").text(jk);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-jk").show();
                    $(this).parents("tr").find(".td-jk").hide();
                    $(this).parents("tr").find(".inp-jk").focus();
                }else{
                    $(this).parents("tr").find(".inp-jk").hide();
                    $(this).parents("tr").find(".td-jk").show();
                }

                $(this).parents("tr").find(".inp-tempat_lahir").val(tempat_lahir);
                $(this).parents("tr").find(".td-tempat_lahir").text(tempat_lahir);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-tempat_lahir").show();
                    $(this).parents("tr").find(".td-tempat_lahir").hide();
                    $(this).parents("tr").find(".inp-tempat_lahir").focus();
                }else{
                    $(this).parents("tr").find(".inp-tempat_lahir").hide();
                    $(this).parents("tr").find(".td-tempat_lahir").show();
                }

                $(this).parents("tr").find(".inp-tgl_lahir").val(tgl_lahir);
                $(this).parents("tr").find(".td-tgl_lahir").text(tgl_lahir);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-tgl_lahir").show();
                    $(this).parents("tr").find(".td-tgl_lahir").hide();
                    $(this).parents("tr").find(".inp-tgl_lahir").focus();
                }else{
                    $(this).parents("tr").find(".inp-tgl_lahir").hide();
                    $(this).parents("tr").find(".td-tgl_lahir").show();
                }

                $(this).parents("tr").find(".inp-agama").val(agama);
                $(this).parents("tr").find(".td-agama").text(agama);
                if(idx == 7){
                    $(this).parents("tr").find(".inp-agama").show();
                    $(this).parents("tr").find(".td-agama").hide();
                    $(this).parents("tr").find(".inp-agama").focus();
                }else{
                    $(this).parents("tr").find(".inp-agama").hide();
                    $(this).parents("tr").find(".td-agama").show();
                }

                $(this).parents("tr").find(".inp-goldar").val(goldar);
                $(this).parents("tr").find(".td-goldar").text(goldar);
                if(idx == 8){
                    $(this).parents("tr").find(".inp-goldar").show();
                    $(this).parents("tr").find(".td-goldar").hide();
                    $(this).parents("tr").find(".inp-goldar").focus();
                }else{
                    $(this).parents("tr").find(".inp-goldar").hide();
                    $(this).parents("tr").find(".td-goldar").show();
                }

                $(this).parents("tr").find(".inp-pendidikan").val(pendidikan);
                $(this).parents("tr").find(".td-pendidikan").text(pendidikan);
                if(idx == 9){
                    $(this).parents("tr").find(".inp-pendidikan").show();
                    $(this).parents("tr").find(".td-pendidikan").hide();
                    $(this).parents("tr").find(".inp-pendidikan").focus();
                }else{
                    $(this).parents("tr").find(".inp-pendidikan").hide();
                    $(this).parents("tr").find(".td-pendidikan").show();
                }

                $(this).parents("tr").find(".inp-pekerjaan").val(pekerjaan);
                $(this).parents("tr").find(".td-pekerjaan").text(pekerjaan);
                if(idx == 10){
                    $(this).parents("tr").find(".inp-pekerjaan").show();
                    $(this).parents("tr").find(".td-pekerjaan").hide();
                    $(this).parents("tr").find(".inp-pekerjaan").focus();
                }else{
                    $(this).parents("tr").find(".inp-pekerjaan").hide();
                    $(this).parents("tr").find(".td-pekerjaan").show();
                }

                $(this).parents("tr").find(".inp-sts_nikah").val(sts_nikah);
                $(this).parents("tr").find(".td-sts_nikah").text(sts_nikah);
                if(idx == 11){
                    $(this).parents("tr").find(".inp-sts_nikah").show();
                    $(this).parents("tr").find(".td-sts_nikah").hide();
                    $(this).parents("tr").find(".inp-sts_nikah").focus();
                }else{
                    $(this).parents("tr").find(".inp-sts_nikah").hide();
                    $(this).parents("tr").find(".td-sts_nikah").show();
                }

                $(this).parents("tr").find(".inp-sts_hub").val(sts_hub);
                $(this).parents("tr").find(".td-sts_hub").text(sts_hub);
                if(idx == 12){
                    $(this).parents("tr").find(".inp-sts_hub").show();
                    $(this).parents("tr").find(".td-sts_hub").hide();
                    $(this).parents("tr").find(".inp-sts_hub").focus();
                }else{
                    $(this).parents("tr").find(".inp-sts_hub").hide();
                    $(this).parents("tr").find(".td-sts_hub").show();
                }

                $(this).parents("tr").find(".inp-sts_wni").val(sts_wni);
                $(this).parents("tr").find(".td-sts_wni").text(sts_wni);
                if(idx == 13){
                    $(this).parents("tr").find(".inp-sts_wni").show();
                    $(this).parents("tr").find(".td-sts_wni").hide();
                    $(this).parents("tr").find(".inp-sts_wni").focus();
                }else{
                    $(this).parents("tr").find(".inp-sts_wni").hide();
                    $(this).parents("tr").find(".td-sts_wni").show();
                }

                $(this).parents("tr").find(".inp-no_hp").val(no_hp);
                $(this).parents("tr").find(".td-no_hp").text(no_hp);
                if(idx == 14){
                    $(this).parents("tr").find(".inp-no_hp").show();
                    $(this).parents("tr").find(".td-no_hp").hide();
                    $(this).parents("tr").find(".inp-no_hp").focus();
                }else{
                    $(this).parents("tr").find(".inp-no_hp").hide();
                    $(this).parents("tr").find(".td-no_hp").show();
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
        $('.row-tagihan').each(function(){
            var nom = $(this).closest('tr').find('.no-tagihan');
            nom.html(no);
            no++;
        });
        hitungTotal();
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    </script>