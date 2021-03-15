<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />

<x-list-data judul="Data Pembayaran Project" tambah="true" :thead="array('No Bayar', 'Tanggal', 'Keterangan', 'Nilai', 'Aksi')" :thwidth="array(15,10,15,10,10)" :thclass="array('','','','','text-center')" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
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
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="kode_cust" >Vendor</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_cust" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kode_cust" id="kode_cust" name="kode_cust" value="" title="">
                                        <span class="info-name_kode_cust hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_cust"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row form-no-margin">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <label for="kode_bank" >KasBank Penerimaan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_bank" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kode_bank" id="kode_bank" name="kode_bank" value="" title="">
                                        <span class="info-name_kode_bank hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_bank"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_tagihan">Jenis Penerimaan</label>
                                    <input class='form-control' type="text" id="jenis" name="jenis">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 no_bayar">
                                    <label for="no_bayar">No Bayar</label>
                                    <input class='form-control' type="text" id="no_bayar" name="no_bayar" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-tagihan" role="tab" aria-selected="true"><span class="hidden-xs-down">Rincian Pembayaran</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-tagihan" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:15%">No Tagihan</th>
                                        <th style="width:15%">No Dokumen</th>
                                        <th style="width:15%">Pembayaran</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                            <div class="info-transaction">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-4 col-sm-3">
                                        <span>Biaya Lain</span>
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <input class="form-control currency" type="text" placeholder="Biaya Lain" id="biaya_lain" name="biaya_lain" value="0">
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-6 col-sm-5">
                                        <div class="separator mb-2"></div>
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5 col-sm-5"></div>
                                    <div class="col-md-4 col-sm-4">
                                        Total
                                    </div>
                                    <div class="col-md-2 col-sm-2">
                                        <span class="pull-right" id="total-tagihan">Rp. 0</span>
                                    </div>
                                    <div class="col-md-1 col-sm-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-div">
                        <button type="submit" class="btn btn-primary mb-2 mt-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('modal_search')

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $total = 0;
    var $total_akhir = 0;
    var $dtTagihan = [];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotal() {
        var biaya_lain = toNilai($('#biaya_lain').val())
        $total = 0;
        $('#input-grid tbody tr').each(function(index) {
            var subtotal = toNilai($(this).find('.td-nilai_bayar').text())
            $total += subtotal
        })
        $total_akhir = biaya_lain + $total;
        $('#total-tagihan').text('Rp. '+format_number($total_akhir))
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

    function hideAllSelectedRow() {
        $('#input-grid tbody tr').removeClass('selected-row');
        $('#input-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#input-grid > tbody > tr').each(function(index, row) { 
            var tagihan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tagihan").val();
            var dokumen = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dokumen").val();
            var nilai_bayar = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_bayar").val();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tagihan").val(tagihan);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tagihan").text(tagihan);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dokumen").val(dokumen);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dokumen").text(dokumen);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_bayar").val(nilai_bayar);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai_bayar").text(nilai_bayar);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tagihan").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tagihan").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-tagihan").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dokumen").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dokumen").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_bayar").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai_bayar").show();
        })
    }

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var tagihan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tagihan").val();
                var dokumen = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dokumen").val();
                var nilai_bayar = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_bayar").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tagihan").val(tagihan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tagihan").text(tagihan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dokumen").val(dokumen);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dokumen").text(dokumen);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_bayar").val(nilai_bayar);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai_bayar").text(nilai_bayar);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-tagihan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-tagihan").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-tagihan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dokumen").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dokumen").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_bayar").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai_bayar").show();
            }
        })
    }

    function resetForm() {
        $('.no_bayar').hide();
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
        $('#input-grid tbody').empty();
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

    function cekTagihan(value, target1, target2, target3, param) {
        $.ajax({
            type: 'GET',
            url: "{{ url('/java-trans/tagihan-proyek-show') }}",
            dataType: 'json',
            data:{ 'kode':value},
            async:false,
            success:function(res){
                var result= res.data.data;
                if(result.length > 0) {
                    if(param == 'tab') {
                        var nilai_tagihan = parseFloat(result[0].nilai)
                        var pajak = parseFloat(result[0].pajak)
                        var nilai_pajak = nilai_tagihan*(pajak/100)
                        var biaya_lain = parseFloat(result[0].biaya_lain)
                        var nilai_akhir = nilai_tagihan + (nilai_tagihan*(pajak/100)) + biaya_lain;
                        var uang_muka = parseFloat(result[0].uang_muka)
                        var kurang_bayar = nilai_akhir - uang_muka;
                        $('.'+target1).val(value)
                        $('.td'+target1).text(value)
                        $('.'+target2).val(format_number(kurang_bayar))
                        $('.td'+target2).text(format_number(kurang_bayar))
                        $('.'+target1).hide()
                        $('.td'+target1).show()
                        $('.search-tagihan').hide()
                        $('.'+target3).show()
                        $('.td'+target3).hide()
                        $('.'+target3).focus()
                    } else if(param == 'blur') {
                        var nilai_tagihan = parseFloat(result[0].nilai)
                        var pajak = parseFloat(result[0].pajak)
                        var nilai_pajak = nilai_tagihan*(pajak/100)
                        var biaya_lain = parseFloat(result[0].biaya_lain)
                        var nilai_akhir = nilai_tagihan + (nilai_tagihan*(pajak/100)) + biaya_lain;
                        var uang_muka = parseFloat(result[0].uang_muka)
                        var kurang_bayar = nilai_akhir - uang_muka;
                        $('.'+target1).val(value)
                        $('.td'+target1).text(value)
                        $('.'+target2).val(format_number(kurang_bayar))
                        $('.td'+target2).text(format_number(kurang_bayar))
                        $('.'+target1).hide()
                        $('.td'+target1).show()
                        $('.search-tagihan').hide()
                        $('.'+target3).show()
                        $('.td'+target3).hide()
                        $('.'+target3).focus()
                    }
                    hitungTotal();
                } else {
                    alert('No Tagihan tidak ditemukan')
                    $('.'+target1).show()
                    $('.td'+target1).hide()
                    $('.search-tagihan').show()
                    $('.'+target1).val('')
                    $('.td'+target1).text('')
                    $('.'+target1).focus()
                }
            }
        });
    }

    function addRow(param){ 
        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";

        input += "<tr class='row-grid'>";
        input += "<td class='text-center no-grid'>"+no+"</td>";
        input += "<td><span class='td-tagihan tdtagihanke"+no+" tooltip-span'></span><input autocomplete='off' type='text' name='no_tagihan[]' class='form-control inp-tagihan tagihanke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;' id='tagihankode"+no+"'><a href='#' class='search-item search-tagihan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-dokumen tddokumenke"+no+" tooltip-span'></span><input type='text' name='no_dokumen[]' class='form-control inp-dokumen dokumenke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-right'><span class='td-nilai_bayar tdnilai_bayarke"+no+" tooltip-span'></span><input type='text' name='nilai_bayar[]' class='form-control inp-nilai_bayar nilai_bayarke"+no+" hidden numeric'  value='0' required readonly></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);

        $('.numeric').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {  }
        });

        hideUnselectedRow();
        
        $('#input-grid td').removeClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find(".inp-tagihan").show();
        $('#input-grid tbody tr:last').find(".search-tagihan").show();
        $('#input-grid tbody tr:last').find(".td-tagihan").hide();
        $('#input-grid tbody tr:last').find(".inp-tagihan").focus();
        
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        $('#tagihankode'+no).typeahead({
            source:$dtTagihan,
            displayText:function(item){
                return item.id;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        hitungTotalRow();
    }

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

    var dataTable = generateTable(
        "table-data",
        "{{ url('java-trans/bayar-proyek') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {   'targets': 3, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'no_bayar' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'nilai' }
        ],
        "{{ url('java-auth/sesi-habis') }}",
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

    $('[data-toggle="popover"]').popover({ trigger: "focus" });

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Pembayaran Proyek');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        resetForm();
        // addRow("default");
    });

    $(document).keydown(function(event){
        var code = (event.keyCode ? event.keyCode : event.which);
        if(event.ctrlKey && code == 13 ||event.ctrlKey && code == 9) {
            var vendor = $('#kode_cust').val();
            if(vendor === '') {
                alert('Harap pilih vendor terlebih dahulu')
            } else {
                var cek = $('#input-grid tbody tr').length;
                if(cek > 0){
                    var cek = $('#input-grid').find('tr').last();
                    var focus = cek.find('.td-tagihan')
                    focus.click();
                }else{
                    $('.add-row').click();
                }
            }
        } else if(event.ctrlKey && code == 16) {
            hideAllSelectedRow()
            hitungTotal()
            $('#biaya_lain').focus()
        }
    });

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#form-tambah').on('click', '.add-row', function(){
        var vendor = $('#kode_cust').val();
        if(vendor === '') {
            alert('Harap pilih vendor terlebih dahulu')
        } else {
            addRow("add");
        }
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_vendor').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#biaya_lain').on('change', function() {
        hitungTotal()
    })

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () {  }
    });

    function getDataTagihan(kode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('java-trans/tagihan-bayar-cbbl') }}",
            data: { kode: kode },
            dataType: 'json',
            async:false,
            success:function(res){ 
                var result = res.daftar;
                for(var i=0;i<result.length;i++) {
                    $dtTagihan.push({ id: result[i].no_tagihan, sisa: result[i].sisa_bayar })
                }    
            }
        })
    }

    function custTarget(target, tr) {
        var from = target;
        var keyString = '_'
        var fromTarget = from.substr(from.indexOf(keyString) + keyString.length, from.length);

        if(fromTarget === 'kode_cust') {
            var kode = tr.find('td:nth-child(1)').text();
            getDataTagihan(kode)
        } else if(fromTarget.includes('.tagihanke')) {
            var index = fromTarget.split('e');
            var tagihan = $(fromTarget).val()
            $(fromTarget).closest("td").removeClass('px-0 py-0 aktif');
            $('.tddokumenke'+index[1]).closest("td").addClass('px-0 py-0 aktif');
            $('.tdtagihanke'+index[1]).text(tagihan)
            $(fromTarget).val(tagihan)
            $('.tdtagihanke'+index[1]).show()
            $(fromTarget).hide()
            $('.search-tagihan').hide()

            $('.tddokumenke'+index[1]).hide()
            $('.dokumenke'+index[1]).show()
            setTimeout(function() { $('.dokumenke'+index[1]).focus() }, 500)
            hitungTotal();
        }
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'kode_cust': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('java-trans/customer') }}",
                    columns : [
                        { data: 'kode_cust' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Customer",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "custom",
                    target4 : "custom",
                    width : ["30%","70%"],
                    }
            break;
            case 'kode_bank': 
                var settings = {
                    id : id,
                    header : ['Kode Bank', 'Nama'],
                    url : "{{ url('java-trans/bank-bayar-cbbl') }}",
                    columns : [
                        { data: 'kode_bank' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Bank",
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
    });

    $('#input-grid').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        var cust = $('#kode_cust').val()
        switch(par){
            case 'no_tagihan[]': 
                var par2 = "nilai_bayar[]";
                
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        switch(par){
            case 'no_tagihan[]': 
                var options = { 
                    id : par,
                    header : ['No Tagihan', 'Sisa Bayar'],
                    url : "{{ url('java-trans/tagihan-bayar-cbbl') }}",
                    columns : [
                        { data: 'no_tagihan' },
                        { data: 'sisa_bayar', render: $.fn.dataTable.render.number( '.', '.', 0 ) }
                    ],
                    parameter: {
                        kode: cust
                    },
                    judul : "Daftar Tagihan",
                    pilih : "akun",
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
        showInpFilter(options);

    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0 || idx == 3 || idx == 4){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var tagihan = $(this).parents("tr").find(".inp-tagihan").val();
                var dokumen = $(this).parents("tr").find(".inp-dokumen").val();
                var no = $(this).parents("tr").find(".no-grid").text();
                $(this).parents("tr").find(".inp-tagihan").val(tagihan);
                $(this).parents("tr").find(".td-tagihan").text(tagihan);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-tagihan").show();
                    $(this).parents("tr").find(".search-tagihan").show();
                    $(this).parents("tr").find(".td-tagihan").hide();
                    $(this).parents("tr").find(".inp-tagihan").focus();
                }else{
                    $(this).parents("tr").find(".inp-tagihan").hide();
                    $(this).parents("tr").find(".search-tagihan").hide();
                    $(this).parents("tr").find(".td-tagihan").show();   
                }

                $(this).parents("tr").find(".inp-dokumen").val(dokumen);
                $(this).parents("tr").find(".td-dokumen").text(dokumen);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-dokumen").show();
                    $(this).parents("tr").find(".td-dokumen").hide();
                    $(this).parents("tr").find(".inp-dokumen").focus();
                }else{
                    $(this).parents("tr").find(".inp-dokumen").hide();
                    $(this).parents("tr").find(".td-dokumen").show();
                }
            }
        }
    });

    $('#input-grid').on('blur', '.inp-tagihan', function(e){
        e.preventDefault();
        var noidx =  $(this).parents("tr").find(".no-grid").text();
        target1 = "tagihanke"+noidx;
        target2 = "nilai_bayarke"+noidx;
        target3 = "dokumenke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-tagihan').val()).length){
            var kode = $(this).val();
            cekTagihan(kode,target1,target2,target3,'blur');
        }else{
            // alert('No Tagihan tidak boleh kosong');
            return false;
        }
    });

    $('#input-grid').on('keydown','.inp-tagihan, .inp-dokumen',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-tagihan', '.inp-dokumen'];
        var nxt2 = ['.td-tagihan', '.td-dokumen'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    if($.trim($(this).val()).length){
                        var noidx = $(this).parents("tr").find(".no-grid").text();
                        var value = $(this).val()
                        var target1 = "tagihanke"+noidx;
                        var target2 = "nilai_bayarke"+noidx;
                        var target3 = "dokumenke"+noidx;
                        cekTagihan(value,target1,target2,target3,'tab');
                    }else{
                        alert('No Tagihan yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 1:
                    if(isi != ""){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        hitungTotal();
                        var cek = $(this).parents('tr').next('tr').find('.td-tagihan');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                    }else{
                        alert('Dokumen yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                default:
                break;   
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        hitungTotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            tanggal:{
                required: true   
            },
            kode_cust:{
                required: true   
            },
            kode_bank:{
                required: true  
            },
            keterangan:{
                required: true  
            },
            jenis:{
                required: true  
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
        
            if($total < 0) {
                alert('Harap mengisi detail pembayaran dengan benar')
                return;
            }

            var parameter = $('#id_edit').val();
            var id = $('#no_tagihan').val();
            if(parameter == "edit"){
                var url = "{{ url('java-trans/bayar-proyek-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('java-trans/bayar-proyek') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            $('#input-grid tbody tr').each(function(index) {
                formData.append('no[]', $(this).find('.no-grid').text())
            })
            formData.append('nilai', $total_akhir)
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
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
                        $('#judul-form').html('Tambah Data Pembayaran Proyek');
                        $('#method').val('post');
                        // $('#no_kontrak').attr('readonly', false);
                        $('#search_no_proyek').show();
                        $('#search_kode_cust').show();
                        resetForm();
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("no_tagihan",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'No tagihan sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 4){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            $.ajax({
                type: 'GET',
                url: "{{ url('java-trans/bayar-proyek-show') }}",
                data: { kode: id },
                dataType: 'json',
                async:false,
                success:function(res){ 
                    var result = res.data;
                    var subtotal = parseFloat(result.data[0].nilai) - parseFloat(result.data[0].biaya_lain)
                    
                    var html = `<tr>
                        <td style='border:none'>No Bayar</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>`+result.data[0].tanggal+`</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>`+result.data[0].keterangan+`</td>
                    </tr>
                    <tr>
                        <td>Vendor</td>
                        <td>`+result.data[0].kode_cust+` - `+result.data[0].nama+`</td>
                    </tr>
                    <tr>
                        <td>Akun KasBank penerimaan</td>
                        <td>`+result.data[0].kode_bank+` - `+result.data[0].nama_bank+`</td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>`+format_number(subtotal)+`</td>
                    </tr>
                    <tr>
                        <td>Biaya Lain</td>
                        <td>`+format_number(parseFloat(result.data[0].biaya_lain))+`</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>`+format_number(result.data[0].nilai)+`</td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <table class='table table-bordered' id='table-detail'>
                                <thead>
                                    <tr>
                                        <th>No</th>    
                                        <th>No Tagihan</th>    
                                        <th>No Dokumen</th>    
                                        <th>Pembayaran</th>    
                                    </tr>    
                                </thead>
                                <tbody></tbody>
                            </table>
                        </td>
                    </tr>
                    `;
                    $('#table-preview tbody').html(html);
                    var html2;
                    for(var i=0;i<result.detail.length;i++) {
                        html2 += `<tr>
                            <td>`+result.detail[i].no+`</td>
                            <td>`+result.detail[i].no_tagihan+`</td>
                            <td>`+result.detail[i].no_dokumen+`</td>
                            <td>`+format_number(result.detail[i].nilai_bayar)+`</td>
                        </tr>` 
                    }    
                    $('#table-detail tbody').html(html2);
                    $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Pembayaran Proyek').removeClass('py-2');
                    $('#modal-preview-id').text(id);
                    $('#modal-preview #content-preview').css({'overflow-y': 'scroll'}); 
                    $('#modal-preview').modal('show');      
                }
            })
        }
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Pembayaran Proyek');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Pembayaran Proyek');
        editData(id);
    });

    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/java-trans/bayar-proyek-show') }}",
            dataType: 'json',
            data:{ 'kode':id},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    // var subtotal = parseFloat(result.data[0].nilai) - parseFloat(result.data[0].biaya_lain)
                    getDataTagihan(result.data[0].kode_cust)
                    $('.no-bayar').show();
                    $('#input-grid tbody').empty();
                    $('#id_edit').val('edit');
                    $('#id').val(id);
                    $('#no_bayar').val(id);
                    $('#method').val('put');
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#jenis').val(result.data[0].jenis);
                    $('#tanggal').val(reverseDate2(result.data[0].tanggal,'-','/'));
                    showInfoField('kode_bank',result.data[0].kode_bank,result.data[0].nama_bank);
                    showInfoField('kode_cust',result.data[0].kode_cust,result.data[0].nama);
                    $('#biaya_lain').val(parseFloat(result.data[0].biaya_lain))
                    $('#total-tagihan').text('Rp. '+format_number(result.data[0].nilai))
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='text-center no-grid'>"+line.no+"<input type='text' name='no[]' class='form-control inp-no noke"+no+" hidden'  value='"+line.no+"' required></td>";
                            input += "<td><span class='td-tagihan tdtagihanke"+no+" tooltip-span'>"+line.no_tagihan+"</span><input autocomplete='off' type='text' name='no_tagihan[]' class='form-control inp-tagihan tagihanke"+no+" hidden' value='"+line.no_tagihan+"' required='' style='z-index: 1;position: relative;' id='tagihankode"+no+"'><a href='#' class='search-item search-tagihan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-dokumen tddokumenke"+no+" tooltip-span'>"+line.no_dokumen+"</span><input type='text' name='no_dokumen[]' class='form-control inp-dokumen dokumenke"+no+" hidden'  value='"+line.no_dokumen+"' required></td>";
                            input += "<td class='text-right'><span class='td-nilai_bayar tdnilai_bayarke"+no+" tooltip-span'>"+format_number(line.nilai_bayar)+"</span><input type='text' name='nilai_bayar[]' class='form-control inp-nilai_bayar nilai_bayarke"+no+" hidden numeric'  value='"+parseFloat(line.nilai_bayar)+"' required readonly></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        var no = 1;
                        for(var i=0;i<result.detail.length;i++){
                            $('#tagihankode'+no).typeahead({
                                source:$dtTagihan,
                                displayText:function(item){
                                    return item.id;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
        
                            no++;
                        }
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        })
                        $('.numeric').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () {  }
                        });
                        no= 1;
                    }
                    hitungTotalRow();
                    hitungTotal();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
            }
        });
    }

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('java-trans/bayar-proyek') }}",
            dataType: 'json',
            data: {'kode':id},
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Pembayaran ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

</script>