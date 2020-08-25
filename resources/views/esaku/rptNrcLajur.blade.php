<div id='canvasPreview'>

</div>
<script type="text/javascript">

    function drawLap(formData){
       saiPost('esaku-report/lap-nrclajur', null, formData, null, function(res){
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
                    // background:#e9ecef;
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
            html+=`
                <table class='table table-bordered info-table'>
                    <thead>
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
                    </tr>
                    </thead>
                    <tbody>`;
                    var so_awal_debet=0;
                    var so_awal_kredit=0;
                    var debet=0;
                    var kredit=0;
                    var so_akhir_debet=0;
                    var so_akhir_kredit=0;
                    var no=1;
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        so_awal_debet=so_awal_debet+parseFloat(line.so_awal_debet);
                        so_awal_kredit=so_awal_kredit+parseFloat(line.so_awal_kredit);
                        debet=debet+parseFloat(line.debet);
                        kredit=kredit+parseFloat(line.kredit);
                        so_akhir_debet=so_akhir_debet + parseFloat(line.so_akhir_debet);
                        so_akhir_kredit=so_akhir_kredit + parseFloat(line.so_akhir_kredit);
                        
                        html +=`<tr>
                            <td class='isi_laporan' align='center'>`+no+`</td>
                            <td class='isi_laporan'>`+line.kode_akun+`</td>
                            <td height='20' class='isi_laporan'><a style='cursor:pointer;color:blue' data-kode_akun='`+line.kode_akun+`' class='bukubesar'>`+line.nama+`</a>
                            </td>
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
                </tbody>
            </table>`;
        }
        $('#canvasPreview').html(html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   