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

        .fs-14{
            font-size:14px;
        }
        .lh-1 {
           line-height:1.5 !important;
        }
        #table-header-skl td,  #table-header-skl th, #table-isi-skl td, #table-isi-skl th
        {
            font-size:10px !important;
            vertical-align:middle;
            border-color:black !important;
            border-width:1px;
            padding:0px !important;
        }
        .bold{
            font-weight:bold;
        }
        .italic{
            font-style:italic;
        }
        #table-isi-skl td.border-mixed-left
        {   
            border-style: dashed dashed dashed solid !important;
        }
        #table-isi-skl td.border-mixed
        {   
            border-style: dashed dashed dashed dashed !important;
        }
        #table-isi-skl td.border-mixed-right
        {
            border-style: dashed solid dashed dashed !important;
        }
        .coret{
            text-decoration: line-through;
        }
    </style>
    <div class="row" id="saku-dashboard">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body pb-3" style="padding-top:1rem;">
                    <h5 style="position:absolute;top: 25px;"></h5>
                    <button type="button" id="btn-kembali" class="btn btn-light" style="float:right;"><i class="simple-arrow-left mr-1"></i> Kembali</button>
                </div>
            </div>
            <div class="card" id="print-area">
                <div class="card-body">
                    <div class="hasil-skl mt-4">
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
                                    <p class="mb-0 fs-12 lh-1"><b>SURAT KETERANGAN LULUS</b></p>
                                    <p class="mb-0 fs-10 lh-1"><b>Nomor: 295 / KUR / SMK TEL / V / 2020</b></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-borderless" id="table-header-skl" width="100%">
                                        <tr>
                                            <td colspan="4">Kepala Sekolah SMK Telkom Sandhy Putra Jakarta menerangkan bahwa:</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td width="25%">Nama</td>
                                            <td width="2%"> : </td>
                                            <td width="58%">MUHAMAD ALIF FATHUROHMAN</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>Tempat dan Tanggal Lahir</td>
                                            <td> : </td>
                                            <td>Jakarta, 31 Mei 2002</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>Nomor Induk / NISN</td>
                                            <td> : </td>
                                            <td>20177568 / 0024094258</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>Bidang Studi Keahlian</td>
                                            <td> : </td>
                                            <td>Teknologi Informasi dan Komunikasi</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>Program Keahlian</td>
                                            <td> : </td>
                                            <td>Teknik Telekomunikasi</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">&nbsp;</td>
                                            <td>Kompetensi Keahlian</td>
                                            <td> : </td>
                                            <td>Teknik Transmisi Telekomunikasi</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Berdasarkan:</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">1.</td>
                                            <td colspan="3">Keputusan Kepala Dinas Pendidikan Provinsi DKI Jakarta Nomor 356 tahun 2020</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">2.</td>
                                            <td colspan="3">Peraturan Akademik tentang Kriteria Kelulusan pada KTSP SMK Telkom Sandhy Putra Tahun 2019</td>
                                        </tr>
                                        <tr>
                                            <td width="2%">3.</td>
                                            <td colspan="3">Hasil Rapat Pleno Dewan Pendidik tentang kelulusan Tahun Pelajaran 2019/2020</td>
                                        </tr>
                                        <tr>
                                            <td width="2%" colspan="4">Dinyatakan:</td>
                                        </tr>
                                        <tr>
                                            <td width="2%" colspan="4" class="text-center bold fs-14 ">LULUS/&nbsp;<span class="coret">TIDAK LULUS</span></td>
                                        </tr>
                                        <tr>
                                            <td width="2%" colspan="4">Dengan hasil sebagai berikut:</td>
                                        </tr>  
                                    </table>
                                    <table class="table table-bordered" id="table-isi-skl" width="100%">
                                        <thead>
                                            <tr>
                                                <td  class="text-center" width="2%">No</td>
                                                <td  class="text-center" width="58%">Mata Pelajaran</td>
                                                <td  class="text-center" width="20%">Rata-rata Raport</td>
                                                <td  class="text-center" width="20%">Nilai Ujian Sekolah</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="4">Muatan Nasional</td>
                                            </tr>
                                            <tr>
                                                <td class="border-mixed-left">1.</td>
                                                <td class="border-mixed">Pendidikan Agama dan Budi Pekerti</td>
                                                <td class="border-mixed"></td>
                                                <td class="border-mixed-right"></td>
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
                           
                           $('#hasil-skl').html('');
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

    // $('#saku-dashboard').on('click', '#btn-tampil', function(){
    //     getRaport();
    // });

    </script>