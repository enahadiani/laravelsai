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
        <div class="col-md-6">
            <h6 class='font-weight-light' style='color: #000000; font-size:22px !important;'>Realisasi Jenis Investasi per <span id='jplan' style="font-size:22px !important;"></span></h6>
        </div>
        <div class="col-md-6 text-right">
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
        <div class="col-md-12"><span style='font-size: 1.2rem; color: black;position: relative;' id='tglChart'></span>
            <span hidden id='kode_plan'></span>
            <span id='kode_klp_view' style='font-size: 1.2rem;color: black;'></span><span id='kode_klp' hidden></span>
        </div>
    </div>
    <div class="row body-dash" style="position: relative;">
        <div class='col-md-6' style='height:530px;border-right:1px solid #BEBEBE;border-bottom:1px solid #BEBEBE;display:grid'>
            <div id='aset' style='margin:5px'></div>
        </div>
        <div class='col-md-6' style='height:530px;border-right:1px solid #BEBEBE;border-bottom:1px solid #BEBEBE;display:grid'>
            <div class='panel mar-mor box-wh' style='box-shadow: none;'>
                <div class='panel-body' style='height:265px;padding-right: 0px;padding-top:0'>
                    <div class="row">
                        <div id='efek' style='margin: 0 auto; padding: 0 auto;height:250px;' class='col-md-5 col-5'>
                        </div>
                        <div style='margin: 0 auto; padding-right: 10px;padding-top:10px;' class='col-md-7 col-7'>
                            <span style='font-size: 15px'> Efek Berpendapatan Tetap</span>:
                            <span class='pull-right' style='font-size: 15px' id='persenEbt'></span>
                            <div id='ebtDet' style='margin: 0 auto; padding-right: 10px;padding-top:10px;font-size:12px'>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='panel mar-mor box-wh' style='box-shadow: none;border-top:1px solid #BEBEBE'>
                <div class='panel-body' style='height:265px;padding-right: 0px;padding-top:0'>
                    <div class="row">
                        <div id='saham' style='margin: 0 auto; padding: 0 auto;height:250px;' class='col-md-5 col-5'>
                        </div>
                        <div style='margin: 0 auto; padding-right: 10px;padding-top:10px;' class='col-md-7 col-7' >
                            <span style='font-size: 15px'> Saham Bursa</span>:
                            <span class='pull-right' style='font-size: 15px' id='persenSb'></span>
                            <div id='sbDet' style='margin: 0 auto; padding-right: 10px;padding-top:10px;font-size:12px'>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-md-6' style='height:300px;border-right:1px solid #BEBEBE;border-bottom:1px solid #BEBEBE'>
            <div class='panel mar-mor box-wh' style='box-shadow: none;'>
                <div class='panel-body' style='height:245px;padding-right: 0px;padding-top:0'>
                <div class="row">
                    <div id='kas' style='margin: 0 auto; padding: 0 auto;height:250px;' class='col-md-5 col-5'>
                    </div>
                    <div style='margin: 0 auto; padding-right: 10px;padding-top:10px;' class='col-md-7 col-7'>
                        <span style='font-size: 15px'> Kas</span>:
                        <span class='pull-right' style='font-size: 15px' id='persenKas'></span>
                        <div  id='kasDet' style='margin: 0 auto; padding-right: 10px;padding-top:10px;font-size:12px'></div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class='col-md-6' style='height:300px;border-right:1px solid #BEBEBE;border-bottom:1px solid #BEBEBE'>
            <div class='panel mar-mor box-wh' style='box-shadow: none;'>
                <div class='panel-body' style='height:245px;padding-right: 0px;padding-top:0'>
                    <div class="row">
                        <div id='saham_np' style='margin: 0 auto; padding: 0 auto;height:250px;' class='col-md-5 col-5'>
                        </div>
                        <div style='margin: 0 auto; padding-right: 10px;padding-top:10px;' class='col-md-7 col-7'>
                            <span style='font-size: 15px'> Saham Non Publik </span>:
                            <span class='pull-right' style='font-size: 15px' id='persenPro'></span>
                            <div id='proDet' style='margin: 0 auto; padding-right: 10px;padding-top:10px;font-size:12px'>
                            
                            </div>
                        </div>
                    </div>
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
function sepNumx(x){
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
    return sepNumx(nil) + '';
}

function toJuta2(x) {
    var nil = x / 1000000;
    return sepNumPas(nil) + '';
}

