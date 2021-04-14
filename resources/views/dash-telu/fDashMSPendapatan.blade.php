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

    .highcharts-point {
        stroke-width: 2px !important;
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
    .preview-close
    {
        line-height:1.5;padding: 0;background: none;appearance: unset;opacity: unset;right: -40px;position: relative;top: -40px;
    }
    .preview-close > span 
    {
        border-radius: 50%;padding: 0 0.45rem 0.1rem 0.45rem;background: white;color: black;font-size: 1.2rem !important;font-weight: lighter;box-shadow:0px 1px 5px 1px #80808054
    }

    .preview-close > span:hover
    {
        color:white;
        background:red;
    }

    .preview-close > span
    {
        color:white;
        background:red;
    }
    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
    }
    .breadcrumb-item.active > a{
        font-weight:bold;
    }
    </style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12 ms-pdpt">
            <h6 class="mb-0 bold">Pendapatan</h6>
            <a class='btn' href='#' id='btnBack' style="position: absolute;right: 135px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left mr-2"></i> Back</a>
            <a class="btn" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p class="mb-0">Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb px-0 pt-0">
                    <li class="breadcrumb-item"><a href="#">Management System</a></li>
                    <li class="breadcrumb-item"><a href="#">Laba Rugi</a></li>
                    <li class="breadcrumb-item active"><a href="#">Pendapatan</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0" style="position:absolute">Pencapaian Pendapatan Terhadap RKA Bulan Berjalan</h6>
                    <button id="fullsc-capai" class="btn float-right px-0 py-0 text-light" title="Full Screen"><i class="simple-icon-size-fullscreen"></i></button>
                </div>
                <div class="card-body">
                    <div id="capai-rka" style="height:500px"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0" style="position:absolute">Capaian Kelompok Pdpt Non Pdkk</h6>
                    <button id="fullsc-capai-klp" class="btn float-right px-0 py-0 text-light" title="Full Screen"><i class="simple-icon-size-fullscreen"></i></button>
                </div>
                <div class="card-body">
                    <div id="capai-klp"  style="height:500px"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 480px;">
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
                    <div class="modal-footer" style="border:none;position:absolute;bottom:0;justify-content:flex-end;width:100%">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="preview-capai" tabindex="-1" role="dialog"
    aria-labelledby="preview-capai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:1000px">
            <div class="modal-content">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="mb-0">Pencapaian Pendapatan Terhadap RKA Bulan Berjalan</h6>
                    <button type="button" class="close preview-close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div id="capai-rka2"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="preview-capaiklp" tabindex="-1" role="dialog"
    aria-labelledby="preview-capaiklp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:1000px">
            <div class="modal-content">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="mb-0">Capaian Kelompok Pdpt Non Pdkk</h6>
                    <button type="button" class="close preview-close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div id="capai-klp2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btnBack,#btn-filter').removeClass('btn-outline-light');
    $('#btnBack,#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btnBack,#btn-filter').removeClass('btn-outline-dark');
    $('#btnBack,#btn-filter').addClass('btn-outline-light');
}
$kd = "";
$form_back = "";
$kode_grafik = "";
$nama = "";
$mode = localStorage.getItem("dore-theme");
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
                getMsPendRKA($dash_periode,"capai-rka");
                getMsPendKlp($dash_periode,"capai-klp");
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


