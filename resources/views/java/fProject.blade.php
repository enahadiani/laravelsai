 <link rel="stylesheet" href="{{ asset('trans.css') }}" />
 <link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
 <link rel="stylesheet" href="{{ asset('trans-java/trans.css') }}" />

 <x-list-data judul="Data Project" tambah="true" :thead="array('No Proyek','No Kontrak','Tanggal Selesai','Nilai','Aksi')" :thwidth="array(15,15,10,10,10)" :thclass="array('','','','','text-center')" />

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
                                        <input class='form-control datepicker' type="text" id="tanggal_mulai" name="tanggal_mulai" value="{{ date('d/m/Y') }}">
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
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="nilai">Nilai Kontrak</label>
                                        <input class="form-control currency" type="text" placeholder="Nilai kontrak" id="nilai" name="nilai" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_proyek">No Proyek</label>
                                        <input class='form-control' type="text" id="no_proyek" name="no_proyek" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="no_kontrak">No Kontrak</label>
                                        <input class='form-control' type="text" id="no_kontrak" name="no_kontrak" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="status_ppn" name="status_ppn">
                                            <label class="custom-control-label" for="status_ppn">Termasuk PPN 10%</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" rows="4" id="keterangan" name="keterangan" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12"></div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="tanggal">Tanggal Berakhir Kontrak</label>
                                        <input class='form-control datepicker' type="text" id="tanggal_selesai" name="tanggal_selesai" value="{{ date('d/m/Y') }}">
                                        <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                        <br/>
                                        <div class="custom-control custom-checkbox" id="project-status">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status">
                                            <label class="custom-control-label" for="status">Selesai</label>
                                        </div>
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
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <a type="button" href="#" id="add-row-dok" data-id="0" title="add-row-dok" class="add-row-dok btn btn-light2 btn-block btn-sm"><i class="saicon icon-tambah mr-1"></i>Tambah Baris</a>
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

    @include('modal_search')

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    var status_ppn = '0';
    var nilai_ppn = 0;
    var status_project = '0';
    var $iconLoad = $('.preloader');
    var $target = "";
    var $target2 = "";
    var $target3 = "";
    var valid = true;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

    $('#status').change(function() {
        if(status_project === '0') {
            status_project = '1';
        } else {
            status_project = '0'
        }
    })

    
    // Upload grid
    $('#upload').on('click', '.search-item', function() {
        var param = $(this).closest('div').find('input[type="text"]').attr('name')
        var target1 = $(this).closest('div').find('input[type="text"]').attr('class')
        var target2 = $(this).closest('div').find('input[type="hidden"]').attr('class')
        var target3 = $(this).closest('tr').find('td:eq(3) input[type="file"]').attr('class')
        var tmp = target1.split(" ");
        var tmp2 = target3.split(" ")
        target1 = tmp[2];
        target3 = tmp2[1]

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
        console.log(param)
        var no_bukti = param.no_bukti; 
        var kode_jenis= param.kode_jenis;
        var fileName= param.fileName;
        var no_urut = param.no_urut
        var self = param.self
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

    $('#status_ppn').change(function() {
        var nilai = $('#nilai').val();
        if(status_ppn === '0') {
            status_ppn = '1';
            nilai_ppn = toNilai(nilai) * (10/100);
        } else {
            status_ppn = '0'
            nilai_ppn = 0
        }
    })

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () {  }
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        status_project = '0'
        $('#upload tbody').empty()
        $('#row-id').hide();
        $('#project-status').hide();
        $('#method').val('post');
        $('#judul-form').html('Tambah Data Proyek');
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
        "{{ url('java-trans/proyek') }}", 
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
            {   'targets': 3, 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            },
            {'targets': 4, data: null, 'defaultContent': action_html,'className': 'text-center' }
        ],
        [
            { data: 'no_proyek' },
            { data: 'no_kontrak' },
            { data: 'tgl_selesai' },
            { data: 'nilai' }
        ],
        "{{ url('java-auth/sesi-habis') }}",
        [[4 ,"desc"]]
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

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        showInpFilter({
            id : id,
            header : ['Kode', 'Nama'],
            url : "{{ url('java-trans/customer') }}",
            columns : [
                { data: 'kode_cust' },
                { data: 'nama' }
            ],
            judul : "Daftar Customer",
            pilih : "akun",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "",
            target4 : "",
            width : ["30%","70%"],
        });
    });

    $('#form-tambah').on('change', '#kode_cust', function(){
        var par = $(this).val();
        getCustomer(par);
    });

    // END BAGIAN CBBL
    
    // SUGGESSION DI CBBL
    var $dtCust = new Array();

    function getCustomerList() {
        $.ajax({
            type:'GET',
            url:"{{ url('java-trans/customer') }}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                    
                    for(i=0;i<result.daftar.length;i++){
                        $dtCust[i] = {kode_cust:result.daftar[i].kode_cust};  
                    }
                    
                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
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
                    window.location="{{ url('/java-auth/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getCustomerList();

    $('#kode_cust').typeahead({
        source: function (cari, result) {
            result($.map($dtCust, function (item) {
                return item.kode_cust;
            }));
        },
        afterSelect: function (item) {
            // console.log('cek');
        }
    });
    // END SUGGESTION

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            no_proyek:{
                required: true   
            },
            no_kontrak:{
                required: true   
            },
            keterangan:{
                required: true  
            },
            nilai:{
                required: true 
            },
            kode_cust:
            {
                required: true
            },
            tanggal_mulai:
            {
                required: true
            },
            tanggal_selesai:
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
                var url = "{{ url('java-trans/proyek-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('java-trans/proyek') }}";
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
                    formData.append('nama_dok[]', $(this).find('.td-nama_file').text())
                })
            }

            formData.append('status', status_project)
            formData.append('status_ppn', status_ppn)
            formData.append('ppn', nilai_ppn)
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]); 
            }

            if(valid) {
                console.log('update')
                // $.ajax({
                //     type: 'POST', 
                //     url: url,
                //     dataType: 'json',
                //     data: formData,
                //     async:false,
                //     contentType: false,
                //     cache: false,
                //     processData: false, 
                //     success:function(result){
                //         if(result.data.status){
                //             dataTable.ajax.reload();
                //             $('#upload tbody').empty()
                //             $('#row-id').hide();
                //             $('#form-tambah')[0].reset();
                //             $('#form-tambah').validate().resetForm();
                //             $('[id^=label]').html('');
                //             $('#id_edit').val('');
                //             $('#judul-form').html('Tambah Data Proyek');
                //             $('#method').val('post');
                //             $('#kode_customer').attr('readonly', false);
                //             msgDialog({
                //                 id:result.data.kode,
                //                 type:'simpan'
                //             });
                //             last_add("kode_customer",result.data.kode);
                //         }else if(!result.data.status && result.data.message === "Unauthorized"){
                        
                //             window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                            
                //         }else{
                //             if(result.data.kode == "-" && result.data.jenis != undefined){
                //                 msgDialog({
                //                     id: id,
                //                     type: result.data.jenis,
                //                     text:'No Proyek atau No Kontrak sudah digunakan'
                //                 });
                //             }else{

                //                 Swal.fire({
                //                     icon: 'error',
                //                     title: 'Oops...',
                //                     text: 'Something went wrong!',
                //                     footer: '<a href>'+result.data.message+'</a>'
                //                 })
                //             }
                //         }
                //     },
                //     fail: function(xhr, textStatus, errorThrown){
                //         alert('request failed:'+textStatus);
                //     }
                // });
                // $('#btn-simpan').html("Simpan").removeAttr('disabled');
            }
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    $('#table-data tbody').on('click','td',function(e){
        if($(this).index() != 4){

            var id = $(this).closest('tr').find('td').eq(0).html();
            var data = dataTable.row(this).data();
            $.ajax({
                type: 'GET',
                url: "{{ url('java-trans/proyek-show') }}",
                data: { kode: id },
                dataType: 'json',
                async:false,
                success:function(res){
                     var html = `<tr>
                        <td style='border:none'>No Proyek</td>
                        <td style='border:none'>`+id+`</td>
                    </tr>
                    <tr>
                        <td>No Kontrak</td>
                        <td>`+data.no_kontrak+`</td>
                    </tr>
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>`+res.data.data[0].tgl_mulai+`</td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>`+res.data.data[0].tgl_selesai+`</td>
                    </tr>
                    <tr>
                        <td>Nilai</td>
                        <td>`+format_number(res.data.data[0].nilai)+`</td>
                    </tr>
                    <tr>
                        <td>Nilai PPN (10%)</td>
                        <td>`+format_number(res.data.data[0].ppn)+`</td>
                    </tr>
                    <tr>
                        <td>Vendor</td>
                        <td>`+res.data.data[0].kode_cust+`-`+res.data.data[0].nama+`</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>`+res.data.data[0].keterangan+`</td>
                    </tr>
                    `;
                    $('#table-preview tbody').html(html);    
                    $('#modal-preview-judul').css({'margin-top':'10px','padding':'0px !important'}).html('Preview Data Proyek').removeClass('py-2');
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
        $('#judul-form').html('Edit Data Proyek');
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');
        editData(id)
    });

    // BUTTON EDIT
    function editData(id){
        $.ajax({
            type: 'GET',
            url: "{{ url('java-trans/proyek-show') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(res){
                var result= res.data;
                if(result.status){
                    $('#upload tbody').empty()
                    var html = ""
                    $('#project-status').show();
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#no_proyek').attr('readonly', true);
                    $('#no_proyek').val(id);
                    $('#id').val(id);
                    $('#no_kontrak').val(result.data[0].no_kontrak);
                    $('#tanggal_mulai').val(reverseDate2(result.data[0].tgl_mulai,'-','/'));
                    $('#tanggal_selesai').val(reverseDate2(result.data[0].tgl_selesai,'-','/'));
                    $('#nilai').val(parseInt(result.data[0].nilai));
                    $('#keterangan').val(result.data[0].keterangan);
                    status_ppn = result.data[0].status_ppn; 
                    if(result.data[0].status_ppn === '1') {
                        $('#status_ppn').prop("checked", true)
                    } else {
                        $('#status_ppn').prop("checked", false)
                    }
                    if(result.data[0].flag_aktif === '1') {
                        $('#status').prop("checked", true)
                    } else {
                        $('#status').prop("checked", false)
                    }         
                    if(result.file.length > 0) {
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
                    showInfoField('kode_cust',result.data[0].kode_cust,result.data[0].nama);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('java-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }
    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        // $iconLoad.show();
        $('#form-tambah').validate().resetForm();
        
        $('#btn-save').attr('type','button');
        $('#btn-save').attr('id','btn-update');

        $('#judul-form').html('Edit Data Proyek');
        editData(id);
    });

    $('#saku-form').on('click', '#btn-update', function(){
        var kode = $('#kode_customer').val();
        msgDialog({
            id:kode,
            type:'edit'
        });
    });

    // BUTTON HAPUS DATA
    function hapusData(id){
        console.log(id)
        $.ajax({
            type: 'DELETE',
            url: "{{ url('java-trans/proyek') }}",
            data: { kode: id },
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.data.status){
                    dataTable.ajax.reload();                    
                    showNotification("top", "center", "success",'Hapus Data','Data Proyek ('+id+') berhasil dihapus ');
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