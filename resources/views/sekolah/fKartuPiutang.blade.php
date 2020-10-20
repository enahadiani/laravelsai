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
            width:100px !important;
            height:100px !important;
        }
    </style>
    <div class="row" id="saku-datatable">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;"></h5>
                    <button type="button" id="btn-print" class="btn btn-primary" style="float:right;"><i class="simple-icon-printer mr-1"></i> Print</button>
                </div>
               
            </div>
            <div class="card" id="print-area">
                <div class="card-body">
                    <div class="kop">
                        <div class="row">
                            <div class="col-sm-2"><img class="logo" src="{{ asset('img/tarbak30x30.png') }}"></div>
                            <div class="col-sm-10">
                                <h3><b>SEKOLAH DASAR TARUNA BAKTI</b></h3>
                                <h6>Jl.L.L.R.E. Martadinata No.52 Bandung 40115</h6>
                                <h6>Telp. (022) 4261571</h6>
                            </div>
                        </div>
                    </div>
                    <div class="separator my-1"></div>
                    <div class="kartu-m">
                        <div class="row">
                            <div class="col-sm-12 text-center"><h5><b><u>KARTU SISWA</u></b></h5></div>
                            <div class="col-sm-12"><h6><b>Identitas Siswa</b></h6></div>
                            <div class="col-sm-2">NIS</div>
                            <div class="col-sm-10" id="nis"></div>
                            <div class="col-sm-2">ID Bank</div>
                            <div class="col-sm-10" id="id_bank"></div>
                            <div class="col-sm-2">Nama</div>
                            <div class="col-sm-10" id="nama"></div>
                            <div class="col-sm-2">Kelas</div>
                            <div class="col-sm-10" id="kode_kelas"></div>
                            <div class="col-sm-2">Angkatan</div>
                            <div class="col-sm-10" id="kode_akt"></div>
                            <div class="col-sm-2">Jurusan</div>
                            <div class="col-sm-10" id="nama_jur"></div>
                        </div>
                    </div>
                    <div class="kartu-d mt-2">
                        <div class="row">
                            <div class="col-sm-12">
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
            url: "{{ url('sekolah-trans/kartu-piutang') }}",
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
                                    <td>`+line2.tanggal+`</td>
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
                    window.location="{{ url('/sekolah-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getKartuPiutang();
   
    $('#saku-datatable').on('click','#btn-print',function(e){
        e.preventDefault();
        $('#print-area').printThis({
            removeInline: true,
            importStyle: true
        });
    });

    </script>