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
    <style>
        .slide0{
            background-image: url("{{ asset('asset_web/homepages/business/slide0.png') }}");
        }
        .slide1{
            background-image: url("{{ asset('asset_web/homepages/business/slide1.jpg') }}");
        }
        .slide2{
            background-image: url("{{ asset('asset_web/homepages/business/slide2.jpg') }}");
        }

        .text-red{
            color:#DD1F1A;
        }

        .bg-red{
            background:#DD1F1A !important;
            border:#DD1F1A !important;
        }
        
        .fa-detective{
            content: url("{{ asset('asset_web/homepages/layanan/detective.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-car2{
            content: url("{{ asset('asset_web/homepages/layanan/car.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-cleaning-cart{
            content: url("{{ asset('asset_web/homepages/layanan/cleaning-cart.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-food-tray{
            content: url("{{ asset('asset_web/homepages/layanan/food-tray.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-building{
            content: url("{{ asset('asset_web/homepages/layanan/building.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-parking{
            content: url("{{ asset('asset_web/homepages/layanan/parking.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-teacher{
            content: url("{{ asset('asset_web/homepages/layanan/teacher.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-network-connection{
            content: url("{{ asset('asset_web/homepages/layanan/teacher.svg') }}");
            width:100px !important;
            height:100px !important;
        }

        .heading-text.heading-section h2::before {
            background-color:#DD1F1A !important;
        }

        .inspiro-slider.arrows-dark .flickity-button:hover, .carousel.arrows-dark .flickity-button:hover {
            background:#DD1F1A !important;
        }
        #scrollTop::after, #scrollTop::before 
        {
            background:#DD1F1A !important;
        }
    </style>
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true" class="header-always-fixed header-mini">
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
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->

        <!-- Inspiro Slider -->
        <div id="slider" class="inspiro-slider slider-halfscreen dots-dark arrows-dark dots-creative" data-fade="true" data-height-xs="360">

            <!-- Slide 0 -->
            <div class="slide background-image slide0" >
                <div class="container">
                    <div class="slide-captions text-right">
                        <!-- Captions -->
                        <span class="text-dark">Hallo, kami adalah</span>
                        <h2 class="text-red text-lg">Jasa Outsourcing</h2>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
            <!-- end: Slide 0 -->

            <!-- Slide 1 -->
            <div class="slide background-image slide1" >
                <div class="container">
                    <div class="slide-captions text-right">
                        <!-- Captions -->
                        <span class="strong text-dark">Hello, We ar</span>
                        <h2 class="text-dark text-lg">Creative Agency</h2>
                        <a class="btn btn-dark">Get in Touch</a>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
            <!-- end: Slide 1 -->

            <!-- Slide 2 -->
            <div class="slide background-image slide2" >
                <div class="container">
                    <div class="slide-captions text-right">
                        <!-- Captions -->
                        <span class="strong text-dark">Hello, We ar</span>
                        <h2 class="text-dark text-lg">Creative Agency</h2>
                        <a class="btn btn-dark">Get in Touch</a>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
            <!-- end: Slide 2 -->
        </div>
        <!--end: Inspiro Slider -->  
        
        
        <!-- ABOUT ME -->
        <section id="easy-fast" class="text-light p-b-40" style="background-color:#973735;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="100">
                        <div class="heading-text heading-section">
                            <h1 class="text-medium">Tentang Perusahaan</h1>
                        </div>
                    </div>

                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="300">
                        PT. Trengginas Jaya merupakan salah satu perusahaan subsidiary dari Yayasan Pendidikan Telkom
                        /Telkom Foundation yang berdiri sejak tahun 20012. Sebagai perusahaan penyedia pengeloaan jasa
                        Outsourcing, Bussiness retail, dan Property.
                    </div>

                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="600">
                        PT. Trengginas Jaya memegang komitmen untuk menjaga kualitas, mengutamakan dan meningkatkan
                        kepuasan pelanggan, menjaga kelestarian lingkungan dan menjaga serta meningkatkan kesehatan dan
                        keselamatan.
                    </div>

                </div>
            </div>
        </section>
        <!-- end: ABOUT ME -->

        <!-- Layanan Kami -->
        <section>
            <div class="container">

                <div class="heading-text heading-section m-b-80">
                    <h2>Layanan Kami</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="fa fa-detective"></i></a> </div>
                            <h4>Satpam</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="fa fa-network-connection"></i></a> </div>
                            <h4>Network Project Supervisor</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="far fa-food-tray"></i></a> </div>
                            <h4>Catering</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="fa fa-teacher"></i></a> </div>
                            <h4>Academical Assistant</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="fa fa-cleaning-cart"></i></a> </div>
                            <h4>Cleaning Service</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="fa fa-building"></i></a> </div>
                            <h4>Building Maintenance</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="fa fa-car2"></i></a> </div>
                            <h4>Car Rental</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box medium fancy">
                            <div class="icon"> <a href="#"><i class="fa fa-parking"></i></a> </div>
                            <h4>Parking Service</h4>
                            <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END Layanan Kami -->

        <!-- Mengapa memilih kami -->
        <section class="p-t-100 p-b-100" data-bg-parallax="{{ asset('asset_web/homepages/parallax/4.jpg') }}">
             <div class="bg-overlay"></div>
             <div class="container xs-text-center sm-text-center text-light">
                 <div class="row">
                     <div class="col-lg-5 p-b-60">
                         <h2>Mengapa memilih<br>kami?</h2>
                         <p class="lead">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata.</p>
                         <a href="#services" class="btn btn-light btn-outline btn-rounded">Our Services</a>
                     </div>
                     <div class="col-lg-7">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="text-center">
                                     <div class="counter text-lg"> <span data-speed="3000" data-refresh-interval="50" data-to="202" data-from="10" data-seperator="true"></span> </div>
                                     <div class="seperator seperator-small"></div>
                                     <p>Klien Aktif</p>
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="text-center">
                                     <div class="counter text-lg"> <span data-speed="4500" data-refresh-interval="23" data-to="3000" data-from="100" data-seperator="true"></span> </div>
                                     <div class="seperator seperator-small"></div>
                                     <p>Outsourcing Aktif</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
        </section>
        <!-- end: Mengapa memilih kami -->

        <!-- REVIEWS -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <h2>Apa yang Klien katakan tentang kami?</h2>
                        <p class="lead">Cerita asli yang disampaikan atas pengalaman mereka menggunakan jasa kami.</p>
                    </div>

                    <div class="col-lg-7">
                        <div class="carousel arrows-visibile testimonial testimonial-single testimonial-left" data-items="1" data-animate-in="fadeIn" data-animate-out="fadeOut" data-arrows="false">

                            <!-- Testimonials item -->
                            <div class="testimonial-item">
                                <img src="images/team/6.jpg" alt="">
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
                                <span>Budi Laksmana</span>
                                <span>Direktur PT XYZ</span>
                            </div>
                            <!-- end: Testimonials item-->

                            <!-- Testimonials item -->
                            <div class="testimonial-item">
                                <img src="images/team/7.jpg" alt="">
                                <p>Polo is by far the most amazing template out there! I literally could not be happier that I chose to buy this template!</p>
                                <span>Alan Monre</span>
                                <span>CEO, Square Software</span>
                            </div>
                            <!-- end: Testimonials item-->

                            <!-- Testimonials item -->
                            <div class="testimonial-item">
                                <img src="images/team/8.jpg" alt="">
                                <p>The world is a dangerous place to live; not because of the people who are evil, but because of the people who don't do anything about it.</p>
                                <span>Alan Monre</span>
                                <span>CEO, Square Software</span>
                            </div>
                            <!-- end: Testimonials item-->

                        </div>
                    </div>
                    <!-- end features box -->
                </div>
            </div>
        </section>
        <!-- end: REVIEWS -->

        <!-- CLIENTS -->
        <section>
            <div class="container">
                <div class="heading-text heading-section text-center">
                    <h2>Klien Kami</h2>
                    <span class="lead">Klien yang sudah mempercayai untuk bekerjasama dengan kami.! </span>
                </div>

                <ul class="grid grid-5-columns">
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle7.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle8.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle9.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle10.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle11.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle12.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle13.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle14.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle15.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="{{ asset('asset_web/homepages/client/Rectangle16.png') }}" alt="">
                        </a>
                    </li>
                </ul>

            </div>
        </section>
        <!-- CLIENTS -->

        <!-- BLOG -->
        <section id="section-blog" class="content background-grey pb-0">
            <div class="container">

                <div class="heading-text heading-section text-center">
                    <h2>Berita Terbaru</h2>
                </div>


                <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">

                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="{{ asset('asset_web/homepages/berita/Rectangle18.png') }}">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>19 Oktober 2020</span>
                                <h2><a href="#">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempo
                                    </a></h2>
                                

                                <a href="#" class="item-link text-red">Selengkapnya <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->

                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="{{ asset('asset_web/homepages/berita/Rectangle19.png') }}">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>19 Oktober 2020</span>

                                <h2><a href="#">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempo
                                    </a></h2>
                                

                                <a href="#" class="item-link text-red">Selengkapnya <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->


                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="{{ asset('asset_web/homepages/berita/Rectangle20.png') }}">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>19 Oktober 2020</span>

                                <h2><a href="#">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempo
                                    </a></h2>
                                

                                <a href="#" class="item-link text-red">Selengkapnya <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                </div>
                <div class="heading-text heading-section text-center py-0">
                    <button type="button" class="btn btn-rounded btn-reveal btn-lg bg-red"><span>Selengkapnya</span><i class="icon-chevron-right"></i></button>
                </div>
            </div>
        </section>
        <!-- end: BLOG -->
        <!-- LATEST WORK -->
        <section class="p-b-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-b-30" data-animate="fadeInLeft">

                        <div class="carousel" data-items="1">
                            <a href="{{ asset('asset_web/homepages/kegiatan/Rectangle23.png') }}" data-lightbox="gallery-image" title="Your image title here!"><img src="{{ asset('asset_web/homepages/kegiatan/Rectangle23.png') }}" alt=""></a>

                            <a href="{{ asset('asset_web/homepages/kegiatan/2.jpg') }}" data-lightbox="gallery-image" title="Your image title here!"><img src="{{ asset('asset_web/homepages/kegiatan/2.jpg') }}" alt=""></a>

                            <a href="{{ asset('asset_web/homepages/kegiatan/3.jpg') }}" data-lightbox="gallery-image" title="Your image title here!"><img src="{{ asset('asset_web/homepages/kegiatan/3.jpg') }}" alt=""></a>

                        </div>

                    </div>
                    <div class="col-lg-5 p-l-40 p-r-40" data-animate="fadeInRight">
                        <div class="m-b-40">
                            <h2>Kegiatan Kami</h2>
                            <p>Kami bekerja dengan semangat tinggi. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- LATEST WORK -->

        <!-- Contact -->
        <section class="p-t-100 background-grey p-b-200" style="background-image:url(homepages/branding/images/background-4.png); background-position:71% 22%;">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="row">
                             <div class="col-lg-12">
                                 <h2 class="m-b-10">Hubungi Kami</h2>
                             </div>
                             <div class="col-lg-6 m-b-30">
                                 <address>
                                     <strong>Alamat:</strong><br>
                                     Jl. Sumur Bandung No. 12, Bandung<br>
                                 </address>
                                 <strong>Telp:</strong> (022) 253205
                                 <br>
                                 <strong>Fax:</strong> (022) 2532053
                                 <br>
                                 <strong>Email:</strong> trengginasjaya@yahoo.co.id
                             </div>
                             <div class="col-lg-12 m-b-30">
                                 <h4>Sosial Media</h4>
                                 <div class="social-icons social-icons-light social-icons-colored-hover">
                                     <ul>
                                         <li class="social-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                         </li>
                                         <li class="social-twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                         <li class="social-instagram"><a href="#"><i class="fab fa-instagram"></i></a>
                                         <li class="social-youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-5 offset-1">
                         <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label for="name">Nama</label>
                                     <input type="text" aria-required="true" required name="widget-contact-form-name" class="form-control required name" >
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="email">Email</label>
                                     <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" >
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="message">Pesan</label>
                                 <textarea type="text" required name="widget-contact-form-message" rows="8" class="form-control required" ></textarea>
                             </div>
                             <div class="form-group">
                                 <button class="btn bg-red" type="submit" id="form-submit">Kirim Pesan</button>
                             </div>
                         </form>

                     </div>
                 </div>
             </div>
         </section>
         <!-- end: Contact -->

           <!-- Footer -->
        <footer id="footer">
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2020 PT Trengginas Jaya. All Rights Reserved.</div>
                </div>
            </div>
        </footer>
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