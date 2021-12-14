<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/ccr.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />
<style>
    html,body{
        overflow: hidden !important;
    }
</style>
<script src="{{ asset('main.js?version=_').time() }}"></script>

<script type="text/javascript">

var $height = $(window).height();
var $tahun = parseInt($('#year-filter').text())
var $filter1 = "Periode";
var $filter2 = getNamaBulan("09");
var $filter_kode_lokasi = "";
var $month = "09";
var $filter1_kode = "PRD";
var $filter_aset = "";
var nilaiAsetChart = null;
var aggAsetChart = null;

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
var scrollfilter = document.querySelector('#div-serap-agg');
var psscrollfilter = new PerfectScrollbar(scrollfilter,{
    suppressScrollX :true
});

var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
$('#select-text-inv').text(`${nama_filter} ${$filter2} ${$tahun}`);

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
    if($full == '2'){
        console.log('this fullscreen mode');
        var height = screen.height;
        heighChart = height;
        if(nilaiAsetChart != null){
            nilaiAsetChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
        if(aggAsetChart != null){
            aggAsetChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
    }else{
        
        console.log('this browser mode');
        var win = $(this); //this = window
        var height = win.height();
        heighChart = (height - 320);
        if(nilaiAsetChart != null){
            nilaiAsetChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
        heighChart = (height - 430);
        if(aggAsetChart != null){
            aggAsetChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
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

    var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
    $('#select-text-inv').text(`${nama_filter} ${$filter2} ${$tahun}`);

});

// AJAX FUNCTION GET DATA

function getDataBox(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-inves-box') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            $('#persen_ytd').text(number_format(data[0].persen_ytd,1)+'%');
            $('#rka_ytd').text(toMilyar(data[0].rka_ytd,1));
            $('#real_ytd').text(toMilyar(data[0].real_ytd,1));

            $('#persen_tahun').text(number_format(data[0].persen_tahun,1)+'%');
            $('#rka_tahun').text(toMilyar(data[0].rka_tahun,1));
            $('#real_tahun').text(toMilyar(data[0].real_tahun,1));

            $('#persen_ach').text(number_format(data[0].persen_ach,1)+'%');
            $('#ach_now').text(toMilyar(data[0].ach_now,1));
            $('#ach_lalu').text(toMilyar(data[0].ach_lalu,1));
        }
    });
}

function getSerapAgg(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-inves-serap-agg') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            $('#table-serap-agg tbody').html('');
            var html = '';
            if(result.data.length > 0){
                for(var i=0; i < result.data.length; i++){
                    var line = result.data[i];
                    // if(line.kode_pp == $filter_kode_pp){
                    //     var select = 'class="selected-row"';
                    //     var display = 'unset';
                    // }else{
                        var select = "";
                        var display = 'none';
                    // }
                    html+=`
                    <tr ${select}>
                        <td ><p class="kode hidden">${line.kode_aset}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display:${display}"></div>
                            <span class="nama-pp">${line.nama_aset}</span></td>
                        <td class='text-right'>${number_format(line.ach,1)}%</td>
                    </tr>`;
                }
            }
            $('#table-serap-agg tbody').html(html);
        }
    });
}

function getNilaiAset(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-inves-nilai-aset') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            nilaiAsetChart = Highcharts.chart('nilai-aset', {
                chart: {
                    type: 'spline',
                    height: ($height - 320)
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
                    categories: result.data.kategori
                },
                yAxis: {
                    title: {
                        text: 'Nilai'
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                tooltip: {
                    formatter: function () {   
                        return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + toMilyar(this.y,2);
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
                                    }).text(toMilyar(this.point.y,2))[0].outerHTML;
                            }
                        },
                        label: {
                            connectorAllowed: true
                        },
                        marker:{
                            enabled:true
                        }
                    }
                },
                series: result.data.series
            });
        }
    });
}

