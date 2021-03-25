@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$tahunDepan = intval($tahun)+1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2)
@endphp

<style>
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .fs-8{
        font-size: 8px !important;
    }
    
    .fs-10{
        font-size: 10px !important;
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
    .card-title{
        color:white !important;
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
        <div class="col-12 pengembangan">
            <h6 class="mb-0 bold">Pengembangan</h6>
            <a class='btn btn-outline-light' href='#' id='btnBack' style="position: absolute;right: 135px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left mr-2"></i> Back</a>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-7 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">RKA Pengembangan <span class="tahunDepan"></span> per Fakultas </h6>
                </div>
                <div class="card-body">
                    <div id="rka" style="height:300px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h6 class="card-title mb-0">Komposisi RKA</h6>
                        </div>
                        <div class="col-md-6 col-12">
                            <h6 class="card-title mb-0 text-right" id="komposisi-total"></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="komposisi"  style="height:300px"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-7 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">RKA Pengembangan <span class="tahunDepan"></span> per Direktorat </h6>
                </div>
                <div class="card-body">
                    <div id="rka_dir" style="height:300px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h6 class="card-title mb-0">Komposisi Realisasi</h6>
                        </div>
                        <div class="col-md-6 col-12">
                            <h6 class="card-title mb-0 text-right" id="komposisi-total2"></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="komposisi2"  style="height:300px"></div>
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
$('.tahunDepan').hide();
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btnBack,#btn-filter').removeClass('btn-outline-light');
    $('#btnBack,#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btnBack,#btn-filter').removeClass('btn-outline-dark');
    $('#btnBack,#btn-filter').addClass('btn-outline-light');
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
                    break;
                    case 'range':
                        
                        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);
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
                
                var tahun = parseInt($dash_periode.from.substr(0,4));
                var tahunDepan = tahun+1;
                $('.tahunDepan').text(tahunDepan);
                getMsPengembangan($dash_periode);
                getMsPengembanganDir($dash_periode);
                getMsPengembanganKomposisi($dash_periode);
                        
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

function getMsPengembangan(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-pengembangan-rka') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            // if(result.series.length > 0){
                var $colors = result.colors;
                // Highcharts.addEvent(Highcharts.Chart.prototype, 'render', function colorPoints() {
                //     var series = this.series;
                //     for (var i = 0, ie = series.length; i < ie; ++i) {
                //         var points = series[i].data;
                //         for (var j = 0, je = points.length; j < je; ++j) {
                //             if (points[j].graphic) {
                //                 points[j].graphic.element.style.fill = $colors[j];
                //             }
                //         }
                //     }
                // });
                
                Highcharts.chart('rka', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: result.ctg
                    },
                    yAxis: [{
                        min: 0,
                        title: {
                            text: ''
                        },
                        labels: {
                            formatter: function () {
                                return singkatNilai(this.value);
                            }
                        },
                    }],
                    legend:{
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        shared: true
                    },
                    plotOptions: {
                        column: {
                            grouping: false,
                            shadow: false,
                            borderWidth: 0,
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
                                        }).text(toJuta(this.y))[0].outerHTML;
                                    }
                                    // if(this.name)
                                }
                            }
                        }
                    },
                    series: result.series
                }, function(){
                    var series = this.series;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        for (var j = 0, je = points.length; j < je; ++j) {
                            if (points[j].graphic) {
                                points[j].graphic.element.style.fill = $colors[j];
                            }
                        }
                    }
                });
                
                // $google.charts.load("current", {packages:['corechart']});
                // $google.charts.setOnLoadCallback(function(){
                //     var data = $google.visualization.arrayToDataTable(result.data);
                        
                //         var view = new google.visualization.DataView(data);
                        
                //         var options = {
                //             chartArea:{
                //                 width: '80%',
                //                 height: '85%'
                //             },
                //             height:'100%',
                //             width: '100%',
                //             legend: {position: 'none'},
                //             vAxis: {format: 'decimal', title: 'Milyar Rupiah'},
                //             animation: {
                //                 startup: true,
                //                 duration: 1000,
                //                 easing: 'out'
                //             }
                //         };
                //         var chart = new google.visualization.ColumnChart(document.getElementById("rka"));
                //         chart.draw(view, options);
                // });
            // }
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

