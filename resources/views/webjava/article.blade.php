<section id='blog' class='container'>
    <div class='blog'>
        <div class='row'>
            <div class='col-md-8'>
                <?php
                    foreach($daftar_artikel as $row){
                        $url = site_url("webjava/Index/readItem/".generateSEO($row["id"], $row["judul"]));
                        $arr = explode('/', $row['file_type']);
                        $cut_on = strpos(strip_tags($row["keterangan"]), ".", strpos(strip_tags($row["keterangan"]), ".")  + strlen("."));

                        echo "
                            <div class='blog-item'>
                                <div class='row' style='margin-bottom:15px;'>
                                    <div class='col-xs-12 col-sm-2 text-center'>
                                        <div class='entry-meta'>
                                            <span id='publish_date'>".convertDate($row["tgl_input"])."</span>
                                        </div>
                                    </div>
                                    <div class='col-xs-12 col-sm-10'>
                                        <h2 style='margin-top:5px;'><a href='$url' style='color:#0066ff;'>".$row["judul"]."</a></h2>
                                    </div>
                                </div>
                                        
                                <div class='row'>
                                    <div class='col-xs-12 col-sm-12 blog-content'>
                                        <div style='overflow:hidden; max-height:400px;'>".
                                            ($arr[0] == 'video' ? "<video controls  style='min-width:200px; min-height:200px; display:block; margin-left: auto; margin-right: auto;'><source src='".base_url($row["header_url"])."' type='".$row['file_type']."'></video>"  : "
                                            <a href='$url'><img class='img-responsive img-blog' src='".base_url($row["header_url"])."' style='width:100%; display:block;' alt='' />
                                            </a>")

                                            
                                        ."
                                        </div>

                                        <h3>".substr(strip_tags($row["keterangan"]), 0, $cut_on+1)."</h3>
                                        <a class='btn btn-sm btn-primary readmore' style='padding: 8px 8px;' href='$url'>Read More <i class='fa fa-angle-right'></i></a>
                                    </div>
                                </div>    
                            </div>
                        ";
                    }
                ?>
                
                <center>
                    <?php generateWebPaging('/webjava/Index/article',  $jumlah_artikel, $item_per_page, $active_page); ?>
                </center>
            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form" action='/webjava/Index/search/article/string/' method='GET'>
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
                                        echo "<li><a href='/webjava/Index/search/article/categories/?str=".$cat['kode_kategori']."'>".$cat['nama']." <span class='badge'>".$cat['jml']."</span></a></li>";
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
    </div>
</section><!--/#blog-->
