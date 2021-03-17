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
<x-list-data judul="Kartu Simpanan Anggota" tambah="true"
    :thead="array('No Kartu','No Anggota','Nama','Jenis','Nilai','P Bunga','Aksi')"
    :thwidth="array(10,10,20,10,10,10,10)" :thclass="array('','','','','','','text-center')" />
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
                <div class="separator mb-2"></div>
                <!-- FORM BODY -->
                <div class="card-body pt-3 form-body">
                    <div class="form-group row " id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" name="no_simp" id="no_simp" value="">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12 col-sm-12">
                            <label for="no_agg">Anggota</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_no_agg" readonly="readonly" title=""
                                        data-toggle="tooltip" data-placement="top"></span>
                                </div>
                                <input type="text" class="form-control inp-label-no_agg" id="no_agg" name="no_agg"
                                    value="" title="">
                                <span class="info-name_no_agg hidden">
                                    <span></span>
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_no_agg"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="jenis_simpanan">Jenis Simpanan</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_jenis_simpanan" readonly="readonly" title=""
                                        data-toggle="tooltip" data-placement="top"></span>
                                </div>
                                <input type="text" class="form-control inp-label-jenis_simpanan" id="jenis_simpanan"
                                    name="jenis_simpanan" value="" title="">
                                <span class="info-name_jenis_simpanan hidden">
                                    <span></span>
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_jenis_simpanan"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="status_bayar">Jenis Pembayran</label>
                            <select class='form-control selectize' id="status_bayar" name="status_bayar">
                                <option value='PGAJI'>PGAJI</option>
                                <option value='TUNAI'>TUNAI</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="nilai">Nilai Simpanan</label>
                            <input class="form-control currency nominal" value="0" type="text" id="nilai" name="nilai"
                                required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="p_bunga">% Jasa/Tahun</label>
                            <input class="form-control currency nominal" value="0" type="text" id="p_bunga"
                                name="p_bunga" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="tgl_tagih">Tanggal Tagih</label>
                            <input class="form-control currency nominal" type="date" id="tgl_tagih" name="tgl_tagih"
                                required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <br>
                                    <div class="switch-toggle">
                                        <label class="switch">
                                            <input type="checkbox" name="flag_aktif" value="1" id="status-aktif">
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
@include('modal_search')

