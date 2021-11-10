<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/fp2.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js') }}"></script>
<script src="{{ asset('dash-asset/dash-ypt/dragging.js') }}"></script>

<script type="text/javascript">
var $tahun = parseInt($('#year-filter').text())
var $filter1 = "Periode";
var $filter2 = "September";
var $month = "{{ date('m') }}";
var $judulChart = null;
var $filter1_kode = "PRD";
var $filter2_kode = "09";
var pdptChart = null;
var bebanChart = null;
var shuChart = null;
var lrChart = null;
var $render = 0;

// RUN IF FIRST RENDER
new PerfectScrollbar('#scrollTable');
var $height = $(window).height();
// SET STYLES CARD
$('.card-r-2').css('height', `${$height - 290}px`);
// SET STYLES CARD

// DATA BOX
(function(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/v2/data-fp-box') }}",
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
            $('#pdpt-yoy-percentage').empty()
            $('#pdpt-ach-percentage').empty()
            var iconPdptYoy = '';
            var iconPdptAch = '';
            var nilaiPdpt = 0;
            var nilaiYoyPdpt = 0;
            var nilaiAchPdpt = 0;
            var pdpt = result.data.data_pdpt;
            if(pdpt.n4.toString().length <= 9) {
                nilaiPdpt = toJuta(pdpt.n4)
            } else {
                nilaiPdpt = toMilyar(pdpt.n4)
            }

            if(pdpt.n1.toString().length <= 9) {
                nilaiYoyPdpt = toJuta(pdpt.n1)
            } else {
                nilaiYoyPdpt = toMilyar(pdpt.n1)
            }

            if(pdpt.n2.toString().length <= 9) {
                nilaiAchPdpt = toJuta(pdpt.n2)
            } else {
                nilaiAchPdpt = toMilyar(pdpt.n2)
            }

            if(pdpt.yoy < 0) {
                $('#pdpt-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#pdpt-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            if(pdpt.ach < 0) {
                $('#pdpt-ach-percentage').removeClass('green-text').addClass('red-text')
                iconPdptAch = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#pdpt-ach-percentage').removeClass('red-text').addClass('green-text')
                iconPdptAch = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#pdpt-box').data('grafik', pdpt.kode_grafik)
            $('#pendapatan-value').text(nilaiPdpt)
            $('#pendapatan-yoy').text(nilaiYoyPdpt)
            $('#pendapatan-ach').text(nilaiAchPdpt)
            $('#pdpt-yoy-percentage').append(`${pdpt.yoy}% ${iconPdptYoy}`)
            $('#pdpt-ach-percentage').append(`${pdpt.ach}% ${iconPdptAch}`)
            // END PENDAPATAN

            // BEBAN
            $('#beban-ach-percentage').empty()
            $('#beban-yoy-percentage').empty()
            var iconBebanYoy = '';
            var iconBebanAch = '';
            var nilaiBeban = 0;
            var nilaiYoyBeban = 0;
            var nilaiAchBeban = 0;
            var beban = result.data.data_beban;
            if(beban.n4.toString().length <= 9) {
                nilaiBeban = toJuta(beban.n4)
            } else {
                nilaiBeban = toMilyar(beban.n4)
            }

            if(beban.n1.toString().length <= 9) {
                nilaiYoyBeban = toJuta(beban.n1)
            } else {
                nilaiYoyBeban = toMilyar(beban.n1)
            }

            if(beban.n2.toString().length <= 9) {
                nilaiAchBeban = toJuta(beban.n2)
            } else {
                nilaiAchBeban = toMilyar(beban.n2)
            }

            if(beban.yoy < 0) {
                $('#beban-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconBebanYoy = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#beban-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconBebanYoy = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            if(beban.ach < 0) {
                $('#beban-ach-percentage').removeClass('green-text').addClass('red-text')
                iconBebanAch = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#beban-ach-percentage').removeClass('red-text').addClass('green-text')
                iconBebanAch = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#beban-box').data('grafik', beban.kode_grafik)
            $('#beban-value').text(nilaiBeban)
            $('#beban-yoy').text(nilaiYoyBeban)
            $('#beban-ach').text(nilaiAchBeban)
            $('#beban-yoy-percentage').append(`${beban.yoy}% ${iconBebanYoy}`)
            $('#beban-ach-percentage').append(`${beban.ach}% ${iconBebanAch}`)
            // END BEBAN

            // SHU
            $('#shu-ach-percentage').empty()
            $('#shu-yoy-percentage').empty()
            var iconShuYoy = '';
            var iconShuAch = '';
            var nilaiShu = 0;
            var nilaiYoyShu = 0;
            var nilaiAchShu = 0;
            var shu = result.data.data_shu;
            if(shu.n4.toString().length <= 9) {
                nilaiShu = toJuta(shu.n4)
            } else {
                nilaiShu = toMilyar(shu.n4)
            }

            if(shu.n1.toString().length <= 9) {
                nilaiYoyShu = toJuta(shu.n1)
            } else {
                nilaiYoyShu = toMilyar(shu.n1)
            }

            if(shu.n2.toString().length <= 9) {
                nilaiAchShu = toJuta(shu.n2)
            } else {
                nilaiAchShu = toMilyar(shu.n2)
            }

            if(shu.yoy < 0) {
                $('#shu-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconShuYoy = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#shu-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconShuYoy = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            if(shu.ach < 0) {
                $('#shu-ach-percentage').removeClass('green-text').addClass('red-text')
                iconShuAch = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#shu-ach-percentage').removeClass('red-text').addClass('green-text')
                iconShuAch = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#shu-box').data('grafik', shu.kode_grafik)
            $('#shu-value').text(nilaiShu)
            $('#shu-yoy').text(nilaiYoyShu)
            $('#shu-ach').text(nilaiAchShu)
            $('#shu-yoy-percentage').append(`${shu.yoy}% ${iconShuYoy}`)
            $('#shu-ach-percentage').append(`${shu.ach}% ${iconShuAch}`)
            // END SHU

            // OR
            $('#or-ach-percentage').empty()
            $('#or-yoy-percentage').empty()
            var iconOrYoy = '';
            var iconOrAch = '';
            var nilaiOr = 0;
            var nilaiYoyOr = 0;
            var nilaiAchOr = 0;
            var or = result.data.data_or;

            if(or.yoy < 0) {
                $('#or-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconOrYoy = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#or-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconOrYoy = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            if(or.ach < 0) {
                $('#or-ach-percentage').removeClass('green-text').addClass('red-text')
                iconOrAch = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#or-ach-percentage').removeClass('red-text').addClass('green-text')
                iconOrAch = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#or-box').data('grafik', or.kode_grafik)
            $('#or-value').text(`${or.n4} %`)
            $('#or-yoy').text(`${or.n1}%`)
            $('#or-ach').text(`${or.n2}%`)
            $('#or-yoy-percentage').append(`${or.yoy}% ${iconOrYoy}`)
            $('#or-ach-percentage').append(`${or.ach}% ${iconOrAch}`)
            // END OR
        }
    });
})();
// END DATA BOX

// DATA CHART
    // PENDAPATAN
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-ypt-dash/v2/data-fp-pdpt') }}",
            data: {
                "periode[0]": "=", 
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode
            },
            dataType: 'json',
            async: false,
            success: function(result) {
                var data = result.data;
                lrChart = Highcharts.chart('pdpt-chart', {
                    chart: {
                        height: 170,
                        type: 'column'
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
                    series: [
                        {
                            name: 'Anggaran',
                            color: '#b91c1c',
                            data: data.anggaran
                        },
                        {
                            name: 'Realisasi',
                            color: '#064E3B',
                            data: data.realisasi
                        }
                    ]
                })
            }
        });
    })();
    // END PENDAPATAN
    // BEBAN
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-ypt-dash/v2/data-fp-beban') }}",
            data: {
                "periode[0]": "=", 
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode
            },
            dataType: 'json',
            async: false,
            success: function(result) {
                var data = result.data;
                lrChart = Highcharts.chart('beban-chart', {
                    chart: {
                        height: 170,
                        type: 'column'
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
                    series: [
                        {
                            name: 'Anggaran',
                            color: '#b91c1c',
                            data: data.anggaran
                        },
                        {
                            name: 'Realisasi',
                            color: '#064E3B',
                            data: data.realisasi
                        }
                    ]
                })
            }
        });
    })();
    // END BEBAN
    // SHU
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-ypt-dash/v2/data-fp-shu') }}",
            data: {
                "periode[0]": "=", 
                "periode[1]": $filter2_kode,
                "tahun": $tahun,
                "jenis": $filter1_kode
            },
            dataType: 'json',
            async: false,
            success: function(result) {
                var data = result.data;
                lrChart = Highcharts.chart('shu-chart', {
                    chart: {
                        height: 170,
                        type: 'column'
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
                    series: [
                        {
                            name: 'Anggaran',
                            color: '#b91c1c',
                            data: data.anggaran
                        },
                        {
                            name: 'Realisasi',
                            color: '#064E3B',
                            data: data.realisasi
                        }
                    ]
                })
            }
        });
    })();
    // END SHU
