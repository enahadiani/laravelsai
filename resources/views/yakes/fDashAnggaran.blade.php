<style>
    body {
        overflow: hidden; /* Hide scrollbars */
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
</style>
<div class="row">
    <div class="col-12">
        <h2 style="position:absolute">Rekap Realisasi Anggaran</h2>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-4 col-sm-4 mb-4">
        <div class="card" style="height: 250px; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;">Capex</h6>
            <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
            <div class="ml-3">
                <h2 class="ml-2"><strong>4.882 M</strong></h2>
                <table class="table table-borderless">
                    <tr>
                        <td>RKA YTD Agt'2020</td>
                        <td style="text-align: right;">11.560 M</td>
                        <td style="text-align: right;">42,2%</td>
                    </tr>
                    <tr>
                        <td>RKA 2020</td>
                        <td style="text-align: right;">12.960 M</td>
                        <td style="text-align: right;">37,7%</td>
                    </tr>
                    <tr>
                        <td>Real. YoY Agt'19</td>
                        <td style="text-align: right;">5.451 M</td>
                        <td style="text-align: right;"><i class="glyph-icon iconsminds-down text-danger" style="font-color: red;font-weight:bold;"></i> -10,4%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-4">
        <div class="card" style="height: 250px; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;">Beban</h6>
            <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
            <div class="ml-3">
                <h2 class="ml-2"><strong>154.210 M</strong></h2>
                <table class="table table-borderless">
                    <tr>
                        <td>RKA YTD Agt'2020</td>
                        <td style="text-align: right;">154.210 M</td>
                        <td style="text-align: right;">77,6%</td>
                    </tr>
                    <tr>
                        <td>RKA 2020</td>
                        <td style="text-align: right;">244.882 M</td>
                        <td style="text-align: right;">48,8%</td>
                    </tr>
                    <tr>
                        <td>Real. YoY Agt'19</td>
                        <td style="text-align: right;">120.026 M</td>
                        <td style="text-align: right;"><i class="glyph-icon iconsminds-down text-danger" style="font-color: red;font-weight:bold;"></i> -0,3%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 mb-4">
        <div class="card" style="height: 250px; border-radius:10px !important;padding-right:0 !important;margin-right:0 !important;right:0 !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;">Pendapatan</h6>
            <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
            <div class="ml-3">
                <h2 class="ml-2"><strong>-228.653 M</strong></h2>
                <table class="table table-borderless">
                    <tr>
                        <td>RKA YTD Agt'2020</td>
                        <td style="text-align: right;">748.055 M</td>
                        <td style="text-align: right;"><i class="glyph-icon iconsminds-down text-danger" style="font-color: red;font-weight:bold;"></i> -30,6%</td>
                    </tr>
                    <tr>
                        <td>RKA 2020</td>
                        <td style="text-align: right;">1.218.352 M</td>
                        <td style="text-align: right;"><i class="glyph-icon iconsminds-down text-danger" style="font-color: red;font-weight:bold;"></i> -18,8%</td>
                    </tr>
                    <tr>
                        <td>Real. YoY Agt'19</td>
                        <td style="text-align: right;">1.022.260 M</td>
                        <td style="text-align: right;"><i class="glyph-icon iconsminds-down text-danger" style="font-color: red;font-weight:bold;"></i> -122,4%</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;">Rincian Realisasi Beban</h6>
            <p class="ml-4" style="margin-top: -10px;">Realisasi s/d Agt 20'</p>
            <div class="row" style="margin-top: -15px;">
                <div class="col-2" id="sdm" style="height: 353px;width:200px;"></div>
                <div class="col-2" id="adm" style="height: 353px;width:200px"></div>
                <div class="col-2" id="invest" style="height: 353px;width:200px"></div>
                <div class="col-2" id="kes" style="height: 353px;width:200px"></div>
                <div class="col-2" id="perbaikan" style="height: 353px;width:200px"></div>
                <div class="col-2" id="amor" style="height: 353px;width:200px"></div>
                <div class="col-2"  style="border-right: 1px solid #DCDCDC">
                    <table class="table table-borderless">
                        <tr>
                            <td style="font-size: 10px;">YTD</td>
                            <td style="text-align: right;font-size: 10px;">78,0%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">RKA 2020</td>
                            <td style="text-align: right;font-size: 10px;">48,0%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">YoY</td>
                            <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-up" style="font-color: green;font-weight:bold;"></i> 12,3%</td>
                        </tr>
                    </table> 
                </div>
                <div class="col-2"  style="border-right: 1px solid #DCDCDC">
                    <table class="table table-borderless">
                        <tr>
                            <td style="font-size: 10px;">YTD</td>
                            <td style="text-align: right;font-size: 10px;">72,7%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">RKA 2020</td>
                            <td style="text-align: right;font-size: 10px;">47,9%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">YoY</td>
                            <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -15,2%</td>
                        </tr>
                    </table> 
                </div>
                <div class="col-2"  style="border-right: 1px solid #DCDCDC">
                    <table class="table table-borderless">
                        <tr>
                            <td style="font-size: 10px;">YTD</td>
                            <td style="text-align: right;font-size: 10px;">56,2%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">RKA 2020</td>
                            <td style="text-align: right;font-size: 10px;">37,5%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">YoY</td>
                            <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -16,0%</td>
                        </tr>
                    </table> 
                </div>
                <div class="col-2"  style="border-right: 1px solid #DCDCDC">
                    <table class="table table-borderless">
                        <tr>
                            <td style="font-size: 10px;">YTD</td>
                            <td style="text-align: right;font-size: 10px;">98,4%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">RKA 2020</td>
                            <td style="text-align: right;font-size: 10px;">60,7%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">YoY</td>
                            <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -33,3%</td>
                        </tr>
                    </table> 
                </div>
                <div class="col-2"  style="border-right: 1px solid #DCDCDC">
                    <table class="table table-borderless">
                        <tr>
                            <td style="font-size: 10px;">YTD</td>
                            <td style="text-align: right;font-size: 10px;">80,5%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">RKA 2020</td>
                            <td style="text-align: right;font-size: 10px;">56,7%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">YoY</td>
                            <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -0,5%</td>
                        </tr>
                    </table> 
                </div>
                <div class="col-2"  style="border-right: 1px solid #DCDCDC">
                    <table class="table table-borderless">
                        <tr>
                            <td style="font-size: 10px;">YTD</td>
                            <td style="text-align: right;font-size: 10px;">112,3%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">RKA 2020</td>
                            <td style="text-align: right;font-size: 10px;">71,7%</td>
                        </tr>
                        <tr>
                            <td style="font-size: 10px;">YoY</td>
                            <td style="text-align: right;font-size: 10px;"><i class="glyph-icon iconsminds-down" style="font-color: red;font-weight:bold;"></i> -2,2%</td>
                        </tr>
                    </table> 
                </div>
                <div class="col-12" style="display: flex;justify-content: center;margin-top:5px;">
                    <div style="width: 13px;height:13px;background-color:rgb(149,206,255);border-radius:100%;"></div>
                    <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA 2020</p>
                    <div style="width: 13px;height:13px;background-color:rgb(67,67,72);border-radius:100%;"></div>
                    <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">RKA s/d Agt'20</p>
                    <div style="width: 13px;height:13px;background-color:rgb(144,237,125);border-radius:100%;"></div>
                    <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'20</p>
                    <div style="width: 13px;height:13px;background-color:rgb(247,163,92);border-radius:100%;"></div>
                    <p style="display: inline; font-size:9px;margin-top:-2px;padding-left:2px;padding-right:3px;">Realisasi s/d Agt'19</p>
                </div>
                <div class="col-12" style="text-align: center;margin-top:-10px;">
                    <p style="font-weight: bold">Nilai dalam chart dalam satuan Milyar Rupiah</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
Highcharts.chart('sdm', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: 'SDM',
        align: 'center',
        y: 340,
        style:{
            fontSize: '9px',
            fontWeight: 'bold'
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 1,
            borderWidth: 0,
        },
        series:{
            pointWidth: 30,
            groupPadding: 0,
            borderWidth: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'RKA 2020',
        data: [157.728]

    }, {
        name: 'RKA s/d Agt.20"',
        data: [97.115]

    }, {
        name: 'Realisasi s/d Agt.20"',
        data: [75.723]

    }, {
        name: 'RKA s/d Agt.19"',
        data: [67.415]

    }]
});
Highcharts.chart('adm', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: 'Adm & Umum',
        align: 'center',
        y: 340,
        style:{
            fontSize: '9px',
            fontWeight: 'bold'
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 1,
            borderWidth: 0,
        },
        series:{
            pointWidth: 30,
            groupPadding: 0,
            borderWidth: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'RKA 2020',
        data: [49.542]

    }, {
        name: 'RKA s/d Agt.20"',
        data: [32.642]

    }, {
        name: 'Realisasi s/d Agt.20"',
        data: [23.731]

    }, {
        name: 'RKA s/d Agt.19"',
        data: [27.973]

    }]
});
Highcharts.chart('invest', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: 'Investasi',
        align: 'center',
        y: 340,
        style:{
            fontSize: '9px',
            fontWeight: 'bold'
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 1,
            borderWidth: 0,
        },
        series:{
            pointWidth: 30,
            groupPadding: 0,
            borderWidth: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'RKA 2020',
        data: [14.597]

    }, {
        name: 'RKA s/d Agt.20"',
        data: [9.731]

    }, {
        name: 'Realisasi s/d Agt.20"',
        data: [5.467]

    }, {
        name: 'RKA s/d Agt.19"',
        data: [6.508]

    }]
});
Highcharts.chart('kes', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: 'Pelayanan Kesehatan',
        align: 'center',
        y: 340,
        style:{
            fontSize: '9px',
            fontWeight: 'bold'
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 1,
            borderWidth: 0,
        },
        series:{
            pointWidth: 30,
            groupPadding: 0,
            borderWidth: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'RKA 2020',
        data: [10.919]

    }, {
        name: 'RKA s/d Agt.20"',
        data: [6.731]

    }, {
        name: 'Realisasi s/d Agt.20"',
        data: [6.624]

    }, {
        name: 'RKA s/d Agt.19"',
        data: [9.930]

    }]
});
Highcharts.chart('perbaikan', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: 'Pemeliharaan dan Perbaikan',
        align: 'center',
        y: 340,
        style:{
            fontSize: '9px',
            fontWeight: 'bold'
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 1,
            borderWidth: 0,
        },
        series:{
            pointWidth: 30,
            groupPadding: 0,
            borderWidth: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'RKA 2020',
        data: [4.073]

    }, {
        name: 'RKA s/d Agt.20"',
        data: [2.871]

    }, {
        name: 'Realisasi s/d Agt.20"',
        data: [2.311]

    }, {
        name: 'RKA s/d Agt.19"',
        data: [2.322]

    }]
});
Highcharts.chart('amor', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: 'Penyusutan & Amortisasi',
        align: 'center',
        y: 340,
        style:{
            fontSize: '9px',
            fontWeight: 'bold'
        }
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 1,
            borderWidth: 0,
        },
        series:{
            pointWidth: 30,
            groupPadding: 0,
            borderWidth: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        }
    },
    series: [{
        name: 'RKA 2020',
        data: [8.023]

    }, {
        name: 'RKA s/d Agt.20"',
        data: [5.120]

    }, {
        name: 'Realisasi s/d Agt.20"',
        data: [5.750]

    }, {
        name: 'RKA s/d Agt.19"',
        data: [5.878]

    }]
});
</script>