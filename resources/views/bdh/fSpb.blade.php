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
<x-list-data judul="Data SPB" tambah="true" :thead="array('No SPB','Tanggal','Deskripsi','Nilai','Aksi')" :thwidth="array(15,20,25,35,10)" :thclass="array('','','','','text-center')" />
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
                               <div class="col-md-4 col-sm-12">
                                   <label for="no_bukti">No Bukti</label>
                                   <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" value="-" readonly>
                               </div>
                               <div class="col-md-4 col-sm-12">
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                           </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-10">
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
                                    <label for="total_spb" >Total SPB</label>
                                    <input class="form-control currency" type="text" placeholder="Total SPB" readonly id="totalSpb" name="total_spb" value="0">
                                </div>
                                {{-- test only --}}
                                {{-- <div class="col-md-6 col-sm-12">
                                    <label for="total_prog" >Total prog</label>
                                    <input class="form-control currency" type="text" placeholder="Total SPB" readonly id="totalProg" name="total_prog" value="0">
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav tabs col-12" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#data-pb" role="tab" aria-selected="true">
                                <span>Daftar PB</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-rekening" role="tab" aria-selected="true">
                                <span>Daftar Transfer</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-pb" role="tabpanel">
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

                        <div class="tab-pane" id="data-rekening" role="tabpanel">
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
                                            <th style="width:15%">Netto</th>
                                            <th style="width:5%" class="text-center">jenis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
{{-- end form data --}}

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>


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
                        html += "<option value='INPROG'>INPROG</option><option value='SPB'>SPB</option>";
                        html += "</select>";
                        html += "</div></td>";
                        html += "<td><div>";
                        html += "<span class='td-pb tdpbke"+no+"'>"+data[i].no_pb+"</span>";
                        html += "<input type='text' name='pb[]' class='inp-pb form-control pbke"+no+" hidden currency'  value='"+data[i].no_pb+"' readonly required>";
                        html += "</div></td>";
                        html += "</div></td>";
                        html += "<td><div>";
                        html += "<span class='td-tgl tdtglke"+no+"'>"+data[i].tgl+"</span>";
                        html += "<input type='text' name='tgl[]' class='inp-tgl form-control tglke"+no+" hidden currency'  value='"+data[i].tgl+"' readonly required>";
                        html += "</div></td>";
                        html += "<td><div>";
                        html += "<span class='td-keterangan tdketeranganke"+no+"'>"+data[i].keterangan+"</span>";
                        html += "<input type='text' name='keterangan[]' class='inp-keterangan form-control keteranganke"+no+" hidden currency'  value='"+data[i].keterangan+"' readonly required>";
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

    // Event Button Tambah Data
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data SPB');
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
        // generateBukti();
        getDaftarPb();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
</script>
