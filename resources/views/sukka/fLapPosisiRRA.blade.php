<link rel="stylesheet" href="{{ asset('report-new.css?version=_').time() }}" />
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Posisi"/>
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="kode_lokasi" nama="Lokasi" selected="3" :option="array('3')"/>
                                    <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('1','2','3','i')"/>
                                    <x-inp-filter kode="kode_pp" nama="Kode PP" selected="1" :option="array('1','2','3','i')"/>
                                    <x-inp-filter kode="no_bukti" nama="No Bukti" selected="1" :option="array('1','2','3','i')"/>
                                    <!-- END COMPONENT -->
                                </div>
                                <button id="btn-tampil" style="float:right;width:120px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:120px" type="button" >Tutup</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <x-report-paging :option="array()" default="10" />  
            </div>                    
        </div>
    </div>
</div>
<x-report-result judul="Posisi" padding="py-4 px-4"/>

@php
    date_default_timezone_set("Asia/Bangkok");
@endphp

<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('asset_dore/js/jquery-ui.min.js') }}"></script>
<script>
    $(".header-report").removeClass('pt-4');
    $(".header-report").addClass('pt-2');
    $(".header-report").css('min-height','46px');
    $(".header-report > h6").css('top','10px');
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // FUNCTION TAMBAHAN
    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }
    
    var $kode_lokasi = {
        type : "=",
        from : "{{ Session::get('lokasi') }}",
        fromname : "{{ Session::get('namaLokasi') }}",
        to : "",
        toname : "",
    }

    var $periode = {
        type : "=",
        from : "{{ Session::get('periode') }}",
        fromname : namaPeriode("{{ Session::get('periode') }}"),
        to : "",
        toname : "",
    }

    var $kode_pp = {
        type : "All",
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
    
    var $aktif = "";
    
    $.fn.DataTable.ext.pager.numbers_length = 5;
    var param_trace = {
        no_bukti : ''
    };

    function loadFilterDefault(){
        $.ajax({
            type: 'GET',
            url: "{{ url('sukka-report/filter-default-rra') }}",
            dataType: 'json',
            async:false,
            success:function(result){   
                if(result.status){
                    $('#kode_lokasi-from').val("{{ Session::get('lokasi') }}");
                    $('#periode-from').val(namaPeriode(result.periode));
                    $periode = {
                        type : "=",
                        from : result.periode,
                        fromname : namaPeriode(result.periode),
                        to : "",
                        toname : "",
                    }

                    generateRptFilter('#inputFilter',{
                        kode : ['kode_lokasi','periode','kode_pp','no_bukti'],
                        nama : ['Lokasi','Periode','Kode PP','No Bukti'],
                        header : [['Kode', 'Nama'],['Periode', 'Nama'],['Kode','Nama'],['No Bukti','Keterangan']],
                        headerpilih : [['Kode', 'Nama','Action'],['Periode', 'Nama','Action'],['Kode','Nama','Action'],['No Bukti','Keterangan','Action']],
                        columns: [
                            [
                                { data: 'kode_lokasi' },
                                { data: 'nama' }
                            ],
                            [
                                { data: 'periode' },
                                { data: 'nama' }
                            ],
                            [
                                { data: 'kode_pp' },
                                { data: 'nama' },
                            ],
                            [
                                { data: 'no_bukti' },
                                { data: 'keterangan' }
                            ]
                        ],
                        url :["{{ url('sukka-report/filter-lokasi') }}","{{ url('sukka-report/filter-periode-rra') }}","{{ url('sukka-report/filter-pp') }}","{{ url('sukka-report/filter-bukti-rra') }}"],
                        parameter:[{},{
                            'kode_lokasi[0]':$kode_lokasi.type,
                            'kode_lokasi[1]':$kode_lokasi.from,
                            'kode_lokasi[2]':$kode_lokasi.to,
                        },{
                            'kode_lokasi[0]':$kode_lokasi.type,
                            'kode_lokasi[1]':$kode_lokasi.from,
                            'kode_lokasi[2]':$kode_lokasi.to,
                        },{
                            'kode_lokasi[0]':$kode_lokasi.type,
                            'kode_lokasi[1]':$kode_lokasi.from,
                            'kode_lokasi[2]':$kode_lokasi.to,
                            'periode[0]':$periode.type,
                            'periode[1]':$periode.from,
                            'periode[2]':$periode.to,
                            'kode_pp[0]':$kode_pp.type,
                            'kode_pp[1]':$kode_pp.from,
                            'kode_pp[2]':$kode_pp.to
                        }],
                        orderby:[[],[[0,"desc"]],[],[]],
                        width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
                        display:['kode','name','kode','kode'],
                        pageLength:[10,12,10,10]
                    });
                
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                }else{
                    alert(JSON.stringify(result.message));
                }
            }
        });
    }

    loadFilterDefault();

    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            e.preventDefault();
            var kode_lokasi = $kode_lokasi;
            var periode = $periode;
            var kode_pp = $kode_pp;
            generateRptFilter('#inputFilter',{
                kode : ['kode_lokasi','periode','kode_pp','no_bukti'],
                nama : ['Lokasi','Periode','Kode PP','No Bukti'],
                header : [['Kode', 'Nama'],['Periode', 'Nama'],['Kode','Nama'],['No Bukti','Keterangan']],
                headerpilih : [['Kode', 'Nama','Action'],['Periode', 'Nama','Action'],['Kode','Nama','Action'],['No Bukti','Keterangan','Action']],
                columns: [
                    [
                        { data: 'kode_lokasi' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'periode' },
                        { data: 'nama' }
                    ],
                    [
                        { data: 'kode_pp' },
                        { data: 'nama' },
                    ],
                    [
                        { data: 'no_bukti' },
                        { data: 'keterangan' }
                    ]
                ],
                url :["{{ url('sukka-report/filter-lokasi') }}","{{ url('sukka-report/filter-periode-rra') }}","{{ url('sukka-report/filter-pp') }}","{{ url('sukka-report/filter-bukti-rra') }}"],
                parameter:[{},{
                    'kode_lokasi[0]':kode_lokasi.type,
                    'kode_lokasi[1]':kode_lokasi.from,
                    'kode_lokasi[2]':kode_lokasi.to,
                },{
                    'kode_lokasi[0]':kode_lokasi.type,
                    'kode_lokasi[1]':kode_lokasi.from,
                    'kode_lokasi[2]':kode_lokasi.to,
                },{
                    'kode_lokasi[0]':kode_lokasi.type,
                    'kode_lokasi[1]':kode_lokasi.from,
                    'kode_lokasi[2]':kode_lokasi.to,
                    'periode[0]':periode.type,
                    'periode[1]':periode.from,
                    'periode[2]':periode.to,
                    'kode_pp[0]':kode_pp.type,
                    'kode_pp[1]':kode_pp.from,
                    'kode_pp[2]':kode_pp.to
                }],
                orderby:[[],[[0,"desc"]],[],[]],
                width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
                display:['kode','name','kode','kode'],
                pageLength:[10,12,10,10]
            });
        }, 500);
    });

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

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        $formData = new FormData();
        $formData.append("kode_lokasi[]",$kode_lokasi.type);
        $formData.append("kode_lokasi[]",$kode_lokasi.from);
        $formData.append("kode_lokasi[]",$kode_lokasi.to);
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("kode_pp[]",$kode_pp.type);
        $formData.append("kode_pp[]",$kode_pp.from);
        $formData.append("kode_pp[]",$kode_pp.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('sukka-auth/form/rptPosisiRRA') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("kode_lokasi[]",$kode_lokasi.type);
        $formData.append("kode_lokasi[]",$kode_lokasi.from);
        $formData.append("kode_lokasi[]",$kode_lokasi.to);
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        $formData.append("kode_pp[]",$kode_pp.type);
        $formData.append("kode_pp[]",$kode_pp.from);
        $formData.append("kode_pp[]",$kode_pp.to);
        $formData.append("no_bukti[]",$no_bukti.type);
        $formData.append("no_bukti[]",$no_bukti.from);
        $formData.append("no_bukti[]",$no_bukti.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        xurl = "{{ url('sukka-auth/form/rptPosisiRRA') }}";
        $('#saku-report #canvasPreview').load(xurl);
    });

    // TRACE
    $('#saku-report #canvasPreview').on('click', '.history-aju', function(e){
        e.preventDefault();
        var no_bukti = $(this).data('no_bukti');
        param_trace.no_bukti = no_bukti;
        var back = true;
        
        $formData.delete('no_bukti[]');
        $formData.append('no_bukti[]', "=");
        $formData.append('no_bukti[]', no_bukti);
        $formData.append('no_bukti[]', "");

        $formData.delete('back');
        $formData.append('back', back);
        $('.breadcrumb').html('');
        $('.breadcrumb').append(`
            <li class="breadcrumb-item">
                <a href="#" class="klik-report" data-href="posisi">Posisi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="histori">Histori App</li>
        `);
        xurl ="sukka-auth/form/rptHistoryAppRRA";
        $('#saku-report #canvasPreview').load(xurl);
        // drawLapReg(formData);
    });

    $('#saku-report #canvasPreview').on('click', '.detail-aju', function(e){
        e.preventDefault();
        var no_bukti = $(this).data('no_bukti');
        param_trace.no_bukti = no_bukti;
        var back = true;
        
        $formData.delete('no_bukti[]');
        $formData.append('no_bukti[]', "=");
        $formData.append('no_bukti[]', no_bukti);
        $formData.append('no_bukti[]', "");

        $formData.delete('back');
        $formData.append('back', back);
        $('.breadcrumb').html('');
        $('.breadcrumb').append(`
            <li class="breadcrumb-item">
                <a href="#" class="klik-report" data-href="posisi">Posisi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="form">Form Justifikasi</li>
        `);
        xurl ="sukka-auth/form/rptAjuRRAForm";
        $('#saku-report #canvasPreview').load(xurl);
        // drawLapReg(formData);
    });

    $('.navigation-lap').on('click', '#btn-back', function(e){
        e.preventDefault();
        $formData.delete('periode[]');
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);

        var aktif = $('.breadcrumb-item.active').attr('aria-current');

        if(aktif == "histori" || aktif == "form"){
            xurl = "sukka-auth/form/rptPosisiRRA";
            $formData.delete('back');
            $formData.delete('no_bukti[]');
            $formData.append('no_bukti[]', $no_bukti.type);
            $formData.append('no_bukti[]', $no_bukti.from);
            $formData.append('no_bukti[]', $no_bukti.to);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item active" aria-current="posisi">Posisi</li>
            `);
            $('.navigation-lap').addClass('hidden');
        }
        $('#saku-report #canvasPreview').load(xurl);
        // drawLapReg(formData);
    });

    $('.breadcrumb').on('click', '.klik-report', function(e){
        e.preventDefault();
        var tujuan = $(this).data('href');
        $formData.delete('periode[]');
        $formData.append("periode[]",$periode.type);
        $formData.append("periode[]",$periode.from);
        $formData.append("periode[]",$periode.to);
        if(tujuan == "posisi"){
            $formData.delete('back');
            xurl = "sukka-auth/form/rptPosisiRRA";
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item active" aria-current="posisi" >Posisi</li>
            `);
            $('.navigation-lap').addClass('hidden');
        }
        $('#saku-report #canvasPreview').load(xurl);
        
    });
    // END TRACE

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
            name: "Posisi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Posisi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });

    $("#sai-rpt-pdf").click(function(e) {
        e.preventDefault();
        var link = "{{ url('sukka-report/lap-posisi-rra-pdf') }}?kode_lokasi[]="+$kode_lokasi.type+"&kode_lokasi[]="+$kode_lokasi.from+"&kode_lokasi[]="+$kode_lokasi.to+"&periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&kode_pp[]="+$kode_pp.type+"&kode_pp[]="+$kode_pp.from+"&kode_pp[]="+$kode_pp.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to;
        window.open(link, '_blank'); 
    });

    $("#sai-rpt-email").click(function(e) {
        e.preventDefault();
        var html =`<div id='modalEmail'>
            <form id='formEmail'>
                <div style="display: block;" class="modal-header">
                    <h6 class="modal-title my-2" style="position: absolute;height:49px">Kirim Email</h6>
                </div>
                <div class='modal-body'>
                    <div class='form-group row'>
                        <label for="modal-email" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                            <input type='text' class='form-control' maxlength='100' name='email' id='modal-email' required>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type="button" disabled="" style="display:none" id='loading-bar2' class="btn btn-info">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Loading...
                    </button>
                    <button type='submit' id='email-submit' class='btn btn-primary'>Kirim</button> 
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                </div>
            </form>
            </div>`;
            $('#content-bottom-sheet').html(html);
            $('.c-bottom-sheet__sheet').css({ "width":"50%","margin-left": "25%", "margin-right":"25%"});
            
            $('#trigger-bottom-sheet').trigger("click");

            $('#modalEmail').on('submit','#formEmail',function(e){
                e.preventDefault();
                var formData = new FormData(this);
                var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style>
                <body style='background:white;'>
                    <div>
                        <div class="card" id="print-area">
                            `+$('#canvasPreview').html()+`
                        </div>
                    </div>
                </body>`;
                formData.append("html",html);
                formData.append("text","Berikut ini kami lampiran Transaksi Jurnal :");
                formData.append("subject","Laporan Transaksi Jurnal ");
                $.ajax({
                    type: 'POST',
                    url: "{{ url('gl-report/send-email-report') }}",
                    dataType: 'json',
                    data: formData,
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    success:function(result){
                        alert(result.data.message);
                        if(result.data.id != undefined){
                            $('.c-bottom-sheet').removeClass('active');
                        }
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
                
            });
            
    });
    
    $('#scroll-bottom').click(function(){
        $('html, body').animate({
            scrollTop: $("#saku-report tbody tr:last").offset().top
        }, 700);
    });

    $('#scroll-top').click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 700);
    });

    $(window).scroll(function() {
        // if($(window).scrollTop() + $(window).height() == $(document).height()) {
        //     alert("bottom!");
        // }else if($(window).scrollTop() == 0){
        //     alert("top!");
        // }
        if($(window).scrollTop() == 0){
            $('#scroll-top').hide();
            $('#scroll-bottom').show();
        }else if($(window).scrollTop() + $(window).height() == $(document).height()){
            $('#scroll-top').show();
            $('#scroll-bottom').hide();
        }
    });

</script>