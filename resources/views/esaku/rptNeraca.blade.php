<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-neraca', null, formData, null, function(res){
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
            var html = `
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
                .table-header-prev td{
                    padding: 2px !important;
                }
                .table-kop-prev td{
                    padding: 0px !important;
                }
                .separator2{
                    height:1rem;
                    background:#f8f8f8;
                    box-shadow: -1px 0px 1px 0px #e1e1e1;
                }
                .vtop{
                    vertical-align:top !important;
                }
                .lh1{
                    line-height:1;
                }
                .bg-primary2{
                    background: #eaf2ff !important;
                }
                
                .bg-primary0{
                    background: #00358a !important;
                    color:white !important;
                }
            </style>
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN NERACA</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" >Periode `+($periode.fromname)+`</td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" >( Disajikan dalam jutaan Rupiah )</td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 0 3rem" class="table table-responsive mt-4">
            `;
            html+=`
                    <table class='table table-bordered table-striped' width='100%'>
                        <tr>
                            <th class='text-center bg-primary' width='35%'>Deskripsi</th>
                            <th class='text-center bg-primary' width='15%'>Jumlah</th>
                            <th class='text-center bg-primary' width='35%'>Deskripsi</th>
                            <th class='text-center bg-primary' width='15%'>Jumlah</th>
                        </tr>
                `;
                    var det = "";
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        var nilai1 = "";
                        var nilai2 = "";
                        var color = "";
                        var bold = "";
                        if (line.tipe1 != "Header" && line.nama1 != "." && line.nama1 != "")
                        {
                            if(line.tipe1 == "Summary"){
                                if(line.level_spasi1 == 0){
                                    color = "bg-primary0";
                                }else if(line.level_spasi1 == 1){
                                    color = "bg-primary";
                                }else{
                                    color = "bg-primary2";
                                }
                                bold = "bold";
                            }
                            else if(line.tipe1 == "SumPosted"){
                                color = "";
                                bold = "bold";
                            }
                            else{
                                color = "";
                                bold = "";
                            }
                            nilai1=sepNum(parseFloat(line.nilai1));
                        }else{
                            color = "";
                            bold = "bold";
                        }
                        det +="<tr>";
                        if (line.tipe1 == "Posting" && line.nilai1 != 0)
                        {
                            det += "<td valign='middle' class='isi_laporan "+color+" "+bold+" report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='"+line.kode_neraca1+"'>"+fnSpasi(line.level_spasi1)+line.nama1+"</td>";
                        }
                        else
                        {
                            det += "<td valign='middle' class='isi_laporan "+color+" "+bold+" '>"+fnSpasi(line.level_spasi1)+line.nama1+"</td>";
                        }
                        det +=`<td valign='middle' class='isi_laporan `+color+` `+bold+`' align='right'>`+nilai1+`</td>`;

                        var color2 = "";
                        var bold2 = "";
                        if (line.tipe2 != "Header" && line.nama2 != "." && line.nama2 != "")
                        { 
                            nilai2=sepNum(parseFloat(line.nilai2));
                            if(line.tipe2 == "Summary"){
                                if(line.level_spasi2 == 0){
                                    color2 = "bg-primary0";
                                }else if(line.level_spasi2 == 1){
                                    color2 = "bg-primary";
                                }else{
                                    color2 = "bg-primary2";
                                }
                                bold2 = "bold";
                            }
                            else if(line.tipe2 == "SumPosted"){
                                color2 = "";
                                bold2 = "bold";
                            }
                            else{
                                color2 = "";
                                bold2 = "";
                            }
                        }else{
                            color2 = "";
                            bold2 = "bold";
                        }
                        if (line.tipe2 == "Posting" && line.nilai2 != 0)
                        {
                            det += "<td valign='middle' class='isi_laporan "+color2+" "+bold2+" report-link neraca-lajur link-report' style='cursor:pointer;' data-kode_neraca='"+line.kode_neraca2+"'>"+fnSpasi(line.level_spasi2)+line.nama2+"</td>";
                        }
                        else
                        {
                            det += "<td valign='middle' class='isi_laporan "+color2+" "+bold2+" '>"+fnSpasi(line.level_spasi2)+line.nama2+"</td>";
                        }
                        det +="<td valign='middle' class='isi_laporan "+color2+" "+bold2+"' align='right'>"+nilai2+"</td></tr>";
                    }
            html+=det+`</table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   