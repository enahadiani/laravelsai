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
<x-list-data judul="Daftar Bukti" tambah="true" :thead="array('Modul','No Bukti','Deskripsi','Status','Aksi')" :thwidth="array(15,20,25,35,10)" :thclass="array('','','','','text-center')" />
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
                                <div class="col-md-4 col-sm-12 mt-2 mb-2">
                                    <label for="no_pb_aju" >No PBAju</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_pb_aju" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-no_pb_aju" id="no_pb_aju" name="no_pb_aju" value="" title="" readonly>
                                        <span class="info-name_no_pb_aju hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_no_pb_aju"></i>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-2">
                                    <button type="button" class="btn btn-primary mt-4 btn-proses">Proses</button>
                                </div>
                            </div>
                            <div class="separator mb-2"></div>
                           <div class="row">
                               <div class="col-md-4 col-sm-12">
                                   <label for="no_verifikasi">No Verifikasi</label>
                                   <input type="text" name="no_verifikasi" id="no_verifikasi" class="form-control inp-no_verifikasi" value="-" readonly>
                               </div>
                               <div class="col-md-4 col-sm-12">

                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-4 col-sm-12">
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
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_bukti">No Bukti</label>
                                    <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_dokumen">No Dokumen</label>
                                    <input type="text" name="no_dokumen" id="no_dokumen" class="form-control inp-no_dokumen" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="total_jurnal" >Total Jurnal</label>
                                    <input class="form-control currency" type="text" placeholder="Total Jurnal" readonly id="total_jurnal" name="total_jurnal" value="0">
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
                                    <label for="total_rekening" >Total Rekening</label>
                                    <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total_rekening" name="total_rekening" value="0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label for="due_date">Due Date</label>
                                    <input type="text" name="due_date" id="due_date" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="deksripsi_m">Deskripsi</label>
                                    <input type="text" name="deksripsi_m" id="deksripsi_m" class="form-control" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="pembuat_m" >Pembuat</label>
                                    <input class="form-control" type="text"  readonly id="pembuat_m" name="pembuat_m">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-rekening" role="tab" aria-selected="true">
                                <span>Data Rekening</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-pb" role="tab" aria-selected="true">
                                <span>Daftar PB</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-otorisasi" role="tab" aria-selected="true">
                                <span>Otorisasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tambah-pb" role="tab" aria-selected="true">
                                <span>Tambah PB</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-rekening" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-rekening"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="rekening-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:15%" class="text-center">Bank</th>
                                            <th style="width:15%">Cabang</th>
                                            <th style="width:15%">No Rekening</th>
                                            <th style="width:15%">Nama Rekening</th>
                                            <th style="width:15%">Bruto</th>
                                            <th style="width:15%">Potongan</th>
                                            <th style="width:15%">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-pb" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-pb"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="pb-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:15%" class="text-center">Status</th>
                                            <th style="width:15%">No PB</th>
                                            <th style="width:15%">Tanggal</th>
                                            <th style="width:15%">Deskripsi</th>
                                            <th style="width:15%">Nilai PB</th>
                                            <th style="width:5%" class="text-center">Rekening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="tab-pane" id="data-otorisasi" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">

                            </div>
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>

                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="nik_bdh" >Nik Bendahara</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik_bdh" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik_bdh" id="nik_bdh" name="nik_bdh" value="" title="">
                                        <span class="info-name_nik_bdh hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik_bdh"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="nik_fiatur" >Nik Fiatur</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik_fiatur" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik_fiatur" id="nik_fiatur" name="nik_fiatur" value="" title="">
                                        <span class="info-name_nik_fiatur hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik_fiatur"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="tambah-pb" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">

                            </div>
                            <div class='col-md-12 mt-3' style='min-height:420px; margin:0px; padding:0px;'>

                                <div class="col-md-6 col-sm-12 mt-2">
                                    <label for="no_pb_tambah" >No PB Tambah</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_pb_tambah" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-no_pb_tambah" id="no_pb_tambah" name="no_pb_tambah" value="" title="">
                                        <span class="info-name_no_pb_tambah hidden">
                                            <span></span>
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_no_pb_tambah"></i>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 mt-3">
                                    <button type="button" class="btn btn-sm btn-primary" id="#tambah-pb">Tambah</button>
                                </div>

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
        "{{ url('bdh-trans/spb') }}",
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
            { data: 'no_spb' },
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

    // HITUNG TOTAL SPB (status)
    function hitungTotalSpb(){
        var totalSpb = 0;
        var totalProg  = 0;
        $('#pb-grid tbody tr').each(function(index) {
            var nilai = toNilai($(this).find('.inp-nilai').val())
            var status = $(this).find('.inp-status').val();

            if(status == "SPB"){
                totalSpb += nilai;
            }else{
                totalProg += nilai ;
            }
        });

        $('#totalSpb').val(totalSpb);
        // $('#totalProg').val(totalProg);
    }

    // HITUNG TOTAL ROW SPB
    function hitungTotalRowSpb(){
        var total_row = $('#pb-grid tbody tr').length;
        $('#total-row-pb').html(total_row+' Baris');
    }

    // LOAD DAFTAR FORM
    function getDaftarPb(){
        var url = "{{url('bdh-trans/spb-pb-list')}}";
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'JSON',
            async: false,
            success: function(result){
                var data = result.daftar;
                if(data.length > 0){
                    var html = "";
                    var no = 1;
                    for (let i = 0; i < data.length; i++) {
                        html += "<tr class='row-pb row-pb-"+no+"'>"
                        html += "<td class='no-pb text-center'>"+no+"</td>";
                        html += "</div></td>";
                        html += "<td class='text-center'><div>";
                        html += "<span class='td-status tdstatuske"+no+" tooltip-span'>"+data[i].status+"</span>";
                        html += "<select class='form-control hidden inp-status statuske"+no+"' name='status[]'>";
                        html += "<option value='INPROG'>INPROG</option> <option value='SPB'>SPB</option>";
                        html += "</select>";
                        html += "</div></td>";
                        html += "<td><div>";
                        html += "<span class='td-pb tdpbke"+no+"'>"+data[i].no_pb+"</span>";
                        html += "<input type='text' name='pb[]' class='inp-pb form-control pbke"+no+" hidden'  value='"+data[i].no_pb+"' readonly required>";
                        html += "</div></td>";
                        html += "</div></td>";
                        html += "<td><div>";
                        html += "<span class='td-tgl tdtglke"+no+"'>"+data[i].tgl+"</span>";
                        html += "<input type='text' name='tgl[]' class='inp-tgl form-control tglke"+no+" hidden'  value='"+data[i].tgl+"' readonly required>";
                        html += "</div></td>";
                        html += "<td><div>";
                        html += "<span class='td-keterangan tdketeranganke"+no+"'>"+data[i].keterangan+"</span>";
                        html += "<input type='text' name='keterangan[]' class='inp-keterangan form-control keteranganke"+no+" hidden'  value='"+data[i].keterangan+"' readonly required>";
                        html += "</div></td>";
                        html += "<td class='text-right'>"
                        html += "<span class='td-nilai tdnilaike"+no+"'>"+format_number(data[i].nilai)+"</span>"
                        html += "<input type='text' name='nilai[]' class='inp-nilai form-control nilaike"+no+" hidden currency'  value='"+parseInt(data[i].nilai)+"' required>"
                        html += "</td>"
                        html += "<td class='text-center'><a class='aksi-rekening text-warning' style='font-size:18px;cursor:pointer;'>Rekening</td>";
                        html += "</tr>";
                        no++;
                    }

                    $('#pb-grid >tbody').html(html);

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
                        hitungTotalSpb();
                    });

                    hitungTotalRowSpb();
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();

                }else{
                    alert('Daftar PB Gagal di Load, silahkan coba lagi !');
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
    function hideUnselectedRowPb(){
        $('#pb-grid > tbody >tr').each(function(index,row){
            if(!$(row).hasClass('selected-row')) {
                var status = $('#pb-grid > tbody > tr:eq('+index+') > td').find(".inp-status").val();

                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".inp-status").val(status);
                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".td-status").text(status);

                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".inp-status").hide();
                $('#pb-grid > tbody > tr:eq('+index+') > td').find(".td-status").show();
            }
        });
    }

    $('#pb-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#pb-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowPb();
    });

    $('#pb-grid tbody').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 7){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;
            }else{
                $('#pb-grid td').removeClass('px-0 py-0 aktif');
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
    // END LOAD DAFTAR PB

    // LOAD REKENING
    function loadData(id){
        var url = '{{url("bdh-trans/ver-dok-detail")}}';
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                no_pb : id
            },
            dataType:'JSON',
            async: false,
            success: function(result){
                var data = result.daftar;

                var data_rek = data.detail_rek
                console.log(result);
                if(result.status){
                    var html = "";
                    no =1;
                    for (let i = 0; i < data_rek.length; i++) {
                        html += `<tr>
                            <td>`+no+`</td>
                            <td>`+data_rek[i].bank+`</td>
                            <td>`+data_rek[i].nama+`</td>
                            <td>`+data_rek[i].no_rek+`</td>
                            <td>`+data_rek[i].nama_rek+`</td>
                            <td class="text-right" >`+format_number(data_rek[i].bruto)+`</td>
                            <td class="text-right">`+format_number(data_rek[i].pajak)+`</td>
                            <td>`+data_rek[i].keterangan+`</td>
                        </tr>`;
                        no++;
                    }
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Error',
                        text: "Data dengan No Pb "+id+" Tidak ditemukan"
                    });
                }
                $(".tab-pane").removeClass("active");
                $(".nav-link").removeClass("active");
                $("#data-rekening").addClass("active");
                $('a[href="#data-rekening"]').tab('show')

                $('#rekening-grid >tbody').html(html);
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
    // END LOAD REKENING

    // Event Button Tambah Data
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Verifikasi Dokumen');
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

    // Event BUtton Proses Data
    $('#form-tambah').on('click','.btn-proses', function(e){
        var id = $('#no_pb_aju').val();
        console.log(id);
        loadData(id);
    });

    // Event Button Kembali (Cancel)
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    // event klik rekeing pada tabel daftar pb
    $('#pb-grid').on('click','.aksi-rekening', function(){
        var parent = $(this).closest("tr");
        var id = parent.find('.td-pb').html();
        var status = parent.find('.td-status').html();
        if(status == 'SPB'){
            loadRekening(id);
        }else{
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Error',
                text: "Hanya PB  Berstatus SPB yang dapat diload!"
            });
        }

    });


    // CBBL Form
    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'no_pb_aju':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/ver-dok-pb') }}",
                    columns : [
                        { data: 'no_bukti' },
                        { data: 'keterangan' }
                    ],
                    judul : "Daftar PB Aju",
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

    // GENERATE NO BUKTI
    function generateBukti(){
        var date = $('#form-tambah').find('.inp-tanggal').val();
        var date2 = reverseDate2(date,'/','-');
        // console.log(date2);
        var url = "{{url('bdh-trans/ver-dok-nobukti')}}";

        $.ajax({
            type: 'GET',
            url : url,
            data: {
                tanggal : date2
            },
            dataType: 'JSON',
            async: false,
            success: function(result){
                $('#form-tambah').find('.inp-no_verifikasi').val(result.data);
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
    // END GENERATE NO BUKTI

    // Tambah PB (TAB)
    $('#form-tambah').on('click','#tambah-pb',function(){
       var no_pb =  $('#form-tambah').find('#no_pb_tambah').val();
        if(no_pb == ''){
            msgDialog({
                id: '-',
                type: 'warning',
                title: 'Error',
                text: "No PB Tambah tidak boleh kosong!"
            });
        }else{
            $.ajax({
                type: 'GET',
                url: "{{url('bdh-trans/spb-store-pb')}}",
                data: {
                    no_pb : no_pb
                },
                dataType: 'JSON',
                async: false,
                success: function(result){
                    console.log(result);
                    showNotification("top", "center", "success",'Hapus Data','Data Pb ('+no_pb+') berhasil ditambah ');
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
    });
    // END PB (TAB)

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
                var url = "{{ url('bdh-trans/spb-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('bdh-trans/spb') }}";
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
                            $('#judul-form').html('SPB');
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





    // PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        console.log('click td')
        // if($(this).index() != 6 && $(this).index() != 5){

        //     var id = $(this).closest('tr').find('td').eq(1).html();
        //     var data = dataTable.row(this).data();
        //     var posted = data.posted;
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ url('/esaku-trans/jurnal') }}/"+id,
        //         dataType: 'json',
        //         async:false,
        //         success:function(res){
        //             var result= res.data;
        //             if(result.status){
        //                 var html = `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
        //                     <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
        //                     <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span>
        //                     <div class="dropdown d-inline-block float-right">
        //                         <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
        //                         <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
        //                         </button>
        //                         <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
        //                             <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
        //                             <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
        //                             <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
        //                             <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
        //                             <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
        //                             <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
        //                             <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
        //                         </div>
        //                     </div>
        //                 </div>
        //                 <div class='separator'></div>
        //                 <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) ;position:sticky'>
        //                     <div style='border-bottom: double #d7d7d7;padding:0 1.5rem'>
        //                         <table class="borderless mb-2" width="100%" >
        //                             <tr>
        //                                 <td width="25%" style="vertical-align:top !important"><h6 class="text-primary bold">JURNAL VOUCHER</h6></td>
        //                                 <td width="75%" style="vertical-align:top !important;text-align:right"><h6 class="mb-2 bold">`+result.lokasi[0].nama+`</h6><p style="line-height:1">`+result.lokasi[0].alamat+`<br>`+result.lokasi[0].kota+` `+result.lokasi[0].kodepos+` </p><p class="mt-2">`+result.lokasi[0].email+` | `+result.lokasi[0].no_telp+`</p></td>
        //                             </tr>
        //                         </table>
        //                     </div>
        //                     <div style="padding:0 1.5rem">
        //                         <table class="borderless table-header-prev mt-2" width="100%">
        //                             <tr>
        //                                 <td width="14%">Tanggal</td>
        //                                 <td width="1%">:</td>
        //                                 <td width="20%">`+result.jurnal[0].tanggal+`</td>
        //                                 <td width="30%" rowspan="3"></td>
        //                                 <td width="10%" rowspan="3" style="vertical-align:top !important">Deskripsi</td>
        //                                 <td width="1%" rowspan="3" style="vertical-align:top !important">:</td>
        //                                 <td width="24%" rowspan="3" style="vertical-align:top !important">`+result.jurnal[0].deskripsi+`</td>
        //                             </tr>
        //                             <tr>
        //                                 <td width="14%">No Transaksi</td>
        //                                 <td width="1%">:</td>
        //                                 <td width="20%">`+result.jurnal[0].no_bukti+`</td>
        //                             </tr>
        //                             <tr>
        //                                 <td width="14%">No Dokumen</td>
        //                                 <td width="1%">:</td>
        //                                 <td width="20%">`+result.jurnal[0].no_dokumen+`</td>
        //                             </tr>
        //                         </table>
        //                     </div>
        //                     <div style="padding:0 1.9rem">
        //                         <table class="table table-striped table-body-prev mt-2" width="100%">
        //                         <tr style="background: var(--theme-color-1) !important;color:white !important">
        //                                 <th style="width:15%">Kode Akun</th>
        //                                 <th style="width:20%">Nama Akun</th>
        //                                 <th style="width:15">Nama PP</th>
        //                                 <th style="width:30%">Keterangan</th>
        //                                 <th style="width:10%">Debet</th>
        //                                 <th style="width:10%">Kredit</th>
        //                         </tr>`;
        //                             var det = '';
        //                             var total_debet = 0; var total_kredit =0;
        //                             if(result.detail.length > 0){
        //                                 var no=1;
        //                                 for(var i=0;i<result.detail.length;i++){
        //                                     var line =result.detail[i];
        //                                     if(line.dc == "D"){
        //                                         total_debet+=parseFloat(line.nilai);
        //                                     }else{

        //                                         total_kredit+=parseFloat(line.nilai);
        //                                     }
        //                                     det += "<tr>";
        //                                     det += "<td >"+line.kode_akun+"</td>";
        //                                     det += "<td >"+line.nama_akun+"</td>";
        //                                     det += "<td >"+line.nama_pp+"</td>";
        //                                     det += "<td >"+line.keterangan+"</td>";
        //                                     det += "<td class='text-right'>"+(line.dc == "D" ? format_number(line.nilai) : 0)+"</td>";
        //                                     det += "<td class='text-right'>"+(line.dc == "C" ? format_number(line.nilai) : 0)+"</td>";
        //                                     det += "</tr>";
        //                                     no++;
        //                                 }
        //                             }
        //                             det+=`<tr style="background: var(--theme-color-1) !important;color:white !important">
        //                                 <th colspan="4"></th>
        //                                 <th style="width:10%">`+format_number(total_debet)+`</th>
        //                                 <th style="width:10%">`+format_number(total_kredit)+`</th>
        //                         </tr>`;

        //                         html+=det+`
        //                         </table>
        //                         <table class="table-borderless mt-2" width="100%">
        //                             <tr>
        //                                 <td width="25%">&nbsp;</td>
        //                                 <td width="25%">&nbsp;</td>
        //                                 <td width="10%">&nbsp;</td>
        //                                 <td width="20%" class="text-center">Dibuat Oleh</td>
        //                                 <td width="20%" class="text-center">Diperiksa Oleh</td>
        //                             </tr>
        //                             <tr>
        //                                 <td width="25%">&nbsp;</td>
        //                                 <td width="25%">&nbsp;</td>
        //                                 <td width="10%">&nbsp;</td>
        //                                 <td width="20%" style="height:100px"></td>
        //                                 <td width="20%" style="height:100px"></td>
        //                             </tr>
        //                         </table>
        //                     </div>
        //                 </div>`;
        //                 $('#content-bottom-sheet').html(html);

        //                 var scroll = document.querySelector('.preview-body');
        //                 var psscroll = new PerfectScrollbar(scroll);


        //                 $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});

        //                 $('.preview-header').on('click','#btn-delete2',function(e){
        //                     var id = $('#preview-id').text();
        //                     $('.c-bottom-sheet').removeClass('active');
        //                     msgDialog({
        //                         id:id,
        //                         type:'hapus'
        //                     });
        //                 });

        //                 $('.preview-header').on('click', '#btn-edit2', function(){
        //                     var id= $('#preview-id').text();
        //                     $('#judul-form').html('Edit Data Jurnal');
        //                     $('#form-tambah')[0].reset();
        //                     $('#form-tambah').validate().resetForm();

        //                     $('#btn-save').attr('type','button');
        //                     $('#btn-save').attr('id','btn-update');
        //                     $('.c-bottom-sheet').removeClass('active');
        //                     editData(id);
        //                 });

        //                 $('.preview-header').on('click','#btn-cetak',function(e){
        //                     e.stopPropagation();
        //                     $('.dropdown-ke1').addClass('hidden');
        //                     $('.dropdown-ke2').removeClass('hidden');
        //                     console.log('ok');
        //                 });

        //                 $('.preview-header').on('click','#btn-cetak2',function(e){
        //                     // $('#dropdownAksi').dropdown('toggle');
        //                     e.stopPropagation();
        //                     $('.dropdown-ke1').removeClass('hidden');
        //                     $('.dropdown-ke2').addClass('hidden');
        //                 });

        //                 if(posted == "Close"){
        //                     console.log(posted);
        //                     $('.preview-header #btn-delete2').css('display','none');
        //                     $('.preview-header #btn-edit2').css('display','none');
        //                 }else{
        //                     $('.preview-header #btn-delete2').css('display','inline-block');
        //                     $('.preview-header #btn-edit2').css('display','inline-block');
        //                 }
        //                 $('#trigger-bottom-sheet').trigger("click");
        //             }
        //             else if(!result.status && result.message == 'Unauthorized'){
        //                 window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
        //             }
        //         }
        //     });

        // }
    });

    // END PREVIEW


</script>
