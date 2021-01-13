    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- FORM INPUT -->
    <style>
        .selected{
            color : var(--theme-color-1);
        }
    </style>
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px">Jurnal Penutup</h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id" hidden>
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                <input class="form-control" type="hidden" id="max_periode" name="max_periode" readonly>
                                <input class="form-control" type="hidden" id="akun_jp" name="akun_jp" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-12 mb-2">
                                        <label for="periode">Periode</label>
                                        <input class='form-control datepicker' type="text" id="periode" readonly name="periode" value="{{ Session::get('periode') }}">
                                    </div>
                                    <div class="col-md-4 col-12 mb-2">
                                        <label for="tanggal">Tanggal</label>
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-12 col-12 mb-2">
                                        <label for="lokasi">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ Session::get('lokasi').' - '.Session::get('namaLokasi') }}" required readonly>
                                    </div>
                                    <div class="col-md-12 col-12 mb-2">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <label for="nik_closing" >NIK Closing</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_nik_closing" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-nik_closing" id="nik_closing" name="nik_closing" value="" title="">
                                            <span class="info-name_nik_closing hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_nik_closing"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <label for="nik_app" >NIK Approve</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_nik_app" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-nik_app" id="nik_app" name="nik_app" value="" title="">
                                            <span class="info-name_nik_app hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_nik_app"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <label for="status">Status Closing</label>
                                        <textarea name="status" id="status" class="form-control"  rows="12" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  --> 
    @include('modal_search')
    <script src="{{ asset('asset_dore/js/vendor/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    var $iconLoad = $('.preloader');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // var editor = ClassicEditor.create( document.querySelector( '#status' )).then( editor => {
    //     window.editor = editor;
    // }).catch( error => {
    //     console.error( error );
    // });

    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    function getDataAwal(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/jurnal-penutup') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    $('#max_periode').val(result.max_periode);
                    $('#akun_jp').val(result.akun_jp);
                    if(result.nik_app != "-"){
                        showInfoField('nik_app',result.nik_app,result.nama_app);
                    }
                    if(result.akun_jp == ""){
                        msgDialog({
                            type: 'warning',
                            title: "Akun Jurnal Penutup tidak ditemukan",
                            text: "Silahkan Seting Akun JP [Flag Akun 999] di Data Master"
                        });
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    getDataAwal();

    // CBBL

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

    showInfoField("nik_closing","{{ Session::get('userLog') }}","{{ Session::get('namaUser') }}");

    function getNIK(id=null,param){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/karyawan') }}",
            dataType: 'json',
            data:{'nik': id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField(''+param,result.daftar[0].nik,result.daftar[0].nama);
                    }else{
                        $('#'+param).attr('readonly',false);
                        $('#'+param).css('border-left','1px solid #d7d7d7');
                        $('#'+param).val('');
                        $('#'+param).focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var options = {
            id : par,
            header : ['NIK', 'Nama'],
            url : "{{ url('esaku-master/karyawan') }}",
            columns : [
                { data: 'nik' },
                { data: 'nama' }
            ],
            judul : "Daftar Karyawan",
            pilih : "karyawan",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+par,
            target2 : ".info-name_"+par,
            target3 : "",
            target4 : "",
            width : ["30%","70%"]
        }
        showInpFilter(options);
    });

    $('#form-tambah').on('change', '#nik_closing,#nik_app', function(){
        var par = $(this).val();
        var id = $(this).attr('id');
        getKaryawan(par,id);
    });

    // END BAGIAN CBBL

    // HANDLER untuk enter dan tab
    $('#tanggal,#lokasi,#deskripsi,#nik_closing,#nik_app,#status').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','lokasi','deskripsi','nik_closing','nik_app','status'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 5){
                window.editor.editing.view.focus();
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

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            tanggal:{
                required: true   
            },
            deskripsi:{
                required: true 
            },
            nik_app:{
                required: true 
            },
            nik_closing:{
                required: true 
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var url = "{{ url('esaku-trans/jurnal-penutup') }}";

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            var maxPeriode = $('#max_periode').val();
            var periode = $('#periode').val();
            if (maxPeriode != parseInt("{{ Session::get('periode') }}".substr(4,2))) {
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Error',
                    text: "Periode transaksi Closing tidak valid. Periode Closing harus "+maxPeriode+", Lakukan Aktifasi Periode Desember di bulan ke-16."
                });
                return false;
            }
            if (parseInt("{{ Session::get('periode') }}") != parseFloat(periode)){
                msgDialog({
                    id: '-',
                    type: 'warning',
                    title: 'Error',
                    text: "Periode transaksi Closing tidak valid.Periode transaksi harus sama dengan periode aktif sistem.[{{ Session::get('periode') }}]"
                });
                return false;
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
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'sukses',
                            text: result.data.message
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    }else{
                        $('#status').val(result.data.message+''+result.data.msg_det);
                        // editor.setData(result.data.message+''+result.data.msg_det);
                        msgDialog({
                            id: id,
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            })
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    </script>