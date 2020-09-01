
<?php
    if($daftar != null){
        echo "
                                
        <div class='row'>
            <div class='col-xs-12'>
                <div class='box'>
                    <div class='box-header pull-right'>
                        <a href='#' class='sai-treegrid-btn-root btn btn-default btn-sm' data-toggle='modal' data-target='#sai-treegrid-modal'><i class='fa fa-anchor'></i> Root</a>
                        <a href='#' class='sai-treegrid-btn-tb btn btn-success btn-sm' data-toggle='modal' data-target='#sai-treegrid-modal'><i class='fa fa-plus'></i> Tambah</a>
                        <a href='#' class='sai-treegrid-btn-ub btn btn-primary btn-sm' data-toggle='modal' data-target='#sai-treegrid-modal'><i class='fa fa-pencil'></i> Ubah</a>
                        <a href='#' class='sai-treegrid-btn-del btn btn-danger btn-sm'><i class='fa fa-times'></i> Hapus</a>
                    </div>
                    <div class='box-body'>
                        <table class='treegrid table' id='sai-treegrid'>
                            <tbody>
                                ";
                                    $pre_prt = 0;
                                    $parent_array = array();
                                    // node == i
                                    for($i=0; $i<count($daftar); $i++){
                                        if(!ISSET($daftar[$i-1]['level_menu'])){
                                            $prev_lv = 0;
                                        }else{
                                            $prev_lv = $daftar[$i-1]['level_menu'];
                                        }

                                        if($daftar[$i]['level_menu'] == 0){
                                            $parent_to_prt = "";
                                            $prev_prt = $i;
                                            $parent_array[$daftar[$i]['level_menu']] = $i;
                                        }else if($daftar[$i]['level_menu'] > $prev_lv){
                                            $parent_to_prt = "treegrid-parent-".($i-1);
                                            $prev_prt = $i-1;
                                            $parent_array[$daftar[$i]['level_menu']] = $i - 1;
                                        }else if($daftar[$i]['level_menu'] == $prev_lv){
                                            $parent_to_prt = "treegrid-parent-".($prev_prt);
                                        }else if($daftar[$i]['level_menu'] < $prev_lv){
                                            $parent_to_prt = "treegrid-parent-".$parent_array[$daftar[$i]['level_menu']];
                                        }

                                        echo "
                                            <tr class='treegrid-$i $parent_to_prt'>
                                                <td class='set_kd_mn'>".$daftar[$i]['kode_menu']."</td>
                                                <td class='set_nama'>".$daftar[$i]['nama']."</td>
                                                <td class='set_link'>".$daftar[$i]['link']."</td>
                                                <td class='set_jenis'>".$daftar[$i]['jenis']."</td>
                                            </tr>
                                        ";
                                    }
        echo "
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
?>

<div class="modal fade" id="sai-treegrid-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Setting Struktur</h4>
            </div>
            <form id="sai-treegrid-modal-form">
                <div class="modal-body">
                    <?php
                        saiInput('number', 'Kode', 'kode_menu', 5, null, '#kode-set', 'readonly required');
                        saiInput('text', 'Nama', 'nama', 5, null, '#nama-set');
                        saiSelect('Jenis', 'jenis', array(array('x'=>'Fix'),array('x'=>'Induk'),array('x'=>'Dinamis')), 'x', null, null, TRUE, '#jenis-set');
                        saiSelect('Link', 'link', $daftar_link, 'id', 'nama', null, TRUE, '#link-set');
                        saiInput('number', 'Level', 'level_menu', null, null, '#lv-set', 'readonly required');
                        saiInput('number', 'Urutan', 'nu', null, null, '#nu-set', 'readonly required');
                    ?>
                    <div id='validation-box'></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="tb-set-index" style='margin-right:15px;'>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
