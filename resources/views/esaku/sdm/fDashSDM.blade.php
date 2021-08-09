<link rel="stylesheet" href="{{ asset('dash-asset/dash-esaku/dash-sdm-dekstop.css') }}" />
{{-- DEKSTOP --}}
<section id="dekstop-1" class="desktop-1 m-b-25 col-dekstop">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="row">
                    <div class="col-4">
                        <span class="glyph-icon iconsminds-gey"></span>
                    </div>
                    <div class="col-8">
                        <h6 class="card-titles">Pegawai</h6>
                        <h3 class="card-text green-text text-bold" id="jumlah-pegawai">898</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="row">
                    <div class="col-4">
                        <span class="glyph-icon iconsminds-heart"></span>
                    </div>
                    <div class="col-8">
                        <h6 class="card-titles">BPJS Kesehatan</h6>
                        <h3 class="card-text red-text text-bold" id="jumlah-bpjs-kes">886</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="row">
                    <div class="col-4">
                        <span class="glyph-icon iconsminds-gear"></span>
                    </div>
                    <div class="col-8">
                        <h6 class="card-titles">BPJS Ketenagakerjaan</h6>
                        <h3 class="card-text orange-text text-bold" id="jumlah-bpjs-ker">779</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <div class="row">
                    <div class="col-4">
                        <span class="glyph-icon iconsminds-office"></span>
                    </div>
                    <div class="col-8">
                        <h6 class="card-titles">Klien</h6>
                        <h3 class="card-text blue-text text-bold" id="jumlah-bpjs-klien">10</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="dekstop-2" class="dekstop-2 pb-1 m-b-25">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dash">
                        <h6 class="card-title-2 text-bold">Jenis Kelamin</h6>
                        <div class="row m-t-10">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="glyph-icon medium p-l-4 m-t-10 simple-icon-symbol-male"></div>
                                    </div>
                                    <div class="col-9">
                                        <p class="card-subtitle">Pria</p>
                                        <p class="card-text">744</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="glyph-icon medium m-t-10 simple-icon-symbol-female"></div>
                                    </div>
                                    <div class="col-9">
                                        <p class="card-subtitle">Wanita</p>
                                        <p class="card-text">154</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 m-t-20">
                    <div class="card card-dash">
                        <h6 class="card-title-2 text-bold">Kelengkapan Data</h6>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6">
            <div class="card card-dash">
                <h6 class="card-title-2 text-bold">Tingkat Pendidikan</h6>
                <div id="pendidikan-chart"></div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <h6 class="card-title-2 text-bold">Kelompok Umur</h6>
                <div id="umur-chart"></div>
            </div>
        </div>
    </div>
</section>

<section id="dekstop-3" class="dekstop-3 pb-1 m-b-25">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <h6 class="card-title-2 text-bold">Jabatan</h6>
                <div id="jabatan-chart"></div>
                <div class="row p-l-4">
                    <div class="col-6">
                        <div class="legend-symbol legend-symbol-0"></div>
                        <span class="legend-text">Housekeeping</span>
                    </div>
                    <div class="col-6">
                        <div class="legend-symbol legend-symbol-1"></div>
                        <span class="legend-text">Parkir</span>
                    </div>
                    <div class="col-6">
                        <div class="legend-symbol legend-symbol-2"></div>
                        <span class="legend-text">M.E.C</span>
                    </div>
                    <div class="col-6">
                        <div class="legend-symbol legend-symbol-3"></div>
                        <span class="legend-text">Adm</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6">
            <div class="card card-dash">
                <h6 class="card-title-2 text-bold">Lokasi Pegawai Kerja</h6>
                <div id="lokasi-chart"></div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
            <div class="card card-dash">
                <h6 class="card-title-2 text-bold">Rentang Gaji</h6>
                <div id="gaji-chart"></div>
            </div>
        </div>
    </div>
</section>
{{-- END DEKSTOP --}}

<script type="text/javascript">
Highcharts.chart('gaji-chart', {
    chart: { 
        type: 'column',
        height: 238 
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    xAxis: {
        categories: [
            "1.0-2.0",
            "2.1-3.0",
            "3.1-4.0",
            "4.1-5.0",
            "5.0+",
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            }
        }
    },
    series: [{
        name: 'Jumlah',
        data: [10, 15, 20, 25, 30],
        color: '#1e3a8a'
    }]
});

Highcharts.chart('lokasi-chart', {
    chart: { 
        type: 'column',
        height: 238 
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    xAxis: {
        categories: [
            "Area 1",
            "Area 2",
            "Area 3",
            "Area 4",
            "Area 5",
            "Area 6",
            "Area 7",
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            }
        }
    },
    series: [{
        name: 'Jumlah',
        data: [10, 15, 20, 25, 30, 40, 75],
        color: '#f87171'
    }]
});

Highcharts.chart('jabatan-chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 200
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled: true },
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
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.percentage:.1f} %'
            },
            size: 92,
        }
    },
    series: [{
        name: 'Jabatan',
        colorByPoint: true,
        data: [{
            name: 'Housekeeping',
            y: 60,
        }, {
            name: 'Parkir',
            y: 10
        }, {
            name: 'M.E.C',
            y: 20
        }, {
            name: 'Adm',
            y: 10
        }]
    }]
});

Highcharts.chart('umur-chart', {
    chart: { 
        type: 'column',
        height: 160 
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    xAxis: {
        categories: [
            "17-21",
            "22-27",
            "28-32",
            "34-39",
            "40-45",
            "45+"
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            }
        }
    },
    series: [{
        name: 'Jumlah',
        data: [10, 15, 20, 25, 30, 40],
        color: '#ffb703'
    }]
});

Highcharts.chart('pendidikan-chart', {
    chart: { 
        type: 'column',
        height: 160 
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    xAxis: {
        categories: [
            "SD",
            "SMP",
            "SMA",
            "SMK",
            "D2",
            "D3",
            "S1",
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            }
        }
    },
    series: [{
        name: 'Jumlah',
        data: [10, 15, 20, 25, 30, 40, 75],
        color: '#059669'
    }]
});
</script>