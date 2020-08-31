<section id='blog' class='container'>
    <div class='blog'>
        <div class='row'>
            <?php
                if(count($daftar_artikel > 0)){
                    foreach($daftar_artikel as $row){
                        $url = site_url("webjava/Index/readItem/".generateSEO($row["id"], $row["judul"]));

                        $cut_on = strpos(strip_tags($row["keterangan"]), ".", strpos(strip_tags($row["keterangan"]), ".")  + strlen("."));

                        echo "
                            <div class='blog-item col-md-6'>
                                <div class='row' style='margin-bottom:15px;'>
                                    <div class='col-xs-12 col-sm-3 text-center'>
                                        <div class='entry-meta'>
                                            <span id='publish_date'>".convertDate($row["tgl_input"])."</span>
                                        </div>
                                    </div>
                                    <div class='col-xs-12 col-sm-9'>
                                        <h2 style='margin-top:5px;'><a href='$url' style='color:#0066ff;'>".$row["judul"]."</a></h2>
                                    </div>
                                </div>
                                        
                                <div class='row'>
                                    <div class='col-xs-12 col-sm-12 blog-content'>
                                        <div style='overflow:hidden; max-height:400px;'>
                                            <a href='$url'>
                                                <img class='img-responsive img-blog' src='".base_url($row["header_url"])."' style='width:100%; display:block;' alt='' />
                                            </a>
                                        </div>

                                        <h3>".substr(strip_tags($row["keterangan"]), 0, $cut_on+1)."</h3>
                                        <a class='btn btn-sm btn-primary readmore' style='padding: 8px 8px;' href='$url'>Read More <i class='fa fa-angle-right'></i></a>
                                    </div>
                                </div>    
                            </div>
                        ";
                    }
                }else{
                    echo "No result found";
                }
                
                // print_r($daftar_artikel);
            ?>
            
                
        </div>
        <div class='row'>
            <div class='col-xs-12'>
                <center>
                    <?php 

                        $list = ($active_page > 1 ? "<li><a href='$url_paging/".($active_page - 1)."/?str=$search_string'><i class='fa fa-long-arrow-left'></i>Previous Page</a></li>" : '');
                
                        for($i=1; $i<=ceil($jumlah_artikel/$item_per_page); $i++){
                            $list .= ($i == $active_page ? "<li class='active'><a href='#'>$i</a></li>" : "<li><a href='$url_paging/".$i."/?str=$search_string'>$i</a></li>");
                        }
                
                        $list .= ($active_page < ceil($jumlah_artikel/$item_per_page) ? "<li><a href='$url_paging/".($active_page + 1)."/?str=$search_string'>Next Page<i class='fa fa-long-arrow-right'></i></a></li>" : '');
                
                        echo "  <ul class='pagination pagination-lg'>$list</ul>";
                    ?>
                </center>
            </div>
        </div>
    </div>
</section>
