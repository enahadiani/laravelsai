<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/sdm-lap-karyawan', null, formData, null, function(res){
            if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
            }else{
                $('#saku-report #canvasPreview').load("{{ url('sdm2-auth/form/blank') }}");
            }
        });
    }

    drawLap($formData);

    function drawRptPage(data,res,from,to) {
        var html = "";
        var no = 1;
        if(data.length > 0) {
            html += `<div id="sai-rpt-table-export">
                <h6 class="text-center">Lapoan Data Karyawan</h6>
                <hr />
                <div class='ml-2 mr-2' style='overflow-x: scroll;'>
                    <table class='table table-bordered' style='width: 1580px;'>
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">No</th>
                                <th class="text-center" style="width: 15px;">NIK</th>
                                <th class="text-center" style="width: 140px;">Nama</th>
                                <th class="text-center" style="width: 120px;">Tanggal Masuk</th>
                                <th class="text-center" style="width: 120px;">Status</th>
                                <th class="text-center" style="width: 120px;">Area</th>
                                <th class="text-center" style="width: 120px;">FM</th>
                                <th class="text-center" style="width: 120px;">BM</th>
                                <th class="text-center" style="width: 150px;">Lokasi Kerja</th>
                                <th class="text-center" style="width: 120px;">No Telp</th>
                                <th class="text-center" style="width: 200px;">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        for(var i=0;i<data.length;i++) {
                            var column = data[i];
                            html += `<tr class="report-link karyawan" style="cursor: pointer;" data-karyawan="${column.nik}">
                                <td class="text-center">${no}</td>
                                <td class="text-left">${column.nik}</td>
                                <td class="text-left">${column.nama}</td>
                                <td class="text-left">${column.tgl_masuk}</td>
                                <td class="text-left">${column.nama_sdm}</td>
                                <td class="text-left">${column.nama_area}</td>
                                <td class="text-left">${column.nama_fm}</td>
                                <td class="text-left">${column.nama_bm}</td>
                                <td class="text-left">${column.nama_loker}</td>
                                <td class="text-left">${column.no_telp}</td>
                                <td class="text-left">${column.alamat}</td>
                            </tr>`;
                            no++;
                        }
                html += `</tbody>
                    </table>
                </div>
            </div>`;
        }
        $('#canvasPreview').html(html);
        $('li.prev a ').html("<i class='simple-icon-arrow-left'></i>");
        $('li.next a ').html("<i class='simple-icon-arrow-right'></i>");
    }
</script>