<!-- JAVASCRIPT  -->
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
    setHeightForm();
    var status_aktif = false;

    // FORM SMALL
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    var $iconLoad = $('.preloader');
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');

    //
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function format_number(x) {
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
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

    function isActive(active) {
        if (active == "1" || active == 1) {
            var html = '<span class="badge badge-success"><b>Aktif</b></span>'
        } else {
            var html = '<span class="badge badge-danger"><b>Unaktif</b></span>'
        }

        return html;
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

    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input

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

    function getNIK(id = null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/karyawan-detail') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {
                var result = res.data;
                if (result.status) {
                    if (typeof result.data !== 'undefined' && result.data.length > 0) {
                        showInfoField('pic', result.data[0].nik, result.data[0].nama);
                    } else {
                        $('#pic').attr('readonly', false);
                        $('#pic').css('border-left', '1px solid #d7d7d7');
                        $('#pic').val('');
                        $('#pic').focus();
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getPP(id = null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/unit') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {
                var result = res.data;
                if (result.status) {
                    if (typeof result.daftar !== 'undefined' && result.daftar.length > 0) {
                        showInfoField('kode_pp', result.daftar[0].kode_pp, result.daftar[0].nama);
                    } else {
                        $('#kode_pp').attr('readonly', false);
                        $('#kode_pp').css('border-left', '1px solid #d7d7d7');
                        $('#kode_pp').val('');
                        $('#kode_pp').focus();
                    }
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip();

    //LIST DATA
    var action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/kartu-simpanan') }}",
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
                'targets': [4, 5],
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
                data: 'no_simp'
            },
            {
                data: 'no_agg'
            },
            {
                data: 'nama'
            },
            {
                data: 'jenis'
            },
            {
                data: 'nilai'
            },
            {
                data: "p_bunga"
            }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [
            [5, "desc"]
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
    });

    $('#saku-form').on('click', '#btn-update', function() {
        var kode = $('#kode_gudang').val();
        msgDialog({
            id: kode,
            type: 'edit'
        });
    });
    //END KEMBALI

    // TRIGGER CHANGE
    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'no_agg':
                var settings = {
                    id: id,
                    header: ['No Anggota', 'Nama'],
                    url: "{{ url('esaku-master/anggota') }}",
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
            case 'jenis_simpanan':
                var settings = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('esaku-master/jenis-simpanan') }}",
                    columns: [{
                            data: 'kode_param'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Jenis Simpanan",
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
        }
        showInpFilter(settings);
    });

    $('#form-tambah').on('change', '#pic', function() {
        var par = $(this).val();
        getNIK(par);
    });

    $('#form-tambah').on('change', '#kode_pp', function() {
        var par = $(this).val();
        getPP(par);
    });
    // TRIGGER CHANGE

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: {
            no_agg: {
                required: true,
                maxlength: 10
            },
            jenis_simpanan: {
                required: true
            },
            status_bayar: {
                required: true,
            },
            nilai: {
                required: true
            },
            p_bunga: {
                required: true
            },
            tgl_tagih: {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function(form) {
            var parameter = $('#id_edit').val();
            var id = $('#no_simp').val();
            if (parameter == "edit") {
                var url = "{{ url('esaku-master/kartu-simpanan') }}";
                var pesan = "updated";
                var text = "Perubahan data " + id + " telah tersimpan";
            } else {
                var url = "{{ url('esaku-master/kartu-simpanan') }}";
                var pesan = "saved";
                var text = "Data Kartu Simpanan Berhasil di Simpan "
            }

            var formData = new FormData(form);
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
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Gudang');
                        $('#method').val('post');
                        $('#kode_gudang').attr('readonly', false);
                        msgDialog({
                            id: result.data.no_bukti,
                            type: 'simpan'
                        });
                        last_add("kode_gudang", result.data.kode);
                    } else if (!result.data.status && result.data.message === "Unauthorized") {

                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";

                    } else {
                        if (result.data.kode == "-" && result.data.jenis != undefined) {
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text: 'Kode Gudang sudah digunakan'
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
            url: "{{ url('esaku-master/kartu-simpanan') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(result) {
                if (result.data.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data', 'Data Karu Simpanan (' + id +
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
            url: "{{ url('esaku-master/kartu-simpanan') }}/" + id,
            dataType: 'json',
            async: false,
            success: function(res) {
                var result = res.data;
                if (result.status) {
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#no_simp').val(id);
                    $('#no_agg').val(result.data[0].no_agg);
                    $('#jenis_simpanan').val(result.data[0].kode_param);
                    $('#status_bayar').val(result.data[0].status_bayar);
                    $('#nilai').val(parseFloat(result.data[0].nilai));
                    $('#p_bunga').val(parseFloat(result.data[0].p_bunga));
                    $('#tgl_tagih').val(formatDate2(result.data[0].tgl_tagih));
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
                    showInfoField('no_agg', result.data[0].no_agg, result.data[0].nama_anggota);
                    showInfoField('jenis_simpanan', result.data[0].kode_param, result.data[0].jenis);
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

        $('#judul-form').html('Edit Data Kartu Simpanan');
        editData(id);
    });
    // END BUTTON EDIT

    // HANDLER untuk enter dan tab
    $('#kode_gudang,#nama,#telp,#pic,#alamat,#kode_pp').keydown(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_gudang', 'nama', 'telp', 'pic', 'alamat', 'kode_pp'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if (idx == 4) {
                var kode = $('#pic').val();
                getNIK(kode);
            } else if (idx == 6) {
                var kode = $('#kode_pp').val();
                getPP(kode);
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
        if ($(this).index() != 6) {

            var id = $(this).closest('tr').find('td').eq(0).html();
            console.log(id)
            var data = dataTable.row(this).data();
            var posted = data.posted;
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-master/kartu-simpanan') }}/" + id,
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
                            <div class="mt-3" style='border-bottom: double #d7d7d7;padding:0 1.5rem'>
                                <table class="borderless mb-2" width="100%" >
                                    <tr>
                                        <td width="50%" style="vertical-align:top !important"><h6 class="text-primary bold">KARTU SIMPANAN ANGGOTA</h6></td>
                                        <td width="75%" style="vertical-align:top !important;text-align:right"><h6 class="mb-2 bold">
                                        ` + isActive(result.data[0].flag_aktif) + `
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.5rem">
                                <table class="borderless table-header-prev mt-2" width="100%">
                                    <tr>
                                        <td width="14%">No Kartu</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].no_simp + `</td>
                                        <td width="30%" rowspan="3"></td>
                                        <td width="10%" rowspan="3" style="vertical-align:top !important">Lokasi</td>
                                        <td width="1%" rowspan="3" style="vertical-align:top !important">:</td>
                                        <td width="24%" rowspan="3" style="vertical-align:top !important">` + result
                            .data[0].kode_lokasi + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">No Anggota</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].no_agg + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Periode Bunga</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].periode_bunga + `</td>
                                    </tr>
                                    <tr>
                                        <td width="14%">Jenis Bayar</td>
                                        <td width="1%">:</td>
                                        <td width="20%">` + result.data[0].status_bayar + `</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="padding:0 1.9rem">
                                <table class="table table-striped table-body-prev mt-2" width="100%">
                                <tr style="background: var(--theme-color-1) !important;color:white !important">
                                        <th style="width:50%">Jenis Simpanan</th>
                                        <th style="width:20%" class="text-right">Nilai Simpanan</th>
                                        <th style="width:15" class="text-center">P Bunga</th>
                                </tr>
                                <tr color:white !important">
                                        <td style="width:50%" >` + result.data[0].jenis + `</td>
                                        <td style="width:20%" class="text-right">` + format_number(result.data[0]
                                .nilai) + `</td>
                                <td style="width:20%" class="text-center">` + format_number(result
                                .data[0].p_bunga) + `</td>
                                        </tr>`;


                        html += ` </table>
                                <table class="table-borderless mt-2" width="100%">
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
                            $('#judul-form').html('Edit Data Kartu Simpanan');
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
        $('#judul-form').html('Edit Data Kartu Simpanan');

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
