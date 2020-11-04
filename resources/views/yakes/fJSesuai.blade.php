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
                                        <x-sai-input label="Tanggal" id="tanggal" name="tanggal" tipe="text" class="datepicker" :icon="array('class'=> 'simple-icon-calendar') " attr="required"  value=""/>
                                    </div>
                                    <div class="col-md-6 col-sm-12" style="min-height:64px">
                                        <x-sai-input label="No Dokumen" id="no_dokumen" name="no_dokumen" tipe="text" class="" attr="required" value=""/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <x-sai-text label="Keterangan" id="deskripsi" name="deskripsi" class="" attr="required rows=4 "  value="" />
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
    <script src="{{ asset('showFilter.js') }}"></script>
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

    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hitungTotal(){
        var total_d = 0;
        var total_k = 0;

        $('.row-grid').each(function(){
            var dc = $(this).closest('tr').find('.td-dc').text();
            var nilai = $(this).closest('tr').find('.inp-nilai').val();
            if(dc == "D"){
                total_d += +toNilai(nilai);
            }else{
                total_k += +toNilai(nilai);
            }
        });

        $('#total_debet').val(total_d);
        $('#total_kredit').val(total_k);   
    }

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

    function getDataTypeAhead(url,param,kode){
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        eval('$dt'+param+'['+i+'] = '+JSON.stringify({id:eval('result.daftar['+i+'].'+kode),name:result.daftar[i].nama}));  
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

    getDataTypeAhead("{{ url('yakes-master/helper-pp') }}","PP","kode_pp");
    getDataTypeAhead("{{ url('yakes-master/helper-fs') }}","FS","kode_fs");
    getDataTypeAhead("{{ url('yakes-master/helper-akun') }}","Akun","kode_akun");

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
        addRowGrid("dua");
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
    function addRowGrid(param) {
        if(param == "copy"){
            var kode_akun = $('#input-grid tbody tr.selected-row').find(".inp-kode").val();
            var nama_akun = $('#input-grid tbody tr.selected-row').find(".inp-nama").val();
            var dc = $('#input-grid tbody tr.selected-row').find(".td-dc").text();
            var keterangan = $('#input-grid tbody tr.selected-row').find(".inp-ket").val();
            var nilai = $('#input-grid tbody tr.selected-row').find(".inp-nilai").val();
            var kode_pp = $('#input-grid tbody tr.selected-row').find(".inp-pp").val();
            var nama_pp = $('#input-grid tbody tr.selected-row').find(".inp-nama_pp").val();
            var kode_fs = $('#input-grid tbody tr.selected-row').find(".inp-fs").val();
            var nama_fs = $('#input-grid tbody tr.selected-row').find(".inp-nama_fs").val();
        }else{
            var kode_akun = "";
            var nama_akun = "";
            var dc = "";
            var keterangan = "";
            var nilai = "";
            var kode_pp = "";
            var nama_pp = "";
            var kode_fs = "";
            var nama_fs = "";
        }

        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'><span class='no-grid'>"+no+"</span><input type='hidden' name='no_urut[]' value='"+no+"'></td>";
        input += "<td class='text-center'><a class=' hapus-item' style='font-size:12px'><i class='simple-icon-trash'></i></a>&nbsp;</td>";
        input += "<td><span class='td-kode tdakunke"+no+" tooltip-span'>"+kode_akun+"</span><input autocomplete='off' type='text' name='kode_akun[]' class='form-control inp-kode akunke"+no+" hidden' value='"+kode_akun+"' required='' style='z-index: 1;position: relative;'  id='akunkode"+no+"'><a href='#' class='search-item search-akun search-akunke"+no+" hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama tdnmakunke"+no+" tooltip-span'>"+nama_akun+"</span><input autocomplete='off' type='text' name='nama_akun[]' class='form-control inp-nama nmakunke"+no+" hidden'  value='"+nama_akun+"' readonly></td>";
        input += "<td><span class='td-dc tddcke"+no+" tooltip-span'></span><select hidden name='dc[]' class='form-control inp-dc dcke"+no+"' value='' required><option value='D'>D</option><option value='C'>C</option></select></td>";
        input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+keterangan+"</span><input autocomplete='off' type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+keterangan+"' required></td>";
        input += "<td class='text-right'><span class='td-nilai tdnilke"+no+" tooltip-span'>"+nilai+"</span><input autocomplete='off' type='text' name='nilai[]' class='form-control inp-nilai nilke"+no+" hidden'  value='"+nilai+"' required></td>";
        input += "<td><span class='td-pp tdppke"+no+" tooltip-span'>"+kode_pp+"</span><input autocomplete='off' type='text'  id='ppkode"+no+"' name='kode_pp[]' class='form-control inp-pp ppke"+no+" hidden' value='"+kode_pp+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-pp search-ppke"+no+" hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_pp tdnmppke"+no+" tooltip-span'>"+nama_pp+"</span><input autocomplete='off' type='text' name='nama_pp[]' class='form-control inp-nama_pp nmppke"+no+" hidden'  value='"+nama_pp+"' readonly></td>";
        input += "<td><span class='td-fs tdfske"+no+" tooltip-span'>"+kode_fs+"</span><input autocomplete='off' type='text'  id='fskode"+no+"' name='kode_fs[]' class='form-control inp-fs fske"+no+" hidden' value='"+kode_fs+"' required=''  style='z-index: 1;position: relative;'><a href='#' class='search-item search-fs search-fske"+no+" hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a></td>";
        input += "<td><span class='td-nama_fs tdnmfske"+no+" tooltip-span'>"+nama_fs+"</span><input autocomplete='off' type='text' name='nama_fs[]' class='form-control inp-nama_fs nmfske"+no+" hidden'  value='"+nama_fs+"' readonly></td>";
        input += "</tr>";

        $('#input-grid tbody').append(input);
        
        // if(param != "copy"){
            $('.row-grid:last').addClass('selected-row');
            $('#input-grid tbody tr').not('.row-grid:last').removeClass('selected-row');
        // }
        $('.dcke'+no).selectize({
            selectOnTab:true,
            onChange: function(value) {
                $('.tddcke'+no).text(value);
                hitungTotal();
            }
        });
        $('.selectize-control.dcke'+no).addClass('hidden');
        $('.nilke'+no).inputmask("numeric", {
            radixPoint: ",",
            groupSeparator: ".",
            digits: 2,
            autoGroup: true,
            rightAlign: true,
            oncleared: function () { self.Value(''); }
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
        $('#fskode'+no).typeahead({
            source:$dtFS,
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

        $(".search-ppke"+no).showFilter({
            title: 'Daftar PP',
            url: "{{ url('yakes-master/helper-pp') }}",
            header:['Kode','Nama'],
            columns:[
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
            parameter:{},
            onItemSelected: function(data){
                $(".ppke"+no).val(data.kode_pp);
                $(".tdppke"+no).text(data.kode_pp);
                $(".nmppke"+no).val(data.nama);
                $(".tdnmppke"+no).text(data.nama);
                $(".ppke"+no).hide();
                $(".tdppke"+no).show();
                $(".search-ppke"+no).hide();
                $(".nmppke"+no).show();
                $(".tdnmppke"+no).hide();
                setTimeout(function() {  $(".nmppke"+no).focus(); }, 100);
            }
        });

        $(".search-akunke"+no).showFilter({
            title: 'Daftar Akun',
            url: "{{ url('yakes-master/helper-akun') }}",
            header:['Kode','Nama'],
            columns:[
                        { data: 'kode_akun' },
                        { data: 'nama' }
                    ],
            parameter:{},
            onItemSelected: function(data){
                $(".akunke"+no).val(data.kode_akun);
                $(".tdakunke"+no).text(data.kode_akun);
                $(".nmakunke"+no).val(data.nama);
                $(".tdnmakunke"+no).text(data.nama);
                $(".akunke"+no).hide();
                $(".tdakunke"+no).show();
                $(".search-akunke"+no).hide();
                $(".nmakunke"+no).show();
                $(".tdnmakunke"+no).hide();
                setTimeout(function() {  $(".tddcke"+no).click(); }, 100);
            }
        });

        $(".search-fske"+no).showFilter({
            title: 'Daftar FS',
            url: "{{ url('yakes-master/helper-fs') }}",
            header:['Kode','Nama'],
            columns:[
                        { data: 'kode_fs' },
                        { data: 'nama' }
                    ],
            parameter:{},
            onItemSelected: function(data){
                $(".fske"+no).val(data.kode_fs);
                $(".tdfske"+no).text(data.kode_fs);
                $(".nmfske"+no).val(data.nama);
                $(".tdnmfske"+no).text(data.nama);
                $(".fske"+no).hide();
                $(".tdfske"+no).show();
                $(".search-fske"+no).hide();
                $(".nmfske"+no).show();
                $(".tdnmfske"+no).hide();
                setTimeout(function() {  $(".nmfske"+no).focus(); }, 100);
            }
        });

        if(param == "satu"){

            $('#input-grid td').removeClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
            $('#input-grid tbody tr:last').find(".inp-kode").show();
            $('#input-grid tbody tr:last').find(".td-kode").hide();
            $('#input-grid tbody tr:last').find(".search-akun").show();
            $('#input-grid tbody tr:last').find(".inp-kode").focus();
        } 
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });

        hitungTotalRow();
        hideUnselectedRow();
    }

    $('#form-tambah').on('click', '.add-row', function(){
        addRowGrid("satu");
    });

    $('#input-grid').on('keydown','.inp-kode, .inp-nama, .inp-dc, .inp-ket, .inp-nilai, .inp-pp, .inp-nama_pp,.inp-fs, .inp-nama_fs',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode','.inp-nama','.inp-dc','.inp-ket','.inp-nilai','.inp-pp','.inp-nama_pp','.inp-fs','.inp-nama_fs'];
        var nxt2 = ['.td-kode','.td-nama','.td-dc','.td-ket','.td-nilai','.td-pp','.td-nama_pp','.td-fs','.td-nama_fs'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-2;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                    var noidx = $(this).parents("tr").find("span.no-grid").text();
                    var kode = $(this).val();
                    var target1 = "akunke"+noidx;
                    var target2 = "nmakunke"+noidx;
                    var target3 = "dcke"+noidx;
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
                case 2:
                    var isi = $(this).parents("tr").find(nxt[idx])[0].selectize.getValue();
                    if(isi == 'D' || isi == 'C'){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).parents("tr").find(nxt[idx])[0].selectize.setValue(isi);
                        $(this).parents("tr").find(nxt2[idx]).text(isi);
                        $(this).parents("tr").find(".selectize-control").hide();
                        $(this).closest('tr').find(nxt2[idx]).show();

                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                    }else{
                        alert('Posisi yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 3:
                    if($.trim($(this).val()).length){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Keterangan yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 4:
                    if(isi != "" && isi != 0){
                        $("#input-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find('.search-pp').show();
                        hitungTotal();
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
                    }
                    break;
                case 5:
                    var noidx = $(this).parents("tr").find("span.no-grid").text();
                    var kode = $(this).val();
                    var target1 = "ppke"+noidx;
                    var target2 = "nmppke"+noidx;
                    getPP(kode,target1,target2,'tab');
                    break;
                case 6:
                    console.log('PP nama');
                    console.log({nxt, nxt2, idx, kunci});
                    console.log(nxt[idx]);
                    console.log(nxt[idx_next]);
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    $(this).closest('tr').find(nxt[idx_next]).show();
                    $(this).closest('tr').find(nxt[idx_next]).focus();
                    $(this).closest('tr').find(nxt2[idx_next]).hide();
                    break;
                case 7:
                    console.log('FS');
                    var noidx = $(this).parents("tr").find("span.no-grid").text();
                    var kode = $(this).val();
                    var target1 = "fske"+noidx;
                    var target2 = "nmfske"+noidx;
                    getFS(kode,target1,target2,'tab');
                    break;
                case 8:
                    $("#input-grid td").removeClass("px-0 py-0 aktif");
                    $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                    $(this).closest('tr').find(nxt[idx]).val(isi);
                    $(this).closest('tr').find(nxt2[idx]).text(isi);
                    $(this).closest('tr').find(nxt[idx]).hide();
                    $(this).closest('tr').find(nxt2[idx]).show();
                    // $('.add-row').click();
                    var cek = $(this).parents('tr').next('tr').find('.td-kode');
                    if(cek.length > 0){
                        cek.click();
                    }else{
                        $('.add-row').click();
                    }
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

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_akun = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();
                var dc = $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text();
                var keterangan = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val();
                var nilai = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();
                var kode_pp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val();
                var nama_pp = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val();
                var kode_fs = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-fs").val();
                var nama_fs = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_fs").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_akun);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-dc")[0].selectize.setValue(dc);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").text(dc);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").val(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-ket").text(keterangan);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").val(kode_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(kode_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").val(nama_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").text(nama_pp);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-fs").val(kode_fs);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-fs").text(kode_fs);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_fs").val(nama_fs);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_fs").text(nama_fs);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-akun").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".selectize-control").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-dc").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-ket").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-ket").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_pp").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_pp").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-fs").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-fs").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-fs").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama_fs").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama_fs").show();
            }
        })
    }

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('change', '.inp-kode', function(e){
        e.preventDefault();
        console.log('test')
        var noidx =  $(this).parents('tr').find('span.no-grid').text();
        target1 = "akunke"+noidx;
        target2 = "nmakunke"+noidx;
        target3 = "dcke"+noidx;
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

    $('#input-grid').on('keypress', '.inp-dc', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue() != undefined){
                $(this)[0].selectize.setValue($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-dc')[0].selectize.getValue());
            }else{
                $(this)[0].selectize.setValue('');
            }
        }
    });

    $('#input-grid').on('keypress', '.inp-ket', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-ket').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-grid').on('keypress', '.inp-nilai', function(e){
        if (e.which == 42) {
            e.preventDefault();
            var dc = $(this).closest('tr').find('.inp-dc')[0].selectize.getValue();
            if(dc == 'D' || dc == 'C'){
                var selisih = Math.abs(toNilai($('#total_debet').val()) - toNilai($('#total_kredit').val()));
                $(this).val(selisih);
            }else{
                alert('Posisi tidak valid, harap pilih posisi akun');
                $(this).closest('tr').find('.inp-dc')[0].selectize.focus();
            }
        }
    });

    $('#input-grid').on('change', '.inp-nilai', function(){
        console.log('change-nilai');
        if($(this).closest('tr').find('.inp-nilai').val() != "" && $(this).closest('tr').find('.inp-nilai').val() != 0){
            if($(this).closest('tr').find('.inp-nilai').val() < 0) {
                var nilai = $(this).val();
                var nilaiRegex = nilai.replace(/[-]/g, '');
                $(this).val(nilaiRegex);
            }
            hitungTotal();
            $(this).closest('tr').find('.inp-pp').val();
        }
        else{
            alert('Nilai yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('change', '.inp-pp', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('span.no-grid').text();
        target1 = "ppke"+noidx;
        target2 = "nmppke"+noidx;
        if($.trim($(this).closest('tr').find('.inp-pp').val()).length){
            var kode = $(this).val();
            getPP(kode,target1,target2,'change');
        }else{
            alert('PP yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('keypress', '.inp-pp', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-pp').val());
            }else{
                $(this).val('');
            }
        }
    });

    $('#input-grid').on('change', '.inp-fs', function(e){
        e.preventDefault();
        var noidx =  $(this).closest('tr').find('span.no-grid').text();
        target1 = "fske"+noidx;
        target2 = "nmfske"+noidx;
        if($.trim($(this).closest('tr').find('.inp-fs').val()).length){
            var kode = $(this).val();
            getFS(kode,target1,target2,'change');
            // hitungTotal();
        }else{
            alert('FS yang dimasukkan tidak valid');
            return false;
        }
    });

    $('#input-grid').on('keypress', '.inp-fs', function(e){
        var this_index = $(this).closest('tbody tr').index();
        if (e.which == 42) {
            e.preventDefault();
            if($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-fs').val() != undefined){
                $(this).val($("#input-grid tbody tr:eq("+(this_index - 1)+")").find('.inp-fs').val());
            }else{
                $(this).val('');
            }
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
                console.log(idx);
                var kode_akun = $(this).parents("tr").find(".inp-kode").val();
                var nama_akun = $(this).parents("tr").find(".inp-nama").val();
                var dc = $(this).parents("tr").find(".td-dc").text();
                var keterangan = $(this).parents("tr").find(".inp-ket").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();
                var kode_pp = $(this).parents("tr").find(".inp-pp").val();
                var nama_pp = $(this).parents("tr").find(".inp-nama_pp").val();
                var kode_fs = $(this).parents("tr").find(".inp-fs").val();
                var nama_fs = $(this).parents("tr").find(".inp-nama_fs").val();
                var no = $(this).parents("tr").find("span.no-grid").text();
                $(this).parents("tr").find(".inp-kode").val(kode_akun);
                $(this).parents("tr").find(".td-kode").text(kode_akun);
                if(idx == 2){
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
                if(idx == 3){
                    $(this).parents("tr").find(".inp-nama").show();
                    $(this).parents("tr").find(".td-nama").hide();
                    $(this).parents("tr").find(".inp-nama").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama").hide();
                    $(this).parents("tr").find(".td-nama").show();
                }
        
                
                $(this).parents("tr").find(".inp-dc")[0].selectize.setValue(dc);
                $(this).parents("tr").find(".td-dc").text(dc);
                if(idx == 4){
                    $('.dcke'+no)[0].selectize.setValue(dc);
                    var dcx = $('.tddcke'+no).text();
                    if(dcx == ""){
                        $('.tddcke'+no).text('D');  
                    }
                    
                    $(this).parents("tr").find(".selectize-control").show();
                    $(this).parents("tr").find(".td-dc").hide();
                    $(this).parents("tr").find(".inp-dc")[0].selectize.focus();
                    
                }else{
                    
                    $(this).parents("tr").find(".selectize-control").hide();
                    $(this).parents("tr").find(".td-dc").show();
                }
        
                $(this).parents("tr").find(".inp-ket").val(keterangan);
                $(this).parents("tr").find(".td-ket").text(keterangan);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-ket").show();
                    $(this).parents("tr").find(".td-ket").hide();
                    $(this).parents("tr").find(".inp-ket").focus();
                }else{
                    $(this).parents("tr").find(".inp-ket").hide();
                    $(this).parents("tr").find(".td-ket").show();
                }
        
                $(this).parents("tr").find(".inp-nilai").val(nilai);
                $(this).parents("tr").find(".td-nilai").text(nilai);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-nilai").show();
                    $(this).parents("tr").find(".td-nilai").hide();
                    $(this).parents("tr").find(".inp-nilai").focus();
                }else{
                    $(this).parents("tr").find(".inp-nilai").hide();
                    $(this).parents("tr").find(".td-nilai").show();
                }
        
                $(this).parents("tr").find(".inp-pp").val(kode_pp);
                $(this).parents("tr").find(".td-pp").text(kode_pp);
                if(idx == 7){
                    $(this).parents("tr").find(".inp-pp").show();
                    $(this).parents("tr").find(".td-pp").hide();
                    $(this).parents("tr").find(".search-pp").show();
                    $(this).parents("tr").find(".inp-pp").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-pp").hide();
                    $(this).parents("tr").find(".td-pp").show();
                    $(this).parents("tr").find(".search-pp").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama_pp").val(nama_pp);
                $(this).parents("tr").find(".td-nama_pp").text(nama_pp);
                if(idx == 8){
                    
                    $(this).parents("tr").find(".inp-nama_pp").show();
                    $(this).parents("tr").find(".td-nama_pp").hide();
                    $(this).parents("tr").find(".inp-nama_pp").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_pp").hide();
                    $(this).parents("tr").find(".td-nama_pp").show();
                }

                $(this).parents("tr").find(".inp-fs").val(kode_fs);
                $(this).parents("tr").find(".td-fs").text(kode_fs);
                if(idx == 9){
                    $(this).parents("tr").find(".inp-fs").show();
                    $(this).parents("tr").find(".td-fs").hide();
                    $(this).parents("tr").find(".search-fs").show();
                    $(this).parents("tr").find(".inp-fs").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-fs").hide();
                    $(this).parents("tr").find(".td-fs").show();
                    $(this).parents("tr").find(".search-fs").hide();
                }
        
                
                $(this).parents("tr").find(".inp-nama_fs").val(nama_fs);
                $(this).parents("tr").find(".td-nama_fs").text(nama_fs);
                if(idx == 10){
                    
                    $(this).parents("tr").find(".inp-nama_fs").show();
                    $(this).parents("tr").find(".td-nama_fs").hide();
                    $(this).parents("tr").find(".inp-nama_fs").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-nama_fs").hide();
                    $(this).parents("tr").find(".td-nama_fs").show();
                }
                hitungTotal();
            }
        }
    });

    // COPY ROW //
    $('.nav-control').on('click', '#copy-row', function(){
        if($(".selected-row").length != 1){
            alert('Harap pilih row yang akan dicopy terlebih dahulu!');
            return false;
        }else{
            addRowGrid("copy");
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
        }

    });
    // END COPY ROW //

    // DELETE ROW //
    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotal();
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });
    // END DELETE ROW //

    // GRID EVENT ACTION //

    // CBBL ACTION //
   
    // END CBBL ACTION //

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
                            addRowGrid("dua");
                            
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
        editData(id);
    });

     $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#informasi').show();
        $('#judul-form').html('Edit Data Jurnal Penyesuaian');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        editData(id);
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

    // EDIT HANDLER //
    function editData(id){
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
                            var row = grid[i];
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
                            $('.dcke'+no)[0].selectize.setValue(row.dc);
                            $('.selectize-control.dcke'+no).addClass('hidden');
                            $('.nilke'+no).inputmask("numeric", {
                                radixPoint: ",",
                                groupSeparator: ".",
                                digits: 2,
                                autoGroup: true,
                                rightAlign: true,
                                oncleared: function () { self.Value(''); }
                            });

                            $(".search-ppke"+no).showFilter({
                                title: 'Daftar PP',
                                url: "{{ url('yakes-master/helper-pp') }}",
                                header:['Kode','Nama'],
                                columns:[
                                            { data: 'kode_pp' },
                                            { data: 'nama' }
                                        ],
                                parameter:{},
                                onItemSelected: function(data){
                                    $(".ppke"+no).val(data.kode_pp);
                                    $(".tdppke"+no).text(data.kode_pp);
                                    $(".nmppke"+no).val(data.nama);
                                    $(".tdnmppke"+no).text(data.nama);
                                    $(".ppke"+no).hide();
                                    $(".tdppke"+no).show();
                                    $(".search-ppke"+no).hide();
                                    $(".nmppke"+no).show();
                                    $(".tdnmppke"+no).hide();
                                    setTimeout(function() {  $(".nmppke"+no).focus(); }, 100);
                                }
                            });

                            $(".search-akunke"+no).showFilter({
                                title: 'Daftar Akun',
                                url: "{{ url('yakes-master/helper-akun') }}",
                                header:['Kode','Nama'],
                                columns:[
                                            { data: 'kode_akun' },
                                            { data: 'nama' }
                                        ],
                                parameter:{},
                                onItemSelected: function(data){
                                    $(".akunke"+no).val(data.kode_akun);
                                    $(".tdakunke"+no).text(data.kode_akun);
                                    $(".nmakunke"+no).val(data.nama);
                                    $(".tdnmakunke"+no).text(data.nama);
                                    $(".akunke"+no).hide();
                                    $(".tdakunke"+no).show();
                                    $(".search-akunke"+no).hide();
                                    $(".nmakunke"+no).show();
                                    $(".tdnmakunke"+no).hide();
                                    setTimeout(function() {  $(".tddcke"+no).click(); }, 100);
                                }
                            });

                            $(".search-fske"+no).showFilter({
                                title: 'Daftar FS',
                                url: "{{ url('yakes-master/helper-fs') }}",
                                header:['Kode','Nama'],
                                columns:[
                                            { data: 'kode_fs' },
                                            { data: 'nama' }
                                        ],
                                parameter:{},
                                onItemSelected: function(data){
                                    $(".fske"+no).val(data.kode_fs);
                                    $(".tdfske"+no).text(data.kode_fs);
                                    $(".nmfske"+no).val(data.nama);
                                    $(".tdnmfske"+no).text(data.nama);
                                    $(".fske"+no).hide();
                                    $(".tdfske"+no).show();
                                    $(".search-fske"+no).hide();
                                    $(".nmfske"+no).show();
                                    $(".tdnmfske"+no).hide();
                                    setTimeout(function() {  $(".nmfske"+no).focus(); }, 100);
                                }
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
            }
        });
    }
    // END DELETE HANDLER //
    </script>