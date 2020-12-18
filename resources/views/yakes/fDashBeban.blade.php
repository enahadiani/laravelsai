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
            <h6>Beban</h6>
            <p id="keterangan-filter"></p>
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
<div class="row fixed-margin">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Beban</h6>
            <div class="row">
                <div class="col-12">
                    <div id="beban"></div>
                </div>
                <div class="col-12 ml-2 mr-4">
                    <table style="width: 99%; margin-right: 10px;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
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
                        <tbody id="detail-beban">
                            
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
    var dashboard = "";
    var keterangan = "Tahun {{ substr(Session::get('periode'), 0, 4) }} regional "+regional;
    var tahun = "{{ substr(Session::get('periode'), 0, 4) }}";
    var pembagi = 1000000;

    var buttonTop = document.getElementById('button-top');
    var header = document.getElementById('filter-header');
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

    $('#keterangan-filter').text(keterangan);
    getDataBeban(tahun, regional);

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-tahun') }}/",
        dataType: 'JSON',
        success: function(result) {
            var date = new Date();
            $.each(result.daftar, function(key, value){
                $('.periode').append("<li>"+value.tahun+"</li>")
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
        tahun = text;
    });
    
    $('.regional').on( 'click', 'li', function() {
        var text = $(this).html();
        var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $(this).closest('.dropdown-regional').find('.select-dash').html(htmlText);
        regional = text;
    });

    $('#button-filter').click(function(){
        $('#modalFilter').modal('show');
    })

    $('#form-filter').on('click', '#btn-reset', function(){
        var text2 = "{{ substr(Session::get('periode'), 0, 4) }}";
        var text3 = "NASIONAL";
        var htmlTextPeriode = text2+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-periode').find('.select-dash').html(htmlTextPeriode);
        var htmlTextRegional = text3+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:3%;'></span>";
        $('.dropdown-regional').find('.select-dash').html(htmlTextRegional);
        tahun = "{{ substr(Session::get('periode'), 0, 4) }}";
        regional = "NASIONAL";
    })

    $('#form-filter').on('click', '#btn-tampil', function(){
        $('#detail-beban').empty();
        keterangan = "Tahun "+tahun+" regional "+regional;
        getDataBeban(tahun, regional);
        $('#keterangan-filter').text(keterangan);
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
    //     $('#detail-beban').empty();
    //     var val = $(this).val();
    //     tahun = val;
    //     getDataBeban(tahun);
    // })

    function getDataBeban(value) {
        if(value != null || value != '') {
            tahun = value
        } else {
            tahun = tahun
        }
        $('#detail-beban').empty();
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-beban') }}/"+tahun+"/"+regional,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var html = "";
                var chart = [];

                for(var i=0;i<data.length;i++) {
                    
                    chart.push({
                        name:data[i].nama, 
                        data:[
                            parseFloat((parseFloat(data[i].jan)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].feb)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].mar)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].apr)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].mei)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].jun)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].jul)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].agu)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].sep)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].okt)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].nov)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].des)/pembagi).toFixed(3)),
                        ],
                        stack: 'beban',
                        color: data[i].warna 
                    })
                    html += "<tr>";
                    html += "<td style='position: relative;'>";
                    html += "<div style='height: 15px; width:25px; background-color:"+data[i].warna+";display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                    html += "&nbsp"+data[i].nama
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].jan < 0) {
                            html += "("+sepNum(data[i].jan/pembagi)+")";
                        } else {
                            html += sepNum(data[i].jan/pembagi); 
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].feb < 0) {
                            html += "("+sepNum(data[i].feb/pembagi)+")";
                        } else {
                            html += sepNum(data[i].feb/pembagi);    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].mar < 0) {
                            html += "("+sepNum(data[i].mar/pembagi)+")";
                        } else {
                            html += sepNum(data[i].mar/pembagi);    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].apr < 0) {
                            html += "("+sepNum(data[i].apr/pembagi)+")";
                        } else {
                            html += sepNum(data[i].apr/pembagi);    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].mei < 0) {
                            html += "("+sepNum(data[i].mei/pembagi)+")";
                        } else {
                            html += sepNum(data[i].mei/pembagi); 
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].jun < 0) {
                            html += "("+sepNum(data[i].jun/pembagi)+")";
                        } else {
                            html += sepNum(data[i].jun/pembagi);   
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].jul < 0) {
                            html += "("+sepNum(data[i].jul/pembagi)+")";
                        } else {
                            html += sepNum(data[i].jul/pembagi);   
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].agu < 0) {
                            html += "("+sepNum(data[i].agu/pembagi)+")";
                        } else {
                            html += sepNum(data[i].agu/pembagi); 
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].sep < 0) {
                            html += "("+sepNum(data[i].sep/pembagi)+")";
                        } else {
                            html += sepNum(data[i].sep/pembagi)    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].okt < 0) {
                            html += "("+sepNum(data[i].okt/pembagi)+")";
                        } else {
                            html += sepNum(data[i].okt/pembagi);    
                        }
                    html += "</td>"
                    html += "<td style='text-align: right;'>";
                        if(data[i].nov < 0) {
                            html += "("+sepNum(data[i].nov/pembagi)+")";
                        } else {
                            html += sepNum(data[i].nov/pembagi);    
                        }
                    html += "</td>"
                    html += "<td style='text-align: right;'>";
                        if(data[i].des < 0) {
                            html += "("+sepNum(data[i].des/pembagi)+")";
                        } else {
                            html += sepNum(data[i].des/pembagi);
                        }
                    html += "</td>"
                    html += "</tr>";
                }
                $('#detail-beban').append(html);
                
                Highcharts.chart('beban', {
                    chart: {
                        type: 'column',
                        height: 300,
                        marginLeft: 180,
                        marginRight: 30
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
                    xAxis: {
                        labels: {
                            enabled: true
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
                    },
                    yAxis: {
                        visible: true,
                        title:{
                            text: 'Rp. Dalam Juta'
                        }
                    },

                    tooltip: {
                        enabled: false
                        // formatter: function () {
                        //     return '<b>' + this.x + '</b><br/>' +
                        //         this.series.name + ': ' + this.y + '<br/>' +
                        //         'Total: ' + this.point.stackTotal;
                        // }
                    },
                    plotOptions: {
                        column: {
                            stacking: 'normal'
                        }
                    },
                    series: chart
                });
                
            }
        });
    }
</script>