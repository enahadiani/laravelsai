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
            <h6>Realisasi Beban</h6>
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
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Realisasi Beban</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="chart"></div>
                </div>
                <div class="col-12 ml-4">
                    <table style="width: 95%;">
                        <thead id="header-beban">
                            {{-- <tr>
                                <th style="width:15%;"></th>
                                <th style="width:10%;">B. SDM</th>
                                <th style="width:10%;">B. ADUM</th>
                                <th style="width:10%;">B. INVESTASI</th>
                                <th style="width:10%;">B. PEL. KESEHATAN</th>
                                <th style="width:10%;">BPP</th>
                                <th style="width:10%;">BPA</th>
                                <th style="width:10%;">CC</th>
                            </tr> --}}
                        </thead>
                        <tbody id="content-beban">
                            
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
var pembagi = 1000000;
var rea_now = [];
var rea_bef = [];
var rka_now = [];
var ach = [];
var yoy = [];

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
        $('#header-beban').empty();
        $('#content-beban').empty();
        getDataCC();
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

    // $('#periode').change(function(){
    //     $('#header-beban').empty();
    //     $('#content-beban').empty();
    //     var val = $(this).val();
    //     periode = val;
    //     getDataCC();
    // })
    
    RealBeban();
    // getDataCC();

    // function getDataCC() {
    //     $.ajax({
    //         type:'GET',
    //         url: "{{ url('yakes-dash/data-cc') }}/"+periode,
    //         dataType: 'JSON',
    //         success: function(result) {
    //             var data = result.daftar;
    //             var resultReaNow = 0
    //             var resultRkaNow = 0;
    //             var resultReaBefore = 0;
    //             var ReaNow = 0
    //             var RkaNow = 0;
    //             var ReaBefore = 0;
    //             var resultAch = 0;
    //             var resultYoy = 0;
    //             var totalReaNow = 0;
    //             var totalReaBefore = 0;
    //             var totalRkaNow = 0;
    //             var totalAch = 0;
    //             var totalYoy = 0;

    //             for(var i=0;i<data.length;i++) { 
    //                 resultReaNow = parseFloat(data[i].rea_now)/pembagi;
    //                 ReaNow = parseFloat(resultReaNow.toFixed(0));
    //                 resultRkaNow = parseFloat(data[i].rka_now)/pembagi;
    //                 RkaNow = parseFloat(resultRkaNow.toFixed(0));
    //                 resultReaBefore = parseFloat(data[i].rea_bef)/pembagi;
    //                 ReaBefore = parseFloat(resultReaBefore.toFixed(0));

    //                 if(RkaNow == 0) {
    //                     resultAch = 0;
    //                 } else {
    //                     resultAch = (ReaNow/RkaNow)*100;
    //                 }

    //                 if(ReaBefore == 0) {
    //                     resultYoy = 0;
    //                 } else {
    //                     resultYoy = ((ReaNow/ReaBefore)-1)*100;
    //                 }
            
    //                 totalReaNow = totalReaNow + ReaNow;
    //                 totalReaBefore = totalReaBefore + ReaBefore;
    //                 totalRkaNow = totalRkaNow + RkaNow;
    //                 totalAch = totalAch + resultAch;
    //                 totalYoy = totalYoy + resultYoy;
    //             }
                
    //             rea_now.push(parseFloat(totalReaNow.toFixed(0)));
    //             rea_bef.push(parseFloat(totalReaBefore.toFixed(0)));
    //             rka_now.push(parseFloat(totalRkaNow.toFixed(0)));
    //             ach.push(parseFloat(totalAch.toFixed(0)))
    //             yoy.push(parseFloat(totalYoy.toFixed(2)));

    //             RealBeban();
    //         }
    //     });
    // }

