    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Notif Pembayaran" tambah="true" :thead="array('No Bukti','Judul','Kode PP','Tgl Input','Aksi')" :thwidth="array(20,35,10,0,10)" :thclass="array('','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body" style='border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row hidden" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="periode">Periode</label>
                                        <select class='form-control selectize' id="periode" name="periode">
                                        <option value=''>--- Pilih ---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_rekon">No Rekon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_no_rekon" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-no_rekon" id="no_rekon" name="no_rekon" value="" title="">
                                            <span class="info-name_no_rekon">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_no_rekon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                    <label for="judul">Judul Pesan</label>
                                    <input class="form-control" type="text"  id="judul" name="judul" required>
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

    @include('modal_search')

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    // Small Form
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

    function getPeriodeSelect(){
        $.ajax({
            type: 'GET',
            url: "{{ url('ts-trans/notif-pembayaran-periode') }}",
            dataType: 'json',
            async:false,
            success:function(result){   
                var select = $('#periode').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        for(i=0;i<result.data.data.length;i++){
                            control.addOption([{text:result.data.data[i].periode, value:result.data.data[i].periode}]);
                        }
                        control.setValue("{{ Session::get('periode') }}");
                    }
                } 
                else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                } else{
                    alert(result.data.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/yakes-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getPeriodeSelect();

    function getNoRekon(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('ts-trans/notif-pembayaran-norekon') }}",
            dataType: 'json',
            data:{periode:id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('no_rekon',result.daftar[0].no_rekon,result.daftar[0].keterangan);
                    }else{
                        $('#no_rekon').attr('readonly',false);
                        $('#no_rekon').css('border-left','1px solid #d7d7d7');
                        $('#no_rekon').val('');
                        $('#no_rekon').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        showInpFilter({
            id : id,
            header : ['No Rekon', 'Keterangan'],
            url : "{{ url('ts-trans/notif-pembayaran-norekon') }}",
            columns : [
                { data: 'no_rekon' },
                { data: 'keterangan' }
            ],
            judul : "Daftar Pembayaran",
            pilih : "bill",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            parameter: { periode: $('#periode')[0].selectize.getValue()},
            width : ["30%","70%"],
        });
    });

    $('#form-tambah').on('change', '#no_rekon', function(){
        var par = $(this).val();
        getNoRekon(par);
    });

    // END BAGIAN CBBL

    // PLUGIN SCROLL di bagian preview dan form input
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input


    //LIST DATA
    var action_html = "<a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-data",
        "{{ url('ts-trans/notif-pembayaran') }}", 
        [
            {
                'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' 
            },
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
                "targets": [3],
                "visible": false,
                "searchable": false
            }
        ],
        [
            { data: 'no_bukti' },
            { data: 'judul' },
            { data: 'kode_pp' },
            { data: 'tgl_input' }
        ],
        "{{ url('ts-auth/sesi-habis') }}",
        [[3 ,"desc"]]
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
        $('#judul-form').html('Tambah Notifikasi Pembayaran');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#method').val('post');
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

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            periode:{
                required: true,
                maxlength:6   
            },
            no_rekon:{
                required: true, 
                maxlength:20  
            },
            judul:{
                required: true,
                maxlength:50  
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#no_bukti').val();
            if(parameter == "edit"){
                var url = "{{ url('ts-trans/notif-pembayaran-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('ts-trans/notif-pembayaran') }}";
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
                        $('#no_bukti').hide()
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Notif Pembayaran');
                        $('#method').val('post');
                        $('#no_bukti').attr('readonly', false);
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'simpan'
                        });
                        last_add("no_bukti",result.data.no_bukti);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/ts-auth/sesi-habis') }}";
                        
                    }else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: result.data.message
                        });
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
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
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
            url: "{{ url('ts-trans/notif-pembayaran') }}",
            data: { no_bukti: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Notif Pembayaran ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('ts-auth/sesi-habis') }}";
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
    
    // // HANDLER untuk enter dan tab
    // $('#kode_vendor,#nama,#no_tel,#no_fax,#email,#npwp,#pic,#no_pictel,#bank,#cabang,#no_rek,#nama_rek,#alamat,#alamat2,#akun_hutang').keydown(function(e){
    //     var code = (e.keyCode ? e.keyCode : e.which);
    //     var nxt = ['kode_vendor','nama','no_tel','no_fax','email','npwp','pic','no_pictel','bank','cabang','no_rek','nama_rek','alamat','alamat2','akun_hutang'];
    //     if (code == 13 || code == 40) {
    //         e.preventDefault();
    //         var idx = nxt.indexOf(e.target.id);
    //         idx++;
    //         if(idx == 15){
    //             var akun = $('#akun_hutang').val();
    //             getAkun(akun);
    //         }else{
    //             $('#'+nxt[idx]).focus();
    //         }
    //     }else if(code == 38){
    //         e.preventDefault();
    //         var idx = nxt.indexOf(e.target.id);
    //         idx--;
    //         if(idx != -1){ 
    //             $('#'+nxt[idx]).focus();
    //         }
    //     }
    // });

    // PREVIEW saat klik di list data
   

    </script>