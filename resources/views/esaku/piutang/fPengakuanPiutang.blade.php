<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
    .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;   
    }
</style>

<x-list-data judul="Data Pengakuan Piutang" tambah="true" :thead="array('No Bukti', 'Tanggal', 'Customer','No Dokumen', 'Deskripsi', 'Total','Aksi')" :thwidth="array(15,10,20,15,25,10,10)" :thclass="array('','','','','','','text-center')" />