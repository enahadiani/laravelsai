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
        .list-item-heading{
            font-size:0.8rem;
        }
        .menu-icon{
            cursor:pointer;
        }
    </style>
    <div class="card" id="saku-dashboard">
        <div class="card-body">
            <div class="row mb-4">
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Buku Penghubung.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Buku Penghubung</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Keuangan.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Keuangan</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Kalender Akademik.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Kalender Akademik</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Absensi.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Absensi</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Nilais.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Nilai</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Jadwal Pelajaran.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Jadwal Pelajaran</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Prestasis.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Prestasi</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Report.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Raport</p>
                </div>
                <div class="text-center col-sm-3 col-4 menu-icon">
                    <img alt="Profile" src="{{ asset('img/menu-siswa/Ekstrakulikuler.png') }}" class="img-thumbnail border-0 rounded-circle mb-1 list-thumbnail">
                    <p class="list-item-heading mb-3">Ekskul</p>
                </div>
            </div>
            <h5>Informasi</h5>
            <div class="separator"></div>
            <div class="row mt-4">
                <div class="col-lg-2 col-md-4 col-12 mb-4">
                    <div class="card">
                        <div class="position-relative">
                            <img class="card-img-top" src="{{ asset('asset_web/homepages/kegiatan/2.jpg') }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <p class="list-item-heading mb-4">Homemade Cheesecake with Fresh Berries and Mint
                            </p>
                            <footer>
                            <p class="text-muted text-small mb-0 font-weight-light">09.04.2018</p>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-12 mb-4">
                    <div class="card">
                        <div class="position-relative">
                            <img class="card-img-top" src="{{ asset('asset_web/homepages/kegiatan/3.jpg') }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <p class="list-item-heading mb-4">Homemade Cheesecake with Fresh Berries and Mint
                            </p>
                            <footer>
                            <p class="text-muted text-small mb-0 font-weight-light">09.04.2018</p>
                            </footer>
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


    </script>