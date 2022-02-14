<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('asset_silo/css/trans.css') }}" />
    <!-- LIST DATA -->
    <x-list-data judul="Data Role" tambah="true" :thead="array('Kode Role', 'Regional', 'Nama Role', 'Batas Bawah', 'Batas Atas' , 'Modul', 'Aksi')" :thwidth="array(15,5,20,10,5,20,10)" :thclass="array('','','','','','','text-center')" />
    <!-- END LIST DATA -->
    <!-- FORM  -->
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <input class="form-control" type="hidden" id="id_edit" name="id_edit">
        <input type="hidden" id="method" name="_method" value="post">
        <input type="hidden" id="id" name="id">
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;min-height:62.8px">
                        <h6 id="judul-form" style="position:absolute;top:25px"></h6>
                        <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="kode">Kode Role</label>
                                        <input class="form-control" type="text" placeholder="Kode Role" id="kode" name="kode_role" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <label for="nama">Nama</label>
                                        <input class="form-control" type="text" placeholder="Nama" id="nama" name="nama" autocomplete="off" required >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="kode_pp">Regional</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                                <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                            </div>
                                            <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" autocomplete="off" name="kode_pp" data-input="cbbl" value="" title="" required readonly>
                                            <span class="info-name_kode_pp hidden">
                                                <span></span> 
                                            </span>
                                            <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                            <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="modul">Modul</label>
                                        <select class="form-control" data-width="100%" name="modul" id="modul">
                                            <option value=''>--- Pilih Modul ---</option>
                                            <option value='JK'>Justifikasi Kebutuhan</option>
                                            <option value='JP'>Justifikasi Pengadaan</option>
                                            <option value='JV'>Verifikasi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="atas">Batas Atas</label>
                                        <input class="form-control currency" type="text" placeholder="Batas Atas" id="atas" name="atas" autocomplete="off" required>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="bawah">Batas Bawah</label>
                                        <input class="form-control currency" type="text" placeholder="Batas Bawah" id="bawah" name="bawah" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs col-12 " role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-jabatan" role="tab" aria-selected="true"><span class="hidden-xs-down">Data Jabatan</span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                            <div class="tab-pane active row" id="data-jabatan" role="tabpanel">
                                <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                    <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row" ></span></a>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-condensed gridexample" id="input-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                        <thead style="background:#F8F8F8">
                                            <tr>
                                                <th style="width:3%;">No</th>
                                                <th style="width:25%;">Jabatan</th>
                                                <th style="width:5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <a type="button" href="#" data-id="0" title="add-row" class="add-row btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-form-footer-full">
                        <div class="footer-form-container-full">
                            <div class="text-right message-action">
                                <p class="text-success"></p>
                            </div>
                            <div class="action-footer">
                                <button type="submit" style="margin-top: 10px;" class="btn btn-primary btn-save"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- END FORM -->

    <!-- MODAL FILTER -->
    <div class="modal fade modal-right" id="modalFilter" tabindex="-1" role="dialog"
    aria-labelledby="modalFilter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-filter">
                    <div class="modal-header pb-0" style="border:none">
                        <h6 class="modal-title pl-0">Filter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="border:none">
                        <div class="form-group row">
                            <label>Regional</label>
                            <select class="form-control" data-width="100%" name="inp-filter_regional" id="inp-filter_regional">
                                <option value=''>--- Pilih Regional ---</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Modul</label>
                            <select class="form-control" data-width="100%" name="inp-filter_modul" id="inp-filter_modul">
                                <option value=''>--- Pilih Modul ---</option>
                                <option value='Justifikasi Kebutuhan'>Justifikasi Kebutuhan</option>
                                <option value='Justifikasi Pengadaan'>Justifikasi Pengadaan</option>
                                <option value='Verifikasi'>Verifikasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border:none">
                        <button type="button" class="btn btn-outline-primary" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btn-tampil">Tampilkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('modal_search')
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    // SET UP FORM //
    var $iconLoad = $('.preloader');
    var $target = "";
    var valid = true
    var $target2 = "";
    var $target3 = "";
    var $twicePress = 0;
    var selectRegional = $('#inp-filter_regional').selectize();
    var selectModul= $('#inp-filter_modul').selectize();
    var selectModulForm = $('#modul').selectize();
    var $dtJabatan = [];

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // Grid
    function hitungTotalRow(){
        var total_row = $('#input-grid tbody tr').length;
        $('#total-row').html(total_row+' Baris');
    }

    function hideUnselectedRow() {
        $('#input-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var kode_jab = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
                var nama_jab = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_jab);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_jab);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_jab);
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_jab);

                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-jabatan").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
                $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
            }
        })
    }

    function hideAllSelectedRow() {
        $('#input-grid tbody tr').removeClass('selected-row');
        $('#input-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#input-grid > tbody > tr').each(function(index, row) { 
            var kode_jab = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val();
            var nama_jab = $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val();

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").val(kode_jab);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").text(kode_jab);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").val(nama_jab);
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").text(nama_jab);

            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-kode").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-kode").show();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".search-jabatan").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".inp-nama").hide();
            $('#input-grid > tbody > tr:eq('+index+') > td').find(".td-nama").show();
        })
    }

    function addRowDefault() {
        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'>"
        input += "<span class='no-grid'>"+no+"</span></td>"
        input += "<td id='jabatanke"+no+"'><span id='text_jabatanke"+no+"' class='td-kode tdjabatanke"+no+" tooltip-span'></span>"
        input += "<input type='hidden' name='kode_jab[]' id='value_jabatanke"+no+"' readonly>"
        input += "<input autocomplete='off' type='text' name='jab[]' class='form-control inp-kode jabatanke"+no+" hidden' value='' style='z-index: 1;position: relative;'  id='kode_jabatanke"+no+"'>"
        input += "<a href='#' class='search-item search-jabatan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        input += "</td>"
        input += "<td class='text-center'>"
        input += "<a class=' hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>"
        input += "</td>"
        input += "</tr>";

        $('#input-grid tbody').append(input);
        $('.row-grid:last').addClass('selected-row');
        $('#kode_jabatanke'+no).typeahead({
            source:$dtJabatan,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                generateDataJabatan(item.id,null,'jabatanke'+no,'change')
            }
        });
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        hitungTotalRow();
    }

    

    function addRowGrid() {
        var no=$('#input-grid .row-grid:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-grid'>";
        input += "<td class='no-grid text-center'>"
        input += "<span class='no-grid'>"+no+"</span></td>"
        input += "<td id='jabatanke"+no+"'><span id='text_jabatanke"+no+"' class='td-kode tdjabatanke"+no+" tooltip-span'></span>"
        input += "<input type='hidden' name='kode_jab[]' id='value_jabatanke"+no+"' readonly>"
        input += "<input autocomplete='off' type='text' name='jab[]' class='form-control inp-kode jabatanke"+no+" hidden' value='' style='z-index: 1;position: relative;'  id='kode_jabatanke"+no+"'>"
        input += "<a href='#' class='search-item search-jabatan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        input += "</td>"
        input += "<td class='text-center'>"
        input += "<a class=' hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>"
        input += "</td>"
        input += "</tr>";

        $('#input-grid tbody').append(input);
        hideUnselectedRow()
        $('.row-grid:last').addClass('selected-row');
        $('#kode_jabatanke'+no).typeahead({
            source:$dtJabatan,
            displayText:function(item){
                return item.id+' - '+item.name;
            },
            autoSelect:false,
            changeInputOnSelect:false,
            changeInputOnMove:false,
            selectOnBlur:false,
            afterSelect: function (item) {
                generateDataJabatan(item.id,null,'jabatanke'+no,'change')
            }
        });
        $('.tooltip-span').tooltip({
            title: function(){
                return $(this).text();
            }
        });
        $('#input-grid td').removeClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find("td:eq(1)").addClass('px-0 py-0 aktif');
        $('#input-grid tbody tr:last').find(".inp-kode").show();
        $('#input-grid tbody tr:last').find(".td-kode").hide();
        $('#input-grid tbody tr:last').find(".search-jabatan").show();
        $('#input-grid tbody tr:last').find(".inp-kode").focus();
        hitungTotalRow();
    }

    function generateDataJabatan(kode, nama, elementKode, event) {
        if(event === 'change' || event === 'tab') {
            var filter = $dtJabatan.filter(data => data.id == kode);
            if(filter.length > 0) {
                $('#text_'+elementKode).text(filter[0].name)
                $('#value_'+elementKode).val(filter[0].id)
                $('#kode_'+elementKode).val(filter[0].id)
                $('#kode_'+elementKode).hide()
                $('.search-jabatan').hide()
                $('#text_'+elementKode).show()
            }
        } else {
            var filter = $dtJabatan.filter(data => data.id == kode);
            if(filter.length > 0) {
                $('#text_'+elementKode).text(filter[0].name)
                $('#value_'+elementKode).val(filter[0].id)
                $('#kode_'+elementKode).val(filter[0].id)
                $('#kode_'+elementKode).hide()
                $('.search-jabatan').hide()
                $('#text_'+elementKode).show()
            }
        }
    }

    function custTarget(target, tr) {
        var key = target.substr(0, 9);
        var kode = tr.find('td:nth-child(1)').text();
        var nama = tr.find('td:nth-child(2)').text();
        console.log(target)
        if(key === 'jabatanke') {
            $('#value_'+target).val(kode)
            $('#kode_'+target).val(kode)
            $('#text_'+target).text(nama)
            $('#kode_'+target).hide()
            $('#text_'+target).show()
            $('.search-jabatan').hide()
        }
    }

    $('#form-tambah').on('click', '.add-row', function(){
        addRowGrid();
    });

    $('#input-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-grid').on('change', '.inp-kode', function(e){
        e.preventDefault();
        var id = $(this).parents('td').attr('id')
        if($.trim($(this).closest('tr').find('.inp-kode').val()).length){
            var kode = $(this).val();
            generateDataJabatan(kode,null,id,'change');
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

    $('#input-grid').on('keydown','.inp-kode',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-kode'];
        var nxt2 = ['.td-kode'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).parents('td').index();
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            console.log(idx)
            switch (idx) {
                case 1:
                    var id = $(this).parents('td').attr('id');
                    var kode = $(this).val();
                    generateDataJabatan(kode,null,id,'tab');
                    if($twicePress == 1) {
                        var cek = $(this).parents('tr').next('tr').find('.td-kode');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            $('.add-row').click();
                        }
                    }
                    $twicePress = 1
                    setTimeout(() => $twicePress = 0, 2000)                 
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
                var kode_jab = $(this).parents("tr").find(".inp-kode").val();
                var nama_jab = $(this).parents("tr").find(".inp-nama").val();
                var no = $(this).parents("tr").find("span.no-grid").text();
                $(this).parents("tr").find(".inp-kode").val(kode_jab);
                $(this).parents("tr").find(".td-kode").text(kode_jab);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-kode").show();
                    $(this).parents("tr").find(".td-kode").hide();
                    $(this).parents("tr").find(".search-jabatan").show();
                    $(this).parents("tr").find(".inp-kode").focus();
                }else{
                    $(this).parents("tr").find(".inp-kode").hide();
                    $(this).parents("tr").find(".td-kode").show();
                    $(this).parents("tr").find(".search-jabatan").hide();
                }
            }
        }
    });

    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-grid').each(function(){
            var nom = $(this).closest('tr').find('.no-grid');
            nom.html(no);
            no++;
        });
        hitungTotalRow();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#input-grid').on('click', '.search-item', function(){
        var id = $(this).parents('td').attr('id');
        var par = $(this).closest('td').find('input[type="text"]').attr('name');
        var input = $(this).closest('td').find('#value_'+id).attr('id')
        var text = $(this).closest('td').find('#text_'+id).attr('id')
        switch(par){
            case 'jab[]': 
            break;
        }

        switch(par){
            case 'jab[]': 
                var options = { 
                    id : par,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('siaga-master/unit') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Regional",
                    pilih : "akun",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : id,
                    target2 : "#"+text,
                    target3 : "",
                    target4 : "custom",
                    width : ["30%","70%"]
                };
            break;
        }
        showInpFilter(options);

    });
    // End Grid

    function openFilter() {
        var element = $('#mySidepanel');
            
        var x = $('#mySidepanel').attr('class');
        var y = x.split(' ');
        if(y[1] == 'close'){
            element.removeClass('close');
            element.addClass('open');
        }else{
            element.removeClass('open');
            element.addClass('close');
        }
    }
    
    $('.sidepanel').on('click', '#btnClose', function(e){
        e.preventDefault();
        openFilter();
    });

    $('[data-toggle="tooltip"]').tooltip(); 

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    // END SET UP FORM //
    // PLUGIN SCROLL di bagian preview dan form input
    var scroll = document.querySelector('#content-preview');
    var psscroll = new PerfectScrollbar(scroll);

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    // END PLUGIN SCROLL di bagian preview dan form input
    // FUNCTION GET DATA //
    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/unit') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    var select = selectRegional[0];
                    var control = select.selectize;
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                        }
                    }
                }
            }
        });
    })();

    function getPP(kode_cbbl, kode){
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/unit') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                     if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var data = result.daftar;
                        var filter = data.filter(data => data.kode_pp == kode);
                        if(filter.length > 0) {
                            showInfoField(kode_cbbl, filter[0].kode_pp, filter[0].nama)
                        }
                    }
                }
            }
        });
    }

    (function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/jabatan') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    for(i=0;i<result.daftar.length;i++){
                        $dtJabatan[i] = {id:result.daftar[i].kode_jab,name:result.daftar[i].nama};  
                    }
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
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
                    window.location="{{ url('/silo-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    })();
    
    jumFilter();
    // END FUNCTION GET DATA //
    // EVENT CHANGE //
    $('#kode_pp').change(function(){
        var value = $(this).val();
        getPP('kode_pp',value);
    });
    // END EVENT CHANGE //
    // LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('siaga-master/role') }}", 
        [
            {
                "targets": 0,
                "createdCell": function (td, cellData, rowData, row, col) {
                    if ( rowData.status == "baru" ) {
                        $(td).parents('tr').addClass('selected');
                        $(td).addClass('last-add');
                    }
                }
            },
            {   
                'targets': [3,4], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'kode_role' },
            { data: 'kode_pp' },
            { data: 'nama' },
            { data: 'bawah' },
            { data: 'atas' },
            { data: 'modul' }
        ],
        "{{ url('silo-auth/sesi-habis') }}",
        [[6 ,"desc"]]
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

    // BUTTON TAMBAH
    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#input-grid tbody').empty();
        $('#judul-form').html('Tambah Data Role');
        $('#kode').attr('readonly', false);
        addRowDefault();
        newForm();
    });
    // END BUTTON TAMBAH

    // BUTTON KEMBALI
    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_fs').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });
    // END BUTTON KEMBALI

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_role:{
                required: true,   
            },
            nama:{
                required: true,   
            },
            modul:{
                required: true,   
            },
            kode_pp:{
                required: true,   
            },
            atas:{
                required: true,   
            },
            bawah:{
                required: true,   
            },
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#kode').val();
            if(parameter == "edit"){
                var url = "{{ url('siaga-master/role') }}/"+id;
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('siaga-master/role') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
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
                    if(result.data.status){
                        $('#input-grid tbody').empty();
                        dataTable.ajax.reload();
                        var kode = $('#kode').val();
                        $('#judul-form').html('Tambah Data Role');
                        $('#kode').attr('readonly', false);
                        resetForm()
                        addRowDefault();
                        msgDialog({
                            id:kode,
                            type:'simpan'
                        });
                        last_add(dataTable,"nik",kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/silo-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'NIK sudah digunakan'
                            });
                        }else{

                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            // $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });
    // END BUTTON SIMPAN

    // BUTTON EDIT TABLE //
    function editData(id) {
        $('#form-tambah').validate().resetForm();
        $('#input-grid tbody').empty();
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        $('#judul-form').html('Edit Data Role');
        $.ajax({
            type: 'GET',
            url: "{{ url('siaga-master/role') }}/" + id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode').attr('readonly', true);
                    $('#kode').val(id);
                    $('#id').val(id);
                    $('#nama').val(result.data[0].nama);
                    $('#atas').val(parseFloat(result.data[0].atas));
                    $('#bawah').val(parseFloat(result.data[0].bawah));
                    $('#modul')[0].selectize.setValue(result.data[0].modul);
                    getPP('kode_pp',result.data[0].kode_pp);
                    if(result.data2.length > 0) {
                        var input = "";  
                        var no = 1;
                        for(var i=0;i<result.data2.length;i++) {
                            var data = result.data2[i];
                            input += "<tr class='row-grid'>";
                            input += "<td class='no-grid text-center'>"
                            input += "<span class='no-grid'>"+no+"</span></td>"
                            input += "<td id='jabatanke"+no+"'><span id='text_jabatanke"+no+"' class='td-kode tdjabatanke"+no+" tooltip-span'></span>"
                            input += "<input type='hidden' name='kode_jab[]' id='value_jabatanke"+no+"' value='' readonly>"
                            input += "<input autocomplete='off' type='text' name='jab[]' class='form-control inp-kode jabatanke"+no+" hidden' value='' style='z-index: 1;position: relative;'  id='kode_jabatanke"+no+"'>"
                            input += "<a href='#' class='search-item search-jabatan hidden' style='position: absolute;z-index: 2;margin-top:8px;margin-left:-25px'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            input += "</td>"
                            input += "<td class='text-center'>"
                            input += "<a class=' hapus-item' style='font-size:12px;cursor:pointer;'><i class='simple-icon-trash'></i></a>"
                            input += "</td>"

                            no++;   
                        }
                        $('#input-grid tbody').html(input);

                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });
                        var no = 1;
                        for(var i=0;i<result.data2.length;i++) {
                            var data = result.data2[i];
                            generateDataJabatan(data.kode_jab, null, 'jabatanke'+no, null)
                            $('#kode_jabatanke'+no).typeahead({
                                source:$dtJabatan,
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
                            no++;
                        }
                    }
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('silo-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        editData(id)
    });
    // END BUTTON TABLE EDIT //

    // PREVIEW saat klik di list data //
    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 6){
            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            var html = `<tr>
                <td style='border:none'>Kode Role</td>
                <td style='border:none'>`+data.kode_role+`</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>`+data.nama+`</td>
            </tr>
            <tr>
                <td>Kode Regional</td>
                <td>`+data.kode_pp+`</td>
            </tr>
            <tr>
                <td>Modul</td>
                <td>`+data.modul+`</td>
            </tr>
            `;
            $('#table-preview tbody').html(html);
            
            $('#modal-preview-id').text(id);
            $('#modal-preview').modal('show');
        }
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        editData(id)
    });

    $('.modal-header').on('click','#btn-delete2',function(e){
        var id = $('#modal-preview-id').text();
        $('#modal-preview').modal('hide');
        msgDialog({
            id:id,
            type:'hapus'
        });
    });
    // END PREVIEW saat klik di list data //

    
    // BUTTON HAPUS DATA
    function hapusData(id){
        $.ajax({
            type: 'DELETE',
            url: "{{ url('siaga-master/role') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Role ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
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

    $('#saku-datatable').on('click','#btn-delete',function(e){
        var kode = $(this).closest('tr').find('td').eq(0).html();
        msgDialog({
            id: kode,
            type:'hapus'
        });
    });

    // END BUTTON HAPUS

    // FILTER DATA //
     $('#modalFilter').on('submit','#form-filter',function(e){
        e.preventDefault();
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var kode_pp = $('#inp-filter_regional').val();
                var modul = $('#inp-filter_modul').val();
                var col_kode_pp = data[1];
                var col_modul = data[5];
                if(kode_pp != "" && modul != ""){
                    if(kode_pp == col_kode_pp && modul == col_modul){
                        return true;
                    }else{
                        return false;
                    }
                }else if(kode_pp != "" && modul == ""){
                    if(kode_pp == col_kode_pp) {
                        return true;
                    } else {
                        return false;
                    }
                }else if(kode_pp == "" && modul != ""){
                    if(modul == col_modul) {
                        return true;
                    } else {
                        return false;
                    }
                } else{
                    return true;
                }
            }
        );
        dataTable.draw();
        $.fn.dataTable.ext.search.pop();
        $('#modalFilter').modal('hide');
    });

    $('#btn-reset').click(function(e){
        e.preventDefault();
        $('#inp-filter_regional')[0].selectize.setValue('');
        $('#inp-filter_modul')[0].selectize.setValue('');
        jumFilter();
    });
        
    $('#filter-btn').click(function(){
        $('#modalFilter').modal('show');
    });

    $("#btn-close").on("click", function (event) {
        event.preventDefault();
        $('#modalFilter').modal('hide');
    });

    $('#btn-tampil').click();
    // END FILTER DATA //

    // CBBL
    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });
    
    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var regional = $('#kode_pp').val()

        switch(id) {
            case 'kode_pp': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('silo-master/filter-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Regional",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
            break;
            default:
            break;
        }
            showInpFilter(settings);
    });
    //END SHOW CBBL//

    $('#kode,#nama,#kode_pp').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode','nama','kode_pp'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 2 || idx == 3){
                $('#'+nxt[idx])[0].selectize.focus();
            }else{
                
                $('#'+nxt[idx]).focus();
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
            if(idx != -1){ 
                $('#'+nxt[idx]).focus();
            }
        }
    });
    </script>