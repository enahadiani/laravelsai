<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Perubahan Jadwal 
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
                                        <th>Kode Paket</th>
                                        <th>Nama</th>
                                        <th>Kode Curr</th>
                                        <th>Jenis Produk</th>
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
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Perubahan Jadwal
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                                <div class="form-group row ">
								    <label for="kode" class="col-3 col-form-label">No Paket</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Nomor Paket" id="no_paket" name="no_paket">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama Paket</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Nama Paket" id="nama" name="nama">
                                </div>
                            </div>

                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <style>
                                    th{
                                        vertical-align:middle !important;
                                    }
                                    /* #input-jurnal td{
                                        padding:0 !important;
                                    } */
                                    #input-jadwal .selectize-input, #input-jadwal .form-control, #input-jadwal .custom-file-label{
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
                                    #input-jadwal td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-jadwal td{
                                        overflow:hidden !important;
                                    }

                                    #input-jadwal td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-jadwal" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:20%">ID</th>
                                        <th>Jadwal lama</th>
                                        <th>Jadwal Baru</th>
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

        $('.harga').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        function getProduk(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('dago-master/produk') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#kode_produk').val(result.daftar[0].kode_produk);
                            $('#label_kode_produk').text(result.daftar[0].nama);
                        }else{
                            alert('Kode Produk tidak valid');
                            $('#kode_produk').val('');
                            $('#kode_produk').focus();
                        }
                    }
                }
            });
    }

    function getLabelProduk(id){
            $.ajax({
                type: 'GET',
                url: "{{ url('dago-master/produk') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_produk === id){
                                $('#label_kode_produk').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode Produk tidak valid');
                            $('#kode_produk').val('');
                            $('#kode_produk').focus();
                        }
                    }
                }
            });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('dago-master/jadwal') }}",
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
            {'targets': 4, data: null, 'defaultContent': action_html },
            ],
        'columns': [
            { data: 'no_paket' },
            { data: 'nama' },
            { data: 'kode_curr' },
            { data: 'nama_produk' },
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
        $('#id_data').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#no_paket').attr('readonly', false);
        $('#label_kode_produk').text('');
        $('#kode_curr')[0].selectize.setValue('');
        $('#jenis')[0].selectize.setValue('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#input-jadwal tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-jadwal tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-jadwal').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-jadwal td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var jadwal_baru = $(this).parents("tr").find(".inp-jadwalbaru").val();
                var no = $(this).parents("tr").find(".no-jadwal").text();
    
                $(this).parents("tr").find(".inp-jadwalbaru").val(jadwal_baru);
                $(this).parents("tr").find(".td-jadwalbaru").text(jadwal_baru);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-jadwalbaru").show();
                    $(this).parents("tr").find(".td-jadwalbaru").hide();
                    $(this).parents("tr").find(".inp-jadwalbaru").focus();
                }else{
                    $(this).parents("tr").find(".inp-jadwalbaru").hide();
                    $(this).parents("tr").find(".td-jadwalbaru").show();
                }
            }
        }
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('dago-master/jadwal') }}/"+id;
            var pesan = "updated";
        }else{
            // var url = "{{ url('dago-master/paket') }}";
            // var pesan = "saved";
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
                if(result.data.status === 'SUCCESS'){
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

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var nama= $(this).closest('tr').find('td').eq(1).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-master/jadwal-detail') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status === 'SUCCESS'){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_paket').attr('readonly', true);
                    $('#no_paket').val(id);
                    $('#nama').attr('readonly', true);
                    $('#nama').val(nama);
                    $('#id').val(id);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();

                    if(result.data.length > 0) {
                        var input = "";
                        var no = 1;
                        for(var i=0;i<result.data.length;i++) {
                            var line = result.data[i];
                            input += "<tr class='row-jadwal'>";
                            input += "<td class='no-jadwal text-center'>"+no+"</td>";
                            input += "<td><span class='td-jadwalid tdjadwalidke"+no+"'>"+line.no_jadwal+"</span><input type='text' name='no_jadwal[]' class='form-control inp-jadwalid jadwalidke"+no+" hidden' value='"+line.no_jadwal+"' required></td>";
                            input += "<td><span class='td-jadwallama tdjadwallamake"+no+"'>"+line.tgl_berangkat+"</span><input type='text' name='jadwal_lama[]' class='form-control datepickerke"+no+" inp-jadwallama jadwallamake"+no+" hidden' value='"+line.tgl_berangkat+"' required></td>";
                            input += "<td><span class='td-jadwalbaru tdjadwalbaruke"+no+"'>"+line.tgl_berangkat+"</span><input type='text' name='jadwal_baru[]' class='form-control datepickerke"+no+" inp-jadwalbaru jadwalbaruke"+no+" hidden' value='"+line.tgl_berangkat+"' required></td>";
                            input += "</tr>";

                            no++;
                        }
                        $('#input-jadwal tbody').html(input);
                        no = 1;
                        for(var i=0;i<result.data.length;i++) {
                            $('.datepickerke'+no).datepicker({
                                format: 'dd/mm/yyyy',
                                startDate: new Date()
                            });
                        }
                    }
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