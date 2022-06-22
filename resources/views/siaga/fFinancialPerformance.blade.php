<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-pembendaharaan.dekstop.css?version=_').time() }}" />



<style>
    .link-detail {
        cursor: pointer;
    }
</style>

<script>

//Chart Revenue
Highcharts.chart('chart-revenue', {

    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Perfomance',
        align: 'left'
    },
    
    labels: {
        enabled: false
    },
    credits: {
            enabled: false
        },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'NIlai'
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },

plotOptions: {
    column: {
        stacking: 'normal'
    }
},

series: [{
    name: 'beban',
    data: [9, 2, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    stack: 'male'
}, {
    name: 'HPP',
    data: [7, 6, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    stack: 'male',
    
}, {
    name: 'pdpt',
    data: [19, 5, 6, 0, 0],
    stack: 'female'
},{
        type: 'spline',
        name: 'NI',
        data: [7, 6, 8],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            
        }
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
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                distance: -40,
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
        data: [
            { name: 'TS', y: 39.30 },
            { name: 'BAD', y: 42.20 },
            { name: 'BS', y: 11.20 },
            { name: 'BSC', y: 7.30 }
        ]
    }]
});


//end revenue contribusi

</script>


<section id="header" class="header" >
    <div class="row">
        <div class="col-9 pl-12 pr-0">
            <div class="row">
                <div id="back-div" class="col-1 pr-0 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11 pr-0" style="padding-right:7em ;">
                    <h2 class="title-dash" id="title-dash">Financial Performance</h2>
                </div>
                <div class="row">
                            <div class="col-12">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <div style="color: grey; padding-left:1em;">Support data SIMKUG || Satuan Milyar Rupiah</div>
                            </div>
                            
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0" style="padding-top: 1em;">
            <div class="row">
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

    <div class="row body-dash row-box" style="position: relative;">
        <div class='col-md-2dot4 col-12 px-1' >
        <div class="card card-dash rounded-lg link-detail md-1"  data-box="revenue">
        <p hidden class="link-tujuan">fDetailFinance</p>
                    <div class="card-body pt-2 ">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Revenue</span></div>
                            <div class="col-12"><b style="font-size: 25px;">173,14M</b></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <span>RKA 90,02M</span>
                                <span>YoY 162,39M</span>
                                
                            </div>
                            <div class="col-6" >
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_nilai"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <b class="text-success">192,33%</b>
                                <b class="text-success">+6,61%</b>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class='col-md-2dot4 col-12 px-1'>
        <div class="card card-dash rounded-lg link-detail" data-box="cogs">
        <p hidden class="link-tujuan">fDetailFinance</p>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">COGS</span></div>
                            <div class="col-12"><b style="font-size: 25px;">98,29M</b></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <span>RKA 70,39M</span>
                                <span>YoY 82,19M</span>
                                
                            </div>
                            <div class="col-6" >
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_nilai"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <b class="text-danger">139,63%</b>
                                <b class="text-danger">+19,58%</b>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class='col-md-2dot4 px-1'>
        <div class="card card-dash rounded-lg link-detail" data-box="profit">
        <p hidden class="link-tujuan">fDetailFinance</p>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Gross Profit</span></div>
                            <div class="col-12" ><b style="font-size: 25px;">74,85M</b></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <span>RKA 19,63M</span>
                                <span>YoY 80,20M</span>
                                
                            </div>
                            <div class="col-6" >
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_nilai"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <b class="text-success">381,30%</b>
                                <b class="text-danger">-6,67%</b>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class='col-md-2dot4 px-1'>
        <div class="card card-dash rounded-lg link-detail" data-box="opex">
        <p hidden class="link-tujuan">fDetailFinance</p>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">OPEX</span></div>
                            <div class="col-12"><b style="font-size: 25px;">36,89M</b></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <span>RKA 11,22M</span>
                                <span>YoY 38,29M</span>
                                
                            </div>
                            <div class="col-6" >
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_nilai"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <b class="text-danger">328,78%</b>
                                <b class="text-success">-3,65%</b>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class='col-md-2dot4 px-1'>
        <div class="card card-dash rounded-lg link-detail" data-box="income">
        <p hidden class="link-tujuan">fDetailFinance</p>
        <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Net Income</span></div>
                            <div class="col-12"><b style="font-size: 25px;">37,96M</b></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <span>RKA 8,41M</span>
                                <span>YoY 41,91M</span>
                                
                            </div>
                            <div class="col-6" >
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_nilai"></div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <b class="text-success">415,36%</b>
                                <b class="text-danger">-9,42%</b>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


