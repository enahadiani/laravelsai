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

    /* NAV TABS */
    .nav-tabs {
        border:none;
    }
    .border-white{
        stroke:white !important;
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

    #pencapaian > td, th 
    {
        padding: 4px !important;
    }
    .bold{
        font-weight:bold;
    }
    .table td{
        padding:4px !important;
    }
    .trace {
        cursor:pointer;
    }
    .card-header {
        padding: 0;
    }
    .card-title{
        margin-bottom:0 !important;
    }
    .progress {
        height:12px;
    }
    </style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h6 class="mb-0 bold">SD Taruna Bakti</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid gray;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Tahun Ajaran <span class="tahun_ajaran"></span> Semester <span class="semester"></span> </p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 col-12 mb-4">
            <div class="card">
                <div class="card-header px-4 pt-4 pb-0">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="card-title">Penilaian Kelas</h6>
                        </div>
                        <div class="col-md-4">
                            <select name="kode_tingkat" class="form-control" id="kode_tingkat">
                                <option value="">Pilih Kelas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 py-4">
                    <div id="nilai" style='height:350px'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4">
            <div class="card mb-3">
                <div class="card-header px-4 pt-4 pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title">Progress Penilaian</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 py-4">
                    <div id="progress-nilai" style='min-height:150px'>
                        
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header px-4 pt-4 pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="card-title">Komposisi Siswa</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 py-4">
                    <div id="komposisi" style='min-height:150px'></div>
                </div>
            </div>
        </div>
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
                            <label>Tahun Ajaran</label>
                            <select class="form-control" data-width="100%" name="kode_ta" id="kode_ta">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <select class="form-control selectize" data-width="100%" name="kode_sem" id="kode_sem">
                            <option value='1' selected>GANJIL</option>
                            <option value='2'>GENAP</option>
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
</div>
<script>
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
$('.selectize').selectize();
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
            var x = parseFloat(x).toFixed(1);
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

function getTahunAjaran(){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-master/tahun-ajaran') }}",
        dataType: "JSON",
        success: function(result){
            var select = $('#kode_ta').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    for(i=0;i<result.daftar.length;i++){
                        control.addOption([{text:result.daftar[i].kode_ta, value:result.daftar[i].kode_ta}]);
                    }
                }
                if("{{ Session::get('kode_ta') }}" != ""){
                    control.setValue("{{ Session::get('kode_ta') }}");
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
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}
function getTingkat(){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/tingkat') }}",
        dataType: "JSON",
        success: function(result){
            var select = $('#kode_tingkat').selectize();
            select = select[0];
            var control = select.selectize;
            if(result.data.status){
                if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                    for(i=0;i<result.data.data.length;i++){
                        control.addOption([{text:result.data.data[i].nama, value:result.data.data[i].kode_tingkat}]);
                    }
                    control.setValue("SD01");
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
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}
getTahunAjaran();
getTingkat();

function getPointCategoryName(point, dimension) {
    var series = point.series,
        isY = dimension === 'y',
        axis = series[isY ? 'yAxis' : 'xAxis'];
    return axis.categories[point[isY ? 'y' : 'x']];
}

function getPenilaian(kode_ta,kode_sem,kode_tingkat){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/chart-nilai') }}",
        data: {kode_ta : kode_ta, kode_sem: kode_sem, kode_tingkat: kode_tingkat},
        dataType:"JSON",
        success:function(result){

            Highcharts.chart('nilai', {
                chart: {
                    type: 'heatmap',
                    marginTop: 0,
                    marginBottom: 80,
                    plotBorderWidth: 1,
                    events: {
                        render: function () {
                            $('path').removeClass('highcharts-color-0');
                            $('path.highcharts-point').addClass('border-white');
                            $('path').removeClass('highcharts-point');
                        }
                    }
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: result.data.matpel
                },
                yAxis: {
                    categories: result.data.kelas,
                    title: null,
                    reversed: true
                },
                accessibility: {
                    point: {
                        descriptionFormatter: function (point) {
                            var ix = point.index + 1,
                                xName = getPointCategoryName(point, 'x'),
                                yName = getPointCategoryName(point, 'y'),
                                val = point.value;
                            return ix + '. ' + xName + ' sales ' + yName + ', ' + val + '.';
                        }
                    }
                },
                colorAxis: {
                    // min: 0,
                    // minColor: '#FFFFFF',
                    // maxColor: '#2ec4b6'
                    stops: [
                        [0, '#e71d36'],
                        [0.5, '#ff9f1c'],
                        [99, '#2ec4b6'],
                        [100, '#2ec4b6']
                    ],
                    min: 0,
                    max: 100,
                    startOnTick: true,
                    endOnTick: true
                },
                legend: {
                    align: 'right',
                    layout: 'vertical',
                    margin: 0,
                    verticalAlign: 'top',
                    y: 25,
                    symbolHeight: 280
                },
                tooltip: {
                    formatter: function () {
                        return '<b> Mata Pelajaran: ' + getPointCategoryName(this.point, 'x') + '</b> <br><b>Kelas: ' + getPointCategoryName(this.point, 'y') + '</b> <br><b>Progress Nilai: ' +this.point.value + '%</b>';
                    }
                },
                credits:{
                    enabled:false
                },
                series: [{
                    name: 'Nilai per Kelas',
                    borderWidth: 1,
                    data: result.data.data,
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        formatter: function(){
                            return this.point.value + '%';
                        }
                    }
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            yAxis: {
                                labels: {
                                    formatter: function () {
                                        return this.value.charAt(0);
                                    }
                                }
                            }
                        }
                    }]
                }

            });
            

        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getProgress(kode_ta,kode_sem){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/progress-nilai') }}",
        data: {kode_ta : kode_ta, kode_sem: kode_sem},
        dataType:"JSON",
        success:function(result){
            
            var html='';
            if(result.data.status){
                if(result.data.data.length > 0){
                    for(var i=0; i < result.data.data.length; i++){
                        var line = result.data.data[i];
                        var persen = (parseFloat(line.persen) > 100 ? 100 : parseFloat(line.persen).toFixed(2));
                        html+=`
                        <div class="row mb-2">
                            <div class="col-md-3">
                            `+line.nama+`
                            </div>
                            <div class="col-md-9">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: `+persen+`%;" aria-valuenow="`+persen+`" aria-valuemin="0" aria-valuemax="100">`+persen+`%</div>
                                </div>
                            </div>
                        </div>`;
                    }
                }
            }
            $('#progress-nilai').html(html);
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

function getKomposisi(kode_ta,kode_sem){
    $.ajax({
        type:"GET",
        url:"{{ url('sekolah-dash/komposisi-siswa') }}",
        data: {kode_ta : kode_ta, kode_sem: kode_sem},
        dataType:"JSON",
        success:function(result){
            
            $colors = result.data.colors;
            // Build the chart
            Highcharts.chart('komposisi', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    marginTop:0,
                    type: 'pie'
                },
                title: {
                    text: sepNumPas(parseFloat(result.data.total)),
                    align: 'center',
                    style: {
                        fontSize: '14px'
                    },
                    verticalAlign: 'middle',
                    y: -10,
                    x: 0
                },
                credits:{
                        enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                // colors: $colors,
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        size: '130%',
                        allowPointSelect: true,
                        cursor: 'pointer',
                        innerSize: '75%',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Komposisi siswa',
                    // colorByPoint: true,
                    data: result.data.data
                }]
            },function(){
                var series = this.series;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        for (var j = 0, je = points.length; j < je; ++j) {
                            if (points[j].graphic) {
                                points[j].graphic.element.style.fill = $colors[j];
                            }
                        }
                    }
            });

        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/sekolah-auth/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    })
}

$('.tahun_ajaran').text("{{ Session::get('kode_ta') }}");
$('.semester').text('Ganjil');
getPenilaian("{{ Session::get('kode_ta') }}","1","SD01");
getProgress("{{ Session::get('kode_ta') }}","1");
getKomposisi("{{ Session::get('kode_ta') }}","1");

$('#kode_tingkat').change(function(e){
    var kode_ta = $('#kode_ta')[0].selectize.getValue();
    var kode_tingkat = $('#kode_tingkat')[0].selectize.getValue();
    var kode_sem = $('#kode_sem')[0].selectize.getValue();
    getPenilaian(kode_ta,kode_sem,kode_tingkat);
});

$('#form-filter').submit(function(e){
    e.preventDefault();
    var kode_ta = $('#kode_ta')[0].selectize.getValue();
    var kode_tingkat = $('#kode_tingkat')[0].selectize.getValue();
    var kode_sem = $('#kode_sem')[0].selectize.getValue();
    var nama_ta = $('#kode_ta option:selected').text();
    var nama_sem = $('#kode_sem option:selected').text();
    getPenilaian(kode_ta,kode_sem,kode_tingkat);
    getProgress(kode_ta,kode_sem);
    getKomposisi(kode_ta,kode_sem);
    $('.tahun_ajaran').text(nama_ta);
    $('.semester').text(nama_sem);
    $('#modalFilter').modal('hide');
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