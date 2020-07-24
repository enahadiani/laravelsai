<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Harga dan Tipe Room 
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
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Jenis Harga Promo Paket
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit" value="-">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id_data" name="id_data" value="-">
                                </div>
                            </div>
                                <div class="form-group row ">
								    <label for="kode" class="col-3 col-form-label">Kode</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Kode Paket" id="no_paket" name="no_paket">
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Nama Paket" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_produk" class="col-3 col-form-label">Kode Produk</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_produk" id="kode_produk" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_produk" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-3 col-form-label">Jenis Produk</label>
                                <div class="col-3">
                                    <select class='form-control' id="jenis" name="jenis">
                                        <option value='' disabled selected>--- Pilih Jenis ---</option>
                                        <option value='REGULER'>REGULER</option>
                                        <option value='PLUS'>PLUS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tarif_agen" class="col-3 col-form-label">Tarif Agen</label>
                                <div class="col-3">
                                    <input class="form-control harga" type="text" placeholder="Tarif Agen" id="tarif_agen" name="tarif_agen">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_curr" class="col-3 col-form-label">Currency</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_curr" name="kode_curr" readonly>
                                        <option value='IDR'>IDR</option>
                                        <option value='USD'>USD</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#bharga" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Harga</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bjadwal" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Jadwal</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                            <style>
                                th{
                                    vertical-align:middle !important;
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
                            </style>
                             <div class="tab-pane active" id="bharga" role="tab">
                                {{-- <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                    <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                    <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                    <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                </div> --}}
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <style>
                                    #input-harga .selectize-input, #input-harga .form-control, #input-harga .custom-file-label{
                                        border:0 !important;
                                        border-radius:0 !important;
                                    }
                                    #input-harga td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-harga td{
                                        overflow:hidden !important;
                                    }

                                    #input-harga td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-harga" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:5%">Kode</th>
                                        <th style="width:15%">Keterangan</th>
                                        <th style="width:10%">Harga Std</th>
                                        <th style="width:10%">Harga Semi Eks.</th>
                                        <th style="width:10%">Harga Eks.</th>
                                        <th style="width:10%">Fee Agen</th>
                                        <th style="width:10%">Curr</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                                </div>
                                <div class="tab-pane" id="bjadwal" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                    <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                    <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                    <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <style>
                                    #input-jadwal .selectize-input, #input-jadwal .form-control, #input-jadwal .custom-file-label{
                                        border:0 !important;
                                        border-radius:0 !important;
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
                                        <th style="width:15%">Tgl Plan</th>
                                        <th style="width:15%">Tgl Aktual</th>
                                        <th style="width:10%">Lama hari</th>
                                        <th style="width:15%">Q Std</th>
                                        <th style="width:15%">Q Semi Eks</th>
                                        <th style="width:15%">Q Eks</th>
                                        <th style="width:10%">ID</th>
                                        {{-- <th style="width:10%"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
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

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('dago-master/paket') }}",
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
            { data: 'jenis' },
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
        $('#input-harga tbody').empty();
        $('#input-jadwal tbody').empty();
        $('#method').val('post');
        $('#id_edit').val('-');
        $('#id_data').val('-');
        $('#method').val('post');
        $('#no_paket').attr('readonly', false);
        $('#label_kode_produk').text('');
        $('#kode_curr').val('IDR');
        $('#jenis').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#saku-form').on('blur', '#no_paket', function(){
        var bodytableHarga = $('#input-harga tbody tr').length;
        var currency = $('#kode_curr').val();
        if(bodytableHarga <= 0) {
            $.ajax({
                url: "{{ url('dago-master/jenis-harga') }}",
                type: 'GET',
                success: function(result) {
                    var input = "";
                    var no = 1;
                    if(result.status){
                    for(var i=0;i<result.daftar.length;i++){
                        var line = result.daftar[i];    
                        input += "<tr class='row-harga'>";
                        input += "<td class='no-harga text-center'>"+no+"</td>";
                        input += "<td><span class='td-kodeharga tdkodehargake"+no+"'>"+line.kode_harga+"</span><input name='kode_harga[]' class='form-control inp-kdharga kdhargake"+no+" hidden' value='"+line.kode_harga+"' readonly /></td>";
                        input += "<td><span class='td-namaharga tdnamahargake"+no+"'>"+line.nama+"</span><input name='nama_harga[]' class='form-control inp-nmharga nmhargake"+no+" hidden' value='"+line.nama+"' readonly /></td>";
                        input += "<td><input name='harga_std[]' class='form-control hargake"+no+" inp-hargastd hargastdke"+no+"' value='0' /></td>";
                        input += "<td><input name='harga_semi[]' class='form-control hargake"+no+" inp-hargasemi hargasemike"+no+"' value='0' /></td>";
                        input += "<td><input name='harga_eks[]' class='form-control hargake"+no+" inp-hargaeks hargaekske"+no+"' value='0' /></td>";
                        input += "<td><input name='harga_agen[]' class='form-control hargake"+no+" inp-hargaagen hargaagenke"+no+"' value='0' /></td>";
                        input += "<td><select name='curr[]' class='form-control inp-curr currke"+no+"' required><option val='IDR'>IDR</option><option val='USD'>USD</option></select></td>";
                        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                        input += "</tr>";

                        no++;
                    }
                    $('#input-harga tbody').html(input);
                    var nomor = 1;
                    for(var i=0;i<result.daftar.length;i++){
                        $('.currke',+no).val(currency);
                        $('.hargake'+nomor).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        nomor++;
                    }
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error..',
                        text: 'Terjadi kesalahan',
                    })
                }
                }
            });
        } else {
            return;
        }
    });

    $('#input-harga tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-harga tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    
    $('#input-harga').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-harga').each(function(){
            var nom = $(this).closest('tr').find('.no-harga');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#form-tambah').on('click', '#add-row', function(){
        var noJadwal = $('#input-jadwal .row-jadwal:last').index();
        noJadwal = noJadwal+2;
        var inputJadwal = "";
        inputJadwal += "<tr class='row-jadwal'>";
        inputJadwal += "<td class='no-jadwal text-center'>"+noJadwal+"</td>";
        inputJadwal += "<td><input type='text' name='tgl_plan[]' class='form-control datepickerke"+noJadwal+" inp-tglplan tglplanke"+noJadwal+"' value='' required'/></td>";
        inputJadwal += "<td><input type='text' name='tgl_akt[]' class='form-control datepickerke"+noJadwal+" inp-tglakt tglaktke"+noJadwal+"' value='' required'/></td>";
        inputJadwal += "<td><input type='text' name='hari[]' class='form-control inp-hari harike"+noJadwal+"' value='' required'/></td>";
        inputJadwal += "<td><input name='q_std[]' class='form-control qke"+noJadwal+" inp-qstd qstdke"+noJadwal+"' value='0' required /></td>";
        inputJadwal += "<td><input name='q_semi[]' class='form-control qke"+noJadwal+" inp-qsemi qsemike"+noJadwal+"' value='0' required /></td>";
        inputJadwal += "<td><input name='q_eks[]' class='form-control qke"+noJadwal+" inp-qeks qekske"+noJadwal+"' value='0' required /></td>";
        inputJadwal += "<td><input name='id[]' class='form-control inp-id idke"+noJadwal+"' value='"+noJadwal+"' required readonly /></td>";
        // inputJadwal += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        inputJadwal += "</tr>";

        $('#input-jadwal tbody').append(inputJadwal);
        $('.datepickerke'+noJadwal).datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        $('.qke'+noJadwal).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
    });

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            var tgl_plan = $('#input-jadwal tbody tr.selected-row').find(".inp-tglplan").val();
            var tgl_akt= $('#input-jadwal tbody tr.selected-row').find(".inp-tglakt").val();
            var hari= $('#input-jadwal tbody tr.selected-row').find(".inp-hari").val();
            var qstd= $('#input-jadwal tbody tr.selected-row').find(".inp-qstd").val();
            var qsemi= $('#input-jadwal tbody tr.selected-row').find(".inp-qsemi").val();
            var qeks= $('#input-jadwal tbody tr.selected-row').find(".inp-qeks").val();
            var id= $('#input-jadwal tbody tr.selected-row').find(".inp-id").val();
            var noJadwal=$('#input-jadwal .row-jadwal:last').index();
            noJadwal=noJadwal+2;
            var inputJadwal = "";
            inputJadwal += "<tr class='row-jadwal'>";
            inputJadwal += "<td class='no-jadwal text-center'>"+noJadwal+"</td>";
            inputJadwal += "<td><input type='text' name='tgl_plan[]' class='form-control datepickerke"+noJadwal+" inp-tglplan tglplanke"+noJadwal+"' value='"+tgl_plan+"' required></td>";
            inputJadwal += "<td><input type='text' name='tgl_akt[]' class='form-control datepickerke"+noJadwal+" inp-tglakt tglaktke"+noJadwal+"' value='"+tgl_akt+"' required></td>";
            inputJadwal += "<td><input type='text' name='hari[]' class='form-control inp-hari harike"+noJadwal+"' value='"+hari+"' required/></td>";
            inputJadwal += "<td><input name='q_std[]' class='form-control qke"+noJadwal+" inp-qstd qstdke"+noJadwal+"' value='"+qstd+"' required /></td>";
            inputJadwal += "<td><input name='q_semi[]' class='form-control qke"+noJadwal+" inp-qsemi qsemike"+noJadwal+"' value='"+qsemi+"' required /></td>";
            inputJadwal += "<td><input name='q_eks[]' class='form-control qke"+noJadwal+" inp-qeks qekske"+noJadwal+"' value='"+qeks+"' required /></td>";
            inputJadwal += "<td><input name='id[]' class='form-control inp-id idke"+noJadwal+"' value='"+id+"' required readonly /></td>";
            // inputJadwal += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
            $('#input-jadwal tbody').append(inputJadwal);
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }
    });

    $('#kode_curr').on('change', function() {
        var kodeCurr = $(this).val();
        $('.inp-curr').val(kodeCurr)
    });

    $('#input-jadwal tbody').on('click', 'tr', function(){
        if ($(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-jadwal tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    // $('#input-jadwal').on('click', '.hapus-item', function(){
    //     $(this).closest('tr').remove();
    //     no=1;
    //     $('.row-jadwal').each(function(){
    //         var nom = $(this).closest('tr').find('.no-jadwal');
    //         nom.html(no);
    //         no++;
    //     });
    //     $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    // });

    $('#input-jadwal').on('change', '.inp-tglplan', function(){
        var tgl_plan = $('#input-jadwal tbody tr').find(".inp-tglplan").val();
        if(tgl_plan == '' || tgl_plan == undefined) {
            var date = new Date();
            var bulan = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
            var tgl = date.getDate() + "/" + bulan + "/" + date.getFullYear();
            $('#input-jadwal tbody tr').find(".inp-tglplan").val(tgl);
        }
    });

    $('#input-jadwal').on('blur', '.inp-tglplan', function(){
        var tgl_plan = $('#input-jadwal tbody tr').find(".inp-tglplan").val();
        if(tgl_plan == '' || tgl_plan == undefined) {
            var date = new Date();
            var bulan = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
            var tgl = date.getDate() + "/" + bulan + "/" + date.getFullYear();
            $('#input-jadwal tbody tr').find(".inp-tglplan").val(tgl);
        }
    });

    $('#input-jadwal').on('change', '.inp-tglakt', function(){
        var tgl_plan = $('#input-jadwal tbody tr').find(".inp-tglakt").val();
        if(tgl_plan == '' || tgl_plan == undefined) {
            var date = new Date();
            var bulan = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
            var tgl = date.getDate() + "/" + bulan + "/" + date.getFullYear();
            $('#input-jadwal tbody tr').find(".inp-tglakt").val(tgl);
        }
    });

    $('#input-jadwal').on('blur', '.inp-tglakt', function(){
        var tgl_plan = $('#input-jadwal tbody tr').find(".inp-tglakt").val();
        if(tgl_plan == '' || tgl_plan == undefined) {
            var date = new Date();
            var bulan = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
            var tgl = date.getDate() + "/" + bulan + "/" + date.getFullYear();
            $('#input-jadwal tbody tr').find(".inp-tglakt").val(tgl);
        }
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
            case 'kode_produk': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('dago-master/produk') }}";
                var columns = [
                    { data: 'kode_produk' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Produk";
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
        var id = $('#id_data').val();
        if(parameter == "edit"){
            var url = "{{ url('dago-master/paket') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('dago-master/paket') }}";
            var pesan = "saved";
        }

        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
            if(pair[1] == '' || pair[1] == null) {
                alert('Form tidak boleh ada yang kosong!')
                break;
            }
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
                    url: "{{ url('dago-master/paket') }}/"+id,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status === 'SUCCESS'){
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
            url: "{{ url('dago-master/paket-detail') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status === 'SUCCESS'){
                    $('#input-harga tbody').empty();
                    $('#input-jadwal tbody').empty();
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_paket').attr('readonly', true);
                    $('#no_paket').val(id);
                    $('#id_data').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#tarif_agen').val(result.data[0].tarif_agen);
                    $('#kode_produk').val(result.data[0].kode_produk);
                    $('#kode_curr').val(result.data[0].kode_curr);
                    $('#jenis').val(result.data[0].jenis);
                    getLabelProduk(result.data[0].kode_produk);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    if(result.data_harga.length > 0) {
                        var input = "";
                        var no = 1;
                        for(var i=0;i<result.data_harga.length;i++) {
                            var lineHarga = result.data_harga[i];
                            var std = parseFloat(lineHarga.harga);
                            var semi = parseFloat(lineHarga.harga_se);
                            var eks = parseFloat(lineHarga.harga_e);
                            var fee = parseFloat(lineHarga.fee);
                            var hargaStd = std.toFixed();
                            var hargaSemi = semi.toFixed();
                            var hargaEks = eks.toFixed();
                            var hargaAgen = fee.toFixed();
                            input += "<tr class='row-harga'>";
                            input += "<td class='no-harga text-center'>"+no+"</td>";
                            input += "<td><span class='td-kodeharga tdkodehargake"+no+"'>"+lineHarga.kode_harga+"</span><input name='kode_harga[]' class='form-control inp-kdharga kdhargake"+no+" hidden' value='"+lineHarga.kode_harga+"' readonly /></td>";
                            input += "<td><span class='td-namaharga tdnamahargake"+no+"'>"+lineHarga.nama+"</span><input name='nama_harga[]' class='form-control inp-nmharga nmhargake"+no+" hidden' value='"+lineHarga.nama+"' readonly /></td>";
                            input += "<td><input name='harga_std[]' class='form-control hargake"+no+" inp-hargastd hargastdke"+no+"' value='"+hargaStd+"' /></td>";
                            input += "<td><input name='harga_semi[]' class='form-control hargake"+no+" inp-hargasemi hargasemike"+no+"' value='"+hargaSemi+"' /></td>";
                            input += "<td><input name='harga_eks[]' class='form-control hargake"+no+" inp-hargaeks hargaekske"+no+"' value='"+hargaEks+"' /></td>";
                            input += "<td><input name='harga_agen[]' class='form-control hargake"+no+" inp-hargaagen hargaagenke"+no+"' value='"+hargaAgen+"' /></td>";
                            input += "<td><select name='curr[]' class='form-control inp-curr currke"+no+"' required><option val='IDR'>IDR</option><option val='USD'>USD</option></select></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                            input += "</tr>";

                            no++;
                        }
                        $('#input-harga tbody').html(input);
                        no = 1;
                        for(var i=0;i<result.data_harga.length;i++){
                        var lineHarga = result.data_harga[i];
                        $('.currke'+no).val(lineHarga.curr_fee);
                        $('.hargake'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { var self =this; self.Value(''); }
                        });
                        no++;
                        }
                    }
                    if(result.data_jadwal.length > 0) {
                        console.log(result.data_jadwal)
                        var inputJadwal = "";
                        var nomor = 1;
                        for(var i=0;i<result.data_jadwal.length;i++) {
                            var lineJadwal = result.data_jadwal[i];
                            var splitTglBerangkat = lineJadwal.tgl_berangkat.split('-');
                            var tahun_berangkat = splitTglBerangkat[0];
                            var bulan_berangkat = splitTglBerangkat[1];
                            var tgl_berangkat = splitTglBerangkat[2];
                            var berangkat = tgl_berangkat+"/"+bulan_berangkat+"/"+tahun_berangkat;

                            var splitTglDatang = lineJadwal.tgl_datang.split('-');
                            var tahun_datang = splitTglDatang[0];
                            var bulan_datang = splitTglDatang[1];
                            var tgl_datang = splitTglDatang[2];
                            var datang = tgl_datang+"/"+bulan_datang+"/"+tahun_datang;

                            inputJadwal += "<tr class='row-jadwal'>";
                            inputJadwal += "<td class='no-jadwal text-center'>"+nomor+"</td>";
                            inputJadwal += "<td><input type='text' name='tgl_plan[]' class='form-control datepickerke"+nomor+" inp-tglplan tglplanke"+nomor+"' value='"+berangkat+"' required readonly></td>";
                            inputJadwal += "<td><input type='text' name='tgl_akt[]' class='form-control datepickerke"+nomor+" inp-tglakt tglaktke"+nomor+"' value='"+datang+"' required readonly></td>";
                            inputJadwal += "<td><input type='text' name='hari[]' class='form-control inp-hari harike"+nomor+"' value='"+lineJadwal.lama_hari+"' required readonly></td>";
                            inputJadwal += "<td><input name='q_std[]' class='form-control qke"+nomor+" inp-qstd qstdke"+nomor+"' value='"+parseFloat(lineJadwal.quota)+"' required readonly></td>";
                            inputJadwal += "<td><input name='q_semi[]' class='form-control qke"+nomor+" inp-qsemi qsemike"+nomor+"' value='"+parseFloat(lineJadwal.quota_se)+"' required readonly></td>";
                            inputJadwal += "<td><input name='q_eks[]' class='form-control qke"+nomor+" inp-qeks qekske"+nomor+"' value='"+parseFloat(lineJadwal.quota_e)+"' required readonly></td>";
                            inputJadwal += "<td><input name='id[]' class='form-control inp-id idke"+nomor+"' value='"+lineJadwal.no_jadwal+"' required readonly /></td>";
                            // inputJadwal += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";    
                            
                            nomor++
                        }
                        $('#input-jadwal tbody').html(inputJadwal);
                         nomor = 1;
                        for(var i=0;i<result.data_jadwal.length;i++) {
                            $('.datepickerke'+nomor).datepicker({
                                format: 'dd/mm/yyyy',
                                autoclose: true,
                            });
                            $('.qke'+nomor).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { var self = this; self.Value(''); }
                            });
                            nomor++;
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