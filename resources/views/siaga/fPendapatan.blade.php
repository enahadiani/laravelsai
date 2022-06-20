<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-pembendaharaan.dekstop.css?version=_').time() }}" />

<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<script>

//Chart Revenue
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
        categories: [
            'CBS',
            'FBS',
            'TC',
            'TI'
        ]
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
        data: [200, 200, 200,200],
        pointPadding: 0.3,
        pointPlacement: -0.2
    }, {
        name: 'Real YTD',
        color: '#228B22',
        data: [250, 250, 250, 250],
        pointPadding: 0.4,
        pointPlacement: -0.2
    }, {
        name: 'RKA FY',
        color: '#F0E68C',
        data: [200, 200, 200, 200],
        tooltip: {
            valuePrefix: '$',
            valueSuffix: ' M'
        },
        pointPadding: 0.3,
        pointPlacement: 0.2,
        
    }, {
        name: 'Real YTD',
        color: '#FF0000',
        data: [100, 100, 100, 100],
        tooltip: {
            valuePrefix: '$',
            valueSuffix: ' M'
        },
        pointPadding: 0.4,
        pointPlacement: 0.2,
        
    }]
});
//end revenue

//chart revenue contribusi
// Create the chart
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
        data: [
            { name: 'TS', y: 39.30 },
            { name: 'BAD', y: 42.20 },
            { name: 'BS', y: 11.20 },
            { name: 'BSC', y: 7.30 }
        ]
    }]
});


//end revenue contribusi

//chart pendapatan

//end pendapatan

//chart Pendapatan Portofolio
Highcharts.chart('chart-PP', {

    chart: {
        type: 'spline'
    },
    title: {
        text: 'Pendapatan Portofolio Perbulan',
        align:'left'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
       
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
        name: 'Bisns AD',
        marker: {
            symbol: 'square'
        },
        data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {
            y: 26.5,
        }, 23.3, 18.3, 13.9, 9.6]
        

    }, {
        name: 'Telco Solution',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 3.9,
        }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    }, {
        name: 'BS Cabang',
        marker: {
            symbol: 'square'
        },
        data: [{
            y: 10.5,
        }, 6.7, 6.9, 11.7, 13.8, 16.2, 19.0, 18.0, 12.2, 5.3, 7.9, 2.6]
    }, {
        name: 'Business Solution',
        marker: {
            symbol: 'diamond'
        },
        data: [{
            y: 16.8,
        }, 6.2, 9.6, 7.4,7.9, 12.2, 10.0, 13.6, 8.2, 16.3, 10.6, 18.8]
    }]
});
//end

//chart pendapatan yoy
Highcharts.chart('chart-yoy', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Stacked bar chart'
    },
    xAxis: {
        categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total fruit consumption'
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'John',
        data: [5, 3, 4, 7, 2]
    }, {
        name: 'Jane',
        data: [2, 2, 3, 2, 1]
    }, {
        name: 'Joe',
        data: [3, 4, 4, 2, 5]
    }]
});
//end

</script>


