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
    .vertical-timeline {
        width: 100%;
        position: relative;
        padding: 1.5rem 0 1rem
    }

    .vertical-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 67px;
        height: 100%;
        width: 4px;
        background: #e9ecef;
        border-radius: .25rem
    }

    .vertical-timeline-element {
        position: relative;
        margin: 0 0 1rem
    }

    .vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
        visibility: visible;
        animation: cd-bounce-1 .8s
    }

    .vertical-timeline-element-icon {
        position: absolute;
        top: 0;
        left: 60px
    }

    .vertical-timeline-element-icon .badge-dot-xl {
        box-shadow: 0 0 0 5px #fff
    }

    .badge-dot-xl {
        width: 18px;
        height: 18px;
        position: relative
    }

    .badge:empty {
        display: none
    }

    .badge-dot-xl::before {
        content: '';
        width: 10px;
        height: 10px;
        border-radius: .25rem;
        position: absolute;
        left: 50%;
        top: 50%;
        margin: -5px 0 0 -5px;
        background: #fff
    }

    .vertical-timeline-element-content {
        position: relative;
        margin-left: 90px;
        font-size: .8rem
    }

    .vertical-timeline-element-content .timeline-title {
        font-size: .8rem;
        text-transform: uppercase;
        margin: 0 0 .5rem;
        padding: 2px 0 0;
        font-weight: bold
    }

    .vertical-timeline-element-content .vertical-timeline-element-date {
        display: block;
        position: absolute;
        left: -90px;
        top: 0;
        padding-right: 10px;
        text-align: right;
        color: #adb5bd;
        font-size: .7619rem;
        white-space: nowrap
    }

    .vertical-timeline-element-content:after {
        content: "";
        display: table;
        clear: both
    }
</style>

{{-- FILTER AREA--}}
<div class="row mb-4" id="form-filter">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;" >
                <h6 id="judul-page" style="position:absolute;top:25px">Filter Data</h6>
            </div>
            <div class="separator mb-2"></div>
            <div class="card-body pt-3">
                <div class="form-group col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mt-2 mb-2">
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
                        <div class="col-md-6 col-sm-12 mb-2">
                            <button type="button" class="btn btn-primary mt-4 btn-proses">Proses</button>
                            <button type="button" class="btn btn-red mt-4 btn-reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- END FILTER AREA --}}


<!-- LIST DATA -->
<x-list-data judul="Daftar Bukti" tambah="" :thead="array('Modul','No Bukti','No App','Deskripsi','Nilai','Status','Aksi')" :thwidth="array(15,15,15,35,15,15,10)" :thclass="array('','','','','','text-center','text-center')" />
<!-- END LIST DATA -->


