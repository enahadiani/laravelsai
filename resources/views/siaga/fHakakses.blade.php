<link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Hak Akses" tambah="true" :thead="array('NIK','Nama','Kode Menu','Kode Lokasi','Status Admin','Aksi')" :thwidth="array(20,25,20,20,20,10)" :thclass="array('','','','','','text-center')" />
    <!-- END LIST DATA -->
    <!-- LIST DATA -->
    {{-- <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-3" style="padding-top:1rem;min-height:69.2px">
                    <h5 style="position:absolute;top: 25px;">Data Hak Akses</h5>
                    <button type="button" id="btn-tambah" class="btn btn-primary" style="float:right;" ><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="separator mb-2"></div>
                <div class="row" style="padding-right:1.75rem;padding-left:1.75rem">
                    <div class="dataTables_length col-sm-12" id="table-data_length"></div>
                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                        <div class="page-countdata">
                            <label>Menampilkan 
                            <select style="border:none" id="page-count">
                                <option value="10">10 per halaman</option>
                                <option value="25">25 per halaman</option>
                                <option value="50">50 per halaman</option>
                                <option value="100">100 per halaman</option>
                            </select>
                            </label>
                        </div>
                    </div>
                    <div class="d-block d-md-inline-block float-right col-md-6 col-sm-12">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="filter-btn" id="searchData">
                            <div class="input-group-append" id="filter-btn">
                                <span class="input-group-text"><span class="badge badge-pill badge-outline-primary mb-0" id="jum-filter" style="font-size: 8px;margin-right: 5px;padding: 0.5em 0.75em;"></span><i class="simple-icon-equalizer mr-1"></i>Filter</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="min-height: 560px !important;padding-top:0;">                    
                    <div class="table-responsive ">
                        <table id="table-data" style='width:100%'>                                    
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Kode Menu</th>
                                    <th>Kode Lokasi</th>
                                    <th>Status Admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- END LIST DATA -->
    <!-- FORM  -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
        <input type="hidden" id="method" name="_method" value="post">
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="kode_klp_menu" name="kode_klp_menu">
        <input type="hidden" id="path_view" name="path_view">
        <input type="hidden" id="kode_menu_lab" name="kode_menu_lab">
        <input type="hidden" id="nama" name="nama">
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
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" placeholder="Password" id="password" name="pass" autocomplete="off" required>                                       
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_menu_saku">Menu Esaku</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_menu_saku" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_menu_saku" autocomplete="off" id="kode_menu_saku" name="kode_menu_saku" value="" title="" data-input="cbbl" readonly>
                                    <span class="info-name_kode_menu_saku hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_menu_saku"></i>
                                </div>                        
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="menu_mobile">Form Default Awal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_menu_mobile" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-menu_mobile" autocomplete="off" id="menu_mobile" name="menu_mobile" value="" title="" data-input="cbbl" readonly>
                                    <span class="info-name_menu_mobile hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_menu_mobile"></i>
                                </div>                        
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="status">Status Admin</label>
                                <select class='form-control' id="status" name="status_admin">
                                    <option value=''>--- Pilih Status ---</option>
                                    <option value='A'>Admin</option>
                                    <option value='U'>User</option>
                                    <option value='P'>P</option>
                                </select>                
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="klp_akses">Kelompok Akses</label>
                                <input class="form-control" type="text" placeholder="Kelompok Akses" id="klp_akses" name="klp_akses" autocomplete="off" required>                                       
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
    <!-- END FORM -->

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
                            <label>Kode Menu</label>
                            <select class="form-control" data-width="100%" name="inp-filter_menu" id="inp-filter_menu">
                                <option value=''>Pilih Menu</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Status Admin</label>
                            <select class="form-control" data-width="100%" name="inp-filter_status" id="inp-filter_status">
                                <option value=''>Pilih Status</option>
                                <option value='A'>Admin</option>
                                <option value='U'>User</option>
                                <option value='P'>P</option>
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
    @include('modal_search')
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    // SET UP FORM //
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    setHeightForm();

    var $iconLoad = $('.preloader');
    var selectMenu = $('#inp-filter_menu').selectize();
    var selectStatus = $('#inp-filter_status').selectize();
    var selectStatusForm = $('#status').selectize();

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
            url: "{{ url('siaga-master/hakakses_menu') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    var select = selectMenu[0];
                    var control = select.selectize;
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].kode_klp + ' - ' + result.data[i].kode_klp, value:result.data[i].kode_klp}]);
                        }
                    }
                }
            }
        });
    })();

    function getNIK(kode_cbbl,kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/karyawan') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                     if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.nik == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].nik, filter[0].nama)
                        }
                    }
                }
            }
        });
    }

    function getKlpMenu(kode_cbbl,kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/hakakses_menu') }}",
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_klp == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].kode_klp, filter[0].kode_klp)
                        }
                    }
                }
            }
        });
    }

    
    function getMenu(kode_cbbl,kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/form') }}",
            dataType: 'json',
            async:false,
            success:function(res){ 
                var result = res.data;   
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_form == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].kode_form, filter[0].nama_form)
                        }
                    }
                }
            }
        });
    }

    function getPath(kode_cbbl,kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/form') }}",
            dataType: 'json',
            async:false,
            success:function(res){    
                var result = res.data;
                if(result.status){
                     if(typeof result.data !== 'undefined' && result.data.length>0){
                        var data = result.data;
                        var filter = data.filter(data => data.kode_form == kode);
                        if(filter.length > 0) {
                           showInfoField(kode_cbbl, filter[0].kode_form, filter[0].nama_form)
                        }
                    }
                }
            }
        });
    }

    jumFilter();
    // END FUNCTION GET DATA //
    // EVENT CHANGE //
    $('#nik').change(function(){
        var value = $(this).val();
        getNIK('nik',value);
    });
    $('#kode_menu_saku').change(function(){
        var value = $(this).val();
        getKlpMenu('kode_menu_saku',value);
    });
    $('#menu_mobile').change(function(){
        var value = $(this).val();
        getMenu('menu_mobile',value);
    });
    $('#inp-filter_menu').change(function(){
        jumFilter();
    });
    $('#inp-filter_status').change(function(){
        jumFilter();
    });
    // END EVENT CHANGE //
    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('siaga-master/hakakses') }}", 
        [
            {'targets': 5, data: null, 'defaultContent': action_html,'className': 'text-center' },
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
            { data: 'kode_menu_saku' },
            { data: 'kode_lokasi' },
            { data: 'status_admin' }
        ],
        "{{ url('siaga-auth/sesi-habis') }}",
        [[5 ,"desc"]]
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
        $('#judul-form').html('Tambah Data Hak Akses');
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
                var url = "{{ url('siaga-master/hakakses') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('siaga-master/hakakses') }}";
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
                        $('#judul-form').html('Tambah Data Hak Akses');
                        resetForm();
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
        $('#judul-form').html('Edit Data Hak Akses');
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/hakakses') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#id').val(id);
                    $('#nik').val(result.data[0].nik);
                    $('#nama').val(result.data[0].nama);
                    $('#password').val(result.data[0].pass);
                    $('#klp_akses').val(result.data[0].klp_akses);
                    var kode_menu_lab = (result.data[0].kode_menu_lab == '' || result.data[0].kode_menu_lab == null || result.data[0].kode_menu_lab == undefined ? '-' : result.data[0].kode_menu_lab);
                    $('#kode_menu_lab').val(kode_menu_lab);
                    var kode_klp_menu = (result.data[0].kode_klp_menu == '' || result.data[0].kode_klp_menu == null || result.data[0].kode_klp_menu == undefined ? '-' : result.data[0].kode_klp_menu);
                    $('#kode_klp_menu').val(kode_klp_menu);
                    $('#kode_menu_saku').val(result.data[0].kode_menu_saku);
                    $('#menu_mobile').val(result.data[0].menu_mobile);
                    var path_view = (result.data[0].path_view == '' || result.data[0].path_view == null || result.data[0].path_view == undefined ? '-' : result.data[0].path_view);
                    $('#path_view').val(path_view);
                    $('#status')[0].selectize.setValue(result.data[0].status_admin);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('kode_menu_saku',result.data[0].kode_menu_saku,result.data[0].nama_klp3)
                    showInfoField('menu_mobile',result.data[0].menu_mobile,result.data[0].nama_form3)
                    showInfoField('nik',result.data[0].nik,result.data[0].nama)
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
        if($(this).index() != 5){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>NIK</td>
                <td style='border:none'>`+data.nik+`</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Kode Menu</td>
                <td>`+data.kode_menu_saku+`</td>
            </tr>
            <tr>
                <td>Kode Lokasi</td>
                <td>`+data.kode_lokasi+`</td>
            </tr>
            <tr>
                <td>Status Admin</td>
                <td>`+data.status_admin+`</td>
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
            url: "{{ url('siaga-master/hakakses') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Hak Akses ('+id+') berhasil dihapus ');
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
                var kode_menu = $('#inp-filter_menu').val();
                var status = $('#inp-filter_status').val();
                var col_kode_menu = data[2];
                var col_status = data[4];
                if(kode_menu != "" && status != ""){
                    if(kode_menu == col_kode_menu && status == col_status){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_menu != "" && status == ""){
                    if(kode_menu == col_kode_menu) {
                        return true;
                    } else {
                        return false;
                    }
                }else if(kode_menu == "" && status != ""){
                    if(status == col_status) {
                        return true;
                    } else {
                        return false;
                    }
                } else{
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
        $('#inp-filter_menu')[0].selectize.setValue('');
        $('#inp-filter_status')[0].selectize.setValue('');
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

    // CBBL
    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var regional = $('#kode_pp').val()

        switch(id) {
            case 'nik': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('siaga-master/filter-nik') }}",
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
                    onItemSelected:function(data){
                        showInfoField('nik',data.nik,data.nama);
                        $('#nama').val(data.nama);
                    }
                }
            break;
            case 'kode_menu_saku': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('siaga-master/filter-klp-menu') }}",
                    columns : [
                        { data: 'kode_klp' },
                        { data: 'kode_klp' }
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
            case 'menu_mobile': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('siaga-master/filter-form') }}",
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
            showInpFilter(settings);
    });
    //END SHOW CBBL//

    $('#nik,#password,#kode_menu_saku,#menu_mobile,#klp_akses').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['nik','password','kode_menu_saku','menu_mobile','klp_akses'];
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