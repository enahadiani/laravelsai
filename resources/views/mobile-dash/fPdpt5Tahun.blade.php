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
            <h6 class="mb-0 bold">Pendapatan 5 Tahun</h6>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div id="cek"></div>
    <div class="row" >
        <div class="col-lg-12 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-6 col-12">Perbandingan Anggaran dan Realisasi <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" id="ss">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab_yoy" role="tabpanel">
                            <div id="agg_yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab_curr" role="tabpanel">
                            <div id="agg" style='height:400px'></div>
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
                        <h6 class="card-title col-md-6 col-12 ">Pendapatan TF <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab2_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab2_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab2_yoy" role="tabpanel">
                            <div id="tf-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab2_curr" role="tabpanel">
                            <div id="tf" style='height:400px'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
             <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-6 col-12">Pendapatan NTF <span class="rentang-tahun"></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-6 col-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab3_yoy" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>YoY</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3_curr" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Current</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab3_yoy" role="tabpanel">
                            <div id="ntf-yoy" style='height:400px'></div>
                        </div>
                        <div class="tab-pane" id="tab3_curr" role="tabpanel">
                            <div id="ntf" style='height:400px'></div>
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
                        <h6 class="card-title col-md-6 col-12">Komposisi TF dan NTF <span class="rentang-tahun"></span></h6>
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
                        <h6 class="card-title col-md-6 col-12">Realisasi Pencapaian PDPT, PDPT TF dan PDPT NTF <span class="rentang-tahun"></span></h6>
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
</div>

<script src="{{ asset('asset_dore/js/base64.js') }}"></script>
<script>

$('.navbar_bottom').hide();
$('.nama-menu').html($nama_menu);
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
    var html = `
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
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
                    <div class="modal-footer" style="justify-content:flex-end;width:100%;border:none !important">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
                <div style='height:100px'>&nbsp;</div>
    `;
    
    $('#content-bottom-sheet').html(html);
    $('.c-bottom-sheet__sheet').css({ "width":"100%","margin-left": "0%", "margin-right":"0%"});

if(localStorage.getItem("dore-theme") == "dark"){
    $('#btn-filter').removeClass('btn-outline-light');
    $('#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btn-filter').removeClass('btn-outline-dark');
    $('#btn-filter').addClass('btn-outline-light');
}
var $mode = localStorage.getItem("dore-theme");
var $chart = {};
var $chart2 = {};
function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x);
            // console.log(x);
            var tmp = x.toString().split('.');
            // console.dir(tmp);
            if(tmp[1] != undefined){

                var y = tmp[1].substr(0,2);
                var z = tmp[0]+'.'+y;
            }else{
                var z = tmp[0];
            }
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
        url:"{{ url('/mobile-dash/periode') }}",
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
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
                            control2.setValue('');
                            var label = 'Periode '+namaPeriode($dash_periode.from);
                        break;
                        case '<=':
                            
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
                            var label = 'Periode s.d '+namaPeriode($dash_periode.from);
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
                getPendapatan($dash_periode);
                getPendapatanYoY($dash_periode);
                getPendapatanTF($dash_periode);
                getPendapatanTFYoY($dash_periode);
                getPendapatanNTF($dash_periode);
                getPendapatanNTFYoY($dash_periode);
                getKomposisi($dash_periode);
                getKomposisiYoY($dash_periode);
                getPendapatanGrowth($dash_periode);
                getPendapatanGrowthYoY($dash_periode);
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
        url:"{{ url('/mobile-dash/pend-5tahun') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            $chart = Highcharts.chart('agg', {
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

function getPendapatanYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/pend-5tahun-yoy') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            $chart = Highcharts.chart('agg_yoy', {
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
        url:"{{ url('/mobile-dash/pend-5tahun-tf') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
           
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            $chart2 = Highcharts.chart('tf', {
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

function getPendapatanTFYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/pend-5tahun-tf-yoy') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){

            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            $chart2 = Highcharts.chart('tf-yoy', {
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
        url:"{{ url('/mobile-dash/pend-5tahun-ntf') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('ntf', {
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

function getPendapatanNTFYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/pend-5tahun-ntf-yoy') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            Highcharts.chart('ntf-yoy', {
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
        url:"{{ url('/mobile-dash/pend-5tahun-komposisi') }}",
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
        url:"{{ url('/mobile-dash/pend-5tahun-komposisi-yoy') }}",
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
        url:"{{ url('/mobile-dash/pend-5tahun-growth') }}",
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


function getPendapatanGrowthYoY(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/pend-5tahun-growth-yoy') }}",
        data: {'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            console.log(result.series);
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
    getPendapatanYoY($dash_periode);
    getPendapatanTF($dash_periode);
    getPendapatanTFYoY($dash_periode);
    getPendapatanNTF($dash_periode);
    getPendapatanNTFYoY($dash_periode);
    getKomposisi($dash_periode);
    getKomposisiYoY($dash_periode);
    getPendapatanGrowth($dash_periode);
    getPendapatanGrowthYoY($dash_periode);
    $('.c-bottom-sheet').removeClass('active');
});

$('#bottom-sheet-close').hide();
$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#periode_type')[0].selectize.setValue($dash_periode.type);
    $('#periode_from')[0].selectize.setValue($dash_periode.from);
    $('#periode_to')[0].selectize.setValue($dash_periode.to);
});

$('#btn-pptx').click(function(){
    
    let pres = new PptxGenJS();
    
    // 2. Add a Slide
    let slide = pres.addSlide();

    // 3. Add one or more objects (Tables, Shapes, Images, Text and Media) to the Slide
    let textboxText = "Hello World from PptxGenJS!";
    let textboxOpts = { x: 1, y: 1, color: '363636', fill: { color:'F1F1F1' }, align: "center" };
    slide.addText(textboxText, textboxOpts);
    
    // var svg = $chart.getSVG();
    // svg64 = Base64.encode(svg);
    
    // var parser = new DOMParser(); 
    // var svgElem = parser.parseFromString(svg, "image/svg+xml").documentElement;
    
    //     // Use toDataURL extension to generate Base64 string
    // var b64 = svgElem.toDataURL();
    // $("#cek").append($("<img src='"+b64+"' alt='file.svg'/>"));
    var image2 = new Image();
    var tableImage;
    

    html2canvas(document.querySelector("#ss")).then(canvas => {
        tableImage = canvas.toDataURL("image/png");
        image2.src = tableImage;
    
        // slide.addImage({ data:b64, x:1.84, y:1.3, h:2.5, w:3.33 });
        slide.addImage({ path:tableImage, x:1.84, y:1.3, h:5, w:6.6 });
        // 4. Save the Presentation
        pres.writeFile("Sample Presentation.pptx"); 
    });

});


</script>

