<!-- LIST DATA -->
<x-list-data judul="Data Histori Approval" tambah="" :thead="array('No Aju', 'No Urut', 'ID Approval', 'Keterangan', 'Tanggal', 'Aksi')" :thwidth="array(15,10,15,20,20,10)" :thclass="array('','','','','','text-center')" back="true" />
<!-- END LIST DATA -->
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    // SET UP VIEW
    var scroll = document.querySelector('#content-preview');
    new PerfectScrollbar(scroll);
    // END SET UP VIEW

    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }

    // LIST DATA
    var action_html = "<a href='#' title='Cetak' id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a>&nbsp;&nbsp;&nbsp;<a href='#' title='Preview' id='btn-preview'><i class='simple-icon-doc' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('rkap-trans/app-usul') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'no_urut' },
            { data: 'id' },
            { data: 'keterangan' },
            { data: 'tanggal' }
        ],
        "{{ url('rkap-auth/sesi-habis') }}",
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

    $('[data-toggle="popover"]').popover({ trigger: "focus" });
    // END LIST DATA

    $('#saku-datatable').on('click','#btn-print',function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(0).html();
        var jenis = $(this).closest('tr').find('td').eq(2).html();
        printPreviewApp(id, jenis,'#saku-form','#saku-datatable');
    });

    $('#saku-datatable').on('click','#btn-preview',function(e) {
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(0).html();
        printPreview(id,'#saku-form','#saku-datatable');
    });

    $('#saku-print #btn-back').click(function(e) {
        e.preventDefault();
        $('#saku-print').hide()
        $('#saku-datatable').show()
        $('#saku-form').hide()
    });
    // END PRINT PREVIEW

    $('#saku-datatable').on('click', '#btn-kembali', function(e){
        e.preventDefault();
        var kode = null;
        msgDialog({
            id:kode,
            btn1: 'btn btn-primary',
            btn2: 'btn btn-light',
            title: 'Keluar Form?',
            text: 'Kembali ke halaman utama.',
            confirm: 'Keluar',
            cancel: 'Batal',
            type:'custom',
            showCustom:function(result){
                if (result.value) {
                    $('.navbar-top a').removeClass('active');
                    $('a[data-href="fUsulDash"]').addClass('active');
                    var url = "{{ url('rkap-auth/form')}}/fUsulMenu";
                    $('#trans-body').load(url);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // console.log('cancel');
                }
            }
        });
    });
</script>