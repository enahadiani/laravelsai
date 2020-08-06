<style>
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');


body {
    font-family: 'Roboto', sans-serif !important;
}
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    font-family: 'Roboto', sans-serif !important;
    font-weight: normal !important;
}
h2{
    margin-bottom: 5px;
    margin-top:5px;
}
.judul-box{
    font-weight:bold;
    font-size:18px !important;
}
.inner{
    padding:5px !important;
}

.box-nil{
    margin-bottom: 20px !important;
}

.pad-more{
    padding-left:10px !important;
    padding-right:0px !important;
}
.mar-mor{
    margin-bottom:10px !important;
}
.box-wh{
    box-shadow: 0 3px 3px 3px rgba(0,0,0,.05);
}
.small-box .icon{
    top: 0px !important;
    font-size: 20px !important;
}
.bg-white{
    background:white
}
.small-box .inner{
    background: white;
    border: 1px solid white;
    border-radius: 10px !important;
}
.small-box{
    border-radius:10px !important;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.widget-user-2 .widget-user-header {

    padding: 20px;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    box-shadow: 1px 2px 2px 2px #e6e0e0e6;
}
.icon-green {
    color:white;
    background: #00a65a;
    border: 1px solid #00a65a;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-blue {
    color:white;
    background: #0073b7;
    border: 1px solid #0073b7;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-purple {
    color:white;
    background: #605ca8 !important;
    border: 1px solid #605ca8 !important;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.icon-pink {
    color:white;
    background: #d81b60;
    border: 1px solid #d81b60;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    padding: 2px;
    font-size: 12px;
    transition: all .3s linear;
    position: absolute;
    top: -10px;right: 10px;
    z-index: 0;
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    margin-right: 10px;
}
.box-footer {

border-top-left-radius: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 10px;
border-bottom-left-radius: 10px;
border-top: 1px solid #f4f4f4;
padding: 10px;
background-color: #fff;
box-shadow: 1px 2px 2px 2px #e6e0e0e6;

}

.box-nil{
    margin-bottom: 20px !important;
}

.icon{
    padding: 2px 12px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.judulBox:hover{
    color:#0073b7
}
</style>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-5">
                <img class="social-header card-img" style="height:100px" src="{{ asset('asset_dore/img/login/balloon-lg.jpg') }}" />
            </div>
            <div class="col-12 col-lg-5 col-xl-4 col-left">
                <a href="#" class="lightbox" id="foto">
                    
                </a>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center pt-4">
                        <p class="list-item-heading pt-2" id="nama"></p>
                        </div>
                        <p class="text-muted text-small mb-2">Location</p>
                        <p class="mb-3" id="lokasi"></p>
                        
                        <p class="text-muted text-small mb-2">PP</p>
                        <p class="mb-3" id="pp">
                        </p>
                        <p class="text-muted text-small mb-2">Contact</p>
                        <div class="social-icons">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                <a href="#" id="notelp" style="font-size:14px"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-8 col-right">
                <div class="card mb-4">
                    <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password_lama">Password Lama</label>
                                    <input type="password" class="form-control" id="password_lama">
                                </div>
                                <div class="form-group">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="password" class="form-control" id="password_baru">
                                </div>

                                <button type="submit" class="btn btn-primary mb-0">Update Password</button>
                            </form>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function sepNum(x){
    var num = parseFloat(x).toFixed(2);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}
function sepNumPas(x){
    var num = parseInt(x);
    var parts = num.toString().split('.');
    var len = num.toString().length;
    // parts[1] = parts[1]/(Math.pow(10, len));
    parts[0] = parts[0].replace(/(.)(?=(.{3})+$)/g,'$1.');
    return parts.join(',');
}

function toJuta(x) {
    var nil = x / 1000000;
    return sepNum(nil) + '';
}

function loadService(index,method,url,param={}){
    $.ajax({
        type: method,
        url: url,
        dataType: 'json',
        statusCode:{
            500: function(response){
                window.location="{{url('/dash-telu/login')}}";
            }
        },
        data: param,
        success:function(result){    
            if(result.status){
                switch(index){
                    case 'profile' :
                    if(result.data[0].foto == "-" || result.data[0].foto == "" || result.data[0].foto == undefined){
                        var img= `
                        <img alt="Profile" src="{{ asset('asset_elite/images/user.png') }}" class="img-thumbnail card-img social-profile-img" width="100" style="border-radius: 50%;">
                        `;
                    }else{
                        var img= `
                        <img alt="Profile" src="https://api.simkug.com/api/dash-telu/storage/`+result.data[0].foto+`" class="img-thumbnail card-img social-profile-img" width="100" style="border-radius: 50%;">
                        `;
                    }
                    $('#foto').html(img);
                    $('#nama').html(result.data[0].nama);
                    $('#notelp').html(`<i class="simple-icon-phone"></i> : `+result.data[0].no_telp);

                    $('#fullname').val(result.data[0].nama);
                    $('#nik').val(result.data[0].nik);
                    var pp = result.data[0].kode_pp+` - `+result.data[0].nama_pp;
                    $('#pp').html(pp);
                    $('#lokasi').html(result.data[0].kode_lokasi+' - '+result.data[0].nmlok);
                    $('#password_lama').val('');
                    $('#password_baru').val('');
                    break;

                }
            }
        }
    });
}
function initDash(){
    loadService('profile','GET',"dash-telu/profile"); 
}
initDash();

$('#form-profile').on('submit', function(e){
    e.preventDefault();
        var parameter = $('#id').val();
        var url = "dash-telu/update-password";
        var pesan = "saved";

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
                    // dataTable.ajax.reload();
                    Swal.fire(
                        'Great Job!',
                        'Your data has been '+pesan,
                        'success'
                        )
                    $('#password_lama').val('');
                    $('#password_baru').val('');
                }
                else if(!result.data.status && result.data.message == 'Unauthorized'){
                    // Swal.fire({
                    //     title: 'Session telah habis',
                    //     text: 'harap login terlebih dahulu!',
                    //     icon: 'error'
                    // }).then(function() {
                    // })
                    window.location.href = "{{ url('dash-telu/login') }}";
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
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status==422){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>'+jqXHR.responseText+'</a>'
                    })
                }
            }
        });
        
});
</script>