<link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <style>
        #generate_kode
        {
            position: absolute;
            top: 30px;
            right: 25px;
            z-index: 2;
            font-size: 18px;
            cursor: pointer;
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

        #tgl_keluar-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }

        #tgl_lahir-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }

        .selectize-control .selectize-input.disabled {
            opacity: 1;
            background-color: #e9ecef;
        }
    
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Warga Keluar" tambah="true" :thead="array('ID Warga','Blok','No Rumah','Nama','Tgl Keluar','Sts Keluar','Aksi')" :thwidth="array(20,10,10,30,10,10,10)" :thclass="array('','','','','','','text-center')" />
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
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="kode_rw" >RW</label>
                                        <input class="form-control" type="text" placeholder="Kode RW" id="kode_rw" name="kode_rw" required readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kode_rt" >RT</label>
                                        <input class="form-control" type="text" placeholder="Kode RT" id="kode_rt" name="kode_rt" required readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tgl_keluar">Tgl Keluar</label>
                                        <span id="tgl_keluar-dp"></span>
                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" id="tgl_keluar" name="tgl_keluar" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_bukti_keluar" >No Bukti</label>
                                        <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti_keluar" name="no_bukti_keluar" readonly="true" required>
                                        <i class="simple-icon-refresh" id="generate_kode"></i>          
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="id_warga" >ID Warga</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_id_warga" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-id_warga" id="id_warga" name="id_warga" value="" title="">
                                            <span class="info-name_id_warga hidden">
                                            <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_id_warga"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sts_masuk">Status Keluar</label>
                                        <select class='form-control selectize' id="sts_masuk" name="sts_masuk">
                                        <option value='' disabled selected>--- Pilih Status ---</option>
                                        <option value='PINDAH'>PINDAH</option>
                                        <option value='MENINGGAL'>MENINGGAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="kode_blok" >Blok</label>
                                        <input class="form-control" type="text" placeholder="Blok" id="kode_blok" name="kode_blok" readonly>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_rumah" >No Rumah</label>
                                        <input class="form-control" type="text" placeholder="Blok" id="no_rumah" name="no_rumah" readonly>  
                                    </div>
                                </div>                       
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="keterangan" >Keterangan</label>
                                <input class="form-control" type="text" placeholder="Keterangan" id="keterangan" name="keterangan" required>          
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="alias" >Alias</label>
                                        <input class="form-control" type="text" placeholder="Alias" id="alias" name="alias" readonly>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jk" >Jenis Kelamin</label>
                                        <select name="jk" class="form-control selectize" id="jk" disabled readonly>
                                            <option value='' disabled selected>--- Pilih ---</option>
                                            <option value="P">P</option>
                                            <option value="L">L</option>
                                        </select>
                                    </div>
                                </div>                       
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tempat_lahir" >Tempat Lahir</label>
                                        <input class="form-control" type="text" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" readonly>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tgl_lahir" >Tgl Lahir</label>
                                        <span id="tgl_lahir-dp"></span>
                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" id="tgl_lahir" name="tgl_lahir" readonly>
                                    </div>
                                </div>                       
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
    </form>
    <!-- END FORM INPUT -->
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    var valid = true;
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

    $('.selectize').selectize();

    $("#tgl_keluar").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container:'span#tgl_keluar-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });

    $("#tgl_lahir").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container:'span#tgl_lahir-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });

    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var html = `<img id="img-preview" width="120px" src="`+e.target.result+`" alt="Preview" style='margin:0 auto'>`;
                $('.preview').html(html);
            };
            
            reader.readAsDataURL(input.files[0]);
        }
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

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('rtrw-master/warga-masuk') }}", 
        [
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        [
            { data: 'no_bukti' },
            { data: 'kode_blok' },
            { data: 'no_rumah' },
            { data: 'nama' },
            { data: 'tgl_masuk' },
            { data: 'sts_masuk' },
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

    function deleteInfoField(par){
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $('#'+par).closest('div').find('.info-icon-hapus').addClass('hidden');
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
    // END CBBL

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Warga Keluar');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_rw').val("{{ Session::get('lokasi') }}");
        $('#kode_rt').val("{{ Session::get('kodePP') }}");
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        setWidthFooterCardBody()
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
        var kode = $('#kode_lokasi').val();
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
            kode_blok: 
            { 
                required:true 
            },
            id_warga: 
            { 
                required:true 
            },
            no_rumah: 
            { 
                required:true 
            },
            nama: 
            { 
                required:true 
            },
            alias: 
            { 
                required:true 
            },
            nik: 
            { 
                required:true 
            },
            jk: 
            { 
                required:true 
            },
            tempat_lahir: 
            { 
                required:true 
            },
            tgl_lahir: 
            { 
                required:true 
            },
            agama: 
            { 
                required:true 
            },
            goldar: 
            { 
                required:true 
            },
            pendidikan: 
            { 
                required:true 
            },
            pekerjaan: 
            { 
                required:true 
            },
            sts_nikah: 
            { 
                required:true 
            },
            sts_hub: 
            { 
                required:true 
            },
            sts_domisili: 
            { 
                required:true 
            },
            no_hp: 
            { 
                required:true 
            },
            no_telp_emergency: 
            { 
                required:true 
            },
            ket_emergency: 
            { 
                required:true 
            },
            tgl_keluar: 
            { 
                required:true 
            },
            sts_masuk: 
            { 
                required:true 
            },
            kode_rt: 
            { 
                required:true 
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            var parameter = $('#id_edit').val();
            var id = $('#id_warga').val();
            if(parameter == "edit"){
                var url = "{{ url('rtrw-master/warga-masuk') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('rtrw-master/warga-masuk') }}";
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
                        $('#judul-form').html('Tambah Data Lokasi');
                        $('#method').val('post');
                        $('#kode_lokasi').attr('readonly', false);
                        msgDialog({
                            id:id,
                            type:'simpan',
                            text:result.data.message
                        });
                        last_add("kode_lokasi",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/rtrw-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.no_bukti,
                                text:'ID Warga sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+JSON.stringify(result.data.message)+'</a>'
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
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rtrw-master/warga-masuk') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Warga Keluar ('+id+') berhasil dihapus ');
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

    function getRumah(id=null,blok=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/rumah') }}/"+id,
            dataType: 'json',
            async:false,
            data:{blok: blok},
            success:function(result){   
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('no_rumah',result.data[0].kode_rumah,result.data[0].nama_pemilik);
                    }else{
                        $('#no_rumah').attr('readonly',false);
                        $('#no_rumah').css('border-left','1px solid #d7d7d7');
                        $('#no_rumah').val('');
                        $('#no_rumah').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#no_rumah').attr('readonly',false);
                    $('#no_rumah').css('border-left','1px solid #d7d7d7');
                    $('#no_rumah').val('');
                    $('#no_rumah').focus();
                }
            }
        });
    }

    
    function getBlok(id=null,rt=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/blok') }}/"+id,
            dataType: 'json',
            async:false,
            data:{kode_pp: rt},
            success:function(result){   
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_blok',result.data[0].blok,"");
                    }else{
                        $('#kode_blok').attr('readonly',false);
                        $('#kode_blok').css('border-left','1px solid #d7d7d7');
                        $('#kode_blok').val('');
                        $('#kode_blok').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#kode_blok').attr('readonly',false);
                    $('#kode_blok').css('border-left','1px solid #d7d7d7');
                    $('#kode_blok').val('');
                    $('#kode_blok').focus();
                }
            }
        });
    }

    
    function generateIDWarga(tgl_keluar){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/generate-idwarga') }}",
            dataType: 'json',
            async:false,
            data:{tgl_keluar: tgl_keluar},
            success:function(result){   
                $('#id_warga').val('');
                if(result.status){
                    $('#id_warga').val(result.no_bukti);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    alert('Generate ID Error');
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
            url: "{{ url('rtrw-master/warga-masuk-detail') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#id_warga').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#kode_rw').val(result.data[0].kode_rw);
                    $('#kode_rt').val(result.data[0].kode_rt); 
                    $('#no_rumah').val(result.data[0].no_rumah); 
                    $('#nik').val(result.data[0].nik);
                    $('#alias').val(result.data[0].alias);
                    $('#tempat_lahir').val(result.data[0].tempat_lahir);
                    $('#tgl_lahir').val(result.data[0].tgl_lahir);
                    $('#kode_blok').val(result.data[0].kode_blok);
                    $('#sts_masuk')[0].selectize.setValue(result.data[0].sts_masuk);
                    $('#tgl_keluar').val(result.data[0].tgl_keluar);
                    $('#agama')[0].selectize.setValue(result.data[0].agama);
                    $('#jk')[0].selectize.setValue(result.data[0].jk);
                    $('#pendidikan').val(result.data[0].pendidikan); 
                    $('#pekerjaan').val(result.data[0].pekerjaan); 
                    $('#no_hp').val(result.data[0].no_hp); 
                    $('#emerg_call').val(result.data[0].emerg_call); 
                    $('#ket_emergency').val(result.data[0].ket_emergency); 
                    $('#sts_nikah')[0].selectize.setValue(result.data[0].sts_nikah);
                    $('#sts_hub')[0].selectize.setValue(result.data[0].sts_hub);
                    $('#sts_domisili')[0].selectize.setValue(result.data[0].sts_domisili);
                    $('#goldar')[0].selectize.setValue(result.data[0].goldar);
                    var html = "<img style='width:120px' style='margin:0 auto' src='"+result.data[0].foto+"'>";
                    $('.preview').html(html);          
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
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

        $('#judul-form').html('Edit Data Warga Keluar');
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
                    <td style='border:none'>ID Warga</td>
                    <td style='border:none'>`+data.no_bukti+`</td>
                    </tr>
                    <tr>
                    <td>Blok</td>
                    <td>`+data.kode_blok+`</td>
                    </tr>
                    <tr>
                    <td>Nama</td>
                    <td>`+data.nama+`</td>
                    </tr>
                    <tr>
                    <td>Tgl Keluar</td>
                    <td>`+data.tgl_keluar+`</td>
                    </tr>
                    <tr>
                    <td>Status Keluar</td>
                    <td>`+data.sts_masuk+`</td>
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
                $('#judul-form').html('Edit Data Warga Keluar');
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

    function getBlok(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/blok') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                deleteInfoField('no_rumah');
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_blok',result.data[0].blok,"");
                    }else{
                        $('#kode_blok').attr('readonly',false);
                        $('#kode_blok').css('border-left','1px solid #d7d7d7');
                        $('#kode_blok').val('');
                        $('#kode_blok').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#kode_blok').attr('readonly',false);
                    $('#kode_blok').css('border-left','1px solid #d7d7d7');
                    $('#kode_blok').val('');
                    $('#kode_blok').focus();
                }
            }
        });
    }


    $('#form-tambah').on('click', '.search-item2', function(e){
        e.preventDefault();
        var id = $(this).closest('div').find('input').attr('name');
        var options = {};
        switch(id){
            case 'kode_blok':
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
                    width : ["100%"],
                    parameter:{kode_pp:$('#kode_pp').val()},
                    onItemSelected: function(data){
                        showInfoField("kode_blok",data.blok,"");
                        deleteInfoField("no_rumah");
                    }
                };
                break;
            case 'no_rumah':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('rtrw-master/rumah') }}",
                    columns : [
                        { data: 'kode_rumah' },
                        { data: 'nama_pemilik' }
                    ],
                    judul : "Daftar Rumah",
                    pilih : "rumah",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    parameter:{blok:$('#kode_blok').val()},
                    onItemSelected: function(data){
                        showInfoField("no_rumah",data.kode_rumah,data.nama_pemilik);
                    }
                };
                break;
        }
        showInpFilterBSheet(options);
    });

    
    $('#form-tambah').on('change', '#kode_blok', function(e){
        e.preventDefault();
        var par = $(this).val();
        var kode_rt = $('#kode_rt').val();
        getBlok(par,kode_rt);
    });

    $('#form-tambah').on('change', '#no_rumah', function(e){
        e.preventDefault();
        var par = $(this).val();
        var blok = $('#kode_blok').val();
        getRumah(par,blok);
    });

    $('#form-tambah').on('click', '#generate_kode', function(e){
        e.preventDefault();
        var tgl = $('#tgl_keluar').val();
        generateIDWarga(tgl);
    });

    $('#tgl_keluar').on('changeDate', function() {
        var tgl = $('#tgl_keluar').bootstrapDP('getFormattedDate');
        generateIDWarga(tgl);
    });

    // ENTER FIELD FORM
    $('#kode_rw,#kode_rt,#kode_blok,#no_rumah,#tgl_keluar,#sts_masuk,#id_warga,#nik,#nama,#alias,#jk,#tempat_lahir,#tgl_lahir,#agama,#goldar,#pendidikan,#pekerjaan,#sts_nikah,#sts_domisili,#sts_hub,#no_hp,#emerg_call,#ket_emergency,#foto').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_rw','kode_rt','kode_blok','no_rumah','tgl_keluar','sts_masuk','id_warga','nik','nama','alias','jk','tempat_lahir','tgl_lahir','agama','goldar','pendidikan','pekerjaan','sts_nikah','sts_domisili','sts_hub','no_hp','emerg_call','ket_emergency','foto'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 6 || idx == 11 || idx == 14 || idx == 15 || idx== 18 || idx == 19 || idx == 20){
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

    </script>