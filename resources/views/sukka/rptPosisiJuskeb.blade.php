<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('sukka-report/lap-posisi-juskeb', null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $('#saku-report #canvasPreview').load("{{ url('sukka-auth/form/blank') }}");
            }
        });
    }

    drawLap($formData);
    function drawRptPage(data,res,from,to){
        var data = data;
        if(res.back){
            $('.navigation-lap').removeClass('hidden');
        }else{
            $('.navigation-lap').addClass('hidden');
        }
        var html = `
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .table-header td{
                    padding: 2px !important;
                }
                .bold {
                    font-weight:bold;
                }
                #report-table th
                {
                    padding: 4px 8px !important;
                    border: none !important;
                }
                #report-table th.bordered 
                {
                    border: 1px solid black !important;
                }
            </style>
            `;
            var lokasi = res.lokasi;
            html+=`
                <table class="borderless mb-2 table-header" style="width:100%;" >
                    <tr>
                        <td colspan="3" class="vtop" style='width:500px'><h6 class="text-primary bold">`+lokasi+`</h6></td>
                        <td colspan="12" class="vtop" style='width:1320px'>&nbsp;</td>
                        <td class="vmiddle text-center" style='width:120px'></td>
                    </tr>
                    <tr>
                        <td colspan="3" >LAPORAN POSISI PENGAJUAN JUSTIFIKASI KEBUTUHAN</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>`;
                    if(typeof $periode == 'object'){
                        if($periode.from != ""){
                            html+=`<tr>
                                <td colspan="3">PERIODE</td>
                                <td colspan="13" class="vtop" style='width:400px;text-transform:uppercase'>:&nbsp;`+$periode.fromname+`</td>
                                <td class="vtop text-right">&nbsp;</td>
                            </tr>`;
                        }
                    }
                    html+=`
                </table>
                <div style="" class="table table-responsive">
                    <table class='table table-striped table-bordered mt-4' id='report-table'>
                        <thead>
                            <tr>
                                <th style='width:20px'  class='header_laporan' align='center'>No</th>
                                <th style='width:120px' class='header_laporan' align='center'>No Bukti</th>
                                <th style='width:100px' class='header_laporan' align='center'>Tanggal</th>
                                <th style='width:250px' class='header_laporan' align='center'>Kegiatan </th>
                                <th style='width:100px' class='header_laporan' align='center'>Unit Kerja</th>
                                <th style='width:100px' class='header_laporan' align='center'>Periode Penggunaan</th>
                                <th style='width:100px' class='header_laporan' align='center'>Nilai</th>
                                <th style='width:100px' class='header_laporan' align='center'>Nilai RRA</th>
                                <th style='width:150px' class='header_laporan' align='center'>Posisi</th>
                            </tr>
                        </thead>
                        `;
                        var det = "";
                        var no = 1;
                        var nilai=0; var nilai_rra=0;
                        for(var x=0;x < data.length; x++)
                        {       
                            var line = data[x];
                            nilai+=parseFloat(line.nilai);
                            nilai_rra+=parseFloat(line.nilai_rra);
                            det +=`<tr>
                                <td valign='top' class='isi_laporan'>`+no+`</td>
                                <td valign='top' class='isi_laporan'><a href='#' style='color:blue' class='detail-aju' data-no_bukti='`+line.no_bukti+`' >`+line.no_bukti+`</a></td>
                                <td valign='top' class='isi_laporan'>`+line.tanggal+`</td>
                                <td valign='top' class='isi_laporan'>`+line.kegiatan+`</td>
                                <td valign='top' class='isi_laporan'>`+line.nama_pp+`</td>
                                <td valign='top' class='isi_laporan'>`+line.periode+`</td>
                                <td valign='top' class='isi_laporan' align='right'>`+number_format(parseFloat(line.nilai))+`</td>
                                <td valign='top' class='isi_laporan' align='right'>`+number_format(parseFloat(line.nilai_rra))+`</td>
                                <td valign='top' class='isi_laporan'><a href='#' style='color:blue' class='history-aju' data-no_bukti='`+line.no_bukti+`' >`+line.posisi+`</a></td>
                            </tr>`;
                            no++;
                        }
                html +=det+`
                    <tr >
                        <th class='header_laporan' align='center' colspan='6'>Total</th>
                        <th class='header_laporan text-right'>${number_format(nilai)}</th>
                        <th class='header_laporan text-right'>${number_format(nilai_rra)}</th>
                        <th class='header_laporan' >&nbsp;</th>
                    </tr>
                    </table>
                    <br>`;
        html+="</div>"; 
            if(i != (data.length - 1)){
        html+=`<DIV style='page-break-after:always'></DIV>`;
            }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
   </script>
   