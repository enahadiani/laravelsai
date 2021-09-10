<link href="{{ asset('asset_elite/css/jquery.treegrid.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('report.css') }}" />
<style>
    #scroll-top
    {
        position:fixed;
        bottom:60px;
        right:25px;
        z-index:2000;
        cursor:pointer;
        width:40px;
        height:40px;
        border-radius:50%;
        background:#d7d7d7;
        padding:8px;
        opacity: 0.5;
    }
    #scroll-top:hover 
    {
        opacity: 1;
    }
    #scroll-bottom
    {
        position:fixed;
        bottom:10px;
        right:25px;
        z-index:2000;
        cursor:pointer;
        width:40px;
        height:40px;
        border-radius:50%;
        background:#d7d7d7;
        padding:8px;
        opacity: 0.5;
    }
    #scroll-bottom:hover 
    {
        opacity: 1;
    }
</style>
<div class="row" id="saku-filter">
    <div class="col-12">
        <div class="card" >
            <x-report-header judul="Laporan Surat Pengantar" />  
            <div class="separator"></div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="collapse show" id="collapseFilter">
                        <div class="px-4 pb-4 pt-2">
                            <form id="form-filter">
                                <h6>Filter</h6>
                                <div id="inputFilter">
                                    <!-- COMPONENT -->
                                    <x-inp-filter kode="tanggal" nama="Tanggal Surat" selected="1" :option="array('1','2','3','i')"/>
                                    <x-inp-filter kode="no_surat" nama="No Surat" selected="1" :option="array('1','2','3','i')"/>
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
<x-report-result judul="Surat Pengantar" padding="px-4 py-4"/>  

@php
    date_default_timezone_set("Asia/Bangkok");
@endphp
<div class="control-scroll">
<a id="scroll-bottom" class="text-center" style='display:none'><i class="simple-icon-arrow-down" style="font-size:20px"></i></a><a id="scroll-top"  style='display:none' class="text-center"><i class="simple-icon-arrow-up" style="font-size:20px"></i></a>
</div>

<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>
<script src="{{ asset('helper.js') }}"></script>
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
   
    var $tanggal = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }
    
    var $no_surat = {
        type : "all",
        from : "",
        fromname : "",
        to : "",
        toname : "",
    }
    
    
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
        kode : ['tanggal','no_surat'],
        nama : ['Tanggal','No Surat'],
        header : [['Tanggal'],['No Bukti','Keperluan','Nomor']],
        headerpilih : [['Tanggal', 'Action'],['No Bukti','Keperluan','Nomor','Action']],
        columns: [
            [
                { data: 'tanggal' }
            ],
            [
                { data: 'no_surat' },
                { data: 'keperluan' },
                { data: 'nomor' },
            ]
        ],
        url :["{{ url('rtrw-report/filter-tglsurat') }}","{{ url('rtrw-report/filter-nosurat') }}"],
        parameter:[{},{}],
        orderby:[[[0,"desc"]],[]],
        width:[['100%'],['20%','60%','20%']],
        display:['kode','kode'],
        pageLength:[10,10]
    });

    $('#inputFilter').on('change','input',function(e){
        setTimeout(() => {
            e.preventDefault();
            var tanggal = $tanggal;
            generateRptFilter('#inputFilter',{
                kode : ['tanggal','no_surat'],
                nama : ['Tanggal','No Surat'],
                header : [['Tanggal'],['No Bukti','Keperluan','Nomor']],
                headerpilih : [['Tanggal', 'Action'],['No Bukti','Keperluan','Nomor','Action']],
                columns: [
                    [
                        { data: 'tanggal' }
                    ],
                    [
                        { data: 'no_surat' },
                        { data: 'keperluan' },
                        { data: 'nomor' },
                    ]
                ],
                url :["{{ url('rtrw-report/filter-tglsurat') }}","{{ url('rtrw-report/filter-nosurat') }}"],
                parameter:[{},{
                    'tanggal[0]':tanggal.type,
                    'tanggal[1]':tanggal.from,
                    'tanggal[2]':tanggal.to,
                }],
                orderby:[[[0,"desc"]],[]],
                width:[['100%'],['20%','60%','20%']],
                display:['kode','kode'],
                pageLength:[10,10]
            });
        }, 500);
    });

    var $formData = "";
    $('#form-filter').submit(function(e){
        e.preventDefault();
        
        $formData = new FormData();
        $formData.append("tanggal[]",$tanggal.type);
        $formData.append("tanggal[]",$tanggal.from);
        $formData.append("tanggal[]",$tanggal.to);
        $formData.append("no_surat[]",$no_surat.type);
        $formData.append("no_surat[]",$no_surat.from);
        $formData.append("no_surat[]",$no_surat.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('rtrw-auth/form/rptSuratAntar') }}";
        
        $('#saku-report #canvasPreview').load(xurl);
        $('#scroll-bottom').show();

    });

    $('#show').change(function(e){
        $formData = new FormData();
        $formData.append("tanggal[]",$tanggal.type);
        $formData.append("tanggal[]",$tanggal.from);
        $formData.append("tanggal[]",$tanggal.to);
        $formData.append("no_surat[]",$no_surat.type);
        $formData.append("no_surat[]",$no_surat.from);
        $formData.append("no_surat[]",$no_surat.to);
        for(var pair of $formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        $('#saku-report').removeClass('hidden');
        xurl = "{{ url('rtrw-auth/form/rptSuratAntar') }}";

        $('#saku-report #canvasPreview').load(xurl);
        $('#scroll-bottom').show();
    });

    $('#sai-rpt-print').click(function(){
        $('#saku-report #canvasPreview').printThis({
            removeInline: false,
            importCSS: true,            // import parent page css
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
            name: "SuratAntar_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}",
            filename: "SuratAntar_{{ Session::get('userLog').'_'.Session::get('lokasi').'_'.date('dmy').'_'.date('Hi') }}.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    });

    $("#sai-rpt-pdf").click(function(e) {
        e.preventDefault();
        var link = "{{ url('rtrw-report/lap-surat-antar-pdf') }}?tahun[]="+$tanggal.type+"&tanggal[]="+$tanggal.from+"&tanggal[]="+$tanggal.to+"&no_surat[]="+$no_surat.type+"&no_surat[]="+$no_surat.from+"&no_surat[]="+$no_surat.to;
        window.open(link, '_blank'); 
    });

    $("#sai-rpt-email").click(function(e) {
        e.preventDefault();
        var html =`<div id='modalEmail'>
            <form id='formEmail'>
                <div style="display: block;" class="modal-header">
                    <h6 class="modal-title my-2" style="position: absolute;height:49px">Kirim Email</h6>
                </div>
                <div class='modal-body'>
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
                formData.append("text","Berikut ini kami lampiran Surat Pengantar:");
                formData.append("subject","Laporan Surat Pengantar ");
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
    
    $('#scroll-bottom').click(function(){
        $('html, body').animate({
            scrollTop: $("#saku-report tbody tr:last").offset().top
        }, 700);
    });

    $('#scroll-top').click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 700);
    });

    $(window).scroll(function() {
        if($(window).scrollTop() == 0){
            $('#scroll-top').hide();
            $('#scroll-bottom').show();
        }else if($(window).scrollTop() + $(window).height() == $(document).height()){
            $('#scroll-top').show();
            $('#scroll-bottom').hide();
        }
    });
</script>