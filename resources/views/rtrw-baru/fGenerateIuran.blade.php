    <link rel="stylesheet" href="{{ asset('master.css') }}" />
    <link rel="stylesheet" href="{{ asset('form.css') }}" />
    <style>
        .card-body-footer{
            background: white;
            position: fixed;
            bottom: 15px;
            right: 0;
            margin-right: 30px;
            z-index:3;
            height: 60px;
            border-top: ;
            border-bottom-right-radius: 1rem;
            border-bottom-left-radius: 1rem;
            box-shadow: 0 -5px 20px rgba(0,0,0,.04),0 1px 6px rgba(0,0,0,.04);
        }

        .card-body-footer > button{
            float: right;
            margin-top: 10px;
            margin-right: 25px;
        }
    
    </style>

    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                        <h6 id="judul-form" style="position:absolute;top:13px">Generate Iuran</h6>
                        <!-- <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="separator mb-2"></div>
                    <!-- FORM BODY -->
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row " id="row-id">
                            <div class="col-9">
                                <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                <input type="hidden" id="method" name="_method" value="post">
                                <input type="hidden" id="id" name="id">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_jenis">Jenis Iuran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_jenis" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_jenis" id="kode_jenis" name="kode_jenis" value="" title="">
                                    <span class="info-name_kode_jenis hidden">
                                    <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_jenis"></i>
                                </div>                        
                                
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="kode_pp">RT</label>
                                <div class="input-group">
                                    <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_pp" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                    </div>
                                    <input type="text" class="form-control inp-label-kode_pp" id="kode_pp" name="kode_pp" value="" title="">
                                    <span class="info-name_kode_pp hidden">
                                    <span></span> 
                                    </span>
                                    <i class="simple-icon-close float-right info-icon-hapus hidden"></i>
                                    <i class="simple-icon-magnifier search-item2" id="search_kode_pp"></i>
                                </div>                        
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="bulan_awal" >Bulan Awal</label>
                                <select name="bulan_awal" id="bulan_awal" class="form-control selectize" required></select>                         
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="bulan_akhir" >Bulan Akhir</label>
                                <select name="bulan_akhir" id="bulan_akhir" class="form-control selectize" required></select>                         
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="tahun" >Tahun</label>
                                <input class="form-control datepicker" type="text" placeholder="YYYY" id="tahun" name="tahun" required value="{{ date('Y') }}">                         
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="iuran_rt" >Iuran RT</label>
                                <input class="form-control currency" type="text" placeholder="Iuran RT" id="iuran_rt" name="iuran_rt" autocomplete="off" value="25000">    
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="iuran_rw" >Iuran RW</label>
                                <input class="form-control currency" type="text" placeholder="Iuran RT" id="iuran_rw" name="iuran_rw" autocomplete="off" value="125000">
                            </div>
                        </div>
                    </div>
                    <div class="card-body-footer row mx-auto" style="padding: 0 25px;">
                        <div style="vertical-align: middle;" class="col-md-10 text-right p-0">
                            <p class="text-success" id="balance-label" style="margin-top: 20px;"></p>
                        </div>
                        <div style="text-align: right;" class="col-md-2 p-0 ">
                            <button type="submit" style="margin-top: 10px;" id="btn-save" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </form>
    <!-- END FORM INPUT -->
    <button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>

    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script type="text/javascript">
    var valid = true;
    $('#saku-form > .col-12').addClass('mx-auto col-lg-6');
    setHeightForm();

    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function listMonth() {
        var month = [
                {value:'01',text:'Januari'},
                {value:'02',text:'Februari'},
                {value:'03',text:'Maret'},
                {value:'04',text:'April'},
                {value:'05',text:'Mei'},
                {value:'06',text:'Juni'},
                {value:'07',text:'Juli'},
                {value:'08',text:'Agustus'},
                {value:'09',text:'September'},
                {value:'10',text:'Oktober'},
                {value:'11',text:'November'},
                {value:'12',text:'Desember'}
            ];

        for(var i=0;i<month.length;i++) {
            $('#bulan_awal, #bulan_akhir').append(`<option value='${month[i].value}'>${month[i].text}</option>`)
        }
        $('#bulan_akhir').val('12');
        $('.selectize').selectize();
    }

    listMonth();

    function last_add(param,isi){
        var rowIndexes = [];
        dataTable.rows( function ( idx, data, node ) {             
            if(data[param] === isi){
                rowIndexes.push(idx);                  
            }
            return false;
        }); 
        dataTable.row(rowIndexes).select();
        $('.selected td:eq(0)').addClass('last-add');
        console.log('last-add');
        setTimeout(function() {
            console.log('timeout');
            $('.selected td:eq(0)').removeClass('last-add');
            dataTable.row(rowIndexes).deselect();
        }, 1000 * 60 * 10);
    }

    //LIST DATA
    var action_html = "<a href='#' title='Edit' id='btn-edit'><i class='simple-icon-pencil' style='font-size:18px'></i></a> &nbsp;&nbsp;&nbsp; <a href='#' title='Hapus'  id='btn-delete'><i class='simple-icon-trash' style='font-size:18px'></i></a>";
    var dataTable = generateTable(
        "table-data",
        "{{ url('rtrw-master/desa') }}", 
        [
            {'targets': 3, data: null, 'defaultContent': action_html,'className': 'text-center' },
        ],
        [
            { data: 'kode_desa' },
            { data: 'nama' },
            { data: 'kode_camat' }
        ],
        "{{ url('rtrw-auth/sesi-habis') }}",
        [[0 ,"desc"]]
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

    function getJenis(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/jenis-iuran') }}/"+id,
            dataType: 'json',
            data:{kode_jenis:id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_jenis',result.data[0].kode_jenis,result.data[0].nama);
                    }else{
                        $('#kode_jenis').attr('readonly',false);
                        $('#kode_jenis').css('border-left','1px solid #d7d7d7');
                        $('#kode_jenis').val('');
                        $('#kode_jenis').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#kode_jenis').attr('readonly',false);
                    $('#kode_jenis').css('border-left','1px solid #d7d7d7');
                    $('#kode_jenis').val('');
                    $('#kode_jenis').focus();
                }
            }
        });
    }

    function getPP(id=null){
        $.ajax({
            type: 'GET',
            url: "{{ url('rtrw-master/rt') }}/"+id,
            dataType: 'json',
            data:{kode_pp:id},
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        showInfoField('kode_pp',result.data[0].kode_rt,result.data[0].nama);
                    }else{
                        $('#kode_pp').attr('readonly',false);
                        $('#kode_pp').css('border-left','1px solid #d7d7d7');
                        $('#kode_pp').val('');
                        $('#kode_pp').focus();
                    }
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('rtrw-auth/sesi-habis') }}";
                }else{
                    $('#kode_pp').attr('readonly',false);
                    $('#kode_pp').css('border-left','1px solid #d7d7d7');
                    $('#kode_pp').val('');
                    $('#kode_pp').focus();
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function(e){
        e.preventDefault();
        var id = $(this).closest('div').find('input').attr('name');
        switch(id){
            case 'kode_jenis':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('rtrw-master/jenis-iuran') }}",
                    columns : [
                        { data: 'kode_jenis' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Jenis Iuran",
                    pilih : "jenis",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
                break;
            case 'kode_pp':
                var options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('rtrw-master/rt') }}",
                    columns : [
                        { data: 'kode_rt' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar PP/RT",
                    pilih : "pp",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "",
                    width : ["30%","70%"],
                }
                break;

        }
        showInpFilterBSheet(options);
    });

    $('#form-tambah').on('change', '#kode_jenis', function(){
        var par = $(this).val();
        getJenis(par);
    });

    $('#form-tambah').on('change', '#kode_pp', function(){
        var par = $(this).val();
        getPP(par);
    });
    // END CBBL

    //BUTTON SIMPAN /SUBMIT
    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            kode_desa:{
                required: true,
                maxlength:10   
            },
            nama:{
                required: true,
                maxlength:50   
            },
            kode_camat:{
                required: true, 
                maxlength:50  
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            var parameter = $('#id_edit').val();
            var url = "{{ url('rtrw-master/generate-iuran') }}";
            var pesan = "saved";
            
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
                        dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Generate Iuran');
                        $('#method').val('post');
                        msgDialog({
                            id:result.data.kode,
                            type:'simpan'
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                    
                        window.location.href = "{{ url('/rtrw-auth/sesi-habis') }}";
                        
                    }else{
                        if(result.data.kode == "-" && result.data.jekode_desa != undefined){
                            msgDialog({
                                id: id,
                                type: result.data.jekode_desa,
                                text:'Kode Desa sudah digunakan'
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
                error: function(xhr, status, error) {
                    var error = JSON.parse(xhr.responseText);
                    var detail = Object.values(error.errors)
                    Swal.fire({
                        type: 'error',
                        title: error.message,
                        text: detail[0]
                    })
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
            $('#btn-save').html("Simpan").removeAttr('disabled');
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

    $('#kode_jenis,#kode_pp,#bulan_awal,#bulan_akhir,#tahun,#iuran_rt,#iuran_rw').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_jenis','kode_pp','bulan_awal','bulan_akhir','tahun','iuran_rt','iuran_rw'];
        if (code == 13 || code == 40) {
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
    </script>