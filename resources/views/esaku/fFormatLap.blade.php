    <link href="{{ asset('asset_elite/css/jquery.treegrid.css') }}" rel="stylesheet">
    <style>
    .ui-selected{
        background: #e8e8e8 !important;
        color: unset !important;
    }
    .selected{
        background: #e8e8e8 !important;
        color: unset !important;
    }
    .selected2{
        background: #e8e8e8 !important;
        color: unset !important;
    }
    td,th{
        padding:8px !important;
    }
    .form-group{
        margin-bottom: 5px !important;
    }
    #table-belum,#table-sudah
    {
        border-collapse:collapse !important;
    }

    #table-belum_filter label, #table-belum_filter input,#table-sudah_filter label, #table-sudah_filter input
    {
        width:100%;
    }

    .dataTables_wrapper .paginate_button.previous {
        margin-right: 0px; 
    }

    .dataTables_wrapper .paginate_button.next {
        margin-left: 0px; 
    }

    div.dataTables_wrapper div.dataTables_paginate {
        margin-top: 0; 
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center; 
    }

    .dataTables_wrapper .paginate_button.page-item {
        padding-left: 2px;
        padding-right: 2px; 
    }
    .px-0{
        padding-left: 2px !important;
        padding-right: 2px !important;
    }
    #table-sudah tbody tr:hover, 
    #table-belum tbody tr:hover, #sai-treegrid tbody tr:hover
    {
    background:#f8f8f8 !important;
    border-color:#f8f8f8 !important;
    cursor:pointer;
    }

    .hidden{
        display:none;
    }
    </style>
    <form id="menu-form">
        <div class="row" id="saku-filter">
            <div class="col-12 mb-2">
                <div class="card" >
                    <div class="card-body py-4 px-4" style="min-height:69.2px">
                        <h6 style="">Struktur Laporan</h6>
                            <div class="form-group row mb-0">
                                <div class="col-md-3 col-sm-12">
                                    <select name='kode_fs' id='kode_fs' class='form-control selectize'>
                                    <option value=''>Pilih Versi Neraca</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <select name='modul' id='modul' class='form-control selectize'>
                                    <option value=''>Pilih Tipe Neraca</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 text-right">
                                    <button type='button' class='sai-treegrid-btn-load btn btn-sm btn-outline-primary ' >Tampilkan</button>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-data" style="display:none">
            <div class="col-md-12">
                <div class="card">
                    <div class='card-body py-2 px-4'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <a href='#' class='sai-treegrid-btn-root btn btn-sm ' ><i class='simple-icon-anchor'></i> Root</a>
                                <a href='#' class='sai-treegrid-btn-tb btn btn-sm ' ><i class='simple-icon-plus'></i> Tambah</a>
                                <a href='#' class='sai-treegrid-btn-ub btn btn-sm ' ><i class='simple-icon-pencil'></i> Edit</a>
                                <a href='#' class='sai-treegrid-btn-del btn btn-sm '><i class='simple-icon-trash'></i> Hapus</a>
                                <a href='#' class='sai-treegrid-btn-link btn btn-sm '><i class='simple-icon-link'></i> Link</a>
                                <a href='#' class='sai-treegrid-btn-down btn btn-sm ' ><i class='simple-icon-arrow-down'></i> Turun</a>
                                <a href='#' class='sai-treegrid-btn-up btn btn-sm ' ><i class='simple-icon-arrow-up'></i> Naik</a>
                                <button type='submit' class='sai-treegrid-btn-save btn btn-sm btn-primary float-right' ><i class='fas fa-save'></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <div id="detLap" class="card-body pt-0">
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <div class="modal fade" id="sai-treegrid-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0.75em">
                <form id="sai-treegrid-modal-form">
                    <div class='modal-header py-0'>
                        <h6 class='modal-title py-2 my-0'>Input Format Laporan</h6>
                        <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" style="line-height:1.5">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body mb-0 pb-0" style="border:0">
                        <div class="form-group row mt-40 mb-3" hidden>
                            <label for="id-edit-set" class="col-3 col-form-label">Id</label>
                            <div class="col-9">
                                <input type='text' name='id_edit' maxlength='5' class='form-control' required id='id-edit-set' style='text-align:left' value="0">
                                <input type='text' name='_method' class='form-control' required id='method' style='text-align:left' value="post">
                            </div>
                        </div>
                        <div class="form-group row mt-40 mb-3">
                            <label for="kode-set" class="col-3 col-form-label">Kode</label>
                            <div class="col-9">
                                <input type='text' name='kode_neraca' maxlength='5' class='form-control' required id='kode-set' style='text-align:left'>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="nama-set" class="col-3 col-form-label">Nama</label>
                            <div class="col-9">
                                <input type='text' name='nama' maxlength='100' class='form-control' required id='nama-set'>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="lvl-set" class="col-3 col-form-label">Level Lap</label>
                            <div class="col-9">
                                <select class='form-control selectize' name='level_lap' id='lvlap-set'>
                                    <option value='' disabled>Pilih Level</option>
                                    <option value='1'>1</option>
                                    <option value='2'>2</option>
                                    <option value='3'>3</option>
                                    <option value='4'>4</option>
                                    <option value='5'>5</option>
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="tipe-set" class="col-3 col-form-label">Tipe</label>
                            <div class="col-9">
                                <select class='form-control selectize' name='tipe' id='tipe-set'>
                                    <option value='' disabled>Pilih Tipe</option>
                                    <option value='Summary' >Summary</option>
                                    <option value='Header' >Header</option>
                                    <option value='Posting' >Posting</option>
                                    <option value='SumPosted' >SumPosted</option>
                                    <option value='Spasi' >Spasi</option>
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="sumheader-set" class="col-3 col-form-label">Sumheader</label>
                            <div class="col-9">
                                <select class='form-control selectize' name='sum_header' id='sumheader-set'>
                                    <option value='' disabled>Pilih Sumheader</option>
                                    <option value='-'>-</option>
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="jns-set" class="col-3 col-form-label">Jenis Akun</label>
                            <div class="col-9">
                                <select class='form-control selectize' name='jenis_akun' id='jns-set'>
                                    <option value='' disabled>Pilih Jenis Akun</option>
                                    <option value='-'>-</option>
                                </select>    
                            </div>
                        </div>
                        <div class="form-group row mb-3" style='display:none'>
                            <label for="lv-set" class="col-3 col-form-label">Level Spasi</label>
                            <div class="col-9">
                                <input type='number' name='level_spasi' maxlength='5' class='form-control' readonly required id='lv-set'> 
                            </div>
                        </div>
                        <div class="form-group row mb-3" style='display:none'>
                            <label for="link-set" class="col-3 col-form-label">Urutan</label>
                            <div class="col-9">
                                <input type='text' name='nu' class='form-control' readonly required id='nu-set'>
                            </div>
                        </div>
                        <div class='form-group row mb-3' style='display:none'>
                            <label for="link-set" class="col-3 col-form-label">Row index</label>
                            <div class='col-9' style='margin-bottom:5px;'>
                            <input type='text' name='rowindex' class='form-control' readonly id='rowindex-set'>
                            </div>
                        </div>
                        <div class='form-group row mb-3'style='display:none'>                        
                            <label class='control-label col-3'>Kode Induk</label>
                            <div class='col-9' style='margin-bottom:5px;'>
                            <input type='text' name='kode_induk' class='form-control' readonly id='induk-set'>
                            </div>
                        </div>
                        <div id='validation-box'></div>
                    </div>
                    <div class="modal-footer" style="border:0">
                        <button type="submit" class="btn btn-primary" id="tb-set-index">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-relasi">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" style="border-radius:0.75em">
                <form id="form-relasi">
                    <div class="modal-header py-1" style="display:block;">
                        <div class='row' style='width:100%'>
                            <div class='col-4'>
                                <h6 class='modal-title py-2' id='header_modal'>Relasi Akun</h6>
                            </div>
                            <div class='col-4 text-center'>
                                <button type="button" class="sai-btn-allright pull-right btn btn-sm" title="Pindah kanan semua"><i class="simple-icon-control-end" style="font-size:16px"></i></button>
                                <button type='button' class='sai-btn-right pull-right btn btn-sm' title="Pindah kanan"><i class="simple-icon-control-play" style="font-size:16px"></i></button>
                                <button type='button' class='sai-btn-left btn btn-sm' title="Pindah kiri"><i class="simple-icon-control-play" style="display:inline-block;transform:rotate(180deg);font-size:16px"></i></button>
                                <button type='button' class='sai-btn-allleft btn btn-sm' title="Pindah kiri semua"><i class="simple-icon-control-start" style="font-size:16px"></i></button>
                            </div>
                            <div class='col-4 text-right'>
                                <button type='button' id="simpanRelasi" class='btn btn-primary'>Simpan</button> 
                                <button type="button" class="close float-right ml-2" data-dismiss="modal" aria-label="Close" style="line-height:1.5;margin-right:-40px">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class='row'>
                            <div class='col-6 table-responsive px-0'>
                                <input type='hidden' id='kd_nrc' name='kode_neraca'>
                                <table id='table-belum' class='table table-bordered' width='100%'>
                                    <thead>
                                        <tr>
                                            <td>Kode Akun</td>
                                            <td>Nama Akun</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            
                            </div>
                            <div class='col-6 table-responsive px-0'>
                                
                                <table id='table-sudah' class='table table-bordered' width='100%'>
                                    <thead>
                                        <tr>
                                            <td>Kode Akun</td>
                                            <td>Nama Akun</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- JS Tree -->

