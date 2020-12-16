<link rel="stylesheet" href="{{ asset('master.css') }}" />
<style>
    table.table-akun > thead > tr > th {
        color: #f0f0f0;
        text-align: center;
    }
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
    table, td, th {
        border: 1px solid #d3d3d3 !important;
        margin-bottom: 10px;
    }  

    th {
        padding: 5px;
        text-align: center;
        background-color: #f9f9f9 !important;
    }
    .select-dash {
        border-radius: 10px;
    }
    .container-keterangan-nilai {
        z-index: 1;
        position: absolute;
        top: 30%;
        margin: 0;
        margin-left: 126px;
    }
    .container-keterangan-persen {
        z-index: 1;
        position: absolute;
        top: 30%;
        margin: 0;
        right: 0;
        margin-right: -60px;
    }
    .dropdown-filter {
        width: 100%;
        margin: 10px;
    }
    .keterangan {
        display: inline-block;
        -webkit-transform: rotate(270deg);
        -webkit-transform-origin: 0 0;
    }
    .fixed-filter {
        background-color: #f8f8f8;
        position: fixed;
        top: 9%;
        margin: 0;
        padding: 10px 0;
        padding-bottom: 18px;
        width: 100%;
        z-index: 2;
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
        margin-right: 20px;
    }
    .btn-filter-scroll {
        margin-right: 182px;
    }
    .filter-count {
        display: inline;
        border-radius: 50%;
        padding: 1px 5px;
        height: 20px;
        width: 20px;
        text-align: center;
        background-color: #93ccce;
    }
    #keterangan-filter {
        margin: 10px;
    }
</style>

<button id="button-top" class="button-top" onclick="topFunction()">
        <span class="simple-icon-arrow-up"></span>
</button>

<div id="filter-header">
    <div class="row">
        <div class="col-6">
            <h6>Realisasi BPCC</h6>
        </div>
        <div class="col-6">
            <button id="button-filter" class="btn btn-light btn-filter btn-filter-no-scroll">
                <span>Filter</span>
                <div class="filter-count">
                    2
                </div>
            </button>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;" id="judul-cc"></h6>
            <div class="row">
                <div class="col-12">
                    <div id="cc"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:10%;"></th>
                                <th style="width:10%;">RJTP</th>
                                <th style="width:10%;">RJTKL</th>
                                <th style="width:10%;">RI</th>
                                <th style="width:10%;">RESTITUSI</th>
                            </tr>
                        </thead>
                        <tbody id="real-cc">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;" id="judul-bp"></h6>
            <div class="row">
                <div class="col-12">
                    <div id="bp"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:10%;"></th>
                                <th style="width:10%;">RJTP</th>
                                <th style="width:10%;">RJTKL</th>
                                <th style="width:10%;">RI</th>
                                <th style="width:10%;">RESTITUSI</th>
                            </tr>
                        </thead>
                        <tbody id="real-bp">
                            
                        </tbody>
                    </table>
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
                    <p id="keterangan-filter"></p>
                    <div class="dropdown-regional dropdown dropdown-filter">
                        <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                            Regional : -
                            <span style="display: none;" id="value-jenis"></span>
                            <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                        </button>
                        <ul class="dropdown-menu jenis" style="overflow: hidden; width:99%;" role="menu" aria-labelledby="menu2">
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
                    <div class="dropdown-periode dropdown dropdown-filter">
                        <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                            Periode : {{Session::get('periode')}}
                            <span id="value-periode" style="display: none;"></span>
                            <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                        </button>
                        <ul class="dropdown-menu periode" role="menu" aria-labelledby="menu1">
                            
                        </ul>
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
var dashboard = "";
var periode = "{{Session::get('periode')}}";
var pembagi = 1000000;
var warna = ['#BFBFBF', '#9EEADC', '#288372', '#14213d', '#FCA311'];
var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var bulanSingkat = ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGT', 'SEP', 'OKT', 'NOV', 'DES'];
var split = periode.match(/.{1,4}/g);
var tahun = split[0];
var numTahun = parseInt(tahun);
var tahunSebelumnya = numTahun - 1;
var numMonth = parseInt(split[1]) - 1;
var namaMonth = bulan[numMonth];
var keterangan = "Periode sampai dengan "+namaMonth+" "+tahun;
var judulCC = "Realisasi CC YTD "+bulanSingkat[numMonth]+" "+tahun+"";
var judulBP = "Realisasi BP YTD "+bulanSingkat[numMonth]+" "+tahun+"";