// END DATA CHART

// CHART LABA RUGI
(function(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-lr') }}",
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
                    height: 340,
                    type: 'column'
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
        url: "{{ url('dash-ypt-dash/data-fp-pl') }}",
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
                    if(row.pdpt_ach < 0) {
                        classTd1 = "td-red"
                    }
                    if(row.pdpt_yoy < 0) {
                        classTd2 = "td-red"
                    }
                    if(row.beban_ach < 0) {
                        classTd3 = "td-red"
                    }
                    if(row.beban_yoy < 0) {
                        classTd4 = "td-red"
                    }
                    if(row.shu_ach < 0) {
                        classTd5 = "td-red"
                    }
                    if(row.shu_yoy < 0) {
                        classTd6 = "td-red"
                    }
                    if(row.or_ach < 0) {
                        classTd7 = "td-red"
                    }
                    if(row.or_yoy < 0) {
                        classTd8 = "td-red"
                    }

                    html += `<tr>
                        <td>
                            <p class="kode hidden">${row.kode_lokasi}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                            <span class="name-lembaga">${row.nama}</span>
                        </td>
                        <td class="${classTd1}">${row.pdpt_ach}%</td>
                        <td class="${classTd2}">${row.pdpt_yoy}%</td>
                        <td class="${classTd3}">${row.beban_ach}%</td>
                        <td class="${classTd4}">${row.beban_yoy}%</td>
                        <td class="${classTd5}">${row.shu_ach}%</td>
                        <td class="${classTd6}">${row.shu_yoy}%</td>
                        <td class="${classTd7}">${row.or_ach}%</td>
                        <td class="${classTd8}">${row.or_yoy}%</td>
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
    $('.card-r-2').css('height', `${$height - 290}px`);

    if($height < 800) {
        heighChart = $height - 327;
    } else {
        heighChart = $height - 320;
    }

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

function updateChart() {
    // PENDAPATAN
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-ypt-dash/data-fp-pdpt') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         pdptChart.series[0].update({
    //             data: result.data
    //         }, true) // true untuk redraw
    //     }
    // });
    // END PENDAPATAN
    // BEBAN
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-ypt-dash/data-fp-beban') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         bebanChart.series[0].update({
    //             data: result.data
    //         }, true) // true untuk redraw
    //     }
    // });
    // END BEBAN
    // SHU
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-ypt-dash/data-fp-shu') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         shuChart.series[0].update({
    //             data: result.data
    //         }, true) // true untuk redraw
    //     }
    // });
    // END SHU
    // OR
    // $.ajax({
    //     type: 'GET',
    //     url: "{{ url('dash-ypt-dash/data-fp-or') }}",
    //     data: {
    //         "periode[0]": "=", 
    //         "periode[1]": $filter2_kode,
    //         "tahun": $tahun,
    //         "jenis": $filter1_kode
    //     },
    //     dataType: 'json',
    //     async: true,
    //     success:function(result) {
    //         var html = "";
    //         var data = result.data;
    //         if(data.length > 0) {
    //            $('#table-or tbody').empty()
    //            var colorText = '#ffffff';
    //            for(var i=0;i<data.length;i++) {
    //                var row = data[i];
    //                if(row.y < 5) {
    //                     colorText = '#000000';
    //                } else {
    //                     colorText = '#ffffff';
    //                }
    //                html += `<tr>
    //                     <td class="w-25">${row.name}</td>
    //                     <td>
    //                         <div class="progress h-20">
    //                             <div class="progress-bar bg-red" role="progressbar" style="width: ${row.y}%; color: ${colorText}" aria-valuenow="${row.y}" aria-valuemin="0" aria-valuemax="100">${row.y}%</div>
    //                         </div>
    //                     </td>
    //                 </tr>`;
    //            }
    //            $('#table-or tbody').append(html)
    //         }
    //     }
    // });
    // // END OR
    // LR
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-lr') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
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
    // PL TABLE
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-pl') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {
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
                    if(row.pdpt_ach < 0) {
                        classTd1 = "td-red"
                    }
                    if(row.pdpt_yoy < 0) {
                        classTd2 = "td-red"
                    }
                    if(row.beban_ach < 0) {
                        classTd3 = "td-red"
                    }
                    if(row.beban_yoy < 0) {
                        classTd4 = "td-red"
                    }
                    if(row.shu_ach < 0) {
                        classTd5 = "td-red"
                    }
                    if(row.shu_yoy < 0) {
                        classTd6 = "td-red"
                    }
                    if(row.or_ach < 0) {
                        classTd7 = "td-red"
                    }
                    if(row.or_yoy < 0) {
                        classTd8 = "td-red"
                    }

                    html += `<tr>
                        <td>
                            <p class="kode hidden">${row.kode_lokasi}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display: none"></div>
                            <span class="name-lembaga">${row.nama}</span>
                        </td>
                        <td class="${classTd1}">${row.pdpt_ach}%</td>
                        <td class="${classTd2}">${row.pdpt_yoy}%</td>
                        <td class="${classTd3}">${row.beban_ach}%</td>
                        <td class="${classTd4}">${row.beban_yoy}%</td>
                        <td class="${classTd5}">${row.shu_ach}%</td>
                        <td class="${classTd6}">${row.shu_yoy}%</td>
                        <td class="${classTd7}">${row.or_ach}%</td>
                        <td class="${classTd8}">${row.or_yoy}%</td>
                    </tr>`;
                }
                $('#table-lembaga tbody').append(html)
            }
        }
    });
    // END PL TABLE
}

