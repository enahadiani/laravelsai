<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-saldo-kb', null, formData, null, function(res){
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
            var lokasi = res.lokasi;
            periode = $periode;
            var html = `<style>
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
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN SALDO KAS BANK</h6></td>
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
                <table class='table table-bordered table-striped'>
                <tr>
                    <th width='30' rowspan='2'  class='header_laporan bg-primary text-center' >No</th>
                    <th width='50' rowspan='2' class='header_laporan bg-primary text-center' >Kode</th>
                    <th width='250' rowspan='2' class='header_laporan bg-primary text-center' >Nama Akun</th>
                    <th colspan='2' class='header_laporan bg-primary text-center' >Saldo Awal </th>
                    <th colspan='2' class='header_laporan bg-primary text-center' >Mutasi</th>
                    <th colspan='2' class='header_laporan bg-primary text-center' >Saldo Akhir </th>
                </tr>
                <tr> 
                    <th width='90' class='header_laporan bg-primary text-center' >Debet</th>
                    <th width='90' class='header_laporan bg-primary text-center' >Kredit</th>
                    <th width='90' class='header_laporan bg-primary text-center' >Debet</th>
                    <th width='90' class='header_laporan bg-primary text-center' >Kredit</th>
                    <th width='90' class='header_laporan bg-primary text-center' >Debet</th>
                    <th width='90' class='header_laporan bg-primary text-center' >Kredit</th>
                </tr>`;
			    var so_awal_debet=0;
                var so_awal_kredit=0;
                var debet=0;
                var kredit=0;
                var so_akhir_debet=0;
                var so_akhir_kredit=0;
                var i=1;
                for (var a=0; a < data.length; a++)
                {
                    var line = data[a];
                    so_awal_debet+=line.so_awal_debet;
                    so_awal_kredit+=line.so_awal_kredit;
                    debet+=line.debet;
                    kredit+=line.kredit;
                    so_akhir_debet+=line.so_akhir_debet;
                    so_akhir_kredit+=line.so_akhir_kredit;
                    html+=`<tr class='isi_laporan report-link bukubesar' style='cursor:pointer;' data-kode_akun='`+line.kode_akun+`'>
                        <td class='isi_laporan' align='center'>`+i+`</td>
                        <td class='isi_laporan'>`+line.kode_akun+`</td>
                        <td height='20' style='color:blue'>`+line.nama+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.so_awal_debet)+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.so_awal_kredit)+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.debet)+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.kredit)+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.so_akhir_debet)+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.so_akhir_kredit)+`</td>
                    </tr>`;
                    i++;
                }
            html+=`<tr>
                <td colspan='3' class='sum_laporan bg-primary bold' align='right'>Total</td>
                <td class='sum_laporan bg-primary bold' align='right'>`+sepNum(so_awal_debet)+`</td>
                <td class='sum_laporan bg-primary bold' align='right'>`+sepNum(so_awal_kredit)+`</td>
                <td class='sum_laporan bg-primary bold' align='right'>`+sepNum(debet)+`</td>
                <td class='sum_laporan bg-primary bold' align='right'>`+sepNum(kredit)+`</td>
                <td class='sum_laporan bg-primary bold' align='right'>`+sepNum(so_akhir_debet)+`</td>
                <td class='sum_laporan bg-primary bold' align='right'>`+sepNum(so_akhir_kredit)+`</td>
            </tr>`;

            html+="</table></div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   