<script type="text/javascript">
function drawLap(formData){
    saiPostLoad('bdh-report/lap-verifikasi', null, formData, null, function(res){
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
            var split = data[i].tanggal.split(' ');
            var tanggal = split[0];
            var splitTanggal = tanggal.split('-')
            html += `<div class="sai-rpt-table-export">
                <h6 class="text-center">VERIFIKASI AKUN</h6>   
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive" style="margin-left: 16px;">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 200px;">No Bukti</td>  
                                        <td>: ${data[i].no_ver}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Tanggal</td>  
                                        <td>: ${data[i].tgl}</td>
                                    </tr>    
                                    <tr>
                                        <td style="width: 200px;">Catatan</td>  
                                        <td>: ${data[i].catatan}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Status</td>  
                                        <td>: ${data[i].status}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">No Agenda</td>  
                                        <td>: ${data[i].no_bukti}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">PP</td>  
                                        <td>: ${data[i].kode_pp} - ${data[i].nama_pp}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">MTA</td>  
                                        <td>: ${data[i].kode_akun} - ${data[i].nama_akun}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">DRK</td>  
                                        <td>: ${data[i].kode_drk} - ${data[i].nama_drk}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Keterangan</td>  
                                        <td>: ${data[i].keterangan}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 200px;">Nilai</td>  
                                        <td>: ${sepNum(data[i].nilai)}</td>
                                    </tr>
                                    <tr style="height: 16px;">
                                        <td colspan="2">&nbsp;</td>     
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            Surabaya, ${splitTanggal[2]} ${getNamaBulan(splitTanggal[1])} ${splitTanggal[0]}    
                                        </td>
                                    </tr>
                                    <tr style="height: 4px;">
                                        <td colspan="2">&nbsp;</td>    
                                    </tr>
                                    <tr>
                                       <td colspan="2">Verifikator</td> 
                                    </tr>
                                    <tr style="height: 16px;">
                                        <td colspan="2">&nbsp;</td>    
                                    </tr>
                                    <tr>
                                       <td colspan="2">${data[i].nama}</td> 
                                    </tr>
                                </tbody>    
                            </table>    
                        </div>    
                    </div>    
                </div> 
            </div>`
        }
    }
    $('#canvasPreview').html(html);
    $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
    $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
}
</script>