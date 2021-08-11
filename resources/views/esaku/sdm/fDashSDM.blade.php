<link rel="stylesheet" href="{{ asset('dash-asset/dash-esaku/dash-sdm-dekstop.css') }}" />
{{-- DEKSTOP --}}
<section id="main-dash">
    <section id="dekstop-1" class="desktop-1 m-b-25 col-dekstop">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3">
                <div class="card card-dash" id="box-pegawai">
                    <div class="row">
                        <div class="col-4">
                            <span class="glyph-icon iconsminds-gey"></span>
                        </div>
                        <div class="col-8">
                            <h6 class="card-titles">Pegawai</h6>
                            <h3 class="card-text green-text text-bold" id="jumlah-pegawai">0</h3>
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
                            <h3 class="card-text red-text text-bold" id="jumlah-bpjs-kes">0</h3>
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
                            <h3 class="card-text orange-text text-bold" id="jumlah-bpjs-ker">0</h3>
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
                            <h3 class="card-text blue-text text-bold" id="jumlah-bpjs-klien">0</h3>
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
                                            <p class="card-text" id="jumlah-pria" data-filter="L">0</p>
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
</section>

<section id="detail-1" style="display: none;">
    <section id="dekstop-4" class="dekstop-4 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-9">
                            <h6 class="card-title-2 text-bold text-medium">Data Pegawai</h6>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary pull-right" id="to-main-dash">Back</button>
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
                                            <th class="text-center">Email</th>
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
{{-- END DEKSTOP --}}

<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
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
                jumlah_wanita: format_number(data.jumlah_wanita[0].jumlah)
            }

            generateDataBox(dataBox)
            generateChartPendidikan(data.tingkat_pendidikan)
            generateChartLoker(data.lokasi_kerja)
            generateChartJabatan(data.jabatan)
        }
    }
});

function generateTabelKaryawan(filter=null) {
    var dataTable = $('#datatable-karyawan').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('esaku-dash/sdm-karyawan') }}",
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
            { data: 'email' }
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

function generateChartLoker(data) {
    if(data.length > 0) {
        var categories = [];
        var chartData = [];

        for(var i=0;i<data.length;i++) {
            var dt = data[i];
            categories.push(dt.kode_loker)
            chartData.push(parseFloat(dt.jumlah))
        }

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
</script>