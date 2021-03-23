<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<!-- FORM INPUT -->
<style>
    .selected {
        color: var(--theme-color-1);
    }

    .card-body-footer {
        background: white;
        position: fixed;
        bottom: 15px;
        right: 0;
        margin-right: 30px;
        z-index: 3;
        height: 60px;
        border-top: ;
        border-bottom-right-radius: 1rem;
        border-bottom-left-radius: 1rem;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, .04), 0 1px 6px rgba(0, 0, 0, .04);
    }

    .card-body-footer>button {
        float: right;
        margin-top: 10px;
        margin-right: 25px;
    }

    div.inp-div-jenis>input {
        border-radius: 0 !important;
        z-index: 1;
        position: relative;
    }

    div.inp-div-jenis>.search-item {
        position: absolute;
        font-size: 18px;
        margin-top: -27px;
        z-index: 2;
        margin-left: 99px;
    }

    .btn-full-round {
        border-radius: 20px !important;
    }

    .btn-light3 {
        background: #b3b3b3;
        color: white;
    }

    .icon-tambah {
        background: #505050;
        /* mask: url("{{ url('img/add.svg') }}"); */
        -webkit-mask-image: url("{{ url('img/add.svg') }}");
        mask-image: url("{{ url('img/add.svg') }}");
        width: 12px;
        height: 12px;
    }

    .icon-close {
        background: #D4D4D4;
        /* mask: url("{{ url('img/lock.svg') }}");
             */
        -webkit-mask-image: url("{{ url('img/lock.svg') }}");
        mask-image: url("{{ url('img/lock.svg') }}");
        width: 18px;
        height: 18px;
    }

    .icon-open {
        background: #D4D4D4;
        /* mask: url("{{ url('img/lock.svg') }}");
             */
        -webkit-mask-image: url("{{ url('img/lock.svg') }}");
        mask-image: url("{{ url('img/lock.svg') }}");
        width: 18px;
        height: 18px;
    }

    .popover {
        top: -80px !important;
    }



    .btn-back {
        line-height: 1.5;
        padding: 0;
        background: none;
        appearance: unset;
        opacity: unset;
        right: -40px;
        position: relative;
        top: 5px;
        z-index: 10;
        float: right;
        margin-top: -30px;
    }

    .btn-back>span {
        border-radius: 50%;
        padding: 0 0.45rem 0.1rem 0.45rem;
        font-size: 1.2rem !important;
        font-weight: lighter;
        box-shadow: 0px 1px 5px 1px #80808054;
        color: white;
        background: red;
    }

    .btn-back>span:hover {
        color: white;
        background: red;
    }

    .card-body-footer {
        background: white;
        position: fixed;
        bottom: 15px;
        right: 0;
        margin-right: 30px;
        z-index: 3;
        height: 60px;
        border-top: ;
        border-bottom-right-radius: 1rem;
        border-bottom-left-radius: 1rem;
        box-shadow: 0 -5px 20px rgba(0, 0, 0, .04), 0 1px 6px rgba(0, 0, 0, .04);
    }

    .card-body-footer>button {
        float: right;
        margin-top: 10px;
        margin-right: 25px;
    }

    .bold {
        font-weight: bold;
    }

    .modal p {
        color: #505050 !important;
    }

    .table-header-prev td,
    th {
        padding: 2px 8px !important;
    }

    #modal-preview .modal-content {
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }

    #modal-preview {
        top: calc(100vh - calc(100vh - 30px)) !important;
        overflow: hidden;
    }

    #modal-preview #content-preview {
        height: calc(100vh - 105px) !important;
    }

    .animate-bottom {
        /* position: relative; */
        animation: animatebottom 0.7s;
    }

    @keyframes animatebottom {
        from {
            bottom: -300px;
            opacity: 0;
        }

        to {
            bottom: 0;
            opacity: 1;
        }
    }

</style>

