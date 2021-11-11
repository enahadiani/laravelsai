<section id="detail-cv" style="display: none;">
    <section id="dektop-4" class="dekstop-4 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12">
                            <div class="glyph-icon iconsminds-left to-detail" id="to-pegawai"></div>
                            <h6 class="card-title-2 text-bold text-medium">Profile Lengkap Pegawai</h6>
                        </div>
                    </div>
                    <div class="card-body box-cv" id="data-detail-karyawan"></div>
                </div>
            </div>
        </div>
    </section>
</section>

<script type="text/javascript">
// LOAD DATA
function generateCVPegawai(nik = null) {
    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-dash/sdm-detail-cv') }}",
        data: {nik: nik},
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.status) {
                var data = result.data.data;
                var html = null;

                if(data[0].no_kontrak == '-') {
                    data[0].tgl_kontrak = '-' 
                    data[0].tgl_kontrak_akhir = '-' 
                }

                html = `
                    <h6 class="text-center">Profile Lengkap Karyawan</h6>
                    <div class="row">
                        <div class="col-9">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 201px;">NIK</td>  
                                        <td>: ${data[0].nik}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama</td>      
                                        <td>: ${data[0].nama}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Jenis Kelamin</td>      
                                        <td>: ${data[0].jk}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Agama</td>      
                                        <td>: ${data[0].nama_agama}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tempat, Tanggal Lahir</td>      
                                        <td>: ${data[0].tempat}, ${data[0].tgl_lahir}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No. NPWP</td>      
                                        <td>: ${data[0].npwp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Provinsi</td>      
                                        <td>: ${data[0].provinsi}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kota/kabupaten</td>      
                                        <td>: ${data[0].kota}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kecamatan</td>      
                                        <td>: ${data[0].kecamatan}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kelurahan</td>      
                                        <td>: ${data[0].kelurahan}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Alamat</td>      
                                        <td>: ${data[0].alamat}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kode POS</td>      
                                        <td>: ${data[0].kode_pos}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor Telepon</td>      
                                        <td>: ${data[0].no_telp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor Handphone</td>      
                                        <td>: ${data[0].no_hp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Email</td>      
                                        <td>: ${data[0].email}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor NPWP</td>      
                                        <td>: ${data[0].npwp}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Bank</td>      
                                        <td>: ${data[0].bank}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Cabang</td>      
                                        <td>: ${data[0].cabang}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor Rekening</td>      
                                        <td>: ${data[0].no_rek}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama Rekening</td>      
                                        <td>: ${data[0].nama_rek}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">No Kontrak</td>      
                                        <td>: ${data[0].no_kontrak}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tanggal Mulai Kontrak</td>      
                                        <td>: ${data[0].tgl_kontrak}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Tanggal Berakhir Kontrak</td>      
                                        <td>: ${data[0].tgl_kontrak_akhir}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Status Menikah</td>      
                                        <td>: ${data[0].status_nikah}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Golongan Darah</td>      
                                        <td>: ${data[0].gol_darah}</td>    
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Skill</td>  
                                        <td>: ${data[0].skill}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Fungsi</td>  
                                        <td>: ${data[0].fungsi}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor BPJS Kesehatan</td>  
                                        <td>: ${data[0].no_bpjs}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nomor BPJS Ketenagakerjaan</td>  
                                        <td>: ${data[0].no_bpjs_kerja}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Atasan Langsung</td>  
                                        <td>: ${data[0].atasan_langsung}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Atasan Tidak Langsung</td>  
                                        <td>: ${data[0].atasan_t_langsung}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama Unit</td>  
                                        <td>: ${data[0].nama_unit}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Nama Profesi</td>  
                                        <td>: ${data[0].nama_profesi}</td>
                                    </tr>
                                </tbody>       
                            </table>    
                            <br />
                            <h6 class="text-note">CLIENT</h6>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td style="width: 201px;">Nama Client</td>  
                                        <td>: ${data[0].client}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Area</td>  
                                        <td>: ${data[0].area}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">Kota</td>  
                                        <td>: ${data[0].kota_area}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">FM</td>  
                                        <td>: ${data[0].fm}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 201px;">BM</td>  
                                        <td>: ${data[0].bm}</td>
                                    </tr>
                                </tbody>       
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
                `;

                $('#data-detail-karyawan').html(html);
            }    
        }
    });
}
// END LOAD DATA
</script>