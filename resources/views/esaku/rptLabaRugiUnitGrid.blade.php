
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
                var data = res.res.detail;
                var html = "";
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
                        var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                        var cursor = 'cursor:pointer;font-weight:bold';

                        html+=`<tr class='report-link neraca-lajur' id='grid-id-`+line.kode_akun+`' style='`+cursor+`' data-parent='`+id+`' data-tipe='`+line.tipe+`' data-kode_neraca='`+line.kode_neraca+`' ><td height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
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
            
            var periode = $periode;
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
                
                .uppercase{
                    text-transform:uppercase;
                }
            </style>`;
            for (var i=0;i < data.length;i++)
            {
                var linex = data[i];
            html+=judul_lap("LAPORAN LABA RUGI UNIT <span class='uppercase'>"+linex.nama+"</span>",lokasi,'Periode '+periode.fromname)+`
            <div class='table-responsive'>
            <table class='table table-bordered report-table'>
                <tr>
                    <th height='25'  class='header_laporan' align='center'>Keterangan</th>
                    <th class='header_laporan' align='center'>Jumlah</th>
                </tr>
            `;
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
                        var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                        var cursor = 'cursor:pointer;font-weight:bold';

                        html+=`<tr class='report-link neraca-lajur' id='grid-id-`+line.kode_neraca+`' style='`+cursor+`'  data-tipe='`+line.tipe+`' data-kode_neraca='`+line.kode_neraca+`' ><td height='20' class='isi_laporan link-report' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
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
            html+=`</table>
            </div>`;
            }
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
                    getChild(index,id,$formData,'esaku-report/lap-labarugi-unit');
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
   