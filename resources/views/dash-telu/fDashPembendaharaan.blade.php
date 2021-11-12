<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-pembendaharaan.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js') }}"></script>
<script type="text/javascript">
// CIRCLE
    $('#circle-agenda').circleProgress({
        value: 0.78,
        size: 100,
        reverse: false,
        thickness: 20,
        fill: {
            color: ["#457B9D"]
        }
    });

    $('#circle-agenda').find('strong').html(`
        <p class="my-0 text-circle">78%</p>
    `)
// END CIRCLE
</script>
<script type="text/javascript">
// CHART HARIAN
    var chartHarian = null;

    chartHarian = Highcharts.chart('chart-harian', {
        chart: {
            type: 'spline',
            height: 175
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
            minorGridLineWidth: 0,
            gridLineWidth: 0,   
            title: {
                text: 'Hari'
            },
            labels: {
                enabled: false
            },
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
                name: 'Rata-rata',
                data: [20, 18, 16, 14, 12, 10, 25, 23, 21, 18, 16, 14],
                color: '#457B9D'
            },
        ],
    });
// END CHART HARIAN
// CHART PENCAPAIAN
    var chartCapai = Highcharts.chart('chart-pencapaian', {
        chart: {
            type: 'area',
            height: 240
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
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
            tickmarkPlacement: 'on',
             title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
            labels: {
                enabled: false
            },
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f})<br/>',
            split: true
        },
        plotOptions: {
            area: {
                stacking: 'percent',
                lineColor: '#ffffff',
                lineWidth: 1,
                marker: {
                    enabled: false
                }
            }
        },
        accessibility: {
            point: {
                valueDescriptionFormat: '{index}. {point.category}, {point.y:,.0f}, {point.percentage:.1f}%.'
            }
        },
        series: [
            {
                name: '0 Hari',
                data: [502, 635, 809, 947, 1402, 3634, 5268],
                color: '#1D3557'
            }, {
                name: '1 Hari',
                data: [106, 107, 111, 133, 221, 767, 1766],
                color: '#457B9D'
            }, {
                name: '2 Hari',
                data: [163, 203, 276, 408, 547, 729, 628],
                color: '#A8DADC'
            }, {
                name: '3 Hari',
                data: [60, 50, 80, 90, 100, 120, 300],
                color: '#F1FAEE'
            }, {
                name: '< 4 Hari',
                data: [40, 90, 50, 60, 60, 100, 200],
                color: '#E63946'
            }   
        ],
    });
// END CHART PENCAPAIAN
</script>

{{-- HEADER --}}
    <section id="header" class="header">
        <div class="row">
            <div class="col-12">
                <h2 id="title-dash" class="title-dash">Pembendaharaan</h2>
            </div>
        </div>
    </section>
{{-- END HEADER --}}

{{-- BODY --}}
    <section id="main-dash" class="mt-20 p-24">
        <div id="dekstop-1" class="row dekstop">
            {{-- LEFT SIDE --}}
            <div class="col-5">
                <div class="row">
                    <div class="col-6">
                        {{-- DOKUMEN --}}
                        <div class="card card-dash">
                            <div class="card-header">
                                <h4 class="pt-2">Dokumen</h4>
                            </div>
                            <div class="card-body">
                                <h3 class="value-card" id="value-spb">100</h3>
                                <table class="table table-borderless table-no-padding table-no-mb">
                                    <tbody>
                                        <tr>
                                            <td class="w-40">
                                                <img alt="online" class="inline -mt-2" src="{{ asset('dash-asset/dash-telu/icon/online.png') }}">
                                                <div class="ml-8 inline-block">Online</div>
                                            </td>
                                            <td id="online-value" class="grey-text">12</td>
                                            <td id="online-percent" class="text-right text-700">12%</td>
                                        </tr>
                                        <tr>
                                            <td class="w-40">
                                                <img alt="online" class="inline -mt-2" src="{{ asset('dash-asset/dash-telu/icon/offline.png') }}">
                                                <div class="ml-8 inline-block">Offline</div>
                                            </td>
                                            <td id="offline-value" class="grey-text">88</td>
                                            <td id="offline-percent" class="text-right text-700">88%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header mt-26">
                                <h4 class="pt-2">Agenda vs Berkas</h4>
                            </div>
                            <div class="card-body">
                                <div id="circle-agenda" class="circle-bar">
                                    <strong class="value-circle"></strong>
                                </div>
                            </div>
                        </div>
                        {{-- END DOKUMEN --}}
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 mb-8">
                                {{-- VERIFIKASI AKUN --}}
                                <div class="card card-dash">
                                    <div class="card-header">
                                        <h4 class="pt-2">Verifikasi Akun</h4>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="value-card" id="value-verakun">36</h3>
                                    </div>
                                </div>
                                {{-- END VERIFIKASI AKUN --}}
                            </div>
                            <div class="col-12 mb-8">
                                {{-- SPB --}}
                                <div class="card card-dash">
                                    <div class="card-header">
                                        <h4 class="pt-2">SPB</h4>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="value-card" id="value-spb">11</h3>
                                    </div>
                                </div>
                                {{-- END SPB --}}
                            </div>
                            <div class="col-12">
                                {{-- PERLU BAYAR --}}
                                <div class="card card-dash">
                                    <div class="card-header">
                                        <h4 class="pt-2">Perlu Bayar</h4>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="value-card" id="value-bayar">28</h3>
                                    </div>
                                </div>
                                {{-- END PERLU BAYAR --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END LEFT SIDE --}}
            {{-- RIGHT SIDE --}}
            <div class="col-7">
                <div class="row">
                    <div class="col-12 mb-8">
                        {{-- RATA2 HARI --}}
                        <div class="card card-dash">
                            <div class="card-header">
                                <h4 class="pt-2 text-700">Rata-rata Hari</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-harian" class="chart-no-grid"></div>
                            </div>
                        </div>
                        {{-- END RATA2 HARI --}}
                    </div>
                    <div class="col-12">
                        {{-- PENCAPAIAN SASARAN MUTU --}}
                        <div class="card card-dash">
                            <div class="card-header">
                                <h4 class="pt-2 text-700">Pencapaian Sasaran Mutu</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-pencapaian"></div>
                            </div>
                        </div>
                        {{-- END PENCAPAIAN SASARAN MUTU --}}
                    </div>
                </div>
            </div>
            {{-- END RIGHT SIDE --}}
        </div>
    </section>
{{-- END BODY --}}