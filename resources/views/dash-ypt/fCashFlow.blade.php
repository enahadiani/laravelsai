<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/cf.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js') }}"></script>
<script type="text/javascript">
var $filter_lokasi = "";
var $tahun = parseInt($('#year-filter').text())
var $filter1 = "Periode";
var $filter2 = "September";
var $month = "09";
var $filter1_kode = "PRD";
var $filter2_kode = "09";
var trendChart = null;

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
});

$('#tambah-tahun').click(function(event) {
    event.stopPropagation();
    $tahun = $tahun + 1;
    $('#year-filter').text($tahun);
});

$('#custom-row').click(function(event) {
    event.stopPropagation();
    $('#filter-box').removeClass('hidden')
});

$('#list-filter-2').on('click', 'div', function(event) {
    event.stopPropagation();
    filter = $(this).data('bulan') 
    
    $filter2 = filter
    $filter2_kode = $(this).data('bulan')
    $('#list-filter-2 div').not(this).removeClass('selected')
    $(this).addClass('selected')
    $('#filter-box').addClass('hidden')

    $filter2 = getNamaBulan($filter2)

    $('#select-text-cf').text(`${$filter2.toUpperCase()} ${$tahun}`)
    getDataBox()
    getCFChart()
    showNotification(`Menampilkan dashboard periode ${$filter2.toUpperCase()} ${$tahun}`);
});

$('.icon-menu').click(function(event) {
    event.stopPropagation()
    var parentID = $(this).parents('.header-div').attr('id')
    $('#'+parentID).find('.menu-chart-custom').removeClass('hidden')

    if(parentID == 'card-piutang' || parentID == 'card-soakhir') {
        $("body").css("overflow", "scroll");
    } else {
        $("body").css("overflow", "hidden");
    }
});

