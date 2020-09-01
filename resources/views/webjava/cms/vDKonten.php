<?php
    $this->saitable->init(array('ID', 'Tanggal', 'Judul'), array('id', 'tanggal', 'judul'), $daftar);
    $this->saitable->setBoxName('Konten');
    $this->saitable->insertable('/webjava/CMSAdmin/tbKonten/');
    $this->saitable->editBtn('/webjava/CMSAdmin/tbKonten/');
    $this->saitable->delBtn('/webjava/CMSAdmin/delKonten/');
    $this->saitable->draw();
?>