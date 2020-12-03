<style>
    table.table-akun > thead > tr > th {
        color: #f0f0f0;
        text-align: center;
    }
    .card{
        border-radius: 0 !important;
        box-shadow: none;
        border: 1px solid #f0f0f0;
    }
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
    }

    /* NAV TABS */
    .nav-tabs {
        border:none;
    }

    .nav-tabs .nav-link{
        border: 1px solid #ad1d3e;
        border-radius: 20px;
        padding: 2px 25px;
        color:#ad1d3e;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: white;
        background-color: #ad1d3e;
        border-color: #ad1d3e;
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px;
        padding: 0px 10px 0px 0px;
    }
    table, td, th {
        border: 1px solid black !important;
        margin-bottom: 10px;
    }  

    th {
        padding: 5px;
        text-align: center;
    }

    .keterangan {
        writing-mode: vertical-lr;
        margin: 0;
        position: absolute;
        margin-left: 10px;
        top: 30%;
    }
</style>
<div class="row">
    <div class="col-12">
        <h2 style="position:absolute">Pendapatan Investasi</h2>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Pendapatan Investasi</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="invest"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:23%;"></th>
                                <th style="width:7%;">Jan</th>
                                <th style="width:7%;">Feb</th>
                                <th style="width:7%;">Mar</th>
                                <th style="width:7%;">Apr</th>
                                <th style="width:7%;">Mei</th>
                                <th style="width:7%;">Jun</th>
                                <th style="width:7%;">Jul</th>
                                <th style="width:7%;">Agt</th>
                                <th style="width:7%;">Sep</th>
                                <th style="width:7%;">Okt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#4674c5;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Pendapatan Bunga
                                </td>
                                <td style="text-align: right;">1.217</td>
                                <td style="text-align: right;">1.172</td>
                                <td style="text-align: right;">2.596</td>
                                <td style="text-align: right;">6.424</td>
                                <td style="text-align: right;">5.936</td>
                                <td style="text-align: right;">5.625</td>
                                <td style="text-align: right;">4.801</td>
                                <td style="text-align: right;">4.355</td>
                                <td style="text-align: right;">3.457</td>
                                <td style="text-align: right;">2.825</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ed7d31;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Pendapatan Dividen
                                </td>
                                <td style="text-align: right;">31.401</td>
                                <td style="text-align: right;">43.000</td>
                                <td style="text-align: right;">22.571</td>
                                <td style="text-align: right;">391</td>
                                <td style="text-align: right;">5.799</td>
                                <td style="text-align: right;">3.001</td>
                                <td style="text-align: right;">22.822</td>
                                <td style="text-align: right;">174.794</td>
                                <td style="text-align: right;">2.871</td>
                                <td style="text-align: right;">2.778</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#a5a5a5;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Keuntungan/Kerugian Pelepasan Efek
                                </td>
                                <td style="text-align: right;">287</td>
                                <td style="text-align: right;">46.344</td>
                                <td style="text-align: right;">104.026</td>
                                <td style="text-align: right;">1.607</td>
                                <td style="text-align: right;">(3.796)</td>
                                <td style="text-align: right;">(2.032)</td>
                                <td style="text-align: right;">(4.925)</td>
                                <td style="text-align: right;">1.173</td>
                                <td style="text-align: right;">1.248</td>
                                <td style="text-align: right;">1.994</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ffc000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Pendapatan Investasi Lainnya
                                </td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                                <td style="text-align: right;">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
Highcharts.chart('invest', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        },
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
    },
    yAxis: {
        visible: true,
        title: {
            enabled: false
        }
    },

    tooltip: {
        enabled: false
        // formatter: function () {
        //     return '<b>' + this.x + '</b><br/>' +
        //         this.series.name + ': ' + this.y + '<br/>' +
        //         'Total: ' + this.point.stackTotal;
        // }
    },
    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Pendapatan Bunga',
        data: [1217, 1172, 2596, 6424, 5936, 5265, 4801, 4355, 3457, 2825],
        stack: 'invest',
        color: '#4674c5'
    }, {
        name: 'Pendapatan Deviden',
        data: [31401, 43000, 22571, 391, 5799, 3001, 22822, 174794, 2871, 2778],
        stack: 'invest',
        color: '#ed7d31'
    }, {
        name: 'Keuntungan/Kerugian Pelepasan Efek',
        data: [287, 46344, 104026, 1607, -3796, -2032, -4925, 1173, 1248, 1994],
        stack: 'invest',
        color: '#a5a5a5'
    },
    {
        name: 'Pendapatan Investasi Lainnya',
        data: [0, 0, 0, 0, 0, 0, 0 ,0 ,0 ,0],
        stack: 'invest',
        color: '#ffc000'
    }]
});
// Highcharts.chart('cc', {
//     legend:{ enabled:false },
    // credits: {
    //     enabled: false
    // },
//     title: {
//         text: ''
//     },
//     subtitle: {
//         text: ''
//     },
//     xAxis: {
//         categories: ['RJTP', 'RJTL', 'RI', 'RESTITUSI'],
//         labels: {
//             enabled: false
//         }
//     },
//     yAxis: {
//         visible: false
//     },
//     tooltip: {
//         enabled: false
//         // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//         // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//         //     '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
//         // footerFormat: '</table>',
//         // shared: true,
//         // useHTML: true
//     },
//     plotOptions: {
//         series:{
//             pointPadding: 0,
//             shadow: false,
//             dataLabels: {
//                 enabled: true
//             }
//         }
//     },
//     series: [
//         {
//             type: 'column',
//             name: 'REA YTD OKT 2019',
//             data: [75.731, 86.017, 146.733, 17.360],
//             color: '#ebebff'
//         },
//         {
//             type: 'column',
//             name: 'RKA YTD OKT 2020',
//             data: [100.851, 87.429, 171.467, 19.073],
//             color: '#8989ff'
//         },
//         {  
//             type: 'column',
//             name: 'REA YTD OKT 2020',
//             data: [84.305, 81.812, 123.235, 16.623],
//             color: '#2727ff'
//         },
//         {  
//             type: 'spline',
//             name: 'ACH',
//             data: [83.6, 99.6, 71.9, 117.2],
//             color: '#008000',
//             marker: {
//                 lineWidth: 2,
//             }
//         },
//         {  
//             type: 'spline',
//             name: 'YOY',
//             data: [11.3, -4.9, -16.0, -4.2],
//             color: '#ffa500',
//             marker: {
//                 lineWidth: 2,
//             }
//         },
//     ]
// });
</script>