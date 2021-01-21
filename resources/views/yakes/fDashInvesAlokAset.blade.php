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
            <h6 class='font-weight-light' style='color: #000000; font-size:22px !important;'>Perbandingan Alokasi Aset <span id='jplan' style="font-size:22px !important;"></span></h6>
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
            <button type='button' class='pull-right' id='btn-colom' style='border: 1px solid #d5d5d5;border-radius: 20px;padding: 5px 20px;background: white;'><i class='fa fa-pencil' style='padding:4px 0px'></i> 
            </button>
        </div>
    </div>
    <div class="row body-dash" style="position: relative;">
        <div class="col-md-12 table-responsive">
            <table class='table table-striped table-condensed' id='tableAlok' style='font-size:11px;margin-bottom: 0;'>
                <thead>
                <tr>
                    <th rowspan='2' style='background:#4274FE;color:white;vertical-align:middle;text-align:center'>Kelompok Aset</th>
                    <th colspan='2' style='background:#F0F0F0;vertical-align:middle;text-align:center' class='tdk1' >Des <span class='tdThnLalu'></span> </th>
                    <th colspan='2' class='tdk2' style='background:#F0F0F0;vertical-align:middle;text-align:center'>Q1 <span class='tdThnNow'></span></th>
                    <th colspan='2' class='tdk3' style='background:#F0F0F0;vertical-align:middle;text-align:center'>Q2 <span class='tdThnNow'></span></th>
                    <th colspan='2' class='tdk4' style='background:#F0F0F0;vertical-align:middle;text-align:center'>Q3 <span class='tdThnNow'></span></th>
                    <th colspan='2' class='tdk5' style='background:#E5FE42;vertical-align:middle;text-align:center'><span class='tdBlnNow'></span> <span class='tdThnNow'></span></th>
                    <th colspan='3' style='background:#F0F0F0;vertical-align:middle;text-align:center'>Batasan Alokasi</th>
                </tr>
                    <tr>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Fair Value) <br>Nilai Wajar</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Realisasi) <br>Alokasi</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Fair Value) <br>Nilai Wajar</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Realisasi) <br>Alokasi</th>                                    
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Fair Value) <br>Nilai Wajar</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Realisasi) <br>Alokasi</th>                                    
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Fair Value) <br>Nilai Wajar</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>(Realisasi) <br>Alokasi</th>
                        <th style='background:#E5FE42;vertical-align:middle;text-align:center'>(Fair Value) <br>Nilai Wajar</th>
                        <th style='background:#E5FE42;vertical-align:middle;text-align:center'>(Realisasi) <br>Alokasi</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>Min</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>Alokasi <br>Acuan</th>
                        <th style='background:#F0F0F0;vertical-align:middle;text-align:center'>Max</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
            <p style='font-size:11px'><i>* dalam jutaan</i></p>
        </div>
        <div class='col-lg-8'>
            <div class='card mar-mor' style='box-shadow: none;'>
                <div id='aset' style='margin:0'></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-md-6 col-6" style="display:grid">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="card">
                                <center><p style='color: black;margin-top: 10px;margin-bottom: 0px;font-size:12px'>Plan Aset</p>
                                <p style='color: black;margin-top: 0px;margin-bottom: 5px;font-size:8px!important' id='thnSebelum'></p></center>
                                <div class="row px-3">
                                    <div class='col-xs-4 col-4 px-0 text-center' id='iconPoly'>
                                    </div>
                                    <div class='col-xs-8 col-8 px-0 text-center'>
                                        <h2 class='font-weight-bold' id='persenAset' style='font-size:18px !important;margin-top:5px'></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <center><p style='color: black;margin-top: 10px;margin-bottom: 0px;font-size:12px !important'>&nbsp;Cash Out</p>
                                <p style='color: black;margin-top: 0px;margin-bottom: 5px;font-size:8px !important'>&nbsp;CAPEX,OPEX,Claim Cost</p></center>
                                <center><h2 class='font-weight-bold' id='capex' style='margin-top: 5px;margin-bottom: 10px;font-size:18px !important'>NULL</h2></center>
                                <center><p style='color: black;margin-top: 0px;margin-bottom: 5px;font-size:8px!important'>&nbsp;s.d <span class='blnIni' style='font-size:8px!important'></span></span></p></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-6" style="display:grid">
                    <div class="card">
                        <div style='min-height:80px !important'>
                        <center><p style='color: black;margin-top: 10px;margin-bottom: 0px;font-size:12px !important'>&nbsp;Pendapatan </p></center>
                        <center><h2 class='font-weight-bold' id='totPdpt' style='margin-top: 5px;margin-bottom: 10px;font-size:18px !important'></h2></center>
                        </div>
                        <div style='min-height:80px !important;padding-bottom: 5px;'>
                        <center><p style='color: black;margin-top: 10px;margin-bottom: 0px;font-size:12px !important'>&nbsp;Beban Investasi</p></center>
                        <center><h2 class='font-weight-bold' id='totBeb' style='margin-top: 5px;margin-bottom: 20px;font-size:18px !important'></h2></center>
                        
                        <center><p style='color: black;margin-top: 0px;margin-bottom: 5px;font-size:8px !important'>&nbsp;s.d <span class='blnIni' style='font-size:8px!important'></span></p></center>
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

