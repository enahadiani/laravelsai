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
    .card{
        border-radius: 0 !important;
        box-shadow: none;
        border: 1px solid #f0f0f0;
    }
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
    .dash-card{
        border-radius: 0.75rem !important;
    }
    .dash-card > .card-body{
        border-radius: 0.75rem !important;
        padding: 1.5rem !important;
    }
    .dash-card > .card-header{
        background: var(--theme-color-1);
        color:white;
        border-top-right-radius: 0.75rem;
        border-top-left-radius: 0.75rem;
        padding: 0.5rem 1.5rem;
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
            <h1 class="mb-0 bold">Beban 5 Tahun</h1>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Komparasi Anggaran dan Realisasi {{ $tahun }}</p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="agg" style='height:400px'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="tf" style='height:400px'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="ntf" style='height:400px'></div>
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
function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(2);
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

function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'RKA',{ role: 'annotation'} ,'Actual',{ role: 'annotation'}, 'Capaian',{ role: 'annotation'}],
        ['2015', 273.0,273.0, 291.1, 291.1, 104.0, '104,0%'],
        ['2016', 302.2,302.2, 307.1, 307.1, 101.6, '101,6%'],
        ['2017', 331.6,331.6, 365.3, 365.3, 110.2, '110,2%'],
        ['2018', 381.9,381.9, 413.8, 413.8, 106.0, '106,0%'],
        ['2019', 500.9,500.9, 525.5, 525.5, 104.9, '104,9%'],
        ['2020', 543.3,543.3, 503.0, 503.0, 92.6, '92,6%'],
        ]);
        
        var options = {
            annotations: {
                textStyle: {
                    fontSize: 12,
                    bold: true,
                    opacity: 0.8,
                }
                
            },
            seriesType: 'bars',
            series: {
                0: {
                    targetAxisIndex: 0
                },
                1: {
                    targetAxisIndex: 0
                },
                2: {
                    type: 'line',
                    targetAxisIndex: 1
                }
            },
            vAxes: {
                // Adds titles to each axis.
                0: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                    title: 'Milyar Rupiah',  
                    gridlines: {
                        count: 10,
                    },
                    min: 0
                },
                1: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                    format: 'percent', 
                    title: '% Capaian',
                    gridlines: {
                        count: 1,
                    },
                    min: 80
                }
            },
            legend: {
                position: 'bottom', 
                alignment: 'center'
            },
            chartArea:{
                width: '90%',
                height: '85%'
            },
            colors: ['#4c4c4c', '#900604', '#16ff14'],
            height:'100%',
            width:'100%'
            
        };
        
        var chart = new google.visualization.ComboChart(document.getElementById('agg'));
        chart.draw(data, options);
}

function getBeban(periode=null){
    // $.ajax({
    //     type:"GET",
    //     url:"{{ url('/telu-dash/getBeban5Tahun') }}/"+periode,
    //     dataType:"JSON",
    //     success:function(result){
            
        $google.charts.load('current', {
        'packages': ['corechart']
      });
      $google.charts.setOnLoadCallback(drawVisualization);

    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {       
    //         if(jqXHR.status == 422){
    //             var msg = jqXHR.responseText;
    //         }else if(jqXHR.status == 500) {
    //             var msg = "Internal server error";
    //         }else if(jqXHR.status == 401){
    //             var msg = "Unauthorized";
    //             window.location="{{ url('/dash-telu/sesi-habis') }}";
    //         }else if(jqXHR.status == 405){
    //             var msg = "Route not valid. Page not found";
    //         }
            
    //     }
    // })
}

function drawVisualizationTF() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'RKA',{ role: 'annotation'} ,'Actual',{ role: 'annotation'}, 'Capaian',{ role: 'annotation'}],
        ['2015', 250.1,250.1, 260.2, 260.2, 104.0, '104,0%'],
        ['2016', 302.2,302.2, 307.1, 307.1, 101.6, '101,6%'],
        ['2017', 331.6,331.6, 365.3, 365.3, 110.2, '110,2%'],
        ['2018', 381.9,381.9, 413.8, 413.8, 108.4, '108,4%'],
        ['2019', 436.9,436.9, 453.1, 453.1, 103.7, '103,7%'],
        ['2020', 451.1,451.1, 445.7, 445.7, 98.8, '98,8%'],
        ]);
        
        var options = {
            annotations: {
                textStyle: {
                    fontSize: 12,
                    bold: true,
                    opacity: 0.8,
                }
                
            },
            seriesType: 'bars',
            series: {
                0: {
                    targetAxisIndex: 0
                },
                1: {
                    targetAxisIndex: 0
                },
                2: {
                    type: 'line',
                    targetAxisIndex: 1
                }
            },
            vAxes: {
                // Adds titles to each axis.
                0: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                    title: 'Milyar Rupiah',  
                    gridlines: {
                        count: 10,
                    },
                    min: 0
                },
                1: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                    format: 'percent', 
                    title: '% Capaian',
                    gridlines: {
                        count: 2,
                    },
                    min: 65
                }
            },
            legend: {
                position: 'bottom', 
                alignment: 'center'
            },
            chartArea:{
                width: '80%',
                height: '85%'
            },
            colors: ['#4c4c4c', '#900604', '#16ff14'],
            height:'100%',
            width:'100%'
            
        };
        
        var chart = new google.visualization.ComboChart(document.getElementById('tf'));
        chart.draw(data, options);
}

