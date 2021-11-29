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
