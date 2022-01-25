<script type="text/javascript">
var performChart = null;
var lembagaChart = null;
var yoyChart = null;
var akunChart = null;

// UPDATE CHART DETAIL
function updateChartDetail(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-detail-perform') }}",
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
        url: "{{ url('dash-tarbak-dash/data-fp-detail-lembaga') }}",
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
        url: "{{ url('dash-tarbak-dash/data-fp-detail-kelompok') }}",
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
            yoyChart.update({
                xAxis: {
                    categories: data.kategori
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        },
                        marker:{
                            enabled:false
                        },
                        pointStart: parseInt(data.kategori[0])
                    }
                },
                series: data.series
            }, true) // true untuk redraw
        }
    }); 
    
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-detail-akun') }}",
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
            akunChart.series[0].update({
                data: data
            })
        }
    });
}
// END UPDATE CHART DETAIL

// LOAD CHART IN DETAIL
function createChartPerform(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-detail-perform') }}",
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
                    pointPadding: 0.3,
                    pointPlacement: 0
                }, {
                    name: 'Presentase Realisasi',
                    colorByPoint: true,
                    data: data.realisasi,
                    pointPadding: 0.4,
                    pointPlacement: 0
                }]
            });
            // performChart = Highcharts.chart('perfomansi-chart', {
            //     chart: {
            //         type: 'column',
            //         // height: 275,
            //         // width: 600
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
            //             grouping: false,
            //             // stacking: 'normal',
            //             shadow: false,
            //             borderWidth: 0,
            //             // dataLabels: {
            //             //     enabled: true,
            //             //     overflow: 'justify',
            //             //     useHTML: true,
            //             //     formatter: function () {
            //             //         var visible = "block"
            //             //         var color = '#000000'
            //             //         if(this.point.color == '#CED4DA') {
            //             //             visible = 'none'
            //             //         } else {
            //             //             visible = 'block'
            //             //         }

            //             //         if(this.point.color == '#434348') {
            //             //             color = '#ffffff'
            //             //         } else {
            //             //             color = '#000000'
            //             //         }

            //             //         if(this.y < 0.1){
            //             //             return '';
            //             //         } else {
            //             //             return $('<div/>').css({
            //             //                 'display': visible,
            //             //                 'color' : color,
            //             //                 'padding': '0 3px',
            //             //                 'font-size': '10px',
            //             //                 'backgroundColor' : this.point.color  // just white in my case
            //             //             }).text(sepNum(this.y)+'%')[0].outerHTML;
            //             //         }
            //             //     }
            //             // }
            //         }
            //     },
            //     series: [
            //         {
            //             name: 'Presentase Anggaran',
            //             data: data.anggaran,
            //             color: '#CED4DA',
            //             stake: 'n1',
            //             pointPadding: 0.3,
            //             pointPlacement: 0
            //         },
            //         {
            //             name: 'Presentase Realisasi',
            //             colorByPoint: true,
            //             data: data.realisasi,
            //             stake: 'n1',
            //             pointPadding: 0.3,
            //             pointPlacement: 0
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
        url: "{{ url('dash-tarbak-dash/data-fp-detail-lembaga') }}",
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

            lembagaChart = Highcharts.chart('lembaga-chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
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
                        size: '65%',
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Jumlah',
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
                            point[j].graphic.element.style.fill = '#000744'
                        }
                    }
                }
            });

            $render = 1;
        }
    });
}

function createChartKelompok(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-detail-kelompok') }}",
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
            yoyChart = Highcharts.chart('yoy-chart', {
                chart: {
                    height: 275,
                    width: 600
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
                        label: {
                            connectorAllowed: false
                        },
                        marker:{
                            enabled:false
                        },
                        pointStart: parseInt(data.kategori[0])
                    }
                },
                series: data.series
            });

            $render = 1;
        }
    });
}

function createChartAkun(kode_grafik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-detail-akun') }}",
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
                            point[j].graphic.element.style.fill = '#000744'
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
        performChart.update({
            title: {
                text: 'Performansi Lembaga',
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
                text: 'Performansi Lembaga'
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
                text: 'Performansi Lembaga'
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
                text: 'Performansi Lembaga'
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
                text: 'Performansi Lembaga'
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
        lembagaChart.update({
            title: {
                text: `${$judulChart} Per Lembaga`,
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
                text: `${$judulChart} Per Lembaga`,
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
                text: `${$judulChart} Per Lembaga`,
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
                text: `${$judulChart} Per Lembaga`,
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
                text: `${$judulChart} Per Lembaga`,
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
// PER AKUN
$('#export-akun.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-akun').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
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

    akunChart.update({
        title: {
            text: ''
        }
    })
    console.log('Leaving full-screen mode.');
  }
});
// END FULLSCREEN HIGHCHART
</script>

<section id="detail-dash" class="mt-20 pb-24" style="display: none">
    {{-- ROW 4 --}}
    <div id="dekstop-4" class="row dekstop">
        <div class="col-7 pl-12 pr-0">
            <div class="card card-dash border-r-0" id="dash-perform">
                <div class="row header-div" id="card-perform">
                    <div class="col-9">
                        <h4 class="header-card">Performansi Lembaga</h4>
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
        <div class="col-5 pl-1 pr-0">
            <div class="card card-dash  border-r-0" id="dash-lembaga">
                <div class="row header-div" id="card-lembaga">
                    <div class="col-9">
                        <h4 class="header-card"><span class="title-chart"></span> Per Lembaga</h4>
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
                <div id="lembaga-chart" class="mt-8"></div>
            </div>
        </div>
    </div>

    <div id="dekstop-5" class="row dekstop mt-4">
        <div class="col-7 pl-12 pr-0">
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
        <div class="col-5 pl-1 pr-0">
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
        </div>
    </div>
    {{-- END ROW 4 --}}
</section>
{{-- END CONTENT DETAIL --}}