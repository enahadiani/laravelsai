<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-bukaif', null, formData, null, function(res){
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
            var no = 1;
            var judul = null;
            var format = null;
            var row = data[i];
            var split = data[i].tanggal.split(' ');
            var tanggal = split[0];
            var splitTanggal = tanggal.split('-')
            var totalDebet = 0;
            var totalKredit = 0;

            if(row.no_kas.substr(4,1) == 'K') {
                judul = "BUKTI PENGELUARAN KAS / BANK"
                format = "KK / BK"
            } else {
                judul = "BUKTI PENERIMAAN KAS / BANK"
                format = "KM / BM"  
            }

            html += `<div class="class="sai-rpt-table-export row">
                <div class="col-12">
                    <h6 class="text-center">${judul}</h6>
                    <h6 class="text-center">${format} No : ${row.no_kas}</h6>
                    <div class="table-responsive" style="margin-left: 16px;width: 95%;">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 200px;">Sudah Terima Dari</td>  
                                    <td>: IT Telkom Surabaya</td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;">Jumlah Tunai / Cek</td>  
                                    <td>: ${sepNum(row.nilai)}</td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;">Terbilang</td>  
                                    <td>: ${resData.bilangan_angka[i]}</td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;">Untuk Pembayaran</td>  
                                    <td>: ${row.keterangan}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: right;">${data[i].kota}, ${splitTanggal[2]} ${getNamaBulan(splitTanggal[1])} ${splitTanggal[0]}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: right;">Yang Menerima</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 60px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 200px;">No Bukti</td>  
                                    <td>: ${row.no_kas}</td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;">No Dokumen</td>  
                                    <td>: ${row.no_dokumen}</td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;">Periode</td>  
                                    <td>: ${row.periode}</td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;">Tanggal</td>  
                                    <td>: ${row.tanggal1}</td>
                                </tr>
                                <tr>
                                    <td style="width: 200px;">Keterangan</td>  
                                    <td>: ${row.keterangan}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered" style="margin-top: 16px;">
                            <thead>
                                <tr>
                                    <th style="width: 10px; text-align: center;">No</th>
                                    <th style="width: 60px; text-align: center;">Akun</th>
                                    <th style="width: 200px; text-align: center;">Nama Akun</th>
                                    <th style="width: 250px; text-align: center;">Keterangan</th>
                                    <th style="width: 40px; text-align: center;">PP</th>
                                    <th style="width: 60px; text-align: center;">DRK</th>
                                    <th style="width: 90px; text-align: center;">Debet</th>
                                    <th style="width: 90px; text-align: center;">Kredit</th>
                                </tr>
                            </thead>
                            <tbody>`
                            for(var j=0;j<resData.data_detail.length;j++) {
                                var row2 = resData.data_detail[j];
                                if(row.no_kas == row2.no_kas) {
                                    totalDebet +=+ parseFloat(row2.debet)
                                    totalKredit +=+ parseFloat(row2.kredit)

                                    html += `<tr>
                                        <td style="text-align: center;">${no}</td>
                                        <td style="text-align: left;">${row2.kode_akun}</td>
                                        <td style="text-align: left;">${row2.nama}</td>
                                        <td style="text-align: left;">${row2.keterangan}</td>
                                        <td style="text-align: center;">${row2.kode_pp}</td>
                                        <td style="text-align: center;">${row2.kode_drk}</td>
                                        <td style="text-align: right;">${sepNum(row2.debet)}</td>
                                        <td style="text-align: right;">${sepNum(row2.kredit)}</td>
                                    </tr>`

                                    no++;
                                }
                            }
                    html += `<tr>
                            <td colspan="6" style="text-align: right;">Total</td>
                            <td style="text-align: right;">${sepNum(totalDebet)}</td>
                            <td style="text-align: right;">${sepNum(totalKredit)}</td>
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