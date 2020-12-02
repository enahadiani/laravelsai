<style>
    body {
        overflow: auto; /* Hide scrollbars */
    }
    .card{
        border-radius: 10px !important;
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
    .select-dash {
        width: 50%;
        position: absolute;
        margin: 0;
        right: 0;
        border-radius: 10px;
    }
    .box-container {
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
    }
    .subbox-container{
        margin-top: -10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .box{
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .keterangan {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<div class="row">
    <div class="col-6">
        <h2 style="position:absolute;">Biaya Kunjungan</h2>
    </div>
    <div class="col-6">
        <select id="jenis" class="form-control select-dash">
            <option value="PK" selected>Pensiunan dan keluarga</option>
        </select>
    </div>
</div>

<div class="row" style="position: relative;margin-top:50px;">
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Claim Cost</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="claim" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 80.42%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi CC</h6>
            <div id="komposisi" class="mt-3"></div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">CC per Claimant</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="cc" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 80.42%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-12">
        <div class="card">    
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Biaya Pengobatan per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div class="row">
                <div class="col-3">
                    <div id="rjtp" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="rjtl" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="ri" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="restitusi" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-3">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div id="kunjungan" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;">Ach. 80.42%</span>
                </div>
                <div style="padding-right: 30px;">
                    <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                    <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi Kunjungan</h6>
            <div id="komposisi-kunj" class="mt-3"></div>
        </div>
    </div>
    {{-- <div class="col-6">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div class="row">
                <div class="col-3">
                    <div id="rjtp-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;font-size:12px;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 12px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="rjtl-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="ri-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="restitusi-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;">Ach. 80.42%</span>
                            </div>
                            <div style="padding-right: 30px;">
                                <div class="glyph-icon simple-icon-arrow-down-circle" style="font-size: 18px;color: #ff0000;display:inline-block;"></div>
                                <span style="padding-left: 10px;font-weight: bold;position: relative;top:-2px;">5,45%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#add8e6;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#457b9d;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">RKA Q3'19</span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#1d3557;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;">YTD Q3'20</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<script type="text/javascript">

Highcharts.chart('claim', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('komposisi', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                padding: 0,
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            },
        }
    },
    series: [{
        name: 'Komposisi CC',
        colorByPoint: true,
        data: [{
            name: 'RJTP',
            y: 25,
        }, {
            name: 'RI',
            y: 25
        }, {
            name: 'RJTL',
            y: 25
        }, {
            name: 'Restitusi',
            y: 25
        }]
    }]
});

Highcharts.chart('cc', {
    chart: {
        type: 'column',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('rjtp', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('rjtl', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('ri', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('restitusi', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('kunjungan', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('komposisi-kunj', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 250
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            size: 200,
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                padding: 0,
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            },
        }
    },
    series: [{
        name: 'Komposisi CC',
        colorByPoint: true,
        data: [{
            name: 'RJTP',
            y: 25,
        }, {
            name: 'RI',
            y: 25
        }, {
            name: 'RJTL',
            y: 25
        }, {
            name: 'Restitusi',
            y: 25
        }]
    }]
});

Highcharts.chart('rjtp-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('rjtl-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('ri-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});

Highcharts.chart('restitusi-kunj', {
    chart: {
        type: 'column',
        height: 250,
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: '',
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
        series:{
            dataLabels: {
                enabled: true
            }
        },
        column: {
            color: '#2727ff'
        },
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#add8e6',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color:'#457b9d',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color:'#1d3557',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});
</script>