<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('css_optional/trans.css') }}" />

{{-- LIST DATA --}}
<x-list-data judul="Data Karyawan-Kontrak kerja" tambah="" :thead="array('NIK','Nama','Alamat','Aksi')"
    :thwidth="array(10,30,50,10)" :thclass="array('','','','text-center')" />
{{-- END LIST DATA --}}

{{-- FORM --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
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
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-pegawai"
                                role="tab" aria-selected="true"><span class="hidden-xs-down">Data Kepegawaian</span></a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-client" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Data Client</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0 mt-3">

                        <div class="tab-pane active" id="data-pegawai" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_sdm">Perjanjian Kerja</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden"
                                                    style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_sdm"
                                                        readonly="readonly" title="" data-toggle="tooltip"
                                                        data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_sdm" id="kode_sdm"
                                                    name="kode_sdm" autocomplete="off" data-input="cbbl" value=""
                                                    title="" readonly>
                                                <span class="info-name_kode_sdm hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_sdm"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_area">Area</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden"
                                                    style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_area"
                                                        readonly="readonly" title="" data-toggle="tooltip"
                                                        data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_area"
                                                    id="kode_area" name="kode_area" autocomplete="off" data-input="cbbl"
                                                    value="" title="" readonly>
                                                <span class="info-name_kode_area hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_area"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_fm">FM</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden"
                                                    style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_fm" readonly="readonly"
                                                        title="" data-toggle="tooltip" data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_fm" id="kode_fm"
                                                    name="kode_fm" autocomplete="off" data-input="cbbl" value=""
                                                    title="" readonly>
                                                <span class="info-name_kode_fm hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_fm"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_bm">BM</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden"
                                                    style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_bm" readonly="readonly"
                                                        title="" data-toggle="tooltip" data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_bm" id="kode_bm"
                                                    name="kode_bm" autocomplete="off" data-input="cbbl" value=""
                                                    title="" readonly>
                                                <span class="info-name_kode_bm hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_kode_bm"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_loker">Lokasi Kerja</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden"
                                                    style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_loker"
                                                        readonly="readonly" title="" data-toggle="tooltip"
                                                        data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_loker"
                                                    id="kode_loker" name="kode_loker" autocomplete="off"
                                                    data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_loker hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2"
                                                    id="search_kode_loker"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="npwp">Nomor NPWP</label>
                                            <input class="form-control" type="text" placeholder="Nomor NPWP" id="npwp"
                                                name="npwp" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_bpjs">Nomor BPJS Kesehatan</label>
                                            <input class="form-control" type="text" placeholder="Nomor BPJS Kesehatan"
                                                id="no_bpjs" name="no_bpjs" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_bpjs_kerja">Nomor BPJS Ketenagakerjaan</label>
                                            <input class="form-control" type="text"
                                                placeholder="Nomor BPJS Ketenagakerjaan" id="no_bpjs_kerja"
                                                name="no_bpjs_kerja" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_masuk">Tanggal Masuk</label>
                                            <span class="span-tanggal" id="tanggal-masuk"></span>
                                            <input class='form-control datepicker' id="tgl_masuk" name="tgl_masuk"
                                                autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                                class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_profesi">Profesi</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden"
                                                    style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_profesi"
                                                        readonly="readonly" title="" data-toggle="tooltip"
                                                        data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_profesi"
                                                    id="kode_profesi" name="kode_profesi" autocomplete="off"
                                                    data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_profesi hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2"
                                                    id="search_kode_profesi"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="kode_status">Status SDM</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden"
                                                    style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_kode_status"
                                                        readonly="readonly" title="" data-toggle="tooltip"
                                                        data-placement="top"></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-kode_status"
                                                    id="kode_status" name="kode_status" autocomplete="off"
                                                    data-input="cbbl" value="" title="" readonly>
                                                <span class="info-name_kode_status hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2"
                                                    id="search_kode_status"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-client" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="client">Nama Client</label>
                                            <input class="form-control" type="text" placeholder="Nama Client"
                                                id="client" name="client" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="skill">Skill</label>
                                            <input class="form-control" type="text" placeholder="Skill" id="skill"
                                                name="skill" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="no_kontrak">Nomor Kontrak</label>
                                            <input class="form-control" type="text" placeholder="Nomor Kontrak"
                                                id="no_kontrak" name="no_kontrak" autocomplete="off">
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_kontrak">Tanggal Kontrak</label>
                                            <span class="span-tanggal" id="tanggal-kontrak"></span>
                                            <input class='form-control datepicker' id="tgl_kontrak" name="tgl_kontrak"
                                                autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                                class="simple-icon-calendar date-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="tgl_kontrak_akhir">Tanggal Kontrak Akhir</label>
                                            <span class="span-tanggal" id="tanggal-kontrak_akhir"></span>
                                            <input class='form-control datepicker' id="tgl_kontrak_akhir"
                                                name="tgl_kontrak_akhir" autocomplete="off" value="{{ date('d/m/Y') }}">
                                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                                class="simple-icon-calendar date-search"></i>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <label for="atasan_langsung">Atasan Langsung</label>
                                            <input class="form-control" type="text" placeholder="Atasan Langsung"
                                                id="atasan_langsung" name="atasan_langsung" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">

                                        <div class="col-md-6 col-sm-12">
                                            <label for="atasan_t_langsung">Atasan Tidak Langsung</label>
                                            <input class="form-control" type="text" placeholder="Atasan Tidak Langsung"
                                                id="atasan_t_langsung" name="atasan_t_langsung" autocomplete="off">
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
                        <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i
                                class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- END FORM --}}

