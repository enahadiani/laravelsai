@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2)
@endphp

<style>
    .table td, .table th{
        padding: 4px !important;
    }
    #dropDownTgl::after
    {
        display:none;
    }
    #dropDownTgl
    {
        display:unset
    }
    .dropDownTgl
    {
        width:250px !important;
    }
    .datepicker-inline,.ui-datepicker-calendar {
        width: 100%;
    }
    .header-dash{
        background-color: white;
        position: fixed;
        top: 9%;
        margin: 0;
        margin-bottom: 0px;
        padding: 25px 0;
        padding-right: 25px;
        padding-bottom: 0;
        margin-bottom: 40px;
        width: 100%;
        z-index: 1;
    }
</style>
<div class="container-fluid mt-3">
    <div class="row header-dash">
        <div class="col-md-8 px-0">
            <h6 class='font-weight-light' style='color: #000000; font-size:22px !important;'>Kinerja <span id='jplan' style="font-size:22px !important;"></span></h6>
            <span style='font-size: 1.2rem; color: black;position: relative;' id='tglChart'></span>
            <span hidden id='kode_plan'></span>
            <span id='kode_klp_view' style='font-size: 1.2rem;color: black;'></span><span id='kode_klp' hidden></span>
        </div>
        <div class="col-md-4 text-right px-0">
            <button type='button' class='float-right ml-1' id='btn-refresh' style='border: 1px solid #d5d5d5;border-radius: 20px;padding: 5px 20px;background: white;'><i class='fa fa-refresh' style='padding-top: 4px;padding-bottom: 4px;'></i>
            </button>
            <div class="dropdown d-inline-block float-right ml-1" >
                <button class="btn btn-outline-primary dropdown-toggle mb-1" type="button"
                id="dropDownTgl" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" style='border: 1px solid #d5d5d5;border-radius: 20px !important;padding: 5px 20px;background: white;width:60px'>
                <i class='fa fa-calendar' style='padding:4px 0px;color:black;'></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropDownTgl" aria-labelledby="dropDownTgl">
                    <div class="px-3">
                        <h6 class='box-title'>
                            <i class='fa fa-calendar mr-1'></i>
                            Calendar
                        </h6>
                        
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            <button type='button' class='float-right ml-1' id='btn-filter' style='border: 1px solid #d5d5d5;border-radius: 20px;padding: 5px 20px;background: white;'><i class='fa fa-filter' style='padding:4px 0px;color:black'></i> 
            </button>
        </div>
    </div>
    <div class="row body-dash" style="position: relative;">
        <div class='col-md-10'>
            <div id='kinerja' style='margin: 0 auto; padding: 0 auto;height:400px'>
            </div>
            <div class="table-responsive">
                <table id='table-detail' class='table table-condensed table-bordered' style='font-size:10px'>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-md-2'>
            <div class='panel' style='border: 1px solid #d1d1d4;border-radius: 10px;width: 100px !important;'>
                <div class='panel-body' style='padding:5px'>
                    <center>
                        <img src ='{{ asset("img/Polygon1.png") }}'>
                        <h6 style='margin-top:5px;margin-bottom:0px' id='vsJCI'></h6>
                        <p>vs IHSG</p>
                    </center>
                </div>
            </div>
        </div>
        <div class='col-md-10'>
            <div id='kinerja2' style='margin: 0 auto; padding: 0 auto;height:400px'>
            </div>
            <div class="table-responsive">
                <table id='table-detail2' class='table table-condensed table-bordered' style='font-size:10px'>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-md-2'>
            <div class='panel' style='border: 1px solid #d1d1d4;border-radius: 10px;width: 100px !important;'>
                <div class='panel-body' style='padding:5px'>
                    <center>
                    <img src ='{{ asset("img/Polygon1.png") }}'>
                    <h6 style='margin-top:5px;margin-bottom:0px' id='vsBindo'></h6>
                    <p>vs BINDO</p>
                    </center>
                </div>
            </div>
        </div>
        <div class='col-md-10'>
            <div id='kinerja4' style='margin: 0 auto; padding: 0 auto;height:400px'>
            </div>
            <div class="table-responsive">
                <table id='table-detail4' class='table table-condensed table-bordered' style='font-size:10px'>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-md-2'>
            <div class='panel' style='border: 1px solid #d1d1d4;border-radius: 10px;width: 100px !important;'>
                <div class='panel-body' style='padding:5px'>
                    <center>
                    <img src ='{{ asset("img/Polygon1.png") }}'>
                    <h6 style='margin-top:5px;margin-bottom:0px' id='vsJCI2'></h6>
                    <p>vs IHSG</p>
                    </center>
                </div>
            </div>
        </div>
        <div class='col-md-10'>
            <div id='kinerja3' style='margin: 0 auto; padding: 0 auto;height:400px'>
            </div>
            <div class="table-responsive">
                <table id='table-detail3' class='table table-condensed table-bordered' style='font-size:10px'>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='col-md-2'>
            <div class='panel' style='border: 1px solid #d1d1d4;border-radius: 10px;width: 100px !important;'>
                <div class='panel-body' style='padding:5px'>
                    <center>
                    <img src ='{{ asset("img/Polygon1.png") }}'>
                    <h6 style='margin-top:5px;margin-bottom:0px'  id='vsRD'></h6>
                    <p>vs RD Benchmark</p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL SEARCH AKUN-->
