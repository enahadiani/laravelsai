<link rel="stylesheet" href="{{ asset('dash-asset/dash-ypt/cf.dekstop.css') }}" />

{{-- DEKSTOP --}}

{{-- HEADER --}}
<section id="header" class="header">
    <div class="row">
        <div class="col-8 pl-12">
            <div class="row">
                <div id="back-div" class="col-1 hidden">
                    <div id="back" class="glyph-icon iconsminds-left header"></div>
                </div>
                <div id="dash-title-div" class="col-11">
                    <h2 class="title-dash" id="title-dash">Cash Flow</h2>
                </div>
            </div>
        </div>
        <div class="col-4 pr-0">
            <div class="row">
                {{-- <div class="col-3 pr-0 message-div">
                    <img alt="message-icon" class="icon-message" src="{{ asset('dash-asset/dash-ypt/icon/message.svg') }}">
                </div> --}}
                <div class="col-12">
                    <div class="select-custom row">
                        <div class="col-2">
                            <img alt="message-icon" class="icon-calendar" src="{{ asset('dash-asset/dash-ypt/icon/calendar.svg') }}">
                        </div>
                        <div class="col-8">
                            <p id="select-text" class="select-text">September 2021</p>
                        </div>
                        <div class="col-2">
                            <img alt="calendar-icon" class="icon-drop-arrow" src="{{ asset('dash-asset/dash-ypt/icon/drop-arrow.svg') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END HEADER --}}

{{-- CONTENT MAIN --}}
<section id="main-dash" class="mt-20 pb-24">
    {{-- ROW 1 --}}
    <div id="dekstop-1" class="row dekstop">
        <div class="col-3 pl-12 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Inflow</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-inflow" class="main-nominal">293,3 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-inflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">YoY</td>
                                    <td>292,1 M</td>
                                    <td id="inflow-yoy-percentage" class="green-text pr-0">
                                        0,4%
                                        <div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Outflow</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-outflow" class="main-nominal">211,4 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-outflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">YoY</td>
                                    <td>201,3 M</td>
                                    <td id="outflow-yoy-percentage" class="red-text pr-0">
                                        4,7%
                                        <div class="glyph-icon iconsminds-up icon-card red-text bold-700"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Cash Balance</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-balance" class="main-nominal">81,9 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-balance">
                            <tbody>
                                <tr>
                                    <td class="w-10">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td id="balance-yoy-percentage" class="red-text pr-0">
                                        &nbsp;
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 pl-1 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Closing Cash Balance</h4>
                    </div>
                </div>
                <div class="row body-div">
                    <div class="col-12">
                        <p id="cf-closing" class="main-nominal">158,1 M</p>
                    </div>
                    <div class="col-12">
                        <table class="table table-borderless table-pr-16" id="table-cf-outflow">
                            <tbody>
                                <tr>
                                    <td class="w-10">MoM</td>
                                    <td>76,2 M</td>
                                    <td id="outflow-yoy-percentage" class="green-text pr-0">
                                        107,4%
                                        <div class="glyph-icon iconsminds-up icon-card green-text bold-700"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 1 --}}

    {{-- ROW 2 --}}
    <div id="dekstop-2" class="row dekstop mt-4">
        <div class="col-12 pl-12 pr-0">
            <div class="card card-dash">
                <div class="row header-div">
                    <div class="col-9">
                        <h4 class="header-card">Trend Cash Flow</h4>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-6 pr-0">
                                <label class="label-checkbox float-right">
                                    <input type="radio" checked="checked" name="trend">
                                    <span class="text">Bulanan</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="col-5">
                                <label class="label-checkbox float-right">
                                    <input type="radio" name="trend">
                                    <span class="text">Harian</span>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="trend-chart"></div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}
</section>
{{-- END CONTENT MAIN --}}

{{-- END DEKSTOP --}}

<script type="text/javascript">
$(window).on('resize', function(){
    var win = $(this); //this = window
    if (win.height() == 800) { 
        $("body").css("overflow", "hidden");
    }
    if (win.height() > 800) { 
        $("body").css("overflow", "scroll");
    }
    if (win.height() < 800) { 
        $("body").css("overflow", "scroll");
    }
});

Highcharts.chart('trend-chart', {
    chart: {
        height: 450,
        // width: 600
    },
    title: { text: '' },
    subtitle: { text: '' },
    exporting:{ 
        enabled: false
    },
    legend:{ 
        enabled: true,
        // layout: 'vertical',
        // align: 'right',
        verticalAlign: 'bottom' 
    },
    credits: { enabled: false },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
    },
    yAxis: {
         title: {
            text: 'Nilai'
        }
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            marker:{
                enabled:false
            },
            pointStart: 2016
        }
    },
    series: [
        {
            name: 'Cash In',
            data: [5000, 4000, 2000, 3000, 2500, 2800, 6000, 2000, 2000, 1500, 2000, 2500],
            color: '#8085E9'
        },
        {
            name: 'Cash Out',
            data: [4000, 3000, 18000, 2000, 2000, 2500, 5000, 2500, 1500, 2000, 2500, 2000],
            color: '#90ED7D'
        },
        {
            name: 'Saldo',
            data: [1000, 1000, 1500, 1000, 1000, 1500, 1000, 1000, 2000, 3000, 2000, 2000],
            color: '#F7A35C'
        },
        {
            name: 'YoY Cash In',
            data: [1500, 1500, 1500, 1200, 1800, 1400, 1500, 1900, 1700, 2200, 2500, 2800],
            color: '#7CB5EC'
        },
        {
            name: 'YoY Cash Out',
            data: [1200, 1300, 1300, 1400, 1400, 1600, 1800, 2000, 1200, 2000, 2000, 2500],
            color: '#7CB5EC'
        },
        {
            name: 'YoY Saldo',
            data: [1000, 1000, 1000, 1200, 1500, 1100, 1200, 2500, 1800, 2500, 2200, 2700],
            color: '#434348'
        }
    ],
});
</script>