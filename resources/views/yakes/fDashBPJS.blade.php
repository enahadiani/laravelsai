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
        border: 1px solid black !important;
        margin-bottom: 10px;
    }  

    th {
        padding: 5px;
        text-align: center;
    }

    .keterangan {
        writing-mode: vertical-lr;
        margin: 0;
        position: absolute;
        margin-left: 10px;
        top: 30%;
    }
    .fixed-filter {
        background-color: #f8f8f8;
        position: fixed;
        top: 9%;
        margin: 0;
        padding: 10px 0;
        padding-bottom: 10px;
        width: 100%;
        z-index: 1;
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
</style>

<button id="button-top" class="button-top" onclick="topFunction()">
        <span class="simple-icon-arrow-up"></span>
</button>

<div id="filter-header">
    <div class="row">
        <div class="col-12">
            <h6>BPJS</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="dropdown-periode dropdown">
                <button class="btn btn-light select-dash" style="background-color: #ffffff;width: 180px;text-align:left;" type="button" data-toggle="dropdown">
                    Periode : {{Session::get('periode')}}
                    <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:3%;"></span>
                </button>
                <ul class="dropdown-menu periode" role="menu" aria-labelledby="menu1">
                        
                </ul>
            </div>
            {{-- <select id="periode" class="form-control select-dash">

            </select> --}}
        </div>
    </div>
</div>
<div class="row" style="margin-top: 30px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Claim BPJS - Karyawan/Pensiunan/Total</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="claim"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:18%;"></th>
                                <th style="width:10%;">REG 1</th>
                                <th style="width:10%;">REG 2</th>
                                <th style="width:10%;">REG 3</th>
                                <th style="width:10%;">REG 4</th>
                                <th style="width:10%;">REG 5</th>
                                <th style="width:10%;">REG 6</th>
                                <th style="width:10%;">REG 7</th>
                                <th style="width:10%;">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Tagihan Awal
                                </td>
                                <td style="text-align: right;">453</td>
                                <td style="text-align: right;">3.317</td>
                                <td style="text-align: right;">2.172</td>
                                <td style="text-align: right;">1.052</td>
                                <td style="text-align: right;">2.025</td>
                                <td style="text-align: right;">324</td>
                                <td style="text-align: right;">258</td>
                                <td style="text-align: right;">9.601</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Claim BPJS
                                </td>
                                <td style="text-align: right;">139</td>
                                <td style="text-align: right;">1.917</td>
                                <td style="text-align: right;">1.262</td>
                                <td style="text-align: right;">585</td>
                                <td style="text-align: right;">713</td>
                                <td style="text-align: right;">184</td>
                                <td style="text-align: right;">109</td>
                                <td style="text-align: right;">4.909</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Bayar Yakes
                                </td>
                                <td style="text-align: right;">314</td>
                                <td style="text-align: right;">1.401</td>
                                <td style="text-align: right;">902</td>
                                <td style="text-align: right;">474</td>
                                <td style="text-align: right;">1.312</td>
                                <td style="text-align: right;">140</td>
                                <td style="text-align: right;">149</td>
                                <td style="text-align: right;">4.692</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Claim vs Tag. Awal (%)
                                </td>
                                <td style="text-align: right;">30,6</td>
                                <td style="text-align: right;">57,8</td>
                                <td style="text-align: right;">58,1</td>
                                <td style="text-align: right;">55,6</td>
                                <td style="text-align: right;">35,2</td>
                                <td style="text-align: right;">56,8</td>
                                <td style="text-align: right;">42,1</td>
                                <td style="text-align: right;">51,1</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Bayar Yakes vs Tag. Awal (%)
                                </td>
                                <td style="text-align: right;">69,3</td>
                                <td style="text-align: right;">42,2</td>
                                <td style="text-align: right;">41,5</td>
                                <td style="text-align: right;">45,0</td>
                                <td style="text-align: right;">64,8</td>
                                <td style="text-align: right;">43,2</td>
                                <td style="text-align: right;">57,9</td>
                                <td style="text-align: right;">48,9</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Utilisasi BPJS - Karyawan/Pensiunan/Total</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="utility"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
                                <th style="width:10%;">PUSAT</th>
                                <th style="width:10%;">REG 1</th>
                                <th style="width:10%;">REG 2</th>
                                <th style="width:10%;">REG 3</th>
                                <th style="width:10%;">REG 4</th>
                                <th style="width:10%;">REG 5</th>
                                <th style="width:10%;">REG 6</th>
                                <th style="width:10%;">REG 7</th>
                                <th style="width:10%;">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Iuran BPJS
                                </td>
                                <td>-</td>
                                <td style="text-align: right;">4.311</td>
                                <td style="text-align: right;">19.244</td>
                                <td style="text-align: right;">6.596</td>
                                <td style="text-align: right;">2.797</td>
                                <td style="text-align: right;">5.078</td>
                                <td style="text-align: right;">2.027</td>
                                <td style="text-align: right;">2.746</td>
                                <td style="text-align: right;">42.799</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Kapitasi
                                </td>
                                <td>-</td>
                                <td style="text-align: right;">98</td>
                                <td style="text-align: right;">792</td>
                                <td style="text-align: right;">307</td>
                                <td style="text-align: right;">66</td>
                                <td style="text-align: right;">105</td>
                                <td style="text-align: right;">42</td>
                                <td style="text-align: right;">70</td>
                                <td style="text-align: right;">1479</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Claim BPJS
                                </td>
                                <td>-</td>
                                <td style="text-align: right;">1.39</td>
                                <td style="text-align: right;">1.917</td>
                                <td style="text-align: right;">1.262</td>
                                <td style="text-align: right;">585</td>
                                <td style="text-align: right;">713</td>
                                <td style="text-align: right;">184</td>
                                <td style="text-align: right;">109</td>
                                <td style="text-align: right;">4909</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Utilisasi/Iuran (%)
                                </td>
                                <td style="text-align: right;">0,00</td>
                                <td style="text-align: right;">5,49</td>
                                <td style="text-align: right;">14,07</td>
                                <td style="text-align: right;">23,80</td>
                                <td style="text-align: right;">23,26</td>
                                <td style="text-align: right;">16,12</td>
                                <td style="text-align: right;">11,12</td>
                                <td style="text-align: right;">6,50</td>
                                <td style="text-align: right;">14,93</td>
                            </tr>
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
<script type="text/javascript">
    var periode = "{{Session::get('periode')}}";
    var buttonTop = document.getElementById('button-top');
    var header = document.getElementById('filter-header');
    var sticky = header.offsetTop;
    window.onscroll = function() {
        if(window.pageYOffset > sticky) {
            header.classList.add('fixed-filter')
            buttonTop.style.display = 'block';
        } else {
            header.classList.remove('fixed-filter')
            buttonTop.style.display = 'none';
        }
    }

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

    $('#dash-btn').click(function(){
        $('#modal-preview').modal('show');
    });

    $('#dash-list').on( 'click', 'tr', function() {
        var form = $(this).find('td').first().text();
        dashboard = "{{ url('yakes-auth/form')}}/"+form;
        $('#modal-preview').modal('hide');
        loadForm(dashboard);
    });

Highcharts.chart('claim', {
    chart: {
        marginTop: 50
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
        categories: ['REG 1', 'REG 2', 'REG 3', 'REG 4', 'REG 5', 'REG 6', 'REG 7', 'TOTAL'],
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: true,
        title: {
            enabled: false
        }
    },
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
    series: [
        {
            type: 'column',
            name: 'Tagihan Awal',
            data: [453, 3317, 2172, 1052, 2025, 324, 258, 9601],
            color: '#ebebff'
        },
        {
            type: 'column',
            name: 'Claim BPJS',
            data: [139, 1917, 1262, 585, 713, 184, 109, 4909],
            color: '#8989ff'
        },
        {  
            type: 'column',
            name: 'Bayar Yakes',
            data: [314, 1401, 902, 474, 1312, 140, 149, 4692],
            color: '#2727ff'
        },
        {  
            type: 'spline',
            name: 'Claim vs Tag. Awal (%)',
            data: [306, 578, 581, 556, 352, 568, 421, 511],
            color: '#008000',
            marker: {
                lineWidth: 2,
            }
        },
        {  
            type: 'spline',
            name: 'Bayar Yakes vs Tag. Awal (%)',
            data: [693, 422, 415, 450, 648, 432, 579, 489],
            color: '#ffa500',
            marker: {
                lineWidth: 2,
            }
        },
    ]
});
Highcharts.chart('utility', {
    chart: {
        marginTop: 50
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
        categories: ['PUSAT', 'REG 1', 'REG 2', 'REG 3', 'REG 4', 'REG 5', 'REG 6', 'REG 7', 'TOTAL'],
        labels: {
            enabled: false
        }
    },
    yAxis: {
        visible: true,
        title: {
            enabled: false
        }
    },
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
    series: [
        {
            type: 'column',
            name: 'Iuran BPJS',
            data: [0, 4311, 19244, 6596, 2797, 5078, 2027, 2746, 42799],
            color: '#ebebff'
        },
        {
            type: 'column',
            name: 'Kapitasi',
            data: [0, 98, 792, 307, 66, 105, 42, 70, 1479],
            color: '#8989ff'
        },
        {  
            type: 'column',
            name: 'Claim BPJS',
            data: [0, 139, 1917, 1262, 585, 713, 184, 109, 4909],
            color: '#2727ff'
        },
        {  
            type: 'spline',
            name: 'Utilisasi/Iuran',
            data: [0, 549, 1407, 2380, 2326, 1612, 1112, 65, 1493],
            color: '#008000',
            marker: {
                lineWidth: 2,
            }
        },
    ]
});

</script>