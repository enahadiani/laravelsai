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
    .nav-tabs .nav-link.active {
        color: #fff;
    }

    .nav-tabs .nav-link.active::before {
        background: #fff;
        color: #fff;
    }
</style>
<div class="container-fluid mt-3">
    @include('mobile-dash.back')
    <div class="row mb-3">
        <div class="col-12">
            <h6>Pertumbuhan Laba Rugi Tahunan</h6>
            <p>Satuan Milyar Rupiah || <span class='label-periode-filter'></span></p>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-6 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-8 col-sm-12 px-0">Realisasi Growth PDPT, Beban, SHU, Beban SDM
                        <br> <span style="font-size:12px">Tahun <span class="rentang-tahun"></span></span>
                        </h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-4 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab3-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>%</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3-growth" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Growth</b></span></a> </li>
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
                        <div class="tab-pane" id="tab3-growth" role="tabpanel">
                            <div id="trend2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-4">
            <div class="card dash-card">
                <div class="card-header">
                    <div class="row mx-0">
                        <h6 class="card-title col-md-8 col-sm-12 px-0">Realisasi Growth Tuition Fee - NON Tuition Fee
                        <br> <span style="font-size:12px">Tahun <span class="rentang-tahun"></span></span>
                        </h6>
                        <ul role="tablist" style="border: none;" class="nav nav-tabs col-md-4 col-sm-12 px-0 justify-content-end">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab4-rp" role="tab" aria-selected="false"><span class="hidden-xs-down"><b>Rp</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4-persen" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>%</b></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4-growth" role="tab" aria-selected="true"><span class="hidden-xs-down"><b>Growth</b></span></a> </li>
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
                        <div class="tab-pane" id="tab4-growth" role="tabpanel">
                            <div id="trend4"></div>
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
    <div style="height:50px">&nbsp;</div>
    
