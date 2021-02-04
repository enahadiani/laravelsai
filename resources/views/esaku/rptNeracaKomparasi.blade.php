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
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN NERACA KOMPARASI</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" >Periode yang berakhir pada `+(res.tgl_akhir)+`  `+$periode.fromname+`</td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" >( Disajikan dalam Rupiah )</td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 0 3rem" class="table table-responsive mt-4">
            `;
            html+=`<table class='table table-striped table-bordered' width='100%'>
                        <tr>
                            <th width='30%'  class='header_laporan bg-primary text-center' >Aktiva</th>
                            <th width='10%' class='header_laporan bg-primary text-center' >`+$periode.from+`</th>
                            <th width='10%' class='header_laporan bg-primary text-center' >`+$periode2.from+`</th>
                            <th width='30%' height='25'  class='header_laporan bg-primary text-center' >Pasiva</th>
                            <th width='10%' class='header_laporan bg-primary text-center' >`+$periode.from+`</th>
                            <th width='10%' class='header_laporan bg-primary text-center' >`+$periode2.from+`</th>
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
                        var color1 = "";
                        var color2 = "";
                        var bold1 = "";
                        var bold2 = "";
                        if (line.tipe1!="Header" && line.nama1!=".")
                        {
                            nilai1=sepNum(parseFloat(line.nilai1));
                            nilai3=sepNum(parseFloat(line.nilai3));
                            if(line.tipe1 == "Summary"){
                                // if(line.level_spasi1 == 0){
                                //     color1 = "bg-primary0";
                                // }else if(line.level_spasi1 == 1){
                                //     color1 = "bg-primary";
                                // }else{
                                //     color1 = "bg-primary2";
                                // }
                                color1 = "";
                                bold1 = "bold";
                            }
                            else if(line.tipe1 == "SumPosted"){
                                color1 = "";
                                bold1 = "bold";
                            }
                            else{
                                color1 = "";
                                bold1 = "";
                            }
                        }else{
                            color1 = "";
                            bold1 = "bold";
                        }
                        if (line.tipe2!="Header" && line.nama2!="." )
                        { 
                            nilai2=sepNum(parseFloat(line.nilai2));
                            nilai4=sepNum(parseFloat(line.nilai4));
                            if(line.tipe2 == "Summary"){
                                // if(line.level_spasi2 == 0){
                                //     color2 = "bg-primary0";
                                // }else if(line.level_spasi2 == 1){
                                //     color2 = "bg-primary";
                                // }else{
                                //     color2 = "bg-primary2";
                                // }
                                color2 = "";
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

                        if(i == (data.length - 1)){
                            color1 = "bg-primary0";
                            color2 = "bg-primary0";
                        }
                        det +=`<tr>
                        <td valign='middle' class='isi_laporan `+color1+` `+bold1+`' >`+fnSpasi(line.level_spasi1)+` `+line.nama1+`</td>
                        <td valign='top' class='isi_laporan `+color1+` `+bold1+`' align='right'>`;
                        if (line.tipe1=="Posting" && line.nilai1 != 0)
                        {
                            det+=`<a class='report-link neraca-lajur link-report' style='cursor:pointer;color:blue' data-periode='`+$periode.from+`' data-kode_neraca='`+line.kode_neraca1+`'>`+nilai1+`</a>`;
                        }
                        else
                        {
                            det+=nilai1;
                        }
                        det+=`</td>
                        <td valign='top' class='isi_laporan `+color1+` `+bold1+`' align='right'>`;
                        if (line.tipe1=="Posting" && line.nilai3 != 0)
                        {
                            det+=`<a class='report-link neraca-lajur link-report' style='cursor:pointer;color:blue' data-periode='`+$periode2.from+`' data-kode_neraca='`+line.kode_neraca1+`'>`+nilai3+`</a>`;
                        }
                        else
                        {
                            det+=nilai3;
                        }

                        det+=`</td>
                        <td height='20' valign='middle' class='isi_laporan `+color2+` `+bold2+`' >`+fnSpasi(line.level_spasi2)+` `+line.nama2+`</td>
                        <td valign='top' class='isi_laporan `+color2+` `+bold2+`' align='right'>`;
                        if (line.tipe2=="Posting" && line.nilai2 != 0)
                        {
                            det+=`<a class='report-link neraca-lajur link-report' style='cursor:pointer;color:blue' data-periode='`+$periode.from+`' data-kode_neraca='`+line.kode_neraca2+`'>`+nilai2+`</a>`;
                        }
                        else
                        {
                            det+=nilai2;
                        }
                        det+=`</td><td valign='top' class='isi_laporan `+color2+` `+bold2+`' align='right'>`;
                        if (line.tipe2=="Posting" && line.nilai4 != 0)
                        {
                            det+=`<a class='report-link neraca-lajur link-report' style='cursor:pointer;color:blue' data-periode='`+$periode2.from+`' data-kode_neraca='`+line.kode_neraca2+`'>`+nilai4+`</a>`;
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
   