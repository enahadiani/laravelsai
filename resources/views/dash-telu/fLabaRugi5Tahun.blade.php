@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2)
@endphp

<style>
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
    }

    /* NAV TABS */
    .nav-tabs {
        border:none;
    }

    .nav-tabs .nav-link{
        border: 1px solid #ad1d3e;
        border-radius: 20px;
        padding: 2px 25px;
        color:#ad1d3e;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color: white;
        background-color: #ad1d3e;
        border-color: #ad1d3e;
    }

    .nav-tabs .nav-item {
        margin-bottom: -1px;
        padding: 0px 10px 0px 0px;
    }

    #pencapaian > td, th 
    {
        padding: 4px !important;
    }
    .bold{
        font-weight:bold;
    }
    .table td{
        padding:4px !important;
    }
    .trace {
        cursor:pointer;
    }
    </style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h6 class="mb-0 bold">Laba Rugi 5 Tahun</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Komparasi Anggaran dan Realisasi {{ $tahun }}</p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-body" style='border-radius:.75rem !important'>
                    <div id="laba-rugi" style='height:450px;'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group">
                            <label>Periode</label>
                            <select class="form-control" data-width="100%" name="periode" id="periode">
                                <option value='#'>Pilih Periode</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btn-filter').removeClass('btn-outline-light');
    $('#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btn-filter').removeClass('btn-outline-dark');
    $('#btn-filter').addClass('btn-outline-light');
}
var $mode = localStorage.getItem("dore-theme");
function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(1);
            // console.log(x);
            var tmp = x.toString().split('.');
            // console.dir(tmp);
            var y = tmp[1].substr(0,2);
            var z = tmp[0]+'.'+y;
            var parts = z.split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }else{
        return 0;
    }
}
function sepNumPas(x){
    var num = parseInt(x);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}

function toJuta(x) {
    var nil = x / 1000000;
    return sepNum(nil) + '';
}

function toMilyar(x) {
    var nil = x / 1000000000;
    return sepNum(nil) + ' M';
}

function singkatNilai(num){
    if(num < 0){
        num = num * -1;
    }
    
    if(num >= 1000 && num < 1000000){
        var str = 'Rb';
        var pembagi = 1000;
    }else if(num >= 1000000 && num < 1000000000){
        var str = 'Jt';
        var pembagi = 1000000;
    }else if(num >= 1000000000 && num < 1000000000000){
        var str = 'M';
        var pembagi = 1000000000;
    }else if(num >= 1000000000000){
        var str = 'T';
        var pembagi = 1000000000000;
    }
    
    if(num < 0){
        return (parseFloat(num/pembagi).toFixed(0) * -1) + ' ' +str;
    }else if (num > 0 && num >= 1000){
        return parseFloat(num/pembagi).toFixed(0) + ' ' +str;
    }else if(num > 0 && num < 1000){
        return num;
    }else{
        return num;
    }
}

