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
        .fs-12{
            font-size:12px;
        }
        
        .fs-10{
            font-size:10px;
        }
        .lh-1 {
           line-height:1.5 !important;
        }
        #table-raport td, #table-raport th
        {
            font-size:10px !important;
            vertical-align:middle;
            border-color:black !important;
            border-width:1px;
        }

        .bold{
            font-weight:bold;
        }
        .italic{
            font-style:italic;
        }
        #table-raport td.border-mixed-left
        {   
            border-style: dashed dashed dashed solid !important;
        }
        #table-raport td.border-mixed
        {   
            border-style: dashed dashed dashed dashed !important;
        }
        #table-raport td.border-mixed-right
        {
            border-style: dashed solid dashed dashed !important;
        }
    </style>
    <div class="row" id="saku-dashboard">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;"></h5>
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
                            <a class="dropdown-item" href="#" id="sai-rpt-pdf"><img src="{{ asset('img/PrintPreview.svg') }}" style="width:16px;height: 16px;"> <span class="ml-2">PDF</span></a>
                        </div>
                    </div>
                    <button type="button" id="btn-kembali" class="btn btn-light" style="float:right;"><i class="simple-arrow-left mr-1"></i> Kembali</button>
                </div>
            </div>
            <div class="card" id="print-area">
                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-md-12"><h5><b><u>RAPORT</u></b></h5></div>
                            <div class="col-md-12">&nbsp;</div>
                            <div class="col-md-2">Tahun Ajaran</div>
                            <div class="col-md-2">
                                <select class='form-control' id="kode_ta" name="kode_ta">
                                <option value='' disabled>--- Pilih TA ---</option>
                                </select>
                            </div>
                            <div class="col-md-1">Jenis</div>
                            <div class="col-md-2">
                                <select class='form-control selectize' id="kode_jenis" name="kode_jenis">
                                <option value='' disabled>--- Pilih Jenis ---</option>
                                <option value='UTS'>UTS</option>
                                <option value='UAS'>UAS</option>
                                </select>
                            </div>
                            <div class="col-md-1">Semester</div>
                            <div class="col-md-2">
                                <select class='form-control selectize' id="kode_sem" name="kode_sem">
                                <option value='' disabled>--- Pilih Semester ---</option>
                                <option value='1'>Ganjil</option>
                                <option value='2'>Genap</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" id="btn-tampil">Tampil</button>
                            </div>
                        </div>
                    </div>
                    <div class="hasil-raport mt-4">
                        <div class="kop">
                            <div class="row">
                                <div class="col-md-2 text-center"><img class="logo" src="{{ asset('img/ts-logo2.png') }}"></div>
                                <div class="col-md-8 text-center">
                                    <p class="mb-0 fs-12"><b>YAYASAN PENDIDIKAN TELKOM</b></p>
                                    <h2 class="mb-0"><b>SMK Telkom Sandhy Putra Jakarta</b></h2>
                                    <p class="mb-0 fs-12">Terakreditasi A</p>
                                    <p class="mb-0 fs-10">(1) Teknik Transamisi Telekomunikasi (2) Teknik Jaringan Akses (3) Teknik Komputer dan Jaringan (4) Rekayasa Perangkat Lunak</p>
                                    <p class="mb-0 fs-10">JL. Daan Mogot KM.11, Cengkareng, Jakarta Barat 11710 - Telepon : 021-5442500/5442600 </p>
                                    <p class="mb-0 fs-10">http://www.smktelkom-jkt.sch.id email:smkteljakarta@ypt.or.id /smktelkjkt@gmail.com</p>
                                </div>
                            </div>
                            <div class="separator"></div>
                        </div>
                        <div class="isi mt-3">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p class="mb-0 fs-12 lh-1"><b>RAPOR TENGAH SEMESTER GENAP TAHUN PELAJARAN 2020/2021</b></p>
                                    <p class="mb-0 fs-10 lh-1"><b>Bidang Keahlian Teknologi Informasi dan Komunikasi</b></p>
                                    <p class="mb-0 fs-10 lh-1"><b>Program Keahlian Teknik Komputer dan Informatika</b></p>
                                    <p class="mb-0 fs-10 lh-1"><b>Kompetensi Keahlian Rekayasa Perangkat Lunak</b></p>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 fs-10 bold">Nama Peserta Didik</div>
                                        <div class="col-md-1 fs-10 bold">:</div>
                                        <div class="col-md-7 fs-10 border-bottom bold"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 fs-10 bold">Kelas</div>
                                        <div class="col-md-1 fs-10 bold">:</div>
                                        <div class="col-md-7 fs-10  border-bottom bold"></div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 fs-10 bold">NIS</div>
                                        <div class="col-md-1 fs-10 bold">:</div>
                                        <div class="col-md-7 fs-10 border-bottom bold"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 fs-10 bold">No Urut/ID</div>
                                        <div class="col-md-1 fs-10 bold">:</div>
                                        <div class="col-md-7 fs-10  border-bottom bold"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="table-raport"> 
                                        <thead bgcolor="#CCCCCC">
                                            <tr>
                                                <th rowspan="2" class="text-center">No</th>
                                                <th rowspan="2" class="text-center">Mata Pelajaran</th>
                                                <th rowspan="2" class="text-center">SKM</th>
                                                <th colspan="4" class="text-center">Nilai Pengetahuan</th>
                                                <th colspan="4" class="text-center">Nilai Keterampilan</th>
                                                <th colspan="2" class="text-center">Rataan</th>
                                                <th rowspan="2" class="text-center">Nilai Akhir</th>
                                                <th rowspan="2" class="text-center">Predikat</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">1</th>
                                                <th class="text-center">2</th>
                                                <th class="text-center">3</th>
                                                <th class="text-center">PTS</th>
                                                <th class="text-center">1</th>
                                                <th class="text-center">2</th>
                                                <th class="text-center">3</th>
                                                <th class="text-center">PTS</th>
                                                <th class="text-center">NP</th>
                                                <th class="text-center">NK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="bold" colspan="15">A. Muatan Nasional</td>
                                            </tr>
                                            <tr>
                                                <td class="border-mixed-left" rowspan="2">1</td>
                                                <td class="border-mixed bold">PEND. AGAMA DAN BUDI PEKERTI ISLAM</td>
                                                <td class="border-mixed" rowspan="2">75</td>
                                                <td class="border-mixed" rowspan="2">-</td>
                                                <td class="border-mixed" rowspan="2">-</td>
                                                <td class="border-mixed" rowspan="2">-</td>
                                                <td class="border-mixed" rowspan="2">92</td>
                                                <td class="border-mixed" rowspan="2">-</td>
                                                <td class="border-mixed" rowspan="2">-</td>
                                                <td class="border-mixed" rowspan="2">-</td>
                                                <td class="border-mixed" rowspan="2">92</td>
                                                <td class="border-mixed" rowspan="2">92</td>
                                                <td class="border-mixed" rowspan="2">92</td>
                                                <td class="border-mixed" rowspan="2">92</td>
                                                <td class="border-mixed-right" rowspan="2">A</td>
                                            </tr>
                                            <tr>
                                                <td class="border-mixed italic">Nama Guru: MARWADI</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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

    function getTA(){
        $.ajax({
            type: 'GET',
            url: "{{ url('ts-master/tahun-ajaran') }}",
            dataType: 'json',
            data: {kode_pp:"{{ Session::get('kodePP') }}"},
            success:function(result){    
                var select = $('#kode_ta').selectize();
                select = select[0];
                var control = select.selectize;
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_ta, value:result.daftar[i].kode_ta}]);  
                        }
                    }
                } else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    getTA();
    $('.selectize').selectize();
    function getRaport(){
        // $.ajax({
        //     type: "GET",
        //     url: "{{ url('ts-dash/kartu-piutang') }}",
        //     dataType: 'json',
        //     data: {},
        //     success:function(result){    
        //         if(result.status){
        //             if(result.data.length > 0){
                           var hasil ='';
                           
                           $('.hasil-raport').html('');
                    // }
        //         }
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {       
        //         if(jqXHR.status == 422){
        //             var msg = jqXHR.responseText;
        //         }else if(jqXHR.status == 500) {
        //             var msg = "Internal server error";
        //         }else if(jqXHR.status == 401){
        //             var msg = "Unauthorized";
        //             window.location="{{ url('/ts-auth/sesi-habis') }}";
        //         }else if(jqXHR.status == 405){
        //             var msg = "Route not valid. Page not found";
        //         }
                
        //     }
        // });
    }
    
    // var scrollform = document.querySelector('.table-responsive');
    // var psscrollform = new PerfectScrollbar(scrollform);

    $('#saku-dashboard').on('click', '#btn-kembali', function(){
        var form ="{{ Session::get('dash') }}";
        loadForm("{{ url('ts-auth/form') }}/"+form);
    });

    
    $('#sai-rpt-print').click(function(){
        $('.hasil-raport').printThis({
            removeInline: true,
            importStyle: true,
        });
    });
    
    $('#sai-rpt-print-prev').click(function(){
        var newWindow = window.open();
        var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('.hasil-raport').html()+`</div></body>`;
        newWindow.document.write(html);
    });

    $("#sai-rpt-pdf").click(function(e) {
        e.preventDefault();
        var link = "{{ url('ts-dash/raport-pdf') }}";
        window.open(link, '_blank'); 
    });
    
    $("#sai-rpt-excel").click(function(e) {
        e.preventDefault();
        $(".hasil-raport").table2excel({
            // exclude: ".excludeThisClass",
            name: "Raport_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "Raport_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
        var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style>
        <body style='background:white;'>
            <div>
                <div class="card" id="print-area">
                    <div class="card-body">
                        `+$('.hasil-raport').html()+`
                    </div>
                </div>
            </div>
        </body>`;
        formData.append("html",html);
        formData.append("text","Berikut ini kami lampiran Raport siswa:");
        formData.append("subject","Raport siswa");
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $.ajax({
            type: 'POST',
            url: "{{ url('ts-report/email-send') }}",
            dataType: 'json',
            data: formData,
            async:false,
            contentType: false,
            cache: false,
            processData: false, 
            success:function(result){
                alert(result.data.message);
                if(result.data.id != undefined){
                    $('#modalEmail').modal('hide');
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
        
    });

    </script>