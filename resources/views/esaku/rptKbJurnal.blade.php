<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-jurnal-kb', null, formData, null, function(res){
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
            var html = ` <style>
                .info-table thead{
                    // background:#e9ecef;
                }
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
                .table-header-prev td{
                    padding: 2px !important;
                }
                .table-kop-prev td{
                    padding: 0px !important;
                }
                .separator2{
                    height:1rem;
                    background:#f8f8f8;
                    box-shadow: -1px 0px 1px 0px #e1e1e1;
                }
                .vtop{
                    vertical-align:top !important;
                }
                .lh1{
                    line-height:1;
                }
                .bg-primary2{
                    background: #eaf2ff !important;
                }
                
                .bg-primary0{
                    background: #00358a !important;
                    color:white !important;
                }
            </style>
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN TRANSAKSI KAS</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" >Periode `+($periode.fromname)+`</td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" >( Disajikan dalam Rupiah )</td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 0 3rem" class="table table-responsive mt-4">
                <table width='100%' class='table table-bordered table-striped'>
                    <tr>
                        <td width='20'  class='header_laporan bg-primary' align='center'>No</td>
                        <td width='80' class='header_laporan bg-primary' align='center'>No Bukti</td>
                        <td width='80' class='header_laporan bg-primary' align='center'>No Dokumen</td>
                        <td width='50' class='header_laporan bg-primary' align='center'>Tanggal</td>
                        <td width='70' height='25' class='header_laporan bg-primary' align='center'>Akun</td>
                        <td width='200' class='header_laporan bg-primary' align='center'>Nama Akun </td>
                        <td width='40' class='header_laporan bg-primary' align='center'>PP</td>
                        <td width='40' class='header_laporan bg-primary' align='center'>Posted</td>
                        <td width='250' class='header_laporan bg-primary' align='center'>Keterangan</td>
                        <td width='80' class='header_laporan bg-primary' align='center'>Debet</td>
                        <td width='80' class='header_laporan bg-primary' align='center'>Kredit</td>
                    </tr>`;
                        var total=0; 
                        var det = '';
                        if(from != undefined){
                            var no=from+1;
                        }else{
                            var no=1;
                        }
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
                                        <td height='25' colspan='9' align='right'  class='bold bg-primary'>Sub Total</td>
                                        <td class='bold bg-primary' align='right'>`+ndebet+`</td>
                                        <td class='bold bg-primary' align='right'>`+nkredit+`</td>
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
                            <td class='isi_laporan'>`+line2.tanggal+`</td>
                            <td class='isi_laporan'>`+line2.kode_akun+`</td>
                            <td  class='isi_laporan'>`+line2.nama+`</td>
                            <td  class='isi_laporan'>`+line2.kode_pp+`</td>
                            <td  class='isi_laporan'>`+line2.posted+`</td>
                            <td  class='isi_laporan'>`+line2.keterangan+`</td>
                            <td  class='isi_laporan text-right'>`+sepNum(parseFloat(line2.debet))+`</td>
                            <td  class='isi_laporan text-right'>`+sepNum(parseFloat(line2.kredit))+`</td>
                            </tr>`;	
                            first = true;
                            no++;
                            
                            
                        }
                        ndebet=sepNum(debet);
                        nkredit=sepNum(kredit);
                        if(res.sumju == "Ya"){
                            
                            det+=`<tr>
                            <td height='25' colspan='9' align='right'  class='bold bg-primary'>Sub Total</td>
                            <td class='bold bg-primary' align='right'>`+ndebet+`</td>
                            <td class='bold bg-primary' align='right'>`+nkredit+`</td>
                            </tr>`;
                        }else{
                            det+=`<tr>
                            <td height='25' colspan='9' align='right'  class='bold bg-primary'>Sub Total</td>
                            <td class='bold bg-primary' align='right'>`+sepNum(debet)+`</td>
                            <td class='bold bg-primary' align='right'>`+sepNum(kredit)+`</td>
                            </tr>`;
                        }
                        html+=det+`
                    </table>
                <DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   