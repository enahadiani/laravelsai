
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px;">
                    <div class="card-body">
                        <h4 class="card-title">Data Warga 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .hidden{
                                display:none;
                            }
                            .form-group{
                                margin-bottom:5px !important;
                            }
                            .form-control{
                                font-size:13px !important;
                                padding: .275rem .6rem !important;
                            }
                            .selectize-control, .selectize-dropdown{
                                padding: 0 !important;
                            }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tgl Masuk</th>
                                        <th>Status Masuk</th>
                                        <th>Kode Blok</th>
                                        <th>No Rumah</th>
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
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                        <form class="form" id="form-tambah">
                            <div class="card-body pb-0">
                                <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Input Data Warga
                                <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                                </h4>
                                <hr>
                            </div>
                            <div class="card-body pt-0">
                                <input type="hidden" id="method" name="_method" value="post">
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                        <input class="form-control" type="text" id="no_bukti" name="no_bukti" readonly hidden>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rw" class="col-3 col-form-label">RW</label>
                                    <div class="col-3">
                                        <input class="form-control" value="{{ Session::get('lokasi') }}" type="text" placeholder="Masukkan Kode Rumah " id="rw" name="rw" readonly required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rt" class="col-3 col-form-label">RT</label>
                                    <div class="col-3">
                                        <select class='form-control' id="rt" name="rt" required>
                                        <option value='' >--- Pilih RT ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="blok" class="col-3 col-form-label">Blok</label>
                                    <div class="col-3">
                                        <select class='form-control' id="blok" name="blok" required>
                                        <option value=''>--- Pilih Blok ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="kode_rumah" class="col-3 col-form-label">Kode Rumah</label>
                                    <div class="col-3">
                                        <select class='form-control' id="kode_rumah" name="kode_rumah" required>
                                        <option value=''>--- Pilih Rumah ---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_masuk" class="col-3 col-form-label">Tgl Masuk</label>
                                    <div class="col-3">
                                    <input class="form-control" type="date" id="tgl_masuk" name="tgl_masuk" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sts_masuk" class="col-3 col-form-label">Status Masuk</label>
                                    <div class="col-3">
                                    <input class="form-control" type="text" id="sts_masuk" name="sts_masuk" value="Pindah" required>
                                    </div>
                                </div>
                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                    <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp;
                                    <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                                </div>
                                <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <table class="table table-striped table-bordered table-condensed gridexample" id="input-anggota" width="100%">
                                    <style>
                                        th{
                                            vertical-align:middle !important;
                                        }
                                        /* #input-anggota td{
                                            padding:0 !important;
                                        } */
                                        #input-anggota .selectize-input, #input-anggota .form-control, #input-anggota .custom-file-label
                                        {
                                            border:0 !important;
                                            border-radius:0 !important;
                                        }
                                        .modal-header .close {
                                            padding: 1rem;
                                            margin: -1rem 0 -1rem auto;
                                        }
                                        .check-item{
                                            cursor:pointer;
                                        }
                                        .selected{
                                            cursor:pointer;
                                            background:#4286f5 !important;
                                            color:white;
                                        }
                                        #input-anggota td:hover
                                        {
                                            background:#f4d180 !important;
                                            color:white;
                                        }
                                    </style>
                                    <thead style="background:#ff9500;color:white">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">NIK</th>
                                            <th width="20%">Nama</th>
                                            <th width="10%">No HP</th>
                                            <th width="15%">Agama</th>
                                            <th width="15%">Jenis Kelamin</th>
                                            <th width="15%">Foto</th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

        <!-- Form Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal-anggota">
            <div class="modal-dialog" role="document" style="max-width:600px">
                <div class="modal-content">
                    <form id='form-anggota'>
                        <div class="modal-header">
                            <div class='row' style='width:100%'>
                                <div class='col-7'>
                                    <h5 class='modal-title' id='header_modal'></h5>
                                </div>
                                <div class='col-5 text-right'>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                    <button type='submit' class='btn btn-primary'>Simpan</button> 
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row" id="row-id" hidden>
                                <div class="col-3">
                                    <input class="form-control" type="text" name="id_edit" id="modal-id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-nik" class="col-2 col-form-label">NIK</label>
                                <div class="col-5">
                                    <input type='text' id='modal-nik' class='form-control' required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-nama" class="col-2 col-form-label">Nama</label>
                                <div class="col-10">
                                    <input type="text" class='form-control' id="modal-nama" required='' >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-jk" class="col-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-5">
                                    <select class='form-control selectize' id="modal-jk" required='' >
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-agama" class="col-2 col-form-label">Agama</label>
                                <div class="col-5">
                                    <select class='form-control selectize' id="modal-agama" required='' >
                                        <option value='Islam'>Islam</option>
                                        <option value='Katolik'>Katolik</option>
                                        <option value='Protestan'>Protestan</option>
                                        <option value='Hindu'>Hindu</option>
                                        <option value='Budha'>Budha</option>
                                        <option value='Lainnya'>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modal-no_hp" class="col-2 col-form-label">No Handphone</label>
                                <div class="col-5">
                                    <input type="text" class='form-control' id="modal-no_hp" required='' >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>           
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.custom-file-input').on('change',function(){
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    });

    function getPP(){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/pp') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    var select = $('#rt').selectize();
                    select = select[0];
                    var control = select.selectize;
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                        }
                    }
                }
            }
        });
    }

    function getBlok(rt=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/blok') }}",
            dataType: 'json',
            data:{'kode_pp':rt},
            async:false,
            success:function(result){    
                var select = $('#blok').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].blok, value:result.daftar[i].blok}]);
                        }
                    }
                }
            }
        });
    }

    function getRumah(rt=null,blok=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/rumah') }}",
            dataType: 'json',
            data:{'kode_pp':rt,'blok':blok},
            async:false,
            success:function(result){    
                var select = $('#kode_rumah').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_rumah, value:result.daftar[i].kode_rumah}]);
                        }
                    }
                }
            }
        });
    }

    $('#rt').selectize({
        selectOnTab: true,
        onChange: function (){
            var rt = $('#rt')[0].selectize.getValue();
            getBlok(rt);
        }
    });

    $('#blok').selectize({
        selectOnTab: true,
        onChange: function (){
            var rt = $('#rt')[0].selectize.getValue();
            var blok = $('#blok')[0].selectize.getValue();
            getRumah(rt,blok);
        }
    });

    getPP();
    getBlok();
    getRumah();
    $('#status_huni').selectize();
    $('.selectize').selectize();

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id').val('');
        $('#kode_rumah').attr('readonly', false);
        $('#input-anggota tbody').html('');
        $('#method').val('post');
        $('#rt')[0].selectize.setValue('');
        $('#blok')[0].selectize.setValue('');
        $('#kode_rumah')[0].selectize.setValue('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
    });

    $('#form-tambah').on('click', '#add-row', function(){
        
        $('#form-anggota')[0].reset();
        $('#modal-id').val('0');
        $('#header_modal').text('Input Detail Warga');
        $('#modal-jk')[0].selectize.setValue('');
        $('#modal-agama')[0].selectize.setValue('');
        $('#modal-anggota').modal('show');
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();

        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/warga-detail') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('post');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#sts_masuk').val(result.data[0].sts_masuk);
                    $('#tgl_masuk').val(result.data[0].tgl_masuk);
                    $('#rt')[0].selectize.setValue(result.data[0].kode_pp);
                    $('#blok')[0].selectize.setValue(result.data[0].kode_blok);
                    $('#kode_rumah')[0].selectize.setValue(result.data[0].no_rumah);
                    $('#input-anggota tbody').html('');
                    var input = ``;
                    var no=1;
                    if(result.data_detail.length > 0){
                        for(var i=0;i < result.data_detail.length;i++){
                            var line = result.data_detail[i];
                            input += "<tr class='row-anggota'>";
                            input += "<td class='no-anggota text-center'>"+no+"</td>";
                            input += "<td >"+line.nik+"<input type='text' name='nik[]' class='form-control inp-nik nikke"+no+" hidden' value='"+line.nik+"' required=''></td>";
                            input += "<td >"+line.nama+"<input type='text' name='nama[]' class='form-control inp-nama namake"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                            input += "<td >"+line.no_hp+"<input type='text' hidden name='no_hp[]' class='form-control inp-no_hp no_hpke"+no+"' value='"+line.no_hp+"' required></td>";
                            input += "<td >"+line.agama+"<input type='text' name='agama[]' class='form-control inp-agama agamake"+no+" hidden'  value='"+line.agama+"' required></td>";
                            input += "<td >"+line.jk+"<input type='text' name='jk[]' class='form-control inp-jk nilke"+no+" hidden'  value='"+line.jk+"' required></td>";
                            input += "<td ><input type='file' name='foto[]' class='inp-foto fotoke"+no+" ' required='' ></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-warning btn-sm edit-item' style='font-size:8px' data-id='1'><i class='fa fa-pencil-alt fa-1'></i></a></td>";
                            input += "</tr>";
                            no++;
                        }
                    }
                    $('#input-anggota tbody').html(input);
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('rtrw-master/login') }}";
                    })
                }
            }
        });
    });

    $('#input-anggota').on('click', '.edit-item', function(){
        $('.row-anggota').removeClass('selected-row');
        $(this).closest('tr').addClass('selected-row');
        
        var nik= $(this).closest('tr').find('.inp-nik').val();
        var nama= $(this).closest('tr').find('.inp-nama').val();
        var jk= $(this).closest('tr').find('.inp-jk').val();
        var agama= $(this).closest('tr').find('.inp-agama').val();
        var no_hp= $(this).closest('tr').find('.inp-no_hp').val();
        
        $('#modal-id').val('1');
        $('#header_modal').text('Update Detail Warga');
        $('#modal-nik').val(nik);
        $('#modal-nama').val(nama);
        $('#modal-jk')[0].selectize.setValue(jk);
        $('#modal-agama')[0].selectize.setValue(agama);
        $('#modal-no_hp').val(no_hp);
        $('#modal-anggota').modal('show');
    });

    $('#input-anggota tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-anggota tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-anggota').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-anggota').each(function(){
            var nom = $(this).closest('tr').find('.no-anggota');
            nom.html(no);
            no++;
        });
        hitungTotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#form-anggota').submit(function(e){
        e.preventDefault();
        
        var nik= $('#modal-nik').val();
        var nama= $('#modal-nama').val();
        var jk= $('#modal-jk')[0].selectize.getValue();
        var agama= $('#modal-agama')[0].selectize.getValue();
        var no_hp= $('#modal-no_hp').val();
        var id = $('#modal-id').val();

        if(id == 1){
            var no =$('.selected-row').closest('tr').find('.no-anggota').html();
        }else{
            var no=$('#input-anggota .row-anggota:last').index();
            no=no+2;
        } 

        var input = "";
        input += "<td class='no-anggota text-center'>"+no+"</td>";
        input += "<td >"+nik+"<input type='text' name='nik[]' class='form-control inp-nik nikke"+no+" hidden' value='"+nik+"' required=''></td>";
        input += "<td >"+nama+"<input type='text' name='nama[]' class='form-control inp-nama namake"+no+" hidden'  value='"+nama+"' readonly></td>";
        input += "<td >"+no_hp+"<input type='text' hidden name='no_hp[]' class='form-control inp-no_hp no_hpke"+no+"' value='"+no_hp+"' required></td>";
        input += "<td >"+agama+"<input type='text' name='agama[]' class='form-control inp-agama agamake"+no+" hidden'  value='"+agama+"' required></td>";
        input += "<td >"+jk+"<input type='text' name='jk[]' class='form-control inp-jk nilke"+no+" hidden'  value='"+jk+"' required></td>";
        input += "<td ><input type='file' name='foto[]' class='inp-foto fotoke"+no+" ' required='' ></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-warning btn-sm edit-item' style='font-size:8px' data-id='1'><i class='fa fa-pencil-alt fa-1'></i></a></td>";
        
        if(id=='1'){
            $('.selected-row').closest('tr').html('');
            $('.selected-row').closest('tr').append(input);
        }else{
            $('#input-anggota').append("<tr class='row-anggota'>"+input+"</tr>");
        }

        $('#modal-anggota').modal('hide');

    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('rtrw-master/warga') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.daftar;   
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'tgl_masuk' },
            { data: 'sts_masuk' },
            { data: 'kode_blok' },
            { data: 'no_rumah' }
        ],
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var kode = $(this).closest('tr').find('td:eq(0)').html();       
                
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('rtrw-master/warga') }}/"+kode,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                        }else if(!result.status && result.message == "Unauthorized"){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('rtrw-master/login') }}";
                            })
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                });
                
            }else{
                return false;
            }
        })
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var id = $('#no_bukti').val();
        if(parameter == "edit"){
            var url = "{{ url('rtrw-master/warga') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('rtrw-master/warga') }}";
            var pesan = "saved";
        }

        var formData = new FormData(this);
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
                // alert('Input data '+result.message);
                if(result.data.status){
                    // location.reload();
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                        )
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                 
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('rtrw-master/login') }}";
                    }) 
                }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    });

    // $('#kode_rumah,#rt,#blok,#status_huni').keydown(function(e){
    //     var code = (e.keyCode ? e.keyCode : e.which);
    //     var nxt = ['kode_rumah','rt','blok','status_huni'];
    //     if (code == 13 || code == 40) {
    //         e.preventDefault();
    //         var idx = nxt.indexOf(e.target.id);
    //         idx++;
    //         if(idx == 2 || idx == 3 || idx == 4){
    //             $('#'+nxt[idx])[0].selectize.focus();
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
    </script>