<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Kartu IF" padding="px-4 py-4"/>  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="tahun" nama="Tahun" selected="3" :option="array('3')"/>
                                    <x-inp-filter kode="kode_pp" nama="Kode PP" selected="3" :option="array('3')"/>
                                    <x-inp-filter kode="nik" nama="NIK" selected="1" :option="array('1','3')"/>
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-report-paging :option="array(1)" default="1" />
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Laporan Kartu IF" padding="px-0 py-4"/>
@include('modal_search')
@include('modal_email')
    
 @php
    date_default_timezone_set("Asia/Bangkok");
@endphp
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
    }
});

var $nik = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}
var $kode_pp = {
    type : "=",
    from : "3130000",
    fromname : "3130000",
    to : "",
    toname : "",
}
var $tahun = {
    type : "=",
    from : "{{ date('Y') }}",
    fromname : "{{ date('Y') }}",
    to : "",
    toname : "",
}

var $aktif = "";

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#tahun-from').val("{{ date('Y') }}");
$('#kode_pp-from').val("3130000");

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
    kode : ['tahun','kode_pp','nik'],
    nama : ['Periode','No Bukti', 'NIK'],
    header : [
        ['Tahun'],
        ['Kode','Nama'],
        ['NIK','Nama']
    ],
    headerpilih : [
        ['Tahun','Action'],
        ['Kode','Nama','Action'],
        ['NIK','Nama','Action']
    ],
    columns: [
        [
            { data: 'tahun' },
        ],
        [
            { data: 'kode_pp' },
            { data: 'nama' }
        ],
        [
            { data: 'nik' },
            { data: 'nama' }
        ]
    ],
    url :[
        "{{ url('bdh-report/filter-tahunif') }}",
        "{{ url('bdh-report/filter-ppif') }}",
        "{{ url('bdh-report/filter-nik') }}"
    ],
    parameter:[
        {},
        {},
        {}
    ],
    orderby:[
        [[0,"desc"]],
        [[0,"desc"]],
        [[0,"desc"]]
    ],
    width:[
        ['30%','70%'],
        ['30%','70%'],
        ['30%','70%']
    ],
    display:[
        'kode',
        'kode',
        'kode'
    ],
    pageLength:[
        10,
        10,
        10
    ]
})

$('#inputFilter').on('change','input',function(e){
    setTimeout(() => {
    $('#inputFilter').reportFilter({
        kode : ['tahun','kode_pp','nik'],
        nama : ['Periode','No Bukti', 'NIK'],
        header : [
            ['Tahun'],
            ['Kode','Nama'],
            ['NIK','Nama']
        ],
        headerpilih : [
            ['Tahun','Action'],
            ['Kode','Nama','Action'],
            ['NIK','Nama','Action']
        ],
        columns: [
            [
                { data: 'tahun' },
            ],
            [
                { data: 'kode_pp' },
                { data: 'nama' }
            ],
            [
                { data: 'nik' },
                { data: 'nama' }
            ]
        ],
        url :[
            "{{ url('bdh-report/filter-tahunif') }}",
            "{{ url('bdh-report/filter-ppif') }}",
            "{{ url('bdh-report/filter-nik') }}"
        ],
        parameter:[
            {},
            {},
            {}
        ],
        orderby:[
            [[0,"desc"]],
            [[0,"desc"]],
            [[0,"desc"]]
        ],
        width:[
            ['30%','70%'],
            ['30%','70%'],
            ['30%','70%']
        ],
        display:[
            'kode',
            'kode',
            'kode'
        ],
        pageLength:[
            10,
            10,
            10
        ]
    })
    }, 500)
});

var $formData = "";
$('#form-filter').submit(function(e){
    e.preventDefault();
    $formData = new FormData();
    $formData.append("tahun[]",$tahun.type);
    $formData.append("tahun[]",$tahun.from);
    $formData.append("tahun[]",$tahun.to);
    $formData.append("kode_pp[]",$kode_pp.type);
    $formData.append("kode_pp[]",$kode_pp.from);
    $formData.append("kode_pp[]",$kode_pp.to);
    $formData.append("nik[]",$nik.type);
    $formData.append("nik[]",$nik.from);
    $formData.append("nik[]",$nik.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]); 
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('bdh-auth/form/rptKartuIF') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#show').change(function(e){
    e.preventDefault();
    $formData = new FormData();
    $formData.append("tahun[]",$tahun.type);
    $formData.append("tahun[]",$tahun.from);
    $formData.append("tahun[]",$tahun.to);
    $formData.append("kode_pp[]",$kode_pp.type);
    $formData.append("kode_pp[]",$kode_pp.from);
    $formData.append("kode_pp[]",$kode_pp.to);
    $formData.append("nik[]",$nik.type);
    $formData.append("nik[]",$nik.from);
    $formData.append("nik[]",$nik.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]); 
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('bdh-auth/form/rptKartuIF') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#sai-rpt-print').click(function(){
    $('#saku-report #canvasPreview').printThis({
        removeInline: true
    });
});

$('#sai-rpt-print-prev').click(function(){
    var newWindow = window.open();
    var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
    newWindow.document.write(html);
});

$("#sai-rpt-excel").click(function(e) {
    e.preventDefault();
    $("#saku-report #canvasPreview").table2excel({
        // exclude: ".excludeThisClass",
        name: "Lap_Ver_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
        filename: "Lap_Ver_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
        preserveColors: false // set to true if you want background colors and font colors preserved
    });
});

$("#sai-rpt-email").click(function(e) {
    e.preventDefault();
    alert('Incoming')
    // $('#formEmail')[0].reset();
    // $('#modalEmail').modal('show');
});

$("#sai-rpt-pdf").click(function(e) {
    e.preventDefault();
    alert('Incoming')
    // var link = "{{ url('esaku-report/lap-jurnal-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&modul[]="+$modul.type+"&modul[]="+$modul.from+"&modul[]="+$modul.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to+"&sum_ju[]="+$sum_ju.type+"&sum_ju[]="+$sum_ju.from+"&sum_ju[]="+$sum_ju.to;
    // window.open(link, '_blank'); 
});
</script>