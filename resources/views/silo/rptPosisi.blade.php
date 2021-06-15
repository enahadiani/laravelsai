<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('apv/lap-posisi', null, formData, null, function(res){
            if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);        
            }else{
                $('#saku-report #canvasPreview').load("{{ url('silo-auth/form/blank') }}");
            }
        });
    }

    drawLap($formData);

    function drawRptPage(data,res,from,to) { 
        var html = ''
        var no = 1
        if(data.length > 0) {
            html += `
                <div id='sai-rpt-table-export-tbl-daftar-reg'>
                    <h6 class='text-center'>Laporan Posisi</h6>
                    <hr />
                    <div class='ml-2 mr-2' style='overflow-x: scroll;'>
                        <table class='table table-condensed table-borderless' style='width: 1580px;'>
                            <thead>
                                <tr>
                                    <th class='text-center'>No</th>
                                    <th class='text-center'>No Bukti</th>
                                    <th class='text-center'>Tgl Kebutuhan</th>
                                    <th class='text-center'>Kode PP</th>
                                    <th class='text-center'>Kode Kota</th>
                                    <th class='text-center'>No Dokumen</th>
                                    <th class='text-center'>Justifikasi Kebutuhan</th>
                                    <th class='text-center'>Dasar</th>
                                    <th class='text-center'>Nilai Kebutuhan</th>
                                    <th class='text-center'>Posisi</th>
                                    <th class='text-center'>No Verifikasi</th>
                                    <th class='text-center'>Tgl Verifikasi</th>
                                    <th class='text-center'>NIK App RM</th>
                                    <th class='text-center'>Tgl App RM</th>
                                    <th class='text-center'>No Pengadaan</th>
                                    <th class='text-center'>Tgl Pengadaan</th>
                                    <th class='text-center'>Nilai Pengadaan</th>
                                    <th class='text-center'>NIK App1</th>
                                    <th class='text-center'>Tgl App1</th>
                                    <th class='text-center'>NIK App2</th>
                                    <th class='text-center'>Tgl App2</th>
                                    <th class='text-center'>NIK App3</th>
                                    <th class='text-center'>Tgl App3</th>
                                    <th class='text-center'>NIK App4</th>
                                    <th class='text-center'>Tgl App4</th>
                                </tr>    
                            </thead>
                            <tbody>`
                            for(var i=0;i<data.length;i++) {
                                var dt = data[i]
                                html += `
                                    <tr>
                                        <td class='text-center'>${no}</td>
                                        <td>${dt.no_bukti}</td>
                                        <td>${dt.waktu}</td>
                                        <td>${dt.kode_pp}</td>
                                        <td>${dt.kode_kota}</td>
                                        <td>${dt.no_dokumen}</td>
                                        <td>${dt.kegiatan}</td>
                                        <td>${sepNum(dt.nilai_kebutuhan)}</td>
                                        <td>${dt.posisi}</td>
                                        <td>${dt.no_ver}</td>
                                        <td>${dt.tgl_ver}</td>
                                        <td>${dt.nik_apprm}</td>
                                        <td>${dt.tgl_apprm}</td>
                                        <td>${dt.no_juspo}</td>
                                        <td>${dt.tgl_pengadaan}</td>
                                        <td>${sepNum(dt.nilai_pengadaan)}</td>
                                        <td>${dt.nik_app1}</td>
                                        <td>${dt.tgl_app1}</td>
                                        <td>${dt.nik_app2}</td>
                                        <td>${dt.tgl_app2}</td>
                                        <td>${dt.nik_app3}</td>
                                        <td>${dt.tgl_app3}</td>
                                        <td>${dt.nik_app4}</td>
                                        <td>${dt.tgl_app}</td>
                                    </tr>
                                `
                                no++;
                            }
                        html += `</tbody>
                        </table>
                    </div>
                </div>
                <div style='page-break-after:always'></div>
            `
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>