<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
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
<x-list-data judul="Data Aktiva Tetap" tambah="false" :thead="array('Kode','Nama','Aksi')" :thwidth="array(20,25,10)" :thclass="array('','','text-center')" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px">Form Edit Data Aktiva Tetap</h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <input type="hidden" name="kode_pp" id="kode_pp" readonly>
                    <input type="hidden" name="kode_pp_susut" id="kode_pp_susut" readonly>
                    
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tgl_perolehan">Tanggal Perolehan</label>
                            <input class='form-control datepicker' type="text" id="tgl_perolehan" name="tgl_perolehan" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="kode_klpakun">Akun Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_klpakun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-kode_klpakun" id="kode_klpakun" name="kode_klpakun" value="" title="" readonly>
                                <span class="info-name_kode_klpakun hidden">
                                    <span id="label_kode_klpakun"></span> 
                                </span>
                                {{-- <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_klpakun"></i> --}}
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="kode_klpfa">Kelompok Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_klpfa" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-kode_klpfa" id="kode_klpfa" name="kode_klpfa" value="" title="" readonly>
                                <span class="info-name_kode_klpfa hidden">
                                    <span id="label_kode_klpfa"></span> 
                                </span>
                                {{-- <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_klpfa"></i> --}}
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="umur">Umur (Bulan)</label>
                            <input type="text" placeholder="Umur" class="form-control currency" id="umur" name="umur" value="0" readonly required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="deskripsi">Keterangan Aktiva Tetap</label>
                            <input type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai">Nilai Perolehan</label>
                            <input type="text" placeholder="Nilai Perolehan" class="form-control currency" id="nilai_perolehan" name="nilai_perolehan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="residu">Nilai Residu</label>
                            <input type="text" placeholder="Nilai Residu" class="form-control currency" id="residu" name="residu" value="0" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_susut">Nilai Susut</label>
                            <input type="text" placeholder="Total" class="form-control currency" id="nilai_susut" name="nilai_susut" value="0" readonly required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="persen">Persentase</label>
                            <input type="text" placeholder="Persentase" class="form-control currency" id="persen" name="persen" value="0" readonly required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="periode">Periode</label>
                            <input type="text" class="form-control" id="periode" name="periode" readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_seri">Nomor Seri</label>
                            <input type="text" placeholder="Nomor Seri" class="form-control" id="no_seri" name="no_seri" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="merk">Merk</label>
                            <input type="text" placeholder="Merk" class="form-control" id="merk" name="merk" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Tipe</label>
                            <input type="text" placeholder="Tipe" class="form-control" id="tipe" name="tipe" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="periode_susut">Periode Susut</label>
                            <input type="text" class="form-control" id="periode_susut" name="periode_susut" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="catatan">Catatan</label>
                            <input type="text" placeholder="Catatan" class="form-control" id="catatan" name="catatan" required>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="text-right message-action">
                            <p class="text-success" id="no-fa"></p>
                        </div>
                        <div class="action-footer">
                            <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@include('modal_search')

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    $('#btn-tambah').hide()
    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_bank').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/edit-data-aktap') }}",
            data: { 'aktap': id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.success.status){
                    var data = result.data.success.data[0]
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no-fa').text(id)
                    $('#kode_pp').val(data.kode_pp)
                    $('#kode_pp_susut').val(data.kode_pp_susut)
                    $('#tgl_perolehan').val(data.tgl_perolehan)
                    $('#kode_klpakun').val(data.klpakun)
                    $('#kode_klpfa').val(data.klpfa)
                    $('#deskripsi').val(data.nama)
                    $('#umur').val(data.umur)
                    $('#nilai_perolehan').val(parseInt(data.holeh))
                    $('#nilai_residu').val(parseInt(data.nilai_residu))
                    $('#nilai_susut').val(parseInt(data.susut))
                    $('#persen').val(parseInt(data.persen))
                    $('#periode').val(data.periode)
                    $('#periode_susut').val(data.periode_susut)
                    $('#no_seri').val(data.no_seri)
                    $('#tipe').val(data.tipe)
                    $('#merk').val(data.merk)
                    $('#catatan').val(data.catatan)          
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        // $('#judul-form').html('Edit Data Bank');
        editData(id);
    });

    function resetForm() {
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
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#no-fa').text('')
    }

    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            var no_fa = $('#no-fa').text()
            console.log(no_fa)
            var url = "{{ url('esaku-trans/edit-aktap') }}";
            var pesan = "saved";
            var text = "Data tersimpan";

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            formData.append('no_fa', no_fa)
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
                        dataTable.ajax.reload()
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#method').val('post');
                        resetForm();
                        msgDialog({
                            id:no_fa,
                            type:'simpan'
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                    }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<p>'+result.data.success.message+'</p>'
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

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/edit-show-aktap') }}", 
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
            { data: 'no_fa' },
            { data: 'nama' }
        ],
        "{{ url('java-auth/sesi-habis') }}",
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

    // BUTTON HAPUS DATA
    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/edit-aktap') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.success.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Aktiva Tetap ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.success.status && result.data.success.message == "Unauthorized"){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.success.message+'</a>'
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
</script>