<div class="modal" tabindex="-1" role="dialog" id="modalColom">
    <div class="modal-dialog  modal-dialog-centered" role="document" style="max-width:600px">
        <div class="modal-content">
            <div style="display: block;" class="modal-header">
                <h6 class="modal-title my-2" style="position: absolute;">Filter</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top: 0;position: relative;z-index: 10;right:-25px;">
                <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body pt-3" style="min-height: 450px;">
                <div class='form-group row'>
                    <label class='control-label col-sm-3'>Kolom 1</label>
                    <div class='col-sm-9' style='margin-bottom:5px;'>
                        <select class='form-control selectize filter-colom' id='kolom1'>
                        <option val='' disabled>Pilih</option>
                        </select>   
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='control-label col-sm-3'>Kolom 2</label>
                    <div class='col-sm-9' style='margin-bottom:5px;'>
                        <select class='form-control selectize filter-colom' id='kolom2'>
                        <option val='' disabled>Pilih</option>
                        </select>   
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='control-label col-sm-3'>Kolom 3</label>
                    <div class='col-sm-9' style='margin-bottom:5px;'>
                        <select class='form-control selectize filter-colom' id='kolom3'>
                        <option val='' disabled>Pilih</option>
                        </select>   
                    </div>
                </div>
                <div class='form-group row'>
                    <label class='control-label col-sm-3'>Kolom 4</label>
                    <div class='col-sm-9' style='margin-bottom:5px;'>
                        <select class='form-control selectize filter-colom' id='kolom4'>
                        <option val='' disabled>Pilih</option>
                        </select>   
                    </div>
                </div>
                <div class='form-group row mb-0'>
                    <div class='col-sm-12'>
                        <button type='button' class='btn btn-primary float-right' id='btnOkCol'>Tampilkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

