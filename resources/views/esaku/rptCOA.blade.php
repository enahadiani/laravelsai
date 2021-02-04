<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-coa', null, formData, null, function(res){
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
            var html = ` <style>
                .info-table thead{
                    // background:#e9ecef;
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
                .bg-primary2{
                    background: #eaf2ff !important;
                }
                
                .bg-primary0{
                    background: #00358a !important;
                    color:white !important;
                }
            </style>
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="50%" colspan="5" class="vtop"><h6 class="text-primary bold">LAPORAN COA</h6></td>
                        <td width="50%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6></td>
                    </tr>
                    <tr>
                        <td colspan="5" ></td>
                        <td colspan="3" class="vtop text-right"><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p></td>
                    </tr>
                    <tr>
                        <td colspan="5" ></td>
                        <td colspan="3" class="vtop text-right"><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>
            <div style="padding: 0 3rem" class="table table-responsive mt-4">
                <table width='100%' class='table table-bordered table-striped'>
                    <tr>
                        <th width='60' class='header_laporan bg-primary text-center'>Kode</th>
                        <th width='200' class='header_laporan bg-primary text-center'>Nama</th>
                        <th width='40' class='header_laporan bg-primary text-center'>FS</th>
                        <th width='40' class='header_laporan bg-primary text-center'>Modul</th>
                        <th width='60' class='header_laporan bg-primary text-center'>Tipe</th>
                        <th width='60' class='header_laporan bg-primary text-center'>Level</th>
                        <th width='60' class='header_laporan bg-primary text-center'>Kode Induk</th>
                        <th width='80' class='header_laporan bg-primary text-center'>Kode Akun</th>
                        <th width='250' class='header_laporan bg-primary text-center'>Nama Akun</th>	
                    </tr>`;
                        var det = '';
                        for (var x=0;x<data.length;x++)
                        {
                            var line = data[x];
                            det+=`<tr>
                            <td class='isi_laporan'>`+line.kode_neraca+`</td>
                            <td class='isi_laporan'>`+line.nama+`</td>
                            <td class='isi_laporan'>`+line.kode_fs+`</td>
                            <td class='isi_laporan'>`+line.modul+`</td>
                            <td class='isi_laporan'>`+line.tipe+`</td>
                            <td class='isi_laporan'>`+line.level_spasi+`</td>
                            <td class='isi_laporan'>`+line.kode_induk+`</td>
                            <td class='isi_laporan'>`+line.kode_akun+`</td>
                            <td class='isi_laporan'>`+line.nama_akun+`</td>
                            </tr>`;	
                        }
                        var det = '';
                        for (var x=0;x<res.res.data2.length;x++)
                        {
                            var line2 = res.res.data2[x];
                            det+=`<tr>
                            <td class='isi_laporan'>`+line2.kode_neraca+`</td>
                            <td class='isi_laporan'>`+line2.nama+`</td>
                            <td class='isi_laporan'>`+line2.kode_fs+`</td>
                            <td class='isi_laporan'>`+line2.modul+`</td>
                            <td class='isi_laporan'>`+line2.tipe+`</td>
                            <td class='isi_laporan'>`+line2.level_spasi+`</td>
                            <td class='isi_laporan'>`+line2.kode_induk+`</td>
                            <td class='isi_laporan'>`+line2.kode_akun+`</td>
                            <td class='isi_laporan'>`+line2.nama_akun+`</td>
                            </tr>`;	
                        }
                        var det = '';
                        for (var x=0;x<res.res.data3.length;x++)
                        {
                            var line3 = res.res.data3[x];
                            det+=`<tr>
                            <td class='isi_laporan'>`+line3.kode_neraca+`</td>
                            <td class='isi_laporan'>`+line3.nama+`</td>
                            <td class='isi_laporan'>`+line3.kode_fs+`</td>
                            <td class='isi_laporan'>`+line3.modul+`</td>
                            <td class='isi_laporan'>`+line3.tipe+`</td>
                            <td class='isi_laporan'>`+line3.level_spasi+`</td>
                            <td class='isi_laporan'>`+line3.kode_induk+`</td>
                            <td class='isi_laporan'>`+line3.kode_akun+`</td>
                            <td class='isi_laporan'>`+line3.nama_akun+`</td>
                            </tr>`;	
                        }
                        html+=det+`
                    </table>
                <DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   