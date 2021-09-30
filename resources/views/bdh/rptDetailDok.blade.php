<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-dokpbh', null, formData, null, function(res){
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

        var tahun = $periode.from.substr(0, 4)
        var bulan = $periode.from.substr(5, 2)
        var no = 1;
        html += `
            <div class="sai-rpt-table-export row">
                <div class="col-12">
                    <h6 class="text-center">DAFTAR DOKUMEN</h6>
                    <h6 class="text-center">PERIODE ${getNamaBulan(bulan)} ${tahun}</h6>
                    <div style="margin-left: 16px; margin-right: 16px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width: 10px;>No</th>
                                    <th style="text-align: center;" width: 100px;>No Bukti</th>
                                    <th style="text-align: center;" width: 60px;>Modul</th>
                                    <th style="text-align: center;" width: 400px;>Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>`
                            for(var i=0;i<data.length;i++) {
                                var row = data[i];
                                html += `<tr>
                                    <td>${no}</td>
                                    <td>${row.no_bukti}</td>
                                    <td>${row.modul}</td>
                                    <td>${row.no_gambar}</td>
                                </tr>`

                                no++
                            }            
                    html += `</tbody>
                        </table>
                    </div>
                </div>
            </div>
        `;
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>