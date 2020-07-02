    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Stok Opname 
                            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .form-group{
                                margin-bottom:15px !important;
                            }
                            
                            .dataTables_wrapper{
                                padding:5px
                            }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
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
                    <div class="card-body pb-0">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Stok Opname
                        <button type="button" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <div id="loading-bar" class="float-right" style="display:none;"><button type="button" disabled="" class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button></div>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body table-responsive pt-0" style='height:441px'>
                        <form class="form" id="form-tambah" style=''>
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class='form-control' type="date" id="tanggal" name="tanggal" value="<?=date('Y-m-d')?>">
                                </div>
                                <div class="col-2">
                                </div>
                                <div class="col-3" style="display:none">
                                    <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Deskripsi" id="deskripsi" name="deskripsi">
                                </div>
                                <div class="col-1">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="kode_gudang" class="col-2 col-form-label">Gudang</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_gudang" name="kode_gudang">
                                    <option value=''>--- Pilih Gudang ---</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                   
                                </div>
                                <div class='col-4 pull-right'>
                                    <button type="button" class="btn btn-info ml-2" id="btn-rekon" style="float:right;">Rekon</button>
                                    <button type="button" class="btn btn-info ml-2" id="btn-load" style="float:right;">Load</button>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#sistem" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Item Barang</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#fisik" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Jumlah Fisik</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#error_tab" role="tab" aria-selected="false"><span class="hidden-xs-down">Error Upload</span></a> </li>
                                <li class="nav-item ml-auto"> <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="file_dok" name="file_dok">
                                <label class="custom-file-label form-control" for="file_dok" name="file_dok" data-browse="Browse" style="color: grey;font-style: italic;">Upload File .xls</label>
                                </div></li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="sistem" role="tabpanel">
                                    <div class='col-xs-12' style='overflow-y: scroll; height:230px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed" id="input-grid" width="100%">
                                        <style>
                                            th{
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Kode Barang</th>
                                                <th width="25%">Nama</th>
                                                <th width="10%">Satuan</th>
                                                <th width="10%">Stok Sistem</th>
                                                <th width="10">Stok Fisik</th>
                                                <th width="10">Selisih</th>
                                                <th width="20">Barcode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="fisik" role="tabpanel">
                                    <div class='col-xs-12' style='overflow-y: scroll; height:230px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed" id="input-grid2" width="100%">
                                        <style>
                                            th{
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Kode Barang</th>
                                                <th width="40%">Jumlah Fisik</th>                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>      
                                </div>
                                <div class="tab-pane" id="error_tab" role="tabpanel">
                                    <div class='col-xs-12' style='overflow-y: scroll; height:230px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed" id="input-error" width="100%">
                                        <style>
                                            th{
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="30%">Kode Barang</th>
                                                <th width="40%">Error Message</th>                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>      
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script type="text/javascript">
        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
        var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('toko-trans/stok-opname') }}",
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
                        window.location.href = "{{ url('toko-auth/login') }}";
                    })
                    return [];
                    }
                }
            },
            'columnDefs': [
                {'targets': 3, data: null, 'defaultContent': action_html },
                ],
            'columns': [
                // { data: 'kode_gudang' },
                // { data: 'nama' },
                // { data: 'alamat' },
                // { data: 'telp' },
                // { data: 'pic' },
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