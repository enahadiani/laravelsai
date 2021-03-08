<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />
<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<style>
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
<x-list-data judul="Data Anggota" tambah="true" :thead="array('Kode','Nama','Alamat','Tgl Input','Aksi')"
    :thwidth="array(20,25,35,10,10)" :thclass="array('','','','','text-center')" />
<!-- END LIST DATA -->

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- FORM BODY -->
                <div class="card-body pt-3 form-body">
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#umum" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Umum</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#alamat" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Alamat</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bank" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Bank</span></a> </li>

                    </ul>
                    <div class="tab-content tab-form-content col-12 p-0">
                        <div class="tab-pane active" id="umum" role="tabpanel">
                            <div class="form-row">
                                <div class="col-12">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kode_vendor">Kode</label>
                                    <input class="form-control" type="text" id="kode_vendor" name="kode_vendor"
                                        required>
                                </div>
                                <div class="error-side col-md-6 col-sm-12">
                                    <p class="error-text" id="error-vendor">Kode Vendor sudah ada</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="nama">Nama</label>
                                    <input class="form-control" type="text" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="id_lain">ID Lain</label>
                                    <input class="form-control" type="text" id="id_lain" name="id_lain" required>
                                </div>
                                <div class="form-group col-md-9 col-sm-12">
                                    <label for="id_lain_set">&nbsp;</label>
                                    <input class="form-control" type="text" id="id_lain_set" name="id_lain_set"
                                        required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="no_tel">No Telp</label>
                                    <input class="form-control" type="text" id="no_tel" name="no_tel" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input class='form-control datepicker' type="text" id="tgl_masuk" name="tgl_masuk"
                                        value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                        class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <br>
                                            <div class="switch-toggle">
                                                <label class="switch">
                                                    <input type="checkbox" value="1" id="status-aktif">
                                                    <span class="slider round"></span>
                                                </label>
                                                <div class="label-switch">
                                                    <span id="aktif" style="display: none">AKTIF</span>
                                                    <span id="unaktif">UNAKTIF</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="alamat" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="alamat">Nama Jalan, Gedung, No Rumah/Unit</label>
                                    <textarea class="form-control" rows="4" id="alamat" name="alamat"
                                        style="resize:none" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="negara">Provinsi</label>
                                    <input class="form-control" type="text" id="negara" name="negara" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kota">Kota/Kabupaten</label>
                                    <input class="form-control" type="text" id="kota" name="kota" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input class="form-control" type="text" id="kecamatan" name="kecamatan" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input class="form-control" type="text" id="kode_pos" name="kode_pos" required>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="bank" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="nama_bank">Nama Bank</label>
                                    <input class="form-control" type="text" id="nama_bank" name="nama_bank" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="nama_cabang">Nama Cabang</label>
                                    <input class="form-control" type="text" id="nama_cabang" name="nama_cabang"
                                        required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="no_rek">No Rekening</label>
                                    <input class="form-control" type="text" id="no_rek" name="no_rek" required>
                                </div>
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="nama_rek">Nama Rekening</label>
                                    <input class="form-control" type="text" id="nama_rek" name="nama_rek" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Save Button --}}
                <div class="card-form-footer">
                    <div class="footer-form-container">
                        <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div>
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i
                                    class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END FORM INPUT -->

@include('modal_search')

