<link rel="stylesheet" href="{{ asset('report.css') }}" />
<style>
    .barcode-session {
        float: right;
    }
    .div-table {
        float: right;
    }
    .table-check {
        width: 600px;
        border-collapse: collapse;
    }
    .table-check tbody tr td {
        border: 1px #000000 solid;
    }
</style>
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Posisi Pengajuan Beban" padding="px-4 py-4"/>  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('3')"/>
                                    <x-inp-filter kode="no_bukti" nama="No Bukti" selected="1" :option="array('1','2','3','i')"/>
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-report-paging :option="array()" default="All" />
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Laporan Posisi Pengajuan Beban" padding="px-0 py-4"/>
@include('modal_search')
@include('modal_email')
    
 @php
    date_default_timezone_set("Asia/Bangkok");
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.5/JsBarcode.all.min.js" integrity="sha512-QEAheCz+x/VkKtxeGoDq6nsGyzTx/0LMINTgQjqZ0h3+NjP+bCsPYz3hn0HnBkGmkIFSr7QcEZT+KyEM7lbLPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
    }
});

var $no_bukti = {
    type : "all",
    from : "",
    fromname : "",
    to : "",
    toname : "",
}
var $periode = {
    type : "=",
    from : "{{ date('Ym') }}",
    fromname : namaPeriode("{{ date('Ym') }}"),
    to : "",
    toname : "",
}

var $aktif = "";

$.fn.DataTable.ext.pager.numbers_length = 5;

$('#periode-from').val(namaPeriode("{{ date('Ym') }}"));

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
    kode : ['periode','no_bukti'],
    nama : ['Periode','No Bukti'],
    header : [
        ['Periode'],
        ['No Bukti','Keterangan']
    ],
    headerpilih : [
        ['Periode','Action'],
        ['No Bukti','Keterangan','Action']
    ],
    columns: [
        [
            { data: 'periode' },
        ],
        [
            { data: 'no_pb' },
            { data: 'keterangan' }
        ]
    ],
    url :[
        "{{ url('bdh-report/filter-periodepb') }}",
        "{{ url('bdh-report/filter-nopb') }}"
    ],
    parameter:[
        {},
        {
            'periode[0]': $periode.type,
            'periode[1]': $periode.from,
            'periode[2]': $periode.to,
        }
    ],
    orderby:[
        [[0,"desc"]],
        [[0,"desc"]]
    ],
    width:[
        ['30%','70%'],
        ['30%','70%']
    ],
    display:[
        'kode',
        'kode'
    ],
    pageLength:[
        10,
        10
    ]
})

