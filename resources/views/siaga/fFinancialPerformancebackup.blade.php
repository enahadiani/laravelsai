<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-pembendaharaan.dekstop.css?version=_').time() }}" />
<style>
    .link-detail {
        cursor: pointer;
    }
</style>
<script src="{{ asset('main.js') }}"></script>

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
var $fiter_kontribusi = "41";

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

function updateAllChart() {
    getDataBox();
    getFPBulan();
    getKontribusi();
    getMargin();
}

//get data box
function getDataBox() {
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-dash/data-fp-box') }}",
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
            //Reveneu

            var capai_rka=0;
            var capai_yoy=0;
            if(capai_rka < 100) {
                $('#capai_rka-revenue').removeClass('green-text').addClass('red-text')
                iconPdptAch = '&nbsp;'
            } else {
                $('#capai_rka-revenue').removeClass('red-text').addClass('green-text')
                iconPdptAch = '&nbsp;'
            }

            if(capai_yoy < 0) {
                $('#capai_yoy-revenue').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-revenue').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-revenue').text(capai_rka.toFixed(2) + '%')
            $('#capai_yoy-revenue').text(capai_yoy.toFixed(2) + '%')
            $('#nilai-revenue').text(toMilyar(data.revenue.nilai,1));
            $('#rka-revenue').text(toMilyar(data.revenue.rka,1));
            $('#yoy-revenue').text(toMilyar(data.revenue.yoy,1));

            //COGS
            if(capai_rka < 100) {
                $('#capai_rka-cogs').removeClass('green-text').addClass('red-text')
                iconPdptAch = '&nbsp;'
            } else {
                $('#capai_rka-cogs').removeClass('red-text').addClass('green-text')
                iconPdptAch = '&nbsp;'
            }

            if(capai_yoy < 0) {
                $('#capai_yoy-cogs').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-cogs').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-cogs').text(capai_rka.toFixed(2) + '%')
            $('#capai_yoy-cogs').text(capai_yoy.toFixed(2) + '%')
            $('#nilai-cogs').text(toMilyar(data.cogs.nilai,1));
            $('#rka-cogs').text(toMilyar(data.cogs.rka,1));
            $('#yoy-cogs').text(toMilyar(data.cogs.yoy,1));

            //Gross Profit
            if(capai_rka < 100) {
                $('#capai_rka-gross_profit').removeClass('green-text').addClass('red-text')
                iconPdptAch = '&nbsp;'
            } else {
                $('#capai_rka-gross_profit').removeClass('red-text').addClass('green-text')
                iconPdptAch = '&nbsp;'
            }

            if(capai_yoy < 0) {
                $('#capai_yoy-gross_profit').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-gross_profit').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-gross_profit').text(capai_rka.toFixed(2) + '%')
            $('#capai_yoy-gross_profit').text(capai_yoy.toFixed(2) + '%')
            $('#nilai-gross_profit').text(toMilyar(data.gross_profit.nilai,1));
            $('#rka-gross_profit').text(toMilyar(data.gross_profit.rka,1));
            $('#yoy-gross_profit').text(toMilyar(data.gross_profit.yoy,1));
            
            //OPEX
            if(capai_rka < 100) {
                $('#capai_rka-opex').removeClass('green-text').addClass('red-text')
                iconPdptAch = '&nbsp;'
            } else {
                $('#capai_rka-opex').removeClass('red-text').addClass('green-text')
                iconPdptAch = '&nbsp;'
            }

            if(capai_yoy < 0) {
                $('#capai_yoy-opex').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-opex').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-opex').text(capai_rka.toFixed(2) + '%')
            $('#capai_yoy-opex').text(capai_yoy.toFixed(2) + '%')
            $('#nilai-opex').text(toMilyar(data.opex.nilai,1));
            $('#rka-opex').text(toMilyar(data.opex.rka,1));
            $('#yoy-opex').text(toMilyar(data.opex.yoy,1));

            //Net Income
            if(capai_rka < 100) {
                $('#capai_rka-net-income').removeClass('green-text').addClass('red-text')
                iconPdptAch = '&nbsp;'
            } else {
                $('#capai_rka-net-income').removeClass('red-text').addClass('green-text')
                iconPdptAch = '&nbsp;'
            }

            if(capai_yoy < 0) {
                $('#capai_yoy-net-income').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-net-income').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-net_income').text(capai_rka.toFixed(2) + '%')
            $('#capai_yoy-net_income').text(capai_yoy.toFixed(2) + '%')
            $('#nilai-net_income').text(toMilyar(data.net_income.nilai,1));
            $('#rka-net_income').text(toMilyar(data.net_income.rka,1));
            $('#yoy-net_income').text(toMilyar(data.net_income.yoy,1));
        }
    });
}

