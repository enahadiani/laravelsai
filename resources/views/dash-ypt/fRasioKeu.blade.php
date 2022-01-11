<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/fp2.dekstop.css?version=_').time() }}" />
<script src="{{ asset('main.js?version=_').time() }}"></script>
<script type="text/javascript">
    $('body').addClass('scroll-hide');
    window.scrollTo(0, 0);
    var $tahun = "{{ substr(Session::get('periode'),0,4) }}";
    var $filter1 = "Periode";
    var $filter2 = namaPeriodeBulan("{{ Session::get('periode') }}");
    var $month = "{{ substr(Session::get('periode'),4,2) }}";
    var $filter1_kode = "YTM";
    var $filter2_kode = "{{ substr(Session::get('periode'),4,2) }}";
    var yoyChart = null;

    if($filter1 == 'Periode') {
        $('#list-filter-2').find('.list').each(function() {
            if($(this).data('bulan').toString() == $month) {
                $(this).addClass('selected')
                $month = $(this).data('bulan').toString();
                return false;
            }
        });
    }

    $('#year-filter').text($tahun)
    var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
    $('#select-text-rasio').text(`${nama_filter} ${$filter2} ${$tahun}`)

    // CONFIG FUNCTION
    function showNotification(message) {
        $.notify(
            {
                title: 'Update',
                message: message,
                target: "_blank"
            },
            {
                element: "body",
                position: null,
                type: 'success',
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: 'top',
                    align: 'center'
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 4000,
                timer: 2000,
                url_target: "_blank",
                mouse_over: null,
                animate: {
                    enter: "animated fadeInDown",
                    exit: "animated fadeOutUp"
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: "class",
                template: `<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">
                    <button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>
                    <span data-notify="icon"></span>
                    <span data-notify="title">{1}</span>
                    <span data-notify="message">{2}</span>
                    <div class="progress" data-notify="progressbar">
                        <div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                    </div>
                    <a href="{3}" target="{4}" data-notify="url"></a>
                    </div>`
            }
        );
    }
    // END CONFIG FUNCTION
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

    function getRasioYtd(periode,jenis_rasio,jenis,lokasi,tahun) {
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-ytd') }}",
            dataType: 'JSON',
            data:{'periode[0]':'=','periode[1]':periode,jenis:jenis,lokasi:lokasi,jenis_rasio:jenis_rasio,tahun:tahun},
            success: function(result) {
                if(result.status){
                    // $('#status-rasio-ytd').html(result.status_rasio);
                    $('#rasio-ytd').html(number_format(result.data[tahun+''+periode],2)+'%');
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

    function getRasioYoY(periode,jenis_rasio,jenis,lokasi,tahun) {
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-yoy') }}",
            dataType: 'JSON',
            data:{'periode[0]':'=','periode[1]':periode,jenis:jenis,lokasi:lokasi,jenis_rasio:jenis_rasio,tahun:tahun},
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

    function getYoYChart(periode,jenis_rasio,jenis,lokasi,tahun){
        $.ajax({
            type:'GET',
            url: "{{ url('dash-ypt-dash/data-rasio-tahun') }}",
            dataType: 'JSON',
            data:{'periode[0]':'=','periode[1]':periode,jenis:jenis,lokasi:lokasi,jenis_rasio:jenis_rasio,tahun:tahun},
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
    getRasioYtd($month,"SR01",$filter1_kode,"{{ Session::get('lokasi') }}",$tahun);
    getRasioYoY($month,"SR01",$filter1_kode,"{{ Session::get('lokasi') }}",$tahun);
    getYoYChart($month,"SR01",$filter1_kode,"{{ Session::get('lokasi') }}",$tahun);

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
        getRasioYtd($month,jenis,$filter1_kode,lokasi,$tahun);
        getRasioYoY($month,jenis,$filter1_kode,lokasi,$tahun);
        getYoYChart($month,jenis,$filter1_kode,lokasi,$tahun);
    });

    $('#tambah-tahun').click(function(event) {
        event.stopPropagation();
        $tahun = $tahun + 1;
        $('#year-filter').text($tahun);
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd($month,jenis,$filter1_kode,lokasi,$tahun);
        getRasioYoY($month,jenis,$filter1_kode,lokasi,$tahun);
        getYoYChart($month,jenis,$filter1_kode,lokasi,$tahun);
    });

    $('#custom-row').click(function(event) {
        event.stopPropagation();
        $('#filter-box').removeClass('hidden')
        $('#list-filter-2').find('.list').each(function() {
            if($filter1_kode == 'PRD'){
                if(parseInt($(this).data('bulan')) == parseInt($month)) {
                    $(this).addClass('selected')
                }
            }else{
                if(parseInt($(this).data('bulan')) <= parseInt($month)) {
                    $(this).addClass('selected')
                }
            }
        })
    })

    // MENTRIGGER FILTER 1
    $('#list-filter-1 ul li').click(function(event) {
        event.stopPropagation();
        if(!$(this).hasClass('disabled')){
            var html = '';
            var filter = $(this).text()
            $filter1 = filter
            $filter1_kode = $(this).data('filter1')
            $('#list-filter-1 ul li').not(this).removeClass('selected')
            $(this).addClass('selected')
            $('#list-filter-2').empty()
            var bln = ['01','02','03','04','05','06','07','08','09','10','11','12'];
            for(i=0; i < bln.length; i++){
                if($filter1_kode == 'PRD'){
                    if(parseInt(bln[i]) == parseInt($month)){
                        var selected = 'selected';
                    }else{
                        var selected = '';
                    }
                }else{
                    if(parseInt(bln[i]) <= parseInt($month)){
                        var selected = 'selected';
                    }else{
                        var selected = '';
                    }
                }
                html+=`<div class="col-4 py-2 px-3 cursor-pointer list text-center ${selected}" data-bulan="${bln[i]}" data-filter2="${bln[i]}">
                    <span class="py-2 px-3 d-block">${getNamaBulan(bln[i])}</span>
                </div>`;
            }
            $('#list-filter-2').append(html)
            var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
            $('#select-text-rasio').text(`${nama_filter} ${$filter2} ${$tahun}`)
        }
    })

    $('#list-filter-2').on('click', 'div', function(event) {
        event.stopPropagation();
        console.log('click');
        $month = $(this).data('bulan') 
        
        $filter2 = $month
        $('#list-filter-2 div').not(this).removeClass('selected')
        $(this).addClass('selected')
        $('#filter-box').addClass('hidden')

        $filter2 = getNamaBulan($filter2)

        var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
        $('#select-text-rasio').text(`${nama_filter} ${$filter2} ${$tahun}`);

        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd($month,jenis,$filter1_kode,lokasi,$tahun);
        getRasioYoY($month,jenis,$filter1_kode,lokasi,$tahun);
        getYoYChart($month,jenis,$filter1_kode,lokasi,$tahun);
        showNotification(`Menampilkan dashboard ${nama_filter} ${$filter2} ${$tahun}`);
    });

    $('#filter-checkbox-rasio').on('click','input[type="radio"]',function(){
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var nama_jenis = $("input[name='jenis']:checked").siblings('label').text();
        var lokasi = $("input[name='lokasi']:checked").val();
        getRasioYtd($month,jenis,$filter1_kode,lokasi,$tahun);
        getRasioYoY($month,jenis,$filter1_kode,lokasi,$tahun);
        getYoYChart($month,jenis,$filter1_kode,lokasi,$tahun);
        showNotification(`Menampilkan dashboard ${nama_jenis}`);

    });

    $('#filter-checkbox-lembaga').on('click','input[type="radio"]',function(){
        var periode = $tahun+''+$month;
        var jenis = $("input[name='jenis']:checked").val();
        var lokasi = $("input[name='lokasi']:checked").val();
        var nama_lokasi = $("input[name='lokasi']:checked").siblings('label').text();
        getRasioYtd($month,jenis,$filter1_kode,lokasi,$tahun);
        getRasioYoY($month,jenis,$filter1_kode,lokasi,$tahun);
        getYoYChart($month,jenis,$filter1_kode,lokasi,$tahun);
        showNotification(`Menampilkan dashboard ${nama_lokasi}`);
    });

    var scrollfilter = document.querySelector('#filter-dash');
    var psscrollfilter = new PerfectScrollbar(scrollfilter,{
        suppressScrollX :true
    });

</script>
{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-9 pl-12 pr-0">
            <div class="row">
                <div id="back-div" class="col-1 pr-0 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11 pr-0">
                    <h2 class="title-dash" id="title-dash">Rasio Keuangan</h2>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="row">
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-rasio" class="select-text">Bulan September {{ date('Y') }}</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter-box" class="filter-box border-r-0 hidden">
            <div class="row filter-box-tahun px-3">
                <div class="col-3 pt-8 border-right"></div>
                <div class="col-9 pt-8">
                    <div class="row pr-3">
                        <div class="col-4">
                            <div id="kurang-tahun" class="glyph-icon simple-icon-arrow-left filter-icon cursor-pointer text-center"></div>
                        </div>
                        <div class="col-4 text-center bold" id="year-filter">{{ date('Y') }}</div>
                        <div class="col-4 text-center">
                            <div id="tambah-tahun" class="glyph-icon simple-icon-arrow-right filter-icon cursor-pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row filter-box-periode px-3">
                <div class="col-3 border-right list-filter-1" id="list-filter-1">
                    <ul>
                        <li class="py-2 disabled" data-filter1="YTM" disabled>Year To Month</li>
                        <li class="selected py-2" data-filter1="PRD">Bulan</li>
                    </ul>
                </div>
                <div class="col-9 mt-4 mb-6">
                    <div class="row list-filter-2 pr-3" id="list-filter-2">
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="01" data-filter2="01">
                            <span class="py-2 px-3 d-block">Januari</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="02" data-filter2="02">
                            <span class="py-2 px-3 d-block">Februari</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="03" data-filter2="03">
                            <span class="py-2 px-3 d-block">Maret</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="04" data-filter2="04">
                            <span class="py-2 px-3 d-block">April</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="05" data-filter2="05">
                            <span class="py-2 px-3 d-block">Mei</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="06" data-filter2="06">
                            <span class="py-2 px-3 d-block">Juni</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="07" data-filter2="07">
                            <span class="py-2 px-3 d-block">Juli</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="08" data-filter2="08">
                            <span class="py-2 px-3 d-block">Agustus</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="09" data-filter2="09">
                            <span class="py-2 px-3 d-block">September</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="10" data-filter2="10">
                            <span class="py-2 px-3 d-block">Oktober</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="11" data-filter2="11">
                            <span class="py-2 px-3 d-block">November</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="12" data-filter2="12">
                            <span class="py-2 px-3 d-block">Desember</span>
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
        <div class="col-9 pl-12">
            <div class="row">
                <div class="col-6 pl-12 pr-0">
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
                <div class="col-6 pl-1 pr-0">
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
                <div class="col-12 mt-4 pl-12 pr-0">
                    <div class="card card-dash border-r-0">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Periode 5 Tahun YoY</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <div id="rasio-chart" style="height:calc(100vh - 300px)"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0 h-full" id="filter-dash" style="height:calc(100vh - 160px);">
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