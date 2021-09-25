<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
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
<x-list-data judul="Data Pembukaan I/F" tambah="true"
    :thead="array('No Kas Bank','Tanggal','No Ref','Deskripsi','Nilai','Aksi')"
    :thwidth="array(10,10,10,25,10,10)" :thclass="array('','','','','','text-center')" />
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
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="tanggal">Tanggal</label>
                            <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="BK">BK</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="no_bukti">No Bukti</label>
                            <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly required>
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="nik_if" >NIK IF</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_nik_if" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-nik_if" id="nik_if" name="nik_if" value="" title="">
                                <span class="info-name_nik_if hidden">
                                    <span></span>
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_nik_periksa"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="akun_if" >Akun IF</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_akun_if" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-akun_if" id="akun_if" name="akun_if" value="" title="">
                                <span class="info-name_akun_if hidden">
                                    <span></span>
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_nik_periksa"></i>
                            </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12">
                            <label for="kas_bank" >Akun Kas Bank</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kas_bank" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-kas_bank" id="kas_bank" name="kas_bank" value="" title="">
                                <span class="info-name_kas_bank hidden">
                                    <span></span>
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_nik_periksa"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="nilai">Nilai</label>
                            <input class="form-control currency" type="text" id="nilai" name="nilai" required>
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required></textarea>
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
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
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
    $('#error-kode').hide();
    $('#success-kode').hide();
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

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () {  }
     });

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Pembukaan IF');
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
</script>
