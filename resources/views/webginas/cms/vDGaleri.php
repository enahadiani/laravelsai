<?php
    $this->saitable->init(array('ID', 'Nama', 'Jenis'), array('id', 'nama', 'jenis'), $daftar);
    $this->saitable->setBoxName('Galeri');
    $this->saitable->insertable('/webjava/CMSAdmin/tbGaleri/');
    $this->saitable->editBtn('/webjava/CMSAdmin/tbGaleri/');
    $this->saitable->delBtn('/webjava/CMSAdmin/delGaleri/');
    $this->saitable->draw();
?>