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
    /* #modalFilter
    {
        top:90px
    }

    @media (max-width: 1439px) {
        #modalFilter
        {
            top:90px
        }
    }
    @media (max-width: 1199px) {
        #modalFilter
        {
            top:80px
        }
    }
    @media (max-width: 767px) {
        #modalFilter
        {
            top:70px
        }   
    }
    @media (max-width: 575px) {
        #modalFilter
        {
            top:70px
        }
    } */

    
    /* .modal-backdrop.show
    {
        opacity:0;
    }
    .modal-content{
        box-shadow: 0 1px 15px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);;
    } */
</style>
    <div class="row">
        <div class="col-12">
            <h1>Pertumbuhan Laba Rugi Tahunan</h1>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Realisasi Growth PDPT, Beban, SHU, Beban SDM
                <br> <span style="font-size:12px">Tahun 2014-2020</span>
                </h6>
                <div class="card-body p-2" id="trend2">
                   
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Realisasi Growth Tuition Fee - NON Tuition Fee
                </h6>
                <div class="card-body p-2" id="trend4">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Realisasi PDPT, Beban, SHU, Beban SDM
                   <br> <span style="font-size:12px">Tahun 2014-2020</span>
                </h6>
                <div class="card-body p-2" id="trend1">
                   
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Realisasi Tuition Fee - Non Tuition Fee
                <br> <span style="font-size:12px">Tahun 2014 - 2020</span>
                </h6>
                <div class="card-body p-2" id="trend3">
                   
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Realisasi Growth PDPT, Beban, SHU, Beban SDM
                2014-2020 (RKA)
                </h6>
                <div class="card-body p-2" id="trend21">
                   
                </div>
            </div>
        </div> -->
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group">
                            <label>Periode</label>
                            <select class="form-control" data-width="100%" name="periode" id="periode">
                                <option value='#'>Pilih Periode</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll ps">
                <h5 class="modal-title pl-0" style="position:absolute">Filter</h5>
                <button type="button" class="close" id="btn-close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="form-filter" style="margin-top:50px">
                    <div class="form-group" style="margin-bottom:30px">
                        <label>Periode</label>
                        <select class="form-control" data-width="100%" name="periode" id="periode">
                        <option value='#'>Pilih Periode</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary float-right ml-2">Tampilkan</button>
                    <button type="button" class="btn btn-outline-primary float-right" id="btn-reset">Reset</button>
                </form>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                    </div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<script>
 
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
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

function getBCGrowthRKA(){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/growth-rka') }}",
        dataType:"JSON",
        success: function(result){
            console.log(result)
            Highcharts.chart('trend2', {
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

function getBCTuition(){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/tuition') }}",
        dataType:"JSON",
        success:function(result){
            Highcharts.chart('trend3', { 
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
                        return this.series.name+':<b>'+sepNum(this.y)+'</b>';
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
                                return '<b>'+sepNum(this.y)+'</b>';
                            }
                        }
                    }
                 },

                series: result.data.series

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


function getBCGrowthTuition(){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/growth-tuition') }}",
        dataType:"JSON",
        success: function(result){
            Highcharts.chart('trend4', {
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
getBCGrowthRKA();
getBCGrowthTuition();
getBCRKA();
getBCTuition();
// $('.app-menu').hide();
// google.charts.load('current', {packages: ['corechart','line']});
// google.charts.setOnLoadCallback(drawGoogleChart);
// function drawGoogleChart() {
//     var data = new google.visualization.arrayToDataTable([
//         ['Periode', 'Pendapatan',{ role: 'annotation'}, 'Beban', { role: 'annotation'},'SDM', { role: 'annotation'},'SHU',{ role: 'annotation'}],
//         ['2015', 44.08, '44.08', 18.36, '18.36', 19.11, '19.11',25.72, '25.72'],
//         ['2016', 63.03, '63.03', 52.4, '52.4', 24.2, '24.2', 10.63, '10.63'],
//         ['2017', 60.37, '63.37', 29.51, '29.51', 17.93, '17.93',30.86, '30.86'],
//         ['2018', 53.38, '53.38', 57.42, '57.42', 34.56, '34.5', 0.97, '0.97'],
//         ['2019', 48.46, '48.46', 39.66, '39.66', 19.08, '19.08', 8.8, '8.8'],
//         ['2020', 20.92, '20.92', 18.25, '18.25', 18.16, '18.16', 2.67, '2.67'],
//     ]);

//     var options = {
//         legend: { position: 'bottom', alignment:'center' ,maxLines: 4 },
//         chart: {
//           title: null,
//           subtitle: null
//         },
//         height: 500,
//         width: 540,
//         chartArea: {'width': '90%', 'height': '90%'},
//         axes: {
//           x: {
//             0: {side: 'top'}
//           }
//         }
//     }

//     var chart = new google.visualization.LineChart(document.getElementById('trend21'));

//     chart.draw(data, options);
// }
   
$('#btn-filter').click(function(){
    // console.log('ok');
    // if ($(".app-menu").hasClass("shown")) {
    //     $(".app-menu").removeClass("shown");
    //     console.log("sudah");
    // } else {
    //     $('.app-menu').addClass('shown');
    //     console.log("belum");
    // }
    // $('.app-menu').show();
    
    $('#modalFilter').modal('show');
    // var x = $('.app-menu');
    // console.log(x);
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    // if ($(".app-menu").hasClass("shown")) {
    //     $(".app-menu").removeClass("shown");
    // } else {
    //     $(".app-menu").addClass("shown");
    // }
    
    // $('.app-menu').hide();
    
    $('#modalFilter').modal('hide');
});


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