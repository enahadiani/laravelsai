<script type="text/javascript">
    function drawLap(formData){
       saiPost('esaku-report/lap-neraca', null, formData, null, function(res){
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
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
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

            `;
            var lokasi = res.lokasi;
            html+=`
            <table border='0' cellspacing='0' cellpadding='0' >
            <tr>
                <td class='lokasi_laporan' align='center'>`+lokasi+`</td>
            </tr>
            <tr>
                <td  class='lokasi_laporan2' align='center'>LAPORAN NERACA `+res.nama_periode+` `+nama+`</td>
            </tr>
            <tr>
                <td class='lokasi_laporan' align='center'>Untuk Periode Yang Berakhir Pada Tanggal $totime</td>
            </tr>
            <tr>
                <td align='center'>
                <table border='0' cellspacing='2' cellpadding='1'>
                    <tr>
                        <td>
                        <table border='1' cellspacing='0' cellpadding='0' class='kotak'>
                            <tr bgcolor='#CCCCCC'>
                                <td width='340'  class='header_laporan' align='center'>Deskripsi</td>
                                <td width='100' class='header_laporan' align='center'>Jumlah</td>
                                <td width='340' height='25'  class='header_laporan' align='center'>Deskripsi</td>
                                <td width='100' class='header_laporan' align='center'>Jumlah</td>
                            </tr>
                `;
                    var det = "";
                    // for (var i=0; i < data.length ; i++)
                    // {
                    //     var line  = data[i];
                    //     var nilai1 = "";
                    //     var nilai2 = "";
                    //     if (line.tipe1!="Header" && line.nama1!="." && line.nama1!="")
                    //     {
                    //         nilai1=sepNum(parseFloat(line.nilai1));
                    //     }
                    //     if (line.tipe2!="Header" && line.nama2!="." && line.nama2!="")
                    //     { 
                    //         $nilai2=sepNum(parseFloat(line.nilai2));
                    //     }
                    //     det +="<tr><td valign='middle' class='isi_laporan' >";
                    //     // det += fnSpasi(line.level_spasi1);
                    //     if (line.tipe1=="Posting" && line.nilai1 <> 0)
                    //     {
                    //         det +="<a style='cursor:pointer;color:blue' data-kode_neraca='"+line.kode_neraca1+"'>"+line.nama1+"</a>";
                    //     }
                    //     else
                    //     {
                    //         det +=line.nama1;
                    //     }
                    //     det +=`</td>
                    //         <td valign='middle' class='isi_laporan' align='right'>`+nilai1+`</td>`;
                    //     det +="<td height='20' valign='middle' class='isi_laporan'>";
                    //     // det += fnSpasi(line.level_spasi2);
                    //     if (line.tipe2=="Posting" && line.nilai2 <> 0)
                    //     {
                    //         det +="<a style='cursor:pointer;color:blue' data-kode_neraca='"++kode_neraca2+"'>"+line.nama2+"</a>";
                    //     }
                    //     else
                    //     {
                    //         det +=line.nama2;
                    //     }
                    //     det +="</td><td valign='middle' class='isi_laporan' align='right'>"+nilai2+"</td></tr>";
                    // }
            html+=det+`</table></td>
                </tr>
                </td></tr>
                </table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   