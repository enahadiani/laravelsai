<link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Kartu Iuran"/>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="rt" nama="RT" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('3')"/>
                                        <x-inp-filter kode="kode_rumah" nama="Rumah" selected="1" :option="array('1','2','3','i')"/>
                                        <x-inp-filter kode="kode_jenis" nama="Jenis Iuran" selected="3" :option="array('3')"/>
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
    <x-report-result judul="Kartu Iuran" padding="py-4 px-0"/>
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js?version=_').time() }}"></script>
    <script src="{{ asset('asset_dore/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('asset_elite/js/jquery.treegrid.js') }}"></script>
    <script>
        
        var bottomSheet = new BottomSheet("country-selector");
        document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
        window.bottomSheet = bottomSheet;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="-token"]').attr('content')
            }
        });
       
        var $periode = {
            type : "=",
            from : "{{ Session::get('periode') }}",
            fromname : namaPeriode("{{ Session::get('periode') }}"),
            to : "",
            toname : "",
        }
        var $rt = {
            type : "=",
            from : "{{ Session::get('kodePP') }}",
            fromname : "{{ Session::get('kodePP') }}",
            to : "",
            toname : "",
        }

        var $kode_rumah = {
            type : "all",
            from : "",
            fromname : "",
            to : "",
            toname : "",
        }

        var $kode_jenis = {
            type : "=",
            from : "IWAJIB",
            fromname : "IWAJIB",
            to : "",
            toname : "",
        }

        var $aktif = "";
        
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
        
        $('#rt-from').val("{{ Session::get('kodePP') }}");
        $('#periode-from').val(namaPeriode("{{ Session::get('periode') }}"));
        $('#kode_jenis-from').val("IWAJIB");

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

        generateRptFilter('#inputFilter',{
            kode : ['rt','periode','kode_rumah','kode_jenis'],
            nama : ['RT','Periode','Rumah','Jenis Iuran'],
            header : [['Kode', 'Nama'],['Periode', 'Nama'],['Kode', 'Nama'],['Kode', 'Nama']],
            headerpilih : [['Kode', 'Nama','Action'],['Periode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action']],
            columns: [
                [
                    { data: 'kode_pp' },
                    { data: 'nama' }
                ],[
                    { data: 'periode' }, 
                    { data: 'nama' }
                ],[
                    { data: 'kode_rumah' },
                    { data: 'nama' }
                ],[
                    { data: 'kode_jenis' },
                    { data: 'nama' }
                ]
            ],
            url :["{{ url('rtrw-report/filter-pp') }}","{{ url('rtrw-report/filter-periode-keu') }}","{{ url('rtrw-report/filter-rumah') }}","{{ url('rtrw-report/filter-jenis') }}"],
            parameter:[{},{},{
                'rt[0]':$rt.type,
                'rt[1]':$rt.from,
                'rt[2]':$rt.to,
            },{}],
            orderby:[[[0,"asc"]],[[0,"desc"]],[[0,"asc"]],[[0,"asc"]]],
            width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
            display:['kode','name','kode','kode'],
            pageLength:[10,12,10,10]
        });

        $('#inputFilter').on('change','input',function(e){
            setTimeout(() => {
                var rt = $rt;
                generateRptFilter('#inputFilter',{
                    kode : ['rt','periode','kode_rumah','kode_jenis'],
                    nama : ['RT','Periode','Rumah','Jenis Iuran'],
                    header : [['Kode', 'Nama'],['Periode', 'Nama'],['Kode', 'Nama'],['Kode', 'Nama']],
                    headerpilih : [['Kode', 'Nama','Action'],['Periode', 'Nama','Action'],['Kode', 'Nama','Action'],['Kode', 'Nama','Action']],
                    columns: [
                        [
                            { data: 'kode_pp' },
                            { data: 'nama' }
                        ],[
                            { data: 'periode' }, 
                            { data: 'nama' }
                        ],[
                            { data: 'kode_rumah' },
                            { data: 'nama' }
                        ],[
                            { data: 'kode_jenis' },
                            { data: 'nama' }
                        ]
                    ],
                    url :["{{ url('rtrw-report/filter-pp') }}","{{ url('rtrw-report/filter-periode-keu') }}","{{ url('rtrw-report/filter-rumah') }}","{{ url('rtrw-report/filter-jenis') }}"],
                    parameter:[{},{},{
                        'rt[0]':rt.type,
                        'rt[1]':rt.from,
                        'rt[2]':rt.to,
                    },{}],
                    orderby:[[[0,"asc"]],[[0,"desc"]],[[0,"asc"]],[[0,"asc"]]],
                    width:[['30%','70%'],['30%','70%'],['30%','70%'],['30%','70%']],
                    display:['kode','name','kode','kode'],
                    pageLength:[10,12,10,10]
                });
            }, 500);
        });

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            
            $formData = new FormData();
            $formData.append("rt[]",$rt.type);
            $formData.append("rt[]",$rt.from);
            $formData.append("rt[]",$rt.to);
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("kode_rumah[]",$kode_rumah.type);
            $formData.append("kode_rumah[]",$kode_rumah.from);
            $formData.append("kode_rumah[]",$kode_rumah.to);
            $formData.append("kode_jenis[]",$kode_jenis.type);
            $formData.append("kode_jenis[]",$kode_jenis.from);
            $formData.append("kode_jenis[]",$kode_jenis.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('rtrw-auth/form/rptKartuIuran') }}";
            
            $('#saku-report #canvasPreview').load(xurl);
            $('#scroll-bottom').show();

        });

        $('#show').change(function(e){
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("rt[]",$rt.type);
            $formData.append("rt[]",$rt.from);
            $formData.append("rt[]",$rt.to);
            $formData.append("kode_rumah[]",$kode_rumah.type);
            $formData.append("kode_rumah[]",$kode_rumah.from);
            $formData.append("kode_rumah[]",$kode_rumah.to);
            $formData.append("kode_jenis[]",$kode_jenis.type);
            $formData.append("kode_jenis[]",$kode_jenis.from);
            $formData.append("kode_jenis[]",$kode_jenis.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('rtrw-auth/form/rptKartuIuran') }}";
            $('#saku-report #canvasPreview').load(xurl);
            $('#scroll-bottom').show();
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
                name: "KartuIuran_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "KartuIuran_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        });

        $("#sai-rpt-pdf").click(function(e) {
            e.preventDefault();
            var link = "{{ url('rtrw-report/lap-kartu-iuran-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&rt[]="+$rt.type+"&rt[]="+$rt.from+"&rt[]="+$rt.to+"&kode_rumah[]="+$kode_rumah.type+"&kode_rumah[]="+$kode_rumah.from+"&kode_rumah[]="+$kode_rumah.to+"&kode_jenis[]="+$kode_jenis.type+"&kode_jenis[]="+$kode_jenis.from+"&kode_jenis[]="+$kode_jenis.to;
            window.open(link, '_blank'); 
        });

        $("#sai-rpt-email").click(function(e) {
            e.preventDefault();
            var html =`<div id='modalEmail'>
                <form id='formEmail'>
                    <div style="display: block;" class="modal-header">
                        <h6 class="modal-title my-2" style="position: absolute;height:49px">Kirim Email</h6>
                    </div>
                    <div class='modal-body' style='min-width:50vh'>
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
                </form>
                </div>`;
                $('#content-bottom-sheet').html(html);
                $('.c-bottom-sheet__sheet').css({ "width":"50%","margin-left": "25%", "margin-right":"25%"});
                
                $('#trigger-bottom-sheet').trigger("click");

                $('#modalEmail').on('submit','#formEmail',function(e){
                    e.preventDefault();
                    var formData = new FormData(this);
                    var html = `<head>`+$('head').html()+`</head><style>`+$('style').html()+`</style>
                    <body style='background:white;'>
                        <div>
                            <div class="card" id="print-area">
                                `+$('#canvasPreview').html()+`
                            </div>
                        </div>
                    </body>`;
                    formData.append("html",html);
                    formData.append("text","Berikut ini kami lampiran Kartu Iuran:");
                    formData.append("subject","Laporan Kartu Iuran ");
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('rtrw-report/send-email-report') }}",
                        dataType: 'json',
                        data: formData,
                        async:false,
                        contentType: false,
                        cache: false,
                        processData: false, 
                        success:function(result){
                            alert(result.data.message);
                            if(result.data.id != undefined){
                                $('.c-bottom-sheet').removeClass('active');
                            }
                        },
                        fail: function(xhr, textStatus, errorThrown){
                            alert('request failed:'+textStatus);
                        }
                    });
                    
                });
                
        });
    </script>