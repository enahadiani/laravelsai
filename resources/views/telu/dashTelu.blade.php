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
    <div class="row" >
        <div class="col-6">
            <div class="card">
                <h5>Pencapaian YoY</h5>
                <div class="card-body">
                    <table class='table' id='pencapaian'>
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th class='text-right'>Realisasi '<span class='thnLalu'></span></th>
                                <th class='text-right'>RKA '<span class='thnIni'></span></th>
                                <th class='text-right'>Realisasi '<span class='thnIni'></span></th>
                                <th class='text-right'>Pencapaian</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <h5>RKA vs Realisais YTD</h5>
                <div class="card-body">
                    <div id='rkaVSreal' style='height:200px'></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-6">
            <div class="card">
                <h5>Growth RKA</h5>
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
        <div class="col-6">
            <div class="card">
                <h5>Growth Realisasi</h5>
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

function getModul(periode=null) {
    $.ajax({
        type:"GET",
        url:"{{ url('/telu/getRKAVSReal') }}/"+periode,
        dataType: 'JSON',
        success: function(result){
            console.log(result)
        }
    });
}

getModul("{{$periode}}")

</script>