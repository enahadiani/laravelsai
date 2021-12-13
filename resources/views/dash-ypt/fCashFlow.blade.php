<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/cf.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />

<script src="{{ asset('main.js?version=_').time() }}"></script>
<script type="text/javascript">
var $filter_kode_lokasi = "";
var $tahun = parseInt($('#year-filter').text())
var $filter1 = "Periode";
var $filter2 = "September";
var $month = "09";
var $filter1_kode = "PRD";
var $filter2_kode = "09";
var trendChart = null;

var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
$('#select-text-cf').text(`${nama_filter} ${$filter2} ${$tahun}`);

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
        console.log(height);
        heighChart = height;
        if(trendChart != null){
            trendChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
    }else{
        
        console.log('this browser mode');
        heighChart = 400;
        if(trendChart != null){
            trendChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
    }
});

$(window).click(function() {
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
});

document.addEventListener('fullscreenchange', (event) => {
  if (document.fullscreenElement) {
    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
  } else {
    $full = '0';
    trendChart.update({
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
});

$('#tambah-tahun').click(function(event) {
    event.stopPropagation();
    $tahun = $tahun + 1;
    $('#year-filter').text($tahun);
});

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
});

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
    $('#select-text-cf').text(`${nama_filter} ${$filter2} ${$tahun}`)
})

$('#list-filter-2').on('click', 'div', function(event) {
    event.stopPropagation();
    filter = $(this).data('bulan') 
    
    $filter2 = filter
    $filter2_kode = $(this).data('bulan')
    $('#list-filter-2 div').not(this).removeClass('selected')
    $(this).addClass('selected')
    $('#filter-box').addClass('hidden')

    $filter2 = getNamaBulan($filter2)

    var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
    $('#select-text-cf').text(`${nama_filter} ${$filter2} ${$tahun}`)

    getDataBox()
    getCFChart()
    showNotification(`Menampilkan dashboard periode ${nama_filter} ${$filter2} ${$tahun}`);
});

$('.icon-menu').click(function(event) {
    event.stopPropagation()
    var parentID = $(this).parents('.header-div').attr('id')
    $('#'+parentID).find('.menu-chart-custom').removeClass('hidden')

    if(parentID == 'card-piutang' || parentID == 'card-soakhir') {
        $("body").css("overflow", "scroll");
    } else {
        $("body").css("overflow", "hidden");
    }
});

