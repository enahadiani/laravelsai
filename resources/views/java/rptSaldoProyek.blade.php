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
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>";
        html += "<table class='table table-bordered' style='width: 1580px;'>";
        html += "<thead>";
        html += "<tr>";
        html += "<th class='text-center' style='width: 10px;'>No</th>";
        html += "<th class='text-center' style='width: 140px;'>No Proyek</th>";
        html += "<th class='text-center' style='width: 250px'>No Kontrak</th>";
        html += "<th class='text-center' style='width: 100px'>Tanggal Mulai</th>";
        html += "<th class='text-center' style='width: 120px'>Tanggal Selesai</th>";
        html += "<th class='text-center' style='width: 200px'>Keterangan</th>";
        html += "<th class='text-center' style='width: 150px'>Vendor</th>";
        html += "<th class='text-center' style='width: 90px'>Nilai Proyek</th>";
        html += "<th class='text-center' style='width: 90px'>Anggaran</th>";
        html += "<th class='text-center' style='width: 90px'>Beban</th>";
        html += "<th class='text-center' style='width: 90px'>Tagihan</th>";
        html += "<th class='text-center' style='width: 90px'>Pembayaran</th>";
        html += "<th class='text-center' style='width: 90px'>Profit</th>";
        html += "<th class='text-center' style='width: 50px'>Persentase</th>";
        html += "<tr>";
        html += "</thead>";
        html += "<tbody>";
        var no = 1;
        for(var i=0;i<data.length;i++) {
            var line = data[i];
            var profit = parseInt(line.nilai_proyek)-parseInt(line.beban);
            var presentase =  ((profit/parseInt(line.nilai_proyek))*100).toFixed(2)
            if(profit < 0) {
                profit = '-'+sepNum(profit)
            } else {
                profit = sepNum(profit)
            }
            if(presentase < 0) {
                presentase = '-'+sepNum(presentase)
            } else if(isNaN(presentase)) {
                presentase = 0
            }
            html += "<tr class='report-link kartuproyek' style='cursor:pointer;' data-no_proyek='"+line.no_proyek+"'>";
            html += "<td class='text-center'>"+no+"</td>"
            html += "<td class='text-left link-report'>"+line.no_proyek+"</td>"
            html += "<td class='text-left'>"+line.no_kontrak+"</td>"
            html += "<td class='text-center'>"+line.tgl_mulai+"</td>"
            html += "<td class='text-center'>"+line.tgl_selesai+"</td>"
            html += "<td class='text-left'>"+line.keterangan+"</td>"
            html += "<td class='text-left'>"+line.nama_cust+"</td>"
            html += "<td class='text-right'>"+sepNum(line.nilai_proyek)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.rab)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.beban)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.tagihan)+"</td>"
            html += "<td class='text-right'>"+sepNum(line.bayar)+"</td>"
            html += "<td class='text-right'>"+profit+"</td>"
            html += "<td class='text-right'>"+presentase+"%</td>"
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