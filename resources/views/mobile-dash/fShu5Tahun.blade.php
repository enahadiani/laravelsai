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
@include('mobile-dash.back')
    <div class="row">
        <div class="col-12">
            <h6 class="mb-0 bold">SHU 5 Tahun</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="col-md-6 card-title">SHU <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab_yoy" role="tabpanel">
                            <div id="shu-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab_curr" role="tabpanel">
                            <div id="shu" style='height:400px'></div>
                        </div>
                    </div>
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
                        control.addOption([{text:result.data.data[i].nama, value:result.data.data[i].periode}]);
                        control2.addOption([{text:result.data.data[i].nama, value:result.data.data[i].periode}]);
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
                getSHU($dash_periode);
                getSHUYoY($dash_periode);
                        
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

function drawVisualizationBeban() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'RKA',{ role: 'annotation'} ,'Actual',{ role: 'annotation'}, 'Capaian',{ role: 'annotation'}],
        ['2015', 24.2,24.2, 52.3, 52.3, 214.4, '214,4%'],
        ['2016', 36.2,36.2, 64.4, 64.4, 177.6, '177,6%'],
        ['2017', 70.8,70.8, 86.0, 86.0, 121.5, '121,5%'],
        ['2018', 96.0,96.0, 96.3, 96.3, 100.2, '100,2%'],
        ['2019', 108.9,108.9, 104.9, 104.9, 96.3, '96,3%'],
        ['2020', 101.9,101.9, 85.8, 85.8, 84.2, '84,2%'],
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
        
        var chart = new google.visualization.ComboChart(document.getElementById('shu'));
        chart.draw(data, options);
}

function getSHU(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/shu-5tahun') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
           
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('shu', {
                chart: {
                    type: 'column'
                },
                credits:{
                    enabled:false
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: result.categories,
                    labels: {
                        useHTML:true,
                        formatter: function() {
                            var tmp = this.value.split("|");
                            return '<p class="mb-0"><span class="text-center" style="display:inherit">'+tmp[0]+'</span><span class="text-center bold" style="display:inherit">'+sepNum(tmp[1])+'%</span></p>';
                        },
                    }
                },
                yAxis: {
                        title:'',
                    min: 0
                },
                tooltip: {
                    formatter: function () {   
                        var tmp = this.x.split("|");   
                        return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + sepNum(this.y);
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
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
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
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
                                }
                            }
                        }
                    }
                },
                series: [{
                    name: 'Melampaui',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
                    type: 'column',
                    stack: 1,
                    data: result.melampaui,
                    dataLabels:{
                        y:-20
                    }
                },{
                    name: 'Target/RKA',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                    marker: {
                        symbol: 'c-rect',
                        lineWidth:5,
                        lineColor: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                        radius: 50
                    },
                    type: 'scatter',
                    stack: 2,
                    data: result.rka,
                    dataLabels:{
                        x:-50
                    }
                }, {
                    name: 'Tidak Tercapai',
                    type: 'column',
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
                    stack: 1,
                    data: result.tdkcapai,
                    dataLabels:{
                        x:50,
                    }
                }, {
                    name: 'Actual',
                    type: 'column',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#434343' :  '#CED4DA'),
                    stack: 1,
                    data: result.actual
                }]
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

function getSHUYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/shu-5tahun-yoy') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('shu-yoy', {
                chart: {
                    type: 'column'
                },
                credits:{
                    enabled:false
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: result.categories,
                    labels: {
                        useHTML:true,
                        formatter: function() {
                            var tmp = this.value.split("|");
                            return '<p class="mb-0"><span class="text-center" style="display:inherit">'+tmp[0]+'</span><span class="text-center bold" style="display:inherit">'+sepNum(tmp[1])+'%</span></p>';
                        },
                    }
                },
                yAxis: {
                        title:'',
                    min: 0
                },
                tooltip: {
                    formatter: function () {   
                        var tmp = this.x.split("|");   
                        return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + sepNum(this.y);
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
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
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
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
                                }
                            }
                        }
                    }
                },
                series: [{
                    name: 'Melampaui',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
                    type: 'column',
                    stack: 1,
                    data: result.melampaui,
                    dataLabels:{
                        y:-20
                    }
                },{
                    name: 'Target/RKA',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                    marker: {
                        symbol: 'c-rect',
                        lineWidth:5,
                        lineColor: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                        radius: 50
                    },
                    type: 'scatter',
                    stack: 2,
                    data: result.rka,
                    dataLabels:{
                        x:-50
                    }
                }, {
                    name: 'Tidak Tercapai',
                    type: 'column',
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
                    stack: 1,
                    data: result.tdkcapai,
                    dataLabels:{
                        x:50,
                    }
                }, {
                    name: 'Actual',
                    type: 'column',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#434343' :  '#CED4DA'),
                    stack: 1,
                    data: result.actual
                }]
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
    getSHU($dash_periode);
    getSHUYoY($dash_periode);
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