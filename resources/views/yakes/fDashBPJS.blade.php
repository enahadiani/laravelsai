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
        <h2 style="position:absolute">BPJS</h2>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
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
                                <td>453</td>
                                <td>3.317</td>
                                <td>2.172</td>
                                <td>1.052</td>
                                <td>2.025</td>
                                <td>324</td>
                                <td>258</td>
                                <td>9.601</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Claim BPJS
                                </td>
                                <td>139</td>
                                <td>1.917</td>
                                <td>1.262</td>
                                <td>585</td>
                                <td>713</td>
                                <td>184</td>
                                <td>109</td>
                                <td>4.909</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Bayar Yakes
                                </td>
                                <td>314</td>
                                <td>1.401</td>
                                <td>902</td>
                                <td>474</td>
                                <td>1.312</td>
                                <td>140</td>
                                <td>149</td>
                                <td>4.692</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Claim vs Tag. Awal (%)
                                </td>
                                <td>30,6</td>
                                <td>57,8</td>
                                <td>58,1</td>
                                <td>55,6</td>
                                <td>35,2</td>
                                <td>56,8</td>
                                <td>42,1</td>
                                <td>51,1</td>
                            </tr>
                            <tr>
                                <td style="position: relative;">
                                    <div style="height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;"></div>
                                    Bayar Yakes vs Tag. Awal (%)
                                </td>
                                <td>69,3</td>
                                <td>42,2</td>
                                <td>41,5</td>
                                <td>45,0</td>
                                <td>64,8</td>
                                <td>43,2</td>
                                <td>57,9</td>
                                <td>48,9</td>
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
                                <td>0,00</td>
                                <td>5,49</td>
                                <td>14,07</td>
                                <td>23,80</td>
                                <td>23,26</td>
                                <td>16,12</td>
                                <td>11,12</td>
                                <td>6,50</td>
                                <td>14,93</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
Highcharts.chart('claim', {
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