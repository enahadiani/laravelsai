
<link href="{{ asset('asset_elite/jquery.treegrid.css') }}" rel="stylesheet">
<style>
.ui-selected{
    background: #4286f5;
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
                    <div class='row'>
                        <div class='col-3'>
                            <select name='kode_klp' id='kode_klp' class='form-control selectize'>
                                <option value=''>Pilih Kelompok Menu</option>
                            </select>
                        </div>
                        <div class='col-9 text-right'>
                            <!-- <button type='submit' class='sai-treegrid-btn-save btn btn-success btn-sm' ><i class='fa fa-save'></i> Simpan</button> -->
                            
                            <a href='#' class='sai-treegrid-btn-root btn btn-secondary btn-sm' ><i class='fa fa-anchor'></i> Root</a>
                            <a href='#' class='sai-treegrid-btn-tb btn btn-success btn-sm' ><i class='fa fa-plus'></i> Tambah</a>
                            <a href='#' class='sai-treegrid-btn-ub btn btn-primary btn-sm' ><i class='fa fa-pencil-alt'></i> Edit</a>
                            <a href='#' class='sai-treegrid-btn-del btn btn-danger btn-sm'><i class='fa fa-times'></i> Hapus</a>
                            <a href='#' class='sai-treegrid-btn-down btn btn-secondary btn-sm' ><i class='fas fa-angle-down'></i> Turun</a>
                            <a href='#' class='sai-treegrid-btn-up btn btn-secondary btn-sm' ><i class='fas fa-angle-up'></i> Naik</a>
                            <button type='submit' class='sai-treegrid-btn-save btn btn-primary btn-sm' ><i class='fas fa-save'></i> Simpan</button>
                        </div>
                    </div>
                </div>
                <div id="detMenu" class="card-body table-responsive" style="height: 440px;">
                    
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
                    <h5 class='modal-title'>Form Setting Menu</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row mt-40">
                        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                        <input type="hidden" id="method" name="_method" value="post">
                        <label for="kode-set" class="col-3 col-form-label">Kode</label>
                        <div class="col-9">
                            <input type='text' name='kode_menu' maxlength='5' class='form-control' required id='kode-set' style='text-align:left'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama-set" class="col-3 col-form-label">Nama</label>
                        <div class="col-9">
                            <input type='text' name='nama' maxlength='100' class='form-control' required id='nama-set'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="link-set" class="col-3 col-form-label">Link</label>
                        <div class="col-9">
                            <select class='form-control selectize' name='link' id='link-set'>
                                <option value='' disabled>Pilih Link</option>
                            </select>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon-set" class="col-3 col-form-label">Icon</label>
                        <div class="col-9">
                            <input type='text' name='icon' maxlength='100' class='form-control' required id='icon-set'> 
                        </div>
                    </div>
                    <div class="form-group row" style=''>
                        <label for="link-set" class="col-3 col-form-label">Level</label>
                        <div class="col-9">
                            <input type='number' name='level_menu' maxlength='5' class='form-control' readonly required id='lv-set'> 
                        </div>
                    </div>
                    <div class="form-group row" style='display:none'>
                        <!-- <label for="link-set" class="col-3 col-form-label">Urutan</label> -->
                        <div class="col-9">
                            <input type='hidden' name='nu' class='form-control' readonly required id='nu-set'>
                        </div>
                    </div>
                    <div class='form-group row' style='display:none'>
                        <!-- <label for="link-set" class="col-3 col-form-label">Row index</label> -->
                        <div class='col-9' style='margin-bottom:5px;'>
                        <input type='hidden' name='rowindex' class='form-control' readonly id='rowindex-set'>
                        </div>
                    </div>
                    <div class='form-group row' style='display:none'>                        
                        <!-- <label class='control-label col-3'>Kode Klp Menu</label> -->
                        <div class='col-9' style='margin-bottom:5px;'>
                        <input type='hidden' name='kode_klp' class='form-control' readonly id='klp-set'>
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
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>
    <script src="{{ asset('asset_elite/jquery.treegrid.js') }}"></script>

    <script type="text/javascript">
    $('#kode_klp').change(function(e){
        e.preventDefault();
        init($(this).val());
    });

    function getKlpMenu(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('toko-master/menu-klp') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var select = $('#kode_klp').selectize();
                            select = select[0];
                            var control = select.selectize;
                            control.clearOptions();
                            for(i=0;i<result.daftar.length;i++){
                                control.addOption([{text:result.daftar[i].kode_klp, value:result.daftar[i].kode_klp}]);  
                            }
                        }
                    }
                }
            });
    }

    function getMenuLab(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('toko-master/menu-form') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var select = $('#link-set').selectize();
                            select = select[0];
                            var control = select.selectize;
                            for(i=0;i<result.daftar.length;i++){
                                control.addOption([{text:result.daftar[i].kode_form + ' - ' + result.daftar[i].form, value:result.daftar[i].kode_form}]);  
                            
                            }
                        }
                    }
                }
            });
    }

    function init(kode_klp=null){
        if(kode_klp == null){
            var kode =  '';
        }else{
            var kode = kode_klp;
        }
        $.ajax({
            type: 'GET',
            url: "{{ url('toko-master/menu') }}/"+kode_klp,
            dataType: 'json',
            async:false,
            success:function(result){ 
                if(result.data.status){
                    // $('#sai-treegrid tbody').html('');
                    // $('.treegrid').treegrid('remove');
                    $('#detMenu').html('');
                    if(typeof result.data.data !== 'undefined'){
                        var $parent_array = [];
                        var html = `<table class='treegrid table' id='sai-treegrid'>
                            <thead><th>Kode Menu</th><th>Nama Menu</th><th>Kode Form</th></thead>
                            <tbody>`
                            for(var i=0;i<result.data.data.length;i++){
                                var line = result.data.data;
                                if(line[i-1] === undefined){
                                $prev_lv = 0;
                                }else{
                                    $prev_lv = line[i-1].level_menu;
                                }
                                console.log($prev_lv)
                                
                                if(line[i].level_menu == 0){
                                    $parent_to_prt = "";
                                    $prev_prt = i;
                                    $parent_array[line[i].level_menu] = i;
                                }else if(line[i].level_menu > $prev_lv){
                                    $parent_to_prt = "treegrid-parent-"+(i-1);
                                    $prev_prt = i-1;
                                    $parent_array[line[i].level_menu] = i - 1;
                                }else if(line[i].level_menu == $prev_lv){
                                    $parent_to_prt = "treegrid-parent-"+($prev_prt);
                                }else if(line[i].level_menu < $prev_lv){
                                    $parent_to_prt = "treegrid-parent-"+$parent_array[line[i].level_menu];
                                }

                                
                                html+=`<tr class='treegrid-${i} ${$parent_to_prt}'>
                                <td class='set_kd_mn'>${line[i].kode_menu}<input type='hidden' name='kode_menu[]' value='${line[i].kode_menu}'><input type='hidden' class='set_lvl' name='level_menu[]' value='${line[i].level_menu}'></td>
                                <td class='set_nama'>${line[i].nama}<input type='hidden' name='nama_menu[]' value='${line[i].nama}'><input type='hidden' name='jenis_menu[]' value='${line[i].jenis_menu}'></td>
                                <td class='set_link'>${line[i].kode_form}<input type='hidden' name='kode_form[]' value='${line[i].kode_form}'><input type='hidden' class='set_icon' name='icon[]' value='${line[i].icon}'></td>
                                <td class='set_nu' style='display:none'>${line[i].nu}</td>
                                <td class='set_index' style='display:none'>${line[i].rowindex}</td>
                                </tr>`;
                                
                            }
                            `</tbody>
                        </table>`;
                        $('#detMenu').html(html);
                        $('.treegrid').treegrid({
                            enableMove: true, 
                            onMoveOver: function(item, helper, target, position) {
                                console.log(target);
                                console.log(position); 
                            }
                        });
                        // $('.treegrid').treegrid('add', [result.html]);
                        // $('.treegrid').treegrid('render');
                        // $('.treegrid').treegrid({
                        //     expanderExpandedClass: 'glyphicon glyphicon-minus',
                        //     expanderCollapsedClass: 'glyphicon glyphicon-plus'
                        // });
                    }
                }
            }
        });
    }

        $(document).ready(function(){
    
        // init();
        getMenuLab();
        getKlpMenu();

        $('#detMenu').on('click', 'tr', function(){
            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            $(this).addClass('ui-selected');

            var this_index = $(this).index();
            var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
            var node_class = this_class.match(/^treegrid-[0-9]+/gm);

            var this_node = $("."+node_class).treegrid('getId');
            var this_parent = $("."+node_class).treegrid('getParent');
            var this_kode = $("."+node_class).find('.set_kd_mn').text();
            var this_icon = $("."+node_class).find('.set_icon').val();
            var this_nu = $("."+node_class).treegrid('getChildNodes').last().find('.set_nu').text();
            var this_rowindex = $("."+node_class).treegrid('getChildNodes').last().find('.set_index').text();


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
            $('#icon-set').val(this_icon);
            $('#rowindex-set').val(rowindex);
            
            var klp_menu = $('#kode_klp')[0].selectize.getValue();
            $('#klp-set').val(klp_menu);

        });

        $('.sai-treegrid-btn-root').click(function(){
            // clear
            $('#kode-set').val('');
            $('#nama-set').val('');
            $('#icon-set').val('');
            $('#link-set')[0].selectize.setValue('');
            // $('#induk-set').val('');

            $('#sai-treegrid tbody tr').removeClass('ui-selected');
            var root = $('#sai-treegrid').treegrid('getRoots').length;
            // if (root == 1){
            //     var kode=root;
            // }else{
                var kode=root+1;
            // }
            // alert(root);
            var klp_menu = $('#kode_klp')[0].selectize.getValue();
            // $('#kode-set').val(kode);
            $('#klp-set').val(klp_menu);
            $('#lv-set').val(0);
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
            getMenuLab();
            
            $('#kode-set').val('');
            $('#nama-set').val('');
            $('#icon-set').val('');
            $('#link-set')[0].selectize.setValue('');
            $('#sai-treegrid-modal').modal('show');
        });

        $('.sai-treegrid-btn-up').click(function(){
            if($(".ui-selected").length != 1){
                alert('Harap pilih struktur yang akan dipindah terlebih dahulu');
                return false;
            }else{
                var prev_index = $(".ui-selected").closest('tr').index()-1;
                var prev_id = $(".treegrid-"+prev_index).treegrid('getId');
                var prev_class = $("#sai-treegrid tbody tr:eq("+prev_index+")").attr('class');
                var prev_node_class = prev_class.match(/^treegrid-[0-9]+/gm);
                var prev_node = $("."+prev_node_class).treegrid('getId');
                var prev_parent = $("."+prev_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+prev_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[0-9]+/gm);
                var prev_lvl = $("."+prev_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();
                
                var this_index = $(".ui-selected").closest('tr').index();
                var this_id = $(".treegrid-"+this_index).treegrid('getId');
                var this_depth = $(".treegrid-"+this_index).treegrid('getDepth');

                var this_class = $("#sai-treegrid tbody tr:eq("+this_index+")").attr('class');
                var this_node_class = this_class.match(/^treegrid-[0-9]+/gm);
                
                var this_node = $("."+this_node_class).treegrid('getId');
                var this_parent = $("."+this_node_class).treegrid('getParent').index();
                var this_lvl = $("."+this_node_class).find('.set_lvl').val();
                
                if(this_lvl == 0){
                    var tmp = prev_class.split(' ');
                    if(tmp[1] == undefined){
                        prev_parent = -1;
                    }else{
                        var target = tmp[1].split('-');
                        prev_parent = target[2];
                    }
                    
                    if(prev_parent < 0){
                        var seb_node = 'treegrid-'+prev_node;
                        // var seb_node = prev_index;
                        prt_lvl = prev_lvl;
                    }else{
                        var seb_node = 'treegrid-'+prev_parent;
                        // var seb_node = prev_index;
                    }
                }else{
                    prt_lvl = prev_lvl;
                    var seb_node = 'treegrid-'+prev_node;
                }

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

                var tambah = 0;
                if(this_child_amount > 0){
                    tambah = parseInt(this_child_amount)+1;
                }else{
                    tambah = 1;
                }
                var next_index = $(".ui-selected").closest('tr').index()+tambah;
                var next_id = $(".treegrid-"+next_index).treegrid('getId');
                var next_class = $("#sai-treegrid tbody tr:eq("+next_index+")").attr('class');
                var next_node_class = next_class.match(/^treegrid-[0-9]+/gm);
                var next_node = $("."+next_node_class).treegrid('getId');
                var next_parent = $("."+next_node_class).treegrid('getParent').index();
                var prt_class = $("#sai-treegrid tbody tr:eq("+next_parent+")").attr('class');
                var prt_node_class = prt_class.match(/^treegrid-[0-9]+/gm);
                var next_lvl = $("."+next_node_class).find('.set_lvl').val();
                var prt_lvl = $("."+prt_node_class).find('.set_lvl').val();

                console.log('next_index:'+next_index);
                console.log('next_id:'+next_id);
                console.log('next_class:'+next_class);
                console.log('next_node_class:'+next_node_class);
                console.log('next_parent:'+next_parent);
                console.log('prt_class:'+prt_class);
                console.log('prt_node_class:'+prt_node_class);
                console.log('next_lvl:'+next_lvl);
                console.log('prt_lvl:'+prt_lvl);
                
                
                if(this_lvl == 0){
                    var tmp = next_class.split(' ');
                    if(tmp[1] == undefined){
                        next_parent = -1;
                    }else{
                        var target = tmp[1].split('-');
                        next_parent = target[2];
                    }
                    
                    if(next_parent < 0){
                        var stlh_node = 'treegrid-'+next_node;
                        // var stlh_node = next_index;
                        prt_lvl = next_lvl;
                    }else{
                        var stlh_node = 'treegrid-'+next_parent;
                        // var stlh_node = next_index;
                    }
                }else{
                    prt_lvl = next_lvl;
                    var stlh_node = 'treegrid-'+next_node;
                }
                console.log('this_lvl:'+this_lvl);
                console.log('prt_lvl:'+prt_lvl);
                console.log('this_node:'+this_node);
                console.log('stlh_node:'+stlh_node);
                console.log('this_depth:'+this_depth);
                console.log('this_child_amount:'+this_child_amount);
                console.log('this_child_branch:'+this_child_branch);

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
                $('#link-set')[0].selectize.setValue('');
                // $('#induk-set').val('');
                $('#sai-treegrid tbody tr').removeClass('ui-selected');

                // get prev code

                var root = $('#sai-treegrid tbody').treegrid('getRoots').length;
                if (root == 1){
                    var kode=root;
                }else{
                    var kode=root+1;
                }
                
                var klp_menu = $('#kode_klp')[0].selectize.getValue();
                // $('#kode-set').val(kode);
                $('#klp-set').val(klp_menu);
                $('#lv-set').val(0);
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
            }
            getMenuLab();
            $('#id_edit').val('');
            $('#method').val('post');
            $('#kode-set').val('');
            $('#nama-set').val('');
            $('#icon-set').val('');
            $('#link-set')[0].selectize.setValue('');
            $('#sai-treegrid-modal').modal('show');
        });

        $('.sai-treegrid-btn-del').click(function(){
            if($(".ui-selected").length != 1){
                alert('Harap pilih struktur yang akan dihapus terlebih dahulu');
                return false;
            }else{
                var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
                if(sts){
                    var selected_id = $(".ui-selected").closest('tr').find('.set_kd_mn').text();
                    var kode_klp=$('#kode_klp')[0].selectize.getValue();
                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('toko-master/menu') }}/"+selected_id+"/"+kode_klp,
                        dataType: 'json',
                        success:function(res){

                            alert(res.data.message);
                            if(res.data.status){
                                init(kode_klp);
                                
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
                var this_kode = $("."+node_class).find('.set_kd_mn').text();
                var this_nama = $("."+node_class).find('.set_nama').text();
                var this_link = $("."+node_class).find('.set_link').text();
                var this_nu = parseInt($("."+node_class).find('.set_nu').text());
                var this_rowindex = parseInt($("."+node_class).find('.set_index').text());
                var this_lv = $("."+node_class).treegrid('getDepth');
                var this_child_amount = $("."+node_class).treegrid('getChildNodes').length;
                var this_child_branch = $("."+node_class).treegrid('getBranch').length;
                var this_induk = $("."+node_class).treegrid('getParent').find('.set_kd_mn').text();
            
                
                var klp_menu = $('#kode_klp')[0].selectize.getValue();
                $('#id_edit').val('edit');
                $('#method').val('put');
                $('#kode-set').val(this_kode);
                $('#klp-set').val(klp_menu);
                $('#nama-set').val(this_nama);
                $('#link-set')[0].selectize.setValue(this_link);
                $('#lv-set').val(this_lv-1);
                
                $('#nu-set').val(this_nu);
                $('#rowindex-set').val(this_rowindex);
                // $('#induk-set').val(this_induk);
                getMenuLab();
                $('#sai-treegrid-modal').modal('show');


            }else{
                alert('Harap pilih struktur yang akan diubah terlebih dahulu');
                return false;
            }
        });
        
        $("#sai-treegrid-modal-form").on("submit", function(event){
            event.preventDefault();
            var sel_index = $(".ui-selected").closest('tr').index();
            var sel_node = $(".treegrid-"+sel_index).treegrid('getId');
            var sel_depth = $(".treegrid-"+sel_index).treegrid('getDepth');
            
            var sel_class = $("#sai-treegrid tbody tr:eq("+sel_index+")").attr('class');
            var node_class = sel_class.match(/^treegrid-[0-9]+/gm);

            var new_node = $("#sai-treegrid tbody tr:last").index() + 1;
            var kode_str = $('#kode-set').val();
            var nama_str = $('#nama-set').val();
            var nu_str = $('#nu-set').val();
            var rowindex_str = $('#rowindex-set').val();
            var kode_klp = $('#klp-set').val();
            var link_str = $('#link-set')[0].selectize.getValue();

            
            var parameter = $('#id_edit').val();
            if(parameter == "edit"){
            var url = "{{ url('toko-master/menu') }}/"+kode_str+"/"+kode_klp;
            }else{
                var url = "{{url('toko-master/menu')}}";
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
                contentType: false,
                cache: false,
                processData: false, 
                success:function(res){
                    alert(res.data.message);
                    if(res.data.status){
                        init(kode_klp);
                        $('#sai-treegrid-modal').modal('hide');
                        // $('#sai-treegrid tr').removeClass('ui-selected');
                        $('#validation-box').text('');
                    }
                }
            });

        });
    
    });

    $('#saku-data').on('submit', '#menu-form', function(e){
    e.preventDefault();
        
        
        var formData = new FormData(this);
        var kode_klp = $('#kode_klp')[0].selectize.getValue();
        
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        
        $.ajax({
            type: 'POST',
            url: "{{ url('toko-master/menu-move') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                alert('Perubahan '+result.data.message);
                if(result.data.status){
                    init(kode_klp);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    });
    </script>