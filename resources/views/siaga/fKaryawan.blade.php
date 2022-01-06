    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
    <style>
        
        #table-data_wrapper .dataTables_scrollHeadInner, #table-data
        {
            width: 1650px !important;
        }
        #table-data_wrapper .dataTables_scrollHeadInner th {
            padding: 8px !important;
            border-bottom: 0px !important;
            vertical-align:middle;
            text-align:center;
        }
        #table-data_wrapper .dataTables_scrollBody th {
            padding: 0px 8px !important;
        }
        table.dataTable{
            border-collapse:collapse !important;
        }
        .icon-tambah {
            background: #505050;
            /* mask: url("{{ url('img/add.svg') }}"); */
            -webkit-mask-image: url("{{ url('img/add.svg') }}");
            mask-image: url("{{ url('img/add.svg') }}");
            width: 12px;
            height: 12px;
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
    
    </style>
    <!-- LIST DATA -->
    <x-list-data judul="Data Karyawan" tambah="true" :thead="array('NIK','Nama','Band','Jabatan','PP','Status','No Telpon','No HP','Email','Alamat','Action')" :thwidth="array(80,250,100,300,250,100,100,100,200,800,150)" :thclass="array('','','','','','','','','','','text-center')" :optionpage="array()" tpwidth="px"/>
    <!-- END LIST DATA -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
        <input type="hidden" id="method" name="_method" value="post">
        <input type="hidden" id="id" name="id">
        
        @php 
        $inp = array('alamat','npwp','bank','cabang','no_rek','nama_rek','status','band','kota','kode_pos');
        @endphp
        @for($i=0; $i < count($inp); $i++)
        <input type="hidden" name="{{ $inp[$i] }}" id="{{ $inp[$i] }}" value="-">
        @endfor
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nik2">NIK Gratika</label>
                                <input class="form-control" type="text" placeholder="NIK" id="nik2" name="nik2" autocomplete="off" readonly>                        
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="sts_sdm">Status SDM</label>
                                <input class="form-control" type="text" id="sts_sdm" name="sts_sdm" value="" readonly>                        
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="nama">Nama</label>
                                <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" autocomplete="off" readonly>                       
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="jab">Jabatan</label>
                                <input class="form-control" type="text" placeholder="Jabatan" id="jab" name="jab" autocomplete="off" >                       
                            </div>
                        </div>
                        <div class="form-row">
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
                                <label for="kode_pp">PP Aktif</label>
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
                                <label for="kode_pp2">PP Baru</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_pp2" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_pp2" autocomplete="off" id="kode_pp2" name="kode_pp2" value="" title="" data-input="cbbl" readonly>
                                    <span class="info-name_kode_pp2 hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_pp2"></i>
                                </div>                     
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-sm-12">
                                <label for="flag_aktif">Status Aktif</label>
                                <select class="form-control selectize" name="flag_aktif" id="flag_aktif">
                                    <option value='0'>NONAKTIF</option>
                                    <option value='1'>AKTIF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" placeholder="Email" id="email" name="email"  required>                       
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="no_hp">No HP</label>
                                <input class="form-control" type="text" placeholder="No HP" id="no_hp" name="no_hp" autocomplete="off" required>                    
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="file">Foto</label>
                                <div class="custom-file">
                                    <input type="file" name="file_gambar" class="custom-file-input" id="file_gambar" accept="image/*" onchange="readURL(this)">
                                    <label class="custom-file-label" style="border-radius: 0.5rem;" for="file_gambar">Choose file</label>
                                </div>                 
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="preview">

                            </div>
                        </div>
                    </div>
                    <div class="card-body-footer row mx-auto" style="padding: 0 25px;">
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log('change');
            reader.onload = function (e) {
                var html = `<img id="img-preview" width="120px" src="`+e.target.result+`" alt="Preview" style='margin:0 auto'>`;
                $('.preview').html(html);
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }

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
    $('.selectize').selectize();
    function getPP(kode_cbbl, kode) {
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/unit') }}",
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

    function getJabatan(kode_cbbl,kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/jabatan') }}",
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
        "{{ url('siaga-master/karyawan') }}", 
        [
            {'targets': 10, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
            { data: 'nik'},
            { data: 'nama'},
            { data: 'band'},
            { data: 'jabatan'},
            { data: 'pp'},
            { data: 'status'},
            { data: 'no_telp'},
            { data: 'no_hp'},
            { data: 'email'},
            { data: 'alamat'},
        ],
        "{{ url('siaga-auth/sesi-habis') }}",
        [[0 ,"asc"]],
        {},
        true,
        ''
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
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Karyawan');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#input-grid tbody').html('');
        $('#input-lap tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // newForm()
        setHeightForm();
        setWidthFooterCardBody();
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
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#nik').val();
            if(parameter == "edit"){
                var url = "{{ url('siaga-master/karyawan') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('siaga-master/karyawan') }}";
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
                        var kode = $('#nik').val();
                        $('#judul-form').html('Tambah Data Karyawan');
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
            url: "{{ url('siaga-master/karyawan') }}/" + id,
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
                    var line = result.data[0];
                    $('#nik2').val(line.nik2);
                    $('#nama').val(line.nama);						
                    $('#sts_sdm').val(line.sts_sdm);			
                    $('#tgl_lahir').val(line.tgl_lahir);
                    $('#alamat').val(line.alamat);	
                    console.log(line.sts_sdm);	
                    
                    if(result.data2.length > 0){
                        var line2 = result.data2[0];
                        $('#nama').val(line2.nama);
                        $('#alamat').val(line2.alamat);
                        $('#jab').val(line2.jabatan);
                        $('#kode_jab').val(line2.kode_jab);
                        $('#no_telp').val(line2.no_telp);
                        $('#email').val(line2.email);
                        $('#npwp').val(line2.npwp);						
                        $('#bank').val(line2.bank);
                        $('#cabang').val(line2.cabang);
                        $('#no_rek').val(line2.no_rek);
                        $('#nama_rek').val(line2.nama_rek);
                        $('#flag_aktif').val(line2.status);
                        $('#band').val(line2.grade);
                        $('#kota').val(line2.kota);
                        $('#kode_pos').val(line2.kode_pos);
                        $('#no_hp').val(line2.no_hp);					
                        $('#kode_pp').val(line2.kode_pp);						
                        $('#kode_pp2').val(line2.kode_pp);	
                        
                        
                        if (line2.flag_aktif == "0") $('#flag_aktif')[0].selectize.setValue(0);
                        else $('#flag_aktif')[0].selectize.setValue(1);
                        
                        if(line2.foto !== '-'){
                            var html = "<img style='width:120px' src='"+line2.foto+"'>";
                            $('.preview').html(html);              
                        }else{
                            $('.preview').html('');              
                        }    
                        getJabatan('kode_jab',line2.kode_jab);
                        getPP('kode_pp',line2.kode_pp);
                        getPP('kode_pp2',line2.kode_pp);
                    }else{
                        $('#id_edit').val('');
                        $('#method').val('post');
                        $('#alamat').val('-');
                        $('#jab').val('');
                        $('#kode_jab').val('');
                        $('#no_telp').val('-');
                        $('#email').val('');
                        $('#npwp').val('-');						
                        $('#bank').val('-');
                        $('#cabang').val('-');
                        $('#no_rek').val('-');
                        $('#nama_rek').val('-');
                        $('#flag_aktif').val('');
                        $('#band').val('-');
                        $('#kota').val('-');
                        $('#kode_pos').val('-');
                        $('#no_hp').val('');				
                        $('#kode_pp').val('');						
                        $('#kode_pp2').val('');	
                        
                        $('#btn-update').attr('type','submit');
                        $('#btn-update').attr('id','btn-save');
                        $('#judul-form').html('Tambah Data Karyawan');
                        $('#flag_aktif')[0].selectize.setValue(1);
                        $('.preview').html('');              
                    }
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
        if($(this).index() != 10){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>NIK</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>PP</td>
                <td>`+data.pp+`</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>`+data.jabatan+`</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>`+data.email+`</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>`+data.no_hp+`</td>
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
            url: "{{ url('siaga-master/karyawan') }}/"+id,
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
            case 'kode_pp2': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('siaga-master/unit') }}",
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
            case 'kode_jab': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('siaga-master/jabatan') }}",
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
            case 'nik': 
                var settings = {
                    id : id,
                    header : ['NIK', 'Nama'],
                    url : "{{ url('siaga-master/karyawan-nik') }}",
                    columns : [
                        { data: 'nik' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Karyawan",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                    onItemSelected: function(data){
                        showInfoField('nik', data.nik, data.nama);
                        editData(data.nik);   
                    }
                }
            break;
            default:
            break;
        }
        showInpFilter(settings);
    });
    //END SHOW CBBL//

    $('#nik,#nik2,#sts_sdm,#nama,#jab,#kode_jab,#kode_pp,#kode_pp2,#flag_aktif,#email,#no_hp,#file_gambar').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['nik','nik2','sts_sdm','nama','jab','kode_jab','kode_pp','kode_pp2','flag_aktif','email','no_hp','file_gambar'];
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