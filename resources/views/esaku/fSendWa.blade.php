    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    
    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px">Kirim Pesan Whatsapp</h6>
                        <button type="button" class="btn btn-primary ml-2"  style="float:right;" id="btn-send"><i class="fa fa-save"></i> Send</button>
                        <button type="button" class="btn btn-primary ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <!-- <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button> -->
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="id_pesan" name="id_pesan">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_telp">No Telp</label>
                                        <input class="form-control" type="text" id="no_telp" name="no_telp" placeholder="Contoh: 628800096955" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <label for="pesan">Pesan</label>
                                        <textarea class="form-control" rows="4" id="pesan" name="pesan" required></textarea>
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

    <!-- JAVASCRIPT  -->
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    // var $iconLoad = $('.preloader');
    var telp = '';
    var telp_pic = '';
    setHeightForm();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });


    // PLUGIN SCROLL di bagian preview dan form input
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input
    $('#btn-send').attr('disabled','disabled');

    $('#btn-save').click(function(e){
        e.preventDefault();
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        $('#form-tambah').submit();
    });

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            no_telp:{
                required: true
            },
            pesan:{
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var url = "{{ url('esaku-trans/pooling') }}";
            var pesan = "saved";

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
                        // $('#form-tambah')[0].reset();
                        // $('#form-tambah').validate().resetForm();
                        // $('#id_edit').val('');
                        // $('#judul-form').html('Kirim Pesan Whatsapp');
                        // $('#method').val('post');
                        $('#id_pesan').val(result.data.id_pesan);
                        msgDialog({
                            id:'-',
                            type:'warning',
                            title: 'Sukses',
                            text: result.data.message
                        });
                        $('#btn-save').html("Simpan");
                        $('#btn-send').removeAttr('disabled');
                        
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                        $('#btn-save').html("Simpan").removeAttr('disabled');
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }else{
                        
                        $('#btn-save').html("Simpan").removeAttr('disabled');
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Something went wrong!',
                            text: result.data.message
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                    
                    $('#btn-save').html("Simpan").removeAttr('disabled');
                }
            });
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    $('#btn-send').click(function(e){
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        var parameter = $('#id_edit').val();
        var url = "{{ url('esaku-trans/send-whatsapp') }}";
        var pesan = "saved";

        var formData = new FormData();
        formData.append("id_pesan",$('#id_pesan').val());
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
                if(result.data.sent){
                    $('#form-tambah')[0].reset();
                    $('#form-tambah').validate().resetForm();
                    $('#id_edit').val('');
                    $('#judul-form').html('Kirim Pesan Whatsapp');
                    $('#method').val('post');
                    msgDialog({
                        id:'-',
                        type:'warning',
                        title: 'Sukses',
                        text: 'Whatsapp: '+result.data.message+' , Email:'+result.data2.message
                    });
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                    window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    
                }else{
                    msgDialog({
                        id: '-',
                        type: 'warning',
                        title: 'Something went wrong!',
                        text: result.data.message
                    });
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        $('#btn-send').html("Send");
        $('#btn-save').removeAttr('disabled');
    });

    </script>