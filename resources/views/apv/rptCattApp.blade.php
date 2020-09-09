<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
       saiPost("{{ url('apv/lap-catt-app') }}", null, formData, null, function(res){
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
        if(data.length > 0){

    var mon_html = `<div align='center' style='padding:10px' id='sai-rpt-table-export-tbl-daftar-reg'>
               `;
               var x=1;
               for(var i=0;i < data.length;i++){
               mon_html+=`
                    <h6 style='text-align:left'>No Bukti : `+data[i].no_bukti+`</h6>
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
                                                <th class="header_laporan" align="center" >NIK</th>
                                                <th class="header_laporan" align="center" >Nama</th>
                                                <th class="header_laporan" align="center" >Tanggal</th>
                                                <th class="header_laporan" align="center" >Status</th>
                                                <th class="header_laporan" align="center" >Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>`;
                                            var no=1;var det='';
                                            for (var x=0;x<res.res.data_detail.length;x++)
                                            {
                                                var line2 = res.res.data_detail[x];
                                                if(data[i].no_bukti == line2.no_bukti){
                                                    det+=`<tr>
                                                    <td align='center' class='isi_laporan'>`+no+`</td>
                                                    <td  class='isi_laporan'>`+line2.nik+`</td>
                                                    <td class='isi_laporan'>`+line2.nama+`</td>
                                                    <td class='isi_laporan'>`+line2.tanggal+`</td>
                                                    <td class='isi_laporan'>`+line2.status+`</td>
                                                    <td class='isi_laporan'>`+line2.keterangan+`</td>
                                                    </tr>`;	
                                                    no++;
                                                }
                                                
                                            }
                                            mon_html+=det+`
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table><br>
                    <div style="page-break-after:always"></div>`;
               }
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
   