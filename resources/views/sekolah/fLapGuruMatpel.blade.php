    <link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <div class="card-body pt-4 pb-2 px-4" style="min-height:69.2px">
                    <h5 style="position:absolute;top: 25px;">Laporan Guru Matpel</h5>
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
                                        <x-inp-filter kode="kode_pp" nama="PP" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="kode_ta" nama="Tahun Ajaran" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="nik_guru" nama="NIK Guru" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="kode_kelas" nama="Kelas" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="kode_matpel" nama="Mata Pelajaran" selected="1" :option="array('1','2','3','i')"/>
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
                                        <option value="All" selected>Semua halaman</option>
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
    <div class="row mt-2 hidden scroll" id="saku-report">
        <div class="col-12 pr-0">
            <div class="card px-0 py-4" style="min-height:200px">
                <div class="border-bottom px-0 py-3 mb-2 navigation-lap hidden">
                    <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                        <ol class="breadcrumb py-0 my-0">
                            <li class="breadcrumb-item active">
                                Laporan Penilaian
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
        var $kode_pp = {
            type : "=",
            from : "{{ Session::get('kodePP') }}",
            fromname : "{{ Session::get('kodePP') }}",
            to : "",
            toname : "",
        }

        var $kode_ta = {
            type : "=",
            from : "{{ Session::get('kode_ta') }}",
            fromname : "{{ Session::get('kode_ta') }}",
            to : "",
            toname : "",
        }

        var $nik_guru = {
            type : "All",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $kode_kelas = {
            type : "All",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $kode_matpel = {
            type : "All",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $aktif = "";

        var param_trace = {
            periode : "",
            kode_kelas : "",
            kode_matpel : ""
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

        $('#kode_pp-from').val("{{ Session::get('kodePP') }}");
        $('#kode_ta-from').val("{{ Session::get('kode_ta') }}");

        $('#btn-filter').click(function(e){
            $('#collapseFilter').show();
            $('#collapsePaging').hide();
            if($(this).hasClass("btn-primary")){
                $(this).removeClass("btn-primary");
                $(this).addClass("btn-light");
            }
            
            $('#btn-filter').addClass("hidden");
            $('#btn-export').addClass("hidden");
            setHeightReport();
        });
        
        $('#btn-tutup').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
            setHeightReport();
        });

        $('#btn-tampil').click(function(e){
            $('#collapseFilter').hide();
            $('#collapsePaging').show();
            $('#btn-filter').addClass("btn-primary");
            $('#btn-filter').removeClass("btn-light");
            $('#btn-filter').removeClass("hidden");
            $('#btn-export').removeClass("hidden");
            setHeightReport();
        });

        $('.selectize').selectize();

        $('#inputFilter').reportFilter({
            kode : ['kode_pp','kode_ta','nik_guru','kode_kelas','kode_matpel'],
            nama : ['PP','Tahun Ajaran','NIK Guru','Kelas','Mata Pelajaran'],
            header : [['Kode', 'Nama'],['Kode','Nama'],['Kode','Nama'],['Kode','Nama'],['Kode','Nama']],
            headerpilih : [['Kode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action']],
            columns: [
                [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ],[
                    { data: 'kode_ta' },
                    { data: 'nama' }
                ],[
                    { data: 'nik' },
                    { data: 'nama' }
                ],[
                    { data: 'kode_kelas' },
                    { data: 'nama' }
                ],[
                    { data: 'kode_matpel' },
                    { data: 'nama' }
                ]
            ],
            url :["{{ url('sekolah-report/filter-pp') }}","{{ url('sekolah-report/filter-ta') }}","{{ url('sekolah-report/filter-guru') }}","{{ url('sekolah-report/filter-kelas') }}","{{ url('sekolah-report/filter-matpel') }}"],
            parameter:[{},{
                'kode_pp[0]' : $kode_pp.type,
                'kode_pp[1]' : $kode_pp.from,
                'kode_pp[2]' : $kode_pp.to,
                'flag_aktif[0]' : '=',
                'flag_aktif[1]' : '1',
                'flag_aktif[2]' : ''
            },{
                'kode_pp[0]' : $kode_pp.type,
                'kode_pp[1]' : $kode_pp.from,
                'kode_pp[2]' : $kode_pp.to
            },{
                'kode_pp[0]' : $kode_pp.type,
                'kode_pp[1]' : $kode_pp.from,
                'kode_pp[2]' : $kode_pp.to,
                'flag_aktif[0]' : '=',
                'flag_aktif[1]' : '1',
                'flag_aktif[2]' : '',
                'nik_guru[0]' : $nik_guru.type,
                'nik_guru[1]' : $nik_guru.from,
                'nik_guru[2]' : $nik_guru.to
            },{
                ,{
                'kode_pp[0]' : $kode_pp.type,
                'kode_pp[1]' : $kode_pp.from,
                'kode_pp[2]' : $kode_pp.to,
                'flag_aktif[0]' : '=',
                'flag_aktif[1]' : '1',
                'flag_aktif[2]' : '',
                'nik_guru[0]' : $nik_guru.type,
                'nik_guru[1]' : $nik_guru.from,
                'nik_guru[2]' : $nik_guru.to,
                'kode_kelas[0]' : $kode_kelas.type,
                'kode_kelas[1]' : $kode_kelas.from,
                'kode_kelas[2]' : $kode_kelas.to
            },
            }],
            orderby:[[],[],[],[],[]],
            width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
            display:['kode','kode','kode','kode','kode']
            
        });

        $('#inputFilter').on('change','input',function(e){
            setTimeout(() => {
                $('#inputFilter').reportFilter({
                    kode : ['kode_pp','kode_ta','kode_matpel','kode_kelas','kode_sem'],
                    nama : ['PP','Tahun Ajaran','Mata Pelajaran','Kelas','Semester'],
                    header : [['Kode', 'Nama'],['Kode','Nama'],['Kode','Nama'],['Kode','Nama'],['Kode','Nama']],
                    headerpilih : [['Kode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action']],
                    columns: [
                        [
                            { data: 'kode_pp' },
                            { data: 'nama' }
                        ],[
                            { data: 'kode_ta' },
                            { data: 'nama' }
                        ],[
                            { data: 'kode_matpel' },
                            { data: 'nama' }
                        ],[
                            { data: 'kode_kelas' },
                            { data: 'nama' }
                        ],[
                            { data: 'kode_sem' },
                            { data: 'nama' }
                        ]
                    ],
                    url :["{{ url('sekolah-report/filter-pp') }}","{{ url('sekolah-report/filter-ta') }}","{{ url('sekolah-report/filter-matpel') }}","{{ url('sekolah-report/filter-kelas') }}","{{ url('sekolah-report/filter-semester') }}"],
                    parameter:[{},{
                        'kode_pp[0]' : $kode_pp.type,
                        'kode_pp[1]' : $kode_pp.from,
                        'kode_pp[2]' : $kode_pp.to,
                        'flag_aktif[0]' : '=',
                        'flag_aktif[1]' : '1',
                        'flag_aktif[2]' : ''
                    },{
                        'kode_pp[0]' : $kode_pp.type,
                        'kode_pp[1]' : $kode_pp.from,
                        'kode_pp[2]' : $kode_pp.to,
                        'flag_aktif[0]' : '=',
                        'flag_aktif[1]' : '1',
                        'flag_aktif[2]' : ''
                    },{
                        'kode_pp[0]' : $kode_pp.type,
                        'kode_pp[1]' : $kode_pp.from,
                        'kode_pp[2]' : $kode_pp.to,
                        'flag_aktif[0]' : '=',
                        'flag_aktif[1]' : '1',
                        'flag_aktif[2]' : '',
                        'kode_matpel[0]' : $kode_matpel.type,
                        'kode_matpel[1]' : $kode_matpel.from,
                        'kode_matpel[2]' : $kode_matpel.to
                    },{}],
                    orderby:[[],[],[],[],[]],
                    width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
                    display:['kode','kode','kode','kode','kode']
                    
                });
            }, 500);
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("kode_pp[]",$kode_pp.type);
            $formData.append("kode_pp[]",$kode_pp.from);
            $formData.append("kode_pp[]",$kode_pp.to);
            $formData.append("kode_ta[]",$kode_ta.type);
            $formData.append("kode_ta[]",$kode_ta.from);
            $formData.append("kode_ta[]",$kode_ta.to);
            $formData.append("kode_kelas[]",$kode_kelas.type);
            $formData.append("kode_kelas[]",$kode_kelas.from);
            $formData.append("kode_kelas[]",$kode_kelas.to);
            $formData.append("nik_guru[]",$nik_guru.type);
            $formData.append("nik_guru[]",$nik_guru.from);
            $formData.append("nik_guru[]",$nik_guru.to);
            $formData.append("kode_matpel[]",$kode_matpel.type);
            $formData.append("kode_matpel[]",$kode_matpel.from);
            $formData.append("kode_matpel[]",$kode_matpel.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('sekolah-auth/form/rptGuruMatpel') }}";
            $('#saku-report #canvasPreview').load(xurl);
            setHeightReport();
        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("kode_pp[]",$kode_pp.type);
            $formData.append("kode_pp[]",$kode_pp.from);
            $formData.append("kode_pp[]",$kode_pp.to);
            $formData.append("kode_ta[]",$kode_ta.type);
            $formData.append("kode_ta[]",$kode_ta.from);
            $formData.append("kode_ta[]",$kode_ta.to);
            $formData.append("kode_kelas[]",$kode_kelas.type);
            $formData.append("kode_kelas[]",$kode_kelas.from);
            $formData.append("kode_kelas[]",$kode_kelas.to);
            $formData.append("nik_guru[]",$nik_guru.type);
            $formData.append("nik_guru[]",$nik_guru.from);
            $formData.append("nik_guru[]",$nik_guru.to);
            $formData.append("kode_matpel[]",$kode_matpel.type);
            $formData.append("kode_matpel[]",$kode_matpel.from);
            $formData.append("kode_matpel[]",$kode_matpel.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('sekolah-auth/form/rptGuruMatpel') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#sai-rpt-print').click(function(){
            $('#saku-report #canvasPreview').printThis({
                removeInline: true,
                importStyle: true,
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
                name: "Neraca_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "Neraca_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
            $formData.append("kode_pp[]",$kode_pp.type);
            $formData.append("kode_pp[]",$kode_pp.from);
            $formData.append("kode_pp[]",$kode_pp.to);
            $formData.append("kode_ta[]",$kode_ta.type);
            $formData.append("kode_ta[]",$kode_ta.from);
            $formData.append("kode_ta[]",$kode_ta.to);
            $formData.append("kode_kelas[]",$kode_kelas.type);
            $formData.append("kode_kelas[]",$kode_kelas.from);
            $formData.append("kode_kelas[]",$kode_kelas.to);
            $formData.append("nik_guru[]",$nik_guru.type);
            $formData.append("nik_guru[]",$nik_guru.from);
            $formData.append("nik_guru[]",$nik_guru.to);
            $formData.append("kode_matpel[]",$kode_matpel.type);
            $formData.append("kode_matpel[]",$kode_matpel.from);
            $formData.append("kode_matpel[]",$kode_matpel.to);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('sekolah-report/send-laporan') }}",
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