function getMsPengembanganDir(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-pengembangan-rka-dir') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            // if(result.series.length > 0){
                var $colors = result.colors;
                // Highcharts.addEvent(Highcharts.Chart.prototype, 'render', function colorPoints() {
                //     var series = this.series;
                //     for (var i = 0, ie = series.length; i < ie; ++i) {
                //         var points = series[i].data;
                //         for (var j = 0, je = points.length; j < je; ++j) {
                //             if (points[j].graphic) {
                //                 points[j].graphic.element.style.fill = $colors[j];
                //             }
                //         }
                //     }
                // });
                
                Highcharts.chart('rka_dir', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: result.ctg
                    },
                    yAxis: [{
                        min: 0,
                        title: {
                            text: ''
                        },
                        labels: {
                            formatter: function () {
                                return singkatNilai(this.value);
                            }
                        },
                    }],
                    legend:{
                        enabled: false
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        shared: true
                    },
                    plotOptions: {
                        column: {
                            grouping: false,
                            shadow: false,
                            borderWidth: 0,
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
                                        }).text(toJuta(this.y))[0].outerHTML;
                                    }
                                    // if(this.name)
                                }
                            }
                        }
                    },
                    series: result.series
                }, function(){
                    var series = this.series;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        for (var j = 0, je = points.length; j < je; ++j) {
                            if (points[j].graphic) {
                                points[j].graphic.element.style.fill = $colors[j];
                            }
                        }
                    }
                });
                
                // $google.charts.load("current", {packages:['corechart']});
                // $google.charts.setOnLoadCallback(function(){
                //     var data = $google.visualization.arrayToDataTable(result.data);
                        
                //         var view = new google.visualization.DataView(data);
                        
                //         var options = {
                //             chartArea:{
                //                 width: '80%',
                //                 height: '85%'
                //             },
                //             height:'100%',
                //             width: '100%',
                //             legend: {position: 'none'},
                //             vAxis: {format: 'decimal', title: 'Milyar Rupiah'},
                //             animation: {
                //                 startup: true,
                //                 duration: 1000,
                //                 easing: 'out'
                //             }
                //         };
                //         var chart = new google.visualization.ColumnChart(document.getElementById("rka"));
                //         chart.draw(view, options);
                // });
            // }
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

