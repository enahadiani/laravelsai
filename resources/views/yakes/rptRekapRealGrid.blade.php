
<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('yakes-report/lap-rekap-real-grid', null, formData, null, function(res){
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
                for (var i=0;i < data.length;i++)
                {
                    var n1="";
                 var line = data[i];
                 var persen1=0;
                        var persen2=0;
                        var persen3=0;
                        var persen4=0;
                        var persen5=0;
                        var persen6=0;

                        if (parseFloat(line.n1)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n1))*100;
                        }
                        if (parseFloat(line.n2)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n2))*100;
                        }
                        if (parseFloat(line.n5)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n5)-1)*100;
                        }
                        if (parseFloat(line.n1)!=0)
                        {
                          
                            persen4=(parseFloat(line.n8)/parseFloat(line.n1))*100;
                        }
                        if (parseFloat(line.n7)!=0)
                        {
                          
                            persen5=(parseFloat(line.n8)/parseFloat(line.n7))*100;
                        }
                        if (parseFloat(line.n8)!=0)
                        {
                          
                            persen6=(parseFloat(line.n9)/parseFloat(line.n8))*100;
                        }
                    
                    if(line.state == 'closed' || line.tipe == 'Posting'){
                        var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                        var cursor = 'cursor:pointer;font-weight:bold';
                    }else{
                        var icon = '';
                        var cursor = '';
                    }
                    html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-state='`+line.state+`' data-parent='`+id+`' data-tipe='`+line.tipe+`' data-parentop=`+parent+`>
                    <td class='isi_laporan' >`+fnSpasi(line.level_spasi)+``+icon+line.nama+`</td>
                    <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n1))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n2))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n4))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n5))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen1))+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen2))+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen3))+`%</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n7))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n8))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen4))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen5))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n9))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen6))+`</td>
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
            var bln = periode.substr(4,2);
            var blnrev = parseInt(bln)-1;
            var tahun = periode.substr(0,4);
            var tahunrev = parseInt(tahun)-1;
            var periode_pilih = namaPeriode(tahun+''+bln);
            var periode_rev = namaPeriode(tahunrev+''+blnrev);
            var html = `
            <div id='grid-load'><img src='{{ asset("img/loadgif.gif") }}' style='width:25px;height:25px'></div>
            <div>
            <style>
                #grid-load{
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
                    color: white !important;
                    background-color: #288372; !important;
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
            </style>
            <div class='table-responsive'>
            <table class='table table-bordered report-table'>
           
            <tr>
                <th style='width:400px' rowspan='3' class='bg-blue3'>URAIAN</th>
                <th  class='bg-blue3'>RKA</th>
                <th  class='bg-blue3'>RKA</th>
                <th  colspan='2' class='bg-blue3'>REAL YTD</th>
                <th  colspan='3' class='bg-blue3'>PRESENTASE</th>
                <th class='bg-blue3'>REAL</th>
                <th  colspan='3' class='bg-blue3'>OUTLOOK</th>
                <th  colspan='2' class='bg-blue3'>USULAN</th>
            </tr>
            <tr>
                <th style='width:90px' class='bg-blue3'>`+tahun+`</th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+` </th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+` `+tahun+`</th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+` `+tahunrev+`</th>
                <th style='width:90px' class='bg-blue3'>RKA</th>
                <th style='width:90px' class='bg-blue3'>`+periode_pilih+`</th>
                <th style='width:90px' class='bg-blue3'>YoY</th>
                <th style='width:90px' class='bg-blue3'>`+tahunrev+`</th>
                <th style='width:90px' class='bg-blue3'>`+tahun+`</th>
                <th style='width:90px' class='bg-blue3'>ACH[%]</th>
                <th style='width:90px' class='bg-blue3'>YoY[%]</th>
                <th style='width:90px' class='bg-blue3'>`+tahunrev+`</th>
                <th style='width:90px' class='bg-blue3'>YoY[%]</th>
            </tr>
            <tr>
                <th class='bg-grey'>1</th>
                <th  class='bg-grey'>2</th>
                <th  class='bg-grey'>3</th>
                <th  class='bg-grey'>4</th>
                <th  class='bg-grey'>5=3/1</th>
                <th  class='bg-grey'>6=3/2</th>
                <th  class='bg-grey'>7=(3/4)-1</th>
                <th  class='bg-grey'>8</th>
                <th  class='bg-grey'>9</th>
                <th  class='bg-grey'>10=9/1</th>
                <th  class='bg-grey'>11=(9/8)-1</th>
                <th  class='bg-grey'>12</th>
                <th  class='bg-grey'>13=(12/9)-1</th>
            </tr>
            `;
                    var no=1; var x=0;
                    for (var i=0;i < data.length;i++)
                    {
                        var n1="";
                        var line = data[i];
                       
                        var persen1=0;
                        var persen2=0;
                        var persen3=0;
                        var persen4=0;
                        var persen5=0;
                        var persen6=0;

                        if (parseFloat(line.n1)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n1))*100;
                        }
                        if (parseFloat(line.n2)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n2))*100;
                        }
                        if (parseFloat(line.n5)!=0)
                        {
                            persen1=(parseFloat(line.n4)/parseFloat(line.n5)-1)*100;
                        }
                        if (parseFloat(line.n1)!=0)
                        {
                          
                            persen4=(parseFloat(line.n8)/parseFloat(line.n1))*100;
                        }
                        if (parseFloat(line.n7)!=0)
                        {
                          
                            persen5=(parseFloat(line.n8)/parseFloat(line.n7))*100;
                        }
                        if (parseFloat(line.n8)!=0)
                        {
                          
                            persen6=(parseFloat(line.n9)/parseFloat(line.n8))*100;
                        }
                        if(line.state == 'closed' || line.tipe == 'Posting'){
                            var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                            var cursor = 'cursor:pointer;font-weight:bold';
                        }else{
                            var icon = '';
                            var cursor = '';
                        }
                        html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-state='`+line.state+`' data-tipe='`+line.tipe+`'>
                        <td class='isi_laporan' >`+fnSpasi(line.level_spasi)+``+icon+line.nama+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n1))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n2))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n4))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n5))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen1))+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen2))+`%</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen3))+`%</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n7))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n8))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen4))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen5))+`</td>
                        <td class='isi_laporan' align='right'>`+sepNumPas(parseFloat(line.n9))+`</td>
                        <td class='isi_laporan' align='center'>`+sepNum2(parseFloat(persen6))+`</td>
                        </tr>`;
                        
                        no++;
                    }
            html+=`</table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        // $('.treegrid').treegrid({
        //     enableMove: true, 
        //     onMoveOver: function(item, helper, target, position) {
        //         console.log(target);
        //         console.log(position); 
        //     }
        // });
        $('.report-table').on('click','tr',function(){
            
            
            var state = $(this).data('state');
            if(state == 'closed'){
                var id = $(this).attr('id');
                var index = $(this).closest('tr').index();
                if(!$(this).hasClass('clicked')){
                    $(this).addClass('clicked');
                    getChild(index,id,$formData,'yakes-report/lap-rekap-real-grid');
                }
                if(!$(this).hasClass('open-grid')){
                    $(this).addClass('open-grid');
                    $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-right');
                    $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-down');
                    $(this).removeClass('close-grid');
                    console.log($('tr[data-parent="' + id + '"]'));
                    $('tr[data-parent="' + id + '"]').show();

                }else{
                    $(this).addClass('close-grid');
                    $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-down');
                    $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-right');
                    $(this).removeClass('open-grid');
                    console.log($('tr[data-parent="' + id + '"]'));
                    $('tr[data-parent="' + id + '"]').hide();
                    $('tr[data-parentop="' + id + '"]').hide();
                }
            }

            var tipe = $(this).data('tipe');
            if(tipe == 'Posting'){
                var id = $(this).attr('id');
                var parent = $(this).data('parent');
                var index = $(this).closest('tr').index();
                if(!$(this).hasClass('clicked')){
                    $(this).addClass('clicked');
                    getChild(index,id,$formData,'yakes-report/lap-rekap-real-detail',parent);
                }
                if(!$(this).hasClass('open-grid')){
                    $(this).addClass('open-grid');
                    $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-right');
                    $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-down');
                    $(this).removeClass('close-grid');
                    console.log($('tr[data-parent="' + id + '"]'));
                    $('tr[data-parent="' + id + '"]').show();

                }else{
                    $(this).addClass('close-grid');
                    $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-down');
                    $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-right');
                    $(this).removeClass('open-grid');
                    console.log($('tr[data-parent="' + id + '"]'));
                    $('tr[data-parent="' + id + '"]').hide();
                }
            }
        });
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }

    // var html = `<table id="tt" style="width:600px;height:400px"></table>`;
    // $('#canvasPreview').html(html);
    // $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    // $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    // $('#tt').treegrid({
    //     url:"{{ url('yakes-report/lap-rekap-real-grid') }}?periode="+$periode,
    //     idField:'id',
    //     treeField:'nama',
    //     method:'GET',
    //     columns:[[
    //         {title:'Uraian',field:'nama',width:180},
    //         {title:'N1',field:'n1',width:60,align:'right'},
    //         {title:'N2',field:'n2',width:80,align:'right'},
    //         {title:'N3',field:'n3',width:80,align:'right'}
    //     ]]
    // });
</script>
   