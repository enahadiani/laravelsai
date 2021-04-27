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

        function clearAllMarker(map) {
            for (var i = 0; i < marker_coordinate.length; i++) {
            marker_coordinate[i].setMap(map);
            }
        }

        function peta_nasional_filter(regnull, gsd, center_point, zoom_point){
            var filter_data = {'dash_id': regnull, 'dash_fm' : '', 'dash_witel' : ''};
            loadData('HomePetaNasionalFilterKlikPulau',GET,"{{ url('sima-dash/summary') }}", filter_data);
            
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
                            case 'modalPetaInformasiAset':
                                console.log(data);

                                if (data.lahan_master != null){
                                    $('#header_modal_informasi_lahan').html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                    '<h4 class="modal-title">'+ data.lahan_master[0].NAMA_LAHAN +' <small> #'+ data.lahan_master[0].IDAREAL +' '+ data.lahan_master[0].ALAMAT +' </small></h4>'
                                    );

                                    $('#thead_modal_informasi_lahan').html(
                                        '<tr style="background-color: red;color:#ffffff;">'+
                                            '<th>ID AREAL</th>'+
                                            '<th>'+ data.lahan_master[0].IDAREAL +'</th>'+
                                        '</tr>'
                                    );
        
                                    $('#tbody_modal_informasi_lahan').html(
                                        '<tr>'+
                                            '<td>Koordinat</td>'+
                                            '<td>'+ data.lahan_master[0].COOR_Y +', '+ data.lahan_master[0].COOR_X +'</td>'+
                                        '</tr>'+	
                                        '<tr>'+
                                            '<td>Alamat</td>'+
                                            '<td>'+ data.lahan_master[0].ALAMAT +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Kelurahan</td>'+
                                            '<td>'+ data.lahan_master[0].DESA +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Kecamatan</td>'+
                                            '<td>'+ data.lahan_master[0].KECAMATAN +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Kota</td>'+
                                            '<td>'+ data.lahan_master[0].KOTA +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Provinsi</td>'+
                                            '<td>'+ data.lahan_master[0].PROPINSI +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Regional</td>'+
                                            '<td>'+ data.lahan_master[0].TREG +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Witel</td>'+
                                            '<td>'+ data.lahan_master[0].WITEL +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Area GSD</td>'+
                                            '<td>'+ data.lahan_master[0].UNIT_GSD_ID +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Unit GSD</td>'+
                                            '<td>'+ data.lahan_master[0].UNIT_GSD +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Luas Lahan</td>'+
                                            '<td>'+ sepNum(data.lahan_master[0].LUAS_LAHAN) +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Status Kepemilikan</td>'+
                                            '<td>'+ data.lahan_master[0].NAMA_STATUS_KEPEMILIKAN +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Luas Terbangun</td>'+
                                            '<td>'+ DelDecimal(data.lahan_master[0].LAHAN_TERBANGUN) +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Jumlah Bangunan</td>'+
                                            '<td>'+ data.lahan_master[0].JUMLAH_BANGUNAN +'</td>'+
                                        '</tr>'
                                    );

                                    if(typeof data.img_lahan === 'undefined' || !data.img_lahan){
                                        var foto_aset = '/img/gis_img/telkom-gbr-tkd-sedia.png';
                                    }else{
                                        var foto_aset = data.img_lahan[0].FILE_PATH;
                                    }

                                    $('#potensiindikasi').html('');
                                    $('#potensiindikasi').append(
                                        "<br><div class='row'>"+
                                            "<div class='col-md-4'>"+
                                                '<img class="img-responsive center-block" width = "300px" height = "75px" src='+"{{ url('img') }}"+'/gis/assets'+ foto_aset +'>'+
                                            '</div>'+
                                            "<div class='col-md-8'>"+
                                                '<b>'+ data.lahan_master[0].NAMA_LAHAN +'</b>'+
                                                '<br>'+ data.lahan_master[0].ALAMAT +
                                                '<br> Luas Lahan : '+ data.lahan_master[0].LUAS_LAHAN +' m2'+
                                            '</div>'+
                                        '</div>'+
                                        '<br>'+
                                        "<div class='row'>"+
                                            "<div class='col-md-12'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-info" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.lahan_master[0].KDB_MAKSIMUM +
                                                            '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'KDB'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class = "row"> '+   
                                            '<div class="col-md-12">'+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-light-blue-gradient" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.lahan_master[0].KLB_MAKSIMUM + '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'KLB'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class = "row">'+    
                                            '<div class="col-md-12">'+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-info" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.lahan_master[0].KETINGGIAN_BANGUNAN_MAKSIMUM +' </span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'Ketinggian'+ 
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class = "row">'+    
                                            '<div class="col-md-12">'+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-light-blue-gradient" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.lahan_master[0].KDH_MINIMAL +' </span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'KDH Min'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class = "row">'+    
                                            '<div class="col-md-12">'+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-yellow" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.lahan_master[0].NAMA_KLASIFIKASI +'</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'Klasifikasi'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class = "row">'+    
                                            '<div class="col-md-12">'+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-red" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.lahan_master[0].KAWASAN_PERUNTUKAN +' </span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'Peruntukkan'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class = "row">'+    
                                            '<div class="col-md-12">'+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.lahan_master[0].ZONA +' </span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'Zona'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class = "row">'+    
                                            '<div class="col-md-12">'+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.lahan_master[0].SUBZONA +' </span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            'Subzona'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'
                                    );    
                                }

                                $('#carousel_inner_informasi').html(''); 
                                $('#carousel_indicators_informasi').html('');
                                if (data.img_lahan != null){
                                    for(i=0; i<data.img_lahan.length; i++){
                                        if(i==0){
                                            $('#carousel_indicators_informasi').append(
                                                '<li data-target="#CarouselInformasi" data-slide-to="'+ i +'" class="active"></li>'
                                            );
                                        }else{
                                            $('#carousel_indicators_informasi').append(
                                                '<li data-target="#CarouselInformasi" data-slide-to="'+ i +'"></li>'
                                            );
                                        }
                                    }
                                    
                                    for(i=0; i<data.img_lahan.length; i++){
                                        if(i==0){
                                            $('#carousel_inner_informasi').append(
                                                '<div class="item active" style = "height:401px;margin: 0 auto;">'+
                                                    '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets'+ data.img_lahan[i].FILE_PATH +'>'+
                                                '</div>'
                                            );
                                        }else{
                                            $('#carousel_inner_informasi').append(
                                                '<div class="item" style = "height:401px;margin: 0 auto;">'+
                                                    '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets'+ data.img_lahan[i].FILE_PATH +'>'+
                                                '</div>'
                                            );
                                        }
                                    }

                                    $('#carousel_controls_informasi').html(
                                        '<a class="carousel-control left" href="#CarouselInformasi" data-slide="prev">'+
                                            '<span class="glyphicon glyphicon-chevron-left"></span>'+
                                        '</a>'+
                                        '<a class="carousel-control right" href="#CarouselInformasi" data-slide="next">'+
                                            '<span class="glyphicon glyphicon-chevron-right"></span>'+
                                        '</a>'
                                    );
                                }else{
                                    $('#carousel_inner_informasi').append(
                                        '<div class="item active" style = "height:401px;margin: 0 auto;">'+
                                            '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/img/gis_img/telkom-gbr-tkd-sedia.png>'+
                                        '</div>'
                                    );
                                }
                                
                                $('#data_table_kepemilikan').html('');
                                if (data.kepemilikan != null){
                                    for(i=0; i<data.kepemilikan.length; i++){
                                        var btn_att_sertipikat = '';
                                        for(k=0;k<data.att_sertipikat[i].length;k++){
                                            var file_size = data.att_sertipikat[i][k].FILE_SIZE/1000000;
                                            btn_att_sertipikat += '<a class = "btn btn-primary pull-right" href=baseUrl+"/gis/assets'+data.att_sertipikat[i][k].FILE_PATH+'" download='+data.att_sertipikat[i][k].NAMA_DOKUMEN+'> <i class="fa fa-download"></i> '+data.att_sertipikat[i][k].NAMA_DOKUMEN+' ('+file_size.toFixed(2)+' MB) </a>';
                                        }
                                        $('#data_table_kepemilikan').append(
                                            '<table class="table table-bordered table-striped">'+
                                                '<thead>'+
                                                '<tr style="background-color: red;color:#ffffff;">'+
                                                    '<th>No. Sertifikat : </th>'+
                                                    '<th>'+ data.kepemilikan[i].NO_SERTIPIKAT +'</th>'+
                                                '</tr>'+
                                                '</thead>'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td>Atas Nama</td>'+
                                                        '<td>'+ data.kepemilikan[i].ATAS_NAMA +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>SK Hak</td>'+
                                                        '<td>'+ data.kepemilikan[i].SKHAK +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Luas (m2)</td>'+
                                                        '<td>'+ sepNum(data.kepemilikan[i].LUAS) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Kepemilikan</td>'+
                                                        '<td> </td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Jatuh Tempo</td>'+
                                                        '<td>'+ data.kepemilikan[i].TANGGAL_AKHIR +'</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'+
                                            btn_att_sertipikat
                                        );
                                    }
                                }    
                                
                                $('#pbb').html('');
                                if (data.pbb != null){
                                    for(i=0; i<data.pbb.length; i++){
                                        $('#pbb').append(
                                            '<table class="table table-bordered table-striped">'+
                                                '<thead>'+
                                                '<tr style="background-color: red;color:#ffffff;">'+
                                                    '<th>CFA NDP : </th>'+
                                                    '<th>'+ data.pbb[i].NOP +'</th>'+
                                                '</tr>'+
                                                '</thead>'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td>Tahun</td>'+
                                                        '<td>'+ data.pbb[i].TAHUN +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Luas Bumi (m2) </td>'+
                                                        '<td>'+ sepNum(data.pbb[i].LUAS_LAHAN_BUMI) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>NJOP Bumi (Rp/m2)</td>'+
                                                        '<td>'+ sepNum(data.pbb[i].NJOP_BUMI) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Kelas Bumi</td>'+
                                                        '<td> '+ data.pbb[i].KELAS_BUMI +' </td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Total NJOP Bumi (Rp) </td>'+
                                                        '<td>'+ sepNum(data.pbb[i].TOTAL_NJOP_BUMI) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Total NJOP (Rp) </td>'+
                                                        '<td>  </td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'
                                        );
                                    }
                                }    

                                if (data.nilai_aset != null){
                                    $('#nilai_aset_lahan').html(
                                        '<table class="table table-bordered table-striped">'+
                                            '<tr>'+
                                                '<td>Nilai Akuisisi</td>'+
                                                '<td>'+ sepNum(data.nilai_aset[0].HARGA_PEROLEHAN) +'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Nilai KJPP</td>'+
                                                '<td>'+ sepNum(data.nilai_aset[0].HARGA) +'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Pelaku KJPP</td>'+
                                                '<td>'+ data.nilai_aset[0].NAMA +'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Tanggal KJPP</td>'+
                                                '<td> '+ data.nilai_aset[0].TANGGAL +' </td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Nilai</td>'+
                                                '<td>'+ sepNum(data.nilai_aset[0].NILAI_BUKU) +'</td>'+
                                            '</tr>'+
                                        '</table>'
                                    );
                                }

                                $('#NKA').html('');    
                                if (data.nka != null){                           
                                    for(i=0; i<data.nka.length; i++){
                                        $('#NKA').append(
                                            '<table class="table table-bordered table-striped">'+
                                                '<thead>'+
                                                    '<tr style="background-color: red;color:#ffffff;">'+
                                                        '<th>NKA : </th>'+
                                                        '<th>'+ data.nka[i].NOMOR_KARTU_ASET +'</th>'+
                                                    '</tr>'+
                                                    '<tr style="background-color: red;color:#ffffff;">'+
                                                        '<th>NAK : </th>'+
                                                        '<th>'+ data.nka[i].NOMOR_ANAK_KARTU +'</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td>Deskripsi</td>'+
                                                        '<td>'+ data.nka[i].DESKRIPSI +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Tanggal</td>'+
                                                        '<td>'+ data.nka[i].TANGGAL +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Harga Perolehan</td>'+
                                                        '<td>'+ sepNum(data.nka[i].NILAI_HARGA_PEROLEHAN) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Ak. Penyusutan</td>'+
                                                        '<td> '+ sepNum(data.nka[i].AKUMULASI_PENYUSUTAN) +' </td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>B. Penyusutan</td>'+
                                                        '<td>'+ sepNum(data.nka[i].BEBAN_PENYUSUTAN) +'</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'
                                        );
                                    }
                                }    

                                $('#informasi_lahan').modal('show');
                                
                            break;
                            case 'modalPetaInformasiAsetBangunan':
                                console.log(data);

                                if (data.gedung_master != null){
                                    $('#header_modal_informasi_bangunan').html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                    '<h4 class="modal-title">'+ data.gedung_master[0].NAMA_GEDUNG +' <small> #'+ data.gedung_master[0].IDGEDUNG +' '+ data.gedung_master[0].ALAMAT +' </small></h4>'
                                    );

                                    $('#thead_modal_informasi_bangunan').html(
                                        '<tr style="background-color: red;color:#ffffff;">'+
                                            '<th>ID GEDUNG</th>'+
                                            '<th>'+ data.gedung_master[0].IDGEDUNG +'</th>'+
                                        '</tr>'
                                    );
        
                                    $('#tbody_modal_informasi_bangunan').html(
                                        '<tr>'+
                                            '<td>Koordinat</td>'+
                                            '<td>'+ data.gedung_master[0].COOR_Y +', '+ data.gedung_master[0].COOR_X +'</td>'+
                                        '</tr>'+	
                                        '<tr>'+
                                            '<td>Alamat</td>'+
                                            '<td>'+ data.gedung_master[0].ALAMAT +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Kelurahan</td>'+
                                            '<td>'+ data.gedung_master[0].DESA +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Kecamatan</td>'+
                                            '<td>'+ data.gedung_master[0].KECAMATAN +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Kota</td>'+
                                            '<td>'+ data.gedung_master[0].KOTA +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Provinsi</td>'+
                                            '<td>'+ data.gedung_master[0].PROPINSI +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Regional</td>'+
                                            '<td>'+ data.gedung_master[0].TREG +'</td>'+
                                        '</tr>'+
                                        
                                        '<tr>'+
                                            '<td>Witel</td>'+
                                            '<td>'+ data.gedung_master[0].WITEL +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Area GSD</td>'+
                                            '<td>'+ data.gedung_master[0].UNIT_GSD_ID +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Unit GSD</td>'+
                                            '<td>'+ data.gedung_master[0].UNIT_GSD +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Luas Lahan</td>'+
                                            '<td>'+ sepNum(data.gedung_master[0].LUAS_BANGUNAN) +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Luas Lahan</td>'+
                                            '<td>'+ sepNum(data.gedung_master[0].LUAS_LAHAN) +'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                            '<td>Jumlah Lantai</td>'+
                                            '<td>'+ data.gedung_master[0].JUMLAH_LANTAI +'</td>'+
                                        '</tr>'
                                    );

                                    $('#utilisasi').html('');
                                    $('#utilisasi').append(
                                        '<h3>Saleable Area : '+ data.gedung_master[0].SALEABLE_AREA +'</h3>'+
                                        '<h3>Occupancy Rate : '+ data.gedung_master[0].OCCUPACY_RATE +' (%)</h3>'+
                                        '<table class="table table-bordered table-striped">'+
                                            '<tr>'+
                                                '<td>Telkom</td>'+
                                                '<td>'+ data.gedung_master[0].OCRT_TELKOM*100 +'</td>'+
                                            '</tr>'+	
                                            '<tr>'+
                                                '<td>Telkom Group</td>'+
                                                '<td>'+ data.gedung_master[0].OCRT_TELKOMGRUP*100 +'</td>'+
                                            '</tr>'+
                                            
                                            '<tr>'+
                                                '<td>Telkomsel</td>'+
                                                '<td>'+ data.gedung_master[0].OCRT_TELKOMSEL*100 +'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Non Telkom Group</td>'+
                                                '<td>'+ data.gedung_master[0].OCRT_NONTELKOM*100 +'</td>'+
                                            '</tr>'+
                                        '</table>'
                                    );

                                    $('#izin').html('');
                                    $('#izin').append(
                                        '<table class="table table-bordered table-striped">'+
                                            '<tr>'+
                                                '<td></td>'+
                                                '<td>Tahun</td>'+
                                                '<td>Nomor</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Izin Prinsip</td>'+
                                                '<td>'+ data.gedung_master[0].NO_IJIN_PRINSIP +'</td>'+
                                                '<td>'+ data.gedung_master[0].TAHUN_IJIN_PRINSIP +'</td>'+
                                            '</tr>'+	
                                            '<tr>'+
                                                '<td>Izin Lokasi</td>'+
                                                '<td>'+ data.gedung_master[0].NO_IJIN_LOKASI +'</td>'+
                                                '<td>'+ data.gedung_master[0].TAHUN_IJIN_LOKASI +'</td>'+
                                            '</tr>'+
                                            
                                            '<tr>'+
                                                '<td>Izin IPPT</td>'+
                                                '<td>'+ data.gedung_master[0].NO_IJIN_IPPT +'</td>'+
                                                '<td>'+ data.gedung_master[0].TAHUN_IJIN_IPPT +'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>IMB</td>'+
                                                '<td>'+ data.gedung_master[0].NO_IMB +'</td>'+
                                                '<td>'+ data.gedung_master[0].TANGGAL_IMB +'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>SLF</td>'+
                                                '<td></td>'+
                                                '<td></td>'+
                                            '</tr>'+
                                        '</table>'
                                    );

                                    if(typeof data.img_gedung === 'undefined' || !data.img_gedung){
                                        var foto_aset = '/img/gis_img/telkom-gbr-tkd-sedia.png';
                                    }else{
                                        var foto_aset = data.img_gedung[0].FILE_PATH;
                                    }  
                                }

                                $('#carousel_inner_informasi_gedung').html(''); 
                                $('#carousel_indicators_informasi_gedung').html('');
                                if (data.img_gedung != null){
                                    for(i=0; i<data.img_gedung.length; i++){
                                        if(i==0){
                                            $('#carousel_indicators_informasi_gedung').append(
                                                '<li data-target="#CarouselInformasiGedung" data-slide-to="'+ i +'" class="active"></li>'
                                            );
                                        }else{
                                            $('#carousel_indicators_informasi_gedung').append(
                                                '<li data-target="#CarouselInformasiGedung" data-slide-to="'+ i +'"></li>'
                                            );
                                        }
                                    }
                            
                                    for(i=0; i<data.img_gedung.length; i++){
                                        if(i==0){
                                            $('#carousel_inner_informasi_gedung').append(
                                                '<div class="item active" style = "height:401px;margin: 0 auto;">'+
                                                    '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets'+ data.img_gedung[i].FILE_PATH +'>'+
                                                '</div>'
                                            );
                                        }else{
                                            $('#carousel_inner_informasi_gedung').append(
                                                '<div class="item" style = "height:401px;margin: 0 auto;">'+
                                                    '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets'+ data.img_gedung[i].FILE_PATH +'>'+
                                                '</div>'
                                            );
                                        }
                                    }

                                    $('#carousel_controls_informasi_gedung').html(
                                        '<a class="carousel-control left" href="#CarouselInformasiGedung" data-slide="prev">'+
                                            '<span class="glyphicon glyphicon-chevron-left"></span>'+
                                        '</a>'+
                                        '<a class="carousel-control right" href="#CarouselInformasiGedung" data-slide="next">'+
                                            '<span class="glyphicon glyphicon-chevron-right"></span>'+
                                        '</a>'
                                    );
                                }else{
                                    $('#carousel_inner_informasi_gedung').append(
                                        '<div class="item" style = "height:401px;margin: 0 auto;">'+
                                            '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/img/gis_img/telkom-gbr-tkd-sedia.png>'+
                                        '</div>'
                                    );
                                }
                                
                                $('#pbb_gedung').html('');
                                if (data.pbb != null){
                                    for(i=0; i<data.pbb.length; i++){
                                        $('#pbb').append(
                                            '<table class="table table-bordered table-striped">'+
                                                '<thead>'+
                                                '<tr style="background-color: red;color:#ffffff;">'+
                                                    '<th>NOP : </th>'+
                                                    '<th>'+ data.pbb[i].NOP +'</th>'+
                                                '</tr>'+
                                                '</thead>'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td>Tahun</td>'+
                                                        '<td>'+ data.pbb[i].TAHUN +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Luas Bangunan (m2) </td>'+
                                                        '<td>'+ sepNum(data.pbb[i].LUAS_BANGUNAN) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>NJOP Bangunan (Rp/m2)</td>'+
                                                        '<td>'+ sepNum(data.pbb[i].NJOP_BANGUNAN) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Kelas Bangunan</td>'+
                                                        '<td> '+ data.pbb[i].KELAS_BANGUNAN +' </td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Total NJOP Bangunan (Rp) </td>'+
                                                        '<td>'+ sepNum(data.pbb[i].TOTAL_NJOP_BANGUNAN) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Total PBB yang Dibayarkan (Rp) </td>'+
                                                        '<td>'+ sepNum(data.pbb[i].TOTAL_PBB_DIBAYAR) +'</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'
                                        );
                                    }
                                }   

                                $('#NKA_gedung').html('');    
                                if (data.nka != null){                           
                                    for(i=0; i<data.nka.length; i++){
                                        $('#NKA_gedung').append(
                                            '<table class="table table-bordered table-striped">'+
                                                '<thead>'+
                                                    '<tr style="background-color: red;color:#ffffff;">'+
                                                        '<th>NKA : </th>'+
                                                        '<th>'+ data.nka[i].NOMOR_KARTU_ASET +'</th>'+
                                                    '</tr>'+
                                                    '<tr style="background-color: red;color:#ffffff;">'+
                                                        '<th>NAK : </th>'+
                                                        '<th>'+ data.nka[i].NOMOR_ANAK_KARTU +'</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td>Deskripsi</td>'+
                                                        '<td>'+ data.nka[i].DESKRIPSI +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Tanggal</td>'+
                                                        '<td>'+ data.nka[i].TANGGAL +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Nilai Harga Perolehan (Rp)</td>'+
                                                        '<td>'+ sepNum(data.nka[i].NILAI_HARGA_PEROLEHAN) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Akumulasi Penyusutan (Rp)</td>'+
                                                        '<td> '+ sepNum(data.nka[i].AKUMULASI_PENYUSUTAN) +' </td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Beban Penyusutan (Rp)</td>'+
                                                        '<td>'+ sepNum(data.nka[i].BEBAN_PENYUSUTAN) +'</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'
                                        );
                                    }
                                }   
                                
                                $('#listrik').html('');
                                if (data.listrik != null){
                                    for(i=0; i<data.listrik.length; i++){
                                        $('#listrik').append(
                                            '<table class="table table-bordered table-striped">'+
                                                '<thead>'+
                                                '<tr style="background-color: red;color:#ffffff;">'+
                                                    '<th>ID Pelanggan : </th>'+
                                                    '<th>'+ data.listrik[i].ID_PELANGGAN +'</th>'+
                                                '</tr>'+
                                                '</thead>'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td>Tanggal</td>'+
                                                        '<td>'+ data.listrik[i].TANGGAL +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Jumlah Pemakaian </td>'+
                                                        '<td>'+ sepNum(data.listrik[i].JUMLAH_PEMAKAIAN) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Biaya Listrik</td>'+
                                                        '<td>'+ sepNum(data.listrik[i].BIAYA_LISTRIK) +'</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'
                                        );
                                    }
                                } 
                                
                                $('#air').html('');
                                if (data.listrik != null){
                                    for(i=0; i<data.listrik.length; i++){
                                        $('#air').append(
                                            '<table class="table table-bordered table-striped">'+
                                                '<thead>'+
                                                '<tr style="background-color: red;color:#ffffff;">'+
                                                    '<th>ID Pelanggan : </th>'+
                                                    '<th>'+ data.listrik[i].ID_PELANGGAN +'</th>'+
                                                '</tr>'+
                                                '</thead>'+
                                                '<tbody>'+
                                                    '<tr>'+
                                                        '<td>Tanggal</td>'+
                                                        '<td>'+ data.listrik[i].TANGGAL +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Jumlah Pemakaian </td>'+
                                                        '<td>'+ sepNum(data.listrik[i].JUMLAH_PEMAKAIAN) +'</td>'+
                                                    '</tr>'+
                                                    '<tr>'+
                                                        '<td>Biaya Air</td>'+
                                                        '<td>'+ sepNum(data.listrik[i].BIAYA_AIR) +'</td>'+
                                                    '</tr>'+
                                                '</tbody>'+
                                            '</table>'
                                        );
                                    }
                                } 

                                $('#informasi_gedung').modal('show');
                                
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

        
        $('#btnDaftarAset').click(function(){
            if($("#collapseDaftarAset").is(":hidden")){
                $("#collapseDaftarAset").slideDown("slow");
                daftarAsetMap(); 
            }else{
                $("#collapseDaftarAset").slideUp("slow");
            }
        });

        
        $("#collapseDaftarAset").on('click', '.detailDaftarAset', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        });

        $("#table_aset_filter").on('click', '.detailDaftarAsetGedung', function (e) {
            e.preventDefault(); 
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            var data_gedung = _.where(data_aset_gedung_global, {IDAREAL: id_lahan});
            console.log(data_gedung);
            if($(this).closest('.panel-body').find('.detailGedungPerLahanMap').is(':empty')) {
                for(i=0;i<data_gedung.length;i++){
                    if(typeof data_gedung[i].FILE_PATH === 'undefined' || !data_gedung[i].FILE_PATH){
                        var path_gedung_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                    }else{
                        var path_gedung_image = data.data_gedung[i].FILE_PATH;
                    }
                    $(this).closest('.panel-body').find('.detailGedungPerLahanMap').append(
                        '<div class="panel panel-dafault pull-left" style = "width:30vw;">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-body">'+
                                    '<div class="row" >'+
                                        "<div class = 'col-md-3'>"+
                                            '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_gedung_image +'>'+
                                            '<br><a href="#" style="margin-right: 15px;" class="detailFilterBangunan pull-right">'+
                                                '<i class="fa fa-info-circle" style="width:15px;"></i>'+
                                            '</a>'+
                                        "</div>"+
                                        '<div class="col-md-9">'+
                                            '<b>id gedung : #<span class = "idgedung_daftar_aset">'+ data_gedung[i].IDGEDUNG +'</span></b><br>'+
                                            '<br><b>'+ data_gedung[i].NAMA_GEDUNG +'</b>'+
                                            '<br>'+ data_gedung[i].ALAMAT +
                                            '<br> Luas Bangunan : '+ data_gedung[i].LUAS_BANGUNAN +' m2'+
                                            '<br> Penggunaan : '+ data_gedung[i].OCRT_TELKOM +' %'+
                                            '<br> Jumlah Lantai : '+ data_gedung[i].JUMLAH_LANTAI +
                                            '<br> Saleable Area : '+ data_gedung[i].SALEABLE_AREA +' m'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                }
            }else{
                $(this).closest('.panel-body').find('.detailGedungPerLahanMap').html('');
            }
        });

        $("#table_aset_filter").on('click', '.detailDaftarAsetLahan', function (e) {
            e.preventDefault(); 
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            var data_lahan = _.where(data_aset_lahan_global, {IDAREAL: id_lahan});
            console.log(id_lahan,data_lahan);
            if($(this).closest('.panel-body').find('.detailLahanPerGedungMap').is(':empty')) {
                for(i=0;i<data_lahan.length;i++){
                    if(typeof data_lahan[i].FILE_PATH === 'undefined' || !data_lahan[i].FILE_PATH){
                        var path_lahan_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                    }else{
                        var path_lahan_image = data_lahan[i].FILE_PATH;
                    }
                    $(this).closest('.panel-body').find('.detailLahanPerGedungMap').append(
                        '<div class="panel panel-dafault pull-left" style = "width:30vw;">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-body">'+
                                    "<div class = 'col-md-3'>"+
                                        '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_lahan_image +'>'+
                                        '<br><a href="#" style="font-size:10px;margin-right: 15px;" class="detailDaftarAset pull-right">'+
                                            '<i class="fa fa-info-circle" style="width:15px;"></i>'+
                                        '</a><br>'+
                                    "</div>"+
                                    '<div class="col-md-9" style="font-size: 10px">'+
                                        '<b>id lahan : #<span class = "idareal_daftar_aset">'+ data_lahan[i].IDAREAL +'</span></b>'+
                                        '<br><b>'+ data_lahan[i].NAMA_LAHAN +'</b>'+
                                        '<br>'+ data_lahan[i].ALAMAT +
                                        '<br> Luas Lahan : '+ data_lahan[i].LUAS_LAHAN +' m2'+
                                        '<br> Penggunaan : '+ data_lahan[i].OCCUPACY_RATE +' %'+
                                        '<br> Klasifikasi : '+ data_lahan[i].NAMA_KLASIFIKASI +
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                }
            }else{
                $(this).closest('.panel-body').find('.detailLahanPerGedungMap').html('');
            }
        });

        $("#collapseDaftarAset").on('click', '.detailDaftarAsetGedung', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            var data_gedung = _.where(data_aset_gedung_global, {IDAREAL: id_lahan});
            console.log(data_gedung);
            if($(this).closest('.panel-body').find('.detailGedungPerLahanMap').is(':empty')) {
                for(i=0;i<data_gedung.length;i++){
                    if(typeof data_gedung[i].FILE_PATH === 'undefined' || !data_gedung[i].FILE_PATH){
                        var path_gedung_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                    }else{
                        var path_gedung_image = data.data_gedung[i].FILE_PATH;
                    }
                    $(this).closest('.panel-body').find('.detailGedungPerLahanMap').append(
                        '<div class="panel panel-dafault pull-left" style = "width:18vw;">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-body">'+
                                    '<div class="row" >'+
                                        "<div class = 'col-md-3'>"+
                                            '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_gedung_image +'>'+
                                            '<br><a href="#" style="font-size:10px;margin-right: 15px;" class="detailFilterBangunan pull-right">'+
                                                '<i class="fa fa-info-circle" style="width:15px;"></i>'+
                                            '</a>'+
                                        "</div>"+
                                        '<div class="col-md-9" style="font-size: 10px">'+
                                            '<b>id gedung : #<span class = "idgedung_daftar_aset">'+ data_gedung[i].IDGEDUNG +'</span></b><br>'+
                                            '<br><b>'+ data_gedung[i].NAMA_GEDUNG +'</b>'+
                                            '<br>'+ data_gedung[i].ALAMAT +
                                            '<br> Luas Bangunan : '+ data_gedung[i].LUAS_BANGUNAN +' m2'+
                                            '<br> Penggunaan : '+ data_gedung[i].OCRT_TELKOM +' %'+
                                            '<br> Jumlah Lantai : '+ data_gedung[i].JUMLAH_LANTAI +
                                            '<br> Saleable Area : '+ data_gedung[i].SALEABLE_AREA +' m'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                }
            }else{
                $(this).closest('.panel-body').find('.detailGedungPerLahanMap').html('');
            }
        });

        $("#collapseDaftarAset").on('click', '.detailDaftarAsetLahan', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            var data_lahan = _.where(data_aset_lahan_global, {IDAREAL: id_lahan});
            console.log(id_lahan,data_lahan);
            if($(this).closest('.panel-body').find('.detailLahanPerGedungMap').is(':empty')) {
                for(i=0;i<data_lahan.length;i++){
                    if(typeof data_lahan[i].FILE_PATH === 'undefined' || !data_lahan[i].FILE_PATH){
                        var path_lahan_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                    }else{
                        var path_lahan_image = data_lahan[i].FILE_PATH;
                    }
                    $(this).closest('.panel-body').find('.detailLahanPerGedungMap').append(
                        '<div class="panel panel-dafault pull-left" style = "width:18vw;">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-body">'+
                                    "<div class = 'col-md-3'>"+
                                        '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_lahan_image +'>'+
                                        '<br><a href="#" style="font-size:10px;margin-right: 15px;" class="detailDaftarAset pull-right">'+
                                            '<i class="fa fa-info-circle" style="width:15px;"></i>'+
                                        '</a><br>'+
                                    "</div>"+
                                    '<div class="col-md-9" style="font-size: 10px">'+
                                        '<b>id lahan : #<span class = "idareal_daftar_aset">'+ data_lahan[i].IDAREAL +'</span></b>'+
                                        '<br><b>'+ data_lahan[i].NAMA_LAHAN +'</b>'+
                                        '<br>'+ data_lahan[i].ALAMAT +
                                        '<br> Luas Lahan : '+ data_lahan[i].LUAS_LAHAN +' m2'+
                                        '<br> Penggunaan : '+ data_lahan[i].OCCUPACY_RATE +' %'+
                                        '<br> Klasifikasi : '+ data_lahan[i].NAMA_KLASIFIKASI +
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                }
            }else{
                $(this).closest('.panel-body').find('.detailLahanPerGedungMap').html('');
            }
        });

        $("#daftar_aset_dash").on('click', '.detailDaftarAset', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        }); 

        $(".InfoWindowLahan").on('click', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        });

        $("#box_aset_potensi").on('click', '.detailFilter', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        });

        $("#box_aset_potensi").on('click', '.detailFilterBangunan', function () {
            var id_gedung = $(this).closest('.panel-body').find('.idgedung_daftar_aset').text();
            loadData('modalPetaInformasiAsetBangunan',"GET","{{ url('sima-dash/detail-bangunan') }}", {'id_gedung': id_gedung});
        });

        $("#box_aset_potensi").on('click', '.detailDaftarAset', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        });

        $("#collapseDaftarAset").on('click', '.detailFilterBangunan', function () {
            var id_gedung = $(this).closest('.panel-body').find('.idgedung_daftar_aset').text();
            loadData('modalPetaInformasiAsetBangunan',"GET","{{ url('sima-dash/detail-bangunan') }}", {'id_gedung': id_gedung});
        });

        $(".InfoWindowGedung").on('click', function () {
            alert('iy');
            // var id_gedung = $(this).find('.idareal_daftar_aset').text();
            // loadData('modalPetaInformasiAsetBangunan',"GET","{{ url('sima-dash/detail-bangunan') }}", {'id_gedung': id_gedung});
        });

        $("#box_aset_inv").on('click', '.detailFilter', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        });

        $("#box_aset_util").on('click', '.detailFilter', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        });

        $("#daftar_aset_dash").on('click', '.detailDaftarAset', function () {
            var id_lahan = $(this).closest('.panel-body').find('.idareal_daftar_aset').text();
            loadData('modalPetaInformasiAset',"GET","{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        });

        function daftarAsetMap(){
            var id_reg_global = $('#dash_regional option:selected').val();
            var witel = $('#dash_witel option:selected').val();

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
            var arr_ck_jenis_aset = [];
            $('.ck_jenis_aset:checked').each(function(){
                var val = $(this).val();
                arr_ck_jenis_aset.push(val);
            });
            if ($('input.on_off_slider').is(':checked')) {
                var filter_luas_lahan = $('#slider_luas_lahan').data('bootstrapSlider').getValue();
            }else{
                var filter_luas_lahan = 99999999999999999999999999999999;
            }

            if(typeof id_reg_global !== 'undefined' || id_reg_global){
                var filter_data = {'search_key': $('#textboxt_cari_aset').val(), 'dash_id': id_reg_global, 'dash_fm' : id_gsd_global, 'dash_witel' : witel, 'jenis_aset' : arr_ck_jenis_aset, 'luas_lahan' : filter_luas_lahan, 'status_kepemilikan' : arr_ck_milik, 'peruntukkan' : arr_ck_peruntukkan };

                // console.log(filter_data);
                loadData('GetDaftarAsetMap',"GET","{{ url('sima-dash/daftar-aset') }}", filter_data);
            }
        }

        function prosesFilterKananAtas(){
            if($('#dashboard_page_map').length){
                if($("#collapseDaftarAset").is(":hidden")){
                    $("#collapseDaftarAset").slideDown("slow");
                    daftarAsetMap(); 
                }else{
                    daftarAsetMap(); 
                }
            }else if($('#dashboard_page_aset_detaillahan').length){
                dash_detail_lahan(1);
            }else if($('#dashboard_page_aset_detailbangunan').length){
                dash_detail_bangunan(1);
            }
        }

        $('#dash_map_filter').click(function(){
            prosesFilterKananAtas();
        });

        $('.ck_jenis_aset').click(function(){
            prosesFilterKananAtas();
        });

        $('.on_off_slider').click(function(){
            $('.slider_luas_lahan_bangunan').toggle();
        });

        $('.ck_milik').click(function(){
            prosesFilterKananAtas();
        });

        $('.ck_peruntukkan').click(function(){
            prosesFilterKananAtas();
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
    
        $('#slider_luas_lahan').bootstrapSlider({
            formatter: function(value) {
                return 'Current value: ' + value + ' m2';
            }
        });

        $('#slider_luas_lahan').slider().on('slideStart', function(value){
            rangeSliderValStart = $('#slider_luas_lahan').data('bootstrapSlider').getValue();
        });

        $('#slider_luas_lahan').slider().on('slideStop', function(value){
            var newVal = $('#slider_luas_lahan').data('bootstrapSlider').getValue();
            if(rangeSliderValStart != newVal) {
                prosesFilterKananAtas();
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

        //informasi dengan peta 

        $('#btn_link_peta').click(function(){
            if($("#map_dashboard").is(":hidden")){
                $("#map_dashboard").slideDown("slow"); 
                get_sebaran_aset_lahan();
            }else{
                $("#map_dashboard").slideUp("slow");
            }   
        });

        //daftar aset
        $('#btn_daftar_aset_dash').click(function(){
            if($("#daftar_aset_dash").is(":hidden")){
                $("#daftar_aset_dash").slideDown("slow"); 
                // get_sebaran_aset_lahan();
            }else{
                $("#daftar_aset_dash").slideUp("slow");
            }   
        });

        // detail alert system

        $('#detail_lokasi_aset_Sengketa').click(function(){
            var reg = $('#dash_regional option:selected').val();
            var gsd = $('#dash_gsd option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel, 'alert_system' : 'lokasi_aset_sengketa'};
            loadData('detailAlertSystem','GET',"{{ url('sima-dash/detail-alert-system') }}", filter_data);
        });

        $('#detail_lokasi_aset_potensi_sengketa').click(function(){
            var reg = $('#dash_regional option:selected').val();
            var gsd = $('#dash_gsd option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel, 'alert_system' : 'lokasi_aset_potensi_sengketa'};
            loadData('detailAlertSystem', 'GET',"{{ url('sima-dash/detail-alert-system') }}", filter_data);
        });

        $('#detail_sertifikat_jatuh_tempo').click(function(){
            var reg = $('#dash_regional option:selected').val();
            var gsd = $('#dash_gsd option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel, 'alert_system' : 'sertifikat_jatuh_tempo'};
            loadData('detailAlertSystem', 'GET',"{{ url('sima-dash/detail-alert-system') }}",filter_data);
        });

        $('#detail_perizinan').click(function(){
            var reg = $('#dash_regional option:selected').val();
            var gsd = $('#dash_gsd option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel, 'alert_system' : 'perizinan'};
            loadData('detailAlertSystem', 'GET',"{{ url('sima-dash/detail-alert-system') }}", filter_data);
        });

        $("#textboxt_cari_aset").keyup(function(e){
            var value = String.fromCharCode(e.which) || e.key;

            if (e.which == 13) {
                if($('#dashboard_page_map').length){
                    if($("#collapseDaftarAset").is(":hidden")){
                        $("#collapseDaftarAset").slideDown("slow"); 
                    }
                    daftarAsetMap();
                }else if($('#dashboard_page_aset_detaillahan').length){
                    dash_detail_lahan(1);
                }else if($('#dashboard_page_aset_detailbangunan').length){
                    dash_detail_bangunan(1);
                }else{
                    var jenis_aset = $('input[name=radio_jenis_aset]:checked').val();
                    var keyword = $('#textboxt_dash_cari_aset').val();
                    var reg = $('#dash_regional option:selected').val();
                    var witel = $('#dash_witel option:selected').val();
                    if(jenis_aset == 'lahan'){
                        window.location = baseUrl+"/gis/index.php/dbaset/Index/detailLahanSearch/~"+keyword+"~"+reg+"~"+witel;
                    }else{
                        window.location = baseUrl+"/gis/index.php/dbaset/Index/detailBangunanSearch/~"+keyword+"~"+reg+"~"+witel;
                    }
                }
                
            }
        });

        $('#btn_peta_search_aset').click(function(){
            // var item_selected = $('#search_peta_nasional')[0].selectize.getValue();
            // if(item_selected != ''){
            $('#collapseDaftarAset').html('');                            
            var filter_data = {'search_key': $('#textboxt_cari_aset').val()}; //index post : value
            loadData('PetaSearchLahan', baseUrl+"/gis/index.php/dbaset/AjaxService/searchMap/", filter_data);
            // }
        });

        $('#dash_search_in_list').on('click', '#btn_peta_search_in_daftar_aset', function(){
            search_key = $('#textboxt_cari_aset_in_daftar').val();
            // console.log(daftar_aset_dash);
            var search_result = $.grep(daftar_aset_dash, function(v) {
                var res1 = false;
                var res2 = false;
                var res3 = false;
                var res4 = false;
                if(typeof v.NAMA_LAHAN != 'undefined'){
                    var patt = new RegExp(search_key.toLowerCase());
                    res1 = patt.test(v.NAMA_LAHAN.toLowerCase());
                }

                if(typeof v.ALAMAT != 'undefined'){
                    var patt = new RegExp(search_key.toLowerCase());
                    res2 = patt.test(v.ALAMAT.toLowerCase());
                }

                if(typeof v.IDAREAL != 'undefined'){
                    var patt = new RegExp(search_key.toLowerCase());
                    res3 = patt.test(v.IDAREAL.toLowerCase());
                }

                if(res1 || res2 || res3){
                    return v.NAMA_LAHAN;
                }
                // return v.NAMA_LAHAN === search_key;
            });
            daftar_aset_dash_filtered = search_result;
            listDaftarAsetDash(daftar_aset_dash_filtered,back = true);   
        });

        $('#dash_search_in_list').bind('keyup', '#btn_peta_search_in_daftar_aset', function(e) {
            var value = String.fromCharCode(e.which) || e.key;

            if (e.which == 13) {
                search_key = $('#textboxt_cari_aset_in_daftar').val();

                var search_result = $.grep(daftar_aset_dash, function(v) {
                    var res1 = false;
                    var res2 = false;
                    var res3 = false;
                    var res4 = false;
                    if(typeof v.NAMA_LAHAN != 'object'){
                        var patt = new RegExp(search_key.toLowerCase());
                        res1 = patt.test(v.NAMA_LAHAN.toLowerCase());
                    }
                    
                    if(typeof v.ALAMAT != 'object'){
                        var patt = new RegExp(search_key.toLowerCase());
                        res2 = patt.test(v.ALAMAT.toLowerCase());
                    }

                    if(typeof v.IDAREAL != 'object'){
                        var patt = new RegExp(search_key.toLowerCase());
                        res3 = patt.test(v.IDAREAL.toLowerCase());
                    }

                    if(res1 || res2 || res3 || res4){
                        return v.NAMA_LAHAN;
                    }
                    // return v.NAMA_LAHAN === search_key;
                });
                daftar_aset_dash_filtered = search_result;
                listDaftarAsetDash(daftar_aset_dash_filtered,back = true);   
            }
        });

        $('#dash_search_in_list').on('click', '#btn_peta_back_search', function(){
            $('#table_aset_filter').html('');
            $('#search_key_info').html('');
            $('#dash_search_in_list').html(
                '<div class = "col-md-4">'+
                    '<input id="textboxt_cari_aset_in_daftar" type="text" class="form-control pull-right" placeholder="Search in List...">'+
                '</div>'+
                '<div class = "col-md-1">'+
                    '<a id="btn_peta_search_in_daftar_aset" class="btn btn-success"><i class="fa fa-search"></i></a>'+
                '</div>'
            );  
            data.daftar = daftar_aset_dash;
            var daftar_marker = new Array();
            for(i=0; i<5;i++){
                if(typeof data.daftar[i].id_gedung === 'undefined' || !data.daftar[i].id_gedung){
                    if(typeof data.daftar[i] != 'undefined'){
                        if(typeof data.daftar[i].FILE_PATH === 'undefined' || !data.daftar[i].FILE_PATH){
                            var path_lahan_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                        }else{
                            var path_lahan_image = data.daftar[i].FILE_PATH;
                        }
                        $('#table_aset_filter').append(
                            '<div class="panel panel-dafault pull-left" style="width:100%">'+
                                '<div class="panel panel-default">'+
                                    '<div class="panel-body">'+
                                        '<div class="row" >'+
                                            '<div class="col-md-4">'+
                                                '<img style = "width:193px;height:80px;" class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_lahan_image +'>'+
                                            '</div>'+
                                            '<div class="col-md-8">'+
                                                '<b>#<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                                '<b>'+ data.daftar[i].NAMA_LAHAN +'</b>'+
                                                '<br>'+ data.daftar[i].ALAMAT +
                                                '<br>Luas Lahan : '+ sepNum2(data.daftar[i].LUAS_LAHAN) +' m<sup style="font-size: 8px"> 2 </sup> '+
                                            '</div>'+
                                        '</div>'+
                                        '<br>'+    
                                        '<div class="row">'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ sepNum2(data.daftar[i].ocrt_telkom)+' <sup style="font-size: 8px"> % </sup> '+
                                                            '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap> Penggunaan </rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-yellow" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.daftar[i].NAMA_STATUS_KEPEMILIKAN +'</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Status Kepemilikan</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-red" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.daftar[i].NAMA_KLASIFIKASI +
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Klasifikasi Aset</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='row'>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-left: 15px;" class="detailDaftarAsetGedung pull-left">'+
                                                    '<b>Detail Gedung </b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-right: 15px;" id = "'+data.daftar[i].IDAREAL+'_'+data.daftar[i].NAMA_LAHAN+'_'+data.daftar[i].COOR_Y+'_'+data.daftar[i].COOR_X+'" class="detailFilter pull-right">'+
                                                    '<b>Detail Aset</b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                        '</div>'+
                                        "<div class='row detailGedungPerLahanMap' style='font-size:10px;margin-left: 15px;'>"+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                        daftar_marker[i] = data.daftar[i];
                    }
                }else{
                    if(typeof data.daftar != 'undefined' ){
                        if(typeof data.daftar[i].path_gedung_image === 'undefined' || !data.daftar[i].path_gedung_image){
                            var path_gedung_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                        }else{
                            var path_gedung_image = data.daftar[i].FILE_PATH;
                        }
                        $('#table_aset_filter').append(
                            '<div class="panel panel-dafault pull-left" style="width:100%">'+
                                '<div class="panel panel-default">'+
                                    '<div class="panel-body">'+
                                        '<div class="row" >'+
                                            '<div class="col-md-4">'+
                                                '<img style = "width:193px;height:80px;" class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_gedung_image +'>'+
                                            '</div>'+
                                            '<div class="col-md-8">'+
                                                '<b>id lahan : #<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                                '<b>id gedung : #<span class = "idgedung_daftar_aset">'+ data.daftar[i].id_gedung +'</span></b><br>'+
                                                '<b>'+ data.daftar[i].nama_gedung +'</b>'+
                                                '<br>'+ data.daftar[i].alamat +
                                                '<br>Luas Bangunan : '+ sepNum2(data.daftar[i].luas_bangunan) +' m<sup style="font-size: 8px"> 2 </sup> '+
                                            '</div>'+
                                        '</div>'+
                                        '<br>'+    
                                        '<div class="row">'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ sepNum2(data.daftar[i].ocrt_telkom)+' <sup style="font-size: 8px"> % </sup> '+
                                                            '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap> Penggunaan </rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-yellow" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.daftar[i].jml_lantai +' Lt'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Jumlah Lantai</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-red" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.daftar[i].saleable_area +' m'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Saleable Area</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='row'>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-left: 15px;" class="detailDaftarAsetLahan pull-left">'+
                                                    '<b>Detail Lahan </b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-right: 15px;" id = "'+data.daftar[i].IDAREAL+'_'+data.daftar[i].NAMA_LAHAN+'_'+data.daftar[i].COOR_Y+'_'+data.daftar[i].COOR_X+'" class="detailFilterBangunan pull-right">'+
                                                    '<b>Detail Aset</b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                        '</div>'+
                                        "<div class='row detailLahanPerGedungMap' style='margin-left: 15px;'>"+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                        daftar_marker[i] = data.daftar[i];
                    }
                }
            }
            var dp = $('#select_show_per_page').val();      

            if(daftar_marker.length == dp){
                $('#table_aset_filter').append(
                    'Tampil <span class="table-start-rows">1</span> Sampai <span class="table-end-rows">'+ dp +'</span> Dari <span class="table-total-row">'+(data.daftar.length)+'</span> Data'
                );
            }else{
                $('#table_aset_filter').append(
                    'Tampil <span class="table-start-rows">1</span> Sampai <span class="table-end-rows">'+ dp +'</span> Dari <span class="table-total-row">'+(daftar_marker.length)+'</span> Data'
                );
            }
            
            if(data.daftar.length % dp === 0){
                var jml_page = (data.daftar.length)/dp;
            }else{
                var jml_page = parseInt((data.daftar.length)/dp) + 1;
            }
            pagination_array_process(1,jml_page,1,2); 
            
            map_filter(daftar_marker);
        });

        function listDaftarAsetDash(data_daftar,back){
            search_key = $('#textboxt_cari_aset_in_daftar').val();
            $('#search_key_info').html('');
            $('#search_key_info').html(
                '<p>Show result for "'+search_key+'" </p>'
            );
            var back_button = '';
            if(back){
                $('#dash_search_in_list').html(
                    '<div class = "col-md-3">'+
                        '<input id="textboxt_cari_aset_in_daftar" type="text" class="form-control pull-right" placeholder="Search in List...">'+
                    '</div>'+
                    '<div class = "col-md-1">'+
                        '<a id="btn_peta_search_in_daftar_aset" class="btn btn-success"><i class="fa fa-search"></i></a>'+
                    '</div>'+
                    '<div class = "col-md-1">'+
                        '<a id="btn_peta_back_search" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>'+
                    '</div>'
                ); 
            }else{
                $('#dash_search_in_list').html(
                    '<div class = "col-md-4">'+
                        '<input id="textboxt_cari_aset_in_daftar" type="text" class="form-control pull-right" placeholder="Search in List...">'+
                    '</div>'+
                    '<div class = "col-md-1">'+
                        '<a id="btn_peta_search_in_daftar_aset" class="btn btn-success"><i class="fa fa-search"></i></a>'+
                    '</div>'
                ); 
            }
            data = Array();
            data.daftar = data_daftar;  

            var dp = $('#select_show_per_page').val();      

            $('#table_aset_filter').html('');
            var daftar_marker = new Array();
            for(i=0; i<dp;i++){
                console.log(typeof data.daftar[i].id_gedung);
                if(typeof data.daftar[i].id_gedung === 'undefined' || !data.daftar[i].id_gedung){
                    if(typeof data.daftar[i] != 'undefined'){
                        if(typeof data.daftar[i].FILE_PATH === 'undefined' || !data.daftar[i].FILE_PATH){
                            var path_lahan_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                        }else{
                            var path_lahan_image = data.daftar[i].FILE_PATH;
                        }
                        $('#table_aset_filter').append(
                            '<div class="panel panel-dafault pull-left" style="width:100%">'+
                                '<div class="panel panel-default">'+
                                    '<div class="panel-body">'+
                                        '<div class="row" >'+
                                            '<div class="col-md-4">'+
                                                '<img style = "width:193px;height:80px;" class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_lahan_image +'>'+
                                            '</div>'+
                                            '<div class="col-md-8">'+
                                                '<b>#<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                                '<b>'+ data.daftar[i].NAMA_LAHAN +'</b>'+
                                                '<br>'+ data.daftar[i].ALAMAT +
                                                '<br>Luas Lahan : '+ sepNum2(data.daftar[i].LUAS_LAHAN) +' m<sup style="font-size: 8px"> 2 </sup> '+
                                            '</div>'+
                                        '</div>'+
                                        '<br>'+    
                                        '<div class="row">'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ sepNum2(data.daftar[i].ocrt_telkom)+' <sup style="font-size: 8px"> % </sup> '+
                                                            '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap> Penggunaan </rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-yellow" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.daftar[i].NAMA_STATUS_KEPEMILIKAN +'</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Status Kepemilikan</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-red" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.daftar[i].NAMA_KLASIFIKASI +
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Klasifikasi Aset</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='row'>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-left: 15px;" class="detailDaftarAsetGedung pull-left">'+
                                                    '<b>Detail Gedung </b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-right: 15px;" id = "'+data.daftar[i].IDAREAL+'_'+data.daftar[i].NAMA_LAHAN+'_'+data.daftar[i].COOR_Y+'_'+data.daftar[i].COOR_X+'" class="detailFilter pull-right">'+
                                                    '<b>Detail Aset</b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                        '</div>'+
                                        "<div class='row detailGedungPerLahanMap' style='font-size:10px;margin-left: 15px;'>"+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                        daftar_marker[i] = data.daftar[i];
                    }
                }else{
                    if(typeof data.daftar != 'undefined' ){
                        if(typeof data.daftar[i].path_gedung_image === 'undefined' || !data.daftar[i].path_gedung_image){
                            var path_gedung_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                        }else{
                            var path_gedung_image = data.daftar[i].FILE_PATH;
                        }
                        $('#table_aset_filter').append(
                            '<div class="panel panel-dafault pull-left" style="width:100%">'+
                                '<div class="panel panel-default">'+
                                    '<div class="panel-body">'+
                                        '<div class="row" >'+
                                            '<div class="col-md-4">'+
                                                '<img style = "width:193px;height:80px;" class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_gedung_image +'>'+
                                            '</div>'+
                                            '<div class="col-md-8">'+
                                                '<b>id lahan : #<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                                '<b>id gedung : #<span class = "idgedung_daftar_aset">'+ data.daftar[i].id_gedung +'</span></b><br>'+
                                                '<b>'+ data.daftar[i].nama_gedung +'</b>'+
                                                '<br>'+ data.daftar[i].alamat +
                                                '<br>Luas Bangunan : '+ sepNum2(data.daftar[i].luas_bangunan) +' m<sup style="font-size: 8px"> 2 </sup> '+
                                            '</div>'+
                                        '</div>'+
                                        '<br>'+    
                                        '<div class="row">'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ sepNum2(data.daftar[i].ocrt_telkom)+' <sup style="font-size: 8px"> % </sup> '+
                                                            '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap> Penggunaan </rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-yellow" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.daftar[i].jml_lantai +' Lt'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Jumlah Lantai</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-red" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.daftar[i].saleable_area +' m'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Saleable Area</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='row'>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-left: 15px;" class="detailDaftarAsetLahan pull-left">'+
                                                    '<b>Detail Lahan </b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-right: 15px;" id = "'+data.daftar[i].IDAREAL+'_'+data.daftar[i].NAMA_LAHAN+'_'+data.daftar[i].COOR_Y+'_'+data.daftar[i].COOR_X+'" class="detailFilterBangunan pull-right">'+
                                                    '<b>Detail Aset</b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                        '</div>'+
                                        "<div class='row detailLahanPerGedungMap' style='margin-left: 15px;'>"+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                        daftar_marker[i] = data.daftar[i];
                    }
                }
            }

            map_filter(daftar_marker);
            
            var dp = $('#select_show_per_page').val();     
            
            if(daftar_marker.length == dp){
                $('#table_aset_filter').append(
                    'Tampil <span class="table-start-rows">1</span> Sampai <span class="table-end-rows">'+ dp +'</span> Dari <span class="table-total-row">'+(data_daftar.length)+'</span> Data'
                );
            }else{
                $('#table_aset_filter').append(
                    'Tampil <span class="table-start-rows">1</span> Sampai <span class="table-end-rows">'+ dp +'</span> Dari <span class="table-total-row">'+(daftar_marker.length)+'</span> Data'
                );
            }

            if(data_daftar.length % dp === 0){
                var jml_page = (data_daftar.length)/dp;
            }else{
                var jml_page = parseInt((data_daftar.length)/dp) + 1;
            }
            pagination_array_process(1,jml_page,1,2);      
        }

        $('#collapseDaftarAset').on('click', '#btn_peta_search_in_daftar_aset', function(){
            search_key = $('#textboxt_cari_aset_in_daftar').val();
            // console.log(daftar_aset_map);
            var search_result = $.grep(daftar_aset_map, function(v) {
                var res1 = false;
                var res2 = false;
                var res3 = false;
                var res4 = false;
                if(typeof v.NAMA_LAHAN != 'undefined'){
                    var patt = new RegExp(search_key.toLowerCase());
                    res1 = patt.test(v.NAMA_LAHAN.toLowerCase());
                }

                if(typeof v.ALAMAT != 'undefined'){
                    var patt = new RegExp(search_key.toLowerCase());
                    res2 = patt.test(v.ALAMAT.toLowerCase());
                }

                if(typeof v.IDAREAL != 'undefined'){
                    var patt = new RegExp(search_key.toLowerCase());
                    res3 = patt.test(v.IDAREAL.toLowerCase());
                }

                if(res1 || res2 || res3){
                    return v.NAMA_LAHAN;
                }
                // return v.NAMA_LAHAN === search_key;
            });
            daftar_aset_map_filtered = search_result;
            listDaftarAsetMap(daftar_aset_map_filtered,back = true);   
        });

        $('#collapseDaftarAset').bind('keyup', '#btn_peta_search_in_daftar_aset', function(e) {
            var value = String.fromCharCode(e.which) || e.key;

            if (e.which == 13) {
                search_key = $('#textboxt_cari_aset_in_daftar').val();

                var search_result = $.grep(daftar_aset_map, function(v) {
                    var res1 = false;
                    var res2 = false;
                    var res3 = false;
                    var res4 = false;
                    if(typeof v.NAMA_LAHAN != 'undefined'){
                        var patt = new RegExp(search_key.toLowerCase());
                        res1 = patt.test(v.NAMA_LAHAN.toLowerCase());
                    }

                    if(typeof v.ALAMAT != 'undefined'){
                        var patt = new RegExp(search_key.toLowerCase());
                        res2 = patt.test(v.ALAMAT.toLowerCase());
                    }

                    if(typeof v.IDAREAL != 'undefined'){
                        var patt = new RegExp(search_key.toLowerCase());
                        res3 = patt.test(v.IDAREAL.toLowerCase());
                    }

                    if(res1 || res2 || res3 || res4){
                        return v.NAMA_LAHAN;
                    }
                    // return v.NAMA_LAHAN === search_key;
                });
                daftar_aset_map_filtered = search_result;
                listDaftarAsetMap(daftar_aset_map_filtered,back = true);   
            }
        });

        $('#collapseDaftarAset').on('click', '#btn_peta_back_search', function(){
            listDaftarAsetMap(daftar_aset_map,back = false);   
        });

        function listDaftarAsetMap(data_daftar,back){
            var back_button = '';
            if(back){
                back_button =   '<div class="col-md-2">'+
                                    '<a id="btn_peta_back_search" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>'+
                                '</div>';
            }
            data = Array();
            data.daftar = data_daftar;
            $('#collapseDaftarAset').html(
                '<div class = "row">'+
                    '<div class="col-md-8">'+
                        '<input id="textboxt_cari_aset_in_daftar" type="text" class="form-control" placeholder="Ketik Nama Aset...">'+
                    '</div>'+
                    '<div class="col-md-2" style="margin-left: -30px">'+
                        '<a id="btn_peta_search_in_daftar_aset" class="btn btn-success"><i class="fa fa-search"></i></a>'+
                    '</div>'+
                    back_button +
                '</div>'
            );             
            for(i=0; i<data.daftar.length;i++){
                if(typeof data.daftar[i].id_gedung === 'undefined' || !data.daftar[i].id_gedung){
                    if(typeof data.daftar[i].FILE_PATH === 'undefined' || !data.daftar[i].FILE_PATH){
                        var path_lahan_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                    }else{
                        var path_lahan_image = data.daftar[i].FILE_PATH;
                    }
                    $('#collapseDaftarAset').append(
                        '<div class="panel panel-dafault pull-left" style = "width:22vw;">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-body">'+
                                    '<div class="row" >'+
                                        '<div class="col-md-4">'+
                                            '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_lahan_image +'>'+
                                        '</div>'+
                                        '<div class="col-md-8" style="font-size: 10px">'+
                                            '<b>id lahan : #<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                            '<b>'+ data.daftar[i].NAMA_LAHAN +'</b>'+
                                            '<br>'+ data.daftar[i].ALAMAT +
                                            '<br> Luas Lahan : '+ data.daftar[i].LUAS_LAHAN +' m2'+
                                        '</div>'+
                                    '</div>'+
                                    '<br>'+    
                                    '<div class="row">'+
                                        "<div class='col-md-4'>"+
                                            '<!-- small box -->'+
                                            '<div class="small-box bg-green" style="height: 80px">'+
                                                '<div class="inner">'+
                                                    '<h3>'+
                                                        '<span style="font-size: 15px" class="pull-right">'+ DelDecimal(data.daftar[i].OCCUPACY_RATE*100) +
                                                            '<sup style="font-size: 10px">%</sup>'+
                                                        '</span>'+
                                                    '</h3>'+
                                                    '<br>'+
                                                    '<p style="font-size: 10px">'+
                                                        '<rap>Penggunaan</rap>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='col-md-4'>"+
                                            '<!-- small box -->'+
                                            '<div class="small-box bg-yellow" style="height: 80px">'+
                                                '<div class="inner">'+
                                                    '<h3>'+
                                                        '<span style="font-size: 12px" class="pull-right">'+ data.daftar[i].NAMA_STATUS_KEPEMILIKAN +'</span>'+
                                                    '</h3>'+
                                                    '<br>'+
                                                    '<p style="font-size: 10px">'+
                                                        '<rap>Status Kepemilikan</rap>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='col-md-4'>"+
                                            '<!-- small box -->'+
                                            '<div class="small-box bg-red" style="height: 80px">'+
                                                '<div class="inner">'+
                                                    '<h3>'+
                                                        '<span style="font-size: 12px" class="pull-right"> '+ data.daftar[i].NAMA_KLASIFIKASI +' </span>'+
                                                    '</h3>'+
                                                    '<br>'+
                                                    '<p style="font-size: 10px">'+
                                                        '<rap>Klasifikasi Aset</rap>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    "<div class='row'>"+
                                        "<div class = 'col-md-6'>"+
                                            '<a href="#" style="font-size:10px;margin-left: 15px;" class="detailDaftarAsetGedung pull-left">'+
                                                '<b>Detail Gedung </b>'+
                                                '<i class="fa fa-chevron-down"></i>'+
                                            '</a>'+
                                        "</div>"+
                                        "<div class = 'col-md-6'>"+
                                            '<a href="#" style="font-size:10px;margin-right: 15px;" class="detailDaftarAset pull-right">'+
                                                '<b>Detail Aset </b>'+
                                                '<i class="fa fa-chevron-down"></i>'+
                                            '</a>'+
                                        "</div>"+
                                    '</div>'+
                                    "<div class='row detailGedungPerLahanMap' style='font-size:10px;margin-left: 15px;'>"+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                }else{
                    if(typeof data.daftar[i].FILE_PATH === 'undefined' || !data.daftar[i].FILE_PATH){
                        var path_lahan_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                    }else{
                        var path_lahan_image = data.daftar[i].FILE_PATH;
                    }
                    $('#collapseDaftarAset').append(
                        '<div class="panel panel-dafault pull-left" style = "width:22vw;">'+
                            '<div class="panel panel-default">'+
                                '<div class="panel-body">'+
                                    '<div class="row" >'+
                                        '<div class="col-md-4">'+
                                            '<img class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_lahan_image +'>'+
                                        '</div>'+
                                        '<div class="col-md-8" style="font-size: 10px">'+
                                            '<b>id lahan : #<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                            '<b>id gedung : #<span class = "idgedung_daftar_aset">'+ data.daftar[i].id_gedung +'</span></b><br>'+
                                            '<b>'+ data.daftar[i].nama_gedung +'</b>'+
                                            '<br>'+ data.daftar[i].alamat +
                                            '<br> Luas Bangunan : '+ data.daftar[i].luas_bangunan +' m2'+
                                        '</div>'+
                                    '</div>'+
                                    '<br>'+    
                                    '<div class="row">'+
                                        "<div class='col-md-4'>"+
                                            '<!-- small box -->'+
                                            '<div class="small-box bg-green" style="height: 80px">'+
                                                '<div class="inner">'+
                                                    '<h3>'+
                                                        '<span style="font-size: 15px" class="pull-right">'+ DelDecimal(data.daftar[i].OCCUPACY_RATE*100) +
                                                            '<sup style="font-size: 10px">%</sup>'+
                                                        '</span>'+
                                                    '</h3>'+
                                                    '<br>'+
                                                    '<p style="font-size: 10px">'+
                                                        '<rap>Penggunaan</rap>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='col-md-4'>"+
                                            '<!-- small box -->'+
                                            '<div class="small-box bg-yellow" style="height: 80px">'+
                                                '<div class="inner">'+
                                                    '<h3>'+
                                                        '<span style="font-size: 12px" class="pull-right">'+ DelDecimal(data.daftar[i].NET_INCOME) +' lantai</span>'+
                                                    '</h3>'+
                                                    '<br>'+
                                                    '<p style="font-size: 10px">'+
                                                        '<rap>Jumlah Lantai</rap>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='col-md-4'>"+
                                            '<!-- small box -->'+
                                            '<div class="small-box bg-red" style="height: 80px">'+
                                                '<div class="inner">'+
                                                    '<h3>'+
                                                        '<span style="font-size: 12px" class="pull-right"> '+ data.daftar[i].saleable_area +' m</span>'+
                                                    '</h3>'+
                                                    '<br>'+
                                                    '<p style="font-size: 10px">'+
                                                        '<rap>Saleable Area</rap>'+
                                                    '</p>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    "<div class='row'>"+
                                        "<div class = 'col-md-6'>"+
                                            '<a href="#" style="font-size:10px;margin-left: 15px;" class="detailDaftarAsetLahan pull-left">'+
                                                '<b>Detail Lahan </b>'+
                                                '<i class="fa fa-chevron-down"></i>'+
                                            '</a>'+
                                        "</div>"+
                                        "<div class = 'col-md-6'>"+
                                            '<a href="#" style="font-size:10px;margin-right: 15px;" class="detailFilterBangunan pull-right">'+
                                                '<b>Detail Aset</b>'+
                                                '<i class="fa fa-chevron-down"></i>'+
                                            '</a>'+
                                        "</div>"+
                                    '</div>'+
                                    "<div class='row detailLahanPerGedungMap' style='font-size:10px;margin-left: 15px;'>"+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                }
                
            }

            if($("#collapseDaftarAset").is(":hidden")){
                $("#collapseDaftarAset").slideDown("slow"); 
            }

            map_hasil_search(data.daftar);
        }

        $("#textboxt_dash_cari_aset").keyup(function(e){
            var value = String.fromCharCode(e.which) || e.key;

            if (e.which == 13) {
                var jenis_aset = $('input[name=radio_jenis_aset]:checked').val();
                var keyword = $('#textboxt_dash_cari_aset').val();
                var reg = $('#dash_regional option:selected').val();
                var witel = $('#dash_witel option:selected').val();
                if(jenis_aset == 'lahan'){
                    window.location = baseUrl+"/gis/index.php/dbaset/Index/detailLahanSearch/~"+keyword+"~"+reg+"~"+witel;
                }else{
                    window.location = baseUrl+"/gis/index.php/dbaset/Index/detailBangunanSearch/~"+keyword+"~"+reg+"~"+witel;
                }
            }
        });

        $('#btn_dash_search_aset').click(function(){
            var jenis_aset = $('input[name=radio_jenis_aset]:checked').val();
            var keyword = $('#textboxt_dash_cari_aset').val();
            var reg = $('#dash_regional option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            if(jenis_aset == 'lahan'){
                window.location = baseUrl+"/gis/index.php/dbaset/Index/detailLahanSearch/~"+keyword+"~"+reg+"~"+witel;
            }else{
                window.location = baseUrl+"/gis/index.php/dbaset/Index/detailBangunanSearch/~"+keyword+"~"+reg+"~"+witel;
            }
            // var reg = $('#dash_regional option:selected').val();
            // var gsd = $('#dash_gsd option:selected').val();
            // var witel = $('#dash_witel option:selected').val();
            // if(reg != null){
            //     var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel, 'search_key': $('#textboxt_dash_cari_aset').val()};
            //     loadData('DashSearchLahan', baseUrl+"/gis/index.php/dbaset/AjaxService/searchMap/", filter_data);
            // }
            // var item_selected = $('#search_peta_nasional')[0].selectize.getValue();
            // if(item_selected != ''){
        
            // }
        });

        $(".dash_search").on("change", function(event){        
            var dash_jenis_aset = $('#dash_jenis_aset option:selected').val();
            var dash_dasar = $('#dash_dasar option:selected').val();
            var dash_option = $('#dash_option').val();
            if(dash_jenis_aset != '' && dash_dasar != ''){
                var filter_data = {'dash_jenis_aset': dash_jenis_aset, 'dash_dasar' : dash_dasar, 'dash_option' : dash_option}; //index post : value
                loadData('DashOptionSearch', baseUrl+"/gis/index.php/dbaset/AjaxService/search_dashboard/", filter_data);
            }
        });    

        $('#dash_filter').click(function(){
            var reg = $('#dash_regional option:selected').val();
            var gsd = $('#dash_gsd option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            if(reg != null){
                var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel}; //index post : value
                if($('#dashboard_page_home').length){ // #dash_page_home = wrapper div id untuk tiap2 halaman
                    current_page = 'Home';
                    loadData('Home', baseUrl+"/gis/index.php/dbaset/AjaxService/getSummary/", filter_data);
                    loadData('Rekapitulasi', baseUrl+"/gis/index.php/dbaset/AjaxService/getRekapitulasi/", filter_data);
                    loadData('ChartAsetLahan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_lahan_chart/", filter_data);
                    loadData('ChartAsetGedung', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_bangunan_chart/", filter_data);
                    loadData('ChartPenggunaanBangunan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_occupacy_rate_chart/",filter_data);
                    loadData('NilaiLaba', baseUrl+"/gis/index.php/dbaset/AjaxService/get_nilai_aset_grafik/", filter_data);

                    if($("#map_dashboard").is(":visible")){
                        get_sebaran_aset_lahan();
                    }

                    if($("#detail_lahan").is(":visible")){
                        loadData('TabelAsetLahan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_lahan/", filter_data);
                    } 
                    if($("#detail_gedung").is(":visible")){
                        loadData('TabelAsetGedung', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_bangunan/", filter_data);
                    }     
                    if($("#detail_gedung").is(":visible")){
                        loadData('TabelAsetGedung', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_bangunan/", filter_data);
                    }     
                    if($("#ocrt_tab").is(":visible")){
                        loadData('TabelPenggunaanBangunan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_occupacy_rate/", filter_data);
                    }
                    if($("#jenis").is(":visible")){
                        loadData('TabelJenisPenggunaanBangunan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_occupacy_rate_jenis/", filter_data);
                    } 
                    if($("#detail_laba").is(":visible")){
                        loadData('TabelDetailLaba', baseUrl+"/gis/index.php/dbaset/AjaxService/get_detail_laba_bersih/", filter_data);   
                    }
                    if($("#rekap_laba").is(":visible")){
                        loadData('TabelRekapLaba', baseUrl+"/gis/index.php/dbaset/AjaxService/get_laba_bersih/", filter_data);   
                    }
                    if($("#nilai_aset").is(":visible")){
                        loadData('TabelNilaiLaba', baseUrl+"/gis/index.php/dbaset/AjaxService/get_nilai_aset_tab/", filter_data);   
                    }
                    if($("#nilai_aset_tab").is(":visible")){  
                        loadData('TabelNilaiLaba', baseUrl+"/gis/index.php/dbaset/AjaxService/get_nilai_aset_tab/", filter_data);   
                    }
                    if($("#aset_sekunder").is(":visible")){
                        loadData('TabelAsetSekunder', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_sekunder/", filter_data);   
                    }
                }else if($('#dashboard_page_alert_system').length){
                    loadData('AlertSystemPermasalahanHukum', baseUrl+"/gis/index.php/dbaset/AjaxService/get_permasalahan_hukum/",filter_data);
                    loadData('AlertSystemStatMilik', baseUrl+"/gis/index.php/dbaset/AjaxService/get_status_kepemilikan/",filter_data);     
                    loadData('AlertSystemPerizinan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_perizinan/", filter_data);
                }else if($('#sebaran_aset_lahan_page').length){
                    get_sebaran_aset_lahan();
                }else if($('#dashboard_page_aset_inventory').length){
                    aset_inv(1);
                }else if($('#dashboard_page_aset_potensiindikasi').length){
                    aset_potensi(1);
                }
            }else{            
                alert('Harap pilih data dari dropdown yang disediakan terlebih dahulu');
            }
        });
        
        function dashRegChange(reg,witel){
            if(reg != ''){
                $.ajax({
                    data: { 'api_key' : localStorage.api_key},
                    type: 'POST',
                    url: baseUrl+'/gis/index.php/dbaset/AjaxService/getDataWitelBasedOnReg/'+reg,
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        $('#dash_gsd').empty();
                        $('#dash_witel').empty();
                        $('#dash_gsd').append($("<option selected='true' disabled='disabled'></option>").attr("value",'').text('Pilih GSD Unit'));
                        $('#dash_witel').append($("<option selected='true'></option>").attr("value",'').text('Pilih WITEL'));
                        if(data.auth_status == 1){
                            // console.log(data);
                            for(i=0; i<data.witel.length; i++){
                                if(data.witel[i].ID == witel){
                                    $('#dash_witel').append("<option value = '"+data.witel[i].ID+"' selected>"+data.witel[i].NAMA+"</option>"); 
                                }else{
                                    $('#dash_witel').append($("<option></option>").attr("value",data.witel[i].ID).text(data.witel[i].NAMA)); 
                                }
                            }
                            // $('#content_sub_page').text(current_page);
                        }else{
                            // WEB = redirect ke controller login
                            window.location = baseUrl+"/gis/index.php/dbaset/CUser/fLogin";
                        }
                    }
                });
            }else{
                $('#dash_gsd').empty();
                $('#dash_witel').empty();
                $('#dash_gsd').append($("<option selected='true' disabled='disabled'></option>").attr("value",'').text('Pilih GSD Unit'));
                $('#dash_witel').append($("<option selected='true' disabled='disabled'></option>").attr("value",'').text('Pilih WITEL'));
            }
        }

        $("#dash_regional").on("change", function(event){
            var reg = $('#dash_regional option:selected').val();
            if(reg != ''){
                $.ajax({
                    data: { 'api_key' : localStorage.api_key},
                    type: 'POST',
                    url: baseUrl+'/gis/index.php/dbaset/AjaxService/getDataWitelBasedOnReg/'+reg,
                    dataType: "json",
                    cache: false,
                    success: function (data) {
                        $('#dash_gsd').empty();
                        $('#dash_witel').empty();
                        $('#dash_gsd').append($("<option selected='true' disabled='disabled'></option>").attr("value",'').text('Pilih GSD Unit'));
                        $('#dash_witel').append($("<option selected='true'></option>").attr("value",'').text('Pilih WITEL'));
                        if(data.auth_status == 1){
                            // console.log(data);
                            for(i=0; i<data.witel.length; i++){
                                $('#dash_witel').append($("<option></option>").attr("value",data.witel[i].ID).text(data.witel[i].NAMA)); 
                            }
                            // $('#content_sub_page').text(current_page);
                        }else{
                            // WEB = redirect ke controller login
                            window.location = baseUrl+"/gis/index.php/dbaset/CUser/fLogin";
                        }
                    }
                });
            }else{
                $('#dash_gsd').empty();
                $('#dash_witel').empty();
                $('#dash_gsd').append($("<option selected='true' disabled='disabled'></option>").attr("value",'').text('Pilih GSD Unit'));
                $('#dash_witel').append($("<option selected='true' disabled='disabled'></option>").attr("value",'').text('Pilih WITEL'));
            }
            if($('#dashboard_page_aset_detaillahan').length){
                dash_detail_lahan(1);
            }else if($('#dashboard_page_aset_detailbangunan').length){
                dash_detail_bangunan(1);
            }
        });

        $("#dash_gsd").on("change", function(event){
            var gsd = $('#dash_gsd option:selected').val();
            $.ajax({
                data: { 'api_key' : localStorage.api_key},
                type: 'POST',
                url: baseUrl+'/gis/index.php/dbaset/AjaxService/getDataWitel/'+gsd,
                dataType: "json",
                cache: false,
                success: function (data) {
                    $('#dash_witel').empty();
                    $('#dash_witel').append($("<option selected='true' disabled='disabled'></option>").attr("value",'').text('Pilih WITEL'));
                    if(data.auth_status == 1){
                        for(i=0; i<data.witel.length; i++){
                            $('#dash_witel').append($("<option></option>").attr("value",data.witel[i].ID).text(data.witel[i].NAMA)); 
                        }
                        // $('#content_sub_page').text(current_page);
                    }else{
                        // WEB = redirect ke controller login
                        window.location = baseUrl+"/gis/index.php/dbaset/CUser/fLogin";
                    }
                }
            });
        });

        //peta nasional

        $('#cari_aset_lahan_modal_btn').click(function(){
            $('#informasi_gsd').modal('hide');

            var reg = $('#id_reg_modal').text();
            var gsd = $('#id_gsd_modal').text();
            var witel = $('#dash_witel_peta option:selected').val();
            var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel};
            console.log(filter_data);
            loadData('GetSebaranAsetLahanDariModalGSD', baseUrl+"/gis/index.php/dbaset/AjaxService/ajax_ambil_sebaran_aset_lahan/", filter_data);
        });

        function modal_peta_nasional_data_gsd(gsd){

            $('#modal_header_informasi_gsd').html('<h4 class="modal-title">'+ gsd.NAMA_UNIT +' <small> Regional : '+ gsd.TREG_ID +' </small></h4>');
            $('#modal_thead_informasi_gsd').html(
                '<tr style="background-color: red;color:#ffffff;">'+
                    '<th>ID</th>'+
                    '<th id = "id_gsd_modal">'+ gsd.ID +'</th>'+
                '</tr>'
            );
            var modal_body = '';
            modal_body += 
            $('#modal_tbody_informasi_gsd').html(
                '<tr>'+
                    '<th>Nama Unit</th>'+
                    '<th>'+ gsd.NAMA_UNIT +'</th>'+
                '</tr>'+
                '<tr>'+
                    '<th>Regional</th>'+
                    '<th id = "id_reg_modal">'+ gsd.TREG_ID +'</th>'+
                '</tr>'+
                '<tr>'+
                    '<th>COOR X</th>'+
                    '<th>'+ gsd.COOR_X +'</th>'+
                '</tr>'+
                '<tr>'+
                    '<th>COOR Y</th>'+
                    '<th>'+ gsd.COOR_Y +'</th>'+
                '</tr>'+
                '<tr>'+
                    '<th>Kode FM SAP</th>'+
                    '<th>'+ gsd.KODE_FM_SAP +'</th>'+
                '</tr>'+
                '<tr>'+
                    '<th>Wilayah Telkom</th>'+
                    '<th><select class="form-control input-sm" id="dash_witel_peta" required = "required">'+
                            '<option value="" selected="true" disabled="disabled">Pilih WITEL</option>'+
                        '</select>'+
                    '</th>'+
                '</tr>'
            );

            loadData('dashWitelTelkom', baseUrl+'/gis/index.php/dbaset/AjaxService/getDataWitel/'+ gsd.ID +'');
            
            $('#informasi_gsd').modal('show');
        }

        function InfoWindowLahan(id_lahan){
            loadData('modalPetaInformasiAset','GET',"{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
        }
        function InfoWindowGedung(id_lahan){
            loadData('modalPetaInformasiAsetBangunan',"GET","{{ url('sima-dash/detail-bangunan') }}", {'id_gedung': id_gedung});
        }

        
        /* SETTING */
        function set_ocrt_type(){
            /* Setting Occupacy Rate Type Radio Button */
            $('input:radio[name="type"]').change(function(){
                var value = $('input:radio[name="type"]:checked').val();
                if(value=='telkom'){
                    $(".ocrt_telkom").show();
                    $(".ocrt_telkom_grup").hide();
                    $(".ocrt_telkomsel").hide();
                    $(".ocrt_non_telkom").hide();
                }else if(value=='telkom_group'){
                    $(".ocrt_telkom").hide();
                    $(".ocrt_telkom_grup").show();
                    $(".ocrt_telkomsel").hide();
                    $(".ocrt_non_telkom").hide();
                }else if(value=='telkomsel'){
                    $(".ocrt_telkom").hide();
                    $(".ocrt_telkom_grup").hide();
                    $(".ocrt_telkomsel").show();
                    $(".ocrt_non_telkom").hide();
                }else if(value=='non_telkom_group'){
                    $(".ocrt_telkom").hide();
                    $(".ocrt_telkom_grup").hide();
                    $(".ocrt_telkomsel").hide();
                    $(".ocrt_non_telkom").show();
                }
            });
        }

        $('.carousel-control.left').click(function() {
            $('#myCarousel').carousel('prev');
        });
        
        $('.carousel-control.right').click(function() {
            $('#myCarousel').carousel('next');
        });

        $('#btn_map_gsd_unit').click(function(){
            loadData('PetaGSD', baseUrl+"/gis/index.php/dbaset/AjaxService/getDataGSD/nasional");
        });

        $('#btn_map_regional').click(function(){
            loadData('HomePetaNasional','GET',"{{ url('sima-dash/summary') }}");
        });

        $('#btn_aset_lahan_nasional').click(function(){
            loadData('HomePetaAsetLahan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_lahan_chart_nasional/");        
        });
        
        $('#btn_aset_gedung_nasional').click(function(){
            loadData('HomePetaAsetGedung', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_bangunan_chart_nasional/");
        });

        $('#btn_digunakan_nasional').click(function(){
            loadData('HomePetaPenggunaan', baseUrl+"/gis/index.php/dbaset/AjaxService/get_occupacy_rate_chart_nasional/");
        });

        $('#btn_laba_bersih_nasional').click(function(){
            loadData('HomePetaLaba', baseUrl+"/gis/index.php/dbaset/AjaxService/get_nilai_aset_grafik_nasional/");        
        });

        $('#btn_aset_sekunder_nasional').click(function(){
            loadData('HomePetaAsetSekunder', baseUrl+"/gis/index.php/dbaset/AjaxService/get_aset_sekunder_chart_nasional/");
        });
        
        function map_hasil_search(lahan){
            // console.log(lahan);
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {lat: parseFloat(lahan[0].COOR_Y), lng: parseFloat(lahan[0].COOR_X) },
                styles: [
                    {
                        featureType: "poi",
                        stylers: [{ visibility: "off" }] 
                    }
                ]
            });
            marker_coordinate = [];
            for(i=0;i<lahan.length;i++){
                var filter_data = {'id_areal': lahan[i].IDAREAL};
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(lahan[i].COOR_Y), lng: parseFloat(lahan[i].COOR_X) },
                    icon: "{{ url('img/gis-map/locationIconRed.png') }}",
                    map: map
                });

                marker_coordinate.push(marker);                                        
                var id_lahan = lahan[i].IDAREAL;            
                (function (marker, filter_data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        loadData('modalPetaInformasiAset','GET',"{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
                        map.setZoom(12);
                        map.panTo(this.getPosition());
                    });
                })(marker, filter_data);
            }
        }

        /* Daftar Aset */

        function pagination_array_process(f,e,a,p){
            // f = first page
            // e = total page
            // a = page number
            // p = previously selected page
            // dp = data per page
            // li = list (html element)
            
            var li = '<ul class="pagination pull-right">';

            if(a == 'Next'){
                a = p+1;
            }else if(a == 'Previous'){
                a = p-1;         
            }else{
                a = parseInt(a);
            }

            if(e >= 8){
                if(a <= 4){
                    if(a==1){
                        li+=    "<li class='disabled'>"+
                                    "<a href='#'>Previous</a>"+
                                "</li>";
                    }else{
                        li+=    "<li class='paginate_button '>"+
                                    "<a href='#'>Previous</a>"+
                                "</li>";
                    }
                    for(i=0;i<5;i++){
                        if(i+1 == a){
                            li+=    "<li class='paginate_button active'>"+
                                        "<a href='#'>"+ (i+1) +"</a>"+
                                    "</li>";
                        }else{
                            li+=    "<li class='paginate_button '>"+
                                        "<a href='#'>"+ (i+1) +"</a>"+
                                    "</li>";
                        }
                    }
                    li+=    "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>"+
                            "<li class='paginate_button last_page'>"+
                                "<a href='#'>"+ e +"</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }else if(a >= e-3){
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Previous</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>1</a>"+
                            "</li>"+
                            "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>";
                    for(i=e-4;i<=e;i++){
                        if(i == a){
                            if(i == e){
                                li+= "<li class='paginate_button active last_page'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }else{
                                li+= "<li class='paginate_button active'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }
                        }else{
                            if(i == e){
                                li+= "<li class='paginate_button last_page'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }else{
                                li+= "<li class='paginate_button'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }
                        }
                    }
                    if(a==e){
                        li+=    "<li class='disabled'>"+
                                    "<a href='#'>Next</a>"+
                                "</li>";
                    }else{
                        li+=    "<li class='paginate_button '>"+
                                    "<a href='#'>Next</a>"+
                                "</li>";
                    }
                }else{
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Previous</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>1</a>"+
                            "</li>"+
                            "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>"+ (a-1) +"</a>"+
                            "</li>"+
                            "<li class='paginate_button active'>"+
                                "<a href='#'>"+ a +"</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>"+ (a+1) +"</a>"+
                            "</li>"+
                            "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>"+
                            "<li class='paginate_button last_page'>"+
                                "<a href='#'>"+ e +"</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }
            }else{
                if(a==1){
                    li+=    "<li class='disabled'>"+
                                "<a href='#'>Previous</a>"+
                            "</li>";
                }else{
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Previous</a>"+
                            "</li>";
                }
                for(i=0;i<e;i++){
                    if(i+1 == a){
                        if(i+1 == e){
                            li+= "<li class='paginate_button active last_page'>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }else{
                            li+= "<li class='paginate_button active'>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }
                    }else{
                        if(i+1 == e){
                            li+= "<li class='paginate_button last_page'>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }else{
                            li+= "<li class='paginate_button '>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }
                    }
                }
                if(a==e){
                    li+=    "<li class='disabled'>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }else{
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }
            }

            li+="</ul>";

            $('#pagination_array').html('');
            $('#pagination_array').html(li);
        }

        function pagination_process(f,e,a,p){
            // f = first page
            // e = total page
            // a = page number
            // p = previously selected page
            // dp = data per page
            // li = list (html element)
            
            var li = '<ul class="pagination pull-right">';

            if(a == 'Next'){
                a = p+1;
            }else if(a == 'Previous'){
                a = p-1;         
            }else{
                a = parseInt(a);
            }

            if(e >= 8){
                if(a <= 4){
                    if(a==1){
                        li+=    "<li class='disabled'>"+
                                    "<a href='#'>Previous</a>"+
                                "</li>";
                    }else{
                        li+=    "<li class='paginate_button '>"+
                                    "<a href='#'>Previous</a>"+
                                "</li>";
                    }
                    for(i=0;i<5;i++){
                        if(i+1 == a){
                            li+=    "<li class='paginate_button active'>"+
                                        "<a href='#'>"+ (i+1) +"</a>"+
                                    "</li>";
                        }else{
                            li+=    "<li class='paginate_button '>"+
                                        "<a href='#'>"+ (i+1) +"</a>"+
                                    "</li>";
                        }
                    }
                    li+=    "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>"+
                            "<li class='paginate_button last_page'>"+
                                "<a href='#'>"+ e +"</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }else if(a >= e-3){
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Previous</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>1</a>"+
                            "</li>"+
                            "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>";
                    for(i=e-4;i<=e;i++){
                        if(i == a){
                            if(i == e){
                                li+= "<li class='paginate_button active last_page'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }else{
                                li+= "<li class='paginate_button active'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }
                        }else{
                            if(i == e){
                                li+= "<li class='paginate_button last_page'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }else{
                                li+= "<li class='paginate_button'>"+
                                        "<a href='#'>"+ i +"</a>"+
                                    "</li>";
                            }
                        }
                    }
                    if(a==e){
                        li+=    "<li class='disabled'>"+
                                    "<a href='#'>Next</a>"+
                                "</li>";
                    }else{
                        li+=    "<li class='paginate_button '>"+
                                    "<a href='#'>Next</a>"+
                                "</li>";
                    }
                }else{
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Previous</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>1</a>"+
                            "</li>"+
                            "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>"+ (a-1) +"</a>"+
                            "</li>"+
                            "<li class='paginate_button active'>"+
                                "<a href='#'>"+ a +"</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>"+ (a+1) +"</a>"+
                            "</li>"+
                            "<li class='disabled'>"+
                                "<a href='#'>...</a>"+
                            "</li>"+
                            "<li class='paginate_button last_page'>"+
                                "<a href='#'>"+ e +"</a>"+
                            "</li>"+
                            "<li class='paginate_button '>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }
            }else{
                if(a==1){
                    li+=    "<li class='disabled'>"+
                                "<a href='#'>Previous</a>"+
                            "</li>";
                }else{
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Previous</a>"+
                            "</li>";
                }
                for(i=0;i<e;i++){
                    if(i+1 == a){
                        if(i+1 == e){
                            li+= "<li class='paginate_button active last_page'>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }else{
                            li+= "<li class='paginate_button active'>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }
                    }else{
                        if(i+1 == e){
                            li+= "<li class='paginate_button last_page'>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }else{
                            li+= "<li class='paginate_button '>"+
                                    "<a href='#'>"+ (i+1) +"</a>"+
                                "</li>";
                        }
                    }
                }
                if(a==e){
                    li+=    "<li class='disabled'>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }else{
                    li+=    "<li class='paginate_button '>"+
                                "<a href='#'>Next</a>"+
                            "</li>";
                }
            }

            li+="</ul>";

            $('#pagination').html('');
            $('#pagination').html(li);
        }

        $('#pagination_array').on('click', '.paginate_button', function(event){
            // f = first page
            // e = total page
            // a = page number
            // p = previously selected page
            // dp = data per page
            // li = list (html element)
            event.preventDefault(); 
            
            var f = 1;
            var e = parseInt($('#pagination_array').find('.last_page').text());   
            var a = $(this).find('a').text();
            var p = parseInt($('#pagination_array').find('.active').text());  
            var dp = $('#select_show_per_page').val();      

            if(a == 'Next'){
                a = p+1;
            }else if(a == 'Previous'){
                a = p-1;         
            }else{
                a = parseInt(a);
            }

            var start_data = (a*dp)-dp;
            var end_data = (a*dp);

            if( $('#search_key_info').is(':empty') ) {
                daftar_aset = daftar_aset_dash;           
            }else{
                daftar_aset = daftar_aset_dash_filtered; 
            }

            var ctr = 0;
            var data_aset_filtered = new Array();
            for(i=start_data; i<end_data;i++){
                if(typeof daftar_aset[i] != "undefined"){
                    data_aset_filtered[ctr] = daftar_aset[i];  
                }
                ctr++;
            }

            data = Array();
            data.daftar = data_aset_filtered;

            $('#table_aset_filter').html('');
            for(i=0; i<data.daftar.length;i++){
                if(typeof data.daftar[i].id_gedung === 'undefined' || !data.daftar[i].id_gedung){
                    if(typeof data.daftar[i] != 'undefined'){
                        if(typeof data.daftar[i].FILE_PATH === 'undefined' || !data.daftar[i].FILE_PATH){
                            var path_lahan_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                        }else{
                            var path_lahan_image = data.daftar[i].FILE_PATH;
                        }
                        $('#table_aset_filter').append(
                            '<div class="panel panel-dafault pull-left" style="width:100%">'+
                                '<div class="panel panel-default">'+
                                    '<div class="panel-body">'+
                                        '<div class="row" >'+
                                            '<div class="col-md-4">'+
                                                '<img style = "width:193px;height:80px;" class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_lahan_image +'>'+
                                            '</div>'+
                                            '<div class="col-md-8">'+
                                                '<b>#<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                                '<b>'+ data.daftar[i].NAMA_LAHAN +'</b>'+
                                                '<br>'+ data.daftar[i].ALAMAT +
                                                '<br>Luas Lahan : '+ sepNum2(data.daftar[i].LUAS_LAHAN) +' m<sup style="font-size: 8px"> 2 </sup> '+
                                            '</div>'+
                                        '</div>'+
                                        '<br>'+    
                                        '<div class="row">'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ sepNum2(data.daftar[i].ocrt_telkom)+' <sup style="font-size: 8px"> % </sup> '+
                                                            '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap> Penggunaan </rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-yellow" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.daftar[i].NAMA_STATUS_KEPEMILIKAN +'</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Status Kepemilikan</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-red" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.daftar[i].NAMA_KLASIFIKASI +
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Klasifikasi Aset</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='row'>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-left: 15px;" class="detailDaftarAsetGedung pull-left">'+
                                                    '<b>Detail Gedung </b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-right: 15px;" id = "'+data.daftar[i].IDAREAL+'_'+data.daftar[i].NAMA_LAHAN+'_'+data.daftar[i].COOR_Y+'_'+data.daftar[i].COOR_X+'" class="detailFilter pull-right">'+
                                                    '<b>Detail Aset</b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                        '</div>'+
                                        "<div class='row detailGedungPerLahanMap' style='font-size:10px;margin-left: 15px;'>"+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                    }
                }else{
                    if(typeof data.daftar != 'undefined' ){
                        if(typeof data.daftar[i].path_gedung_image === 'undefined' || !data.daftar[i].path_gedung_image){
                            var path_gedung_image = "/img/gis_img/telkom-gbr-tkd-sedia.png";
                        }else{
                            var path_gedung_image = data.daftar[i].FILE_PATH;
                        }
                        $('#table_aset_filter').append(
                            '<div class="panel panel-dafault pull-left" style="width:100%">'+
                                '<div class="panel panel-default">'+
                                    '<div class="panel-body">'+
                                        '<div class="row" >'+
                                            '<div class="col-md-4">'+
                                                '<img style = "width:193px;height:80px;" class="img-responsive center-block" src='+baseUrl+'/gis/assets/'+ path_gedung_image +'>'+
                                            '</div>'+
                                            '<div class="col-md-8">'+
                                                '<b>id lahan : #<span class = "idareal_daftar_aset">'+ data.daftar[i].IDAREAL +'</span></b><br>'+
                                                '<b>id gedung : #<span class = "idgedung_daftar_aset">'+ data.daftar[i].id_gedung +'</span></b><br>'+
                                                '<b>'+ data.daftar[i].nama_gedung +'</b>'+
                                                '<br>'+ data.daftar[i].alamat +
                                                '<br>Luas Bangunan : '+ sepNum2(data.daftar[i].luas_bangunan) +' m<sup style="font-size: 8px"> 2 </sup> '+
                                            '</div>'+
                                        '</div>'+
                                        '<br>'+    
                                        '<div class="row">'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-green" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ sepNum2(data.daftar[i].ocrt_telkom)+' <sup style="font-size: 8px"> % </sup> '+
                                                            '</span>'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap> Penggunaan </rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-yellow" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right">'+ data.daftar[i].jml_lantai +' Lt'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Jumlah Lantai</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                            "<div class='col-md-4'>"+
                                                '<!-- small box -->'+
                                                '<div class="small-box bg-red" style="height: 80px">'+
                                                    '<div class="inner">'+
                                                        '<h3>'+
                                                            '<span style="font-size: 20px" class="pull-right"> '+ data.daftar[i].saleable_area +' m'+
                                                        '</h3>'+
                                                        '<br>'+
                                                        '<p>'+
                                                            '<rap>Saleable Area</rap>'+
                                                        '</p>'+
                                                    '</div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        "<div class='row'>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-left: 15px;" class="detailDaftarAsetLahan pull-left">'+
                                                    '<b>Detail Lahan </b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                            "<div class = 'col-md-6'>"+
                                                '<a href="#" style="margin-right: 15px;" id = "'+data.daftar[i].IDAREAL+'_'+data.daftar[i].NAMA_LAHAN+'_'+data.daftar[i].COOR_Y+'_'+data.daftar[i].COOR_X+'" class="detailFilterBangunan pull-right">'+
                                                    '<b>Detail Aset</b>'+
                                                    '<i class="fa fa-chevron-down"></i>'+
                                                '</a>'+
                                            "</div>"+
                                        '</div>'+
                                        "<div class='row detailLahanPerGedungMap' style='margin-left: 15px;'>"+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                    }
                }
            }

            map_filter(data.daftar);

            $('#table_aset_filter').append(
                'Tampil <span class="table-start-rows">'+ (start_data+1) +'</span> Sampai <span class="table-end-rows">'+ (start_data+data.daftar.length) +'</span> Dari <span class="table-total-row">'+(daftar_aset.length)+'</span> Data'
            );

            pagination_array_process(f,e,a,p);
        });

        $('#pagination').on('click', '.paginate_button', function(){
            // f = first page
            // e = total page
            // a = page number
            // p = previously selected page
            // dp = data per page
            // li = list (html element)
            
            var f = 1;
            var e = parseInt($('#pagination').find('.last_page').text());   
            var a = $(this).find('a').text();
            var p = parseInt($('#pagination').find('.active').text());  

            pagination_process(f,e,a,p);

            if($('#dashboard_page_aset_inventory').length){
                aset_inv(a);
            }else if($('#dashboard_page_aset_utilisasi').length){
                aset_util(a);
            }else if($('#dashboard_page_aset_potensiindikasi').length){
                aset_potensi(a);
            }else if($('#dashboard_page_aset_detaillahan').length){
                dash_detail_lahan(a);
            }else if($('#dashboard_page_aset_detailbangunan').length){
                dash_detail_bangunan(a);
            }
        });

        function get_daftar_aset(){
            var reg = $('#dash_regional option:selected').val();
            var gsd = $('#dash_gsd option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel};
            loadData('GetSebaranAsetLahan', baseUrl+"/gis/index.php/dbaset/AjaxService/ajax_ambil_daftar_aset/", filter_data);
        }

        /* sebaran aset lahan */

        function get_sebaran_aset_lahan(){
            var reg = $('#dash_regional option:selected').val();
            var gsd = $('#dash_gsd option:selected').val();
            var witel = $('#dash_witel option:selected').val();
            var filter_data = {'dash_id': reg, 'dash_fm' : gsd, 'dash_witel' : witel};
            // if(reg != "" && witel != ""){
                loadData('GetSebaranAsetLahan', baseUrl+"/gis/index.php/dbaset/AjaxService/ajax_ambil_sebaran_aset_lahan/", filter_data);
            // }else{
            //     loadData('GetSebaranAsetLahanIDTregNull', baseUrl+"/gis/index.php/dbaset/AjaxService/ajax_ambil_gsd_unit_data/", filter_data);
            // }
        }
        
        function map_sebaran_aset(data_filter, data_id_areals){
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: parseFloat(data_filter[0][1]), lng: parseFloat(data_filter[0][2]) },
                styles: [
                    {
                        featureType: "poi",
                        stylers: [{ visibility: "off" }] 
                    }
                ]
            });
            marker_coordinate = [];
            for(i=0;i<data_filter.length;i++){
                var filter_data = {'id_areal': data_id_areals[i]};
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(data_filter[i][1]), lng: parseFloat(data_filter[i][2]) },
                    icon: "{{ url('img/gis-map/locationIconRed.png') }}",
                    map: map
                });
                
                marker_coordinate.push(marker);                             
                var id_lahan = data_id_areals[i];
                (function (marker, filter_data) {
                    google.maps.event.addListener(marker, "click", function (e) {;
                        loadData('modalPetaInformasiAset','GET',"{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
                        map.setZoom(12);
                        map.panTo(this.getPosition());
                    });
                })(marker, filter_data);
            }
        }

        function map_sebaran_aset_dari_modal_gsd(data_filter, data_id_areals){
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: parseFloat(data_filter[0][1]), lng: parseFloat(data_filter[0][2]) },
                styles: [
                    {
                        featureType: "poi",
                        stylers: [{ visibility: "off" }] 
                    }
                ]
            }); 
            marker_coordinate = [];
            for(i=0;i<data_filter.length;i++){
                var filter_data = {'id_areal': data_id_areals[i]};
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(data_filter[i][1]), lng: parseFloat(data_filter[i][2]) },
                    icon: "{{ url('img/gis-map/locationIconRed.png') }}",
                    map: map
                });

                marker_coordinate.push(marker);                             
                
                var content = ' #'+ data_id_areals[i] +' <br/> '+data_filter[i][0]+' ';   

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
                var id_lahan = filter_data.id_areal;
                (function (marker, filter_data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        id_lahan = filter_data.id_areal; 
                        loadData('modalPetaInformasiAset','GET',"{{ url('sima-dash/detail-lahan') }}", {'id_areal': id_lahan});
                        map.setZoom(12);
                        map.panTo(this.getPosition());
                    });
                })(marker, filter_data);
            }
        }

        function map_sebaran_aset_dari_modal_gsd_bangunan(data_filter, data_id_areals, data_id_gedung){
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: parseFloat(data_filter[0][1]), lng: parseFloat(data_filter[0][2]) },
                styles: [
                    {
                        featureType: "poi",
                        stylers: [{ visibility: "off" }] 
                    }
                ]
            }); 
            marker_coordinate = [];
            for(i=0;i<data_filter.length;i++){
                var filter_data = {'id_gedung': data_id_gedung[i]};
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(data_filter[i][1]), lng: parseFloat(data_filter[i][2]) },
                    icon: "{{ url('img/gis-map/locationIconRed.png') }}",
                    map: map
                });

                marker_coordinate.push(marker);                             
                
                var content = ' #'+ data_id_gedung[i] +' <br/> '+data_filter[i][0]+' ';   

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
                var id_gedung = filter_data.id_gedung;
                (function (marker, filter_data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        id_gedung = filter_data.id_gedung; 
                        loadData('modalPetaInformasiAsetBangunan',"GET","{{ url('sima-dash/detail-bangunan') }}", {'id_gedung': id_gedung});
                        map.setZoom(12);
                        map.panTo(this.getPosition());
                    });
                })(marker, filter_data);
            }
        }

        function map_sebaran_aset_reg_gsd(data_filter, filter_dashboard){
            if(filter_dashboard == "nasional"){
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: {lat: -1.154499, lng: parseFloat(116.430086) },
                    styles: [
                        {
                            featureType: "poi",
                            stylers: [{ visibility: "off" }] 
                        }
                    ]
                });
            }else{
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 6,
                    center: {lat: parseFloat(data_filter[0].COOR_Y), lng: parseFloat(data_filter[0].COOR_X) },
                    styles: [
                        {
                            featureType: "poi",
                            stylers: [{ visibility: "off" }] 
                        }
                    ]
                });
            }
            marker_coordinate = [];
            // console.log(data_filter);
            for(i=0;i<data_filter.length;i++){
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(data_filter[i].COOR_Y), lng: parseFloat(data_filter[i].COOR_X) },
                    icon: "{{ url('img/gis-map/locationIconRed.png') }}",
                    map: map
                });

                marker_coordinate.push(marker);                             

                var data_gsd = data_filter[i];

                (function (marker, data_gsd) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        modal_peta_nasional_data_gsd(data_gsd);
                        map.setZoom(12);
                        map.panTo(this.getPosition());
                    });
                })(marker, data_gsd);
            }
        }

    </script>
    </div>