//Monthly Performance
function getFPBulan(){
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-dash/data-fp-per-bulan') }}",
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
                    crosshair: true,
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Nilai'
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.2f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },
                series: [
                    {
                        name: 'Pendapatan',
                        data: data.pendapatan.map(item => item < 0 ? parseFloat(((item * -1) / 1000000000).toFixed(2)) : parseFloat((item / 1000000000).toFixed(2))),
                        color: '#80b7be',
                    }, {
                        name: 'Beban',
                        data: data.beban.map(item => item < 0 ? parseFloat(((item * -1) / 1000000000).toFixed(2)) : parseFloat((item / 1000000000).toFixed(2))),
                        stack: 'beban+hpp',
                        color: '#fbe697',
                    }, {
                        name: 'HPP',
                        data: data.hpp.map(item => item < 0 ? parseFloat(((item * -1) / 1000000000).toFixed(2)) : parseFloat((item / 1000000000).toFixed(2))),
                        stack: 'beban+hpp',
                        color: '#f49b4f',
                    }, {
                        type: 'spline',
                        name: 'NI',
                        data: data.net_income.map(item => item < 0 ? parseFloat(((item * -1) / 1000000000).toFixed(2)) : parseFloat((item / 1000000000).toFixed(2))),
                        color: '#7e0200',
                        marker: {
                            lineWidth: 1,
                        }
                    }
                ]
            });
        }
    })
}
//end of monthly performance

//filter kontribusi
(function () {
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-dash/data-fp-kontribusi-filter') }}",
        dataType: 'json',
        async: true,
        success:function(result) {
            var targetEl = document.getElementById('kode_neraca');
            if(targetEl) {
                if(result.status){
                    targetEl.innerHTML = '';
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            targetEl.innerHTML += '<option value="'+result.data[i].kode_neraca+'">'+result.data[i].nama+'</option>';
                        }
                    }
                }
            }
            // control.setValue('');
        }
    });
})();
//end of filter kontribusi

$('#kode_neraca').change(function(){
    $filter_kontribusi = $(this).val();
    var bidang = ($('#kode_neraca option:selected').text() != "Semua Bidang" ? $('#kode_neraca option:selected').text() : "")
    $('#bidang-title').text(bidang);
    $('#pp-title').text('Project Solution ');
    var sort = ( $('#sort-top').hasClass('sort-asc') ? 'asc' : 'desc'); 
    $filter_kode_pp = "";
    timeoutID = null;
    timeoutID = setTimeout(getKontribusi.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_neraca": $filter_kontribusi,
    }), 500);
    timeoutID = null;
    if(bidang != ""){
        showNotification(`Menampilkan dashboard `+bidang);
    }
});

//chart revenue contribusi
function getKontribusi(){
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-dash/data-fp-kontribusi') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_lokasi": $filter_lokasi,
            "kode_neraca": $filter_kontribusi,
        },
        dataType: 'json',
        async: true,
        success:function(result){
            var data = result.data;
            console.log(data)
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
                        format: '<b>{point.name}</b><br>{point.percentage:.1f} % <br>',
                        distance: -40,
                    },
                    showInLegend: false
                }
            },
            series: [
                {
                    name: 'Share',
                    colorByPoint: true,
                    data: data
                }
            ]
        });
        }
    })
}

//Get Margin

function getMargin(){
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-dash/data-fp-margin') }}",
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
            $('#margin tbody').html('');
            var html = '';
            if(result.data.length > 0){
                for(var i=0; i < result.data.length; i++){
                    var line = result.data[i];
                        var select = "";
                        var display = 'none';
                    html+=`
                    <tr ${select}>
                        <td ><p class="kode hidden">${line.kode_lokasi}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display:${display}"></div>
                            <span class="nama-lokasi">${line.kode_klp}</span></td>
                        <td class='text-right'>${number_format(line.nilai,2)}%</td>
                        
                    </tr>`;
                }
            }
            $('#margin tbody').html(html);
        }
    })
}

//End of Get Margin

// TABLE TOP EVET
$('#margin tbody').on('click', 'tr td', function() {
    var table = $(this).parents('table').attr('id')
    var tr = $(this).parent()
    var icon = $(this).closest('tr').find('td:first').find('.check-row')
    var kode = $(this).closest('tr').find('td:first').find('.kode').text()
    var check = $(tr).attr('class')
    var lokasi = $(this).closest('tr').find('td:first').find('.nama-lokasi').text()
    $filter_kode_lokasi = $(this).closest('tr').find('td:first').find('.kode').text()
    if(check == 'selected-row') {
        return;
    }
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()

    $(tr).addClass('selected-row')
    $(icon).show()
    setTimeout(function() {
        getDataBox();
        getFPBulan();
        getKontribusi();
        getMargin();
    }, 200)
    $('#lokasi-title').text(lokasi)
    showNotification(`Menampilkan dashboard ${lokasi}`);
})

