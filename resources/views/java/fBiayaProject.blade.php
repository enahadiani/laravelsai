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
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-upload" role="tab" aria-selected="true"><span class="hidden-xs-down">Upload File</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0">
                        <div class="tab-pane active" id="data-upload" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row_dok" ></span></a>
                            </div>
                            <div class='col-md-12' style='min-height:420px; margin:0px; padding:0px;'>
                                <table class="table table-bordered table-condensed gridexample" id="upload" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                    <thead style="background:#F8F8F8">
                                        <tr>
                                            <th style="width:3%">No</th>
                                            <th style="width:20%">Jenis</th>
                                            <th style="width:30%">Path File</th>
                                            <th width="25%">Upload File</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                                <a type="button" href="#" id="add-row-dok" data-id="0" title="add-row-dok" class="add-row-dok btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
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
    var valid = true;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    // Upload grid
    $('#upload').on('click', '.search-item', function() {
        var param = $(this).closest('div').find('input[type="text"]').attr('name')
        var target1 = $(this).closest('div').find('input[type="text"]').attr('class')
        var target2 = $(this).closest('div').find('input[type="hidden"]').attr('class')
        var target3 = $(this).closest('tr').find('td:eq(3) input[type="file"]').attr('class')
        var tmp = target1.split(" ");
        var tmp2 = target3.split(" ")
        var tmp3 = target2.split(" ")
        target1 = tmp[2];
        target3 = tmp2[1]
        target2 = tmp3[1]
        console.log(target2)

        switch(param){
            case 'jenis[]': 
                var options = { 
                    id : param,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('java-trans/dok-jenis') }}",
                    columns : [
                        { data: 'kode_jenis' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jenis Dokumen",
                    pilih : "jenis",
                    jTarget1 : "val",
                    jTarget2 : "val",
                    target1 : "",
                    target2 : "",
                    target3 : "",
                    target4 : "",
                    onItemSelected: function(data) {
                        $('.'+target3).removeClass('hidden')
                        $('.'+target1).val(data.nama)
                        $('.'+target2).val(data.kode_jenis)
                    },
                    width : ["30%","70%"]
                };
            break;
        }

        showInpFilter(options);
    })

    function hitungTotalRowUpload(form){
        var total_row = $('#upload tbody tr').length;
        $('#total-row_dok').html(total_row+' Baris');
    }

    function addRowUpload() {
        var no=$('#upload .row-upload:last').index();
        no=no+2;
        var html = "";
        html += "<tr class='row-upload'>";
        html += "<td class='no-upload text-center'>"+no+"</td>"
        html += "<td class='px-0 py-0'><div class='inp-div-jenis'>"
        html += "<input type='hidden' name='kode_jenis[]' class='inp-jenis kode_jenis-ke-"+no+"'/>"
        html += "<input type='text' name='jenis[]' class='form-control inp-jenis inp-jenis-"+no+"' value='' style='z-index: 1;'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
        html += "</div></td>"
        html += "<td class='td-nama_file tooltip-span'>-</td>";
        html += "<td><input type='file' name='file_dok[]' class='hidden file-dok-"+no+"'></td>"
        html += "<td class='text-center action-dok'><a class='hapus-dok' style='cursor: pointer;'><i class='simple-icon-trash' style='font-size:18px'></i></a></td>"
        html += "</tr>"

        $('#upload tbody').append(html);
        hitungTotalRowUpload()
    }

    

    $('#upload').on('click', '.hapus-dok', function(){
        valid = true
        $(this).closest('tr').remove();
        no=1;
        $('.row-upload').each(function(){
            var nom = $(this).closest('tr').find('.no-upload');
            nom.html(no);
            no++;
        });
        hitungTotalRowUpload();
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
    });

    $('#add-row-dok').on('click', function() {
        addRowUpload()
    })

    $('#upload').on('click', '.hapus-dok-with-file', function(){
        var no_bukti = $('#no_proyek').val();
        var nama_file = $(this).closest('tr').find('.td-nama_file').html();
        var kode_jenis = $(this).closest('tr').find('.inp-jenis').val();
        var no_urut = $(this).closest('tr').find('.no-upload').html();
        var self = this
        
        msgDialog({
            id: kode_jenis,
            text: 'Dokumen akan terhapus secara permanen dari server dan tidak dapat mengurungkan.<br> ID Data : <b>'+kode_jenis+'</b> No urut : <b>'+no_urut+'</b>',
            param: {'kode_jenis':kode_jenis,'no_bukti':no_bukti,'fileName':nama_file, 'self':self, 'no_urut':no_urut},
            type:'hapusDok'
        });
       
    });

    function hapusDok(param){
        var no_bukti = param.no_bukti; 
        var kode_jenis= param.kode_jenis;
        var fileName= param.fileName;
        var no_urut = param.no_urut
        var self = param.self
        console.log(self)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('java-trans/proyek-file') }}",
            dataType: 'json',
            data: {'no_bukti':no_bukti,'kode_jenis':kode_jenis, 'fileName':fileName},
            success:function(result){
                // console.log(result.data.message);
                if(result.data.status){
                    $(self).closest('tr').remove();
                    no=1;
                    $('.row-upload').each(function(){
                        var nom = $(self).closest('tr').find('.no-upload');
                        nom.html(no);
                        no++;
                    });
                    hitungTotalRowUpload();
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);     
                    msgDialog({
                        id:no_bukti,
                        type:'sukses',
                        title:'Sukses',
                        text:'Dokumen Proyek '+kode_jenis+' dengan no urut: '+no_urut+' berhasil dihapus'
                    });

                }else{
                    msgDialog({
                        id:result.data.no_bukti,
                        title:'Error',
                        back: false,
                        text:result.data.message
                    });
                }
            }
        });
    }

    // Upload

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
        $('#upload tbody').empty()
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
            { data: 'status_bayar', render: function(data) {
                if(data == 1) {
                    return 'Lunas'
                } else {
                    return 'Belum Lunas'
                }
            } }
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

    function showInfoField(kode,isi_kode,isi_nama,isi_nilai=null){
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
        if(kode == 'no_proyek') {
            $('#anggaran').val(isi_nilai)
        }
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
        var anggaran = toNilai($previousAnggaran);
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
            $previousAnggaran = tr.find('td:nth-child(3)').text()
            $('#anggaran').val(tr.find('td:nth-child(3)').text())
            // $no_rab = tr.find('td:nth-child(2)').text()
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
                    header : ['No Proyek', 'Keterangan', 'Saldo'],
                    url : "{{ url('java-trans/beban-proyek-cbbl') }}",
                    columns : [
                        { data: 'no_proyek' },
                        { data: 'keterangan' },
                        { data: 'saldo', render: $.fn.dataTable.render.number( '.', '.', 0 ) }
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
        submitHandler: function (form, event) {
            event.preventDefault();

            var parameter = $('#id_edit').val();
            var id = $('#no_proyek').val();
            var countDokRow = $('#upload tbody tr').length
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
            if(countDokRow > 0) {
                $('#upload tbody tr').each(function(index) {
                    formData.append('no_dok[]', $(this).find('.no-upload').text())
                })
                $('#upload tbody tr').each(function(){
                    var namaFile = $(this).find('.td-nama_file').text()
                    if(namaFile == '-') {
                        var files = $(this).find("td:eq(3) input[type='file']")[0]
                        var check = files.files.length
                        if(check == 0) {
                            alert('Upload dokumen tidak boleh kosong, hapus baris jika tidak diperlukan')
                            valid = false
                            return false
                        } else {
                            valid = true
                        }
                    }
                })
            }
            if(parameter === 'edit') {
                $('#upload tbody tr').each(function(index) {
                    formData.append('nama_file[]', $(this).find('.td-nama_file').text())
                })
            }
            if(status_paid) {
                formData.append('status', 'PAID')
            } else {
                formData.append('status', 'UNPAID')
            }
            formData.append('no_rab', '-')
            
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }
            
            if(valid) { 
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
                            $('#upload tbody').empty()
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
            }
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
                    if(result.file.length > 0) {
                        var html = ""
                        var no = 1;
                        for(var i=0;i<result.file.length;i++) {
                            var line = result.file[i]
                            var dok = "{{ config('api.url').'java-auth/storage' }}/"+line.file_dok;
                            html += "<tr class='row-upload'>"
                            html += "<td class='no-upload text-center'>"+no+"</td>"
                            html += "<td class='px-0 py-0'><div class='inp-div-jenis'>"
                            html += "<input type='hidden' name='kode_jenis[]' value='"+line.jenis+"' class='inp-jenis kode_jenis-ke-"+no+"'/>"
                            html += "<input type='text' name='jenis[]' value='"+line.nama+"' class='form-control inp-jenis inp-jenis-"+no+"' value='' style='z-index: 1;'><a href='#' class='search-item search-jenis'><i class='simple-icon-magnifier' style='font-size: 18px;'></i></a>"
                            html += "</div></td>"
                            html += "<td class='td-nama_file tooltip-span'>"+line.file_dok+"</td>";
                            html += "<td><input type='file' name='file_dok[]' class='file-dok-"+no+"'></td>"
                            html += "<td class='text-center action-dok'><a class='download-dok' href='"+dok+"' target='_blank' title='Download'><i style='font-size:18px' class='simple-icon-cloud-download'></i></a>&nbsp;&nbsp;&nbsp;<a class='hapus-dok-with-file' style='cursor: pointer;'><i class='simple-icon-trash' style='font-size:18px'></i></a></td>"  
                            html += "</tr>"
                            no++
                        }
                        $('#upload tbody').append(html)   
                        hitungTotalRowUpload()                     
                    }
                    $('#saku-datatable').hide();
                    $('#modal-preview').modal('hide');
                    $('#saku-form').show();
                    showInfoField('kode_cust',result.data[0].kode_cust,result.data[0].nama_customer);
                    showInfoField('kode_vendor',result.data[0].kode_vendor,result.data[0].nama_vendor);
                    showInfoField('no_proyek',result.data[0].no_proyek,result.data[0].keterangan_proyek, result.data[0].saldo);
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