<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/webjava/images/icon-java-blue.png') }}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>JAVA | Product Detail</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/home-product-detail-dekstop.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/home-product-detail-mobile.css') }}" rel="stylesheet">
</head>
<body>
    <div class="body-inner">
        {{-- Header --}}
        @include('webjavav2.header')
        {{-- End Header --}}
        {{-- Section 1 --}}
        <section id="section-2" class="p-t-100 p-b-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-b-30">
                        <div class="carousel" data-items="1">
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/operation-maintenance-1.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/operation-maintenance-1.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/operation-maintenance-1.jpg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-5 p-l-40 p-r-40">
                        <div class="m-b-40">
                            <h5>Operation & Maintenance</h5>
                            <p>
                                We offer a complete range of Operations & Maintenance (O&M) services to power plant owners. By setting up full scope O&M organizations, we ensure safe and efficient operations, and reduce plant down time. By applying Reliability Centered Maintenance (RCM), we provides a structured framework for analyzing the functions and potential failures for a physical asset.
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