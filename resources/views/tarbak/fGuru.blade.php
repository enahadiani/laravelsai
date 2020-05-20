<link href="{{ asset('asset_elite/dist/css/custom.css') }}" rel="stylesheet">
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Data Guru Mata Pelajaran 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <style>
                            th,td{
                                padding:8px !important;
                                vertical-align:middle !important;
                            }
                            .form-group{
                                margin-bottom:15px !important;
                            }
                            
                            .dataTables_wrapper{
                                padding:5px
                            }
                            </style>
                            <table id="table-data" class="table table-bordered table-striped" style='width:100%'>
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kode PP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="saku-form" style="display:none;">
            <div class="col-sm-12" style="height: 90px;">
                <div class="card">
                    <div class="card-body pb-0">
                        <h4 class="card-title mb-4"><i class='fas fa-cube'></i> Form Guru Mata Pelajaran
                        <button type="button" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body table-responsive pt-0" style='height:460px'>
                        <form class="form" id="form-tambah" style='margin-bottom:10px'>
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="hidden" id="id_edit" name="id_edit">
                                    <input type="hidden" id="method" name="_method" value="post"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pp" class="col-3 col-form-label">Kode PP</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_pp" name="kode_pp">
                                    <option value='' disabled>--- Pilih PP ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nik_guru" class="col-3 col-form-label">NIK Guru</label>
                                <div class="col-3">
                                    <select class='form-control' id="nik_guru" name="nik_guru">
                                    <option value='' disabled>--- Pilih NIK ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="flag_aktif" class="col-3 col-form-label">Status</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="flag_aktif" name="flag_aktif">
                                        <option value='' disabled>--- Pilih Status Aktif ---</option>
                                        <option value='1'>Aktif</option>
                                        <option value='0'>Non Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:250px; margin:0px; padding:0px;'>
                                <style>
                                th,td{
                                    padding:8px !important;
                                    vertical-align:middle !important;
                                }
                                </style>
                                <table class="table table-striped table-bordered table-condensed" id="input-grid">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="50%">Mata Pelajaran</th>
                                            <th width="30%">Status</th>
                                            <th width="10%" class="text-center"><button type="button" style='padding:0' href="#" id="add-row" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id='mySidepanel' class='sidepanel close'>
            <h3 style='margin-bottom:20px;position: absolute;'>Filter Data</h3>
            <a href='#' id='btnClose'><i class="float-right ti-close" style="margin-top: 10px;margin-right: 10px;"></i></a>
            <form id="formFilter2" style='margin-top:50px'>
            <div class="row" style="margin-left: -5px;">
                <div class="col-sm-12">
                    <div class="form-group" style='margin-bottom:0'>
                        <label for="kode_pp">PP</label>
                        <select name="kode_pp" id="kode_pp2" class="form-control">
                        <option value="">Pilih PP</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary" style="margin-left: 6px;margin-top: 28px;"><i class="fa fa-search" id="btnPreview2"></i> Preview</button>
                </div>
            </div>
            </form>
        </div>
    </div> 
    
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>            
    <script>

    
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

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var kode_lokasi = "{{Session::get('lokasi')}}";
    var kode_pp = "{{Session::get('kode_pp')}}";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{url('/tarbak/getGuruMatpel')}}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                return json.data;   
            }
        },
        columns: [
            { data: 'nik' },
            { data: 'nama' },
            { data: 'pp' },
            { data: 'action' }
        ],
        'columnDefs': [
            {'targets': 3, data: null, 'defaultContent': action_html }
        ],
        dom: 'lBfrtip',
        buttons: [
            {
                text: '<i class="fa fa-filter"></i> Filter',
                action: function ( e, dt, node, config ) {
                    openFilter();
                },
                className: 'btn btn-default ml-2' 
            }
        ]
    });

    
    $('.sidepanel').on('submit', '#formFilter2', function(e){
        e.preventDefault();
        var kode_pp= $('#kode_pp2')[0].selectize.getValue();
        dataTable.search(kode_pp).draw();
    });
 
    $('.sidepanel').on('click', '#btnClose', function(e){
        e.preventDefault();
        openFilter();
    });
   
    $('#kode_pp').selectize({
        selectOnTab:true,
        onChange: function (val){
            var id = val;
            if (id != "" && id != null && id != undefined){
                getNIKGuru(id);
            }
        }
    });

   function getPP(){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getPP')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        var select = $('#kode_pp').selectize();
                        select = select[0];
                        var control = select.selectize;

                        var select2 = $('#kode_pp2').selectize();
                        select2 = select2[0];
                        var control2 = select2.selectize;
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                            control2.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp + '-' + result.daftar[i].nama}]);
                        }
                    }
                }
            }
        });
    }

    getPP();

    function getNIKGuru(id=null){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getNIKGuru')}}/"+id,
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('#nik_guru').selectize();
                select = select[0];
                var control = select.selectize;
                var kode = control.getValue();
                control.clearOptions();
                if(result.status){
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].nik + ' - ' + result.daftar[i].nama, value:result.daftar[i].nik}]);

                        }
                    }
                }
                if(kode != ""){
                    control.setValue(kode);
                }
            }
        });
    }

    getNIKGuru();

    function getMatpel(id=null,param){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getMatpel')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('.'+param).selectize();
                select = select[0];
                var control = select.selectize;
                var kode = control.getValue();
                control.clearOptions();
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(var i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].kode_matpel + ' - ' + result.data[i].nama, value:result.data[i].kode_matpel}]);
                            
                        }
                    }
                }
                if(kode != ""){
                    control.setValue(kode);
                }
                
            }
        });
    }

    
    function getStatus(id=null,param){
        $.ajax({
            type: 'GET',
            url: "{{url('/tarbak/getStatusGuru')}}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var select = $('.'+param).selectize();
                select = select[0];
                var control = select.selectize;
                var kode = control.getValue();
                control.clearOptions();
                if(result.status){
                    if(typeof result.data !== 'undefined' && result.data.length>0){
                        for(i=0;i<result.data.length;i++){
                            control.addOption([{text:result.data[i].kode_status + ' - ' + result.data[i].nama, value:result.data[i].kode_status}]);
                            
                        }
                    }
                }
                if(kode != ""){
                    control.setValue(kode);
                }
                
            }
        });
    }

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#form-tambah')[0].reset();
        $('#id_edit').val('');
        $('#kode_pp')[0].selectize.setValue('');
        $('#nik_guru')[0].selectize.setValue('');
        $('#flag_aktif')[0].selectize.setValue('');
        $('#input-grid tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();
        var tmp= $(this).closest('tr').find('td').eq(2).html();
        var tmp = tmp.split("-");
        var kode_pp = tmp[0];     

        $.ajax({
            type: 'GET',
            url: '',
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    $('#id_edit').val('edit');
                    $('#method').val('put');
                    $('#kode_pp')[0].selectize.setValue(result.daftar[0].kode_pp);
                    $('#nik_guru')[0].selectize.setValue(id);
                    $('#flag_aktif')[0].selectize.setValue(result.daftar[0].flag_aktif);

                    if(result.daftar2.length > 0){
                        var input = '';
                        var no=1;
                        for(var i=0;i<result.daftar2.length;i++){
                            var line =result.daftar2[i];
                                input += "<tr class='row-guru'>";
                                input += "<td width='5%' class='no-guru'>"+no+"</td>";
                                input += "<td width='50%'><select name='kode_matpel[]' class='form-control inp-matpel mpke"+no+"' value='' required></select></td>";
                                input += "<td width='30%'><select name='kode_status[]' class='form-control inp-status stske"+no+"' value='' required></select></td>";
                                input += "<td width='5%' class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                                input += "</tr>";
                            no++;
                        }
                        $('#input-grid tbody').html(input);
                        var no=1;
                        for(var i=0;i<result.daftar2.length;i++){
                            var line =result.daftar2[i];
                            getMatpel(result.daftar[0].kode_pp,'mpke'+no);
                            $('.mpke'+no)[0].selectize.setValue(line.kode_matpel);
                            getStatus(result.daftar[0].kode_pp,'stske'+no);
                            $('.stske'+no)[0].selectize.setValue(line.kode_status);
                            no++;
                        }
                    }
                   
                    $('#row-id').show();
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }
            }
        });
    });

    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });

    
    $('#btn-save').click(function(){
        $('#form-tambah').submit();
    });

    $('#form-tambah').on('click', '#add-row', function(){
        var no=$('#input-grid .row-guru:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-guru'>";
        input += "<td width='5%' class='no-guru'>"+no+"</td>";
        input += "<td width='50%'><select name='kode_matpel[]' class='form-control inp-matpel mpke"+no+"' value='' required></select></td>";
        input += "<td width='30%'><select name='kode_status[]' class='form-control inp-status stske"+no+"' value='' required></select></td>";
        input += "<td width='5%' class='text-center'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        $('#input-grid tbody').append(input);
        var kode_pp=$('#kode_pp')[0].selectize.getValue();
        getMatpel(kode_pp,'mpke'+no);
        getStatus(kode_pp,'stske'+no);
        $('#input-grid tbody tr:last').find('.inp-matpel')[0].selectize.focus();
    });

     
    $('#input-grid').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-guru').each(function(){
            var nom = $(this).closest('tr').find('.no-guru');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#kode_pp,#nik_guru,#flag_aktif').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_pp','nik_guru','flag_aktif'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 1 || idx == 2 || idx == 3 ){
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

        $('#saku-form').on('submit', '#form-tambah', function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        if(parameter == "edit"){
            var url = "{{ url('/tarbak/postGuruMatpel') }}/"+id;
            var pesan = "updated";
        }else{
            var url = "{{ url('/tarbak/postGuruMatpel') }}";
            var pesan = "saved";
        }

        var formData = new FormData(this);
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
                // alert('Input data '+result.message);
                if(result.data.status){
                    // location.reload();
                    dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                        )
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                 
                }else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('/tarbak/login') }}";
                    }) 
                }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                        })
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    });
    </script>