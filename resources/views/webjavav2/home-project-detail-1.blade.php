<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/webjava/images/icon-java-black.png') }}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>JAVA | Project Detail</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/home-product-detail-dekstop.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/home-product-detail-mobile.css') }}" rel="stylesheet">
</head>
<body>
    <div class="body-inner">
        {{-- Header --}}
        <header id="header" data-transparent="true" data-fullwidth="true" class="submenu-light ">
            <div class="header-inner">
                <div class="container">
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <div class="header-container">   
                        <div class="logo-nav">
                            <div id="logo">
                                <a href="index.html">
                                    <span class="logo-default">
                                        <img alt="logo" width="70" src="{{ asset('asset_web/webjava/images/icon-java-blue.png') }}" />
                                    </span>
                                    <span class="logo-dark">
                                        <img alt="logo" src="{{ asset('asset_web/webjava/images/icon-java-white.png') }}" />
                                    </span>
                                </a> 
                            </div>
                            <div id="mainMenu">
                                <div class="container">
                                    <nav>
                                        <ul>
                                            <li><a href="https://app.simkug.com/webjava-v2/home">Home</a></li>
                                            <li><a href="https://app.simkug.com/webjava-v2/product">Product</a></li>
                                            <li><a href="https://app.simkug.com/webjava-v2/company">Company</a></li>
                                            <li><a href="https://app.simkug.com/webjava-v2/contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                    <div class="information-contact col-mobile">
                                        <div>
                                            <p>Phone: +62 22 87306036</p>
                                            <p>Email: marketing@javaturbine.co.id</p>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </header>
        {{-- End Header --}}
        {{-- Section 1 --}}
        <section id="section-2" class="p-t-100 p-b-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-b-30">
                        <div class="carousel" data-items="1">
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-1.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-2.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-1.jpg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-5 p-l-40 p-r-40">
                        <div class="m-b-40">
                            <h5>Detailed Engineering Design of Rantau Suli MHPP 2x1.25 MW</h5>
                            <p>
                                The project consists of development of an off-grid 2 x 1.25 MW mini-hydropower plant (MHPP), in the village of Rantau Suli, Jambi Province, granted by Millennium Challenge Account. JPE provided detailed design of main M/E components and the balance of plant.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <footer id="footer" class="footer-background">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="m-b-10">Get in Touch with Us</h2>
                                </div>
                                <div class="col-lg-6 m-b-30">
                                    <address>
                                        <strong>Corporate Domicile</strong><br>
                                        Jl. Maskumambang No. 9<br>
                                        Turangga, Lengkong,<br>
                                        Bandung<br>
                                    </address>
                                    <address>
                                        <strong>Workshop<br>Representative office</strong><br>
                                        Jl. Ahmad Yani 726<br>
                                        Bandung<br>
                                    </address>
                                </div>
                                <div class="col-lg-6 m-b-30">
                                    <address>
                                        <strong>Engineering office</strong><br>
                                        De Primaterra Industrial Estate<br>
                                        C2A-6<br>
                                        Jalan Raya Sapan, Tegal Luar,<br>
                                        Bojongsoang Bandung 40288<br>
                                    </address>
                                    Phone/Fax: +62 22 87306036
                                    <br>
                                </div>
                            </div>
                        </div>
                        {{-- Mobile --}}
                        <div class="col-lg-5 col-mobile">
                            <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" aria-required="true" name="widget-contact-form-name" class="form-control required name" placeholder="Enter your Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" placeholder="Enter your Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="upper" for="phone">Phone</label>
                                        <input type="text" class="form-control required" name="widget-contact-form-phone" placeholder="Enter phone" aria-required="true">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Services</label>
                                        <select name="widget-contact-form-services">
                                            <option value="">Select service</option>
                                            <option value="Wordpress">Wordpress</option>
                                            <option value="PHP / MySQL">PHP / MySQL</option>
                                            <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                            <option value="Graphic Design">Graphic Design</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea type="text" name="widget-contact-form-message" rows="8" class="form-control required" placeholder="Enter your Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light" type="submit" id="form-submit">Send email</button>
                                </div>
                            </form>

                        </div>
                        {{-- Dekstop --}}
                        <div class="col-lg-5 offset-1 col-dekstop">
                            <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" aria-required="true" name="widget-contact-form-name" class="form-control required name" placeholder="Enter your Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" placeholder="Enter your Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label class="upper" for="phone">Phone</label>
                                        <input type="text" class="form-control required" name="widget-contact-form-phone" placeholder="Enter phone" aria-required="true">
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label>Services</label>
                                        <select name="widget-contact-form-services">
                                            <option value="">Select service</option>
                                            <option value="Wordpress">Wordpress</option>
                                            <option value="PHP / MySQL">PHP / MySQL</option>
                                            <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                                            <option value="Graphic Design">Graphic Design</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea type="text" name="widget-contact-form-message" rows="8" class="form-control required" placeholder="Enter your Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-light" type="submit" id="form-submit">Send email</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; {{ date('Y') }} Java Turbine</div>
                </div>
            </div>
        </footer>

    </div>

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>
</body>
</html>