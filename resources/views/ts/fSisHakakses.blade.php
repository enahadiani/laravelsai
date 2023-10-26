<link rel="stylesheet" href="{{ asset('master-new.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form-new.css?version=_').time() }}" />
<!-- LIST DATA -->
<x-list-data judul="Data Akses User" tambah="true" :thead="array('NIK','Nama','Kode Menu','Kode Lokasi','Kode PP','Aksi')" :thwidth="array(15,45,10,10,10,10)" :thclass="array('','','','','','text-center')" />
<!-- FORM  -->
<style>
    #tgl_selesai-dp .datepicker-dropdown
      {
          left: 20px !important;
          top: 190px !important;
      }
</style>
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="kode_lokasi" name="kode_lokasi" value="-">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="submit" id="btn-save" class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="kode_pp">Kode PP</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-kode_pp" autocomplete="off" id="kode_pp" name="kode_pp" value="" title="" data-input="cbbl" readonly>
                                <span class="info-name_kode_pp hidden">
                                    <span></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                            </div>                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="nik">NIK</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_nik" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-nik" autocomplete="off" id="nik" name="nik" value="" title="" data-input="cbbl" readonly>
                                <span class="info-name_nik hidden">
                                    <span></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_nik"></i>
                            </div>                        
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" placeholder="Password" id="password" name="pass" autocomplete="off" >                                       
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="kode_menu">Menu</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_menu" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-kode_menu" autocomplete="off" id="kode_menu" name="kode_menu" value="" title="" data-input="cbbl" readonly>
                                <span class="info-name_kode_menu hidden">
                                    <span></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_menu"></i>
                            </div>                        
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="kode_form">Form Default Awal</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_form" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="form-control inp-label-kode_form" autocomplete="off" id="kode_form" name="kode_form" value="" title="" data-input="cbbl" readonly>
                                <span class="info-name_kode_form hidden">
                                    <span></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_form"></i>
                            </div>                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="status_login">Status Login</label>
                            <select class='form-control selectize' id="status_login" name="status_login">
                                <option value=''>--- Pilih Status ---</option>
                                <option value='A'>Admin</option>
                                <option value='S'>Siswa</option>
                            </select>                
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="no_hp">No HP</label>
                            <input class='form-control' type="text" id="no_hp" name="no_hp">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 col-sm-12">
                            <label for="tgl_selesai">Tgl Selesai</label>
                            <span id="tgl_selesai-dp"></span>
                            <input class='form-control datepicker' type="text" id="tgl_selesai" name="tgl_selesai" value="{{ date('d/m/Y') }}">
                            <i style="font-size: 18px;margin-top:28px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="flag_aktif">Status Aktif</label>
                            <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                <option value=''>--- Pilih Status ---</option>
                                <option value='1'>AKTIF</option>
                                <option value='0'>NON AKTIF</option>
                            </select>                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END FORM -->

<!-- MODAL FILTER -->
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="modalFilter" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 280px;">
        <div class="modal-content" style="border-radius:0px !important">
            <form id="form-filter">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="modal-title pl-0">Filter</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="right: 0px !important;top: 25px !important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div class="form-group row inp-filter">
                        <label class="col-md-12" for="filter_lokasi">Lokasi</label>
                        <div class="input-group col-12">
                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                <span class="input-group-text info-code_filter_lokasi" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                            </div>
                            <input type="text" class="form-control inp-label-filter_lokasi" id="filter_lokasi" name="filter_lokasi" value="" title="">
                            <span class="info-name_filter_lokasi hidden">
                                <span></span> 
                            </span>
                            <i class="simple-icon-close float-right info-icon-hapus hidden" style="right: 50px;"></i>
                            <i class="simple-icon-magnifier search-item2" id="search_filter_lokasi" style="right: 25px;"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;position:absolute;bottom:0;justify-content:flex-end;width:100%">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL FILTER -->

@include('modal_search')
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
// SET UP FORM //
$('#saku-form > .col-12').addClass('mx-auto col-lg-8');
$('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
setHeightForm();

var bottomSheet = new BottomSheet("country-selector");
document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
window.bottomSheet = bottomSheet;

$('.selectize').selectize();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});


