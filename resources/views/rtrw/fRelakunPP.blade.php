<div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Relasi Akun 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <!-- <h6 class="card-subtitle">Tabel Pengajuan</h6> -->
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

                                th{
                                    vertical-align:middle !important;
                                }
                                /* #input-flag td{
                                    padding:0 !important;
                                } */
                                #input-flag .selectize-input, #input-flag .form-control, #input-flag .custom-file-label, #input-keu .selectize-input, #input-keu .form-control, #input-keu .custom-file-label{
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
                                #input-flag td:hover, #input-keu td:hover{
                                    background:#f4d180 !important;
                                    color:white;
                                }
                                #input-flag td, #input-keu td{
                                    overflow:hidden !important;
                                }

                                #input-flag td:nth-child(4), #input-keu td:nth-child(4){
                                    overflow:unset !important;
                                }
                                i:hover{
                                    cursor: pointer;
                                    color: blue;
                                }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped " width="100%">
                                <thead>
                                    <tr>
                                        <th>Kode PP</th>
                                        <th>Kode Lokasi</th>
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
                    <form class="form" id="form-tambah" >
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Relasi Akun
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:471px !important'>
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post">
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="form-group row">   
                                <label for="kode_pp" class="col-3 col-form-label">Unit/PP</label>
                                <div class="input-group col-3">
                                    <input type='text' name="kode_pp" id="kode_pp" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_kode_pp" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                {{-- <a class='badge badge-secondary' type="button" href="#" id="copy-row" data-toggle="tooltip" title="copy row"><i class='fa fa-copy' style='font-size:18px'></i></a>&nbsp; --}}
                                <!-- <a class='badge badge-secondary' type="button" href="#" id="delete-row"><i class='fa fa-trash' style='font-size:18px'></i></a>&nbsp; -->
                                <a class='badge badge-secondary' type="button" href="#" data-id="0" id="add-row" data-toggle="tooltip" title="add-row" style='font-size:18px'><i class='fa fa-plus-square'></i></a>
                            </div>
                            <div class='col-xs-12' style="min-height:420px; margin:0px; padding:0px;">
                                <style>
                                    th{
                                        vertical-align:middle !important;
                                    }
                                    /* #input-jurnal td{
                                        padding:0 !important;
                                    } */
                                    #input-jurnal .selectize-input, #input-jurnal .form-control, #input-jurnal .custom-file-label{
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
                                    #input-jurnal td:hover{
                                        background:#f4d180 !important;
                                        color:white;
                                    }
                                    #input-jurnal td{
                                        overflow:hidden !important;
                                    }

                                    #input-jurnal td:nth-child(4){
                                        overflow:unset !important;
                                    }
                                </style>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-akun" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th style="width:5%">No</th>
                                        <th style="width:10%">Kode Akun</th>
                                        <th style="width:50%">Nama Akun</th>
                                        <th style="width:10%"></th>
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
    </div>  
    <!-- MODAL SEARCH-->
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

    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>

    <script text="text/javascript">
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $par1 = "";
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('rtrw-master/relakun-pp') }}",
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
        'columnDefs': [
            {'targets': 2, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'kode_pp' },
            { data: 'kode_lokasi' }
        ],
        dom: 'lBfrtip',
        buttons: [
            // {
            //     text: '<i class="fa fa-filter"></i> Filter',
            //     action: function ( e, dt, node, config ) {
            //         openFilter();
            //     },
            //     className: 'btn btn-default ml-2' 
            // }
        ]
    });

    function getPP(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/relakun-pp') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_pp == id);
                            if(filter.length > 0) {
                                $('#kode_pp').val(filter[0].kode_pp);
                                $('#label_kode_pp').text(filter[0].kode_lokasi);
                            } else {
                                alert('PP tidak valid');
                                $('#kode_pp').val('');
                                $('#label_kode_pp').text('');
                                $('#kode_pp').focus();
                            }
                    }
                }
            }
        });
    }

    function getAkunK(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/masakun') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_akun == id);
                        if(filter.length > 0) {
                            $('#akun_kredit').val(filter[0].kode_akun);
                            $('#label_akun_kredit').text(filter[0].nama);
                        } else {
                            alert('Akun tidak valid');
                            $('#akun_kredit').val('');
                            $('#label_akun_kredit').text('');
                            $('#akun_kredit').focus();
                        }
                    }
                }
            }
        });
    }

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id_edit').val('');
        $('#form-tambah')[0].reset();
        $('#method').val('post');
        $('#kode_pp').val('');
        $('#kode_pp').attr('readonly', false);
        $('.search-item2').show();
        $('#label_kode_pp').text('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    function showFilter(param,target1,target2){
        var par = param;
        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
            console.log(par)
        switch(par){
            case 'kode_pp': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('rtrw-master/relakun-pp') }}";
            var columns = [
                { data: 'kode_pp' },
                { data: 'kode_lokasi' }
            ];
                    
            var judul = "Daftar PP";
            var jTarget1 = "val";
            var jTarget2 = "text";
            $target = "#"+$target;
            $target2 = "#"+$target2;
            $target3 = "";
            break;
            case 'kode_akun[]': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('rtrw-master/masakun') }}";
            var columns = [
                { data: 'kode_akun' },
                { data: 'nama' }
            ];
                    
            var judul = "Daftar Akun";
            var jTarget1 = "val";
            var jTarget2 = "val";
            $target = "."+$target;
            $target3 = ".td"+$target2;
            $target2 = "."+$target2;
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
                console.log($target2);
                console.log($target);
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

    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    var no = 1;
    $('#form-tambah').on('click', '#add-row', function(){
        var no=$('#input-akun .row-akun:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-akun'>";
        input += "<td class='no-akun text-center'>"+no+"</td>";
        input += "<td><input type='text' name='kode_akun[]' class='form-control inp-akun akunke"+no+"' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-akun' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nakun tdnmakunke"+no+"'></span><input type='text' name='nama[]' class='form-control inp-nakun nmakunke"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-akun tbody').append(input);
        $('#input-akun td').removeClass('px-0 py-0 aktif');
        $('#input-akun tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-akun tbody tr:last').find(".search-akun").show();
        $('#input-akun tbody tr:last').find(".inp-akun").focus();
    });

    $('#input-akun').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-akun').each(function(){
            var nom = $(this).closest('tr').find('.no-akun');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-akun tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-akun tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

$('#input-akun').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-akun td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_akun = $(this).parents("tr").find(".inp-akun").val();
                var nama_akun = $(this).parents("tr").find(".inp-nakun").val();
                var no = $(this).parents("tr").find(".no-akun").text();
                $(this).parents("tr").find(".inp-akun").val(kode_akun);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-akun").show();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".inp-akun").focus();
                }else{
                    $(this).parents("tr").find(".inp-akun").show();
                    $(this).parents("tr").find(".search-akun").hide();
                }
        
                $(this).parents("tr").find(".inp-nakun").val(nama_akun);
                $(this).parents("tr").find(".td-nakun").text(nama_akun);
                if(idx == 2){
                    $(this).parents("tr").find(".td-nakun").show();
                }else{
                    $(this).parents("tr").find(".td-nakun").show();
                }
            }
        }
    });

    $('#input-akun').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_akun[]': 
                var par2 = "nama[]";
            break;
        }

        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        console.log(tmp);
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        showFilter(par,target1,target2);
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        if(parameter == "edit"){
            var url = "{{ url('rtrw-master/relakun-pp') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('rtrw-master/relakun-pp') }}";
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
                        window.location.href = "{{ url('/rtrw-auth/login') }}";
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
        var kode= $(this).closest('tr').find('td').eq(0).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/relakun-pp-detail') }}/" + kode,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                console.log(result);
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_pp').attr('readonly', true);
                    $('.search-item2').hide();
                    getPP(kode);
                    $('#id').val(kode);

                    if(result.detail.length > 0) {
                        var input = "";
                        var no = 1;

                        for(var i=0;i<result.detail.length;i++) {
                            var line = result.detail[i];    
                            input += "<tr class='row-akun'>";
                            input += "<td class='no-akun text-center'>"+no+"</td>";
                            input += "<td><input type='text' name='kode_akun[]' class='form-control inp-akun akunke"+no+"' value='"+line.kode_akun+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nakun tdnmakunke"+no+"'>"+line.nama+"</span><input type='text' name='nama[]' class='form-control inp-nakun nmakunke"+no+" hidden'  value='"+line.nama+"' readonly></td>";
                            input += "<td class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;</td>";
                            input += "</tr>";

                            no++;
                        }
                        $('#input-akun tbody').html(input);
                        $('#row-id').show();
                        $('#saku-datatable').hide();
                        $('#saku-form').show();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('/rtrw-auth/login') }}";
                    })
                }
                $iconLoad.hide();
            },error: function(error) {
                alert('Terjadi kesalahan')
                $iconLoad.hide();
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
                var id = $(this).closest('tr').find('td').eq(0).html();
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('rtrw-master/relakun-pp') }}/"+id,
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
                                window.location.href = "{{ url('rtrw-auth/login') }}";
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