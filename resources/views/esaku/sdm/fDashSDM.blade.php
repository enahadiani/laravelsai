<link rel="stylesheet" href="{{ asset('dash-asset/dash-esaku/dash-sdm-dekstop.css?version=_').time() }}" />
<script src="{{ asset('helper.js?version=').time() }}"></script>
<script type="text/javascript">
    var $_pendidikan = null;
    var $_umur = null;
    var $_unitp = null;
    var $_unitc = null;
    var $_gaji = null;

    // RUN IF RENDER FIRST TIME
    // PEGAWAI BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-box-pegawai') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $('#jumlah-pegawai').text(sepNum(data));
            }
        });
    })();
    // END PEGAWAI BOX
    // BPJS KESEHATAN BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-box-sehat') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $('#jumlah-bpjs-kes').text(sepNum(data));
            }
        });
    })();
    // END BPJS KESEHATAN BOX
    // BPJS KERJA BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-box-kerja') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $('#jumlah-bpjs-ker').text(sepNum(data));
            }
        });
    })();
    // END BPJS KESEHATAN BOX
    // BPJS KERJA BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-box-client') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $('#jumlah-client').text(sepNum(data.length));
            }
        });
    })();
    // END BPJS KERJA BOX
    // GENDER BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-box-gender') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $('#jumlah-pria').text(sepNum(data.pria));
                $('#jumlah-wanita').text(sepNum(data.perempuan));
            }
        });
    })();
    // END GENDER BOX
    // PENDIDIKAN BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-chart-pendidikan') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $_pendidikan = Highcharts.chart('pendidikan-chart', {
                    chart: { 
                        type: 'column',
                        height: 160 
                    },
                    title: { text: '' },
                    subtitle: { text: '' },
                    exporting:{ enabled: false },
                    legend:{ enabled:true },
                    credits: { enabled: false },
                    xAxis: {
                        categories: data.kategori,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: ''
                        }
                    },
                    tooltip: {
                        enabled: true
                    },
                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            // point: {
                            //     events: {
                            //         click: function() {
                            //             var filter = { pendidikan: this.category }
                            //             generateTabelKaryawan(filter)
                            //         }
                            //     }
                            // }
                        }
                    },
                    series: [{
                        name: 'Jumlah',
                        data: data.data,
                        color: '#059669'
                    }]
                });
            }
        });
    })();
    // END PENDIDIKAN BOX
    // UMUR BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-chart-umur') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $_umur = Highcharts.chart('umur-chart', {
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
                        categories: data.kategori,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: ''
                        }
                    },
                    tooltip: {
                        enabled: true
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
                        data: data.data,
                        color: '#ffb703'
                    }]
                });
            }
        });
    })();
    // END UMUR BOX
    // UNIT PIE BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-chart-unitp') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;

                $_unitp = Highcharts.chart('unit-chart', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie',
                        height: 239
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
                            showInLegend: true,
                            size: 92,
                        }
                    },
                    series: [{
                        name: 'Jumlah',
                        colorByPoint: true,
                        data: data
                    }]
                }, function() {
                    var color =  ['#d1d5db', '#fbbf24', '#1d4ed8']
                    var series = this.series;
                    for(var i=0;i<series.length;i++) {
                        var point = series[i].data;
                        for(var j=0;j<point.length;j++) {
                            point[j].graphic.element.style.fill = color[j]
                            point[j].legendSymbol.element.style.fill = color[j]
                        }
                    }
                });
            }
        });
    })();
    // END UNIT PIE BOX
    // UNIT COLUMN BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-chart-unitc') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $_unitc = Highcharts.chart('unit-column-chart', {
                    chart: { 
                        type: 'column',
                        height: 238 
                    },
                    title: { text: '' },
                    subtitle: { text: '' },
                    exporting:{ enabled: false },
                    legend:{ enabled:true },
                    credits: { enabled: false },
                    xAxis: {
                        categories: data.kategori,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: ''
                        }
                    },
                    tooltip: {
                        enabled: true,
                    },
                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            // point: {
                            //     events: {
                            //         click: function() {
                            //             var filter = { kode_jab: this.kode }
                            //             generateTabelKaryawan(filter)
                            //         }
                            //     }
                            // }
                        }
                    },
                    series: [{
                        name: 'Jumlah',
                        data: data.data,
                        color: '#f87171'
                    }]
                });
            }
        });
    })();
    // END UNIT COLUMN BOX
    // GAJI BOX
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-dash/sdm-chart-gaji') }}",
            dataType: 'json',
            async: true,
            success:function(result){    
                var data = result.data;
                $_gaji = Highcharts.chart('gaji-chart', {
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
                        categories: data.kategori,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: ''
                        }
                    },
                    tooltip: {
                        enabled: true
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
                        data: data.data,
                        color: '#1e3a8a'
                    }]
                });
            }
        });
    })();
    // END GAJI BOX
    // END RUN IF RENDER FIRST TIME
