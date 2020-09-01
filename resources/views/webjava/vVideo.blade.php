    <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>Video Gallery</h2>
               <p class="lead">Memories are the elements of time</p>
            </div>
        

            <!--<ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Creative</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".html">Photography</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".wordpress">Web Development</a></li>
            </ul>-->
            <div class="row">
                <div class="portfolio-items">
            <?php
                foreach($daftar_video as $data){
                    echo "
                        <div class='portfolio-item apps col-xs-12 col-sm-4 col-md-3'>
                            <div class='recent-work-wrap'>
                                <iframe class='img-responsive' src='https://www.youtube.com/embed/".$data["link"]."'></iframe> 
                                <div class='overlay'>
                                    <div class='recent-work-inner'>
                                        <p>".$data["judul"]."</p>
                                        <p>".cutDate($data["tgl_input"])."</p>
                                        <a href='".site_url('Index/watch/'.generateSEO($data["id"], $data["judul"]))."' style='color:white;'><i class='fa fa-eye'></i> Watch</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>
            

                    <!--<div class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo base_url('assets/corlate/images/portfolio/recent/item2.png');?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">28 April 2017</a></h3>
                                    <p>If I could rearrange the alphabet, i would put U and I together</p>
                                    <a class="preview" href="<?php echo base_url('assets/corlate/images/portfolio/full/item2.png');?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>          
                    </div>-->
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->