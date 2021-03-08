@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');
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
    td,th{
        padding:4px !important;
    }
    
    .highcharts-data-label-connector{
        fill: none !important;
    }

    
    .nav-tabs .nav-link.active {
        color: #fff;
    }

    .nav-tabs .nav-link.active::before {
        background: #fff;
        color: #fff;
    }

</style>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h6>Beban</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-3 col-sm-12 px-0" >Presentase RKA VS Realisasi</h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-9 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab3-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>SDM Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>SDM %</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3-rp2" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Non SDM Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3-persen2" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Non SDM %</b></span></a> </li>
                        </ul>
                    </div>
                   
                </div>
                <div class="card-body pt-1">
                    <p style='font-size:9px;padding-left:20px'>Klik bar untuk melihat detail</p>
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane" id="tab3-persen" role="tabpanel">
                            <div id='rkaVSreal' style='height:350px'></div>
                        </div>
                        <div class="tab-pane active" id="tab3-rp" role="tabpanel">
                            <div id='rkaVSrealRp' style='height:350px'></div>
                        </div>
                        <div class="tab-pane" id="tab3-persen2" role="tabpanel">
                            <div id='rkaVSrealNon' style='height:350px'></div>
                        </div>
                        <div class="tab-pane" id="tab3-rp2" role="tabpanel">
                            <div id='rkaVSrealNonRp' style='height:350px'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-9 col-sm-12 px-0">Komposisi Beban
                        </h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-3 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab4-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>%</b></span></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content tabcontent-border p-0">
                        <div class="tab-pane active" id="tab4-persen" role="tabpanel">
                            <div id='komposisi' style='height:350px'>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab4-rp" role="tabpanel">
                            <div id='komposisiRp' style='height:350px'></div>
                        </div>
                    </div>
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
    <!-- <div class="app-menu">
        <div class="p-4 h-100">
            <div class="scroll ps">
                <h6 class="modal-title pl-0">Filter</h6>
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
$kd = "";
$form_back = "";
$kode_grafik = "";
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
                        control.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                        control2.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
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
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                    case '<=':
                        
                        var label = 'Periode s.d '+namaPeriode($dash_periode.from);
                        if($dash_periode.from == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                    case 'range':
                        
                        if($dash_periode.from == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
        
                        if($dash_periode.to == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.to = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control2.setValue($dash_periode.to);
                        }
                        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);

                    break;
                    default:
                        if($dash_periode.from == ""){
                            if("{{ Session::get('periode') }}" != ""){
                                control.setValue("{{ Session::get('periode') }}");
                                $dash_periode.from = "{{ Session::get('periode') }}";
                            }
                        }else{
                            control.setValue($dash_periode.from);
                        }
                        control2.setValue('');
                    break;
                }
                $('.label-periode-filter').html(label);
                
                getPresentaseRkaRealisasi($dash_periode);
                getPresentaseRkaRealisasiRp($dash_periode);
                getKomposisiBeban($dash_periode);
                getKomposisiBebanRp($dash_periode);

                        
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

