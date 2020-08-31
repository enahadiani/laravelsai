<section id="contact-info" style='padding:0px;'>
    <div class="gmap-area" style='background-repeat:repeat-y;'>
        <div class="container" style='margin:0px; width:100%; min-height:550px;'>
            <div class="row">
                <div class="col-md-4">
                    <div class="latitude" hidden><?php echo $kontak["latitude"]; ?></div>
                    <div class="longitude" hidden><?php echo $kontak["longitude"]; ?></div>
                    <div id="map" style='width: 99%; height: 300px; margin-top:20px;'></div>
                    <!--<div id="google-map" style="height:100%;" data-latitude="-6.9781136" data-longitude="107.6376553"></div>-->
                </div>

                <div class="col-sm-4">
                    <center>
                        <img src="/assets/uploads/kantor.jpg" style='margin-top:20px;'>
                    </center>
                </div>

                <div class="col-sm-4 map-content">
                    <address>
                        <?php echo $kontak["keterangan"]; ?>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->