$('#margin tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    $filter_kode_lokasi="";
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    $('#lokasi-title').text('YPT')
    getDataBox();
    getFPBulan();
    getKontribusi();
    getMargin();
    showNotification(`Menampilkan dashboard YPT`);
})
// END TABLE TOP EVENT

setTimeout (function(){
    getDataBox();
    getFPBulan();
    getKontribusi();
    getMargin();
},200)
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

    $('#select-text-fp').text(`${$filter2.toUpperCase()} ${$tahun}`)
    updateAllChart()
    showNotification(`Menampilkan dashboard periode ${$filter2.toUpperCase()} ${$tahun}`);
    $('#detail-dash').hide()
    $('#main-dash').show()
})
// END FILTER EVENT
</script>

<section id="header" class="header" >
    <div class="row">
        <div class="col-9 px-0">
            <div class="row">
                <div id="back-div" class="col-1 pr-0 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11 pr-0" style="padding-right:7em ;">
                    <div id="title-dash" class="title-dash mt-0">Financial Performance</div>
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
            <div class="row" style="padding-left: 1.5rem;">
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
                    <li class="selected py-2" data-filter1="YTM">Year To Month</li>
                    <li class="py-2" data-filter1="PRD">Bulan</li>
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
</section>
<section id="body" class="body">
    <div class="row body-dash row-box" style="position: relative;">
        <div class='col-md-2dot4 col-12 px-1' >
            <div class="card card-dash rounded-lg md-1" >
                <div class="card-body pt-2 ">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">Revenue</span></div>
                        <div id="nilai-revenue" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> RKA</div>
                                <div id="rka-revenue" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> YoY</div>
                                <div id="yoy-revenue" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-revenue" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                            <div id="capai_yoy-revenue" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class='col-md-2dot4 col-12 px-1'>
            <div class="card card-dash rounded-lg " data-box="cogs">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">COGS</span></div>
                        <div id="nilai-cogs" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> RKA</div>
                                <div id="rka-cogs" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> YoY</div>
                                <div id="yoy-cogs" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-cogs" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                            <div id="capai_yoy-cogs" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-2dot4 px-1'>
            <div class="card card-dash rounded-lg " data-box="profit">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">Gross Profit</span></div>
                        <div id="nilai-gross_profit" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> RKA</div>
                                <div id="rka-gross_profit" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> YoY</div>
                                <div id="yoy-gross_profit" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-gross_profit" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                            <div id="capai_yoy-gross_profit" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-2dot4 px-1'>
            <div class="card card-dash rounded-lg " data-box="opex">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">OPEX</span></div>
                        <div id="nilai-opex" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> RKA</div>
                                <div id="rka-opex" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> YoY</div>
                                <div id="yoy-opex" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-opex" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                            <div id="capai_yoy-opex" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-2dot4 px-1'>
            <div class="card card-dash rounded-lg " data-box="income">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">Net Income</span></div>
                        <div id="nilai-net_income" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> RKA</div>
                                <div id="rka-net_income" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style="padding-bottom: 0.5rem; padding-left:1rem;"> YoY</div>
                                <div id="yoy-net_income" style="padding-bottom: 0.5rem;padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-net_income" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
                            <div id="capai_yoy-net_income" class="text-success text-right" style="padding-bottom: 0.5rem;"></div>
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
                    <div id="chart-revenue" style="width:100%; height: calc(82.2vh - 180px); padding-bottom:15px;"></div>
                </div>
            </div>
            {{-- END REVENUE --}}
        </div>
        <div class="col-lg-3 col-md-6 px-1">
            {{-- REVENUE--}}
            <div class="card card-dash rounded-lg" style="padding-left: 1.5em; padding-right:1.5em; padding-top:1em;width:121%; height: calc(83.5vh - 180px)">
                <div class="row"> 
                    <div style="padding-left: 1em;">
                        <select name="nama" id="kode_neraca"></select>
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
            <div class="card card-dash rounded-lg" style="margin-left: 4rem;width:97%; height: calc(83.5vh - 180px)">
                <div class="card-body ">
                    <div class="p-1" style="width:100%; height: calc(78vh - 180px)">
                        <div class="row">
                            <div class="col-12"><b style="font-size: 1rem;">Margin Per Diraktorat</b></div>
                            <div class="col-12"><span style="color: grey;">Pilih Direktorat Untuk Menampilkan</span></div>
                        </div>
                        <div class="table-responsive mt-2" id="div-selisih-cf" style="height:calc(100vh - 180px);position:relative">
                            <style>
                                #margin th
                                {
                                    padding: 2px !important;
                                    color: #d7d7d7;
                                    font-weight:100;
                                }
                                #margin td
                                {
                                    padding: 2px !important;
                                    font-weight:100;
                                }
                            </style>
                            <table class="table table-borderless" id="margin" style="width:100%;">
                                
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END PENGAJUAN --}}
        </div>
    </div>
</section>




