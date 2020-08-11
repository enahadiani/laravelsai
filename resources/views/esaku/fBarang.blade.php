    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        .search-item2{
            cursor:pointer;
        }
        .form-group{
            margin-bottom:5px !important;
        }
    </style>
    <div class="row header-datatable">
        <div class="col-12">
            <h1>Data Barang</h1>
            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="table-data" style='width:100%'>
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row header-form" style="display:none;">
        <div class="col-12">
            <h1>Form Data Barang</h1>
            <button type="button" id="btn-simpan" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
            <div class="card pt-3">
                <form id="form-tambah" style=''>
                    <div class="card-body pt-0">
                        <div class="form-group row" id="row-id">
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_barang" class="col-md-3 col-sm-3 col-form-label">Kode Barang</label>
                            <div class="input-group col-md-3 col-sm-3">
                                <input class="form-control" type="text" placeholder="Kode Barang" id="kode_barang" name="kode_barang">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="nama" class="col-md-3 col-sm-3 col-form-label">Nama Barang</label>
                                <div class="col-md-9 col-sm-9">
                                    <input class="form-control" type="text" placeholder="Nama Barang" id="nama" name="nama">
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="barcode" class="col-md-3 col-sm-3 col-form-label">Barcode</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control" type="text" placeholder="Barcode" id="barcode" name="barcode">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_klp" class="col-md-3 col-sm-3 col-form-label">Kelompok Barang</label>
                            <div class="input-group col-md-3 col-sm-3">
                                <input type='text' name="kode_klp" id="kode_klp" class="form-control" value="" required>
                                    <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-md-6 col-sm-9">
                                <label id="label_kode_klp" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="keterangan" class="col-md-3 col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-md-9 col-sm-9">
                                    <input class="form-control" type="text" placeholder="Keterangan" id="keterangan" name="keterangan">
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="satuan" class="col-md-3 col-sm-3 col-form-label">Satuan Barang</label>
                            <div class="input-group col-md-3 col-sm-3">
                                <input type='text' name="satuan" id="satuan" class="form-control" value="" required>
                                    <i class='simple-icon-magnifier search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                            </div>
                            <div class="col-md-6 col-sm-9">
                                <label id="label_satuan" style="margin-top: 10px;"></label>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="hrg_satuan" class="col-md-3 col-sm-3 col-form-label">Harga Satuan</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency nominal" type="text" placeholder="Harga Satuan" id="hrg_satuan" name="hrg_satuan" value="0" required>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="ppn" class="col-md-3 col-sm-3 col-form-label">PPN (%)</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control nominal" type="text" placeholder="PPN" id="ppn" name="ppn" value="0" required>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="PPN" id="tarif-ppn" value="0" readonly>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="profit" class="col-md-3 col-sm-3 col-form-label">Profit (%)</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control nominal" type="text" placeholder="Profit" id="profit" name="profit" value="0" required>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Profit" id="tarif-profit" value="0" readonly>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="hna" class="col-md-3 col-sm-3 col-form-label">Harga Jual</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Harga Jual" id="hna" name="hna" value="0">
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="ss" class="col-md-3 col-sm-3 col-form-label">Safety Stock</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Safety Stock" id="ss" name="ss">
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="sm" class="col-md-3 col-sm-3 col-form-label">Slow Moving</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Slow Moving" id="sm1" name="sm1" required>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Slow Moving" id="sm2" name="sm2" required>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="mm" class="col-md-3 col-sm-3 col-form-label">Medium Moving</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Medium Moving" id="mm1" name="mm1" required>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Medium Moving" id="mm2" name="mm2" required>
                                </div>
                        </div>
                        <div class="form-group row ">
                            <label for="fm" class="col-md-3 col-sm-3 col-form-label">Fast Moving</label>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Fast Moving" id="fm1" name="fm1" required>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <input class="form-control currency" type="text" placeholder="Fast Moving" id="fm2" name="fm2" required>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="flag_aktif" class="col-md-3 col-sm-3 col-form-label">Status Aktif</label>
                            <div class="col-md-3 col-sm-3">
                                <select class='form-control' id="flag_aktif" name="flag_aktif">
                                <option value='' disabled selected>--- Pilih Status Aktif ---</option>
                                <option value='1'>AKTIF</option>
                                <option value='0'>NON-AKTIF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-sm-3 col-form-label">Foto</label>
                            <div class="input-group col-md-6 col-sm-9">
                                <div class="custom-file">
                                    <input type="file" name="file_gambar" class="custom-file-input" id="file_gambar">
                                    <label class="custom-file-label" for="file_gambar">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
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
        // var $iconLoad = $('.preloader');
        var $target = "";
        var $target2 = "";

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        });

        $('.custom-file-input').on('change',function(){
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

        function hitungHargaJual() {
            var hrg_satuan = toNilai($('#hrg_satuan').val());
            var ppn = toNilai($('#ppn').val());
            var profit = toNilai($('#profit').val());

            var nilai_ppn = (hrg_satuan*ppn)/100;
            var hrg_ppn = hrg_satuan + nilai_ppn;
            var nilai_profit = (hrg_ppn*profit)/100;
            var hrg_jual = hrg_satuan + nilai_ppn + nilai_profit;
            console.log(`${hrg_satuan} + ${nilai_ppn} + ${nilai_profit}`);
            $('#tarif-ppn').val(nilai_ppn);
            $('#tarif-ppn').attr('value',nilai_ppn);
            $('#tarif-profit').val(nilai_profit.toFixed());
            $('#tarif-profit').attr('value',nilai_profit.toFixed());
            $('#hna').val(hrg_jual.toFixed());
            $('#hna').attr('value',hrg_jual.toFixed());
        }

        $('input.nominal').change(function(){
            hitungHargaJual();
        });

        function getKelBar(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#kode_klp').val(result.daftar[0].kode_klp);
                            $('#label_kode_klp').text(result.daftar[0].nama);
                        }else{
                            alert('Kode kelompok tidak valid');
                            $('#kode_klp').val('');
                            $('#kode_klp').focus();
                        }
                    }
                }
            });
        }

        function getLabelKelBarang(no){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-klp') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_klp === no){
                                $('#label_kode_klp').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode kelompok tidak valid');
                            $('#kode_klp').val('');
                            $('#kode_klp').focus();
                        }
                    }
                }
            });
        }

        function getSatuan(id=null){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-satuan') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            $('#satuan').val(result.daftar[0].kode_satuan);
                            $('#label_satuan').text(result.daftar[0].nama);
                        }else{
                            alert('Kode satuan tidak valid');
                            $('#satuan').val('');
                            $('#satuan').focus();
                        }
                    }
                }
            });
        }

        function getLabelSatuan(no){
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-master/barang-satuan') }}",
                dataType: 'json',
                async:false,
                success:function(result){    
                    if(result.status){
                        if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                            for(var i=0;i<=result.daftar.length;i++){   
                            if(result.daftar[i].kode_satuan === no){
                                $('#label_satuan').text(result.daftar[i].nama);
                                break;
                              }
                            }
                        }else{
                            alert('Kode satuan tidak valid');
                            $('#satuan').val('');
                            $('#satuan').focus();
                        }
                    }
                }
            });
        }

    $('[data-toggle="tooltip"]').tooltip(); 

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil'></i></a> &nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash'></i></a>";

    var dataTable = $("#table-data").DataTable({
        sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
        'ajax': {
            'url': "{{ url('esaku-master/barang') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 5, data: null, 'defaultContent': action_html },
            {
                'targets': 4,
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
            }
            ],
        'columns': [
            { data: 'kode_barang' },
            { data: 'nama' },
            { data: 'satuan' },
            { data: 'keterangan' },
            { data: 'hna' }
        ],
        drawCallback: function () {
            $($(".dataTables_wrapper .pagination li:first-of-type"))
                .find("a")
                .addClass("prev");
            $($(".dataTables_wrapper .pagination li:last-of-type"))
                .find("a")
                .addClass("next");

            $(".dataTables_wrapper .pagination").addClass("pagination-sm");
        },
        language: {
            paginate: {
                previous: "<i class='simple-icon-arrow-left'></i>",
                next: "<i class='simple-icon-arrow-right'></i>"
            },
            search: "_INPUT_",
            searchPlaceholder: "Search...",
            lengthMenu: "Items Per Page _MENU_"
        },
    });

    $('.header-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#kode_barang').attr('readonly',false);
        $('#label_kode_klp').text('');
        $('#label_satuan').text('');
        $('.search-item2').show();
        $('#saku-datatable').hide();
        $('.header-datatable').hide();
        $('.header-form').show();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
    });

    $('.header-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('.header-datatable').show();
        $('.header-form').hide();
        $('#saku-form').hide();
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        console.log(this);
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        console.log({target1,target2})
        showFilter(par,target1,target2);
    });

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
        case 'kode_klp': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('esaku-master/barang-klp') }}";
                var columns = [
                    { data: 'kode_klp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Kelompok Barang";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        case 'satuan': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('esaku-master/barang-satuan') }}";
                var columns = [
                    { data: 'kode_satuan' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Satuan Barang";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
        break;
        }

        var header_html = '';
        for(i=0; i<header.length; i++){
            header_html +=  "<th>"+header[i]+"</th>";
        }
        header_html +=  "<th></th>";

        var table = "<table width='100%' id='table-search'><thead><tr>"+header_html+"</tr></thead>";
        table += "<tbody></tbody></table>";

        $('#modal-search .modal-body').html(table);

        
        var searchTable = $("#table-search").DataTable({
            sDom: '<"row view-filter"<"col-sm-12"<"float-right"l><"float-left"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
            ajax: {
                "url": toUrl,
                "data": {'param':par},
                "type": "GET",
                "async": false,
                "dataSrc" : function(json) {
                    return json.daftar;
                }
            },
            columnDefs: [{
                "targets": 2, "data": null, "defaultContent": "<a class='check-item'><i class='simple-icon-check'></i></a>"
            }],
            columns: columns,
            drawCallback: function () {
                $($(".dataTables_wrapper .pagination li:first-of-type"))
                    .find("a")
                    .addClass("prev");
                $($(".dataTables_wrapper .pagination li:last-of-type"))
                    .find("a")
                    .addClass("next");

                $(".dataTables_wrapper .pagination").addClass("pagination-sm");
            },
            language: {
                paginate: {
                    previous: "<i class='simple-icon-arrow-left'></i>",
                    next: "<i class='simple-icon-arrow-right'></i>"
                },
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                lengthMenu: "Items Per Page _MENU_"
            },
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
                $($target).val(kode);
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

    $('#form-tambah').on('change', '#kode_klp', function(){
        var par = $(this).val();
        getKelBar(par);
    });

    $('#form-tambah').on('change', '#satuan', function(){
        var par = $(this).val();
        getSatuan(par);
    });

    $('#btn-simpan').click(function(e){
        e.preventDefault();
        $(this).text("Please Wait...").attr('disabled', 'disabled');
        $('#form-tambah').submit();
    });

    $('#form-tambah').submit(function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('esaku-master/barang') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('esaku-master/barang') }}";
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
                    // Swal.fire(
                    //     'Great Job!',
                    //     'Your data has been '+pesan,
                    //     'success'
                    //     )
                    alert(result.data.message);
                    $('#saku-datatable').show();
                    $('.header-datatable').show();
                    $('#saku-form').hide();
                    $('.header-form').hide();
                 
                }else if(!result.data.status && result.data.message === "Unauthorized"){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    // }) 
                }else{
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: 'Something went wrong!',
                        //     footer: '<a href>'+result.data.message+'</a>'
                        // })
                    alert(result.data.message);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        
        $('#btn-simpan').html("Simpan").removeAttr('disabled');
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        // Swal.fire({
        // title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Yes, delete it!'
        // }).then((result) => {
        //     if (result.value) {
            if(confirm("Anda yakin ini menghapus data ini?")){
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('esaku-master/barang') }}/"+id,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            // Swal.fire(
                            //     'Deleted!',
                            //     'Your data has been deleted.',
                            //     'success'
                            // )
                            alert(result.data.message);
                        }else if(!result.data.status && result.data.message == "Unauthorized"){
                            // Swal.fire({
                            //     title: 'Session telah habis',
                            //     text: 'harap login terlebih dahulu!',
                            //     icon: 'error'
                            // }).then(function() {
                                window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                            // })
                        }else{
                            // Swal.fire({
                            // icon: 'error',
                            // title: 'Oops...',
                            // text: 'Something went wrong!',
                            // footer: '<a href>'+result.data.message+'</a>'
                            // })
                            alert(result.data.message);
                        }
                    }
                });
            }
                
        //     }else{
        //         return false;
        //     }
        // })
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/barang') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_barang').val(id);
                    $('#id').val(id);
                    $('#kode_barang').attr('readonly',true);
                    $('#nama').val(result.data[0].nama);;
                    $('#satuan').val(result.data[0].satuan);
                    $('#hna').val(parseFloat(result.data[0].hna));
                    $('#ppn').val(parseFloat(result.data[0].ppn));
                    $('#profit').val(parseFloat(result.data[0].profit));
                    $('#hrg_satuan').val(parseFloat(result.data[0].hrg_satuan));
                    $('#ss').val(parseFloat(result.data[0].ss));
                    $('#sm1').val(parseFloat(result.data[0].sm1));
                    $('#sm2').val(parseFloat(result.data[0].sm2));
                    $('#mm1').val(parseFloat(result.data[0].mm1));
                    $('#mm2').val(parseFloat(result.data[0].mm2));
                    $('#fm1').val(parseFloat(result.data[0].fm1));
                    $('#fm2').val(parseFloat(result.data[0].fm2));
                    $('#kode_klp').val(result.data[0].kode_klp);
                    $('#keterangan').val(result.data[0].keterangan);
                    $('#flag_aktif').val(result.data[0].flag_aktif);
                    $('#barcode').val(result.data[0].barcode);
                    getLabelKelBarang(result.data[0].kode_klp);
                    getLabelSatuan(result.data[0].satuan);
                    hitungHargaJual();
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('.header-datatable').hide();
                    $('#saku-form').show();
                    $('.header-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    // })
                }
                // $iconLoad.hide();
            }
        });
    });

    </script>