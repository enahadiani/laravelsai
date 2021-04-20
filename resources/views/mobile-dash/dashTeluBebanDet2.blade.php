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

    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
    }
    .breadcrumb-item.active > a{
        font-weight:bold;
    }
</style>

<div class="container-fluid mt-3">
    <div class="row" >
        <div class="col-12 detail2-beban">
            <a class='btn btn-outline-light' href='#' id='btnBack' style="position: absolute;right: 25px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left"></i> Back</a>
            <p class='mb-0'>Satuan Milyar Rupiah || <span class='label-periode-filter'></span> </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-0 pt-0">
                    <li class="breadcrumb-item"><a href="#">Management System</a></li>
                    <li class="breadcrumb-item"><a href="#">Laba Rugi</a></li>
                    <li class="breadcrumb-item"><a href="#">Beban</a></li>
                    <li class="breadcrumb-item"><a href="#" id="breadcrumb-current"></a></li>
                    <li class="breadcrumb-item active"><a href="#" class='label-bidang'></a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-2" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Beban per tahun tiap <span class='label-pp'></span> di <span class='label-bidang'></span></h6>
                </div>
                <div class="card-body pt-0">
                    <div id='bebanJur' style='height:350px'>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card" style="background:#f5f5f5;border-radius:1.75rem !important">
                <div class="card-header">
                    <h6 class="mt-2">Beban <span class='tahunPilih'></span></h6>
                </div>
                <div class="card-body pt-0">
                    <table class='table tabel-borderless' id='tableBeban' style="width:100%">
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

function getDataBebanJurusan(periode=null,kodeNeraca=null,kodeBidang=null,tahun=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getDataBebanJurusan') }}",
        dataType:"JSON",
        data:{ 'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca,'kode_bidang':kodeBidang,'kode_grafik':($kd_grafik != undefined ? $kd_grafik : ""),'tahun':tahun},
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
            $('#tableBeban tbody').html(html);
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

function getBebanJurusan(periode=null,kodeNeraca=null,kodeBidang=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/getBebanJurusan') }}",
        dataType:"JSON",
        data:{ 'form':$form_back,'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode,'kode_neraca':kodeNeraca,'kode_bidang':kodeBidang,'kode_grafik':($kd_grafik != undefined ? $kd_grafik : "")},
        success:function(result){
            $('.label-bidang').html(result.data.nama_bidang);
            $('.label-pp').html(result.data.nama_pp);
            Highcharts.chart('bebanJur', {
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
getBebanJurusan($dash_periode,$kd,$kd3)
getDataBebanJurusan($dash_periode,$kd,$kd3,'20'+$kd2)

$('.tahunPilih').text('20'+$kd2);
$('.thnPilih').text($kd2);

$('.detail2-beban').on('click','#btnBack',function(e){
    var url = "{{ url('/mobile-dash/form/dashTeluBebanDet') }}";
    loadForm(url);
})
</script>