</script>
<script type="text/javascript">
var $dataTable = null;
var $bpjs = 0;
var $http = null;

// EVENT BACK TO MAIN DASH
$('.to-main-dash').click(function() {
    $('.detail-section').hide();
    $('#main-dash').show()
});
// END EVENT BACK TO MAIN DASH

// CARD CLICK EVENT
$('.click-card').click(function() {
    var kode = $(this).data('box');
    $('#main-dash').hide()

    if(kode == 'pegawai') {
        generateDataPegawai();
        $('#detail-pegawai').show();
    }else if(kode == 'bpjsehat') {
        $bpjs = 0;
        generateDataBPJS($bpjs);
        $('#detail-bpjs').show();
    } else if(kode == 'bpjskerja') {
        $bpjs = 1;
        generateDataBPJS($bpjs);
        $('#detail-bpjs').show();
    } else if(kode == 'client') {
        generateChartClient();
        generateDataClient();
        $('#detail-client').show();
    }
});
// END CARD CLICK EVENT

// CLICK CONTENT EVENT
$('.click-content').click(function() {
    var kode = $(this).data('gender');
    var filter = { jk: kode }
    generateDataPegawai(filter);
    $('#main-dash').hide()
    $('#detail-pegawai').show();
})
// END CLICK CONTENT EVENT
</script>
{{-- DEKSTOP --}}
<section id="main-dash">
    <section id="dekstop-1" class="desktop-1 m-b-25 col-dekstop">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash click-card cursor-pointer" data-box="pegawai">
                    <div class="row">
                        <div class="col-4">
                            <img alt="pegawai" class="image-icon" src="{{ url('/asset_sdm/img/team.png') }}">
                        </div>
                        <div class="col-8">
                            <h6 class="card-titles">Pegawai</h6>
                            <h3 class="card-text green-text text-bold" id="jumlah-pegawai">0</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash click-card cursor-pointer" data-box="bpjsehat">
                    <div class="row">
                        <div class="col-4">
                            <img alt="heart" class="image-icon" src="{{ url('/asset_sdm/img/heartbeat.png') }}">
                        </div>
                        <div class="col-8">
                            <h6 class="card-titles">BPJS Kesehatan</h6>
                            <h3 class="card-text red-text text-bold" id="jumlah-bpjs-kes">0</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash click-card cursor-pointer" data-box="bpjskerja">
                    <div class="row">
                        <div class="col-4">
                            <img alt="helmet" class="image-icon" src="{{ url('/asset_sdm/img/helmet.png') }}">
                        </div>
                        <div class="col-8">
                            <h6 class="card-titles">BPJS Ketenagakerjaan</h6>
                            <h3 class="card-text orange-text text-bold" id="jumlah-bpjs-ker">0</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash click-card cursor-pointer" data-box="client">
                    <div class="row">
                        <div class="col-4">
                            <img alt="client" class="image-icon" src="{{ url('/asset_sdm/img/corporation.png') }}">
                        </div>
                        <div class="col-8">
                            <h6 class="card-titles">Klien</h6>
                            <h3 class="card-text blue-text text-bold" id="jumlah-client">0</h3>
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
                                    <div class="row click-content cursor-pointer" data-gender="L">
                                        <div class="col-3">
                                            <img alt="male" class="image-icon-small" src="{{ url('/asset_sdm/img/Pria.svg') }}">
                                        </div>
                                        <div class="col-9">
                                            <p class="card-subtitle">Pria</p>
                                            <p class="card-text" id="jumlah-pria" data-filter="L">0</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row click-content cursor-pointer" data-gender="P">
                                        <div class="col-3">
                                            <img alt="female" class="image-icon-small" src="{{ url('/asset_sdm/img/Wanita.svg') }}">
                                        </div>
                                        <div class="col-9">
                                            <p class="card-subtitle">Wanita</p>
                                            <p class="card-text" id="jumlah-wanita" data-filter="P">0</p>
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
                    <h6 class="card-title-2 text-bold">Kelompok Umur (Tahun)</h6>
                    <div id="umur-chart"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="dekstop-3" class="dekstop-3 pb-1 m-b-25">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash">
                    <h6 class="card-title-2 text-bold">Unit</h6>
                    <div id="unit-chart"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6">
                <div class="card card-dash">
                    <h6 class="card-title-2 text-bold">Unit Pegawai</h6>
                    <div id="unit-column-chart"></div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash">
                    <h6 class="card-title-2 text-bold">Rentang Gaji (Juta)</h6>
                    <div id="gaji-chart"></div>
                </div>
            </div>
        </div>
    </section>
