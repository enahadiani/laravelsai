<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-saldopanjar', null, formData, null, function(res){
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
        var split = data[0].tgl.split('/');
        var no = 1;
        var total = 0;
        var nilai_ptg = 0;
        var total_nilai_ptg = 0;
        var total_saldo = 0;
        var saldo = 0;

        html += `<div class="sai-rpt-table-export"">
            <h6 class="text-center">Saldo Panjar</h6>  
            <h6 class="text-center">Periode ${getNamaBulan(split[1])} ${split[2]}</h6>
            <div style="margin-right: 8px;margin-left: 8px;overflow-x: scroll;">
                <table class="table table-bordered" style="width: 1600px;">
                    <thead>
                        <th style="text-align: center; width: 30px;">No</th>
                        <th style="text-align: center; width: 60px;">NIK</th>
                        <th style="text-align: center; width: 150px;">Nama</th>
                        <th style="text-align: center; width: 60px;">Kode PP</th>
                        <th style="text-align: center; width: 120px;">Nama PP</th>
                        <th style="text-align: center; width: 60px;">Tgl Panjar</th>
                        <th style="text-align: center; width: 200px;">Keterangan</th>
                        <th style="text-align: center; width: 80px;">No Panjar</th>
                        <th style="text-align: center; width: 80px;">No KasBank</th>
                        <th style="text-align: center; width: 80px;">No PTG Panjar</th>
                        <th style="text-align: center; width: 90px;">Nilai Panjar</th>
                        <th style="text-align: center; width: 90px;">Nilai PTG Panjar</th>
                        <th style="text-align: center; width: 90px;">Saldo Panjar</th>
                    </thead>
                    <tbody>`
                    for(var i=0;i<data.length;i++) {
                        var row = data[i];
                        total +=+ parseFloat(row.nilai)
                        total_nilai_ptg +=+ parseFloat(row.nilai_ptg)
                        total_saldo += parseFloat(row.nilai) - parseFloat(row.nilai_ptg)
                        saldo = parseFloat(row.nilai) - parseFloat(row.nilai_ptg)

                        html += `<tr>
                            <td style="text-align: center;">${no}</td>
                            <td style="text-align: left;">${row.nik_pengaju}</td>
                            <td style="text-align: left;">${row.nama}</td>
                            <td style="text-align: center;">${row.kode_pp}</td>
                            <td style="text-align: left;">${row.nama_pp}</td>
                            <td style="text-align: center;">${row.tgl}</td>
                            <td style="text-align: left;">${row.keterangan}</td>
                            <td style="text-align: left;">${row.no_pj}</td>
                            <td style="text-align: left;">${row.no_kas}</td>
                            <td style="text-align: left;">${row.kas_ptg}</td>
                            <td style="text-align: right;">${sepNum(row.nilai)}</td>
                            <td style="text-align: right;">${sepNum(row.nilai_ptg)}</td>
                            <td style="text-align: right;">${sepNum(saldo)}</td>
                        </tr>`
                        no++;
                    }
            html += `<tr>
                        <td colspan="10" style="text-align: right;">Total</td>
                        <td style="text-align: right;">${sepNum(total)}</td>
                        <td style="text-align: right;">${sepNum(total_nilai_ptg)}</td>
                        <td style="text-align: right;">${sepNum(total_saldo)}</td>
                    </tr>
                    </tbody>
                </table>
            </div>  
        </div>`;
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>