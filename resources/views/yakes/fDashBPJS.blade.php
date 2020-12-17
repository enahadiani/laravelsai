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
    .container-keterangan-nilai {
        z-index: 1;
        position: absolute;
        top: 30%;
        margin: 0;
        margin-left: 162px;
    }
    .container-keterangan-persen {
        z-index: 1;
        position: absolute;
        top: 30%;
        margin: 0;
        right: 0;
        margin-right: -65px;
    }
    .dropdown-filter {
        width: 100%;
        margin: 0 10px;
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
        width: 100%;;
        z-index: 2;
    }
    .select-dash {
        border-radius: 10px;
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
    .label-filter {
        font-size: 0.87rem;
        padding-left: 5px;
        margin-left: 10px;
    }
    .group-filter {
        padding: 8px 0;
    }
</style>

<button id="button-top" class="button-top" onclick="topFunction()">
        <span class="simple-icon-arrow-up"></span>
</button>

<div id="filter-header">
    <div class="row">
        <div class="col-6">
            <h6>BPJS</h6>
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
<div class="row" style="margin-top: 20px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;" id="judul-chart"></h6>
            <div class="row">
                <div class="col-12">
                    <div id="chart-bpjs"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;" id="table-bpjs">
                        <thead id="header-table-bpjs">
                            
                        </thead>
                        <tbody id="data-table-bpjs">
                            
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
                    <div class="group-filter">
                        <label for="dashboard" class="label-filter">Dashboard</label>
                        <div class="dropdown-dash dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                Utilisasi BPJS
                                <span id="value-dash" style="display: none;"></span>
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                            </button>
                            <ul class="dropdown-menu dash-bpjs" role="menu" aria-labelledby="menu1">
                                <li>
                                    <span style="display: none;">UTL</span>
                                    <span>Utilisasi BPJS</span>
                                </li>
                                <li>
                                    <span style="display: none;">CLM</span>
                                    <span>Claim BPJS</span>
                                </li>
                                <li>
                                    <span style="display: none;">KPT</span>
                                    <span>Kapitasi BPJS</span>
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
                    <div class="group-filter" id="jenis-bpjs">
                        <label for="jenis" class="label-filter">Jenis</label>
                        <div class="dropdown-jenis dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                Total
                                <span id="value-jenis" style="display: none;"></span>
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                            </button>
                            <ul class="dropdown-menu jenis" role="menu" aria-labelledby="menu1">
                                <li>
                                    <span style="display: none;">PGW</span>
                                    <span>Pegawai</span>
                                </li>
                                <li>
                                    <span style="display: none;">PNS</span>
                                    <span>Pensiun</span>
                                </li>
                                <li>
                                    <span style="display: none;">TTL</span>
                                    <span>Total</span>
                                </li>
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
    var pembagi = 1000000;
    var dashBPJS = "UTL";
    var jenis = "TTL";
    var jenisToApi = "TOTAL";
    var dashboard = "";
    var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var periode = "{{Session::get('periode')}}";
    var split = periode.match(/.{1,4}/g);
    var tahun = split[0];
    var numMonth = parseInt(split[1]) - 1;
    var namaMonth = bulan[numMonth];
    var keterangan = "Periode sampai dengan "+namaMonth+" "+tahun;
    var buttonFilter = document.getElementById('button-filter');
    var buttonTop = document.getElementById('button-top');
    var header = document.getElementById('filter-header');
    var sticky = header.offsetTop;
    var dataBPJS = [];
    var headerBPJS = [];
    var chartBpjs = [];
    var categoriesChart = [];

    if(dashBPJS == "UTL") {
        getUtilisasiBPJS();
    } else if(dashBPJS == "CLM") {
        getClaimBPJS();
    } else if(dashBPJS == "KTG") {

    }

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

    $('#keterangan-filter').text(keterangan);

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    $('#form-filter').on('click', '#btn-reset', function(){
        var text1 = "Utilisasi BPJS";
        var text2 = "{{Session::get('periode')}}";
        var text3 = "Total";
        var htmlTextDash = text1+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-dash').find('.select-dash').html(htmlTextDash);
        var htmlTextPeriode = text2+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-periode').find('.select-dash').html(htmlTextPeriode);
        var htmlTextJenis = text3+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-jenis').find('.select-dash').html(htmlTextJenis);
        dashBPJS = "UTL";
        periode = "{{Session::get('periode')}}";
        jenis = "TTL";
        jenisToApi = "TOTAL"
    })

    $('#form-filter').on('click', '#btn-tampil', function(){
        split = periode.match(/.{1,4}/g);
        tahun = split[0];
        numMonth = parseInt(split[1]) - 1;
        namaMonth = bulan[numMonth];
        keterangan = "Periode sampai dengan "+namaMonth+" "+tahun;
        $('#keterangan-filter').text(keterangan);
        if(dashBPJS == "UTL") {
            getUtilisasiBPJS();
        } else if(dashBPJS == "CLM") {
            getClaimBPJS();
        } else if(dashBPJS == "KTG") {

        }
        $('#modalFilter').modal('hide');
    })

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
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-periode').find('.select-dash').html(htmlText);
        periode = text;
    });

    $('.jenis').on( 'click', 'li', function() {
        var value = $(this).find('span').first().text();
        var text = $(this).find('span').last().text();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:2%;'></span>";
        $(this).closest('.dropdown-jenis').find('.select-dash').html(htmlText);
        jenis = value;
        jenisToApi = "TOTAL"
    });

    $('.dash-bpjs').on( 'click', 'li', function() {
        var value = $(this).find('span').first().text();
        var text = $(this).find('span').last().text();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:2%;'></span>";
        $(this).closest('.dropdown-dash').find('.select-dash').html(htmlText);
        dashBPJS = value;
        jenisToApi = text;
        if(value == 'KPT') {
            $('#jenis-bpjs').hide();
        } else {
            $('#jenis-bpjs').show();
        }
    });

    $('#dash-list').on( 'click', 'tr', function() {
        var form = $(this).find('td').first().text();
        dashboard = "{{ url('yakes-auth/form')}}/"+form;
        $('#modal-preview').modal('hide');
        loadForm(dashboard);
    });

    function cekNaN(value) {
        if(isNaN(value)) {
            return 0
        } else {
            return value
        }
    }

    function getClaimBPJS() {
        headerBPJS = [];
        dataBPJS = [];
        chartBpjs =[];
        categoriesChart = [];
        $('#header-table-bpjs').empty();
        $('#data-table-bpjs').empty();
        var colors = ['#BFBFBF', '#9EEADC', '#288372',  '#14213d', '#FCA311'];
        headerBPJS.push('REG 1', 'REG 2', 'REG 3', 'REG 4', 'REG 5', 'REG 6', 'REG 7', 'TOTAL')
        categoriesChart.push('REG 1', 'REG 2', 'REG 3', 'REG 4', 'REG 5', 'REG 6', 'REG 7', 'TOTAL')
        var htmlHeader = "";
        var htmlBody = "";
        htmlHeader += "<tr>";
        htmlHeader += "<th style='width: 20%;'></th>";
        for(var i=0;i<headerBPJS.length;i++) {
            htmlHeader += "<th>"+headerBPJS[i]+"</th>"   
        }
        htmlHeader += "</tr>";

        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-claim') }}/"+periode+"/"+jenisToApi,
            dataType: 'JSON',
            async: false,
            success: function(result) {
                var data = result.daftar;
                var n1TA=0;
                var n2TA=0;
                var n3TA=0;
                var n4TA=0;
                var n5TA=0;
                var n6TA=0;
                var n7TA=0;
                var totalTA=0;
                var n1CL=0;
                var n2CL=0;
                var n3CL=0;
                var n4CL=0;
                var n5CL=0;
                var n6CL=0;
                var n7CL=0;
                var totalCL=0;
                var n1BY=0;
                var n2BY=0;
                var n3BY=0;
                var n4BY=0;
                var n5BY=0;
                var n6BY=0;
                var n7BY=0;
                var totalBY=0;
                for(var i=0;i<data.length;i++) {
                    if(data[i].jenis == 'TAGIHAN AWAL') {
                        n1TA = parseFloat(data[i].n1) + n1TA;
                        n2TA = parseFloat(data[i].n2) + n2TA;
                        n3TA = parseFloat(data[i].n3) + n3TA;
                        n4TA = parseFloat(data[i].n4) + n4TA;
                        n5TA = parseFloat(data[i].n5) + n5TA;
                        n6TA = parseFloat(data[i].n6) + n6TA;
                        n7TA = parseFloat(data[i].n7) + n7TA;
                        totalTA = (n1TA + n2TA + n3TA + n4TA + n5TA + n6TA +n7TA) + totalTA;
                    } else if(data[i].jenis == 'CLAIM') {
                        n1CL = parseFloat(data[i].n1) + n1CL;
                        n2CL = parseFloat(data[i].n2) + n2CL;
                        n3CL = parseFloat(data[i].n3) + n3CL;
                        n4CL = parseFloat(data[i].n4) + n4CL;
                        n5CL = parseFloat(data[i].n5) + n5CL;
                        n6CL = parseFloat(data[i].n6) + n6CL;
                        n7CL = parseFloat(data[i].n7) + n7CL;
                        totalCL = (n1CL + n2CL + n3CL + n4CL + n5CL + n6CL +n7CL) + totalCL;
                    } else if(data[i].jenis == 'DIBAYAR') {
                        n1BY = parseFloat(data[i].n1) + n1BY;
                        n2BY = parseFloat(data[i].n2) + n2BY;
                        n3BY = parseFloat(data[i].n3) + n3BY;
                        n4BY = parseFloat(data[i].n4) + n4BY;
                        n5BY = parseFloat(data[i].n5) + n5BY;
                        n6BY = parseFloat(data[i].n6) + n6BY;
                        n7BY = parseFloat(data[i].n7) + n7BY;
                        totalBY = (n1BY + n2BY + n3BY + n4BY + n5BY + n6BY +n7BY) + totalBY;
                    }
                }
                n1TA = parseFloat((n1TA/pembagi).toFixed(2));
                n2TA = parseFloat((n2TA/pembagi).toFixed(2));
                n3TA = parseFloat((n3TA/pembagi).toFixed(2));
                n4TA = parseFloat((n4TA/pembagi).toFixed(2));
                n5TA = parseFloat((n5TA/pembagi).toFixed(2));
                n6TA = parseFloat((n6TA/pembagi).toFixed(2));
                n7TA = parseFloat((n7TA/pembagi).toFixed(2));
                totalTA = parseFloat((totalTA/pembagi).toFixed(2));
                n1CL = parseFloat((n1CL/pembagi).toFixed(2));
                n2CL = parseFloat((n2CL/pembagi).toFixed(2));
                n3CL = parseFloat((n3CL/pembagi).toFixed(2));
                n4CL = parseFloat((n4CL/pembagi).toFixed(2));
                n5CL = parseFloat((n5CL/pembagi).toFixed(2));
                n6CL = parseFloat((n6CL/pembagi).toFixed(2));
                n7CL = parseFloat((n7CL/pembagi).toFixed(2));
                totalCL = parseFloat((totalCL/pembagi).toFixed(2));
                n1BY = parseFloat((n1BY/pembagi).toFixed(2));
                n2BY = parseFloat((n2BY/pembagi).toFixed(2));
                n3BY = parseFloat((n3BY/pembagi).toFixed(2));
                n4BY = parseFloat((n4BY/pembagi).toFixed(2));
                n5BY = parseFloat((n5BY/pembagi).toFixed(2));
                n6BY = parseFloat((n6BY/pembagi).toFixed(2));
                n7BY = parseFloat((n7BY/pembagi).toFixed(2));
                totalBY = parseFloat((totalBY/pembagi).toFixed(2));
                dataBPJS.push({nama:'Tagihan Awal', n1:n1TA, n2:n2TA, n3:n3TA, n4:n4TA, n5:n5TA, n6:n6TA, n7:n7TA, n8:totalTA});
                dataBPJS.push({nama:'Claim BPJS', n1:n1CL, n2:n2CL, n3:n3CL, n4:n4CL, n5:n5CL, n6:n6CL, n7:n7CL, n8:totalCL});
                dataBPJS.push({nama:'Bayar Yakes', n1:n1BY, n2:n2BY, n3:n3BY, n4:n4BY, n5:n5BY, n6:n6BY, n7:n7BY, n8:totalBY});
                chartBpjs.push({type:'column', name:'Tagihan Awal', data:[n1TA, n2TA, n3TA, n4TA, n5TA, n6TA, n7TA, totalTA], color: '#BFBFBF'});
                chartBpjs.push({type:'column', name:'Claim BPJS', data:[n1CL, n2CL, n3CL, n4CL, n5CL, n6CL, n7CL, totalCL], color: '#9EEADC'});
                chartBpjs.push({type:'column', name:'Bayar Yakes', data:[n1BY, n2BY, n3BY, n4BY, n5BY, n6BY, n7BY, totalBY], color: '#288372'});
            }
        });
        var avg1 = {
            nama:'Claim vs Tag.Awal (%)', 
            n1:parseFloat((parseFloat(dataBPJS[1].n1)/parseFloat(dataBPJS[0].n1)*100).toFixed(2)), 
            n2:parseFloat((parseFloat(dataBPJS[1].n2)/parseFloat(dataBPJS[0].n2)*100).toFixed(2)), 
            n3:parseFloat((parseFloat(dataBPJS[1].n3)/parseFloat(dataBPJS[0].n3)*100).toFixed(2)), 
            n4:parseFloat((parseFloat(dataBPJS[1].n4)/parseFloat(dataBPJS[0].n4)*100).toFixed(2)), 
            n5:parseFloat((parseFloat(dataBPJS[1].n5)/parseFloat(dataBPJS[0].n5)*100).toFixed(2)), 
            n6:parseFloat((parseFloat(dataBPJS[1].n6)/parseFloat(dataBPJS[0].n6)*100).toFixed(2)), 
            n7:parseFloat((parseFloat(dataBPJS[1].n7)/parseFloat(dataBPJS[0].n7)*100).toFixed(2)), 
            n8:parseFloat((parseFloat(dataBPJS[1].n8)/parseFloat(dataBPJS[0].n8)*100).toFixed(2)), 
        }
        var avg2 = {
            nama:'Bayar Yakes vs Tag.Awal (%)', 
            n1:parseFloat((parseFloat(dataBPJS[2].n1)/parseFloat(dataBPJS[0].n1)*100).toFixed(2)), 
            n2:parseFloat((parseFloat(dataBPJS[2].n2)/parseFloat(dataBPJS[0].n2)*100).toFixed(2)), 
            n3:parseFloat((parseFloat(dataBPJS[2].n3)/parseFloat(dataBPJS[0].n3)*100).toFixed(2)), 
            n4:parseFloat((parseFloat(dataBPJS[2].n4)/parseFloat(dataBPJS[0].n4)*100).toFixed(2)), 
            n5:parseFloat((parseFloat(dataBPJS[2].n5)/parseFloat(dataBPJS[0].n5)*100).toFixed(2)), 
            n6:parseFloat((parseFloat(dataBPJS[2].n6)/parseFloat(dataBPJS[0].n6)*100).toFixed(2)), 
            n7:parseFloat((parseFloat(dataBPJS[2].n7)/parseFloat(dataBPJS[0].n7)*100).toFixed(2)), 
            n8:parseFloat((parseFloat(dataBPJS[2].n8)/parseFloat(dataBPJS[0].n8)*100).toFixed(2)), 
        }
        dataBPJS.push(avg1);
        dataBPJS.push(avg2);
        chartBpjs.push({type:'spline', name:'Claim vs Tag.Awal', data:[avg1.n1, avg1.n2, avg1.n3, avg1.n4, avg1.n5, avg1.n6, avg1.n7, avg1.n8], color:'#14213d', marker:{ lineWidth:2}, yAxis:1});
        chartBpjs.push({type:'spline', name:'Bayar Yakes vs Tag.Awal', data:[avg2.n1, avg2.n2, avg2.n3, avg2.n4, avg2.n5, avg2.n6, avg2.n7, avg2.n8], color:'#FCA311', marker:{ lineWidth:2}, yAxis:1});
        for(var i=0;i<dataBPJS.length;i++) {
            htmlBody += "<tr>";
            if (i <= 2) {
                htmlBody += "<td style='position: relative;'>";
                htmlBody += "<div style='height: 15px; width:25px; background-color:"+colors[i]+";display:inline-block;margin-left:3px;margin-top:1px;'></div>&nbsp"+dataBPJS[i].nama;
                htmlBody += "</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n1)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n2)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n3)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n4)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n5)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n6)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n7)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n8)+"</td>";
            } else {
                htmlBody += "<td style='position: relative;'>";
                htmlBody += "<div style='height: 15px; width:25px; background-color:"+colors[i]+";display:inline-block;margin-left:3px;margin-top:1px;'></div>&nbsp"+dataBPJS[i].nama;
                htmlBody += "</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n1)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n2)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n3)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n4)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n5)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n6)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n7)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n8)+"</td>";
            }
            htmlBody += "</tr>";
        }
        $('#header-table-bpjs').append(htmlHeader);
        $('#data-table-bpjs').append(htmlBody);
        generateChart(240, 60);
    }

    function getUtilisasiBPJS() {
        headerBPJS = [];
        dataBPJS = [];
        chartBpjs =[];
        categoriesChart = [];
        $('#header-table-bpjs').empty();
        $('#data-table-bpjs').empty();
        var colors = ['#BFBFBF', '#9EEADC', '#288372', '#FCA311'];
        headerBPJS.push('PUSAT', 'REG 1', 'REG 2', 'REG 3', 'REG 4', 'REG 5', 'REG 6', 'REG 7', 'TOTAL')
        categoriesChart.push('PUSAT', 'REG 1', 'REG 2', 'REG 3', 'REG 4', 'REG 5', 'REG 6', 'REG 7', 'TOTAL')
        var htmlHeader = "";
        var htmlBody = "";
        htmlHeader += "<tr>";
        htmlHeader += "<th style='width: 18%;'></th>";
        for(var i=0;i<headerBPJS.length;i++) {
            htmlHeader += "<th>"+headerBPJS[i]+"</th>"   
        }
        htmlHeader += "</tr>";

        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-bpjs-iuran') }}/"+periode+"/"+jenisToApi,
            dataType: 'JSON',
            async: false,
            success: function(result) {
                var data = result.daftar[0];
                var pusat = parseFloat((parseFloat(data.pr9)/pembagi).toFixed(2));
                var n1 = parseFloat((parseFloat(data.pr1)/pembagi).toFixed(2));
                var n2 = parseFloat((parseFloat(data.pr2)/pembagi).toFixed(2));
                var n3 = parseFloat((parseFloat(data.pr3)/pembagi).toFixed(2));
                var n4 = parseFloat((parseFloat(data.pr4)/pembagi).toFixed(2));
                var n5 = parseFloat((parseFloat(data.pr5)/pembagi).toFixed(2));
                var n6 = parseFloat((parseFloat(data.pr6)/pembagi).toFixed(2));
                var n7 = parseFloat((parseFloat(data.pr7)/pembagi).toFixed(2));
                var total = parseFloat((parseFloat(data.premi_total)/pembagi).toFixed(2));
                dataBPJS.push({nama:'Iuran BPJS', n1:pusat, n2:n1, n3:n2, n4:n3, n5:n4, n6:n5, n7:n6, n8:n7, n9:total})
                chartBpjs.push({type:'column', name:'Iuran BPJS', data:[pusat, n1, n2, n3, n4, n5, n6, n7, total], color: '#BFBFBF'});
            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-bpjs-kapitasi') }}/"+periode+"/"+jenisToApi,
            dataType: 'JSON',
            async: false,
            success: function(result) {
                var data = result.daftar[0];
                var pusat = parseFloat((parseFloat(data.kap9)/pembagi).toFixed(2));
                var n1 = parseFloat((parseFloat(data.kap1)/pembagi).toFixed(2));
                var n2 = parseFloat((parseFloat(data.kap2)/pembagi).toFixed(2));
                var n3 = parseFloat((parseFloat(data.kap3)/pembagi).toFixed(2));
                var n4 = parseFloat((parseFloat(data.kap4)/pembagi).toFixed(2));
                var n5 = parseFloat((parseFloat(data.kap5)/pembagi).toFixed(2));
                var n6 = parseFloat((parseFloat(data.kap6)/pembagi).toFixed(2));
                var n7 = parseFloat((parseFloat(data.kap7)/pembagi).toFixed(2));
                var total = parseFloat((parseFloat(data.kap_total)/pembagi).toFixed(2));
                dataBPJS.push({nama:'Kapitasi', n1:pusat, n2:n1, n3:n2, n4:n3, n5:n4, n6:n5, n7:n6, n8:n7, n9:total})
                chartBpjs.push({type:'column', name:'Kapitasi', data:[pusat, n1, n2, n3, n4, n5, n6, n7, total], color: '#9EEADC'});
            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-bpjs-claim') }}/"+periode+"/"+jenisToApi,
            dataType: 'JSON',
            async: false,
            success: function(result) {
                var data = result.daftar[0];
                var pusat = parseFloat((parseFloat(data.cl9)/pembagi).toFixed(2));
                var n1 = parseFloat((parseFloat(data.cl1)/pembagi).toFixed(2));
                var n2 = parseFloat((parseFloat(data.cl2)/pembagi).toFixed(2));
                var n3 = parseFloat((parseFloat(data.cl3)/pembagi).toFixed(2));
                var n4 = parseFloat((parseFloat(data.cl4)/pembagi).toFixed(2));
                var n5 = parseFloat((parseFloat(data.cl5)/pembagi).toFixed(2));
                var n6 = parseFloat((parseFloat(data.cl6)/pembagi).toFixed(2));
                var n7 = parseFloat((parseFloat(data.cl7)/pembagi).toFixed(2));
                var total = parseFloat((parseFloat(data.cl_total)/pembagi).toFixed(2));
                dataBPJS.push({nama:'Claim BPJS', n1:pusat, n2:n1, n3:n2, n4:n3, n5:n4, n6:n5, n7:n6, n8:n7, n9:total})
                chartBpjs.push({type:'column', name:'Claim BPJS', data:[pusat, n1, n2, n3, n4, n5, n6, n7, total], color: '#288372'});
            }
        });

        var avg = {
            nama:'Utilisasi/Iuran', 
            n1:parseFloat((((parseFloat(dataBPJS[2].n1) + parseFloat(dataBPJS[1].n1))/parseFloat(dataBPJS[0].n1))*100).toFixed(2)), 
            n2:parseFloat((((parseFloat(dataBPJS[2].n2) + parseFloat(dataBPJS[1].n2))/parseFloat(dataBPJS[0].n2))*100).toFixed(2)), 
            n3:parseFloat((((parseFloat(dataBPJS[2].n3) + parseFloat(dataBPJS[1].n3))/parseFloat(dataBPJS[0].n3))*100).toFixed(2)), 
            n4:parseFloat((((parseFloat(dataBPJS[2].n4) + parseFloat(dataBPJS[1].n4))/parseFloat(dataBPJS[0].n4))*100).toFixed(2)), 
            n5:parseFloat((((parseFloat(dataBPJS[2].n5) + parseFloat(dataBPJS[1].n5))/parseFloat(dataBPJS[0].n5))*100).toFixed(2)), 
            n6:parseFloat((((parseFloat(dataBPJS[2].n6) + parseFloat(dataBPJS[1].n6))/parseFloat(dataBPJS[0].n6))*100).toFixed(2)), 
            n7:parseFloat((((parseFloat(dataBPJS[2].n7) + parseFloat(dataBPJS[1].n7))/parseFloat(dataBPJS[0].n7))*100).toFixed(2)), 
            n8:parseFloat((((parseFloat(dataBPJS[2].n8) + parseFloat(dataBPJS[1].n8))/parseFloat(dataBPJS[0].n8))*100).toFixed(2)), 
            n9:parseFloat((((parseFloat(dataBPJS[2].n9) + parseFloat(dataBPJS[1].n9))/parseFloat(dataBPJS[0].n9))*100).toFixed(2)), 
        }
        dataBPJS.push(avg);
        chartBpjs.push({type:'spline', name:'Utilasi/Iuran', data:[avg.n1, avg.n2, avg.n3, avg.n4, avg.n5, avg.n6, avg.n7, avg.n8, avg.n9], color:'#FCA311', marker:{ lineWidth:2}, yAxis:1});
        for(var i=0;i<dataBPJS.length;i++) {
            htmlBody += "<tr>";
            if (i <= 2) {
                htmlBody += "<td style='position: relative;'>";
                htmlBody += "<div style='height: 15px; width:25px; background-color:"+colors[i]+";display:inline-block;margin-left:3px;margin-top:1px;'></div>&nbsp"+dataBPJS[i].nama;
                htmlBody += "</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n1)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n2)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n3)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n4)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n5)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n6)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n7)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n8)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+sepNum(dataBPJS[i].n9)+"</td>";
            } else {
                htmlBody += "<td style='position: relative;'>";
                htmlBody += "<div style='height: 15px; width:25px; background-color:"+colors[i]+";display:inline-block;margin-left:3px;margin-top:1px;'></div>&nbsp"+dataBPJS[i].nama;
                htmlBody += "</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n1)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n2)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n3)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n4)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n5)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n6)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n7)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n8)+"</td>";
                htmlBody += "<td style='text-align: right;'>"+cekNaN(dataBPJS[i].n9)+"</td>";
            }
            htmlBody += "</tr>";
        }
        $('#header-table-bpjs').append(htmlHeader);
        $('#data-table-bpjs').append(htmlBody);
        generateChart(220, 60);
    }

    function generateChart(marginLeft, marginRight) {
        Highcharts.chart('chart-bpjs', {
            chart: {
                marginLeft: marginLeft,
                marginRight: marginRight
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
                categories: categoriesChart,
                labels: {
                    enabled: false
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
                //     '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
            series: chartBpjs
        });
    }

</script>