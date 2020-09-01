<?php
    $this->saitable->init(array('Kode', 'Nama'), array('kode_ktg', 'nama'), $daftar);
    $this->saitable->setBoxName('Kategori Galeri');
    $this->saitable->insertable('/webjava/CMSAdmin/tbKtgGaleri/');
    $this->saitable->editBtn('/webjava/CMSAdmin/tbKtgGaleri/');
    $this->saitable->delBtn('/webjava/CMSAdmin/delKtgGaleri/');
    $this->saitable->draw();
?>