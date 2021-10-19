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

    .vertical-timeline {
        width: 100%;
        position: relative;
        padding: 1.5rem 0 1rem
    }

    .vertical-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 67px;
        height: 100%;
        width: 4px;
        background: #e9ecef;
        border-radius: .25rem
    }

    .vertical-timeline-element {
        position: relative;
        margin: 0 0 1rem
    }

    .vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
        visibility: visible;
        animation: cd-bounce-1 .8s
    }

    .vertical-timeline-element-icon {
        position: absolute;
        top: 0;
        left: 60px
    }

    .vertical-timeline-element-icon .badge-dot-xl {
        box-shadow: 0 0 0 5px #fff
    }

    .badge-dot-xl {
        width: 18px;
        height: 18px;
        position: relative
    }

    .badge:empty {
        display: none
    }

    .badge-dot-xl::before {
        content: '';
        width: 10px;
        height: 10px;
        border-radius: .25rem;
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -5px 0 0 -5px;
        background: #fff
    }

    .vertical-timeline-element-content {
        position: relative;
        margin-left: 90px;
        font-size: .8rem
    }

    .vertical-timeline-element-content .timeline-title {
        font-size: .8rem;
        text-transform: uppercase;
        margin: 0 0 .5rem;
        padding: 2px 0 0;
        font-weight: bold
    }

    .vertical-timeline-element-content .vertical-timeline-element-date {
        display: block;
        position: absolute;
        left: -90px;
        top: 0;
        padding-right: 10px;
        text-align: right;
        color: #adb5bd;
        font-size: .7619rem;
        white-space: nowrap
    }

    .vertical-timeline-element-content:after {
        content: "";
        display: table;
        clear: both
    }

</style>

{{-- FILTER AREA --}}
<div class="row mb-4" id="form-filter">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                <h6 id="judul-page" style="position:absolute;top:25px">Filter Data</h6>
            </div>
            <div class="separator mb-2"></div>
            <div class="card-body pt-3">
                <div class="form-group col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mt-2 mb-2">
                            <label for="no_pb_aju">No PBAju</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_no_pb_aju" readonly="readonly" title=""
                                        data-toggle="tooltip" data-placement="top"></span>
                                </div>
                                <input type="text" class="form-control inp-label-no_pb_aju" id="no_pb_aju"
                                    name="no_pb_aju" value="" title="" readonly>
                                <span class="info-name_no_pb_aju hidden">
                                    <span></span>
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_no_pb_aju"></i>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-2">
                            <button type="button" class="btn btn-primary mt-4 btn-proses">Proses</button>
                            <button type="button" class="btn btn-red mt-4 btn-reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END FILTER AREA --}}


<!-- LIST DATA -->
<x-list-data judul="Daftar Bukti" tambah=""
    :thead="array('Modul','No Bukti','No App','Deskripsi','Nilai','Status','Aksi')"
    :thwidth="array(15,15,15,35,15,15,10)" :thclass="array('','','','','','text-center','text-center')" />
<!-- END LIST DATA -->



