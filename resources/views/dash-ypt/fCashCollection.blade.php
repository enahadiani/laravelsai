<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/ccr.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />
<style>
    body{
        overflow: hidden !important;
    }
</style>
<script src="{{ asset('main.js?version=_').time() }}"></script>

<script type="text/javascript">

var $height = $(window).height();
var $tahun = parseInt($('#year-filter').text())
var $filter1 = "Periode";
var $filter2 = getNamaBulan("09");
var $filter_lokasi = "";
var $month = "09";
var $filter1_kode = "PRD";
var $filter_kode_pp = "";
var $filter_kode_bidang = "";
// var $bln_rev_rentang = "Jan-"+bulanSingkat($tahun+''+(parseInt($month)-1));
var $bln_rev_rentang = "YTM";
var $bln_singkat = bulanSingkat($tahun+''+$month);
var trendChart = null;
var soakhirChart = null;

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
var scrollfilter = document.querySelector('#div-top-ccr');
var psscrollfilter = new PerfectScrollbar(scrollfilter,{
    suppressScrollX :true
});

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
    var win = $(this); //this = window
    var height = win.height();
    heighChart = (height - 200)/2;
    if(soakhirChart != null){
        soakhirChart.update({
            chart: {
                height: heighChart,
            }
        })
    }
    if(trendChart != null){
        trendChart.update({
            chart: {
                height: heighChart,
            }
        })
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

// AJAX FUNCTION GET DATA
(function () {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-bidang') }}",
        dataType: 'json',
        async: true,
        success:function(result) {
            var select = $('#kode_bidang').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            control.addOption([{text:'Semua Bidang', value:''}]);
            if(result.status){
                if(typeof result.data !== 'undefined' && result.data.length>0){
                    for(i=0;i<result.data.length;i++){
                        control.addOption([{text:result.data[i].nama, value:result.data[i].kode_bidang}]);
                    }
                }
            }
            control.setValue('');
        }
    });
})();

function getDataBox(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-box') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            
            $('#ccr-all').text(`${number_format(data.ccr_total.persentase,2)}%`)
            $('#ccr-prev').text(`${number_format(data.ccr_tahun_lalu.persentase,2)}%`)
            $('#ccr-now').text(`${number_format(data.ccr_tahun_ini.persentase,2)}%`)

            $('#ccr-all-ar').text(`${toMilyar(data.ccr_total.ar,2)}`)
            $('#ccr-prev-ar').text(`${toMilyar(data.ccr_tahun_lalu.ar,2)}`)
            $('#ccr-now-ar').text(`${toMilyar(data.ccr_tahun_ini.ar,2)}`)

            $('#ccr-all-inflow').text(`${toMilyar(data.ccr_total.inflow,2)}`)
            $('#ccr-prev-inflow').text(`${toMilyar(data.ccr_tahun_lalu.inflow,2)}`)
            $('#ccr-now-inflow').text(`${toMilyar(data.ccr_tahun_ini.inflow,2)}`)
        }
    });
}

function getTopCCR(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-top') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            $('#table-top-ccr tbody').html('');
            var html = '';
            if(result.data.length > 0){
                for(var i=0; i < result.data.length; i++){
                    var line = result.data[i];
                    if(line.kode_pp == $filter_kode_pp){
                        var select = 'class="selected-row"';
                        var display = 'unset';
                    }else{
                        var select = "";
                        var display = 'none';
                    }
                    html+=`
                    <tr ${select}>
                        <td><p class="kode hidden">${line.kode_pp}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display:${display}"></div>
                            <span class="nama-pp">${line.nama}</span></td>
                        <td class='text-right'>${number_format(line.ccr_berjalan,2)}%</td>
                    </tr>`;
                }
            }
            $('#table-top-ccr tbody').html(html);
        }
    });
}

function getTrendCCR(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-trend') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            trendChart = Highcharts.chart('trend-ccr', {
                chart: {
                    type: 'spline',
                    height: ($height - 200)/2
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
                    categories: result.data.kategori
                },
                yAxis: {
                    title: {
                        text: 'Persentase'
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                tooltip: {
                    formatter: function () {   
                        return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + number_format(this.y,2);
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
                series: result.data.series
            });
        }
    });
}


function getTrendSaldo(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-trend-saldo') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            soakhirChart = Highcharts.chart('saldo-akhir', {
                chart: {
                    type: 'spline',
                    height: ($height - 200)/2
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
                        label: {
                            connectorAllowed: false
                        },
                        marker:{
                            enabled:false
                        }
                    }
                },
                series: result.data.series
            });
        }
    });
}

