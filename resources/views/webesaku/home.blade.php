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
    <title>SAKU | Home</title>
    <!-- Stylesheets & Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('asset_web/webesaku/fontawesome/css/all.css')}}">
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/websaku-home.css') }}" rel="stylesheet">
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
                                <a href="https://app.simkug.com/esaku-auth/register" id="daftar-link">Daftar Gratis</a>
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
                <div class="heading-text heading-section text-center m-b-20">
                    <h1>Software Pencatatan Bisnis</h1>
                    <div class="heading-paragraph-container">
                        <div class="heading-paragraph">
                            <h5 class="lead">
                                Mengelola pencatatan bisnis anda sehingga menghasilkan laporan handal dan
                                dashboard bermanfaat.
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="action-welcome">
                    <button type="button" id="daftar-welcome" onclick="daftarEsaku()">Daftar Gratis</button>
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
                <div class="heading-text heading-section text-center m-b-25">
                    <h1>Dashboard luar biasa untuk keputusan bisnis yang percaya diri.</h1>
                    <div class="heading-paragraph-container-welcome-2">
                        <div class="heading-paragraph-welcome-2">
                            <h5 class="lead">
                                Dari data transaksi yang anda miliki dapat menghasilkan informasi-informasi
                                penting dalam bentuk visual yang mempermudah dalam mengambil keputusan.
                            </h5>
                        </div>
                    </div>
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
                <div class="heading-text heading-section m-b-40">
                    <h1>
                        Alasan kenapa <img alt="saku-text" src="{{ asset('asset_web/img/esaku/SAKU2021.svg')}}" height=50">
                        sangat layak untuk digunakan.
                    </h1>
                </div>
                <div id="alasan-digunakan" class="daftar-alasan">
                    <div class="box-alasan" data-animate="fadeInUp">
                        <h5 class="alasan-text">Berpengalaman</h5>
                        <div class="alasan-container">
                            <p class="alasan-content">
                                20 tahun lebih diberikan kepercayaan klien dalam membangun sistem akuntansi keuangan.
                            </p>
                        </div>
                    </div>
                    <div class="box-alasan" data-animate="fadeInUp">
                        <h5 class="alasan-text">Online</h5>
                        <div class="alasan-container">
                            <p class="alasan-content">
                                Akses data keuangan dimana saja dan kapanpun dengan jaringan internet.
                            </p>
                        </div>
                    </div>
                    <div class="box-alasan" data-animate="fadeInUp">
                        <h5 class="alasan-text">Pelayanan</h5>
                        <div class="alasan-container">
                            <p class="alasan-content">
                                Kami siap membantu setiap kendala dengan layanan personal chat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Fitur --}}
        <section id="fitur" class="p-b-0">
            <div class="container">
                <div class="heading-text heading-section text-center m-b-25">
                    <h1>
                        Fitur <img alt="saku-text" src="{{ asset('asset_web/img/esaku/SAKU2021.svg')}}" height=50">
                        yang membantu bisnis anda.
                    </h1>
                    <div class="heading-paragraph-container-fitur">
                        <div class="heading-paragraph-fitur">
                            <h5 class="lead">
                                Pencatatan semakin mudah dengan fitur yang disediakan sehingga anda bisa fokus 
                                dalam pengembangan bisnis.
                            </h5>
                        </div>
                    </div>
                    <a class="link-lanjut" href="#">Pelajari Lebih Lanjut  <i class="fas fa-arrow-up arrow-tilted"></i></a>
                </div>
                <div class="daftar-fitur p-b-90">
                    <div class="list-fitur">
                        <div class="list-fitur-header">
                            <img alt="online-shop" src="{{ asset('asset_web/img/esaku/Online Shop.svg')}}" height="120">
                            <h4 class="list-fitur-name">Online Shop</h4>
                        </div>
                        <div class="list-fitur-body">
                            <p>
                                Satu aplikasi yang terintegrasi dengan online shop di Indonesia sehingga proses penjualan
                                anda akan lebih menghemat waktu dan mudah untuk di kontrol.
                            </p>
                        </div>
                    </div>
                    <div class="list-fitur">
                        <div class="list-fitur-header">
                            <img alt="rekon-bank" src="{{ asset('asset_web/img/esaku/Rekonsiliasi Bank.svg')}}" height="120">
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
                    <div class="list-fitur">
                        <div class="list-fitur-header">
                            <img alt="produk" src="{{ asset('asset_web/img/esaku/Produk.svg')}}" height="120">
                            <h4 class="list-fitur-name">Produk</h4>
                        </div>
                        <div class="list-fitur-body">
                            <p>
                                Kelola produk dari proses pembelian, penjualan, perpindahan produk antar gudang dan
                                cabang dengan mudah.
                            </p>
                        </div>
                    </div>
                    <div class="list-fitur">
                        <div class="list-fitur-header">
                            <img alt="laporan" src="{{ asset('asset_web/img/esaku/Laporan.svg')}}" height="120">
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

        {{-- Section Feedback --}}
        <section id="feedback" class="p-b-25">
            <div class="container">
                <div class="heading-text heading-section text-center m-b-40">
                    <h1>
                        Keberhasilan aplikasi adalah memiliki komitmen untuk menjalankannya.
                    </h1>
                    <div class="heading-paragraph-container-feedback">
                        <div class="heading-paragraph-feedback">
                            <h5 class="lead">
                                Banyak perusahaan yang percaya kepada kami dan bertahan karena pelayanan kami serta 
                                komitmen yang kami bangun untuk kesuksesan berjalannya aplikasi.
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="feedback-client">

                    <div class="feedback-corousel">
                        <div class="corousel-content fade-corousel">
                            <div class="feedback-content">
                                <div class="image-client">
                                    <img src="{{ asset('asset_web/img/esaku/client-owner.jpg')}}" width="150" height="150">
                                </div>
                                <div class="keterangan-client">
                                    <div>
                                        <h5 class="jabatan-owner">Direktur Keuangan PT. Lorem Ipsum</h5>
                                    </div>
                                    <div>
                                        <h5 class="nama-owner">Bapak Khoirul Afnan 1</h5>
                                    </div>
                                    <div class="keterangan-owner-container">
                                        <p class="keterangan-owner">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="corousel-content fade-corousel">
                            <div class="feedback-content">
                                <div class="image-client">
                                    <img src="{{ asset('asset_web/img/esaku/client-owner.jpg')}}" width="150" height="150">
                                </div>
                                <div class="keterangan-client">
                                    <div>
                                        <span class="jabatan-owner">Direktur Keuangan PT. Lorem Ipsum</span>
                                    </div>
                                    <div>
                                        <span class="nama-owner">Bapak Khoirul Afnan 2</span>
                                    </div>
                                    <div class="keterangan-owner-container">
                                        <p class="keterangan-owner">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="corousel-content fade-corousel">
                            <div class="feedback-content">
                                <div class="image-client">
                                    <img src="{{ asset('asset_web/img/esaku/client-owner.jpg')}}" width="150" height="150">
                                </div>
                                <div class="keterangan-client">
                                    <div>
                                        <span class="jabatan-owner">Direktur Keuangan PT. Lorem Ipsum</span>
                                    </div>
                                    <div>
                                        <span class="nama-owner">Bapak Khoirul Afnan 3</span>
                                    </div>
                                    <div class="keterangan-owner-container">
                                        <p class="keterangan-owner">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="corousel-content fade-corousel">
                            <div class="feedback-content">
                                <div class="image-client">
                                    <img src="{{ asset('asset_web/img/esaku/client-owner.jpg')}}" width="150" height="150">
                                </div>
                                <div class="keterangan-client">
                                    <div>
                                        <span class="jabatan-owner">Direktur Keuangan PT. Lorem Ipsum</span>
                                    </div>
                                    <div>
                                        <span class="nama-owner">Bapak Khoirul Afnan 4</span>
                                    </div>
                                    <div class="keterangan-owner-container">
                                        <p class="keterangan-owner">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="corousel-content fade-corousel">
                            <div class="feedback-content">
                                <div class="image-client">
                                    <img src="{{ asset('asset_web/img/esaku/client-owner.jpg')}}" width="150" height="150">
                                </div>
                                <div class="keterangan-client">
                                    <div>
                                        <span class="jabatan-owner">Direktur Keuangan PT. Lorem Ipsum</span>
                                    </div>
                                    <div>
                                        <span class="nama-owner">Bapak Khoirul Afnan 5</span>
                                    </div>
                                    <div class="keterangan-owner-container">
                                        <p class="keterangan-owner">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="nav-corousel">
                    <span class="dot" onclick="currentSlides(1)"></span>
                    <span class="dot" onclick="currentSlides(2)"></span>
                    <span class="dot" onclick="currentSlides(3)"></span>
                    <span class="dot" onclick="currentSlides(4)"></span>
                    <span class="dot" onclick="currentSlides(5)"></span>
                </div>
            </div>
        </section>

        {{-- Daftar client --}}
        <section id="client-list" class="p-b-25">
            <div class="container">
                <div class="trusted-client">
                    <div class="heading-section text-center m-t-40">
                        <h5 class="trusted-company">Perusahaan yang sudah mempercayai kami</h5>
                    </div>
                    <div class="trusted-client-content" data-animate="fadeInUp">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                    </div>
                    <div class="trusted-client-content" data-animate="fadeInUp">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                    </div>
                    <div class="trusted-client-content" data-animate="fadeInUp">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                        <img src="{{ asset('asset_web/img/esaku/logo-client.svg') }}" alt="logo-client">
                    </div>
                </div>
            </div>
        </section>

        <section id="presentation" class="p-b-150 p-t-150 background-presentation">
            <div class="container">
                <div class="heading-text heading-section text-center m-b-40">
                    <h1>
                        Mulai Sekarang
                    </h1>
                    <h5 class="lead">
                        Kami dapat membangun sistem mengikuti proses bisnis yang ada di perusahaan anda.
                        Tim kami siap membantu dengan langkah-langkah yang kita susun dan sepakati bersama.
                    </h5>
                </div>
                <div class="presentation-action">
                    <button class="btn-presentation" type="button">Undang Presentasi</button>
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
                        <div class="col-4">
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
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="footer-text-nav">Perusahaan</h6>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Tentang</p>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Blog</p>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Panduan Aplikasi</p>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Magang</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="footer-text-nav">Layanan</h6>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Aplikasi Akuntansi Keuangan</p>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Aplikasi Kasir</p>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Integrasi Online Shop</p>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Custome Aplikasi</p>
                                </div>
                                <div class="col-12 col-footer">
                                    <p class="footer-content-text">Demo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    {{-- end: Body Inner --}}
    {{-- Scroll top --}}
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    {{-- end: Scroll top --}}

    {{-- Plugins --}}
    <script src="{{ asset('asset_web/js/jquery.js')}}"></script>
    <script src="{{ asset('asset_web/js/plugins.js')}}"></script>
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>

    <script type="text/javascript">
        var indexCorousel = 1;
        showSlides(indexCorousel);

        function daftarEsaku()  {
            location.href = "https://app.simkug.com/esaku-auth/register";
        }

        function currentSlides(index) {
            showSlides(indexCorousel = index)
        }

        function showSlides(index) {
            var i;
            var corouselContent = document.getElementsByClassName('corousel-content')
            var dots = document.getElementsByClassName('dot')

            if (index > corouselContent.length) { slideIndex = 1 }
            if (index < 1) { slideIndex = corouselContent.length }

            for (i = 0; i < corouselContent.length; i++) {
                corouselContent[i].style.display = "none";
            }

            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            corouselContent[indexCorousel-1].style.display = "block";
            dots[indexCorousel-1].className += " active";
        }
    </script>
</body>

</html>