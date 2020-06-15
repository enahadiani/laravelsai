<style>
/* @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap'); */

@font-face {
    font-family: "Roboto";
    src: url("{{url('assets/fonts/Roboto/Roboto-Regular.ttf')}}");
}

body {
    font-family: 'Roboto', sans-serif !important;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: 'Roboto', sans-serif !important;
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
#card-profile{
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
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card-group mb-3'>
                         <div class="card" id="card-profile">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="icon-user"></i></h3>
                                                <p class="text-muted">Profile Jamaah</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-warning" id="jamaah"></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" id="prog_jamaah">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <div class="card" id="card-registrasi">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="icon-user-follow"></i></h3>
                                                <p class="text-muted">Registrasi</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-info" id="registrasi"></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" id="prog_registrasi">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <div class="card" id="card-pbyr">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="icon-wallet"></i></h3>
                                                <p class="text-muted">Pembayaran</p>
                                            </div>
                                            <div class="ml-auto">
                                                <h2 class="counter text-success" id="pbyr"></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress" id="prog_pbyr">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>    
            <div class='row'>   
                <div class='col-md-8'>
                    <div class='card mar-mor box-wh' style='border-radius:5px'>
                        <div class='card-body' style='padding: 0 10px 10px 10px;'>
                            <div class="row">
                                <div style='border: 1px solid #ff9500;padding: 5px;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background: #ff9500;color: white;width: 140px;cursor:pointer;height: 40px;' class='col-md-6' id='regHariClick'>Kartu Pembayaran</div>
                                <div id='kartu' style='padding:10px;width:100%'></div>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class='col-md-4'>
                    <div class='card mar-mor box-wh' style='border-radius:5px'>
                        <div class='card-body' style='padding: 0 10px 10px 10px;'>
                            <div class="row">
                                <div style='border: 1px solid #ff9500;padding: 5px;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background: #ff9500;color: white;width: 140px;cursor:pointer;height: 40px;' class='col-md-6' id='regHariClick'>Dokumen Upload</div>
                                <div class='col-md-12' style='margin-top:10px;height: 340px;'>
                                <table class="table table-striped table-bordered table-condensed" id="input-dok">
                                    <thead>
                                    <style>
                                        .dok{
                                            padding:6px !important;
                                        }
                                    </style>
                                        <tr>
                                            <th width="5%" class='dok'>No</th>
                                            <th width="50%" class='dok'>Jenis Dokumen</th>
                                            <th width="10%" class='dok'>Download</th>
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
        </div>
    </div>
</div>
<script>

$('.card').on('click', '#btn-refresh', function(){
    location.reload();
    // alert('test');
});

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

$('#registrasi').text(2);
$('#pbyr').text(1);

var html ="";
html += "<table class='table' cellspacing='0' cellpadding='1' class='kotak'>";
html += "<style>td,th{ padding:5px !important; }</style>";
html += "<tr>";
html += "<td height='23' colspan='7' style='border:none' class='header_laporan'>";
html += "<table  class='table no-border' width='100%'>";
html += "<tr>";
html += "<td width='30%' class='header_laporan'>No Registrasi</td>";
html += "<td width='70%' class='header_laporan'>: REG-0001</td>";
html += "</tr>";
html += "<tr>";
html += "<td width='99' class='header_laporan'>Peserta</td>";
html += "<td width='360' class='header_laporan'>: PST-0001</td>";
html += "</tr>";
html += "<tr>";
html += "<td width='99' class='header_laporan'>Tanggal</td>";
html += "<td width='360' class='header_laporan'>: 21 Juni 2020</td>";
html += "</tr>";
html += "<tr>";
html += "<td class='header_laporan'>Paket</td>";
html += "<td class='header_laporan'>: PKT-20200621 - PAKET 2020</td>";
html += "</tr>";
html += "<tr>";
html += "<td class='header_laporan'>Agen</td>";
html += "<td class='header_laporan'>: AGN-00000001 - Nina Ritna</td>";
html += "</tr>";
html += "<tr>";
html += "<td class='header_laporan'>Nilai Paket</td>";
html += "<td class='header_laporan'>: Rp. 150.000.000</td>";
html += "</tr>";
html += "<tr>";
html += "<td class='header_laporan'>Nilai Tambahan</td>";
html += "<td class='header_laporan'>: Rp. 10.000.000</td>";
html += "</tr>";
html += "</tr>";
html += "</table>"
html += "<table class='table table-bordered table-striped'>";
html += "<thead style='vertical-align:middle !important;text-align:center'>";
html += "<tr>";
html += "<th rowspan='2' style='vertical-align: middle;' width='50'>Tanggal</th>";
html += "<th rowspan='2' style='vertical-align: middle;' width='100'>No Bukti</th>";
html += "<th rowspan='2' style='vertical-align: middle;' width='250'>Keterangan</th>";
html += "<th colspan='2' style='vertical-align: middle;' >Pembayaran</th>";
html += "</tr>";
html += "<tr>";
html += "<th width='80'>Paket</th>";
html += "<th width='80'>Tambahan</th>";
html += "</tr>";
html += "</thead>";
html += "<tbody>";
html += "<tr>";
html += "<td>17/03/2020</td>";
html += "<td style='font-size:12px;'>11-BM020200317</td>";
html += "<td>Cicilan Pertama</td>";
html += "<td align='right'>Rp. 50.000.000</td>";
html += "<td align='right'>Rp. 5.000.000</td>";
html += "</tr>";
html += "<tr>";
html += "<td  colspan='3' valign='top' class='header_laporan' align='right'>Total Pembayaran&nbsp;</td>";
html += "<td valign='top' class='header_laporan' align='right'>Rp. 50.000.000</td>";
html += "<td valign='top' class='header_laporan' align='right'>Rp. 5.000.000</td>";
html += "</tr>";
html += "<td  colspan='3' valign='top' class='header_laporan' align='right'>Saldo&nbsp;</td>";
html += "<td valign='top' class='header_laporan' align='right'>Rp. 0</td>";
html += "<td valign='top' class='header_laporan' align='right'>Rp. 250.000</td>";
html += "</tr>";
html += "</tbody>";
html += "</table>";

$('#kartu').html(html);

var html2 = "";
html2 += "<tr class='row-upload-dok dok'>";
html2 += "<td width='5%'  class='no-dok dok'>1</td>"
html2 += "<td width='20%'  class='upload_deskripsi dok'>Akta Kelahiran</td>"
html2 += "<td width='5%' class='dok text-center'><a class='btn btn-success btn-sm download-dok' style='font-size:8px' href='#' target='_blank'><i class='fa fa-download fa-1'></i></a></td>"
html2 += "</tr>";
html2 += "<tr class='row-upload-dok dok'>";
html2 += "<td width='5%'  class='no-dok dok'>2</td>"
html2 += "<td width='20%'  class='upload_deskripsi dok'>Kartu Keluarga</td>"
html2 += "<td width='5%' class='dok text-center'></td>"
html2 += "</tr>";

$('#input-dok tbody').html(html2);

// $('#card-profile').click(function(){
//     window.location.href='/fProfile';
// })
</script>