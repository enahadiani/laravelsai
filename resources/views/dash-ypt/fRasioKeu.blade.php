<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/fp2.dekstop.css?version=_').time() }}" />
<script src="{{ asset('main.js') }}"></script>
<script type="text/javascript">
    $('body').addClass('scroll-hide');
    var $tahun = parseInt($('#year-filter').text());
    var $filter1 = "Periode";
    var $filter2 = getNamaBulan("{{ Session::get('periode') }}".substr(4,2));
    var $month = "{{ Session::get('periode') }}".substr(4,2);
    var yoyChart = null;

    function getJenis() {
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-jenis') }}",
            dataType: 'JSON',
            success: function(result) {
                $('#filter-checkbox-rasio').html('');
                var html = `<div class="col-12 mb-6">
                        <h4 class="header-card">Jenis Rasio</h4>
                    </div>`;
                if(result.status){
                    if(typeof result.data == 'object' && result.data.length > 0){
                        for(var i=0; i < result.data.length; i++){
                            var line = result.data[i];
                            if(i == 0){
                                var check = "checked";
                            }else{
                                var check = "";
                            }
                            html +=`
                            <div class="col-12 mt-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="`+line.kode_rasio+`" name="jenis" class="custom-control-input" `+check+` value="`+line.kode_rasio+`">
                                    <label class="custom-control-label" for="`+line.kode_rasio+`">`+line.nama+`</label>
                                </div>
                            </div>`;
                        }
                    }
                }else{
                    alert(JSON.stringify(result.message));
                }
                $('#filter-checkbox-rasio').html(html);
            }
        });
    }

    function getLembaga() {
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-lembaga') }}",
            dataType: 'JSON',
            success: function(result) {
                $('#filter-checkbox-lembaga').html('');
                var html = `<div class="col-12 mb-6">
                        <h4 class="header-card">Lembaga</h4>
                    </div>`;
                if(result.status){
                    if(typeof result.data == 'object' && result.data.length > 0){
                        for(var i=0; i < result.data.length; i++){
                            var line = result.data[i];
                            if(line.kode_lokasi == "{{ Session::get('lokasi') }}"){
                                var check = "checked";
                            }else{
                                var check = "";
                            }
                            html +=`
                            <div class="col-12 mt-6">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="`+line.kode_lokasi+`" name="lokasi" class="custom-control-input" `+check+` value="`+line.kode_lokasi+`">
                                    <label class="custom-control-label" for="`+line.kode_lokasi+`">`+line.skode+`</label>
                                </div>
                            </div>`;
                        }
                    }
                }else{
                    alert(JSON.stringify(result.message));
                }
                $('#filter-checkbox-lembaga').html(html);
            }
        });
    }

    function getRasioYtd(periode,jenis,lokasi) {
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-ytd') }}",
            dataType: 'JSON',
            data:{periode:periode,jenis:jenis,lokasi:lokasi},
            success: function(result) {
                if(result.status){
                    // $('#status-rasio-ytd').html(result.status_rasio);
                    $('#rasio-ytd').html(number_format(result.data[periode],2)+'%');
                    // if(result.status_rasio == 'Naik'){
                    //     $('#status-rasio-ytd').removeClass('red-text')
                    //     $('#status-rasio-ytd').addClass('green-text')
                    // }else{
                        
                    //     $('#status-rasio-ytd').removeClass('green-text')
                    //     $('#status-rasio-ytd').addClass('red-text')
                    // }
                }else{
                    // alert(JSON.stringify(result.message));
                    $('#status-rasio-ytd').html('-');
                    $('#rasio-ytd').html('0 x');
                }
                
            }
        });
    }

    function getRasioYoY(periode,jenis,lokasi) {
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-yoy') }}",
            dataType: 'JSON',
            data:{periode:periode,jenis:jenis,lokasi:lokasi},
            success: function(result) {
                if(result.status){
                    $('#rasio-selisih').html(number_format(result.kenaikan,2)+'%');
                    if(result.status_rasio == 'Naik'){
                        $('#status-rasio-selisih').html('<i class="simple-icon-arrow-up-circle"></i>');
                        $('#status-rasio-selisih').removeClass('red-text')
                        $('#status-rasio-selisih').addClass('green-text')
                        $('#rasio-selisih').removeClass('red-text')
                        $('#rasio-selisih').removeClass('red-text-700')
                        $('#rasio-selisih').addClass('green-text')
                    }
                    else if(result.status_rasio == 'Tetap'){
                        $('#status-rasio-selisih').html('')
                        $('#rasio-selisih').removeClass('red-text')
                        $('#rasio-selisih').removeClass('red-text-700')
                        $('#rasio-selisih').removeClass('green-text')
                    }else{
                        $('#status-rasio-selisih').html('<i class="simple-icon-arrow-down-circle"></i>');
                        $('#status-rasio-selisih').removeClass('green-text')
                        $('#status-rasio-selisih').addClass('red-text')
                        $('#rasio-selisih').removeClass('red-text-700')
                        $('#rasio-selisih').removeClass('green-text')
                        $('#rasio-selisih').addClass('red-text')
                    }
                }else{
                    // alert(JSON.stringify(result.message));
                    $('#status-rasio-selisih').html('-');
                    $('#rasio-selisih').html('0%');
                }
                
            }
        });
    }

    function getYoYChart(periode,jenis,lokasi){
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-tahun') }}",
            dataType: 'JSON',
            data:{periode:periode,jenis:jenis,lokasi:lokasi},
            success: function(result) {
                yoyChart = Highcharts.chart('rasio-chart', {
                    // chart: {
                    //     height: 360
                    // },
                    title: { text: '' },
                    subtitle: { text: '' },
                    exporting:{ 
                        enabled: false
                    },
                    legend:{ 
                        enabled: false
                    },
                    credits: { enabled: false },
                    xAxis: {
                        categories: result.ctg
                    },
                    yAxis: {
                        title: {
                            text: 'Nilai'
                        }
                    },
                    tooltip: {
                        formatter: function () {   
                            return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + number_format(this.y,2);
                        }
                    },
                    plotOptions: {
                        series: {
                            dataLabels: {
                                // padding:10,
                                allowOverlap:true,
                                enabled: true,
                                crop: false,
                                overflow: 'justify',
                                useHTML: true,
                                formatter: function () {
                                    return number_format(this.y,2);
                                }
                            },
                            label: {
                                connectorAllowed: false
                            },
                            marker:{
                                enabled:false
                            },
                        }
                    },
                    series: [
                        {
                            name: 'Nilai',
                            data: result.series,
                            color: '#830000'
                        },
                    ],
                });
            }
        });
    }

    getJenis();
    getLembaga();
    getRasioYtd("{{ Session::get('periode') }}","SR01","{{ Session::get('lokasi') }}");
    getRasioYoY("{{ Session::get('periode') }}","SR01","{{ Session::get('lokasi') }}");
    getYoYChart("{{ Session::get('periode') }}","SR01","{{ Session::get('lokasi') }}");

    if($filter1 == 'Periode') {
        $('#list-filter-2').find('.list').each(function() {
            if($(this).data('bulan').toString() == $month) {
                $(this).addClass('selected')
                $month = $(this).data('bulan').toString();
                return false;
            }
        });
    }

    $('#select-text-cf').text(`${$filter2.toUpperCase()} ${$tahun}`);

    $(window).on('resize', function(){
        var win = $(this); //this = window
        if (win.height() == 800) { 
            $("body").css("overflow", "hidden");
        }
        if (win.height() > 800) { 
            $("body").css("overflow", "scroll");
        }
        if (win.height() < 800) { 
            $("body").css("overflow", "scroll");
        }
    });

    $(window).click(function() {
        $('.menu-chart-custom').addClass('hidden');
        if($(window).height() == 800) {
            $("body").css("overflow", "hidden");
        }
        if($(window).height() > 800) {
            $("body").css("overflow", "scroll");
        }
        if($(window).height() < 800) {
            $("body").css("overflow", "scroll");
        }
    });

    document.addEventListener('fullscreenchange', (event) => {
    if (document.fullscreenElement) {
        console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
    } else {
        trendChart.update({
            title: {
                text: ''
            }
        })
        console.log('Leaving full-screen mode.');
    }
    });

    $('#kurang-tahun').click(function(event) {
        event.stopPropagation();
        $tahun = $tahun - 1;
        $('#year-filter').text($tahun);
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd(periode,jenis,lokasi);
        getRasioYoY(periode,jenis,lokasi);
        getYoYChart(periode,jenis,lokasi);
    });

    $('#tambah-tahun').click(function(event) {
        event.stopPropagation();
        $tahun = $tahun + 1;
        $('#year-filter').text($tahun);
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd(periode,jenis,lokasi);
        getRasioYoY(periode,jenis,lokasi);
        getYoYChart(periode,jenis,lokasi);
    });

    $('#custom-row').click(function(event) {
        event.stopPropagation();
        $('#filter-box').removeClass('hidden')
    });

    $('#list-filter-2').on('click', 'div', function(event) {
        event.stopPropagation();
        console.log('click');
        $month = $(this).data('bulan') 
        
        $filter2 = $month
        $('#list-filter-2 div').not(this).removeClass('selected')
        $(this).addClass('selected')

        $filter2 = getNamaBulan($filter2)

        $('#select-text-cf').text(`${$filter2.toUpperCase()} ${$tahun}`)
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd(periode,jenis,lokasi);
        getRasioYoY(periode,jenis,lokasi);
        getYoYChart(periode,jenis,lokasi);
    });

    $('#filter-checkbox-rasio').on('click','input[type="radio"]',function(){
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd(periode,jenis,lokasi);
        getRasioYoY(periode,jenis,lokasi);
        getYoYChart(periode,jenis,lokasi);
    });

    $('#filter-checkbox-lembaga').on('click','input[type="radio"]',function(){
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd(periode,jenis,lokasi);
        getRasioYoY(periode,jenis,lokasi);
        getYoYChart(periode,jenis,lokasi);
    });

    var scrollfilter = document.querySelector('#filter-dash');
    var psscrollfilter = new PerfectScrollbar(scrollfilter,{
        suppressScrollX :true
    });