{{-- form data --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="tanggal" name="tanggal">
    <div class="row" id="saku-form" style="display: none">
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
                                <input type="hidden" name="modul" id="modul">
                                <input type="hidden" name="kode_pp_aju" id="kode_pp">
                                <div class="col-md-6 col-sm-12">

                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal"
                                        name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;"
                                        class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="APPROVE">APPROVE</option>
                                        <option value="RETURN">RETURN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="deskripsi">Catatan</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi"
                                        required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_bukti">No Bukti</label>
                                    <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti"
                                        readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_dokumen">No Dokumen</label>
                                    <input type="text" name="no_dokumen" id="no_dokumen"
                                        class="form-control inp-no_dokumen" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="total_jurnal">Total Jurnal</label>
                                    <input class="form-control currency" type="text" placeholder="Total Jurnal" readonly
                                        id="total_jurnal" name="total_jurnal" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tgl_bukti">Tanggal Bukti</label>
                                    <input type="text" name="tgl_bukti" id="tgl_bukti" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="pp_unit">PP / Unit</label>
                                    <input type="text" name="pp_unit" id="pp_unit" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="total_net_rek">Total Rekening</label>
                                    <input class="form-control currency" type="text" placeholder="Total Kredit" readonly
                                        id="total_net_rek" name="total_net_rek" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="due_date">Due Date</label>
                                    <input type="text" name="due_date" id="due_date" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="deskripsi_m">Deskripsi</label>
                                    <input type="text" name="deskripsi_m" id="deskripsi_m" class="form-control"
                                        readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="pembuat_m">Pembuat</label>
                                    <input class="form-control" type="text" readonly id="pembuat_m" name="pembuat_m">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-rekening" role="tab"
                                aria-selected="true">
                                <span>Data Rekening</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-jurnal" role="tab" aria-selected="true">
                                <span>Data Jurnal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-catatan" role="tab" aria-selected="true">
                                <span>Catatan Verfikator</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true">
                                <span>File Dokumen</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-pajak" role="tab" aria-selected="true">
                                <span>Item Pajak</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-rekening" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                        class=""><span
                                            style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                            id="total-row-rekening"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="rekening-grid"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:15%" class="text-center">Atensi</th>
                                            <th style="width:15%">Bank</th>
                                            <th style="width:15%">Nama Rekening</th>
                                            <th style="width:15%">No Rekening</th>
                                            <th style="width:15%">Bruto</th>
                                            <th style="width:15%">Potongan</th>
                                            <th style="width:15%">Netto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-jurnal" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                        class=""><span
                                            style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                            id="total-row-jurnal"></span></a>
                                </div>
                                <table class="table table-bordered table-condensed gridexample" id="jurnal-grid"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:13%">Kode Akun</th>
                                            <th style="width:15%">Nama Akun</th>
                                            <th style="width:5%">DC</th>
                                            <th style="width:20%">Keterangan</th>
                                            <th class='text-right' style="width:15%">Nilai</th>
                                            <th style="width:13%">Kode PP</th>
                                            <th style="width:15%">Nama PP</th>
                                            <th style="width:13%">Kode DRK</th>
                                            <th style="width:17%">Nama DRK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-catatan" role="tabpanel">
                        </div>
                        <div class="tab-pane" id="data-dok" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                        class=""><span
                                            style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                            id="total-row-dok"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="input-dok"
                                    style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:15%" class="text-center">Kode Jenis</th>
                                            <th style="width:15%">Nama Jenis</th>
                                            <th style="width:25%">Path File</th>
                                            <th style="width:25%">Upload File</th>
                                            <th style="width:5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row-dok"
                                    class="add-row-dok btn btn-light2 btn-block btn-sm">
                                    Tambah Baris</a>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-pajak" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;"
                                        class=""><span
                                            style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;"
                                            id="total-row-dok-check"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="pajak-grid"
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
                                    class="add-row-pajak btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action"></div>

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
{{-- end form data --}}


<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
@include('modal_search')
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}">
</script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;
    var valid = true;

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

    function format_number(x) {
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function resetForm() {
        $('#jurnal-grid tbody').empty();
        $('#dok-grid tbody').empty();
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

    // LIST DATA
    var action_html =
        "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('bdh-trans/ver-pajak') }}",
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
                data: 'modul'
            },
            {
                data: 'no_bukti'
            },
            {
                data: null,
                defaultContent: '-'
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
                data: 'status',
                className: 'text-center'
            },

        ],
        "{{ url('bdh-auth/sesi-habis') }}",
        [
            [4, "desc"]
        ]
    );

    $.fn.DataTable.ext.pager.numbers_length = 6;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA

    // Event Button Tambah Data
    $('#saku-datatable').on('click', '#btn-tambah', function () {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Approval Droping Dana');
        $('#btn-update').attr('id', 'btn-save');
        $('#btn-save').attr('type', 'submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#id_edit').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-filter').hide();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').val('')
        $('[class*=inp-label-]').attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important'
        );
    });

    // Event Button Kembali (Cancel)
    $('#saku-form').on('click', '#btn-kembali', function () {
        var kode = null;
        msgDialog({
            id: kode,
            type: 'keluar'
        });

    });


    $('#saku-datatable').on('click', '#btn-delete', function (e) {
        var id = $(this).closest('tr').find('td').eq(0).html();
        console.log(id);
        msgDialog({
            id: id,
            type: 'hapus'
        });
    });

    // CBBL Form
    $('#form-tambah').on('click', '.search-item2', function () {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'akun_mutasi':
                var settings = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/droping-app-akun-mutasi') }}",
                    columns: [{
                            data: 'kode_akun'
                        },
                        {
                            data: 'nama'
                        }
                    ],
                    judul: "Daftar Akun Mutasi",
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
    // EMD CBBL

    // CBBL FILTER
    $('#form-filter').on('click', '.search-item2', function () {
        var id = $(this).closest('div').find('input').attr('name');
        switch (id) {
            case 'no_pb_aju':
                var settings = {
                    id: id,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/droping-app-aju') }}",
                    columns: [{
                            data: 'no_minta'
                        },
                        {
                            data: 'keterangan'
                        }
                    ],
                    judul: "Daftar PB Aju",
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
    // EMD CBBL FILTER

    // STAR BTN PROSES FILTER
    $('#form-filter').on('click', '.btn-proses', function (e) {
        e.preventDefault();
        var pb_aju = $('#no_pb_aju').val();
        if (pb_aju == '' || pb_aju == undefined) {
            alert('No Pb Aju Harus di isi !.');
            return false
        } else {
            console.log('BTN PROSES ' + pb_aju);
            load_filter(pb_aju);
        }
    });
    // END BTN PROSES FILTER

    function load_filter(id) {
        var action_html =
            "<a href='#' title='Edit' id='btn-edit2'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
        generateTable(
            "table-data",
            "{{ url('bdh-trans/droping-app') }}/" + id,
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
                    data: 'modul'
                },
                {
                    data: 'no_bukti'
                },
                {
                    data: 'no_app'
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
                    data: 'status',
                    className: 'text-center'
                },

            ],
            "{{ url('bdh-auth/sesi-habis') }}",
            [
                [4, "desc"]
            ]
        );
    }

    // event btn edit
    $('#saku-datatable').on('click', '#btn-edit', function (e) {
        var id = $(this).closest('tr').find('td').eq(1).html();
        console.log('btn-edit ' + id);
        $('#jurnal-grid tbody').empty();
        $('#dok-grid tbody').empty();
        $.ajax({
            type: 'GET',
            url: '{{ url("bdh-trans/ver-pajak-detail") }}',
            data: {
                no_aju: id
            },
            dataType: 'JSON',
            success: function (res) {
                var data = res.daftar;
                var data_m = data.data;
                var data_jurnal = data.detail_jurnal;
                var data_dok = data.detail_dok;
                var data_rek = data.detail_rek;
                var data_catatan = data.detail_catatan;
                // $('#form-tambah #status').val(data_m[0].status);
                $('#form-tambah #no_bukti').val(data_m[0].no_bukti);
                $('#form-tambah #no_dokumen').val(data_m[0].no_dokumen);
                $('#form-tambah #tgl_bukti').val(data_m[0].tgl);
                $('#form-tambah #pp_unit').val(data_m[0].pp);
                $('#form-tambah #due_date').val(data_m[0].tgl2);
                $('#form-tambah #deskripsi_m').val(data_m[0].keterangan);
                $('#form-tambah #pembuat_m').val(data_m[0].pembuat);
                $("textarea#deskripsi").val(data.memo);
                $("#form-tambah #modul").val(data_m[0].modul);
                $("#form-tambah #kode_pp").val(data_m[0].kode_pp);
                $("#form-tambah #lokasi").val(data_m[0].kode_lokasi);
                html = '';
                no = 1;
                var no_dok = 1;
                var html_dok = '';
                var html_catatan = '';
                var html_jurnal = '';
                for (let i = 0; i < data_rek.length; i++) {
                    var netto = parseFloat(data_rek[i].bruto) - parseFloat(data_rek[i].pajak);
                    html += "<tr class='row-atensi row-atensi-" + no + "'>"

                    html += "<td><span class='td-atensi tdatensike" + no + "'>" + data_rek[i]
                        .nama +
                        "</span>"

                    html +=
                        "<input type='text' name='atensi[]' class='inp-atensi form-control atensike" +
                        no +
                        " hidden'  value='" + data_rek[i].nama + "' required readonly>"
                    html += "</td>"

                    html += "<td><span class='td-cabang_bank tdcabang_bankke" + no + "'>" +
                        data_rek[i].bank + "</span>"
                    html +=
                        "<input type='text' name='bank[]' class='inp-cabang_bank form-control cabang_bankke" +
                        no +
                        " hidden'  value='" + data_rek[i].bank + "' required readonly>"
                    html += "</td>"

                    html += "<td><span class='td-nama_rek tdnama_rekke" + no + "'>" + data_rek[i]
                        .nama_rek + "</span>"
                    html +=
                        "<input type='text' name='nama_rek[]' class='inp-nama_rek form-control nama_rekke" +
                        no +
                        " hidden'  value='" + data_rek[i].nama_rek + "' required readonly>"
                    html += "</td>"

                    html += "<td><span class='td-no_rek tdno_rekke" + no + "'>" + data_rek[i]
                        .no_rek + "</span>"
                    html +=
                        "<input type='text' name='no_rek[]' class='inp-no_rek form-control no_rekke" +
                        no +
                        " hidden'  value='" + data_rek[i].no_rek + "' required readonly>"
                    html += "</td>"

                    html += "<td class='form-calc'><span class='td-bruto tdbrutoke" + no +
                        "'>" + format_number(data_rek[i].bruto) + "</span>"
                    html +=
                        "<input type='text' name='bruto[]' class='inp-bruto form-control brutoke" +
                        no +
                        " currency hidden'  value='" + format_number(data_rek[i].bruto) +
                        "' required readonly>"
                    html += "</td>"

                    html += "<td class='form-calc'><span class='td-potongan tdpotonganke" + no +
                        "'>" + format_number(data_rek[i].pajak) + "</span>"
                    html +=
                        "<input type='text' name='potongan[]' class='inp-potongan form-control potonganke" +
                        no +
                        " currency hidden'  value='" + format_number(data_rek[i].pajak) +
                        "' required>"
                    html += "</td>"

                    html += "<td><span class='td-netto tdnettoke" + no + "'>" + format_number(
                        netto) + "</span>"
                    html +=
                        "<input type='text' name='netto[]' class='inp-netto form-control nettoke" +
                        no +
                        " currency hidden'  value='" + format_number(netto) + "' readonly required>"
                    html += "</td>"

                    html += "</tr>"

                    $('.tooltip-span').tooltip({
                        title: function () {
                            return $(this).text();
                        }
                    });
                    hideUnselectedRowAtensi()
                    hitungTotalRowAtensi()
                    no++;
                }
                no_jurnal = 1;
                for (let i = 0; i < data_jurnal.length; i++) {
                    html_jurnal += `<tr>
                            <td>` + no_jurnal + `</td>
                            <td>
                                ` + data_jurnal[i].kode_akun + `
                                <input type='hidden' name='kode_akun_jurnal[]' value='` + data_jurnal[i].kode_akun + `'>
                            </td>
                            <td>
                                ` + data_jurnal[i].nama_akun + `
                                <input type='hidden' name='nama_akun_jurnal[]' value='` + data_jurnal[i].nama_akun + `'>
                            </td>
                            <td>
                                ` + data_jurnal[i].dc + `
                                <input type='hidden' name='dc_jurnal[]' value='` + data_jurnal[i].dc + `'>
                            </td>
                            <td>
                                ` + data_jurnal[i].keterangan + `
                                <input type='hidden' name='keterangan_jurnal[]' value='` + data_jurnal[i].keterangan + `'>
                            </td>
                            <td class='text-right'>
                                ` + format_number(data_jurnal[i].nilai) + `
                                <input type='hidden' name='nilai_jurnal[]' value='` + data_jurnal[i].nilai + `'>
                            </td>
                            <td>
                                ` + data_jurnal[i].kode_pp + `
                                <input type='hidden' name='kode_pp_jurnal[]' value='` + data_jurnal[i].kode_pp + `'>
                            </td>
                            <td>
                                ` + data_jurnal[i].nama_pp + `
                                <input type='hidden' name='nama_pp_jurnal[]' value='` + data_jurnal[i].nama_pp + `'>
                            </td>
                            <td>
                                ` + data_jurnal[i].kode_drk + `
                                <input type='hidden' name='kode_drk_jurnal[]' value='` + data_jurnal[i].kode_drk + `'>
                            </td>
                            <td>
                                ` + data_jurnal[i].nama_drk + `
                                <input type='hidden' name='nama_drk_jurnal[]' value='` + data_jurnal[i].nama_drk + `'>
                            </td>
                        </tr>`;
                    no_jurnal++;
                }

                for (let r = 0; r < data_dok.length; r++) {
                    var dok =
                        "{{ config('api.url').'bdh-auth/storage' }}/" +
                        data_dok[r].no_gambar;
                    html_dok += `<tr>
                        <td>` + no_dok + `</td>
                        <td>` + data_dok[r].kode_jenis + `</td>
                        <td>` + data_dok[r].nama + `</td>
                        <td>` + data_dok[r].no_gambar + `</td>

                        <td class='text-center'>
                            <a href="` + dok + `" target='_blank' class="text-primary"><i class='simple-icon-cloud-download'></i></a>
                        </td>
                    </tr>`;
                    no_dok++;
                }
                for (let y = 0; y < data_catatan.length; y++) {
                    html_catatan += `<div class="row d-flex  mt-70 mb-70">
                                <div class="col-md-10">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h6 class="card-title text-danger">` + data_catatan[y].tgl +
                        `</h6>
                                            <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                <div class="vertical-timeline-item vertical-timeline-element">
                                                    <div> <span class="vertical-timeline-element-icon bounce-in"> <i class="badge badge-dot badge-dot-xl badge-success"></i> </span>`;
                    var detail_ctt = data_catatan[y].detail;
                    for (let q = 0; q < detail_ctt.length; q++) {
                        html_catatan += `<div class="vertical-timeline-element-content bounce-in">
                                                                <h6 class="timeline-title">` + detail_ctt[q].no_ver +
                            ' - [' + detail_ctt[q].nik_user + ']' + `</h6>
                                                                <p>` + detail_ctt[q].catatan +
                            `</p> <span class="vertical-timeline-element-date">` + detail_ctt[q]
                            .jam + `</span>
                                                            </div>`;
                    }
                    html_catatan += `</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;


                }
                $('#rekening-grid >tbody').html(html);
                $('#jurnal-grid tbody').append(html_jurnal);
                $('#input-dok >tbody').html(html_dok);
                $('#data-catatan').html(html_catatan);
                $('.currency').inputmask("numeric", {
                    radixPoint: ",",
                    groupSeparator: ".",
                    digits: 2,
                    autoGroup: true,
                    rightAlign: true,
                    oncleared: function () {}
                });
                hitungTotalNetRekening();
            }
        });

        $('#saku-datatable').hide();
        $('#form-filter').hide();
        $('#saku-form').show();
    });

    // event btn edit 2
    $('#saku-datatable').on('click', '#btn-edit2', function (e) {
        var id = $(this).closest('tr').find('td').eq(1).html();
        var id2 = $(this).closest('tr').find('td').eq(2).html();
        console.log('btn-edit ' + id + ' and ' + id2);
        $('#jurnal-grid tbody').empty();
        $('#dok-grid tbody').empty();
        $.ajax({
            type: 'GET',
            url: '{{ url("bdh-trans/droping-app-detail-edit") }}',
            data: {
                no_aju: id,
                no_app: id2
            },
            dataType: 'JSON',
            success: function (res) {
                var data = res.daftar;
                var data_m = data.data;
                var data_jurnal = data.data_detail;
                var data_dok = data.data_dok;
                var data_rek = data.data_rek;
                // $('#form-tambah #status').val(data_m[0].status);
                $('#id_edit').val('edit');
                $('#id').val(id);
                $('#method').val('post');
                $('#form-tambah #status').val(data_m[0].status);
                $('textarea#deskripsi').val(data_m[0].keterangan);
                $('#form-tambah #no_bukti').val(data_m[0].no_bukti);
                $('#form-tambah #no_dokumen').val(data_m[0].no_dokumen);
                $('#form-tambah #tgl_bukti').val(data_m[0].tgl);
                $('#form-tambah #pp_unit').val(data_m[0].pp);
                $('#form-tambah #due_date').val(data_m[0].tgl2);
                $('#form-tambah #deskripsi_m').val(data_m[0].keterangan);
                $('#form-tambah #pembuat_m').val(data_m[0].pembuat);
                $("textarea#deskripsi").val(data.memo);
                $("#form-tambah #modul").val(data_m[0].modul);
                $("#form-tambah #kode_pp").val(data_m[0].kode_pp);
                $("#form-tambah #lokasi").val(data_m[0].kode_lokasi);

                $('#form-tambah #bank').val(data_rek[0].bank);
                $('#form-tambah #no_rek').val(data_rek[0].no_rek);
                $('#form-tambah #nama_rek').val(data_rek[0].nama_rek);
                // showInfoField("akun_mutasi",data_rek[0].akun_kb,line1.nama_akun);
                for (let i = 0; i < data_jurnal.length; i++) {
                    var no = $('#jurnal-grid .row-jurnal:last').index();
                    no = no + 2;
                    var input = "";
                    input += "<tr class='row-jurnal'>";
                    input += "<td class='no-jurnal text-center'>" + no + "</td>";
                    input += "<td><span class='td-kode_akun tdnmakunke" + no + " tooltip-span'>" +
                        data_jurnal[i].kode_akun +
                        "</span><input type='text' name='kode_akun[]' class='form-control inp-kode_akun nmakunke" +
                        no + " hidden'  value='" + data_jurnal[i].kode_akun + "' readonly></td>";
                    input += "<td><span class='td-nama tdnmakunke" + no + " tooltip-span'>" +
                        data_jurnal[i].nama +
                        "</span><input type='text' name='nama[]' class='form-control inp-nama nmakunke" +
                        no + " hidden'  value='" + data_jurnal[i].nama + "' readonly></td>";
                    input += "<td><span class='td-ket tdketke" + no + " tooltip-span'>" +
                        data_jurnal[i].keterangan +
                        "</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke" +
                        no + " hidden'  value='" + data_jurnal[i].keterangan + "' required></td>";
                    input += "<td class='text-right'><span class='td-nilai_usul tdnilusulke" + no +
                        " tooltip-span'>" + format_number(data_jurnal[i].nilai_usul) +
                        "</span><input type='text' name='nilai_usul[]' class='form-control inp-nilai_usul nilke" +
                        no + " hidden'  value='" + format_number(data_jurnal[i].nilai_usul) +
                        "' required></td>";
                    input += "<td class='text-right'><span class='td-nilai_app tdnilappke" + no +
                        " tooltip-span'>" + format_number(data_jurnal[i].nilai_app) +
                        "</span><input type='text' name='nilai_app[]' class='form-control inp-nilai_app nilappke" +
                        no + " hidden'  value='" + format_number(data_jurnal[i].nilai_app) +
                        "' required></td>";
                    input += "<td><span class='td-nu tdnunke" + no + " tooltip-span'>" +
                        data_jurnal[i].nu +
                        "</span><input type='text' name='nu[]' class='form-control inp-nu nunke" +
                        no + " hidden'  value='" + data_jurnal[i].nu + "' readonly></td>";

                    input += "</tr>";
                }
                $('#jurnal-grid tbody').append(input);
                hideUnselectedRowJurnal();
                $('.tooltip-span').tooltip({
                    title: function () {
                        return $(this).text();
                    }
                });
                $('.nilappke' + no).inputmask("numeric", {
                    radixPoint: ",",
                    groupSeparator: ".",
                    digits: 2,
                    autoGroup: true,
                    rightAlign: true,
                    oncleared: function () {
                        self.Value('');
                    }
                });
                hitungTotalRowJurnal();
                hitungTotal();
                // jurnal grid edit

                var no_dok = 1;
                var html_dok = '';
                for (let r = 0; r < data_dok.length; r++) {
                    var dok =
                        "{{ config('api.url').'bdh-auth/storage' }}/" +
                        data_dok[r].no_gambar;
                    html_dok += `<tr>
                        <td>` + no_dok + `</td>
                        <td>` + data_dok[r].kode_jenis + `</td>
                        <td>` + data_dok[r].nama + `</td>
                        <td>` + data_dok[r].no_gambar + `</td>

                        <td class='text-center'>
                            <a href="` + dok + `" target='_blank' class="text-primary"><i class='simple-icon-cloud-download'></i></a>
                        </td>
                    </tr>`;
                    no_dok++;
                }
                $('#dok-grid >tbody').html(html_dok);

            }
        });

        $('#saku-datatable').hide();
        $('#form-filter').hide();
        $('#saku-form').show();
    });

    $('#jurnal-grid').on('change', '.inp-nilai_app', function (e) {
        console.log("HItung Total After Change");
        hitungTotal();
    });

    function hitungTotal() {
        var total_u = 0;
        var total_a = 0;
        $('.row-jurnal').each(function () {
            var total_usul = $(this).closest('tr').find('.inp-nilai_usul').val();
            var total_app = $(this).closest('tr').find('.inp-nilai_app').val();

            total_u = total_u + toNilai(total_usul);
            total_a = total_a + toNilai(total_app);
        });

        $('#form-tambah #total_usul').val(format_number(total_u));
        $('#form-tambah #total_approve').val(format_number(total_a));
    }
    // end event btn edit


    // BEGIN GRID PAJAK JURNAL
    function hitungTotalRowJurnal() {
        var total_row = $('#pajak-grid tbody tr').length;
        $('#total-row-pajak').html(total_row + ' Baris');
    }
    $('#pajak-grid').on('change', '.inp-nilai', function () {
        hitungTotalPajak();
    });

    function hitungTotalPajak() {
        var total_jurnal = 0;
        $('#pajak-grid tbody tr').each(function (index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            total_jurnal += +nilai;
        });

        $('#total_jurnal').val(total_jurnal);
    }

    function hideUnselectedRowJurnal() {
        $('#pajak-grid > tbody > tr').each(function (index, row) {
            if (!$(row).hasClass('selected-row')) {
                var kode_akun = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").val();
                var nama_akun = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").val();
                var dc = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-dc").text();
                var keterangan = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-ket").val();
                var nilai = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").val();
                var kode_pp = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-pp").val();
                var nama_pp = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_pp").val();
                var kode_drk = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-drk").val();
                var nama_drk = $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_drk")
                    .val();

                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").val(kode_akun);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-kode").text(kode_akun);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").val(nama_akun);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama").text(nama_akun);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-dc")[0].selectize.setValue(dc);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-dc").text(dc);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-ket").val(keterangan);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-ket").text(keterangan);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").val(nilai);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nilai").text(nilai);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-pp").val(kode_pp);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-pp").text(kode_pp);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_pp").val(nama_pp);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_pp").text(nama_pp);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-drk").val(kode_drk);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-drk").text(kode_drk);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_drk").val(nama_drk);
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_drk").text(nama_drk);

                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-kode").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-kode").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".search-akun").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".selectize-control").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-dc").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-ket").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-ket").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nilai").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nilai").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-pp").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-pp").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".search-pp").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_pp").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_pp").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-drk").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-drk").show();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".search-drk").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_drk").hide();
                $('#pajak-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_drk").show();
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

        var no = $('#pajak-grid .row-jurnal:last').index();
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
        $('#pajak-grid tbody').append(input);
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


    $('#form-tambah').on('click', '.add-row-pajak', function () {
        addRowJurnal();
    });

    $('#pajak-grid').on('click', '.hapus-item', function () {
        $(this).closest('tr').remove();
        no = 1;
        $('.row-jurnal').each(function () {
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotalRowJurnal();
        hitungTotalJurnal();
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 1000);
    });



    $('#pajak-grid tbody').on('click', 'tr', function () {
        $(this).addClass('selected-row');
        $('#pajak-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowJurnal();
    });

    $('#pajak-grid').on('click', 'td', function () {
        var idx = $(this).index();
        if (idx == 0) {
            return false;
        } else {
            if ($(this).hasClass('px-0 py-0 aktif')) {
                return false;
            } else {
                $('#pajak-grid td').removeClass('px-0 py-0 aktif');
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
    // CBBL GRID JURNAL PAJAK
    $('#pajak-grid').on('click', '.search-item', function () {
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
        console.log(target1)
        console.log(target2)
        switch (par) {
            case 'kode_akun[]':
                var options = {
                    id: par,
                    header: ['Kode', 'Nama'],
                    url: "{{ url('bdh-trans/ver-pajak-akun') }}",
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
                    url: "{{ url('bdh-trans/ver-pajak-pp') }}",
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
                    target4: "",
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

                if (kode_pp == '' || kode_akun == '') {
                    alert('Harap memilih Kode Akun dan Kode PP')
                    return false
                } else {
                    var options = {
                        id: par,
                        header: ['Kode', 'Nama'],
                        url: "{{ url('bdh-trans/ver-pajak-drk') }}",
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
                        pilih: "drk",
                        jTarget1: "val",
                        jTarget2: "val",
                        target1: "." + target1,
                        target2: "." + target2,
                        target3: ".td" + target2,
                        target4: "",
                        width: ["30%", "70%"]
                    };
                    break;
                }

        }
        showInpFilterBSheet(options);

    });
    // END JURNAL PAJAK GRID


    // GRID ATENSI
    function hitungTotalRowAtensi() {
        var total_row = $('#rekening-grid tbody tr').length;
        $('#total-row-atensi').html(total_row + ' Baris');
    }

    function hideUnselectedRowAtensi() {
        $('#rekening-grid > tbody > tr').each(function (index, row) {
            if (!$(row).hasClass('selected-row')) {
                var atensi = $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-atensi").val();
                var cabang_bank = $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(
                        ".inp-cabang_bank")
                    .val();
                var nama_rek = $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_rek")
                    .val();
                var no_rek = $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-no_rek").val();
                var bruto = $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-bruto").val();
                var potongan = $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-potongan")
                    .val();
                var netto = $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-netto").val();

                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-atensi").val(atensi);
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-atensi").text(atensi);
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-cabang_bank").val(
                    cabang_bank)
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-cabang_bank").text(
                    cabang_bank);
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_rek").val(nama_rek)
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_rek").text(nama_rek);
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-no_rek").val(no_rek)
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-no_rek").text(no_rek);
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-bruto").val(bruto)
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-bruto").text(bruto);
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-potongan").val(potongan)
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-potongan").text(potongan);
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-netto").val(netto)
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-netto").text(netto);

                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-atensi").hide();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-atensi").show();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-cabang_bank").hide();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-cabang_bank").show();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-nama_rek").hide();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-nama_rek").show();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-no_rek").hide();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-no_rek").show();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-bruto").hide();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-bruto").show();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-potongan").hide();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-potongan").show();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".inp-netto").hide();
                $('#rekening-grid > tbody > tr:eq(' + index + ') > td').find(".td-netto").show();
            }
        })
    }

    $('#rekening-grid tbody').on('click', 'tr', function () {
        $(this).addClass('selected-row');
        $('#rekening-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowAtensi();
    });

    $('#rekening-grid').on('click', 'td', function () {
        var idx = $(this).index();
        if (idx == 7) {
            return false;
        } else {
            if ($(this).hasClass('px-0 py-0 aktif')) {
                return false;
            } else {
                $('#rekening-grid td').removeClass('px-0 py-0 aktif');
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

    $('#form-tambah').on('click', '#add-row-atensi', function () {
        addRowAtensi()
    });

    $('#rekening-grid').on('click', '.hapus-atensi', function () {
        valid = true
        $(this).closest('tr').remove();
        no = 1;
        $('.row-atensi').each(function () {
            var nom = $(this).closest('tr').find('.no-atensi');
            nom.html(no);
            no++;
        });
        hitungTotalRowAtensi();
        hitungTotalNetRekening();
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

    $('#rekening-grid').on('change', '.inp-bruto', function () {
        hitungTotalNetRekening();
        console.log('kalkulasi1')
    });
    $('#rekening-grid').on('change', '.inp-potongan', function () {
        hitungTotalNetRekening();
        console.log('kalkulasi2')
    });

    function hitungTotalNetRekening() {
        var total_net_rek = 0;
        $('#rekening-grid tbody tr').each(function () {
            var nilai1 = $(this).closest('tr').find('.inp-bruto').val();
            var nilai2 = $(this).closest('tr').find('.inp-potongan').val();
            var nilai = toNilai(nilai1) - toNilai(nilai2);
            total_net_rek += +nilai;
        });
        console.log('TOTAL NET ' + total_net_rek)

        $('#total_net_rek').val(total_net_rek);
    }
    // END ATENSI GRID


    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            console.log('submit')
            var parameter = $('#id_edit').val();
            var id = $('#id').val();

            if (parameter == "edit") {
                var url = "{{ url('bdh-trans/ver-pajak-ubah') }}";
                var pesan = "updated";
                var method = 'POST';
                var text = "Perubahan data " + id + " telah tersimpan";
            } else {
                var url = "{{ url('bdh-trans/ver-pajak') }}";
                var method = 'POST';
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            // $('#pemberi-grid tbody tr').each(function(index) {
            //     formData.append('no_pemberi[]', $(this).find('.no-pemberi').text())
            // })


            // if(parameter == "edit") {
            //     formData.append('no_bukti', id)
            // }

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
                success: function (result) {
                    if (result.data.status) {
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('SPB');
                        $('#method').val('post');
                        resetForm();
                        msgDialog({
                            id: result.data.no_bukti,
                            type: 'simpan'
                        });
                        last_add("no_pdrk", result.data.no_bukti);
                    } else if (!result.data.status && result.data.message === "Unauthorized") {
                        window.location.href =
                            "{{ url('/bdh-auth/sesi-habis') }}";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>' + result.data.message + '</a>'
                        });
                    }
                },
                fail: function (xhr, textStatus, errorThrown) {
                    alert('request failed:' + textStatus);
                }
            });
            $('#btn-simpan').html("Simpan").removeAttr('disabled');

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for=" + id + "]").append("<br/>");
            $("label[for=" + id + "]").append(error);
        }
    });
    // Hapus Data
    function hapusData(id) {
        $.ajax({
            type: 'DELETE',
            url: "{{ url('bdh-trans/droping-app') }}",
            data: {
                no_aju: id.id,
                modul: id.modul,
                no_app: id.no_app
            },
            dataType: 'json',
            async: false,
            success: function (result) {
                var data = result;
                if (data.status) {
                    dataTable.ajax.reload();
                    resetForm();
                    showNotification("top", "center", "success", 'Hapus Data', 'Data Approval Droping (' +
                        id + ') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if (typeof M == 'undefined') {
                        $('#modal-delete').modal('hide');
                    } else {
                        $('#modal-delete').bootstrapMD('hide');
                    }
                } else if (!data.status && data.message == "Unauthorized") {
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                } else {
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: data.message
                    });
                }
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-delete', function (e) {
        var id = $(this).closest('tr').find('td').eq(1).html();
        var modul = $(this).closest('tr').find('td').eq(0).html();
        var no_app = $(this).closest('tr').find('td').eq(2).html();
        console.log(id);
        msgDialog({
            id: {
                id: id,
                modul: modul,
                no_app: no_app
            },
            type: 'hapus'
        });
    });

    $('#form-filter').on('click', '.btn-reset', function (e) {
        dataTable.ajax.reload();
        var par = $('.simple-icon-close').closest('div').find('input').attr('name');
        $('#' + par).val('');
        $('#' + par).attr('readonly', false);
        $('#' + par).attr('style',
            'border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_' + par).parent('div').addClass('hidden');
        $('.info-name_' + par).addClass('hidden');
        // $(this).addClass('hidden');
    });

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
                    url: "{{ url('bdh-trans/ver-pajak-jenis-dok') }}",
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
        showInpFilterBSheet(options);

    });

</script>
