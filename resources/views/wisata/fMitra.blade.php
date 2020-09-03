    <!-- CSS tambahan -->
    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
        }
        .form-control[readonly]:focus {
            background-color: #e9ecef;
            opacity: 1;
        }
        
        input.error{
            border:1px solid #dc3545;
        }
        label.error{
            color:#dc3545;
            margin:0;
        }
        #table-data_paginate,#table-search_paginate
        {
            margin-top:0 !important;
        }

        #table-data_paginate ul,#table-search_paginate ul
        {
            float:right;
        }

        .form-body 
        {
            position: relative;
            overflow: auto;
        }

        #content-delete
        {
            position: relative;
            overflow: auto;
        }
        
        #table-search
        {
            border-collapse:collapse !important;
        }
        
        #table-search tbody tr:hover
        {
            background:#E8E8E8 !important;
            cursor:pointer;
        }

        #table-search tbody tr.selected
        {
            background:#E8E8E8 !important;
        }

        #table-search_filter label, #table-search_filter input
        {
            width:100%;
        }

        .dataTables_wrapper .paginate_button.previous {
        margin-right: 0px; }

        .dataTables_wrapper .paginate_button.next {
        margin-left: 0px; }

        div.dataTables_wrapper div.dataTables_paginate {
        margin-top: 25px; }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center; }

        .dataTables_wrapper .paginate_button.page-item {
            padding-left: 5px;
            padding-right: 5px; 
        }

        .dataTables_length select {
            border: 0;
            background: none;
            box-shadow: none;
            border:none;
            width:120px !important;
            transition-duration: 0.3s; 
        }

        #table-data_filter label
        {
            width:100%;
        }
        #table-data_filter label input
        {
            width:inherit;
        }
        #searchData
        {
            font-size: .75rem;
            height: 31px;
        }
    </style>
    <!-- LIST DATA -->
    <div class="row mb-3" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;">Data Mitra</h5>
                    <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="" style="padding-right:1.75rem;padding-left:1.75rem">
                
                <div class="dataTables_length" id="table-data_length"></div>
                    <div class="d-block d-md-inline-block float-left">
                        <div class="page-countdata">
                            <label>Menampilkan 
                            <select style="border:none" id="page-count">
                                <option value="10">10 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                            </label>
                        </div>
                    </div>
                    <div class="d-block d-md-inline-block float-right">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData">
                            <div class="input-group-append">
                                <span class="input-group-text" id="filter-btn"><i class="simple-icon-equalizer"></i></span>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="card-body" style="min-height: 560px !important;padding-top:0;">                    
                    <table id="table-data" style='width:100%'>
                        <thead>
                            <tr>
                                <th width="20%">Kode</th>
                                <th width="30%">Nama</th>
                                <th width="38%">Alamat</th>                                
                                <th width="12%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>

                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                       
                        <div class="form-group row  ">
                            <label for="kode_mitra" class="col-md-2 col-sm-12 col-form-label">Kode</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Kode Mitra" id="kode_mitra" name="kode_mitra" required>                                
                            </div>
                            
                            <div class="col-md-2 col-sm-12">
                            </div>

                            <label for="nama" class="col-md-2 col-sm-12 col-form-label">Nama</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Nama Mitra" id="nama" name="nama" required>
                            </div>                            
                        </div>

                        <div class="form-group row ">
                            <label for="alamat" class="col-md-2 col-sm-12 col-form-label">Alamat</label>
                            <div class="col-md-10 col-sm-12">
                                <input class="form-control" type="text" placeholder="Alamat Mitra" id="alamat" name="alamat" required>
                            </div>
                            <div class="col-md-2 col-sm-12">
                            </div>                            
                        </div>

                        <div class="form-group row  ">
                            <label for="kecamatan" class="col-md-2 col-sm-12 col-form-label">Kecamatan</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" required>                                
                            </div>
                            
                            <div class="col-md-2 col-sm-12">
                            </div>

                            <label for="no_tel" class="col-md-2 col-sm-12 col-form-label">No Telpon</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="No Telpon" id="no_tel" name="no_tel" required>
                            </div>                            
                        </div>

                        <div class="form-group row  ">
                            <label for="pic" class="col-md-2 col-sm-12 col-form-label">Contact Person</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Contact Person" id="pic" name="pic" required>                                
                            </div>
                            
                            <div class="col-md-2 col-sm-12">
                            </div>

                            <label for="no_hp" class="col-md-2 col-sm-12 col-form-label">HP PIC</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="HP PIC" id="no_hp" name="no_hp" required>
                            </div>                            
                        </div>

                        <div class="form-group row  ">
                            <label for="pic" class="col-md-2 col-sm-12 col-form-label">Website</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Website" id="website" name="website" required>                                
                            </div>
                            
                            <div class="col-md-2 col-sm-12">
                            </div>

                            <label for="email" class="col-md-2 col-sm-12 col-form-label">Email</label>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-control" type="text" placeholder="Email" id="email" name="email" required>
                            </div>                            
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-3 col-form-label">Status</label>
                            <div class="col-3">
                                <select class='form-control' id="status" name="status" required>
                                <option value=''>--- Pilih Status ---</option>
                                <option value='BINTANG'>Menikah</option>
                                <option value='NON'>Belum Menikah</option>
                                <option value='-'>Cerai Hidup</option>                                
                                </select>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

    <!-- MODAL HAPUS -->    
    <div class="modal" tabindex="-1" role="dialog" id="modal-delete">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content" style="border-radius:1rem">
                <div class="modal-body text-center pb-0" style="border:none">
                    <span id="modal-delete-id" style="display:none"></span>
                    <i class="simple-icon-trash" style="font-size:40px;display:block"></i>
                    <h1 style="font-weight:bold">Hapus Data</h1>
                    <p class="mt-4">Data akan terhapus secara permanen dan kamu tidak bisa mengembalikannya</p>
                </div>
                <div class="modal-footer" style="border:none">
                    <button type="button" class="btn btn-light" data-dismiss="modal" >Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-ya" style="background:#FC3030">Hapus Data Mitra</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL HAPUS -->

    <!-- MODAL PREVIEW -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-preview">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header" style="display:block">
                    <h6 class="modal-title" style="position: absolute;">Preview Data Mitra <span id="modal-preview-nama"></span><span id="modal-preview-id" style="display:none"></span> </h6>
                    <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="btn btn-primary float-right ml-2" id="btn-delete2" >Hapus</button>
                    <button type="button" class="btn btn-primary float-right" id="btn-edit2" >Edit</button>
                </div>
                <div class="modal-body" id="content-preview" style="height:450px">
                    <table id="table-preview" class="table no-border">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL PREVIEW -->

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    setHeightForm();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
  
    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('wisata-master/mitra') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    window.location.href = "{{ url('wisata-auth/sesi-habis') }}";
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        'columns': [
            { data: 'kode_mitra' },
            { data: 'nama' },
            { data: 'alamat' }
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
            // lengthMenu: "Items Per Page _MENU_"
            "lengthMenu": 'Menampilkan <select>'+
            '<option value="10">10 per halaman</option>'+
            '<option value="25">25 per halaman</option>'+
            '<option value="50">50 per halaman</option>'+
            '<option value="100">100 per halaman</option>'+
            '</select>'
        }
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA

    $('#status').selectize();    

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Mitra');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_mitra').attr('readonly', false);        
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });
    // END BUTTON TAMBAH
    
    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            if(parameter == "edit"){
                var url = "{{ url('wisata-master/mitra') }}/"+id;
                var pesan = "updated";
            }else{
                var url = "{{ url('wisata-master/mitra') }}";
                var pesan = "saved";
            }

            var formData = new FormData(form);
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
                    if(result.data.status){
                        dataTable.ajax.reload();
                        Swal.fire(
                            'Data berhasil tersimpan!',
                            'Your data has been '+pesan,
                            'success'
                            )
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Mitra');
                        $('#method').val('post');
                        $('#kode_mitra').attr('readonly', false);
                    
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/wisata-auth/sesi-habis') }}";
                        
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
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('wisata-master/mitra') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Deleted!',
                        'Your data has been deleted.',
                        'success'
                    );
                    
                    showNotification("top", "center", "success",'Hapus Data','Data Mitra ('+id+') berhasil dihapus ');
                    $('#modal-delete-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        $('#modal-delete-id').text(id);
        $('#modal-delete').modal('show');
    });

    $('.modal-footer').on('click','#btn-ya',function(e){
        e.preventDefault();
        var id = $('#modal-delete-id').text();
        hapusData(id);
    });
    // END BUTTON HAPUS
    
    // BUTTON EDIT
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Mitra');
        $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/mitra') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_mitra').attr('readonly', true);
                    $('#kode_mitra').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);                                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#kode_mitra,#nama').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_mitra','nama'];
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


    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 2){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Kode Mitra</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama Mitra</td>
                <td>`+data.nama+`</td>
            </tr>            
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-delete-id').text();
        $('#modal-preview').modal('hide');
        $('#modal-delete-id').text(id);
        $('#modal-delete').modal('show');
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Mitra');
        $.ajax({
            type: 'GET',
            url: "{{ url('wisata-master/mitra') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_mitra').attr('readonly', true);
                    $('#kode_mitra').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);                                        
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('#modal-preview').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('wisata-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    </script>