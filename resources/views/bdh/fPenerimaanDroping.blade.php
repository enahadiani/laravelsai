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
<x-list-data judul="Data Penerimaan Droping" tambah="true" :thead="array('No Bukti','Tanggal','Jenis','No Dokumen','Deskripsi','Nilai','Aksi')" :thwidth="array(10,10,15,20,25,15,10)" :thclass="array('','','','','','','text-center')" />
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
                        <div class="form-group col-md-12 col-sm-12">
                           <div class="row">
                               <div class="col-md-4 col-sm-12">
                                   <label for="no_bukti">No Bukti</label>
                                   <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" value="-" readonly>
                               </div>
                               <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="jenis">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control inp-jenis">
                                        <option value="BM">BM</option>
                                    </select>
                                </div>

                           </div>
                           <div class="row">
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="no_dokumen">Nomor Dokumen</label>
                                    <input class='form-control' type="text" id="no_dokumen" name="no_dokumen" required>
                                </div>
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="kas_bank" >Akun Kas Bank</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kas_bank" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kas_bank" id="kas_bank" name="kas_bank" value="" title="" readonly>
                                        <span class="info-name_kas_bank hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kas_bank"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mt-2">
                                    <label for="nik_tahu" >NIK Mengetahui</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik_tahu" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik_tahu" id="nik_tahu" name="nik_tahu" value="" title="" readonly>
                                        <span class="info-name_nik_tahu hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik_tahu"></i>
                                    </div>
                                </div>

                           </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-12 col-sm-12">
                                    <label for="total-penerimaan" >Total Penerimaan</label>
                                    <input class="form-control currency" type="text" placeholder="Total SPB" readonly id="total-penerimaan" name="total_penerimaan" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12"></div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="mr-auto">
                                        <button type="button" id="proses-data" class="btn btn-sm btn-primary mt-2 mb-2 btn-proses">Tampilkan Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-pengiriman" role="tab" aria-selected="true">
                                <span>Detail Pengiriman</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-pengiriman" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">

                            </div>
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>
                                <table id="pengiriman-grid" class="pengiriman-grid table table-bordered table-condensed gridexample"  style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <th style="width: 3%">No</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">No Bukti</th>
                                        <th width="10%">No Dokumen</th>
                                        <th>Lokasi Kirim</th>
                                        <th>Akun TAK</th>
                                        <th width="35%">Keterangan</th>
                                        <th>Nilai</th>
                                        <th>Tgl Kirim</th>
                                        <th>ID</th>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                </table>

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
        $('#pengiriman-grid tbody').empty()
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
        $('#judul-form').html('Tambah Data Penerimaan Droping');
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

    // event change tanggal and jenis
    $('#form-tambah').on('change', '.inp-tanggal', function(e){
        generateBukti();
    });
    $('#form-tambah').on('change', '.inp-jenis', function(e){
        generateBukti();
    });

    // event button prosses
    $('#form-tambah').on('click', '.btn-proses', function(e){
        load_data();
    });

    // Event Button Kembali (Cancel)
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('bdh-trans/droping-terima') }}",
        [
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
            { data: 'no_kas' },
            { data: 'tgl' },
            { data: 'jenis' },
            { data: 'no_dokumen' },
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

     // GENERATE NO BUKTI
     function generateBukti(){
        var jenis = $('#form-tambah').find('.inp-jenis').val();
        var date = $('#form-tambah').find('.inp-tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        // console.log(date2);
        var url = "{{url('bdh-trans/droping-terima-nobukti')}}";

        $.ajax({
            type: 'GET',
            url : url,
            data: {
                tanggal : date2,
                jenis: jenis
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

     // CBBL Form
     $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'kas_bank':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/droping-terima-akun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun Kas Bank",
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
            case 'nik_tahu':
                var settings = {
                    id : id,
                    header : ['NIK', 'Nama'],
                    url : "{{ url('bdh-trans/droping-terima-niktahu') }}",
                    columns : [
                        { data: 'nik' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar NIK Mengetahui",
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
    // EMD CBBL

    // LOAD DAFTAR FORM
    function load_data(){
        var date = $('#form-tambah').find('.inp-tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        var url = "{{url('bdh-trans/droping-terima-load')}}";
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                tanggal : date2
            },
            dataType: 'JSON',
            async: false,
            success: function(result){
                var data = result.daftar;
                if(data.length > 0){
                    var html = "";
                    var no = 1;
                    for (let i = 0; i < data.length; i++) {
                        html += "<tr class='row-pengiriman row-pengiriman-"+no+"'>"
                        html += "<td class='no-pengiriman text-center'>"+no+"</td>";
                        html += "</div></td>";
                        html += "<td><div>";
                        html += "<span class='td-status tdstatuske"+no+" tooltip-span'>"+data[i].status+"</span>"; //status value
                        html += "<select class='form-control hidden inp-status statuske"+no+"' name='status[]'>";
                        html += "<option value='INPROG'>INPROG</option> <option value='APP'>APP</option>";
                        html += "</select>";
                        html += "</div></td>";

                        html += "<td><div>";
                        html += "<span class='td-no_kas_kirim tdno_kas_kirimke"+no+"'>"+data[i].no_kas+"</span>";
                        html += "<input type='text' name='no_kas_kirim[]' class='inp-no_kas_kirim form-control no_kas_kirimke"+no+" hidden'  value='"+data[i].no_kas+"' readonly required>";
                        html += "</div></td>";

                        html += "<td><div>";
                        html += "<span class='td-no_dok tdno_dokke"+no+"'>"+data[i].no_dokumen+"</span>";
                        html += "<input type='text' name='no_dok[]' class='inp-no_dok form-control no_dokke"+no+" hidden'  value='"+data[i].no_dok+"' readonly required>";
                        html += "</div></td>";

                        html += "<td><div>";
                        html += "<span class='td-kode_lokasi tdkode_lokasike"+no+"'>"+data[i].kode_lokasi+"</span>";
                        html += "<input type='text' name='kode_lokasi[]' class='inp-kode_lokasi form-control kode_lokasike"+no+" hidden'  value='"+data[i].kode_lokasi+"' readonly required>";
                        html += "</div></td>";

                        html += "<td><div>";
                        html += "<span class='td-akun_tak tdakun_takke"+no+"'>"+data[i].akun_tak+"</span>";
                        html += "<input type='text' name='akun_tak[]' class='inp-akun_tak form-control akun_takke"+no+" hidden'  value='"+data[i].akun_tak+"' readonly required>";
                        html += "</div></td>";

                        html += "<td><div>";
                        html += "<span class='td-keterangan tdketeranganke"+no+"'>"+data[i].keterangan+"</span>";
                        html += "<input type='text' name='keterangan[]' class='inp-keterangan form-control keteranganke"+no+" hidden'  value='"+data[i].keterangan+"' readonly required>";
                        html += "</div></td>";

                        html += "<td class='text-right'><div>"
                        html += "<span class='td-nilai tdnilaike"+no+"'>"+format_number(data[i].nilai)+"</span>"
                        html += "<input type='text' name='nilai[]' class='inp-nilai form-control nilaike"+no+" hidden currency'  value='"+parseInt(data[i].nilai)+"' required>"
                        html += "</td></div>"

                        html += "<td><div>";
                        html += "<span class='td-tgl_d tdtgl_dke"+no+"'>"+data[i].tanggal+"</span>";
                        html += "<input type='text' name='tgl_d[]' class='inp-tgl_d form-control tgl_dke"+no+" hidden'  value='"+data[i].tgl_d+"' readonly required>";
                        html += "</div></td>";

                        html += "<td><div>";
                        html += "<span class='td-nu tdnuke"+no+"'>"+data[i].nu+"</span>";
                        html += "<input type='text' name='nu[]' class='inp-nu form-control nuke"+no+" hidden'  value='"+data[i].nu+"' readonly required>";
                        html += "</div></td>";

                        html += "</tr>";
                        no++;
                    }

                    $('#pengiriman-grid >tbody').html(html);

                    var no = 1;
                    for(var i=0;i<data.length;i++) {
                        $('.statuske'+no).val(data[i].status)
                        no++;
                    }

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

                    $('.inp-status').on('change', function(){
                        hitungTotalPenerimaan();
                    });

                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();

                }else{
                    alert('Daftar Pengiriman Gagal di Load, silahkan coba lagi !');
                }
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
    // HITUNG TOTAL
    function hitungTotalPenerimaan(){
        var total_p = 0;
        var total_i  = 0;
        $('#pengiriman-grid tbody tr').each(function(index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            var status = $(this).find('.inp-status').val();

            if(status == "APP"){
                total_p += nilai;
            }else{
                total_i += nilai ;
            }
        });

        $('#total-penerimaan').val(total_p);
    }
    function hideUnselectedRowPengiriman(){
        $('#pengiriman-grid > tbody >tr').each(function(index,row){
            if(!$(row).hasClass('selected-row')) {
                var status = $('#pengiriman-grid > tbody > tr:eq('+index+') > td').find(".inp-status").val();

                $('#pengiriman-grid > tbody > tr:eq('+index+') > td').find(".inp-status").val(status);
                $('#pengiriman-grid > tbody > tr:eq('+index+') > td').find(".td-status").text(status);

                $('#pengiriman-grid > tbody > tr:eq('+index+') > td').find(".inp-status").hide();
                $('#pengiriman-grid > tbody > tr:eq('+index+') > td').find(".td-status").show();
            }
        });
    }

    $('#pengiriman-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#pengiriman-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowPengiriman();
    });

    $('#pengiriman-grid tbody').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 7){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#pengiriman-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');

                var status = $(this).parents("tr").find(".inp-status").val();

                $(this).parents("tr").find(".inp-status").val(status);
                $(this).parents("tr").find(".td-status").text(status);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-status").show();
                    $(this).parents("tr").find(".td-status").hide();
                    $(this).parents("tr").find(".inp-status").focus();
                }else{
                    $(this).parents("tr").find(".inp-status").hide();
                    $(this).parents("tr").find(".td-status").show();
                }
            }
        }
    });
    // END LOAD DATA

     // SIMPAN DATA
     $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form,event) {
            event.preventDefault();
            console.log('submit')
            var parameter = $('#id_edit').val();
            var id = $('#id').val();

            if(parameter == "edit"){
                var url = "{{ url('bdh-trans/droping-terima-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('bdh-trans/droping-terima') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            // $('#pb-grid tbody tr').each(function(index) {
            //     formData.append('no_bukti[]', $(this).find('.inp-no_bukti').text())
            // })


            if(parameter == "edit") {
                formData.append('no_bukti', id)
            }

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

                        var data = result.data;
                        console.log(data);
                        if(data.status){
                            dataTable.ajax.reload();
                            $('#row-id').hide();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('[id^=label]').html('');
                            $('#id_edit').val('');
                            $('#judul-form').html('Tambah Penerimaan Droping');
                            $('#method').val('post');
                            resetForm();
                            msgDialog({
                                id:data.no_bukti,
                                type:'simpan'
                            });
                            last_add("no_bukti",data.no_bukti);
                        }else if(!data.status && data.message === "Unauthorized"){
                            window.location.href = "{{ url('/bdh-auth/sesi-habis') }}";
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+data.message+'</a>'
                            })
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

    // Hapus Data
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('bdh-trans/spb') }}",
            data: {
                no_bukti : id
            },
            dataType: 'json',
            async:false,
            success:function(result){
                var data = result.data;
                if(data.status){
                    dataTable.ajax.reload();
                    showNotification("top", "center", "success",'Hapus Data','Data SPB ('+id+') berhasil dihapus ');
                    // $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    if(typeof M == 'undefined'){
                        $('#modal-delete').modal('hide');
                    }else{
                        $('#modal-delete').bootstrapMD('hide');
                    }
                }else if(!data.status && data.message == "Unauthorized"){
                    window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
                }else{
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
    $('#saku-datatable').on('click', '#btn-delete', function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        console.log(id);
        msgDialog({
            id: id,
            type:'hapus'
        });
    });
</script>