function toJutaPas(x) {
    var nil = x / 1000000;
    return sepNumPas(nil) + '';
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

function getBulan(periode){
    var x = periode.substr(0,4);
    var y = periode.substr(4,2);
    switch (y){
        case 1 : case '1' : case '01': bulan = 'Jan'; break;
        case 2 : case '2' : case '02': bulan = 'Feb'; break;
        case 3 : case '3' : case '03': bulan = 'Mar'; break;
        case 4 : case '4' : case '04': bulan = 'Apr'; break;
        case 5 : case '5' : case '05': bulan = 'Mei'; break;
        case 6 : case '6' : case '06': bulan = 'Jun'; break;
        case 7 : case '7' : case '07': bulan = 'Jul'; break;
        case 8 : case '8' : case '08': bulan = 'Ags'; break;
        case 9 : case '9' : case '09': bulan = 'Sep'; break;
        case 10 : case '10' : case '10': bulan = 'Okt'; break;
        case 11 : case '11' : case '11': bulan = 'Nov'; break;
        case 12 : case '12' : case '12': bulan = 'Des'; break;
        case 'Q1': bulan = 'Q1'; break;
        case 'Q2': bulan = 'Q2'; break;
        case 'Q3': bulan = 'Q3'; break;
        case 'Q4': bulan = 'Q4'; break;
        default: bulan = null;
    }
    
    return bulan+' '+x;
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
            $bulanNow = $tahun+''+$tgl_akhir.substr(5,2);
            $('#kode_plan').text($kode_plan);
            $('#kode_klp').text($kode_klp);
            $('#kode_klp_view').text(view_klp($kode_klp));
            $('#thnSebelum').text(' vs plan aset '+$tahunSebelum);
            $('#tglChart').text('s/d '+reverseDateBaru($tgl_akhir));
            $('.tdThnLalu').text($tahunSebelum);
            
            $('.tdBlnNow').text(namaPeriode($bulanNow).substr(0,3));
            
            $('.blnIni').text(namaPeriode($bulanNow));

            $('#jplan').text($nama_plan);
            loadService('persenAset','GET',"{{ url('yakes-dash/persen-aset') }}"); 
            loadService('tableAlok','GET',"{{ url('yakes-dash/table-alokasi') }}");
            loadService('roiKKP','GET',"{{ url('yakes-dash/roi-kkp') }}"); 
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

function getFilKolom(param= null){
    $.ajax({
        type: 'GET',
        url: "{{ url('yakes-dash/filter-kolom') }}",
        dataType: 'json',
        async:false,
        success:function(result){   
            var select = $('#kolom1').selectize(); 
            select = select[0];
            var control = select.selectize;
            control.clearOptions();
            
            var select2 = $('#kolom2').selectize();
            select2 = select2[0];
            var control2 = select2.selectize;
            control2.clearOptions();
            
            var select3 = $('#kolom3').selectize();
            select3 = select3[0];
            var control3 = select3.selectize;
            control3.clearOptions();
            
            var select4 = $('#kolom4').selectize();
            select4 = select4[0];
            var control4 = select4.selectize;
            control4.clearOptions();
            if(result.data.status){
                if(typeof result.data.daftar !== 'undefined' && result.data.daftar.length>0){
                    
                    for(i=0;i<result.data.daftar.length;i++){
                        control.addOption([{text:getBulan(result.data.daftar[i].periode) , value:result.data.daftar[i].periode}]);
                        control2.addOption([{text:getBulan(result.data.daftar[i].periode), value:result.data.daftar[i].periode}]);
                        control3.addOption([{text:getBulan(result.data.daftar[i].periode), value:result.data.daftar[i].periode}]);
                        control4.addOption([{text:getBulan(result.data.daftar[i].periode), value:result.data.daftar[i].periode}]);
                    }
                }
            }
        }
    });
}

getParamDefault();
getFilKolom();

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
    
    loadService('persenAset','GET',"{{ url('yakes-dash/persen-aset') }}"); 
    loadService('tableAlok','GET',"{{ url('yakes-dash/table-alokasi') }}");
    loadService('roiKKP','GET',"{{ url('yakes-dash/roi-kkp') }}"); 
});

$('.header-dash').on('click', '#btn-filter', function(){
    var plan = $('#kode_plan').text();
    var klp = $('#kode_klp').text();
    $('#kode_plan_inp')[0].selectize.setValue(plan);
    $('#kode_klp_inp')[0].selectize.setValue(klp);
    $('#modalFilter').modal('show');
});

$('.header-dash').on('click', '#btn-colom', function(){
    var plan = $('#kode_plan').text();
    var klp = $('#kode_klp').text();
    var tgl = $('#tglChart').text();
    var tgl2 = tgl.split(' ');
    var filtertgl = reverseDate(tgl2[1]);
    getFilKolom(plan+'|'+klp+'|'+filtertgl);
    $('#modalColom').modal('show');
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
                loadService('persenAset','GET',"{{ url('yakes-dash/persen-aset') }}"); 
                loadService('tableAlok','GET',"{{ url('yakes-dash/table-alokasi') }}");
                loadService('roiKKP','GET',"{{ url('yakes-dash/roi-kkp') }}"); 
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
                    loadService('persenAset','GET',"{{ url('yakes-dash/persen-aset') }}"); 
                    loadService('tableAlok','GET',"{{ url('yakes-dash/table-alokasi') }}");
                    loadService('roiKKP','GET',"{{ url('yakes-dash/roi-kkp') }}"); 
                }
            }
        });
    }
    
});

