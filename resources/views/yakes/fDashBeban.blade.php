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
</style>
<div class="row">
    <div class="col-12">
        <h2 style="position:absolute">Beban</h2>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Beban</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="invest"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:22%;"></th>
                                <th style="width:8%;">Jan</th>
                                <th style="width:8%;">Feb</th>
                                <th style="width:8%;">Mar</th>
                                <th style="width:8%;">Apr</th>
                                <th style="width:8%;">Mei</th>
                                <th style="width:8%;">Jun</th>
                                <th style="width:8%;">Jul</th>
                                <th style="width:8%;">Agt</th>
                                <th style="width:8%;">Sep</th>
                                <th style="width:8%;">Okt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#4674c5;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Beban Investasi
                                </td>
                                <td style="text-align: right;">741</td>
                                <td style="text-align: right;">654</td>
                                <td style="text-align: right;">671</td>
                                <td style="text-align: right;">868</td>
                                <td style="text-align: right;">611</td>
                                <td style="text-align: right;">697</td>
                                <td style="text-align: right;">650</td>
                                <td style="text-align: right;">675</td>
                                <td style="text-align: right;">725</td>
                                <td style="text-align: right;">571</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ed7d31;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Beban Sumber Daya Manusia (SDM)
                                </td>
                                <td style="text-align: right;">6.364</td>
                                <td style="text-align: right;">7.289</td>
                                <td style="text-align: right;">14.730</td>
                                <td style="text-align: right;">8.068</td>
                                <td style="text-align: right;">13.887</td>
                                <td style="text-align: right;">13.362</td>
                                <td style="text-align: right;">5.647</td>
                                <td style="text-align: right;">6.337</td>
                                <td style="text-align: right;">14.077</td>
                                <td style="text-align: right;">6.227</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#a5a5a5;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Beban Administrasi dan Umum
                                </td>
                                <td style="text-align: right;">3.130</td>
                                <td style="text-align: right;">3.372</td>
                                <td style="text-align: right;">3.364</td>
                                <td style="text-align: right;">2.708</td>
                                <td style="text-align: right;">2.558</td>
                                <td style="text-align: right;">3.092</td>
                                <td style="text-align: right;">2.673</td>
                                <td style="text-align: right;">2.835</td>
                                <td style="text-align: right;">4.282</td>
                                <td style="text-align: right;">2.359</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ffc000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Beban Pelayanan Kesehatan (TPKK)
                                </td>
                                <td style="text-align: right;">346</td>
                                <td style="text-align: right;">542</td>
                                <td style="text-align: right;">1.276</td>
                                <td style="text-align: right;">1.605</td>
                                <td style="text-align: right;">769</td>
                                <td style="text-align: right;">725</td>
                                <td style="text-align: right;">606</td>
                                <td style="text-align: right;">755</td>
                                <td style="text-align: right;">1.288</td>
                                <td style="text-align: right;">939</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#5b9bd5;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Beban Pemeliharaan dan Perbaikan
                                </td>
                                <td style="text-align: right;">159</td>
                                <td style="text-align: right;">228</td>
                                <td style="text-align: right;">424</td>
                                <td style="text-align: right;">161</td>
                                <td style="text-align: right;">110</td>
                                <td style="text-align: right;">603</td>
                                <td style="text-align: right;">329</td>
                                <td style="text-align: right;">298</td>
                                <td style="text-align: right;">356</td>
                                <td style="text-align: right;">309</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#70ad47;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Beban Penyusutan dan Amortisasi
                                </td>
                                <td style="text-align: right;">689</td>
                                <td style="text-align: right;">687</td>
                                <td style="text-align: right;">722</td>
                                <td style="text-align: right;">748</td>
                                <td style="text-align: right;">725</td>
                                <td style="text-align: right;">731</td>
                                <td style="text-align: right;">712</td>
                                <td style="text-align: right;">736</td>
                                <td style="text-align: right;">747</td>
                                <td style="text-align: right;">752</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
Highcharts.chart('invest', {
    chart: {
        type: 'column'
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    xAxis: {
        labels: {
            enabled: false
        },
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt']
    },
    yAxis: {
        visible: true,
        title: {
            enabled: false
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
    series: [{
        name: 'Beban Investasi',
        data: [741, 654, 671, 868, 611, 597, 650, 675, 725, 571],
        stack: 'beban',
        color: '#4674c5'
    }, {
        name: 'Beban Sumber Daya Menusia (SDM)',
        data: [6364, 7289, 14730, 8068, 13887, 13362, 5647, 6377, 14077, 6227],
        stack: 'beban',
        color: '#ed7d31'
    }, {
        name: 'Beban Administrasi dan Umum',
        data: [3130, 3372, 3364, 2708, 2558, 3092, 2673, 2835, 4282, 2359],
        stack: 'beban',
        color: '#a5a5a5'
    },
    {
        name: 'Beban Pelayanan Kesehatan (TPKK)',
        data: [346, 542, 1.276, 1.605, 769, 725, 606, 755, 1.228, 939],
        stack: 'beban',
        color: '#ffc000'
    },
    {
        name: 'Beban Pemeliharaan dan Perbaikan',
        data: [159, 228, 424, 161, 110, 603, 329, 298, 356, 309],
        stack: 'beban',
        color: '#5b9bd5'
    },
    {
        name: 'Beban Penyusutan dan Amortisasi',
        data: [689, 687, 722, 748, 725, 731, 712, 736, 747, 752],
        stack: 'beban',
        color: '#70ad47'
    }]
});
</script>