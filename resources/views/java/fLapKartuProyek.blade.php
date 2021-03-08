<link rel="stylesheet" href="{{ asset('report.css') }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Kartu Proyek" padding="px-4 py-4"/>  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="kode_cust" nama="Vendor" selected="3" :option="array('1','2','3','i')"/>
                                    <x-inp-filter kode="no_proyek" nama="No Proyek" selected="3" :option="array('1','2','3','i')"/>
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
<x-report-result judul="Laporan Kartu Proyek" padding="px-0 py-4"/>
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
    var $no_proyek = {
        type : "=",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $kode_cust = {
        type : "=",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    $.ajax({
        type: 'GET',
        url: "{{ url('java-report/filter-kartu-tagihan') }}",
        dataType: 'json',
        async:false,
        success: function(result) {
            var initial = result.daftar[result.daftar.length - 1].no_proyek;
            $no_proyek.from = initial;
            $no_proyek.fromname = initial;
            $('#no_proyek-from').val(initial);
        }
    })

    $.ajax({
        type: 'GET',
        url: "{{ url('java-trans/customer') }}",
        dataType: 'json',
        async:false,
        success: function(result) {
            var initial = result.daftar[0].kode_cust;
            $kode_cust.from = initial;
            $kode_cust.fromname = initial;
            $('#kode_cust-from').val(initial);
        }
    })

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
        kode : ['no_proyek'],
        nama : ['No Proyek'],
            header : [['No Proyek', 'Keterangan']],
            headerpilih : [['No Proyek', 'Keterangan','Action']],
            columns: [
                [
                    { data: 'no_proyek' },
                    { data: 'keterangan' }
                ]
            ],
            url :["{{ url('java-report/filter-kartu-tagihan') }}"],
            parameter:[],
            orderby:[[]],
            width:[['30%','70%']],
            display:['kode'],
            pageLength:[10]
    });
    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            $('#inputFilter').reportFilter({
            kode : ['no_proyek', 'kode_cust'],
            nama : ['No Proyek', 'Kode Vendor'],
                header : [['No Proyek', 'Keterangan'], ['Kode Vendor', 'Nama']],
                headerpilih : [['No Proyek', 'Keterangan','Action'], ['Kode Vendor', 'Nama','Action']],
                columns: [
                    [
                        { data: 'no_proyek' },
                        { data: 'keterangan' }
                    ],
                    [
                        { data: 'kode_cust' },
                        { data: 'nama' }
                    ]
                ],
                url :["{{ url('java-report/filter-kartu-tagihan') }}", "{{ url('java-trans/customer') }}"],
                parameter:[{
                    kode: $kode_cust.from
                },{}],
                orderby:[[],[]],
                width:[['30%','70%'],['30%','70%']],
                display:['kode', 'kode'],
                pageLength:[10, 10]
            });
        }, 500)
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("no_proyek[]",$no_proyek.type);
        $formData.append("no_proyek[]",$no_proyek.from);
        $formData.append("no_proyek[]",$no_proyek.to);
        $formData.append("kode_cust[]",$kode_cust.type);
        $formData.append("kode_cust[]",$kode_cust.from);
        $formData.append("kode_cust[]",$kode_cust.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('java-auth/form/rptKartuProyek') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("no_proyek[]",$no_proyek.type);
        $formData.append("no_proyek[]",$no_proyek.from);
        $formData.append("no_proyek[]",$no_proyek.to);
        $formData.append("kode_cust[]",$kode_cust.type);
        $formData.append("kode_cust[]",$kode_cust.from);
        $formData.append("kode_cust[]",$kode_cust.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('java-auth/form/rptKartuProyek') }}";
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
            name: "Lap_Kartu_Proyek_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Lap_Kartu_Proyek_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });
</script>