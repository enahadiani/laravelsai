@php

$poly1 = asset("image/Polygon1.png");
$poly2 = asset("image/Polygon12.png");
$group12 = asset("image/Group12.png");
$group13 = asset("image/Group13.png");
@endphp

<link href="{{ asset('asset_elite/node_modules/footable/css/footable.bootstrap.min.css') }}" rel="stylesheet">
<style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
body {
    /* font-family: 'Roboto', sans-serif !important; */
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    /* font-family: 'Roboto', sans-serif !important; */
    font-weight: normal !important;
}
h2{
    margin-bottom: 5px;
    margin-top:5px;
}
.judul-box{
    font-weight:bold;
    font-size:18px !important;
}
.inner{
    padding:5px !important;
}

.box-nil{
    margin-bottom: 20px !important;
}

.pad-more{
    padding-left:10px !important;
    padding-right:0px !important;
}
.mar-mor{
    margin-bottom:10px !important;
}
.box-wh{
    box-shadow: 0 3px 3px 3px rgba(0,0,0,.05);
}
.small-box .icon{
    top: 0px !important;
    font-size: 20px !important;
}
.bg-white{
    background:white
}
.small-box .inner{
    background: white;
    border: 1px solid white;
    border-radius: 10px !important;
}
.small-box{
    border-radius:10px !important;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.widget-user-2 .widget-user-header {

    padding: 20px;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.icon-green {
    color:white;
    background: #00a65a;
    border: 1px solid #00a65a;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-blue {
    color:white;
    background: #0073b7;
    border: 1px solid #0073b7;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-purple {
    color:white;
    background: #605ca8 !important;
    border: 1px solid #605ca8 !important;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-pink {
    color:white;
    background: #d81b60;
    border: 1px solid #d81b60;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.box-footer {

border-top-left-radius: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
border-top: 1px solid #f4f4f4;
padding: 10px;
background-color: #fff;
box-shadow: 1px 2px 2px 2px #e6e0e0e6;

}

.box-nil{
    margin-bottom: 20px !important;
}

.icon{
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.judulBox:hover{
    color:#0073b7
}

.col-md-2dot4{
    cursor:pointer;
}
</style>

<div class="container-fluid mt-3">
    <div class="row" >
        <div class="col-md-12 mb-2">
            <h3 style='position:absolute'>Dashboard</h3> 
            <button type='button' class='float-right' id='btn-refresh' style='border: 1px solid #d5d5d5;border-radius: 20px;padding: 5px 20px;background: white;'>Refresh
            </button>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2dot4">
                            <div class="card">
                                <div class="box bg-info text-center">
                                    <p hidden>JK</p>
                                    <h1 class="font-light text-white" id="juskeb">0</h1>
                                    <h6 class="text-white">Justifikasi Kebutuhan<br>&nbsp;</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2dot4">
                            <div class="card">
                                <div class="box bg-success text-center">
                                    <p hidden>VR</p>
                                    <h1 class="font-light text-white" id="ver">0</h1>
                                    <h6 class="text-white">Verifikasi<br>&nbsp;</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2dot4">
                            <div class="card">
                                <div class="box bg-primary text-center">
                                    <p hidden>AJK</p>
                                    <h1 class="font-light text-white" id="appjuskeb">0</h1>
                                    <h6 class="text-white">Approval Justifikasi Kebutuhan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2dot4">
                            <div class="card">
                                <div class="box bg-warning text-center">
                                    <p hidden>JP</p>
                                    <h1 class="font-light text-white" id="juspeng">0</h1>
                                    <h6 class="text-white">Justifikasi Pengadaan<br>&nbsp;</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2dot4">
                            <div class="card">
                                <div class="box bg-danger text-center">
                                    <p hidden>AJP</p>
                                    <h1 class="font-light text-white" id="appjuspeng">0</h1>
                                    <h6 class="text-white">Approval Justifikasi Pengadaan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="table-posisi" class="table m-t-30 table-hover no-wrap contact-list" data-paging="true" data-paging-size="5" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">#No Bukti</th>
                                    <th width="20%">No Dokumen</th>
                                    <th width="5%">PP</th>
                                    <th width="10%">Waktu</th>
                                    <th width="25%">Kegiatan</th>
                                    <th width="10%">Nilai</th>
                                    <th width="10%">Posisi Justifikasi</th>
                                    <th width="10%">Posisi Pengadaan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <div class="text-right">
                                        <ul class="pagination"> </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: "5f0781d5-8856-4f3e-a2c7-0f95695def7e",
        });
        OneSignal.isPushNotificationsEnabled().then(function(isEnabled) {
            if (isEnabled){
                OneSignal.getUserId().then(function(userId) {
                    console.log(userId);
                    idUser = userId;
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('apv/notif_register') }}",
                        dataType: 'json',
                        data: {'token':idUser},
                        async:false,
                        success:function(result){
                            console.log(result.message);
                        },
                        fail: function(xhr, textStatus, errorThrown){
                            alert('request failed:'+textStatus);
                        }
                    });
                });
            }
            else{
                console.log('Push notifications are not enabled');    
            }  
        });
    });
