<style>
/* @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap'); */

@font-face {
    font-family: "Roboto";
    src: url("{{url('assets/fonts/Roboto/Roboto-Regular.ttf')}}");
}

body {
    font-family: 'Roboto', sans-serif !important;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: 'Roboto', sans-serif !important;
    font-weight: normal !important;
}
h2{
    margin-bottom: 5px;
    margin-top:5px;
}
.judul-box{
    font-weight:bold;
    font-size:18px !important;
}
.inner{
    padding:5px !important;
}

.box-nil{
    margin-bottom: 20px !important;
}

.pad-more{
    padding-left:10px !important;
    padding-right:0px !important;
}
.mar-mor{
    margin-bottom:10px !important;
}
.box-wh{
    box-shadow: 0 3px 3px 3px rgba(0,0,0,.05);
}
.small-box .icon{
    top: 0px !important;
    font-size: 20px !important;
}
.bg-white{
    background:white
}
.small-box .inner{
    background: white;
    border: 1px solid white;
    border-radius: 10px !important;
}
.small-box{
    border-radius:10px !important;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.widget-user-2 .widget-user-header {

    padding: 20px;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.icon-green {
    color:white;
    background: #00a65a;
    border: 1px solid #00a65a;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-blue {
    color:white;
    background: #0073b7;
    border: 1px solid #0073b7;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-purple {
    color:white;
    background: #605ca8 !important;
    border: 1px solid #605ca8 !important;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-pink {
    color:white;
    background: #d81b60;
    border: 1px solid #d81b60;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.box-footer {

border-top-left-radius: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
border-top: 1px solid #f4f4f4;
padding: 10px;
background-color: #fff;
box-shadow: 1px 2px 2px 2px #e6e0e0e6;

}

.box-nil{
    margin-bottom: 20px !important;
}

.icon{
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.judulBox:hover{
    color:#0073b7
}
</style>

<div class="container-fluid mt-3">
    <div class="row" >
        <div class="col-md-12 mb-2">
            <h3 style='position:absolute'>Dashboard</h3> 
            <button type='button' class='float-right' id='btn-refresh' style='border: 1px solid #d5d5d5;border-radius: 20px;padding: 5px 20px;background: white;'>Refresh
            </button>
        </div>
        <div class='col-md-12'>
                    <div class='row'>
                        <div class='col-md-12'>
                        <div class='card-group mb-3'>
                            <div class="card" id="card-aju">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="fas fa-balance-scale"></i></h3>
                                                    <p class="text-muted">Cash Balance</p>
                                                </div>
                                                <div class="ml-auto">
                                                    <h2 class="counter text-success" id="cash_balance"></h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress" id="prog_aju">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="card-aju">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="fas fa-chart-line"></i></h3>
                                                    <p class="text-muted">Pendapatan</p>
                                                </div>
                                                <div class="ml-auto">
                                                    <h2 class="counter text-danger" id="laba">23</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress" id="prog_aju">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="card-aju">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex no-block align-items-center">
                                                <div>
                                                    <h3><i class="fas fa-percent"></i></h3>
                                                    <p class="text-muted">Turn Over</p>
                                                </div>
                                                <div class="ml-auto">
                                                    <h2 class="counter text-primary" id="turn_over">23</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress" id="prog_aju">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row mb-2' >
                            <div class='col-md-6'>
                                <div class='card mar-mor box-wh' style='border-radius:5px'>
                                    <div class='card-body' style='padding: 0 10px 10px 10px;'>
                                        <div class="row">
                                            <div style='border: 1px solid #ff9500;padding: 5px;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background: #ff9500;color: white;width: 140px;cursor:pointer' class='col-md-6' id='topSellClick'>Top Selling
                                            </div>
                                            <div class='float-right col-md-6'>
                                                <style>
                                                .selectize-input{
                                                    border:none;
                                                    border-bottom:1px solid #8080806b;
                                                }
                                                </style>
                                                <select class='form-control input-sm selectize selectized' id='filterTS'>
                                                <option value='All' >All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class='col-md-12' style='margin-top:10px'>
                                                <table class='table no-margin' id='top_selling'>
                                                    <thead>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th colspan='2'>Sold(%)</th>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='card mar-mor box-wh' style='border-radius:5px'>
                                    <div class='card-body' style='padding: 0 10px 10px 10px;'>
                                        <div class="row">
                                            <div style='border: 1px solid #ff9500;padding: 5px;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background: #ff9500;color: white;width: 140px;cursor:pointer' class='col-md-6' id='SellCtgClick'>Selling Category</div>
                                            <div class='pull-right col-md-6'>
                                                <style>
                                                .selectize-input{
                                                    border:none;
                                                    border-bottom:1px solid #8080806b;
                                                }
                                                </style>
                                                <select class='form-control input-sm selectize selectized' id='filterSC'>
                                                <option value='DAYS' >DAYS</option>
                                                <option value='WEEKS' >WEEKS</option>
                                                <option value='MONTHS' >MONTHS</option>
                                                </select>
                                            </div>
                                            <div id='selling_category' class='col-md-12' style='margin-top:10px'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class='row'>     
                            <div class='col-md-6'>
                                <div class='card mar-mor box-wh' style='border-radius:5px'>
                                    <div class='card-body' style='padding: 0 10px 10px 10px;'>
                                        <div class="row">
                                            <div style='border: 1px solid #ff9500;padding: 5px;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background: #ff9500;color: white;width: 140px;cursor:pointer;height: 40px;' class='col-md-6' id='vendorClick'>Vendor Due Date</div>
                                            <div class='col-md-12' style='margin-top:10px'>
                                                <table class='table no-margin' id='vendor_duedate'>
                                                    <thead>
                                                        <th>Vendor</th>
                                                        <th>Value</th>
                                                        <th>Due Date</th>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class='col-md-6'>
                                <div class='card mar-mor box-wh' style='border-radius:5px'>
                                    <div class='card-body' style='padding: 0 10px 10px 10px;'>
                                        <div class="row">
                                            <div style='border: 1px solid #ff9500;padding: 5px;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background: #ff9500;color: white;width: 140px;cursor:pointer' class='col-md-6' id='missingClick'>Missing Stock</div>
                                            <div class='col-md-6 text-right' style='padding-right:0px'><h4 style='margin:10px' >1.03%</h4></div>
                                            <div id='missing_stock' class='col-md-12' style='margin-top:10px'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
<script>
var periode = "{{Session::get('periode')}}";

$('.card').on('click', '#btn-refresh', function(){
    location.reload();
});

function sepNum(x){
    var num = parseFloat(x).toFixed(2);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
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

function getTopSelling() {
    $.ajax({
        type: 'GET',
        url: "{{url('toko-dash/top-selling')}}/"+periode,
        dataType: 'json',
        async:false,
        success: function(result) {
            var html ='';
            for(var i=0;i<result.daftar.length;i++){
                html += `<tr>
                <td>`+result.daftar[i].nama+`</td>
                <td>`+result.daftar[i].jumlah+`</td>
                <td width='5%'><div style='position: absolute;'>80%</div></td>
                <td width='50%'>
                <div class='progress sm' style='position: relative;margin-left: 15px;'>
                <div class='progress-bar progress-bar-aqua' style='width: 80%'></div></div></td>
                </tr>`;
            }
            $('#top_selling tbody').html(html);
        }
    });
}

getTopSelling();

function getSellingCtg() {
    $.ajax({
        type: 'GET',
        url: "{{url('toko-dash/ctg-selling')}}/"+periode,
        dataType: 'json',
        async:false,
        success: function(result) {
            Highcharts.chart('selling_category', {
                chart: {
                        type: 'column',
                        height: (12 / 16 * 100) + '%' // 16:8 ratio
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        title: {
                            text: null
                        },
                        categories: result.ctg,
                    },
                    yAxis: {
                            min: 0,
                            title: {
                                text: ''
                            }
                    },
                    legend: {
                            reversed: true
                    },
                    plotOptions: {
                        series: {
                            stacking: 'normal'
                        }
                    },
                    credits:{
                        enabled:false
                    },
                    series: result.daftar
            });
        }
    });
}

getSellingCtg()

function getDataBox() {
    $.ajax({
        type: 'GET',
        url: "{{url('toko-dash/data-box')}}/"+periode,
        dataType: 'json',
        async:false,
        success: function(result) {
            $('#cash_balance').text(toJuta(parseFloat(result.daftar.cash)));
            $('#laba').text(toJuta(parseFloat(result.daftar.pend)));
            $('#turn_over').text('84,02%');
        }
    });
}

getDataBox()

function getTopVendor() {
    $.ajax({
        type: 'GET',
        url: "{{url('toko-dash/top-vendor')}}/"+periode,
        dataType: 'json',
        async:false,
        success: function(result) {
            var html ='';
            for(var i=0;i<result.daftar.length;i++){
            html += `<tr>
            <td width='50%'>`+result.daftar[i].nama+`</td>
            <td width='25%'>`+sepNumPas(result.daftar[i].total)+`</td>
            <td width='25%'>due date</td>
            </tr>`;
            }
            $('#vendor_duedate tbody').html(html);
        }
    });
}

getTopVendor();

function getMissingStock() {
    Highcharts.chart('missing_stock', {
                        chart: {
                            zoomType: 'x',
                            height: (10 / 16 * 100) + '%' // 16:8 ratio
                        },
                        title: {
                            text: ''
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: {
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'Mei',
                                'Jun',
                                'Jul',
                                'Ags',
                                'Sep',
                                'Okt',
                                'Nov',
                                'Des'
                            ],
                        },
                        yAxis: {
                            title: {
                                text: ''
                            }
                        },
                        legend: {
                            enabled: true
                        },
                        plotOptions: {
                            area: {
                                marker: {
                                    radius: 2
                                },
                                lineWidth: 1,
                                states: {
                                    hover: {
                                        lineWidth: 1
                                    }
                                },
                                threshold: null
                            }
                        },
                        credits:{
                            enabled:false
                        },
                        series: [{
                            name: 'Stock',
                            data: [3, 4, 3, 5, 4, 5,10, 12,0,0,0,0],
                            type:'areaspline'
                        }]
                    });
}

getMissingStock()

</script>