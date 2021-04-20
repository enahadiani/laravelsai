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
                                    <select class="form-control" name="bulan" id="bulan">
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
                                    <input class="form-control currency" name="saldo" id="saldo" value="0" readonly>
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
                            <a type="button" href="#" data-id="0" title="add-row" id="add-row-pemberi" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
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
    var $mataAnggaran = []
    var $ppAnggaran = []
    var $drkAnggaran = []

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
        html += "<tr class='row-pemberi'>"
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
        html += "<input type='text' name='saldo[]' class='inp-saldo form-control saldoke"+no+" hidden currency'  value='0' required readonly>"
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
                        $('.search-anggaran').hide()
                        $('.'+target2).show()
                        $('.search-pp').show()
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
        if(idx == 6){
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

    $('#bulan').on('change', function(){
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
</script>