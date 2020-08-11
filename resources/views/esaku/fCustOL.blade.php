    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
        }
        .form-group{
            margin-bottom:5px !important;
        }
    </style>
    <div class="row header-datatable">
        <div class="col-12">
            <h1>Data Customer</h1>
            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="min-height: 560px !important;">
                    <table id="table-data" style='width:100%'>
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
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
    <div class="row header-form" style="display:none;">
        <div class="col-12">
            <h1>Form Data Customer</h1>
            <button type="button" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card pt-3" style="min-height: 560px !important;">
                <form id="form-tambah" style=''>
                    <div class="card-body pt-0" >
                        <div class="form-group row" id="row-id">
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="kode_cust" class="col-md-3 col-sm-3 col-form-label">Kode</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Kode Customer" id="kode_cust" name="kode_cust">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nama" class="col-md-3 col-sm-3 col-form-label">Nama</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nama Customer" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_tel" class="col-md-3 col-sm-3 col-form-label">No Telp</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nomor Telepon" id="no_tel" name="no_tel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-sm-3 col-form-label">Email</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="email" placeholder="Email" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pic" class="col-md-3 col-sm-3 col-form-label">PIC</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="PIC" id="pic" name="pic">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-md-3 col-sm-3 col-form-label">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Alamat Customer" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="provinsi" class="col-md-3 col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Provinsi Customer" id="provinsi" name="provinsi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-md-3 col-sm-3 col-form-label">Kota</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Kota Customer" id="kota" name="kota">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-md-3 col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="kecamatan Customer" id="kecamatan" name="kecamatan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_lain" class="col-md-3 col-sm-3 col-form-label">ID Lain</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="ID Lain Customer" id="id_lain" name="id_lain">
                            </div>
                        </div>
                    </div>
                </form>
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
    // var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil'></i></a> &nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash'></i></a>";

    var dataTable = $("#table-data").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        'ajax': {
            'url': "{{ url('esaku-master/cust-ol') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html },
        ],
        'columns': [
            { data: 'kode_cust' },
            { data: 'nama' },
            { data: 'alamat' },
        ],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_"
        },
    });

    $('.header-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');  
        $('#kode_cust').attr('readonly', false);
        $('#saku-datatable').hide();
        $('.header-datatable').hide();
        $('.header-form').show();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('.header-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('.header-datatable').show();
        $('.header-form').hide();
        $('#saku-form').hide();
    });

    $('#btn-simpan').click(function(e){
        e.preventDefault();
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        $('#form-tambah').submit();
    });

    $('#form-tambah').submit(function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "esaku-master/cust-ol/"+id;
            var pesan = "updated";
        }else{
            var url = "esaku-master/cust-ol";
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
                    // Swal.fire(
                    //     'Great Job!',
                    //     'Your data has been '+pesan,
                    //     'success'
                    //     )
                    alert(result.data.message);
                    $('#saku-datatable').show();
                    $('.header-datatable').show();
                    $('#saku-form').hide();
                    $('.header-form').hide();
                 
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                        window.location.href = "/esaku-auth/sesi-habis";
                    // }) 
                }else{
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: 'Something went wrong!',
                        //     footer: '<a href>'+result.data.message+'</a>'
                        // })
                    alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        
        $('#btn-simpan').html("Simpan").removeAttr('disabled');
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        //     if (result.value) {
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'DELETE',
                    url: "esaku-master/cust-ol/"+id,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            // Swal.fire(
                            //     'Deleted!',
                            //     'Your data has been deleted.',
                            //     'success'
                            // )
                            alert(result.data.message);
                        }else if(!result.data.status && result.data.message == "Unauthorized"){
                            // Swal.fire({
                            //     title: 'Session telah habis',
                            //     text: 'harap login terlebih dahulu!',
                            //     icon: 'error'
                            // }).then(function() {
                                window.location.href = "esaku-auth/sesi-habis";
                            // })
                        }else{
                            // Swal.fire({
                            // icon: 'error',
                            // title: 'Oops...',
                            // text: 'Something went wrong!',
                            // footer: '<a href>'+result.data.message+'</a>'
                            // })
                            alert(result.data.message);
                        }
                    }
                });
                
        //     }else{
        //         return false;
        //     }
        // })
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var marketing= $(this).closest('tr').find('td').eq(4).html();
        // $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "esaku-master/cust-ol/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_cust').attr('readonly', true);
                    $('#kode_cust').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#alamat').val(result.data[0].alamat);
                    $('#kota').val(result.data[0].kota);
                    $('#kecamatan').val(result.data[0].kecamatan);
                    $('#provinsi').val(result.data[0].provinsi);
                    $('#email').val(result.data[0].email);
                    $('#pic').val(result.data[0].pic);
                    $('#no_tel').val(result.data[0].no_tel);
                    $('#id_lain').val(result.data[0].id_lain);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('.header-datatable').hide();
                    $('#saku-form').show();
                    $('.header-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                        window.location.href = "esaku-auth/sesi-habis";
                    // })
                }
                // $iconLoad.hide();
            }
        });
    });

    </script>