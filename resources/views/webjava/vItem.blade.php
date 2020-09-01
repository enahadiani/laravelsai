
    <section id="blog" class="container">
        <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                        <div class='row' style='margin-bottom:15px;'>
                            <div class='col-xs-12 col-sm-2 text-center'>
                                <div class='entry-meta'>
                                    <span id='publish_date'><?php echo convertDate($artikel["tgl_input"]); ?></span>
                                </div>
                            </div>
                            <div class='col-xs-12 col-sm-10'>
                                <h2 style='margin-top:5px;'><a href='#'><?php echo $artikel["judul"]; ?></a></h2>
                            </div>
                        </div>

                        <?php
                            $arr = explode('/', $artikel['file_type']);
                            if($arr[0] == 'video'){
                                echo "<video controls  style='min-width:200px; min-height:200px; display:block; margin-left: auto; margin-right: auto;'><source src='".base_url($artikel['header_url'])."' type='".$artikel['file_type']."'></video>";
                            }else{
                                echo "<img class='img-responsive img-blog' src='".base_url($artikel['header_url'])."' width='100%' alt='' />";
                            }
                        ?>

                            <div class="row">  
                                <div class="col-xs-12 col-sm-12 blog-content">
                                    <?php echo $artikel["keterangan"]; ?>

                                    <div class="post-tags">
                                        <?php
                                            $tag = explode(',', $artikel['tag']);
                                            $str = "<a href='/webjava/Index/search/all/tag/?str=".strtolower($tag[0])."'>".ucfirst(strtolower($tag[0]))."</a> ";
                                            for($i=1; $i<count($tag); $i++){
                                                $str .= "/<a href='/webjava/Index/search/all/tag/?str=".strtolower($tag[$i])."'>".ucfirst(strtolower($tag[$i]))."</a> ";
                                            }
                                        ?>

                                        <strong>Tag:</strong> <?php echo $str; ?>
                                    </div>

                                </div>
                            </div>
                    </div><!--/.blog-item-->
                </div>
                
                <aside class="col-md-4">
                    <div class="widget search">
                        <form role="form" action='/webjava/Index/search/all/string/' method='GET'>
                            <input type="text" name='str' class="form-control search_box" autocomplete="on" placeholder="Search" required>
                        </form>
                    </div><!--/.search-->

                    <div class="widget categories">
                        <h3>Categories</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="blog_category">
                                    <?php
                                        foreach($categories as $cat){
                                            echo "<li><a href='/webjava/Index/search/all/categories/?str=".$cat['kode_kategori']."'>".$cat['nama']." <span class='badge'>".$cat['jml']."</span></a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>                     
                    </div><!--/.categories-->
                
                    <div class="widget archieve">
                        <h3>Archive</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="blog_archieve">
                                    <?php
                                        foreach($archive as $arc){
                                            echo "<li><a href='/webjava/Index/article/1/".$arc['bulan']."/".$arc['tahun']."'><i class='fa fa-angle-double-right'></i> ".getNamaBulan($arc['bulan'])." ".$arc['tahun']." <span class='pull-right'>(".$arc['jml'].")</span></a></li>";
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>                     
                    </div>
                </aside>  
            </div><!--/.row-->

         </div><!--/.blog-->

    </section><!--/#blog-->
