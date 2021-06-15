<link rel="stylesheet" href="{{ asset('report.css') }}" />

<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Saldo Proyek" padding="px-4 py-4"/>  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="kode_pp" nama="Regional" selected="3" :option="array('1','3')"/>
                                    <x-inp-filter kode="kode_kota" nama="Kota" selected="1" :option="array('1','3','i')"/>
                                    <x-inp-filter kode="no_bukti" nama="No Bukti" selected="1" :option="array('1','3')"/>
                                    <x-inp-filter kode="no_dokumen" nama="No Dokumen" selected="1" :option="array('1','3')"/>
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-report-paging :option="array()" default="10" />  
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Laporan Posisi" padding="px-0 py-4"/>
@include('modal_search')
@include('modal_email')
    
 @php
    date_default_timezone_set("Asia/Bangkok");
@endphp
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('reportFilter.js') }}"></script>

<script type="text/javascript">
    var _pp = "{{ Session::get('kodePP') }}";
    var _namaPP = ''
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
        }
    });

    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/filter-pp') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar
                        var filter = data.filter(data => data.kode_pp == _pp)
                        if(filter.length > 0) {
                            _namaPP = filter[0].nama
                        }
                    }
                }
            }
        });
    })();

    var $regional = {
        type : "=",
        from : _pp,
        fromname : _namaPP,
        to : "",
        toname : "",
    }

    var $kota = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $no_bukti = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }

    var $no_dokumen = {
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
        kode : ['kode_pp', 'kode_kota', 'no_bukti', 'no_dokumen'],
        nama : ['Regional', 'Kota', 'No Bukti', 'No Dokumen'],
        header : [['Kode', 'Nama'], ['Kode', 'Nama'], ['Kode', 'Nama'], ['Kode', 'Nama']],
        headerpilih : [['Kode Regional', 'Nama','Action'], ['Kode Vendor', 'Nama','Action'], ['No Bukti', 'Kegiatan','Action'], ['No Dokumen','Action']],
        columns: [
            [
                { data: 'kode_pp' },
                { data: 'nama' }
            ],
            [
                { data: 'kode_kota' },
                { data: 'nama' }
            ],
            [
                { data: 'no_bukti' },
                { data: 'kegiatan' }
            ],
            [
                { data: 'no_dokumen' }
            ]
        ],
        url :["{{ url('apv/filter-pp') }}", "{{ url('apv/filter-kota') }}", "{{ url('apv/filter-nobukti') }}", "{{ url('apv/filter-nodokumen') }}"],
        parameter:[{}, {
            'kode_pp': $regional.from
        }, {
            'kode_pp': $regional.from,
            'kode_kota': $kota.type
        }, {
            'kode_pp': $regional.from,
            'kode_kota': $kota.from,
            'no_bukti': $no_bukti.from
        }],
        orderby:[[], [], [], []],
        width:[['30%','70%'], ['30%','70%'], ['30%','70%'], ['30%','70%']],
        display:['kode', 'kode', 'kode', 'kode'],
        pageLength:[10, 10, 10, 10]
    });

    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
           $('#inputFilter').reportFilter({
                kode : ['kode_pp', 'kode_kota', 'no_bukti', 'no_dokumen'],
                nama : ['Regional', 'Kota', 'No Bukti', 'No Dokumen'],
                header : [['Kode', 'Nama'], ['Kode', 'Nama'], ['Kode', 'Nama'], ['Kode', 'Nama']],
                headerpilih : [['Kode Regional', 'Nama','Action'], ['Kode Vendor', 'Nama','Action'], ['No Bukti', 'Kegiatan','Action'], ['No Dokumen','Action']],
                columns: [
                    [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'kode_kota' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'no_bukti' },
                        { data: 'kegiatan' }
                    ],
                    [
                        { data: 'no_dokumen' }
                    ]
                ],
                url :["{{ url('apv/filter-pp') }}", "{{ url('apv/filter-kota') }}", "{{ url('apv/filter-nobukti') }}", "{{ url('apv/filter-nodokumen') }}"],
                parameter:[{}, {
                    'kode_pp': $regional.from
                }, {
                    'kode_pp': $regional.from,
                    'kode_kota': $kota.type
                }, {
                    'kode_pp': $regional.from,
                    'kode_kota': $kota.from,
                    'no_bukti': $no_bukti.from
                }],
                orderby:[[], [], [], []],
                width:[['30%','70%'], ['30%','70%'], ['30%','70%'], ['30%','70%']],
                display:['kode', 'kode', 'kode', 'kode'],
                pageLength:[10, 10, 10, 10]
            }); 
        }, 500)
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("kode_pp[]",$regional.type);
        $formData.append("kode_pp[]",$regional.from);
        $formData.append("kode_pp[]",$regional.to);
        $formData.append("kode_kota[]",$kota.type);
        $formData.append("kode_kota[]",$kota.from);
        $formData.append("kode_kota[]",$kota.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        $formData.append("no_dokumen[]",$no_dokumen.type);
        $formData.append("no_dokumen[]",$no_dokumen.from);
        $formData.append("no_dokumen[]",$no_dokumen.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('silo-auth/form/rptPosisi') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("kode_pp[]",$regional.type);
        $formData.append("kode_pp[]",$regional.from);
        $formData.append("kode_pp[]",$regional.to);
        $formData.append("kode_kota[]",$kota.type);
        $formData.append("kode_kota[]",$kota.from);
        $formData.append("kode_kota[]",$kota.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        $formData.append("no_dokumen[]",$no_dokumen.type);
        $formData.append("no_dokumen[]",$no_dokumen.from);
        $formData.append("no_dokumen[]",$no_dokumen.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('silo-auth/form/rptPosisi') }}";
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
            name: "Lap_Posisi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Lap_Posisi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });
</script>