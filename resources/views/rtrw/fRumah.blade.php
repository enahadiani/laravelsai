
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px;">
                    <div class="card-body">
                        <h4 class="card-title">Data Rumah 
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
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>Kode Rumah</th>
                                        <th>Blok</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Status Huni</th>
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
                <div class="card" style="height:540px">
                        <form class="form" id="form-tambah">
                            <div class="card-body pb-0">
                                <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Rumah
                                <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                                </h4>
                                <hr>
                            </div>
                            <div class="card-body table-responsive pt-0" style='height:461px'>
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="kode_rumah" class="col-3 col-form-label">Kode Rumah</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Masukkan Kode Rumah " id="kode_rumah" name="kode_rumah" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rw" class="col-3 col-form-label">RW</label>
                                    <div class="col-3">
                                        <input class="form-control" value="{{ Session::get('lokasi') }}" type="text" placeholder="Masukkan Kode Rumah " id="rw" name="rw" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rt" class="col-3 col-form-label">RT</label>
                                    <div class="col-3">
                                        <select class='form-control' id="rt" name="rt">
                                        <option value=''>--- Pilih RT ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="blok" class="col-3 col-form-label">Blok</label>
                                    <div class="col-3">
                                        <select class='form-control' id="blok" name="blok">
                                        <option value=''>--- Pilih Blok ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status_huni" class="col-3 col-form-label">Status Huni</label>
                                    <div class="col-3">
                                        <select class='form-control' id="status_huni" name="status_huni">
                                        <option value=''>--- Pilih Status ---</option>
                                        <option value="PEMILIK">PEMILIK</option>
                                        <option value="KONTRAK">KONTRAK</option>
                                        <option value="MHS">MHS</option>
                                        <option value="-">-</option>
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

    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    });

    function getPP(){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/pp') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    var select = $('#rt').selectize();
                    select = select[0];
                    var control = select.selectize;
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                        }
                    }
                }
            }
        });
    }

    function getBlok(rt=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/blok') }}",
            dataType: 'json',
            data:{'kode_pp':rt},
            async:false,
            success:function(result){    
                var select = $('#blok').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].blok, value:result.daftar[i].blok}]);
                        }
                    }
                }
            }
        });
    }

    $('#rt').selectize({
        selectOnTab: true,
        onChange: function (){
            var rt = $('#rt')[0].selectize.getValue();
            getBlok(rt);
        }
    });

    getPP();
    getBlok();
    $('#status_huni').selectize();

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id').val('');
        $('#kode_rumah').attr('readonly', false);
        $('#method').val('post');
        $('#rt')[0].selectize.setValue('');
        $('#blok')[0].selectize.setValue('');
        $('#status_huni')[0].selectize.setValue('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();

        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/rumah') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                
                var result = res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#kode_rumah').val(id);
                    $('#kode_rumah').attr('readonly', true);
                    $('#rt')[0].selectize.setValue(result.data[0].rt);
                    $('#blok')[0].selectize.setValue(result.data[0].blok);
                    $('#status_huni')[0].selectize.setValue(result.data[0].status_huni);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('rtrw-master/login') }}";
                    })
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
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('rtrw-master/rumah') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.daftar;   
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'kode_rumah' },
            { data: 'blok' },
            { data: 'rt' },
            { data: 'rw' },
            { data: 'status_huni' }
        ],
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
                    url: "{{ url('rtrw-master/rumah') }}/"+kode,
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
                        }else if(!result.status && result.message == "Unauthorized"){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('rtrw-master/login') }}";
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

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var id = $('#kode_rumah').val();
        if(parameter == "edit"){
            var url = "{{ url('rtrw-master/rumah') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('rtrw-master/rumah') }}";
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
                 
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('rtrw-master/login') }}";
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

    $('#kode_rumah,#rt,#blok,#status_huni').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_rumah','rt','blok','status_huni'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2 || idx == 3 || idx == 4){
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