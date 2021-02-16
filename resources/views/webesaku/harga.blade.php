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
    <title>SAKU | Harga</title>
    <!-- Stylesheets & Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('asset_web/webesaku/fontawesome/css/all.css')}}">
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/websaku-harga.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/websaku-harga-mobile.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="body-inner">
        {{-- Header --}}
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
        {{-- end: Header --}}

        {{-- Section 1 --}}
        <section id="section-1" class="p-b-25">
            <div class="container">
                <div class="heading-text heading-section text-center">
                    <h1>Nilai investasi sesuai kebutuhan</h1>
                    <h5 class="lead">Tentukan harga sesuai dengan kebutuhan bisnis anda</h5>
                </div>
                <div class="list-harga">
                    <div class="card-harga">
                        <div class="card-header">
                            <div class="paket-name">
                                <h2 class="lite">Lite</h2>
                                <button class="free-btn">Gratis</button>
                            </div>
                            <div class="paket-price-month">
                                <h2 class="price-month">
                                    Rp. 99.000/bln
                                </h2>
                            </div>
                            <div class="paket-price-day">
                                <h4 class="price-day">
                                    Rp. 3.300/hari
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pemasukan</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pengeluaran</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Penjualan</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pembelian</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="cross" src="{{ asset('asset_web/img/esaku/cross.png')}}"/>
                                <span class="not-active">Gudang</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">POS</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="cross" src="{{ asset('asset_web/img/esaku/cross.png')}}"/>
                                <span class="not-active">Dashboard</span>
                            </div>
                        </div>
                        <div class="card-footer not-trial">
                            <div class="trial-text">
                                <p>Pakai secara gratis selama 3 bulan</p>
                            </div>
                            <div class="register-button">
                                <button>Daftar sekarang</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-harga">
                        <div class="card-header">
                            <div class="paket-name">
                                <h2 class="medium">Medium</h2>
                            </div>
                            <div class="paket-price-month">
                                <h2 class="price-month">
                                    Rp. 399.000/bln
                                </h2>
                            </div>
                            <div class="paket-price-day">
                                <h4 class="price-day">
                                    Rp. 13.300/hari
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pemasukan</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pengeluaran</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Penjualan</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pembelian</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="cross" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Gudang</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">POS</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="cross" src="{{ asset('asset_web/img/esaku/cross.png')}}"/>
                                <span class="not-active">Dashboard</span>
                            </div>
                        </div>
                        <div class="card-footer with-trial">
                            <div class="trial-button">
                                <button>Coba gratis</button>
                            </div>
                            <div class="trial-text">
                                <p>14 hari</p>
                            </div>
                            <div class="register-button">
                                <button>Daftar sekarang</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-harga">
                        <div class="card-header">
                            <div class="paket-name">
                                <h2 class="full">Full</h2>
                            </div>
                            <div class="paket-price-month">
                                <h2 class="price-month">
                                    Rp. 999.000/bln
                                </h2>
                            </div>
                            <div class="paket-price-day">
                                <h4 class="price-day">
                                    Rp. 33.300/hari
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pemasukan</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pengeluaran</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Penjualan</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Pembelian</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="cross" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Gudang</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">POS</span>
                            </div>
                            <div class="list-fitur">
                                <img alt="check" src="{{ asset('asset_web/img/esaku/check2.png')}}"/>
                                <span class="active">Dashboard</span>
                            </div>
                        </div>
                        <div class="card-footer with-trial">
                            <div class="trial-button">
                                <button>Coba gratis</button>
                            </div>
                            <div class="trial-text">
                                <p>14 hari</p>
                            </div>
                            <div class="register-button">
                                <button>Daftar sekarang</button>
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
</body>
</html>