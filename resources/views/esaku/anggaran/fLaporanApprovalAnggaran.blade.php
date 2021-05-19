<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Approval Anggaran" padding="px-4 py-4"/>  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('1','2','3')"/>
                                    <x-inp-filter kode="modul" nama="Modul" selected="1" :option="array('1')"/>
                                    <x-inp-filter kode="no_app" nama="No Approval" selected="1" :option="array('1')"/>
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
<x-report-result judul="Laporan Pengajuan Anggaran" padding="px-0 py-4"/>
@include('modal_search')
@include('modal_email')
    
 @php
    date_default_timezone_set("Asia/Bangkok");
@endphp

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>

<script type="text/javascript">
    var periode = "{{ date('Ym') }}"

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
        }
    });

    var $periode = {
        type : "=",
        from : periode,
        fromname : namaPeriode(periode),
        to : "",
        toname : "",
    }

    var $modul = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $no_app = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    $('#periode-from').val(namaPeriode(periode));

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
        kode : ['periode', 'modul', 'no_app'],
        nama : ['Periode', 'Modul', 'No Approval'],
        header : [['Periode'], ['Kode'], ['Kode']],
        headerpilih : [['Periode', 'Action'], ['Kode', 'Action'], ['Kode', 'Action']],
        columns: [
            [
                { data: 'periode' }
            ],
            [],
            []
        ],
        url :["{{ url('esaku-report/filter-periode-anggaran') }}", "", ""],
        parameter:[
            {},
            {},
            {}
        ],
        orderby:[[], [], []],
        width:[['30%'], ['30%'], ['30%']],
        display:['kode', 'kode', 'kode'],
        pageLength:[10, 10, 10]
    });

    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            $('#inputFilter').reportFilter({
                kode : ['periode', 'modul', 'no_app'],
                nama : ['Periode', 'Modul', 'No Approval'],
                header : [['Periode'], ['Kode'], ['Kode']],
                headerpilih : [['Periode', 'Action'], ['Kode', 'Action'], ['Kode', 'Action']],
                columns: [
                    [
                        { data: 'periode' }
                    ],
                    [],
                    []
                ],
                url :["{{ url('esaku-report/filter-periode-anggaran') }}", "", ""],
                parameter:[
                    {},
                    {},
                    {}
                ],
                orderby:[[], [], []],
                width:[['30%'], ['30%'], ['30%']],
                display:['kode', 'kode', 'kode'],
                pageLength:[10, 10, 10]
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
        $formData.append("modul[]",$modul.type);
        $formData.append("modul[]",$modul.from);
        $formData.append("modulk[]",$modul.to);
        $formData.append("no_app[]",$no_app.type);
        $formData.append("no_app[]",$no_app.from);
        $formData.append("no_app[]",$no_app.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/anggaran_rptLaporanApprovalAnggaran') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("modul[]",$modul.type);
        $formData.append("modul[]",$modul.from);
        $formData.append("modulk[]",$modul.to);
        $formData.append("no_app[]",$no_app.type);
        $formData.append("no_app[]",$no_app.from);
        $formData.append("no_app[]",$no_app.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('esaku-auth/form/anggaran_rptLaporanApprovalAnggaran') }}";
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
            name: "Lap_Approval_Anggaran_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Lap_Approval_Anggaran_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });
</script>