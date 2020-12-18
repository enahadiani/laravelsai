<link rel="stylesheet" href="{{ asset('master.css') }}" />
<style>
    body {
        overflow: auto; /* Hide scrollbars */
    }
    .card{
        border-radius: 10px !important;
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
    .select-dash {
        border-radius: 10px;
    }
    .box-container {
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
    }
    .subbox-container{
        margin-top: -10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .box{
        background-color: #f2f2f2;
        height: 50px;
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .dropdown-filter {
        width: 100%;
        margin: 0 10px;
    }
    .keterangan {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .fixed-filter {
        background-color: #f8f8f8;
        position: fixed;
        top: 9%;
        margin: 0;
        padding: 25px 0;
        padding-bottom: 0;
        margin-bottom: 40px;
        width: 100%;
        z-index: 1;
    }
    .footer-dashboard {
        width: 100%;
        margin-bottom: 100px;
        padding-bottom: 55px;
        height: 50px;
    }
    .dropdown-menu {
        width: 100%;
        max-height: 130px;
        overflow: scroll;
        overflow-x: hidden;
        margin-top: 0px;
        padding-left: 5px;
    }
    .dropdown-menu > li {
        cursor: pointer;
    }
    .dropdown-menu > li:hover {
        background-color: #F5F5F5;
    }
    .dropdown-menu-jenis {
        max-height: 130px;
        overflow: hidden;
        overflow-x: hidden;
        margin-top: 0px;
        padding-left: 5px;
    }
    .dropdown-menu-jenis > li {
        cursor: pointer;
    }
    .dropdown-menu-jenis > li:hover {
        background-color: #F5F5F5;
    }
    #table-preview > tbody > tr:hover {
        background-color: #F5F5F5;
        cursor: pointer;
    }
    .button-top {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 10;
        border: none;
        outline: none;
        background-color: #d3d3d3;
        cursor: pointer;
        padding: 15px;
        width: 50px;
        border-radius: 50%;
    }
    .button-top:hover {
        background-color: #c6c6c6;
    }
    .btn-filter {
        background-color: #ffffff !important;
        position: absolute;
        right: 0;
        border-radius: 25px !important;
        width: 120px;
    }
    .btn-filter-no-scroll {
        margin-right: 182px;
    }
    /* .btn-filter-scroll {
        margin-right: 182px;
    } */
    .filter-count {
        display: inline;
        border-radius: 50%;
        padding: 1px 5px;
        height: 20px;
        width: 20px;
        text-align: center;
        background-color: #93ccce;
    }
    .highcharts-color-0 {
        fill: #9EEADC !important;
    }
    .highcharts-color-1 {
        fill: #47D7BD !important;
    }
    .highcharts-color-2 {
        fill: #37AA94 !important;
    }
    .highcharts-color-3 {
        fill: #288372 !important;
    }
    .label-filter {
        font-size: 0.87rem;
        padding-left: 5px;
        margin-left: 10px;
    }
    .group-filter {
        padding: 8px 0;
    }
    .fixed-margin {
        position: relative;
        margin-top:170px;
    }
    @media only screen and (min-width: 1440px)  {
        .fixed-margin {
            position: relative;
            margin-top:190px;
        }
        .fixed-filter {
            background-color: #f8f8f8;
            position: fixed;
            top: 6%;
            margin: 0;
            padding: 25px 0;
            padding-bottom: 0;
            margin-bottom: 40px;
            width: 100%;
            z-index: 1;
        }
    }
</style>
    
    <button id="button-top" class="button-top" onclick="topFunction()">
        <span class="simple-icon-arrow-up"></span>
    </button>
    
    <div id="filter-header" class="fixed-filter">
        <div class="row">
            <div class="col-6">
                <h6 id="judul-form">Biaya Kunjungan</h6>
                <p id="keterangan-filter"></p>
            </div>
            <div class="col-6">
                <button id="button-filter" class="btn btn-light btn-filter btn-filter-no-scroll">
                    <span>Filter</span>
                    <div class="filter-count">
                        3
                    </div>
                </button>
            </div>
        </div>
    </div>

    <div class="row fixed-margin">
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;" id="claim-ket"></h6>
            <p class="ml-4 mt-1">Rp. Milyar</p>
            <div id="claim" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;" id="ach-claim"></span>
                </div>
                <div style="padding-right: 30px;" id="yoy-claim">

                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi</h6>
            <div id="komposisi" class="mt-3"></div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;" id="judul-chart-3"></h6>
            <p class="ml-4 mt-1">Rp. Jutaan</p>
            <div id="pkk-cc" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;" id="claimant-ach"></span>
                </div>
                <div style="padding-right: 30px;" id="claimant-yoy">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;">
    <div class="col-12">
        <div class="card">    
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;" id="ket-layanan"></h6>
            <p class="ml-4 mt-1">Rp. Milyar</p>
            <div class="row">
                <div class="col-3">
                    <div id="rjtp" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-rjtp"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-rjtp">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="rjtl" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-rjtl"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-rjtl">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="ri" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-ri"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-ri">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="restitusi" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ach-restitusi"></span>
                            </div>
                            <div style="padding-right: 30px;" id="yoy-restitusi">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#BFBFBF;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;" class="ytd-last"></span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#9EEADC;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;" class="rka-now"></span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#288372;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;" class="ytd-now"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="position: relative;margin-top:20px;margin-bottom:5px !important;">
    <div class="col-6">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div id="pkk-kunjungan" class="mt-3"></div>
            <div class="box">
                <div style="padding-left: 20px;">
                    <span style="font-weight: bold;" id="ach-kunj"></span>
                </div>
                <div style="padding-right: 30px;" id="yoy-kunj">

                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card" style="height: 405px;">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi Kunjungan</h6>
            <div id="pkk-komposisi-kunj" class="mt-3"></div>
        </div>
    </div>
    <div class="col-12" style="margin-top: 20px;">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Kunjungan per Jenis Layanan</h6>
            <p class="ml-4 mt-1">Ribuan Kunjungan</p>
            <div class="row">
                <div class="col-3">
                    <div id="pkk-rjtp-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTP</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;font-size:12px;" id="rjtp-kunj-ach"></span>
                            </div>
                            <div style="padding-right: 30px;" id="rjtp-kunj-yoy">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-rjtl-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RJTL</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="rjtl-kunj-ach"></span>
                            </div>
                            <div style="padding-right: 30px;" id="rjtl-kunj-yoy">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-ri-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">RI</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="ri-kunj-ach"></span>
                            </div>
                            <div style="padding-right: 30px;" id="ri-kunj-yoy">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                     <div id="pkk-restitusi-kunj" class="mt-3"></div>
                    <div class="box-container">
                        <p style="text-align: center;font-weight:bold;">Restitusi</p>
                        <div class="subbox-container">
                            <div style="padding-left: 20px;">
                                <span style="font-weight: bold;" id="restitusi-kunj-ach"></span>
                            </div>
                            <div style="padding-right: 30px;" id="restitusi-kunj-yoy">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="keterangan">
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#BFBFBF;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;" class="ytd-last"></span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#9EEADC;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;" class="rka-now"></span>
                        </div>
                        <div style="padding: 0 50px">
                            <div style="height: 20px; width: 20px; border-radius: 50%; background-color:#288372;display:inline-block;"></div>
                            <span style="padding-left: 6px;font-weight: bold;position: relative;top:-5px;" class="ytd-now"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-dashboard">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-light btn-block" id="dash-btn" style="">Dashboard Selanjutnya</button>
        </div>
    </div>
</div>

<!-- MODAL PREVIEW -->
<div class="modal" tabindex="-1" role="dialog" id="modal-preview">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius:0.75em">
            <div class="modal-header py-0" style="display:block;height:49px" >
                <h6 class="py-2" style="position: absolute;" id="modal-preview-judul">Dashboard Selanjutnya</h6>
                <span id="modal-preview-nama" style="display:none"></span><span id="modal-preview-id" style="display:none"></span> 
                <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" id="preview-close">
                <span>×</span>
                </button>
            </div>
            <div class="modal-body" id="content-preview" style="">
                <table id="table-preview" class="table no-border">
                    <tbody id="dash-list">
                        <tr>
                            <td style="display: none;">fDashKunjungan</td>
                            <td>Biaya dan Kunjungan</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashBPJS</td>
                            <td>BPJS</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashRealisasiBeban</td>
                            <td>Realisasi Beban</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashBPCC</td>
                            <td>Realisasi BPCC</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashPendapatanInvest</td>
                            <td>Pendapatan Investasi</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashBeban</td>
                            <td>Beban</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashKPKU</td>
                            <td>KPKU Kategori 7</td>
                        </tr>
                        <tr>
                            <td style="display: none;">fDashSDM</td>
                            <td>SDM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL PREVIEW -->

<!-- MODAL FILTER -->
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"aria-labelledby="modalFilter" aria-hidden="true">
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
                    <div class="group-filter">
                        <label for="regional" class="label-filter">Regional</label>
                        <div class="dropdown-regional dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                NASIONAL
                                <span style="display: none;" id="value-regional"></span>
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                            </button>
                            <ul class="dropdown-menu regional" style="overflow: hidden; width:99%;" role="menu" aria-labelledby="menu2">
                                {{-- <li>
                                    <span style="display: none;">CC</span>
                                    <span>Pensiunan dan Keluarga</span>
                                </li>
                                <li>
                                    <span style="display: none;">BP</span>
                                    <span>Pegawai dan Keluarga</span>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="group-filter">
                        <label for="jenis" class="label-filter">Jenis</label>
                        <div class="dropdown-jenis dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                Pensiunan dan Keluarga
                                <span style="display: none;" id="value-jenis"></span>
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                            </button>
                            <ul class="dropdown-menu jenis" style="overflow: hidden; width:99%;" role="menu" aria-labelledby="menu2">
                                <li>
                                    <span style="display: none;">CC</span>
                                    <span>Pensiunan dan Keluarga</span>
                                </li>
                                <li>
                                    <span style="display: none;">BP</span>
                                    <span>Pegawai dan Keluarga</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="group-filter">
                        <label for="periode" class="label-filter">Periode</label>
                        <div class="dropdown-periode dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                {{Session::get('periode')}}
                                <span id="value-periode" style="display: none;"></span>
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                            </button>
                            <ul class="dropdown-menu periode" role="menu" aria-labelledby="menu1">
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="button" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
var regional = "NASIONAL";
var judulForm = "Biaya Kunjungan Pensiunan dan Keluarga";
var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var dashboard = "";
// var periode = "{{Session::get('periode')}}";
var periode = "202011";
var lastPeriode = periode.slice(2, 4);
var lastPeriodeNum = parseInt(lastPeriode);
var lastPeriodeNumYest = lastPeriodeNum - 1;
var lastPeriodeSebelum = ('0'+lastPeriodeNumYest).slice(-2);
var ketYTDLast = "YTD Q3 '"+lastPeriodeSebelum+"";
var ketRKANow = "RKA Q3 '"+lastPeriode+"";
var ketYTDNow = "YTD Q3 '"+lastPeriode+"";
var split = periode.match(/.{1,4}/g);
var tahun = split[0];
var numMonth = parseInt(split[1]) - 1;
var namaMonth = bulan[numMonth];
var keterangan = "Periode sampai dengan "+namaMonth+" "+tahun+" regional "+regional;
var pembagi = 1000000000;
var pembagi2 = 1000000;
var pembagi3 = 1000;
var jenis = "CC";
var buttonFilter = document.getElementById('button-filter');
var buttonTop = document.getElementById('button-top');
var header = document.getElementById('filter-header');
var sticky = header.offsetTop;
var rka_nowReal = 0;
var rea_befReal = 0;
var rea_nowReal = 0;

window.onscroll = function() {
    if(window.pageYOffset > sticky) {
        // header.classList.add('fixed-filter')
        buttonTop.style.display = 'block';
        // buttonFilter.classList.add('btn-filter-scroll')
        // buttonFilter.classList.remove('btn-filter-no-scroll')
    } else {
        // header.classList.remove('fixed-filter')
        // buttonFilter.classList.remove('btn-filter-scroll')
        // buttonFilter.classList.add('btn-filter-no-scroll')
        buttonTop.style.display = 'none';
    }
}

$('#judul-form').text(judulForm);
$('#keterangan-filter').text(keterangan);
$('.ytd-last').text(ketYTDLast);
$('.rka-now').text(ketRKANow);
$('.ytd-now').text(ketYTDNow);

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$('#button-filter').click(function(){
    $('#modalFilter').modal('show');
})

if(jenis == 'CC') {
    $('#claim-ket').text('Claim Cost (CC)')
    $('#ket-layanan').text('CC per Jenis Layanan')
    $('#judul-chart-3').text('CC per Claimant');
} else {
    $('#claim-ket').text('Biaya Pengobatan (BP)')
    $('#ket-layanan').text('BP per Jenis Layanan')
    $('#judul-chart-3').text('BP per NIK');
}

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-periode') }}",
        dataType: 'JSON',
        success: function(result) {
            $.each(result.daftar, function(key, value){
                $('.periode').append("<li>"+value.periode+"</li>")
            })
        }
    });

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-regional') }}",
        dataType: 'JSON',
        success: function(result) {
            $('.regional').append("<li>NASIONAL</li>")
            $.each(result.daftar.data, function(key, value){
                $('.regional').append("<li>"+value.kode_pp+"</li>")
            })
        }
    });

    $('.periode').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-periode').find('.select-dash').html(htmlText);
        periode = text;
    });

    $('.regional').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-regional').find('.select-dash').html(htmlText);
        regional = text;
    });

    $('.jenis').on( 'click', 'li', function() {
        var value = $(this).find('span').first().text();
        var text = $(this).find('span').last().text();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:2%;'></span>";
        $(this).closest('.dropdown-jenis').find('.select-dash').html(htmlText);
        jenis = value;
    });

    $('#form-filter').on('click', '#btn-tampil', function(){
        $('#yoy-claim').empty();
        $('#yoy-kunj').empty();
        $('#claimant-yoy').empty();
        $('#yoy-rjtp').empty();
        $('#yoy-rjtl').empty();
        $('#yoy-ri').empty();
        $('#yoy-restitusi').empty();
        $('#rjtp-kunj-yoy').empty();
        $('#rjtl-kunj-yoy').empty();
        $('#ri-kunj-yoy').empty();
        $('#restitusi-kunj-yoy').empty();
        split = periode.match(/.{1,4}/g);
        tahun = split[0];
        numMonth = parseInt(split[1]) - 1;
        namaMonth = bulan[numMonth];
        keterangan = "Periode sampai dengan "+namaMonth+" "+tahun+" regional "+regional;
        lastPeriode = periode.slice(-2);
        lastPeriodeNum = parseInt(lastPeriode);
        lastPeriodeNumYest = lastPeriodeNum - 1;
        lastPeriodeSebelum = ('0'+lastPeriodeNumYest).slice(-2);
        ketYTDLast = "YTD Q3 '"+lastPeriodeSebelum+"";
        ketRKANow = "RKA Q3 '"+lastPeriode+"";
        ketYTDNow = "YTD Q3 '"+lastPeriode+"";
        $('#keterangan-filter').text(keterangan);
        $('.ytd-last').text(ketYTDLast);
        $('.rka-now').text(ketRKANow);
        $('.ytd-now').text(ketYTDNow);
        if(jenis == 'CC') {
            judulForm = "Biaya Kunjungan Pensiunan dan Keluarga";
            $('#claim-ket').text('Claim Cost (CC)');
            $('#ket-layanan').text('CC per Jenis Layanan');
            $('#judul-chart-3').text('CC per Claimant');
            $('#judul-form').text(judulForm);
        } else {
            judulForm = "Biaya Kunjungan Pegawai dan Keluarga";
            $('#claim-ket').text('Biaya Pengobatan (BP)');
            $('#ket-layanan').text('BP per Jenis Layanan');
            $('#judul-chart-3').text('BP per NIK');
            $('#judul-form').text(judulForm);
        }
        getDataKunjungan();
        getDataLayanan();
        $('#modalFilter').modal('hide');
    })

    $('#form-filter').on('click', '#btn-reset', function(){
        var text1 = "Pensiunan dan Keluarga";
        var text2 = "{{Session::get('periode')}}";
        var text3 = "NASIONAL";
        var htmlTextPeriode = text2+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-periode').find('.select-dash').html(htmlTextPeriode);
        var htmlTextJenis = text1+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-jenis').find('.select-dash').html(htmlTextJenis);
        var htmlTextRegional = text3+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-regional').find('.select-dash').html(htmlTextRegional);
        jenis = "CC";
        periode = "{{Session::get('periode')}}";
        regional = "NASIONAL";
    })

    $('#dash-btn').click(function(){
        $('#modal-preview').modal('show');
    });

    $('#dash-list').on( 'click', 'tr', function() {
        var form = $(this).find('td').first().text();
        dashboard = "{{ url('yakes-auth/form')}}/"+form;
        $('#modal-preview').modal('hide');
        loadForm(dashboard);
    });

