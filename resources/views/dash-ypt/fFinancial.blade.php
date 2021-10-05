<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/fp.dekstop.css') }}" />

{{-- DESKTOP --}}

<section id="header" class="header">
    <div class="row">
        <div class="col-9">
            <div class="row">
                <div class="col-1">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div class="col-11 pl-0">
                    <h2 class="title-dash" id="title-dash">Financial Performance YPT</h2>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="select-custom row">
                <div class="col-2">
                    <div class="glyph-icon simple-icon-calendar select"></div>
                </div>
                <div class="col-8">
                    <p id="select-text" class="select-text">TRIWULAN I || 2021</p>
                </div>
                <div class="col-2">
                    <div class="glyph-icon iconsminds-arrow-down select"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="main-dash" class="mt-24 pb-24">
    <div id="dekstop-1" class="desktop-1 col-dekstop">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dash" id="pdpt-box">
                            <span class="header-card">Pendapatan</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="pendapatan-value" class="main-nominal">945,6 M</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>998,2 M</td>
                                                <td id="pdpt-rka-percentage" class="green-text">94,7%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>997,2 M</td>
                                                <td id="pdpt-yoy-percentage" class="red-text">-5,5%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">Beban</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="beban-value" class="main-nominal">868,2 M</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>867 M</td>
                                                <td id="beban-rka-percentage" class="red-text">100,1%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>851,3 M</td>
                                                <td id="beban-yoy-percentage" class="red-text">-1,9%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-dash">
                    <span class="header-card">Laba Rugi Lembaga</span>
                    <div id="lr-chart"></div>
                </div>
            </div>
            <div class="col-3 px-0">
                <div class="card card-dash h-292">
                    <span class="header-card">Catatan</span>
                    <div id="catatan-text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in mollis lorem. 
                        Sed cursus luctus pharetra. Suspendisse potenti. Praesent nisi neque, 
                        aliquam non justo nec, iaculis mollis tellus. Praesent ornare ex vel aliquet luctus. 
                        Morbi venenatis metus vel lacus bibendum, non fringilla urna auctor.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dekstop-2" class="desktop-2 col-dekstop mt-16">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dash">
                            <span class="header-card">SHU</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="shu-value" class="main-nominal">77,4 M</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>131,2 M</td>
                                                <td id="shu-rka-percentage" class="green-text">59,0%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>146,4 M</td>
                                                <td id="shu-yoy-percentage" class="red-text">-89,1%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-16">
                        <div class="card card-dash">
                            <span class="header-card">OR</span>
                            <div class="row">
                                <div class="col-12">
                                    <p id="or-value" class="main-nominal">91,8%</p>
                                </div>
                                <div class="col-12">
                                    <table class="table table-borderless table-no-padding">
                                        <tbody>
                                            <tr>
                                                <td class="pl-0">RKA</td>
                                                <td>86,9%</td>
                                                <td id="or-rka-percentage" class="red-text">4,9%</td>
                                            </tr>
                                            <tr>
                                                <td class="pl-0">YoY</td>
                                                <td>85,3%</td>
                                                <td id="or-yoy-percentage" class="red-text">-6,5%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 pr-0">
                <div class="card card-dash">
                    <span class="header-card">Performasi Lembaga</span>
                    <table id="table-lembaga" class="table table-bordered table-th-red">
                        <thead>
                            <tr>
                                <th rowspan="2">&nbsp;</th>
                                <th colspan="2" class="text-center">Pendapatan</th>
                                <th colspan="2" class="text-center">Beban</th>
                                <th colspan="2" class="text-center">SHU</th>
                                <th colspan="2" class="text-center">OR</th>
                            </tr>
                            <tr>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY Growth</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="kode hidden">TS</p>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    Telkom School
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="kode hidden">ITTP</p>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    ITTP
                                </td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="kode hidden">ITTS</p>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    ITTS
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="kode hidden">AKATEL</p>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    AKATEL
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td class="td-red">90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="kode hidden">TELU</p>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    TelU
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="kode hidden">LAKHAR</p>
                                    <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                                    Lakhar
                                </td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                                <td>90%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="detail-dash-1" class="mt-24 pb-24" style="display: none;">
    <div id="dekstop-3" class="desktop-3 col-dekstop">
        <div class="row">
            <div class="col-7">
                <div class="card card-dash">
                    <span class="header-card">Performasi Lembaga</span>
                </div>
            </div>
            <div class="col-5 pr-0">
                <div class="card card-dash">
                    <span class="header-card">Pendapatan Per Lembaga</span>
                    <div id="lembaga-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="dekstop-4" class="desktop-4 col-dekstop mt-16">
        <div class="row">
            <div class="col-7">
                <div class="card card-dash">
                    <span class="header-card">Kelompok Pendapatan YoY</span>
                    <div id="yoy-chart"></div>
                </div>
            </div>
            <div class="col-5 pr-0">
                <div class="card card-dash">
                    <span class="header-card">Pendapatan Per Akun</span>
                    <div id="akun-chart"></div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END DESKTOP --}}

<script type="text/javascript">
$('#back').click(function() {
    $('#app-container').removeClass('main-hidden sub-hidden');
})

$('#pdpt-box').click(function() {
    $('#title-dash').text('Pendapatan')
    $('#back').attr('id', 'back-to-main')
    $('#main-dash').hide()
    $('#detail-dash-1').show()
});

