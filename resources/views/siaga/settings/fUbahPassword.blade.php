<link rel="stylesheet" href="{{ asset('master.css?version=_').time() }}" />

<!-- FORM INPUT -->
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" >
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;">
                    <h6 id="judul-form" style="position:absolute;top:15px">Ubah Password</h6>
                    <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                </div>
                <div class="separator mb-2"></div>
                <!-- FORM BODY -->
                <div class="card-body pt-3 form-body">
                    <div class="form-group row " id="row-id">
                        <div class="col-9">
                            <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                            <input type="hidden" id="method" name="_method" value="post">
                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="nik">User</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_nik" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-nik" id="nik" name="nik" value="" title="">
                                        <span class="info-name_nik hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_nik"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="password_lama">Password Lama</label>
                                    <input class="form-control" type="password" id="password_lama" name="password_lama" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="password_baru">Password Baru</label>
                                    <input class="form-control" type="password" id="password_baru" name="password_baru" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="password_confirm">Konfirmasi Password</label>
                                    <input class="form-control" type="password" id="password_confirm" name="password_confirm" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</form>
<!-- END FORM INPUT -->

<!-- JAVASCRIPT  -->

<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script>
// var $iconLoad = $('.preloader');
setHeightForm();

var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
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

// PLUGIN SCROLL di bagian preview dan form input
var scrollform = document.querySelector('.form-body');
var psscrollform = new PerfectScrollbar(scrollform);
// END PLUGIN SCROLL di bagian preview dan form input


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
    var hasil = (isi_kode == "" || isi_kode == null || isi_kode == undefined ? "-" : isi_kode);
    $('#'+kode).val(hasil);
    $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
    $('.info-code_'+kode).text(hasil).parent('div').removeClass('hidden');
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
//BUTTON SIMPAN /SUBMIT
$('#form-tambah').validate({
    ignore: [],
    errorElement: "label",
    submitHandler: function (form) {
        var parameter = $('#id_edit').val();
        var id = $('#nik').val();
        var url = "{{ url('gl-master/update-password-nik') }}";

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
                    $('#row-id').hide();
                    $('#form-tambah')[0].reset();
                    $('#form-tambah').validate().resetForm();
                    $('[id^=label]').html('');
                    $('#id_edit').val('');
                    $('#method').val('post');
                    $('#kode_form').attr('readonly', false);
                    msgDialog({
                        id:result.data.kode,
                        type:'sukses',
                        title:result.data.message
                    });
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                
                    window.location.href = "{{ url('/bdh-auth/sesi-habis') }}";
                    
                }else{
                    if(result.data.kode == "-" && result.data.jenis != undefined){
                        msgDialog({
                            id: id,
                            type: result.data.jenis,
                            text:'Kode Form sudah digunakan'
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

// HANDLER untuk enter dan tab
$('#nik,#password_lama,#password_baru,#confirm_password').keydown(function(e){
    var code = (e.keyCode ? e.keyCode : e.which);
    var nxt = ['nik','password_lama','password_baru','confirm_password'];
    if (code == 13 || code == 40) {
        e.preventDefault();
        var idx = nxt.indexOf(e.target.id);
        idx++;
        $('#'+nxt[idx]).focus();
    }else if(code == 38){
        e.preventDefault();
        var idx = nxt.indexOf(e.target.id);
        idx--;
        if(idx != -1){ 
            $('#'+nxt[idx]).focus();
        }
    }
});

// 
function getKaryawan(id=null){
    $.ajax({
        type: 'GET',
        url: "{{ url('gl-master/akses-user') }}",
        dataType: 'json',
        data:{'nik':id},
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
                window.location.href = "{{ url('bdh-auth/sesi-habis') }}";
            }
        }
    });
}

$('#form-tambah').on('click', '.search-item2', function(){
    var id = $(this).closest('div').find('input').attr('name');
    console.log(id);
    switch(id){
        case 'nik' :
            var settings = {
                id : id,
                header : ['NIK', 'Nama'],
                url : "{{ url('gl-master/akses-user') }}",
                columns : [
                    { data: 'nik' },
                    { data: 'nama' }
                ],
                judul : "Daftar Karyawan",
                pilih : "karyawan",
                jTarget1 : "text",
                jTarget2 : "text",
                target1 : ".info-code_"+id,
                target2 : ".info-name_"+id,
                target3 : "",
                target4 : "",
                width : ["30%","70%"],
                onItemSelected: function(data){
                    $('#nik').css('border-left',0);
                    $('#nik').val(data.nik);
                    $('#nama').val(data.nama);
                    $(".info-code_nik").text(data.nik);
                    $(".info-code_nik").attr("title",data.nama);
                    $(".info-code_nik").parents('div').removeClass('hidden');
                    
                    var width= $('#nik').width()-$('#search_nik').width()-10;
                    var pos =$('#nik').position();
                    var height = $('#nik').height();
                    $('#nik').attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
                    $('.info-name_nik').width($('#nik').width()-$('#search_nik').width()-10).css({'left':pos.left,'height':height});
                    $('.info-name_nik'+' span').text(data.nama);
                    $('.info-name_nik').attr("title",data.nama);
                    $('.info-name_nik').removeClass('hidden');
                    $('.info-name_nik').closest('div').find('.info-icon-hapus').removeClass('hidden')
                }
            };
        break;
    }
    showInpFilterBSheet(settings);
});

$('#form-tambah').on('change', '#nik', function(){
    var par = $(this).val();
    getKaryawan(par);
});
</script>