function getDataKunjungan() {
    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-kunj-bpcc') }}/"+periode+"/"+jenis+"/"+regional,
        dataType: 'JSON',
        async: false,
        success: function(result) {
            $('#yoy-claim').empty();
            var data = result.daftar;
            var chart = [];
            rka_nowReal = parseFloat(data[0].rka_now);
            rea_nowReal = parseFloat(data[0].rea_now);
            rea_befReal = parseFloat(data[0].rea_bef);
            var rka_now = parseFloat((parseFloat(data[0].rka_now)/pembagi).toFixed(2));
            var rea_bef = parseFloat((parseFloat(data[0].rea_bef)/pembagi).toFixed(2));
            var rea_now = parseFloat((parseFloat(data[0].rea_now)/pembagi).toFixed(2));
            var ach = 0;
            var yoy = 0;
            if(rka_now == 0) {
                ach = 0;
            } else {
                ach = ((rea_now/rka_now)*100).toFixed(2);
            }

            if(rea_bef == 0) {
                yoy = 0;
            } else {
                yoy = (((rea_now/rea_bef)-1)*100).toFixed(2);
            }

            $('#ach-claim').text("Ach. "+ach+"%")
            var ketYoy = "";
            if(yoy < 0 ) {
                ketYoy += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoy += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoy+"%</span>";
            } else {
                ketYoy += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoy += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoy+"%</span>";
            }
            $('#yoy-claim').append(ketYoy);
            chart.push({ name:"YTD Q3 '"+lastPeriodeSebelum+"", y:rea_bef, color:'#BFBFBF' })
            chart.push({ name:"RKA Q3 '"+lastPeriode+"", y:rka_now, color:'#9EEADC' })
            chart.push({ name:"YTD Q3 '"+lastPeriode+"", y:rea_now, color:'#288372' })
            Highcharts.chart('claim', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                exporting:{
                    enabled: false
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ["YTD Q3 '"+lastPeriodeSebelum+"", "RKA Q3 '"+lastPeriode+"", "YTD Q3 '"+lastPeriode+""]
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "Claim Cost",
                        data: chart
                    }
                ]
            });
        }
    });

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-claimant') }}/"+periode+"/"+jenis+"/"+regional,
        dataType: 'JSON',
        success: function(result) {
            $('#claimant-yoy').empty();
            var chart = [];
            var data1 = result.daftar[0];
            var data2 = result.daftar2[0];
            var jum_reaBef = parseFloat(data2.jum_bef)
            var jum_reaNow = parseFloat(data1.jum_now)
            var jum_rkaNow = parseFloat(data1.rka_now)
            var rea_befClaim = parseFloat(((rea_befReal/jum_reaBef)/pembagi2).toFixed(2));
            var rea_nowClaim = parseFloat(((rea_nowReal/jum_reaNow)/pembagi2).toFixed(2));
            var rka_nowClaim = parseFloat(((rka_nowReal/jum_rkaNow)/pembagi2).toFixed(2));
            var rea_befClaimNotConvert = rea_befReal/jum_reaBef;
            var rea_nowClaimNotConvert = rea_nowReal/jum_reaNow;
            var rka_nowClaimNotConvert = rka_nowReal/jum_rkaNow;

            var achClaimant = 0;
            var yoyClaimant = 0;
            if(rka_nowClaim == 0) {
                achClaimant = 0;
            } else {
                achClaimant = ((rea_nowClaimNotConvert/rka_nowClaimNotConvert)*100).toFixed(2);
            }

            if(rea_befClaim == 0) {
                yoyClaimant = 0;
            } else {
                yoyClaimant = (((rea_nowClaimNotConvert/rea_befClaimNotConvert)-1)*100).toFixed(2);
            }

            $('#claimant-ach').text("Ach. "+achClaimant+"%")
            var ketYoyClaimant = "";
            if(yoyClaimant < 0 ) {
                ketYoyClaimant += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyClaimant += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoyClaimant+"%</span>";
            } else {
                ketYoyClaimant += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyClaimant += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoyClaimant+"%</span>";
            }
            $('#claimant-yoy').append(ketYoyClaimant);
            chart.push({ name:"YTD Q3 '"+lastPeriodeSebelum+"", y:rea_befClaim, color:'#BFBFBF' })
            chart.push({ name:"RKA Q3 '"+lastPeriode+"", y:rka_nowClaim, color:'#9EEADC' })
            chart.push({ name:"YTD Q3 '"+lastPeriode+"", y:rea_nowClaim, color:'#288372' })
            Highcharts.chart('pkk-cc', {
                chart: {
                    type: 'column',
                    height: 250
                },
                legend:{ enabled:false },
                exporting:{
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ["YTD Q3 '"+lastPeriodeSebelum+"", "RKA Q3 '"+lastPeriode+"", "YTD Q3 '"+lastPeriode+""]
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "Claim Cost",
                        data: chart,
                    }
                ]
            });
        }
    });

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-kunj-total') }}/"+periode+"/"+jenis+"/"+regional,
        dataType: 'JSON',
        success: function(result) {
            $('#yoy-kunj').empty();
            var chart = [];
            var data1 = result.daftar[0];
            var data2 = result.daftar2[0];
            var jum_reaBef = parseFloat(data2.jum_bef)
            var jum_reaNow = parseFloat(data1.jum_now)
            var jum_rkaNow = parseFloat(data1.rka_now)
            var rea_befKunj = parseFloat((jum_reaBef/pembagi3).toFixed(2));
            var rea_nowKunj = parseFloat((jum_reaNow/pembagi3).toFixed(2));
            var rka_nowKunj = parseFloat((jum_rkaNow/pembagi3).toFixed(2));
            var rea_befKunjNotConvert = jum_reaBef;
            var rea_nowKunjNotConvert = jum_reaNow;
            var rka_nowKunjNotConvert = jum_rkaNow;

            var achKunj = 0;
            var yoyKunj = 0;
            if(rka_nowKunj == 0) {
                achKunj = 0;
            } else {
                achKunj = ((rea_nowKunjNotConvert/rka_nowKunjNotConvert)*100).toFixed(2);
            }

            if(rea_befKunj == 0) {
                yoyKunj = 0;
            } else {
                yoyKunj = (((rea_nowKunjNotConvert/rea_befKunjNotConvert)-1)*100).toFixed(2);
            }

            $('#ach-kunj').text("Ach. "+achKunj+"%")
            var ketYoyKunj = "";
            if(yoyKunj < 0 ) {
                ketYoyKunj += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyKunj += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoyKunj+"%</span>";
            } else {
                ketYoyKunj += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyKunj += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+yoyKunj+"%</span>";
            }
            $('#yoy-kunj').append(ketYoyKunj);
            chart.push({ name:"YTD Q3 '"+lastPeriodeSebelum+"", y:rea_befKunj, color:'#BFBFBF' })
            chart.push({ name:"RKA Q3 '"+lastPeriode+"", y:rka_nowKunj, color:'#9EEADC' })
            chart.push({ name:"YTD Q3 '"+lastPeriode+"", y:rea_nowKunj, color:'#288372' })

            Highcharts.chart('pkk-kunjungan', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                exporting:{
                    enabled: false
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: ["YTD Q3 '"+lastPeriodeSebelum+"", "RKA Q3 '"+lastPeriode+"", "YTD Q3 '"+lastPeriode+""]
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "KUNJUNGAN",
                        data: chart,
                    }
                ]
            });
        }
    });
}

