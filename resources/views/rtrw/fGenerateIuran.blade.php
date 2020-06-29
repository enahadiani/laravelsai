<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
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
    <div class="container-fluid mt-3">
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                {{-- <div class="card" style="height:800px"> --}}
                <div class="card" style="height:330px">
                        <form class="form" id="form-tambah">
                            <div class="card-body pb-0">
                                <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Generate Iuran
                                <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                                </h4>
                                <hr>
                            </div>
                            <div class="card-body table-responsive pt-0" style='height:461px'>
                                <div class="form-group row" id="row-id">
                                    <div class="col-9">
                                        <input type="hidden" id="id_edit" name="id_edit">
                                        <input type="hidden" id="method" name="_method" value="post">
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_iuran" class="col-3 col-form-label">Jenis Iuran</label>
                                    <div class="input-group col-3">
                                        <input required type='text' name="jenis_iuran" id="jenis_iuran" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                    </div>
                                    <div class="col-6">
                                        <label id="label_jenis_iuran" style="margin-top: 10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode_pp" class="col-3 col-form-label">RT</label>
                                    <div class="input-group col-3">
                                        <input required type='text' name="kode_pp" id="kode_pp" class="form-control" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                    </div>
                                    <div class="col-6">
                                        <label id="label_kode_pp" style="margin-top: 10px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bulan_awal" class="col-3 col-form-label">Bulan Awal</label>
                                    <div class="col-3">
                                        <select name="bulan_awal" id="bulan_awal" class="form-control" required>

                                        </select>
                                    </div>
                                    <label for="bulan_akhir" class="col-3 col-form-label">Bulan Akhir</label>
                                    <div class="col-3">
                                        <select name="bulan_akhir" id="bulan_akhir" class="form-control" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tahun" class="col-3 col-form-label">Tahun</label>
                                    <div class="col-3">
                                        <input class="form-control datepicker" type="text" placeholder="YYYY" id="tahun" name="tahun" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="iuran_rt" class="col-3 col-form-label">Iuran RT</label>
                                    <div class="col-3">
                                        <input class="form-control currency" type="text" placeholder="Iuran RT" id="iuran_rt" name="iuran_rt" autocomplete="off" value="25000">
                                    </div>
                                    <label for="iuran_rw" class="col-3 col-form-label">Iuran RW</label>
                                    <div class="col-3">
                                        <input class="form-control currency" type="text" placeholder="Iuran RT" id="iuran_rw" name="iuran_rw" autocomplete="off" value="125000">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <button class="btn btn-primary btn-md">Generate Iuran</button>
                                </div> --}}
                                {{-- <style>
                                    .tableFixHead { overflow-y: auto; height: 100px; }
                                    .tableFixHead thead th { position: sticky; top: 0; }
                                    table  { border-collapse: collapse; width: 100%; }
                                    th, td { padding: 8px 16px; }
                                </style> --}}
                                {{-- <div class="tableFixHead">
                                    <table class="table table-striped">
                                        <thead style="background:#ff9500;color:white">
                                        <tr>
                                            <th>No Rumah</th>
                                            <th>Penghuni</th>
                                            <th>Nilai RT</th>
                                            <th>Nilai RW</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div> --}}
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

    <script type="text/javascript">
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

    function listMonth() {
        var month = [
                {value:'01',text:'Januari'},
                {value:'02',text:'Februari'},
                {value:'03',text:'Maret'},
                {value:'04',text:'April'},
                {value:'05',text:'Mei'},
                {value:'06',text:'Juni'},
                {value:'07',text:'Juli'},
                {value:'08',text:'Agustus'},
                {value:'09',text:'September'},
                {value:'10',text:'Oktober'},
                {value:'11',text:'November'},
                {value:'12',text:'Desember'}
            ];

        for(var i=0;i<month.length;i++) {
            $('#bulan_awal, #bulan_akhir').append(`<option value='${month[i].value}'>${month[i].text}</option>`)
        }
        $('#bulan_akhir').val('12');
    }
    listMonth();

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
                                $('#label_kode_pp').text('RT '+filter[0].kode_pp);
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

    function getJenis(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/jenis-iuran') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_jenis == id);
                            if(filter.length > 0) {
                                $('#jenis_iuran').val(filter[0].kode_jenis);
                                $('#label_jenis_iuran').text(filter[0].nama);
                            } else {
                                alert('Jenis iuran tidak valid');
                                $('#jenis_iuran').val('');
                                $('#label_jenis_iuran').text('');
                                $('#jenis_iuran').focus();
                            }
                    }
                }
            }
        });
    }

    $('#form-tambah').on('change', '#jenis_iuran', function(){
        var par = $(this).val();
        getJenis(par);
    });

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
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
            case 'jenis_iuran': 
            header = ['Kode', 'Nama'];
            var toUrl = "{{ url('rtrw-master/jenis-iuran') }}";
            var columns = [
                { data: 'kode_jenis' },
                { data: 'nama' }
            ];
                    
            var judul = "Daftar PP";
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

    $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var id = $('#id').val();
        var pp = $('#pp').val();
        var per = $('#per').val();
        if(parameter == "edit"){
            var url = "{{ url('rtrw-master/generate-iuran') }}/"+id+"/"+pp+"/"+per;
            var pesan = "updated";
        }else{
            var url = "{{ url('rtrw-master/generate-iuran') }}";
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
                    // dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                        )
                    $('#form-tambah')[0].reset();
                    $('#jenis_iuran').val('');
                    $('#label_jenis_iuran').text('');
                    $('#kode_pp').val('');
                    $('#label_kode_pp').text('');
                        // $('#saku-datatable').show();
                        // $('#saku-form').hide();

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
    </script>