$("#tgl_selesai").datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
    container:'span#tgl_selesai-dp',
    templates: {
        leftArrow: '<i class="simple-icon-arrow-left"></i>',
        rightArrow: '<i class="simple-icon-arrow-right"></i>'
    },
    orientation: 'bottom left'
});

$('[data-toggle="tooltip"]').tooltip(); 

$('.info-icon-hapus').click(function(){
    var par = $(this).closest('div').find('input').attr('name');
    $('#'+par).val('');
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
// END SET UP FORM //
// PLUGIN SCROLL di bagian preview dan form input
var scroll = document.querySelector('#content-preview');
var psscroll = new PerfectScrollbar(scroll);

var scrollform = document.querySelector('.form-body');
var psscrollform = new PerfectScrollbar(scrollform);
// END PLUGIN SCROLL di bagian preview dan form input
// FUNCTION GET DATA //
function getNIK(kode, kode_pp){
    $.ajax({
        type: 'GET',
        url: "{{ url('ts-master/sis-hakakses-nik') }}",
        dataType: 'json',
        data:{nik: kode, kode_pp: kode_pp},
        async:false,
        success:function(result){    
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    showInfoField('nik',result.daftar[0].nik,result.daftar[0].nama);
                }else{
                    $('#nik').attr('readonly',false);
                    $('#nik').css('border-left','1px solid #d7d7d7');
                    $('#nik').val('');
                    $('#nik').focus();
                }
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('ts-auth/sesi-habis') }}";
            }
        }
    });
}

function getMenu(kode){
    $.ajax({
        type: 'GET',
        url: "{{ url('ts-master/sis-hakakses-menu') }}",
        dataType: 'json',
        data:{kode_menu: kode},
        async:false,
        success:function(res){
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    showInfoField('kode_menu',result.daftar[0].kode_menu,result.daftar[0].nama);
                }else{
                    $('#kode_menu').attr('readonly',false);
                    $('#kode_menu').css('border-left','1px solid #d7d7d7');
                    $('#kode_menu').val('');
                    $('#kode_menu').focus();
                }
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('ts-auth/sesi-habis') }}";
            }
        }
    });
}


function getForm(kode){
    $.ajax({
        type: 'GET',
        url: "{{ url('ts-master/sis-hakakses-form') }}",
        dataType: 'json',
        data:{kode_form: kode},
        async:false,
        success:function(res){ 
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    showInfoField('kode_form',result.daftar[0].kode_form,result.daftar[0].nama_form);
                }else{
                    $('#kode_form').attr('readonly',false);
                    $('#kode_form').css('border-left','1px solid #d7d7d7');
                    $('#kode_form').val('');
                    $('#kode_form').focus();
                }
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('ts-auth/sesi-habis') }}";
            }
        }
    });
}


function getPP(kode){
    $.ajax({
        type: 'GET',
        url: "{{ url('ts-master/sis-hakakses-pp') }}",
        dataType: 'json',
        data:{kode_pp: kode},
        async:false,
        success:function(res){ 
            if(result.status){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                    showInfoField('kode_pp',result.daftar[0].kode_pp,result.daftar[0].nama);
                }else{
                    $('#kode_pp').attr('readonly',false);
                    $('#kode_pp').css('border-left','1px solid #d7d7d7');
                    $('#kode_pp').val('');
                    $('#kode_pp').focus();
                }
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('ts-auth/sesi-habis') }}";
            }
        }
    });
}

// END FUNCTION GET DATA //
// EVENT CHANGE //
$('#nik').change(function(){
    var value = $(this).val();
    var kode_pp = $('#kode_pp').val();
    getNIK(value,kode_pp);
});
$('#kode_menu').change(function(){
    var value = $(this).val();
    getMenu(value);
});
$('#kode_form').change(function(){
    var value = $(this).val();
    getForm(value);
});
$('#kode_pp').change(function(){
    var value = $(this).val();
    getPP(value);
});
// END EVENT CHANGE //
// LIST DATA
var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
// var dataTable = generateTable(
//     "table-data",
//     "{{ url('ts-master/sis-hakakses') }}", 
//     [
//         {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' },
//         {
//             "targets": 0,
//             "createdCell": function (td, cellData, rowData, row, col) {
//                 if ( rowData.status == "baru" ) {
//                     $(td).parents('tr').addClass('selected');
//                     $(td).addClass('last-add');
//                 }
//             }
//         },
//     ],
//     [
//         { data: 'nik' },
//         { data: 'nama' },
//         { data: 'kode_menu' },
//         { data: 'kode_lokasi' },
//         { data: 'flag_aktif' }
//     ],
//     "{{ url('ts-auth/sesi-habis') }}",
//     [[0 ,"asc"]],
//     '$filter_listdata'
// );

