<link rel="stylesheet" href="{{ asset('dash-asset/dash-tarbak/ccr.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-tarbak/global.dekstop.css?version=_').time() }}" />
<script src="{{ asset('main.js?version=_').time() }}"></script>
<script type="text/javascript">
window.scrollTo(0, 0);
var $height = $(window).height();
var $periode_aktif = "{{ intval(substr(Session::get('periode'),4,2)) > 12 ?  substr(Session::get('periode'),0,4).'12' : Session::get('periode') }}"; 
var $height = $(window).height();
var $tahun = parseInt($('#year-filter').text())
var $tahun = $periode_aktif.substr(0,4);
var $filter1 = "Periode";
var $filter2 = namaPeriodeBulan($periode_aktif);
var $month = $periode_aktif.substr(4,2);
var $filter1_kode = "PRD";
var $filter2_kode = $periode_aktif.substr(4,2);
var $filter_kode_lokasi = "";
var $filter_kode_pp = "";
var $filter_kode_param = "";
var $filter_kode_bidang = "";
var piuSaldoChart = null;
var piuUmurChart = null;
var piuKomposisiChart = null;

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
var scrollfilter = document.querySelector('#div-top-piu');
var psscrollfilter = new PerfectScrollbar(scrollfilter,{
    suppressScrollX :true
});

