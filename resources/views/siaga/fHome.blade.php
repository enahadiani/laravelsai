<link href="{{ asset('dash-siaga.css') }}" rel="stylesheet">
<div id='dash_page_home'>
    <div class="row header-dash mb-2">
        <div class="col-md-8 px-0">
            <h6 class='font-weight-light' style='color: #000000; font-size:22px !important;'>Dashboard Summary</h6>
        </div>
        <div class="col-md-4 text-right px-0">
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
        </div>
    </div>
    <div class="row body-dash" style="position: relative;">
        <div class='col-md-2dot4 col-12'>
            <div class="small-box bg-yellow">
                <div class="inner">
                    <center>
                        <p>Revenue</p>
                        <h3 id='home_revenue_box'></h3>
                    </center>
                </div>
                <div class="icon"><i class="fa fa-line-chart"></i></div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class='col-md-2dot4 col-12'>
            <div class="small-box bg-blue">
                <div class="inner">
                    <center>
                        <p>COGS</p>
                        <h3 id='home_cogs_box'></h3>
                    </center>
                </div>
                <div class="icon"><i class="fa fa-money"></i></div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class='col-md-2dot4'>
            <div class="small-box bg-purple">
                <div class="inner">
                    <center>
                        <p>Gross Profit</p>
                        <h3 id='home_gp_box'></h3>
                    </center>
                </div>
                <div class="icon"><i class="fa fa-pie-chart"></i></div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class='col-md-2dot4'>
            <div class="small-box bg-red">
                <div class="inner">
                    <center>
                        <p>Operating Expense</p>
                        <h3 id='home_opex_box'></h3>
                    </center>
                </div>
                <div class="icon"><i class="fa fa-credit-card"></i></div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class='col-md-2dot4'>
            <div class="small-box bg-aqua">
                <div class="inner">
                    <center>
                        <p>Net Income</p>
                        <h3 id='home_ni_box'></h3>
                    </center>
                </div>
                <div class="icon"><i class="fa fa-bank"></i></div>
                <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-3'>
            <div class='card card-primary'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> Revenue
                </div>
                <div class='card-body pad'>
                    <div id='home_rev_chart1'></div>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='card card-success'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> Rev. Contribution
                </div>
                <div class='card-body pad'>
                    <div id='home_rev_chart2'></div>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='card card-warning'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> GP Contribution
                </div>
                <div class='card-body pad'>
                    <div id='home_gp_chart1'></div>
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div class='card card-danger'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> GP
                </div>
                <div class='card-body pad'>
                    <div id='home_gp_chart2'></div>
                </div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-4'>
            <div class='card card-warning'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> OPEX
                </div>
                <div class='card-body pad'>
                    <div id='home_opex_chart1'></div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class='card card-warning'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> Others
                </div>
                <div class='card-body pad'>
                    <div id='home_others_chart1'></div>
                </div>
            </div>
        </div>
        <div class='col-md-4'>
            <div class='card card-warning'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> Net Income
                </div>
                <div class='card-body pad'>
                    <div id='home_ni_chart1'></div>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
            <div class='card card-warning'>
                <div class='card-header pt-3'>
                    <i class='fa fa-line-chart'></i> Summary
                </div>
                <div class='card-body pad'>
                    <div id='home_summary_table'></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:0 !important">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right:30px !important;margin-top:0px !important">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control" data-width="100%" name="dept" id="dept">
                                <option value='#'>Pilih Lokasi</option>
                            </select>
                        </div>
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
<script>
    
