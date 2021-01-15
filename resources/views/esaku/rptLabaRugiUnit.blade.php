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
            </style>

            `;
            periode = $periode;
            var lokasi = res.lokasi;
            for (var i=0;i < data.length;i++)
            {
                
                var linex = data[i];
            html+= judul_lap("LAPORAN LABA RUGI UNIT <span class='uppercase'>"+linex.nama+"</span>",lokasi,'Periode '+periode.fromname)+`
            <div class='table-responsive'>
                <table class='table table-bordered info-table'>
                    <tr>
                        <th width='400' height='25'  class='header_laporan' align='center'>Keterangan</th>
                        <th width='100' class='header_laporan' align='center'>Jumlah</th>
                    </tr>`;
                var no=1;
                for (var j=0;j < res.res.detail.length;j++)
                {
                    var nilai="";
                    var line = res.res.detail[j];
                    if (line.tipe!="Header" && line.nama!="." && line.nama!="")
                    {
                        nilai=sepNum(parseFloat(line.n4));
                    }
                
                    if (line.tipe=="Posting" && line.n4 != 0)
                    {
                        html+=`<tr class='report-link neraca-lajur' style='cursor:pointer;' data-kode_neraca='`+line.kode_neraca+`' ><td height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                        <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                        </tr>`;
                    }
                    else
                    {
                        html+=`<tr><td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+line.nama+`</td>
                        <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                        </tr>`;
                    }
                    no++;
                }
            html+=`
            </table>`;
            }
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   