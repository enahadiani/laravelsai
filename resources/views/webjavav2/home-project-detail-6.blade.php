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
        @include('webjavav2.header')
        {{-- End Header --}}
        {{-- Section 1 --}}
        <section id="section-2" class="p-t-100 p-b-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-b-30">
                        <div class="carousel" data-items="1">
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-11.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-12.jpg') }}" alt=""></a>
                            <a href="#" data-lightbox="gallery-image"><img src="{{ asset('asset_web/webjava/images/project-reference-11.jpg') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-5 p-l-40 p-r-40">
                        <div class="m-b-40">
                            <h5>Lube Oil Cooling System Modification of Lubuk Gadang MHPP 2x4 MW</h5>
                            <p>
                                Most of hydro power plant are using plate heat exchanger type for oil cooling. But this PHE mostly not effective and causing plant downtime, since the water turbidity is high. Lubuk Gadang MHPP cooling system is modified with coil heat exchanger, submerged in the tailrace.
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