<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />
<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
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
        animation: animatebottom 0.5s;
    }

    @keyframes animatebottom {
        from {
            bottom: -400px;
            opacity: 0.8;
        }

        to {
            bottom: 0;
            opacity: 1;
        }
    }

    /* .bottom-sheet{
        max-height: 100% !important;
    }

    .bottom-sheet .modal.content{
        width: 60%;
        margin: 0px auto
    } */

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
                        <div class="tab-pane active mt-3" id="umum" role="tabpanel">
                            <div class="form-row">
                                <div class="col-12">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="no_agg">Kode</label>
                                    <input class="form-control" type="text" id="no_agg" name="no_agg" required>
                                </div>
                                <div class="error-side col-md-6 col-sm-12">
                                    <p class="text-danger" id="error-anggota">No Anggota sudah ada</p>
                                    <p class="text-success" id="success-anggota">No Anggota Siap Digunakan</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8 col-sm-12">
                                    <label for="nama">Nama</label>
                                    <input class="form-control" type="text" id="nama" name="nama" required>
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="id_lain">ID Lain</label>
                                    <input class="form-control" type="text" id="id_lain_prefix" name="id_lain_prefix"
                                        required>
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
                                    <label for="tgl_input">Tanggal Masuk</label>
                                    <input class="form-control" type="date" id="tgl_input" name="tgl_input"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12">
                                            <br>
                                            <div class="switch-toggle">
                                                <label class="switch">
                                                    <input type="checkbox" name="flag_aktif" value="1"
                                                        id="status-aktif">
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

                        <div class="tab-pane mt-3" id="alamat" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="alamat">Nama Jalan, Gedung, No Rumah/Unit</label>
                                    <textarea class="form-control alamat" rows="4" id="alamat" name="alamat"
                                        style="resize:none" required>

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="negara">Provinsi</label>
                                    <input class="form-control" type="text" id="provinsi" name="provinsi" required>
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
                        <div class="tab-pane mt-3" id="bank" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="bank">Nama Bank</label>
                                    <input class="form-control nama-bank" type="text" id="bank" name="bank" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="cabang">Nama Cabang</label>
                                    <input class="form-control" type="text" id="cabang" name="cabang" required>
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


<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_upload')

