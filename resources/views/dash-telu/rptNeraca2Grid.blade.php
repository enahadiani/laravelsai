
<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad("{{ url('telu-report/lap-neraca2') }}", null, formData, null, function(res){
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

   function getChild(index,id,formData,url,parent = null){
        var kode = id.replace('grid-id-','');
        formData.delete('id');
        formData.append('id',kode);
        saiPostGrid(url, null, formData, null, function(res){
            if(res.result.length > 0){
                var no=1; var x=0;
                var data = res.result;
                var html = '';
                for (var i=0; i < data.length; i++)
                {
                    var line = data[i];
                    var nilai="";var nilai2="";
                    if (line.tipe!="Header" && line.nama!="." && line.nama!="")
                    {
                        nilai=sepNum(line.n1);
                        nilai2=sepNum(line.n2);
                    }
                    if(line.tipe == 'Posting'){
                        var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                        var cursor = 'cursor:pointer;font-weight:bold';
                    }else{
                        var icon = '';
                        var cursor = '';
                    }

                    html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-parent='`+id+`' data-tipe='`+line.tipe+`' data-parentop=`+parent+`>
                    <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+` `+icon+` `+line.nama+`</td>
                        <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                        <td class='isi_laporan'><div align='right'>`+nilai2+`</div></td>
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
            var mm = periode.substr(4,2);
            var tahun = periode.substr(0,4);
            var tahunrev = parseInt(tahun)-1;
            
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var totime = dd+' '+namaPeriode(tahun+''+mm);
            var totimerev = dd+' '+namaPeriode(tahunrev+''+mm);
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
            </style>
            <div class='table-responsive'>
            <table class='table table-bordered report-table'>
                <tr>
					<th width='60%' class='header_laporan text-center' >Keterangan</th>
					<th width='20%' class='header_laporan text-center' >Posisi Neraca <br>Per `+totime+`</th>
					<th width='20%' class='header_laporan text-center' >Posisi Neraca <br>Per `+totimerev+`</th>
				</tr>
            `;
            for (var i=0; i < data.length; i++)
            {
                var line = data[i];
                var nilai="";var nilai2="";
                if (line.tipe!="Header" && line.nama!="." && line.nama!="")
                {
                    nilai=sepNum(line.n1);
                    nilai2=sepNum(line.n2);
                }
                if(line.tipe == 'Posting'){
                    var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                    var cursor = 'cursor:pointer;font-weight:bold';
                }else{
                    var icon = '';
                    var cursor = '';
                }
                html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-tipe='`+line.tipe+`'>
                <td height='20' class='isi_laporan'>`+fnSpasi(line.level_spasi)+` `+icon+` `+line.nama+`</td>
                    <td class='isi_laporan'><div align='right'>`+nilai+`</div></td>
                    <td class='isi_laporan'><div align='right'>`+nilai2+`</div></td>
                </tr>`;
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
                var index = $(this).closest('tr').index();
                if(!$(this).hasClass('clicked')){
                    $(this).addClass('clicked');
                    var top = $(this).position().top;
                    $('#grid-load').css('top',top);
                    getChild(index,id,$formData,'telu-report/lap-neraca2-detail',parent);
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
   