<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="PT. Samudera Aplikasi Indonesia" />
    <meta name="description" content="Penyedia software keuangan">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/img/esaku/ico-saku.svg') }}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>SAKU | Produk</title>
    <!-- Stylesheets & Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('asset_web/webesaku/fontawesome/css/all.css')}}">
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/websaku-produk.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/websaku-produk-mobile.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="body-inner">

        <header id="header" data-transparent="true" data-fullwidth="true" class="submenu-light">
            <div class="header-inner">
                <div class="container header-content">
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <div class="header-content-1">
                        <div id="logo">
                            <a href="index.html">
                                <span class="logo-default">
                                    <img src=" {{ asset('asset_web/img/esaku/SAKU2021.svg') }}" alt="logo" width="80"/>
                                </span>
                                <span class="logo-dark">
                                    <img src=" {{ asset('asset_web/img/esaku/SAKU2021.svg') }}" alt="logo" width="80"/>
                                </span>
                            </a>
                        </div>
                        <div id="mainMenu" class="main-menu">
                            <div class="container">
                                <nav>
                                    <ul>
                                        <li><a href="https://app.simkug.com/webesaku/home">Home</a></li>
                                        <li><a href="https://app.simkug.com/webesaku/produk">Produk</a></li>
                                        <li><a href="https://app.simkug.com/webesaku/perusahaan">Perusahaan</a></li>
                                        <li><a href="https://app.simkug.com/webesaku/harga">Harga</a></li>
                                    </ul>
                                </nav>
                                <div class="col-mobile">
                                    <div class="nav-mobile-daftar">
                                        <a href="#" id="masuk-link">Masuk</a>
                                        <a href="https://app.simkug.com/esaku-auth/register" id="daftar-link">Daftar Gratis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-content-2">
                        <div id="mainMenu2" class="main-menu col-dekstop">
                            <div class="container">
                                <a href="#" id="masuk-link">Masuk</a>
                                <a href="https://app.simkug.com/esaku-auth/register" id="daftar-link">Daftar Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- Dashboard --}}
        <section id="dashboard" class="p-b-25">
            <div class="container">
                <div class="card-dashboard">
                    <div class="heading-text heading-section text-center">
                        <h1>Dashboard</h1>
                        <h5 class="lead">
                            Satu sumber data yang menghasilkan banyak analisa.
                        </h5>
                    </div>
                    <div class="image-dashboard col-dekstop" data-bg="{{ asset('asset_web/img/esaku/tablet.png') }}"></div>
                    <div class="image-container col-mobile">
                        <img alt="tablet" class="image-mobile-dashboard" src="{{ asset('asset_web/img/esaku/tablet.png')}}" />
                    </div>
                </div>
            </div>
        </section>

        {{-- Produk Fitur --}}
        <section id="produk-fitur" class="p-b-25">
            <div class="container">
                <div class="produk-fitur-container">
                    <div class="card-coba">
                        <div class="row">
                            <div class="col-12 p-b-30">
                                <img alt="saku-white" src="{{ asset('asset_web/img/esaku/SAKU2021WHITE.svg') }}" width="120">
                            </div>
                            <div class="col-12 p-b-30">
                                <div class="coba-text">
                                    <h5 class="lead">
                                        Mulai sekarang melakukan pembukuan bisnis Anda dengan semua fitur yang kami siapkan.
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="#" class="link-coba">Coba Gratis</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-custom">
                        <div class="row">
                            <div class="col-12 p-b-30">
                                <h1>Custome</h1>
                            </div>
                            <div class="col-12 p-b-65">
                                <div class="custom-text">
                                    <h5 class="lead">
                                        Bangun sistem sesuai dengan kebutuhan bisnis Anda.
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="#" class="link-kontak">Kontak Kami</a>
                            </div>
                        </div>
                        <div class="gear-icon">
                            <div class="gear-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="jenis-usaha" class="p-b-25">
            <div class="container">
                <div class="jenis-usaha-container">
                    <div class="jenis-usaha-col">
                        <div class="row">
                            <div class="col-12 p-b-20">
                                <h1>Sekolah</h1>
                            </div>
                            <div class="col-12">
                                <div class="jenis-text">
                                    <h5 class="lead">
                                        Pelayanan yang penuh kepada orang tua siswa dari proses tagihan pembayaran siswa sampai laporan nilai sekolah.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jenis-usaha-col">
                        <div class="row">
                            <div class="col-12 p-b-20">
                                <h1>Jasa</h1>
                            </div>
                            <div class="col-12">
                                <div class="jenis-text">
                                    <h5 class="lead">
                                        Pencatatan transaksi secara otomatis dan menghasilkan laporan yang dapat dipertanggungjawabkan.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jenis-usaha-container">
                    <div class="jenis-usaha-col">
                        <div class="row">
                            <div class="col-12 p-b-20">
                                <h1>Dagang</h1>
                            </div>
                            <div class="col-12">
                                <div class="jenis-text-2">
                                    <h5 class="lead">
                                        Perhitungan HPP secara otomatis serta pengawasan terhadap produk yang anda jual serta terhubung dengan aplikasi POS.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jenis-usaha-col">
                        <div class="row">
                            <div class="col-12 p-b-20">
                                <h1>Universitas</h1>
                            </div>
                            <div class="col-12">
                                <div class="jenis-text">
                                    <h5 class="lead">
                                        Komplek transaksi dari Anggaran pendidikan sampai pemantauan tagihan serta pembayaran mahasiswa.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jenis-usaha-container">
                    <div class="jenis-usaha-col">
                       <div class="row">
                            <div class="col-12 p-b-20">
                                <h1>Toko Online</h1>
                            </div>
                            <div class="col-12">
                                <div class="jenis-text">
                                    <h5 class="lead">
                                        Unggah semua produk anda ke market place dan catat penjualan yang didapatkan dalam satu aplikasi kami.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jenis-usaha-col">
                        <div class="row">
                            <div class="col-12 p-b-20">
                                <h1>Usaha Mikro</h1>
                            </div>
                            <div class="col-12">
                                <div class="jenis-text">
                                    <h5 class="lead">
                                        Anda dapat melihat laporan keuangan yang lengkap dengan proses pencatatan yang sederhana.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="presentation" class="p-b-60">
            <div class="container">
                <div class="presentation-container background-presentation">
                    <div class="background-presentation">
                        <div class="presentation-content">
                            <div class="heading-text heading-section text-center m-b-40">
                                <h1 class="mulai-sekarang">
                                    Mulai Sekarang
                                </h1>
                                <div class="presentation-text m-t-30">
                                    <h5 class="lead">
                                        Kami dapat membangun sistem mengikuti proses bisnis yang ada di perusahaan anda.
                                        Tim kami siap membantu dengan langkah-langkah yang kita susun dan sepakati bersama.
                                    </h5>
                                </div>
                            </div>
                            <div class="presentation-action">
                                <button class="btn-presentation" type="button">Undang Presentasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer id="footer" class="footer-background">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-b-25">
                            <img alt="footer-logo" src="{{ asset('asset_web/img/esaku/SAKU2021.svg')}}" width="80">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="footer-text-nav">Hubungi Kami</h6>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1">
                                            <img alt="arroba" src="{{ asset('asset_web/img/esaku/arroba.svg')}}" height="20">
                                        </div>
                                        <div class="col-11">
                                            <p class="footer-content-text">dedy@mysai.co.id</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1">
                                            <img alt="phone-call" src="{{ asset('asset_web/img/esaku/phone-call.svg')}}" height="20">
                                        </div>
                                        <div class="col-11">
                                            <p class="footer-content-text">082240002911</p>
                                        </div>
                                    </div>
                                    <a class="link-footer" href="#">
                                        Hubungi Whatsapp  <i class="fas fa-arrow-up arrow-tilted"></i>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-1">
                                            <img alt="pin" src="{{ asset('asset_web/img/esaku/Pin.svg')}}" height="20">
                                        </div>
                                        <div class="col-11">
                                            <p class="footer-content-text">Jalan Raya Bojongsoang Pesona Bali Residence Blok D4/7 Bojongsoang, Kab. Bandung 40288</p>
                                        </div>
                                    </div>
                                    <a class="link-footer" href="#">
                                        Lihat Lokasi  <i class="fas fa-arrow-up arrow-tilted"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-2 perusahaan-container col-dekstop">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-3">
                                    <h6 class="footer-text-nav">Perusahaan</h6>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Tentang</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Blog</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Panduan Aplikasi</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Magang</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-2 layanan-container col-dekstop">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-3">
                                    <h6 class="footer-text-nav">Layanan</h6>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Aplikasi Akuntansi Keuangan</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Aplikasi Kasir</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Integrasi Online Shop</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Custome Aplikasi</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Demo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-content-mobile col-mobile m-t-20">
                        <div class="perusahaan-container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-3">
                                    <h6 class="footer-text-nav">Perusahaan</h6>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Tentang</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Blog</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Panduan Aplikasi</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Magang</p>
                                </div>
                            </div>
                        </div>
                        <div class="layanan-container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-3">
                                    <h6 class="footer-text-nav">Layanan</h6>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Aplikasi Akuntansi Keuangan</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Aplikasi Kasir</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Integrasi Online Shop</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Custome Aplikasi</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-3 col-footer">
                                    <p class="footer-content-text">Demo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="separator-footer"/>
                    <div class="row">
                        <div class="col-12">
                            <span class="copyright">&copy; Copyright 2021 PT Samudra Aplikasi Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    {{-- end: Scroll top --}}

    {{-- Plugins --}}
    <script src="{{ asset('asset_web/js/jquery.js')}}"></script>
    <script src="{{ asset('asset_web/js/plugins.js')}}"></script>
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>
    <script type="text/javascript">
        var $parallaxDashboard = $(".image-dashboard")
        var $parallaxDasboardChange = false;
        var media = window.matchMedia('all');
        var $parallaxDashboardMobile = $(".image-mobile-dashboard")
        var $parallaxDasboardChangeMobile = false;
        var mediaMobile = window.matchMedia('max-width: 480px');

        $(window).scroll(function(){
            if(media.matches) {
                if($(this).scrollTop() > 0 && !$parallaxDasboardChange) {
                    $parallaxDasboardChange = true;
                    $($parallaxDashboard).stop().animate({'marginTop': '-30px'}, 'slow');
                } else if($(this).scrollTop() == 0 && $parallaxDasboardChange) {
                    $parallaxDasboardChange = false;
                    $($parallaxDashboard).stop().animate({'marginTop': '0px'}, 'slow');
                } 
            }
        });

        $(document.body).on('touchmove', onScroll);

        function onScroll() {
            console.log('test mobile')
            // if($(this).scrollTop() > 0 && !$parallaxDasboardChangeMobile) {
            //     $parallaxDasboardChangeMobile = true;
            //     $($parallaxDashboardMobile).stop().animate({'marginTop': '-30px'}, 'slow');
            // } else if($(this).scrollTop() == 0 && $parallaxDasboardChangeMobile) {
            //     $parallaxDasboardChangeMobile = false;
            //     $($parallaxDashboardMobile).stop().animate({'marginTop': '0px'}, 'slow');
            // }
        }

    </script>
</body>
</html>