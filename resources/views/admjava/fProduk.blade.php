<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />
<link rel="stylesheet" href="{{ asset('asset_adm/java/styles.css') }}" />

<x-list-data judul="Data Produk" tambah="true" :thead="array('Kode Produk', 'Nama Produk', 'Aksi')" :thwidth="array(10,15,10)" :thclass="array('','','text-center')" />

<!-- FORM INPUT -->
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
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="nama_produk">Nama Produk</label>
                            <input class="form-control" type="text" placeholder="Nama Produk" id="nama_produk" name="nama_produk">
                            <br />
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="editor" rows="10" cols="80"></textarea>
                            <br />
                            <label for="kode_produk" class="id_produk">Kode Produk</label>
                            <input class="form-control id_produk" type="text" placeholder="Kode Produk" id="kode_produk" name="kode_produk" readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="select-from-library-container mb-1">
                                <label for="gambar[]">Gambar 1</label>
                                <div class="border-image-upload">
                                    <span class="photo-text">Click to upload</span>
                                    <img alt="photo" class="preview-photo" height="140" width="300">
                                    <input type="hidden" class="nama-gambar" name="nama_gambar[]" value="-">
                                    <input type="file" class="upload-photo" name="gambar[]">
                                </div>
                            </div>
                            <br />
                            <div class="select-from-library-container mb-1">
                                <label for="gambar[]">Gambar 2</label>
                                <div class="border-image-upload">
                                    <span class="photo-text">Click to upload</span>
                                    <img alt="photo" class="preview-photo" height="140" width="300">
                                    <input type="hidden" class="nama-gambar" name="nama_gambar[]" value="-">
                                    <input type="file" class="upload-photo" name="gambar[]">
                                </div>
                            </div>
                            <br />
                            <div class="select-from-library-container mb-1">
                                <label for="gambar[]">Gambar 3</label>
                                <div class="border-image-upload">
                                    <span class="photo-text">Click to upload</span>
                                    <img alt="photo" class="preview-photo" height="140" width="300">
                                    <input type="hidden" class="nama-gambar" name="nama_gambar[]" value="-">
                                    <input type="file" class="upload-photo" name="gambar[]">
                                </div>
                            </div>
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
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var valid = true;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
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

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

    var dataTable = generateTable(
        "table-data",
        "{{ url('admjava-content/produk') }}", 
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
            {'targets': 2, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'id_produk' },
            { data: 'nama_produk' }
        ],
        "{{ url('admjava-auth/sesi-habis') }}",
        [[2 ,"desc"]]
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
        $('.id_produk').hide();
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Produk');
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

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_bank').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    var editor = CKEDITOR.replace('editor', {
        removeButtons: 'Save,Source,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,SelectAll,Scayt,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Bold,Italic,Underline,Strike,Subscript,Superscript,Image,Unlink,Link,Flash,Table,Anchor,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Language,JustifyBlock,JustifyRight,JustifyCenter,BidiRtl,BidiLtr,JustifyLeft,Blockquote,CreateDiv,Indent,Outdent,BulletedList,RemoveFormat,CopyFormatting,NumberedList,Styles,Format,Font,FontSize,TextColor,BGColor,ShowBlocks,Maximize,About'
    });

    function fileReader(index, span, image, nama, input) {
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
        var nama = $(children[2]).attr('class')
        var input = $(children[3]).attr('class')
        
        fileReader(index, span, photo, nama, input)
    })

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
            var id = $('#kode_produk').val();
            if(parameter == "edit"){
                var url = "{{ url('admjava-content/produk-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('admjava-content/produk') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            CKEDITOR.instances['editor'].updateElement()
            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(valid) {
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
                            $('#row-id').hide();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('[id^=label]').html('');
                            $('#id_edit').val('');
                            $('#judul-form').html('Tambah Data Proyek');
                            $('#method').val('post');
                            msgDialog({
                                id:result.data.kode,
                                type:'simpan'
                            });
                            last_add("id_produk",result.data.kode);
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
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Produk');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('admjava-content/produk-show') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(response){
                var result = response.data
                if(result.status){
                    $('.id_produk').show();
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#kode_produk').val(id);
                    $('#id').val(id);
                    $('#nama_produk').val(result.data[0].nama_produk);
                    editor.setData(result.data[0].keterangan);

                    for(var i=0;i<result.file.length;i++) {
                        var file = result.file[i]
                        if(file.path_foto != null || file.path_foto != undefined || file.path_foto != '') {
                            $('.photo-text').eq(i).hide()
                            $('.nama-gambar').eq(i).val(file.path_foto)
                            $('.preview-photo').eq(i).show()
                            $('.preview-photo').eq(i).attr('src', 'https://api.simkug.com/api/admjava-auth/storage/'+file.path_foto);
                        } else {
                            $('.photo-text').eq(i).show()
                            $('.preview-photo').eq(i).hide()
                        }
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

        $('#judul-form').html('Edit Data Produk');
        editData(id);
    });

    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('admjava-content/produk') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Produk ('+id+') berhasil dihapus ');
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

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 2){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                        <td style='border:none'>Kode Produk</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>Nama Produk</td>
                        <td>`+data.nama_produk+`</td>
                    </tr>
                    `;
            $('#table-preview tbody').html(html);    
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Produk').removeClass('py-2');
            $('#modal-preview-id').text(id);
            // $('#modal-preview #content-preview').css({'overflow-y': 'scroll'});      
            $('#modal-preview').modal('show');  
        }
    });

</script>