<script type="text/javascript">
var performChart = null;
var lembagaChart = null;
var yoyChart = null;
var trendChartFP = null;
var akunChart = null;

// UPDATE CHART DETAIL
function updateChartDetail(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-detail-perform') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "kode_grafik[0]": "=", 
            "kode_grafik[1]": kode_grafik,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            performChart.series[0].update({
                name: 'Presentase Anggaran',
                color: '#CED4DA',
                data: data.anggaran,
                pointPadding: 0.3,
                pointPlacement: 0
            }, true) // true untuk redraw

            performChart.series[1].update({
                name: 'Presentase Realisasi',
                colorByPoint: true,
                data: data.realisasi,
                pointPadding: 0.4,
                pointPlacement: 0
            }, true) // true untuk redraw
        }
    });  

    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-detail-lembaga') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "kode_grafik[0]": "=", 
            "kode_grafik[1]": kode_grafik,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            lembagaChart.series[0].update({
                data: data
            }, true) // true untuk redraw
        }
    }); 

    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-detail-kelompok') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "kode_grafik[0]": "=", 
            "kode_grafik[1]": kode_grafik,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            console.log(data);
            yoyChart.update({
                xAxis: {
                    categories: data.kategori
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            // padding:10,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'justify',
                            useHTML: true,
                            formatter: function () {
                                // return toMilyar(this.y,2);
                                return $('<div/>').css({
                                    // 'color' : 'white', // work
                                    'padding': '0 3px',
                                    'font-size': '9px',
                                    // 'backgroundColor' : this.point.color  // just white in my case
                                }).text(toMilyar(this.point.y,1))[0].outerHTML;
                            }
                        },
                        label: {
                            connectorAllowed: true
                        },
                        marker:{
                            enabled: true
                        },
                        pointStart: parseInt(data.kategori[0])
                    }
                },
                series: data.series
            }, true) // true untuk redraw
        }
    }); 
    
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-ypt-dash/data-fp-detail-akun') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "kode_grafik[0]": "=", 
    //         "kode_grafik[1]": kode_grafik,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         var data = result.data;
    //         akunChart.series[0].update({
    //             data: data
    //         })
    //     }
    // });
}
// END UPDATE CHART DETAIL

// LOAD CHART IN DETAIL
function createChartPerform(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-detail-perform') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "kode_grafik[0]": "=", 
            "kode_grafik[1]": kode_grafik,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_lokasi": $filter_lokasi
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            
            performChart = Highcharts.chart('perfomansi-chart', {
                chart: {
                    type: 'column'
                },
                title: { text: '' },
                subtitle: { text: '' },
                exporting:{ 
                    enabled: false
                },
                legend:{  enabled: false },
                credits: { enabled: false },
                xAxis: {
                    categories: data.kategori
                },
                yAxis: [{
                    min: 0,
                    title: {
                        text: 'Presentase'
                    }
                }],
                legend: {
                    enabled: false
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
                    name: 'Presentase Anggaran',
                    color: '#CED4DA',
                    data: data.anggaran,
                    pointPadding: 0.5,
                    pointPlacement: 0,
                    pointWidth: 50
                }, {
                    name: 'Presentase Realisasi',
                    colorByPoint: true,
                    data: data.realisasi,
                    pointPadding: 0.6,
                    pointPlacement: 0,
                    pointWidth: 30,
                    dataLabels: {
                        enabled: true,
                        overflow: 'justify',
                        allowOverlap:true,
                        crop: false,
                        useHTML: true,
                        formatter: function () {
                            // return toMilyar(this.y,2);
                            return $('<div/>').css({
                                // 'color' : 'white', // work
                                'padding': '0 3px',
                                'font-size': '12px',
                                // 'backgroundColor' : this.point.color  // just white in my case
                            }).text(number_format(this.point.y,1)+'%')[0].outerHTML;
                        }
                    }
                }]
            });
            // performChart = Highcharts.chart('perfomansi-chart', {
            //     chart: {
            //         type: 'column',
            //         height: 275,
            //         width: 600
            //     },
            //     title: { text: '' },
            //     subtitle: { text: '' },
            //     exporting:{ 
            //         enabled: false
            //     },
            //     legend:{  enabled: false },
            //     credits: { enabled: false },
            //     xAxis: {
            //         categories: data.kategori
            //     },
            //     yAxis: {
            //         title: {
            //             text: 'Presentase'
            //         }
            //     },
            //     plotOptions: {
            //         column: {
            //             grouping: true,
            //             stacking: 'normal',
            //             dataLabels: {
            //                 enabled: true,
            //                 overflow: 'justify',
            //                 useHTML: true,
            //                 formatter: function () {
            //                     var visible = "block"
            //                     var color = '#000000'
            //                     if(this.point.color == '#CED4DA') {
            //                         visible = 'none'
            //                     } else {
            //                         visible = 'block'
            //                     }

            //                     if(this.point.color == '#434348') {
            //                         color = '#ffffff'
            //                     } else {
            //                         color = '#000000'
            //                     }

            //                     if(this.y < 0.1){
            //                         return '';
            //                     } else {
            //                         return $('<div/>').css({
            //                             'display': visible,
            //                             'color' : color,
            //                             'padding': '0 3px',
            //                             'font-size': '10px',
            //                             'backgroundColor' : this.point.color  // just white in my case
            //                         }).text(sepNum(this.y)+'%')[0].outerHTML;
            //                     }
            //                 }
            //             }
            //         }
            //     },
            //     series: [
            //         {
            //             name: 'Presentase Anggaran',
            //             data: data.anggaran,
            //             color: '#CED4DA',
            //             stake: 'n1'
            //         },
            //         {
            //             name: 'Presentase Realisasi',
            //             colorByPoint: true,
            //             data: data.realisasi,
            //             stake: 'n1'
            //         },
            //     ],
            // });

            $render = 1;
        }
    });
}

