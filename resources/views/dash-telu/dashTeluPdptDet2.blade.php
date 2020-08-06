@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');  
$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2);    
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
        padding:4px !important;
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
    <div class="row" >
        <div class="col-12 text-right">
            <button class='btn btn-red btn-sm' id='btnBack'>Back</button>
        </div>
    </div>
    <div class="row mt-2" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card">
                <h5 class="pt-3">Pendapatan per tahun tiap Jurusan Fakultas <span class='nama_fakultas'></span></h5>
                <div class="card-body pt-0">
                    <div id='pdptJur' style='height:350px'>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card" style="background:#f5f5f5;border-radius:15px">
                <h5 class="mt-2">Pendapatan <span class='tahunPilih'></span></h5>
                <div class="card-body pt-0">
                    <table class='no-border' id='tablePend' style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-right">RKA '<span class='thnPilih'></span></th>
                                <th class="text-right">Realisasi '<span class='thnPilih'></span></th>
                                <th class="text-right">Pencapaian</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                    <button type="button" class="btn btn-outline-primary"
                    data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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

function getDataPendJurusan(periode=null,kodeNeraca=null,kodeBidang=null,tahun=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/getDataPendJurusan') }}/"+periode+"/"+kodeNeraca+"/"+kodeBidang+"/"+tahun,
        dataType:"JSON",
        statusCode:{
            500: function(response){
                window.location="{{url('/dash-telu/login')}}";
            }
        },
        success:function(result){
                var html='';
                for(var i=0;i<result.daftar.length;i++){
                    var line = result.daftar[i];
                            
                     html+=`<tr>
                            <td style='font-weight:bold'>`+line.nama+`</td>
                            <td class='text-right'>`+toMilyar(line.n4)+`</td>
                            <td class='text-right'>`+toMilyar(line.n5)+`</td>
                            <td class='text-right'>`+sepNum(line.capai)+`%</td>
                            </tr>`;     
                }
            $('#tablePend tbody').html(html);
        }
    })
}

function getPendapatanJurusan(periode=null,kodeNeraca=null,kodeBidang=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/dash-telu/getPendapatanJurusan') }}/"+periode+"/"+kodeNeraca+"/"+kodeBidang,
        dataType:"JSON",
        statusCode:{
            500: function(response){
                window.location="{{url('/dash-telu/login')}}";
            }
        },
        success:function(result){
            Highcharts.chart('pdptJur', {
                chart: {
                        type: 'bar'
                    },
                        title: {
                        text: null
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
                                },
                        },
                        credits:{
                                enabled:false
                        },
                        tooltip: {
                                // headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                // pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                //     '<td style="padding:0"><b>{point.y:.2f}</b></td></tr>',
                                // footerFormat: '</table>',
                                // // shared: true,
                                // useHTML: true
                                formatter: function () {
                                    return this.series.name+':<b>'+toMilyar(this.y)+'</b>';
                                }
                        },
                        plotOptions: {
                                bar: {
                                    pointPadding: 0.2,
                                    borderWidth: 0,
                                    cursor: 'pointer',
                                    point: {
                                        events: {
                                            click: function() {  
                                                $kd2 = this.options.key;
                                                
                                            }
                                        }
                                    }
                                }
                        },
                        series: result.data.series
            });
        }
    })
}

getPendapatanJurusan("{{$periode}}",$kd,$kd3)
getDataPendJurusan("{{$periode}}",$kd,$kd3,"{{$tahun}}")

$('.tahunPilih').text('20'+$kd2);
$('.thnPilih').text($kd2);

$('.container-fluid').on('click','#btnBack',function(e){
    var url = "{{ url('/dash-telu/form/dashTeluPdptDet') }}";
    loadForm(url);
})
</script>