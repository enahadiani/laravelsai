<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/webjava/images/icon-java.png') }}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>JAVA | Home</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/home-dekstop.css') }}" rel="stylesheet">
</head>

<body>
    
    <div class="body-inner">

        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light ">
            <div class="header-inner">
                <div class="container">
                    <div class="header-container">
                        <div class="information-contact">
                            <span>Phone: +62 22 87306036</span>
                            <span>Email: marketing@javaturbine.co.id</span>
                        </div>   
                        <div class="logo-nav">
                            <div id="logo">
                                <a href="index.html">
                                    <span class="logo-default">
                                        <img alt="logo" src="{{ asset('asset_web/webjava/images/icon-java.png') }}" />
                                    </span>
                                    <span class="logo-dark">
                                        <img alt="logo" src="{{ asset('asset_web/webjava/images/icon-java.png') }}" />
                                    </span>
                                </a> 
                            </div>
                            <div id="mainMenu">
                                <div class="container">
                                    <nav>
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Product</a></li>
                                            <li><a href="#">Company</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <!--Logo-->
                    {{-- <div id="logo">
                        <a href="index.html">
                            <span class="logo-default">
                                <img alt="logo" src="{{ asset('asset_web/webjava/images/icon-java.png') }}" />
                            </span>
                            <span class="logo-dark">
                                <img alt="logo" src="{{ asset('asset_web/webjava/images/icon-java.png') }}" />
                            </span>
                        </a> 
                    </div> --}}
                    <!--End: Logo-->
                    <!--end: Header Extras-->
                    <!--Navigation Resposnive Trigger-->
                    {{-- <div id="mainMenu-trigger"> <a class="lines-button x"><span class="lines"></span></a> </div> --}}
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    {{-- <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Product</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->

        {{-- Section 1 --}}
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360" data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true">

            <!-- Slide 1 -->
            <div class="slide" style="background-image:url('{{ asset('asset_web/webjava/images/section-1.png') }}');">
                <div class="container">
                    <div class="slide-captions text-light section-one-space">
                        <!-- Captions -->
                        <h5 class="text-dark text-lg-x2">PT. JAVA PRATAMA ENERGI</h5>
                        <h1 class="lead">Being a leading EPC company by always maintaining the quality of product and services.</h1>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
            <!-- end: Slide 1 -->

        </div>

    </div>
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>

    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>
</body>

</html>