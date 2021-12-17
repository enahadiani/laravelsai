<link rel="stylesheet" href="{{ asset('dash-asset/dash-sdm/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-sdm/sdm.dekstop.css?version=_').time() }}" />
<script src="{{ asset('helper.js?version=').time() }}"></script>

<script type="text/javascript">
    // PEGAWAI BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-box-pegawai') }}",
            dataType: 'json',
            async: true,
            success:function(result){
                var data = result.data;
                $('#sdm-value').text(sepNum(data));
            }
        });
    })();
    // END PEGAWAI BOX

    // CLIENT BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/sdm-kliens') }}",
            dataType: 'json',
            async: true,
            success:function(result){
                var data = result.daftar;
                $('#client-value').text(sepNum(data.length));
            }
        });
    })();
    // END BOX CLIENT

    // LOKER BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/sdm-lokers') }}",
            dataType: 'json',
            async: true,
            success:function(result){
                var data = result.daftar;
                $('#lokasi-value').text(sepNum(data.length));
            }
        });
    })();
    // END BOX LOKER


     // KOMPOSISI CHART
     (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-box-client') }}",
            dataType: 'json',
            async: true,
            success:function(result){
                var data = result.data;

                // $('#lokasi-value').text(sepNum(data.length));
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
                        data: data
                    }]
                    }, function() {
                        // var color = ['#255F85', '#FAA613', '#E26D5C', '#941B0C'];
                        var series = this.series;
                        for(var i=0;i<series.length;i++) {
                            var point = series[i].data;
                            for(var j=0;j<point.length;j++) {
                                point[j].graphic.element.style.fill = point[j].color
                            }
                        }
                });
                // END KOMPOSISI CHART
                var html = '';
                for (let i = 0; i < data.length; i++) {
                    html += ` <tr>
                                    <td style="width: 10%;">
                                        <div class="symbol ${data[i].bg}"></div>
                                    </td>
                                    <td style="width: 20%;">${data[i].name}</td>
                                    <td id="nilai-ypt" class="text-right">${data[i].y}</td>
                                    <td id="percent-ypt" class="text-right font-bold">${data[i].decimal}%</td>
                                </tr>`;

                }
                $('#pie-ket tbody').html(html);
            }
        });
    })();
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
            <div class="card card-dash h-full">
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
                        <table class="table table-borderless table-legend" id="pie-ket">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- MINI CARD --}}
        <div class="col-8">
            <div class="row mb-2">
                <div class="col-4">
                    <div class="card card-dash">
                        <div class="card-header row">
                            <div class="col-12 py-1">
                                <h6 class="text-small">Klien</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 id="client-value" class="text-value text-dark-red font-bold">0</h5>
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
                            <h5 id="sdm-value" class="text-value text-dark-red font-bold">0</h5>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-dash">
                        <div class="card-header row">
                            <div class="col-12 py-1">
                                <h6 class="text-small">Lokasi Kerja</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 id="lokasi-value" class="text-value text-dark-red font-bold">0</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-dash h-1">
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
        {{-- END MINI CARD --}}
    </div>
</section>
{{-- END BODY --}}