<section id="header" class="header" >
    <div class="row">
        <div class="col-9 pl-12 pr-0">
            <div class="row penddapatan">
                <div id="back-div" class="col-1 pr-0 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11 pr-0 pendapatan" >
                        
                    <h2 class="title-dash" id="title-dash" style="padding-left: 0.2em;">Pendapatan</h2>
                    
                </div>
                <div class="row pendapatan">
                            <div class="col-12">
                                <div style="color: grey; padding-left:1.5em;">Support data SIMKUG || Satuan Milyar Rupiah</div>
                            </div>
                            <div class="col-12" style="padding-left: 2.5em;">
                            <a class='btn btn-outline-light' href='#' id='btnBack' style="right: 150px;border:1px solid black;font-size:1rem;top:0;"><i class="simple-icon-arrow-left mr-2"></i> Back</a>
                            </div>
                            
                            
                </div>
            </div>
        </div>
    <div class="col-3 pl-1 pr-0" style="padding-top: 1em;">
            <div class="row">
                <div class="card card-dash rounded-lg" style="padding-left: 1.5em; padding-right:1.5em; padding-top:1em;">
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
                        <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 10rem;">Revenue</span></div>
                            <div class="col-12"><b style="font-size: 25px;">173,14M</b></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <span>RKA 90,02M</span>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <span>YoY 162,39M</span>
                                
                            </div>
                            <div class="col-6" >
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;"></div>
                                <b class="text-success">192,33%</b>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <b class="text-success" style="padding-top: 10em;">+6,61%</b>
                            </div>
                        </div>
                    </div>
                            <div class="card-body">
                            <b style="font-size: 1.2em;padding-top:10em;">Kontribusi Pendapatan</b>
                            <div id="chart-contribusi" style="width:100%; height:36.5em;"></div>
                            
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
                <div class="card card-dash rounded-lg" >
                    <div class="card-body" style="padding-left: 0.5em;">
                    <div style="padding-top:0.5em; font-size:1em" >Pendapatan YoY</div>
                    <div class="row ">
                            <div class="col-1 d-inline">
                                <div style="width: 1em;height:1em; border-radius: 100%; background-color: #A52A2A">
                            </div>
                            </div>
                            <div class="col-4 d-inline" >
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

                    <br>
                    <div class="row">
                    <div class="col-6">
                        <div style="padding-top:0.5em; font-size:1em;" >Bisnis AD</div>
                        <div class="progress" style="height: 2em; width:10em;  margin-bottom:0.5em;"><br>
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ></div>
                            </div>
                    </div>
                    <div class="col-6" style="padding-left: 6.5em;" >
                    <i style='font-size:15px;color:green;' class='fas' >&#xf062;</i>
                                <span class="text-success" >3,24%</span>
                            </div>
                    </div>

                    <div class="progress" style="height: 2em;width:15em;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="100" aria-valuemax="100"></div>
                        </div>
                    
                    <div class="row">
                        <div class="col-6">
                    <div style="padding-top:0.5em; font-size:1em" >Telco Solution</div>
                    <div class="progress" style="height: 2em;width:10em;margin-bottom:0.5em;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ></div>
                        </div>
                        </div>
                        <div class="col-6" style="padding-left: 6.5em;" >
                    <i style='font-size:15px;color:green;' class='fas' >&#xf062;</i>
                                <span class="text-success" >1,07%</span>
                            </div>
                    </div>

                    <div class="progress" style="height: 2em;width:13em;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="100" aria-valuemax="100"></div>
                        </div>
                    
                        <div class="row">
                            <div class="col-6">
                        <div style="padding-top:0.5em; font-size:1em" >BS Cabang</div>
                    <div class="progress" style="height: 2em;width:5em;margin-bottom:0.5em;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ></div>
                        </div>
                        </div>
                        <div class="col-6" style="padding-left: 6.5em;" >
                    <i style='font-size:15px;color:red;' class='fas' >&#xf063;</i>
                                <span class="text-success" >5,23%</span>
                            </div>
                        </div>
                    <div class="progress" style="height: 2em;width:3em;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="100" aria-valuemax="100"></div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                        <div style="padding-top:0.5em; font-size:1em" >Business Solution</div>
                    <div class="progress" style="height: 2em;width:1em;margin-bottom:0.5em;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" ></div>
                        </div>
                        </div>
                        <div class="col-6" style="padding-left: 6.5em;" >
                    <i style='font-size:15px;color:green;' class='fas' >&#xf062;</i>
                                <span class="text-success" >0,01%</span>
                            </div>
                        </div>
                    <div class="progress" style="height: 2em;width:1em;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="100" aria-valuemax="100"></div>
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

    $('.pendapatan').on('click','#btnBack',function(e){
    e.preventDefault();
    var url = "{{ url('/siaga-auth/form/fFinancialPerformance') }}";
    loadForm(url);
})
</script>
</script>