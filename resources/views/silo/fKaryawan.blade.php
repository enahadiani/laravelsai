    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />

    <!-- LIST DATA -->
    <x-list-data judul="Data Karyawan" tambah="true" :thead="array('NIK','Nama','Kode Regional','Kode Jab','Email','No  Telp','Aksi')" :thwidth="array(20,25,20,20,20,20,10)" :thclass="array('','','','','','','text-center')" />
    <!-- END LIST DATA -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
        <input type="hidden" id="method" name="_method" value="post">
        <input type="hidden" id="id" name="id">
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                        <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nik">NIK</label>
                                <input class="form-control" type="text" placeholder="NIK" id="nik" name="nik" autocomplete="off">                        
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" autocomplete="off">                       
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_pp">Regional</label>
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
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_kota">Kota</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_kota" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_kota" autocomplete="off" id="kode_kota" name="kode_kota" value="" title="" data-input="cbbl" readonly>
                                    <span class="info-name_kode_kota hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_kota"></i>
                                </div>                     
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_divisi">Divisi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_divisi" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_divisi" autocomplete="off" id="kode_divisi" name="kode_divisi" value="" title="" data-input="cbbl" readonly>
                                    <span class="info-name_kode_divisi hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_divisi"></i>
                                </div>                     
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_jab">Jabatan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_jab" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_jab" autocomplete="off" id="kode_jab" name="kode_jab" value="" title="" data-input="cbbl" readonly>
                                    <span class="info-name_kode_jab hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_jab"></i>
                                </div>                     
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" placeholder="Email" id="email" name="email" autocomplete="off" required>                       
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="telp">No Telp</label>
                                <input class="form-control" type="text" placeholder="No Telp" id="telp" name="no_telp" autocomplete="off" required>                    
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="file">Foto</label>
                                <div class="custom-file">
                                    <input type="file" name="file_gambar" class="custom-file-input" id="file_gambar">
                                    <label class="custom-file-label" for="file_gambar">Choose file</label>
                                </div>                 
                            </div>
                        </div>
                    </div>
                    <div class="card-form-footer">
                        <div class="footer-form-container">
                            <div class="text-right message-action">
                                <p class="text-success"></p>
                            </div>
                            <div class="action-footer">
                                <button type="submit" id="btn-save" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- MODAL FILTER -->
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row">
                            <label>Regional</label>
                            <select class="form-control" data-width="100%" name="inp-filter_regional" id="inp-filter_regional">
                                <option value=''>Pilih Regional</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END MODAL FILTER -->
    @include('modal_search')
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    // SET UP FORM //
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    setHeightForm();

    var $iconLoad = $('.preloader');
    var selectRegional = $('#inp-filter_regional').selectize();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

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

    $('[data-toggle="tooltip"]').tooltip(); 
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
            url: "{{ url('apv/unit') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    var select = selectRegional[0];
                    var control = select.selectize;
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                        }
                    }
                }
            }
        });
    })();

    function getPP(kode_cbbl, kode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/unit') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                     if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_pp == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].kode_pp, filter[0].nama)
                        }
                    }
                }
            }
        });
    }

    function getKota(regional = null, kode_cbbl, kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/kota') }}",
            dataType: 'json',
            data:{'kode_pp': regional},
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_kota == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].kode_kota, filter[0].nama)
                        }
                    }
                }
            }
        });
    }

    function getDivisi(kode_cbbl, kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/divisi') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;    
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_divisi == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].kode_divisi, filter[0].nama)
                        }
                    }
                }
            }
        });
    }

    function getJabatan(kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/jabatan') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.daftar;    
                if(res.status){
                     if(typeof result !== 'undefined' && result.length>0){
                        var data = result;
                        var filter = data.filter(data => data.kode_jab == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].kode_jab, filter[0].nama)
                        }
                    }
                }
            }
        });
    }

    jumFilter();
    // END FUNCTION GET DATA //
    // EVENT CHANGE //
    $('#kode_pp').change(function(){
        var value = $(this).val();
        getPP('kode_pp',value);
    });
    $('#kode_kota').change(function(){
        var regional = $('#regional').val();
        var value = $(this).val();
        getKota(regional, 'kode_kota', value);
    });
    $('#kode_divisi').change(function(){
        var value = $(this).val();
        getDivisi('kode_divisi',value);
    });
    $('#kode_jab').change(function(){
        var value = $(this).val();
        getJabatan('kode_jab',value)
    });
    $('#inp-filter_regional').change(function(){
        jumFilter();
    });
    // END EVENT CHANGE //
    // LIST DATA
    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('apv/karyawan') }}", 
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
            { data: 'nik' },
            { data: 'nama' },
            { data: 'kode_pp' },
            { data: 'kode_jab' },
            { data: 'no_telp' },
            { data: 'email' }
        ],
        "{{ url('silo-auth/sesi-habis') }}",
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
    // END LIST DATA

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#judul-form').html('Tambah Data Karyawan');
        $('#nik').attr('readonly', false);
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
            nik:{
                required: true,   
            },
            nama:{
                required: true,   
            },
            kode_pp:{
                required: true,   
            },
            kode_jab:{
                required: true,   
            },
            kode_divisi:{
                required: true,   
            },
            kode_kota:{
                required: true,   
            },
            email:{
                required: true,   
            },
            telp:{
                required: true,   
            },
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#nik').val();
            if(parameter == "edit"){
                var url = "{{ url('apv/karyawan') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('apv/karyawan') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            var tmp = $('#label_kode_kota').val();
            var nama_kota = tmp;
            formData.append('kota',nama_kota);
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
                        var kode = $('#nik').val();
                        $('#judul-form').html('Tambah Data Karyawan');
                        $('#nik').attr('readonly', false);
                        resetForm()
                        msgDialog({
                            id:kode,
                            type:'simpan'
                        });
                        last_add(dataTable,"nik",kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/silo-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'NIK sudah digunakan'
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
        $('#judul-form').html('Edit Data Karyawan');
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/karyawan') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('post');
                    $('#nik').attr('readonly', true);
                    $('#nik').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    getPP('kode_pp', result.data[0].kode_pp);
                    getKota( result.data[0].kode_pp, 'kode_kota', result.data[0].id_kota);
                    getDivisi('kode_divisi',result.data[0].kode_divisi);
                    getJabatan('kode_jab', result.data[0].kode_jab)
                    $('#email').val(result.data[0].email);
                    $('#telp').val(result.data[0].no_telp);
                    if(result.data[0].file_gambar !== '-'){
                        var html = "<img style='width:120px' src='"+result.data[0].file_gambar+"'>";
                        $('.preview').html(html);              
                    }    
                    $('#modal-preview').modal('hide');
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
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
        if($(this).index() != 6){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var status = data.flag_status;
            var html = `<tr>
                <td style='border:none'>NIK</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Kode Regional</td>
                <td>`+data.kode_pp+`</td>
            </tr>
            <tr>
                <td>Kode Jabatan</td>
                <td>`+data.kode_jab+`</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>`+data.email+`</td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td>`+data.no_telp+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        editData(id)
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });
    // END PREVIEW saat klik di list data //

    
    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('apv/karyawan') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Karyawan ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
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
                var kode_pp = $('#inp-filter_regional').val();
                var col_kode_pp = data[2];
                if(kode_pp != ""){
                    if(kode_pp == col_kode_pp){
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

    // Bagian CBBL
    var $target = "";
    var $target2 = "";
    
    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var regional = $('#kode_pp').val()

        switch(id) {
            case 'kode_pp': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('silo-master/filter-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Regional",
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
            case 'kode_kota': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('silo-master/filter-kota') }}",
                    columns : [
                        { data: 'kode_kota' },
                        { data: 'nama' }
                    ],
                    parameter: {
                        kode_pp: regional
                    },
                    judul : "Daftar Kota",
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
            case 'kode_divisi': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('silo-master/filter-divisi') }}",
                    columns : [
                        { data: 'kode_divisi' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Divisi",
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
            case 'kode_jab': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('silo-master/filter-jabatan') }}",
                    columns : [
                        { data: 'kode_jab' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jabatan",
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
    });
    //END SHOW CBBL//

    $('#nik,#nama,#kode_pp,#kode_kota,#kode_divisi,#kode_jab,#file_gambar').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['nik','nama','kode_pp','kode_kota','kode_divisi','kode_jab','file_gambar'];
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