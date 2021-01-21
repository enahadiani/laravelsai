{{-- Referensi file fVendor folder Esaku --}}
<link rel="stylesheet" href="{{ asset('master.css') }}" />
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
    <x-list-data judul="Data Akun Aktiva Tetap" tambah="true" :thead="array('Kode','Nama','Umur (Thn)','Persentase','Akun Aktap','Akun BP','Akun Akumulasi','Aksi')" :thwidth="array(10,20,5,10,10,10,10,10)" :thclass="array('','','','','','','','text-center')" />
<!-- END LIST DATA -->

{{-- Form Input --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header">
                    <div class="row">
                        <div class="col-6">
                            <h6 id="judul-form" class="judul-form">Form Data Akun Aktiva Tetap</h6>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                        </div>
                    </div>
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="id_edit" name="id_edit">
                    <input type="hidden" id="method" name="_method" value="post">
                    <input type="hidden" id="id" name="id">

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_klpakun">Kode Kelompok</label>
                                    <input type="text" placeholder="Kode Kelompok" class="form-control" id="kode_klpakun" name="kode_klpakun" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama">Nama Kelompok</label>
                                    <input type="text" placeholder="Nama Kelompok" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="umur">Umur</label>
                                    <input type="text" placeholder="Umur" class="form-control currency" id="umur" name="umur" value="0" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nama">Persentase</label>
                                    <input type="text" placeholder="Persentase" class="form-control currency" id="persen" name="persen" value="0" required readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_akun">Akun Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_akun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-kode_akun" id="kode_akun" name="kode_akun" value="" title="" readonly>
                                        <span class="info-name_kode_akun hidden">
                                            <span id="label_kode_akun"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_akun"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="akun_bp">Akun Beban Susut</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_akun_bp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-akun_bp" id="akun_bp" name="akun_bp" value="" title="" readonly>
                                        <span class="info-name_akun_bp hidden">
                                            <span id="label_akun_bp"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_akun_bp"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="akun_deprs">Akun Akumulasi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_akun_deprs" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-akun_deprs" id="akun_deprs" name="akun_deprs" value="" title="" readonly>
                                        <span class="info-name_akun_deprs hidden">
                                            <span id="label_akun_deprs"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_akun_deprs"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="flag_susut">Status</label>
                                    <select class="form-control" name="flag_susut" id="flag_susut">
                                        <option value="0" selected>NONSUSUT</option>
                                        <option value="1">SUSUT</option>
                                    </select>
                                </div>
                            </div>
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
    setHeightForm();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.selectize').selectize();

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
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

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        // $('#'+par).attr('readonly',false);
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

    function resetForm() {
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=cbbl]").each(function(e){
            $(this).val('');
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

    function editData(kode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/akun-aktiva-tetap-detail') }}",
            data: { kode_klpakun:kode },
            dataType: 'json',
            success:function(result){
                if(result.status){
                    var data = result.daftar[0];
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_klpakun').attr('readonly', true);
                    $('#id').val(kode);
                    $('#kode_klpakun').val(data.kode_klpakun);
                    $('#nama').val(data.nama);
                    $('#umur').val(parseFloat(data.umur));
                    $('#persen').val(parseFloat(data.persen));
                    $('#flag_susut').val(data.flag_susut);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('kode_akun',data.kode_akun,data.nama_akun);
                    showInfoField('akun_bp',data.akun_bp,data.nama_bp);
                    showInfoField('akun_deprs',data.akun_deprs,data.nama_deprs);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });   
    }

    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/akun-aktiva-tetap') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Akun Aktiva Tetap ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    new PerfectScrollbar(scrollform);

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/akun-aktiva-tetap') }}", 
        [
            {'targets': 7, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
                "targets": [4,5,6],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'kode_klpakun' },
            { data: 'nama' },
            { data: 'umur' },
            { data: 'persen' },
            { data: 'akun' },
            { data: 'bp' },
            { data: 'deprs' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
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

    // Preview Data //
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 4){ 
            var html = "";
            var data = dataTable.row(this).data();
            var kode = data.kode_klpakun;
            var nama = data.nama;
            var umur = data.umur + " tahun"; 
            var persen = data.persen + "%";
            var akun = data.akun;
            var deprs = data.deprs;
            var bp = data.bp;
            var status = data.status;
             
            html += "<tr>";
            html += "<td style='border: none;'>Kode Kelompok Akun</td>"
            html += "<td style='border: none;'>"+kode+"</td>"
            html += "</tr>";
            html += "<tr>";
            html += "<td>Nama Akun Kelompok AKun</td>"
            html += "<td>"+nama+"</td>"
            html += "</tr>";
            html += "<tr>";
            html += "<td>Umur</td>"
            html += "<td>"+umur+"</td>"
            html += "</tr>";
            html += "<tr>";
            html += "<td>Persentase</td>"
            html += "<td>"+persen+"</td>"
            html += "</tr>";
            html += "<tr>";
            html += "<td>Akun Aktiva Tetap</td>"
            html += "<td>"+akun+"</td>"
            html += "</tr>";
            html += "<td>Akun BP</td>"
            html += "<td>"+bp+"</td>"
            html += "</tr>";
            html += "<td>Akun Depresiasi</td>"
            html += "<td>"+deprs+"</td>"
            html += "</tr>";
            html += "<td>Status</td>"
            html += "<td>"+status+"</td>"
            html += "</tr>";

            $('#table-preview tbody').html(html);
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Akun Aktiva Tetap').removeClass('py-2');
            $('#modal-preview-id').text(kode);
            $('#modal-preview').modal('show');
        }
    });

    // Form //
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#kode_klpakun').attr('readonly', false);
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#id_edit').val('');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        resetForm();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#form-tambah').validate().resetForm();
        resetForm();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Form Data Akun Aktiva Tetap');
        editData(id);
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_klpakun').val();
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

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Form Data Akun Aktiva Tetap');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('#umur').change(function(){
        var umur = toNilai($(this).val());
        var persen = 100/umur;
        if(umur == 0 || umur == '') {
            persen = 0;
        }
        $('#persen').val(persen);
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var options = {}
        switch(id){
            case 'kode_akun':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/masakun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'akun_bp':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/masakun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            case 'akun_deprs':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/masakun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
        }
        showInpFilter(options);
    });

    // Simpan //
    $('#form-tambah').validate({
        ignore:[],
        rules: {
            kode_klpakun:{
                required: true
            },
            nama:{
                required: true
            },
            umur:{
                required: true
            },
            persen:{
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function(form) {
            var parameter = $(form).find('#id_edit').val();
            var kode = $(form).find('#kode_klpakun').val();
            
            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(parameter != "") { 
                var url = "{{ url('esaku-master/akun-aktiva-tetap') }}/"+kode;
                var pesan = "updated";
                var text = "Perubahan data "+kode+" telah tersimpan";                
            } else {
                var url = "{{ url('esaku-master/akun-aktiva-tetap') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+kode;
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
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Form Data Akun Aktiva Tetap');
                        $('#method').val('post');
                        $('#kode_klpakun').attr('readonly', false);
                        resetForm();
                        msgDialog({
                            id:kode,
                            type:'simpan'
                        });
                        last_add("kode_klpakun",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    }else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    })
</script>