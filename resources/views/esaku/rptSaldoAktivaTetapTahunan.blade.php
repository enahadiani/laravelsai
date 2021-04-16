<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-aktap-tahun', null, formData, null, function(res){
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

function drawRptPage(data,res,from,to) { 
    console.log(data)
    console.log(res)
    var html = ""
    if(data.length > 0) {
        var no = 1;
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        html += "<h6 class='text-center'>Saldo Aktiva Tetap per Tahun</h6>";
        html += "<hr />"
        html += "<table class='table table-bordered'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th style='text-align: center; width: 15px;'>No</th>"
        html += "<th style='text-align: center; width: 150px;'>Kode</th>"
        html += "<th style='text-align: center; width: 250px;'>Nama Aktiva</th>"
        html += "<th style='text-align: center; width: 30px;'>Tahun</th>"
        html += "<th style='text-align: center; width: 90px;'>Nilai Perolehan</th>"
        html += "<th style='text-align: center; width: 90px;'>Nilai WO</th>"
        html += "<th style='text-align: center; width: 90px;'>Akum. Susut</th>"
        html += "<th style='text-align: center; width: 90px;'>Nilai Buku</th>"
        html += "</tr>"
        html += "</thead>"
        html += "<tbody>"
        for(var i=0;i<data.length;i++) {
            var row = data[i]
            html += "<tr>"
            html += "<td style='text-align: center;'>"+no+"</td>"
            html += "<td style='text-align: left;'>"+row.kode_klpakun+"</td>"
            html += "<td style='text-align: left;'>"+row.nama+"</td>"
            html += "<td style='text-align: center;'>"+row.tahun+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.so_awal)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.wo)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.ap)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.nilai_buku)+"</td>"
            html += "</tr>"
            no++
        }
        html += "</tbody>"
        html += "</table>"
        html += "<div style='page-break-after:always'></div>";
        html += "</div>"
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}

</script>