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
<x-list-data judul="Data Pengajuan RRA" tambah="true" :thead="array('No Pengajuan','Tanggal','No Dokumen','Keterangan','Aksi')" :thwidth="array(20,25,10,35,10)" :thclass="array('','','','','text-center')" />
<!-- END LIST DATA -->

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
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
                            <label for="no_dok">No Dokumen</label>
                            <input type="text" placeholder="No Dokumen" class="form-control" id="no_dok" name="no_dok" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nik_approve">NIK Approve</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_nik_approve" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-nik_approve" id="nik_approve" name="nik_approve" value="" title="" readonly>
                                <span class="info-name_nik_approve hidden">
                                    <span id="label_nik_approve"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_nik_approve"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="keterangan">Keterangan</label>
                            <textarea class='form-control' id="keterangan" name="keterangan" rows="4" cols="4" required></textarea>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-penerima" role="tab" aria-selected="true"><span class="hidden-xs-down">Penerima</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-pemberi" role="tab" aria-selected="true"><span class="hidden-xs-down">Pemberi</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data-controlling" role="tab" aria-selected="true"><span class="hidden-xs-down">Controlling</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-penerima" role="tabpanel">
                            <div class="form-row mt-2">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="pp_penerima">PP Penerima</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_pp_penerima" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-pp_penerima" id="pp_penerima" name="pp_penerima" value="" title="" readonly>
                                        <span class="info-name_pp_penerima hidden">
                                            <span id="label_pp_penerima"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_pp_penerima"></i>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="drk_penerima">DRK Penerima</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_drk_penerima" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-drk_penerima" id="drk_penerima" name="drk_penerima" value="" title="" readonly>
                                        <span class="info-name_drk_penerima hidden">
                                            <span id="label_drk_penerima"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_drk_penerima"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="akun_penerima">Akun Penerima</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_akun_penerima" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-akun_penerima" id="akun_penerima" name="akun_penerima" value="" title="" readonly>
                                        <span class="info-name_akun_penerima hidden">
                                            <span id="label_akun_penerima"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_akun_penerima"></i>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="bulan">Bulan</label>
                                    <select class="form-control" name="bulan_penerima" id="bulan_penerima">
                                        <option value="01" selected>01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="saldo">Saldo</label>
                                    <input class="form-control currency" name="saldo" id="saldo" value="0" readonly required>
                                </div>
                                <div class="form-group col-md-3 col-sm-12">
                                    <label for="nilai_penerima">Nilai Penerima</label>
                                    <input class="form-control currency" name="nilai_penerima" id="nilai_penerima" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-pemberi" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-pemberi" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="pemberi-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:30%">Mata Anggaran</th>
                                        <th style="width:30%">PP</th>
                                        <th style="width:30%">DRK</th>
                                        <th style="width:10%">Bulan</th>
                                        <th style="width:15%">Saldo</th>
                                        <th style="width:15%">Nilai</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a type="button" href="#" data-id="0" title="add-row" id="add-row-pemberi" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                        </div>
                        <div class="tab-pane" id="data-controlling" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-controlling" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="controlling-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:30%">Akun</th>
                                        <th style="width:30%">PP</th>
                                        <th style="width:30%">DRK</th>
                                        <th style="width:10%">Bulan</th>
                                        <th style="width:15%">Saldo Awal</th>
                                        <th style="width:15%">Nilai</th>
                                        <th style="width:15%">Saldo Akhir</th>
                                        <th style="width:5%"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a type="button" href="#" data-id="0" title="add-row" id="add-row-controlling" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="bottom-sheet-action">
                            <button type="button" id="btn-sheet" class="btn btn-sheet">Catatan Approval</button>
                        </div>
                        {{-- <div class="text-right message-action">
                            <p class="text-success"></p>
                        </div> --}}
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
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
    var $tahun = "{{ date('Y') }}"
    var valid = true
    var $mataAnggaran = []
    var $ppAnggaran = []
    var $drkAnggaran = []
    var $totalPemberi = 0;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/mata-anggaran') }}",
        dataType: 'json',
        data: { tahun: $tahun },
        async:false,
        success:function(result){    
            var data = result.daftar
            if(data.length > 0) {
                for(var i=0;i<data.length;i++) {
                    var dt = data[i]
                    $mataAnggaran.push({ id: dt.kode_akun, name: dt.nama })
                }
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

    $.ajax({
        type: 'GET',
        url: "{{ url('esaku-trans/pp-anggaran') }}",
        dataType: 'json',
        data: { tahun: $tahun },
        async:false,
        success:function(result){    
            var data = result.daftar
            if(data.length > 0) {
                for(var i=0;i<data.length;i++) {
                    var dt = data[i]
                    $ppAnggaran.push({ id: dt.kode_pp, name: dt.nama })
                    $drkAnggaran.push({ id: dt.kode_pp, name: dt.nama })
                }
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

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    function hitungTotalPemberi() {
        $totalPemberi = 0;
        $('#pemberi-grid tbody tr').each(function(index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            $totalPemberi += nilai
        })
        console.log($totalPemberi)
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

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/pengajuan-rra') }}", 
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
            { data: 'no_pdrk' },
            { data: 'tgl' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
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

    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Pengajuan RRA Anggaran');
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

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

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

    $('#bulan_penerima').on('change', function(){
        var bulan = $(this).val()
        var pp = $('#pp_penerima').val()
        var anggaran = $('#akun_penerima').val()
        var periode = $tahun.concat(bulan)

        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/cek-saldo') }}",
            dataType: 'json',
            data: { bulan: bulan, kode_pp: pp, kode_akun: anggaran, periode: periode },
            async:false,
            success:function(result){    
                var saldo = result.daftar
                $('#saldo').val(parseInt(saldo))
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
    })

    $('#form-tambah').on('click', '.search-item2', function() { 
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'nik_approve': 
                var settings = {
                    id : id,
                    header : ['NIK', 'Nama'],
                    url : "{{ url('esaku-trans/nik-approve') }}",
                    columns : [
                        { data: 'nik' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar NIK Approve",
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
            case 'pp_penerima': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-terima') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP Penerima",
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
            case 'drk_penerima': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-terima') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar DRK Penerima",
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
            case 'akun_penerima': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/akun-terima') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun Penerima",
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

    function hideAllRowPemberi() {
        $('#pemberi-grid tbody tr').removeClass('selected-row');
        $('#pemberi-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#pemberi-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var anggaran = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val();
                var pp = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var drk = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val();
                var bulan = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val();
                var saldo = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val();
                var nilai = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").text(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").text(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function hideUnselectedRowPemberi() {
        $('#pemberi-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var anggaran = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val();
                var pp = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var drk = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val();
                var bulan = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val();
                var saldo = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val();
                var nilai = $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").val(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").text(anggaran);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(pp);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").val(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(drk);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").val(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text(bulan);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").val(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").text(saldo);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-anggaran").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-anggaran").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".search-drk").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-saldo").show();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#pemberi-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function hitungTotalRowPemberi(){
        var total_row = $('#pemberi-grid tbody tr').length;
        $('#total-row-pemberi').html(total_row+' Baris');
    }

    function addRowPemberi() {
        var no=$('#pemberi-grid .row-pemberi:last').index();
        var no = no + 2
        var html = "";
        html += "<tr class='row-pemberi row-pemberi-"+no+"'>"
        html += "<td class='no-pemberi text-center hidden'>"+no+"</td>"
        html += "<td><div>"
        html += "<span class='td-anggaran tdanggaranke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='anggaran[]' class='inp-anggaran anggaranke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='anggarankode"+no+"'><a href='#' class='search-item search-anggaran hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-pp tdppke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='pp[]' class='inp-pp ppke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='ppkode"+no+"'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-drk tddrkke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='drk[]' class='inp-drk drkke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='drkkode"+no+"'><a href='#' class='search-item search-drk hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td class='text-center'><div>"
        html += "<span class='td-bulan tdbulanke"+no+" tooltip-span'></span>"
        html += "<select class='hidden form-control inp-bulan bulanke"+no+"' name='bulan[]'>"
        html += "<option value='01' selected>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>"
        html += "</select>"
        html += "</div></td>"
        html += "<td class='text-right'><div>"
        html += "<span class='td-saldo tdsaldoke"+no+"'>0</span>"
        html += "<input type='text' name='saldo[]' class='inp-saldo form-control saldoke"+no+" hidden currency'  value='0' required>"
        html += "</div></td>"
        html += "<td class='text-right'>"
        html += "<span class='td-nilai tdnilaike"+no+"'>0</span>"
        html += "<input type='text' name='nilai[]' class='inp-nilai form-control nilaike"+no+" hidden currency'  value='0' required>"
        html += "</td>"
        html += "<td class='text-center'><a class='hapus-pemberi' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        html += "</tr>"

        $('#pemberi-grid tbody').append(html);
        
        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {  }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        $('.inp-anggaran').typeahead({
            source:$mataAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-pp').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-drk').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        hideUnselectedRowPemberi()

        $('#pemberi-grid td').removeClass('px-0 py-0 aktif');
        $('#pemberi-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#pemberi-grid tbody tr:last').find(".inp-anggaran").show();
        $('#pemberi-grid tbody tr:last').find(".search-anggaran").show();
        $('#pemberi-grid tbody tr:last').find(".td-anggaran").hide();
        $('#pemberi-grid tbody tr:last').find(".inp-anggaran").focus();

        $('.inp-nilai').on('change', function(){
            hitungTotalPemberi()
        })

        hitungTotalRowPemberi()
    }

    $('#form-tambah').on('click', '#add-row-pemberi', function(){
        addRowPemberi()
    });

    $('#pemberi-grid').on('click', '.hapus-pemberi', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-pemberi').each(function(){
            var nom = $(this).closest('tr').find('.no-pemberi');
            nom.html(no);
            no++;
        });
        hitungTotalRowPemberi();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
    });

    $('#pemberi-grid').on('click', '.search-item', function() {
        var idx = $(this).closest('tr').find('.no-pemberi').text()
        var param = $(this).closest('div').find('input[type="text"]').attr('name')
        var target1 = $(this).closest('div').find('input[type="text"]').attr('class')
        var target2 = $(this).closest('div').find('span').attr('class')
        var target3 = $(this).closest('td').next('td').find('input[type="text"]').attr('class')
        var target4 = $(this).closest('td').next('td').find('span').attr('class')
        var tmp = target1.split(" ");
        var tmp2 = target2.split(" ")
        console.log(idx)
        if(typeof target3 !== 'undefined') {
            var tmp3 = target3.split(" ")
            target3 = tmp3[1]
        }
        if(typeof target4 !== 'undefined') {
            var tmp4 = target4.split(" ")
            target4 = tmp4[1]
        }
        target1 = tmp[1];
        target2 = tmp2[1]

        switch(param){
            case 'anggaran[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/mata-anggaran') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar Mata Anggaran",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_akun+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.row-pemberi-'+idx).find('.search-anggaran').hide()
                        $('.'+target2).show()
                        $('.row-pemberi-'+idx).find('.search-pp').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'pp[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar PP",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.search-pp').hide()
                        $('.'+target2).show()
                        $('.search-drk').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'drk[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar DRK",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.'+target2).show()
                        $('.search-drk').hide()
                        $('.tdbulanke'+idx).hide()
                        $('.bulanke'+idx).show()
                        $('.bulanke'+idx).focus()
                    },
                    width : ["30%","70%"]
                };
            break;
            default:
            break;
        }

        showInpFilter(options);
    })

    $('#pemberi-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#pemberi-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowPemberi();
    });

    $('#pemberi-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 7){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#pemberi-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var anggaran = $(this).parents("tr").find(".inp-anggaran").val();
                var pp = $(this).parents("tr").find(".inp-pp").val();
                var drk = $(this).parents("tr").find(".inp-drk").val();
                var bulan = $(this).parents("tr").find(".inp-bulan").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var saldo = $(this).parents("tr").find(".inp-saldo").val();

                $(this).parents("tr").find(".inp-anggaran").val(anggaran);
                $(this).parents("tr").find(".td-anggaran").text(anggaran);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-anggaran").show();
                    $(this).parents("tr").find(".search-anggaran").show();
                    $(this).parents("tr").find(".td-anggaran").hide();
                    $(this).parents("tr").find(".inp-anggaran").focus();
                }else{
                    $(this).parents("tr").find(".inp-anggaran").hide();
                    $(this).parents("tr").find(".search-anggaran").hide();
                    $(this).parents("tr").find(".td-anggaran").show();   
                }

                $(this).parents("tr").find(".inp-pp").val(pp);
                $(this).parents("tr").find(".td-pp").text(pp);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-pp").show();
                    $(this).parents("tr").find(".search-pp").show();
                    $(this).parents("tr").find(".td-pp").hide();
                    $(this).parents("tr").find(".inp-pp").focus();
                }else{
                    $(this).parents("tr").find(".inp-pp").hide();
                    $(this).parents("tr").find(".search-pp").hide();
                    $(this).parents("tr").find(".td-pp").show();
                }

                $(this).parents("tr").find(".inp-drk").val(drk);
                $(this).parents("tr").find(".td-drk").text(drk);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-drk").show();
                    $(this).parents("tr").find(".search-drk").show();
                    $(this).parents("tr").find(".td-drk").hide();
                    $(this).parents("tr").find(".inp-drk").focus();
                }else{
                    $(this).parents("tr").find(".inp-drk").hide();
                    $(this).parents("tr").find(".search-drk").hide();
                    $(this).parents("tr").find(".td-drk").show();
                }

                $(this).parents("tr").find(".inp-bulan").val(bulan);
                $(this).parents("tr").find(".td-bulan").text(bulan);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-bulan").show();
                    $(this).parents("tr").find(".td-bulan").hide();
                }else{
                    $(this).parents("tr").find(".inp-bulan").hide();
                    $(this).parents("tr").find(".td-bulan").show();
                }

                $(this).parents("tr").find(".inp-saldo").val(saldo);
                $(this).parents("tr").find(".td-saldo").text(saldo);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-saldo").show();
                    $(this).parents("tr").find(".td-saldo").hide();
                    $(this).parents("tr").find(".inp-saldo").focus();
                }else{
                    $(this).parents("tr").find(".inp-saldo").hide();
                    $(this).parents("tr").find(".td-saldo").show();
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

    $('#pemberi-grid').on('change', '.inp-bulan', function(e){
        e.preventDefault();
        var noidx =  $(this).parents("tr").find(".no-pemberi").text();
        target1 = "saldoke"+noidx;
        target2 = "tdsaldoke"+noidx;
        var value = $(this).val();
        $('.tdbulanke'+noidx).text(value)
        $('.bulanke'+noidx).hide()
        $('.tdbulanke'+noidx).show()
        $('.saldoke'+noidx).show()
        $('.tdsaldoke'+noidx).hide()
        setTimeout(() => $('.saldoke'+noidx).focus(), 800)
    });

    var $twicePressPemberi = 0;
    $('#pemberi-grid').on('keydown','.inp-anggaran, .inp-pp, .inp-drk, .inp-saldo, .inp-nilai',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-anggaran','.inp-pp', '.inp-drk', '.inp-bulan', '.inp-saldo', '.inp-nilai'];
        var nxt2 = ['.td-anggaran','.td-pp', '.td-drk', '.td-bulan', '.td-saldo', '.td-nilai'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    if(isi.length > 30) {
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
                    $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
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
                    $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
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
                    $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Saldo yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 5:
                    if(isi != "" && isi != 0){
                        $("#pemberi-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        if(code == 13 || code == 9) {
                            if($twicePressPemberi == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-anggaran');
                                if(cek.length > 0){
                                    cek.click();
                                }else{
                                    $('#add-row-pemberi').click();
                                }
                            }
                            $twicePressPemberi = 1
                            setTimeout(() => $twicePressPemberi = 0, 1000)
                        }
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
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

    function hideAllRowControlling() {
        $('#controlling-grid tbody tr').removeClass('selected-row');
        $('#controlling-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#controlling-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var akun = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val();
                var pp = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val();
                var drk = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val();
                var bulan = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val();
                var saldoAwal = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val();
                var nilai = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val();
                var saldoAkhir = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val();

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").text(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").text(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").text(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").text(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").text(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val(saldoAkhir);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").text(saldoAkhir);

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").show();
            }
        })
    }

    function hideUnselectedRowControlling() {
        $('#controlling-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var akun = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val();
                var pp = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val();
                var drk = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val();
                var bulan = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val();
                var saldoAwal = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val();
                var nilai = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val();
                var saldoAkhir = $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val();

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").val(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text(akun);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").val(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").text(pp);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").val(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").text(drk);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").val(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").text(bulan);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").val(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").text(saldoAwal);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").val(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").text(nilai);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").val(saldoAkhir);
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").text(saldoAkhir);

                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-akun").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-pp-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-pp-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-drk-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".search-drk-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-bulan-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-bulan-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-awal").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-awal").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai-controlling").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-nilai-controlling").show();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".inp-saldo-akhir").hide();
                $('#controlling-grid > tbody > tr:eq('+index+') > td').find(".td-saldo-akhir").show();
            }
        })
    }

    function hitungTotalRowControlling(){
        var total_row = $('#controlling-grid tbody tr').length;
        $('#total-row-controlling').html(total_row+' Baris');
    }

    function addRowControlling() {
        var no=$('#controlling-grid .row-controlling:last').index();
        var no = no + 2
        var html = "";
        html += "<tr class='row-controlling'>"
        html += "<td class='no-controlling text-center hidden'>"+no+"</td>"
        html += "<td><div>"
        html += "<span class='td-akun tdakunke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='akun[]' class='inp-akun akunke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-pp-controlling tdppcontrollingke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='pp_controlling[]' class='inp-pp-controlling ppcontrollingke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='ppcontrollingkode"+no+"'><a href='#' class='search-item search-pp-controlling hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td><div>"
        html += "<span class='td-drk-controlling tddrkcontrollingke"+no+" tooltip-span'></span>"
        html += "<input autocomplete='off' type='text' name='drk_controlling[]' class='inp-drk-controlling drkcontrollingke"+no+" form-control hidden' value='' required='' style='z-index: 1;position: relative;' id='drkcontrollingkode"+no+"'><a href='#' class='search-item search-drk-controlling hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td class='text-center'><div>"
        html += "<span class='td-bulan-controlling tdbulancontrollingke"+no+" tooltip-span'></span>"
        html += "<select class='hidden form-control inp-bulan-controlling bulancontrollingke"+no+"' name='bulan_controlling[]'>"
        html += "<option value='01' selected>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option>"
        html += "</select>"
        html += "</div></td>"
        html += "<td class='text-right'><div>"
        html += "<span class='td-saldo-awal tdsaldoawalke"+no+"'>0</span>"
        html += "<input type='text' name='saldo_awal[]' class='inp-saldo-awal form-control saldoawalke"+no+" hidden currency' value='0' required>"
        html += "</div></td>"
        html += "<td class='text-right'>"
        html += "<span class='td-nilai-controlling tdnilaicontrollingke"+no+"'>0</span>"
        html += "<input type='text' name='nilai_controlling[]' class='inp-nilai-controlling form-control nilaicontrollingke"+no+" hidden currency'  value='0' required>"
        html += "</td>"
        html += "<td class='text-right'><div>"
        html += "<span class='td-saldo-akhir tdsaldoakhirke"+no+"'>0</span>"
        html += "<input type='text' name='saldo_akhir[]' class='inp-saldo-akhir form-control saldoakhirke"+no+" hidden currency' value='0' required>"
        html += "</div></td>"
        html += "<td class='text-center'><a class='hapus-controlling' style='font-size:18px;cursor:pointer;'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        html += "</tr>"

        $('#controlling-grid tbody').append(html);
        
        $('.currency').inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () {  }
        });

        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        $('.inp-akun').typeahead({
            source:$mataAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-pp-controlling').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        $('.inp-drk-controlling').typeahead({
            source:$ppAnggaran,
            displayText:function(item){
                return item.id+'-'+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                console.log(item.id);
            }
        });

        hideUnselectedRowControlling()

        $('#controlling-grid td').removeClass('px-0 py-0 aktif');
        $('#controlling-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#controlling-grid tbody tr:last').find(".inp-akun").show();
        $('#controlling-grid tbody tr:last').find(".search-akun").show();
        $('#controlling-grid tbody tr:last').find(".td-akun").hide();
        $('#controlling-grid tbody tr:last').find(".inp-akun").focus();

        hitungTotalRowControlling()
    }

    $('#form-tambah').on('click', '#add-row-controlling', function(){
        addRowControlling()
    });

    $('#controlling-grid').on('click', '.hapus-controlling', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-controlling').each(function(){
            var nom = $(this).closest('tr').find('.no-controlling');
            nom.html(no);
            no++;
        });
        hitungTotalRowControlling();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
    });

    $('#controlling-grid').on('click', '.search-item', function() {
        var idx = $(this).closest('tr').find('.no-controlling').text()
        var param = $(this).closest('div').find('input[type="text"]').attr('name')
        var target1 = $(this).closest('div').find('input[type="text"]').attr('class')
        var target2 = $(this).closest('div').find('span').attr('class')
        var target3 = $(this).closest('td').next('td').find('input[type="text"]').attr('class')
        var target4 = $(this).closest('td').next('td').find('span').attr('class')
        var tmp = target1.split(" ");
        var tmp2 = target2.split(" ")
        if(typeof target3 !== 'undefined') {
            var tmp3 = target3.split(" ")
            target3 = tmp3[1]
        }
        if(typeof target4 !== 'undefined') {
            var tmp4 = target4.split(" ")
            target4 = tmp4[1]
        }
        target1 = tmp[1];
        target2 = tmp2[1]

        switch(param){
            case 'akun[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/mata-anggaran') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar Akun",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_akun+'-'+data.nama
                        if(string.length > 25) {
                            string = string.substr(0, 25) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.search-akun').hide()
                        $('.'+target2).show()
                        $('.search-pp-controlling').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'pp_controlling[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar PP",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.search-pp-controlling').hide()
                        $('.'+target2).show()
                        $('.search-drk-controlling').show()
                        $('.'+target3).show()
                        $('.'+target4).hide()
                    },
                    width : ["30%","70%"]
                };
            break;
            case 'drk_controlling[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/pp-anggaran') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tahun: $tahun
                    },
                    judul : "Daftar DRK",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        var string = data.kode_pp+'-'+data.nama
                        if(string.length > 30) {
                            string = string.substr(0, 30) + '...'
                        }
                        $('.'+target1).val(string)
                        $('.'+target2).text(string)
                        $('.'+target1).hide()
                        $('.'+target2).show()
                        $('.search-drk-controlling').hide()
                        $('.tdbulancontrollingke'+idx).hide()
                        $('.bulancontrollingke'+idx).show()
                        $('.bulancontrollingke'+idx).focus()
                    },
                    width : ["30%","70%"]
                };
            break;
            default:
            break;
        }

        showInpFilter(options);
    })

    $('#controlling-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#controlling-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowControlling();
    });

    $('#controlling-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 8){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#controlling-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var akun = $(this).parents("tr").find(".inp-akun").val();
                var pp = $(this).parents("tr").find(".inp-pp-controlling").val();
                var drk = $(this).parents("tr").find(".inp-drk-controlling").val();
                var bulan = $(this).parents("tr").find(".inp-bulan-controlling").val();
                var nilai = $(this).parents("tr").find(".inp-nilai-controlling").val();
                var saldoAwal = $(this).parents("tr").find(".inp-saldo-awal").val();
                var saldoAkhir = $(this).parents("tr").find(".inp-saldo-akhir").val();

                $(this).parents("tr").find(".inp-akun").val(akun);
                $(this).parents("tr").find(".td-akun").text(akun);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-akun").show();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".td-akun").hide();
                    $(this).parents("tr").find(".inp-akun").focus();
                }else{
                    $(this).parents("tr").find(".inp-akun").hide();
                    $(this).parents("tr").find(".search-akun").hide();
                    $(this).parents("tr").find(".td-akun").show();   
                }

                $(this).parents("tr").find(".inp-pp-controlling").val(pp);
                $(this).parents("tr").find(".td-pp-controlling").text(pp);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-pp-controlling").show();
                    $(this).parents("tr").find(".search-pp-controlling").show();
                    $(this).parents("tr").find(".td-pp-controlling").hide();
                    $(this).parents("tr").find(".inp-pp-controlling").focus();
                }else{
                    $(this).parents("tr").find(".inp-pp-controlling").hide();
                    $(this).parents("tr").find(".search-pp-controlling").hide();
                    $(this).parents("tr").find(".td-pp-controlling").show();
                }

                $(this).parents("tr").find(".inp-drk-controlling").val(drk);
                $(this).parents("tr").find(".td-drk-controlling").text(drk);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-drk-controlling").show();
                    $(this).parents("tr").find(".search-drk-controlling").show();
                    $(this).parents("tr").find(".td-drk-controlling").hide();
                    $(this).parents("tr").find(".inp-drk-controlling").focus();
                }else{
                    $(this).parents("tr").find(".inp-drk-controlling").hide();
                    $(this).parents("tr").find(".search-drk-controlling").hide();
                    $(this).parents("tr").find(".td-drk-controlling").show();
                }

                $(this).parents("tr").find(".inp-bulan-controlling").val(bulan);
                $(this).parents("tr").find(".td-bulan-controlling").text(bulan);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-bulan-controlling").show();
                    $(this).parents("tr").find(".td-bulan-controlling").hide();
                }else{
                    $(this).parents("tr").find(".inp-bulan-controlling").hide();
                    $(this).parents("tr").find(".td-bulan-controlling").show();
                }

                $(this).parents("tr").find(".inp-saldo-awal").val(saldoAwal);
                $(this).parents("tr").find(".td-saldo-awal").text(saldoAwal);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-saldo-awal").show();
                    $(this).parents("tr").find(".td-saldo-awal").hide();
                    $(this).parents("tr").find(".inp-saldo-awal").focus();
                }else{
                    $(this).parents("tr").find(".inp-saldo-awal").hide();
                    $(this).parents("tr").find(".td-saldo-awal").show();
                }

                $(this).parents("tr").find(".inp-nilai-controlling").val(nilai);
                $(this).parents("tr").find(".td-nilai-controlling").text(nilai);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-nilai-controlling").show();
                    $(this).parents("tr").find(".td-nilai-controlling").hide();
                    $(this).parents("tr").find(".inp-nilai-controlling").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai-controlling").hide();
                    $(this).parents("tr").find(".td-nilai-controlling").show();
                }

                $(this).parents("tr").find(".inp-saldo-akhir").val(saldoAkhir);
                $(this).parents("tr").find(".td-saldo-akhir").text(saldoAkhir);
                if(idx == 7){
                    $(this).parents("tr").find(".inp-saldo-akhir").show();
                    $(this).parents("tr").find(".td-saldo-akhir").hide();
                    $(this).parents("tr").find(".inp-saldo-akhir").focus();
                }else{
                    $(this).parents("tr").find(".inp-saldo-akhir").hide();
                    $(this).parents("tr").find(".td-saldo-akhir").show();
                }
            }
        }
    });

    $('#controlling-grid').on('change', '.inp-bulan-controlling', function(e){
        e.preventDefault();
        var noidx =  $(this).parents("tr").find(".no-controlling").text();
        target1 = "saldocontrollingke"+noidx;
        target2 = "tdsaldocontrollingke"+noidx;
        var value = $(this).val();
        $('.tdbulancontrollingke'+noidx).text(value)
        $('.bulancontrollingke'+noidx).hide()
        $('.tdbulancontrollingke'+noidx).show()
        $('.saldoawalke'+noidx).show()
        $('.tdsaldoawalke'+noidx).hide()
        setTimeout(() => $('.saldoawalke'+noidx).focus(), 800)
    });

    var $twicePressControlling = 0;
    $('#controlling-grid').on('keydown','.inp-akun, .inp-pp-controlling, .inp-drk-controlling, .inp-saldo-awal, .inp-nilai-controlling, .inp-saldo-akhir',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-akun','.inp-pp-controlling', '.inp-drk-controlling', '.inp-bulan-controlling', '.inp-saldo-awal', '.inp-nilai-controlling', '.inp-saldo-akhir'];
        var nxt2 = ['.td-akun','.td-pp-controlling', '.td-drk-controlling', '.td-bulan-controlling', '.td-saldo-awal', '.td-nilai-controlling', '.td-saldo-akhir'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    if(isi.length > 25) {
                        isi = isi.substr(0, 25) + '...'
                    }
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-akun').hide();
                    $(this).closest('tr').find('.search-pp-controlling').show();
                break;
                case 1:
                    $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-pp-controlling').hide();
                    $(this).closest('tr').find('.search-drk-controlling').show();
                break;
                case 2:
                    $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find('.search-drk-controlling').hide();
                break;
                case 3:
                    $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Saldo Awal yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 5:
                    if(isi != "" && isi != 0){
                        $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 6:
                    if(isi != "" && isi != 0){
                        $("#controlling-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");

                        if(code == 13 || code == 9) {
                            if($twicePressControlling == 1) {
                                $(this).closest('tr').find(nxt[idx]).val(isi);
                                $(this).closest('tr').find(nxt2[idx]).text(isi);
                                $(this).closest('tr').find(nxt[idx]).hide();
                                $(this).closest('tr').find(nxt2[idx]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-akun');
                                if(cek.length > 0){
                                    cek.click();
                                }else{
                                    $('#add-row-controlling').click();
                                }
                            }
                            $twicePressControlling = 1
                            setTimeout(() => $twicePressControlling = 0, 1000)
                        }
                    }else{
                        alert('Saldo Akhir yang dimasukkan tidak valid');
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
                var url = "{{ url('esaku-trans/pengajuan-rra-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-trans/pengajuan-rra') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            $('#pemberi-grid tbody tr').each(function(index) {
                formData.append('no_pemberi[]', $(this).find('.no-pemberi').text())
            })
            formData.append('donor', $totalPemberi)
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
                        if(result.data.success.status){
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
                                id:result.data.success.no_bukti,
                                type:'simpan'
                            });
                            last_add("no_pdrk",result.data.success.no_bukti);
                        }else if(!result.data.success.status && result.data.success.message === "Unauthorized"){
                            window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.success.message+'</a>'
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