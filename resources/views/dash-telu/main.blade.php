<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SAKU - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <meta name="_token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/datatables.responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/glide.core.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-stars.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-float-label.min.css') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');


        body {
            font-family: 'Roboto', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, p,li,ul,a,input,select{
            font-family: 'Roboto', sans-serif !important;
        }
        .highcharts-root {
            font-family: 'Roboto', sans-serif !important;
        }

        .logo{
            background:url("{{ asset('img/Tel-U-logo_1.PRIMER-Utama.png') }}") no-repeat;
            background-size: 150px;
            background-position-x: center;
            background-position-y: center;
            width:160px;
            height:45px;
        }
        .logo-mobile{
            background:url("{{ asset('img/logo-telu.png') }}") no-repeat;
            background-size:30px;
            width:30px;
        }
    </style>
    <script>
        var $public_asset = "{{ asset('asset_dore') }}/";
    </script>
    <script src="{{ asset('asset_dore/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset_elite/highcharts2.js') }}"></script>
    <script src="{{ asset('asset_elite/highcharts-more.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/progressbar.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.barrating.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/select2.full.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/nouislider.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/Sortable.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/glide.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/dore.script.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap-notify.min.js') }}"></script>
    
</head>

@if(Session::get('menu') != "")
<body id="app-container" class="{{ Session::get('menu') }} show-spinner">
@else
<body id="app-container" class="menu-default show-spinner">
@endif


    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>

            <form action="#">
                <div class="search" >
                    <input type="text" placeholder="Search..." id="cari" name="cari"  type="text" class="form-control typeahead" data-provide="typeahead" autocomplete="off"/>
                    <span class="search-icon cari-form">
                        <i class="simple-icon-magnifier"></i>
                    </span>
                </div>
            </form>
        </div>


        <a class="navbar-logo" href="Dashboard.Default.html">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>

        <div class="navbar-right">
            <div class="header-icons d-inline-block align-middle">
                <div class="d-none d-md-inline-block align-text-bottom mr-3">
                    <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1"
                         data-toggle="tooltip" data-placement="left" title="Dark Mode">
                        <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                        <label class="custom-switch-btn" for="switchDark"></label>
                    </div>
                </div>

                <!-- <div class="position-relative d-none d-sm-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-grid"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-equalizer d-block"></i>
                            <span>Settings</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-male-female d-block"></i>
                            <span>Users</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-puzzle d-block"></i>
                            <span>Components</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-bar-chart-4 d-block"></i>
                            <span>Profits</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-file d-block"></i>
                            <span>Surveys</span>
                        </a>

                        <a href="#" class="icon-menu-item">
                            <i class="iconsminds-suitcase d-block"></i>
                            <span>Tasks</span>
                        </a>

                    </div>
                </div> -->

                <div class="position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell icon-notif"></i>
                        <!-- <span class="count"></span> -->
                    </button>
                    <div class="dropdown-menu dropdown-menu-right mt-3 position-absolute" id="notificationDropdown">
                        <!-- <div class="scroll">
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ asset('asset_dore/img/profiles/l-2.jpg') }}" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">Joisse Kaycee just sent a new comment!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ asset('asset_dore/img/notifications/1.jpg') }}" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">1 item is out of stock!</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ asset('asset_dore/img/notifications/2.jpg') }}" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">New order received! It is total $147,20.</p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-3 pb-3 ">
                                <a href="#">
                                    <img src="{{ asset('asset_dore/img/notifications/3.jpg') }}" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">3 items just added to wish list by a user!
                                        </p>
                                        <p class="text-muted mb-0 text-small">09.04.2018 - 12:45</p>
                                    </a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name">{{ Session::get('namaUser') }}</span>
                    <span id="foto-profile">
                    @if (Session::get('foto') == "" || Session::get('foto') == "-" )
                    <img alt="Profile Picture" src="{{ asset('asset_elite/images/user.png') }}" />
                    @else
                    <img alt="Profile Picture" src="{{ 'https://api.simkug.com/api/ypt/storage/'.Session::get('foto') }}" />
                    @endif
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" onclick="loadProfile()" href='#' >Profile</a>
                    <a class="dropdown-item" href="{{ url('dash-telu/logout') }}">Sign out</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="menu">
        <div class="main-menu">
        </div>
        <div class="sub-menu">
                <!-- <ul class="list-unstyled" data-link="dashboard">
                    <li class="active">
                        <a href="Dashboard.Default.html">
                            <i class="simple-icon-rocket"></i> <span class="d-inline-block">Default</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Analytics.html">
                            <i class="simple-icon-pie-chart"></i> <span class="d-inline-block">Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Ecommerce.html">
                            <i class="simple-icon-basket-loaded"></i> <span class="d-inline-block">Ecommerce</span>
                        </a>
                    </li>
                    <li>
                        <a href="Dashboard.Content.html">
                            <i class="simple-icon-doc"></i> <span class="d-inline-block">Content</span>
                        </a>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="menu" id="menuTypes">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuTypes" aria-expanded="true"
                            aria-controls="collapseMenuTypes" class="rotate-arrow-icon">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Types</span>
                        </a>
                        <div id="collapseMenuTypes" class="collapse show" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="Menu.Default.html">
                                        <i class="simple-icon-control-pause"></i> <span
                                            class="d-inline-block">Default</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Subhidden.html">
                                        <i class="simple-icon-arrow-left mi-subhidden"></i> <span
                                            class="d-inline-block">Subhidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Hidden.html">
                                        <i class="simple-icon-control-start mi-hidden"></i> <span
                                            class="d-inline-block">Hidden</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Menu.Mainhidden.html">
                                        <i class="simple-icon-control-rewind mi-hidden"></i> <span
                                            class="d-inline-block">Mainhidden</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Menu Levels</span>
                        </a>
                        <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel2"
                                        aria-expanded="true" aria-controls="collapseMenuLevel2"
                                        class="rotate-arrow-icon collapsed">
                                        <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Another
                                            Level</span>
                                    </a>
                                    <div id="collapseMenuLevel2" class="collapse">
                                        <ul class="list-unstyled inner-level-menu">
                                            <li>
                                                <a href="#">
                                                    <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                                        Level</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuDetached" aria-expanded="true"
                            aria-controls="collapseMenuDetached" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Detached</span>
                        </a>
                        <div id="collapseMenuDetached" class="collapse">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="#">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">Sub
                                            Level</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul> -->
        </div>
    </div>

    <main>
        <div class="container-fluid">
            <div class="body-content"></div>
        </div>
    </main>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
    
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    
    var pusher = new Pusher('d428ef5138920b411264', {
        cluster: 'ap1',
        encrypted: true
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    function showNotification(placementFrom, placementAlign, type,title,message) {
      $.notify(
        {
          title: title,
          message: message,
          target: "_blank"
        },
        {
          element: "body",
          position: null,
          type: type,
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          placement: {
            from: placementFrom,
            align: placementAlign
          },
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 4000,
          timer: 2000,
          url_target: "_blank",
          mouse_over: null,
          animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp"
          },
          onShow: null,
          onShown: null,
          onClose: null,
          onClosed: null,
          icon_type: "class",
          template:
            '<div data-notify="container" class="col-11 col-sm-3 alert  alert-{0} " role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            "</div>" +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            "</div>"
        }
      );
    }

    var form ="{{ Session::get('dash') }}";
    var userNIK = "{{ Session::get('userLog') }}";
    function getNotif(){
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-telu/notif') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var notif='';
                $('#notificationDropdown').html(''); 
                
                if(result.data.status){
                    if(result.data.jumlah == 0){
                        // return false;
                    }else{
                        $('<span class="count">'+result.data.jumlah+'</span>').insertAfter('.icon-notif');
                    }
                    notif = `<div class="scroll">
                            `;
                    if(result.data.data.length > 0){
                        for(var i=0;i<result.data.data.length;i++){
                            var line = result.data.data[i];
                            notif+=`<div class="d-flex flex-row mb-3 pb-3 border-bottom">
                                <a href="#">
                                    <img src="{{ asset('asset_elite/images/user.png') }}" alt="Notification Image"
                                        class="img-thumbnail list-thumbnail xsmall border-0 rounded-circle" />
                                </a>
                                <div class="pl-3">
                                    <a href="#">
                                        <p class="font-weight-medium mb-1">`+line.pesan+`</p>
                                        <p class="text-muted mb-0 text-small">`+line.tgl+` - `+line.jam+`</p>
                                    </a>
                                </div>
                            </div>`;
                        }
                    }
                    notif += `</div>`;
                    $('#notificationDropdown').append(notif);
                    
                }else{
                    $('#notificationDropdown').html(''); 
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }
    
    function updateNotifRead(){
        $.ajax({
            type: 'POST',
            url: "{{ url('dash-telu/notif-update-status') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                $('.count').remove();
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }
    
    var channel = pusher.subscribe('saitelu-channel-'+userNIK);
    channel.bind('saitelu-event', function(data) {
        // alert(JSON.stringify(data));
        console.log(JSON.stringify(data));
        getNotif();
        showNotification("top", "left", "primary",data.title,data.message);
        
    });

    function loadForm(url){
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-telu/cek_session') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(!result.status){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
                }else{
                    
                    $('.body-content').load(url);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }

    var $dtForm = new Array();
    function getFormList() {
        $.ajax({
            type:'GET',
            url:"{{url('dash-telu/search-form-list2')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                   
                    for(i=0;i<result.data.length;i++){
                        $dtForm[i] = {nama:result.data[i].nama};  
                    }

                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('dash-telu/sesi-habis') }}";
                } else{
                    alert(result.message);
                }
            }
        });
    }

    getFormList();

    function searchForm(cari){
        $.ajax({
            type: 'POST',
            url: "{{ url('dash-telu/search-form') }}",
            dataType: 'json',
            data:{'cari':cari},
            async:false,
            success:function(result){  
                if(result.data.success.status){
                    if(result.data.success.data.length > 0){
                        var tmp = result.data.success.data[0].form;
                        tmp = tmp.split("_");
                        var form = tmp[2];
                        //add Class active in li level 1;
                        $('.sub-menu li').removeClass('active');
                        $("[data-href="+form+"]").first().parents("li").addClass("active");
                        
                        //add Class active in li level 0;
                        var target = $("[data-href="+form+"]").parents("li").parents("ul").last().attr("data-link");
                        $('.main-menu li').removeClass('active');
                        $('a[href="#'+target+'"]').parents("li").addClass("active");

                        loadForm("{{ url('dash-telu/form')}}/"+form);
                        return false;
                    }
                }else{
                    alert('Error: Form tidak ditemukan!');
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }

    function loadProfile(){
        loadForm("{{url('dash-telu/form/fProfile')}}");
    }
    
    function loadMenu(){
        $.ajax({
            type: 'GET',
            url: "{{ url('dash-telu/menu') }}",
            dataType: 'json',
            async:false,
            success:function(result){  
                if(result[0].status){
                    $('.main-menu').html('');
                    $(result[0].main_menu).appendTo('.main-menu').slideDown();
                    $('.sub-menu').html('');
                    $(result[0].sub_menu).appendTo('.sub-menu').slideDown();
                    for(var i=0;i < result[0].kode_menu.length;i++){
                        $('#'+result[0].kode_menu[i]).html(result[0].subdata[result[0].kode_menu[i]]);
                    }
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }
    
    loadMenu();
    getNotif();
    
    if(form !="" || form != "-"){
        loadForm("{{ url('dash-telu/form')}}/"+form)
    }
    
    $('.menu').on('click','.a_link',function(e){
        e.preventDefault();
        var form = $(this).data('href');
        $('.sub-menu li').removeClass('active');
        $(this).parents('li').addClass('active');
        var url = "{{ url('dash-telu/form')}}/"+form;
        console.log(url);
        if(form == "" || form == "-"){
            // alert('Form dilock!');
            return false;
        }else{
            loadForm(url);
            
        }
    });

    $('.main-menu li').click(function(){
        console.log('click-menu');
        $('.main-menu li').removeClass('active');
        $(this).addClass('active');
    });

    $('.cari-form').click(function(){
        var cari = $('#cari').val();
        searchForm(cari);
    });

    $('#cari').keydown(function(e){
        // console.log(e.which);
        
        var cari = $('#cari').val();
        if(e.which == 13){
            e.preventDefault();
            searchForm(cari);
        }
    });

    $('#cari').typeahead({
        source: function (cari, result) {
            result($.map($dtForm, function (item) {
                return item.nama;
            }));
        }
    });
    // $('#cari').typeahead({
    //     source: function (cari, result) {
    //         $.ajax({
    //             url: "{{ url('dash-telu/search-form-list') }}",
    //             data: {cari:cari},            
    //             dataType: "json",
    //             type: "GET",
    //             success: function (data) {
    //                 result($.map(data.data, function (item) {
    //                     return item.nama;
    //                     console.log(item.nama);
    //                 }));
    //             }
    //         });
    //     }
    // });

    $(document).ready(function(){
        setTimeout(function(){
            // alert('Session token telah habis, silahkan login kembali');
            window.location.href = "{{url('dash-telu/sesi-habis')}}";
        }, 1000 * 60 * 60);
        
        var form ="{{ Session::get('dash') }}";
        if(form !="" || form != "-"){
            loadForm("{{ url('dash-telu/form') }}/"+form);
        }
    });
    
    function setHeightReport(){
        var header = $('.topbar').height();
        var subheader = $('#subFixbar').height();
        var content = window.innerHeight;
        var tinggi = content-header-subheader-50;
        $('#content-lap').css('height',tinggi);
    }
    
    function setHeightForm(){
        var header = $('.topbar').height();
        var content = window.innerHeight;
        var tinggi = content-header-40;
        var title = 66;
        var body = tinggi-title;
        if($('#saku-form').length > 0){
            
            $('#saku-form').css('height',tinggi);
            $('.title-form').css('height',title);
            $('.body-form').css('height',body);
        }
        if($('#saku-datatable').length > 0){
            $('#saku-datatable .card').css('min-height',tinggi);
        }
    }
    
    $( window ).resize(function() {
        if($('#content-lap').length > 0){
            setHeightReport();
        }
        setHeightForm();
    });

    
    $('#notificationButton').click(function(){
        updateNotifRead();
    });
    var $theme = "dore.light.redruby.min.css";
    // localStorage.setItem("dore-theme-color", theme);

    // $('.typeahead.dropdown-menu').on('click','.dropdown-item',function(e){
    //     e.preventDefault();
    //     console.log('click');
    //     var cari = $(this).text();
    // })
    </script>
    <script src="{{ asset('asset_dore/js/scripts.js') }}"></script>
    <script>
        $('div.theme-colors').hide();
    </script>
</body>
</html>