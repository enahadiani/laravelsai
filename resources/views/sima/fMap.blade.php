    <style>
        .btn {
            border-radius: 5px !important;
        }
        .bg-red{
            background:#dd4b39 !important;
            color:white !important;
        }
        .bg-orange{
            background:#ff851b !important;
            color:white !important;
        }
        
        .bg-yellow{
            background:#f39c12 !important;
            color:white !important;
        }
        
        .bg-green{
            background:#00a65a !important;
            color:white !important;
        }
        
        .bg-blue{
            background:#0073b7 !important;
            color:white !important;
        }
        h5{
            font-size: 1.55rem !important;
            color:white !important;
        }
        .h6-sub{
            font-size: 0.8rem !important;
            color:white !important;
        }
        .span-sub{
            font-size: 0.7rem !important;
            color:white !important;
        }
        .bg-info{
            background:#17a2b82e !important;
        }
    </style>
    
    <link rel="stylesheet" href="{{ asset('map/bootstrap-slider.min.css') }}">
    <div id="dashboard_page_map">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 bg-red text-center" style="height: 8vh">
                        <a href="#" class="btn btn-primary btn-sm float-left px-2 py-1" style="margin-top:10px"><i class="simple-icon-home"></i></a>
                        <h6 style="color:white;margin-top:15px" >TELKOM MyAssist</h6>
                        <button id = 'btn_map_regional' class='btn btn-sm  btn-success float-right px-2 py-1' style = "position: absolute;right: 20px;top: 0;margin-top:10px">MAP Regional</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 px-0">
                        <div id="map" style="width:100%; height: calc(74vh - 120px) "></div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-3 py-2 bg-red text-center" style="height: 18vh">
                            <a id="btn_aset_lahan_nasional" href="javascript:void(0)" style="color:white !important">
                                <h5 id="jml_aset_lahan"></h5>
                                <h6 class='h6-sub'><strong>Aset Lahan</strong></h6>
                                <span class='span-sub'>Luas <span id="luas_aset_lahan"></span> m<sup>2</sup></span>
                            </a>
                        </div>
                        <div class="col-md-2 py-2 bg-orange text-center" style="height: 18vh">
                            <a id="btn_aset_gedung_nasional" href="javascript:void(0)" style="color:white !important">
                                <h5 id="jml_aset_gedung"></h5>
                                <h6 class='h6-sub'><strong>Aset Gedung</strong></h6>
                                <span class='span-sub'>Luas <span id="luas_aset_gedung"></span> m<sup>2</sup></span>
                            </a>
                        </div>
                        <div class="col-md-2 py-2 bg-yellow text-center" style="height: 18vh">
                            <a id="btn_digunakan_nasional" href="javascript:void(0)" style="color:white !important">
                                <h5><span style='font-size:inherit !important;color:inherit' id="persen_digunakan"></span>%</h5>
                                <h6 class='h6-sub'><strong>Penggunaan Bangunan</strong></h6>
                                <span class='span-sub'>Oleh Telkom</span>
                            </a>
                        </div>
                        <div class="col-md-2 py-2 bg-green text-center" style="height: 18vh">
                            <a id="btn_laba_bersih_nasional" href="javascript:void(0)" style="color:white !important">
                                <h5><span style='font-size:inherit !important;color:inherit' id="jml_laba_bersih"></span></h5>
                                <h6 class='h6-sub'><strong>Aset Primer</strong></h6>
                            <!-- <span>Desember 2016</span> -->
                            </a>
                        </div>
                        <div class="col-md-3 py-2 bg-blue text-center" style="height: 18vh">
                            <a id="btn_aset_sekunder_nasional" href="javascript:void(0)" style="color:white !important">
                                <h5><span style='font-size:inherit !important;color:inherit' id="persen_aset_sekunder"></span></h5>
                                <h6 class='h6-sub'><strong>Aset Sekunder</strong></h6>
                                <span class='span-sub'>Perspektif Planning</span>
                            </a>
                        </div>
                </div>
            </div>

            <div class="col-md-3 bg-info" style="height:calc(100vh - 120px); overflow-y: auto">
                <!-- Search -->
                <div class="row" style="margin-top: 10px">
                    <div class="col-md-12">
                        <a href="#" id = 'btnFilterPOI' style = "overflow-y: auto" class="btn btn-sm px-2 py-1 btn-primary"><i class="simple-icon-flag"></i> POI</a>
                        <a href="#" id = "btnDaftarAset" style = "overflow-y: auto" class="btn btn-sm px-2 py-1 btn-danger"><i class="simple-icon-list"></i> List </a><br/>
                        <button type="button" class="btn btn-sm px-2 py-1 btn-primary float-right" data-toggle="modal" data-target="#ModalFilterMap" style="position:absolute;top:0;right:10px">
                        <i class="simple-icon-settings"></i> 
                        </button>
                    </div>
                </div><br/>
                <div class="collapse card"0 style = "margin-top:20px;width:20.5vw;" id="collapsePOI">
                    <div class="card-body px-2 py-1" style = "color:black;background-color:#fcfcfc;border-color:#ff002b;border-radius:5px !important">
                        Radius : <br/>
                        <input id="slider_POI" style = 'width:180px' data-slider-id='slider_POISlider' type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1"/>   <br/>   
                        Tipe POI : <br/> 
                        <div class="checkbox">
                            <div class="row" style="margin-top: 10px">
                                <div class="col-md-6">
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="accounting">Accounting</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="airport">Airport</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="amusement_park">Amusement Park</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="aquarium">Aquarium</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="art_gallery">Art Gallery</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="atm">ATM</label><br>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="bakery">Bakery</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="bank">Bank</label><br>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="bar">Bar</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="beauty_salon">Beauty Salon</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="bicycle_store">Bicycle Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="book_store">Book Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="bowling_alley">Bowling Alley</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="bus_station">Bus Station</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="cafe">Cafe</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="campground">Campground</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="car_dealer">Car Dealer</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="car_rental">Car Rental</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="car_repair">Car Repair</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="car_wash">Car Wash</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="casino">Casino</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="cemetery">Cemetery</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="church">Church</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="city_hall">City Hall</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="clothing_store">Clothing Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="convenience_store">Convenience Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="courthouse">Courthouse</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="dentist">Dentist</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="department_store">Department Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="doctor">Doctor</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="electrician">Electrician</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="electronics_store">Electronics Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="embassy">Embassy</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="fire_station">Fire Station</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="florist">Florist</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="funeral_home">Funeral Home</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="furniture_store">Furniture Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="gas_station">Gas Station</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="gym">Gym</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="hair_care">Hair Care</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="hardware_store">Hardware Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="hindu_temple">Hindu Temple</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="home_goods_store">Home Goods Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="hospital">Hospital</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="insurance_agency">Insurance Agency</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="jewelry_store">Jewelry Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="laundry">Laundry</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="lawyer">Lawyer</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="library">Library</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="liquor_store">Liquor Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="local_government_office">Local Government Office</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="locksmith">Locksmith</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="lodging">Lodging</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="meal_delivery">Meal Delivery</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="meal_takeaway">Meal Takeaway</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="mosque">Mosque</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="movie_rental">Movie Rental</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="movie_theater">Movie Theater</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="moving_company">Moving Company</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="museum">Museum</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="night_club">Night Club</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="painter">Painter</label><br>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="park">Park</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="parking">Parking</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="pet_store">Pet Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="pharmacy">Pharmacy</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="physiotherapist">Physiotherapist</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="plumber">Plumber</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="police">Police</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="post_office">Post Office</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="real_estate_agency">Real Estate Agency</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="restaurant">Restaurant</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="roofing_contractor">Roofing Contractor</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="rv_park">RV Park</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="school">School</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="shoe_store">Shoe Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="shopping_mall">Shopping Mall</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="spa">Spa</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="stadium">Stadium</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="storage">Storage</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="store">Store</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="subway_station">Subway Station</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="supermarket">Supermarket</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="synagogue">Synagogue</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="taxi_stand">Taxi Stand</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="train_station">Train Station</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="transit_station">Transit Station</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="travel_agency">Travel Agency</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="veterinary_care">Veterinary Care</label>
                                    <label><input name = 'poi_ck[]' type="checkbox" class = 'ck_poi' value="zoo">Zoo</label>
                                </div>
                            </div>
                        </div><br/>
                    </div>    
                </div>
                <div class="collapse panel panel-dafault pull-left sai-container-overflow-y" style = "margin-top:20px;width:22vw;overflow-x:hidden;" id="collapseDaftarAset">
                    
                </div>
                <!-- Dari Peta -->
                <div class="row">
                    <div class="col-md-12 text-center text-uppercase">
                        <div id="regional"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="btn_aset">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="aset_lahan_title">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="aset_lahan_chart">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="aset_gedung_title">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="aset_gedung_chart">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="digunakan_title">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="btn_digunakan">
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="digunakan_chart">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="nilai">
                            
                        </div>
                    </div>
                </div>

                <!-- Dari Menu -->
                <div class="row">
                    <div class="col-md-12 text-center text-uppercase">
                        <div id="title_menu"></div>
                    </div>
                    <div class="col-md-12">
                        <div id="grafik_regional">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="map_poi"></div>

    <!-- Modal Filter-->
    <div class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" id="ModalFilterMap">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style = "position:relative;right:-500px;top:20px;">
                <div class="modal-header">
                    <div class = "row">
                        <div class="col-md-10">
                            <h5 class="modal-title"><b>Filter Data</b></h5>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <b>Keyword : </b> <input id="textboxt_cari_aset" type="text" class="form-control" placeholder="Ketik Nama Aset..."><br>
                    <select class='form-control input-sm' id='dash_regional'>
                        <option value='' selected="true" >Pilih REGIONAL</option>
                        <option value=''>NASIONAL</option>
                    </select><br/>
                    <select class='form-control input-sm' id='dash_witel'>
                        <option value='' selected="true" >Pilih WITEL</option>
                    </select>
                    <br/><b>Jenis Aset : </b><br/> 
                    <div class="checkbox">
                        <label><input type="checkbox" class = 'ck_jenis_aset' value="lahan">Lahan</label>
                        <label><input type="checkbox" class = 'ck_jenis_aset' value="bangunan">Bangunan</label>
                    </div>
                    <b>Luas Lahan/Bangunan : </b><br/> 
                    <div class = "slider_luas_lahan_bangunan">
                        <input id="slider_luas_lahan" style = 'width:150px' data-slider-id='slider_luas_lahanSlider' type="text" data-slider-min="500" data-slider-max="100000" data-slider-step="500" data-slider-value="600000"/> 
                    </div>
                    <label><input name = 'on_off_slider' type="checkbox" class = 'on_off_slider' value="ON" checked>ON/OFF Slider</label>
                    <div class = "row" style="padding:15px;">
                        <b>Kawasan Peruntukkan : </b><br/>
                        <div class = 'row'>
                            <div class="checkbox">
                                <div class = 'col-md-6'>
                                    <label><input name = 'peruntukkan_ck[]' type="checkbox" class = 'ck_peruntukkan' value="Tanah Kosong">Tanah Kosong</label>
                                    <label><input name = 'peruntukkan_ck[]' type="checkbox" class = 'ck_peruntukkan' value="kantor">Perkantoran</label>
                                </div>
                                <div class = 'col-md-6'>
                                    <label><input name = 'peruntukkan_ck[]' type="checkbox" class = 'ck_peruntukkan' value="gudang">Pergudangan</label>
                                    <label><input name = 'peruntukkan_ck[]' type="checkbox" class = 'ck_peruntukkan' value="komersial">Komersial</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-sm btn-success pull-right" id='dash_map_filter' style="position: cursor:pointer; max-height:30px;" data-toggle="control-sidebar"><i class="fa fa-refresh fa-1"></i> Filter</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="informasi_gedung" role="dialog">
        <div class="modal-dialog modal-lg">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" id = "header_modal_informasi_bangunan">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#informasi_dasar_gedung" role="tab">Informasi Dasar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#utilisasi" role="tab">Utilisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#NKA_gedung" role="tab">NKA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#izin" role="tab">Izin</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content card">
                    <!--Panel 1-->
                    <div class="tab-pane fade in active" id="informasi_dasar_gedung" role="tabpanel">
                        <br>
                        <div class="bs-example">
                            <div id="CarouselInformasiGedung" class="carousel slide" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators" id = "carousel_indicators_informasi_gedung">
                                    <li data-target="#CarouselInformasiGedung" data-slide-to="0" class="active"></li>
                                    <li data-target="#CarouselInformasiGedung" data-slide-to="1"></li>
                                    <li data-target="#CarouselInformasiGedung" data-slide-to="2"></li>
                                </ol>   
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner" id = "carousel_inner_informasi_gedung">
                                    <div class="item active" style = "margin: 0 auto;">
                                        <img class="img-responsive center-block" src="{{ asset('img/gis_img/telkom-gbr-tkd-sedia.png') }}">
                                    </div>
                                    <div class="item" style = "margin: 0 auto;">
                                        <img class="img-responsive center-block" src="{{ asset('img/gis_img/telkom-gbr-tkd-sedia.png') }}">
                                    </div>
                                    <div class="item" style = "margin: 0 auto;">
                                        <img class="img-responsive center-block" src="{{ asset('img/gis_img/telkom-gbr-tkd-sedia.png') }}">
                                    </div>
                                </div>
                                <!-- Carousel controls -->
                                <div id = "carousel_controls_informasi_gedung">
                                    
                                </div>
                            </div>
                        </div>
                        <br>

                        <table class="table table-bordered table-striped">
                            <thead id = 'thead_modal_informasi_bangunan'>
                                
                            </thead>
                            <tbody id = 'tbody_modal_informasi_bangunan'>
                                
                            </tbody>
                        </table>
                    </div>
                    <!--/.Panel 1-->
                    <!--Panel 2-->
                    <!-- <div class="tab-pane fade" id="pbb_gedung" role="tabpanel">
                        <br>
                        
                    </div> -->
                    <!--/.Panel 2-->
                    <!--Panel 3-->
                    <div class="tab-pane fade" id="utilisasi" role="tabpanel">
                        <br>
                        
                    </div>
                    <!--/.Panel 3-->
                    <!--Panel 4-->
                    <div class="tab-pane fade" id="NKA_gedung" role="tabpanel">
                        <br>
                        
                    </div>
                    <!--/.Panel 4-->
                    <!--Panel 5-->
                    <div class="tab-pane fade" id="izin" role="tabpanel">
                        <br><br>
                        
                    </div>
                    <!--/.Panel 5-->
                </div>
            </div>
            <div class="modal-footer">
                
            </div>  
        </div>
        
        </div>
    </div>

    <div class="modal fade" id="informasi_lahan" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header" id = "header_modal_informasi_lahan">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id = "header_modal_informasi_lahan">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#informasi_dasar" role="tab">Informasi Dasar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kepemilikan" role="tab">Kepemilikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pbb" role="tab">PBB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#nilai_aset_lahan" role="tab">Nilai Aset</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#NKA" role="tab">NKA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#potensiindikasi" role="tab">Potensi Indikasi</a>
                    </li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content card">
                    <!--Panel 1-->
                    <div class="tab-pane fade in active" id="informasi_dasar" role="tabpanel">
                        <br>
                        <div class="bs-example">
                            <div id="CarouselInformasi" class="carousel slide" data-ride="carousel">
                                <!-- Carousel indicators -->
                                <ol class="carousel-indicators" id = "carousel_indicators_informasi">
                                    <li data-target="#CarouselInformasi" data-slide-to="0" class="active"></li>
                                    <li data-target="#CarouselInformasi" data-slide-to="1"></li>
                                    <li data-target="#CarouselInformasi" data-slide-to="2"></li>
                                </ol>   
                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner" id = "carousel_inner_informasi">
                                    <div class="item active" style = "margin: 0 auto;">
                                        <img class="img-responsive center-block" src="{{ asset('img/gis_img/telkom-gbr-tkd-sedia.png') }}">
                                    </div>
                                    <div class="item" style = "margin: 0 auto;">
                                        <img class="img-responsive center-block" src="{{ asset('img/gis_img/telkom-gbr-tkd-sedia.png') }}">
                                    </div>
                                    <div class="item" style = "margin: 0 auto;">
                                        <img class="img-responsive center-block" src="{{ asset('img/gis_img/telkom-gbr-tkd-sedia.png') }}">
                                    </div>
                                </div>
                                <!-- Carousel controls -->
                                <div id = "carousel_controls_informasi">
                                    
                                </div>
                            </div>
                        </div>
                        <br>

                        <table class="table table-bordered table-striped">
                            <thead id = 'thead_modal_informasi_lahan'>
                                
                            </thead>
                            <tbody id = 'tbody_modal_informasi_lahan'>
                                
                            </tbody>
                        </table>
                    </div>
                    <!--/.Panel 1-->
                    <!--Panel 2-->
                    <div class="tab-pane fade" id="kepemilikan" role="tabpanel">
                        <br>
                        <div class="bs-example">
                            <!-- <div id="CarouselKepemilikan" class="carousel slide" data-ride="carousel"> -->
                                <!-- Carousel indicators -->
                                <!-- <ol class="carousel-indicators">
                                    <li data-target="#CarouselKepemilikan" data-slide-to="0" class="active"></li>
                                    <li data-target="#CarouselKepemilikan" data-slide-to="1"></li>
                                </ol>    -->
                                <!-- Wrapper for carousel items -->
                                <!-- <div class="carousel-inner">
                                    <div class="item active">
                                        <img class="img-responsive center-block" style = "height:401px;margin: 0 auto;" src="http://gis.simkug.com/assets/img/gis_img/sertifikat-tanah.jpg">
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive center-block" style = "height:401px;margin: 0 auto;" src="http://gis.simkug.com/assets/img/gis_img/sertifikat-tanah5.jpg">
                                    </div>
                                </div> -->
                                <!-- Carousel controls -->
                                <!-- <a class="carousel-control left" href="#CarouselKepemilikan" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="carousel-control right" href="#CarouselKepemilikan" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div> -->
                        </div>
                        <br>
                        <div id = "data_table_kepemilikan">

                        </div>
                        
                    </div>    
                    <!--/.Panel 2-->
                    <!--Panel 3-->
                    <div class="tab-pane fade" id="pbb" role="tabpanel">
                        <br>
                        
                    </div>
                    <!--/.Panel 3-->
                    <!--Panel 4-->
                    <div class="tab-pane fade" id="nilai_aset_lahan" role="tabpanel">
                        <br>
                        
                    </div>
                    <!--/.Panel 4-->
                    <!--Panel 5-->
                    <div class="tab-pane fade" id="NKA" role="tabpanel">
                        <br>
                        
                    </div>
                    <!--/.Panel 5-->
                    <!--Panel 6-->
                    <div class="tab-pane fade" id="potensiindikasi" role="tabpanel">
                        <br><br>
                        
                    </div>
                    <!--/.Panel 6-->
                </div>
            <div class="modal-footer">
                
            </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap slider -->
    <script src="{{ asset('map/bootstrap-slider2.js') }}"></script>
    <script src="{{ asset('map/koor_reg_1.js') }}"></script>
    <script src="{{ asset('map/koor_reg_2.js') }}"></script>
    <script src="{{ asset('map/koor_reg_3.js') }}"></script>
    <script src="{{ asset('map/koor_reg_4.js') }}"></script>
    <script src="{{ asset('map/koor_reg_5.js') }}"></script>
    <script src="{{ asset('map/koor_reg_6.js') }}"></script>
    <script src="{{ asset('map/koor_reg_7.js') }}"></script>
    <script>

        var map;
        var marker_coordinate = [];
        var marker_poi = [];
        var rangeSliderValStart;
        var id_reg_global;
        var id_gsd_global;
        var data_aset_global;
        var data_aset_gedung_global;
        var data_aset_lahan_global;
        var daftar_aset_map;
        var daftar_aset_map_filtered;
        var daftar_aset_dash;
        var daftar_aset_dash_first_page;
        var daftar_aset_dash_filtered;

        function peta_nasional_filter(regnull, gsd, center_point, zoom_point){
            var filter_data = {'dash_id': regnull, 'dash_fm' : '', 'dash_witel' : ''};
            loadData('HomePetaNasionalFilterKlikPulau', baseUrl+"/gis/index.php/dbaset/AjaxService/getSummary", filter_data);
            
            var arr_ck_jenis_aset = [];
            $('.ck_jenis_aset:checked').each(function(){
                var val = $(this).val();
                arr_ck_jenis_aset.push(val);
            });
            var arr_ck_milik = [];
            $('.ck_milik:checked').each(function(){
                var val = $(this).val();
                arr_ck_milik.push(val);
            });
            var arr_ck_peruntukkan = [];
            $('.ck_peruntukkan:checked').each(function(){
                var val = $(this).val();
                arr_ck_peruntukkan.push(val);
            });
            if ($('input.on_off_slider').is(':checked')) {
                var filter_luas_lahan = $('#slider_luas_lahan').data('bootstrapSlider').getValue();
            }else{
                var filter_luas_lahan = 99999999999999999999999999999999;
            }

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: zoom_point,
                center: center_point,
                styles: [
                    {
                        featureType: "poi",
                        stylers: [{ visibility: "off" }] 
                    }
                ],
                mapTypeId: google.maps.MapTypeId.ROADMAP
                });
            var infowindow = new google.maps.InfoWindow();

            var koor_reg_1 = [];
            var koor_reg_2 = [];
            var koor_reg_3 = [];
            var koor_reg_4 = [];
            var koor_reg_5 = [];
            var koor_reg_6 = [];
            var koor_reg_7 = [];

            koor_reg_1 = get_regional_1();
            koor_reg_2 = get_regional_2();
            koor_reg_3 = get_regional_3();
            koor_reg_4 = get_regional_4();
            koor_reg_5 = get_regional_5();
            koor_reg_6 = get_regional_6();
            koor_reg_7 = get_regional_7();

            var color = [];
            color[0] = '#0c9b26';
            color[1] = '#15d337';
            color[2] = '#1eea43';
            color[3] = '#eef21a';
            color[4] = '#f1b119';
            color[5] = '#f46118';
            color[6] = '#ef1717';

            path_reg_1 = [];
            for(i=0;i<koor_reg_1.length;i++){
                path_reg_1.push(koor_reg_1[i]);
            }

            path_reg_2 = [];
            for(i=0;i<koor_reg_2.length;i++){
                path_reg_2.push(koor_reg_2[i]);
            }

            path_reg_3 = [];
            for(i=0;i<koor_reg_3.length;i++){
                path_reg_3.push(koor_reg_3[i]);
            }

            path_reg_4 = [];
            for(i=0;i<koor_reg_4.length;i++){
                path_reg_4.push(koor_reg_4[i]);
            }

            path_reg_5 = [];
            for(i=0;i<koor_reg_5.length;i++){
                path_reg_5.push(koor_reg_5[i]);
            }

            path_reg_6 = [];
            for(i=0;i<koor_reg_6.length;i++){
                path_reg_6.push(koor_reg_6[i]);
            }

            path_reg_7 = [];
            for(i=0;i<koor_reg_7.length;i++){
                path_reg_7.push(koor_reg_7[i]);
            }

            marker_coordinate = [];  

            //set id reg global
            id_reg_global = regnull;
            for(j=0;j<gsd[regnull].length;j++){
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(gsd[regnull][j].COOR_Y), lng: parseFloat(gsd[regnull][j].COOR_X) },
                    icon: "{{ asset('img/gis_img/locationIconRed.png') }}",
                    map: map
                });

                marker_coordinate.push(marker);                 
                var content = 
                    '<div id = "info_window_lahan"> '+
                        'IDAREAL : # <span class = "idareal_daftar_aset">'+ gsd[regnull][j].IDAREAL +'</span> <br/> '+gsd[regnull][j].NAMA_LAHAN+' <br/> COOR_X : '+ gsd[regnull][j].COOR_X +' <br/> COOR_Y : '+gsd[regnull][j].COOR_Y+
                    '</div>';  

                var infowindow = new google.maps.InfoWindow()

                google.maps.event.addListener(marker,'mouseover', (function(marker,content,infowindow){ 
                    return function() {
                        infowindow.setContent(content);
                        infowindow.open(map,marker);
                    };
                })(marker,content,infowindow));
                
                google.maps.event.addListener(marker,'mouseout', (function(marker,content,infowindow){ 
                    return function() {
                        infowindow.close();
                    };
                })(marker,content,infowindow));

                var data_gsd = gsd[regnull][j];
                var filter_data = {'dash_id': regnull, 'dash_fm' : data_gsd.ID, 'dash_witel' : '', 'jenis_aset' : arr_ck_jenis_aset, 'luas_lahan' : filter_luas_lahan, 'status_kepemilikan' : arr_ck_milik, 'peruntukkan' : arr_ck_peruntukkan };

                // onclick marker aset lahan/gedung
                // console.log(filter_data);
                
                (function (marker, data_gsd) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        id_lahan = data_gsd.IDAREAL; 
                        loadData('modalPetaInformasiAset',"GET", "{{ url('sima/detail-lahan') }}", {'id_areal': id_lahan});
                        map.setZoom(12);
                        map.panTo(this.getPosition());

                        id_reg_global = regnull;
                        id_gsd_global = '';
                    });
                })(marker, data_gsd);
            }      

            if(regnull != 1){
                var polygon_reg_1 = new google.maps.Polygon({
                    map: map,
                    paths: path_reg_1,
                    strokeColor: color[0],
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color[0],
                    fillOpacity: 1
                });

                google.maps.event.addListener(polygon_reg_1, 'click', function (event) {
                    clear_dari_peta();

                    var point = path_reg_1[0][0];
                    var filter_data = {'dash_id': 1, 'dash_fm' : '', 'dash_witel' : ''};

                    peta_nasional_filter(1, gsd, point, map.getZoom());
                    $('#dash_regional option[value=1]').attr('selected','TRUE');
                });
            }

            if(regnull != 2){
                var polygon_reg_2 = new google.maps.Polygon({
                    map: map,
                    paths: path_reg_2,
                    strokeColor: color[1],
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color[1],
                    fillOpacity: 1
                });

                google.maps.event.addListener(polygon_reg_2, 'click', function (event) {
                    clear_dari_peta();

                    var point = path_reg_2[0][0];
                    var filter_data = {'dash_id': 2, 'dash_fm' : '', 'dash_witel' : ''};

                    peta_nasional_filter(2, gsd, point, map.getZoom());
                    $('#dash_regional option[value=2]').attr('selected','TRUE');
                });
            }    

            if(regnull != 3){
                var polygon_reg_3 = new google.maps.Polygon({
                    map: map,
                    paths: path_reg_3,
                    strokeColor: color[2],
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color[2],
                    fillOpacity: 1
                });

                google.maps.event.addListener(polygon_reg_3, 'click', function (event) {
                    clear_dari_peta();
                    
                    var point = path_reg_3[0][0];
                    var filter_data = {'dash_id': 3, 'dash_fm' : '', 'dash_witel' : ''};

                    peta_nasional_filter(3, gsd, point, map.getZoom());
                    $('#dash_regional option[value=3]').attr('selected','TRUE');
                });
            }

            if(regnull != 4){
                var polygon_reg_4 = new google.maps.Polygon({
                    map: map,
                    paths: path_reg_4,
                    strokeColor: color[3],
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color[3],
                    fillOpacity: 1
                });

                google.maps.event.addListener(polygon_reg_4, 'click', function (event) {
                    clear_dari_peta();
                    
                    var point = path_reg_4[0][0];
                    var filter_data = {'dash_id': 4, 'dash_fm' : '', 'dash_witel' : ''};

                    peta_nasional_filter(4, gsd, point, map.getZoom());
                    $('#dash_regional option[value=4]').attr('selected','TRUE');
                });
            }

            if(regnull != 5){
                var polygon_reg_5 = new google.maps.Polygon({
                    map: map,
                    paths: path_reg_5,
                    strokeColor: color[4],
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color[4],
                    fillOpacity: 1
                });

                google.maps.event.addListener(polygon_reg_5, 'click', function (event) {
                    clear_dari_peta();
                    
                    var point = path_reg_5[0][0];
                    var filter_data = {'dash_id': 5, 'dash_fm' : '', 'dash_witel' : ''};

                    peta_nasional_filter(5, gsd, point, map.getZoom());
                    $('#dash_regional option[value=5]').attr('selected','TRUE');
                });
            }    

            if(regnull != 6){
                var polygon_reg_6 = new google.maps.Polygon({
                    map: map,
                    paths: path_reg_6,
                    strokeColor: color[5],
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color[5],
                    fillOpacity: 1
                });

                google.maps.event.addListener(polygon_reg_6, 'click', function (event) {
                    clear_dari_peta();
                    
                    var point = path_reg_6[0][0];
                    var filter_data = {'dash_id': 6, 'dash_fm' : '', 'dash_witel' : ''};

                    peta_nasional_filter(6, gsd, point, map.getZoom());
                    $('#dash_regional option[value=6]').attr('selected','TRUE');
                });
            }    

            if(regnull != 7){
                var polygon_reg_7 = new google.maps.Polygon({
                    map: map,
                    paths: path_reg_7,
                    strokeColor: color[6],
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color[6],
                    fillOpacity: 1
                });

                google.maps.event.addListener(polygon_reg_7, 'click', function (event) {
                    clear_dari_peta();
                    
                    var point = path_reg_7[0][0];
                    var filter_data = {'dash_id': 7, 'dash_fm' : '', 'dash_witel' : ''};

                    peta_nasional_filter(7, gsd, point, map.getZoom());
                    $('#dash_regional option[value=7]').attr('selected','TRUE');
                });
            }    

            google.maps.event.addListener(map, 'idle', function (event) {
                var NewMapCenter = map.getCenter();
                var point = new google.maps.LatLng(NewMapCenter.lat(), NewMapCenter.lng());

                if(regnull != 1){
                    if (google.maps.geometry.poly.containsLocation(point, polygon_reg_1) && map.getZoom() >= 6) {
                        var filter_data = {'dash_id': 1, 'dash_fm' : '', 'dash_witel' : ''};
                        $('#dash_regional option[value=1]').attr('selected','TRUE');
                    }
                }

                if(regnull != 2){
                    if (google.maps.geometry.poly.containsLocation(point, polygon_reg_2) && map.getZoom() >= 6) {
                        var filter_data = {'dash_id': 2, 'dash_fm' : '', 'dash_witel' : ''};
                        $('#dash_regional option[value=2]').attr('selected','TRUE');
                    }
                }

                if(regnull != 3){
                    if (google.maps.geometry.poly.containsLocation(point, polygon_reg_3) && map.getZoom() >= 6) {
                        var filter_data = {'dash_id': 3, 'dash_fm' : '', 'dash_witel' : ''};
                        $('#dash_regional option[value=3]').attr('selected','TRUE');
                    }
                }

                if(regnull != 4){
                    if (google.maps.geometry.poly.containsLocation(point, polygon_reg_4) && map.getZoom() >= 6) {
                        var filter_data = {'dash_id': 4, 'dash_fm' : '', 'dash_witel' : ''};
                        $('#dash_regional option[value=4]').attr('selected','TRUE');
                    }
                }

                if(regnull != 5){
                    if (google.maps.geometry.poly.containsLocation(point, polygon_reg_5) && map.getZoom() >= 6) {
                        var filter_data = {'dash_id': 5, 'dash_fm' : '', 'dash_witel' : ''};
                        $('#dash_regional option[value=5]').attr('selected','TRUE');
                    }
                }

                if(regnull != 6){
                    if (google.maps.geometry.poly.containsLocation(point, polygon_reg_6) && map.getZoom() >= 6) {
                        var filter_data = {'dash_id': 6, 'dash_fm' : '', 'dash_witel' : ''};
                        $('#dash_regional option[value=6]').attr('selected','TRUE');
                    }
                }

                if(regnull != 7){
                    if (google.maps.geometry.poly.containsLocation(point, polygon_reg_7) && map.getZoom() >= 6) {
                        var filter_data = {'dash_id': 7, 'dash_fm' : '', 'dash_witel' : ''};
                        $('#dash_regional option[value=7]').attr('selected','TRUE');
                    }
                }

                if(typeof filter_data != 'undefined'){
                    if(typeof filter_data.dash_id != 'undefined'){
                        clear_dari_peta();

                        peta_nasional_filter(filter_data.dash_id, gsd, point, map.getZoom());
                    }
                }
            });

        }

        function loadData(index,method,url,param=null){
            $.ajax({
                type: method,
                url: url,
                dataType: 'json',
                success:function(result){    
                    if(result.data.status){
                        var data = result.data;
                        switch(index){
                            case 'HomePetaNasional':
                                $('#jml_aset_lahan').html(data.tl);
                                $('#luas_aset_lahan').html(accounting.formatMoney(data.ll,'',2,'.',','));
                                $('#jml_aset_gedung').html(data.tb);
                                $('#luas_aset_gedung').html(accounting.formatMoney(data.lb,'',2,'.',','));
                                $('#persen_digunakan').html(accounting.formatMoney(data.dt,'',2,'.',','));
                                $('#jml_laba_bersih').html(data.tn);
                                $('#persen_aset_sekunder').html(data.pp);

                                data.gsd = data.aset;
                                // data_aset_lahan_global = data.aset_lahan;
                                // data_aset_gedung_global = data.aset_gedung;
                                peta_nasional(data.gsd);
                            break;
                        }
                    }
                }
            });
        }

        loadData('HomePetaNasional','GET', "{{ url('sima-dash/summary') }}");

        function peta_nasional(gsd){
            // console.log(gsd);
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                center: new google.maps.LatLng(-1.154499, 116.430086),
                styles: [
                    {
                        featureType: "poi",
                        stylers: [{ visibility: "off" }] 
                    }
                ],
                mapTypeId: google.maps.MapTypeId.ROADMAP
                });
            var infowindow = new google.maps.InfoWindow();

            var koor_reg_1 = [];
            var koor_reg_2 = [];
            var koor_reg_3 = [];
            var koor_reg_4 = [];
            var koor_reg_5 = [];
            var koor_reg_6 = [];
            var koor_reg_7 = [];

            koor_reg_1 = get_regional_1();
            koor_reg_2 = get_regional_2();
            koor_reg_3 = get_regional_3();
            koor_reg_4 = get_regional_4();
            koor_reg_5 = get_regional_5();
            koor_reg_6 = get_regional_6();
            koor_reg_7 = get_regional_7();

            var color = [];
            color[0] = '#0c9b26';
            color[1] = '#15d337';
            color[2] = '#1eea43';
            color[3] = '#eef21a';
            color[4] = '#f1b119';
            color[5] = '#f46118';
            color[6] = '#ef1717';

            path_reg_1 = [];
            for(i=0;i<koor_reg_1.length;i++){
                path_reg_1.push(koor_reg_1[i]);
            }

            var polygon_reg_1 = new google.maps.Polygon({
                map: map,
                paths: path_reg_1,
                strokeColor: color[0],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color[0],
                fillOpacity: 1
            });

            google.maps.event.addListener(polygon_reg_1, 'click', function (event) {
                clear_dari_peta();
                var point = path_reg_1[0][0];
                var filter_data = {'dash_id': 1, 'dash_fm' : '', 'dash_witel' : ''};

                

                peta_nasional_filter(1, gsd, point, map.getZoom());
                $('#dash_regional option[value=1]').attr('selected','TRUE');
            });

            path_reg_2 = [];
            for(i=0;i<koor_reg_2.length;i++){
                path_reg_2.push(koor_reg_2[i]);
            }

            var polygon_reg_2 = new google.maps.Polygon({
                map: map,
                paths: path_reg_2,
                strokeColor: color[1],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color[1],
                fillOpacity: 1
            });

            google.maps.event.addListener(polygon_reg_2, 'click', function (event) {
                clear_dari_peta();

                var point = path_reg_2[0][0];
                var filter_data = {'dash_id': 2, 'dash_fm' : '', 'dash_witel' : ''};

                

                peta_nasional_filter(2, gsd, point, map.getZoom());  
                $('#dash_regional option[value=2]').attr('selected','TRUE');
            });

            path_reg_3 = [];
            for(i=0;i<koor_reg_3.length;i++){
                path_reg_3.push(koor_reg_3[i]);
            }

            var polygon_reg_3 = new google.maps.Polygon({
                map: map,
                paths: path_reg_3,
                strokeColor: color[2],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color[2],
                fillOpacity: 1
            });

            google.maps.event.addListener(polygon_reg_3, 'click', function (event) {
                clear_dari_peta();
                
                var point = path_reg_3[0][0];
                var filter_data = {'dash_id': 3, 'dash_fm' : '', 'dash_witel' : ''};

                
                
                peta_nasional_filter(3, gsd, point, map.getZoom());  
                $('#dash_regional option[value=3]').attr('selected','TRUE');
            });

            path_reg_4 = [];
            for(i=0;i<koor_reg_4.length;i++){
                path_reg_4.push(koor_reg_4[i]);
            }

            var polygon_reg_4 = new google.maps.Polygon({
                map: map,
                paths: path_reg_4,
                strokeColor: color[3],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color[3],
                fillOpacity: 1
            });

            google.maps.event.addListener(polygon_reg_4, 'click', function (event) {
                clear_dari_peta();
                
                var point = path_reg_4[0][0];
                var filter_data = {'dash_id': 4, 'dash_fm' : '', 'dash_witel' : ''};

                
                
                peta_nasional_filter(4, gsd, point, map.getZoom());     
                $('#dash_regional option[value=4]').attr('selected','TRUE');
            });

            path_reg_5 = [];
            for(i=0;i<koor_reg_5.length;i++){
                path_reg_5.push(koor_reg_5[i]);
            }

            var polygon_reg_5 = new google.maps.Polygon({
                map: map,
                paths: path_reg_5,
                strokeColor: color[4],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color[4],
                fillOpacity: 1
            });

            google.maps.event.addListener(polygon_reg_5, 'click', function (event) {
                clear_dari_peta();
                
                var point = path_reg_5[0][0];
                var filter_data = {'dash_id': 5, 'dash_fm' : '', 'dash_witel' : ''};

                

                peta_nasional_filter(5, gsd, point, map.getZoom()); 
                $('#dash_regional option[value=5]').attr('selected','TRUE');
            });

            path_reg_6 = [];
            for(i=0;i<koor_reg_6.length;i++){
                path_reg_6.push(koor_reg_6[i]);
            }

            var polygon_reg_6 = new google.maps.Polygon({
                map: map,
                paths: path_reg_6,
                strokeColor: color[5],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color[5],
                fillOpacity: 1
            });

            google.maps.event.addListener(polygon_reg_6, 'click', function (event) {
                clear_dari_peta();
                
                var point = path_reg_6[0][0];
                var filter_data = {'dash_id': 6, 'dash_fm' : '', 'dash_witel' : ''};

                

                peta_nasional_filter(6, gsd, point, map.getZoom());    
                $('#dash_regional option[value=6]').attr('selected','TRUE');
            });

            path_reg_7 = [];
            for(i=0;i<koor_reg_7.length;i++){
                path_reg_7.push(koor_reg_7[i]);
            }

            var polygon_reg_7 = new google.maps.Polygon({
                map: map,
                paths: path_reg_7,
                strokeColor: color[6],
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color[6],
                fillOpacity: 1
            });

            google.maps.event.addListener(polygon_reg_7, 'click', function (event) {
                clear_dari_peta();
                var point = path_reg_7[0][0];
                var filter_data = {'dash_id': 7, 'dash_fm' : '', 'dash_witel' : ''};

                

                peta_nasional_filter(7, gsd, point, map.getZoom());
                $('#dash_regional option[value=7]').attr('selected','TRUE');
            });

            google.maps.event.addListener(map, 'idle', function (event) {
                var NewMapCenter = map.getCenter();
                var point = new google.maps.LatLng(NewMapCenter.lat(), NewMapCenter.lng());
                
                if (google.maps.geometry.poly.containsLocation(point, polygon_reg_1) && map.getZoom() >= 6) {
                    var filter_data = {'dash_id': 1, 'dash_fm' : '', 'dash_witel' : ''};
                    $('#dash_regional option[value=1]').attr('selected','TRUE');
                }

                if (google.maps.geometry.poly.containsLocation(point, polygon_reg_2) && map.getZoom() >= 6) {
                    var filter_data = {'dash_id': 2, 'dash_fm' : '', 'dash_witel' : ''};
                    $('#dash_regional option[value=2]').attr('selected','TRUE');
                }

                if (google.maps.geometry.poly.containsLocation(point, polygon_reg_3) && map.getZoom() >= 6) {
                    var filter_data = {'dash_id': 3, 'dash_fm' : '', 'dash_witel' : ''};
                    $('#dash_regional option[value=3]').attr('selected','TRUE');
                }

                if (google.maps.geometry.poly.containsLocation(point, polygon_reg_4) && map.getZoom() >= 6) {
                    var filter_data = {'dash_id': 4, 'dash_fm' : '', 'dash_witel' : ''};
                    $('#dash_regional option[value=4]').attr('selected','TRUE');
                }

                if (google.maps.geometry.poly.containsLocation(point, polygon_reg_5) && map.getZoom() >= 6) {
                    var filter_data = {'dash_id': 5, 'dash_fm' : '', 'dash_witel' : ''};
                    $('#dash_regional option[value=5]').attr('selected','TRUE');
                }

                if (google.maps.geometry.poly.containsLocation(point, polygon_reg_6) && map.getZoom() >= 6) {
                    var filter_data = {'dash_id': 6, 'dash_fm' : '', 'dash_witel' : ''};
                    $('#dash_regional option[value=6]').attr('selected','TRUE');
                }

                if (google.maps.geometry.poly.containsLocation(point, polygon_reg_7) && map.getZoom() >= 6) {
                    var filter_data = {'dash_id': 7, 'dash_fm' : '', 'dash_witel' : ''};
                    $('#dash_regional option[value=7]').attr('selected','TRUE');
                }

                if(typeof filter_data !== 'undefined'){
                    clear_dari_peta();

                    peta_nasional_filter(filter_data.dash_id, gsd, point, map.getZoom());
                }
            });

        }

        function clear_dari_peta(){
            $('#regional').html('');
            $('#btn_aset').html('');
            $('#aset_lahan_title').html('');
            $('#aset_lahan_chart').html('');
            $('#aset_gedung_title').html('');
            $('#aset_gedung_chart').html('');
            $('#digunakan_title').html('');
            $('#btn_digunakan').html('');
            $('#digunakan_chart').html('');
            $('#nilai').html('');
            $('#title_menu').html('');
            $('#grafik_regional').html('');
        }

        $('#btnFilterPOI').click(function(){
            if($("#collapsePOI").is(":hidden")){
                $("#collapsePOI").slideDown("slow"); 
                // get_sebaran_aset_lahan();
            }else{
                $("#collapsePOI").slideUp("slow");
            }
        });

        $('#btnFilterOptionsMap').click(function(){
            if($("#collapseOptions").is(":hidden")){
                $("#collapseOptions").slideDown("slow"); 
                // get_sebaran_aset_lahan();
            }else{
                $("#collapseOptions").slideUp("slow");
            }
        });

        $('#slider_POI').bootstrapSlider({
            formatter: function(value) {
                console.log(value);
                return 'Current value: ' + value + ' KM';
            }
        });

        $('#slider_POI').slider().on('slideStart', function(value){
            rangeSliderValStart = $('#slider_POI').data('bootstrapSlider').getValue();
        });

        $('#slider_POI').slider().on('slideStop', function(value){
            var newVal = $('#slider_POI').data('bootstrapSlider').getValue();
            if(rangeSliderValStart != newVal) {
                poi_process();
            }
        });

        //POI function

        function poi_process(){
            setMapOnAll(null);
            var arr_ck = [];
            $('.ck_poi:checked').each(function(){
                var val = $(this).val();
                arr_ck.push(val);
            });
            var radius = $('#slider_POI').data('bootstrapSlider').getValue() * 1000;

            for(i=0;i<marker_coordinate.length;i++){
                for(j=0;j<arr_ck.length;j++){
                    poi_search(arr_ck[j],marker_coordinate[i],radius);
                }
            }
        }

        function setMapOnAll(map) {
            for (var i = 0; i < marker_poi.length; i++) {
                marker_poi[i].setMap(map);
            }
        }

        $('.ck_poi').click(function(){
            console.log('ck');
            poi_process();
        });

        function poi_search(type,coordinate,radius){
            var pyrmont = {lat: parseFloat(coordinate.position.lat()), lng: parseFloat(coordinate.position.lng()) };     
            var map_poi = new google.maps.Map(document.getElementById('map_poi'),{});

            infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map_poi);
            service.nearbySearch({
                location: pyrmont,
                radius: radius,
                types: [type]
            }, callback_poi);
        }

        function callback_poi(results, status){
            data_map = [];
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    data_map.push({position : results[i].geometry.location, type : results[i].types[0], icon : results[i].icon});
                }
            }
            // console.log(data_map);
            for(i=0;i<data_map.length;i++){
                var icon = {
                    url: data_map[i].icon, // url
                    scaledSize: new google.maps.Size(25,25), // scaled size
                    origin: new google.maps.Point(0,0), // origin
                    anchor: new google.maps.Point(0,0) // anchor
                };

                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(data_map[i].position.lat()), lng: parseFloat(data_map[i].position.lng()) },
                    icon: icon,
                    map: map
                });       
                marker_poi.push(marker);     
            }
            console.log(marker_poi);
        }

    </script>
    </div>