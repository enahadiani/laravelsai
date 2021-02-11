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

        .separator-double{
            border-bottom: 5px double #CFCFCF;
        }

        .bg-grey{
            color: white !important;
            background: #707070 !important;
        }

        #grid-load
        {
            position: absolute;
            text-align: center;
            width: 100%;
            top: 200px;
            display:none;
        }
        .report-klik{
            cursor:pointer;
        }
        #table-detail td.border-top
        {
            border-top: 1px solid black !important;
        }
        .separator3{
            width: 100%;
            height: 1px;
            /* dashed border */
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' stroke='%23B0AFB0FF' stroke-width='4' stroke-dasharray='1%2c 12' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
        }
    </style>
    <div class="row" id="saku-dashboard">
        <div class="col-12">
            <div class="card" id="print-area" style="height:100%">
                <div class="card-body">
                    <div class="kop">
                        <div class="row">
                            <div class="col-md-4"><h6 class="text-primary bold">Laporan Kartu Deposit</h6></div>
                            <div class="col-md-8 text-right">
                                <h3><b>SMK TELKOM JAKARTA</b></h3>
                                <h6>Jl. Daan Mogot KM.1, Kedaung Kaliangke, Cengkareng <br> Jakarta Barat 11710 </h6>
                                <h6>Telp. 021-5442600 / 5442700</h6>
                            </div>
                        </div>
                    </div>
                    <div class="separator-double mt-1 mb-2"></div>
                    <div class="kartu-d mt-2">
                        <div class="row">
                            <div class="col-sm-12" style="min-height:300px">
                                <table class="table table-borderless" id="table-detail">
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

    $('#beranda').show();
    
    var scrollContent = document.querySelector('.content-fix-height-right');
    var psscrollContent = new PerfectScrollbar(scrollContent,{suppressScrollX:true});
    
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

    function getChild(index,id,url,parent = null){
        var kode = id.replace('grid-id-','');
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            data: {id: kode},
            success:function(result){   
                if(result.status){
                    var det = "";
                    if(result.daftar.length > 0){
                        for(var j=0;j < result.daftar.length ;j++){
                            var lined = result.daftar[j];
                            if( j == 0){
                                det +=`<tr class='text-grey' data-parent=`+id+`>
                                <td>Deskripsi</td>
                                <td>Parameter</td>
                                <td>Nilai</td>
                            </tr>`;
                            }   
                            det +=`
                            <tr data-parent=`+id+`>
                                <td>`+lined.keterangan+`</td>
                                <td>`+lined.kode_param+`</td>
                                <td class='text-right'>`+sepNumPas(lined.nilai)+`</td>
                            </tr>`;
                        }
                        $('#table-detail').find('tr:eq('+index+')').after(det);
                    }
                }
            }
        });
    }

    function getKartuPDD(){
        $.ajax({
            type: "GET",
            url: "{{ url('ts-dash/kartu-pdd') }}",
            dataType: 'json',
            data: {},
            success:function(result){    
                if(result.status){
                    var detail = '';
                    var no=1;
                    var tosaldo=0;var debet=0; var kredit=0;
                    $('#table-detail tbody').html(detail);
                    if(result.daftar.length > 0){
                        for(var i=0;i < result.daftar.length ;i++){
                            var line = result.daftar[i];
                            nilai = parseFloat(line.nilai);
                            var ket1 = "Masuk || ";
                            var ket2 = "Keluar || ";
                            var ket = (line.nilai > 0 ? ket1+line.tgl+" || "+line.no_rekon : ket2+line.tgl+" || "+line.no_rekon);
                            tosaldo += nilai;
                            var nil = (line.nilai > 0 ? "" : "("+sepNumPas(Math.abs(nilai))+")" );
                            detail +=`<tr class="bold" id="`+line.no_rekon+`">
                            <td colspan="2">`+ket+`</td>
                            <td class="text-right">`+nil+`</td>
                            </tr>
                            `;
                            var det = "";
                            var x =0;
                            for(var j=0; j < result.detail.length; j++){
                                
                                var line2 = result.detail[j];
                                var ket2 = "";
                                if(line2.no_rekon == line.no_rekon){
                                    if( x == 0){
                                        det +=`<tr class='text-grey'>
                                        <td>Deskripsi</td>
                                        <td>Parameter</td>
                                        <td class='text-right'>Nilai</td>
                                        </tr>`;
                                        ket2 = line.keterangan;
                                    }else if(x == 1){
                                        ket2 = "";
                                    }else{
                                        ket2 = "";
                                    }
                                    det +=`
                                    <tr>
                                    <td>`+ket2+`</td>
                                    <td>`+line2.kode_param+`</td>
                                    <td class='text-right'>`+(line.nilai > 0 ? sepNumPas(line2.nilai) : "("+sepNumPas(line2.nilai)+")" )+`</td>
                                    </tr>`;
                                    x++;
                                }else{
                                    x = 0;
                                }
                            }
                            detail+=det+`<tr class="text-primary" >
                            <td colspan="2"></td>
                            <td class="text-right bold border-top">Saldo Akhir `+sepNumPas(tosaldo)+`</td>
                            </tr>
                            <tr>
                                <td colspan="3"><div class='separator3'></div></td>
                            </tr>`;
                            no++;
                        }
                    }
                    $('#table-detail tbody').html(detail);
                    // $('#table-detail').on('click','.report-klik',function(e){
                    //     e.preventDefault();
                    //     var id = $(this).attr('id');
                    //     var index = $(this).closest('tr').index();
                    //     if(!$(this).hasClass('clicked')){
                    //         $(this).addClass('clicked');
                    //         var top = $(this).position().top;
                    //         $('#grid-load').css('top',top);
                    //         getChild(index,id,'ts-dash/kartu-pdd-detail');
                    //     }
                    //     if(!$(this).hasClass('open-grid')){
                    //         $(this).addClass('open-grid');
                    //         $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-down');
                    //         $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-up');
                    //         $(this).removeClass('close-grid');
                    //         $('tr[data-parent="' + id + '"]').show();

                    //     }else{
                    //         $(this).addClass('close-grid');
                    //         $(this).closest('tr').find('i').removeClass('mr-2 simple-icon-arrow-up');
                    //         $(this).closest('tr').find('i').addClass('mr-2 simple-icon-arrow-down');
                    //         $(this).removeClass('open-grid');
                    //         $('tr[data-parent="' + id + '"]').hide();
                    //         $('tr[data-parentop="' + id + '"]').hide();
                    //     }
                        
                    // });
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

    getKartuPDD();
    
   
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

    $("#sai-rpt-pdf").click(function(e) {
        e.preventDefault();
        var link = "{{ url('ts-dash/kartu-pdd-pdf') }}";
        window.open(link, '_blank'); 
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
        var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style>
        <body style='background:white;'>
            <div>
                <div class="card" id="print-area">
                    <div class="card-body">
                        `+$('.kop').html()+`
                        <div class="separator my-1"></div>
                        `+$('.kartu-m').html()+`
                        <div class="kartu-d mt-2">
                            <div class="row">
                                <div class="col-sm-12">
                                `+$('#table-detail').html()+`
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>`;
        formData.append("html",html);
        formData.append("text","Berikut ini kami lampiran Kartu PDD siswa:");
        formData.append("subject","Kartu PDD siswa");
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