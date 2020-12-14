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

    #pencapaian > td, th 
    {
        padding: 4px !important;
    }
    .bold{
        font-weight:bold;
    }
    .dash-card{
        border-radius: 0.75rem !important;
    }
    .dash-card > .card-body{
        border-radius: 0.75rem !important;
        padding: 1.5rem !important;
    }
    .dash-card > .card-header{
        background: var(--theme-color-1);
        color:white;
        border-top-right-radius: 0.75rem;
        border-top-left-radius: 0.75rem;
        padding: 0.5rem 1.5rem;
    }
    .table td{
        padding:4px !important;
    }
    .trace {
        cursor:pointer;
    }
    </style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-0 bold">Telkom University Management System</h1>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Komparasi Anggaran dan Realisasi {{ $tahun }}</p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-4 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Profit and Loss</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-profit">
                        <tr class="trace ms-pend">
                            <td>Pendapatan</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr class="trace ms-beban">
                            <td>Beban</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr>
                            <td>SHU</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">FX Position</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-fx">
                        <tr>
                            <td>Asset</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr>
                            <td>Liability</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr>
                            <td>Net Asset Position</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Penyerapan Beban</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-penyerapan">
                        <tr class="trace ms-pengembangan">
                            <td >Pengembangan</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr>
                            <td>Operasional</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr>
                            <td>Non Operasional</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Debt</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-debt">
                        <tr>
                            <td>Mahasiswa</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr>
                            <td>NTF</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Kelola Keuangan</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-kelola">
                        <tr>
                            <td>Kas di Bank</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                        <tr>
                            <td>Kas Unit</td>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Penjualan PIN</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-pin">
                        <tr>
                            <td>1.000.000.000</td>
                            <td class='text-right text-success'>120%</td>
                        </tr>
                    </table>
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
</div>
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

function getPeriode(){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/periode') }}",
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

getPeriode();
function getPencapaianYoY(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPencapaianYoY') }}/"+periode,
        dataType: "JSON",
        success: function(result){
            var html='';
            var nama = ['Pendapatan','Beban','SHU','OR'];
            for(var i=0;i<result.data.data.length;i++)
            {
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
                }
                else{
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

function getGrowthReal(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getGrowthReal') }}/"+periode,
        dataType:"JSON",
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
                    categories:result.data.ctg
                },
                plotOptions: {
                    spline: {
                        dataLabels: {
                            enabled: true,
                            formatter: function () {
                                return '<b>'+sepNumPas(this.y)+' %</b>';
                            }
                        },
                        enableMouseTracking: false
                    },
                    column: {
                        dataLabels: {
                            padding:0,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'none',
                            formatter: function () {
                                return '<b>'+sepNumPas(this.y)+' %</b>';
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

function getGrowthRKA(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getGrowthRka') }}/"+periode,
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
                            padding:0,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'none',
                            formatter: function () {
                                return '<b>'+sepNumPas(this.y)+' %</b>';
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

function getRkaVsReal(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getRkaVsReal') }}/"+periode,
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
                    enabled:true
                },
                xAxis: {
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
                    formatter: function () {
                        return this.series.name+':<b>'+toMilyar(this.y)+'</b>';
                    }
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                        dataLabels: {
                            padding:0,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'none',
                            formatter: function () {
                                return '<b>'+toMilyar(this.y)+'</b>';
                            }
                        }
                    }
                },
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

// getPencapaianYoY("{{$periode}}");
// getRkaVsReal("{{$periode}}");
// getGrowthRKA("{{$periode}}");
// getGrowthReal("{{$periode}}");

$('#form-filter').submit(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    getPencapaianYoY(periode);
    getRkaVsReal(periode);
    getGrowthRKA(periode);
    getGrowthReal(periode);
    var tahun = parseInt(periode.substr(0,4));
    var tahunLalu = tahun-1;
    $('.thnLalu').text(tahunLalu);
    $('.thnIni').text(tahun);
    $('.periode-label').html(namaPeriode(periode));
    $('.bulan-label').html(namaPeriodeBulan(periode));
    $('.tahun-label').html(periode.substr(0,4));
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
$('.table').on('click','.ms-pend',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSPendapatan') }}";
    loadForm(url);
});
$('.table').on('click','.ms-beban',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSBeban') }}";
    loadForm(url);
});
$('.table').on('click','.ms-pengembangan',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSPengembangan') }}";
    loadForm(url);
});
</script>