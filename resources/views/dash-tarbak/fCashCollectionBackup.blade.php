<link rel="stylesheet" href="{{ asset('dash-asset/dash-tarbak/ccr.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-tarbak/global.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js?version=_').time() }}"></script>

<script type="text/javascript">
var $tahun = parseInt($('#year-filter').text())
var $filter1 = "Periode";
var $filter2 = getNamaBulan("09");
var $filter_lokasi = "";
var $month = "09";
var $filter1_kode = "PRD";
var $bln_rev_rentang = "Jan-"+bulanSingkat($tahun+''+(parseInt($month)-1));
var $bln_singkat = bulanSingkat($tahun+''+$month);

// CONFIG FUNCTION
function showNotification(message) {
    $.notify(
        {
            title: 'Update',
            message: message,
            target: "_blank"
        },
        {
            element: "body",
            position: null,
            type: 'success',
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: false,
            placement: {
                from: 'top',
                align: 'center'
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            delay: 4000,
            timer: 2000,
            url_target: "_blank",
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp"
            },
            onShow: null,
            onShown: null,
            onClose: null,
            onClosed: null,
            icon_type: "class",
            template: `<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">
                <button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>
                <span data-notify="icon"></span>
                <span data-notify="title">{1}</span>
                <span data-notify="message">{2}</span>
                <div class="progress" data-notify="progressbar">
                    <div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                </div>
                <a href="{3}" target="{4}" data-notify="url"></a>
                </div>`
        }
    );
}
// END CONFIG FUNCTION

$('#select-text-ccr').text(`${$filter2.toUpperCase()} ${$tahun}`)
$('#judul-ccr-now1').text(`CCR ${$tahun}`)
$('#judul-ccr-now2').text(`${$bln_rev_rentang}`)
$('#judul-ccr-month').text(`CCR ${$bln_singkat}`)

if($filter1 == 'Periode') {
    $('#list-filter-2').find('.list').each(function() {
        if($(this).data('bulan').toString() == $month) {
            $(this).addClass('selected')
            $month = $(this).data('bulan').toString();
            return false;
        }
    })
}

$(window).on('resize', function(){
    var win = $(this); //this = window
    if (win.height() == 800) { 
        $("body").css("overflow", "hidden");
    }
    if (win.height() > 800) { 
        $("body").css("overflow", "scroll");
    }
    if (win.height() < 800) { 
        $("body").css("overflow", "scroll");
    }
});

$(window).click(function() {
    $('#filter-box').addClass('hidden')
    $('.menu-chart-custom').addClass('hidden');
    if($(window).height() == 800) {
        $("body").css("overflow", "hidden");
    }
    if($(window).height() > 800) {
        $("body").css("overflow", "scroll");
    }
    if($(window).height() < 800) {
        $("body").css("overflow", "scroll");
    }

    $('#select-text-ccr').text(`${$filter2.toUpperCase()} ${$tahun}`)
});

// RUN IF RENDER FIRST TIME
function getDataBox(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-ccr-box') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            
            $('#ccr-all').text(`${number_format(data.ccr_total.persentase,2)}%`)
            $('#ccr-prev').text(`${number_format(data.ccr_tahun_lalu.persentase,2)}%`)
            $('#ccr-now').text(`${number_format(data.ccr_tahun_ini.persentase,2)}%`)
            $('#ccr-month').text(`${number_format(data.ccr_periode.persentase,2)}%`)

            $('#ccr-all-ar').text(`${toMilyar(data.ccr_total.ar,2)}`)
            $('#ccr-prev-ar').text(`${toMilyar(data.ccr_tahun_lalu.ar,2)}`)
            $('#ccr-now-ar').text(`${toMilyar(data.ccr_tahun_ini.ar,2)}`)
            $('#ccr-month-ar').text(`${toMilyar(data.ccr_periode.ar,2)}`)

            $('#ccr-all-inflow').text(`${toMilyar(data.ccr_total.inflow,2)}`)
            $('#ccr-prev-inflow').text(`${toMilyar(data.ccr_tahun_lalu.inflow,2)}`)
            $('#ccr-now-inflow').text(`${toMilyar(data.ccr_tahun_ini.inflow,2)}`)
            $('#ccr-month-inflow').text(`${toMilyar(data.ccr_periode.inflow,2)}`)
        }
    });
}

var timeoutID = null;

