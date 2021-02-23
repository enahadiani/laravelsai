 <link rel="stylesheet" href="{{ asset('trans.css') }}" />
 <link rel="stylesheet" href="{{ asset('trans-esaku/trans.css') }}" />

 <x-list-data judul="Data Jurnal" tambah="true" :thead="array('No Bukti','Tanggal','No Dokumen','Deskripsi','Nilai','Posting','Tgl Input','Aksi')" :thwidth="array(15,15,15,20,15,10,0,10)" :thclass="array('','','','','','','','text-center')" />