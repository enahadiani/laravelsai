<?php
    formOpenAjax('webjava/CMSAdmin/dKtgGaleri', null, 'java-cms-form-ktg-galeri', array('Form Kategori Galeri', 'fa fa-file-text-o'));

    if(ISSET($detail['kode_ktg'])){
        saiInput('text', 'Kode', 'kode_ktg', 10, (ISSET($detail['kode_ktg']) ? $detail['kode_ktg'] : null), null, 'readonly' );
    }

    saiInput('text', 'Nama', 'nama', 200, (ISSET($detail['nama']) ? $detail['nama'] : null) );
    formCloseAjax();
?>