$('#inputFilter').on('change','input',function(e){
    setTimeout(() => {
    $('#inputFilter').reportFilter({
        kode : ['periode','no_bukti'],
        nama : ['Periode','No Bukti'],
        header : [
            ['Periode'],
            ['No Bukti','Keterangan']
        ],
        headerpilih : [
            ['Periode','Action'],
            ['No Bukti','Keterangan','Action']
        ],
        columns: [
            [
                { data: 'periode' },
            ],
            [
                { data: 'no_pb' },
                { data: 'keterangan' }
            ]
        ],
        url :[
            "{{ url('bdh-report/filter-periodepb') }}",
            "{{ url('bdh-report/filter-nopb') }}"
        ],
        parameter:[
            {},
            {
                'periode[0]': $periode.type,
                'periode[1]': $periode.from,
                'periode[2]': $periode.to,
            }
        ],
        orderby:[
            [[0,"desc"]],
            [[0,"desc"]]
        ],
        width:[
            ['30%','70%'],
            ['30%','70%']
        ],
        display:[
            'kode',
            'kode'
        ],
        pageLength:[
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
    $formData.append("periode[]",$periode.type);
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]",$periode.to);
    $formData.append("no_bukti[]",$no_bukti.type);
    $formData.append("no_bukti[]",$no_bukti.from);
    $formData.append("no_bukti[]",$no_bukti.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]); 
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('bdh-auth/form/rptPosisiAjuBeban') }}";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#show').change(function(e){
    e.preventDefault();
    $formData = new FormData();
    $formData.append("periode[]",$periode.type);
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]",$periode.to);
    $formData.append("no_bukti[]",$no_bukti.type);
    $formData.append("no_bukti[]",$no_bukti.from);
    $formData.append("no_bukti[]",$no_bukti.to);
    for(var pair of $formData.entries()) {
        console.log(pair[0]+ ', '+ pair[1]); 
    }
    $('#saku-report').removeClass('hidden');
    xurl = "{{ url('bdh-auth/form/rptPosisiAjuBeban') }}";
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

// LINK TO OTHER REPORT
$('#saku-report #canvasPreview').on('click', '.linkpb', function(e){
    e.preventDefault();
    var no_bukti = $(this).data('no_bukti');
    var periode = $periode.from;
            
    $formData.delete('periode[]');
    $formData.delete('no_bukti[]');
    
    $formData.append("periode[]","=");
    $formData.append("periode[]",periode);
    $formData.append("periode[]","");
    $formData.append("no_bukti[]","=");
    $formData.append("no_bukti[]",no_bukti);
    $formData.append("no_bukti[]","");

    $formData.delete('back');
    $formData.append('back', true);
    
    $('.breadcrumb').html('');
    $('.breadcrumb').append(`
        <li class="breadcrumb-item">
            <a href="#" class="klik-report" data-href="lap-posaju-beban" aria-param="">Laporan Posisi Pengajuan Beban</a>
        </li>
        <li class="breadcrumb-item active" aria-current="lap-aju-beban" aria-param="`+no_bukti+`">Laporan Pengajuan Beban</li>
    `);
    xurl ="bdh-auth/form/rptAjuBeban";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#saku-report #canvasPreview').on('click', '.linkdok', function(e){
    e.preventDefault();
    var no_bukti = $(this).data('no_bukti');
            
    $formData.delete('periode[]');
    $formData.delete('no_bukti[]');
    
    $formData.append("no_bukti[]","=");
    $formData.append("no_bukti[]",no_bukti);
    $formData.append("no_bukti[]","");

    $formData.delete('back');
    $formData.append('back', true);
    
    $('.breadcrumb').html('');
    $('.breadcrumb').append(`
        <li class="breadcrumb-item">
            <a href="#" class="klik-report" data-href="lap-posaju-beban" aria-param="">Laporan Posisi Pengajuan Beban</a>
        </li>
        <li class="breadcrumb-item active" aria-current="daftar-dokumen" aria-param="`+no_bukti+`">Daftar Dokumen</li>
    `);
    xurl ="bdh-auth/form/rptDetailDok";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#saku-report #canvasPreview').on('click', '.linkver', function(e){
    e.preventDefault();
    var no_bukti = $(this).data('no_bukti');
            
    $formData.delete('periode[]');
    $formData.delete('no_bukti[]');
    
    $formData.append("periode[]","=");
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]","");
    $formData.append("no_bukti[]","=");
    $formData.append("no_bukti[]",no_bukti);
    $formData.append("no_bukti[]","");

    $formData.delete('back');
    $formData.append('back', true);
    
    $('.breadcrumb').html('');
    $('.breadcrumb').append(`
        <li class="breadcrumb-item">
            <a href="#" class="klik-report" data-href="lap-posaju-beban" aria-param="">Laporan Posisi Pengajuan Beban</a>
        </li>
        <li class="breadcrumb-item active" aria-current="lap-ver" aria-param="`+no_bukti+`">Laporan Verifikasi</li>
    `);
    xurl ="bdh-auth/form/rptVer";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#saku-report #canvasPreview').on('click', '.linkspb', function(e){
    e.preventDefault();
    var no_bukti = $(this).data('no_bukti');
            
    $formData.delete('periode[]');
    $formData.delete('no_bukti[]');
    
    $formData.append("periode[]","=");
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]","");
    $formData.append("no_bukti[]","=");
    $formData.append("no_bukti[]",no_bukti);
    $formData.append("no_bukti[]","");

    $formData.delete('back');
    $formData.append('back', true);
    
    $('.breadcrumb').html('');
    $('.breadcrumb').append(`
        <li class="breadcrumb-item">
            <a href="#" class="klik-report" data-href="lap-posaju-beban" aria-param="">Laporan Posisi Pengajuan Beban</a>
        </li>
        <li class="breadcrumb-item active" aria-current="lap-spb" aria-param="`+no_bukti+`">Laporan SPB</li>
    `);
    xurl ="bdh-auth/form/rptSPB";
    $('#saku-report #canvasPreview').load(xurl);
});

$('#saku-report #canvasPreview').on('click', '.linkbyr', function(e){
    e.preventDefault();
    var no_bukti = $(this).data('no_bukti');
            
    $formData.delete('periode[]');
    $formData.delete('no_bukti[]');
    
    $formData.append("periode[]","=");
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]","");
    $formData.append("no_bukti[]","=");
    $formData.append("no_bukti[]",no_bukti);
    $formData.append("no_bukti[]","");

    $formData.delete('back');
    $formData.append('back', true);
    
    $('.breadcrumb').html('');
    $('.breadcrumb').append(`
        <li class="breadcrumb-item">
            <a href="#" class="klik-report" data-href="lap-posaju-beban" aria-param="">Laporan Posisi Pengajuan Beban</a>
        </li>
        <li class="breadcrumb-item active" aria-current="lap-ver" aria-param="`+no_bukti+`">Laporan Pembayaran</li>
    `);
    xurl ="bdh-auth/form/rptBayar";
    $('#saku-report #canvasPreview').load(xurl);
});

$('.navigation-lap').on('click', '#btn-back', function(e){
    e.preventDefault();
    $formData.delete('periode[]');
    $formData.delete('no_bukti[]');
    
    $formData.append("periode[]",$periode.type);
    $formData.append("periode[]",$periode.from);
    $formData.append("periode[]",$periode.to);
    $formData.append("no_bukti[]",$no_bukti.type);
    $formData.append("no_bukti[]",$no_bukti.from);
    $formData.append("no_bukti[]",$no_bukti.to);

    $formData.delete('back');
    $formData.append('back', false);

    var aktif = $('.breadcrumb-item.active').attr('aria-current');
    var tmp = $('.breadcrumb-item.active').attr('aria-param').split("|");
    var param = tmp[0];

    xurl = "bdh-auth/form/rptPosisiAjuBeban";
    $('#saku-report #canvasPreview').load(xurl);
});
// END LINK TO OTHER REPORT
</script>