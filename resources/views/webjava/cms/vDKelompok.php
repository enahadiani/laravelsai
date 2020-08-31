<?php
    $this->saitable->init(array('Kode', 'Nama'), array('kode_klp', 'nama'), $daftar);
    $this->saitable->setBoxName('Kelompok');
    $this->saitable->insertable('/webjava/CMSAdmin/tbKelompok/');
    $this->saitable->editBtn('/webjava/CMSAdmin/tbKelompok/');
    $this->saitable->delBtn('/webjava/CMSAdmin/delKelompok/');
    $this->saitable->draw();
?>