function createChartLembaga(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-detail-lembaga') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "kode_grafik[0]": "=", 
            "kode_grafik[1]": kode_grafik,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_lokasi": $filter_lokasi
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;

            lembagaChart = Highcharts.chart('lembaga-chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    height: 400,
                    width: 500
                },
                title: { text: '' },
                subtitle: { text: '' },
                exporting:{ 
                    enabled: false
                },
                legend:{ enabled: false },
                credits: { enabled: false },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                defs: {
                    patterns: [{
                        'id': 'custom-pattern',
                        'path': {
                            d: 'M 0 10 L 10 0 M -1 1 L 1 -1 M 9 11 L 11 9',
                            stroke: Highcharts.getOptions().colors[1],
                            strokeWidth: 2
                        }
                    }]
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        center: ['40%', '50%'],
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            formatter: function() {
                                var y = this.y;
                                var negative = this.point.negative;
                                var key = this.key;
                                var html = null;

                                if(negative) {
                                    html = `<span style="color: #830000;">-${number_format(y,2)}%</span>`;
                                } else {
                                    html = `<span style="color: #000000;">${number_format(y,2)}%</span>`;
                                }
                                return html;
                            }
                        },
                        size: '50%',
                        showInLegend: true
                    },
                    series: {
                        dataLabels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Jumlah',
                    colorByPoint: true,
                    data: data
                }]
            }, function() {
                var series = this.series;
                $('.lembaga-legend').html('');
                var html = "";
                for(var i=0;i<series.length;i++) {
                    var point = series[i].data;
                    for(var j=0;j<point.length;j++) {
                        var color = point[j].color;
                        var negative = point[j].negative;
                        if(negative) {
                            point[j].graphic.element.style.fill = 'url(#custom-pattern)'
                            point[j].color = 'url(#custom-pattern)'  
                            point[j].connector.element.style.stroke = 'black'
                            point[j].connector.element.style.strokeDasharray = '4, 4'        
                            html+= '<div class="item"><div class="symbol"><svg><circle fill="url(#pattern-1)" stroke="black" stroke-width="1" cx="5" cy="5" r="4"></circle><pattern id="pattern-1" patternUnits="userSpaceOnUse" width="10" height="10"><path d="M 0 10 L 10 0 M -1 1 L 1 -1 M 9 11 L 11 9" stroke="#434348" stroke-width="2"></path></pattern>Sorry, your browser does not support inline SVG.</svg> </div><div class="serieName truncate row" style=""><div class="col-4"> ' + point[j].name.substring(0,10) + ' : </div><div class="col-8 text-right bold" style="color:#830000">'+toMilyar(point[j].nilai,2)+'</div></div></div>';                  
                        }else{
                            if(color == '#7cb5ec') {
                                point[j].graphic.element.style.fill = '#830000'
                                point[j].connector.element.style.stroke = '#830000'
                                html+= '<div class="item"><div class="symbol" style="background-color:#830000"></div><div class="serieName truncate row" style=""><div class="col-4"> ' + point[j].name.substring(0,10) + ' : </div><div class="col-8 text-right bold">'+toMilyar(point[j].nilai,2)+'</div></div></div>';
                            }else{

                                html+= '<div class="item"><div class="symbol" style="background-color:'+color+'"></div><div class="serieName truncate row" style=""><div class="col-4"> ' + point[j].name.substring(0,10) + ' : </div><div class="col-8 text-right bold">'+toMilyar(point[j].nilai,2)+'</div></div></div>';
                            }
                        }
                    }
                }
                $('.lembaga-legend').html(html);
            });

            $render = 1;
        }
    });
}

