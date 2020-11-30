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
        width: 50%;
        position: absolute;
        margin: 0;
        right: 0;
        border-radius: 10px;
    }
</style>
<div class="row">
    <div class="col-6">
        <h2 style="position:absolute;">Biaya Kunjungan</h2>
    </div>
    <div class="col-6">
        <select id="jenis" class="form-control select-dash">
            <option value="PK" selected>Pensiunan dan keluarga</option>
        </select>
    </div>
</div>

<div class="row" style="position: relative;margin-top:50px;">
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Claim Cost</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
            <div id="claim" class="mt-3"></div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">Komposisi CC</h6>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h6 class="ml-4 mt-3 mb-0" style="font-weight: bold;">CC per Claimant</h6>
            <p class="ml-4 mt-1">Satuan Milyar</p>
        </div>
    </div>
</div>

<script type="text/javascript">
Highcharts.chart('claim', {
    chart: {
        type: 'column',
        height: 250
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
        categories: ["YTD Q3 '19", "RKA Q3 '20", "YTD Q3 '20"]
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
            pointWidth: 30,
            groupPadding: 0,
            borderWidth: 0,
            shadow: false,
            dataLabels: {
                enabled: true
            }
        },
        colors: ['#ebebff', '#8989ff', '#2727ff'],
    },
    series: [
        {
            name: "Claim Cost",
            data: [
                {
                    name: "YTD Q3 '19",
                    y: 289.3,
                    color: '#ebebff',
                    drilldown: "YTD Q3 '19"
                },
                {
                    name: "RKA Q3 '20",
                    y: 340.1,
                    color: '#8989ff',
                    drilldown: "RKA Q3 '20"
                },
                {
                    name: "YTD Q3 '20",
                    y: 273.5,
                    color: '#2727ff',
                    drilldown: "YTD Q3 '20"
                },
            ],
        }
    ]
});
</script>