</section>
{{-- END DEKSTOP --}}

@include('esaku.sdm.components.fDashPegawaiDetail')
@include('esaku.sdm.components.fDashPegawaiCV')
@include('esaku.sdm.components.fDashBPJSDetail')
@include('esaku.sdm.components.fDashClientDetail')
{{-- <script type="text/javascript">
var dataTable = null;
var $bpjs = 0;
var $http = null;

$('#jumlah-pria').click(function() {
    var filter = { jk: $(this).data('filter') }
    generateTabelKaryawan(filter)
})

$('#jumlah-wanita').click(function() {
    var filter = { jk: $(this).data('filter') }
    generateTabelKaryawan(filter)
})

$('#box-pegawai').click(function() {
    generateTabelKaryawan()
})

$('#to-main-dash').click(function() {
    $('#detail-1').hide();
    $('#main-dash').show();
})

$('#to-main-dash-from-bpjs').click(function() {
    $('#detail-3').hide();
    $('#main-dash').show();
})

$('#to-main-dash-from-client').click(function() {
    $('#detail-4').hide();
    $('#main-dash').show();
})

$('#to-detail-1').click(function() {
    $('#detail-2').hide();
    $('#detail-1').show();
})

$('#datatable-karyawan tbody').on('click', 'td', function() {
    var data = dataTable.row($(this).parents('tr')).data()
    generateDetailKaryawan(data.nik)    
})

$('#box-bpjs-sehat').click(function() {
    $bpjs = 0;
    $('#no-bpjs').attr('placeholder', 'Nomor BPJS PPU')
    $('#no-non-bpjs').attr('placeholder', 'Nomor BPJS Non PPU')
    generateDetailBPJSKesehatan()
})

$('#box-bpjs-kerja').click(function() {
    $bpjs = 1;
    $('#no-bpjs').attr('placeholder', 'Nomor BPJS Ketenagaan Aktif')
    $('#no-non-bpjs').attr('placeholder', 'Nomor BPJS Ketenagaan Nonaktif')
    generateDetailBPJSKerja()
})

$('#box-client').click(function() {
    generateListKomposisiClient()
    generateKomposisiClient()
})

$('#no-bpjs').on('input', function() {
    if($http) {
        console.log('dibatalkan requeest')
        $http.abort()
    }

    var html = '';
    var url = null;
    if($bpjs == 0) {
        url = "{{ url('esaku-dash/sdm-searchbpjs-sehat') }}";
    } else {
        url = "{{ url('esaku-dash/sdm-searchbpjs-kerja') }}";
    }

    $http = $.ajax({
            type: 'GET',
            url: url,
            data: { bpjs: $(this).val() },
            dataType: 'json',
            async:true,
            beforeSend: function() {
                $('#table-bpjs tbody').empty()
                html = `<tr>
                    <td colspan="4" style="text-align: center;">Memuat data...</td>    
                </tr>`
                $('#table-bpjs tbody').append(html)
                html = '';
            },
            success:function(result) {
                $('#table-bpjs tbody').empty()
                var data = result.data;
                if(data.status) {
                    if(data.data.length > 0) {
                        var no = 1;
                        for(var i=0;i<data.data.length;i++) {
                            var row = data.data[i];
                            html += `<tr>
                                    <td>${no}</td>    
                                    <td>${row.nik}</td>    
                                    <td>${row.nama}</td>    
                                    <td>${row.no_bpjs}</td>    
                                </tr>`
                            no++;
                        }
                    } else {
                        html += `<tr>
                        <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                        </tr>`
                    }
                } else {
                    html += `<tr>
                    <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                    </tr>`
                }
                
                $('#table-bpjs tbody').append(html)
            },
        });
})

$('#no-non-bpjs').on('input', function() {
    if($http) {
        console.log('dibatalkan requeest')
        $http.abort()
    }

    var html = '';
    var url = null;
    if($bpjs == 0) {
        url = "{{ url('esaku-dash/sdm-searchnonbpjs-sehat') }}";
    } else {
        url = "{{ url('esaku-dash/sdm-searchnonbpjs-kerja') }}";
    }

    $http = $.ajax({
            type: 'GET',
            url: url,
            data: { bpjs: $(this).val() },
            dataType: 'json',
            async:true,
            beforeSend: function() {
                $('#table-bpjs tbody').empty()
                html = `<tr>
                    <td colspan="4" style="text-align: center;">Memuat data...</td>    
                </tr>`
                $('#table-bpjs tbody').append(html)
                html = '';
            },
            success:function(result) {
                $('#table-bpjs tbody').empty()
                var data = result.data;
                if(data.status) {
                    if(data.data.length > 0) {
                        var no = 1;
                        for(var i=0;i<data.data.length;i++) {
                            var row = data.data[i];
                            html += `<tr>
                                    <td>${no}</td>    
                                    <td>${row.nik}</td>    
                                    <td>${row.nama}</td>    
                                    <td>${row.no_bpjs}</td>    
                                </tr>`
                            no++;
                        }
                    } else {
                        html += `<tr>
                        <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                        </tr>`
                    }
                } else {
                    html += `<tr>
                    <td colspan="4" style="text-align: center;">Data tidak ditemukan</td>    
                    </tr>`
                }
                
                $('#table-bpjs tbody').append(html)
            },
        });
})

$.ajax({
    type: 'GET',
    url: "{{ url('esaku-dash/sdm-dash') }}",
    dataType: 'json',
    async:false,
    success:function(result){    
        var data = result.data;
        if(data.status) {
            var dataBox = {
                jumlah_karyawan: format_number(data.jumlah_karyawan[0].jumlah),
                jumlah_kesehatan: format_number(data.jumlah_kesehatan[0].jumlah),
                jumlah_kerja: format_number(data.jumlah_kerja[0].jumlah),
                jumlah_pria: format_number(data.jumlah_pria[0].jumlah),
                jumlah_wanita: format_number(data.jumlah_wanita[0].jumlah),
                jumlah_client: format_number(data.jumlah_client)
            }

            generateDataBox(dataBox)
            generateChartPendidikan(data.tingkat_pendidikan)
            // generateChartLoker(data.lokasi_kerja)
            generateChartJabatan(data.unit)
            generateChartJabatanColumn(data.unit)
            generateDataGaji()
            generateDataUmur()
        }
    }
});

function generateListKomposisiClient() { 
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-list-client') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            var response = result.data
            if(response.status) {
                $('#table-data-client tbody').empty()
                if(response.data.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<response.data.length;i++) {
                        var row = response.data[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.client}</td>    
                            <td>${row.fungsi}</td>    
                            <td>${row.alamat}</td>    
                            <td style="text-align: right;">${sepNum(row.jumlah)}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-data-client tbody').append(html)
                }
            }
        }
    });
}

