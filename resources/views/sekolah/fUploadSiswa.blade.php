<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans.css') }}" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input type="hidden" id="method" name="_method" value="post">
    <div class="row" id="saku-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px">Upload Data Siswa</h6>
                </div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <ul class="nav nav-tabs nav-tabs-custom col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-siswa" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Siswa</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0 mt-3">
                        <div class="tab-pane active" id="data-siswa" role="tabpanel">
                            <div class="row nav-control" style="padding: 0px 5px;">
                                <div class="col-10">
                                    <div class="dropdown dropdown-container mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                            <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href='#' id="download-template" >Download Template</a>
                                            <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;">
                                        <span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" >0 baris</span>
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="table-upload" class="table table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>ID Keuangan</th>
                                        <th>Status Siswa</th>
                                        <th>Kelas</th>
                                        <th>Angkatan</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tgl Lahir</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tgl Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>No HP Siswa</th>
                                        <th>Email Siswa</th>
                                        <th>Alamat Siswa</th>
                                        <th>Nama Wali</th>
                                        <th>Alamat Wali</th>
                                        <th>Pekerjaan Wali</th>
                                        <th>No HP Wali</th>
                                        <th>Email Wali</th>
                                        <th>Gol Darah</th>
                                        <th>ID Bank</th>
                                        <th>ID Sekolah</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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

@include('modal_upload')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
// SET UP
setHeightForm()
setTimeout(() => {
    $(".card-body-footer").css("width", $(".container-fluid").width() + "px");
}, 1000)
$('#process-upload').addClass('disabled');
$('#process-upload').prop('disabled', true);

$('#btn-save').addClass('disabled');
$('#btn-save').prop('disabled', true);

var scrollform = document.querySelector('.form-body');
var psscrollform = new PerfectScrollbar(scrollform);

var $iconLoad = $('.preloader');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
// END SET UP

// LIST DATA UPLOAD
var dataTable = generateTableWithoutAjax(
    "table-upload",
    [],
    [
        { data : 'nu'},
        { data : 'nis'},
        { data : 'flag_aktif'},
        { data : 'kode_kelas'},
        { data : 'kode_akt'},
        { data : 'nama'},
        { data : 'tmp_lahir'},
        { data : 'tgl_lahir'},
        { data : 'jk'},
        { data : 'agama'},
        { data : 'hp_siswa'},
        { data : 'email'},
        { data : 'alamat_siswa'},
        { data : 'nama_wali'},
        { data : 'alamat_wali'},
        { data : 'kerja_wali'},
        { data : 'hp_wali'},
        { data : 'email_wali'},
        { data : 'gol_darah'},
        { data : 'id_bank'},
        { data : 'nis2'},
    ],
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
// END LIST DATA UPLOAD

// SAVE FORM
$('#form-tambah').validate({
    ignore: [],
    errorElement: "label",
    submitHandler: function (form) {
        var formData = new FormData(form);
        var jumdet = $('#table-upload tr').length;
        var param = $('#id').val();
        var url = "{{ url('sekolah-master/siswa-upload-simpan') }}";
        
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
                    dataTable.clear().draw();
                    
                    $('#form-tambah')[0].reset();
                    $('#form-tambah').validate().resetForm();
                    $('#row-id').hide();
                    $('#method').val('post');
                    $('#id').val('');
                    
                    msgDialog({
                        id:'-',
                        type:'sukses',
                        title: 'Sukses',
                        text:result.data.message
                    });
                }
                else if(!result.data.status && result.data.message === "Unauthorized"){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }else{
                    if(result.data.jenis == 'duplicate'){
                        msgDialog({
                            id: result.data.no_bukti,
                            type: result.data.jenis,
                            text: result.data.message
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

    },
    errorPlacement: function (error, element) {
        var id = element.attr("id");
        $("label[for="+id+"]").append("<br/>");
        $("label[for="+id+"]").append(error);
    }
});
// END SAVE FORM

// IMPORT EXCEL
$('#import-excel').click(function(e){
    $('.custom-file-input').val('');
    $('.custom-file-label').text('File upload');
    $('.pesan-upload .pesan-upload-judul').html('');
    $('.pesan-upload .pesan-upload-isi').html('')        
    $('.pesan-upload').hide();
    $('#modal-import').modal('show');
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
                        $('.progress-bar').attr('aria-valuenow', percentComplete * 100).css({
                            width: percentComplete * 100 + '%'
                        }).html(parseFloat(percentComplete * 100).toFixed(2) + '%');
                    }
                }, false);
                xhr.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        $('.progress-bar').css({
                            width: percentComplete * 100 + '%'
                        });
                    }
                }, false);
                return xhr;
            },
            type: 'POST',
            url: "{{ url('sekolah-master/siswa-upload') }}",
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
                        
                        var kode_lokasi = "{{ Session::get('lokasi') }}";
                        var nik_user = "{{ Session::get('nikUser') }}";
                        var nik = "{{ Session::get('userLog') }}";

                        var link = "{{ config('api.url').'esaku-trans/sdm-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=non";

                        $('.pesan-upload-judul').html('Gagal upload!');
                        $('.pesan-upload-judul').removeClass('text-success');
                        $('.pesan-upload-judul').addClass('text-danger');
                        $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                    $('.pesan-upload-judul').html('Gagal upload!');
                }
                
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            complete: function (xhr) {
                $('.progress').addClass('hidden');
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                $('.progress').addClass('hidden');      
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/sekolah-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                $('.pesan-upload-judul').html('Gagal upload!');
                $('.pesan-upload-isi').html(msg);
                
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
    $('.custom-file-label').html(fileName);
    $('#form-import').submit();
})

$('#process-upload').click(function(e){
    $.ajax({
        type: 'GET',
        url: "{{ url('sekolah-master/siswa-upload-load') }}",
        dataType: 'json',
        async:false,
        success:function(res){
            var result= res.data;
            dataTable.clear().draw();
            if(result.status){
                if(typeof result.data !== 'undefined' && result.data.length>0){
                    dataTable.rows.add(result.data).draw(false);
                    
                    $('#btn-save').removeClass('disabled');
                    $('#btn-save').prop('disabled', false);
                }else{
                    if(!$('#btn-save').hasClass('disabled')){
                        $('#btn-save').addClass('disabled');
                        $('#btn-save').prop('disabled', true);
                    }
                }  
                $('#modal-import').modal('hide');
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('sekolah-auth/sesi-habis') }}";
            }else{
                alert('error');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
});
// END IMPORT EXCEL

// EXPORT EXCEL
$('#download-template').click(function(){
    alert('test')
    var kode_lokasi = "{{ Session::get('lokasi') }}";
    var nik_user = "{{ Session::get('nikUser') }}";
    var nik = "{{ Session::get('userLog') }}";
    var link = "{{ config('api.url').'sekolah/siswa-export' }}?kode_lokasi="+kode_lokasi+"&nik_user="+nik_user+"&nik="+nik+"&type=template";
    window.open(link, '_blank'); 
});
// END EXPORT EXCEL
</script>