<button id="trigger-bottom-sheet" style="display:none">&nbsp;</button>

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

var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;
// END SET UP FORM

// OPTIONAL CONFIG
$('.selectize').selectize();

$('.currency').inputmask("numeric", {
    radixPoint: ",",
    groupSeparator: ".",
    digits: 2,
    autoGroup: true,
    rightAlign: true,
    oncleared: function () { return false; }
});

$('#tgl_lahir').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-lahir',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_nikah').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-nikah',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_masuk').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-masuk',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_kontrak').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-kontrak',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})

$('#tgl_kontrak_akhir').bootstrapDP({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container: '#tanggal-kontrak_akhir',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
})
function resetForm() {
        $('#jurnal-grid tbody').empty()
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=info-name]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function(e){
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function(e){
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function(e){
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function(e){
            $(this).addClass('hidden');
        });
    }
// END OPTIONAL CONFIG

// BTN TAMBAH
$('#saku-datatable').on('click', '#btn-tambah', function() {
    $('#preview').hide();
    $('#nik').attr('readonly', false);
    $('#judul-form').html('Tambah Data Karyawan');
    resetForm();
    newForm();
    setRowDefault()
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
// END BTN KEMBALI

// SAKU TABLE
var actionHtmlDefault = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
var dataTable =generateTable(
    "table-data",
    "{{ url('esaku-trans/v3/sdm-karyawans') }}",
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
        {'targets': 3 ,'className': 'text-center', 'defaultContent': actionHtmlDefault,'className': 'text-center' }
    ],
    [
        { data: 'nik' },
        { data: 'nama' },
        { data: 'alamat' }
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

// CBBL SAKU FORM
$('#form-tambah').on('click', '.search-item2', function(e) {
    var id = $(this).closest('div').find('input').attr('name');
    var options = {}
    switch(id) {
        case 'kode_sdm':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-statuss') }}",
                columns : [
                    { data: 'kode_sdm' },
                    { data: 'nama' }
                ],
                judul : "Daftar Perjanjian Kerja",
                pilih : "SDM",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_profesi':
            options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-profesis') }}",
                columns : [
                    { data: 'kode_profesi' },
                    { data: 'nama' }
                ],
                judul : "Daftar Profesi",
                pilih : "Profesi",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
        break;
        case 'kode_fm':
            var kode_area = $('#form-tambah #kode_area').val();
            console.log(kode_area)
            if(kode_area == ''){
                alert('Kode Area harus dipilih');
            }else{
                var options = {
                     id: id,
                    header: ['Kode Akun', 'Nama'],
                    url: "{{ url('esaku-master/get-fm-area') }}?kode_area="+kode_area,
                    columns: [{
                         data: 'kode_fm'
                    },
                    {
                        data: 'nama'
                    }],
                    judul: "Pilih Kode FM",
                    pilih: "akun",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                }
            }
        break;
        case 'kode_bm':
                var kode_fm = $('#form-tambah #kode_fm').val();
                console.log(kode_fm)
                if(kode_fm == ''){
                    alert('Kode FM harus dipilih');
                }else{
                    var options = {
                        id: id,
                        header: ['Kode Akun', 'Nama'],
                        url: "{{ url('esaku-master/get-bm-fm') }}?kode_fm="+kode_fm,
                        columns: [{
                                data: 'kode_bm'
                            },
                            {
                                data: 'nama'
                            }
                        ],
                        judul: "Pilih Kode BM",
                        pilih: "akun",
                        jTarget1: "text",
                        jTarget2: "text",
                        target1: ".info-code_" + id,
                        target2: ".info-name_" + id,
                        target3: "",
                        target4: "",
                        width: ["30%", "70%"],
                    }
                }
        break;
        case 'kode_loker':
            var kode_bm = $('#form-tambah #kode_bm').val();
            if(kode_bm == ''){
                    alert('Kode BM harus dipilih');
            }else{
                options = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('esaku-master/sdm-loker-bm') }}?kode_bm="+kode_bm,
                columns : [
                    { data: 'kode_loker' },
                    { data: 'nama' }
                ],
                judul : "Daftar Lokasi Kerja",
                pilih : "Loker",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
            }
            }
            console.log(kode_fm)

        break;
        case 'kode_area':
            var options = {
                id: id,
                header: ['Kode Akun', 'Nama'],
                url: "{{ url('esaku-master/sdm-areas') }}",
                columns: [{
                        data: 'kode_area'
                    },
                    {
                         data: 'nama'
                    }
                ],
                judul: "Pilih Kode Area",
                pilih: "akun",
                jTarget1: "text",
                jTarget2: "text",
                target1: ".info-code_" + id,
                target2: ".info-name_" + id,
                target3: "",
                target4: "",
                width: ["30%", "70%"],
            }
        break;
        case 'kode_status':
            var options = {
                id: id,
                header: ['Kode', 'Nama'],
                url: "{{ url('esaku-trans/v3/sdm-status') }}",
                columns: [{
                        data: 'kode'
                    },
                    {
                         data: 'nama'
                    }
                ],
                judul: "Pilih Status SDM",
                pilih: "akun",
                jTarget1: "text",
                jTarget2: "text",
                target1: ".info-code_" + id,
                target2: ".info-name_" + id,
                target3: "",
                target4: "",
                width: ["30%", "70%"],
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

// GRID FORM
$(document).on('click', function() {
    hideAllSelectedRow()
})

function hideAllSelectedRow() {
    $('table[id^=input]').each(function(index, table) {
        $(table).children('tbody').each(function(index, tbody) {
            $(tbody).children('tr').each(function(index, tr) {
                $(tr).children('td').not(':first, :last').each(function(index, td) {
                    var value = $(td).children('.input-value').val()
                    $(td).children('.input-value').val(value)
                    $(td).children('span').not('.not-show, .readonly').text(value)
                    $(td).children('.input-value').hide()
                    $(td).children('a').not('.hapus-item, .download-item').hide()
                    $(td).children('span').not('.not-show').show()
                })
            })
        })
        $(table).find('tr').removeClass('selected-row')
        $(table).find('td').removeClass('selected-cell')
        $(table).find('.input-value').hide()
        $(table).find('a').not('.hapus-item, .download-item').hide()
        $(table).find('span').not('.not-show').show()
    })
}

function hideUnselectedRow(tbody) {
    tbody.find('tr').not('.selected-row').each(function(index, tr) {
        $(tr).find('td').not(':first, :last').each(function(index, td) {
            var value = $(td).children('.input-value').val()
            $(td).children('.input-value').val(value)
            $(td).children('span').not('.not-show, .readonly').text(value)
            $(td).children('.input-value').hide()
            $(td).children('a').not('.hapus-item, .download-item').hide()
            $(td).children('span').not('.not-show').show()
        })
    })
}

function hideUnselectedCell(tr) {
    tr.find('td').not(':first, :last, .readonly').each(function(index, td) {
        var value = $(td).children('.input-value').val()
        $(td).children('.input-value').val(value)
        $(td).children('span').not('.not-show, .readonly').text(value)
        if($(td).hasClass('selected-cell')) {
            $(td).children('span').hide()
            $(td).children('.input-value').show()
            $(td).children('a').not('.hapus-item, .download-item').show()
                setTimeout(function() {
                $(td).children('.input-value').focus()
            }, 500)
        } else {
            $(td).children('.input-value').hide()
            $(td).children('a').not('.hapus-item, .download-item').hide()
            $(td).children('span').not('.not-show').show()
        }
    })
}

function nextSelectedCell(tr, td, index) {
    var value = $(td).children('.input-value').val()
    $(td).children('.input-value').val(value)
    $(td).children('span').not('.not-show, .readonly').text(value)
    $(td).children('span').not('.not-show').show()
    $(td).children('.input-value').hide()
    $(td).children('a').not('.hapus-item, .download-item').hide()

    var nextindex = index + 1;
    var tdnext = $(tr).find('td').eq(nextindex)
    var cekReadonly = $(tdnext).hasClass('readonly')
    if(cekReadonly) {
        nextindex = nextindex + 1
        tdnext = $(tr).find('td').eq(nextindex)
    }
    var cekCbbl = $(tdnext).has('a').length
    if(cekCbbl > 0) {
        $(tdnext).children('a').show()
    }

    $(tdnext).children('span').hide()
    $(tdnext).children('.input-value').show()
    setTimeout(function() {
        $(tdnext).children('.input-value').focus()
    }, 500)
}

function setRowDefault() {
    var jenis = ['CV', 'KTP', 'FOTO', 'NPWP', 'BPJS KESEHATAN', 'BPJS KETENAGAKERJAAN', 'BUKU REKENING', 'KARTU KELUARGA', 'KONTRAK']
    $('#input-dokumen tbody').empty()
    var no= $('#input-dokumen tbody > tr').length;
    no = no + 1;
    var html = null;
    for(var i=0;i<jenis.length;i++) {
        var idJenis = 'jenis-ke__'+no
        var idDokumen = 'dokumen-ke__'+no
        var idStatus = 'status-ke__'+no

        html += `<tr class="row-grid">
            <td class="text-center">
                <span class="no-grid ">${no}</span>
                <input type="hidden" name="nu[]" value="${no}">
            </td>
            <td id="${idJenis}">
                <span id="text-${idJenis}" class="tooltip-span">${jenis[i]}</span>
                <input autocomplete="off" type="hidden" id="value-${idJenis}" name="jenis[]" class="form-control input-value hidden" value="${jenis[i]}" >
            </td>
            <td id="${idDokumen}" style="word-wrap: break-word">
                <input id='value-${idDokumen}' type='file' name='file[]'>
                <input type="hidden" name="fileName[]" id="fileName-${idDokumen}" value="-">
                <input type="hidden" name="filePrevName[]" value="-">
                <input type="hidden" name="isUpload[]" id="checkUpload-${idDokumen}" value="false">
            </td>
            <td id="${idStatus}">
                <span id="text-${idStatus}" class="tooltip-span">Belum Diupload</span>
                <input autocomplete="off" type="hidden" id="value-${idStatus}" name="sts_dokumen[]" class="form-control input-value hidden" value="0" >
            </td>
        </tr>
        `;

        no++;
    }
    $('#input-dokumen tbody').append(html)

    $('.tooltip-span').tooltip({
        title: function(){
            return $(this).text();
        }
    });
}

$('#input-dokumen tbody').on('click', 'td', function(event) {
    event.stopPropagation();
    var tr = $(this).parent()
    var tbody = $(tr).parent()
    $(tr).addClass('selected-row')
    $(this).addClass('selected-cell');
    tr.children().not(this).removeClass('selected-cell');
    tbody.children().not($(tr)).removeClass('selected-row')
    hideUnselectedCell(tr);
    hideUnselectedRow(tbody)
});

$('#input-dokumen tbody').on('change', 'input[type="file"]', function() {
    var uid = $('#nik').val();
    var td = $(this).parent()
    var id = $(td).attr('id')
    var file = uid + '_' + $(this).val().replace(/C:\\fakepath\\/i, '')
    $(td).children('#fileName-'+id).val(file)
    $(td).children('#checkUpload-'+id).val("true")
    $(td).children('#value-'+id).val("1")
})
// END GRID FORM

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
            var url = "{{ url('esaku-trans/v3/sdm-karyawan-update') }}";
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        } else {
            var url = "{{ url('esaku-trans/v3/sdm-karyawan') }}";
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
                    $('#judul-form').html('Tambah Data Karyawan');
                    $('#nik').attr('readonly', false);
                    resetForm();
                    msgDialog({
                        id: kode,
                        type: 'simpan'
                    });
                    last_add(dataTable,"nik", kode);
                    $('#id_edit').val('false')
                } else if(!result.data.status && result.data.message === "Unauthorized"){
                    window.location.href = "{{ url('sdm2-auth/sesi-habis') }}";
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
    var kode = $('#nik').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});

$('#saku-datatable').on('click', '#btn-edit', function(){
    var id= $(this).closest('tr').find('td').eq(0).html();
    $('#nik').attr('readonly', true);
    editData(id)
});

function editData(id, view = false) {
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');
    $('#judul-form').html('Edit Data Karyawan-Kontrak Kerja');

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/v3/sdm-kontrak') }}",
        data: { kode: id },
        dataType: 'json',
        async:false,
        success:function(res) {
            var result = res.data
            var kepeg = result.data_kepeg[0]
            var client = result.data_client[0]
            console.log(result)
            if(result.status) {
                $('#id_edit').val('true')
                isiEdit(id, "text",'#nik', true);
                if(result.data_kepeg.length > 0){
                    isiEdit(client.nama_client,"text",'#client',view);
                    isiEdit(client.skill,"text",'#skill',view);
                    isiEdit(client.no_kontrak,"text",'#no_kontrak',view);
                    isiEdit(client.atasan_langsung,"text",'#atasan_langsung',view);
                    isiEdit(client.atasan_tidak_langsung,"text",'#atasan_t_langsung',view);
                    isiEdit(client.tgl_kontrak_awal,"date",'#tgl_kontrak',view);
                    isiEdit(client.tgl_kontrak_akhir,"date",'#tgl_kontrak_akhir',view);
                    showInfoField('kode_gol', kepeg.kode_golongan, kepeg.nama_golongan)
                    showInfoField('kode_sdm', kepeg.kode_sdm, kepeg.nama_sdm)
                    showInfoField('kode_area', kepeg.kode_area, kepeg.nama_area)
                    showInfoField('kode_fm', kepeg.kode_fm, kepeg.nama_fm)
                    showInfoField('kode_bm', kepeg.kode_bm, kepeg.nama_bm)
                    showInfoField('kode_loker', kepeg.kode_loker, kepeg.nama_loker)
                    showInfoField('kode_profesi',kepeg.kode_profesi, kepeg.nama_profesi)
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

 // Jurnal  Grid
 function hitungTotalRowJurnal() {
        var total_row = $('#jurnal-grid tbody tr').length;
        $('#total-row-jurnal').html(total_row + ' Baris');
    }

    function hideUnselectedRowJurnal() {
        $('#jurnal-grid > tbody > tr').each(function (index, row) {
            if (!$(row).hasClass('selected-row')) {
                var kode_akun = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").val();
                var nama_akun = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").val();
                var nilai = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").val();

                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").val(kode_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-kode").text(kode_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").val(nama_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama").text(nama_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").val(nilai);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nilai").text(nilai);

                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-kode").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".search-akun").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nilai").show();
            }
        })
    }

    function addRowJurnal() {
        var kode_akun = "";
        var nama_akun = "";
        var nilai = "";
        var no = $('#jurnal-grid .row-jurnal:last').index();
        no = no + 2;
        var input = "";
        input += "<tr class='row-jurnal'>";
        input += "<td class='no-jurnal text-center'>" + no + "</td>";
        input += "<td><span class='td-kode tdakunke" + no + " tooltip-span'>" + kode_akun +
            "</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke" + no +
            " hidden' value='" + kode_akun + "' required='' style='z-index: 1;position: relative;' id='akunkode" + no +
            "'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke" + no + " tooltip-span'>" + nama_akun +
            "</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke" + no +
            " hidden'  value='" + nama_akun + "' readonly></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilke" + no + " tooltip-span'>" + nilai +
            "</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke" + no + " hidden'  value='" +
            nilai + "' required></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#jurnal-grid tbody').append(input);
        $('.nilke' + no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {
                self.Value('');
            }
        });
        hitungTotalRowJurnal();
        hideUnselectedRowJurnal();
        $('.tooltip-span').tooltip({
            title: function () {
                return $(this).text();
            }
        });

    }

    $('#form-tambah').on('click', '.add-row-jurnal', function () {
        addRowJurnal();
    });

    $('#jurnal-grid').on('click', '.hapus-item', function () {
        $(this).closest('tr').remove();
        no = 1;
        $('.row-jurnal').each(function () {
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotalRowJurnal();
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
    });



    $('#jurnal-grid tbody').on('click', 'tr', function () {
        $(this).addClass('selected-row');
        $('#jurnal-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowJurnal();
    });

    $('#jurnal-grid').on('click', 'td', function () {
        var idx = $(this).index();
        if (idx == 0) {
            return false;
        } else {
            if ($(this).hasClass('px-0 py-0 aktif')) {
                return false;
            } else {
                $('#jurnal-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var no = $(this).parents("tr").find(".no-jurnal").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if (idx == 1) {
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                } else {
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-akun").hide();

                }

                $(this).parents("tr").find(".inp-nama").val(nama_akun);
                $(this).parents("tr").find(".td-nama").text(nama_akun);
                if (idx == 2) {
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                } else {

                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }

                if (nilai == "" && idx == 3) {
                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                } else {
                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                }

                if (idx == 3) {
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                } else {
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
            }
        }
    });
    $('#jurnal-grid').on('click', '.search-item', function () {
        var par = $(this).closest('td').find('input').attr('name');

        switch (par) {
            case 'kode_akun[]':
                var par2 = "nama_akun[]";

            break;
        }

        var tmp = $(this).closest('tr').find('input[name="' + par + '"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="' + par2 + '"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        switch (par) {
            case 'kode_akun[]':
                var options = {
                    id: par,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('esaku-master/sdm-gaji-params') }}",
                    columns: [{
                            data: 'kode_param'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar Parameter Gaji",
                    pilih: "akun",
                    jTarget1: "val",
                    jTarget2: "val",
                    target1: "." + target1,
                    target2: "." + target2,
                    target3: ".td" + target2,
                    target4: ".td-dc",
                    width: ["30%", "70%"]
                };
                break;

        }
        showInpFilterBSheet(options);
        // showInpFilter(options);

    });
    // END Jurnal Grid
</script>
