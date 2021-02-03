<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-bukubesar', null, formData, null, function(res){
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
            periode = $periode;
            var html = `
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
                table th.no-border{
                    border:0 !important;
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
                .bg-highlight{
                    background: #eaf2ff !important;
                }
                .bg-white{
                    background: white !important;
                }
            </style>
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN BUKU BESAR</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" >Periode `+($periode.fromname)+`</td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" >( Disajikan dalam jutaan Rupiah )</td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            `;
            for(var i=0;i<data.length;i++){
                var line = data[i];
                html+=`
                <div style="padding: 0 3rem" class="table table-responsive">
                <table class='table table-bordered table-striped mt-4'>
                <tr>
                    <th class='header_laporan bg-white no-border' width='100'>Kode Akun  </th>
                    <th class='header_laporan bg-white no-border' colspan='7'>:&nbsp;`+line.kode_akun+`</th>
                </tr>
                <tr>
                    <th class='header_laporan bg-white no-border'>Nama Akun </th>
                    <th class='header_laporan bg-white no-border' colspan='7'>:&nbsp;`+line.nama+`</th>
                </tr>
                <tr>
                    <th width='80' height='23' class='header_laporan bg-primary' align='center'>No Bukti</th>
                    <th width='80' height='23' class='header_laporan bg-primary' align='center'>No Dokumen</th>
                    <th width='60' class='header_laporan bg-primary' align='center'>Tanggal</th>
                    <th width='250' class='header_laporan bg-primary' align='center'>Keterangan</th>
                    <th width='60' class='header_laporan bg-primary' align='center'>Kode PP</th>
                    <th width='90' class='header_laporan bg-primary' align='center'>Debet</th>
                    <th width='90' class='header_laporan bg-primary' align='center'>Kredit</th>
                    <th width='90' class='header_laporan bg-primary' align='center'>Balance</th>
                </tr>
                <tr>
                    <th height='23' colspan='7' class='header_laporan bg-highlight text-right'>Saldo Awal </th>
                    <th class='header_laporan bg-highlight text-right'>`+sepNum(line.so_awal)+`</th>
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
                <td height='23' colspan='5' valign='top' class='isi_laporan bg-primary' align='right'>Total&nbsp;</td>
                <td valign='top' class='isi_laporan bg-primary' align='right'>`+sepNum(debet)+`</td>
                <td valign='top' class='isi_laporan bg-primary' align='right'>`+sepNum(kredit)+`</td>
                <td valign='top' class='isi_laporan bg-primary' align='right'>`+sepNum(saldo)+`</td>
            </tr>
            </table>
            <br>`;
            
            html+="</div>"; 
                if(i != (data.length - 1)){
                    html+=`<div class='separator2 mb-4'></div>`;
                }

            }      

        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   