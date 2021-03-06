    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Referensi Transaksi" tambah="true" :thead="array('Kode','Nama','Akun Debet','Akun Kredit','Jenis','PP','Tgl Input','Aksi')" :thwidth="array(10,25,15,15,10,15,0,10)" :thclass="array('','','','','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
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
                                <label for="jenis">Jenis</label>
                                <select required class='form-control selectize' id="jenis" name="jenis" required>
                                    <option value=''>--- Pilih Jenis ---</option>
                                    <option value='PENGELUARAN'>PENGELUARAN</option>
                                    <option value='PEMASUKAN'>PEMASUKAN</option>
                                    <option value='PINDAH BUKU'>PINDAH BUKU</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_ref">Kode</label>
                                <input class="form-control" type="text" placeholder="Kode Ref" id="kode_ref" name="kode_ref" required>
                                {{-- <div class="input-group readonly">
                                    <input class="form-control" type="text" placeholder="Kode Ref" id="kode_ref" name="kode_ref" required readonly="readonly" style="border-top-right-radius:0px !important;border-bottom-right-radius:0px !important">
                                    <div class="input-group-append">
                                        <button disabled="true" style="border-top-left-radius:0px !important;border-bottom-left-radius:0px !important;" class="btn btn-info py-0 px-3" id="getRef" type="button"><i class="simple-icon-refresh"></i></button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" rows="4" id="nama" name="nama"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="akun_debet">Akun Debet</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_akun_debet" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-akun_debet" id="akun_debet" name="akun_debet" value="" title="">
                                    <span class="info-name_akun_debet hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_akun_debet"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="akun_kredit">Akun Kredit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_akun_kredit" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-akun_kredit" id="akun_kredit" name="akun_kredit" value="" title="">
                                    <span class="info-name_akun_kredit hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_akun_kredit"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-sm-12">
                                <label for="kode_pp">Unit/PP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                        <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="">
                                    <span class="info-name_kode_pp hidden">
                                        <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="jenis">Jenis</label>
                                        <select required class='form-control selectize' id="jenis" name="jenis" required>
                                        <option value=''>--- Pilih Jenis ---</option>
                                        <option value='PENGELUARAN'>PENGELUARAN</option>
                                        <option value='PEMASUKAN'>PEMASUKAN</option>
                                        <option value='PINDAH BUKU'>PINDAH BUKU</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_ref">Kode</label>
                                        <div class="input-group readonly">
                                            <input class="form-control" type="text" placeholder="Kode Ref" id="kode_ref" name="kode_ref" required readonly="readonly" style="border-top-right-radius:0px !important;border-bottom-right-radius:0px !important">
                                            <div class="input-group-append">
                                                <button disabled="true" style="border-top-left-radius:0px !important;border-bottom-left-radius:0px !important;" class="btn btn-info py-0 px-3" id="getRef" type="button"><i class="simple-icon-refresh"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="nama">Deskripsi</label>
                                        <input class="form-control" type="nama" id="nama" name="nama" required>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="akun_debet">Akun Debet</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_akun_debet" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-akun_debet" id="akun_debet" name="akun_debet" value="" title="">
                                            <span class="info-name_akun_debet hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_akun_debet"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="akun_kredit">Akun Kredit</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_akun_kredit" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-akun_kredit" id="akun_kredit" name="akun_kredit" value="" title="">
                                            <span class="info-name_akun_kredit hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_akun_kredit"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">Unit/PP</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="">
                                            <span class="info-name_kode_pp hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-form-footer">
                        <div class="footer-form-container">
                            <div class="text-right message-action">
                                <p class="text-success"></p>
                            </div>
                            <div class="action-footer">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->

    @include('modal_search')

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    $('#modal-preview > .modal-dialog').css({ 'max-width':'600px'});
    setHeightForm();
    
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
    
    // BAGIAN CBBL 
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

    function getAkunDebet(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/masakun') }}",
            dataType: 'json',
            data:{'kode_akun':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('akun_debet',result.daftar[0].kode_akun,result.daftar[0].nama);
                    }else{
                        $('#akun_debet').attr('readonly',false);
                        $('#akun_debet').css('border-left','1px solid #d7d7d7');
                        $('#akun_debet').val('');
                        $('#akun_debet').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getAkunKredit(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/masakun') }}",
            dataType: 'json',
            data:{'kode_akun':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('akun_kredit',result.daftar[0].kode_akun,result.daftar[0].nama);
                    }else{
                        $('#akun_kredit').attr('readonly',false);
                        $('#akun_kredit').css('border-left','1px solid #d7d7d7');
                        $('#akun_kredit').val('');
                        $('#akun_kredit').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getPP(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/unit') }}",
            dataType: 'json',
            data:{'kode_pp':id},
            async:false,
            success:function(result){    
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
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    function getRef(jenis){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/reftrans-kode') }}/"+jenis,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.daftar.status){
                    $('#kode_ref').val(result.daftar.kode);
                }
            },error:function(error) {
                alert('Terjadi kesalahan')
            }
        });
    }

    $('.selectize').selectize();

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var options = {}
        switch(id){
            case 'akun_debet':
            case 'akun_kredit':
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
            case 'kode_pp':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/unit') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP",
                    pilih : "PP",
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

    $('#form-tambah').on('change', '#akun_debet', function(){
        var par = $(this).val();
        getAkunDebet(par);
    });
    $('#form-tambah').on('change', '#akun_kredit', function(){
        var par = $(this).val();
        getAkunKredit(par);
    });
    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
    });

    // END BAGIAN CBBL

    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/reftrans') }}", 
        [
            {'targets': 7, data: null, 'defaultContent': action_html },
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
                "targets": [6],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'kode_ref' },
            { data: 'nama' },
            { data: 'akun_debet' },
            { data: 'akun_kredit' },
            { data: 'jenis' },
            { data: 'pp' },
            { data: 'tgl_input' }
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
    // END LIST DATA


    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#judul-form').html('Tambah Data Referensi Transaksi');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
        $('#kode_ref').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
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
        var kode = $('#kode_vendor').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    
    // END BUTTON KEMBALI

    $('#form-tambah').on('change', '#jenis', function(){
        $('#getRef').attr('disabled', false);
    });

    $('#form-tambah').on('click', '#getRef', function(){
        var jenis = $('#jenis').val();
        getRef(jenis)
    });

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_ref:{
                required: true,
                maxlength:10   
            },
            nama:{
                required: true,
                maxlength:50   
            },
            jenis:{
                required: true
            },
            akun_debet:{
                required: true
            },
            akun_kredit:
            {
                required: true
            },
            kode_pp:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode_ref').val();
            if(parameter == "edit"){
                var url = "{{ url('esaku-master/reftrans') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-master/reftrans') }}";
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
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Referensi Transaksi');
                        $('#method').val('post');
                        $('#kode_ref').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("kode_ref",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode vendor sudah digunakan'
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

    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('esaku-master/reftrans') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Referensi Transaksi ('+id+') berhasil dihapus ');
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

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    // END BUTTON HAPUS
    
    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/reftrans-detail') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#jenis').attr('readonly', true);
                    $('#kode_ref').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#jenis')[0].selectize.setValue(result.data[0].jenis);
                    $('#akun_debet').val(result.data[0].akun_debet);
                    $('#akun_kredit').val(result.data[0].akun_kredit);
                    $('#kode_pp').val(result.data[0].kode_pp);
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('akun_debet',result.data[0].akun_debet,result.data[0].nama_akun_debet);
                    showInfoField('akun_kredit',result.data[0].akun_kredit,result.data[0].nama_akun_kredit);
                    showInfoField('kode_pp',result.data[0].kode_pp,result.data[0].nama_pp);
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

        $('#judul-form').html('Edit Data Referensi Transaksi');
        editData(id);
    });
    // END BUTTON EDIT
    
    // HANDLER untuk enter dan tab
    $('#jenis,#kode_ref,#nama,#akun_debet,#akun_kredit,#kode_pp').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['jenis','kode_ref','nama','akun_debet','akun_kredit','kode_pp'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 15){
                var akun = $('#akun_hutang').val();
                getAkun(akun);
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
        if($(this).attr('id') == 'kode_ref'){
            e.preventDefault();
        }
    });

    // PREVIEW saat klik di list data
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 6){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Kode Ref</td>
                <td style='border:none'>`+id+`</td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>`+data.jenis+`</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Akun Debet</td>
                <td>`+data.akun_debet+`</td>
            </tr>
            <tr>
                <td>Akun Kredit</td>
                <td>`+data.akun_kredit+`</td>
            </tr>
            <tr>
                <td>Unit/ PP</td>
                <td>`+data.pp+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Referensi Transaksi').removeClass('py-2');
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
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
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Referensi Transaksi');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    $('.modal-header').on('click','#btn-cetak',function(e){
        e.stopPropagation();
        $('.dropdown-ke1').addClass('hidden');
        $('.dropdown-ke2').removeClass('hidden');
        console.log('ok');
    });

    $('.modal-header').on('click','#btn-cetak2',function(e){
        // $('#dropdownAksi').dropdown('toggle');
        e.stopPropagation();
        $('.dropdown-ke1').removeClass('hidden');
        $('.dropdown-ke2').addClass('hidden');
    });


    </script>