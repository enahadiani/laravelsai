    <link rel="stylesheet" href="{{ asset('trans-new.css?version=_').time() }}" />
    <link rel="stylesheet" href="{{ asset('form-new.css?version=_').time() }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Justifikasi Kebutuhan" tambah="true" :thead="array('No Bukti','Kegiatan','Periode','Jenis','Unit Kerja','Progress','Nilai','Tgl Input','Aksi')" :thwidth="array(10,20,10,10,15,10,10,0,10)" :thclass="array('','','','','','','','','text-center')" />
    <!-- END LIST DATA -->
    <style>
        #tanggal-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }

        #input-terima tbody td, #input-beri tbody td,#input-budget tbody td
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
                                <input type="hidden" name="no_bukti" id="no_bukti">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">Unit Kerja</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="">
                                            <span class="info-name_kode_pp hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="jenis">Jenis Anggaran</label>
                                        <input class='form-control' type="text" id="jenis" name="jenis" >
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_jenis">Jenis RRA</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_jenis" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_jenis" id="kode_jenis" name="kode_jenis" value="" title="">
                                            <span class="info-name_kode_jenis hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_jenis"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="periode">Periode Penggunaan</label>
                                        <input class='form-control' type="text" id="periode" name="periode" >
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nilai" >Nilai Pengajuan</label>
                                        <input class="form-control currency" type="text"  id="nilai" name="nilai" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="kegiatan">Nama Kegiatan</label>
                                        <input class="form-control" id="kegiatan" name="kegiatan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="btn-control">&nbsp;</label>
                                        <div id="btn-control">
                                            <button type="button" href="#" id="loadData" class="btn btn-primary mr-2 btn-sm">Tampil Approval</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-juskeb" role="tab" aria-selected="true"><span class="hidden-xs-down">Juskeb</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-approval" role="tab" aria-selected="true"><span class="hidden-xs-down">Approval</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-juskeb" role="tabpanel">
                                <div class="form-row mt-3">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="latar">Latar Belakang</label>
                                                <textarea class="form-control" rows="3" id="latar" name="latar" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="aspek">Aspek Strategis</label>
                                                <textarea class="form-control" rows="3" id="aspek" name="aspek" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="spesifikasi">Spesifikasi Teknis</label>
                                                <textarea class="form-control" rows="3" id="spesifikasi" name="spesifikasi" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="rencana">Rencana Pelaksanaan</label>
                                                <textarea class="form-control" rows="3" id="rencana" name="rencana" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-approval" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
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

    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    @include('modal_upload')
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
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

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function hitungTotalRowAppFlow(){
        var total_row = $('#input-flow tbody tr').length;
        $('#total-row').html(total_row+' Baris');
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
    
    // END 

    function getPP(id){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/juskeb-pp') }}",
            dataType: 'json',
            data:{kode_pp: id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('kode_pp',result.daftar[0].kode_pp,result.daftar[0].nama);
                    }else{
                        $('#kode_pp').attr('readonly',false);
                        $('#kode_pp').css('border-left','1px solid #d7d7d7');
                        $('#kode_pp').val('');
                        $('#kode_pp').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('sukka-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getJenis(id = null){
        if(id == null){
            var param = {}
        }else{
            var param = {nik : id}
        }
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/juskeb-jenis') }}",
            dataType: 'json',
            data: param,
            async:false,
            success:function(result){    
                if(result.status){
                    if(id == null){
                        showInfoField('kode_jenis',result.kode_jenis,result.nama_app);
                    }else{
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            showInfoField('kode_jenis',result.daftar[0].kode_jenis,result.daftar[0].nama);
                        }else{
                            $('#kode_jenis').attr('readonly',false);
                            $('#kode_jenis').css('border-left','1px solid #d7d7d7');
                            $('#kode_jenis').val('');
                            $('#kode_jenis').focus();
                        }
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
            url: "{{ url('/sukka-trans/juskeb-app-flow') }}",
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

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var action_html2 = "<a href='#' title='Upload' id='btn-upload'><i class='simple-icon-cloud-upload' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('sukka-trans/juskeb') }}", 
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
            {   'targets': 6, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {
                "targets": [7],
                "visible": false,
                "searchable": false
            },
            {
                "targets" : 8,
                "data": null,
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
            { data: 'progress' },
            { data: 'nilai' },
            { data: 'tanggal' }
        ],
        "{{ url('sukka-auth/sesi-habis') }}",
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

    // BUTTON EDIT
    function editData(id){
        
        $.ajax({
            type: 'GET',
            url: "{{ url('/sukka-trans/juskeb') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#input-flow tbody').html('');
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#jenis').val(result.data[0].jenis); 
                    $('#periode').val(result.data[0].periode); 
                    $('#kode_jenis').val(result.data[0].kode_jenis); 
                    $('#kegiatan').val(result.data[0].kegiatan);
                    $('#nilai').val(result.data[0].nilai);
                    $('#latar').val(result.data[0].latar);
                    $('#aspek').val(result.data[0].aspek);
                    $('#spesifikasi').val(result.data[0].spesifikasi);
                    $('#rencana').val(result.data[0].rencana);
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input+=` <tr>
                                <td>${no}</td>    
                                <td>${line.kode_role}</td>    
                                <td>${line.kode_jab}</td>    
                                <td>${line.nik}</td>    
                                <td>${line.nama}</td>    
                                <td>${line.email}</td>    
                            </tr>`;
                            no++;
                        }
                        $('#input-flow tbody').html(input);
                        $('.tooltip-span').attr('title','tooltip');
                        $('.tooltip-span').tooltip({
                            content: function(){
                                return $(this).text();
                            },
                            tooltipClass: "custom-tooltip-sai"
                        });
                    }

                    hitungTotalRowAppFlow();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#kode_form').val($form_aktif);
                    showInfoField("kode_pp",result.data[0].kode_pp,result.data[0].nama_pp);
                    showInfoField("kode_jenis",result.data[0].kode_jenis,result.data[0].nama_jenis);
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
        $('#judul-form').html('Edit Data Justifikasi Kebutuhan');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });
    // END BUTTON EDIT

    // HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('sukka-trans/juskeb') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Justifikasi Kebutuhan ('+id+') berhasil dihapus ');
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

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Justifikasi Kebutuhan');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-flow tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        setHeightForm();
        $('#kode_form').val($form_aktif);
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
        if($(this).index() != 7){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            $.ajax({
                type: 'GET',
                url: "{{ url('/sukka-trans/juskeb') }}/"+id,
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
                            <div style="padding:0 1.5rem">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">No Bukti</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].no_bukti+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Unit Kerja</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].kode_pp+` - `+result.data[0].nama_pp+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Jenis Anggaran</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].jenis+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Jenis RRA</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].kode_jenis+` - `+result.data[0].nama_jenis+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Periode Penggunaan</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].periode+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Nilai</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+number_format(result.data[0].nilai)+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Kegiatan</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].kegiatan+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Latar Belakang</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].latar+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Aspek Strategis</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].aspek+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Spesifikasi Teknis</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].spesifikasi+`</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Rencana Pelaksanaan</td>
                                        <td width="1%">:</td>
                                        <td width="20%">`+result.data[0].rencana+`</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.9rem">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#prev-approval" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Approval</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="prev-approval" role="tabpanel">
                                        <table class="table table-striped table-body-prev mt-2" width="100%">
                                        <tr style="background: var(--theme-color-1) !important;color:white !important">
                                                <th style="width:15%">No</th>
                                                <th style="width:15%">Kode Jab</th>
                                                <th style="width:15">Kode Role</th>
                                                <th style="width:15">NIK</th>
                                                <th style="width:15">Nama</th>
                                                <th style="width:15">Email</th>
                                        </tr>`;
                                            var det = '';
                                            var total_saldo = 0; var total =0;
                                            if(result.detail.length > 0){
                                                var no=1;
                                                for(var i=0;i<result.detail.length;i++){
                                                    var line =result.detail[i];
                                                    det += "<tr>";
                                                    det += "<td >"+no+"</td>";
                                                    det += "<td >"+line.kode_role+"</td>";
                                                    det += "<td >"+line.kode_jab+"</td>";
                                                    det += "<td >"+line.nik+"</td>";
                                                    det += "<td >"+line.nama+"</td>";
                                                    det += "<td >"+line.email+"</td>";
                                                    det += "</tr>";
                                                    no++;
                                                }
                                            }
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
                            $('#judul-form').html('Edit Data Justifikasi Kebutuhan');
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

                        $('.preview-header #btn-edit2').css('display','inline-block');
                        $('.preview-header #btn-delete2').css('display','inline-block');
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
            
            var total_d = toNilai($('#nilai').val());
            var jumdet = $('#input-flow tr').length;
            var param = $('#id').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/sukka-trans/juskeb') }}/"+id;
            }else{
                var url = "{{ url('/sukka-trans/juskeb') }}";
            }

            if( total_d <= 0 ){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Transaksi tidak valid',
                    text: "Nilai Justifikasi tidak boleh sama dengan 0 atau kurang"
                });
            }else if(jumdet <= 1 ){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Transaksi tidak valid',
                    text: "Detail Approval tidak boleh kosong (jumlah baris: "+jumdet+")"
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
                            $('#judul-form').html('Tambah Data Justifikasi Kebutuhan');
                            $('#id').val('');
                            $('#input-flow tbody').html('');
                            $('[id^=label]').html('');
                            $('#kode_form').val($form_aktif);
                            
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'simpan'
                            });

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
    $('#kode_pp,#jenis,#kode_jenis,#periode,#nilai,#kegiatan,#latar,#aspek,#spesifikasi,#rencana').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','jenis','kode_jenis','periode','nilai','kegiatan','latar','aspek','spesifikasi','rencana'];
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
            case 'kode_jenis':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/juskeb-jenis') }}",
                    columns : [
                        { data: 'kode_jenis' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jenis RRA",
                    pilih : "jenis",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                }
            break;
            case 'kode_pp':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('sukka-trans/juskeb-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Unit Kerja",
                    pilih : "pp",
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

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
    });

    $('#form-tambah').on('change', '#kode_jenis', function(){
        var par = $(this).val();
        getJenis(par);
    });

    $('#form-tambah').on('click', '#loadData', function(){
        var kode_jenis = $('#kode_jenis').val();
        var nilai = $('#nilai').val();
        getAppFlow(kode_jenis,nilai);
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });   

    function kirimWAEmail(id){
        
        $.ajax({
            type: 'POST',
            url: "{{ url('sukka-trans/send-email') }}",
            dataType: 'json',
            data:{'no_pooling': id},
            async:false,
            success:function(res){
                console.log(res);
            }
        });
    }
    
    </script>