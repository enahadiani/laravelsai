<section id="detail-pegawai" class="detail-section" style="display: none;">
    <section id="dekstop-4" class="dekstop-4 pb-1 m-b-25">
        <div class="row">
            <div class="col-12">
                <div class="card card-dash">
                    <div class="card-header row">
                        <div class="col-12 header-content">
                            <div class="glyph-icon iconsminds-left to-main-dash"></div>
                            <h6 class="card-title-2 text-bold text-medium detail-card">Data Pegawai</h6>
                        </div>
                    </div>
                    <hr/>
                    <div class="card-body row">
                        <div class="col-12">
                            <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                            <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                                <div class="page-countdata">
                                    <label> Menampilkan 
                                        <select style="border:none" id="page-count">
                                            <option value="10">10 per halaman</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                                <div class="input-group input-group-sm" style="max-width:321px;float:right">
                                    <input type="text" class="form-control" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="filter-btn" id="searchData" style="border-top-right-radius: 0 !important;border-bottom-right-radius: 0 !important;max-width:230px !important">
                                    <div class="input-group-append" style="max-width:92px !important;width:100%">
                                        <span class="input-group-text" id="filter-btn" style="border-top-right-radius: 0.5rem !important;border-bottom-right-radius: 0.5rem !important;width:100%"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i> Filter</span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="datatable-karyawan" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIK</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">No BPJS Ketenagakerjaan</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Lokasi Kerja</th>
                                            <th class="text-center">Client</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script type="text/javascript">
var $datatable = null;
// EVENT UNTUK KEMBALI KE DATA PEGAWAI
$('#to-pegawai').click(function() {
    $('#detail-cv').hide();
    $('#detail-pegawai').show();
})
// END EVENT UNTUK KEMBALI KE DATA PEGAWAI
// EVENT CLICK ROW TABLE
$('#datatable-karyawan tbody').on('click', 'td', function() {
    var data = $datatable.row($(this).parents('tr')).data()
    generateCVPegawai(data.nik)
    $('#detail-pegawai').hide();    
    $('#detail-cv').show();    
})
// END EVENT CLICK ROW TABLE
// LOAD DATA
function generateDataPegawai(filter = null) {
    $datatable = $('#datatable-karyawan').DataTable({
        destroy: true,
        bLengthChange: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        'ajax': {
            'url': "{{ url('esaku-dash/sdm-detail-pegawai') }}",
            'cache': false,
            'async':false,
            'type': 'GET',
            'data': filter,
            'dataSrc' : function(result) {
                return result.data.data
            }
        },
        'columns': [
            { data: 'nik' },
            { data: 'nama_pegawai' },
            { data: 'no_bpjs_kerja' },
            { data: 'nama_jabatan' },
            { data: 'nama_loker' },
            { data: 'client' }
        ],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
}
// END LOAD DATA
</script>