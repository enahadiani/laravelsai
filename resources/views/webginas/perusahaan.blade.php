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
        span.lines::before {
            background-color: white;
        }
        span.lines::after {
            background-color: white
        }
        span.lines.close::before {
            background-color: black;
        }
        span.lines.close::after {
            background-color: black
        }
        h2::before{
            background-color: #DD1F1A !important;
        }
        header.sticky-active > .header-inner > .container > #logo > a > span.name {
            color: black !important;
        }
        .background-white {
            background-color: white;
        }
        .background-black {
            background-color: black;
        }
        .white {
            color: white !important;
        }
        .black{
            color: black !important;
        }
        .list-submenu-text:hover {
            color: #DD1F1A;
            font-weight: bold;
            cursor: pointer;
        }
        .misi-box{
            background-color: #DD1F1A;
            height:400px;
        }
        .pg-2{
            margin-top: 50px;
        }
        span.logo-default {
            font-size: 20px !important;
        }
        img.whatsapp-scroll {
            position: fixed;
            bottom: 70px;
            right: 25px;
            z-index: 99;
        }

        img.whatsapp-not-scroll {
            position: fixed;
            bottom: 20px;
            right: 25px;
            z-index: 99;
        }
        @media (max-width: 768px) {
            .misi-box {
                height: 500px;
            }
            p.list-submenu-text {
                color: black !important;
            }
            .white {
                color: white !important;
            }
            .black{
                color: black !important;
             }
            .menu-prime {
                color: black !important;
            }
            .pg-2 {
                margin-top: 30px;
            }
            .pg-2-mobile {
                margin-top: 12px;
            }
        }
    </style>
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true" data-transparent="true">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="{{url('/webginas2/')}}">
                            <span class="watch-class white judul logo-default" style="font-size: 32px;"><img src="{{ asset('asset_web/img/Trengginas@2x.png') }}" class="mr-2"> PT. Trengginas Jaya</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x black"></i></a>
                        <form class="search-form" action="search-results-page.html" method="get">
                            <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div>
                    <!-- end: search -->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x open-menu"><span class="lines background-white"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/webginas2/')}}" class="a_link watch-class white menu-prime" data-href="fHome">Home</a></li>
                                    <li class="dropdown mega-menu-item"><a href="#" class="a_link watch-class white menu-prime" data-href="fLayanan">Layanan</a>
                                        <ul class="dropdown-menu">
                                            <li class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <ul class="submenu-outsourcing">
                                                            <a href="{{url('webginas2/layanan/outsourcing')}}"><h5 style="font-weight: bold;padding-bottom:25px;">Outsourcing</h5></a>
                                                            <li class="list-submenu"><p class="list-submenu-text">Security</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Cleaning Service</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Driver</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Administrasi</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Help Desk</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Tenaga Ahli</p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="submenu-bussiness">
                                                            <h5 style="font-weight: bold;padding-bottom:25px;">Trading & Bussiness Retail</h5>
                                                            <li class="list-submenu"><p class="list-submenu-text">Pemenuhan Keb. Barang/Jasa</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Mini Market (TJ Mart)</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Layanan Catering</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Jasa Laundry</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Inovasi dan Teknologi</p></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <ul class="submenu-property">
                                                            <h5 style="font-weight: bold;padding-bottom:25px;">Property</h5>
                                                            <li class="list-submenu"><p class="list-submenu-text">Building Maintenance</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Rental Kendaraan</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Sewa Peralatan Pesta/Wisuda</p></li>
                                                            <li class="list-submenu"><p class="list-submenu-text">Jasa Konstruksi</p></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/webginas2/perusahaan')}}" class="a_link watch-class white menu-prime" data-href="fPerusahaan">Perusahaan</a></li>
                                    <li><a href="{{url('/webginas2/kontak')}}" class="a_link watch-class white menu-prime" data-href="fKontak">Kontak</a></li>
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
        <section id="page-title" class="page-title-center text-light" style="background-color:#DD1F1A;">
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
        
        <!-- About -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="100">
                        <div class="heading-text heading-section m-b-80">
                            <h2>Tentang Kami</h2>
                        </div>
                    </div>
                    <div id="deskripsi-1" class="col-lg-4" data-animate="fadeInUp" data-animate-delay="300">
                        {!!
                            $deskripsi
                        !!}
                        <div id="paragraph-1"></div>
                        <div id="paragraph-3" class="pg-2"></div>
                    </div>
                    <div id="deskripsi-2" class="col-lg-4" style="padding-right:10px;" data-animate="fadeInUp" data-animate-delay="300">
                        <div id="paragraph-2" class="pg-2-mobile"></div>
                        <div id="paragraph-4" class="pg-2"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About -->

        <!-- Visi Misi -->
        <section>
            <div class="row" style="padding: 0 !important; margin: 0 !impotant;">
                <div class="col-lg-6" style="background-color: #ff0000;height:400px;" data-animate="fadeInUp" data-animate-delay="300">
                    <div class="container">
                        <h2 class="white" style="font-weight: bold;padding:40px 40px 0 100px;">Visi</h2>
                        <p class="white" style="padding:10px 40px 40px 100px;">
                            {!!$visi !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 misi-box" data-animate="fadeInUp" data-animate-delay="300">
                    <h2 class="white" style="font-weight: bold;padding:40px 40px 0 100px;">Misi</h2>
                        @foreach ($misi as $item)
                        <p class="white" style="padding:0 40px 40px 100px;">
                            {{$item['no_urut']}}. {{ $item['misi'] }}
                        </p>    
                        @endforeach
                </div>
            </div>
        </section>
        <!-- End Visi Misi -->

        <!-- Sertifikasi -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="100">
                        <div class="heading-text heading-section m-b-80">
                            <h2>Sertifikasi</h2>
                        </div>
                    </div>
                    <div class="col-lg-8" data-animate="fadeInUp" data-animate-delay="300">
                        <div class="carousel testimonial testimonial-box" data-items="3" data-margin="30" data-arrows="false">
                            <div style="height: 250px;">
                                <img height="250" src="{{ asset('asset_web/homepages/sertifikat/certificate-ISO-9001-14001-engl.jpg')}}"/>
                            </div>
                            <div style="height: 250px;">
                                <img height="250" src="{{ asset('asset_web/homepages/sertifikat/en_iso9001_large.jpg')}}"/>
                            </div>
                            <div style="height: 250px;">
                                <img height="250" src="{{ asset('asset_web/homepages/sertifikat/ISO-TA.jpg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sertifikasi -->
        
        <!-- Contact -->
        <section class="p-t-100 background-grey p-b-200" style="background-position:71% 22%;">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="row">
                             <div class="col-lg-12">
                                 <h2 class="m-b-10">Hubungi Kami</h2>
                             </div>
                             <div class="col-lg-6 m-b-30">
                                 <strong>Alamat:</strong><br>
                                 <span id="alamat"></span><br>
                                 <strong>Telp:</strong> <span id="telp"></span>
                                 <br>
                                 <strong>Fax:</strong> <span id="fax"></span>
                                 <br>
                                 <strong>Email:</strong> <span id="email"></span>
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

        <!-- end: Content -->
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
    <!--Whatsapp-->
    <a id="link-wa" target="_blank"><img id="whatsapp" alt="whatsapp" class="whatsapp" height="40" width="40" src="{{ asset('asset_web/homepages/icon/whatsapp.png') }}"/></a>
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js') }}"></script>
    <script type="text/javascript">

        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-kontak') }}",
            dataType: 'JSON',
            success: function(result) {
                if(result.status) {
                    var data = result.daftar[0];
                    $('#alamat').text(data.alamat);
                    $('#telp').text(data.no_telp);
                    $('#fax').text(data.no_fax);
                    $('#email').text(data.email);
                }
            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-wa') }}",
            dataType: 'JSON',
            success: function(result) {
                if(result.status) {
                    $('#link-wa').attr('href', result.daftar[0].link_wa)
                }
            }
        });

        $('#deskripsi-1').children('p').each(function(index, element){
            $(this).attr('id', 'text-'+(index+1))
        });
        
        var paragraph1 = $('#text-1').text();
        var paragraph2 = $('#text-2').text();
        var paragraph3 = $('#text-3').text();
        var paragraph4 = $('#text-4').text();
        $('#deskripsi-1').children('p').remove();
        $('#paragraph-1').append(paragraph1);
        $('#paragraph-3').append(paragraph3);
        $('#paragraph-2').append(paragraph2);
        $('#paragraph-4').append(paragraph4);

        var whatsapp = $('#whatsapp');
        window.onscroll = function() {
            scrollFunction();
        }

        function scrollFunction() {
            if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
                whatsapp.removeClass('whatsapp-not-scroll');
                whatsapp.addClass('whatsapp-scroll');
            } else {
                whatsapp.removeClass('whatsapp-scroll');
                whatsapp.addClass('whatsapp-not-scroll');
            }
        }

        function checkHeader(){
            if($(window).width() > 768) {
                if($('#header').hasClass('sticky-active')) {
                    $('.watch-class').removeClass('white');
                    $('.watch-class').addClass('black');                
                } else {
                    $('.watch-class').removeClass('black');
                    $('.watch-class').addClass('white');
                }
            }
        }
        setInterval(checkHeader, 500);

        $('.submenu-outsourcing').on('click', '.list-submenu', function(){
            var idx = $(this).index();
            if(idx === 1) {
                window.location.href = "{{ url('webginas2/layanan/outsourcing/security') }}";
            } else if(idx === 2) {
                window.location.href = "{{ url('webginas2/layanan/outsourcing/cleaning-service') }}";
            } else if(idx === 6) {
                window.location.href = "{{ url('webginas2/layanan/outsourcing/tenaga-ahli') }}";
            }
        })

        $('.submenu-bussiness').on('click', '.list-submenu', function(){
            var idx = $(this).index();
            if(idx === 3) {
                window.location.href = "{{ url('webginas2/layanan/trading-bussiness-retail/catering') }}";
            } else if(idx === 5) {
                window.location.href = "{{ url('webginas2/layanan/trading-bussiness-retail/inovasi') }}";
            }
        })

        $('.submenu-bussiness').on('click', '.list-submenu', function(){
            var idx = $(this).index();
            if(idx === 3) {
                window.location.href = "{{ url('webginas2/layanan/trading-bussiness-retail/catering') }}";
            } else if(idx === 5) {
                window.location.href = "{{ url('webginas2/layanan/trading-bussiness-retail/inovasi') }}";
            }
        })

        $('.submenu-property').on('click', '.list-submenu', function(){
            var idx = $(this).index();
            if(idx === 1) {
                window.location.href = "{{ url('webginas2/layanan/property/building-maintenance') }}";
            } else if(idx === 2) {
                window.location.href = "{{ url('webginas2/layanan/property/rental-car') }}";
            }
        })

        $('.open-menu').click(function(){
            var children = $(this).children();
            children.toggleClass('close');
            var judul = $('.judul');
            if(judul.hasClass('white')) {
                judul.removeClass('white');
                judul.addClass('black');
            } else {
                judul.removeClass('black');
                judul.addClass('white');
            }
        })
    </script>
</body>

</html>