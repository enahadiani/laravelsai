<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('java-report/lap-kartu-proyek', null, formData, null, function(res){
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
    var daftar_rab = res.res.data_detail.data_rab;
    var daftar_beban = res.res.data_detail.data_beban;
    var html = "";
    var arr_tl = [0,0,0,0,0,0,0,0,0];
    var total_beban = 0;
    var x=1;
    if(data.length > 0) {
        console.log(res.back);
        if(res.back){
            $('.navigation-lap').removeClass('hidden');
        }else{
            $('.navigation-lap').addClass('hidden');
        }
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        for(var i=0;i<data.length;i++) {
            var proyek = data[i];
            
            for(var k=0;k<daftar_beban.length;k++) { 
                var beban = daftar_beban[k]
                if(proyek.no_proyek == beban.no_proyek) { 
                    total_beban = total_beban + parseInt(beban.nilai)
                }
            }
            var profit = parseInt(proyek.nilai) - parseInt(total_beban)
            var presentase = ((profit/parseInt(proyek.nilai))*100).toFixed(2)
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

            html += "<h6 class='text-center'>Project Financial Summary</h6>";
            html += "<h6 class='text-center'>"+proyek.no_proyek+"</h6>";
            html += "<hr />";
            html += "<table class='table table-borderless ml-4'>";
            html += "<thead>";
            html += "<tr>";
            html += "<th style='width: 15%;'>Deskripsi Project</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+proyek.keterangan+"</th>";
            html += "<th style='width: 15%;'>Total Beban Kontrak</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+sepNum(total_beban)+"</th>";
            html += "</tr>"
            html += "<tr>";
            html += "<th style='width: 15%;'>Nomor Kontrak</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+proyek.no_kontrak+"</th>";
            html += "<th style='width: 15%;'>Total Profit Kontrak</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+profit+"</th>";
            html += "</tr>"
            html += "<th style='width: 15%;'>Vendor</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+proyek.nama_cust+"</th>";
            html += "<th style='width: 15%;'>Total Presentase Profit</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+presentase+"%</th>";
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
            html += "<div class='ml-2 mr-2' style='overflow-x: scroll;display:flex;flex-direction:row;'>";
            html += "<table class='table table-bordered' style='width: 600px;'>";
            html += "<thead>";
            html += "<tr>";
            html += "<th class='text-center' colspan='6'>Budget</th>";
            html += "</tr>";
            html += "<tr>";
            html += "<th class='text-center' style='width: 15px;'>No</th>";
            html += "<th class='text-center' style='width: 250px;'>Uraian Pekerjaan</th>";
            html += "<th class='text-center' style='width: 50px;'>Qty</th>";
            html += "<th class='text-center' style='width: 50px;'>Satuan</th>";
            html += "<th class='text-center' style='width: 90px'>Harga (Rp)</th>";
            html += "<th class='text-center' style='width: 90px'>Total (Rp)</th>";
            html += "<tr>";
            html += "</thead>";
            html += "<tbody>";
            if(daftar_rab.length > 0) {
                var no = 1;
                for(var j=0;j<daftar_rab.length;j++) {
                    var rab = daftar_rab[j];
                    if(proyek.no_proyek == rab.no_proyek) {
                        html += "<tr>";
                        html += "<td class='text-center'>"+no+"</td>"
                        html += "<td class='text-left'>"+rab.keterangan+"</td>"
                        html += "<td class='text-right'>"+sepNum(rab.jumlah)+"</td>"
                        html += "<td class='text-center'>"+rab.satuan+"</td>"
                        html += "<td class='text-right'>"+sepNum(rab.harga)+"</td>"
                        html += "<td class='text-right'>"+sepNum(rab.harga * rab.jumlah)+"</td>"
                        html += "</tr>";
                        no++;
                    }
                }
            }
            html += "</tbody>";
            html += "</table>";
            html += "<table class='table table-bordered' style='width: 870px;'>";
            html += "<thead>";
            html += "<tr>";
            html += "<th class='text-center' colspan='7'>Actual</th>";
            html += "</tr>";
            html += "<tr>";
            html += "<th class='text-center' style='width: 15px'>No</th>";
            html += "<th class='text-center' style='width: 100px;'>Tanggal</th>";
            html += "<th class='text-center' style='width: 150px'>No Doc</th>";
            html += "<th class='text-center' style='width: 250px;'>Uraian Pekerjaan</th>";
            html += "<th class='text-center' style='width: 180px;'>Supplier</th>";
            html += "<th class='text-center' style='width: 90px'>Jumlah (Rp)</th>";
            html += "<th class='text-center' style='width: 15px'>Status</th>";
            html += "<tr>";
            html += "</thead>";
            html += "<tbody>";
            if(daftar_beban.length > 0) {
                var no = 1;
                for(var k=0;k<daftar_beban.length;k++) {
                    var beban = daftar_beban[k]
                    var status = null
                    if(beban.status == 1) {
                        status = 'PAID'
                    } else {
                        status = 'UNPAID'
                    }
                    if(proyek.no_proyek == beban.no_proyek) {
                        html += "<tr>";
                        html += "<td class='text-center'>"+no+"</td>"
                        html += "<td class='text-center'>"+beban.tgl+"</td>"
                        html += "<td class='text-center'>"+beban.no_dokumen+"</td>"
                        html += "<td class='text-left'>"+beban.keterangan+"</td>"
                        html += "<td class='text-left'>"+beban.nama_vendor+"</td>"
                        html += "<td class='text-right'>"+sepNum(beban.nilai)+"</td>"
                        html += "<td class='text-center'>"+status+"</td>"
                        html += "</tr>";
                        no++;
                    }
                }
            }

            html += "</tbody>";
            html += "</table>";
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