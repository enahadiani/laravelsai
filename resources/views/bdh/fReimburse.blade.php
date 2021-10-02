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
<x-list-data judul="Reimburse / Penutupan I/F" tambah="true" :thead="array('No Bukti','Tanggal','Deskripsi','Nilai','Progress','Aksi')" :thwidth="array(15,25,15,25,10,10)" :thclass="array('','','','','','text-center')" />
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
                                <div class="col-md-6 col-sm-12">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control inp-status">
                                        <option value="REIMBRUSE">REIMBRUSE</option>
                                        <option value="CLOSE">CLOSE</option>
                                    </select>
                                </div>
                               <div class="col-md-6 col-sm-12">
                                   <label for="no_bukti">No Bukti</label>
                                   <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" value="-" readonly>
                               </div>
                               <div class="col-md-6 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="pemegang_if" >Pemegang IF</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_pemegang_if" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-pemegang_if" id="pemegang_if" name="pemegang_if" value="" title="">
                                        <span class="info-name_pemegang_if hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_pemegang_if"></i>
                                    </div>
                                </div>

                           </div>
                           <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="saldo_if" >Saldo IF</label>
                                    <input type="text" name="saldo_if" id="saldo_id" class="inp-saldo_if form-control" readonly required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="bagian">Bagian / Unit</label>
                                    <input class='form-control' type="text" id="bagian" name="bagian" readonly required>
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
                                    <label for="total_d" >Total Debet</label>
                                    <input class="form-control currency" type="text" placeholder="Total Debet" readonly id="total-debet" name="total_d" value="0">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="total_k" >Total Kredit</label>
                                    <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total-kredit" name="total_k" value="0">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="selisih_jurnal" >Total</label>
                                    <input class="form-control currency" type="text" placeholder="Total" readonly id="selisih-jurnal" name="selisih_jurnal" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-reimburse" role="tab" aria-selected="true">
                                <span>Item Reimburse</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-budget" role="tab" aria-selected="true">
                                <span>Budget</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true">
                                <span>File Dok</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-otorisasi" role="tab" aria-selected="true">
                                <span>Otorisasi & Bank</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-catatan" role="tab" aria-selected="true">
                                <span>Catatan Verifikator</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-reimburse" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-jurnal"></span></a>
                                </div>
                                <table class="table table-bordered table-condensed gridexample" id="jurnal-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:13%">Kode MTA</th>
                                            <th style="width:15%">Nama MTA</th>
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
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row-jurnal btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-budget" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-budget"></span></a>
                                </div>
                                <table class="table table-bordered table-condensed gridexample" id="budget-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:15%">Kode Akun</th>
                                            <th style="width:15%">Kode PP</th>
                                            <th style="width:15%">Kode DRK</th>
                                            <th style="width:20%">Keterangan</th>
                                            <th style="width:15%">Saldo Awal</th>
                                            <th style="width:15%">Nilai</th>
                                            <th style="width:15%">Saldo Akhir</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- begin data dok tab  --}}
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
                        {{-- end data dok tab --}}
                         {{-- begin otorisasi tab --}}
                         <div class="tab-pane" id="data-otorisasi" role="tabpanel">
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="no_rek">No Rekening Penerima</label>
                                    <input type="text" name="no_rek" id="no_rek" class="form-control inp-no_rek" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="nama_rek">Nama Rekening</label>
                                    <input type="text" name="nama_rek" id="nama_rek" class="form-control inp-nama_rek" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="bank_cabang">Bank Cabang</label>
                                    <input type="text" name="bank_cabang" id="bank_cabang" class="form-control inp-bank_cabang" required>
                                </div>

                                <div class="col-md-6 col-sm-12 mt-2">
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

                                <div class="col-md-6 col-sm-12 mt-2">
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

                                <div class="col-md-6 col-sm-12 mt-2">
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
                        {{-- end otorisasi tab --}}
                          {{-- begin catatan verifikator tab --}}
                          <div class="tab-pane" id="data-catatan" role="tabpanel">
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <div class="col-md-10 mt-3">
                                    {{-- <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" readonly>
                                        Catatan tidak ditemukan
                                    </textarea> --}}
                                    <p>Catatan tidak ditemukan</p>
                                </div>
                            </div>
                        </div>
                         {{-- end catatan verifikator tab --}}
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
        $('#jurnal-grid tbody').empty()
        $('#input-dok tbody').empty()
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

    // Event Button Tambah Data
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Reimburse / Penutupan I/F');
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
    });
    // Event Button Kembali (Cancel)
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

        // Jurnal  Grid
        function hitungTotalRowJurnal(){
        var total_row = $('#jurnal-grid tbody tr').length;
        $('#total-row-jurnal').html(total_row+' Baris');
    }
    function hideUnselectedRowJurnal() {
        $('#jurnal-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var dc = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text();
                var keterangan = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val();
                var nilai = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();
                var kode_pp = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var nama_pp = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val();
                var kode_drk = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val();
                var nama_drk = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_drk").val();

                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-dc")[0].selectize.setValue(dc);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text(dc);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val(keterangan);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-ket").text(keterangan);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(kode_pp);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(kode_pp);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val(nama_pp);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").text(nama_pp);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val(kode_drk);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(kode_drk);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_drk").val(nama_drk);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nama_drk").text(nama_drk);

                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-dc").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-ket").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".search-drk").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_drk").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nama_drk").show();
            }
        })
    }
    function addRowJurnal(){
        var kode_akun = "";
        var nama_akun = "";
        var dc = "";
        var keterangan = "";
        var nilai = "";
        var kode_pp = "";
        var nama_pp = "";
        var kode_drk = "";
        var nama_drk = "";

        var no=$('#jurnal-grid .row-jurnal:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-jurnal'>";
        input += "<td class='no-jurnal text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
        input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='' required><option value='D'>D</option><option value='C'>C</option></select></td>";
        input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
        input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly ></td>";

        input += "<td><span class='td-drk tddrkke"+no+" tooltip-span'>"+kode_drk+"</span><input type='text' id='drkkode"+no+"' name='kode_drk[]' class='form-control inp-drk drkke"+no+" hidden' value='"+kode_drk+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_drk tdnmdrkke"+no+" tooltip-span'>"+nama_drk+"</span><input type='text' name='nama_drk[]' class='form-control inp-nama_drk nmdrkke"+no+" hidden'  value='"+nama_drk+"' readonly ></td>";

        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#jurnal-grid tbody').append(input);
        $('.dcke'+no).selectize({
            selectOnTab:true,
            onChange: function(value) {
                $('.tddcke'+no).text(value);

            }
        });
        $('.dcke'+no)[0].selectize.setValue(dc);
        $('.selectize-control.dcke'+no).addClass('hidden');
        $('.nilke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        hideUnselectedRowJurnal();
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRowJurnal();
    }
    function custTarget(target,tr){
        $(target).parents("tr").find(".inp-pp").val(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".td-pp").text(tr.find('td:nth-child(1)').text());
        $(target).parents("tr").find(".inp-pp").hide();
        $(target).parents("tr").find(".td-pp").show();
        $(target).parents("tr").find(".search-pp").hide();
        $(target).parents("tr").find(".inp-nama_pp").show();
        $(target).parents("tr").find(".td-nama_pp").hide();
        // $($target).parents("tr").find(".inp-nama_pp").attr('readonly',false);

        setTimeout(function() {  $(target).parents("tr").find(".inp-nama_pp").focus(); }, 100);
    }

    $('#form-tambah').on('click', '.add-row-jurnal', function(){
        addRowJurnal();
    });

    $('#jurnal-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotalRowJurnal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });



    $('#jurnal-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#jurnal-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowJurnal();
    });

    $('#jurnal-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
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


                $(this).parents("tr").find(".inp-dc")[0].selectize.setValue(dc);
                $(this).parents("tr").find(".td-dc").text(dc);
                if(idx == 3){
                    $('.dcke'+no)[0].selectize.setValue(dc);
                    var dcx = $('.tddcke'+no).text();
                    if(dcx == ""){
                        $('.tddcke'+no).text('D');
                    }

                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-dc").hide();
                    $(this).parents("tr").find(".inp-dc")[0].selectize.focus();

                }else{

                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-dc").show();
                }

                var idx_tr = $(this).closest('tr').index();
                if(keterangan == "" && idx == 4){
                    if(idx_tr == 0){
                        var deskripsi = $('#deskripsi').val();
                    }else{
                        var deskripsi = $("#jurnal-grid tbody tr:eq("+(idx_tr - 1)+")").find('.inp-ket').val();
                    }
                    $(this).parents("tr").find(".inp-ket").val(deskripsi);
                    $(this).parents("tr").find(".td-ket").text(deskripsi);
                }else{

                    $(this).parents("tr").find(".inp-ket").val(keterangan);
                    $(this).parents("tr").find(".td-ket").text(keterangan);
                }
                if(idx == 4){
                    $(this).parents("tr").find(".inp-ket").show();
                    $(this).parents("tr").find(".td-ket").hide();
                    $(this).parents("tr").find(".inp-ket").focus();
                }else{
                    $(this).parents("tr").find(".inp-ket").hide();
                    $(this).parents("tr").find(".td-ket").show();
                }

                if(nilai == "" && idx == 5){
                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                }else{
                    $(this).parents("tr").find(".inp-nilai").val(nilai);
                    $(this).parents("tr").find(".td-nilai").text(nilai);
                }

                if(idx == 5){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }

                $(this).parents("tr").find(".inp-pp").val(kode_pp);
                $(this).parents("tr").find(".td-pp").text(kode_pp);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-pp").show();
                    $(this).parents("tr").find(".td-pp").hide();
                    $(this).parents("tr").find(".search-pp").show();
                    $(this).parents("tr").find(".inp-pp").focus();
                }else{

                    $(this).parents("tr").find(".inp-pp").hide();
                    $(this).parents("tr").find(".td-pp").show();
                    $(this).parents("tr").find(".search-pp").hide();
                }


                $(this).parents("tr").find(".inp-nama_pp").val(nama_pp);
                $(this).parents("tr").find(".td-nama_pp").text(nama_pp);
                if(idx == 7){

                    $(this).parents("tr").find(".inp-nama_pp").show();
                    $(this).parents("tr").find(".td-nama_pp").hide();
                    $(this).parents("tr").find(".inp-nama_pp").focus();
                }else{

                    $(this).parents("tr").find(".inp-nama_pp").hide();
                    $(this).parents("tr").find(".td-nama_pp").show();
                }
                $(this).parents("tr").find(".inp-drk").val(kode_drk);
                $(this).parents("tr").find(".td-drk").text(kode_drk);
                if(idx == 8){
                    $(this).parents("tr").find(".inp-drk").show();
                    $(this).parents("tr").find(".td-drk").hide();
                    $(this).parents("tr").find(".search-drk").show();
                    $(this).parents("tr").find(".inp-drk").focus();
                }else{

                    $(this).parents("tr").find(".inp-drk").hide();
                    $(this).parents("tr").find(".td-drk").show();
                    $(this).parents("tr").find(".search-drk").hide();
                }
                $(this).parents("tr").find(".inp-nama_drk").val(nama_drk);
                $(this).parents("tr").find(".td-nama_drk").text(nama_drk);
                if(idx == 9){
                    $(this).parents("tr").find(".inp-nama_drk").show();
                    $(this).parents("tr").find(".td-nama_drk").hide();
                    $(this).parents("tr").find(".inp-nama_drk").focus();
                }else{

                    $(this).parents("tr").find(".inp-nama_drk").hide();
                    $(this).parents("tr").find(".td-nama_drk").show();
                }
            }
        }
    });
    $('#jurnal-grid').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');

        switch(par){
            case 'kode_akun[]':
                var par2 = "nama_akun[]";

            break;
            case 'kode_pp[]':
                var par2 = "nama_pp[]";
            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        switch(par){
            case 'kode_akun[]':
                var options = {
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/bayar-spb-akun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : ".td-dc",
                    width : ["30%","70%"]
                };
            break;
            case 'kode_pp[]':
                var options = {
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/bayar-spb-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "pp",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "custom",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilterBSheet(options);

    });
    // END Jurnal Grid
    $('#form-tambah').on('click', '.add-row-dok', function(){
        addRowDok("form-tambah");
    });
    $('#input-dok').on('click', '.hapus-dok2', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-dok').each(function(){
            var nom = $(this).closest('tr').find('.no-dok');
            nom.html(no);
            no++;
        });
        hitungTotalRowUpload('form-tambah');
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
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
        console.log(form);
        $('#'+form+' #input-dok tbody').append(input);
        hitungTotalRowUpload(form);
    }

</script>
