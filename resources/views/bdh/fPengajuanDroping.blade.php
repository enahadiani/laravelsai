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
<x-list-data judul="Data Pengajuan Droping" tambah="true" :thead="array('No Bukti','Tanggal','Deskripsi','Nilai','Aksi')" :thwidth="array(15,20,25,15,10)" :thclass="array('','','','','','text-center')" />
<!-- END LIST DATA -->

{{-- form data --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="tanggal" name="tanggal">
    <input class="form-control" type="hidden" placeholder="No Bukti" id="kode_form" name="kode_form" readonly>
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
                                   <label for="no_bukti">No Bukti</label>
                                   <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" value="-" readonly>
                               </div>
                               <div class="col-md-6 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>

                           </div>
                           <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="pp" >PP/Unit Pemohon</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-pp" id="pp" name="pp" value="" title="" readonly required>
                                        <span class="info-name_pp hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_pp"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
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
                                    <label for="total_droping" >Total Droping</label>
                                    <input class="form-control currency" type="text" placeholder="Total SPB" readonly id="total_droping" name="total_droping" value="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-permintaan" role="tab" aria-selected="true">
                                <span>Detail Permintaan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-budget" role="tab" aria-selected="true">
                                <span>Budget Droping</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true">
                                <span>File Dokumen</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-permintaan" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-permintaan"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="permintaan-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:10%">Kode Akun</th>
                                            <th style="width:15%">Nama Akun</th>
                                            <th style="width:25%">Kegiatan</th>
                                            <th class="text-right" style="width:15%">Nilai</th>
                                            <th style="width: 3%" ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row-permintaan btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-budget" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">

                            </div>
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>

                                <button type="button" id="cek-budget" class="btn btn-sm btn-primary mt-2 mb-2 cek-budget">Cek Budget</button>

                                <table id="budget-grid" class="budget-grid table table-bordered table-condensed gridexample"  style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <th style="width: 3%">No</th>
                                        <th>Kode Akun</th>
                                        <th>Nama Akun</th>
                                        <th>Saldo Awal</th>
                                        <th>Nilai</th>
                                        <th>Saldo Akhir</th>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>

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
        // $('#permintaan-grid >tbody').empty()
        // $('#input-dok tbody').empty()
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
        "{{ url('bdh-trans/droping-aju') }}",
        [
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
            { data: 'no_minta' },
            { data: 'tgl' },
            { data: 'keterangan' },
            {data: 'nilai',className: 'text-right' ,render: $.fn.dataTable.render.number('.', ',', 2, '')},
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

    // Permintaan Grid
    function hitungTotalRowPermintaan(){
        var total_row = $('#permintaan-grid tbody tr').length;
        $('#total-row-permintaan').html(total_row+' Baris');
    }

    function hideUnselectedRowJurnal() {
        $('#permintaan-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var kegiatan = $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-kegiatan").val();
                var nilai = $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();


                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-kegiatan").val(kegiatan);
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-kegiatan").text(kegiatan);
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);


                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-kegiatan").hide();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-kegiatan").show();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#permintaan-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function hitungTotal(){

        var total = 0;

        $('.row-permintaan').each(function(){
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            total += +toNilai(nilai);
        });
        $('#total_droping').val(total);

    }

    function addRowPermintaan(){
        var kode_akun = "";
        var nama_akun = "";
        var kegiatan = "";
        var nilai = "";
        var no=$('#permintaan-grid .row-permintaan:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-permintaan'>";
        input += "<td class='no-permintaan text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";

        input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";

        input += "<td><span class='td-kegiatan tdkegiatanke"+no+" tooltip-span'>"+kegiatan+"</span><input type='text' name='kegiatan[]' class='form-control inp-kegiatan kegiatanke"+no+" hidden'  value='"+kegiatan+"' required></td>";

        input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";

        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#permintaan-grid tbody').append(input);

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
        hitungTotal();
        hitungTotalRowPermintaan();
        $('.nilaike'+no).selectize({
            selectOnTab:true,
            onChange: function(value) {
                $('.tdnilaike'+no).text(value);
                hitungTotal();
            }
        });
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

    $('#form-tambah').on('click', '.add-row-permintaan', function(){
        addRowPermintaan();
    });
    $('#permintaan-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-permintaan').each(function(){
            var nom = $(this).closest('tr').find('.no-permintaan');
            nom.html(no);
            no++;
        });
        hitungTotalRowPermintaan();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    $('#permintaan-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#permintaan-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowJurnal();
    });

    $('#permintaan-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#permintaan-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var kegiatan = $(this).parents("tr").find(".inp-kegiatan").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var no = $(this).parents("tr").find(".no-permintaan").text();
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


                $(this).parents("tr").find(".inp-kegiatan").val(kegiatan);
                $(this).parents("tr").find(".td-kegiatan").text(kegiatan);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-kegiatan").show();
                    $(this).parents("tr").find(".td-kegiatan").hide();
                    $(this).parents("tr").find(".inp-kegiatan").focus();
                }else{
                    $(this).parents("tr").find(".inp-kegiatan").hide();
                    $(this).parents("tr").find(".td-kegiatan").show();
                }

                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 4){
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
    // END GRID PERMINTAAN

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
        $('#judul-form').html('Tambah Data Pengajuan Droping');
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

     // CBBL Form
     $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'pp':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/droping-aju-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;

            default:
            break;
        }
        showInpFilter(settings);
    })


    $('#permintaan-grid').on('click', '.search-item', function(){
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
                    url : "{{ url('bdh-trans/droping-aju-akun') }}",
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
        }
        showInpFilterBSheet(options);

    });

    $('#form-tambah #input-dok').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        var tmp = $(this).closest('tr').find('input[name="nama_dok[]"]').attr('class');
        var tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        console.log(par,target1,target2)

        switch(par){
            case 'jenis[]':
                var options = {
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/dok-jenis') }}",
                    columns : [
                        { data: 'kode_jenis' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jenis Dokumen",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilter(options);

    });
    // EMD CBBL

     // GENERATE NO BUKTI
     function generateBukti(){
        var date = $('#form-tambah').find('.inp-tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        // console.log(date2);
        var url = "{{url('bdh-trans/droping-aju-nobukti')}}";

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
    $('#form-tambah').on('change','.inp-tanggal', function(e){
        generateBukti();
    });

    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            $("#pemberi-grid tbody tr td:not(:first-child):not(:last-child)").each(function() {
                if($(this).find('span').text().trim().length == 0) {
                    console.log($(this).find('span').text().length)
                    alert('Data pemberi tidak boleh kosong, harap dihapus untuk melanjutkan')
                    valid = false;
                    return false;
                }
            });

            var parameter = $('#id_edit').val();
            var id = $('#id').val();

            if(parameter == "edit"){
                var url = "{{ url('esaku-trans/droping-aju') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('bdh-trans/droping-aju') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            // $('#pemberi-grid tbody tr').each(function(index) {
            //     formData.append('no_pemberi[]', $(this).find('.no-pemberi').text())
            // })
            formData.append('donor', $totalPemberi)

            if(parameter == "edit") {
                formData.append('no_bukti', id)
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
            }
            if(valid) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: formData,
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(result){
                        if(result.data.status){
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
                                id:result.data.no_bukti,
                                type:'simpan'
                            });
                            last_add("no_pdrk",result.data.no_bukti);
                        }else if(!result.data.status && result.data.message === "Unauthorized"){
                            window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
                $('#btn-simpan').html("Simpan").removeAttr('disabled');
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
</script>
