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
    <link href="{{ asset('asset_web/css/webjava/company-dekstop.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/webjava/company-mobile.css') }}" rel="stylesheet">
</head>

<body>
    <div class="body-inner">
        <!-- Header -->
        @include('webjavav2.header')
        <!-- end: Header -->

        {{-- Section 1 --}}
        <section id="page-title" data-bg-parallax="{{ asset('asset_web/webjava/images/JavaTurbine2.jpg') }}">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1 class="text-uppercase text-medium">Company</h1>
                </div>
            </div>
        </section>

        {{-- Section 2 --}}
        <section class="p-t-100 p-b-100 section-fullwidth">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 p-l-70 p-r-40">
                    <div class="m-b-40">
                        <h2>Company Profile</h2>
                        <p>
                            PT JAVA PRATAMA ENERGI established on October 3rd, 2014, by Notary Etic Srimartini, SH. MKn. The company domiciled in Bandung, West Java – Indonesia.
                        </p>
                        <p>
                            JAVA is the local end-to-end turbine manufacturer, with proven knowledge and track records in the turbine, mechanical and electrical sector.
                            JAVA provides comprehensive solutions to industries that use either water or steam turbines for its energy needs.
                        </p>
                        <p>
                            Equipped with experienced workmanship and production facility, 
                            We assure to deliver highest quality of product to meet customer satisfaction. 
                            Sustain and reliable is our motto. We strives upholding business transparency and considering 
                            longterm relations with all stakeholder, i.e. clients, employees, subcontractors, 
                            suppliers and services provider.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 m-b-30 col-dekstop">
                    <img alt="logo-company" src="{{ asset('asset_web/webjava/images/JavaTurbineLas2.jpg') }}" style="object-fit: cover;" height="450" width="600"/>
                </div>
            </div>
        </section>

        {{-- Section 3 --}}
        <section class="box-fancy section-fullwidth p-b-150 text-light no-padding">
            <div class="row company-profile-box">
                <div class="col-lg-6 text-left" style="background-color: #012068">
                    <h2>VISION</h2>
                    <span>
                        We aim to be one of the leading companies in providing services and
                        technologies throughout the entire supply chain of clean and renewable
                        energy sector.
                    </span>
                </div>

                <div class="col-lg-6 text-left" style="background-color: #002D96">
                    <h2>MISSION</h2>
                    <p>Participate in global renewable energy development.</p>
                    <p>Provide generating equipment for small and medium scale for hydro and thermal powerplant. </p>
                </div>
            </div>
        </section>

        {{-- Section 4 --}}
        <section class="p-t-100 p-b-100">
            <div class="container">
                <div class="heading-text text-center heading-section m-b-80">
                    <h2>Meet The Team</h2>
                </div>
                <div class="row team-members m-b-40">
                    <div class="col-lg-3">
                        <div class="team-member">
                            <div class="team-image">
                                <img src="{{ asset('asset_web/webjava/images/ceo.jpg')}}" style="object-fit: cover;" height="300">
                            </div>
                            <div class="team-desc">
                                <h3>Lukman Santoso</h3>
                                <span>CEO</span>
                                <p>
                                    Lukman is a mechanical engineer who has more than 17 years
                                    experience in designing and manufacturing turbines,
                                    experiences in rehabilitation, uprating, and develop hydro
                                    power. He co-founded Java with Lis.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <div class="team-image">
                                <img src="{{ asset('asset_web/webjava/images/coo.jpg')}}" style="object-fit: cover;" height="300">
                            </div>
                            <div class="team-desc">
                                <h3>Lis Sumarningsih</h3>
                                <span>COO</span>
                                <p>
                                    Lis is a process engineer by background
                                    She has more than 15 years of
                                    experience in steam turbine, utility engineering, project
                                    management, project controller, and a certified HSE auditor. She also experiences as implementing consultant..
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <div class="team-image">
                                <img src="{{ asset('asset_web/webjava/images/commissioner.jpg')}}" style="object-fit: cover;" height="300">
                            </div>
                            <div class="team-desc">
                                <h3>Elrika Hamdi</h3>
                                <span>Commissioner</span>
                                <p>
                                    Elrika is a long-term specialist in the renewable energy
                                    financial sector. She has helped a number of renwable
                                    projects in Indonesia funded by bilateral and multilateral
                                    donors such as USAID, AFD, GIZ, and UNEP. Elrika is the
                                    Managing Director of PT Imaji, and is currently working as an
                                    energy finance analyst with IEEFA.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <div class="team-image">
                                <img src="{{ asset('asset_web/webjava/images/advisor.jpg')}}" style="object-fit: cover;" height="300">
                            </div>
                            <div class="team-desc">
                                <h3>M. Eddi Danusaputro</h3>
                                <span>Special Advisor</span>
                                <p>
                                    Eddi is an experienced private equity player who has spent
                                    most of his career in Singapore, first with Morgan Stanley, and
                                    afterward co-founded Makara Capital, a boutique financial
                                    services company. A few years ago Eddi returned to Indonesia
                                    to co-found Imaji with Elrika. Eddi is currently the CEO of
                                    Mandiri Capital Indonesia, the corporate venture capital
                                    subsidiary of Bank Mandiri Tbk.
                                </p>
                            </div>
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/sankey.js"></script>
    <script src="https://code.highcharts.com/modules/organization.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js')}}"></script>
    {{-- <script type="text/javascript">
        Highcharts.chart('organization', {
            chart: {
                height: 900,
                width: 1136,
                inverted: true
            },
            title: {
                text: ''
            },
            accessibility: {
                point: {
                    descriptionFormatter: function (point) {
                        var nodeName = point.toNode.name,
                            nodeId = point.toNode.id,
                            nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                            parentDesc = point.fromNode.id;
                        return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
                    }
                }
            },
            series: [{
                type: 'organization',
                name: 'Java Pratama Energi',
                keys: ['from', 'to'],
                data: [
                    ['Java Pratama Energi', 'Commercial and Support'],
                    ['Java Pratama Energi', 'Manufacturing and Support'],
                    ['Java Pratama Energi', 'Engineering, HSE, dan QC/QA'],
                    ['Commercial and Support', 'HRGA'],
                    ['Commercial and Support', 'Finance/Support'],
                    ['Commercial and Support', 'Procurement'],
                    ['Manufacturing and Support', 'Construction'],
                    ['Manufacturing and Support', 'Workshop'],
                    ['Manufacturing and Support', 'Technical'],
                    ['Engineering, HSE, dan QC/QA', 'Proccess and Design'],
                    ['Engineering, HSE, dan QC/QA', 'HSE'],
                    ['Engineering, HSE, dan QC/QA', 'QC/QA'],
                    // ['CEO', 'CPO'],
                    // ['CEO', 'CSO'],
                    // ['CEO', 'HR'],
                    // ['CTO', 'Product'],
                    // ['CTO', 'Web'],
                    // ['CSO', 'Sales'],
                    // ['HR', 'Market'],
                    // ['CSO', 'Market'],
                    // ['HR', 'Market'],
                    // ['CTO', 'Market']
                ],
                levels: [{
                    level: 0,
                    color: 'silver',
                    dataLabels: {
                        style: {
                            fontSize: '8px'
                        }
                    },
                    height: 25,
                }, {
                    level: 1,
                    color: '#007ad0',
                    dataLabels: {
                        style: {
                            fontSize: '8px',
                        }
                    },
                    height: 25,
                }, {
                    level: 2,
                    color: '#980104',
                    dataLabels: {
                        style: {
                            fontSize: '8px',
                        }
                    },
                }, {
                    level: 4,
                    color: '#980104'
                }],
                nodes: [{
                    id: 'Java Pratama Energi',
                    column: 0,
                    width: 140
                },{
                    id: 'Commercial and Support',
                    column: 1,
                    offset: '-30%',
                    width: 140
                    // title: 'CEO',
                    // name: 'Grethe Hjetland',
                    // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131126/Highsoft_03862_.jpg'
                }, {
                    id: 'Manufacturing and Support',
                    column: 1,
                    offset: '0%',
                    width: 140
                    // title: 'HR/CFO',
                    // name: 'Anne Jorunn Fjærestad',
                    // color: '#007ad0',
                    // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131210/Highsoft_04045_.jpg'
                }, {
                    id: 'Engineering, HSE, dan QC/QA',
                    column: 1,
                    offset: '30%',
                    width: 140
                    // title: 'CTO',
                    // name: 'Christer Vasseng',
                    // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131120/Highsoft_04074_.jpg'
                }, {
                    id: 'Proccess and Design',
                    column: 2,
                    // title: 'CPO',
                    // name: 'Torstein Hønsi',
                    // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131213/Highsoft_03998_.jpg'
                }, {
                    id: 'QC/QA',
                    column: 2,
                    // title: 'CSO',
                    // name: 'Anita Nesse',
                    // image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
                }, {
                    id: 'Construction',
                    column: 2,
                    // name: 'Product developers'
                }, {
                    id: 'Workshop',
                    column: 2,
                    // name: 'Web devs, sys admin'
                }, {
                    id: 'Technical',
                    column: 2,
                    // name: 'Sales team'
                }, {
                    id: 'HRGA',
                    column: 2,
                    // name: 'Sales team'
                }, {
                    id: 'Finance/Accounting',
                    column: 2,
                    // name: 'Sales team'
                }, {
                    id: 'Technical',
                    column: 2,
                    // name: 'Sales team'
                },
                // {
                //     id: 'Market',
                //     name: 'Marketing team',
                //     column: 5
                // }
                ],
                colorByPoint: false,
                borderColor: 'white',
                nodeWidth: 65
            }],
            tooltip: {
                outside: true
            },
            exporting: {
                enabled: false
            },
            credits: {
                enabled: false
            }

        });
    </script> --}}
</body>
</html>