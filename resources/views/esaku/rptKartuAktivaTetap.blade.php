<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('esaku-report/kartu-aktap', null, formData, null, function(res){
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
    if(data.length > 0) {
        var html = ""
        if(res.back){
            $('.navigation-lap').removeClass('hidden');
        }else{
            $('.navigation-lap').addClass('hidden');
        }
        html += "<div id='sai-rpt-table-export-tbl-daftar-pnj'>";
        for(var i=0;i<res.res.data.length;i++) {
            var row = res.res.data[i]
            html += "<h6 class='text-center'>Kartu Aktiva Tetap</h6>";
            html += "<hr />"
            html += "<table class='table table-borderless ml-4'>";
            html += "<thead>"
            html += "<tr>"
            html += "<th style='width: 15%;'>No Asset</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.no_fa+"</th>";
            html += "</tr>";
            html += "<tr>"
            html += "<th style='width: 15%;'>Uraian Barang</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.nama+"</th>";
            html += "</tr>";
            html += "<tr>"
            html += "<th style='width: 15%;'>Tanggal Perolehan</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.tgl_perolehan+"</th>";
            html += "</tr>"
            html += "<tr>";
            html += "<th style='width: 15%;'>PP</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.kode_pp+" - "+row.nama_pp+"</th>";
            html += "</tr>"
            html += "<tr>"
            html += "<th style='width: 15%;'>Kelompok</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.kode_klpakun+"</th>";
            html += "</tr>"
            html += "<tr>"
            html += "<th style='width: 15%;'>Akun Aktiva</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.kode_akun+" - "+row.nama_akun+"</th>";
            html += "</tr>"
            html += "<tr>"
            html += "<th style='width: 15%;'>Akun BP</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.akun_bp+" - "+row.nama_bp+"</th>";
            html += "</tr>"
            html += "<tr>"
            html += "<th style='width: 15%;'>Akun AP</th>";
            html += "<th style='width: 5%;'>:</th>";
            html += "<th>"+row.akun_deprs+" - "+row.nama_deprs+"</th>";
            html += "</tr>"
            html += "</thead>"
            html += "</table>"
            html += "<table class='table table-border ml-4'>"
            html += "<thead>"
            html += "<tr>"
            html += "<th colspan='5'>Nilai Perolehan</th>"
            html += "<th>"+sepNum(row.nilai)+"</th>"
            html += "</tr>"
            html += "<tr>"
            html += "<th>No</th>"
            html += "<th>No. Susut</th>"
            html += "<th>Periode</th>"
            html += "<th>Debet</th>"
            html += "<th>Kredit</th>"
            html += "<th>Saldo</th>"
            html += "</tr>"
            html += "</thead>"
            html += "<tbody>"
            if(row.detail != undefined) {
                if(row.detail.length > 0) {
                    var no = 1;
                    var akumulasi = 0;
                    for(var j=0;j<row.detail.length;j++) {
                        var detail = row.detail[j]
                        if(detail.debet > 0) {
                            akumulasi += parseInt(detail.debet)
                        }
                        html += "<tr>"
                        html += "<td>"+no+"</td>" 
                        html += "<td>"+detail.no_fasusut+"</td>" 
                        html += "<td>"+detail.periode+"</td>" 
                        html += "<td>"+sepNum(detail.debet)+"</td>" 
                        html += "<td>"+sepNum(detail.kredit)+"</td>" 
                        html += "<td>"+sepNum(detail.nilai)+"</td>" 
                        html += "</tr>"

                        no++;
                    }
                }
            }
            html += "<tr>"
            html += "<td colspan='5'>Akumulasi Penyusutan</td>"
            html += "<td>"+sepNum(akumulasi)+"</td>"
            html += "</tr>"
            html += "<tr>"
            html += "<td colspan='5'>Nilai Buku</td>"
            html += "<td>"+sepNum(akumulasi)+"</td>"
            html += "</tr>"
            html += "</tbody>"
            html += "</table>"
        }
        html += "<div style='page-break-after:always'></div>";
        html += "</div>"
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}


</script>