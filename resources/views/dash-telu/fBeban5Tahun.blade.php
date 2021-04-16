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
    <div class="row">
        <div class="col-12">
            <h6 class="mb-0 bold">Beban 5 Tahun</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-6 col-12">Beban <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab_yoy" role="tabpanel">
                            <div id="beban-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab_curr" role="tabpanel">
                            <div id="beban" style='height:400px'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-6 col-12">Beban SDM <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab2_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab2_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab2_yoy" role="tabpanel">
                            <div id="sdm-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab2_curr" role="tabpanel">
                            <div id="sdm" style='height:400px'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-6 col-12">Beban Non SDM <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab3_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab3_yoy" role="tabpanel">
                            <div id="non-sdm-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab3_curr" role="tabpanel">
                            <div id="non-sdm" style='height:400px'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-6 col-12">Komposisi SDM dan Beban Lain <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab4_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab4_yoy" role="tabpanel">
                            <div id="komposisi-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab4_curr" role="tabpanel">
                            <div id="komposisi" style='height:400px'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-6 col-12">Realisasi Pencapaian PDPT, Beban, SDM dan SHU <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab5_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab5_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab5_yoy" role="tabpanel">
                            <div id="komposisi2-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab5_curr" role="tabpanel">
                            <div id="komposisi2" style='height:400px'></div>
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
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.from = result.data.periode_max;
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                    case '<=':
                        
                        var label = 'Periode s.d '+namaPeriode($dash_periode.from);
                        if($dash_periode.from == ""){
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.from = result.data.periode_max;
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                    case 'range':
                        
                        if($dash_periode.from == ""){
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.from = result.data.periode_max;
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
        
                        if($dash_periode.to == ""){
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.to = result.data.periode_max;
                            }
                        }else{
                            control2.setValue($dash_periode.to);
                        }
                        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);

                    break;
                    default:
                        if($dash_periode.from == ""){
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.from = result.data.periode_max;
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
                getBeban($dash_periode);
                getBebanYoY($dash_periode);
                getBebanSDM($dash_periode);
                getBebanSDMYoY($dash_periode);
                getBebanNonSDM($dash_periode);
                getBebanNonSDMYoY($dash_periode);
                getKomposisi($dash_periode);
                getKomposisiYoY($dash_periode);
                getBebanGrowth($dash_periode);
                getBebanGrowthYoY($dash_periode);
                
                        
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
        ['2015', 248.6,248.6, 239.8, 239.8, 96.5, '96,5%'],
        ['2016', 304.4,304.4, 290.8, 290.8, 95.5, '95,5%'],
        ['2017', 307.4,307.4, 329.5, 329.5, 107.2, '107,2%'],
        ['2018', 352.5,352.5, 379.2, 379.2, 107.6, '107,6%'],
        ['2019', 391.9,391.9, 420.6, 420.6, 103.7, '103,7%'],
        ['2020', 435.6,435.6, 417.2, 417.2, 95.8, '95,8%'],
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
        
        var chart = new google.visualization.ComboChart(document.getElementById('beban'));
        chart.draw(data, options);
}

function getBeban(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('beban', {
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
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
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
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
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

function getBebanYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-yoy') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('beban-yoy', {
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
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
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
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
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

function drawVisualizationSDM() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'RKA',{ role: 'annotation'} ,'Actual',{ role: 'annotation'}, 'Capaian',{ role: 'annotation'}],
        ['2015', 130.0,130.0, 126.8, 126.8, 52, '52%'],
        ['2016', 156.3,156.3, 151.0, 151.0, 51, '51%'],
        ['2017', 158.5,158.5, 168.9, 168.9, 52, '52%'],
        ['2018', 190.7,190.7, 203.4, 203.4, 54, '54%'],
        ['2019', 218.2,218.2, 222.5, 222.5, 56, '56%'],
        ['2020', 240.7,240.7, 241.2, 241.2, 55, '55%'],
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
        
        var chart = new google.visualization.ComboChart(document.getElementById('sdm'));
        chart.draw(data, options);
}

function getBebanSDM(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-sdm') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('sdm', {
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
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
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
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
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

function getBebanSDMYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-sdm-yoy') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('sdm-yoy', {
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
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
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
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
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

function getBebanNonSDM(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-non-sdm') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('non-sdm', {
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
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
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
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
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


function getBebanNonSDMYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-non-sdm-yoy') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('non-sdm-yoy', {
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
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
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
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
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

function drawVisualizationKomposisi() {
    // Some raw data (not necessarily accurate)
    var data = $google.visualization.arrayToDataTable([
        ['', 'Beban',{ role: 'annotation'} , 'SDM',{ role: 'annotation'}],
        ['2015', 239,'65%',126.8, '35%'],
        ['2016', 290.8,'66%',151, '34%'],
        ['2017', 329.5,'66%',168.9, '34%'],
        ['2018', 379.2,'65%',203.4, '35%'],
        ['2019', 420.6,'65%',222.5, '35%'],
        ['2020', 417.2,'63%',241.2, '37%'],
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
        url:"{{ url('/telu-dash/beban-5tahun-komposisi') }}",
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

function getKomposisiYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-komposisi-yoy') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        success:function(result){
            
            Highcharts.chart('komposisi-yoy', { 
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
        ['', 'Total Beban',{ role: 'annotation'} ,'TF',{ role: 'annotation'}, 'NTF',{ role: 'annotation'}],
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

function getBebanGrowth(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-growth') }}",
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

function getBebanGrowthYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/beban-5tahun-growth-yoy') }}",
        data: {'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.chart('komposisi2-yoy', { 
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
    getBeban($dash_periode);
    getBebanYoY($dash_periode);
    getBebanSDM($dash_periode);
    getBebanSDMYoY($dash_periode);
    getBebanNonSDM($dash_periode);
    getBebanNonSDMYoY($dash_periode);
    getKomposisi($dash_periode);
    getKomposisiYoY($dash_periode);
    getBebanGrowth($dash_periode);
    getBebanGrowthYoY($dash_periode);

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