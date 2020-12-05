<style>
    table.table-akun > thead > tr > th {
        color: #f0f0f0;
        text-align: center;
    }
    .card{
        border-radius: 0 !important;
        box-shadow: none;
        border: 1px solid #f0f0f0;
    }
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
    table, td, th {
        border: 1px solid #d3d3d3 !important;
        margin-bottom: 10px;
    }  

    th {
        padding: 5px;
        text-align: center;
        background-color: #f9f9f9 !important;
    }

    .keterangan {
        writing-mode: vertical-lr;
        margin: 0;
        position: absolute;
        margin-left: 10px;
        top: 30%;
    }
</style>
<div class="row">
    <div class="col-6">
        <h2 style="position:absolute">Pendapatan Investasi</h2>
    </div>
    <div class="col-6">
        <button id="filter-btn" class="btn btn-light" style="position: absolute;margin: 0;right: 0;">Filter</button>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Pendapatan Investasi</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="invest"></div>
                </div>
                <div class="col-12 ml-2 mr-4">
                    <table style="width: 99%; margin-right: 10px;">
                        <thead>
                            <tr>
                                <th style="width:15%;"></th>
                                <th style="width:7%;">Jan</th>
                                <th style="width:7%;">Feb</th>
                                <th style="width:7%;">Mar</th>
                                <th style="width:7%;">Apr</th>
                                <th style="width:7%;">Mei</th>
                                <th style="width:7%;">Jun</th>
                                <th style="width:7%;">Jul</th>
                                <th style="width:7%;">Agt</th>
                                <th style="width:7%;">Sep</th>
                                <th style="width:7%;">Okt</th>
                                <th style="width:7%;">Nov</th>
                                <th style="width:7%;">Des</th>
                            </tr>
                        </thead>
                        <tbody id="detail-invest">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- FILTER --}}
 <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row">
                            <label>Tahun</label>
                            <select class="form-control" data-width="100%" name="inp-filter_tahun" id="inp-filter_tahun">
                                
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        {{-- <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button> --}}
                        <button type="button" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END FILTER --}}
<script type="text/javascript">
    var tahun = "";
    var pembagi = 1000000;
    $('#filter-btn').click(function(){
        $('#modalFilter').modal('show');
    });

    var select = $('#inp-filter_tahun').selectize({
        onChange: function(value){
            tahun = value
        }
    })

    $('#btn-tampil').click(function(){
        var tahun = select[0].selectize.getValue()
        getDataPendapatan(tahun);
        $('#modalFilter').modal('hide');
    })

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-tahun') }}",
        dataType: 'JSON',
        success: function(result) {
            var date = new Date();
            var select = $('#inp-filter_tahun').selectize();
            select = select[0];
            var control = select.selectize;
            control.clearOptions();

            for(i=0;i<result.daftar.length;i++){ 
                control.addOption([{text:result.daftar[i].tahun, value:result.daftar[i].tahun}]);   
            }
            control.setValue(date.getFullYear());
            tahun = date.getFullYear();
            getDataPendapatan(tahun);
        }
    });

    function getDataPendapatan(value) {
        if(value != null || value != '') {
            tahun = value
        } else {
            tahun = tahun
        }
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-pendapatan') }}/"+tahun,
            dataType: 'JSON',
            success: function(result) {
                var data = result.daftar;
                var html = "";
                var chart = [];

                for(var i=0;i<data.length;i++) {
                    
                    chart.push({
                        name:data[i].nama, 
                        data:[
                            parseFloat((parseFloat(data[i].jan)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].feb)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].mar)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].apr)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].mei)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].jun)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].jul)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].agu)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].sep)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].okt)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].nov)/pembagi).toFixed(3)),
                            parseFloat((parseFloat(data[i].des)/pembagi).toFixed(3)),
                        ],
                        stack: 'invest',
                        color: data[i].warna 
                    })
                    html += "<tr>";
                    html += "<td style='position: relative;'>";
                    html += "<div style='height: 15px; width:25px; background-color:"+data[i].warna+";display:inline-block;margin-left:3px;margin-top:1px;'></div>";
                    html += "&nbsp"+data[i].nama
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].jan < 0) {
                            html += "("+sepNum(data[i].jan/pembagi)+")";
                        } else {
                            html += sepNum(data[i].jan/pembagi); 
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].feb < 0) {
                            html += "("+sepNum(data[i].feb/pembagi)+")";
                        } else {
                            html += sepNum(data[i].feb/pembagi);    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].mar < 0) {
                            html += "("+sepNum(data[i].mar/pembagi)+")";
                        } else {
                            html += sepNum(data[i].mar/pembagi);    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].apr < 0) {
                            html += "("+sepNum(data[i].apr/pembagi)+")";
                        } else {
                            html += sepNum(data[i].apr/pembagi);    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].mei < 0) {
                            html += "("+sepNum(data[i].mei/pembagi)+")";
                        } else {
                            html += sepNum(data[i].mei/pembagi); 
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].jun < 0) {
                            html += "("+sepNum(data[i].jun/pembagi)+")";
                        } else {
                            html += sepNum(data[i].jun/pembagi);   
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].jul < 0) {
                            html += "("+sepNum(data[i].jul/pembagi)+")";
                        } else {
                            html += sepNum(data[i].jul/pembagi);   
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].agu < 0) {
                            html += "("+sepNum(data[i].agu/pembagi)+")";
                        } else {
                            html += sepNum(data[i].agu/pembagi); 
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].sep < 0) {
                            html += "("+sepNum(data[i].sep/pembagi)+")";
                        } else {
                            html += sepNum(data[i].sep/pembagi)    
                        }
                    html += "</td>";
                    html += "<td style='text-align: right;'>";
                        if(data[i].okt < 0) {
                            html += "("+sepNum(data[i].okt/pembagi)+")";
                        } else {
                            html += sepNum(data[i].okt/pembagi);    
                        }
                    html += "</td>"
                    html += "<td style='text-align: right;'>";
                        if(data[i].nov < 0) {
                            html += "("+sepNum(data[i].nov/pembagi)+")";
                        } else {
                            html += sepNum(data[i].nov/pembagi);    
                        }
                    html += "</td>"
                    html += "<td style='text-align: right;'>";
                        if(data[i].des < 0) {
                            html += "("+sepNum(data[i].des/pembagi)+")";
                        } else {
                            html += sepNum(data[i].des/pembagi);
                        }
                    html += "</td>"
                    html += "</tr>";
                }
                $('#detail-invest').append(html);
                
                Highcharts.chart('invest', {
                    chart: {
                        type: 'column',
                        height: 300
                    },
                    legend:{ enabled:false },
                    credits: {
                        enabled: false
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        labels: {
                            enabled: true
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
                    },
                    yAxis: {
                        visible: true,
                        title: {
                            enabled: false
                        }
                    },

                    tooltip: {
                        enabled: false
                        // formatter: function () {
                        //     return '<b>' + this.x + '</b><br/>' +
                        //         this.series.name + ': ' + this.y + '<br/>' +
                        //         'Total: ' + this.point.stackTotal;
                        // }
                    },
                    plotOptions: {
                        column: {
                            stacking: 'normal'
                        }
                    },
                    series: chart
                });
                
            }
        });
    }
</script>