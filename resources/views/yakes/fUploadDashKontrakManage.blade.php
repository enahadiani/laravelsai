
    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                <div class="card" style=''>
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px">Upload Dash Kontrak Managemen</h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <!-- <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button> -->
                    </div>
                    <div class="separator"></div>
                    <div class="card-body form-body" style='background:#f8f8f8;padding: 0 !important;border-bottom-left-radius: .75rem;border-bottom-right-radius: .75rem;'>
                        <div class="card" style='border-radius:0'>
                            <div class="card-body pb-0">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <label for="periode">Periode</label>
                                                <select name="periode" id="periode">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3" style='border-top-left-radius:0;border-top-right-radius:0'>
                            <div class="card-body">
                                <ul class="nav nav-tabs col-12 " role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-agg" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Top Six</span></a> </li>
                                </ul>
                                <div class="tab-content tabcontent-border col-12 p-0">
                                    <div class="tab-pane active" id="data-agg" role="tabpanel">
                                        <div class='col-xs-12 nav-control' style="padding: 0px 5px;">
                                            <div class="dropdown d-inline-block mx-0">
                                                <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                                <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Import Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href='#' id="download-template" >Download Template</a>
                                                    <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                                </div>
                                            </div>
                                            <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                        </div>
                                        <div class='col-xs-12 table-responsive' style='min-height:420px; margin:0px; padding:0px;'>
                                            <table id="table-upload" style="width:100%;">
                                            <thead style="background:#F8F8F8">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Indicator</th>
                                                    <th>Unit</th>
                                                    <th>Weight</th>
                                                    <th>Target</th>
                                                    <th>Realisasi</th>
                                                    <th>Formula</th>
                                                    <th>Ach</th>
                                                    <th>Score</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                                        </div>
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
    
    @include('modal_upload')
    
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);

    $('#btn-save').addClass('disabled');
    $('#btn-save').prop('disabled', true);
    
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // FUNCTION TAMBAHAN
    function getPeriodeSelect(){
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-trans/periode') }}",
            dataType: 'json',
            async:false,
            success:function(result){   
                var select = $('#periode').selectize();
                select = select[0];
                var control = select.selectize;
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].periode, value:result.daftar[i].periode}]);
                        }
                        control.setValue("{{ Session::get('periode') }}".substr(0,4));
                    }
                } 
                else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
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

    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    $('.selectize').selectize();
    $('[id^=label]').attr('readonly',true);
    // END 

    // LIST DATA
    var dataTable = generateTableWithoutAjax(
        "table-upload",
        [ 
            {   'targets': [3], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {   'targets': [4,5,6,7,8], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 2, '' ) 
            }
        ],
        [
            { data: 'no'},
            { data: 'indicator'},
            { data: 'unit'},
            { data: 'weight'},
            { data: 'target'},
            { data: 'real'},
            { data: 'formula'},
            { data: 'ach'},
            { data: 'score'}
        ],
        []
    );
    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            periode:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            var jumdet = $('#table-upload tr').length;
            
            var param = $('#id').val();
            var id = $('#no_bukti').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('yakes-trans/dashKontrakManage') }}";
            }else{
                var url = "{{ url('yakes-trans/dashKontrakManage') }}";
            }
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(jumdet <= 1){
                alert('Transaksi tidak valid. Data Karyawan tidak boleh kosong ');
            }else{
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
                            dataTable.clear().draw();

                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#id').val('');

                            msgDialog({
                                id:'',
                                type:'sukses',
                                text: result.data.message
                            });
                        }
                        else if(!result.data.status && result.data.message === "Unauthorized"){
                            window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                        }else{
                            if(result.data.jenis == 'duplicate'){
                                msgDialog({
                                    id: '',
                                    type: result.data.jenis,
                                    text: result.data.message
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
                        $iconLoad.hide();
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
            }

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    // END SIMPAN

    // ENTER FIELD FORM
    $('#periode,#file').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['periode','file'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
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

    // IMPORT EXCEL

    $('#import-excel').click(function(e){
        $('.custom-file-input').val('');
        $('.custom-file-label').text('File upload');
        $('.pesan-upload .pesan-upload-judul').html('');
        $('.pesan-upload .pesan-upload-isi').html('')        
        $('.pesan-upload').hide();
        $('#modal-import').modal('show');
    });

    $("#form-import").validate({
        rules: {
            file: {required: true, accept: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"}
        },
        messages: {
            file: {required: 'Harus diisi!', accept: 'Hanya import dari file excel.'}
        },
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            formData.append('periode',$('#periode')[0].selectize.getValue());
            $('.pesan-upload').show();
            $('.pesan-upload-judul').html('Proses upload...');
            $('.pesan-upload-judul').removeClass('text-success');
            $('.pesan-upload-judul').removeClass('text-danger');
            $('.progress').removeClass('hidden');
            $('.progress-bar').attr('aria-valuenow', 0).css({
                width: 0 + '%'
            }).html(parseFloat(0 * 100).toFixed(2) + '%');
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            $('.progress-bar').attr('aria-valuenow', percentComplete * 100).css({
                                width: percentComplete * 100 + '%'
                            }).html(parseFloat(percentComplete * 100).toFixed(2) + '%');
                            // if (percentComplete === 1) {
                            //     $('.progress').addClass('hidden');
                            // }
                        }
                    }, false);
                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            $('.progress-bar').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ url('yakes-trans/dashKontrakManage-import') }}",
                dataType: 'json',
                data: formData,
                // async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        if(result.data.validate){
                            $('#process-upload').removeClass('disabled');
                            $('#process-upload').prop('disabled', false);
                            $('#process-upload').removeClass('btn-light');
                            $('#process-upload').addClass('btn-primary');
                            $('.pesan-upload-judul').html('Berhasil upload!');
                            $('.pesan-upload-judul').removeClass('text-danger');
                            $('.pesan-upload-judul').addClass('text-success');
                            $('.pesan-upload-isi').html('File berhasil diupload!');
                        }else{
                            if(!$('#process-upload').hasClass('disabled')){
                                $('#process-upload').addClass('disabled');
                                $('#process-upload').prop('disabled', true);
                            }
                            
                            var periode = $('#periode')[0].selectize.getValue();
                            var nik_user = "{{ Session::get('nikUser') }}";

                            var link = "{{ config('api.url').'yakes-trans/dashKontrakManage-export' }}?nik_user="+nik_user+"&periode="+periode+"&type=non";

                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                        $('.pesan-upload-judul').html('Gagal upload!');
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
                },
                error: function(jqXHR, textStatus, errorThrown) { 
                    $('.progress').addClass('hidden');      
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
                    $('.pesan-upload-judul').html('Gagal upload!');
                    $('.pesan-upload-isi').html(msg);
                    
                }
            });

        },
        errorPlacement: function (error, element) {
            $('#label-file').html(error);
            $('#label-file').addClass('error');
        }
    });

    $('.custom-file-input').change(function(){
        var fileName = $(this).val();
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-trans/dashKontrakManage-tmp') }}",
            dataType: 'json',
            data:{'periode':$('#periode')[0].selectize.getValue()},
            async:false,
            success:function(res){
                var result= res.data;
                dataTable.clear().draw();
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        dataTable.rows.add(result.data).draw(false);
                        
                        $('#btn-save').removeClass('disabled');
                        $('#btn-save').prop('disabled', false);
                    }else{
                        if(!$('#btn-save').hasClass('disabled')){
                            $('#btn-save').addClass('disabled');
                            $('#btn-save').prop('disabled', true);
                        }
                    }  
                    $('#modal-import').modal('hide');
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                }else{
                    alert('error');
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
    });

    $('#download-template').click(function(){
        var periode = $('#periode')[0].selectize.getValue();
        var nik_user = "{{ Session::get('nikUser') }}";
        var link = "{{ config('api.url').'yakes-trans/dashKontrakManage-export' }}?nik_user="+nik_user+"&periode="+periode+"&type=template";
        window.open(link, '_blank'); 
    });

    
    </script>