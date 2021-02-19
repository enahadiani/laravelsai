<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/webjava/images/icon-java-blue.png') }}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>JAVA | Contact</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/contact-dekstop.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/contact-mobile.css') }}" rel="stylesheet">
</head>

<body>
    <div class="body-inner">
        <!-- Header -->
        @include('webjavav2.header')
        <!-- end: Header -->

        {{-- Section 1 --}}
        {{-- Section 2 --}}
        <section id="page-title" data-bg-parallax="{{ asset('asset_web/webjava/images/product.jpg') }}">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1 class="text-uppercase text-medium">Contact Us</h1>
                </div>
            </div>
        </section>
        @include('webjavav2.footer')

    </div>

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <sc src="{{ asset('asset_web/js/jquery.js') }}"></sc>
    <sc src="{{ asset('asset_web/js/plugins.js') }}"></sc>

    <!--Template functions-->
    <sc src="{{ asset('asset_web/js/functions.js')}}"></sc>
</body>
</html>