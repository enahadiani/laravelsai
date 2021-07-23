<link rel="stylesheet" href="{{ asset('report.css') }}" />
    <div class="row" id="saku-filter">
        <div class="col-12">
            <div class="card" >
                <x-report-header judul="Laporan Posisi Approval SPB"/>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="collapse show" id="collapseFilter">
                            <div class="px-4 pb-4 pt-2">
                                <form id="form-filter">
                                    <h6>Filter</h6>
                                    <div id="inputFilter">
                                        <!-- COMPONENT -->
                                        <x-inp-filter kode="periode" nama="Periode" selected="3" :option="array('1','2','3','i')"/>
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
    <x-report-result judul="Posisi" padding="py-4 px-0"/>

    @php
        date_default_timezone_set("Asia/Bangkok");
    @endphp
    
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script src="{{ asset('asset_dore/js/jquery-ui.min.js') }}"></script>
    <script>
        
        var bottomSheet = new BottomSheet("country-selector");
        document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
        window.bottomSheet = bottomSheet;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        // FUNCTION TAMBAHAN
        function format_number(x){
            var num = parseFloat(x).toFixed(0);
            num = sepNumX(num);
            return num;
        }
        
        var $periode = {
            type : "=",
            from : "{{ Session::get('periode') }}",
            fromname : namaPeriode("{{ Session::get('periode') }}"),
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
        
        $.fn.DataTable.ext.pager.numbers_length = 5;
        var param_trace = {
            no_bukti : ''
        };

        // $('#show').selectize();
        $('.navigation-lap').removeClass('px-0');
        $('.navigation-lap').addClass('px-3');
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

        $('#inputFilter').on('change', '.sai-rpt-filter-type', function(e){
            e.preventDefault();
            var settings = {
                kode : ['periode','no_bukti'],
                nama : ['Periode','No Bukti'],
                header : [['Periode', 'Nama'],['No Bukti','Keterangan']],
                headerpilih : [['Periode', 'Nama','Action'],['No Bukti','Keterangan','Action']],
                columns: [
                    [
                        { data: 'periode' },
                        { data: 'nama' }
                    ],[
                        { data: 'no_spb' },
                        { data: 'keterangan' }
                    ]
                ],
                url :["{{ url('siaga-report/filter-periode') }}","{{ url('siaga-report/filter-bukti-spb') }}"],
                parameter:[{},{},{
                    'periode[0]':$periode.type,
                    'periode[1]':$periode.from,
                    'periode[2]':$periode.to
                }],
                orderby:[[[0,"desc"]],[[0,"asc"]]],
                width:[['30%','70%'],['30%','70%']],
                display:['name','kode'],
                pageLength:[12,10]
            }
            var type = $(this).val();
            
            var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
            var field = eval('$'+kunci);
            var idx = settings.kode.indexOf(kunci);
            
            var target1 = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input');
            var tmp = $(this).closest('div.sai-rpt-filter-entry-row').find('div > div > input').last().attr('class');
            var tmp = tmp.split(" ");
            datepicker = tmp.includes("datepicker");
            switch(type){
                case "all":
                    
                    $aktif = '';
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('Menampilkan semua '+pilih);
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').removeClass('search-item');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('');
                    
                    field.type = "all";
                    field.from = "";
                    field.to = "";
                    field.fromname = "";
                    field.toname = "";
                    
                break;
                case "=": 
                case "<=":
                    
                    $aktif = "";
                    if(datepicker){
                        showRptDatePickerBSheet(settings,idx,target1,type,kunci);
                    }else{
                        showRptFilterBSheet(settings,idx,target1);
                    }
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val(field.fromname);
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                    field.type = type;
                    field.from = field.from;
                    field.to = "";
                    field.fromname = field.fromname;
                    field.toname = "";
                break;
                case "range":
                    
                    $aktif = $(this);
                    if(datepicker){
                        showRptDatePickerBSheet(settings,idx,target1,type,kunci,$aktif);
                    }else{
                        showRptFilterBSheet(settings,idx,target1,"range",$aktif);
                    }
                    
                break;
                case "in":
                    
                    $aktif = '';
                    
                    if(datepicker){
                        showRptDatePickerBSheet(settings,idx,target1,type,kunci);
                    }else{
                        showRptFilterBSheet(settings,idx,target1,"in");
                    }
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').removeClass('col-md-3');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from').addClass('col-md-8');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-from input').val('');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-to').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-sampai').addClass('hidden');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').addClass('search-item');
                    $(this).closest('div.sai-rpt-filter-entry-row').find('.input-group-text').text('ubah');
                    
                    field.type = "in";
                    field.from = "";
                    field.to = "";
                    field.fromname = "";
                    field.toname = "";
                    
                break;
            }
        
        });

        $('#inputFilter').on('click', '.search-item', function(e){
            e.preventDefault();
            var settings = {
                kode : ['periode','no_bukti'],
                nama : ['Periode','No Bukti'],
                header : [['Periode', 'Nama'],['No Bukti','Keterangan']],
                headerpilih : [['Periode', 'Nama','Action'],['No Bukti','Keterangan','Action']],
                columns: [
                    [
                        { data: 'periode' },
                        { data: 'nama' }
                    ],[
                        { data: 'no_spb' },
                        { data: 'keterangan' }
                    ]
                ],
                url :["{{ url('siaga-report/filter-periode') }}","{{ url('siaga-report/filter-bukti-spb') }}"],
                parameter:[{},{},{
                    'periode[0]':$periode.type,
                    'periode[1]':$periode.from,
                    'periode[2]':$periode.to
                }],
                orderby:[[[0,"desc"]],[[0,"asc"]]],
                width:[['30%','70%'],['30%','70%']],
                display:['name','kode'],
                pageLength:[12,10]
            }
            var kunci = $(this).closest('div.sai-rpt-filter-entry-row').find('.kunci').text();
            var idx = settings.kode.indexOf(kunci);
            var target1 = $(this).closest('.input-group').find('input');
            
            var type = $(this).closest('div.sai-rpt-filter-entry-row').find('.sai-rpt-filter-type')[0].selectize.getValue();
            var tmp = $(this).closest('div.sai-rpt-filter-entry-row').find('div > div > input').last().attr('class');
            var datepicker = tmp.split(" ");
            if(datepicker.includes("datepicker")){
                showRptDatePickerBSheet(settings,idx,target1,type,kunci);
            }else{

                if(type == "in"){
                    showRptFilterBSheet(settings,idx,target1,type);
                }else{
                    showRptFilterBSheet(settings,idx,target1);
                }
            }

        });    

        var $formData = "";
        $('#form-filter').submit(function(e){
            e.preventDefault();
            $formData = new FormData();
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("no_bukti[]",$no_bukti.type);
            $formData.append("no_bukti[]",$no_bukti.from);
            $formData.append("no_bukti[]",$no_bukti.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $('#saku-report').removeClass('hidden');
            xurl = "{{ url('siaga-auth/form/rptPosisiSpb') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        $('#show').change(function(e){
            $formData = new FormData();
            
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("no_bukti[]",$no_bukti.type);
            $formData.append("no_bukti[]",$no_bukti.from);
            $formData.append("no_bukti[]",$no_bukti.to);
            for(var pair of $formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            xurl = "{{ url('siaga-auth/form/rptPosisiSpb') }}";
            $('#saku-report #canvasPreview').load(xurl);
        });

        // TRACE
        $('#saku-report #canvasPreview').on('click', '.btn-history', function(e){
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
                    <a href="#" class="klik-report" data-href="posisi">Posisi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="histori">Histori App</li>
            `);
            xurl ="siaga-auth/form/rptHistoryAppSpb";
            $('#saku-report #canvasPreview').load(xurl);
            // drawLapReg(formData);
        });

        $('#saku-report #canvasPreview').on('click', '.btn-print', function(e){
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
                    <a href="#" class="klik-report" data-href="posisi">Posisi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="form">Form Justifikasi</li>
            `);
            xurl ="siaga-auth/form/rptAjuFormSpb";
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

            if(aktif == "histori" || aktif == "form"){
                xurl = "siaga-auth/form/rptPosisiSpb";
                $formData.delete('back');
                $formData.delete('no_bukti[]');
                $formData.append('no_bukti[]', $no_bukti.type);
                $formData.append('no_bukti[]', $no_bukti.from);
                $formData.append('no_bukti[]', $no_bukti.to);
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="posisi">Posisi</li>
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
            if(tujuan == "posisi"){
                $formData.delete('back');
                xurl = "siaga-auth/form/rptPosisiSpb";
                $('.breadcrumb').html('');
                $('.breadcrumb').append(`
                    <li class="breadcrumb-item active" aria-current="posisi" >Posisi</li>
                `);
                $('.navigation-lap').addClass('hidden');
            }
            $('#saku-report #canvasPreview').load(xurl);
            
        });
        // END TRACE

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
                name: "Posisi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
                filename: "Posisi_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
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
            var link = "{{ url('siaga-report/lap-posisi-pdf') }}?periode[]="+$periode.type+"&periode[]="+$periode.from+"&periode[]="+$periode.to+"&kode_pp[]="+$kode_pp.type+"&kode_pp[]="+$kode_pp.from+"&kode_pp[]="+$kode_pp.to+"&no_bukti[]="+$no_bukti.type+"&no_bukti[]="+$no_bukti.from+"&no_bukti[]="+$no_bukti.to;
            window.open(link, '_blank'); 
        });

        $('#modalEmail').on('submit','#formEmail',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $formData.append("periode[]",$periode.type);
            $formData.append("periode[]",$periode.from);
            $formData.append("periode[]",$periode.to);
            $formData.append("kode_pp[]",$kode_pp.type);
            $formData.append("kode_pp[]",$kode_pp.from);
            $formData.append("kode_pp[]",$kode_pp.to);
            $formData.append("no_bukti[]",$no_bukti.type);
            $formData.append("no_bukti[]",$no_bukti.from);
            $formData.append("no_bukti[]",$no_bukti.to);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('siaga-report/send-laporan') }}",
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