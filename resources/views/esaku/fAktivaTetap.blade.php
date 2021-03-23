<link rel="stylesheet" href="{{ asset('trans.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
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

{{-- Form Input --}}
<form id="form-tambah" class="tooltip-label-right" novalidate>
    <div class="row" id="saku-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px"></h6>
                    {{-- <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <input type="hidden" placeholder="Deskripsi Akun" class="form-control" id="deskripsi_akun" name="deskripsi_akun" readonly>
                    <input type="hidden" placeholder="Persentase" class="form-control currency" id="persen" name="persen" value="0" readonly>
                    <input type="hidden" class="cbbl form-control inp-label-kode_pp1" id="kode_pp1" name="kode_pp1" value="-" title="" readonly>
                    <input type="hidden" class="cbbl form-control inp-label-kode_pp2" id="kode_pp2" name="kode_pp2" value="-" title="" readonly>

                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tgl_perolehan">Tanggal Perolehan</label>
                            <input class='form-control datepicker' type="text" id="tgl_perolehan" name="tgl_perolehan" value="{{ date('d/m/Y') }}" required>
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tgl_susut">Tanggal Susut</label>
                            <input class='form-control datepicker' type="text" id="tgl_susut" name="tgl_susut" value="{{ date('d/m/Y') }}" required>
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="kode_klpakun">Akun Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_klpakun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-kode_klpakun" id="kode_klpakun" name="kode_klpakun" value="" title="" readonly>
                                <span class="info-name_kode_klpakun hidden">
                                    <span id="label_kode_klpakun"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_klpakun"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="kode_klpfa">Kelompok Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_kode_klpfa" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-kode_klpfa" id="kode_klpfa" name="kode_klpfa" value="" title="" readonly>
                                <span class="info-name_kode_klpfa hidden">
                                    <span id="label_kode_klpfa"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_kode_klpfa"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_bukti">No Bukti</label>
                            <input type="text" placeholder="No Bukti" class="form-control" id="no_bukti" name="no_bukti" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="deskripsi">Keterangan Aktiva Tetap</label>
                            <input type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="umur">Umur (Bulan)</label>
                            <input type="text" placeholder="Umur" class="form-control currency" id="umur" name="umur" value="0" readonly required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" placeholder="Jumlah" class="form-control currency" id="jumlah" name="jumlah" value="0" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai">Nilai Perolehan</label>
                            <input type="text" placeholder="Nilai Perolehan" class="form-control currency" id="nilai_perolehan" name="nilai_perolehan" value="0" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="residu">Nilai Residu</label>
                            <input type="text" placeholder="Nilai Residu" class="form-control currency" id="residu" name="residu" value="0" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Total</label>
                            <input type="text" placeholder="Total" class="form-control currency" id="total" name="total" value="0" readonly required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_seri">Nomor Seri</label>
                            <input type="text" placeholder="Nomor Seri" class="form-control" id="no_seri" name="no_seri" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="merk">Merk</label>
                            <input type="text" placeholder="Merk" class="form-control" id="merk" name="merk" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Tipe</label>
                            <input type="text" placeholder="Tipe" class="form-control" id="tipe" name="tipe" required>
                        </div>
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="tgl_perolehan">Tanggal Perolehan</label>
                                    <input class='form-control datepicker' type="text" id="tgl_perolehan" name="tgl_perolehan" value="{{ date('d/m/Y') }}" required>
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tgl_susut">Tanggal Susut</label>
                                    <input class='form-control datepicker' type="text" id="tgl_susut" name="tgl_susut" value="{{ date('d/m/Y') }}" required>
                                    <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_klpfa">Kelompok Barang</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_klpfa" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-kode_klpfa" id="kode_klpfa" name="kode_klpfa" value="" title="" readonly>
                                        <span class="info-name_kode_klpfa hidden">
                                            <span id="label_kode_klpfa"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_klpfa"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_klpakun">Kelompok Akun</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_klpakun" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-kode_klpakun" id="kode_klpakun" name="kode_klpakun" value="" title="" readonly>
                                        <span class="info-name_kode_klpakun hidden">
                                            <span id="label_kode_klpakun"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_klpakun"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <label for="deskripsi_akun">Deskripsi Akun</label>
                                    <input type="text" placeholder="Deskripsi Akun" class="form-control" id="deskripsi_akun" name="deskripsi_akun" readonly>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="umur">Umur (Bulan)</label>
                                    <input type="text" placeholder="Umur" class="form-control currency" id="umur" name="umur" value="0" readonly required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="persen">Persentase</label>
                                    <input type="text" placeholder="Persentase" class="form-control currency" id="persen" name="persen" value="0" readonly required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="no_bukti">No Bukti</label>
                                    <input type="text" placeholder="No Bukti" class="form-control" id="no_bukti" name="no_bukti" required>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-8 col-sm-12">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" placeholder="Deskripsi" class="form-control" id="deskripsi" name="deskripsi" required>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label for="no_seri">Nomor Seri</label>
                                    <input type="text" placeholder="Nomor Seri" class="form-control" id="no_seri" name="no_seri" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="merk">Merk</label>
                                    <input type="text" placeholder="Merk" class="form-control" id="merk" name="merk" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tipe">Tipe</label>
                                    <input type="text" placeholder="Tipe" class="form-control" id="tipe" name="tipe" required>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" placeholder="Jumlah" class="form-control currency" id="jumlah" name="jumlah" value="0" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="nilai">Nilai Perolehan</label>
                                    <input type="text" placeholder="Nilai Perolehan" class="form-control currency" id="nilai_perolehan" name="nilai_perolehan" value="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="residu">Nilai Residu</label>
                                    <input type="text" placeholder="Nilai Residu" class="form-control currency" id="residu" name="residu" value="0" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="tipe">Total</label>
                                    <input type="text" placeholder="Total" class="form-control currency" id="total" name="total" value="0" readonly required>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_pp1">Kode PP Aktiva Tetap</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_pp1" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-kode_pp1" id="kode_pp1" name="kode_pp1" value="" title="" readonly>
                                        <span class="info-name_kode_pp1 hidden">
                                            <span id="label_kode_pp1"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_pp1"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label for="kode_pp2">Kode PP Penyusutan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                            <span class="input-group-text info-code_kode_pp2" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                        </div>
                                        <input type="text" class="cbbl form-control inp-label-kode_pp2" id="kode_pp2" name="kode_pp2" value="" title="" readonly>
                                        <span class="info-name_kode_pp2 hidden">
                                            <span id="label_kode_pp2"></span> 
                                        </span>
                                        <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                        <i class="simple-icon-magnifier search-item2" id="search_kode_pp2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

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

<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    setHeightForm();
    var $nilaiPerolehan = 0;
    var $jumlahPerolehan = 0;
    var scrollform = document.querySelector('.form-body');
    new PerfectScrollbar(scrollform);
    $('#judul-form').html('Form Input Aktiva Tetap');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('.selectize').selectize();

    $('.info-icon-hapus').click(function(){
        var par = $(this).closest('div').find('input').attr('name');
        $('#'+par).val('');
        // $('#'+par).attr('readonly',false);
        $('#'+par).attr('style','border-top-left-radius: 0.5rem !important;border-bottom-left-radius: 0.5rem !important');
        $('.info-code_'+par).parent('div').addClass('hidden');
        $('.info-name_'+par).addClass('hidden');
        $(this).addClass('hidden');
    });

    function resetForm() {
        $("[id^=label]").each(function(e){
            $(this).text('');
        });
        $("[class^=cbbl]").each(function(e){
            $(this).val('');
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

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    $('#jumlah, #nilai_perolehan').change(function(){
        var id = $(this).attr('id');
        if(id == 'jumlah') {
            $jumlahPerolehan = toNilai($(this).val());
        } else if(id == 'nilai_perolehan') {
            $nilaiPerolehan = toNilai($(this).val());
        }
        var total = $jumlahPerolehan * $nilaiPerolehan;
        $('#total').val(total);
    })

    function custTarget(target, tr) {
        var kode = tr.find('td:nth-child(1)').text();
        $.ajax({
            type: 'GET',
            url: "{{ url('esaku-master/akun-aktiva-tetap-detail') }}",
            data: { kode_klpakun:kode },
            dataType: 'json',
            success:function(result){
                if(result.status){
                    var data = result.daftar[0];
                    $('#deskripsi_akun').val(data.nama);
                    $('#umur').val(parseFloat(data.umur));
                    $('#persen').val(parseFloat(data.persen));
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
            }
        });
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var id = $(this).closest('div').find('input').attr('name');
        var options = {}
        switch(id){
            case 'kode_klpfa':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/klp-barang') }}",
                    columns : [
                        { data: 'kode_klpfa' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Kelompok",
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
            case 'kode_klpakun':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-master/akun-aktiva-tetap') }}",
                    columns : [
                        { data: 'kode_klpakun' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
                    pilih : "",
                    jTarget1 : "text",
                    jTarget2 : "text",
                    target1 : ".info-code_"+id,
                    target2 : ".info-name_"+id,
                    target3 : "",
                    target4 : "custom",
                    width : ["30%","70%"],
                }
            break;
            case 'kode_pp1':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-report/filter-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
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
            case 'kode_pp2':
                options = {
                    id : id,
                    header : ['Kode', 'Nama'],
                    url : "{{ url('esaku-report/filter-pp') }}",
                    columns : [
                        { data: 'kode_pp' },
                        { data: 'nama' }
                    ],
                    judul : "Daftar Akun",
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
        }
        showInpFilter(options);
    });

    $('#form-tambah').validate({
        ignore:[],
        rules: {},
        errorElement: "label",
        submitHandler: function(form) {
            var kode = $(form).find('#no_bukti').val();
            var url = "{{ url('esaku-trans/aktap') }}";
            var pesan = "saved";
            var text = "Data tersimpan dengan kode "+kode;
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
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#judul-form').html('Form Input Aktiva Tetap');
                        resetForm();
                        msgDialog({
                            id:result.data.no_fa,
                            type:'simpan'
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/esaku-auth/sesi-habis') }}";
                    }else {
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
        },
        errorPlacement: function (error, element) {
            var id = element.attr("id");
            $("label[for="+id+"]").append("<br/>");
            $("label[for="+id+"]").append(error);
        }
    });

</script>