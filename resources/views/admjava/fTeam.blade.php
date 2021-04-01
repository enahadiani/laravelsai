<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />
<link rel="stylesheet" href="{{ asset('asset_adm/java/styles.css') }}" />

<x-list-data judul="Data Team" tambah="true" :thead="array('Kode Team', 'Nama Team', 'Jabatan Team', 'Aksi')" :thwidth="array(10,15,15,10)" :thclass="array('','','','text-center')" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="select-from-library-container mb-1">
                                <label for="gambar">Foto</label>
                                <div class="border-image-upload logo-perusahaan">
                                    <span class="photo-text">Click to upload</span>
                                    <img alt="photo" class="preview-photo" height="240" width="300">
                                    <input type="file" class="upload-photo" name="gambar">
                                </div>
                            </div>
                            <br />
                            <label for="kode_tim" class="id_team">Kode Tim</label>
                            <input class="form-control id_team" type="text" placeholder="Kode Tim" id="kode_team" name="kode_team" readonly>
                        </div>
                        <div class="form-group col-md-8 col-sm-12">
                            <label for="nama_team">Nama</label>
                            <input class="form-control" type="text" placeholder="Nama" id="nama_team" name="nama_team">
                            <br />
                            <label for="jabatan_team">Jabatan</label>
                            <input class="form-control" type="text" placeholder="Jabatan" id="jabatan_team" name="jabatan_team">
                            <br />
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="editor" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div>
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    $('.preview-photo').hide()
    $('.id_team').hide()
    var $iconLoad = $('.preloader');
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    var editor = CKEDITOR.replace('editor', {
        removeButtons: 'Save,Source,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,SelectAll,Scayt,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Bold,Italic,Underline,Strike,Subscript,Superscript,Image,Unlink,Link,Flash,Table,Anchor,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Language,JustifyBlock,JustifyRight,JustifyCenter,BidiRtl,BidiLtr,JustifyLeft,Blockquote,CreateDiv,Indent,Outdent,BulletedList,RemoveFormat,CopyFormatting,NumberedList,Styles,Format,Font,FontSize,TextColor,BGColor,ShowBlocks,Maximize,About'
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

    var dataTable = generateTable(
        "table-data",
        "{{ url('admjava-content/team') }}", 
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
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'id_team' },
            { data: 'nama_team' },
            { data: 'jabatan_team' }
        ],
        "{{ url('admjava-auth/sesi-habis') }}",
        [[3 ,"desc"]]
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

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        editor.setData('');
        resetImage()
        $('.id_team').hide()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Team');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').val('')
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    function resetImage() {
        $('.preview-photo').each(function(){
            $(this).attr('src', '');
        })

        $('.upload-photo').each(function(){
            $(this).val(null)
        })

        $('.photo-text').each(function(){
            $(this).show()
        })

        $('.preview-photo').each(function(){
            $(this).hide()
        })
    }

    function fileReader(index, span, image, input) {
        var inputFile = $('.'+input).eq(index)
        $(inputFile).on('change', function(){
            if(this.files && this.files[0]) { 
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.'+image).eq(index).show();
                    $('.'+span).eq(index).hide();
                    $("."+image).eq(index).attr('src', e.target.result)
                }
                reader.readAsDataURL(this.files[0])
            }
        })
    }

    $('.border-image-upload').on('click', function() {
        var index = $('.select-from-library-container').find('.border-image-upload').index(this)
        var children = $(this).children()
        var span = $(children[0]).attr('class')
        var photo = $(children[1]).attr('class')
        var input = $(children[2]).attr('class')
        
        fileReader(index, span, photo, input)
    })

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            nama_produk:{
                required: true   
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
        
            var parameter = $('#id_edit').val();
            var id = $('#kode_team').val();
            if(parameter == "edit"){
                var url = "{{ url('admjava-content/team-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('admjava-content/team') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            CKEDITOR.instances['editor'].updateElement()
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
                        resetImage()
                        editor.setData('');
                        $('.id_team').hide()
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Team');
                        $('#method').val('post');
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("id_team",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                        window.location.href = "{{ url('/admjava-auth/sesi-habis') }}";
                        
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

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

    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('admjava-content/team-show') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(response){
                var result = response.data
                if(result.status){
                    console.log(id)
                    $('.id_team').show();
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#kode_team').val(id);
                    $('#id').val(id);
                    $('#nama_team').val(result.data[0].nama_team);
                    $('#jabatan_team').val(result.data[0].jabatan_team);
                    editor.setData(result.data[0].deskripsi);

                    if(result.data[0].path_foto != null || result.data[0].path_foto != undefined || result.data[0].path_foto != '') {
                
                        $('.photo-text').hide();
                        $('.preview-photo').show();
                        $(".preview-photo").attr('src', 'https://api.simkug.com/api/admjava-auth/storage/'+result.data[0].path_foto)
                    } else {
                        $(".preview-photo").attr('src', '')
                        $('.preview-photo').hide();
                        $('.photo-text').show();
                    }
                    
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('admjava-auth/sesi-habis') }}";
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

        $('#judul-form').html('Edit Data Project');
        editData(id);
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Bank');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 3){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                        <td style='border:none'>Kode Team</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>Nama Team</td>
                        <td>`+data.nama_team+`</td>
                    </tr>
                    <tr>
                        <td>Jabatan Team</td>
                        <td>`+data.jabatan_team+`</td>
                    </tr>
                    `;
            $('#table-preview tbody').html(html);    
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Produk').removeClass('py-2');
            $('#modal-preview-id').text(id);
            // $('#modal-preview #content-preview').css({'overflow-y': 'scroll'});      
            $('#modal-preview').modal('show');  
        }
    });

    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('admjava-content/team') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Team ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('admjava-auth/sesi-habis') }}";
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

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

</script>