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

    .keterangan {
        writing-mode: vertical-lr;
        margin: 0;
        position: absolute;
        margin-left: 10px;
        top: 30%;
    }
    .dropdown-filter {
        width: 100%;
        margin: 0 10px;
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
    .dropdown-menu-jenis {
        max-height: 130px;
        overflow: scroll;
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
            <h6>Laporan KPKU Kategori 7</h6>
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
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;" id="judul-chart"></h6>
            <div class="row">
                <div class="col-12">
                    <div id="kpku"></div>
                </div>
                <div class="col-12" style="padding-left: 20px; padding-right: 50px;">
                    <table style="width: 99%;">
                        <thead>
                            <tr>
                                <th style="width:12%;"></th>
                                <th style="width:7%;">Jan</th>
                                <th style="width:7%;">Feb</th>
                                <th style="width:7%;">Mar</th>
                                <th style="width:7%;">Apr</th>
                                <th style="width:7%;">Mei</th>
                                <th style="width:7%;">Jun</th>
                                <th style="width:7%;">Jul</th>
                                <th style="width:7%;">Agt</th>
                                <th style="width:7%;">Sep</th>
                                <th style="width:7%;">Okt</th>
                                <th style="width:7%;">Nov</th>
                                <th style="width:7%;">Des</th>
                            </tr>
                        </thead>
                        <tbody id="detail-kpku">
                            
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
                    {{-- <div class="group-filter">
                        <label for="regional" class="label-filter">Regional</label>
                        <div class="dropdown-regional dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                NASIONAL
                                <span style="display: none;" id="value-regional"></span>
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                            </button>
                            <ul class="dropdown-menu regional" style="overflow: hidden; width:99%;" role="menu" aria-labelledby="menu2">
                                
                            </ul>
                        </div>
                    </div> --}}
                    <div class="group-filter">
                        <label for="tahun" class="label-filter">Tahun</label>
                        <div class="dropdown-periode dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                {{ substr(Session::get('periode'), 0, 4) }}
                                <span id="value-periode" style="display: none;"></span>
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                            </button>
                            <ul class="dropdown-menu periode" role="menu" aria-labelledby="menu1">
                                
                            </ul>
                        </div>
                    </div>
                    <div class="group-filter">
                        <label for="jenis" class="label-filter">Jenis</label>
                        <div class="dropdown-jenis dropdown dropdown-filter">
                            <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                                EBITDA MARGIN
                                <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                            </button>
                            <ul class="dropdown-menu jenis" style="width:99%;" role="menu" aria-labelledby="menu2">
                                {{-- <li>
                                    <span style="display: none;">EBM</span>
                                    <span>Ebitda Margin</span>
                                </li>
                                <li>
                                    <span style="display: none;">EB</span>
                                    <span>Ebit</span>
                                </li>
                                <li>
                                    <span style="display: none;">NPM</span>
                                    <span>Net Profit Margin</span>
                                </li>
                                <li>
                                    <span style="display: none;">OPR</span>
                                    <span>Operation Ratio</span>
                                </li>
                                <li>
                                    <span style="display: none;">ROA</span>
                                    <span>ROA</span>
                                </li>
                                <li>
                                    <span style="display: none;">ROI</span>
                                    <span>ROI</span>
                                </li>
                                <li>
                                    <span style="display: none;">ROE</span>
                                    <span>ROE</span>
                                </li>
                                <li>
                                    <span style="display: none;">CRR</span>
                                    <span>Current Ratio</span>
                                </li>
                                <li>
                                    <span style="display: none;">QRR</span>
                                    <span>Quick Ratio</span>
                                </li>
                                <li>
                                    <span style="display: none;">CSR</span>
                                    <span>Cash Ratio</span>
                                </li>
                                <li>
                                    <span style="display: none;">DER</span>
                                    <span>Debt to Equity Ratio</span>
                                </li>
                                <li>
                                    <span style="display: none;">DAR</span>
                                    <span>Debt to Asset Ratio</span>
                                </li>
                                <li>
                                    <span style="display: none;">LTE</span>
                                    <span>Long Term Debt to Equity</span>
                                </li> --}}
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
    // var regional = "NASIONAL";
    var dashboard = "";
    var colors = ['#BFBFBF', '#9EEADC', '#FCA311'];
    var keterangan = "Tahun {{ substr(Session::get('periode'), 0, 4) }}";
    var tahun = "{{ substr(Session::get('periode'), 0, 4) }}";
    var jenis = "EBM";
    var pembagi = 1000000;
    var judul = 'EBITDA MARGIN = EBITDA/Revenue';
    var column = [];
    var chart = [];
    var data1 = [];
    var data2 = [];
    var data3 = [];

    getDataKPKU(jenis, tahun);
    $('#judul-chart').text(judul);

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-tahun') }}/",
        dataType: 'JSON',
        success: function(result) {
            var date = new Date();
            $.each(result.daftar, function(key, value){
                $('.periode').append("<li>"+value.tahun+"</li>")
            })
            tahun = date.getFullYear();
            // getDataBeban(tahun);
        }
    });

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-jenis') }}",
        dataType: 'JSON',
        success: function(result) {
            $.each(result.daftar, function(key, value){
                $('.jenis').append("<li>"+
                    "<span style='display: none;'>"+value.kode_rasio+"</span>"+
                    "<span>"+value.nama+"</span>"+
                    "</li>"
                )
            })
        }
    });

    // $.ajax({
    //     type:'GET',
    //     url: "{{ url('yakes-dash/data-regional') }}",
    //     dataType: 'JSON',
    //     success: function(result) {
    //         $('.regional').append("<li>NASIONAL</li>")
    //         $.each(result.daftar.data, function(key, value){
    //             $('.regional').append("<li>"+value.kode_pp+"</li>")
    //         })
    //     }
    // });

    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    $('.periode').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-periode').find('.select-dash').html(htmlText);
        tahun = text;
        // $('#detail-invest').empty();
        // getDataPendapatan(tahun);
    });

    $('.jenis').on( 'click', 'li', function() {
        var value = $(this).find('span').first().text();
        var text = $(this).find('span').last().text();
        jenis = value;
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:2%;'></span>";
        $(this).closest('.dropdown-dash').find('.select-dash').html(htmlText);
    });

    // $('.regional').on( 'click', 'li', function() {
    //     var text = $(this).html();
    //     var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
    //     $(this).closest('.dropdown-regional').find('.select-dash').html(htmlText);
    //     regional = text;
    // });

    $('#keterangan-filter').html(keterangan);

    $('#form-filter').on('click', '#btn-tampil', function(){
        $('#detail-kpku').empty();
        $('#judul-chart').text(judul);
        keterangan = "Tahun "+tahun;
        getDataKPKU(jenis, tahun);
        $('#keterangan-filter').html(keterangan);
        $('#modalFilter').modal('hide');
    })

    $('#form-filter').on('click', '#btn-reset', function(){
        var text1 = "EBITDA MARGIN";
        var text2 = "{{ substr(Session::get('periode'), 0, 4) }}";
        // var text3 = "NASIONAL";
        var htmlTextPeriode = text2+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-periode').find('.select-dash').html(htmlTextPeriode);
        var htmlTextJenis = text1+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-jenis').find('.select-dash').html(htmlTextJenis);
        // var htmlTextRegional = text3+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        // $('.dropdown-regional').find('.select-dash').html(htmlTextRegional);
        jenis = "EBM";
        judul = "EBITDA MARGIN = EBITDA/Revenue";
        tahun = "{{ substr(Session::get('periode'), 0, 4) }}";
        // regional = "NASIONAL";
    })

    $('.jenis').on( 'click', 'li', function() {
        var value = $(this).find('span').first().text();
        var text = $(this).find('span').last().text();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:2%;'></span>";
        $(this).closest('.dropdown-jenis').find('.select-dash').html(htmlText);
        jenis = value;
        var val = value;
        if(val == 'EBM') {
            judul = 'EBITDA MARGIN = EBITDA/Revenue'
        } else if(val == 'EB') {
            judul = 'EBIT (Profit) Margin Tanpa SPI = EBIT/Revenue'
        } else if(val == 'NPM') {
            judul = 'Net Profit Margin Tanpa SPI = Net Income/Revenue'
        } else if(val == 'OPR') {
            judul = 'Operating Ratio = Beban Opr/Pendapatan Opr'
        } else if(val == 'ROA') {
            judul = 'ROA (Tanpa SPI) = Net Income/Total Asset'
        } else if(val == 'ROI') {
            judul = 'ROI (Tanpa SPI) = Net Income/Investasi'
        } else if(val == 'ROE') {
            judul = 'ROE (Tanpa SPI) = Net Income/Equity'
        } else if(val == 'CRR') {
            judul = 'Current Ratio (1.5-2.0) = Current Asset/Current Liabilities'
        } else if(val == 'QRR') {
            judul = 'Quick Ratio > 1 = (Current Asset - Inv. Jangka Pendek)/Current Liabilities'
        } else if(val == 'CSR') {
            judul = 'Cash Ratio (0.5-1.0) = Kas & Setara Kas/Current Liabilities'
        } else if(val == 'DER') {
            judul = 'Debt to Equity Ratio = Total Debt/Total Equity'
        } else if(val == 'DAR') {
            judul = 'Debt to Asset Ratio = Total Debt/Total Asset'
        } else if(val == 'LTE') {
            judul = 'Long Term Debt to Equity = Total Long Term Debt/Total Equity'
        }
    });

    $('#dash-btn').click(function(){
        $('#modal-preview').modal('show');
    });

    $('#dash-list').on( 'click', 'tr', function() {
        var form = $(this).find('td').first().text();
        dashboard = "{{ url('yakes-auth/form')}}/"+form;
        $('#modal-preview').modal('hide');
        loadForm(dashboard);
    });

    var header = document.getElementById('filter-header');
    var buttonTop = document.getElementById('button-top');
    var buttonFilter = document.getElementById('button-filter');
    var sticky = header.offsetTop;
    window.onscroll = function() {
        if(window.pageYOffset > sticky) {
            // header.classList.add('fixed-filter')
            buttonTop.style.display = 'block';
            // buttonFilter.classList.add('btn-filter-scroll')
            // buttonFilter.classList.remove('btn-filter-no-scroll')
        } else {
            // header.classList.remove('fixed-filter')
            buttonTop.style.display = 'none';
            // buttonFilter.classList.remove('btn-filter-scroll')
            // buttonFilter.classList.add('btn-filter-no-scroll')
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function getDataKPKU(jenis, periode) {
        var jan = 0;
        var feb = 0;
        var mar = 0;
        var apr = 0;
        var mei = 0;
        var jun = 0;
        var jul = 0;
        var agt = 0;
        var sep = 0;
        var okt = 0;
        var nov = 0;
        var des = 0;
        column = [];
        chart = [];
        data1 = [];
        data2 = [];
        data3 = [];
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-kpku') }}/"+periode+"/"+jenis,
            dataType: 'JSON',
            success: function(result) {
                if(result.daftar.status == true) {
                    $('#kpku').show();
                    $('#detail-kpku').empty();
                    var data = result.daftar;
                    
                    for(var i=0;i<data.data.length;i++) {
                        if(i<2) {
                            if(data.data[i][0] > 0 ) {
                                jan = sepNum(parseFloat((data.data[i][0]/pembagi).toFixed(2)))
                            } else {
                                jan = "-"+sepNum(parseFloat((data.data[i][0]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][1] > 0 ) {
                                feb = sepNum(parseFloat((data.data[i][1]/pembagi).toFixed(2)))
                            } else {
                                feb = "-"+sepNum(parseFloat((data.data[i][1]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][2] > 0 ) {
                                mar = sepNum(parseFloat((data.data[i][2]/pembagi).toFixed(2)))
                            } else {
                                mar = "-"+sepNum(parseFloat((data.data[i][2]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][3] > 0 ) {
                                apr = sepNum(parseFloat((data.data[i][3]/pembagi).toFixed(2)))
                            } else {
                                apr = "-"+sepNum(parseFloat((data.data[i][3]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][4] > 0 ) {
                                mei = sepNum(parseFloat((data.data[i][4]/pembagi).toFixed(2)))
                            } else {
                                mei = "-"+sepNum(parseFloat((data.data[i][4]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][5] > 0 ) {
                                jun = sepNum(parseFloat((data.data[i][5]/pembagi).toFixed(2)))
                            } else {
                                jun = "-"+sepNum(parseFloat((data.data[i][5]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][6] > 0 ) {
                                jul = sepNum(parseFloat((data.data[i][6]/pembagi).toFixed(2)))
                            } else {
                                jul = "-"+sepNum(parseFloat((data.data[i][6]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][7] > 0 ) {
                                agt = sepNum(parseFloat((data.data[i][7]/pembagi).toFixed(2)))
                            } else {
                                agt = "-"+sepNum(parseFloat((data.data[i][7]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][8] > 0 ) {
                                sep = sepNum(parseFloat((data.data[i][8]/pembagi).toFixed(2)))
                            } else {
                                sep = "-"+sepNum(parseFloat((data.data[i][8]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][9] > 0 ) {
                                okt = sepNum(parseFloat((data.data[i][9]/pembagi).toFixed(2)))
                            } else {
                                okt = "-"+sepNum(parseFloat((data.data[i][9]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][10] > 0 ) {
                                nov = sepNum(parseFloat((data.data[i][10]/pembagi).toFixed(2)))
                            } else {
                                nov = "-"+sepNum(parseFloat((data.data[i][10]/pembagi).toFixed(2)))
                            }
                            if(data.data[i][11] > 0 ) {
                                des = sepNum(parseFloat((data.data[i][11]/pembagi).toFixed(2)))
                            } else {
                                des = "-"+sepNum(parseFloat((data.data[i][11]/pembagi).toFixed(2)))
                            }
                            column.push({name:data.column[i], 
                                jan:jan, 
                                feb:feb, 
                                mar:mar, 
                                apr:apr, 
                                mei:mei, 
                                jun:jun, 
                                jul:jul, 
                                agt:agt, 
                                sep:sep, 
                                okt:okt, 
                                nov:nov, 
                                des:des
                            })
                        } else {
                            column.push({name:data.column[i], 
                                jan:parseFloat(data.data[i][0].toFixed(2)), 
                                feb:parseFloat(data.data[i][1].toFixed(2)), 
                                mar:parseFloat(data.data[i][2].toFixed(2)), 
                                apr:parseFloat(data.data[i][3].toFixed(2)), 
                                mei:parseFloat(data.data[i][4].toFixed(2)), 
                                jun:parseFloat(data.data[i][5].toFixed(2)), 
                                jul:parseFloat(data.data[i][6].toFixed(2)), 
                                agt:parseFloat(data.data[i][7].toFixed(2)), 
                                sep:parseFloat(data.data[i][8].toFixed(2)), 
                                okt:parseFloat(data.data[i][9].toFixed(2)), 
                                nov:parseFloat(data.data[i][10].toFixed(2)), 
                                des:parseFloat(data.data[i][11].toFixed(2))
                            })
                        }
                        
                    }

                    for(var i=0;i<data.data[0].length;i++) {
                        data1.push(parseFloat((data.data[0][i]/pembagi).toFixed(2)))
                    }

                    for(var i=0;i<data.data[1].length;i++) {
                        data2.push(parseFloat((data.data[1][i]/pembagi).toFixed(2)))
                    }

                    for(var i=0;i<data.data[2].length;i++) {
                        data3.push(parseFloat(data.data[2][i].toFixed(2)))
                    }

                    chart.push({type:'column', name:column[0], data:data1, color:'#BFBFBF'})
                    chart.push({type:'column', name:column[1], data:data2, color:'#9EEADC'})
                    chart.push({type:'line', name:column[1], data:data3, color:'#FCA311', yAxis:1})

                    Highcharts.chart('kpku', {
                        chart:{
                            // width:1050
                            marginLeft: 140,
                            marginRight: 60
                        },
                        legend:{ enabled:false },
                        credits: {
                            enabled: false
                        },
                        exporting:{
                            enabled: false
                        },
                        title: {
                            text: ''
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                            labels: {
                                enabled: false
                                }
                        },
                        yAxis: [
                            {
                                linewidth: 1,
                                // min: -100,
                                title:{
                                    text: 'Rp. Dalam Juta'
                                }
                            },
                            {
                                linewidth: 1,
                                // min: -1,
                                // tickInterval: 1,
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

                    var html = "";
                    for(var i=0;i<column.length;i++) {
                        html += "<tr>";

                        html += "<td style='position: relative;'>";
                        html += "<div style='height: 15px; width:25px; background-color:"+colors[i]+";display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                        html += "&nbsp"+column[i].name
                        html += "</td>";
                        html += "<td style='text-align: right;'>";
                        html += column[i].jan; 
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].feb;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].mar;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].apr;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].mei;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].jun;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].jul;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].agt;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].sep;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].okt;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].nov;                    
                        html += "</td>";

                        html += "</td>";
                        html += "<td style='text-align: right;'>";                
                        html += column[i].des;                    
                        html += "</td>";

                        html += "</tr>";
                    }
                    $('#detail-kpku').append(html);
                } else {
                    $('#kpku').hide();
                    alert('Data tidak ditemukan');
                }
            }
        });
    }
</script>