(function() {
    $.ajax({
        type:'GET',
        url: "{{ url('dash-tarbak-dash/data-rasio-lembaga') }}",
        dataType: 'JSON',
        success: function(result) {
            $('#filter-checkbox').html('');
            var html = ``;
            if(result.status){
                if(typeof result.data == 'object' && result.data.length > 0){
                    for(var i=0; i < result.data.length; i++){
                        var line = result.data[i];
                        if(line.kode_lokasi == "12"){
                            var check = "checked";
                        }else{
                            var check = "";
                        }
                        html +=`
                        <div class="col-12 mt-6">
                            <label class="container-checkbox-filter">
                                <input type="checkbox" id="`+line.kode_lokasi+`" name="kode_lokasi[]" class="checkbox-input" value="`+line.kode_lokasi+`" `+check+`>
                                <span class="checkmark"></span>
                                <span class="container-checkbox-filter-text">`+line.nama+`</span>
                            </label>
                        </div>`;
                    }
                }
            }else{
                alert(JSON.stringify(result.message));
            }
            $('#filter-checkbox').html(html);
            
            $('#filter-checkbox').on('change','.checkbox-input',function() {
                var count = $('input.checkbox-input:checked').length;
                var parent = $('input.checkbox-input:checked').parent();
                var judul = $(parent).find('.container-checkbox-filter-text').text()

                if(count > 1 || count == 0) {
                    judul = 'YPT'
                }

                $('#title-dash').text('CCR '+ judul)
                var lokasi = ""; var i=0;
                $("input[name='kode_lokasi[]']:checked").each(function(){
                    console.log($(this).val());
                    if(i == 0){
                        lokasi+=$(this).val();
                    }else{
                        lokasi+=","+$(this).val();
                    }
                    i++;
                });
                $filter_lokasi = lokasi;
                timeoutID = null;
                timeoutID = setTimeout(getDataBox.bind(undefined,{
                    "periode[0]": "=", 
                    "periode[1]": $month,
                    "tahun": $tahun,
                    "jenis": $filter1_kode,
                    "kode_lokasi[0]":"in",
                    "kode_lokasi[1]": $filter_lokasi
                }), 1000);
            })

            $("input[name='kode_lokasi[]']:checked").trigger('change');
        }
    });
})();
// END RUN IF RENDER FIRST TIME

</script>

<script type="text/javascript">
document.addEventListener('fullscreenchange', (event) => {
  if (document.fullscreenElement) {
    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
  } else {
    trendChart.update({
        title: {
            text: ''
        }
    })

    piutangChart.update({
        title: {
            text: ''
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                center: ['35%', '50%'],
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    distance: -30,
                    useHTML: true,
                    align: 'left',
                    formatter: function () { 
                        var color = '#000000'
                        if(this.point.color == '#830000') {
                            color = '#ffffff'
                        } else {
                            color = '#000000'
                        }
                        return $('<div/>').css({
                            'color': color,
                            'font-size': '9px',
                            'backgroundColor' : this.point.color
                        }).text(this.y + '%')[0].outerHTML
                    }
                },
                size: '120%',
                showInLegend: true
        }   ,
        },
    })

    soakhirChart.update({
        title: {
            text: ''
        }
    })

    lembagaChart.update({
        title: {
            text: ''
        }
    })
    console.log('Leaving full-screen mode.');
  }
});

$('#kurang-tahun').click(function(event) {
    event.stopPropagation();
    $tahun = $tahun - 1;
    $('#year-filter').text($tahun);
})

$('#tambah-tahun').click(function(event) {
    event.stopPropagation();
    $tahun = $tahun + 1;
    $('#year-filter').text($tahun);
})

$('#custom-row').click(function(event) {
    event.stopPropagation();
    $('#filter-box').removeClass('hidden')
})

$('#list-filter-2').on('click', 'div', function(event) {
    event.stopPropagation();
    filter = $(this).data('bulan') 
    
    $filter2 = filter
    $month = filter
    $('#list-filter-2 div').not(this).removeClass('selected')
    $(this).addClass('selected')
    $('#filter-box').addClass('hidden')

    $filter2 = getNamaBulan($filter2)

    $('#select-text-ccr').text(`${$filter2.toUpperCase()} ${$tahun}`)
    
    $bln_rev_rentang = "Jan-"+bulanSingkat($tahun+''+(parseInt($month)-1));
    $bln_singkat = bulanSingkat($tahun+''+$month);
    $('#judul-ccr-now1').text(`CCR ${$tahun}`)
    $('#judul-ccr-now2').text(`${$bln_rev_rentang}`)
    $('#judul-ccr-month').text(`CCR ${$bln_singkat}`)
    var lokasi = ""; var i=0;
    $("input[name='kode_lokasi[]']:checked").each(function(){
        console.log($(this).val());
        if(i == 0){
            lokasi+=$(this).val();
        }else{
            lokasi+=","+$(this).val();
        }
        i++;
    });
    $filter_lokasi = lokasi;
    getDataBox({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_lokasi[0]":"in",
        "kode_lokasi[1]": $filter_lokasi
    });
    showNotification(`Menampilkan dashboard periode ${$filter2.toUpperCase()} ${$tahun}`);
})

