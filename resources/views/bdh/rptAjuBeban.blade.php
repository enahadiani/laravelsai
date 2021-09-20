<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-pb', null, formData, null, function(res){
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
        var no = 1;
        for(var i=0;i<data.length;i++) {
            var row = data[i];
            var totalBruto = 0;
            var totalPajak = 0;
            var totalNetto = 0;
            var split = data[i].tanggal.split(' ');
            var tanggal = split[0];
            var splitTanggal = tanggal.split('-')

            html += `<div class="class="sai-rpt-table-export row">
                <div class="col-12">
                    <h6 class="text-center">FORMULIR PERTANGGUNGAN BEBAN</h6>
                    <div class="barcode-session">
                        <svg id="barcode-${no}"></svg>
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="width: 240px;">No Pertanggungan</td>
                                <td>: ${row.no_pb}</td>
                            </tr>
                            <tr>
                                <td style="width: 240px;">Tanggal</td>
                                <td>: ${row.tgl}</td>
                            </tr>
                            <tr>
                                <td style="width: 240px;">Keterangan</td>
                                <td>: ${row.keterangan}</td>
                            </tr>
                            <tr>
                                <td style="width: 240px;">Nilai</td>
                                <td>: ${sepNum(row.nilai)}</td>
                            </tr>
                            <tr>
                                <td style="width: 240px;">Terbilang</td>
                                <td>: ${resData.bilangan_angka[i]}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <th style="width: 80px; text-align: center;">Kode Akun</th>
                            <th style="width: 160px; text-align: center;">Nama Akun</th>
                            <th style="width: 80px; text-align: center;">Kode PP</th>
                            <th style="width: 160px; text-align: center;">Nama PP</th>
                            <th style="width: 80px; text-align: center;">Kode DRK</th>
                            <th style="width: 160px; text-align: center;">Nama DRK</th>
                            <th style="width: 80px; text-align: center;">Nilai</th>
                        </thead>
                        <tbody>`
                        for(var j=0;j<resData.data_detail.length;j++) {
                            var row2 = resData.data_detail[j];
                            console.log(row2)
                            if(row.no_pb == row2.no_pb) {
                                html += `<tr>
                                    <td>${row2.kode_akun}</td>
                                    <td>${row2.nama_akun}</td>
                                    <td>${row2.kode_pp}</td>
                                    <td>${row2.nama_pp}</td>
                                    <td>${row2.kode_drk}</td>
                                    <td>${row2.nama_drk ? row2.nama_drk : '-'}</td>
                                    <td style="text-align: right;">${sepNum(row2.nilai)}</td>
                                </tr>`;
                            }
                        }
                html += `</tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <th style="width: 200px; text-align: center;">Nama Rekening</th>
                            <th style="width: 150px; text-align: center;">No Rekening</th>
                            <th style="width: 150px; text-align: center;">Bank</th>
                            <th style="width: 90px; text-align: center;">Bruto</th>
                            <th style="width: 90px; text-align: center;">Pajak</th>
                            <th style="width: 160px; text-align: center;">Netto</th>
                        </thead>
                        <tbody>`
                        for(var k=0;k<resData.data_sub_detail.length;k++) {
                            var row3 = resData.data_sub_detail[k];
                            totalBruto +=+ parseFloat(row3.nilai)
                            totalPajak +=+ parseFloat(row3.pajak)
                            totalNetto +=+ parseFloat(row3.netto)
                            
                            if(row.no_pb == row3.no_bukti) {
                                html += `<tr>
                                    <td>${row3.no_rek}</td>
                                    <td>${row3.nama_rek}</td>
                                    <td>${row3.bank}</td>
                                    <td style="text-align: right;">${sepNum(row3.nilai)}</td>
                                    <td style="text-align: right;">${sepNum(row3.pajak)}</td>
                                    <td style="text-align: right;">${sepNum(row3.netto)}</td>
                                </tr>`
                            }
                        }
                html += `<tr>
                            <td colspan="3" style="text-align: right;">Total</td>
                            <td style="text-align: right;">${sepNum(totalBruto)}</td>
                            <td style="text-align: right;">${sepNum(totalPajak)}</td>
                            <td style="text-align: right;">${sepNum(totalNetto)}</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td colspan="4" style="text-align: right;">${row.kota}, ${splitTanggal[2]} ${getNamaBulan(splitTanggal[1])} ${splitTanggal[0]}</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">Mengetahui/Menyetujui :</td>
                                <td style="text-align: center;">Fiat Bayar</td>
                                <td style="text-align: center;">Verifikasi</td>
                                <td style="text-align: center;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">Ka .PP</td>
                                <td colspan="2" style="text-align: center;">&nbsp;</td>
                                <td style="text-align: center;">Dibuat Oleh,</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="height: 60px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align: center;"><u>${row.nama_app}</u></td>
                                <td colspan="2" style="text-align: center;">&nbsp;</td>
                                <td style="text-align: center;"><u>${row.nama_user}</u></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">NIP : ${row.nik_app}</td>
                                <td colspan="2" style="text-align: center;">&nbsp;</td>
                                <td style="text-align: center;">NIP : ${row.nik_user}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>`
            no++;
        }
    }
    $('#canvasPreview').html(html);

    var no = 1;
    for(var i=0;i<data.length;i++) { 
        var row = data[i];
        $(`#barcode-${no}`).JsBarcode(row.no_pb, {
            displayValue: false,
            height: 40,
        })
        no++;
    }
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>