<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-anggaran', null, formData, null, function(res){
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
    var html = "";
    var no = 1;
    var totalTW1 = 0
    var totalTW2 = 0
    var totalTW3 = 0
    var totalTW4 = 0
    var totalTotal = 0
    var Tw1 = 0
    var Tw2 = 0
    var Tw3 = 0
    var Tw4 = 0
    var total = 0

    if(data.length > 0) {
        html += "<div class='sai-rpt-table-export-tbl-anggaran'>"
        html += "<h6 class='text-center'>Laporan Anggaran</h6>"
        html += "<hr />"
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>";
        html += "<table class='table table-bordered' style='width: 1500px;'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 10px;'>No</th>"
        html += "<th class='text-center' style='width: 25px;'>Kode Akun</th>"
        html += "<th class='text-center' style='width: 120px;'>Nama Akun</th>"
        html += "<th class='text-center' style='width: 25px;'>Kode PP</th>"
        html += "<th class='text-center' style='width: 40px;'>Nama PP</th>"
        html += "<th class='text-center' style='width: 90px;'>Triwulan I</th>"
        html += "<th class='text-center' style='width: 90px;'>Triwulan II</th>"
        html += "<th class='text-center' style='width: 90px;'>Triwulan III</th>"
        html += "<th class='text-center' style='width: 90px;'>Triwulan IV</th>"
        html += "<th class='text-center' style='width: 90px;'>Total</th>"
        html += "</tr>"
        html += "</thead>"
        html += "<tbody>"
        for(var i=0;i<data.length;i++) {
            var agg = data[i]

            if(agg.agg_tw1 < 0) {
                var triwulan1 = parseInt(agg.agg_tw1) * -1
                Tw1 = "-"+sepNum(agg.agg_tw1)
                totalTW1 += triwulan1
            } else {
                Tw1 = sepNum(agg.agg_tw1)
                totalTW1 += parseInt(agg.agg_tw1)
            }

            if(agg.agg_tw2 < 0) {
                var triwulan2 = parseInt(agg.agg_tw2) * -1
                Tw2 = "-"+sepNum(agg.agg_tw2)
                totalTW2 += triwulan2
            } else {
                Tw2 = sepNum(agg.agg_tw2)
                totalTW2 += parseInt(agg.agg_tw2)
            }

            if(agg.agg_tw3 < 0) {
                var triwulan3 = parseInt(agg.agg_tw3) * -1
                Tw3 = "-"+sepNum(agg.agg_tw3)
                totalTW3 += triwulan3
            } else {
                Tw3 = sepNum(agg.agg_tw3)
                totalTW3 += parseInt(agg.agg_tw3)
            }

            if(agg.agg_tw4 < 0) {
                var triwulan4 = parseInt(agg.agg_tw4) * -1
                Tw4 = "-"+sepNum(agg.agg_tw4)
                totalTW4 += triwulan4
            } else {
                Tw4 = sepNum(agg.agg_tw4)
                totalTW4 += parseInt(agg.agg_tw4)
            }

            if(agg.total < 0) {
                var totalTri = parseInt(agg.total) * -1
                total = "-"+sepNum(agg.total)
                totalTotal += totalTri
            } else {
                total = sepNum(agg.total)
                totalTotal += parseInt(agg.total)
            }

            html += "<tr>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+no+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+agg.kode_akun+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+agg.nama_akun+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+agg.kode_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: left;'>"+agg.nama_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+Tw1+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+Tw2+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+Tw3+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+Tw4+"</td>"
            html += "<td class='isi-laporan' style='text-align: right;'>"+total+"</td>"
            html += "</tr>"
            no++
        }
        html += "<tr>"
        html += "<td class='isi-laporan' style='text-align: right;' colspan='5'>Total</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totalTW1)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totalTW2)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totalTW3)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totalTW4)+"</td>"
        html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(totalTotal)+"</td>"
        html += "</tr>"
        html += "</tbody>"
        html += "</table>"
        html += "</div>"
        html += "</div>"
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}

</script>