function generateDataUmur() {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-umur') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            var data = result.data;
            
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
                    categories: data.categories,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                tooltip: {
                    enabled: true
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
                    data: data.value,
                    color: '#ffb703'
                }]
            });
        }
    });
}

function generateDataGaji() {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-gaji') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            var data = result.data;
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
                    categories: data.categories,
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: ''
                    }
                },
                tooltip: {
                    enabled: true
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
                    data: data.value,
                    color: '#1e3a8a'
                }]
            });
        }
    });
}

function generateChartJabatanColumn(data) {
    if(data.length > 0) {
        var categories = [];
        var chartData = [];

        for(var i=0;i<data.length;i++) {
            var dt = data[i];
            categories.push(dt.nama_unit)
            chartData.push([dt.nama_unit, parseFloat(dt.jumlah), dt.kode_unit])
        }

        Highcharts.chart('jabatan-column-chart', {
            chart: { 
                type: 'column',
                height: 238 
            },
            title: { text: '' },
            subtitle: { text: '' },
            exporting:{ enabled: false },
            legend:{ enabled:true },
            credits: { enabled: false },
            xAxis: {
                categories: categories,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                enabled: true,
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    point: {
                        events: {
                            click: function() {
                                var filter = { kode_jab: this.kode }
                                generateTabelKaryawan(filter)
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Jumlah',
                keys: ['name', 'y', 'kode'],
                data: chartData,
                color: '#f87171'
            }]
        });
    }
}

function generateKomposisiClient() {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-client') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            var data = result.data
            var categories = data.categories
            var komposisi = data.komposisi
            var chart = [];

            if(categories.length > 0) {
                for(var i=0;i<categories.length;i++) {
                    chart.push({ name: categories[i], y:komposisi[i] })
                }
            }

            Highcharts.chart('komposisi-client-chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    // height: 239
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
                        size: 250,
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Jumlah',
                    colorByPoint: true,
                    data: chart
                }]
            });

            $('#main-dash').hide();
            $('#detail-4').show();
        }
    });   
}

