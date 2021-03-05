@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2);
$tahun5 = intval($tahun-5);
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
            <h6 class="mb-0 bold">Pendapatan 5 Tahun</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <!-- <a class="btn btn-outline-light" href="#" id="btn-pptx" style="position: absolute;right: 215px;border:1px solid black;font-size:1rem;top:0">Export PPTX</a> -->
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div id="cek"></div>
    <div class="row" >
        <div class="col-lg-12 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Perbandingan Anggaran dan Realisasi <span class="rentang-tahun"></span></h6>
                </div>
                <div class="card-body">
                    <div id="agg" style='height:400px'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Pendapatan TF <span class="rentang-tahun"></span></h6>
                </div>
                <div class="card-body">
                    <div id="tf" style='height:400px'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Pendapatan NTF <span class="rentang-tahun"></span></h6>
                </div>
                <div class="card-body">
                    <div id="ntf" style='height:400px'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Komposisi TF dan NTF <span class="rentang-tahun"></span></h6>
                </div>
                <div class="card-body">
                    <div id="komposisi" style='height:400px'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Komposisi TF dan NTF <span class="rentang-tahun"></span></h6>
                </div>
                <div class="card-body">
                    <div id="komposisi2" style='height:400px'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 480px;">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row dash-filter">
                            <p class="dash-kunci" hidden>dash_periode</p> 
                            <label class="col-md-12">Periode</label>
                            <div class="col-md-4">
                                <select class="form-control dash-filter-type" data-width="100%" name="periode[]" id="periode_type">
                                    <option value='' disabled>Pilih</option>
                                    <option value='='>=</option>
                                    <option value='<='><=</option>
                                    <option value='range'>Range</option>
                                </select>
                            </div>
                            <div class="col-md-8 dash-filter-from">
                                <select class="form-control" data-width="100%" name="periode[]" id="periode_from">
                                    <option value='' disabled>Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-4 dash-filter-to">
                                <select class="form-control" data-width="100%" name="periode[]" id="periode_to">
                                    <option value='' disabled>Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none;position:absolute;bottom:0;justify-content:flex-end;width:100%">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('asset_dore/js/base64.js') }}"></script>
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
var $chart = {};
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
            $('#periode_type').selectize();
            var select = $("#periode_from").selectize();
            select = select[0];
            var control = select.selectize;

            var select2 = $("#periode_to").selectize();
            select2 = select2[0];
            var control2 = select2.selectize;
            if(result.data.status){
                if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                    for(i=0;i<result.data.data.length;i++){
                        control.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                        control2.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                    }
                }

                $('#periode_to').closest('div.dash-filter-to').hide();
                $('#periode_from').closest('div.dash-filter-from').removeClass('col-md-4').addClass('col-md-8');

                if($dash_periode.type == ""){
                    $dash_periode.type = "=";
                }
                
                $('#periode_type')[0].selectize.setValue($dash_periode.type);

                
                switch($dash_periode.type){
                    case '=':
                        var label = 'Periode '+namaPeriode($dash_periode.from);
                        if($dash_periode.from == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                    case '<=':
                        
                        var label = 'Periode s.d '+namaPeriode($dash_periode.from);
                        if($dash_periode.from == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                    case 'range':
                        
                        if($dash_periode.from == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
        
                        if($dash_periode.to == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.to = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control2.setValue($dash_periode.to);
                        }
                        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);

                    break;
                    default:
                        if($dash_periode.from == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                }
                $('.label-periode-filter').html(label);

                
                var tahun = $dash_periode.from.substr(0,4);
                var tahunLima = parseInt(tahun)-5;
        
                $('.rentang-tahun').html(tahunLima +' - '+tahun);
                getPendapatan($dash_periode);
                getPendapatanTF($dash_periode);
                getPendapatanNTF($dash_periode);
                getKomposisi($dash_periode);
                getPendapatanGrowth($dash_periode);

                        
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

$('.dash-filter').on('change', '.dash-filter-type', function(){
    var type = $(this).val();
    var kunci = $(this).closest('div.dash-filter').find('.dash-kunci').text();
    var tmp = kunci.split("_");
    var kunci2 = tmp[1];
    var field = eval('$'+kunci);
    console.log(type,kunci,kunci2);
    switch(type){
        case "=": 
        case "<=":
            $(this).closest('div.dash-filter').find('.dash-filter-from').removeClass('col-md-4');
            $(this).closest('div.dash-filter').find('.dash-filter-from').addClass('col-md-8');
            $(this).closest('div.dash-filter').find('.dash-filter-from #'+kunci2+"_from")[0].selectize.setValue(field.from);
            $(this).closest('div.dash-filter').find('.dash-filter-to').hide();
            field.type = type;
            field.from = field.from;
            field.to = "";
        break;
        case "range":
            
            field.type = type;
            field.from = field.from;
            field.to = field.to;
            
            $(this).closest('div.dash-filter').find('.dash-filter-from').removeClass('col-md-8');
            $(this).closest('div.dash-filter').find('.dash-filter-from').addClass('col-md-4');
            $(this).closest('div.dash-filter').find('.dash-filter-from #'+kunci2+"_from")[0].selectize.setValue(field.from);
            $(this).closest('div.dash-filter').find('.dash-filter-to #'+kunci2+"_to")[0].selectize.setValue(field.to);
            $(this).closest('div.dash-filter').find('.dash-filter-to').show();
        break;
    }
});

function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'RKA',{ role: 'annotation'} ,'Actual',{ role: 'annotation'}, 'Capaian',{ role: 'annotation'}],
        ['2015', 273.0,273.0, 291.1, 291.1, 107.0, '107,0%'],
        ['2016', 302.2,302.2, 307.1, 307.1, 104.3, '104,3%'],
        ['2017', 331.6,331.6, 365.3, 365.3, 109.9, '109,9%'],
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
                    curveType: 'function',
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
                    format: '##,##%', 
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

function getPendapatan(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/pend-5tahun') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            // $google.charts.load('current', {
            //     'packages': ['corechart']
            // });
            // $google.charts.setOnLoadCallback(drawVisualization);
            $chart = Highcharts.chart('agg', { 
                chart: {
                    alignTicks: false
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                exporting: {
                    enabled:false,
                    allowHTML: true
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+' </b>';
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
                    tickInterval: 100
                },{
                    title: {
                        text: 'PROSENTASE CAPAIAN'
                    },
                    opposite: true,
                    tickInterval: 5
                }],
                xAxis: {
                    categories:result.ctg
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' </b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'fontSize': '10px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'M')[0].outerHTML;
                            }
                        }
                    },
                    spline: {
                        dataLabels: {
                            // padding:15,
                            enabled: true,
                            x:20,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'fontSize': '10px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'%')[0].outerHTML;
                            }
                        }
                        // enableMouseTracking: false
                    },
                    series:{
                        dataLabels: {
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            fontSize: '10px !important',
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
                    curveType: 'function',
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
                    format: '##,##%', 
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

function getPendapatanTF(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/pend-5tahun-tf') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            // $google.charts.load('current', {
            //     'packages': ['corechart']
            // });
            // $google.charts.setOnLoadCallback(drawVisualizationTF);
            Highcharts.chart('tf', { 
                chart: {
                    alignTicks: false
                },
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
                    tickInterval: 50
                },{
                    title: {
                        text: 'PROSENTASE CAPAIAN'
                    },
                    opposite: true,
                    tickInterval: 2
                }],
                xAxis: {
                    categories:result.ctg
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            // padding:10,
                            y:20,
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' </b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 2px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'M')[0].outerHTML;
                            }
                        }
                    },
                    spline: {
                        dataLabels: {
                            // padding:15,
                            // x:20,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'%')[0].outerHTML;
                            }
                        }
                        // enableMouseTracking: false
                    },
                    series:{
                        dataLabels: {
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
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

function drawVisualizationNTF() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'RKA',{ role: 'annotation'} ,'Actual',{ role: 'annotation'}, 'Capaian',{ role: 'annotation'}],
        ['2015', 22.9,22.9, 31.9, 31.9, 139.7, '139,7%'],
        ['2016', 38.4,38.4, 48.1, 48.1, 125.2, '125,2%'],
        ['2017', 46.6,46.6, 50.2, 50.2, 107.8, '107,8%'],
        ['2018', 66.6,66.6, 61.6, 61.6, 92.5, '92,5%'],
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
                    curveType: 'function',
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
                    format: '##,##%', 
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

function getPendapatanNTF(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/pend-5tahun-ntf') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            // $google.charts.load('current', {
            //     'packages': ['corechart']
            // });
            // $google.charts.setOnLoadCallback(drawVisualizationNTF);
            Highcharts.chart('ntf', { 
                chart: {
                    alignTicks: false
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+' </b>';
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
                    tickInterval: 10
                },{
                    title: {
                        text: 'PROSENTASE CAPAIAN'
                    },
                    opposite: true,
                    tickInterval: 20
                }],
                xAxis: {
                    categories:result.ctg
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            padding:10,
                            y:20,
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' </b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 2px',
                                    'font-size':'8px',
                                    
                                    'backgroundColor' : this.point.color  // just white in my case
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
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'%')[0].outerHTML;
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


function drawVisualizationKomposisi() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'TF',{ role: 'annotation'} , 'NTF',{ role: 'annotation'}],
        ['2015', 260,'89%',31.9, '11%'],
        ['2016', 307,'86%',48.1, '14%'],
        ['2017', 365,'88%',50.2, '12%'],
        ['2018', 414,'87%',61.6, '13%'],
        ['2019', 453,'86%',72.4, '14%'],
        ['2020', 446,'89%',57.3, '11%'],
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
                }
            },
            vAxes: {
                // Adds titles to each axis.
                0: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                },
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
            width:'100%',
            isStacked: 'percent'
        };
        
        var chart = new google.visualization.ComboChart(document.getElementById('komposisi'));
        chart.draw(data, options);
}

