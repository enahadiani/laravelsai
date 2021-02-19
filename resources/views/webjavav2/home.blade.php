<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />    <meta name="author" content="INSPIRO" />    
	<meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="{{ asset('asset_web/webjava/images/icon-java-blue.png') }}">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>JAVA | Home</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/home-dekstop.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/home-mobile.css') }}" rel="stylesheet">
</head>

<body>
    
    <div class="body-inner">

        <!-- Header -->
        <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light ">
            <div class="header-inner">
                <div class="container">
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <div class="header-container">
                        <div class="information-contact col-dekstop">
                            <span>Phone: +62 22 87306036</span>
                            <span>Email: marketing@javaturbine.co.id</span>
                        </div>   
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
                                            <li><a href="https://app.simkug.com/webjava-v2/company">Company</a></li>
                                            <li><a href="https://app.simkug.com/webjava-v2/product">Product</a></li>
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
        <!-- end: Header -->

        {{-- Section 1 --}}
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360" data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true">

            <!-- Slide 1 -->
            <div class="slide" style="background-image:url('{{ asset('asset_web/webjava/images/Group 2.png') }}');">
                <div class="container">
                    <div class="slide-captions text-light section-one-space">
                        <!-- Captions -->
                        <h5 class="text-dark text-lg-x2">PT. JAVA PRATAMA ENERGI</h5>
                        <h1 class="lead">Renewable Energy & Energy Conservation Solution.</h1>
                        <!-- end: Captions -->
                    </div>
                </div>
                <div class="scrolldown-animation" id="scroll-down">
                    <a class="scroll-to" href="#services"><img src="{{ asset('asset_web/webjava/images/scrolldown.png') }}" alt=""></a>
                </div>
            </div>
            <!-- end: Slide 1 -->

        </div>

        {{-- Section 2 --}}
        <section id="services" class="p-b-70">
            <div class="container">
                <div class="heading-text heading-section">
                    <h4>Our Product</h4>
                </div>
                <div class="services-container">
                    {{-- Mobile --}}
                    <div class="services-content col-mobile">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Renewable Energy Consultation</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    With significant focus on use of sustainable energy sources, we provide renewable 
                                    energy generation system design including hydro, thermal, and biomass.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-1">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="services-content col-mobile">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Feasibility Study</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    Supported by experienced engineers and personnel from JPE team, 
                                    feasibility study will give the accurate result to determine potential outcomes of 
                                    a project, including consideration of all relevant factors i.e. 
                                    rough investment cost and ROI to deliver and satisfy client requirements.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-2">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="services-content col-mobile">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Detail Engineering Design (DED)</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    Detailed Engineering Design (DED) stage is a fundamental necessity in refurbishment 
                                    and construct that it exists at the intersection of several development process. 
                                    Our engineers have expertise in related activities such as review of design criteria, 
                                    review of contractor design documents and drawings, and project management.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-3">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="services-content col-mobile">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Fabrication</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    PT. Java Pratama Energi provides fabrication service for turbine and various 
                                    mechanical parts. Fabrication of hydro turbines covers many types i.e. zuppinger, 
                                    screw, cross flow, propeller, pelton, Kaplan, and francis turbine.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="4">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="services-content col-mobile">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Construction</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    JPE concerns on safety value for every construction activity. The team is 
                                    equipped with safety awareness to create a safe working environment for 
                                    both workers and project assets. JPE provide solutions for power plant construction, 
                                    start from civil work to transmission line.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="5">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="services-content col-mobile">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Operation & Maintenance</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    We offer a complete range of Operations & Maintenance (O&M) services to power plant 
                                    owners. By setting up full scope O&M organizations, we ensure safe and efficient 
                                    operations, and reduce plant down time. By applying Reliability Centered Maintenance 
                                    (RCM).
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-6">More >></a>
                            </div>
                        </div>
                    </div>
                    {{-- Dekstop --}}
                    <div class="services-content col-dekstop">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Renewable Energy Consultation</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    With significant focus on use of sustainable energy sources, we provide renewable 
                                    energy generation system design including hydro, thermal, and biomass.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-1">More >></a>
                            </div>
                        </div>
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Feasibility Study</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    Supported by experienced engineers and personnel from JPE team, 
                                    feasibility study will give the accurate result to determine potential outcomes of 
                                    a project, including consideration of all relevant factors i.e. 
                                    rough investment cost and ROI to deliver and satisfy client requirements.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-2">More >></a>
                            </div>
                        </div>
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Detail Engineering Design (DED)</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    Detailed Engineering Design (DED) stage is a fundamental necessity in refurbishment 
                                    and construct that it exists at the intersection of several development process. 
                                    Our engineers have expertise in related activities such as review of design criteria, 
                                    review of contractor design documents and drawings, and project management.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-3">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="services-content col-dekstop">
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Fabrication</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    PT. Java Pratama Energi provides fabrication service for turbine and various 
                                    mechanical parts. Fabrication of hydro turbines covers many types i.e. zuppinger, 
                                    screw, cross flow, propeller, pelton, Kaplan, and francis turbine.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-4">More >></a>
                            </div>
                        </div>
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Construction</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    JPE concerns on safety value for every construction activity. The team is 
                                    equipped with safety awareness to create a safe working environment for 
                                    both workers and project assets. JPE provide solutions for power plant construction, 
                                    start from civil work to transmission line.
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-5">More >></a>
                            </div>
                        </div>
                        <div class="services-card">
                            <div class="card-title">
                                <h6>Operation & Maintenance</h6>
                            </div>
                            <div class="card-content">
                                <p>
                                    We offer a complete range of Operations & Maintenance (O&M) services to power plant 
                                    owners. By setting up full scope O&M organizations, we ensure safe and efficient 
                                    operations, and reduce plant down time. By applying Reliability Centered Maintenance 
                                    (RCM).
                                </p>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-product-detail-6">More >></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 3 --}}
        <section id="total-project" style="object-fit: none;" class="col-dekstop text-light p-t-150 p-b-150" data-bg-parallax="{{ asset('asset_web/webjava/images/JavaTurbineLas.jpg')}}">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="total-project-container">
                    <div class="total-project-text text-center">
                        <h2>We have completed 250+ projects</h2>
                    </div>
                </div>
            </div>
        </section>

        <section id="total-project" class="col-mobile text-light p-t-150 p-b-150" data-bg-parallax="{{ asset('asset_web/webjava/images/JavaTurbineLasMobile.jpg')}}">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="total-project-container">
                    <div class="total-project-text text-center">
                        <h2>We have completed 250+ projects</h2>
                    </div>
                </div>
            </div>
        </section>

        {{-- Section 4 --}}
        <section id="project" class="p-b-25">
            <div class="container">
                <div class="heading-text heading-section">
                    <h4>Project References</h4>
                </div>
                <div class="project-container">
                    {{-- Mobile --}}
                    <div class="project-content col-mobile">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-1.jpg') }}"/>
                            <div class="card-title">
                                <h6>Detailed Engineering Design of Rantau Suli MHPP 2x1.25 MW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-1">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content col-mobile">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-3.jpg') }}"/>
                            <div class="card-title">
                                <h6>Plant Assessment of Merden MHPP 2x200kW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-2">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content col-mobile">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-5.jpg') }}"/>
                            <div class="card-title">
                                <h6>Distribution Grid 20 kV of Sangir MHPP 2x5 MW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-3">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content col-mobile">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-7.jpg') }}"/>
                            <div class="card-title">
                                <h6>EPC of Semawung MHPP 600 kW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-4">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content col-mobile">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-9.jpg') }}"/>
                            <div class="card-title">
                                <h6>Mini Geothermal Steam Turbine, Bukit Daun Project</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-5">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content col-mobile">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-11.jpg') }}"/>
                            <div class="card-title">
                                <h6>Lube Oil Cooling System Modification of Lubuk Gadang MHPP 2x4 MW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-6">More >></a>
                            </div>
                        </div>
                    </div>
                    {{-- Dekstop --}}
                    <div class="project-content col-dekstop">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-1.jpg') }}"/>
                            <div class="card-title">
                                <h6>Detailed Engineering Design of Rantau Suli MHPP 2x1.25 MW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-1">More >></a>
                            </div>
                        </div>
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-3.jpg') }}"/>
                            <div class="card-title">
                                <h6>Plant Assessment of Merden MHPP 2x200kW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-2">More >></a>
                            </div>
                        </div>
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-5.jpg') }}"/>
                            <div class="card-title">
                                <h6>Distribution Grid 20 kV of Sangir MHPP 2x5 MW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-3">More >></a>
                            </div>
                        </div>
                    </div>
                    <div class="project-content col-dekstop">
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-7.jpg') }}"/>
                            <div class="card-title">
                                <h6>EPC of Semawung MHPP 600 kW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-4">More >></a>
                            </div>
                        </div>
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-9.jpg') }}"/>
                            <div class="card-title">
                                <h6>Mini Geothermal Steam Turbine, Bukit Daun Project</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-5">More >></a>
                            </div>
                        </div>
                        <div class="project-card">
                            <img alt="card-image" src="{{ asset('asset_web/webjava/images/project-reference-11.jpg') }}"/>
                            <div class="card-title">
                                <h6>Lube Oil Cooling System Modification of Lubuk Gadang MHPP 2x4 MW</h6>
                            </div>
                            <div class="card-footers">
                                <a href="https://app.simkug.com/webjava-v2/home-project-detail-6">More >></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Footer --}}
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