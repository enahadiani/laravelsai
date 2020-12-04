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
    .container-org {
        display: flex;
        align-content: center;
        justify-content: center;
    }
    .container-org-detail {
        display: flex;
        align-content: center;
        justify-content: center;
    }
    .circle-1 {
        height: 120px;
        width: 120px;
        border-radius: 100%;
        background-color: #bfbfbf;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .circle-2 {
        height: 75%;
        width: 75%;
        border-radius: 100%;
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .circle-3 {
        height: 80%;
        width: 80%;
        border-radius: 100%;
        background-color: #bfbfbf;
        text-align: center;
    }
    .circle-content {
        margin-top: 20px;
    }
</style>
</style>
<div class="row">
    <div class="col-12">
        <h2 style="position:absolute">SDM</h2>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;padding-bottom:10px;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;">Workforce Profil</h6>
            <div class="container-org">
                <div class="circle-1">
                    <div class="circle-2">
                        <div class="circle-3">
                            <div class="circle-content">
                                <h3 style="font-weight:bold;" id="jml-org">
                                {{-- Jumlah organik --}}
                                </h3>
                                <p style="font-weight:bold;margin-top:-10px;">Org</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row container-org-detail" style="margin-top: 10px;">
            {{-- Organik Detail --}}
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-6">
                    <div class="card ml-4" style="border-radius:10px !important;">
                        <h6 class="ml-4 mt-3" style="font-weight: bold;">Age Demography</h6>
                        <div id="demography"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mr-4" style="border-radius:10px !important;">
                        <h6 class="ml-4 mt-3" style="font-weight: bold;">Medis - Non Medis</h6>
                        <div id="medis-non"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var periode = "{{Session::get('periode')}}";
    
    $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-organik') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var jumlah = 0;
                for(var i=0;i<data.length;i++) {
                    jumlah += parseInt(data[i].jumlah)
                }
                $('#jml-org').text(jumlah)

                var html = "";
                var avg = 0;
                html += "<div class='col-1'></div>";
                for(var i=0;i<data.length;i++) {
                    avg = Math.round((parseInt(data[i].jumlah)/jumlah * 100))
                    if(data[i].nama === 'Non Organik') {
                        html += "<div class='col-3'>";
                        html += "<div class='card' style='padding: 10px; border-radius:20px !important;font-weight:bold;'>";
                        html += data[i].nama+" : "+data[i].jumlah+" org ("+avg+"%)";
                        html += "</div>";
                        html += "</div>";
                    } else {
                        html += "<div class='col-3'>";
                        html += "<div class='card' style='padding: 10px; border-radius:20px !important;font-weight:bold;'>";
                        html += "Organik "+data[i].nama+" : "+data[i].jumlah+" org ("+avg+"%)";
                        html += "</div>";
                        html += "</div>";
                    }
                }
                html += "<div class='col-1'></div>";
                $('.container-org-detail').append(html);

            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-demography') }}/"+periode,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var categories = [];
                var jumlah = 0;
                var value = [];
                var percent = [];
                var avg = 0;
                var chart = [];

                for(var i=0;i<data.length;i++) {
                    jumlah += parseInt(data[i].jumlah);
                }

                for(var i=0;i<data.length;i++) {
                    categories.push(data[i].nama);
                    avg = Math.round((parseInt(data[i].jumlah)/jumlah * 100))
                    chart.push({id:data[i].kode_demog, name:data[i].nama, y:parseInt(data[i].jumlah), percent:avg })
                }

                Highcharts.chart('demography', {
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
                    subtitle: {
                        text: ''
                    },
                    xAxis: {
                        categories: categories,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            enabled: false
                        }
                    },
                    tooltip: {
                        // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        //     '<td style="padding:0"><b>{point.y:.1f} org</b></td></tr>',
                        // footerFormat: '</table>',
                        // shared: true,
                        // useHTML: true
                        enabled: false
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.1,
                            borderWidth: 0,
                            color: '#ed7d31',
                            dataLabels: {
                                enabled: true,
                                useHTML: true,
                                formatter: function() {
                                    return `<div class='datalabel' style='position:relative; top:10px;'>
                                    <b>${this.y}</b></div>
                                    <br/>
                                    <div class='datalabelInside' style='position:absolute;top:100px;color:#ffffff'>
                                    <b>${this.point.percent} %</b>
                                    </div>`
                                }
                            }
                        }
                    },
                    series: [{
                        data: chart
                    }]
                });

            }
        });
</script>