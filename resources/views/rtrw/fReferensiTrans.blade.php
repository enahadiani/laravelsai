<div class="container-fluid mt-3">
        {{-- <div class="row" id="saku-datatable"> --}}
        <div class="row" id="saku-datatable" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Referensi Transaksi 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
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
                                        <th width="5%">Kode</th>
                                        <th width="40%">Nama</th>
                                        <th width="10%">Akun Debet</th>
                                        <th width="10%">Akun Kredit</th>
                                        <th width="10%">Jenis</th>
                                        <th width="10%">PP</th>
                                        <th width="5%">Action</th>
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
        {{-- <div class="row" id="saku-form" style="display:none;"> --}}
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                <div class="card">
                    <form class="form mb-5" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Referensi Transaksi
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='height:250px !important'>
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-3 col-form-label">Jenis</label>
                                <div class="col-3">
                                    <select required class='form-control selectize' id="jenis" name="jenis" required>
                                    <option value=''>--- Pilih Jenis ---</option>
                                    <option value='PENGELUARAN'>PENGELUARAN</option>
                                    <option value='PEMASUKAN'>PEMASUKAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="kode_ref" class="col-3 col-form-label">Kode Ref</label>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Kode Ref" id="kode_ref" name="kode_ref" required readonly>
                                        <div class="input-group-append">
                                            <button disabled="true" class="btn btn-info" id="getRef" type="button"><i class="mdi mdi-sync"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="deskripsi" class="col-3 col-form-label">Deskripsi</label>
                                <div class="col-7">
                                    <input class="form-control" type="text" placeholder="Deskripsi" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="akun_debet" class="col-3 col-form-label">Akun Debet</label>
                                <div class="input-group col-3">
                                    <input type='text' name="akun_debet" id="akun_debet" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_akun_debet" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="akun_kredit" class="col-3 col-form-label">Akun Kredit</label>
                                <div class="input-group col-3">
                                    <input type='text' name="akun_kredit" id="akun_kredit" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_akun_kredit" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pp" class="col-3 col-form-label">Unit/PP</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_pp" id="kode_pp" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_pp" style="margin-top: 10px;"></label>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        function getRef(jenis){
                $.ajax({
                type: 'GET',
                url: "{{ url('rtrw-master/reftrans-kode') }}/"+jenis,
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.daftar.status){
                        $('#kode_ref').val(result.daftar.kode);
                    }
                },error:function(error) {
                    alert('Terjadi kesalahan')
                }
            });
        }

        $('#form-tambah').on('change', '#jenis', function(){
            $('#getRef').attr('disabled', false);
        });

        $('#form-tambah').on('click', '#getRef', function(){
            var jenis = $('#jenis').val();
            getRef(jenis)
        });

        var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
        var dataTable = $('#table-data').DataTable({
            // 'processing': true,
            // 'serverSide': true,
            'ajax': {
                'url': "{{ url('rtrw-master/reftrans') }}",
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
                            window.location.href = "{{ url('rtrw-auth/login') }}";
                        })
                        return [];
                    }
                }
            },
            'columnDefs': [
                {'targets': 6, data: null, 'defaultContent': action_html }
                ],
            'columns': [
                { data: 'kode_ref' },
                { data: 'nama' },
                { data: 'akun_debet' },
                { data: 'akun_kredit' },
                { data: 'jenis' },
                { data: 'pp' },
            ],
            dom: 'lBfrtip',
            buttons: [
                // {
                //     text: '<i class="fa fa-filter"></i> Filter',
                //     action: function ( e, dt, node, config ) {
                //         openFilter();
                //     },
                //     className: 'btn btn-default ml-2' 
                // }
            ]
        });
    </script>