<link rel="stylesheet" href="{{ asset('report.css') }}" />
<style>
    .box-cv {
        border: 0.8px solid #D1D5DB;
        padding: 4px;
    }

    .box-cv .text-note {
        font-size: 18px;
        font-weight: 700;
        padding-left: 8px;
    }

    .box-cv .box-empty-image {
        border: 1px solid #D1D5DB;
        height: 180px;
        width: 160px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .box-cv .box-empty-image .text-image {
        text-align: center;
        font-size: 14px;
    }
</style>

<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card">
            <x-report-header judul="Laporan Data Karyawan" padding="px-4 py-4" />
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="kode_sdm" nama="Status SDM" selected="1"
                                        :option="array('1','2','3','i')" />
                                    <x-inp-filter kode="kode_gol" nama="Golongan" selected="1"
                                        :option="array('1','2','3','i')" />
                                    <x-inp-filter kode="kode_jab" nama="Jabatan" selected="1"
                                        :option="array('1','2','3','i')" />
                                    <x-inp-filter kode="kode_loker" nama="Lokasi Kerja" selected="1"
                                        :option="array('1','2','3','i')" />
                                    <x-inp-filter kode="nik" nama="NIK Karyawan" selected="1"
                                        :option="array('1','2','3','i')" />
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px"
                                    class="btn btn-primary ml-2 mb-3" type="submit">Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3"
                                    style="float:right;width:110px" type="button">Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-report-paging :option="array()" default="10" />
            </div>
        </div>
    </div>
</div>

<x-report-result judul="Laporan Data Karyawan" padding="px-0 py-4" />
@include('modal_search')
@include('modal_email')

@php
date_default_timezone_set("Asia/Bangkok");
@endphp
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
    }
});

var $kode_sdm = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}

var $kode_gol = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}

var $kode_jab = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}

var $kode_loker = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}

var $nik = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}

$('#btn-filter').click(function(e){
    $('#collapseFilter').show();
    $('#collapsePaging').hide();
    if($(this).hasClass("btn-primary")){
        $(this).removeClass("btn-primary");
        $(this).addClass("btn-light");
    }

    $('#btn-filter').addClass("hidden");
    $('#btn-export').addClass("hidden");
});

$('#btn-tutup').click(function(e){
    $('#collapseFilter').hide();
    $('#collapsePaging').show();
    $('#btn-filter').addClass("btn-primary");
    $('#btn-filter').removeClass("btn-light");
    $('#btn-filter').removeClass("hidden");
    $('#btn-export').removeClass("hidden");
});

$('#btn-tampil').click(function(e){
    $('#collapseFilter').hide();
    $('#collapsePaging').show();
    $('#btn-filter').addClass("btn-primary");
    $('#btn-filter').removeClass("btn-light");
    $('#btn-filter').removeClass("hidden");
    $('#btn-export').removeClass("hidden");
});

$('.selectize').selectize();

$('#inputFilter').reportFilter({
    kode : ['kode_sdm', 'kode_gol', 'kode_jab', 'kode_loker', 'nik'],
    nama : ['Status SDM', 'Golongan', 'Jabatan', 'Lokasi Kerja', 'NIK Karyawan'],
    header : [
        ['Kode', 'Nama'],
        ['Kode', 'Nama'],
        ['Kode', 'Nama'],
        ['Kode', 'Nama'],
        ['NIK', 'Nama']
    ],
    headerpilih : [
        ['Kode', 'Nama', 'Action'],
        ['Kode', 'Nama', 'Action'],
        ['Kode', 'Nama', 'Action'],
        ['Kode', 'Nama', 'Action'],
        ['NIK', 'Nama', 'Action']
    ],
    columns: [
        [
            { data: 'kode_sdm' },
            { data: 'nama' }
        ],
        [
            { data: 'kode_gol' },
            { data: 'nama' }
        ],
        [
            { data: 'kode_jab' },
            { data: 'nama' }
        ],
        [
            { data: 'kode_loker' },
            { data: 'nama' }
        ],
        [
            { data: 'nik' },
            { data: 'nama' }
        ],
    ],
    url :[
        "{{ url('esaku-master/sdm-statuss') }}",
        "{{ url('esaku-master/sdm-golongans') }}",
        "{{ url('esaku-master/sdm-jabatans') }}",
        "{{ url('esaku-master/sdm-lokers') }}",
        "{{ url('esaku-trans/sdm-karyawans') }}"
    ],
    parameter:[],
    orderby:[[],[],[],[],[]],
    width:[['30%','70%'], ['30%','70%'], ['30%','70%'], ['30%','70%'], ['30%','70%']],
    display:['kode', 'kode', 'kode', 'kode', 'kode'],
    pageLength:[10, 10, 10, 10, 10]
});