function getDataLayanan() {
    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-layanan-kunj') }}/"+periode+"/"+jenis+"/"+regional,
        dataType: 'JSON',
        success: function(result) { 
            $('#rjtp-kunj-yoy').empty();
            $('#rjtl-kunj-yoy').empty();
            $('#ri-kunj-yoy').empty();
            $('#restitusi-kunj-yoy').empty();
            var data = result.daftar;
            var chart = [];
            var columnRjtp = [];
            var columnRjtl = [];
            var columnRi = [];
            var columnRestitusi = [];
            var totalRea = 0;
            var reaRjtpNow = parseFloat((parseFloat(data[0].jum_now)/pembagi3).toFixed(2))
            var reaRjtpBef = parseFloat((parseFloat(data[0].jum_seb)/pembagi3).toFixed(2))
            var rkaRjtpNow = parseFloat((parseFloat(data[0].rka_now)/pembagi3).toFixed(2))
            var rjtpAch = 0;
            var rjtpYoy = 0;
            var reaRjtlNow = parseFloat((parseFloat(data[1].jum_now)/pembagi3).toFixed(2))
            var reaRjtlBef = parseFloat((parseFloat(data[1].jum_seb)/pembagi3).toFixed(2))
            var rkaRjtlNow = parseFloat((parseFloat(data[1].rka_now)/pembagi3).toFixed(2))
            var rjtlAch = 0;
            var rjtlYoy = 0;
            var reaRiNow = parseFloat((parseFloat(data[2].jum_now)/pembagi3).toFixed(2))
            var reaRiBef = parseFloat((parseFloat(data[2].jum_seb)/pembagi3).toFixed(2))
            var rkaRiNow = parseFloat((parseFloat(data[2].rka_now)/pembagi3).toFixed(2))
            var riAch = 0;
            var riYoy = 0;
            var reaRestitusiNow = parseFloat((parseFloat(data[3].jum_now)/pembagi3).toFixed(2))
            var reaRestitusiBef = parseFloat((parseFloat(data[3].jum_seb)/pembagi3).toFixed(2))
            var rkaRestitusiNow = parseFloat((parseFloat(data[3].rka_now)/pembagi3).toFixed(2))
            var restitusiAch = 0;
            var restitusiYoy = 0;

             if(rkaRjtpNow == 0) {
                rjtpAch = 0;
            } else {
                rjtpAch = ((reaRjtpNow/rkaRjtpNow)*100).toFixed(2);
            }

            if(reaRjtpBef == 0) {
                rjtpYoy = 0;
            } else {
                rjtpYoy = (((reaRjtpNow/reaRjtpBef)-1)*100).toFixed(2);
            }
            
            if(rkaRjtlNow == 0) {
                rjtlAch = 0;
            } else {
                rjtlAch = ((reaRjtlNow/rkaRjtlNow)*100).toFixed(2);
            }

            if(reaRjtlBef == 0) {
                rjtlYoy = 0;
            } else {
                rjtlYoy = (((reaRjtlNow/reaRjtlBef)-1)*100).toFixed(2);
            }

            if(rkaRiNow == 0) {
                riAch = 0;
            } else {
                riAch = ((reaRiNow/rkaRiNow)*100).toFixed(2);
            }

            if(reaRiBef == 0) {
                riYoy = 0;
            } else {
                riYoy = (((reaRiNow/reaRiBef)-1)*100).toFixed(2);
            }

            if(rkaRestitusiNow == 0) {
                restitusiAch = 0;
            } else {
                restitusiAch = ((reaRestitusiNow/rkaRestitusiNow)*100).toFixed(2);
            }

            if(reaRestitusiBef == 0) {
                restitusiYoy = 0;
            } else {
                restitusiYoy = (((reaRestitusiNow/reaRestitusiBef)-1)*100).toFixed(2);
            }

            $('#rjtp-kunj-ach').text("Ach. "+rjtpAch+"%")
            $('#rjtl-kunj-ach').text("Ach. "+rjtlAch+"%")
            $('#ri-kunj-ach').text("Ach. "+riAch+"%")
            $('#restitusi-kunj-ach').text("Ach. "+restitusiAch+"%")

            var ketYoyRjtp = "";
            if(rjtpYoy < 0 ) {
                ketYoyRjtp += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRjtp += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtpYoy+"%</span>";
            } else {
                ketYoyRjtp += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRjtp += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtpYoy+"%</span>";
            }
            $('#rjtp-kunj-yoy').append(ketYoyRjtp);

            var ketYoyRjtl = "";
            if(rjtlYoy < 0 ) {
                ketYoyRjtl += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRjtl += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtlYoy+"%</span>";
            } else {
                ketYoyRjtl += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRjtl += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtlYoy+"%</span>";
            }
            $('#rjtl-kunj-yoy').append(ketYoyRjtl);

            var ketYoyRi = "";
            if(riYoy < 0 ) {
                ketYoyRi += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+riYoy+"%</span>";
            } else {
                ketYoyRi += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+riYoy+"%</span>";
            }
            $('#ri-kunj-yoy').append(ketYoyRi);

            var ketYoyRestitusi = "";
            if(restitusiYoy < 0 ) {
                ketYoyRestitusi += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRestitusi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+restitusiYoy+"%</span>";
            } else {
                ketYoyRestitusi += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRestitusi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+restitusiYoy+"%</span>";
            }
            $('#restitusi-kunj-yoy').append(ketYoyRestitusi);

            columnRjtp.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRjtpBef,color: '#BFBFBF'})
            columnRjtp.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRjtpNow,color: '#9EEADC'})
            columnRjtp.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRjtpNow,color: '#288372'})

            columnRjtl.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRjtlBef,color: '#BFBFBF'})
            columnRjtl.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRjtlNow,color: '#9EEADC'})
            columnRjtl.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRjtlNow,color: '#288372'})

            columnRi.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRiBef,color: '#BFBFBF'})
            columnRi.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRiNow,color: '#9EEADC'})
            columnRi.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRiNow,color: '#288372'})

            columnRestitusi.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRestitusiBef,color: '#BFBFBF'})
            columnRestitusi.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRestitusiNow,color: '#9EEADC'})
            columnRestitusi.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRestitusiNow,color: '#288372'})


            for(var i=0;i<data.length;i++) {
                totalRea = totalRea + parseFloat(data[i].jum_now)
            }

            var reaRJTP = parseFloat(((parseFloat(data[0].jum_now)/totalRea)*100).toFixed(2))
            var reaRJTL = parseFloat(((parseFloat(data[1].jum_now)/totalRea)*100).toFixed(2))
            var reaRI = parseFloat(((parseFloat(data[2].jum_now)/totalRea)*100).toFixed(2))
            var reaRestitusi = parseFloat(((parseFloat(data[3].jum_now)/totalRea)*100).toFixed(2))

            chart.push({name:'RJTP', y:reaRJTP})
            chart.push({name:'RJTL', y:reaRJTL})
            chart.push({name:'RI', y:reaRI})
            chart.push({name:'Restistusi', y:reaRestitusi})

            Highcharts.chart('pkk-komposisi-kunj', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    height: 250
                },
                exporting:{
                    enabled: false
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        size: 200,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            padding: 0,
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        },
                    }
                },
                series: [{
                    name: 'Komposisi Kunjungan',
                    colorByPoint: true,
                    data: chart
                }]
            });

            Highcharts.chart('pkk-rjtp-kunj', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                exporting:{
                    enabled: false
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRjtp,
                    }
                ]
            });

            Highcharts.chart('pkk-rjtl-kunj', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                exporting:{
                    enabled: false
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTL",
                        data: columnRjtl,
                    }
                ]
            });

            Highcharts.chart('pkk-ri-kunj', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                exporting:{
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RI",
                        data: columnRi,
                    }
                ]
            });

            Highcharts.chart('pkk-restitusi-kunj', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                exporting:{
                    enabled: false
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RESTITUSI",
                        data: columnRestitusi,
                    }
                ]
            });

        }
    })

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-layanan-bpcc') }}/"+periode+"/"+jenis+"/"+regional,
        dataType: 'JSON',
        success: function(result) {
            $('#yoy-rjtp').empty();
            $('#yoy-rjtl').empty();
            $('#yoy-ri').empty();
            $('#yoy-restitusi').empty();
            var data = result.daftar;
            var chart = [];
            var columnRjtp = [];
            var columnRjtl = [];
            var columnRi = [];
            var columnRestitusi = [];
            var totalRea = 0;
            var reaRjtpNow = parseFloat((parseFloat(data[0].rea_now)/pembagi).toFixed(2))
            var reaRjtpBef = parseFloat((parseFloat(data[0].rea_bef)/pembagi).toFixed(2))
            var rkaRjtpNow = parseFloat((parseFloat(data[0].rka_now)/pembagi).toFixed(2))
            var rjtpAch = 0;
            var rjtpYoy = 0;
            var reaRjtlNow = parseFloat((parseFloat(data[1].rea_now)/pembagi).toFixed(2))
            var reaRjtlBef = parseFloat((parseFloat(data[1].rea_bef)/pembagi).toFixed(2))
            var rkaRjtlNow = parseFloat((parseFloat(data[1].rka_now)/pembagi).toFixed(2))
            var rjtlAch = 0;
            var rjtlYoy = 0;
            var reaRiNow = parseFloat((parseFloat(data[2].rea_now)/pembagi).toFixed(2))
            var reaRiBef = parseFloat((parseFloat(data[2].rea_bef)/pembagi).toFixed(2))
            var rkaRiNow = parseFloat((parseFloat(data[2].rka_now)/pembagi).toFixed(2))
            var riAch = 0;
            var riYoy = 0;
            var reaRestitusiNow = parseFloat((parseFloat(data[3].rea_now)/pembagi).toFixed(2))
            var reaRestitusiBef = parseFloat((parseFloat(data[3].rea_bef)/pembagi).toFixed(2))
            var rkaRestitusiNow = parseFloat((parseFloat(data[3].rka_now)/pembagi).toFixed(2))
            var restitusiAch = 0;
            var restitusiYoy = 0;

            if(rkaRjtpNow == 0) {
                rjtpAch = 0;
            } else {
                rjtpAch = ((reaRjtpNow/rkaRjtpNow)*100).toFixed(2);
            }

            if(reaRjtpBef == 0) {
                rjtpYoy = 0;
            } else {
                rjtpYoy = (((reaRjtpNow/reaRjtpBef)-1)*100).toFixed(2);
            }
            
            if(rkaRjtlNow == 0) {
                rjtlAch = 0;
            } else {
                rjtlAch = ((reaRjtlNow/rkaRjtlNow)*100).toFixed(2);
            }

            if(reaRjtlBef == 0) {
                rjtlYoy = 0;
            } else {
                rjtlYoy = (((reaRjtlNow/reaRjtlBef)-1)*100).toFixed(2);
            }

            if(rkaRiNow == 0) {
                riAch = 0;
            } else {
                riAch = ((reaRiNow/rkaRiNow)*100).toFixed(2);
            }

            if(reaRiBef == 0) {
                riYoy = 0;
            } else {
                riYoy = (((reaRiNow/reaRiBef)-1)*100).toFixed(2);
            }

            if(rkaRestitusiNow == 0) {
                restitusiAch = 0;
            } else {
                restitusiAch = ((reaRestitusiNow/rkaRestitusiNow)*100).toFixed(2);
            }

            if(reaRestitusiBef == 0) {
                restitusiYoy = 0;
            } else {
                restitusiYoy = (((reaRestitusiNow/reaRestitusiBef)-1)*100).toFixed(2);
            }
            
            $('#ach-rjtp').text("Ach. "+rjtpAch+"%")
            $('#ach-rjtl').text("Ach. "+rjtlAch+"%")
            $('#ach-ri').text("Ach. "+riAch+"%")
            $('#ach-restitusi').text("Ach. "+restitusiAch+"%")

            var ketYoyRjtp = "";
            if(rjtpYoy < 0 ) {
                ketYoyRjtp += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRjtp += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtpYoy+"%</span>";
            } else {
                ketYoyRjtp += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRjtp += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtpYoy+"%</span>";
            }
            $('#yoy-rjtp').append(ketYoyRjtp);

            var ketYoyRjtl = "";
            if(rjtlYoy < 0 ) {
                ketYoyRjtl += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRjtl += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtlYoy+"%</span>";
            } else {
                ketYoyRjtl += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRjtl += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+rjtlYoy+"%</span>";
            }
            $('#yoy-rjtl').append(ketYoyRjtl);

            var ketYoyRi = "";
            if(riYoy < 0 ) {
                ketYoyRi += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+riYoy+"%</span>";
            } else {
                ketYoyRi += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+riYoy+"%</span>";
            }
            $('#yoy-ri').append(ketYoyRi);

            var ketYoyRestitusi = "";
            if(restitusiYoy < 0 ) {
                ketYoyRestitusi += "<div class='glyph-icon simple-icon-arrow-down-circle' style='font-size: 18px;color: #ff0000;display:inline-block;'></div>"
                ketYoyRestitusi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+restitusiYoy+"%</span>";
            } else {
                ketYoyRestitusi += "<div class='glyph-icon simple-icon-arrow-up-circle' style='font-size: 18px;color: #228B22;display:inline-block;'></div>"
                ketYoyRestitusi += "<span style='padding-left: 10px;font-weight: bold;position: relative;top:-2px;'>"+restitusiYoy+"%</span>";
            }
            $('#yoy-restitusi').append(ketYoyRestitusi);
            
            columnRjtp.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRjtpBef,color: '#BFBFBF'})
            columnRjtp.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRjtpNow,color: '#9EEADC'})
            columnRjtp.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRjtpNow,color: '#288372'})

            columnRjtl.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRjtlBef,color: '#BFBFBF'})
            columnRjtl.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRjtlNow,color: '#9EEADC'})
            columnRjtl.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRjtlNow,color: '#288372'})

            columnRi.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRiBef,color: '#BFBFBF'})
            columnRi.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRiNow,color: '#9EEADC'})
            columnRi.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRiNow,color: '#288372'})

            columnRestitusi.push({name:"YTD Q3 '"+lastPeriodeSebelum+"",y:reaRestitusiBef,color: '#BFBFBF'})
            columnRestitusi.push({name:"RKA Q3 '"+lastPeriode+"",y:rkaRestitusiNow,color: '#9EEADC'})
            columnRestitusi.push({name:"YTD Q3 '"+lastPeriode+"",y:reaRestitusiNow,color: '#288372'})
            
            for(var i=0;i<data.length;i++) {
                totalRea = totalRea + parseFloat(data[i].rea_now)
            }
            var reaRJTP = parseFloat(((parseFloat(data[0].rea_now)/totalRea)*100).toFixed(2))
            var reaRJTL = parseFloat(((parseFloat(data[1].rea_now)/totalRea)*100).toFixed(2))
            var reaRI = parseFloat(((parseFloat(data[2].rea_now)/totalRea)*100).toFixed(2))
            var reaRestitusi = parseFloat(((parseFloat(data[3].rea_now)/totalRea)*100).toFixed(2))
            
            chart.push({name:'RJTP', y:reaRJTP})
            chart.push({name:'RJTL', y:reaRJTL})
            chart.push({name:'RI', y:reaRI})
            chart.push({name:'Restistusi', y:reaRestitusi})

            Highcharts.chart('komposisi', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    height: 250,
                    colors: ['#9EEADC', '#47D7BD', '#37AA94', '#288372']
                },
                exporting:{
                    enabled: false
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%<b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        size: 195,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            padding: 0,
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        },
                    }
                },
                series: [{
                    name: 'Komposisi',
                    colorByPoint: true,
                    data: chart
                }]
            });

            Highcharts.chart('rjtp', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                exporting:{
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRjtp,
                    }
                ]
            });

             Highcharts.chart('rjtl', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                exporting:{
                    enabled: false
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRjtl,
                    }
                ]
            });

             Highcharts.chart('ri', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                exporting:{
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRi,
                    }
                ]
            });

             Highcharts.chart('restitusi', {
                chart: {
                    type: 'column',
                    height: 250,
                },
                legend:{ enabled:false },
                credits: {
                    enabled: false
                },
                exporting:{
                    enabled: false
                },
                title: {
                    text: '',
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    labels: {
                        enabled: false
                    }
                },
                yAxis: {
                    visible: false
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    series:{
                        dataLabels: {
                            enabled: true
                        }
                    },
                    column: {
                        color: '#2727ff'
                    },
                },
                series: [
                    {
                        name: "RJTP",
                        data: columnRestitusi,
                    }
                ]
            });
        }
    });
}
getDataKunjungan();
getDataLayanan();
</script>