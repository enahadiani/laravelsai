@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2)
@endphp

<style>
    .page-wrapper{
        background:white;
    }
    .card{
        border:none;
        box-shadow:none;
    }
    h5{
        font-weight:bold;
        color:#ad1d3e;
        padding-left:20px;
    }
    td,th{
        padding:8px !important;
    }
    .btn-red{
        padding: 2px 20px;
        border-radius: 15px; 
        background:#ad1d3e;
        color:white;
        border-color: #ad1d3e;
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
</style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h1>RKA Tahunan</h1>
            <a class="btn btn-primary" href="#" id="btn-filter" data-toggle="modal"
            data-backdrop="static" data-target="#modalFilter" style="position: absolute;right: 15px;">Filter</a>
            
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                 <h5 class="pt-3">Pencapaian YoY</h5>
                <div class="card-body">
                    <table class='table' id='pencapaian'>
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th class='text-right'>Realisasi '<span class='thnLalu'>{{$tahunLalu}}</span></th>
                                <th class='text-right'>RKA '<span class='thnIni'>{{$tahun}}</span></th>
                                <th class='text-right'>Realisasi '<span class='thnIni'>{{$tahun}}</span></th>
                                <th class='text-right'>Pencapaian</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                 <h5 class="pt-3">RKA vs Realisais YTD</h5>
                <div class="card-body">
                    <div id='rkaVSreal' style='height:200px'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                 <h5 class="pt-3">Growth RKA</h5>
                <div class="card-body pt-0">
                    <ul class="nav nav-tabs mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Rp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">%</a>
                        </li>
                    </ul>
                    <div id='growthRKA' style='height:300px'></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                 <h5 class="pt-3">Growth Realisasi</h5>
                <div class="card-body pt-0">
                    <ul class="nav nav-tabs mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Rp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">%</a>
                        </li>
                    </ul>
                    <div id='growthReal' style='height:300px'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(2);
            // console.log(x);
            var tmp = x.toString().split('.');
            // console.dir(tmp);
            var y = tmp[1].substr(0,2);
            var z = tmp[0]+'.'+y;
            var parts = z.split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }else{
        return 0;
    }
}
function sepNumPas(x){
    var num = parseInt(x);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}

function toJuta(x) {
    var nil = x / 1000000;
    return sepNum(nil) + '';
}

function toMilyar(x) {
    var nil = x / 1000000000;
    return sepNum(nil) + ' M';
}

function singkatNilai(num){
    if(num < 0){
        num = num * -1;
    }
    
    if(num >= 1000 && num < 1000000){
        var str = 'Rb';
        var pembagi = 1000;
    }else if(num >= 1000000 && num < 1000000000){
        var str = 'Jt';
        var pembagi = 1000000;
    }else if(num >= 1000000000 && num < 1000000000000){
        var str = 'M';
        var pembagi = 1000000000;
    }else if(num >= 1000000000000){
        var str = 'T';
        var pembagi = 1000000000000;
    }
    
    if(num < 0){
        return (parseFloat(num/pembagi).toFixed(0) * -1) + ' ' +str;
    }else if (num > 0 && num >= 1000){
        return parseFloat(num/pembagi).toFixed(0) + ' ' +str;
    }else if(num > 0 && num < 1000){
        return num;
    }else{
        return num;
    }
}

function getPencapaianYoY(periode=null) {
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/getPencapaianYoY') }}/"+periode,
        dataType: "JSON",
        statusCode:{
            500: function(response){
                window.location="{{url('/dash-telu/sesi-habis')}}";
            }
        },
        success: function(result){
            var html='';
            var nama = ['Pendapatan','Beban','SHU','OR'];
            for(var i=0;i<result.data.data.length;i++){
            var line = result.data.data[i];
            if(line.kode_neraca == 'OR')
            {
                html+=`<tr>
                <td style='font-weight:bold'>`+nama[i]+`%</td>
                <td class='text-right'>`+sepNum(line.n1)+`%</td>
                <td class='text-right'>`+sepNum(line.n2)+`%</td>
                <td class='text-right'>`+sepNum(line.n3)+`%</td>
                <td class='text-right' style='color: #4CD964;font-weight:bold'></td>
                </tr>`;    
            }else{
                html+=`<tr>
                <td style='font-weight:bold'>`+nama[i]+`</td>
                <td class='text-right'>`+toMilyar(line.n1)+`</td>
                <td class='text-right'>`+toMilyar(line.n2)+`</td>
                <td class='text-right'>`+toMilyar(line.n3)+`</td>
                <td class='text-right' style='color: #4CD964;font-weight:bold'>`+sepNum(line.capai)+`%</td>
                </tr>`;
                            }
            }
            $('#pencapaian tbody').html(html);
        }
    });
}

