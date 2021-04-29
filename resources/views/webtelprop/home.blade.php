<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <title>Telkom Property | Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webtelprop/index.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webtelprop/home.css') }}" rel="stylesheet">
</head>
<body>
    <div class="body-inner">
        <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light">
            <div class="header-inner">
                <div class="container">
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <div id="logo">
                        <span class="logo-default">
                            <img src="{{ asset('asset_web/img/webtelprop/LogoTelkomProperty.png') }}" alt="logo" height="100" class="mr-2"> <span id="username">Telkom Property Asset</span>
                        </span>
                    </div>
                </div>
            </div>
        </header>
        <div class="home-image">
            <div class="shape-1">&nbsp;</div>
            <div class="shape-2">
                <img class="image-1" src="{{ asset('asset_web/img/webtelprop/building.jpeg') }}" alt="image-1">
            </div>
        </div>
        <section id="page-1">
            <div class="home-greeting container">
                <span class="company-name">Telkom Property</span>
                <div class="text-1">
                    <h1 class="text-medium text-1">The Most</h1>
                    <h1 class="text-medium text-2">Preferred Partner</h1>
                </div>
            </div>
            <div class="home-filter container">
                <span class="label-search">Temukan aset yang kamu inginkan</span>
                <div class="filter-input">
                    <div class="lokasi-input-area">
                        <span class="lokasi">Lokasi <img src="{{ asset('asset_web/img/webtelprop/dropdown-arrow.png') }}" alt="arrow"></span>
                        <br />
                        <label class="label-input" id="label-lokasi">Indonesia</label>
                    </div>
                    <div class="property-input-area">
                        <span class="property">Property <img src="{{ asset('asset_web/img/webtelprop/dropdown-arrow.png') }}" alt="arrow"></span>
                        <br />
                        <label class="label-input" id="label-property">Semua</label>
                    </div>
                    <div class="search-button-area">
                        <button type="button" id="search-area"><img src="{{ asset('asset_web/img/webtelprop/search.svg') }}" alt="search"></button>
                    </div>
                </div>
            </div>
        </section>
        <!--Modal -->
        <div class="modal fade show" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" data-backdrop="static" data-keyboard="false" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-label">Selamat Datang</h4>
                        <div class="modal-note">
                            <p class="modal-notes">Hai, agar kamu bisa eksplorasi layanan kami mohon isi form dibawah. Terimakasih!</p>
                        </div>
                    </div>
                    <form method="post" id="register-user">
                        <div class="modal-body">
                            <div class="row row-flex">
                                <div class="col-md-8">
                                    <div class="label-form">Nama</div>
                                    <input class="form-control" id="nama" name="nama" placeholder="Nama" type="text" required>
                                </div>
                            </div>
                            <div class="row row-flex">
                                <div class="col-md-8">
                                    <div class="label-form">E mail</div>
                                    <input class="form-control" id="email" name="nama" placeholder="Email" type="email" required>
                                </div>
                            </div>
                            <div class="row row-flex">
                                <div class="col-md-8">
                                    <label class="container-checkbox">Whatsapp Aktif
                                        <input type="checkbox" name="active" id="active">
                                        <span class="checkmark"></span>
                                    </label>
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" id="active" type="checkbox">
                                        <label class="form-check-label" for="active">Whatsapp Aktif</label>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer row-flex">
                            <button type="submit" class="btn btn-block btn-submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end: Modal -->
    </div>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modal').modal('show');
        });
        $('#register-user').submit(function(event){
            event.preventDefault();
            var user = $('#nama').val()
            $('#username').text('Hai '+user)
            $('#modal').modal('hide')
        })
    </script>
</body>
</html>