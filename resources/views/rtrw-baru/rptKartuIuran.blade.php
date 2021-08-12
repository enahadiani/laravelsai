<div id='canvasPreview'>
</div>
<script type="text/javascript">

    function drawLap(formData){
        saiPostLoad("{{ url('rtrw-report/lap-kartu-iuran') }}", null, formData, null, function(res){
           if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
           }else{
                $('#saku-report #canvasPreview').load("{{ url('rtrw-auth/form/blank') }}");
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
            </style>`;
            html+= `
            <div style='border-bottom: double #d7d7d7;padding:0 3rem'>
                <table class="borderless mb-2 table-kop-prev" width="100%" >
                    <tr>
                        <td width="25%" colspan="5" class="vtop"><h6 class="text-primary bold">KARTU IURAN</h6></td>
                        <td width="75%" colspan="3" class="vtop text-right"><h6 class="mb-2 bold">`+res.lokasi[0].nama+`</h6><p class="lh1">`+res.lokasi[0].alamat+`<br>`+res.lokasi[0].kota+` `+res.lokasi[0].kodepos+` </p><p class="mt-2">`+res.lokasi[0].email+` | `+res.lokasi[0].no_telp+`</p></td>
                    </tr>
                </table>
            </div>`;
            for(var a=0; a < data.length; a++)
            {
                html+=`
                <div style="padding:0 3rem">
                    <table class="borderless table-header-prev mt-2" width="100%">
                        <tr>
                            <td width="14%">Kode Rumah</td>
                            <td width="1%">:</td>
                            <td width="54%" colspan="3">`+data[0].kode_rumah+`</td>
                            <td width="10%" rowspan="3" style="vertical-align:top !important"></td>
                            <td width="1%" rowspan="3" style="vertical-align:top !important"></td>
                            <td width="20%" rowspan="3" style="vertical-align:top !important"></td>
                        </tr>
                        <tr>
                            <td width="14%">Nama Penghuni</td>
                            <td width="1%">:</td>
                            <td width="54%" colspan="3">`+data[0].nama+`</td>
                        </tr>
                        <tr>
                            <td width="14%">RT</td>
                            <td width="1%">:</td>
                            <td width="54%" colspan="3">`+data[0].nama_rt+`</td>
                        </tr>
                    </table>
                </div>
                <div style="padding:0 3.1rem">
                    <table class="table table-striped table-body-prev mt-2" width="100%">
                        <tr style="background: var(--theme-color-1) !important;color:white !important">
                            <th style="width:5%">No</th>
                            <th style="width:10%">Periode</th>
                            <th style="width:10">Jenis</th>
                            <th style="width:15%">Iuran RT</th>
                            <th style="width:15%">Iuran RW</th>
                            <th style="width:15%">Bayar RT</th>
                            <th style="width:15%">Bayar RW</th>
                            <th style="width:15%">No Bukti</th>
                        </tr>`;
                        var det = '';
                        var nilai_rt = 0; var nilai_rw =0;
                        var bayar_rt = 0; var bayar_rw =0;
                        var no=1;
                        for(var i=0;i<data[0].detail.length;i++){
                            var line =data[0].detail[i];
                            nilai_rt+=parseFloat(line.nilai_rt);
                            nilai_rw+=parseFloat(line.nilai_rw);
                            bayar_rt+=parseFloat(line.bayar_rt);
                            bayar_rw+=parseFloat(line.bayar_rw);
                            det += "<tr>";
                            det += "<td >"+no+"</td>";
                            det += "<td >"+line.periode+"</td>";
                            det += "<td >"+line.kode_jenis+"</td>";
                            det += "<td class='text-right'>"+number_format(line.nilai_rt)+"</td>";
                            det += "<td class='text-right'>"+number_format(line.nilai_rw)+"</td>";
                            det += "<td class='text-right'>"+number_format(line.bayar_rt)+"</td>";
                            det += "<td class='text-right'>"+number_format(line.bayar_rw)+"</td>";
                            det += "<td >"+line.no_angs+"</td>";
                            det += "</tr>";
                            no++;
                        }
                        det+=`<tr style="background: var(--theme-color-1) !important;color:white !important">
                        <th colspan="3"></th>
                        <th style="width:10%" class="text-right">`+number_format(nilai_rt)+`</th>
                        <th style="width:10%" class="text-right">`+number_format(nilai_rw)+`</th>
                        <th style="width:10%" class="text-right">`+number_format(bayar_rt)+`</th>
                        <th style="width:10%" class="text-right">`+number_format(bayar_rw)+`</th>
                        </tr>`;
                        html+=det+`
                    </table>
                    <table class="table-borderless mt-2" width="100%">
                        <tr>
                            <td width="60%" colspan="5">&nbsp;</td>
                            <td width="20%" class="text-center" colspan="2">Dibuat Oleh</td>
                            <td width="20%" class="text-center">Diperiksa Oleh</td>
                        </tr>
                        <tr>
                            <td width="60%" colspan="5">&nbsp;</td>
                            <td width="20%" style="height:100px" colspan="2"></td>
                            <td width="20%" style="height:100px"></td>
                        </tr>
                    </table>
                </div>
                <br>
                `;
                if(a != (data.length - 1)){
                    html+=`<div class='separator2 mb-4'></div>`;
                }
                html+=`
                <DIV style='page-break-after:always'></DIV>
                `; 
            }
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
   