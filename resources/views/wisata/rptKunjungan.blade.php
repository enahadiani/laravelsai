<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('wisata-report/lap-kunjungan', null, formData, null, function(res){
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
            console.log(res);
            console.log(data);
            var lokasi = res.lokasi;
            html+=`<h4 class='text-center'>LAPORAN DATA KUNJUNGAN</h4>
                   <h5 class='text-center'>${res.res.tahun}</h5>
            `; if(typeof res.res.bidang != 'undefined') {
                html += `<h5 class='text-center'>${res.res.bidang}</h5>`;
               }
               if(typeof res.res.jenis != 'undefined') {
                html += `<h5 class='text-center'>${res.res.jenis}</h5>`;
               }
               if(typeof res.res.subjenis != 'undefined') {
                html += `<h5 class='text-center'>${res.res.subjenis}</h5>`;
               }
            html+= `<table class='table table-bordered info-table' style='width:1400px;'>
                    <tr>
                        <th style='text-align:center; width:15%;'>Kode Mitra</th>
                        <th style='text-align:center; width:45%;'>Nama Mitra</th>
                        <th style='text-align:center; width:60%;'>Alamat</th>
                        <th style='text-align:center;'>Kecamatan</th>
                        <th style='text-align:center;'>Januari</th>
                        <th style='text-align:center;'>Februari</th>
                        <th style='text-align:center;'>Maret</th>
                        <th style='text-align:center;'>April</th>
                        <th style='text-align:center;'>Mei</th>
                        <th style='text-align:center;'>Juni</th>
                        <th style='text-align:center;'>Juli</th>
                        <th style='text-align:center;'>Agustus</th>
                        <th style='text-align:center;'>September</th>
                        <th style='text-align:center;'>Oktober</th>
                        <th style='text-align:center;'>November</th>
                        <th style='text-align:center;'>Desember</th>
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
                            <td class='isi_laporan' style='padding-left: 2px;'>`+line.camat+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n1))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n2))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n3))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n4))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n5))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n6))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n7))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n8))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n9))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n10))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n11))+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+sepNum(parseFloat(line.n12))+`</td>
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