(function (H) {
    H.addEvent(H.Axis, 'afterInit', function () {
        const logarithmic = this.logarithmic;

        if (logarithmic && typeof this.options.custom == 'object') {

            // Avoid errors on negative numbers on a log axis
            this.positiveValuesOnly = false;

            // Override the converter functions
            logarithmic.log2lin = num => {
                const isNegative = num < 0;

                let adjustedNum = Math.abs(num);

                if (adjustedNum < 10) {
                    adjustedNum += (10 - adjustedNum) / 10;
                }

                const result = Math.log(adjustedNum) / Math.LN10;
                return isNegative ? -result : result;
            };

            logarithmic.lin2log = num => {
                const isNegative = num < 0;

                let result = Math.pow(10, Math.abs(num));
                if (result < 10) {
                    result = (10 * (result - 1)) / (10 - 1);
                }
                return isNegative ? -result : result;
            };
        }
    });
}(Highcharts));

function createChartKelompok(kode_grafik = null) {
    
    if(kode_grafik != "PI04" && kode_grafik != "PI03"){

        $.ajax({
            type: 'GET',
            url: "{{ url('dash-ypt-dash/data-fp-detail-kelompok') }}",
            data: {
                "periode[0]": "=", 
                "periode[1]": $filter2_kode,
                "kode_grafik[0]": "=", 
                "kode_grafik[1]": kode_grafik,
                "tahun": $tahun,
                "jenis": $filter1_kode,
                "kode_lokasi": $filter_lokasi
            },
            dataType: 'json',
            async: true,
            success:function(result) {
                var data = result.data;
                yoyChart = Highcharts.chart('yoy-chart', {
                    chart: {
                        events: {
                            drilldown: function(e) {
                                if (!e.seriesOptions) {
                                    var chart = this;
                                    chart.yAxis[0].update({
                                        type: 'logarithmic',
                                        custom: {
                                            allowNegativeLog: true
                                        },
                                        minorTickInterval: 'auto',
                                        accessibility: {
                                            rangeDescription: 'Range: 0.1 to 1000'
                                        },
                                        title: {
                                            text: 'Nilai'
                                        },
                                        labels: {
                                            formatter: function() {
                                                return singkatNilai(this.value);
                                            }
                                        }
                                    });
                                    var drilldown = data.drilldown;
                                    for(d=0; d < drilldown.length; d++){
                                        chart.addSingleSeriesAsDrilldown(e.point, drilldown[d]);
                                    }
                                    chart.applyDrilldown();
                                }
                            }
                        }
                    },
                    title: { text: '' },
                    subtitle: { text: '' },
                    exporting:{ 
                        enabled: false
                    },
                    legend:{ 
                        enabled: true,
                        // layout: 'vertical',
                        // align: 'right',
                        // verticalAlign: 'middle' 
                    },
                    credits: { enabled: false },
                    xAxis: {
                        categories: data.kategori
                    },
                    yAxis: {
                        type: 'logarithmic',
                        minorTickInterval: 'auto',
                        custom: {
                            allowNegativeLog: true
                        },
                        accessibility: {
                            rangeDescription: 'Range: 0.1 to 1000'
                        },
                        title: {
                            text: 'Nilai'
                        },
                        labels: {
                            formatter: function() {
                                return singkatNilai(this.value);
                            }
                        }
                    },
                    plotOptions: {
                        series: {
                            dataLabels: {
                                // padding:10,
                                allowOverlap:true,
                                enabled: true,
                                crop: false,
                                overflow: 'justify',
                                useHTML: true,
                                formatter: function () {
                                    // return toMilyar(this.y,2);
                                    return $('<div/>').css({
                                            // 'color' : 'white', // work
                                            'padding': '0 3px',
                                            'font-size': '9px',
                                            // 'backgroundColor' : this.point.color  // just white in my case
                                        }).text(toMilyar(this.point.y,1))[0].outerHTML;
                                }
                            },
                            label: {
                                connectorAllowed: true
                            },
                            marker:{
                                enabled: true
                            },
                            pointStart: parseInt(data.kategori[0])
                        }
                    },
                    series: data.series,
                    drilldown: {
                        series: []
                    }
                });
    
                $render = 1;
            }
        });
        $('#dekstop-5').show();
        $('#dekstop-6').hide();

    }else{
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-ypt-dash/data-fp-detail-or-5tahun') }}",
            data: {
                "periode[0]": "=", 
                "periode[1]": $filter2_kode,
                "kode_grafik[0]": "=", 
                "kode_grafik[1]": kode_grafik,
                "tahun": $tahun,
                "jenis": $filter1_kode,
                "kode_lokasi": $filter_lokasi
            },
            dataType: 'json',
            async: true,
            success:function(result) {
                var data = result.data;
                trendChartFP = Highcharts.chart('trend-chart', {
                    chart: {
                        events: {
                            drilldown: function(e) {
                                if (!e.seriesOptions) {
                                    var chart = this;
                                    chart.yAxis[0].update({
                                        type: 'logarithmic',
                                        custom: {
                                            allowNegativeLog: true
                                        },
                                        minorTickInterval: 'auto',
                                        accessibility: {
                                            rangeDescription: 'Range: 0.1 to 1000'
                                        },
                                        title: {
                                            text: 'Nilai'
                                        },
                                        labels: {
                                            formatter: function() {
                                                return singkatNilai(this.value);
                                            }
                                        }
                                    });
                                    var drilldown = data.drilldown;
                                    for(d=0; d < drilldown.length; d++){
                                        chart.addSingleSeriesAsDrilldown(e.point, drilldown[d]);
                                    }
                                    chart.applyDrilldown();
                                }
                            }
                        }
                    },
                    title: { text: '' },
                    subtitle: { text: '' },
                    exporting:{ 
                        enabled: false
                    },
                    legend:{ 
                        enabled: true
                    },
                    credits: { enabled: false },
                    xAxis: {
                        categories: data.kategori
                    },
                    yAxis: {
                        type: 'logarithmic',
                        custom: {
                            allowNegativeLog: true
                        },
                        minorTickInterval: 'auto',
                        accessibility: {
                            rangeDescription: 'Range: 0.1 to 1000'
                        },
                        title: {
                            text: 'Nilai'
                        },
                        labels: {
                            formatter: function() {
                                return singkatNilai(this.value);
                            }
                        }
                    },
                    plotOptions: {
                        series: {
                            dataLabels: {
                                // padding:10,
                                allowOverlap:true,
                                enabled: true,
                                crop: false,
                                overflow: 'justify',
                                useHTML: true,
                                formatter: function () {
                                    // return toMilyar(this.y,2);
                                    if(kode_grafik == 'PI03'){
                                        return $('<div/>').css({
                                                // 'color' : 'white', // work
                                                'padding': '0 3px',
                                                'font-size': '9px',
                                                // 'backgroundColor' : this.point.color  // just white in my case
                                            }).text(toMilyar(this.point.y,1))[0].outerHTML;
                                    }else{

                                        return $('<div/>').css({
                                                // 'color' : 'white', // work
                                                'padding': '0 3px',
                                                'font-size': '9px',
                                                // 'backgroundColor' : this.point.color  // just white in my case
                                            }).text(number_format(this.point.y,1)+'%')[0].outerHTML;
                                    }
                                }
                            },
                            label: {
                                connectorAllowed: true
                            },
                            marker:{
                                enabled: true
                            },
                            pointStart: parseInt(data.kategori[0])
                        }
                    },
                    series: data.series,
                    drilldown: {
                        series: []
                    }
                });
    
                $render = 1;
            }
        });
        $('#dekstop-5').hide();
        $('#dekstop-6').show();
    }
}

