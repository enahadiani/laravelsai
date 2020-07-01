<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px;">
                    <div class="card-body">
                        <h4 class="card-title">Data Saldo Awal
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
                            i:hover{
                                cursor: pointer;
                                color: blue;
                            }

                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>Kode Akun</th>
                                        <th>Nama Akun</th>
                                        <th>Saldo Awal</th>
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
                <div class="card" style="height:280px">
                        <form class="form" id="form-tambah">
                            <div class="card-body pb-0">
                                <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Saldo Awal
                                <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                                </h4>
                                <hr>
                            </div>
                            <div class="card-body table-responsive pt-0" style='height:461px'>
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input type="hidden" id="id_edit" name="id_edit">
                                        <input type="hidden" id="method" name="_method" value="post">
                                        <input type="hidden" id="id" name="id">
                                        <input type="hidden" id="pp" name="pp">
                                        <input type="hidden" id="per" name="per">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_akun" class="col-3 col-form-label">Kode Akun</label>
                                    <div class="input-group col-3">
                                        <input required type='text' name="kode_akun" id="kode_akun" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                    </div>
                                    <div class="col-6">
                                        <label id="label_kode_akun" style="margin-top: 10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_pp" class="col-3 col-form-label">PP/Unit</label>
                                    <div class="input-group col-3">
                                        <input required type='text' name="kode_pp" id="kode_pp" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                    </div>
                                    <div class="col-6">
                                        <label id="label_kode_pp" style="margin-top: 10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="periode" class="col-3 col-form-label">Periode</label>
                                    <div class="col-3">
                                        <input class="form-control datepicker" type="text" placeholder="YYYYMM" id="periode" name="periode" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="so_akhir" class="col-3 col-form-label">Saldo Awal</label>
                                    <div class="col-3">
                                        <input class="form-control currency" type="text" placeholder="Saldo Awal" id="so_akhir" name="so_akhir" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </form>
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

    function getAkun(id=null){
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
                                $('#kode_akun').val(filter[0].kode_akun);
                                $('#label_kode_akun').text(filter[0].nama);
                        } else {
                                alert('Akun tidak valid');
                                $('#kode_akun').val('');
                                $('#label_kode_akun').text('');
                                $('#kode_akun').focus();
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

    $('#form-tambah').on('change', '#kode_akun', function(){
        var par = $(this).val();
        getAkun(par);
    });

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('rtrw-master/setting-saldo-awal') }}",
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
            {'targets': 3, data: null, 'defaultContent': action_html },
            {
                'targets': [2],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            },
            ],
        'columns': [
            { data: 'kode_akun' },
            { data: 'nama_akun' },
            { data: 'so_akhir' }
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
        $('#kode_pp').val('');
        $('#kode_pp').attr('readonly',false);
        $('#periode').attr('readonly',false);
        $('.search-item2').show();
        $('#label_kode_pp').text('');
        $('#kode_akun').val('');
        $('#kode_akun').attr('readonly',false);
        $('#label_kode_akun').text('');
        $('#modul').val('');
        $('#label_modul').text('');
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
            case 'kode_akun':
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
        var pp = $('#pp').val();
        var per = $('#per').val();
        if(parameter == "edit"){
            var url = "{{ url('rtrw-master/setting-saldo-awal') }}/"+id+"/"+pp+"/"+per;
            var pesan = "updated";
        }else{
            var url = "{{ url('rtrw-master/setting-saldo-awal') }}";
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
        var pp= $(this).closest('tr').find('td').eq(1).html();
        var periode= $(this).closest('tr').find('td').eq(2).html();
        var saldo= $(this).closest('tr').find('td').eq(3).html();
        // var kode_pp = pp.substr(0,2);
        $iconLoad.show();
        getAkun(kode);
        getPP(pp);
        $('.search-item2').hide();
        $('#kode_pp').attr('readonly',true);
        $('#kode_akun').attr('readonly',true);
        $('#periode').attr('readonly',true);
        $('#method').val('put');
        $('#id_edit').val('edit');
        $('#id').val(kode);
        $('#pp').val(pp);
        $('#per').val(periode);
        $('#periode').val(periode);
        $('#so_akhir').val(saldo);
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
                var kode= $(this).closest('tr').find('td').eq(0).html();
                var pp= $(this).closest('tr').find('td').eq(1).html();
                var periode= $(this).closest('tr').find('td').eq(2).html();
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('rtrw-master/setting-saldo-awal') }}/"+kode+"/"+pp+"/"+periode,
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