
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

   function getChild(index,id,formData,url){
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
                    if (line.tipe!="Header")
                    {
                        n1=sepNum(parseFloat(line.n1));
                        n2=sepNum(parseFloat(line.n2));
                        n3=sepNum(parseFloat(line.n3));
                        n4=sepNum(parseFloat(line.n4));
                        n5=sepNum(parseFloat(line.n5));
                        n6=sepNum(parseFloat(line.n6));
                        n7=sepNum(parseFloat(line.n7));
                        n8=sepNum(parseFloat(line.n8));
                    }
                    var persen1="";
                    var persen2="";
                    var persen3="";
                    
                    if(line.state == 'closed' || line.tipe == 'Posting'){
                        var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                        var cursor = 'cursor:pointer;font-weight:bold';
                    }else{
                        var icon = '';
                        var cursor = '';
                    }
                    html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-state='`+line.state+`' data-parent='`+id+`' data-tipe='`+line.tipe+`'>
                    <td width='52%' height='20' class='isi_laporan' >`+fnSpasi(line.level_spasi)+``+icon+line.nama+`</td>
                    <td width='18%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n5+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen1+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen2+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen3+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+n5+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen1+`</div></td>
                     <td width='18%' class='isi_laporan'><div align='right'>`+persen2+`</div></td>
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
                <td colspan='12' class='text-right no-border'>dlm. Rp Juta</td>
            </tr>
            <tr>
                <th width='27%' rowspan='2' class='bg-blue3'>URAIAN</th>
                <th width='8%' class='bg-blue3'>RKA</th>
                <th width='8%' class='bg-blue3'>RKA</th>
                <th width='16%' colspan='2' class='bg-blue3'>REAL YTD</th>
                <th width='15%' colspan='3' class='bg-blue3'>PRESENTASE</th>
                <th width='8%' class='bg-blue3'>REAL</th>
                <th width='18%' colspan='3' class='bg-blue3'>OUTLOOK</th>
            </tr>
            <tr>
                <th width='12%' class='bg-blue3'>2020</th>
                <th width='12%' class='bg-blue3'>SD 0KT</th>
                <th width='12%' class='bg-blue3'>OKT 2020</th>
                <th width='12%' class='bg-blue3'>OKT 2019</th>
                <th width='12%' class='bg-blue3'>RKA</th>
                <th width='12%' class='bg-blue3'>OKT</th>
                <th width='12%' class='bg-blue3'>YoY</th>
                <th width='12%' class='bg-blue3'>2019</th>
                <th width='12%' class='bg-blue3'>2020</th>
                <th width='12%' class='bg-blue3'>ACH[%]</th>
                <th width='12%' class='bg-blue3'>YoY[%]</th>
            </tr>
            <tr>
                <th width='6%' class='bg-grey'></th>
                <th width='6%' class='bg-grey'>1</th>
                <th width='12%' class='bg-grey'>2</th>
                <th width='12%' class='bg-grey'>3</th>
                <th width='12%' class='bg-grey'>4</th>
                <th width='12%' class='bg-grey'>5=3/1</th>
                <th width='12%' class='bg-grey'>6=3/2</th>
                <th width='12%' class='bg-grey'>7=(3/4)-1</th>
                <th width='12%' class='bg-grey'>8</th>
                <th width='12%' class='bg-grey'>9</th>
                <th width='12%' class='bg-grey'>10=9/1</th>
                <th width='12%' class='bg-grey'>11=(9/8)-1</th>
            </tr>`;
                    var no=1; var x=0;
                    for (var i=0;i < data.length;i++)
                    {
                        var n1="";
                        var line = data[i];
                        if (line.tipe!="Header")
                        {
                            n1=sepNum(parseFloat(line.n1));
                            n2=sepNum(parseFloat(line.n2));
                            n3=sepNum(parseFloat(line.n3));
                            n4=sepNum(parseFloat(line.n4));
                            n5=sepNum(parseFloat(line.n5));
                            n6=sepNum(parseFloat(line.n6));
                            n7=sepNum(parseFloat(line.n7));
                            n8=sepNum(parseFloat(line.n8));
                        }
                            var persen1="";
                            var persen2="";
                            var persen3="";
                            if(line.state == 'closed' || line.tipe == 'Posting'){
                                var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                                var cursor = 'cursor:pointer;font-weight:bold';
                            }else{
                                var icon = '';
                                var cursor = '';
                            }
                            html+=`<tr id='grid-id-`+line.kode_neraca+`' style='`+cursor+`' data-state='`+line.state+`' data-tipe='`+line.tipe+`'>
                            <td width='52%' height='20' class='isi_laporan' >`+fnSpasi(line.level_spasi)+``+icon+line.nama+`</td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n5+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+persen1+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+persen2+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+persen3+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n5+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+persen1+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+persen2+`</div></td>

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
                }
            }

            var tipe = $(this).data('tipe');
            if(tipe == 'Posting'){
                var id = $(this).attr('id');
                var index = $(this).closest('tr').index();
                if(!$(this).hasClass('clicked')){
                    $(this).addClass('clicked');
                    getChild(index,id,$formData,'yakes-report/lap-rekap-real-detail');
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
   