function toMilyar(x) {
    var nil = x / 1000000000;
    return sepNumx(nil) + ' M';
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
            loadService('asetchart','GET',"{{ url('yakes-dash/aset-chart') }}"); 
            loadService('getPersen','GET',"{{ url('yakes-dash/persen') }}"); 
            loadService('getPortofolio','GET',"{{ url('yakes-dash/portofolio') }}"); 
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
    
    loadService('asetchart','GET',"{{ url('yakes-dash/aset-chart') }}"); 
    loadService('getPersen','GET',"{{ url('yakes-dash/persen') }}"); 
    loadService('getPortofolio','GET',"{{ url('yakes-dash/portofolio') }}"); 
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
                loadService('asetchart','GET',"{{ url('yakes-dash/aset-chart') }}"); 
                loadService('getPersen','GET',"{{ url('yakes-dash/persen') }}"); 
                loadService('getPortofolio','GET',"{{ url('yakes-dash/portofolio') }}"); 
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
                    loadService('asetchart','GET',"{{ url('yakes-dash/aset-chart') }}"); 
                    loadService('getPersen','GET',"{{ url('yakes-dash/persen') }}"); 
                    loadService('getPortofolio','GET',"{{ url('yakes-dash/portofolio') }}"); 
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
                    case 'getPortofolio' :
                        var html = '';
                        var kas = [];
                        var color = ['#007AFF', '#FFCC00', '#4CD964', '#9F9F9F', '#8085e9', '#f15c80', '#e4d354', '#2b908f', '#f45b5b', '#91e8e1'];
                        var totKas=0;
                        for(var i=0;i< result.data.kas.length;i++){
                            var nama = result.data.kas[i].nama;
                            var tmp = nama.split('.');
                            totKas+=+parseFloat(result.data.kas[i].n3);
                            var per = (result.data.kas[i].persen != 'undefined' ? sepNumx(result.data.kas[i].persen) : 0);
                            html +=`<div class='row trail kas rowke`+i+`' style='border-left:4px solid `+color[i]+`;margin-bottom:10px;margin-right: -10px;background:#F0F0F0'>
                                <div class='col-md-4' style='padding-right:0'>
                                <p hidden class='kd_nrc'>`+result.data.kas[i].kode_subkelas+`</p>`+nama+` `+per+`%
                                </div>
                                <div class='col-md-8 text-right'><h1 hidden>`+color[i]+`</h1>
                                `+sepNumPas(result.data.kas[i].n3)+` <i class='fa fa-arrow-up' style='-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);'></i>
                                </div>
                            </div>`;
                        }
                        html +=`<div class='row trail kas rowkex' style='margin-bottom:10px;margin-right: -10px;font-weight:bold;background:#F0F0F0'>
                                <div class='col-md-4' style='padding-right:0'>
                                <p hidden class='kd_nrc'>jumlahKas</p>Jumlah
                                </div>
                                <div class='col-md-8 text-right' style='padding-right:32px'><h1 hidden>black</h1>
                                `+sepNumPas(totKas)+`
                                </div>
                            </div>`;
                        $('#kasDet').html(html);

                        var html = '';
                        var ebt = [];
                        var totEbt =0;
                        for(var i=0;i< result.data.ebt.length;i++){
                            var nama = result.data.ebt[i].nama;
                            var tmp = nama.split('.');
                            totEbt+=+result.data.ebt[i].n3;
                            var per = (result.data.ebt[i].persen !='undefined' ? sepNumx(result.data.ebt[i].persen) : 0);

                            html +=`<div class='row trail ebt rowke`+i+`' style='border-left:4px solid `+color[i]+`;margin-bottom:10px;margin-right: -10px;background:#F0F0F0'>
                                <div class='col-md-4' style='padding-right:0'>
                                <p hidden class='kd_nrc'>`+result.data.ebt[i].kode_subkelas+`</p>`+nama+`  `+per+`%
                                </div>
                                <div class='col-md-8 text-right'><h1 hidden>`+color[i]+`</h1>
                                `+sepNumPas(result.data.ebt[i].n3)+` <i class='fa fa-arrow-up' style='-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);'></i>
                                </div>
                            </div>`;
                        }
                        html +=`<div class='row trail kas rowkex' style='margin-bottom:10px;margin-right: -10px;font-weight:bold;background:#F0F0F0'>
                                <div class='col-md-4' style='padding-right:0'>
                                <p hidden class='kd_nrc'>jumlahKas</p>Jumlah
                                </div>
                                <div class='col-md-8 text-right' style='padding-right:32px'><h1 hidden>black</h1>
                                `+sepNumPas(totEbt)+`
                                </div>
                            </div>`;
                        $('#ebtDet').html(html);

                        var html = '';
                        var sb = [];
                        var totSb=0;
                        for(var i=0;i< result.data.sb.length;i++){
                            var nama = result.data.sb[i].nama;
                            var tmp = nama.split('.');
                            totSb+=+result.data.sb[i].n3;
                            var per = (result.data.sb[i].persen !='undefined' ? sepNumx(result.data.sb[i].persen) : 0);
                            html +=`<div class='row trail sb rowke`+i+`' style='border-left:4px solid `+color[i]+`;margin-bottom:10px;margin-right: -10px;background:#F0F0F0'>
                                <div class='col-md-4' style='padding-right:0'>
                                <p hidden class='kd_nrc'>`+result.data.sb[i].kode_subkelas+`</p>`+nama+`  `+per+`%
                                </div>
                                <div class='col-md-8 text-right'><h1 hidden>`+color[i]+`</h1>
                                `+sepNumPas(result.data.sb[i].n3)+` <i class='fa fa-arrow-up' style='-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);'></i>
                                </div>
                            </div>`;
                        }
                        html +=`<div class='row trail kas rowkex' style='margin-bottom:10px;margin-right: -10px;font-weight:bold;background:#F0F0F0'>
                            <div class='col-md-4' style='padding-right:0'>
                            <p hidden class='kd_nrc'>jumlahKas</p>Jumlah
                            </div>
                            <div class='col-md-8 text-right' style='padding-right:32px'><h1 hidden>black</h1>
                            `+sepNumPas(totSb)+`
                            </div>
                        </div>`;
                        $('#sbDet').html(html);

                        var html = '';
                        var pro = [];
                        var totPro=0;
                        for(var i=0;i< result.data.pro.length;i++){
                            var nama = result.data.pro[i].nama;
                            totPro+=+result.data.pro[i].n3;
                            var per = (result.data.pro[i].persen != 'undefined' ? sepNumx(result.data.pro[i].persen) : 0);
                            html +=`<div class='row trail pro rowke`+i+`' style='border-left:4px solid `+color[i]+`;margin-bottom:10px;margin-right: -10px;background:#F0F0F0'>
                                <div class='col-md-4' style='padding-right:0'>
                                <p hidden class='kd_nrc'>`+result.data.pro[i].kode_mitra+`</p>`+nama+`  `+per+`%
                                </div>
                                <div class='col-md-8 text-right'><h1 hidden>`+color[i]+`</h1>
                                `+sepNumPas(result.data.pro[i].n3)+` <i class='fa fa-arrow-up' style='-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);'></i>
                                </div>
                            </div>`;
                        }
                        html +=`<div class='row trail kas rowkex' style='margin-bottom:10px;margin-right: -10px;font-weight:bold;background:#F0F0F0'>
                            <div class='col-md-4' style='padding-right:0'>
                            <p hidden class='kd_nrc'>jumlahKas</p>Jumlah
                            </div>
                            <div class='col-md-8 text-right' style='padding-right:32px'><h1 hidden>black</h1>
                            `+sepNumPas(totPro)+`
                            </div>
                        </div>`;
                        $('#proDet').html(html);

                        var Kasc = Highcharts.chart('kas', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: ''
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false,
                                        format: '<strong>{point.name}</strong>{point.percentage:.2f}%',
                                        style:{
                                            width:'120px'
                                        }
                                    },
                                    // size:'60%',
                                    showInLegend: false
                                }
                            },
                            series: [{
                                name: 'Nilai',
                                data: result.data.kas_chart
                            }],
                            credits:{
                                enabled:false
                            }
                        });

                        $('.kas').each(function (i, value) {
                            $(this).hover(function (e) {
                                var x = $(this).index();
                                var point = Kasc.series[0].data[x]; //Or any other point
                                if(point != 'undefined'){
                                    point.select();
                                    Kasc.tooltip.refresh(point);
                                }
                            });
                        });
                        
                        var Saham = Highcharts.chart('saham', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: ''
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false,
                                        format: '<strong>{point.name}</strong>{point.percentage:.2f}%',
                                        style:{
                                            width:'120px'
                                        }
                                    },
                                    // size:'60%',
                                    showInLegend: false
                                }
                            },
                            series: [{
                                name: 'Nilai',
                                data: result.data.sb_chart
                            }],
                            credits:{
                                enabled:false
                            }
                        });

                        $('.sb').each(function (i, value) {
                            $(this).hover(function (e) {
                                var x = $(this).index();
                                var point = Saham.series[0].data[x]; //Or any other point
                                if(point != 'undefined'){
                                    point.select();
                                    Saham.tooltip.refresh(point);
                                }
                            });
                        });

                        var Efek = Highcharts.chart('efek', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: ''
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false,
                                        format: '<strong>{point.name}</strong>{point.percentage:.2f}%',
                                        style:{
                                            width:'120px'
                                        }
                                    },
                                    // size:'60%',
                                    showInLegend: false
                                }
                            },
                            series: [{
                                name: 'Brands',
                                data: result.data.ebt_chart
                            }],
                            credits:{
                                enabled:false
                            }
                        });

                        $('.ebt').each(function (i, value) {
                            $(this).hover(function (e) {
                                var x = $(this).index();
                                var point = Efek.series[0].data[x]; //Or any other point
                                if(point != 'undefined'){
                                    point.select();
                                    Efek.tooltip.refresh(point);
                                }
                            });
                        });
                        
                        var Pro = Highcharts.chart('saham_np', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: ''
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false,
                                        format: '<strong>{point.name}</strong>{point.percentage:.2f}%',
                                        style:{
                                            width:'120px'
                                        }
                                    },
                                    // size:'60%',
                                    showInLegend: false
                                }
                            },
                            series: [{
                                name: 'Brands',
                                data: result.data.pro_chart
                            }],
                            credits:{
                                enabled:false
                            }
                        });

                        $('.pro').each(function (i, value) {
                            $(this).hover(function (e) {
                                var x = $(this).index();
                                var point = Pro.series[0].data[x]; //Or any other point
                                if(point != 'undefined'){
                                    point.select();
                                    Pro.tooltip.refresh(point);
                                }
                            });
                        });
                    break;
                    case 'getPersen':
                        $('#persenKas').text(sepNumx(result.data.kas.persen)+'%');
                        $('#persenEbt').text(sepNumx(result.data.ebt.persen)+'%');
                        $('#persenSb').text(sepNumx(result.data.saham.persen)+'%');
                        $('#persenPro').text(sepNumx(result.data.pro.persen)+'%');
                    break;
                    case 'asetchart':

                        Highcharts.chart('aset', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: ''
                            },
                            subtitle:{
                                text: '<span style=\"font-size:10px;\"><i>*dalam jutaan rupiah</i></span>',
                                useHTML:true,
                                verticalAlign: 'bottom'
                            },
                            tooltip: {
                                formatter: function () {
                                    return this.point.name+':<b>'+sepNumx(this.percentage)+'%</b><br>'+
                                        '<b>'+toMilyar(this.y)+'</b>';
                                }
                                
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: false,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: true,
                                        // format: '<strong>{point.name}</strong><br>{point.percentage:.2f}%<br><strong>{point.y}</strong>',
                                        // distance: '-40%'
                                        formatter: function () {
                                            return this.point.name+':<b>'+sepNumx(this.percentage)+'%</b><br>'+
                                            '<b>'+toJuta2(this.y)+'</b>';
                                        }
                                    },
                                    showInLegend: false,
                                    point:{
                                        events : {
                                            legendItemClick: function(e){
                                                var elemenTujuan = $('#BatasAlokasi');
                                               
                                                $('html,body').animate({
                                                    scrollTop: 700
                                                },1200,'swing');
                                                e.preventDefault();

                                            },
                                            click: function() {
                                                var id = this.name;                            
                                                var tgl = $('#tglChart').text();
                                                var tgl2 = tgl.split(' ');
                                                var filtertgl = reverseDate(tgl2[1]);
                                                // alert (filtertgl);
                                                var plan = $('#kode_plan').text();
                                                var kode_klp = $('#kode_klp').text();
                                                // window.parent.system.getResource(".$resource.").doOpen('server_report_saku3_dash_rptDashYakesInves2Det','','$kode_lokasi|$periode|$kode_pp|$nik|$kode_fs|'+filtertgl+'|'+plan+'|'+kode_klp);
                                            }
                                        }
                                    }
                                }
                            },
                            series: [{
                                name: '',
                                colorByPoint: true,
                                data: [{
                                    name: 'Kas',
                                    y: parseFloat(result.data.kas),
                                    color:'#007AFF',
                                    key: result.data.kas_acuan
                                }, {
                                    name: 'Pend Tetap',
                                    y: parseFloat(result.data.ebt),
                                    color:'#4CD964',
                                    key: result.data.ebt_acuan
                                }, {
                                    name: 'Saham Bursa',
                                    y: parseFloat(result.data.saham),
                                    color:'#FF9500',
                                    key: result.data.saham_acuan
                                }, {
                                    name: 'Saham Non Publik',
                                    y: parseFloat(result.data.propensa),
                                    color:'#5856d6',
                                    key: result.data.pro_acuan
                                }]
                            }],
                            credits:{
                                enabled:false
                            }
                        });
                    break;
                }
            }
        }
    });
}
</script>