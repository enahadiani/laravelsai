<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-data-reg">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size:16px">Closing Jadwal 
                        <button type="button" id="btn-reg-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr style="margin-bottom:0px;margin-top:25px">
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
                            i.search-item2:hover{
                                cursor: pointer;
                                color: #4286f5;
                            }

                            i.search-item2{
                                color: #4286f5;
                            }

                            th{
                                vertical-align:middle !important;
                            }

                            #table-btambah .selectize-input, #table-btambah .form-control, #table-btambah .custom-file-label, #table-bdok .selectize-input, #table-bdok .form-control, #table-bdok .custom-file-label
                            {
                                border:0 !important;
                                border-radius:0 !important;
                            }
                            #table-btambah td:hover,  #table-bdok td:hover
                            {
                                background:#f4d180 !important;
                                color:white;
                            }
                            #table-btambah td, #table-bdok td
                            {
                                overflow:hidden !important;
                            }

                            #table-btambah thead, #table-bdok thead
                            {
                                background:#ff9500;color:white;
                            }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No Bukti</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Total</th>
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
        <div class="row" id="form-tambah-reg" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form" id="form-tambah">
                            <h4 class="card-title" style="font-size:16px">Form Closing Jadwal
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-reg-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr style="margin-bottom:0px;margin-top:25px">
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-2">
                                <label for="tgl_input" class="col-3 col-form-label">Tanggal</label>
                                <div class="col-3">
                                    <input class="form-control datepicker" type="text" id="tgl_input" name="tgl_input" placeholder="dd/mm/yyyy" required value="{{ date('d/m/Y')}}">
                                </div>
                                <input class="form-control" readonly type="hidden" id="no_bukti" name="no_bukti" >
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-3 col-form-label">Deskripsi</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" max-length="100" id="keterangan" name="keterangan" required >
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label for="kode_curr" class="col-3 col-form-label">Currency</label>
                                <div class="col-3">
                                    <input class="form-control" readonly type="text" id="kode_curr" name="kode_curr" >
                                </div>
                                <label for="kurs" class="col-3 col-form-label">Kurs</label>
                                <div class="col-3">
                                    <input class="form-control currency" value=0 type="text" id="kurs" name="kurs" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paket" class="col-3 col-form-label">Paket</label>
                                <div class="input-group col-3">
                                    <input type='text' name="paket" id="paket" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_paket" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jadwal" class="col-3 col-form-label">Jadwal</label>
                                <div class="input-group col-3">
                                    <input type='text' name="jadwal" id="jadwal" class="form-control" value="" required>
                                        <i class='fa fa-search search-item2' style="font-size: 18px;margin-top:10px;margin-left:5px;"></i>
                                </div>
                                <div class="col-6">
                                    <label id="label_jadwal" style="margin-top: 10px;"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6"></div>
                                <label for="total_titipan" class="col-3 col-form-label">Total Titipan</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text"  id="total_titipan" name="total_titipan" required readonly value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6"></div>
                                <label for="total_tunggakan" class="col-3 col-form-label">Total Tunggakan</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text"  id="total_tunggakan" name="total_tunggakan" required readonly value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <a href="#" type="button" id="btn-tampil" class="btn btn-primary float-right" >Tampil</a>
                                </div>
                                <label for="total_pdpt" class="col-3 col-form-label">Total PDPT</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text"  id="total_pdpt" name="total_pdpt" required readonly value="0">
                                </div>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#reg" role="tab" aria-selected="true"><span class="hidden-xs-down">Reg Lunas</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active" id="reg" role="tabpanel">
                                    <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                        <style>
                                        th,td{
                                            padding:8px !important;
                                            vertical-align:middle !important;
                                        }
                                        </style>
                                        <table class="table table-striped table-bordered table-condensed" id="table-reg" style="width:1920px !important">
                                            <thead>
                                            <tr>
                                                <th style="width:100px !important">No Reg</th>
                                                <th style="width:200px !important">Peserta</th>
                                                <th style="width:120px !important">Hrg Paket+Room</th>
                                                <th style="width:120px !important">Biaya+</th>
                                                <th style="width:120px !important">Biaya Dok</th>
                                                <th style="width:120px !important">Byr Paket+Room</th>
                                                <th style="width:120px !important">Byr Biaya+</th>
                                                <th style="width:120px !important">Bayar Dok</th>
                                                <th style="width:120px !important">Tggkan Paket+Room</th>
                                                <th style="width:120px !important">Tggkn Biaya+</th>
                                                <th style="width:120px !important">Tggkn Dok</th>
                                                <th style="width:120px !important">TotBayar IDR</th>
                                                <th style="width:120px !important">Tot Tunggkan</th>						  
                                                <th style="width:100px !important">Akun Titip</th>
                                                <th style="width:100px !important">Akun Piu</th>
                                                <th style="width:100px !important">Akun Pdpt</th>
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

        <div class="row" id="slide-print" style="display:none;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="display:none">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 0" id="btnPreview"><i class="far fa-list-alt"></i> Preview</button>
                                <button type="button" id='btn-lanjut' class="btn btn-secondary" style="margin-left: 6px;margin-top: 0"><i class="fa fa-filter"></i> Filter</button>
                                <div id="pager" style='padding-top: 0px;position: absolute;top: 0;right: 0;'>
                                    <ul id="pagination" class="pagination pagination-sm2"></ul>
                                </div>
                            </div>
                            <div class='col-sm-1' style='padding-top: 0'>
                                <select name="show" id="show" class="form-control" style=''>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="All">All</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        <button type="button" class="btn btn-info ml-2" id="btn-print" style="float:right;"><i class="fa fa-print"></i> Print</button>
                        <div id="print-area" class="mt-5" width='100%' style='border:none;min-height:480px;padding:0px;'>
                            <div id='canvasPreview' style=';'>
                            </div>
                            <div class="script">
                            </div>
                        </div>
                        
                    </div>
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

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    
    function reverseDateNew(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

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

    var $formData = new FormData(); 
    function reportJurnal(kode){
        // getset value
        $formData.forEach(function(val, key, fD){
            $formData.delete(key);
        });
        $formData.append("no_bukti[]", "=");
        $formData.append("no_bukti[]", kode);
        $formData.append("no_bukti[]", "");
        xurl = "{{ url('/dago-auth/form')}}/rptJuPbyrBaru";
        $('#print-area > .script').load(xurl);
        $('#slide-print').show();
        $('#saku-data-reg').hide();
    }

    var $iconLoad = $('.preloader');
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        "ordering": true,
        "order": [[0, "desc"]],
        'ajax': {
            'url': "{{ url('dago-trans/closing-jadwal') }}",
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
            { data: 'no_bukti' },
            { data: 'tanggal' },
            { data: 'keterangan' },
            { data: 'total' },
            { data: 'action'}
        ],
        "columnDefs": [ {
            "targets": 4,
            "data": null,
            "render": function ( data, type, row, meta ) {
                
                if(row.closing == "-"){
                    
                    return "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
                    
                }else{
                    return "";
                }
               
            }
        },{
            'targets': 3,
            'className': 'text-right',
            'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
        }
        ]
    });

    var table_reg = $('#table-reg').DataTable({
        'data' :[],
        'columns': [
            { data: 'no_reg' },
            { data: 'nama' },
            { data: 'harga_paket' },
            { data: 'biaya_tambah' },
            { data: 'biaya_dok' },
            { data: 'bayar_p' },
            { data: 'bayar_t' },
            { data: 'bayar_m' },
            { data: 'saldo_p' },
            { data: 'saldo_t' },
            { data: 'saldo_m' },
            { data: 'tot_bayaridr' },
            { data: 'tot_saldo_idr' },
            { data: 'akun_titip' },
            { data: 'akun_piutang' },
            { data: 'akun_pdpt' }
        ],
        "columnDefs": [ {
            'targets': [2,3,4,5,6,7,8,9,10,11,12],
            'className': 'text-right',
            'render': $.fn.dataTable.render.number( '.', ',', 0, '' )
        }]
    });

    function getPaket(paket){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/paket') }}/"+paket,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#paket').val(result.daftar[0].no_paket);
                         $('#label_paket').text(result.daftar[0].nama);
                         $('#kode_curr').val(result.daftar[0].kode_curr);
                         $('#jadwal').val('');
                         $('#label_jadwal').text('');
                    }else{
                        alert('Paket tidak valid');
                        $('#paket').val('');
                        $('#label_paket').text('');
                        $('#paket').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }else{
                    alert('Paket tidak valid');
                    $('#paket').val('');
                    $('#label_paket').text('');
                    $('#paket').focus();
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
            }
        });
    }

    function getJadwal(paket,jadwal){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/jadwal-detail') }}",
            dataType: 'json',
            data:{'no_paket':paket,'no_jadwal':jadwal},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                         $('#jadwal').val(result.daftar[0].no_jadwal);
                         $('#label_jadwal').text(reverseDateNew(result.daftar[0].tgl_berangkat,'-','/'));
                    }else{
                        alert('Jadwal tidak valid');
                        $('#jadwal').val('');
                        $('#label_jadwal').text('');
                        $('#jadwal').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }else{
                    alert('Jadwal tidak valid');
                    $('#jadwal').val('');
                    $('#label_jadwal').text('');
                    $('#jadwal').focus();
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
            }
        });
    }

    function getRegistrasi(paket,jadwal,kurs){
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/closing-jadwal-reg') }}",
            dataType: 'json',
            data:{no_paket:paket,no_jadwal:jadwal,kurs:kurs},
            async:false,
            success:function(result){    
                if(result.status){
                    table_reg.clear().draw();
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        table_reg.rows.add(result.daftar).draw(false);
                        totTitip = totPiu = totPdpt = 0;
                        for (var i=0;i < result.daftar.length;i++){
                            var line = result.daftar[i]; 
                            totTitip += parseFloat(line.bayar_p_idr); 
                            totPiu += parseFloat(line.tot_saldo_idr); 
                            totPdpt += parseFloat(line.bayar_p_idr) + parseFloat(line.tot_saldo_idr); 
                        }	
                        
                        $('#total_titipan').val(parseFloat(totTitip));
                        $('#total_tunggakan').val(parseFloat(totPiu));
                        $('#total_pdpt').val(parseFloat(totPdpt));
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('dago-auth/login') }}";
                    })
                }else{
                    alert('Paket tidak valid');
                    $('#paket').val('');
                    $('#label_paket').text('');
                    $('#paket').focus();
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
            }
        });
    }

    function showFilter(param,target1,target2){
        var par = param;

        var modul = '';
        var header = [];
        $target = target1;
        $target2 = target2;
        var parameter = {};
        switch(par){
            
            case 'paket': 
                header = ['No Paket', 'Nama'];
                var toUrl = "{{ url('dago-master/paket') }}";
                var columns = [
                    { data: 'no_paket' },
                    { data: 'nama' }
                ];
                
                var judul = "Daftar Paket";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                parameter = {'param':par};
            break;
            case 'jadwal': 
                header = ['No Jadwal', 'Tgl Berangkat'];
                var toUrl = "{{ url('dago-trans/jadwal-detail') }}";
                var columns = [
                    { data: 'no_jadwal' },
                    { data: 'tgl_berangkat' }
                ];
                
                var judul = "Daftar Jadwal";
                var jTarget1 = "val";
                var jTarget2 = "text";
                $target = "#"+$target;
                $target2 = "#"+$target2;
                $target3 = "";
                var no_paket = $('#paket').val();
                parameter = {'no_paket':no_paket};
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
                "data": parameter,
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
            searchTable.$('tr.selected').removeClass('selected');
            if(!$(this).hasClass('selected')){
                $(this).closest('tr').addClass('selected');
            }
            var kode = $(this).closest('tr').find('td:nth-child(1)').text();
            var nama = $(this).closest('tr').find('td:nth-child(2)').text();
            if(jTarget1 == "val"){
                $($target).val(kode);
                $($target).trigger("change");
            }else{
                $($target).text(kode);
            }

            if(jTarget2 == "val"){
                $($target2).val(nama);
                $($target2).trigger("change");
            }else{
                $($target2).text(nama);
            }

            if($target3 != ""){
                $($target3).text(nama);
            }
            $('#modal-search').modal('hide');
        });

        // $('#table-search tbody').on('dblclick','tr',function(){
            
        //     searchTable.$('tr.selected').removeClass('selected');
        //     if(!$(this).hasClass('selected')){
        //         $(this).addClass('selected');
        //     }

        //     var kode = $(this).closest('tr').find('td:nth-child(1)').text();
        //     var nama = $(this).closest('tr').find('td:nth-child(2)').text();
        //     if(jTarget1 == "val"){
        //         $($target).val(kode);
        //         $($target).trigger("change");
        //     }else{
        //         $($target).text(kode);
        //     }

        //     if(jTarget2 == "val"){
        //         $($target2).val(nama);
        //         $($target2).trigger("change");
        //     }else{
        //         $($target2).text(nama);
        //     }

        //     if($target3 != ""){
        //         $($target3).text(nama);
        //     }

        //     if(par == "paket"){
        //         var dta = searchTable.rows('.selected').data();
        //         $('#kode_curr').val(dta[0].kode_curr);
        //     }
        //     $('#modal-search').modal('hide');
        // });

        $('#table-search tbody').on('click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                searchTable.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
            if(par == "paket"){
                var dta = searchTable.rows('.selected').data();
                console.log(dta);
                $('#kode_curr').val(dta[0].kode_curr);
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
                    $($target).trigger("change");
                }else{
                    $($target).text(kode);
                }

                if(jTarget2 == "val"){
                    $($target2).val(nama);
                    $($target2).trigger("change");
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


    function hitungTotal(){
        $('#total').val(0);
        total= 0;
        $('.row-tgh').each(function(){
            var sub = toNilai($(this).closest('tr').find('.inp-nil').val());
            var this_val = sub;
            total += +this_val;
            
            $('#total').val(format_number(total));
        });
    }

    function hitungTambah2(){
        $('#tot_tambah').val(0);
        // var diskon= $('#diskon').val();
        total= 0;
        $('.row-btambah').each(function(){
            var tmp = $(this).closest('tr').find('.inp-btambah_total').val();
            var sub = toNilai(tmp);
            total += +sub;
            
        });
        var tot=total;
        $('#tot_tambah').val(format_number(tot));
    }

    function hitungDok2(){
        $('#tot_dokumen').val(0);
        total= 0;
        $('.row-bdok').each(function(){
            var tmp = $(this).closest('tr').find('.inp-bdok_total').val();
            var sub = toNilai(tmp)
            total += +sub;
            
            $('#tot_dokumen').val(format_number(total));
        });
    }

    
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    });

    $('#saku-data-reg').on('click', '#btn-reg-tambah', function(){
        // $iconLoad.show();
        $('#row-id').hide();
        $('#form-tambah')[0].reset();
        $('#id').val('0');
        $('#method').val('post');
        $('#table-reg tbody').html('');
        $('#saku-data-reg').hide();
        $('#form-tambah-reg').show();
        // $iconLoad.hide();
    });

    $('#form-tambah-reg').on('click', '#btn-reg-kembali', function(){
        $('#saku-data-reg').show();
        $('#form-tambah-reg').hide();
        $('#slide-history').hide();
    });

    $('#btn-tampil').click(function(e){
        e.preventDefault();
        var paket = $('#paket').val();
        var jadwal = $('#jadwal').val();
        var kurs= $('#kurs').val();
        if(toNilai(kurs) == 0){
            alert('Nilai Kurs tidak boleh 0');
            return false;
        }
        if(paket != "" && jadwal != "" && kurs != ""){
            getRegistrasi(paket,jadwal,kurs);
        }
    });

    $('#form-tambah-reg').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        if(parameter == '0'){
            var url = "{{ url('dago-trans/closing-jadwal') }}";
            var pesan = "saved";
        }else{            
            var url = "{{ url('dago-trans/closing-jadwal') }}";
            var pesan = "updated";
        }
        
        var titip = $('#total_titipan').val();
        var tunggakan = $('#total_tunggakan').val();
        var pdpt = $('#total_pdpt').val();
        if ((toNilai(titip) + toNilai(tunggakan)) != toNilai(pdpt)) {
            alert("Transaksi tidak valid. Total Titipan + Total Tunggakan tidak sama dengan Total Pdpt.");
            return false;						
        }
        if (toNilai(pdpt) <= 0) {
            alert("Transaksi tidak valid. Total pendapatan tidak boleh nol atau kurang.");
            return false;						
        }
        else{
            // tambah
            $iconLoad.show();
            var data = table_reg.data();
            var formData = new FormData(this);
            var tempData = []; 
            var i=0;
            $.each( data, function( key, value ) {
                formData.append('no_reg[]',value.no_reg);
                formData.append('akun_titip[]',value.akun_titip);
                formData.append('bayar_paket[]',value.bayar_p_idr);
                formData.append('akun_piutang[]',value.akun_piutang);
                formData.append('total_saldo[]',value.tot_saldo_idr);
                formData.append('akun_pdpt[]',value.akun_pdpt);
                formData.append('pdpt_paket[]',value.pdpt_paket_idr);
                formData.append('saldo_t[]',value.saldo_t);
                formData.append('saldo_dok[]',value.saldo_m);
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
                    if(result.data.status == "SUCCESS"){
                        dataTable.ajax.reload();
                        Swal.fire(
                            'Great Job!',
                            'Your data has been '+pesan+'.'+result.data.message,
                            'success'
                            )   
                        
                        // $('#saku-data-reg').show();
                        $('#form-tambah-reg').hide(); 
                        reportJurnal(result.data.no_bukti);               
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
                    $iconLoad.hide();
                },
                error: function(jqXHR, textStatus, errorThrown) {   
                    if(jqXHR.status == 422){
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
            // $iconLoad.hide();
        }     
    });

    $('#form-tambah').on('click', '.search-item2', function(){
        var par = $(this).closest('div').find('input').attr('name');
        var par2 = $(this).closest('div').siblings('div').find('label').attr('id');
        target1 = par;
        target2 = par2;
        showFilter(par,target1,target2);
    });

    $('#form-tambah').on('change', '#paket', function(){
        var par = $(this).val();
        $('#jadwal').val('');
        $('#label_jadwal').text('');
        getPaket(par);
    });

    $('#form-tambah').on('change', '#jadwal', function(){
        var par = $('#paket').val();
        var par2 = $(this).val();
        getJadwal(par,par2);
    });

    $('#saku-data-reg').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('dago-trans/closing-jadwal-detail') }}",
            dataType: 'json',
            async:false,
            data: {'no_bukti':id},
            success:function(result){
                $('#label_paket').text('');
                $('#label_jadwal').text('');
                if(result.data.status == "SUCCESS"){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    $('#tgl_input').val(reverseDateNew(result.data.data[0].tanggal,'-','/'));
                    $('#keterangan').val(result.data.data[0].keterangan);
                    $('#paket').val(result.data.data[0].no_paket);
                    $('#label_paket').text(result.data.data[0].nama_paket);
                    $('#jadwal').val(result.data.data[0].no_jadwal);
                    $('#label_jadwal').text(result.data.data[0].tgl_jadwal);
                    $('#kode_curr').val(result.data.data[0].kode_curr);
                    $('#kurs').val(parseFloat(result.data.data[0].kurs));
                    var input="";
                    var no=1;
                    var tot=0;
                   
                    table_reg.clear().draw();
                    if(typeof result.data.detail !== 'undefined' && result.data.detail.length>0){
                        table_reg.rows.add(result.data.detail).draw(false);
                        totTitip = totPiu = totPdpt = 0;
                        for (var i=0;i < result.data.detail.length;i++){
                            var line = result.data.detail[i]; 
                            totTitip += parseFloat(line.bayar_p_idr); 
                            totPiu += parseFloat(line.tot_saldo_idr); 
                            totPdpt += parseFloat(line.bayar_p_idr) + parseFloat(line.tot_saldo_idr); 
                        }	
                        
                        $('#total_titipan').val(parseFloat(totTitip));
                        $('#total_tunggakan').val(parseFloat(totPiu));
                        $('#total_pdpt').val(parseFloat(totPdpt));
                    }

                    $('#saku-data-reg').hide();
                    $('#form-tambah-reg').show();
                }
            }
        });
        // $iconLoad.hide();
    });
    
    $('#saku-data-reg').on('click','#btn-delete',function(e){
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
                    url: "{{ url('dago-trans/closing-jadwal') }}",
                    dataType: 'json',
                    async:false,
                    data: {'no_bukti':kode},
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
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

    $('#tanggal,#deskripsi,#kurs,#paket,#jadwal,#total_titipan,#total_tunggakan,#total_pdpt').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','deskripsi','kurs','paket','jadwal','total_titipan','total_tunggakan','total_pdpt'];
        if (code == 13){
            e.preventDefault();
            return false;
        } 
        else if( code == 40 || code == 9) {
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

    $('#slide-print').on('click', '#btn-kembali', function(){
        $('#saku-data-reg').show();
        $('#slide-print').hide();
    });   
    
    </script>
