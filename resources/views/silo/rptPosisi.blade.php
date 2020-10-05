<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
       saiPost('apv/lap-posisi', null, formData, null, function(res){
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
                                                <th class="header_laporan" align="center" >NO</th>
                                                <th class="header_laporan" align="center" >No Bukti</th>
                                                <th class="header_laporan" align="center" >Tgl Kebutuhan</th>
                                                <th class="header_laporan" align="center" >Kode PP</th>
                                                <th class="header_laporan" align="center" >Kode Kota</th>
                                                <th class="header_laporan" align="center" >No Dokumen</th>
                                                <th class="header_laporan" align="center" >Justifikasi Kebutuhan</th>
                                                <th class="header_laporan" align="center" >Dasar</th>
                                                <th class="header_laporan" align="center" >Nilai Kebutuhan</th>
                                                <th class="header_laporan" align="center" >Posisi</th>
                                                <th class="header_laporan" align="center" >No Verifikasi</th>
                                                <th class="header_laporan" align="center" >Tgl Verifikasi</th>
                                                <th class="header_laporan" align="center" >NIK App RM</th>
                                                <th class="header_laporan" align="center" >Tgl App RM</th>
                                                <th class="header_laporan" align="center" >No Pengadaan</th>
                                                <th class="header_laporan" align="center" >Tgl Pengadaan</th>	
                                                <th class="header_laporan" align="center" >Nilai Pengadaan</th>	
                                                <th class="header_laporan" align="center" >NIK App1</th>	
                                                <th class="header_laporan" align="center" >Tgl App1</th>	
                                                <th class="header_laporan" align="center" >NIK App2</th>	
                                                <th class="header_laporan" align="center" >Tgl App2</th>	
                                                <th class="header_laporan" align="center" >NIK App3</th>	
                                                <th class="header_laporan" align="center" >Tgl App3</th>	
                                                <th class="header_laporan" align="center" >NIK App4</th>	
                                                <th class="header_laporan" align="center" >Tgl App4</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                                            var no=1;var det='';
                                            for (var x=0;x<data.length;x++)
                                            {
                                                var line2 = data[x];
                                              
                                                det+=`<tr>
                                                <td align='center' class='isi_laporan'>`+no+`</td>
                                                <td  class='isi_laporan'>`+line2.no_bukti+`</td>
                                                <td class='isi_laporan'>`+line2.waktu+`</td>
                                                <td class='isi_laporan'>`+line2.kode_pp+`</td>
                                                <td class='isi_laporan'>`+line2.kode_kota+`</td>
                                                <td  class='isi_laporan'>`+line2.no_dokumen+`</td>
                                                <td  class='isi_laporan'>`+line2.kegiatan+`</td>
                                                <td  class='isi_laporan'>`+line2.dasar+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.nilai_kebutuhan)+`</td>
                                                <td class='isi_laporan'>`+line2.posisi+`</td>
                                                <td  class='isi_laporan'>`+line2.no_ver+`</td>
                                                <td  class='isi_laporan'>`+line2.tgl_ver+`</td>
                                                <td class='isi_laporan'>`+line2.nik_apprm+`</td>
                                                <td class='isi_laporan'>`+line2.tgl_apprm+`</td>
                                                <td  class='isi_laporan'>`+line2.no_juspo+`</td>
                                                <td  class='isi_laporan'>`+line2.tgl_pengadaan+`</td>
                                                <td class='isi_laporan text-right'>`+sepNumPas(line2.nilai_pengadaan)+`</td>
                                                <td  class='isi_laporan'>`+line2.nik_app1+`</td>
                                                <td  class='isi_laporan'>`+line2.tgl_app1+`</td>
                                                <td class='isi_laporan'>`+line2.nik_app2+`</td>
                                                <td class='isi_laporan'>`+line2.tgl_app2+`</td>
                                                <td class='isi_laporan'>`+line2.nik_app3+`</td>
                                                <td  class='isi_laporan'>`+line2.tgl_app3+`</td>
                                                <td  class='isi_laporan'>`+line2.nik_app4+`</td>
                                                <td class='isi_laporan'>`+line2.tgl_app4+`</td>
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
   