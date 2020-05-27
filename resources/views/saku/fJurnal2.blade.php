<div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px !important">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Jurnal 
                            <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tanggal</th>
                                        <th>No Dokumen</th>
                                        <th>Deskripsi</th>
                                        <th>Nilai</th>
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
                <div class="card" style="min-height:560px !important">
                    <form class="form" id="form-tambah" style=''>
                        <div class="card-body pb-0">
                            <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Data Jurnal
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" ><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body pt-0" style='min-height:471px'>
                        <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class='form-control' type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-2">
                                </div>
                                <label for="jenis" class="col-2 col-form-label">Jenis</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="jenis" name="jenis">
                                    <option value=''>--- Pilih Jenis ---</option>
                                    <option value='MI' selected>MI</option>
                                    </select>
                                </div>
                                <div class="col-3" style="display:none">
                                    <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti" name="no_bukti" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="no_dokumen" class="col-2 col-form-label">No Dokumen</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="no_dokumen" name="no_dokumen">
                                </div>
                                <div class="col-1">
                                </div>
                                <label for="total_debet" class="col-2 col-form-label">Total Debet</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text" placeholder="Total Debet" readonly id="total_debet" name="total_debet" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-2 col-form-label">Deskripsi</label>
                                <div class="col-4">
                                    <input class="form-control" type="text" placeholder="Deskripsi" id="deskripsi" name="deskripsi">
                                </div>
                                <div class="col-1">
                                </div>
                                <label for="total_kredit" class="col-2 col-form-label">Total Kredit</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text" placeholder="Total Kredit" readonly id="total_kredit" name="total_kredit" value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik_periksa" class="col-2 col-form-label">NIK Periksa</label>
                                <div class="col-5">
                                    <input type='text' name='nik_periksa' id='nik_periksa' class='form-control col-5' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item2' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a>
                                    <label id="label_nik"></label>
                                </div>
                            </div>
                            <div class='col-xs-12' style='min-height:350px; margin:0px; padding:0px;'>
                                <table class="table table-striped table-bordered table-condensed gridexample" id="input-jurnal" width="100%">
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
                                </style>
                                <thead style="background:#ff9500;color:white">
                                    <tr>
                                        <th width="3%">No</th>
                                        <th width="10%">Kode Akun</th>
                                        <th width="15%">Nama Akun</th>
                                        <th width="5%">DC</th>
                                        <th width="20%">Keterangan</th>
                                        <th width="10%">Nilai</th>
                                        <th width="7">Kode PP</th>
                                        <th width="13">Nama PP</th>
                                        <th width="7%" class="text-center"><a type="button" href="#" id="add-row" class="badge badge-info"><i class="fa fa-plus-circle" style="font-size:12px"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                </table>
                            </div>
                            <!-- <button type="button" href="#" id="add-row" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</button> -->
                        </div>
                    </form>
                </div>
            </div>
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

    <script>
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    function getPP(id,target1,target2){
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/pp') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        $('.'+target2).val(result.data.data[0].nama);
                        $('#add-row').click();
                    }
                }
                else{
                    $('.'+target1).val('');
                    $('.'+target1).focus();
                    alert('Kode PP tidak valid');
                }
            }
        });
    }

    function getNIKPeriksa(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/nikperiksa') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#nik_periksa').val(result.daftar[0].nik);
                         $('#label_nik').text(result.daftar[0].nama);
                    }else{
                        alert('NIK tidak valid');
                        $('#nik_periksa').val('');
                        $('#nik_periksa').focus();
                    }
                }
            }
        });
    }

    function getAkun(id,target1,target2,target3){
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/masakun') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        $('.'+target2).val(result.data.data[0].nama);
                        $('.'+target3)[0].selectize.focus();
                    }
                }
                else{
                    $('.'+target1).val('');
                    $('.'+target1).focus();
                    alert('Kode akun tidak valid');
                }
            }
        });
    }

    // getNIKPeriksa();
    $('.gridexample').formNavigation();
    $('.selectize').selectize();

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#method').val('post');
        $('#form-tambah')[0].reset();
        $('#id').val('');
        $('#input-jurnal tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        // $('#form-tambah #add-row').click();
        // $('#form-tambah #add-row').click();
    });

    function hitungTotal(){
        
        var total_d = 0;
        var total_k = 0;

        $('.row-jurnal').each(function(){
            var dc = $(this).closest('tr').find('.inp-dc').val();
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            if(dc == "D"){
                total_d += +toNilai(nilai);
            }else{
                total_k += +toNilai(nilai);
            }
        });

        $('#total_debet').val(total_d);
        $('#total_kredit').val(total_k);
        
    }

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'kode_akun[]': 
                header = ['Kode', 'Nama'];
                var toUrl = "{{ url('saku/akun') }}";
                var columns = [
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ];
                var judul = "Daftar Akun";
            break;
            case 'kode_pp[]': 
                header = ['Kode PP', 'Nama'];
                var toUrl = "{{ url('saku/pp') }}";
                var columns = [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar PP";
            break;
            case 'nik_periksa': 
                header = ['NIK', 'Nama'];
            var toUrl = "{{ url('saku/nikperiksa') }}";
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Karyawan";
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
            $("."+$target).val(kode);
            $("."+$target2).val(nama);
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
                $("."+$target).val(kode);
                $("."+$target2).val(nama);
                $('#modal-search').modal('hide');
            }
        })
    }

    function showFilter2(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        
        switch(par){
            case 'nik_periksa': 
                header = ['NIK', 'Nama'];
            var toUrl = "{{ url('saku/nikperiksa') }}";
                var columns = [
                    { data: 'nik' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Karyawan";
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
            $("#"+$target).val(kode);
            $("#"+$target2).text(nama);
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
                $("#"+$target).val(kode);
                $("#"+$target2).text(nama);
                $('#modal-search').modal('hide');
            }
        })
    }

    $('#form-tambah').on('click', '#add-row', function(){
        var no=$('#input-jurnal .row-jurnal:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-jurnal'>";
        input += "<td width='3%' class='no-jurnal text-center px-0 py-0'>"+no+"</td>";
        input += "<td width='10%' class='px-0 py-0'><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+"' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td width='15%' class='px-0 py-0'><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+"'  value='' readonly></td>";
        input += "<td width='5%' class='px-0 py-0'><select name='dc[]' class='form-control inp-dc dcke"+no+"' value='' required><option value='D'>D</option><option value='C'>C</option></select></td>";
        input += "<td width='20%' class='px-0 py-0'><input type='text' name='keterangan[]' class='form-control inp-ket'  value='' required></td>";
        input += "<td width='10%' class='text-right px-0 py-0'><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+"'  value='' required></td>";
        input += "<td width='7%' class='px-0 py-0'><input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+"' value='' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a></td>";
        input += "<td width='13%' class='px-0 py-0'><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+"'  value='' readonly></td>";
        input += "<td width='7%' class='text-center px-0 py-0'><a class='btn btn-success btn-sm save-item' style='font-size:8px'><i class='fa fa-check fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a></td>";
        input += "</tr>";
        $('#input-jurnal tbody').append(input);
        // getAkun('akunke'+no,'dcke'+no);
        // getPP('ppke'+no);
        $('.dcke'+no).selectize();
        $('.nilke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        // $('.edit-item').hide();
        $('.gridexample').formNavigation();
        $('#input-jurnal tbody tr:last').find('.inp-kode').focus();
    });

    $("#input-jurnal").on("click", ".save-item", function(){
        
        var kode_akun = $(this).parents("tr").find(".inp-kode").val();
        var nama_akun = $(this).parents("tr").find(".inp-nama").val();
        var dc = $(this).parents("tr").find(".inp-dc")[0].selectize.getValue();
        var keterangan = $(this).parents("tr").find(".inp-ket").val();
        var nilai = $(this).parents("tr").find(".inp-nilai").val();
        var kode_pp = $(this).parents("tr").find(".inp-pp").val();
        var nama_pp = $(this).parents("tr").find(".inp-nama_pp").val();
        var no = $(this).parents("tr").find("no-jurnal").text();
                
        $(this).parents("tr").find("td:eq(1)").html(kode_akun+"<input type='hidden' name='kode_akun[]' class='form-control inp-kode akunke"+no+"' value='"+kode_akun+"' required>");
        $(this).parents("tr").find("td:eq(2)").html(nama_akun+"<input type='hidden' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+"'  value='"+nama_akun+"' readonly>");
        $(this).parents("tr").find("td:eq(3)").html(dc+"<input type='hidden' class='inp-dc' name='dc[]' value='"+dc+"' required>");
        $(this).parents("tr").find("td:eq(4)").html(keterangan+"<input type='hidden' class='inp-ket' name='keterangan[]' value='"+keterangan+"' required>");
        $(this).parents("tr").find("td:eq(5)").html(nilai+"<input type='hidden' class='inp-nilai' name='nilai[]' value='"+nilai+"' required>");
        $(this).parents("tr").find("td:eq(6)").html(kode_pp+"<input type='hidden' class='form-control inp-pp ppke"+no+"' name='kode_pp[]' value='"+kode_pp+"' required>");
        $(this).parents("tr").find("td:eq(7)").html(nama_pp+"<input type='hidden' class='form-control inp-nama_pp nmppke"+no+"' name='nama_pp[]' value='"+nama_pp+"' required>");
        $(this).parents("tr").find("td:eq(8)").html("<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-warning btn-sm edit-item' style='font-size:8px'><i class='fa fa-pencil-alt fa-1'></i></a>");
        
        $("#input-jurnal td").removeClass("px-0");
        $("#input-jurnal td").removeClass("py-0");

        hitungTotal();
    });

    $("#input-jurnal").on("click", ".edit-item", function(){
        
        var kode_akun = $(this).parents("tr").find(".inp-kode").val();
        var nama_akun = $(this).parents("tr").find(".inp-nama").val();
        var dc = $(this).parents("tr").find(".inp-dc").val();
        var keterangan = $(this).parents("tr").find(".inp-ket").val();
        var nilai = $(this).parents("tr").find(".inp-nilai").val();
        var kode_pp = $(this).parents("tr").find(".inp-pp").val();
        var nama_pp = $(this).parents("tr").find(".inp-nama_pp").val();
        
        var no = $(this).parents("tr").find("no-jurnal").text();
        $(this).parents("tr").find("td:eq(1)").html("<input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+"' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a>");
        $(this).parents("tr").find("td:eq(2)").html("<input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+"'  value='"+nama_akun+"' readonly>");
        $(this).parents("tr").find("td:eq(3)").html("<select name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+dc+"' required><option value='D'>D</option><option value='C'>C</option></select>");
        $(this).parents("tr").find("td:eq(4)").html("<input type='text' name='keterangan[]' class='form-control inp-ket'  value='"+keterangan+"' required>");
        $(this).parents("tr").find("td:eq(5)").html("<input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+"'  value='"+nilai+"' required>");
        $(this).parents("tr").find("td:eq(6)").html("<input type='text' name='kode_pp[]' class='form-control inp-pp ppke"+no+"' value='"+kode_pp+"' required='' style='z-index: 1;position: relative;'><a href='#' class='search-item' style='position: absolute;z-index: 2;margin-top: 5px;'><i class='fa fa-search' style='font-size: 18px;'></i></a>");
        $(this).parents("tr").find("td:eq(7)").html("<input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+"'  value='"+nama_pp+"' readonly>");        
        $(this).parents("tr").find("td:eq(8)").html("<a class='btn btn-success btn-sm save-item' style='font-size:8px'><i class='fa fa-check fa-1'></i></a>&nbsp;<a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>");
        $('.dcke'+no).selectize();
        $('.nilke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
        });
        $('.gridexample').formNavigation();
        $("#input-jurnal td").addClass("px-0");
        $("#input-jurnal td").addClass("py-0");
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    $('#input-jurnal').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-jurnal');
            nom.html(no);
            no++;
        });
        hitungTotal();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-jurnal').on('click', '.search-item', function(){

        var par = $(this).closest('td').find('input').attr('name');

        var modul = '';
        var header = [];
        
        switch(par){
            case 'kode_akun[]': 
                var par2 = "nama_akun[]";

            break;
            case 'kode_pp[]': 
                var par2 = "nama_pp[]";
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

    $('#form-tambah').on('click', '.search-item2', function(){

        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter2(par,target1,target2);
    });

    
    $('#form-tambah').on('change', '#nik_periksa', function(){
        var par = $(this).val();
        getNIKPeriksa(par);
    });


    $('#input-jurnal').on('change', '.inp-nilai', function(){
        // hitungTotal();
    });

    $('#input-jurnal').on('change', '.inp-dc', function(){
        // hitungTotal();
    });

    $('#input-jurnal').on('keydown', '.inp-kode', function(e){
        if (e.which == 13) {
            var tmp = $(this).attr('class');
            var tmp2 = tmp.split(" ");
            target1 = tmp2[2];
            
            tmp = $(this).closest('tr').find('input[name="nama_akun[]"]').attr('class');
            tmp2 = tmp.split(" ");
            target2 = tmp2[2];

            tmp = $(this).closest('tr').find('select[name="dc[]"]').attr('class');
            tmp2 = tmp.split(" ");
            target3 = tmp2[2];
            e.preventDefault();
            if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
                var kode = $(this).val();
                getAkun(kode,target1,target2,target3);
                // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
            }else{
                alert('Akun yang dimasukkan tidak valid');
                return false;
            }
        }else if(e.which == 40){
            var tmp = $(this).attr('class');
            var tmp2 = tmp.split(" ");
            target1 = tmp2[2];
            
            tmp = $(this).closest('tr').find('input[name="nama_akun[]"]').attr('class');
            tmp2 = tmp.split(" ");
            target2 = tmp2[2];

            tmp = $(this).closest('tr').find('select[name="dc[]"]').attr('class');
            tmp2 = tmp.split(" ");
            target3 = tmp2[2];
            e.preventDefault();
            showFilter("kode_akun[]",target1,target2);
        }
    });

    $('#input-jurnal').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var tmp = $(this).attr('class');
        console.log(tmp);
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="nama_akun[]"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];

        tmp = $(this).closest('tr').find('select[name="dc[]"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target3 = tmp2[2];
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getAkun(kode,target1,target2,target3);
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Akun yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-jurnal').on('keydown', '.inp-dc', function(e){
        if (e.which == 13) {
            e.preventDefault();
            if($(this).closest('tr').find('.inp-dc')[0].selectize.getValue() == 'D' || $(this).closest('tr').find('.inp-dc')[0].selectize.getValue() == 'C'){
                $(this).closest('tr').find('.inp-ket').focus();
            }else{
                alert('Posisi yang dimasukkan tidak valid');
                return false;
            }
        }
    });

    $('#input-jurnal').on('keydown', '.inp-ket', function(e){
        if (e.which == 13) {
            e.preventDefault();
            if($.trim($('.inp-ket').val()).length){
                $(this).closest('tr').find('.inp-nilai').focus();
            }else{
                alert('Keterangan yang dimasukkan tidak valid');
                return false;
            }
        }
    });

    $('#input-jurnal').on('focus', '.inp-ket', function(e){
        var this_index = $(this).closest('tbody tr').index();
        
        if($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val() != undefined){
            $(this).val($("#input-jurnal tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val());
        }else{
            $(this).val('');
        }
    });

    $('#input-jurnal').on('focus', '.inp-nilai', function(e){
        var dc = $(this).closest('tr').find('.inp-dc')[0].selectize.getValue();
        if(dc == 'D' || dc == 'C'){
            var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
            $(this).val(selisih);
            // $('#inp-nilai').focus();
            // hitungTotal();
        }else{
            alert('Posisi tidak valid, harap pilih posisi akun');
            $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }
    });

    $('#input-jurnal').on('keydown', '.inp-nilai', function(e){
        if (e.which == 13) {
            e.preventDefault();
            if($(this).closest('tr').find('.inp-nilai').val() != "" && $(this).closest('tr').find('.inp-nilai').val() != 0){
                $(this).closest('tr').find('.inp-pp')[0].selectize.focus();
                // hitungTotal();
            }else{
                alert('Nilai yang dimasukkan tidak valid');
                return false;
            }
        }
    });

    $('#input-jurnal').on('keydown', '.inp-pp', function(e){
        
        if (e.which == 13) {
            e.preventDefault();
            var tmp = $(this).attr('class');
            console.log(tmp);
            var tmp2 = tmp.split(" ");
            target1 = tmp2[2];
            
            tmp = $(this).closest('tr').find('input[name="nama_pp[]"]').attr('class');
            console.log(tmp);
            tmp2 = tmp.split(" ");
            target2 = tmp2[2];
            if($.trim($(this).closest('tr').find('.inp-pp').val()).length){
                var kode = $(this).val();
                getPP(kode,target1,target2);
                // hitungTotal();
            }else{
                alert('PP yang dimasukkan tidak valid');
                return false;
            }
        }else if(e.which == 40){
            e.preventDefault();
            var tmp = $(this).attr('class');
            console.log(tmp);
            var tmp2 = tmp.split(" ");
            target1 = tmp2[2];
            
            tmp = $(this).closest('tr').find('input[name="nama_pp[]"]').attr('class');
            console.log(tmp);
            tmp2 = tmp.split(" ");
            target2 = tmp2[2];
            showFilter("kode_pp[]",target1,target2);
        }
    });

    $('#input-jurnal').on('change', '.inp-pp', function(e){
        e.preventDefault();
        var tmp = $(this).attr('class');
        console.log(tmp);
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];
        
        tmp = $(this).closest('tr').find('input[name="nama_pp[]"]').attr('class');
        console.log(tmp);
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        if($.trim($(this).closest('tr').find('.inp-pp').val()).length){
            var kode = $(this).val();
            getPP(kode,target1,target2);
            // hitungTotal();
        }else{
            alert('PP yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('/saku/jurnal') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#no_bukti').attr('readonly', true);
                    $('#tanggal').val(result.jurnal[0].tanggal);
                    $('#deskripsi').val(result.jurnal[0].deskripsi);
                    $('#nik_periksa').val(result.jurnal[0].nik_periksa);
                    $('#no_dokumen').val(result.jurnal[0].no_dokumen);
                    $('#total_debet').val(result.jurnal[0].nilai1);
                    $('#total_kredit').val(result.jurnal[0].nilai1);
                    $('#jenis').val(result.jurnal[0].jenis);
                    if(result.detail.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.detail.length;i++){
                            var line =result.detail[i];
                            input += "<tr class='row-jurnal'>";
                            input += "<td width='3%' class='no-jurnal text-center'>"+no+"</td>";
                            input += "<td width='10%'>"+line.kode_akun+"<input type='hidden' name='kode_akun[]' class='form-control inp-kode akunke"+no+"' value='"+line.kode_akun+"' required></td>";
                            input += "<td width='15%'>"+line.nama_akun+"<input type='hidden' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+"' value='"+line.nama_akun+"' readonly></td>";
                            input += "<td width='5%'>"+line.dc+"<input type='hidden' class='inp-dc dcke"+no+"' name='dc[]' value='"+line.dc+"' required></td>";
                            input += "<td width='20%'>"+line.keterangan+"<input type='hidden' name='keterangan[]' class='form-control inp-ket'  value='"+line.keterangan+"' required></td>";
                            input += "<td width='10%' class='text-right'>"+toRp2(line.nilai)+"<input type='hidden' name='nilai[]' class='form-control inp-nilai nilke"+no+"'  value='"+line.nilai+"' required></td>";
                            input += "<td width='7%'>"+line.kode_pp+"<input type='hidden' name='kode_pp[]' class='form-control inp-pp ppke"+no+"' value='"+line.kode_pp+"' required></td>";
                            input += "<td width='13%'>"+line.nama_pp+"<input type='hidden' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+"' value='"+line.nama_pp+"' required></td>";
                            input += "<td width='7%' class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></a>&nbsp;<a class='btn btn-warning btn-sm edit-item' style='font-size:8px'><i class='fa fa-pencil-alt fa-1'></i></a></td>";
                            input += "</tr>";
        
                            no++;
                        }
                        $('#input-jurnal tbody').html(input);

                        $('.gridexample').formNavigation();
                        
                    }
                    hitungTotal();
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
                $iconLoad.hide();
            }
        });
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
            'url': "{{ url('saku/jurnal') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.daftar;   
            }
        },
        'columnDefs': [
            {   'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 5, data: null, 'defaultContent': action_html }
            ],
        'columns': [
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai1' }
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
                    url: "{{ url('/saku/jurnal') }}/"+kode,
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
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        var total_d = $('#total_debet').val();
        var total_k = $('#total_kredit').val();
        var jumdet = $('#input-jurnal tr').length;

        var param = $('#id').val();
        var id = $('#no_bukti').val();
        $iconLoad.show();
        if(param == "edit"){
            var url = "{{ url('/saku/jurnal') }}/"+id;
        }else{
            var url = "{{ url('/saku/jurnal') }}";
        }

        if(total_d != total_k){
            alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak sama');
        }else if( total_d <= 0 || total_k <= 0){
            alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak boleh sama dengan 0 atau kurang');
        }else if(jumdet <= 1){
            alert('Transaksi tidak valid. Detail jurnal tidak boleh kosong ');
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
                    // alert('Input data '+result.message);
                    if(result.data.status){
                        // location.reload();
                        dataTable.ajax.reload();
                        Swal.fire(
                            'Great Job!',
                            'Your data has been saved',
                            'success'
                            )
                            $('#saku-datatable').show();
                            $('#saku-form').hide();
                            
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                    }
                    $iconLoad.hide();
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }
        
        $iconLoad.hide();
        
    });

    $('#kode_pp,#nama,#initial,#kode_bidang,#kode_ba,#kode_pc,#kota,#flag_aktif ').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','nama','initial','kode_bidang','kode_ba','kode_pc','kota','flag_aktif'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 8){
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

    </script>