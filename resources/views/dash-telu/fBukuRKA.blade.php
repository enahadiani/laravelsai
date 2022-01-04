    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <style>
        .saicon {
            display: inline-block;
            width: 14px;
            height: 14px;
            background: black;
            -webkit-mask-size: cover;
            mask-size: cover;
        }
        
        .icon-tambah{
            background: #505050;
            /* mask: url("{{ url('img/add.svg') }}"); */
            -webkit-mask-image: url("{{ url('img/add.svg') }}");
            mask-image: url("{{ url('img/add.svg') }}");
            width: 12px;
            height: 12px;
        }
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Buku RKA" tambah="true" :thead="array('No Bukti','Tanggal','PP','Aksi')" :thwidth="array(20,25,45,10)" :thclass="array('','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="no_bukti" name="no_bukti">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row mb-2">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="tanggal">Tanggal</label>
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kode_pp">PP</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_pp" readonly="readonly" title=""></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="">
                                            <span class="info-name_kode_pp hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="flag_aktif">Status Aktif</label>
                                        <select class='form-control' id="flag_aktif" name="flag_aktif">
                                        <option value='' disabled selected>--- Pilih ---</option>
                                        <option value='1'>AKTIF</option>
                                        <option value='0'>NON-AKTIF</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row mb-2">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="keterangan">Keterangan</label>
                                        <input class="form-control" id="keterangan" name="keterangan" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 nav-grid" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Dokumen</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-grid" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-dok" ></span></a>
                                </div>
                                <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>

                                    <table class='table table-striped table-bordered table-condensed' id='input-dok'>
                                        <thead>
                                            <tr>
                                                <th width='5%'>No</th>
                                                <th width='35%'>Nama File</th>
                                                <th width='20%'>Jenis Dok</th>
                                                <th width='25%' class='label-upload'>Upload File</th>
                                                <th width='10%'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row-dok btn btn-light2 btn-block btn-sm" id="add-row-dok"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

    
    {{-- PDF PREVIEW --}}
    <div id="saku-pdf" class="row" style="display: none;">
        <div class="col-12">
            <div class="card" style="height: 100%;">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <button type="button" class="btn btn-light ml-2" id="btn-back" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-0" style='height:calc(100vh - 190px) '>
                    <ul class="nav nav-tabs col-12" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-list" role="tab" aria-selected="true"><span class="hidden-xs-down">List Dokumen</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-prev" role="tab" aria-selected="true"><span class="hidden-xs-down">Preview Dokumen</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-list" role="tabpanel">
                            <table class='table table-bordered table-striped' id="table-pdf">
                                <thead>
                                    <tr>
                                        <th width='5%'>No</th>
                                        <th width='35%'>Nama File</th>
                                        <th width='20%'>Jenis Dok</th>
                                        <th width='10%'>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="data-prev" role="tabpanel">
                            <div id="pdf-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END PDF PREVIEW --}}

    @include('modal_search')
    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    $('#content-bottom-sheet').html('');
    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    $('#flag_aktif').selectize();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function hitungTotalRowDok(){
        var total_row = $('#input-dok tbody tr').length;
        $('#total-row-dok').html(total_row+' Baris');
    }

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

    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>&nbsp;&nbsp;&nbsp; <a href='#' title='View Dokumen' id='btn-view'><i class='simple-icon-doc' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('telu-master/buku-rka') }}", 
        [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'nama_pp' }
        ],
        "{{ url('dash-telu/sesi-habis') }}",
        []
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

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        showInpFilter({
            id : id,
            header : ['Kode', 'Nama'],
            url : "{{ url('telu-master/unit') }}",
            columns : [
                { data: 'kode_pp' },
                { data: 'nama' }
            ],
            judul : "Daftar PP",
            pilih : "pp",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            width : ["30%","70%"],
        });
    });

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#no_bukti').val('');
        $('#judul-form').html('Tambah Data Buku RKA');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#no_bukti').attr('readonly', false);
        $('#input-dok tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
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

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_form').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            tanggal:{
                required: true 
            },
            keterangan:{
                required: true 
            },
            kode_pp:{
                required: true
            },
            flag_aktif:{
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_form').val();
            if(parameter == "edit"){
                var url = "{{ url('telu-master/buku-rka-edit') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('telu-master/buku-rka') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
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
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Buku RKA');
                        $('#method').val('post');
                        $('#no_bukti').attr('readonly', false);
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'simpan'
                        });
                        last_add("no_bukti",result.data.no_bukti);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/dash-telu/sesi-habis') }}";
                        
                    }else{
                        if(result.data.no_bukti == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode Form sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('telu-master/buku-rka') }}",
            dataType: 'json',
            data:{no_bukti:id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Buku RKA ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
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

    // END BUTTON HAPUS
    
    function getJenis(param,kode_jenis=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-master/dok-jenis') }}",
            dataType: 'json',
            // data:{kode_jenis:kode_jenis},
            async:false,
            success:function(result){ 
                console.log(param);
                var select = $('.'+param).selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length > 0){
                        for(var i=0;i < result.daftar.length;i++){
                            if(result.daftar[i].nama == 'Dokumen'){
                                control.addOption([{text:result.daftar[i].nama, value:result.daftar[i].kode_jenis}]);
                            }
                        }
                        if(kode_jenis != undefined && kode_jenis != null){
                            control.setValue(kode_jenis);
                        }
                    }
                }
            }
        });
    }

    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-master/buku-rka-edit') }}",
            dataType: 'json',
            data:{no_bukti:id, nik_user:"{{ Session::get('nikUser') }}"},
            async:false,
            success:function(result){
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#no_bukti').attr('readonly', true);
                    $('#no_bukti').val(id);
                    $('#tanggal').val(result.data[0].tanggal);
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#kode_pp').val(result.data[0].kode_pp); 
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    $('#input-dok tbody').html(''); 
                    var url = ("{{ config('api.url') }}" == "http://localhost:8080/api/" ? "https://api.simkug.com/api/" : "{{ config('api.url') }}" );
                    if(result.data2 != undefined && result.data2.length > 0){
                        var no=1;
                        var input='';
                        for(var i=0;i < result.data2.length;i++){
                            var line = result.data2[i];
                            if(line.kode_jenis == "DK03"){
                                input += `<tr class='row-dok'>`;
                                input += `<td class='no-dok'>`+no+`<input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`' required><input type='hidden' name='change[]' class='form-control inp-change' value='`+line.file_dok+`' required></td>`;
                                input += `<td ><input type='text' name='nama_dok[]' class='form-control inp-dok' value='`+line.nama+`' required></td>`;
                                input += `<td><select name='kode_jenis[]' class='form-control inp-kode_jenis kdjeniske`+no+`' value='' required></select></td>`;
                                input += `<td class='action_dok'><input type='text' name='nama_file[]' class='form-control inp-nama' value='`+line.file_dok+`' required></td>`;
                                input += `<td class='text-center action_dok1' ><a title='Hapus' class='badge badge-danger hapus-dok2' style='color:white'><i class='simple-icon-trash fa-1'></i></a></td>`;
                                input += `</tr>`;
                            }else{

                                input += `<tr class='row-dok'>`;
                                input += `<td class='no-dok'>`+no+`<input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+line.no_urut+`' required><input type='hidden' name='change[]' class='form-control inp-change' value='`+line.file_dok+`' required></td>`;
                                input += `<td ><input type='text' name='nama_dok[]' class='form-control inp-dok' value='`+line.nama+`' required></td>`;
                                input += `<td><select name='kode_jenis[]' class='form-control inp-kode_jenis kdjeniske`+no+`' value='' required></select></td>`;
                                input += `<td class='action_dok'><input type='text' name='nama_file[]' class='form-control inp-nama' value='`+line.file_dok+`' required readonly></td>`;
                                input += `<td class='text-center action_dok1' ><a title='Hapus' class='badge badge-danger hapus-dok2' style='color:white'><i class='simple-icon-trash fa-1'></i></a>&nbsp;<a title='Download' class='badge badge-info download-dok' style='color:white' href="`+url+`ypt-auth/storage2/`+line.file_dok+`" target='_blank'><i class='simple-icon-cloud-download fa-1'></i></a></td>`;
                                input += `</tr>`;
                            }
                            no++;
                        }
                        
                        $('#input-dok tbody').html(input);   
                        var no=1;
                        for(var i=0;i<result.data2.length;i++){
                            var line =result.data2[i];
                            getJenis('kdjeniske'+no,line.kode_jenis);
                            no++;
                        }
                    }

                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('kode_pp',result.data[0].kode_pp,result.data[0].nama_pp);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Buku RKA');
        editData(id);
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#tanggal,#kode_pp,#flag_aktif,#keterangan').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','kode_pp','flag_aktif','keterangan'];
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

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 3){

            var id = $(this).closest('tr').find('td').eq(0).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('telu-master/buku-rka-edit') }}",
                dataType: 'json',
                data:{no_bukti:id},
                async:false,
                success:function(result){
                    if(result.status){
                        var data = result.data[0];
                        var html = `<tr>
                            <td style='border:none'>No Bukti</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>`+data.tanggal+`</td>
                        </tr>
                        </tr>
                            <td>Keterangan</td>
                            <td>`+data.keterangan+`</td>
                        </tr>
                        <tr>
                            <td>Status Aktif</td>
                            <td>`+data.flag_aktif+`</td>
                        </tr>
                        `;
                        $('#table-preview tbody').html(html);
                        
                        $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Buku RKA').removeClass('py-2');
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
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
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Buku RKA');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });

    // GRID DOKUMEN
    $('#form-tambah').on('click', '.add-row-dok', function(){
        var no=$('#input-dok .row-dok:last').index();
        no=no+2;
        var input='';
        input = `<tr class='row-dok'>`;
        input += `<td class='no-dok'>`+no+`<input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`' required></td>`;
        input += `<td ><input type='text' name='nama_dok[]' class='form-control inp-dok' value='' required></td>`;
        input += `<td><select name='kode_jenis[]' class='form-control inp-kode_jenis kdjeniske`+no+`' value='' required></select></td>`;
        input += `<td class='action_dok'>`+
        `<input type='file' name='file_dok[]' required  class='inp-file_dok'>`+`</td>`;
        input += `<td class='text-center action_dok2'><a title='Hapus' class='badge badge-sm badge-danger hapus-dok' style='color:white'><i class='simple-icon-trash'></i></a></td>`;
        input += `</tr>`;
        $('#input-dok tbody').append(input);
        getJenis('kdjeniske'+no);
        hitungTotalRowDok()
    });

    $('#input-dok').on('click', '.hapus-dok', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        $('html, body').animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-dok').on('change', '.inp-kode_jenis', function(){
        var tmp = $(this).val();
        var action_dok = $(this).closest('tr').find('.action_dok');
        var change = $(this).closest('tr').find('.inp-change').val();
        if(change == undefined){

            if(tmp == 'DK02'){
                $('.label-upload').html('Upload File');
                action_dok.html("<input type='file' class='inp-file_dok' name='file_dok[]' accept='video/mp4,video/x-m4v,video/*' >");
            }
            else if(tmp == 'DK03'){
                $('.label-upload').html('Link Share');
                action_dok.html("<input type='text' name='nama_file[]' class='form-control inp-nama' value='' required >");
            }
            else{
                $('.label-upload').html('Upload File');
                action_dok.html("<input type='file' class='inp-file_dok' name='file_dok[]' accept='' >");
                $(this).closest('tr').find('.inp-file_dok').attr('accept','');
            }
        }
    });

    $('#input-dok').on('click', '.hapus-dok2', function(){
        if(confirm('Sistem akan menghapus file dari server. Apakah anda ingin menghapus data ini? ')){
            var no_bukti = $('#no_bukti').val();
            var no_urut = $(this).closest('tr').find('.inp-no_urut').val();
            
            $.ajax({
                type: 'DELETE',
                url: "{{ url('telu-master/buku-rka-dok') }}",
                dataType: 'json',
                data: {'no_bukti':no_bukti,'no_urut':no_urut},
                success:function(result){
                    alert('Penghapusan data '+result.message);
                    if(result.status){
                        dataTable.ajax.reload();
                    }else{
                        return false;
                    }
                }
            });
            
            $(this).closest('tr').remove();
            no=1;
            $('.row-dok').each(function(){
                var nom = $(this).closest('tr').find('.no-dok');
                nom.html(no);
                no++;
            });
            $('html, body').animate({ scrollTop: $(document).height() }, 1000);
        }else{
            return false;
        }
    });
    
    $('#input-dok').on('change', '.inp-file_dok', function(){
        if($(this).val() != ""){
            var formData = new FormData();
            var no_urut = $(this).closest('tr').find('.inp-no_urut').val();
            var no_bukti = $('#no_bukti').val();
            // if(no_bukti == ""){
            //     alert('Kode Gedung harus diisi terlebih dahulu!');
            //     return false;
            // }
            var nama = $(this).closest('tr').find('.inp-dok').val();
            var tanggal = $('#tanggal').val();
            var kode_jenis = $(this).closest('tr').find('.inp-kode_jenis')[0].selectize.getValue();
            var action_dok = $(this).closest('tr').find('.action_dok');
            var action_dok2 = $(this).closest('tr').find('.action_dok2');
            var toUrl = "{{ url('telu-master/buku-rka-dok-tmp') }}";
            formData.append('file_dok', $(this)[0].files[0]);
            formData.append('no_urut', no_urut);
            formData.append('no_bukti', no_bukti);
            formData.append('nama', nama);
            formData.append('kode_jenis', kode_jenis);
            formData.append('tanggal', tanggal);
            $.ajax({
                url : toUrl,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success:function(result)
                {
                    if(result.status){
                        alert(result.message);
                        var file = "{{ config('api.url').'ypt-auth/storage-tmp' }}/"+result.file;
                        
                        action_dok.html("<input type='text' name='nama_file[]' class='form-control inp-nama' value='"+result.file+"' required readonly>");
                        action_dok2.html("<a href='#' title='Hapus' data-no_bukti='"+no_bukti+"' data-no_urut='"+no_urut+"' class='badge badge-danger hapus-dok2'><i class='simple-icon-trash'></i></a> <a href='"+file+"' target='_blank' title='View' class='badge badge-info view-dok2'><i class='simple-icon-cloud-download'></i></a>"); 
                        
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('telu/sesi-habis') }}";
                    }
                    else{
                        alert(result.message);
                        action_dok.html("<input type='file' class='inp-file_dok' name='file_dok[]'>");
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                error: function(jqXHR, textStatus, errorThrown) {       
                    if(jqXHR.status==422){
                        alert(jqXHR.responseText);
                    }
                    action_dok.html("<input type='file' class='inp-file_dok' name='file_dok[]'>");
                }
            })
            
        }
    });

    $('#input-dok').on('click', '.hapus-dok2', function(){
        if(confirm('Apakah anda ingin menghapus dokumen ini? ')){
            var action_dok = $(this).closest('tr').find('.action_dok');
            var action_dok2 = $(this).closest('tr').find('.action_dok2');
            var no_urut = $(this).data('no_urut');
            var no_bukti = $(this).data('no_bukti');
            
            $.ajax({
                type: 'DELETE',
                url: "{{ url('telu-master/buku-rka-dok-tmp') }}",
                dataType: 'json',
                data: {'no_urut':no_urut,'no_bukti':no_bukti},
                success:function(result){
                    alert(result.data.message);
                    if(result.data.status){
                        action_dok.html("<input type='file' class='inp-file_dok' name='file_dok[]'>");
                        action.dok2.html("<a title='Hapus' class='badge badge-sm badge-danger hapus-dok' style='color:white'><i class='simple-icon-trash'></i></a>");
                    }else{
                        return false;
                    }
                }
            });
        }else{
            return false;
        }       
    });

    
    $('#saku-datatable').on('click','#btn-view',function(e) {
        e.preventDefault();
        $('#saku-pdf').show();
        $('#saku-datatable').hide();
        var id = $(this).closest('tr').find('td').eq(0).html();
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-master/buku-rka-edit') }}",
            dataType: 'json',
            data:{no_bukti:id},
            async:false,
            success:function(result){
                var input = ''; var no = 1;
                if(result.status){
                    for(var i=0;i < result.data2.length;i++){
                        var line = result.data2[i];
                        input += `<tr class='row-dok'>`;
                            input += `<td class='no-dok'>`+no+`</td>`;
                            input += `<td>`+line.nama+`</td>`;
                            input += `<td>`+line.kode_jenis+`</td>`;
                            input += `<td class='text-center' ><a title='View' class='badge badge-success view-dok-pdf' style='color:white' data-file='`+line.file_dok+`'><i class='simple-icon-doc fa-1'></i></a></td>`;
                        input += `</tr>`;
                        no++;
                    }
                }
                $('#table-pdf tbody').html(input);

                $('#table-pdf tbody').on('click', '.view-dok-pdf',function(e){
                    e.preventDefault();
                    $('.nav-tabs a[href="#data-prev"]').tab('show');
                    var file = $(this).data('file');
                    var url = ("{{ config('api.url') }}" == "http://localhost:8080/api/" || "{{ config('api.url') }}" == "http://localhost:8080/lumenapi/public/api/" ? "https://api.simkug.com/api/" : "{{ config('api.url') }}" );
                    $('#pdf-content').html(`<div class='col-md-12'><embed src='`+url+`ypt-auth/storage2/`+file+`' type="application/pdf" style="width:100%;height:calc(100vh - 250px)" />
                    </div>`);
                })
            }
        });
    });

    $('#saku-pdf').on('click','#btn-back',function(e) {
        e.preventDefault();
        $('#saku-pdf').hide();
        $('#saku-datatable').show();
    });

    </script>