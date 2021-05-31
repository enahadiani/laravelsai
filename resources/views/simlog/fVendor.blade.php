<link rel="stylesheet" href="{{ asset('master.css') }}" />
<link rel="stylesheet" href="{{ asset('form.css') }}" />
<link rel="stylesheet" href="{{ asset('master-esaku/form.css') }}" />
<style>
    .form-control {
        border-radius:0px;
        border-top:0px !important;
        border-right:0px !important;
        border-left:0px !important;
    }
    .form-control[readonly] {
        background: none !important;
    }
    label{
        font-weight:bold;
    }
</style>
<form id="form-tambah" class="tooltip-label-right" novalidate>
        <div class="row" id="saku-form" >
            <div class="col-12">
                <div class="card">
                    <div class="card-body form-header" style="padding-top:0.5rem;padding-bottom:0.5rem;min-height:48px;">
                        <h6 id="judul-form" style="position:absolute;top:13px;font-weight:bold">Data Vendor</h6>
                    </div>
                    <!-- FORM BODY -->
                    <div class="separator"></div>
                    <div class="card-body pt-3 form-body">
                        <div class="form-group row mt-3">
                            <label for="kode_vendor" class="col-sm-2 col-form-label">Kode Vendor</label>
                            <div class="col-sm-3">
                            <input readonly type="text" class="form-control" id="kode_vendor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-8">
                            <input readonly type="text" class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                            <input readonly type="text" class="form-control" id="alamat">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="no_tel" class="col-sm-2 col-form-label">No Telp</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="no_tel">
                            </div>
                            <label for="no_fax" class="col-sm-2 col-form-label">No Fax</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="no_fax">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="email">
                            </div>
                            <label for="npwp" class="col-sm-2 col-form-label">NPWP</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="npwp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat2" class="col-sm-2 col-form-label">Alamat PIC</label>
                            <div class="col-sm-8">
                            <input readonly type="text" class="form-control" id="alamat2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pic" class="col-sm-2 col-form-label">PIC</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="pic">
                            </div>
                            <label for="no_pictel" class="col-sm-2 col-form-label">No Tel PIC</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="no_pictel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bank" class="col-sm-2 col-form-label">Bank</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="bank">
                            </div>
                            <label for="bank_trans" class="col-sm-2 col-form-label">Bank Transfer</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="bank_trans">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cabang" class="col-sm-2 col-form-label">Cabang</label>
                            <div class="col-sm-8">
                                <input readonly type="text" class="form-control" id="cabang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_rek" class="col-sm-2 col-form-label">No Rek</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="no_rek">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_rek" class="col-sm-2 col-form-label">Nama Rek</label>
                            <div class="col-sm-8">
                                <input readonly type="text" class="form-control" id="nama_rek">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penilaian" class="col-sm-2 col-form-label">Penilaian</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="penilaian">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="spek" class="col-sm-2 col-form-label">Spesifikasi</label>
                            <div class="col-sm-8">
                                <input readonly type="text" class="form-control" id="spek">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="klp_vendor" class="col-sm-2 col-form-label">Kelompok Vendor</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="klp_vendor">
                            </div>
                            <label for="jenis" class="col-sm-2 col-form-label">Jenis Kapitasi</label>
                            <div class="col-sm-3">
                                <input readonly type="text" class="form-control" id="jenis">
                            </div>
                        </div>
                        
                </div>
            </div>
        </div> 
    </form>
<script>
    
    setHeightForm();
    var scrollform = document.querySelector('.form-body');
    var psscrollform = new PerfectScrollbar(scrollform);

     function editData(){
        $.ajax({
            type: 'GET',
            url: "{{ url('simlog-master/vendor') }}",
            dataType: 'json',
            async:false,
            success:function(result){
                if(result.status){
                    telp = result.data[0].no_tel;
                    telp_pic = result.data[0].no_pictel;
                    $('#kode_vendor').val(result.data[0].kode_vendor);
                    $('#nama').val(result.data[0].nama);
                    $('#alamat').val(result.data[0].alamat);
                    $('#alamat2').val(result.data[0].alamat2);
                    $('#email').val(result.data[0].email);
                    $('#npwp').val(result.data[0].npwp);
                    $('#pic').val(result.data[0].pic);
                    $('#no_pictel').val(result.data[0].no_pictel);
                    $('#no_tel').val(result.data[0].no_tel);
                    $('#no_fax').val(result.data[0].no_fax);
                    $('#bank').val(result.data[0].bank);
                    $('#bank_trans').val(result.data[0].bank_trans);
                    $('#spek').val(result.data[0].spek);
                    $('#jenis').val(result.data[0].jenis);
                    $('#klp_vendor').val(result.data[0].nama_klp);
                    $('#penilaian').val(result.data[0].penilaian);
                    $('#cabang').val(result.data[0].cabang);
                    $('#no_rek').val(result.data[0].no_rek);
                    $('#nama_rek').val(result.data[0].nama_rek);  
                    // showInfoField('akun_hutang',result.data[0].akun_hutang,result.data[0].nama_akun);
                }
                else if(!result.status && result.message == 'Unauthorized'){
                    window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                }
                // $iconLoad.hide();
            }
        });
    }

    editData();
</script>