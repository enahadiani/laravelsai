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
    
    <link rel="stylesheet" href="{{ asset('asset_elite/dist/js/swal/sweetalert2.min.css') }}">
    <!-- Selectize -->
    <link href="{{ asset('asset_elite/selectize.bootstrap3.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/jquery-ui.min.css') }}" />
    <script src="{{ asset('asset_dore/js/jquery-ui.min.js') }}"></script>
    <!-- <link rel="stylesheet" href="{{ asset('asset_dore/css/loading.css') }}" /> -->
    
    <style>
        
        .logo{
            background:url("{{ asset('img/tarbak30x100.png') }}") no-repeat;
            background-size: 100px;
            background-position-x: center;
            background-position-y: center;
            width:100px;
            height:35px;
        }
        .logo-mobile{
            background:url("{{ asset('img/tarbak30x30.png') }}") no-repeat;
            background-size:30px;
            width:30px;
        }
    
        .modal-content
        {
            border-radius: 0.75rem !important;
        }

        .modal-header
        {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
            height:49px !important;
        }

        .modal-header > h6
        {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
            height: unset !important;
        }
        
        .close
        {
            line-height:1.5;padding: 0 !important;background: none;appearance: unset;opacity: unset;position: relative;
            right:-40px;top:5px !important;
        }
        .close > span 
        {
            border-radius: 50%;padding: 0 0.45rem 0.1rem 0.45rem;background: white;color: black;font-size: 1.2rem !important;font-weight: lighter;box-shadow:0px 1px 5px 1px #80808054
        }

        .close > span:hover
        {
            color:white;
            background:red;
        }

        
        .saicon {
                display: inline-block;
                width: 14px;
                height: 14px;
                background: black; 
                -webkit-mask-size: cover;
                mask-size: cover;
            }

            a.active > .saicon{
                background: #990000 !important;
            }

            .icon-rp{
                background: #505050;
                -webkit-mask-image: url("{{ url('img/mobile-ts/rupiah.svg') }}");
                mask-image: url("{{ url('img/mobile-ts/rupiah.svg') }}");
                width: 20pt;
                height: 20pt;
            }
            .icon-notif{
                background: #505050;
                -webkit-mask-image: url("{{ url('img/mobile-ts/notif-outline.svg') }}");
                mask-image: url("{{ url('img/mobile-ts/notif-outline.svg') }}");
                width: 20pt;
                height: 20pt;
            }
            .icon-user{
                background: #505050;
                -webkit-mask-image: url("{{ url('img/mobile-ts/user-outline.svg') }}");
                mask-image: url("{{ url('img/mobile-ts/user-outline.svg') }}");
                width: 20pt;
                height: 20pt;
            }
    </style>
    <link rel="stylesheet" href="{{ asset('mainstyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/bottom-sheet/style.css') }}" /> 
    <script>
        var $public_asset = "{{ asset('asset_dore') }}/";
    </script>
    <script src="{{ asset('asset_dore/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <!-- <script src="{{ asset('asset_elite/highcharts2.js') }}"></script>
    <script src="{{ asset('asset_elite/highcharts-more.js') }}"></script> -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/heatmap.js"></script>
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
    <script src="{{ asset('asset_dore/js/vendor/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('asset_elite/dist/js/swal/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/dore.script.js') }}"></script>
    
    <script src="{{ asset('asset_elite/standalone/selectize.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    
    
    <!-- <script src="{{ asset('asset_dore/js/loading.js') }}"></script> -->
    <script src="{{ asset('asset_elite/printThis/printThis.js') }}"></script>
    <script src="{{ asset('asset_dore/js/jquery.table2excel.js') }}"></script>
    <script src="{{ asset('asset_elite/jquery.twbsPagination.min.js') }}"></script>
    <script src="{{ asset('asset_elite/sai.js') }}"></script>
    <script src="{{ asset('asset_elite/inputmask.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap-tagsinput.min.js') }}"></script>
</head>
<!-- <div class="preloader-wrap">
    <div class="progress" id="load-page">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="load-page-bar"></div>
    </div>