function getPeriode(){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/periode') }}",
        dataType: "JSON",
        success: function(result){
            var select = $('#periode').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.data.status){
                if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                    for(i=0;i<result.data.data.length;i++){
                        control.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                    }
                }
                if("{{ Session::get('periode') }}" != ""){
                    control.setValue("{{ Session::get('periode') }}")
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getPeriode();

// function drawVisualization() {
//     // Some raw data (not necessarily accurate)
//     var data = $google.visualization.arrayToDataTable([
//         ['', 'Pendapatan',{ role: 'annotation'} ,'Beban',{ role: 'annotation'}, 'SHU',{ role: 'annotation'}, 'OR',{ role: 'annotation'}],
//         ['RKA 2015', 273.0,273.0, 248.6, 248.6, 24.4,24.4, 90.5, 90.5],
//         ['Real 2015', 292.1,292.1, 239.8, 239.8, 52.3, 52.3, 84.6, 84.6],
//         ['RKA 2016', 340.6,340.6, 304.4, 304.4, 36.2,36.2, 88.7, 88.7],
//         ['Real 2016', 355.2,355.2, 290.8, 290.8, 64.4, 64.4, 81.8, 81.8],
//         ['RKA 2017', 378.2,378.2, 307.4,307.4, 70.8, 70.8, 80.8, 80.8],
//         ['Real 2017', 415.5,415.5, 329.5, 329.5, 86.0, 86.0, 78.1, 78.1],
//         ['RKA 2018', 448.5, 448.5, 352.5, 352.5, 96.0, 96.0, 72.9, 72.9],
//         ['Real 2018', 475.4,475.4, 379.2, 379.2, 96.3, 96.3, 78.5, 78.5],
//         ['RKA 2019', 500.9, 500.9, 391.9, 391.9, 108.9, 108.9, 76.8, 76.8],
//         ['Real 2019', 525.5, 525.5, 420.6, 420.6, 104.9, 104.9, 78.8, 78.8],
//         ['RKA 2020', 543.3, 543.3, 435.6, 435.6, 101.9, 101.9, 80.2, 80.2],
//         ['Real 2020', 503.0, 503.0, 417.2, 417.2, 85.8, 85.8, 82.9, 82.9],
//         ]);
        
//         var options = {
//             annotations: {
//                 textStyle: {
//                     fontSize: 12,
//                     bold: true,
//                     opacity: 0.8,
//                 }
                
//             },
//             seriesType: 'bars',
//             series: {
//                 0: {
//                     targetAxisIndex: 0
//                 },
//                 1: {
//                     targetAxisIndex: 0
//                 },
//                 2: {
//                     type: 'line', 
//                     curveType: 'function',
//                     targetAxisIndex: 0
//                 },
//                 3: {
//                     type: 'line', 
//                     curveType: 'function',
//                     targetAxisIndex: 1
//                 }
//             },
//             vAxes: {
//                 // Adds titles to each axis.
//                 0: {
//                     textStyle : {
//                         fontSize: 10 // or the number you want
//                     },
//                     title: 'DALAM MILYAR RUPIAH',  
//                     gridlines: {
//                         count: 10,
//                     },
//                     min: 0
//                 },
//                 1: {
//                     textStyle : {
//                         fontSize: 10 // or the number you want
//                     },
//                     format: '##,##%', 
//                     title: 'PROSENTASE CAPAIAN',
//                     gridlines: {
//                         count: 1,
//                     },
//                     min: 65
//                 }
//             },
//             legend: {
//                 position: 'top',
//                 alignment: 'center'
//             },
//             chartArea:{
//                 width: '90%',
//                 height: '85%'
//             },
//             colors: ['#4c4c4c', '#900604', '#ffc114', '#16ff14'],
//             height:'100%',
//             width:'100%',
//             animation: {
//                 startup: true,
//                 duration: 1000,
//                 easing: 'out'
//             }
            
//         };
        
//         var chart = new google.visualization.ComboChart(document.getElementById('laba-rugi'));
//         chart.draw(data, options);
//     }
function getLabaRugi(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/laba-rugi-5tahun') }}",
        data:{periode : periode, mode : $mode},
        dataType:"JSON",
        success:function(result){
            
            // $google.charts.load('current', {
            //     'packages': ['corechart']
            // });
            // $google.charts.setOnLoadCallback(drawVisualization);
            // var $colors = result.colors;
            
            Highcharts.chart('laba-rugi', { 
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+'</b>';
                    }
                },
                yAxis: [{
                    title: {
                        text: 'DALAM MILIAR RUPIAH'
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },{
                    title: {
                        text: 'PROSENTASE CAPAIAN'
                    },
                    opposite: true
                }],
                xAxis: {
                    categories:result.ctg
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' M</b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 3px',
                                    'backgroundColor' : this.series.color  // just white in my case
                                }).text(sepNum(this.y)+'M')[0].outerHTML;
                            }
                        }
                    },
                    spline: {
                        dataLabels: {
                            padding:15,
                            x:20,
                            useHTML: true,
                            formatter: function () {
                                if(this.series.name == 'OR'){
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 5px',
                                        'backgroundColor' : this.series.color  // just white in my case
                                    }).text(sepNum(this.y)+'%')[0].outerHTML;
                                }else{

                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 5px',
                                        'backgroundColor' : this.series.color  // just white in my case
                                    }).text(sepNum(this.y)+'M')[0].outerHTML;
                                }
                            }
                        }
                        // enableMouseTracking: false
                    },
                    series:{
                        dataLabels: {
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            fontSize: '12px',
                            overflow: 'justify'
                        }
                    }
                },
                series: result.series

            });
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

getLabaRugi("{{$periode}}");
// getRkaVsReal("{{$periode}}");
// getGrowthRKA("{{$periode}}");
// getGrowthReal("{{$periode}}");

$('#form-filter').submit(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    getPencapaianYoY(periode);
    getRkaVsReal(periode);
    getGrowthRKA(periode);
    getGrowthReal(periode);
    var tahun = parseInt(periode.substr(0,4));
    var tahunLalu = tahun-1;
    $('.thnLalu').text(tahunLalu);
    $('.thnIni').text(tahun);
    $('.periode-label').html(namaPeriode(periode));
    $('.bulan-label').html(namaPeriodeBulan(periode));
    $('.tahun-label').html(periode.substr(0,4));
    $('#modalFilter').modal('hide');
    // $('.app-menu').hide();
    if ($(".app-menu").hasClass("shown")) {
        $(".app-menu").removeClass("shown");
    } else {
        $(".app-menu").addClass("shown");
    }
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#periode')[0].selectize.setValue('');
    
});
   
$('#btn-filter').click(function(){
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    
    $('#modalFilter').modal('hide');
});
$('.table').on('click','.ms-pend',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSPendapatan') }}";
    loadForm(url);
});
$('.table').on('click','.ms-beban',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSBeban') }}";
    loadForm(url);
});
$('.table').on('click','.ms-pengembangan',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSPengembangan') }}";
    loadForm(url);
});
</script>