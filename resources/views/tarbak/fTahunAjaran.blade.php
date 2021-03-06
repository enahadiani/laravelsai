  <link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Tahun Ajaran 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        <!-- <button type='button' id='btn-lanjut' class='btn btn-secondary ml-2' style="float:right;"><i class='fa fa-filter'></i> Filter</button> -->
                        </h4>
                        <!-- <h6 class="card-subtitle">Tabel Data Customer</h6> -->
                        <hr>
                        <div class="table-responsive ">
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>Kode TA</th>
                                        <th>Kode PP</th>
                                        <th>Nama</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Selesai</th>
                                        <th>Status</th>
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
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <div class="card-body pb-0">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Tahun Ajaran
                        <button type="button" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body table-responsive pt-0" style='height:460px'>
                            <form class="form" id="form-tambah" style='margin-bottom:100px'>
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input class="form-control" type="hidden" id="id_edit" name="id">
                                        <input type="hidden" id="method" name="_method" value="post">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_ta" class="col-3 col-form-label">Kode</label>
                                    <div class="col-3">
                                        <input class="form-control" type="text" placeholder="Kode Tahun Ajaran" id="kode_ta" name="kode_ta" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-3 col-form-label">Nama</label>
                                    <div class="col-9">
                                        <input class="form-control" type="text" placeholder="Nama Tahun Ajaran" id="nama" name="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_awali" class="col-3 col-form-label">Tanggal Mulai</label>
                                    <div class="col-9">
                                        <input class="form-control" type="date" id="tgl_awal" name="tgl_awal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_akhir" class="col-3 col-form-label">Tanggal Akhir</label>
                                    <div class="col-9">
                                        <input class="form-control" type="date" id="tgl_akhir" name="tgl_akhir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="flag_aktif" class="col-3 col-form-label">Status Aktif</label>
                                    <div class="col-3">
                                        <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                        <option value='' disabled>--- Pilih Status Aktif ---</option>
                                        <option value='1'>Aktif</option>
                                        <option value='0'>Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_pp" class="col-3 col-form-label">Kode PP</label>
                                    <div class="col-3">
                                        <select class='form-control' id="kode_pp" name="kode_pp">
                                        <option value='' disabled>--- Pilih PP ---</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div id='mySidepanel' class='sidepanel close'>
            <h3 style='margin-bottom:20px;position: absolute;'>Filter Data</h3>
            <a href='#' id='btnClose'><i class="float-right ti-close" style="margin-top: 10px;margin-right: 10px;"></i></a>
            <form id="formFilter2" style='margin-top:50px'>
            <div class="row" style="margin-left: -5px;">
                <div class="col-sm-12">
                    <div class="form-group" style='margin-bottom:0'>
                        <label for="kode_pp">PP</label>
                        <select name="kode_pp" id="kode_pp2" class="form-control">
                        <option value="">Pilih PP</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 28px;"><i class="fa fa-search" id="btnPreview2"></i> Preview</button>
                </div>
            </div>
            </form>
        </div>
    </div>           
    
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>
    <script>

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


    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var kode_lokasi = "{{ Session::get('lokasi') }}";
    var kode_pp = "{{ Session::get('kodePP') }}";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        "ordering": true,
        "order": [[0, "desc"]],
        'ajax': {
            'url': "{{ url('/tarbak/getTahunAjaran') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.data;   
            }
        },
        columns: [
              { data: 'kode_ta' },
              { data: 'pp' },
              { data: 'nama' },
              { data: 'tgl_mulai' },
              { data: 'tgl_akhir' },
              { data: 'sts' },
              { data: 'action' }
        ],
        'columnDefs': [
            {'targets': 6, data: null, 'defaultContent': action_html }
        ],
        dom: 'lBfrtip',
        buttons: [
            {
                text: '<i class="fa fa-filter"></i> Filter',
                action: function ( e, dt, node, config ) {
                    openFilter();
                },
                className: 'btn btn-default ml-2' 
            }
        ]
    });
   
    // $('div.toolbar').html(" <button type='button' id='btn-lanjut' class='btn btn-secondary ml-2'><i class='fa fa-filter'></i> Filter</button>");
    // dataTable.dom().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');

    $('.sidepanel').on('submit', '#formFilter2', function(e){
        e.preventDefault();
        var kode_pp= $('#kode_pp2')[0].selectize.getValue();
        dataTable.search(kode_pp).draw();
    });
 
    $('.sidepanel').on('click', '#btnClose', function(e){
        e.preventDefault();
        openFilter();
    });

   function getPP(){
        $.ajax({
            type: 'GET',
            url: "{{ url('/tarbak/getPP') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var select = $('#kode_pp').selectize();
                        select = select[0];
                        var control = select.selectize;

                        var select2 = $('#kode_pp2').selectize();
                        select2 = select2[0];
                        var control2 = select2.selectize;
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                            control2.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp + '-' + result.daftar[i].nama}]);
                        }
                    }
                }
            }
        });
    }

    getPP();

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#id_edit').val('');
        $('#kode_ta').attr('readonly', false);
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });

    $('#btn-save').click(function(){
        $('#form-tambah').submit();
    });


    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });


    $('#kode_ta,#nama,#tgl_awal,#tgl_akhir,#flag_aktif,#kode_pp').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_ta','nama','tgl_mulai','tgl_akhir','flag_aktif','kode_pp'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 5 || idx == 6){
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

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#kode_ta').val();
        if(parameter == "edit"){
            var url = "{{ url('/tarbak/postTahunAjaran') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('/tarbak/postTahunAjaran') }}";
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
                        window.location.href = "{{ url('/tarbak/login') }}";
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

        $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var temp = $(this).closest('tr').find('td').eq(1).html().split('-');
        var kode_pp = temp[0]; 

        $.ajax({
            type: 'GET',
            url: "{{ url('tarbak/getTahunAjaran') }}/" + id + "/" + kode_pp,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#kode_ta').val(id);
                    $('#method').val('put');
                    $('#kode_ta').attr('readonly', true);
                    $('#nama').val(result.data[0].nama);
                    $('#tgl_awal').val(result.data[0].tgl_mulai);
                    $('#tgl_akhir').val(result.data[0].tgl_akhir);
                    $('#flag_aktif')[0].selectize.setValue(result.data[0].flag_aktif);
                    $('#kode_pp')[0].selectize.setValue(result.data[0].kode_pp);
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('tarbak/login') }}";
                    })
                }
            }
        });
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
                var temp = $(this).closest('tr').find('td').eq(1).html().split('-');
                var kode_pp = temp[0]; 
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('tarbak/deleteTahunAjaran') }}/"+kode +"/"+ kode_pp,
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
                        }else if(!result.data.status && result.data.message == "Unauthorized"){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('tarbak/login') }}";
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

    </script>