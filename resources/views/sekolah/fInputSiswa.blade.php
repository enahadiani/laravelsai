<link rel="stylesheet" href="{{ asset('trans.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans_sekolah.css?version=_').time() }}" />

{{-- SAKU TABLE --}}
<x-list-data judul="Data Siswa" tambah="true" :thead="array('ID','NIS','Nama', 'PP', 'Angkatan', 'Kelas', 'Aksi')" :thwidth="array(15,15,25,10,10,10,10)" :thclass="array('','','','','','','text-center')" />
{{-- END SAKU TABLE --}}

{{-- FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" value="false">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body pt-0 form-body" id="form-body">
                    <ul class="nav nav-tabs nav-tabs-custom col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-siswa" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Siswa</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-wali" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Wali</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-bank" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Bank</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0 mt-3">
                        <div class="tab-pane active" id="data-siswa" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <label for="nis">ID Keuangan</label>
                                            <input class="form-control" type="text" placeholder="ID Keuangan" id="nis" name="nis" autocomplete="off" >
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <label for="nama">Nama</label>
                                            <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <span class="span-tanggal" id="tanggal-lahir"></span>
                                            <input class='form-control datepicker' id="tgl_lahir" name="tgl_lahir" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tempat">Tempat Lahir</label>
                                            <input class="form-control" type="text" placeholder="Tempat Lahir" id="tempat" name="tempat" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select class="form-control selectize" name="jk" id="jk">
                                                <option value="L" selected>Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="agama">Agama</label>
                                            <input class="form-control" type="text" placeholder="Agama" id="agama" name="agama" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="alamat_siswa">Alamat Siswa</label>
                                            <input class="form-control" type="text" placeholder="Alamat Siswa" id="alamat_siswa" name="alamat_siswa" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="hp_siswa">No HP Siswa</label>
                                            <input class="form-control" type="text" placeholder="No HP Siswa" id="hp_siswa" name="hp_siswa" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="email_siswa">Email Siswa</label>
                                            <input class="form-control" type="text" placeholder="Email Siswa" id="email_siswa" name="email_siswa" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="gol_darah">Golongan Darah</label>
                                            <select class="form-control selectize" name="gol_darah" id="gol_darah">
                                                <option value="A" selected>A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_status">Status Siswa</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_status" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_status" id="kode_status" name="kode_status" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_status hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_status"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_akt">Tahun Ajaran</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_akt" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_akt" id="kode_akt" name="kode_akt" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_akt hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_akt"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_kelas">Kelas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_kelas" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_kelas" id="kode_kelas" name="kode_kelas" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_kelas hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_kelas"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_pp">Kode PP</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" autocomplete="off" data-input="cbbl" value="" title=""  readonly>
                                                <span class="info-name_kode_pp hidden">
                                                    <span></span> 
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="nis2">ID Sekolah</label>
                                            <input class="form-control" type="text" placeholder="ID Sekolah" id="nis2" name="nis2" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-wali" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="nama_wali">Nama Wali</label>
                                            <input class="form-control" type="text" placeholder="Nama Wali" id="nama_wali" name="nama_wali" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <label for="alamat_wali">Alamat Wali</label>
                                            <input class="form-control" type="text" placeholder="Alamat Wali" id="alamat_wali" name="alamat_wali" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="hp_wali">No HP Wali</label>
                                            <input class="form-control" type="text" placeholder="No HP Wali" id="hp_wali" name="hp_wali" autocomplete="off" >
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="email_wali">Email Wali</label>
                                            <input class="form-control" type="text" placeholder="Email Wali" id="email_wali" name="email_wali" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kerja_wali">Pekerjaan Wali</label>
                                            <input class="form-control" type="text" placeholder="Pekerjaan Wali" id="kerja_wali" name="kerja_wali" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-bank" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="id_bank">ID Bank</label>
                                            <input class="form-control" type="text" placeholder="ID Bank" id="id_bank" name="id_bank" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body-footer" style="padding: 0 25px;">
                    <button type="submit" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- END FORM --}}

<button id="trigger-bottom-sheet" style="display:none">&nbsp;</button>

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js?version=_').time() }}"></script>
<script src="{{ asset('helper.js?version=_').time() }}"></script>
<script src="{{ asset('main.js?version=_').time() }}"></script>

<script type="text/javascript">
// SET UP FORM
var scrollForm = document.querySelector('#form-body');
new PerfectScrollbar(scrollForm);

var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet; 
// END SET UP FORM

// CONFIG
$('.selectize').selectize();

$("input.datepicker").datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    }
});
// END CONFIG

