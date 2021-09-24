<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<!-- LIST DATA -->
<x-list-data judul="Daftar Penjualan" tambah="" :thead="array('No Penjualan','Nik Kasir','Tanggal','Total')" :thwidth="array(20,18,18,22)" :thclass="array('','','','')" />
<!-- END LIST DATA -->

<script src="{{ asset('helper.js') }}"></script>
<script src="{{ asset('main.js') }}"></script>

<script type="text/javascript">

// LIST DATA
var action_html = "<a href='#' title='Edit' class='web_datatable_edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;";

var dataTable = generateTable(
    "table-data",
    "{{ url('esaku-trans/daftar-penjualan') }}", 
    [
        // {'targets': 5, data: null, 'defaultContent': action_html, 'className': 'text-center' },
        { 
            'targets': 3, 
            'className': 'text-right',        
            'render': $.fn.dataTable.render.number( '.', ',', 0, 'Rp. ' )
        }
    ],
    [
        { data: 'no_jual' },
        { data: 'nik_user' },
        { data: 'tanggal',  render: function(data,type,row){
            var split = data.split('-');
            var tgl = split[2];
            var bln = split[1];
            var tahun = split[0];
            return tgl+"/"+bln+"/"+tahun;
        } },
        { data: 'nilai' },
    ],
    "{{ url('esaku-auth/sesi-habis') }}",
    [[0 ,"desc"]]
);

$.fn.DataTable.ext.pager.numbers_length = 5;

$("#searchData").on("keyup", function (event) {
    dataTable.search($(this).val()).draw();
});

$("#page-count").on("change", function (event) {
    var selText = $(this).val();
    dataTable.page.len(parseInt(selText)).draw();
});
// END LIST DATA
</script>