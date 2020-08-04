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
    
</style>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body p-2" id="trend1">
                   
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body p-2" id="trend2">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body p-2" id="trend3">
                   
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <div class="card-body p-2" id="trend4">
                   
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


function getBCRKA(){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/rka') }}",
        dataType:"JSON",
        success: function(result){
            Highcharts.chart('trend1', {
                chart: {
                        type: 'line'
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
                                categories:result.data.ctg
                        },
                        plotOptions: {
                                line: {
                                    dataLabels: {
                                        enabled: true,
                                        formatter: function () {
                                            return '<b>'+sepNum(this.y)+'</b>';
                                        }
                                    },
                                    enableMouseTracking: false
                                }
                            },
                            series: result.data.series
            });
        }
    })
}

getBCRKA();

</script>
<!--Load the AJAX API-->
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script type="text/javascript">

// Load the Visualization API and the piechart package.
// google.charts.load('current', {'packages':['corechart']});

// // Set a callback to run when the Google Visualization API is loaded.
// google.charts.setOnLoadCallback(drawChart);

// function drawChart() {
//     var jsonData = $.ajax({
//         url: "{{ url('/dash-telu/rka') }}",
//         dataType: "json",
//         async: false
//     }).responseText;
    
//     // Create our data table out of JSON data loaded from server.
//     var data = new google.visualization.DataTable(jsonData);
    
//     // Instantiate and draw our chart, passing in some options.
//     var chart = new google.visualization.LineChart(document.getElementById('trend1'));
//     chart.draw(data, {width: 400, height: 240});
// }

</script>