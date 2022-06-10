<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-bdhuser.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js') }}"></script>
<script type="text/javascript">
    var chartAju = null;
    var chartHarian = null;
    var chartCapai = null
    var chartKas = null
    var tahun = "{{ substr(Session::get('periode'),0,4) }}";
    var kode_pp = "5799";
    function getDataBox(){
        $.ajax({
            type: 'GET',
            url: "{{ url('telu-dash/data-pbh-box') }}",
            data: {
                tahun: tahun,
                kode_pp: kode_pp
            },
            dataType: 'json',
            async: true,
            success:function(result) {    
                $('#ver_dok_jml').text(0);
                $('#ver_dok_nilai').text(0);
                $('#ver_akun_jml').text(0);
                $('#ver_akun_nilai').text(0);
                $('#spb_jml').text(0);
                $('#spb_nilai').text(0);
                $('#spb_bayar_jml').text(0);
                $('#spb_bayar_nilai').text(0);
                if(result.status){
                    var line = result.data;
                    $('#ver_dok_jml').text(number_format(line.ver_dok.jml));
                    $('#ver_dok_nilai').text(toMilyar(line.ver_dok.nilai));
                    $('#ver_akun_jml').text(number_format(line.ver_akun.jml));
                    $('#ver_akun_nilai').text(toMilyar(line.ver_akun.nilai));
                    $('#spb_jml').text(number_format(line.spb.jml));
                    $('#spb_nilai').text(toMilyar(line.spb.nilai));
                    $('#spb_bayar_jml').text(number_format(line.spb_bayar.jml));
                    $('#spb_bayar_nilai').text(toMilyar(line.spb_bayar.nilai));
                }
            }
        });
    }
    
    function getJenisPengajuan(){
        $.ajax({
            type:"GET",
            url:"{{ url('telu-dash/data-pbh-jenis-aju') }}",
            data: {
                tahun: tahun,
                kode_pp: kode_pp
            },
            dataType:"JSON",
            success:function(result){
                
                chartAju = Highcharts.chart('chart-pengajuan', {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: '',
                    },
                    legend:{
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: '{point.y}({point.percentage:.1f}%)'
                    },
                    plotOptions: {
                        pie: {
                            padding: 10,
                            allowPointSelect: true,
                            cursor: 'pointer',
                            innerSize: '50%',
                            size: '70%',
                            dataLabels: {
                                enabled: true,
                                useHTML: true,
                                align: 'left',
                                formatter: function () {
                                    var name = this.point.name;
                                    return $('<div/>').css({
                                        'border' : '0',// just white in my case
                                        'max-width': '70px',
                                        'overflow':'hidden'
                                    }).addClass('fs-8').html(name+':<br/>'+number_format(this.y)+'('+number_format(this.percentage)+'%)')[0].outerHTML;
                                }
                            }
                        }
                    },
                    series: [{
                        data: result.data
                    }]
                }, function(){
                    var series = this.series;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        for (var j = 0, je = points.length; j < je; ++j) {
                            if (points[j].graphic) {
                                points[j].graphic.element.style.fill = result.colors[j];
                            }
                        }
                    }
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/dash-telu/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        })
    }

    function getNilaiKas(){
        $.ajax({
            type:"GET",
            url:"{{ url('telu-dash/data-pbh-kas') }}",
             data: {
                tahun: tahun,
                kode_pp: kode_pp
            },
            dataType:"JSON",
            success:function(result){
                chartKas = Highcharts.chart('chart-kas', {
                    chart: {
                        type: 'column'
                    },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: 'Nilai Kas Keluar Tiap Taun YoY',
                        align: 'left'
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
                        crosshair: true,
                        title: {
                            text: 'Bulan'
                        }
                    },
                    yAxis: {
                        title: 'Nilai',
                        labels: {
                            formatter: function() {
                                return singkatNilai(this.value);
                            }
                        }
                    },
                    tooltip: {
                        // headerFormat: '<span style="font-size:10px">'+point.key+'</span><table>',
                        // pointFormat: '<tr><td style="color:green;padding:0">'+series.name+': </td>' +
                        //     '<td style="padding:0"><b>'+point.y+'</b></td></tr>',
                        // footerFormat: '</table>',
                        shared: true,
                        useHTML: true,
                        formatter: function() {
                            var s = '<b>'+ this.x +'</b>';
                            
                            $.each(this.points, function(i, point) {
                                s += '<br/>'+ point.series.name +': '+
                                    number_format(point.y) +'';
                            });
                            
                            return s;
                        },
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    legend: {
                        align: 'right',
                        verticalAlign: 'top'
                    },
                    series: [{
                        name: 'Tahun Lalu',
                        color: '#D9D9D9',
                        data: result.data.tahun_lalu

                    }, {
                        name: 'Tahun Sekarang',
                        color: '#007AFF',
                        data: result.data.tahun_ini

                    }]
                });
            } 
        });
    }

    getDataBox();
    getJenisPengajuan();
    getNilaiKas();

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

    // CHART HARIAN
    var chartHarian = null;

    chartHarian = Highcharts.chart('chart-harian', {
        chart: {
            type: 'column'
        },
        credits: {
            enabled: false
        },
        title: {
            text: 'Pengajuan Setiap Bulan',
            align: 'left'
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
            crosshair: true,
            title: {
                text: 'Bulan'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nilai'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{green};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        legend: {
            align: 'right',
            verticalAlign: 'top'
        },
        series: [{
            name: 'Pengajuan',
            data: [180, 180, 106.4, 129.2, 144.0, 176.0,100,100,100,100,100,100]

        }, {
            name: 'Selesai',
            data: [200, 150, 98.5, 93.4, 106.0, 84.5,100,100,100,100,100,100]

        }]
    });
    // END CHART HARIAN
    // CHART Pengajuan Bulan
    var chartCapai = null
    
    chartCapai = Highcharts.chart('chart-pencapaian', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: 'Jumlah Pengajuan Selesai Tiap Bulan'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            title: {
                text: 'Bulan'
            },
            labels: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        credits: {
            enabled: false
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [
            {
                name: "Browsers",
                colorByPoint: true,
                data: [
                    {
                        name: "Chrome",
                        y: 62.74,
                    },
                    {
                        name: "Firefox",
                        y: 10.57,
                    },
                    {
                        name: "Internet Explorer",
                        y: 7.23,
                    },
                    {
                        name: "Safari",
                        y: 5.58,
                    },
                    {
                        name: "Edge",
                        y: 4.02,
                    },
                    {
                        name: "Opera",
                        y: 1.92,
                    },
                    {
                        name: "Other",
                        y: 7.62,
                    },
                    {
                        name: "Other",
                        y: 7.62,
                    },
                    {
                        name: "Other",
                        y: 7.62,
                    },
                    {
                        name: "Other",
                        y: 7.62,
                    },
                    {
                        name: "Other",
                        y: 7.62,
                    },
                    {
                        name: "Other",
                        y: 7.62,
                    }
                    

                ]
            }
        ]
    });
    // END CHART PENCAPAIAN
    //PENGAJUAN
    // var chartAju = null
    
    // chartAju = Highcharts.chart('chart-pengajuan', {
    //     chart: {
    //         type: 'pie'
    //     },
    //     title: {
    //         text: 'Jenis Pengajuan',
    //         align: 'left'
    //     },
    //     credits: {
    //         enabled: false
    //     },

    //     accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         },
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },

    //     plotOptions: {
    //         series: {
    //             dataLabels: {
    //                 enabled: true,
    //                 format: '{point.name}: {point.y:.1f}%'
    //             }
    //         }
    //     },

    //     tooltip: {
    //         headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    //         pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    //     },

    //     series: [{
    //         name: "Jenis Pengajuan",
    //         colorByPoint: true,
    //         data: [

    //             {
    //                 name: "Online 283",
    //                 y: 26,
    //                 drilldown: "Firefox"
    //             },
    //             {
    //                 name: "Offline 736",
    //                 y: 74,
    //                 drilldown: null
    //             }
    //         ]
    //     }],
    //     drilldown: {
    //         series: [{
    //                 name: "Chrome",
    //                 id: "Chrome",
    //                 data: [
    //                     [
    //                         "v65.0",
    //                         0.1
    //                     ],
    //                     [
    //                         "v64.0",
    //                         1.3
    //                     ],
    //                     [
    //                         "v63.0",
    //                         53.02
    //                     ],
    //                     [
    //                         "v62.0",
    //                         1.4
    //                     ],
    //                     [
    //                         "v61.0",
    //                         0.88
    //                     ],
    //                     [
    //                         "v60.0",
    //                         0.56
    //                     ],
    //                     [
    //                         "v59.0",
    //                         0.45
    //                     ],
    //                     [
    //                         "v58.0",
    //                         0.49
    //                     ],
    //                     [
    //                         "v57.0",
    //                         0.32
    //                     ],
    //                     [
    //                         "v56.0",
    //                         0.29
    //                     ],
    //                     [
    //                         "v55.0",
    //                         0.79
    //                     ],
    //                     [
    //                         "v54.0",
    //                         0.18
    //                     ],
    //                     [
    //                         "v51.0",
    //                         0.13
    //                     ],
    //                     [
    //                         "v49.0",
    //                         2.16
    //                     ],
    //                     [
    //                         "v48.0",
    //                         0.13
    //                     ],
    //                     [
    //                         "v47.0",
    //                         0.11
    //                     ],
    //                     [
    //                         "v43.0",
    //                         0.17
    //                     ],
    //                     [
    //                         "v29.0",
    //                         0.26
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Firefox",
    //                 id: "Firefox",
    //                 data: [
    //                     [
    //                         "v58.0",
    //                         1.02
    //                     ],
    //                     [
    //                         "v57.0",
    //                         7.36
    //                     ],
    //                     [
    //                         "v56.0",
    //                         0.35
    //                     ],
    //                     [
    //                         "v55.0",
    //                         0.11
    //                     ],
    //                     [
    //                         "v54.0",
    //                         0.1
    //                     ],
    //                     [
    //                         "v52.0",
    //                         0.95
    //                     ],
    //                     [
    //                         "v51.0",
    //                         0.15
    //                     ],
    //                     [
    //                         "v50.0",
    //                         0.1
    //                     ],
    //                     [
    //                         "v48.0",
    //                         0.31
    //                     ],
    //                     [
    //                         "v47.0",
    //                         0.12
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Internet Explorer",
    //                 id: "Internet Explorer",
    //                 data: [
    //                     [
    //                         "v11.0",
    //                         6.2
    //                     ],
    //                     [
    //                         "v10.0",
    //                         0.29
    //                     ],
    //                     [
    //                         "v9.0",
    //                         0.27
    //                     ],
    //                     [
    //                         "v8.0",
    //                         0.47
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Safari",
    //                 id: "Safari",
    //                 data: [
    //                     [
    //                         "v11.0",
    //                         3.39
    //                     ],
    //                     [
    //                         "v10.1",
    //                         0.96
    //                     ],
    //                     [
    //                         "v10.0",
    //                         0.36
    //                     ],
    //                     [
    //                         "v9.1",
    //                         0.54
    //                     ],
    //                     [
    //                         "v9.0",
    //                         0.13
    //                     ],
    //                     [
    //                         "v5.1",
    //                         0.2
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Edge",
    //                 id: "Edge",
    //                 data: [
    //                     [
    //                         "v16",
    //                         2.6
    //                     ],
    //                     [
    //                         "v15",
    //                         0.92
    //                     ],
    //                     [
    //                         "v14",
    //                         0.4
    //                     ],
    //                     [
    //                         "v13",
    //                         0.1
    //                     ]
    //                 ]
    //             },
    //             {
    //                 name: "Opera",
    //                 id: "Opera",
    //                 data: [
    //                     [
    //                         "v50.0",
    //                         0.96
    //                     ],
    //                     [
    //                         "v49.0",
    //                         0.82
    //                     ],
    //                     [
    //                         "v12.1",
    //                         0.14
    //                     ]
    //                 ]
    //             }
    //         ]
    //     }
    // });
    //END PENGAJUAN

    //KAS
    // var chartKas = Highcharts.chart('chart-kas', {
    //     chart: {
    //         type: 'column'
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     title: {
    //         text: 'Nilai Kas Keluar Tiap Taun YoY',
    //         align: 'left'
    //     },
    //     xAxis: {
    //         categories: [
    //             'Jan',
    //             'Feb',
    //             'Mar',
    //             'Apr',
    //             'May',
    //             'Jun',
    //             'Jul',
    //             'Aug',
    //             'Sep',
    //             'Oct',
    //             'Nov',
    //             'Dec'
    //         ],
    //         crosshair: true,
    //         title: {
    //             text: 'Bulan'
    //         }
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Nilai'
    //         }
    //     },
    //     tooltip: {
    //         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    //         pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    //             '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    //         footerFormat: '</table>',
    //         shared: true,
    //         useHTML: true
    //     },
    //     plotOptions: {
    //         column: {
    //             pointPadding: 0.2,
    //             borderWidth: 0
    //         }
    //     },
    //     legend: {
    //         align: 'right',
    //         verticalAlign: 'top'
    //     },
    //     series: [{
    //         name: 'Tahun Lalu',
    //         data: [180, 180, 106.4, 129.2, 144.0, 176.0,100,100,100,100,100,100]

    //     }, {
    //         name: 'Tahun Sekarang',
    //         data: [200, 150, 98.5, 93.4, 106.0, 84.5,100,100,100,100,100,100]

    //     }]
    // });
    //END KAS
    // test lagi
    
    $('#dash-refresh').click(function(){
        getDataBox();
        getJenisPengajuan();
        getNilaiKas();
    });
</script>

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-10">
            <h2 id="title-dash" class="title-dash mt-0">Fakultas/Direktorat...</h2>
        </div>
        <div class="col-2 text-right">
            <a href="#" id="dash-refresh">
                <i class="simple-icon-refresh" style="font-size:20px;color:#9e9e9e"></i>
            </a>
        </div>
    </div>
</section>
{{-- END HEADER --}}

{{-- BODY --}}
<section id="main-dash" class="mt-12 p-24">
    <div id="dekstop-1" class="dekstop">
        {{-- FIRST ROW CARD --}}
        <div class="row mb-2">
            {{-- VERIFIKASI DOKUMEN --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Verifikasi Dokumen</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_jml"></div>
                                <span class="text-success">+12 hari ini</span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_dok_nilai"></div>
                                <span class="text-success">Proses 2 hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END VERIFIKASI DOKUMEN --}}

            {{-- VERIFIKASI AKUN --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Verifikasi Akun</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_akun_jml"></div>
                                <span class="text-success">+12 hari ini</span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="ver_akun_nilai"></div>
                                <span class="text-success">Proses ... hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END VERIFIKASI AKUN --}}

            {{-- SPB --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">SPB</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_jml"></div>
                                <span class="text-success">+5 hari ini</span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_nilai"></div>
                                <span class="text-success">Proses ... hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END SPB --}}

            {{-- SUDAH BAYAR --}}
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
            <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">Sudah Bayar</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_bayar_jml">39</div>
                                <span class="text-success">+5 hari ini</span>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;" id="spb_bayar_nilai">78 Jt</div>
                                <span class="text-success">Proses ... hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END SUDAH BAYAR --}}
        </div>
        {{-- END FIRST ROW CARD --}}

        <div class="row mb-2">
            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                {{-- PENGAJUAN--}}
                <div class="card card-dash rounded-lg">
                    <div class="card-body">
                        <div id="chart-pengajuan" style="width:100%; height:12.5rem;"></div>
                    </div>
                </div>
                {{-- END PENGAJUAN --}}
            </div>

            <div class="col-lg-6 col-md-12 px-1">
                {{-- KAS--}}
                <div class="card card-dash rounded-lg">
                    <div class="card-body">
                        <div id="chart-kas" style="width:100%; height:12.5rem;"></div>
                    </div>
                </div>
                {{-- END PENGAJUAN --}}
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 px-1">
                <div class="card card-dash rounded-lg">
                    <div class="card-body pt-2" style="width:100%; height:6rem;">
                        <div class="row">
                            <div class="col-12"><span style="font-size: 1rem;">SPB</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;">39</div>
                            </div>
                            <div class="col-6" style="border-left: 1px dashed black;">
                                <div class="font-weight-bold mb-1" style="font-size: 1.5rem;">78 Jt</div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="card card-dash rounded-lg">
                            <div class="card-body pt-2" style="width:100%; height:6rem;">
                            <span style="font-size: 1rem;">Rata-rata Proses</span>
                            <div class="font-weight-bold mb-1" style="font-size: 1.5rem;">39</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="card card-dash rounded-lg">
                            <div class="card-body pt-2" style="width:100%; height:6rem;">
                            <span style="font-size: 1rem;" class="text-danger" >Revisi</span>
                                <div class="text-danger" style="font-size: 1.5rem;">10</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 px-1">
                {{-- RATA2 HARI --}}
                <div class="card card-dash ">
                    <div class="card-header">
                        <div class="card-body">
                            <div id="chart-harian" style="width:100%; height:12.5rem;"></div>
                        </div>
                    </div>
                </div>
                {{-- END RATA2 HARI --}}
            </div>
            <div class="col-lg-6 col-md-12 px-1">
                {{-- PENCAPAIAN SASARAN MUTU --}}
                <div class="card card-dash rounded-lg">
                    <div class="card-body">
                        <div id="chart-pencapaian" style="width:100%; height:12.5rem;"></div>
                    </div>
                </div>
                {{-- END PENCAPAIAN SASARAN MUTU --}}
            </div>
        </div>
        {{-- END RIGHT SIDE --}}

</section>
{{-- END BODY --}}