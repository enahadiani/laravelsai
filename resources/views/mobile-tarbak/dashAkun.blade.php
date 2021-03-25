
<link rel="stylesheet" href="{{ asset('asset_dore/css/croppie.css') }}" />
<style>
    .bold{
        font-weight:bold;
    }
    .hidden{
        display:none;
    }
    html {
    --scrollbarBG: #fff0;
    --thumbBG: #fff0;
    }
    #content-bottom-sheet::-webkit-scrollbar 
    {
    width: 11px;
    }
    #content-bottom-sheet 
    {
    scrollbar-width: thin;
    scrollbar-color: var(--thumbBG) var(--scrollbarBG);
    }
    #content-bottom-sheet::-webkit-scrollbar-track 
    {
    background: var(--scrollbarBG);
    }
    #content-bottom-sheet::-webkit-scrollbar-thumb 
    {
    background-color: var(--thumbBG) ;
    border-radius: 6px;
    border: 3px solid var(--scrollbarBG);
    }
    .border-only-bottom{
        border:0 !important;
        border-bottom:1px solid #ced4da !important;
    }

    .form-control[readonly] {
        background-color: white;
        opacity: 1;
        color: #e9ecef;
    }
</style>
<div class="row mt-2">
    <div class="col-12">
        <div class="text-center dash-profile">
            <img alt="Profile" src="" id="profile-mobile" class="img-thumbnail border-0 rounded-circle mb-2 list-thumbnail" style="width:80px">
            <p class="list-item-heading mb-1"><a id="ubah-profile" href="#" style="color:#4361EE;cursor:pointer">Ubah Profile</a></p>
            <input type="file" name="file_foto" class="hidden" id="file-foto" />
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body data-pribadi">
                <p><span class="bold">Data Pribadi</span> <a class="float-right" style="color:#4361EE" id="ubah-data" style="cursor:pointer" href="#">Ubah Data</a></p>
                <p class="text-muted text-small mb-1">NIS</p>
                <p class="list-item-heading truncate" id="nis"></p>
                <p class="text-muted text-small mb-1">Nama</p>
                <p class="list-item-heading truncate" id="nama"></p>
                <p class="text-muted text-small mb-1">Kelas</p>
                <p class="list-item-heading truncate" id="kode_kelas"></p>
                <p class="text-muted text-small mb-1">Agama</p>
                <p class="list-item-heading truncate" id="agama"></p>
                <p class="text-muted text-small mb-1">Tempat Lahir</p>
                <p class="list-item-heading truncate" id="tempat_lahir"></p>
                <p class="text-muted text-small mb-1">Tanggal Lahir</p>
                <p class="list-item-heading truncate" id="tanggal_lahir"></p>
                <p class="text-muted text-small mb-1">Jenis Kelamin</p>
                <p class="list-item-heading truncate" id="jk"></p>
                <p class="text-muted text-small mb-1">Email</p>
                <p class="list-item-heading truncate" id="email"></p>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="bold">Keamanan Akun</p>
                <p class="text-muted text-small">Username</p>
                <p class="list-item-heading mb-1 truncate" id="username"></p>
                <p class="text-muted text-small">Password</p>
                <p class="list-item-heading mb-1 truncate" id="password"></p>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 text-center">
        <a href="{{ url('mobile-tarbak/logout') }}" style="color:red">Keluar</a>
    </div>
</div>
<div style='height:100px;'>&nbsp;</div>
<button id="trigger-bottom-sheet" style="display:none">Bottom ?</button>

