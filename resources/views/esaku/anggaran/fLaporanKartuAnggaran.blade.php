<style>
    .card-anggaran {
        border: 1px solid rgba(0,0,0,0.1);
        padding: 8px;
        margin-left: 8px;
        margin-right: 8px;
        margin-bottom: 8px;
    }
</style>
<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Kartu Anggaran" padding="px-4 py-4"/>  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="tahun" nama="Tahun" selected="3" :option="array('1','2','3')"/>
                                    <x-inp-filter kode="kode_akun" nama="Kode Akun" selected="1" :option="array('1','2','3')"/>
                                    <x-inp-filter kode="kode_pp" nama="Kode PP" selected="3" :option="array('1','2','3')"/>
                                    <x-inp-filter kode="jenis" nama="Jenis Akun" selected="3" :option="array('1','3')"/>
                                    <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('1','2','3')"/>
                                    <x-inp-filter kode="realisasi" nama="Realisasi" selected="3" :option="array('3')"/>
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
<x-report-result judul="Laporan Kartu Anggaran" padding="px-0 py-4"/>
@include('modal_search')
@include('modal_email')
    
 @php
    date_default_timezone_set("Asia/Bangkok");
@endphp

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>

<script type="text/javascript">
    var kode_pp = "{{ Session::get('kodePP') }}"
    var periode = "{{ date('Ym') }}"
    var jenis = "Beban"
    var realisasi = "Anggaran"
    var tahun = "{{ date('Y') }}"

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
        }
    });

    var $tahun = {
        type : "=",
        from : tahun,
        fromname : tahun,
        to : "",
        toname : "",
    }

    var $periode = {
        type : "=",
        from : periode,
        fromname : namaPeriode(periode),
        to : "",
        toname : "",
    }

    var $kode_akun = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $kode_pp = {
        type : "=",
        from : kode_pp,
        fromname : kode_pp,
        to : "",
        toname : "",
    }

    var $jenis = {
        type : "=",
        from : jenis,
        fromname : jenis,
        to : "",
        toname : "",
    }

    var $realisasi = {
        type : "=",
        from : realisasi,
        fromname : realisasi,
        to : "",
        toname : "",
    }

    $('#periode-from').val(namaPeriode(periode));
    $('#tahun-from').val(tahun);
    $('#kode_pp-from').val(kode_pp);
    $('#jenis-from').val(jenis);
    $('#realisasi-from').val(realisasi);

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
        kode : ['tahun', 'kode_akun', 'kode_pp', 'jenis', 'periode', 'realisasi'],
        nama : ['Tahun', 'Kode Akun', 'Kode PP', 'Jenis Akun', 'Periode', 'Realisasi'],
        header : [['Tahun'], ['Kode', 'Nama'], ['Kode', 'Nama'], ['Kode'], ['Kode'], ['Periode'], ['Kode']],
        headerpilih : [['Tahun', 'Action'], ['Kode Akun', 'Nama', 'Action'], ['Kode PP', 'Nama', 'Action'], ['Kode', 'Action'], ['Periode', 'Action'], ['Kode', 'Action']],
        columns: [
            [
                { data: 'tahun' }
            ],
            [
                { data: 'kode_akun' },
                { data: 'nama' }
            ],
            [
                { data: 'kode_pp' },
                { data: 'nama' }
            ],
            [
                { data: 'kode' }
            ],
            [
                { data: 'periode' }
            ],
            []
        ],
        url :["{{ url('esaku-report/filter-tahun-anggaran') }}", "{{ url('esaku-report/filter-akun-anggaran') }}", "{{ url('esaku-report/filter-pp-anggaran') }}", "{{ url('esaku-report/filter-jenis-anggaran') }}", "{{ url('esaku-report/filter-periode-anggaran') }}", ""],
        parameter:[
            {},
            {
                'tahun[]': $tahun.type,
                'tahun[]': $tahun.from,
                'tahun[]': $tahun.to
            },
            {
                'tahun[]': $tahun.type,
                'tahun[]': $tahun.from,
                'tahun[]': $tahun.to
            },
            {},
            {}
        ],
        orderby:[[], [], [], [], []],
        width:[['30%'], ['30%','70%'], ['30%','70%'], ['30%'], ['30%'], ['30%']],
        display:['kode', 'kode', 'kode', 'kode', 'kode', 'kode'],
        pageLength:[10, 10, 10, 10, 10, 10]
    });

    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            $('#inputFilter').reportFilter({
                kode : ['tahun', 'kode_akun', 'kode_pp', 'jenis', 'periode', 'realisasi'],
                nama : ['Tahun', 'Kode Akun', 'Kode PP', 'Jenis Akun', 'Periode', 'Realisasi'],
                header : [['Tahun'], ['Kode', 'Nama'], ['Kode', 'Nama'], ['Kode'], ['Kode'], ['Periode'], ['Kode']],
                headerpilih : [['Tahun', 'Action'], ['Kode Akun', 'Nama', 'Action'], ['Kode PP', 'Nama', 'Action'], ['Kode', 'Action'], ['Periode', 'Action'], ['Kode', 'Action']],
                columns: [
                    [
                        { data: 'tahun' }
                    ],
                    [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'kode' }
                    ],
                    [
                        { data: 'periode' }
                    ],
                    []
                ],
                url :["{{ url('esaku-report/filter-tahun-anggaran') }}", "{{ url('esaku-report/filter-akun-anggaran') }}", "{{ url('esaku-report/filter-pp-anggaran') }}", "{{ url('esaku-report/filter-jenis-anggaran') }}", "{{ url('esaku-report/filter-periode-anggaran') }}", ""],
                parameter:[
                    {},
                    {
                        'tahun[]': $tahun.type,
                        'tahun[]': $tahun.from,
                        'tahun[]': $tahun.to
                    },
                    {
                        'tahun[]': $tahun.type,
                        'tahun[]': $tahun.from,
                        'tahun[]': $tahun.to
                    },
                    {},
                    {}
                ],
                orderby:[[], [], [], [], []],
                width:[['30%'], ['30%','70%'], ['30%','70%'], ['30%'], ['30%'], ['30%']],
                display:['kode', 'kode', 'kode', 'kode', 'kode', 'kode'],
                pageLength:[10, 10, 10, 10, 10, 10]
            });
        }, 500)
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("tahun[]",$tahun.type);
        $formData.append("tahun[]",$tahun.from);
        $formData.append("tahun[]",$tahun.to);
        $formData.append("kode_akun[]",$kode_akun.type);
        $formData.append("kode_akun[]",$kode_akun.from);
        $formData.append("kode_akun[]",$kode_akun.to);
        $formData.append("kode_pp[]",$kode_pp.type);
        $formData.append("kode_pp[]",$kode_pp.from);
        $formData.append("kode_pp[]",$kode_pp.to);
        $formData.append("jenis[]",$jenis.type);
        $formData.append("jenis[]",$jenis.from);
        $formData.append("jenis[]",$jenis.to);
        $formData.append("realisasi[]",$realisasi.type);
        $formData.append("realisasi[]",$realisasi.from);
        $formData.append("realisasi[]",$realisasi.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/anggaran_rptLaporanKartuAnggaran') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("tahun[]",$tahun.type);
        $formData.append("tahun[]",$tahun.from);
        $formData.append("tahun[]",$tahun.to);
        $formData.append("kode_akun[]",$kode_akun.type);
        $formData.append("kode_akun[]",$kode_akun.from);
        $formData.append("kode_akun[]",$kode_akun.to);
        $formData.append("kode_pp[]",$kode_pp.type);
        $formData.append("kode_pp[]",$kode_pp.from);
        $formData.append("kode_pp[]",$kode_pp.to);
        $formData.append("jenis[]",$jenis.type);
        $formData.append("jenis[]",$jenis.from);
        $formData.append("jenis[]",$jenis.to);
        $formData.append("realisasi[]",$realisasi.type);
        $formData.append("realisasi[]",$realisasi.from);
        $formData.append("realisasi[]",$realisasi.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/anggaran_rptLaporanKartuAnggaran') }}";
        $('#saku-report #canvasPreview').load(xurl);
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
            name: "Lap_Kartu_Anggaran_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Lap_Kartu_Anggaran_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });
</script>