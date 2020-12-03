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
        <h2 style="position:absolute">Realisasi Beban</h2>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Realisasi Beban</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="chart"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
                                <th style="width:10%;">B. SDM</th>
                                <th style="width:10%;">B. ADUM</th>
                                <th style="width:10%;">B. INVESTASI</th>
                                <th style="width:10%;">B. PEL. KESEHATAN</th>
                                <th style="width:10%;">BPP</th>
                                <th style="width:10%;">BPA</th>
                                <th style="width:10%;">CC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    REA YTD OKT 2019
                                </td>
                                <td style="text-align: right;">84.084</td>
                                <td style="text-align: right;">35.088</td>
                                <td style="text-align: right;">8.157</td>
                                <td style="text-align: right;">12.690</td>
                                <td style="text-align: right;">2.903</td>
                                <td style="text-align: right;">7.324</td>
                                <td style="text-align: right;">325.842</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    RKA YTD OKT 2020
                                </td>
                                <td style="text-align: right;">115.954</td>
                                <td style="text-align: right;">41.884</td>
                                <td style="text-align: right;">12.164</td>
                                <td style="text-align: right;">8.867</td>
                                <td style="text-align: right;">3.544</td>
                                <td style="text-align: right;">6.581</td>
                                <td style="text-align: right;">378.820</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    REA YTD OKT 2020
                                </td>
                                <td style="text-align: right;">96.027</td>
                                <td style="text-align: right;">30.372</td>
                                <td style="text-align: right;">6.763</td>
                                <td style="text-align: right;">8.791</td>
                                <td style="text-align: right;">2.976</td>
                                <td style="text-align: right;">7.250</td>
                                <td style="text-align: right;">305.974</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    ACH
                                </td>
                                <td style="text-align: right;">82,8</td>
                                <td style="text-align: right;">72,5</td>
                                <td style="text-align: right;">55,6</td>
                                <td style="text-align: right;">99,1</td>
                                <td style="text-align: right;">84,0</td>
                                <td style="text-align: right;">110,2</td>
                                <td style="text-align: right;">80,8</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    YOY
                                </td>
                                <td style="text-align: right;">14,2</td>
                                <td style="text-align: right;">(13,4)</td>
                                <td style="text-align: right;">(17,1)</td>
                                <td style="text-align: right;">(30,7)</td>
                                <td style="text-align: right;">2,5</td>
                                <td style="text-align: right;">(1,0)</td>
                                <td style="text-align: right;">(6,1)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
Highcharts.chart('chart', {
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['B. SDM', 'B. ADUM', 'B.IVESTASI', 'B. PEL. KESEHATAN', 'BPP', 'BPA', 'CC'],
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        enabled: false
        // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        //     '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        // footerFormat: '</table>',
        // shared: true,
        // useHTML: true
    },
    plotOptions: {
        series:{
            pointPadding: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [
        {
            type: 'column',
            name: 'REA YTD OKT 2019',
            data: [84.084, 35.088, 8.157, 12.690, 2.903, 7.324, 325.842],
            color: '#ebebff'
        },
        {
            type: 'column',
            name: 'RKA YTD OKT 2020',
            data: [115.954, 41.884, 12.164, 8.867, 3.544, 6.581, 378.820],
            color: '#8989ff'
        },
        {  
            type: 'column',
            name: 'REA YTD OKT 2020',
            data: [96.027, 30.372, 6.763, 8.791, 2.976, 7.250, 305.974],
            color: '#2727ff'
        },
        {  
            type: 'spline',
            name: 'ACH',
            data: [82.8, 72.5, 55.6, 99.1, 84.0, 110.2, 80.8],
            color: '#008000',
            marker: {
                lineWidth: 2,
            }
        },
        {  
            type: 'spline',
            name: 'YOY',
            data: [14.2, -13.4, -17.1, -30.7, 2.5, -1.0, -6.1],
            color: '#ffa500',
            marker: {
                lineWidth: 2,
            }
        },
    ]
});
</script>