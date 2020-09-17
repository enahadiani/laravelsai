<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-nrclajur', null, formData, null, function(res){
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
                    // background:#e9ecef;
                }
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
            </style>

            `;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN NERACA LAJUR",lokasi,'Periode '+periode.fromname)+`
                <table class='table table-bordered info-table'>
                    <tr>
                        <td width='30' rowspan='2'  class='header_laporan' align='center'>No</td>
                        <td width='70' rowspan='2' class='header_laporan' align='center'>Kode Akun</td>
                        <td width='300' rowspan='2' class='header_laporan' align='center'>Nama Akun</td>
                        <td height='25' colspan='2' class='header_laporan' align='center'>Saldo Awal </td>
                        <td colspan='2' class='header_laporan' align='center'>Mutasi</td>
                        <td colspan='2' class='header_laporan' align='center'>Saldo Akhir </td>
                    </tr>
                    <tr> 
                        <td width='90' height='25' class='header_laporan' align='center'>Debet</td>
                        <td width='90' class='header_laporan' align='center'>Kredit</td>
                        <td width='90' class='header_laporan' align='center'>Debet</td>
                        <td width='90' class='header_laporan' align='center'>Kredit</td>
                        <td width='90' class='header_laporan' align='center'>Debet</td>
                        <td width='90' class='header_laporan' align='center'>Kredit</td>
                    </tr>`;
                    var so_awal_debet=0;
                    var so_awal_kredit=0;
                    var debet=0;
                    var kredit=0;
                    var so_akhir_debet=0;
                    var so_akhir_kredit=0;
                    if(from != undefined){
                        var no=from+1;
                    }else{
                        var no=1;
                    }
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        so_awal_debet=so_awal_debet+parseFloat(line.so_awal_debet);
                        so_awal_kredit=so_awal_kredit+parseFloat(line.so_awal_kredit);
                        debet=debet+parseFloat(line.debet);
                        kredit=kredit+parseFloat(line.kredit);
                        so_akhir_debet=so_akhir_debet + parseFloat(line.so_akhir_debet);
                        so_akhir_kredit=so_akhir_kredit + parseFloat(line.so_akhir_kredit);
                        
                        html +=`<tr class='report-link bukubesar' style='cursor:pointer;' data-kode_akun='`+line.kode_akun+`'>
                            <td class='isi_laporan' align='center'>`+no+`</td>
                            <td class='isi_laporan' >`+line.kode_akun+`</td>
                            <td height='20' class='isi_laporan link-report'>`+line.nama+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_awal_debet))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_awal_kredit))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.debet))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.kredit))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_akhir_debet))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_akhir_kredit))+`</td>
                        </tr>`;
                        no++;
                    }
            html+=`<tr>
                <td height='20' colspan='3' class='sum_laporan' align='right'>Total</td>
                <td class='sum_laporan' align='right'>`+sepNum(so_awal_debet)+`</td>
                <td class='sum_laporan' align='right'>`+sepNum(so_awal_kredit)+`</td>
                <td class='sum_laporan' align='right'>`+sepNum(debet)+`</td>
                <td class='sum_laporan' align='right'>`+sepNum(kredit)+`</td>
                <td class='sum_laporan' align='right'>`+sepNum(so_akhir_debet)+`</td>
                <td class='sum_laporan' align='right'>`+sepNum(so_akhir_kredit)+`</td>
                </tr>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   