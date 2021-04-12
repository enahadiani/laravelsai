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

<form id="form-tambah" class="tooltip-label-right" novalidate>
    <input type="hidden" name="kode_akun" id="kode_akun">
    <input type="hidden" name="umur" id="umur">
    <input type="hidden" name="kode_pp_susut" id="kode_pp_susut">
    <div class="row" id="saku-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                    <h6 id="judul-form" style="position:absolute;top:13px">Percepatan Penyusutan</h6>
                    {{-- <button type="button" id="btn-kembali" aria-label="Kembali" class="btn btn-back">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="separator mb-2"></div>
                <div class="card-body pt-3 form-body">
                    <input type="hidden" id="method" name="_method" value="post">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tanggal">Tanggal</label>
                            <input class='form-control datepicker' type="text" id="tanggal" name="tanggal" value="{{ date('d/m/Y') }}" required>
                            <i style="font-size: 18px;margin-top:30px;margin-left:5px;position: absolute;top: 0;right: 25px;" class="simple-icon-calendar date-search"></i>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="aktiva_tetap">No Aktiva Tetap</label>
                            <div class="input-group">
                                <div class="input-group-prepend hidden" style="border: 1px solid #d7d7d7;">
                                    <span class="input-group-text info-code_aktiva_tetap" readonly="readonly" title="" data-toggle="tooltip" data-placement="top" ></span>
                                </div>
                                <input type="text" class="cbbl form-control inp-label-aktiva_tetap" id="aktiva_tetap" name="aktiva_tetap" value="" title="" readonly>
                                <span class="info-name_aktiva_tetap hidden">
                                    <span id="label_aktiva_tetap"></span> 
                                </span>
                                <i class="simple-icon-close float-right info-icon-hapus hidden" style="cursor: pointer;"></i>
                                <i class="simple-icon-magnifier search-item2" id="search_aktiva_tetap"></i>
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="jumlah">Jumlah Penyusutan</label>
                            <input type="text" placeholder="Jumlah" class="form-control currency" id="jumlah" name="jumlah" value="0" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="keterangan">Keterangan</label>
                            <input class='form-control' type="text" id="keterangan" name="keterangan" placeholder="Keterangan" required>
                        </div>
                        <div class="form-group col-md-3 col-sm-12"></div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_penyusutan">Nilai Penyusutan</label>
                            <input type="text" placeholder="Nilai Penyusutan" class="form-control currency" id="nilai_penyusutan" name="nilai_penyusutan" value="0" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_perolehan">Nilai Perolehan</label>
                            <input type="text" placeholder="Nilai Perolehan" class="form-control currency" id="nilai_perolehan" name="nilai_perolehan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="total_perolehan">Total Penyusutan</label>
                            <input type="text" placeholder="Total Penyusutan" class="form-control currency" id="total_penyusutan" name="total_penyusutan" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_buku">Nilai Buku</label>
                            <input type="text" placeholder="Nilai Buku" class="form-control currency" id="nilai_buku" name="nilai_buku" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_residu">Nilai Residu</label>
                            <input type="text" placeholder="Nilai Residu" class="form-control currency" id="nilai_residu" name="nilai_residu" value="0" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="nilai_referensi">Nilai Referensi Susut</label>
                            <input type="text" placeholder="Nilai Referensi Susut" class="form-control currency" id="nilai_referensi_susut" name="nilai_referensi_susut" value="0" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="no_seri">No Seri</label>
                            <input type="text" placeholder="No Seri" class="form-control" id="no_seri" name="no_seri" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="merk">Merk</label>
                            <input type="text" placeholder="Merk" class="form-control" id="merk" name="merk" required readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="tipe">Tipe</label>
                            <input type="text" placeholder="Tipe" class="form-control" id="tipe" name="tipe" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="akun_akumulasi">Akun Akumulasi</label>
                            <input type="text" placeholder="Akun Akumulasi" class="form-control" id="akun_akumulasi" name="akun_akumulasi" required readonly>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="akun_beban_penyusutan">Akun Beban Penyusutan</label>
                            <input type="text" placeholder="Akun Beban Penyusutan" class="form-control" id="akun_beban_penyusutan" name="akun_beban_penyusutan" required readonly>
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
<script src="{{url('asset_elite/inputmask.js')}}"></script>
<script src="{{ asset('asset_dore/js/vendor/jquery.validate/sai-validate-custom.js') }}"></script>
<script src="{{ asset('helper.js') }}"></script>
<script type="text/javascript">
    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true
    });

    $("input.datepicker").bootstrapDP({
        autoclose: true,
        format: 'dd/mm/yyyy',
        templates: {
            leftArrow: '<i class="simple-icon-arrow-left"></i>',
            rightArrow: '<i class="simple-icon-arrow-right"></i>'
        }
    });

    function resetForm() {
        $('#upload tbody').empty()
        $('#no-rab').hide();
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
        $('#input-grid tbody').empty();
    }

    $('#form-tambah').on('click', '.search-item2', function(){
        var tanggal = $('#tanggal').val()
        var id = $(this).closest('div').find('input').attr('name');
        showInpFilter({
            id : id,
            header : ['Kode', 'Nama'],
            url : "{{ url('esaku-trans/percepatan-aktap') }}",
            columns : [
                { data: 'no_fa' },
                { data: 'nama' }
            ],
            parameter: {
                tanggal: tanggal
            },
            judul : "Daftar Aktiva Tetap",
            pilih : "akun",
            jTarget1 : "text",
            jTarget2 : "text",
            target1 : ".info-code_"+id,
            target2 : ".info-name_"+id,
            target3 : "custom",
            target4 : "custom",
            width : ["30%","70%"],
        });
    });

    function custTarget(target, tr) {
        var from = target;
        var keyString = '_'
        var fromTarget = from.substr(from.indexOf(keyString) + keyString.length, from.length);
        if(fromTarget === 'aktiva_tetap') {
            var tanggal = $('#tanggal').val()
            var aktap = $('#aktiva_tetap').val()
            $.ajax({
                type: 'GET',
                url: "{{ url('esaku-trans/percepatan-data-aktap') }}",
                data: { 'tanggal':tanggal, 'aktap':aktap},
                dataType: 'json',
                async:false,
                success:function(result) {
                    var data = result.data.success.data[0]
                    $('#kode_akun').val(data.kode_akun)
                    $('#kode_pp_susut').val(data.kode_pp_susut)
                    $('#merk').val(data.merk)
                    $('#tipe').val(data.tipe)
                    $('#no_seri').val(data.no_seri)
                    $('#akun_akumulasi').val(data.akun_deprs +"-"+ data.nama_deprs)
                    $('#akun_beban_penyusutan').val(data.akun_bp +"-"+ data.nama_bp)
                    $('#nilai_perolehan').val(parseInt(data.nilai))
                    $('#nilai_buku').val(parseInt(data.nilai_buku))
                    $('#nilai_residu').val(parseInt(data.nilai_residu))
                    $('#nilai_referensi_susut').val(parseInt(data.nilai_susut))
                    $('#nilai_penyusutan').val(parseInt(data.tot_susut))
                    $('#umur').val(data.umur)
                }
            })
        }
    }

    $('#form-tambah').validate({
        ignore: [],
        rules: 
        {
            no_proyek:{
                required: true   
            },
            nilai_kontrak:{
                required: true   
            }
        },
        errorElement: "label",
        submitHandler: function (form, event) {
            event.preventDefault();
            
            var url = "{{ url('esaku-trans/percepatan-penyusutan') }}";
            var pesan = "saved";
            var text = "Data tersimpan";

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
                    if(result.data.success.status){
                        $('#row-id').hide();
                        $('#form-tambah')[0].reset();
                        $('#form-tambah').validate().resetForm();
                        $('[id^=label]').html('');
                        $('#id_edit').val('');
                        $('#method').val('post');
                        resetForm();
                        msgDialog({
                            id:result.data.success.no_bukti,
                            type:'simpan'
                        });
                    }else if(!result.data.status && result.data.message === "Unauthorized"){
                        window.location.href = "{{ url('/java-auth/sesi-habis') }}";
                    }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<p>'+result.data.success.message+'</p>'
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