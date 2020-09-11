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
            var html = `<div align='center'>
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
            <table class='table table-borderless' style='width:100%' >
            <tr>
                <td align='center'>
                    <table class='table table-bordered' width='100%'>
                        <tr>
                            <td style='text-align:center;width:35%'>Deskripsi</td>
                            <td style='text-align:center;width:15%'>Jumlah</td>
                            <td style='text-align:center;width:35%'>Deskripsi</td>
                            <td style='text-align:center;width:15%'>Jumlah</td>
                        </tr>
                `;
                    var det = "";
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        var nilai1 = "";
                        var nilai2 = "";
                        if (line.tipe1 != "Header" && line.nama1 != "." && line.nama1 != "")
                        {
                            nilai1=sepNum(parseFloat(line.nilai1));
                        }
                        if (line.tipe2 != "Header" && line.nama2 != "." && line.nama2 != "")
                        { 
                            nilai2=sepNum(parseFloat(line.nilai2));
                        }
                        det +="<tr><td valign='middle' class='isi_laporan' >";
                        // det += fnSpasi(line.level_spasi1);
                        if (line.tipe1 == "Posting" && line.nilai1 != 0)
                        {
                            det +="<a style='cursor:pointer;color:blue' data-kode_neraca='"+line.kode_neraca1+"' class='neraca-lajur'>"+line.nama1+"</a>";
                        }
                        else
                        {
                            det += line.nama1;
                        }
                        det +=`</td><td valign='middle' class='isi_laporan' align='right'>`+nilai1+`</td>`;
                        det +="<td height='20' valign='middle' class='isi_laporan'>";
                        // // det += fnSpasi(line.level_spasi2);
                        if (line.tipe2 == "Posting" && line.nilai2 != 0)
                        {
                            det += "<a style='cursor:pointer;color:blue' data-kode_neraca='"+line.kode_neraca2+"' class='neraca-lajur'>"+line.nama2+"</a>";
                        }
                        else
                        {
                            det += line.nama2;
                        }
                        det +="</td><td valign='middle' class='isi_laporan' align='right'>"+nilai2+"</td></tr>";
                    }
            html+=det+`</table></td>
                        </tr>
                    </td>
                </tr>
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
   