<!-- JAVASCRIPT  -->
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    // var $iconLoad = $('.preloader');
    // Small Form
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview').addClass('fade animate');
    $('#modal-preview .modal-content').addClass('animate-bottom');
    $('#error-vendor').hide();
    var telp = '';
    var telp_pic = '';
    var status_aktif = false;
    setHeightForm();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });


    var typingTime;
    var doneTyping = 5000; // 5 detik
    var $vendor = $('#kode_vendor');


    function isChecked() {
        if (status_aktif) {
            $('#status-aktif').prop('checked', true)
            $('#aktif').show()
            $('#unaktif').hide()
        } else {
            $('#status-aktif').prop('checked', false)
            $('#aktif').hide()
            $('#unaktif').show()
        }
    }

    $('#status-aktif').click(function() {
        status_aktif = !status_aktif
        isChecked()
    })

    $vendor.on('keyup', function() {
        clearTimeout(typingTime);
        typingTime = setTimeout(cekVendor($(this).val()), doneTyping);
    })

    $vendor.on('keydown', function() {
        clearTimeout(typingTime);
    })

    function cekVendor(value) {
        if (value !== "VS58" && value !== "") {
            $('#error-vendor').show();
        } else {
            $('#error-vendor').hide();
        }
    }


    function last_add(param, isi) {
        var rowIndexes = [];
        dataTable.rows(function(idx, data, node) {
            if (data[param] === isi) {
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

    // BAGIAN CBBL
    var $target = "";
    var $target2 = "";

    $('.info-icon-hapus').click(function() {
        var par = $(this).closest('div').find('input').attr('name');
        $('#' + par).val('');
        $('#' + par).attr('readonly', false);
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

    function getAkun(id = null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/vendor-akun') }}",
            dataType: 'json',
            data: {
                'kode_akun': id
            },
            async: false,
            success: function(result) {
                if (result.status) {
                    if (typeof result.daftar !== 'undefined' && result.daftar.length > 0) {
                        showInfoField('akun_hutang', result.daftar[0].kode_akun, result.daftar[0].nama);
                    } else {
                        $('#akun_hutang').attr('readonly', false);
                        $('#akun_hutang').css('border-left', '1px solid #d7d7d7');
                        $('#akun_hutang').val('');
                        $('#akun_hutang').focus();
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        showInpFilter({
            id: id,
            header: ['Kode', 'Nama'],
            url: "{{ url('esaku-master/vendor-akun') }}",
            columns: [{
                    data: 'kode_akun'
                },
                {
                    data: 'nama'
                }
            ],
            judul: "Daftar Akun",
            pilih: "akun",
            jTarget1: "text",
            jTarget2: "text",
            target1: ".info-code_" + id,
            target2: ".info-name_" + id,
            target3: "",
            target4: "",
            width: ["30%", "70%"],
        });
    });

    $('#form-tambah').on('change', '#akun_hutang', function() {
        var par = $(this).val();
        getAkun(par);
    });

    // END BAGIAN CBBL

    // SUGGESSION DI CBBL
    var $dtVendor = new Array();

    function getVendorAkun() {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/vendor-akun') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.status) {

                    for (i = 0; i < result.daftar.length; i++) {
                        $dtVendor[i] = {
                            kode_akun: result.daftar[i].kode_akun
                        };
                    }

                } else if (!result.status && result.message == "Unauthorized") {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                } else {
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 422) {
                    var msg = jqXHR.responseText;
                } else if (jqXHR.status == 500) {
                    var msg = "Internal server error";
                } else if (jqXHR.status == 401) {
                    var msg = "Unauthorized";
                    window.location = "{{ url('/esaku-auth/sesi-habis') }}";
                } else if (jqXHR.status == 405) {
                    var msg = "Route not valid. Page not found";
                }

            }
        });
    }

    getVendorAkun();

    $('#akun_hutang').typeahead({
        source: function(cari, result) {
            result($.map($dtVendor, function(item) {
                return item.kode_akun;
            }));
        },
        afterSelect: function(item) {
            // console.log('cek');
        }
    });
    // END SUGGESTION

    // PLUGIN SCROLL di bagian preview dan form input
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    //LIST DATA
    var action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/vendor') }}",
        [{
                'targets': 4,
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
                "targets": [3],
                "visible": false,
                "searchable": false
            }
        ],
        [{
                data: 'kode_vendor'
            },
            {
                data: 'nama'
            },
            {
                data: 'alamat'
            },
            {
                data: 'tgl_input'
            },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [
            [3, "desc"]
        ]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function(event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function(event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA


    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Anggota');
        $('#btn-update').attr('id', 'btn-save');
        $('#btn-save').attr('type', 'submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_vendor').attr('readonly', false);
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
    });

    $('#saku-form').on('click', '#btn-update', function() {
        var kode = $('#kode_vendor').val();
        msgDialog({
            id: kode,
            type: 'edit'
        });
    });

    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: {
            kode_vendor: {
                required: true,
                maxlength: 10
            },
            nama: {
                required: true,
                maxlength: 50
            },
            no_tel: {
                required: true,
                maxlength: 50
            },
            email: {
                required: true,
                maxlength: 50
            },
            alamat: {
                required: true,
                maxlength: 300
            },
            npwp: {
                required: true,
                maxlength: 50
            },
            pic: {
                required: true,
                maxlength: 50
            },
            alamat2: {
                required: true,
                maxlength: 200
            },
            bank: {
                required: true,
                maxlength: 50
            },
            cabang: {
                required: true,
                maxlength: 50
            },
            no_rek: {
                required: true,
                maxlength: 50
            },
            nama_rek: {
                required: true,
                maxlength: 50
            },
            no_fax: {
                required: true,
                maxlength: 50
            },
            no_pictel: {
                required: true,
                maxlength: 50
            },
            akun_hutang: {
                required: true,
                maxlength: 20
            }
        },
        errorElement: "label",
        submitHandler: function(form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_vendor').val();
            var telpNow = $('#no_tel').val();
            var telpPicNow = $('#no_pictel').val();
            if (parameter == "edit") {
                var url = "{{ url('esaku-master/vendor') }}/" + id;
                var pesan = "updated";
                var text = "Perubahan data " + id + " telah tersimpan";
            } else {
                var url = "{{ url('esaku-master/vendor') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode " + id;
            }

            var formData = new FormData(form);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }

            if (parameter == 'edit') {
                if (telp_pic == telpPicNow || telp == telpNow) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal update data',
                        text: 'No telp atau No telp PIC mohon untuk diubah',
                        footer: ''
                    })
                    return;
                }
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
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Vendor');
                        $('#method').val('post');
                        $('#kode_vendor').attr('readonly', false);
                        msgDialog({
                            id: result.data.kode,
                            type: 'simpan'
                        });
                        last_add("kode_vendor", result.data.kode);
                    } else if (!result.data.status && result.data.message ===
                        "Unauthorized") {

                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";

                    } else {
                        if (result.data.kode == "-" && result.data.jenis != undefined) {
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text: 'Kode vendor sudah digunakan'
                            });
                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>' + result.data.message + '</a>'
                            })
                        }
                    }
                },
                fail: function(xhr, textStatus, errorThrown) {
                    alert('request failed:' + textStatus);
                }
            });
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function(error, element) {
            var id = element.attr("id");
            $("label[for=" + id + "]").append("<br/>");
            $("label[for=" + id + "]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON HAPUS DATA
    function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/vendor') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data', 'Data Vendor (' + id +
                        ') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                } else if (!result.data.status && result.data.message == "Unauthorized") {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

    $('#saku-datatable').on('click', '#btn-delete', function(e) {
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type: 'hapus'
        });
    });

    // END BUTTON HAPUS

    // BUTTON EDIT
    function editData(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/vendor') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {
                var result = res.data;
                if (result.status) {
                    telp = result.data[0].no_tel;
                    telp_pic = result.data[0].no_pictel;
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_vendor').attr('readonly', true);
                    $('#kode_vendor').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#alamat').val(result.data[0].alamat);
                    $('#alamat2').val(result.data[0].alamat2);
                    $('#email').val(result.data[0].email);
                    $('#npwp').val(result.data[0].npwp);
                    $('#pic').val(result.data[0].pic);
                    $('#no_pictel').val(result.data[0].no_pictel);
                    $('#no_tel').val(result.data[0].no_tel);
                    $('#no_fax').val(result.data[0].no_fax);
                    $('#bank').val(result.data[0].bank);
                    $('#cabang').val(result.data[0].cabang);
                    $('#no_rek').val(result.data[0].no_rek);
                    $('#nama_rek').val(result.data[0].nama_rek);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('akun_hutang', result.data[0].akun_hutang, result.data[0].nama_akun);
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function() {
        var id = $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();

        $('#btn-save').attr('type', 'button');
        $('#btn-save').attr('id', 'btn-update');

        $('#judul-form').html('Edit Data Vendor');
        editData(id);
    });
    // END BUTTON EDIT

    // HANDLER untuk enter dan tab
    $('#kode_vendor,#nama,#no_tel,#no_fax,#email,#npwp,#pic,#no_pictel,#bank,#cabang,#no_rek,#nama_rek,#alamat,#alamat2,#akun_hutang')
        .keydown(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            var nxt = ['kode_vendor', 'nama', 'no_tel', 'no_fax', 'email', 'npwp', 'pic', 'no_pictel', 'bank',
                'cabang', 'no_rek', 'nama_rek', 'alamat', 'alamat2', 'akun_hutang'
            ];
            if (code == 13 || code == 40) {
                e.preventDefault();
                var idx = nxt.indexOf(e.target.id);
                idx++;
                if (idx == 15) {
                    var akun = $('#akun_hutang').val();
                    getAkun(akun);
                } else {
                    $('#' + nxt[idx]).focus();
                }
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
    $('#table-data tbody').on('click', 'td', function(e) {
        if ($(this).index() != 3) {

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Kode Vendor</td>
                <td style='border:none'>` + id + `</td>
            </tr>
            <tr>
                <td>Nama Vendor</td>
                <td>` + data.nama + `</td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>` + data.no_tel + `</td>
            </tr>
            <tr>
                <td>No Fax</td>
                <td>` + data.no_fax + `</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>` + data.email + `</td>
            </tr>
            <tr>
                <td>No Telp PIC</td>
                <td>` + data.no_pictel + `</td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>` + data.bank + `</td>
            </tr>
            <tr>
                <td>Cabang</td>
                <td>` + data.cabang + `</td>
            </tr>
            <tr>
                <td>No Rekening</td>
                <td>` + data.no_rek + `</td>
            </tr>
            <tr>
                <td>Nama Rekening</td>
                <td>` + data.nama_rek + `</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>` + data.alamat + `</td>
            </tr>
            <tr>
                <td>Alamat NPWP</td>
                <td>` + data.alamat2 + `</td>
            </tr>
            <tr>
                <td>Akun Hutang</td>
                <td>` + data.akun_hutang + `</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);

            $('#modal-preview-judul').css({
                'margin-top': '10px',
                'padding': '0px !important'
            }).html('Preview Data Anggota').removeClass('py-2');
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click', '#btn-delete2', function(e) {
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id: id,
            type: 'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function() {
        var id = $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Vendor');

        $('#btn-save').attr('type', 'button');
        $('#btn-save').attr('id', 'btn-update');
        editData(id)
    });

    $('.modal-header').on('click', '#btn-cetak', function(e) {
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
        console.log('ok');
    });

    $('.modal-header').on('click', '#btn-cetak2', function(e) {
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });

</script>
