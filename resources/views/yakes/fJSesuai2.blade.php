<link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Jurnal Penyesuaian" tambah="true" :thead="array('No Bukti','Tanggal','No Dokumen','Deskripsi','Nilai','Action')" :thwidth="array(15,10,15,35,15,10)" :thclass="array('','','','','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h5 id="judul-form" style="position:absolute;top:25px"></h5>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-light ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Keluar</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="text" id="id" name="id" readonly hidden>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <x-sai-input label="Tanggal" id="tanggal" name="tanggal" tipe="text" class="datepicker" :icon="array('class'=> 'simple-icon-calendar') " attr="required" />
                                    </div>
                                    <div class="col-md-6 col-sm-12" style="min-height:64px">
                                        <x-sai-input label="No Dokumen" id="no_dokumen" name="no_dokumen" tipe="text" class="" attr="required" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <x-sai-text label="Keterangan" id="deskripsi" name="deskripsi" class="" attr="required rows=4 " />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6" style="min-height:64px">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <x-sai-input label="Total Debet" id="total_debet" name="total_debet" tipe="text" class="curreny" attr="required readonly" value="0" />
                                        <x-sai-input label="Total Kredit" id="total_kredit" name="total_kredit" tipe="text" class="curreny" attr="required readonly" value="0"/>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 nav-grid" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Jurnal</span></a> </li>
                            <li class="nav-item" id="informasi"> <a class="nav-link" data-toggle="tab" href="#data-informasi" role="tab" aria-selected="true"><span class="hidden-xs-down">Informasi</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-grid" role="tabpanel">
                                <div class='col-xs-12 nav-control'>
                                    <a type="button" href="#" id="copy-row" data-toggle="tooltip" title="Copy Row" style='font-size:18px'><i class='iconsminds-duplicate-layer' ></i> <span style="font-size:12.8px">Copy Row</span></a>
                                    <span class="pemisah mx-1"></span>
                                    <div class="dropdown d-inline-block mx-0">
                                        <a class="btn dropdown-toggle mb-1 px-0" href="#" role="button" id="dropdown-import" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style='font-size:18px'>
                                        <i class='simple-icon-doc' ></i> <span style="font-size:12.8px">Import Excel <i class='simple-icon-arrow-down' style="font-size:10px"></i></span> 
                                        </a>
                                        <div class="dropdown-menu dropdown-import" aria-labelledby="dropdown-import" x-placement="bottom-start" >
                                            <a class="dropdown-item" href="{{ config('api.url').'toko-auth/storage/template_upload_jurnal_esaku.xlsx' }}" target='_blank' id="download-template" >Download Template</a>
                                            <a class="dropdown-item" href="#" id="import-excel" >Upload</a>
                                        </div>
                                    </div>
                                    <a class="total-row"><span id="total-row" ></span></a>
                                </div>
                                <div class='col-xs-12 px-0 py-0 mx-0 my-0' id='sai-input-grid' style='min-height:420px;'>
                                    <x-sai-grid id="input-grid" :thead="array('No','','Kode Akun','Nama Akun','DC','Keterangan','Nilai','Kode PP','Nama PP','Kode FS','Nama FS')" :thwidth="array(3,3,8,15,5,13,15,8,15,8,15)" />
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                </div>
                            </div>
                            <div class="tab-pane" id="data-informasi" role="tabpanel">
                                <x-sai-grid id="informasi-grid" :thead="array('No Bukti','Periode','NIK Input','Tanggal Input')" :thwidth="array(25,25,25,25)" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->
    
    @include('komponen.modal_search')
    @include('komponen.modal_upload')

    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script src="{{ asset('saiGrid.js') }}"></script>

    <script type="text/javascript">
    // DEFAULT SETTING //
    $('#process-upload').addClass('disabled');
    $('#process-upload').prop('disabled', true);
    
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $dtPP = [];
    var $dtAkun = [];
    var $dtFS = [];
    var $noBukti = null;
    var $periode = null;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    getDataPP();
    getDataAkun();
    getDataFS();
    // END DEFAULT SETTING //

    // FORM SETTINGS//
    $("input.datepicker").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        },
        onSelect: function() {
            $(this).change();
        }
    });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    $('.selectize').selectize(); 
    // END FORM SETTINGS //

    // FUNCTION HELPERS //

    function InformasiJurnal(id,periode,nik,tgl) {
        var input = "";
        input += "<tr>";
        input += "<td class='text-center'>"+id+"</td>";
        input += "<td class='text-center'>"+periode+"</td>";
        input += "<td class='text-center'>"+nik+"</td>";
        input += "<td class='text-center'>"+tgl+"</td>";
        input += "</tr>";

        $('#informasi-grid tbody').append(input);
    }
    // END FUNCTION HELPERS //

    // FUNCTION GET DATA //
    function getTanggalServer(){
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/helper-tanggal') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.daftar.status) {
                    var split = (result.daftar.data[0].tglnow).split(' ');
                    var tanggal = split[0].split('-');
                    var date = tanggal[2]+"/"+tanggal[1]+"/"+tanggal[0];
                    $('#tanggal').val(date);
                }
            }
        });
    }

    function generateBukti(){
        var tanggal = $('#tanggal').val();
        if(tanggal == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal wajib diisi dahulu!',
            })
        } else {
            $.ajax({
                type: 'GET',
                url: "{{ url('yakes-master/helper-bukti-sesuai') }}",
                dataType: 'json',
                data:{'tanggal':tanggal},
                async:false,
                success:function(result){    
                    console.log(result)
                    if(result.daftar.status) {
                        $('#no_bukti').val(result.daftar.data);
                    }
                }
            });
        }
    }

    function getDataPP() {
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/helper-pp') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        $dtPP[i] = {id:result.daftar[i].kode_pp,name:result.daftar[i].nama};  
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/yakes-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getDataFS() {
        $.ajax({
            type: 'GET',
            url: "{{ url('yakes-master/helper-fs') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        $dtFS[i] = {id:result.daftar[i].kode_fs,name:result.daftar[i].nama};  
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/yakes-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getDataAkun() {
        $.ajax({
            type:'GET',
            url:"{{ url('yakes-master/helper-akun') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        $dtAkun[i] = {id:result.daftar[i].kode_akun,name:result.daftar[i].nama};  
                    }

                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/yakes-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getAkun(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/yakes-master/helper-akun') }}/" + kode,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            // $('.'+target3)[0].selectize.focus();
                            $('.td'+target3).text('D');
                        }else{

                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-akun').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                            $('.td'+target3).text('D');
                        }
                    }
                }
                else if(!result.daftar.status && result.daftar.message == 'Unauthorized'){
                        window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode akun tidak valid');
                    }
                }
            }
        });
    }

    function getPP(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/yakes-master/helper-pp') }}/"+ kode,
            dataType: 'json',
            async:false,
            success:function(result){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                        }else{
                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-pp').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                }
                else if(!result.daftar.status && result.daftar.message == 'Unauthorized'){
                        window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode PP tidak valid');
                    }
                }
            }
        });
    }

    function getFS(id,target1,target2,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/yakes-master/helper-fs') }}/"+ kode,
            dataType: 'json',
            async:false,
            success:function(result){
                if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);
                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                        }else{
                            $("#input-grid td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-fs').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.daftar[0].nama);
                            $('.td'+target2).text(result.daftar[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                }
                else if(!result.daftar.status && result.daftar.message == 'Unauthorized'){
                        window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                }
                else{
                    if(jenis == 'change'){

                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                    }else{
                        $('.'+target1).val('');
                        $('.'+target2).val('');
                        $('.td'+target2).text('');
                        $('.'+target1).focus();
                        alert('Kode PP tidak valid');
                    }
                }
            }
        });
    }
    // END FUNCTION GET DATA //

    // EVENT ACTION //
    $('#tanggal,#no_dokumen,#keterangan').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['tanggal','no_dokumen','keterangan'];
        if (code == 13 || code == 40) { // 13 = Enter 40 = Arrow Down 38 = Up Arrow
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            $('#'+nxt[idx]).focus();
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    // END EVENT ACTION //

    // DATATABLE FUNCTION //
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    
    var dataTable = generateTable(
        "table-data",
        "{{ url('yakes-trans/jurnal-sesuai') }}", 
        [
            {   'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 5, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'tanggal', render: function(data) {
                return reverseDate2(data,'-','/');
            } },
            { data: 'no_dokumen' },
            { data: 'keterangan' },
            { data: 'nilai' }
        ],
        "{{ url('yakes-auth/sesi-habis') }}"
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END DATATABLE FUNCTION //

    // ACTION BUTTON FORM //
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('.information').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Jurnal Penyesuaian');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#input-grid tbody').html('');
        $('#saku-datatable').hide();
        $('#informasi').hide();
        $('#saku-form').show();
        getTanggalServer();
        // addRowGridDefault();
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });
    // END ACTION BUTTON FORM //

    // GRID EVENT ACTION //

    $('#sai-input-grid').saiGrid({
        'id' : 'input-grid',
        'columns' : ['kode_akun','nama_akun','dc','ket','nilai','kode_pp','nama_pp','kode_fs','nama_fs'],
        'tipe' : ['search','text','select','text','number','search','text','search','text'],
        'options' : [[],[],[{
            'text' : 'D',
            'value' : 'D',
        },{
            'text' : 'C',
            'value' : 'C',
        }],[],[],[],[],[],[]],
        'attr' :['required','required readonly','required','required','required','required','required readonly','required','required readonly'],
        'target1' : 'total_debet',
        'target2' : 'total_kredit'
    });
    // GRID EVENT ACTION //

    // SUBMIT ACTION //
     $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            var total_d = $('#total_debet').val();
            var total_k = $('#total_kredit').val();
            var jumdet = $('#input-grid tr').length;

            var param = $('#id').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/yakes-trans/jurnal-sesuai') }}/"+$noBukti+"/"+$periode;
            }else{
                var url = "{{ url('/yakes-trans/jurnal-sesuai') }}";
            }

            if(total_d != total_k){
                alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak sama');
            }else if( total_d <= 0 || total_k <= 0){
                alert('Transaksi tidak valid. Total Debet dan Total Kredit tidak boleh sama dengan 0 atau kurang');
            }else if(jumdet <= 1){
                alert('Transaksi tidak valid. Detail jurnal tidak boleh kosong ');
            }else{

                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: formData,
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false, 
                    success:function(result){
                        // alert('Input data '+result.message);
                        if(result.data.status){
                            // location.reload();
                            dataTable.ajax.reload();
                            $('#form-tambah')[0].reset();
                            $('#form-tambah').validate().resetForm();
                            $('#row-id').hide();
                            $('#method').val('post');
                            $('#judul-form').html('Tambah Data Jurnal Penyesuaian');
                            $('#id').val('');
                            $('#input-grid tbody').html('');
                            $('[id^=label]').html('');
                            addRowGridDefault();
                            
                            msgDialog({
                                id:result.data.no_bukti,
                                type:'simpan'
                            });
                                

                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                        }
                        else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                        $iconLoad.hide();
                    },
                    fail: function(xhr, textStatus, errorThrown){
                        alert('request failed:'+textStatus);
                    }
                });
            }

        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END SUBMIT ACTION //

    // EDIT ACTION //
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#informasi').show();
        $('#judul-form').html('Edit Data Jurnal Penyesuaian');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('/yakes-trans/jurnal-sesuai') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status) {
                    var form = result.data.data;
                    $noBukti = form[0].no_ju;
                    $periode = form[0].periode;
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);
                    var tgl_input = reverseDate2(form[0].tgl_input);
                    $('#tanggal').val(reverseDate2(form[0].tanggal,'-','/'));
                    $('#no_bukti').val(form[0].no_ju);
                    $('#no_dokumen').val(form[0].no_dokumen);
                    $('#deskripsi').val(form[0].keterangan);
                    $('#periode').val(form[0].periode);
                    $('#total_debet').val(parseFloat(form[0].nilai));
                    $('#total_kredit').val(parseFloat(form[0].nilai));
                    $('.information').show();
                    InformasiJurnal(form[0].no_ju,form[0].periode,form[0].nik_buat,tgl_input);
                    var grid = result.data.arrjurnal;
                    if(grid.length > 0) {
                        var input = "";
                        var no = 1;
                        for(var i=0;i<grid.length;i++) {
                            var data = grid[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' name='no_urut[]' value='"+no+"'></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+data.kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+data.kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+data.nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+data.nama_akun+"' readonly></td>";
                            input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+data.dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+data.dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
                            input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+data.keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+data.keterangan+"' required></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+format_number(parseFloat(data.nilai))+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseFloat(data.nilai)+"' required></td>";
                            input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+data.kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+data.kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+data.nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+data.nama_pp+"' readonly></td>";
                            input += "<td><span class='td-fs tdfske"+no+" tooltip-span'>"+data.kode_fs+"</span><input type='text' id='fskode"+no+"' name='kode_fs[]' class='form-control inp-fs fske"+no+" hidden' value='"+data.kode_fs+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-fs hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_fs tdnmfske"+no+" tooltip-span'>"+data.nama_fs+"</span><input type='text' name='nama_fs[]' class='form-control inp-nama_fs nmfske"+no+" hidden'  value='"+data.nama_fs+"' readonly></td>";
                            input += "</tr>";

                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        var no = 1;
                        for(var i=0;i<grid.length;i++){
                            var data = grid[i];
                            $('.dcke'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    $('.tddcke'+no).text(value);
                                    hitungTotal();
                                }
                            });
                            $('#akunkode'+no).typeahead({
                                source:$dtAkun,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });

                            $('#ppkode'+no).typeahead({
                                source:$dtPP,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            $('.dcke'+no)[0].selectize.setValue(data.dc);
                            $('.selectize-control.dcke'+no).addClass('hidden');
                            $('.nilke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                    }
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    
                    hitungTotal();
                    hitungTotalRow();
                }else if(!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                }
                $iconLoad.hide();    
            }
        });
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#informasi').show();
        $('#judul-form').html('Edit Data Jurnal Penyesuaian');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $iconLoad.show();
        $.ajax({
            type: 'GET',
            url: "{{ url('/yakes-trans/jurnal-sesuai') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status) {
                    var form = result.data.data;
                    $noBukti = form[0].no_ju;
                    $periode = form[0].periode;
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').val(id);

                    $('#tanggal').val(reverseDate2(form[0].tanggal,'-','/'));
                    $('#no_bukti').val(form[0].no_ju);
                    $('#no_dokumen').val(form[0].no_dokumen);
                    $('#deskripsi').val(form[0].keterangan);
                    $('#periode').val(form[0].periode);
                    $('#total_debet').val(parseFloat(form[0].nilai));
                    $('#total_kredit').val(parseFloat(form[0].nilai));
                    
                    $('.information').show();
                    tooltipIcon(form[0].no_ju,form[0].periode,form[0].nik_buat,tgl_input);
                    closeTooltip();
                    var grid = result.data.arrjurnal;
                    if(grid.length > 0) {
                        var input = "";
                        var no = 1;
                        for(var i=0;i<grid.length;i++) {
                            var data = grid[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' name='no_urut[]' value='"+no+"'></td>";
                            input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                            input += "<td ><span class='td-kode tdakunke"+no+" tooltip-span'>"+data.kode_akun+"</span><input type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+data.kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+data.nama_akun+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+data.nama_akun+"' readonly></td>";
                            input += "<td><span class='td-dc tddcke"+no+" tooltip-span'>"+data.dc+"</span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='"+data.dc+"' required><option value='D'>D</option><option value='C'>C</option></select></td>";
                            input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+data.keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+data.keterangan+"' required></td>";
                            input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+format_number(parseFloat(data.nilai))+"</span><input type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+parseFloat(data.nilai)+"' required></td>";
                            input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+data.kode_pp+"</span><input type='text' id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+data.kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+data.nama_pp+"</span><input type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+data.nama_pp+"' readonly></td>";
                            input += "<td><span class='td-fs tdfske"+no+" tooltip-span'>"+data.kode_fs+"</span><input type='text' id='fskode"+no+"' name='kode_fs[]' class='form-control inp-fs fske"+no+" hidden' value='"+data.kode_fs+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-fs hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                            input += "<td><span class='td-nama_fs tdnmfske"+no+" tooltip-span'>"+data.nama_fs+"</span><input type='text' name='nama_fs[]' class='form-control inp-nama_fs nmfske"+no+" hidden'  value='"+data.nama_fs+"' readonly></td>";
                            input += "</tr>";

                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        var no = 1;
                        for(var i=0;i<grid.length;i++){
                            var data = grid[i];
                            $('.dcke'+no).selectize({
                                selectOnTab:true,
                                onChange: function(value) {
                                    $('.tddcke'+no).text(value);
                                    hitungTotal();
                                }
                            });
                            $('#akunkode'+no).typeahead({
                                source:$dtAkun,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });

                            $('#ppkode'+no).typeahead({
                                source:$dtPP,
                                displayText:function(item){
                                    return item.id+' - '+item.name;
                                },
                                autoSelect:false,
                                changeInputOnSelect:false,
                                changeInputOnMove:false,
                                selectOnBlur:false,
                                afterSelect: function (item) {
                                    console.log(item.id);
                                }
                            });
                            $('.dcke'+no)[0].selectize.setValue(data.dc);
                            $('.selectize-control.dcke'+no).addClass('hidden');
                            $('.nilke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });
                            no++;
                        }
                    }
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    
                    hitungTotal();
                    hitungTotalRow();
                }else if(!result.status && result.message == 'Unauthorized') {
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                }
                $iconLoad.hide();    
            }
        });
    });
    // END EDIT ACTION //

    // BUTTON WITH SWEET ALERT //
     $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    // DELETE ACTION //
    $('#saku-datatable').on('click','#btn-delete',function(e){
        var id = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: id,
            type:'hapus'
        });
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });
    // END DELETE ACTION //

    // END BUTTON WITH SWEET ALERT //

    // PREVIEW DATA //
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){
            var id = $(this).closest('tr').find('td').eq(0).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('/yakes-trans/jurnal-sesuai') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result.data.status){
                         var form = result.data.data;
                        var html = `<tr>
                            <td style='border:none'>No Bukti</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>`+reverseDate2(form[0].tanggal,'-','/')+`</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>`+form[0].keterangan+`</td>
                        </tr>
                        <tr>
                            <td>No Dokumen</td>
                            <td>`+form[0].no_dokumen+`</td>
                        </tr>
                        <tr>
                            <td>Periode</td>
                            <td>`+form[0].periode+`</td>
                        </tr>
                        <tr>
                            <td>Total Debet</td>
                            <td>`+format_number(form[0].nilai)+`</td>
                        </tr>
                        <tr>
                            <td>Total Kredit</td>
                            <td>`+format_number(form[0].nilai)+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-ju-preview' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%; text-align:center;">No</th>
                                            <th style="width:8%; text-align:center;">Kode Akun</th>
                                            <th style="width:15%; text-align:center;">Nama Akun</th>
                                            <th style="width:5%; text-align:center;">DC</th>
                                            <th style="width:20%; text-align:center;">Keterangan</th>
                                            <th style="width:15%; text-align:center;">Nilai</th>
                                            <th style="width:8%; text-align:center;">Kode PP</th>
                                            <th style="width:15%; text-align:center;">Nama PP</th>
                                            <th style="width:8%; text-align:center;">Kode FS</th>
                                            <th style="width:15%; text-align:center;">Nama FS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>`;
                        
                        $('#table-preview tbody').html(html);
                        var grid = result.data.arrjurnal;
                        if(grid.length > 0){
                            var input = '';
                            var no = 1;
                            for(var i=0;i<grid.length;i++){
                                var line =grid[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td >"+line.kode_akun+"</td>";
                                input += "<td >"+line.nama_akun+"</td>";
                                input += "<td >"+line.dc+"</td>";
                                input += "<td >"+line.keterangan+"</td>";
                                input += "<td class='text-right'>"+format_number(line.nilai)+"</td>";
                                input += "<td >"+line.kode_pp+"</td>";
                                input += "<td >"+line.nama_pp+"</td>";
                                input += "<td >"+line.kode_fs+"</td>";
                                input += "<td >"+line.nama_fs+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-ju-preview tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                    }
                }
            });
            
        }
    });
    // END PREVIEW DATA //

    // DELETE HANDLER //
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('yakes-trans/jurnal-sesuai') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Jurnal Penyesuaian ('+id+') berhasil dihapus ');
                    $('#modal-preview-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-delete').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('yakes-auth/sesi-habis') }}";
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+result.data.message+'</a>'
                    });
                }
            }
        });
    }
    // END DELETE HANDLER //
    </script>