$('body').addClass('dash-contents');
$('html').addClass('dash-contents');
    var periode = "";

    function sepNum2(x){
        var num = parseFloat(x).toFixed(2);
        var parts = num.toString().split(".");
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
        return parts.join(",");
    }

    function drawChart(type, selector, series_array, categories, exporting, click_callback,tooltip){
        if (typeof categories === 'undefined') { categories = null; }
        if (typeof exporting === 'undefined') { exporting = false; }
        if (typeof click_callback === 'undefined') { click_callback = null; }
        if (typeof tooltip === 'undefined') { tooltip = {}; }
        var options = {
            chart: {
                renderTo: selector,
                type: type
            },
            title:{
                text:''
            },
            tooltip: tooltip,
            exporting: { 
                enabled: exporting
            },
            series: [],
            xAxis: {
                title: {
                    text: null
                },
                categories: []
            },
            yAxis:{
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return singkatNilai(this.value);
                    }
                }
            },
            credits: {
                enabled: false
            },
        };
        
        options.series = series_array;
        options.xAxis.categories = categories;

        if(click_callback !== null){
            options.plotOptions = click_callback;
        }

        new Highcharts.Chart(options);
    }

    function drawTable(parent_container, header_html, data_array, data_index_array, created_table_selector, col_format_obj){
        if (typeof created_table_selector === 'undefined') { created_table_selector = null; }
        if (typeof col_format_obj === 'undefined') { col_format_obj = null; }
        var table = "<table "+created_table_selector+">";
        var col = "";
        table += header_html;
        for(x=0; x<data_array.length; x++){
            col += "<tr>";

            for(i=0; i<data_index_array.length; i++){
                var str = data_array[x][data_index_array[i]];

                if(str != null){
                    if(col_format_obj != null){
                        if(col_format_obj[data_index_array[i]] != undefined || col_format_obj[data_index_array[i]] != null){
                            col += "<td>"+generateFormat(col_format_obj[data_index_array[i]], str)+"</td>";
                        }else{
                            col += "<td>"+str+"</td>";
                        }
                    }else{
                    }
                }else{
                    col += "<td> </td>";
                }

            }

            col += "</tr>";
        }
        table += col+"</table>";

        // console.log(table);
        $(parent_container).html(table);
    }

    function getPeriode(){
        $.ajax({
            type:"GET",
            url:"{{ url('siaga-dash/periode') }}",
            dataType: "JSON",
            success: function(result){
                var select = $('#periode').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    var latest = "";
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].periode, value:result.data[i].periode}]);
                            latest = result.data[i].periode;
                        }
                    }
                    periode = (latest != "" ? latest : "{{ Session::get('periode') }}");
                    control.setValue(periode);
                    loadService('home','GET',"{{ url('siaga-dash/summary') }}",{periode : periode,dept: "All"});
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('siaga-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getDept(){
        $.ajax({
            type:"GET",
            url:"{{ url('siaga-dash/dept') }}",
            dataType: "JSON",
            success: function(result){
                var select = $('#dept').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].dept, value:result.data[i].dept}]);
                        }
                        control.addOption([{text:"All", value:"All"}]);
                    }
                    control.setValue("All");
                    
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('siaga-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }
    
    getPeriode();
    getDept();

    function loadService(index,method,url,param){
        $.ajax({
            type: method,
            url: url,
            dataType: 'json',
            data: param,
            success:function(data){    
                if(data.status){
                    switch(index){
                        case 'home':
                            var periode = param.periode;
                            $('#home_revenue_box').text(sepNum(data.REVENUE));
                            $('#home_cogs_box').text(sepNum(data.COGS));
                            $('#home_gp_box').text(sepNum(data.GP));
                            $('#home_opex_box').text(sepNum(data.OPEX));
                            $('#home_ni_box').text(sepNum(data["Net Income"]));
                            
                            drawChart('column', 'home_rev_chart1', [data.series.REVENUE], data.categories);
                            drawChart('pie', 'home_rev_chart2', [data.grouping.REVENUE],'',false,{
                                pie: {
                                    dataLabels: {
                                        enabled: true,
                                        // crop:false,
                                        
                                        alignTo: 'plotEdges',
                                        overflow:'justify',
                                        format: '<strong>{point.name}</strong><br>{point.percentage:.1f}%'
                                    }
                                }
                            },{
                                pointFormat: '{series.name}: <b>{point.y}</b><br><b>{point.percentage:.2f}%</b>'
                            });
                            drawChart('pie', 'home_gp_chart1',[data.grouping.GP],'',false,{
                                pie: {
                                    dataLabels: {
                                        enabled: true,
                                        // crop:false,
                                        
                                        alignTo: 'plotEdges',
                                        overflow:'justify',
                                        format: '<strong>{point.name}</strong><br>{point.percentage:.1f}%'
                                    }
                                }
                            },{
                                pointFormat: '{series.name}: <b>{point.y}</b><br><b>{point.percentage:.2f}%</b>'
                            });
                            drawChart('column', 'home_gp_chart2', [data.series.GP], data.categories);
                            drawChart('column', 'home_opex_chart1', [data.series.OPEX], data.categories);
                            drawChart('column', 'home_others_chart1', [data.series.OTHERS], data.categories);
                            drawChart('column', 'home_ni_chart1', [data.series["Net Income"]], data.categories);

                            var tahun = periode.substr(0,4);
                            var tahunLalu = parseFloat(tahun) - 1;
                            var header_html =   "<thead><tr>"+
                                                    "<th rowspan='2'>Description</th>"+
                                                    "<th colspan='2'>Actual</th>"+
                                                    "<th colspan='2'>RKAP</th>"+
                                                    "<th rowspan='2'>Actual sd</th>"+
                                                    "<th colspan='2'>Achiev</th>"+
                                                    "<th rowspan='2'>Growth</th>"+
                                                "</tr>"+
                                                "<tr>"+
                                                    "<th>sd "+tahunLalu+"</th>"+
                                                    "<th>Full "+tahunLalu+"</th>"+
                                                    "<th>sd "+tahun+"</th>"+
                                                    "<th>Full "+tahun+"</th>"+
                                                    "<th>sd</th>"+
                                                    "<th>Full</th>"+
                                                "</tr></thead>";
                            var index_array = ["klp","ytd","fullyear","ytd_rkap","fullyear_rkap","n1","ach","ach2","grow"];
                            var format_obj = {"ytd":"sepNum2Kanan","fullyear":"sepNum2Kanan","ytd_rkap":"sepNum2Kanan","fullyear_rkap":"sepNum2Kanan","n1":"sepNum2Kanan","ach":"sepNum2Kanan","ach2":"sepNum2Kanan","grow":"sepNum2Kanan"};

                            drawTable('#home_summary_table', header_html, data.summary, index_array, "class='table table-bordered table-striped'", format_obj);
                        break;
                    }
                }
            }
        });
    }

    $('#form-filter').submit(function(e){
        e.preventDefault();
        var per = $('#periode')[0].selectize.getValue();
        var dept = $('#dept')[0].selectize.getValue();
        loadService('home','GET',"{{ url('siaga-dash/summary') }}",{periode : per,dept: dept});
        
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
</script>