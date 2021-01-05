    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Flag Relasi" tambah="" :thead="array('Kode','Nama','Action')" :thwidth="array(30,58,15)" :thclass="array('','','text-center')" />
    <!-- END LIST DATA -->

    <!-- FORM INPUT -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
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
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_flag_akun">Kode Flag Akun</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_flag_akun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_flag_akun" id="kode_flag_akun" name="kode_flag_akun" value="" title="">
                                            <span class="info-name_kode_flag_akun hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_flag_akun"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-grid" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Akun</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0">
                            <div class="tab-pane active" id="data-grid" role="tabpanel">

                                <div class='col-xs-12 nav-control' style="border: 1px solid #ebebeb;padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class='col-xs-12' style='min-height:420px; margin:0px; padding:0px;'>
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:15%">Kode Akun</th>
                                            <th style="width:77%">Nama Akun</th>
                                            <th style="width:5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm">Tambah Baris</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- FORM INPUT  -->

    @include('modal_search')
    
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    var $dtAkun = new Array();
    var $dtFlag = new Array();
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // FUNCTION TAMBAHAN
    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function showInfoField(kode,isi_kode,isi_nama){
        $('#'+kode).val(isi_kode);
        $('#'+kode).attr('style','border-left:0;border-top-left-radius: 0 !important;border-bottom-left-radius: 0 !important');
        $('.info-code_'+kode).text(isi_kode).parent('div').removeClass('hidden');
        $('.info-code_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode).removeClass('hidden');
        $('.info-name_'+kode).attr('title',isi_nama);
        $('.info-name_'+kode+' span').text(isi_nama);
        var width = $('#'+kode).width()-$('#search_'+kode).width()-10;
        var height =$('#'+kode).height();
        var pos =$('#'+kode).position();
        $('.info-name_'+kode).width(width).css({'left':pos.left,'height':height});
        $('.info-name_'+kode).closest('div').find('.info-icon-hapus').removeClass('hidden');
    }

    function getDataFlag() {
        $.ajax({
            type:'GET',
            url:"{{ url('esaku-master/flag-akun') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        $dtFlag[i] = {id:result.daftar[i].kode_flag,name:result.daftar[i].nama};  
                    }

                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getDataAkun() {
        $.ajax({
            type:'GET',
            url:"{{ url('esaku-master/flag-relasi-akun') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        $dtAkun[i] = {id:result.daftar[i].kode_akun,name:result.daftar[i].nama};  
                    }

                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
                    window.location="{{ url('/esaku-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function getForChangeFlag(par=null) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/flag-akun') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_flag == par);
                        if(filter.length > 0) {
                            $('#kode_flag_akun').val(filter[0].kode_flag);
                            $('#label_flag_akun').val(filter[0].nama);
                        } else {
                            $('#kode_flag_akun').val('');
                            $('#label_flag_akun').val('');
                            $('#kode_flag_akun').focus();
                        }
                    }
                }
            }
        });
    }
    // END FUNCTION TAMBAHAN

    // INISIASI AWAL FORM
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);
    
    jumFilter();
    // END 

    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a>";

    var dataTable = generateTable(
        "table-data",
        "{{ url('esaku-master/flag-relasi') }}", 
        [
            {'targets': 2, data: null, 'defaultContent': action_html, 'className': 'text-center' }
        ],
        [
            { data: 'kode_flag' },
            { data: 'nama' },
        ],
        "{{ url('esaku-auth/sesi-habis') }}"
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });
    // END LIST DATA


    // BUTTON WITH SWEET ALERT //
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_flag_akun').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });
    // END BUTTON WITH SWEET ALERT //

    // EVENT CHANGE //
    $('#kode_flag_akun').change(function(){
        var par = $(this).val();
        editData(par);
    });
    // END EVENT CHANGE //

    $('#form-tambah').on('click', '.search-item2', function(){ //Bukan CBBL Grid //
        var par = $(this).closest('div').find('input').attr('name');
        switch(par){
            case 'kode_flag_akun': 
                var options = { 
                    id : 'kode_flag_akun',
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/flag-akun') }}",
                    columns : [
                        { data: 'kode_flag' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Flag Akun",
                    pilih : "flag akun",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+par,
                    target2 : ".info-name_"+par,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilter(options);
    });
    //END SHOW CBBL//

    // ADD GRID ROW //
    function addRow() {
        var no = $('#input-grid .row-grid:last').index();
        no = no + 2;
        var input = "";
        input += "<tr class='row-grid no-grid'>";
        input += "<td class='text-center'>"+no+"</td>";
        input += "<td><span class='td-kode tdakunke"+no+" tooltip-span' style='display:inline-block;'></span><input type='text' style='display:none;' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'></span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='' readonly></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);
        $('.inp-kode').typeahead({
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
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRow();
        hideUnselectedRow();
    }

    $('#form-tambah').on('click', '.add-row', function(){
        addRow();
        $('#input-grid td').removeClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find(".inp-kode").show();
        $('#input-grid tbody tr:last').find(".td-kode").hide();
        $('#input-grid tbody tr:last').find(".search-akun").show();
        $('#input-grid tbody tr:last').find(".inp-kode").focus();
    })
    // END ADD GRID ROW //

    // EVENT TABLE GRID //
    $('#input-grid').on('keydown','.inp-kode',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode'];
        var nxt2 = ['.td-kode','.td-nama'];
        if (code == 13 || code == 9) { // 9 = Tab , 13 = Enter , 38 = Up Arrow
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            console.log({idx, idx_next, kunci, isi})
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
            }
        })
    }

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });
    
    $('#input-grid tbody').on('click', 'tr', function(){
        if ( $(this).hasClass('selected-row') ) {
            $(this).removeClass('selected-row');
        }
        else {
            $('#input-grid tbody tr').removeClass('selected-row');
            $(this).addClass('selected-row');
        }
    });

    $('#input-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-akun").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-akun").hide();
                    
                }
        
                $(this).parents("tr").find(".inp-nama").val(nama_akun);
                $(this).parents("tr").find(".td-nama").text(nama_akun);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }
            }
        }
    });

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jurnal').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-grid').on('click', '.search-item', function(){
        var par = $(this).closest('td').find('input').attr('name');
        var modul = '';
        var header = [];
        switch(par){
            case 'kode_akun[]': 
                var par2 = "nama_akun[]";
            break;
        }
        var tmp = $(this).closest('tr').find('input[name="'+par+'"]').attr('class');
        var tmp2 = tmp.split(" ");
        target1 = tmp2[2];

        tmp = $(this).closest('tr').find('input[name="'+par2+'"]').attr('class');
        tmp2 = tmp.split(" ");
        target2 = tmp2[2];
        
        switch(par){
            case 'kode_akun[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/flag-relasi-akun') }}",
                    columns : [
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "akun",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "."+target1,
                    target2 : "."+target2,
                    target3 : ".td"+target2,
                    target4 : "",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilter(options);
    });

    $('#input-grid').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var noidx =  $(this).parents('tr').find('.no-grid').html();
        target1 = "akunke"+noidx;
        target2 = "nmakunke"+noidx;
        target3 = "";
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            getAkun(kode,target1,target2,target3,'change');
            // $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
        }else{
            alert('Akun yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('keypress', '.inp-kode', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-kode').val());
            }else{
                $(this).val('');
            }
        }
    });

    function getAkun(id,target1,target2,target3,jenis){
        var tmp = id.split(" - ");
        kode = tmp[0];
        $.ajax({
            type: 'GET',
            url: "{{ url('/esaku-master/flag-relasi-akun') }}/"+kode,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.data.status){
                    if(typeof result.data.data !== 'undefined' && result.data.data.length>0){
                        if(jenis == 'change'){
                            $('.'+target1).val(kode);
                            $('.td'+target1).text(kode);

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                        }else{
                            $("#input-jurnal td").removeClass("px-0 py-0 aktif");
                            $('.'+target2).closest('td').addClass("px-0 py-0 aktif");

                            $('.'+target1).closest('tr').find('.search-akun').hide();
                            $('.'+target1).val(id);
                            $('.td'+target1).text(id);
                            $('.'+target1).hide();
                            $('.td'+target1).show();

                            $('.'+target2).val(result.data.data[0].nama);
                            $('.td'+target2).text(result.data.data[0].nama);
                            $('.'+target2).show();
                            $('.td'+target2).hide();
                            $('.'+target2).focus();
                        }
                    }
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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

    $('#input-grid').on('keydown','.inp-kode',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode'];
        var nxt2 = ['.td-kode'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find(".no-grid").text();
                    var kode = $(this).val();
                    var target1 = "akunke"+noidx;
                    var target2 = "nmakunke"+noidx;
                    var target3 = ""
                    getAkun(kode,target1,target2,target3,'tab');                    
                    break;
                case 1:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();

                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).closest('tr').find(nxt[idx_next])[0].selectize.focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    
                    break;
                default:
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });
    // END EVENT TABLE GRID //

    // SIMPAN DATA
    $('#form-tambah').validate({
        ignore: [],
        errorElement: "label",
        submitHandler: function (form) {
            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            var jumdet = $('#input-grid tr').length;
            var param = $('#id').val();
            var id = $('#kode_flag_akun').val();
            // $iconLoad.show();
            if(param == "edit"){
                var url = "{{ url('/esaku-master/flag-relasi') }}/"+id;
            }else{
                var url = "{{ url('/esaku-master/flag-relasi') }}";
            }
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
                            $('#judul-form').html('Tambah Data Flag Relasi');
                            $('#input-grid tbody').html('');
                            $('#method').val('put');
                            $('#id').val('edit');
                            $('input[data-input="cbbl"]').val('');
                            $('[id^=label]').html('');
                            
                            msgDialog({
                                id:id,
                                type:'simpan'
                            });
                                
                        }
                        else if(!result.data.status && result.data.message == 'Unauthorized'){
                            window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
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
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END SIMPAN

    

    // EDIT ACTION //
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/flag-relasi') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.daftar.status){
                    $('#input-grid tbody').empty();
                    $('#form-tambah').validate().resetForm();
                    
                    $('#btn-save').attr('type','button');
                    $('#btn-save').attr('id','btn-update');
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#judul-form').html('Edit Data Flag Relasi');
                    $('#kode_flag_akun').val(id);
                    var no = 1;
                    var row = "";
                    for(var i=0;i<result.daftar.detail.length;i++) {
                        var detail = result.daftar.detail[i];
                        row += "<tr class='row-grid no-grid'>";
                        row += "<td class='text-center'>"+no+"</td>";
                        row += "<td><span class='td-kode tdakunke"+no+" tooltip-span' style='display:inline-block;'>"+detail.kode_akun+"</span><input type='text' style='display:none;' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+detail.kode_akun+"' required='' style='z-index: 1;position: relative;' id='akunkode"+no+"'><a href='#' class='search-item search-akun hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
                        row += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+detail.nama+"</span><input type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+detail.nama+"' readonly></td>";
                        row += "<td class='text-center'><a class=' hapus-item' style='font-size:18px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
                        row += "</tr>";
                        no++;
                    }
                    $('#input-grid tbody').append(row);
                    $('.inp-kode').typeahead({
                        source:$dtAkun,
                        displayText:function(item){
                            return item.id+' - '+item.name;
                        },
                        autoSelect:false,
                        changeInputOnSelect:false,
                        changeInputOnMove:false,
                        selectOnBlur:false
                    });
                    $('.tooltip-span').tooltip({
                        title: function(){
                            return $(this).text();
                        }
                    });
                    hitungTotalRow();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                    showInfoField('kode_flag_akun',id,result.daftar.data[0].nama);
                }
            }
        }); 
    }
    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        editData(id);
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id = $(this).closest('tr').find('td').eq(0).html();
        editData(id);            
    });
    // END EDIT ACTION //

    // PREVIEW DATA //
    //     PREVIEW DATA
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 2){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var nama = $(this).closest('tr').find('td').eq(1).html();
            $.ajax({
                type: 'GET',
                url: "{{ url('/esaku-master/flag-relasi') }}/"+id,
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result.daftar.status){

                        var html = `<tr>
                            <td style='border:none'>Kode Flag</td>
                            <td style='border:none'>`+id+`</td>
                        </tr>
                        <tr>
                            <td>Nama Flag</td>
                            <td>`+nama+`</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <table id='table-preview-data' class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:10%">Kode Akun</th>
                                            <th style="width:18%">Nama Akun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </td>
                        </tr>`;
                        $('#table-preview tbody').html(html);
                        var det = ``;
                        if(result.daftar.detail.length > 0){
                            var input = '';
                            var no=1;
                            for(var i=0;i<result.daftar.detail.length;i++){
                                var detail = result.daftar.detail[i];
                                input += "<tr>";
                                input += "<td>"+no+"</td>";
                                input += "<td >"+detail.kode_akun+"</td>";
                                input += "<td >"+detail.nama+"</td>";
                                input += "</tr>";
                                no++;
                            }
                            $('#table-preview-data tbody').html(input);
                        }
                        $('#modal-preview-id').text(id);
                        $('#modal-preview').modal('show');
                        $('#modal-preview-judul').text('Preview Flag Relasi');
                        $('#btn-delete2').hide();
                    }
                    else if(!result.status && result.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                        }
                }
            });
        }
    });
    // END PREVIEW DATA //
    
    </script>