// RUN FUNC IF FIRST RENDER
// DATA BOX
(function() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-box') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            var inflow = 0;
            var outflow = 0;
            var balance = 0;
            var closing = 0;
            var inflow_yoy = 0;
            var outflow_yoy = 0;
            var balance_yoy = 0;
            var closing_yoy = 0;

            if(data.inflow.nominal.toString().length <= 9) {
                inflow = toJuta(data.inflow.nominal,2)
            } else {
                inflow = toMilyar(data.inflow.nominal,2)
            }

            if(data.inflow.yoy.toString().length <= 9) {
                inflow_yoy = toJuta(data.inflow.yoy,2)
            } else {
                inflow_yoy = toMilyar(data.inflow.yoy,2)
            }

            var per_inflow_yoy = (data.inflow.yoy != 0 ? (data.inflow.nominal - data.inflow.yoy)/ data.inflow.yoy : 0) * 100;
                        

            if(data.outflow.nominal.toString().length <= 9) {
                outflow = toJuta(data.outflow.nominal,2)
            } else {
                outflow = toMilyar(data.outflow.nominal,2)
            }

            if(data.outflow.yoy.toString().length <= 9) {
                outflow_yoy = toJuta(data.outflow.yoy,2)
            } else {
                outflow_yoy = toMilyar(data.outflow.yoy,2)
            }
            
            var per_outflow_yoy = (data.outflow.yoy != 0 ? (data.outflow.nominal - data.outflow.yoy)/ data.outflow.yoy : 0) * 100;
            

            if(data.cash_balance.nominal.toString().length <= 9) {
                balance = toJuta(data.cash_balance.nominal,2)
            } else {
                balance = toMilyar(data.cash_balance.nominal,2)
            }
            
            if(data.cash_balance.yoy.toString().length <= 9) {
                balance_yoy = toJuta(data.cash_balance.yoy,2)
            } else {
                balance_yoy = toMilyar(data.cash_balance.yoy,2)
            }
            var per_balance_yoy = (data.cash_balance.yoy != 0 ? (data.cash_balance.nominal - data.cash_balance.yoy)/ data.cash_balance.yoy : 0) * 100;

            if(data.closing.nominal.toString().length <= 9) {
                closing = toJuta(data.closing.nominal,2)
            } else {
                closing = toMilyar(data.closing.nominal,2)
            }

            if(data.closing.yoy.toString().length <= 9) {
                closing_yoy = toJuta(data.closing.yoy,2)
            } else {
                closing_yoy = toMilyar(data.closing.yoy,2)
            }

            var per_closing_yoy = (data.closing.yoy != 0 ? (data.closing.nominal - data.closing.yoy)/ data.closing.yoy : 0) * 100;

            $('#cf-inflow').text(inflow)
            $('#cf-outflow').text(outflow)
            $('#cf-balance').text(balance)
            $('#cf-closing').text(closing)
            
            $('#cf-inflow-yoy').text(inflow_yoy)
            $('#cf-outflow-yoy').text(outflow_yoy)
            $('#cf-balance-yoy').text(balance_yoy)
            $('#cf-closing-yoy').text(closing_yoy)

            if(per_inflow_yoy < 0){
                $('#inflow-yoy-percentage').html(number_format(per_inflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#inflow-yoy-percentage').addClass('red-text');
                $('#inflow-yoy-percentage').removeClass('green-text');
            }else{
                $('#inflow-yoy-percentage').html(number_format(per_inflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#inflow-yoy-percentage').addClass('green-text');
                $('#inflow-yoy-percentage').removeClass('red-text');
            }
            if(per_outflow_yoy < 0){
                $('#outflow-yoy-percentage').html(number_format(per_outflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#outflow-yoy-percentage').addClass('red-text');
                $('#outflow-yoy-percentage').removeClass('green-text');
            }else{
                $('#outflow-yoy-percentage').html(number_format(per_outflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#outflow-yoy-percentage').addClass('green-text');
                $('#outflow-yoy-percentage').removeClass('red-text');
            }
            if(per_balance_yoy < 0){
                $('#balance-yoy-percentage').html(number_format(per_balance_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#balance-yoy-percentage').addClass('red-text');
                $('#balance-yoy-percentage').removeClass('green-text');
            }else{
                $('#balance-yoy-percentage').html(number_format(per_balance_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#balance-yoy-percentage').addClass('green-text');
                $('#balance-yoy-percentage').removeClass('red-text');
            }
            if(per_closing_yoy < 0){
                $('#closing-yoy-percentage').html(number_format(per_closing_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#closing-yoy-percentage').addClass('red-text');
                $('#closing-yoy-percentage').removeClass('green-text');
            }else{
                $('#closing-yoy-percentage').html(number_format(per_closing_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#closing-yoy-percentage').addClass('green-text');
                $('#closing-yoy-percentage').removeClass('red-text');
            }
        }
    });
})();
// END DATA BOX
// CF CHART
(function() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-chart-bulanan') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            trendChart = Highcharts.chart('trend-chart', {
                chart: {
                    height: 450,
                    // width: 600
                },
                title: { text: '' },
                subtitle: { text: '' },
                exporting:{ 
                    enabled: false
                },
                legend:{ 
                    enabled: true,
                    // layout: 'vertical',
                    // align: 'right',
                    verticalAlign: 'bottom' 
                },
                credits: { enabled: false },
                xAxis: {
                    categories: data.kategori
                },
                yAxis: {
                    title: {
                        text: 'Nilai'
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                tooltip: {
                    formatter: function () {   
                        return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + number_format(this.y,2);
                    }
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        marker:{
                            enabled:false
                        },
                    }
                },
                series: data.series
            });
        }
    });
})();
// END CF CHART
// END RUN FUNC IF FIRST RENDER

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

// UPDATE DATA
// RUN FUNC IF FIRST RENDER
// DATA BOX
function getDataBox(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-box') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            var inflow = 0;
            var outflow = 0;
            var balance = 0;
            var closing = 0;
            var inflow_yoy = 0;
            var outflow_yoy = 0;
            var balance_yoy = 0;
            var closing_yoy = 0;

            if(data.inflow.nominal.toString().length <= 9) {
                inflow = toJuta(data.inflow.nominal,2)
            } else {
                inflow = toMilyar(data.inflow.nominal,2)
            }

            if(data.inflow.yoy.toString().length <= 9) {
                inflow_yoy = toJuta(data.inflow.yoy,2)
            } else {
                inflow_yoy = toMilyar(data.inflow.yoy,2)
            }

            var per_inflow_yoy = (data.inflow.yoy != 0 ? (data.inflow.nominal - data.inflow.yoy)/ data.inflow.yoy : 0) * 100;
                        

            if(data.outflow.nominal.toString().length <= 9) {
                outflow = toJuta(data.outflow.nominal,2)
            } else {
                outflow = toMilyar(data.outflow.nominal,2)
            }

            if(data.outflow.yoy.toString().length <= 9) {
                outflow_yoy = toJuta(data.outflow.yoy,2)
            } else {
                outflow_yoy = toMilyar(data.outflow.yoy,2)
            }
            
            var per_outflow_yoy = (data.outflow.yoy != 0 ? (data.outflow.nominal - data.outflow.yoy)/ data.outflow.yoy : 0) * 100;
            

            if(data.cash_balance.nominal.toString().length <= 9) {
                balance = toJuta(data.cash_balance.nominal,2)
            } else {
                balance = toMilyar(data.cash_balance.nominal,2)
            }
            
            if(data.cash_balance.yoy.toString().length <= 9) {
                balance_yoy = toJuta(data.cash_balance.yoy,2)
            } else {
                balance_yoy = toMilyar(data.cash_balance.yoy,2)
            }
            var per_balance_yoy = (data.cash_balance.yoy != 0 ? (data.cash_balance.nominal - data.cash_balance.yoy)/ data.cash_balance.yoy : 0) * 100;

            if(data.closing.nominal.toString().length <= 9) {
                closing = toJuta(data.closing.nominal,2)
            } else {
                closing = toMilyar(data.closing.nominal,2)
            }

            if(data.closing.yoy.toString().length <= 9) {
                closing_yoy = toJuta(data.closing.yoy,2)
            } else {
                closing_yoy = toMilyar(data.closing.yoy,2)
            }

            var per_closing_yoy = (data.closing.yoy != 0 ? (data.closing.nominal - data.closing.yoy)/ data.closing.yoy : 0) * 100;

            $('#cf-inflow').text(inflow)
            $('#cf-outflow').text(outflow)
            $('#cf-balance').text(balance)
            $('#cf-closing').text(closing)
            
            $('#cf-inflow-yoy').text(inflow_yoy)
            $('#cf-outflow-yoy').text(outflow_yoy)
            $('#cf-balance-yoy').text(balance_yoy)
            $('#cf-closing-yoy').text(closing_yoy)

            if(per_inflow_yoy < 0){
                $('#inflow-yoy-percentage').html(number_format(per_inflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#inflow-yoy-percentage').addClass('red-text');
                $('#inflow-yoy-percentage').removeClass('green-text');
            }else{
                $('#inflow-yoy-percentage').html(number_format(per_inflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#inflow-yoy-percentage').addClass('green-text');
                $('#inflow-yoy-percentage').removeClass('red-text');
            }
            if(per_outflow_yoy < 0){
                $('#outflow-yoy-percentage').html(number_format(per_outflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#outflow-yoy-percentage').addClass('red-text');
                $('#outflow-yoy-percentage').removeClass('green-text');
            }else{
                $('#outflow-yoy-percentage').html(number_format(per_outflow_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#outflow-yoy-percentage').addClass('green-text');
                $('#outflow-yoy-percentage').removeClass('red-text');
            }
            if(per_balance_yoy < 0){
                $('#balance-yoy-percentage').html(number_format(per_balance_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#balance-yoy-percentage').addClass('red-text');
                $('#balance-yoy-percentage').removeClass('green-text');
            }else{
                $('#balance-yoy-percentage').html(number_format(per_balance_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#balance-yoy-percentage').addClass('green-text');
                $('#balance-yoy-percentage').removeClass('red-text');
            }
            if(per_closing_yoy < 0){
                $('#closing-yoy-percentage').html(number_format(per_closing_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">')
                $('#closing-yoy-percentage').addClass('red-text');
                $('#closing-yoy-percentage').removeClass('green-text');
            }else{
                $('#closing-yoy-percentage').html(number_format(per_closing_yoy,2)+'%'+'&nbsp;<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">')
                $('#closing-yoy-percentage').addClass('green-text');
                $('#closing-yoy-percentage').removeClass('red-text');
            }        
        }
    });
}
// END DATA BOX
// CF CHART
function getCFChart() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-chart-bulanan') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            trendChart = Highcharts.chart('trend-chart', {
                chart: {
                    height: 450,
                    // width: 600
                },
                title: { text: '' },
                subtitle: { text: '' },
                exporting:{ 
                    enabled: false
                },
                legend:{ 
                    enabled: true,
                    // layout: 'vertical',
                    // align: 'right',
                    verticalAlign: 'bottom' 
                },
                credits: { enabled: false },
                xAxis: {
                    categories: data.kategori
                },
                yAxis: {
                    title: {
                        text: 'Nilai'
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                tooltip: {
                    formatter: function () {   
                        return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + number_format(this.y,2);
                    }
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        marker:{
                            enabled:false
                        },
                    }
                },
                series: data.series
            });
        }
    });
}
// END CF CHART
// END RUN FUNC IF FIRST RENDER
// 


// EXPORT HIGHCHART EVENT
$('#export-trend.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-trend').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        trendChart.update({
            title: {
                text: `Trend Cash Flow`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        trendChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        trendChart.print()
    } else if(jenis == 'Download PNG image') {
        trendChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Trend Cash Flow`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        trendChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Trend Cash Flow`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        trendChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Trend Cash Flow`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        trendChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Trend Cash Flow`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        trendChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})
// END EXPORT HIGHCHART EVENT
</script>

{{-- DEKSTOP --}}

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-8 pl-12">
            <div class="row">
                <div id="back-div" class="col-1 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11">
                    <h2 class="title-dash" id="title-dash">Cash Flow</h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
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
        <div class="col-3 pl-12 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Inflow</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-inflow" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-inflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">YoY</td>
                                    <td id="cf-inflow-yoy">0 M</td>
                                    <td id="inflow-yoy-percentage" class="green-text pr-0">
                                        0%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Outflow</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-outflow" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-outflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">YoY</td>
                                    <td id="cf-outflow-yoy">0 M</td>
                                    <td id="outflow-yoy-percentage" class="red-text pr-0">
                                        0%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Cash Balance</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-balance" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-balance">
                            <tbody>
                                <tr>
                                    <td class="w-10">&nbsp;YoY</td>
                                    <td id="cf-balance-yoy">0 M</td>
                                    <td id="balance-yoy-percentage" class="red-text pr-0">
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Closing Cash Balance</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-closing" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-outflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">YoY</td>
                                    <td id="cf-closing-yoy">0 M</td>
                                    <td id="closing-yoy-percentage" class="green-text pr-0">
                                        0%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 1 --}}

    {{-- ROW 2 --}}
    <div id="dekstop-2" class="row dekstop mt-4">
        <div class="col-12 pl-12 pr-0">
            <div class="card card-dash border-r-0" id="dash-trend">
                <div class="row header-div" id="card-trend">
                    <div class="col-8">
                        <h4 class="header-card">Trend Cash Flow</h4>
                    </div>
                    <div class="col-4">
                        <div class="row justify-content-end">
                            <div class="col-4 pr-0">
                                <label class="label-checkbox float-right">
                                    <input type="radio" checked="checked" name="trend">
                                    <span class="text">Bulanan</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-3 pr-0">
                                <label class="label-checkbox float-right">
                                    <input type="radio" name="trend">
                                    <span class="text">Harian</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-2">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                        </div>
                        <div class="menu-chart-custom hidden" id="export-trend">
                            <ul>
                                <li class="menu-chart-item fullscreen">View in full screen</li>
                                <li class="menu-chart-item print">Print chart</li>
                                <hr>
                                <li class="menu-chart-item print png">Download PNG image</li>
                                <li class="menu-chart-item print jpg">Download JPEG image</li>
                                <li class="menu-chart-item print pdf">Download PDF document</li>
                                <li class="menu-chart-item print svg">Download SVG vector image</li>
                                <li class="menu-chart-item print svg">View table data</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="trend-chart"></div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}
</section>
{{-- END CONTENT MAIN --}}
