<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('yakes-report/lap-neraca', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
            
        
           }
           else{
                $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
           }
       });
   }

   drawLap($formData);

    function sepNumber(x){
        if(!isNaN(x)){
            if (typeof x === undefined || !x || x == 0) { 
                return 0;
            }else if(!isFinite(x)){
                return 0;
            }else{
                var x = parseFloat(x).toFixed(0);
                var parts = x.toString().split('.');
                parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
                return parts.join(',');
            }
        }else{
            return 0;
        }
    }

    function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){
            res.bentuk = '';
            var lokasi = res.lokasi;
            periode = $periode;
            var tahun = periode.from.substr(0,4);
            var bln = periode.from.substr(4,2);
            var tahunseb = parseInt(tahun)-1;
            var periode_pilih = namaPeriode(tahun+''+bln);
            var periode_seb = namaPeriode(tahunseb+'12');
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
                    <span class='bold fs1rem'>Per `+res.res.tgl_awal+` `+periode_pilih+`,  31 `+periode_seb+`</span><br>
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
                <td width='8%' class='header_laporan fs-1rem bold'><u></u></td>
                <td width='16%' class='header_laporan text-right fs-1rem bold'><u>`+res.res.tgl_awal+` `+periode_pilih+`</u></td>
                <td width='16%' class='header_laporan text-right fs-1rem bold'><u> 31 `+periode_seb+`</u></td>
                <td width='5%'></td>
            </tr>
            `;
            var no=1;
            for (var i=0;i < data.length;i++)
            {
                var n1="";
                var n2="";
                var line = data[i];
                if (line.tipe!="Header")
                {
                    n1=sepNumber(parseFloat(line.n1));
                    n2=sepNumber(parseFloat(line.n2));
                }
			
                if (line.tipe=="Posting" && (line.n1 != 0 || line.n2 != 0))
                {
                    html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' >
                    <td width='5%'></td>
                    <td width='50%' height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                    <td width='8%'></td>
                    <td width='16%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                    <td width='16%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                    <td width='5%'></td>
                    </tr>`;
                }
                else
                {
                    html+=`<tr>
                    <td width='5%'></td>
                    <td width='50%' height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                    <td width='8%'></td>
                    <td width='16%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                    <td width='16%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                    <td width='5%'></td>
                    </tr>`;
                }
                no++;
            }
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            var nama_periode = namaPeriode(yyyy+''+mm);
            html+=`
            <tr>
                <td colspan='6'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td colspan='4' class='text-right'>Bandung, `+dd+` `+nama_periode+`</td>
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
                <td width='50%' class='text-center'>`+res.res.ttd[0].jab1+`</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'>`+res.res.ttd[0].jab2+`</td>
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
                <td width='50%' class='text-center'><u>`+res.res.ttd[0].nama+`</u></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'><u>`+res.res.ttd[0].nama2+`</u></td>
                <td width='5%'>&nbsp;</td>
            </tr>
            <tr>
                <td width='5%'>&nbsp;</td>
                <td width='50%' class='text-center'>NIK. `+res.res.ttd[0].nik1+`</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td width='16%' class='text-center'>NIK. `+res.res.ttd[0].nik2+`</td>
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
   