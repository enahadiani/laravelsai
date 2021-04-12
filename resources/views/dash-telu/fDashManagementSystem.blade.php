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
    .table td{
        padding:4px !important;
    }
    .trace {
        cursor:pointer;
    }
    .col-grid{
        display:grid;
    }
    </style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h6 class="mb-0 bold">Telkom University Management System</h6>
            <a class="btn" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-4 col-12 mb-4 col-grid">
            <div class="card dash-card card-labarugi">
                <div class="card-header">
                    <h6 class="card-title mb-0">Laba Rugi</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-profit" >
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4 col-grid">
            <div class="card dash-card card-neraca">
                <div class="card-header">
                    <h6 class="card-title mb-0">Posisi Neraca</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-fx" >
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4 col-grid">
            <div class="card dash-card card-beban">
                <div class="card-header">
                    <h6 class="card-title mb-0">Penyerapan Beban</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-penyerapan" >
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4 col-grid">
            <div class="card dash-card card-piutang">
                <div class="card-header">
                    <h6 class="card-title mb-0">Piutang</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-debt" >
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4 col-grid">
            <div class="card dash-card card-keuangan">
                <div class="card-header">
                    <h6 class="card-title mb-0">Keuangan</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-kelola" >
                        
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12 mb-4 col-grid">
            <div class="card dash-card card-daftar">
                <div class="card-header">
                    <h6 class="card-title mb-0">Investasi</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-pin" >
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 380px;">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row dash-filter">
                            <p class="dash-kunci" hidden>dash_periode</p> 
                            <label class="col-md-12">Periode</label>
                            <div class="col-md-4 dash-filter-typediv">
                                <select class="form-control dash-filter-type" data-width="100%" name="periode[]" id="periode_type">
                                    <option value='' disabled>Pilih</option>
                                    <option value='='>=</option>
                                    <option value='<='><=</option>
                                    <option value='range'>Range</option>
                                </select>
                            </div>
                            <div class="col-md-12 dash-filter-from">
                                <select class="form-control" data-width="100%" name="periode[]" id="periode_from">
                                    <option value='' disabled>Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-4 dash-filter-to">
                                <select class="form-control" data-width="100%" name="periode[]" id="periode_to">
                                    <option value='' disabled>Pilih</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none;position:absolute;bottom:0;justify-content:flex-end;width:100%">
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
var $kode_grafik = "";
var $nama = "";
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btn-filter').removeClass('btn-outline-light');
    $('#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btn-filter').removeClass('btn-outline-dark');
    $('#btn-filter').addClass('btn-outline-light');
}
function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            // var x = parseFloat(x).toFixed(2);
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
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(0);
            // console.log(x);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }else{
        return 0;
    }
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
            $('#periode_type').selectize();
            var select = $("#periode_from").selectize();
            select = select[0];
            var control = select.selectize;

            var select2 = $("#periode_to").selectize();
            select2 = select2[0];
            var control2 = select2.selectize;
            if(result.data.status){
                if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                    for(i=0;i<result.data.data.length;i++){
                        control.addOption([{text:result.data.data[i].nama, value:result.data.data[i].periode}]);
                        control2.addOption([{text:result.data.data[i].nama, value:result.data.data[i].periode}]);
                    }
                }

                $('.dash-filter-typediv').hide();
                $('#periode_to').closest('div.dash-filter-to').hide();
                $('#periode_from').closest('div.dash-filter-from').removeClass('col-md-4').addClass('col-md-8');

                if($dash_periode.type == ""){
                    $dash_periode.type = "=";
                }
                
                $('#periode_type')[0].selectize.setValue($dash_periode.type);

                switch($dash_periode.type){
                    case '=':
                        var label = 'Periode '+namaPeriode($dash_periode.from);
                        if($dash_periode.from == ""){
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.from = result.data.periode_max;
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                    case '<=':
                        
                        var label = 'Periode s.d '+namaPeriode($dash_periode.from);
                    break;
                    case 'range':
                        
                        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);
                        if($dash_periode.from == ""){
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.from = result.data.periode_max;
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');

                    break;
                    default:
                        if($dash_periode.from == ""){
                            if(result.data.periode_max != ""){
                                control.setValue(result.data.periode_max);
                                $dash_periode.from = result.data.periode_max;
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                        break;
                }
                $('.label-periode-filter').html(label);
                getProfitLoss($dash_periode);
                getFxPosition($dash_periode);
                getPenyerapan($dash_periode);
                getDebt($dash_periode);
                getKelola($dash_periode);
                getPin($dash_periode);

                        
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

$('.dash-filter').on('change', '.dash-filter-type', function(){
    var type = $(this).val();
    var kunci = $(this).closest('div.dash-filter').find('.dash-kunci').text();
    var tmp = kunci.split("_");
    var kunci2 = tmp[1];
    var field = eval('$'+kunci);
    console.log(type,kunci,kunci2);
    switch(type){
        case "=": 
        case "<=":
            $(this).closest('div.dash-filter').find('.dash-filter-from').removeClass('col-md-4');
            $(this).closest('div.dash-filter').find('.dash-filter-from').addClass('col-md-8');
            $(this).closest('div.dash-filter').find('.dash-filter-from #'+kunci2+"_from")[0].selectize.setValue(field.from);
            $(this).closest('div.dash-filter').find('.dash-filter-to').hide();
            field.type = type;
            field.from = field.from;
            field.to = "";
        break;
        case "range":
            
            field.type = type;
            field.from = field.from;
            field.to = field.to;
            
            $(this).closest('div.dash-filter').find('.dash-filter-from').removeClass('col-md-8');
            $(this).closest('div.dash-filter').find('.dash-filter-from').addClass('col-md-4');
            $(this).closest('div.dash-filter').find('.dash-filter-from #'+kunci2+"_from")[0].selectize.setValue(field.from);
            $(this).closest('div.dash-filter').find('.dash-filter-to #'+kunci2+"_to")[0].selectize.setValue(field.to);
            $(this).closest('div.dash-filter').find('.dash-filter-to').show();
        break;
    }
});

function getProfitLoss(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/profit-loss') }}",
        data: {
            'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to
        },
        dataType: "JSON",
        success: function(result){
            var html='';
            if(result.data.data.length > 0){

                for(var i=0;i<result.data.data.length;i++)
                {
                    var line = result.data.data[i];
                    // if(line.nama != "Beban"){
                    //     var rka = toMilyar(parseFloat(line.rka)*-1);
                    //     var real = toMilyar(parseFloat(line.real)*-1);
                    // }else{
                        
                        var rka = toMilyar(parseFloat(line.rka));
                        var real = toMilyar(parseFloat(line.real));
                    // }
                    var persen = sepNum(parseFloat(line.persen));
                    if(i == 0){

                        html+=`<tr>
                        <td></td>
                        <td class='text-center'>RKA s.d.</td>
                        <td class='text-center'>Real</td>
                        <td class='text-center'>%</td>
                        </tr>`;   
                    }
                    html+=`<tr class='trace ms-`+i+`'>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+rka+`</td>
                    <td class='text-right'>`+real+`</td>
                    <td class='text-right text-success' >`+persen+`%</td>
                    </tr>`;   
                }
            }
            $('.table-profit').html(html);
            $('.card-labarugi').animate({
                minHeight: "200px"
                }, {
                queue: false,
                duration: 1000
            })

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

function getFxPosition(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/fx-position') }}",
        data:  {
            'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to
        },
        dataType: "JSON",
        success: function(result){

            var html='';
            if(result.data.data.length > 0){

                for(var i=0;i<result.data.data.length;i++)
                {
                    var line = result.data.data[i];
                    
                    if(line.nama != "Aset"){
                        var real = toMilyar(parseFloat(line.real));
                        var real_lalu = toMilyar(parseFloat(line.real_lalu));
                        // var persen = (parseFloat(line.real)/parseFloat(result.data.data[0].real))*-100;
                    }else{
                        // var persen = 100;
                        var real = toMilyar(parseFloat(line.real));
                        var real_lalu = toMilyar(parseFloat(line.real_lalu));
                    }
                    
                    if(i == 0){
                        var bulan = $dash_periode.from.substr(4,2);
                        var thn_ini = parseInt($dash_periode.from.substr(0,4));
                        var thn_lalu = thn_ini-1;
                        html+=`<tr>
                        <td></td>
                        <td class='text-center'>`+thn_lalu+''+bulan+`</td>
                        <td class='text-center'>`+thn_ini+''+bulan+`</td>
                        <td class='text-center'>YoY</td>
                        </tr>`;   
                    }
                    html+=`<tr class='trace neraca-`+i+`' data-kode_grafik='`+line.kode_grafik+`' data-nama='`+line.nama+`'>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+real_lalu+`</td>
                    <td class='text-right'>`+real+`</td>
                    <td class='text-right text-success' >`+sepNumPas(line.persen)+`%</td>
                    </tr>`;   
                }
            }
            $('.table-fx').html(html);
            $('.card-neraca').animate({
                minHeight: "200px"
                }, {
                queue: false,
                duration: 1000
            })
            
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

function getPenyerapan(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/penyerapan-beban') }}",
        data:  {
            'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to
        },
        dataType: "JSON",
        success: function(result){

            var html='';
            if(result.data.data.length > 0){

                for(var i=0;i<result.data.data.length;i++)
                {
                    var line = result.data.data[i];
                    var rka = toMilyar(parseFloat(line.rka));
                    var real = toMilyar(parseFloat(line.real));
                    var persen = sepNumPas(parseFloat(line.persen));
                    if(i == 0){

                        html+=`<tr>
                        <td></td>
                        <td class='text-center'>RKA s.d.</td>
                        <td class='text-center'>Real</td>
                        <td class='text-center'>%</td>
                        </tr>`;   
                    }
                    html+=`<tr class='trace serap-`+i+` penyerapan' data-kode_grafik='`+line.kode_grafik+`' data-nama='`+line.nama+`'>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+rka+`</td>
                    <td class='text-right'>`+real+`</td>
                    <td class='text-right text-success' >`+persen+`%</td>
                    </tr>`;   
                }

            }
            $('.table-penyerapan').html(html);
            $('.card-beban').animate({
                minHeight: "200px"
                }, {
                queue: false,
                duration: 1000
            })
            
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

function getDebt(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/debt') }}",
        data:  {
            'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to
        },
        dataType: "JSON",
        success: function(result){
            

            var html='';
            if(result.data.data.length > 0){
                var persen =0;

                for(var i=0;i<result.data.data.length;i++)
                {
                    var line = result.data.data[i];
                    
                    var real = toMilyar(parseFloat(line.real));
                    var real_lalu = toMilyar(parseFloat(line.real_lalu));
                    var persen = (parseFloat(line.real)/parseFloat(result.data.total))*100;
                    
                    if(i == 0){
                        var bulan = $dash_periode.from.substr(4,2);
                        var thn_ini = parseInt($dash_periode.from.substr(0,4));
                        var thn_lalu = thn_ini-1;
                        html+=`<tr>
                        <td></td>
                        <td class='text-center'>`+thn_ini+''+bulan+`</td>
                        <td class='text-center'>%</td>
                        <td class='text-center'>YoY</td>
                        </tr>`;   
                    }
                    html+=`<tr class='trace piutang-`+i+` piutang-detail' data-kode_grafik='`+line.kode_grafik+`' data-nama='`+line.nama+`'>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+real+`</td>
                    <td class='text-right'>`+sepNum(persen)+`%</td>
                    <td class='text-right text-success' >`+sepNumPas(line.yoy)+`%</td>
                    </tr>`;   
                }
                html+=`<tr>
                    <td class='bold'>Sub Total</td>
                    <td class='text-right bold'>`+toMilyar(result.data.total)+`</td>
                    <td class='text-right bold'>100%</td>
                    <td class='text-right bold text-success' ></td>
                    </tr>`;  
            }
            $('.table-debt').html(html);
            $('.card-piutang').animate({
                minHeight: "200px"
                }, {
                queue: false,
                duration: 1000
            })

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

function getKelola(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/kelola-keuangan') }}",
        data:  {
            'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to
        },
        dataType: "JSON",
        success: function(result){
            
            var html='';
            if(result.data.data.length > 0){
                
                for(var i=0;i<result.data.data.length;i++)
                {
                    var line = result.data.data[i];
                    
                    var real = toMilyar(parseFloat(line.real));
                    var real_lalu = toMilyar(parseFloat(line.real_lalu));
                    
                    if(i == 0){
                        var bulan = $dash_periode.from.substr(4,2);
                        var thn_ini = parseInt($dash_periode.from.substr(0,4));
                        var thn_lalu = thn_ini-1;
                        html+=`<tr>
                        <td></td>
                        <td class='text-center'>`+thn_ini+''+bulan+`</td>
                        <td class='text-center'>YoY</td>
                        </tr>`;   
                    }
                    html+=`<tr class='trace keuangan-`+i+` keuangan-detail' data-kode_grafik='`+line.kode_grafik+`' data-nama='`+line.nama+`'>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+real+`</td>
                    <td class='text-right text-success' >`+sepNumPas(line.yoy)+`%</td>
                    </tr>`;   
                }
                html+=`<tr>
                    <td class='bold'>Sub Total</td>
                    <td class='text-right bold'>`+toMilyar(result.data.total)+`</td>
                    <td class='text-right bold text-success' ></td>
                    </tr>`;  
            }
            $('.table-kelola').html(html);
            $('.card-keuangan').animate({
                minHeight: "200px"
                }, {
                queue: false,
                duration: 1000
            })

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

function getPin(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/penjualan-pin') }}",
        data:  {
            'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to
        },
        dataType: "JSON",
        success: function(result){
            var html='';
            if(result.data.data.length > 0){
                
                for(var i=0;i<result.data.data.length;i++)
                {
                    var line = result.data.data[i];
                    var rka = toMilyar(parseFloat(line.rka));
                    var real = toMilyar(parseFloat(line.real));
                    var persen = sepNumPas(parseFloat(line.persen));
                    if(i == 0){

                        html+=`<tr>
                        <td></td>
                        <td class='text-center'>RKA THN</td>
                        <td class='text-center'>Real</td>
                        <td class='text-center'>%</td>
                        </tr>`;   
                    }
                    html+=`<tr class='trace serap-`+i+`'>
                    <td>`+line.nama+`</td>
                    <td class='text-right'>`+rka+`</td>
                    <td class='text-right'>`+real+`</td>
                    <td class='text-right text-success' >`+persen+`%</td>
                    </tr>`;   
                }
                html+=`<tr>
                    <td class='bold'>Sub Total</td>
                    <td class='text-right bold'>`+toMilyar(result.data.total_rka)+`</td>
                    <td class='text-right bold'>`+toMilyar(result.data.total_real)+`</td>
                    <td class='text-right bold text-success' ></td>
                    </tr>`;  
            }
            $('.table-pin').html(html);
            
            $('.card-daftar').animate({
                minHeight: "200px"
                }, {
                queue: false,
                duration: 1000
            })
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

$('#form-filter').submit(function(e){
    e.preventDefault();
    $dash_periode.type = $('#periode_type')[0].selectize.getValue();
    $dash_periode.from = $('#periode_from')[0].selectize.getValue();
    $dash_periode.to = $('#periode_to')[0].selectize.getValue();
    $filter_periode = $dash_periode.from;
    switch($dash_periode.type){
        case '=':
            var label = 'Periode '+namaPeriode($dash_periode.from);    
        break;
        case '<=':
            
            var label = 'Periode s.d '+namaPeriode($dash_periode.from);
        break;
        case 'range':
            
            var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);

        break;
    }
    $('.label-periode-filter').html(label);

    getProfitLoss($dash_periode);
    getFxPosition($dash_periode);
    getPenyerapan($dash_periode);
    getDebt($dash_periode);
    getKelola($dash_periode);
    getPin($dash_periode);
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
    $('#dash-periode')[0].selectize.setValue('');
    
});
   
$('#btn-filter').click(function(){
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    
    $('#modalFilter').modal('hide');
});

$('.table').on('click','.ms-0',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSPendapatan') }}";
    loadForm(url);
});
$('.table').on('click','.ms-1',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSBeban') }}";
    loadForm(url);
});

$('.table').on('click','.ms-2',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSSHU') }}";
    loadForm(url);
});

$('.table').on('click','.penyerapan',function(e){
    $kode_grafik = $(this).data('kode_grafik');
    $nama = $(this).data('nama');
    var url = "{{ url('/dash-telu/form/fDashMSPengembangan') }}";
    loadForm(url);
});


$('.table').on('click','.neraca-0',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSAset') }}";
    loadForm(url);
});

$('.table').on('click','.neraca-1',function(e){
    var url = "{{ url('/dash-telu/form/fDashMSHutang') }}";
    loadForm(url);
});

$('.table').on('click','.neraca-2',function(e){
    $kode_grafik = $(this).data('kode_grafik');
    $nama = $(this).data('nama');
    var url = "{{ url('/dash-telu/form/fDashMsModal') }}";
    loadForm(url);
});

$('.table').on('click','.keuangan-detail',function(e){
    $kode_grafik = $(this).data('kode_grafik');
    $nama = $(this).data('nama');
    var url = "{{ url('/dash-telu/form/fDashMSKasBank') }}";
    loadForm(url);
});

$('.table').on('click','.piutang-detail',function(e){
    $kode_grafik = $(this).data('kode_grafik');
    $nama = $(this).data('nama');
    var url = "{{ url('/dash-telu/form/fDashMSPiutang') }}";
    loadForm(url);
});
</script>