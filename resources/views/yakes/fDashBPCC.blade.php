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
        <h2 style="position:absolute">Realisasi BPCC</h2>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Realisasi CC YTD OKT 2020</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="cc"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
                                <th style="width:10%;">RJTP</th>
                                <th style="width:10%;">RJTKL</th>
                                <th style="width:10%;">RI</th>
                                <th style="width:10%;">RESTITUSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    REA YTD OKT 2019
                                </td>
                                <td>75.731</td>
                                <td>86.017</td>
                                <td>146.733</td>
                                <td>17.360</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    RKA YTD OKT 2020
                                </td>
                                <td>100.851</td>
                                <td>87.429</td>
                                <td>171.467</td>
                                <td>19.073</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    REA YTD OKT 2020
                                </td>
                                <td>84.305</td>
                                <td>81.812</td>
                                <td>123.235</td>
                                <td>16.623</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    ACH
                                </td>
                                <td>83,6</td>
                                <td>99,6</td>
                                <td>71,9</td>
                                <td>117,2</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    YOY
                                </td>
                                <td>11,3</td>
                                <td>(4,9)</td>
                                <td>(16,0)</td>
                                <td>(4,2)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Realisasi BP YTD OKT 2020</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="bp"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
                                <th style="width:10%;">RJTP</th>
                                <th style="width:10%;">RJTKL</th>
                                <th style="width:10%;">RI</th>
                                <th style="width:10%;">RESTITUSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    REA YTD OKT 2019
                                </td>
                                <td>15.699</td>
                                <td>24.508</td>
                                <td>49.899</td>
                                <td>15.204</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    RKA YTD OKT 2020
                                </td>
                                <td>18.955</td>
                                <td>22.610</td>
                                <td>49.962</td>
                                <td>14.304</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    REA YTD OKT 2020
                                </td>
                                <td>12.555</td>
                                <td>19.740</td>
                                <td>37.473</td>
                                <td>12.533</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    ACH
                                </td>
                                <td>66,2</td>
                                <td>87,3</td>
                                <td>75,0</td>
                                <td>87,5</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    YOY
                                </td>
                                <td>(20,0)</td>
                                <td>(19,5)</td>
                                <td>(24,9)</td>
                                <td>(17,6)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
Highcharts.chart('cc', {
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
        categories: ['RJTP', 'RJTL', 'RI', 'RESTITUSI'],
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
            data: [75.731, 86.017, 146.733, 17.360],
            color: '#ebebff'
        },
        {
            type: 'column',
            name: 'RKA YTD OKT 2020',
            data: [100.851, 87.429, 171.467, 19.073],
            color: '#8989ff'
        },
        {  
            type: 'column',
            name: 'REA YTD OKT 2020',
            data: [84.305, 81.812, 123.235, 16.623],
            color: '#2727ff'
        },
        {  
            type: 'spline',
            name: 'ACH',
            data: [83.6, 99.6, 71.9, 117.2],
            color: '#008000',
            marker: {
                lineWidth: 2,
            }
        },
        {  
            type: 'spline',
            name: 'YOY',
            data: [11.3, -4.9, -16.0, -4.2],
            color: '#ffa500',
            marker: {
                lineWidth: 2,
            }
        },
    ]
});
Highcharts.chart('bp', {
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
        categories: ['RJTP', 'RJTL', 'RI', 'RESTITUSI'],
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
            data: [15.699, 24.508, 49.899, 15.204],
            color: '#ebebff'
        },
        {
            type: 'column',
            name: 'RKA YTD OKT 2020',
            data: [18.955, 22.610, 49.962, 14.304],
            color: '#8989ff'
        },
        {  
            type: 'column',
            name: 'REA YTD OKT 2020',
            data: [12.555, 19.740, 37.473, 12.533],
            color: '#2727ff'
        },
        {  
            type: 'spline',
            name: 'ACH',
            data: [66.2, 87.3, 75.0, 87.5],
            color: '#008000',
            marker: {
                lineWidth: 2,
            }
        },
        {  
            type: 'spline',
            name: 'YOY',
            data: [-20.0, -19.5, -24.9, -17.6],
            color: '#ffa500',
            marker: {
                lineWidth: 2,
            }
        },
    ]
});
</script>