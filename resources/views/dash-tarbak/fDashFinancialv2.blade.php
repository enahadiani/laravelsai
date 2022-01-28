<link rel="stylesheet" href="{{ asset('dash-asset/dash-tarbak/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-tarbak/fp2.dekstop.css?version=_').time() }}" />
<script src="{{ asset('main.js?version=_').time() }}"></script>
<script src="{{ asset('dash-asset/dash-tarbak/dragging.js') }}"></script>

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
var pdptChart = null;
var bebanChart = null;
var shuChart = null;
var orChart = null;
var lrChart = null;
var $render = 0;

if($filter1 == 'Periode') {
    $('#list-filter-2').find('.list').each(function() {
        if($(this).data('bulan').toString() == $month) {
            $(this).addClass('selected')
            $month = $(this).data('bulan').toString();
            return false;
        }
    });
}

$('#year-filter').text($tahun)
var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
$('#select-text-fp').text(`${nama_filter} ${$filter2} ${$tahun}`)

// RUN IF FIRST RENDER
new PerfectScrollbar('#scrollTable');
var $height = $(window).height();
// SET STYLES CARD
// $('.card-r-2').css('height', `${$height - 300}px`);
// SET STYLES CARD

// DATA BOX
(function(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/v2/data-fp-box') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: false,
        success:function(result) {    
            // PENDAPATAN
            var iconPdptYoy = '';
            var iconPdptAch = '';
            var nilaiPdpt = 0;
            var nilaiYoyPdpt = 0;
            var nilaiAchPdpt = 0;

            if($filter1_kode == 'PRD'){
                $('.yoy-label').html('MoM Growth')
            }else{
                $('.yoy-label').html('YoY Growth')
            }
            var pdpt = result.data.data_pdpt;
            if(pdpt.n4.toString().length <= 9) {
                nilaiPdpt = toJuta(pdpt.n4,2)
            } else {
                nilaiPdpt = toMilyar(pdpt.n4,2)
            }

            if(pdpt.n5.toString().length <= 9) {
                nilaiYoyPdpt = toJuta(pdpt.n5,2)
            } else {
                nilaiYoyPdpt = toMilyar(pdpt.n5,2)
            }

            if(pdpt.n2.toString().length <= 9) {
                nilaiAchPdpt = toJuta(pdpt.n2,2)
            } else {
                nilaiAchPdpt = toMilyar(pdpt.n2,2)
            }

            if(pdpt.yoy < 0) {
                $('#pdpt-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#pdpt-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            if(pdpt.ach < 100) {
                $('#pdpt-ach-percentage').removeClass('green-text').addClass('red-text')
                iconPdptAch = '&nbsp;'
            } else {
                $('#pdpt-ach-percentage').removeClass('red-text').addClass('green-text')
                iconPdptAch = '&nbsp;'
            }

            $('#pdpt-box').data('grafik', pdpt.kode_grafik)
            $('#pendapatan-value').text(nilaiPdpt)
            $('#pendapatan-yoy').text(nilaiYoyPdpt)
            $('#pendapatan-ach').text(nilaiAchPdpt)
            $('#pdpt-yoy-percentage').text(`${number_format(pdpt.yoy,2)}%`)
            $('#pdpt-ach-percentage').text(`${number_format(pdpt.ach,2)}%`)
            $('#pdpt-yoy-icon').html(iconPdptYoy)
            $('#pdpt-ach-icon').html(iconPdptAch)
            // END PENDAPATAN

            // BEBAN
            var iconBebanYoy = '';
            var iconBebanAch = '';
            var nilaiBeban = 0;
            var nilaiYoyBeban = 0;
            var nilaiAchBeban = 0;
            var beban = result.data.data_beban;
            if(beban.n4.toString().length <= 9) {
                nilaiBeban = toJuta(beban.n4,2)
            } else {
                nilaiBeban = toMilyar(beban.n4,2)
            }

            if(beban.n5.toString().length <= 9) {
                nilaiYoyBeban = toJuta(beban.n5,2)
            } else {
                nilaiYoyBeban = toMilyar(beban.n5,2)
            }

            if(beban.n2.toString().length <= 9) {
                nilaiAchBeban = toJuta(beban.n2,2)
            } else {
                nilaiAchBeban = toMilyar(beban.n2,2)
            }

            if(beban.yoy < 0) {
                $('#beban-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconBebanYoy = '<img alt="down-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            } else {
                $('#beban-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconBebanYoy = '<img alt="up-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            }

            if(beban.ach > 100) {
                $('#beban-ach-percentage').removeClass('green-text').addClass('red-text')
                iconBebanAch = '&nbsp;'
            } else {
                $('#beban-ach-percentage').removeClass('red-text').addClass('green-text')
                iconBebanAch = '&nbsp;'
            }

            $('#beban-box').data('grafik', beban.kode_grafik)
            $('#beban-value').text(nilaiBeban)
            $('#beban-yoy').text(nilaiYoyBeban)
            $('#beban-ach').text(nilaiAchBeban)
            $('#beban-yoy-percentage').text(`${number_format(beban.yoy,2)}%`)
            $('#beban-ach-percentage').text(`${number_format(beban.ach,2)}%`)
            $('#beban-yoy-icon').html(iconBebanYoy)
            $('#beban-ach-icon').html(iconBebanAch)
            // END BEBAN

            // SHU
            var iconShuYoy = '';
            var iconShuAch = '';
            var nilaiShu = 0;
            var nilaiYoyShu = 0;
            var nilaiAchShu = 0;
            var shu = result.data.data_shu;
            if(shu.n4.toString().length <= 9) {
                nilaiShu = toJuta(shu.n4,2)
            } else {
                nilaiShu = toMilyar(shu.n4,2)
            }

            if(shu.n5.toString().length <= 9) {
                nilaiYoyShu = toJuta(shu.n5,2)
            } else {
                nilaiYoyShu = toMilyar(shu.n5,2)
            }

            if(shu.n2.toString().length <= 9) {
                nilaiAchShu = toJuta(shu.n2,2)
            } else {
                nilaiAchShu = toMilyar(shu.n2,2)
            }

            if(shu.yoy < 0) {
                $('#shu-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconShuYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#shu-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconShuYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            if(shu.ach < 100) {
                $('#shu-ach-percentage').removeClass('green-text').addClass('red-text')
                iconShuAch = '&nbsp;'
            } else {
                $('#shu-ach-percentage').removeClass('red-text').addClass('green-text')
                iconShuAch = '&nbsp;'
            }

            $('#shu-box').data('grafik', shu.kode_grafik)
            $('#shu-value').text(nilaiShu)
            $('#shu-yoy').text(nilaiYoyShu)
            $('#shu-ach').text(nilaiAchShu)
            $('#shu-yoy-percentage').text(`${number_format(shu.yoy,2)}%`)
            $('#shu-ach-percentage').text(`${number_format(shu.ach,2)}%`)
            $('#shu-yoy-icon').html(iconShuYoy)
            $('#shu-ach-icon').html(iconShuAch)
            // END SHU

            // OR
            var iconOrYoy = '';
            var iconOrAch = '';
            var nilaiOr = 0;
            var nilaiYoyOr = 0;
            var nilaiAchOr = 0;
            var or = result.data.data_or;

            if(or.yoy < 0) {
                $('#or-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconOrYoy = '<img alt="down-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            } else {
                $('#or-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconOrYoy = '<img alt="down-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            }

            if(or.ach > 100) {
                $('#or-ach-percentage').removeClass('green-text').addClass('red-text')
                iconOrAch = '&nbsp;'
            } else {
                $('#or-ach-percentage').removeClass('red-text').addClass('green-text')
                iconOrAch = '&nbsp;'
            }

            $('#or-box').data('grafik', or.kode_grafik)
            $('#or-value').text(`${number_format(or.n4,2)}%`)
            $('#or-yoy').text(`${number_format(or.n5,2)}%`)
            $('#or-ach').text(`${number_format(or.n2,2)}%`)
            $('#or-yoy-percentage').text(`${number_format(or.yoy,2)}%`)
            $('#or-ach-percentage').text(`${number_format(or.ach,2)}%`)
            $('#or-yoy-icon').html(iconOrYoy)
            $('#or-ach-icon').html(iconOrAch)
            // END OR
        }
    });
})();
// END DATA BOX

// CHART LABA RUGI
(function(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-lr') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: false,
        success:function(result) {
            var data = result.data;
            lrChart = Highcharts.chart('lr-chart', {
                chart: {
                    type: 'column',
                    height: ($(window).height() - 320)
                },
                credits:{
                    enabled:false
                },
                exporting:{ 
                    enabled: false,
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: data.kategori, 
                },
                yAxis: {
                    title: '',
                    labels: {
                        formatter: function() {
                            return singkatNilai(this.value);
                        }
                    }
                },
                tooltip: {
                    formatter: function () {   
                        var tmp = this.x.split("|");   
                        return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + sepNum(this.y);
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
                    }
                },
                series: [
                    {
                        name: 'Pendapatan',
                        color: '#b91c1c',
                        data: data.data_pdpt
                    },
                    {
                        name: 'Beban',
                        color: '#064E3B',
                        data: data.data_beban
                    },
                    {
                        name: 'SHU',
                        color: '#FBBF24',
                        data: data.data_shu
                    }
                ]
            });
        }
    });
})();
// END CHART LABA RUGI

// TABEL PERFORMASI LEMBAGA
(function(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-pl') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: false,
        success:function(result) {
            var data = result.data;
            if($filter1_kode == 'PRD'){
                $('.yoy2-label').html('MoM')
            }else{
                $('.yoy2-label').html('YoY')
            }
            if(data.length > 0) {
                $('#table-lembaga tbody').empty()
                var html = "";
                for(var i=0;i<data.length;i++) {
                    var row = data[i];
                    var classTd1 = "";
                    var classTd2 = "";
                    var classTd3 = "";
                    var classTd4 = "";
                    var classTd5 = "";
                    var classTd6 = "";
                    var classTd7 = "";
                    var classTd8 = "";
                    if(row.pdpt_ach > 100) {
                        classTd1 = "green-text"
                    }else{
                        classTd1 = "red-text"
                    }
                    if(row.pdpt_yoy < 0) {
                        classTd2 = "red-text"
                    }else{
                        classTd2 = "green-text"
                    }
                    if(row.beban_ach < 100) {
                        classTd3 = "green-text"
                    }else{
                        classTd3 = "red-text"
                    }
                    if(row.beban_yoy > 0) {
                        classTd4 = "red-text"
                    }else{
                        classTd4 = "green-text"
                    }
                    if(row.shu_ach > 100) {
                        classTd5 = "green-text"
                    }else{
                        classTd5 = "red-text"
                    }
                    if(row.shu_yoy < 0) {
                        classTd6 = "red-text"
                    }else{
                        classTd6 = "green-text"
                    }
                    if(row.or_ach > 100) {
                        classTd7 = "red-text"
                    }else{
                        classTd7 = "green-text"
                    }
                    if(row.or_yoy > 0) {
                        classTd8 = "red-text"
                    }else{
                        classTd8 = "green-text"
                    }

                    html += `<tr>
                        <td>
                            <p class="kode hidden">${row.kode_lokasi}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                            <span class="name-lembaga">${row.nama}</span>
                        </td>
                        <td class="${classTd1}">${number_format(row.pdpt_ach,2)}%</td>
                        <td class="${classTd2}">${number_format(row.pdpt_yoy,2)}%</td>
                        <td class="${classTd3}">${number_format(row.beban_ach,2)}%</td>
                        <td class="${classTd4}">${number_format(row.beban_yoy,2)}%</td>
                        <td class="${classTd5}">${number_format(row.shu_ach,2)}%</td>
                        <td class="${classTd6}">${number_format(row.shu_yoy,2)}%</td>
                        <td class="${classTd7}">${number_format(row.or_ach,2)}%</td>
                        <td class="${classTd8}">${number_format(row.or_yoy,2)}%</td>
                    </tr>`;
                }
                $('#table-lembaga tbody').append(html)
            }
        }
    });
})();
// END TABLE PERFORMANSI LEMBAGA
// END RUN IF FIRST RENDER

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

$(window).on('resize', function(){
    var win = $(this); //this = window
    var $height = win.height();
    var heighChart = 0;
    // $('.card-r-2').css('height', `${$height - 290}px`);

    heighChart = $height - 320;

    lrChart.update({
        chart: {
            height: heighChart,
        }
    })
});

$(window).click(function() {
    $('#filter-box').addClass('hidden')
    $('.menu-chart-custom').addClass('hidden');
});
</script>

<script type="text/javascript">
function setZero() {
    $('#pdpt-yoy-percentage').empty()
    $('#pendapatan-value').text(0)
    $('#pendapatan-yoy').text(0)
    var iconPdpt = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
    $('#pdpt-yoy-percentage').append(`0% ${iconPdpt}`)

    $('#circle-pdpt').circleProgress({
        value: 0,
        size: 80,
        reverse: false,
        thickness: 8,
        fill: {
            color: ["#FFBA33"]
        }
    });

    $('#circle-pdpt').find('strong').html(`
        <p class="my-0 text-circle">Ach.</p>
        <p class="my-0 text-circle">0%</p>
    `)

    $('#beban-yoy-percentage').empty();
    $('#beban-value').text(0)
    $('#beban-yoy').text(0)
    var iconBeban = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
    $('#beban-yoy-percentage').append(`0% ${iconBeban}`)

    $('#circle-beban').circleProgress({
        value: 0,
        size: 80,
        reverse: false,
        thickness: 8,
        fill: {
            color: ["#EE0000"]
        }
    });

    $('#circle-beban').find('strong').html(`
        <p class="my-0 text-circle">Ach.</p>
        <p class="my-0 text-circle">0%</p>
    `)

    $('#shu-yoy-percentage').empty()
    $('#shu-value').text(0)
    $('#shu-yoy').text(0)
    var iconShu = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>';
    $('#shu-yoy-percentage').append(`0% ${iconShu}`)

    $('#circle-shu').circleProgress({
        value: 0,
        size: 80,
        reverse: false,
        thickness: 8,
        fill: {
            color: ["#EE0000"]
        }
    });

    $('#circle-shu').find('strong').html(`
        <p class="my-0 text-circle">Ach.</p>
        <p class="my-0 text-circle">0%</p>
    `)

    $('#or-yoy-percentage').empty()
    $('#or-value').text(`0%`)
    $('#or-yoy').text(`0%`)
    var iconOr = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
    $('#or-yoy-percentage').append(`0% ${iconOr}`)
    
    $('#circle-or').circleProgress({
        value: 0,
        size: 80,
        reverse: false,
        thickness: 8,
        fill: {
            color: ["#EE0000"]
        }
    });

    $('#circle-or').find('strong').html(`
        <p class="my-0 text-circle">Ach.</p>
        <p class="my-0 text-circle">0%</p>
    `)

    // pdptChart.series[0].update({
    //     data: []
    // }, true) // true untuk redraw

    // bebanChart.series[0].update({
    //     data: []
    // }, true) // true untuk redraw

    // shuChart.series[0].update({
    //     data: []
    // }, true) // true untuk redraw

    lrChart.series[0].update({
        data: [0, 0, 0, 0, 0]
    }, false) // true untuk redraw

    lrChart.series[1].update({
        data: [0, 0, 0, 0, 0]
    }, false) // true untuk redraw

    lrChart.series[2].update({
        data: [0, 0, 0, 0, 0]
    }, false) // true untuk redraw

    // re render chart
    lrChart.redraw()
}

function updateAllChart() {
    updateBox()
    updateChart()
}

function updateChart(table = false) {
    // // PENDAPATAN
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-tarbak-dash/v2/data-fp-pdpt') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode,
    //         "kode_lokasi": $filter_lokasi
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         var data = result.data;
    //         pdptChart.series[0].update({
    //             data: data.anggaran
    //         }, false) // true untuk redraw

    //         pdptChart.series[1].update({
    //             data: data.realisasi
    //         }, false) // true untuk redraw

    //         // re render chart
    //         pdptChart.redraw()
    //     }
    // });
    // // END PENDAPATAN
    // // BEBAN
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-tarbak-dash/v2/data-fp-beban') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode,
    //         "kode_lokasi": $filter_lokasi
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         var data = result.data;
    //         bebanChart.series[0].update({
    //             data: data.anggaran
    //         }, false) // true untuk redraw

    //         bebanChart.series[1].update({
    //             data: data.realisasi
    //         }, false) // true untuk redraw

    //         // re render chart
    //         bebanChart.redraw()
    //     }
    // });
    // // END BEBAN
    // // SHU
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-tarbak-dash/v2/data-fp-shu') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode,
    //         "kode_lokasi": $filter_lokasi
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         var data = result.data;
    //         shuChart.series[0].update({
    //             data: data.anggaran
    //         }, false) // true untuk redraw

    //         shuChart.series[1].update({
    //             data: data.realisasi
    //         }, false) // true untuk redraw

    //         // re render chart
    //         shuChart.redraw()
    //     }
    // });
    // // END SHU
    // // OR
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-tarbak-dash/v2/data-fp-or') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode,
    //         "kode_lokasi": $filter_lokasi
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         var data = result.data;
    //         orChart.series[0].update({
    //             data: data.anggaran
    //         }, false) // true untuk redraw

    //         orChart.series[1].update({
    //             data: data.realisasi
    //         }, false) // true untuk redraw

    //         // re render chart
    //         orChart.redraw()
    //     }
    // });
    // // // END OR
    // LR
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-fp-lr') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_lokasi": $filter_lokasi
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            lrChart.xAxis[0].update({
                categories: data.kategori
            });
            lrChart.series[0].update({
                data: data.data_pdpt
            }, false) // true untuk redraw

            lrChart.series[1].update({
                data: data.data_beban
            }, false) // true untuk redraw

            lrChart.series[2].update({
                data: data.data_shu
            }, false) // true untuk redraw

            // re render chart
            lrChart.redraw()
        }
    });
    // END LR
    if(!table){
        // PL TABLE
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-tarbak-dash/data-fp-pl') }}",
            data: {
                "periode[0]": "=", 
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode
            },
            dataType: 'json',
            async: true,
            success:function(result) {
                if($filter1_kode == 'PRD'){
                    $('.yoy2-label').html('MoM')
                }else{
                    $('.yoy2-label').html('YoY')
                }
                var data = result.data;
                if(data.length > 0) {
                    $('#table-lembaga tbody').empty()
                    var html = "";
                    for(var i=0;i<data.length;i++) {
                        var row = data[i];
                        var classTd1 = "";
                        var classTd2 = "";
                        var classTd3 = "";
                        var classTd4 = "";
                        var classTd5 = "";
                        var classTd6 = "";
                        var classTd7 = "";
                        var classTd8 = "";
                        if(row.pdpt_ach > 100) {
                            classTd1 = "green-text"
                        }else{
                            classTd1 = "red-text"
                        }
                        if(row.pdpt_yoy < 0) {
                            classTd2 = "red-text"
                        }else{
                            classTd2 = "green-text"
                        }
                        if(row.beban_ach < 100) {
                            classTd3 = "green-text"
                        }else{
                            classTd3 = "red-text"
                        }
                        if(row.beban_yoy > 0) {
                            classTd4 = "red-text"
                        }else{
                            classTd4 = "green-text"
                        }
                        if(row.shu_ach > 100) {
                            classTd5 = "green-text"
                        }else{
                            classTd5 = "red-text"
                        }
                        if(row.shu_yoy < 0) {
                            classTd6 = "red-text"
                        }else{
                            classTd6 = "green-text"
                        }
                        if(row.or_ach > 100) {
                            classTd7 = "red-text"
                        }else{
                            classTd7 = "green-text"
                        }
                        if(row.or_yoy > 0) {
                            classTd8 = "red-text"
                        }else{
                            classTd8 = "green-text"
                        }
                        if(row.kode_lokasi == $filter_lokasi){
                            var select = 'class="selected-row"';
                            var display = 'unset';
                        }else{
                            var select = "";
                            var display = 'none';
                        }
                        html += `<tr ${select}>
                            <td>
                                <p class="kode hidden">${row.kode_lokasi}</p>
                                <div class="glyph-icon simple-icon-check check-row" style="display: ${display}"></div>
                                <span class="name-lembaga">${row.nama}</span>
                            </td>
                            <td class="${classTd1}">${number_format(row.pdpt_ach,2)}%</td>
                            <td class="${classTd2}">${number_format(row.pdpt_yoy,2)}%</td>
                            <td class="${classTd3}">${number_format(row.beban_ach,2)}%</td>
                            <td class="${classTd4}">${number_format(row.beban_yoy,2)}%</td>
                            <td class="${classTd5}">${number_format(row.shu_ach,2)}%</td>
                            <td class="${classTd6}">${number_format(row.shu_yoy,2)}%</td>
                            <td class="${classTd7}">${number_format(row.or_ach,2)}%</td>
                            <td class="${classTd8}">${number_format(row.or_yoy,2)}%</td>
                        </tr>`;
                    }
                    $('#table-lembaga tbody').append(html)
                }
            }
        });
        // END PL TABLE
    }
}