// $.fn.DataTable.ext.pager.numbers_length = 5;

// $("#searchData").on("keyup", function (event) {
//     dataTable.search($(this).val()).draw();
// });

// $("#page-count").on("change", function (event) {
//     var selText = $(this).val();
//     dataTable.page.len(parseInt(selText)).draw();
// });

    var dataTable = $("#table-data").DataTable({
        destroy: true,
        // scrollX: true,
        pageLength: 10,
        // scrollY: 'calc(100vh - 300px)',
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('ts-master/sis-hakakses-list') }}",
            type: "POST",
            data: function(prm) {
                return $.extend({}, prm, {})
            }
        },
        deferRender: true,
        sDom: 't<"row view-pager pl-2 mt-3"<"col-sm-12 col-md-4"i><"col-sm-12 col-md-8"p>>',
        columns: [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'kode_menu' },
            { data: 'kode_lokasi' },
            { data: 'kode_pp' }
        ],
        columnDefs:  [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {
                'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' 
            },
        ],
        order:[],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(terfilter dari _MAX_ total entri)"
        }
    });

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("change", function (event) {
        event.stopPropagation();
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('#searchData').attr('placeholder','Search...(Enter to Submit)');

    $('[data-toggle="popover"]').popover({ trigger: "focus" });
// END LIST DATA

// BUTTON TAMBAH
function newForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]:not(#filter-btn)").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("false");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $(".not-reset").val("-");
    $(".readonly").attr("readonly", true);
    $("#id").val("");
    $("#saku-datatable").hide();
    $("#saku-form").show();
    setHeightForm();
    $(".search-item2").show();
    
    if($('.canvasPreview').length > 0){
        $('.canvasPreview').html('');
    }
}

function resetForm() {
    $("#row-id").hide();
    $("#method").val("post");
    $("[id^=label]").each(function (e) {
        $(this).text("");
    });
    $("[class^=info-name]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class^=input-group-text]:not(#filter-btn)").each(function (e) {
        $(this).text("");
    });
    $("[class^=input-group-prepend]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("[class*='inp-label-']").each(function (e) {
        $(this).removeAttr("style");
    });
    $("[class^=info-code]").each(function (e) {
        $(this).text("");
    });
    $("[class^=simple-icon-close]").each(function (e) {
        $(this).addClass("hidden");
    });
    $("#id_edit").val("false");
    $('input[data-input="cbbl"]').val("");
    $("#btn-update").attr("id", "btn-save");
    $("#btn-save").attr("type", "submit");
    $("#form-tambah")[0].reset();
    $("#form-tambah").validate().resetForm();
    $(".not-reset").val("-");
    $(".readonly").attr("readonly", true);
    $("#id").val("");
    $(".search-item2").show();
    
    if($('.canvasPreview').length > 0){
        $('.canvasPreview').html('');
    }
}

$('#saku-datatable').on('click', '#btn-tambah', function(){
    $('#judul-form').html('Tambah Data Akses User');
    $('#nik').attr('readonly', false);
    newForm();
});
// END BUTTON TAMBAH

// BUTTON KEMBALI
$('#saku-form').on('click', '#btn-kembali', function(){
    var kode = null;
    msgDialog({
        id:kode,
        type:'keluar'
    });
});

$('#saku-form').on('click', '#btn-update', function(){
    var kode = $('#nik').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});
// END BUTTON KEMBALI

