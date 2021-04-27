<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/lap-kartu-anggaran', null, formData, null, function(res){
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
    // console.log({data, res})
    var html = ""
    var totDeb = 0
    var totKred = 0
    if(data.length) {
        var result = data
        
        if(result.length > 0) {
            html += "<div class='sai-rpt-table-export-tbl-anggaran' id='sai-rpt-table-export-tbl-daftar-pnj'>"
            html += "<h6 class='text-center'>Laporan Kartu Anggaran</h6>";
            html += "<hr />"
            for(var i=0;i<data.length;i++) {
                var kartu = result[i]
                html += "<div class='row card-anggaran'>"
                html += "<div class='col-md-6'>"
                html += "<table class='table table-borderless'>"
                html += "<thead>"
                html += "<tr>"
                html += "<th style='width: 15%;'>Kode Akun</th>"
                html += "<th style='width: 5%;'>:</th>"
                html += "<th>"+kartu.kode_akun+"</th>"
                html += "</tr>"
                html += "<tr>"
                html += "<th style='width: 15%;'>Nama Akun</th>"
                html += "<th style='width: 5%;'>:</th>"
                html += "<th>"+kartu.nama_akun+"</th>"
                html += "</tr>"
                html += "<tr>"
                html += "<th style='width: 15%;'>Kode PP</th>"
                html += "<th style='width: 5%;'>:</th>"
                html += "<th>"+kartu.kode_pp+"</th>"
                html += "</tr>"
                html += "<tr>"
                html += "<th style='width: 15%;'>Nama PP</th>"
                html += "<th style='width: 5%;'>:</th>"
                html += "<th>"+kartu.nama_pp+"</th>"
                html += "</tr>"
                html += "</thead>"
                html += "</table>"
                html += "</div>"
                html += "<div class='col-md-6'>"
                html += "<table class='table table-bordered'>"
                html += "<thead>"
                html += "<tr>"
                html += "<th class='text-center' colspan='4'>RKA Tahun {{ date('Y') }}</th>"
                html += "</tr>"
                html += "</thead>"
                html += "<tbody>"
                html += "<tr>"
                html += "<td class='isi-laporan'>Januari</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n1)+"</td>"
                html += "<td class='isi-laporan'>Juli</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n7)+"</td>"
                html += "</tr>"
                html += "<tr>"
                html += "<td class='isi-laporan'>Februari</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n2)+"</td>"
                html += "<td class='isi-laporan'>Agustus</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n8)+"</td>"
                html += "</tr>"
                html += "<tr>"
                html += "<td class='isi-laporan'>Maret</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n3)+"</td>"
                html += "<td class='isi-laporan'>September</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n9)+"</td>"
                html += "</tr>"
                html += "<tr>"
                html += "<td class='isi-laporan'>April</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n4)+"</td>"
                html += "<td class='isi-laporan'>Oktober</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n10)+"</td>"
                html += "</tr>"
                html += "<tr>"
                html += "<td class='isi-laporan'>Mei</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n5)+"</td>"
                html += "<td class='isi-laporan'>November</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n11)+"</td>"
                html += "</tr>"
                html += "<tr>"
                html += "<td class='isi-laporan'>Juni</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n6)+"</td>"
                html += "<td class='isi-laporan'>Desember</td>"
                html += "<td class='isi-laporan' style='text-align: right;'>"+sepNum(kartu.n12)+"</td>"
                html += "</tr>"
                html += "</tbody>"
                html += "</table>"
                html += "</div>"
                html += "<div class='col-md-12'>"
                html += "<table class='table table-bordered'>"
                html += "<thead>"
                html += "<tr>"
                html += "<th class='text-center' style='width: 15%;'>No Bukti</th>"
                html += "<th class='text-center' style='width: 15%;'>No Dokumen</th>"
                html += "<th class='text-center' style='width: 15%;'>Tanggal</th>"
                html += "<th class='text-center' style='width: 30%;'>Keterangan</th>"
                html += "<th class='text-center' style='width: 10%;'>Debet</th>"
                html += "<th class='text-center' style='width: 10%;'>Kredit</th>"
                html += "<th class='text-center' style='width: 10%;'>Balance</th>"
                html += "</tr>"
                html += "</thead>"
                html += "<tbody>"
                // if(result.detail.length > 0) {

                // }
                html += "<tr>"
                html += "<td colspan='4' style='text-align: right;'>Total</td>"
                html += "<td style='text-align: right;'>"+sepNum(totDeb)+"</td>"
                html += "<td style='text-align: right;'>"+sepNum(totKred)+"</td>"
                html += "<td style='text-align: right;'>"+sepNum(kartu.total)+"</td>"
                html += "</tr>"
                html += "</tbody>"
                html += "</table>"
                html += "</div>"
                html += "</div>"
            }

            html += "<div style='page-break-after:always'></div>";
            html += "</div>"
        }
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>