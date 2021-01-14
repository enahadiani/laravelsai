<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-neraca-komparasi', null, formData, null, function(res){
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
            var html = `<div align='center'>
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
            periode = $periode;
            var lokasi = res.lokasi;
            var nama_periode = namaPeriode(periode.from);
            html+=judul_lap("LAPORAN NERACA",lokasi,'Untuk Periode yang berakhir pada '+res.tgl_akhir+' '+nama_periode)+`
                    <table class='table table-bordered' width='100%'>
                        <tr>
                            <th width='30%'  class='header_laporan text-center' >Aktiva</th>
                            <th width='10%' class='header_laporan text-center' >`+$periode.from+`</th>
                            <th width='10%' class='header_laporan text-center' >`+$periode2.from+`</th>
                            <th width='30%' height='25'  class='header_laporan text-center' >Pasiva</th>
                            <th width='10%' class='header_laporan text-center' >`+$periode.from+`</th>
                            <th width='10%' class='header_laporan text-center' >`+$periode2.from+`</th>
                        </tr>
                        `;
                    var det = "";
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        var nilai1="";
                        var nilai2="";
                        var nilai3="";
                        var nilai4="";
                        if (line.tipe1!="Header" && line.nama1!=".")
                        {
                            nilai1=sepNum(parseFloat(line.nilai1));
                            nilai3=sepNum(parseFloat(line.nilai3));
                        }
                        if (line.tipe2!="Header" && line.nama2!="." )
                        { 
                            nilai2=sepNum(parseFloat(line.nilai2));
                            nilai4=sepNum(parseFloat(line.nilai4));
                        }
                        det +=`<tr>
                        <td valign='middle' class='isi_laporan' >`+fnSpasi(line.level_spasi1)+` `+line.nama1+`</td>
                        <td valign='top' class='isi_laporan' align='right'>`;
                        if (line.tipe1=="Posting" && line.nilai1 != 0)
                        {
                            det+=`<a class='isi_laporan report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca1+`'>`+nilai1+`</a>`;
                        }
                        else
                        {
                            det+=nilai1;
                        }
                        det+=`</td>
                        <td valign='top' class='isi_laporan' align='right'>`;
                        if (line.tipe1=="Posting" && line.nilai3 != 0)
                        {
                            det+=`<a class='isi_laporan report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca1+`'>`+nilai3+`</a>`;
                        }
                        else
                        {
                            det+=nilai3;
                        }
                        det+=`</td>
                        <td height='20' valign='middle' class='isi_laporan'>`+fnSpasi(line.level_spasi2)+` `+line.nama2+`</td>
                        <td valign='top' class='isi_laporan' align='right'>`;
                        if (line.tipe1=="Posting" && line.nilai2 != 0)
                        {
                            det+=`<a class='isi_laporan report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca2+`'>`+nilai2+`</a>`;
                        }
                        else
                        {
                            det+=nilai2;
                        }
                        det+=`</td><td valign='top' class='isi_laporan' align='right'>`;
                        if (line.tipe1=="Posting" && line.nilai4 != 0)
                        {
                            det+=`<a class='isi_laporan report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca2+`'>`+nilai4+`</a>`;
                        }
                        else
                        {
                            det+=nilai4;
                        }
                        det+=`</td>`;
                        det+=`</tr>`;
                        
                    }
            html+=det+`</table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   