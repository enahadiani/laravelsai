<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />

<x-list-data judul="Data Biaya Project" tambah="true" :thead="array('No Bukti', 'No Proyek', 'No Anggaran','Keterangan', 'Nilai','Status','Aksi')" :thwidth="array(15,15,10,10,10,10,10)" :thclass="array('','','','','','','text-center')" />

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
    <input type="hidden" id="method" name="_method" value="post">
    <input type="hidden" id="id" name="id">
    <div class="row" id="saku-form" style="display:none;">
        <div class="col-sm-12">
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
                                    <label for="tanggal">Tanggal</label>
                                    <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}">
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="kode_cust" >Customer</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_cust" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kode_cust" id="kode_cust" name="kode_cust" value="" title="">
                                        <span class="info-name_kode_cust hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_cust"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="kode_vendor" >Supplier</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_vendor" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-kode_vendor" id="kode_vendor" name="kode_vendor" value="" title="">
                                        <span class="info-name_kode_vendor hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_vendor"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12"> 
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_proyek" >No Proyek</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_no_proyek" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="form-control inp-label-no_proyek" id="no_proyek" name="no_proyek" value="" title="">
                                        <span class="info-name_no_proyek hidden">
                                            <span></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_no_proyek"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_dokumen">No Dokumen</label>
                                    <input class="form-control" type="text" placeholder="No Dokumen" id="no_dokumen" name="no_dokumen">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="anggaran">Anggaran tersisa</label>
                                    <input class="form-control currency" type="text" placeholder="Anggaran tersisa" id="anggaran" name="anggaran" readonly value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-4 col-sm-12"></div>
                                <div class="col-md-8 col-sm-12">
                                    <label for="nilai">Nilai</label>
                                    <input class="form-control currency" type="text" placeholder="Nilai" id="nilai" name="nilai" value="0">
                                    <br/>
                                    <div class="switch-toggle">
                                        <label class="switch">
                                            <input type="checkbox" id="status-paid">
                                            <span class="slider round"></span>
                                        </label>
                                        <div class="label-switch">
                                            <span id="paid">PAID</span>
                                            <span id="unpaid">UNPAID</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 no_bukti">
                                    <label for="no_bukti">No Bukti</label>
                                    <input class="form-control" type="text" placeholder="No Bukti" id="no_bukti" name="no_bukti">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-div">
                        <button type="submit" class="btn btn-primary mb-2 mt-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('modal_search')

<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>

