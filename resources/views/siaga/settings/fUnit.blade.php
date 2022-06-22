<link rel="stylesheet" href="{{ asset('master-new.css?version=_').time() }}" />
<link rel="stylesheet" href="{{ asset('form-new.css?version=_').time() }}" />
<!-- LIST DATA -->
<x-list-data judul="Data Unit" tambah="true" :thead="array('Kode Unit','Nama','Aksi')" :thwidth="array(20,25,10)" :thclass="array('','','text-center')" />
<!-- END LIST DATA -->
<!-- FORM  -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
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
                            <label for="kode">Kode</label>
                            <input class="form-control" type="text" placeholder="Kode Unit" id="kode" name="kode_pp" autocomplete="off">                        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" placeholder="Nama Unit" id="nama" name="nama" autocomplete="off">                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- END FORM -->

<!-- MODAL FILTER -->
<div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
aria-labelledby="modalFilter" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 0 !important;">
            <form id="form-filter">
                <div class="modal-header pb-0" style="border:none">
                    <h6 class="modal-title pl-0">Filter</h6>
                    <button type="button" class="close mt-2" data-dismiss="modal" aria-label="Close" style="position: relative;
                    right: 0px !important;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none">
                    <div class="form-group">
                        <label>Kode Unit</label>
                        <select class="form-control" data-width="100%" name="inp-filter_regional" id="inp-filter_regional">
                            <option value=''>Pilih Kode Unit</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;bottom: 0;position: absolute;width: 100%;justify-content: right;">
                    <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                    <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
// SET UP FORM //
$('#saku-form > .col-12').addClass('mx-auto col-lg-6');
$('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
setHeightForm();

var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

var $iconLoad = $('.preloader');
var selectUnit = $('#inp-filter_regional').selectize();

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
// END SET UP FORM //
// PLUGIN SCROLL di bagian preview dan form input
var scroll = document.querySelector('#content-preview');
var psscroll = new PerfectScrollbar(scroll);

var scrollform = document.querySelector('.form-body');
var psscrollform = new PerfectScrollbar(scrollform);
// END PLUGIN SCROLL di bagian preview dan form input
// FUNCTION GET DATA //
(function() {
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-master/set-unit') }}",
        dataType: 'json',
        async:false,
        success:function(res){
            var result= res.daftar;    
            if(res.status){
                var select = selectUnit[0]
                var control = select.selectize;
                if(typeof result !== 'undefined' && result.length>0){
                    for(i=0;i<result.length;i++){
                        control.addOption([{text:result[i].kode_pp + ' - ' + result[i].nama, value:result[i].kode_pp}]);
                    }
                    // if("{{ Session::get('kodePP') }}" != ""){
                    //     control.setValue("{{ Session::get('kodePP') }}");
                    // }
                }
            }
        }
    });
})();
jumFilter();
// END FUNCTION GET DATA //
// EVENT CHANGE //
function openFilter() {
    var element = $('#mySidepanel');
        
    var x = $('#mySidepanel').attr('class');
    var y = x.split(' ');
    if(y[1] == 'close'){
        element.removeClass('close');
        element.addClass('open');
    }else{
        element.removeClass('open');
        element.addClass('close');
    }
}

$('.sidepanel').on('click', '#btnClose', function(e){
    e.preventDefault();
    openFilter();
});

