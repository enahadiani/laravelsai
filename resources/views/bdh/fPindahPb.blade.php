<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
    .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;
    }
</style>

<!-- LIST DATA -->
<x-list-data judul="Data PB Pindah Buku" tambah="true" :thead="array('No Bukti','Tanggal','Deskripsi','Nilai','Progress','Aksi')" :thwidth="array(15,20,25,15,10,10)" :thclass="array('','','','','','text-center')" />
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
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;" >
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
                               <div class="col-md-12 col-sm-12 mt-2">
                                   <label for="no_bukti">No Bukti</label>
                                   <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" value="-" readonly>
                               </div>
                               <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>

                               <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="due_date">Due Date</label>
                                    <input class='form-control inp-due_date datepicker' type="text" id="due_date" name="due_date" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-2">
                                    <label for="no_dokumen">Nomor Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" required>
                                </div>
                           </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">

                            <div class="row">

                                <div class="col-md-12">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-6 col-sm-12">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_pindah_buku" >Total Pidah Buku</label>
                                    <input class="form-control currency" type="text" placeholder="Total SPB" readonly id="total_pindah_buku" name="total_pindah_buku" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-sumber-dana" role="tab" aria-selected="true">
                                <span>Sumber Dana</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-rekening" role="tab" aria-selected="true">
                                <span>Rekening Tujuan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-otorisasi" role="tab" aria-selected="true">
                                <span>Otorisasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-catatan" role="tab" aria-selected="true">
                                <span>Catatan Verifikator</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true">
                                <span>File Dokumen</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-sumber-dana" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                            </div>
                            <div class="form-row mt-4">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 mt-2">
                                            <label for="atensi">Atensi</label>
                                            <input type="text" name="atensi" id="atensi" class="form-control inp-atensi">
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-2">
                                            <label for="rek_sumber" >Rekening Sumber</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                    <span class="input-group-text info-code_rek_sumber" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                </div>
                                                <input type="text" class="form-control inp-label-rek_sumber" id="rek_sumber" name="rek_sumber" value="" title="">
                                                <span class="info-name_rek_sumber hidden">
                                                    <span></span>
                                                </span>
                                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                <i class="simple-icon-magnifier search-item2" id="search_rek_sumber"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-2">
                                            <label for="bank_m">Bank</label>
                                            <input type="text" name="bank" id="bank_m" class="form-control inp-bank_m">
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-2">
                                            <label for="no_rek_m">No Rekening</label>
                                            <input type="text" name="no_rek_m" id="no_rek_m" class="form-control inp-no_rek_m">
                                        </div>
                                        <div class="col-md-12 col-sm-12 mt-2">
                                            <label for="nama_rek_m">Nama Rekening</label>
                                            <input type="text" name="nama_rek_m" id="nama_rek_m" class="form-control inp-nama_rek_m">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-rekening" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-rekening"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="rekening-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:10%">Kode Akun</th>
                                            <th style="width:15%">Nama Akun</th>
                                            <th style="width:25%">Bank</th>
                                            <th style="width:25%">No Rekening</th>
                                            <th style="width:25%">Nama Rekening</th>
                                            <th class="text-right" style="width:15%">Nilai</th>
                                            <th style="width: 3%" ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row-rekening btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-otorisasi" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                            </div>
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 mt-2">
                                                <label for="nik_buat" >Dibuat Oleh</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_nik_buat" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-nik_buat" id="nik_buat" name="nik_buat" value="" title="">
                                                    <span class="info-name_nik_buat hidden">
                                                        <span></span>
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_nik_buat"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mt-2">
                                                <label for="nik_tahu" >Nik Mengetahui</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_nik_tahu" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-nik_tahu" id="nik_tahu" name="nik_tahu" value="" title="">
                                                    <span class="info-name_nik_tahu hidden">
                                                        <span></span>
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_nik_tahu"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mt-2">
                                                <label for="nik_ver" >Nik Verifikator</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_nik_ver" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-nik_ver" id="nik_ver" name="nik_ver" value="" title="">
                                                    <span class="info-name_nik_ver hidden">
                                                        <span></span>
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_nik_ver"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-catatan" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                            </div>
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <div class="form-row mt-4">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 mt-2">
                                                <textarea name="ctt" id="ctt" class="form-control" cols="30" rows="4" readonly>Catatan tidak ditemukan</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-dok" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                            </div>
                            <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-dok" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
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
                                <a type="button" href="#" data-id="0" title="add-row-dok" class="add-row-dok btn btn-light2 btn-block btn-sm">
                                Tambah Baris</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action"></div>

                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
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
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
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

    function last_add(param,isi){
        var rowIndexes = [];
        dataTable.rows( function ( idx, data, node ) {
            if(data[param] === isi){
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

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function resetForm() {
        $('#pemberi-grid tbody').empty()
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=info-name]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function(e){
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function(e){
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function(e){
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function(e){
            $(this).addClass('hidden');
        });
    }

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('bdh-trans/pindah-buku') }}",
        [
            {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' },
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            }

        ],
        [
            { data: 'no_pb' },
            { data: 'tgl' },
            { data: 'keterangan' },
            {data: 'nilai',className: 'text-right' ,render: $.fn.dataTable.render.number('.', ',', 2, '')},
            {data: 'status'}
        ],
        "{{ url('bdh-auth/sesi-habis') }}",
        [[4 ,"desc"]]
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

    // Rekening Grid
    function hitungTotalRowRekening(){
        var total_row = $('#rekening-grid tbody tr').length;
        $('#total-row-rekening').html(total_row+' Baris');
    }

    function hideUnselectedRowRekening() {
        $('#rekening-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var bank_d = $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-bank_d").val();
                var no_rek = $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-no_rek").val();
                var nama_rek = $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_rek").val();
                var nilai = $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();


                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-bank_d").val(bank_d);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-bank_d").text(bank_d);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-no_rek").val(no_rek);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-no_rek").text(no_rek);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_rek").val(nama_rek);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-nama_rek").text(nama_rek);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);


                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-bank_d").hide();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-bank_d").show();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-no_rek").hide();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-no_rek").show();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_rek").hide();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-nama_rek").show();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#rekening-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function addRowRekening(){
        var kode_akun = "";
        var nama_akun = "";
        var nama_rek = "";
        var bank_d = "";
        var nilai = "";
        var no_rek = "";
        var no=$('#rekening-grid .row-rekening:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-rekening'>";
        input += "<td class='no-rekening text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";

        input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";

        input += "<td><span class='td-bank_d tdbank_dke"+no+" tooltip-span'>"+bank_d+"</span><input type='text' name='bank_d[]' class='form-control inp-bank_d bank_dke"+no+" hidden'  value='"+bank_d+"' required></td>";

        input += "<td><span class='td-no_rek tdno_rekke"+no+" tooltip-span'>"+no_rek+"</span><input type='text' name='no_rek[]' class='form-control inp-no_rek no_rekke"+no+" hidden'  value='"+no_rek+"' required></td>";

        input += "<td><span class='td-nama_rek tdnama_rekke"+no+" tooltip-span'>"+nama_rek+"</span><input type='text' name='nama_rek[]' class='form-control inp-nama_rek nama_rekke"+no+" hidden'  value='"+nama_rek+"' required></td>";

        input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";

        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#rekening-grid tbody').append(input);

        $('.nilke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        hideUnselectedRowRekening();
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRowRekening();
    }

    function custTarget(target,tr){
        $(target).parents("tr").find(".inp-pp").val(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".td-pp").text(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".inp-pp").hide();
        $(target).parents("tr").find(".td-pp").show();
        $(target).parents("tr").find(".search-pp").hide();
        $(target).parents("tr").find(".inp-nama_pp").show();
        $(target).parents("tr").find(".td-nama_pp").hide();
        setTimeout(function() {  $(target).parents("tr").find(".inp-nama_pp").focus(); }, 100);
    }

    $('#form-tambah').on('click', '.add-row-rekening', function(){
        addRowRekening();
    });
    $('#rekening-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-rekening').each(function(){
            var nom = $(this).closest('tr').find('.no-rekening');
            nom.html(no);
            no++;
        });
        hitungTotalRowRekening();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    $('#rekening-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#rekening-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowRekening();
    });

    $('#rekening-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#rekening-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var bank_d = $(this).parents("tr").find(".inp-bank_d").val();
                var no_rek = $(this).parents("tr").find(".inp-no_rek").val();
                var nama_rek = $(this).parents("tr").find(".inp-nama_rek").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var no = $(this).parents("tr").find(".no-rekening").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-akun").hide();

                }

                $(this).parents("tr").find(".inp-nama").val(nama_akun);
                $(this).parents("tr").find(".td-nama").text(nama_akun);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{

                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }


                $(this).parents("tr").find(".inp-bank_d").val(bank_d);
                $(this).parents("tr").find(".td-bank_d").text(bank_d);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-bank_d").show();
                    $(this).parents("tr").find(".td-bank_d").hide();
                    $(this).parents("tr").find(".inp-bank_d").focus();
                }else{
                    $(this).parents("tr").find(".inp-bank_d").hide();
                    $(this).parents("tr").find(".td-bank_d").show();
                }
                $(this).parents("tr").find(".inp-no_rek").val(no_rek);
                $(this).parents("tr").find(".td-no_rek").text(no_rek);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-no_rek").show();
                    $(this).parents("tr").find(".td-no_rek").hide();
                    $(this).parents("tr").find(".inp-no_rek").focus();
                }else{
                    $(this).parents("tr").find(".inp-no_rek").hide();
                    $(this).parents("tr").find(".td-no_rek").show();
                }
                $(this).parents("tr").find(".inp-nama_rek").val(nama_rek);
                $(this).parents("tr").find(".td-nama_rek").text(nama_rek);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-nama_rek").show();
                    $(this).parents("tr").find(".td-nama_rek").hide();
                    $(this).parents("tr").find(".inp-nama_rek").focus();
                }else{
                    $(this).parents("tr").find(".inp-nama_rek").hide();
                    $(this).parents("tr").find(".td-nama_rek").show();
                }

                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
            }
        }
    });
    // END GRID REKENING

    // GRID DOK
    function hitungTotalRowUpload(form){
        var total_row = $('#'+form+' #input-dok tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }
    function addRowDok(form){
        var no=$('#'+form+' #input-dok .row-dok:last').index();
        no=no+2;
        console.log(no);
        var input = "";
        input += "<tr class='row-dok'>";
        input += "<td class='no-dok text-center'>"+no+"</td>";
        input += "<td class='px-0 py-0'><div class='inp-div-jenis'><input type='text' name='jenis[]' class='form-control inp-jenis jeniske"+no+" ' value='' required='' style='z-index: 1;' id='jeniskode"+no+"'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></div></td>";
        input += "<td class='px-0 py-0'><input type='text' name='nama_dok[]' class='form-control inp-nama_dok nama_dokke"+no+"' value='' readonly></td>";
        input += "<td><span class='td-nama_file tdnmfileke"+no+" tooltip-span'>-</span><input type='text' name='nama_file[]' class='form-control inp-nama_file nmfileke"+no+" hidden'  value='-' readonly></td>";
        input+=`
        <td>
        <input type='file' name='file_dok[]'>
        <input type='hidden' name='no_urut[]' class='form-control inp-no_urut' value='`+no+`'>
        </td>`;
        input+=`
        <td class='text-center action-dok'><a class='hapus-dok2'><i class='simple-icon-trash' style='font-size:18px'></i></a></td></tr>`;
        $('#'+form+' #input-dok tbody').append(input);
        hitungTotalRowUpload(form);
    }
    $('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
    });
    $('#form-tambah').on('click', '.hapus-dok2', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        hitungTotalRowUpload("form-tambah");
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    // END GRID DOK


    // Event Button Tambah Data
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data PB Pindah Buku');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
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
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        generateBukti();
    });

    // Event Button Kembali (Cancel)
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    // GENERATE NO BUKTI
    function generateBukti(){
        var date = $('#form-tambah').find('.inp-tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        // console.log(date2);
        var url = "{{url('bdh-trans/pindah-buku-nobukti')}}";

        $.ajax({
            type: 'GET',
            url : url,
            data: {
                tanggal : date2
            },
            dataType: 'JSON',
            async: false,
            success: function(result){
                $('#form-tambah').find('.inp-no_bukti').val(result.data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/bdh-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
            }
        });

    }

    // event change tanggal
    $('#form-tambah').on('change', '.inp-tanggal', function(e){
        var type_of_form = $('#form-tambah #id_edit').val();
        if(type_of_form == '' ){
            generateBukti();
        }
    });
    // end event change tanggal

    // CBBL FORM
    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'rek_sumber':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/pindah-buku-rekening-sumber') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : ".inp-bank_m",
                    target4 : ".inp-bank_m",
                    width : ["30%","70%"],
                }
            break;

            default:
            break;
        }
        showInpFilter(settings);
    });
    // EMD CBBL
</script>