<script type="text/javascript">
    var $previousNilai = 0;
    var $previousAnggaran = 0;
    var status_paid = false;
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var $no_rab = '';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function isChecked() {
        if(status_paid) {
            $('#status-paid').prop('checked', true)
            $('#paid').show()        
            $('#unpaid').hide()        
        } else {
            $('#status-paid').prop('checked', false)
            $('#paid').hide()        
            $('#unpaid').show()        
        }
    }

    $('#status-paid').click(function() {
        status_paid = !status_paid
        isChecked()
    })

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    function reverseDate2(date_str, separator, newseparator){
        if(typeof separator === 'undefined'){separator = '-'}
        if(typeof newseparator === 'undefined'){newseparator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+newseparator+str[1]+newseparator+str[0];
    }

    function format_number(x){
        var num = parseFloat(x).toFixed(0);
        num = sepNumX(num);
        return num;
    }

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () {  }
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        status_paid = false
        isChecked()
        $previousNilai = 0;
        $previousAnggaran = 0;
        $('.no_bukti').hide();
        $('#row-id').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Biaya Proyek');
        $('#btn-update').attr('id','btn-save');
        $('#btn-save').attr('type','submit');
        $('#form-tambah')[0].reset();
        $('#form-tambah').validate().resetForm();
        $('#id').val('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('.input-group-prepend').addClass('hidden');
        $('span[class^=info-name]').addClass('hidden');
        $('.info-icon-hapus').addClass('hidden');
        $('[class*=inp-label-]').val('')
        $('[class*=inp-label-]').attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important;border-left:1px solid #d7d7d7 !important');
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        var kode = null;
        msgDialog({
            id:kode,
            type:'keluar'
        });
    });

    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";

    var dataTable = generateTable(
        "table-data",
        "{{ url('java-trans/biaya-proyek') }}", 
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
            {   'targets': 2, 
                'visible': false,
                'searchable': false 
            },
            {   'targets': 4, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 6, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'no_bukti' },
            { data: 'no_proyek' },
            { data: 'no_rab' },
            { data: 'keterangan' },
            { data: 'nilai' },
            { data: 'status_bayar' }
        ],
        "{{ url('java-auth/sesi-habis') }}",
        [[5 ,"desc"]]
    );

    $.fn.DataTable.ext.pager.numbers_length = 5;

    $("#searchData").on("keyup", function (event) {
        dataTable.search($(this).val()).draw();
    });

    $("#page-count").on("change", function (event) {
        var selText = $(this).val();
        dataTable.page.len(parseInt(selText)).draw();
    });

    $('[data-toggle="popover"]').popover({ trigger: "focus" });

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    // BAGIAN CBBL 
    var $target = "";
    var $target2 = "";
    
    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

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

    function getAkun(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('java-master/customer-akun') }}",
            dataType: 'json',
            data:{'kode_akun':id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        showInfoField('akun_piutang',result.daftar[0].kode_akun,result.daftar[0].nama);
                    }else{
                        $('#akun_piutang').attr('readonly',false);
                        $('#akun_piutang').css('border-left','1px solid #d7d7d7');
                        $('#akun_piutang').val('');
                        $('#akun_piutang').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#nilai').on('change', function() {
        var value = toNilai($(this).val());
        var anggaran = $previousAnggaran;
        if(anggaran == 0 || anggaran == '') {
            alert('Anggaran tidak boleh kosong atau 0')
        } else if(value > anggaran) {
            alert('Nilai beban tidak boleh melebihi anggaran')
            $(this).focus()
        } else {
            if(value == 0 || value == '') {
                $previousNilai = 0
                anggaran = $previousAnggaran
            }
            var selisih = (anggaran + $previousNilai) - value
            $('#anggaran').val(selisih) 
            
        }
    })

    function custTarget(target, tr) {
        var from = target;
        var keyString = '_'
        var fromTarget = from.substr(from.indexOf(keyString) + keyString.length, from.length);
        if(fromTarget === 'no_proyek') {
            $previousAnggaran = parseInt(tr.find('td:nth-child(3)').text())
            $('#anggaran').val(parseInt(tr.find('td:nth-child(3)').text()))
            $no_rab = tr.find('td:nth-child(2)').text()
        }
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var customer = $('#kode_cust').val();
        if(id == 'no_proyek') {
            if(customer == '') {
                alert('Harap pilih vendor terlebih dahulu')
                return;
            }
        }
        switch(id) {
            case 'kode_cust': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('java-trans/customer') }}",
                    columns : [
                        { data: 'kode_cust' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Customer",
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
            case 'kode_vendor': 
                var settings = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('java-trans/vendor') }}",
                    columns : [
                        { data: 'kode_vendor' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Supplier",
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
            case 'no_proyek': 
                var settings = {
                    id : id,
                    header : ['No Proyek', 'No Rab', 'Nilai'],
                    url : "{{ url('java-trans/beban-proyek-cbbl') }}",
                    columns : [
                        { data: 'no_proyek' },
                        { data: 'no_rab' },
                        { data: 'sisa_anggaran' }
                    ],
                    parameter: {
                        kode: customer
                    },
                    judul : "Daftar Anggaran",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "custom",
                    target4 : "custom",
                    width : ["30%","70%"],
                }
            break;
            default:
            break;
        }
            showInpFilter(settings);
    });

    $('#form-tambah').on('change', '#kode_cust', function(){
        var par = $(this).val();
        getCustomer(par);
    });

    $('#form-tambah').on('change', '#kode_vendor', function(){
        var par = $(this).val();
        getVendor(par);
    });

    // END BAGIAN CBBL

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            tanggal:{
                required: true   
            },
            kode_cust:{
                required: true   
            },
            kode_vendor:{
                required: true  
            },
            no_proyek:{
                required: true 
            },
            nilai:
            {
                required: true
            },
            keterangan:
            {
                required: true
            },
            no_dokumen:
            {
                required: true
            }
        },
        errorElement: "label",
        submitHandler: function (form) {
            var parameter = $('#id_edit').val();
            var id = $('#no_proyek').val();
            if(parameter == "edit"){
                var url = "{{ url('java-trans/biaya-proyek-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('java-trans/biaya-proyek') }}";
                var pesan = "saved";
                var text = "Data tersimpan dengan kode "+id;
            }

            var formData = new FormData(form);
            if(status_paid) {
                formData.append('status', 'PAID')
            } else {
                formData.append('status', 'UNPAID')
            }
            formData.append('no_rab', $no_rab)
            
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
                        dataTable.ajax.reload();
                        $previousNilai = 0;
                        $('.no_bukti').hide();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Tambah Data Biaya Proyek');
                        $('#method').val('post');
                        $('#kode_customer').attr('readonly', false);
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                        last_add("kode_customer",result.data.kode);
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jenis != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jenis,
                                text:'Kode customer sudah digunakan'
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
                error: function(xhr, textStatus, errorThrown) {
                    alert('request failed:'+textStatus);
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-simpan').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 5){

            var id = $(this).closest('tr').find('td').eq(0).html();;
            var data = dataTable.row(this).data();
            $no_rab = data.no_rab;
            $.ajax({
                type: 'GET',
                url: "{{ url('java-trans/biaya-proyek-show') }}",
                data: { kode: id, no_rab:$no_rab },
                dataType: 'json',
                async:false,
                success:function(res){
                     var html = `<tr>
                        <td style='border:none'>No Bukti</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>No Proyek</td>
                        <td>`+data.no_proyek+`</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>`+res.data.data[0].tanggal+`</td>
                    </tr>
                    <tr>
                        <td>No Dokumen</td>
                        <td>`+res.data.data[0].no_dokumen+`</td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td>`+res.data.data[0].status+`</td>
                    </tr>
                    <tr>
                        <td>Nilai</td>
                        <td>`+format_number(res.data.data[0].nilai)+`</td>
                    </tr>
                    <tr>
                        <td>Vendor</td>
                        <td>`+res.data.data[0].kode_cust+` - `+res.data.data[0].nama_customer+`</td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td>`+res.data.data[0].kode_vendor+` - `+res.data.data[0].nama_vendor+`</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>`+res.data.data[0].keterangan+`</td>
                    </tr>
                    `;
                    $('#table-preview tbody').html(html);    
                    $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Biaya Proyek').removeClass('py-2');
                    $('#modal-preview-id').text(id);      
                    $('#modal-preview').modal('show');      
                }
            })
        }
    });

    $('.modal-header').on('click', '#btn-edit2', function(){
        var id= $('#modal-preview-id').text();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        $('#judul-form').html('Edit Data Biaya Proyek');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    // BUTTON EDIT
    function editData(id, no_rab){
        $.ajax({
            type: 'GET',
            url: "{{ url('java-trans/biaya-proyek-show') }}",
            data: { kode: id, no_rab:no_rab },
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $no_rab = result.data[0].no_rab;
                    $previousNilai = parseInt(result.data[0].nilai)
                    $previousAnggaran = parseInt(result.data[0].sisa_anggaran) 
                    $('.no_bukti').show();
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_bukti').attr('readonly', true);
                    $('#no_bukti').val(id);
                    $('#id').val(id);
                    $('#tanggal').val(reverseDate2(result.data[0].tanggal,'-','/'));
                    $('#anggaran').val(parseInt(result.data[0].sisa_anggaran));
                    $('#nilai').val(parseInt(result.data[0].nilai));
                    $('#no_dokumen').val(result.data[0].no_dokumen);
                    $('#keterangan').val(result.data[0].keterangan);
                    if(result.data[0].status === 'UNPAID') {
                        status_paid = false
                        $('#status-paid').prop('checked', false)
                        $('#paid').hide()        
                        $('#unpaid').show()
                    } else {
                        status_paid = true
                        $('#status-paid').prop('checked', true)
                        $('#paid').show()        
                        $('#unpaid').hide()
                    }         
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('kode_cust',result.data[0].kode_cust,result.data[0].nama_customer);
                    showInfoField('kode_vendor',result.data[0].kode_vendor,result.data[0].nama_vendor);
                    showInfoField('no_proyek',result.data[0].no_proyek,result.data[0].no_rab);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#no_bukti').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var data = dataTable.row($(this).parents('tr')).data();
        $no_rab = data.no_rab;
        $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Biaya Proyek');
        editData(id, $no_rab);
    });

    // BUTTON HAPUS DATA
    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('java-trans/biaya-proyek') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Biaya Proyek ('+id+') berhasil dihapus ');
                    $('#modal-pesan-id').html('');
                    $('#table-delete tbody').html('');
                    $('#modal-pesan').modal('hide');
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
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

</script>