<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans.css') }}" />

{{-- LIST DATA --}}
<x-list-data judul="Data Penghargaan" tambah="true" :thead="array('Nama','Tanggal','Aksi','NU')" :thwidth="array(20,20,10,10)" :thclass="array('','','text-center','')" />
{{-- END LIST DATA --}}

{{-- FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="nu" name="nu">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <ul class="nav nav-tabs nav-tabs-custom col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-umum" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Umum</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-foto" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Sertifikat</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0 mt-3">
                        <div class="tab-pane active" id="data-umum" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="nama">Nama Penghargaan</label>
                                            <input class="form-control" type="text" placeholder="Nama Pelatihan" id="nama" name="nama" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tanggal">Tanggal Penghargaan</label>
                                            <span class="span-tanggal" id="tanggal"></span>
                                            <input class='form-control datepicker' id="tanggal" name="tanggal" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-foto" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="file">Sertifikat</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="file" class="custom-file-input" id="file" accept="image/*">
                                                    <label class="custom-file-label" style="border-radius: 0.5rem;cursor:pointer;" for="file">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <img alt="preview" id="preview" height="380" width="550">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body-footer row" style="padding: 0 25px;">
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
{{-- END FORM --}}

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
// SET UP FORM
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var scroll = document.querySelector('#content-preview');
new PerfectScrollbar(scroll);

var scrollForm = document.querySelector('#form-body');
new PerfectScrollbar(scrollForm);
// END SET UP FORM

// OPTIONAL CONFIG
$('.selectize').selectize();

$('#tanggal').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

function showPreview(image) {
    if(image.files && image.files[0]) {
        var reader = new FileReader()
        reader.onload = function(event) {
            $('#preview').attr('src', event.target.result)
            $('#preview').show()
        }
        reader.readAsDataURL(image.files[0])
    }
}

$('#file').change(function() {
    var fileName = $(this).val();
    $(this).next('.custom-file-label').html(fileName);
    showPreview(this);
})
// END OPTIONAL CONFIG

// BTN TAMBAH
$('#saku-datatable').on('click', '#btn-tambah', function() {
    $('#preview').hide();
    $('#nu').val('');
    $('#judul-form').html('Tambah Data Penghargaan');
    newForm();
});
//  END BTN TAMBAH

// BTN KEMBALI
$('#saku-form').on('click', '#btn-kembali', function(){
    var kode = null;
    msgDialog({
        id:kode,
        type:'keluar'
    });
});

// SAKU TABLE
var actionHtmlDefault = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
var dataTable = 
generateTable(
    "table-data",
    "{{ url('esaku-trans/sdm-penghargaans') }}", 
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
        {'targets': 2 ,'className': 'text-center', 'defaultContent': actionHtmlDefault,'className': 'text-center' },
        {'targets': 3, 'className': 'hidden' }
    ],
    [
        { data: 'nama' },
        { data: 'tanggal' },
        { data: null },
        { data: 'nu' },
    ],
    "{{ url('esaku-auth/sesi-habis') }}",
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
// END SAKU TABLE

// SAVE TRIGGER
$('#form-tambah').validate({
    ignore: [],
    rules: {},
    errorElement: "label",
    submitHandler: function (form, event) {
        event.preventDefault()
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "true"){
            var url = "{{ url('esaku-trans/sdm-penghargaan-update') }}";
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        } else {
            var url = "{{ url('esaku-trans/sdm-penghargaan') }}";
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
                    var kode = result.data.kode;
                    dataTable.ajax.reload();
                    $('#preview').hide()
                    $('#file').val('')
                    $('#file').next('.custom-file-label').html('');
                    $('#judul-form').html('Tambah Data Penghargaan');
                    $('#nu').val('');
                    resetForm();
                    msgDialog({
                        id: kode,
                        type: 'simpan'
                    });
                    last_add(dataTable,"no_sk", kode);
                    $('#id_edit').val('false')
                } else if(!result.data.status && result.data.message === "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                } else {
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
// END SAVE TRIGGER

// EDIT DATA
$('#saku-form').on('click', '#btn-update', function(){
    var kode = $('#nu').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});

$('#saku-datatable').on('click', '#btn-edit', function(){
    var id= $(this).closest('tr').find('td').eq(3).html();
    editData(id)
});

function editData(id) { 
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');
    $('#judul-form').html('Edit Data Penghargaan');

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/sdm-penghargaan') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(res) {
            console.log(res)
            var data = res.data.data[0]
            if(res.data.status) {
                $('#id_edit').val('true')
                $('#id').val(id)
                $('#nu').val(id)
                $('#nama').val(data.nama)

                $('#tanggal').val(data.tanggal,'-','/')

                if(data.setifikat !== null || data.setifikat !== '-') {
                    var url = "{{ config('api.url').'sdm/storage' }}/"+data.foto;
                    $('#preview').attr('src', url);
                    $('#preview').show()
                }

                $('#saku-datatable').hide();
                $('#modal-preview').modal('hide');
                $('#saku-form').show();
                setHeightForm();
                setWidthFooterCardBody();
            } 
        }
    })
}
// END EDIT DATA

// HAPUS DATA
$('#saku-datatable').on('click','#btn-delete',function(e){
    var kode = $(this).closest('tr').find('td').eq(3).html();
    msgDialog({
        id: kode,
        type:'hapus'
    });
});

function hapusData(id){
    $.ajax({
        type: 'DELETE',
        url: "{{ url('esaku-trans/sdm-penghargaan') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload();                    
                showNotification("top", "center", "success",'Hapus Data','Data penghargaan ('+id+') berhasil dihapus ');
                $('#modal-pesan-id').html('');
                $('#table-delete tbody').html('');
                $('#modal-pesan').modal('hide');
            } else if(!result.data.status && result.data.message == "Unauthorized"){
                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
            } else {
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
// END HAPUS DATA
</script>