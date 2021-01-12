    <link rel="stylesheet" href="{{ asset('trans.css') }}" />
    <!-- FORM INPUT -->
    <style>
        .selected{
            color : var(--theme-color-1);
        }
        .editable{
            cursor:text;
        }
    </style>
    <form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:1rem;padding-bottom:1rem;">
                        <h6 id="judul-form" style="position:absolute;top:25px">Periode Aktif</h6>
                        <button type="submit" class="btn btn-primary ml-2"  style="float:right;" id="btn-save" ><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <div class="separator mb-2"></div>
                    <div class="card-body pt-3 form-body">
                        <input type="hidden" id="method" name="_method" value="post">
                        <div class="form-group row" id="row-id" hidden>
                            <div class="col-9">
                                <input class="form-control" type="text" id="id_edit" name="id" readonly required value="0">
                            </div>
                        </div>
                        <div class='col-xs-12 px-0'>
                            <table id="input-periode" class="table table-bordered table-condensed gridexample" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap" >
                                <thead>
                                    <tr>
                                        <th width="2%">No</th>
                                        <th width="10%">Modul</th>
                                        <th width="40%">Deskripsi</th>
                                        <th width="12%">Periode Awal1</th>
                                        <th width="12%">Periode Akhir1</th>
                                        <th width="12%">Periode Awal2</th>
                                        <th width="12%">Periode Akhir2</th>
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
    </form>
    <!-- FORM INPUT  --> 
    
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
    <script src="{{ asset('helper.js') }}"></script>
    <script>
    var $iconLoad = $('.preloader');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    
    // GRID JURNAL
    function addRow(){
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/periode-aktif') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(result.status) {
                    var input = "";
                    var no = 1;
                    if(result.daftar.length > 0){
                        for(var i=0; i < result.daftar.length; i++){
                            var line = result.daftar[i];
                            input += "<tr class='row-periode'>";
                            input += "<td class='no-periode text-center'>"+no+"</td>";
                            input += "<td><span class='td-modul tdmodulke"+no+" tooltip-span'>"+line.modul+"</span><input type='text' name='modul[]' class='form-control inp-modul modulke"+no+" hidden'  value='"+line.modul+"' readonly></td>";
                            input += "<td><span class='td-ket tdketke"+no+" tooltip-span'>"+line.keterangan+"</span><input type='text' name='keterangan[]' class='form-control inp-ket ketke"+no+" hidden'  value='"+line.keterangan+"' readonly></td>";
                            input += "<td><span class='td-per_awal1 tdper_awal1ke"+no+" tooltip-span'>"+line.per_awal1+"</span><input type='text' name='per_awal1[]' class='form-control inp-per_awal1 per_awal1ke"+no+" hidden'  value='"+line.per_awal1+"' required></td>";
                            input += "<td><span class='td-per_akhir1 tdper_akhir1ke"+no+" tooltip-span'>"+line.per_akhir1+"</span><input type='text' name='per_akhir1[]' class='form-control inp-per_akhir1 per_akhir1ke"+no+" hidden'  value='"+line.per_akhir1+"' required></td>";
                            input += "<td><span class='td-per_awal2 tdper_awal2ke"+no+" tooltip-span'>"+line.per_awal2+"</span><input type='text' name='per_awal2[]' class='form-control inp-per_awal2 per_awal2ke"+no+" hidden'  value='"+line.per_awal2+"' required></td>";
                            input += "<td><span class='td-per_akhir2 tdper_akhir2ke"+no+" tooltip-span'>"+line.per_akhir2+"</span><input type='text' name='per_akhir2[]' class='form-control inp-per_akhir2 per_akhir2ke"+no+" hidden'  value='"+line.per_akhir2+"' required></td>";
                            input += "</tr>";
                            no++;
                        }
                    }
                    $('#input-periode tbody').html(input);
                    // hideUnselectedRow();
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
    
    addRow();

    $('#form-tambah').submit(function(e){
        e.preventDefault();
        var parameter = $('#id_edit').val();
        var url = "{{ url('esaku-master/periode-aktif') }}";
        
        var formData = new FormData(this);
        for(var pair of formData.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
        var data = $('#input-periode tbody');
        if(data.length <= 0){
            msgDialog({
                id:'-',
                type:'warning',
                text: "Transaksi tidak valid. Data Periode sistem tidak boleh kosong."
            });
            return false;
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
                    if(result.data.status){
                        msgDialog({
                            id:result.data.kode,
                            type:'sukses',
                            text: result.data.message
                        });
                        addRow();
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    }else{
                        msgDialog({
                            id: result.data.kode,
                            type: 'sukses',
                            title: 'Error',
                            text: result.data.message
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }
    });


    $('#input-periode').on('keydown','.inp-modul,.inp-ket,.inp-per_awal1, .inp-per_akhir1, .inp-per_awal2, .inp-per_akhir2',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-modul','.inp-ket','.inp-per_awal1','.inp-per_akhir1','.inp-per_awal2','.inp-per_akhir2'];
        var nxt2 = ['.td-modul','.td-ket','.td-per_awal1','.td-per_akhir1','.td-per_awal2','.td-per_akhir2'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                    if($.trim($(this).val()).length){
                        $("#input-periode td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                    }else{
                        alert('Periode tidak valid');
                        return false;
                    }
                    
                    break;
                case 5:
                    if($.trim($(this).val()).length){
                        $("#input-periode td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[idx]).val(isi);
                        $(this).closest('tr').find(nxt2[idx]).text(isi);
                        $(this).closest('tr').find(nxt[idx]).hide();
                        $(this).closest('tr').find(nxt2[idx]).show();
                        $(this).closest('tr').find(nxt[idx_next]).show();
                        $(this).closest('tr').find(nxt2[idx_next]).hide();
                        $(this).closest('tr').find(nxt[idx_next]).focus();
                        var cek = $(this).parents('tr').next('tr').find('.td-modul');
                        if(cek.length > 0){
                            cek.click();
                        }else{
                            return false;
                        }
                    }else{
                        alert('Periode tidak valid');
                        return false;
                    }
                    break;
            }
        }else if(code == 38){
            e.preventDefault();
            var idx = nxt.indexOf(e.target.id);
            idx--;
        }
    });

    function hideUnselectedRow() {
        $('#input-periode > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var modul = $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-modul").val();
                var keterangan = $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-ket").val();
                var per_awal1 = $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_awal1").val();
                var per_akhir1 = $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_akhir1").val();
                var per_awal2 = $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_awal2").val();
                var per_akhir2 = $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_akhir2").val();

                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-modul").val(modul);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-modul").text(modul);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-ket").val(keterangan);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-ket").text(keterangan);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_awal1").val(per_awal1);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_awal1").text(per_awal1);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_akhir1").val(per_akhir1);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_akhir1").text(per_akhir1);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_awal2").val(per_awal2);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_awal2").text(per_awal2);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_akhir2").val(per_akhir2);
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_akhir2").text(per_akhir2);
               
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-modal").hide();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-modal").show();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-ket").hide();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-ket").show();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_awal1").hide();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_awal1").show();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_akhir1").hide();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_akhir1").show();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_awal2").hide();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_awal2").show();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".inp-per_akhir2").hide();
                $('#input-periode > tbody > tr:eq('+index+') > td').find(".td-per_akhir2").show();
            }
        })
    }

    $('#input-periode tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#input-periode tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRow();
    });

    $('#input-periode').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 0){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#input-periode td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var modul = $(this).parents("tr").find(".inp-modul").val();
                var keterangan = $(this).parents("tr").find(".inp-ket").val();
                var per_awal1 = $(this).parents("tr").find(".inp-per_awal1").val();
                var per_akhir1 = $(this).parents("tr").find(".inp-per_akhir1").val();
                var per_awal2 = $(this).parents("tr").find(".inp-per_awal2").val();
                var per_akhir2 = $(this).parents("tr").find(".inp-per_akhir2").val();
                var no = $(this).parents("tr").find(".no-periode").text();
                $(this).parents("tr").find(".inp-modul").val(modul);
                $(this).parents("tr").find(".td-modul").text(modul);
                if(idx == 1){
                    $(this).parents("tr").find(".inp-modul").show();
                    $(this).parents("tr").find(".td-modul").hide();
                    $(this).parents("tr").find(".inp-modul").focus();
                }else{
                    $(this).parents("tr").find(".inp-modul").hide();
                    $(this).parents("tr").find(".td-modul").show();
                    
                }
        
                $(this).parents("tr").find(".inp-ket").val(keterangan);
                $(this).parents("tr").find(".td-ket").text(keterangan);
                if(idx == 2){
                    $(this).parents("tr").find(".inp-ket").show();
                    $(this).parents("tr").find(".td-ket").hide();
                    $(this).parents("tr").find(".inp-ket").focus();
                }else{
                    
                    $(this).parents("tr").find(".inp-ket").hide();
                    $(this).parents("tr").find(".td-ket").show();
                }
        
                $(this).parents("tr").find(".inp-per_awal1").val(per_awal1);
                $(this).parents("tr").find(".td-per_awal1").text(per_awal1);
                if(idx == 3){
                    $(this).parents("tr").find(".inp-per_awal1").show();
                    $(this).parents("tr").find(".td-per_awal1").hide();
                    $(this).parents("tr").find(".inp-per_awal1").focus();
                }else{
                    $(this).parents("tr").find(".inp-per_awal1").hide();
                    $(this).parents("tr").find(".td-per_awal1").show();
                }
        
                $(this).parents("tr").find(".inp-per_akhir1").val(per_akhir1);
                $(this).parents("tr").find(".td-per_akhir1").text(per_akhir1);
                if(idx == 4){
                    $(this).parents("tr").find(".inp-per_akhir1").show();
                    $(this).parents("tr").find(".td-per_akhir1").hide();
                    $(this).parents("tr").find(".inp-per_akhir1").focus();
                }else{
                    $(this).parents("tr").find(".inp-per_akhir1").hide();
                    $(this).parents("tr").find(".td-per_akhir1").show();
                }

                $(this).parents("tr").find(".inp-per_awal2").val(per_awal2);
                $(this).parents("tr").find(".td-per_awal2").text(per_awal2);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-per_awal2").show();
                    $(this).parents("tr").find(".td-per_awal2").hide();
                    $(this).parents("tr").find(".inp-per_awal2").focus();
                }else{
                    $(this).parents("tr").find(".inp-per_awal2").hide();
                    $(this).parents("tr").find(".td-per_awal2").show();
                }

                $(this).parents("tr").find(".inp-per_akhir2").val(per_akhir2);
                $(this).parents("tr").find(".td-per_akhir2").text(per_akhir2);
                if(idx == 6){
                    $(this).parents("tr").find(".inp-per_akhir2").show();
                    $(this).parents("tr").find(".td-per_akhir2").hide();
                    $(this).parents("tr").find(".inp-per_akhir2").focus();
                }else{
                    $(this).parents("tr").find(".inp-per_akhir2").hide();
                    $(this).parents("tr").find(".td-per_akhir2").show();
                }
        
            }
        }
    });


    </script>