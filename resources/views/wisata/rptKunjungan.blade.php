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
            html+= `<table class='table table-bordered info-table' style='overflow-y: auto;'>
                    <tr>
                        <th style='text-align:center;'>Kode Mitra</th>
                        <th style='text-align:center;'>Nama Mitra</th>
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
                        var n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12;
                        if(line.n1 > 0) {
                            n1 = sepNum(parseFloat(line.n1)).toString();
                            n1 = n1.slice(0, -3);
                        } else {
                            n1 = sepNum(parseFloat(line.n1)).toString();
                        }
                        if(line.n2 > 0) {
                            n2 = sepNum(parseFloat(line.n2)).toString();
                            n2 = n2.slice(0, -3);
                        } else {
                            n2 = sepNum(parseFloat(line.n2)).toString();
                        }
                        if(line.n3 > 0) {
                            n3 = sepNum(parseFloat(line.n3)).toString();
                            n3 = n3.slice(0, -3);
                        } else {
                            n3 = sepNum(parseFloat(line.n3)).toString();
                        }
                        if(line.n4 > 0) {
                            n4 = sepNum(parseFloat(line.n4)).toString();
                            n4 = n4.slice(0, -3);
                        } else {
                            n4 = sepNum(parseFloat(line.n4)).toString();
                        }
                        if(line.n5 > 0) {
                            n5 = sepNum(parseFloat(line.n5)).toString();
                            n5 = n5.slice(0, -3);
                        } else {
                            n5 = sepNum(parseFloat(line.n5)).toString();
                        }
                        if(line.n6 > 0) {
                            n6 = sepNum(parseFloat(line.n6)).toString();
                            n6 = n6.slice(0, -3);
                        } else {
                            n6 = sepNum(parseFloat(line.n6)).toString();
                        }
                        if(line.n7 > 0) {
                            n7 = sepNum(parseFloat(line.n7)).toString();
                            n7 = n7.slice(0, -3);
                        } else {
                            n7 = sepNum(parseFloat(line.n7)).toString();
                        }
                        if(line.n8 > 0) {
                            n8 = sepNum(parseFloat(line.n8)).toString();
                            n8 = n8.slice(0, -3);
                        } else {
                            n8 = sepNum(parseFloat(line.n8)).toString();
                        }
                        if(line.n9 > 0) {
                            n9 = sepNum(parseFloat(line.n9)).toString();
                            n9 = n9.slice(0, -3);
                        } else {
                            n9 = sepNum(parseFloat(line.n9)).toString();
                        } 
                        if(line.n10 > 0) {
                            n10 = sepNum(parseFloat(line.n10)).toString();
                            n10 = n10.slice(0, -3);
                        } else {
                            n10 = sepNum(parseFloat(line.n10)).toString();
                        }
                        if(line.n11 > 0) {
                            n11 = sepNum(parseFloat(line.n11)).toString();
                            n11 = n11.slice(0, -3);
                        } else {
                            n11 = sepNum(parseFloat(line.n11)).toString();
                        }
                        if(line.n12 > 0) {
                            n12 = sepNum(parseFloat(line.n12)).toString();
                            n12 = n12.slice(0, -3);
                        } else {
                            n12 = sepNum(parseFloat(line.n12)).toString();
                        }                   
                        html +=`<tr>
                            <td class='isi_laporan' style='padding-left: 2px;'>`+line.kode_mitra+`</td>
                            <td class='isi_laporan' style='padding-left: 2px;'>`+line.nama+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n1+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n2+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n3+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n4+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n5+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n6+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n7+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n8+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n9+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n10+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n11+`</td>
                            <td class='isi_laporan' style='text-align: right;'>`+n12+`</td>
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
