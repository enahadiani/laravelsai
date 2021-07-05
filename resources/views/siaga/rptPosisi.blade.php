<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('siaga-report/lap-posisi', null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $('#saku-report #canvasPreview').load("{{ url('siaga-auth/form/blank') }}");
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
            var html = `<div class="px-3">
            <style>
                .info-table thead{
                    background:#4286f5;
                    color:white;
                }
                .bold {
                    font-weight:bold;
                }
            </style>
            `;
            periode = $periode;
            var lokasi = "{{ Session('namaLokasi') }}";
            html+=judul_lap("LAPORAN POSISI",lokasi,'Periode '+periode.fromname)+`
                <table width='100%' class='table table-bordered'>
                    <tr style="background:var(--theme-color-1);color:white">
                        <td width='20'  class='header_laporan' align='center'>No</td>
                        <td width='80' class='header_laporan' align='center'>No Bukti</td>
                        <td width='80' class='header_laporan' align='center'>No Dokumen</td>
                        <td width='50' class='header_laporan' align='center'>Tanggal</td>
                        <td width='200' class='header_laporan' align='center'>Keterangan </td>
                        <td width='40' class='header_laporan' align='center'>PP</td>
                        <td width='40' class='header_laporan' align='center'>Nilai</td>
                        <td width='80' class='header_laporan' align='center'>Progress</td>
                        <td width='80' class='header_laporan' align='center'>Action</td>
                    </tr>`;
                        var total=0; 
                        var det = '';
                        if(from != undefined){
                            var no=from+1;
                        }else{
                            var no=1;
                        }
                        var first = true;
                        var nilai =0;var tmp='';
                        for (var x=0;x<data.length;x++)
                        {
                            var line2 = data[x];
                            nilai=nilai+parseFloat(line2.nilai);
                            
                            det+=`<tr>
                            <td align='center' class='isi_laporan'>`+no+`</td>
                            <td  class='isi_laporan'>`+line2.no_pb+`</td>
                            <td class='isi_laporan'>`+line2.no_dokumen+`</td>
                            <td class='isi_laporan'>`+line2.tgl_aju+`</td>
                            <td class='isi_laporan'>`+line2.keterangan+`</td>
                            <td  class='isi_laporan'>`+line2.nama_pp+`</td>
                            <td  class='isi_laporan'>`+sepNum(parseFloat(line2.nilai))+`</td>
                            <td  class='isi_laporan'>`+line2.posisi+`</td>
                            <td  class='isi_laporan text-center'><a href='#' class='btn-print report-link' data-no_bukti='`+line2.no_pb+`'><i class='simple-icon-printer' style='font-size:18px !important'></i></a>&nbsp;&nbsp;<a href='#' class='btn-history report-link' data-no_bukti='`+line2.no_pb+`' ><i class='iconsminds-clock-back' style='font-size:18px !important'></i></a></td>
                            </tr>`;	
                            first = true;
                            no++;
                            
                            
                        }
                        det+=`<tr>
                        <td height='25' colspan='6' align='right'  class='bold'>Total</td>
                        <td class='bold' align='right'>`+sepNum(nilai)+`</td>
                        </tr>`;
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
   