function createChartAkun(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-detail-akun') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "kode_grafik[0]": "=", 
            "kode_grafik[1]": kode_grafik,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_lokasi": $filter_lokasi
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            
            akunChart = Highcharts.chart('akun-chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'variablepie',
                    height: 275,
                    width: 470
                },
                title: { text: '' },
                subtitle: { text: '' },
                exporting:{ 
                    enabled: false
                },
                legend:{ enabled: false },
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
                        center: ['50%', '50%'],
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '{point.name} : {point.percentage:.1f} %'
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    minPointSize: 60,
                    innerSize: '20%',
                    name: 'Persentase',
                    colorByPoint: true,
                    data: data
                }]
            }, function() {
                var series = this.series;
                for(var i=0;i<series.length;i++) {
                    var point = series[i].data;
                    for(var j=0;j<point.length;j++) {
                        var color = point[j].color;
                        if(color == '#434348') {
                            point[j].graphic.element.style.fill = '#830000'
                        }
                    }
                }
            });

            $render = 1;
        }
    });
}
// END LOAD CHART IN DETAIL

// CUSTOM EXPORT HIGHCHART
// PERFORMANSI LEMBAGA
$('#export-perform.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-perform').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        performChart.update({
            title: {
                text: ' % Pencapaian Anggaran Lembaga',
                floating: true,
                x: 40,
                y: 20
            }
        })
        performChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        performChart.print()
    } else if(jenis == 'Download PNG image') {
        performChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: ' % Pencapaian Anggaran Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        performChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: ' % Pencapaian Anggaran Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        performChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: ' % Pencapaian Anggaran Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        performChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: ' % Pencapaian Anggaran Lembaga'
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        performChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})
// END PERFORMANSI LEMBAGA
// PER LEMBAGA
$('#export-lembaga.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-lembaga').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        lembagaChart.update({
            title: {
                text: `Kontribusi ${$judulChart} Lembaga`,
                floating: true,
                x: 40,
                y: 90
            }
        })
        lembagaChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        lembagaChart.print()
    } else if(jenis == 'Download PNG image') {
        lembagaChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Kontribusi ${$judulChart} Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        lembagaChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Kontribusi ${$judulChart} Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        lembagaChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Kontribusi ${$judulChart} Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        lembagaChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Kontribusi ${$judulChart} Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        lembagaChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})
