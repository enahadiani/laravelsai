<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/ccr.dekstop.css') }}" />

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
                    <h2 class="title-dash" id="title-dash">CCR YPT</h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                {{-- <div class="col-3 pr-0 message-div">
                    <img alt="message-icon" class="icon-message" src="{{ asset('dash-asset/dash-ypt/icon/message.svg') }}">
                </div> --}}
                <div class="col-12">
                    <div class="select-custom row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text" class="select-text">September 2021</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
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
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">CCR Keseluruhan</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-all" class="main-nominal">43,0%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-all">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right">138,5 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td>
                                    <td class="text-bold text-right">59,7 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">CCR Tahun Lalu</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-prev" class="main-nominal">12,2%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-prev">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right">138,5 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td>
                                    <td class="text-bold text-right">59,7 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-7">
                        <h4 class="header-card">CCR 2021</h4>
                    </div>
                    <div class="col-5">
                        <h4 class="header-card grey-text">Jan-Aug 21</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-now" class="main-nominal">45,21%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-now">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right">138,5 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td>
                                    <td class="text-bold text-right">59,7 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">CCR Sep'21</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-month" class="main-nominal">89,2%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-month">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right">138,5 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td>
                                    <td class="text-bold text-right">59,7 M</td>
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
        <div class="col-6 pl-12 pr-0">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dash">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Trend CCR</h4>
                            </div>
                        </div>
                        <div id="trend-ccr"></div>
                    </div>
                </div>
                <div class="col-6 pr-0 mt-4">
                    <div class="card card-dash">
                        <div class="row header-div">
                            <div class="col-9 pr-0">
                                <h4 class="header-card">Komposisi Piutang</h4>
                            </div>
                        </div>
                        <div id="komposisi-piutang"></div>
                    </div>
                </div>
                <div class="col-6 pl-1 mt-4">
                    <div class="card card-dash">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Saldo Akhir Piutang</h4>
                            </div>
                        </div>
                        <div id="saldo-akhir" class="mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">CCR Lembaga</h4>
                    </div>
                </div>
                <div id="ccr-lembaga" class="mt-4"></div>
                <table class="table table-borderless table-px-0 table-ml-24">
                    <tbody>
                        <tr>
                            <td>
                                <div class="circle-legend bg-green"></div>
                            </td>
                            <td>CCR > 50%</td>
                            <td>
                                <div class="circle-legend bg-red-100"></div>
                            </td>
                            <td>CCR < 50%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash h-493">
                <div class="row" id="filter-checkbox">
                    <div class="col-12 mt-6">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}
</section>
{{-- END CONTENT MAIN --}}

{{-- END DEKSTOP --}}

<script type="text/javascript">
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

$('.checkbox-input').change(function() {
    var count = $('input.checkbox-input:checked').length;
    var parent = $('input.checkbox-input:checked').parent();
    var judul = $(parent).find('.container-checkbox-filter-text').text()

    if(count > 1 || count == 0) {
        judul = 'YPT'
    }

    $('#title-dash').text('CCR '+ judul)
})

Highcharts.chart('ccr-lembaga', {
    chart: {
        type: 'packedbubble',
        width: 255,
        height: 420
    },
    legend: {
        enabled: false
    },
    credits: { enabled: false },
    exporting: {
        enabled: false
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        point: {
            valueDescriptionFormat: '{index}. {point.name}, fat: {point.x}g, sugar: {point.y}g, obesity: {point.z}%.'
        }
    },
    yAxis: {
        startOnTick: false,
        endOnTick: false,
        title: {
            text: ''
        },
        maxPadding: 0.1,
    },
    tooltip: {
        pointFormat: '{point.name}: <b>{point.x}%</b>'
    },
    plotOptions: {
         packedbubble: {
            minSize: '30%',
            maxSize: '120%',
            zMin: 0,
            zMax: 1000,
            layoutAlgorithm: {
                splitSeries: false,
                gravitationalConstant: 0.02
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}',
                filter: {
                    property: 'y',
                    operator: '>',
                    value: 50
                },
                style: {
                    color: 'white',
                    textOutline: 'none',
                    fontWeight: 'normal'
                }
            }
        }
    },
    series: [{
        name: 'CCR',
        data: [
            { value:55, name: 'TK'},
            { value:60, name: 'SD'},
            { value:70, name: 'AKATEL'},
            { value:80, name: 'ITTP'},
            { value:40, name: 'X'},
            { value:30, name: 'X'},
            { value:30, name: 'X'},
            { value:20, name: 'X'},
        ]
    }]

}, function() {
    var series = this.series
    for(var i=0;i<series.length;i++) {
        var point = series[i].data
        for(var j=0;j<point.length;j++) {
            if(point[j].options.value > 50) {
                point[j].graphic.element.style.fill = '#EE0000'
            } else {
                point[j].graphic.element.style.fill = '#008034'
            }
        }
    }
});

var colors = ['#EEBE00', '#830000'];
Highcharts.chart('komposisi-piutang', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 192,
        width: 270
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting: {
        enabled: false
    },
    legend:{ 
        enabled: true,
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle' 
    },
    credits: { enabled: false },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    colors: colors,
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            center: ['35%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                distance: -30,
                useHTML: true,
                align: 'left',
                formatter: function () { 
                    var color = '#000000'
                    if(this.point.color == '#830000') {
                        color = '#ffffff'
                    } else {
                        color = '#000000'
                    }
                    return $('<div/>').css({
                        'color': color,
                        'font-size': '9px',
                        'backgroundColor' : this.point.color
                    }).text(this.y + '%')[0].outerHTML
                }
            },
            size: '120%',
            showInLegend: true
        },
    },
    series: [{
        name: 'Komposisi',
        colorByPoint: true,
        data: [
            {
                name: 'LEMDIKTI',
                y: 47.7,
            },
            {
                name: 'Telkom School',
                y: 52.3
            }
        ]
    }],
},
function() {
    $('span[data-z-index="1"]').css({'width': '30px'})
    var series = this.series;
    for(var i=0;i<series.length;i++) {
        var point = series[i].data
        for(var j=0;j<point.length;j++) {
            if(point[j].graphic) {
                point[j].graphic.element.style.fill = colors[j]
            }
        }
    }
});

Highcharts.chart('saldo-akhir', {
    chart: {
        type: 'column',
        height: 188,
        width: 250
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
    },
    legend:{  enabled: false },
    credits: { enabled: false },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: {
            style: {
                fontSize: '8px'
            }
        }
    },
    yAxis: {
         title: {
            text: 'Nilai'
        }
    },
    plotOptions: {
        column: {
            grouping: false,
        }
    },
    series: [
        {
            name: 'Nilai',
            data: [4, 3, 7, 6, 5, 5, 6, 10, 9, 5, 3, 2],
            color: '#830000',
        },
    ],
});

Highcharts.chart('trend-ccr', {
    chart: {
        type: 'spline',
        height: 230,
        width: 550
    },
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
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
    },
    yAxis: {
         title: {
            text: ''
        }
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            marker:{
                enabled:false
            }
        }
    },
    series: [
        {
            name: 'Tren',
            data: [20, 18, 16, 14, 12, 10, 25, 23, 21, 18, 16, 14],
            color: '#EEBE00'
        },
    ],
});
</script>