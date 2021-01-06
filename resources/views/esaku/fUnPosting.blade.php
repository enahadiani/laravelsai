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
                        <h6 id="judul-form" style="position:absolute;top:25px">UnPosting Jurnal</h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <!-- <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button> -->
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id" hidden>
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <label for="tanggal">Tanggal</label>
                                        <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-12 col-12 text-right">
                                        <label for="btn-control">&nbsp;</label>
                                        <div id="btn-control">
                                            <button type="button" href="#" id="loadData" class="btn btn-primary mr-2">Load Data</button>
                                            <button type="button" href="#" id="postAll" class="btn btn-primary">UnPosting All</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#modul" role="tab" aria-selected="true"><span class="hidden-xs-down">Modul</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#trans" role="tab" aria-selected="false"><span class="hidden-xs-down">Data Transaksi Modul</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#error" role="tab" aria-selected="false"><span class="hidden-xs-down">Pesan Error</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active mt-2" id="modul" role="tabpanel">
                                <p style='font-size:9px !important;font-weight:bold;margin-bottom:0'><i>* Klik status untuk merubah status</i></p>
                                <div class="row">
                                    <div class="dataTables_length col-sm-12" id="table-modul_length"></div>
                                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                                        <div class="page-countdata">
                                            <label>Menampilkan 
                                            <select style="border:none" id="page-count_table-modul">
                                            <option value="10">10 per halaman</option>
                                            <option value="25">25 per halaman</option>
                                            <option value="50">50 per halaman</option>
                                            <option value="100">100 per halaman</option>
                                            </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="d-block d-md-inline-block float-right col-md-4 col-sm-12">
                                        <input type="text" class="form-control" placeholder="Search..."
                                        aria-label="Search..." aria-describedby="filter-btn" id="searchData_table-modul" style="height: 31px;">
                                    </div>
                                </div>
                                <div class='col-xs-12 px-0'>
                                    <table id="table-modul" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Status</th>
                                                <th width="20%">Modul</th>
                                                <th width="35%">Deskripsi</th>
                                                <th width="15%">Periode 1</th>
                                                <th width="15">Periode 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane mt-2" id="trans" role="tabpanel">
                                <p style='font-size:9px !important;font-weight:bold;margin-bottom:0'><i>* Klik status untuk merubah status</i></p>
                                <div class="row">
                                    <div class="dataTables_length col-sm-12" id="table-jurnal_length"></div>
                                    <div class="d-block d-md-inline-block float-left col-md-6 col-sm-12">
                                        <div class="page-countdata">
                                            <label>Menampilkan 
                                            <select style="border:none" id="page-count_table-jurnal">
                                            <option value="10">10 per halaman</option>
                                            <option value="25">25 per halaman</option>
                                            <option value="50">50 per halaman</option>
                                            <option value="100">100 per halaman</option>
                                            </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="d-block d-md-inline-block float-right col-md-4 col-sm-12">
                                        <input type="text" class="form-control" placeholder="Search..."
                                        aria-label="Search..." aria-describedby="filter-btn" id="searchData_table-jurnal" style="height: 31px;">
                                    </div>
                                </div>
                                <div class='col-xs-12 px-0'>
                                    <table id="table-jurnal" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="12%">Status</th>
                                                <th width="13%">No Bukti</th>
                                                <th width="27%">No Dokumen</th>
                                                <th width="10%">Tanggal</th>
                                                <th width="25">Keterangan</th>
                                                <th width="10">Form</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="error" role="tabpanel">
                                <p id='error_space'></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  --> 
    
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    var $iconLoad = $('.preloader');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    var t = generateTable(
        "table-modul",
        "{{ url('esaku-trans/modultrans') }}", 
        [
            {
                "searchable": false,
                "orderable": false,
                "targets": 0
            },
            {'targets': 1, data: 'TRUE', 'defaultContent': 'TRUE',
                createdCell: function (td, cellData, rowData, row, col) {
                    if ( cellData === 'TRUE' ) {
                        $(td).addClass('selected');
                    }else{
                        $(td).removeClass('selected');
                    }
                } 
            }
        ],
        [
            { data: 'no' },
            { data: 'status' },
            { data: 'modul' },
            { data: 'keterangan' },
            { data: 'per1' },
            { data: 'per2' }
        ],
        "{{ url('esaku-auth/sesi-habis') }}",
        [[2 ,"asc"]]
    );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
    } ).draw();
    
    $("#searchData_table-modul").on("keyup", function (event) {
        t.search($(this).val()).draw();
    });

    $("#page-count_table-modul").on("change", function (event) {
        var selText = $(this).val();
        t.page.len(parseInt(selText)).draw();
    });


    $('#table-modul tbody').on('click', 'td', function () {
        var cell = t.cell( this );
        if(cell.data() == 'TRUE'){
            var isi = 'FALSE';
            $(this).removeClass('selected');
        }else if(cell.data() == 'FALSE'){
            var isi = 'TRUE';
            $(this).addClass('selected');
        }
        cell.data(isi).draw();
    });

    var tablejur = generateTableWithoutAjax(
        "table-jurnal",
        [
            {
                "searchable": false,
                "orderable": false,
                "targets": 0
            }
        ],
        [
            { data: 'no' },
            { data: 'status' },
            { data: 'no_bukti' },
            { data: 'no_dokumen' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'form' }
        ],
        [],
        [[2, "asc"]]
    );
    
    tablejur.on( 'order.dt search.dt', function () {
        tablejur.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    }).draw();

    $("#searchData_table-jurnal").on("keyup", function (event) {
        tablejur.search($(this).val()).draw();
    });

    $("#page-count_table-jurnal").on("change", function (event) {
        var selText = $(this).val();
        tablejur.page.len(parseInt(selText)).draw();
    });

    function activaTab(tab){
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    }

    $('#form-tambah').on('click', '#loadData', function(){
        var data = t.data();
        var formData = new FormData();
        
        var tempData = []; 
        var i=0;
        $.each( data, function( key, value ) {
            if(value.status.toUpperCase() == "TRUE"){

                formData.append('modul[]',value.modul);
                formData.append('per1[]',value.per1);
                formData.append('per2[]',value.per2);
                formData.append('status[]',value.status);
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ url('esaku-trans/unposting-jurnal') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                if(result.data.status){
                    tablejur.clear().draw();
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        tablejur.rows.add(result.data.data).draw(false);
                        activaTab("trans");
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    });

    $('#form-tambah').on('click', '#postAll', function(){
        tablejur.rows().every(function (index, element) {
            var row = tablejur.cell(index,1);
            row.data('UNPOSTING').draw().select();
        });
    });

    $('#table-jurnal tbody').on('click', 'td', function () {
        var cell = tablejur.cell( this );
        if(cell.data() == 'UNPOSTING'){
            $(this).removeClass('selected');
            var isi = 'INPROG';
        }else if(cell.data() == 'INPROG'){
            $(this).addClass('selected');
            var isi = 'UNPOSTING';
        }
        cell.data(isi).draw();
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
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var url = "{{ url('esaku-trans/unposting') }}";

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            var data = tablejur.data();

            var tempData = []; 
            var i=0;
            var isAda = false

            $.each( data, function( key, value ) {
                if(value.status.toUpperCase() == "UNPOSTING"){
                    formData.append('status[]',value.status);
                    formData.append('no_bukti[]',value.no_bukti);
                    formData.append('form[]',value.form);
                    if(value.status == "UNPOSTING"){
                        isAda = true;
                    }
                }
            });
            
            if(data.length <= 0 || !isAda){
                msgDialog({
                    id:'-',
                    type:'warning',
                    text: "Transaksi tidak valid. Tidak ada transaksi dengan status UNPOSTING."
                });
                return false;
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
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'sukses',
                                text: result.data.message
                            });
                            activaTab("trans");
                            $('#form-tambah #loadData').click();
                            $('#error_space').text('');
                        }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                            window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                            
                        }else{
                            msgDialog({
                                id: id,
                                type: 'sukses',
                                title: 'Error',
                                text: result.data.message
                            });
                            
                            $('#error_space').text(result.data.message);
                            activaTab("error");
                        }
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

    // HANDLE ENTER
    $('#tanggal,#deskripsi').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','deskripsi'];
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
    </script>