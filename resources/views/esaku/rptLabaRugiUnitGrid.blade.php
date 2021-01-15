
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

   function sepNum2(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(1);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

    function sepNumPas(x){
        if (typeof x === 'undefined' || !x) { 
            return 0;
        }else{
            var x = parseFloat(x).toFixed(0);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }

   function getChild(index,id,formData,url,parent = null){
        var kode = id.replace('grid-id-','');
        formData.delete('id');
        formData.append('id',kode);
        saiPostGrid(url, null, formData, null, function(res){
            if(res.result.length > 0){
                var data = res.result;
                var html = "";
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
                var no=1;
                for (var i=0;i < data.length;i++)
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
                    if(line.tipe == 'Posting'){
                        var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                        var cursor = 'cursor:pointer;font-weight:bold';
                    }else{
                        var icon = '';
                        var cursor = '';
                    }
                    html+=`<tr id='grid-id-`+line.kode_akun+`' style='`+cursor+`' data-parent='`+id+`' data-tipe='`+line.tipe+`'>
                    <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+' '+icon+' '+line.nama+`</td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode01+`' >`+v1+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode02+`' >`+v2+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode03+`' >`+v3+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode04+`' >`+v4+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode05+`' >`+v5+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode06+`' >`+v6+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode07+`' >`+v7+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode08+`' >`+v8+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode09+`' >`+v9+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode10+`' >`+v10+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode11+`' >`+v11+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode12+`' >`+v12+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode13+`' >`+v13+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode14+`'>`+v14+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode15+`'>`+v15+`</a></td>
                    <td  class='isi_laporan text-right' ><a class='report-link neraca-lajur' style='cursor:pointer;color:blue' data-kode_akun=`+line.kode_akun+` data-periode='`+periode16+`'>`+v16+`</a></td>
                    <td  class='isi_laporan text-right' >`+v17+`</td>
                    </tr>`;
                    
                    no++;
                }
                
                $('.report-table').find('tr:eq('+index+')').after(html);
            }
        });
   }

   function drawRptPage(data,res,from,to){
        var data = data;
        if(data.length > 0){

            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
            }
            
            var periode = $periode.from;
            var lokasi = res.lokasi;
            var html = `
            <div id='grid-load'><img src='{{ asset("img/loadgif.gif") }}' style='width:25px;height:25px'></div>
            <div>
            <style>
                #grid-load
                {
                    position: absolute;
                    text-align: center;
                    width: 100%;
                    top: 200px;
                    display:none;
                }
                .report-table{
                    width: 1500px !important;
                }
                .report-table th,.report-table2 th{
                    text-align: center;
                }

                .report-table td, .report-table th, .report-table2 td, .report-table2 th{ 
                    vertical-align: middle;
                    padding-top: 4px !important;
                    padding-bottom: 4px !important;
                }  
                .bold{
                    font-weight:bold !important;
                }
            </style>`+judul_lap("LAPORAN LABA RUGI",lokasi,'Tahun '+periode.from)+`
            <div class='table-responsive'>
            <table class='table table-bordered report-table'>
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
                </tr>
            `;
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
            for (var i=0;i < data.length;i++)
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
                if(line.tipe == 'Posting'){
                    var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                    var cursor = 'cursor:pointer;font-weight:bold';
                }else{
                    var icon = '';
                    var cursor = '';
                }
                html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-state='`+line.state+`' data-tipe='`+line.tipe+`'>
                <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+' '+icon+' '+line.nama+`</td>
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
            html+=`</table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('.report-table').on('click','tr',function(){
            var tipe = $(this).data('tipe');
            if(tipe == 'Posting'){
                var id = $(this).attr('id');
                var index = $(this).closest('tr').index();
                if(!$(this).hasClass('clicked')){
                    $(this).addClass('clicked');
                    var top = $(this).position().top;
                    $('#grid-load').css('top',top);
                    getChild(index,id,$formData,'esaku-report/lap-labarugi-bulan');
                }
                if(!$(this).hasClass('open-grid')){
                    $(this).addClass('open-grid');
                    $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-right');
                    $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-down');
                    $(this).removeClass('close-grid');
                    $('tr[data-parent="' + id + '"]').show();

                }else{
                    $(this).addClass('close-grid');
                    $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-down');
                    $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-right');
                    $(this).removeClass('open-grid');
                    $('tr[data-parent="' + id + '"]').hide();
                }
            }
        });
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
       
    }
</script>
   