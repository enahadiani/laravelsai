<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
       saiPost('apv/lap-rekap-aju-det', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show')[0].selectize.getValue();
                generatePagination('pagination',show,res);
              
           }
       });
   }

   drawLap($formData);

   
   function drawRptPage(data,res,from,to){
        var data = data;
        console.log(data.length);
        if(data.length > 0){

    var mon_html = `<div align='center' style='padding:10px' id='sai-rpt-table-export-tbl-daftar-reg'>
               `;
               var x=1;
               mon_html+=`
                    <table width="800px" class="table no-border">
                        <style>
                            td,th{
                                padding:4px !important;
                                vertical-align:middle !important;
                            }
                            thead td{
                                border:none !important;
                            }
                        </style>
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table width="100%" class="table table-striped color-table info-table">
                                        <thead>
                                            <tr>
                                                <th class="header_laporan" align="center" width="5%">NO</th>
                                                <th class="header_laporan" align="center" width="10%">No Bukti Juskeb</th>
                                                <th class="header_laporan" align="center" width="10%">No Bukti Juspo</th>
                                                <th class="header_laporan" align="center" width="10%">No Dokumen</th>
                                                <th class="header_laporan" align="center" width="20%">Justifikasi Kebutuhan</th>
                                                <th class="header_laporan" align="center" width="20%">Latar Belakang</th>
                                                <th class="header_laporan" align="center" width="10%">PIC</th>
                                                <th class="header_laporan" align="center" width="10%">DIVISI</th>
                                                <th class="header_laporan" align="center" width="10%">NILAI JUSKEB</th>
                                                <th class="header_laporan" align="center" width="10%">NILAI FINAL</th>
                                                <th class="header_laporan" align="center" width="15%">POSISI</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                                            var no=1;var det='';
                                            for (var x=0;x<data.length;x++)
                                            {
                                                var line2 = data[x];
                                              
                                                det+=`<tr>
                                                <td align='center' class='isi_laporan'>`+no+`</td>
                                                <td  class='isi_laporan'>`+line2.no_juskeb+`</td>
                                                <td class='isi_laporan'>`+line2.no_juspo+`</td>
                                                <td class='isi_laporan'>`+line2.no_dokumen+`</td>
                                                <td class='isi_laporan'>`+line2.juskeb+`</td>
                                                <td class='isi_laporan'>`+line2.latar_belakang+`</td>
                                                <td class='isi_laporan'>`+line2.pic+`</td>
                                                <td class='isi_laporan'>`+line2.nama_divisi+`</td>
                                                <td class='isi_laporan text-right '>`+sepNumPas(line2.nilai)+`</td>
                                                <td class='isi_laporan text-right '>`+sepNumPas(line2.nilai_juspo)+`</td>
                                                <td class='isi_laporan'>`+line2.posisi+`</td>
                                                </tr>`;	
                                                no++;
                                            
                                                
                                            }
                                            mon_html+=det+`
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table><br>
                    <div style="page-break-after:always"></div>`;
                        
               mon_html+="</div>"; 
            }
        $('#canvasPreview').html(mon_html);
        $('li.first a ').html("<i class='icon-control-start'></i>");
        $('li.last a ').html("<i class='icon-control-end'></i>");
        $('li.prev a ').html("<i class='icon-arrow-left'></i>");
        $('li.next a ').html("<i class='icon-arrow-right'></i>");
        $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   