    <link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Buku Besar"/>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="kode_akun" nama="Kode Akun" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="mutasi" nama="Mutasi" selected="1" :option="array('1','3')"/>
                                        <!-- END COMPONENT -->
                                    </div>
                                    
                                    <button id="btn-tampil" style="float:right;width:110px" class="btn btn-primary ml-2 mb-3" type="submit" >Tampilkan</button>
                                    <button type="button" id="btn-tutup" class="btn btn-light mb-3" style="float:right;width:110px" type="button" >Tutup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <x-report-paging :option="array()" default="10" />  
                </div>                    
            </div>
        </div>
    </div>
    <x-report-result judul="Buku Besar" padding="px-4 py-4"/>  
    
    @include('yakes.modal_search')
    @include('yakes.modal_email')
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
            from : "{{ date('Ym') }}",
            fromname : namaPeriode("{{ date('Ym') }}"),
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
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $aktif = "";

        var param_trace = {
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

        $('#periode-from').val(namaPeriode("{{ date('Ym') }}"));

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
            nama : ['Periode','Kode Akun','Mutasi'],
            header : [['Periode', 'Nama'],['Kode', 'Nama'],['Kode']],
            headerpilih : [['Periode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode','Action']],
            columns: [
                [
                    { data: 'periode' },
                    { data: 'nama' }
                ],[
                    { data: 'kode_akun' },
                    { data: 'nama' }
                ],[
                    { data: 'kode' }
                ]
            ],
            url :["{{ url('yakes-report/filter-periode-keu') }}","{{ url('yakes-report/filter-akun') }}","{{ url('yakes-report/filter-mutasi') }}"],
            parameter:[],
            orderby:[[[0,"desc"]],[],[]],
            width:[['30%','70%'],['30%','70%'],['30%','70%']],
            display:['name','kodename','kode'],
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
            xurl = "{{ url('yakes-auth/form/rptBukuBesar') }}";
            $('#saku-report #canvasPreview').load(xurl);
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
            xurl = "{{ url('yakes-auth/form/rptBukuBesar') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        // TRACE
        $('#saku-report #canvasPreview').on('click', '.jurnal', function(e){
            e.preventDefault();
            var no_bukti = $(this).data('no_bukti');
            param_trace.no_bukti = no_bukti;
            var back = true;
            
            $formData.delete('no_bukti[]');
            $formData.append('no_bukti[]', "=");
            $formData.append('no_bukti[]', no_bukti);
            $formData.append('no_bukti[]', "");

            $formData.delete('back');
            $formData.append('back', back);
            $('.breadcrumb').html('');
            $('.breadcrumb').append(`
                <li class="breadcrumb-item">
                    <a href="#" class="klik-report" data-href="buku-besar">Buku Besar</a>
                </li>
                <li class="breadcrumb-item active" aria-current="jurnal">Jurnal</li>
            `);
            xurl ="yakes-auth/form/rptBuktiJurnal";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.navigation-lap').on('click', '#btn-back', function(e){
            e.preventDefault();
            $formData.delete('periode[]');
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);

            var aktif = $('.breadcrumb-item.active').attr('aria-current');

            if(aktif == "jurnal"){
                xurl = "yakes-auth/form/rptBukuBesar";
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]",$kode_akun.type);
                $formData.append("kode_akun[]",$kode_akun.from);
                $formData.append("kode_akun[]",$kode_akun.to);
                $formData.delete('back');
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="buku-besar">Buku Besar</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('.breadcrumb').on('click', '.klik-report', function(e){
            e.preventDefault();
            var tujuan = $(this).data('href');
            $formData.delete('periode[]');
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            if(tujuan == "buku-besar"){
                $formData.delete('back');
                $formData.delete('kode_akun[]');
                $formData.append("kode_akun[]",$kode_akun.type);
                $formData.append("kode_akun[]",$kode_akun.from);
                $formData.append("kode_akun[]",$kode_akun.to);
                xurl = "yakes-auth/form/rptBukuBesar";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="buku-besar" >Buku Besar</li>
                `);
                $('.navigation-lap').addClass('hidden');
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
                name: "BukuBesar_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "BukuBesar_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
                url: "{{ url('yakes-report/send-laporan') }}",
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