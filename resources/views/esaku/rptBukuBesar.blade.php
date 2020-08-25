<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
       saiPost('esaku-report/lap-bukubesar', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show')[0].selectize.getValue();
                generatePaginationDore('pagination',show,res);
              
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            if(res.back){
                var back= `<button type="button" class="btn btn-light ml-2" id="btn-back" style="float:right;">
                <i class=""></i> Back</button>`;
            }else{
                var back= ``;
            }
            var html = `<div>
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .table-bordered td{
                    border: 1px solid #e9ecef !important;
                }
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
            </style>
            `+back;
            var lokasi = res.lokasi;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                html+=`
                <table class='table table-bordered'>
                <tr >
                <td height='23' colspan='9' style='padding:5px'><table class='table no-border'>
                    <tr>
                    <td class='header_laporan' width='100'>Kode Akun  </td>
                    <td class='header_laporan' >:&nbsp;`+line.kode_akun+`</td>
                  </tr>
                  <tr>
                    <td class='header_laporan'>Nama Akun </td>
                    <td class='header_laporan'>:&nbsp;`+line.nama+`</td>
                  </tr>
                </table></td>
                </tr>
                <tr>
                    <td height='23' colspan='7' class='header_laporan' align='right'>Saldo Awal </td>
                    <td class='header_laporan' align='right'>`+sepNum(line.so_awal)+`</td>
                </tr>
                <tr bgcolor='#4286f5' style='color:white'>
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
				    det +=`<tr>
                        <td valign='top' class='isi_laporan'>
                        <a style='cursor:pointer;color:blue' class='jurnal' data-no_bukti='`+line2.no_bukti+`'>`+line2.no_bukti+`</a>
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
   