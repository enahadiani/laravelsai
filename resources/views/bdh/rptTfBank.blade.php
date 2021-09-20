<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-transbank', null, formData, null, function(res){
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
            var no = 1;
            var row = data[i];
            var totalNom = 0;
            var split = data[i].tanggal.split(' ');
            var tanggal = split[0];
            var splitTanggal = tanggal.split('-')

            html += `
                <div class="sai-rpt-table-export row">
                    <div class="col-12">
                        <h6 class="text-center">PEMBAYARAN TRANSFER</h6>
                        <h6 class="text-center">NOMOR SPB : ${row.no_spb}</h6>
                        <div class="table-responsive" style="margin-left: 16px;width: 95%;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 100px; text-align: center;">REKENING</th>
                                        <th style="width: 20px; text-align: center;">PLUS</th>
                                        <th style="width: 90px; text-align: center;">NOMINAL</th>
                                        <th style="width: 30px; text-align: center;">CD</th>
                                        <th style="width: 10px; text-align: center;">NO</th>
                                        <th style="width: 150px; text-align: center;">NAMA</th>
                                        <th style="width: 100px; text-align: center;">BANK</th>
                                        <th style="width: 150px; text-align: center;">KETERANGAN</th>
                                        <th style="width: 80px; text-align: center;">NO AGENDA</th>
                                        <th style="width: 100px; text-align: center;">NO SPB</th>
                                    </tr>
                                </thead>
                                <tbody>`
                                for(var j=0;j<resData.data_detail.length;j++) {
                                    var row2 = resData.data_detail[j]
                                    if(row.no_spb == row2.no_spb) {
                                        totalNom +=+ parseFloat(row2.nilai)
                                        
                                        html += `
                                            <tr>
                                                <td style="text-align: left;">${row2.no_rek}</td>
                                                <td style="text-align: center;">+</td>
                                                <td style="text-align: right;">${sepNum(row2.nilai)}</td>
                                                <td style="text-align: center;">C</td>
                                                <td style="text-align: center;">${no}</td>
                                                <td style="text-align: left;">${row2.nama_rek}</td>
                                                <td style="text-align: left;">${row2.bank}</td>
                                                <td style="text-align: left;">${row2.berita}</td>
                                                <td style="text-align: left;">${row2.no_pb}</td>
                                                <td style="text-align: left;">${row2.no_spb}</td>
                                            </tr>
                                        `
                                        no++;
                                    }
                                }
                        html += `<tr>
                                    <td colspan="2" style="text-align: right;">TOTAL</td>    
                                    <td style="text-align: right;">${sepNum(totalNom)}</td>
                                    <td colspan="7">&nbsp;</td>      
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td colspan="3" style="text-align: right;">Bandung, ${splitTanggal[2]} ${getNamaBulan(splitTanggal[1])} ${splitTanggal[0]}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">Yang Membuat</td>
                                        <td style="text-align: center;">Yang Mengajukan</td>
                                        <td style="text-align: center;">Fiatur</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="height: 24px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"><u>${row.nama_buat}</u></td>
                                        <td style="text-align: center;"><u>${row.nama_bdh}</u></td>
                                        <td style="text-align: center;"><u>${row.nama_fiat}</u></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">${row.jab_buat}</td>
                                        <td style="text-align: center;">${row.jab_bdh}</td>
                                        <td style="text-align: center;">${row.jab_fiat}</td>
                                    </tr>
                                </tbody>
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