<div class="row mb-2">
    <div class="col-lg-6 col-md-12 px-1" >
                {{-- REVENUE--}}
                <div class="card card-dash rounded-lg">
                    <div class="card-body">
                        <div id="chart-revenue" style="width:100%; height: calc(78vh - 180px); padding-bottom:15px;"></div>
                    </div>
                </div>
                {{-- END REVENUE --}}
            </div>
            <div class="col-lg-3 col-md-6 px-1">
                {{-- REVENUE--}}
                        <div class="card card-dash rounded-lg" style="padding-left: 1.5em; padding-right:1.5em; padding-top:1em;width:121%; height: calc(79.5vh - 180px)">
                                <div class="row"> 
                            <div class="col-8" style="padding-left: 1em;">
                                    <select name="revenue" id="revenue">
                                        <option value="Revenue Contribution">Revenue Contribution</option>
                                        <option value="COGS">COGS</option>
                                        <option value="Gross Profit">Gross Profit</option>
                                        <option value="OPEX">OPEX</option>
                                        <option value="Net Income">Net Income</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                            <div id="chart-contribusi" style="width:100%; height: calc(73vh - 180px)"></div>
                            </div>
                        </div>
                {{-- END REVENUE --}}
            </div>

            <div class="col-md-2dot4 px-1 ">
                {{-- PENGAJUAN--}}
                <div class="card card-dash rounded-lg" style="margin-left: 4rem;width:97%; height: calc(79.5vh - 180px)">
                    <div class="card-body ">
                        <div class="p-1" style="width:100%; height: calc(78vh - 180px)">
                        <div class="row">
                            <div class="col-12"><b style="font-size: 1rem;">Margin Per Diraktorat</b></div>
                            <div class="col-12"><span style="color: grey;">Pilih Direktorat Untuk Menampilkan</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1  " style="font-size: 1.5rem; padding-top:1em;" ></div>
                                <span class="link-detail">Total</span>
                                <div class="font-weight-bold mb-1 " style="font-size: 1.5rem;" ></div>
                                <span class="link-detail" style="padding-bottom: 1em;">Bisnis AD</span>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <span class="link-detail">Telco Solution</span>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <span class="link-detail">BS Cabang</span>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" ></div>
                                <span class="link-detail">Business Solution</span>
                                
                            </div>
                            <div class="col-6" >
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem; padding-top:1em;" id="ver_dok_nilai"></div>
                                <span ></span>46.37%</span>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem; padding-top:0.1em;" id="ver_dok_jml"></div>
                                <div >20,32%</div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem; padding-top:0.1em;" ></div>
                                <div >47,14%</div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem; padding-top:0.6em;" ></div>
                                <div >39,02%</div>
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem; padding-top:0.1em;" ></div>
                                <div >61,26%</div>

                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                {{-- END PENGAJUAN --}}
            </div>
        
        <script>
    $('.row-box').on('click','.link-detail',function(e){
        e.preventDefault();
        var link = $(this).closest('div').find('p.link-tujuan').html();
        if(link != "#"){
            var url = "{{ url('/siaga-auth/form/fDetailFinancial') }}";
            loadForm(url);
        }
    });
</script>
</script>