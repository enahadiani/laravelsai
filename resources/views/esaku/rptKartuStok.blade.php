<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-kartu-stok', null, formData, null, function(res){
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
    var data = data;
    var html = "";
    var arr_tl = [0,0,0,0,0,0,0,0,0];
    var x=1;

    if(data.length > 0) { 
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        for(var i=0;i<data.length;i++) { 
            var value = data[i];
            html += "<table class='table table-bordered'>";
            html += "<tbody>";
            html += "<tr>";
            html += "<th>Kode Barang</th>"
            html += "<th colspan='7'>"+value.kode_barang+"</th>";
            html += "</tr>";
            html += "<tr>";
            html += "<th>Nama Barang</th>";
            html += "<th colspan='7'>"+value.nama_barang+"</th>";
            html += "</tr>";
            html += "<tr>";
            html += "<th>Gudang</th>";
            html += "<th colspan='7'>"+value.nama_gudang+"</th>";
            html += "</tr>";
            html += "<tr>"
            html += "<th>Stok Awal</th>";
            html += "<th colspan='7'>"+sepNum(value.stok)+"</th>";
            html += "</tr>";
            html += "</tbody>";
            html += "<tbody>";
            html += "<tr>";
            html += "<th class='text-center'>Tanggal</th>";
            html += "<th class='text-center'>No. Bukti</th>";
            html += "<th class='text-center'>Keterangan</th>";
            html += "<th class='text-center'>Modul</th>";
            html += "<th class='text-center'>Masuk</th>";
            html += "<th class='text-center'>Keluar</th>";
            html += "<th class='text-center'>Stok</th>";
            html += "</tr>";
            //ini data detail
            html += "<tr>";
            html += "<td colspan='4' class='text-right isi_laporan'>Jumlah</td>"
            html += "<td class='text-right isi_laporan'>0</td>"
            html += "<td class='text-right isi_laporan'>0</td>"
            html += "<td class='text-right isi_laporan'>0</td>"
            html += "</tr>";
            html += "</tbody>";
            html += "</table>";
        }
        html += "<div style='page-break-after:always'></div>";
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>