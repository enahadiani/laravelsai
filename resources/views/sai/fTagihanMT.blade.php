<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="min-height: 560px;">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Tagihan Maintenance 
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
                                        <th>No Tagihan</th>
                                        <th>No Dokumen</th>
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                        <th>Nilai PPN</th>
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
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Data Tagihan Maintenance
                            <button id="btn-loading" class="btn btn-success ml-2"  style="float:right; display:none;" disabled><i class="fa fa-save"></i> Loading</button>
                            <button type="submit" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> <span>Simpan</span></button>
                            <button type="button" id="btn-load" class="btn btn-primary ml-2"  style="float:right;" ><i class="fa fa-database"></i> <span>Load Data</span></button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style="min-height: 560px;">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                           <div class="form-group row no_tagihan">
                                <label for="no_tagihan" class="col-3 col-form-label">No Tagihan</label>
                                <div class="input-group col-3">
                                    <input type='text' name="no_tagihan" id="no_tagihan" class="form-control" value="" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_dokumen" class="col-3 col-form-label">No Dokumen</label>
                                <div class="input-group col-3">
                                    <input type='text' name="no_dokumen" id="no_dokumen" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" placeholder="Tanggal" id="tanggal" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                 <label for="bank" class="col-3 col-form-label">Bank</label>
                                <div class="input-group col-3">
                                    <input class="form-control" type="text" placeholder="Bank" id="bank" name="bank">
                                </div>
                                <label for="cabang" class="col-3 col-form-label">Cabang</label>
                                <div class="input-group col-3">
                                    <input class="form-control" type="text" placeholder="Cabang" id="cabang" name="cabang">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_rek" class="col-3 col-form-label">No Rek</label>
                                <div class="input-group col-3">
                                    <input class="form-control" type="text" placeholder="No Rek" id="no_rek" name="no_rek">
                                </div>
                                <label for="nama_rek" class="col-3 col-form-label">Nama Rek</label>
                                <div class="input-group col-3">
                                    <input class="form-control" type="text" placeholder="Nama Rek" id="nama_rek" name="nama_rek">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai" class="col-3 col-form-label">Nilai Tagihan</label>
                                <div class="input-group col-3">
                                    <input class="form-control currency" type="text" placeholder="Nilai Tagihan" id="total_nilai" name="total_nilai" readonly>
                                </div>
                                <label for="nilai_ppn" class="col-3 col-form-label">Nilai PPN</label>
                                <div class="input-group col-3">
                                    <input class="form-control currency" type="text" placeholder="Nilai PPN" id="total_nilai_ppn" name="total_nilai_ppn" readonly>
                                </div>
                            </div> 
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#bitem" role="tab" aria-selected="true"><span class="hidden-xs-down">Rincian</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bupload" role="tab" aria-selected="true"><span class="hidden-xs-down">Dokumen</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="bitem" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
                                        {{-- <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a> --}}
                                    </div>
                                    <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                        <style>
                                            th{
                                                vertical-align:middle !important;
                                            }
                                            /* #input-jurnal td{
                                                padding:0 !important;
                                            } */
                                            #input-jurnal .selectize-input, #input-jurnal .form-control, #input-jurnal .custom-file-label{
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
                                            #input-jurnal td:hover{
                                                background:#f4d180 !important;
                                                color:white;
                                            }
                                            #input-jurnal td{
                                                overflow:hidden !important;
                                            }

                                            #input-jurnal td:nth-child(4){
                                                overflow:unset !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid1" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#ff9500;color:white">
                                            <tr>
                                                <th style="width:5%">No</th>
                                                <th style="width:30%">Customer</th>
                                                <th style="width:20%">No Kontrak</th>
                                                <th style="width:15%">Item</th>
                                                <th style="width:15%">Nilai</th>
                                                <th style="width:15%">PPN</th>
                                                {{-- <th style="width:5%"></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bupload" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row2" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                    </div>
                                    <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                        <style>
                                            th{
                                                vertical-align:middle !important;
                                            }
                                            /* #input-jurnal td{
                                                padding:0 !important;
                                            } */
                                            #input-jurnal .selectize-input, #input-jurnal .form-control, #input-jurnal .custom-file-label{
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
                                            #input-jurnal td:hover{
                                                background:#f4d180 !important;
                                                color:white;
                                            }
                                            #input-jurnal td{
                                                overflow:hidden !important;
                                            }

                                            #input-jurnal td:nth-child(4){
                                                overflow:unset !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#ff9500;color:white">
                                            <tr>
                                                <th style="width:10%">No</th>
                                                <th style="width:40%">Nama Dokumen</th>
                                                <th style="width:40%">Upload File</th>
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
    <!-- END MODAL -->
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script>
        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
        });

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('sai-trans/tagihan-maintain') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    if(json.daftar.length > 0){
                    return json.daftar;   
                    }else {
                    return [];
                    }   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html },
             {
                'targets': [4,3],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            }
            ],
        'columns': [
            { data: 'no_bill' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai' },
            { data: 'nilai_ppn' },
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
        $('.no-tagihan').hide();
        $('#method').val('post');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#saku-form').on('click', '#btn-load', function(){
        var btnTextLoad = $('#btn-load span');
        var btnLoad = $('#btn-load');
        var btnSave = $('#btn-simpan');

        $.ajax({
            type: 'GET',
            url: "{{ url('sai-trans/tagihan-maintain-load') }}",
            dataType: 'json',
            async:true,
            beforeSend:function(){
                console.log('beforeSend')
                btnLoad.attr('disabled', true);
                btnSave.attr('disabled', true);
                btnTextLoad.text('Loading..');
            }, 
            complete:function(){
                console.log('complete')
                btnLoad.attr('disabled', false);
                btnSave.attr('disabled', false);
                btnTextLoad.text('Load Data');
            },
            success:function(res){
                var result= res.daftar;
                if(result.length > 0) {
                    var no = 1;
                    var input = "";
                    for(var i=0;i<result.length;i++){
                        var line = result[i];
                        input += "<tr class='row-grid1'>";
                        input += "<td class='no-grid1 text-center'>"+no+"</td>";
                        input += "<td><input type='text' name='cust[]' value='"+line.cust+"' class='form-control' readonly></td>";
                        input += "<td><input type='text' name='no_kontrak[]' value='"+line.no_kontrak+"' class='form-control' readonly></td>";
                        input += "<td><input type='text' name='item[]' value='"+line.item+"' class='form-control' readonly></td>";
                        input += "<td><input type='text' name='nilai[]' class='form-control inp-tagihan nilai nilaike"+no+"'  value='"+parseFloat(line.nilai)+"' required readonly></td>";
                        input += "<td><input type='text' name='nilai_ppn[]' class='form-control inp-tagihan nilai_ppn nilai_ppnke"+no+"'  value='"+parseFloat(line.nilai_ppn)+"' required readonly></td>";
                        input += "</tr>";
                        no++;
                    }
                    $('#input-grid1 tbody').append(input);
                    $('.inp-tagihan').inputmask("numeric", {
                        radixPoint: ",",
                        groupSeparator: ".",
                        digits: 2,
                        autoGroup: true,
                        rightAlign: true,
                        onCleared: function () { self.Value(''); }
                    });
                }
            },
            error: function(xhr, status, error){
                var err = eval("(" + xhr.responseText + ")");
                btnTextLoad.text('Load Data');
                btnSave.attr('disabled', false);
                btnLoad.attr('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan pada server!',
                    footer: err.message
                })
            },
        });
    });

    $('#form-tambah').on('click', '#add-row2', function(){
        var no2=$('#input-grid2 .row-grid2:last').index();
        no2=no2+2;
        var input2 = "";
        input2 += "<tr class='row-grid2'>";
        input2 += "<td class='no-grid2 text-center'>"+no2+"</td>";
        input2 += "<td><span>-</span><input type='hidden' name='nama_file[]' value='-' class='inp-file_dok' readonly></td>";
        input2 += "<td><input type='file' name='file_dok[]' required  class='inp-file_dok'></td>";
        input2 += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item2' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input2 += "</tr>";
        $('#input-grid2 tbody').append(input2);
    });

    $('#input-grid2').on('click', '.hapus-item2', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid2').each(function(){
            var nom = $(this).closest('tr').find('.no-grid2');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        var btnTextSave = $('#btn-simpan span');
        var btnSave = $('#btn-simpan');
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('sai-master/modul-ubah') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('sai-master/modul') }}";
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
            async:true,
            contentType: false,
            cache: false,
            processData: false, 
            beforeSend:function(){
                console.log('beforeSend')
                btnSave.attr('disabled', true);
                btnTextSave.text('Loading..');
            }, 
            complete:function(){
                console.log('complete')
                btnSave.attr('disabled', false);
                btnTextSave.text('Simpan');
            },
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
                        window.location.href = "{{ url('/sai-auth/login') }}";
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
            error: function(xhr, status, error){
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat field form yang kosong!',
                    footer: err.message
                })
            },
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
                    url: "{{ url('sai-master/modul') }}/"+id,
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
                                window.location.href = "{{ url('sai-auth/login') }}";
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
            url: "{{ url('sai-master/modul') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('.kode-modul').show();
                    $('#kode_modul').val(id);
                    $('#id').val(id);
                    $('#kode_modul').attr('readonly',true);
                    $('#nama').val(result.data[0].nama);
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
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                }
                $iconLoad.hide();
            }
        });
    });

    </script>