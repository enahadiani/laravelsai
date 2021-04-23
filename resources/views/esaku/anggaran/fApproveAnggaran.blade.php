<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/form.css') }}" />
<link rel="stylesheet" href="{{ asset('trans-esaku/grid.css') }}" />

<style>
    .form-header {
        padding-top:1rem;
        padding-bottom:1rem;
    }
    .judul-form {
        margin-bottom:0;
        margin-top:5px;   
    }
</style>

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input type="hidden" id="method" name="_method" value="post">
    <div class="row" id="saku-form">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:25px">Approve RRA Anggaran</h6>
                    {{-- <button type="button" id="btn-kembali" aria-label="Kembali" class="btn">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="status">Status Approval</label>
                            <select class="form-control" name="status" id="status">
                                <option selected value="APPROVE">Approve</option>
                                <option value="NONAPPROVE">Non-Approve</option>
                                <option value="RETURN">Return</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_usulan">No Usulan</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_no_usulan" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-no_usulan" id="no_usulan" name="no_usulan" value="" title="" readonly>
                                <span class="info-name_no_usulan hidden">
                                    <span id="label_no_usulan"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_no_usulan"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" rows="4" id="catatan" name="catatan" required></textarea>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" rows="4" id="keterangan" name="keterangan" readonly></textarea>
                        </div>
                    </div>
                    <ul class="nav nav-tabs col-12 " role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data-rra" role="tab" aria-selected="true"><span class="hidden-xs-down">Item RRA</span></a> </li>
                    </ul>
                    <div class="tab-content tabcontent-border col-12 p-0" style="margin-bottom: 2.5rem;">
                        <div class="tab-pane active" id="data-rra" role="tabpanel">
                            <div class='col-md-12 nav-control' style="padding: 0px 5px;">
                                <a style="font-size:18px;float: right;margin-top: 6px;text-align: right;" class=""><span style="font-size:12.8px;padding: .5rem .5rem .5rem 1.25rem;margin: auto 0;" id="total-row-rra"></span></a>
                            </div>
                            <table class="table table-bordered table-condensed gridexample" id="rra-grid" style="width:100%;table-layout:fixed;word-wrap:break-word;white-space:nowrap">
                                <thead style="background:#F8F8F8;">
                                    <tr>
                                        <th style="width:5%">Bulan</th>
                                        <th style="width:20%">Akun</th>
                                        <th style="width:20%">PP</th>
                                        <th style="width:20%">DRK</th>
                                        <th style="width:10%">Jenis</th>
                                        <th style="width:25%">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function hitungTotalRowRRA(){
        var total_row = $('#rra-grid tbody tr').length;
        $('#total-row-rra').html(total_row+' Baris');
    }

    function getDataRRA(no_pdrk) {
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-trans/rra-data') }}",
            dataType: 'json',
            data: { no_pdrk: no_pdrk },
            async:false,
            success:function(result) {    
                if(result.status) {
                    var html = "";
                    var no = 1;
                    if(result.data.data_rra.length > 0) {
                        for(var i=0;i<result.data.data_rra.length;i++) {
                            var data = result.data.data_rra[i]
                            var akun = data.kode_akun+"-"+data.nama_akun
                            if(akun.length > 30) {
                                akun = akun.substr(0, 30) + '...'
                            }
                            html += "<tr class='row-rra row-rra-"+no+"'>"
                            html += "<td class='no-rra text-center hidden'>"+no+"</td>"
                            html += "<td class='text-center'><div>"
                            html += "<span class='td-bulan tdbulanke"+no+" tooltip-span'>"+data.bulan+"</span>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-akun tdakunke"+no+" tooltip-span'>"+akun+"</span>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-pp tdppke"+no+" tooltip-span'>"+data.kode_pp+"-"+data.nama_pp+"</span>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-drk tddrkke"+no+" tooltip-span'>"+data.kode_pp+"-"+data.nama_pp+"</span>"
                            html += "</div></td>"
                            html += "<td><div>"
                            html += "<span class='td-jenis tdjeniske"+no+"'>-</span>"
                            html += "<input type='text' name='jenis[]' class='inp-jenis form-control jeniske"+no+" hidden'  value='-'>"
                            html += "</div></td>"
                            html += "<td class='text-right'>"
                            html += "<span class='td-nilai tdnilaike"+no+"'>0</span>"
                            html += "<input type='text' name='nilai[]' class='inp-nilai form-control nilaike"+no+" hidden currency'  value='0' required>"
                            html += "</td>"
                            html += "</tr>"
                        }

                        $('#rra-grid tbody').append(html);
        
                        $('.currency').inputmask("numeric", {
                            radixPoint: ",",
                            groupSeparator: ".",
                            digits: 2,
                            autoGroup: true,
                            rightAlign: true,
                            oncleared: function () {  }
                        });

                        $('.tooltip-span').tooltip({
                            title: function(){
                                return $(this).text();
                            }
                        });

                        hitungTotalRowRRA()
                    }
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

    function resetForm() {
        $('#rra-grid tbody').empty()
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=info-name]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class^=input-group-text]").each(function(e){
            $(this).text('');
        });
        $("[class^=input-group-prepend]").each(function(e){
            $(this).addClass('hidden');
        });
        $("[class*='inp-label-']").each(function(e){
            $(this).removeAttr("style");
        })
        $("[class^=info-code]").each(function(e){
            $(this).text('');
        });
        $("[class^=simple-icon-close]").each(function(e){
            $(this).addClass('hidden');
        });
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

    function custTarget(target, tr) {
        var from = target;
        var keyString = '_'
        var fromTarget = from.substr(from.indexOf(keyString) + keyString.length, from.length);
        if(fromTarget === 'no_usulan') {
            var kode = tr.find('td:nth-child(1)').text();
            var keterangan = tr.find('td:nth-child(2)').text();
            $('#keterangan').val(keterangan)
            getDataRRA(kode)
        }
    }

    $('#form-tambah').on('click', '.search-item2', function() { 
        var id = $(this).closest('div').find('input').attr('name');
        switch(id) {
            case 'no_usulan': 
                var settings = {
                    id : id,
                    header : ['No RRA', 'Keterangan'],
                    url : "{{ url('esaku-trans/rra-anggaran') }}",
                    columns : [
                        { data: 'no_bukti' },
                        { data: 'keterangan' }
                    ],
                    judul : "Daftar RRA Anggaran",
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
    })

     function hideAllRowRRA() {
        $('#rra-grid tbody tr').removeClass('selected-row');
        $('#rra-grid tbody td').removeClass('px-0 py-0 aktif');
        $('#rra-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
                var bulan = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text();
                var pp = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text();
                var drk = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text();
                var akun = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text();
                var jenis = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-jenis").val();
                var nilai = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text(bulan);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text(akun);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(pp);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(drk);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-jenis").val(jenis);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-jenis").text(jenis);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-akun").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-jenis").hide();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-jenis").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    function hideUnselectedRowRRA() {
        $('#rra-grid > tbody > tr').each(function(index, row) {
            if(!$(row).hasClass('selected-row')) {
               var bulan = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text();
                var pp = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text();
                var drk = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text();
                var akun = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text();
                var jenis = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-jenis").val();
                var nilai = $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val();

                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").text(bulan);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-akun").text(akun);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-pp").text(pp);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-drk").text(drk);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-jenis").val(jenis);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-jenis").text(jenis);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").val(nilai);
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").text(nilai);

                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-bulan").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-akun").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-drk").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-pp").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-jenis").hide();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-jenis").show();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".inp-nilai").hide();
                $('#rra-grid > tbody > tr:eq('+index+') > td').find(".td-nilai").show();
            }
        })
    }

    $('#rra-grid tbody').on('click', 'tr', function(){
        $(this).addClass('selected-row');
        $('#rra-grid tbody tr').not(this).removeClass('selected-row');
        hideUnselectedRowRRA();
    });

    $('#rra-grid').on('click', 'td', function(){
        var idx = $(this).index();
        if(idx == 1 || idx == 2 || idx == 3 || idx == 4){
            return false;
        }else{
            if($(this).hasClass('px-0 py-0 aktif')){
                return false;            
            }else{
                $('#rra-grid td').removeClass('px-0 py-0 aktif');
                $(this).addClass('px-0 py-0 aktif');
        
                var bulan = $(this).parents("tr").find(".td-bulan").text();
                var pp = $(this).parents("tr").find(".td-pp").text();
                var drk = $(this).parents("tr").find(".td-drk").text();
                var akun = $(this).parents("tr").find(".td-akun").text();
                var jenis = $(this).parents("tr").find(".inp-jenis").val();
                var nilai = $(this).parents("tr").find(".inp-nilai").val();

                $(this).parents("tr").find(".td-bulan").text(bulan);
                $(this).parents("tr").find(".td-akun").text(akun);
                $(this).parents("tr").find(".td-pp").text(pp);
                $(this).parents("tr").find(".td-drk").text(drk);
                

                $(this).parents("tr").find(".inp-jenis").val(jenis);
                $(this).parents("tr").find(".td-jenis").text(jenis);
                if(idx == 5){
                    $(this).parents("tr").find(".inp-jenis").show();
                    $(this).parents("tr").find(".td-jenis").hide();
                    $(this).parents("tr").find(".inp-jenis").focus();
                }else{
                    $(this).parents("tr").find(".inp-jenis").hide();
                    $(this).parents("tr").find(".td-jenis").show();
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
            }
        }
    });

    var $twicePressRRA = 0;
    $('#rra-grid').on('keydown','.inp-jenis, .inp-nilai',function(e){
        var code = (e.keyCode ? e.keyCode : e.which);
        var nxt = ['.inp-jenis','.inp-nilai'];
        var nxt2 = ['.td-jenis','.td-nilai'];
        if (code == 13 || code == 9) {
            e.preventDefault();
            var idx = $(this).closest('td').index()-1;
            var idx_next = idx+1;
            var kunci = $(this).closest('td').index()+1;
            var isi = $(this).val();
            switch (idx) {
                case 4:
                    if(isi != ""){
                        $("#rra-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        $(this).closest('tr').find(nxt[0]).val(isi);
                        $(this).closest('tr').find(nxt2[0]).text(isi);
                        $(this).closest('tr').find(nxt[0]).hide();
                        $(this).closest('tr').find(nxt2[0]).show();

                        $(this).closest('tr').find(nxt[1]).show();
                        $(this).closest('tr').find(nxt2[1]).hide();
                        $(this).closest('tr').find(nxt[1]).focus();
                    }else{
                        alert('Jenis yang dimasukkan tidak valid');
                        return false;
                    }
                break;
                case 5:
                    if(isi != "" && isi != 0){
                        $("#rra-grid td").removeClass("px-0 py-0 aktif");
                        $(this).parents("tr").find("td:eq("+kunci+")").addClass("px-0 py-0 aktif");
                        if(code == 13 || code == 9) {
                            if($twicePressRRA == 1) {
                                $(this).closest('tr').find(nxt[1]).val(isi);
                                $(this).closest('tr').find(nxt2[1]).text(isi);
                                $(this).closest('tr').find(nxt[1]).hide();
                                $(this).closest('tr').find(nxt2[1]).show();
                                var cek = $(this).parents('tr').next('tr').find('.td-jenis');
                                if(cek.length > 0){
                                    cek.click();
                                }
                            }
                            $twicePressRRA = 1
                            setTimeout(() => $twicePressRRA = 0, 1000)
                        }
                    }else{
                        alert('Nilai yang dimasukkan tidak valid');
                        return false;
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

    $('#form-tambah').validate({
        ignore: [],
        rules: {},
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();

            var parameter = $('#id_edit').val();
            var id = $('#id').val();

            if(parameter == "edit"){
                var url = "{{ url('esaku-trans/approve-rra-ubah') }}";
                var pesan = "updated";
                var text = "Perubahan data "+id+" telah tersimpan";
            }else{
                var url = "{{ url('esaku-trans/approve-rra') }}";
                var pesan = "saved";
                var text = "Data tersimpan";
            }

            var formData = new FormData(form);
            // $('#pemberi-grid tbody tr').each(function(index) {
            //     formData.append('no_pemberi[]', $(this).find('.no-pemberi').text())
            // })
            // formData.append('donor', $totalPemberi)
            
            // if(parameter == "edit") {
            //     formData.append('no_bukti', id)
            // }
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
                    if(result.data.success.status){
                        // dataTable.ajax.reload();
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Approve RRA Anggaran');
                        $('#method').val('post');
                        resetForm();
                        msgDialog({
                            id:result.data.success.no_bukti,
                            type:'simpan'
                        });
                    }else if(!result.data.success.status && result.data.success.message === "Unauthorized"){
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>'+result.data.success.message+'</a>'
                        })
                    }
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

</script>