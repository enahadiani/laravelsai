<link rel="stylesheet" href="{{ asset('dash-asset/dash-itpln/dash-gl.css?version=_').time() }}" />
<script>
    var dashGLArusKas = null;
    var dashGLLabaRugi = null;
    var filter_periode = "";

    function toMilyar(x,decimal=0,decimalmin=0) {
        if(x.toString().length <= 9){
            var nil = x / 1000000;
            return number_format(nil,decimal,decimalmin) + " Jt";
        }else{
            var nil = x / 1000000000;
            return number_format(nil,decimal,decimalmin) + " M";
        }
    }

    function toJuta(x,decimal=0,decimalmin=0) {
        var nil = x / 1000000;
        return number_format(nil,decimal,decimalmin) + " Jt";
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function getArusKas(param = {periode: filter_periode}){
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-itpln-dash/arus-kas-chart') }}",
            dataType: 'json',
            data: param,
            async:true,
            success:function(result){    
                dashGLArusKas = Highcharts.chart('dash-gl-arus-kas', {
                    chart: { height: (($(window).height() - 250)/5)*2 },
                    exporting:{ enabled: false },
                    legend:{ enabled:false },
                    credits: { enabled: false },
                    title: { align: 'left', text: 'Arus Kas' },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                        labels: { enabled: false }
                    },
                    yAxis: [
                        {
                            linewidth: 1,
                            title:{ text: '' },
                            labels: {
                                formatter: function () {
                                    return singkatNilai(this.value);
                                }
                            },
                        },
                        {
                            linewidth: 1,
                            opposite: true,
                            title:{ text: '' },
                            labels: {
                                formatter: function () {
                                    return singkatNilai(this.value);
                                }
                            },
                        },
                    ],
                    tooltip: {
                        formatter: function () {   
                            return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + number_format(this.y,2);
                        }
                    },
                    plotOptions: {
                        series:{
                            pointPadding: 0,
                            shadow: false,
                            dataLabels: {
                                enabled: false
                            }
                        }
                    },
                    series: result.data
                });
            } 
        });
    }

    function getLabaRugi(param = {periode: filter_periode}){
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-itpln-dash/laba-rugi-chart') }}",
            dataType: 'json',
            data: param,
            async:true,
            success:function(result){    
                var colors = ['#0058E4','#9FC4FF','#FFB703'];

                dashGLLabaRugi = Highcharts.chart('dash-gl-laba-rugi', {
                    chart: { height: (($(window).height() - 250)/5)*2 },
                    exporting:{ enabled: false },
                    legend:{ enabled:false },
                    credits: { enabled: false },
                    title: { align: 'left', text: 'Laba Rugi' },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                        labels: { enabled: false }
                    },
                    yAxis: [
                        {
                            linewidth: 1,
                            title:{ text: '' },
                            labels: {
                                formatter: function () {
                                    return singkatNilai(this.value);
                                }
                            },
                        },
                        {
                            linewidth: 1,
                            opposite: true,
                            title:{ text: '' },
                            labels: {
                                formatter: function () {
                                    return singkatNilai(this.value);
                                }
                            },
                        },
                    ],
                    tooltip: {
                        formatter: function () {   
                            return '<span style="color:' + this.series.color + '">' + this.series.name + '</span>: <b>' + number_format(this.y,2);
                        }
                    },
                    plotOptions: {
                        series:{
                            pointPadding: 0,
                            shadow: false,
                            dataLabels: {
                                enabled: false
                            }
                        }
                    },
                    series: result.data
                });
            } 
        });
    }

    function getLabaRugiBox(param = {periode: filter_periode}){
        
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-itpln-dash/laba-rugi-box') }}",
            dataType: 'json',
            data: param,
            async:true,
            success:function(result){    
                $('#dash-gl-pdpt-nilai').text(0);
                $('#dash-gl-pdpt-yoy').text(0+'%');
                $('#dash-gl-beban-nilai').text(0);
                $('#dash-gl-beban-yoy').text(0+'%');
                $('#dash-gl-labarugi-nilai').text(0);
                $('#dash-gl-labarugi-yoy').text(0+'%');
                if(result.status){
                    if(typeof result.data !== 'undefined'){
                        var line = result.data;
                        $('#dash-gl-pdpt-nilai').text(toMilyar(line.pdpt,2));
                        $('#dash-gl-pdpt-yoy').text(number_format(line.yoy_pdpt,2)+'%');
                        if(parseFloat(line.yoy_pdpt) > 0){
                            $('#dash-gl-pdpt-yoy').html('<i class="fa fa-arrow-up green-text mr-1"></i>'+number_format(line.yoy_pdpt,2)+'%').addClass('green-text').removeClass('red-text');
                        }else{
                            $('#dash-gl-pdpt-yoy').html('<i class="fa fa-arrow-down red-text mr-1"></i>'+number_format(line.yoy_pdpt,2)+'%').addClass('red-text').removeClass('green-text');
                        }
                        $('#dash-gl-beban-nilai').text(toMilyar(line.beban,2));
                        if(parseFloat(line.yoy_beban) > 0){
                            $('#dash-gl-beban-yoy').html('<i class="fa fa-arrow-up red-text mr-1"></i>'+number_format(line.yoy_beban,2)+'%').addClass('red-text').removeClass('green-text');
                        }else{
                            $('#dash-gl-beban-yoy').html('<i class="fa fa-arrow-down green-text mr-1"></i>'+number_format(line.yoy_beban,2)+'%').addClass('green-text').removeClass('red-text');
                        }
                        $('#dash-gl-labarugi-nilai').text(toMilyar(line.labarugi,2));
                        if(parseFloat(line.yoy_labarugi) > 0){
                            $('#dash-gl-labarugi-yoy').html('<i class="fa fa-arrow-up green-text mr-1"></i>'+number_format(line.yoy_labarugi,2)+'%').addClass('green-text').removeClass('red-text');
                        }else{
                            $('#dash-gl-labarugi-yoy').html('<i class="fa fa-arrow-down red-text mr-1"></i>'+number_format(line.yoy_labarugi,2)+'%').addClass('red-text').removeClass('green-text');
                        }
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dash-itpln/sesi-habis') }}";
                }
            }
        });
    }

    function getRasioBox(param = {periode: filter_periode}){
        
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-itpln-dash/rasio-box') }}",
            dataType: 'json',
            data: param,
            async:true,
            success:function(result){    
                $('#gross-profit').text(0+'%');
                $('#operating-rasio').text(0+'%');
                $('#net-profit').text(0+'%');
                if(result.status){
                    if(typeof result.data !== 'undefined'){
                        var line = result.data;
                        $('#gross-profit').text(number_format(line.DB02.hasil,2)+'%');
                        $('#operating-rasio').text(number_format(line.DB01.hasil,2)+'%');
                        $('#net-profit').text(number_format(line.DB03.hasil,2)+'%');
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dash-itpln/sesi-habis') }}";
                }
            }
        });
    }

    function getPeriode(){
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-itpln-dash/periode') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#periode-dashfilter').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].nama, value:result.data[i].periode}]);  
                        }
                        control.setValue("{{ Session::get('periode') }}");
                        filter_periode = "{{ Session::get('periode') }}";
                        setTimeout(() => {
                            getLabaRugiBox();
                            getRasioBox();
                            getArusKas();
                            getLabaRugi();
                        }, 100);
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('dash-itpln/sesi-habis') }}";
                }
            }
        });
    }

    $(document).ready(function(){
        getPeriode();
    })

    $(window).on('resize', function(){
        var win = $(this); //this = window
        var $height = win.height();
        var heighChart = 0;

        heighChart = (($height - 250)/5) * 2;

        if(typeof dashGLArusKas != 'undefined' && dashGLArusKas != null){
            dashGLArusKas.update({
                chart: {
                    height: heighChart,
                }
            })
        }

        if(typeof dashGLLabaRugi != 'undefined' && dashGLLabaRugi != null){
            dashGLLabaRugi.update({
                chart: {
                    height: heighChart,
                }
            })
        }
    });

    $('#btn-filter').click(function(){
        $('#modalFilterDash').modal('show');
    });

    $('#modalFilterDash').on('click','#btn-tampil',function(e){
        e.preventDefault();
        filter_periode = $('#periode-dashfilter')[0].selectize.getValue();
        $('#modalFilterDash').modal('hide');
        getLabaRugiBox();
        getRasioBox();
        getArusKas();
        getLabaRugi();
    });

    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#periode-dashfilter')[0].selectize.setValue('')
        jumFilter();
    });