$('.icon-menu').click(function(event) {
    event.stopPropagation()
    var parentID = $(this).parents('.header-div').attr('id')
    $('#'+parentID).find('.menu-chart-custom').removeClass('hidden')

    if(parentID == 'card-piutang' || parentID == 'card-soakhir') {
        $("body").css("overflow", "scroll");
    } else {
        $("body").css("overflow", "hidden");
    }
})

var lembagaChart = Highcharts.chart('ccr-lembaga', {
    chart: {
        type: 'packedbubble',
        width: 255,
        height: 423
    },
    legend: {
        enabled: false
    },
    credits: { enabled: false },
    exporting: {
        enabled: false
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        point: {
            valueDescriptionFormat: '{index}. {point.name}, fat: {point.x}g, sugar: {point.y}g, obesity: {point.z}%.'
        }
    },
    yAxis: {
        startOnTick: false,
        endOnTick: false,
        title: {
            text: ''
        },
        maxPadding: 0.1,
    },
    tooltip: {
        pointFormat: '{point.name}: <b>{point.x}%</b>'
    },
    plotOptions: {
         packedbubble: {
            minSize: '30%',
            maxSize: '120%',
            zMin: 0,
            zMax: 1000,
            layoutAlgorithm: {
                splitSeries: false,
                gravitationalConstant: 0.02
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}',
                filter: {
                    property: 'y',
                    operator: '>',
                    value: 50
                },
                style: {
                    color: 'white',
                    textOutline: 'none',
                    fontWeight: 'normal'
                }
            }
        }
    },
    series: [{
        name: 'CCR',
        data: [
            { value:55, name: 'TK'},
            { value:60, name: 'SD'},
            { value:70, name: 'AKATEL'},
            { value:80, name: 'ITTP'},
            { value:40, name: 'X'},
            { value:30, name: 'X'},
            { value:30, name: 'X'},
            { value:20, name: 'X'},
        ]
    }]

}, function() {
    var series = this.series
    for(var i=0;i<series.length;i++) {
        var point = series[i].data
        for(var j=0;j<point.length;j++) {
            if(point[j].options.value > 50) {
                point[j].graphic.element.style.fill = '#EE0000'
            } else {
                point[j].graphic.element.style.fill = '#008034'
            }
        }
    }
});

$('#export-lembaga.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-lembaga').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        lembagaChart.update({
            title: {
                text: `CCR Lembaga`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        yoyChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        lembagaChart.print()
    } else if(jenis == 'Download PNG image') {
        lembagaChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `CCR Lembaga`,
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
                text: `CCR Lembaga`,
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
                text: `CCR Lembaga`,
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
                text: `CCR Lembaga`,
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

var colors = ['#EEBE00', '#830000'];
var piutangChart = Highcharts.chart('komposisi-piutang', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie',
        height: 192,
        width: 270
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting: {
        enabled: false
    },
    legend:{ 
        enabled: true,
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle' 
    },
    credits: { enabled: false },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    colors: colors,
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            center: ['35%', '50%'],
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                distance: -30,
                useHTML: true,
                align: 'left',
                formatter: function () { 
                    var color = '#000000'
                    if(this.point.color == '#830000') {
                        color = '#ffffff'
                    } else {
                        color = '#000000'
                    }
                    return $('<div/>').css({
                        'color': color,
                        'font-size': '9px',
                        'backgroundColor' : this.point.color
                    }).text(this.y + '%')[0].outerHTML
                }
            },
            size: '120%',
            showInLegend: true
        },
    },
    series: [{
        name: 'Komposisi',
        colorByPoint: true,
        data: [
            {
                name: 'LEMDIKTI',
                y: 47.7,
            },
            {
                name: 'Telkom School',
                y: 52.3
            }
        ]
    }],
},
function() {
    $('span[data-z-index="1"]').css({'width': '30px'})
    var series = this.series;
    for(var i=0;i<series.length;i++) {
        var point = series[i].data
        for(var j=0;j<point.length;j++) {
            if(point[j].graphic) {
                point[j].graphic.element.style.fill = colors[j]
            }
        }
    }
});

