<link rel="stylesheet" href="{{ asset('trans.css') }}" />

<style>
    th {
        vertical-align:middle !important;
    }
    #input-grid .selectize-input.focus, #input-grid input.form-control, #input-grid .custom-file-label {
        border:1px solid black !important;
        border-radius:0 !important;
    }
    #input-grid .selectize-input {
        border-radius:0 !important;
    }
    .modal-header .close {
        padding: 1rem;
        margin: -1rem 0 -1rem auto;
    }
    .hapus-item{
        cursor:pointer;
    } 
    .selected{
        cursor:pointer;
    }
    #input-grid td:not(:nth-child(1)):not(:nth-child(9)):hover {
        background:#f8f8f8;
        color:black;
    }
    #input-grid input:hover,#input-grid .selectize-input:hover {
        width:inherit;
    }
    #input-grid ul.typeahead.dropdown-menu {
        width:max-content !important;
    }
    #input-grid td {
        overflow:hidden !important;
        height:37.2px !important;
        padding:0px !important;
    }
    #input-grid span {
        padding:0px 10px !important;
    }
    #input-grid input,#input-grid .selectize-input {
        overflow:hidden !important;
        height:35px !important;
    }
    #input-grid td:nth-child(4) {
        overflow:unset !important;
    }
</style>

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display:block;">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                    <h6 id="judul-form" style="position:absolute;top:25px">Mutasi Barang</h6>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                </div>
                <div class="separator mb-2"></div>
                <div id="form-body" class="card-body pt-3 form-body"> 
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-group row" id="row-id" hidden>
                        <div class="col-9">
                            <input class="form-control" type="text" id="id_edit" name="id_edit" readonly >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="jenis" >Jenis</label>
                                    <select class='form-control selectize' id="jenis" name="jenis">
                                        <option value=''>--- Pilih Jenis ---</option>
                                        <option value='KRM' selected>Kirim</option>
                                        <option value='TRM'>Terima</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_bukti">No. Bukti</label>
                                    <input class='form-control' type="text" id="no_bukti" name="no_bukti" readonly>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="no_dokumen">No. Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-10 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="asal">Gudang Asal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_asal" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-asal" id="asal" name="asal" value="" title="">
                                        <span class="info-name_asal hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_asal"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tujuan">Gudang Tujuan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_tujuan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-tujuan" id="tujuan" name="tujuan" value="" title="">
                                        <span class="info-name_tujuan hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_tujuan"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Barang</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-jurnal" role="tabpanel">
                            <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode</th>
                                            <th style="width:25%">Nama</th>
                                            <th style="width:10%">Satuan</th>
                                            <th style="width:10%" id="stok-mutasi">Stok</th>
                                            <th style="width:10%" id="jumlah-mutasi">Jumlah</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')
