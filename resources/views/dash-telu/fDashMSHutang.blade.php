@php
$kode_lokasi = Session::get('lokasi');
$periode = Session::get('periode');
$kode_pp = Session::get('kodePP');
$nik     = Session::get('userLog');

$tahun= substr($periode,0,4);
$tahunLalu = intval($tahun)-1;
$tahunDepan = intval($tahun)+1;
$thnIni = substr($tahun,2,2);
$thnLalu = substr($tahunLalu,2,2)
@endphp

<style>
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .fs-8{
        font-size: 8px !important;
    }
    
    .fs-10{
        font-size: 10px !important;
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
    .card-title{
        color:white !important;
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
        <div class="col-12 hutang">
            <h6 class="mb-0 bold">Hutang</h6>
            <a class='btn btn-outline-light' href='#' id='btnBack' style="position: absolute;right: 135px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left mr-2"></i> Back</a>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-7 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Hutang</h6>
                </div>
                <div class="card-body">
                    <div id="real-hutang" style="height:300px"></div>
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
</div>
<script>
$('.tahunDepan').hide();
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btnBack,#btn-filter').removeClass('btn-outline-light');
    $('#btnBack,#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btnBack,#btn-filter').removeClass('btn-outline-dark');
    $('#btnBack,#btn-filter').addClass('btn-outline-light');
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
                    break;
                    case 'range':
                        
                        var label = 'Periode '+namaPeriode($dash_periode.from)+' s.d '+namaPeriode($dash_periode.to);
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
                
                getHutang($dash_periode);
                        
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

function getHutang(periode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('/telu-dash/ms-hutang') }}",
        data:{'periode[0]' : periode.type,
            'periode[1]' : periode.from,
            'periode[2]' : periode.to, mode: $mode},
        dataType:"JSON",
        success:function(result){
            // if(result.series.length > 0){
                var $colors = result.colors;
                // Highcharts.chart('real-hutang', {
                //     chart: {
                //         type: 'column'
                //     },
                //     title: {
                //         text: ''
                //     },
                //     xAxis: {
                //         categories: result.ctg
                //     },
                //     yAxis: [{
                //         min: 0,
                //         title: {
                //             text: ''
                //         },
                //         labels: {
                //             formatter: function () {
                //                 return singkatNilai(this.value);
                //             }
                //         },
                //     }],
                //     legend:{
                //         enabled: false
                //     },
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
                //             borderWidth: 0,
                //             dataLabels: {
                //                 // padding:10,
                //                 allowOverlap:true,
                //                 enabled: true,
                //                 crop: false,
                //                 overflow: 'justify',
                //                 useHTML: true,
                //                 formatter: function () {
                //                     if(this.y < 0.1){
                //                         return '';
                //                     }else{
                //                         return $('<div/>').css({
                //                             'color' : 'white', // work
                //                             'padding': '0 3px',
                //                             'font-size': '10px',
                //                             'backgroundColor' : this.point.color  // just white in my case
                //                         }).text(toMilyar(this.y))[0].outerHTML;
                //                     }
                //                     // if(this.name)
                //                 }
                //             }
                //         }
                //     },
                //     series: result.series
                // }, function(){
                //     var series = this.series;
                //     for (var i = 0, ie = series.length; i < ie; ++i) {
                //         var points = series[i].data;
                //         for (var j = 0, je = points.length; j < je; ++j) {
                //             if (points[j].graphic) {
                //                 points[j].graphic.element.style.fill = $colors[j];
                //             }
                //         }
                //     }
                // });

                Highcharts.SVGRenderer.prototype.symbols['c-rect'] = function (x, y, w, h) {
                    return ['M', x, y + h / 2, 'L', x + w, y + h / 2];
                };
                
                var chart = Highcharts.chart('real-hutang', {
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
                        categories: result.categories
                    },
                    yAxis: {
                            title:'',
                        min: 0
                    },
                    tooltip: {
                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b>',
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
                                    click: function() {  
                                        $kd= this.options.key;
                                        $kd_grafik= this.options.key2;
                                        $form_back = "fDashMSAset";
                                        var url = "{{ url('/dash-telu/form/dashMSAsetDet') }}";
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
                                    click: function() {  
                                        $kd= this.options.key;
                                        $kd_grafik= this.options.key2;
                                        $form_back = "fDashMSAset";
                                        var url = "{{ url('/dash-telu/form/dashMSAsetDet') }}";
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
                        name: 'Target/RKA',
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
                
                
            // }
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
    getHutang($dash_periode);
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

$('.hutang').on('click','#btnBack',function(e){
    e.preventDefault();
    var url = "{{ url('/dash-telu/form/fDashManagementSystem') }}";
    loadForm(url);
})

</script>