var header = document.getElementById('filter-header');
var buttonTop = document.getElementById('button-top');
var buttonFilter = document.getElementById('button-filter');
var sticky = header.offsetTop;
window.onscroll = function() {
    if(window.pageYOffset > sticky) {
        header.classList.add('fixed-filter')
        buttonTop.style.display = 'block';
        buttonFilter.classList.add('btn-filter-scroll')
        buttonFilter.classList.remove('btn-filter-no-scroll')
    } else {
        header.classList.remove('fixed-filter')
        buttonTop.style.display = 'none';
        buttonFilter.classList.remove('btn-filter-scroll')
        buttonFilter.classList.add('btn-filter-no-scroll')
    }
}

    $('#judul-cc').text(judulCC);
    $('#judul-bp').text(judulBP);
    $('#keterangan-filter').text(keterangan);

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-periode') }}/",
        dataType: 'JSON',
        success: function(result) {
            $.each(result.daftar, function(key, value){
                $('.periode').append("<li>"+value.periode+"</li>")
            })
        }
    });

    $('.periode').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = "Periode : "+text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-periode').find('.select-dash').html(htmlText);
        periode = text;
    });

    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    $('#form-filter').on('click', '#btn-reset', function(){
        var text2 = "{{Session::get('periode')}}";
        var htmlTextPeriode = "Periode : "+text2+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-periode').find('.select-dash').html(htmlTextPeriode);
        periode = "{{Session::get('periode')}}";
    })

    $('#form-filter').on('click', '#btn-tampil', function(){
        $('#real-bp').empty();
        $('#real-cc').empty();
        getDataCC();
        getDataBP();
        split = periode.match(/.{1,4}/g);
        tahun = split[0];
        numMonth = parseInt(split[1]) - 1;
        numTahun = parseInt(tahun);
        namaMonth = bulan[numMonth];
        tahunSebelumnya = numTahun - 1;
        keterangan = "Periode sampai dengan "+namaMonth+" "+tahun;
        judulCC = "Realisasi CC YTD "+bulanSingkat[numMonth]+" "+tahun+"";
        judulBP = "Realisasi BP YTD "+bulanSingkat[numMonth]+" "+tahun+"";
        $('#keterangan-filter').text(keterangan);
        $('#judul-cc').text(judulCC);
        $('#judul-bp').text(judulBP);
        $('#modalFilter').modal('hide');
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

    // $('#periode').change(function(){
    //     $('#real-bp').empty();
    //     $('#real-cc').empty();
    //     var val = $(this).val();
    //     periode = val;
    //     getDataCC();
    //     getDataBP();
    // })
    getDataCC();
    getDataBP();    
    function getDataCC() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-cc') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                $('#real-cc').empty();
                var data = result.daftar;
                var rea_now = [];
                var rea_bef = [];
                var rka_now = [];
                var ach = [];
                var yoy = [];
                var chart = [];
                var resultReaNow = 0
                var resultRkaNow = 0;
                var resultReaBefore = 0;
                var ReaNow = 0
                var RkaNow = 0;
                var ReaBefore = 0;
                var resultAch = 0;
                var resultYoy = 0;

                var html = "";
                for(var i=0;i<data.length;i++) { 
                    resultReaNow = parseFloat(data[i].rea_now)/pembagi;
                    ReaNow = parseFloat(resultReaNow.toFixed(0));
                    resultRkaNow = parseFloat(data[i].rka_now)/pembagi;
                    RkaNow = parseFloat(resultRkaNow.toFixed(0));
                    resultReaBefore = parseFloat(data[i].rea_bef)/pembagi;
                    ReaBefore = parseFloat(resultReaBefore.toFixed(0));

                    if(RkaNow == 0) {
                        resultAch = 0;
                    } else {
                        resultAch = parseFloat(((ReaNow/RkaNow)*100).toFixed(2));
                    }

                    if(ReaBefore == 0) {
                        resultYoy = 0;
                    } else {
                        resultYoy = parseFloat((((ReaNow/ReaBefore)-1)*100).toFixed(2));
                    }
                    
                    rea_now.push(ReaNow);
                    rea_bef.push(ReaBefore);
                    rka_now.push(RkaNow);
                    ach.push(resultAch)
                    yoy.push(resultYoy);

                }

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#BFBFBF;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;REA YTD "+bulanSingkat[numMonth]+" "+tahunSebelumnya+"";
                html += "</td>";
                for(var x=0;x<rea_bef.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_bef[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#9EEADC;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;RKA YTD "+bulanSingkat[numMonth]+" "+tahun+"";
                html += "</td>";
                for(var x=0;x<rka_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rka_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#288372;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;REA YTD "+bulanSingkat[numMonth]+" "+tahun+"";
                html += "</td>";
                for(var x=0;x<rea_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#14213d;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;ACH";
                html += "</td>";
                for(var x=0;x<ach.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(ach[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#FCA311;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;YoY";
                html += "</td>";
                for(var x=0;x<yoy.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += yoy[x];
                    html += "</td>";
                }
                html += "</tr>";

                $('#real-cc').append(html);
                chart.push({type:'column', name:"REA YTD "+bulanSingkat[numMonth]+" "+tahunSebelumnya+"", data:rea_bef, color:'#BFBFBF'})
                chart.push({type:'column', name:"RKA YTD "+bulanSingkat[numMonth]+" "+tahun+"", data:rka_now, color:'#9EEADC'})
                chart.push({type:'column', name:"REA YTD "+bulanSingkat[numMonth]+" "+tahun+"", data:rea_now, color:'#288372'})
                chart.push({type:'spline', name:'ACH', data:ach, color:'#14213d', yAxis:1, marker: {lineWidth: 2 }})
                chart.push({type:'spline', name:'YoY', data:yoy, color:'#FCA311', yAxis:1, marker: {lineWidth: 2 }})

                Highcharts.chart('cc', {
                    chart:{
                        // width:1050,
                        marginLeft: 230,
                        marginRight: 90
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
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['RJTP', 'RJTL', 'RI', 'RESTITUSI'],
                        labels: {
                            enabled: true
                        }
                    },
                    yAxis: [
                        {
                            linewidth: 1,
                            title:{
                                text: 'Rp. Dalam Juta'
                            }
                        },
                        {
                            linewidth: 1,
                            opposite: true,
                            title:{
                                text: 'Dalam Persen'
                            }
                        },
                    ],
                    tooltip: {
                        enabled: false
                        // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        //     '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                        // footerFormat: '</table>',
                        // shared: true,
                        // useHTML: true
                    },
                    plotOptions: {
                        series:{
                            pointPadding: 0,
                            shadow: false,
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: chart
                });

            }
        });
    }
    function getDataBP() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-bp') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                $('#real-bp').empty();
                var data = result.daftar;
                var rea_now = [];
                var rea_bef = [];
                var rka_now = [];
                var ach = [];
                var yoy = [];
                var chart = [];
                var resultReaNow = 0
                var resultRkaNow = 0;
                var resultReaBefore = 0;
                var ReaNow = 0
                var RkaNow = 0;
                var ReaBefore = 0;
                var resultAch = 0;
                var resultYoy = 0;
                
                var html = "";
                for(var i=0;i<data.length;i++) { 
                    resultReaNow = parseFloat(data[i].rea_now)/pembagi;
                    ReaNow = parseFloat(resultReaNow.toFixed(0));
                    resultRkaNow = parseFloat(data[i].rka_now)/pembagi;
                    RkaNow = parseFloat(resultRkaNow.toFixed(0));
                    resultReaBefore = parseFloat(data[i].rea_bef)/pembagi;
                    ReaBefore = parseFloat(resultReaBefore.toFixed(0));

                    if(RkaNow == 0) {
                        resultAch = 0;
                    } else {
                        resultAch = parseFloat(((ReaNow/RkaNow)*100).toFixed(2));
                    }

                    if(ReaBefore == 0) {
                        resultYoy = 0;
                    } else {
                        resultYoy = parseFloat((((ReaNow/ReaBefore)-1)*100).toFixed(2));
                    }
                    
                    rea_now.push(ReaNow);
                    rea_bef.push(ReaBefore);
                    rka_now.push(RkaNow);
                    ach.push(resultAch)
                    yoy.push(resultYoy);

                }

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#BFBFBF;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;REA YTD "+bulanSingkat[numMonth]+" "+tahunSebelumnya+"";
                html += "</td>";
                for(var x=0;x<rea_bef.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_bef[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#9EEADC;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;RKA YTD "+bulanSingkat[numMonth]+" "+tahun+"";
                html += "</td>";
                for(var x=0;x<rka_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rka_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#288372;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;REA YTD "+bulanSingkat[numMonth]+" "+tahun+"";
                html += "</td>";
                for(var x=0;x<rea_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#14213d;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;ACH";
                html += "</td>";
                for(var x=0;x<ach.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(ach[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#FCA311;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;YoY";
                html += "</td>";
                for(var x=0;x<yoy.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += yoy[x];
                    html += "</td>";
                }
                html += "</tr>";

                $('#real-bp').append(html);
                chart.push({type:'column', name:'REA YTD OKT 2019', data:rea_bef, color:'#BFBFBF'})
                chart.push({type:'column', name:'RKA YTD OKT 2020', data:rka_now, color:'#9EEADC'})
                chart.push({type:'column', name:'REA YTD OKT 2020', data:rea_now, color:'#288372'})
                chart.push({type:'spline', name:'ACH', data:ach, yAxis:1, color:'#14213d'})
                chart.push({type:'spline', name:'YoY', data:yoy, yAxis:1, color:'#FCA311'})

                Highcharts.chart('bp', {
                    chart:{
                        // width:1050,
                        marginLeft: 230,
                        marginRight: 90
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
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: ['RJTP', 'RJTL', 'RI', 'RESTITUSI'],
                        labels: {
                            enabled: true
                        }
                    },
                    yAxis: [
                        {
                            linewidth: 1,
                            title:{
                                text: 'Rp. Dalam Juta'
                            }
                        },
                        {
                            linewidth: 1,
                            opposite: true,
                            title:{
                                text: 'Dalam Persen'
                            }
                        },
                    ],
                    tooltip: {
                        enabled: false
                        // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        //     '<td style="padding:0"><b>{point.y:.1f} M</b></td></tr>',
                        // footerFormat: '</table>',
                        // shared: true,
                        // useHTML: true
                    },
                    plotOptions: {
                        series:{
                            pointPadding: 0,
                            shadow: false,
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    series: chart
                });
            }
        });
    }
</script>