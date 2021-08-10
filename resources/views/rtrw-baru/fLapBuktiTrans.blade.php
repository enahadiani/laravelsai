    <link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Bukti Transaksi"/>
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
        
        $('#periode-from').val(namaPeriode("{{ Session::get('periode') }}"));

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
            kode : ['periode','modul','no_bukti'],
            nama : ['Periode','Modul','No Bukti'],
            header : [['Periode', 'Nama'],['Kode'],['No Bukti','Keterangan']],
            headerpilih : [['Periode', 'Nama','Action'],['Kode','Action'],['No Bukti','Keterangan','Action']],
            columns: [
                [
                    { data: 'periode' },
                    { data: 'nama' }
                ],[
                    { data: 'kode' }
                ],[
                    { data: 'no_bukti' },
                    { data: 'keterangan' }
                ]
            ],
            url :["{{ url('rtrw-report/filter-periode-keu') }}","{{ url('rtrw-report/filter-modul') }}","{{ url('rtrw-report/filter-bukti-trans') }}"],
            parameter:[{},{},{
                'periode[0]':$periode.type,
                'periode[1]':$periode.from,
                'periode[2]':$periode.to,
                'modul[0]':$modul.type,
                'modul[1]':$modul.from,
                'modul[2]':$modul.to,
            },{}],
            orderby:[[[0,"desc"]],[],[[0,"asc"]]],
            width:[['30%','70%'],['30%','70%'],['30%','70%']],
            display:['name','kode','kode'],
            pageLength:[12,10,10]
        });

        $('#inputFilter').on('change','input',function(e){
            setTimeout(() => {
                var periode = $periode;
                var modul = $modul;
                generateRptFilter('#inputFilter',{
                    kode : ['periode','modul','no_bukti'],
                    nama : ['Periode','Modul','No Bukti'],
                    header : [['Periode', 'Nama'],['Kode'],['No Bukti','Keterangan']],
                    headerpilih : [['Periode', 'Nama','Action'],['Kode','Action'],['No Bukti','Keterangan','Action']],
                    columns: [
                        [
                            { data: 'periode' },
                            { data: 'nama' }
                        ],[
                            { data: 'kode' }
                        ],[
                            { data: 'no_bukti' },
                            { data: 'keterangan' }
                        ]
                    ],
                    url :["{{ url('rtrw-report/filter-periode-keu') }}","{{ url('rtrw-report/filter-modul') }}","{{ url('rtrw-report/filter-bukti-trans') }}"],
                    parameter:[{},{},{
                        'periode[0]':periode.type,
                        'periode[1]':periode.from,
                        'periode[2]':periode.to,
                        'modul[0]':modul.type,
                        'modul[1]':modul.from,
                        'modul[2]':modul.to,
                    },{}],
                    orderby:[[[0,"desc"]],[],[[0,"asc"]]],
                    width:[['30%','70%'],['30%','70%'],['30%','70%']],
                    display:['name','kode','kode'],
                    pageLength:[12,10,10]
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
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('rtrw-auth/form/rptBuktiTrans') }}";
            
            $('#saku-report #canvasPreview').load(xurl);
            $('#scroll-bottom').show();

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
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('rtrw-auth/form/rptBuktiTrans') }}";
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
                name: "BuktiTrans_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "BuktiTrans_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        });

        $("#sai-rpt-pdf").click(function(e) {
            e.preventDefault();
            var link = "{{ url('rtrw-report/lap-bukti-trans-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&modul[]="+$modul.type+"&modul[]="+$modul.from+"&modul[]="+$modul.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to;
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
                    formData.append("text","Berikut ini kami lampiran Bukti Transaksi:");
                    formData.append("subject","Laporan Bukti Transaksi ");
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