<x-list-data judul="Data Justifikasi Pengajuan Dalam Proses" tambah=""
    :thead="array('No Bukti', 'No Dokumen', 'Regional', 'Nilai Pengadaan', 'Nilai Finish','Progress')"
    :thwidth="array(15,25,20,10,10,10)" :thclass="array('','','','','','')" />

<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('helper.js') }}"></script>
<script>
    setHeightForm();


 // LIST DATA
    var dataTable = generateTable(
        "table-data",
        "{{ url('apv/juskeb') }}",
        [{
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if (rowData.status == "baru") {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                'targets': [3, 4],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            },
            // {
            //     "targets": [6, 7],
            //     "visible": false
            // },
            // {
            //     'targets': 5,
            //     'className': 'text-center'
            // }
        ],
        [{
                data: 'no_bukti'
            },
            {
                data: 'no_dokumen'
            },
            {
                data: 'nama_pp'
            },
            {
                data: 'nilai'
            },
            {
                data: 'nilai_finish'
            },
            {
                data: 'posisi'
            },
        ],
        "{{ url('silo-auth/sesi-habis') }}",
        [
            [5, "desc"]
        ]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({
        trigger: "focus"
    });
    // END LIST DATA
