@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2)
@endphp
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-piutang-desktop.css') }}" />

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h6 class="mb-0 bold">Piutang Mahasiswa</h6>
            <a class="btn" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Periode <span id="tanggal-1">10 Januari 2021</span> - <span id="tanggal-2">10 Februari 2021</span></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Total Piutang</h6>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-8">
                            <div id="chart-piutang"></div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 keterangan-piutang">
                                    <p>Saldo Awal</p>
                                    <h6>30,29 M</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 keterangan-piutang">
                                    <p>Tagihan</p>
                                    <h6>69,71 M</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 keterangan-piutang">
                                    <p>Pembayaran</p>
                                    <h6>79,00 M</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 keterangan-piutang">
                                    <p>Saldo Akhir</p>
                                    <h6>21,00 M</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Komposisi Pembayaran</h6>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-8">
                            <div id="chart-komposisi-piutang"></div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="keterangan-komposisi-piutang-1">
                                        <div class="legend-komposisi-piutang"></div>
                                        <span class="legend-text-komposisi-piutang">Beasiswa</span>
                                    </div>
                                    <h6 class="percentage-komposisi-piutang">34%</h6>
                                </div>
                                <div class="col-12">
                                    <div class="keterangan-komposisi-piutang-2">
                                        <div class="legend-komposisi-piutang"></div>
                                        <span class="legend-text-komposisi-piutang">Non Beasiswa</span>
                                    </div>
                                    <h6 class="percentage-komposisi-piutang">64%</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Piutang per Fakultas</h6>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <div id="chart-piutang-fakultas"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="keterangan-piutang-fakultas">
                                <div class="legend-piutang-fakultas-1">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Saldo Awal</span>
                                </div>
                                <div class="legend-piutang-fakultas-2">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Tagihan</span>
                                </div>
                                <div class="legend-piutang-fakultas-3">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Pembayaran Beasiswa</span>
                                </div>
                                <div class="legend-piutang-fakultas-4">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Pembayaran Non Beasiswa</span>
                                </div>
                                <div class="legend-piutang-fakultas-5">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Saldo Akhir</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">CCR 2021</h6>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <div id="chart-ccr-ytd"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="keterangan-ccr">
                                <div class="legend-ccr-1">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Tagihan</span>
                                </div>
                                <div class="legend-ccr-2">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Pembayaran</span>
                                </div>
                                <div class="legend-ccr-3">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Belum Terbayar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">CCR Tahun Sebelumnya</h6>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12">
                            <div id="chart-ccr-prev"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="keterangan-ccr">
                                <div class="legend-ccr-1">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Tagihan</span>
                                </div>
                                <div class="legend-ccr-2">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Pembayaran</span>
                                </div>
                                <div class="legend-ccr-3">
                                    <div class="legend-symbol"></div>
                                    <span class="legend-text">Belum Terbayar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');

Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
};

Highcharts.chart('chart-ccr-prev', {
    chart: {
        type: 'column'
    },
    credits:{
        enabled:false
    },
    title: {
        text: ''
    },
    subtitle: { 
        text: '' 
    },
    exporting: {
        enabled: false
    },
    legend: { 
        enabled:false 
    },
    xAxis: {
        categories: ['UP3','SDP2', 'BPP', 'Maba', 'SKS', 'Pendidikan Lainnya']
    },
    yAxis: {
        title:'',
        min: 0
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b>',
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            borderWidth: 0,
            pointWidth: 50,
            dataLabels: {
                allowOverlap:true,
                enabled: true,
                crop: false,
                overflow: 'justify',
                useHTML: true,
                formatter: function () {
                    if(this.y < 0.1){
                        return '';
                    }else{
                        return $('<div/>').css({
                            'color' : 'white', // work
                            'padding': '0 3px',
                            'font-size': '10px',
                            'backgroundColor' : this.point.color  // just white in my case
                        }).text(sepNum(this.point.y)+'M')[0].outerHTML;
                    }
                }
            }
        },
        scatter: {
            dataLabels: {
                allowOverlap:true,
                enabled: true,
                crop: false,
                overflow: 'justify',
                useHTML: true,
                formatter: function () {
                    if(this.y < 0.1){
                        return '';
                    }else{
                        return $('<div/>').css({
                                'color' : 'white', // work
                                'padding': '0 3px',
                                'font-size': '10px',
                                'backgroundColor' : this.point.color  // just white in my case
                            }).text(sepNum(this.point.y)+'%')[0].outerHTML;
                        }
                }
            }
        }
    },
    series: [
        {
            name: 'Pembayaran',
            color: '#22d36b',
            stack: 1,
            data: [81, 94, 100, 90, 60, 72],
            dataLabels: {
                x:50
            }
        },
        {
            name: 'Belum Terbayar',
            color: '#ff3030',
            stack: 1,
            data: [1, 3, 0, 4, 6, 4],
        },
        {
            name: 'Tagihan',
            color: '#009d69',
            marker: {
                symbol: 'c-rect',
                lineWidth:5,
                lineColor: '#009d69',
                radius: 30
            },
            type: 'scatter',
            stack: 1,
            data: [83, 98, 100, 96, 67, 76],
            dataLabels:{
                x:-50
            }
        }
    ]
})