var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
$('#select-text-piu').text(`${nama_filter} ${$filter2} ${$tahun}`);

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
        if(piuSaldoChart != null){
            piuSaldoChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
        if(piuUmurChart != null){
            piuUmurChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
        if(piuKomposisiChart != null){
            piuKomposisiChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
    }else{
        
        console.log('this browser mode');
        var win = $(this); //this = window
        var height = win.height();
        heighChart = (height - 300)/2;
        if(piuUmurChart != null){
            piuUmurChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
        heighChart = (height - 300)/2;
        if(piuSaldoChart != null){
            piuSaldoChart.update({
                chart: {
                    height: heighChart,
                }
            })
        }
        heighChart = (height - 300);
        if(piuKomposisiChart != null){
            piuKomposisiChart.update({
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
    $('#select-text-piu').text(`${nama_filter} ${$filter2} ${$tahun}`);

});

// AJAX FUNCTION GET DATA
(function () {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-piutang-bidang') }}",
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
        url: "{{ url('dash-tarbak-dash/data-piutang-box') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            
            $('#nom-piu').text(`${toMilyar(data.piutang.nominal_tahun_ini,2)}`)
            $('#nom-piu-lalu').text(`${toMilyar(data.piutang.nominal_tahun_lalu,2)}`)
            $('#yoy-piu-percentage').text(`${number_format(data.piutang.yoy_persentase,2)}%`)
            if (data.piutang.yoy_persentase >= 0){
                $('#yoy-piu-percentage').html('<img alt="up-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(data.piutang.yoy_persentase,2)+'%');
                $('#yoy-piu-percentage').addClass('red-text');
                $('#yoy-piu-percentage').removeClass('green-text'); 
            }else{
                
                $('#yoy-piu-percentage').html('<img alt="up-icon" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(data.piutang.yoy_persentase,2)+'%');
                $('#yoy-piu-percentage').addClass('green-text');
                $('#yoy-piu-percentage').removeClass('red-text'); 
            }

            $('#nom-piu-cadangan').text(`${toMilyar(data.cadangan_piutang.nominal_tahun_ini,2)}`)
            $('#nom-piu-cadangan-lalu').text(`${toMilyar(data.cadangan_piutang.nominal_tahun_lalu,2)}`)
            $('#yoy-piu-cadangan-percentage').text(`${number_format(data.cadangan_piutang.yoy_persentase,2)}%`)
            if (data.cadangan_piutang.yoy_persentase >= 0){
                $('#yoy-piu-cadangan-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(data.cadangan_piutang.yoy_persentase,2)+'%');
                $('#yoy-piu-cadangan-percentage').addClass('green-text');
                $('#yoy-piu-cadangan-percentage').removeClass('red-text'); 
            }else{
                
                $('#yoy-piu-cadangan-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-tarbak/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(data.cadangan_piutang.yoy_persentase,2)+'%');
                $('#yoy-piu-cadangan-percentage').addClass('red-text');
                $('#yoy-piu-cadangan-percentage').removeClass('green-text'); 
            }


        }
    });
}

function getTopPiutang(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-piutang-top') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            $('#table-top-piu tbody').html('');
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
                        <td class='text-right'>${toMilyar(line.sak_total,2)}</td>
                    </tr>`;
                }
            }
            $('#table-top-piu tbody').html(html);
        }
    });
}

function getKomposisiPiutang(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-piutang-komposisi') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            piuKomposisiChart = Highcharts.chart('komposisi-piu', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    height: ($height - 300),
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
                    data: result.data
                }]
            }, function() {
                var series = this.series;
                $('.komposisi-legend').html('');
                var html = "";
                for(var i=0;i<series.length;i++) {
                    var point = series[i].data;
                    for(var j=0;j<point.length;j++) {
                        var color = point[j].color;
                        var negative = point[j].negative;
                        if(point[j].key == $filter_kode_param){
                            var select = 'selected-row';
                            var display = 'unset';
                        }else{
                            var select = "";
                            var display = 'none';
                        }
                        if(negative) {
                            point[j].graphic.element.style.fill = 'url(#custom-pattern)'
                            point[j].color = 'url(#custom-pattern)'  
                            point[j].connector.element.style.stroke = 'black'
                            point[j].connector.element.style.strokeDasharray = '4, 4'        
                            html+= '<div class="item td-klik '+select+'"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol"><svg><circle fill="url(#pattern-1)" stroke="black" stroke-width="1" cx="5" cy="5" r="4"></circle><pattern id="pattern-1" patternUnits="userSpaceOnUse" width="10" height="10"><path d="M 0 10 L 10 0 M -1 1 L 1 -1 M 9 11 L 11 9" stroke="#434348" stroke-width="2"></path></pattern>Sorry, your browser does not support inline SVG.</svg> </div><div class="serieName truncate row" style=""><div class="col-5"><div class="glyph-icon simple-icon-check check-row" style="display:'+display+'"></div>' + point[j].name.substring(0,10) + ' : </div><div class="col-7 text-right bold" style="color:#000744">'+toMilyar(point[j].y,2)+'</div></div></div>';                  
                        }else{
                            // if(color == '#7cb5ec') {
                            //     point[j].graphic.element.style.fill = '#000744'
                            //     point[j].connector.element.style.stroke = '#000744'
                            //     html+= '<div class="item td-klik '+select+'"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol" style="background-color:#000744"></div><div class="serieName truncate row" style=""><div class="col-5"><div class="glyph-icon simple-icon-check check-row" style="display:'+display+'"></div> ' + point[j].name.substring(0,10) + ' : </div><div class="col-7 text-right bold">'+toMilyar(point[j].y,2)+'</div></div></div>';
                            // }else{

                            // }
                            point[j].graphic.element.style.fill = color;
                            point[j].connector.element.style.stroke = color;
                            html+= '<div class="item td-klik '+select+'"><p hidden class="td-kode">'+point[j].key+'</p><div class="symbol" style="background-color:'+color+'"></div><div class="serieName truncate row" style=""><div class="col-5"><div class="glyph-icon simple-icon-check check-row" style="display:'+display+'"></div> ' + point[j].name.substring(0,10) + ' : </div><div class="col-7 text-right bold">'+toMilyar(point[j].y,2)+'</div></div></div>';
                        }
                    }
                }
                $('.komposisi-legend').html(html);
            });
        }
    });
}

function getUmurPiutang(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-piutang-umur') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
          
            piuUmurChart = Highcharts.chart('umur-piu', {
                chart: {
                    type: 'column',
                    height: ($height - 300)/2
                },
                title: { text: '' },
                subtitle: { text: '' },
                exporting:{ 
                    enabled: false
                },
                legend: {
                    align: 'right',
                    x: -30,
                    verticalAlign: 'top',
                    y: 0,
                    floating: true,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || 'white',
                    borderColor: '#CCC',
                    borderWidth: 1,
                    shadow: false
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
                    column: {
                        stacking: 'normal',
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
                    },
                    series:{
                        pointWidth: 40
                    }
                    // series: {
                    //     dataLabels: {
                    //         // padding:10,
                    //         allowOverlap:true,
                    //         enabled: true,
                    //         crop: false,
                    //         overflow: 'justify',
                    //         useHTML: true,
                    //         formatter: function () {
                    //             // return toMilyar(this.y,2);
                    //             return $('<div/>').css({
                    //                     // 'color' : 'white', // work
                    //                     'padding': '0 3px',
                    //                     'font-size': '9px',
                    //                     // 'backgroundColor' : this.point.color  // just white in my case
                    //                 }).text(toMilyar(this.point.y,2))[0].outerHTML;
                    //         }
                    //     },
                    //     label: {
                    //         connectorAllowed: true
                    //     },
                    //     marker:{
                    //         enabled:true
                    //     }
                    // }
                },
                series: result.data.series
            });
        }
    });
}

function getSaldoPiutang(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-tarbak-dash/data-piutang-saldo') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            piuSaldoChart = Highcharts.chart('saldo-piu', {
                chart: {
                    type: 'spline',
                    height: ($height - 300)/2
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



var timeoutID = null;
// END FUNCTION GET DATA
</script>

<script type="text/javascript">
document.addEventListener('fullscreenchange', (event) => {
  if (document.fullscreenElement) {
    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);    
  } else {
    $full = '0';
    piuSaldoChart.update({
        title: {
            text: ''
        }
    })

    piuUmurChart.update({
        title: {
            text: ''
        }
    })

    piuKomposisiChart.update({
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
    $('#select-text-piu').text(`${nama_filter} ${$filter2} ${$tahun}`)
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
    $('#select-text-piu').text(`${nama_filter} ${$filter2} ${$tahun}`);
    
    getDataBox({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_pp": $filter_kode_pp,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    var sort = ( $('#sort-top').hasClass('sort-asc') ? 'asc' : 'desc'); 
    getTopPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "sort":sort,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    getSaldoPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_pp": $filter_kode_pp,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    getUmurPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_pp": $filter_kode_pp,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    getKomposisiPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "kode_pp": $filter_kode_pp,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
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

var colors = ['#EEBE00', '#000744'];

$('#export-saldo-piu.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-saldo-piu').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        piuSaldoChart.update({
            title: {
                text: `Pertumbuhan Saldo Piutang 5 Tahun`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        piuSaldoChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        piuSaldoChart.print()
    } else if(jenis == 'Download PNG image') {
        piuSaldoChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Pertumbuhan Saldo Piutang 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        piuSaldoChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Pertumbuhan Saldo Piutang 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        piuSaldoChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Pertumbuhan Saldo Piutang 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        piuSaldoChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Pertumbuhan Saldo Piutang 5 Tahun`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        piuSaldoChart.viewData()
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

$('#export-umur-piu.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-umur-piu').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        
        $full = '2';
        piuUmurChart.update({
            title: {
                text: `Umur Piutang`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        piuUmurChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        piuUmurChart.print()
    } else if(jenis == 'Download PNG image') {
        piuUmurChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Umur Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        piuUmurChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Umur Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        piuUmurChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Umur Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        piuUmurChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Umur Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        piuUmurChart.viewData()
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


$('#export-komposisi-piu.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-komposisi-piu').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        
        $full = '2';
        piuKomposisiChart.update({
            title: {
                text: `Komposisi Piutang`,
                floating: true,
                x: 40,
                y: 20
            }
        })
        piuKomposisiChart.fullscreen.toggle();
    } else if(jenis == 'Print chart') {
        piuKomposisiChart.print()
    } else if(jenis == 'Download PNG image') {
        piuKomposisiChart.exportChart({
            type: 'image/png',
            filename: 'chart-png'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download JPEG image') {
        piuKomposisiChart.exportChart({
            type: 'image/jpeg',
            filename: 'chart-jpg'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download PDF document') {
        piuKomposisiChart.exportChart({
            type: 'application/pdf',
            filename: 'chart-pdf'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'Download SVG vector image') {
        piuKomposisiChart.exportChart({
            type: 'image/svg+xml',
            filename: 'chart-svg'
        }, {
            title: {
                text: `Komposisi Piutang`,
            },
            subtitle: {
                text: ''
            }
        });
    } else if(jenis == 'View table data') {
        $(this).text('Hide table data')
        piuKomposisiChart.viewData()
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

$('#kode_bidang').change(function(){
    $filter_kode_bidang = $(this).val();
    var bidang = ($('#kode_bidang option:selected').text() != "Semua Bidang" ? $('#kode_bidang option:selected').text() : "")
    $('#bidang-title').text(bidang);
    var sort = ( $('#sort-top').hasClass('sort-asc') ? 'asc' : 'desc'); 
    $filter_kode_pp = "";
    timeoutID = null;
    timeoutID = setTimeout(getDataBox.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;
    timeoutID = setTimeout(getTopPiutang.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "sort": sort,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;timeoutID = setTimeout(getKomposisiPiutang.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;
    timeoutID = null;timeoutID = setTimeout(getUmurPiutang.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;
    timeoutID = null;timeoutID = setTimeout(getSaldoPiutang.bind(undefined,{
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    }), 500);
    timeoutID = null;
    if(bidang != ""){
        showNotification(`Menampilkan dashboard `+bidang);
    }
});

$('#sort-top').click(function(){
    if($(this).hasClass('sort-asc')){
        $(this).removeClass('sort-asc')
        $(this).removeClass('red-text')
        $(this).addClass('green-text')
        $(this).addClass('sort-desc')
        $(this).html(`<i class="iconsminds-sync" style="font-size: 16px !important;display: inline-block;transform: rotate(90deg);"></i> Tertinggi`);
        var sort = 'desc'; 
        getTopPiutang({
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
        getTopPiutang({
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
$('#table-top-piu tbody').on('click', 'tr td', function() {
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
            'kode_param': $filter_kode_param,
            "kode_bidang": $filter_kode_bidang
        });
        getSaldoPiutang({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_pp": $filter_kode_pp,
            'kode_param': $filter_kode_param,
            "kode_bidang": $filter_kode_bidang
        });
        getUmurPiutang({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_pp": $filter_kode_pp,
            'kode_param': $filter_kode_param,
            "kode_bidang": $filter_kode_bidang
        });
        getKomposisiPiutang({
            "periode[0]": "=", 
            "periode[1]": $month,
            "tahun": $tahun,
            "jenis": $filter1_kode,
            "kode_pp": $filter_kode_pp,
            'kode_param': $filter_kode_param,
            "kode_bidang": $filter_kode_bidang
        });
    }, 200)
    $('#pp-title').text(pp)
    $('#bidang-title').text('')
    showNotification(`Menampilkan dashboard ${pp}`);
})

$('#table-top-piu tbody').on('click', 'tr.selected-row', function() {
    var table = $(this).parents('table').attr('id')
    $filter_kode_pp="";
    var bidang = ($('#kode_bidang option:selected').text() != "Semua Bidang" ? $('#kode_bidang option:selected').text() : "");
    $(`#${table} tbody tr`).removeClass('selected-row')
    $(`#${table} tbody tr td .check-row`).hide()
    $('#bidang-title').text(bidang)
    getDataBox({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    var sort = ( $('#sort-top').hasClass('sort-asc') ? 'asc' : 'desc'); 
    getTopPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        "sort":sort,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    getSaldoPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    getUmurPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    getKomposisiPiutang({
        "periode[0]": "=", 
        "periode[1]": $month,
        "tahun": $tahun,
        "jenis": $filter1_kode,
        'kode_param': $filter_kode_param,
        "kode_bidang": $filter_kode_bidang
    });
    showNotification(`Menampilkan dashboard Tarbak`);
    
})
// END TABLE TOP EVENT


// LEGEND PARAM EVET
$('.komposisi-legend').on('click', 'div.td-klik', function() {
    var table = '.komposisi-legend';
    var tr = $(this).closest('.td-klik')
    var kode = $(this).closest('.td-klik').find('.td-kode').text()
    var icon = $(this).closest('.td-klik').find('.check-row')
    var tmp = $(this).closest('.td-klik').find('.serieName').text().split(':');
    $(`${table} .check-row`).hide()
    var param = tmp[0];
    $filter_kode_param = kode;
    if($(tr).hasClass('selected-row')) {
        $filter_kode_param="";
        $(`${table} div.td-klik`).removeClass('selected-row');
        getDataBox({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        getSaldoPiutang({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        getTopPiutang({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        getUmurPiutang({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        $('#param-title').text('');
        showNotification(`Menampilkan dashboard YPT`);
        return;
    }else{
        
        icon.show();
        $(`${table} div.td-klik`).removeClass('selected-row')
        $(tr).addClass('selected-row')
        getDataBox({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        getSaldoPiutang({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        getTopPiutang({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        getUmurPiutang({
            'periode[0]': '=',
            'periode[1]': $month,
            'tahun': $tahun,
            'jenis': $filter1_kode,
            'kode_param': $filter_kode_param,
            'kode_pp': $filter_kode_pp,
            'kode_bidang': $filter_kode_bidang,
        });
        
        $('#param-title').text(param);
        showNotification(`Menampilkan dashboard ${param} `);
    }
})

// END LEGEND PARAM EVENT
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
                    <h2 class="title-dash" id="title-dash">Piutang  <span id="piutang-title"></span> <span id="bidang-title"></span> <span id="pp-title"></span> <span id="param-title"></span></h2>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="row">
                <div class="col-12">
                    <div class="select-custom row cursor-pointer border-r-0" id="custom-row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-tarbak/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text-piu" class="select-text">Bulan September {{ date('Y') }}</p>
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
<section id="main-dash" class="mt-20">
    {{-- ROW 1 --}}
    <div id="dekstop-1" class="row dekstop">
        
        <div class="col-6 col-grid">
            <div class="row mb-1">
                <div class="col-6 pl-12 pr-0">
                    <div class="card card-dash border-r-0" style="">
                        <div class="row header-div">
                            <div class="col-12">
                                <h4 class="header-card">Piutang</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <p id="nom-piu" class="main-nominal mb-2">0 M</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-py-2 mb-0" id="table-piutang-yoy">
                                    <tbody>
                                        <tr>
                                            <td class="w-40 pl-0">YoY</td>
                                            <td id="nom-piu-lalu" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="yoy-piu-percentage" class="green-text pr-2 w-30 text-right">
                                                0%
                                            </td>
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
                            <div class="col-12">
                                <h4 class="header-card">Cadangan Piutang</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <p id="nom-piu-cadangan" class="main-nominal mb-2">0 M</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-py-2 mb-0" id="table-piutang-cadangan-yoy">
                                    <tbody>
                                        <tr>
                                            <td class="w-40 pl-0">YoY</td>
                                            <td id="nom-piu-cadangan-lalu" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="yoy-piu-cadangan-percentage" class="green-text pr-2 w-30 text-right">
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
            <div class="row mb-1">
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-dash border-r-0" id="dash-saldo-piu" 
                    style="height:calc((100vh - 250px)/2)">
                        <div class="row header-div" id="card-saldo-piu">
                            <div class="col-9">
                                <h4 class="header-card">Pertumbuhan Saldo Piutang 5 Tahun</h4>
                            </div>
                            <div class="col-3">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                            <div class="menu-chart-custom hidden" id="export-saldo-piu">
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
                        <div id="saldo-piu"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-dash border-r-0" id="dash-umur-piu" 
                    style="height:calc((100vh - 250px)/2)">
                        <div class="row header-div" id="card-umur-piu">
                            <div class="col-9">
                                <h4 class="header-card">Umur Piutang</h4>
                            </div>
                            <div class="col-3">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                            <div class="menu-chart-custom hidden" id="export-umur-piu">
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
                        <div id="umur-piu"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" style="">
                        <div class="row header-div">
                            <div class="col-12">
                                <h4 class="header-card">Beban Cadangan Piutang</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <p id="nom-piu-beban" class="main-nominal mb-2">0 M</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-py-2 mb-0" id="table-piutang-beban-yoy">
                                    <tbody>
                                        <tr>
                                            <td class="w-40 pl-0">YoY</td>
                                            <td id="nom-piu-beban-lalu" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="yoy-piu-beban-percentage" class="green-text pr-2 w-30 text-right">
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
            <div class="row">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-komposisi-piu" 
                    style="height:calc(100vh - 246px)">
                        <div class="row header-div" id="card-komposisi-piu">
                            <div class="col-9">
                                <h4 class="header-card">Komposisi Piutang</h4>
                            </div>
                            <div class="col-3">
                                <div class="glyph-icon simple-icon-menu icon-menu"></div>
                            </div>
                            <div class="menu-chart-custom hidden" id="export-komposisi-piu">
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
                        <div id="komposisi-piu"></div>
                        <div class="komposisi-legend"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" style="">
                        <div class="row header-div">
                            <div class="col-12">
                                <h4 class="header-card">Penghapusan Piutang</h4>
                            </div>
                        </div>
                        <div class="row body-div">
                            <div class="col-12">
                                <p id="nom-piu-hapus" class="main-nominal mb-2">0 M</p>
                            </div>
                            <div class="col-12">
                                <table class="table table-borderless table-py-2 mb-0" id="table-piutang-hapus-yoy">
                                    <tbody>
                                        <tr>
                                            <td class="w-40 pl-0">YoY</td>
                                            <td id="nom-piu-hapus-lalu" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="yoy-piu-hapus-percentage" class="green-text pr-2 w-30 text-right">
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
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-top-piu" style="height:calc(100vh - 246px);">
                        <div class="row header-div px-1" id="card-top">
                            <div class="col-5">
                                <h4 class="header-card">Top Piutang</h4>
                            </div>
                            <div class="col-7 text-right">
                                <a id="sort-top" href='#' class="red-text sort-asc" style="font-size: 16px !important;"><i class="iconsminds-sync" style="font-size: 16px !important;display: inline-block;transform: rotate(90deg);"></i> Terendah</a>
                            </div>
                            <div class="col-12 my-2">
                                <select name="kode_bidang" id="kode_bidang" class="form-control">
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive mt-2" id="div-top-piu" style="height:calc(100vh - 286px);position:relative">
                            <style>
                                #table-top-piu th
                                {
                                    padding: 2px !important;
                                    color: #d7d7d7;
                                    font-weight:100;
                                }
                                #table-top-piu td
                                {
                                    padding: 2px !important;
                                    font-weight:100;
                                }
                            </style>
                            <table class="table table-borderless" id="table-top-piu" style="width:100%;">
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