function getAggLembaga(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-inves-agg-lembaga') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            aggAsetChart = Highcharts.chart('agg-aset', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    height: ($height - 430),
                    width: 350
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
                                var y = this.point.percentage;
                                var negative = this.point.negative;
                                var key = this.key;
                                var html = null;

                                if(negative) {
                                    html = `<b>${this.point.name}</b>`;
                                } else {
                                    html = `<b>${this.point.name}</b>`;
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
                                fontSize: '9px'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Jumlah',
                    colorByPoint: true,
                    data: result.data
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
                            html+= '<div class="item td-klik"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol"><svg><circle fill="url(#pattern-1)" stroke="black" stroke-width="1" cx="5" cy="5" r="4"></circle><pattern id="pattern-1" patternUnits="userSpaceOnUse" width="10" height="10"><path d="M 0 10 L 10 0 M -1 1 L 1 -1 M 9 11 L 11 9" stroke="#434348" stroke-width="2"></path></pattern>Sorry, your browser does not support inline SVG.</svg> </div><div class="serieName truncate row" style=""><div class="col-4"> ' + point[j].name.substring(0,10) + ' : </div><div class="col-8 text-right bold" style="color:#830000">'+toMilyar(point[j].y,2)+'</div></div></div>';                  
                        }else{
                            if(color == '#7cb5ec') {
                                point[j].graphic.element.style.fill = '#830000'
                                point[j].connector.element.style.stroke = '#830000'
                                html+= '<div class="item td-klik"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol" style="background-color:#830000"></div><div class="serieName truncate row" style=""><div class="col-4"> ' + point[j].name.substring(0,10) + ' : </div><div class="col-8 text-right bold">'+toMilyar(point[j].y,2)+'</div></div></div>';
                            }else{

                                html+= '<div class="item td-klik"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol" style="background-color:'+color+'"></div><div class="serieName truncate row" style=""><div class="col-4"> ' + point[j].name.substring(0,10) + ' : </div><div class="col-8 text-right bold">'+toMilyar(point[j].y,2)+'</div></div></div>';
                            }
                        }
                    }
                }
                $('.lembaga-legend').html(html);
            });
        }
    });
}

// LEGEND LEMBAGA EVET
$('.lembaga-legend').on('click', 'div.td-klik', function() {
    var table = '.lembaga-legend';
    var tr = $(this).closest('.td-klik')
    var kode = $(this).closest('.td-klik').find('.td-kode').text()
    var tmp = $(this).closest('.td-klik').find('.serieName').text().split(':');
    var lembaga = tmp[0];
    $filter_kode_lokasi = kode;
    if($(tr).hasClass('selected-row')) {
        $filter_kode_lokasi="";
        $(`${table} div.td-klik`).removeClass('selected-row');
        getDataBox({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'aset': $filter_aset,
        });
        getNilaiAset({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'aset': $filter_aset,
        });
        getSerapAgg({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'aset': $filter_aset,
        });
        
        showNotification(`Menampilkan dashboard YPT`);
        return;
    }else{
        $(`${table} div.td-klik`).removeClass('selected-row')
        $(tr).addClass('selected-row')
        getDataBox({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'aset': $filter_aset,
            'kode_lokasi': $filter_kode_lokasi
        });
        getNilaiAset({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'aset': $filter_aset,
            'kode_lokasi': $filter_kode_lokasi
        });
        getSerapAgg({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'aset': $filter_aset,
            'kode_lokasi': $filter_kode_lokasi
        });
        
        showNotification(`Menampilkan dashboard ${lembaga} `);
    }
})

// END LEGEND LEMBAGA EVENT

var timeoutID = null;
// END FUNCTION GET DATA

getDataBox({
  'periode[0]': '=',
  'periode[1]': $month,
  'tahun': $tahun,
  'jenis': $filter1_kode
});
getNilaiAset({
  'periode[0]': '=',
  'periode[1]': $month,
  'tahun': $tahun,
  'jenis': $filter1_kode
});
getAggLembaga({
  'periode[0]': '=',
  'periode[1]': $month,
  'tahun': $tahun,
  'jenis': $filter1_kode
});
getSerapAgg({
  'periode[0]': '=',
  'periode[1]': $month,
  'tahun': $tahun,
  'jenis': $filter1_kode
});

</script>

