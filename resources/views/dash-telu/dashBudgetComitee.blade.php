<style>
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
</style>
<div class="container-fluid mt-3">
    <div class="row mb-3">
        <div class="col-12">
            <h6>Pertumbuhan Laba Rugi Tahunan</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>s.d <span class='tahun'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Realisasi Growth PDPT, Beban, SHU, Beban SDM</h6>
                    <span style="font-size:12px">Tahun <span class="rentang-tahun"></span></span>
                </div>
                <div class="card-body">
                    <div id="trend2"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title">Realisasi Growth Tuition Fee - NON Tuition Fee</h6>
                    <span style="font-size:12px">Tahun <span class="rentang-tahun"></span></span>
                </div>
                <div class="card-body">
                    <div id="trend4"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-9 col-sm-12 px-0">Realisasi PDPT, Beban, SHU, Beban SDM
                        <br> <span style="font-size:12px">Tahun <span class="rentang-tahun"></span></span>
                        </h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-3 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab3-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>%</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab3-rp" role="tabpanel">
                            <div id="trend1"></div>
                        </div>
                        <div class="tab-pane" id="tab3-persen" role="tabpanel">
                            <div id="trend1-persen"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-9 col-sm-12 px-0">Realisasi Tuition Fee - Non Tuition Fee
                        <br> <span style="font-size:12px">Tahun <span class="rentang-tahun"></span></span>
                        </h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-3 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab4-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>%</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab4-rp" role="tabpanel">
                            <div id="trend3"></div>
                        </div>
                        <div class="tab-pane" id="tab4-persen" role="tabpanel">
                            <div id="trend3-persen"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h6 class="ml-3 mt-4">Realisasi Growth PDPT, Beban, SHU, Beban SDM
                <span class="rentang-tahun"></span> (RKA)
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
                            <label>Tahun</label>
                            <select class="form-control" data-width="100%" name="periode" id="periode">
                                <option value='#'>Pilih Tahun</option>
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
                <h6 class="modal-title pl-0" style="position:absolute">Filter</h6>
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
</div>
<script>
 
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btn-filter').removeClass('btn-outline-light');
    $('#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btn-filter').removeClass('btn-outline-dark');
    $('#btn-filter').addClass('btn-outline-light');
}

var $mode = localStorage.getItem("dore-theme");
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

function getTahun(){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/tahun') }}",
        dataType: "JSON",
        success: function(result){
            var select = $('#periode').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.data.status){
                if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                    for(i=0;i<result.data.data.length;i++){
                        control.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                    }
                }
                if("{{ Session::get('periode') }}" != ""){
                    control.setValue("{{ Session::get('periode') }}".substr(0,4));
                }
            }
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

getTahun();


function getBCRKA(tahun){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/rka') }}",
        data:{ tahun: tahun, mode: $mode},
        dataType:"JSON",
        success: function(result){
            Highcharts.chart('trend1', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+toMilyar(this.y)+' M</b>';
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
                    categories:result.data.ctg
                },
                plotOptions: {
                    // line: {
                    //     dataLabels: {
                    //         enabled: true,
                    //         formatter: function () {
                    //             return '<b>'+sepNumPas(this.y)+' M</b>';
                    //         }
                    //     },
                    //     // enableMouseTracking: false
                    // },
                    spline: {
                        dataLabels: {
                            // padding:15,
                            // x:20,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(toMilyar(this.y)+'%')[0].outerHTML;
                            }
                        }
                        // enableMouseTracking: false
                    },
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

function getBCRKAPersen(tahun){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/rka-persen') }}",
        dataType:"JSON",
        data:{mode: $mode, tahun: tahun},
        success: function(result){
            Highcharts.chart('trend1-persen', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+' %</b>';
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
                    categories:result.data.ctg
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
                            // padding:15,
                            // x:20,
                            padding:0,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'none',
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNumPas(this.y)+'%')[0].outerHTML;
                            }
                        }
                        // enableMouseTracking: false
                    },
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

function getBCGrowthRKA(tahun){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/growth-rka') }}",
        data:{ tahun: tahun, mode: $mode},
        dataType:"JSON",
        success: function(result){
            Highcharts.chart('trend2', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+' %</b>';
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
                    categories:result.data.ctg
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
                            // padding:15,
                            // x:20,
                            padding:0,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'none',
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNumPas(this.y)+'%')[0].outerHTML;
                            }
                        }
                        // enableMouseTracking: false
                    },
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

function getBCTuition(tahun){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/tuition') }}",
        dataType:"JSON",
        data:{ tahun: tahun, mode: $mode},
        success:function(result){
            Highcharts.chart('trend3', { 
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+toMilyar(this.y)+' M</b>';
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
                    categories:result.data.ctg
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' M</b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 3px',
                                    'font-size':'10px',
                                    'backgroundColor' : this.series.color  // just white in my case
                                }).text(toMilyar(this.y))[0].outerHTML;
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

function getBCTuitionPersen(tahun){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/tuition-persen') }}",
        dataType:"JSON",
        data:{ tahun: tahun, mode: $mode},
        success:function(result){
            Highcharts.chart('trend3-persen', { 
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+' %</b>';
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
                    categories:result.data.ctg
                },
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' M</b></span>';
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 3px',
                                    'font-size':'10px',
                                    'backgroundColor' : this.series.color  // just white in my case
                                }).text(sepNumPas(this.y)+'M')[0].outerHTML;
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


function getBCGrowthTuition(tahun){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/growth-tuition') }}",
        dataType:"JSON",
        data:{ tahun: tahun, mode: $mode},
        success: function(result){
            Highcharts.chart('trend4', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    formatter: function () {
                        return this.series.name+':<b>'+sepNumPas(this.y)+' %</b>';
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
                    categories:result.data.ctg
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
                            // padding:15,
                            // x:20,
                            padding:0,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'none',
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNumPas(this.y)+'%')[0].outerHTML;
                            }
                        }
                        // enableMouseTracking: false
                    },
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

var tahun = "{{ Session::get('periode') }}".substr(0,4);
var tahunLima = parseInt(tahun) - 6;
$('.rentang-tahun').text(tahunLima+" - "+tahun);
$('.tahun').text(tahun);
getBCGrowthRKA(tahun);
getBCGrowthTuition(tahun);
getBCRKA(tahun);
getBCRKAPersen(tahun);
getBCTuition(tahun);
getBCTuitionPersen(tahun);
   

$('#form-filter').submit(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    var tahun = periode;
    var tahunLima = parseInt(tahun) - 6;
    $('.rentang-tahun').text(tahunLima+" - "+tahun);
    $('.tahun').text(tahun);
    getBCGrowthRKA(tahun);
    getBCGrowthTuition(tahun);
    getBCRKA(tahun);
    getBCRKAPersen(tahun);
    getBCTuition(tahun);
    getBCTuitionPersen(tahun);
    $('#modalFilter').modal('hide');
    // $('.app-menu').hide();
    if ($(".app-menu").hasClass("shown")) {
        $(".app-menu").removeClass("shown");
    } else {
        $(".app-menu").addClass("shown");
    }
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#periode')[0].selectize.setValue('');
    
});

$('#btn-filter').click(function(){
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    $('#modalFilter').modal('hide');
});

</script>