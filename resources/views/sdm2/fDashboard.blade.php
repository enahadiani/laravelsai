<link rel="stylesheet" href="{{ asset('dash-asset/dash-sdm/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-sdm/sdm.dekstop.css?version=_').time() }}" />
<script src="{{ asset('helper.js?version=').time() }}"></script>

<script type="text/javascript">
// KOMPOSISI CHART
    var $chart_komposisi = Highcharts.chart('chart-komposisi', {
        chart: {
            type: 'pie',
            height: 238
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
        credits: { 
            enabled: false 
        },
        tooltip: {
            enabled: true
        },
        plotOptions: {
            pie: {
                shadow: false,
                innerSize: '70%',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>'
                }
            }
        },
        series: [{
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                {
                    name: 'YPT',
                    y: 32,
                    color: '#255F85'
                },
                {
                    name: 'EKSTERNAL',
                    y: 5,
                    color: '#FAA613'
                },
                {
                    name: 'TELKOM',
                    y: 35,
                    color: '#E26D5C'
                },
                {
                    name: 'GSD',
                    y: 28,
                    color: '#941B0C'
                }
            ]
        }]
    }, function() {
        var color = ['#255F85', '#FAA613', '#E26D5C', '#941B0C'];
        var series = this.series;
        for(var i=0;i<series.length;i++) {
            var point = series[i].data;
            for(var j=0;j<point.length;j++) {
                point[j].graphic.element.style.fill = color[j]
            }
        }
    });
// END KOMPOSISI CHART
// MARKET CHART
 var $chart_market = Highcharts.chart('chart-market', {
        chart: {
            height: 320
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
            enabled:true 
        },
        credits: { 
            enabled: false 
        },
        tooltip: {
            enabled: true
        },
        xAxis: {
            categories: ['2015', '2016', '2017', '2018', '2019', '2020', '2021']
        },
        yAxis: {
            title: {
                text: 'Jumlah SDM'
            }
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2015
            }
        },
        series: [
            {
                name: 'YPT',
                color: '#255F85',
                data: [1000, 2000, 3000, 4000, 5000, 6000]
            },
            {
                name: 'GSD',
                color: '#FAA613',
                data: [800, 1200, 3200, 2000, 4000, 3500]
            },
            {
                name: 'Telkom',
                color: '#E26D5C',
                data: [1500, 2200, 3500, 1000, 2000, 4000]
            },
            {
                name: 'Eksternal',
                color: '#941B0C',
                data: [500, 1500, 2300, 4500, 3000, 2000]
            },
        ]
    });
// END MARKET CHART
</script>

{{-- HEADER --}}
    <section id="header" class="dash-header mb-1">
        <div class="row">
            <div class="col-12">
                <h3 class="text-medium">Kepegawaian {{ date('Y')}} </h3>
            </div>
        </div>
    </section>
{{-- END HEADER --}}

{{-- BODY --}}
    <section id="body-1" class="body-1 m-b-25 col-dekstop">
        <div class="row">
            <div class="col-4">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12 py-1">
                            <h6 class="text-small">Komposisi Klien</h6>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-12">
                            <div id="chart-komposisi"></div>
                        </div>
                        <div class="col-12">
                            <table class="table table-borderless table-legend">
                                <tbody>
                                    <tr>
                                        <td style="width: 10%;">
                                            <div class="symbol bg-dark-blue"></div>
                                        </td>
                                        <td style="width: 20%;">YPT</td>
                                        <td id="nilai-ypt" class="text-right">1.249</td>
                                        <td id="percent-ypt" class="text-right font-bold">32%</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;">
                                            <div class="symbol bg-dark-red"></div>
                                        </td>
                                        <td style="width: 20%;">GSD</td>
                                        <td id="nilai-gsd" class="text-right">937</td>
                                        <td id="percent-gsd" class="text-right font-bold">28%</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;">
                                            <div class="symbol bg-pink"></div>
                                        </td>
                                        <td style="width: 20%;">Telkom</td>
                                        <td id="nilai-telkom" class="text-right">1.282</td>
                                        <td id="percent-telkom" class="text-right font-bold">35%</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10%;">
                                            <div class="symbol bg-orange"></div>
                                        </td>
                                        <td style="width: 20%;">Eksternal</td>
                                        <td id="nilai-eksternal" class="text-right">347</td>
                                        <td id="percent-eksternal" class="text-right font-bold">5%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="row mb-1">
                    <div class="col-4">
                        <div class="card card-dash">
                            <div class="card-header row">
                                <div class="col-12 py-1">
                                    <h6 class="text-small">Klien</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 id="client-value" class="text-value text-dark-red font-bold">4</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-dash">
                            <div class="card-header row">
                                <div class="col-12 py-1">
                                    <h6 class="text-small">SDM</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 id="sdm-value" class="text-value text-dark-red font-bold">3.928</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-dash">
                            <div class="card-header row">
                                <div class="col-12 py-1">
                                    <h6 class="text-small">Pertumbuhan SDM</h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 id="perubahan-value" class="text-value text-dark-red font-bold">XX</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dash">
                            <div class="card-header row">
                                <div class="col-12 py-1">
                                    <h6 class="text-small">% Pertumbuhan Market</h6>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-12">
                                    <div id="chart-market"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{-- END BODY --}}