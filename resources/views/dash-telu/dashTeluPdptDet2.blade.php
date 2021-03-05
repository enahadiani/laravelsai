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

</style>

<div class="container-fluid mt-3">
    <div class="row" >
        <div class="col-12 detail2-pdpt">
        <a class='btn btn-outline-light' href='#' id='btnBack' style="position: absolute;right: 25px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left"></i> Back</a>
        <p>Satuan Milyar Rupiah || Periode s/d <span class='nama-bulan'></span></p>
        </div>
    </div>
    <div class="row mt-2" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Pendapatan per tahun tiap Jurusan Fakultas <span class='nama_fakultas'></span></h6>
                </div>
                <div class="card-body pt-0">
                    <div id='pdptJur' style='height:350px'>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Pendapatan <span class='tahunPilih'></span></h6>
                </div>
                <div class="card-body pt-0">
                    <table class='no-border' id='tablePend' style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-right">RKA '<span class='thnPilih'></span></th>
                                <th class="text-right">Realisasi '<span class='thnPilih'></span></th>
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

function getDataPendJurusan(periode=null,kodeNeraca=null,kodeBidang=null,tahun=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getDataPendJurusan') }}",
        data:{ 'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca,'kode_bidang':kodeBidang,'tahun':tahun},
        dataType:"JSON",
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

function getPendapatanJurusan(periode=null,kodeNeraca=null,kodeBidang=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPendapatanJurusan') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca,'kode_bidang':kodeBidang},
        success:function(result){
            Highcharts.chart('pdptJur', {
                chart: {
                    type: 'bar'
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
                    bar: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function() {  
                                    $kd2 = this.options.key;
                                    
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
                        },
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

switch($dash_periode.type){
    case '=':
        var label = 'Periode '+namaPeriode($dash_periode.from);
        if($dash_periode.from == ""){
            if("{{ Session::get('periode') }}" != ""){
                $dash_periode.from = "{{ Session::get('periode') }}";
            }
        }
    break;
    case '<=':
        
        var label = 'Periode s.d '+namaPeriode($dash_periode.from);
        if($dash_periode.from == ""){
            if("{{ Session::get('periode') }}" != ""){
                $dash_periode.from = "{{ Session::get('periode') }}";
            }
        }
    break;
    case 'range':
        
        if($dash_periode.from == ""){
            if("{{ Session::get('periode') }}" != ""){
                $dash_periode.from = "{{ Session::get('periode') }}";
            }
        }
    
        if($dash_periode.to == ""){
            if("{{ Session::get('periode') }}" != ""){
                $dash_periode.to = "{{ Session::get('periode') }}";
            }
        }
        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);
    
    break;
    default:
        if($dash_periode.from == ""){
            if("{{ Session::get('periode') }}" != ""){
                $dash_periode.from = "{{ Session::get('periode') }}";
            }
        }
    break;
}
$('.label-periode-filter').html(label);
getPendapatanJurusan($dash_periode,$kd,$kd3)
getDataPendJurusan($dash_periode,$kd,$kd3,$dash_periode.from.substr(0,4));
$('.tahunPilih').text('20'+$kd2);
$('.thnPilih').text($kd2);

$('.detail2-pdpt').on('click','#btnBack',function(e){
    e.preventDefault();
    var url = "{{ url('/dash-telu/form/dashTeluPdptDet') }}";
    loadForm(url);
})
</script>