</div>
<script>
    $('.nama-menu').html($nama_menu);
    $('body').addClass('dash-contents');
    $('html').addClass('dash-contents');
    $('.navbar_bottom').hide();
    $('.navbar_filter').show();
    if(localStorage.getItem("dore-theme") == "dark"){
        $('#btn-filter').removeClass('btn-outline-light');
        $('#btn-filter').addClass('btn-outline-dark');
    }else{
        $('#btn-filter').removeClass('btn-outline-dark');
        $('#btn-filter').addClass('btn-outline-light');
    }

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
                        <div class="form-group row dash-filter">
                            <p class="dash-kunci" hidden>dash_jenis</p> 
                            <label class="col-md-12">Jenis</label>
                            <div class="col-md-4">
                                <select class="form-control dash-filter-type" data-width="100%" name="jenis[]" id="jenis_type">
                                    <option value='' disabled>Pilih</option>
                                    <option value='=' selected>=</option>
                                </select>
                            </div>
                            <div class="col-md-8 dash-filter-from">
                                <select class="form-control" data-width="100%" name="jenis[]" id="jenis_from">
                                    <option value='' disabled>Pilih</option>
                                    <option value='YoY' selected>YoY</option>
                                    <option value='Current'>Current</option>
                                </select>
                            </div>
                            <div class="col-md-4 dash-filter-to">
                                <select class="form-control" data-width="100%" name="jenis[]" id="jenis_to">
                                    <option value='' disabled>Pilih</option>
                                    <option value='YoY' selected>YoY</option>
                                    <option value='Current'>Current</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="justify-content:flex-end;width:100%">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </form>
    `;
    
    $('#content-bottom-sheet').html(html);
    $('.c-bottom-sheet__sheet').css({ "width":"100%","margin-left": "0%", "margin-right":"0%"});
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

    var $dash_jenis = {
        type: "=",
        from: "YoY",
        to:""
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
                $('#jenis_type').selectize();
                $('#jenis_from').selectize();
                $('#jenis_to').selectize();

                $('#jenis_type')[0].selectize.setValue($dash_jenis.type);
                $('#jenis_from')[0].selectize.setValue($dash_jenis.from);
                $('#jenis_to')[0].selectize.setValue($dash_jenis.to);
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

                    var tahun = $dash_periode.from.substr(0,4);
                    var tahunLima = parseInt(tahun) - 6;
                    $('.rentang-tahun').text(tahunLima+" - "+tahun);
                    getBCGrowthRKA($dash_periode,$dash_jenis);
                    getBCGrowthTuition($dash_periode,$dash_jenis);
                    getBCRKA($dash_periode,$dash_jenis);
                    getBCRKAPersen($dash_periode,$dash_jenis);
                    getBCTuition($dash_periode,$dash_jenis);
                    getBCTuitionPersen($dash_periode,$dash_jenis);

                            
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



    function getBCRKA(periode,jenis){
        $.ajax({
            type:"GET",
            url:"{{ url('/mobile-dash/rka') }}",
            data:{ 'periode[0]' : periode.type,
                'periode[1]' : periode.from,
                'periode[2]' : periode.to, mode: $mode,
                'jenis[0]' : jenis.type,
                'jenis[1]' : jenis.from,
                'jenis[2]' : jenis.to},
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
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        })
    }

    function getBCRKAPersen(periode,jenis){
        $.ajax({
            type:"GET",
            url:"{{ url('/mobile-dash/rka-persen') }}",
            dataType:"JSON",
            data:{mode: $mode, 'periode[0]' : periode.type,
                'periode[1]' : periode.from,
                'periode[2]' : periode.to,
                'jenis[0]' : jenis.type,
                'jenis[1]' : jenis.from,
                'jenis[2]' : jenis.to},
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
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        })
    }

    function getBCGrowthRKA(periode,jenis){
        $.ajax({
            type:"GET",
            url:"{{ url('/mobile-dash/growth-rka') }}",
            data:{ 'periode[0]' : periode.type,
                'periode[1]' : periode.from,
                'periode[2]' : periode.to, mode: $mode,
                'jenis[0]' : jenis.type,
                'jenis[1]' : jenis.from,
                'jenis[2]' : jenis.to},
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
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        })
    }

    function getBCTuition(periode,jenis){
        $.ajax({
            type:"GET",
            url:"{{ url('/mobile-dash/tuition') }}",
            dataType:"JSON",
            data:{ 'periode[0]' : periode.type,
                'periode[1]' : periode.from,
                'periode[2]' : periode.to, mode: $mode,
                'jenis[0]' : jenis.type,
                'jenis[1]' : jenis.from,
                'jenis[2]' : jenis.to},
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
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        })
    }

    function getBCTuitionPersen(periode,jenis){
        $.ajax({
            type:"GET",
            url:"{{ url('/mobile-dash/tuition-persen') }}",
            dataType:"JSON",
            data:{ 'periode[0]' : periode.type,
                'periode[1]' : periode.from,
                'periode[2]' : periode.to, mode: $mode,
                'jenis[0]' : jenis.type,
                'jenis[1]' : jenis.from,
                'jenis[2]' : jenis.to},
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
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        })
    }


    function getBCGrowthTuition(periode,jenis){
        $.ajax({
            type:"GET",
            url:"{{ url('/mobile-dash/growth-tuition') }}",
            dataType:"JSON",
            data:{ 'periode[0]' : periode.type,
                'periode[1]' : periode.from,
                'periode[2]' : periode.to, mode: $mode,
                'jenis[0]' : jenis.type,
                'jenis[1]' : jenis.from,
                'jenis[2]' : jenis.to},
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
                    window.location="{{ url('/mobile-dash/sesi-habis') }}";
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

        $dash_jenis.type = $('#jenis_type')[0].selectize.getValue();
        $dash_jenis.from = $('#jenis_from')[0].selectize.getValue();
        $dash_jenis.to = $('#jenis_to')[0].selectize.getValue();
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
        var tahun = $dash_periode.from.substr(0,4);
        var tahunLima = parseInt(tahun) - 6;
        $('.rentang-tahun').text(tahunLima+" - "+tahun);
        getBCGrowthRKA($dash_periode,$dash_jenis);
        getBCGrowthTuition($dash_periode,$dash_jenis);
        getBCRKA($dash_periode,$dash_jenis);
        getBCRKAPersen($dash_periode,$dash_jenis);
        getBCTuition($dash_periode,$dash_jenis);
        getBCTuitionPersen($dash_periode,$dash_jenis);
        $('.c-bottom-sheet').removeClass('active');
    });

    $('#bottom-sheet-close').hide();
    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#periode')[0].selectize.setValue('');
    });

</script>