// END PER LEMBAGA
// PER KELOMPOK YOY
$('#export-yoy.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-yoy').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        yoyChart.update({
            title: {
                text: `Kelompok ${$judulChart} YoY`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        yoyChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        yoyChart.print()
    } else if(jenis == 'Download PNG image') {
        yoyChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        yoyChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        yoyChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        yoyChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Kelompok ${$judulChart} YoY`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        yoyChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})
// END KELOMPOK YOY
// PER TREND OR
$('#export-trend.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-trend').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        trendChartFP.update({
            title: {
                text: `Trend ${$judulChart} 5 Tahun Per Lembaga`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        trendChartFP.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        trendChartFP.print()
    } else if(jenis == 'Download PNG image') {
        trendChartFP.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Trend ${$judulChart} 5 Tahun Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        trendChartFP.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Trend ${$judulChart} 5 Tahun Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        trendChartFP.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Trend ${$judulChart} 5 Tahun Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        trendChartFP.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Trend ${$judulChart} 5 Tahun Per Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        trendChartFP.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})
// END TREND OR
// PER AKUN
$('#export-akun.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-akun').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        akunChart.update({
            title: {
                text: `${$judulChart} Per Akun`,
                // floating: true,
                x: 40,
                y: 20
            }
        })
        akunChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        akunChart.print()
    } else if(jenis == 'Download PNG image') {
        akunChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        akunChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        akunChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        akunChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `${$judulChart} Per Akun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        akunChart.viewData()
        var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
        if(!cek) {
            $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
        }
        $("body").css("overflow", "scroll");
    } else if(jenis == 'Hide table data') {
        $(this).text('View table data')
        $('.highcharts-data-table').hide()
        $("body").css("overflow", "hidden");
    }
})
// END PER AKUN
// END CUSTOM EXPORT HIGHCHART

