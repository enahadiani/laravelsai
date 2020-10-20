<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('wisata-report/lap-mitra', null, formData, null, function(res){
           console.log(res)
           if(res.result){
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
        var grouping = data.reduce((initial, value) => {
            initial[value.nama_bidang] = [...initial[value.nama_bidang] || [], value]
            return initial
        },{})
        var convert = Object.entries(grouping);
        if(convert.length > 0){
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
            html+=`<h4 class='text-center'>LAPORAN DATA MITRA</h4>`;
                if(typeof res.res.bidang != 'undefined') {
                html += `<h5 class='text-center'>${res.res.bidang}</h5>`;
               }
               if(typeof res.res.jenis != 'undefined') {
                html += `<h5 class='text-center'>${res.res.jenis}</h5>`;
               }
               if(typeof res.res.subjenis != 'undefined') {
                html += `<h5 class='text-center'>${res.res.subjenis}</h5>`;
               }
            console.log(convert);
            html+= `<table class='table table-bordered info-table'>`;
            for(var i=0;i<convert.length;i++) {
                html+= `<tr>`;
                html+= `<th colspan="6">${convert[i][0]}</th>`;
                html+= `</tr>`;
                html+= `<tr>`;
                html+= `<td style='text-align:center;'>Kode Mitra</td>`;
                html+= `<td style='text-align:center;'>Nama</td>`;
                html+= `<td style='text-align:center;'>Alamat</td>`;
                html+= `<td style='text-align:center;'>No Telp</td>`;
                html+= `<td style='text-align:center;'>PIC</td>`;
                html+= `<td style='text-align:center;'>Kecamatan</td>`;
                html+= `</tr>`;
                for(var j=0;j<convert[i][1].length;j++) {
                    html+= `<tr>`;
                    html+= `<td style='text-align:center;'>${convert[i][1][j].kode_mitra}</td>`;
                    html+= `<td style='text-align:center;'>${convert[i][1][j].nama}</td>`;
                    html+= `<td style='text-align:center;'>${convert[i][1][j].alamat}</td>`;
                    html+= `<td style='text-align:center;'>${convert[i][1][j].no_tel}</td>`;
                    html+= `<td style='text-align:center;'>${convert[i][1][j].pic}</td>`;
                    html+= `<td style='text-align:center;'>${convert[i][1][j].camat}</td>`;
                    html+= `</tr>`;
                }
            }
            html+=`</table>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