function getGrowthReal(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/getGrowthReal') }}/"+periode,
        dataType:"JSON",
        statusCode:{
            500: function(response){
                window.location="{{url('/dash-telu/sesi-habis')}}";
            }
        },
        success:function(result){
            Highcharts.chart('growthReal', {
                chart: {
                        type: 'spline'
                    },
                        title: {
                            text: null
                    },
                        credits:{
                            enabled:false
                        },
                        yAxis: {
                            title: {
                                text: ''
                                },
                                labels: {
                                    formatter: function () {
                                        return singkatNilai(this.value);
                                    }
                                },
                        },
                        xAxis: {
                                // accessibility: {
                                //     rangeDescription: 'Range: 14 to 20'
                                // }
                                categories:result.data.ctg
                        },
                        plotOptions: {
                                // series: {
                                //     label: {
                                //         connectorAllowed: false
                                //     },
                                //     marker:{
                                //             enabled:false
                                //     }
                                //     // pointStart: 14
                                // },
                                spline: {
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+toMilyar(this.y)+'</b>';
                                        }
                                    },
                                    enableMouseTracking: false
                                }
                        },

                            series: result.data.series,

                            // responsive: {
                            //     rules: [{
                            //         condition: {
                            //             maxWidth: 500
                            //         }
                            //     }]
                            // }

            });

        }
    })
}

function getGrowthRKA(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/getGrowthRka') }}/"+periode,
        dataType:"JSON",
        success:function(result){
            Highcharts.chart('growthRKA', { 
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    // footerFormat: '</table>',
                    // shared: true,
                    // useHTML: true
                    formatter: function () {
                        return this.series.name+':<b>'+toMilyar(this.y)+'</b>';
                        }
                },
                yAxis: {
                    title: {
                        text: ''
                        },
                    labels: {
                        formatter: function () {
                        return singkatNilai(this.value);
                            }
                        },
                },
                xAxis: {
                    // accessibility: {
                    //     rangeDescription: 'Range: 14 to 20'
                    // }
                    categories:result.data.ctg
                },
                plotOptions: {
                            series: {
                                    dataLabels: {
                                    enabled: true,
                                    formatter: function () {
                                return '<b>'+toMilyar(this.y)+'</b>';
                            }
                        }
                    }
                 },

                series: result.data.series

                            // responsive: {
                            //     rules: [{
                            //         condition: {
                            //             maxWidth: 500
                            //         }
                            //     }]
                            // }

            });

        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getRkaVsReal(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/getRkaVsReal') }}/"+periode,
        dataType: "JSON",
        success: function(result){

            Highcharts.chart('rkaVSreal', {
                 chart: {
                            type: 'column',
                            renderTo: 'rkaVSreal'
                        },
                            title: {
                            text: null
                        },
                            credits:{
                            enabled:false
                        },
                            legend:{
                            enabled:false
                         },
                            xAxis: {
                                // categories: [
                                //     'Pendapatan',
                                //     'Beban',
                                //     'SHU'
                                // ],
                                categories: result.data.ctg,
                                crosshair: true
                            },
                            yAxis: {
                                title: {
                                    text: ''
                                },
                                labels: {
                                    formatter: function () {
                                        return singkatNilai(this.value);
                                    }
                                }
                            },
                            tooltip: {
                                // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                // footerFormat: '</table>',
                                // shared: true,
                                // useHTML: true
                                formatter: function () {
                                    return this.series.name+':<b>'+toMilyar(this.y)+'</b>';
                                }
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            // series: [{
                            //     name: 'RKA',
                            //     color:'#ad1d3e',
                            //     data: [49.9, 71.5, 106.4]

                            // }, {
                            //     name: 'Realisasi',
                            //     color:'#4c4c4c',
                            //     data: [83.6, 78.8, 98.5]

                            // }]
                            series : result.data.series
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

getPencapaianYoY("{{$periode}}");
getRkaVsReal("{{$periode}}");
getGrowthRKA("{{$periode}}");
getGrowthReal("{{$periode}}");
</script>