<div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Master Lokasi 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <!-- <h6 class="card-subtitle">Tabel Pengajuan</h6> -->
                        <hr>
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

                                th{
                                    vertical-align:middle !important;
                                }
                                /* #input-flag td{
                                    padding:0 !important;
                                } */
                                #input-flag .selectize-input, #input-flag .form-control, #input-flag .custom-file-label, #input-keu .selectize-input, #input-keu .form-control, #input-keu .custom-file-label{
                                    border:0 !important;
                                    border-radius:0 !important;
                                }
                                .modal-header .close {
                                    padding: 1rem;
                                    margin: -1rem 0 -1rem auto;
                                }
                                .check-item{
                                    cursor:pointer;
                                }
                                .selected{
                                    cursor:pointer;
                                    background:#4286f5 !important;
                                    color:white;
                                }
                                #input-flag td:hover, #input-keu td:hover{
                                    background:#f4d180 !important;
                                    color:white;
                                }
                                #input-flag td, #input-keu td{
                                    overflow:hidden !important;
                                }

                                #input-flag td:nth-child(4), #input-keu td:nth-child(4){
                                    overflow:unset !important;
                                }
                                i:hover{
                                    cursor: pointer;
                                    color: blue;
                                }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped " width="100%">
                                <thead>
                                    <tr>
                                        <th>Kode Lokasi</th>
                                        <th>Nama</th>
                                        <th>Kota</th>
                                        <th>Kode Pos</th>
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
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="form mb-5" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Data Master Lokasi
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='height:420px !important'>
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="kode_lokasi" class="col-3 col-form-label">Kode Lokasi</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Kode Lokasi" id="kode_lokasi" name="kode_lokasi">
                                </div>
                                <label for="nama" class="col-3 col-form-label">Nama Lokasi</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Nama Lokasi" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="nama" class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                    <input required class="form-control" type="text" placeholder="Alamat" id="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="kota" class="col-3 col-form-label">Kota</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Kota" id="kota" name="kota">
                                </div>
                                <label for="kodepos" class="col-3 col-form-label">Kodepos</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Kodepos" id="kodepos" name="kodepos">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="notelp" class="col-3 col-form-label">Nomor Telepon</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Nomor Telepon" id="notelp" name="notelp">
                                </div>
                                <label for="nofax" class="col-3 col-form-label">Nomor Fax</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Nomor Fax" id="nofax" name="nofax">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="email" class="col-3 col-form-label">Email</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Email" id="email" name="email">
                                </div>
                                <label for="website" class="col-3 col-form-label">Website</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Website" id="website" name="website">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="npwp" class="col-3 col-form-label">NPWP</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="NPWP" id="npwp" name="npwp">
                                </div>
                                <label for="pic" class="col-3 col-form-label">PIC</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="PIC" id="pic" name="pic">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="kode_konsol" class="col-3 col-form-label">Kode Konsol</label>
                                <div class="col-3">
                                    <input required class="form-control" type="text" placeholder="Kode Konsol" id="kode_konsol" name="kode_konsol">
                                </div>
                                <label for="status_konsol" class="col-3 col-form-label">Status Konsol</label>
                                <div class="col-3">
                                    <select required class='form-control selectize' id="status_konsol" name="status_konsol" required>
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='1'>AKTIF</option>
                                    <option value='0'>NON AKTIF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_pkp" class="col-3 col-form-label">Tanggal PKP</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" placeholder="Tanggal PKP" id="tgl_pkp" name="tgl_pkp" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_pusat" class="col-3 col-form-label">Status Pusat</label>
                                <div class="col-3">
                                    <select required class='form-control selectize' id="status_pusat" name="status_pusat" required>
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='1'>AKTIF</option>
                                    <option value='0'>NON AKTIF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Logo</label>
                                <div class="input-group col-6">
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input" id="logo">
                                        <label class="custom-file-label" for="logo">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="slide-history" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <div class="profiletimeline mt-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- MODAL SEARCH-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>
    <script type="text/javascript">
    var $iconLoad = $('.preloader');

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });

    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('rtrw-master/lokasi') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.daftar;   
            }
        },
        'columnDefs': [
            {'targets': 4, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'kode_lokasi' },
            { data: 'nama' },
            { data: 'kota' },
            { data: 'kodepos' }
        ],
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#kode_lokasi').attr('readonly',false);
        $('#method').val('post');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('rtrw-master/lokasi-ubah') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('rtrw-master/lokasi') }}";
            var pesan = "saved";
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
                if(result.data.status){
                    // location.reload();
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                        )
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                 
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('/toko-auth/login') }}";
                    }) 
                }else{
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
            }
        });
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/lokasi-detail') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    var substrTgl = result.data[0].tgl_pkp.substr(1,9) 
                    var splitTgl = substrTgl.split('-');
                    var tahun = splitTgl[0];
                    var bulan = splitTgl[1];
                    var tgl = splitTgl[2];
                    var pkp = tgl+"/"+bulan+"/"+tahun;

                    $('.custom-file-label').html('');
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_lokasi').val(id);
                    $('#id').val(id);
                    $('#kode_lokasi').attr('readonly',true);
                    $('#nama').val(result.data[0].nama);;
                    $('#alamat').val(result.data[0].alamat);
                    $('#kota').val(result.data[0].kota);
                    $('#kodepos').val(result.data[0].kodepos);
                    $('#notelp').val(result.data[0].no_telp);
                    $('#nofax').val(result.data[0].no_fax);
                    $('#email').val(result.data[0].email);
                    $('#website').val(result.data[0].website);
                    $('#npwp').val(result.data[0].npwp);
                    $('#pic').val(result.data[0].pic);
                    $('#tgl_pkp').val(pkp);
                    $('#kode_konsol').val(result.data[0].kode_lokkonsol);
                    $('#status_konsol')[0].selectize.setValue(result.data[0].flag_konsol);
                    $('#status_pusat')[0].selectize.setValue(result.data[0].flag_pusat);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('saku/login') }}";
                    })
                }
                $iconLoad.hide();
            }
        });
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
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('rtrw-master/lokasi') }}/"+id,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                        }else if(!result.data.status && result.data.message == "Unauthorized"){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('rtrw-auth/login') }}";
                            })
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                });
                
            }else{
                return false;
            }
        })
    });
    </script>