{{-- form data --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    {{-- <input type="hidden" id="tanggal" name="tanggal"> --}}
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
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control inp-tanggal datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}" required>
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
                        <div class="form-group col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="deskripsi">Catatan</label>
                                    <textarea class="form-control" rows="4" id="deskripsi" name="deskripsi" required></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row mb-1">
                                <div class="col-md-12 col-sm-12">
                                    <label for="no_bukti">No Bukti</label>
                                    <input type="text" name="no_bukti" id="no_bukti" class="form-control inp-no_bukti" readonly>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="modul">Modul</label>
                                    <input type="text" name="modul" id="modul" class="form-control inp-modul" readonly>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="tgl_bukti">Tanggal Bukti</label>
                                    <input type="text" name="tgl_bukti" id="tgl_bukti" class="form-control" readonly>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="due_date">Due Date</label>
                                    <input type="text" name="due_date" id="due_date" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="no_dokumen">No Dokumen</label>
                                    <input type="text" name="no_dokumen" id="no_dokumen" class="form-control inp-no_dokumen" readonly>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="pp_unit">PP / Unit</label>
                                    <input type="text" name="pp_unit" id="pp_unit" class="form-control" readonly>
                                    <input type="hidden" class="form-control inp-kode_pp" id="kode_pp" value="" name="kode_pp">
                                    <input type="hidden" class="form-control inp-lokasi" name="lokasi" id="lokasi" value="">
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="deskripsi_m">Deskripsi</label>
                                    <input type="text" name="deskripsi_m" id="deskripsi_m" class="form-control" readonly>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label for="pembuat_m" >Pembuat</label>
                                    <input class="form-control" type="text"  readonly id="pembuat_m" name="pembuat_m">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="col-md-12 col-sm-12">
                                <label for="total_usul" >Total Usulan</label>
                                <input class="form-control currency" type="text" placeholder="Total Jurnal" readonly id="total_usul" name="total_usul" value="0">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <label for="total_approve" >Total Approve</label>
                                <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total_approve" name="total_approve" value="0">
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
                            <a class="nav-link" data-toggle="tab" href="#data-dok" role="tab" aria-selected="true">
                                <span>File Dokumen</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#data-penerima" role="tab" aria-selected="true">
                                <span>Rekening Penerima</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom:2.5rem">
                        <div class="tab-pane active" id="data-permintaan" role="tabpanel">
                            <div class="table-responsive">
                                 <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                     <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-jurnal"></span></a>
                                 </div>
                                 <table class="table table-bordered table-condensed gridexample" id="jurnal-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                     <thead style="background:#F8F8F8">
                                         <tr>
                                             <th style="width:3%">No</th>
                                             <th style="width:13%">Kode Akun</th>
                                             <th style="width:15%">Nama Akun</th>
                                             <th style="width:20%">Kegiatan</th>
                                             <th class='text-right' style="width:15%">Nilai Usulan</th>
                                             <th class='text-right' style="width:15%">Nilai Approve</th>
                                             <th style="width:13%">ID</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                     </tbody>
                                 </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="data-dok" role="tabpanel">
                            <div class="table-responsive">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-dok"></span></a>
                                </div>

                                <table class="table table-bordered table-condensed gridexample" id="dok-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%" class="text-center">No</th>
                                            <th style="width:15%" class="text-center">Kode Jenis</th>
                                            <th style="width:15%">Nama Jenis</th>
                                            <th style="width:25%">Path File</th>
                                            <th style="width:5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="data-penerima" role="tabpanel">

                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                </div>
                                <div class="form-row mt-3">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <label for="akun_mutasi" >Akun Mutasi</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                        <span class="input-group-text info-code_akun_mutasi" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                                    </div>
                                                    <input type="text" class="form-control inp-label-akun_mutasi" id="akun_mutasi" name="akun_mutasi" value="" title="" required>
                                                    <span class="info-name_akun_mutasi hidden">
                                                        <span></span>
                                                    </span>
                                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                                    <i class="simple-icon-magnifier search-item2" id="search_akun_mutasi"></i>
                                                </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-4 col-sm-12">
                                               <label for="bank">Bank</label>
                                               <input type="text" name="bank" id="bank" class="inp-bank form-control" required>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-4 col-sm-12">
                                               <label for="no_rek">No Rekening</label>
                                               <input type="text" name="no_rek" id="no_rek" class="inp-no_rek form-control" required>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-4 col-sm-12">
                                               <label for="nama_rek">Nama Rekening</label>
                                               <input type="text" name="nama_rek" id="nama_rek" class="inp-nama_rek form-control" required>
                                           </div>
                                       </div>
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
        $('#jurnal-grid tbody').empty();
        $('#dok-grid tbody').empty();
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
       var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
        var dataTable = generateTable(
            "table-data",
            "{{ url('bdh-trans/droping-app') }}",
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
                { data: 'modul' },
                { data: 'no_bukti' },
                {data: null, defaultContent:'-'},
                { data: 'keterangan' },
                {data: 'nilai',className: 'text-right' ,render: $.fn.dataTable.render.number('.', ',', 2, '')},
                { data: 'status',className:'text-center' },

            ],
            "{{ url('bdh-auth/sesi-habis') }}",
            [[4 ,"desc"]]
        );

        $.fn.DataTable.ext.pager.numbers_length = 6;

        $("#searchData").on("keyup", function (event) {
            dataTable.search($(this).val()).draw();
        });

        $("#page-count").on("change", function (event) {
            var selText = $(this).val();
            dataTable.page.len(parseInt(selText)).draw();
        });
        // END LIST DATA

    // Event Button Tambah Data
    $('#saku-datatable').on('click', '#btn-tambah', function() {
        resetForm()
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Approval Droping Dana');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#id_edit').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-filter').hide();
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


    $('#saku-datatable').on('click', '#btn-delete', function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        console.log(id);
        msgDialog({
            id: id,
            type:'hapus'
        });
    });

    // CBBL Form
    $('#form-tambah').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'akun_mutasi':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/droping-app-akun-mutasi') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun Mutasi",
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

     // CBBL FILTER
     $('#form-filter').on('click', '.search-item2', function() {
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'no_pb_aju':
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('bdh-trans/droping-app-aju') }}",
                    columns : [
                        { data: 'no_minta' },
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
    // EMD CBBL FILTER

    // STAR BTN PROSES FILTER
    $('#form-filter').on('click', '.btn-proses', function(e){
        e.preventDefault();
        var pb_aju = $('#no_pb_aju').val();
        if(pb_aju == '' || pb_aju == undefined){
            alert('No Pb Aju Harus di isi !.');
            return false
        }else{
            console.log('BTN PROSES ' +pb_aju);
            load_filter(pb_aju);
        }
    });
    // END BTN PROSES FILTER

    function load_filter(id){
        var action_html = "<a href='#' title='Edit' id='btn-edit2'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
        generateTable(
            "table-data",
            "{{ url('bdh-trans/droping-app')}}/"+id,
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
                { data: 'modul' },
                { data: 'no_bukti' },
                { data: 'no_app' },
                { data: 'keterangan' },
                {data: 'nilai',className: 'text-right' ,render: $.fn.dataTable.render.number('.', ',', 2, '')},
                { data: 'status',className:'text-center' },

            ],
            "{{ url('bdh-auth/sesi-habis') }}",
            [[4 ,"desc"]]
        );
    }

    // event btn edit
    $('#saku-datatable').on('click', '#btn-edit', function(e){
        var id = $(this).closest('tr').find('td').eq(1).html();
        console.log('btn-edit '+id);
        $('#jurnal-grid tbody').empty();
        $('#dok-grid tbody').empty();
        $.ajax({
            type: 'GET',
            url : '{{url("bdh-trans/droping-app-detail")}}',
            data: {
                no_aju : id
            },
            dataType: 'JSON',
            success: function(res){
                var data = res.daftar;
                var data_m = data.data;
                var data_jurnal = data.data_detail;
                var data_dok = data.data_dok;
                // $('#form-tambah #status').val(data_m[0].status);
                $('#form-tambah #no_bukti').val(data_m[0].no_bukti);
                $('#form-tambah #no_dokumen').val(data_m[0].no_dokumen);
                $('#form-tambah #tgl_bukti').val(data_m[0].tgl);
                $('#form-tambah #pp_unit').val(data_m[0].pp);
                $('#form-tambah #due_date').val(data_m[0].tgl2);
                $('#form-tambah #deskripsi_m').val(data_m[0].keterangan);
                $('#form-tambah #pembuat_m').val(data_m[0].pembuat);
                $("textarea#deskripsi").val(data.memo);
                $("#form-tambah #modul").val(data_m[0].modul);
                $("#form-tambah #kode_pp").val(data_m[0].kode_pp);
                $("#form-tambah #lokasi").val(data_m[0].kode_lokasi);
                for (let i = 0; i < data_jurnal.length; i++) {
                    var no=$('#jurnal-grid .row-jurnal:last').index();
                    no=no+2;
                    var input = "";
                    input += "<tr class='row-jurnal'>";
                    input += "<td class='no-jurnal text-center'>"+no+"</td>";
                    input += "<td><span class='td-kode_akun tdnmakunke"+no+" tooltip-span'>"+data_jurnal[i].kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode_akun nmakunke"+no+" hidden'  value='"+data_jurnal[i].kode_akun+"' readonly></td>";
                    input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+data_jurnal[i].nama+"</span><input type='text' name='nama[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+data_jurnal[i].nama+"' readonly></td>";
                    input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+data_jurnal[i].keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+data_jurnal[i].keterangan+"' required></td>";
                    input += "<td class='text-right'><span class='td-nilai_usul tdnilusulke"+no+" tooltip-span'>"+format_number(data_jurnal[i].nilai_usul)+"</span><input type='text' name='nilai_usul[]' class='form-control inp-nilai_usul nilke"+no+" hidden'  value='"+format_number(data_jurnal[i].nilai_usul)+"' required></td>";
                    input += "<td class='text-right'><span class='td-nilai_app tdnilappke"+no+" tooltip-span'>"+format_number(data_jurnal[i].nilai_app)+"</span><input type='text' name='nilai_app[]' class='form-control inp-nilai_app nilappke"+no+" hidden'  value='"+format_number(data_jurnal[i].nilai_app)+"' required></td>";
                    input += "<td><span class='td-nu tdnunke"+no+" tooltip-span'>"+data_jurnal[i].nu+"</span><input type='text' name='nu[]' class='form-control inp-nu nunke"+no+" hidden'  value='"+data_jurnal[i].nu+"' readonly></td>";

                    input += "</tr>";
                }
                $('#jurnal-grid tbody').append(input);
                hideUnselectedRowJurnal();
                $('.tooltip-span').tooltip({
                    title: function(){
                        return $(this).text();
                    }
                });
                $('.nilappke'+no).inputmask("numeric", {
                    radixPoint: ",",
                    groupSeparator: ".",
                    digits: 2,
                    autoGroup: true,
                    rightAlign: true,
                    oncleared: function () { self.Value(''); }
                });
                hitungTotalRowJurnal();
                hitungTotal();
                // jurnal grid edit

                var no_dok = 1;
                var html_dok = '';
                for (let r = 0; r < data_dok.length; r++) {
                    var dok = "{{ config('api.url').'bdh-auth/storage' }}/"+data_dok[r].no_gambar;
                    html_dok += `<tr>
                        <td>`+no_dok+`</td>
                        <td>`+data_dok[r].kode_jenis+`</td>
                        <td>`+data_dok[r].nama+`</td>
                        <td>`+data_dok[r].no_gambar+`</td>

                        <td class='text-center'>
                            <a href="`+dok+`" target='_blank' class="text-primary"><i class='simple-icon-cloud-download'></i></a>
                        </td>
                    </tr>`;
                    no_dok++;
                }
                $('#dok-grid >tbody').html(html_dok);

            }
        });

        $('#saku-datatable').hide();
        $('#form-filter').hide();
        $('#saku-form').show();
    });

    // event btn edit 2
    $('#saku-datatable').on('click', '#btn-edit2', function(e){
        var id = $(this).closest('tr').find('td').eq(1).html();
        var id2 = $(this).closest('tr').find('td').eq(2).html();
        console.log('btn-edit '+id+' and '+id2);
        $('#jurnal-grid tbody').empty();
        $('#dok-grid tbody').empty();
        $.ajax({
            type: 'GET',
            url : '{{url("bdh-trans/droping-app-detail-edit")}}',
            data: {
                no_aju : id,
                no_app : id2
            },
            dataType: 'JSON',
            success: function(res){
                var data = res.daftar;
                var data_m = data.data;
                var data_jurnal = data.data_detail;
                var data_dok = data.data_dok;
                var data_rek = data.data_rek;
                // $('#form-tambah #status').val(data_m[0].status);
                $('#id_edit').val('edit');
                $('#id').val(id);
                $('#method').val('post');
                $('#form-tambah #status').val(data_m[0].status);
                $('textarea#deskripsi').val(data_m[0].keterangan);
                $('#form-tambah #no_bukti').val(data_m[0].no_bukti);
                $('#form-tambah #no_dokumen').val(data_m[0].no_dokumen);
                $('#form-tambah #tgl_bukti').val(data_m[0].tgl);
                $('#form-tambah #pp_unit').val(data_m[0].pp);
                $('#form-tambah #due_date').val(data_m[0].tgl2);
                $('#form-tambah #deskripsi_m').val(data_m[0].keterangan);
                $('#form-tambah #pembuat_m').val(data_m[0].pembuat);
                $("textarea#deskripsi").val(data.memo);
                $("#form-tambah #modul").val(data_m[0].modul);
                $("#form-tambah #kode_pp").val(data_m[0].kode_pp);
                $("#form-tambah #lokasi").val(data_m[0].kode_lokasi);

                $('#form-tambah #bank').val(data_rek[0].bank);
                $('#form-tambah #no_rek').val(data_rek[0].no_rek);
                $('#form-tambah #nama_rek').val(data_rek[0].nama_rek);
                // showInfoField("akun_mutasi",data_rek[0].akun_kb,line1.nama_akun);
                for (let i = 0; i < data_jurnal.length; i++) {
                    var no=$('#jurnal-grid .row-jurnal:last').index();
                    no=no+2;
                    var input = "";
                    input += "<tr class='row-jurnal'>";
                    input += "<td class='no-jurnal text-center'>"+no+"</td>";
                    input += "<td><span class='td-kode_akun tdnmakunke"+no+" tooltip-span'>"+data_jurnal[i].kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode_akun nmakunke"+no+" hidden'  value='"+data_jurnal[i].kode_akun+"' readonly></td>";
                    input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+data_jurnal[i].nama+"</span><input type='text' name='nama[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+data_jurnal[i].nama+"' readonly></td>";
                    input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+data_jurnal[i].keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+data_jurnal[i].keterangan+"' required></td>";
                    input += "<td class='text-right'><span class='td-nilai_usul tdnilusulke"+no+" tooltip-span'>"+format_number(data_jurnal[i].nilai_usul)+"</span><input type='text' name='nilai_usul[]' class='form-control inp-nilai_usul nilke"+no+" hidden'  value='"+format_number(data_jurnal[i].nilai_usul)+"' required></td>";
                    input += "<td class='text-right'><span class='td-nilai_app tdnilappke"+no+" tooltip-span'>"+format_number(data_jurnal[i].nilai_app)+"</span><input type='text' name='nilai_app[]' class='form-control inp-nilai_app nilappke"+no+" hidden'  value='"+format_number(data_jurnal[i].nilai_app)+"' required></td>";
                    input += "<td><span class='td-nu tdnunke"+no+" tooltip-span'>"+data_jurnal[i].nu+"</span><input type='text' name='nu[]' class='form-control inp-nu nunke"+no+" hidden'  value='"+data_jurnal[i].nu+"' readonly></td>";

                    input += "</tr>";
                }
                $('#jurnal-grid tbody').append(input);
                hideUnselectedRowJurnal();
                $('.tooltip-span').tooltip({
                    title: function(){
                        return $(this).text();
                    }
                });
                $('.nilappke'+no).inputmask("numeric", {
                    radixPoint: ",",
                    groupSeparator: ".",
                    digits: 2,
                    autoGroup: true,
                    rightAlign: true,
                    oncleared: function () { self.Value(''); }
                });
                hitungTotalRowJurnal();
                hitungTotal();
                // jurnal grid edit

                var no_dok = 1;
                var html_dok = '';
                for (let r = 0; r < data_dok.length; r++) {
                    var dok = "{{ config('api.url').'bdh-auth/storage' }}/"+data_dok[r].no_gambar;
                    html_dok += `<tr>
                        <td>`+no_dok+`</td>
                        <td>`+data_dok[r].kode_jenis+`</td>
                        <td>`+data_dok[r].nama+`</td>
                        <td>`+data_dok[r].no_gambar+`</td>

                        <td class='text-center'>
                            <a href="`+dok+`" target='_blank' class="text-primary"><i class='simple-icon-cloud-download'></i></a>
                        </td>
                    </tr>`;
                    no_dok++;
                }
                $('#dok-grid >tbody').html(html_dok);

            }
        });

        $('#saku-datatable').hide();
        $('#form-filter').hide();
        $('#saku-form').show();
    });

    $('#jurnal-grid').on('change', '.inp-nilai_app', function(e){
        console.log("HItung Total After Change");
        hitungTotal();
    });

    function hitungTotal(){
        var total_u = 0;
        var total_a = 0;
        $('.row-jurnal').each(function(){
            var total_usul = $(this).closest('tr').find('.inp-nilai_usul').val();
            var total_app = $(this).closest('tr').find('.inp-nilai_app').val();

            total_u = total_u + toNilai(total_usul);
            total_a = total_a + toNilai(total_app);
        });

        $('#form-tambah #total_usul').val(format_number(total_u));
        $('#form-tambah #total_approve').val(format_number(total_a));
    }
    // end event btn edit

    // Jurnal  Grid
    function hitungTotalRowJurnal(){
        var total_row = $('#jurnal-grid tbody tr').length;
        $('#total-row-jurnal').html(total_row+' Baris');
    }
    function hideUnselectedRowJurnal() {
        $('#jurnal-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {

                var nilai_app = $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_app").val();


                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_app").val(nilai_app);
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nilai_app").text(nilai_app);


                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai_app").hide();
                $('#jurnal-grid > tbody > tr:eq('+index+') > td').find(".td-nilai_app").show();
            }
        })
    }
    $('#form-tambah').on('click', '.add-row-jurnal', function(){
        addRowJurnal();
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

                var nilai = $(this).parents("tr").find(".inp-nilai_app").val();

                var no = $(this).parents("tr").find(".no-jurnal").text();


                if(nilai == "" && idx == 5){
                    $(this).parents("tr").find(".inp-nilai_app").val(nilai);
                    $(this).parents("tr").find(".td-nilai_app").text(nilai);
                }else{
                    $(this).parents("tr").find(".inp-nilai_app").val(nilai);
                    $(this).parents("tr").find(".td-nilai_app").text(nilai);
                }

                if(idx == 5){
                    $(this).parents("tr").find(".inp-nilai_app").show();
                    $(this).parents("tr").find(".td-nilai_app").hide();
                    $(this).parents("tr").find(".inp-nilai_app").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai_app").hide();
                    $(this).parents("tr").find(".td-nilai_app").show();
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
                var url = "{{ url('bdh-trans/droping-app-ubah') }}";
                var pesan = "updated";
                var method = 'POST';
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('bdh-trans/droping-app') }}";
                var method = 'POST';
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            // $('#pemberi-grid tbody tr').each(function(index) {
            //     formData.append('no_pemberi[]', $(this).find('.no-pemberi').text())
            // })


            // if(parameter == "edit") {
            //     formData.append('no_bukti', id)
            // }

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
                        $('#judul-form').html('SPB');
                        $('#method').val('post');
                        resetForm();
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'simpan'
                        });
                        last_add("no_pdrk",result.data.no_bukti);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/bdh-auth/sesi-habis') }}";
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        });
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
            url: "{{ url('bdh-trans/droping-app') }}",
            data: {
                no_aju : id.id,
                modul : id.modul,
                no_app : id.no_app
            },
            dataType: 'json',
            async:false,
            success:function(result){
                var data = result;
                if(data.status){
                    dataTable.ajax.reload();
                    resetForm();
                    showNotification("top", "center", "success",'Hapus Data','Data Approval Droping ('+id+') berhasil dihapus ');
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
        var id = $(this).closest('tr').find('td').eq(1).html();
        var modul = $(this).closest('tr').find('td').eq(0).html();
        var no_app = $(this).closest('tr').find('td').eq(2).html();
        console.log(id);
        msgDialog({
            id: {
                id: id,
                modul:modul,
                no_app: no_app
            },
            type:'hapus'
        });
    });

    $('#form-filter').on('click', '.btn-reset', function(e){
        dataTable.ajax.reload();
        var par = $('.simple-icon-close').closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        // $(this).addClass('hidden');
    });


</script>