$('.modal-body').on('click','#btnOkCol',function(){
    
    var tgl = $('#tglChart').text();
    var tgl2 = tgl.split(' ');
    var filtertgl = reverseDate(tgl2[1]);
    var plan = $('#kode_plan').text();
    var kode_klp = $('#kode_klp').text();
    
    var kol1 = $('#kolom1')[0].selectize.getValue();
    var kol2 = $('#kolom2')[0].selectize.getValue();
    var kol3 = $('#kolom3')[0].selectize.getValue();
    var kol4 = $('#kolom4')[0].selectize.getValue();
    
    $.ajax({
        type: 'POST',
        url:"{{ url('yakes-dash/filter-kolom') }}",
        dataType: 'json',
        data: {'kolom1':kol1,'kolom2':kol2,'kolom3':kol3,'kolom4':kol4},
        success:function(result){  
            alert(result.data.message);  
            if(result.data.status){
                loadService('persenAset','GET',"{{ url('yakes-dash/persen-aset') }}"); 
                loadService('tableAlok','GET',"{{ url('yakes-dash/table-alokasi') }}");
                loadService('roiKKP','GET',"{{ url('yakes-dash/roi-kkp') }}"); 
                $('#modalColom').modal('hide');
            }
        }
    });
    
});

function loadService(index,method,url,param=null){
    $.ajax({
        type: method,
        url: url,
        dataType: 'json',
        success:function(result){    
            if(result.data.status){
                switch(index){
                    case 'roiKKP':
                        $('#capex').text(toMilyar(result.data.data[0].cash_out));
                        $('#totPdpt').text(toMilyar(result.data.data[0].pdpt));
                        $('#totBeb').text(toMilyar(result.data.data[0].beban_inves));
                    break;
                    case 'persenAset':
                        $('#persenAset').text(result.data.persen+'%');
                        $poly1 = "{{ asset('img/Polygon1.png') }}";
                        $poly2 = "{{ asset('img/Polygon12.png') }}";
                        if(result.data.persen < 0) {
                            $('#iconPoly').html("<img style='width: 20px;padding-top: 5px;' src='"+$poly2+"'>");
                        }else{
                            $('#iconPoly').html("<img style='width: 20px;padding-top: 5px;' src='"+$poly1+"'>");
                        }
                    break;
                    case 'tableAlok':
                        var html='';
                        $('.tdk1').text(getBulan(result.data.label1));
                        $('.tdk2').text(getBulan(result.data.label2));
                        $('.tdk3').text(getBulan(result.data.label3));
                        $('.tdk4').text(getBulan(result.data.label4));
                        $('.tdk5').text(getBulan(result.data.label5));
        
                        if(result.data.total.length > 0){

                            var linex = result.data.total[0];
                            var pc1=0; 
                            var c1=0;

                            var pc2=0; 
                            var c2=0;
                            
                            var pc3=0; 
                            var c3=0;

                            var pc4=0; 
                            var c4=0;
                            
                            var pnab_now=0; 
                            var nab_now=0;

                            var pc1=0; 
                            var c1=0;
                            for(var i=0;i<result.data.data1.length;i++){
                                var line=result.data.data1[i];
                                var line2=result.data.data2[i];
                                var line3=result.data.data3[i];
                                var line4=result.data.data4[i];
                                var line5=result.data.data5[i];

                                pc1= ( line != undefined ? (line.c1/linex.c1)*100 : 0);
                                c1+= ( line != undefined ? (line.c1/linex.c1)*100 : 0);

                                pc2= ( line2 != undefined ? (line2.c2/linex.c2)*100 : 0);
                                c2+= ( line2 != undefined ? (line2.c2/linex.c2)*100 : 0);

                                pc3= ( line3 != undefined ? (line3.c3/linex.c3)*100 : 0);
                                c3+= ( line3 != undefined ? (line3.c3/linex.c3)*100 : 0);

                                pc4= ( line4 != undefined ? (line4.c4/linex.c4)*100 : 0);
                                c4+= ( line4 != undefined ? (line4.c4/linex.c4)*100 : 0);

                                if(line5 == undefined){
                                    pnab_now= 0;
                                    nab_now+=0;
                                    var nab_now5 = 0;
                                    var bawah = 0;
                                    var acuan = 0;
                                    var atas = 0;

                                }else{
                                    pnab_now= (line5.nab_now/linex.nab_now)*100;
                                    nab_now+=(line5.nab_now/linex.nab_now)*100;
                                    var nab_now5 = line5.nab_now;
                                    var bawah = line5.bawah;
                                    var acuan = line5.acuan;
                                    var atas = line5.atas;
                                }
                                html += `<tr>
                                <th>`+line.nama+`</th>
                                <th style='text-align:right'>`+(line != undefined ? toJutaPas(line.c1) : 0 )+`</th>
                                <th style='text-align:right'>`+sepNum(pc1)+`%</th>
                                <th style='text-align:right'>`+(line2 != undefined ?toJutaPas(line2.c2) : 0)+`</th>
                                <th style='text-align:right'>`+sepNum(pc2)+`%</th>
                                <th style='text-align:right'>`+(line3 != undefined ?toJutaPas(line3.c3) : 0)+`</th>
                                <th style='text-align:right'>`+sepNum(pc3)+`%</th>
                                <th style='text-align:right'>`+(line4 != undefined ?toJutaPas(line4.c4) : 0)+`</th>
                                <th style='text-align:right'>`+sepNum(pc4)+`%</th>
                                <th style='text-align:right'>`+toJutaPas(nab_now5)+`</th>
                                <th style='text-align:right'>`+sepNum(pnab_now)+`%</th>
                                <th style='text-align:right'>`+sepNum(bawah)+`</th>    
                                <th style='text-align:right'>`+sepNum(acuan)+`</th>  
                                <th style='text-align:right'>`+sepNum(atas)+`</th>                               
                            </tr>`;
                            }
                            html+=`<tr>
                                <th  style='text-align:right;background:#4274FE;color:white'>Total</th>
                                <th style='text-align:right;background:#F0F0F0'>`+toJutaPas(linex.c1)+`</th>
                                <th  style='text-align:right;background:#F0F0F0'>`+sepNumPas(c1)+`%</th>
                                <th style='text-align:right;background:#F0F0F0'>`+toJutaPas(linex.c2)+`</th>
                                <th  style='text-align:right;background:#F0F0F0'>`+sepNumPas(c2)+`%</th>
                                <th style='text-align:right;background:#F0F0F0'>`+toJutaPas(linex.c3)+`</th>
                                <th  style='text-align:right;background:#F0F0F0'>`+sepNumPas(c3)+`%</th>
                                <th  style='text-align:right;background:#F0F0F0'>`+toJutaPas(linex.c4)+`</th>
                                <th  style='text-align:right;background:#F0F0F0'>`+sepNumPas(c4)+`%</th>
                                <th  style='text-align:right;background:#E5FE42'>`+toJutaPas(linex.nab_now)+`</th>
                                <th  style='text-align:right;background:#E5FE42'>`+sepNumPas(nab_now)+`%</th>
                                <th style='text-align:right;background:#F0F0F0'>&nbsp;</th>
                                <th style='text-align:right;background:#F0F0F0'>&nbsp;</th>
                                <th  style='text-align:right;background:#F0F0F0'>&nbsp;</th>
                            </tr>`;
                            $('#tableAlok tbody').html(html);
                        }

                        Highcharts.chart('aset', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: null
                            },
                            legend: {
                                verticalAlign: 'top',
                                y: 0
                            },
                            xAxis: {
                                categories: [
                                    'Kas',
                                    'Efek Berpendapatan Tetap',
                                    'Saham Bursa',
                                    'Saham Non Publik',
                                    'Total Plan Aset'
                                ],
                                crosshair: true,
                                plotBands: [{ // mark the weekend
                                    color: '#F0F0F0',
                                    from: 3.5,
                                    to: 6
                                }],
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Triliun rupiah'
                                }
                            },
                            credits:{
                                    enabled:false
                            },
                            tooltip: {
                                headerFormat: '<span style=\"font-size:10px\">{point.key}</span><table>',
                                pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name}: </td>' +
                                    '<td style=\"padding:0\"><b>{point.y:.2f} triliun</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: namaPeriode(result.data.name1).substr(0,3)+' '+result.data.name1.substr(0,4),
                                data: result.data.series1,
                                color:'#FF9500'
                        
                            }, {
                                name: namaPeriode(result.data.name2).substr(0,3)+' '+result.data.name2.substr(0,4),
                                data: result.data.series2,
                                color:'#4274FE'
                        
                            }]
                        });
                    break;
                }
            }
        }
    });
}
</script>