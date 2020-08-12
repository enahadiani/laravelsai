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
    </style>
    <div class="row header-datatable">
        <div class="col-12">
            <h1>Data Vendor</h1>
            <button type="button" id="btn-tambah" class="btn btn-primary ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row mb-3" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="min-height: 560px !important;">                    
                    <table id="table-data" class="" style='width:100%'>
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
    <form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row header-form" style="display:none;">
        <div class="col-12">
            <h1 id="judul-form"></h1>
            <button type="submit" class="btn btn-primary ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card pt-3" style="min-height: 560px !important;">
                    <div class="card-body pt-0">
                        <div class="form-group row position-relative error-l-50" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50 ">
                            <label for="kode_vendor" class="col-md-3 col-sm-3 col-form-label">Kode</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Kode Vendor" id="kode_vendor" name="kode_vendor" required>
                                
                            </div>
                            <label for="nama" class="col-md-3 col-sm-3 col-form-label">Nama</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nama Vendor" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="no_tel" class="col-md-3 col-sm-3 col-form-label">No Telp</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nomor Telepon" id="no_tel" name="no_tel" required>
                            </div>
                            <label for="no_fax" class="col-md-3 col-sm-3 col-form-label">No Fax</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nomor Fax" id="no_fax" name="no_fax" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="email" class="col-md-3 col-sm-3 col-form-label">Email</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="email" placeholder="Email" id="email" name="email" required>
                            </div>
                            <label for="npwp" class="col-md-3 col-sm-3 col-form-label">NPWP</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="NPWP Vendor" id="npwp" name="npwp" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="pic" class="col-md-3 col-sm-3 col-form-label">PIC</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="PIC" id="pic" name="pic" required>
                            </div>
                            <label for="no_tel" class="col-md-3 col-sm-3 col-form-label">No Telp PIC</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Nomor Telepon PIC" id="no_pictel" name="no_pictel" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="bank" class="col-md-3 col-sm-3 col-form-label">Bank</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Bank" id="bank" name="bank" required>
                            </div>
                            <label for="cabang" class="col-md-3 col-sm-3 col-form-label">Cabang</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="text" placeholder="Cabang" id="cabang" name="cabang" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="no_rek" class="col-md-3 col-sm-3 col-form-label">No. Rekening</label>
                            <div class="col-md-3 col-sm-9">
                                <input class="form-control" type="number" placeholder="No Rekening" id="no_rek" name="no_rek" required>
                            </div>
                            <label for="nama_rek" class="col-md-3 col-sm-3 col-form-label">Nama Rekening</label>
                            <div class="col-md-3 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Nama Rekening" id="nama_rek" name="nama_rek" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="alamat" class="col-md-3 col-sm-3 col-form-label">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Alamat Vendor" id="alamat" name="alamat" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="alamat2" class="col-md-3 col-sm-3 col-form-label">Alamat NPWP</label>
                            <div class="col-md-9 col-sm-9">
                                 <input class="form-control" type="text" placeholder="Alamat NPWP" id="alamat2" name="alamat2" required>
                            </div>
                        </div>
                        <div class="form-group row position-relative error-l-50">
                            <label for="akun_hutang" class="col-md-3 col-sm-3 col-form-label">Akun Utang</label>
                            <div class="col-md-3 col-sm-9">
                                 <input class="form-control" type="text"  id="akun_hutang" name="akun_hutang" required>
                                 <span class="show-list"><i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;position: absolute;top: 0;right: 20px;"></i></span>
                            </div>
                            <div class="col-md-6 col-sm-9">
                                <label id="label_akun_hutang" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
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
    <div class="modal" tabindex="-1" role="dialog" id="modal-delete">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Hapus Data Vendor <span id="modal-delete-nama"></span><span id="modal-delete-id" style="display:none"></span> </h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <p class="mb-0">- Semua informasi tentang data vendor ini akan terhapus dari database</p>
                    <p class="mb-4">- Data vendor ini akan terhapus permanen dalam 24 jam</p>
                    <span style="z-index: 200;position: absolute;top: 85px;left: 40px;background: white;padding: 0 10px;">Meninjau Data Vendor</span>
                    <div id="content-delete" class="table-responsive py-2 px-2" style="height:250px;border: 1px solid #d7d7d7;">
                        <table id="table-delete" class="table no-border">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal" >Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-ya" >Hapus Data Vendor</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>
    
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script>
        // var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";
        $.validator.setDefaults({
            ignore: [],
            errorElement: "label",
            submitHandler: function () {
                alert("submitted!");
            },
            errorPlacement: function (error, element) {
                var id = element.attr("id");
                $("label[for="+id+"]").append("<br/>");
                $("label[for="+id+"]").append(error);
                // if (element.attr("class").indexOf("custom-control") != -1) {
                //     error.insertAfter(element.parent());
                // } else {
                //     error.insertAfter(element);
                // }
            }
        });
        $('#form-tambah').validate();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        function getAkun(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/vendor-akun') }}",
                dataType: 'json',
                data:{'kode_akun':id},
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#akun_hutang').val(result.daftar[0].kode_akun);
                            $('#label_akun_hutang').text(result.daftar[0].nama);
                        }else{
                            alert('Kode Akun tidak valid');
                            $('#akun_hutang').val('');
                            $('#label_akun_hutang').html('');
                            $('#akun_hutang').focus();
                        }
                    }
                }
            });
        }

        function getLabelAkun(no){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/vendor-akun') }}",
                dataType: 'json',
                data:{'kode_akun':no},
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_akun === no){
                                $('#label_akun_hutang').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode Akun tidak valid');
                            $('#label_akun_hutang').html('');
                            $('#akun_hutang').val('');
                            $('#akun_hutang').focus();
                        }
                    }
                }
            });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    // Initialize the plugin
    var scroll = document.querySelector('#content-delete');
    var psscroll = new PerfectScrollbar(scroll);

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil'></i></a> &nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash'></i></a>";
    
    var dataTable = $("#table-data").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        'ajax': {
            'url': "{{ url('esaku-master/vendor') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html },
            ],
        'columns': [
            { data: 'kode_vendor' },
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
        $('#judul-form').html('Tambah Data Vendor');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_vendor').attr('readonly', false);
        $('#label_akun_hutang').text('');
        $('#saku-datatable').hide();
        $('.header-datatable').hide();
        $('.header-form').show();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

     $('.header-form').on('click', '#btn-kembali', function(){
        $('.header-datatable').show();
        $('#saku-datatable').show();
        $('#saku-form').hide();
        $('.header-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
        case 'akun_hutang': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('esaku-master/vendor-akun') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Akun";
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

        var table = "<table width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            ajax: {
                "url": toUrl,
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            columnDefs: [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='simple-icon-check'></i></a>"
            }],
            columns: columns,
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

    $('#form-tambah').on('change', '#akun_hutang', function(){
        var par = $(this).val();
        getAkun(par);
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
            var url = "{{ url('esaku-master/vendor') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('esaku-master/vendor') }}";
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
                    $('.header-datatable').show();
                    $('.header-form').hide();
                 
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                   
                    window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    
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
        $('#btn-simpan').html("Simpan").removeAttr('disabled');
    });

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/vendor') }}/"+id,
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
                    
                    showNotification("top", "center", "success",'Hapus Data','Data Vendor ('+id+') berhasil dihapus ');
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

    $('.modal-footer').on('click','#btn-ya',function(e){
        e.preventDefault();
        var id = $('#modal-delete-id').text();
        hapusData(id);
    })

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/vendor') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                var html = '';
                
                $('#table-delete tbody').html(html);
                if(result.status){
                    html +=`<tr>
                        <td style='border:none'>Kode Vendor</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>Nama Vendor</td>
                        <td>`+result.data[0].nama+`</td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>`+result.data[0].no_tel+`</td>
                    </tr>
                    <tr>
                        <td>No Fax</td>
                        <td>`+result.data[0].no_fax+`</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>`+result.data[0].email+`</td>
                    </tr>
                    <tr>
                        <td>No Telp PIC</td>
                        <td>`+result.data[0].no_pictel+`</td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td>`+result.data[0].bank+`</td>
                    </tr>
                    <tr>
                        <td>Cabang</td>
                        <td>`+result.data[0].cabang+`</td>
                    </tr>
                    <tr>
                        <td>No Rekening</td>
                        <td>`+result.data[0].no_rek+`</td>
                    </tr>
                    <tr>
                        <td>Nama Rekening</td>
                        <td>`+result.data[0].nama_rek+`</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>`+result.data[0].alamat+`</td>
                    </tr>
                    <tr>
                        <td>Alamat NPWP</td>
                        <td>`+result.data[0].alamat2+`</td>
                    </tr>
                    <tr>
                        <td>Akun Hutang</td>
                        <td>`+result.data[0].akun_hutang+`</td>
                    </tr>
                    `;
                    $('#table-delete tbody').html(html);
                    $('#modal-delete-id').text(id);
                    $('#modal-delete').modal('show');

                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#judul-form').html('Edit Data Vendor');
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/vendor') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_vendor').attr('readonly', true);
                    $('#kode_vendor').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#alamat').val(result.data[0].alamat);
                    $('#alamat2').val(result.data[0].alamat2);
                    $('#email').val(result.data[0].email);
                    $('#npwp').val(result.data[0].npwp);
                    $('#pic').val(result.data[0].pic);
                    $('#no_pictel').val(result.data[0].no_pictel);
                    $('#no_tel').val(result.data[0].no_tel);
                    $('#no_fax').val(result.data[0].no_fax);
                    $('#bank').val(result.data[0].bank);
                    $('#cabang').val(result.data[0].cabang);
                    $('#no_rek').val(result.data[0].no_rek);
                    $('#nama_rek').val(result.data[0].nama_rek);
                    $('#akun_hutang').val(result.data[0].akun_hutang);
                    getLabelAkun(result.data[0].akun_hutang);
                    $('#row-id').show();;
                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    $('.header-datatable').hide();
                    $('.header-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    });

    </script>