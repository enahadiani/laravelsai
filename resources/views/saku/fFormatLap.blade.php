<link href="{{ asset('asset_elite/css/jquery.treegrid.css') }}" rel="stylesheet">
<style>
.ui-selected{
    background: #4286f5;
    color:white;
}
.selected{
    background: #4286f5 !important;
    color:white;
}
.selected2{
    background: #4286f5 !important;
    color:white;
}
td,th{
    padding:8px !important;
}
</style>
<div class="container-fluid mt-3">
    <div class="row" id="saku-data">
        <div class="col-12">
            <div class="card">
            <form id="menu-form">
                <div class='card-body'>
                    <div class="form-group row mb-0">
                        <div class="col-3">
                            <select name='kode_fs' id='kode_fs' class='form-control selectize'>
                            <option value=''>Pilih Versi Neraca</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-3">
                            <select name='modul' id='modul' class='form-control selectize'>
                            <option value=''>Pilih Tipe Neraca</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <button type='button' class='sai-treegrid-btn-load btn btn-primary btn-sm' ><i class='ti-reload'></i> Load</button>
                        </div>
                    </div>
                    <hr style='margin:5px auto'>
                    <div class='row'>
                        <div class='col-12'>
                            <!-- <button type='submit' class='sai-treegrid-btn-save btn btn-success btn-sm' ><i class='fa fa-save'></i> Simpan</button> -->
                            
                            <a href='#' class='sai-treegrid-btn-root btn btn-secondary btn-sm' ><i class='fa fa-anchor'></i> Root</a>
                            <a href='#' class='sai-treegrid-btn-tb btn btn-success btn-sm' ><i class='fa fa-plus'></i> Tambah</a>
                            <a href='#' class='sai-treegrid-btn-ub btn btn-primary btn-sm' ><i class='fa fa-pencil-alt'></i> Edit</a>
                            <a href='#' class='sai-treegrid-btn-del btn btn-danger btn-sm'><i class='fa fa-times'></i> Hapus</a>
                            <a href='#' class='sai-treegrid-btn-link btn btn-secondary btn-sm'><i class='fas fa-link'></i> Link</a>
                            <a href='#' class='sai-treegrid-btn-down btn btn-secondary btn-sm' ><i class='fas fa-angle-down'></i> Turun</a>
                            <a href='#' class='sai-treegrid-btn-up btn btn-secondary btn-sm' ><i class='fas fa-angle-up'></i> Naik</a>
                            <button type='submit' class='sai-treegrid-btn-save btn btn-primary btn-sm' ><i class='fas fa-save'></i> Simpan</button>
                        </div>
                    </div>
                </div>
                <div id="detLap" class="card-body table-responsive pt-0" style="height: 360px;">
                    
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sai-treegrid-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="sai-treegrid-modal-form">
                <div class='modal-header'>
                    <h5 class='modal-title'>Input Format Laporan</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    </button>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="tb-set-index" style='margin-right:15px;'>Simpan</button>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal' aria-label='Close'> Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-relasi">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="form-relasi">
                <div class='modal-header'>
                    <div class='row' style='width:100%'>
                        <div class='col-4'>
                            <h5 class='modal-title' id='header_modal'>Relasi Akun</h5>
                        </div>
                        <div class='col-4 text-center'>
                            <button type="button" class="sai-btn-allright pull-right btn btn-secondary btn-sm"><img src="{{ asset('asset_elite/img/next.png') }}" width="18px"></button>
                            <button type='button' class='sai-btn-right pull-right btn btn-secondary btn-sm' ><img src="{{ asset('asset_elite/img/play-button-arrowhead.png') }}" width="18px"></button>
                            <button type='button' class='sai-btn-left btn btn-secondary btn-sm' ><img src="{{ asset('asset_elite/img/back.png') }}" width="18px"></button>
                            <button type='button' class='sai-btn-allleft  btn btn-secondary btn-sm' ><img src="{{ asset('asset_elite/img/previous.png') }}" width="18px"></button>
                        </div>
                        <div class='col-4 text-right'>
                            <button type='button' id="simpanRelasi" class='btn btn-primary'>Simpan</button> 
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class='row'>
                        <div class='col-6 table-responsive px-0'>
                            <input type='hidden' id='kd_nrc' name='kode_neraca'>
                            <table id='table-belum' class='table table-bordered table-striped' width='100%'>
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
                            
                            <table id='table-sudah' class='table table-bordered table-striped' width='100%'>
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
<script src="{{ asset('asset_elite/js/jquery.treegrid.js') }}"></script>
<script type="text/javascript">
    var $kode_klp = "{{ Session::get('kodeMenu') }}";
    function init(kode_fs,modul){
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/format-laporan') }}",
            dataType: 'json',
            data: {'kode_fs':kode_fs,'modul':modul},
            success:function(result){    
                if(result.data.status){
                    $('#detLap').html('');
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
                }
            }
        });
    }

    function getVersi(){
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/format-laporan-versi') }}",
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
                }
            }
        });
    }

    function getTipe(){
        $.ajax({
            type: 'GET',
            url: "{{ url('saku/format-laporan-tipe') }}",
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
        getVersi();
        getTipe();
        $('.selectize').selectize();
        $('.sai-treegrid-btn-load').click(function(){
            var kode_fs = $('#kode_fs')[0].selectize.getValue();
            var modul = $('#modul')[0].selectize.getValue();
            init(kode_fs,modul);
        });

        $('#detLap').on('click', 'tr', function(){
            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            $(this).addClass('ui-selected');

            var this_index = $(this).index();
            var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
            var node_class = this_class.match(/^treegrid-[0-9]+/gm);

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
            console.log(this_kode);
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
                alert('Harap pilih struktur yang akan dipindah terlebih dahulu');
                return false;
            }else{
                var this_index = $(".ui-selected").closest('tr').index();
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[0-9]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                var i = this_index;
                var index_prev = this_index;
                while (i > 0){
                    var index_prev = index_prev - 1;
                    var class_prev = $("#sai-treegrid tbody tr:eq("+index_prev+")").attr('class');
                    var node_class_prev = class_prev.match(/^treegrid-[0-9]+/gm);
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
                var prev_node_class = prev_class.match(/^treegrid-[0-9]+/gm);
                var prev_node = $("."+prev_node_class).treegrid('getId');
                var prev_parent = $("."+prev_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+prev_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[0-9]+/gm);
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
                alert('Harap pilih struktur yang akan dipindah terlebih dahulu');
                return false;
            }else{
                
                var this_index = $(".ui-selected").closest('tr').index();
                console.log('this_index:'+this_index);
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[0-9]+/gm);
                
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
                    var node_class_next = class_next.match(/^treegrid-[0-9]+/gm);
                    var lvl_next = $("."+node_class_next).find('.set_lvl').val();
                    if(lvl_next == this_lvl){
                        break;
                    }
                    i++;
                }

                next_index = index_next;
                var next_id = $(".treegrid-"+next_index).treegrid('getId');
                var next_class = $("#sai-treegrid tbody tr:eq("+next_index+")").attr('class');
                var next_node_class = next_class.match(/^treegrid-[0-9]+/gm);
                var next_node = $("."+next_node_class).treegrid('getId');
                var next_parent = $("."+next_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+next_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[0-9]+/gm);
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

                var tipe = $(".ui-selected").closest('tr').find('.set_tipe').val();
                var kode = $(".ui-selected").closest('tr').find('.set_kode').text();
                if(tipe == "Posting"){
                    alert("Kode "+kode+" tidak boleh bertipe posting. Ubah tipenya dulu ke Header atau Sum Posted, jika akan ditambahkan sub item");
                }else{
                    getJenisAkun();
                    
                    $('#id-edit-set').val('1');
                    $('#method').val('put');
                    $('#kode-set').val('');
                    $('#nama-set').val('');
                    // $('#link-set')[0].selectize.setValue('');
                    $('#sai-treegrid-modal').modal('show');
                }
            }
        });

        $('.sai-treegrid-btn-del').click(function(){
            if($(".ui-selected").length != 1){
                alert('Harap pilih struktur yang akan dihapus terlebih dahulu');
                return false;
            }else{
                var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
                if(sts){
                    var selected_id = $(".ui-selected").closest('tr').find('.set_kode').text();
                    var kode_fs=$('#kode_fs')[0].selectize.getValue();
                    var modul=$('#modul')[0].selectize.getValue();
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('saku/format-laporan') }}",
                        dataType: 'json',
                        data: {'kode_fs':kode_fs,'modul':modul,'kode_neraca':selected_id},
                        success:function(res){
                            alert(res.message);
                            if(res.status){
                                init(kode_fs,modul);
                                
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
                var node_class = sel_class.match(/^treegrid-[0-9]+/gm);

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
                alert('Harap pilih struktur yang akan diubah terlebih dahulu');
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
                url:"{{ url('saku/format-laporan') }}",
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(res){
                    alert(res.message);
                    if(res){
                        
                        init(kode_fs,modul);
                        $('#sai-treegrid-modal').modal('hide');
                        // $('#sai-treegrid tr').removeClass('ui-selected');
                        $('#validation-box').text('');
                    }
                }
            });

        });

        
    
        $('#saku-data').on('submit', '#menu-form', function(e){
        e.preventDefault();
            
            
            var formData = new FormData(this);
            var kode_fs = $('#kode_fs')[0].selectize.getValue();
            var modul = $('#modul')[0].selectize.getValue();
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            $.ajax({
                type: 'POST',
                url: "{{ url('saku/format-laporan-move') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    alert('Perubahan '+result.message);
                    if(result.status){
                        init(kode_klp);
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        });

        var table_belum = $('#table-belum').DataTable({
            'data' :[],
            'columns': [
                { data: 'kode_akun' },
                { data: 'nama' },
            ],
        });
        var table_sudah= $('#table-sudah').DataTable({
            'data':[],
            'columns': [
                { data: 'kode_akun' },
                { data: 'nama' },
            ],
        });

        function getDataAkun(kode_neraca,modul){
            $.ajax({
                type: 'GET',
                url: "{{ url('saku/format-laporan-relakun') }}",
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
                    }
                }
            });
        }

        $('.sai-treegrid-btn-link').click(function(){
            if($(".ui-selected").length != 1){
                alert('Harap pilih struktur yang akan di relasi terlebih dahulu');
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
                    alert('Hanya kode akun yang bertipe posting yang bisa direlasi!');
                }
            }
        });
    
        $('.modal-header').on('click','.sai-btn-right',function (e) {
            e.preventDefault();

            var source = table_belum.row('.selected').data();
            table_belum.row('.selected').remove().draw(false);

            table_sudah.row.add(source).draw(false);
        });

        $('.modal-header').on('click','.sai-btn-allright',function (e) {
            e.preventDefault();

            var source = table_belum.data();
            table_belum.rows().remove().draw(false);
            table_sudah.rows.add(source).draw(false);
        });

        $('.modal-header').on('click','.sai-btn-left',function (e) {
            e.preventDefault();
            var source = table_sudah.row('.selected2').data();
            table_sudah.row('.selected2').remove().draw(false);

            table_belum.row.add(source).draw(false);

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
                table_belum.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $('#table-sudah tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected2') ) {
                $(this).removeClass('selected2');
            }
            else {
                table_sudah.$('tr.selected2').removeClass('selected2');
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
                url: "{{ url('saku/format-laporan-relasi') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    alert(result.message);
                    $('#modal-relasi').modal('hide');
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        });
    

    });


</script>