<!-- JAVASCRIPT  -->
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    var $iconLoad = $('.preloader');
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    // $('#modal-preview').addClass('fade animate');
    // $('#modal-preview .modal-content').addClass('animate-bottom');
    $('#error-anggota').hide();
    $('#success-anggota').hide();
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
    var doneTyping = 20000; // 10 detik
    var $anggota = $('#no_agg');

    function isActive(active) {
        if (active == "1" || active == 1) {
            var html = '<span class="text-success"><b>Aktif</b></span>'
        } else {
            var html = '<span class="text-danger"><b>Unaktif</b></span>'
        }

        return html;
    }



    function formatDate(date) {
        if (date !== undefined && date !== "") {
            var myDate = new Date(date);
            var month = [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mai",
                "Juni",
                "Juli",
                "Augustus",
                "September",
                "Octtober",
                "November",
                "Desember",
            ][myDate.getMonth()];
            var str = myDate.getDate() + " " + month + " " + myDate.getFullYear();
            return str;
        }
        return "";
    }

    function formatDate2(date) {
        if (date !== undefined && date !== "") {
            var myDate = new Date(date);
            var day = ("0" + myDate.getDate()).slice(-2);
            var month = ("0" + (myDate.getMonth() + 1)).slice(-2);
            var str = myDate.getFullYear() + "-" + month + "-" + day;
            return str;
        }
        return "";
    }

    function splitString(str) {
        var res = str.split("-");
        var splitSring = {
            pefix: res[0],
            set: res[1]
        }
        return splitSring;
    }

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

    $anggota.on('keyup', function() {
        clearTimeout(typingTime);
        typingTime = setTimeout(cekAnggota($(this).val()), doneTyping);
    })

    $anggota.on('keydown', function() {
        clearTimeout(typingTime);
    })

    function cekAnggota(value) {
        if (value !== "" || value !== null || value != "") {
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/anggota') }}/" + value,
                dataType: 'json',
                async: false,
                success: function(result) {

                    if (result.data.status) {
                        $('#error-anggota').show();
                        $('#success-anggota').hide();
                        console.log("Code Already Taken!")
                    } else if (!result.data.status && result.data.message == "Data Kosong!") {
                        $('#error-anggota').hide();
                        $('#success-anggota').show();
                        console.log("Code Ready to use!")
                    } else if (!result.status && result.message == 'Unauthorized') {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                }
            });

        } else {
            $('#error-anggota').hide();
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


    // // PLUGIN SCROLL di bagian preview dan form input
    // var scrollform = document.querySelector('.form-body');
    // var psscrollform = new PerfectScrollbar(scrollform);
    // // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/anggota') }}",
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
                data: 'no_agg'
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
            no_agg: {
                required: true,
                maxlength: 20
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
                maxlength: 200
            },
            tgl_lahir: {
                required: true
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
            id_lain_prefix: {
                required: false,
                maxlength: 4,
            },
            id_lain_set: {
                required: false,
                maxlength: 16
            }
        },
        errorElement: "label",
        submitHandler: function(form) {
            var parameter = $('#id_edit').val();
            var id = $('#no_agg').val();
            var telpNow = $('#no_tel').val();
            var telpPicNow = $('#no_pictel').val();
            if (parameter == "edit") {
                var method = "PUT";
                var url = "{{ url('esaku-master/anggota') }}/" + id;
                var pesan = "updated";
                var text = "Perubahan data " + id + " telah tersimpan";
            } else {
                var method = "POST";
                var url = "{{ url('esaku-master/anggota') }}";
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
            url: "{{ url('esaku-master/anggota') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data', 'Data Anggota (' + id +
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
            url: "{{ url('esaku-master/anggota') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {
                var result = res.data;
                console.log(result)
                if (result.status) {
                    var idLain = splitString(result.data[0].id_lain);
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_agg').attr('readonly', true);
                    $('#no_agg').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $("#tgl_lahir").val(formatDate2(result.data[0].tgl_lahir))
                    $('.alamat').val(result.data[0].alamat);
                    $('#email').val(result.data[0].email);
                    $('#no_tel').val(result.data[0].no_tel);
                    $('.nama-bank').val(result.data[0].bank);
                    $('#cabang').val(result.data[0].cabang);
                    $('#no_rek').val(result.data[0].no_rek);
                    $('#nama_rek').val(result.data[0].nama_rek);
                    $('#kota').val(result.data[0].kota);
                    $('#provinsi').val(result.data[0].provinsi);
                    $('#kecamatan').val(result.data[0].kecamatan);
                    $('#kode_pos').val(result.data[0].kode_pos);
                    $('#id_lain_prefix').val(idLain.pefix);
                    $('#id_lain_set').val(idLain.set);
                    if (result.data[0].flag_aktif == 1) {
                        $('#status-aktif').prop('checked', true)
                        $('#aktif').show()
                        $('#unaktif').hide()
                    } else {
                        $('#status-aktif').prop('checked', false)
                        $('#aktif').hide()
                        $('#unaktif').show()
                    }
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
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

        $('#judul-form').html('Edit Data Anggota');
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



    // PREVIEW DATA
    $('#table-data tbody').on('click', 'td', function(e) {
        if ($(this).index() != 3 && $(this).index() != 4) {

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var posted = data.posted;
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-master/anggota') }}/" + id,
                dataType: 'json',
                async: false,
                success: function(res) {
                    var result = res.data;
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

                            <div style="padding:0 1.5rem">
                                <table class="borderless table-header-prev mt-3" width="100%">
                                    <tr style="background: var(--theme-color-1) !important;color:white !important">
                                        <th colspan="3" style="width:15%">I. Umum</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">No Anggota</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].no_agg + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">ID Lain</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].id_lain + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Kode Lokasi</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].kode_lokasi + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama Anggota</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].nama + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Lahir</td>
                                        <td width="1%">:</td>
                                        <td>` + formatDate(result.data[0].tgl_lahir) + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Alamat</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].alamat + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%"></td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].kecamatan + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%"></td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].kota + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%"></td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].provinsi + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Kode Pos</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].kode_pos + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">No Telepon</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].no_tel + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Email</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].email + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Status</td>
                                        <td width="1%">:</td>
                                        <td>` + isActive(result.data[0].flag_aktif) + `</td>
                                    </tr>

                                    <tr style="background: var(--theme-color-1) !important;color:white !important">
                                        <th colspan="3" style="width:15%">II. Bank</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama Bank</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].bank + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Cabang</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].cabang + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">No Rekening</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].no_rek + `</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama Pemilik Rekening</td>
                                        <td width="1%">:</td>
                                        <td>` + result.data[0].nama_rek + `</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">
                                            <small><i>Created at: ` + result.data[0].tgl_input + ` </i></small>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div></div>`;
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
                            $('#judul-form').html('Edit Data Anggota');
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
                            $('.preview-header #btn-delete2').css('display', 'inline-block');
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

    // END PREVIEW

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
        $('#judul-form').html('Edit Data Anggota');

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
