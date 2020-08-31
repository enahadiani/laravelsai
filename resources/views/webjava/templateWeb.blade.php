<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Java Turbine</title>
	
	<!-- core CSS -->
    <link href="{{ asset('asset_corlate/bootstrap.min.css') }}" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/bootstrap.min.css">-->
    <link href="{{ asset('asset_corlate/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/main.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/responsive.css') }}" rel="stylesheet">  
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('asset_adminlte/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('asset_adminlte/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('asset_adminlte/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset_adminlte/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('asset_adminlte/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('asset_adminlte/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('asset_adminlte/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('asset_adminlte/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('asset_adminlte/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('asset_adminlte/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset_adminlte/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('asset_adminlte/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_adminlte/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('asset_adminlte/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <!-- <meta name="msapplication-TileImage" content="{{ asset('asset_adminlte/img/favicon/ms-icon-144x144.png') }}"> -->
    <meta name="theme-color" content="#ffffff">

    <style>

        .dropdown-menu{
            background:white;
            min-width:230px;
        }
        
        .gmap-area {
            padding: 5px 0;
        }

        body > section {
            padding: 30px 0;
        }

        .article-list-end-fade:before {
            content:'';
            width:100%;
            height:30%;    
            position:absolute;
            left:0;
            bottom:0;
            background:linear-gradient(transparent 10px, white);
        }

        #bottom ul li 
        {
            display: block;
            padding: 1px 0;
        }
    </style>
</head><!--/head-->

<body class="homepage"  style="background-image:url({{ config('api.url').'webjava/storage/pattern2.jpg' }});  background-repeat:repeat; height:100%;">

    <header id="header">

        <nav class="navbar navbar-inverse" style='background:#f1fafd;'>
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style='background-color:#333'>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <?php
                        // $logo = $this->sai->getRowArray("SELECT logo FROM lokasi where kode_lokasi='22'");
                    ?>
                    <a class="navbar-brand">
                        <!-- <img src="" style="padding-left:15px; padding-bottom:10px; height:60px; width:auto" alt="logo"> -->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar" style="border-bottom:1px solid lightgrey;">
                </div>
            </div>
        </nav>

    </header><!--/header-->
    <div class="body-content">


    </div>

    <script src="{{ asset('asset_corlate/jquery.js') }}"></script>

    <!--js bootstrap khusus corlate-->
    <script src="{{ asset('asset_corlate/bootstrap.min.js') }}"></script>

    <script src="{{ asset('asset_corlate/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('asset_corlate/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('asset_corlate/main.js') }}"></script>
    <script src="{{ asset('asset_corlate/wow.min.js') }}"></script>

    <script type="text/javascript"> 
        $(document).ready(function(){
            $('.prev-prod-fe').click(function(){
                var keterangan = $(this).closest('div').find('.ket-prod').html();
                var gbr_url = $(this).closest('div').find('.gbr-prod').attr('src');
                // alert(gbr_url);
                // alert(keterangan);
                var html = "<center><img src='"+gbr_url+"'><br>"+keterangan+"</center>";
                $('#ket-prod-modal').html(html);
                $('#modal-preview').modal('show');
            });
        });
        function initialize(){
            var lat = $('.latitude').text();
            var lon = $('.longitude').text();
            
            var myLatLng = {lat: +lat, lng: +lon};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
        }

        function loadMenu(){
            $.ajax({
                type: 'GET',
                url: "{{ url('webjava/menu') }}",
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result[0].status){
                        $('#myNavbar').html('');
                        $('<ul class="nav navbar-nav navbar-right" style="margin-right:10px;">'+result[0].html+'</ul>').appendTo('#myNavbar').slideDown();
                        var tmp = result[0].logo.split("/");
                        var logo = "{{ config('api.url') }}webjava/storage/"+tmp[3];
                        
                        $('.navbar-brand').html(`<img src="`+logo+`" style="padding-left:15px; padding-bottom:10px; height:60px; width:auto" alt="logo">`);

                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }

        function loadForm(url){
            $('.body-content').load(url);
        }

        loadMenu();

        loadForm("{{ url('webjava/form/home') }}");

        $('#myNavbar').on('click','.a_link',function(e){
            e.preventDefault();
            var form = $(this).data('href');
            var url = form;
            console.log(url);
            if(form == "" || form == "-"){
                // alert('Form dilock!');
                return false;
            }else{
                loadForm(url);
                
            }
        });
        
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwdyiC2sZ3B1O2nMdhUy6Z0ljoK3gbA_U&callback=initialize">
    </script>
</body>
</html>