<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="PT. Samudera Aplikasi Indonesia" />
    <meta name="description" content="Penyedia software keuangan">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/img/esaku/SAKU2021.svg') }}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>SAKU | Home</title>
    <!-- Stylesheets & Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('asset_web/webesaku/fontawesome/css/all.css')}}">
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/websaku.css') }}" rel="stylesheet">
</head>

<body>
    {{-- Body Inner --}}
    <div class="body-inner">

        {{-- Header --}}
        <header id="header" data-transparent="true" data-fullwidth="true" class="submenu-light">
            <div class="header-inner">
                <div class="container header-content">
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
                        <div id="mainMenu-trigger">
                            <a class="lines-button x"><span class="lines"></span></a>
                        </div>
                        <div id="mainMenu" class="main-menu">
                            <div class="container">
                                <nav>
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Produk</a></li>
                                        <li><a href="#">Perusahaan</a></li>
                                        <li><a href="#">Harga</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="header-content-2">
                        <div id="mainMenu2" class="main-menu">
                            <div class="container">
                                <a href="#" id="masuk-link">Masuk</a>
                                <a href="#" id="daftar-link">Daftar Gratis</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{-- end: Header --}}

        {{-- Section Welcome --}}
        <section id="welcome" class="p-b-0">
            <div class="container">
                <div class="heading-text heading-section text-center m-b-40" data-animate="fadeInUp">
                    <h1>Software Pencatatan Bisnis</h1>
                    <h5 class="lead">
                        Mengelola pencatatan bisnis anda sehingga menghasilkan laporan handal dan
                        dashboard bermanfaat.
                    </h5>
                </div>
                <div class="action-welcome" data-animate="fadeInUp">
                    <button type="button" id="daftar-welcome">Daftar Gratis</button>
                    <button type="button" id="hubungi-welcome">Hubungi Kami</button>
                </div>
                <div class="image-welcome" data-animate="fadeInUp">
                    <img src="{{ asset('asset_web/img/esaku/laptop.png')}}" alt="laptop"/>
                </div>
                <div class="text-center m-b-30" data-animate="fadeInUp">
                    <h5 class="lead">Banyak perusahaan yang sudah percaya pada kami</h5>
                    <div class="list-client-welcome" data-animate="fadeInUp">
                        <img alt="telkom" src="{{ asset('asset_web/img/esaku/telkom.png') }}"/>
                        <img alt="tel-u" src="{{ asset('asset_web/img/esaku/tel-u.png') }}"/>
                        <img alt="apparindo" src="{{ asset('asset_web/img/esaku/apparindo.png') }}"/>
                        <img alt="yakkap" src="{{ asset('asset_web/img/esaku/yakkap.png') }}"/>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section Welcome 2 --}}
        <section id="welcome2" class="p-b-0">
            <div class="container">
                <div class="heading-text heading-section text-center m-b-40" data-animate="fadeInUp">
                    <h1>Dashboard luar biasa untuk keputusan bisnis yang percaya diri.</h1>
                    <h5 class="lead">
                        Dari data transaksi yang anda miliki dapat menghasilkan informasi-informasi
                        penting dalam bentuk visual yang mempermudah dalam mengambil keputusan.
                    </h5>
                    <a class="link-lanjut" href="#">Pelajari Lebih Lanjut  <i class="fas fa-arrow-up arrow-tilted"></i></a>
                </div>
                <div class="image-welcome" data-animate="fadeInUp">
                    <img alt="tablet" src="{{ asset('asset_web/img/esaku/tablet.png')}}">
                </div>
            </div>
        </section>

        {{-- Section Alasan --}}
        <section id="alasan" class="p-b-25">
            <div class="container">
                <div class="heading-text heading-section text-center m-b-40" data-animate="fadeInUp">
                    <h4>
                        Alasan kenapa <img alt="saku-text" src="{{ asset('asset_web/img/esaku/SAKU2021.svg')}}" width="80">
                        sangat layak untuk digunakan.
                    </h4>
                    <div id="alasan-digunakan" class="daftar-alasan">
                        <div class="box-alasan" data-animate="fadeInUp">
                            <h5 class="alasan-text">Berpengalaman</h5>
                            <p class="alasan-content">
                                20 tahun lebih diberikan kepercayaan klien dalam membangun sistem akuntansi keuangan.
                            </p>
                        </div>
                        <div class="box-alasan" data-animate="fadeInUp">
                            <h5 class="alasan-text">Online</h5>
                            <p class="alasan-content">
                                Akses data keuangan dimana saja dan kapanpun dengan jaringan internet.
                            </p>
                        </div>
                        <div class="box-alasan" data-animate="fadeInUp">
                            <h5 class="alasan-text">Pelayanan</h5>
                            <p class="alasan-content">
                                Kami siap membantu setiap kendala dengan layanan personal chat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fitur" class="p-b-25">
            <div class="container">
                <div class="heading-text heading-section text-center m-b-40" data-animate="fadeInUp">
                    <h4>
                        Fitur <img alt="saku-text" src="{{ asset('asset_web/img/esaku/SAKU2021.svg')}}" width="80">
                        yang membantu bisnis anda.
                    </h4>
                    <h5 class="lead">
                        Pencatatan semakin mudah dengan fitur yang disediakan sehingga anda bisa fokus 
                        dalam pengembangan bisnis.
                    </h5>
                    <a class="link-lanjut" href="#">Pelajari Lebih Lanjut  <i class="fas fa-arrow-up arrow-tilted"></i></a>
                </div>
                <div class="daftar-fitur">
                    <div class="list-fitur" data-animate="fadeInUp">
                        <div class="list-fitur-header">
                            <img alt="online-shop" src="{{ asset('asset_web/img/esaku/Online Shop.svg')}}" width="65">
                            <h4 class="list-fitur-name">Online Shop</h4>
                        </div>
                        <div class="list-fitur-body">
                            <p>
                                Satu aplikasi yang terintegrasi dengan online shop di Indonesia sehingga proses penjualan
                                anda akan lebih menghemat waktu dan mudah untuk di kontrol.
                            </p>
                        </div>
                    </div>
                    <div class="list-fitur" data-animate="fadeInUp">
                        <div class="list-fitur-header">
                            <img alt="online-shop" src="{{ asset('asset_web/img/esaku/Rekonsiliasi Bank.svg')}}" width="65">
                            <h4 class="list-fitur-name">Rekonsiliasi Bank</h4>
                        </div>
                        <div class="list-fitur-body">
                            <p>
                                Anda dapat mencocokan pencatatan transaksi dari Bank dengan SAKU secara langsung
                                sehingga kebiasaan pengecekan satu per satu bisa dikurangi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="daftar-fitur">
                    <div class="list-fitur" data-animate="fadeInUp">
                        <div class="list-fitur-header">
                            <img alt="online-shop" src="{{ asset('asset_web/img/esaku/Produk.svg')}}" width="65">
                            <h4 class="list-fitur-name">Produk</h4>
                        </div>
                        <div class="list-fitur-body">
                            <p>
                                Kelola produk dari proses pembelian, penjualan, perpindahan produk antar gudang dan
                                cabang dengan mudah.
                            </p>
                        </div>
                    </div>
                    <div class="list-fitur" data-animate="fadeInUp">
                        <div class="list-fitur-header">
                            <img alt="online-shop" src="{{ asset('asset_web/img/esaku/Laporan.svg')}}" width="65">
                            <h4 class="list-fitur-name">Laporan</h4>
                        </div>
                        <div class="list-fitur-body">
                            <p>
                                Berbagai jenis laporan yang dapat dilihat kapan saja secara realtime yang menggambarkan
                                keadaan bisnis anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    {{-- end: Body Inner --}}
    {{-- Scroll top --}}
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    {{-- end: Scroll top --}}

    {{-- Plugins --}}
    <script src="{{ asset('asset_web/js/jquery.js')}}"></script>
    <script src="{{ asset('asset_web/js/plugins.js')}}"></script>
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>
</body>

</html>