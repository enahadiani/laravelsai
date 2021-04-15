<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-aktap', null, formData, null, function(res){
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
    var html = ""
    var no = 1
    if(data.length > 0) {
        html += "<div class='sai-rpt-table-export-tbl-daftar-pnj'>";
        html += "<h6 class='text-center'>Laporan Aktiva Tetap</h6>";
        html += "<hr />";
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>";
        html += "<table class='table table-bordered' style='width: 1580px;'>";
        html += "<thead>";
        html += "<tr>";
        html += "<th rowspan='2' style='text-align: center;'>No</th>"
        html += "<th rowspan='2' style='text-align: center;'>Klp Aset</th>"
        html += "<th rowspan='2' style='text-align: center;'>Nama Klp Aset</th>"
        html += "<th rowspan='2' style='text-align: center;'>Kode PP</th>"
        html += "<th rowspan='2' style='text-align: center;'>Nama PP</th>"
        html += "<th rowspan='2' style='text-align: center;'>Tanggal</th>"
        html += "<th rowspan='2' style='text-align: center;'>Uraian Barang</th>"
        html += "<th colspan='2' style='text-align: center;'>Umur</th>"
        html += "<th rowspan='2' style='text-align: center;'>Nilai Perolehan</th>"
        html += "<th colspan='3' style='text-align: center;'>Nilai Depresiasi</th>"
        html += "<th rowspan='2' style='text-align: center;'>Write Off</th>"
        html += "<th rowspan='2' style='text-align: center;'>Nilai Buku</th>"
        html += "</tr>";
        html += "<tr>";
        html += "<th style='text-align: center;'>Bulan</th>"
        html += "<th style='text-align: center;'>%</th>"
        html += "<th style='text-align: center;'>AP S/D Bulan Lalu</th>"
        html += "<th style='text-align: center;'>AP Bulan Ini</th>"
        html += "<th style='text-align: center;'>AP S/D Bulan Ini</th>"
        html += "</tr>";
        html += "</thead>";
        html += "<tbody>";
        for(var i=0;i<data.length;i++) {
            var row = data[i]
            html += "<tr>"
            html += "<td style='text-align: center;'>"+no+"</td>"
            html += "<td style='text-align: center;'>"+row.kode_klpakun+"</td>"
            html += "<td style='text-align: center;'>"+row.nama_klpakun+"</td>"
            html += "<td style='text-align: center;'>"+row.kode_pp+"</td>"
            html += "<td style='text-align: center;'>"+row.nama_pp+"</td>"
            html += "<td style='text-align: center;'>"+row.tgl+"</td>"
            html += "<td style='text-align: left;'>"+row.nama+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.umur)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.persen)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.nilai)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.akumulasi_sd)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.akumulasi_bln)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.akumulasi_total)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.wo)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.nilai_buku)+"</td>"
            html += "</tr>"
            no++
        }
        html += "</tbody>"
        html += "</table>";
        html += "</div>";
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}


</script>