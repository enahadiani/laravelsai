
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
            <h1>Data Kelompok Barang</h1>
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
                                <th>Akun Persediaan</th>
                                <th>Akun Pendapatan</th>
                                <th>Akun HPP</th>
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
            <h1>Form Kelompok Barang</h1>
            <button type="button" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card pt-3" style="min-height: 560px !important;">
                <form id="form-tambah" style=''>
                    <div class="card-body pt-0">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                            <div class="form-group row ">
                                <label for="kode_klp" class="col-md-3 col-sm-3 col-form-label">Kode</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control" type="text" placeholder="Kode Kelompok Barang" id="kode_klp" name="kode_klp">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="nama" class="col-md-3 col-sm-3 col-form-label">Nama</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control" type="text" placeholder="Nama Kelompok Barang" id="nama" name="nama">
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="akun_pers" class="col-md-3 col-sm-3 col-form-label">Akun Persediaan</label>
                            <div class="input-group col-md-3 col-sm-3">
                                <input type='text' name="akun_pers" id="akun_pers" class="form-control" value="" required>
                                    <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-md-6 col-sm-9">
                                <label id="label_akun_pers" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akun_pdpt" class="col-md-3 col-sm-3 col-form-label">Akun Pendapatan</label>
                            <div class="input-group col-md-3 col-sm-3">
                                <input type='text' name="akun_pdpt" id="akun_pdpt" class="form-control" value="" required>
                                    <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-md-6 col-sm-9">
                                <label id="label_akun_pdpt" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akun_hpp" class="col-md-3 col-sm-3 col-form-label">Akun HPP</label>
                            <div class="input-group col-md-3 col-sm-3">
                                <input type='text' name="akun_hpp" id="akun_hpp" class="form-control" value="" required>
                                    <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-md-6 col-sm-9">
                                <label id="label_akun_hpp" style="margin-top: 10px;"></label>
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

        function getAkunPers(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp-persediaan') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#akun_pers').val(result.daftar[0].kode_akun);
                            $('#label_akun_pers').text(result.daftar[0].nama);
                        }else{
                            alert('Kode akun tidak valid');
                            $('#akun_pers').val('');
                            $('#akun_pers').focus();
                        }
                    }
                }
            });
        }

        function getLabelAkunPers(no){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp-persediaan') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_akun === no){
                                $('#label_akun_pers').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Akun tidak valid');
                            $('#akun_pers').val('');
                            $('#akun_pers').focus();
                        }
                    }
                }
            });
        }

        function getAkunPdpt(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp-pendapatan') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#akun_pdpt').val(result.daftar[0].kode_akun);
                            $('#label_akun_pdpt').text(result.daftar[0].nama);
                        }else{
                            alert('Akun tidak valid');
                            $('#akun_pdpt').val('');
                            $('#akun_pdpt').focus();
                        }
                    }
                }
            });
        }

        function getLabelAkunPdpt(no){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp-pendapatan') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_akun === no){
                                $('#label_akun_pdpt').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Akun tidak valid');
                            $('#kode_pdpt').val('');
                            $('#kode_pdpt').focus();
                        }
                    }
                }
            });
        }

        function getAkunHPP(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp-hpp') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#akun_hpp').val(result.daftar[0].kode_akun);
                            $('#label_akun_hpp').text(result.daftar[0].nama);
                        }else{
                            alert('Akun tidak valid');
                            $('#akun_hpp').val('');
                            $('#akun_hpp').focus();
                        }
                    }
                }
            });
        }

        function getLabelAkunHPP(no){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp-hpp') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_akun === no){
                                $('#label_akun_hpp').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Akun tidak valid');
                            $('#akun_hpp').val('');
                            $('#akun_hpp').focus();
                        }
                    }
                }
            });
        }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil'></i></a> &nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash'></i></a>";

    var dataTable = $("#table-data").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        'ajax': {
            'url': "{{ url('esaku-master/barang-klp') }}",
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
            {'targets': 5, data: null, 'defaultContent': action_html },
            ],
        'columns': [
            { data: 'kode_klp' },
            { data: 'nama' },
            { data: 'akun_pers' },
            { data: 'akun_pdpt' },
            { data: 'akun_hpp' },
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
        $('#kode_klp').attr('readonly', false);
        $('#label_akun_pers').text('');
        $('#label_akun_pdpt').text('');
        $('#label_akun_hpp').text('');
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
        case 'akun_hpp': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('esaku-master/barang-klp-hpp') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Akun HPP";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        case 'akun_pdpt': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('esaku-master/barang-klp-pendapatan') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Akun Pendapatan";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        case 'akun_pers': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('esaku-master/barang-klp-persediaan') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Akun Persediaan";
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

    $('#form-tambah').on('change', '#akun_pers', function(){
        var par = $(this).val();
        getAkunPers(par);
    });

    $('#form-tambah').on('change', '#akun_pdpt', function(){
        var par = $(this).val();
        getAkunPdpt(par);
    });

    $('#form-tambah').on('change', '#akun_hpp', function(){
        var par = $(this).val();
        getAkunHPP(par);
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
            var url = "{{ url('esaku-master/barang-klp') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('esaku-master/barang-klp') }}";
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
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
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
            if(confirm("Anda yakin ini menghapus data ini?")){
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('esaku-master/barang-klp') }}/"+id,
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
                                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                            // })
                        }else{
                            alert(result.data.message);
                            // Swal.fire({
                            // icon: 'error',
                            // title: 'Oops...',
                            // text: 'Something went wrong!',
                            // footer: '<a href>'+result.data.message+'</a>'
                            // })
                        }
                    }
                });
                
            }
            // }else{
            //     return false;
            // }
        // })
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var persediaan= $(this).closest('tr').find('td').eq(2).html();
        var pendapatan= $(this).closest('tr').find('td').eq(3).html();
        var hpp= $(this).closest('tr').find('td').eq(4).html();
        // $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/barang-klp') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_klp').attr('readonly', true);
                    $('#kode_klp').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#akun_pers').val(persediaan);
                    $('#akun_pdpt').val(pendapatan);
                    $('#akun_hpp').val(hpp);
                    getLabelAkunPers(persediaan);
                    getLabelAkunPdpt(pendapatan);
                    getLabelAkunHPP(hpp);
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
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                }
                // $iconLoad.hide();
            }
        });
    });

    </script>