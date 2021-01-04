<link href="{{ asset('asset_elite/css/jquery.treegrid.css') }}" rel="stylesheet">
<script src="{{ asset('asset_elite/js/jquery.treegrid.js') }}"></script>
<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('yakes-report/lap-nrclajur-grid', null, formData, null, function(res){
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

   function getChild(index,id,formData,url,parent = null){
        var kode = id.replace('grid-id-','');
        formData.delete('id');
        formData.append('id',kode);
        saiPostGrid(url, null, formData, null, function(res){
            if(res.result.length > 0){
                var html='';
                var data = res.result;
                var so_awal=0;
                var debet=0;
                var kredit=0;
                var so_akhir=0;
                var no=1;
                var x =0;
                var bold = '';
                var color = '';
                for (var i=0; i < data.length ; i++)
                {
                    var line  = data[i];
                        if(line.state == 'closed' || line.tipe == 'Posting'){
                            var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                            var cursor = 'cursor:pointer;font-weight:bold';
                        }else{
                            var icon = '';
                            var cursor = '';
                           
                        }
                        html +=`<tr id='grid-id-`+line.kode_akun+`' style='`+cursor+`' data-state='`+line.state+`' data-parent='`+id+`' data-tipe='`+line.tipe+`' data-parentop=`+parent+`>
                    <td class='isi_laporan' >`+fnSpasi(2)+icon+line.kode_akun+`</td>
                    <td height='20' class='isi_laporan'>`+fnSpasi(2)+line.nama+`</td>
                    <td height='20' class='isi_laporan'>`+line.kode_pp+`</td>
                    <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_awal))+`</td>
                    <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.debet))+`</td>
                    <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.kredit))+`</td>
                    <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_akhir))+`</td>
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
            var html = `<div id='grid-load'><img src='{{ asset("img/loadgif.gif") }}' style='width:25px;height:25px'></div>
            <div>
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
                #grid-load{
                    position: absolute;
                    text-align: center;
                    width: 100%;
                    top: 200px;
                    display:none;
                }
            </style>

            `;
            periode = $periode;
            var lokasi = res.lokasi;
            html+=judul_lap("LAPORAN NERACA LAJUR",lokasi,'Periode '+periode.fromname)+`
                <table class='table report-table' id='table-grid'>
                    <tr>
                        <td class='header_laporan bold' align='center'>Kode Akun</td>
                        <td class='header_laporan bold' align='center'>Nama Akun</td>
                        <td class='header_laporan bold' align='center'>Kode PP</td>
                        <td class='header_laporan bold' align='center'>Saldo Awal </td>
                        <td class='header_laporan bold' align='center'>Debet</td>
                        <td class='header_laporan bold' align='center'>Kredit</td>
                        <td class='header_laporan bold' align='center'>Saldo Akhir </td>
                    </tr>`;
                    var so_awal=0;
                    var debet=0;
                    var kredit=0;
                    var so_akhir=0;
                    var no=1;
                    var x =0;
                    var bold = '';
                    var color = '';
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        if(line.state == 'closed' || line.tipe == 'Posting'){
                            var icon = '<i class="simple-icon-arrow-right mr-2"></i>';
                            var cursor = 'cursor:pointer;font-weight:bold';
                        }else{
                            var icon = '';
                            var cursor = '';
                        }
                        so_awal=so_awal+parseFloat(line.so_awal);
                        debet=debet+parseFloat(line.debet);
                        kredit=kredit+parseFloat(line.kredit);
                        so_akhir=so_akhir + parseFloat(line.so_akhir);
                        html +=`<tr id='grid-id-`+line.kode_akun+`' style='`+cursor+`' data-state='`+line.state+`' data-tipe='`+line.tipe+`'>
                            <td class='isi_laporan' >`+icon+line.kode_akun+`</td>
                            <td height='20' class='isi_laporan'>`+line.nama+`</td>
                            <td height='20' class='isi_laporan'>`+line.kode_pp+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_awal))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.debet))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.kredit))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_akhir))+`</td>
                        </tr>`;
                        no++;
                    }
            html+=`<tr>
                <td height='20' colspan='3' class='sum_laporan bold' align='right'>Total</td>
                <td class='sum_laporan bold' align='right'>`+sepNum(so_awal)+`</td>
                <td class='sum_laporan bold' align='right'>`+sepNum(debet)+`</td>
                <td class='sum_laporan bold' align='right'>`+sepNum(kredit)+`</td>
                <td class='sum_laporan bold' align='right'>`+sepNum(so_akhir)+`</td>
                </tr>`;
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
        $('.report-table').on('click','tr',function(){
            
            
            var state = $(this).data('state');
            if(state == 'closed'){
                var id = $(this).attr('id');
                var index = $(this).closest('tr').index();
                if(!$(this).hasClass('clicked')){
                    $(this).addClass('clicked');
                    var top = $(this).position().top;
                    $('#grid-load').css('top',top);
                    getChild(index,id,$formData,'yakes-report/lap-nrclajur-grid');
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
                    getChild(index,id,$formData,'yakes-report/lap-nrclajur-grid',parent);
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
</script>
   