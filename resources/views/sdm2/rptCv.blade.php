<script type="text/javascript">
    function drawLap(formData){
        saiPostLoad('esaku-report/sdm-lap-karyawanCv', null, formData, null, function(res){
            if(res.result.length > 0){
                $('#pagination').html('');
                var show = $('#show').val();
                generatePaginationDore('pagination',show,res);
            }else{
                $('#saku-report #canvasPreview').load("{{ url('esaku-auth/form/blank') }}");
            }
        });
    }

    drawLap($formData);

    function drawRptPage(data,res,from,to) {
        var html = "";
        console.log(data);
        if(data.length > 0) {
            if(res.back){
                $('.navigation-lap').removeClass('hidden');
            }else{
                $('.navigation-lap').addClass('hidden');
            }
            for(var i=0;i<data.length;i++) {
                html += `
                    <div class="box-cv mr-2 ml-2 pb-4" id="sai-rpt-table-export">
                        <h6 class="text-center">Curiculum Vitae Karyawan</h6>
                        <div class="row">
                            <div class="col-9">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="width: 201px;">NIK</td>
                                            <td>: ${data[i].nik}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Nama</td>
                                            <td>: ${data[i].nama}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Jenis Kelamin</td>
                                            <td>: ${data[i].jenis_kelamin}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Agama</td>
                                            <td>: ${data[i].nama_agama}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Tempat, Tanggal Lahir</td>
                                            <td>: ${data[i].tempat_lahir}, ${data[i].tgl_lahir}</td>
                                        </tr>

                                        <tr>
                                            <td style="width: 201px;">No. NPWP</td>
                                            <td>: ${data[i].no_npwp}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Alamat</td>
                                            <td>: ${data[i].alamat}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Kota</td>
                                            <td>: ${data[i].kota}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Kode Pos</td>
                                            <td>: ${data[i].kode_pos}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">No. Telp</td>
                                            <td>: ${data[i].no_telp}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">No. HP</td>
                                            <td>: ${data[i].no_hp}</td>
                                        </tr>

                                        <tr>
                                            <td style="width: 201px;">Bank</td>
                                            <td>: ${data[i].nama_bank}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Cabang</td>
                                            <td>: ${data[i].cabang}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">No. Rekening</td>
                                            <td>: ${data[i].no_rek}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Nama Rekening</td>
                                            <td>: ${data[i].nama_rek}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">No. SK</td>
                                            <td>: ${data[i].no_kontrak}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Tanggal SK</td>
                                            <td>: ${data[i].tgl_kontrak}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Status Nikah</td>
                                            <td>: ${data[i].status_nikah}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Tanggal Nikah</td>
                                            <td>: ${data[i].tgl_nikah}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Golongan Darah</td>
                                            <td>: ${data[i].golongan_darah}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Nomor KK</td>
                                            <td>: ${data[i].nomor_kk}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Kelurahan</td>
                                            <td>: ${data[i].kelurahan}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Kecamatan</td>
                                            <td>: ${data[i].kecamatan}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <h6 class="text-note">POSISI SEKARANG</h6>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="width: 201px;">Status Karyawan</td>
                                            <td>: ${data[i].nama_sdm}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Area</td>
                                            <td>: ${data[i].nama_area}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">FM</td>
                                            <td>: ${data[i].nama_fm}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">BM</td>
                                            <td>: ${data[i].nama_bm}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 201px;">Lokasi Kerja</td>
                                            <td>: ${data[i].nama_loker}</td>
                                        </tr>

                                        <tr>
                                            <td style="width: 201px;">Profesi</td>
                                            <td>: ${data[i].nama_profesi}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <h6 class="text-note">DATA KELUARGA</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">Nama</th>
                                            <th class="text-center" style="width: 15px;">Status</th>
                                            <th class="text-center" style="width: 20px;">Jenis Kelamin</th>
                                            <th class="text-center" style="width: 20px;">Tanggungan</th>
                                            <th class="text-center" style="width: 25px;">Tempat Lahir</th>
                                            <th class="text-center" style="width: 25px;">Tanggal Lahir</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                    for(var j=0;j<res.res.data_keluarga[i].length;j++) {
                                        var keluarga = res.res.data_keluarga[i][j];
                                        html += `
                                            <tr>
                                                <td>${keluarga.nama}</td>
                                                <td>${keluarga.jenis}</td>
                                                <td>${keluarga.jk}</td>
                                                <td>${keluarga.status_kes}</td>
                                                <td>${keluarga.tempat}</td>
                                                <td>${keluarga.tgl_lahir}</td>
                                            </tr>`;
                                    }
                            html += `</tbody>
                                </table>
                                <br />
                                <h6 class="text-note">DATA KEDINASAN</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 40px;">No. SK</th>
                                            <th class="text-center" style="width: 15px;">Tanggal</th>
                                            <th class="text-center">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                    for(var k=0;k<res.res.data_dinas[i].length;k++) {
                                        var dinas = res.res.data_dinas[i][k];
                                        html += `
                                            <tr>
                                                <td>${dinas.no_sk}</td>
                                                <td>${dinas.tgl_sk}</td>
                                                <td>${dinas.nama}</td>
                                            </tr>`;
                                    }
                            html += `</tbody>
                                </table>
                                <br />
                                <h6 class="text-note">DATA PENDIDIKAN</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">Nama</th>
                                            <th class="text-center" style="width: 10px;">Tahun</th>
                                            <th class="text-center" style="width: 25px;">Strata</th>
                                            <th class="text-center" style="width: 40px;">Jurusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                    for(var l=0;l<res.res.data_pendidikan[i].length;l++) {
                                        var pendidikan = res.res.data_pendidikan[i][l];
                                        html += `
                                            <tr>
                                                <td>${pendidikan.nama}</td>
                                                <td>${pendidikan.tahun}</td>
                                                <td>${pendidikan.nama_strata}</td>
                                                <td>${pendidikan.nama_jurusan}</td>
                                            </tr>`;
                                    }
                            html += `</tbody>
                                </table>
                                <br />
                                <h6 class="text-note">DATA PELATIHAN</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 30px;">Nama</th>
                                            <th class="text-center" style="width: 50px;">Penyelenggara</th>
                                            <th class="text-center" style="width: 30px;">Tanggal Mulai</th>
                                            <th class="text-center" style="width: 30px;">Tanggal Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                    for(var m=0;m<res.res.data_pelatihan[i].length;m++) {
                                        var pelatihan = res.res.data_pelatihan[i][m];
                                        html += `
                                            <tr>
                                                <td>${pelatihan.nama}</td>
                                                <td>${pelatihan.panitia}</td>
                                                <td>${pelatihan.tgl_mulai}</td>
                                                <td>${pelatihan.tgl_selesai}</td>
                                            </tr>`;
                                    }
                            html += `</tbody>
                                </table>
                                <br />
                                <h6 class="text-note">DATA PENGHARGAAN</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center" style="width: 25px;">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                    for(var n=0;n<res.res.data_penghargaan[i].length;n++) {
                                        var penghargaan = res.res.data_penghargaan[i][n];
                                        html += `
                                            <tr>
                                                <td>${penghargaan.nama}</td>
                                                <td>${penghargaan.tanggal}</td>
                                            </tr>`;
                                    }
                            html += `</tbody>
                                </table>
                                <br />
                                <h6 class="text-note">DATA SANKSI</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center" style="width: 25px;">Tanggal</th>
                                            <th class="text-center" style="width: 30px;">Jenis Sanksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                    for(var o=0;o<res.res.data_sanksi[i].length;o++) {
                                        var sanksi = res.res.data_sanksi[i][o];
                                        html += `
                                            <tr>
                                                <td>${sanksi.nama}</td>
                                                <td>${sanksi.tanggal}</td>
                                                <td>${sanksi.jenis}</td>
                                            </tr>`;
                                    }
                            html += `</tbody>
                                </table>
                            </div>
                            <div class="col-3">
                                <div class="box-empty-image">
                                    <div>
                                        <p class="text-image">Foto diri belum ada</p>
                                    </div>
                                </div>
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