</script>
<section id="header-dash" class="pb-3">
    <div class="row ">
        <div class="col-md-9 col-sm-12">
            <h6 class="mb-0">
                Dashboard GL
            </h6>
        </div>
        <div class="col-md-3 col-sm-12">
            <button id="btn-filter" class="btn btn-light float-right" style="font-size:1rem !important;line-height: 1;">
                <i class="mr-1 fa fa-filter"></i> 
                Filter</button>
        </div>
    </div>
</section>
<section id="main-dash">
    <div class="row ">
        <div class="col-md-3 col-sm-12">
            <div class="row mb-4">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body p-3" style="height: calc((((100vh - 190px)/5)*3) + 24px);">
                            <h6>Overview Laba Rugi</h6>
                            <div class="vertical-middle">
                                <table class="table table-borderless table-box">
                                    <tr>
                                        <td colspan="2">Pendapatan</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" style="width:60%" class="nilai-box" id="dash-gl-pdpt-nilai"></td>
                                        <td style="width:40%" class="text-right" id="dash-gl-pdpt-yoy">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-muted">Tahun Lalu</td>
                                    </tr>
                                    <tr>
                                        <td class="pemisah-box">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Beban</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" style="width:60%" class="nilai-box" id="dash-gl-beban-nilai"></td>
                                        <td style="width:40%" class="text-right" id="dash-gl-beban-yoy">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-muted">Tahun Lalu</td>
                                    </tr>
                                    <tr>
                                        <td class="pemisah-box">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Laba Rugi</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2" style="width:60%" class="nilai-box" id="dash-gl-labarugi-nilai"></td>
                                        <td style="width:40%" class="text-right" id="dash-gl-labarugi-yoy">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-muted">Tahun Lalu</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body p-3" style="height: calc((100vh - 190px)/5);">
                            <h6 class="text-muted">Gross Profit Margin</h6>
                            <div class="nilai-box" id="gross-profit"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body p-3" style="height: calc((100vh - 190px)/5);">
                            <h6 class="text-muted">Operating Ratio</h6>
                            <div class="nilai-box" id="operating-rasio"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body p-3" style="height: calc((100vh - 190px)/5);">
                            <h6 class="text-muted">Net Profit Margin</h6>
                            <div class="nilai-box" id="net-profit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card mb-4">
                        <div class="card-body p-0" style="height: calc(((100vh - 190px)/5)*2);">
                            <div id="dash-gl-arus-kas"></div>
                            <div class="keterangan-grafik">
                                <div class="label-grafik">
                                    <div class="legend-symbol-1"></div>
                                    <span class="legend-text">Uang Masuk</span>
                                </div>
                                <div class="label-grafik">
                                    <div class="legend-symbol-2"></div>
                                    <span class="legend-text">Uang Keluar</span>
                                </div>
                                <div class="label-grafik">
                                    <div class="legend-symbol-3"></div>
                                    <span class="legend-text">Saldo Uang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body p-0" style="height: calc(((100vh - 190px)/5)*2);">
                            <div id="dash-gl-laba-rugi"></div>
                            <div class="keterangan-grafik">
                                <div class="label-grafik">
                                    <div class="legend-symbol-1"></div>
                                    <span class="legend-text">Pendapatan</span>
                                </div>
                                <div class="label-grafik">
                                    <div class="legend-symbol-2"></div>
                                    <span class="legend-text">Beban</span>
                                </div>
                                <div class="label-grafik">
                                    <div class="legend-symbol-3"></div>
                                    <span class="legend-text">Laba Rugi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- @include('modal_filter') --}}

<!-- MODAL FILTER -->
<div class="modal fade modal-right" id="modalFilterDash" tabindex="-1" role="dialog"
aria-labelledby="modalFilterDash" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px !important">
            <form id="form-filter-dash">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="modal-title pl-0">Filter</h6>
                    <button type="button" class="close m-0" data-dismiss="modal" aria-label="Close" style="right: -10px !important;
                    top: 10px !important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div class="form-group row dash-filter px-3">
                        <label class="col-md-12 px-0">Periode</label>
                        <select id="periode-dashfilter" class="form-control col-md-12">   
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;border: none;position: absolute;bottom: 0px;width: 100%;">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="button" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