function updateBox() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/v2/data-fp-box') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_lokasi": $filter_lokasi
        },
        dataType: 'json',
        async: true,
        success:function(result) {    
            // PENDAPATAN
            var iconPdptYoy = '';
            var iconPdptAch = '';
            var nilaiPdpt = 0;
            var nilaiYoyPdpt = 0;
            var nilaiAchPdpt = 0;
            if($filter1_kode == 'PRD'){
                $('.yoy-label').html('MoM Growth')
            }else{
                $('.yoy-label').html('YoY Growth')
            }
            var pdpt = result.data.data_pdpt;
            if(pdpt.n4.toString().length <= 9) {
                nilaiPdpt = toJuta(pdpt.n4,2)
            } else {
                nilaiPdpt = toMilyar(pdpt.n4,2)
            }

            if(pdpt.n5.toString().length <= 9) {
                nilaiYoyPdpt = toJuta(pdpt.n5,2)
            } else {
                nilaiYoyPdpt = toMilyar(pdpt.n5,2)
            }

            if(pdpt.n2.toString().length <= 9) {
                nilaiAchPdpt = toJuta(pdpt.n2,2)
            } else {
                nilaiAchPdpt = toMilyar(pdpt.n2,2)
            }

            if(pdpt.yoy < 0) {
                $('#pdpt-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#pdpt-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            if(pdpt.ach < 100) {
                $('#pdpt-ach-percentage').removeClass('green-text').addClass('red-text')
                iconPdptAch = '&nbsp;'
            } else {
                $('#pdpt-ach-percentage').removeClass('red-text').addClass('green-text')
                iconPdptAch = '&nbsp;'
            }

            $('#pdpt-box').data('grafik', pdpt.kode_grafik)
            $('#pendapatan-value').text(nilaiPdpt)
            $('#pendapatan-yoy').text(nilaiYoyPdpt)
            $('#pendapatan-ach').text(nilaiAchPdpt)
            $('#pdpt-yoy-percentage').text(`${number_format(pdpt.yoy,2)}%`)
            $('#pdpt-ach-percentage').text(`${number_format(pdpt.ach,2)}%`)
            $('#pdpt-yoy-icon').html(iconPdptYoy)
            $('#pdpt-ach-icon').html(iconPdptAch)
            // END PENDAPATAN

            // BEBAN
            var iconBebanYoy = '';
            var iconBebanAch = '';
            var nilaiBeban = 0;
            var nilaiYoyBeban = 0;
            var nilaiAchBeban = 0;
            var beban = result.data.data_beban;
            if(beban.n4.toString().length <= 9) {
                nilaiBeban = toJuta(beban.n4,2)
            } else {
                nilaiBeban = toMilyar(beban.n4,2)
            }

            if(beban.n5.toString().length <= 9) {
                nilaiYoyBeban = toJuta(beban.n5,2)
            } else {
                nilaiYoyBeban = toMilyar(beban.n5,2)
            }

            if(beban.n2.toString().length <= 9) {
                nilaiAchBeban = toJuta(beban.n2,2)
            } else {
                nilaiAchBeban = toMilyar(beban.n2,2)
            }

            if(beban.yoy < 0) {
                $('#beban-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconBebanYoy = '<img alt="down-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            } else {
                $('#beban-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconBebanYoy = '<img alt="up-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            }

            if(beban.ach > 100) {
                $('#beban-ach-percentage').removeClass('green-text').addClass('red-text')
                iconBebanAch = '&nbsp;'
            } else {
                $('#beban-ach-percentage').removeClass('red-text').addClass('green-text')
                iconBebanAch = '&nbsp;'
            }

            $('#beban-box').data('grafik', beban.kode_grafik)
            $('#beban-value').text(nilaiBeban)
            $('#beban-yoy').text(nilaiYoyBeban)
            $('#beban-ach').text(nilaiAchBeban)
            $('#beban-yoy-percentage').text(`${number_format(beban.yoy,2)}%`)
            $('#beban-ach-percentage').text(`${number_format(beban.ach,2)}%`)
            $('#beban-yoy-icon').html(iconBebanYoy)
            $('#beban-ach-icon').html(iconBebanAch)
            // END BEBAN

            // SHU
            var iconShuYoy = '';
            var iconShuAch = '';
            var nilaiShu = 0;
            var nilaiYoyShu = 0;
            var nilaiAchShu = 0;
            var shu = result.data.data_shu;
            if(shu.n4.toString().length <= 9) {
                nilaiShu = toJuta(shu.n4,2)
            } else {
                nilaiShu = toMilyar(shu.n4,2)
            }

            if(shu.n5.toString().length <= 9) {
                nilaiYoyShu = toJuta(shu.n5,2)
            } else {
                nilaiYoyShu = toMilyar(shu.n5,2)
            }

            if(shu.n2.toString().length <= 9) {
                nilaiAchShu = toJuta(shu.n2,2)
            } else {
                nilaiAchShu = toMilyar(shu.n2,2)
            }

            if(shu.yoy < 0) {
                $('#shu-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconShuYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#shu-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconShuYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            if(shu.ach < 100) {
                $('#shu-ach-percentage').removeClass('green-text').addClass('red-text')
                iconShuAch = '&nbsp;'
            } else {
                $('#shu-ach-percentage').removeClass('red-text').addClass('green-text')
                iconShuAch = '&nbsp;'
            }

            $('#shu-box').data('grafik', shu.kode_grafik)
            $('#shu-value').text(nilaiShu)
            $('#shu-yoy').text(nilaiYoyShu)
            $('#shu-ach').text(nilaiAchShu)
            $('#shu-yoy-percentage').text(`${number_format(shu.yoy,2)}%`)
            $('#shu-ach-percentage').text(`${number_format(shu.ach,2)}%`)
            $('#shu-yoy-icon').html(iconShuYoy)
            $('#shu-ach-icon').html(iconShuAch)
            // END SHU

            // OR
            var iconOrYoy = '';
            var iconOrAch = '';
            var nilaiOr = 0;
            var nilaiYoyOr = 0;
            var nilaiAchOr = 0;
            var or = result.data.data_or;

            if(or.yoy < 0) {
                $('#or-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconOrYoy = '<img alt="down-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">'
            } else {
                $('#or-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconOrYoy = '<img alt="down-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">'
            }

            if(or.ach > 100) {
                $('#or-ach-percentage').removeClass('green-text').addClass('red-text')
                iconOrAch = '&nbsp;'
            } else {
                $('#or-ach-percentage').removeClass('red-text').addClass('green-text')
                iconOrAch = '&nbsp;'
            }

            $('#or-box').data('grafik', or.kode_grafik)
            $('#or-value').text(`${number_format(or.n4,2)}%`)
            $('#or-yoy').text(`${number_format(or.n5,2)}%`)
            $('#or-ach').text(`${number_format(or.n2,2)}%`)
            $('#or-yoy-percentage').text(`${number_format(or.yoy,2)}%`)
            $('#or-ach-percentage').text(`${number_format(or.ach,2)}%`)
            $('#or-yoy-icon').html(iconOrYoy)
            $('#or-ach-icon').html(iconOrAch)
            // END OR
        }
    });
}

function setHeightPage() {
    var check = 0;
    var height = $(window).height();
    $('.chart-card').each(function() {
        if(!$(this).hasClass('hidden')) {
            check = 1;
            return false;
        }
    })
    if(check == 1) {
        // $('#scrollTable').addClass('scrollTable')
        // $('.card-r-2').css('height', `${height - 460}px`);
        if(height <= 667) {
            lrChart.update({
                chart:{
                    height: 180
                }
            })
        } else {
            lrChart.update({
                chart:{
                    height: 220
                }
            })
        }
    } else {
        heighChart = height - 320;
        // $('#scrollTable').removeClass('scrollTable')
        // $('.card-r-2').css('height', `${$height - 300}px`);
        lrChart.update({
            chart:{
                height: heighChart
            }
        })
    }
}
</script>

<script type="text/javascript">
// EVENT CARD DASH
    $('.click-card').click(function(e) {
        if($(e.target).is('img') || e.target.classList.contains('td-show-chart')){
            console.log('disabled detail');
        }else{
            console.log('enabled detail');
            var kode = $(this).data('grafik');
            var id = $(this).attr('id');
    
            if($render == 0) {
                createChartPerform(kode)
                createChartLembaga(kode)
                createChartKelompok(kode)
                // createChartAkun(kode)
            } else {
                // update chart ada bug, data jadi tidak valid. dimatikan sementara
                // updateChartDetail(kode)
                createChartPerform(kode)
                createChartLembaga(kode)
                createChartKelompok(kode)
            }
    
            if(id == 'pdpt-box') {
                $judulChart = "Pendapatan"
                $('#title-dash').text('Pendapatan')
                $('.title-chart').text('Pendapatan')
            }else if(id == 'beban-box') {
                $judulChart = "Beban"
                $('#title-dash').text('Beban')
                $('.title-chart').text('Beban')
            }else if(id == 'shu-box') {
                $judulChart = "Sisa Hasil Usaha"
                $('#title-dash').text('Sisa Hasil Usaha')
                $('.title-chart').text('Sisa Hasil Usaha')
            }else if(id == 'or-box') {
                $judulChart = "Rasio Operasional"
                $('#title-dash').text('Rasio Operasional')
                $('.title-chart').text('Rasio Operasional')
            }
            $('#back-div').removeClass('hidden')
            $('#dash-title-div').removeClass('pl-8').addClass('pl-0')
            $('#main-dash').hide()
            $('#detail-dash').show()
            $('body').removeClass('scroll-hide');
        }
    })
// EVENT CARD DASH
// KEMBALI
$('#back').click(function() {
    $('#title-dash').text('Financial Performance')
    $('#back-div').addClass('hidden')
    $('#dash-title-div').removeClass('pl-0')
    $('#dash-title-div').addClass('pl-8')
    $('#detail-dash').hide()
    $('#main-dash').show()
    $('body').addClass('scroll-hide');
});
// END KEMBALI
</script>
<script type="text/javascript">
// TABLE LEMBAGA EVET
$('#table-lembaga tbody').on('click', 'tr td', function() {
    var table = $(this).parents('table').attr('id')
    var tr = $(this).parent()
    var icon = $(this).closest('tr').find('td:first').find('.check-row')
    var kode = $(this).closest('tr').find('td:first').find('.kode').text()
    var check = $(tr).attr('class')
    var lembaga = $(this).closest('tr').find('td:first').find('.name-lembaga').text()
    $filter_lokasi = $(this).closest('tr').find('td:first').find('.kode').text()
    if(check == 'selected-row') {
        return;
    }

    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()

    $(tr).addClass('selected-row')
    $(icon).show()
    setTimeout(function() {
        updateChart(true);
        updateBox();
    }, 200)
    $('#lembaga-title').text(lembaga)
    showNotification(`Menampilkan dashboard lembaga ${lembaga}`);
})

$('#table-lembaga tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    $filter_lokasi="";
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    $('#lembaga-title').text('Tarbak')
    showNotification(`Menampilkan dashboard `);
    updateAllChart();
})
// END TABLE LEMBAGA EVENT
</script>

<script type="text/javascript">
// FULLSCREEN HIGHCHART
    document.addEventListener('fullscreenchange', (event) => {
        if (document.fullscreenElement) {
            console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
        } else {
            pdptChart.update({
                title: {
                    text: ''
                }
            })

            bebanChart.update({
                title: {
                    text: ''
                }
            })

            shuChart.update({
                title: {
                    text: ''
                }
            })

            lrChart.update({
                title: {
                    text: ''
                }
            })
            console.log('Leaving full-screen mode.');
        }
    });
// END FULLSCREEN HIGHCHART
</script>

<script type="text/javascript">
// DRAGGING
    dragElement($('#window-drag')[0]);

    $('#icon-message').click(function() {
        $('#window-drag').removeClass('hidden')
    });

    $('#close-window').click(function() {
        $('#window-drag').addClass('hidden')
    });
// END DRAGGING
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
        $('#select-text-fp').text(`${nama_filter} ${$filter2} ${$tahun}`)
    })

    // MENTRIGGER FILTER 2
    $('#list-filter-2').on('click', 'div', function(event) {
        event.stopPropagation();
        var filter = $(this).text()
        if($(this).data('bulan')) {
            filter = $(this).data('bulan') 
        }
        $month = $(this).data('bulan') 
        $filter2 = filter
        $filter2_kode = $(this).data('filter2')
        $('#list-filter-2 div').not(this).removeClass('selected')
        $(this).addClass('selected')
        $('#filter-box').addClass('hidden')

        if($month.toString().length == 2) {
            $filter2 = getNamaBulan($filter2)
        }
        
        var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
        $('#select-text-fp').text(`${nama_filter} ${$filter2} ${$tahun}`)
        updateAllChart()
        showNotification(`Menampilkan dashboard ${nama_filter} ${$filter2} ${$tahun}`);
        $('#detail-dash').hide()
        $('#main-dash').show()
        $('body').addClass('scroll-hide');
    })
// END FILTER EVENT
</script>

<script type="text/javascript">
$('.icon-menu').click(function(event) {
    event.stopPropagation()
    var parentID = $(this).parents('.card-dash').attr('id')
    $('#'+parentID).find('.menu-chart-custom').removeClass('hidden')
})
// MENAMPILKAN LIST CUSTOM EXPORT HIGHCHART
    // OR
    $('#export-or.menu-chart-custom ul li').click(function(event) {
        event.stopPropagation()
        var idParent = $(this).parents('#or-box').attr('id')
        var jenis = $(this).text()
        if(jenis == 'View in full screen') {
            orChart.update({
                title: {
                    text: 'Operating Ratio Lembaga',
                    floating: true,
                    x: 40,
                    y: 90
                }
            })
            orChart.fullscreen.toggle();
        } else if(jenis == 'Print chart') {
            orChart.print()
        } else if(jenis == 'Download PNG image') {
            orChart.exportChart({
                type: 'image/png',
                filename: 'chart-png'
            }, {
                title: {
                    text: 'Operating Ratio Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download JPEG image') {
            orChart.exportChart({
                type: 'image/jpeg',
                filename: 'chart-jpg'
            }, {
                title: {
                    text: 'Operating Ratio Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download PDF document') {
            orChart.exportChart({
                type: 'application/pdf',
                filename: 'chart-pdf'
            }, {
                title: {
                    text: 'Operating Ratio Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download SVG vector image') {
            orChart.exportChart({
                type: 'image/svg+xml',
                filename: 'chart-svg'
            }, {
                title: {
                    text: 'Operating Ratio Lembaga'
                },
                subtitle: {
                text: ''
                }
            });
        } else if(jenis == 'View table data') {
            $(this).text('Hide table data')
            orChart.viewData()
            var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
            if(!cek) {
                $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
            }
        } else if(jenis == 'Hide table data') {
            $(this).text('View table data')
            $('.highcharts-data-table').hide()
        }
    })
    // END OR
    // SHU
    $('#export-shu.menu-chart-custom ul li').click(function(event) {
        event.stopPropagation()
        var idParent = $(this).parents('#shu-box').attr('id')
        var jenis = $(this).text()
        if(jenis == 'View in full screen') {
            shuChart.update({
                title: {
                    text: 'Sisa Hasil Usaha Lembaga',
                    floating: true,
                    x: 40,
                    y: 90
                }
            })
            shuChart.fullscreen.toggle();
        } else if(jenis == 'Print chart') {
            shuChart.print()
        } else if(jenis == 'Download PNG image') {
            shuChart.exportChart({
                type: 'image/png',
                filename: 'chart-png'
            }, {
                title: {
                    text: 'Sisa Hasil Usaha Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download JPEG image') {
            shuChart.exportChart({
                type: 'image/jpeg',
                filename: 'chart-jpg'
            }, {
                title: {
                    text: 'Sisa Hasil Usaha Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download PDF document') {
            shuChart.exportChart({
                type: 'application/pdf',
                filename: 'chart-pdf'
            }, {
                title: {
                    text: 'Sisa Hasil Usaha Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download SVG vector image') {
            shuChart.exportChart({
                type: 'image/svg+xml',
                filename: 'chart-svg'
            }, {
                title: {
                    text: 'Sisa Hasil Usaha Lembaga'
                },
                subtitle: {
                text: ''
                }
            });
        } else if(jenis == 'View table data') {
            $(this).text('Hide table data')
            shuChart.viewData()
            var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
            if(!cek) {
                $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
            }
        } else if(jenis == 'Hide table data') {
            $(this).text('View table data')
            $('.highcharts-data-table').hide()
        }
    })
    // END SHU
    // BEBAN
    $('#export-beban.menu-chart-custom ul li').click(function(event) {
        event.stopPropagation()
        var idParent = $(this).parents('#beban-box').attr('id')
        var jenis = $(this).text()
        if(jenis == 'View in full screen') {
            bebanChart.update({
                title: {
                    text: 'Beban Lembaga',
                    floating: true,
                    x: 40,
                    y: 90
                }
            })
            bebanChart.fullscreen.toggle();
        } else if(jenis == 'Print chart') {
            bebanChart.print()
        } else if(jenis == 'Download PNG image') {
            bebanChart.exportChart({
                type: 'image/png',
                filename: 'chart-png'
            }, {
                title: {
                    text: 'Beban Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download JPEG image') {
            bebanChart.exportChart({
                type: 'image/jpeg',
                filename: 'chart-jpg'
            }, {
                title: {
                    text: 'Beban Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download PDF document') {
            bebanChart.exportChart({
                type: 'application/pdf',
                filename: 'chart-pdf'
            }, {
                title: {
                    text: 'Beban Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download SVG vector image') {
            bebanChart.exportChart({
                type: 'image/svg+xml',
                filename: 'chart-svg'
            }, {
                title: {
                    text: 'Beban Lembaga'
                },
                subtitle: {
                text: ''
                }
            });
        } else if(jenis == 'View table data') {
            $(this).text('Hide table data')
            bebanChart.viewData()
            var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
            if(!cek) {
                $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
            }
        } else if(jenis == 'Hide table data') {
            $(this).text('View table data')
            $('.highcharts-data-table').hide()
        }
    })
    // END BEBAN
    // PENDAPATAN
    $('#export-pdpt.menu-chart-custom ul li').click(function(event) {
        event.stopPropagation()
        var idParent = $(this).parents('#pdpt-box').attr('id')
        var jenis = $(this).text()
        if(jenis == 'View in full screen') {
            pdptChart.update({
                title: {
                    text: 'Pendapatan Lembaga',
                    floating: true,
                    x: 40,
                    y: 90
                }
            })
            pdptChart.fullscreen.toggle();
        } else if(jenis == 'Print chart') {
            pdptChart.print()
        } else if(jenis == 'Download PNG image') {
            pdptChart.exportChart({
                type: 'image/png',
                filename: 'chart-png'
            }, {
                title: {
                    text: 'Pendapatan Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download JPEG image') {
            pdptChart.exportChart({
                type: 'image/jpeg',
                filename: 'chart-jpg'
            }, {
                title: {
                    text: 'Pendapatan Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download PDF document') {
            pdptChart.exportChart({
                type: 'application/pdf',
                filename: 'chart-pdf'
            }, {
                title: {
                    text: 'Pendapatan Lembaga'
                },
                subtitle: {
                    text: ''
                }
            });
        } else if(jenis == 'Download SVG vector image') {
            pdptChart.exportChart({
                type: 'image/svg+xml',
                filename: 'chart-svg'
            }, {
                title: {
                    text: 'Pendapatan Lembaga'
                },
                subtitle: {
                text: ''
                }
            });
        } else if(jenis == 'View table data') {
            $(this).text('Hide table data')
            pdptChart.viewData()
            var cek = $('#'+idParent+'.highcharts-data-table table').hasClass('table table-bordered table-no-padding')
            if(!cek) {
                $('.highcharts-data-table table').addClass('table table-bordered table-no-padding')
            }
        } else if(jenis == 'Hide table data') {
            $(this).text('View table data')
            $('.highcharts-data-table').hide()
        }
    })
    // END PENDAPATAN
// END MENAMPILKAN LIST CUSTOM EXPORT HIGHCHART

// SHOW CHART
$('.card-dash .table tbody tr td').on('click', '.show-chart', function() {
    $(this).removeClass('show-chart').addClass('hide-chart rotate-360')
    var parentID = $(this).parents('.card-dash').attr('id')
    if(parentID == 'pdpt-box') {
        $('#pdpt-chart').removeClass('hidden')
    } else if(parentID == 'beban-box') {
        $('#beban-chart').removeClass('hidden')
    } else if(parentID == 'shu-box') {
        $('#shu-chart').removeClass('hidden')
    } else if(parentID == 'or-box') {
        $('#or-chart').removeClass('hidden')      
    }
    // setHeightPage();
})

$('.card-dash .table tbody tr td').on('click', '.hide-chart', function() {
    $(this).removeClass('hide-chart rotate-360').addClass('show-chart')
    var parentID = $(this).parents('.card-dash').attr('id')
    if(parentID == 'pdpt-box') {
        $('#pdpt-chart').addClass('hidden')
    } else if(parentID == 'beban-box') {
        $('#beban-chart').addClass('hidden')
    } else if(parentID == 'shu-box') {
        $('#shu-chart').addClass('hidden')
    } else if(parentID == 'or-box') {
        $('#or-chart').addClass('hidden')      
    }
    // setHeightPage();
})
// END SHOW CHART
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
                    <h2 class="title-dash" id="title-dash">Financial Performance <span id="lembaga-title"></span></h2>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="row">
                {{-- <div class="col-3 pr-0 message-div">
                    <img id="icon-message" alt="message-icon" class="icon-message cursor-pointer" src="{{ asset('dash-asset/dash-tarbak/icon/message.svg') }}">
                </div> --}}
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-tarbak/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-fp" class="select-text">Bulan September {{ date('Y') }}</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-tarbak/icon/drop-arrow.svg') }}">
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

{{-- END HEADER --}}

<section id="main-dash" class="mt-20 pb-24">
{{-- ROW 1 --}}
    <div id="dekstop-1" class="row dekstop">
        <div class="col-3 pl-12 pr-0">
            <div class="card card-dash border-r-0 click-card cursor-pointer" id="pdpt-box" data-grafik="">
                <div class="row">
                    <div class="col-12">
                        <h4 class="header-card">Pendapatan</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="pendapatan-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding w-100">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-40">Ach. RKA</td>
                                            <td id="pendapatan-ach" class="px-0 w-25 text-right">0</td>
                                            <td id="pdpt-ach-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="pdpt-ach-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-40 yoy-label">YoY Growth</td>
                                            <td id="pendapatan-yoy" class="px-0 w-25 text-right">0</td>
                                            <td id="pdpt-yoy-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="pdpt-yoy-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="4" class="text-center pl-0 pr-0 td-show-chart" style="padding-top: 4px;">
                                                <img alt="show-chart-icon" class="show-chart" src="{{ asset('dash-asset/dash-tarbak/icon/drop-arrow.svg') }}">
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-2">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                        <div class="menu-chart-custom hidden" id="export-pdpt">
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
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="pdpt-chart" class="chart-card chart-no-grid hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0 click-card cursor-pointer" id="beban-box" data-grafik="">
                <div class="row">
                    <div class="col-12">
                        <h4 class="header-card">Beban</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="beban-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-40">Ach. RKA</td>
                                            <td id="beban-ach" class="px-0 w-25 text-right">0</td>
                                            <td id="beban-ach-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="beban-ach-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-40 yoy-label">YoY Growth</td>
                                            <td id="beban-yoy" class="px-0 w-25 text-right">0</td>
                                            <td id="beban-yoy-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="beban-yoy-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="4" class="text-center pl-0 pr-0 td-show-chart" style="padding-top: 4px;">
                                                <img alt="show-chart-icon" class="show-chart" src="{{ asset('dash-asset/dash-tarbak/icon/drop-arrow.svg') }}">
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-2">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                        <div class="menu-chart-custom hidden" id="export-beban">
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
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="beban-chart" class="mt-8 chart-card chart-no-grid hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0 click-card cursor-pointer" id="shu-box" data-grafik="">
                <div class="row">
                    <div class="col-12">
                        <h4 class="header-card">Sisa Hasil Usaha</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="shu-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-40">Ach. RKA</td>
                                            <td id="shu-ach" class="px-0 w-25 text-right">0</td>
                                            <td id="shu-ach-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="shu-ach-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-40 yoy-label">YoY Growth</td>
                                            <td id="shu-yoy" class="px-0 w-25 text-right">0</td>
                                            <td id="shu-yoy-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="shu-yoy-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="4" class="text-center pl-0 pr-0 td-show-chart" style="padding-top: 4px;">
                                                &nbsp;<img alt="show-chart-icon" class="show-chart" src="{{ asset('dash-asset/dash-tarbak/icon/drop-arrow.svg') }}">
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-2">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                        <div class="menu-chart-custom hidden" id="export-shu">
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
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="shu-chart" class="mt-8 chart-card chart-no-grid hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0 click-card cursor-pointer" id="or-box" data-grafik="">
                <div class="row">
                    <div class="col-12">
                        <h4 class="header-card">Operating Ratio</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="or-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-40">Ach. RKA</td>
                                            <td id="or-ach" class="px-0 w-25 text-right">0</td>
                                            <td id="or-ach-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="or-ach-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-40 yoy-label">YoY Growth</td>
                                            <td id="or-yoy" class="px-0 w-25 text-right">0</td>
                                            <td id="or-yoy-icon" class="pr-0 pl-0 w-15 text-right"></td>
                                            <td id="or-yoy-percentage" class="pr-0 w-20 text-right">
                                                0
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td colspan="4" class="text-center pl-0 pr-0 td-show-chart" style="padding-top: 4px;">
                                                <img alt="show-chart-icon" class="show-chart" src="{{ asset('dash-asset/dash-tarbak/icon/drop-arrow.svg') }}">
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-2">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                        <div class="menu-chart-custom hidden" id="export-or">
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
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="or-chart" class="mt-8 chart-card chart-no-grid hidden"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- END ROW 1 --}}

{{-- ROW 2 --}}
    <div id="dekstop-2" class="row dekstop mt-4">
        <div class="col-6 pl-12 pr-0">
            <div class="card card-dash border-r-0 card-r-2" style='height:calc(100vh - 280px)' id="dash-lr">
                <div class="row header-div" id="card-lr">
                    <div class="col-9">
                        <h4 class="header-card">Laba Rugi Lembaga</h4>
                    </div>
                    <div class="col-3">
                        <div class="glyph-icon simple-icon-menu icon-menu"></div>
                    </div>
                    <div class="menu-chart-custom hidden" id="export-lr">
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
                <div id="lr-chart" style='height: calc(100vh - 290px)'></div>
            </div>
        </div>
        <div class="col-6 pl-1 pr-0">
            <div class="card card-dash border-r-0 card-r-2" style='height:calc(100vh - 280px)'>
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Performansi Lembaga</h4>
                    </div>
                </div>
                <div id="scrollTable" class='scrollTable' style='height: calc(100vh - 320px)'>
                    <table id="table-lembaga" class="table table-bordered table-th-red mt-8">
                        <thead>
                            <tr>
                                <th rowspan="2">&nbsp;</th>
                                <th colspan="2" class="text-center">Pendapatan</th>
                                <th colspan="2" class="text-center">Beban</th>
                                <th colspan="2" class="text-center">SHU</th>
                                <th colspan="2" class="text-center">OR</th>
                            </tr>
                            <tr>
                                <th class="text-center">Ach.</th>
                                <th class="text-center yoy2-label">YoY</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center yoy2-label">YoY</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center yoy2-label">YoY</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center yoy2-label">YoY</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- END ROW 2 --}}
</section>
{{-- END DESKTOP --}}
@include('dash-tarbak.components.detail_fpv2')

{{-- WINDOW DRAGABLE --}}
<div class="window-drag hidden" id="window-drag">
    <div class="header-window" id="window-dragheader">
        <div class="row">
            <div class="col-9 py-4">
                <h4 class="window-title">Pesan</h4>
            </div>
            <div class="col-3">
                <button type="button" class="btn-close-window float-right" id="close-window">&times;</button>
            </div>
        </div>  
    </div>
    <div class="body-window">
        <div class="row">
            <div class="col-12">
                <div id="message-window" class="p-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut 
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                    sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END WINDOW DRAGABLE --}}