function generateDetailBPJSKerja() {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-bpjs-kerja') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            var data = result.data
            if(data.status) {
                $('#table-bpjs tbody').empty()
                $('#table-non-bpjs tbody').empty()
                $('#header-bpjs').text('Data BPJS Tenaga Kerja')
                $('#jumlah-bpjs').text(data.jumlah_terdaftar)
                $('#persentase-bpjs').text(data.percentage_terdaftar + "%")
                $('#jumlah-non-bpjs').text(data.jumlah_non_terdaftar)
                $('#persentase-non-bpjs').text(data.percentage_non_terdaftar + "%")
                $('.ket-bpjs').text('BPJS Ketenagakerjaan Aktif')
                $('.ketnon-bpjs').text('BPJS Ketenagakerjaan Nonaktif')

                if(data.data_terdaftar.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<data.data_terdaftar.length;i++) {
                        var row = data.data_terdaftar[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-bpjs tbody').append(html)
                }

                 if(data.data_non_terdaftar.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<data.data_non_terdaftar.length;i++) {
                        var row = data.data_non_terdaftar[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-non-bpjs tbody').append(html)
                }

                $('#main-dash').hide();
                $('#detail-3').show();
            }
        }
    });
}

function generateDetailBPJSKesehatan() {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-bpjs-sehat') }}",
        dataType: 'json',
        async:false,
        success:function(result){    
            var data = result.data
            if(data.status) {
                $('#table-bpjs tbody').empty()
                $('#table-non-bpjs tbody').empty()
                $('#header-bpjs').text('Data BPJS Kesehatan')
                $('#jumlah-bpjs').text(data.jumlah_terdaftar)
                $('#persentase-bpjs').text(data.percentage_terdaftar + "%")
                $('#jumlah-non-bpjs').text(data.jumlah_non_terdaftar)
                $('#persentase-non-bpjs').text(data.percentage_non_terdaftar + "%")
                $('.ket-bpjs').text('BPJS PPU (Peserta Penerima Upah)')
                $('.ketnon-bpjs').text('Non PPU (Peserta Penerima Upah)')

                if(data.data_terdaftar.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<data.data_terdaftar.length;i++) {
                        var row = data.data_terdaftar[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-bpjs tbody').append(html)
                }

                 if(data.data_non_terdaftar.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<data.data_non_terdaftar.length;i++) {
                        var row = data.data_non_terdaftar[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.nik}</td>    
                            <td>${row.nama}</td>    
                            <td>${row.no_bpjs}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-non-bpjs tbody').append(html)
                }

                $('#main-dash').hide();
                $('#detail-3').show();
            }
        }
    });
}

