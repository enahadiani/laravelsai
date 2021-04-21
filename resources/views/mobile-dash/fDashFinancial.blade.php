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
    .table-target td{
        padding:2px !important;
    }
    .card-target{
        border-radius: 25px !important;
    }
    .bg-blue{
        background:#7cd2ec38;
    }
    .bg-red{
        background:#ff6c0024;
    }
    i.simple-icon-note:hover {
        color:black !important;
    }
    </style>

<div class="container-fluid mt-3">
    @include('mobile-dash.back')
    <div class="row">
        <div class="col-12">
            <h6 class="mb-0 bold">Laporan Keuangan Telkom University</h6>
            <p><span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
    <div class="col-lg-4 col-12 mb-4 col-grid">
            <div class="card card-target ">
                <div class="card-body or-row">
                    <h6>Operating Ratio</h6>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <p class="mb-0 mt-2">
                            Pencapaian 
                            </p>
                            <span class="text-info mb-0 badge badge-pill badge-info" id="acv-or" style="color:white !important"></span>
                            <p class="mb-0 mt-2">
                            Target <span class="text-info mb-0" id="target-or"></span>
                            </p>
                            <p class="mb-0">
                            Realisasi <span class="text-danger mb-0" id="real-or"></span>
                            </p>
                        </div>
                        <div class="col-md-6 col-6">
                            <div id="chart-or" style="max-height:250px">
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collaps-or" style="">
                        <div class="p-4 border mt-0" style="border-radius:0.25rem;background:#F8F8F8">
                        <p id="ket-or"></p>
                        </div>
                        <a class='edit-note' id='note-or' href='#'>
                            <i class="simple-icon-note text-right" style="font-size: 25px;position: absolute;bottom: 50px;right: 30px;color: #f3f3f3;"></i>
                        </a>
                    </div>
                    <p class="mb-0 text-center">
                        <a class="mb-1" data-toggle="collapse" href="#collaps-or" role="button" aria-expanded="true" aria-controls="collaps-or">
                        <i class="simple-icon-arrow-down"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12 mb-4 col-grid" id="target-box">
           
        </div>
    </div>
    
</div>
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>

<div style="height:50px">&nbsp;</div>
<script>
$('#scroll-top').hide();
$('#scroll-bottom').hide();

$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
var $kode_grafik = "";
var $nama = "";
$('.navbar_bottom').hide();
$('.nama-menu').html($nama_menu);
var html = `
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row dash-filter">
                            <p class="dash-kunci" hidden>dash_periode</p> 
                            <label class="col-md-12">Periode</label>
                            <div class="col-md-4">
                                <select class="form-control dash-filter-type" data-width="100%" name="periode[]" id="periode_type">
                                    <option value='' disabled>Pilih</option>
                                    <option value='='>=</option>
                                    <option value='<='><=</option>
                                    <option value='range'>Range</option>
                                </select>
                            </div>
                            <div class="col-md-8 dash-filter-from">
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
                    <div class="modal-footer" style="justify-content:flex-end;width:100%;border:none !important">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
    `;
    
    $('#content-bottom-sheet').html(html);
    $('.c-bottom-sheet__sheet').css({ "width":"100%","margin-left": "0%", "margin-right":"0%"});
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btn-filter').removeClass('btn-outline-light');
    $('#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btn-filter').removeClass('btn-outline-dark');
    $('#btn-filter').addClass('btn-outline-light');
}

var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;

function namaQuarter(periode){
    var bulan = periode.substr(4,2);
    var tahun = periode.substr(0,4);
    switch (bulan){
        case 1 : case '1' : case '01': 
        case 2 : case '2' : case '02':
        case 3 : case '3' : case '03': bulan = "Q1"; break;
        case 4 : case '4' : case '04': 
        case 5 : case '5' : case '05': 
        case 6 : case '6' : case '06': bulan = "Q2"; break;
        case 7 : case '7' : case '07': 
        case 8 : case '8' : case '08': 
        case 9 : case '9' : case '09': bulan = "Q3"; break;
        case 10 : case '10' : case '10': 
        case 11 : case '11' : case '11': 
        case 12 : case '12' : case '12': bulan = "Q4"; break;
        default: bulan = null;
    }

    return bulan+' '+tahun;
}

