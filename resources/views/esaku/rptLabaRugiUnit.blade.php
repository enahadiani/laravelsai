<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-labarugi-unit', null, formData, null, function(res){
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
                .uppercase{
                    text-transform:uppercase;
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
            `;
            periode = $periode;
            for (var i=0;i < data.length;i++)
            {
                
                var linex = data[i];
            html+=`
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN LABA RUGI UNIT</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" class='uppercase'>UNIT `+linex.nama+`</td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" ></td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 0 3rem" class="table table-responsive mt-4">
                <table class='table table-bordered info-table'>
                    <tr>
                        <th width='400' height='25'  class='header_laporan bg-primary' align='center'>Keterangan</th>
                        <th width='100' class='header_laporan bg-primary' align='center'>Jumlah</th>
                    </tr>`;
                var no=1;
                for (var j=0;j < res.res.detail.length;j++)
                {
                    var nilai="";
                    var line = res.res.detail[j];
                    if(line.kode_pp == linex.kode_pp){

                        var color = "";
                        if (line.tipe!="Header" && line.nama!="." && line.nama!="")
                        {
                            nilai=sepNum(parseFloat(line.n4));
                        }
    
                        if(j == (res.res.detail.length - 1)){
                            color = "bg-primary0";
                        }
                    
                        if (line.tipe=="Posting" && line.n4 != 0)
                        {
                            html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' ><td height='20' class='isi_laporan `+color+` link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                            <td class='isi_laporan `+color+`'><div align='right'>`+nilai+`</div></td>
                            </tr>`;
                        }
                        else
                        {
                            html+=`<tr><td height='20' class='isi_laporan `+color+`'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                            <td class='isi_laporan `+color+`'><div align='right'>`+nilai+`</div></td>
                            </tr>`;
                        }
                        no++;
                    }
                }
            html+=`
            </table>
            </div>
            <br>`;
            if(i != (data.length - 1)){
                    html+=`<div class='separator2 mb-4'></div>`;
                }
            }
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   