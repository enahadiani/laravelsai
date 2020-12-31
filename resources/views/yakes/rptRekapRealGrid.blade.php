
<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('yakes-report/lap-rekap-real-grid', null, formData, null, function(res){
        //    if(res.result.length > 0){

                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
              
        //    }else{
        //         $('#saku-report #canvasPreview').load("{{ url('yakes-auth/form/blank') }}");
        //    }
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
            `;
            
            html+=`
                <table class='table treegrid' id='table-grid' width='100%'>
                    <tr>
                        <th class='header_laporan bg-yellow text-center' width='8%' align='center'>Kode Akun</th>
                        <th class='header_laporan bg-yellow text-center' width='28%' align='center'>Nama Akun</th>
                        <th class='header_laporan bg-yellow text-center' width='10%' align='center'>RKA 2020</th>
                        <th class='header_laporan bg-yellow text-center' width='10%' align='center'>RKA SD OKT</th>
                        <th class='header_laporan bg-yellow text-center' width='10%' align='center'>REAL YTD OKT 2020</th>
                        <th class='header_laporan bg-yellow text-center' width='10%' align='center'>REAL YTD OKT 2019</th>
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

                            html+=`<tr id='grid-id-`+line.kode_neraca+`' data-state='`+line.state+`'>
                            <td width='52%' height='20' class='isi_laporan' >`+fnSpasi(line.level_spasi)+``+line.nama+`</td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n1+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n2+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n5+`</div></td>
                            <td width='18%' class='isi_laporan'><div align='right'>`+n4+`</div></td>

                            </tr>`;
                        
                        no++;
                    }
            html+=`</table>`;
        }
        $('#canvasPreview').html(html);
        // $('.treegrid').treegrid({
        //     enableMove: true, 
        //     onMoveOver: function(item, helper, target, position) {
        //         console.log(target);
        //         console.log(position); 
        //     }
        // });
        $('.treegrid').on('click','tr',function(){
            
            
            var state = $(this).data('state');
            if(state == 'closed'){
                if(!$(this).hasClass('clicked')){
                    $(this).addClass('clicked');
                    var id = $(this).attr('id');
                    var index = $(this).closest('tr').index();
                    $('#table-grid').find('tr:eq('+index+')').after('<tr data-parent="'+id+'" style="display:none"><td colspan="6">OK</td></tr>');
                }
                if(!$(this).hasClass('open-grid')){
                    $(this).addClass('open-grid');
                    $(this).removeClass('close-grid');
                    $('tr[data-parent="' + id + '"]').show();

                }else{
                    $(this).addClass('close-grid');
                    $(this).removeClass('open-grid');
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
   