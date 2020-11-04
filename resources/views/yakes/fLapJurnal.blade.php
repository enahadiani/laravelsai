    <link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pt-4 pb-2 px-4" style="min-height:69.2px">
                    <h5 style="position:absolute;top: 25px;">Laporan Jurnal</h5>
                    <button id="btn-filter" style="float:right;width:110px" class="btn btn-light ml-2 hidden" type="button"><i class="simple-icon-equalizer mr-2" style="transform-style: ;" ></i>Filter</button>
                    <div class="dropdown float-right">
                        <button id="btn-export" type="button" class="btn btn-outline-primary dropdown-toggle float-right hidden"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-share-alt mr-1"></i> Export 
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btn-export" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                            <a class="dropdown-item" href="#" id="sai-rpt-print"><img src="{{ asset('img/Print.svg') }}" style="width:16px;"> <span class="ml-2">Print</span></a>
                            <a class="dropdown-item" href="#" id="sai-rpt-print-prev"><img src="{{ asset('img/PrintPreview.svg') }}" style="width:16px;height: 16px;"> <span class="ml-2">Print Preview</span></a>
                            <a class="dropdown-item" href="#" id="sai-rpt-excel"><img src="{{ asset('img/excel.svg') }}" style="width:16px;"> <span class="ml-2">Excel</span></a>
                            <a class="dropdown-item" href="#" id="sai-rpt-email"><img src="{{ asset('img/email.svg') }}" style="width:16px;height: 16px;margin-right: 3px;"><span class="ml-2">Email</span></a>
                        </div>
                    </div>
                </div>
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
                    <div class="col-12 col-sm-12">
                        <div class="collapse" id="collapsePaging">
                            <div class="px-4 py-0 row"  style="min-height:63px">
                                <label class="col-sm-1 pr-0" style="padding-top: 0;margin:auto">Menampilkan</label>
                                <div class='col-sm-2 pl-0' style='padding-top: 0;margin:auto'>
                                    <select name="show" id="show" class="" style='border:none'>
                                        <option value="10">10 per halaman</option>
                                        <option value="25">25 per halaman</option>
                                        <option value="50">50 per halaman</option>
                                        <option value="100">100 per halaman</option>
                                        <option value="All">Semua halaman</option>
                                    </select>
                                </div>
                                <div class="col-sm-9 text-center">
                                    <div id="pager">
                                        <ul id="pagination" class="pagination pagination-sm2 float-right mb-0"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>

    <div class="row mt-2 hidden" id="saku-report">
        <div class="col-12">
            <div class="card px-4 py-4" style="min-height:200px">
                <div class="border-bottom px-0 py-3 mb-2 navigation-lap hidden">
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb py-0 my-0">
                            <li class="breadcrumb-item active">
                                Jurnal
                            </li>
                        </ol>
                    </nav>            
                    <button type="button" id="btn-back" style="position: absolute;right: 25px;
                    top: 30px;" class="btn btn-light float-right">
                    <i class=""></i> Back</button>
                </div>
                <div class="row h-100" id="report-load" style="display: none;">
                    <div class="col-12 col-md-10 mx-auto my-auto">
                        <div style="box-shadow:none" class="card auth-card text-center">
                            <div style="padding:50px;width:50%;" class="my-auto mx-auto">
                                <div class="progress" style="height:10px">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" id="report-load-bar">0.00%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="canvasPreview">
                </div>
            </div>
        </div>
    </div>
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
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var $periode = {
            type : "=",
            from : "{{ date('Ym') }}",
            fromname : namaPeriode("{{ date('Ym') }}"),
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

        $('#periode-from').val(namaPeriode("{{ date('Ym') }}"));
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
            url :["{{ url('yakes-report/filter-periode-keu') }}","{{ url('yakes-report/filter-modul') }}","{{ url('yakes-report/filter-bukti-jurnal') }}","{{ url('yakes-report/filter-sumju') }}"],
            parameter:[{},{},{
                'periode[0]':'=',
                'periode[1]':'202001',
                'periode[2]':'',
                'modul[0]':$modul.type,
                'modul[1]':$modul.from,
                'modul[2]':$modul.to,
            },{}],
            orderby:[[[0,"desc"]],[],[],[]],
            width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
            display:['name','kode','kode','kode']
            
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
                    url :["{{ url('yakes-report/filter-periode-keu') }}","{{ url('yakes-report/filter-modul') }}","{{ url('yakes-report/filter-bukti-jurnal') }}","{{ url('yakes-report/filter-sumju') }}"],
                    parameter:[{},{},{
                        'periode[0]':periode.type,
                        'periode[1]':periode.from,
                        'periode[2]':periode.to,
                        'modul[0]':modul.type,
                        'modul[1]':modul.from,
                        'modul[2]':modul.to,
                    },{}],
                    orderby:[[[0,"desc"]],[],[],[]],
                    width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
                    display:['name','kode','kode','kode']
                    
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
            xurl = "{{ url('yakes-auth/form/rptJurnal') }}";
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
            xurl = "{{ url('yakes-auth/form/rptJurnal') }}";
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