// FULLSCREEN HIGHCHART
document.addEventListener('fullscreenchange', (event) => {
  if (document.fullscreenElement) {
    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
  } else {
      $full = '0';
    performChart.update({
        title: {
            text: ''
        }
    })

    lembagaChart.update({
        title: {
            text: ''
        }
    })

    yoyChart.update({
        title: {
            text: ''
        }
    })

    trendChartFP.update({
        title: {
            text: ''
        }
    })

    // akunChart.update({
    //     title: {
    //         text: ''
    //     }
    // })
    console.log('Leaving full-screen mode.');
  }
});
// END FULLSCREEN HIGHCHART
</script>
<section id="detail-dash" class="mt-20 pb-24" style="display: none">
    {{-- ROW 4 --}}
    <div id="dekstop-4" class="row dekstop">
        <div class="col-6 pl-12 pr-0">
            <div class="card card-dash border-r-0" id="dash-perform">
                <div class="row header-div" id="card-perform">
                    <div class="col-9">
                        <h4 class="header-card"> % Pencapaian Anggaran Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-perform">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="perfomansi-chart" class="mt-8"></div>
            </div>
        </div>
        <div class="col-6 pl-1 pr-0">
            <div class="card card-dash  border-r-0" id="dash-lembaga">
                <div class="row header-div" id="card-lembaga">
                    <div class="col-9">
                        <h4 class="header-card">Kontribusi <span class="title-chart"></span> Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-lembaga">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div id="lembaga-chart" class="mt-8"></div>
                    </div>
                    <div class="col-4 my-auto">
                        <div class="lembaga-legend"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dekstop-5" class="row dekstop mt-4">
        <div class="col-12 pl-12 pr-0">
            <div class="card card-dash  border-r-0" id="dash-yoy">
                <div class="row header-div" id="card-yoy">
                    <div class="col-9">
                        <h4 class="header-card">Kelompok <span class="title-chart"></span> YoY</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-yoy">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="yoy-chart" class="mt-8"></div>
            </div>
        </div>
        {{-- <div id="container" style='height:400px;width:400px'></div> --}}
        {{-- <div class="col-5 pl-1 pr-0">
            <div class="card card-dash  border-r-0" id="dash-akun">
                <div class="row header-div" id="card-akun">
                    <div class="col-9">
                        <h4 class="header-card">Kelompok <span class="title-chart"></span></h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-akun">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="akun-chart" class="mt-8"></div>
            </div>
        </div>--}}
    </div>

    <div id="dekstop-6" class="row dekstop mt-4">
        <div class="col-12 pl-12 pr-0">
            <div class="card card-dash  border-r-0" id="dash-trend">
                <div class="row header-div" id="card-trend">
                    <div class="col-9">
                        <h4 class="header-card">Trend <span class="title-chart"></span> 5 Tahun Per Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-trend">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="trend-chart" class="mt-8"></div>
            </div>
        </div>
        {{-- <div id="container" style='height:400px;width:400px'></div> --}}
        {{-- <div class="col-5 pl-1 pr-0">
            <div class="card card-dash  border-r-0" id="dash-akun">
                <div class="row header-div" id="card-akun">
                    <div class="col-9">
                        <h4 class="header-card">Kelompok <span class="title-chart"></span></h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-akun">
                        <ul>
                            <li class="menu-chart-item fullscreen">View in full screen</li>
                            <li class="menu-chart-item print">Print chart</li>
                            <hr>
                            <li class="menu-chart-item print png">Download PNG image</li>
                            <li class="menu-chart-item print jpg">Download JPEG image</li>
                            <li class="menu-chart-item print pdf">Download PDF document</li>
                            <li class="menu-chart-item print svg">Download SVG vector image</li>
                            <li class="menu-chart-item print svg">View table data</li>
                        </ul>
                    </div>
                </div>
                <div id="akun-chart" class="mt-8"></div>
            </div>
        </div>--}}
    </div>
    {{-- END ROW 4 --}}
</section>
{{-- END CONTENT DETAIL --}}