Highcharts.chart('chart-ccr-ytd', {
    chart: {
        type: 'column'
    },
    credits:{
        enabled:false
    },
    title: {
        text: ''
    },
    subtitle: { 
        text: '' 
    },
    exporting: {
        enabled: false
    },
    legend: { 
        enabled:false 
    },
    xAxis: {
        categories: ['UP3','SDP2', 'BPP', 'Maba', 'SKS', 'Pendidikan Lainnya']
    },
    yAxis: {
        title:'',
        min: 0
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b>',
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            borderWidth: 0,
            pointWidth: 50,
            dataLabels: {
                allowOverlap:true,
                enabled: true,
                crop: false,
                overflow: 'justify',
                useHTML: true,
                formatter: function () {
                    if(this.y < 0.1){
                        return '';
                    }else{
                        return $('<div/>').css({
                            'color' : 'white', // work
                            'padding': '0 3px',
                            'font-size': '10px',
                            'backgroundColor' : this.point.color  // just white in my case
                        }).text(sepNum(this.point.y)+'M')[0].outerHTML;
                    }
                }
            }
        },
        scatter: {
            dataLabels: {
                allowOverlap:true,
                enabled: true,
                crop: false,
                overflow: 'justify',
                useHTML: true,
                formatter: function () {
                    if(this.y < 0.1){
                        return '';
                    }else{
                        return $('<div/>').css({
                                'color' : 'white', // work
                                'padding': '0 3px',
                                'font-size': '10px',
                                'backgroundColor' : this.point.color  // just white in my case
                            }).text(sepNum(this.point.y)+'%')[0].outerHTML;
                        }
                }
            }
        }
    },
    series: [
        {
            name: 'Pembayaran',
            color: '#22d36b',
            stack: 1,
            data: [81, 94, 100, 90, 60, 72],
            dataLabels: {
                x:50
            }
        },
        {
            name: 'Belum Terbayar',
            color: '#ff3030',
            stack: 1,
            data: [1, 3, 0, 4, 6, 4],
        },
        {
            name: 'Tagihan',
            color: '#009d69',
            marker: {
                symbol: 'c-rect',
                lineWidth:5,
                lineColor: '#009d69',
                radius: 30
            },
            type: 'scatter',
            stack: 1,
            data: [83, 98, 100, 96, 67, 76],
            dataLabels:{
                x:-50
            }
        }
    ]
})

Highcharts.chart('chart-piutang-fakultas', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: { 
        text: '' 
    },
    tooltip: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    legend: { 
        enabled:false 
    },
    xAxis: {
        categories: ['FIT', 'FKB', 'FEB', 'FTE', 'FI', 'FRI', 'FIK']
    },
    yAxis: { 
        min: 0,
        title: {
            text: ''
        },
    },
    plotOptions: {
        column: {
            // stacking: 'normal',
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            name: 'Saldo Awal',
            data: [5, 5, 5, 5, 5, 5, 5]
        },
        {
            name: 'Tagihan',
            data: [10, 10, 10, 10, 10, 10, 10]
        },
        {
            name: 'Pembayaran Beasiswa',
            data: [3, 3, 3, 3, 3, 3, 3],
            stacking: 'normal',
            stack: 'A'
        },
        {
            name: 'Pembayaran Beasiswa',
            data: [6, 6, 6, 6, 6, 6, 6],
            stacking: 'normal',
            stack: 'A'
        },
        {
            name: 'Saldo Akhir',
            data: [5, 5, 5, 5, 5, 5, 5],
        }
]
})

Highcharts.chart('chart-komposisi-piutang', {
    chart: {
        type: 'pie',
        height: 215,
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
    },
    title: {
        text: ''
    },
    tooltip: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        pie: {
            allowPointSelect: false,
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            name: 'Komposisi',
            colorByPoint: true,
            data: [
                {
                    name: 'Beasiswa',
                    y: 34
                },
                {
                    name: 'Non-Beasiswa',
                    y: 64
                }
            ]
        }
    ]
});

Highcharts.chart('chart-piutang', Highcharts.merge(
    {
        chart: {
            type: 'solidgauge',
            height: 200
        },
        title: '',
        pane: {
            center: ['50%', '80%'],
            size: '150%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: '#2dea6c',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },
        exporting: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        tooltip:{
            enabled: false
        },
        yAxis: {
            lineWidth: 0,
            tickWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -10
            },
            labels: {
                enabled: false
            }
        },
        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: -50,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    },
    {
        yAxis: {
            enabled: false,
            min: 0,
            max: 100,
        },
        series: [
            {
                name: 'Piutang Mahasiswa',
                data: [85],
                dataLabels: {
                    format: 
                        "<div style='text-align: center;'>"+
                            "<span style='font-size:25px !important'>{y}%</span>"+
                        "</div>"
                }
            }
        ]
    }
))
</script>