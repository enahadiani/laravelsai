<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Harga dan Tipe Room 
                            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr style="margin-bottom:0">
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
                            i:hover{
                                cursor: pointer;
                                color: blue;
                            }

                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>Kode Paket</th>
                                        <th>Nama</th>
                                        <th>Kode Curr</th>
                                        <th>Jenis Produk</th>
                                        <th>Aksi</th>
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
                    <form id="form-tambah" style=''>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Jenis Harga Promo Paket
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                                <div class="form-group row ">
								    <label for="kode" class="col-3 col-form-label">Kode</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Kode Paket" id="no_paket" name="no_paket">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Nama Paket" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_produk" class="col-3 col-form-label">Kode Produk</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_produk" id="kode_produk" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_produk" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-3 col-form-label">Jenis Produk</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="jenis" name="jenis">
                                        <option value='' disabled>--- Pilih Jenis ---</option>
                                        <option value='REGULER'>REGULER</option>
                                        <option value='PLUS'>PLUS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tarif_agen" class="col-3 col-form-label">Tarif Agen</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Tarif Agen" id="tarif_agen" name="tarif_agen">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_curr" class="col-3 col-form-label">Currency</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="kode_curr" name="kode_curr">
                                        <option value='' disabled>--- Pilih Currency ---</option>
                                        <option value='IDR'>IDR</option>
                                        <option value='USD'>USD</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#bharga" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Harga</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bjadwal" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Jadwal</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                            <style>
                                th{
                                    vertical-align:middle !important;
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
                            </style>
                             <div class="tab-pane active" id="bharga" role="tab">
                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                    <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                    <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                    <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <style>
                                    #input-harga .selectize-input, #input-harga .form-control, #input-harga .custom-file-label{
                                        border:0 !important;
                                        border-radius:0 !important;
                                    }
                                    #input-harga td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-harga td{
                                        overflow:hidden !important;
                                    }

                                    #input-harga td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-harga" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:5%">Kode</th>
                                        <th style="width:15%">Keterangan</th>
                                        <th style="width:10%">Harga Std</th>
                                        <th style="width:10%">Harga Semi Eks.</th>
                                        <th style="width:10%">Harga Eks.</th>
                                        <th style="width:10%">Fee Agen</th>
                                        <th style="width:10%">Curr</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                                </div>
                                <div class="tab-pane active" id="bjadwal" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                    <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                    <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                    <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <style>
                                    #input-jadwal .selectize-input, #input-jadwal .form-control, #input-jadwal .custom-file-label{
                                        border:0 !important;
                                        border-radius:0 !important;
                                    }
                                    #input-jadwal td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-jadwal td{
                                        overflow:hidden !important;
                                    }

                                    #input-jadwal td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-jadwal" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:15%">Tgl Plan</th>
                                        <th style="width:15%">Tgl Aktual</th>
                                        <th style="width:10%">Lama hari</th>
                                        <th style="width:15%">Q Std</th>
                                        <th style="width:15%">Q Semi Eks</th>
                                        <th style="width:15%">Q Eks</th>
                                        <th style="width:10%">ID</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> 

    <!-- END MODAL -->
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script>
        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

        $('#tarif_agen').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('dago-master/paket') }}",
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
            {'targets': 4, data: null, 'defaultContent': action_html },
            ],
        'columns': [
            { data: 'no_paket' },
            { data: 'nama' },
            { data: 'kode_curr' },
            { data: 'jenis' },
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

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#no_paket').attr('readonly', false);
        $('#kode_curr')[0].selectize.setValue('');
        $('#jenis')[0].selectize.setValue('');
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
            var url = "{{ url('dago-master/type-room') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('dago-master/type-room') }}";
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
                if(result.data.status === 'SUCCESS'){
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
                        window.location.href = "{{ url('/dago-auth/login') }}";
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
                    url: "{{ url('dago-master/type-room') }}/"+id,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status === 'SUCCESS'){
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
                                window.location.href = "{{ url('dago-auth/login') }}";
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

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-master/type-room') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status === 'SUCCESS'){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_type').attr('readonly', true);
                    $('#no_type').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#harga').val(result.data[0].harga);
                    $('#kode_curr')[0].selectize.setValue(result.data[0].kode_curr);
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

    </script>