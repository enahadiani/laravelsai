@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');
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
    td,th{
        padding:4px !important;
    }
    
    .highcharts-data-label-connector{
        fill: none !important;
    }


</style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h6>Beban</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Satuan Milyar Rupiah || Periode s/d <span class='nama-bulan'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-9 col-sm-12 px-0" >Presentase RKA VS Realisasi</h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-3 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab3-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>%</b></span></a> </li>
                        </ul>
                    </div>
                   
                </div>
                <div class="card-body pt-1">
                    <p style='font-size:9px;padding-left:20px'>Klik bar untuk melihat detail</p>
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab3-persen" role="tabpanel">
                            <div id='rkaVSreal' style='height:350px'></div>
                        </div>
                        <div class="tab-pane" id="tab3-rp" role="tabpanel">
                            <div id='rkaVSrealRp' style='height:350px'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-9 col-sm-12 px-0">Komposisi Beban
                        </h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-3 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab4-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>%</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab4-persen" role="tabpanel">
                            <div id='komposisi' style='height:350px'>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4-rp" role="tabpanel">
                            <div id='komposisiRp' style='height:350px'></div>
                        </div>
                    </div>
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
    <!-- <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll ps">
                <h6 class="modal-title pl-0">Filter</h6>
                <button type="button" class="close" id="btn-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="form-filter" style="margin-top:50px">
                    <div class="form-group" style="margin-bottom:30px">
                        <label>Periode</label>
                        <select class="form-control" data-width="100%" name="periode" id="periode">
                        <option value='#'>Pilih Periode</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right ml-2">Tampilkan</button>
                    <button type="button" class="btn btn-outline-primary float-right" id="btn-reset">Reset</button>
                </form>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                    </div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
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
var $kd = "";
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
                    if($filter_periode == ""){
                        $filter_periode = "{{ Session::get('periode') }}";
                    }
                    control.setValue($filter_periode);
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

function getPresentaseRkaRealisasi(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPresentaseRkaRealisasiBeban') }}/"+periode,
        dataType:"JSON",
        data:{mode : $mode},
        success: function(result){
            Highcharts.chart('rkaVSreal', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text:  null
                },
                xAxis: {
                    categories: result.data.category,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return this.point.name+':<b>'+sepNum(this.y)+'</b> %';
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'%')[0].outerHTML;
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function() {  
                                    $kd= this.options.key;
                                    var url = "{{ url('dash-telu/form/dashTeluBebanDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    }
                },
                legend: {
                    enabled:false
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: null,
                    color: ($mode == "dark" ? "#2200FF" : "#00509D"),
                    data: result.data.data
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
    });
}

function getPresentaseRkaRealisasiRp(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPresentaseRkaRealisasiBebanRp') }}/"+periode,
        dataType:"JSON",
        data:{mode : $mode},
        success: function(result){
            Highcharts.chart('rkaVSrealRp', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text:  null
                },
                xAxis: {
                    categories: result.data.category,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return this.point.name+':<b>'+toMilyar(this.y)+'</b>';
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(toMilyar(this.y))[0].outerHTML;
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function() {  
                                    $kd= this.options.key;
                                    var url = "{{ url('dash-telu/form/dashTeluBebanDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    }
                },
                legend: {
                    enabled:false
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: null,
                    color: ($mode == "dark" ? "#2200FF" : "#00509D"),
                    data: result.data.data
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
    });
}

function getOprNonOpr(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getOprNonOprBeban') }}/"+periode,
        dataType:"JSON",
        success:function(result){
            $('#opr').text(sepNum(result.data.opr)+'%');
            $('#nonopr').text(sepNum(result.data.nonopr)+'%');
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

function getKomposisiBeban(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getKomposisiBeban') }}/"+periode,
        dataType:"JSON",
        data:{mode : $mode},
        success: function(result){
            Highcharts.chart('komposisi', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            // distance:-30,
                            
                            alignTo: 'plotEdges',
                            useHTML: true,
                            formatter: function () {
                                var name = this.point.name.split(" ");
                                return $('<div/>').css({
                                    'border' : '0',// just white in my case
                                    'max-width': '70px',
                                    'overflow':'hidden',
                                    'font-size': '10px',
                                    'color' : ($mode == "dark" ? "var(--text-color)" : "black")
                                }).addClass('fs-8').html(sepNum(this.percentage)+'%')[0].outerHTML;
                            }
                        },
                        size:'110%',
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Pendapatan',
                    colorByPoint: true,
                    data: result.data.data
                }],
                legend: {
                    itemStyle: {
                        fontSize:'8px'
                    }
                }
                
            }, function(){
                var series = this.series;
                for (var i = 0, ie = series.length; i < ie; ++i) {
                    var points = series[i].data;
                    for (var j = 0, je = points.length; j < je; ++j) {
                        if (points[j].graphic) {
                            points[j].graphic.element.style.fill = result.data.colors[j];
                        }
                    }
                }
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
    });
}

function getKomposisiBebanRp(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getKomposisiBeban') }}/"+periode,
        dataType:"JSON",
        data:{mode : $mode},
        success: function(result){
            Highcharts.chart('komposisiRp', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.2f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            // distance:-30,
                            
                            alignTo: 'plotEdges',
                            useHTML: true,
                            formatter: function () {
                                var name = this.point.name.split(" ");
                                return $('<div/>').css({
                                    'border' : '0',// just white in my case
                                    'max-width': '70px',
                                    'overflow':'hidden',
                                    'font-size': '10px',
                                    'color' : ($mode == "dark" ? "var(--text-color)" : "black")
                                }).addClass('fs-8').html(toMilyar(this.y))[0].outerHTML;
                            }
                        },
                        size:'110%',
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Pendapatan',
                    colorByPoint: true,
                    data: result.data.data
                }],
                legend: {
                    itemStyle: {
                        fontSize:'8px'
                    }
                }
                
            }, function(){
                var series = this.series;
                for (var i = 0, ie = series.length; i < ie; ++i) {
                    var points = series[i].data;
                    for (var j = 0, je = points.length; j < je; ++j) {
                        if (points[j].graphic) {
                            points[j].graphic.element.style.fill = result.data.colors[j];
                        }
                    }
                }
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
    });

}


$('.nama-bulan').text(namaPeriode($filter_periode));
getPresentaseRkaRealisasi($filter_periode);
getPresentaseRkaRealisasiRp($filter_periode);
getKomposisiBeban($filter_periode);
getKomposisiBebanRp($filter_periode);

$('#form-filter').submit(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    $filter_periode = periode;
    getKomposisiBeban(periode);
    getPresentaseRkaRealisasi(periode);
    $('.nama-bulan').text(namaPeriode($filter_periode));
    $('#modalFilter').modal('hide');
    // $('.app-menu').hide();
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#periode')[0].selectize.setValue('');
});

// $('.app-menu').hide();
   
$('#btn-filter').click(function(){
    // $('.app-menu').show();
    
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    // $('.app-menu').hide();
    
    $('#modalFilter').modal('hide');
});
    
</script>