<link rel="stylesheet" href="{{ asset('dash-asset/dash-esaku/dash-sdm-dekstop.css') }}" />
{{-- DEKSTOP --}}
<section id="main-dash">
    <section id="dekstop-1" class="desktop-1 m-b-25 col-dekstop">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash" id="box-pegawai">
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
                <div class="card card-dash" id="box-bpjs-sehat">
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
                <div class="card card-dash" id="box-bpjs-kerja">
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
                <div class="card card-dash" id="box-client">
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
                                    <div class="row">
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
                                    <div class="row">
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
                    <h6 class="card-title-2 text-bold">Jabatan</h6>
                    <div id="jabatan-chart"></div>
                    {{-- <div class="row p-l-4">
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
                    </div> --}}
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6">
                <div class="card card-dash">
                    <h6 class="card-title-2 text-bold">Jabatan Pegawai</h6>
                    <div id="jabatan-column-chart"></div>
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

<section id="detail-1" style="display: none;">
    <section id="dekstop-4" class="dekstop-4 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12 header-content">
                            <div class="glyph-icon iconsminds-left" id="to-main-dash"></div>
                            <h6 class="card-title-2 text-bold text-medium detail-card">Data Pegawai</h6>
                        </div>
                    </div>
                    <hr/>
                    <div class="card-body row">
                        <div class="col-12">
                            <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                            <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                                <div class="page-countdata">
                                    <label> Menampilkan 
                                        <select style="border:none" id="page-count">
                                            <option value="10">10 per halaman</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                                <div class="input-group input-group-sm" style="max-width:321px;float:right">
                                    <input type="text" class="form-control" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;max-width:230px !important">
                                    <div class="input-group-append" style="max-width:92px !important;width:100%">
                                        <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;width:100%"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="datatable-karyawan" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">No Telp</th>
                                            <th class="text-center">Client</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section id="detail-2" style="display: none;">
    <section id="dektop-4" class="dekstop-4 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12">
                            <div class="glyph-icon iconsminds-left" id="to-detail-1"></div>
                            <h6 class="card-title-2 text-bold text-medium">CV Pegawai</h6>
                        </div>
                    </div>
                    <div class="card-body box-cv" id="data-cv"></div>
                </div>
            </div>
        </div>
    </section>
</section>

<section id="detail-3" style="display: none;">
    <section id="dektop-5" class="dekstop-5 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12">
                            <div class="glyph-icon iconsminds-left" id="to-main-dash-from-bpjs"></div>
                            <h6 class="card-title-2 text-bold text-medium detail-card" id="header-bpjs"></h6>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-6">
                            <div class="card card-dash-2 bg-blue">
                                <div class="card-content">
                                    <p id="label-card-bpjs" class="label-card">Jumlah BPJS</p>
                                    <div class="row">
                                        <div class="col-10 count-card" id="jumlah-bpjs">
                                            0
                                        </div>
                                        <div class="col-2">
                                            <p class="percentage-card" id="persentase-bpjs">0%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-dash-2 no-p">
                                <div class="card-header bg-blue">
                                    <p id="label-table-bpjs" class="label-table-bpjs">
                                        Data BPJS <span id="jenis-bpjs"></span>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-detail" id="table-detail-bpjs">
                                        <table id="table-bpjs" class="table table-hover table-borderless">
                                            <thead>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>ID BPJS</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                           <div class="card card-dash-2 bg-red">
                                <div class="card-content">
                                    <p id="label-card-bpjs" class="label-card">Jumlah Non BPJS</p>
                                    <div class="row">
                                        <div class="col-10 count-card" id="jumlah-non-bpjs">
                                            0
                                        </div>
                                        <div class="col-2">
                                            <p class="percentage-card" id="persentase-non-bpjs">0%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-dash-2 no-p">
                                <div class="card-header bg-red">
                                    <p id="label-table-bpjs" class="label-table-bpjs">
                                        Data Non BPJS
                                    </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-detail" id="table-detail-non-bpjs">
                                        <table id="table-non-bpjs" class="table table-hover table-borderless">
                                            <thead>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>ID BPJS</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section id="detail-4" style="display: none;">
    <section id="dektop-6" class="dekstop-6 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12 header-content">
                            <div class="glyph-icon iconsminds-left" id="to-main-dash-from-client"></div>
                            <h6 class="card-title-2 text-bold text-medium detail-card">Komposisi Klien</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="komposisi-client-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
{{-- END DEKSTOP --}}

<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
var dataTable = null;

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
    var filter = { 'nik[0]': '=', 'nik[1]': data.nik, 'nik[2]':'' }
    generateCVKaryawan(filter)    
})

$('#box-bpjs-sehat').click(function() {
    generateDetailBPJSKesehatan()
})

$('#box-bpjs-kerja').click(function() {
    generateDetailBPJSKerja()
})

