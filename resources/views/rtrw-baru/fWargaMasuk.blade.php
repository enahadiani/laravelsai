    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <style>
        #generate_kode
        {
            position: absolute;
            top: 30px;
            right: 25px;
            z-index: 2;
            font-size: 18px;
            cursor: pointer;
        }
        .card-body-footer{
            background: white;
            position: fixed;
            bottom: 15px;
            right: 0;
            margin-right: 30px;
            z-index:3;
            height: 60px;
            border-top: ;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
        }

        .card-body-footer > button{
            float: right;
            margin-top: 10px;
            margin-right: 25px;
        }

        #tgl_masuk-dp .datepicker-dropdown
        {
            left: 20px !important;
            top: 190px !important;
        }

        #tgl_lahir-dp .datepicker-dropdown
        {
            left: 10px !important;
            top: 190px !important;
        }
    
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Warga Masuk" tambah="true" :thead="array('Kode Rumah','Tipe','Blok','RT','RW','Status Huni','Aksi')" :thwidth="array(20,10,15,15,15,15,10)" :thclass="array('','','','','','','text-center')" />
    <!-- END LIST DATA -->

    <form id="form-tambah" class="tooltip-label-right" novalidate>
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
                                    <div class="col-md-6">
                                        <label for="kode_rw" >RW</label>
                                        <input class="form-control" type="text" placeholder="Kode RW" id="kode_rw" name="kode_rw" required readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kode_rt" >RT</label>
                                        <input class="form-control" type="text" placeholder="Kode RT" id="kode_rt" name="kode_rt" required readonly>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="kode_blok" >Blok</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_blok" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_blok" id="kode_blok" name="kode_blok" value="" title="">
                                            <span class="info-name_kode_blok hidden">
                                            <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_blok"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_rumah" >No Rumah</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_rumah" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-no_rumah" id="no_rumah" name="no_rumah" value="" title="">
                                            <span class="info-name_no_rumah hidden">
                                            <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_no_rumah"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tgl_masuk">Tgl Masuk</label>
                                        <span id="tgl_masuk-dp"></span>
                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" id="tgl_masuk" name="tgl_masuk" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sts_masuk">Status Masuk</label>
                                        <select class='form-control selectize' id="sts_masuk" name="sts_masuk">
                                        <option value='' disabled selected>--- Pilih Status ---</option>
                                        <option value='DATANG'>DATANG</option>
                                        <option value='LAHIR'>LAHIR</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12" id="div_asal">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="alamat_asal">Alamat Asal</label>
                                        <input type="text" class="form-control" placeholder="Alamat Asal" id="alamat_asal" name="alamat_asal" value="-" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs col-12 " role="tablist">
                           <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#pegawai" role="tab" aria-selected="true"><span class="hidden-xs-down">Daftar Penghuni</span></a> </li>
                        </ul>
                        <div class="tab-content tab-form-content col-12 pt-3 px-0">
                            <div class="tab-pane active" id="pegawai" role="tabpanel">
                                <div class="mb-3" >
                                     <table class="table table-bordered table-condensed gridexample display nowrap" id="input-grid" style='width:2140px !important'>
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:10px">No</th>
                                                <th style="width:20px">Action</th>
                                                <th style="width:100px">ID Warga</th>
                                                <th style="width:100px">NIK</th>
                                                <th style="width:200px">Nama</th>
                                                <th style="width:100px">Alias</th>
                                                <th style="width:100px">Jenis Kelamin</th>
                                                <th style="width:100px">Tempat Lahir</th>
                                                <th style="width:100px">Tgl Lahir</th>
                                                <th style="width:100px">Agama</th>
                                                <th style="width:100px">Status Nikah</th>
                                                <th style="width:100px">Gol. Darah</th>
                                                <th style="width:100px">Status Domisili</th>
                                                <th style="width:100px">Pendidikan</th>
                                                <th style="width:100px">Pekerjaan</th>
                                                <th style="width:150px">Hubungan</th>
                                                <th style="width:100px">No HP</th>
                                                <th style="width:100px">No Emergency</th>
                                                <th style="width:150px">Hubungan Emerg.</th>
                                                <th style="width:100px">Foto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    
                                </div>
                                <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Warga</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body-footer row" style="width: 900px;padding: 0 25px;">
                        <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                            <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                        </div>
                        <div style="text-align: right;" class="col-md-2 p-0 ">
                            <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    var valid = true;
    setHeightForm();

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.selectize').selectize();

    $("#tgl_masuk").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        container:'span#tgl_masuk-dp',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        orientation: 'bottom left'
    });

    $('.custom-file-input').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    });

    $('#form-tambah').on('change', '#sts_masuk', function(e){
        e.preventDefault();
        console.log('change');
        var sts = $('#sts_masuk')[0].selectize.getValue();
        if(sts == "DATANG"){
            $('#alamat_asal').val('');
            $('#div_asal').show();
        }else{
            $('#alamat_asal').val('-');
            $('#div_asal').hide();

        }
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var html = `<img id="img-preview" width="120px" src="`+e.target.result+`" alt="Preview" style='margin:0 auto'>`;
                $('.preview').html(html);
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }

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

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('rtrw-master/rumah') }}", 
        [
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        [
            { data: 'kode_rumah' },
            { data: 'tipe' },
            { data: 'blok' },
            { data: 'rt' },
            { data: 'rw' },
            { data: 'status_huni' }
        ],
        "{{ url('rtrw-auth/sesi-habis') }}",
        [[0 ,"desc"]]
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

    // LIST DETAIL
    var detailList = $("#input-grid").DataTable({
        destroy: true,
        // scrollY: 250,
        scrollX: true,
        paging:false,
        data: [],
        columns:[
            { data: 'no_urut' },
            { data:  null },
            { data: 'id_warga' },
            { data: 'nik' },
            { data: 'nama' },
            { data: 'alias' },
            { data: 'jk' },
            { data: 'tempat_lahir' },
            { data: 'tgl_lahir' },
            { data: 'agama' },
            { data: 'sts_nikah' },
            { data: 'goldar' },
            { data: 'sts_domisili' },
            { data: 'pendidikan' },
            { data: 'pekerjaan' },
            { data: 'sts_hub' },
            { data: 'no_hp' },
            { data: 'emerg_call' },
            { data: 'ket_emergency' },
            { data: 'foto' }
        ],
        columnDefs: [
            {
                "targets": 1,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return "<a class='edit-item' href='#' style='font-size:18px' title='Edit Data' data-id_warga='"+row.id_warga+"'><i class='simple-icon-pencil'></i></a>&nbsp;<a class=' hapus-item' href='#' title='Hapus Data' style='font-size:18px' data-id_warga='"+row.id_warga+"'><i class='simple-icon-trash'></i></a>";
                }
            }, 
            {
                "targets": 19,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    if(row.foto != "" && row.foto != "-" && row.foto != null){
                        var url = ("{{ config('api.url') }}" == "http://localhost:8080/api/" ? "https://devapi.simkug.com/api/rtrw/storage" : "{{ config('api.url') }}rtrw/storage");
                        return "<a class='download-item' target='_blank' style='font-size:18px' href='"+url+"/"+row.foto+"' title='Download/View Foto'><i class='simple-icon-cloud-download'></i></a>";
                    }else{
                        return "-";
                    }
                }
            }, 
        ],
        order: [[ 0, 'asc' ]],
        sDom: 't<"row view-pager pl-2 mt-3">',
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        }
    });
    // END LIST

    // CBBL
    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    function deleteInfoField(par){
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $('#'+par).closest('div').find('.info-icon-hapus').addClass('hidden');
    }

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
    // END CBBL

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Warga Masuk');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_rw').val("{{ Session::get('lokasi') }}");
        $('#kode_rt').val("{{ Session::get('kodePP') }}");
        $('#tgl_masuk').val("{{ date('d/m/Y') }}");
        $('#div_asal').hide();
        $('#saku-datatable').hide();
        $('#saku-form').show();
        detailList.clear().draw();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
        setWidthFooterCardBody()
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
        var kode = $('#kode_lokasi').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_blok: 
            { 
                required:true 
            },
            no_rumah: 
            { 
                required:true 
            },
            kode_rt: 
            { 
                required:true 
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            var parameter = $('#id_edit').val();
            var id = $('#no_rumah').val();
            if(parameter == "edit"){
                var url = "{{ url('rtrw-master/warga-masuk-ubahstatus') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('rtrw-master/warga-masuk-ubahstatus') }}";
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
                        detailList.clear().draw();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('.input-group-prepend').addClass('hidden');
                        $('span[class^=info-name]').addClass('hidden');
                        $('.info-icon-hapus').addClass('hidden');
                        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
                        $('#judul-form').html('Tambah Data Warga Masuk');
                        $('#method').val('post');
                        msgDialog({
                            id:id,
                            type:'simpan',
                            text:result.data.message
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/rtrw-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.no_bukti,
                                text:'ID Warga sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+JSON.stringify(result.data.message)+'</a>'
                            })
                        }
                    }
                },
                error: function(xhr, status, error) {
                    var error = JSON.parse(xhr.responseText);
                    var detail = Object.values(error.errors)
                    Swal.fire({
                        type: 'error',
                        title: error.message,
                        text: detail[0]
                    })
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-save').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rtrw-master/warga-masuk') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Warga Masuk ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
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

    function getRumah(id=null,blok=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/rumah') }}/"+id,
            dataType: 'json',
            async:false,
            data:{blok: blok},
            success:function(result){   
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('no_rumah',result.data[0].kode_rumah,result.data[0].nama_pemilik);
                    }else{
                        $('#no_rumah').attr('readonly',false);
                        $('#no_rumah').css('border-left','1px solid #d7d7d7');
                        $('#no_rumah').val('');
                        $('#no_rumah').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#no_rumah').attr('readonly',false);
                    $('#no_rumah').css('border-left','1px solid #d7d7d7');
                    $('#no_rumah').val('');
                    $('#no_rumah').focus();
                }
            }
        });
    }

    
    function getBlok(id=null,rt=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/blok') }}/"+id,
            dataType: 'json',
            async:false,
            data:{kode_pp: rt},
            success:function(result){   
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_blok',result.data[0].blok,"");
                    }else{
                        $('#kode_blok').attr('readonly',false);
                        $('#kode_blok').css('border-left','1px solid #d7d7d7');
                        $('#kode_blok').val('');
                        $('#kode_blok').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#kode_blok').attr('readonly',false);
                    $('#kode_blok').css('border-left','1px solid #d7d7d7');
                    $('#kode_blok').val('');
                    $('#kode_blok').focus();
                }
            }
        });
    }

    
    function generateIDWarga(tgl_masuk){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/generate-idwarga') }}",
            dataType: 'json',
            async:false,
            data:{tgl_masuk: tgl_masuk},
            success:function(result){   
                $('#id_warga').val('');
                if(result.status){
                    $('#id_warga').val(result.no_bukti);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    alert('Generate ID Error');
                }
            }
        });
    }

    function showDetList(no_rumah,kode_blok){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/warga-masuk-detail-list') }}",
            dataType: 'json',
            async:false,
            data:{no_rumah: no_rumah, kode_blok:kode_blok},
            success:function(result){   
                detailList.clear().draw();
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        detailList.rows.add(result.data).draw(false);
                    }
                    $('.dataTables_scrollBody td').css({'padding-top':'4px', 'padding-bottom':'4px'});
                    detailList.columns.adjust().draw();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    alert('Generate ID Error');
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

    // BUTTON EDIT
    function editData(id,data){
        $('#id_edit').val('edit');
        $('#method').val('post');
        $('#kode_rw').val(data.rw);
        $('#kode_rt').val(data.rt); 
        $('#no_rumah').val(data.kode_rumah); 
        $('#kode_blok').val(data.blok);
        $('#sts_masuk')[0].selectize.setValue('');
        $('#div_asal').hide();
        $('#tgl_masuk').val('');
        $('#saku-datatable').hide();
        $('#modal-preview').modal('hide');
        $('#saku-form').show();
        showDetList(data.kode_rumah,data.blok);
        setHeightForm();
        setWidthFooterCardBody();
    }

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var index= $(this).closest('tr').index();
        var data = {
            rt: $(this).closest('tr').find('td').eq(3).html(),
            rw: $(this).closest('tr').find('td').eq(4).html(),
            kode_rumah: $(this).closest('tr').find('td').eq(0).html(),
            blok:  $(this).closest('tr').find('td').eq(2).html()
        };
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Warga Masuk');
        editData(id,data);
    });

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 6){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var index= $(this).closest('tr').index();
            var data = {
                rt: $(this).closest('tr').find('td').eq(3).html(),
                rw: $(this).closest('tr').find('td').eq(4).html(),
                kode_rumah: $(this).closest('tr').find('td').eq(0).html(),
                blok:  $(this).closest('tr').find('td').eq(2).html()
            };
            var html = `<div class="preview-header" style="display:block;height:39px;padding: 0 1.75rem" >
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
            <div class='preview-body' style='padding: 0 1.75rem;height: calc(75vh - 56px) position:sticky;min-height:300px'>
                <table class="table table-prev mt-2" width="100%" style="padding-bottom:200px">
                    <tr>
                    <td style='border:none'>ID Warga</td>
                    <td style='border:none'>`+data.no_bukti+`</td>
                    </tr>
                    <tr>
                    <td>Blok</td>
                    <td>`+data.kode_blok+`</td>
                    </tr>
                    <tr>
                    <td>Nama</td>
                    <td>`+data.nama+`</td>
                    </tr>
                    <tr>
                    <td>Tgl Masuk</td>
                    <td>`+data.tgl_masuk+`</td>
                    </tr>
                    <tr>
                    <td>Status Masuk</td>
                    <td>`+data.sts_masuk+`</td>
                    </tr>
                </table>
            </div>`;
            $('#content-bottom-sheet').html(html);
            var scroll = document.querySelector('.preview-body');
            var psscroll = new PerfectScrollbar(scroll);
            
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
                $('#judul-form').html('Edit Data Warga Masuk');
                $('#form-tambah')[0].reset();
                $('#form-tambah').validate().resetForm();
                
                $('#btn-save').attr('type','button');
                $('#btn-save').attr('id','btn-update');
                $('.c-bottom-sheet').removeClass('active');
                editData(id,data);
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

    function getBlok(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/blok') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                deleteInfoField('no_rumah');
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_blok',result.data[0].blok,"");
                    }else{
                        $('#kode_blok').attr('readonly',false);
                        $('#kode_blok').css('border-left','1px solid #d7d7d7');
                        $('#kode_blok').val('');
                        $('#kode_blok').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#kode_blok').attr('readonly',false);
                    $('#kode_blok').css('border-left','1px solid #d7d7d7');
                    $('#kode_blok').val('');
                    $('#kode_blok').focus();
                }
            }
        });
    }


    $('#form-tambah').on('click', '.search-item2', function(e){
        e.preventDefault();
        var id = $(this).closest('div').find('input').attr('name');
        var options = {};
        switch(id){
            case 'kode_blok':
                options = {
                    id : id,
                    header : ['Kode'],
                    url : "{{ url('rtrw-master/blok') }}",
                    columns : [
                        { data: 'blok' }
                    ],
                    judul : "Daftar Blok",
                    pilih : "blok",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["100%"],
                    parameter:{kode_pp:$('#kode_pp').val()},
                    onItemSelected: function(data){
                        showInfoField("kode_blok",data.blok,"");
                        deleteInfoField("no_rumah");
                        detailList.clear().draw();
                    }
                };
                break;
            case 'no_rumah':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('rtrw-master/rumah') }}",
                    columns : [
                        { data: 'kode_rumah' },
                        { data: 'nama_pemilik' }
                    ],
                    judul : "Daftar Rumah",
                    pilih : "rumah",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    parameter:{blok:$('#kode_blok').val()},
                    onItemSelected: function(data){
                        showInfoField("no_rumah",data.kode_rumah,data.nama_pemilik);
                        var kode_blok=$('#kode_blok').val();
                        if(kode_blok != "" || kode_blok != "-"){
                            showDetList(data.kode_rumah,kode_blok);
                        }
                    }
                };
                break;
        }
        showInpFilterBSheet(options);
    });

    
    $('#form-tambah').on('change', '#kode_blok', function(e){
        e.preventDefault();
        var par = $(this).val();
        var kode_rt = $('#kode_rt').val();
        getBlok(par,kode_rt);
    });

    $('#form-tambah').on('change', '#no_rumah', function(e){
        e.preventDefault();
        var par = $(this).val();
        var blok = $('#kode_blok').val();
        getRumah(par,blok);
    });

    // ENTER FIELD FORM
    $('#kode_rw,#kode_rt,#kode_blok,#no_rumah,#tgl_masuk,#sts_masuk,#alamat_asal').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_rw','kode_rt','kode_blok','no_rumah','tgl_masuk','sts_masuk','alamat_asal'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 6){
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
    // END ENTER FIELD FORM

    function hapusRow(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('rtrw-master/warga-masuk') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    showDetList($('#no_rumah').val(),$('#kode_blok').val());                 
                    showNotification("top", "center", "success",'Hapus Data','Data Warga Masuk ('+id+') berhasil dihapus ');
                    $('#table-delete tbody').html('');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
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

    $('#input-grid').on('click', '.hapus-item', function(e){
        e.preventDefault();
        var id = $(this).closest('tr').find('td').eq(2).html();
        hapusRow(id);
    });

    $('#input-grid').on('click', '.edit-item', function(e){
        e.preventDefault();
        var index = $(this).closest('tr').index();
        var data = detailList.rows().data();
        addRow("edit", data[index]);
    });

    function addRow(kode, data){
        var html = `<div class="detail-header" style="display:block;height:39px;padding: 0 1.75rem" >
                <h6 style="position: absolute;" id="detail-judul">Detail Data Warga</h6>
                    <span id="detail-nama" style="display:none"></span><span id="detail-id" style="display:none">`+id+`</span> 
            </div>
            <div class='separator'></div>
            <div class='detail-body' style='padding: 0 1.75rem;height: calc(80vh - 56px);position:sticky;min-height:300px'>
            <form id='form-detail' class="tooltip-label-right" novalidate>
                <input class="form-control" type="hidden" id="id_detail" name="id_detail" readonly="true" >
                <input type="hidden" id="method2" name="_method" value="post">
                <ul class="nav nav-tabs col-12 " role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#pribadi" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Pribadi</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pelengkap" role="tab" aria-selected="true"><span class="hidden-xs-down">Pelengkap</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#emergency" role="tab" aria-selected="true"><span class="hidden-xs-down">Emergency</span></a> </li>
                </ul>
                <div class="tab-content tab-form-content col-12 pt-3 px-0">
                    <div class="tab-pane active" id="pribadi" role="tabpanel">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="id_warga" >ID Warga</label>
                                        <input class="form-control" type="text" placeholder="ID Warga" id="id_warga" name="id_warga" readonly="true" required>
                                        <i class="simple-icon-refresh" id="generate_kode"></i>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nik" >NIK</label>
                                        <input class="form-control" type="text" placeholder="NIK" id="nik" name="nik" required>          
                                    </div>
                                </div>               
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="nama" >Nama</label>
                                        <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" required>          
                                    </div>
                                </div>            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="alias" >Alias</label>
                                        <input class="form-control" type="text" placeholder="Alias" id="alias" name="alias" required>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jk" >Jenis Kelamin</label>
                                        <select name="jk" class="form-control selectize2" id="jk">
                                            <option value='' disabled selected>--- Pilih ---</option>
                                            <option value="P">P</option>
                                            <option value="L">L</option>
                                        </select>
                                    </div>
                                </div> 
                            </div>
                            <div class="form-group col-md-6 col-sm-12">           
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tempat_lahir" >Tempat Lahir</label>
                                        <input class="form-control" type="text" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" required>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tgl_lahir" >Tgl Lahir</label>
                                        <span id="tgl_lahir-dp"></span>
                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" id="tgl_lahir" name="tgl_lahir" required>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="agama" >Agama</label>
                                        <select  name='agama' class='form-control selectize2' id="agama" required>
                                            <option value='' disabled selected>--- Pilih ---</option>
                                            <option value='ISLAM'>ISLAM</option>
                                            <option value='BUDHA'>BUDHA</option>
                                            <option value='KRISTEN'>KRISTEN</option>
                                            <option value='HINDU'>HINDU</option>
                                            <option value='PROTESTAN'>PROTESTAN</option>
                                            <option value='LAINNYA'>LAINNYA</option>
                                        </select>   
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sts_nikah" >Status Nikah</label>
                                        <select name="sts_nikah" class="form-control selectize2" id="sts_nikah">
                                            <option value='' disabled selected>--- Pilih ---</option>
                                            <option value="KAWIN">KAWIN</option>
                                            <option value="BELUM KAWIN">BELUM KAWIN</option>
                                        </select>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pelengkap" role="tabpanel">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="pendidikan" >Pendidikan</label>
                                        <input class="form-control" type="text" placeholder="Pendidikan Terakhir" id="pendidikan" name="pendidikan" required>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pekerjaan" >Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file_gambar" class="custom-file-input" id="file_gambar" accept="image/*" onchange="readURL(this)">
                                                <label class="custom-file-label" style="border-radius: 0.5rem;" for="file_gambar">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="goldar" >Golongan Darah</label>
                                        <select  name='goldar' id='goldar' class='form-control selectize2' required>
                                        <option value='' disabled selected>--- Pilih ---</option>
                                        <option value='A'>A</option>
                                        <option value='B'>B</option>
                                        <option value='AB'>AB</option>
                                        <option value='O'>O</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="sts_domisili" >Status Domisili</label>
                                        <select name="sts_domisili" class="form-control selectize2" id="sts_domisili">
                                            <option value='' disabled selected>--- Pilih ---</option>
                                            <option value="DOMISILI">DOMISILI</option>
                                            <option value="BELUM DOMISILI">BELUM DOMISILI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="sts_hub" >Hubungan</label>
                                        <select name="sts_hub" class="form-control selectize2" id="sts_hub">
                                            <option value='' disabled selected>--- Pilih ---</option>
                                                <option value='KEPALA KEL.'>KEPALA KEL.</option>
                                                <option value='ISTRI'>ISTRI</option>
                                                <option value='ANAK'>ANAK</option>
                                                <option value='ORANGTUA'>ORANGTUA</option>
                                                <option value='ART'>ART</option>
                                                <option value='REKAN'>REKAN</option>
                                                <option value='FAMILI LAIN'>FAMILI LAIN</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_hp" >No HP</label>
                                        <input class="form-control" type="text" placeholder="No Handphone" id="no_hp" name="no_hp" required>          
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row mb-2 text-center">
                                    <div style="" class="col-12">
                                        <div class="preview text-center" style="height:120px;width:120px;margin: 0 auto;border: 1px solid #d7d7d7;border-radius: 0.5rem;">Preview</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="emergency" role="tabpanel">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="emerg_call">No Emergency</label>
                                        <input class="form-control" type="text" placeholder="No Handphone Emergency" id="emerg_call" name="emerg_call" required>          
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ket_emergency" >Hubungan Keluarga Emergency</label>
                                        <input class="form-control" type="text" placeholder="Keterangan Emergency" id="ket_emergency" name="ket_emergency" required>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row' style='position: absolute;bottom: 20px;right: 40px;'>
                    <div class='col-12 text-right'>
                        <button id='btn-detail' class='btn btn-sm btn-primary' type='submit'>Simpan</button>
                    </div>
                </div>
            </form>
            </div>`;
            $('#content-bottom-sheet').html(html);
            
            var tgl = $('#tgl_masuk').val();
            generateIDWarga(tgl);
            $('.selectize2').selectize();
            var scroll = document.querySelector('.detail-body');
            var psscroll = new PerfectScrollbar(scroll);

            $("#tgl_lahir").bootstrapDP({
                autoclose: true,
                format: 'dd/mm/yyyy',
                container:'span#tgl_lahir-dp',
                templates: {
                    leftArrow: '<i class="simple-icon-arrow-left"></i>',
                    rightArrow: '<i class="simple-icon-arrow-right"></i>'
                },
                orientation: 'bottom left'
            });

            if(kode == "edit"){
                $('#id_detail').val('edit');
                $('#id_warga').val(data.id_warga);
                $('#nama').val(data.nama);
                $('#nik').val(data.nik);
                $('#alias').val(data.alias);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tgl_lahir').val(data.tgl_lahir);
                $('#kode_blok').val(data.kode_blok);
                // $('#sts_masuk')[0].selectize.setValue(data.sts_masuk);
                // $('#alamat_asal').val(data.alamat_asal);
                // $('#tgl_masuk').val(data.tgl_masuk);
                $('#agama')[0].selectize.setValue(data.agama);
                $('#jk')[0].selectize.setValue(data.jk);
                $('#pendidikan').val(data.pendidikan); 
                $('#pekerjaan').val(data.pekerjaan); 
                $('#no_hp').val(data.no_hp); 
                $('#emerg_call').val(data.emerg_call); 
                $('#ket_emergency').val(data.ket_emergency); 
                $('#sts_nikah')[0].selectize.setValue(data.sts_nikah);
                $('#sts_hub')[0].selectize.setValue(data.sts_hub);
                $('#sts_domisili')[0].selectize.setValue(data.sts_domisili);
                $('#goldar')[0].selectize.setValue(data.goldar);
                var url = ("{{ config('api.url') }}" == "http://localhost:8080/api/" ? "https://devapi.simkug.com/api/rtrw/storage" : "{{ config('api.url') }}rtrw/storage");
                var html = "<img style='width:120px' style='margin:0 auto' src='"+url+"/"+data.foto+"'>";
                $('.preview').html(html);   
            }

            $('#id_warga,#nik,#nama,#alias,#jk,#tempat_lahir,#tgl_lahir,#agama,#goldar,#pendidikan,#pekerjaan,#sts_nikah,#sts_domisili,#sts_hub,#no_hp,#emerg_call,#ket_emergency,#foto').keydown(function(e){
                var code = (e.keyCode ? e.keyCode : e.which);
                var nxt = ['id_warga','nik','nama','alias','jk','tempat_lahir','tgl_lahir','agama','goldar','pendidikan','pekerjaan','sts_nikah','sts_domisili','sts_hub','no_hp','emerg_call','ket_emergency','foto'];
                if (code == 13 || code == 40) {
                    e.preventDefault();
                    var idx = nxt.indexOf(e.target.id);
                    idx++;
                    if(idx == 5 || idx == 9 || idx == 12 || idx== 13 || idx == 14){
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
            
            $('#form-detail').on('click', '#generate_kode', function(e){
                e.preventDefault();
                var tgl = $('#tgl_masuk').val();
                generateIDWarga(tgl);
            });

            //BUTTON SIMPAN /SUBMIT
            $('#form-detail').validate({
                ignore: [],
                rules: 
                {
                    id_warga: 
                    { 
                        required:true 
                    },
                    nama: 
                    { 
                        required:true 
                    },
                    alias: 
                    { 
                        required:true 
                    },
                    nik: 
                    { 
                        required:true 
                    },
                    jk: 
                    { 
                        required:true 
                    },
                    tempat_lahir: 
                    { 
                        required:true 
                    },
                    tgl_lahir: 
                    { 
                        required:true 
                    },
                    agama: 
                    { 
                        required:true 
                    },
                    goldar: 
                    { 
                        required:true 
                    },
                    pendidikan: 
                    { 
                        required:true 
                    },
                    pekerjaan: 
                    { 
                        required:true 
                    },
                    sts_nikah: 
                    { 
                        required:true 
                    },
                    sts_hub: 
                    { 
                        required:true 
                    },
                    sts_domisili: 
                    { 
                        required:true 
                    },
                    no_hp: 
                    { 
                        required:true 
                    },
                    no_telp_emergency: 
                    { 
                        required:true 
                    },
                    ket_emergency: 
                    { 
                        required:true 
                    }
                },
                errorElement: "label",
                submitHandler: function (form, event) {
                    event.preventDefault();
                    var parameter = $('#id_detail').val();
                    var id = $('#id_warga').val();
                    if(parameter == "edit"){
                        var url = "{{ url('rtrw-master/warga-masuk') }}/"+id;
                        var pesan = "updated";
                        var text = "Perubahan data "+id+" telah tersimpan";
                    }else{
                        var url = "{{ url('rtrw-master/warga-masuk') }}";
                        var pesan = "saved";
                        var text = "Data tersimpan dengan kode "+id;
                    }

                    var formData = new FormData(form);
                    formData.append('sts_masuk',$('#sts_masuk')[0].selectize.getValue());
                    formData.append('tgl_masuk',$('#tgl_masuk').val());
                    formData.append('kode_blok',$('#kode_blok').val());
                    formData.append('no_rumah',$('#no_rumah').val());
                    formData.append('kode_rt',$('#kode_rt').val());
                    formData.append('alamat_asal',$('#alamat_asal').val());

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
                                $('#form-detail')[0].reset();
                                $('#form-detail').validate().resetForm();
                                msgDialog({
                                    id:id,
                                    type:'warning',
                                    title:'Tersimpan',
                                    text:result.data.message
                                });
                                last_add("id_warga",result.data.kode);
                                showDetList($('#no_rumah').val(),$('#kode_blok').val());
                                $('.c-bottom-sheet').removeClass('active');
                            }else if(!result.data.status && result.data.message === "Unauthorized"){
                            
                                window.location.href = "{{ url('/rtrw-auth/sesi-habis') }}";
                                
                            }else{
                                if(result.data.kode == "-" && result.data.jenis != undefined){
                                    msgDialog({
                                        id: id,
                                        type: result.data.no_bukti,
                                        text:'ID Warga sudah digunakan'
                                    });
                                }else{

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                        footer: '<a href>'+JSON.stringify(result.data.message)+'</a>'
                                    })
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            var error = JSON.parse(xhr.responseText);
                            var detail = Object.values(error.errors)
                            Swal.fire({
                                type: 'error',
                                title: error.message,
                                text: detail[0]
                            })
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
            });
            
            $('.c-bottom-sheet__sheet').css({ "width":"70%","margin-left": "15%", "margin-right":"15%"});
            $('#trigger-bottom-sheet').trigger("click");
        
    }

    $('#form-tambah').on('click', '.add-row', function(){
        var kode_blok = $('#kode_blok').val();
        var no_rumah = $('#no_rumah').val();
        if(kode_blok == "" || no_rumah == ""){
            msgDialog({
                id:'-',
                type:'warning',
                title:'Peringatan',
                text: 'Blok dan No Rumah wajib diisi terlebih dahulu'
            });
        }else{
            addRow();
        }
    });

    </script>