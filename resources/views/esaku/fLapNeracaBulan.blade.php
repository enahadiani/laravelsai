<link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Neraca Bulan"/>
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
                                        <x-inp-filter kode="kode_fs" nama="Kode FS" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="level" nama="Level" selected="3" :option="array('3')"/>
                                        
                                        <!-- END COMPONENT -->
                                    </div>
                                    <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                    <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <x-report-paging :option="array()" default="All" />  
                </div>                    
            </div>
        </div>
    </div>
    <x-report-result judul="Neraca" padding="px-4 py-4" />
    
    @include('modal_search')
    @include('modal_email')
    @php
        date_default_timezone_set("Asia/Bangkok");
    @endphp
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('reportFilter.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
            }
        });
        var $periode = {
            type : "=",
            from : "{{ substr(Session::get('periode'),0,4) }}",
            fromname : "{{ substr(Session::get('periode'),0,4) }}",
            to : "",
            toname : "",
        }
        var $kode_fs = {
            type : "=",
            from : "FS1",
            fromname : "FS1",
            to : "",
            toname : "",
        }

        var $level = {
            type : "=",
            from : "1",
            fromname : "1",
            to : "",
            toname : "",
        }

        var $aktif = "";

        var param_trace = {
            periode : "",
            kode_neraca : "",
            kode_akun : "",
            no_bukti : ""
        };
        function fnSpasi(level)
        {
            var tmp="";
            for (var iS=1; iS<=level; iS++)
            {
                tmp=tmp+"&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            return tmp;
        }

        $.fn.DataTable.ext.pager.numbers_length = 5;

        // $('#show').selectize();

        $('#periode-from').val("{{ substr(Session::get('periode'),0,4) }}");
        $('#kode_fs-from').val("FS1");
        $('#level-from').val("1");

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
            kode : ['periode','kode_fs','level'],
            nama : ['Tahun','Kode FS','Level'],
            header : [['Tahun'],['Kode', 'Nama'],['Kode']],
            headerpilih : [['Tahun','Action'],['Kode', 'Nama','Action'],['Kode','Action']],
            columns: [
                [
                    { data: 'periode' }
                ],[
                    { data: 'kode_fs' },
                    { data: 'nama' }
                ],[
                    { data: 'kode' }
                ]
            ],
            url :["{{ url('esaku-report/filter-tahun') }}","{{ url('esaku-report/filter-fs') }}","{{ url('esaku-report/filter-level') }}"],
            parameter:[],
            orderby:[[[0,"desc"]],[],[]],
            width:[['30%','70%'],['30%','70%'],['30%','70%']],
            display:['kode','kode','kode'],
            pageLength:[12,10,10]
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("kode_fs[]",$kode_fs.type);
            $formData.append("kode_fs[]",$kode_fs.from);
            $formData.append("kode_fs[]",$kode_fs.to);
            $formData.append("level[]",$level.type);
            $formData.append("level[]",$level.from);
            $formData.append("level[]",$level.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('esaku-auth/form/rptNeracaBulan') }}";
    
            $('#saku-report').removeClass('hidden');
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("kode_fs[]",$kode_fs.type);
            $formData.append("kode_fs[]",$kode_fs.from);
            $formData.append("kode_fs[]",$kode_fs.to);
            $formData.append("level[]",$level.type);
            $formData.append("level[]",$level.from);
            $formData.append("level[]",$level.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('esaku-auth/form/rptNeracaBulan') }}";
           
            $('#saku-report #canvasPreview').load(xurl);
        });


        $("#sai-rpt-pdf").click(function(e) {
            e.preventDefault();
            var link = "{{ url('esaku-report/lap-neraca-bulan-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&kode_fs[]="+$kode_fs.type+"&kode_fs[]="+$kode_fs.from+"&kode_fs[]="+$kode_fs.to+"&level[]="+$level.type+"&level[]="+$level.from+"&level[]="+$level.to;
            window.open(link, '_blank'); 
        });

        // TRACE
        $('#saku-report #canvasPreview').on('click', '.neraca-lajur', function(e){
            e.preventDefault();
            var kode_neraca = $(this).data('kode_neraca');
            param_trace.kode_neraca = kode_neraca;
            var periode = $(this).data('periode');
            param_trace.periode = periode;
            var back = true;
            
            $formData.delete('periode[]');
            $formData.append('periode[]', "=");
            $formData.append('periode[]', periode);
            $formData.append('periode[]', "");
            
            $formData.delete('kode_akun[]');  
            $formData.delete('kode_neraca[]');
            $formData.append('kode_neraca[]', "=");
            $formData.append('kode_neraca[]', kode_neraca);
            $formData.append('kode_neraca[]', "");

            var kode_akun = $(this).data('kode_akun');
            if(kode_akun != "" && kode_akun != undefined){
                param_trace.kode_akun = kode_akun; 
                $formData.delete('kode_neraca[]');  
                $formData.delete('kode_akun[]');
                $formData.append('kode_akun[]', "=");
                $formData.append('kode_akun[]', kode_akun);
                $formData.append('kode_akun[]', "");
            }


            $formData.delete('trail[]');
            $formData.append('trail[]', "=");
            $formData.append('trail[]', "1");
            $formData.append('trail[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca" >Neraca</a>
                </li>
                <li class="breadcrumb-item active" aria-current="neraca-lajur" >Neraca Lajur</li>
            `);
            xurl ="esaku-auth/form/rptNrcLajur";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('#saku-report #canvasPreview').on('click', '.bukubesar', function(e){
        e.preventDefault();
            var kode_akun = $(this).data('kode_akun');
            param_trace.kode_akun = kode_akun;
            var periode = param_trace.periode;
            var back = true;
            
            $formData.delete('kode_akun[]');
            $formData.append('kode_akun[]', "=");
            $formData.append('kode_akun[]', kode_akun);
            $formData.append('kode_akun[]', "");

            
            $formData.delete('periode[]');
            $formData.append('periode[]', "=");
            $formData.append('periode[]', periode);
            $formData.append('periode[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item active" aria-current="buku-besar">Buku Besar</li>
            `);
            xurl ="esaku-auth/form/rptBukuBesar";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('#saku-report #canvasPreview').on('click', '.jurnal', function(e){
            e.preventDefault();
            var no_bukti = $(this).data('no_bukti');
            param_trace.no_bukti = no_bukti;
            var periode = param_trace.periode;
            var back = true;

            $formData.delete('periode[]');
            $formData.append('periode[]', "=");
            $formData.append('periode[]', periode);
            $formData.append('periode[]', "");
            
            $formData.delete('no_bukti[]');
            $formData.append('no_bukti[]', "=");
            $formData.append('no_bukti[]', no_bukti);
            $formData.append('no_bukti[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="buku-besar">Buku Besar</a>
                </li>
                <li class="breadcrumb-item active" aria-current="jurnal">Jurnal</li>
            `);
            xurl ="esaku-auth/form/rptBuktiJurnal";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.navigation-lap').on('click', '#btn-back', function(e){
            e.preventDefault();
            
            var aktif = $('.breadcrumb-item.active').attr('aria-current');
            
            if(aktif == "neraca-lajur"){
                $formData.delete('periode[]'); 
                $formData.delete('id'); 
                $formData.delete('kode_akun[]');
                $formData.delete('kode_neraca[]');
                $formData.append("periode[]",$periode.type);
                $formData.append("periode[]",$periode.from);
                $formData.append("periode[]",$periode.to);
                $formData.delete('back');
                $formData.delete('kode_fs[]');
                $formData.append("kode_fs[]",$kode_fs.type);
                $formData.append("kode_fs[]",$kode_fs.from);
                $formData.append("kode_fs[]",$kode_fs.to);
                xurl = "esaku-auth/form/rptNeracaBulan";
                
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="neraca">Neraca</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }
            else if(aktif == "buku-besar"){
                xurl = "esaku-auth/form/rptNrcLajur";
                $formData.delete('periode[]');
                $formData.append("periode[]","=");
                $formData.append("periode[]",param_trace.periode);
                $formData.append("periode[]","");
                $formData.delete('kode_neraca[]');
                $formData.append("kode_neraca[]","=");
                $formData.append("kode_neraca[]",param_trace.kode_neraca);
                $formData.append("kode_neraca[]","");
                $formData.delete('kode_akun[]');
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca" >Neraca</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="neraca-lajur">Neraca Lajur</li>
                `);
            }else if(aktif == "jurnal"){
                xurl = "esaku-auth/form/rptBukuBesar";
                $formData.delete('periode[]');
                $formData.append("periode[]","=");
                $formData.append("periode[]",param_trace.periode);
                $formData.append("periode[]","");
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param_trace.kode_akun);
                $formData.append("kode_akun[]","");
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca" >Neraca</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca-lajur">Neraca Lajur</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="buku-besar">Buku Besar</li>
                `);
            }
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.breadcrumb').on('click', '.klik-report', function(e){
            e.preventDefault();
            var tujuan = $(this).data('href');
            if(tujuan == "neraca"){
                $formData.delete('periode[]'); 
                $formData.delete('id');
                $formData.delete('kode_akun[]');
                $formData.delete('kode_neraca[]');
                $formData.append("periode[]",$periode.type);
                $formData.append("periode[]",$periode.from);
                $formData.append("periode[]",$periode.to);
                xurl = "esaku-auth/form/rptNeracaBulan";
               
                $formData.delete('back');
                $formData.delete('kode_fs[]');
                $formData.append("kode_fs[]",$kode_fs.type);
                $formData.append("kode_fs[]",$kode_fs.from);
                $formData.append("kode_fs[]",$kode_fs.to);
                $formData.delete('kode_neraca[]');
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="neraca" >Neraca</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }else if(tujuan == "neraca-lajur"){
                $formData.delete('periode[]');
                $formData.append("periode[]","=");
                $formData.append("periode[]",param_trace.periode);
                $formData.append("periode[]","");

                $formData.delete('kode_neraca[]');
                $formData.append("kode_neraca[]","=");
                $formData.append("kode_neraca[]",param_trace.kode_neraca);
                $formData.append("kode_neraca[]","");
                $formData.delete('kode_akun[]');
                xurl = "esaku-auth/form/rptNrcLajur";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="neraca-lajur">Neraca Lajur</li>
                `);
            }else if(tujuan == "buku-besar"){
                $formData.delete('periode[]');
                $formData.append("periode[]","=");
                $formData.append("periode[]",param_trace.periode);
                $formData.append("periode[]","");
                
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]","=");
                $formData.append("kode_akun[]",param_trace.kode_akun);
                $formData.append("kode_akun[]","");
                xurl = "esaku-auth/form/rptBukuBesar";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca">Neraca</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="klik-report" data-href="neraca-lajur" >Neraca Lajur</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="buku-besar"Buku Besar</li>
                `);
            }
            $('#saku-report #canvasPreview').load(xurl);
            
        });

        $('#sai-rpt-print').click(function(){
            $('#saku-report #canvasPreview').printThis();
        });

        $('#sai-rpt-print-prev').click(function(){
            var newWindow = window.open();
            var html = `<head>`+$('head').html()+`</head><link rel="stylesheet" href="{{ asset('report.css') }}" /><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
            newWindow.document.write(html);
        });

        $("#sai-rpt-excel").click(function(e) {
            e.preventDefault();
            $("#saku-report #canvasPreview").table2excel({
                // exclude: ".excludeThisClass",
                name: "NeracaBulan_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "NeracaBulan_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("kode_fs[]",$kode_fs.type);
            $formData.append("kode_fs[]",$kode_fs.from);
            $formData.append("kode_fs[]",$kode_fs.to);
            $formData.append("level[]",$level.type);
            $formData.append("level[]",$level.from);
            $formData.append("level[]",$level.to);
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

    </script>