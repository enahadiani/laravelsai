    <link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
<div class="container-fluid mt-3" style="font-size:13px">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="max-height:560px !important">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Data Jadwal Harian
                            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr style="margin-bottom:0">
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
                            i:hover{
                                cursor: pointer;
                                color: blue;
                            }

                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>Kode TA</th>
                                        <th>Kode Matpel</th>
                                        <th>Kode Guru</th>
                                        <th>Kelas</th>
                                        <th>Kode PP</th>
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
                    <form id="form-tambah" style=''>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4" style="font-size:16px"><i class='fas fa-cube'></i> Form Jadwal Harian
                            <button type="submit" id="btn-save" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pp" class="col-3 col-form-label">Kode PP</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_pp" id="kode_pp" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_pp" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik_guru" class="col-3 col-form-label">NIK Guru</label>
                                <div class="input-group col-3">
                                    <input type='text' name="nik_guru" id="nik_guru" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_nik_guru" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_kelas" class="col-3 col-form-label">Kode Kelas</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_kelas" id="kode_kelas" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_kelas" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_ta" class="col-3 col-form-label">Tahun Ajaran</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_ta" id="kode_ta" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_ta" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_matpel" class="col-3 col-form-label">Mata Pelajaran</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_matpel" id="kode_matpel" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_matpel" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total" class="col-3 col-form-label">Total</label>
                                <div class="col-3">
                                    <input type='text' class='form-control currency' id='total' name='total'>
                                </div>
                                <div class="col-3">
                                    <button type="button" id="btn-load" class="btn btn-info" style="float:right;"><i class="ti-reload"></i> Tampil Data</button>
                                </div>
                                <div class="col-3"></div>
                            </div>
                        </div>
                        <div class='col-xs-12' style='overflow-y: scroll; height:250px; margin:0px; padding:0px;'>
                                <style>
                                th,td{
                                    padding:8px !important;
                                    vertical-align:middle !important;
                                }
                                </style>
                                <table class="table table-striped table-bordered table-condensed" id="input-grid" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Slot</th>
                                            <th width="20%">Keterangan Slot</th>
                                            <th width="10%">Senin</th>
                                            <th width="10%">Selasa</th>
                                            <th width="10%">Rabu</th>
                                            <th width="10%">Kamis</th>
                                            <th width="10%">Jumat</th>
                                            <th width="10%">Sabtu</th>
                                            <th width="10%">Minggu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                    </form>
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
                        <label for="kode_pp2">Kode PP</label>
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

    <!-- MODAL SEARCH AKUN-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-search">
        <div class="modal-dialog" role="document" style="max-width:600px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script>
        var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

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

        $('#form-tambah').on('click', '#btn-load', function(e){
            e.preventDefault();
            loadJadwal();
        });

        function loadJadwal(){
        var kode_pp= $('#kode_pp').val()
        var kode_ta= $('#kode_ta').val();
        var kode_matpel= $('#kode_matpel').val();
        var nik_guru= $('#nik_guru').val();
        var kode_kelas= $('#kode_kelas').val();
        
            $.ajax({
                type: 'GET',
                url: "{{url('/tarbak/getJadwal')}}/"+kode_pp+"/"+kode_ta+"/"+kode_kelas+"/"+nik_guru+"/"+kode_matpel,
                dataType: 'json',
                success:function(result){   
                    if(result.data.status){
                        tableGrid.clear().draw();
                        if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                            tableGrid.rows.add(result.data.data).draw(false);
                        }
                    }
                }
            });
        }

    function hitungTotal(){
        var jumlah = 0;
        var data = tableGrid.data();
        // console.log(data.count());
        for (var i = 0; i < data.count();i++){
            for (var j = 3; j < 10;j++){
                if (tableGrid.cell(i,j).data() == "ISI") jumlah++;
            }
		}	
        // console.log(tableGrid.cell(4,5).data());
        $('#total').val(jumlah);
    }

    
    $('#input-grid tbody').on('dblclick','td',function(e){
        var cell = tableGrid.cell( this );
        if(cell.data() == 'KOSONG'){
            var isi = 'ISI';
        }else if(cell.data() == 'ISI'){
            var isi = 'KOSONG';
        }
        cell.data(isi).draw();
        hitungTotal();
    });

        function getPP(){
            $.ajax({
                type: 'GET',
                url: "{{ url('tarbak/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            var select2 = $('#kode_pp2').selectize();
                            select2 = select2[0];
                            var control2 = select2.selectize;
                            for(i=0;i<result.daftar.length;i++){
                                control2.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp + '-' + result.daftar[i].nama}]);
                            }
                        }
                    }
                }
            });
        }

    getPP();

    function getDataPP(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('tarbak/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#kode_pp').val(result.daftar[0].kode_pp);
                            $('#label_kode_pp').text(result.daftar[0].nama);
                        }else{
                            alert('Kode PP tidak valid');
                            $('#kode_pp').val('');
                            $('#kode_pp').focus();
                        }
                    }
                }
            });
    }

    function getLabelDataPP(id){
            $.ajax({
                type: 'GET',
                url: "{{ url('tarbak/getPP') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_pp === id){
                                $('#label_kode_pp').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode PP tidak valid');
                            $('#kode_pp').val('');
                            $('#kode_pp').focus();
                        }
                    }
                }
            });
    }

    function getNIKGuru(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getNIKGuru')}}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#nik_guru').val(result.daftar[0].nik);
                         $('#label_nik_guru').text(result.daftar[0].nama);
                    }else{
                        alert('NIK tidak valid');
                        $('#nik_guru').val('');
                        $('#nik_guru').focus();
                    }
                }
            }
        });
    }

    function getLabelNIKGuru(pp,nik){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getNIKGuru')}}/"+pp,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].nik === nik){
                            $('#label_nik_guru').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('NIK tidak valid');
                        $('#nik_guru').val('');
                        $('#nik_guru').focus();
                    }
                }
            }
        });
    }

    function getKelas(){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getDataKelas')}}/",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_kelas').val(result.daftar[0].kode_kelas);
                         $('#label_kode_kelas').text(result.daftar[0].nama);
                    }else{
                        alert('Kode Kelas tidak valid');
                        $('#kode_kelas').val('');
                        $('#kode_kelas').focus();
                    }
                }
            }
        });
    }

    function getLabelKelas(kelas){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getDataKelas')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].kode_kelas === kelas){
                            $('#label_kode_kelas').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('Kode Kelas tidak valid');
                        $('#kode_kelas').val('');
                        $('#kode_kelas').focus();
                    }
                }
            }
        });
    }

    function getTahunAjaran(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getDataTahunAjaran')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_ta').val(result.daftar[0].kode_ta);
                         $('#label_kode_ta').text(result.daftar[0].nama);
                    }else{
                        alert('Kode TA tidak valid');
                        $('#kode_ta').val('');
                        $('#kode_ta').focus();
                    }
                }
            }
        });
    }

    function getLabelTahunAjaran(ta){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getDataTahunAjaran')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].kode_ta === ta){
                            $('#label_kode_ta').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('Tahun ajaran tidak valid');
                        $('#kode_ta').val('');
                        $('#kode_ta').focus();
                    }
                }
            }
        });
    }

    
    function getMataPelajaran(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getDataMatpel')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#kode_matpel').val(result.daftar[0].kode_matpel);
                         $('#label_kode_matpel').text(result.daftar[0].nama);
                    }else{
                        alert('Kode TA tidak valid');
                        $('#kode_matpel').val('');
                        $('#kode_matpel').focus();
                    }
                }
            }
        });
    }

    function getLabelMatpel(matpel){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getDataMatpel')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                      for(var i = 0;i<=result.daftar.length;i++){  
                        if(result.daftar[i].kode_matpel === matpel){
                            $('#label_kode_matpel').text(result.daftar[i].nama);
                            break;
                         }
                     }
                    }else{
                        alert('Tahun ajaran tidak valid');
                        $('#kode_matpel').val('');
                        $('#kode_matpel').focus();
                    }
                }
            }
        });
    }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{url('/tarbak/getJadwalHarian')}}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.data;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('tarbak/login') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'kode_ta' },
            { data: 'kode_matpel' },
            { data: 'nik' },
            { data: 'kode_kelas' },
            { data: 'pp' },
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

    var tableGrid = $('#input-grid').DataTable({
        'data' :[],
        'columns': [
            { data: 'no' },
            { data: 'kode_slot' },
            { data: 'nama' },
            { data: 'senin' },
            { data: 'selasa' },
            { data: 'rabu' },
            { data: 'kamis' },
            { data: 'jumat' },
            { data: 'sabtu' },
            { data: 'minggu' }
        ],
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#btn-load').show();
        $('#btn-save').show();
        $('#kode_status').attr('readonly', false);
        $('#method').val('post');
        $('#label_kode_pp').text('');
        $('#label_kode_ta').text('');
        $('#label_nik_guru').text('');
        $('#label_kode_matpel').text('');
        $('#label_kode_kelas').text('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

     $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        console.log(this);
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var pp  = $('#kode_pp').val();
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
        case 'kode_matpel':
            header = ['Kode', 'Nama'];
            var toUrl = "{{url('/tarbak/getDataMatpel')}}";
                var columns = [
                    { data: 'kode_matpel' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Mata Pelajaran";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            break;
        case 'kode_ta':
            header = ['Kode', 'Nama'];
            var toUrl = "{{url('/tarbak/getDataTahunAjaran')}}";
                var columns = [
                    { data: 'kode_ta' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Tahun Ajaran";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        case 'kode_kelas': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('tarbak/getDataKelas') }}";
                var columns = [
                    { data: 'kode_kelas' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Kelas";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        case 'kode_pp': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('tarbak/getPP') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        case 'nik_guru': 
            if(pp === ''){
                alert('PP harus dipilih dahulu');
            }else {
            header = ['NIK', 'Nama'];
            var toUrl = "{{ url('tarbak/getNIKGuru') }}/"+pp;
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar NIK Guru";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
            }
        break;
        }

        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table class='table table-bordered table-striped' width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        var searchTable = $("#table-search").DataTable({
            // fixedHeader: true,
            // "scrollY": "300px",
            // "processing": true,
            // "serverSide": true,
            "ajax": {
                "url": toUrl,
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            "columnDefs": [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='fa fa-check'></i></a>"
            }],
            'columns': columns
            // "iDisplayLength": 25,
        });

        // searchTable.$('tr.selected').removeClass('selected');
        $('#table-search tbody').find('tr:first').addClass('selected');
        $('#modal-search .modal-title').html(judul);
        $('#modal-search').modal('show');
        searchTable.columns.adjust().draw();

        $('#table-search').on('click','.check-item',function(){
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).attr('value',kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            console.log($target3);
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('dblclick','tr',function(){
            console.log('dblclick');
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        });

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        $(document).keydown(function(e) {
            if (e.keyCode == 40){ //arrow down
                var tr = searchTable.$('tr.selected');
                tr.removeClass('selected');
                tr.next().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }
            if (e.keyCode == 38){ //arrow up
                
                var tr = searchTable.$('tr.selected');
                searchTable.$('tr.selected').removeClass('selected');
                tr.prev().addClass('selected');
                // tr = searchTable.$('tr.selected');

            }

            if (e.keyCode == 13){
                var kode = $('tr.selected').find('td:nth-child(1)').text();
                var nama = $('tr.selected').find('td:nth-child(2)').text();
                if(jTarget1 == "val"){
                    $($target).val(kode);
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                }else{
                    $($target2).text(nama);
                }
                
                if($target3 != ""){
                    $($target3).text(nama);
                }
                $('#modal-search').modal('hide');
            }
        })
    }

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getDataPP(par);
    });

    $('#form-tambah').on('change', '#nik_guru', function(){
        var par = $(this).val();
        getNIKGuru(par);
    });

    $('#form-tambah').on('change', '#kode_kelas', function(){
        var par = $(this).val();
        getKelas(par);
    });

    $('#form-tambah').on('change', '#kode_ta', function(){
        var par = $(this).val();
        getTahunAjaran(par);
    });

    
    $('#form-tambah').on('change', '#kode_matpel', function(){
        var par = $(this).val();
        getMataPelajaran(par);
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var pp = $('#kode_pp').val();
        if(parameter == "edit"){
            var url = "{{ url('/tarbak/postJadwalHarian') }}/"+pp;
            var pesan = "updated";
        }else{
            var url = "{{ url('/tarbak/postJadwalHarian') }}";
            var pesan = "saved";
        }
        var formData = new FormData(this);
        // var nik='' ;
        // var kode_lokasi='' ;
        
        // formData.append('nik_user', nik);
        // formData.append('kode_lokasi', kode_lokasi);

        var data = tableGrid.data();
        
        var i=0;
        $.each( data, function( key, value ) {
            formData.append('kode_slot[]',value.kode_slot);
            formData.append('senin[]',value.senin);
            formData.append('selasa[]',value.selasa);
            formData.append('rabu[]',value.rabu);
            formData.append('kamis[]',value.kamis);
            formData.append('jumat[]',value.jumat);
            formData.append('sabtu[]',value.sabtu);
            formData.append('minggu[]',value.minggu);
        });

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
                    Swal.fire(
                        'Great Job!',
                        'Data Berhasil '+pesan,
                        'success'
                    )
                    $('#saku-datatable').show();
                    $('#saku-form').hide();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: result.message
                    })
                }
                
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
               
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Yakin Data Akan Dihapus?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Dihapus!'
        }).then((result) => {
            if (result.value) {        
                var ta= $(this).closest('tr').find('td').eq(0).html();
                var matpel= $(this).closest('tr').find('td').eq(1).html();
                var nik= $(this).closest('tr').find('td').eq(2).html();
                var kelas= $(this).closest('tr').find('td').eq(3).html();
                var pp= $(this).closest('tr').find('td').eq(4).html();
                var tmp = pp.split("-");
                var kode_pp = tmp[0];
                $.ajax({
                    type: 'DELETE',
                    url: "{{url('/tarbak/deleteJadwalHarian')}}/"+kode_pp+"/"+ta+"/"+kelas+"/"+nik+"/"+matpel,
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
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: result.message
                            })
                        }
                    }
                });
                
            }else{
                return false;
            }
        })
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var kode_ta= $(this).closest('tr').find('td').eq(0).html();
        var kode_matpel= $(this).closest('tr').find('td').eq(1).html();
        var nik_guru= $(this).closest('tr').find('td').eq(2).html();
        var kode_kelas= $(this).closest('tr').find('td').eq(3).html();
        var tmp= $(this).closest('tr').find('td').eq(4).html().split('-');
        var kode_pp = tmp[0];
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getJadwalHarian')}}/"+kode_pp+"/"+kode_ta+"/"+kode_kelas+"/"+nik_guru+"/"+kode_matpel,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    console.log(result);
                    $('#btn-load').hide();
                    $('#btn-save').hide();
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_pp').val(kode_pp);
                    $('#nik_guru').val(nik_guru);
                    $('#kode_kelas').val(kode_kelas);
                    $('#kode_matpel').val(kode_matpel);
                    $('#kode_ta').val(kode_ta);
                    getLabelDataPP(kode_pp);
                    getLabelKelas(kode_kelas);
                    getLabelMatpel(kode_matpel);
                    getLabelNIKGuru(kode_pp,nik_guru);
                    getLabelTahunAjaran(kode_ta);
                    $('#row-id').show();
                    tableGrid.clear().draw();
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        tableGrid.rows.add(result.data).draw(false);
                    }
                    hitungTotal();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('saku/login') }}";
                    })
                }
                $iconLoad.hide();
            }
        });
    });

    </script>