</script>
{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-8 pl-12">
            <div class="row">
                <div id="back-div" class="col-1 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11">
                    <h2 class="title-dash" id="title-dash">Rasio Keuangan</h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                {{-- <div class="col-3 pr-0 message-div">
                    <img alt="message-icon" class="icon-message" src="{{ asset('dash-asset/dash-ypt/icon/message.svg') }}">
                </div> --}}
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-cf" class="select-text">September 2021</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter-box" class="filter-box border-r-0 hidden">
            <div class="row justify-content-end">
                <div class="col-7 pt-8 pr-0">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <div id="kurang-tahun" class="glyph-icon simple-icon-arrow-left filter-icon cursor-pointer"></div>
                        </div>
                        <div class="col-4 -mt-5 pl-0 pr-0" id="year-filter">{{ date('Y') }}</div>
                        <div class="col-4 pl-0">
                            <div id="tambah-tahun" class="glyph-icon simple-icon-arrow-right filter-icon cursor-pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5 list-filter-1" id="list-filter-1">
                    <ul>
                        <li class="selected">Periode</li>
                    </ul>
                </div>
                <div class="col-7 mt-4 mb-6">
                    <div class="row list-filter-2" id="list-filter-2">
                        <div class="col-5 py-3 cursor-pointer list" data-bulan="01">
                            Januari
                        </div>
                        <div class="col-5 ml-8 py-3 cursor-pointer list" data-bulan="02">
                            Februari
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="03">
                            Maret
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="04">
                            April
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="05">
                            Mei
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="06">
                            Juni
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="07">
                            Juli
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="08">
                            Agustus
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="09">
                            September
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="10">
                            Oktober
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="11">
                            November
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="12">
                            Desember
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END HEADER --}}

