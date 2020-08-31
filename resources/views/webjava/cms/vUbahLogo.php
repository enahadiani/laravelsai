<?php
    formOpenAjax('/webjava/CMSAdmin/home', null, 'java-cms-form-logo', array('Form Ubah Logo', 'fa fa-file-text-o'));
?>
    <div class='row'>
        <div class='col-sm-12'>
            <div class='form-group'>
                <center>
                
                    <img src='<?php echo $detail['logo']; ?>' style='width:25%; height:25%; min-width:200px; min-height:200px; display:block; margin-left: auto; margin-right: auto;'>
                    <br><br>
                    <center><b>Url:</b> <i><?php echo base_url($detail['logo']); ?></i></center>
                </center>
            </div>
        </div>
    </div>
<?php
    keteranganInput('Keterangan', '&nbsp;&nbsp; Logo dengan format .PNG .JPG .JPEG');
    saiFile('File', 'logo', 'image/jpg, image/jpeg, image/png');
    // saiInput('text', 'nama', '')
    formCloseAjax();
?>