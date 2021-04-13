<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans.css') }}"/>
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

<x-list-data judul="Data Penghapusan Aktiva Tetap" tambah="true" :thead="array('No Bukti','Tanggal','No Aktiva','Deskripsi','Nilai','Posting','Aksi')" :thwidth="array(15,15,15,20,15,10,10)" :thclass="array('','','','','','','text-center')" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input type="hidden" name="kode_pp" id="kode_pp">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px">Hapus Aktiva Tetap</h6>
                    <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tanggal">Tanggal</label>
                            <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}" required>
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_dokumen">No Dokumen</label>
                            <input type="text" placeholder="No Dokumen" class="form-control" id="no_dokumen" name="no_dokumen" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="aktiva_tetap">No Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_aktiva_tetap" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-aktiva_tetap" id="aktiva_tetap" name="aktiva_tetap" value="" title="" readonly>
                                <span class="info-name_aktiva_tetap hidden">
                                    <span id="label_aktiva_tetap"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_aktiva_tetap"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="keterangan">Keterangan</label>
                            <input class='form-control' type="text" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="beban_penghapusan">Beban Penghapusan</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_beban_penghapusan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-beban_penghapusan" id="beban_penghapusan" name="beban_penghapusan" value="" title="" readonly>
                                <span class="info-name_beban_penghapusan hidden">
                                    <span id="label_beban_penghapusan"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_beban_penghapusan"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_perolehan">Nilai Perolehan</label>
                            <input type="text" placeholder="Nilai Perolehan" class="form-control currency" id="nilai_perolehan" name="nilai_perolehan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="total_perolehan">Total Penyusutan</label>
                            <input type="text" placeholder="Total Penyusutan" class="form-control currency" id="total_penyusutan" name="total_penyusutan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_buku">Nilai Buku</label>
                            <input type="text" placeholder="Nilai Buku" class="form-control currency" id="nilai_buku" name="nilai_buku" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_residu">Nilai Residu</label>
                            <input type="text" placeholder="Nilai Residu" class="form-control currency" id="nilai_residu" name="nilai_residu" value="0" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_referensi">Nilai Referensi Susut</label>
                            <input type="text" placeholder="Nilai Referensi Susut" class="form-control currency" id="nilai_referensi_susut" name="nilai_referensi_susut" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_seri">No Seri</label>
                            <input type="text" placeholder="No Seri" class="form-control" id="no_seri" name="no_seri" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="merk">Merk</label>
                            <input type="text" placeholder="Merk" class="form-control" id="merk" name="merk" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Tipe</label>
                            <input type="text" placeholder="Tipe" class="form-control" id="tipe" name="tipe" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="akun_akumulasi">Akun Akumulasi</label>
                            <input type="text" placeholder="Akun Akumulasi" class="form-control" id="akun_akumulasi" name="akun_akumulasi" required readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="akun_beban_penyusutan">Akun Beban Penyusutan</label>
                            <input type="text" placeholder="Akun Beban Penyusutan" class="form-control" id="akun_beban_penyusutan" name="akun_beban_penyusutan" required readonly>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
                        <div class="text-right message-action">
                            <p class="text-success" id="no-bukti"></p>
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
    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-trans/penghapusan-data') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {   'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {
                "targets" : 5,
                "data": null,
                "className": 'text-center',
                "render": function ( data, type, row, meta ) {
                    if(row.posted == "Close"){
                        return `<button type="button" class="btn p-0"  
                                data-toggle="popover" data-placement="top"
                                data-content="Transaksi ini telah diposting sehingga tidak dapat dirubah ataupun dihapus."><i class="saicon icon-close bg-success"></i>
                            </button>`;
                    }else{
                        return `<button type="button" class="btn p-0"  
                                data-toggle="popover" data-placement="top"
                                data-content="Transaksi ini belum diposting sehingga dapat dirubah ataupun dihapus.">
                                <i class="saicon icon-open"></i>
                            </button>`;
                    }
                }
            },
            {
                "targets" : 6,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    if(row.posted == "Close"){
                        return '';
                    }else{
                        return action_html;
                    }
                }
            }
            // {   'targets': 7, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'tgl' },
            { data: 'no_fa' },
            { data: 'keterangan' },
            { data: 'nilai1' },
            { data: 'posted' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[6 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({ trigger: "focus" });
    // END LIST DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#search_aktiva_tetap').show()
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#no-bukti').text('')
        $('#judul-form').html('Tambah Data Aktiva Tetap');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        resetForm()
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });
    // END BUTTON TAMBAH

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#id').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    function loadDataAktiva(aktap, tanggal) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/penghapusan-data-aktap') }}",
            data: { 'tanggal':tanggal, 'aktap':aktap},
            dataType: 'json',
            async:false,
            success:function(result) {
                var data = result.data.success.data[0]
                $('#kode_akun').val(data.kode_akun)
                $('#kode_pp').val(data.kode_pp)
                $('#merk').val(data.merk)
                $('#tipe').val(data.tipe)
                $('#no_seri').val(data.no_seri)
                $('#akun_akumulasi').val(data.akun_deprs +"-"+ data.nama_deprs)
                $('#akun_beban_penyusutan').val(data.kode_akun +"-"+ data.nama_akun)
                $('#nilai_perolehan').val(parseInt(data.nilai))
                $('#nilai_buku').val(parseInt(data.nilai_buku))
                $('#nilai_residu').val(parseInt(data.nilai_residu))
                $('#nilai_referensi_susut').val(0)
                $('#total_penyusutan').val(parseInt(data.tot_susut))
            }
        })
    }

    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/penghapusan-show') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                var data = result.success.data[0]
                if(result.success.status){
                    var tanggal = reverseDate2(data.tanggal,'-','/')
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#no-bukti').text(id)
                    $('#search_aktiva_tetap').hide()
                    $('#keterangan').val(data.keterangan);
                    $('#aktiva_tetap').val(data.no_fa);
                    $('#tanggal').val(reverseDate2(data.tanggal,'-','/'));
                    $('#no_dokumen').val(data.no_dokumen);
                    $('#beban_penghapusan').val(data.akun_beban)
                    loadDataAktiva(data.no_fa, tanggal)          
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

        $('#judul-form').html('Edit Penghapusan Data Aktiva Tetap');
        editData(id);
    });

    function resetForm() {
        tanggal = ''
        $('#search_aktiva_tetap').show()
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

    $('#form-tambah').on('click', '.search-item2', function() { 
        var tanggal = $('#tanggal').val()
        var id = $(this).closest('div').find('input').attr('name');

        switch(id) {
            case 'aktiva_tetap': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/penghapusan-aktap') }}",
                    columns : [
                        { data: 'no_fa' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        tanggal: tanggal
                    },
                    judul : "Daftar Aktiva Tetap",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "custom",
                    target4 : "custom",
                    width : ["30%","70%"],
                }
            break; 
            case 'beban_penghapusan': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-trans/penghapusan-akun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
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

    function custTarget(target, tr) {
        var from = target;
        var keyString = '_'
        var fromTarget = from.substr(from.indexOf(keyString) + keyString.length, from.length);
        if(fromTarget === 'aktiva_tetap') {
            var tanggal = $('#tanggal').val()
            var aktap = $('#aktiva_tetap').val()
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-trans/penghapusan-data-aktap') }}",
                data: { 'tanggal':tanggal, 'aktap':aktap},
                dataType: 'json',
                async:false,
                success:function(result) {
                    var data = result.data.success.data[0]
                    $('#kode_akun').val(data.kode_akun)
                    $('#kode_pp').val(data.kode_pp)
                    $('#merk').val(data.merk)
                    $('#tipe').val(data.tipe)
                    $('#no_seri').val(data.no_seri)
                    $('#akun_akumulasi').val(data.akun_deprs +"-"+ data.nama_deprs)
                    $('#akun_beban_penyusutan').val(data.kode_akun +"-"+ data.nama_akun)
                    $('#nilai_perolehan').val(parseInt(data.nilai))
                    $('#nilai_buku').val(parseInt(data.nilai_buku))
                    $('#nilai_residu').val(parseInt(data.nilai_residu))
                    $('#nilai_referensi_susut').val(0)
                    $('#total_penyusutan').val(parseInt(data.tot_susut))
                }
            })
        }
    }

    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            var parameter = $('#id_edit').val();
            var id = $('#id').val();
            
            if(parameter == "edit"){ 
                var url = "{{ url('esaku-trans/penghapusan-aktiva-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            } else {
                var url = "{{ url('esaku-trans/penghapusan-aktiva') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
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
                    if(result.data.success.status){
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        tanggal = ''
                        $('#judul-form').html('Tambah Data Penghapusan Aktiva Tetap');
                        $('#method').val('post');
                        resetForm();
                        msgDialog({
                            id:result.data.success.no_bukti,
                            type:'simpan'
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
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

    function hapusData(id){
        console.log(id)
        console.log(tanggal)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-trans/penghapusan-aktiva-hapus') }}",
            data: { kode: id, tanggal:tanggal },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.success.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Penghapusan Aktiva Tetap ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                    tanggal = ''
                }else if(!result.data.success.status && result.data.success.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<p>'+result.data.success.message+'</p>'
                    });
                }
            }
        });
    }
    var tanggal = ''
    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        tanggal = $(this).closest('tr').find('td').eq(1).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });
</script>