<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-spb', null, formData, null, function(res){
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

function drawRptPage(data,res,from,to) {
    var html = "";
    console.log(data);
    if(data.length > 0) {
        var resData = res.res
        for(var i=0;i<data.length;i++) { 
            var no = 1;
            var row = data[i];
            var totalBruto = 0;
            var totalPajak = 0;
            var totalNetto = 0;
            var split = data[i].tanggal.split(' ');
            var tanggal = split[0];
            var splitTanggal = tanggal.split('-')

            html += `<div class="sai-rpt-table-export row">
                <div class="col-12">
                    <h6 class="text-center">SURAT PERINTAH BAYAR (SPB)</h6>  
                    <h6 class="text-center">NO SPB : ${row.no_spb}</h6>
                    <div style="margin-left: 16px;margin-top:24px;margin-right: 16px;">
                        <p>BENDAHARAWAN DIMOHON UNTUK MEMBAYARKAN UANG SEBESAR :</p>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 240px;">RP : ${sepNum(row.nilai)}</td>
                                    <td>: ${resData.bilangan_angka[i]}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="width: 240px;">KEPADA</td>
                                    <td>: &nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="width: 240px;">NAMA</td>
                                    <td>: ${row.nama_ver ? row.nama_ver : '-'}</td>
                                </tr>
                                <tr>
                                    <td style="width: 240px;">ALAMAT</td>
                                    <td>: ${row.alamat}</td>
                                </tr>
                                <tr>
                                    <td style="width: 240px;">UNTUK PEMBAYARAN KEGIATAN</td>
                                    <td>: ${row.keterangan}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>DENGAN RINCIAN SBB :</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px; text-align: center;">NO</th>
                                    <th style="width: 80px; text-align: center;">TANGGAL</th>
                                    <th style="width: 100px; text-align: center;">NO AGENDA</th>
                                    <th style="width: 250px; text-align: center;">URAIAN</th>
                                    <th style="width: 100px; text-align: center;">BRUTO</th>
                                    <th style="width: 100px; text-align: center;">PAJAK</th>
                                    <th style="width: 100px; text-align: center;">NETTO</th>
                                </tr>
                            </thead>
                            <tbody>`
                                for(var j=0;j<resData.data_detail.length;j++) {
                                    var row2 = resData.data_detail[j]
                                    if(row.no_spb == row2.no_spb) {
                                        totalBruto +=+ parseFloat(row2.nilai)
                                        totalPajak +=+ parseFloat(row2.npajak)
                                        totalNetto +=+ parseFloat(row2.netto)
                                        html += `
                                        <tr>
                                            <td>${no}</td>    
                                            <td>${row2.tgl}</td>    
                                            <td>${row2.no_pb}</td>    
                                            <td>${row2.keterangan}</td>    
                                            <td style="text-align: right;">${sepNum(row2.nilai)}</td>    
                                            <td style="text-align: right;">${sepNum(row2.npajak)}</td>    
                                            <td style="text-align: right;">${sepNum(row2.netto)}</td>    
                                        </tr>
                                        `
                                        no++;
                                    }
                                }
                    html += `<tr>
                                <td colspan="4" style="text-align: center;">Total</td>
                                <td style="text-align: right;">${sepNum(totalBruto)}</td> 
                                <td style="text-align: right;">${sepNum(totalPajak)}</td> 
                                <td style="text-align: right;">${sepNum(totalNetto)}</td> 
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td colspan="3" style="text-align: right;">${row.kota}, ${splitTanggal[2]} ${getNamaBulan(splitTanggal[2])} ${splitTanggal[0]}</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">BENDAHARA</td>
                                <td style="text-align: center;">FIATUR</td>
                                <td style="text-align: center;">YANG MEMBUAT</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td style="text-align: center;">REKTOR / WAREK / KABIDKUG</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="height: 60px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><u>${row.nama_bdh}</u></td>
                                <td style="text-align: center;"><u>${row.nama_fiat}</u></td>
                                <td style="text-align: center;"><u>${row.nama_user}</u></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">${row.nik_bdh}</td>
                                <td style="text-align: center;">${row.nik_fiat}</td>
                                <td style="text-align: center;">${row.nik_user}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>`;
        }
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>