function generateDetailKaryawan(nik) {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-karyawan-detail') }}",
        data: {nik: nik},
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.status) {
                var data = result.data.data;
                var html = null;

                if(data[0].no_kontrak == '-') {
                    data[0].tgl_kontrak = '-' 
                    data[0].tgl_kontrak_akhir = '-' 
                }

                html = `
                    <h6 class="text-center">Profile Lengkap Karyawan</h6>
                    <div class="row">
                        <div class="col-9">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 201px;">NIK</td>  
                                        <td>: ${data[0].nik}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama</td>      
                                        <td>: ${data[0].nama}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Jenis Kelamin</td>      
                                        <td>: ${data[0].jk}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Agama</td>      
                                        <td>: ${data[0].nama_agama}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tempat, Tanggal Lahir</td>      
                                        <td>: ${data[0].tempat}, ${data[0].tgl_lahir}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No. NPWP</td>      
                                        <td>: ${data[0].npwp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Provinsi</td>      
                                        <td>: ${data[0].provinsi}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kota/kabupaten</td>      
                                        <td>: ${data[0].kota}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kecamatan</td>      
                                        <td>: ${data[0].kecamatan}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kelurahan</td>      
                                        <td>: ${data[0].kelurahan}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Alamat</td>      
                                        <td>: ${data[0].alamat}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kode POS</td>      
                                        <td>: ${data[0].kode_pos}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor Telepon</td>      
                                        <td>: ${data[0].no_telp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor Handphone</td>      
                                        <td>: ${data[0].no_hp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Email</td>      
                                        <td>: ${data[0].email}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor NPWP</td>      
                                        <td>: ${data[0].npwp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Bank</td>      
                                        <td>: ${data[0].bank}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Cabang</td>      
                                        <td>: ${data[0].cabang}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor Rekening</td>      
                                        <td>: ${data[0].no_rek}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama Rekening</td>      
                                        <td>: ${data[0].nama_rek}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No Kontrak</td>      
                                        <td>: ${data[0].no_kontrak}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tanggal Mulai Kontrak</td>      
                                        <td>: ${data[0].tgl_kontrak}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tanggal Berakhir Kontrak</td>      
                                        <td>: ${data[0].tgl_kontrak_akhir}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Status Menikah</td>      
                                        <td>: ${data[0].status_nikah}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Golongan Darah</td>      
                                        <td>: ${data[0].gol_darah}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Skill</td>  
                                        <td>: ${data[0].skill}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Fungsi</td>  
                                        <td>: ${data[0].fungsi}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor BPJS Kesehatan</td>  
                                        <td>: ${data[0].no_bpjs}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor BPJS Ketenagakerjaan</td>  
                                        <td>: ${data[0].no_bpjs_kerja}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Atasan Langsung</td>  
                                        <td>: ${data[0].atasan_langsung}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Atasan Tidak Langsung</td>  
                                        <td>: ${data[0].atasan_t_langsung}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama Unit</td>  
                                        <td>: ${data[0].nama_unit}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama Profesi</td>  
                                        <td>: ${data[0].nama_profesi}</td>
                                    </tr>
                                </tbody>       
                            </table>    
                            <br />
                            <h6 class="text-note">CLIENT</h6>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 201px;">Nama Client</td>  
                                        <td>: ${data[0].client}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Area</td>  
                                        <td>: ${data[0].area}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kota</td>  
                                        <td>: ${data[0].kota_area}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">FM</td>  
                                        <td>: ${data[0].fm}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">BM</td>  
                                        <td>: ${data[0].bm}</td>
                                    </tr>
                                </tbody>       
                            </table>    
                        </div>    
                        <div class="col-3">
                            <div class="box-empty-image">
                                <div>
                                    <p class="text-image">Foto diri belum ada</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $('#data-detail-karyawan').html(html);
                $('#detail-1').hide();
                $('#detail-2').show();
            }    
        }
    });
}

function generateTabelKaryawan(filter=null) {
    dataTable = $('#datatable-karyawan').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('esaku-dash/sdm-karyawan') }}",
            'cache': false,
            'async':false,
            'type': 'GET',
            'data': filter,
            'dataSrc' : function(result) {
                return result.data.data
            }
        },
        'columns': [
            { data: 'nik' },
            { data: 'nama_pegawai' },
            { data: 'no_bpjs_kerja' },
            { data: 'nama_jabatan' },
            { data: 'nama_loker' },
            { data: 'client' }
        ],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    $('#main-dash').hide();
    $('#detail-1').show();
}

function generateDataBox(data) {
    $('#jumlah-pegawai').text(data.jumlah_karyawan)
    $('#jumlah-bpjs-kes').text(data.jumlah_kesehatan)
    $('#jumlah-bpjs-ker').text(data.jumlah_kerja)
    $('#jumlah-pria').text(data.jumlah_pria)
    $('#jumlah-wanita').text(data.jumlah_wanita)
    $('#jumlah-client').text(data.jumlah_client)
}

function generateChartPendidikan(data) {
    if(data.length > 0) {
        var categories = [];
        var chartData = [];

        for(var i=0;i<data.length;i++) {
            var dt = data[i];
            categories.push(dt.kode_strata)
            chartData.push(parseFloat(dt.jumlah))
        }

        Highcharts.chart('pendidikan-chart', {
            chart: { 
                type: 'column',
                height: 160 
            },
            title: { text: '' },
            subtitle: { text: '' },
            exporting:{ enabled: false },
            legend:{ enabled:true },
            credits: { enabled: false },
            xAxis: {
                categories: categories,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                enabled: true
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    point: {
                        events: {
                            click: function() {
                                var filter = { pendidikan: this.category }
                                generateTabelKaryawan(filter)
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Jumlah',
                data: chartData,
                color: '#059669'
            }]
        });
    }
}

// function generateChartLoker(data) {
    // if(data.length > 0) {
    //     var categories = [];
    //     var chartData = [];

    //     for(var i=0;i<data.length;i++) {
    //         var dt = data[i];
    //         categories.push(dt.kode_loker)
    //         chartData.push(parseFloat(dt.jumlah))
    //     }

    //     Highcharts.chart('lokasi-chart', {
    //         chart: { 
    //             type: 'column',
    //             height: 238 
    //         },
    //         title: { text: '' },
    //         subtitle: { text: '' },
    //         exporting:{ enabled: false },
    //         legend:{ enabled:false },
    //         credits: { enabled: false },
    //         xAxis: {
    //             categories: categories,
    //             crosshair: true
    //         },
    //         yAxis: {
    //             min: 0,
    //             title: {
    //                 text: ''
    //             }
    //         },
    //         tooltip: {
    //             enabled: true,
    //         },
    //         plotOptions: {
    //             series: {
    //                 label: {
    //                     connectorAllowed: false
    //                 },
    //                 point: {
    //                     events: {
    //                         click: function() {
    //                             var filter = { kode_loker: this.category }
    //                             generateTabelKaryawan(filter)
    //                         }
    //                     }
    //                 }
    //             }
    //         },
    //         series: [{
    //             name: 'Jumlah',
    //             data: chartData,
    //             color: '#f87171'
    //         }]
    //     });
    // }
// }

function generateChartJabatan(data) {
    if(data.length > 0) {
        var chartData = []
        var total = 0;

        for(var i=0;i<data.length;i++) { 
            var dt = data[i];
            total = parseFloat(dt.jumlah) + total
        }

        var total = 0;
        for(var i=0;i<data.length;i++) {
            var dt = data[i];
            total = total + parseFloat(dt.jumlah);
        }
        for(var i=0;i<data.length;i++) {
            var dt = data[i];
            var value = (parseFloat(dt.jumlah) / total) * 100;
            chartData.push({ name: dt.nama_unit, y:parseFloat(dt.jumlah) })
        }

        // Highcharts.setOptions({
        //     colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        // });

        Highcharts.theme = {
            colors: ['#1d4ed8', '#fbbf24', '#d1d5db', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        }; 
        
        var color =  ['#1d4ed8', '#fbbf24', '#d1d5db', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        Highcharts.chart('jabatan-chart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                height: 239
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
                    showInLegend: true,
                    size: 92,
                }
            },
            series: [{
                name: 'Jumlah',
                colorByPoint: true,
                data: chartData
            }]
        }, function() {
            console.log(this)
            var series = this.series;
            for(var i=0;i<series.length;i++) {
                var point = series[i].data;
                for(var j=0;j<point.length;j++) {
                    point[j].graphic.element.style.fill = color[j]
                }
            }
        });
    }
}
</script> --}}