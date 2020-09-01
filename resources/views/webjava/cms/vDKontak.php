<?php
    $this->saitable->init(array('ID', 'Judul', 'Status'), array('id', 'judul', 'status'), $daftar);
    $this->saitable->setBoxName('Kontak');
    $this->saitable->insertable('/webjava/CMSAdmin/tbKontak/');
    $this->saitable->editBtn('/webjava/CMSAdmin/tbKontak/');
    $this->saitable->delBtn('/webjava/CMSAdmin/delKontak/');
    $this->saitable->custBtn('/webjava/CMSAdmin/useKontak/', "Ubah status", array(0), $icon='fa fa-check-circle');
    $this->saitable->draw();
?>