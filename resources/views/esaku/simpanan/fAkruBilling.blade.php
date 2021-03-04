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
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px">Pengakuan Tagihan</h6>
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
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal"
                                        value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                        class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-8 col-12">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label for="btn-control">&nbsp;</label>
                                    <div id="btn-control">
                                        <button type="button" href="#" id="loadData"
                                            class="btn btn-primary mr-2">Proses</button>
                                        <!-- <button type="button" href="#" id="postAll" class="btn btn-primary">Posting All</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#trans" role="tab"
                                aria-selected="false"><span class="hidden-xs-down">Daftar Tagihan</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#error" role="tab"
                                aria-selected="false"><span class="hidden-xs-down">Pesan Error</span></a> </li>
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
                                            <th width="20%">Nama Simpanan</th>
                                            <th width="20%">Akun Simpanan</th>
                                            <th width="20%">Akun Piutang</th>
                                            <th width="20%">Total Akru</th>
                                            <th width="20%">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="error" role="tabpanel">
                            <p id='error_space'></p>
                        </div>
                    </div>
                    <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                        <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                            <p class="text-success" style="margin-top: 20px;"></p>
                        </div>
                        <div style="text-align: right;" class="col-md-2 p-0 ">
                            <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i
                                    class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- FORM INPUT  -->
@include('modal_search')
@include('modal_preview')
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    var $iconLoad = $('.preloader');
    $('#modal-preview').addClass('fade animate');
    $('#modal-preview .modal-content').addClass('animate-bottom');
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
        $(this).addClass('hidden');
        $modul = [];
        $per1 = [];
        $per2 = [];
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

    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        var options = {
            id: id,
            header: ['Modul', 'Keterangan', 'Periode Awal', 'Periode Akhir'],
            url: "{{ url('esaku-trans/modultrans') }}",
            columns: [{
                    data: 'checkbox'
                },
                {
                    data: 'modul'
                },
                {
                    data: 'keterangan'
                },
                {
                    data: 'per1'
                },
                {
                    data: 'per2'
                }
            ],
            judul: "Daftar Modul",
            pilih: "modul",
            jTarget1: "text",
            jTarget2: "text",
            target1: ".info-code_" + id,
            target2: ".info-name_" + id,
            target3: "",
            target4: "",
            width: ["10%", "60%", "15%", "15%"],
            multi2: true,
            orderby: [
                [0, "desc"]
            ],
            onItemSelected: function(data) {
                var modul = "";
                $modul = [];
                $per1 = [];
                $per2 = [];
                for (var i = 0; i < data.length; i++) {
                    if (i == 0) {
                        modul += data[i].modul;
                    } else {
                        modul += ',' + data[i].modul;
                    }
                    $modul.push(data[i].modul);
                    $per1.push(data[i].per1);
                    $per2.push(data[i].per2);
                }
                $("#" + id).val(modul);
            }
        };
        showInpFilter(options);
    });

    var tablejur = $("#table-jurnal").DataTable({
        destroy: true,
        bLengthChange: false,
        ordering: false,
        paging: false,
        info: false,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        data: [],
        columnDefs: [{
                "targets": 4,
                "searchable": false,
                "orderable": false,
                "className": 'text-center',
                'render': function(data, type, full, meta) {
                    return '<a href="#" title="Edit" class="text-primary btn-preview">Detail</a>';
                }
            },
            {
                'targets': 3,
                'className': 'text-right',
                'render': $.fn.dataTable.render.number('.', ',', 0, '')
            }
        ],

        columns: [{
                data: 'no_bukti'
            },
            {
                data: 'no_bukti'
            },
            {
                data: 'keterangan'
            },
            {
                data: 'nilai1'
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
        var tanggal = $('#tanggal').val();
        console.log(tanggal)
        if (tanggal == '') {
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Peringatan',
                text: 'Modul wajib diisi'
            });
            tablejur.clear().draw();
            return false;
        }


        $.ajax({
            type: 'GET',
            url: "{{ url('toko-trans/pemasukan') }}",
            dataType: 'json',
            async: false,
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                tablejur.clear().draw();
                // console.log(result.daftar);
                if (result.status) {
                    if (typeof result.daftar !== 'undefined' && result.daftar.length > 0) {
                        tablejur.rows.add(result.daftar).draw(false);
                        activaTab("trans");
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown) {
                alert('request failed:' + textStatus);
            }
        });
    });

    // PLUGIN SCROLL di bagian preview dan form input
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input

    // $('#form-tambah').on('click', '#postAll', function(){
    //     tablejur.rows().every(function (index, element) {
    //         var row = tablejur.cell(index,1);
    //         row.data('POSTING').draw().select();
    //     });
    // });

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
                    } else if (!result.data.status && result.data.message ===
                        "Unauthorized") {

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


    // PREVIEW saat klik di list data
    $('#table-jurnal tbody').on('click', '.btn-preview', function(e) {
        if ($(this).index() != 3) {

            var id = $(this).closest('tr').find('td').eq(0).html();
            var nama = $(this).closest('tr').find('td').eq(1).html();
            var akun_simpanan = $(this).closest('tr').find('td').eq(2).html();
            var akun_piutang = $(this).closest('tr').find('td').eq(3).html();
            // console.log("Klik Detail", nama, akun_simpanan);
            var html = `<tr>
                <td style='border:none'>Kode Vendor</td>
                <td style='border:none'>` + id + `</td>
            </tr>
            <tr>
                <td>Nama Vendor</td>
                <td>` + nama + `</td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>` + akun_simpanan + `</td>
            </tr>
            <tr>
                <td>No Fax</td>
                <td>` + akun_piutang + `</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);

            $('#modal-preview-judul').css({
                'margin-top': '10px',
                'padding': '0px !important'
            }).html('Daftar Rincian Pengakuan Tagihan Simpanan').removeClass('py-2');
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

</script>
