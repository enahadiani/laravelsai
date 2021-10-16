<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
    .form-header {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .judul-form {
        margin-bottom: 0;
        margin-top: 5px;
    }

</style>

<!-- LIST DATA -->
<x-list-data judul="Data Pertanggungan Beban" tambah="true"
    :thead="array('No Bukti','Tanggal','No Dokumen','Deskripsi','Nilai','Progress','Aksi')"
    :thwidth="array(15,15,20,25,10,35,10)" :thclass="array('','','','','','','text-center')" />
<!-- END LIST DATA -->

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="tanggal" name="tanggal">
    <div class="row" id="saku-form" style="display: none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 my-2">
                                    <label for="no_bukti">No Bukti</label>
                                    <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti"
                                        value="-" readonly>
                                    <a href="#" class="generate-bukti" id="generate-bukti"><i
                                            style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                            class="simple-icon-sync"></i></a>

                                </div>
                                <div class="col-md-6 col-sm-12 my-2">
                                    <label for="no_dokumen">Nomor Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 my-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal"
                                        name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                        class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nik_periksa">Due Date</label>
                                    <input class='form-control datepicker' type="text" id="duedate" name="duedate"
                                        value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                        class="simple-icon-calendar date-search"></i>
                                </div>

                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <input class="form-control" type="hidden" placeholder="No Bukti" id="no_bukti"
                                        name="no_bukti" readonly>
                                    <input class="form-control" type="hidden" placeholder="No Bukti" id="kode_form"
                                        name="kode_form" readonly>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-6 col-sm-12">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_debet">Total Jurnal</label>
                                    <input class="form-control currency" type="text" placeholder="Total Jurnal" readonly
                                        id="totalJurnal" name="total_jurnal" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_kredit">Total Net Rekening</label>
                                    <input class="form-control currency" type="text" placeholder="Total Kredit" readonly
                                        id="total_kredit" name="total_kredit" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-tabs col-12 " role="tablist">

                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-atensi"
                                role="tab" aria-selected="true"><span class="hidden-xs-down">Atensi
                                    Pembayaran</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-jurnal" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Data Jurnal</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-otorisasi" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Otorisasi</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-catatan" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Catatan Verifikator</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Berkas</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-budget" role="tab"
                                aria-selected="true"><span class="hidden-xs-down">Budget</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">

                        <div class="tab-pane active" id="data-atensi" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                        class=""><span
                                            style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                            id="total-row-atensi"></span></a>
                                </div>
                                <table class="table table-bordered table-condensed gridexample" id="atensi-grid"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:15%">Atensi</th>
                                            <th style="width:15%">Bank Cabang</th>
                                            <th style="width:15%">Nama Rekening</th>
                                            <th style="width:15%">No Rekening</th>
                                            <th style="width:15%">Bruto</th>
                                            <th style="width:15">Potongan</th>
                                            <th style="width:15">Netto</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <a type="button" href="#" data-id="0" title="add-row-atensi" id="add-row-atensi"
                                class="add-row-atensi btn btn-light2 btn-block btn-sm"><i
                                    class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                        </div>
                        {{-- begin data jurnal tab --}}
                        <div class="tab-pane" id="data-jurnal" role="tabpanel">

                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span
                                        style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                        id="total-row"></span></a>
                            </div>

                            <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="jurnal-grid"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:13%">Kode Akun</th>
                                            <th style="width:15%">Nama Akun</th>
                                            <th style="width:5%">DC</th>
                                            <th style="width:20%">Keterangan</th>
                                            <th style="width:15%">Nilai</th>
                                            <th style="width:7%">Kode PP</th>
                                            <th style="width:17%">Nama PP</th>
                                            <th style="width:7%">Kode DRK</th>
                                            <th style="width:17%">Nama DRK</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row"
                                    class="add-row-jurnal btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>
                        </div>
                        {{-- end data jurnal tab --}}
                        {{-- begin otorisasi tab --}}
                        <div class="tab-pane" id="data-otorisasi" role="tabpanel">
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="nik_buat">Dibuat Oleh</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik_buat" readonly="readonly"
                                                title="" data-toggle="tooltip" data-placement="top"></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik_buat" id="nik_buat"
                                            name="nik_buat" value="" title="">
                                        <span class="info-name_nik_buat hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik_buat"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="nik_tahu">Nik Mengetahui</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik_tahu" readonly="readonly"
                                                title="" data-toggle="tooltip" data-placement="top"></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik_tahu" id="nik_tahu"
                                            name="nik_tahu" value="" title="">
                                        <span class="info-name_nik_tahu hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik_tahu"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="nik_ver">Nik Verifikator</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik_ver" readonly="readonly"
                                                title="" data-toggle="tooltip" data-placement="top"></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik_ver" id="nik_ver"
                                            name="nik_ver" value="" title="">
                                        <span class="info-name_nik_ver hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik_ver"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end otorisasi tab --}}

                        {{-- begin catatan verifikator tab --}}
                        <div class="tab-pane" id="data-catatan" role="tabpanel">
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <div class="col-md-10 mt-3">
                                    <p>Catatan tidak ditemukan</p>
                                </div>
                            </div>
                        </div>
                        {{-- end catatan verifikator tab --}}

                        {{-- begin data dok tab --}}
                        <div class="tab-pane" id="data-dok" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span
                                        style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                        id="total-row_dok"></span></a>
                            </div>
                            <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-dok"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Jenis</th>
                                            <th style="width:27%">Nama</th>
                                            <th style="width:20%">Path File</th>
                                            <th width="20%">Upload File</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row-dok"
                                    class="add-row-dok btn btn-light2 btn-block btn-sm">
                                    <i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                            </div>
                        </div>
                        {{-- end data dok tab --}}
                        {{-- begin budget tab --}}
                        <div class="tab-pane" id="data-budget" role="tabpanel">
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <button type="button" id="cek-budget"
                                    class="btn btn-sm btn-primary mt-2 mb-2 cek-budget">Cek Budget</button>

                                <table id="budget-grid"
                                    class="budget-grid table table-bordered table-condensed gridexample"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <th style="width: 3%">No</th>
                                        <th>Kode Akun</th>
                                        <th>Kode PP</th>
                                        <th>Kode DRK</th>
                                        <th>Saldo Awal</th>
                                        <th>Nilai</th>
                                        <th>Saldo Akhir</th>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        {{-- end budget tab --}}


                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action">
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
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_search')

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}">
</script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    var $tahun = "{{ date('Y') }}"
    var $periode = "{{ date('Ym') }}"
    var valid = true
    var $kode_akun = []
    var $pp = []
    var $drk = []
    var $totalPemberi = 0;
    var $totalJurnal = 0;
    var $akunPenerima = []
    var $ppPenerima = []
    var $nikApprove = []

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    var valid = true;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function reverseDate2(date_str, separator, newseparator) {
        if (typeof separator === 'undefined') {
            separator = '-'
        }
        if (typeof newseparator === 'undefined') {
            newseparator = '-'
        }
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2] + newseparator + str[1] + newseparator + str[0];
    }

    function generateBukti() {
        var date = $('#form-tambah').find('.inp-tanggal').val();
        var date2 = reverseDate2(date, '/', '-');
        // console.log(date2);
        var url = "{{ url('bdh-trans/generate-bukti') }}";

        $.ajax({
            type: 'GET',
            url: url,
            data: {
                tanggal: date2
            },
            dataType: 'JSON',
            async: false,
            success: function (result) {
                $('#form-tambah').find('.inp-no_bukti').val(result.data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 422) {
                    var msg = jqXHR.responseText;
                } else if (jqXHR.status == 500) {
                    var msg = "Internal server error";
                } else if (jqXHR.status == 401) {
                    var msg = "Unauthorized";
                    window.location = "{{ url('/bdh-auth/sesi-habis') }}";
                } else if (jqXHR.status == 405) {
                    var msg = "Route not valid. Page not found";
                }
            }
        });

    }

    $('#form-tambah').on('change', '.inp-tanggal', function (e) {
        generateBukti();
    });


    function cekBudget() {
        var url = '{{ url("bdh-trans/load-budget") }}';
        var kode_akun_agg = $('#jurnal-grid').find('.inp-kode_akun').val();
        var kode_pp_agg = $('#jurnal-grid').find('.inp-pp').val();
        var kode_drk_agg = $('#jurnal-grid').find('.inp-drk').val();
        var nilai = $('#jurnal-grid').find('.inp-nilai').val();
        var tanggal = $('#form-tambah').find('.inp-tanggal').val();
        var revers = reverseDate2(tanggal, '/', '');
        var periode = revers.substring(0, 6);

        var no_bukti = $('#form-tambah').find('.inp-no_bukti').val();
        var nilai_agg = toNilai(nilai);
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                kode_akun_agg: kode_akun_agg,
                kode_pp_agg: kode_pp_agg,
                kode_drk_agg: kode_drk_agg,
                nilai_agg: nilai_agg,
                periode: periode,
                no_bukti: no_bukti
            },
            dataType: 'JSON',
            async: false,
            success: function (result) {
                var data = result.daftar;
                var no = 1;
                var html = '';
                html += `<tr>
                    <td>` + no++ + `</td>
                    <td>` + data.kode_akun_agg + `</td>
                    <td>` + data.kode_pp_agg + `</td>
                    <td>` + data.kode_drk_agg + `</td>
                    <td>` + data.so_awal_agg + `</td>
                    <td>` + data.nilai_agg + `</td>
                    <td>` + data.so_akhir_agg + `</td>
                </tr>`

                $('#budget-grid >tbody').html(html);
                console.log(result);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 422) {
                    var msg = jqXHR.responseText;
                } else if (jqXHR.status == 500) {
                    var msg = "Internal server error";
                } else if (jqXHR.status == 401) {
                    var msg = "Unauthorized";
                    window.location = "{{ url('/bdh-auth/sesi-habis') }}";
                } else if (jqXHR.status == 405) {
                    var msg = "Route not valid. Page not found";
                }
            }
        });

    }

    $('#data-budget').on('click', '.cek-budget', function (e) {
        cekBudget();
    });



    function filterNikApprove(value) {
        for (var i = 0; i < $nikApprove.length; i++) {
            var data = $nikApprove[i]
            if (data.id == value) {
                console.log(data)
                showInfoField('nik_approve', data.id, data.name)
                break;
            }
        }
    }

    function filterPPPenerima(value) {
        for (var i = 0; i < $ppPenerima.length; i++) {
            var data = $ppPenerima[i]
            if (data.id == value) {
                showInfoField('pp_penerima', data.id, data.name)
                break;
            }
        }
    }

    function filterDrkPenerima(value) {
        for (var i = 0; i < $ppPenerima.length; i++) {
            var data = $ppPenerima[i]
            if (data.id == value) {
                showInfoField('drk_penerima', data.id, data.name)
                break;
            }
        }
    }

    function filterAkunPenerima(value) {
        for (var i = 0; i < $akunPenerima.length; i++) {
            var data = $akunPenerima[i]
            if (data.id == value) {
                showInfoField('akun_penerima', data.id, data.name)
                break;
            }
        }
    }

    function format_number(x) {
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function hitungTotalJurnal() {
        var totalJurnal = 0;
        $('#jurnal-grid tbody tr').each(function (index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            totalJurnal += nilai
        })
        $('#totalJurnal').val(totalJurnal);
    }

    function hitungTotalPemberi() {
        $totalPemberi = 0;
        $('#pemberi-grid tbody tr').each(function (index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            $totalPemberi += nilai
        })
    }

    function resetForm() {
        $('#pemberi-grid tbody').empty()
        $("[id^=label]").each(function (e) {
            $(this).text('');
        });
        $("[class^=info-name]").each(function (e) {
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function (e) {
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function (e) {
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function (e) {
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function (e) {
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function (e) {
            $(this).addClass('hidden');
        });
    }
    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    function last_add(param, isi) {
        var rowIndexes = [];
        dataTable.rows(function (idx, data, node) {
            if (data[param] === isi) {
                rowIndexes.push(idx);
            }
            return false;
        });
        dataTable.row(rowIndexes).select();
        $('.selected td:eq(0)').addClass('last-add');
        console.log('last-add');
        setTimeout(function () {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    //LIST DATA
    var action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('bdh-trans/ptg-beban') }}",
        [{
                'targets': 6,
                data: null,
                'defaultContent': action_html,
                'className': 'text-center'
            },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if (rowData.status == "baru") {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            }
        ],
        [{
                data: 'no_pb'
            },
            {
                data: 'tgl'
            },
            {
                data: 'no_dokumen'
            },
            {
                data: 'keterangan'
            },
            {
                data: 'nilai',
                className: 'text-right',
                render: $.fn.dataTable.render.number('.', ',', 2, '')
            },
            {
                data: 'status'
            }
        ],
        "{{ url('bdh-auth/sesi-habis') }}",
        [
            [4, "desc"]
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
    // END LIST DATA

    $('#saku-datatable').on('click', '#btn-tambah', function () {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Pertanggungan Beban');
        $('#btn-update').attr('id', 'btn-save');
        $('#btn-save').attr('type', 'submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#id_edit').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').val('')
        $('[class*=inp-label-]').attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important'
        );
        generateBukti();
    });

    $('#saku-form').on('click', '#btn-kembali', function () {
        var kode = null;
        msgDialog({
            id: kode,
            type: 'keluar'
        });
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    $('.info-icon-hapus').click(function () {
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

    $('#form-tambah').on('click', '.search-item2', function () {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'nik_buat':
                var settings = {
                    id: id,
                    header: ['NIK', 'Nama'],
                    url: "{{ url('bdh-trans/nik-buat') }}",
                    columns: [{
                            data: 'nik'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar NIK Buat",
                    pilih: "",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                }
                break;
            case 'nik_tahu':
                var settings = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/nik-tahu') }}",
                    columns: [{
                            data: 'nik'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar NIK Mengetahui",
                    pilih: "",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                }
                break;
            case 'nik_ver':
                var settings = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/nik-ver') }}",
                    columns: [{
                            data: 'nik'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar NIK Verifikator",
                    pilih: "",
                    jTarget1: "text",
                    jTarget2: "text",
                    target1: ".info-code_" + id,
                    target2: ".info-name_" + id,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"],
                }
                break;
            default:
                break;
        }
        showInpFilter(settings);
    })

    $('#form-tambah #input-dok').on('click', '.search-item', function () {
        var par = $(this).closest('td').find('input').attr('name');

        var tmp = $(this).closest('tr').find('input[name="' + par + '"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        var tmp = $(this).closest('tr').find('input[name="nama_dok[]"]').attr('class');
        var tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        console.log(par, target1, target2)

        switch (par) {
            case 'jenis[]':
                var options = {
                    id: par,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/dok-jenis') }}",
                    columns: [{
                            data: 'kode_jenis'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar Jenis Dokumen",
                    pilih: "jenis",
                    jTarget1: "val",
                    jTarget2: "val",
                    target1: "." + target1,
                    target2: "." + target2,
                    target3: "",
                    target4: "",
                    width: ["30%", "70%"]
                };
                break;
        }
        showInpFilter(options);

    });

    // GRID ATENSI
    function hitungTotalRowAtensi() {
        var total_row = $('#atensi-grid tbody tr').length;
        $('#total-row-atensi').html(total_row + ' Baris');
    }

    function hideUnselectedRowAtensi() {
        $('#atensi-grid > tbody > tr').each(function (index, row) {
            if (!$(row).hasClass('selected-row')) {
                var atensi = $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-atensi").val();
                var cabang_bank = $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-cabang_bank")
                    .val();
                var nama_rek = $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_rek")
                    .val();
                var no_rek = $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-no_rek").val();
                var bruto = $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-bruto").val();
                var potongan = $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-potongan")
                    .val();
                var netto = $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-netto").val();

                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-atensi").val(atensi);
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-atensi").text(atensi);
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-cabang_bank").val(cabang_bank)
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-cabang_bank").text(cabang_bank);
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_rek").val(nama_rek)
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_rek").text(nama_rek);
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-no_rek").val(no_rek)
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-no_rek").text(no_rek);
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-bruto").val(bruto)
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-bruto").text(bruto);
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-potongan").val(potongan)
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-potongan").text(potongan);
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-netto").val(netto)
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-netto").text(netto);

                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-atensi").hide();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-atensi").show();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-cabang_bank").hide();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-cabang_bank").show();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_rek").hide();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_rek").show();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-no_rek").hide();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-no_rek").show();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-bruto").hide();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-bruto").show();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-potongan").hide();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-potongan").show();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".inp-netto").hide();
                $('#atensi-grid > tbody > tr:eq(' + index + ') > td').find(".td-netto").show();
            }
        })
    }

    function addRowAtensi() {
        var no = $('#atensi-grid .row-atensi:last').index();
        var no = no + 2
        var html = "";

        html += "<tr class='row-atensi row-atensi-" + no + "'>"

        html += "<td><span class='td-atensi tdatensike" + no + "'></span>"
        html += "<input type='text' name='atensi[]' class='inp-atensi form-control atensike" + no +
            " hidden'  value='' required>"
        html += "</td>"

        html += "<td><span class='td-cabang_bank tdcabang_bankke" + no + "'></span>"
        html += "<input type='text' name='cabang_bank[]' class='inp-cabang_bank form-control cabang_bankke" + no +
            " hidden'  value='' required>"
        html += "</td>"

        html += "<td><span class='td-nama_rek tdnama_rekke" + no + "'></span>"
        html += "<input type='text' name='nama_rek[]' class='inp-nama_rek form-control nama_rekke" + no +
            " hidden'  value='' required>"
        html += "</td>"

        html += "<td><span class='td-no_rek tdno_rekke" + no + "'></span>"
        html += "<input type='text' name='no_rek[]' class='inp-no_rek form-control no_rekke" + no +
            " hidden'  value='' required>"
        html += "</td>"

        html += "<td class='form-calc'><span class='td-bruto tdbrutoke" + no + "'>0</span>"
        html += "<input type='text' name='bruto[]' class='inp-bruto form-control brutoke" + no +
            " currency hidden'  value='0' required>"
        html += "</td>"

        html += "<td class='form-calc'><span class='td-potongan tdpotonganke" + no + "'>0</span>"
        html += "<input type='text' name='potongan[]' class='inp-potongan form-control potonganke" + no +
            " currency hidden'  value='0' required>"
        html += "</td>"

        html += "<td><span class='td-netto tdnettoke" + no + "'>0</span>"
        html += "<input type='text' name='netto[]' class='inp-netto form-control nettoke" + no +
            " currency hidden'  value='0' readonly required>"
        html += "</td>"

        html +=
            "<td class='text-center'><a class='hapus-atensi' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";

        html += "</tr>"

        $('#atensi-grid tbody').append(html);

        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {}
        });

        $('.tooltip-span').tooltip({
            title: function () {
                return $(this).text();
            }
        });




        hideUnselectedRowAtensi()

        $('#atensi-grid td').removeClass('px-0 py-0 aktif');
        $('#atensi-grid tbody tr:last').find("td:eq(0)").addClass('px-0 py-0 aktif');
        $('#atensi-grid tbody tr:last').find(".inp-atensi").show();
        $('#atensi-grid tbody tr:last').find(".td-atensi").hide();
        $('#atensi-grid tbody tr:last').find(".inp-atensi").focus();

        $('.inp-nilai').on('change', function () {
            hitungTotalAtensi()
        })

        hitungTotalRowAtensi()
    }

    $('#atensi-grid tbody').on('click', 'tr', function () {
        $(this).addClass('selected-row');
        $('#atensi-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowAtensi();
    });

    $('#atensi-grid').on('click', 'td', function () {
        var idx = $(this).index();
        if (idx == 7) {
            return false;
        } else {
            if ($(this).hasClass('px-0 py-0 aktif')) {
                return false;
            } else {
                $('#atensi-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var atensi = $(this).parents("tr").find(".inp-atensi").val();
                var cabang_bank = $(this).parents("tr").find(".inp-cabang_bank").val();
                var nama_rek = $(this).parents("tr").find(".inp-nama_rek").val();
                var no_rek = $(this).parents("tr").find(".inp-no_rek").val();
                var bruto = $(this).parents("tr").find(".inp-bruto").val();
                var potongan = $(this).parents("tr").find(".inp-potongan").val();
                var netto = $(this).parents("tr").find(".inp-netto").val();


                $(this).parents("tr").find(".inp-atensi").val(atensi);
                $(this).parents("tr").find(".td-atensi").text(atensi);
                if (idx == 0) {
                    $(this).parents("tr").find(".inp-atensi").show();
                    $(this).parents("tr").find(".search-atensi").show();
                    $(this).parents("tr").find(".td-atensi").hide();
                    $(this).parents("tr").find(".inp-atensi").focus();
                } else {
                    $(this).parents("tr").find(".inp-atensi").hide();
                    $(this).parents("tr").find(".search-atensi").hide();
                    $(this).parents("tr").find(".td-atensi").show();
                }

                $(this).parents("tr").find(".inp-cabang_bank").val(cabang_bank);
                $(this).parents("tr").find(".td-cabang_bank").text(cabang_bank);
                if (idx == 1) {
                    $(this).parents("tr").find(".inp-cabang_bank").show();
                    $(this).parents("tr").find(".td-cabang_bank").hide();
                    $(this).parents("tr").find(".inp-cabang_bank").focus();
                } else {
                    $(this).parents("tr").find(".inp-cabang_bank").hide();
                    $(this).parents("tr").find(".td-cabang_bank").show();
                }

                $(this).parents("tr").find(".inp-nama_rek").val(nama_rek);
                $(this).parents("tr").find(".td-nama_rek").text(nama_rek);
                if (idx == 2) {
                    $(this).parents("tr").find(".inp-nama_rek").show();
                    $(this).parents("tr").find(".td-nama_rek").hide();
                    $(this).parents("tr").find(".inp-nama_rek").focus();
                } else {
                    $(this).parents("tr").find(".inp-nama_rek").hide();
                    $(this).parents("tr").find(".td-nama_rek").show();
                }

                $(this).parents("tr").find(".inp-no_rek").val(no_rek);
                $(this).parents("tr").find(".td-no_rek").text(no_rek);
                if (idx == 3) {
                    $(this).parents("tr").find(".inp-no_rek").show();
                    $(this).parents("tr").find(".td-no_rek").hide();
                    $(this).parents("tr").find(".inp-no_rek").focus();
                } else {
                    $(this).parents("tr").find(".inp-no_rek").hide();
                    $(this).parents("tr").find(".td-no_rek").show();
                }

                $(this).parents("tr").find(".inp-bruto").val(bruto);
                $(this).parents("tr").find(".td-bruto").text(bruto);
                if (idx == 4) {
                    $(this).parents("tr").find(".inp-bruto").show();
                    $(this).parents("tr").find(".td-bruto").hide();
                    $(this).parents("tr").find(".inp-bruto").focus();
                } else {
                    $(this).parents("tr").find(".inp-bruto").hide();
                    $(this).parents("tr").find(".td-bruto").show();
                }

                $(this).parents("tr").find(".inp-potongan").val(potongan);
                $(this).parents("tr").find(".td-potongan").text(potongan);
                if (idx == 5) {
                    $(this).parents("tr").find(".inp-potongan").show();
                    $(this).parents("tr").find(".td-potongan").hide();
                    $(this).parents("tr").find(".inp-potongan").focus();
                } else {
                    $(this).parents("tr").find(".inp-potongan").hide();
                    $(this).parents("tr").find(".td-potongan").show();
                }

                $(this).parents("tr").find(".inp-netto").val(netto);
                $(this).parents("tr").find(".td-netto").text(netto);
                if (idx == 6) {
                    $(this).parents("tr").find(".inp-netto").show();
                    $(this).parents("tr").find(".td-netto").hide();
                    $(this).parents("tr").find(".inp-netto").focus();
                } else {
                    $(this).parents("tr").find(".inp-netto").hide();
                    $(this).parents("tr").find(".td-netto").show();
                }
            }
        }
    });

    var $twicePressAtensi = 0;
    $('#atensi-grid').on('keydown', '.inp-atensi', function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-atensi'];
        var nxt2 = ['.td-atensi'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index() - 1;
            var idx_next = idx + 1;
            var kunci = $(this).closest('td').index() + 1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                    if (isi.length > 30) {
                        isi = isi.substr(0, 30) + '...'
                    }
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-anggaran').hide();
                    $(this).closest('tr').find('.search-pp').show();
                    break;
                case 1:
                    $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-pp').hide();
                    $(this).closest('tr').find('.search-drk').show();
                    break;
                case 2:
                    $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-drk').hide();
                    break;
                case 3:
                    $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    break;
                case 4:
                    if (isi != "" && isi != 0) {
                        $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");

                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    } else {
                        alert('Saldo yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 5:
                    if (isi != "" && isi != 0) {
                        $("#atensi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq(" + kunci + ")").addClass("px-0 py-0 aktif");
                        if (code == 13 || code == 9) {
                            if ($twicePressPemberi == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-atensi');
                                if (cek.length > 0) {
                                    cek.click();
                                } else {
                                    $('#add-row-atensi').click();
                                }
                            }
                            $twicePressPemberi = 1
                            setTimeout(() => $twicePressPemberi = 0, 1000)
                        }
                    } else {
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                default:
                    break;
            }
        } else if (code == 38) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('#form-tambah').on('click', '#add-row-atensi', function () {
        addRowAtensi()
    });

    $('#atensi-grid').on('click', '.hapus-atensi', function () {
        valid = true
        $(this).closest('tr').remove();
        no = 1;
        $('.row-atensi').each(function () {
            var nom = $(this).closest('tr').find('.no-atensi');
            nom.html(no);
            no++;
        });
        hitungTotalRowAtensi();
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
    });

    // kalkulasi nilai netto
    $('#form-tambah').on('change', '.form-calc', function () {
        var parent = $(this).closest("tr");

        var bruto = parent.find('.inp-bruto').val();
        var potongan = parent.find('.inp-potongan').val();
        var numberBruto = Number(bruto.replace(/[^0-9,-]+/g, ""));
        var numberPotongan = Number(potongan.replace(/[^0-9,-]+/g, ""));
        var netto = numberBruto - numberPotongan;
        console.log(numberBruto);
        console.log(netto);
        parent.find('.inp-netto').val(format_number(netto));
    });
    // END ATENSI GRID

    // Jurnal  Grid
    function hitungTotalRowJurnal() {
        var total_row = $('#jurnal-grid tbody tr').length;
        $('#total-row-jurnal').html(total_row + ' Baris');
    }

    function hideUnselectedRowJurnal() {
        $('#jurnal-grid > tbody > tr').each(function (index, row) {
            if (!$(row).hasClass('selected-row')) {
                var kode_akun = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").val();
                var nama_akun = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").val();
                var dc = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-dc").text();
                var keterangan = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-ket").val();
                var nilai = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").val();
                var kode_pp = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-pp").val();
                var nama_pp = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_pp").val();
                var kode_drk = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-drk").val();
                var nama_drk = $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_drk")
                    .val();

                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").val(kode_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-kode").text(kode_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").val(nama_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama").text(nama_akun);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-dc")[0].selectize.setValue(dc);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-dc").text(dc);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-ket").val(keterangan);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-ket").text(keterangan);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").val(nilai);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nilai").text(nilai);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-pp").val(kode_pp);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-pp").text(kode_pp);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_pp").val(nama_pp);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_pp").text(nama_pp);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-drk").val(kode_drk);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-drk").text(kode_drk);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_drk").val(nama_drk);
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_drk").text(nama_drk);

                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-kode").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".search-akun").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".selectize-control").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-dc").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-ket").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-ket").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nilai").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-pp").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-pp").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".search-pp").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_pp").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_pp").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-drk").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-drk").show();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".search-drk").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_drk").hide();
                $('#jurnal-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_drk").show();
            }
        })
    }

    function addRowJurnal() {
        var kode_akun = "";
        var nama_akun = "";
        var dc = "";
        var keterangan = "";
        var nilai = "";
        var kode_pp = "";
        var nama_pp = "";
        var kode_drk = "";
        var nama_drk = "";

        var no = $('#jurnal-grid .row-jurnal:last').index();
        no = no + 2;
        var input = "";
        input += "<tr class='row-jurnal'>";
        input += "<td class='no-jurnal text-center'>" + no + "</td>";
        input += "<td><span class='td-kode tdakunke" + no + " tooltip-span'>" + kode_akun +
            "</span><input type='text' name='kode_akun[]' id='kode_akun' class='form-control inp-kode akunke" + no +
            " hidden' value='" + kode_akun + "' required='' style='z-index: 1;position: relative;' id='akunkode" + no +
            "'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke" + no + " tooltip-span'>" + nama_akun +
            "</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke" + no +
            " hidden'  value='" + nama_akun + "' readonly></td>";
        input += "<td><span class='td-dc tddcke" + no + " tooltip-span'>" + dc +
            "</span><select hidden name='dc[]' class='form-control inp-dc dcke" + no +
            "' value='' required><option value='D'>D</option><option value='C'>C</option></select></td>";
        input += "<td><span class='td-ket tdketke" + no + " tooltip-span'>" + keterangan +
            "</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke" + no +
            " hidden'  value='" + keterangan + "' required></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilke" + no + " tooltip-span'>" + nilai +
            "</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke" + no + " hidden'  value='" +
            nilai + "' required></td>";
        input += "<td><span class='td-pp tdppke" + no + " tooltip-span'>" + kode_pp +
            "</span><input type='text' id='ppkode" + no + "' name='kode_pp[]' class='form-control inp-pp ppke" + no +
            " hidden' value='" + kode_pp +
            "' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_pp tdnmppke" + no + " tooltip-span'>" + nama_pp +
            "</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke" + no +
            " hidden'  value='" + nama_pp + "' readonly ></td>";

        input += "<td><span class='td-drk tddrkke" + no + " tooltip-span'>" + kode_drk +
            "</span><input type='text' id='drkkode" + no + "' name='kode_drk[]' class='form-control inp-drk drkke" +
            no + " hidden' value='" + kode_drk +
            "' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_drk tdnmdrkke" + no + " tooltip-span'>" + nama_drk +
            "</span><input type='text' name='nama_drk[]' class='form-control inp-nama_drk nmdrkke" + no +
            " hidden'  value='" + nama_drk + "' readonly ></td>";

        input +=
            "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#jurnal-grid tbody').append(input);
        $('.dcke' + no).selectize({
            selectOnTab: true,
            onChange: function (value) {
                $('.tddcke' + no).text(value);

            }
        });
        $('.dcke' + no)[0].selectize.setValue(dc);
        $('.selectize-control.dcke' + no).addClass('hidden');
        $('.nilke' + no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {
                self.Value('');
            }
        });
        hideUnselectedRowJurnal();
        $('.tooltip-span').tooltip({
            title: function () {
                return $(this).text();
            }
        });
        hitungTotalRowJurnal();
    }

    function custTarget(target, tr) {
        $(target).parents("tr").find(".inp-pp").val(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".td-pp").text(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".inp-pp").hide();
        $(target).parents("tr").find(".td-pp").show();
        $(target).parents("tr").find(".search-pp").hide();
        $(target).parents("tr").find(".inp-nama_pp").show();
        $(target).parents("tr").find(".td-nama_pp").hide();
        // $($target).parents("tr").find(".inp-nama_pp").attr('readonly',false);

        setTimeout(function () {
            $(target).parents("tr").find(".inp-nama_pp").focus();
        }, 100);
    }

    $('#form-tambah').on('click', '.add-row-jurnal', function () {
        addRowJurnal();
    });

    $('#jurnal-grid').on('click', '.hapus-item', function () {
        $(this).closest('tr').remove();
        no = 1;
        $('.row-jurnal').each(function () {
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotalRowJurnal();
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
    });



    $('#jurnal-grid tbody').on('click', 'tr', function () {
        $(this).addClass('selected-row');
        $('#jurnal-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowJurnal();
    });

    $('#jurnal-grid').on('click', 'td', function () {
        var idx = $(this).index();
        if (idx == 0) {
            return false;
        } else {
            if ($(this).hasClass('px-0 py-0 aktif')) {
                return false;
            } else {
                $('#jurnal-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var dc = $(this).parents("tr").find(".td-dc").text();
                var keterangan = $(this).parents("tr").find(".inp-ket").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var kode_pp = $(this).parents("tr").find(".inp-pp").val();
                var nama_pp = $(this).parents("tr").find(".inp-nama_pp").val();
                var kode_drk = $(this).parents("tr").find(".inp-drk").val();
                var nama_drk = $(this).parents("tr").find(".inp-nama_drk").val();
                var no = $(this).parents("tr").find(".no-jurnal").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if (idx == 1) {
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                } else {
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-akun").hide();

                }

                $(this).parents("tr").find(".inp-nama").val(nama_akun);
                $(this).parents("tr").find(".td-nama").text(nama_akun);
                if (idx == 2) {
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                } else {

                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }


                $(this).parents("tr").find(".inp-dc")[0].selectize.setValue(dc);
                $(this).parents("tr").find(".td-dc").text(dc);
                if (idx == 3) {
                    $('.dcke' + no)[0].selectize.setValue(dc);
                    var dcx = $('.tddcke' + no).text();
                    if (dcx == "") {
                        $('.tddcke' + no).text('D');
                    }

                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-dc").hide();
                    $(this).parents("tr").find(".inp-dc")[0].selectize.focus();

                } else {

                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-dc").show();
                }

                var idx_tr = $(this).closest('tr').index();
                if (keterangan == "" && idx == 4) {
                    if (idx_tr == 0) {
                        var deskripsi = $('#deskripsi').val();
                    } else {
                        var deskripsi = $("#jurnal-grid tbody tr:eq(" + (idx_tr - 1) + ")").find('.inp-ket')
                            .val();
                    }
                    $(this).parents("tr").find(".inp-ket").val(deskripsi);
                    $(this).parents("tr").find(".td-ket").text(deskripsi);
                } else {

                    $(this).parents("tr").find(".inp-ket").val(keterangan);
                    $(this).parents("tr").find(".td-ket").text(keterangan);
                }
                if (idx == 4) {
                    $(this).parents("tr").find(".inp-ket").show();
                    $(this).parents("tr").find(".td-ket").hide();
                    $(this).parents("tr").find(".inp-ket").focus();
                } else {
                    $(this).parents("tr").find(".inp-ket").hide();
                    $(this).parents("tr").find(".td-ket").show();
                }

                if (nilai == "" && idx == 5) {
                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                } else {
                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                }

                if (idx == 5) {
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                } else {
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }

                $(this).parents("tr").find(".inp-pp").val(kode_pp);
                $(this).parents("tr").find(".td-pp").text(kode_pp);
                if (idx == 6) {
                    $(this).parents("tr").find(".inp-pp").show();
                    $(this).parents("tr").find(".td-pp").hide();
                    $(this).parents("tr").find(".search-pp").show();
                    $(this).parents("tr").find(".inp-pp").focus();
                } else {

                    $(this).parents("tr").find(".inp-pp").hide();
                    $(this).parents("tr").find(".td-pp").show();
                    $(this).parents("tr").find(".search-pp").hide();
                }


                $(this).parents("tr").find(".inp-nama_pp").val(nama_pp);
                $(this).parents("tr").find(".td-nama_pp").text(nama_pp);
                if (idx == 7) {

                    $(this).parents("tr").find(".inp-nama_pp").show();
                    $(this).parents("tr").find(".td-nama_pp").hide();
                    $(this).parents("tr").find(".inp-nama_pp").focus();
                } else {

                    $(this).parents("tr").find(".inp-nama_pp").hide();
                    $(this).parents("tr").find(".td-nama_pp").show();
                }
                $(this).parents("tr").find(".inp-drk").val(kode_drk);
                $(this).parents("tr").find(".td-drk").text(kode_drk);
                if (idx == 8) {
                    $(this).parents("tr").find(".inp-drk").show();
                    $(this).parents("tr").find(".td-drk").hide();
                    $(this).parents("tr").find(".search-drk").show();
                    $(this).parents("tr").find(".inp-drk").focus();
                } else {

                    $(this).parents("tr").find(".inp-drk").hide();
                    $(this).parents("tr").find(".td-drk").show();
                    $(this).parents("tr").find(".search-drk").hide();
                }
                $(this).parents("tr").find(".inp-nama_drk").val(nama_drk);
                $(this).parents("tr").find(".td-nama_drk").text(nama_drk);
                if (idx == 9) {
                    $(this).parents("tr").find(".inp-nama_drk").show();
                    $(this).parents("tr").find(".td-nama_drk").hide();
                    $(this).parents("tr").find(".inp-nama_drk").focus();
                } else {

                    $(this).parents("tr").find(".inp-nama_drk").hide();
                    $(this).parents("tr").find(".td-nama_drk").show();
                }
            }
        }
    });
    $('#jurnal-grid').on('click', '.search-item', function () {
        var par = $(this).closest('td').find('input').attr('name');

        switch (par) {
            case 'kode_akun[]':
                var par2 = "nama_akun[]";

                break;
            case 'kode_pp[]':
                var par2 = "nama_pp[]";
                break;
            case 'kode_drk[]':
                var par2 = "nama_drk[]";
                break;
        }

        var tmp = $(this).closest('tr').find('input[name="' + par + '"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="' + par2 + '"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        switch (par) {
            case 'kode_akun[]':
                var options = {
                    id: par,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/akun') }}",
                    columns: [{
                            data: 'kode_akun'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar Akun",
                    pilih: "akun",
                    jTarget1: "val",
                    jTarget2: "val",
                    target1: "." + target1,
                    target2: "." + target2,
                    target3: ".td" + target2,
                    target4: ".td-dc",
                    width: ["30%", "70%"]
                };
                break;
            case 'kode_pp[]':
                var options = {
                    id: par,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/pp') }}",
                    columns: [{
                            data: 'kode_pp'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar PP",
                    pilih: "pp",
                    jTarget1: "val",
                    jTarget2: "val",
                    target1: "." + target1,
                    target2: "." + target2,
                    target3: ".td" + target2,
                    target4: "custom",
                    width: ["30%", "70%"]
                };
                break;
            case 'kode_drk[]':
                var parent = $(this).closest("tr");
                var kode_akun = parent.find('.inp-kode').val()
                var kode_pp = parent.find('.inp-pp').val()
                var tanggal = $('#form-tambah').find('.inp-tanggal').val();
                var revers = reverseDate2(tanggal, '/', '');
                var periode = revers.substring(0, 6);
                var options = {
                    id: par,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/drk') }}",
                    columns: [{
                            data: 'kode_drk'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    parameter: {
                        periode: periode,
                        kode_akun: kode_akun,
                        kode_pp: kode_pp
                    },
                    judul: "Daftar DRK",
                    pilih: "pp",
                    jTarget1: "val",
                    jTarget2: "val",
                    target1: "." + target1,
                    target2: "." + target2,
                    target3: ".td" + target2,
                    target4: "custom",
                    width: ["30%", "70%"]
                };
                break;
        }
        showInpFilterBSheet(options);

    });
    // END Jurnal Grid

    function hitungTotalSpb() {
        var totalSpb = 0;
        var totalProg = 0;
        $('#pb-grid tbody tr').each(function (index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            var status = $(this).find('.inp-status').val();

            if (status == "SPB") {
                totalSpb += nilai;
            } else {
                totalProg += nilai;
            }
        });

        $('#totalSpb').val(totalSpb);
        // $('#totalProg').val(totalProg);
    }


    function hitungTotalRowUpload(form) {
        var total_row = $('#' + form + ' #input-dok tbody tr').length;
        $('#total-row_dok').html(total_row + ' Baris');
    }

    function addRowDok(form) {
        var no = $('#' + form + ' #input-dok .row-dok:last').index();
        no = no + 2;
        console.log(no);
        var input = "";
        input += "<tr class='row-dok'>";
        input += "<td class='no-dok text-center'>" + no + "</td>";
        input +=
            "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='jenis[]' class='form-control inp-jenis jeniske" +
            no + " ' value='' required='' style='z-index: 1;' id='jeniskode" + no +
            "'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
        input +=
            "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke" +
            no + "' value='' readonly></td>";
        input += "<td><span class='td-nama_file tdnmfileke" + no +
            " tooltip-span'>-</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke" +
            no + " hidden'  value='-' readonly></td>";
        input += `
        <td>
        <input type='file' name='file_dok[]'>
        <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='` + no + `'>
        </td>`;
        input +=
            `
        <td class='text-center action-dok'><a class='hapus-dok2'><i class='simple-icon-trash' style='font-size:18px'></i></a></td></tr>`;
        console.log(form);
        $('#' + form + ' #input-dok tbody').append(input);
        hitungTotalRowUpload(form);
    }
    $('#form-tambah').on('click', '.add-row-dok', function () {
        addRowDok("form-tambah");
    });
    $('#form-tambah').on('click', '.hapus-dok2', function () {
        valid = true
        $(this).closest('tr').remove();
        no = 1;
        $('.row-dok').each(function () {
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        hitungTotalRowJurnal();
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
    });


    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();

            $("#pemberi-grid tbody tr td:not(:first-child):not(:last-child)").each(function () {
                if ($(this).find('span').text().trim().length == 0) {
                    console.log($(this).find('span').text().length)
                    alert('Data pemberi tidak boleh kosong, harap dihapus untuk melanjutkan')
                    valid = false;
                    return false;
                }
            });

            var parameter = $('#id_edit').val();
            var id = $('#id').val();

            if (parameter == "edit") {
                var url = "{{ url('esaku-trans/ptg-beban-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data " + id + " telah tersimpan";
            } else {
                var url = "{{ url('bdh-trans/ptg-beban') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            $('#pemberi-grid tbody tr').each(function (index) {
                formData.append('no_pemberi[]', $(this).find('.no-pemberi').text())
            })
            formData.append('donor', $totalPemberi)

            if (parameter == "edit") {
                formData.append('no_bukti', id)
            }
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            if (valid) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: formData,
                    async: false,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (result) {
                        if (result.data.success.status) {
                            dataTable.ajax.reload();
                            $('#row-id').hide();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('[id^=label]').html('');
                            $('#id_edit').val('');
                            $('#judul-form').html('Pengajuan RRA Anggaran');
                            $('#method').val('post');
                            resetForm();
                            msgDialog({
                                id: result.data.success.no_bukti,
                                type: 'simpan'
                            });
                            last_add("no_pdrk", result.data.success.no_bukti);
                        } else if (!result.data.success.status && result.data.success
                            .message === "Unauthorized") {
                            window.location.href =
                                "{{ url('/esaku-auth/sesi-habis') }}";
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>' + result.data.success.message +
                                    '</a>'
                            })
                        }
                    },
                    fail: function (xhr, textStatus, errorThrown) {
                        alert('request failed:' + textStatus);
                    }
                });
                $('#btn-simpan').html("Simpan").removeAttr('disabled');
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for=" + id + "]").append("<br/>");
            $("label[for=" + id + "]").append(error);
        }
    });

    function editData(id) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/pengajuan-rra-detail') }}",
            data: {
                kode: id
            },
            dataType: 'json',
            async: false,
            success: function (res) {
                var result = res.data.success;
                if (result.status) {
                    var tanggal = result.data[0].tanggal.split(' ')
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#tanggal').val(tanggal[0])
                    $('#id').val(id)
                    $('#no_dok').val(result.data[0].no_dokumen);
                    $('#id').val(id);
                    $('#keterangan').val(result.data[0].keterangan)
                    filterNikApprove(result.data[0].nik_app3)
                    filterPPPenerima(result.detail_penerima[0].kode_pp)
                    filterDrkPenerima(result.detail_penerima[0].kode_pp)
                    filterAkunPenerima(result.detail_penerima[0].kode_akun)
                    $('#bulan_penerima').val(result.detail_penerima[0].bulan)
                    $('#nilai_penerima').val(parseInt(result.detail_penerima[0].nilai))
                    if (result.detail_pemberi.length > 0) {
                        var html = "";
                        var no = 1;
                        for (var i = 0; i < result.detail_pemberi.length; i++) {
                            $totalPemberi = 0
                            var data = result.detail_pemberi[i]
                            $totalPemberi += parseInt(data.nilai)
                            var string = data.kode_akun + '-' + data.nama_akun
                            if (string.length > 30) {
                                string = string.substr(0, 30) + '...'
                            }
                            html += "<tr class='row-pemberi row-pemberi-" + no + "'>"
                            html += "<td class='no-pemberi text-center hidden'>" + no + "</td>"
                            html += "<td><div>"
                            html += "<span class='td-anggaran tdanggaranke" + no + " tooltip-span'>" +
                                string + "</span>"
                            html +=
                                "<input autocomplete='off' type='text' name='anggaran[]' class='inp-anggaran anggaranke" +
                                no + " form-control hidden' value='" + data.kode_akun + "-" + data
                                .nama_akun +
                                "' required='' style='z-index: 1;position: relative;' id='anggarankode" +
                                no +
                                "'><a href='#' class='search-item search-anggaran hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-pp tdppke" + no + " tooltip-span'>" + data.kode_pp +
                                "-" + data.nama_pp + "</span>"
                            html += "<input autocomplete='off' type='text' name='pp[]' class='inp-pp ppke" +
                                no + " form-control hidden' value='" + data.kode_pp + "-" + data.nama_pp +
                                "' required='' style='z-index: 1;position: relative;' id='ppkode" + no +
                                "'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-drk tddrkke" + no + " tooltip-span'>" + data.kode_pp +
                                "-" + data.nama_pp + "</span>"
                            html +=
                                "<input autocomplete='off' type='text' name='drk[]' class='inp-drk drkke" +
                                no + " form-control hidden' value='" + data.kode_pp + "-" + data.nama_pp +
                                "' required='' style='z-index: 1;position: relative;' id='drkkode" + no +
                                "'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td class='text-center'><div>"
                            html += "<span class='td-bulan tdbulanke" + no + " tooltip-span'>" + data
                                .bulan + "</span>"
                            html += "<select class='hidden form-control inp-bulan bulanke" + no +
                                "' name='bulan[]'>"
                            html +=
                                "<option value='01' selected>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>"
                            html += "</select>"
                            html += "</div></td>"
                            html += "<td class='text-right'><div>"
                            html += "<span class='td-saldo tdsaldoke" + no + "'>0</span>"
                            html +=
                                "<input type='text' name='saldo[]' class='inp-saldo form-control saldoke" +
                                no + " hidden currency'  value='0' required>"
                            html += "</div></td>"
                            html += "<td class='text-right'>"
                            html += "<span class='td-nilai tdnilaike" + no + "'>" + format_number(data
                                .nilai) + "</span>"
                            html +=
                                "<input type='text' name='nilai[]' class='inp-nilai form-control nilaike" +
                                no + " hidden currency'  value='" + parseInt(data.nilai) + "' required>"
                            html += "</td>"
                            html +=
                                "<td class='text-center'><a class='hapus-pemberi' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            html += "</tr>"

                            no++;
                        }

                        $('#pemberi-grid tbody').append(html);


                        var no = 1;
                        for (var i = 0; i < result.detail_pemberi.length; i++) {
                            var data = result.detail_pemberi[i]
                            $('.bulanke' + no).val(data.bulan)
                            no++;
                        }

                        $('.currency').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () {}
                        });

                        $('.tooltip-span').tooltip({
                            title: function () {
                                return $(this).text();
                            }
                        });

                        $('.inp-anggaran').typeahead({
                            source: $mataAnggaran,
                            displayText: function (item) {
                                return item.id + '-' + item.name;
                            },
                            autoSelect: false,
                            changeInputOnSelect: false,
                            changeInputOnMove: false,
                            selectOnBlur: false,
                            afterSelect: function (item) {
                                console.log(item.id);
                            }
                        });

                        $('.inp-pp').typeahead({
                            source: $ppAnggaran,
                            displayText: function (item) {
                                return item.id + '-' + item.name;
                            },
                            autoSelect: false,
                            changeInputOnSelect: false,
                            changeInputOnMove: false,
                            selectOnBlur: false,
                            afterSelect: function (item) {
                                console.log(item.id);
                            }
                        });

                        $('.inp-drk').typeahead({
                            source: $ppAnggaran,
                            displayText: function (item) {
                                return item.id + '-' + item.name;
                            },
                            autoSelect: false,
                            changeInputOnSelect: false,
                            changeInputOnMove: false,
                            selectOnBlur: false,
                            afterSelect: function (item) {
                                console.log(item.id);
                            }
                        });

                        $('.inp-nilai').on('change', function () {
                            hitungTotalPemberi()
                        })

                        hitungTotalRowPemberi()
                    }

                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                } else if (!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function () {
        var id = $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();

        $('#btn-save').attr('type', 'button');
        $('#btn-save').attr('id', 'btn-update');

        $('#judul-form').html('Pengajuan RRA Anggaran');
        editData(id);
    });

    function hapusData(id) {
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/pengajuan-rra') }}",
            data: {
                kode: id
            },
            dataType: 'json',
            async: false,
            success: function (result) {
                if (result.data.success.status) {
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success", 'Hapus Data', 'Data Pengajuan RRA (' + id +
                        ') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                } else if (!result.data.success.status && result.data.success.message == "Unauthorized") {
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>' + result.data.success.message + '</a>'
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

</script>
