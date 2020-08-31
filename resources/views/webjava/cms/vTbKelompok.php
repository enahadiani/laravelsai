<?php
    formOpenAjax('webjava/CMSAdmin/dKelompok', null, 'java-cms-form-kelompok', array('Form Kelompok', 'fa fa-file-text-o'));

    if(ISSET($detail['kode_klp'])){
        saiInput('text', 'Kode', 'kode_klp', 10, (ISSET($detail['kode_klp']) ? $detail['kode_klp'] : null), null, 'readonly' );
    }

    saiInput('text', 'Nama', 'nama', 200, (ISSET($detail['nama']) ? $detail['nama'] : null) );
    formCloseAjax();
?>