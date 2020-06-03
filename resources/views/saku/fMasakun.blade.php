<div class="container-fluid mt-3">
        <div class="row" id="saku-data">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Master Akun 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <!-- <h6 class="card-subtitle">Tabel Pengajuan</h6> -->
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

                            </style>
                            <table id="table-data" class="table table-bordered table-striped " width="100%">
                                <thead>
                                    <tr>
                                        <th width="10%">Kode</th>
                                        <th width="50%">Nama</th>
                                        <th width="5%">Curr</th>
                                        <th width="10%">Modul</th>
                                        <th width="10%">Jenis</th>
                                        <th width="15%">Action</th>
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
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Masakun
                            <button type="button" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:450px'>
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-3">   
                                <label for="kode_akun" class="col-3 col-form-label">Kode Akun</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Kode Akun" id="kode_akun" name="kode_akun">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="nama" class="col-3 col-form-label">Nama Akun</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Kode Akun" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="curr" class="col-3 col-form-label">Currency</label>
                                <div class="col-3">
                                    <select class='form-control' id="curr" name="curr" required>
                                    <option value=''>--- Pilih Curr ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modul" class="col-3 col-form-label">Modul</label>
                                <div class="col-3">
                                    <select class='form-control' id="modul" name="modul" required>
                                    <option value=''>--- Pilih Modul ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenis" class="col-3 col-form-label">Jenis</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="jenis" name="jenis" required>
                                    <option value=''>--- Pilih Jenis ---</option>
                                    <option value='Neraca'>Neraca</option>
                                    <option value='Pendapatan'>Pendapatan</option>
                                    <option value='Beban'>Beban</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="block" class="col-3 col-form-label">Status Aktifasi</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="block" name="block" required>
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='0'>AKTIF</option>
                                    <option value='1'>BLOCK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gar" class="col-3 col-form-label">Status Budget</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="gar" name="gar" required>
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='0'>0 - NON</option>
                                    <option value='1'>1 - BUDGET</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="normal" class="col-3 col-form-label">Normal Account</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="normal" name="normal" required>
                                    <option value=''>--- Pilih Normal Account ---</option>
                                    <option value='C'>C - Kredit</option>
                                    <option value='D'>D - Debet</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#flag" role="tab" aria-selected="true"><span class="hidden-xs-down">Flag Akun</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#keu" role="tab" aria-selected="false"><span class="hidden-xs-down">Lap Keuangan</span></a> </li>
                                <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#agg" role="tab" aria-selected="false"><span class="hidden-xs-down">Lap Anggaran</span></a> </li> -->
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="flag" role="tabpanel">
                                    <div class='col-xs-12 nav-control-flag' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                        <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                    </div>
                                    <div class='col-xs-12 mt-2' style='height:450px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed gridexample" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap"  id="input-flag">
                                            <thead style="background:#ff9500;color:white">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="20%">Kode Flag</th>
                                                    <th width="65%">Nama Flag</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="keu" role="tabpanel">
                                    <div class='col-xs-12 nav-control-keu' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                        <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                        <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                        <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                    </div>
                                    <div class='col-xs-12 mt-2' style='height:450px; margin:0px; padding:0px;'>
                                        <table class="table table-striped table-bordered table-condensed gridexample" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap" id="input-keu">
                                            <thead style="background:#ff9500;color:white">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="15%">Kode FS</th>
                                                    <th width="25%">Nama FS</th>
                                                    <th width="15%">Kode Lap</th>
                                                    <th width="30%">Nama Lap</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane" id="agg" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-agg">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="40%">Kode FS</th>
                                                <th width="40%">Kode Lap</th>
                                                <th width="15%"><button type="button" href="#" id="add-row-agg" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div> -->
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
    <!-- END MODAL -->   
    <script>
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $par1 = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    function getCurr(){
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/curr') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var select = $('#curr').selectize();
                        select = select[0];
                        var control = select.selectize;
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_curr, value:result.daftar[i].kode_curr}]);
                        }
                    }
                }
            }
        });
    }

    function getModul(){
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/modul') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var select = $('#modul').selectize();
                        select = select[0];
                        var control = select.selectize;
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_tipe +' - '+ result.daftar[i].nama_tipe, value:result.daftar[i].kode_tipe}]);
                        }
                    }
                }
            }
        });
    }

    getCurr();
    getModul();

    var $iconLoad = $('.preloader');
    var action_html = "<a href='#' title='Edit' class='badge badge-warning' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";

    var dataTable = $('#table-data').DataTable({
        'ajax': {
            'url': "{{ url('saku/masakun') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.daftar;   
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html },
        ],
        'columns': [
            { data: 'kode_akun' },
            { data: 'nama' },
            { data: 'kode_curr' },
            { data: 'modul' },
            { data: 'jenis' }
        ],
    });
    
    function getFlag(id,target1,target2,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/flag_akun') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $par1 = result.data.data[0].kode_flag;
                        }else{
                            $par1 = "";
                            $("#input-keu td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-flag').hide();
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
                    alert('Kode Flag tidak valid');
                }
            }
        });
    }

    function getNeraca(id,target1,target2,jenis){
        var param = $('.'+target1).closest('tr').find('.td-kode-fs').text();
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/neraca') }}/"+param+"/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $par1 = result.data.data[0].kode_neraca;
                        }else{
                            $par1 = "";
                            $("#input-keu td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-neraca').hide();
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
                    alert('Kode Neraca tidak valid');
                }
            }
        });
    }

    function getFS(id,target1,target2,jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/fs') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $par1 = result.data.data[0].kode_fs;
                        }else{
                            $par1 = "";
                            $("#input-keu td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-fs').hide();
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
                    alert('Kode FS tidak valid');
                }
            }
        });
    }

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        var status = true;
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'kode_flag[]': 
                header = ['Kode Flag', 'Nama'];
                var toUrl = "{{ url('saku/flag_akun') }}";
                var columns = [
                    { data: 'kode_flag' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Flag Akun";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
            break;
            case 'kode_fs[]': 
                header = ['Kode FS', 'Nama'];
                var toUrl = "{{ url('saku/fs') }}";
                var columns = [
                    { data: 'kode_fs' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar FS";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
            break;
            case 'kode_neraca[]': 
                $par1 = $('.'+$target).closest('tr').find('.td-kode-fs').text();
                header = ['Kode Neraca', 'Nama'];
                var toUrl = "{{ url('saku/neraca') }}/"+$par1;
                var columns = [
                    { data: 'kode_neraca' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Kode Neraca";
                var jTarget1 = "val";
                var jTarget2 = "val";
                $target = "."+$target;
                $target3 = ".td"+$target2;
                $target2 = "."+$target2;
                if($par1 == ""){
                    alert('Harap pilih kode fs terlebih dahulu!');
                    status = false;
                }
            break;
        }

        console.log(status);
        if(status){

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

    }

    $('#input-flag').on('keydown','.inp-kode, .inp-nama',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama'];
        var nxt2 = ['.td-kode','.td-nama'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-flag").text();
                    var kode = $(this).val();
                    var target1 = "flagke"+noidx;
                    var target2 = "nmflagke"+noidx;
                    getFlag(kode,target1,target2,'tab');                    
                    break;
                case 1:
                    $("#input-flag td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $('.nav-control-flag #add-row').click();
                    
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

    $('#input-keu').on('keydown','.inp-kode-fs, .inp-nama-fs, .inp-kode-neraca, .inp-nama-neraca',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode-fs','.inp-nama-fs','.inp-kode-neraca','.inp-nama-neraca'];
        var nxt2 = ['.td-kode-fs','.td-nama-fs','.td-kode-neraca','.td-nama-neraca'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-keu").text();
                    var kode = $(this).val();
                    var target1 = "fske"+noidx;
                    var target2 = "nmfske"+noidx;
                    getFS(kode,target1,target2,'tab');                    
                    break;
                case 1:
                    $("#input-keu td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find('.search-neraca').show();
                    
                    break;
                case 2:
                    var noidx = $(this).parents("tr").find(".no-keu").text();
                    var kode = $(this).val();
                    var target1 = "neracake"+noidx;
                    var target2 = "nmneracake"+noidx;
                    getNeraca(kode,target1,target2,'tab');                    
                    break;
                case 3:
                    $("#input-keu td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $('.nav-control-keu #add-row').click();
                    
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

    $('#input-flag').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];

        switch(par){
            case 'kode_flag[]': 
                var par2 = "nama_flag[]";

            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        console.log(par);
        console.log(target1);
        console.log(target2);
        showFilter(par,target1,target2);
    });

    $('#input-keu').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];

        switch(par){
            case 'kode_fs[]': 
                var par2 = "nama_fs[]";

            break;
            case 'kode_neraca[]': 
                var par2 = "nama_neraca[]";

            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        showFilter(par,target1,target2);
    });
    
    $('.selectize').selectize();

    $('#btn-save').click(function(){
        $('#form-tambah').submit();
    });

    $('#saku-data').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id').val('');
        $('#method').val('post');
        $('#saku-data').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
        $('#input-flag tbody').html('');
        $('#input-keu tbody').html('');
        // $('#input-agg tbody').html('');
    });

    $('.nav-control-flag').on('click', '#add-row', function(){
        var no=$('#input-flag .row-flag:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-flag'>";
        input += "<td class='no-flag text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdflagke"+no+"'></span><input type='text' name='kode_flag[]' class='form-control inp-kode flagke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-flag hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmflagke"+no+"'></span><input type='text' name='nama_flag[]' class='form-control inp-nama nmflagke"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-flag tbody').append(input);
        $('#input-flag td').removeClass('px-0 py-0 aktif');
        $('#input-flag tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-flag tbody tr:last').find(".inp-kode").show();
        $('#input-flag tbody tr:last').find(".td-kode").hide();
        $('#input-flag tbody tr:last').find(".search-flag").show();
        $('#input-flag tbody tr:last').find(".inp-kode").focus();

    });

    $('.nav-control-keu').on('click', '#add-row', function(){
        var no=$('#input-keu .row-keu:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-keu'>";
        input += "<td class='no-keu text-center'>"+no+"</td>";
        input += "<td><span class='td-kode-fs tdfske"+no+"'></span><input type='text' name='kode_fs[]' class='form-control inp-kode-fs fske"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-fs hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama-fs tdnmfske"+no+"'></span><input type='text' name='nama_fs[]' class='form-control inp-nama-fs nmfske"+no+" hidden'  value='' readonly></td>";
        input += "<td><span class='td-kode-neraca tdneracake"+no+"'></span><input type='text' name='kode_neraca[]' class='form-control inp-kode-neraca neracake"+no+" hidden' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-neraca hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama-neraca tdnmneracake"+no+"'></span><input type='text' name='nama_neraca[]' class='form-control inp-nama-neraca nmneracake"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-keu tbody').append(input);
        $('#input-keu td').removeClass('px-0 py-0 aktif');
        $('#input-keu tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-keu tbody tr:last').find(".inp-kode-fs").show();
        $('#input-keu tbody tr:last').find(".td-kode-fs").hide();
        $('#input-keu tbody tr:last').find(".search-fs").show();
        $('#input-keu tbody tr:last').find(".inp-kode-fs").focus();

    });

    $('#input-flag tbody, #input-keu tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-flag tbody tr').removeClass('selected-row');
            $('#input-keu tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-flag').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-flag td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_flag = $(this).parents("tr").find(".inp-kode").val();
                var nama_flag = $(this).parents("tr").find(".inp-nama").val();
                var no = $(this).parents("tr").find(".no-flag").text();
                $(this).parents("tr").find(".inp-kode").val(kode_flag);
                $(this).parents("tr").find(".td-kode").text(kode_flag);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-flag").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-flag").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama").val(nama_flag);
                $(this).parents("tr").find(".td-nama").text(nama_flag);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }
            }
        }
    });

    $('#input-keu').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-keu td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_fs = $(this).parents("tr").find(".inp-kode-fs").val();
                var nama_fs = $(this).parents("tr").find(".inp-nama-fs").val();
                var kode_neraca = $(this).parents("tr").find(".inp-kode-neraca").val();
                var nama_neraca = $(this).parents("tr").find(".inp-nama-neraca").val();
                var no = $(this).parents("tr").find(".no-keu").text();
                $(this).parents("tr").find(".inp-kode-fs").val(kode_fs);
                $(this).parents("tr").find(".td-kode-fs").text(kode_fs);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode-fs").show();
                    $(this).parents("tr").find(".td-kode-fs").hide();
                    $(this).parents("tr").find(".search-fs").show();
                    $(this).parents("tr").find(".inp-kode-fs").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode-fs").hide();
                    $(this).parents("tr").find(".td-kode-fs").show();
                    $(this).parents("tr").find(".search-fs").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama-fs").val(nama_fs);
                $(this).parents("tr").find(".td-nama-fs").text(nama_fs);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama-fs").show();
                    $(this).parents("tr").find(".td-nama-fs").hide();
                    $(this).parents("tr").find(".inp-nama-fs").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama-fs").hide();
                    $(this).parents("tr").find(".td-nama-fs").show();
                }

                $(this).parents("tr").find(".inp-kode-neraca").val(kode_neraca);
                $(this).parents("tr").find(".td-kode-neraca").text(kode_neraca);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-kode-neraca").show();
                    $(this).parents("tr").find(".td-kode-neraca").hide();
                    $(this).parents("tr").find(".search-neraca").show();
                    $(this).parents("tr").find(".inp-kode-neraca").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode-neraca").hide();
                    $(this).parents("tr").find(".td-kode-neraca").show();
                    $(this).parents("tr").find(".search-neraca").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama-neraca").val(nama_neraca);
                $(this).parents("tr").find(".td-nama-neraca").text(nama_neraca);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-nama-neraca").show();
                    $(this).parents("tr").find(".td-nama-neraca").hide();
                    $(this).parents("tr").find(".inp-nama-neraca").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama-neraca").hide();
                    $(this).parents("tr").find(".td-nama-neraca").show();
                }
            }
        }
    });

    $('#input-keu').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('.no_flag').html();
        target1 = "flagke"+noidx;
        target2 = "nmflagke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getFlag(kode,target1,target2,'change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Flag yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-keu').on('keypress', '.inp-kode', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-keu tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-keu tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });

    // $('#form-tambah').on('click', '#add-row-agg', function(){
    //     var no=$('#input-agg .row-agg:last').index();
    //     no=no+2;
    //     var input = "";
    //     input += "<tr class='row-agg'>";
    //     input += "<td width='5%' class='no-agg'>"+no+"</td>";
    //     input += "<td width='40%'><select name='kode_fsgar[]' class='form-control inp-fsgar fsgarke"+no+"' value='' required></select></td>";
    //     input += "<td width='40%'><select name='kode_neracagar[]' class='form-control inp-nrcgar nrcgarke"+no+"' value='' required></select></td>";
    //     input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
    //     input += "</tr>";
    //     $('#input-agg tbody').append(input);
    //     getFSGar('fsgarke'+no,'nrcgarke'+no);
    //     $('#input-agg tbody tr:last').find('.inp-fsgar')[0].selectize.focus();
    // });

    $('#saku-data').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/masakun') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data; 
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#kode_akun').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#curr')[0].selectize.setValue(result.data[0].kode_curr);
                    $('#modul')[0].selectize.setValue(result.data[0].modul);
                    $('#jenis')[0].selectize.setValue(result.data[0].jenis);
                    $('#block')[0].selectize.setValue(result.data[0].block);
                    $('#gar')[0].selectize.setValue(result.data[0].status_gar);
                    $('#normal')[0].selectize.setValue(result.data[0].normal);
                    console.log(result.data[0].kode_curr);
                    console.log(result.data[0].status_gar);
                    var input="";
                    var no=1;
                    if(result.detail_relasi.length > 0){

                        for(var x=0;x<result.detail_relasi.length;x++){
                            var line = result.detail_relasi[x];
                            input += "<tr class='row-flag'>";
                            input += "<td width='5%' class='no-flag'>"+no+"</td>";
                            input += "<td width='60%'><select name='kode_flag[]' class='form-control inp-flag flagke"+no+"' value='' required></select></td>";
                            input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                            input += "</tr>";
                            no++;
                        }
                    }

                    var input2 = "";
                    var no=1;
                    if(result.detail_keuangan.length > 0){

                        for(var i=0;i< result.detail_keuangan.length;i++){
                            var line2 = result.detail_keuangan[i];
                            input2 += "<tr class='row-keu'>";
                            input2 += "<td width='5%' class='no-keu'>"+no+"</td>";
                            input2 += "<td width='40%'><select name='kode_fs[]' class='form-control inp-fs fske"+no+"' value='' required></select></td>";
                            input2 += "<td width='40%'><select name='kode_neraca[]' class='form-control inp-nrc nrcke"+no+"' value='' required></select></td>";
                            input2 += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                            input2 += "</tr>";
                            no++;
                        }
                    }

                    // var input3 = "";
                    // var no=1;
                    // if(result.detail_anggaran.length > 0){

                    //     for(var i=0;i< result.detail_anggaran.length;i++){
                    //         var line3 = result.detail_anggaran[i];
                    //         input3 += "<tr class='row-agg'>";
                    //         input3 += "<td width='5%' class='no-agg'>"+no+"</td>";
                    //         input3 += "<td width='40%'><select name='kode_fsgar[]' class='form-control inp-fsgar fsgarke"+no+"' value='' required></select></td>";
                    //         input3 += "<td width='40%'><select name='kode_neracagar[]' class='form-control inp-nrcgar nrcgarke"+no+"' value='' required></select></td>";
                    //         input3 += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                    //         input3 += "</tr>";
                    //         no++;
                    //     }
                    // }

                    $('#input-flag tbody').html(input);
                    $('#input-keu tbody').html(input2);
                    // $('#input-agg tbody').html(input3);

                    var input="";
                    var no=1;
                    if(result.detail_relasi.length > 0){

                        for(var x=0;x<result.detail_relasi.length;x++){
                            var line = result.detail_relasi[x];
                            
                            getFlag('flagke'+no);
                            $('.flagke'+no)[0].selectize.setValue(line.kode_flag);
                            no++;
                        }
                    }

                    var input2 = "";
                    var no=1;
                    if(result.detail_keuangan.length > 0){

                        for(var i=0;i< result.detail_keuangan.length;i++){
                            var line2 = result.detail_keuangan[i];
                               
                            getFS('fske'+no,'nrcke'+no);
                            $('.fske'+no)[0].selectize.setValue(line2.kode_fs);
                            $('.nrcke'+no)[0].selectize.setValue(line2.kode_neraca);
                            no++;
                        }
                    }

                    // var input3 = "";
                    // var no=1;
                    // if(result.detail_anggaran.length > 0){

                    //     for(var i=0;i< result.detail_anggaran.length;i++){
                    //         var line3 = result.detail_anggaran[i];
                    //         getFSGar('fsgarke'+no,'nrcgarke'+no);
                    //         $('.fsgarke'+no)[0].selectize.setValue(line3.kode_fs);
                    //         $('.nrcgarke'+no)[0].selectize.setValue(line3.kode_neraca);
                    //         no++;
                    //     }
                    // }

                    $('#saku-data').hide();
                    $('#saku-form').show();
                }
                $iconLoad.hide();
            }
        });
    });


    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-data').show();
        $('#saku-form').hide();
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var kode = $('#kode_akun').val();
        if(parameter == "edit"){
            var url = "{{ url('saku/masakun') }}/"+kode;
        }else{
            var url = "{{ url('saku/masakun') }}";
        }
      
        $iconLoad.show();
        console.log('parameter:tambah');
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
                if(result.data.status){
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been saved.'+result.data.message,
                        'success'
                        );
                    $('#saku-data').show();
                    $('#saku-form').hide();
                        
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
                $iconLoad.hide();
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });   
           
    });

    $('#saku-data').on('click','#btn-delete',function(e){
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
                    url: "{{ url('saku/masakun') }}/"+kode,
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
    
    $('#input-flag').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-flag').each(function(){
            var nom = $(this).closest('tr').find('.no-flag');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });


    $('#input-keu').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-keu').each(function(){
            var nom = $(this).closest('tr').find('.no-keu');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    // $('#input-agg').on('click', '.hapus-item', function(){
    //     $(this).closest('tr').remove();
    //     no=1;
    //     $('.row-agg').each(function(){
    //         var nom = $(this).closest('tr').find('.no-agg');
    //         nom.html(no);
    //         no++;
    //     });
    //     $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    // });

    $('#tanggal,#no_dokumen,#kode_pp,#waktu,#kegiatan,#dasar').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','no_dokumen','kode_pp','waktu','kegiatan','dasar'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2){
                $('#'+nxt[idx])[0].selectize.focus();
            }else if(idx == 6){
                $('#add-row').click();
            }
            else{
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

    

    </script>

    
