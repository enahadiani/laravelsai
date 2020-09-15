<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
       saiPost('yakes-report/lap-buktijurnal', null, formData, null, function(res){
           console.log(res.result.length);
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        console.log(data.length);
        console.log(res.detail_jurnal);
        if(data.length > 0){
            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
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
                .bold {
                    font-weight:bold;
                }
            </style>
            `;
            var lokasi = res.lokasi;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                html+=`
                <table class='table table-borderless'>
                <tr>
                    <td><table width='100%'  border='0' cellspacing='2' cellpadding='1'>
                    <tr>
                        <td width='80%'><table width='100%'  border='0' cellspacing='2' cellpadding='1'>
                        <tr>
                            <td class='style16 bold' style='font-size:16px'>`+lokasi+`</td>
                        </tr>
                        <tr>
                            <td class='style16'></td>
                        </tr>
                        </table></td>
                        <td width='20%' align='center'><table class='table table-bordered'>
                        
                        <tr>
                            <td align='center' class='istyle15'>`+line.no_bukti+`</td>
                        </tr>
                        <tr>
                            <td align='center' class='istyle15'>`+line.tgl+`</td>
                        </tr>
                        </table></td>
                    </tr>
                    </table></td>
                </tr>
                <tr>
                    <td align='center' class='istyle17 bold' style='font-size:18px'>BUKTI JURNAL</td>
                </tr>
                <tr>
                    <td><table width='100%' class='table table-bordered'>
                    <thead>
                    <tr>
                        <td width='30' class='bold'>NO</td>
                        <td width='100' class='bold'>KODE AKUN </td>
                        <td width='200' class='bold'>NAMA AKUN </td>
                        <td width='270' class='bold'>KETERANGAN</td>
                        <td width='60' class='bold'>PP</td>
                        <td width='100' class='bold'>DEBET</td>
                        <td width='100' class='bold'>KREDIT</td>
                    </tr>
                    </thead>
                    <tbody>`;
                   
                        var x=1;
                        var tot_debet=0;
                        var tot_kredit=0;
                        var debet =0;
                        var kredit =0;
                        var det ='';
                        for (var a=0; a<res.detail_jurnal.length;a++)
                        {
                            var line2 = res.detail_jurnal[a];
                            if(line2.no_bukti == line.no_bukti){

                                debet=sepNum(parseFloat(line2.debet));
                                kredit=sepNum(parseFloat(line2.kredit));
                                tot_debet=tot_debet+parseFloat(line2.debet);
                                tot_kredit=tot_kredit+parseFloat(line2.kredit);
                                det+=`<tr>
                                    <td class='isi_laporan' align='center'>`+x+`</td>
                                    <td class='isi_laporan'>`+line2.kode_akun+`</td>
                                    <td class='isi_laporan'>`+line2.nama_akun+`</td>
                                    <td class='isi_laporan'>`+line2.keterangan+`</td>
                                    <td class='isi_laporan' align='center'>`+line2.kode_pp+`</td>
                                    <td class='isi_laporan' align='right'>`+debet+`</td>
                                    <td class='isi_laporan' align='right'>`+kredit+`</td>
                                </tr>`;
                                x=x+1;
                            }
                        }
                        tot_debet1=sepNum(tot_debet);
                        tot_kredit1=sepNum(tot_debet);
                    html+=det+`<tr>
                
                    <td colspan='5' class='header_laporan' align='right'>Total</td>
                    <td class='isi_laporan' align='right'>`+tot_debet1+`</td>
                    <td class='isi_laporan' align='right'>`+tot_kredit1+`</td>
                </tr>
                    </tbody>
                    </table></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align='right'><table class='table table-bordered' style='width:60%'>
                    <tr>
                        <td width='200' align='center'>Dibuat Oleh : </td>
                        <td width='200' align='center'>Diperiksa Oleh : </td>
                    </tr>
                    <tr>
                        <td align='center'>Paraf &amp; Tanggal </td>
                        <td align='center'>Paraf &amp; Tanggal </td>
                        </tr>
                    <tr>
                        <td height='80'>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                    </table></td>
                </tr>

                </table><br>
                <DIV style='page-break-after:always'></DIV>`;

            }

                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   