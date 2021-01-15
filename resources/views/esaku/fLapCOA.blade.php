<link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan COA" padding="px-4 py-4"/>  
                <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="kode_fs" nama="Kode FS" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="jenis" nama="Jenis" selected="3" :option="array('3')"/>
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
    <x-report-result judul="Neraca" padding="px-4 py-4"/>  
    
    @include('modal_search')
    @include('modal_email')
    
    @php
        date_default_timezone_set("Asia/Bangkok");
    @endphp
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('reportFilter.js') }}"></script>
    <link href="{{ asset('asset_elite/css/jquery.treegrid.css') }}" rel="stylesheet">
    <script src="{{ asset('asset_elite/js/jquery.treegrid.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
            }
        });
        var $kode_fs = {
            type : "=",
            from : "FS1",
            fromname : "FS1",
            to : "",
            toname : "",
        }

        var $jenis = {
            type : "=",
            from : "COA",
            fromname : "COA",
            to : "",
            toname : "",
        }

        var $aktif = "";

        var param_trace = {
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

        $('#kode_fs-from').val("FS1");
        $('#jenis-from').val("COA");

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
            kode : ['kode_fs','jenis'],
            nama : ['Kode FS','Jenis'],
            header : [['Kode', 'Nama'],['Kode']],
            headerpilih : [['Kode', 'Nama','Action'],['Kode','Action']],
            columns: [
                [
                    { data: 'kode_fs' },
                    { data: 'nama' }
                ],[
                    { data: 'kode' }
                ]
            ],
            url :["{{ url('esaku-report/filter-fs') }}","{{ url('esaku-report/filter-jeniscoa') }}"],
            parameter:[],
            orderby:[[],[]],
            width:[['30%','70%'],['30%','70%']],
            display:['kode','kode'],
            pageLength:[10,10]
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("kode_fs[]",$kode_fs.type);
            $formData.append("kode_fs[]",$kode_fs.from);
            $formData.append("kode_fs[]",$kode_fs.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            if($jenis.from == "COA"){
                xurl = "{{ url('esaku-auth/form/rptCOA') }}";
            }else if($jenis.from == "Struktur"){
                xurl = "{{ url('esaku-auth/form/rptCOAStruktur') }}";
            }
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("kode_fs[]",$kode_fs.type);
            $formData.append("kode_fs[]",$kode_fs.from);
            $formData.append("kode_fs[]",$kode_fs.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            if($jenis.from == "COA"){
                xurl = "{{ url('esaku-auth/form/rptCOA') }}";
            }else if($jenis.from == "Struktur"){
                xurl = "{{ url('esaku-auth/form/rptCOAStruktur') }}";
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
            var html = `<head>`+$('head').html()+`</head><link rel="stylesheet" href="{{ asset('report.css') }}" /><style>`+$('style').html()+`</style><body style='background:white;'><div align="center">`+$('#canvasPreview').html()+`</div></body>`;
            newWindow.document.write(html);
        });

        $("#sai-rpt-excel").click(function(e) {
            e.preventDefault();
            $("#saku-report #canvasPreview").table2excel({
                // exclude: ".excludeThisClass",
                name: "COA_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "COA_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        });

        $("#sai-rpt-pdf").click(function(e) {
            e.preventDefault();
            if($jenis.from == "COA"){
                var link = "{{ url('esaku-report/lap-coa-pdf') }}?kode_fs[]="+$kode_fs.type+"&kode_fs[]="+$kode_fs.from+"&kode_fs[]="+$kode_fs.to;

            }else{
                var link = "{{ url('esaku-report/lap-coa-struktur-pdf') }}?kode_fs[]="+$kode_fs.type+"&kode_fs[]="+$kode_fs.from+"&kode_fs[]="+$kode_fs.to;
            }
            window.open(link, '_blank'); 
        });
        
        $("#sai-rpt-email").click(function(e) {
            e.preventDefault();
            $('#formEmail')[0].reset();
            $('#modalEmail').modal('show');
        });

        $('#modalEmail').on('submit','#formEmail',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $formData.append("kode_fs[]",$kode_fs.type);
            $formData.append("kode_fs[]",$kode_fs.from);
            $formData.append("kode_fs[]",$kode_fs.to);
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