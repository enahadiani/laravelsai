<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- <meta name="author" content="INSPIRO" /> -->
    <meta name="description" content="PT Trengginas Jaya">
    <link rel="icon" type="image/png" href="images/favicon.png">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>PT Trengginas Jaya</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true" data-transparent="true" class="dark submenu-light">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="index.html">
                            <span class="logo-default"><img src="{{ asset('asset_web/img/Trengginas@2x.png') }}" class="mr-2"> Trengginas</span>
                            <span class="logo-dark">Trengginas</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form class="search-form" action="search-results-page.html" method="get">
                            <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div>
                    <!-- end: search -->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="#" class="a_link" data-href="fHome">Home</a></li>
                                    <li class="dropdown mega-menu-item"><a href="#" class="a_link" data-href="fLayanan">Layanan</a>
                                        <ul class="dropdown-menu">
                                            <li class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <ul>
                                                            <h5 style="font-weight: bold;padding-bottom:25px;">Outsourcing</h5>
                                                            <li><p>Security</p></li>
                                                            <li><p>Cleaning Service</p></li>
                                                            <li><p>Driver</p></li>
                                                            <li><p>Administrasi</p></li>
                                                            <li><p>Help Desk</p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul>
                                                            <h5 style="font-weight: bold;padding-bottom:25px;">Trading & Bussiness Retail</h5>
                                                            <li><p>Pemenuhan Keb. Barang/Jasa</p></li>
                                                            <li><p>Mini Market (TJ Mart)</p></li>
                                                            <li><p>Layanan Catering</p></li>
                                                            <li><p>Jasa Laundry</p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul>
                                                            <h5 style="font-weight: bold;padding-bottom:25px;">Property</h5>
                                                            <li><p>Building Maintenance</p></li>
                                                            <li><p>Rental Kendaraan</p></li>
                                                            <li><p>Sewa Peralatan Pesta/Wisuda</p></li>
                                                            <li><p>Jasa Konstruksi</p></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/webginas2/perusahaan')}}" class="a_link" data-href="fPerusahaan">Perusahaan</a></li>
                                    <li><a href="#" class="a_link" data-href="fKontak">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                </div>
            </div>
        </header>
        <!-- end: Header -->
        <!-- Page title -->
        <section id="page-title" class="page-title-center text-light" style="background-color:#990000;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1 style="font-weight: bold;">Perusahaan</h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Perusahaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Content -->
        
        <!-- end: Content -->
        <!-- Footer -->

        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js') }}"></script>
</body>

</html>