$('#header').on('click', '#back-to-main', function() {
    $('#title-dash').text('Financial Performance YPT')
    $(this).attr('id', 'back')
    $('#detail-dash-1').hide()
    $('#main-dash').show()
});

$('#table-lembaga tbody tr').on('click', 'td:first-child', function() {
    var table = $(this).parents('table').attr('id')
    var tr = $(this).parent()
    var icon = $(this).children('.check-row')
    var kode = $(this).children('.kode').text()
    var check = $(tr).attr('class')
    
    if(check == 'selected-row') {
        return;
    }

    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()

    setTimeout(function() {
        $(tr).addClass('selected-row')
        $(icon).show()
    }, 200)
})

$('#table-lembaga tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
})

var renderSVG = Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
};

Highcharts.chart('lr-chart', {
    chart: {
        height: 250
    },
    credits:{
        enabled:false
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['TS', 'ITTP', 'ITTS', 'AKATEL', 'TelU', 'Lakhar'], 
    },
    yAxis: {
        title: '',
        min: 0
    },
    tooltip: {
        formatter: function () {   
            var tmp = this.x.split("|");   
            return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + sepNum(this.y);
        }
    },
    series: [
        {
            name: 'Pendapatan',
            color: '#b91c1c',
            type: 'column',
            data: [60, 30, 20, 15, 80, 50]
        },
        {
            name: 'Beban',
            color: '#064E3B',
            type: 'column',
            data: [50, 20, 10, 10, 70, 40]
        },
        {
            name: 'SHU',
            color: '#FBBF24',
            marker: {
                symbol: 'c-rect',
                lineColor: '#FBBF24',
                radius: 30,
            },
            type: 'scatter',
            data: [30, 10, 5, 5, 50, 20],
        }
    ]
})

Highcharts.chart('lembaga-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 360,
        width: 470
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled: false },
    credits: { enabled: false },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            center: ['50%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name} : {point.percentage:.1f} %'
            },
            size: '65%',
            showInLegend: true
        }
    },
    series: [{
        name: 'Jumlah',
        colorByPoint: true,
        data: [
            {
                name: 'TS',
                y: 26.9,
                sliced: true,
                selected: true
            },
            {
                name: 'ITTS',
                y: 6.4
            },
            {
                name: 'ITTP',
                y: 9.0
            },
            {
                name: 'AKATEL',
                y: 4.5
            },
            {
                name: 'TelU',
                y: 43.6
            },
            {
                name: 'Lakhar',
                y: 9.6
            },
        ]
    }]
});

Highcharts.chart('yoy-chart', {
    chart: {
        height: 400,
        width: 600
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ 
        enabled: true,
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle' 
    },
    credits: { enabled: false },
    xAxis: {
        categories: ['2016', '2017', '2018', '2019', '2020', '2021']
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            marker:{
                enabled:false
            },
            pointStart: 2016
        }
    },
    series: [
        {
            name: 'Pendapatan A',
            data: [2000, 3500, 2500, 5000, 3500],
            color: '#1D4ED8'
        },
        {
            name: 'Pendapatan B',
            data: [3000, 3000, 3000, 3500, 2500],
            color: '#EC4899'
        },
        {
            name: 'Pendapatan C',
            data: [1000, 1500, 2000, 2500, 1500],
            color: '#FBBF24'
        }
    ],
});

// Highcharts.chart('akun-chart', {
//     chart: {
//         plotBackgroundColor: null,
//         plotBorderWidth: null,
//         plotShadow: false,
//         type: 'variablepie',
//         height: 360,
//         width: 470
//     },
//     title: { text: '' },
//     subtitle: { text: '' },
//     exporting:{ enabled: false },
//     legend:{ enabled: false },
//     credits: { enabled: false },
//     tooltip: {
//         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
//     },
//     accessibility: {
//         point: {
//             valueSuffix: '%'
//         }
//     },
//     plotOptions: {
//         pie: {
//             allowPointSelect: true,
//             center: ['50%', '50%'],
//             cursor: 'pointer',
//             dataLabels: {
//                 enabled: true,
//                 format: '{point.name} : {point.percentage:.1f} %'
//             },
//             // size: '65%',
//             showInLegend: true
//         }
//     },
//     series: [{
//         minPointSize: 10,
//         innerSize: '20%',
//         name: 'Jumlah',
//         colorByPoint: true,
//         data: [
//             {
//                 name: 'Pendapatan A',
//                 y: 505370,
//                 z: 92.9
//             }, 
//             {
//                 name: 'Pendapatan B',
//                 y: 551500,
//                 z: 118.7
//             }, 
//             {
//                 name: 'Pendapatan C',
//                 y: 312685,
//                 z: 124.6
//             }, 
//             {
//                 name: 'Pendapatan D',
//                 y: 78867,
//                 z: 137.5
//             }, 
//             {
//                 name: 'Pendapatan E',
//                 y: 301340,
//                 z: 201.8
//             }, 
//             {
//                 name: 'Pendapatan F',
//                 y: 41277,
//                 z: 214.5
//             }, 
//             {
//                 name: 'Lainnya',
//                 y: 357022,
//                 z: 235.6
//             }
//         ]
//     }]
// });
</script>