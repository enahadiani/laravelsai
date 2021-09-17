<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-bayar', null, formData, null, function(res){
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
        var resData = res.res
        for(var i=0;i<data.length;i++) {
            var row = data[i];
            var no = 1;
            var split = data[i].tanggal.split(' ');
            var tanggal = split[0];
            var splitTanggal = tanggal.split('-')
            var totalDebet = 0;
            var totalKredit = 0;

            html += `
                <div class="sai-rpt-table-export row">
                    <div class="col-12">
                        <div class="table-responsive" style="margin-left: 16px;width: 95%;">
                            <div class="div-table">
                                <table class="table-bukti">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30px;text-align: center;">${row.no_kas}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30px;text-align: center;">${splitTanggal[2]} ${getNamaBulan(splitTanggal[1])} ${splitTanggal[0]}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="text-center" style="margin-top: 72px;">BUKTI JURNAL</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px; text-align: center;">NO</th>
                                        <th style="width: 100px; text-align: center;">KODE AKUN</th>
                                        <th style="width: 200px; text-align: center;">NAMA AKUN</th>
                                        <th style="width: 270px; text-align: center;">KETERANGAN</th>
                                        <th style="width: 60px; text-align: center;">PP</th>
                                        <th style="width: 60px; text-align: center;">DRK</th>
                                        <th style="width: 90px; text-align: center;">DEBET</th>
                                        <th style="width: 90px; text-align: center;">KREDIT</th>
                                    </tr>
                                </thead>
                                <tbody>` 
                                for(var j=0;j<resData.data_detail.length;j++) {
                                    var row2 = resData.data_detail[j]
                                    if(row.no_kas == row2.no_kas) {
                                        totalDebet +=+ parseFloat(row2.debet)
                                        totalKredit +=+ parseFloat(row2.kredit)
                                        
                                        html += `
                                            <tr>
                                                <td style="text-align: center;">${no}</td>
                                                <td style="text-align: left;">${row2.kode_akun}</td>
                                                <td style="text-align: left;">${row2.nama}</td>
                                                <td style="text-align: left;">${row2.keterangan}</td>
                                                <td style="text-align: center;">${row2.kode_pp}</td>
                                                <td style="text-align: center;">${row2.kode_drk}</td>
                                                <td style="text-align: right;">${sepNum(row2.debet)}</td>
                                                <td style="text-align: right;">${sepNum(row2.kredit)}</td>
                                            </tr>
                                        `
                                        no++;
                                    }
                                }
                        html += `<tr>
                                    <td colspan="6" style="text-align: right;font-weight: bold;">Total</td>
                                    <td style="text-align: right;font-weight: bold;">${sepNum(totalDebet)}</td>
                                    <td style="text-align: right;font-weight: bold;">${sepNum(totalKredit)}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="div-table">
                                <table class="table-check">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">Dibuat Oleh :</td>
                                            <td style="text-align: center;">Diperiksa Oleh :</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">Paraf & Tanggal</td>
                                            <td style="text-align: center;">Paraf & Tanggal</td>
                                        </tr>
                                        <tr>
                                            <td style="height: 80px;">&nbsp;</td>
                                            <td style="height: 80px;">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
        
        
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>