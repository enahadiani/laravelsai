<section id="portfolio">
    <div class="container">
        <div class="center">
            <h2>Video</h2>
        </div>
    
        <div class="row">
            <div class="portfolio-items">
                    <?php
                        foreach($daftar_video as $video){
                            echo "
                            <div class='portfolio-item ".$video["nama_ktg"]." col-xs-12 col-sm-4 col-md-3'>
                                <div class='recent-work-wrap'>
                                    <div style='height:250px; background-image: url(".base_url($video["file_gambar"])."); background-repeat:no-repeat; background-size:cover;'></div>
                                    <div class='overlay'>
                                        <div class='recent-work-inner'>
                                            <h3><a href='#'>".cutDate($video["tgl_input"])."</a></h3>
                                            <p>".$video["keterangan"]."</p>
                                            <a class='preview' href='".base_url($video["file_gambar"])."' rel='prettyPhoto'><i class='fa fa-eye'></i> View</a>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    ?>
            </div>
        </div>
    </div>
</section><!--/#portfolio-item-->