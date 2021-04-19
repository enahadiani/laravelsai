<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                    <h6 id="judul-form" style="position:absolute;top:25px">Upload Anggaran</h6>
                    {{-- <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tahun">Tahun</label>
                            <input type="text" placeholder="Tahun" class="form-control" id="tahun" name="tahun" value="{{ date('Y') }}" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="metode">Metode Input</label>
                            <select class="form-control" id="metode" name="metode">
                                <option value="INPUT">Input</option>
                                <option value="REPLACE" selected>Replace</option>
                            </select>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-anggaran" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Anggaran</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-anggaran" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 8px 5px;">
                                <a href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style="font-size:18px;">
                                    <i class="iconsminds-duplicate-layer"></i><span style="font-size:12.8px;">Copy Row</span>
                                </a>
                                <span class="pemisah mx-2" style="border:1px solid #d7d7d7;font-size:20px"></span>
                                <div class="dropdown d-inline-block mx-0">
                                    <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Upload Anggaran <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-import" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 45px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="https://devapi.simkug.com/api/esaku-trans/anggaran-export?nik_user=esaku_12345&kode_lokasi=04&type=template&nik=esaku" target='_blank' id="download-template" >Download Template</a>
                                        <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                    </div>
                                </div>
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8">
                                    <tr>
                                        <th style="width:3%">No</th>
                                        <th style="width:15%">Kode Akun</th>
                                        <th style="width:10%">PP</th>
                                        <th style="width:10%">DRK</th>
                                        <th style="width:15%">Jan</th>
                                        <th style="width:15%">Feb</th>
                                        <th style="width:15%">Mar</th>
                                        <th style="width:15%">Apr</th>
                                        <th style="width:15%">Mei</th>
                                        <th style="width:15%">Jun</th>
                                        <th style="width:15%">Jul</th>
                                        <th style="width:15%">Agt</th>
                                        <th style="width:15%">Sep</th>
                                        <th style="width:15%">Okt</th>
                                        <th style="width:15%">Nov</th>
                                        <th style="width:15%">Des</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-form-footer-full">
                    <div class="footer-form-container-full">
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

@include('modal_upload')
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function resetForm() {
        $("[id^=label]").each(function(e){
            $(this).text('');
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
        $('#input-grid tbody').empty();
    }

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

            var tahun = $('#tahun').val()
            var formData = new FormData(form);
            formData.append('tahun', tahun)
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
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
                            console.log(percentComplete);
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
                            console.log(percentComplete);
                            $('.progress-bar').css({
                                width: percentComplete * 100 + '%'
                            });
                        }
                    }, false);
                    return xhr;
                },
                type: 'POST',
                url: "{{ url('esaku-trans/import-anggaran-excel') }}",
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
                            var link = "{{ config('api.url').'toko-trans/export?kode_lokasi='.Session::get('lokasi').'&nik_user='.Session::get('nikUser').'&nik='.Session::get('userLog') }}";
                            $('.pesan-upload-judul').html('Gagal upload!');
                            $('.pesan-upload-judul').removeClass('text-success');
                            $('.pesan-upload-judul').addClass('text-danger');
                            $('.pesan-upload-isi').html("Terdapat kesalahan dalam mengisi format upload data. Download berkas untuk melihat kesalahan.<a href='"+link+"' target='_blank' class='text-primary' id='btn-download-file' >Download disini</a>");
                        }
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Error',
                            text: result.data.message
                        });
                        $('.pesan-upload-judul').html('Gagal upload!');
                    }
                    
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                },
                complete: function (xhr) {
                    $('.progress').addClass('hidden');
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
        console.log(fileName);
        $('.custom-file-label').html(fileName);
        $('#form-import').submit();
    })

    $('#process-upload').click(function(e){
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-trans/load-anggaran') }}",
            dataType: 'json',
            async:false,
            success:function(res) {
                var result = res.data
                if(result.status) {
                    if(result.detail.length > 0){ 
                        var html = ""
                        var no = 1
                        for(var i=0;i<result.detail.length;i++) {
                            var data = result.detail[i]
                            html += "<tr class='row-grid'>";
                            html += "<td class='no-grid'>"+no+"</td>"
                            html += "<td><span class='td-akun tooltip-span akun-"+no+"'>"+data.kode_akun+"</span><input type='text' class='hidden form-control inp-akun inp-akun-"+no+"' name='kode_akun[]' value='"+data.kode_akun+"' /></td>"
                            html += "<td><span class='td-pp tooltip-span pp-"+no+"'>"+data.kode_pp+"</span><input type='text' class='hidden form-control inp-pp inp-pp-"+no+"' name='kode_pp[]' value='"+data.kode_pp+"' /></td>"
                            html += "<td><span class='td-drk tooltip-span drk-"+no+"'>"+data.kode_drk+"</span><input type='text' class='hidden form-control inp-drk inp-drk-"+no+"' name='kode_drk[]' value='"+data.kode_drk+"' /></td>"
                            html += "<td><span class='td-n1 tooltip-span n1-"+no+"'>"+sepNum(data.n1)+"</span><input type='text' class='hidden form-control inp-n1 inp-n1-"+no+"' name='n1[]' value='"+data.n1+"' /></td>"
                            html += "<td><span class='td-n2 tooltip-span n2-"+no+"'>"+sepNum(data.n2)+"</span><input type='text' class='hidden form-control inp-n2 inp-n2-"+no+"' name='n2[]' value='"+data.n2+"' /></td>"
                            html += "<td><span class='td-n3 tooltip-span n3-"+no+"'>"+sepNum(data.n3)+"</span><input type='text' class='hidden form-control inp-n3 inp-n3-"+no+"' name='n3[]' value='"+data.n3+"' /></td>"
                            html += "<td><span class='td-n4 tooltip-span n4-"+no+"'>"+sepNum(data.n4)+"</span><input type='text' class='hidden form-control inp-n4 inp-n4-"+no+"' name='n4[]' value='"+data.n4+"' /></td>"
                            html += "<td><span class='td-n5 tooltip-span n5-"+no+"'>"+sepNum(data.n5)+"</span><input type='text' class='hidden form-control inp-n5 inp-n5-"+no+"' name='n5[]' value='"+data.n5+"' /></td>"
                            html += "<td><span class='td-n6 tooltip-span n6-"+no+"'>"+sepNum(data.n6)+"</span><input type='text' class='hidden form-control inp-n6 inp-n6-"+no+"' name='n6[]' value='"+data.n6+"' /></td>"
                            html += "<td><span class='td-n7 tooltip-span n7-"+no+"'>"+sepNum(data.n7)+"</span><input type='text' class='hidden form-control inp-n7 inp-n7-"+no+"' name='n7[]' value='"+data.n7+"' /></td>"
                            html += "<td><span class='td-n8 tooltip-span n8-"+no+"'>"+sepNum(data.n8)+"</span><input type='text' class='hidden form-control inp-n8 inp-n8-"+no+"' name='n8[]' value='"+data.n8+"' /></td>"
                            html += "<td><span class='td-n9 tooltip-span n9-"+no+"'>"+sepNum(data.n9)+"</span><input type='text' class='hidden form-control inp-n9 inp-n9-"+no+"' name='n9[]' value='"+data.n9+"' /></td>"
                            html += "<td><span class='td-n10 tooltip-span n10-"+no+"'>"+sepNum(data.n10)+"</span><input type='text' class='hidden form-control inp-n10 inp-n10-"+no+"' name='n10[]' value='"+data.n10+"' /></td>"
                            html += "<td><span class='td-n11 tooltip-span n11-"+no+"'>"+sepNum(data.n11)+"</span><input type='text' class='hidden form-control inp-n11 inp-n11-"+no+"' name='n11[]' value='"+data.n11+"' /></td>"
                            html += "<td><span class='td-n12 tooltip-span n12-"+no+"'>"+sepNum(data.n12)+"</span><input type='text' class='hidden form-control inp-n12 inp-n12-"+no+"' name='n12[]' value='"+data.n12+"' /></td>"
                            html += "</tr>";
                            no++;
                        }
                        $('#input-grid tbody').append(html);
                        $('.numeric').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () {  }
                        });
                    }
                    hitungTotalRow();
                    $('#modal-import').modal('hide');
                } else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }else{
                    alert('error');
                }
                
            }
        });
    });

    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();

            // var parameter = $('#id_edit').val();
            var countAnggaran = $('#input-grid tbody tr').length
            var url = "{{ url('esaku-trans/simpan-anggaran') }}";
            var pesan = "saved";
            var text = "Data anggaran berhasil tersimpan";
            // var id = $('#no_tagihan').val();
            // if(parameter == "edit"){
            //     var url = "{{ url('java-trans/bayar-proyek-ubah') }}";
            //     var pesan = "updated";
            //     var text = "Perubahan data "+id+" telah tersimpan";
            // }else{
            //     var url = "{{ url('java-trans/bayar-proyek') }}";
            //     var pesan = "saved";
            //     var text = "Data tersimpan dengan kode "+id;
            // }

            var formData = new FormData(form);
            // $('#input-grid tbody tr').each(function(index) {
            //     formData.append('no[]', $(this).find('.no-grid').text())
            // })
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
                        // dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Upload Data Anggaran');
                        $('#method').val('post');
                        $('#input-grid tbody').empty();
                        resetForm();
                        msgDialog({
                            id:result.data.no_bukti,
                            type:'simpan'
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                        
                    }
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
</script>