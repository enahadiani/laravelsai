
    <div class="row dash-box pb-3" >
        <div class="col-md-8 col-sm-12 col-grid">
            <div class="row">
                <div class="col-12 col-grid">
                    <div class="card">
                        <h5>Posisi Justifikasi Pengajuan</h5>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 effect-hover" data-key="SP">
                                <h6 class="sub-card-title">Sedang Proses</h6>
                                <p class="sub-card-value" id="jum-sedang">0</p>
                            </div>
                            <div class="col-md-4 col-sm-12 effect-hover" data-key="PP">
                                <h6 class="sub-card-title">Perlu Proses</h6>
                                <p class="sub-card-value" id="jum-perlu">0</p>
                            </div>
                            <div class="col-md-4 col-sm-12 effect-hover" data-key="SS">
                                <h6 class="sub-card-title">Selesai</h6>
                                <p class="sub-card-value" id="jum-selesai">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-grid">
            <div class="card h-full p-0">
                <h5 class="with-padding">Daftar Perbaikan</h5>
                <div class="body-card pr-3" id="monitoring">

                </div>
                <div class="footer-card">
                    <a href="" class="load-all">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row dash-datatable">
        <div class="col-12">
            <x-list-data judul="Data Justifikasi Pengajuan" tambah=""
            :thead="array('No Bukti', 'No Dokumen', 'Regional', 'Nilai Pengadaan', 'Nilai Finish', 'Aksi', 'Waktu', 'Kegiatan', 'Posisi')"
            :thwidth="array(15,25,20,10,10,25,5,5,5)" :thclass="array('','','','','','text-center','','','')" />
        </div>
    </div>

    {{-- PRINT PREVIEW --}}
    <div id="saku-print" class="row" style="display: none;">
        <div class="col-12">
            <div class="card" style="height: 100%;">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <button type="button" class="btn btn-light ml-2" id="btn-back" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                    <button type="button" class="btn btn-primary ml-2" id="btn-cetak" style="float:right;"><i class="fa fa-print"></i> Print</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body" id="print-content">

                </div>
            </div>
        </div>
    </div>
    {{-- END PRINT PREVIEW --}}

    {{-- HISTORY PREVIEW --}}
    <div class="row" id="saku-history" style="display: none;">
        <div class="col-12">
            <div class="card" style="height: 100%;">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <button type="button" class="btn btn-light ml-2" id="btn-aback" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body profiletimeline" id="history-content">

                </div>
            </div>
        </div>
    </div>
    {{-- END HISTORY PREVIEW --}}


    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    <script src="{{ asset('helper.js') }}"></script>
    <script>

    setHeightForm();
    var scrollCard = document.querySelector('#monitoring');
    new PerfectScrollbar(scrollCard, {
        suppressScrollX: true
    });

    (function() {
        $.ajax({
            type: "GET",
            url: "{{ url('rkap-trans/aju-box') }}",
            dataType: 'json',
            async:false,
            success: function(result) {
                if(result.status) {
                    $('#jum-sedang').text(sepNum(result.sedang))
                    $('#jum-selesai').text(sepNum(result.selesai))
                    $('#jum-perlu').text(sepNum(result.perlu))
                }
            }
        });
    })();

    (function() {
        $.ajax({
            type: "GET",
            url: "{{ url('rkap-trans/aju-perbaikan') }}",
            dataType: 'json',
            async:false,
            success: function(result) {
                $('#monitoring').html('');
                if(result.status) {
                    if(result.data.length > 0){
                        var html = "";
                        for(var i=0;i < result.data.length;i++){
                            var line = result.data[i];
                            html +=`<div class="row with-padding-no-top with-h">
                                <div class="col-2">
                                    <div class="avatar">
                                        <img alt="avatar" src="{{ asset('img/avatar5.png') }}">
                                    </div>
                                </div>
                                <div class="col-10">
                                    <p class="key-card">`+line.no_bukti+`</p>
                                    <p class="value-card">Return Approval</p>
                                    <div class="content-card">
                                        Catatan: `+line.keterangan+`
                                    </div>
                                </div>
                                <hr class="line-v" />
                            </div>`;
                        }

                        $('#monitoring').html(html);
                    }
                }
            }
        });
    })();

    $('#table-data tbody').on('click', 'td', function() {
        if($(this).index() != 5){
            var html = ""
            var bottomSheet = new BottomSheet("bottomsheet-container");
            event.preventDefault()
            bottomSheet.activate()
            html += `<div class='header-bottomsheet'>
                <p>No Bukti</p>
                <h6>2351-9892-9182</h6>
            </div>
            <div class='row mt-4'>
                <div class='col-12'>
                    <ul class='nav nav-tabs separator-tabs nav-custom' role='tablist'>
                        <li class='nav-item with-padding-pl'>
                            <a class='nav-link active' id='detail' href='#detail-tab' data-toggle='tab' role='tab' aria-controls='detail-tab' aria-selected='true'>Detail</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' id='riwayat' href='#riwayat-tab' data-toggle='tab' role='tab' aria-controls='vr-tab' aria-selected='false'>Riwayat Posisi</a>
                        </li>
                    </ul>
                    <div class='tab-content mt-4 content-height' id='tab-content'>
                        <div class='tab-pane show active with-padding-px' id='detail-tab' role='tabpanel' aria-labelledby='detail-tab'>
                            <table class='table table-bordered' id='table-detail'>
                                <tbody>
                                    <tr>
                                        <td style='width: 50%;'>
                                            <p>Tanggal Transaksi</p>
                                            <p class='label-table'>23 Juni 2021</p>
                                        </td>
                                        <td style='width: 50%;'>
                                            <p>PP</p>
                                            <p class='label-table'>Keuangan</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='width: 50%;'>
                                            <p>Nilai</p>
                                            <p class='label-table'>Rp. 1.000.000.000</p>
                                        </td>
                                        <td style='width: 50%;'>
                                            <p>Kota</p>
                                            <p class='label-table'>Bandung</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class='row mt-5'>
                                <div class='col-12'>
                                    <h5>Justifikasi Kebutuhan</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                            <div class='row mt-5 mb-1'>
                                <div class='col-12'>
                                    <h5>Dasar</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <div class='tab-pane with-padding-px' id='riwayat-tab' role='tabpanel' aria-labelledby='riwayat-tab'>
                            <ul class='timeline'>
                                <li>
                                    <p class='date-timeline'>23 Juni 2021</p>
                                    <div class='information-timeline'>
                                        <div class='apv-timeline'>
                                            <span>Approval 1</span>
                                        </div>
                                        <div class='invoice-timeline'>
                                            <span>No Bukti : </span> <span>APV-202106-0001</span>
                                        </div>
                                    </div>
                                    <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                </li>
                                <li>
                                    <p class='date-timeline'>23 Juni 2021</p>
                                    <div class='information-timeline'>
                                        <div class='apv-timeline'>
                                            <span>Approval 1</span>
                                        </div>
                                        <div class='invoice-timeline'>
                                            <span>No Bukti : </span> <span>APV-202106-0001</span>
                                        </div>
                                    </div>
                                    <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                </li>
                                <li>
                                    <p class='date-timeline'>23 Juni 2021</p>
                                    <div class='information-timeline'>
                                        <div class='apv-timeline'>
                                            <span>Approval 1</span>
                                        </div>
                                        <div class='invoice-timeline'>
                                            <span>No Bukti : </span> <span>APV-202106-0001</span>
                                        </div>
                                    </div>
                                    <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                </li>
                                <li>
                                    <p class='date-timeline'>23 Juni 2021</p>
                                    <div class='information-timeline'>
                                        <div class='apv-timeline'>
                                            <span>Approval 1</span>
                                        </div>
                                        <div class='invoice-timeline'>
                                            <span>No Bukti : </span> <span>APV-202106-0001</span>
                                        </div>
                                    </div>
                                    <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                </li>
                                <li>
                                    <p class='date-timeline'>23 Juni 2021</p>
                                    <div class='information-timeline'>
                                        <div class='apv-timeline'>
                                            <span>Approval 1</span>
                                        </div>
                                        <div class='invoice-timeline'>
                                            <span>No Bukti : </span> <span>APV-202106-0001</span>
                                        </div>
                                    </div>
                                    <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                </li>
                                <li>
                                    <p class='date-timeline'>23 Juni 2021</p>
                                    <div class='information-timeline'>
                                        <div class='apv-timeline'>
                                            <span>Approval 1</span>
                                        </div>
                                        <div class='invoice-timeline'>
                                            <span>No Bukti : </span> <span>APV-202106-0001</span>
                                        </div>
                                    </div>
                                    <div class='note-timeline'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>`
            addContentBottomSheet(html)
        }
    });

    function addContentBottomSheet(html) {
        $('.c-bottom-sheet__sheet').css({ 'min-height': '650px' })
        $('#content-bottom-sheet').empty()
        $('#content-bottom-sheet').append(html)

        var scrollTabContent = document.querySelector('#tab-content');
        new PerfectScrollbar(scrollTabContent, {
            suppressScrollX: true
        });
    }

 // LIST DATA
 var actionHtmlWithED =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='simple-icon-reload' style='font-size:18px'></i></a>";
    var actionHtmlNoED =
        "<a href='#' title='Print'  id='btn-print'><i class='simple-icon-printer' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='History'  id='btn-history'><i class='simple-icon-reload' style='font-size:18px'></i></a>";
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
            {
                "targets": [6, 7, 8],
                "visible": false
            },
            {
                'targets': 5,
                'className': 'text-center'
            }
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
                data: 'progress',
                render: function (data) {
                    if (data == 'A') {
                        return actionHtmlWithED
                    } else if (data == 'F') {
                        return actionHtmlWithED
                    }
                    return actionHtmlNoED
                }
            },
            {
                data: 'waktu'
            },
            {
                data: 'kegiatan'
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

     // HAPUS DATA
     function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('apv/juskeb') }}/" + id,
            dataType: 'json',
            async: false,
            success: function (result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data',
                        'Data Justifikasi Pengajuan (' + id + ') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                } else if (!result.data.status && result.data.message == "Unauthorized") {
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>' + result.data.message + '</a>'
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-delete', function (e) {
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type: 'hapus'
        });
    });
    // END HAPUS

    $('#saku-datatable').on('click', '#btn-edit', function(){
        $id_edit= $(this).closest('tr').find('td').eq(0).html();
        $edit = 1;
        $('.navbar-top a').removeClass('active');
        $('a[data-href="fRkmAju"]').addClass('active');
        var url = "{{ url('silo-auth/form')}}/fPengajuan";
        $('#trans-body').load(url);
    });



    // PRINT
    function printPreview(id, from) {
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/aju-preview') }}",
            data:{no_bukti: id},
            dataType: 'json',
            async:false,
            success:function(result){
                backTo = from
                if(typeof result.data !== 'undefined' && result.data.length > 0) {
                    var html = "";
                    var no = 1;
                    var total = 0
                    var data = result.data[0]
                    html += `
                    <div class='row'>
                    <div class='col-12 text-center' style='border-bottom:3px solid black;'>
                    <h3>PENGAJUAN</h3>
                    <h6 id='kegiatan'>${data.no_bukti}</h6>
                    </div>
                    <div class='col-12 my-3 text-center'>
                    <h6 id='tanggal-print'>Tanggal : ${data.tanggal.substr(0, 2)} ${getNamaBulan(data.tanggal.substr(3, 2))} ${data.tanggal.substr(6, 4)}</h6>
                    </div>
                    <div class='col-12'>
                    <table class='table table-condensed table-bordered'>
                    <tbody>
                    <tr>
                    <td style='width: 5%;'>1</td>
                    <td style='width: 25%;'>UNIT KERJA</td>
                    <td>${data.nama_pp}</td>
                    </tr>
                    <tr>
                    <td style='width: 5%;'>3</td>
                    <td style='width: 25%;'>DESKRIPSI</td>
                    <td>${data.keterangan}</td>
                    </tr>
                    <tr>
                    <td style='width: 5%;'>2</td>
                    <td style='width: 25%;'>KOMENTAR</td>
                    <td>${data.komentar}</td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    <div class='col-12'>
                    <h6 style='font-weight: bold; font-size: 13px;'># <u>DETAIL RKM</u></h6>
                    <table class='table table-bordered table-condensed'>
                    <thead>
                    <tr>
                    <th class='text-center' style='width: 5%;'>No</th>
                    <th class='text-center' style='width: 45%;'>Nama RKM</th>
                    <th class='text-center' style='width: 50%;'>DAM</th>
                    </tr>
                    </thead>
                    <tbody>`
                    for(var i =0;i<result.data_detail.length;i++) {
                        var detail = result.data_detail[i]
                        html += `
                        <tr>
                        <td>${no}</td>
                        <td>${detail.nama}</td>
                        <td>${detail.dam}</td>
                        </tr>
                        `;
                        no++;
                    }
                    html += `
                    </tbody>
                    </table>
                    </div>
                    <div class='col-12'>
                    <h6 style='font-weight: bold; font-size: 13px;'># <u>PENUTUP</u></h6>
                    <table class='table table-condensed table-bordered'>
                    <thead>
                    <th class='text-center' style='width: 10%;'></th>
                    <th class='text-center' style='width: 25%;'>NAMA/NIK</th>
                    <th class='text-center' style='width: 15%;'>JABATAN</th>
                    <th class='text-center' style='width: 10%;'>TANGGAL</th>
                    <th class='text-center' style='width: 15%;'>NO. APPROVAL</th>
                    <th class='text-center' style='width: 10%;'>STATUS</th>
                    <th class='text-center' style='width: 15%;'>TTD</th>
                    </thead>
                    <tbody>`
                    for(var i=0;i<result.data_dokumen.length;i++) {
                        var dokumen = result.data_dokumen[i]
                        html += `
                        <tr>
                        <td>${dokumen.ket}</td>
                        <td>${dokumen.nama_kar}</td>
                        <td>${dokumen.nama_jab}</td>
                        <td>${dokumen.tanggal}</td>
                        <td>${dokumen.no_app}</td>
                        <td>${dokumen.status}</td>
                        <td>&nbsp;</td>
                        </tr>`
                    }
                    html += `</tbody>
                    </table>
                    </div>
                    </div>
                    `;

                    $('#print-content').html(html)
                    $('.dash-box').hide()
                    $('.dash-datatable').hide()
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-print',function(e) {
        var id = $(this).closest('tr').find('td').eq(0).html();
        printPreview(id, 'table');
    });

    $('#saku-print #btn-back').click(function() {
        $('#saku-print').hide()
        $('.dash-box').show()
        $('.dash-datatable').show()
    });

    $('#saku-print #btn-cetak').click(function() {
        $('#print-content').printThis({
            importCSS: true,            // import parent page css
            importStyle: true,         // import style tags
            printContainer: true,       // print outer container/$.selector
        });
    });
    // END PRINT PREVIEW

    // HISTORY
    function historyPreview(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('rkap-trans/aju-history') }}",
            dataType: 'json',
            data:{no_bukti: id},
            async:false,
            success:function(result) {
                var html = "";
                if(typeof result.data !== 'undefined' && result.data.length > 0) {
                    var color = "";
                    for(var i=0;i<result.data.length;i++) {
                        var data = result.data[i]
                        if(data.color === 'green') {
                            color = '#00c292'
                        } else {
                            color = '#03a9f3'
                        }

                        html += `
                        <div class="d-flex flex-row mb-3">
                            <a class="d-block position-relative" href="#">
                                <div style='padding-top: 2px; border: 1px solid ${color}; border-radius: 50%; background: ${color}; color: #ffffff; width: 50px; height:50px;text-align: center;'>
                                <i style='font-size: 25px;' class='iconsminds-file-clipboard-file---text'></i>
                                </div>
                            </a>
                            <div class="col-12 pl-3 pt-2 pr-2 pb-2">
                                <a href="#">
                                    <p class="list-item-heading"><a href='javascript:void(0)' class='link'>
                                    ${data.nama} <span class='sl-date'>${data.tanggal} (${data.status})</span>
                                    </a></p>
                                    <div class="pr-2 row">
                                        <div class='col-6'>No Bukti :</div>
                                        <div class='col-6'>${data.no_bukti}</div>
                                        <div class='col-6'>Catatan :</div>
                                        <div class='col-6'>${data.keterangan}</div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <hr />
                        `;
                    }
                } else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('rkap-auth/logout') }}";
                    })
                } else {
                    html += `
                    <div class='sl-item'>
                        <div class='sl-left'>
                            <div style='padding: 10px;border: 1px solid #959595;border-radius: 50%;background: #959595;color: #ffffff;width: 50px;text-align: center;'>
                                <i style='font-size: 25px;' class='simple-icon-envelope'></i>
                            </div>
                        </div>
                        <div class="sl-right">
                            Belum ada proses approval.
                            <br>
                            <br>
                        <div>
                    </div>
                    `
                }

                $('#history-content').html(html)
                $('.dash-box').hide()
                $('.dash-datatable').hide()
                $('#saku-history').show()

            }
        });
    }

    $('#saku-datatable').on('click','#btn-history',function(e) {
        var id = $(this).closest('tr').find('td').eq(0).html();
        historyPreview(id);
    });

    $('#saku-history #btn-aback').click(function() {
        $('#saku-history').hide()
        $('.dash-box').show()
        $('.dash-datatable').show()
    });

    $('#saku-datatable').on('click', '#btn-kembali', function(){
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
                    $('a[data-href="fRkmDash"]').addClass('active');
                    var url = "{{ url('rkap-auth/form')}}/fRkmMenu";
                    $('#trans-body').load(url);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // console.log('cancel');
                }
            }
        });
    });

</script>
