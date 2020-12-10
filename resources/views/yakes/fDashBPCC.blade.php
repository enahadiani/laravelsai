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
    .select-dash {
        border-radius: 10px;
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
</style>
<div id="filter-header">
    <div class="row">
        <div class="col-12">
            <h6>Realisasi BPCC</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select id="periode" class="form-control select-dash">

            </select>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 30px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Realisasi CC YTD OKT 2020</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="cc"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
                                <th style="width:10%;">RJTP</th>
                                <th style="width:10%;">RJTKL</th>
                                <th style="width:10%;">RI</th>
                                <th style="width:10%;">RESTITUSI</th>
                            </tr>
                        </thead>
                        <tbody id="real-cc">
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Realisasi BP YTD OKT 2020</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="bp"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
                                <th style="width:10%;">RJTP</th>
                                <th style="width:10%;">RJTKL</th>
                                <th style="width:10%;">RI</th>
                                <th style="width:10%;">RESTITUSI</th>
                            </tr>
                        </thead>
                        <tbody id="real-bp">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var periode = "{{Session::get('periode')}}";
var pembagi = 1000000;

var header = document.getElementById('filter-header');
var sticky = header.offsetTop;
window.onscroll = function() {
    if(window.pageYOffset > sticky) {
        header.classList.add('fixed-filter')
    } else {
        header.classList.remove('fixed-filter')
    }
}

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-periode') }}/",
        dataType: 'JSON',
        success: function(result) {
            $.each(result.daftar, function(key, value){
                $('#periode').append("<option value="+value.periode+">Periode : "+value.periode+"</option>")
            })
            $('#periode').val(periode);
        }
    });

    $('#periode').change(function(){
        $('#real-bp').empty();
        $('#real-cc').empty();
        var val = $(this).val();
        periode = val;
        getDataCC();
        getDataBP();
    })
    getDataCC();
    getDataBP();    
    function getDataCC() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-cc') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                $('#real-cc').empty();
                var data = result.daftar;
                var rea_now = [];
                var rea_bef = [];
                var rka_now = [];
                var ach = [];
                var yoy = [];
                var chart = [];
                var resultReaNow = 0
                var resultRkaNow = 0;
                var resultReaBefore = 0;
                var ReaNow = 0
                var RkaNow = 0;
                var ReaBefore = 0;
                var resultAch = 0;
                var resultYoy = 0;

                var html = "";
                for(var i=0;i<data.length;i++) { 
                    resultReaNow = parseFloat(data[i].rea_now)/pembagi;
                    ReaNow = parseFloat(resultReaNow.toFixed(0));
                    resultRkaNow = parseFloat(data[i].rka_now)/pembagi;
                    RkaNow = parseFloat(resultRkaNow.toFixed(0));
                    resultReaBefore = parseFloat(data[i].rea_bef)/pembagi;
                    ReaBefore = parseFloat(resultReaBefore.toFixed(0));

                    if(RkaNow == 0) {
                        resultAch = 0;
                    } else {
                        resultAch = parseFloat(((ReaNow/RkaNow)*100).toFixed(2));
                    }

                    if(ReaBefore == 0) {
                        resultYoy = 0;
                    } else {
                        resultYoy = parseFloat((((ReaNow/ReaBefore)-1)*100).toFixed(2));
                    }
                    
                    rea_now.push(ReaNow);
                    rea_bef.push(ReaBefore);
                    rka_now.push(RkaNow);
                    ach.push(resultAch)
                    yoy.push(resultYoy);

                }

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "REA YTD OKT 2019";
                html += "</td>";
                for(var x=0;x<rea_bef.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_bef[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "RKA YTD OKT 2020";
                html += "</td>";
                for(var x=0;x<rka_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rka_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "REA YTD OKT 2020";
                html += "</td>";
                for(var x=0;x<rea_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "ACH";
                html += "</td>";
                for(var x=0;x<ach.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(ach[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "YoY";
                html += "</td>";
                for(var x=0;x<yoy.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += yoy[x];
                    html += "</td>";
                }
                html += "</tr>";

                $('#real-cc').append(html);
                chart.push({type:'column', name:'REA YTD OKT 2019', data:rea_bef, color:'#ebebff'})
                chart.push({type:'column', name:'RKA YTD OKT 2020', data:rka_now, color:'#8989ff'})
                chart.push({type:'column', name:'REA YTD OKT 2020', data:rea_now, color:'#2727ff'})
                chart.push({type:'spline', name:'ACH', data:ach, color:'#008000', yAxis:1, marker: {lineWidth: 2 }})
                chart.push({type:'spline', name:'YoY', data:yoy, color:'#ffa500', yAxis:1, marker: {lineWidth: 2 }})

                Highcharts.chart('cc', {
                    chart:{
                        width:1050
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
                        categories: ['RJTP', 'RJTL', 'RI', 'RESTITUSI'],
                        labels: {
                            enabled: true
                        }
                    },
                    yAxis: [
                        {
                            linewidth: 1,
                            title:{
                                text: ''
                            }
                        },
                        {
                            linewidth: 1,
                            opposite: true,
                            title:{
                                text: ''
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

            }
        });
    }
    function getDataBP() {
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-bp') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                $('#real-bp').empty();
                var data = result.daftar;
                var rea_now = [];
                var rea_bef = [];
                var rka_now = [];
                var ach = [];
                var yoy = [];
                var chart = [];
                var resultReaNow = 0
                var resultRkaNow = 0;
                var resultReaBefore = 0;
                var ReaNow = 0
                var RkaNow = 0;
                var ReaBefore = 0;
                var resultAch = 0;
                var resultYoy = 0;
                
                var html = "";
                for(var i=0;i<data.length;i++) { 
                    resultReaNow = parseFloat(data[i].rea_now)/pembagi;
                    ReaNow = parseFloat(resultReaNow.toFixed(0));
                    resultRkaNow = parseFloat(data[i].rka_now)/pembagi;
                    RkaNow = parseFloat(resultRkaNow.toFixed(0));
                    resultReaBefore = parseFloat(data[i].rea_bef)/pembagi;
                    ReaBefore = parseFloat(resultReaBefore.toFixed(0));

                    if(RkaNow == 0) {
                        resultAch = 0;
                    } else {
                        resultAch = parseFloat(((ReaNow/RkaNow)*100).toFixed(2));
                    }

                    if(ReaBefore == 0) {
                        resultYoy = 0;
                    } else {
                        resultYoy = parseFloat((((ReaNow/ReaBefore)-1)*100).toFixed(2));
                    }
                    
                    rea_now.push(ReaNow);
                    rea_bef.push(ReaBefore);
                    rka_now.push(RkaNow);
                    ach.push(resultAch)
                    yoy.push(resultYoy);

                }

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;REA YTD OKT 2019";
                html += "</td>";
                for(var x=0;x<rea_bef.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_bef[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;RKA YTD OKT 2020";
                html += "</td>";
                for(var x=0;x<rka_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rka_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;REA YTD OKT 2020";
                html += "</td>";
                for(var x=0;x<rea_now.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(rea_now[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;ACH";
                html += "</td>";
                for(var x=0;x<ach.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += sepNum(ach[x]);
                    html += "</td>";
                }
                html += "</tr>";

                html += "<tr>";
                html += "<td style='position: relative;'>";
                html += "<div style='height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                html += "&nbsp;YoY";
                html += "</td>";
                for(var x=0;x<yoy.length;x++) {
                    html += "<td style='text-align: right;'>";
                    html += yoy[x];
                    html += "</td>";
                }
                html += "</tr>";

                $('#real-bp').append(html);
                chart.push({type:'column', name:'REA YTD OKT 2019', data:rea_bef, color:'#ebebff'})
                chart.push({type:'column', name:'RKA YTD OKT 2020', data:rka_now, color:'#8989ff'})
                chart.push({type:'column', name:'REA YTD OKT 2020', data:rea_now, color:'#2727ff'})
                chart.push({type:'spline', name:'ACH', data:ach, yAxis:1, color:'#008000'})
                chart.push({type:'spline', name:'YoY', data:yoy, yAxis:1, color:'#ffa500'})

                Highcharts.chart('bp', {
                    chart:{
                        width:1050
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
                        categories: ['RJTP', 'RJTL', 'RI', 'RESTITUSI'],
                        labels: {
                            enabled: true
                        }
                    },
                    yAxis: [
                        {
                            linewidth: 1,
                            title:{
                                text: ''
                            }
                        },
                        {
                            linewidth: 1,
                            opposite: true,
                            title:{
                                text: ''
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
            }
        });
    }
</script>