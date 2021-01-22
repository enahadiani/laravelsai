
<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('telu-report/lap-labarugi-agg-dir', null, formData, null, function(res){
           if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
           }else{
                $('#saku-report #canvasPreview').load("{{ url('dash-telu/form/blank') }}");
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

   function getChild(index,id,formData,url,parent = null,kode_rektor){
        var kode = id.replace('grid-id-','');
        formData.delete('id');
        formData.append('id',kode);
        formData.delete('kode');
        formData.append('kode',kode_rektor);
        saiPostGrid(url, null, formData, null, function(res){
            if(res.result.length > 0){
                var no=1; var x=0;
                var data = res.result;
                var html = '';
                for (var i=0; i < data.length; i++)
                {
                    var line = data[i];
                    var persen1=0;var persen2=0;var persen3=0;
                    if (line.n1!=0)
                    {
                        persen1=(line.n4/line.n1)*100;
                    }
                    if (line.n2!=0)
                    {
                        persen2=(line.n4/line.n2)*100;
                    }
                    if (line.n5!=0)
                    {
                        persen3=(line.n4-line.n5)/line.n5*100;
                    }
                    if(line.tipe == 'Posting'){
                        var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                        var cursor = 'cursor:pointer;font-weight:bold';
                    }else{
                        var icon = '';
                        var cursor = '';
                    }

                    html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-parent='`+id+`' data-tipe='`+line.tipe+`' data-parentop=`+parent+` data-kode_rektor='`+line.kode_rektor+`'>
                    <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+` `+icon+` `+line.nama+`</td>`;
                    if (line.kode_akun!="OR" && line.kode_fs=="FS4")
                    {
                        html+=`<td class='isi_laporan' align='right'>`+sepNum(line.n1)+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.n2)+`</td>
                        <td class='isi_laporan' align='right'>`+sepNum(line.n4)+`</td>`;
                    }
                    else
                    {
                        html+=`<td class='isi_laporan' align='center'>`+sepNum(line.n1)+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum(line.n2)+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum(line.n4)+`%</td>`;
                    }
                    html+=`<td class='isi_laporan' align='center'>`+sepNum(persen1)+`%</td>
                    <td class='isi_laporan' align='center'>`+sepNum(persen2)+`%</td>
                    <td class='isi_laporan' align='center'>`+sepNum(persen3)+`%</td>
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
            res.bentuk = '';
            var lokasi = res.lokasi;
            res.data_detail = [];
            var periode = $periode.from;
            var tahun = periode.substr(0,4);
            var tahunrev = parseInt(tahun)-1;
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
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
                .header_laporan{
                    vertical-align: middle !important;
                }
            </style>`;
            for(var j=0; j < data.length; j++){

                var linex = data[j];
                html+=judul_lap("LAPORAN LABA RUGI ANGGARAN DIREKTORAT <br><span class='sbjudul'>"+linex.nama+"</span>",lokasi,'Periode '+$periode.fromname)+`
                <div class='table-responsive'>
                <table class='table table-bordered report-table'>
                    <tr>
                        <th width='28%' height='25'  class='header_laporan text-center' align='center'>Keterangan</th>
                        <th width='12%' class='header_laporan text-center' align='center'>RKA `+tahun+`</th>
                        <th width='12%' class='header_laporan text-center' align='center'>RKA s.d Bulan Berjalan `+tahun+`</th>
                        <th width='12%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan `+tahun+`</th>
                        <th width='12%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA `+tahun+`</th>
                        <th width='12%' class='header_laporan text-center' align='center'>Realisasi s.d Bulan Berjalan thd RKA s.d Bulan Berjalan `+tahun+`</th>
                        <th width='12%' class='header_laporan text-center' align='center'>Growth Thd `+tahunrev+`</th>
                    </tr>
                    <tr>
                        <td height='25'  class='header_laporan' align='center'>&nbsp;</td>
                        <td class='header_laporan' align='center'>1</td>
                        <td class='header_laporan' align='center'>3</td>
                        <td class='header_laporan' align='center'>4</td>
                        <td class='header_laporan' align='center'>6=4/1</td>
                        <td class='header_laporan' align='center'>7=4/3</td>
                        <td class='header_laporan' align='center'>8=(3-4)/4</td>
                    </tr>
                `;
                for (var i=0; i < res.res.detail.length; i++)
                {
                    var line = res.res.detail[i];
                    if(linex.kode_rektor == line.kode_rektor){
                        
                        var persen1=0;var persen2=0;var persen3=0;
                        if (line.n1!=0)
                        {
                            persen1=(line.n4/line.n1)*100;
                        }
                        if (line.n2!=0)
                        {
                            persen2=(line.n4/line.n2)*100;
                        }
                        if (line.n5!=0)
                        {
                            persen3=(line.n4-line.n5)/line.n5*100;
                        }
                        if(line.tipe == 'Posting'){
                            var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                            var cursor = 'cursor:pointer;font-weight:bold';
                        }else{
                            var icon = '';
                            var cursor = '';
                        }
                        html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-tipe='`+line.tipe+`' data-kode_rektor='`+line.kode_rektor+`'>
                        <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+` `+icon+` `+line.nama+`</td>`;
                        if (line.kode_neraca!="OR" && line.kode_fs=="FS4")
                        {
                            html+=`<td class='isi_laporan' align='right'>`+sepNum(line.n1)+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(line.n2)+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(line.n4)+`</td>`;
                        }
                        else
                        {
                            html+=`<td class='isi_laporan' align='center'>`+sepNum(line.n1)+`%</td>
                            <td class='isi_laporan' align='center'>`+sepNum(line.n2)+`%</td>
                            <td class='isi_laporan' align='center'>`+sepNum(line.n4)+`%</td>`;
                        }
                        html+=`<td class='isi_laporan' align='center'>`+sepNum(persen1)+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum(persen2)+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum(persen3)+`%</td>
                        </tr>`;
                    }
                }
            html+=`</table>
            </div>`;
            }
            $('#canvasPreview').html(html);
            $('.report-table').on('click','tr',function(){
                var tipe = $(this).data('tipe');
                if(tipe == 'Posting'){
                    var id = $(this).attr('id');
                    var parent = $(this).data('parent');
                    var kode_rektor = $(this).data('kode_rektor');
                    var index = $(this).closest('tr').index();
                    if(!$(this).hasClass('clicked')){
                        $(this).addClass('clicked');
                        var top = $(this).position().top;
                        $('#grid-load').css('top',top);
                        getChild(index,id,$formData,'telu-report/lap-labarugi-agg-dir-detail',parent,kode_rektor);
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
    }
</script>
   