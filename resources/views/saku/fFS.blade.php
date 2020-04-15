<!-- <link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet"> -->
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data FS 
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
                                        <th>Kode FS</th>
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
                    <div class="card-body pb-0">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Form
                        <button type="button" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body table-responsive pt-0" style='height:450px'>
                            <form class="form" id="form-tambah" style='margin-bottom:100px'>
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="hidden" id="id_edit" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_fs" class="col-3 col-form-label">Kode</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Kode FS" id="kode_fs" name="kode_fs" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Nama FS" id="nama" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_awal" class="col-3 col-form-label">Tgl Awal</label>
                                    <div class="col-9">
                                        <input class="form-control" type="date" placeholder="Tgl Awal" id="tgl_awal" name="tgl_awal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_akhir" class="col-3 col-form-label">Tgl Akhir</label>
                                    <div class="col-9">
                                        <input class="form-control" type="date" placeholder="Tgl Akhir" id="tgl_akhir" name="tgl_akhir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="flag_status" class="col-3 col-form-label">Status Aktif</label>
                                    <div class="col-3">
                                        <select class='form-control selectize' id="flag_status" name="flag_status">
                                        <option value=''>--- Pilih Status Aktif ---</option>
                                        <option value='1'>Aktif</option>
                                        <option value='0'>Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                    </div>
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

    $('#flag_status').selectize();

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
    });

    $('#btn-save').click(function(){
        $('#form-tambah').submit();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();

        $.ajax({
            type: 'GET',
            url: "{{ url('saku/fs') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    if(result.data.data.length > 0){
                        $('#id_edit').val('edit');
                        $('#kode_fs').val(id);
                        $('#nama').val(result.data.data[0].nama);
                        $('#tgl_awal').val(result.data.data[0].tgl_awal);
                        $('#tgl_akhir').val(result.data.data[0].tgl_akhir);
                        $('#flag_status')[0].selectize.setValue(result.data.data[0].flag_status);
                        $('#saku-datatable').hide();
                        $('#saku-form').show();
                    }
                }
            }
        });
    });


    $('#form-tambah').on('change', '#kode_fs', function(){
        var id = $(this).val();
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/fs') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    if(result.data.data.length > 0){

                        $('#id_edit').val('edit');
                        $('#kode_fs').val(id);
                        
                        $('#nama').val(result.data.data[0].nama);
                        $('#tgl_awal').val(result.data.data[0].tgl_awal);
                        $('#tgl_akhir').val(result.data.data[0].tgl_akhir);
                        $('#flag_status')[0].selectize.setValue(result.data.data[0].flag_status);
                    }else{
                        $('#id_edit').val('');
                    }
                }
            }
        });
    });


    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        ajax: {
            url: "{{ url('saku/fsAll') }}" ,
            data: {},
            async:false,
            type: 'GET',
            dataSrc : function(json) {
                return json.data;   
            }
        },
        columnDefs: [
            {targets: 3, data: null, defaultContent: action_html }
        ],
        columns: [
            { data: 'kode_fs' },
            { data: 'nama' },
            { data: 'flag_status' },
        ],
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        if(confirm('Apakah anda ingin menghapus data ini?')){
            var kode = $(this).closest('tr').find('td:eq(0)').html();         
            
            $.ajax({
                type: 'DELETE',
                url: "{{ url('saku/fs') }}/"+kode,
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
        var parameter = $('#id_edit').val();
        if(parameter==''){
            // tambah
            console.log('parameter:tambah');
            var formData = new FormData(this);
            for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
                }

            $.ajax({
                type: 'POST',
                url: "{{ url('saku/fs') }} ",
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
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }else{
            console.log('parameter:ubah');
            var formData = new FormData(this);
            for(var pair of formData.entries()) {
                    console.log(pair[0]+ ', '+ pair[1]); 
                }    
            var id = $('#kode_fs').val();   
            $.ajax({
                type: 'POST',
                url: "{{ url('saku/fs') }}/"+id,
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false,  
                success:function(result){
                    alert('Update data '+result.data.message);
                    if(result.data.status){
                        dataTable.ajax.reload();
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                    }
                }
            });
        }
        
    });

    $('#kode_fs,#nama,#flag_aktif').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_fs','nama','flag_aktif'];
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