// RUN FUNC IF FIRST RENDER
// DATA BOX
(function() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-box') }}",
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
            var inflow = 0;
            var outflow = 0;
            var balance = 0;
            var closing = 0;
            var inflow_yoy = 0;
            var outflow_yoy = 0;
            var balance_yoy = 0;
            var closing_yoy = 0;

            if(data.inflow.nominal.toString().length <= 9) {
                inflow = toJuta(data.inflow.nominal,2)
            } else {
                inflow = toMilyar(data.inflow.nominal,2)
            }

            if(data.inflow.yoy.toString().length <= 9) {
                inflow_yoy = toJuta(data.inflow.yoy,2)
            } else {
                inflow_yoy = toMilyar(data.inflow.yoy,2)
            }

            var per_inflow_yoy = (data.inflow.yoy != 0 ? (data.inflow.nominal - data.inflow.yoy)/ data.inflow.yoy : 0) * 100;
                        

            if(data.outflow.nominal.toString().length <= 9) {
                outflow = toJuta(data.outflow.nominal,2)
            } else {
                outflow = toMilyar(data.outflow.nominal,2)
            }

            if(data.outflow.yoy.toString().length <= 9) {
                outflow_yoy = toJuta(data.outflow.yoy,2)
            } else {
                outflow_yoy = toMilyar(data.outflow.yoy,2)
            }
            
            var per_outflow_yoy = (data.outflow.yoy != 0 ? (data.outflow.nominal - data.outflow.yoy)/ data.outflow.yoy : 0) * 100;
            

            if(data.cash_balance.nominal.toString().length <= 9) {
                balance = toJuta(data.cash_balance.nominal,2)
            } else {
                balance = toMilyar(data.cash_balance.nominal,2)
            }
            
            if(data.cash_balance.yoy.toString().length <= 9) {
                balance_yoy = toJuta(data.cash_balance.yoy,2)
            } else {
                balance_yoy = toMilyar(data.cash_balance.yoy,2)
            }
            var per_balance_yoy = (data.cash_balance.yoy != 0 ? (data.cash_balance.nominal - data.cash_balance.yoy)/ data.cash_balance.yoy : 0) * 100;

            if(data.closing.nominal.toString().length <= 9) {
                closing = toJuta(data.closing.nominal,2)
            } else {
                closing = toMilyar(data.closing.nominal,2)
            }

            if(data.closing.yoy.toString().length <= 9) {
                closing_yoy = toJuta(data.closing.yoy,2)
            } else {
                closing_yoy = toMilyar(data.closing.yoy,2)
            }

            var per_closing_yoy = (data.closing.yoy != 0 ? (data.closing.nominal - data.closing.yoy)/ data.closing.yoy : 0) * 100;

            $('#cf-inflow').text(inflow)
            $('#cf-outflow').text(outflow)
            $('#cf-balance').text(balance)
            $('#cf-closing').text(closing)
            
            $('#cf-inflow-yoy').text(inflow_yoy)
            $('#cf-outflow-yoy').text(outflow_yoy)
            $('#cf-balance-yoy').text(balance_yoy)
            $('#cf-closing-yoy').text(closing_yoy)

            if(per_inflow_yoy < 0){
                $('#inflow-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_inflow_yoy,2)+'%')
                $('#inflow-yoy-percentage').addClass('red-text');
                $('#inflow-yoy-percentage').removeClass('green-text');
            }else{
                $('#inflow-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_inflow_yoy,2)+'%')
                $('#inflow-yoy-percentage').addClass('green-text');
                $('#inflow-yoy-percentage').removeClass('red-text');
            }
            if(per_outflow_yoy < 0){
                $('#outflow-yoy-percentage').html('<img alt="up-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_outflow_yoy,2)+'%')
                $('#outflow-yoy-percentage').addClass('green-text');
                $('#outflow-yoy-percentage').removeClass('red-text');
            }else{
                $('#outflow-yoy-percentage').html('<img alt="up-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_outflow_yoy,2)+'%')
                $('#outflow-yoy-percentage').addClass('red-text');
                $('#outflow-yoy-percentage').removeClass('green-text');
            }
            if(per_balance_yoy < 0){
                $('#balance-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_balance_yoy,2)+'%')
                $('#balance-yoy-percentage').addClass('red-text');
                $('#balance-yoy-percentage').removeClass('green-text');
            }else{
                $('#balance-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_balance_yoy,2)+'%')
                $('#balance-yoy-percentage').addClass('green-text');
                $('#balance-yoy-percentage').removeClass('red-text');
            }
            if(per_closing_yoy < 0){
                $('#closing-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_closing_yoy,2)+'%')
                $('#closing-yoy-percentage').addClass('red-text');
                $('#closing-yoy-percentage').removeClass('green-text');
            }else{
                $('#closing-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_closing_yoy,2)+'%')
                $('#closing-yoy-percentage').addClass('green-text');
                $('#closing-yoy-percentage').removeClass('red-text');
            }
        }
    });
})();
// END DATA BOX
// CF CHART
(function() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-chart-bulanan') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            trendChart = Highcharts.chart('trend-chart', {
                chart: {
                    height: 450,
                    // width: 600
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
                    verticalAlign: 'bottom' 
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
                    }
                },
                series: data.series
            });
        }
    });
})();