$('#inputFilter').on('change','input',function(e){
    setTimeout(() => {
        $('#inputFilter').reportFilter({
            kode : ['kode_sdm', 'kode_gol', 'kode_jab', 'kode_loker', 'nik'],
            nama : ['Status SDM', 'Golongan', 'Jabatan', 'Lokasi Kerja', 'NIK Karyawan'],
            header : [
                ['Kode', 'Nama'],
                ['Kode', 'Nama'],
                ['Kode', 'Nama'],
                ['Kode', 'Nama'],
                ['NIK', 'Nama']
            ],
            headerpilih : [
                ['Kode', 'Nama', 'Action'],
                ['Kode', 'Nama', 'Action'],
                ['Kode', 'Nama', 'Action'],
                ['Kode', 'Nama', 'Action'],
                ['NIK', 'Nama', 'Action']
            ],
            columns: [
                [
                    { data: 'kode_sdm' },
                    { data: 'nama' }
                ],
                [
                    { data: 'kode_gol' },
                    { data: 'nama' }
                ],
                [
                    { data: 'kode_jab' },
                    { data: 'nama' }
                ],
                [
                    { data: 'kode_loker' },
                    { data: 'nama' }
                ],
                [
                    { data: 'nik' },
                    { data: 'nama' }
                ],
            ],
            url :[
                "{{ url('esaku-master/sdm-statuss') }}",
                "{{ url('esaku-master/sdm-golongans') }}",
                "{{ url('esaku-master/sdm-jabatans') }}",
                "{{ url('esaku-master/sdm-lokers') }}",
                "{{ url('esaku-trans/sdm-karyawans') }}"
            ],
            parameter:[],
            orderby:[[],[],[],[],[]],
            width:[['30%','70%'], ['30%','70%'], ['30%','70%'], ['30%','70%'], ['30%','70%']],
            display:['kode', 'kode', 'kode', 'kode', 'kode'],
            pageLength:[10, 10, 10, 10, 10]
        });
    }, 500)
});

