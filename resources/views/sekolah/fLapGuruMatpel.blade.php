    <link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Guru Matpel"/>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <p>Filter</p>
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
                    <x-report-paging/>
                </div>                    
            </div>
        </div>
    </div>
    <x-report-result judul="Guru Matpel" padding="px-0 py-4"/>

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
            }],
            orderby:[[],[],[],[],[]],
            width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
            display:['kode','kode','kode','kode','kode']
        });

        $('#inputFilter').on('change','input',function(e){
            setTimeout(() => {
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
                    }],
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