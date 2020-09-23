<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('wisata-report/lap-mitra', null, formData, null, function(res){
           if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('wisata-auth/form/blank') }}");
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
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
            </style>

            `;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN DATA DESTINASI",'','')+`
                <table class='table table-bordered info-table'>
                    <tr>
                        <th style='text-align:center;'>Kode Destinasi</th>
                        <th style='text-align:center;'>Nama Destinasi</th>
                        <th style='text-align:center;'>Alamat</th>
                        <th style='text-align:center;'>No Telp</th>
                        <th style='text-align:center;'>PIC</th>
                    </tr>`;
                    if(from != undefined){
                        var no=from+1;
                    }else{
                        var no=1;
                    }
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        html +=`<tr>
                            <td class='isi_laporan' style='text-align:center;'>`+line.kode_mitra+`</td>
                            <td class='isi_laporan' style='padding-left: 2px;'>`+line.nama+`</td>
                            <td class='isi_laporan' style='padding-left: 2px;'>`+line.alamat+`</td>
                            <td class='isi_laporan' style='padding-left: 2px;'>`+line.no_tel+`</td>
                            <td class='isi_laporan' style='padding-left: 2px;'>`+line.pic+`</td>
                        </tr>`;
                        no++;
                    }
            html+=`</table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
