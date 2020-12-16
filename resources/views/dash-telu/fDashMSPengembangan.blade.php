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
    .dash-card{
        border-radius: 0.75rem !important;
    }
    .dash-card > .card-body{
        border-radius: 0.75rem !important;
        padding: 1.5rem !important;
    }
    .dash-card > .card-header{
        background: var(--theme-color-1);
        color:white;
        border-top-right-radius: 0.75rem;
        border-top-left-radius: 0.75rem;
        padding: 0.5rem 1.5rem;
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
            <h1 class="mb-0 bold">Pengembangan</h1>
            <button class='btn btn-outline-light' id='btnBack' style="position: absolute;right: 135px;font-size:1rem"><i class="simple-icon-arrow-left mr-2"></i> Back</button>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Komparasi Anggaran dan Realisasi {{ $tahun }}</p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-7 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">RKA Pengembangan {{ $tahunDepan }}</h6>
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
                            <h6 class="card-title mb-0 text-right">1.000.000</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="komposisi"  style="height:300px"></div>
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
</div>
<script>
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
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

function getMsPengembangan(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-pengembangan-rka') }}",
        data:{periode : periode},
        dataType:"JSON",
        success:function(result){
            if(result.data.length > 0){
                $google.charts.load("current", {packages:['corechart']});
                $google.charts.setOnLoadCallback(function(){
                    var data = $google.visualization.arrayToDataTable(result.data);
                        
                        var view = new google.visualization.DataView(data);
                        
                        var options = {
                            chartArea:{
                                width: '80%',
                                height: '85%'
                            },
                            height:'100%',
                            width: '100%',
                            legend: {position: 'none'},
                            vAxis: {format: 'decimal', title: 'Milyar Rupiah'},
                            animation: {
                                startup: true,
                                duration: 1000,
                                easing: 'out'
                            }
                        };
                        var chart = new google.visualization.ColumnChart(document.getElementById("rka"));
                        chart.draw(view, options);
                });
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
    })
}

function getMsPengembanganKomposisi(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-pengembangan-komposisi') }}",
        data:{periode : periode},
        dataType:"JSON",
        success:function(result){
            if(result.data.length > 0){
                console.log(result.data);
                $google.charts.load('current', {'packages':['corechart']});
                $google.charts.setOnLoadCallback(function (){
                    var data = $google.visualization.arrayToDataTable(result.data);
                        
                    var options = {
                        // pieSliceText: 'none',
                        chartArea:{
                            width: '100%',
                            height: '85%'
                        },
                        legend: {position: 'none'},
                        width: '100%',
                        height: '100%',
                        animation: {
                            startup: true,
                            duration: 1000,
                            easing: 'in'
                        }
                    };
                        
                    var chart = new google.visualization.PieChart(document.getElementById('komposisi'));
                    chart.draw(data, options);
                     // initial value
                    var percent = 0;
                    // start the animation loop
                    // var handler = setInterval(function(){
                    //     // values increment
                    //     percent += 1;
                    //     console.log(percent);
                    //     // apply new values
                    //     data.setValue(0, 1, percent);
                    //     data.setValue(1, 1, 100 - percent);
                    //     // update the pie
                    //     chart.draw(data, options);
                    //     // check if we have reached the desired value
                    //     if (percent > 75)
                    //         // stop the loop
                    //         clearInterval(handler);
                    // }, 10);
                });
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
    })
}

getMsPengembangan("{{$periode}}");
getMsPengembanganKomposisi("{{$periode}}");
    
$('#form-filter').submit(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    getMsPengembangan(periode);
    getMsPengembanganKomposisi(periode);
    var tahun = parseInt(periode.substr(0,4));
    var tahunLalu = tahun-1;
    $('.thnLalu').text(tahunLalu);
    $('.thnIni').text(tahun);
    $('.periode-label').html(namaPeriode(periode));
    $('.bulan-label').html(namaPeriodeBulan(periode));
    $('.tahun-label').html(periode.substr(0,4));
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

$('#btnBack').click(function(e){
    e.preventDefault();
    var url = "{{ url('/dash-telu/form/fDashManagementSystem') }}";
    loadForm(url);
});

</script>