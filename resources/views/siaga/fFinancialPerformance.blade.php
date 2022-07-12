<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link href="{{ asset('dash-siaga.css?version=_').time() }}"  rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/global.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-telu/dash-pembendaharaan.dekstop.css?version=_').time() }}" />
<style>
    .card-klik,.link-detail {
        cursor: pointer;
    }
</style>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">
$('body').addClass('scroll-hide');
window.scrollTo(0, 0);
var $height = $(window).height();
var chartBulan = null;
var chartContribution = null;
if(typeof $back_dash == 'undefined'){
    $filter_lokasi = "";
    $tahun = "";
    $filter1 = "YTM";
    $filter2 = "";
    $month = "";
    $judulChart = null;
    $filter1_kode = "YTM";
    $filter2_kode = "";
    $filter_kode_klp = "";
    $filter_kode_neraca = "";
}
$filter_kontribusi = "41";


$(window).click(function() {
    $('#filter-box').addClass('hidden')
    $('.menu-chart-custom').addClass('hidden');
});

$('.card-klik').click(function() {
    var kode = $(this).data('box');
    $filter_kode_neraca = kode;
    loadForm("{{ url('/siaga-auth/form/fDetailFinancialPerformance') }}")
});


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

//filter default
(function () {
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-dash/data-fp-default-filter') }}",
        dataType: 'json',
        async: true,
        success:function(result) {
            if(typeof $back_dash == 'undefined'){
                $filter_lokasi = "";
                $tahun = result.periode != "-" ? result.periode.substr(0,4) : "{{ substr(Session::get('periode'),0,4) }}";
                $filter1 = "YTM";
                $filter2 = namaPeriodeBulan(result.periode != "-" ? result.periode : "{{ Session::get('periode') }}");
                $month = result.periode != "-" ? result.periode.substr(4,2) : "{{ substr(Session::get('periode'),4,2) }}";
                $judulChart = null;
                $filter1_kode = "YTM";
                $filter2_kode = result.periode != "-" ? result.periode.substr(4,2) : "{{ substr(Session::get('periode'),4,2) }}";
                $filter_kontribusi = "41";
            }

            $('#year-filter').text($tahun)
            var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
            $('#select-text-fp').text(`${nama_filter} ${$filter2} ${$tahun}`)            

            if($filter1 == 'Periode') {
                $('#list-filter-2').find('.list').each(function() {
                    if($(this).data('bulan').toString() == $month) {
                        $(this).addClass('selected')
                        $month = $(this).data('bulan').toString();
                        return false;
                    }
                });
            }

            setTimeout (function(){
                getDataBox();
                getFPBulan();
                getKontribusi();
                getMargin();
            },100)
        }
    });
})();
//end of filter default

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
            "jenis": $filter1_kode,
            "kode_klp": $filter_kode_klp
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            //Reveneu

            var capai_rka=Math.abs(data.revenue.capai_rka);
            var capai_yoy=Math.abs(data.revenue.capai_yoy);
            if(data.revenue.nilai < data.revenue.rka) {
                $('#capai_rka-revenue').removeClass('green-text').addClass('red-text')
                iconPdptAch = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_rka-revenue').removeClass('red-text').addClass('green-text')
                iconPdptAch = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            if(data.revenue.nilai < data.revenue.yoy) {
                $('#capai_yoy-revenue').removeClass('green-text').addClass('red-text')
                iconPdptYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-revenue').removeClass('red-text').addClass('green-text')
                iconPdptYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-revenue').html(iconPdptAch+' '+number_format(capai_rka,1,1) + '%')
            $('#capai_yoy-revenue').html(iconPdptYoy+' '+number_format(capai_yoy,1,1) + '%')
            $('#nilai-revenue').text(toMilyar(data.revenue.nilai,1,1));
            $('#rka-revenue').text(toMilyar(data.revenue.rka,1,1));
            $('#yoy-revenue').text(toMilyar(data.revenue.yoy,1,1));

            //COGS
            var capai_rka=Math.abs(data.cogs.capai_rka);
            var capai_yoy=Math.abs(data.cogs.capai_yoy);
            if(data.cogs.nilai > data.cogs.rka) {
                $('#capai_rka-cogs').removeClass('green-text').addClass('red-text')
                iconCogsAch = '<img alt="up-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_rka-cogs').removeClass('red-text').addClass('green-text')
                iconCogsAch = '<img alt="down-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }


            if(data.cogs.nilai > data.cogs.yoy) {
                $('#capai_yoy-cogs').removeClass('green-text').addClass('red-text')
                iconCogsYoy = '<img alt="up-icon"  src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-cogs').removeClass('red-text').addClass('green-text')
                iconCogsYoy = '<img alt="down-icon"  src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-cogs').html(iconCogsAch+' '+number_format(capai_rka,1,1) + '%')
            $('#capai_yoy-cogs').html(iconCogsYoy+' '+number_format(capai_yoy,1,1) + '%')
            $('#nilai-cogs').text(toMilyar(data.cogs.nilai,1,1));
            $('#rka-cogs').text(toMilyar(data.cogs.rka,1,1));
            $('#yoy-cogs').text(toMilyar(data.cogs.yoy,1,1));

            //Gross Profit
            var capai_rka=Math.abs(data.gross_profit.capai_rka);
            var capai_yoy=Math.abs(data.gross_profit.capai_yoy);
            if(data.gross_profit.nilai < data.gross_profit.rka) {
                $('#capai_rka-gross_profit').removeClass('green-text').addClass('red-text')
                iconGrossAch = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_rka-gross_profit').removeClass('red-text').addClass('green-text')
                iconGrossAch = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }


            if(data.gross_profit.nilai < data.gross_profit.yoy) {
                $('#capai_yoy-gross_profit').removeClass('green-text').addClass('red-text')
                iconGrossYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-gross_profit').removeClass('red-text').addClass('green-text')
                iconGrossYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-gross_profit').html(iconGrossAch+' '+number_format(capai_rka,1,1) + '%')
            $('#capai_yoy-gross_profit').html(iconGrossYoy+' '+number_format(capai_yoy,1,1) + '%')
            $('#nilai-gross_profit').text(toMilyar(data.gross_profit.nilai,1,1));
            $('#rka-gross_profit').text(toMilyar(data.gross_profit.rka,1,1));
            $('#yoy-gross_profit').text(toMilyar(data.gross_profit.yoy,1,1));
            
            //OPEX
            var capai_rka=Math.abs(data.opex.capai_rka);
            var capai_yoy=Math.abs(data.opex.capai_yoy);
            if(data.opex.nilai > data.opex.rka) {
                $('#capai_rka-opex').removeClass('green-text').addClass('red-text')
                iconOpexAch = '<img alt="up-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_rka-opex').removeClass('red-text').addClass('green-text')
                iconOpexAch = '<img alt="down-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            if(data.opex.nilai > data.opex.yoy) {
                $('#capai_yoy-opex').removeClass('green-text').addClass('red-text')
                iconOpexYoy = '<img alt="up-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-opex').removeClass('red-text').addClass('green-text')
                iconOpexYoy = '<img alt="down-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-opex').html(iconOpexAch+' '+number_format(capai_rka,1,1) + '%')
            $('#capai_yoy-opex').html(iconOpexYoy+' '+number_format(capai_yoy,1,1) + '%')
            $('#nilai-opex').text(toMilyar(data.opex.nilai,1,1));
            $('#rka-opex').text(toMilyar(data.opex.rka,1,1));
            $('#yoy-opex').text(toMilyar(data.opex.yoy,1,1));

            //Net Income
            var capai_rka=Math.abs(data.net_income.capai_rka);
            var capai_yoy=Math.abs(data.net_income.capai_yoy);
            if(data.net_income.nilai < data.net_income.rka) {
                $('#capai_rka-net_income').removeClass('green-text').addClass('red-text')
                iconNetAch = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_rka-net_income').removeClass('red-text').addClass('green-text')
                iconNetAch = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }


            if(data.net_income.nilai < data.net_income.yoy) {
                $('#capai_yoy-net_income').removeClass('green-text').addClass('red-text')
                iconNetYoy = '<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">'
            } else {
                $('#capai_yoy-net_income').removeClass('red-text').addClass('green-text')
                iconNetYoy = '<img alt="down-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">'
            }

            $('#capai_rka-net_income').html(iconNetAch+' '+number_format(capai_rka,1,1) + '%')
            $('#capai_yoy-net_income').html(iconNetYoy+' '+number_format(capai_yoy,1,1) + '%')
            $('#nilai-net_income').text(toMilyar(data.net_income.nilai,1,1));
            $('#rka-net_income').text(toMilyar(data.net_income.rka,1,1));
            $('#yoy-net_income').text(toMilyar(data.net_income.yoy,1,1));
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
            "kode_lokasi": $filter_lokasi,
            "kode_klp": $filter_kode_klp,
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            chartBulan = Highcharts.chart('chart-revenue', {
                chart: {
                    type: 'column',
                    height: ($height - 300)
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
                    title: {
                        text: 'Nilai'
                    },
                    labels: {
                        formatter: function() {
                            return singkatNilai(this.value);
                        }
                    }
                },
                tooltip: {
                    shared: true,
                    useHTML: true,
                    formatter: function() {
                        var s = '<b>'+ this.x +'</b>';
                        
                        $.each(this.points, function(i, point) {
                            s += '<br/><span style="color:'+point.series.color+'">'+ point.series.name +': </span> '+
                                number_format(point.y,2,2) +'';
                        });
                        
                        return s;
                    },
                },
                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },
                series: [
                    {
                        name: 'Pendapatan',
                        data: data.pendapatan,
                        color: '#80b7be',
                    }, {
                        name: 'OPEX',
                        data: data.beban,
                        stack: 'beban+hpp',
                        color: '#fbe697',
                    }, {
                        name: 'HPP',
                        data: data.hpp,
                        stack: 'beban+hpp',
                        color: '#f49b4f',
                    }, {
                        type: 'spline',
                        name: 'NI',
                        data: data.net_income,
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
        "kode_klp": $filter_kode_klp
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
            "kode_klp": $filter_kode_klp
        },
        dataType: 'json',
        async: true,
        success:function(result){
            var data = result.data;
            chartContribution = Highcharts.chart('chart-contribusi', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    height: ($height - 400)
                },
                title: {
                    text: ''
                },
                tooltip: {
                    useHTML: true,
                    formatter:function(){
                        return '<span>'+this.series.name+'</span><br>'+this.point.name+' : <b>'+number_format(this.y)+'<br/>'+number_format(this.percentage,2,2)+'%</b>';
                    }
                },
                credits: {
                    enabled: false
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
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            distance: -30,
                            useHTML: true,
                            align: 'left',
                            formatter: function () {
                                return $('<div/>').css({
                                    'padding': '0 3px',
                                    'font-size': '9px',
                                    'borderColor': 'white'
                                }).html('<b>'+this.point.name+'</b><br>'+number_format(this.point.percentage,2,2)+' %')[0].outerHTML
                            }
                        },
                        showInLegend: false
                    }
                },
                series: [
                    {
                        name: 'Share',
                        colorByPoint: true,
                        minPointSize: 90,
                        innerSize: '30%',
                        zMin: 0,
                        data: data
                    }
                ]
            },function() {
                var series = this.series;
                $('.contribution-legend').html('');
                var html = "";
                for(var i=0;i<series.length;i++) {
                    var point = series[i].data;
                    for(var j=0;j<point.length;j++) {
                        var color = point[j].color;
                        var negative = point[j].negative;
                        // if(point[j].key == $filter_kode_lokasi){
                        //     var select = 'selected-row';
                        //     var display = 'unset';
                        // }else{
                        // }
                        var select = "";
                        var display = 'none';
                        if(negative) {
                            point[j].graphic.element.style.fill = 'url(#custom-pattern)'
                            point[j].color = 'url(#custom-pattern)'  
                            // point[j].connector.element.style.stroke = 'black'
                            // point[j].connector.element.style.strokeDasharray = '4, 4'        
                            html+= '<div class="item td-klik '+select+'"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol"><svg style="height: 50px;"><circle fill="url(#pattern-1)" stroke="black" stroke-width="1" cx="5" cy="5" r="4"></circle><pattern id="pattern-1" patternUnits="userSpaceOnUse" width="10" height="10"><path d="M 0 10 L 10 0 M -1 1 L 1 -1 M 9 11 L 11 9" stroke="#434348" stroke-width="2"></path></pattern>Sorry, your browser does not support inline SVG.</svg> </div><div class="serieName truncate row" style=""><div class="col-5"><div class="glyph-icon simple-icon-check check-row" style="display:'+display+'"></div>' + point[j].name.substring(0,10) + ' : </div><div class="col-7 text-right bold" style="color:#830000">'+toMilyar(point[j].y,2,2)+'</div></div></div>';                  
                        }else{
                            point[j].graphic.element.style.fill = color;
                            // point[j].connector.element.style.stroke = color;
                            html+= '<div class="item td-klik '+select+'"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol" style="background-color:'+color+'"></div><div class="serieName truncate row" style=""><div class="col-5"><div class="glyph-icon simple-icon-check check-row" style="display:'+display+'"></div> ' + point[j].name.substring(0,10) + ' : </div><div class="col-7 text-right bold">'+toMilyar(point[j].y,2,2)+'</div></div></div>';
                        }
                    }
                }
                $('.contribution-legend').html(html);
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
                    if(line.kode_klp == $filter_kode_klp){
                        var select = "class='selected-row'";
                        var display = 'inline';
                    }else{
                        if($filter_kode_klp == "" && line.kode_klp == "TOTAL"){
                            var select = "class='selected-row'";
                            var display = 'inline';
                        }else{
                            var select = "";
                            var display = 'none';
                        }
                    }
                    var persen = parseFloat(line.revenue) != 0 ? ((parseFloat(line.revenue)-parseFloat(line.cogs))/parseFloat(line.revenue))*100 : 0;
                    html+=`
                    <tr ${select}>
                        <td ><p class="kode hidden">${line.kode_klp}</p>
                            <span class="nama-klp">${line.nama}</span></td>
                        <td class='text-right'>${number_format(persen,2,2)}%</td>
                        
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
    var nama_klp = $(this).closest('tr').find('td:first').find('.nama-lokasi').text()
    if(kode == 'TOTAL'){
        $filter_kode_klp = "";
    }else{

        $filter_kode_klp = $(this).closest('tr').find('td:first').find('.kode').text()
    }
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
    // $('#lokasi-title').text(lokasi)
    showNotification(`Menampilkan dashboard ${nama_klp}`);
})

$('#margin tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    $filter_kode_klp="";
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    // $('#lokasi-title').text('YPT')
    getDataBox();
    getFPBulan();
    getKontribusi();
    getMargin();
    showNotification(`Menampilkan dashboard YPT`);
})
// END TABLE TOP EVENT

$(window).on('resize', function(){
    var win = $(this); //this = window
    var $height = win.height();

    if(chartBulan != null ){
        chartBulan.update({
            chart: {
                height: ($height - 300),
            }
        })
    }
    
    if(chartContribution != null ){
        chartContribution.update({
            chart: {
                height: ($height - 400),
            }
        })
    }
});
</script>


<script type="text/javascript">
    // FILTER EVENT
    // KURANG TAHUN FILTER
    $('#kurang-tahun').click(function(event) {
        event.stopPropagation();
        $tahun = parseInt($tahun) - 1;
        $('#year-filter').text($tahun);
    })

    // TAMBAH TAHUN FILTER
    $('#tambah-tahun').click(function(event) {
        event.stopPropagation();
        $tahun = parseInt($tahun) + 1;
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
        <div class="col-3 pl-1 pr-0">
            <div class="row pr-4 pl-2">
                <div class="card card-dash rounded-lg" style="padding-left: 1em; padding-right:0.5em; padding-top:1em;width: 100%;">
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-fp" class="select-text">Bulan Juni {{ date('Y') }}</p>
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
            <div class="card card-dash card-klik rounded-lg md-1" data-box="41">
                <div class="card-body pt-2 ">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">Revenue</span></div>
                        <div id="nilai-revenue" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style=" padding-left:1rem;"> RKA</div>
                                <div id="rka-revenue" style="padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style=" padding-left:1rem;"> YoY</div>
                                <div id="yoy-revenue" style="padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-revenue" class="green-text text-right" style=""></div>
                            <div id="capai_yoy-revenue" class="green-text text-right" style=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class='col-md-2dot4 col-12 px-1'>
            <div class="card card-dash rounded-lg card-klik" data-box="42">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">COGS</span></div>
                        <div id="nilai-cogs" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style=" padding-left:1rem;"> RKA</div>
                                <div id="rka-cogs" style="padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style=" padding-left:1rem;"> YoY</div>
                                <div id="yoy-cogs" style="padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-cogs" class="green-text text-right" style=""></div>
                            <div id="capai_yoy-cogs" class="green-text text-right" style=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-2dot4 px-1'>
            <div class="card card-dash rounded-lg card-klik" data-box="4T">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">Gross Profit</span></div>
                        <div id="nilai-gross_profit" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style=" padding-left:1rem;"> RKA</div>
                                <div id="rka-gross_profit" style="padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style=" padding-left:1rem;"> YoY</div>
                                <div id="yoy-gross_profit" style="padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-gross_profit" class="green-text text-right" style=""></div>
                            <div id="capai_yoy-gross_profit" class="green-text text-right" style=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-2dot4 px-1'>
            <div class="card card-dash rounded-lg card-klik" data-box="59">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">OPEX</span></div>
                        <div id="nilai-opex" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style=" padding-left:1rem;"> RKA</div>
                                <div id="rka-opex" style="padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style=" padding-left:1rem;"> YoY</div>
                                <div id="yoy-opex" style="padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-opex" class="green-text text-right" style=""></div>
                            <div id="capai_yoy-opex" class="green-text text-right" style=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-2dot4 px-1'>
            <div class="card card-dash rounded-lg card-klik" data-box="74">
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-12"><span style="font-size: 1rem;">Net Income</span></div>
                        <div id="nilai-net_income" class="font-weight-bold mb-1" style="font-size: 1.5rem;padding-left:1rem;">M</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div style=" padding-left:1rem;"> RKA</div>
                                <div id="rka-net_income" style="padding-left:0.2rem;"> M</div>
                            </div>
                            <div class="row">
                                <div style=" padding-left:1rem;"> YoY</div>
                                <div id="yoy-net_income" style="padding-left:0.2rem;"> M</div>
                            </div>
                        </div>
                        <div class="col-6" >
                            <div id="capai_rka-net_income" class="green-text text-right" style=""></div>
                            <div id="capai_yoy-net_income" class="green-text text-right" style=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-5dot4 px-1" >
            {{-- REVENUE--}}
            <div class="card card-dash rounded-lg mb-0">
                <div class="card-body">
                    <div id="chart-revenue" style="width:100%; height: calc(100vh - 290px);"></div>
                </div>
            </div>
            {{-- END REVENUE --}}
        </div>
        <div class="col-md-3dot4 px-1">
            {{-- REVENUE--}}
            <div class="card card-dash rounded-lg px-3 py-2 mb-0" style="height: calc(100vh - 280px)">
                <div class="row"> 
                    <div style="padding-left: 1em;">
                        <select name="nama" id="kode_neraca"></select>
                    </div>
                </div>
                <div class="card-body">
                    <div id="chart-contribusi" style="width:100%; height: calc(100vh - 400px)"></div>
                    <div class="contribution-legend" style="height: 80px;overflow-y:scroll;overflow-x:hidden">

                    </div>
                </div>
            </div>
            {{-- END REVENUE --}}
        </div>
        
        <div class="col-md-2dot4 px-1">
            {{-- PENGAJUAN--}}
            <div class="card card-dash rounded-lg mb-0" style="height: calc(100vh - 280px)">
                <div class="card-body ">
                    <div class="p-1" style="width:100%;">
                        <div class="row">
                            <div class="col-12"><b style="font-size: 1rem;">Margin Per Portofolio</b></div>
                            <div class="col-12"><span style="color: grey;">Pilih Portofolio Untuk Menampilkan</span></div>
                        </div>
                        <div class="table-responsive mt-2" id="div-margin" style="height:calc(100vh - 370px);position:relative">
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