$('#inp-filter_regional').change(function(){
    jumFilter();
});
// END EVENT CHANGE //
// LIST DATA
var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
var dataTable = generateTable(
    "table-data",
    "{{ url('siaga-master/set-unit') }}", 
    [
        {'targets': 2, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
        { data: 'kode_pp' },
        { data: 'nama' }
    ],
    "{{ url('siaga-auth/sesi-habis') }}",
    [[2 ,"desc"]]
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

// BUTTON TAMBAH
$('#saku-datatable').on('click', '#btn-tambah', function(){
    $('#judul-form').html('Tambah Data Unit');
    $('#kode').attr('readonly', false);
    newForm()
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
    var kode = $('#kode_fs').val();
    msgDialog({
        id:kode,
        type:'edit'
    });
});
// END BUTTON KEMBALI

//BUTTON SIMPAN /SUBMIT
$('#form-tambah').validate({
    ignore: [],
    rules: 
    {
        kode_pp:{
            required: true,   
        },
        nama:{
            required: true,   
        }
    },
    errorElement: "label",
    submitHandler: function (form) {
        var parameter = $('#id_edit').val();
        var id = $('#kode').val();
        if(parameter == "edit"){
            var url = "{{ url('siaga-master/set-unit') }}/"+id;
            var pesan = "updated";
            var text = "Perubahan data "+id+" telah tersimpan";
        }else{
            var url = "{{ url('siaga-master/set-unit') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode "+id;
        }

        var formData = new FormData(form);
        var tmp = $('#kota option:selected').text();
        tmp = tmp.split("-");
        var nama_kota = tmp[1];
        formData.append('nama_kota',nama_kota);
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
                    $('#judul-form').html('Tambah Data Unit');
                    $('#kode').attr('readonly', false);
                    resetForm()
                    msgDialog({
                        id:kode,
                        type:'simpan'
                    });
                    last_add(dataTable,"nik",kode);
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                
                    window.location.href = "{{ url('/siaga-auth/sesi-habis') }}";
                    
                }else{
                    if(result.data.kode == "-" && result.data.jenis != undefined){
                        msgDialog({
                            id: id,
                            type: result.data.jenis,
                            text:'Kode sudah digunakan'
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
function editData(id) {
    $('#form-tambah').validate().resetForm();
    $('#btn-save').attr('type','button');
    $('#btn-save').attr('id','btn-update');
    $('#judul-form').html('Edit Data Jabatan');
    
    $.ajax({
        type: 'GET',
        url: "{{ url('siaga-master/set-unit') }}/" + id,
        dataType: 'json',
        async:false,
        success:function(res){
            var result= res.data;
            if(result.status){
                $('#id_edit').val('edit');
                $('#method').val('put');
                $('#kode').attr('readonly', true);
                $('#kode').val(id);
                $('#id').val(id);
                $('#nama').val(result.data[0].nama);   
                $('#modal-preview').modal('hide'); 
                $('#saku-datatable').hide();
                $('#saku-form').show();
            }
            else if(!result.status && result.message == 'Unauthorized'){
                window.location.href = "{{ url('siaga-auth/sesi-habis') }}";
            }
            // $iconLoad.hide();
        }
    });
}
$('#saku-datatable').on('click', '#btn-edit', function(){
    var id= $(this).closest('tr').find('td').eq(0).html();
    editData(id)
});
// END BUTTON TABLE EDIT //

// PREVIEW saat klik di list data //
$('#table-data tbody').on('click','td',function(e){
    if($(this).index() != 2){
        var id = $(this).closest('tr').find('td').eq(0).html();
        var data = dataTable.row(this).data();
        var status = data.flag_status;
        var html = `
        <div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
            <h6 style="position: absolute;" id="preview-judul">Preview Data</h6>
            <span id="preview-nama" style="display:none"></span><span id="preview-id" style="display:none">`+id+`</span> 
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
                    <td style='border:none'>Kode Unit</td>
                    <td style='border:none'>`+id+`</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>`+data.nama+`</td>
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
            $('#judul-form').html('Edit Data Jurnal');
            $('#form-tambah')[0].reset();
            $('#form-tambah').validate().resetForm();
            
            $('#btn-save').attr('type','button');
            $('#btn-save').attr('id','btn-update');
            $('.c-bottom-sheet').removeClass('active');
            editData(id);
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
function hapusData(id){
    $.ajax({
        type: 'DELETE',
        url: "{{ url('siaga-master/set-unit') }}/"+id,
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.data.status){
                dataTable.ajax.reload();                    
                showNotification("top", "center", "success",'Hapus Data','Data Unit ('+id+') berhasil dihapus ');
                $('#modal-pesan-id').html('');
                $('#table-delete tbody').html('');
                $('#modal-pesan').modal('hide');
            }else if(!result.data.status && result.data.message == "Unauthorized"){
                window.location.href = "{{ url('siaga-auth/sesi-habis') }}";
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

// END BUTTON HAPUS

// FILTER DATA //
 $('#modalFilter').on('submit','#form-filter',function(e){
    e.preventDefault();
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var regional = $('#inp-filter_regional').val();
            var col_regional = data[0];
            if(regional != ""){
                if(regional == col_regional){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        }
    );
    dataTable.draw();
    $.fn.dataTable.ext.search.pop();
    $('#modalFilter').modal('hide');
});

$('#btn-reset').click(function(e){
    e.preventDefault();
    $('#inp-filter_regional')[0].selectize.setValue('');
    jumFilter();
});
    
$('#filter-btn').click(function(){
    $('#modalFilter').modal('show');
});

$("#btn-close").on("click", function (event) {
    event.preventDefault();
    $('#modalFilter').modal('hide');
});

$('#btn-tampil').click();
// END FILTER DATA //

$('#kode,#nama').keydown(function(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    var nxt = ['kode','nama'];
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
</script>