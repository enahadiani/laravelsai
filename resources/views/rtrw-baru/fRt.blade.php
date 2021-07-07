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
    
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Rw" tambah="true" :thead="array('Kode RT','Nama','Kode RW','Aksi')" :thwidth="array(20,50,20,10)" :thclass="array('','','','text-center')" />
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
                                <label for="kode_lokasi" >Kode RW</label>
                                <input class="form-control" type="text" placeholder="Kode Lokasi" id="kode_lokasi" name="kode_lokasi" required>                         
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_rw" >Kode RT</label>
                                <input class="form-control" type="text" placeholder="Kode RW" id="kode_rw" name="kode_rw" required>                         
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama" >Nama</label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>                         
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label>Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file_gambar" class="custom-file-input" id="file_gambar" accept="image/*" onchange="readURL(this)">
                                        <label class="custom-file-label" style="border-radius: 0.5rem;" for="file_gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row mb-2 text-center">
                                    <div style="" class="col-12">
                                        <div class="preview text-center" style="height:120px;width:120px;margin: 0 auto;border: 1px solid #d7d7d7;border-radius: 0.5rem;">Preview</div>
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
        "{{ url('rtrw-master/rt') }}", 
        [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        [
            { data: 'kode_rw' },
            { data: 'nama' },
            { data: 'kode_rt' }
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
    // END CBBL

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data RT');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_lokasi').attr('readonly', false);
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
            kode_rw:{
                required: true   
            },
            nama:{
                required: true,
                maxlength:100   
            },
            kode_rt:{
                required: true 
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            var parameter = $('#id_edit').val();
            var id = $('#kode_lokasi').val();
            if(parameter == "edit"){
                var url = "{{ url('rtrw-master/rt-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('rtrw-master/rt') }}";
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
                                type: result.data.kode_lokasi,
                                text:'Kode Lokasi sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+JSON.stringfy(result.data.message)+'</a>'
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
            url: "{{ url('rtrw-master/rt') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data RT ('+id+') berhasil dihapus ');
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
            url: "{{ url('rtrw-master/rt') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#kode_rw').attr('readonly', true);
                    $('#kode_rw').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#kode_rt').val(result.data[0].kode_rt); 
                    var html = "<img style='width:120px' style='margin:0 auto' src='"+result.data[0].logo+"'>";
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

        $('#judul-form').html('Edit Data Desa');
        editData(id);
    });

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 3){

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
                    <td style='border:none'>Kode RW</td>
                    <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                    <td>Kode RT</td>
                    <td>`+data.kode_rt+`</td>
                    </tr>
                    <tr>
                    <td>Nama RT</td>
                    <td>`+data.nama+`</td>
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
                $('#judul-form').html('Edit Data Desa');
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
    </script>