<!-- LIST DATA -->
<x-list-data judul="Rerverse Akru Billing" tambah="true"
    :thead="array('No','No Bukti','Tanggal','Keterangan','Status','Total','Aksi')" :thwidth="array(5,10,10,20,10,10,10)"
    :thclass="array('','','','','','','text-center')" />
<!-- END LIST DATA -->

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display: none">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group row" id="row-id" hidden>
                        <div class="col-9">
                            <input class="form-control" type="text" id="id" name="id" readonly hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-3 col-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal"
                                        value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                        class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-3 col-12">
                                    <label for="anggota">Anggota</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_anggota" readonly="readonly"
                                                title="" data-toggle="tooltip" data-placement="top"></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-anggota" id="anggota"
                                            name="anggota" value="" title="" readonly required>
                                        <span class="info-name_anggota hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"
                                            style="background: none;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_modul"
                                            style="background: none;"></i>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <label for="no_kartu">Nomor Kartu</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_kartu" readonly="readonly"
                                                title="" data-toggle="tooltip" data-placement="top"></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-no_kartu no-kartu"
                                            id="no_kartu" name="no_kartu" value="" title="" readonly required>
                                        <span class="info-name_no_kartu hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"
                                            style="background: none;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_modul"
                                            style="background: none;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <label for="deskripsi">Keterangan</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"
                                        required></textarea>
                                </div>
                                <div class="col-md-4 col-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                        <button type="button" href="#" id="loadData"
                                            class="btn btn-primary mr-2">Tampil</button>
                                        <!-- <button type="button" href="#" id="postAll" class="btn btn-primary">Posting All</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#trans" role="tab"
                                aria-selected="false"><span class="hidden-xs-down">Daftar Tagihan</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border">
                        <div class="tab-pane active mt-2" id="trans" role="tabpanel">
                            <div class="row">
                                <div class="dataTables_length col-sm-12" id="table-jurnal_length"></div>
                            </div>
                            <div class='col-xs-12 px-0'>
                                <table id="table-jurnal" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="1%">Pembatalan</th>
                                            <th width="10%">Jenis</th>
                                            <th width="20%">No Bukti</th>
                                            <th width="20%">Keterangan</th>
                                            <th width="10%">Periode</th>
                                            <th width="10%">Akun Simpanan</th>
                                            <th width="10%">Akun Pitang</th>
                                            <th width="10%">Nilai</th>
                                            <th width="10%">Angsuran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                        <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                            <p style="margin-top: 20px;" id="total-pembatalan">
                                <b>Total Pembatalan 0</b>
                            </p>
                        </div>
                        <div style="text-align: right;" class="col-md-2 p-0 ">
                            <button type="submit" style="margin-top: 10px; " id="btn-save" class="btn btn-primary"><i
                                    class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- FORM INPUT  -->


<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_upload')
@include('modal_search')