@include('modal_upload')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $dtBarang = [];
    var $dtgudangAsal = [];
    var $dtgudangTujuan = [];
    var jenis = $('#jenis').val();
    var tanggal = $('#tanggal').val();
    var scrollform = document.getElementById('form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    getKode(tanggal, jenis);
    getDataTypeAhead("{{ url('esaku-report/filter-gudang') }}","gudangAsal","kode_gudang");
    getDataTypeAhead("{{ url('esaku-report/filter-gudang') }}","gudangTujuan","kode_gudang");
    getDataTypeAhead("{{ url('esaku-trans/filter-barang-mutasi') }}","Barang","kode_barang");

    if(jenis === "TRM") {
        $('#stok-mutasi').text('Jumlah Kirim')
        $('#jumlah-mutasi').text('Jumlah Terima')
    } else if(jenis === "KRM") {
        $('#stok-mutasi').text('Stok')
        $('#jumlah-mutasi').text('Jumlah')
    }

    $('#jenis').selectize({
        onChange: function(value) {
            jenis = value;
            changeJenis(jenis);
        }
    });
    
    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#tanggal').change(function(){
        tanggal = $(this).val();
        getKode(tanggal, jenis);
    })

    function getKode(tanggal, jenis) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/generate-mutasi') }}",
            data:{'tanggal':tanggal, 'jenis':jenis},
            dataType: 'json',
            success:function(response){
                if(response.result.status) {
                    $('#no_bukti').val(response.result.kode)
                }
            }
        });
    }

    function changeJenis(jenis) {
        if(jenis === "TRM") {
            $('#stok-mutasi').text('Jumlah Kirim')
            $('#jumlah-mutasi').text('Jumlah Terima')
        } else if(jenis === "KRM") {
            $('#stok-mutasi').text('Stok')
            $('#jumlah-mutasi').text('Jumlah')
        }
        getKode(tanggal, jenis);
    }

    function getDataTypeAhead(url,param,kode){
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        eval('$dt'+param+'['+i+'] = '+JSON.stringify({id:eval('result.daftar['+i+'].'+kode),name:result.daftar[i].nama}));  
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function format_number(x) {
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function addRow() {
        var no=$('#input-grid .row-grid:last').index();
        var kode_barang = "";
        var nama = "";
        var satuan = "";
        var stok = 0;
        var jumlah = 0;
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdbarangke"+no+" tooltip-span'>"+kode_barang+"</span><input type='text' name='kode_barang[]' class='form-control inp-kode barangke"+no+" hidden' value='"+kode_barang+"' required='' style='z-index: 1;position: relative;' id='barangkode"+no+"'><a href='#' class='search-item search-barang hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmbarangke"+no+" tooltip-span'>"+nama+"</span><input type='text' name='nama_barang[]' class='form-control inp-nama nmbarangke"+no+" hidden'  value='"+nama+"' readonly></td>";
        input += "<td><span class='td-satuan tdsatuanke"+no+" tooltip-span'>"+satuan+"</span><input type='text' name='satuan[]' class='form-control inp-satuan satuanke"+no+" hidden'  value='"+satuan+"' readonly></td>";
        input += "<td><span class='td-stok tdstokke"+no+" tooltip-span'>"+stok+"</span><input type='text' name='stok[]' class='form-control inp-stok stokke"+no+" hidden'  value='"+stok+"' readonly></td>";
        input += "<td class='text-right'><span class='td-jumlah tdjumlahke"+no+" tooltip-span'>"+jumlah+"</span><input type='text' name='jumlah[]' class='form-control inp-jumlah jumlahke"+no+" hidden'  value='"+jumlah+"' required></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";

        $('#input-grid tbody').append(input);
        $('.row-grid:last').addClass('selected-row');
        $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');

        $('.jumlahke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true
        });
        hideUnselectedRow();
        $('#input-grid td').removeClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find(".inp-kode").show();
        $('#input-grid tbody tr:last').find(".td-kode").hide();
        $('#input-grid tbody tr:last').find(".search-barang").show();
        $('#input-grid tbody tr:last').find(".inp-kode").focus();

        $('#barangkode'+no).typeahead({
            source:$dtBarang,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRow();
    }

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var dc = $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text();
                var keterangan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val();
                var nilai = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();
                var kode_pp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var nama_pp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dc")[0].selectize.setValue(dc);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text(dc);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-ket").text(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(kode_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(kode_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val(nama_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").text(nama_pp);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-ket").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").show();
            }
        })
    }

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

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    $('#asal').typeahead({
        source:$dtgudangAsal,
        fitToElement:true,
        displayText:function(item){
            return item.id+' - '+item.name;
        },
        autoSelect:false,
        changeInputOnSelect:false,
        changeInputOnMove:false,
        selectOnBlur:false,
        afterSelect: function (item) {
            console.log(item.id);
        }
    });
    $('#tujuan').typeahead({
        source:$dtgudangTujuan,
        fitToElement:true,
        displayText:function(item){
            return item.id+' - '+item.name;
        },
        autoSelect:false,
        changeInputOnSelect:false,
        changeInputOnMove:false,
        selectOnBlur:false,
        afterSelect: function (item) {
            console.log(item.id);
        }
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var options = {
            id : id,
            header : ['NIK', 'Nama'],
            url : "{{ url('esaku-report/filter-gudang') }}",
            columns : [
                { data: 'kode_gudang' },
                { data: 'nama' }
            ],
            judul : "Daftar Gudang",
            pilih : "",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            width : ["30%","70%"]
        }
        showInpFilter(options);
    });

    $('#form-tambah').on('click', '.add-row', function(){
        addRow();
    });
    
    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    function custTarget(target,tr){
        var kode_barang = $(target).parents("tr").find(".inp-kode").val();
        var kode_gudang = $('#asal').val();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/barang-mutasi-detail') }}",
            data:{'kode_barang':kode_barang, 'kode_gudang':kode_gudang},
            dataType: 'json',
            success:function(response){
                var result = response.result.data[0];

                if(response.status) {
                    $(target).parents("tr").find(".inp-satuan").val(result.sat_kecil); 
                    $(target).parents("tr").find(".td-satuan").text(result.sat_kecil);
                    $(target).parents("tr").find(".inp-stok").val(result.stok); 
                    $(target).parents("tr").find(".td-stok").text(result.stok);
                    $(target).parents("tr").find(".inp-jumlah").show();
                    $(target).parents("tr").find(".td-jumlah").hide();    
                    setTimeout(function() {  $(target).parents("tr").find(".inp-jumlah").focus(); }, 100);    
                }
            }
        });
    }

    $('#input-grid').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        var gudang = $('#asal').val();
        if(gudang == '') {
            alert('Harap pilih gudang asal dahulu')
            return;
        }
        switch(par){
            case 'kode_barang[]': 
                var par2 = "nama_barang[]";
                
            break;
        }
        
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        
        switch(par){
            case 'kode_barang[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/filter-barang-mutasi') }}",
                    columns : [
                        { data: 'kode_barang' },
                        { data: 'nama' }
                    ],
                    parameter: {kode_gudang: gudang},
                    judul : "Daftar Barang",
                    pilih : "barang",
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

    $('#input-grid').on('keydown','.inp-kode, .inp-nama, .inp-satuan, .inp-stok, .inp-jumlah',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama','.inp-satuan','.inp-stok','.inp-jumlah'];
        var nxt2 = ['.inp-kode','.inp-nama','.inp-satuan','.inp-stok','.inp-jumlah'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            console.log(idx)
                console.log(kunci)
                console.log(idx_next)
            // switch (idx) {
                
            // }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });
</script>