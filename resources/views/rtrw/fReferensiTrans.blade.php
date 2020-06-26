<div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Referensi Transaksi 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
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

                                th{
                                    vertical-align:middle !important;
                                }
                                /* #input-flag td{
                                    padding:0 !important;
                                } */
                                #input-flag .selectize-input, #input-flag .form-control, #input-flag .custom-file-label, #input-keu .selectize-input, #input-keu .form-control, #input-keu .custom-file-label{
                                    border:0 !important;
                                    border-radius:0 !important;
                                }
                                .modal-header .close {
                                    padding: 1rem;
                                    margin: -1rem 0 -1rem auto;
                                }
                                .check-item{
                                    cursor:pointer;
                                }
                                .selected{
                                    cursor:pointer;
                                    background:#4286f5 !important;
                                    color:white;
                                }
                                #input-flag td:hover, #input-keu td:hover{
                                    background:#f4d180 !important;
                                    color:white;
                                }
                                #input-flag td, #input-keu td{
                                    overflow:hidden !important;
                                }

                                #input-flag td:nth-child(4), #input-keu td:nth-child(4){
                                    overflow:unset !important;
                                }
                                i:hover{
                                    cursor: pointer;
                                    color: blue;
                                }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped " width="100%">
                                <thead>
                                    <tr>
                                        <th width="5%">Kode</th>
                                        <th width="40%">Nama</th>
                                        <th width="10%">Akun Debet</th>
                                        <th width="10%">Akun Kredit</th>
                                        <th width="10%">Jenis</th>
                                        <th width="10%">PP</th>
                                        <th width="5%">Action</th>
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
                    <form class="form mb-5" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Referensi Transaksi
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='height:250px !important'>
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-3 col-form-label">Jenis</label>
                                <div class="col-3">
                                    <select required class='form-control' id="jenis" name="jenis" required>
                                    <option value=''>--- Pilih Jenis ---</option>
                                    <option value='PENGELUARAN'>PENGELUARAN</option>
                                    <option value='PEMASUKAN'>PEMASUKAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="kode_ref" class="col-3 col-form-label">Kode Ref</label>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Kode Ref" id="kode_ref" name="kode_ref" required readonly>
                                        <div class="input-group-append">
                                            <button disabled="true" class="btn btn-info" id="getRef" type="button"><i class="mdi mdi-sync"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="deskripsi" class="col-3 col-form-label">Deskripsi</label>
                                <div class="col-7">
                                    <input class="form-control" type="text" placeholder="Deskripsi" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="akun_debet" class="col-3 col-form-label">Akun Debet</label>
                                <div class="input-group col-3">
                                    <input type='text' name="akun_debet" id="akun_debet" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_akun_debet" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="akun_kredit" class="col-3 col-form-label">Akun Kredit</label>
                                <div class="input-group col-3">
                                    <input type='text' name="akun_kredit" id="akun_kredit" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_akun_kredit" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pp" class="col-3 col-form-label">Unit/PP</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_pp" id="kode_pp" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_pp" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" id="slide-history" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <div class="profiletimeline mt-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- MODAL SEARCH-->
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

    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script type="text/javascript">
        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";
        var $target3 = "";
        var $par1 = "";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        function getRef(jenis){
                $.ajax({
                type: 'GET',
                url: "{{ url('rtrw-master/reftrans-kode') }}/"+jenis,
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.daftar.status){
                        $('#kode_ref').val(result.daftar.kode);
                    }
                },error:function(error) {
                    alert('Terjadi kesalahan')
                }
            });
        }

        function getAkunDebet(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('rtrw-master/masakun') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.kode_akun == id);
                            if(filter.length > 0) {
                                $('#akun_debet').val(filter[0].kode_akun);
                                $('#label_akun_debet').text(filter[0].nama);
                            } else {
                                alert('Akun tidak valid');
                                $('#akun_debet').val('');
                                $('#label_akun_debet').text('');
                                $('#akun_debet').focus();
                            }
                        }
                    }
                }
            });
        }

        function getAkunKredit(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('rtrw-master/masakun') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.kode_akun == id);
                            if(filter.length > 0) {
                                $('#akun_kredit').val(filter[0].kode_akun);
                                $('#label_akun_kredit').text(filter[0].nama);
                            } else {
                                alert('Akun tidak valid');
                                $('#akun_kredit').val('');
                                $('#label_akun_kredit').text('');
                                $('#akun_kredit').focus();
                            }
                        }
                    }
                }
            });
        }

        function getPP(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('rtrw-master/relakun-pp') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.kode_pp == id);
                            if(filter.length > 0) {
                                $('#kode_pp').val(filter[0].kode_pp);
                                $('#label_kode_pp').text(filter[0].kode_lokasi);
                            } else {
                                alert('PP tidak valid');
                                $('#kode_pp').val('');
                                $('#label_kode_pp').text('');
                                $('#kode_pp').focus();
                            }
                        }
                    }
                }
            });
        }

        $('#form-tambah').on('change', '#akun_debet', function(){
            var par = $(this).val();
            getAkunDebet(par);
        });

        $('#form-tambah').on('change', '#akun_kredit', function(){
            var par = $(this).val();
            getAkunKredit(par);
        });

        $('#form-tambah').on('change', '#kode_pp', function(){
            var par = $(this).val();
            getPP(par);
        });

        $('#form-tambah').on('change', '#jenis', function(){
            $('#getRef').attr('disabled', false);
        });

        $('#form-tambah').on('click', '#getRef', function(){
            var jenis = $('#jenis').val();
            getRef(jenis)
        });

        var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
        var dataTable = $('#table-data').DataTable({
            // 'processing': true,
            // 'serverSide': true,
            'ajax': {
                'url': "{{ url('rtrw-master/reftrans') }}",
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
                            window.location.href = "{{ url('rtrw-auth/login') }}";
                        })
                        return [];
                    }
                }
            },
            'columnDefs': [
                {'targets': 6, data: null, 'defaultContent': action_html }
                ],
            'columns': [
                { data: 'kode_ref' },
                { data: 'nama' },
                { data: 'akun_debet' },
                { data: 'akun_kredit' },
                { data: 'jenis' },
                { data: 'pp' },
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
            $('#method').val('post');
            $('#akun_debet').val('');
            $('#label_akun_debet').text('');
            $('#akun_kredit').val('');
            $('#label_akun_kredit').text('');
            $('#kode_pp').val('');
            $('#label_kode_pp').text('');
            $('#saku-datatable').hide();
            $('#saku-form').show();
        });

        $('#saku-form').on('click', '#btn-kembali', function(){
            $('#saku-datatable').show();
            $('#saku-form').hide();
        });

        function showFilter(param,target1,target2){
            var par = param;
            var modul = '';
            var header = [];
            $target = target1;
            $target2 = target2;
            
            switch(par){
                case 'akun_debet': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('rtrw-master/masakun') }}";
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
                case 'akun_kredit': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('rtrw-master/masakun') }}";
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
                case 'kode_pp': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('rtrw-master/relakun-pp') }}";
                    var columns = [
                        { data: 'kode_pp' },
                        { data: 'kode_lokasi' }
                    ];
                    
                    var judul = "Daftar PP";
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

        $('#form-tambah').on('click', '.search-item2', function(){
            var par = $(this).closest('div').find('input').attr('name');
            var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
            target1 = par;
            target2 = par2;
            showFilter(par,target1,target2);
        });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('rtrw-master/reftrans') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('rtrw-master/reftrans') }}";
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
                        window.location.href = "{{ url('/rtrw-auth/login') }}";
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

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var kode= $(this).closest('tr').find('td').eq(0).html();
        var nama= $(this).closest('tr').find('td').eq(1).html();
        var debet= $(this).closest('tr').find('td').eq(2).html();
        var kredit= $(this).closest('tr').find('td').eq(3).html();
        var jenis= $(this).closest('tr').find('td').eq(4).html();
        var pp = $(this).closest('tr').find('td').eq(5).html();
        var kode_pp = pp.substr(0,2); 
        $iconLoad.show();
        getAkunDebet(debet);
        getAkunKredit(kredit);
        getPP(kode_pp);
        $('#method').val('put');
        $('#id_edit').val('edit');
        $('#getRef').attr('disabled', true);
        $('#id').val(kode);
        $('#jenis').val(jenis);
        $('#kode_ref').val(kode);
        $('#nama').val(nama);
        $('#row-id').show();
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $iconLoad.hide();
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
                    url: "{{ url('rtrw-master/reftrans') }}/"+id,
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
                                window.location.href = "{{ url('rtrw-auth/login') }}";
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

    </script>