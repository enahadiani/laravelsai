<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
       saiPost('saku/gl_report_jurnal', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show')[0].selectize.getValue();
                generatePagination('pagination',show,res);
              
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        console.log(data.length);
        if(data.length > 0){

    var mon_html = `<div align='center' style='padding:10px' id='sai-rpt-table-export-tbl-transju'>
               `;
               var x=1;
               mon_html+=`
                    <table width="800px" class="table no-border">
                        <style>
                            td,th{
                                padding:4px !important;
                            }
                            thead td{
                                border:none !important;
                            }
                            .info-table thead{
                                background:#4286f5;
                                color:white;
                            }
                            .bold{
                                font-weight:bold;
                            }
                        </style>
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table width="100%" class="table table-striped color-table info-table">
                                        <thead>
                                            <tr>
                                                <td width='20'  class='header_laporan' align='center'>No</td>
                                                <td width='80' class='header_laporan' align='center'>No Bukti</td>
                                                <td width='80' class='header_laporan' align='center'>No Dokumen</td>
                                                <td width='50' class='header_laporan' align='center'>Tanggal</td>
                                                <td width='70' height='25' class='header_laporan' align='center'>Akun</td>
                                                <td width='200' class='header_laporan' align='center'>Nama Akun </td>
                                                <td width='40' class='header_laporan' align='center'>PP</td>
                                                <td width='40' class='header_laporan' align='center'>Modul</td>
                                                <td width='250' class='header_laporan' align='center'>Keterangan</td>
                                                <td width='80' class='header_laporan' align='center'>Debet</td>
                                                <td width='80' class='header_laporan' align='center'>Kredit</td>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                                            
                                            var total=0; 
                                            var det = '';
                                            var no=1;
                                            var first = true;
                                            var debet=0; var kredit=0;var beda ='';var tmp='';
                                            for (var x=0;x<data.length;x++)
                                            {
                                                var line2 = data[x];

                                                if(res.sumju == "Ya"){

                                                    beda = tmp!=line2.no_bukti; 
                                                    if (tmp!=line2.no_bukti)
                                                    {
                                                        tmp=line2.no_bukti;
                                                        first = true;
                                                        
                                                        if (no>1)
                                                        {
                                                            debet=0;kredit=0;no=1;
                                                            det+=`<tr>
                                            <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                                            <td class='bold' align='right'>`+ndebet+`</td>
                                            <td class='bold' align='right'>`+nkredit+`</td>
                                        </tr>`;
                                                        }
                                                        
                                                    }
                                                }

                                                
                                                debet=debet+parseFloat(line2.debet);
                                                kredit=kredit+parseFloat(line2.kredit);
                                                ndebet=sepNum(debet);
                                                nkredit=sepNum(kredit);
                                              
                                                det+=`<tr>
                                                <td align='center' class='isi_laporan'>`+no+`</td>
                                                <td  class='isi_laporan'>`+line2.no_bukti+`</td>
                                                <td class='isi_laporan'>`+line2.no_dokumen+`</td>
                                                <td class='isi_laporan'>`+line2.tgl+`</td>
                                                <td class='isi_laporan'>`+line2.kode_akun+`</td>
                                                <td  class='isi_laporan'>`+line2.nama_akun+`</td>
                                                <td  class='isi_laporan'>`+line2.kode_pp+`</td>
                                                <td  class='isi_laporan'>`+line2.modul+`</td>
                                                <td  class='isi_laporan'>`+line2.keterangan+`</td>
                                                <td  class='isi_laporan'>`+sepNum(parseFloat(line2.debet))+`</td>
                                                <td  class='isi_laporan'>`+sepNum(parseFloat(line2.kredit))+`</td>
                                                </tr>`;	
                                                first = true;
                                                no++;
                                            
                                                
                                            }
                                            // debet=debet+parseFloat(line2.debet);
                                            // kredit=kredit+parseFloat(line2.kredit);
                                            ndebet=sepNum(debet);
                                            nkredit=sepNum(kredit);
                                            if(res.sumju == "Ya"){

                                                det+=`<tr>
                                                    <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                                                    <td class='bold' align='right'>`+ndebet+`</td>
                                                    <td class='bold' align='right'>`+nkredit+`</td>
                                                </tr>`;
                                            }else{
                                                det+=`<tr>
                                                    <td height='25' colspan='9' align='right'  class='bold'>Sub Total</td>
                                                    <td class='bold' align='right'>`+sepNum(debet)+`</td>
                                                    <td class='bold' align='right'>`+sepNum(kredit)+`</td>
                                                </tr>`;
                                            }
                                            mon_html+=det+`
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table><br>
                    <div style="page-break-after:always"></div>`;
                        
               mon_html+="</div>"; 
            }
        $('#canvasPreview').html(mon_html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
        $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   