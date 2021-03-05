<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('java-report/lap-kartu-proyek', null, formData, null, function(res){
        if(res.result.data_proyek.length > 0){
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
    if(data.data_proyek.length > 0) {
        var proyek = data.data_proyek[0];
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        html += "<h6 class='text-center'>Project Financial Summary</h6>";
        html += "<h6 class='text-center'>"+proyek.no_proyek+"</h6>";
        html += "<hr />";
        html += "<table class='table table-borderless ml-4'>";
        html += "<thead>";
        html += "<tr>";
        html += "<th style='width: 15%;'>Deskripsi Project</th>";
        html += "<th style='width: 5%;'>:</th>";
        html += "<th>"+proyek.keterangan+"</th>";
        html += "</tr>"
        html += "<tr>";
        html += "<th style='width: 15%;'>Nomor Kontrak</th>";
        html += "<th style='width: 5%;'>:</th>";
        html += "<th>"+proyek.no_kontrak+"</th>";
        html += "</tr>"
        html += "<th style='width: 15%;'>Vendor</th>";
        html += "<th style='width: 5%;'>:</th>";
        html += "<th>"+proyek.nama_cust+"</th>";
        html += "</tr>"
        html += "<th style='width: 15%;'>Tgl Berakhir Kontrak</th>";
        html += "<th style='width: 5%;'>:</th>";
        html += "<th>"+proyek.tgl_selesai+"</th>";
        html += "</tr>"
        html += "<th style='width: 15%;'>Nilai Kontrak (non-ppn)</th>";
        html += "<th style='width: 5%;'>:</th>";
        html += "<th>"+sepNum(proyek.nilai)+"</th>";
        html += "</tr>"
        html += "</thead>";
        html += "</table>";
        html += "<div class='table-responsive ml-2 mr-2'>";
        html += "<table class='table table-bordered' style='width: 98%;'>";
        html += "<thead>";
        html += "<tr>";
        html += "<th class='text-center' colspan='6'>Budget</th>";
        html += "<tr>";
        html += "<tr>";
        html += "<th class='text-center' style='width: 5%;'>No</th>";
        html += "<th class='text-center' style='width: 30%;'>Uraian Pekerjaan</th>";
        html += "<th class='text-center' style='width: 8%;'>Qty</th>";
        html += "<th class='text-center' style='width: 8%;'>Satuan</th>";
        html += "<th class='text-center' style='width: 15%;'>Harga (Rp)</th>";
        html += "<th class='text-center' style='width: 15%;'>Total (Rp)</th>";
        html += "<tr>";
        html += "</thead>";
        html += "<tbody>";
        var no = 1;
        for(var i=0;i<data.data_rab.length;i++) {
            var line = data.data_rab[i];
            html += "<tr>";
            html += "<td class='text-center'>"+no+"</td>"
            html += "<td class='text-left'>"+line.keterangan+"</td>"
            html += "<td class='text-right'>"+sepNum(line.jumlah)+"</td>"
            html += "<td class='text-center'>"+line.satuan+"</td>"
            html += "<td class='text-right'>"+sepNum(line.harga)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.harga * line.jumlah)+"</td>"
            html += "</tr>";

            no++;
        }
        html += "</tbody>";
        html += "</table>";
        html += "<br/>"
        html += "<table class='table table-bordered' style='width: 98%;'>";
        html += "<thead>";
        html += "<tr>";
        html += "<th class='text-center' colspan='7'>Actual</th>";
        html += "<tr>";
        html += "<tr>";
        html += "<th class='text-center' style='width: 5%;'>No</th>";
        html += "<th class='text-center' style='width: 10%;'>Tanggal</th>";
        html += "<th class='text-center' style='width: 10%;'>No Doc</th>";
        html += "<th class='text-center' style='width: 25%;'>Uraian Pekerjaan</th>";
        html += "<th class='text-center' style='width: 20%;'>Supplier</th>";
        html += "<th class='text-center' style='width: 15%;'>Jumlah (Rp)</th>";
        html += "<th class='text-center' style='width: 10%;'>Status</th>";
        html += "<tr>";
        html += "</thead>";
        html += "<tbody>";
        var no = 1;
        for(var i=0;i<data.data_beban.length;i++) {
            var line = data.data_beban[i];
            html += "<tr>";
            html += "<td class='text-center'>"+no+"</td>"
            html += "<td class='text-center'>"+line.tgl+"</td>"
            html += "<td class='text-center'>"+line.no_dokumen+"</td>"
            html += "<td class='text-left'>"+line.keterangan+"</td>"
            html += "<td class='text-left'>"+line.nama_vendor+"</td>"
            html += "<td class='text-right'>"+sepNum(line.nilai)+"</td>"
            html += "<td class='text-center'>"+line.status+"</td>"
            html += "</tr>";

            no++;
        }
        html += "</tbody>";
        html += "</table>";
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