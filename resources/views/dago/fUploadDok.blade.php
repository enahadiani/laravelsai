<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-data-reg">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size:16px">Data Dokumen Registrasi 
                        </h4>
                        <hr style="margin-bottom:0px;margin-top:25px">
                        <div class="table-responsive ">
                            <table id="table-reg" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No Registrasi</th>
                                        <th>No Peserta</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Paket</th>
                                        <th>Jadwal</th>
                                        <th>Jumlah Upload</th>
                                        <th>Action</th>
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
        <!-- UPLOAD DOK -->
        <div class="row" id="form-upload-reg" style='display:none'>
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <form class="form" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Upload Dokumen
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-upload-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0" style='height:450px' >
                            <div class="form-group row" id="row-id_upload">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                    <input class="form-control" type="hidden" placeholder="No Bukti" id="upload_no_bukti" name="upload_no_bukti" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_no_reg" class="col-3 col-form-label">No Registrasi</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" readonly id="upload_no_reg" name="upload_no_reg">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_jamaah" class="col-3 col-form-label">Jamaah</label>
                                <div class="col-6">
                                    <input class="form-control" type="text" readonly id="upload_jamaah" name="upload_jamaah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_paket" class="col-3 col-form-label">Paket</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" readonly  id="upload_paket" name="upload_paket"  required>
                                </div>
                                <label for="upload_jadwal" class="col-3 col-form-label">Jadwal</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" readonly id="upload_jadwal" name="upload_jadwal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_alamat" class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" readonly id="upload_alamat" name="upload_alamat"  required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_tgl_terima" class="col-3 col-form-label">Tgl Terima</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" id="upload_tgl_terima" name="upload_tgl_terima" required value='<?=date('d/m/Y')?>'>
                                </div>
                            </div>
                            
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#detDok" role="tab" aria-selected="true"><span class="hidden-xs-down">Detail Dokumen</span></a> </li>
                                
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="detDok" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                            th,td{
                                                padding:8px !important;
                                                vertical-align:middle !important;
                                            }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="input-dok">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Kode Jenis</th>
                                                <th width="20%">Jenis Dokumen</th>
                                                <th width="20%">Path File</th>
                                                <!-- <th width="20%">User</th> -->
                                                <th width="20%">Upload File</th>
                                                <th width="5%">Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <script>
    
    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }

    var $iconLoad = $('.preloader');
    
    var dataTable = $('#table-reg').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        "ordering": true,
        "order": [[0, "desc"]],
        'ajax': {
            'url': "{{ url('dago-trans/upload-dok') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                    return [];
                }
            }
        },
        'columns': [
            { data: 'no_reg' },
            { data: 'no_peserta' },
            { data: 'nama' },
            { data: 'tgl_input' },
            { data: 'nama_paket' },
            { data: 'tgl_berangkat' },
            { data: 'jum_dok' },
            { data: 'action' }
        ],
        'columnDefs': [
            {
                "targets": 6,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    return row.jum_upload+' dari '+row.jum_dok;
                }
            },
            {
                "targets": 7,
                "data": null,
                "render": function ( data, type, row, meta ) {
                    if(row.sts_dok == "-"){
                        return "<a href='#' title='Upload Dokumen' class='badge badge-success' id='btn-upload'><i class='ti-upload'></i></a>";
                    }else{
                        return "<a href='#' title='Upload Dokumen' class='badge badge-success' id='btn-upload'><i class='ti-upload'></i></a>&nbsp;<a href='#' title='Sudah Upload' class='badge badge-success' ><i class='fas fa-check'></i></a>";
                    }
                    
                }
            }
        ]
    });

    // $('#upload_no_reg').selectize({
    //     selectOnTab: true,
    //     onChange: function (value){
    //         getUpload(value);
    //     }
    // });

    // UPLOAD DOKUMEN
    $('#form-upload-reg').on('click', '#btn-upload-kembali', function(){
        $('#saku-data-reg').show();
        $('#form-upload-reg').hide();
    });

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
    
    $('#saku-data-reg').on('click','#btn-upload',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/upload-dok-detail') }}",
            dataType: 'json',
            async:false,
            data: {'no_reg':id},
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data_reg !== 'undefined' && result.data.data_reg.length>0){
                        var line = result.data.data_reg[0];
                        $('#upload_no_reg').val(line.no_reg);
                        $('#upload_jamaah').val(line.no_peserta+' - '+line.nama_peserta);
                        $('#upload_paket').val(line.nama_paket);
                        $('#upload_jadwal').val(line.tgl_berangkat);
                        $('#upload_alamat').val(line.alamat);
                        if(typeof result.data.data_dokumen !== 'undefined' && result.data.data_dokumen.length>0){
                            var html='';
                            var no=1;
                            for(var i=0;i<result.data.data_dokumen.length;i++){
                                var line2 = result.data.data_dokumen[i];
                                
                                html+= `<tr class='row-upload-dok'>"
                                <td width='5%'  class='no-dok'>`+no+`</td>
                                <td width='10%' >`+line2.no_dokumen+`<input type='hidden' name='upload_no_dokumen[]' class='form-control upload_no_dokumen' value='`+line2.no_dokumen+`' required></td>
                                <td width='20%'  class='upload_deskripsi'>`+line2.deskripsi+`</td>
                                <td width='20%'  class='upload_path'>`+line2.no_gambar2+`<input type='hidden' name='upload_nama_file_seb[]' class='form-control upload_nama_file_seb' value='`+line2.no_gambar2+`' required></td>
                                <td width='20%' hidden><input type='text' name='upload_nik[]' class='form-control upload_nik' value='`+line2.nik+`' ></td>`;
                                if(line2.fileaddres == "-" || line2.fileaddres == ""){

                                    html+=`
                                    <td width='20%'>
                                    <input type='file' name='file_dok[]' class='upload_file_dok'>
                                    </td>`;

                                }else{
                                    
                                    html+=`
                                    <td width='20%'>
                                    <input type='file' name='file_dok[]' class='upload_file_dok'>
                                    </td>`;
                                }
                                html+=`
                                <td width='5%' class='action_dok'>`;
                                if(line2.fileaddres != "-"){

                                   var link =`<a class='btn btn-success btn-sm download-dok' style='font-size:8px' href='`+line2.fileaddres+`'target='_blank'><i class='fa fa-download fa-1'></i></a>&nbsp;&nbsp;<a href='#' title='Hapus' class='badge badge-danger hapus-dok'><i class='fa fa-trash'></i></a>`;
                                   
                                }else{
                                    var link =``;
                                }
                                html+=link+`</td>
                                </tr>`;
                                no++;
                            }
                            $('#input-dok tbody').html(html);
                        }
                        $('#form-upload-reg').show();
                        $('#saku-data-reg').hide();
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
                $iconLoad.hide();
            }
        });

    });

    $('#form-upload-reg').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        $iconLoad.show();
        console.log('parameter:tambah');
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
                
        $.ajax({
            type: 'POST',
            url: "{{ url('dago-trans/upload-dok') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status == "SUCCESS"){
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been saved.'+result.data.message,
                        'success'
                    )
                    $('#form-tambah')[0].reset();
                    $('#input-dok tbody').html('');
                    $('#form-upload-reg').hide();
                    $('#saku-data-reg').show();                        
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message.no_dokumen[0]+'</a>'
                    })
                }
                
                $iconLoad.hide();
                
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
                $iconLoad.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }else if(jqXHR.status == 413){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: 'File gagal diupload. Total file upload melebihi batas maksimum upload per simpan (Max:8MB)'
                    });
                }
                $iconLoad.hide();
            }
        });      
    });

    $('#input-dok').on('click', '.hapus-dok', function(){
        if(confirm('Sistem akan menghapus dokumen dari server. Apakah anda ingin menghapus dokumen ini? ')){
            var no_reg = $('#upload_no_reg').val();
            var no_dokumen = $(this).closest('tr').find('.upload_no_dokumen').val();
            var path_file = $(this).closest('tr').find('.upload_path');
            var action_dok = $(this).closest('tr').find('.action_dok');
            
            $.ajax({
                type: 'DELETE',
                url: "{{ url('dago-trans/upload-dok') }}",
                dataType: 'json',
                data: {'no_reg':no_reg,'no_dokumen':no_dokumen},
                success:function(result){
                    alert(result.data.message);
                    if(result.data.status){
                        dataTable.ajax.reload();
                        path_file.html(`-<input type='hidden' name='upload_nama_file_seb[]' class='form-control upload_nama_file_seb' value='-' required>`);
                        action_dok.html('');
                    }else{
                        return false;
                    }
                }
            });

        }else{
            return false;
        }       
    });

    $('#input-dok').on('change', '.upload_file_dok', function(){
        if($(this).val() != ""){
            var action_dok = $(this).closest('tr').find('.action_dok');
            action_dok.html("<a href='#' title='Hapus' class='badge badge-danger hapus-dok2'><i class='fa fa-trash'></i></a>"); 
        }
    });

    $('#input-dok').on('click', '.hapus-dok2', function(){
        if(confirm('Apakah anda ingin menghapus dokumen ini? ')){
            $(this).closest('tr').find('.upload_file_dok').val('');
            $(this).closest('tr').find('.action_dok').html('');
        }else{
            return false;
        }       
    });

    </script>
