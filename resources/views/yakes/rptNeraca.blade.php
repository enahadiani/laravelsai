<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('yakes-report/lap-neraca', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
           }
       });
   }

   drawLap($formData);

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            periode = $periode;
            res.data_detail = [];
            var html = `
            <style>
            .info-table thead{
                background:#4286f5;
                color:white;
            }
            .no-border td{
                border:0 !important;
            }
            .bold {
                font-weight:bold;
            }
            .report-table td, .report-table th{
                border-color: black !important; 
            }
            .border-bottom2{
                border-bottom: 2px solid black !important;
            }
            .fs1-1rem{
                font-size: 1.1rem;
            }

            .fs1rem{
                font-size: 1rem;
            }
            </style>
            <table class='table table-borderless kotak report-table' width='100%'>
            <tr height='20px'>
                <td colspan=6>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'></td>
                <td width='90%' colspan='4' class='text-center border-bottom2'>
                    <span class='bold fs1-1rem'>YAYASAN KESEHATAN PEGAWAI TELKOM</span><br>
                    <span class='bold fs1-1rem'>LAPORAN POSISI KEUANGAN </span><br>
                    <span class='bold fs1rem'>Per 31 JANUARI 2020, 31 DESEMBER 2019</span><br>
                    <span class='bold fs1rem'>(Disajikan dalam Rupiah)</span>
                </td>
                <td width='5%'></td>
            </tr>
            <tr>
                <td colspan=6>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'></td>
                <td width='50%' height='25'  class='header_laporan'></td>
                <td width='8%' class='header_laporan fs-1rem bold'><u>Catatan</u></td>
                <td width='16%' class='header_laporan text-right fs-1rem bold'><u>31 JANUARI 2020</u></td>
                <td width='16%' class='header_laporan text-right fs-1rem bold'><u>31 DESEMBER 2019</u></td>
                <td width='5%'></td>
            </tr>
            `;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var nilai="";
                var line = data[i];
                if (line.tipe!="Header")
                {
                    nilai=sepNum(parseFloat(line.n4));
                }
			
                if (line.tipe=="Posting" && line.n4 != 0)
                {
                    html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
                    <td width='5%'></td>
                    <td width='50%' height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td width='8%'></td>
                    <td width='16%' class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                    <td width='16%' class='isi_laporan'><div align='right'>&nbsp;</div></td>
                    <td width='5%'></td>
                    </tr>`;
                }
                else
                {
                    html+=`<tr>
                    <td width='5%'></td>
                    <td width='50%' height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                    <td width='8%'></td>
                    <td width='16%' class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                    <td width='16%' class='isi_laporan'><div align='right'>&nbsp;</div></td>
                    <td width='5%'></td>
                    </tr>`;
                }
                no++;
            }
            html+=`
            <tr>
                <td colspan='6'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td colspan='4' class='text-right'>Bandung, 03 Desember 2020</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td class='text-center'>Mengetahui/menyetujui</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'>PJ Keuangan dan Investasi</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'>PJ SM Keuangan</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='60px'>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%'></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'></u>Teuku Hercules</u></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'><u>Lina Herlina</u></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'>NIK. 670255</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'>NIK. 660259</td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr height='20px'>
                <td colspan=6>&nbsp;</td>
            </tr>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   