function getMsPengembanganKomposisi(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-pengembangan-komposisi') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            // $('#komposisi-total').html('Rp.'+sepNumPas(result.total));
            var $colors = result.colors;
            // Highcharts.addEvent(Highcharts.Chart.prototype, 'render', function colorPoints() {
            //     var series = this.series;
            //     for (var i = 0, ie = series.length; i < ie; ++i) {
            //         var points = series[i].data;
            //         for (var j = 0, je = points.length; j < je; ++j) {
            //             if (points[j].graphic) {
            //                 points[j].graphic.element.style.fill = $colors[j];
            //             }
            //         }
            //     }
            // });
            Highcharts.chart('komposisi', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Rp. '+sepNumPas(result.total),
                    align: 'center',
                    style: {
                        fontSize: '14px'
                    },
                    verticalAlign: 'middle',
                    y: 10,
                    x: 0
                },
                yAxis: [{
                    min: 0,
                    title: {
                        text: ''
                    }
                }],
                legend:{
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.name} : {point.y} </b><br/><b>{point.percentage:.1f}%</b>'
                },
                colors: result.colors,
                plotOptions: {
                    pie: {
                        padding: 10,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        innerSize: '75%',
                        size: '70%',
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            align: 'left',
                            formatter: function () {
                                var name = this.point.name.split(" ");
                                return $('<div/>').css({
                                    'border' : '0',// just white in my case
                                    'max-width': '70px',
                                    'overflow':'hidden',
                                    'color' : ($mode == "dark" ? "var(--text-color)" : "black")
                                }).addClass('fs-8').html(name[0]+' '+name[1]+'<br>'+name[2]+':<br/>'+sepNum(this.percentage)+'%')[0].outerHTML;
                            }
                        }
                    }
                },
                series: result.series
            }, function(){
                var series = this.series;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        for (var j = 0, je = points.length; j < je; ++j) {
                            if (points[j].graphic) {
                                points[j].graphic.element.style.fill = $colors[j];
                            }
                        }
                    }
            });

            Highcharts.chart('komposisi2', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Rp. '+sepNumPas(result.total_real),
                    align: 'center',
                    style: {
                        fontSize: '14px'
                    },
                    verticalAlign: 'middle',
                    y: 10,
                    x: 0
                },
                yAxis: [{
                    min: 0,
                    title: {
                        text: ''
                    }
                }],
                legend:{
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.name} : {point.y} </b><br/><b>{point.percentage:.1f}%</b>'
                },
                colors: result.colors,
                plotOptions: {
                    pie: {
                        padding: 10,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        innerSize: '75%',
                        size: '70%',
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            align: 'left',
                            formatter: function () {
                                var name = this.point.name.split(" ");
                                return $('<div/>').css({
                                    'border' : '0',// just white in my case
                                    'max-width': '70px',
                                    'overflow':'hidden',
                                    'color' : ($mode == "dark" ? "var(--text-color)" : "black")
                                }).addClass('fs-8').html(name[0]+' '+name[1]+'<br>'+name[2]+':<br/>'+sepNum(this.percentage)+'%')[0].outerHTML;
                            }
                        }
                    }
                },
                series: result.series_real
            }, function(){
                var series = this.series;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        for (var j = 0, je = points.length; j < je; ++j) {
                            if (points[j].graphic) {
                                points[j].graphic.element.style.fill = $colors[j];
                            }
                        }
                    }
            });
            // if(result.data.length > 0){
            //     console.log(result.data);
            //     $google.charts.load('current', {'packages':['corechart']});
            //     $google.charts.setOnLoadCallback(function (){
            //         var data = $google.visualization.arrayToDataTable(result.data);
                        
            //         var options = {
            //             // pieSliceText: 'none',
            //             chartArea:{
            //                 width: '100%',
            //                 height: '85%'
            //             },
            //             legend: {position: 'none'},
            //             width: '100%',
            //             height: '100%',
            //             // animation: {
            //             //     startup: true,
            //             //     duration: 1000,
            //             //     easing: 'in'
            //             // },
            //             colors:result.colors
            //         };
                        
            //         var chart = new google.visualization.PieChart(document.getElementById('komposisi'));
            //         // chart.draw(data, options);
            //          // initial value
            //         var percent = 0;
            //         // start the animation loop
            //         // var handler = setInterval(function(){
            //         //     // values increment
            //         //     percent += 1;
            //         //     // apply new values
            //         //     // data.setValue(0, 1, percent);
            //         //     // data.setValue(1, 1, percent);
            //         //     // data.setValue(2, 1, percent);
            //         //     // data.setValue(3, 1, 100 - percent);
            //         //     // // update the pie
            //         //     // chart.draw(data, options);
            //         //     // check if we have reached the desired value
            //         //     if (percent > 75)
            //         //         // stop the loop
            //         //         clearInterval(handler);
            //         // }, 10);
            //     });
            // }
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
    getMsPengembangan($dash_periode);
    getMsPengembanganDir($dash_periode);
    getMsPengembanganKomposisi($dash_periode);
    var tahun = parseInt($dash_periode.from.substr(0,4));
    var tahunDepan = tahun+1;
    $('.tahunDepan').text(tahunDepan);
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

$('.pengembangan').on('click','#btnBack',function(e){
    e.preventDefault();
    var url = "{{ url('/dash-telu/form/fDashManagementSystem') }}";
    loadForm(url);
})

</script>