function updateBox() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-fp-box') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {    
            // PENDAPATAN
            $('#pdpt-yoy-percentage').empty()
            var iconPdpt = '';
            var nilaiPdpt = 0;
            var nilaiYoyPdpt = 0;
            var pdpt = result.data.data_pdpt;
            if(pdpt.n4.toString().length <= 9) {
                nilaiPdpt = toJuta(pdpt.n4)
            } else {
                nilaiPdpt = toMilyar(pdpt.n4)
            }

            if(pdpt.n1.toString().length <= 9) {
                nilaiYoyPdpt = toJuta(pdpt.n1)
            } else {
                nilaiYoyPdpt = toMilyar(pdpt.n1)
            }

            if(pdpt.yoy < 0) {
                $('#pdpt-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconPdpt = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#pdpt-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconPdpt = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#circle-pdpt').circleProgress({
                value: pdpt.ach/100,
                size: 80,
                reverse: false,
                thickness: 8,
                fill: {
                    color: ["#FFBA33"]
                }
            });

            $('#circle-pdpt').find('strong').html(`
                <p class="my-0 text-circle">Ach.</p>
                <p class="my-0 text-circle">${pdpt.ach}%</p>
            `)

            $('#pdpt-box').data('grafik', pdpt.kode_grafik)
            $('#pendapatan-value').text(nilaiPdpt)
            $('#pendapatan-yoy').text(nilaiYoyPdpt)
            $('#pdpt-yoy-percentage').append(`${pdpt.yoy}% ${iconPdpt}`)
            // END PENDAPATAN

            // BEBAN
            $('#beban-yoy-percentage').empty()
            var iconBeban = '';
            var nilaiBeban = 0;
            var nilaiYoyBeban = 0;
            var beban = result.data.data_beban;
            if(beban.n4.toString().length <= 9) {
                nilaiBeban = toJuta(beban.n4)
            } else {
                nilaiBeban = toMilyar(beban.n4)
            }

            if(beban.n1.toString().length <= 9) {
                nilaiYoyBeban = toJuta(beban.n1)
            } else {
                nilaiYoyBeban = toMilyar(beban.n1)
            }

            if(beban.yoy < 0) {
                $('#beban-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconBeban = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#beban-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconBeban = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#circle-beban').circleProgress({
                value: beban.ach/100,
                size: 80,
                reverse: false,
                thickness: 8,
                fill: {
                    color: ["#EE0000"]
                }
            });

            $('#circle-beban').find('strong').html(`
                <p class="my-0 text-circle">Ach.</p>
                <p class="my-0 text-circle">${beban.ach}%</p>
            `)

            $('#beban-box').data('grafik', beban.kode_grafik)
            $('#beban-value').text(nilaiBeban)
            $('#beban-yoy').text(nilaiYoyBeban)
            $('#beban-yoy-percentage').append(`${beban.yoy}% ${iconBeban}`)
            // END BEBAN

            // SHU
            $('#shu-yoy-percentage').empty()
            var iconShu = '';
            var nilaiShu = 0;
            var nilaiYoyShu = 0;
            var shu = result.data.data_shu;
            if(shu.n4.toString().length <= 9) {
                nilaiShu = toJuta(shu.n4)
            } else {
                nilaiShu = toMilyar(shu.n4)
            }

            if(shu.n1.toString().length <= 9) {
                nilaiYoyShu = toJuta(shu.n1)
            } else {
                nilaiYoyShu = toMilyar(shu.n1)
            }

            if(shu.yoy < 0) {
                $('#shu-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconShu = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#shu-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconShu = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#circle-shu').circleProgress({
                value: shu.ach/100,
                size: 80,
                reverse: false,
                thickness: 8,
                fill: {
                    color: ["#EE0000"]
                }
            });

            $('#circle-shu').find('strong').html(`
                <p class="my-0 text-circle">Ach.</p>
                <p class="my-0 text-circle">${shu.ach}%</p>
            `)

            $('#shu-box').data('grafik', shu.kode_grafik)
            $('#shu-value').text(nilaiShu)
            $('#shu-yoy').text(nilaiYoyShu)
            $('#shu-yoy-percentage').append(`${shu.yoy}% ${iconShu}`)
            // END SHU

            // OR
            $('#or-yoy-percentage').empty()
            var iconOr = '';
            var nilaiOr = 0;
            var nilaiYoyOr = 0;
            var or = result.data.data_or;

            if(or.yoy < 0) {
                $('#or-yoy-percentage').removeClass('green-text').addClass('red-text')
                iconOr = '<div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>'
            } else {
                $('#or-yoy-percentage').removeClass('red-text').addClass('green-text')
                iconOr = '<div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>'
            }

            $('#circle-or').circleProgress({
                value: or.ach/100,
                size: 80,
                reverse: false,
                thickness: 8,
                fill: {
                    color: ["#EE0000"]
                }
            });

            $('#circle-or').find('strong').html(`
                <p class="my-0 text-circle">Ach.</p>
                <p class="my-0 text-circle">${or.ach}%</p>
            `)

            $('#or-box').data('grafik', or.kode_grafik)
            $('#or-value').text(`${or.n4} %`)
            $('#or-yoy').text(`${or.n1}%`)
            $('#or-yoy-percentage').append(`${or.yoy}% ${iconOr}`)
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
        $('#scrollTable').addClass('scrollTable')
        $('.card-r-2').css('height', `${height - 470}px`);
        lrChart.update({
            chart:{
                height: 180
            }
        })
    } else {
        $('#scrollTable').removeClass('scrollTable')
        $('.card-r-2').css('height', `${$height - 290}px`);
        lrChart.update({
            chart:{
                height: 340
            }
        })
    }
}
</script>

<script type="text/javascript">
// TABLE LEMBAGA EVET
$('#table-lembaga tbody').on('click', 'tr td', function() {
    var table = $(this).parents('table').attr('id')
    var tr = $(this).parent()
    var icon = $(tr).children('td:first').children('.check-row')
    var kode = $(tr).children('td:first').children('.kode').text()
    var check = $(tr).attr('class')
    var lembaga = $(this).children('.name-lembaga').text()
    if(check == 'selected-row') {
        return;
    }

    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()

    setTimeout(function() {
        $(tr).addClass('selected-row')
        $(icon).show()
    }, 200)
    $('#lembaga-title').text(lembaga)
    showNotification(`Menampilkan dashboard lembaga ${lembaga}`);
    setZero();
})

$('#table-lembaga tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    $('#lembaga-title').text('YPT')
    showNotification(`Menampilkan dashboard lembaga YPT`);
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
        if($filter1 == 'Triwulan') {
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
        } else if($filter1 == 'Semester') {
            html += `
                <div class="col-5 py-3 selected cursor-pointer" data-filter2="SMT1">
                    Semester I
                </div>
                <div class="col-5 ml-8 py-3 cursor-pointer" data-filter2="SMT2">
                    Semester II
                </div>
            `;
        } else if($filter1 == 'Periode') {
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

        if($filter1 == 'Periode') {
            $('#list-filter-2').find('.list').each(function() {
                if($(this).data('bulan').toString() == $month) {
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
        if($(this).data('bulan')) {
            filter = $(this).data('bulan') 
        }
        $filter2 = filter
        $filter2_kode = $(this).data('filter2')
        $('#list-filter-2 div').not(this).removeClass('selected')
        $(this).addClass('selected')
        $('#filter-box').addClass('hidden')

        if($filter2.length == 2) {
            $filter2 = getNamaBulan($filter2)
        }

        $('#select-text-fp').text(`${$filter2.toUpperCase()} || ${$tahun}`)
        updateAllChart()
        showNotification(`Menampilkan dashboard periode ${$filter2.toUpperCase()} ${$tahun}`);
        $('#detail-dash').hide()
        $('#main-dash').show()
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
        } else if(jenis == 'Show chart') {
            $(this).text('Hide chart')
            $('#shu-chart').removeClass('hidden')
            setHeightPage();
        } else if(jenis == 'Hide chart') {
            $(this).text('Show chart')
            $('#shu-chart').addClass('hidden')
            setHeightPage();
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
        } else if(jenis == 'Show chart') {
            $(this).text('Hide chart')
            $('#beban-chart').removeClass('hidden')
            setHeightPage();
        } else if(jenis == 'Hide chart') {
            $(this).text('Show chart')
            $('#beban-chart').addClass('hidden')
            setHeightPage();
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
        } else if(jenis == 'Show chart') {
            $(this).text('Hide chart')
            $('#pdpt-chart').removeClass('hidden')
            setHeightPage();
        } else if(jenis == 'Hide chart') {
            $(this).text('Show chart')
            $('#pdpt-chart').addClass('hidden')
            setHeightPage();
        }
    })
    // END PENDAPATAN
// END MENAMPILKAN LIST CUSTOM EXPORT HIGHCHART
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
                    <h2 class="title-dash" id="title-dash">Financial Performance <span id="lembaga-title">YPT</span></h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                <div class="col-3 pr-0 message-div">
                    <img id="icon-message" alt="message-icon" class="icon-message cursor-pointer" src="{{ asset('dash-asset/dash-ypt/icon/message.svg') }}">
                </div>
                <div class="col-9">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-fp" class="select-text">September || {{ date('Y') }}</p>
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
                        <li class="selected" data-filter1="TRW">Triwulan</li>
                        {{-- <li data-filter1="SMT">Semester</li> --}}
                        <li data-filter1="PRD">Periode</li>
                        {{-- <li>Year to Date</li> --}}
                    </ul>
                </div>
                <div class="col-7 mt-4 mb-6">
                    <div class="row list-filter-2" id="list-filter-2">
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
            <div class="card card-dash border-r-0 cursor-pointer" id="pdpt-box" data-grafik="">
                <div class="row">
                    <div class="col-10">
                        <h4 class="header-card">Pendapatan</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="pendapatan-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-50">ACH</td>
                                            <td id="pendapatan-ach" class="px-0">0</td>
                                            <td id="pdpt-ach-percentage" class="pr-0">
                                                0
                                                <div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-50">YoY</td>
                                            <td id="pendapatan-yoy" class="px-0">0</td>
                                            <td id="pdpt-yoy-percentage" class="pr-0">
                                                0
                                                <div class="glyph-icon iconsminds-down icon-card red-text bold-700"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
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
                                <li class="menu-chart-item show-chart">Show chart</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="pdpt-chart" class="mt-8 chart-card hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash  border-r-0 cursor-pointer" id="beban-box" data-grafik="">
                <div class="row">
                    <div class="col-10">
                        <h4 class="header-card">Beban</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="beban-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-50">ACH</td>
                                            <td id="beban-ach" class="px-0">0</td>
                                            <td id="beban-ach-percentage" class="pr-0">
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-50">YoY</td>
                                            <td id="beban-yoy" class="px-0">0</td>
                                            <td id="beban-yoy-percentage" class="pr-0">
                                                0
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
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
                                <li class="menu-chart-item show-chart">Show chart</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="beban-chart" class="mt-8 chart-card hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash  border-r-0 cursor-pointer" id="shu-box" data-grafik="">
                <div class="row">
                    <div class="col-10">
                        <h4 class="header-card">Sisa Hasil Usaha</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="shu-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-50">ACH</td>
                                            <td id="shu-ach" class="px-0">0</td>
                                            <td id="shu-ach-percentage" class="pr-0">
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-50">YoY</td>
                                            <td id="shu-yoy" class="px-0">0</td>
                                            <td id="shu-yoy-percentage" class="pr-0">
                                                0
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
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
                                <li class="menu-chart-item show-chart">Show chart</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="shu-chart" class="mt-8 chart-card hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash  border-r-0 cursor-pointer" id="or-box" data-grafik="">
                <div class="row">
                    <div class="col-10">
                        <h4 class="header-card">Operating Ratio</h4>
                        <div class="row">
                            <div class="col-12">
                                <p id="or-value" class="main-nominal">0</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-no-padding">
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 w-50">ACH</td>
                                            <td id="or-ach" class="px-0">0</td>
                                            <td id="or-ach-percentage" class="pr-0">
                                                0
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-0 w-50">YoY</td>
                                            <td id="or-yoy" class="px-0">0</td>
                                            <td id="or-yoy-percentage" class="pr-0">
                                                0
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
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
                                <li class="menu-chart-item show-chart">Show chart</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="or-chart" class="mt-8 chart-card hidden"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- END ROW 1 --}}

{{-- ROW 2 --}}
    <div id="dekstop-2" class="row dekstop mt-4">
        <div class="col-6 pl-12 pr-0">
            <div class="card card-dash border-r-0 card-r-2" id="dash-lr">
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
                <div id="lr-chart"></div>
            </div>
        </div>
        <div class="col-6 pl-1 pr-0">
            <div class="card card-dash border-r-0 card-r-2">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Performansi Lembaga</h4>
                    </div>
                </div>
                <div id="scrollTable">
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
                                <th class="text-center">YoY</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY</th>
                                <th class="text-center">Ach.</th>
                                <th class="text-center">YoY</th>
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