function getKomposisi(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/pend-5tahun-komposisi') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        success:function(result){
            
            // $google.charts.load('current', {
            //     'packages': ['corechart']
            // });
            // $google.charts.setOnLoadCallback(drawVisualizationKomposisi);
            Highcharts.chart('komposisi', { 
                chart: {
                    alignTicks: false
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                // tooltip: {
                //     formatter: function () {
                //         return this.series.name+':<b>'+sepNumPas(this.y)+' </b>';
                //     }
                // },
                tooltip: {
                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                    shared: true
                },
                xAxis: {
                    categories:result.ctg
                },
                plotOptions: {
                    column: {
                        stacking: 'percent',
                        dataLabels: {
                            enabled: true,
                            padding:10,
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' </b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 2px',
                                    'font-size':'8px',
                                    
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.percentage)+'%')[0].outerHTML;
                            }
                        }
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


function drawVisualizationGrowth() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'Total Pendapatan',{ role: 'annotation'} ,'TF',{ role: 'annotation'}, 'NTF',{ role: 'annotation'}],
        ['2015', 107.0, '107,0%', 104.0, '104,0%', 139.7, '139,7%'],
        ['2016', 104.3, '104,3%', 101.6, '101,6%', 125.2, '125,2%'],
        ['2017', 109.9, '109,9%', 110.2, '110,2%', 107.8, '107,8%'],
        ['2018', 106.0, '106,0%', 108.4, '108,4%', 92.5, '92,5%'],
        ['2019', 104.9, '104,9%', 103.7, '103,7%', 113.3, '113,3%'],
        ['2020', 92.6, '92,6%', 98.8, '98,8%', 62.2, '62,2%'],
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
                    type: 'line',          
                    curveType: 'function',
                    targetAxisIndex: 0
                },
                1: {
                    type: 'line',          
                    curveType: 'function',
                    targetAxisIndex: 0
                },
                2: {
                    type: 'line',          
                    curveType: 'function',
                    targetAxisIndex: 0
                }
            },
            vAxes: {
                0: {
                    textStyle : {
                        fontSize: 10 // or the number you want
                    },
                    title: '% Capaian',
                    gridlines: {
                        count: 2,
                    },
                    // scaleType: 'log'
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
        
        var chart = new google.visualization.ComboChart(document.getElementById('komposisi2'));
        chart.draw(data, options);
}

function getPendapatanGrowth(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/pend-5tahun-growth') }}",
        data: {'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            // $google.charts.load('current', {
            //     'packages': ['corechart']
            // });
            // $google.charts.setOnLoadCallback(drawVisualizationGrowth);
            Highcharts.chart('komposisi2', { 
                chart: {
                    // alignTicks: false
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+' </b>';
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
                            // padding:10,
                            y:20,
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' </b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 2px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'M')[0].outerHTML;
                            }
                        }
                    },
                    spline: {
                        dataLabels: {
                            // padding:15,
                            // x:20,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'%')[0].outerHTML;
                            }
                        }
                        // enableMouseTracking: false
                    },
                    series:{
                        dataLabels: {
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
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


$('#form-filter').submit(function(e){
    e.preventDefault();
    $dash_periode.type = $('#periode_type')[0].selectize.getValue();
    $dash_periode.from = $('#periode_from')[0].selectize.getValue();
    $dash_periode.to = $('#periode_to')[0].selectize.getValue();
    $filter_periode = $dash_periode.from;
    switch($dash_periode.type){
        case '=':
            var label = 'Periode '+namaPeriode($dash_periode.from);    
        break;
        case '<=':
            
            var label = 'Periode s.d '+namaPeriode($dash_periode.from);
        break;
        case 'range':
            
            var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);

        break;
    }
    $('.label-periode-filter').html(label);
    var tahun = $dash_periode.from.substr(0,4);
    var tahunLima = parseInt(tahun)-5;
    $('.rentang-tahun').html(tahunLima +' - '+tahun);
    getPendapatan($dash_periode);
    getPendapatanTF($dash_periode);
    getPendapatanNTF($dash_periode);
    getKomposisi($dash_periode);
    getPendapatanGrowth($dash_periode);
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

$('#btn-pptx').click(function(){
    let pres = new PptxGenJS();
    
    // 2. Add a Slide
    let slide = pres.addSlide();

    // 3. Add one or more objects (Tables, Shapes, Images, Text and Media) to the Slide
    let textboxText = "Hello World from PptxGenJS!";
    let textboxOpts = { x: 1, y: 1, color: '363636', fill: { color:'F1F1F1' }, align: "center" };
    slide.addText(textboxText, textboxOpts);
    
    var svg = $chart.getSVG();
    svg64 = Base64.encode(svg);
    
    var parser = new DOMParser(); 
    var svgElem = parser.parseFromString(svg, "image/svg+xml").documentElement;
    
        // Use toDataURL extension to generate Base64 string
    var b64 = svgElem.toDataURL("image/png")
    console.log(b64);
    $("#cek").append($("<img src='"+b64+"' alt='file.svg'/>"));

    slide.addImage({ data:b64, x:1.84, y:1.3, h:2.5, w:3.33 });

    // 4. Save the Presentation
    pres.writeFile("Sample Presentation.pptx"); 
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    
    $('#modalFilter').modal('hide');
});
</script>

<script type="text/javascript">
    /**
        The missing SVG.toDataURL library for your SVG elements.
        
        Usage: SVGElement.toDataURL( type, { options } )
        Returns: the data URL, except when using native PNG renderer (needs callback).
        type	MIME type of the exported data.
                Default: image/svg+xml.
                Must support: image/png.
                Additional: image/jpeg.
        options is a map of options: {
            callback: function(dataURL)
                Callback function which is called when the data URL is ready.
                This is only necessary when using native PNG renderer.
                Default: undefined.
            
            [the rest of the options only apply when type="image/png" or type="image/jpeg"]
            renderer: "native"|"canvg"
                PNG renderer to use. Native renderer¹ might cause a security exception.
                Default: canvg if available, otherwise native.
            keepNonSafe: true|false
                Export non-safe (image and foreignObject) elements.
                This will set the Canvas origin-clean property to false, if this data is transferred to Canvas.
                Default: false, to keep origin-clean true.
                NOTE: not currently supported and is just ignored.
            keepOutsideViewport: true|false
                Export all drawn content, even if not visible.
                Default: false, export only visible viewport, similar to Canvas toDataURL().
                NOTE: only supported with canvg renderer.
        }
        See original paper¹ for more info on SVG to Canvas exporting.
        ¹ http://svgopen.org/2010/papers/62-From_SVG_to_Canvas_and_Back/#svg_to_canvas
    */
    
    SVGElement.prototype.toDataURL = function(type, options) {
        var _svg = this;
        
        function debug(s) {
            console.log("SVG.toDataURL:", s);
        }
    
        function exportSVG() {
            var svg_xml = XMLSerialize(_svg);
            var svg_dataurl = base64dataURLencode(svg_xml);
            debug(type + " length: " + svg_dataurl.length);
    
            // NOTE double data carrier
            if (options.callback) options.callback(svg_dataurl);
            return svg_dataurl;
        }
    
        function XMLSerialize(svg) {
    
            // quick-n-serialize an SVG dom, needed for IE9 where there's no XMLSerializer nor SVG.xml
            // s: SVG dom, which is the <svg> elemennt
            function XMLSerializerForIE(s) {
                var out = "";
                
                out += "<" + s.nodeName;
                for (var n = 0; n < s.attributes.length; n++) {
                    out += " " + s.attributes[n].name + "=" + "'" + s.attributes[n].value + "'";
                }
                
                if (s.hasChildNodes()) {
                    out += ">\n";
    
                    for (var n = 0; n < s.childNodes.length; n++) {
                        out += XMLSerializerForIE(s.childNodes[n]);
                    }
    
                    out += "</" + s.nodeName + ">" + "\n";
    
                } else out += " />\n";
    
                return out;
            }
    
            
            if (window.XMLSerializer) {
                debug("using standard XMLSerializer.serializeToString")
                return (new XMLSerializer()).serializeToString(svg);
            } else {
                debug("using custom XMLSerializerForIE")
                return XMLSerializerForIE(svg);
            }
        
        }
    
        function base64dataURLencode(s) {
            var b64 = "data:image/svg+xml;base64,";
    
            // https://developer.mozilla.org/en/DOM/window.btoa
            if (window.btoa) {
                debug("using window.btoa for base64 encoding");
                b64 += btoa(s);
            } else {
                debug("using custom base64 encoder");
                b64 += Base64.encode(s);
            }
            
            return b64;
        }
    
        function exportImage(type) {
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext('2d');
    
            // TODO: if (options.keepOutsideViewport), do some translation magic?
    
            var svg_img = new Image();
            var svg_xml = XMLSerialize(_svg);
            svg_img.src = base64dataURLencode(svg_xml);
    
            svg_img.onload = function() {
                debug("exported image size: " + [svg_img.width, svg_img.height])
                canvas.width = svg_img.width;
                canvas.height = svg_img.height;
                ctx.drawImage(svg_img, 0, 0);
    
                // SECURITY_ERR WILL HAPPEN NOW
                var png_dataurl = canvas.toDataURL(type);
                debug(type + " length: " + png_dataurl.length);
    
                if (options.callback) options.callback( png_dataurl );
                else debug("WARNING: no callback set, so nothing happens.");
            }
            
            svg_img.onerror = function() {
                console.log(
                    "Can't export! Maybe your browser doesn't support " +
                    "SVG in img element or SVG input for Canvas drawImage?\n" +
                    "http://en.wikipedia.org/wiki/SVG#Native_support"
                );
            }
    
            // NOTE: will not return anything
        }
    
        function exportImageCanvg(type) {
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext('2d');
            var svg_xml = XMLSerialize(_svg);
    
            // NOTE: canvg gets the SVG element dimensions incorrectly if not specified as attributes
            //debug("detected svg dimensions " + [_svg.clientWidth, _svg.clientHeight])
            //debug("canvas dimensions " + [canvas.width, canvas.height])
    
            var keepBB = options.keepOutsideViewport;
            if (keepBB) var bb = _svg.getBBox();
    
            // NOTE: this canvg call is synchronous and blocks
            canvg(canvas, svg_xml, { 
                ignoreMouse: true, ignoreAnimation: true,
                offsetX: keepBB ? -bb.x : undefined, 
                offsetY: keepBB ? -bb.y : undefined,
                scaleWidth: keepBB ? bb.width+bb.x : undefined,
                scaleHeight: keepBB ? bb.height+bb.y : undefined,
                renderCallback: function() {
                    debug("exported image dimensions " + [canvas.width, canvas.height]);
                    var png_dataurl = canvas.toDataURL(type);
                    debug(type + " length: " + png_dataurl.length);
        
                    if (options.callback) options.callback( png_dataurl );
                }
            });
    
            // NOTE: return in addition to callback
            return canvas.toDataURL(type);
        }
    
        // BEGIN MAIN
    
        if (!type) type = "image/svg+xml";
        if (!options) options = {};
    
        if (options.keepNonSafe) debug("NOTE: keepNonSafe is NOT supported and will be ignored!");
        if (options.keepOutsideViewport) debug("NOTE: keepOutsideViewport is only supported with canvg exporter.");
        
        switch (type) {
            case "image/svg+xml":
                return exportSVG();
                break;
    
            case "image/png":
            case "image/jpeg":
    
                if (!options.renderer) {
                    if (window.canvg) options.renderer = "canvg";
                    else options.renderer="native";
                }
    
                switch (options.renderer) {
                    case "canvg":
                        debug("using canvg renderer for png export");
                        return exportImageCanvg(type);
                        break;
    
                    case "native":
                        debug("using native renderer for png export. THIS MIGHT FAIL.");
                        return exportImage(type);
                        break;
    
                    default:
                        debug("unknown png renderer given, doing noting (" + options.renderer + ")");
                }
    
                break;
    
            default:
                debug("Sorry! Exporting as '" + type + "' is not supported!")
        }
    }
    </script>