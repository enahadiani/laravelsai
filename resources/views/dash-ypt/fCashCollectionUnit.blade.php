<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/ccr-unit.dekstop.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/global.dekstop.css?version=_').time() }}" />
<script src="{{ asset('main.js?version=_').time() }}"></script>

<script type="text/javascript">
window.scrollTo(0, 0);
var $height = $(window).height();
var $tahun = parseInt($('#year-filter').text())
var $tahun = "{{ substr(Session::get('periode'),0,4) }}";
var $filter1 = "Periode";
var $filter2 = namaPeriodeBulan("{{ Session::get('periode') }}");
var $month = "{{ substr(Session::get('periode'),4,2) }}";
var $filter1_kode = "PRD";
var $filter2_kode = "{{ substr(Session::get('periode'),4,2) }}";
var $filter_lokasi = "";
var $filter_kode_pp = "{{ Session::get('kodePP') }}";
var $filter_kode_bidang = "{{ Session::get('kodeBidang') }}" == "4" || "{{ Session::get('kodeBidang') }}" == 5 ? "GB" : "{{ Session::get('kodeBidang') }}";
var $filter_jenis_ccr = "";
var $ccr_trend_header = "CCR YTM";
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

var nama_filter = ($filter1_kode == 'PRD' ? 'Bulan' : $filter1_kode);
$('#select-text-ccr').text(`${nama_filter} ${$filter2} ${$tahun}`);
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
    if($full == '2'){
        // console.log('this fullscreen mode');
        var height = screen.height;
        // console.log(height);
        heighChart = height;
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
    }else{
        
        // console.log('this browser mode');
        var win = $(this); //this = window
        var height = win.height();
        // console.log(height);
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
    $('#select-text-ccr').text(`${nama_filter} ${$filter2} ${$tahun}`);
});

// AJAX FUNCTION GET DATA