var timeoutID = null;
// END FUNCTION GET DATA

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

    soakhirChart.update({
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
    
    // $bln_rev_rentang = "Jan-"+bulanSingkat($tahun+''+(parseInt($month)-1));
    $bln_singkat = bulanSingkat($tahun+''+$month);
    $('#judul-ccr-now1').text(`CCR ${$tahun}`)
    // $('#judul-ccr-now2').text(`${$bln_rev_rentang}`)
    $('#judul-ccr-month').text(`CCR ${$bln_singkat}`)
    getDataBox({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_pp": $filter_kode_pp,
        "kode_bidang": $filter_kode_bidang
    });
    var sort = ( $('#sort-top').hasClass('sort-asc') ? 'asc' : 'desc'); 
    getTopCCR({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "sort":sort,
        "kode_bidang": $filter_kode_bidang
    });
    getTrendCCR({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_pp": $filter_kode_pp,
        "kode_bidang": $filter_kode_bidang
    });
    getTrendSaldo({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_pp": $filter_kode_pp,
        "kode_bidang": $filter_kode_bidang
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

$('#kode_bidang').change(function(){
    $filter_kode_bidang = $(this).val();
    var bidang = ($('#kode_bidang option:selected').text() != "Semua Bidang" ? $('#kode_bidang option:selected').text() : "")
    $('#bidang-title').text(bidang);
    $('#pp-title').text('Telkom School');
    $filter_kode_pp = "";
    timeoutID = null;
    timeoutID = setTimeout(getDataBox.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;
    timeoutID = setTimeout(getTopCCR.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "sort": "asc",
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;
    timeoutID = setTimeout(getTrendCCR.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;
    timeoutID = setTimeout(getTrendSaldo.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    if(bidang != ""){
        showNotification(`Menampilkan dashboard `+bidang);
    }
});

var colors = ['#EEBE00', '#830000'];

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

$('#sort-top').click(function(){
    if($(this).hasClass('sort-asc')){
        $(this).removeClass('sort-asc')
        $(this).removeClass('red-text')
        $(this).addClass('green-text')
        $(this).addClass('sort-desc')
        $(this).html(`<i class="iconsminds-sync" style="font-size: 16px !important;display: inline-block;transform: rotate(90deg);"></i> Tertinggi`);
        var sort = 'desc'; 
        getTopCCR({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "sort":sort,
            "kode_bidang":$filter_kode_bidang
        });
        
    }else{
        
        $(this).removeClass('sort-desc')
        $(this).addClass('sort-asc')
        $(this).removeClass('green-text')
        $(this).addClass('red-text')
        $(this).html(`<i class="iconsminds-sync" style="font-size: 16px !important;display: inline-block;transform: rotate(90deg);"></i> Terendah`);
        var sort = 'asc'; 
        getTopCCR({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "sort":sort,
            "kode_bidang":$filter_kode_bidang
        });
    }
});

// TABLE TOP EVET
$('#table-top-ccr tbody').on('click', 'tr td', function() {
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
        getDataBox({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_pp": $filter_kode_pp,
            "kode_bidang": $filter_kode_bidang
        });
        getTrendCCR({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_pp": $filter_kode_pp,
            "kode_bidang": $filter_kode_bidang
        });
        getTrendSaldo({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_pp": $filter_kode_pp,
            "kode_bidang": $filter_kode_bidang
        });
    }, 200)
    $('#pp-title').text(pp)
    $('#bidang-title').text('')
    showNotification(`Menampilkan dashboard ${pp}`);
})

$('#table-top-ccr tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    $filter_kode_pp="";
    var bidang = ($('#kode_bidang option:selected').text() != "Semua Bidang" ? $('#kode_bidang option:selected').text() : "");
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    $('#pp-title').text('Telkom School')
    $('#bidang-title').text(bidang)
    getDataBox({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_bidang": $filter_kode_bidang
    });
    var sort = ( $('#sort-top').hasClass('sort-asc') ? 'asc' : 'desc'); 
    getTopCCR({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "sort":sort,
        "kode_bidang": $filter_kode_bidang
    });
    getTrendCCR({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_bidang": $filter_kode_bidang
    });
    getTrendSaldo({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_bidang": $filter_kode_bidang
    });
    showNotification(`Menampilkan dashboard Telkom School`);
    
})
// END TABLE TOP EVENT
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
                    <h2 class="title-dash" id="title-dash">CCR <span id="pp-title">Telkom School</span> <span id="bidang-title"></span></h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                {{-- <div class="col-3 pr-0 message-div">
                    <img alt="message-icon" class="icon-message" src="{{ asset('dash-asset/dash-ypt/icon/message.svg') }}">
                </div> --}}
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-ccr" class="select-text">September 2021</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
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
        <div class="col-3 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-dash border-r-0" style="height:calc((100vh - 160px)/3);">
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
            </div>
            <div class="row mb-1">
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-dash border-r-0" style="height:calc((100vh - 160px)/3);">
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
            </div>
            <div class="row">
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-dash border-r-0" style="height:calc((100vh - 160px)/3);">
                        <div class="row header-div">
                            <div class="col-7">
                                <h4 class="header-card" id="judul-ccr-now1"></h4>
                            </div>
                            <div class="col-5">
                                <h4 class="header-card grey-text text-right mr-2" id="judul-ccr-now2"></h4>
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
            </div>
        </div>
        <div class="col-6 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-trend" 
                    style="height:calc((100vh - 155px)/2)">
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
            </div>
            <div class="row">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-soakhir" 
                    style="height:calc((100vh - 155px)/2)">
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
                        <div id="saldo-akhir"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-top" style="height:calc(100vh - 150px);">
                        <div class="row header-div px-1" id="card-top">
                            <div class="col-5">
                                <h4 class="header-card">Top CCR</h4>
                            </div>
                            <div class="col-7 text-right">
                                <a id="sort-top" href='#' class="red-text sort-asc" style="font-size: 16px !important;"><i class="iconsminds-sync" style="font-size: 16px !important;display: inline-block;transform: rotate(90deg);"></i> Terendah</a>
                            </div>
                            <div class="col-12 my-2">
                                <select name="kode_bidang" id="kode_bidang" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive mt-2" id="div-top-ccr" style="height:calc(100vh - 180px);position:relative">
                            <style>
                                #table-top-ccr th
                                {
                                    padding: 2px !important;
                                    color: #d7d7d7;
                                    font-weight:100;
                                }
                                #table-top-ccr td
                                {
                                    padding: 2px !important;
                                    font-weight:100;
                                }
                            </style>
                            <table class="table table-borderless" id="table-top-ccr" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Lembaga</th>
                                        <th class="text-right">CCR</th>
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