{{-- CONTENT MAIN --}}
<section id="main-dash" class="mt-20 pb-24">
    {{-- ROW 1 --}}
    <div id="dekstop-1" class="row dekstop">
        <div class="col-9 pl-12 pr-0">
            <div class="row">
                <div class="col-6 pr-0">
                    <div class="card card-dash border-r-0">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Rasio Year To Date</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-3 mb-16 align-self-end">
                                <h6 class="green-text font-medium mb-0" id="status-rasio-ytd"></h6>
                            </div>
                            <div class="col-9 mb-16">
                                <h3 class="red-text-700 mb-0 text-right lh-1" id="rasio-ytd"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card card-dash border-r-0">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Selisih YoY</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-3 mb-16 align-self-end">
                                <h6 class="red-text font-medium mb-0" id="status-rasio-selisih"></h6>
                            </div>
                            <div class="col-9 mb-16">
                                <h3 class="red-text-700 mb-0 text-right lh-1" id="rasio-selisih"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-20">
                    <div class="card card-dash border-r-0">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Periode 5 Tahun YoY</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <div id="rasio-chart" style="height:calc(100vh - 320px)"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pr-0">
            <div class="card card-dash border-r-0 h-full" id="filter-dash" style="height:calc(100vh - 163px);">
                <div class="row mb-16" id="filter-checkbox-rasio">
                    <div class="col-12 mb-6">
                        <h4 class="header-card">Jenis Rasio</h4>
                    </div>
                    {{-- <div class="col-12 mt-6">
                        <label class="container-checkbox-filter">
                            <input type="checkbox" name="jenis[]" class="checkbox-input" value="rs1" checked>
                            <span class="checkmark"></span>
                            <span class="container-checkbox-filter-text">Rasio 1</span>
                        </label>
                    </div>
                    <div class="col-12 mt-6">
                        <label class="container-checkbox-filter">
                            <input type="checkbox" name="jenis[]" class="checkbox-input" value="rs2" checked>
                            <span class="checkmark"></span>
                            <span class="container-checkbox-filter-text">Rasio 2</span>
                        </label>
                    </div>
                    <div class="col-12 mt-6">
                        <label class="container-checkbox-filter">
                            <input type="checkbox" name="jenis[]" class="checkbox-input" value="rs3" checked>
                            <span class="checkmark"></span>
                            <span class="container-checkbox-filter-text">Rasio 3</span>
                        </label>
                    </div> --}}
                </div>
                <div class="row" id="filter-checkbox-lembaga">
                    <div class="col-12 mb-6">
                        <h4 class="header-card">Lembaga</h4>
                    </div>
                    {{-- <div class="col-12 mt-6">
                        <label class="container-checkbox-filter">
                            <input type="checkbox" name="instansi[]" class="checkbox-input" checked>
                            <span class="checkmark"></span>
                            <span class="container-checkbox-filter-text">Lembaga</span>
                        </label>
                    </div>
                    <div class="col-12 mt-6">
                        <label class="container-checkbox-filter">
                            <input type="checkbox" name="instansi[]" class="checkbox-input" checked>
                            <span class="checkmark"></span>
                            <span class="container-checkbox-filter-text">Telkom School</span>
                        </label>
                    </div>
                    <div class="col-12 mt-6">
                        <label class="container-checkbox-filter">
                            <input type="checkbox" name="instansi[]" class="checkbox-input" checked>
                            <span class="checkmark"></span>
                            <span class="container-checkbox-filter-text">LEMDIKTI</span>
                        </label>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 1 --}}
</section>
{{-- END CONTENT MAIN --}}