$('#export-piutang.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-piutang').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        piutangChart.update({
            title: {
                text: `Komposisi Piutang`,
                floating: true,
                x: 40,
                y: 20
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    center: ['50%', '50%'],
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        distance: -30,
                        useHTML: true,
                        align: 'left',
                        formatter: function () { 
                            var color = '#000000'
                            if(this.point.color == '#830000') {
                                color = '#ffffff'
                            } else {
                                color = '#000000'
                            }
                            return $('<div/>').css({
                                'color': color,
                                'font-size': '16px',
                                'backgroundColor' : this.point.color
                            }).text(this.y + '%')[0].outerHTML
                        }
                    },
                    size: '80%',
                    showInLegend: true
                },
            },
        })
        piutangChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        piutangChart.print()
    } else if(jenis == 'Download PNG image') {
        piutangChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            },
            plotOptions: {
                pie: {
                    size: '100%',
                    showInLegend: true
                },
            },
        });
    } else if(jenis == 'Download JPEG image') {
        piutangChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            },
            plotOptions: {
                pie: {
                    size: '100%',
                    showInLegend: true
                },
            },
        });
    } else if(jenis == 'Download PDF document') {
        piutangChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            },
            plotOptions: {
                pie: {
                    size: '100%',
                    showInLegend: true
                },
            },
        });
    } else if(jenis == 'Download SVG vector image') {
        piutangChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            },
            plotOptions: {
                pie: {
                    size: '100%',
                    showInLegend: true
                },
            },
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        piutangChart.viewData()
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

var soakhirChart = Highcharts.chart('saldo-akhir', {
    chart: {
        type: 'column',
        height: 188,
        width: 250
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
    },
    legend:{  enabled: false },
    credits: { enabled: false },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: {
            style: {
                fontSize: '8px'
            }
        }
    },
    yAxis: {
         title: {
            text: 'Nilai'
        }
    },
    plotOptions: {
        column: {
            grouping: false,
        }
    },
    series: [
        {
            name: 'Nilai',
            data: [4, 3, 7, 6, 5, 5, 6, 10, 9, 5, 3, 2],
            color: '#830000',
        },
    ],
});

