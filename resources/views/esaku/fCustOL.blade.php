    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Customer" tambah="true" :thead="array('Kode','Nama','Alamat','Tgl Input','Aksi')" :thwidth="array(15,35,40,0,10)" :thclass="array('','','','','text-center')" />
    <!-- END LIST DATA -->

    <div class="row header-form" style="display:none;">
        <div class="col-12">
            <h1>Form Data Customer</h1>
            <button type="button" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
   <!-- FORM INPUT -->
   <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
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
                </div>
            </div>
        </div> 
    </form>
    @include('modal_search')

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
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

      // PLUGIN SCROLL di bagian preview dan form input
      var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/cust-ol') }}", 
        [
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                "targets": [3],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'kode_cust' },
            { data: 'nama' },
            { data: 'alamat' },
            { data: 'tgl_input' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[3 ,"desc"]]
    );
    
    $.fn.DataTable.ext.pager.numbers_length = 5;
    
    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });
    
    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA
    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Jasa Kirim');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_kirim').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });
    // END BUTTON TAMBAH
    
    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
    
    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_kirim').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    // HANDLER untuk enter dan tab
    $('#kode_kirim,#nama,#no_tel,#email,#pic,#no_pictel,#bank,#cabang,#no_rek,#nama_rek,#alamat').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_kirim','nama','no_tel','email','pic','no_pictel','bank','cabang','no_rek','nama_rek','alamat'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    // END HANDLER

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