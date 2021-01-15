<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-labarugi-bulan', null, formData, null, function(res){
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
            html+=judul_lap("LAPORAN LABA RUGI",lokasi,'Tahun '+periode.from)+`
            <div class='table-responsive'>
                <table class='table table-bordered info-table'>
                    <tr>
                        <th width='300' class='header_laporan' align='center'>Keterangan</th>
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
                        <th width='90' class='header_laporan' align='center'>Total</th>
                    </tr>`;
                    
                    var n01=0;var n02=0;var n03=0;var n04=0;var n05=0;var n06=0;var n07=0;var n08=0;var n09=0;var n10=0;var n11=0;var n12=0;var n13=0;var n14=0;var n15=0;var n16=0;var n17=0;
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
                        var v1="";var v2="";var v3="";var v4="";var v5="";var v6="";var v7="";var v8="";var v9="";var v10="";var v11="";var v12="";var v13="";var v14="";var v15="";var v16="";var v17="";
                        if (line.tipe!="Header") v1=sepNum(parseFloat(line.n01))
                        if (line.tipe!="Header") v2=sepNum(parseFloat(line.n02))
                        if (line.tipe!="Header") v3=sepNum(parseFloat(line.n03))
                        if (line.tipe!="Header") v4=sepNum(parseFloat(line.n04))
                        if (line.tipe!="Header") v5=sepNum(parseFloat(line.n05))
                        if (line.tipe!="Header") v6=sepNum(parseFloat(line.n06))
                        if (line.tipe!="Header") v7=sepNum(parseFloat(line.n07))
                        if (line.tipe!="Header") v8=sepNum(parseFloat(line.n08))
                        if (line.tipe!="Header") v9=sepNum(parseFloat(line.n09))
                        if (line.tipe!="Header") v10=sepNum(parseFloat(line.n10))
                        if (line.tipe!="Header") v11=sepNum(parseFloat(line.n11))
                        if (line.tipe!="Header") v12=sepNum(parseFloat(line.n12))
                        if (line.tipe!="Header") v13=sepNum(parseFloat(line.n13))
                        if (line.tipe!="Header") v14=sepNum(parseFloat(line.n14))
                        if (line.tipe!="Header") v15=sepNum(parseFloat(line.n15))
                        if (line.tipe!="Header") v16=sepNum(parseFloat(line.n16))
                        if (line.tipe!="Header") v17=sepNum(parseFloat(line.n17))
                        html +=`<tr>
                            <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+' '+line.nama+`</td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode01+`' >`+v1+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode02+`' >`+v2+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode03+`' >`+v3+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode04+`' >`+v4+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode05+`' >`+v5+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode06+`' >`+v6+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode07+`' >`+v7+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode08+`' >`+v8+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode09+`' >`+v9+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode10+`' >`+v10+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode11+`' >`+v11+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode12+`' >`+v12+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode13+`' >`+v13+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode14+`'>`+v14+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode15+`'>`+v15+`</a></td>
                            <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_neraca=`+line.kode_neraca+` data-periode='`+periode16+`'>`+v16+`</a></td>
                            <td  class='isi_laporan text-right' >`+v17+`</td>
                        </tr>`;
                        no++;
                    }
            html+=`
            </table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   