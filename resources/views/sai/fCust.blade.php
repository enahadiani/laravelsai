<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="min-height: 560px;">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Customer 
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
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>PIC</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
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
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Data Customer
                            <button type="submit" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> <span>Simpan</span></button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style="min-height: 560px;">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_cust" class="col-3 col-form-label">Kode Customer</label>
                                <div class="input-group col-3">
                                    <input class="form-control" type="text" placeholder="Kode Customer" id="kode_cust" name="kode_cust">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama">
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="pic" class="col-3 col-form-label">PIC</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="PIC" id="pic" name="pic">
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="barcode" class="col-3 col-form-label">Email</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Email" id="email" name="email">
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="no_telp" class="col-3 col-form-label">No Telp</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="No Telp" id="no_telp" name="no_telp">
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="no_telp" class="col-3 col-form-label">Alamat</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Alamat" id="alamat" name="alamat">
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="no_rek" class="col-3 col-form-label">No Rek</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="No Rek" id="no_rek" name="no_rek">
                                    </div>
                                <label for="nama_rek" class="col-3 col-form-label">Nama Rek</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Nama Rek" id="nama_rek" name="nama_rek">
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="bank" class="col-3 col-form-label">Bank</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Bank" id="bank" name="bank">
                                    </div>
                                <label for="cabang" class="col-3 col-form-label">Cabang</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Cabang" id="cabang" name="cabang">
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-3 col-form-label">Tanggal Tagih</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" placeholder="Tanggal" id="tanggal" name="tanggal" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Foto</label>
                                <div class="input-group col-6">
                                    <div class="custom-file">
                                        <input type="file" name="file_gambar" class="custom-file-input" id="file_gambar">
                                        <label class="custom-file-label" for="file_gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
                                <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                            </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <style>
                                    th{
                                        vertical-align:middle !important;
                                    }
                                            /* #input-jurnal td{
                                                padding:0 !important;
                                            } */
                                     #input-jurnal .selectize-input, #input-jurnal .form-control, #input-jurnal .custom-file-label{
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
                                    #input-jurnal td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-jurnal td{
                                        overflow:hidden !important;
                                    }
                                    #input-jurnal td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#ff9500;color:white">
                                        <tr>
                                            <th style="width:10%">No</th>
                                            <th style="width:30%">Kode Lampiran</th>
                                            <th style="width:50%">Nama Lampiran</th>
                                            <th style="width:10%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
        var lampiran = null;

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
        });

        $('.custom-file-input').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('sai-master/customer') }}",
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
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 6, data: null, 'defaultContent': action_html },
            ],
        'columns': [
            { data: 'kode_cust' },
            { data: 'nama' },
            { data: 'alamat' },
            { data: 'pic' },
            { data: 'email' },
            { data: 'no_telp' }
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
        $('#input-grid tbody').empty();
        $('#kode_cust').attr('readonly',false);
        $('#file_gambar').val('');
        $('.custom-file-label').val('');
        $('#method').val('post');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

     $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    function getLampiran(id=null,index=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('sai-master/lampiran') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.kode_lampiran == id);
                            if(filter.length > 0) {
                                $('#kode_lampiran'+index).val(filter[0].kode_lampiran);
                                $('#label-lampiran-ke-'+index).text(filter[0].nama);
                            } else {
                                alert('Lampiran tidak valid');
                                $('#kode_lampiran'+index).val('');
                                $('#label-lampiran-ke-'+index).text('');
                                $('#kode_lampiran'+index).focus();
                            }
                        }
                    }
                }
            });
    }

    function getLampiran2(){
        $.ajax({
            type: 'GET',
            url: "{{ url('sai-master/lampiran') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                var data = result.daftar;
                lampiran = data;
            }
        });
    }

        function showFilter(param,target1,target2){
            var par = param;
            var modul = '';
            var header = [];
            $target = target1;
            $target2 = target2;
            
            switch(par){
                case 'kode_lampiran[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sai-master/lampiran') }}";
                    var columns = [
                        { data: 'kode_lampiran' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Lampiran";
                    var jTarget2 = "text";
                    var jTarget1 = "val";
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

    $("#input-grid").on('change', "input[name='kode_lampiran[]']",function(){
        var par = $(this).val();
        var index = $(this).closest('tr').index() + 1;
        getLampiran(par,index);
    })

    $('#input-grid').on('click', '.search-item', function(){
        var par1 = $(this).closest('tr').find('input').attr('id');
        var par2 = $(this).closest('tr').find('span').attr('id');
        var par3 = $(this).closest('tr').find('input').attr('name');
        var target1 = par3;
        var target2 = par1;
        var target3 = par2;
        showFilter(target1,target2,target3);
    });

    $('#form-tambah').on('click', '#add-row', function(){
        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'>"+no+"</td>";
        input += "<td><div class='input-group'><input type='text' name='kode_lampiran[]' id='kode_lampiran"+no+"' class='form-control' value='' required>"+
        "<div class='input-group-append'> <button class='btn btn-info search-item' type='button'><i class='fa fa-search'></i></button></div>"
        +"</div></td>";
        input += "<td><span id='label-lampiran-ke-"+no+"'></span></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);
    });

    $('#input-grid').on('click', '.hapus-item', function(){
            $(this).closest('tr').remove();
            no=1;
            $('.row-grid').each(function(){
                var nom = $(this).closest('tr').find('.no-grid1');
                nom.html(no);
                no++;
            });
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        var btnSave = $('#btn-simpan');
        var btnTextSave = $('#btn-simpan span');
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('sai-master/customer-ubah') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('sai-master/customer') }}";
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
            async:true,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                console.log('beforeSend')
                btnSave.attr('disabled', true);
                btnTextSave.text('Loading..');
            }, 
            complete:function(){
                console.log('complete')
                btnSave.attr('disabled', false);
                btnTextSave.text('Simpan');
            },
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
                        window.location.href = "{{ url('/sai-auth/login') }}";
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
            error: function(xhr, status, error){
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat field form yang kosong!',
                    footer: err.message
                })
            },
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
                    url: "{{ url('sai-master/customer') }}/"+id,
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
                                window.location.href = "{{ url('sai-auth/login') }}";
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
        $('#input-grid tbody').empty();
        getLampiran2();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('sai-master/customer') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    // var dataDate = result.data[0].tgl_tagih.split('-');
                    // var tgl = dataDate[2];
                    // var bln = dataDate[1];
                    // var tahun = dataDate[0]
                    // var tanggal =  tgl+"/"+bln+"/"+tahun;

                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#kode_cust').val(id);
                    $('#id').val(id);
                    $('#kode_cust').attr('readonly',true);
                    $('#file_gambar').val('');
                    $('.custom-file-label').val('');
                    $('#nama').val(result.data[0].nama);
                    $('#no_rek').val(result.data[0].no_rek);
                    $('#nama_rek').val(result.data[0].nama_rek);
                    $('#bank').val(result.data[0].bank);
                    $('#cabang').val(result.data[0].cabang);
                    $('#email').val(result.data[0].email);
                    $('#no_telp').val(result.data[0].no_telp);
                    $('#tanggal').val(tanggal);
                    $('#pic').val(result.data[0].pic);
                    $('#alamat').val(result.data[0].alamat);
                    if(result.data_lampiran.length > 0) {
                        var no = 1;
                        var input = "";
                        for(var i=0;i<result.data_lampiran.length;i++){
                            var line = result.data_lampiran[i];
                            var lamp = lampiran.filter(data=>data.kode_lampiran == line.kode_lampiran);

                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'>"+no+"</td>";
                            input += "<td><div class='input-group'><input type='text' name='kode_lampiran[]' id='kode_lampiran"+no+"' class='form-control' value='"+line.kode_lampiran+"' required>"+
                            "<div class='input-group-append'> <button class='btn btn-info search-item' type='button'><i class='fa fa-search'></i></button></div>"
                            +"</div></td>";
                            input += "<td><span id='label-lampiran-ke-"+no+"'>"+lamp[0].nama+"</span></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-grid tbody').append(input);
                    }
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
                        window.location.href = "{{ url('sai-auth/login') }}";
                    })
                }
                $iconLoad.hide();
            }
        });
    });

    </script>