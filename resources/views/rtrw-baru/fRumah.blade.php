    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <style>
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
    <x-list-data judul="Data Rumah" tambah="true" :thead="array('Kode Rumah','Tipe','Blok','RT','RW','Status Huni','Aksi')" :thwidth="array(20,10,15,15,15,15,10)" :thclass="array('','','','','','','text-center')" />
    <!-- END LIST DATA -->

    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-0 form-body">
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#rumah" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Rumah</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pemilik" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pemilik</span></a> </li>
                        </ul>
                        <div class="tab-content tab-form-content col-12 pt-3 px-0">
                            <div class="tab-pane active" id="rumah" role="tabpanel">
                                <div class="form-group row " id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                        <input type="hidden" id="method" name="_method" value="post">
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="rw" >RW</label>
                                        <input class="form-control" type="text" placeholder="Kode RW" id="rw" name="rw" required readonly>                         
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="rt" >RT</label>
                                        <input class="form-control" type="text" placeholder="Kode RW" id="rt" name="rt" required readonly>                         
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="blok">Blok</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_blok" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-blok" id="blok" name="blok" value="" title="">
                                            <span class="info-name_blok hidden">
                                            <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_blok"></i>
                                        </div>  
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="kode_rumah" >Kode Rumah</label>
                                        <input class="form-control" type="text" placeholder="Kode Rumah" id="kode_rumah" name="kode_rumah" required>                         
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="alamat" >Alamat</label>
                                        <input class="form-control" type="text" placeholder="Kode Rumah" id="alamat" name="alamat" required>                         
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="tipe" >Tipe</label>
                                        <input class="form-control" type="text" placeholder="Tipe Rumah" id="tipe" name="tipe" required>                         
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="status_huni">Status Huni</label>
                                        <select class='form-control' id="status_huni" name="status_huni">
                                        <option value='' disabled selected>--- Pilih Status ---</option>
                                        <option value='PEMILIK'>PEMILIK</option>
                                        <option value='PENGONTRAK'>PENGONTRAK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="no_tel" >No Telpon</label>
                                        <input class="form-control" type="text" placeholder="No Telpon" id="no_tel" name="no_tel" required>                         
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="emerg_call" >No Emergency Call</label>
                                        <input class="form-control" type="text" placeholder="No Telp Emergency" id="emerg_call" name="emerg_call" required>                         
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="pbb" >No PBB</label>
                                        <input class="form-control" type="text" placeholder="No Telpon" id="pbb" name="pbb" required>                         
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="pln" >No Meteran Listrik</label>
                                        <input class="form-control" type="text" placeholder="No Meteran Listrik" id="pln" name="pln" required>                         
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pemilik" role="tabpanel">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="tgl_masuk" >Tgl Masuk</label>
                                        <span id="tgl_masuk-dp"></span>
                                        <input class="form-control" type="text" placeholder="dd/mm/yyyy" id="tgl_masuk" name="tgl_masuk" readonly>                         
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <input type="hidden" value=0  name="status_edit" id="status_edit" class="form-control">
                                        <button id="edit_milik" class="btn btn-primary btn-sm float-right"><i class="simple-icon-pencil"></i> Ubah Data</button>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="nama_pemilik" >Nama Pemilik</label>
                                        <input class="form-control" type="text" placeholder="Nama Pemilik" id="nama_pemilik" name="nama_pemilik" readonly>                         
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="alamat_pemilik" >Alamat</label>
                                        <input class="form-control" type="text" placeholder="Alamat" id="alamat_pemilik" name="alamat_pemilik" readonly>                         
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="no_tel_milik" >No Telpon</label>
                                        <input class="form-control" type="text" placeholder="No Telpon" id="no_tel_milik" name="no_tel_milik" readonly>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-footer row mx-auto" style="padding: 0 25px;">
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
    </form>
    <!-- END FORM INPUT -->
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    var valid = true;
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    setHeightForm();

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
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

    $('#status_huni').selectize();
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

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
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
    // END LIST DATA

    // CBBL
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

    function getRT(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/rt') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('rt',result.data[0].kode_rt,result.data[0].nama);
                    }else{
                        $('#rt').attr('readonly',false);
                        $('#rt').css('border-left','1px solid #d7d7d7');
                        $('#rt').val('');
                        $('#rt').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#kode_pp').attr('readonly',false);
                    $('#kode_pp').css('border-left','1px solid #d7d7d7');
                    $('#kode_pp').val('');
                    $('#kode_pp').focus();
                }
            }
        });
    }

    function getBlok(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/blok') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('blok',result.data[0].blok,result.data[0].blok);
                    }else{
                        $('#blok').attr('readonly',false);
                        $('#blok').css('border-left','1px solid #d7d7d7');
                        $('#blok').val('');
                        $('#blok').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#blok').attr('readonly',false);
                    $('#blok').css('border-left','1px solid #d7d7d7');
                    $('#blok').val('');
                    $('#blok').focus();
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function(e){
        e.preventDefault();
        var id = $(this).closest('div').find('input').attr('name');
        var options = {};
        switch(id){
            case 'rt':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('rtrw-master/rt') }}",
                    columns : [
                        { data: 'kode_rt' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar RT",
                    pilih : "rt",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
                break;
            case 'blok':
                options = {
                    id : id,
                    header : ['Kode'],
                    url : "{{ url('rtrw-master/blok') }}",
                    columns : [
                        { data: 'blok' }
                    ],
                    judul : "Daftar Blok",
                    pilih : "blok",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    parameter:{kode_pp:$('#kode_pp').val()}
                }
                break;
        }
        showInpFilterBSheet(options);
    });

    $('#form-tambah').on('change', '#rt', function(){
        var par = $(this).val();
        getProvinsi(par);
    });

    $('#form-tambah').on('change', '#blok', function(){
        var par = $(this).val();
        var pp = $('#rt').val();
        getBlok(par,pp);
    });
    // END CBBL

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Rumah');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_rumah').attr('readonly', false);
        $('#rw').val("{{ Session::get('lokasi') }}");
        $('#rt').val("{{ Session::get('kodePP') }}");
        $('#status_edit').val(0);
        $('#edit_milik').html('<i class="simple-icon-pencil"></i> Ubah Data');
        $('#tgl_masuk').prop('readonly',true);
        $('#nama_pemilik').prop('readonly',true);
        $('#alamat_pemilik').attr('readonly',true);
        $('#no_tel_milik').attr('readonly',true);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        setHeightForm();
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

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_kota').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_rumah:{
                required: true,
                maxlength:10   
            },
            rt:{
                required: true  
            },
            rw:{
                required: true  
            },
            tipe:{
                required: true, 
                maxlength:50  
            },
            blok:{
                required: true 
            },
            status_huni:{
                required: true 
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            var parameter = $('#id_edit').val();
            var id = $('#kode_rumah').val();
            if(parameter == "edit"){
                var url = "{{ url('rtrw-master/rumah') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('rtrw-master/rumah') }}";
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
                        $('#judul-form').html('Tambah Data Rumah');
                        $('#method').val('post');
                        $('#kode_rumah').attr('readonly', false);
                        msgDialog({
                            id:id,
                            type:'simpan',
                            text:result.data.message
                        });
                        last_add("kode_rumah",id);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/rtrw-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode Rumah sudah digunakan'
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
                error: function(xhr, status, error) {
                    var error = JSON.parse(xhr.responseText);
                    var detail = Object.values(error.errors)
                    Swal.fire({
                        type: 'error',
                        title: error.message,
                        text: detail[0]
                    })
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-save').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // BUTTON HAPUS DATA
    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rtrw-master/rumah') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Rumah ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
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

    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/rumah') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_rumah').attr('readonly', true);
                    $('#kode_rumah').val(id);
                    $('#rw').val(result.data[0].rw);
                    $('#id').val(id);
                    $('#tipe').val(result.data[0].tipe);
                    $('#status_huni')[0].selectize.setValue(result.data[0].status_huni);
                    $('#rt').val(result.data[0].rt);    
                    $('#blok').val(result.data[0].blok); 
                    $('#alamat').val(result.data[0].alamat);
                    $('#no_tel').val(result.data[0].no_tel);  
                    $('#emerg_call').val(result.data[0].emerg_call);  
                    $('#pbb').val(result.data[0].pbb); 
                    $('#pln').val(result.data[0].pln); 
                    
                    $('#status_edit').val(0);
                    $('#edit_milik').html('<i class="simple-icon-pencil"></i> Ubah Data');
                    $('#tgl_masuk').prop('readonly',true);
                    $('#nama_pemilik').prop('readonly',true);
                    $('#alamat_pemilik').attr('readonly',true);
                    $('#no_tel_milik').attr('readonly',true);
                    $('#tgl_masuk').val(result.data[0].tgl_masuk);    
                    $('#alamat_pemilik').val(result.data[0].alamat_pemilik);   
                    $('#nama_pemilik').val(result.data[0].nama_pemilik);   
                    $('#no_tel_milik').val(result.data[0].no_tel_milik);            
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('kode_pp',result.data[0].rt,result.data[0].nama_pp);
                    showInfoField('blok',result.data[0].blok,"");
                    setHeightForm();
                    setWidthFooterCardBody();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
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

        $('#judul-form').html('Edit Data Rumah');
        editData(id);
    });

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

    $('#kode_rw,#kode_pp,#blok,#kode_rumah,#tipe,#status_huni').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_rw','kode_pp','blok','kode_rumah','tipe','status_huni'];
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

    $('#edit_milik').click(function(e){
        e.preventDefault();
        var status = $('#status_edit').val();
        if(status == 1){
            $('#status_edit').val(0);
            $('#edit_milik').html('<i class="simple-icon-pencil"></i> Ubah Data');
            $('#tgl_masuk').prop('readonly',true);
            $('#nama_pemilik').prop('readonly',true);
            $('#alamat_pemilik').attr('readonly',true);
            $('#no_tel_milik').attr('readonly',true);
        }else{
            $('#status_edit').val(1);
            $('#edit_milik').html('Reset Data');
            $('#tgl_masuk').prop('readonly',false);
            $('#nama_pemilik').prop('readonly',false);
            $('#alamat_pemilik').attr('readonly',false);
            $('#no_tel_milik').attr('readonly',false);
        }
    })
    </script>