</script>

<script src="{{ asset('asset_elite/node_modules/moment/moment.js') }}"></script>
<script src="{{ asset('asset_elite/node_modules/footable/js/footable.min.js') }}"></script>
<script>

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

function loadService(index,method,url,param=null){
    $.ajax({
        type: method,
        url: url,
        dataType: 'json',
        async:false,
        data: {'param':param},
        success:function(res){ 
            var result = res.data;   
            if(result.status){
                switch(index){
                    case 'box' :
                        $('#juskeb').text(sepNumPas(result.data.juskeb));
                        $('#ver').text(sepNumPas(result.data.ver));
                        $('#appjuskeb').text(sepNumPas(result.data.appjuskeb));
                        $('#juspeng').text(sepNumPas(result.data.juspeng));
                        $('#appjuspeng').text(sepNumPas(result.data.appjuspeng));

                    break;
                    case 'tablePosisi' :
                        var html='';
                        for(var i=0;i<result.data.length;i++){
                            var line = result.data[i];
                            html+=`<tr>
                                <td>`+line.no_bukti+`</td>
                                <td>`+line.no_dokumen+`</td>
                                <td>`+line.kode_pp+`</td>
                                <td>`+line.waktu+`</td>
                                <td>`+line.kegiatan+`</td>
                                <td>`+sepNumPas(line.nilai)+`</td>`;
                                if(line.progress == 'S'){
                                    var label="primary";
                                }else if(line.progress == 'R'){
                                    var label="danger";
                                }else if(line.progress == 'F'){
                                    var label="dark";
                                }else{
                                    var label="success";
                                }
                            html+=`
                                <td><span class="label label-`+label+`">`+line.posisi+`</span></td>`;
                                if(line.progress2 == 'S'){
                                    var label="primary";
                                }else if(line.progress2 == 'R'){
                                    var label="danger";
                                }else if(line.progress2 == 'F'){
                                    var label="dark";
                                }else{
                                    var label="success";
                                }
                            html+=`
                                <td><span class="label label-`+label+`">`+line.posisi2+`</span></td>`;
                            html+=`
                            </tr>`;
                        }
                        $('#table-posisi tbody').html(html);
                        $('#table-posisi').footable();
                    break;

                }
            }
        }
    });
}
function initDash(){
    loadService('box','GET',"{{ url('apv/dash_databox') }}"); 
    loadService('tablePosisi','GET',"{{ url('apv/dash_posisi') }}"); 
     
}
initDash();

$('.col-md-2dot4').click(function(){
    var kode = $(this).closest('div').find('p').text();
    loadService('tablePosisi','GET',"{{ url('apv/dash_posisi') }}",kode); 
})
</script>