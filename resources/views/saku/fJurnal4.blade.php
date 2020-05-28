<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px !important">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Jurnal 
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

                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th style="width:10%">No Bukti</th>
                                        <th style="width:10%">Tanggal</th>
                                        <th style="width:15%">No Dokumen</th>
                                        <th style="width:35%">Deskripsi</th>
                                        <th style="width:15%">Nilai</th>
                                        <th style="width:15%">Action</th>
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
                <div class="card" style="min-height:560px !important">
                    <form class="form" id="form-tambah" style=''>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Data Jurnal
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:471px'>
                        <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class='form-control' type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-2">
                                </div>
                                <label for="jenis" class="col-2 col-form-label">Jenis</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="jenis" name="jenis">
                                    <option value=''>--- Pilih Jenis ---</option>
                                    <option value='MI' selected>MI</option>
                                    </select>
                                </div>
                                <div class="col-3" style="display:none">
                                    <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_dokumen" class="col-2 col-form-label">No Dokumen</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="no_dokumen" name="no_dokumen">
                                </div>
                                <div class="col-1">
                                </div>
                                <label for="total_debet" class="col-2 col-form-label">Total Debet</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text" placeholder="Total Debet" readonly id="total_debet" name="total_debet" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Deskripsi" id="deskripsi" name="deskripsi">
                                </div>
                                <div class="col-1">
                                </div>
                                <label for="total_kredit" class="col-2 col-form-label">Total Kredit</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total_kredit" name="total_kredit" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik_periksa" class="col-2 col-form-label">NIK Periksa</label>
                                <div class="col-5">
                                    <input type='text' name='nik_periksa' id='nik_periksa' class='form-control col-5' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item2' style='position: absolute;z-index: 2;margin-top: 10px;margin-left:5px'><i class='fa fa-search' style='font-size: 18px;'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label id="label_nik" style="margin-left:5px"></label>
                                </div>
                            </div>
                            <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                <a class='badge badge-secondary' type="button" href="#" id="copy-row" ><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                            </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-jurnal" width="100%">
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
                                </style>
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th width="3%">No</th>
                                        <th width="8%">Kode Akun</th>
                                        <th width="18%">Nama Akun</th>
                                        <th width="5%">DC</th>
                                        <th width="20%">Keterangan</th>
                                        <th width="10%">Nilai</th>
                                        <th width="7">Kode PP</th>
                                        <th width="13">Nama PP</th>
                                        <th width="6%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                          
                            <!-- <button type="button" href="#" id="add-row" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Form Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal-jur">
            <div class="modal-dialog" role="document" style="max-width:600px">
                <div class="modal-content">
                    <form id='modal-form-jur'>
                        <div class="modal-header">
                            <div class='row' style='width:100%'>
                                <div class='col-7'>
                                    <h5 class='modal-title' id='header_modal'></h5>
                                </div>
                                <div class='col-5 text-right'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-primary'>Simpan</button> 
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row" id="row-id" hidden>
                                <div class="col-9">
                                    <input class="form-control" type="text" name="id_edit" id="modal-jur-id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-jur-kode" class="col-2 col-form-label">Kode Akun</label>
                                <div class="col-10">
                                    <input type='text' id='modal-jur-kode' class='form-control col-3' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item2' style='position: absolute;z-index: 2;margin-top: 10px;margin-left:5px'><i class='fa fa-search' style='font-size: 18px;'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label id="label_akun" style="margin-left:5px"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-dc" class="col-2 col-form-label">DC</label>
                                <div class="col-2">
                                    <select class='form-control selectize' id="modal-jur-dc" required='' >
                                        <option value="D">D</option>
                                        <option value="C">C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-jur-ket" class="col-2 col-form-label">Keterangan</label>
                                <div class="col-10">
                                    <input type="text" class='form-control' id="modal-jur-ket" required='' >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-jur-nil" class="col-2 col-form-label">Nilai</label>
                                <div class="col-5">
                                    <input type="text" class='form-control currency' id="modal-jur-nil" required='' >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-jur-pp" class="col-2 col-form-label">Kode PP</label>
                                <div class="col-10">
                                    <input type='text' id='modal-jur-pp' class='form-control col-3' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item2' style='position: absolute;z-index: 2;margin-top: 10px;margin-left:5px'><i class='fa fa-search' style='font-size: 18px;'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label id="label_pp" style="margin-left:5px"></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div> 

    <!-- MODAL SEARCH AKUN-->
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

    <script>
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('saku/jurnal') }}",
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
                        window.location.href = "{{ url('saku/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {   'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 5, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai1' }
        ],
    });

    function getListModal(id,url,jenis){
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            async:false,
            success:function(result){    
                switch (jenis) {
                    case "nik_periksa":
                        if(result.status){
                            if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                                $('#nik_periksa').val(result.daftar[0].nik);
                                $('#label_nik').text(result.daftar[0].nama);
                            }else{
                                alert('NIK tidak valid');
                                $('#nik_periksa').val('');
                                $('#label_nik').text('');
                                $('#nik_periksa').focus();
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
                    break;
                    case "modal-jur-kode":
                        if(result.data.status){
                            if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                                $('#modal-jur-kode').val(result.data.data[0].kode_akun);
                                $('#label_akun').text(result.data.data[0].nama);
                                $('#modal-jur-dc')[0].selectize.focus();
                            }else{
                                alert('Kode Akun tidak valid');
                                $('#modal-jur-kode').val('');
                                $('#label_akun').text('');
                                $('#modal-jur-kode').focus();
                            }
                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('saku/login') }}";
                            })
                        }else{
                            alert('Kode Akun tidak valid');
                            $('#modal-jur-kode').val('');
                            $('#label_akun').text('');
                            $('#modal-jur-kode').focus();
                        }
                    break;
                    case "modal-jur-pp":
                        if(result.data.status){
                            if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                                $('#modal-jur-pp').val(result.data.data[0].kode_pp);
                                $('#label_pp').text(result.data.data[0].nama);
                                // $('#modal-form-jur').submit();
                            }else{
                                alert('Kode PP tidak valid');
                                $('#modal-jur-pp').val('');
                                $('#label_pp').text('');
                                $('#modal-jur-pp').focus();
                            }
                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('saku/login') }}";
                            })
                        }else{
                            alert('Kode PP tidak valid');
                            $('#modal-jur-pp').val('');
                            $('#label_pp').text('');
                            $('#modal-jur-pp').focus();
                        }
                    break;
                    default:
                    break;
                }            
            }
        });
    }

    function hitungTotal(){
        
        var total_d = 0;
        var total_k = 0;

        $('.row-jurnal').each(function(){
            var dc = $(this).closest('tr').find('.inp-dc').val();
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            if(dc == "D"){
                total_d += +toNilai(nilai);
            }else{
                total_k += +toNilai(nilai);
            }
        });

        $('#total_debet').val(total_d);
        $('#total_kredit').val(total_k);
        
    }

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'nik_periksa': 
                header = ['NIK', 'Nama'];
            var toUrl = "{{ url('saku/nikperiksa') }}";
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Karyawan";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
            case 'modal-jur-kode': 
                header = ['Kode', 'Nama'];
            var toUrl = "{{ url('saku/akun') }}";
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
            case 'modal-jur-pp': 
                header = ['Kode', 'Nama'];
            var toUrl = "{{ url('saku/pp') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
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
                var kode = $(this).closest('tr').find('td:eq(0)').html(); 
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('/saku/jurnal') }}/"+kode,
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
                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('saku/login') }}";
                            })
                        }
                        else{
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

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        var total_d = $('#total_debet').val();
        var total_k = $('#total_kredit').val();
        var jumdet = $('#input-jurnal tr').length;

        var param = $('#id').val();
        var id = $('#no_bukti').val();
        $iconLoad.show();
        if(param == "edit"){
            var url = "{{ url('/saku/jurnal') }}/"+id;
        }else{
            var url = "{{ url('/saku/jurnal') }}";
        }

        if(total_d != total_k){
            alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak sama');
        }else if( total_d <= 0 || total_k <= 0){
            alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak boleh sama dengan 0 atau kurang');
        }else if(jumdet <= 1){
            alert('Transaksi tidak valid. Detail jurnal tidak boleh kosong ');
        }else{

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
                            'Your data has been saved',
                            'success'
                            )
                            $('#saku-datatable').show();
                            $('#saku-form').hide();
                            
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        Swal.fire({
                            title: 'Session telah habis',
                            text: 'harap login terlebih dahulu!',
                            icon: 'error'
                        }).then(function() {
                            window.location.href = "{{ url('saku/login') }}";
                        })
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                    $iconLoad.hide();
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }
        
        $iconLoad.hide();
        
    });

    $('#tanggal,#no_dokumen,#deskripsi,#nik_periksa,#jenis').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','no_dokumen','deskripsi','nik_periksa','jenis'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 4 || idx == 5){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
                
                $('#'+nxt[idx]).focus();
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });

    $('.selectize').selectize();

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#form-tambah')[0].reset();
        $('#id').val('');
        $('#input-jurnal tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('#form-tambah').on('click', '#add-row', function(){
        
        $('#modal-form-jur')[0].reset();
        $('#modal-jur-id').val('0');
        $('#header_modal').text('Input Detail Jurnal');
        $('#label_akun').text('');
        $('#modal-jur-dc')[0].selectize.setValue('');
        $('#modal-jur-nil').val(0);
        $('#label_pp').text('');
        $('#modal-jur').modal('show');
    });

    $('#input-jurnal').on('click', '.edit-item', function(){
        $('.row-jurnal').removeClass('selected-row');
        $(this).closest('tr').addClass('selected-row');
        
        var kd= $(this).closest('tr').find('.inp-kode').val();
        var nama= $(this).closest('tr').find('.inp-nama').val();
        var dc= $(this).closest('tr').find('.inp-dc').val();
        var nilai= $(this).closest('tr').find('.inp-nilai').val();
        var ket= $(this).closest('tr').find('.inp-ket').val();
        var pp= $(this).closest('tr').find('.inp-pp').val();
        var nama_pp= $(this).closest('tr').find('.inp-nama_pp').val();
        
        $('#modal-jur-id').val('1');
        $('#header_modal').text('Update Detail Jurnal');
        $('#modal-jur-kode').val(kd);
        $('#label_akun').text(nama);
        $('#modal-jur-dc')[0].selectize.setValue(dc);
        $('#modal-jur-ket').val(ket);
        $('#modal-jur-nil').val(nilai);
        $('#modal-jur-pp').val(pp);
        $('#label_pp').text(nama_pp);
        $('#modal-jur').modal('show');
    });

    $('#input-jurnal tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-jurnal tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            var kode_akun = $('#input-jurnal tbody tr.selected-row').find(".inp-kode").val();
            var nama_akun = $('#input-jurnal tbody tr.selected-row').find(".inp-nama").val();
            var dc = $('#input-jurnal tbody tr.selected-row').find(".inp-dc").val();
            var keterangan = $('#input-jurnal tbody tr.selected-row').find(".inp-ket").val();
            var nilai = $('#input-jurnal tbody tr.selected-row').find(".inp-nilai").val();
            var kode_pp = $('#input-jurnal tbody tr.selected-row').find(".inp-pp").val();
            var nama_pp = $('#input-jurnal tbody tr.selected-row').find(".inp-nama_pp").val();
            var no=$('#input-jurnal .row-jurnal:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-jurnal'>";
            input += "<td width='3%' class='no-jurnal text-center'>"+no+"</td>";
            input += "<td width='8%'>"+kode_akun+"<input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' ></td>";
            input += "<td width='18%'>"+nama_akun+"<input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
            input += "<td width='5%'>"+dc+"<input type='text' hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' required></td>";
            input += "<td width='20%'>"+keterangan+"<input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
            input += "<td width='10%' class='text-right'>"+nilai+"<input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
            input += "<td width='7%'>"+kode_pp+"<input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  ></td>";
            input += "<td width='13%'>"+nama_pp+"<input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
            input += "<td width='6%' class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-warning btn-sm edit-item' style='font-size:8px' data-id='1'><i class='fa fa-pencil-alt fa-1'></i></a></td>";
            input += "</tr>";
            $('#input-jurnal tbody').append(input);
            hitungTotal();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }

    });
    
    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#input-jurnal').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#form-tambah').on('click', '.search-item2', function(){

        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    $('#modal-form-jur').on('click', '.search-item2', function(){

        var par = $(this).closest('div').find('input').attr('id');
        var par2 = $(this).closest('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    
    $('#form-tambah').on('change', '#nik_periksa', function(){
        var par = $(this).val();
        getListModal(par,"{{ url('saku/nikperiksa') }}/"+par,"nik_periksa");
    });

    $('#modal-form-jur').on('change', '#modal-jur-kode', function(e){
        e.preventDefault();
        if($.trim($(this).val()).length){
            var par = $(this).val();
            getListModal(par,"{{ url('saku/masakun') }}/"+par,"modal-jur-kode");
        }else{
            alert('Akun yang dimasukkan tidak valid');
            return false;
        }
    });

    // $('#modal-form-jur').on('keydown', '#modal-jur-kode', function(e){
    //     e.preventDefault();
    //     if (e.which == 13) {
    //         e.preventDefault();
    //         if($.trim($(this).val()).length){
    //             var par = $(this).val();
    //             getListModal(par,"{{ url('saku/masakun') }}/"+par,"modal-jur-kode");
    //             // hitungTotal();
    //         }else{
    //             alert('Akun yang dimasukkan tidak valid');
    //             return false;
    //         }
    //     }else if( e.which == 40 || e.which == 9){
    //         e.preventDefault();
    //         showFilter("modal-jur-kode","modal-jur-kode","label_akun");
    //     }
    // });

    $('#modal-form-jur').on('keypress', '#modal-jur-kode', function(e){
        if (e.which == 42) {
            var this_index = $('#input-jurnal .row-jurnal:last').index();
            e.preventDefault();
            if($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#modal-form-jur').on('keypress', '#modal-jur-dc', function(e){
        var this_index = $('#input-jurnal .row-jurnal:last').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-dc').val() != undefined){
                $(this)[0].selectize.setValue($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-dc').val());
            }else{
                $(this)[0].selectize.setValue('');
            }
        }
    });

    $('#modal-form-jur').on('keydown', '#modal-jur-dc', function(e){
        e.preventDefault();
        if (e.which == 13 || e.which == 40 || e.which == 9) {
            if($(this)[0].selectize.getValue() == 'D' || $(this)[0].selectize.getValue() == 'C'){
                $('#modal-jur-ket').focus();
            }else{
                alert('Posisi yang dimasukkan tidak valid');
                return false;
            }
        }
    });

    $('#modal-form-jur').on('keypress', '#modal-jur-ket', function(e){
        var this_index = $('#input-jurnal .row-jurnal:last').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-ket').val() != undefined){
                $(this).val($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-ket').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#modal-form-jur').on('keydown', '#modal-jur-ket', function(e){
        if (e.which == 13 || e.which == 40 || e.which == 9) {
            e.preventDefault();
            if($.trim($(this).val()).length){
                $('#modal-jur-nil').focus();
            }else{
                alert('Keterangan yang dimasukkan tidak valid');
                return false;
            }
        }
    });

    $('#modal-form-jur').on('keypress', '#modal-jur-nil', function(e){
        if (e.which == 42) {
            e.preventDefault();
            var dc = $('#modal-jur-dc')[0].selectize.getValue();
            if(dc == 'D' || dc == 'C'){
                var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
                $(this).val(selisih);
            }else{
                alert('Posisi tidak valid, harap pilih posisi akun');
                $('#modal-jur-dc')[0].selectize.focus();
            }
        }
    });

    $('#modal-form-jur').on('keydown', '#modal-jur-nil', function(e){
        if (e.which == 13 || e.which == 40 || e.which == 9) {
            e.preventDefault();
            if($(this).val() != "" && $(this).val() != 0){
                $("#modal-jur-pp").focus();
            }else{
                alert('Nilai yang dimasukkan tidak valid');
                return false;
            }
        }
    });

    $('#modal-form-jur').on('keydown', '#modal-jur-pp', function(e){
        
        if (e.which == 13) {
            e.preventDefault();
            if($.trim($(this).val()).length){
                var par = $(this).val();
                getListModal(par,"{{ url('saku/pp') }}/"+par,"modal-jur-pp");
                // hitungTotal();
            }else{
                alert('PP yang dimasukkan tidak valid');
                return false;
            }
        }else if( e.which == 40 || e.which == 9){
            e.preventDefault();
            showFilter("modal-jur-pp","modal-jur-pp","label_pp");
        }
    });

    $('#modal-form-jur').on('change', '#modal-jur-pp', function(e){
        e.preventDefault();
        if($.trim($(this).val()).length){
            var par = $(this).val();
            getListModal(par,"{{ url('saku/pp') }}/"+par,"modal-jur-pp");
        }else{
            alert('PP yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#modal-form-jur').on('keypress', '#modal-jur-pp', function(e){
        if (e.which == 42) {
            var this_index = $("#input-jurnal .row-jurnal:last").index();
            console.log(this_index);
            e.preventDefault();
            console.log($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-pp').val());
            if($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-pp').val() != undefined){
                $(this).val($("#input-jurnal tbody tr:eq("+(this_index)+")").find('.inp-pp').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#modal-form-jur').submit(function(e){
        e.preventDefault();
        
        var kode = $('#modal-jur-kode').val();
        var dc = $('#modal-jur-dc')[0].selectize.getValue();
        var nilai = $('#modal-jur-nil').val();
        var ket = $('#modal-jur-ket').val();
        var id = $('#modal-jur-id').val();
        var kode_pp = $('#modal-jur-pp').val();

        if(toNilai(nilai) <= 0){
            alert("Nilai tidak boleh sama dengan nol atau kurang");
            return false;
        }else{

            if(id == 1){
                var no =$('.selected-row').closest('tr').find('.no-jurnal').html();
            }else{
                var no=$('#input-jurnal .row-jurnal:last').index();
                no=no+2;
            }

            var nama = $('#label_akun').text();
            var nama_pp = $('#label_pp').text();        
            var input = "";
            input += "<td width='3%' class='no-jurnal text-center'>"+no+"</td>";
            input += "<td width='8%'>"+kode+"<input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode+"' required=''></td>";
            input += "<td width='18%'>"+nama+"<input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama+"' readonly></td>";
            input += "<td width='5%'>"+dc+"<input type='text' hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' required></td>";
            input += "<td width='20%'>"+ket+"<input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+ket+"' required></td>";
            input += "<td width='10%' class='text-right'>"+nilai+"<input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
            input += "<td width='7%'>"+kode_pp+"<input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required='' ></td>";
            input += "<td width='13%'>"+nama_pp+"<input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
            input += "<td width='6%' class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-warning btn-sm edit-item' style='font-size:8px' data-id='1'><i class='fa fa-pencil-alt fa-1'></i></a></td>";
            
            if(id=='1'){
                $('.selected-row').closest('tr').html('');
                $('.selected-row').closest('tr').append(input);
            }else{
                $('#input-jurnal').append("<tr class='row-jurnal'>"+input+"</tr>");
            }
            
            hitungTotal();
            $('#modal-jur').modal('hide');
        }

    });


    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/jurnal') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#tanggal').val(result.jurnal[0].tanggal);
                    $('#deskripsi').val(result.jurnal[0].deskripsi);
                    $('#nik_periksa').val(result.jurnal[0].nik_periksa);
                    $('#no_dokumen').val(result.jurnal[0].no_dokumen);
                    $('#total_debet').val(result.jurnal[0].nilai1);
                    $('#total_kredit').val(result.jurnal[0].nilai1);
                    $('#jenis').val(result.jurnal[0].jenis);
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-jurnal'>";
                            input += "<td width='3%' class='no-jurnal text-center'>"+no+"</td>";
                            input += "<td width='8%'>"+line.kode_akun+"<input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+line.kode_akun+"' required=''></i></a></td>";
                            input += "<td width='18%'>"+line.nama_akun+"<input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                            input += "<td width='5%'>"+line.dc+"<input type='text' hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+line.dc+"' required></td>";
                            input += "<td width='20%'>"+line.keterangan+"<input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+line.keterangan+"' required></td>";
                            input += "<td width='10%' class='text-right'>"+toRp2(line.nilai)+"<input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td width='7%'>"+line.kode_pp+"<input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+line.kode_pp+"' required='' ></td>";
                            input += "<td width='13%'>"+line.nama_pp+"<input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+line.nama_pp+"' readonly></td>";
                            input += "<td width='6%' class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-warning btn-sm edit-item' style='font-size:8px' data-id='1'><i class='fa fa-pencil-alt fa-1'></i></a></td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-jurnal tbody').html(input);
                        
                    }
                    hitungTotal();
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