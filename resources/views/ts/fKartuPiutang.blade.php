    <!-- CSS tambahan -->
    <style>
        th,td{
            padding:8px !important;
            vertical-align:middle !important;
        }
        input.error{
            border:1px solid #dc3545;
        }
        label.error{
            color:#dc3545;
            margin:0;
        }
        #table-data_paginate,#table-search_paginate
        {
            margin-top:0 !important;
        }

        #table-data_paginate ul,#table-search_paginate ul
        {
            float:right;
        }
        .form-body 
        {
            position: relative;
            overflow: auto;
        }

        #content-delete
        {
            position: relative;
            overflow: auto;
        }
        
        #table-search
        {
            border-collapse:collapse !important;
        }

        .hidden{
            display:none;
        }

        #table-search_filter label, #table-search_filter input
        {
            width:100%;
        }

        .dataTables_wrapper .paginate_button.previous {
        margin-right: 0px; }

        .dataTables_wrapper .paginate_button.next {
        margin-left: 0px; }

        div.dataTables_wrapper div.dataTables_paginate {
        margin-top: 25px; }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: center; }

        .dataTables_wrapper .paginate_button.page-item {
            padding-left: 5px;
            padding-right: 5px; 
        }

        .dataTables_length select {
            border: 0;
            background: none;
            box-shadow: none;
            border:none;
            width:120px !important;
            transition-duration: 0.3s; 
        }

        #table-data_filter label
        {
            width:100%;
        }
        #table-data_filter label input
        {
            width:inherit;
        }
        #searchData
        {
            font-size: .75rem;
            height: 31px;
        }
        .dropdown-toggle::after {
            display:none;
        }
        .dropdown-aksi > .dropdown-item{
            font-size : 0.7rem;
        }
        .last-add::before{
            content: "***";
            background: var(--theme-color-1);
            border-radius: 50%;
            font-size: 3px;
            position: relative;
            top: -2px;
            left: -5px;
        }

        div.dataTables_wrapper div.dataTables_filter input{
            height:calc(1.3rem + 1rem) !important;
        }

        .input-group-prepend{
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .readonly > .input-group-prepend{
            background: #e9ecef !important;
        }

        .readonly > .search-item2{
            background: #e9ecef !important;
            cursor:not-allowed;
            display:none;
        }

        .input-group > .form-control 
        {
            border-radius: 0.5rem !important;
        }

        .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #e9ecef !important;
            border: 1px solid #e9ecef !important;
            border-radius: 0.25rem !important;
            color: var(--theme-color-1);
            font-weight:bold;
            cursor:pointer;
        }

        .readonly > .input-group-prepend > span {
            margin: 5px;padding: 0 5px;
            background: #d7d7d7 !important;
            border: 1px solid #d7d7d7 !important;
            border-radius: 0.25rem !important;
            color: black;
            font-weight:bold;
            cursor:pointer;
        }

        span[class^=info-name]{
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;
        }

        .readonly > span[class^=info-name] {
            cursor:pointer;font-size: 12px;position: absolute; top: 3px; left: 52.36663818359375px; padding: 5px 0px 5px 5px; z-index: 2; width: 180.883px;background:white;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height:22px;
            background: #e9ecef !important;

        }

        .info-icon-hapus{
            font-size: 14px;
            position: absolute;
            top: 10px;
            right: 35px;
            z-index: 3;
        }

        .readonly >  .info-icon-hapus{
            display:none;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem;
            
        }

        .readonly >  .form-control{
            background: #e9ecef !important;
        }

        .selectize-input {
            min-height: unset !important;
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            line-height: 30px;
            border-radius: 0.5rem;
        }

        label{
            margin-bottom: 0.2rem;
        }

        .search-item2{
            cursor:pointer;
            font-size: 16px;margin-left:5px;position: absolute;top: 5px;right: 10px;background: white;padding: 5px 0 5px 5px;z-index: 4;height:27px;
        }
        .kop img.logo{
            width:80px !important;
            height:100px !important;
        }
    </style>
    <div class="row" id="saku-dashboard">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;"></h5>
                    <!-- <button type="button" id="btn-print" class="btn btn-primary ml-2" style="float:right;"><i class="simple-icon-printer mr-1"></i> Print</button> -->
                    <div class="dropdown float-right ml-2">
                        <button id="btn-export" type="button" class="btn btn-outline-primary dropdown-toggle float-right"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-share-alt mr-1"></i> Export
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btn-export" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                            <a class="dropdown-item" href="#" id="sai-rpt-print"><img src="{{ asset('img/Print.svg') }}" style="width:16px;"> <span class="ml-2">Print</span></a>
                            <a class="dropdown-item" href="#" id="sai-rpt-print-prev"><img src="{{ asset('img/PrintPreview.svg') }}" style="width:16px;height: 16px;"> <span class="ml-2">Print Preview</span></a>
                            <a class="dropdown-item" href="#" id="sai-rpt-excel"><img src="{{ asset('img/excel.svg') }}" style="width:16px;"> <span class="ml-2">Excel</span></a>
                            <a class="dropdown-item" href="#" id="sai-rpt-email"><img src="{{ asset('img/email.svg') }}" style="width:16px;height: 16px;margin-right: 3px;"><span class="ml-2">Email</span></a>
                        </div>
                    </div>
                    <button type="button" id="btn-kembali" class="btn btn-light" style="float:right;"><i class="simple-arrow-left mr-1"></i> Kembali</button>
                </div>
               
            </div>
            <div class="card" id="print-area">
                <div class="card-body">
                    <div class="kop">
                        <div class="row">
                            <div class="col-md-2 text-center"><img class="logo" src="{{ asset('img/ts-logo2.png') }}"></div>
                            <div class="col-md-10">
                                <h3><b>SMK TELKOM JAKARTA</b></h3>
                                <h6>Jl. Daan Mogot KM.1, Kedaung Kaliangke, Cengkareng</h6>
                                <h6>Jakarta Barat 11710 Telp. 021-5442600 / 5442700</h6>
                            </div>
                        </div>
                    </div>
                    <div class="separator my-1"></div>
                    <div class="kartu-m">
                        <div class="row">
                            <div class="col-sm-12 text-center"><h5><b><u>KARTU PIUTANG</u></b></h5></div>
                            <div class="col-sm-12"><h6><b>Identitas Siswa</b></h6></div>
                            <div class="col-sm-2 col-4">NIS</div>
                            <div class="col-sm-10 col-8" id="nis"></div>
                            <div class="col-sm-2 col-4">ID Bank</div>
                            <div class="col-sm-10 col-8" id="id_bank"></div>
                            <div class="col-sm-2 col-4">Nama</div>
                            <div class="col-sm-10 col-8" id="nama"></div>
                            <div class="col-sm-2 col-4">Kelas</div>
                            <div class="col-sm-10 col-8" id="kode_kelas"></div>
                            <div class="col-sm-2 col-4">Angkatan</div>
                            <div class="col-sm-10 col-8" id="kode_akt"></div>
                            <div class="col-sm-2 col-4">Jurusan</div>
                            <div class="col-sm-10 col-8" id="nama_jur"></div>
                        </div>
                    </div>
                    <div class="kartu-d mt-2">
                        <div class="row">
                            <div class="col-sm-12 table-responsive" style="max-height:300px">
                                <table class="table table-bordered table-striped" id="table-detail">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            <th>No Bukti</th>
                                            <th>Keterangan</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                            <th>Saldo</th>
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
        </div>
    </div>
    <!-- LIST DATA -->
    
    <div id="modalEmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius:0.75rem">
                <form id='formEmail'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Kirim Email</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='form-group row'>
                            <label for="modal-email" class="col-3 col-form-label">Email</label>
                            <div class="col-9">
                                <input type='text' class='form-control' maxlength='100' name='email' id='modal-email' required>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type="button" disabled="" style="display:none" id='loading-bar2' class="btn btn-info">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                        </button>
                        <button type='submit' id='email-submit' class='btn btn-primary'>Kirim</button> 
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                    </div>
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

    function sepNum(x){
        if(!isNaN(x)){
            if (typeof x === undefined || !x || x == 0) { 
                return 0;
            }else if(!isFinite(x)){
                return 0;
            }else{
                var x = parseFloat(x).toFixed(2);
                // console.log(x);
                var tmp = x.toString().split('.');
                // console.dir(tmp);
                var y = tmp[1].substr(0,2);
                var z = tmp[0]+'.'+y;
                var parts = z.split('.');
                parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
                return parts.join(',');
            }
        }else{
            return 0;
        }
    }
    function sepNumPas(x){
        var num = parseInt(x);
        var parts = num.toString().split('.');
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
        return parts.join(',');
    }
    function getKartuPiutang(){
        $.ajax({
            type: "GET",
            url: "{{ url('ts-dash/kartu-piutang') }}",
            dataType: 'json',
            data: {},
            success:function(result){    
                if(result.status){
                    if(result.data.length > 0){
                        var line = result.data[0];
                        $('#nis').html(":&nbsp;"+line.nis);
                        $('#id_bank').html(":&nbsp;"+line.id_bank);
                        $('#nama').html(":&nbsp;"+line.nama);
                        $('#kode_kelas').html(":&nbsp;"+line.kode_kelas);
                        $('#nama_jur').html(":&nbsp;"+line.nama_jur);
                        $('#kode_akt').html(":&nbsp;"+line.kode_akt);
                        var detail = '';
                        var no=1;
                        var tosaldo=0;var tagihan=0; var bayar=0;
                        $('#table-detail tbody').html(detail);
                        if(result.detail.length > 0){
                            for(var i=0;i < result.detail.length ;i++){
                                var line2 = result.detail[i];
                                var saldo = parseFloat(line2.tagihan)-parseFloat(line2.bayar);
                                tagihan += parseFloat(line2.tagihan);
                                bayar += parseFloat(line2.bayar);
                                tosaldo += saldo;
                                detail +=`<tr>
                                    <td>`+no+`</td>
                                    <td>`+line2.tgl+`</td>
                                    <td>`+line2.no_bukti+`</td>
                                    <td>`+line2.keterangan+`</td>
                                    <td>`+sepNumPas(line2.tagihan)+`</td>
                                    <td>`+sepNumPas(line2.bayar)+`</td>
                                    <td>`+sepNumPas(saldo)+`</td>
                                </tr>`;
                                no++;
                            }
                            detail+=`<tr>
                                <td colspan='4' class='text-right'><b>Total</b></td>
                                <td>`+sepNumPas(tagihan)+`</td>
                                <td>`+sepNumPas(bayar)+`</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan='6' class='text-right'><b>Saldo</b></td>
                                <td>`+sepNumPas(tosaldo)+`</td>
                            </tr>`;
                        }
                        $('#table-detail tbody').html(detail);
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/ts-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getKartuPiutang();

    
    var scrollform = document.querySelector('.table-responsive');
    var psscrollform = new PerfectScrollbar(scrollform);
   
    $('#saku-dashboard').on('click','#btn-print',function(e){
        e.preventDefault();
        $('#print-area').printThis({
            removeInline: true,
            importStyle: true
        });
    });

    $('#saku-dashboard').on('click', '#btn-kembali', function(){
        
        var form ="{{ Session::get('dash') }}";
        loadForm("{{ url('ts-auth/form') }}/"+form);
    });

    $('#sai-rpt-print').click(function(){
        $('#print-area').printThis({
            removeInline: true,
            importStyle: true,
        });
    });
    
    $('#sai-rpt-print-prev').click(function(){
        var newWindow = window.open();
        var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#print-area').html()+`</div></body>`;
        newWindow.document.write(html);
    });
    
    $("#sai-rpt-excel").click(function(e) {
        e.preventDefault();
        $("#print-area").table2excel({
            // exclude: ".excludeThisClass",
            name: "KartuPiutang_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "KartuPiutang_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });
    
    
    $("#sai-rpt-email").click(function(e) {
        e.preventDefault();
        $('#formEmail')[0].reset();
        $('#modalEmail').modal('show');
    });
    
    $('#modalEmail').on('submit','#formEmail',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('ts-report/email-kartu-piutang') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                alert(result.message);
                if(result.status){
                    $('#modalEmail').modal('hide');
                }
                // $loadBar2.hide();
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        
    });

    </script>