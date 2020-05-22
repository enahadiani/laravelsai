<!-- <link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet"> -->
<div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data PP 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <style>
                                td,th{
                                    padding:8px !important;
                                    vertical-align:center;
                                }
                               
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>Kode PP</th>
                                        <th>Nama</th>
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
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <form class="form" id="form-tambah" style='margin-bottom:100px' method="POST">
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Form
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0" style='height:450px'>
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="hidden" id="id" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_pp" class="col-3 col-form-label">Kode</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Kode PP" id="kode_pp" name="kode_pp" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Nama PP" id="nama" name="nama">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="flag_aktif" class="col-3 col-form-label">Status Aktif</label>
                                    <div class="col-3">
                                        <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                        <option value=''>--- Pilih Status Aktif ---</option>
                                        <option value='1'>Aktif</option>
                                        <option value='0'>Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="saku-update" style="display:none;">
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <form class="form" id="form-update" style='margin-bottom:100px' method="POST">
                        @method('put')
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Form
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Update</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0" style='height:450px'>
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="hidden" id="id_edit" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_pp_edit" class="col-3 col-form-label">Kode</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Kode PP" id="kode_pp_edit" name="kode_pp" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_edit" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Nama PP" id="nama_edit" name="nama">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="flag_aktif_edit" class="col-3 col-form-label">Status Aktif</label>
                                    <div class="col-3">
                                        <select class='form-control selectize' id="flag_aktif_edit" name="flag_aktif">
                                        <option value=''>--- Pilih Status Aktif ---</option>
                                        <option value='1'>Aktif</option>
                                        <option value='0'>Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>           
    
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#flag_aktif').selectize();
    $('#flag_aktif_edit').selectize();

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#form-update')[0].reset();
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/pp') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    if(result.data.data.length > 0){
                        $('#id_edit').val('edit');
                        $('#kode_pp_edit').val(id);
                        $('#nama_edit').val(result.data.data[0].nama);
                        $('#flag_aktif_edit')[0].selectize.setValue(result.data.data[0].flag_aktif);
                        $('#saku-datatable').hide();
                        $('#saku-form').hide();
                        $('#saku-update').show();
                    }
                }
            }
        });
    });




    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('#saku-update').hide();
    });

    $('#saku-update').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('#saku-update').hide();
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        ajax: {
            url: "{{ url('saku/pp') }}" ,
            data: {},
            async:false,
            type: 'GET',
            dataSrc : function(json) {
                return json.daftar;   
            }
        },
        columnDefs: [
            {targets: 3, data: null, defaultContent: action_html }
        ],
        columns: [
            { data: 'kode_pp' },
            { data: 'nama' },
            { data: 'flag_aktif' },
        ],
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        if(confirm('Apakah anda ingin menghapus data ini?')){
            var kode = $(this).closest('tr').find('td:eq(0)').html();         
            
            $.ajax({
                type: 'DELETE',
                url: "{{ url('saku/pp') }}/"+kode,
                dataType: 'json',
                async:false,
                success:function(result){
                    alert('Penghapusan data '+result.data.message);
                    if(result.data.status){
                        dataTable.ajax.reload();
                    }
                }
            });
        }else{
            return false;
        }
    });   

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        $.ajax({
            type: 'POST',
            url: "{{ url('saku/pp') }} ",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                alert('Input data '+result.data.message);
                if(result.data.status){
                    dataTable.ajax.reload();
                    $('#saku-datatable').show();
                    $('#saku-form').hide();
                    $('#saku-update').hide();
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        
    });

    $('#saku-update').on('submit', '#form-update', function(e){
    e.preventDefault();
        
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        var id = $('#kode_pp_edit').val();
        $.ajax({
            type: 'POST',
            url: "{{ url('saku/pp') }}/"+id,
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                alert('Input data '+result.data.message);
                if(result.data.status){
                    dataTable.ajax.reload();
                    $('#saku-datatable').show();
                    $('#saku-form').hide();
                    $('#saku-update').hide();
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        
    });

    $('#kode_pp,#nama,#flag_aktif').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','nama','flag_aktif'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2){
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

    $('#kode_pp_edit,#nama_edit,#flag_aktif_edit').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp_edit','nama_edit','flag_aktif_edit'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2){
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