<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    setHeightForm();
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    var $iconLoad = $('.preloader');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $('.info-icon-hapus').click(function() {
        var par = $(this).closest('div').find('input').attr('name');
        $('#' + par).val('');
        $('#' + par).attr('readonly', true);
        $('#' + par).attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_' + par).parent('div').addClass('hidden');
        $('.info-name_' + par).addClass('hidden');
        $(this).addClass('hidden');
    });

    function showInfoField(kode, isi_kode, isi_nama) {
        $('#' + kode).val(isi_kode);
        $('#' + kode).attr('style',
            'border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_' + kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_' + kode).attr('title', isi_nama);
        $('.info-name_' + kode).removeClass('hidden');
        $('.info-name_' + kode).attr('title', isi_nama);
        $('.info-name_' + kode + ' span').text(isi_nama);
        var width = $('#' + kode).width() - $('#search_' + kode).width() - 10;
        var height = $('#' + kode).height();
        var pos = $('#' + kode).position();
        $('.info-name_' + kode).width(width).css({
            'left': pos.left,
            'height': height
        });
        $('.info-name_' + kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    var $modul = [];
    var $per1 = [];
    var $per2 = [];

    // CBBL
    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'anggota':
                var settings = {
                    id: id,
                    header: ['No Anggota', 'Nama'],
                    url: "{{ url('esaku-trans/reverse-get-anggota') }}",
                    columns: [{
                            data: 'no_agg'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar Anggota",
                    pilih: "akun",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                }
                break;
            case 'no_kartu':
                var no_agg = $('#anggota').val();
                if (no_agg == '' || no_agg == undefined) {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Warning',
                        text: 'Harap Pilih Anggota Terlebih Dahulu!'
                    });
                    return false;
                } else {
                    var settings = {
                        id: id,
                        header: ['Kode', 'Nama'],
                        url: "{{ url('esaku-trans/reverse-akru-simp-nokartu') }}/" + no_agg,
                        columns: [{
                                data: 'no_simp'
                            },
                            {
                                data: 'nama'
                            }
                        ],
                        judul: "Daftar Kartu Anggota",
                        pilih: "akun",
                        jTarget1: "text",
                        jTarget2: "text",
                        target1: ".info-code_" + id,
                        target2: ".info-name_" + id,
                        target3: "",
                        target4: "",
                        width: ["30%", "70%"],
                    }
                }

                break;
        }
        showInpFilter(settings);
    });

    $('#form-tambah').on('change', '.no-kartu', function() {
        console.log('Hello Load Dasta')
    })



    // datatables initialize
    var action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/reverse-akru-simp') }}",
        [{
                'targets': 6,
                data: null,
                'defaultContent': action_html,
                'className': 'text-center'
            },
            {
                "targets": 0,
                "createdCell": function(td, cellData, rowData, row, col) {
                    if (rowData.status == "baru") {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                'targets': 5,
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                "targets": [],
                "visible": false,
                "searchable": false
            }
        ],
        [{
                data: null
            },
            {
                data: 'no_bukti'
            },
            {
                data: 'tgl'
            },
            {
                data: 'keterangan'
            },
            {
                data: 'status'
            },
            {
                data: 'nilai1'
            }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [
            [6, "desc"]
        ]
    );

    dataTable.on('order.dt search.dt', function() {
        dataTable.column(0, {
            search: 'applied',
            order: 'applied'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();



    var tablejur = $("#table-jurnal").DataTable({
        destroy: true,
        bLengthChange: false,
        order: false,
        paginate: false,
        info: false,
        ordering: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columnDefs: [{
                "targets": 0,
                "searchable": false,
                "orderable": false,
                "className": 'selectall-checkbox',
                'render': function(data, type, full, meta) {
                    return '<input type="checkbox" name="checked[]">';
                }
            },
            {
                'targets': [7, 8],
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        columns: [{
                data: 'checkbox'
            },
            // { data: 'status' },
            {
                data: 'jenis'
            },
            {
                data: 'no_bill'
            },
            {
                data: 'ket'
            },
            {
                data: 'periode'
            },
            {
                data: 'akun_titip'
            },
            {
                data: 'akun_piutang'
            },
            {
                data: 'nilai'
            },
            {
                data: 'bayar'
            }
        ],
        order: [],
        drawCallback: function() {
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

    tablejur.on('select.dt deselect.dt', function(e, dt, type, indexes) {

        var countSelectedRows = tablejur.rows({
            selected: true
        }).count();
        var countItems = tablejur.rows().count();

        if (countItems > 0) {
            if (countSelectedRows == countItems) {
                $('thead .selectall-checkbox input[type="checkbox"]', this).prop('checked', true);
            } else {
                $('thead .selectall-checkbox input[type="checkbox"]', this).prop('checked', false);
            }
        }

        if (e.type === 'select') {
            $('.selectall-checkbox input[type="checkbox"]', tablejur.rows({
                selected: true
            }).nodes()).prop('checked', true);
        } else {
            $('.selectall-checkbox input[type="checkbox"]', tablejur.rows({
                selected: false
            }).nodes()).prop('checked', false);
        }
    });

    tablejur.on('click', 'thead .selectall-checkbox', function() {
        $('input[type="checkbox"]', this).trigger('click');
    });

    tablejur.on('click', 'thead .selectall-checkbox input[type="checkbox"]', function(e) {
        if (this.checked) {
            tablejur.rows().select();
        } else {
            tablejur.rows().deselect();
        }
        e.stopPropagation();
    });

    $("#searchData_table-jurnal").on("keyup", function(event) {
        tablejur.search($(this).val()).draw();
    });

    $("#page-count_table-jurnal").on("change", function(event) {
        var selText = $(this).val();
        tablejur.page.len(parseInt(selText)).draw();
    });

    function activaTab(tab) {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    }

    $('#form-tambah').on('click', '#loadData', function() {
        var no_kartu = $('#no_kartu').val();
        var formData = new FormData();
        if (no_kartu == '' || no_kartu == undefined) {
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Nomor Kartu Wajib di Isi'
            });
            tablejur.clear().draw();
            return false;
        }
        formData.append('no_kartu', no_kartu);

        // for(var pair of formData.entries()) {
        //     console.log(pair[0]+ ', '+ pair[1]);
        // }

        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-trans/load-reverse-akru') }}",
            dataType: 'json',
            data: formData,
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                console.log(result.daftar)
                tablejur.clear().draw();
                var res = result.daftar
                if (result.status) {
                    if (typeof res !== 'undefined' && res.length > 0) {
                        tablejur.rows.add(res).draw(false);
                        activaTab("trans");
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown) {
                alert('request failed:' + textStatus);
            }
        });
    });

    // $('#form-tambah').on('click', '#postAll', function(){
    //     tablejur.rows().every(function (index, element) {
    //         var row = tablejur.cell(index,1);
    //         row.data('POSTING').draw().select();
    //     });
    // });


    // HAPUS DATA
    function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/reverse-akru-simp') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data',
                        'Data Reverse Akru Simpanan (' + id +
                        ') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if (typeof M == 'undefined') {
                        $('#modal-delete').modal('hide');
                    } else {
                        $('#modal-delete').bootstrapMD('hide');
                    }
                } else if (!result.data.status && result.data.message == "Unauthorized") {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: result.data.message
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-delete', function(e) {
        var id = $(this).closest('tr').find('td').eq(1).html();
        msgDialog({
            id: id,
            type: 'hapus'
        });
    });
    // END HAPUS DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Kartu Simpanan');
        $('#btn-update').attr('id', 'btn-save');
        $('#btn-save').attr('type', 'submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_gudang').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important'
        );
    });
    // END BUTTON TAMBAH

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function() {
        var kode = null;
        msgDialog({
            id: kode,
            type: 'keluar'
        });
        var table = $('#example').DataTable();
        $('#form-tambah')[0].reset();
        $data = []
        $('#total').html('0')
        tablejur.clear().draw();
    });

    // BUTTON EDIT
    function editData(id) {

        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/show-akru') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {

                var result = res.daftar;

                if (result.status) {
                    console.log(result.detail)
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#tanggal').val(result.data[0].tanggal, '-', '/');
                    $('#deskripsi').val(result.data[0].keterangan);
                    // $('#jenis').val(result.jurnal[0].jenis);
                    var detail = result.detail;
                    if (detail.length > 0) {
                        var input = '';
                        $('#total').html(format_number(result.data[0].nilai1))
                        tablejur.rows.add(detail).draw(false);
                        activaTab("trans");
                        var data = detail;
                        $data = data;
                        $('#saku-datatable').hide();
                        $('#saku-form').show();
                        $('#kode_form').val($form_aktif);
                    } else if (!result.status && result.message == 'Unauthorized') {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function() {
        var id = $(this).closest('tr').find('td').eq(1).html();
        $('#btn-save').attr('type', 'button');
        $('#btn-save').attr('id', 'btn-update');
        $('#judul-form').html('Edit Data Jurnal');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id)
    });

    // BUTTON UPDATE DATA
    $('#saku-form').on('click', '#btn-update', function() {
        var kode = $('#no_bukti').val();
        msgDialog({
            id: kode,
            type: 'edit'
        });
    });
    // END BUTTON UPDATE

    //validate form tambah

    $('#form-tambah').validate({
        ignore: [],
        rules: {
            tanggal: {
                required: true
            },
            deskripsi: {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function(form) {
            var parameter = $('#id_edit').val();
            var url = "{{ url('esaku-trans/unposting') }}";

            var formData = new FormData(form);
            var data = [];
            var selected = tablejur.rows('.selected').data();
            if (selected.length === 0) {
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Gagal',
                    text: 'Tidak ada transaksi jurnal yang dipilih'
                });
                return false;
            }
            $.each(selected, function(i, val) {
                formData.append('no_bukti[]', selected[i].no_bukti)
                formData.append('form[]', selected[i].form)
            });

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: formData,
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    if (result.data.status) {
                        msgDialog({
                            id: result.data.no_bukti,
                            type: 'sukses',
                            text: result.data.message
                        });
                        activaTab("trans");
                        $('#form-tambah #loadData').click();
                        $('#error_space').text('');
                    } else if (!result.data.status && result.data.message === "Unauthorized") {

                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";

                    } else {
                        msgDialog({
                            id: id,
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });

                        $('#error_space').text(result.data.message);
                        activaTab("error");
                    }
                },
                fail: function(xhr, textStatus, errorThrown) {
                    alert('request failed:' + textStatus);
                }
            });
        },
        errorPlacement: function(error, element) {
            var id = element.attr("id");
            $("label[for=" + id + "]").append("<br/>");
            $("label[for=" + id + "]").append(error);
        }
    });

    // HANDLE ENTER
    $('#tanggal,#deskripsi').keydown(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal', 'deskripsi'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#' + nxt[idx]).focus();
        } else if (code == 38) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if (idx != -1) {
                $('#' + nxt[idx]).focus();
            }
        }
    });



    // PREVIEW DATA
    $('#table-data tbody').on('click', 'td', function(e) {
        if ($(this).index() != 6) {

            var id = $(this).closest('tr').find('td').eq(1).html();
            console.log(id)
            var data = dataTable.row(this).data();
            var posted = data.posted;
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-trans/show-akru') }}/" + id,
                dataType: 'json',
                async: false,
                success: function(res) {
                    // console.log(res.daftar.detail)
                    var result = res.daftar;
                    var detail = res.daftar.detail;
                    if (result.status) {

                        var html =
                            `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
                            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
                            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">` +
                            id +
                            `</span>
                            <div class="dropdown d-inline-block float-right">
                                <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
                                <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
                                </button>
                                <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                                </div>
                            </div>
                        </div>
                        <div class='separator'></div>
                        <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) ;position:sticky'>
                            <div class="mt-3" style='border-bottom: double #d7d7d7;padding:0 1.5rem'>
                                <table class="borderless mb-2" width="100%" >
                                    <tr>
                                        <td width="50%" style="vertical-align:top !important"><h6 class="text-primary bold">REVERSE AKRU BILLING</h6></td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.5rem">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">No Bukti</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].no_bukti + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Periode</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].periode + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Keterangan</td>
                                        <td width="1%">:</td>
                                        <td width="70%">` + result.data[0].keterangan + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Mata Uang</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].kode_curr + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Total</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + format_number(result.data[0].nilai1) + `</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.9rem">
                                <table class="table table-striped table-body-prev mt-2" width="100%">
                                <tr style="background: var(--theme-color-1) !important;color:white !important">
                                        <th style="width:5%">No</th>
                                        <th style="width:20%">Simpanan</th>
                                        <th style="width:20%">Akun Piutang</th>
                                        <th style="width:20%">Akun Simpanan</th>
                                        <th style="width:15">Total</th>
                                </tr>`;
                        var det = '';
                        if (detail.length > 0) {
                            var no = 1;
                            for (var i = 0; i < result.detail.length; i++) {
                                var line = result.detail[i];
                                det += "<tr>";
                                det += "<td>" + no + "</td>"
                                det += "<td >" + line.nama_simp + "</td>";
                                det += "<td >" + line.akun_piutang + '-' + line.nama_simp +
                                    "</td>";
                                det += "<td >" + line.akun_titip + '-' + line.nama_asimp +
                                    "</td>";
                                det += "<td >" + format_number(line.total) + "</td>";
                                no++;
                            }
                        } else {
                            det +=
                                "<tr><td colspan='5' class='text-center'>Data Detail Kosong!</td></tr>"
                        }
                        html += det
                        html += ` </table>
                                <table class="table-borderless mt-4" width="100%">
                                    <tr>
                                        <td width="25%">&nbsp;</td>
                                        <td width="25%">&nbsp;</td>
                                        <td width="10%">&nbsp;</td>
                                        <td width="20%" class="text-center">Dibuat Oleh</td>
                                        <td width="20%" class="text-center">Diperiksa Oleh</td>
                                    </tr>
                                    <tr>
                                        <td width="25%">&nbsp;</td>
                                        <td width="25%">&nbsp;</td>
                                        <td width="10%">&nbsp;</td>
                                        <td width="20%" class="text-center" style="height:100px">` + result.data[0]
                            .nik_user + `</td>
                                        <td width="20%" style="height:100px"></td>
                                    </tr>
                                </table>`
                        $('#content-bottom-sheet').html(html);

                        var scroll = document.querySelector('.preview-body');
                        var psscroll = new PerfectScrollbar(scroll);


                        $('.c-bottom-sheet__sheet').css({
                            "width": "70%",
                            "margin-left": "15%",
                            "margin-right": "15%"
                        });

                        $('.preview-header').on('click', '#btn-delete2', function(e) {
                            var id = $('#preview-id').text();
                            $('.c-bottom-sheet').removeClass('active');
                            msgDialog({
                                id: id,
                                type: 'hapus'
                            });
                        });

                        $('.preview-header').on('click', '#btn-edit2', function() {
                            var id = $('#preview-id').text();
                            $('#judul-form').html('Edit Data Jenis Simpanan');
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();

                            $('#btn-save').attr('type', 'button');
                            $('#btn-save').attr('id', 'btn-update');
                            $('.c-bottom-sheet').removeClass('active');
                            editData(id);
                        });

                        $('.preview-header').on('click', '#btn-cetak', function(e) {
                            e.stopPropagation();
                            $('.dropdown-ke1').addClass('hidden');
                            $('.dropdown-ke2').removeClass('hidden');
                            console.log('ok');
                        });

                        $('.preview-header').on('click', '#btn-cetak2', function(e) {
                            // $('#dropdownAksi').dropdown('toggle');
                            e.stopPropagation();
                            $('.dropdown-ke1').removeClass('hidden');
                            $('.dropdown-ke2').addClass('hidden');
                        });

                        if (posted == "Close") {
                            console.log(posted);
                            $('.preview-header #btn-delete2').css('display', 'none');
                            $('.preview-header #btn-edit2').css('display', 'none');
                        } else {
                            $('.preview-header #btn-delete2').css('display',
                                'inline-block');
                            $('.preview-header #btn-edit2').css('display', 'inline-block');
                        }
                        $('#trigger-bottom-sheet').trigger("click");
                    } else if (!result.status && result.message == 'Unauthorized') {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });

        }
    });

</script>
