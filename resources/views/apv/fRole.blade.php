<style>
.form-group{
    margin-bottom:15px !important;
}
</style>
    <div class="container-fluid mt-3">
        <div class="row" id="saku-datatable">
            <div class="col-12">
                <div class="card" style="min-height:560px;">
                    <div class="card-body">
                        <h4 class="card-title">Data Role 
                        <button type="button" id="btn-tambah" class="btn btn-info ml-2" style="float:right;"><i class="fa fa-plus-circle"></i> Tambah</button>
                        </h4>
                        <hr>
                        <div class="table-responsive ">
                            <table id="table-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Role</th>
                                        <th>Regional</th>
                                        <th>Nama Role</th>
                                        <th>Batas Bawah</th>
                                        <th>Batas Atas</th>
                                        <th>Modul</th>
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
            <div class="col-sm-12">
                <div class="card">
                    <form class="form" id="form-tambah">
                        <div class="card-body pb-0 title-form">
                            <h4 class="card-title">Form Data Role
                            <button type="submit" class="btn btn-success ml-2"  style="float:right;" id="btn-save"><i class="fa fa-save"></i> Simpan</button>
                            <button type="button" class="btn btn-secondary ml-2" id="btn-kembali" style="float:right;"><i class="fa fa-undo"></i> Kembali</button>
                            </h4>
                            <hr>
                        </div>
                        <div class="card-body table-responsive pt-0 body-form">
                            <input type="hidden" id="method" name="_method" value="post">
                            <div class="form-group row" id="row-id">
                                <div class="col-9">
                                    <input class="form-control" type="text" id="id" name="id" readonly hidden>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="kode_role" class="col-3 col-form-label">Kode Role</label>
                                <div class="col-3">
                                    <input class="form-control" type="text" placeholder="Kode Role" id="kode_role" name="kode_role" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Kode Regional</label>
                                <div class="col-3">
                                    <select class='form-control' id="kode_pp" name="kode_pp" required>
                                    <option value=''>--- Pilih Regional ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Nama Role</label>
                                <div class="col-9">
                                    <input class="form-control" type="text" placeholder="Nama Role" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Modul</label>
                                <div class="col-3">
                                    <select class='form-control selectize' id="modul" name="modul" required>
                                    <option value=''>--- Pilih Modul ---</option>
                                    <option value='JK'>Justifikasi Kebutuhan</option>
                                    <option value='JP'>Justifikasi Pengadaan</option>
                                    <option value='JV'>Verifikasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Batas Bawah</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text"  id="bawah" name="bawah" required value="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-3 col-form-label">Batas Atas</label>
                                <div class="col-3">
                                    <input class="form-control currency" type="text"  id="atas" name="atas" required value="0">
                                </div>
                            </div>
                            <div class='col-xs-12 mt-2' style='overflow-y: scroll; height:300px; margin:0px; padding:0px;'>
                                <style>
                                th,td{
                                    padding:8px !important;
                                    vertical-align:middle !important;
                                }
                                </style>
                                <table class="table table-striped table-bordered table-condensed" id="input-grid2">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="60%">Jabatan</th>
                                            <th width="10%"><button type="button" href="#" id="add-row" class="btn btn-default"><i class="fa fa-plus-circle"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>     
    
    <script>
    
    setHeightForm();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function sepNum(x){
        var num = parseFloat(x).toFixed(0);
        var parts = num.toString().split(".");
        var len = num.toString().length;
        // parts[1] = parts[1]/(Math.pow(10, len));
        parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,"$1.");
        return parts.join(",");
    }

    function toRp(num){
        if(num < 0){
            return "("+sepNum(num * -1)+")";
        }else{
            return sepNum(num);
        }
    }

    function toNilai(str_num){
        var parts = str_num.split('.');
        number = parts.join('');
        number = number.replace('Rp', '');
        // number = number.replace(',', '.');
        return +number;
    }

    function getPP(){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/unit') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    var select = $('#kode_pp').selectize();
                    select = select[0];
                    var control = select.selectize;
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_pp + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_pp}]);
                        }
                    }
                }
            }
        });
    }

    function getJabatan(param){
        $.ajax({
            type: 'GET',
            url: "{{ url('apv/jabatan') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status){
                    var select = $('.'+param).selectize();
                    select = select[0];
                    var control = select.selectize;
                    if(typeof result.daftar !== 'undefined' && result.daftar.length>0){
                        for(i=0;i<result.daftar.length;i++){
                            control.addOption([{text:result.daftar[i].kode_jab + ' - ' + result.daftar[i].nama, value:result.daftar[i].kode_jab}]);
                        }
                    }
                }
            }
        });
    }

    getPP();
    $('#modul').selectize();

    var action_html = "<a href='#' title='Edit' class='badge badge-info' id='btn-edit'><i class='fas fa-pencil-alt'></i></a> &nbsp; <a href='#' title='Hapus' class='badge badge-danger' id='btn-delete'><i class='fa fa-trash'></i></a>";
    var dataTable = $('#table-data').DataTable({
        // 'processing': true,
        // 'serverSide': true,
        'ajax': {
            'url': "{{ url('apv/role') }}",
            'async':false,
            'type': 'GET',
            'dataSrc' : function(json) {
                if(json.status){
                    return json.daftar;   
                }else{
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/logout') }}";
                    })
                    return [];
                }
            }
        },
        'columnDefs': [
            {'targets': 6, data: null, 'defaultContent': action_html },
            {   'targets': [3,4], 
                'className': 'text-right',
                'render': $.fn.dataTable.render.number( '.', ',', 0, '' ) 
            }
        ],
        'columns': [
            { data: 'kode_role' },
            { data: 'kode_pp' },
            { data: 'nama' },
            { data: 'bawah' },
            { data: 'atas' },
            { data: 'modul' }
        ]
    });

    $('#saku-datatable').on('click', '#btn-tambah', function(){
        $('#row-id').hide();
        $('#id').val('');
        $('#method').val('post');
        $('#kode_role').attr('readonly', false);
        $('#input-grid2 tbody').html('');
        $('#saku-datatable').hide();
        $('#saku-form').show();
        $('#form-tambah')[0].reset();
    });

    $('#saku-form').on('click', '#add-row', function(){
      
        var no=$('#input-grid2 .row-jab:last').index();
        no=no+2;
        var input = "";
        input += "<tr class='row-jab'>";
        input += "<td width='5%' class='no-jab'>"+no+"</td>";
        input += "<td width='60%'><select name='kode_jab[]' class='form-control inp-jab ke"+no+"' value='' required></select></td>";
        input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
        input += "</tr>";
        $('#input-grid2 tbody').append(input);
        getJabatan('ke'+no);
        $('#input-grid2 tbody tr:last').find('.inp-jab')[0].selectize.focus();
    });

    $('#input-grid2').on('keydown', '.inp-nama', function(e){
        if (e.which == 13 || e.which == 9) {
            e.preventDefault();
            $('#add-row').click();
        }
    });

    $('#saku-datatable').on('click', '#btn-edit', function(){
        var id= $(this).closest('tr').find('td').eq(0).html();

        $.ajax({
            type: 'GET',
            url: "{{ url('apv/role') }}/"+id,
            dataType: 'json',
            async:false,
            success:function(res){
                var result = res.data;
                if(result.status){
                    $('#id').val('edit');
                    $('#method').val('put');
                    $('#kode_role').val(id);
                    $('#kode_role').attr('readonly', true);
                    $('#kode_pp')[0].selectize.setValue(result.data[0].kode_pp);
                    $('#modul')[0].selectize.setValue(result.data[0].modul);
                    $('#nama').val(result.data[0].nama);
                    $('#bawah').val(toRp(result.data[0].bawah));
                    $('#atas').val(toRp(result.data[0].atas));
                    var input="";
                    var no=1;
                    for(var x=0;x<result.data2.length;x++){
                        var line = result.data2[x];
                        input += "<tr class='row-jab'>";
                        input += "<td width='5%' class='no-jab'>"+no+"</td>";
                        input += "<td width='60%'><select name='kode_jab[]' class='form-control inp-jab ke"+no+"' value='' required></select></td>";
                        input += "<td width='5%'><a class='btn btn-danger btn-sm hapus-item' style='font-size:8px'><i class='fa fa-times fa-1'></i></td>";
                        input += "</tr>";
                        no++;
                    }
                    $('#input-grid2 tbody').html(input);
                    var no=1;
                    for(var x=0;x<result.data2.length;x++){
                        var line = result.data2[x];
                        getJabatan('ke'+no);
                        $('.ke'+no)[0].selectize.setValue(line.kode_jab);
                        no++;
                    }
                    
                    $('#saku-datatable').hide();
                    $('#saku-form').show();
                }else if(!result.status && result.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/login') }}";
                    })
                }
            }
        });
    });


    $('#saku-form').on('click', '#btn-kembali', function(){
        $('#saku-datatable').show();
        $('#saku-form').hide();
    });


    $('#saku-datatable').on('click','#btn-delete',function(e){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var kode = $(this).closest('tr').find('td:eq(0)').html();       
                
                $.ajax({
                    type: 'DELETE',
                    url: "{{ url('apv/role') }}/"+kode,
                    dataType: 'json',
                    async:false,
                    success:function(result){
                        if(result.data.status){
                            dataTable.ajax.reload();
                            Swal.fire(
                                'Deleted!',
                                'Your data has been deleted.',
                                'success'
                            )
                        }
                        else if(!result.data.status && result.data.message == "Unauthorized"){
                            Swal.fire({
                                title: 'Session telah habis',
                                text: 'harap login terlebih dahulu!',
                                icon: 'error'
                            }).then(function() {
                                window.location.href = "{{ url('apv/login') }}";
                            })
                        }
                        else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.message+'</a>'
                            })
                        }
                    }
                });
                
            }else{
                return false;
            }
        })
    });

    $('#saku-form').on('submit', '#form-tambah', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        
        var kode = $('#kode_role').val();
        if(parameter==''){
            var url = "{{ url('apv/role') }}";
            var pesan = "saved";
        }else{
            
            var url = "{{ url('apv/role') }}/"+kode;
            var pesan = "updated";
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
                        
                }
                else if(!result.data.status && result.data.message == "Unauthorized"){
                    Swal.fire({
                        title: 'Session telah habis',
                        text: 'harap login terlebih dahulu!',
                        icon: 'error'
                    }).then(function() {
                        window.location.href = "{{ url('apv/login') }}";
                    })
                }
                else{
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
    
    $('#input-grid2').on('click', '.hapus-item', function(){
        $(this).closest('tr').remove();
        no=1;
        $('.row-jab').each(function(){
            var nom = $(this).closest('tr').find('.no-jab');
            nom.html(no);
            no++;
        });
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('#kode_role,#kode_pp,#nama,#bawah,#atas').keydown(function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['kode_role','kode_pp','nama','bawah','atas'];
        if (code == 13 || code == 40) {
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx++;
            if(idx == 1){
                $('#'+nxt[idx])[0].selectize.focus();
            }else if(idx == 6){
                $('#add-row').click();
            }
            else{
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

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });
    </script>