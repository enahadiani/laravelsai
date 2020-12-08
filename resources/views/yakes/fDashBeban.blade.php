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
    .fixed-filter {
        background-color: #f8f8f8;
        position: fixed;
        top: 9%;
        margin: 0;
        padding: 10px 0;
        padding-bottom: 10px;
        width: 100%;
        z-index: 1;
    }
    .select-dash {
        border-radius: 10px;
    }
</style>
<div id="filter-header">
    <div class="row">
        <div class="col-12">
            <h6>Beban</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select id="periode" class="form-control select-dash">

            </select>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 30px;">
    <div class="col-12 mb-4">
        <div class="card" style="height: 100%; border-radius:10px !important;">
            <h6 class="ml-4 mt-3" style="font-weight: bold;text-align:center;">Beban</h6>
            <div class="row">
                <div class="col-1">
                    <p class="keterangan">Dalam Rp. Juta</p>
                </div>
                <div class="col-11">
                    <div id="beban"></div>
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
                        <tbody id="detail-beban">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var tahun = "";
    var pembagi = 1000000;

    var header = document.getElementById('filter-header');
    var sticky = header.offsetTop;
    window.onscroll = function() {
        if(window.pageYOffset > sticky) {
            header.classList.add('fixed-filter')
        } else {
            header.classList.remove('fixed-filter')
        }
    }

    $.ajax({
        type:'GET',
        url: "{{ url('yakes-dash/data-tahun') }}",
        dataType: 'JSON',
        success: function(result) {
            var date = new Date();
            $.each(result.daftar, function(key, value){
                $('#periode').append("<option value="+value.tahun+">Tahun : "+value.tahun+"</option>")
            })
            $('#periode').val(date.getFullYear());
            tahun = date.getFullYear();
            getDataBeban(tahun);
        }
    });

    $('#periode').change(function(){
        $('#detail-beban').empty();
        var val = $(this).val();
        tahun = val;
        getDataBeban(tahun);
    })

    function getDataBeban(value) {
        if(value != null || value != '') {
            tahun = value
        } else {
            tahun = tahun
        }
        $('#detail-beban').empty();
        $.ajax({
            type:'GET',
            url: "{{ url('yakes-dash/data-beban') }}/"+tahun,
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
                        stack: 'beban',
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
                $('#detail-beban').append(html);
                
                Highcharts.chart('beban', {
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