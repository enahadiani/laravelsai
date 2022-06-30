<link href="{{ asset('dash-siaga.css?version=_').time() }}" rel="stylesheet">
<link href="{{ asset('dash-siaga.css?version=_').time() }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-pembendaharaan.dekstop.css?version=_').time() }}" />

<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="{{ asset('main.js') }}"></script>


<script type="text/javascript">
    $('body').addClass('scroll-hide');
    window.scrollTo(0, 0);
    var $filter_lokasi = "";
    var $tahun = "{{ substr(Session::get('periode'),0,4) }}";
    var $filter1 = "Periode";
    var $filter2 = namaPeriodeBulan("{{ Session::get('periode') }}");
    var $month = "{{ substr(Session::get('periode'),4,2) }}";
    var $judulChart = null;
    var $filter1_kode = "YTM";
    var $filter2_kode = "{{ substr(Session::get('periode'),4,2) }}";
    var nilai = "";

    if ($filter1 == 'Periode') {
        $('#list-filter-2').find('.list').each(function() {
            if ($(this).data('bulan').toString() == $month) {
                $(this).addClass('selected')
                $month = $(this).data('bulan').toString();
                return false;
            }
        });
    }

    $('#year-filter').text($tahun)
    var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
    $('#select-text-fp').text(`${nama_filter} ${$filter2} ${$tahun}`)

    function updateAllChart() {
        getDataBox();
        getKontribusi();
        getPortofolio();
        getRKAvsReal();
}

    //Get Data Revenue
    function getDataBox() {
        $.ajax({
            url: "{{ url('siaga-dash/data-pend-box') }}",
            type: "GET",
            data: {
                "periode[0]": "=",
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode,
                "kode_lokasi": $filter_lokasi
            },
            dataType: 'json',
            async: true,
            success: function(result) {
                var data = result.data;
                var capai_rka = 0;
                var capai_yoy = 0;
                var nilai = 0;
                if (capai_rka < 100) {
                    $('#capai_rka-revenue').removeClass('green-text').addClass('red-text')
                    iconPdptAch = '&nbsp;'
                } else {
                    $('#capai_rka-revenue').removeClass('red-text').addClass('green-text')
                    iconPdptAch = '&nbsp;'
                }

                if (capai_yoy < 0) {
                    $('#capai_yoy-revenue').removeClass('green-text').addClass('red-text')
                    iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
                } else {
                    $('#capai_yoy-revenue').removeClass('red-text').addClass('green-text')
                    iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
                }

                $('#capai_rka-revenue').text(capai_rka.toFixed(2) + '%');
                $('#capai_yoy-revenue').text(capai_yoy.toFixed(2) + '%');
                $('#nilai-revenue').text(toMilyar(data.revenue.nilai, 1));
                $('#rka-revenue').text(toMilyar(data.revenue.rka, 1));
                $('#yoy-revenue').text(toMilyar(data.revenue.yoy, 1));
            }
        });
    }
    //End

    //Chart Revenue
    function getRKAvsReal() {
        $.ajax({
            url: "{{ url('siaga-dash/data-pend-rkavsreal') }}",
            type: "GET",
            data: {
                "periode[0]": "=",
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode,
                "kode_lokasi": $filter_lokasi
            },
            dataType: 'json',
            async: true,
            success: function(result) {
                Highcharts.chart('chart-capai', {

                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Pencapaian Realisasi Anggaran Portofolio',
                        align: 'left'
                    },
                    credits: {
                        enabled: false
                    },
                    xAxis: {
                        categories: result.data
                    },
                    yAxis: [{
                        min: 0,
                        title: {
                            text: ''
                        }
                    }],
                    legend: {
                        shadow: false
                    },
                    tooltip: {
                        shared: true

                    },
                    plotOptions: {
                        column: {
                            grouping: false,
                            shadow: false,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'RKA YTD',
                        color: '#DCDCDC',
                        data: result.rka_ytd,
                        pointPadding: 0.3,
                        pointPlacement: -0.2
                    }, {
                        name: 'Real YTD',
                        color: '#228B22',
                        data: result.real_ytd,
                        pointPadding: 0.4,
                        pointPlacement: -0.2
                    }, {
                        name: 'RKA FY',
                        color: '#F0E68C',
                        data: result.rka_fy,
                        tooltip: {
                            valuePrefix: '$',
                            valueSuffix: ' M'
                        },
                        pointPadding: 0.3,
                        pointPlacement: 0.2,

                    }, {
                        name: 'Real YTD',
                        color: '#FF0000',
                        data: result.real_fy,
                        tooltip: {
                            valuePrefix: '$',
                            valueSuffix: ' M'
                        },
                        pointPadding: 0.4,
                        pointPlacement: 0.2,

                    }]
                });
            }
        })
    }
    //end revenue

    //chart revenue contribusi
    function getKontribusi() {
        $.ajax({
            url: "{{ url('siaga-dash/data-pend-kontribusi') }}",
            type: "GET",
            data: {
                "periode[0]": "=",
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode,
                "kode_lokasi": $filter_lokasi
            },
            dataType: 'json',
            async: true,
            success: function(result) {
                var data = result.data;
                Highcharts.chart('chart-contribusi', {
                    chart: {

                        type: 'pie'
                    },
                    title: {
                        text: ''
                    },
                    credits: {
                        enabled: false
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: false,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -30,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            },
                            showInLegend: false
                        }
                    },
                    series: [{
                        name: 'Share',
                        colorByPoint: true,
                        minPointSize: 90,
                        innerSize: '30%',
                        zMin: 0,
                        data: data
                    }]
                });
            }
        })
    }
    //end revenue contribusi

    //chart portfolio
    function getPortofolio() {
        $.ajax({
            url: "{{ url('siaga-dash/data-pend-portofolio') }}",
            type: "GET",
            data: {
                "periode[0]": "=",
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode,
                "kode_lokasi": $filter_lokasi
            },
            dataType: 'json',
            async: true,
            success: function(result) {
                var data = result.data;
                Highcharts.chart('chart-PP', {
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: 'Pendapatan Portofolio Perbulan',
                        align: 'left'
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                        ]
                    },
                    credits: {
                        enabled: false
                    },
                    yAxis: {
                        title: {
                            text: 'Nilai'
                        }
                    },
                    tooltip: {
                        crosshairs: true,
                        shared: true
                    },
                    plotOptions: {
                        spline: {
                            marker: {
                                radius: 4,
                                lineColor: '#666666',
                                lineWidth: 1
                            }
                        }
                    },
                    series: [{
                        name: 'Bisnis AD',
                        marker: {
                            symbol: 'square'
                        },
                        data: data[0].data
                    }, {
                        name: 'Telco Solution',
                        marker: {
                            symbol: 'diamond'
                        },
                        data: data[1].data
                    }, {
                        name: 'BS Cabang',
                        marker: {
                            symbol: 'square'
                        },
                        data: data[2].data
                    }, {
                        name: 'Business Solution',
                        marker: {
                            symbol: 'diamond'
                        },
                        data: data[3].data
                    }]
                });
            }
        })
    }
    //end portfolio

    //Get Pendapatan 

    function getYTDvsYoY(){
        $.ajax({
            url: "{{ url('siaga-dash/data-pend-ytdvsyoy') }}",
            type: "GET",
            data: {
                "periode[0]": "=",
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode,
                "kode_lokasi": $filter_lokasi
            },
            dataType: 'json',
            async: true,
            success: function(result){
                var data=result.data;
                console.log(data);
                Highcharts.chart('chart-pendapatan', {
        chart: {
            type: 'bar'
        },
        exporting:{
                enabled: false,
        },
        credits:{
                enabled: false,
        },
        title: {
            text: ''
        },
        xAxis: {
                visible: false,
            categories: ['YOY','YTD'],
            title: {
                text: null
            }
        },
        yAxis: {
                visible: false,
            min: 0,
            title: {
                text: 'Population (millions)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            series:{
                groupPadding: 0,
            borderRadius: 6
            },
            bar: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        legend: {
                enabled:false
        },
        credits: {
            enabled: false
        },
        series: [{
                        name: 'AD',
                        data: [{
                            y: data.yoy,
                        color: '#d7d7d7',
                        },{ 
                            y: data.ytd,
                        color : '#900604'
                        }]
                    }]
                });
            }
        })
    }
        

    //End Pendapatan
</script>

<script type="text/javascript">
    // FILTER EVENT
    // KURANG TAHUN FILTER
    $('#kurang-tahun').click(function(event) {
        event.stopPropagation();
        $tahun = $tahun - 1;
        $('#year-filter').text($tahun);
    })

    // TAMBAH TAHUN FILTER
    $('#tambah-tahun').click(function(event) {
        event.stopPropagation();
        $tahun = $tahun + 1;
        $('#year-filter').text($tahun);
    })

    // MENAMPILKAN FILTER
    $('#custom-row').click(function(event) {
        event.stopPropagation();
        $('#filter-box').removeClass('hidden avoid-run')
    })

    // MENTRIGGER FILTER 1
    $('#list-filter-1 ul li').click(function(event) {
        event.stopPropagation();
        var html = '';
        var filter = $(this).text()
        $filter1 = filter
        $filter1_kode = $(this).data('filter1')
        $('#list-filter-1 ul li').not(this).removeClass('selected')
        $(this).addClass('selected')
        $('#list-filter-2').empty()
        if ($filter1 == 'Triwulan') {
            html += `
            <div class="col-5 py-3 selected cursor-pointer" data-filter2="TRW1">
                Triwulan I
            </div>
            <div class="col-5 ml-8 py-3 cursor-pointer" data-filter2="TRW2">
                Triwulan II
            </div>
            <div class="w-100 d-none d-md-block"></div>
            <div class="col-5 mt-8 py-3 cursor-pointer" data-filter2="TRW3">
                Triwulan III
            </div>
            <div class="col-5 mt-8 ml-8 py-3 cursor-pointer" data-filter2="TRW4">
                Triwulan IV
            </div>
        `;
        } else if ($filter1 == 'Semester') {
            html += `
            <div class="col-5 py-3 selected cursor-pointer" data-filter2="SMT1">
                Semester I
            </div>
            <div class="col-5 ml-8 py-3 cursor-pointer" data-filter2="SMT2">
                Semester II
            </div>
        `;
        } else if ($filter1 == 'Periode') {
            html += `
            <div class="col-5 py-3 cursor-pointer list" data-bulan="01" data-filter2="01">
                Januari
            </div>
            <div class="col-5 ml-8 py-3 cursor-pointer list" data-bulan="02" data-filter2="02">
                Februari
            </div>
            <div class="w-100 d-none d-md-block"></div>
            <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="03" data-filter2="03">
                Maret
            </div>
            <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="04" data-filter2="04">
                April
            </div>
            <div class="w-100 d-none d-md-block"></div>
            <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="05" data-filter2="05">
                Mei
            </div>
            <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="06" data-filter2="06">
                Juni
            </div>
            <div class="w-100 d-none d-md-block"></div>
            <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="07" data-filter2="07">
                Juli
            </div>
            <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="08" data-filter2="08">
                Agustus
            </div>
            <div class="w-100 d-none d-md-block"></div>
            <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="09" data-filter2="09">
                September
            </div>
            <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="10" data-filter2="10">
                Oktober
            </div>
            <div class="w-100 d-none d-md-block"></div>
            <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="11" data-filter2="11">
                November
            </div>
            <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="12" data-filter2="12">
                Desember
            </div>
        `;
        }
        $('#list-filter-2').append(html)

        if ($filter1 == 'Periode') {
            $('#list-filter-2').find('.list').each(function() {
                if ($(this).data('bulan').toString() == $month) {
                    $(this).addClass('selected')
                    $month = $(this).data('bulan').toString();
                    return false;
                }
            })
        }
    })

    // MENTRIGGER FILTER 2
    $('#list-filter-2').on('click', 'div', function(event) {
        event.stopPropagation();
        var filter = $(this).text()
        if ($(this).data('bulan')) {
            filter = $(this).data('bulan')
        }
        $filter2 = filter
        $filter2_kode = $(this).data('filter2')
        $('#list-filter-2 div').not(this).removeClass('selected')
        $(this).addClass('selected')
        $('#filter-box').addClass('hidden')

        if ($filter2.length == 2) {
            $filter2 = getNamaBulan($filter2)
        }

        $('#select-text-fp').text(`${$filter2.toUpperCase()} ${$tahun}`)
        updateAllChart()
        showNotification(`Menampilkan dashboard periode ${$filter2.toUpperCase()} ${$tahun}`);
        $('#detail-dash').hide()
        $('#main-dash').show()
    })
    // END FILTER EVENT
</script>
<script>
    setTimeout(function() {
        getDataBox();
        getKontribusi();
        getPortofolio();
        getRKAvsReal();
        getYTDvsYoY();
    }, 200)
</script>

<section id="header" class="header">
    <div class="row">
        <div class="col-9 pl-12 pr-0">
            <div class="row penddapatan">
                <div id="dash-title-div" class="col-11 pr-0 pendapatan">

                    <h2 class="title-dash" id="title-dash" style="padding-left: 0.2em;">Pendapatan</h2>

                </div>
                <div class="row pendapatan">
                    <div class="col-12">
                        <div style="color: grey; padding-left:1.5em;">Support data SIMKUG || Satuan Milyar Rupiah</div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0" style="padding-top: 1em;">
            <div class="row" style="padding-left: 1.5rem;">
                <div class="card card-dash rounded-lg" style="padding-left: 1.5em; padding-right:0.5em; padding-top:1em;">
                    <div class="col-12">
                        <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                            <div class="col-2">
                                <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                            </div>
                            <div class="col-8">
                                <p id="select-text-fp" class="select-text">Bulan September {{ date('Y') }}</p>
                            </div>
                            <div class="col-2">
                                <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter-box" class="filter-box border-r-0 hidden">
            <div class="row filter-box-tahun px-3">
                <div class="col-3 pt-8 border-right"></div>
                <div class="col-9 pt-8">
                    <div class="row pr-3">
                        <div class="col-4">
                            <div id="kurang-tahun" class="glyph-icon simple-icon-arrow-left filter-icon cursor-pointer text-center"></div>
                        </div>
                        <div class="col-4 text-center bold" id="year-filter">{{ date('Y') }}</div>
                        <div class="col-4 text-center">
                            <div id="tambah-tahun" class="glyph-icon simple-icon-arrow-right filter-icon cursor-pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row filter-box-periode px-3">
                <div class="col-3 border-right list-filter-1" id="list-filter-1">
                    <ul>
                        {{-- <li class="selected" data-filter1="TRW">Triwulan</li> --}}
                        {{-- <li data-filter1="SMT">Semester</li> --}}
                        <li class="selected py-2" data-filter1="YTM">Year To Month</li>
                        <li class="py-2" data-filter1="PRD">Bulan</li>
                        {{-- <li>Year to Date</li> --}}
                    </ul>
                </div>
                <div class="col-9 mt-4 mb-6">
                    <div class="row list-filter-2 pr-3" id="list-filter-2">
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="01" data-filter2="01">
                            <span class="py-2 px-3 d-block">Januari</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="02" data-filter2="02">
                            <span class="py-2 px-3 d-block">Februari</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="03" data-filter2="03">
                            <span class="py-2 px-3 d-block">Maret</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="04" data-filter2="04">
                            <span class="py-2 px-3 d-block">April</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="05" data-filter2="05">
                            <span class="py-2 px-3 d-block">Mei</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="06" data-filter2="06">
                            <span class="py-2 px-3 d-block">Juni</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="07" data-filter2="07">
                            <span class="py-2 px-3 d-block">Juli</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="08" data-filter2="08">
                            <span class="py-2 px-3 d-block">Agustus</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="09" data-filter2="09">
                            <span class="py-2 px-3 d-block">September</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="10" data-filter2="10">
                            <span class="py-2 px-3 d-block">Oktober</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="11" data-filter2="11">
                            <span class="py-2 px-3 d-block">November</span>
                        </div>
                        <div class="col-4 py-2 px-3 cursor-pointer list text-center" data-bulan="12" data-filter2="12">
                            <span class="py-2 px-3 d-block">Desember</span>
                        </div>
                        {{-- <div class="col-5 py-3 cursor-pointer" data-filter2="TRW1">
                            Triwulan I
                        </div>
                        <div class="col-5 ml-8 py-3 cursor-pointer" data-filter2="TRW2">
                            Triwulan II
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer" data-filter2="TRW3">
                            Triwulan III
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer" data-filter2="TRW4">
                            Triwulan IV
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="row mb-2" style="padding-left: 1.5em;">
    <div class="col-lg-3 col-md-6 px-1">
        {{-- REVENUE--}}
        <div class="card card-dash rounded-lg" style="padding-left: 1em; padding-right:1.5em; ">
            <div class="card-body pt-2 ">
                <div class="row">
                    <div class="col-12"><span style="font-size: 1rem;">Revenue</span></div>
                    <div id="nilai-revenue" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div style="padding-bottom: 0.5rem; padding-left:1rem;"> RKA</div>
                            <div id="rka-revenue" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                        </div>
                        <div class="row">
                            <div style="padding-bottom: 0.5rem; padding-left:1rem;"> YoY</div>
                            <div id="yoy-revenue" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div id="capai_rka-revenue" class="text-success" style="padding-bottom: 0.5rem;padding-left:3rem"></div>
                        <div id="capai_yoy-revenue" class="text-success" style="padding-bottom: 0.5rem;padding-left:3rem"></div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <b style="font-size: 1.2em;padding-top:10em;">Kontribusi Pendapatan</b>
                <div id="chart-contribusi" style="width:110%; height:36.5em;"></div>

            </div>
        </div>
        {{-- END REVENUE --}}
    </div>
    <div class="col-lg-6 col-md-12 px-1">
        <div class="card card-dash rounded-lg">
            <div class="card-body">
                <div id="chart-capai" style="width:100%; height:17.5rem;"></div>
            </div>
        </div>
        <div class="card card-dash rounded-lg">
            <div class="card-body">
                <div id="chart-PP" style="width:100%; height:17.5rem;"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 px-1">
        {{-- PENGAJUAN--}}
        <div class="card card-dash rounded-lg">
            <div class="card-body" style="padding-left: 0.5em;">
                <div style="padding-top:0.5em; font-size:1em">Pendapatan YoY</div>
                <div class="row ">
                    <div class="col-1 d-inline">
                        <div style="width: 1em;height:1em; border-radius: 100%; background-color: #A52A2A">
                        </div>
                    </div>
                    <div class="col-4 d-inline">
                        <span>pdpt YTD</span>
                    </div>

                    <!-- <div class="col-6 d inline" > -->
                    <div class="col-1 d-inline">
                        <div style="width: 1em;height:1em; border-radius: 100%; background-color: #DCDCDC"></div>
                    </div>
                    <div class="col-4 di-inline">
                        <span>pdpt Tahun Lalu</span>
                    </div>
                    <!-- </div> -->
                </div>
                    <div class="card-body">
                        <div id="chart-pendapatan" style="width:100%; height:17.5rem;"></div>
                    </div>
                            </div>
            <div class="p-2" style="width:100%; height:15.2em;">

            </div>
        </div>
        {{-- END PENGAJUAN --}}
    </div>
</div>
<script>
    $('#btnBack,#btn-filter').removeClass('btn-outline-light');
    $('#btnBack,#btn-filter').addClass('btn-outline-dark');

    $('.pendapatan').on('click', '#btnBack', function(e) {
        e.preventDefault();
        var url = "{{ url('/siaga-auth/form/fFinancialPerformance') }}";
        loadForm(url);
    })
</script>
</script>