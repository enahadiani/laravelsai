<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="min-height: 560px;">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Tagihan Maintenance 
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
                                        <th>No Tagihan</th>
                                        <th>No Dokumen</th>
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                        <th>Nilai PPN</th>
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
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Data Tagihan Maintenance
                            <button type="submit" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> <span>Simpan</span></button>
                            <button type="button" id="btn-load" class="btn btn-primary ml-2"  style="float:right;" ><i class="fa fa-database"></i> <span>Gen Data</span></button>
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
                           <div class="form-group row no-tagihan">
                                <label for="no_tagihan" class="col-3 col-form-label">No Tagihan</label>
                                <div class="input-group col-3">
                                    <input type='text' name="no_tagihan" id="no_tagihan" class="form-control" value="" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" placeholder="Tanggal" id="tanggal" name="tanggal" autocomplete="off">
                                </div>
                                <label for="periode" class="col-3 col-form-label">Periode</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Periode" id="periode" name="periode" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai" class="col-3 col-form-label">Nilai Tagihan</label>
                                <div class="input-group col-3">
                                    <input class="form-control currency" type="text" placeholder="Nilai Tagihan" id="total_nilai" name="total_nilai" readonly>
                                </div>
                                <label for="nilai_ppn" class="col-3 col-form-label">Nilai PPN</label>
                                <div class="input-group col-3">
                                    <input class="form-control currency" type="text" placeholder="Nilai PPN" id="total_nilai_ppn" name="total_nilai_ppn" readonly>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label for="keterangan" class="col-3 col-form-label">Keterangan</label>
                                <div class="input-group col-9">
                                    <input class="form-control" type="text" placeholder="Keterangan" id="keterangan" name="keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-3 col-form-label">Jenis Kontrak</label>
                                <div class="col-3">
                                    <select required class='form-control' id="jenis" name="jenis" readonly>
                                    <option value='MAINTENANCE' selected>Maintenance</option>
                                    </select>
                                </div>
                            </div> 
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#bitem" role="tab" aria-selected="true"><span class="hidden-xs-down">Rincian</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bupload" role="tab" aria-selected="true"><span class="hidden-xs-down">Dokumen</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="bitem" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
                                        {{-- <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a> --}}
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
                                        <div style="table-responsive">
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid1" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                            <thead style="background:#ff9500;color:white">
                                            <tr>
                                                <th style="width: 3%;"></th>
                                                <th>No Dokumen</th>
                                                <th>Customer</th>
                                                <th>No Kontrak</th>
                                                <th>Item</th>
                                                <th style="width: 10%;">Nilai</th>
                                                <th style="width: 10%;">PPN</th>
                                                <th>Due Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bupload" role="tab">
                                    <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row2" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
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
                                        <table class="table table-striped table-bordered table-condensed gridexample" id="input-grid2" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#ff9500;color:white">
                                            <tr>
                                                <th style="width:10%">No</th>
                                                <th style="width:40%">Nama Dokumen</th>
                                                <th style="width:40%">Upload File</th>
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

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
        });

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        // "scrollX": true,
        'ajax': {
            'url': "{{ url('sai-trans/tagihan-maintain') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    if(json.daftar.length > 0){
                    return json.daftar;   
                    }else {
                    return [];
                    }   
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
            {'targets': 5, data: null, 'defaultContent': action_html },
             {
                'targets': [4,3],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            }
            ],
        'columns': [
            { data: 'no_bill' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai' },
            { data: 'nilai_ppn' },
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
        $('.kode-cust').show();
        $('#btn-load').show();
        $('#input-grid1 tbody').empty();
        $('#input-grid2 tbody').empty();
        $('.data-customer').hide();
        $('#form-tambah')[0].reset();
        $('.no-tagihan').hide();
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
        var par = $(this).closest('.row').find('input').attr('name');
        var par2 = $(this).closest('.row').find('label.label-kode').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    $('#form-tambah').on('change', '#kode_cust', function(){
        var par = $(this).val();
        getCustomer(par);
    });

    
    function getCustomer(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('sai-master/customer') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var data = result.daftar;
                            var filter = data.filter(data => data.kode_cust == id);
                            if(filter.length > 0) {
                                $('#kode_cust').val(filter[0].kode_cust);
                                $('#label_kode_cust').text(filter[0].nama);
                                $('#bank').val(filter[0].bank);
                                $('#cabang').val(filter[0].cabang);
                                $('#no_rek').val(filter[0].no_rek);
                                $('#nama_rek').val(filter[0].nama_rek);
                                $('.data-customer').show();
                            } else {
                                alert('Customer tidak valid');
                                $('#kode_cust').val('');
                                $('#label_kode_cust').text('');
                                $('#kode_cust').focus();
                            }
                        }
                    }
                }
            });
        }

    function hitungTotal(){
        var total = 0;
        var total_ppn = 0;
        $('.generate').each(function(){
            var nilai = $(this).closest('tr').find('.nilai').val();
            var ppn = $(this).closest('tr').find('.nilai_ppn').val();
            total += +toNilai(nilai);
            total_ppn += +toNilai(ppn);
        })
        $('#total_nilai').val(total);
        $('#total_nilai_ppn').val(total_ppn);
    }

            function showFilter(param,target1,target2){
            var par = param;
            var modul = '';
            var header = [];
            $target = target1;
            $target2 = target2;
            
            switch(par){
                case 'kode_cust': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('sai-master/customer') }}";
                    var columns = [
                        { data: 'kode_cust' },
                        { data: 'nama' }
                    ];
                    
                    var judul = "Daftar Customer";
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
                    $($target).trigger('change');
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

    $('#input-grid1').on('click', '.checkbox-generate', function(){
        var input    = $(this).closest('tr').find('input[type=hidden]').attr('id');
        var checkbox = $(this).closest('tr').find('input[type=checkbox]').attr('id');
        var row = $(this).closest('tr');
        if(row.hasClass('generate')){
            row.removeClass('generate');
        }else{
            row.addClass('generate');
        }
        
        if($('#'+checkbox).is(':checked')) {
            $('#'+input).val(true);
        }else{
            $('#'+input).val(false);
        }
        hitungTotal();
    });

    $('#saku-form').on('click', '#btn-load', function(){
        var btnTextLoad = $('#btn-load span');
        var btnLoad = $('#btn-load');
        var btnSave = $('#btn-simpan');     
        var periode = $('#periode').val();
        if(periode == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan!',
                footer: 'Mohon mengisi periode terlebih dahulu'
            })
        }
        else{
            $.ajax({
                type: 'GET',
                url: "{{ url('sai-trans/tagihan-maintain-load') }}/"+periode,
                dataType: 'json',
                async:true,
                beforeSend:function(){
                    console.log('beforeSend')
                    btnLoad.attr('disabled', true);
                    btnSave.attr('disabled', true);
                    btnTextLoad.text('Loading..');
                }, 
                complete:function(){
                    console.log('complete')
                    btnLoad.attr('disabled', false);
                    btnSave.attr('disabled', false);
                    btnTextLoad.text('Gen Data');
                },
                success:function(res){
                    var result= res.daftar;
                    if(result.length > 0) {
                        $('#input-grid1 tbody').empty();
                        var no = 1;
                        var input = "";
                        for(var i=0;i<result.length;i++){
                            var line = result[i];
                            var tanggal = line.tgl_duedate;
                            var split = tanggal.split(/[- :]/);
                            var due = split[2]+"/"+split[1]+"/"+split[0];
                            input += "<tr class='row-grid1 row-"+no+"'>";
                            input += "<td><input type='checkbox' class='checkbox-generate' id='checkbox-"+no+"'><input type='hidden' name='generate[]' class='hidden' id='generate-ke"+no+"' value='false'></td>";
                            input += "<td><input type='text' name='no_dokumen[]' value='"+line.no_dokumen+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='cust[]' value='"+line.cust+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='no_kontrak[]' value='"+line.no_kontrak+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='item[]' value='"+line.item+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='nilai[]' class='form-control inp-tagihan nilai nilaike"+no+"'  value='"+parseFloat(line.nilai)+"' required readonly></td>";
                            input += "<td><input type='text' name='nilai_ppn[]' class='form-control inp-tagihan nilai_ppn nilai_ppnke"+no+"'  value='"+parseFloat(line.nilai_ppn)+"' required readonly></td>";
                            input += "<td><input type='text' name='due_date[]' value='"+due+"' class='form-control' readonly></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-grid1 tbody').append(input);
                        // hitungTotal();
                        $('.inp-tagihan').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            onCleared: function () { self.Value(''); }
                        });
                    }
                },
                error: function(xhr, status, error){
                    var err = eval("(" + xhr.responseText + ")");
                    btnTextLoad.text('Load Data');
                    btnSave.attr('disabled', false);
                    btnLoad.attr('disabled', false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi kesalahan pada server!',
                        footer: 'Data tagihan sudah di generate semua di periode ini!'
                    })
                },
            });
        }
    });

    $('#form-tambah').on('click', '#add-row2', function(){
        var no2=$('#input-grid2 .row-grid2:last').index();
        no2=no2+2;
        var input2 = "";
        input2 += "<tr class='row-grid2'>";
        input2 += "<td class='no-grid2 text-center'>"+no2+"</td>";
        input2 += "<td><span>-</span><input type='hidden' name='nama_file[]' value='-' class='inp-file_dok' readonly></td>";
        input2 += "<td><input type='file' name='file_dok[]' required  class='inp-file_dok'></td>";
        input2 += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item2' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input2 += "</tr>";
        $('#input-grid2 tbody').append(input2);
    });

    $('#input-grid2').on('click', '.hapus-item2', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid2').each(function(){
            var nom = $(this).closest('tr').find('.no-grid2');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        var btnTextSave = $('#btn-simpan span');
        var btnSave = $('#btn-simpan');
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('sai-trans/tagihan-maintain-ubah') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('sai-trans/tagihan-maintain') }}";
            var pesan = "saved";
        }

        var formData = new FormData(this);
        var gen = [];
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]);
            if(pair[0] == 'generate[]' && pair[1] == 'true'){
                gen.push(pair[0]);
            } 
        }
        if(gen.length === 0 && id == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan',
                footer: 'Mohon untuk menceklis minimal satu dokumen'
            })
        }else{
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
        }
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
                    url: "{{ url('sai-trans/tagihan-maintain') }}/"+id,
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
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('sai-trans/tagihan-maintain-detail') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#input-grid1 tbody').empty();
                    $('#input-grid2 tbody').empty();
                    $('#btn-load').hide();
                    var dataDate = new Date(result.data[0].tanggal);
                    var tgl = ("0" + dataDate.getDate()).slice(-2)
                    var bln = ("0" + (dataDate.getMonth() + 1)).slice(-2);
                    var tahun = dataDate.getFullYear();
                    var tanggal = tgl+"/"+bln+"/"+tahun;

                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('.no-tagihan').show();
                    $('#btn-load').hide();
                    $('.data-customer').show();
                    $('.kode-cust').hide();
                    $('#no_tagihan').val(id);
                    $('#id').val(id);
                    $('#no_tagihan').attr('readonly',true);
                    $('#periode').attr('readonly',true);
                    $('#tanggal').val(tanggal);
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#periode').val(result.data[0].periode);
                    $('#total_nilai').val(parseFloat(result.data[0].nilai));
                    $('#total_nilai_ppn').val(parseFloat(result.data[0].nilai_ppn));
                    
                    if(result.data_detail.length > 0) {
                        var input = "";
                        var no = 1;
                        for(var i=0;i<result.data_detail.length;i++) {
                            var line = result.data_detail[i];
                            var tanggal = line.due_date;
                            var split = tanggal.split(/[- :]/);
                            var due = split[2]+"/"+split[1]+"/"+split[0];
                            input += "<tr class='row-grid1 active'>";
                            input += "<td>"+no+"</td>";
                            input += "<td><input type='text' name='no_dokumen[]' value='"+line.no_dokumen+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='cust[]' value='"+line.kode_cust+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='no_kontrak[]' value='"+line.no_kontrak+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='item[]' value='"+line.item+"' class='form-control' readonly></td>";
                            input += "<td><input type='text' name='nilai[]' class='form-control inp-tagihan nilai nilaike"+no+"'  value='"+parseFloat(line.nilai)+"' required readonly></td>";
                            input += "<td><input type='text' name='nilai_ppn[]' class='form-control inp-tagihan nilai_ppn nilai_ppnke"+no+"'  value='"+parseFloat(line.nilai_ppn)+"' required readonly></td>";
                            input += "<td><input type='text' name='due_date[]' value='"+due+"' class='form-control' readonly></td>";
                            input += "</tr>";
                            no++;
                        }
                        $('#input-grid1 tbody').append(input);
                        $('.inp-tagihan').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            onCleared: function () { self.Value(''); }
                        });
                    }

                    if(result.data_dokumen.length > 0) {
                        var input2 = "";
                        var nomor = 1;
                        for(var i=0;i<result.data_dokumen.length;i++){
                            var line = result.data_dokumen[i];
                            input2 += "<tr class='row-tagihan2'>";
                            input2 += "<td class='no-tagihan2 text-center'>"+nomor+"</td>";
                            input2 += "<td><span>"+line.no_gambar+"</span><input type='hidden' name='nama_file[]' required  class='inp-file_dok' value='"+line.no_gambar+"' readonly></td>";
                            input2 += "<td><input type='file' name='file_dok[]'  class='inp-file_dok'></td>";
                            input2 += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item2' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-success btn-sm down-dok' style='font-size:8px' href='https://api.simkug.com/api/sai-auth/storage/"+line.no_gambar+"' target='_blank'><i class='fa fa-download fa-1'></i></a></td>";
                            input2 += "</tr>";
                            nomor++;
                        }
                        $('#input-grid2 tbody').html(input2);
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