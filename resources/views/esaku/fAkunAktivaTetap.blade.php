{{-- Referensi file fVendor folder Esaku --}}
<link rel="stylesheet" href="{{ asset('master.css') }}" />

<!-- LIST DATA -->
    <x-list-data judul="Data Akun Aktiva Tetap" tambah="true" :thead="array('Kode','Nama','Umur (Thn)','Persentase','Akun Aktap','Akun BP','Akun Akumulasi','Aksi')" :thwidth="array(10,20,5,10,10,10,10,10)" :thclass="array('','','','','','','','text-center')" />
<!-- END LIST DATA -->

<script type="text/javascript">
    setHeightForm();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.selectize').selectize();

    function last_add(param,isi){
        var rowIndexes = [];
        dataTable.rows( function ( idx, data, node ) {             
            if(data[param] === isi){
                rowIndexes.push(idx);                  
            }
            return false;
        }); 
        dataTable.row(rowIndexes).select();
        $('.selected td:eq(0)').addClass('last-add');
        console.log('last-add');
        setTimeout(function() {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    // var scrollform = document.querySelector('.form-body');
    // var psscrollform = new PerfectScrollbar(scrollform);

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/masakun') }}", 
        [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                "targets": [2],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'kode_akun' },
            { data: 'nama' },
            { data: 'tgl_input' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[2 ,"desc"]]
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