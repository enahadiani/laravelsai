<section id="detail-client" class="detail-section" style="display: none;">
    <section id="dektop-6" class="dekstop-6 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12 header-content">
                            <div class="glyph-icon iconsminds-left to-main-dash"></div>
                            <h6 class="card-title-2 text-bold text-medium detail-card">Komposisi Klien</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="komposisi-client-chart"></div>
                        <div class="table-list-client" id="table-list-client">
                            <table id="table-data-client" class="table table-hover table-borderless">
                                <thead>
                                    <th>No</th>
                                    <th>Client</th>
                                    <th>Pengeloaan</th>
                                    <th>Alamat</th>
                                    <th>Jumlah</th>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script type="text/javascript">
// LOAD DATA
function generateDataClient() {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-detail-client-data') }}",
        dataType: 'json',
        async:true,
        success:function(result){    
            var data = result.data
            if(result.status) {
                $('#table-data-client tbody').empty()
                if(data.length > 0) {
                    var no = 1;
                    var html = null
                    for(var i=0;i<data.length;i++) {
                        var row = data[i]
                        html += `<tr>
                            <td>${no}</td>    
                            <td>${row.client}</td>    
                            <td>${row.fungsi}</td>    
                            <td>${row.alamat}</td>    
                            <td style="text-align: right;">${sepNum(row.jumlah)}</td>    
                        </tr>`
                        no++;
                    }
                    $('#table-data-client tbody').append(html)
                }
            }
        }
    });
}

function generateChartClient() {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-detail-client-pie') }}",
        dataType: 'json',
        async:true,
        success:function(result){    
            var data = result.data
            console.log(data)
            Highcharts.chart('komposisi-client-chart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie',
                    // height: 239
                },
                title: { text: '' },
                subtitle: { text: '' },
                exporting:{ enabled: false },
                legend:{ enabled: true },
                credits: { enabled: false },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                            format: '{point.percentage:.1f} %'
                        },
                        size: 250,
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Jumlah',
                    colorByPoint: true,
                    data: data
                }]
            });
        }
    });  
}
// END LOAD DATA
</script>