<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<x-list-data judul="Data Anggaran Project" tambah="true" :thead="array('No Anggaran', 'No Proyek', 'Tanggal', 'Nilai Anggaran', 'Aksi')" :thwidth="array(15,15,10,10,10)" :thclass="array('','','','','text-center')" />

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
                                <div class="col-md-8 col-sm-12">
                                    <label for="no_proyek" >No Proyek</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_proyek" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-no_proyek" id="no_proyek" name="no_proyek" value="" title="">
                                        <span class="info-name_no_proyek hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_no_proyek"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12"></div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nilai_kontrak">Nilai Kontrak</label>
                                    <input class="form-control currency" type="text" placeholder="Nilai Kontrak" id="nilai_kontrak" name="nilai_kontrak" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12"></div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12"></div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nilai_anggaran">Nilai Anggaran</label>
                                    <input class="form-control currency" type="text" placeholder="Nilai Anggaran" id="nilai_anggaran" name="nilai_anggaran" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-anggaran" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Anggaran</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-anggaran" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:40%">Uraian pekerjaan</th>
                                        <th style="width:10%">Qty</th>
                                        <th style="width:10%">Satuan</th>
                                        <th style="width:15%">Harga</th>
                                        <th style="width:15%">Total</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var keterangan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-keterangan").val();
                var qty = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-qty").val();
                var satuan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").val();
                var harga = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").val();
                var total = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-keterangan").val(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-keterangan").text(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-qty").val(qty);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-qty").text(qty);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").val(satuan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-satuan").text(satuan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").val(harga);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-harga").text(harga);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").val(total);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-total").text(total);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-keterangan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-keterangan").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-qty").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-qty").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-satuan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-satuan").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-harga").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-harga").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-total").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-total").show();
            }
        })
    }

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
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

    function addRow(param) {
        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='text-center'>"+no+"<input type='hidden' name='no[]' class='form-control inp-no noke"+no+" hidden'  value='"+no+"' required></td>";
        input += "<td><span class='td-keterangan tdketke"+no+" tooltip-span'></span><input type='text' name='keterangan[]' class='form-control inp-keterangan ketke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-right'><span class='td-qty tdqtyke"+no+" tooltip-span'></span><input type='text' name='qty[]' class='form-control numeric inp-qty qtyke"+no+" hidden'  value='0' required></td>";
        input += "<td><span class='td-satuan tdsatke"+no+" tooltip-span'></span><input type='text' name='satuan[]' class='form-control inp-satuan satke"+no+" hidden'  value='' required></td>";
        input += "<td class='text-right'><span class='td-harga tdhargake"+no+" tooltip-span'></span><input type='text' name='harga[]' class='form-control numeric inp-harga hargake"+no+" hidden'  value='0' required></td>";
        input += "<td class='text-right'><span class='td-total tdtotalke"+no+" tooltip-span'></span><input type='text' name='total[]' class='form-control numeric inp-total totalke"+no+" hidden'  value='0' required readonly></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
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

        // hideUnselectedRow();
        if(param == "add"){
            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-keterangan").show();
            $('#input-grid tbody tr:last').find(".td-keterangan").hide();
            $('#input-grid tbody tr:last').find(".inp-keterangan").focus();
        }
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRow();
    }

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () {  }
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        addRow("default");
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Anggaran Proyek');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').val('')
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

    var dataTable = generateTable(
        "table-data",
        "{{ url('java-trans/rab-proyek') }}", 
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
            { data: 'no_rab' },
            { data: 'no_proyek' },
            { data: 'tanggal' },
            { data: 'nilai_anggaran' }
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

    function getKontrak(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('java-trans/rab-proyek-cbbl') }}",
            dataType: 'json',
            data:{'no_proyek':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('no_proyek',result.daftar[0].no_proyek,result.daftar[0].no_proyek);
                        $('#nilai_kontrak').val(parseInt(result.daftar[0].nilai))
                    }else{
                        $('#no_proyek').attr('readonly',false);
                        $('#no_proyek').css('border-left','1px solid #d7d7d7');
                        $('#no_proyek').val('');
                        $('#no_proyek').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
            }
        });
    }

    function custTarget(target, tr) {
        $('#nilai_kontrak').val(parseInt(tr.find('td:nth-child(3)').text()))
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        showInpFilter({
            id : id,
            header : ['Kode', 'Keterangan', 'Nilai'],
            url : "{{ url('java-trans/rab-proyek-cbbl') }}",
            columns : [
                { data: 'no_proyek' },
                { data: 'keterangan' },
                { data: 'nilai' }
            ],
            judul : "Daftar Proyek",
            pilih : "akun",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "custom",
            target4 : "custom",
            width : ["30%","70%"],
        });
    });

    $('#form-tambah').on('change', '#no_proyek', function(){
        var par = $(this).val();
        getKontrak(par);
    });

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0 || idx == 5){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var keterangan = $(this).parents("tr").find(".inp-keterangan").val();
                var qty = $(this).parents("tr").find(".inp-qty").val();
                var satuan = $(this).parents("tr").find(".inp-satuan").val();
                var harga = $(this).parents("tr").find(".inp-harga").val();
                var total = $(this).parents("tr").find(".inp-total").val();
                var no = $(this).parents("tr").find(".no-grid").text();
                $(this).parents("tr").find(".inp-keterangan").val(keterangan);
                $(this).parents("tr").find(".td-keterangan").text(keterangan);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-keterangan").show();
                    $(this).parents("tr").find(".td-keterangan").hide();
                    $(this).parents("tr").find(".inp-keterangan").focus();
                }else{
                    $(this).parents("tr").find(".inp-keterangan").hide();
                    $(this).parents("tr").find(".td-keterangan").show();   
                }
        
                $(this).parents("tr").find(".inp-qty").val(qty);
                $(this).parents("tr").find(".td-qty").text(qty);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-qty").show();
                    $(this).parents("tr").find(".td-qty").hide();
                    $(this).parents("tr").find(".inp-qty").focus();
                }else{
                    $(this).parents("tr").find(".inp-qty").hide();
                    $(this).parents("tr").find(".td-qty").show();
                }

                $(this).parents("tr").find(".inp-satuan").val(satuan);
                $(this).parents("tr").find(".td-satuan").text(satuan);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-satuan").show();
                    $(this).parents("tr").find(".td-satuan").hide();
                    $(this).parents("tr").find(".inp-satuan").focus();
                }else{
                    $(this).parents("tr").find(".inp-satuan").hide();
                    $(this).parents("tr").find(".td-satuan").show();
                }

                $(this).parents("tr").find(".inp-harga").val(harga);
                $(this).parents("tr").find(".td-harga").text(harga);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-harga").show();
                    $(this).parents("tr").find(".td-harga").hide();
                    $(this).parents("tr").find(".inp-harga").focus();
                }else{
                    $(this).parents("tr").find(".inp-harga").hide();
                    $(this).parents("tr").find(".td-harga").show();
                }
            }
        }
    });

    $('#form-tambah').on('click', '.add-row', function(){
        addRow("add");
    });

    function hitungTotaldiGrid(selectorInput, selectorCell, number1, number2) {
        number1 = toNilai(number1)
        number2 = toNilai(number2)
        var total = number1 * number2
        $(selectorInput).val(format_number(total))
        $(selectorCell).text(format_number(total))
    }

    $('#input-grid').on('keydown','.inp-keterangan, .inp-qty, .inp-satuan, .inp-harga, .inp-total',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-keterangan','.inp-qty', '.inp-satuan', '.inp-harga', '.inp-total'];
        var nxt2 = ['.td-keterangan','.td-qty', '.td-satuan', '.td-harga', '.td-total'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            var stok = $(this).closest('td').prev().find('.inp-stok').val();
            switch (idx) {
                case 0:
                    if($.trim($(this).val()).length){
                        console.log(nxt[idx])
                        console.log(nxt2[idx])
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Keterangan yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 1:
                    if(isi != "" && isi != 0){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        var cell = $(this).closest('tr').index() + 1;
                        var number1 = $('.qtyke'+cell).val();
                        var number2 = $('.hargake'+cell).val();
                        hitungTotaldiGrid('.totalke'+cell, '.tdtotalke'+cell, number1, number2)
                    }else{
                        alert('Qty yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 2:
                    if($.trim($(this).val()).length){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Satuan yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 3:
                    if(isi != "" && isi != 0){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        var cell = $(this).closest('tr').index() + 1;
                        var number1 = $('.qtyke'+cell).val();
                        var number2 = $('.hargake'+cell).val();
                        hitungTotaldiGrid('.totalke'+cell, '.tdtotalke'+cell, number1, number2)
                        
                        var cek = $(this).parents('tr').next('tr').find('.td-kode');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                    }else{
                        alert('Harga yang dimasukkan tidak valid');
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

</script>