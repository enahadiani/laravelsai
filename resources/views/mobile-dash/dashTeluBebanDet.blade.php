@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');  
$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2);  
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
    .btn-red{
        padding: 2px 20px;
        border-radius: 15px; 
        background:#ad1d3e;
        color:white;
        border-color: #ad1d3e;
    }
    
    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
    }
    .breadcrumb-item.active > a{
        font-weight:bold;
    }
</style>

<div class="container-fluid mt-3">
    <div class="row" >
        <div class="col-12 detail-beban">
            <a class='btn btn-outline-light' href='#' id='btnBack' style="position: absolute;right: 25px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left"></i> Back</a>
            <p class="mb-0">Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-0 pt-0">
                    <li class="breadcrumb-item"><a href="#">Management System</a></li>
                    <li class="breadcrumb-item"><a href="#">Laba Rugi</a></li>
                    <li class="breadcrumb-item"><a href="#">Beban</a></li>
                    <li class="breadcrumb-item active"><a href="#" id="breadcrumb-current"></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-2" >
        <div class="col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-4 col-sm-12 px-0">Beban per Tahun untuk Fakultas</h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-8 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab_fak" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Fakultas</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_dir" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Rektorat</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab_fak" role="tabpanel">
                            <div id='bebanFak' style='height:300px'>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_dir" role="tabpanel">
                            <div id='bebanFakNon' style='height:300px'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-4 col-sm-12 px-0">Pertumbuhan Beban per Fakultas</h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-8 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab2_fak" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Fakultas</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab2_dir" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Rektorat</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab2_fak" role="tabpanel">
                            <div id='pertumbuhan' style='height:300px'>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2_dir" role="tabpanel">
                            <div id='pertumbuhanNon' style='height:300px'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4 mb-5">
            <div class="card dash-card" style="background:#f5f5f5;border-radius:1.75rem !important">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-4 col-sm-12 px-0">Beban <span class='tahunIni'></span></h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-8 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab3_fak" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Fakultas</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3_dir" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Rektorat</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab3_fak" role="tabpanel">
                            <table class='table table-borderless' id='tablePend' style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-right">RKA '<span class='thnIni'></span></th>
                                        <th class="text-right">Realisasi '<span class='thnIni'></span></th>
                                        <th class="text-right">Pencapaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tab3_dir" role="tabpanel">
                            <table class='table table-borderless' id='tablePendNon' style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-right">RKA '<span class='thnIni'></span></th>
                                        <th class="text-right">Realisasi '<span class='thnIni'></span></th>
                                        <th class="text-right">Pencapaian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
                <div class="modal-header">
                    <h6 class="modal-title">Filter</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script> 