<div class="modal" tabindex="-1" role="dialog" id="modalFilter">
    <div class="modal-dialog  modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content">
            <div style="display: block;" class="modal-header">
                <h6 class="modal-title my-2" style="position: absolute;">Filter</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right:-25px;">
                <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body pt-3">
                <div class='form-group row'>
                    <label class='control-label col-md-3'>Jenis Plan Aset</label>
                        <div class='col-md-9' style='margin-bottom:5px;'>
                            <select class='form-control selectize' id='kode_plan_inp'>
                            <option val='' disabled>Pilih Plan Aset</option>
                            </select>   
                        </div>
                </div>
                <div class='form-group row' style="display:none">
                    <label class='control-label col-md-3'>Komposisi</label>
                        <div class='col-md-9' style='margin-bottom:5px;'>
                            <select class='form-control selectize' id='kode_klp_inp'>
                            <option val='' disabled>Pilih Komposisi</option>
                        </select>      
                    </div>
                </div>
                <div class='form-group row mb-0'>
                    <div class='col-sm-12'>
                        <button type='button' class='btn btn-primary float-right' id='btnOk'>Tampilkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<script>
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
// if(localStorage.getItem("dore-theme") == "dark"){
//     $('#btn-filter').removeClass('btn-outline-light');
//     $('#btn-filter').addClass('btn-outline-dark');
// }else{
//     $('#btn-filter').removeClass('btn-outline-dark');
//     $('#btn-filter').addClass('btn-outline-light');
// }

setHeaderDash();
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
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(0);
            // console.log(x);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }else{
        return 0;
    }
}

function toJuta(x) {
    var nil = x / 1000000;
    return sepNum(nil) + '';
}

function toMilyar(x) {
    var nil = x / 1000000000;
    return sepNum(nil) + ' M';
}

