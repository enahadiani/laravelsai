<?php
    formOpenAjax('webjava/CMSAdmin/dGaleri', null, 'java-cms-form-galeri', array('Form Galeri', 'fa fa-file-text-o'));

    if(ISSET($detail['id'])){
        saiMediaPreview('Preview',(ISSET($detail['file_gambar']) ? $detail['file_gambar'] : null), $detail['file_type']);
        saiInput('text', 'Kode', 'id', null, (ISSET($detail['id']) ? $detail['id'] : null), null, 'readonly' );
        saiFile('File', 'file_gambar', 'image/png, image/jpg, image/jpeg, video/mp4, video/avi', null, null, '');
    }else{
        saiFile('File', 'file_gambar', 'image/png, image/jpg, image/jpeg');
    }

    saiInput('text', 'Nama', 'nama', 200, (ISSET($detail['nama']) ? $detail['nama'] : null) );
    saiTextArea('Keterangan', 'keterangan', null, null, 300, (ISSET($detail['keterangan']) ? $detail['keterangan'] : null) );
    // saiSelect('Kelompok (Untuk)', 'kode_klp', $klp, 'kode_klp', 'nama', (ISSET($detail['kode_klp']) ? $detail['kode_klp'] : null) );
    saiSelect('Untuk', 'jenis', array(array('jenis'=>'Galeri'),array('jenis'=>'Konten')), 'jenis', null, (ISSET($detail['jenis']) ? $detail['jenis'] : null) );
    saiSelect('Kategori Halaman Galeri', 'kode_ktg', $ktg, 'kode_ktg', 'nama', (ISSET($detail['kode_ktg']) ? $detail['kode_ktg'] : null) );
    formCloseAjax();
?>