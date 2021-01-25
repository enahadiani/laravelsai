<link rel="stylesheet" href="{{ asset('master.css') }}" />
<style>
    body {`
        overflow: auto; /* Hide scrollbars */
    }
    .card{
        border-radius: 10px !important;
        box-shadow: 0 2px 3px 0 #ccc;
        border: 1px solid #f0f0f0;
    }
    .card-dash {
        padding: 8px;
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
    .judul-card {
        color: #ccc
    }
    .text-card {
        font-weight: bold;
    }
    .header-card {
        display: flex;
        justify-content: space-between;
    }
    .group-filter {
        padding: 4px 4px;
    }
    .dropdown-filter {
        width: 90%;
        margin: 0 10px;
    }
    .dropdown-menu-dash {
        background-color: #ffffff;
        border-radius: 10px;
        width: 100%;
        max-height: 130px;
        overflow: auto;
        overflow-x: hidden;
        margin-top: 0px;
        padding: 6px;
        position: absolute;
        z-index: 100;
        display: none;
        float: left;
    }
    .dropdown-menu-dash-active {
        display: block;
    }
    .dropdown-menu-dash > li {
        cursor: pointer;
        list-style-type: none;
    }
    .dropdown-menu-dash > li:hover {
        background-color: #F5F5F5;
    }
    .select-dash {
        border-radius: 10px;
    }
    .keterangan {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .pemberitahuan-judul {
        color: #ffffff;
        font-weight: bold;
    }
    .card-pemberitahuan {
        background-color: #0058E4; 
        box-shadow: none;
        height: 250px;
    }
    .pemberitahuan-content {
        color: #ffffff;
    }
    .list-pemberitahuan {
        margin-left: -12px;
    }
    .list-pemberitahuan > li {
        list-style-type: '-';
        color: #ffffff;
        padding: 0 4px;
    }
    #komposisi-pendapatan .highcharts-color-0 {
        fill: #0058E4 !important;
    }
    #komposisi-pendapatan .highcharts-color-1 {
        fill: #9FC4FF !important;
    }
    #komposisi-pendapatan .highcharts-color-2 {
        fill: #FFB703 !important;
    }
    #komposisi-beban .highcharts-color-0 {
        fill: #0058E4 !important;
    }
    #komposisi-beban .highcharts-color-1 {
        fill: #9FC4FF !important;
    }
    #komposisi-beban .highcharts-color-2 {
        fill: #FFB703 !important;
    }
</style>

<div class="row" id="baris-1">
    <div class="col-4">
        <div class="row">
            <div class="col-6 p-1">
                <div class="card card-dash">
                    <p class="ml-4 mt-3 mb-0 judul-card">Pendapatan Hari Ini</p>
                    <h3 id="pendapatan-today" class="ml-4 text-card">100 Jt</h3>
                </div>
            </div>
            <div class="col-6 p-1">
                <div class="card card-dash">
                    <p class="ml-4 mt-3 mb-0 judul-card">Gross Profit Margin YTD</p>
                    <h3 id="pendapatan-today" class="ml-4 text-card">67%</h3>
                </div>
            </div>
            <div class="col-6 p-1 mt-4">
                <div class="card card-dash">
                    <p class="ml-4 mt-3 mb-0 judul-card">Operating Ratio YTD</p>
                    <h3 id="pendapatan-today" class="ml-4 text-card">23%</h3>
                </div>
            </div>
            <div class="col-6 p-1 mt-4">
                <div class="card card-dash">
                    <p class="ml-4 mt-3 mb-0 judul-card">Net Profit Margin YTD</p>
                    <h3 id="pendapatan-today" class="ml-4 text-card">53%</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8 p-1">
        <div class="card card-dash">
            <div class="header-card">
                <h6 class="ml-4 mt-2 mb-0">Arus Kas</h6>
                <div class="group-filter">
                    <div class="dropdown-arus-kas dropdown dropdown-filter">
                        <button id="arus-kas-select" class="btn btn-light select-dash" style="background-color: #ffffff;width: 100%;text-align:left;" type="button" data-toggle="dropdown">
                            2021
                            <span class="glyph-icon simple-icon-arrow-down" style="float: right; margin-top:8%;"></span>
                        </button>
                        <ul class="dropdown-menu-dash" id="arus-kas-select-content" role="menu" aria-labelledby="menu2">
                            <li>
                                <span style="display: none;">2021</span>
                                <span>2021</span>
                            </li>
                            <li>
                                <span style="display: none;">2020</span>
                                <span>2020</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-card">
                <div id="arus-kas"></div>
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="keterangan">
                            <div style="padding: 0 50px">
                                <div style="height: 10px; width: 10px; border-radius: 50%; background-color:#0058E4;display:inline-block;"></div>
                                <span style="padding-left: 6px;font-weight: bold;position: relative;top:-1px;font-size:10px !important;">Total Pendapatan</span>
                            </div>
                            <div style="padding: 0 50px">
                                <div style="height: 10px; width: 10px; border-radius: 50%; background-color:#9FC4FF;display:inline-block;"></div>
                                <span style="padding-left: 6px;font-weight: bold;position: relative;top:-1px;font-size:10px !important;">Total Beban</span>
                            </div>
                            <div style="padding: 0 50px">
                                <div style="height: 10px; width: 10px; border-radius: 50%; background-color:#FFB703;display:inline-block;"></div>
                                <span style="padding-left: 6px;font-weight: bold;position: relative;top:-1px;font-size:10px !important;">LabaRugi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>

<div class="row" id="baris-2">
        <div class="col-4 p-1">
            <div class="card card-dash card-pemberitahuan">
                <p class="ml-4 mt-1 mb-0 judul-card pemberitahuan-judul">Pengingat</p>
                <ul class="list-pemberitahuan">
                    <li>
                        <p class="pemberitahuan-content">Hari ini menerima pembayaran Piutang Rp. 30.000.000</p>
                    </li>
                    <li>
                        <p class="pemberitahuan-content">3 hari lagi membayar gaji karyawan Rp. 90.000.000</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-8 p-1">
            <div class="card card-dash"> 
                <div class="header-card">
                    <h6 class="ml-4 mt-2 mb-0">Saldo Laba Rugi</h6>
                </div>
                <div class="content-card">
                    <div id="laba-rugi"></div>
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="keterangan">
                            <div style="padding: 0 50px">
                                <div style="height: 10px; width: 10px; border-radius: 50%; background-color:#0058E4;display:inline-block;"></div>
                                <span style="padding-left: 6px;font-weight: bold;position: relative;top:-1px;font-size:10px !important;">Uang Masuk</span>
                            </div>
                            <div style="padding: 0 50px">
                                <div style="height: 10px; width: 10px; border-radius: 50%; background-color:#9FC4FF;display:inline-block;"></div>
                                <span style="padding-left: 6px;font-weight: bold;position: relative;top:-1px;font-size:10px !important;">Uang Keluar</span>
                            </div>
                            <div style="padding: 0 50px">
                                <div style="height: 10px; width: 10px; border-radius: 50%; background-color:#FFB703;display:inline-block;"></div>
                                <span style="padding-left: 6px;font-weight: bold;position: relative;top:-1px;font-size:10px !important;">Saldo KasBank</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="baris-3">
    <div class="col-4 p-1">
        <div class="card card-dash">
            <div class="header-card">
                <h6 class="ml-4 mt-2 mb-0">Komposisi Pendapatan</h6>
            </div>
            <div class="card-content">
                <div id="komposisi-pendapatan"></div>
            </div>
        </div>
    </div>
    <div class="col-4 p-1">
        <div class="card card-dash">
            <div class="header-card">
                <h6 class="ml-4 mt-2 mb-0">Komposisi Beban</h6>
            </div>
            <div class="card-content">
                <div id="komposisi-beban"></div>
            </div>
        </div>
    </div>
    <div class="col-4 p-1">
        <div class="card card-dash">
            <div class="header-card">
                <h6 class="ml-4 mt-2 mb-0">Umur Hutang-Piutang</h6>
            </div>
            <div class="card-content">
                <div id="umur-piutang-hutang"></div>
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="keterangan">
                            <div style="padding: 0 50px">
                                <span style="font-weight: bold;position: relative;font-size:12px !important;">Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#arus-kas-select, #arus-kas-select-content').hover(function(){
    $('#arus-kas-select-content').addClass('dropdown-menu-dash-active')
},function(){
    $('#arus-kas-select-content').removeClass('dropdown-menu-dash-active')
});

$('#arus-kas-select-content li').click(function(){
    $('#arus-kas-select-content').removeClass('dropdown-menu-dash-active')
});

$('#arus-kas-select-content').on( 'click', 'li', function() {
    var value = $(this).find('span').first().text();
    var text = $(this).find('span').last().text();
    var htmlText = text+"<span class='glyph-icon simple-icon-arrow-down' style='float: right; margin-top:8%;'></span>";
    $(this).closest('.dropdown-arus-kas').find('.select-dash').html(htmlText);
});

Highcharts.chart('arus-kas', {
    chart: { height: 166 },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: { enabled: false }
    },
    yAxis: [
        {
            linewidth: 1,
            title:{ text: '' }
        },
        {
            linewidth: 1,
            opposite: true,
            title:{ text: '' }
        },
    ],
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series:{
            pointPadding: 0,
            shadow: false,
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [1000, 3000, 2500, 4000, 5000, 8000, 10000, 9000, 2000, 5500, 2500, 8000],
            color: '#0058E4'
        },
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [2500, 4000, 3500, 6000, 7000, 4000, 7000, 5000, 6000, 7500, 4500, 7000],
            color: '#9FC4FF'
        },
        {
            type: 'spline',
            name: 'Saldo  KasBank',
            data: [50, 20, 30, 50, 20, 80, 40, 50, 80, 45, 65, 85],
            color: '#FFB703',
            yAxis: 1
        },
    ]
});

Highcharts.chart('laba-rugi', {
    chart: { height: 170 },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: { enabled: false }
    },
    yAxis: [
        {
            linewidth: 1,
            title:{ text: '' }
        },
        {
            linewidth: 1,
            opposite: true,
            title:{ text: '' }
        },
    ],
    tooltip: {
        enabled: false
    },
    plotOptions: {
        series:{
            pointPadding: 0,
            shadow: false,
            dataLabels: {
                enabled: false
            }
        }
    },
    series: [
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [1000, 3000, 2500, 4000, 5000, 8000, 10000, 9000, 2000, 5500, 2500, 8000],
            color: '#0058E4'
        },
        {
            type: 'column',
            name: 'Uang Masuk',
            data: [2500, 4000, 3500, 6000, 7000, 4000, 7000, 5000, 6000, 7500, 4500, 7000],
            color: '#9FC4FF'
        },
        {
            type: 'spline',
            name: 'Saldo  KasBank',
            data: [50, 20, 30, 50, 20, 80, 40, 50, 80, 45, 65, 85],
            color: '#FFB703',
            yAxis: 1
        },
    ]
});

Highcharts.chart('umur-piutang-hutang', {
    chart: {
        type: 'column',
        height: 230
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ enabled: false },
    legend:{ enabled:false },
    credits: { enabled: false },
    xAxis: {
        categories: [
            '0-30',
            '31-60',
            '61-90',
            '90-120',
            '121+'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        enabled: false
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Hari',
        data: [20, 40, 65, 100, 125],
        color: '#0058E4'
    }]
});

Highcharts.chart('komposisi-pendapatan', {
    chart: {
        type: 'pyramid',
        height: 258,
        width: 350
    },
    credits: { enabled: false },
    exporting:{ enabled: false },
    title: { text: '' },
    plotOptions: {
        pyramid:{
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br/>Rp. {point.y:,.0f}',
                softConnector: true
            },
            center: ['40%', '50%'],
            width: '60%'
        },
    },
    legend: {
        enabled: false
    },
    series: [
        {
            name: 'Komposisi Pendapatan',
            data: [
                ['Pendapatan C', 67],
                ['Pendapatan B', 97],
                ['Pendapatan A', 203]
            ]
        }
    ],
});
Highcharts.chart('komposisi-beban', {
    chart: {
        type: 'pyramid',
        height: 258,
        width: 350
    },
    credits: { enabled: false },
    exporting:{ enabled: false },
    title: { text: '' },
    plotOptions: {
        pyramid:{
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br/>Rp. {point.y:,.0f}',
                softConnector: true
            },
            center: ['40%', '50%'],
            width: '60%'
        },
    },
    legend: {
        enabled: false
    },
    series: [
        {
            name: 'Komposisi Beban',
            data: [
                ['Beban C', 67],
                ['Beban B', 97],
                ['Beban A', 203]
            ]
        }
    ],
});
</script>