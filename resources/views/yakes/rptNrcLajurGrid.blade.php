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
            html+=judul_lap("LAPORAN NERACA LAJUR",lokasi,'Periode '+periode.fromname)+`
                <table class='table treegrid' id='table-grid'>
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
                    if(from != undefined){
                        var no=from+1;
                    }else{
                        var no=1;
                    }
                    var x =0;
                    var bold = '';
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        if(line.kode_induk == '-'){
                            var tree_id = "treegrid-"+line.kode_akun;
                            var parent_to_prt = "";
                            x=0;
                            so_awal=so_awal+parseFloat(line.so_awal);
                            debet=debet+parseFloat(line.debet);
                            kredit=kredit+parseFloat(line.kredit);
                            so_akhir=so_akhir + parseFloat(line.so_akhir);
                            if((data[i+1] != undefined) && (data[i+1].kode_induk == line.kode_akun)){
                                bold = 'bold';
                            }else{
                                bold = '';
                            }
                        }else{
                            var tree_id = "treegrid-"+line.kode_akun+x;
                            var parent_to_prt = "treegrid-parent-"+line.kode_induk;
                            x++;
                            bold = '';
                        }
                        html +=`<tr class='`+tree_id+` `+parent_to_prt+` `+bold+`' style='cursor:pointer;'>
                            <td class='isi_laporan' >`+line.kode_akun+`</td>
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
        $('.treegrid').treegrid({
            enableMove: true, 
            onMoveOver: function(item, helper, target, position) {
                console.log(target);
                console.log(position); 
            }
        });
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   