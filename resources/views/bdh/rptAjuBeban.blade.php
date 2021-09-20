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
        console.log(data)
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
                            <th style="width: 80px; text-align: center;">TANGGAL</th>
                            <th style="width: 160px; text-align: center;">Nama Akun</th>
                            <th style="width: 250px; text-align: center;">URAIAN</th>
                            <th style="width: 100px; text-align: center;">BRUTO</th>
                            <th style="width: 100px; text-align: center;">PAJAK</th>
                            <th style="width: 100px; text-align: center;">NETTO</th>
                        </thead>
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