function getBebanTF(periode=null){
    // $.ajax({
    //     type:"GET",
    //     url:"{{ url('/telu-dash/getBebanTF') }}/"+periode,
    //     dataType:"JSON",
    //     success:function(result){
            
        $google.charts.load('current', {
        'packages': ['corechart']
      });
      $google.charts.setOnLoadCallback(drawVisualizationTF);

    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {       
    //         if(jqXHR.status == 422){
    //             var msg = jqXHR.responseText;
    //         }else if(jqXHR.status == 500) {
    //             var msg = "Internal server error";
    //         }else if(jqXHR.status == 401){
    //             var msg = "Unauthorized";
    //             window.location="{{ url('/dash-telu/sesi-habis') }}";
    //         }else if(jqXHR.status == 405){
    //             var msg = "Route not valid. Page not found";
    //         }
            
    //     }
    // })
}

function drawVisualizationNTF() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'RKA',{ role: 'annotation'} ,'Actual',{ role: 'annotation'}, 'Capaian',{ role: 'annotation'}],
        ['2015', 22.9,22.9, 31.9, 31.9, 139.7, '139,7%'],
        ['2016', 38.4,38.4, 48.1, 48.1, 125.2, '125,2%'],
        ['2017', 46.6,46.6, 50.2, 50.2, 107.8, '107,8%'],
        ['2018', 66.6,66.6, 61.6, 413.8, 92.5, '92,5%'],
        ['2019', 63.9,63.9, 72.4, 72.4, 113.3, '113,3%'],
        ['2020', 92.2,92.2, 57.3, 57.3, 62.2, '62,2%'],
        ]);
        
        var options = {
            annotations: {
                textStyle: {
                    fontSize: 12,
                    bold: true,
                    opacity: 0.8,
                }
                
            },
            seriesType: 'bars',
            series: {
                0: {
                    targetAxisIndex: 0
                },
                1: {
                    targetAxisIndex: 0
                },
                2: {
                    type: 'line',
                    targetAxisIndex: 1
                }
            },
            vAxes: {
                // Adds titles to each axis.
                0: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                    title: 'Milyar Rupiah',  
                    gridlines: {
                        count: 10,
                    },
                    min: 0
                },
                1: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                    format: 'percent', 
                    title: '% Capaian',
                    gridlines: {
                        count: 2,
                    },
                    min: 65
                }
            },
            legend: {
                position: 'bottom', 
                alignment: 'center'
            },
            chartArea:{
                width: '80%',
                height: '85%'
            },
            colors: ['#4c4c4c', '#900604', '#16ff14'],
            height:'100%',
            width:'100%'
            
        };
        
        var chart = new google.visualization.ComboChart(document.getElementById('ntf'));
        chart.draw(data, options);
}

function getBebanNTF(periode=null){
    // $.ajax({
    //     type:"GET",
    //     url:"{{ url('/telu-dash/getBebanTF') }}/"+periode,
    //     dataType:"JSON",
    //     success:function(result){
            
        $google.charts.load('current', {
        'packages': ['corechart']
      });
      $google.charts.setOnLoadCallback(drawVisualizationNTF);

    //     },
    //     error: function(jqXHR, textStatus, errorThrown) {       
    //         if(jqXHR.status == 422){
    //             var msg = jqXHR.responseText;
    //         }else if(jqXHR.status == 500) {
    //             var msg = "Internal server error";
    //         }else if(jqXHR.status == 401){
    //             var msg = "Unauthorized";
    //             window.location="{{ url('/dash-telu/sesi-habis') }}";
    //         }else if(jqXHR.status == 405){
    //             var msg = "Route not valid. Page not found";
    //         }
            
    //     }
    // })
}

getBeban("{{$periode}}");
getBebanTF("{{$periode}}");
getBebanNTF("{{$periode}}");
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
</script>