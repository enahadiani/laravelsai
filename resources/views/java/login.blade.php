<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JAVA - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('asset_dore/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_java/css/login.css') }}" />          
    
    <script src="{{ asset('asset_dore/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/dore.script.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap-notify.min.js') }}"></script>
    <script>
        var $public_asset = "{{ asset('asset_dore') }}/";
        var $theme = "dore.light.bluesaku.min.css";
    </script>
    <script src="{{ asset('asset_dore/js/scripts.js') }}"></script>
    <script>
        $('div.theme-colors').hide();
    </script>
</head>

<body class="background show-spinner" style="border-radius:0 !important">
    <div class=""></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card" style="box-shadow:none">
                        <div class="form-side">
                            <div class="logo-container">
                                <img alt="logo" class="_logo" src="{{ asset('img/SAKU2021.svg') }}">
                            </div>
                            <form method="POST" action="{{ url('java-auth/login') }}" id="form-login">
                                @csrf
                                @if(Session::has('alert'))
                                <div class="alert alert-danger rounded" role="alert" style="border-radius: 0.5rem !important;">
                                    {{ Session::get('alert') }}
                                </div>
                                @endif
                                <div class="form-row mt-2">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="username">Username</label>
                                                <input class="form-control" type="text" id="username" name="nik" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="" id="password" required>
                                                <span id="btn-lihat">Lihat</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <label style='cursor:pointer'>Lupa password?</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <button class="btn btn-primary btn-block" type="submit">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="page-footer" style="border:none">
            <div class="footer-content" style="margin: 0 auto !important;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-10 mx-auto my-auto">
                            <div class="row" style="margin:0 auto;">
                                <div class="col-12 col-sm-12 text-center"><span style="font-size: 9px !important;">&copy;2020 PT Samudra Aplikasi Indonesia</span></div>
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script>
      
        function showNotification(placementFrom, placementAlign, type,title,message) {
            $.notify(
                {
                title: title,
                message: message,
                target: "_blank"
                },
                {
                element: "body",
                position: null,
                type: type,
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 4000,
                timer: 2000,
                url_target: "_blank",
                mouse_over: null,
                animate: {
                    enter: "animated fadeInDown",
                    exit: "animated fadeOutUp"
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: "class",
                template:
                    '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    "</div>" +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    "</div>"
                }
            );
        }

        $(document).ready(function() {
            $('#username,#password').keydown(function(e){
                
                var code = (e.keyCode ? e.keyCode : e.which);
                var nxt = ['username','password'];
                if (code == 13 || code == 40) {
                    e.preventDefault();
                    var idx = nxt.indexOf(e.target.id);
                    idx++;
                    if(idx == 2){
                        if($('#password').val().trim() != ""){
                            $('#form-login').submit();
                        }
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
            $('body').addClass('dash-contents');

            $('#btn-eye').click(function(){
                console.log('click');
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                    document.getElementById("btn-eye").style.backgroundImage = "url( {{ asset('img/password.svg') }} )";
                } else {
                    x.type = "password";
                    document.getElementById("btn-eye").style.backgroundImage = "url( {{ asset('img/hide.svg') }} )";
                }
            });

            $('#btn-lihat').click(function(){
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                    $("#btn-lihat").html("Sembunyikan");
                } else {
                    x.type = "password";
                    $("#btn-lihat").html("Lihat");
                }
            });
        });
    </script>
    @if (Session::has('status'))
        <script>            
            showNotification("top", "center", "success",'Logout','Anda telah berhasil logout.');
        </script>
        
    @endif    
</body>

</html>