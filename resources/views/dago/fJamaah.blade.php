
<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size:16px">Data Jamaah 
                        <button type="button" id="btn-jamaah-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        <button type="button" id="btn-jamaah-singkat-tambah" class="btn btn-primary ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah Jamaah Singkat</button>
                        </h4>
                        <hr style="margin-bottom:0px;margin-top:25px">
                        <div class="table-responsive ">
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .hidden{
                                display:none;
                            }
                            .form-group{
                                margin-bottom:5px !important;
                            }
                            .form-control{
                                font-size:13px !important;
                                padding: .275rem .6rem !important;
                            }
                            .selectize-control, .selectize-dropdown{
                                padding: 0 !important;
                            }

                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Jamaah</th>
                                        <th>ID Jamaah</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="form-tambah-jamaah" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" id="form-tambah">
                            <h4 class="card-title mb-2" style="font-size:16px">Form Data Jamaah
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-jamaah-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr style="margin-bottom:0px;margin-top:25px">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-3">
                                    <input class="form-control" type="hidden" placeholder="No Jamaah" id="no_peserta" name="no_peserta" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="id_peserta" class="col-3 col-form-label">No KTP</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan No KTP Jamaah" id="id_peserta" name="id_peserta" required minlength="16" maxlength="16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Jamaah" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat" class="col-3 col-form-label">Tempat Lahir</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan Tempat Lahir Jamaah" id="tempat" name="tempat" required>
                                </div>
                                <label for="tgl_lahir" class="col-3 col-form-label">Tgl Lahir</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text"  id="tgl_lahir" name="tgl_lahir" required placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jk" class="col-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-3">
                                    <select class='form-control' id="jk" name="jk" required>
                                    <option value=''>--- Pilih Jenis Kelamin ---</option>
                                    <option value='Laki-laki'>Laki-laki</option>
                                    <option value='Perempuan'>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-3 col-form-label">Status</label>
                                <div class="col-3">
                                    <select class='form-control' id="status" name="status" required>
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='Menikah'>Menikah</option>
                                    <option value='Belum Menikah'>Belum Menikah</option>
                                    <option value='Cerai Hidup'>Cerai Hidup</option>
                                    <option value='Cerai Mati'>Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pendidikan" class="col-3 col-form-label">Pendidikan Terakhir</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Masukkan Pendidikan Terakhir" id="pendidikan" name="pendidikan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ibu" class="col-3 col-form-label">Nama Ibu</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Ibu" id="ibu" name="ibu" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ibu" class="col-3 col-form-label">Nama Ayah</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Ayah" id="ayah" name="ayah" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Masukkan Alamat" id="alamat" name="alamat" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pos" class="col-3 col-form-label">Kode POS</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan Kode POS" id="kode_pos" name="kode_pos" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp" class="col-3 col-form-label">No Telp</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="No Telepon Jamaah" id="telp" name="telp">
                                </div>
                                <label for="hp" class="col-3 col-form-label">No HP</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="No HP Jamaah" id="hp" name="hp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-3 col-form-label">Email</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan Email" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pekerjaan" class="col-3 col-form-label">Pekerjaan</label>
                                <div class="col-3">
                                    <select class='form-control' id="pekerjaan" name="pekerjaan" required>
                                    <option value=''>--- Pilih Pekerjaan ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bank" class="col-3 col-form-label">Bank</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan Bank" id="bank" name="bank" required>
                                </div>
                                <label for="norek" class="col-3 col-form-label">No Rekening</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan No Rekening Bank" id="norek" name="norek" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cabang" class="col-3 col-form-label">Cabang</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan Cabang" id="cabang" name="cabang" required>
                                </div>
                                <label for="namarek" class="col-3 col-form-label">Nama Rekening</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Rekening" id="namarek" name="namarek" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nopass" class="col-3 col-form-label">No Passport</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Masukkan No Passport" id="nopass" name="nopass" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="issued" class="col-3 col-form-label">Issued</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" id="issued" name="issued" required placeholder="dd/mm/yyyy">
                                </div>
                                <label for="ex_pass" class="col-3 col-form-label">Expired</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" id="ex_pass" name="ex_pass" required placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kantor_mig" class="col-3 col-form-label">Kantor Imigrasi</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" id="kantor_mig" name="kantor_mig" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ec_telp" class="col-3 col-form-label">Telp Emergency</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="No Telepon Emergency" id="ec_telp" name="ec_telp" required>
                                </div>
                                <label for="ec_hp" class="col-3 col-form-label">HP Emergency</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="No HP Emergency" id="ec_hp" name="ec_hp" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sp" class="col-3 col-form-label">Status Pemesanan</label>
                                <div class="col-3">
                                    <select class='form-control' id="sp" name="sp" required>
                                    <option value=''>--- Pilih Status Pemesanan ---</option>
                                    <option value='Belum Pernah'>Belum Pernah</option>
                                    <option value='Pernah'>Pernah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="th_haji" class="col-3 col-form-label">Th Haji Terakhir dengan Dago</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Tahun Haji Terakhir" id="th_haji" name="th_haji">
                                </div>
                                <label for="th_umroh" class="col-3 col-form-label">Umroh Terakhir dengan Dago</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Tahun Umroh Terakhir" id="th_umroh" name="th_umroh">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="brkt_dgn" class="col-3 col-form-label">Berangkat Dengan</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Berangkat Dengan" id="brkt_dgn" name="brkt_dgn">
                                </div>
                                <label for="hubungan" class="col-3 col-form-label">Hubungan</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Hubungan" id="hubungan" name="hubungan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Foto</label>
                                <div class="input-group col-9">
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="foto">
                                        <label class="custom-file-label" for="foto">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="preview col-3">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                <div class="row" id="form-tambah-jamaah-singkat" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" id="form-tambah-singkat">
                            <h4 class="card-title mb-2" style="font-size:16px">Form Data Jamaah Singkat
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save-singkat"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-jamaah-kembali-singkat" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr style="margin-bottom:0px;margin-top:25px">
                            <div class="form-group row" id="row-id-singkat">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id_singkat" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="id_peserta" class="col-3 col-form-label">No KTP</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Masukkan No KTP Jamaah" id="id_peserta_singkat" name="id_peserta" required minlength="16" maxlength="16">
                                    <div class="error-message" style="display: none;">
                                        <p id="message-error" style="color: red; margin-bottom:0; padding-bottom:0;"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Jamaah" id="nama_singkat" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telp" class="col-3 col-form-label">No Telp</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="No Telepon Jamaah" id="telp_singkat" name="telp">
                                </div>
                            </div>
                            <div id="singkat-data" style="display: none;">
                                <input class="form-control" type="hidden" name="no_peserta" readonly>
                                <input type="hidden" name="tempat" value="-">
                                <input type="hidden" name="tgl_lahir" value="{{date('d/m/Y')}}">
                                <input type="hidden" name="email" value="dummy@gmail.com">
                                <input type="hidden" name="jk" value="Laki-laki">
                                <input type="hidden" name="status" value="Belum Menikah">
                                <input type="hidden" name="alamat" value="-">
                                <input type="hidden" name="ayah" value="-">
                                <input type="hidden" name="brkt_dgn" value="-">
                                <input type="hidden" name="hubungan" value="-">
                                <input type="hidden" name="ibu" value="-">
                                <input type="hidden" name="pekerjaan" value="-">
                                <input type="hidden" name="pendidikan" value="-">
                                <input type="hidden" name="bank" value="-">
                                <input type="hidden" name="norek" value="-">
                                <input type="hidden" name="cabang" value="-">
                                <input type="hidden" name="norek" value="-">
                                <input type="hidden" name="hp" value="-">
                                <input type="hidden" name="kode_pos" value="-">
                                <input type="hidden" name="namarek" value="-">
                                <input type="hidden" name="nopass" value="-">
                                <input type="hidden" name="issued" value="{{date('d/m/Y')}}">
                                <input type="hidden" name="ex_pass" value="{{date('d/m/Y')}}">
                                <input type="hidden" name="kantor_mig" value="-">
                                <input type="hidden" name="ec_telp" value="-">
                                <input type="hidden" name="ec_hp" value="-">
                                <input type="hidden" name="kantor_mig" value="-">
                                <input type="hidden" name="sp" value="Belum Pernah">
                                <input type="hidden" name="th_haji" value="-">
                                <input type="hidden" name="th_umroh" value="-">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>           
    <script>
    function reverseDateNew(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function getPekerjaan(){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-master/pekerjaan') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#pekerjaan').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].id_pekerjaan + ' - ' + result.daftar[i].nama, value:result.daftar[i].id_pekerjaan}]);
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
    }

    getPekerjaan();
   
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
    $('#jk').selectize();    
    $('#status').selectize();    
    $('#sp').selectize();

    $('#saku-datatable').on('click', '#btn-jamaah-tambah', function(){
        $('#row-id').hide();
        $('#form-tambah')[0].reset();
        $('#id').val('');
        $('.preview').html('');
        $('#saku-datatable').hide();
        $('#form-tambah-jamaah').show();
    });

    $('#saku-datatable').on('click', '#btn-jamaah-singkat-tambah', function(){
        $('#row-id-singkat').hide();
        $('#form-tambah-singkat')[0].reset();
        $('#id_singkat').val('');
        $('#saku-datatable').hide();
        $('#form-tambah-jamaah-singkat').show();
        $('#form-tambah-jamaah').hide();
    });

    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    })

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();

        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/jamaah-detail') }}",
            dataType: 'json',
            async:false,
            data: {'no_peserta':id},
            success:function(result){
                if(result.data.status == "SUCCESS"){
                    $('#id').val('edit');
                    $('#no_peserta').val(result.data.data[0].no_peserta);
                    $('#id_peserta').val(result.data.data[0].id_peserta);
                    $('#nama').val(result.data.data[0].nama);
                    $('#tempat').val(result.data.data[0].tempat); 
                    $('#tgl_lahir').val(reverseDateNew(result.data.data[0].tgl_lahir,'-','/'));
                    $('#jk')[0].selectize.setValue(result.data.data[0].jk);
                    $('#status')[0].selectize.setValue(result.data.data[0].status); 
                    $('#ibu').val(result.data.data[0].ibu);
                    $('#ayah').val(result.data.data[0].ayah);
                    $('#alamat').val(result.data.data[0].alamat);
                    $('#kode_pos').val(result.data.data[0].kode_pos); 
                    $('#telp').val(result.data.data[0].telp);
                    $('#hp').val(result.data.data[0].hp);
                    $('#email').val(result.data.data[0].email);
                    $('#pekerjaan')[0].selectize.setValue(result.data.data[0].pekerjaan);
                    $('#bank').val(result.data.data[0].bank);
                    $('#norek').val(result.data.data[0].norek);
                    $('#cabang').val(result.data.data[0].cabang);
                    $('#namarek').val(result.data.data[0].namarek);
                    $('#nopass').val(result.data.data[0].nopass);
                    $('#issued').val(reverseDateNew(result.data.data[0].issued,'-','/'));
                    $('#ex_pass').val(reverseDateNew(result.data.data[0].ex_pass,'-','/'));
                    $('#kantor_mig').val(result.data.data[0].kantor_mig);
                    $('#ec_telp').val(result.data.data[0].ec_telp);
                    $('#ec_hp').val(result.data.data[0].ec_hp);
                    $('#sp')[0].selectize.setValue(result.data.data[0].sp); 
                    $('#th_haji').val(result.data.data[0].th_haji);
                    $('#th_umroh').val(result.data.data[0].th_umroh);
                    $('#brkt_dgn').val(result.data.data[0].brkt_dgn);
                    $('#hubungan').val(result.data.data[0].hubungan);
                    $('#pendidikan').val(result.data.data[0].pendidikan);
                    var html = "<img style='width:120px' src='"+result.data.data[0].foto+"'>";
                    $('.preview').html(html);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#form-tambah-jamaah').show();
                } else if(result.data.status != "SUCCESS" && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
    });

    $('#form-tambah-jamaah').on('change', '#id_peserta', function(){
        var id= $('#id_peserta').val();

        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/jamaah-detail-id') }}",
            dataType: 'json',
            async:false,
            data: {'id_peserta':id},
            success:function(result){
                if(result.data.status == "SUCCESS"){
                    if(id == ""){
                        $('#id').val('');
                        $('#form-tambah')[0].reset();
                    }else if (result.data.data.length == 0) {
                        $('#id').val('');
                        $('#form-tambah')[0].reset();
                        $('#id_peserta').val(id);
                    }else if (result.data.data[0].id_peserta=='') {
                        $('#id').val('');
                        $('#form-tambah')[0].reset();
                        $('#id_peserta').val(id);
                    }else{
                        $('#id').val('edit');
                        $('#no_peserta').val(result.data.data[0].no_peserta);
                        $('#id_peserta').val(result.data.data[0].id_peserta);
                        $('#nama').val(result.data.data[0].nama);
                        $('#tempat').val(result.data.data[0].tempat); 
                        $('#tgl_lahir').val(reverseDateNew(result.data.data[0].tgl_lahir,'-','/'));
                        $('#jk')[0].selectize.setValue(result.data.data[0].jk);
                        $('#status')[0].selectize.setValue(result.data.data[0].status); 
                        $('#ibu').val(result.data.data[0].ibu);
                        $('#ayah').val(result.data.data[0].ayah);
                        $('#alamat').val(result.data.data[0].alamat);
                        $('#kode_pos').val(result.data.data[0].kode_pos); 
                        $('#telp').val(result.data.data[0].telp);
                        $('#hp').val(result.data.data[0].hp);
                        $('#email').val(result.data.data[0].email);
                        $('#pekerjaan')[0].selectize.setValue(result.data.data[0].pekerjaan);
                        $('#bank').val(result.data.data[0].bank);
                        $('#norek').val(result.data.data[0].norek);
                        $('#cabang').val(result.data.data[0].cabang);
                        $('#namarek').val(result.data.data[0].namarek);
                        $('#nopass').val(result.data.data[0].nopass);
                        $('#issued').val(reverseDateNew(result.data.data[0].issued,'-','/'));
                        $('#ex_pass').val(reverseDateNew(result.data.data[0].ex_pass,'-','/'));
                        $('#kantor_mig').val(result.data.data[0].kantor_mig);
                        $('#ec_telp').val(result.data.data[0].ec_telp);
                        $('#ec_hp').val(result.data.data[0].ec_hp);
                        $('#sp')[0].selectize.setValue(result.data.data[0].sp); 
                        $('#th_haji').val(result.data.data[0].th_haji);
                        $('#th_umroh').val(result.data.data[0].th_umroh);
                        $('#pendidikan').val(result.data.data[0].pendidikan);
                        var html = "<img style='width:120px' src='"+result.data.data[0].foto+"'>";
                        $('.preview').html(html);
                        $('#row-id').show();
                        $('#saku-datatable').hide();
                        $('#form-tambah-jamaah').show();
                    }
                }
                else if(result.data.status != "SUCCESS" && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }else{
                    $('#form-tambah')[0].reset();
                    $('#id').val('');
                    $('.preview').html('');
                    $('#id_peserta').val(id);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
    });


    $('#form-tambah-jamaah').on('click', '#btn-jamaah-kembali', function(){
        $('#saku-datatable').show();
        $('#form-tambah-jamaah').hide();
        $('#form-tambah-jamaah-singkat').hide();
    });

    $('#form-tambah-jamaah-singkat').on('click', '#btn-jamaah-kembali-singkat', function(){
        $('#saku-datatable').show();
        $('#form-tambah-jamaah').hide();
        $('#form-tambah-jamaah-singkat').hide();
    });

    $('#form-tambah-jamaah-singkat').on('change', '#id_peserta_singkat', function(){
        $.ajax({
            type:'GET',
            url:"{{ url('dago-trans/cek-ktp') }}/" + $(this).val(),
            dataType: 'json',
            async:false,
            success: function(result){
                var status = result.data.status;
                if(status === "FAILED"){
                    $('.error-message').show();
                    $('#message-error').text(result.data.message)
                }else {
                    $('.error-message').hide();
                    $('#message-error').text('')    
                }
            }

        });
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('dago-trans/jamaah') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html }
        ],
        'columns': [
            { data: 'no_peserta' },
            { data: 'id_peserta' },
            { data: 'nama' },
            { data: 'jk' },
            { data: 'status' },
            { data: 'action' }
        ]
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var kode = $(this).closest('tr').find('td:eq(0)').html();        
                
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('dago-trans/jamaah') }}",
                    dataType: 'json',
                    async:false,
                    data: {'no_peserta':kode},
                    success:function(result){
                        if(result.data.status == "SUCCESS"){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                        }
                        else if(result.data.status != "SUCCESS" && result.data.message == 'Unauthorized'){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('dago-auth/login') }}";
                            })
                        }
                        else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {       
                        if(jqXHR.status==422){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+jqXHR.responseText+'</a>'
                            })
                        }
                    }
                });
                
            }else{
                return false;
            }
        })
    });

    $('#form-tambah-jamaah').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        if(parameter==''){
            var url = "{{ url('dago-trans/jamaah') }}";
            var pesan = "saved";
        }else{
            
            var url = "{{ url('dago-trans/jamaah-ubah') }}";
            var pesan = "updated";
        }

        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }

        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                // alert('Input data '+result.message);
                if(result.data.status == "SUCCESS"){
                    // location.reload();
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                        )
                        $('#saku-datatable').show();
                        $('#form-tambah-jamaah').hide();
                        
                }
                else if(result.data.status != "SUCCESS" && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
        
    });

    $('#form-tambah-jamaah-singkat').on('submit', '#form-tambah-singkat', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $.ajax({
            type: 'POST',
            url: "{{ url('dago-trans/jamaah') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                // alert('Input data '+result.message);
                if(result.data.status == "SUCCESS"){
                    // location.reload();
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+result.data.message,
                        'success'
                        )
                        $('#saku-datatable').show();
                        $('#form-tambah-jamaah').hide();
                        $('#form-tambah-jamaah-singkat').hide();
                        
                }
                else if(result.data.status != "SUCCESS" && result.data.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan!',
                        footer: '<a href>'+result.data.message+'</a>'
                    })
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==400){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
    });

    $('#id_peserta,#nama,#tempat,#tgl_lahir,#jk,#status,#pendidikan,#ibu,#alamat,#kode_pos,#telp,#hp,#email,#pekerjaan,#bank,#norek,#cabang,#namarek,#nopass,#issued,#ex_pass,#kantor_mig,#ec_telp,#ec_hp,#sp,#th_haji,#th_umroh,#foto').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['id_peserta','nama','tempat','tgl_lahir','jk','status','ibu','alamat','kode_pos','telp','hp','email','pekerjaan','bank','norek','cabang','namarek','nopass','issued','ex_pass','kantor_mig','ec_telp','ec_hp','sp','th_haji','th_umroh','foto'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 4 || idx == 5 || idx == 23){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
                
                $('#'+nxt[idx]).focus();
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    </script>