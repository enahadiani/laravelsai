<link href="{{ asset('asset_elite/css/jquery.treegrid.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('report.css') }}" />
    <style>
        #scroll-top
        {
            position:fixed;
            bottom:60px;
            right:25px;
            z-index:2000;
            cursor:pointer;
            width:40px;
            height:40px;
            border-radius:50%;
            background:#d7d7d7;
            padding:8px;
            opacity: 0.5;
        }
        #scroll-top:hover 
        {
            opacity: 1;
        }
        #scroll-bottom
        {
            position:fixed;
            bottom:10px;
            right:25px;
            z-index:2000;
            cursor:pointer;
            width:40px;
            height:40px;
            border-radius:50%;
            background:#d7d7d7;
            padding:8px;
            opacity: 0.5;
        }
        #scroll-bottom:hover 
        {
            opacity: 1;
        }
    </style>
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Neraca Lajur per Bulan" />  
                <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="periode" nama="Tahun" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="kode_akun" nama="Kode Akun" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="mutasi" nama="Mutasi Nol" selected="1" :option="array('1','3')"/>
                                        
                                        <!-- END COMPONENT -->
                                    </div>   
                                    <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                    <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <x-report-paging :option="array()" default="100" />  
                </div>                    
            </div>
        </div>
    </div>
    <x-report-result judul="Neraca Lajur" padding="px-4 py-4"/>  
    
    @include('modal_search')
    @include('modal_email')

    @php
        date_default_timezone_set("Asia/Bangkok");
    @endphp
    <div class="control-scroll">
    <a id="scroll-bottom" class="text-center" style='display:none'><i class="simple-icon-arrow-down" style="font-size:20px"></i></a><a id="scroll-top"  style='display:none' class="text-center"><i class="simple-icon-arrow-up" style="font-size:20px"></i></a>
    </div>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('reportFilter.js') }}"></script>
    <script src="{{ asset('asset_web/plugins/fullcalendar/lib/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('asset_elite/js/jquery.treegrid.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
            }
        });
        var $periode = {
            type : "=",
            from : "{{ date('Y') }}",
            fromname : "{{ date('Y') }}",
            to : "",
            toname : "",
        }
        var $kode_akun = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }
        
        var $mutasi = {
            type : "=",
            from : "Tidak",
            fromname : "Tidak",
            to : "",
            toname : "",
        }

        var param_trace = {
            periode : "",
            kode_akun : ""
        }

        function fnSpasi(level)
        {
            var tmp="";
            for (var iS=1; iS<=level; iS++)
            {
                tmp=tmp+"&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            return tmp;
        }

        var $aktif = "";
        
        $.fn.DataTable.ext.pager.numbers_length = 5;

        // $('#show').selectize();

        $('#periode-from').val("{{ date('Y') }}");
        $('#mutasi-from').val("Tidak");
        $('#btn-filter').click(function(e){
            $('#collapseFilter').show();
            $('#collapsePaging').hide();
            if($(this).hasClass("btn-primary")){
                $(this).removeClass("btn-primary");
                $(this).addClass("btn-light");
            }
            
            $('#btn-filter').addClass("hidden");
            $('#btn-export').addClass("hidden");
        });
        
        $('#btn-tutup').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
        });

        $('#btn-tampil').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
        });

        $('.selectize').selectize();

        $('#inputFilter').reportFilter({
            kode : ['periode','kode_akun','mutasi'],
            nama : ['Periode','Kode Akun','Mutasi Nol'],
            header : [['Tahun'],['Kode','Nama'],['Kode']],
            headerpilih : [['Tahun','Action'],['Kode','Nama','Action'],['Kode','Action']],
            columns: [
                [
                    { data: 'periode' }
                ],[
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ],[
                    { data: 'kode' }
                ]
            ],
            url :["{{ url('esaku-report/filter-tahun') }}","{{ url('esaku-report/filter-akun') }}","{{ url('esaku-report/filter-mutasi') }}"],
            parameter:[],
            orderby:[[[0,"desc"]],[],[]],
            width:[['30%','70%'],['30%','70%'],['30%','70%']],
            display:['kode','kodename','kode'],
            pageLength:[12,10,10]
            
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("kode_akun[]",$kode_akun.type);
            $formData.append("kode_akun[]",$kode_akun.from);
            $formData.append("kode_akun[]",$kode_akun.to);
            $formData.append("mutasi[]",$mutasi.type);
            $formData.append("mutasi[]",$mutasi.from);
            $formData.append("mutasi[]",$mutasi.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('esaku-auth/form/rptNrcLajurBulan') }}";
            // if($output.from == "Laporan"){
            // }else if($output.from == "Grid"){
            //     xurl = "{{ url('esaku-auth/form/rptNrcLajurBulanGrid') }}";
            // }else if($output.from == "Laporan Scroll"){
            //     xurl = "{{ url('esaku-auth/form/rptNrcLajurBulanScroll') }}";
            // }

            $('#saku-report #canvasPreview').load(xurl);
            $('#scroll-bottom').show();

        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("kode_akun[]",$kode_akun.type);
            $formData.append("kode_akun[]",$kode_akun.from);
            $formData.append("kode_akun[]",$kode_akun.to);
            $formData.append("mutasi[]",$mutasi.type);
            $formData.append("mutasi[]",$mutasi.from);
            $formData.append("mutasi[]",$mutasi.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('esaku-auth/form/rptNrcLajurBulan') }}";
            // if($output.from == "Laporan"){
            // }else if($output.from == "Grid"){
            //     xurl = "{{ url('esaku-auth/form/rptNrcLajurBulanGrid') }}";
            // }else if($output.from == "Laporan Scroll"){
            //     xurl = "{{ url('esaku-auth/form/rptNrcLajurBulanScroll') }}";
            // }
            $('#saku-report #canvasPreview').load(xurl);
            $('#scroll-bottom').show();
        });

        $('#saku-report #canvasPreview').on('click', '.bukubesar', function(e){
        e.preventDefault();
            var kode_akun = $(this).data('kode_akun');
            param_trace.kode_akun = kode_akun;
            var periode = $(this).data('periode');
            param_trace.periode = periode;
            var back = true;

            $formData.delete('periode[]');
            $formData.append("periode[]","=");
            $formData.append("periode[]",periode);
            $formData.append("periode[]","");
            
            $formData.delete('kode_akun[]');
            $formData.append('kode_akun[]', "=");
            $formData.append('kode_akun[]', kode_akun);
            $formData.append('kode_akun[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur" aria-param="">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item active" aria-current="buku-besar" aria-param="`+kode_akun+`">Buku Besar</li>
            `);
            xurl ="esaku-auth/form/rptBukuBesar";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('#saku-report #canvasPreview').on('click', '.jurnal', function(e){
            e.preventDefault();
            var no_bukti = $(this).data('no_bukti');
            var kode_akun = $(this).data('kode_akun');
            var periode = param_trace.periode;
            var back = true;

            $formData.delete('periode[]');
            $formData.append("periode[]","=");
            $formData.append("periode[]",periode);
            $formData.append("periode[]","");
            
            $formData.delete('no_bukti[]');
            $formData.append('no_bukti[]', "=");
            $formData.append('no_bukti[]', no_bukti);
            $formData.append('no_bukti[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur" aria-param="">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="buku-besar" aria-param="`+kode_akun+`">Buku Besar</a>
                </li>
                <li class="breadcrumb-item active" aria-current="jurnal" aria-param="`+kode_akun+`|`+no_bukti+`">Jurnal</li>
            `);
            xurl ="esaku-auth/form/rptBuktiJurnal";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.navigation-lap').on('click', '#btn-back', function(e){
            e.preventDefault();
            
            var aktif = $('.breadcrumb-item.active').attr('aria-current');
            var tmp = $('.breadcrumb-item.active').attr('aria-param').split("|");
            var param = tmp[0];
            if(aktif == "buku-besar"){
                $formData.delete('periode[]');
                $formData.append("periode[]",$periode.type);
                $formData.append("periode[]",$periode.from);
                $formData.append("periode[]",$periode.to);
                $formData.delete('back');
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]",$kode_akun.type);
                $formData.append("kode_akun[]",$kode_akun.from);
                $formData.append("kode_akun[]",$kode_akun.to);
                xurl = "esaku-auth/form/rptNrcLajurBulan";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="neraca-lajur" aria-param="">Neraca</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }else if(aktif == "jurnal"){
                xurl = "esaku-auth/form/rptBukuBesar";
                $formData.delete('periode[]');
                $formData.append("periode[]",'=');
                $formData.append("periode[]",param_trace.periode);
                $formData.append("periode[]","");

                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param);
                $formData.append("kode_akun[]","");
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca-lajur" aria-param="">Neraca Lajur</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="buku-besar" aria-param="`+param+`">Buku Besar</li>
                `);
            }
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.breadcrumb').on('click', '.klik-report', function(e){
            e.preventDefault();
            var tujuan = $(this).data('href');
            var tmp = $(this).attr('aria-param').split("|");
            if(tujuan == "neraca-lajur"){
                $formData.delete('back');
                var param = tmp[0];
                $formData.delete('periode[]');
                $formData.append("periode[]",$periode.type);
                $formData.append("periode[]",$periode.from);
                $formData.append("periode[]",$periode.to);
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]",$kode_akun.type);
                $formData.append("kode_akun[]",$kode_akun.from);
                $formData.append("kode_akun[]",$kode_akun.to);
                xurl = "esaku-auth/form/rptNrcLajurBulan";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="neraca-lajur" aria-param="">Neraca</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }else if(tujuan == "buku-besar"){
                
                $formData.delete('periode[]');
                $formData.append("periode[]",'=');
                $formData.append("periode[]",param_trace.periode);
                $formData.append("periode[]","");

                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param);
                $formData.append("kode_akun[]","");
                xurl = "esaku-auth/form/rptBukuBesar";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca-lajur" aria-param="">Neraca Lajur</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="buku-besar" aria-param="`+param+`">Buku Besar</li>
                `);
            }
            $('#saku-report #canvasPreview').load(xurl);
            
        });

        $('#sai-rpt-print').click(function(){
            $('#saku-report #canvasPreview').printThis({
                removeInline: true
            });
        });

        $('#sai-rpt-print-prev').click(function(){
            var newWindow = window.open();
            var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
            newWindow.document.write(html);
        });

        $("#sai-rpt-excel").click(function(e) {
            e.preventDefault();
            $("#saku-report #canvasPreview").table2excel({
                // exclude: ".excludeThisClass",
                name: "NeracaLajur_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "NeracaLajur_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        });

        
        $("#sai-rpt-email").click(function(e) {
            e.preventDefault();
            $('#formEmail')[0].reset();
            $('#modalEmail').modal('show');
        });

        $("#sai-rpt-pdf").click(function(e) {
            e.preventDefault();
            var link = "{{ url('esaku-report/lap-nrclajur-bulan-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&kode_akun[]="+$kode_akun.type+"&kode_akun[]="+$kode_akun.from+"&kode_akun[]="+$kode_akun.to+"&mutasi[]="+$mutasi.type+"&mutasi[]="+$mutasi.from+"&mutasi[]="+$mutasi.to;
            window.open(link, '_blank'); 
        });

        $('#modalEmail').on('submit','#formEmail',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("periode[]",$periode.type);
            formData.append("periode[]",$periode.from);
            formData.append("periode[]",$periode.to);
            formData.append("kode_akun[]",$kode_akun.type);
            formData.append("kode_akun[]",$kode_akun.from);
            formData.append("kode_akun[]",$kode_akun.to);
            formData.append("mutasi[]",$mutasi.type);
            formData.append("mutasi[]",$mutasi.from);
            formData.append("mutasi[]",$mutasi.to);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('esaku-report/send-laporan') }}",
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

        
        $('#scroll-bottom').click(function(){
            $('html, body').animate({
                scrollTop: $("#saku-report tbody tr:last").offset().top
            }, 700);
        });

        $('#scroll-top').click(function(){
            $('html, body').animate({
                scrollTop: 0
            }, 700);
        });

        $(window).scroll(function() {
            // if($(window).scrollTop() + $(window).height() == $(document).height()) {
            //     alert("bottom!");
            // }else if($(window).scrollTop() == 0){
            //     alert("top!");
            // }
            if($(window).scrollTop() == 0){
                $('#scroll-top').hide();
                $('#scroll-bottom').show();
            }else if($(window).scrollTop() + $(window).height() == $(document).height()){
                $('#scroll-top').show();
                $('#scroll-bottom').hide();
            }
        });
    </script>