<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-closing', null, formData, null, function(res){
        if(res.result.length > 0){
            $('#pagination').html('');
            var show = $('#show').val();
            generatePaginationDore('pagination',show,res);        
        }else{
            $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
        }
    });
}

drawLap($formData);

function drawRptPage(data,res,from,to){ 
    var data = data;
    var html = "";
    var arr_tl = [0,0,0,0,0,0,0,0,0];
    var x=1;
    if(data.length > 0) {
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        for(var i=0;i<data.length;i++) {
            var value = data[i];
            var diskon=0;
            var total=0;  
            var subTot=0;
            var no=1;
            html += "<div class='card card-body'>";
            html += "<h3><b>No Closing</b> <span class='pull-right'>#"+value.no_bukti+"</span></h3>";
            html += "<hr/>";
            html += "<div class='row'>";
            html += "<div class='col-md-12'>";
            html += "<div class='pull-left'>";
            html += "<p class='text-muted m-l-5'>";
            html += value.tanggal+"<br/>";
            html += "Saldo Awal: "+sepNum(value.saldo_awal);
            html += "<br/>Total Penjualan: "+sepNum(value.total_pnj);
            html += "<br/>"+value.nik_user;
            html += "</p>";
            html += "</div>"
            html += "</div>";
            html += "<div class='col-md-12'>";
            html += "<div class='table-responsive mt-40' style='clear: both;'>";
            html += "<table class='table table-hover'>";
            html += "<thead>";
            html += "<tr>";
            html += "<th class='text-center'>No</th>";
            html += "<th class='text-center'>No Bukti</th>";
            html += "<th class='text-center'>No Jual</th>";
            html += "<th class='text-center'>Periode</th>";
            html += "<th class='text-center'>Tanggal</th>";
            html += "<th class='text-right'>Diskon</th>";
            html += "<th class='text-right'>Nilai</th>";
            html += "<th>Keterangan</th>";
            html += "</tr>";
            html += "</thead>";
            html += "<tbody>";
            for (var j=0;j<res.res.data_detail.length;j++) {
                var value2 = res.res.data_detail[j];
                if(value.no_bukti == value2.no_bukti){
                    diskon+=+value2.diskon;
                    total+=+value2.nilai;
                    subTot+= +parseFloat(value2.total)+parseFloat(value2.diskon);
                    html += "<tr>"
                    html += "<td align='center' class='isi_laporan'>"+no+"</td>";
                    html += "<td align='center'  class='isi_laporan'>"+value2.no_bukti+"</td>";
                    html += "<td align='center' class='isi_laporan'>"+value2.no_jual+"</td>";
                    html += "<td align='center' class='isi_laporan'>"+value2.periode+"</td>";
                    html += "<td align='center' class='isi_laporan'>"+value2.tanggal+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.diskon)+"</td>";
                    html += "<td align='right' class='isi_laporan'>"+sepNum(value2.nilai)+"</td>";
                    html += "<td align='left' class='isi_laporan'>"+value2.keterangan+"</td>";
                    html += "</tr>";
                    no++;
                }
            }
            html += "</tbody>";
            html += "</table>";
            html += "</div>";
            html += "</div>"
            html += "<div class='col-md-12'>";
            html += "<div class='pull-right m-t-30 text-right'>";
            html += "<p>Discount: "+sepNum(diskon)+"</p>";
            html += "<hr/>";
            html += "<h3><b>Total: </b>"+sepNum(total)+"</h3>"
            html += "</div>";
            html += "<div class='clearfix'></div>"
            html += "</div>";
            html += "</div>";
            html += "</div>";
        }
        html += "<div style='page-break-after:always'></div>";
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>