function quarter(periode){
    var bulan = periode.substr(4,2);
    var tahun = periode.substr(0,4);
    switch (bulan){
        case 1 : case '1' : case '01': 
        case 2 : case '2' : case '02':
        case 3 : case '3' : case '03': bulan = "03"; break;
        case 4 : case '4' : case '04': 
        case 5 : case '5' : case '05': 
        case 6 : case '6' : case '06': bulan = "06"; break;
        case 7 : case '7' : case '07': 
        case 8 : case '8' : case '08': 
        case 9 : case '9' : case '09': bulan = "09"; break;
        case 10 : case '10' : case '10': 
        case 11 : case '11' : case '11': 
        case 12 : case '12' : case '12': bulan = "12"; break;
        default: bulan = null;
    }

    return tahun+''+bulan;
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

function cutDes(x){
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
            return parts.join('.');
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
        url:"{{ url('/mobile-dash/periode') }}",
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

                // $('.dash-filter-typediv').hide();
                // $('#periode_to').closest('div.dash-filter-to').hide();
                $('#periode_from').closest('div.dash-filter-from').removeClass('col-md-4').addClass('col-md-8');

                if($dash_periode.type == ""){
                    $dash_periode.type = "=";
                }
                
                $('#periode_type')[0].selectize.setValue($dash_periode.type);

                switch($dash_periode.type){
                        case '=':
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
                            control2.setValue('');
                            var label = 'Periode '+namaPeriode($dash_periode.from);
                        break;
                        case '<=':
                            
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
                            var label = 'Periode s.d '+namaPeriode($dash_periode.from);
                            control2.setValue('');
                        break;
                        case 'range':
                            
                            if($dash_periode.from == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.from = result.data.periode_max;
                                }
                            }else{
                                control.setValue($dash_periode.from);
                            }
            
                            if($dash_periode.to == ""){
                                if(result.data.periode_max != ""){
                                    control.setValue(result.data.periode_max);
                                    $dash_periode.to = result.data.periode_max;
                                }
                            }else{
                                control2.setValue($dash_periode.to);
                            }
                            var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);

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
                getTarget($dash_periode);
                // getFxPosition($dash_periode);
                // getPenyerapan($dash_periode);
                // getDebt($dash_periode);
                // getKelola($dash_periode);
                // getPin($dash_periode);

                        
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
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

function getTarget(periode=null)
{
    $.ajax({
        type:"GET",
        url:"{{ url('/mobile-dash/financial-target') }}",
        data: {
            'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to
        },
        dataType: "JSON",
        success: function(result){
            var html = "";
            if(result.status){
                if(result.data.length > 0){
                    for(var i=0; i < result.data.length; i++){
                        var line = result.data[i];
                        if(i == (result.data.length - 1)){
                            var margin = "";
                        }else{
                            var margin = "mb-4";
                        }
                        html +=` 
                        <div class="row `+margin+`">
                            <div class="col-lg-12">
                                <div class="card card-target ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <h6>`+line.nama+`</h6>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <h5 class="bold">`+toMilyar(line.realisasi)+`</h5>
                                                <p class="mb-0">Target `+toMilyar(line.rka_sd)+`</p>
                                                <p>Tahun Lalu `+toMilyar(line.realisasi_lalu)+`</p>
                                            </div>
                                            <div class="col-md-6 col-6 col-grid">
                                                <table class="table table-borderless table-target" style="width:90%">`;
                                                    if(parseFloat(line.persen) >= 100){
                                                        var text = "text-success";
                                                        var icon = "simple-icon-arrow-up-circle";
                                                    }else{
                                                        var text = "text-danger";
                                                        var icon = "simple-icon-arrow-down-circle";
                                                    }

                                                    if(parseFloat(line.yoy) >= 0){
                                                        var text2 = "text-success";
                                                        var icon2 = "simple-icon-arrow-up-circle";
                                                    }else{
                                                        var text2 = "text-danger";
                                                        var icon2 = "simple-icon-arrow-down-circle";
                                                    }
                                                    
                                                    html+=`
                                                    <tr>
                                                        <td class="">Pencapaian</td>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                        <td style="width:20%"  colspan="2"><i class="`+icon+` `+text+` mr-2" style="font-size:25px;"></i><span class="bold `+text+`" style="width:80%;font-size:16px !important;position:absolute;padding-bottom:10px">`+sepNum(line.persen)+`%</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="">YoY</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:20%"  colspan="2"><i class="`+icon2+` `+text2+` mr-2" style="font-size:25px"></i><span class="bold `+text2+`" style="width:80%;font-size:16px !important;position:absolute;padding-bottom:10px">`+sepNum(line.yoy)+`%</span></td>
                                                        <td  style="width:20%">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-12 col-12 col-grid row-note">
                                                <div class="collapse" id="collaps`+line.kode_grafik+`" style="">
                                                    <div class="p-4 border mt-0" style="border-radius:0.25rem;background:#F8F8F8">
                                                        <p class='note-text'>`+line.keterangan+`</p>
                                                        <a class='edit-note' href='#' data-kode_grafik='`+line.kode_grafik+`' data-periode='`+quarter($dash_periode.from)+`' data-nama='`+line.nama+`'>
                                                            <i class="simple-icon-note text-right" style="font-size: 25px;position: absolute;bottom: 30px;right: 20px;color: #f3f3f3;"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <p class="mb-0 text-center">
                                                    <a class="mb-1" data-toggle="collapse" href="#collaps`+line.kode_grafik+`" role="button" aria-expanded="true" aria-controls="collaps`+line.kode_grafik+`">
                                                    <i class="simple-icon-arrow-down"></i>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        
                    }
                }
            }
            
            $('#target-box').html(html+"<div style='height:100px;'>&nbsp;</div>");
            $('.row-note').on("click", '.edit-note',function(e){
                e.preventDefault();
                var note = $(this).closest('div').find('p.note-text');
                var periode = $(this).data('periode');
                var kode_grafik = $(this).data('kode_grafik');
                var nama = $(this).data('nama');
                var keterangan = note.html();
                
                $('#content-bottom-sheet').html('');
                var html =`
                <form id="form-note" class="mx-3 mt-4 tooltip-label-right" novalidate>
                    <input type="hidden" name="kode_grafik" value="`+kode_grafik+`">
                    <input type="hidden" name="periode" value="`+periode+`">
                    <input type="hidden" name="nama" value="`+nama+`">
                    <div class="form-row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="tanggal">Keterangan</label>
                            <textarea class='form-control' row='4' name='keterangan' id='keterangan'></textarea>
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="form-group col-lg-12 col-sm-12">
                            <button type="submit" id="btn-note" class="btn btn-primary float-right"> Simpan </button>
                        </div>
                    </div>
                </form>
                `;
                $('#content-bottom-sheet').html(html);
                $('#keterangan').val(keterangan);
                $('#form-note').validate({
                    ignore: [],
                    errorElement: "label",
                    submitHandler: function (form) {

                        var formData = new FormData(form);
                        for(var pair of formData.entries()) {
                            console.log(pair[0]+ ', '+ pair[1]); 
                        }
                       
                        var url = "{{ url('/mobile-dash/note') }}";
                        
                        $.ajax({
                            type: 'POST',
                            url: url,
                            dataType: 'json',
                            data: formData,
                            async:false,
                            contentType: false,
                            cache: false,
                            processData: false, 
                            success:function(result){
                                if(result.status){
                                    console.log(note.html());
                                    note.html(result.keterangan);
                                    console.log(note.html());
                                    msgDialog({
                                        id:'-',
                                        type:'warning',
                                        title: 'Sukses',
                                        text: result.message
                                    });
                                    $('.c-bottom-sheet').removeClass('active');
                                }
                                else if(!result.status && result.message == 'Unauthorized'){
                                    window.location.href = "{{ url('mobile-dash/sesi-habis') }}";
                                }
                                else{
                                    msgDialog({
                                        id: '-',
                                        type: 'warning',
                                        title: 'Gagal',
                                        text: result.message
                                    });
                                }
                            },
                            fail: function(xhr, textStatus, errorThrown){
                                alert('request failed:'+textStatus);
                            }
                        });
                    },
                    errorPlacement: function (error, element) {
                        var id = element.attr("id");
                        $("label[for="+id+"]").append("<br/>");
                        $("label[for="+id+"]").append(error);
                    }
                });
                $('.c-bottom-sheet__sheet').css({ "width":"90%","margin-left": "5%", "margin-right":"5%"});
                $('#trigger-bottom-sheet').trigger("click");
            });

            function renderIcons() {
                
                // Move icon
                if (!this.series[0].icon) {
                    this.series[0].icon = this.renderer.path(['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8])
                    .attr({
                        stroke: '#303030',
                        'stroke-linecap': 'round',
                        'stroke-linejoin': 'round',
                        'stroke-width': 2,
                        zIndex: 10
                    });
                    // .add(this.series[2].group);
                }
                this.series[0].icon.translate(
                    this.chartWidth / 2 - 10,
                    this.plotHeight / 2 - this.series[0].points[0].shapeArgs.innerR -
                    (this.series[0].points[0].shapeArgs.r - this.series[0].points[0].shapeArgs.innerR) / 2
                );
                
                // Exercise icon
                if (!this.series[1].icon) {
                    this.series[1].icon = this.renderer.path(
                        ['M', -8, 0, 'L', 8, 0, 'M', 0, -8, 'L', 8, 0, 0, 8,
                        'M', 8, -8, 'L', 16, 0, 8, 8]
                        )
                        .attr({
                            stroke: '#ffffff',
                            'stroke-linecap': 'round',
                            'stroke-linejoin': 'round',
                            'stroke-width': 2,
                            zIndex: 10
                        });
                        // .add(this.series[2].group);
                }

                this.series[1].icon.translate(
                    this.chartWidth / 2 - 10,
                    this.plotHeight / 2 - this.series[1].points[0].shapeArgs.innerR -
                    (this.series[1].points[0].shapeArgs.r - this.series[1].points[0].shapeArgs.innerR) / 2
                );  
            }

            if(result.data2.length > 0){
                
                $('#note-or').attr('data-kode_grafik',result.data2[0].kode_grafik);
                $('#note-or').attr('data-nama',result.data2[0].nama);
                $('#note-or').attr('data-periode',quarter($dash_periode.from));
                $('#target-or').html(sepNum(result.data2[0].rka_sd));
                $('#real-or').html(sepNum(result.data2[0].realisasi));
                $('#acv-or').html(sepNum(result.data2[0].persen));
                $('#ket-or').html(result.data2[0].keterangan);
                
                Highcharts.chart('chart-or', {
                    
                    chart: {
                        type: 'solidgauge',
                        height: '80%',
                        events: {
                            render: renderIcons
                        }
                    },
                    
                    title: {
                        text: ''
                    },
                    credits:{
                        enabled:false
                    },
                    tooltip: {
                        borderWidth: 0,
                        backgroundColor: 'none',
                        shadow: false,
                        style: {
                            fontSize: '16px'
                        },
                        valueSuffix: '%',
                        pointFormat: '{series.name}<br><span style="font-size:2em; color: {point.color}; font-weight: bold">{point.y}</span>',
                        positioner: function (labelWidth) {
                            return {
                                x: (this.chart.chartWidth - labelWidth) / 2,
                                y: (this.chart.plotHeight / 2) + 15
                            };
                        }
                    },
                    
                    pane: {
                        startAngle: 0,
                        endAngle: 360,
                        background: [{ // Track for Move
                            outerRadius: '112%',
                            innerRadius: '88%',
                            backgroundColor: Highcharts.color(Highcharts.getOptions().colors[0])
                            .setOpacity(0.3)
                            .get(),
                            borderWidth: 0
                        }, { // Track for Exercise
                            outerRadius: '87%',
                            innerRadius: '63%',
                            backgroundColor: Highcharts.color(Highcharts.getOptions().colors[1])
                            .setOpacity(0.3)
                            .get(),
                            borderWidth: 0
                        }]
                    },
                    
                    yAxis: {
                        min: 0,
                        max: 100,
                        lineWidth: 0,
                        tickPositions: []
                    },
                    colors:[Highcharts.color(Highcharts.getOptions().colors[0])
                    .get(),Highcharts.color(Highcharts.getOptions().colors[5])
                    .get()],
                    plotOptions: {
                        solidgauge: {
                            dataLabels: {
                                enabled: false
                            },
                            linecap: 'round',
                            stickyTracking: false,
                            rounded: true
                        }
                    },
                    
                    series: [{
                        name: 'Target',
                        data: [{
                            color: Highcharts.getOptions().colors[0],
                            radius: '112%',
                            innerRadius: '88%',
                            y: Math.abs(parseFloat(cutDes(result.data2[0].rka_sd)))
                        }]
                    }, {
                        name: 'Real',
                        data: [{
                            color: Highcharts.getOptions().colors[5],
                            radius: '87%',
                            innerRadius: '63%',
                            y: Math.abs(parseFloat(cutDes(result.data2[0].realisasi)))
                        }]
                    }]
                }, function(){
                    var series = this.series;
                    var colors = this.options.colors;
                    for (var i = 0, ie = series.length; i < ie; ++i) {
                        var points = series[i].data;
                        points[0].graphic.element.style.fill = colors[i];
                    }
                });
            }else{
                $('#target-or').html('');
                $('#real-or').html('');
                $('#ket-or').html('');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
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
            var label = namaQuarter($dash_periode.from);    
        break;
        case '<=':
            
            var label = 's.d '+namaQuarter($dash_periode.from);
        break;
        case 'range':
            
            var label = namaQuarter($dash_periode.from)+' s.d '+namaQuarter($dash_periode.to);

        break;
    }
    $('.label-periode-filter').html(label);
    getTarget($dash_periode);
    $('.c-bottom-sheet').removeClass('active');
});

$('#bottom-sheet-close').hide();
$('#btn-reset').click(function(e){
e.preventDefault();
$('#periode_type')[0].selectize.setValue($dash_periode.type);
$('#periode_from')[0].selectize.setValue($dash_periode.from);
$('#periode_to')[0].selectize.setValue($dash_periode.to);
});

$('.or-row').on("click", '#note-or',function(e){
    e.preventDefault();
    var note = $('#ket-or');
    var periode = $(this).data('periode');
    var kode_grafik = $(this).data('kode_grafik');
    var nama = $(this).data('nama');
    var keterangan = note.html();
    
    $('#content-bottom-sheet').html('');
    var html =`
    <form id="form-note" class="mx-3 mt-4 tooltip-label-right" novalidate>
    <input type="hidden" name="kode_grafik" value="`+kode_grafik+`">
    <input type="hidden" name="periode" value="`+periode+`">
    <input type="hidden" name="nama" value="`+nama+`">
    <div class="form-row">
    <div class="form-group col-lg-12 col-sm-12">
    <label for="tanggal">Keterangan</label>
    <textarea class='form-control' row='4' name='keterangan' id='keterangan'></textarea>
    </div>
    </div>
    <div class="form-row mt-4">
    <div class="form-group col-lg-12 col-sm-12">
    <button type="submit" id="btn-note" class="btn btn-primary float-right"> Simpan </button>
    </div>
    </div>
    </form>
    <div style='height:100px'>&nbsp;</div>
    `;
    $('#content-bottom-sheet').html(html);
    $('#keterangan').val(keterangan);
    $('#form-note').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {
            
            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            var url = "{{ url('/mobile-dash/note') }}";
            
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.status){
                        console.log(note.html());
                        note.html(result.keterangan);
                        console.log(note.html());
                        msgDialog({
                            id:'-',
                            type:'warning',
                            title: 'Sukses',
                            text: result.message
                        });
                        $('.c-bottom-sheet').removeClass('active');
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('mobile-dash/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Gagal',
                            text: result.message
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    $('.c-bottom-sheet__sheet').css({ "width":"90%","margin-left": "5%", "margin-right":"5%"});
    $('#trigger-bottom-sheet').trigger("click");
});

</script>