<script type="text/javascript">
document.addEventListener('fullscreenchange', (event) => {
  if (document.fullscreenElement) {
    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);    
  } else {
    $full = '0';
    nilaiAsetChart.update({
        title: {
            text: ''
        }
    })

    aggAsetChart.update({
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
    $('#list-filter-2').find('.list').each(function() {
        if($filter1_kode == 'PRD'){
            if(parseInt($(this).data('bulan')) == parseInt($month)) {
                $(this).addClass('selected')
            }
        }else{
            if(parseInt($(this).data('bulan')) <= parseInt($month)) {
                $(this).addClass('selected')
            }
        }
    })
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
    var bln = ['01','02','03','04','05','06','07','08','09','10','11','12'];
    for(i=0; i < bln.length; i++){
        if($filter1_kode == 'PRD'){
            if(parseInt(bln[i]) == parseInt($month)){
                var selected = 'selected';
            }else{
                var selected = '';
            }
        }else{
            if(parseInt(bln[i]) <= parseInt($month)){
                var selected = 'selected';
            }else{
                var selected = '';
            }
        }
        html+=`<div class="col-4 py-2 px-3 cursor-pointer list text-center ${selected}" data-bulan="${bln[i]}" data-filter2="${bln[i]}">
            <span class="py-2 px-3 d-block">${getNamaBulan(bln[i])}</span>
        </div>`;
    }
    $('#list-filter-2').append(html)
    var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
    $('#select-text-inv').text(`${nama_filter} ${$filter2} ${$tahun}`)
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

    var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
    $('#select-text-inv').text(`${nama_filter} ${$filter2} ${$tahun}`);
    
    getDataBox({
    'periode[0]': '=',
    'periode[1]': $month,
    'tahun': $tahun,
    'jenis': $filter1_kode
    });
    getNilaiAset({
    'periode[0]': '=',
    'periode[1]': $month,
    'tahun': $tahun,
    'jenis': $filter1_kode
    });
    getAggLembaga({
    'periode[0]': '=',
    'periode[1]': $month,
    'tahun': $tahun,
    'jenis': $filter1_kode
    });
    getSerapAgg({
    'periode[0]': '=',
    'periode[1]': $month,
    'tahun': $tahun,
    'jenis': $filter1_kode
    });
    showNotification(`Menampilkan dashboard ${nama_filter} ${$filter2} ${$tahun}`);
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

var colors = ['#EEBE00', '#830000'];

$('#export-nilai-aset.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-nilai-aset').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        nilaiAsetChart.update({
            title: {
                text: `Nilai Aset Lembaga 5 Tahun`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        nilaiAsetChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        nilaiAsetChart.print()
    } else if(jenis == 'Download PNG image') {
        nilaiAsetChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Nilai Aset Lembaga 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        nilaiAsetChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Nilai Aset Lembaga 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        nilaiAsetChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Nilai Aset Lembaga 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        nilaiAsetChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Nilai Aset Lembaga 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        nilaiAsetChart.viewData()
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

$('#export-agg-aset.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-agg-aset').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        
        $full = '2';
        aggAsetChart.update({
            title: {
                text: `Anggaran Tahun Lembaga`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        aggAsetChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        aggAsetChart.print()
    } else if(jenis == 'Download PNG image') {
        aggAsetChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Anggaran Tahun Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        aggAsetChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Anggaran Tahun Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        aggAsetChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Anggaran Tahun Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        aggAsetChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Anggaran Tahun Lembaga`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        aggAsetChart.viewData()
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

// TABLE TOP EVET
$('#table-serap-agg tbody').on('click', 'tr td', function() {
    var table = $(this).parents('table').attr('id')
    var tr = $(this).parent()
    var icon = $(this).closest('tr').find('td:first').find('.check-row')
    var kode = $(this).closest('tr').find('td:first').find('.kode').text()
    var check = $(tr).attr('class')
    var pp = $(this).closest('tr').find('td:first').find('.nama-pp').text()
    $filter_kode_pp = $(this).closest('tr').find('td:first').find('.kode').text()
    if(check == 'selected-row') {
        return;
    }

    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()

    $(tr).addClass('selected-row')
    $(icon).show()
    setTimeout(function() {
        
    }, 200)
    $('#pp-title').text(pp)
    $('#bidang-title').text('')
    showNotification(`Menampilkan dashboard ${pp}`);
})

$('#table-serap-agg tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    $filter_kode_pp="";
    var bidang = ($('#kode_bidang option:selected').text() != "Semua Bidang" ? $('#kode_bidang option:selected').text() : "");
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    $('#pp-title').text('Telkom School')
    $('#bidang-title').text(bidang)
    
    showNotification(`Menampilkan dashboard YPT`);
    
})
// END TABLE TOP EVENT
</script>
{{-- DEKSTOP --}}

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-9 pl-12 pr-0">
            <div class="row">
                <div id="back-div" class="col-1 pr-0 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11 pr-0">
                    <h2 class="title-dash" id="title-dash">Investasi</h2>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="row">
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-inv" class="select-text">Bulan September {{ date('Y') }}</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
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
                        <li class="py-2" data-filter1="YTM">Year To Month</li>
                        <li class="selected py-2" data-filter1="PRD">Bulan</li>
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
        
        <div class="col-6 col-grid">
            <div class="row mb-1">
                <div class="col-6 pl-12 pr-0">
                    <div class="card card-dash border-r-0" style="">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Realisasi YTD</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <p id="persen_ytd" class="main-nominal">0%</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-py-2" id="table-inves-ytd">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">RKA</td>
                                            <td class="text-bold text-right" id="rka_ytd">0 M</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">Realisasi</td>
                                            <td class="text-bold text-right" id="real_ytd">0 M</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 pl-1 pr-0">
                    <div class="card card-dash border-r-0" style="">
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">Realisasi RKA Tahun</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <p id="persen_tahun" class="main-nominal">0%</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-py-2" id="table-inves-tahun">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">RKA</td>
                                            <td class="text-bold text-right" id="rka_tahun">0 M</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">Realisasi</td> 
                                            <td class="text-bold text-right" id="real_tahun">0 M</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-dash border-r-0" id="dash-nilai-aset" 
                    style="height:calc(100vh - 300px)">
                        <div class="row header-div" id="card-nilai-aset">
                            <div class="col-9">
                                <h4 class="header-card">Nilai Aset Lembaga 5 Tahun</h4>
                            </div>
                            <div class="col-3">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                            <div class="menu-chart-custom hidden" id="export-nilai-aset">
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
                        <div id="nilai-aset"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" style="">
                        <div class="row header-div">
                            <div class="col-7">
                                <h4 class="header-card" id="judul-ccr-now1">Pertumbuhan YoY</h4>
                            </div>
                            <div class="col-5">
                                <h4 class="header-card grey-text text-right mr-2" id="judul-ccr-now2"></h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <p id="persen_ach" class="main-nominal">0%</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-py-2" id="table-inves-ach">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">Real. 2021</td>
                                            <td class="text-bold text-right" id="ach_now">0 M</td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0">Real. 2020</td>
                                            <td class="text-bold text-right" id="ach_lalu">0 M</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-agg-aset" 
                    style="height:calc(100vh - 300px)">
                        <div class="row header-div" id="card-agg-aset">
                            <div class="col-9">
                                <h4 class="header-card">Anggaran Tahun Lembaga</h4>
                            </div>
                            <div class="col-3">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                            <div class="menu-chart-custom hidden" id="export-agg-aset">
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
                        <div id="agg-aset"></div>
                        <div class="lembaga-legend"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-serap" style="height:calc(100vh - 147px);">
                        <div class="row header-div px-1" id="card-serap">
                            <div class="col-12">
                                <h4 class="header-card">Penyerapan Anggaran Aset</h4>
                            </div>
                        </div>
                        <div class="table-responsive mt-2" id="div-serap-agg" style="height:calc(100vh - 180px);position:relative">
                            <style>
                                #table-serap-agg th
                                {
                                    padding: 2px !important;
                                    color: #d7d7d7;
                                    font-weight:100;
                                }
                                #table-serap-agg td
                                {
                                    padding: 2px !important;
                                    font-weight:100;
                                }
                            </style>
                            <table class="table table-borderless" id="table-serap-agg" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:65%">Aset</th>
                                        <th class="text-center" style="width:35%">Ach</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 1 --}}
</section>
{{-- END CONTENT MAIN --}}

{{-- END DEKSTOP --}}