<script src="{{ asset('asset_dore/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('asset_elite/js/jquery.treegrid.js') }}"></script>
<script type="text/javascript">
    var $kode_klp = "{{ Session::get('kodeMenu') }}";
    
    $.fn.DataTable.ext.pager.numbers_length = 5;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });
    function init(kode_fs,modul){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/format-laporan') }}",
            dataType: 'json',
            data: {'kode_fs':kode_fs,'modul':modul},
            success:function(result){    
                $('#detLap').html('');
                console.dir(result.data);
                if(result.data.status){
                    if(typeof result.html !== 'undefined'){
                        var html = `<table class='treegrid table' id='sai-treegrid'>
                            <thead><th>Kode Neraca</th><th>Nama Neraca</th><th>Level Lap</th><th>Tipe</th></thead>
                            <tbody>
                            `+result.html+`
                            </tbody>
                        </table>`;
                        $('#detLap').html(html);
                        $('.treegrid').treegrid({
                            enableMove: true, 
                            onMoveOver: function(item, helper, target, position) {
                                console.log(target);
                                console.log(position); 
                            }
                        });
                    }
                } else if(!result.data.status && result.data.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                    //     window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                }
            }
        });
    }

    function getVersi(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/format-laporan-versi') }}",
            dataType: 'json',
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        var select = $('#kode_fs').selectize();
                        select = select[0];
                        var control = select.selectize;
                        control.clearOptions();
                        for(i=0;i<result.data.data.length;i++){
                            control.addOption([{text:result.data.data[i].kode_fs+' - '+result.data.data[i].nama, value:result.data.data[i].kode_fs}]);  
                        }
                    }
                } else if(!result.data.status && result.data.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                    //     window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                }
            }
        });
    }

    function getTipe(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/format-laporan-tipe') }}",
            dataType: 'json',
            data: {'kode_menu':$kode_klp},
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        var select = $('#modul').selectize();
                        select = select[0];
                        var control = select.selectize;
                        control.clearOptions();
                        for(i=0;i<result.data.data.length;i++){
                            control.addOption([{text:result.data.data[i].kode_tipe+' - '+result.data.data[i].nama_tipe, value:result.data.data[i].kode_tipe}]);  
                        }
                    }
                } else if(!result.data.status && result.data.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                    //     window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                }
            }
        });
    }

    function getJenisAkun(){
       
        var select = $('#jns-set').selectize();
        select = select[0];
        var control = select.selectize;
        var modul = $('#modul')[0].selectize.getValue();

        var daftar = [];
        switch(modul){
            case 'A':
            daftar = ['Neraca'];
            break;
            case 'P':
            daftar = ['Neraca','Labarugi'];
            break;
            case 'L':
            daftar = ['Beban','Pendapatan'];
            break;
        }

        control.clearOptions();
        for(i=0;i<daftar.length;i++){
            control.addOption([{text:daftar[i], value:daftar[i]}]);  
        }
    }

    $(document).ready(function(){
    
        // init();
        // getLink();
        $('.modal-dialog').draggable({
            handle: ".modal-header"
        });
        getVersi();
        getTipe();
        $('.selectize').selectize();
        $('.sai-treegrid-btn-load').click(function(){
            var kode_fs = $('#kode_fs')[0].selectize.getValue();
            var modul = $('#modul')[0].selectize.getValue();
            $('#saku-data').show();
            init(kode_fs,modul);
        });

        $('#detLap').on('click', 'tr', function(){
            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            $(this).addClass('ui-selected');

            var this_index = $(this).index();
            var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
            var node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);

            var this_node = $("."+node_class).treegrid('getId');
            var this_parent = $("."+node_class).treegrid('getParent');
            var this_kode = $("."+node_class).find('.set_kode').text();
            var this_nu = $("."+node_class).treegrid('getBranch').last().find('.set_nu').text();
            var this_rowindex = $("."+node_class).treegrid('getBranch').last().find('.set_index').text();

            if(this_nu == ""){
                var this_nu = $("."+node_class).find('.set_nu').text();
                var this_rowindex = $("."+node_class).find('.set_index').text();
            }

            
            var this_lv = $("."+node_class).treegrid('getDepth');
            var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
            var this_child_branch = $("."+node_class).treegrid('getBranch').length;

            var nu = parseInt(this_nu) + 1;
            var rowindex = parseInt(this_rowindex) + 1;

            if(nu == null || nu == '' || isNaN(nu)){
                nu = 101;
            }else{
                nu = nu;
            }

            if(rowindex == null || rowindex == '' || isNaN(rowindex)){
                rowindex = 1;
            }else{
                rowindex = rowindex;
            }
            
            // $('#kode-set').val(this_kode.concat(+this_child_amount + 1));
            $('#lv-set').val(this_lv);
            $('#nu-set').val(nu);
            console.log(node_class);
            $('#induk-set').val(this_kode);
            $('#rowindex-set').val(rowindex);
        });

        $('.sai-treegrid-btn-root').click(function(){
            // clear
            $('#kode-set').val('');
            $('#nama-set').val('');

            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            var root = $('#sai-treegrid').treegrid('getRoots').length;
            var kode=root+1;
           
            $('#lv-set').val(0);
            $('#induk-set').val('00');
            var nu = parseInt($("#sai-treegrid tbody tr:last").find('.set_nu').text());
            if(nu == null || nu == '' || isNaN(nu)){
                nu = 100;
            }else{
                nu = nu;
            }
            $('#nu-set').val(nu + 1);
            var this_rowindex = parseInt($("#sai-treegrid tbody tr:last").find('.set_index').text());
            if(this_rowindex == null || this_rowindex == '' || isNaN(this_rowindex)){
                this_rowindex = 0;
            }else{
                this_rowindex = this_rowindex;
            }
            $('#rowindex-set').val(this_rowindex+1);
            $('.del-gl-index').attr('href', '#');
            getJenisAkun();
            
            $('#kode-set').val('');
            $('#id-edit-set').val('0');
            $('#method').val('post');
            $('#nama-set').val('');
            $('#sai-treegrid-modal').modal('show');
        });

        $('.sai-treegrid-btn-up').click(function(){
            if($(".ui-selected").length != 1){
                // alert('Harap pilih struktur yang akan dipindah terlebih dahulu');
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan dipindah terlebih dahulu'
                });
                return false;
            }else{
                var this_index = $(".ui-selected").closest('tr').index();
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                var i = this_index;
                var index_prev = this_index;
                while (i > 0){
                    var index_prev = index_prev - 1;
                    var class_prev = $("#sai-treegrid tbody tr:eq("+index_prev+")").attr('class');
                    var node_class_prev = class_prev.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                    var lvl_prev = $("."+node_class_prev).find('.set_lvl').val();
                    if(lvl_prev == this_lvl){
                        break;
                    }
                    i--;
                }
                // var prev_index = $(".ui-selected").closest('tr').index()-1;
                var prev_index = index_prev;
                var prev_id = $(".treegrid-"+prev_index).treegrid('getId');
                var prev_class = $("#sai-treegrid tbody tr:eq("+prev_index+")").attr('class');
                var prev_node_class = prev_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var prev_node = $("."+prev_node_class).treegrid('getId');
                var prev_parent = $("."+prev_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+prev_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var prev_lvl = $("."+prev_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();
                
                var tmp = prev_class.split(' ');
                var seb_node = tmp[0];
                prt_lvl = prev_lvl;
                // console.log('prev_index:'+prev_index);
                // console.log('seb_node:'+seb_node);
                // console.log('prev_lvl:'+prev_lvl);

                if(prev_index >= 0){
                    if(this_lvl == prt_lvl){
                        $('.treegrid-'+this_node).treegrid('move', $('.'+seb_node), 0);
                    }else{
                        return false;
                    }

                }

            }
        });

        $('.sai-treegrid-btn-down').click(function(){
            if($(".ui-selected").length != 1){
                // alert('Harap pilih struktur yang akan dipindah terlebih dahulu');
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan dipindah terlebih dahulu!'
                });
                return false;
            }else{
                
                var this_index = $(".ui-selected").closest('tr').index();
                console.log('this_index:'+this_index);
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                var this_child_amount = $("."+this_node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+this_node_class).treegrid('getBranch').length;

                var i = this_index;
                var index_next = this_index;
                while (i < 8){
                    var index_next = index_next + 1;
                    var class_next = $("#sai-treegrid tbody tr:eq("+index_next+")").attr('class');
                    var node_class_next = class_next.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                    var lvl_next = $("."+node_class_next).find('.set_lvl').val();
                    if(lvl_next == this_lvl){
                        break;
                    }
                    i++;
                }

                next_index = index_next;
                var next_id = $(".treegrid-"+next_index).treegrid('getId');
                var next_class = $("#sai-treegrid tbody tr:eq("+next_index+")").attr('class');
                var next_node_class = next_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var next_node = $("."+next_node_class).treegrid('getId');
                var next_parent = $("."+next_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+next_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);
                var next_lvl = $("."+next_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();

                var tmp = next_class.split(' ');
                var stlh_node = tmp[0];
                prt_lvl = next_lvl;

                if(next_index >= 0){
                    if(this_lvl == prt_lvl){
                        $('.'+stlh_node).treegrid('move', $('.treegrid-'+this_node), 0);
                    }else{
                        return false;
                    }

                }

            }
        });

        $('.sai-treegrid-btn-tb').click(function(){
            if($(".ui-selected").length != 1){
                // clear
                $('#kode-set').val('');
                $('#nama-set').val('');
                $('#sai-treegrid tbody tr').removeClass('ui-selected');

                // get prev code

                var root = $('#sai-treegrid tbody').treegrid('getRoots').length;
                if (root == 1){
                    var kode=root;
                }else{
                    var kode=root+1;
                }

                $('#lv-set').val(0);
                $('#induk-set').val('00');
                var nu = parseInt($("#sai-treegrid tbody tr:last").find('.set_nu').text());
                if(nu == null || nu == '' || isNaN(nu)){
                    nu = 100;
                }else{
                    nu = nu;
                }
                $('#nu-set').val(nu+1);
                var rowindex = parseInt($("#sai-treegrid tbody tr:last").find('.set_index').text());

                if(rowindex == null || rowindex == '' || isNaN(rowindex)){
                    rowindex = 0;
                }else{
                    rowindex = rowindex;
                }

                $('#rowindex-set').val(rowindex+1);
                $('.del-gl-index').attr('href', '#');

                getJenisAkun();
                
                $('#id-edit-set').val('0');
                $('#method').val('post');
                $('#kode-set').val('');
                $('#nama-set').val('');
                // $('#link-set')[0].selectize.setValue('');
                $('#sai-treegrid-modal').modal('show');
            }else{

                var this_index = $('.ui-selected').index();
                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var node_class = this_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);

                var this_node = $("."+node_class).treegrid('getId');
                var this_parent = $("."+node_class).treegrid('getParent');
                var this_kode = $("."+node_class).find('.set_kode').text();
                var this_nu = $("."+node_class).treegrid('getBranch').last().find('.set_nu').text();
                var this_rowindex = $("."+node_class).treegrid('getBranch').last().find('.set_index').text();

                if(this_nu == ""){
                    var this_nu = $("."+node_class).find('.set_nu').text();
                    var this_rowindex = $("."+node_class).find('.set_index').text();
                }

                
                var this_lv = $("."+node_class).treegrid('getDepth');
                var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+node_class).treegrid('getBranch').length;

                var nu = parseInt(this_nu) + 1;
                var rowindex = parseInt(this_rowindex) + 1;

                if(nu == null || nu == '' || isNaN(nu)){
                    nu = 101;
                }else{
                    nu = nu;
                }

                if(rowindex == null || rowindex == '' || isNaN(rowindex)){
                    rowindex = 1;
                }else{
                    rowindex = rowindex;
                }
                
                // $('#kode-set').val(this_kode.concat(+this_child_amount + 1));
                $('#lv-set').val(this_lv);
                $('#nu-set').val(nu);
                $('#induk-set').val(this_kode);
                $('#rowindex-set').val(rowindex);

                var tipe = $(".ui-selected").closest('tr').find('.set_tipe').val();
                var kode = $(".ui-selected").closest('tr').find('.set_kode').text();
                if(tipe == "Posting"){
                    // alert("Kode "+kode+" tidak boleh bertipe posting. Ubah tipenya dulu ke Header atau Sum Posted, jika akan ditambahkan sub item");
                    msgDialog({
                        id: '',
                        type: 'warning',
                        text: "Kode "+kode+" tidak boleh bertipe posting. Ubah tipenya dulu ke Header atau Sum Posted, jika akan ditambahkan sub item"
                    });
                }else{
                    getJenisAkun();
                    
                    $('#id-edit-set').val('1');
                    $('#method').val('post');
                    $('#kode-set').val('');
                    $('#nama-set').val('');
                    // $('#link-set')[0].selectize.setValue('');
                    $('#sai-treegrid-modal').modal('show');
                }
            }
        });

        $('.sai-treegrid-btn-del').click(function(){
            if($(".ui-selected").length != 1){
                // alert('Harap pilih struktur yang akan dihapus terlebih dahulu');
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan dihapus terlebih dahulu'
                });
                return false;
            }else{
                var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
                if(sts){
                    var selected_id = $(".ui-selected").closest('tr').find('.set_kode').text();
                    var kode_fs=$('#kode_fs')[0].selectize.getValue();
                    var modul=$('#modul')[0].selectize.getValue();
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('esaku-master/format-laporan') }}",
                        dataType: 'json',
                        data: {'kode_fs':kode_fs,'modul':modul,'kode_neraca':selected_id},
                        success:function(result){
                            // alert(result.data.message);
                            
                            if(result.data.status){
                                msgDialog({
                                    id: '',
                                    type: 'sukses',
                                    text: result.data.message
                                });
                                init(kode_fs,modul);
                                
                            } else if(!result.data.status && result.data.message == 'Unauthorized'){
                                // Swal.fire({
                                //     title: 'Session telah habis',
                                //     text: 'harap login terlebih dahulu!',
                                //     icon: 'error'
                                // }).then(function() {
                                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                                // })
                            }else{
                                msgDialog({
                                    id: '',
                                    type: 'sukses',
                                    title: 'Error',
                                    text: result.data.message
                                });
                            }
                        }
                    });

                }else{
                    return false;
                }
            }
        });

        $('.sai-treegrid-btn-ub').click(function(){
            if($(".ui-selected").length == 1){
                var sel_index = $(".ui-selected").closest('tr').index();
                var sel_node = $(".treegrid-"+sel_index).treegrid('getId');
                var sel_depth = $(".treegrid-"+sel_index).treegrid('getDepth');
                // alert(sel_index);
                
                var sel_class = $("#sai-treegrid tbody tr:eq("+sel_index+")").attr('class');
                var node_class = sel_class.match(/^treegrid-[A-Za-z0-9_.]+/gm);

                var this_node = $("."+node_class).treegrid('getId');
                var this_parent = $("."+node_class).treegrid('getParent');
                var this_kode = $("."+node_class).find('.set_kode').text();
                var this_nama = $("."+node_class).find('.set_nama').text();
                var this_lvlap = $("."+node_class).find('.set_lvlap').text();
                var this_tipe = $("."+node_class).find('.set_tipe').val();
                var this_sumheader = $("."+node_class).find('.set_sumheader').val();
                var this_induk = $("."+node_class).find('.set_kodeinduk').val();
                var this_jenis = $("."+node_class).find('.set_jenis').val();          

                var this_nu = parseInt($("."+node_class).find('.set_nu').text());
                var this_rowindex = parseInt($("."+node_class).find('.set_index').text());
                var this_lv = $("."+node_class).treegrid('getDepth');
                var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+node_class).treegrid('getBranch').length;
                // var this_induk = $("."+node_class).treegrid('getParent').find('.set_kode').text();
            
                console.log(this_kode);
                getJenisAkun();
                
                $('#id-edit-set').val('1');
                $('#method').val('put');
                $('#kode-set').val(this_kode);
                $('#nama-set').val(this_nama);
                $('#sumheader-set')[0].selectize.setValue(this_sumheader);
                $('#tipe-set')[0].selectize.setValue(this_tipe);
                $('#lvlap-set')[0].selectize.setValue(this_lvlap);
                $('#jns-set')[0].selectize.setValue(this_jenis);
                $('#lv-set').val(this_lv-1);
                
                $('#nu-set').val(this_nu);
                $('#rowindex-set').val(this_rowindex);
                $('#induk-set').val(this_induk);
                $('#sai-treegrid-modal').modal('show');


            }else{
                // alert('Harap pilih struktur yang akan diubah terlebih dahulu');
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan diubah terlebih dahulu'
                });
                return false;
            }
        });
        
        $("#sai-treegrid-modal-form").on("submit", function(event){
            event.preventDefault();
            var kode_fs = $('#kode_fs')[0].selectize.getValue();
            var modul = $('#modul')[0].selectize.getValue();
            var formData = new FormData(this);
            formData.append('kode_fs', kode_fs);
            formData.append('modul', modul);

            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url:"{{ url('esaku-master/format-laporan') }}",
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    // alert(result.data.message);
                    
                    if(result.data.status){
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            text: result.data.message
                        });
                        
                        init(kode_fs,modul);
                        $('#sai-treegrid-modal').modal('hide');
                        // $('#sai-treegrid tr').removeClass('ui-selected');
                        $('#validation-box').text('');
                    }else if(!result.data.status && result.data.message == 'Unauthorized'){
                        // Swal.fire({
                        //     title: 'Session telah habis',
                        //     text: 'harap login terlebih dahulu!',
                        //     icon: 'error'
                        // }).then(function() {
                            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                        // })
                    }else{
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                }
            });

        });

        
    
        $('#menu-form').submit(function(e){
        e.preventDefault();
            
            var formData = new FormData(this);
            var kode_fs = $('#kode_fs')[0].selectize.getValue();
            var modul = $('#modul')[0].selectize.getValue();
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-master/format-laporan-move') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    // alert('Perubahan '+result.data.message);
                    if(result.data.status){
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            text: 'Perubahan '+result.data.message
                        });
                        init(kode_fs,modul);
                    } else if(!result.data.status && result.data.message == 'Unauthorized'){
                        // Swal.fire({
                        //     title: 'Session telah habis',
                        //     text: 'harap login terlebih dahulu!',
                        //     icon: 'error'
                        // }).then(function() {
                            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                        // })
                    }else{
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        });

        var table_belum = $("#table-belum").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            data :[],
            columns: [
                { data: 'kode_akun' },
                { data: 'nama' },
            ],
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            },
        });

        var table_sudah= $('#table-sudah').DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<f>>>t<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            data :[],
            columns: [
                { data: 'kode_akun' },
                { data: 'nama' },
            ],
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(terfilter dari _MAX_ total entri)"
            },
        });

        function getDataAkun(kode_neraca,modul){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/format-laporan-relakun') }}",
                dataType: 'json',
                data: {'kode_neraca':kode_neraca,'modul':modul},
                success:function(result){    
                    if(result.data.status){
                        table_belum.clear().draw();
                        if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                            table_belum.rows.add(result.data.data).draw(false);
                        }
                        table_sudah.clear().draw();
                        if(typeof result.data.detail !== 'undefined' && result.data.detail.length>0){
                            table_sudah.rows.add(result.data.detail).draw(false);
                        }
                    } else if(!result.data.status && result.data.message == 'Unauthorized'){
                        // Swal.fire({
                        //     title: 'Session telah habis',
                        //     text: 'harap login terlebih dahulu!',
                        //     icon: 'error'
                        // }).then(function() {
                        //     window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                        // })
                    }
                }
            });
        }

        $('.sai-treegrid-btn-link').click(function(){
            if($(".ui-selected").length != 1){
                // alert('Harap pilih struktur yang akan di relasi terlebih dahulu');
                msgDialog({
                    id: '',
                    type: 'warning',
                    text: 'Harap pilih struktur yang akan di relasi terlebih dahulu'
                });
                return false;
            }else{
                var tipe = $('.ui-selected').closest('tr').find('.set_tipe').val();
                var kode_neraca = $('.ui-selected').closest('tr').find('.set_kode').text();
                var modul = $('#modul')[0].selectize.getValue();
                if(tipe == "Posting"){
                    $('#kd_nrc').val(kode_neraca);
                    getDataAkun(kode_neraca,modul);
                    $('#modal-relasi').modal('show');
                }else{
                    // alert('Hanya kode akun yang bertipe posting yang bisa direlasi!');
                    msgDialog({
                        id: '',
                        type: 'warning',
                        text: 'Hanya kode akun yang bertipe posting yang bisa direlasi!'
                    });
                }
            }
        });
    
        $('.modal-header').on('click','.sai-btn-right',function (e) {
            e.preventDefault();

            var source = table_belum.rows('.selected').data();
            table_belum.rows('.selected').remove().draw(false);

            table_sudah.rows.add(source).draw(false);
        });

        $('.modal-header').on('click','.sai-btn-allright',function (e) {
            e.preventDefault();

            var source = table_belum.data();
            table_belum.rows().remove().draw(false);
            table_sudah.rows.add(source).draw(false);
        });

        $('.modal-header').on('click','.sai-btn-left',function (e) {
            e.preventDefault();
            var source = table_sudah.rows('.selected2').data();
            table_sudah.rows('.selected2').remove().draw(false);

            table_belum.rows.add(source).draw(false);

        });

        $('.modal-header').on('click','.sai-btn-allleft',function (e) {
            e.preventDefault();

            var source = table_sudah.data();
            table_sudah.rows().remove().draw(false);
            table_belum.rows.add(source).draw(false);
        });

        $('#table-belum tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                // table_belum.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#table-sudah tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected2') ) {
                $(this).removeClass('selected2');
            }
            else {
                // table_sudah.$('tr.selected2').removeClass('selected2');
                $(this).addClass('selected2');
            }
        });

        $('#form-relasi').on('click','#simpanRelasi',function(e){
            e.preventDefault();
            var data = table_sudah.data();
            var formData = new FormData();
            
            var tempData = []; 
            var i=0;
            $.each( data, function( key, value ) {
                formData.append('kode_akun[]',value.kode_akun);
                formData.append('nama[]',value.nama);
            });
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            var kode_neraca = $('#kd_nrc').val();
            var kode_fs =  $('#kode_fs')[0].selectize.getValue();
            formData.append('kode_neraca',kode_neraca);
            formData.append('kode_fs',kode_fs);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-master/format-laporan-relasi') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    // alert(result.data.message);
                    if(result.data.status){
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            text: result.data.message
                        });

                        $('#modal-relasi').modal('hide');
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        // Swal.fire({
                        //     title: 'Session telah habis',
                        //     text: 'harap login terlebih dahulu!',
                        //     icon: 'error'
                        // }).then(function() {
                            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                        // })
                    }else{
                        msgDialog({
                            id: '',
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        });
    

    });


</script>