var $formData = "";
$('#form-filter').submit(function(e){
    e.preventDefault();
    $formData = new FormData();
    $formData.append("kode_sdm[]",$kode_sdm.type);
    $formData.append("kode_sdm[]",$kode_sdm.from);
    $formData.append("kode_sdm[]",$kode_sdm.to);
    $formData.append("kode_gol[]",$kode_gol.type);
    $formData.append("kode_gol[]",$kode_gol.from);
    $formData.append("kode_gol[]",$kode_gol.to);
    $formData.append("kode_jab[]",$kode_jab.type);
    $formData.append("kode_jab[]",$kode_jab.from);
    $formData.append("kode_jab[]",$kode_jab.to);
    $formData.append("kode_loker[]",$kode_loker.type);
    $formData.append("kode_loker[]",$kode_loker.from);
    $formData.append("kode_loker[]",$kode_loker.to);
    $formData.append("nik[]",$nik.type);
    $formData.append("nik[]",$nik.from);
    $formData.append("nik[]",$nik.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]);
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('sdm2-auth/form/rptKaryawan') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#show').change(function(e){
    $formData = new FormData();
    $formData.append("kode_sdm[]",$kode_sdm.type);
    $formData.append("kode_sdm[]",$kode_sdm.from);
    $formData.append("kode_sdm[]",$kode_sdm.to);
    $formData.append("kode_gol[]",$kode_gol.type);
    $formData.append("kode_gol[]",$kode_gol.from);
    $formData.append("kode_gol[]",$kode_gol.to);
    $formData.append("kode_jab[]",$kode_jab.type);
    $formData.append("kode_jab[]",$kode_jab.from);
    $formData.append("kode_jab[]",$kode_jab.to);
    $formData.append("kode_loker[]",$kode_loker.type);
    $formData.append("kode_loker[]",$kode_loker.from);
    $formData.append("kode_loker[]",$kode_loker.to);
    $formData.append("nik[]",$nik.type);
    $formData.append("nik[]",$nik.from);
    $formData.append("nik[]",$nik.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]);
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('esaku-auth/form/sdm_rptKaryawan') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#saku-report #canvasPreview').on('click', '.karyawan', function(e){
    e.preventDefault();
    var nik = $(this).data('karyawan');
    var back = true;

    $formData = new FormData();
    $formData.append("kode_sdm[]",$kode_sdm.type);
    $formData.append("kode_sdm[]",$kode_sdm.from);
    $formData.append("kode_sdm[]",$kode_sdm.to);
    $formData.append("kode_gol[]",$kode_gol.type);
    $formData.append("kode_gol[]",$kode_gol.from);
    $formData.append("kode_gol[]",$kode_gol.to);
    $formData.append("kode_jab[]",$kode_jab.type);
    $formData.append("kode_jab[]",$kode_jab.from);
    $formData.append("kode_jab[]",$kode_jab.to);
    $formData.append("kode_loker[]",$kode_loker.type);
    $formData.append("kode_loker[]",$kode_loker.from);
    $formData.append("kode_loker[]",$kode_loker.to);
    $formData.append("nik[]","=");
    $formData.append("nik[]",nik);
    $formData.append("nik[]",$nik.to);

    $formData.delete('back');
    $formData.append('back', back);
    $('.breadcrumb').html('');
    $('.breadcrumb').append(`
        <li class="breadcrumb-item">
            <a href="#" class="klik-report" data-href="laporan-karyawan" aria-param="">Laporan Data Karyawan</a>
        </li>
        <li class="breadcrumb-item active" aria-current="cv-karyawan" aria-param="`+nik+`">Curiculum Vitae Karyawan</li>
    `);
    xurl ="{{ url('esaku-auth/form/sdm_rptCvKaryawan') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('.navigation-lap').on('click', '#btn-back', function(e){
    e.preventDefault();
    $formData = new FormData();
    $formData.append("kode_sdm[]",$kode_sdm.type);
    $formData.append("kode_sdm[]",$kode_sdm.from);
    $formData.append("kode_sdm[]",$kode_sdm.to);
    $formData.append("kode_gol[]",$kode_gol.type);
    $formData.append("kode_gol[]",$kode_gol.from);
    $formData.append("kode_gol[]",$kode_gol.to);
    $formData.append("kode_jab[]",$kode_jab.type);
    $formData.append("kode_jab[]",$kode_jab.from);
    $formData.append("kode_jab[]",$kode_jab.to);
    $formData.append("kode_loker[]",$kode_loker.type);
    $formData.append("kode_loker[]",$kode_loker.from);
    $formData.append("kode_loker[]",$kode_loker.to);
    $formData.append("nik[]",$nik.type);
    $formData.append("nik[]",$nik.from);
    $formData.append("nik[]",$nik.to);

    var aktif = $('.breadcrumb-item.active').attr('aria-current');
    var tmp = $('.breadcrumb-item.active').attr('aria-param').split("|");
    var param = tmp[0];
    if(aktif == "cv-karyawan"){
        $formData.delete('back');
        xurl = "{{ url('esaku-auth/form/sdm_rptKaryawan') }}";
        $('.breadcrumb').html('');
        $('.breadcrumb').append(`
            <li class="breadcrumb-item active" aria-current="laporan-karyawan" aria-param="">LLaporan Data Karyawan</li>
        `);
        $('.navigation-lap').addClass('hidden');
    }
    $('#saku-report #canvasPreview').load(xurl);
});
</script>
