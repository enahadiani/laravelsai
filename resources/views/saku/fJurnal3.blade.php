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
                                <div class="col-2">
                                    <input class='form-control' type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-3">
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
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="no_dokumen" name="no_dokumen" required>
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
                                    <input class="form-control" type="text" placeholder="Deskripsi" id="deskripsi" name="deskripsi" required>
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
                                <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
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
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-jurnal" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:9%">Kode Akun</th>
                                        <th style="max-width:18%">Nama Akun</th>
                                        <th style="width:5%">DC</th>
                                        <th style="max-width:20%">Keterangan</th>
                                        <th style="width:10%">Nilai</th>
                                        <th style="width:7">Kode PP</th>
                                        <th style="width:13">Nama PP</th>
                                        <th style="width:5%"></th>
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

    
    $('[data-toggle="tooltip"]').tooltip(); 

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

    function getPP(id,target1,target2,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/pp') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                        }else{
                            $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-pp').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
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
                }
                else{
                    if(jenis == 'change'){
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }
                    alert('Kode PP tidak valid');
                }
            }
        });
    }

    function getNIKPeriksa(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/nikperiksa') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
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
            }
        });
    }

    function getAkun(id,target1,target2,target3,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/masakun') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            // $('.'+target3)[0].selectize.focus();
                            $('.td'+target3).text('D');
                        }else{

                            $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-akun').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                            $('.td'+target3).text('D');
                        }
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
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }
                    alert('Kode akun tidak valid');
                }
            }
        });
    }

    function hitungTotal(){
        
        var total_d = 0;
        var total_k = 0;

        $('.row-jurnal').each(function(){
            var dc = $(this).closest('tr').find('.td-dc').text();
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
            case 'kode_akun[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('saku/akun') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Akun";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
            break;
            case 'kode_pp[]': 
                header = ['Kode PP', 'Nama'];
                var toUrl = "{{ url('saku/pp') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
            break;
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

    $('#kode_pp,#nama,#initial,#kode_bidang,#kode_ba,#kode_pc,#kota,#flag_aktif ').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','nama','initial','kode_bidang','kode_ba','kode_pc','kota','flag_aktif'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 8){
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

    $('#input-jurnal').on('keydown','.inp-kode, .inp-nama, .inp-dc, .inp-ket, .inp-nilai, .inp-pp, .inp-nama_pp',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama','.inp-dc','.inp-ket','.inp-nilai','.inp-pp','.inp-nama_pp'];
        var nxt2 = ['.td-kode','.td-nama','.td-dc','.td-ket','.td-nilai','.td-pp','.td-nama_pp'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-jurnal").text();
                    var kode = $(this).val();
                    var target1 = "akunke"+noidx;
                    var target2 = "nmakunke"+noidx;
                    var target3 = "dcke"+noidx;
                    getAkun(kode,target1,target2,target3,'tab');                    
                    break;
                case 1:
                    $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    
                    break;
                case 2:
                    var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                    if(isi == 'D' || isi == 'C'){
                        $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                    }else{
                        alert('Posisi yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 3:
                    if($.trim($(this).val()).length){
                        $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Keterangan yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find('.search-pp').show();
                        hitungTotal();
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 5:
                    var noidx = $(this).parents("tr").find(".no-jurnal").text();
                    var kode = $(this).val();
                    var target1 = "ppke"+noidx;
                    var target2 = "nmppke"+noidx;
                    getPP(kode,target1,target2,'tab');
                    break;
                case 6:
                    $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $('#add-row').click();
                    break;

                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
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
        var no=$('#input-jurnal .row-jurnal:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-jurnal'>";
        input += "<td class='no-jurnal text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdakunke"+no+"'></span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke"+no+"'></span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-dc tddcke"+no+"'></span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='' required><option value='D'>D</option><option value='C'>C</option></select></td>";
        input += "<td><span class='td-ket tdketke"+no+"'></span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilke"+no+"'></span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='' required></td>";
        input += "<td><span class='td-pp tdppke"+no+"'></span><input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_pp tdnmppke"+no+"'></span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-jurnal tbody').append(input);
        $('.dcke'+no).selectize({
            selectOnTab:true,
            onChange: function(value) {
                $('.tddcke'+no).text(value);
                hitungTotal();
            }
        });
        $('.selectize-control.dcke'+no).addClass('hidden');
        $('.nilke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('#input-jurnal td').removeClass('px-0 py-0 aktif');
        $('#input-jurnal tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-jurnal tbody tr:last').find(".inp-kode").show();
        $('#input-jurnal tbody tr:last').find(".td-kode").hide();
        $('#input-jurnal tbody tr:last').find(".search-akun").show();
        $('#input-jurnal tbody tr:last').find(".inp-kode").focus();

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

    $('.nav-control').on('click', '#delete-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dihapus terlebih dahulu!');
            return false;
        }else{
            $('#input-jurnal tbody').find('.selected-row').remove();
            no=1;
            $('.row-jurnal').each(function(){
                var nom = $(this).closest('tr').find('.no-jurnal');
                nom.html(no);
                no++;
            });
            hitungTotal();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }

    });

    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            var kode_akun = $('#input-jurnal tbody tr.selected-row').find(".inp-kode").val();
            var nama_akun = $('#input-jurnal tbody tr.selected-row').find(".inp-nama").val();
            var dc = $('#input-jurnal tbody tr.selected-row').find(".td-dc").text();
            var keterangan = $('#input-jurnal tbody tr.selected-row').find(".inp-ket").val();
            var nilai = $('#input-jurnal tbody tr.selected-row').find(".inp-nilai").val();
            var kode_pp = $('#input-jurnal tbody tr.selected-row').find(".inp-pp").val();
            var nama_pp = $('#input-jurnal tbody tr.selected-row').find(".inp-nama_pp").val();
            var no=$('#input-jurnal .row-jurnal:last').index();
            no=no+2;
            var input = "";
            input += "<tr class='row-jurnal'>";
            input += "<td class='no-jurnal text-center'>"+no+"</td>";
            input += "<td ><span class='td-kode tdakunke"+no+"'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nama tdnmakunke"+no+"'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
            input += "<td><span class='td-dc tddcke"+no+"'>"+dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
            input += "<td><span class='td-ket tdketke"+no+"'>"+keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+"'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
            input += "<td><span class='td-pp tdppke"+no+"'>"+kode_pp+"</span><input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
            input += "<td><span class='td-nama_pp tdnmppke"+no+"'>"+nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
            input += "</tr>";
            $('#input-jurnal tbody').append(input);
            $('.dcke'+no).selectize({
                selectOnTab:true,
                onChange: function(value) {
                    $('.tddcke'+no).text(value);
                    hitungTotal();
                }
            });
            $('.selectize-control.dcke'+no).addClass('hidden');
            $('.nilke'+no).inputmask("numeric", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                rightAlign: true,
                oncleared: function () { self.Value(''); }
            });
            hitungTotal();
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }

    });

    $('#input-jurnal').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-jurnal td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var dc = $(this).parents("tr").find(".td-dc").text();
                var keterangan = $(this).parents("tr").find(".inp-ket").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var kode_pp = $(this).parents("tr").find(".inp-pp").val();
                var nama_pp = $(this).parents("tr").find(".inp-nama_pp").val();
                var no = $(this).parents("tr").find(".no-jurnal").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-akun").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama").val(nama_akun);
                $(this).parents("tr").find(".td-nama").text(nama_akun);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }
        
                
                $(this).parents("tr").find(".inp-dc")[0].selectize.setValue(dc);
                $(this).parents("tr").find(".td-dc").text(dc);
                if(idx == 3){
                    $('.dcke'+no)[0].selectize.setValue(dc);
                    var dcx = $('.tddcke'+no).text();
                    if(dcx == ""){
                        $('.tddcke'+no).text('D');  
                    }
                    
                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-dc").hide();
                    $(this).parents("tr").find(".inp-dc")[0].selectize.focus();
                    
                }else{
                    
                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-dc").show();
                }
        
                $(this).parents("tr").find(".inp-ket").val(keterangan);
                $(this).parents("tr").find(".td-ket").text(keterangan);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-ket").show();
                    $(this).parents("tr").find(".td-ket").hide();
                    $(this).parents("tr").find(".inp-ket").focus();
                }else{
                    $(this).parents("tr").find(".inp-ket").hide();
                    $(this).parents("tr").find(".td-ket").show();
                }
        
                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
        
                $(this).parents("tr").find(".inp-pp").val(kode_pp);
                $(this).parents("tr").find(".td-pp").text(kode_pp);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-pp").show();
                    $(this).parents("tr").find(".td-pp").hide();
                    $(this).parents("tr").find(".search-pp").show();
                    $(this).parents("tr").find(".inp-pp").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-pp").hide();
                    $(this).parents("tr").find(".td-pp").show();
                    $(this).parents("tr").find(".search-pp").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama_pp").val(nama_pp);
                $(this).parents("tr").find(".td-nama_pp").text(nama_pp);
                if(idx == 7){
                    
                    $(this).parents("tr").find(".inp-nama_pp").show();
                    $(this).parents("tr").find(".td-nama_pp").hide();
                    $(this).parents("tr").find(".inp-nama_pp").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_pp").hide();
                    $(this).parents("tr").find(".td-nama_pp").show();
                }
                hitungTotal();
            }
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

    $('#input-jurnal').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_akun[]': 
                var par2 = "nama_akun[]";

            break;
            case 'kode_pp[]': 
                var par2 = "nama_pp[]";
            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        console.log(tmp);
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        showFilter(par,target1,target2);
    });

    $('#form-tambah').on('click', '.search-item2', function(){

        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    
    $('#form-tambah').on('change', '#nik_periksa', function(){
        var par = $(this).val();
        getNIKPeriksa(par);
    });

    $('#form-tambah').on('keydown', '#nik_periksa', function(e){
        e.preventDefault();
        if(e.which == 13 || e.which == 9){
            var par = $(this).val();
            getNIKPeriksa(par);
        }
    });

    $('#input-jurnal').on('keydown', '.inp-kode', function(e){
        if(e.which == 40){
            var noidx =  $(this).closest('tr').find('.no_jurnal').html();
            target1 = "akunke"+noidx;
            target2 = "nmakunke"+noidx;
            target3 = "dcke"+noidx;
            e.preventDefault();
            showFilter("kode_akun[]",target1,target2);
        }
    });

    $('#input-jurnal').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no_jurnal').html();
        target1 = "akunke"+noidx;
        target2 = "nmakunke"+noidx;
        target3 = "dcke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getAkun(kode,target1,target2,target3,'change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Akun yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-jurnal').on('keypress', '.inp-kode', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-jurnal').on('keypress', '.inp-dc', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue() != undefined){
                $(this)[0].selectize.setValue($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue());
            }else{
                $(this)[0].selectize.setValue('');
            }
        }
    });

    $('#input-jurnal').on('keypress', '.inp-ket', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val() != undefined){
                $(this).val($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-jurnal').on('keypress', '.inp-nilai', function(e){
        if (e.which == 42) {
            e.preventDefault();
            var dc = $(this).closest('tr').find('.inp-dc')[0].selectize.getValue();
            if(dc == 'D' || dc == 'C'){
                var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
                $(this).val(selisih);
            }else{
                alert('Posisi tidak valid, harap pilih posisi akun');
                $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
            }
        }
    });

    $('#input-jurnal').on('change', '.inp-nilai', function(){
        console.log('change-nilai');
        if($(this).closest('tr').find('.inp-nilai').val() != "" && $(this).closest('tr').find('.inp-nilai').val() != 0){
            hitungTotal();
            $(this).closest('tr').find('.inp-pp').val();
        }else{
            alert('Nilai yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-jurnal').on('keydown', '.inp-pp', function(e){
        if(e.which == 40){
            e.preventDefault();
            var noidx =  $(this).closest('tr').find('.no_jurnal').html();
            target1 = "ppke"+noidx;
            target2 = "nmppke"+noidx;
            showFilter("kode_pp[]",target1,target2);
        }
    });

    $('#input-jurnal').on('change', '.inp-pp', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no_jurnal').html();
        target1 = "ppke"+noidx;
        target2 = "nmppke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-pp').val()).length){
            var kode = $(this).val();
            getPP(kode,target1,target2,'change');
            // hitungTotal();
        }else{
            alert('PP yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-jurnal').on('keypress', '.inp-pp', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val() != undefined){
                $(this).val($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val());
            }else{
                $(this).val('');
            }
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
                            input += "<td class='no-jurnal text-center'>"+no+"</td>";
                            input += "<td ><span class='td-kode tdakunke"+no+"'>"+line.kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+line.kode_akun+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nama tdnmakunke"+no+"'>"+line.nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+line.nama_akun+"' readonly></td>";
                            input += "<td ><span class='td-dc tddcke"+no+"'>"+line.dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+line.dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
                            input += "<td ><span class='td-ket tdketke"+no+"'>"+line.keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+line.keterangan+"' required></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+"'>"+toRp2(line.nilai)+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseInt(line.nilai)+"' required></td>";
                            input += "<td ><span class='td-pp tdppke"+no+"'>"+line.kode_pp+"</span><input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+line.kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
                            input += "<td ><span class='td-nama_pp tdnmppke"+no+"'>"+line.nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+line.nama_pp+"' readonly></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-jurnal tbody').html(input);
                        no= 1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            $('.dcke'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    $('.tddcke'+no).text(value);
                                    hitungTotal();
                                }
                            });
                            $('.dcke'+no)[0].selectize.setValue(line.dc);
                            $('.selectize-control.dcke'+no).addClass('hidden');
                            $('.nilke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                        
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