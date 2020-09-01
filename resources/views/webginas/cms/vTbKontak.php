<?php
    formOpenAjax('webjava/CMSAdmin/dKontak', null, 'java-cms-form-kontak', array('Form Kontak', 'fa fa-file-text-o'));

    if(ISSET($detail['id'])){
        saiInput('text', 'Id', 'id', null, (ISSET($detail['id']) ? $detail['id'] : null), null, 'readonly' );
    }

    saiInput('text', 'Judul', 'judul', 200, (ISSET($detail['judul']) ? $detail['judul'] : null) );
    saiTextArea('Isi', 'keterangan', null, null, null, (ISSET($detail['keterangan']) ? $detail['keterangan'] : null), '.cms-text-editor');
    saiInput('text', 'Latitude', 'latitude', null, (ISSET($detail['latitude']) ? $detail['latitude'] : null));
    saiInput('text', 'Longitude', 'longitude', null, (ISSET($detail['longitude']) ? $detail['longitude'] : null));
    formCloseAjax();
?>