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
</style>

<div class="row">
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
            <div class="col-6 p-1">
                <div class="card card-dash">
                    <p class="ml-4 mt-3 mb-0 judul-card">Operating Ratio YTD</p>
                    <h3 id="pendapatan-today" class="ml-4 text-card">23%</h3>
                </div>
            </div>
            <div class="col-6 p-1">
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
    chart: {
        height: 168
        // marginLeft: marginLeft,
        // marginRight: marginRight
    },
    exporting:{
        enabled: false
    },
    legend:{ enabled:false },
    credits: { enabled: false },
    title: { text: '' },
    subtitle: { text: '' },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        labels: {
            enabled: false
            }
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
                        enabled: true
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
</script>