function getPresentaseRkaRealisasi(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPresentaseRkaRealisasiBeban') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        success: function(result){
            Highcharts.chart('rkaVSreal', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text:  null
                },
                xAxis: {
                    categories: result.data.categori_sdm,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return this.point.name+':<b>'+sepNum(this.y)+'</b> %';
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'%')[0].outerHTML;
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function() { 
                                    
                                    $form_back = "dashTeluBeban"; 
                                    $kd= this.options.key;
                                    var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    }
                },
                legend: {
                    enabled:false
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: null,
                    color: ($mode == "dark" ? "#2200FF" : "#00509D"),
                    data: result.data.data_sdm
                }]
            },function(){
                this.xAxis[0].labelGroup.element.childNodes.forEach(function(label) {
                    label.style.cursor = "pointer";
                });
            });

            Highcharts.chart('rkaVSrealNon', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text:  null
                },
                xAxis: {
                    categories: result.data.categori_non,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return this.point.name+':<b>'+sepNum(this.y)+'</b> %';
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(sepNum(this.y)+'%')[0].outerHTML;
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function() {  
                                    
                                    $form_back = "dashTeluBeban";
                                    $kd= this.options.key;
                                    var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    }
                },
                legend: {
                    enabled:false
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: null,
                    color: ($mode == "dark" ? "#2200FF" : "#00509D"),
                    data: result.data.data_non
                }]
            },function(){
                this.xAxis[0].labelGroup.element.childNodes.forEach(function(label) {
                    label.style.cursor = "pointer";
                });
            });

            $('#rkaVSreal .highcharts-xaxis-labels text').on('click', function () {
                // $(this).css({''});
                $kd = result.data.data_sdm[$(this).index()].key;
                $form_back = "dashTeluBeban"; 
                var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                loadForm(url)
            });
            $('#rkaVSrealNon .highcharts-xaxis-labels text').on('click', function () {
                // $(this).css({''});
                $kd = result.data.data_non[$(this).index()].key;
                $form_back = "dashTeluBeban"; 
                var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                loadForm(url)
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

function getPresentaseRkaRealisasiRp(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getPresentaseRkaRealisasiBebanRp') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        success: function(result){
            Highcharts.chart('rkaVSrealRp', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text:  null
                },
                xAxis: {
                    categories: result.data.categori_sdm,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return this.point.name+':<b>'+toMilyar(this.y)+'</b>';
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(toMilyar(this.y))[0].outerHTML;
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function() {  
                                    
                                    $form_back = "dashTeluBeban";
                                    $kd= this.options.key;
                                    var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    }
                },
                legend: {
                    enabled:false
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: null,
                    color: ($mode == "dark" ? "#2200FF" : "#00509D"),
                    data: result.data.data_sdm
                }]
            },function(){
                this.xAxis[0].labelGroup.element.childNodes.forEach(function(label) {
                    label.style.cursor = "pointer";
                });
            });

            $('#rkaVSrealRp .highcharts-xaxis-labels text').on('click', function () {
                // $(this).css({''});
                $kd = result.data.data_sdm[$(this).index()].key;
                $form_back = "dashTeluBeban"; 
                var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                loadForm(url)
            });

            Highcharts.chart('rkaVSrealNonRp', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text:  null
                },
                xAxis: {
                    categories: result.data.categori_non,
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    formatter: function () {
                        return this.point.name+':<b>'+toMilyar(this.y)+'</b>';
                    }
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            useHTML: true,
                            formatter: function () {
                                return $('<div/>').css({
                                    'color' : 'white', // work
                                    'padding': '0 5px',
                                    'font-size':'8px',
                                    'backgroundColor' : this.point.color  // just white in my case
                                }).text(toMilyar(this.y))[0].outerHTML;
                            }
                        },
                        cursor: 'pointer',
                        //point
                        point: {
                            events: {
                                click: function() {
                                    
                                    $form_back = "dashTeluBeban";  
                                    $kd= this.options.key;
                                    var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                                    loadForm(url)
                                }
                            }
                        }
                    }
                },
                legend: {
                    enabled:false
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: null,
                    color: ($mode == "dark" ? "#2200FF" : "#00509D"),
                    data: result.data.data_non
                }]
            },function(){
                this.xAxis[0].labelGroup.element.childNodes.forEach(function(label) {
                    label.style.cursor = "pointer";
                });
            });

            $('#rkaVSrealNonRp .highcharts-xaxis-labels text').on('click', function () {
                // $(this).css({''});
                $kd = result.data.data_non[$(this).index()].key;
                $form_back = "dashTeluBeban"; 
                var url = "{{ url('/dash-telu/form/dashTeluBebanDet') }}";
                loadForm(url)
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

function getOprNonOpr(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getOprNonOprBeban') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        success:function(result){
            $('#opr').text(sepNum(result.data.opr)+'%');
            $('#nonopr').text(sepNum(result.data.nonopr)+'%');
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

function getKomposisiBeban(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getKomposisiBeban') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        success: function(result){
            Highcharts.chart('komposisi', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            // distance:-30,
                            
                            alignTo: 'plotEdges',
                            useHTML: true,
                            formatter: function () {
                                var name = this.point.name.split(" ");
                                return $('<div/>').css({
                                    'border' : '0',// just white in my case
                                    'max-width': '70px',
                                    'overflow':'hidden',
                                    'font-size': '10px',
                                    'color' : ($mode == "dark" ? "var(--text-color)" : "black")
                                }).addClass('fs-8').html(sepNum(this.percentage)+'%')[0].outerHTML;
                            }
                        },
                        size:'110%',
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Pendapatan',
                    colorByPoint: true,
                    data: result.data.data
                }],
                legend: {
                    itemStyle: {
                        fontSize:'8px'
                    }
                }
                
            }, function(){
                var series = this.series;
                for (var i = 0, ie = series.length; i < ie; ++i) {
                    var points = series[i].data;
                    for (var j = 0, je = points.length; j < je; ++j) {
                        if (points[j].graphic) {
                            points[j].graphic.element.style.fill = result.data.colors[j];
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
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
}

function getKomposisiBebanRp(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/getKomposisiBeban') }}",
        dataType:"JSON",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        success: function(result){
            Highcharts.chart('komposisiRp', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: null
                },
                credits:{
                    enabled:false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.2f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            // distance:-30,
                            
                            alignTo: 'plotEdges',
                            useHTML: true,
                            formatter: function () {
                                var name = this.point.name.split(" ");
                                return $('<div/>').css({
                                    'border' : '0',// just white in my case
                                    'max-width': '70px',
                                    'overflow':'hidden',
                                    'font-size': '10px',
                                    'color' : ($mode == "dark" ? "var(--text-color)" : "black")
                                }).addClass('fs-8').html(toMilyar(this.y))[0].outerHTML;
                            }
                        },
                        size:'110%',
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Pendapatan',
                    colorByPoint: true,
                    data: result.data.data
                }],
                legend: {
                    itemStyle: {
                        fontSize:'8px'
                    }
                }
                
            }, function(){
                var series = this.series;
                for (var i = 0, ie = series.length; i < ie; ++i) {
                    var points = series[i].data;
                    for (var j = 0, je = points.length; j < je; ++j) {
                        if (points[j].graphic) {
                            points[j].graphic.element.style.fill = result.data.colors[j];
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
    getKomposisiBeban($dash_periode);
    getPresentaseRkaRealisasi($dash_periode);
    getKomposisiBebanRp($dash_periode);
    getPresentaseRkaRealisasiRp($dash_periode);
    $('#modalFilter').modal('hide');
    // $('.app-menu').hide();
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#periode')[0].selectize.setValue('');
});

// $('.app-menu').hide();
   
$('#btn-filter').click(function(){
    // $('.app-menu').show();
    
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    // $('.app-menu').hide();
    
    $('#modalFilter').modal('hide');
});
    
</script>