function RealBeban() {
    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-real-beban') }}/"+periode,
        dataType: 'JSON',
        success: function(result) {
            var data = result.daftar;
            var chart = [];
            var categories = [];
            var rea_beban_now = [];
            var rea_beban_bef = [];
            var rka_beban_now = [];
            var ach_beban = [];
            var yoy_beban = [];
            var resultReaBebanNow = 0
            var resultRkaBebanNow = 0;
            var resultReaBebanBefore = 0;
            var ReaBebanNow = 0
            var RkaBebanNow = 0;
            var ReaBebanBefore = 0;
            var resultBebanAch = 0;
            var resultBebanYoy = 0;
            var rea_cc_now = rea_now[0];
            var rea_cc_before = rea_bef[0];
            var rka_cc_now = rka_now[0];
            var ach_cc = ach[0];
            var yoy_cc = yoy[0];
            var test = [];
            var test2 = 0;
            var htmlHeader = "";
            var htmlContent = "";
            for(var i=0;i<data.length;i++) {
                categories.push(data[i].nama)
                resultReaBebanNow = parseFloat(data[i].rea_now)/pembagi;
                ReaBebanNow = parseFloat(resultReaBebanNow.toFixed(0));
                resultRkaBebanNow = parseFloat(data[i].rka_now)/pembagi;
                RkaBebanNow = parseFloat(resultRkaBebanNow.toFixed(0));
                resultReaBebanBefore = parseFloat(data[i].rea_bef)/pembagi;
                ReaBebanBefore = parseFloat(resultReaBebanBefore.toFixed(0));

                if(RkaBebanNow == 0) {
                    resultBebanAch = 0;
                } else {
                    resultBebanAch = parseFloat(((ReaBebanNow/RkaBebanNow)*100).toFixed(0));
                }

                if(ReaBebanBefore == 0) {
                    resultBebanYoy = 0;
                } else {
                    resultBebanYoy = parseFloat((((ReaBebanNow/ReaBebanBefore)-1)*100).toFixed(2));
                }
                rea_beban_now.push(ReaBebanNow);
                rea_beban_bef.push(ReaBebanBefore);
                rka_beban_now.push(RkaBebanNow);
                ach_beban.push(resultBebanAch)
                yoy_beban.push(resultBebanYoy);
            }
            // categories.push("CC");
            // rea_beban_now.push(rea_cc_now);
            // rea_beban_bef.push(rea_cc_before);
            // rka_beban_now.push(rka_cc_now);
            // ach_beban.push(ach_cc);
            // yoy_beban.push(yoy_cc)

            htmlHeader += "<tr>";
            htmlHeader += "<th style='width:15%;'></th>";
            for(var i=0;i<categories.length;i++) {
                htmlHeader += "<th style='width:10%;'>"+categories[i]+"</th>"
            }
            htmlHeader += "</tr>";
            $('#header-beban').append(htmlHeader);

            htmlContent += "<tr>";
            htmlContent += "<td style='position: relative;'>";
            htmlContent += "<div style='height: 15px; width:25px; background-color:#ebebff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
            htmlContent += "&nbsp;REA YTD OKT 2019";
            htmlContent += "</td>";
            for(var x=0;x<rea_beban_bef.length;x++) {
                htmlContent += "<td style='text-align: right;'>";
                htmlContent += sepNum(rea_beban_bef[x]);
                htmlContent += "</td>";
            }
            htmlContent += "</tr>";

            htmlContent += "<tr>";
            htmlContent += "<td style='position: relative;'>";
            htmlContent += "<div style='height: 15px; width:25px; background-color:#8989ff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
            htmlContent += "&nbsp;RKA YTD OKT 2020";
            htmlContent += "</td>";
            for(var x=0;x<rka_beban_now.length;x++) {
                htmlContent += "<td style='text-align: right;'>";
                htmlContent += sepNum(rka_beban_now[x]);
                htmlContent += "</td>";
            }
            htmlContent += "</tr>";

            htmlContent += "<tr>";
            htmlContent += "<td style='position: relative;'>";
            htmlContent += "<div style='height: 15px; width:25px; background-color:#2727ff;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
            htmlContent += "&nbsp;REA YTD OKT 2020";
            htmlContent += "</td>";
            for(var x=0;x<rea_beban_now.length;x++) {
                htmlContent += "<td style='text-align: right;'>";
                htmlContent += sepNum(rea_beban_now[x]);
                htmlContent += "</td>";
            }
            htmlContent += "</tr>";

            htmlContent += "<tr>";
            htmlContent += "<td style='position: relative;'>";
            htmlContent += "<div style='height: 15px; width:25px; background-color:#008000;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
            htmlContent += "&nbsp;ACH";
            htmlContent += "</td>";
            for(var x=0;x<ach_beban.length;x++) {
                htmlContent += "<td style='text-align: right;'>";
                htmlContent += sepNum(ach_beban[x]);
                htmlContent += "</td>";
            }
            htmlContent += "</tr>";

            htmlContent += "<tr>";
            htmlContent += "<td style='position: relative;'>";
            htmlContent += "<div style='height: 15px; width:25px; background-color:#ffa500;display:inline-block;margin-left:3px;margin-top:1px;'></div>";
            htmlContent += "&nbsp;YoY";
            htmlContent += "</td>";
            for(var x=0;x<yoy_beban.length;x++) {
                htmlContent += "<td style='text-align: right;'>";
                htmlContent += yoy_beban[x];
                htmlContent += "</td>";
            }
            htmlContent += "</tr>";

            $('#content-beban').append(htmlContent);

            chart.push({type:'column', name:'REA YTD OKT 2019', data:rea_beban_bef, color:'#ebebff'})
            chart.push({type:'column', name:'RKA YTD OKT 2020', data:rka_beban_now, color:'#8989ff'})
            chart.push({type:'column', name:'REA YTD OKT 2020', data:rea_beban_now, color:'#2727ff'})
            chart.push({type:'spline', name:'ACH', data:ach_beban, color:'#008000', yAxis:1, marker: {lineWidth: 2 }})
            chart.push({type:'spline', name:'YoY', data:yoy_beban, color:'#ffa500', yAxis:1, marker: {lineWidth: 2 }})

            Highcharts.chart('chart', {
                chart:{
                    width:1050,
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
                    categories: categories,
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