$('#box-client').click(function() {
    generateKomposisiClient()
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
            generateChartJabatan(data.jabatan)
            generateChartJabatanColumn(data.jabatan)
            generateDataGaji()
            generateDataUmur()
        }
    }
});

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
            categories.push(dt.nama_jabatan)
            chartData.push(parseFloat(dt.jumlah))
        }

        Highcharts.chart('jabatan-column-chart', {
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
                                var filter = { kode_loker: this.category }
                                generateTabelKaryawan(filter)
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Jumlah',
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
                    i++;
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
                $('#jenis-bpjs').text('BPJS Kesehatan')
                $('#jumlah-bpjs').text(data.jumlah_terdaftar)
                $('#persentase-bpjs').text(data.percentage_terdaftar + "%")
                $('#jumlah-non-bpjs').text(data.jumlah_non_terdaftar)
                $('#persentase-non-bpjs').text(data.percentage_non_terdaftar + "%")

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
                $('#jenis-bpjs').text('BPJS Kesehatan')
                $('#jumlah-bpjs').text(data.jumlah_terdaftar)
                $('#persentase-bpjs').text(data.percentage_terdaftar + "%")
                $('#jumlah-non-bpjs').text(data.jumlah_non_terdaftar)
                $('#persentase-non-bpjs').text(data.percentage_non_terdaftar + "%")

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

function generateCVKaryawan(filter=null) {
    $.ajax({
        type: 'POST',
        url: "{{ url('esaku-report/sdm-lap-karyawanCv') }}",
        data: filter,
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.status) {
                var data = result.res.data;
                var dt_keluarga = result.res.data_keluarga;
                var dt_dinas = result.res.data_dinas;
                var dt_latihan = result.res.data_pelatihan;
                var dt_pendidikan = result.res.data_pendidikan;
                var dt_penghargaan = result.res.data_penghargaan;
                var dt_sanksi = result.res.data_sanksi;
                var html = null;
                console.log(result)
                html = `
                    <h6 class="text-center">Curiculum Vitae Karyawan</h6>
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
                                        <td style="width: 201px;">Status Pajak</td>      
                                        <td>: ${data[0].kode_pajak}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No. NPWP</td>      
                                        <td>: ${data[0].npwp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Alamat</td>      
                                        <td>: ${data[0].alamat}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kota</td>      
                                        <td>: ${data[0].kota}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kode Pos</td>      
                                        <td>: ${data[0].kode_pos}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No. Telp</td>      
                                        <td>: ${data[0].no_telp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No. HP</td>      
                                        <td>: ${data[0].no_hp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Email</td>      
                                        <td>: ${data[0].email}</td>    
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
                                        <td style="width: 201px;">No. Rekening</td>      
                                        <td>: ${data[0].no_rek}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama Rekening</td>      
                                        <td>: ${data[0].nama_rek}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No. SK</td>      
                                        <td>: ${data[0].no_sk}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tanggal SK</td>      
                                        <td>: ${data[0].tgl_sk}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Status Nikah</td>      
                                        <td>: ${data[0].status_nikah}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tanggal Nikah</td>      
                                        <td>: ${data[0].tgl_nikah}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Golongan Darah</td>      
                                        <td>: ${data[0].gol_darah}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Ibu Kandung</td>      
                                        <td>: ${data[0].ibu_kandung}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor KK</td>      
                                        <td>: ${data[0].no_kk}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kelurahan</td>      
                                        <td>: ${data[0].kelurahan}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kecamatan</td>      
                                        <td>: ${data[0].kecamatan}</td>    
                                    </tr>
                                </tbody>       
                            </table>    
                            <br />
                            <h6 class="text-note">DATA KELUARGA</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 30px;">Nama</th>    
                                        <th class="text-center" style="width: 15px;">Status</th>
                                        <th class="text-center" style="width: 20px;">Jenis Kelamin</th>    
                                        <th class="text-center" style="width: 20px;">Tanggungan</th>    
                                        <th class="text-center" style="width: 25px;">Tempat Lahir</th>
                                        <th class="text-center" style="width: 25px;">Tanggal Lahir</th>    
                                    </tr>    
                                </thead>
                                <tbody>`
                                if(dt_keluarga[0].length > 0) {
                                    for(var j=0;j<dt_keluarga[0].length;j++) {
                                        var keluarga = dt_keluarga[0][j];
                                        html += `
                                            <tr>
                                                <td>${keluarga.nama}</td>
                                                <td>${keluarga.jenis}</td>
                                                <td>${keluarga.jk}</td>
                                                <td>${keluarga.status_kes}</td>
                                                <td>${keluarga.tempat}</td>
                                                <td>${keluarga.tgl_lahir}</td>
                                            </tr>`;
                                    }
                                }
                        html += `</tbody>
                        </table>
                        <br />
                        <h6 class="text-note">DATA KEDINASAN</h6>
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 40px;">No. SK</th>    
                                        <th class="text-center" style="width: 15px;">Tanggal</th>
                                        <th class="text-center">Keterangan</th>       
                                    </tr>    
                                </thead>
                                <tbody>`
                                if(dt_dinas[0].length > 0) {
                                    for(var k=0;k<dt_dinas[0].length;k++) {
                                        var dinas = dt_dinas[0][k];
                                        html += `
                                            <tr>
                                                <td>${dinas.no_sk}</td>
                                                <td>${dinas.tgl_sk}</td>
                                                <td>${dinas.nama}</td>
                                            </tr>`;
                                    }
                                }
                        html += `</tbody>
                        </table>
                        <br/>
                        <h6 class="text-note">DATA PENDIDIKAN</h6>
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 30px;">Nama</th>    
                                        <th class="text-center" style="width: 10px;">Tahun</th>
                                        <th class="text-center" style="width: 25px;">Strata</th>       
                                        <th class="text-center" style="width: 40px;">Jurusan</th>       
                                    </tr>    
                                </thead>
                                <tbody>`
                                if(dt_pendidikan[0].length > 0) {
                                    for(var l=0;l<dt_pendidikan[0].length;l++) {
                                        var pendidikan = dt_pendidikan[0][l];
                                        html += `
                                            <tr>
                                                <td>${pendidikan.nama}</td>
                                                <td>${pendidikan.tahun}</td>
                                                <td>${pendidikan.nama_strata}</td>
                                                <td>${pendidikan.nama_jurusan}</td>
                                            </tr>`;
                                    }
                                }
                        html += `</tbody>
                        </table>
                        <br/>
                        <h6 class="text-note">DATA PELATIHAN</h6>
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 30px;">Nama</th>    
                                        <th class="text-center" style="width: 50px;">Penyelenggara</th>
                                        <th class="text-center" style="width: 30px;">Tanggal Mulai</th>       
                                        <th class="text-center" style="width: 30px;">Tanggal Selesai</th>       
                                    </tr>    
                                </thead>
                                <tbody>`
                                if(dt_latihan[0].length > 0) {
                                    for(var m=0;m<dt_latihan[0].length;m++) {
                                        var pelatihan = dt_latihan[0][m];
                                        html += `
                                            <tr>
                                                <td>${pelatihan.nama}</td>
                                                <td>${pelatihan.panitia}</td>
                                                <td>${pelatihan.tgl_mulai}</td>
                                                <td>${pelatihan.tgl_selesai}</td>
                                            </tr>`;
                                    }
                                }
                        html += `</tbody>
                        </table>
                        <br/>
                        <h6 class="text-note">DATA PENGHARGAAN</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>    
                                        <th class="text-center" style="width: 25px;">Tanggal</th>       
                                    </tr>    
                                </thead>
                                <tbody>`
                                if(dt_penghargaan[0].length > 0) {
                                    for(var n=0;n<dt_penghargaan[0].length;n++) {
                                        var penghargaan = dt_penghargaan[0][n];
                                        html += `
                                            <tr>
                                                <td>${penghargaan.nama}</td>
                                                <td>${penghargaan.tanggal}</td>
                                            </tr>`;
                                    }
                                }
                        html += `</tbody>
                        </table>
                        <br/>
                        <h6 class="text-note">DATA SANKSI</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama</th>    
                                        <th class="text-center" style="width: 25px;">Tanggal</th>       
                                        <th class="text-center" style="width: 30px;">Jenis Sanksi</th>       
                                    </tr>    
                                </thead>
                                <tbody>`
                                if(dt_sanksi[0].length > 0) {
                                    for(var o=0;o<dt_sanksi[0].length;o++) {
                                        var sanksi = dt_sanksi[0][o];
                                        html += `
                                            <tr>
                                                <td>${sanksi.nama}</td>
                                                <td>${sanksi.tanggal}</td>
                                                <td>${sanksi.jenis}</td>
                                            </tr>`;
                                    }
                                }
                        html += `</tbody>
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

                $('#data-cv').html(html);
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
            { data: 'nama_jabatan' },
            { data: 'no_telp' },
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
            legend:{ enabled:false },
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

        for(var i=0;i<data.length;i++) {
            var dt = data[i];
            var value = (parseFloat(dt.jumlah) / 352) * 100;
            chartData.push({ name: dt.nama_jabatan, y:parseFloat(dt.jumlah) })
        }

        Highcharts.setOptions({
            colors: ['#058DC7', '#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        });

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
                    size: 92,
                }
            },
            series: [{
                name: 'Jumlah',
                colorByPoint: true,
                data: chartData
            }]
        });
    }
}
</script>