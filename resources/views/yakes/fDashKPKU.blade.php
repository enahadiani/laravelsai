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
        margin: 10px;
    }
    .fixed-filter {
        background-color: #f8f8f8;
        position: fixed;
        top: 9%;
        margin: 0;
        padding: 10px 0;
        padding-bottom: 10px;
        width: 100%;
        padding-bottom: 18px;
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
</style>

<button id="button-top" class="button-top" onclick="topFunction()">
        <span class="simple-icon-arrow-up"></span>
</button>

<div id="filter-header">
    <div class="row">
        <div class="col-6">
            <h6>Laporan KPKU Kategori 7</h6>
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
    {{-- <div class="row">
        <div class="col-3">
            <div class="dropdown-jenis dropdown">
                    <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                        Jenis : Ebitda Margin
                        <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                    </button>
                    <ul class="dropdown-menu jenis" style="width:99%;" role="menu" aria-labelledby="menu2">
                        <li>
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
                        </li>
                    </ul>
                </div> --}}
            {{-- <select id="jenis" class="form-control select-dash">
                <option value="EBM" selected>Jenis : Ebitda Margin</option>
                <option value="EB">Jenis : Ebit</option>
                <option value="NPM">Jenis : Net Profit Margin</option>
                <option value="OPR">Jenis : Operating Ratio</option>
                <option value="ROA">Jenis : ROA</option>
                <option value="ROI">Jenis : ROI</option>
                <option value="ROE">Jenis : ROE</option>
                <option value="CRR">Jenis : Current Ratio</option>
                <option value="QRR">Jenis : Quick Ratio</option>
                <option value="CSR">Jenis : Cash Ratio</option>
                <option value="DER">Jenis : Debt to Equity Ratio</option>
                <option value="DAR">Jenis : Debt to Asset Ratio</option>
                <option value="LTE">Jenis : Long Term Debt to Equity</option>
            </select> --}}
        {{-- </div> --}}
        {{-- <div class="col-2">
             <div class="dropdown-periode dropdown">
                <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 180px;text-align:left;" type="button" data-toggle="dropdown">
                    Tahun : {{ substr(Session::get('periode'), 0, 4) }}
                    <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                </button>
                <ul class="dropdown-menu periode" role="menu" aria-labelledby="menu1">
                        
                </ul>
            </div> --}}
            {{-- <select id="periode" class="form-control select-dash">

            </select> --}}
        {{-- </div>
    </div> --}}
</div>
<div class="row" style="margin-top: 30px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;" id="judul-chart"></h6>
            <div class="row">
                {{-- <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div> --}}
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
                            Tahun : {{ substr(Session::get('periode'), 0, 4) }}
                            <span id="value-periode" style="display: none;"></span>
                            <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                        </button>
                        <ul class="dropdown-menu periode" role="menu" aria-labelledby="menu1">
                            
                        </ul>
                    </div>
                    <div class="dropdown-jenis dropdown dropdown-filter">
                        <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                            Jenis : Ebitda Margin
                            <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:2%;"></span>
                        </button>
                        <ul class="dropdown-menu jenis" style="width:99%;" role="menu" aria-labelledby="menu2">
                            <li>
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
                            </li>
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
    var tahun = "";
    var jenis = "Ebitda Margin";
    var pembagi = 1000000;
    var judul = 'EBITDA MARGIN = EBITDA/Revenue';
    var column = [];
    var chart = [];
    var data1 = [];
    var data2 = [];
    var data3 = [];

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

    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    $('.periode').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = "Tahun : "+text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-periode').find('.select-dash').html(htmlText);
        tahun = text;
        // $('#detail-invest').empty();
        // getDataPendapatan(tahun);
    });

    $('#form-filter').on('click', '#btn-tampil', function(){
        $('#detail-kpku').empty();
        $('#judul-chart').text(judul);
        getDataKPKU();
        $('#modalFilter').modal('hide');
    })

    $('#form-filter').on('click', '#btn-reset', function(){
        var text1 = "Ebitda Margin";
        var text2 = "{{ substr(Session::get('periode'), 0, 4) }}";
        var htmlTextPeriode = "Tahun : "+text2+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-periode').find('.select-dash').html(htmlTextPeriode);
        var htmlTextJenis = "Jenis : "+text1+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-jenis').find('.select-dash').html(htmlTextJenis);
        jenis = "EBM";
        judul = "EBITDA MARGIN = EBITDA/Revenue";
        periode = "{{ substr(Session::get('periode'), 0, 4) }}";
    })

    $('.jenis').on( 'click', 'li', function() {
        var value = $(this).find('span').first().text();
        var text = $(this).find('span').last().text();
        var htmlText = "Jenis : "+text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:2%;'></span>";
        $(this).closest('.dropdown-jenis').find('.select-dash').html(htmlText);
        jenis = value;
        column = [];
        chart = [];
        data1 = [];
        data2 = [];
        data3 = [];
        var val = value;
        jenis = val;
        if(val == 'EBM') {
            judul = 'EBITDA MARGIN = EBITDA/Revenue'
            column.push(
                {color:'#a5a5a5', name:'EBITDA', jan:'(3.206)', feb:'42.333', mar:'115.056', apr:'81.857', mei:'44.610', jun:'1.890', jul:'(16.843)', agt:'122.897', sep:'78.292', okt:'0', nov:'0', des:'(66.709)'},
                {color:'#4674c5', name:'Revenue', jan:'32.928', feb:'123.497', mar:'252.758', apr:'261.218', mei:'269.177', jun:'275.459', jul:'298.261', agt:'478.644', sep:'486.304', okt:'0', nov:'0', des:'585.136'},
                {color:'#008000', name:'EBITDA Margin', jan:'(9.74%)', feb:'34.28%', mar:'45.52%', apr:'31.23%', mei:'16.57%', jun:'0.69%', jul:'(5.65%)', agt:'25.68%', sep:'16.10%', okt:'0.00%', nov:'0.00%', des:'(11.40%)'},
            )
            data1.push(-3206,42333,115056,81857,44610,1890,-16483,122897,78292,0,0,-66709);
            data2.push(32928,123497,252758,261218,269177,275459,298261,478644,486304,0,0,585136)
            data3.push(-9.74,34.28,45.52,31.23,16.57,0.69,-5.65,25.68,16.10,0.00,0.00,-11.40);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'EB') {
            judul = 'EBIT (Profit) Margin Tanpa SPI = EBIT/Revenue'
            column.push(
                {color:'#a5a5a5', name:'EBIT', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(75.340)'},
                {color:'#4674c5', name:'Revenue', jan:'32.928', feb:'123.497', mar:'252.758', apr:'261.218', mei:'269.177', jun:'275.459', jul:'298.261', agt:'478.644', sep:'486.304', okt:'0', nov:'0', des:'585.136'},
                {color:'#008000', name:'EBIT Margin', jan:'(-11.83%)', feb:'33.16%', mar:'44.69%', apr:'30.14%', mei:'15.25%', jun:'(0.88%)', jul:'(7.33%)', agt:'24.47%', sep:'14.76%', okt:'0.00%', nov:'0.00%', des:'(12.88%)'},
            )
            data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-75340);
            data2.push(32928,123497,252758,261218,269177,275459,298261,478644,486304,0,0,585136)
            data3.push(-11.83,33.16,44.69,30.14,15.25,-0.88,-7.33,24.47,14.76,0.00,0.00,-12.88);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'NPM') {
            judul = 'Net Profit Margin Tanpa SPI = Net Income/Revenue'
            column.push(
                {color:'#a5a5a5', name:'Net Inc', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(75.340)'},
                {color:'#4674c5', name:'Rev', jan:'32.928', feb:'123.497', mar:'252.758', apr:'261.218', mei:'269.177', jun:'275.459', jul:'298.261', agt:'478.644', sep:'486.304', okt:'0', nov:'0', des:'585.136'},
                {color:'#008000', name:'NPM', jan:'(-11.83%)', feb:'33.16%', mar:'44.69%', apr:'30.14%', mei:'15.25%', jun:'(0.88%)', jul:'(7.33%)', agt:'24.47%', sep:'14.76%', okt:'0.00%', nov:'0.00%', des:'(12.88%)'},
            )
            data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
            data2.push(32928,123497,252758,261218,269177,275459,298261,478644,486304,0,0,585136)
            data3.push(-11.83,33.16,44.69,30.14,15.25,-0.88,-7.33,24.47,14.76,0.00,0.00,-15.54);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'OPR') {
            judul = 'Operating Ratio = Beban Opr/Pendapatan Opr'
            column.push(
                {color:'#a5a5a5', name:'Beban Opr', jan:'10.739', feb:'22.285', mar:'43.290', apr:'56.700', mei:'74.635', jun:'93.013', jul:'102.917', agt:'113.857', sep:'134.524', okt:'0', nov:'0', des:'212.316'},
                {color:'#4674c5', name:'PDPT Opr', jan:'32.928', feb:'123.466', mar:'252.704', apr:'261.152', mei:'269.108', jun:'275.368', jul:'298.115', agt:'478.474', sep:'486.077', okt:'0', nov:'0', des:'584.908'},
                {color:'#008000', name:'OPR Ratio', jan:'32.61%', feb:'18.49%', mar:'17.13%', apr:'21.71%', mei:'21.73%', jun:'33.78%', jul:'34.52%', agt:'23.80%', sep:'27.68%', okt:'0.00%', nov:'0.00%', des:'36.30%'},
            )
            data1.push(10739,22285,43290,56700,74635,93013,102917,113857,134524,0,0,212316);
            data2.push(32928,123466,252704,261152,269108,275368,298115,478474,486077,0,0,584908)
            data3.push(32.61,18.49,17.13,21.71,27.73,33.78,34.52,23.80,27.68,0.00,0.00,36.30);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'ROA') {
            judul = 'ROA (Tanpa SPI) = Net Income/Total Asset'
            column.push(
                {color:'#a5a5a5', name:'Net Income', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(90.914)'},
                {color:'#4674c5', name:'Total Asset', jan:'12.867', feb:'12.569', mar:'11.343', apr:'11.457', mei:'11.604', jun:'11.876', jul:'12.210', agt:'12.347', sep:'12.027', okt:'0', nov:'0', des:'12.514'},
                {color:'#008000', name:'ROA', jan:'(0.03%)', feb:'0.33%', mar:'1.00%', apr:'0.69%', mei:'0.35%', jun:'(0.02%)', jul:'(0.18%)', agt:'0.95%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'(0.73%)'},
            )
            data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
            data2.push(12867,12569,11343,11457,11604,11876,12210,12347,12027,0,0,12514)
            data3.push(-0.03,0.33,1.00,0.69,0.35,-0.02,-0.18,0.95,0.60,0.00,0.00,-0.73);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'ROI') {
            judul = 'ROI (Tanpa SPI) = Net Income/Investasi'
            column.push(
                {color:'#a5a5a5', name:'Net Income', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(90.914)'},
                {color:'#4674c5', name:'Investasi', jan:'12.775', feb:'12.357', mar:'10.652', apr:'11.143', mei:'11.200', jun:'11.328', jul:'12.004', agt:'12.179', sep:'11.883', okt:'0', nov:'0', des:'12.344'},
                {color:'#008000', name:'ROI', jan:'(0.03%)', feb:'0.33%', mar:'1.06%', apr:'0.71%', mei:'0.37%', jun:'(0.02%)', jul:'(0.18%)', agt:'0.96%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'(0.74%)'},
            )
            data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
            data2.push(12775,12357,10652,11143,11200,11328,12004,12179,11883,0,0,12344)
            data3.push(-0.03,0.33,1.06,0.71,0.37,-0.02,-0.18,0.96,0.60,0.00,0.00,-0.74);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'ROE') {
            judul = 'ROE (Tanpa SPI) = Net Income/Equity'
            column.push(
                {color:'#a5a5a5', name:'Net Income', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(90.914)'},
                {color:'#4674c5', name:'Equity', jan:'12.757', feb:'12.4237', mar:'11.216', apr:'11.340', mei:'11.494', jun:'11.761', jul:'12.084', agt:'12.241', sep:'11.917', okt:'0', nov:'0', des:'12.394'},
                {color:'#008000', name:'ROE', jan:'(0.03%)', feb:'0.33%', mar:'1.01%', apr:'0.69%', mei:'0.36%', jun:'(0.02%)', jul:'(0.18%)', agt:'0.96%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'(0.73%)'},
            )
            data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
            data2.push(12757,12423,11216,11340,11494,11761,12084,12241,11917,0,0,12398)
            data3.push(-0.03,0.33,1.01,0.69,0.36,-0.02,-0.18,0.96,0.60,0.00,0.00,-0.73);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'CRR') {
            judul = 'Current Ratio (1.5-2.0) = Current Asset/Current Liabilities'
            column.push(
                {color:'#a5a5a5', name:'Asset', jan:'12.476', feb:'12.178', mar:'10.951', apr:'11.065', mei:'11.212', jun:'11.485', jul:'11.819', agt:'11.956', sep:'11.636', okt:'0', nov:'0', des:'12.117'},
                {color:'#4674c5', name:'Lliabilities', jan:'97.138', feb:'132.790', mar:'113.521', apr:'103.850', mei:'96.299', jun:'101.000', jul:'112.663', agt:'91.586', sep:'94.501', okt:'0', nov:'0', des:'106.592'},
                {color:'#008000', name:'Current Ratio (1.5-2.0)', jan:'12834.62%', feb:'9170.87%', mar:'9647.54%', apr:'10655.44%', mei:'11643.77%', jun:'11371.38%', jul:'10491.30%', agt:'13054.89%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'11368.27%'},
            )
            data1.push(12476,12178,10951,11065,11212,11485,11819,11956,11636,0,0,12117);
            data2.push(97138,132790,113521,103850,96299,101000,112663,91586,94501,0,0,106592)
            data3.push(12843.62,9170.87,9647.54,10655.44,11643.77,11371.38,10491.30,13054.89,12133.45,0.00,0.00,11368.27);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'QRR') {
            judul = 'Quick Ratio > 1 = (Current Asset - Inv. Jangka Pendek)/Current Liabilities'
            column.push(
                {color:'#a5a5a5', name:'Asset-Inv Jk. Pendek', jan:'67.924', feb:'188.210', mar:'667.528', apr:'289.743', mei:'380.162', jun:'524.408', jul:'182.979', agt:'145.046', sep:'120.130', okt:'0', nov:'0', des:'140.427'},
                {color:'#4674c5', name:'Liabilities', jan:'97.138', feb:'132.790', mar:'113.521', apr:'103.850', mei:'96.299', jun:'101.000', jul:'112.663', agt:'91.586', sep:'94.501', okt:'0', nov:'0', des:'106.592'},
                {color:'#008000', name:'Quick Ratio > 1', jan:'69.93%', feb:'141.73%', mar:'588.02%', apr:'279.00%', mei:'394.77%', jun:'519.21%', jul:'162.41%', agt:'158.37%', sep:'127.12%', okt:'0.00%', nov:'0.00%', des:'131.74%'},
            )
            data1.push(67924,188210,667528,289743,380162,524408,182979,145046,120130,0,0,140427);
            data2.push(97138,132790,113521,103850,96299,101000,112663,91586,94501,0,0,106592)
            data3.push(69.93,141.73,588.02,279.00,394.77,519.21,162.41,158.37,127.12,0.00,0.00,131.74);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'CSR') {
            judul = 'Cash Ratio (0.5-1.0) = Kas & Setara Kas/Current Liabilities'
            column.push(
                {color:'#a5a5a5', name:'Kas & Setara Kas', jan:'21.398', feb:'37.136', mar:'598.706', apr:'231.998', mei:'312.176', jun:'449.241', jul:'91.615', agt:'34.478', sep:'47.745', okt:'0', nov:'0', des:'96.155'},
                {color:'#4674c5', name:'Liabilities', jan:'97.138', feb:'132.790', mar:'113.521', apr:'103.850', mei:'96.299', jun:'101.000', jul:'112.663', agt:'91.586', sep:'94.501', okt:'0', nov:'0', des:'106.592'},
                {color:'#008000', name:'Cash Ratio (0.5-1.0)', jan:'22.03%', feb:'27.97%', mar:'527.40%', apr:'223.40%', mei:'324.17%', jun:'444.79%', jul:'81.32%', agt:'37.65%', sep:'50.52%', okt:'0.00%', nov:'0.00%', des:'90.21%'},
            )
            data1.push(21398,37136,598706,231998,312176,449241,91615,34478,47745,0,0,96155);
            data2.push(97138,132790,113521,103850,96299,101000,112663,91586,94501,0,0,106592)
            data3.push(22.03,27.97,527.40,223.40,324.17,444.79,81.32,37.65,50.52,0.00,0.00,90.21);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'DER') {
            judul = 'Debt to Equity Ratio = Total Debt/Total Equity'
            column.push(
                {color:'#a5a5a5', name:'Total Debt', jan:'109.727', feb:'145.658', mar:'126.670', apr:'117.270', mei:'109.986', jun:'114.952', jul:'126.871', agt:'106.051', sep:'109.215', okt:'0', nov:'0', des:'119.974'},
                {color:'#4674c5', name:'Total Equity', jan:'12.757', feb:'12.423', mar:'11.216', apr:'11.340', mei:'11.494', jun:'11.761', jul:'12.084', agt:'12.241', sep:'11.917', okt:'0', nov:'0', des:'12.394'},
                {color:'#008000', name:'Debt to Equity Ratio', jan:'0.86%', feb:'1.17%', mar:'1.13%', apr:'1.03%', mei:'0.96%', jun:'0.98%', jul:'1.05%', agt:'0.87%', sep:'0.92%', okt:'0.00%', nov:'0.00%', des:'0.97%'},
            )
            data1.push(109727,145658,126670,117270,109986,114952,126871,106051,109215,0,0,119974);
            data2.push(12757,12423,11216,11340,11494,11761,12084,12241,11917,0,0,12394)
            data3.push(0.86,1.17,1.13,1.03,0.96,0.98,1.05,0.87,0.92,0.00,0.00,0.97);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'DAR') {
            judul = 'Debt to Asset Ratio = Total Debt/Total Asset'
            column.push(
                {color:'#a5a5a5', name:'Total Debt', jan:'109.727', feb:'145.658', mar:'126.670', apr:'117.270', mei:'109.986', jun:'114.952', jul:'126.871', agt:'106.051', sep:'109.215', okt:'0', nov:'0', des:'119.974'},
                {color:'#4674c5', name:'Total Asset', jan:'12.867', feb:'12.569', mar:'11.343', apr:'11.457', mei:'11.604', jun:'11.876', jul:'12.210', agt:'12.347', sep:'12.027', okt:'0', nov:'0', des:'12.514'},
                {color:'#008000', name:'Debt to Asset Ratio', jan:'12.58%', feb:'12.86%', mar:'13.14%', apr:'13.42%', mei:'13.68%', jun:'13.95%', jul:'14.20%', agt:'14.46%', sep:'14.71%', okt:'0.00%', nov:'0.00%', des:'13.38%'},
            )
            data1.push(109727,145658,126670,117270,109986,114952,126871,106051,109215,0,0,119974);
            data2.push(12867,12569,11343,11457,11604,11876,12210,12347,12027,0,0,12514)
            data3.push(12.58,12.86,13.14,13.42,13.68,13.95,14.20,14.46,14.71,0.00,0.00,13.38);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
        } else if(val == 'LTE') {
            judul = 'Long Term Debt to Equity = Total Long Term Debt/Total Equity'
            column.push(
                {color:'#a5a5a5', name:'Total Long Term Debt', jan:'12.588', feb:'12.867', mar:'13.149', apr:'13.420', mei:'13.687', jun:'13.951', jul:'14.208', agt:'14.465', sep:'14.715', okt:'19.949', nov:'13.884', des:'12.306'},
                {color:'#4674c5', name:'Total Equity', jan:'12.757', feb:'12.423', mar:'11.216', apr:'11.340', mei:'11.494', jun:'11.761', jul:'12.084', agt:'12.241', sep:'11.917', okt:'12.187', nov:'12.780', des:'12.826'},
                {color:'#008000', name:'Long Term Debt to Equity', jan:'0.10%', feb:'0.10%', mar:'0.12%', apr:'0.12%', mei:'0.12%', jun:'0.12%', jul:'0.12%', agt:'0.12%', sep:'0.12%', okt:'0.12%', nov:'0.12%', des:'0.10%'},
            )
            data1.push(12588,12867,13149,13420,13687,13951,14208,14465,14715,19949,13884,12306);
            data2.push(12757,12423,11216,11340,11494,11761,12084,12241,11917,12187,12780,12826)
            data3.push(0.10,0.10,0.12,0.12,0.12,0.12,0.12,0.12,0.12,0.12,0.12,0.10);

            chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
            chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
            chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
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
    
    $('#judul-chart').text(judul);
    column.push(
        {color:'#a5a5a5', name:'EBITDA', jan:'(3.206)', feb:'42.333', mar:'115.056', apr:'81.857', mei:'44.610', jun:'1.890', jul:'(16.843)', agt:'122.897', sep:'78.292', okt:'0', nov:'0', des:'(66.709)'},
        {color:'#4674c5', name:'Revenue', jan:'32.928', feb:'123.497', mar:'252.758', apr:'261.218', mei:'269.177', jun:'275.459', jul:'298.261', agt:'478.644', sep:'486.304', okt:'0', nov:'0', des:'585.136'},
        {color:'#008000', name:'EBITDA Margin', jan:'(9.74%)', feb:'34.28%', mar:'45.52%', apr:'31.23%', mei:'16.57%', jun:'0.69%', jul:'(5.65%)', agt:'25.68%', sep:'16.10%', okt:'0.00%', nov:'0.00%', des:'(11.40%)'},
    )
    data1.push(-3206,42333,115056,81857,44610,1890,-16483,122897,78292,0,0,-66709);
    data2.push(32928,123497,252758,261218,269177,275459,298261,478644,486304,0,0,585136)
    data3.push(-9.74,34.28,45.52,31.23,16.57,0.69,-5.65,25.68,16.10,0.00,0.00,-11.40);

    chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})

    Highcharts.chart('kpku', {
        chart:{
            // width:1050,
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

    var html = "";
    for(var i=0;i<column.length;i++) {
        html += "<tr>";

        html += "<td style='position: relative;'>";
        html += "<div style='height: 15px; width:25px; background-color:"+column[i].color+";display:inline-block;margin-left:3px;margin-top:1px;'></div>";
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

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    
    // $('#jenis').change(function(){
    //     column = [];
    //     chart = [];
    //     data1 = [];
    //     data2 = [];
    //     data3 = [];
    //     $('#detail-kpku').empty();
    //     var val = $(this).val();
    //     jenis = val;
    //     if(val == 'EBM') {
    //         judul = 'EBITDA MARGIN = EBITDA/Revenue'
    //         column.push(
    //             {color:'#a5a5a5', name:'EBITDA', jan:'(3.206)', feb:'42.333', mar:'115.056', apr:'81.857', mei:'44.610', jun:'1.890', jul:'(16.843)', agt:'122.897', sep:'78.292', okt:'0', nov:'0', des:'(66.709)'},
    //             {color:'#4674c5', name:'Revenue', jan:'32.928', feb:'123.497', mar:'252.758', apr:'261.218', mei:'269.177', jun:'275.459', jul:'298.261', agt:'478.644', sep:'486.304', okt:'0', nov:'0', des:'585.136'},
    //             {color:'#008000', name:'EBITDA Margin', jan:'(9.74%)', feb:'34.28%', mar:'45.52%', apr:'31.23%', mei:'16.57%', jun:'0.69%', jul:'(5.65%)', agt:'25.68%', sep:'16.10%', okt:'0.00%', nov:'0.00%', des:'(11.40%)'},
    //         )
    //         data1.push(-3206,42333,115056,81857,44610,1890,-16483,122897,78292,0,0,-66709);
    //         data2.push(32928,123497,252758,261218,269177,275459,298261,478644,486304,0,0,585136)
    //         data3.push(-9.74,34.28,45.52,31.23,16.57,0.69,-5.65,25.68,16.10,0.00,0.00,-11.40);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'EB') {
    //         judul = 'EBIT (Profit) Margin Tanpa SPI = EBIT/Revenue'
    //         column.push(
    //             {color:'#a5a5a5', name:'EBIT', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(75.340)'},
    //             {color:'#4674c5', name:'Revenue', jan:'32.928', feb:'123.497', mar:'252.758', apr:'261.218', mei:'269.177', jun:'275.459', jul:'298.261', agt:'478.644', sep:'486.304', okt:'0', nov:'0', des:'585.136'},
    //             {color:'#008000', name:'EBIT Margin', jan:'(-11.83%)', feb:'33.16%', mar:'44.69%', apr:'30.14%', mei:'15.25%', jun:'(0.88%)', jul:'(7.33%)', agt:'24.47%', sep:'14.76%', okt:'0.00%', nov:'0.00%', des:'(12.88%)'},
    //         )
    //         data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-75340);
    //         data2.push(32928,123497,252758,261218,269177,275459,298261,478644,486304,0,0,585136)
    //         data3.push(-11.83,33.16,44.69,30.14,15.25,-0.88,-7.33,24.47,14.76,0.00,0.00,-12.88);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'NPM') {
    //         judul = 'Net Profit Margin Tanpa SPI = Net Income/Revenue'
    //         column.push(
    //             {color:'#a5a5a5', name:'Net Inc', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(75.340)'},
    //             {color:'#4674c5', name:'Rev', jan:'32.928', feb:'123.497', mar:'252.758', apr:'261.218', mei:'269.177', jun:'275.459', jul:'298.261', agt:'478.644', sep:'486.304', okt:'0', nov:'0', des:'585.136'},
    //             {color:'#008000', name:'NPM', jan:'(-11.83%)', feb:'33.16%', mar:'44.69%', apr:'30.14%', mei:'15.25%', jun:'(0.88%)', jul:'(7.33%)', agt:'24.47%', sep:'14.76%', okt:'0.00%', nov:'0.00%', des:'(12.88%)'},
    //         )
    //         data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
    //         data2.push(32928,123497,252758,261218,269177,275459,298261,478644,486304,0,0,585136)
    //         data3.push(-11.83,33.16,44.69,30.14,15.25,-0.88,-7.33,24.47,14.76,0.00,0.00,-15.54);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'OPR') {
    //         judul = 'Operating Ratio = Beban Opr/Pendapatan Opr'
    //         column.push(
    //             {color:'#a5a5a5', name:'Beban Opr', jan:'10.739', feb:'22.285', mar:'43.290', apr:'56.700', mei:'74.635', jun:'93.013', jul:'102.917', agt:'113.857', sep:'134.524', okt:'0', nov:'0', des:'212.316'},
    //             {color:'#4674c5', name:'PDPT Opr', jan:'32.928', feb:'123.466', mar:'252.704', apr:'261.152', mei:'269.108', jun:'275.368', jul:'298.115', agt:'478.474', sep:'486.077', okt:'0', nov:'0', des:'584.908'},
    //             {color:'#008000', name:'OPR Ratio', jan:'32.61%', feb:'18.49%', mar:'17.13%', apr:'21.71%', mei:'21.73%', jun:'33.78%', jul:'34.52%', agt:'23.80%', sep:'27.68%', okt:'0.00%', nov:'0.00%', des:'36.30%'},
    //         )
    //         data1.push(10739,22285,43290,56700,74635,93013,102917,113857,134524,0,0,212316);
    //         data2.push(32928,123466,252704,261152,269108,275368,298115,478474,486077,0,0,584908)
    //         data3.push(32.61,18.49,17.13,21.71,27.73,33.78,34.52,23.80,27.68,0.00,0.00,36.30);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'ROA') {
    //         judul = 'ROA (Tanpa SPI) = Net Income/Total Asset'
    //         column.push(
    //             {color:'#a5a5a5', name:'Net Income', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(90.914)'},
    //             {color:'#4674c5', name:'Total Asset', jan:'12.867', feb:'12.569', mar:'11.343', apr:'11.457', mei:'11.604', jun:'11.876', jul:'12.210', agt:'12.347', sep:'12.027', okt:'0', nov:'0', des:'12.514'},
    //             {color:'#008000', name:'ROA', jan:'(0.03%)', feb:'0.33%', mar:'1.00%', apr:'0.69%', mei:'0.35%', jun:'(0.02%)', jul:'(0.18%)', agt:'0.95%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'(0.73%)'},
    //         )
    //         data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
    //         data2.push(12867,12569,11343,11457,11604,11876,12210,12347,12027,0,0,12514)
    //         data3.push(-0.03,0.33,1.00,0.69,0.35,-0.02,-0.18,0.95,0.60,0.00,0.00,-0.73);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'ROI') {
    //         judul = 'ROI (Tanpa SPI) = Net Income/Investasi'
    //         column.push(
    //             {color:'#a5a5a5', name:'Net Income', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(90.914)'},
    //             {color:'#4674c5', name:'Investasi', jan:'12.775', feb:'12.357', mar:'10.652', apr:'11.143', mei:'11.200', jun:'11.328', jul:'12.004', agt:'12.179', sep:'11.883', okt:'0', nov:'0', des:'12.344'},
    //             {color:'#008000', name:'ROI', jan:'(0.03%)', feb:'0.33%', mar:'1.06%', apr:'0.71%', mei:'0.37%', jun:'(0.02%)', jul:'(0.18%)', agt:'0.96%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'(0.74%)'},
    //         )
    //         data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
    //         data2.push(12775,12357,10652,11143,11200,11328,12004,12179,11883,0,0,12344)
    //         data3.push(-0.03,0.33,1.06,0.71,0.37,-0.02,-0.18,0.96,0.60,0.00,0.00,-0.74);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'ROE') {
    //         judul = 'ROE (Tanpa SPI) = Net Income/Equity'
    //         column.push(
    //             {color:'#a5a5a5', name:'Net Income', jan:'(3.895)', feb:'40.957', mar:'112.959', apr:'78.742', mei:'41.039', jun:'(2.412)', jul:'(21.857)', agt:'117.146', sep:'71.795', okt:'0', nov:'0', des:'(90.914)'},
    //             {color:'#4674c5', name:'Equity', jan:'12.757', feb:'12.4237', mar:'11.216', apr:'11.340', mei:'11.494', jun:'11.761', jul:'12.084', agt:'12.241', sep:'11.917', okt:'0', nov:'0', des:'12.394'},
    //             {color:'#008000', name:'ROE', jan:'(0.03%)', feb:'0.33%', mar:'1.01%', apr:'0.69%', mei:'0.36%', jun:'(0.02%)', jul:'(0.18%)', agt:'0.96%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'(0.73%)'},
    //         )
    //         data1.push(-3895,40957,112959,78742,41039,-2412,-21857,117146,71795,0,0,-90914);
    //         data2.push(12757,12423,11216,11340,11494,11761,12084,12241,11917,0,0,12398)
    //         data3.push(-0.03,0.33,1.01,0.69,0.36,-0.02,-0.18,0.96,0.60,0.00,0.00,-0.73);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'CRR') {
    //         judul = 'Current Ratio (1.5-2.0) = Current Asset/Current Liabilities'
    //         column.push(
    //             {color:'#a5a5a5', name:'Asset', jan:'12.476', feb:'12.178', mar:'10.951', apr:'11.065', mei:'11.212', jun:'11.485', jul:'11.819', agt:'11.956', sep:'11.636', okt:'0', nov:'0', des:'12.117'},
    //             {color:'#4674c5', name:'Lliabilities', jan:'97.138', feb:'132.790', mar:'113.521', apr:'103.850', mei:'96.299', jun:'101.000', jul:'112.663', agt:'91.586', sep:'94.501', okt:'0', nov:'0', des:'106.592'},
    //             {color:'#008000', name:'Current Ratio (1.5-2.0)', jan:'12834.62%', feb:'9170.87%', mar:'9647.54%', apr:'10655.44%', mei:'11643.77%', jun:'11371.38%', jul:'10491.30%', agt:'13054.89%', sep:'0.60%', okt:'0.00%', nov:'0.00%', des:'11368.27%'},
    //         )
    //         data1.push(12476,12178,10951,11065,11212,11485,11819,11956,11636,0,0,12117);
    //         data2.push(97138,132790,113521,103850,96299,101000,112663,91586,94501,0,0,106592)
    //         data3.push(12843.62,9170.87,9647.54,10655.44,11643.77,11371.38,10491.30,13054.89,12133.45,0.00,0.00,11368.27);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'QRR') {
    //         judul = 'Quick Ratio > 1 = (Current Asset - Inv. Jangka Pendek)/Current Liabilities'
    //         column.push(
    //             {color:'#a5a5a5', name:'Asset-Inv Jk. Pendek', jan:'67.924', feb:'188.210', mar:'667.528', apr:'289.743', mei:'380.162', jun:'524.408', jul:'182.979', agt:'145.046', sep:'120.130', okt:'0', nov:'0', des:'140.427'},
    //             {color:'#4674c5', name:'Liabilities', jan:'97.138', feb:'132.790', mar:'113.521', apr:'103.850', mei:'96.299', jun:'101.000', jul:'112.663', agt:'91.586', sep:'94.501', okt:'0', nov:'0', des:'106.592'},
    //             {color:'#008000', name:'Quick Ratio > 1', jan:'69.93%', feb:'141.73%', mar:'588.02%', apr:'279.00%', mei:'394.77%', jun:'519.21%', jul:'162.41%', agt:'158.37%', sep:'127.12%', okt:'0.00%', nov:'0.00%', des:'131.74%'},
    //         )
    //         data1.push(67924,188210,667528,289743,380162,524408,182979,145046,120130,0,0,140427);
    //         data2.push(97138,132790,113521,103850,96299,101000,112663,91586,94501,0,0,106592)
    //         data3.push(69.93,141.73,588.02,279.00,394.77,519.21,162.41,158.37,127.12,0.00,0.00,131.74);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'CSR') {
    //         judul = 'Cash Ratio (0.5-1.0) = Kas & Setara Kas/Current Liabilities'
    //         column.push(
    //             {color:'#a5a5a5', name:'Kas & Setara Kas', jan:'21.398', feb:'37.136', mar:'598.706', apr:'231.998', mei:'312.176', jun:'449.241', jul:'91.615', agt:'34.478', sep:'47.745', okt:'0', nov:'0', des:'96.155'},
    //             {color:'#4674c5', name:'Liabilities', jan:'97.138', feb:'132.790', mar:'113.521', apr:'103.850', mei:'96.299', jun:'101.000', jul:'112.663', agt:'91.586', sep:'94.501', okt:'0', nov:'0', des:'106.592'},
    //             {color:'#008000', name:'Cash Ratio (0.5-1.0)', jan:'22.03%', feb:'27.97%', mar:'527.40%', apr:'223.40%', mei:'324.17%', jun:'444.79%', jul:'81.32%', agt:'37.65%', sep:'50.52%', okt:'0.00%', nov:'0.00%', des:'90.21%'},
    //         )
    //         data1.push(21398,37136,598706,231998,312176,449241,91615,34478,47745,0,0,96155);
    //         data2.push(97138,132790,113521,103850,96299,101000,112663,91586,94501,0,0,106592)
    //         data3.push(22.03,27.97,527.40,223.40,324.17,444.79,81.32,37.65,50.52,0.00,0.00,90.21);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'DER') {
    //         judul = 'Debt to Equity Ratio = Total Debt/Total Equity'
    //         column.push(
    //             {color:'#a5a5a5', name:'Total Debt', jan:'109.727', feb:'145.658', mar:'126.670', apr:'117.270', mei:'109.986', jun:'114.952', jul:'126.871', agt:'106.051', sep:'109.215', okt:'0', nov:'0', des:'119.974'},
    //             {color:'#4674c5', name:'Total Equity', jan:'12.757', feb:'12.423', mar:'11.216', apr:'11.340', mei:'11.494', jun:'11.761', jul:'12.084', agt:'12.241', sep:'11.917', okt:'0', nov:'0', des:'12.394'},
    //             {color:'#008000', name:'Debt to Equity Ratio', jan:'0.86%', feb:'1.17%', mar:'1.13%', apr:'1.03%', mei:'0.96%', jun:'0.98%', jul:'1.05%', agt:'0.87%', sep:'0.92%', okt:'0.00%', nov:'0.00%', des:'0.97%'},
    //         )
    //         data1.push(109727,145658,126670,117270,109986,114952,126871,106051,109215,0,0,119974);
    //         data2.push(12757,12423,11216,11340,11494,11761,12084,12241,11917,0,0,12394)
    //         data3.push(0.86,1.17,1.13,1.03,0.96,0.98,1.05,0.87,0.92,0.00,0.00,0.97);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'DAR') {
    //         judul = 'Debt to Asset Ratio = Total Debt/Total Asset'
    //         column.push(
    //             {color:'#a5a5a5', name:'Total Debt', jan:'109.727', feb:'145.658', mar:'126.670', apr:'117.270', mei:'109.986', jun:'114.952', jul:'126.871', agt:'106.051', sep:'109.215', okt:'0', nov:'0', des:'119.974'},
    //             {color:'#4674c5', name:'Total Asset', jan:'12.867', feb:'12.569', mar:'11.343', apr:'11.457', mei:'11.604', jun:'11.876', jul:'12.210', agt:'12.347', sep:'12.027', okt:'0', nov:'0', des:'12.514'},
    //             {color:'#008000', name:'Debt to Asset Ratio', jan:'12.58%', feb:'12.86%', mar:'13.14%', apr:'13.42%', mei:'13.68%', jun:'13.95%', jul:'14.20%', agt:'14.46%', sep:'14.71%', okt:'0.00%', nov:'0.00%', des:'13.38%'},
    //         )
    //         data1.push(109727,145658,126670,117270,109986,114952,126871,106051,109215,0,0,119974);
    //         data2.push(12867,12569,11343,11457,11604,11876,12210,12347,12027,0,0,12514)
    //         data3.push(12.58,12.86,13.14,13.42,13.68,13.95,14.20,14.46,14.71,0.00,0.00,13.38);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     } else if(val == 'LTE') {
    //         judul = 'Long Term Debt to Equity = Total Long Term Debt/Total Equity'
    //         column.push(
    //             {color:'#a5a5a5', name:'Total Long Term Debt', jan:'12.588', feb:'12.867', mar:'13.149', apr:'13.420', mei:'13.687', jun:'13.951', jul:'14.208', agt:'14.465', sep:'14.715', okt:'19.949', nov:'13.884', des:'12.306'},
    //             {color:'#4674c5', name:'Total Equity', jan:'12.757', feb:'12.423', mar:'11.216', apr:'11.340', mei:'11.494', jun:'11.761', jul:'12.084', agt:'12.241', sep:'11.917', okt:'12.187', nov:'12.780', des:'12.826'},
    //             {color:'#008000', name:'Long Term Debt to Equity', jan:'0.10%', feb:'0.10%', mar:'0.12%', apr:'0.12%', mei:'0.12%', jun:'0.12%', jul:'0.12%', agt:'0.12%', sep:'0.12%', okt:'0.12%', nov:'0.12%', des:'0.10%'},
    //         )
    //         data1.push(12588,12867,13149,13420,13687,13951,14208,14465,14715,19949,13884,12306);
    //         data2.push(12757,12423,11216,11340,11494,11761,12084,12241,11917,12187,12780,12826)
    //         data3.push(0.10,0.10,0.12,0.12,0.12,0.12,0.12,0.12,0.12,0.12,0.12,0.10);

    //         chart.push({type:'column', name:column[0], data:data1, color:'#a5a5a5'})
    //         chart.push({type:'column', name:column[1], data:data2, color:'#4674c5'})
    //         chart.push({type:'spline', name:column[2], data:data3, color:'#008000', yAxis:1})
    //     }
    //     $('#judul-chart').text(judul);
    //     getDataKPKU();
    // })

    function getDataKPKU(jenis, periode) {
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

    var html = "";
    for(var i=0;i<column.length;i++) {
            html += "<tr>";

            html += "<td style='position: relative;'>";
            html += "<div style='height: 15px; width:25px; background-color:"+column[i].color+";display:inline-block;margin-left:3px;margin-top:1px;'></div>";
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
    }
</script>