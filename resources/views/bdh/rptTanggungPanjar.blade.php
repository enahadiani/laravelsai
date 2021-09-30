<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-tanggungpanjar', null, formData, null, function(res){
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
        if(resData.back){
            $('.navigation-lap').removeClass('hidden');
        }else{
            $('.navigation-lap').addClass('hidden');
        }
        for(var i=0;i<data.length;i++) {
            var no = 1;
            var no2 = 1;
            var row = data[i];
            var totalBruto = 0;
            var totalPajak = 0;
            var totalNetto = 0;
            var split = data[i].tanggal.split(' ');
            var tanggal = split[0];
            var splitTanggal = tanggal.split('-')

            html += `<div class="class="sai-rpt-table-export row">
                <div class="col-12">
                    <h6 class="text-center">FORMULIR PERTANGGUNGAN PANJAR</h6>
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
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2">Rekap Panjar :</td>
                            </tr>
                            <tr>
                                <td style="width: 240px;">Jumlah Panjar (+)</td>
                                <td>: ${sepNum(row.nilai_pj)}</td>
                            </tr>
                            <tr>
                                <td style="width: 240px;">Jumlah Realisasi (-)</td>
                                <td>: ${sepNum(row.nilai)}</td>
                            </tr>
                            <tr>
                                <td style="width: 240px;">Sisa Panjar (-/+)</td>
                                <td>: ${sepNum(row.sisa)}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered">
                        <thead>
                            <th style="width: 150px; text-align: center;">No Rekening</th>
                            <th style="width: 200px; text-align: center;">Nama Rekening</th>
                            <th style="width: 150px; text-align: center;">Bank</th>
                            <th style="width: 90px; text-align: center;">Bruto</th>
                            <th style="width: 90px; text-align: center;">Pajak</th>
                            <th style="width: 90px; text-align: center;">Netto</th>
                        </thead>
                        <tbody>`
                        for(var j=0;j<resData.data_rek.length;j++) {
                            var row2 = resData.data_rek[j];
                            if(row.no_pb == row2.no_bukti) {
                                totalBruto +=+ parseFloat(row2.nilai)
                                totalPajak +=+ parseFloat(row2.pajak)
                                totalNetto +=+ parseFloat(row2.netto)
                                html += `<tr>
                                    <td>${row2.no_rek}</td>
                                    <td>${row2.nama_rek}</td>
                                    <td>${row2.bank}</td>
                                    <td style="text-align: right;">${sepNum(row2.nilai)}</td>
                                    <td style="text-align: right;">${sepNum(row2.pajak)}</td>
                                    <td style="text-align: right;">${sepNum(row2.netto)}</td>
                                </tr>`;
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
                    <table class="table table-bordered">
                        <thead>
                            <th style="width: 10px; text-align: center;">NO</th>
                            <th style="width: 100px; text-align: center;">MTP</th>
                            <th style="width: 80px; text-align: center;">KODE PP</th>
                            <th style="width: 100px; text-align: center;">KODE DRK</th>
                            <th style="width: 250px; text-align: center;">URAIAN</th>
                            <th style="width: 90px; text-align: center;">JUMLAH (RP)</th>
                        </thead>
                        <tbody>`
                        for(var k=0;k<resData.data_detail.length;k++) {
                            var row3 = resData.data_detail[k];
                            totalBruto +=+ parseFloat(row3.nilai)
                            totalPajak +=+ parseFloat(row3.pajak)
                            totalNetto +=+ parseFloat(row3.netto)
                            
                            if(row.no_pb == row3.no_ptg) {
                                html += `<tr>
                                    <td>${no}</td>
                                    <td>${row3.kode_akun}</td>
                                    <td>${row3.kode_pp}</td>
                                    <td>${row3.kode_drk}</td>
                                    <td>${row3.keterangan}</td>
                                    <td style="text-align: right;">${sepNum(row3.nilai)}</td>
                                </tr>`
                                no++;
                            }
                        }
                html += `</tbody>
                    </table>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="width: 540px;">PERTANGGUNGAN :</td>
                                <td>TERBILANG :</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-bordered">
                                <thead>
                                    <th style="width: 10px; text-align: center;">NO</th>
                                    <th style="width: 80px; text-align: center;">MTP</th>
                                    <th style="width: 200px; text-align: center;">NAMA MTP</th>
                                    <th style="width: 90px; text-align: center;">JUMLAH (RP)</th>
                                </thead>
                                <tbody>`
                                   for(var l=0;l<resData.data_lain.length;l++) {
                                       var row4 = resData.data_lain[l];
                                       if(row.no_pb == row4.no_ptg) {
                                           html += `<tr>
                                                <td>${no2}</td>
                                                <td>${row4.kode_akun}</td>
                                                <td>${row4.nama}</td>
                                                <td style="text-align: right;">${sepNum(row4.nilai)}</td>
                                           </tr>`
                                           no2++;
                                       }
                                   } 
                        html += `<tr>
                                    <td colspan="3" style="text-align: right;">TOTAL PERTANGGUNGAN</td>
                                    <td style="text-align: right;">${sepNum(row.nilai)}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            ${resData.bilangan_angka[i]}
                        </div>
                    </div>
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