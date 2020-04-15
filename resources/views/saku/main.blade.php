<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_elite/images/saku.png') }}">
    <title>SAKU | Sistem Akuntansi Keuangan</title>
    <!-- This page CSS -->
    <!-- Font Awesome CSS -->
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fa-brands.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fa-regular.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fa-solid.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/webfonts/fa-solid-900.woff2') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/webfonts/fa-solid-900.ttf') }}" rel="stylesheet">
    <link href="{{ asset('asset_elite/icons/font-awesome/webfonts/fa-solid-900.woff') }}" rel="stylesheet">
    
    <!-- chartist CSS -->
    <link href="{{ asset('asset_elite/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
     
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('asset_elite/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('asset_elite/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('asset_elite/dist/css/pages/dashboard1.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset_elite/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Select 2 -->
    <link href="{{ asset('asset_elite/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- SAI CSS -->
    <link href="{{ asset('asset_elite/dist/css/sai.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('asset_elite/bootstrap-datepicker.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('asset_elite/dist/js/swal/sweetalert2.min.css') }}">
    
    <link href="{{ asset('asset_elite/selectize.bootstrap3.css') }}" rel="stylesheet">

    <!-- Tagify -->
    <link rel="stylesheet" href="{{ asset('asset_elite/tagify/dist/tagify.css') }}">
    <style>
     .navbar-header{
            width:270px;
        }

        .left-sidebar{
            width:270px;
        }

        .sidebar-nav > ul > li > ul > li > a {
            padding: 7px 10px 7px 15px;
        }

        .footer, .page-wrapper {
            margin-left: 270px;
        }
        .page-wrapper{
            min-height: 600px !important;
        }

        .topbar .top-navbar .navbar-header {
            height: 50px;
            line-height: 50px;
        }
        .topbar .top-navbar,.navbar-collapse,.navbar-nav {
            height: 50px;
        }

        .left-sidebar {
            padding-top: 50px !important;
        }

        .fixed-header .page-wrapper, .fixed-layout .page-wrapper {
            padding-top: 50px !important;
        }

        .topbar .top-navbar .navbar-nav > .nav-item > .nav-link {
            line-height: 35px !important;
        }

        .selectize-input, input.form-control , .custom-file-label{
            border-color:#929090;
        }

        .error input.form-control{
            border-color: #e46a76; 
        }

        .validate input.form-control {
            border-color: #00c292; 
        }

        input.form-control:focus{
            border-color:#929090;
        }
    </style>
    <script src="{{ asset('asset_elite/highcharts2.js') }}"></script>
    <script src="{{ asset('asset_elite/highcharts-more.js') }}"></script>
    <script src="{{ asset('asset_elite/jquery-3.4.1.js') }}" ></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ asset('asset_elite/node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('asset_elite/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('asset_elite/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('asset_elite/dist/js/waves.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('asset_elite/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset('asset_elite/node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Select 2 -->
    <script src="{{ asset('asset_elite/node_modules/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('asset_elite/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('asset_elite/dist/js/custom.min.js') }}"></script>
    <!-- <script src="js/selectize.min.js"></script> -->
    <script src="{{ asset('asset_elite/standalone/selectize.min.js') }}"></script>

    <script src="{{ asset('asset_elite/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('asset_elite/node_modules/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('asset_elite/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
   
    <!-- Popup message jquery -->
    <script src="{{ asset('asset_elite/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('asset_elite/bootstrap-datepicker.min.js') }}"></script>
    
    <script src="{{ asset('asset_elite/dist/js/swal/sweetalert2.all.min.js') }}"></script>
    
    <!-- This is data table -->
    <script src="{{ asset('asset_elite/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   
    <script src="{{ asset('asset_elite/jquery.twbsPagination.min.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>
    <script src="{{ asset('asset_elite/sai.js') }}"></script>

    <!-- Tiny Editor -->
    <script src="{{ asset('asset_elite/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
    $(document).ready(function() {
        $('.selectize').selectize();
    });
    tinymce.init({
        selector: '#isi',
        plugins: 'print preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table tc help',
        paste_data_images: true,
        height: 450,
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment'
    });
    </script>
    
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SAKU admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <b>
                            <img src="{{ asset('asset_elite/images/sai_icon/logo.png') }}" alt="homepage" class="light-logo" width="30px">
                        </b>
                        <span style="display: none;"> 
                         <img src="{{ asset('asset_elite/images/sai_icon/logo-text.png') }}" class="light-logo" alt="homepage" width="90px"></span> 
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <li class="nav-item"> 
                        <h3 style='line-height:50px;color:white'> 
                        {{Session::get('namaLokasi')}}</h3>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile-->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Session::get('foto') == "" || Session::get('foto') == "-" )
                                <img src="{{ asset('asset_elite/images/user.png') }}"  alt="user" class=""> 
                            @else
                                <img src="{{ asset('asset_elite/images/'.Session::get('foto')) }}"  alt="user" class="">
                            @endif
                            
                            <span class="hidden-md-down"> {{Session::get('namaUser')}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="{{url('saku/logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height: 600px !important;">
            
            <section class="content" id='ajax-content-section'>
                <div class="body-content">
                </div>
            </section>
            <script>
               
                var form ="";
                function loadForm(url){
                    $('.body-content').load(url);
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                function loadMenu(){
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('/saku/menu') }}",
                        dataType: 'json',
                        async:false,
                        success:function(result){
                            if(result[0].status){
                                $('#sidebarnav').html('');
                                $(result[0].hasil).appendTo('#sidebarnav').slideDown();
                            }
                        },
                        fail: function(xhr, textStatus, errorThrown){
                            alert('request failed:'+textStatus);
                        }
                    });
                }

                loadMenu();

                
                // if(form !="" || form != "-"){
                //     loadForm("")
                // }

                
                $('.sidebar-nav').on('click','.a_link',function(e){
                    e.preventDefault();
                    var form = $(this).data('href');
                    var url = "{{ url('/saku/form')}}"+"/"+form;
                    if(form == "" || form == "-"){
                        // alert('Form dilock!');
                        return false;
                    }else{
                        loadForm(url);

                    }
                    // alert(tmp[4]);
                });
            </script>
        </div>
    </div>    
</body>
</html>