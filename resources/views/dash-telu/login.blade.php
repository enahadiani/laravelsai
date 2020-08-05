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
        .logo-single{
            background:url("{{ asset('img/Tel-U-logo_1.PRIMER-Utama.png') }}") no-repeat;
            background-size: 150px;
            background-position-x: center;
            background-position-y: center;
            width:160px;
            height:45px;
            margin-bottom:30px;
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

<body class="background show-spinner no-footer">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">
                            <p class="white mb-0">
                                Please use your credentials to login.
                                <br>If you are not a member, please
                                <a href="#" class="white">register</a>.
                            </p>
                        </div>
                        <div class="form-side">
                            <a href="Dashboard.Default.html">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4">Login</h6>
                            <form method="POST" action="{{ url('dash-telu/login') }}" id="form-login">
                                @csrf
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" name="nik" id="username"/>
                                    <span>NIK</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" name="password" placeholder="" id="password" />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#">Forget password?</a>
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        });
    </script>
    @if (Session::has('alert'))
        <script>
            alert("{{Session::get('alert')}}")
        </script>
        
    @endif
    
</body>

</html>