<script type="text/javascript">
    
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-nrclajur', null, formData, null, function(res){
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
            var html = `<div>
            <style>
                .info-table th{
                    // background:#e9ecef;
                    text-align:center;
                }
                .no-border td{
                    border:0 !important;
                }
                .bold {
                    font-weight:bold;
                }
                
                .table-header-prev td{
                    padding: 2px !important;
                }
                .table-kop-prev td{
                    padding: 0px !important;
                }
                .separator2{
                    height:1rem;
                    background:#f8f8f8;
                    box-shadow: -1px 0px 1px 0px #e1e1e1;
                }
                .vtop{
                    vertical-align:top !important;
                }
                .lh1{
                    line-height:1;
                }
            </style>
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN NERACA LAJUR</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" >Periode `+($periode.fromname)+`</td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" >( Disajikan dalam Rupiah )</td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            `;
            html+=`
            <div style="padding: 0 3rem" class="table table-responsive">
                <table class='table table-bordered table-striped info-table mt-4'>
                    <tr class="bg-primary">
                        <th width='30' rowspan='2'  class='header_laporan bg-primary' align='center'>No</th>
                        <th width='70' rowspan='2' class='header_laporan bg-primary' align='center'>Kode Akun</th>
                        <th width='300' rowspan='2' class='header_laporan bg-primary' align='center'>Nama Akun</th>
                        <th height='25' colspan='2' class='header_laporan bg-primary' align='center'>Saldo Awal </th>
                        <th colspan='2' class='header_laporan bg-primary' align='center'>Mutasi</th>
                        <th colspan='2' class='header_laporan bg-primary' align='center'>Saldo Akhir </th>
                    </tr>
                    <tr class="bg-primary"> 
                        <th width='90' height='25' class='header_laporan bg-primary' align='center'>Debet</th>
                        <th width='90' class='header_laporan bg-primary' align='center'>Kredit</th>
                        <th width='90' class='header_laporan bg-primary' align='center'>Debet</th>
                        <th width='90' class='header_laporan bg-primary' align='center'>Kredit</th>
                        <th width='90' class='header_laporan bg-primary' align='center'>Debet</th>
                        <th width='90' class='header_laporan bg-primary' align='center'>Kredit</th>
                    </tr>`;
                    var so_awal_debet=0;
                    var so_awal_kredit=0;
                    var debet=0;
                    var kredit=0;
                    var so_akhir_debet=0;
                    var so_akhir_kredit=0;
                    if(from != undefined){
                        var no=from+1;
                    }else{
                        var no=1;
                    }
                    for (var i=0; i < data.length ; i++)
                    {
                        var line  = data[i];
                        so_awal_debet=so_awal_debet+parseFloat(line.so_awal_debet);
                        so_awal_kredit=so_awal_kredit+parseFloat(line.so_awal_kredit);
                        debet=debet+parseFloat(line.debet);
                        kredit=kredit+parseFloat(line.kredit);
                        so_akhir_debet=so_akhir_debet + parseFloat(line.so_akhir_debet);
                        so_akhir_kredit=so_akhir_kredit + parseFloat(line.so_akhir_kredit);
                        
                        html +=`<tr class='report-link bukubesar' style='cursor:pointer;' data-kode_akun='`+line.kode_akun+`'>
                            <td class='isi_laporan' align='center'>`+no+`</td>
                            <td class='isi_laporan' >`+line.kode_akun+`</td>
                            <td height='20' class='isi_laporan link-report'>`+line.nama+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_awal_debet))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_awal_kredit))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.debet))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.kredit))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_akhir_debet))+`</td>
                            <td class='isi_laporan' align='right'>`+sepNum(parseFloat(line.so_akhir_kredit))+`</td>
                        </tr>`;
                        no++;
                    }
            html+=`<tr>
                <td height='20' colspan='3' class='sum_laporan bg-primary' align='right'>Total</td>
                <td class='sum_laporan bg-primary' align='right'>`+sepNum(so_awal_debet)+`</td>
                <td class='sum_laporan bg-primary' align='right'>`+sepNum(so_awal_kredit)+`</td>
                <td class='sum_laporan bg-primary' align='right'>`+sepNum(debet)+`</td>
                <td class='sum_laporan bg-primary' align='right'>`+sepNum(kredit)+`</td>
                <td class='sum_laporan bg-primary' align='right'>`+sepNum(so_akhir_debet)+`</td>
                <td class='sum_laporan bg-primary' align='right'>`+sepNum(so_akhir_kredit)+`</td>
                </tr>
            </table>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
        // $('#pagination').append(`<li class="page-item all"><a href="#" class="page-link"><i class="far fa-list-alt"></i></a></li>`);
    }
</script>
   