function getMsPendRKA(periode=null, id){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-pend-capai') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            // Highcharts.chart('capai-rka', {
            //     chart: {
            //         type: 'column'
            //     },
            //     title: {
            //         text: ''
            //     },
            //     xAxis: {
            //         categories: result.data.ctg
            //     },
            //     yAxis: [{
            //         min: 0,
            //         title: {
            //             text: ''
            //         }
            //     }],
            //     credits: {
            //         enabled: false
            //     },
            //     tooltip: {
            //         shared: true
            //     },
            //     plotOptions: {
            //         column: {
            //             grouping: false,
            //             shadow: false,
            //             borderWidth: 0
            //         }
            //     },
            //     series: result.data.series
            // });

            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            var chart = Highcharts.chart(id, {
                chart: {
                    type: 'column'
                },
                credits:{
                    enabled:false
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: result.ctg,
                    labels: {
                        useHTML:true,
                        formatter: function() {
                            var tmp = this.value.split("|");
                            return '<p class="mb-0"><span class="text-center" style="display:inherit">'+tmp[0]+'</span><span class="text-center bold" style="display:inherit">'+sepNum(tmp[1])+'%</span></p>';
                        },
                    }
                },
                yAxis: {
                        title:'',
                    min: 0
                },
                tooltip: {
                    formatter: function () {   
                        var tmp = this.x.split("|");   
                        return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + sepNum(this.y);
                    }
                    // pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b>',
                    /* shared: true */
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        borderWidth: 0,
                        pointWidth: 50,
                        dataLabels: {
                            // padding:10,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'justify',
                            useHTML: true,
                            formatter: function () {
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
                                }
                                // if(this.name)
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function(e) {  
                                    $kd= this.options.key;
                                    $kd_grafik= this.options.key2;
                                    var tmp = e.point.category.split("|");
                                    $nama = tmp[0];
                                    $form_back = "fDashMSPendapatan";
                                    var url = "{{ url('/dash-telu/form/dashTeluPdptDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    },
                    scatter: {
                        dataLabels: {
                            // padding:10,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'justify',
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' M</b></span>';
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
                                }
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function(e) {  
                                    $kd= this.options.key;
                                    $kd_grafik= this.options.key2;
                                    $form_back = "fDashMSPendapatan";
                                    var tmp = e.point.category.split("|");
                                    $nama = tmp[0];
                                    var url = "{{ url('/dash-telu/form/dashTeluPdptDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    }
                },
                series: [{
                    name: 'Melampaui',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
                    type: 'column',
                    stack: 1,
                    data: result.melampaui,
                    dataLabels:{
                        y:-20
                    }
                },{
                    name: 'RKA s.d.',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                    marker: {
                        symbol: 'c-rect',
                        lineWidth:5,
                        lineColor: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                        radius: 50
                    },
                    type: 'scatter',
                    stack: 2,
                    data: result.rka,
                    dataLabels:{
                        x:-50
                    }
                }, {
                    name: 'Tidak Tercapai',
                    type: 'column',
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
                    stack: 1,
                    data: result.tdkcapai,
                    dataLabels:{
                        x:50,
                    }
                }, {
                    name: 'Actual',
                    type: 'column',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#434343' :  '#CED4DA'),
                    stack: 1,
                    data: result.actual
                }]
            });

            // document.getElementById('fullsc-capai').addEventListener('click', function () {
            //     chart.fullscreen.toggle();
            // });

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

function getMsPendKlp(periode=null,id){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-pend-capai-klp') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            
            Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
            var chart2= Highcharts.chart(id, {
                chart: {
                    type: 'column'
                },
                credits:{
                    enabled:false
                },
                title: {
                    text: ''
                },
                xAxis: {
                    categories: result.ctg,
                    labels: {
                        useHTML:true,
                        formatter: function() {
                            var tmp = this.value.split("|");
                            return '<p class="mb-0"><span class="text-center" style="display:inherit">'+tmp[0]+'</span><span class="text-center bold" style="display:inherit">'+sepNum(tmp[1])+'%</span></p>';
                        },
                    }
                },
                yAxis: {
                        title:'',
                    min: 0
                },
                tooltip: {
                    formatter: function () {   
                        var tmp = this.x.split("|");   
                        return tmp[0]+'<br><span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + sepNum(this.y);
                    }
                    // pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b>',
                    /* shared: true */
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        borderWidth: 0,
                        pointWidth: 50,
                        dataLabels: {
                            // padding:10,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'justify',
                            useHTML: true,
                            formatter: function () {
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
                                }
                                // if(this.name)
                            }
                        }
                    },
                    scatter: {
                        dataLabels: {
                            // padding:10,
                            allowOverlap:true,
                            enabled: true,
                            crop: false,
                            overflow: 'justify',
                            useHTML: true,
                            formatter: function () {
                                // return '<span style="color:white;background:gray !important;"><b>'+sepNum(this.y)+' M</b></span>';
                                if(this.y < 0.1){
                                    return '';
                                }else{
                                    return $('<div/>').css({
                                        'color' : 'white', // work
                                        'padding': '0 3px',
                                        'font-size': '10px',
                                        'backgroundColor' : this.point.color  // just white in my case
                                    }).text(sepNum(this.point.nlabel)+'M')[0].outerHTML;
                                }
                            }
                        }
                    }
                },
                series: [{
                    name: 'Melampaui',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#28DA66' :  '#16ff14'),
                    type: 'column',
                    stack: 1,
                    data: result.melampaui,
                    dataLabels:{
                        y:-20
                    }
                },{
                    name: 'RKA s.d.',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                    marker: {
                        symbol: 'c-rect',
                        lineWidth:5,
                        lineColor: (localStorage.getItem("dore-theme") == "dark" ? '#2200FF' :  '#003F88'),
                        radius: 50
                    },
                    type: 'scatter',
                    stack: 2,
                    data: result.rka,
                    dataLabels:{
                        x:-50
                    }
                }, {
                    name: 'Tidak Tercapai',
                    type: 'column',
                    color:  (localStorage.getItem("dore-theme") == "dark" ? '#ED4346' :  '#900604'),
                    stack: 1,
                    data: result.tdkcapai,
                    dataLabels:{
                        x:50,
                    }
                }, {
                    name: 'Actual',
                    type: 'column',
                    color: (localStorage.getItem("dore-theme") == "dark" ? '#434343' :  '#CED4DA'),
                    stack: 1,
                    data: result.actual
                }]
            });

            // document.getElementById('fullsc-capai-klp').addEventListener('click', function () {
            //     chart2.fullscreen.toggle();
            // });

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
    getMsPendRKA($dash_periode,"capai-rka");
    getMsPendKlp($dash_periode,"capai-klp");
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

$('.ms-pdpt').on('click','#btnBack',function(e){
    e.preventDefault();
    var url = "{{ url('/dash-telu/form/fDashManagementSystem') }}";
    loadForm(url);
})

$('#fullsc-capai').click(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    $('#preview-capai').modal('show');
    getMsPendRKA(periode,"capai-rka2");
});

$('#fullsc-capai-klp').click(function(e){
    e.preventDefault();
    var periode = $('#periode')[0].selectize.getValue();
    $('#preview-capaiklp').modal('show');
    getMsPendKlp(periode,"capai-klp2");
});

</script>