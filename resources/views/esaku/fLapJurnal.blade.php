<link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Jurnal"/>
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
                                        <x-inp-filter kode="modul" nama="Modul" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="no_bukti" nama="No Bukti" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="sum_ju" nama="Sum Jurnal" selected="3" :option="array('3')"/>
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
    <x-report-result judul="Jurnal" padding="py-4 px-0"/>

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
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var $periode = {
            type : "=",
            from : "{{ Session::get('periode') }}",
            fromname : namaPeriode("{{ Session::get('periode') }}"),
            to : "",
            toname : "",
        }
        var $modul = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $no_bukti = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $sum_ju = {
            type : "=",
            from : "Ya",
            fromname : "Ya",
            to : "",
            toname : "",
        }

        var $aktif = "";
        
        $.fn.DataTable.ext.pager.numbers_length = 5;

        // $('#show').selectize();

        $('#periode-from').val(namaPeriode("{{ Session::get('periode') }}"));
        $('#sum_ju-from').val("Ya");

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
            kode : ['periode','modul','no_bukti','sum_ju'],
            nama : ['Periode','Modul','No Bukti','Sum Jurnal'],
            header : [['Periode', 'Nama'],['Kode'],['No Bukti','Keterangan'],['Kode']],
            headerpilih : [['Periode', 'Nama','Action'],['Kode','Action'],['No Bukti','Keterangan','Action'],['Kode','Action']],
            columns: [
                [
                    { data: 'periode' },
                    { data: 'nama' }
                ],[
                    { data: 'kode' }
                ],[
                    { data: 'no_bukti' },
                    { data: 'keterangan' }
                ],[
                    { data: 'kode' }
                ]
            ],
            url :["{{ url('esaku-report/filter-periode-keu') }}","{{ url('esaku-report/filter-modul') }}","{{ url('esaku-report/filter-bukti-jurnal') }}","{{ url('esaku-report/filter-sumju') }}"],
            parameter:[{},{},{
                'periode[0]':$periode.type,
                'periode[1]':$periode.from,
                'periode[2]':$periode.to,
                'modul[0]':$modul.type,
                'modul[1]':$modul.from,
                'modul[2]':$modul.to,
            },{}],
            orderby:[[[0,"desc"]],[],[[0,"asc"]],[]],
            width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
            display:['name','kode','kode','kode'],
            pageLength:[12,10,10,10]
        });

        $('#inputFilter').on('change','input',function(e){
            setTimeout(() => {
                
                var periode = $periode;
                var modul = $modul;
                console.log(periode);
                $('#inputFilter').reportFilter({
                    kode : ['periode','modul','no_bukti','sum_ju'],
                    nama : ['Periode','Modul','No Bukti','Sum Jurnal'],
                    header : [['Periode', 'Nama'],['Kode'],['No Bukti','Keterangan'],['Kode']],
                    headerpilih : [['Periode', 'Nama','Action'],['Kode','Action'],['No Bukti','Keterangan','Action'],['Kode','Action']],
                    columns: [
                        [
                            { data: 'periode' },
                            { data: 'nama' }
                        ],[
                            { data: 'kode' }
                        ],[
                            { data: 'no_bukti' },
                            { data: 'keterangan' }
                        ],[
                            { data: 'kode' }
                        ]
                    ],
                    url :["{{ url('esaku-report/filter-periode-keu') }}","{{ url('esaku-report/filter-modul') }}","{{ url('esaku-report/filter-bukti-jurnal') }}","{{ url('esaku-report/filter-sumju') }}"],
                    parameter:[{},{},{
                        'periode[0]':periode.type,
                        'periode[1]':periode.from,
                        'periode[2]':periode.to,
                        'modul[0]':modul.type,
                        'modul[1]':modul.from,
                        'modul[2]':modul.to,
                    },{}],
                    orderby:[[[0,"desc"]],[],[[0,"asc"]],[]],
                    width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
                    display:['name','kode','kode','kode'],
                    pageLength:[12,10,10,10]
                    
                });
            }, 500);
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("modul[]",$modul.type);
            $formData.append("modul[]",$modul.from);
            $formData.append("modul[]",$modul.to);
            $formData.append("no_bukti[]",$no_bukti.type);
            $formData.append("no_bukti[]",$no_bukti.from);
            $formData.append("no_bukti[]",$no_bukti.to);
            $formData.append("sum_ju[]",$sum_ju.type);
            $formData.append("sum_ju[]",$sum_ju.from);
            $formData.append("sum_ju[]",$sum_ju.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('esaku-auth/form/rptBuktiJurnal') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("modul[]",$modul.type);
            $formData.append("modul[]",$modul.from);
            $formData.append("modul[]",$modul.to);
            $formData.append("no_bukti[]",$no_bukti.type);
            $formData.append("no_bukti[]",$no_bukti.from);
            $formData.append("no_bukti[]",$no_bukti.to);
            $formData.append("sum_ju[]",$sum_ju.type);
            $formData.append("sum_ju[]",$sum_ju.from);
            $formData.append("sum_ju[]",$sum_ju.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('esaku-auth/form/rptBuktiJurnal') }}";
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
                name: "Jurnal_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "Jurnal_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
            var link = "{{ url('esaku-report/lap-jurnal-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&modul[]="+$modul.type+"&modul[]="+$modul.from+"&modul[]="+$modul.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to+"&sum_ju[]="+$sum_ju.type+"&sum_ju[]="+$sum_ju.from+"&sum_ju[]="+$sum_ju.to;
            window.open(link, '_blank'); 
        });

        $('#modalEmail').on('submit','#formEmail',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("modul[]",$modul.type);
            $formData.append("modul[]",$modul.from);
            $formData.append("modul[]",$modul.to);
            $formData.append("no_bukti[]",$no_bukti.type);
            $formData.append("no_bukti[]",$no_bukti.from);
            $formData.append("no_bukti[]",$no_bukti.to);
            $formData.append("sum_ju[]",$sum_ju.type);
            $formData.append("sum_ju[]",$sum_ju.from);
            $formData.append("sum_ju[]",$sum_ju.to);
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