// END CF CHART
(function(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-selisih') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            $('#table-selisih-cf tbody').html('');
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
                        <td ><p class="kode hidden">${line.kode_lokasi}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display:${display}"></div>
                            <span class="nama-lokasi">${line.skode}</span></td>
                        <td class='text-right'>${toMilyar(line.mutasi,1)}</td>
                    </tr>`;
                }
            }
            $('#table-selisih-cf tbody').html(html);
        }
    });
})();
// SELISIH

// END SELISIH
// END RUN FUNC IF FIRST RENDER

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

// UPDATE DATA
// RUN FUNC IF FIRST RENDER
// DATA BOX
function getDataBox(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-box') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_lokasi": $filter_kode_lokasi
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            var inflow = 0;
            var outflow = 0;
            var balance = 0;
            var closing = 0;
            var inflow_yoy = 0;
            var outflow_yoy = 0;
            var balance_yoy = 0;
            var closing_yoy = 0;

            if(data.inflow.nominal.toString().length <= 9) {
                inflow = toJuta(data.inflow.nominal,2)
            } else {
                inflow = toMilyar(data.inflow.nominal,2)
            }

            if(data.inflow.yoy.toString().length <= 9) {
                inflow_yoy = toJuta(data.inflow.yoy,2)
            } else {
                inflow_yoy = toMilyar(data.inflow.yoy,2)
            }

            var per_inflow_yoy = (data.inflow.yoy != 0 ? (data.inflow.nominal - data.inflow.yoy)/ data.inflow.yoy : 0) * 100;
                        

            if(data.outflow.nominal.toString().length <= 9) {
                outflow = toJuta(data.outflow.nominal,2)
            } else {
                outflow = toMilyar(data.outflow.nominal,2)
            }

            if(data.outflow.yoy.toString().length <= 9) {
                outflow_yoy = toJuta(data.outflow.yoy,2)
            } else {
                outflow_yoy = toMilyar(data.outflow.yoy,2)
            }
            
            var per_outflow_yoy = (data.outflow.yoy != 0 ? (data.outflow.nominal - data.outflow.yoy)/ data.outflow.yoy : 0) * 100;
            

            if(data.cash_balance.nominal.toString().length <= 9) {
                balance = toJuta(data.cash_balance.nominal,2)
            } else {
                balance = toMilyar(data.cash_balance.nominal,2)
            }
            
            if(data.cash_balance.yoy.toString().length <= 9) {
                balance_yoy = toJuta(data.cash_balance.yoy,2)
            } else {
                balance_yoy = toMilyar(data.cash_balance.yoy,2)
            }
            var per_balance_yoy = (data.cash_balance.yoy != 0 ? (data.cash_balance.nominal - data.cash_balance.yoy)/ data.cash_balance.yoy : 0) * 100;

            if(data.closing.nominal.toString().length <= 9) {
                closing = toJuta(data.closing.nominal,2)
            } else {
                closing = toMilyar(data.closing.nominal,2)
            }

            if(data.closing.yoy.toString().length <= 9) {
                closing_yoy = toJuta(data.closing.yoy,2)
            } else {
                closing_yoy = toMilyar(data.closing.yoy,2)
            }

            var per_closing_yoy = (data.closing.yoy != 0 ? (data.closing.nominal - data.closing.yoy)/ data.closing.yoy : 0) * 100;

            $('#cf-inflow').text(inflow)
            $('#cf-outflow').text(outflow)
            $('#cf-balance').text(balance)
            $('#cf-closing').text(closing)
            
            $('#cf-inflow-yoy').text(inflow_yoy)
            $('#cf-outflow-yoy').text(outflow_yoy)
            $('#cf-balance-yoy').text(balance_yoy)
            $('#cf-closing-yoy').text(closing_yoy)

            if(per_inflow_yoy < 0){
                $('#inflow-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_inflow_yoy,2)+'%')
                $('#inflow-yoy-percentage').addClass('red-text');
                $('#inflow-yoy-percentage').removeClass('green-text');
            }else{
                $('#inflow-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_inflow_yoy,2)+'%')
                $('#inflow-yoy-percentage').addClass('green-text');
                $('#inflow-yoy-percentage').removeClass('red-text');
            }
            if(per_outflow_yoy < 0){
                $('#outflow-yoy-percentage').html('<img alt="up-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_outflow_yoy,2)+'%')
                $('#outflow-yoy-percentage').addClass('green-text');
                $('#outflow-yoy-percentage').removeClass('red-text');
            }else{
                $('#outflow-yoy-percentage').html('<img alt="up-icon" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_outflow_yoy,2)+'%')
                $('#outflow-yoy-percentage').addClass('red-text');
                $('#outflow-yoy-percentage').removeClass('green-text');
            }
            if(per_balance_yoy < 0){
                $('#balance-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_balance_yoy,2)+'%')
                $('#balance-yoy-percentage').addClass('red-text');
                $('#balance-yoy-percentage').removeClass('green-text');
            }else{
                $('#balance-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_balance_yoy,2)+'%')
                $('#balance-yoy-percentage').addClass('green-text');
                $('#balance-yoy-percentage').removeClass('red-text');
            }
            if(per_closing_yoy < 0){
                $('#closing-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(per_closing_yoy,2)+'%')
                $('#closing-yoy-percentage').addClass('red-text');
                $('#closing-yoy-percentage').removeClass('green-text');
            }else{
                $('#closing-yoy-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(per_closing_yoy,2)+'%')
                $('#closing-yoy-percentage').addClass('green-text');
                $('#closing-yoy-percentage').removeClass('red-text');
            }
        }
    });
}
// END DATA BOX
// CF CHART
function getCFChart() {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-chart-bulanan') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "kode_lokasi": $filter_kode_lokasi
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            trendChart = Highcharts.chart('trend-chart', {
                chart: {
                    height: 450,
                    // width: 600
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
                    verticalAlign: 'bottom' 
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
                        },
                    }
                },
                series: data.series
            });
        }
    });
}
// END CF CHART

function getSelisih(){
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-cf-selisih') }}",
        data: {
            "periode[0]": "=", 
            "periode[1]": $filter2_kode,
            "tahun": $tahun,
            "jenis": $filter1_kode
        },
        dataType: 'json',
        async: true,
        success:function(result) {
            $('#table-selisih-cf tbody').html('');
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
                        <td ><p class="kode hidden">${line.kode_lokasi}</p>
                            <div class="glyph-icon simple-icon-check check-row" style="display:${display}"></div>
                            <span class="nama-lokasi">${line.skode}</span></td>
                        <td class='text-right'>${toMilyar(line.mutasi,1)}</td>
                    </tr>`;
                }
            }
            $('#table-selisih-cf tbody').html(html);
        }
    });
}
// END RUN FUNC IF FIRST RENDER
// 


