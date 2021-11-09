<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/lap-stok', null, formData, null, function(res){
            if(res.result.length > 0){
                
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
                
            }else{
                $('#saku-report #canvasPreview').load("{{ url('bdh-auth/form/blank') }}");
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
            </style>
            `;
            periode = $periode;
            var lokasi = "{{ Session::get('namaLokasi') }}";
            html+=`
            <div class='table-responsive'>
                <table class="borderless mb-2 table-header" style="width:100%;" >
                    <tr>
                        <td colspan="3" class="vtop" style='width:500px'><h6 class="text-primary bold">`+lokasi+`</h6></td>
                        <td colspan="12" class="vtop" style='width:1320px'>&nbsp;</td>
                        <td class="vmiddle text-center" style='width:120px'></td>
                    </tr>
                    <tr>
                        <td colspan="3" >LAPORAN STOK BARANG</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style='width:100px'>PERIODE</td>
                        <td colspan="" style='width:400px;text-transform:uppercase'>:&nbsp;`+namaPeriode($periode.from)+`</td>
                        <td colspan="12" class="vtop">&nbsp;</td>
                        <td class="vtop text-right">&nbsp;</td>
                    </tr>
                </table>
                <table width='100%' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                        <th width='20' class='header_laporan text-center'>No</th>
                        <th width='80' class='header_laporan text-center'>Gudang</th>
                        <th width='80' class='header_laporan text-center'>Kode Barang</th>
                        <th width='200' class='header_laporan text-center'>Nama Barang </th>
                        <th width='80' class='header_laporan text-center'>Kelompok</th>
                        <th width='80' class='header_laporan text-center'>Stok</th>
                        <th width='80' class='header_laporan text-center'>Harga</th>
                        <th width='80' class='header_laporan text-center'>Total</th>
                    </tr>
                    </thead>
                    <tbody>`;
                        var total=0; 
                        var det = '';
                        if(from != undefined){
                            var no=from+1;
                        }else{
                            var no=1;
                        }
                        var stok=0; var total=0;
                        for (var x=0;x<data.length;x++)
                        {
                            var line2 = data[x];
                            
                            stok=stok+parseFloat(line2.stok);
                            total=total+parseFloat(line2.total);
                            
                            det+=`<tr>
                            <td align='center' class='isi_laporan'>`+no+`</td>
                            <td  class='isi_laporan'>`+line2.kode_gudang+`</td>
                            <td class='isi_laporan'>`+line2.kode_barang+`</td>
                            <td class='isi_laporan'>`+line2.nama_barang+`</td>
                            <td class='isi_laporan'>`+line2.kode_klp+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.stok))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.harga))+`</td>
                            <td  class='isi_laporan text-right'>`+number_format(parseFloat(line2.total))+`</td>
                            </tr>`;	
                            no++;
                            
                        }
                        det+=`<tr>
                        <th colspan='5' class='text-right bold'>Total</th>
                        <th class='bold text-right'>`+number_format(stok)+`</th>
                        <th class='bold text-right'>&nbsp;</th>
                        <th class='bold text-right'>`+number_format(total)+`</th>
                        </tr>`;
                        html+=det+`
                    </tbody>
                    </table>
                <DIV style='page-break-after:always'></DIV>`;
                        
            html+="</div>"; 
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   