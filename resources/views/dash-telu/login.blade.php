<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SAKU - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('asset_dore/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/main.css') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');


        body {
            font-family: 'Roboto', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, p,li,ul,a,input,select{
            font-family: 'Roboto', sans-serif !important;
        }
        .logo-single{
            background:url("{{ asset('img/Tel-U-logo_1.PRIMER-Utama.png') }}") no-repeat;
            background-size: 150px;
            background-position-y: center;
            width:160px;
            height:45px;
            margin-bottom:30px;
        }
        .form-side{
            margin: 0 auto;
        }
        input{
            border-radius: 10px !important;
        }
        button{
            border-radius: 15px !important;
        }
        .footer-content{
            width:60%;
            padding: 0 150px
        }
        @media (max-width: 991px) {
            .footer-content{
                width:100%;
                padding: 0;
            }
        }
        #span-password
        {
           position: absolute;
           cursor: text;
           font-size: 90%;
           opacity: 1;top: -0.4em;left: 0.75rem;z-index: 3;line-height: 1;padding: 0 1px
        }
        #btn-eye
        {
            top: 0px;right: 10px;left: unset;width: 40px;height: 40px;background: url("{{ asset('img/hide.svg') }}") no-repeat;background-blend-mode: lighten;background-size: 22px;background-position-x: center;background-position-y: center;opacity: 0.5;cursor: pointer;
        }
        
    </style>
    <script src="{{ asset('asset_dore/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/dore.script.js') }}"></script>
    <script>
        var $public_asset = "{{ asset('asset_dore') }}/";
        var $theme = "dore.light.redruby.min.css";
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
                            <a href="Dashboard.Default.html">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-0">Masuk</h6>
                            <h6 class="mb-4">Selamat Datang
                            @if(Session::has('pesan'))
                            Kembali
                            @endif
                            </h6>
                            <form method="POST" action="{{ url('dash-telu/login') }}" id="form-login">
                                @csrf
                                @if(Session::has('alert'))
                                <div class="alert alert-danger rounded" role="alert">
                                    {{ Session::get('alert') }}
                                </div>
                                @endif
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="nik" id="username"/>
                                    <span>NIK</span>
                                </label>
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" name="password" placeholder="" id="password">
                                    <span id="span-password">Password</span>
                                    <span id="btn-eye"><i class="icon-eye"></i></span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">Lupa password?</a>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">Masuk</button>
                                </div>
                            </form>
                            <button class="btn btn-block mt-5" style="background: #C9C9C929;">Daftar</button>
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
                                <div class="col-4 col-sm-4"><span style="font-size: 9px;">Bantuan</span></div>
                                <div class="col-4 col-sm-4 text-center"><span style="font-size: 9px;">Kebijakan Privasi</span>
                                </div>
                                <div class="col-4 col-sm-4 text-right"><span style="font-size: 9px;">Tentang Kami</span></div>
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script>
        $(document).ready(function() {
            $('#username,#password').keydown(function(e){
                
                var code = (e.keyCode ? e.keyCode : e.which);
                var nxt = ['username','password'];
                if (code == 13 || code == 40) {
                    e.preventDefault();
                    var idx = nxt.indexOf(e.target.id);
                    idx++;
                    if(idx == 2){
                        $('#form-login').submit();
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
        });
    </script>
    <!-- @if (Session::has('alert'))
        <script>
            alert("{{Session::get('alert')}}")
        </script>
        
    @endif -->
    
</body>

</html>