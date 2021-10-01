<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-kartuif', null, formData, null, function(res){
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
    if(data.length > 0) {
        var resData = res.res;
        for(var i=0;i<data.length;i++) {    
            var row = data[i];
            var no = 1;
            var totalSaldo = 0;
            var totalDebet = 0;
            var totalKredit = 0;

            html += `
                <div class="sai-rpt-table-export row">
                    <div class="col-12">
                        <h6 class="text-center">KANTOR PELAKSANA HARIAN YPT</h6> 
                        <h6 class="text-center">KARTU PENGAWASAN IMPREST FUND</h6> 
                        <div style="margin-left: 16px;margin-right: 16px;">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 200px;">NIK</td>  
                                        <td>: ${row.nik}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Nama</td>  
                                        <td>: ${row.nama}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Kode PP</td>  
                                        <td>: ${row.kode_pp}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Nama PP</td>  
                                        <td>: ${row.nama_pp}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Tahun</td>  
                                        <td>: ${$tahun.from}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 60px; text-align:center;">Tanggal</th>
                                        <th style="width: 100px; text-align:center;">No Bukti</th>
                                        <th style="width: 250px; text-align:center;">Keterangan</th>
                                        <th style="width: 90px; text-align:center;">Debet</th>
                                        <th style="width: 90px; text-align:center;">Kredit</th>
                                        <th style="width: 90px; text-align:center;">Saldo</th>
                                    </tr>
                                    <tbody>`
                                    for(var j=0;j<resData.data_detail.length;j++) {
                                        var row2 = resData.data_detail[j]
                                        if(row.nik == row2.nik) {
                                            var saldo = parseFloat(row2.debet) - parseFloat(row2.kredit);
                                            totalSaldo = totalSaldo + (parseFloat(row2.debet) - parseFloat(row2.kredit))
                                            totalDebet +=+ parseFloat(row2.debet)
                                            totalKredit +=+ parseFloat(row2.kredit)

                                            html += `
                                                <tr>
                                                    <td style="text-align: center;">${row2.tgl}</td>
                                                    <td style="text-align: left;">${row2.no_bukti}</td>
                                                    <td style="text-align: left;">${row2.keterangan}</td>
                                                    <td style="text-align: right;">${sepNum(row2.debet)}</td>
                                                    <td style="text-align: right;">${sepNum(row2.kredit)}</td>
                                                    <td style="text-align: right;">${sepNum(saldo)}</td>
                                                </tr>
                                            `
                                        }
                                    }
                            html += `<tr>
                                        <td colspan="3" style="text-align: right;">Total</td>
                                        <td style="text-align: right;">${sepNum(totalDebet)}</td>
                                        <td style="text-align: right;">${sepNum(totalKredit)}</td>
                                        <td style="text-align: right;">${sepNum(totalSaldo)}</td>
                                    </tr>
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            `;
            
        }
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>