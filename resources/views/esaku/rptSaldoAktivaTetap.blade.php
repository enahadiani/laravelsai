<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/saldo-aktap', null, formData, null, function(res){
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
        html += "<h6 class='text-center'>Saldo Aktiva Tetap</h6>";
        html += "<hr />"
        html += "<div class='ml-2 mr-2' style='overflow-x: scroll;'>";
        html += "<table class='table table-bordered' style='width: 1580px;'>"
        html += "<thead>"
        html += "<tr>"
        html += "<th class='text-center' style='width: 10px;' rowspan='3'>No</th>";
        html += "<th class='text-center' style='width: 150px;' rowspan='3'>Kelompok Akun</th>";
        html += "<th class='text-center' style='width: 200px;' rowspan='3'>Nama Kelompok</th>";
        html += "<th class='text-center' colspan='4'>Nilai Perolehan</th>"
        html += "<th class='text-center' rowspan='2' colspan='3'>Akumulasi Penyusutan</th>"
        html += "<th class='text-center' rowspan='3'>Nilai Buku</th>"
        html += "</tr>"
        html += "<tr>"
        html += "<th class='text-center' rowspan='2'>Saldo Awal</th>"
        html += "<th class='text-center' colspan='2'>Transaksi</th>"
        html += "<th class='text-center' rowspan='2'>Saldo Akhir</th>"
        html += "</tr>"
        html += "<tr>"
        html += "<th class='text-center'>Debet</th>"
        html += "<th class='text-center'>Kredit</th>"
        html += "<th class='text-center'>Saldo Awal</th>"
        html += "<th class='text-center'>Mutasi</th>"
        html += "<th class='text-center'>Saldo Akhir</th>"
        html += "</tr>"
        html += "<tr>"
        html += "<th class='text-center'>1</th>"
        html += "<th class='text-center'>2</th>"
        html += "<th class='text-center'>3</th>"
        html += "<th class='text-center'>4</th>"
        html += "<th class='text-center'>5</th>"
        html += "<th class='text-center'>6</th>"
        html += "<th class='text-center'>7=4+5+6</th>"
        html += "<th class='text-center'>8</th>"
        html += "<th class='text-center'>9</th>"
        html += "<th class='text-center'>10=8+9</th>"
        html += "<th class='text-center'>11=7-10</th>"
        html += "</tr>"
        html += "</thead>"
        html += "<tbody>"
        for(var i=0;i<data.length;i++) {
            var row = data[i]
            var nilai_buku = parseInt(row.so_akhir) - parseInt(row.ap_akhir)
            html += "<tr>"
            html += "<td class='text-center'>"+no+"</td>"
            html += "<td style='text-align: left;'>"+row.kode_klpakun+"</td>"
            html += "<td style='text-align: left;'>"+row.nama+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.so_awal)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.debet)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.kredit)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.so_akhir)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.ap_awal)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.ap_mutasi)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(row.ap_akhir)+"</td>"
            html += "<td style='text-align: right;'>"+sepNum(nilai_buku)+"</td>"
            html += "</tr>"
            no++;
        }
        html += "</tbody>"
        html += "</table>"
        html += "</div>"
        html += "<div style='page-break-after:always'></div>";
        html += "</div>"
    }

    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}


</script>