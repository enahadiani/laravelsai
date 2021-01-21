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
            <h6 class='font-weight-light' style='color: #000000; font-size:22px !important;'>Plan Asset vs Kewajiban Aktuaria <span id="rentang-tahun" style="font-size:22px !important;"></span>  <span id='jplan' style="font-size:22px !important;"></span></h6>
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
        <div class="col-md-12">
            <div id='planAset' style='margin: 0 auto; padding: 0 auto;height:350px'>
            </div>
        </div>
        <div class='col-md-12'>
            <style>
            th,td{
                border-bottom:1px solid black;
                border-top:1px solid black;
            }
            </style>
            <table class='table table-striped table-condensed' id='table-det'>
                <thead style='background:#ffc000;border-color:black;vertical-align:middle;text-align:center;'>
                </thead>
                <tbody style=''>
                </tbody>
            </table>
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
            $tahun10 = $tahun - 10;
            var rentang = $tahun10+' - '+$tahun;
            $('#rentang-tahun').text(rentang);
            $('#kode_plan').text($kode_plan);
            $('#kode_klp').text($kode_klp);
            $('#kode_klp_view').text(view_klp($kode_klp));
            $('#thnSebelum').text(' vs plan aset '+$tahunSebelum);
            $('#tglChart').text('s/d '+reverseDateBaru($tgl_akhir));
            $('#jplan').text($nama_plan);
            loadService('planAset','GET',"{{ url('yakes-dash/plan-aset') }}");
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
    loadService('planAset','GET',"{{ url('yakes-dash/plan-aset') }}"); 
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
                loadService('planAset','GET',"{{ url('yakes-dash/plan-aset') }}"); 
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

        var tahun = parseInt(tgl.substr(6,4));
        var tahun10 = tahun - 10;
        var rentang = tahun10+' - '+tahun;
        $('#rentang-tahun').text(rentang);
        
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
                    loadService('planAset','GET',"{{ url('yakes-dash/plan-aset') }}"); 
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
                        Highcharts.chart('planAset', {
                            chart: {
                                zoomType: 'xy'
                            },
                            title:{
                                text:null
                            },
                            xAxis: [{
                                categories: result.data.category,
                                crosshair: true
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
                                min:3500,
                                max:6500,
                                tickInterval: 500,
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
                                    format: '{value}',
                                    style: {
                                        color: 'black'
                                    }
                                },
                                tickInterval: 2,
                                min:0,
                                max:16
                                
                            }],
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
                            plotOptions: {
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
                                        inside: true
                                    },
                                }
                            },
                            series:result.data.series,
                            credits:{
                                enabled:false
                            }
                        });
                        
                        var html='<tr><th>DF</th>';
                        for(var i=0;i<result.data.df.length;i++){
                            html+=`<th style='vertical-align:middle;text-align:center'>`+sepNum(result.data.df[i])+`%</th>`;
                        }
                        html+=`</tr>`;
                        
                        $('#table-det thead').html(html);
                        
                        
                        var html='<tr><th>RKD</th>';
                        for(var i=0;i<result.data.rkd.length;i++){
                            html+=`<th style='vertical-align:middle;text-align:center'>`+sepNum(result.data.rkd[i])+`%</th>`;
                        }
                        html+=`</tr>`;
                        $('#table-det tbody').html(html);
                    break;
                }
            }
        }
    });
}
</script>