<script src="{{ asset('asset_dore/js/croppie.min.js') }}"></script>
<script>
    var bottomSheet = new BottomSheet("country-selector");
    document.getElementById("trigger-bottom-sheet").addEventListener("click", bottomSheet.activate);
    window.bottomSheet = bottomSheet;

    $('#content-bottom-sheet').css({"max-height":"95vh","overflow-y":"scroll","overflow-x":"hidden"});

    $('.c-bottom-sheet__sheet').css({ "width":"100%","margin-left": "0%", "margin-right":"0%"});
    $('#bottom-sheet-close').hide();
    function typePass(str){
        if(str != "" || str != undefined){

            var count = str.length;
            var text = "";
            if(count > 0){
                for(var i=0;i<count;i++){
                    // text+="•";
                    text+="*";
                }
            }
            return text;
        }
    }
    
    var $nis = "";
    var $nama = "";
    var $kode_kelas = "";
    var $agama = "";
    var $jk = "";
    var $tgl_lahir = "";
    var $tempat_lahir = "";
    var $email_lahir = "";
    var $image_crop = "";
    function getProfile(){
        $.ajax({
            type: "GET",
            url: "{{ url('mobile-tarbak/profile-siswa') }}",
            dataType: 'json',
            success:function(result){  
                $('#nis').html(result.user[0].nis);
                $('#nama').html(result.user[0].nama);
                $('#kode_kelas').html(result.user[0].kode_kelas);
                $('#agama').html(result.user[0].agama);
                $('#jk').html(result.user[0].jk);
                $('#tempat_lahir').html(result.user[0].tmp_lahir);
                $('#tgl_lahir').html(result.user[0].tgl_lahir);
                $('#email').html(result.user[0].email);
                $nis = result.user[0].nis;
                $nama = result.user[0].nama;
                $kode_kelas = result.user[0].kode_kelas;
                $agama = result.user[0].agama;
                $jk = result.user[0].jk;
                $tempat_lahir = result.user[0].tmp_lahir;
                $tgl_lahir = result.user[0].tgl_lahir;
                $email = result.user[0].email;
                if(result.user[0].foto != "-" && result.user[0].foto != ""){
                    var url = "{{ config('api.url') }}sekolah/storage/"+result.user[0].foto;
                }else{
                    var url = "{{ asset('asset_elite/images/user.png') }}";
                }
                $('#profile-mobile').attr('src',url);
                $('#username').html(result.user[0].nik2);
                $('#password').html(typePass(result.user[0].pass));
                
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getProfile();
    $('.data-pribadi').on('click', '#ubah-data', function(e){
        e.preventDefault();
        $('#content-bottom-sheet').html('');
        html =`

        <form id="form-tambah">
            <div class='row'>
                <div class='col-md-12 px-5 text-center'>
                    <h6 class='bold'>Ubah Data Profile</h6>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                    <div class="form-group mb-3">
                        <label>NIS</label>
                        <input class="form-control border-only-bottom" value="`+$nis+`" readonly name="inp_nis" id="inp_nis" required>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                    <div class="form-group mb-3">
                        <label>Nama</label>
                        <input class="form-control border-only-bottom" value="`+$nama+`" readonly name="inp_nama" id="inp_nama" required>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>      
                    <div class="form-group mb-3">
                        <label>Kelas</label>
                        <input class="form-control border-only-bottom" value="`+$kode_kelas+`" readonly name="inp_kode_kelas" id="inp_kode_kelas" required>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                    <div class="form-group mb-3">
                        <label>Tempat Lahir</label>
                        <input class="form-control border-only-bottom" value="`+$tempat_lahir+`" name="inp_tempat_lahir" id="inp_tempat_lahir">
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                    <div class="form-group mb-3">
                        <label>Tanggal Lahir (dd/mm/yyyy) </label>
                        <input class="form-control border-only-bottom" value="`+$tgl_lahir+`" name="inp_tgl_lahir" id="inp_tgl_lahir" placeholder="Contoh: 31/12/2000">
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                    <div class="form-group mb-3">
                        <label>Agama</label>
                        <select name="inp_agama" id="inp_agama" class="form-control selectize">
                            <option value="Islam">Islam</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Kristen">Kristen</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="inp_laki_laki" value="L" name="inp_jk" class="custom-control-input">
                            <label class="custom-control-label" for="inp_laki_laki">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="inp_perempuan" value="P" name="inp_jk" class="custom-control-input">
                            <label class="custom-control-label" for="inp_perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input class="form-control border-only-bottom" value="`+$email+`" name="inp_email" id="inp_email">
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 px-5'>
                <button class="btn btn-primary btn-block" type="submit" style='background:#4361EE !important'>Simpan</button>
                </div>
            </div>
        </form>
        `;
        $('#content-bottom-sheet').html(html+"<div style='height:100px;'>&nbsp;</div>");
        $('.selectize').selectize();
        $('#inp_agama')[0].selectize.setValue($agama);
        if($jk != null){

            if($jk.substr(0,1) == "P"){
                $('#inp_perempuan').prop('checked',true);
                $('#inp_laki_laki').prop('checked',false);
            }else if($jk.substr(0,1) == "L"){
                $('#inp_laki_laki').prop('checked',true);
                $('#inp_perempuan').prop('checked',false);
            }
        }
        $('#form-tambah').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            
            $.ajax({
                type: 'POST',
                url: "{{ url('mobile-tarbak/update-profile-siswa') }}",
                dataType: 'json',
                data: formData,
                async:false,
                contentType: false,
                cache: false,
                processData: false, 
                success:function(result){
                    if(result.data.status){
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Sukses',
                            text: result.data.message
                        });
                        $('.c-bottom-sheet').removeClass('active');
                        loadForm("{{ url('mobile-tarbak/form/dashAkun') }}");
                    }
                    else if(!result.data.status && result.data.message == 'Unauthorized'){
                        window.location.href = "{{ url('esaku-auth/sesi-habis') }}";
                    }
                    else{
                        msgDialog({
                            id: '-',
                            type: 'warning',
                            title: 'Gagal',
                            text: result.data.message
                        });
                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        })
        $('#trigger-bottom-sheet').trigger("click");
    });


    $('#file-foto').change(function(e){
        e.preventDefault();
        $('#content-bottom-sheet').html('');
        var html = `
        <div class="row mx-auto">
            <div class="col-md-12 text-center">
                <h6>Crop &amp; Upload</h6>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-md-12 text-center">
                <div id="image_demo"></div>
            </div>
        </div>
        <div class="row mx-auto">
            <button class="btn btn-success crop_image mx-auto" style="background:#4361EE">Crop &amp; Upload</button>
        </div>`;
        $('#content-bottom-sheet').html(html+"<div style='height:100px;'>&nbsp;</div>");
        
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:250,
                height:250,
                type:'circle'
            },
            boundary:{
                width:300,
                height:300
            }
        });

        setTimeout(() => {
            var reader = new FileReader();
            reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
            }
            reader.readAsDataURL(this.files[0]);
            $('.crop_image').click(function(event){
                $image_crop.croppie('result', {
                    type: 'blob',
                    size: 'viewport'
                }).then(function(response){
        
                    var formData = new FormData();
                    var toUrl = "{{ url('mobile-tarbak/update-foto') }}";
                    
                    formData.append('foto', response, 'profile.png');
                    $.ajax({
                        url : toUrl,
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success:function(result)
                        {
                            if(result.data.status){
                                msgDialog({
                                    id: '-',
                                    type: 'warning',
                                    title: 'Sukses',
                                    text: result.data.message
                                });
                                $('.c-bottom-sheet').removeClass('active');
                                loadForm("{{ url('mobile-tarbak/form/dashAkun') }}");
                                
                            }
                            else if(!result.data.status && result.data.message == 'Unauthorized'){
                                window.location.href = "{{ url('mobile-tarbak/sesi-habis') }}";
                            }
                            else{
                                alert(result.data.message);
                            }
                        },
                        fail: function(xhr, textStatus, errorThrown){
                            alert('request failed:'+textStatus);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {       
                            if(jqXHR.status==422){
                                alert(jqXHR.responseText);
                            }
                        }
                    })
                })
            });
            $('#trigger-bottom-sheet').trigger("click");
        }, 10 * 60);

    });

    $('.dash-profile').on('click','#ubah-profile',function(e){
        e.preventDefault();
        $('#file-foto').click();
    });
</script>