//BUTTON SIMPAN /SUBMIT
$('#form-tambah').validate({
    ignore: [],
    errorElement: "label",
    submitHandler: function (form) {
        var parameter = $('#id_edit').val();
        var id = $('#nik').val();
        if(parameter == "edit"){
            var url = "{{ url('ts-master/sis-hakakses') }}/"+id;
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        }else{
            var url = "{{ url('ts-master/sis-hakakses') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode "+id;
        }

        var formData = new FormData(form);
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
                    var kode = $('#kode').val();
                    $('#nik').attr('readonly', false);
                    $('#judul-form').html('Tambah Data Akses User');
                    resetForm();
                    msgDialog({
                        id:result.data.kode,
                        type:'simpan'
                    });
                    last_add(dataTable,"nik",result.data.kode);
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                
                    // window.location.href = "{{ url('/ts-auth/sesi-habis') }}";
                    
                }else{
                    if(result.data.kode == "-" && result.data.jenis != undefined){
                        msgDialog({
                            id: id,
                            type: result.data.jenis,
                            text:'NIK sudah digunakan'
                        });
                    }else{

                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Oops...',
                            text: 'Something went wrong! <br/>'+JSON.stringify(result.data.message)
                        })
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        // $('#btn-simpan').html("Simpan").removeAttr('disabled');
    },
    errorPlacement: function (error, element) {
        var id = element.attr("id");
        $("label[for="+id+"]").append("<br/>");
        $("label[for="+id+"]").append(error);
    }
});
// END BUTTON SIMPAN

// BUTTON EDIT TABLE //
function editData(id,kode_lokasi) {
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');
    $('#judul-form').html('Edit Data Akses User');
    // $('#kode_lokasi').parents('.input-group').addClass('readonly');
    $.ajax({
        type: 'GET',
        url: "{{ url('ts-master/sis-hakakses') }}/"+id,
        dataType: 'json',
        async:false,
        success:function(res){
            var result= res.data;
            if(result.status){
                $('#id_edit').val('edit');
                $('#method').val('post');
                $('#id').val(id);
                $('#nik').val(result.data[0].nik);
                $('#nama').val(result.data[0].nama);
                $('#tgl_selesai').val(result.data[0].tgl_selesai);
                $('#no_hp').val(result.data[0].no_hp);
                $('#password').val(result.data[0].pass);
                $('#kode_lokasi').val(result.data[0].kode_lokasi);
                var kode_menu = (result.data[0].kode_menu == '' || result.data[0].kode_menu == null || result.data[0].kode_menu == undefined ? '-' : result.data[0].kode_menu);
                $('#kode_menu').val(kode_menu);
                var kode_form = (result.data[0].kode_form == '' || result.data[0].kode_form == null || result.data[0].kode_form == undefined ? '-' : result.data[0].kode_form);
                $('#kode_form').val(kode_form);
                $('#status_login')[0].selectize.setValue(result.data[0].status_login);
                $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                $('#saku-datatable').hide();
                $('#modal-preview').modal('hide');
                $('#saku-form').show();
                showInfoField('kode_pp',result.data[0].kode_pp,result.data[0].nama_pp)
                showInfoField('nik',result.data[0].nik,result.data[0].nama)
                showInfoField('kode_menu',result.data[0].kode_menu,result.data[0].nama_menu)
                showInfoField('kode_form',result.data[0].kode_form,result.data[0].nama_form)
            }
            else if(!result.status && result.message == 'Unauthorized'){
                // window.location.href = "{{ url('ts-auth/sesi-habis') }}";
            }
            // $iconLoad.hide();
        }
    });
}

$('#saku-datatable').on('click', '#btn-edit', function(){
    var id= $(this).closest('tr').find('td').eq(0).html();
    var kode_lokasi= $(this).closest('tr').find('td').eq(3).html();
    editData(id,kode_lokasi)
    
});
// END BUTTON TABLE EDIT //

