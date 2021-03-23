<style>
    .bold{
        font-weight:bold;
    }
</style>
<div class="row mt-2">
    <div class="col-12">
        <div class="text-center">
            <img alt="Profile" src="" id="profile-mobile" class="img-thumbnail border-0 rounded-circle mb-2 list-thumbnail" style="width:80px">
            <p class="list-item-heading mb-1"><a id="ubah-profile" href="#" style="color:#4361EE;cursor:pointer">Ubah Profile</a></p>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p><span class="bold">Data Pribadi</span> <a class="float-right" style="color:#4361EE">Ubah Data</a></p>
                <p class="text-muted text-small mb-1">NIS</p>
                <p class="list-item-heading truncate" id="nis"></p>
                <p class="text-muted text-small mb-1">Nama</p>
                <p class="list-item-heading truncate" id="nama"></p>
                <p class="text-muted text-small mb-1">Kelas</p>
                <p class="list-item-heading truncate" id="kelas"></p>
                <p class="text-muted text-small mb-1">Agama</p>
                <p class="list-item-heading truncate" id="agama"></p>
                <p class="text-muted text-small mb-1">Tempat Lahir</p>
                <p class="list-item-heading truncate" id="tempat_lahir"></p>
                <p class="text-muted text-small mb-1">Tanggal Lahir</p>
                <p class="list-item-heading truncate" id="tanggal_lahir"></p>
                <p class="text-muted text-small mb-1">Jenis Kelamin</p>
                <p class="list-item-heading truncate" id="jenis_kelamin"></p>
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
<script>

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
                if(result.user[0].foto != "-" && result.user[0].foto != ""){
                    var url = "{{ config('api.url') }}/sekolah/storage/"+result.user[0].foto;
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
</script>