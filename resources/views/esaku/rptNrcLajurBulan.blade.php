<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-nrclajur-bulan', null, formData, null, function(res){
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
            </style>

            `;
            periode = $periode;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN NERACA LAJUR",lokasi,'Tahun '+periode.from)+`
            <div class='table-responsive'>
                <table class='table table-bordered info-table'>
                    <tr>
                        <th width='30'  class='header_laporan' align='center'>No</th>
                        <th width='70' class='header_laporan' align='center'>Kode Akun</th>
                        <th width='300' class='header_laporan' align='center'>Nama Akun</th>
                        <th width='90' class='header_laporan' align='center'>Saldo Awal</th>
                        <th width='90' class='header_laporan' align='center'>Januari</th>
                        <th width='90' class='header_laporan' align='center'>Februari</th>
                        <th width='90' class='header_laporan' align='center'>Maret</th>
                        <th width='90' class='header_laporan' align='center'>April</th>
                        <th width='90' class='header_laporan' align='center'>Mei</th>
                        <th width='90' class='header_laporan' align='center'>Juni</th>
                        <th width='90' class='header_laporan' align='center'>Juli</th>
                        <th width='90' class='header_laporan' align='center'>Agustus</th>
                        <th width='90' class='header_laporan' align='center'>September</th>
                        <th width='90' class='header_laporan' align='center'>Oktober</th>
                        <th width='90' class='header_laporan' align='center'>November</th>
                        <th width='90' class='header_laporan' align='center'>Desember 1</th>
                        <th width='90' class='header_laporan' align='center'>Desember 2</th>
                        <th width='90' class='header_laporan' align='center'>Desember 3</th>
                        <th width='90' class='header_laporan' align='center'>Desember 4</th>
                        <th width='90' class='header_laporan' align='center'>Desember 5</th>
                        <th width='90' class='header_laporan' align='center'>Saldo Akhir</th>
                    </tr>`;
                    
                    var n01=0;var n02=0;var n03=0;var n04=0;var n05=0;var n06=0;var n07=0;var n08=0;var n09=0;var n10=0;var n11=0;var n12=0;var n13=0;var n14=0;var n15=0;var n16=0;
                    var tahun = $periode.from;
                    var periode01=tahun+"01"; 
                    var periode02=tahun+"02"; 
                    var periode03=tahun+"03"; 
                    var periode04=tahun+"04"; 
                    var periode05=tahun+"05"; 
                    var periode06=tahun+"06";
                    
                    var periode07=tahun+"07"; 
                    var periode08=tahun+"08"; 
                    var periode09=tahun+"09"; 
                    var periode10=tahun+"10"; 
                    var periode11=tahun+"11"; 
                    var periode12=tahun+"12";
                    
                    var periode13=tahun+"13"; 
                    var periode14=tahun+"14"; 
                    var periode15=tahun+"15"; 
                    var periode16=tahun+"16";
                    var so_awal=0;var total=0;
                    if(from != undefined){
                        var no=from+1;
                    }else{
                        var no=1;
                    }
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        so_awal+=parseFloat(line.so_awal);
                        total+=parseFloat(line.total);
                        n01+=parseFloat(line.n01);
                        n02+=parseFloat(line.n02);
                        n03+=parseFloat(line.n03);
                        n04+=parseFloat(line.n04);
                        n05+=parseFloat(line.n05);
                        n06+=parseFloat(line.n06);
                        n07+=parseFloat(line.n07);
                        n08+=parseFloat(line.n08);
                        n09+=parseFloat(line.n09);
                        n10+=parseFloat(line.n10);
                        n11+=parseFloat(line.n11);
                        n12+=parseFloat(line.n12);
                        n13+=parseFloat(line.n13);
                        n14+=parseFloat(line.n14);
                        n15+=parseFloat(line.n15);
                        n16+=parseFloat(line.n16);
                        total+=parseFloat(line.total);
                        
                        html +=`<tr>
                            <td class='isi_laporan' align='center'>`+no+`</td>
                            <td class='isi_laporan'>`+line.kode_akun+`</td>
                            <td height='20' class='isi_laporan'>`+line.nama+`</td>
                            <td class='isi_laporan text-right'>`+sepNum(parseFloat(line.so_awal))+`</td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode01+`' >`+sepNum(parseFloat(line.n01))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode02+`' >`+sepNum(parseFloat(line.n02))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode03+`' >`+sepNum(parseFloat(line.n03))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode04+`' >`+sepNum(parseFloat(line.n04))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode05+`' >`+sepNum(parseFloat(line.n05))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode06+`' >`+sepNum(parseFloat(line.n06))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode07+`' >`+sepNum(parseFloat(line.n07))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode08+`' >`+sepNum(parseFloat(line.n08))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode09+`' >`+sepNum(parseFloat(line.n09))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode10+`' >`+sepNum(parseFloat(line.n10))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode11+`' >`+sepNum(parseFloat(line.n11))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode12+`' >`+sepNum(parseFloat(line.n12))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode13+`' >`+sepNum(parseFloat(line.n13))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode14+`'>`+sepNum(parseFloat(line.n14))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode15+`'>`+sepNum(parseFloat(line.n15))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode16+`'>`+sepNum(parseFloat(line.n16))+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link bukubesar' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode16+`'>`+sepNum(parseFloat(line.total))+`</a></td>
                        </tr>`;
                        no++;
                    }
            html+=`<tr>
                <td height='23' colspan='3' align='right' class='isi_laporan'>Total&nbsp;</td>
                <td class='header_laporan' align='right'>`+sepNum(so_awal)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n01)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n02)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n03)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n04)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n05)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n06)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n07)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n08)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n09)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n10)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n11)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n12)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n13)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n14)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n15)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(n16)+`</td>
                <td class='header_laporan' align='right'>`+sepNum(total)+`</td>
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
   