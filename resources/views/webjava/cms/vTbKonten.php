<?php
    formOpenAjax('webjava/CMSAdmin/dKonten', null, 'java-cms-form-konten', array('Form Konten', 'fa fa-file-text-o'));

    if(ISSET($detail['id'])){
        saiInput('text', 'Id', 'id', null, (ISSET($detail['id']) ? $detail['id'] : null), null, 'readonly' );
    }

    saiInput('text', 'Judul', 'judul', 200, (ISSET($detail['judul']) ? $detail['judul'] : null) );
    saiInput('datedmy', 'Tanggal Publish', 'tanggal', null, (ISSET($detail['tanggal']) ? reverseDate(cutDate($detail['tanggal'])) : null));
    saiSelect('Header', 'header_url', $header, 'id', 'nama', (ISSET($detail['header_url']) ? $detail['header_url'] : null), null, null, '');
    saiTextArea('Isi', 'keterangan', null, null, null, (ISSET($detail['keterangan']) ? $detail['keterangan'] : null), '.cms-text-editor');
    saiSelect('Kelompok', 'kode_klp', $klp, 'kode_klp', 'nama', (ISSET($detail['kode_klp']) ? $detail['kode_klp'] : null));
    saiSelect('Kategori', 'kode_kategori', $kategori, 'kode_kategori', 'nama', (ISSET($detail['kode_kategori']) ? $detail['kode_kategori'] : null), TRUE, NULL, '');
    saiInput('text', 'Tag', 'tag', 200, (ISSET($detail['tag']) ? $detail['tag'] : null), null, '');
    keteranganInput('Keterangan', "&nbsp; Tag dipisahkan dengan ',' dan maksimal karakter sebanyak 200");
    formCloseAjax();
?>