$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btnBack,#btn-filter').removeClass('btn-outline-light');
    $('#btnBack,#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btnBack,#btn-filter').removeClass('btn-outline-dark');
    $('#btnBack,#btn-filter').addClass('btn-outline-light');
}
$mode = localStorage.getItem("dore-theme");
$('#breadcrumb-current').html($nama);
var $k2 = "";
function sepNum(x){
    var num = parseFloat(x).toFixed(2);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
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

function getDetailBeban(periode=null,kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getDetailBeban') }}",
        dataType:"JSON",
        data:{'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca, 'kode_grafik':($kd_grafik != undefined ? $kd_grafik : "")},
        success:function(result){
            var html='';
            for(var i=0;i<result.data.data.length;i++){
                var line = result.data.data[i];
                
                html+=`<tr>
                <td style='font-weight:bold'>`+line.nama+`</td>
                <td class='text-right'>`+toMilyar(line.n2)+`</td>
                <td class='text-right'>`+toMilyar(line.n4)+`</td>
                <td class='text-right'>`+sepNum(line.capai)+`%</td>
                </tr>`;
                
            }
            $('#tablePend tbody').html(html);
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getDetailBebanNon(periode=null,kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getDetailBebanNon') }}",
        dataType:"JSON",
        data:{'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca, 'kode_grafik':($kd_grafik != undefined ? $kd_grafik : "")},
        success:function(result){
            var html='';
            for(var i=0;i<result.data.data.length;i++){
                var line = result.data.data[i];
                
                html+=`<tr>
                <td style='font-weight:bold'>`+line.nama+`</td>
                <td class='text-right'>`+toMilyar(line.n2)+`</td>
                <td class='text-right'>`+toMilyar(line.n4)+`</td>
                <td class='text-right'>`+sepNum(line.capai)+`%</td>
                </tr>`;
                
            }
            $('#tablePendNon tbody').html(html);
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getBebanFak(periode=null, kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getBebanFak') }}",
        data:{'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca, 'kode_grafik':($kd_grafik != undefined ? $kd_grafik : "")},
        dataType:"JSON",
        success:function(result){
            Highcharts.chart('bebanFak', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: result.data.ctg,
                    crosshair: true
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+toMilyar(this.y)+'</b>';
                    }
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function() {  
                                    $kd2 = this.options.tahun;
                                    $kd3 = this.options.kode_bidang;
                                    var url = "{{ url('/mobile-dash/form/dashTeluBebanDet2') }}";
                                    loadForm(url)
                                }
                            }
                        },
                        dataLabels: {
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
                                    }).text(toMilyar(this.y))[0].outerHTML;
                                }
                                // if(this.name)
                            }
                        }
                    }
                },
                series: result.data.series
            })
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getBebanFakNon(periode=null, kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getBebanFakNon') }}",
        data:{'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca, 'kode_grafik':($kd_grafik != undefined ? $kd_grafik : "")},
        dataType:"JSON",
        success:function(result){
            Highcharts.chart('bebanFakNon', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: null
                },
                xAxis: {
                    categories: result.data.ctg,
                    crosshair: true
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+toMilyar(this.y)+'</b>';
                    }
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function() {  
                                    $kd2 = this.options.tahun;
                                    $kd3 = this.options.kode_bidang;
                                    var url = "{{ url('/mobile-dash/form/dashTeluBebanDet2') }}";
                                    loadForm(url)
                                }
                            }
                        },
                        dataLabels: {
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
                                    }).text(toMilyar(this.y))[0].outerHTML;
                                }
                                // if(this.name)
                            }
                        }
                    }
                },
                series: result.data.series
            })
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getPertumbuhanBebanFak(periode=null,kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getBebanFak') }}",
        dataType:"JSON",
        data:{'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca, 'kode_grafik':($kd_grafik != undefined ? $kd_grafik : "")},
        success: function(result){
            Highcharts.chart('pertumbuhan', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                xAxis: {
                    categories:result.data.ctg
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
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
                                    }).text(toMilyar(this.y))[0].outerHTML;
                                }
                                // if(this.name)
                            }
                        },
                        enableMouseTracking: false
                    }
                },
                series: result.data.series
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getPertumbuhanBebanFakNon(periode=null,kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getBebanFakNon') }}",
        dataType:"JSON",
        data:{'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca, 'kode_grafik':($kd_grafik != undefined ? $kd_grafik : "")},
        success: function(result){
            Highcharts.chart('pertumbuhanNon', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                yAxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        formatter: function () {
                            return singkatNilai(this.value);
                        }
                    },
                },
                xAxis: {
                    categories:result.data.ctg
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
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
                                    }).text(toMilyar(this.y))[0].outerHTML;
                                }
                                // if(this.name)
                            }
                        },
                        enableMouseTracking: false
                    }
                },
                series: result.data.series
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

switch($dash_periode.type){
    case '=':
        var label = 'Periode '+namaPeriode($dash_periode.from);
        if($dash_periode.from == ""){
            if(result.data.periode_max != ""){
                $dash_periode.from = result.data.periode_max;
            }
        }
    break;
    case '<=':
        
        var label = 'Periode s.d '+namaPeriode($dash_periode.from);
        if($dash_periode.from == ""){
            if(result.data.periode_max != ""){
                $dash_periode.from = result.data.periode_max;
            }
        }
    break;
    case 'range':
        
        if($dash_periode.from == ""){
            if(result.data.periode_max != ""){
                $dash_periode.from = result.data.periode_max;
            }
        }
    
        if($dash_periode.to == ""){
            if(result.data.periode_max != ""){
                $dash_periode.to = result.data.periode_max;
            }
        }
        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);
    
    break;
    default:
        if($dash_periode.from == ""){
            if(result.data.periode_max != ""){
                $dash_periode.from = result.data.periode_max;
            }
        }
    break;
}
$('.label-periode-filter').html(label);
getPertumbuhanBebanFak($dash_periode,$kd);
getPertumbuhanBebanFakNon($dash_periode,$kd);
getBebanFak($dash_periode,$kd);
getBebanFakNon($dash_periode,$kd);
getDetailBeban($dash_periode,$kd);
getDetailBebanNon($dash_periode,$kd);

$('.tahunIni').text($dash_periode.from.substr(0,4));
$('.thnIni').text($dash_periode.from.substr(0,4));

$('.detail-beban').on('click','#btnBack',function(e){
    e.preventDefault();
    if($form_back != ""){
        var url = "{{ url('/mobile-dash/form') }}/"+$form_back;
    }else{

        var url = "{{ url('/mobile-dash/form/dashTeluBeban') }}";
    }
    loadForm(url);
});

</script>