function getDataBox(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-unit-box') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            var data = result.data;
            $('#ccr-all').text(`${number_format(data.ccr_total.persentase,2)}%`)
            $('#ccr-prev').text(`${number_format(data.ccr_tahun_lalu.persentase,2)}%`)
            $('#ccr-now').text(`${number_format(data.ccr_tahun_ini.persentase,2)}%`)
            if( parseFloat(data.ccr_total.persentase) >= 51 && parseFloat(data.ccr_total.persentase) <= 84){
                $('#ccr-all').addClass('orange-text');
                $('#ccr-all').removeClass('green-text');
                $('#ccr-all').removeClass('red-text');             
            }else if (parseFloat(data.ccr_total.persentase) >= 85){
                $('#ccr-all').addClass('green-text');
                $('#ccr-all').removeClass('red-text');
                $('#ccr-all').removeClass('orange-text'); 
            }else if (parseFloat(data.ccr_total.persentase) <= 50){
                $('#ccr-all').addClass('red-text');
                $('#ccr-all').removeClass('green-text');
                $('#ccr-all').removeClass('orange-text');   
            }

            if( parseFloat(data.ccr_tahun_ini.persentase) >= 51 && parseFloat(data.ccr_tahun_ini.persentase) <= 84){
                $('#ccr-now').addClass('orange-text');
                $('#ccr-now').removeClass('green-text');
                $('#ccr-now').removeClass('red-text');             
            }else if (parseFloat(data.ccr_tahun_ini.persentase) >= 85){
                $('#ccr-now').addClass('green-text');
                $('#ccr-now').removeClass('red-text');
                $('#ccr-now').removeClass('orange-text'); 
            }else if (parseFloat(data.ccr_tahun_ini.persentase) <= 50){
                $('#ccr-now').addClass('red-text');
                $('#ccr-now').removeClass('green-text');
                $('#ccr-now').removeClass('orange-text');   
            }

            if (parseFloat(data.ccr_tahun_lalu.persentase) >= 85){
                $('#ccr-prev').addClass('green-text');
                $('#ccr-prev').removeClass('orange-text'); 
            }else{
                $('#ccr-prev').addClass('orange-text');
                $('#ccr-prev').removeClass('green-text'); 
            }

            var growth_all_yoy_ar =( data.ccr_total.prev_ar != 0 ? ((data.ccr_total.ar - data.ccr_total.prev_ar)/ data.ccr_total.prev_ar)*100 : 0);
            var growth_all_yoy_inf =( data.ccr_total.prev_inflow != 0 ? ((data.ccr_total.inflow - data.ccr_total.prev_inflow)/ data.ccr_total.prev_inflow)*100 : 0);

            if (growth_all_yoy_ar >= 0){
                $('#all-yoy-ar-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(growth_all_yoy_ar,2)+'%');
                $('#all-yoy-ar-percentage').addClass('green-text');
                $('#all-yoy-ar-percentage').removeClass('red-text'); 
            }else{
                
                $('#all-yoy-ar-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(growth_all_yoy_ar,2)+'%');
                $('#all-yoy-ar-percentage').addClass('red-text');
                $('#all-yoy-ar-percentage').removeClass('green-text'); 
            }

            if (growth_all_yoy_inf >= 0){
                
                $('#all-yoy-inf-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(growth_all_yoy_inf,2)+'%');
                $('#all-yoy-inf-percentage').addClass('green-text');
                $('#all-yoy-inf-percentage').removeClass('red-text'); 
            }else{
                $('#all-yoy-inf-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(growth_all_yoy_inf,2)+'%');
                $('#all-yoy-inf-percentage').addClass('red-text');
                $('#all-yoy-inf-percentage').removeClass('green-text'); 
            }

            var growth_now_yoy_ar =( data.ccr_tahun_ini.prev_ar != 0 ? ((data.ccr_tahun_ini.ar - data.ccr_tahun_ini.prev_ar)/ data.ccr_tahun_ini.prev_ar)*100 : 0);
            var growth_now_yoy_inf =( data.ccr_tahun_ini.prev_inflow != 0 ? ((data.ccr_tahun_ini.inflow - data.ccr_tahun_ini.prev_inflow)/ data.ccr_tahun_ini.prev_inflow)*100 : 0);

            if (growth_now_yoy_ar >= 0){
                $('#now-yoy-ar-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(growth_now_yoy_ar,2)+'%');
                $('#now-yoy-ar-percentage').addClass('green-text');
                $('#now-yoy-ar-percentage').removeClass('red-text'); 
            }else{
                
                $('#now-yoy-ar-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(growth_now_yoy_ar,2)+'%');
                $('#now-yoy-ar-percentage').addClass('red-text');
                $('#now-yoy-ar-percentage').removeClass('green-text'); 
            }

            if (growth_now_yoy_inf >= 0){
                
                $('#now-yoy-inf-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(growth_now_yoy_inf,2)+'%');
                $('#now-yoy-inf-percentage').addClass('green-text');
                $('#now-yoy-inf-percentage').removeClass('red-text'); 
            }else{
                $('#now-yoy-inf-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(growth_now_yoy_inf,2)+'%');
                $('#now-yoy-inf-percentage').addClass('red-text');
                $('#now-yoy-inf-percentage').removeClass('green-text'); 
            }

            var growth_prev_yoy_ar =( data.ccr_tahun_lalu.prev_ar != 0 ? ((data.ccr_tahun_lalu.ar - data.ccr_tahun_lalu.prev_ar)/ data.ccr_tahun_lalu.prev_ar)*100 : 0);
            var growth_prev_yoy_inf =( data.ccr_tahun_lalu.prev_inflow != 0 ? ((data.ccr_tahun_lalu.inflow - data.ccr_tahun_lalu.prev_inflow)/ data.ccr_tahun_lalu.prev_inflow)*100 : 0);

            if (growth_prev_yoy_ar >= 0){
                $('#prev-yoy-ar-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(growth_prev_yoy_ar,2)+'%');
                $('#prev-yoy-ar-percentage').addClass('green-text');
                $('#prev-yoy-ar-percentage').removeClass('red-text'); 
            }else{
                
                $('#prev-yoy-ar-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(growth_prev_yoy_ar,2)+'%');
                $('#prev-yoy-ar-percentage').addClass('red-text');
                $('#prev-yoy-ar-percentage').removeClass('green-text'); 
            }

            if (growth_prev_yoy_inf >= 0){
                
                $('#prev-yoy-inf-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-green.png") }}">&nbsp;'+number_format(growth_prev_yoy_inf,2)+'%');
                $('#prev-yoy-inf-percentage').addClass('green-text');
                $('#prev-yoy-inf-percentage').removeClass('red-text'); 
            }else{
                $('#prev-yoy-inf-percentage').html('<img alt="up-icon" class="rotate-360" src="{{ asset("dash-asset/dash-ypt/icon/fi-rr-arrow-small-up-red.png") }}">&nbsp;'+number_format(growth_prev_yoy_inf,2)+'%');
                $('#prev-yoy-inf-percentage').addClass('red-text');
                $('#prev-yoy-inf-percentage').removeClass('green-text'); 
            }


            $('#ccr-all-yoy-ar').text(`${toMilyar(data.ccr_total.prev_ar,2)}`)
            $('#ccr-prev-yoy-ar').text(`${toMilyar(data.ccr_tahun_lalu.prev_ar,2)}`)
            $('#ccr-now-yoy-ar').text(`${toMilyar(data.ccr_tahun_ini.prev_ar,2)}`)
            $('#ccr-all-ar').text(`${toMilyar(data.ccr_total.ar,2)}`)
            $('#ccr-prev-ar').text(`${toMilyar(data.ccr_tahun_lalu.ar,2)}`)
            $('#ccr-now-ar').text(`${toMilyar(data.ccr_tahun_ini.ar,2)}`)

            
            $('#ccr-all-yoy-inf').text(`${toMilyar(data.ccr_total.prev_inflow,2)}`)
            $('#ccr-prev-yoy-inf').text(`${toMilyar(data.ccr_tahun_lalu.prev_inflow,2)}`)
            $('#ccr-now-yoy-inf').text(`${toMilyar(data.ccr_tahun_ini.prev_inflow,2)}`)
            $('#ccr-all-inflow').text(`${toMilyar(data.ccr_total.inflow,2)}`)
            $('#ccr-prev-inflow').text(`${toMilyar(data.ccr_tahun_lalu.inflow,2)}`)
            $('#ccr-now-inflow').text(`${toMilyar(data.ccr_tahun_ini.inflow,2)}`)
        }
    });
}

function getTrendCCR(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-unit-trend') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            /* trendChart = Highcharts.chart('trend-ccr', {
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
            /*/
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            trendChart = Highcharts.chart('trend-ccr', {
                chart: {
                    type: 'column',
                    height: ($height - 200)/2
                },
                credits:{
                    enabled:false
                },
                exporting:{
                    enabled:false
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: result.data.kategori,
                    // labels: {
                    //     useHTML:true,
                    //     formatter: function() {
                    //         var tmp = this.value.split("|");
                    //         return '<p class="mb-0"><span class="text-center" style="display:inherit">'+tmp[0]+'</span><span class="text-center bold" style="display:inherit">'+sepNum(tmp[1])+'%</span></p>';
                    //     },
                    // }
                },
                yAxis: {
                    title:'',
                    min: 0,
                    tickInterval: 10,
                    max: 110
                },
                tooltip: {
                    formatter: function () {   
                        var tmp = this.x.split("|");   
                        return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + number_format(this.y,2);
                    }
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        borderWidth: 0,
                        pointWidth: 50,
                        dataLabels: {
                            // padding:10,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'justify',
                            useHTML: true,
                            formatter: function () {
                                if(this.y < 0.1 || this. y >= 100){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(number_format(this.point.y,2)+'%')[0].outerHTML;
                                }
                                // if(this.name)
                            }
                        }
                    },
                    scatter: {
                        dataLabels: {
                            // padding:10,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'justify',
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' M</b></span>';
                                if(this.y < 0.1 || this. y >= 100){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(number_format(this.point.y,2)+'%')[0].outerHTML;
                                }
                            }
                        }
                    }
                },
                series: [{
                    name: 'Target/Tagihan',
                    pointWidth: 15,
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#003F88' :  '#003F88'),
                    marker: {
                        symbol: 'c-rect',
                        lineWidth:5,
                        lineColor: (localStorage.getItem("dore-theme") == "dark" ? '#003F88' :  '#003F88'),
                        radius: 50
                    },
                    type: 'scatter',
                    stack: 2,
                    data: result.data.tagihan,
                    dataLabels:{
                        x:0
                    }
                }, {
                    name: 'Tidak Tercapai',
                    type: 'column',
                    pointWidth: 15,
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#dc2626' :  '#dc2626'),
                    stack: 1,
                    data: result.data.tdkcapai,
                    // dataLabels:{
                    //     x:50,
                    // }
                }, {
                    name: 'CCR',
                    type: 'column',
                    pointWidth: 15,
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#EEBE00' :  '#EEBE00'),
                    stack: 1,
                    data: result.data.bayar,
                    dataLabels:{
                        y:0
                    }
                }]
            });
        }
    });
}

function getTrendSaldo(param) {
    $.ajax({
        type: 'GET',
        url: "{{ url('dash-ypt-dash/data-ccr-unit-umur-piutang') }}",
        data: param,
        dataType: 'json',
        async: true,
        success:function(result) {
            // soakhirChart = Highcharts.chart('saldo-akhir', {
            //     chart: {
            //         type: 'spline',
            //         height: ($height - 200)/2
            //     },
            //     title: { text: '' },
            //     subtitle: { text: '' },
            //     exporting:{ 
            //         enabled: false
            //     },
            //     legend:{ 
            //         enabled: false 
            //     },
            //     credits: { enabled: false },
            //     xAxis: {
            //         categories: result.data.kategori
            //     },
            //     yAxis: {
            //         title: {
            //             text: 'Nilai'
            //         },
            //         labels: {
            //             formatter: function () {
            //                 return singkatNilai(this.value);
            //             }
            //         },
            //     },
            //     tooltip: {
            //         formatter: function () {   
            //             return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + toMilyar(this.y,2);
            //         }
            //     },
            //     plotOptions: {
            //         series: {
            //             dataLabels: {
            //                 // padding:10,
            //                 allowOverlap:true,
            //                 enabled: true,
            //                 crop: false,
            //                 overflow: 'justify',
            //                 useHTML: true,
            //                 formatter: function () {
            //                     // return toMilyar(this.y,2);
            //                     return $('<div/>').css({
            //                             // 'color' : 'white', // work
            //                             'padding': '0 3px',
            //                             'font-size': '9px',
            //                             // 'backgroundColor' : this.point.color  // just white in my case
            //                         }).text(toMilyar(this.point.y,2))[0].outerHTML;
            //                 }
            //             },
            //             label: {
            //                 connectorAllowed: true
            //             },
            //             marker:{
            //                 enabled:true
            //             }
            //         }
            //     },
            //     series: result.data.series
            // });
            soakhirChart = Highcharts.chart('saldo-akhir', {
                chart: {
                    type: 'column',
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

function initDash(){
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
}
var timeoutID = null;
// END FUNCTION GET DATA

initDash();

</script>

<script type="text/javascript">
document.addEventListener('fullscreenchange', (event) => {
  if (document.fullscreenElement) {
    // console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);    
  } else {
      $full = '0';
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
    // console.log('Leaving full-screen mode.');
  }
});

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
    if(!$(this).hasClass('disabled')){
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
        $('#select-text-ccr').text(`${nama_filter} ${$filter2} ${$tahun}`)
    }
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
    $('#select-text-ccr').text(`${nama_filter} ${$filter2} ${$tahun}`);
    
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

$('#export-soakhir.menu-chart-custom ul li').click(function(event) {
    event.stopPropagation()
    var idParent = $(this).parent('#dash-soakhir').attr('id')
    var jenis = $(this).text()
    
    if(jenis == 'View in full screen') {
        $full = '2';
        soakhirChart.update({
            title: {
                text: `Umur Piutang`,
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
                text: `Umur Piutang`,
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
                text: `Umur Piutang`,
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
                text: `Umur Piutang`,
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
                text: `Umur Piutang`,
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
        
        $full = '2';
        trendChart.update({
            title: {
                text: $ccr_trend_header,
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
                text: $ccr_trend_header,
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
                text: $ccr_trend_header,
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
                text: $ccr_trend_header,
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
                text: $ccr_trend_header,
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
        <div class="col-9 pl-12 pr-0">
            <div class="row">
                <div id="back-div" class="col-1 pr-0 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11 pr-0">
                    <h2 class="title-dash" id="title-dash">Cash Collection <span class="pp-title">{{ Session::get('namaPP') }}</span><span class="bidang-title"></span> </h2>
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
                            <p id="select-text-ccr" class="select-text">Bulan September {{ date('Y') }}</p>
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
                        <li class="py-2 disabled" data-filter1="YTM" disabled>Year To Month</li>
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
        <div class="col-3 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-klik card-dash border-r-0" style="height:calc((100vh - 160px)/3);">
                        <p class="card-kode" hidden>tahun</p>
                        <div class="row header-div">
                            <div class="col-7">
                                <h4 class="header-card" id="judul-ccr-now1"></h4>
                            </div>
                            <div class="col-5">
                                <h4 class="header-card grey-text text-right mr-2" id="judul-ccr-now2"></h4>
                            </div>
                        </div>
                        <div class="row body-div" style="height:calc(100% - 21px);">
                            <div class="col-12 my-auto">
                                <p id="ccr-now" class="main-nominal my-2">0%</p>
                            </div>
                            <div class="col-12 my-auto">
                                <table class="table table-borderless table-py-2 mb-0" id="table-ccr-now">
                                    <tbody>
                                        <tr>
                                            <td class="w-40 pl-0">Tagihan</td>
                                            <td id="ccr-now-ar" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="now-ar-percentage" class="green-text pr-2 w-30 text-right">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">Pembayaran</td>
                                            <td id="ccr-now-inflow" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="now-inflow-percentage" class="green-text pr-2 w-30 text-right">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">YoY Tagihan</td>
                                            <td id="ccr-now-yoy-ar" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="now-yoy-ar-percentage" class="green-text pr-2 w-30 text-right">
                                                0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">YoY Pembayaran</td>
                                            <td id="ccr-now-yoy-inf" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="now-yoy-inf-percentage" class="green-text pr-2 w-30 text-right">
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
                    <div class="card card-klik card-dash border-r-0" style="height:calc((100vh - 160px)/3);">
                        <p class="card-kode" hidden>tahun_lalu</p>
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">CCR Tahun Sebelumnya</h4>
                            </div>
                        </div>
                        <div class="row body-div" style="height:calc(100% - 21px);">
                            <div class="col-12 my-auto">
                                <p id="ccr-prev" class="main-nominal my-2">0%</p>
                            </div>
                            <div class="col-12 my-auto">
                                <table class="table table-borderless table-py-2 mb-0" id="table-ccr-prev">
                                    <tbody>
                                        <tr>
                                            <td class="w-40 pl-0">Tagihan</td>
                                            <td id="ccr-prev-ar" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="prev-ar-percentage" class="green-text pr-2 w-30 text-right">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">Pembayaran</td>
                                            <td id="ccr-prev-inflow" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="prev-inflow-percentage" class="green-text pr-2 w-30 text-right">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">YoY Tagihan</td>
                                            <td id="ccr-prev-yoy-ar" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="prev-yoy-ar-percentage" class="green-text pr-2 w-30 text-right">
                                                0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">YoY Pembayaran</td>
                                            <td id="ccr-prev-yoy-inf" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="prev-yoy-inf-percentage" class="green-text pr-2 w-30 text-right">
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
                <div class="col-12 pl-12 pr-0">
                    <div class="card card-klik card-dash border-r-0" style="height:calc((100vh - 160px)/3);">
                        <p class="card-kode" hidden>total</p>
                        <div class="row header-div">
                            <div class="col-9">
                                <h4 class="header-card">CCR Total</h4>
                            </div>
                        </div>
                        <div class="row body-div" style="height:calc(100% - 21px);">
                            <div class="col-12 my-auto">
                                <p id="ccr-all" class="main-nominal my-2">0%</p>
                            </div>
                            <div class="col-12 my-auto">
                                <table class="table table-borderless table-py-2 mb-0" id="table-ccr-all">
                                    <tbody>
                                        <tr>
                                            <td class="w-40 pl-0">Tagihan</td>
                                            <td id="ccr-all-ar" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="all-ar-percentage" class="green-text pr-2 w-30 text-right">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">Pembayaran</td>
                                            <td id="ccr-all-inflow" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="all-inflow-percentage" class="green-text pr-2 w-30 text-right">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">YoY Tagihan</td>
                                            <td id="ccr-all-yoy-ar" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="all-yoy-ar-percentage" class="green-text pr-2 w-30 text-right">
                                                0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-40 pl-0">YoY Pembayaran</td>
                                            <td id="ccr-all-yoy-inf" class="w-30 text-bold text-right px-0">0 M</td>
                                            <td id="all-yoy-inf-percentage" class="green-text pr-2 w-30 text-right">
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
        </div>
        <div class="col-9 col-grid">
            <div class="row mb-1">
                <div class="col-12 pl-1 pr-0">
                    <div class="card card-dash border-r-0" id="dash-trend" 
                    style="height:calc((100vh - 155px)/2)">
                        <div class="row header-div" id="card-trend">
                            <div class="col-9">
                                <h4 class="header-card ccr-trend-header">CCR YTM</h4>
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
                                <h4 class="header-card">Umur Piutang</h4>
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
    </div>
    {{-- END ROW 1 --}}
</section>
{{-- END CONTENT MAIN --}}

{{-- END DEKSTOP --}}