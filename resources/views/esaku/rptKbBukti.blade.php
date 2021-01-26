<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-buktijurnal-kb', null, formData, null, function(res){
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
                .bold {
                    font-weight:bold;
                }
                table td.bordered{
                    border: 1px solid #dee2e6 !important;
                }
            </style>
            `;
            periode = $periode;
            var lokasi = res.lokasi;
            // html+=judul_lap("LAPORAN BUKTI KAS BANK",lokasi,'Periode '+periode.fromname);
            for(var i=0;i<data.length;i++){
                var line = data[i];
                html+=`
                <table width='100%'  border='0' cellspacing='2' cellpadding='1'>
                    <tr>
                        <td class='style16 bold' colspan="5" rowspan="2" style='font-size:16px' width="80%">`+lokasi+`</td>
                        <td align='center' class='bordered' width="40%">`+line.no_bukti+`</td>
                    </tr>
                    <tr>
                        <td align='center' class='bordered'>`+line.tgl+`</td>
                    </tr>
                </table>
                <h6 class='text-center'>BUKTI JURNAL</h6>
                <table width='100%' class='table table-bordered'>
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
                                    <td class='isi_laporan'>`+line2.nama+`</td>
                                    <td class='isi_laporan'>`+line2.keterangan+`</td>
                                    <td class='isi_laporan' align='center'>`+line2.kode_pp+`</td>
                                    <td class='isi_laporan' align='right'>`+debet+`</td>
                                    <td class='isi_laporan' align='right'>`+kredit+`</td>
                                </tr>`;
                                x=x+1;
                            }
                        }
                        tot_debet1=sepNum(tot_debet);
                        tot_kredit1=sepNum(tot_kredit);
                    html+=det+`<tr>
                
                    <td colspan='5' class='header_laporan bold' align='right'>Total</td>
                    <td class='isi_laporan bold' align='right'>`+tot_debet1+`</td>
                    <td class='isi_laporan bold' align='right'>`+tot_kredit1+`</td>
                </tr>
                </tbody>
                </table>
                <table class='table table-bordered float-right' style='width:40%'>
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
                </table>
                <table class="table table-borderless" width="100%">
                    <tr><td>&nbsp;</td></tr>
                </table>
                <DIV style='page-break-after:always'></DIV>`;

            } 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   