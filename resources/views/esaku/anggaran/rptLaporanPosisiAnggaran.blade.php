<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-posisi-anggaran', null, formData, null, function(res){
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
    console.log({data, res})
    var html = ""
    var no = 1
    if(data.length > 0) {
        html += "<div class='sai-rpt-table-export-tbl-anggaran'>"
        html += "<h6 class='text-center'>Laporan Anggaran</h6>"
        html += "<hr />"
        html += "<div class='ml-2 mr-2'>";
        html += "<table class='table table-bordered'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 10px;'>No</th>"
        html += "<th class='text-center' style='width: 120px;'>No PDRK</th>"
        html += "<th class='text-center' style='width: 30px;'>Tanggal</th>"
        html += "<th class='text-center' style='width: 25px;'>Kode PP</th>"
        html += "<th class='text-center' style='width: 40px;'>Nama PP</th>"
        html += "<th class='text-center' style='width: 120px;'>Keterangan</th>"
        html += "<th class='text-center' style='width: 90px;'>Nilai</th>"
        html += "<th class='text-center' style='width: 70px;'>No App</th>"
        html += "<th class='text-center' style='width: 30px;'>Tanggal App</th>"
        html += "<th class='text-center' style='width: 40px;'>Status</th>"
        html += "</tr>"
        html += "</thead>"
        html += "<tbody>"
        for(var i=0;i<data.length;i++) {
            var row = data[i]
            var tgl_app = "-"
            var no_app = "-"
            if(row.no_app !== null) {
                no_app = row.no_app
            }

            if(row.tgl_app !== null) {
                tgl_app = row.tgl_app
            }

            html += "<tr>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+no+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+row.no_pdrk+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+row.tanggal+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+row.kode_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+row.nama_pp+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+row.keterangan+"</td>"
            html += "<td class='isi-laporan' style='text-align: riight;'>"+sepNum(parseFloat(row.nilai))+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+no_app+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+tgl_app+"</td>"
            html += "<td class='isi-laporan' style='text-align: center;'>"+row.status+"</td>"
            html += "</tr>"
            no++;
        }
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