// PREVIEW saat klik di list data //
$('#table-data tbody').on('click','td',function(e){
    if($(this).index() != 5){
        var id = $(this).closest('tr').find('td').eq(0).html();
        var lokasi = $(this).closest('tr').find('td').eq(3).html();
        var data = dataTable.row(this).data();
        var html = `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span> <span id="preview-lokasi" style="display:none">`+lokasi+`</span> 
            <div class="dropdown d-inline-block float-right">
                <button type="button" id="dropdownAksi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0.2rem 1rem;border-radius: 1rem !important;" class="btn dropdown-toggle btn-light">
                <span class="my-0">Aksi <i style="font-size: 10px;" class="simple-icon-arrow-down ml-3"></i></span>
                </button>
                <div class="dropdown-menu dropdown-aksi" aria-labelledby="dropdownAksi" x-placement="bottom-start" style="position: absolute; will-change: transform; top: -10px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-delete2"><i class="simple-icon-trash mr-1"></i> Hapus</a>
                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-edit2"><i class="simple-icon-pencil mr-1"></i> Edit</a>
                    <a class="dropdown-item dropdown-ke1" href="#" id="btn-cetak"><i class="simple-icon-printer mr-1"></i> Cetak</a>
                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-cetak2" style="border-bottom: 1px solid #d7d7d7;"><i class="simple-icon-arrow-left mr-1"></i> Cetak</a>
                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-excel"> Excel</a>
                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-pdf"> PDF</a>
                    <a class="dropdown-item dropdown-ke2 hidden" href="#" id="btn-print"> Print</a>
                </div>
            </div>
        </div>
        <div class='separator'></div>
        <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px);position:sticky'>
            <table class="table table-prev mt-2" width="100%">
                <tr>
                    <td style='border:none'>NIK</td>
                    <td style='border:none'>`+data.nik+`</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>`+data.nama+`</td>
                </tr>
                <tr>
                    <td>Kode Lokasi</td>
                    <td>`+data.kode_lokasi+`</td>
                </tr>
                <tr>
                    <td>Kode PP</td>
                    <td>`+data.kode_pp+`</td>
                </tr>
                <tr>
                    <td>Kode Menu</td>
                    <td>`+data.kode_menu+`</td>
                </tr>
                <tr>
                    <td>Form Default Awal</td>
                    <td>`+data.path_view+`</td>
                </tr>
                <tr>
                    <td>Status Login</td>
                    <td>`+data.status_login+`</td>
                </tr>
            </table>
        </div>
        `;
        $('#content-bottom-sheet').html(html);
        $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});
        
        $('.preview-header').on('click','#btn-delete2',function(e){
            var id = $('#preview-id').text();
            $('.c-bottom-sheet').removeClass('active');
            msgDialog({
                id:id,
                type:'hapus'
            });
        });

        $('.preview-header').on('click', '#btn-edit2', function(){
            var id= $('#preview-id').text();
            var lokasi= $('#preview-lokasi').text();
            $('#judul-form').html('Edit Data Jurnal');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            
            $('#btn-save').attr('type','button');
            $('#btn-save').attr('id','btn-update');
            $('.c-bottom-sheet').removeClass('active');
            editData(id,lokasi);
        });

        $('.preview-header').on('click','#btn-cetak',function(e){
            e.stopPropagation();
            $('.dropdown-ke1').addClass('hidden');
            $('.dropdown-ke2').removeClass('hidden');
            console.log('ok');
        });

        $('.preview-header').on('click','#btn-cetak2',function(e){
            // $('#dropdownAksi').dropdown('toggle');
            e.stopPropagation();
            $('.dropdown-ke1').removeClass('hidden');
            $('.dropdown-ke2').addClass('hidden');
        });

        $('#trigger-bottom-sheet').trigger("click");
    }
});

// END PREVIEW saat klik di list data //


// BUTTON HAPUS DATA
function hapusData(param){
    $.ajax({
        type: 'DELETE',
        url: "{{ url('ts-master/sis-hakakses') }}/"+param.nik,
        dataType: 'json',
        data: param,
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload();                    
                showNotification("top", "center", "success",'Hapus Data','Data Akses User ('+param.nik+') berhasil dihapus ');
                $('#modal-pesan-id').html('');
                $('#table-delete tbody').html('');
                $('#modal-pesan').modal('hide');
            }else if(!result.data.status && result.data.message == "Unauthorized"){
                // window.location.href = "{{ url('ts-auth/sesi-habis') }}";
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
        type:'hapus',
        param: {nik: kode}
    });
});

// END BUTTON HAPUS

