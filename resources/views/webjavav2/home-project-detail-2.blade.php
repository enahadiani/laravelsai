<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/webjava/images/icon-java-blue.png') }}">   
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
                                <a href="https://app.simkug.com/webjava-v2/home">
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
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-3.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-4.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-3.jpg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-5 p-l-40 p-r-40">
                        <div class="m-b-40">
                            <h5>Plant Assessment of Merden MHPP 2x200kW</h5>
                            <p>
                                Merden MHPP situated at Kebumen District, Central Java owned by PT Citra Contac was assessed to identify the most contribution factor of decreasing efficiency. The assessment was includes hydrology, operation and existing design.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        @include('webjavav2.footer')

    </div>

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>
</body>
</html>