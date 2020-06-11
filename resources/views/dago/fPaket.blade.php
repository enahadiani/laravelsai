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
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
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
                                    <select class='form-control selectize' id="jenis" name="jenis">
                                        <option value='' disabled>--- Pilih Jenis ---</option>
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
                                    <select class='form-control selectize' id="kode_curr" name="kode_curr">
                                        <option value='' disabled>--- Pilih Currency ---</option>
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
                                        <th style="width:10%"></th>
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

    $('#saku-form').on('blur', '#no_paket', function(){
        var bodytableHarga = $('#input-harga tbody tr').length;
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
                        input += "<td><span class='td-hargastd tdhargastdke"+no+"'>0</span><input name='harga_std[]' class='form-control hargake"+no+" inp-hargastd hargastdke"+no+" hidden' value='0' /></td>";
                        input += "<td><span class='td-hargasemi tdhargasemike"+no+"'>0</span><input name='harga_semi[]' class='form-control hargake"+no+" inp-hargasemi hargasemike"+no+" hidden' value='0' /></td>";
                        input += "<td><span class='td-hargaeks tdhargaekske"+no+"'>0</span><input name='harga_eks[]' class='form-control hargake"+no+" inp-hargaeks hargaekske"+no+" hidden' value='0' /></td>";
                        input += "<td><span class='td-hargaagen tdhargaagenke"+no+"'>0</span><input name='harga_agen[]' class='form-control hargake"+no+" inp-hargaagen hargaagenke"+no+" hidden' value='0' /></td>";
                        input += "<td><span class='td-curr tdcurrke"+no+"'></span><select name='curr[]' class='form-control inp-curr currke"+no+"' value='' required><option value='IDR'>IDR</option><option value='USD'>USD</option></select></td>";
                        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                        input += "</tr>";

                        no++;
                    }
                    $('#input-harga tbody').html(input);
                    no = 1;
                    for(var i=0;i<result.daftar.length;i++){
                        $('.currke'+no).addClass('hidden');
                        $('.hargake'+no).inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () { self.Value(''); }
                        });
                        no++;
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
        if ($(this).hasClass('selected-row') ) {
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

    $('#input-harga').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-harga td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_harga = $(this).parents("tr").find(".inp-kdharga").val();
                var keterangan = $(this).parents("tr").find(".inp-nmharga").val();
                var hargaStd = $(this).parents("tr").find(".inp-hargastd").val();
                var hargaSemi = $(this).parents("tr").find(".inp-hargasemi").val();
                var hargaEks = $(this).parents("tr").find(".inp-hargaeks").val();
                var Agen = $(this).parents("tr").find(".inp-hargaagen").val();
                var curr = $(this).parents("tr").find(".td-curr").text();
                var no = $(this).parents("tr").find(".no-harga").text();

                $(this).parents("tr").find(".inp-kdharga").val(kode_harga);
                $(this).parents("tr").find(".td-kodeharga").text(kode_harga);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kdharga").show();
                    $(this).parents("tr").find(".td-kodeharga").hide();
                }else{
                    $(this).parents("tr").find(".inp-kdharga").hide();
                    $(this).parents("tr").find(".td-kodeharga").show();
                    
                }
        
                $(this).parents("tr").find(".inp-nmharga").val(keterangan);
                $(this).parents("tr").find(".td-namaharga").text(keterangan);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nmharga").show();
                    $(this).parents("tr").find(".td-namaharga").hide();
                }else{
                    
                    $(this).parents("tr").find(".inp-nmharga").hide();
                    $(this).parents("tr").find(".td-namaharga").show();
                }
        
                $(this).parents("tr").find(".inp-hargastd").val(hargaStd);
                $(this).parents("tr").find(".td-hargastd").text(hargaStd);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-hargastd").show();
                    $(this).parents("tr").find(".td-hargastd").hide();
                    $(this).parents("tr").find(".inp-hargastd").focus();
                }else{
                    $(this).parents("tr").find(".inp-hargastd").hide();
                    $(this).parents("tr").find(".td-hargastd").show();
                }

                $(this).parents("tr").find(".inp-hargasemi").val(hargaSemi);
                $(this).parents("tr").find(".td-hargasemi").text(hargaSemi);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-hargasemi").show();
                    $(this).parents("tr").find(".td-hargasemi").hide();
                    $(this).parents("tr").find(".inp-hargasemi").focus();
                }else{
                    $(this).parents("tr").find(".inp-hargasemi").hide();
                    $(this).parents("tr").find(".td-hargasemi").show();
                }

                $(this).parents("tr").find(".inp-hargaeks").val(hargaEks);
                $(this).parents("tr").find(".td-hargaeks").text(hargaEks);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-hargaeks").show();
                    $(this).parents("tr").find(".td-hargaeks").hide();
                    $(this).parents("tr").find(".inp-hargaeks").focus();
                }else{
                    $(this).parents("tr").find(".inp-hargaeks").hide();
                    $(this).parents("tr").find(".td-hargaeks").show();
                }

                $(this).parents("tr").find(".inp-hargaagen").val(Agen);
                $(this).parents("tr").find(".td-hargaagen").text(Agen);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-hargaagen").show();
                    $(this).parents("tr").find(".td-hargaagen").hide();
                    $(this).parents("tr").find(".inp-hargaagen").focus();
                }else{
                    $(this).parents("tr").find(".inp-hargaagen").hide();
                    $(this).parents("tr").find(".td-hargaagen").show();
                }

                $(this).parents("tr").find(".inp-curr").val(curr);
                $(this).parents("tr").find(".td-curr").text(curr);
                if(idx == 7){
                    $('.currke'+no).val(curr);
                    var dcx = $('.tdcurrke'+no).text();
                    if(dcx == ""){
                        $('.tdcurrke'+no).text('IDR');  
                    }
                    
                    $(this).parents("tr").find(".inp-curr").show();
                    $(this).parents("tr").find(".td-curr").hide();
                    $(this).parents("tr").find(".inp-curr").focus();
                    
                }else{
                    
                    $(this).parents("tr").find(".inp-curr").hide();
                    $(this).parents("tr").find(".td-curr").show();
                }

            }
        }
    });

    $('#form-tambah').on('click', '#add-row', function(){
        var noJadwal = $('#input-jadwal .row-jadwal:last').index();
        noJadwal = noJadwal+2;
        var inputJadwal = "";
        inputJadwal += "<tr class='row-jadwal'>";
        inputJadwal += "<td class='no-jadwal text-center'>"+noJadwal+"</td>";
        inputJadwal += "<td><span class='td-tglplan tdtglplanke"+noJadwal+"'></span><input type='text' name='tgl_plan[]' class='form-control datepickerke"+noJadwal+" inp-tglplan tglplanke"+noJadwal+" hidden value='' required'/></td>";
        inputJadwal += "<td><span class='td-tglakt tdtglaktke"+noJadwal+"'></span><input type='text' name='tgl_akt[]' class='form-control datepickerke"+noJadwal+" inp-tglakt tglaktke"+noJadwal+" hidden value='' required'/></td>";
        inputJadwal += "<td><span class='td-hari tdharike"+noJadwal+"'></span><input type='text' name='hari[]' class='form-control inp-hari harike"+noJadwal+" hidden value='' required'/></td>";
        inputJadwal += "<td><span class='td-qstd tdqstdke"+noJadwal+"'>0</span><input name='q_std[]' class='form-control qke"+noJadwal+" inp-qstd qstdke"+noJadwal+" hidden' value='0' required /></td>";
        inputJadwal += "<td><span class='td-qsemi tdqsemike"+noJadwal+"'>0</span><input name='q_semi[]' class='form-control qke"+noJadwal+" inp-qsemi qsemike"+noJadwal+" hidden' value='0' required /></td>";
        inputJadwal += "<td><span class='td-qeks tdqekske"+noJadwal+"'>0</span><input name='q_eks[]' class='form-control qke"+noJadwal+" inp-qeks qekske"+noJadwal+" hidden' value='0' required /></td>";
        inputJadwal += "<td><span class='td-id tdidke"+noJadwal+"'></span><input name='id[]' class='form-control inp-id idke"+noJadwal+" hidden' value='' required /></td>";
        inputJadwal += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        inputJadwal += "</tr>";

        $('#input-jadwal tbody').append(inputJadwal);
        $('.datepickerke'+noJadwal).datepicker({
            format: 'yyyy/mm/dd'
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

    $('#input-jadwal tbody').on('click', 'tr', function(){
        if ($(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-jadwal tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-jadwal').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jadwal').each(function(){
            var nom = $(this).closest('tr').find('.no-jadwal');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
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
        
                var tgl_plan = $(this).parents("tr").find(".inp-tglplan").val();
                var tgl_akt = $(this).parents("tr").find(".inp-tglakt").val();
                var hari = $(this).parents("tr").find(".inp-hari").val();
                var q_std = $(this).parents("tr").find(".inp-qstd").val();
                var q_semi = $(this).parents("tr").find(".inp-qsemi").val();
                var q_eks = $(this).parents("tr").find(".inp-qeks").val();
                var id = $(this).parents("tr").find(".inp-id").val();
                var no = $(this).parents("tr").find(".no-jadwal").text();

                $(this).parents("tr").find(".inp-tglplan").val(tgl_plan);
                $(this).parents("tr").find(".td-tglplan").text(tgl_plan);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-tglplan").show();
                    $(this).parents("tr").find(".td-tglplan").hide();
                    $(this).parents("tr").find(".inp-tglplan").focus();
                }else{
                    $(this).parents("tr").find(".inp-tglplan").hide();
                    $(this).parents("tr").find(".td-tglplan").show();
                }
        
                $(this).parents("tr").find(".inp-tglakt").val(tgl_akt);
                $(this).parents("tr").find(".td-tglakt").text(tgl_akt);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-tglakt").show();
                    $(this).parents("tr").find(".td-tglakt").hide();
                    $(this).parents("tr").find(".inp-tglakt").focus();

                }else{
                    $(this).parents("tr").find(".inp-tglakt").hide();
                    $(this).parents("tr").find(".td-tglakt").show();
                }
        
                $(this).parents("tr").find(".inp-hari").val(hari);
                $(this).parents("tr").find(".td-hari").text(hari);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-hari").show();
                    $(this).parents("tr").find(".td-hari").hide();
                    $(this).parents("tr").find(".inp-hari").focus();
                }else{
                    $(this).parents("tr").find(".inp-hari").hide();
                    $(this).parents("tr").find(".td-hari").show();
                }

                $(this).parents("tr").find(".inp-qstd").val(q_std);
                $(this).parents("tr").find(".td-qstd").text(q_std);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-qstd").show();
                    $(this).parents("tr").find(".td-qstd").hide();
                    $(this).parents("tr").find(".inp-qstd").focus();
                }else{
                    $(this).parents("tr").find(".inp-qstd").hide();
                    $(this).parents("tr").find(".td-qstd").show();
                }

                $(this).parents("tr").find(".inp-qsemi").val(q_semi);
                $(this).parents("tr").find(".td-qsemi").text(q_semi);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-qsemi").show();
                    $(this).parents("tr").find(".td-qsemi").hide();
                    $(this).parents("tr").find(".inp-qsemi").focus();
                }else{
                    $(this).parents("tr").find(".inp-qsemi").hide();
                    $(this).parents("tr").find(".td-qsemi").show();
                }

                $(this).parents("tr").find(".inp-qeks").val(q_eks);
                $(this).parents("tr").find(".td-qeks").text(q_eks);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-qeks").show();
                    $(this).parents("tr").find(".td-qeks").hide();
                    $(this).parents("tr").find(".inp-qeks").focus();
                }else{
                    $(this).parents("tr").find(".inp-qeks").hide();
                    $(this).parents("tr").find(".td-qeks").show();
                }

                $(this).parents("tr").find(".inp-id").val(id);
                $(this).parents("tr").find(".td-id").text(id);
                if(idx == 7){
                    $(this).parents("tr").find(".inp-id").show();
                    $(this).parents("tr").find(".td-id").hide();
                    $(this).parents("tr").find(".inp-id").focus();
                    
                }else{
                    $(this).parents("tr").find(".inp-id").hide();
                    $(this).parents("tr").find(".td-id").show();
                }

            }
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
            var url = "{{ url('dago-master/type-room') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('dago-master/type-room') }}";
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
                    url: "{{ url('dago-master/type-room') }}/"+id,
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
            url: "{{ url('dago-master/type-room') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status === 'SUCCESS'){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_type').attr('readonly', true);
                    $('#no_type').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#harga').val(result.data[0].harga);
                    $('#kode_curr')[0].selectize.setValue(result.data[0].kode_curr);
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