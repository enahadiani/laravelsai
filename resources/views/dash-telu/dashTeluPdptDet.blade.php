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

</style>

<div class="container-fluid mt-3">
    <div class="row mb-4" >
        <div class="col-12 mb-4 text-right detail-pdpt">
        <a class='btn btn-outline-light' href='#' id='btnBack' style="position: absolute;right: 25px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="row mt-2" >
        <div class="col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Pendapatan per Tahun untuk Fakultas</h6>
                </div>
                <div class="card-body pt-0">
                    <div id='pdptFak' style='height:300px'>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Pertumbuhan Pendapatan per Fakultas</h6>
                </div>
                <div class="card-body pt-0">
                    <div id='pertumbuhan' style='height:300px'>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4 mb-5">
            <div class="card dash-card" style="background:#f5f5f5;border-radius:1.75rem !important">
                <div class="card-header">
                    <h6 class="card-title" class="mt-2">Pendapatan <span class='tahunIni'></span></h6>
                </div>
                <div class="card-body pt-0">
                    <table class='no-border' id='tablePend' style="width:100%">
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

function getDetailPendapatan(periode=null,kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getDetailPendapatan') }}/"+periode+"/"+kodeNeraca,
        dataType:"JSON",
        data:{ mode : $mode},
        success:function(result){
            var html='';
            for(var i=0;i<result.data.data.length;i++){
                var line = result.data.data[i];
                            
                html+=`<tr>
                    <td style='font-weight:bold'>`+line.nama+`</td>
                    <td class='text-right'>`+toMilyar(line.n4)+`</td>
                    <td class='text-right'>`+toMilyar(line.n5)+`</td>
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
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getPendapatanFak(periode=null, kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPendapatanFak') }}/"+periode+"/"+kodeNeraca,
        dataType:"JSON",
        data:{ mode : $mode},
        success:function(result){
            Highcharts.chart('pdptFak', {
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
                    // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    //     '<td style="padding:0"><b>{point.y:.2f}</b></td></tr>',
                    // footerFormat: '</table>',
                    // // shared: true,
                    // useHTML: true
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
                                    var url = "{{ url('/dash-telu/form/dashTeluPdptDet2') }}";
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
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getPertumbuhanPendapatanFak(periode=null,kodeNeraca=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPendapatanFak') }}/"+periode+"/"+kodeNeraca,
        dataType:"JSON",
        data:{ mode : $mode},
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
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

getPertumbuhanPendapatanFak($filter_periode,$kd);
getPendapatanFak($filter_periode,$kd);
getDetailPendapatan($filter_periode,$kd);


$('.tahunIni').text($filter_periode.substr(0,4));
$('.thnIni').text($filter_periode.substr(0,4));

$('.detail-pdpt').on('click','#btnBack',function(e){
    e.preventDefault();
    var url = "{{ url('/dash-telu/form/dashTeluPdpt') }}";
    loadForm(url);
})

</script>