function reverseDateBaru(date_str, separator,newSepar){
    if(typeof separator === 'undefined'){separator = '-'}
    if(typeof newSepar === 'undefined'){newSepar = '-'}
    date_str = date_str.split(' ');
    var str = date_str[0].split(separator);
    
    return str[2]+newSepar+str[1]+newSepar+str[0];
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


function view_klp(kode){
    var tmp1 = kode.substr(0,2);
    var tmp2 = kode.substr(2,2);
    return '('+tmp1+':'+tmp2+')';
}

$tgl_akhir = "";
$tgl_akhirx = "";
$kode_plan = "";
$kode_klp = "";
$nama_plan = "";
$tahun = "";
$tahunSebelum = "";
function getParamDefault(){
    $.ajax({
        type:"GET",
        url:"{{ url('yakes-dash/param-default') }}",
        dataType: "JSON",
        success: function(result){
            $tgl_akhir = result.data.tgl_akhir;
            $tgl_akhirx = result.data.tgl_akhirx;
            $kode_klp = result.data.kode_klp;
            $kode_plan = result.data.kode_plan;
            $nama_plan = result.data.nama_plan;
            $tahun = parseInt($tgl_akhir.substr(0,4));
            $tahunSebelum = $tahun - 1;
            $('#kode_plan').text($kode_plan);
            $('#kode_klp').text($kode_klp);
            $('#kode_klp_view').text(view_klp($kode_klp));
            $('#thnSebelum').text(' vs plan aset '+$tahunSebelum);
            $('#tglChart').text('s/d '+reverseDateBaru($tgl_akhir));
            $('#jplan').text($nama_plan);

            loadService('planAset','GET',"{{ url('yakes-dash/kinerja-plan-aset') }}");
            loadService('etf','GET',"{{ url('yakes-dash/kinerja-etf') }}");
            loadService('bindo','GET',"{{ url('yakes-dash/bindo') }}");
            loadService('bmark','GET',"{{ url('yakes-dash/bmark') }}");
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('yakes-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getParamDefault();

function getPlan(){
    $.ajax({
        type:"GET",
        url:"{{ url('yakes-dash/filter-plan') }}",
        dataType: "JSON",
        success: function(result){
            var select = $('#kode_plan_inp').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.data.status){
                if(typeof result.data.daftar !== 'undefined' && result.data.daftar.length>0){
                    for(i=0;i<result.data.daftar.length;i++){
                        control.addOption([{text:result.data.daftar[i].kode_plan+' - '+result.data.daftar[i].nama, value:result.data.daftar[i].kode_plan}]);
                    }
                }
                control.setValue($kode_plan);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('yakes-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

function getKlp(){
    $.ajax({
        type:"GET",
        url:"{{ url('yakes-dash/filter-klp') }}",
        dataType: "JSON",
        success: function(result){
            var select = $('#kode_klp_inp').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.data.status){
                if(typeof result.data.daftar !== 'undefined' && result.data.daftar.length>0){
                    for(i=0;i<result.data.daftar.length;i++){
                        control.addOption([{text:result.data.daftar[i].kode_klp, value:result.data.daftar[i].kode_klp}]);
                    }
                }
                control.setValue($kode_klp);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('yakes-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getPlan();
getKlp();
$('.header-dash').on('click', '#btn-refresh', function(){
    
    loadService('planAset','GET',"{{ url('yakes-dash/kinerja-plan-aset') }}");
    loadService('etf','GET',"{{ url('yakes-dash/kinerja-etf') }}");
    loadService('bindo','GET',"{{ url('yakes-dash/bindo') }}");
    loadService('bmark','GET',"{{ url('yakes-dash/bmark') }}");
});

$('.header-dash').on('click', '#btn-filter', function(){
    var plan = $('#kode_plan').text();
    var klp = $('#kode_klp').text();
    $('#kode_plan_inp')[0].selectize.setValue(plan);
    $('#kode_klp_inp')[0].selectize.setValue(klp);
    $('#modalFilter').modal('show');
});

$('.modal-body').on('click','#btnOk',function(){
    
    var tgl = $('#tglChart').text();
    var tgl2 = tgl.split(' ');
    var filtertgl = reverseDateBaru(tgl2[1]);
    var plan = $('#kode_plan_inp')[0].selectize.getValue();
    var kode_klp = $('#kode_klp_inp')[0].selectize.getValue();
    var nama_plan = $('#kode_plan_inp')[0].selectize.getItem($('#kode_plan_inp')[0].selectize.getValue()).text();
    var nama_plan = nama_plan.split(' - ');
    $('#jplan').text(nama_plan[1]);
    
    $('#kode_plan').text(plan);
    $('#kode_klp').text(kode_klp);
    $('#kode_klp_view').text(view_klp(kode_klp));
    
    $.ajax({
        type: 'POST',
        url:"{{ url('yakes-dash/update-param') }}",
        dataType: 'json',
        data: {'kode_plan':plan,'kode_klp':kode_klp},
        success:function(result){  
            alert(result.data.message);  
            if(result.data.status){
                
                loadService('planAset','GET',"{{ url('yakes-dash/kinerja-plan-aset') }}");
                loadService('etf','GET',"{{ url('yakes-dash/kinerja-etf') }}");
                loadService('bindo','GET',"{{ url('yakes-dash/bindo') }}");
                loadService('bmark','GET',"{{ url('yakes-dash/bmark') }}");
                $('#modalFilter').modal('hide');
            }
        }
    });
});

// The Calender

$('#calendar').datepicker({
    format: 'dd/mm/yyyy',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    }
});
    
$('#calendar').datepicker('setDate', new Date());
$('#calendar').on('changeDate', function() {
    
    var tgl = $('#calendar').datepicker('getFormattedDate');
    var tglreverse = reverseDateBaru(tgl,'/');
    if(tglreverse > $tgl_akhirx){
        alert('Data transaksi diinput terakhir '+$tgl_akhirx);
        return false;
    }else{
        var tglgrafik = reverseDateBaru(tglreverse);
        $('#tglChart').text('s/d '+tglgrafik);
        var thnSblm = parseInt(tgl.substr(6,4))-1;
        $('#thnSebelum').text(' vs plan aset '+thnSblm);
        
        var plan = $('#kode_plan').text();
        var kode_klp = $('#kode_klp').text(); 

        $.ajax({
            type: 'POST',
            url:"{{ url('yakes-dash/update-tgl') }}",
            dataType: 'json',
            data: {'tanggal':tglreverse},
            success:function(result){  
                alert(result.data.message);  
                if(result.data.status){
                    loadService('planAset','GET',"{{ url('yakes-dash/kinerja-plan-aset') }}");
                    loadService('etf','GET',"{{ url('yakes-dash/kinerja-etf') }}");
                    loadService('bindo','GET',"{{ url('yakes-dash/bindo') }}");
                    loadService('bmark','GET',"{{ url('yakes-dash/bmark') }}"); 
                }
            }
        });
    }
    
});

function loadService(index,method,url,param=null){
    $.ajax({
        type: method,
        url: url,
        dataType: 'json',
        success:function(result){    
            if(result.data.status){
                switch(index){
                    case 'planAset':
                        var html='<tr><td></td>';
                        for(var i=0;i<result.data.category.length;i++){
                            var line = result.data.category;
                            html+=`<td>`+line[i]+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:#4cd964'>`+result.data.series[0].name+`</td>`;
                        var warna =[];
                        var jum=0;var total=0;
                        for(var i=0;i<result.data.series[0].data.length;i++){
                            var line = result.data.series[0].data;
                            var line2 = result.data.series[1].data;
                            var line3 = result.data.series[2].data;
                            if(line2[i] > line3[i]){
                                warna.push('#4cd964');
                                jum+=+parseFloat(line[i]);
                            }else{
                                warna.push('red');
                                jum+=+0;
                            }
                            total+=+parseFloat(line[i]);
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                            
                        }
                        var persenVS = (jum/total)*100;
                        html+=`</tr><tr><td style='color:blue'>`+result.data.series[1].name+`</td>`;
                        for(var i=0;i<result.data.series[1].data.length;i++){
                            var line = result.data.series[1].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:red'>`+result.data.series[2].name+`</td>`;
                        for(var i=0;i<result.data.series[2].data.length;i++){
                            var line = result.data.series[2].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr>`;
                        
                        $('#vsJCI').html(sepNum(persenVS)+'%');
                        
                        Highcharts.chart('kinerja', {
                            chart: {
                                zoomType: 'xy'
                            },
                            title:{
                                text:'Saham Bursa'
                            },
                            xAxis: [{
                                labels: {
                                    enabled: false // disable labels
                                }
                            }],
                            yAxis: [{ // Primary yAxis
                                labels: {
                                    format: '{value}',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                min:0,
                                max:2000,
                                opposite: true
                                
                            }, { // Secondary yAxis
                                gridLineWidth: 0,
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                labels: {
                                    format: '{value} %',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                max:10
                                
                            }],
                            colors: warna,
                            tooltip: {
                                shared: true,
                                formatter: function () {
                                    var points = this.points;
                                    var pointsLength = points.length;
                                    var tooltipMarkup ='';
                                    var index;
                                    var y_value;
                                    
                                    for(index = 0; index < pointsLength; index += 1) {
                                        y_value = sepNum(points[index].y);
                                        
                                        tooltipMarkup += '<span style=\"color:' + points[index].series.color + '\">' + points[index].series.name + ': <b>' + y_value  + '</b></span><br/>';
                                    }
                                    
                                    return tooltipMarkup;
                                }
                            },
                            credits:{
                                enabled:false
                            },
                            plotOptions: {
                                series: {
                                    pointWidth: 50
                                },
                                line: {
                                    dataLabels: {                                
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },                      			
                                    },                      
                                },
                                column:{
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                        /* inside: true */
                                    },                                  		
                                },
                                spline : {
                                    dataLabels: {
                                        enabled: false,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                        /* inside: true */
                                    }, 
                                    marker: {
                                        enabled: false
                                    }
                                }
                            },
                            series : result.data.series,
                            legend: {
                                enabled: false,
                            }
                        },function(){
                            var series = this.series;
                            for (var i = 0, ie = series.length; i < ie; ++i) {
                                var points = series[i].data;
                                for (var j = 0, je = points.length; j < je; ++j) {
                                    if (points[j].graphic) {
                                        points[j].graphic.element.style.fill = warna[j];
                                    }
                                }
                            }
                        });
                        
                        
                        $('#table-detail tbody').html(html);
                    break;
                    case 'etf':
                        var html='<tr><td></td>';
                        for(var i=0;i<result.data.category.length;i++){
                            var line = result.data.category;
                            html+=`<td>`+line[i]+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:#4cd964'>`+result.data.series[0].name+`</td>`;
                        var warna =[];
                        var jum=0;var total=0;
                        for(var i=0;i<result.data.series[0].data.length;i++){
                            var line = result.data.series[0].data;
                            var line2 = result.data.series[1].data;
                            var line3 = result.data.series[2].data;
                            if(line2[i] > line3[i]){
                                warna.push('#4cd964');
                                jum+=+parseFloat(line[i]);
                            }else{
                                warna.push('red');
                                jum+=+0;
                            }
                            total+=+parseFloat(line[i]);
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                            
                        }
                        var persenVS = (jum/total)*100;
                        html+=`</tr><tr><td style='color:blue'>`+result.data.series[1].name+`</td>`;
                        for(var i=0;i<result.data.series[1].data.length;i++){
                            var line = result.data.series[1].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:red'>`+result.data.series[2].name+`</td>`;
                        for(var i=0;i<result.data.series[2].data.length;i++){
                            var line = result.data.series[2].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr>`;
                        
                        $('#vsJCI2').html(sepNum(persenVS)+'%');
                        
                        Highcharts.chart('kinerja4', {
                            chart: {
                                zoomType: 'xy'
                            },
                            title:{
                                text:'Reksadana Exchange Traded Fund'
                            },
                            xAxis: [{
                                
                                labels: {
                                    enabled: false // disable labels
                                }
                            }],
                            yAxis: [{ // Primary yAxis
                                labels: {
                                    format: '{value}',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                min:0,
                                max:1400,
                                opposite: true
                                
                            }, { // Secondary yAxis
                                gridLineWidth: 0,
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                labels: {
                                    format: '{value} %',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                max:10
                                
                            }],
                            colors: warna,
                            tooltip: {
                                shared: true,
                                formatter: function () {
                                    var points = this.points;
                                    var pointsLength = points.length;
                                    var tooltipMarkup ='';
                                    var index;
                                    var y_value;
                                    
                                    for(index = 0; index < pointsLength; index += 1) {
                                        y_value = sepNum(points[index].y);
                                        
                                        tooltipMarkup += '<span style=\"color:' + points[index].series.color + '\">' + points[index].series.name + ': <b>' + y_value  + '</b></span><br/>';
                                    }
                                    
                                    return tooltipMarkup;
                                }
                            },
                            credits:{
                                enabled:false
                            },
                            plotOptions: {
                                series: {
                                    pointWidth: 50
                                },
                                line: {
                                    dataLabels: {                                
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },                      			
                                    },                      
                                },
                                column:{
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                        /* inside: true */
                                    },                                  		
                                },
                                spline : {
                                    dataLabels: {
                                        enabled: false,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                        /* inside: true */
                                    }, 
                                    marker: {
                                        enabled: false
                                    }
                                }
                            },
                            series : result.data.series,
                            legend: {
                                enabled: false,
                            }
                        },function(){
                            var series = this.series;
                            for (var i = 0, ie = series.length; i < ie; ++i) {
                                var points = series[i].data;
                                for (var j = 0, je = points.length; j < je; ++j) {
                                    if (points[j].graphic) {
                                        points[j].graphic.element.style.fill = warna[j];
                                    }
                                }
                            }
                        });
                        
                        
                        $('#table-detail4 tbody').html(html);
                    break;
                    case 'bindo':
                        var html='<tr><td></td>';
                        for(var i=0;i<result.data.category.length;i++){
                            var line = result.data.category;
                            html+=`<td>`+line[i]+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:#4cd964'>`+result.data.series[0].name+`</td>`;
                        var warna=[];
                        var jum=0; var total=0;
                        for(var i=0;i<result.data.series[0].data.length;i++){
                            var line = result.data.series[0].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                            var line2 = result.data.series[1].data;
                            var line3 = result.data.series[2].data;
                            if(line2[i] > line3[i]){
                                warna.push('#4cd964');
                                jum+=+parseFloat(line[i]);
                            }else{
                                warna.push('red');
                            }
                            total+=+parseFloat(line[i]);
                        }
                        var persenVS = (jum/total)*100;
                        console.log(jum);
                        console.log(total);
                        $('#vsBindo').html(sepNum(persenVS)+'%');
                        
                        html+=`</tr><tr><td style='color:blue'>`+result.data.series[1].name+`</td>`;
                        for(var i=0;i<result.data.series[1].data.length;i++){
                            var line = result.data.series[1].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:red'>`+result.data.series[2].name+`</td>`;
                        for(var i=0;i<result.data.series[2].data.length;i++){
                            var line = result.data.series[2].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr>`;
                        
                        Highcharts.chart('kinerja2', {
                            chart: {
                                zoomType: 'xy'
                            },
                            title:{
                                text:'Reksadana Pendapatan Tetap'
                            },
                            xAxis: [{
                                labels: {
                                    enabled: false // disable labels
                                }
                            }],
                            yAxis: [{ // Primary yAxis
                                labels: {
                                    format: '{value}',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                // min:0,
                                // max:1400,
                                opposite: true
                                
                            }, { // Secondary yAxis
                                gridLineWidth: 0,
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                labels: {
                                    format: '{value} %',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                // min:-12,
                                // max:10
                                
                            }],
                            colors: warna,
                            tooltip: {
                                shared: true,
                                formatter: function () {
                                    var points = this.points;
                                    var pointsLength = points.length;
                                    var tooltipMarkup ='';
                                    var index;
                                    var y_value;
                                    
                                    for(index = 0; index < pointsLength; index += 1) {
                                        y_value = sepNum(points[index].y);
                                        
                                        tooltipMarkup += '<span style=\"color:' + points[index].series.color + '\">' + points[index].series.name + ': <b>' + y_value  + '</b></span><br/>';
                                    }
                                    
                                    return tooltipMarkup;
                                }
                            },
                            credits:{
                                enabled:false
                            },
                            plotOptions: {
                                series: {
                                    pointWidth: 50
                                },
                                line: {
                                    dataLabels: {                                
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },                      			
                                    },                      
                                },
                                column:{
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                        /* inside: true */
                                    },                                  		
                                },
                                spline : {
                                    dataLabels: {
                                        enabled: false,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                    }, 
                                    marker: {
                                        enabled: false
                                    }
                                }
                            },
                            series : result.data.series,
                            legend: {
                                enabled: false,
                            }
                        },function(){
                            var series = this.series;
                            for (var i = 0, ie = series.length; i < ie; ++i) {
                                var points = series[i].data;
                                for (var j = 0, je = points.length; j < je; ++j) {
                                    if (points[j].graphic) {
                                        points[j].graphic.element.style.fill = warna[j];
                                    }
                                }
                            }
                        });
                        
                        $('#table-detail2 tbody').html(html);
                    break;
                    case 'bmark':
                        var html='<tr><td></td>';
                        for(var i=0;i<result.data.category.length;i++){
                            var line = result.data.category;
                            html+=`<td>`+line[i]+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:#4cd964'>`+result.data.series[0].name+`</td>`;
                        var warna=[];
                        var jum=0; var total=0;
                        for(var i=0;i<result.data.series[0].data.length;i++){
                            var line = result.data.series[0].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                            var line2 = result.data.series[1].data;
                            var line3 = result.data.series[2].data;
                            if(line2[i] > line3[i]){
                                warna.push('#4cd964');
                                jum+=+line[i];
                            }else{
                                warna.push('red');
                            }
                            total+=+line[i];
                        }
                        var persenVS = (jum/total)*100;
                        console.log(jum);
                        console.log(total);
                        
                        $('#vsRD').html(sepNum(persenVS)+'%');
                        html+=`</tr><tr><td style='color:blue'>`+result.data.series[1].name+`</td>`;
                        for(var i=0;i<result.data.series[1].data.length;i++){
                            var line = result.data.series[1].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr><tr><td style='color:red'>`+result.data.series[2].name+`</td>`;
                        for(var i=0;i<result.data.series[2].data.length;i++){
                            var line = result.data.series[2].data;
                            html+=`<td>`+sepNum(line[i])+`</td>`;
                        }
                        
                        html+=`</tr>`;
                        Highcharts.chart('kinerja3', {
                            chart: {
                                zoomType: 'xy'
                            },
                            title:{
                                text:'Reksadana Campuran'
                            },
                            xAxis: [{
                                labels: {
                                    enabled: false // disable labels
                                }
                            }],
                            yAxis: [{ // Primary yAxis
                                labels: {
                                    format: '{value}',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                // min:0,
                                // max:1400,
                                opposite: true
                                
                            }, { // Secondary yAxis
                                gridLineWidth: 0,
                                title: {
                                    text: null,
                                    style: {
                                        color: 'black'
                                    }
                                },
                                labels: {
                                    format: '{value} %',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                // min:-12,
                                // max:10
                                
                            }],
                            colors:warna,
                            tooltip: {
                                shared: true,
                                formatter: function () {
                                    var points = this.points;
                                    var pointsLength = points.length;
                                    var tooltipMarkup ='';
                                    var index;
                                    var y_value;
                                    
                                    for(index = 0; index < pointsLength; index += 1) {
                                        y_value = sepNum(points[index].y);
                                        
                                        tooltipMarkup += '<span style=\"color:' + points[index].series.color + '\">' + points[index].series.name + ': <b>' + y_value  + '</b></span><br/>';
                                    }
                                    
                                    return tooltipMarkup;
                                }
                            },
                            credits:{
                                enabled:false
                            },
                            plotOptions: {
                                series: {
                                    pointWidth: 50
                                },
                                line: {
                                    dataLabels: {                                
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },                      			
                                    },                      
                                },
                                column:{
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                        /* inside: true */
                                    },                                  		
                                },
                                spline : {
                                    dataLabels: {
                                        enabled: false,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        },   
                                    }, 
                                    marker: {
                                        enabled: false
                                    }
                                }
                            },
                            series : result.data.series,
                            legend: {
                                enabled: false,
                            }
                        },function(){
                            var series = this.series;
                            for (var i = 0, ie = series.length; i < ie; ++i) {
                                var points = series[i].data;
                                for (var j = 0, je = points.length; j < je; ++j) {
                                    if (points[j].graphic) {
                                        points[j].graphic.element.style.fill = warna[j];
                                    }
                                }
                            }
                        });
                        
                        
                        $('#table-detail3 tbody').html(html);
                    break;
                }
            }
        }
    });
}
</script>