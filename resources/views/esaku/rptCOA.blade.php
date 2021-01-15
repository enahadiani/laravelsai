<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-coa', null, formData, null, function(res){
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
            var html = `<div>
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
            </style>
            `;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN COA",lokasi,'')+`
                <table width='100%' class='table table-bordered'>
                    <tr>
                        <th width='60' class='header_laporan text-center'>Kode</th>
                        <th width='200' class='header_laporan text-center'>Nama</th>
                        <th width='40' class='header_laporan text-center'>FS</th>
                        <th width='40' class='header_laporan text-center'>Modul</th>
                        <th width='60' class='header_laporan text-center'>Tipe</th>
                        <th width='60' class='header_laporan text-center'>Level</th>
                        <th width='60' class='header_laporan text-center'>Kode Induk</th>
                        <th width='80' class='header_laporan text-center'>Kode Akun</th>
                        <th width='250' class='header_laporan text-center'>Nama Akun</th>	
                    </tr>`;
                        var det = '';
                        for (var x=0;x<data.length;x++)
                        {
                            var line = data[x];
                            det+=`<tr>
                            <td class='isi_laporan'>`+line.kode_neraca+`</td>
                            <td class='isi_laporan'>`+line.nama+`</td>
                            <td class='isi_laporan'>`+line.kode_fs+`</td>
                            <td class='isi_laporan'>`+line.modul+`</td>
                            <td class='isi_laporan'>`+line.tipe+`</td>
                            <td class='isi_laporan'>`+line.level_spasi+`</td>
                            <td class='isi_laporan'>`+line.kode_induk+`</td>
                            <td class='isi_laporan'>`+line.kode_akun+`</td>
                            <td class='isi_laporan'>`+line.nama_akun+`</td>
                            </tr>`;	
                        }
                        var det = '';
                        for (var x=0;x<res.res.data2.length;x++)
                        {
                            var line2 = res.res.data2[x];
                            det+=`<tr>
                            <td class='isi_laporan'>`+line2.kode_neraca+`</td>
                            <td class='isi_laporan'>`+line2.nama+`</td>
                            <td class='isi_laporan'>`+line2.kode_fs+`</td>
                            <td class='isi_laporan'>`+line2.modul+`</td>
                            <td class='isi_laporan'>`+line2.tipe+`</td>
                            <td class='isi_laporan'>`+line2.level_spasi+`</td>
                            <td class='isi_laporan'>`+line2.kode_induk+`</td>
                            <td class='isi_laporan'>`+line2.kode_akun+`</td>
                            <td class='isi_laporan'>`+line2.nama_akun+`</td>
                            </tr>`;	
                        }
                        var det = '';
                        for (var x=0;x<res.res.data3.length;x++)
                        {
                            var line3 = res.res.data3[x];
                            det+=`<tr>
                            <td class='isi_laporan'>`+line3.kode_neraca+`</td>
                            <td class='isi_laporan'>`+line3.nama+`</td>
                            <td class='isi_laporan'>`+line3.kode_fs+`</td>
                            <td class='isi_laporan'>`+line3.modul+`</td>
                            <td class='isi_laporan'>`+line3.tipe+`</td>
                            <td class='isi_laporan'>`+line3.level_spasi+`</td>
                            <td class='isi_laporan'>`+line3.kode_induk+`</td>
                            <td class='isi_laporan'>`+line3.kode_akun+`</td>
                            <td class='isi_laporan'>`+line3.nama_akun+`</td>
                            </tr>`;	
                        }
                        html+=det+`
                    </table>
                <DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   