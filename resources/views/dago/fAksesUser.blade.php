<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Akses User 
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
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kode Menu</th>
                                        <th>Kode Lokasi</th>
                                        <th>Status Admin</th>
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
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Akses User
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style="height: 340px !important;">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik" class="col-3 col-form-label">NIK</label>
                                <div class="input-group col-3">
                                    <input class="form-control" type="text" placeholder="NIK User" id="nik" name="nik" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="pass" class="col-3 col-form-label">Password</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Password" id="pass" name="pass" required>
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Nama User" id="nama" name="nama" required>
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="klp_akses" class="col-3 col-form-label">Kelompok Akses</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Kelompok Akses" id="klp_akses" name="klp_akses" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_admin" class="col-3 col-form-label">Status Admin</label>
                                <div class="col-3">
                                    <select class='form-control' id="status_admin" name="status_admin">
                                    <option value='' disabled selected>--- Pilih Status Admin ---</option>
                                    <option value='A'>Admin</option>
                                    <option value='U'>User</option>
                                    <option value='P'>P</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_klp_menu" class="col-3 col-form-label">Kelompok Menu</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_klp_menu" id="kode_klp_menu" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_klp_menu" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="path_view" class="col-3 col-form-label">Path View</label>
                                <div class="input-group col-3">
                                    <input type='text' name="path_view" id="path_view" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_path_view" style="margin-top: 10px;"></label>
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

        $('#status_admin').selectize();
        $('.custom-file-input').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

        function getKlpMenu(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('dago-master/menu-klp') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_klp == id);
                            if(filter.length > 0) {
                                $('#kode_klp_menu').val(filter[0].kode_klp);
                                $('#label_kode_klp_menu').text(filter[0].nama);
                            } else {
                                alert('Kelompok menu tidak valid');
                                $('#kode_klp_menu').val('');
                                $('#label_kode_klp_menu').text('');
                                $('#kode_klp_menu').focus();
                            }
                    }
                }
                }
            });
        }

        function getMenuLab(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('dago-master/form') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_form == id);
                            if(filter.length > 0) {
                                $('#path_view').val(filter[0].kode_form);
                                $('#label_path_view').text(filter[0].form);
                            } else {
                                alert('Kode menu tidak valid');
                                $('#path_view').val('');
                                $('#label_path_view').text('');
                                $('#path_view').focus();
                            }
                    }
                }
                }
            });
        }

    $('#form-tambah').on('change', '#kode_klp_menu', function(){
        var par = $(this).val();
        getKlpMenu(par);
    });

    $('#form-tambah').on('change', '#path_view', function(){
        var par = $(this).val();
        getMenuLab(par);
    });

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('dago-master/akses-user') }}",
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
            {'targets': 5, data: null, 'defaultContent': action_html },
            ],
        'columns': [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'kode_klp_menu' },
            { data: 'kode_lokasi' },
            { data: 'status_admin' }
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
        $('#nik').attr('readonly',false);
        $('#label_path_view').text('');
        $('#path_view').val('');
        $('#label_kode_klp_menu').text('');
        $('#kode_klp_menu').val('');
        $('#method').val('post');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

     $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        console.log(this);
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        console.log({target1,target2})
        showFilter(par,target1,target2);
    });

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
        case 'kode_klp_menu': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('dago-master/menu-klp') }}";
                var columns = [
                    { data: 'kode_klp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Kelompok Menu";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        case 'path_view': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('dago-master/form') }}";
                var columns = [
                    { data: 'kode_form' },
                    { data: 'form' }
                ];
                
                var judul = "Daftar Form";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        }

        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table class='table table-bordered table-striped' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            // fixedHeader: true,
            // "scrollY": "300px",
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": toUrl,
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            "columnDefs": [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': columns
            // "iDisplayLength": 25,
        });

        // searchTable.$('tr.selected').removeClass('selected');
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
                $($target).attr('value',kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            console.log($target3);
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $(document).keydown(function(e) {
            if (e.keyCode == 40){ //arrow down
                var tr = searchTable.$('tr.selected');
                tr.removeClass('selected');
                tr.next().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }
            if (e.keyCode == 38){ //arrow up
                
                var tr = searchTable.$('tr.selected');
                searchTable.$('tr.selected').removeClass('selected');
                tr.prev().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }

            if (e.keyCode == 13){
                var kode = $('tr.selected').find('td:nth-child(1)').text();
                var nama = $('tr.selected').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }
                
                if($target3 != ""){
                    $($target3).text(nama);
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('dago-master/akses-user') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('dago-master/akses-user') }}";
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
                    url: "{{ url('dago-master/akses-user') }}/"+id,
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
            url: "{{ url('dago-master/akses-user-detail') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#nik').val(id);
                    $('#id').val(id);
                    $('#nik').attr('readonly',true);
                    $('#nama').val(result.data[0].nama);
                    $('#pass').val(result.data[0].pass);
                    $('#status_admin')[0].selectize.setValue(result.data[0].status_admin);
                    $('#klp_akses').val(result.data[0].klp_akses);
                    getKlpMenu(result.data[0].kode_klp_menu);
                    getMenuLab(result.data[0].path_view);
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