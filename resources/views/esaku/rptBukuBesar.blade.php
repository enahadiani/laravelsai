<script type="text/javascript">
    function drawLap(formData){
       saiPost('esaku-report/lap-bukubesar', null, formData, null, function(res){
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
        if(data.length > 0){
            console.log(res.back);
            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
            }
            var lokasi = res.lokasi;
            var html = `<div>
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
                td.no-border{
                    border:none;
                }
            </style>
            `+judul_lap("LAPORAN BUKU BESAR",lokasi,'Periode '+periode.fromname);
            for(var i=0;i<data.length;i++){
                var line = data[i];
                html+=`
                <table class='table table-bordered'>
                <tr>
                    <td class='header_laporan no-border' width='100'>Kode Akun  </td>
                    <td class='header_laporan no-border' colspan='7'>:&nbsp;`+line.kode_akun+`</td>
                </tr>
                <tr>
                    <td class='header_laporan no-border'>Nama Akun </td>
                    <td class='header_laporan no-border' colspan='7'>:&nbsp;`+line.nama+`</td>
                </tr>
                <tr>
                    <td height='23' colspan='7' class='header_laporan' align='right'>Saldo Awal </td>
                    <td class='header_laporan' align='right'>`+sepNum(line.so_awal)+`</td>
                </tr>
                <tr>
                    <td width='80' height='23' class='header_laporan' align='center'>No Bukti</td>
                    <td width='80' height='23' class='header_laporan' align='center'>No Dokumen</td>
                    <td width='60' class='header_laporan' align='center'>Tanggal</td>
                    <td width='250' class='header_laporan' align='center'>Keterangan</td>
                    <td width='60' class='header_laporan' align='center'>Kode PP</td>
                    <td width='90' class='header_laporan' align='center'>Debet</td>
                    <td width='90' class='header_laporan' align='center'>Kredit</td>
                    <td width='90' class='header_laporan' align='center'>Balance</td>
                </tr>`;
			    var saldo=parseFloat(line.so_awal);
                var debet=0;
                var kredit=0;
                var det = "";
                for(var x=0;x < res.detail.length; x++)
			    {       
                    var line2 = res.detail[x];
                    if(line.kode_akun == line2.kode_akun){

                    saldo=saldo + parseFloat(line2.debet) - parseFloat(line2.kredit);	
                    debet=debet + parseFloat(line2.debet);
                    kredit=kredit + parseFloat(line2.kredit);	
				    det +=`<tr style='cursor:pointer;' class='jurnal report-link' data-no_bukti='`+line2.no_bukti+`' data-kode_akun='`+line.kode_akun+`'>
                        <td valign='top' class='isi_laporan link-report'>`+line2.no_bukti+`
                        </td>
                        <td valign='top' class='isi_laporan'>`+line2.no_dokumen+`</td>
                        <td height='23' valign='top' class='isi_laporan'>`+line2.tgl+`</td>
                        <td valign='top' class='isi_laporan'>`+line2.keterangan+`</td>
                        <td valign='top' class='isi_laporan' >`+line2.kode_pp+`</td>
                        <td valign='top' class='isi_laporan' align='right'>`+sepNum(parseFloat(line2.debet))+`</td>
                        <td valign='top' class='isi_laporan' align='right'>`+sepNum(parseFloat(line2.kredit))+`</td>
                        <td valign='top' class='isi_laporan' align='right'>`+sepNum(saldo)+`</td>
                   </tr>`;
                    }
			    }
            html +=det+`<tr>
                <td height='23' colspan='5' valign='top' class='isi_laporan' align='right'>Total&nbsp;</td>
                <td valign='top' class='isi_laporan' align='right'>`+sepNum(debet)+`</td>
                <td valign='top' class='isi_laporan' align='right'>`+sepNum(kredit)+`</td>
                <td valign='top' class='isi_laporan' align='right'>`+sepNum(saldo)+`</td>
            </tr>
            </table>
            <br>`;

            }      

            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   