$('#export-soakhir.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-soakhir').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        soakhirChart.update({
            title: {
                text: `Saldo Akhir Piutang`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        soakhirChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        soakhirChart.print()
    } else if(jenis == 'Download PNG image') {
        soakhirChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Saldo Akhir Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        soakhirChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Saldo Akhir Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        soakhirChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Saldo Akhir Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        soakhirChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Saldo Akhir Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        soakhirChart.viewData()
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

var trendChart = Highcharts.chart('trend-ccr', {
    chart: {
        type: 'spline',
        height: 230,
        width: 550
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
    },
    legend:{ 
        enabled: false 
    },
    credits: { enabled: false },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
    },
    yAxis: {
         title: {
            text: ''
        }
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            marker:{
                enabled:false
            }
        }
    },
    series: [
        {
            name: 'Tren',
            data: [20, 18, 16, 14, 12, 10, 25, 23, 21, 18, 16, 14],
            color: '#EEBE00'
        },
    ],
});

$('#export-trend.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-trend').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        trendChart.update({
            title: {
                text: `Trend CCR`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        trendChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        trendChart.print()
    } else if(jenis == 'Download PNG image') {
        trendChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Trend CCR`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        trendChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Trend CCR`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        trendChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Trend CCR`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        trendChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Trend CCR`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        trendChart.viewData()
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
</script>
{{-- DEKSTOP --}}

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-8 pl-12">
            <div class="row">
                <div id="back-div" class="col-1 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11">
                    <h2 class="title-dash" id="title-dash">CCR YPT</h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                {{-- <div class="col-3 pr-0 message-div">
                    <img alt="message-icon" class="icon-message" src="{{ asset('dash-asset/dash-tarbak/icon/message.svg') }}">
                </div> --}}
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-tarbak/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-ccr" class="select-text">September 2021</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-tarbak/icon/drop-arrow.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="filter-box" class="filter-box border-r-0 hidden">
            <div class="row justify-content-end">
                <div class="col-7 pt-8 pr-0">
                    <div class="row">
                        <div class="col-4 pr-0">
                            <div id="kurang-tahun" class="glyph-icon simple-icon-arrow-left filter-icon cursor-pointer"></div>
                        </div>
                        <div class="col-4 -mt-5 pl-0 pr-0" id="year-filter">{{ date('Y') }}</div>
                        <div class="col-4 pl-0">
                            <div id="tambah-tahun" class="glyph-icon simple-icon-arrow-right filter-icon cursor-pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-5 list-filter-1" id="list-filter-1">
                    <ul>
                        <li class="selected">Periode</li>
                    </ul>
                </div>
                <div class="col-7 mt-4 mb-6">
                    <div class="row list-filter-2" id="list-filter-2">
                        <div class="col-5 py-3 cursor-pointer list" data-bulan="01">
                            Januari
                        </div>
                        <div class="col-5 ml-8 py-3 cursor-pointer list" data-bulan="02">
                            Februari
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="03">
                            Maret
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="04">
                            April
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="05">
                            Mei
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="06">
                            Juni
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="07">
                            Juli
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="08">
                            Agustus
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="09">
                            September
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="10">
                            Oktober
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-5 mt-8 py-3 cursor-pointer list" data-bulan="11">
                            November
                        </div>
                        <div class="col-5 mt-8 ml-8 py-3 cursor-pointer list" data-bulan="12">
                            Desember
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END HEADER --}}

{{-- CONTENT MAIN --}}
<section id="main-dash" class="mt-20 pb-24">
    {{-- ROW 1 --}}
    <div id="dekstop-1" class="row dekstop">
        <div class="col-3 pl-12 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">CCR Keseluruhan</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-all" class="main-nominal">0%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-all">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right" id="ccr-all-ar">0 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td>
                                    <td class="text-bold text-right" id="ccr-all-inflow">0 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">CCR Tahun Lalu</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-prev" class="main-nominal">0%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-prev">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right" id="ccr-prev-ar">0 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td> 
                                    <td class="text-bold text-right" id="ccr-prev-inflow">0 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-7">
                        <h4 class="header-card" id="judul-ccr-now1"></h4>
                    </div>
                    <div class="col-5">
                        <h4 class="header-card grey-text" id="judul-ccr-now2"></h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-now" class="main-nominal">0%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-now">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right" id="ccr-now-ar">0 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td>
                                    <td class="text-bold text-right" id="ccr-now-inflow">0 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card" id="judul-ccr-month"></h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="ccr-month" class="main-nominal">0%</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-py-2" id="table-ccr-month">
                            <tbody>
                                <tr>
                                    <td class="pl-0">AR</td>
                                    <td class="text-bold text-right" id="ccr-month-ar">0 M</td>
                                </tr>
                                <tr>
                                    <td class="pl-0">Inflow</td>
                                    <td class="text-bold text-right" id="ccr-month-inflow">0 M</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 1 --}}

    {{-- ROW 2 --}}
    <div id="dekstop-2" class="row dekstop mt-4">
        <div class="col-6 pl-12 pr-0">
            <div class="row">
                <div class="col-12">
                    <div class="card card-dash border-r-0" id="dash-trend">
                        <div class="row header-div" id="card-trend">
                            <div class="col-9">
                                <h4 class="header-card">Trend CCR</h4>
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
                        <div id="trend-ccr"></div>
                    </div>
                </div>
                <div class="col-6 pr-0 mt-4">
                    <div class="card card-dash border-r-0" id="dash-piutang">
                        <div class="row header-div" id="card-piutang">
                            <div class="col-9 pr-0">
                                <h4 class="header-card">Komposisi Piutang</h4>
                            </div>
                            <div class="col-3">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                            <div class="menu-chart-custom hidden" id="export-piutang">
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
                        <div id="komposisi-piutang"></div>
                    </div>
                </div>
                <div class="col-6 pl-1 mt-4">
                    <div class="card card-dash border-r-0" id="dash-soakhir">
                        <div class="row header-div" id="card-soakhir">
                            <div class="col-9">
                                <h4 class="header-card">Saldo Akhir Piutang</h4>
                            </div>
                            <div class="col-3">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                            <div class="menu-chart-custom hidden" id="export-soakhir">
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
                        <div id="saldo-akhir" class="mt-4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0" id="dash-lembaga">
                <div class="row header-div" id="card-lembaga">
                    <div class="col-9">
                        <h4 class="header-card">CCR Lembaga</h4>
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
                <div id="ccr-lembaga" class="mt-4"></div>
                <table class="table table-borderless table-px-0 table-ml-24">
                    <tbody>
                        <tr>
                            <td>
                                <div class="circle-legend bg-green"></div>
                            </td>
                            <td>CCR > 50%</td>
                            <td>
                                <div class="circle-legend bg-red-100"></div>
                            </td>
                            <td>CCR < 50%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash h-498 border-r-0">
                <div class="row" id="filter-checkbox">
                    
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}
</section>
{{-- END CONTENT MAIN --}}

{{-- END DEKSTOP --}}