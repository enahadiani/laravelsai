<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<x-list-data judul="Data Tagihan Project" tambah="true" :thead="array('No Tagihan', 'No Proyek', 'Tanggal', 'Nilai', 'Aksi')" :thwidth="array(15,15,10,10,10)" :thclass="array('','','','','text-center')" />

@include('modal_search')

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">

</script>