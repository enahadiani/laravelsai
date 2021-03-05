<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('java-report/lap-saldo-proyek', null, formData, null, function(res){
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
        html += "<h6 class='text-center'>Saldo Proyek</h6>";
        html += "<hr />";
        html += "<div class='ml-2 mr-2' style='width: 1200px; overflow-x: scroll;'>";
        html += "<table class='table table-bordered'>";
        html += "<thead>";
        html += "<tr>";
        html += "<th class='text-center' style='width: 5%;'>No</th>";
        html += "<th class='text-center' style='width: 10%;'>No Proyek</th>";
        html += "<th class='text-center' style='width: 20%;'>No Kontrak</th>";
        html += "<th class='text-center' style='width: 8%;'>Tanggal Mulai</th>";
        html += "<th class='text-center' style='width: 8%;'>Tanggal Selesai</th>";
        html += "<th class='text-center' style='width: 30%;'>Keterangan</th>";
        html += "<th class='text-center' style='width: 15%;'>Vendor</th>";
        html += "<th class='text-center' style='width: 15%;'>Anggaran</th>";
        html += "<th class='text-center' style='width: 15%;'>Beban</th>";
        html += "<th class='text-center' style='width: 15%;'>Tagihan</th>";
        html += "<th class='text-center' style='width: 15%;'>Pembayaran</th>";
        html += "<tr>";
        html += "</thead>";
        html += "<tbody>";
        var no = 1;
        for(var i=0;i<data.length;i++) {
            var line = data[i];
            html += "<tr>";
            html += "<td class='text-center'>"+no+"</td>"
            html += "<td class='text-left'>"+line.no_proyek+"</td>"
            html += "<td class='text-left'>"+line.no_kontrak+"</td>"
            html += "<td class='text-center'>"+line.tgl_mulai+"</td>"
            html += "<td class='text-center'>"+line.tgl_selesai+"</td>"
            html += "<td class='text-left'>"+line.keterangan+"</td>"
            html += "<td class='text-left'>"+line.nama_cust+"</td>"
            html += "<td class='text-right'>"+sepNum(line.rab)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.beban)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.tagihan)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.bayar)+"</td>"
            html += "</tr>";

            no++;
        }
        html += "</tbody>";
        html += "</div>";
        html += "</div>";
        html += "<div style='page-break-after:always'></div>";
        html += "</div>";
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}

</script>