// TABLE TOP EVET
$('#table-selisih-cf tbody').on('click', 'tr td', function() {
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
        getCFChart();
    }, 200)
    $('#lokasi-title').text(lokasi)
    showNotification(`Menampilkan dashboard ${lokasi}`);
})

$('#table-selisih-cf tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    $filter_kode_lokasi="";
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    $('#lokasi-title').text('YPT')
    getDataBox();
    getCFChart();
    getSelisih();
    showNotification(`Menampilkan dashboard YPT`);
})
// END TABLE TOP EVENT


// EXPORT HIGHCHART EVENT
$('#export-trend.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-trend').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        trendChart.update({
            title: {
                text: `Trend Arus Kas`,
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
                text: `Trend Arus Kas`,
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
                text: `Trend Arus Kas`,
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
                text: `Trend Arus Kas`,
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
                text: `Trend Arus Kas`,
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
// END EXPORT HIGHCHART EVENT
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
                    <h2 class="title-dash" id="title-dash">Arus Kas <span class="lokasi-title"></span></h2>
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
                            <p id="select-text-cf" class="select-text">Bulan September {{ date('Y') }}</p>
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
                        {{-- <li class="selected" data-filter1="TRW">Triwulan</li> --}}
                        {{-- <li data-filter1="SMT">Semester</li> --}}
                        <li class="py-2" data-filter1="YTM">Year To Month</li>
                        <li class="selected py-2" data-filter1="PRD">Bulan</li>
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

{{-- CONTENT MAIN --}}
<section id="main-dash" class="mt-20 pb-24">
    {{-- ROW 1 --}}
    <div id="dekstop-1" class="row dekstop">
        <div class="col-3 pl-12 pr-0">
            <div class="card card-dash border-r-0">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Uang Masuk</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-inflow" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-inflow">
                            <tbody>
                                <tr>
                                    <td class="w-40">MoM Growth</td>
                                    <td id="cf-inflow-mom" class="w-30 text-right">0 M</td>
                                    <td id="inflow-mom-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-40">YoY Growth</td>
                                    <td id="cf-inflow-yoy" class="w-30 text-right">0 M</td>
                                    <td id="inflow-yoy-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
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
                        <h4 class="header-card">Uang Keluar</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-outflow" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-outflow">
                            <tbody>
                                <tr>
                                    <td class="w-40">MoM Growth</td>
                                    <td id="cf-outflow-mom" class="w-30 text-right">0 M</td>
                                    <td id="outflow-mom-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-40">YoY Growth</td>
                                    <td id="cf-outflow-yoy" class="w-30 text-right">0 M</td>
                                    <td id="outflow-yoy-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
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
                        <h4 class="header-card">Selisih</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-balance" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-balance">
                            <tbody>
                                <tr>
                                    <td class="w-40">MoM Growth</td>
                                    <td id="cf-balance-mom" class="w-30 text-right">0 M</td>
                                    <td id="balance-mom-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-40">YoY Growth</td>
                                    <td id="cf-balance-yoy" class="w-30 text-right">0 M</td>
                                    <td id="balance-yoy-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
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
                        <h4 class="header-card">Saldo Akhir</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-closing" class="main-nominal">0</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-closing">
                            <tbody>
                                <tr>
                                    <td class="w-40">MoM Growth</td>
                                    <td id="cf-closing-mom" class="w-30 text-right">0 M</td>
                                    <td id="closing-mom-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-40">YoY Growth</td>
                                    <td id="cf-closing-yoy" class="w-30 text-right">0 M</td>
                                    <td id="closing-yoy-percentage" class="green-text pr-0 w-30 text-right">
                                        0%
                                    </td>
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
        <div class="col-9 pl-12 pr-0">
            <div class="card card-dash border-r-0" id="dash-trend">
                <div class="row header-div" id="card-trend">
                    <div class="col-8">
                        <h4 class="header-card">Trend Arus Kas</h4>
                    </div>
                    <div class="col-4">
                        <div class="row justify-content-end">
                            <div class="col-4 pr-0">
                                <label class="label-checkbox float-right">
                                    <input type="radio" checked="checked" name="trend">
                                    <span class="text">Bulanan</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-2">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
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
                </div>
                <div id="trend-chart"></div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash border-r-0" id="dash-selisih" style="height:calc(100vh - 147px);">
                <div class="row header-div px-1" id="card-selisih">
                    <div class="col-12">
                        <h4 class="header-card">Selisih Tiap Lembaga</h4>
                    </div>
                </div>
                <div class="table-responsive mt-2" id="div-selisih-cf" style="height:calc(100vh - 180px);position:relative">
                    <style>
                        #table-selisih-cf th
                        {
                            padding: 2px !important;
                            color: #d7d7d7;
                            font-weight:100;
                        }
                        #table-selisih-cf td
                        {
                            padding: 2px !important;
                            font-weight:100;
                        }
                    </style>
                    <table class="table table-borderless" id="table-selisih-cf" style="width:100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:55%">Lembaga</th>
                                <th class="text-center" style="width:45%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}
</section>
{{-- END CONTENT MAIN --}}