// CBBL
$('#form-tambah').on('click', '.search-item2', function(){
    var id = $(this).closest('div').find('input').attr('name');
    var regional = $('#kode_pp').val()

    switch(id) {
        case 'nik': 
            var settings = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('ts-master/sis-hakakses-nik') }}",
                columns : [
                    { data: 'nik' },
                    { data: 'nama' }
                ],
                judul : "Daftar NIK",
                pilih : "",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
                parameter : {
                    kode_pp: $('#kode_pp').val()
                },
                onItemSelected:function(data){
                    showInfoField('nik',data.nik,data.nama);
                    resizeNameField('nik');
                    $('#kode_lokasi').val(data.kode_lokasi);
                }
            }
        break;
        case 'kode_pp': 
            var settings = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('ts-master/sis-hakakses-pp') }}",
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
                onItemSelected:function(data){
                    showInfoField('kode_pp',data.kode_pp,data.nama);
                    resizeNameField('kode_pp');
                }
            }
        break;
        case 'kode_menu': 
            var settings = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('ts-master/sis-hakakses-menu') }}",
                columns : [
                    { data: 'kode_klp' },
                    { data: 'nama' }
                ],
                judul : "Daftar Kelompok Menu",
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
        case 'kode_form': 
            var settings = {
                id : id,
                header : ['Kode', 'Nama'],
                url : "{{ url('ts-master/sis-hakakses-form') }}",
                columns : [
                    { data: 'kode_form' },
                    { data: 'nama_form' }
                ],
                judul : "Daftar Form",
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
    showInpFilterBSheet(settings);
});
//END SHOW CBBL//

$('#kode_pp,#nik,#password,#kode_menu,#kode_form,#status_login,#no_hp,#tgl_selesai,#flag_aktif').keydown(function(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    var nxt = ['kode_pp','nik','password','kode_menu','kode_form','status_login','no_hp','tgl_selesai','flag_aktif'];
    if (code == 13 || code == 40) {
        e.preventDefault();
        var idx = nxt.indexOf(e.target.id);
        idx++;
        if(idx == 2 || idx == 3){
            $('#'+nxt[idx])[0].selectize.focus();
        }else{
            
            $('#'+nxt[idx]).focus();
        }
    }else if(code == 38){
        e.preventDefault();
        var idx = nxt.indexOf(e.target.id);
        idx--;
        if(idx != -1){ 
            $('#'+nxt[idx]).focus();
        }
    }
});

// FILTER
var $filter_listdata = {
    kode_lokasi: "",
    nama_lokasi: ""
};

function jumFilter(){
    if($('#filter_lokasi').val() == ""){
        $('#jum-filter').html('');
    }else{
        $('#jum-filter').html(1);
    }
}

$('#modalFilter').on('submit','#form-filter',function(e){
    e.preventDefault();
    $filter_listdata = {
        kode_lokasi: $('#filter_lokasi').val(),
        nama_lokasi: $('.info-name_filter_lokasi span').text()
    }
    dataTable.ajax.reload();
    jumFilter();
    $('#modalFilter').modal('hide');
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    removeInfoField('filter_lokasi');
    jumFilter();
});

$('#filter_lokasi').change(function(e){
    e.preventDefault();
    jumFilter();
});

$('#filter-btn').click(function(){
    // $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    $('#modalFilter').modal('hide');
});

$('#modalFilter').on('shown.bs.modal', function (e) {
    if($filter_listdata.kode_lokasi != ""){
        showInfoField('filter_lokasi',$filter_listdata.kode_lokasi,$filter_listdata.nama_lokasi);
    }
    resizeNameField('filter_lokasi');
})

$('#modalFilter').on('click', '.search-item2', function(){
    $('#content-bottom-sheet').html('');
    var id = $(this).closest('div').find('input').attr('name');
    switch(id){
        case 'filter_lokasi':
            var options = {
                id : id,
                header : ['No Bukti', 'Keterangan'],
                url : "{{ url('sukka-report/filter-lokasi') }}",
                columns : [
                    { data: 'kode_lokasi' },
                    { data: 'nama' }
                ],
                judul : "Daftar Lokasi",
                pilih : "lokasi",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"]
            }
        break;
    }
    showInpFilter(options);
});

// END FILTER

</script>