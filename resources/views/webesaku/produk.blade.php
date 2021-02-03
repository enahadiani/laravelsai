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
    <link href="{{ asset('asset_web/css/websaku-produk.css') }}" rel="stylesheet">
</head>
<body>
    
    <div class="body-inner">

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

        {{-- Dashboard --}}
        <section id="dashboard" class="p-b-25">
            <div class="container dashboard">
                <div class="dashboard-container text-center">
                    <h1>Dashboard</h1>
                    <h5 class="lead">
                        Satu sumber data yang menghasilkan banyak analisa.
                    </h5>
                    <img alt="tablet" class="image-dashboard" src="{{ asset('asset_web/img/esaku/tablet-crop.png')}}"/>
                </div>
            </div>
        </section>

        {{-- Produk Fitur --}}
        <section id="produk-fitur" class="p-b-25">
            <div class="container produk-fitur">
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
                            <div class="col-12 p-b-30">
                                <div class="custom-text">
                                    <h5 class="lead">
                                        Bangun sistem sesuai dengan kebutuhan bisnis Anda.
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="#" class="link-kontak">Kontak Kami</a>
                            </div>
                            <div class="icon-container">
                                <div class="cog-icon">
                                    <i class="fas fa-cog cog-tilted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="jenis-usaha" class="p-b-30">
            <div class="container jenis-usaha">
                <div class="jenis-usaha-container">
                    <div class="jenis-content">
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
                    <div class="jenis-content">
                        <div class="row">
                            <div class="col-12 p-b-20">
                                <h1>Jasa</h1>
                            </div>
                            <div class="col-12">
                                <div class="jenis-text">
                                    <h5 class="lead">
                                        Pencatatan transaksi secara otomatis dan menghasilkan laporan yang dapat dipertanggugjawabkan.
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="jenis-usaha-container">
                    <div class="jenis-content">
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
                    <div class="jenis-content">
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
                    <div class="jenis-content">
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
                    <div class="jenis-content">
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

    </div>

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    {{-- end: Scroll top --}}

    {{-- Plugins --}}
    <script src="{{ asset('asset_web/js/jquery.js')}}"></script>
    <script src="{{ asset('asset_web/js/plugins.js')}}"></script>
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>

</body>
</html>