</div> -->
@if(Session::get('menu') != "")
<body id="app-container" class="{{ Session::get('menu') }} show-spinner">
@else
<body id="app-container" class="menu-default show-spinner" >
@endif
    <nav class="navbar fixed-top px-0 py-0">
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
                    <input type="text" placeholder="Cari Form..." id="cari" name="cari"  type="text" class="form-control typeahead" data-provide="typeahead" autocomplete="off"/>
                    <span class="search-icon cari-form">
                        <i class="simple-icon-magnifier"></i>
                    </span>
                </div>
            </form>
        </div>


        <a class="navbar-logo" href="#">
            <span class="logo d-none d-xs-block to-home"></span>
            <span class="logo-mobile d-block d-xs-none to-home"></span>
        </a>
        @php
            $tmp = explode(" ",Session::get('namaUser'));
            $nama = $tmp[0];

        @endphp

        <div class="navbar-right" >
            <div class="user d-inline-block mr-3 dropdown">
                <button class="btn btn-empty p-0" id="btn-admin" type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="name">{{ $nama }}</span>
                    <span id="foto-profile">
                    @if (Session::get('foto') == "" || Session::get('foto') == "-" )
                    <img alt="Profile Picture" src="{{ asset('asset_elite/images/user.png') }}" style="width:40px;height:40px"/>
                    @else
                    <img alt="Profile Picture" src="{{ config('api.url').'sekolah/storage/'.Session::get('foto') }}" style="width:40px;height:40px"/>
                    @endif
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right mt-0" id="adminDropdown">
                    <a href="#" class="dropdown-profile">
                        <div style="height: 45px;padding: 0 1rem;">
                            <span id="adminProfilePhoto">
                                @if (Session::get('foto') == "" || Session::get('foto') == "-" )
                                <img alt="Profile Picture" class="imgprofile ml-0" src="{{ asset('asset_elite/images/user.png') }}" style="width:40px;height:40px"/>
                                @else
                                <img alt="Profile Picture" class="imgprofile ml-0" src="{{ config('api.url').'sekolah/storage/'.Session::get('foto') }}" style="width:40px;height:40px"/>
                                @endif
                            </span>
                            <p class="userprofile mb-0">{{ $nama }}</p>
                            <span class="userjab" >{{ Session::get('jabatan') }}</span>
                        </div>
                    </a>
                    <a href="#" class="dropdown-periode dropdown-item border-top" ></a>
                    <a href="#" class="dropdown-lokasi dropdown-item border-bottom" ></a>
                    <a class="dropdown-item" onclick="loadProfile()" href='#' ><i class="simple-icon-user mr-2"></i> Akun Saya</a>
                    <a class="dropdown-item" href="#" onclick="logout()"><i class="simple-icon-logout mr-2"></i> Keluar</a>
                </div>
            </div>
            <div class="header-icons d-inline-block align-middle mr-4">
                <div class="dropdown position-relative d-inline-block">
                    <button class="header-icon btn btn-empty" type="button" id="notificationButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="simple-icon-bell icon-notif" style="font-size:17px"></i>
                        <!-- <span class="count"></span> -->
                    </button>
                    <div class="dropdown-menu dropdown-menu-right position-absolute py-0 mt-0" id="notificationDropdown2" style="width:300px;">
                        <div class='row-header border-bottom'>
                            <div class="d-flex flex-row px-3 py-2 ">
                                <div class="">
                                    <a href="#">
                                        <p class="font-weight-medium py-0 my-0" style="color;black;font-weight:bold;font-size:16px">Notifikasi</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="notif-body" style="height:280px">
                        </div>
                        <div class='row-footer border-top'>
                            <div class="d-flex flex-row px-3 py-2 text-center">
                                <div class="" style="width:100%">
                                    <a href="#">
                                    <p class="py-0 my-0 text-small" style="color;black;">Lihat semua</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="btn-newtab" title="New Tab">
                    <i class="simple-icon-screen-desktop" style="font-size:18px"></i>
                </button>
                <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton" title="Full Screen">
                    <i class="simple-icon-size-fullscreen"></i>
                    <i class="simple-icon-size-actual"></i>
                </button>

            </div>

            
        </div>
    </nav>
    <div class="menu">
        <div class="main-menu">
        </div>
        <div class="sub-menu">
        </div>
    </div>

    <main style='margin-top:0px !important'>
        <div class="container-fluid">
            <div class="body-content"></div>
        </div>
        <div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog" aria-labelledby="modal-pesantitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="max-width:300px;border-radius:0.75rem;margin:0 auto">
                    <div class="modal-body text-center pb-0">
                        <span id="modal-pesan-id" style="display:none"></span>
                        <h4 style="font-weight:bold" id="pesan-judul"></h4>  
                        <p style="font-size:12px" id="pesan-text"></p>  
                    </div>
                    <div class="modal-footer pt-0" style="border:none;justify-content:center">
                        <div class="row" style="width:100%">
                            <div class="col-6 px-0 py-0" id="btn-pesan1">
                                <!-- <button type="button" class="btn btn-light btn-block" data-dismiss="modal" >Batal</button> -->
                            </div>
                            <div class="col-6 px-0 py-0" style="padding-left: 5px !important;" id="btn-pesan2">
                                <!-- <button type="button" class="btn btn-primary btn-block" id="btn-ya" style="background:#EB3F33;border:1px solid #EB3F33">Hapus</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <style>
        /* Place the navbar at the bottom of the page, and make it stick */
            .navbar_bottom {
                background-color: #fff;
                overflow: hidden;
                position: fixed;
                bottom: 0;
                width: 100%;
                box-shadow:0 -1pt 1pt 0 #80808029;
                z-index:10;
            }

            /* Style the links inside the navigation bar */
            .navbar_bottom a {
                float: left;
                display: block;
                color: grey;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
                line-height: 0.5rem;
            }

            /* Change the color of links on hover */
            .navbar_bottom a:hover {
                background-color: #fff;
                color: #d73925;
            }

            /* Add a color to the active/current link */
            .navbar_bottom a.active {
                background-color: #fff;
                color: #9F1010;
            }

            .saicon {
                display: inline-block;
                width: 14px;
                height: 14px;
                background: black; 
                -webkit-mask-size: cover;
                mask-size: cover;
            }

            a.active > .saicon{
                background: #4361EE !important;
            }

            a.active > p{
                color: #4361EE !important;
            }

            .icon-pelajaran{
                background: #505050;
                -webkit-mask-image: url("{{ url('img/mobile-tarbak/Pelajaran.svg') }}");
                mask-image: url("{{ url('img/mobile-tarbak/Pelajaran.svg') }}");
                width: 21pt;
                height: 16pt;
            }
            .icon-pesan{
                background: #505050;
                -webkit-mask-image: url("{{ url('img/mobile-tarbak/PesanOff.svg') }}");
                mask-image: url("{{ url('img/mobile-tarbak/PesanOff.svg') }}");
                width: 18pt;
                height: 18pt;
            }
            .icon-user{
                background: #505050;
                -webkit-mask-image: url("{{ url('img/mobile-tarbak/AkunOff.svg') }}");
                mask-image: url("{{ url('img/mobile-tarbak/AkunOff.svg') }}");
                width: 15pt;
                height: 18pt;
            }
    </style>
    <div class='navbar_bottom' style=''>
        <a href="#" data-href="dashSiswa" class='active' style='padding:10px 0px 0px 0px;width: 33%;'>
        <i class='saicon icon-pelajaran' style='text-align: center;'></i><p style='text-align: center;font-size: 14px;margin-bottom:0'>Pelajaran</p></a>
        <a href='#' data-href="dashPesan" style='padding:10px 0px 0px 0px;width: 33%;'>
        <i class='saicon icon-pesan' style='text-align: center;'></i><p style='text-align: center;font-size: 14px;margin-bottom:0'>Pesan</p></a>
        <a href='#' data-href="dashAkun" style='padding:10px 0px 0px 0px;width: 33%;'>
        <i class='saicon icon-user' style='text-align: center;'></i><p style='text-align: center;font-size: 14px;margin-bottom:0'>Akun</p></a>
    </div>
    <div id="country-selector" class="c-bottom-sheet c-bottom-sheet--list">
			<div class="c-bottom-sheet__scrim"></div>
			<div class="c-bottom-sheet__sheet">
                <div class="c-bottom-sheet__close">
                    <button type="button" aria-label="Close" class="close" id="bottom-sheet-close">
                    <span>×</span>
                    </button>
                </div>
				<div class="c-bottom-sheet__handle">
					<span></span>
					<span></span>
				</div>
                <div id="content-bottom-sheet" style="max-height:75vh;width:100%"></div>
			</div>
			<div class="c-bottom-sheet__container">

			</div>
	</div>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
     if (!$.fn.bootstrapDP && $.fn.datepicker && $.fn.datepicker.noConflict) {
        var datepicker = $.fn.datepicker.noConflict();
        $.fn.bootstrapDP = datepicker;
    }
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

    class TouchDragListener {
        constructor({el, touchStartCallback, touchEndCallback, touchMoveCallback, showLog}) {
            this.el = el;
            this.touchStartCallback = touchStartCallback;
            this.touchEndCallback = touchEndCallback;
            this.touchMoveCallback = touchMoveCallback;
            this.showLog = showLog;

            this.active = false;
            this.currentY;
            this.initialY;
            this.yOffset = 0;

            this.dragStart = this.dragStart.bind(this);
            this.dragEnd = this.dragEnd.bind(this);
            this.drag = this.drag.bind(this);
            
            this.el.addEventListener("mousedown", this.dragStart);
            this.el.addEventListener("mouseleave", this.dragEnd);
            this.el.addEventListener("mouseup", this.dragEnd);
            this.el.addEventListener("mousemove", this.drag);

            this.el.addEventListener("touchstart", this.dragStart);
            this.el.addEventListener("touchend", this.dragEnd);
            this.el.addEventListener("touchmove", this.drag);
        }

        dragStart(e) {
            this.active = true;
            this.el.classList.add("active");

            if (e.type === "touchstart") {
                this.initialY = e.touches[0].clientY - this.yOffset;
            } else {
                this.initialY = e.clientY - this.yOffset;
            }

            if (!this.touchStartCallback) return;

            this.touchStartCallback({
                el: this.el,
                active: this.active,
                currentY: this.currentY,
                initialY: this.initialY,
                yOffset: this.offSetY
            })
        }
        
        dragEnd(e) {
            this.active = false;
            this.el.classList.remove("active");

            this.yOffset = 0;

            this.initialY = this.currentY;
            
            if (!this.touchEndCallback) return;

            this.touchEndCallback({
                el: this.el,
                active: this.active,
                currentY: this.currentY,
                initialY: this.initialY,
                yOffset: this.offSetY
            })
        }
        drag(e) {
            if (!this.active) return;
            e.preventDefault();

            if (e.type === "touchmove") {
                this.currentY = e.touches[0].clientY - this.initialY;
            } else {
                this.currentY = e.clientY - this.initialY;
            }

            this.yOffset = this.currentX;

            if (!this.touchMoveCallback) return;

            this.touchMoveCallback({
                el: this.el,
                active: this.active,
                currentY: this.currentY,
                initialY: this.initialY,
                yOffset: this.offSetY
            });

            if (this.showLog) {
                console.log({
                    active: this.active,
                    initialY: this.initialY,
                    currentY: this.currentY,
                    offSetY: this.offSetY
                });
            }        
        }
    }


    class BottomSheet {
        constructor(id) {
            this.id = id;
            this.el = document.getElementById(id);
            this.scrim = this.el.querySelector(".c-bottom-sheet__scrim");
            this.handle = this.el.querySelector(".c-bottom-sheet__handle");
            this.sheet = this.el.querySelector(".c-bottom-sheet__sheet");
            this.activate = this.activate.bind(this);
            this.deactivate = this.deactivate.bind(this);        

            this.scrim.addEventListener("click", this.deactivate);
            this.handle.addEventListener("click", this.deactivate);
            
            this.sheetListener = new TouchDragListener({
                el: this.sheet,
                touchStartCallback: ({el, active, initialY, currentY, yOffset}) => {
                    el.style.setProperty("--translateY", `translateY(0)`);
                    el.style.setProperty("transition", `unset`);
                },
                touchEndCallback: ({el, active, initialY, currentY, yOffset}) => {
                    el.style.setProperty(
                        "transition",
                        `transform 150ms cubic-bezier(0.4, 0, 0.2, 1)`
                    );
                    el.style.setProperty(
                        "--translateY",
                        `translateY(${currentY}px)`
                    );
                },
                touchMoveCallback: ({el, active, initialY, currentY, yOffset}) => {
                    if (currentY <= -40) {
                        currentY = -41 + currentY / 10;
                    } else if (currentY <= -60) {
                        currentY = -60;
                    } else if (currentY >= 210) {
                        this.deactivate(currentY);
                        return;
                    }
            
                    el.style.setProperty(
                        "--translateY",
                        `translateY(${currentY}px)`
                    );
                }
            });

            this.scrimListener = new TouchDragListener({
                el: this.scrim,
                touchMoveCallback: ({el, active, initialY, currentY, yOffset}) => {
                    if (currentY >= 83) {
                        this.deactivate();
                        return;
                    }
                }
            });
        }
        activate(e) {
            if (e) e.preventDefault();
            this.el.classList.add("active");
        }
        deactivate(translateY) {
            if (!translateY) {
                this.sheet.style.setProperty("--translateY", `translateY(201px)`);
            } else {
                this.sheet.style.setProperty(
                    "transition",
                    `transform 150ms cubic-bezier(0.4, 0, 0.2, 1)`
                );
                this.sheet.style.setProperty(
                    "--translateY",
                    `translateY(${translateY}px)`
                );
            }

            this.el.classList.remove("active");
        }
    }

    function jumFilter(){
        var jum = $("[name^=inp-filter]").filter(function(){
            return this.value.trim() != '';
        }).length;
        if(jum > 0){
            $('#jum-filter').text(jum);
        }else{
            $('#jum-filter').text('');
        }
    }
    
    function msgDialog(data){
        switch(data.type){
            case 'hapus':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-red');
                var btn2 = (data.btn2 != undefined ? data.btn2 : 'btn btn-light');
                var title = (data.title != undefined ? data.title : 'Hapus Data?');
                var text = (data.text != undefined ? data.text : 'Data akan terhapus secara permanen dan tidak dapat mengurungkan.<br> ID Data : <b>'+data.id+'</b>');
                var confirm = (data.confirm != undefined ? data.confirm : 'Hapus');
                var cancel = (data.cancel != undefined ? data.cancel : 'Batal');
                // function callBackMsg(){
                //     hapusData(data.id);
                // }
                
                // function callBackCancel(){
                //     // 
                // }
                
            break;
            case 'edit':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary');
                var btn2 = (data.btn2 != undefined ? data.btn2 : 'btn btn-light');
                var title = (data.title != undefined ? data.title : 'Ubah Data?');
                var text = (data.text != undefined ? data.text : 'Data akan diubah dan semua informasi sebelumnya akan diganti.');
                var confirm = (data.confirm != undefined ? data.confirm : 'Ubah');
                var cancel = (data.cancel != undefined ? data.cancel : 'Batal');
                // function callBackMsg(){
                //     $('#form-tambah').submit();
                // }
                
                // function callBackCancel(){
                //     // 
                // }
            break;
            case 'simpan':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary');
                var btn2 = (data.btn2 != undefined ? data.btn2 : 'btn btn-outline-primary');
                var title = (data.title != undefined ? data.title : 'Tersimpan');
                var text = (data.text != undefined ? data.text : 'Data tersimpan dengan No Transaksi <br><b>'+data.id+'</b>');
                var confirm = (data.confirm != undefined ? data.confirm : 'Input Baru');
                var cancel = (data.cancel != undefined ? data.cancel : 'Selesai');
                
                // function callBackMsg(){
                //     showNotification("top", "center", "success",'Simpan Data','Data ('+data.id+') berhasil disimpan ');
                // }
                
                // function callBackCancel(){
                //     $('#saku-datatable').show();
                //     $('#saku-form').hide();
                //     showNotification("top", "center", "success",'Simpan Data','Data ('+data.id+') berhasil disimpan ');
                // }
            break;
            case 'keluar':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary');
                var btn2 = (data.btn2 != undefined ? data.btn2 : 'btn btn-light');
                var title = (data.title != undefined ? data.title : 'Keluar Form?');
                var text = (data.text != undefined ? data.text : 'Semua perubahan tidak akan disimpan.');
                var confirm = (data.confirm != undefined ? data.confirm : 'Keluar');
                var cancel = (data.cancel != undefined ? data.cancel : 'Batal');
                // function callBackMsg(){
                //     $('#saku-datatable').show();
                //     $('#saku-form').hide();
                // }
                
                // function callBackCancel(){
                //     // 
                // }
            break;
            case 'logout':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary');
                var btn2 = (data.btn2 != undefined ? data.btn2 : 'btn btn-light');
                var title = (data.title != undefined ? data.title : 'Keluar Aplikasi?');
                var text = (data.text != undefined ? data.text : 'Semua halaman akses yang sama akan keluar.');
                var confirm = (data.confirm != undefined ? data.confirm : 'Keluar');
                var cancel = (data.cancel != undefined ? data.cancel : 'Batal');
                // function callBackMsg(){
                //     window.localStorage.setItem('logged_in', false);
                //     window.location.href = "{{ url('mobile-tarbak/logout') }}";
                // }
                
                // function callBackCancel(){
                //     // 
                // }
            break;
            case 'duplicate':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary btn-200');
                var btn2 = (data.btn2 != undefined ? data.btn2 : '');
                var title = (data.title != undefined ? data.title : 'Duplikat Data');
                var text = (data.text != undefined ? data.text : 'Kode sudah digunakan');
                var confirm = (data.confirm != undefined ? data.confirm : 'Mengerti');
                var cancel = (data.cancel != undefined ? data.cancel : null);
                var showCancel = (data.cancel != undefined ? true : false);
            break;
            case 'sukses':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary btn-200');
                var btn2 = (data.btn2 != undefined ? data.btn2 : '');
                var title = (data.title != undefined ? data.title : 'Sukses');
                var text = (data.text != undefined ? data.text : 'Data berhasil disimpan');
                var confirm = (data.confirm != undefined ? data.confirm : 'OK');
                var cancel = (data.cancel != undefined ? data.cancel : null);
                var showCancel = (data.cancel != undefined ? true : false);
            break;
            case 'warning':
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary btn-200');
                var btn2 = (data.btn2 != undefined ? data.btn2 : '');
                var title = (data.title != undefined ? data.title : 'Peringatan');
                var text = (data.text != undefined ? data.text : '');
                var confirm = (data.confirm != undefined ? data.confirm : 'OK');
                var cancel = (data.cancel != undefined ? data.cancel : null);
                var showCancel = (data.cancel != undefined ? true : false);
            break;
            default:
                var btn1 = (data.btn1 != undefined ? data.btn1 : 'btn btn-primary btn-200');
                var btn2 = (data.btn2 != undefined ? data.btn2 : '');
                var title = (data.title != undefined ? data.title : '');
                var text = (data.text != undefined ? data.text : '');
                var confirm = (data.confirm != undefined ? data.confirm : 'OK');
                var cancel = (data.cancel != undefined ? data.cancel : null);
                var showCancel = (data.cancel != undefined ? true : false);
            break;
        }
        
        var swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn '+btn1,
            cancelButtonClass: 'btn '+btn2,
            buttonsStyling: false,
        });
        
        swalWithBootstrapButtons.fire({
            title: title,
            html: text,
            animation: false,
            showCancelButton: (showCancel != undefined ? showCancel : true),
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            reverseButtons: true
        }).then((result) => {
            switch(data.type){
                case 'hapus':
                    if (result.value) {
                        if(data.kode != undefined){
                            hapusData(data.id,data.kode);
                        }
                        else if(data.param != undefined){
                            console.log(data.param);
                            hapusData(data.param);
                        }
                        else{
                            hapusData(data.id);
                        }
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        //
                    }
                    
                break;
                case 'edit':
                    if (result.value) {
                        $('#form-tambah').submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        //
                    }
                break;
                case 'simpan':
                    if (result.value) {
                        showNotification("top", "center", "success",'Simpan Data','Data ('+data.id+') berhasil disimpan ');
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        //
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                        showNotification("top", "center", "success",'Simpan Data','Data ('+data.id+') berhasil disimpan ');
                    }
                break;
                case 'keluar':
                    if (result.value) {
                        $('#saku-datatable').show();
                        $('#saku-form').hide();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // console.log('cancel');
                    }
                break;
                case 'logout':
                    if (result.value) {
                        window.localStorage.setItem('logged_in', false);
                        window.location.href = "{{ url('mobile-tarbak/logout') }}";
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // console.log('cancel');
                    }                    
                break;
                case 'duplicate':
                    //  
                break;
                case 'sukses':
                    //  
                break;
                case 'warning':
                    //  
                break;
                default:
                    if(data.back != undefined){
                        if(data.back){
                            $('#saku-form').hide();
                            $('#saku-datatable').show();
                            showNotification("top", "center", "success",title,text);
                        }else{
                            showNotification("top", "center", "success",title,text);
                        }
                    }else{
                        $('#saku-form').hide();
                        $('#saku-datatable').show();
                        showNotification("top", "center", "success",title,text);
                    }
                break;
            }
                
        });
    }

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
            url: "{{ url('mobile-tarbak/notif') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                var notif='';
                $('.notif-body').html(''); 
                
                if(result.data.status){
                    if(result.data.jumlah == 0){
                        // return false;
                    }else{
                        $('<span class="count">'+result.data.jumlah+'</span>').insertAfter('.icon-notif');
                    }
                    notif = `
                    
                            `;
                    if(result.data.data.length > 0){
                        for(var i=0;i<result.data.data.length;i++){
                            var line = result.data.data[i];
                            notif+=`
                            <div class='row-notif'>
                                <div class="d-flex flex-row px-3 pt-3">
                                    <a href="#">
                                        <i class='simple-icon-info'></i>
                                    </a>
                                    <div class="pl-3">
                                        <a href="#">
                                            <p class="font-weight-medium mb-1" style="font-size:10px;color;black;font-weight:unset">`+line.judul+` &nbsp; &nbsp;  &bull; &nbsp; &nbsp; `+line.tgl+`</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex flex-row pb-3 border-bottom px-3">
                                    <div class="">
                                        <a href="#">
                                            <p class="font-weight-medium mb-1" style="color;black;font-weight:bold">`+line.subjudul+`</p>
                                            <p class="text-muted mb-0 text-small" style="font-weight:unset;color:black !important">`+line.pesan+`</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            `;
                        }
                    }
                    $('.notif-body').append(notif);
                    
                }else{
                    $('.notif-body').html(''); 
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }
    
    function updateNotifRead(){
        $.ajax({
            type: 'POST',
            url: "{{ url('mobile-tarbak/notif-update-status') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                $('.count').remove();
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }
    
    var channel = pusher.subscribe('saitoko-channel-'+userNIK);
    channel.bind('saitoko-event', function(data) {
        // alert(JSON.stringify(data));
        console.log(JSON.stringify(data));
        getNotif();
        showNotification("top", "left", "primary",data.title,data.message);
        
    });

    function loadForm(url){
        $.ajax({
            type: 'GET',
            url: "{{ url('mobile-tarbak/cek_session') }}",
            dataType: 'json',
            async:false,
            success:function(result){    
                if(!result.status){
                    window.location.href = "{{ url('mobile-tarbak/sesi-habis') }}";
                }else{
                    
                    $('.body-content').load(url);
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    var $dtForm = new Array();
    function getFormList() {
        $.ajax({
            type:'GET',
            url:"{{url('mobile-tarbak/search-form-list2')}}",
            dataType: 'json',
            async: false,
            success: function(result) {
                if(result.status) {
                   
                    for(i=0;i<result.data.length;i++){
                        $dtForm[i] = {nama:result.data[i].nama};  
                    }

                }else if(!result.status && result.message == "Unauthorized"){
                    window.location.href = "{{ url('mobile-tarbak/sesi-habis') }}";
                } else{
                    console.log(result.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    getFormList();

    function searchForm(cari){
        $.ajax({
            type: 'POST',
            url: "{{ url('mobile-tarbak/search-form') }}",
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
                        $("[data-href="+form+"]").closest("li").addClass("active");
                        // $("[data-href="+form+"]").first().parents("li").addClass("active");
                        
                        //add Class active in li level 0;
                        var target = $("[data-href="+form+"]").parents("li").parents("ul").last().attr("data-link");
                        $('.main-menu li').removeClass('active');
                        $('a[href="#'+target+'"]').parents("li").addClass("active");

                        loadForm("{{ url('mobile-tarbak/form')}}/"+form);
                        return false;
                    }
                }else{
                    alert('Error: Form tidak ditemukan!');
                }
            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    function loadProfile(){
        loadForm("{{url('mobile-tarbak/form/fProfile')}}");
    }
    
    function loadMenu(){
        $.ajax({
            type: 'GET',
            url: "{{ url('mobile-tarbak/menu') }}",
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
            },
            error: function(jqXHR, textStatus, errorThrown) {       
                if(jqXHR.status == 422){
                    var msg = jqXHR.responseText;
                }else if(jqXHR.status == 500) {
                    var msg = "Internal server error";
                }else if(jqXHR.status == 401){
                    var msg = "Unauthorized";
                    window.location="{{ url('/mobile-tarbak/sesi-habis') }}";
                }else if(jqXHR.status == 405){
                    var msg = "Route not valid. Page not found";
                }
                
            }
        });
    }

    var scrollnotif = document.querySelector('.notif-body');
    var notifscroll = new PerfectScrollbar(scrollnotif);
    
    loadMenu();
    getNotif();
    $('.dropdown-periode').html("<span class='periode-label'>Periode</span> <span class='periode-app float-right'>"+namaPeriode2("{{ Session::get('periode') }}</span>"));
    $('.dropdown-lokasi').html("<span class='lokasi-label'>Lokasi</span> <span class='periode-app float-right'>{{ Session::get('lokasi') }}</span>");
    
    if(form !="" || form != "-"){
        loadForm("{{ url('mobile-tarbak/form')}}/"+form)
    }

    console.log(form);
    
    $('.sub-menu').on('click','.a_link',function(e){
        e.preventDefault();
        var form = $(this).data('href');
        $('.sub-menu li').removeClass('active');
        $(this).closest('li').addClass('active');
        var url = "{{ url('mobile-tarbak/form')}}/"+form;
        console.log(url);
        if(form == "" || form == "-"){
            // alert('Form dilock!');
            return false;
        }else{
            loadForm(url);
            
        }
    });

    $('.main-menu').on('click','.a_link',function(e){
        e.preventDefault();
        var form = $(this).data('href');
        var url = "{{ url('mobile-tarbak/form')}}/"+form;
        console.log(url);
        if(form == "" || form == "-"){
            // alert('Form dilock!');
            return false;
        }else{
            loadForm(url);
            
        }
    });

    $('.main-menu li').click(function(){
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
        },
        afterSelect: function (item) {
            console.log('cek');
            searchForm(item);
        }
    });

    $('#notificationButton').hover(function(){
        
        if($('#btn-admin').attr("aria-expanded") == "true"){
            $('#btn-admin').dropdown('toggle');
        }
        
        
    });

    $('#btn-admin').hover(function(){
        if($('#notificationButton').attr("aria-expanded") == "true"){
            $('#notificationButton').dropdown('toggle');
        }
    });

    $('#btn-newtab').click(function(){
        var url = "{{url('mobile-tarbak')}}";
        window.open(url, '_blank');
    });

    // $('#cari').typeahead({
    //     source: function (cari, result) {
    //         $.ajax({
    //             url: "{{ url('mobile-tarbak/search-form-list') }}",
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

    // $(document).ready(function(){
       
    // });
    
    function setHeightReport(){
        var header = 60;
        var subheader = $('#saku-filter').height();
        var content = window.innerHeight;
        var tinggi = content-header-subheader-50;
        $('#saku-report').css('height',tinggi);
        var psdet = document.querySelector('#saku-report');
        var pspsdet = new PerfectScrollbar(psdet,{suppressScrollX:true});
    }

    function setHeightDash(){
        var header = 60;
        var subheader = 50;
        var content = window.innerHeight;
        var tinggi = content-header-subheader-50;
        $('#content-chart').css('height',tinggi-150);
        $('#content-pesan').css('height',tinggi);
        $('#content-pesan-detail').css('height',tinggi-130);
        var psdet = document.querySelector('#content-pesan-detail');
        var pspsdet = new PerfectScrollbar(psdet,{suppressScrollX:true});
    }
    
    function setHeightForm(){
        var header = 70;
        var content = window.innerHeight;
        // var tinggi = content-header-40;
        var title = $('.card-body.form-header').height();
        if(title == 39 || title == 75){
            title = title + 32;
        }else{
            title = 68;
        }
        var height = content-header-title-40;
    
        if($('#saku-form').length > 0){
            
            // $('#saku-form').css('height',tinggi);
            // $('.title-form').css('height',title);
            $('.form-body').css('height',height);
        }
        // if($('#saku-datatable').length > 0){
        //     $('#saku-datatable .card').css('min-height',tinggi);
        // }
    }

    var lifetime = "{{ config('session.lifetime') }}";
    setTimeout(function(){
        window.location.href = "{{url('mobile-tarbak/sesi-habis')}}";
    }, 1000 * 60 * parseInt(lifetime));
    
    var form ="{{ Session::get('dash') }}";
    if(form !="" || form != "-"){
        loadForm("{{ url('mobile-tarbak/form') }}/"+form);
    }
    
    $( window ).resize(function() {
        if($('#saku-report').length > 0){
            setHeightReport();
        }
        if($('#content-chart').length > 0){
            setHeightDash();
        }
        setHeightForm();
    });
    
    $('#notificationButton').click(function(){
        updateNotifRead();
    });

    $('.to-home').click(function(){
        if(form != "" || form != "-"){

            loadForm("{{ url('mobile-tarbak/form') }}/"+form);
        }else{
            loadForm("{{ url('mobile-tarbak/form') }}/blankform");
        }
    });

    $('.navbar_bottom').on('click','a',function(e){
        e.preventDefault();
        var url = $(this).data('href'); 
        $('.navbar_bottom a').removeClass('active');
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
        }
        if(url != "" || url != "-"){
            loadForm("{{ url('mobile-tarbak/form') }}/"+url);
        }else{
            loadForm("{{ url('mobile-tarbak/form') }}/blankform");
        }
    });

    var $theme = "dore.light.blueolympic.min.css";
 
    </script>
    <script src="{{ asset('asset_dore/js/scripts.js') }}"></script>
    <script>
        $('div.theme-colors').hide();
        $('.navbar').hide();
        $('.menu').hide();
        window.localStorage.setItem('logged_in', true);

        function storageChange (event) {
            if(event.key === 'logged_in') {
                if(window.localStorage.getItem('logged_in') == "false"){
                    window.location.href = "{{ url('mobile-tarbak/sesi-habis') }}";
                }
            }
        }
        window.addEventListener('storage', storageChange, false);

        function logout(){
            msgDialog({
                id:null,
                type:'logout'
            });
        }

        

    </script>
</body>
</html>