// SAKU TABLE
var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
var dataTable = generateTable(
    "table-data",
    "{{ url('sekolah-trans/siswa') }}", 
    [
        {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
        {
            "targets": 0,
            "createdCell": function (td, cellData, rowData, row, col) {
                if ( rowData.status == "baru" ) {
                    $(td).parents('tr').addClass('selected');
                    $(td).addClass('last-add');
                }
            }
        }
    ],
    [
            { data: 'nis' },
            { data: 'nis2' },
            { data: 'nama' },
            { data: 'pp' },
            { data: 'kode_akt' },
            { data: 'kode_kelas' }
    ],
    "{{ url('sekolah-auth/sesi-habis') }}",
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
// SAKU TABLE

// TRIGGER FORM
$('#saku-datatable').on('click', '#btn-tambah', function() {
    $('#judul-form').html('Tambah Data Siswa');
    $('#nis').attr('readonly', false);
    newForm();
    setHeightForm()
    setTimeout(() => {
        $(".card-body-footer").css("width", $(".container-fluid").width() + "px");
    }, 1000)
});

$('#saku-form').on('click', '#btn-kembali', function(){
    var kode = null;
    msgDialog({
        id:kode,
        type:'keluar'
    });
}); 
//  END TRIGGER FORM

// CBBL SAKU FORM
$('#form-tambah').on('click', '.search-item2', function(e) {
    var id = $(this).closest('div').find('input').attr('name');  
    var options = {}
    switch(id) {
        case 'kode_akt':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('sekolah-master/tahun-ajaran') }}",
                columns : [
                    { data: 'kode_ta' },
                    { data: 'nama' }
                ],
                judul : "Daftar Tahun Ajaran",
                pilih : "TA",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_kelas':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('sekolah-master/kelas') }}",
                columns : [
                    { data: 'kode_kelas' },
                    { data: 'nama' }
                ],
                judul : "Daftar Kelas",
                pilih : "Kelas",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_pp':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('sekolah-master/pp') }}",
                columns : [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ],
                judul : "Daftar PP",
                pilih : "PP",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_status':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('sekolah-master/status-siswa') }}",
                columns : [
                    { data: 'kode_ss' },
                    { data: 'nama' }
                ],
                judul : "Daftar Status",
                pilih : "Status",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
    }
    showInpFilterBSheet(options);
})

$('.info-icon-hapus').click(function(){
    var par = $(this).closest('div').find('input').attr('name');
    $('#'+par).val('');
    $('#'+par).attr('readonly',false);
    $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
    $('.info-code_'+par).parent('div').addClass('hidden');
    $('.info-name_'+par).addClass('hidden');
    $(this).addClass('hidden');
    $('#'+par).trigger('change');
});
// END CBBL SAKU FORM

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
            var url = "{{ url('sekolah-master/siswa-update') }}";
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        } else {
            var url = "{{ url('sekolah-master/siswa-simpan') }}";
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
                    $('#judul-form').html('Tambah Data Siswa');
                    $('#nis').attr('readonly', false);
                    resetForm();
                    msgDialog({
                        id: kode,
                        type: 'simpan'
                    });
                    last_add(dataTable,"nis", kode);
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
    var kode = $('#nis').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});

$('#saku-datatable').on('click', '#btn-edit', function(){
    var nis= $(this).closest('tr').find('td').eq(0).html();
    var pp= $(this).closest('tr').find('td').eq(3).html();
    $('#nis').attr('readonly', true);
    editData(nis, pp)
});

function editData(nis, pp, view = false) { 
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');
    $('#judul-form').html('Edit Data Siswa');

    $.ajax({
        type: 'GET',
        url: "{{ url('sekolah-master/siswa-edit') }}",
        data: { nis: nis, kode_pp: pp },
        dataType: 'json',
        async:false,
        success:function(res) {
            var data = res.data.data[0]
            console.log(data)
            if(res.data.status) {
                $('#id_edit').val('true')
                $('#id').val(nis)
                if(data.tgl_lahir !== null || data.tgl_lahir !== '') {
                    data.tgl_lahir = reverseDate(data.tgl_lahir,'-','/')
                } else {
                    data.tgl_lahir = "{{ date('d/m/Y') }}"
                }

                isiEdit(data.nis,"text",'#nis',true);
                isiEdit(data.nama,"text",'#nama',view);
                isiEdit(data.tmp_lahir,"text",'#tempat',view);
                isiEdit(data.agama,"text",'#agama',view);
                isiEdit(data.alamat_siswa,"text",'#alamat_siswa',view);
                isiEdit(data.hp_siswa,"text",'#hp_siswa',view);
                isiEdit(data.email,"text",'#email_siswa',view);
                isiEdit(data.nis2,"text",'#nis2',view);
                isiEdit(data.nama_wali,"text",'#nama_wali',view);
                isiEdit(data.alamat_wali,"text",'#alamat_wali',view);
                isiEdit(data.hp_wali,"text",'#hp_wali',view);
                isiEdit(data.email_wali,"text",'#email_wali',view);
                isiEdit(data.kerja_wali,"text",'#kerja_wali',view);
                isiEdit(data.id_bank,"text",'#id_bank',view);

                isiEdit(data.tgl_lahir,"date",'#tgl_lahir',view);

                if(data.jk == "" || data.jk == null || data.jk == 0){
                    isiEdit("L","select",'#jk',view);   
                }else{
                    isiEdit(data.jk,"select",'#jk',view);
                }

                if(data.gol_darah == "" || data.gol_darah == null || data.gol_darah == 0){
                    isiEdit("A","select",'#gol_darah',view);   
                }else{
                    isiEdit(data.gol_darah,"select",'#gol_darah',view);
                }

                showInfoField('kode_status', data.flag_aktif, data.nama_status)
                showInfoField('kode_akt', data.kode_akt, data.nama_akt)
                showInfoField('kode_kelas', data.kode_kelas, data.nama_kelas)
                showInfoField('kode_pp', data.kode_pp, data.nama_pp)
                showInfoField('kode_pp', data.kode_pp, data.nama_pp)

                $('#saku-datatable').hide();
                $('#modal-preview').modal('hide');
                $('#saku-form').show();
                setHeightForm()
                setTimeout(() => {
                    $(".card-body-footer").css("width", $(".container-fluid").width() + "px");
                }, 1000)
            } 
        }
    })
}
// END EDIT DATA

</script>