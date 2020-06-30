    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="min-height:560px;">
                        <h4 class="card-title">Data Hakakses 
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
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kode Menu</th>
                                        <th>Kode Lokasi</th>
                                        <th>Status Admin</th>
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
                <div class="card" style="height:560px;">
                    <form class="form" id="form-tambah">
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-2">Form Data Hakakses
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0" style='height:471px'>
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="nik" class="col-3 col-form-label">NIK</label>
                                <div class="col-3">
                                    <select class='form-control' id="nik" name="nik">
                                    <option value=''>--- Pilih NIK ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_klp_menu" class="col-3 col-form-label">Kode Klp Menu</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_klp_menu" name="kode_klp_menu">
                                    <option value=''>--- Pilih Kode Klp Menu ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_admin" class="col-3 col-form-label">Status Admin</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="status_admin" name="status_admin">
                                    <option value=''>--- Pilih Status Admin ---</option>
                                    <option value='A'>Admin</option>
                                    <option value='U'>User</option>
                                    <option value='P'>P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-3 col-form-label">Password</label>
                                <div class="col-9">
                                    <input class="form-control" type="password" placeholder="Password" id="password" name="pass">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="klp_akses" class="col-3 col-form-label">Klp Akses</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Klp Akses" id="klp_akses" name="klp_akses">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="menu_mobile" class="col-3 col-form-label">Menu Mobile</label>
                                <div class="col-3">
                                    <select class='form-control' id="menu_mobile" name="menu_mobile">
                                    <option value=''>--- Pilih Form ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="path_view" class="col-3 col-form-label">Path View</label>
                                <div class="col-3">
                                <select class='form-control' id="path_view" name="path_view">
                                    <option value=''>--- Pilih Form ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_menu_lab" class="col-3 col-form-label">Kode Menu Lab</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Kode Menu Lab" id="kode_menu_lab" name="kode_menu_lab">
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

    function getNIK(){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/karyawan') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#nik').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].nik + ' - ' + result.daftar[i].nama, value:result.daftar[i].nik}]);
                        }
                    }
                }
            }
        });
    }

    function getForm(){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/form') }}",
            dataType: 'json',
            async:false,
            success:function(res){  
                var result = res.data;  
                var select = $('#menu_mobile').selectize();
                select = select[0];
                var control = select.selectize;
                var select2 = $('#path_view').selectize();
                select2 = select2[0];
                var control2 = select2.selectize;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].kode_form + ' - ' + result.data[i].nama_form, value:result.data[i].kode_form}]);
                            control2.addOption([{text:result.data[i].kode_form + ' - ' + result.data[i].nama_form, value:result.data[i].kode_form}]);

                        }
                    }
                }
            }
        });
    }

    function getMenu(){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/hakakses_menu') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;    
                var select = $('#kode_klp_menu').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].kode_klp, value:result.data[i].kode_klp}]);
                        }
                    }
                }
            }
        });
    }

    getNIK();
    getForm();
    getMenu();
    $('.selectize').selectize();
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id').val('');
        $('#method').val('post');
        // $('#nik').attr('readonly', false);
        $('.preview').html('');
        // $('#nama').val('');
        $('#kode_klp_menu')[0].selectize.setValue('');
        $('#status_admin')[0].selectize.setValue('');
        $('#klp_akses').val('');
        $('#password').val('');
        $('#menu_mobile')[0].selectize.setValue('');
        $('#path_view')[0].selectize.setValue('');
        $('#kode_menu_lab').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();

        $.ajax({
            type: 'GET',
            url: "{{ url('apv/hakakses') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#nik')[0].selectize.setValue(id);
                    // $('#nik').attr('readonly', true);
                    // $('#nama').val(result.data[0].nama);
                    $('#password').val(result.data[0].pass);
                    $('#kode_klp_menu')[0].selectize.setValue(result.data[0].kode_klp_menu);
                    $('#status_admin')[0].selectize.setValue(result.data[0].status_admin);
                    $('#klp_akses').val(result.data[0].klp_akses);
                    $('#menu_mobile')[0].selectize.setValue(result.data[0].menu_mobile);
                    $('#path_view')[0].selectize.setValue(result.data[0].path_view);
                    $('#kode_menu_lab').val(result.data[0].kode_menu_lab);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/login') }}";
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
            'url': "{{ url('apv/hakakses') }}",
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
                        window.location.href = "{{ url('apv/logout') }}";
                    })
                    return [];
                }  
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html }
        ],
        'columns': [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'kode_klp_menu' },
            { data: 'kode_lokasi' },
            { data: 'status_admin' }
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
                    url: "{{ url('apv/hakakses') }}/"+kode,
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
                        }
                        else if(!result.data.status && result.data.message == "Unauthorized"){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('apv/logout') }}";
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
        var kode = $('#nik')[0].selectize.getValue();
        if(parameter==''){
            var url = "{{ url('apv/hakakses') }}";
            var pesan = "saved";
        }else{
            
            var url = "{{ url('apv/hakakses') }}/"+kode;
            var pesan = "updated";
        }
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }

        var tmp = $("#nik option:selected").text().split(' - ');
        var nama = tmp[1];
        formData.append('nama',nama);

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
                if(result.data.status){
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                    )
                    $('#saku-datatable').show();
                    $('#saku-form').hide();
                        
                }
                else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/logout') }}";
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
            }
        });
        
    });

    $('#nik,#nama,#kode_pp,#kode_jab,#file_gambar').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['nik','nama','kode_pp','kode_jab','file_gambar'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2 || idx == 3){
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