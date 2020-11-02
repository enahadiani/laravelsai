<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('yakes-report/lap-nrclajur-jejer', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
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
            periode = $periode;
            html+=judul_lap("LAPORAN NERACA LAJUR",lokasi,'Periode '+$periode.fromname)+`
            <div class='table-responsive'>
                <table class='table table-bordered info-table'>
                    <tr>
                        <td width='30' class='header_laporan' align='center'>No</td>
                        <td width='70' class='header_laporan' align='center'>Kode Akun</td>
                        <td width='300' class='header_laporan' align='center'>Nama Akun</td>
                        <td width='100' class='header_laporan'><div align='center'>KS00</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KS01</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KS02</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KS03</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KS04</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KS05</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KS06</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KS07</div></td>
                        <td width='100' class='header_laporan'><div align='center'>KONSOLIDASI</div></td>
                    </tr>`;
                    var n1=0;
                    var n2=0;
                    var n3=0;
                    var n4=0;
                    var n5=0;
                    var n6=0;
                    var n7=0;
                    var n8=0;
                    var n9=0;
                    if(from != undefined){
                        var no=from+1;
                    }else{
                        var no=1;
                    }
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        n1 +=parseFloat(line.n1);
                        n2 +=parseFloat(line.n2);
                        n3 +=parseFloat(line.n3);
                        n4 +=parseFloat(line.n4);
                        n5 +=parseFloat(line.n5);
                        n6 +=parseFloat(line.n6);
                        n7 +=parseFloat(line.n7);
                        n8 +=parseFloat(line.n8);
                        n9 +=parseFloat(line.n9);
                        
                        html +=`<tr class='report-link bukubesar' style='cursor:pointer;' data-kode_akun='`+line.kode_akun+`'>
                            <td class='isi_laporan' align='center'>`+no+`</td>
                            <td class='isi_laporan' >`+line.kode_akun+`</td>
                            <td height='20' class='isi_laporan link-report'>`+line.nama+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n1))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n2))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n3))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n4))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n5))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n6))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n7))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n8))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.n9))+`</td>
                        </tr>`;
                        no++;
                    }
            html+=`<tr>
                <td height='20' colspan='3' class='sum_laporan' align='right'>Total</td>
                <td class='isi_laporan' align='right'>`+sepNum(n1)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n2)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n3)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n4)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n5)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n6)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n7)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n8)+`</td>
                <td class='isi_laporan' align='right'>`+sepNum(n9)+`</td>
                </tr>
            </table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   