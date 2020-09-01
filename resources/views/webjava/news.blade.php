<section id='blog' class='container'>
    <div class='blog'>
        <div class='row'>
            <div class='col-md-8' id="content-news">  
              
            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form" action='webjava/search/news/string/' method='GET'>
                        <input type="text" name='str' class="form-control search_box" autocomplete="on" placeholder="Search" required>
                    </form>
                </div><!--/.search-->

                <div class="widget categories">
                    <h3>Categories</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
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
                                        echo "<li><a href='/webjava/Index/news/1/".$arc['bulan']."/".$arc['tahun']."'><i class='fa fa-angle-double-right'></i> ".getNamaBulan($arc['bulan'])." ".$arc['tahun']." <span class='pull-right'>(".$arc['jml'].")</span></a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.archieve-->
            </aside>  
        </div><!--/.row-->
    </div>
</section><!--/#blog-->
<script>
    function generateSEO(id, judul)
    {
        seo = toLowerCase(judul).replace(" ","-");
        seo = seo.replace(["(",")","'","/","'\'",':','"',',','?','%'], "");
        return id+"/"+seo;
    }

    function removeTags(str) {
        if ((str===null) || (str===''))
        return false;
        else
        str = str.toString();
        return str.replace( /(<([^>]+)>)/ig, '');
    }

    function getNamaBulan(no_bulan){
        switch (no_bulan){
            case 1 : case '1' : case '01': bulan = "Januari"; break;
            case 2 : case '2' : case '02': bulan = "Februari"; break;
            case 3 : case '3' : case '03': bulan = "Maret"; break;
            case 4 : case '4' : case '04': bulan = "April"; break;
            case 5 : case '5' : case '05': bulan = "Mei"; break;
            case 6 : case '6' : case '06': bulan = "Juni"; break;
            case 7 : case '7' : case '07': bulan = "Juli"; break;
            case 8 : case '8' : case '08': bulan = "Agustus"; break;
            case 9 : case '9' : case '09': bulan = "September"; break;
            case 10 : case '10' : case '10': bulan = "Oktober"; break;
            case 11 : case '11' : case '11': bulan = "November"; break;
            case 12 : case '12' : case '12': bulan = "Desember"; break;
            default: bulan = null;
        }

        return bulan;
    }

    function reverseDate(date_str, separator){
        if(typeof separator === 'undefined'){separator = '-'}
        date_str = date_str.split(' ');
        var str = date_str[0].split(separator);

        return str[2]+separator+str[1]+separator+str[0];
    }

     // template corlate only
    function generateWebPaging(sub_url, data_array_count, item_per_page=5, active_page_number=1, protection=true)
    {
        // protect
        var page = Math.ceil(data_array_count/item_per_page);
        if(protection){
            if(active_page_number > page){
                // redirect(sub_url);
            }
        }
        
        var list = (active_page_number > 1 ? "<li><a href='sub_url/"+(active_page_number - 1)+"'><i class='fa fa-long-arrow-left'></i>Previous Page</a></li>" : "");

        for(var i=1; i <= page; i++)
        {
            list += (i == active_page_number ? "<li class='active'><a href='#'>"+i+"</a></li>" : "<li><a href='"+sub_url+"'/'"+i+"'>"+i+"</a></li>");
        }

        list += (active_page_number < page ? "<li><a href='sub_url/"+(active_page_number + 1)+"'>Next Page<i class='fa fa-long-arrow-right'></i></a></li>" : "");

        var html = "<ul class='pagination pagination-lg'>"+list+"</ul>";
        return html;
    }

    function loadNews()
    {
        $.ajax({
            type: 'GET',
            url: "{{ url('webjava/news') }}",
            dataType: 'json',
            async:false,
            success:function(result)
            {
                var html ='';
                if(result.daftar_artikel.length > 0)
                {

                    for(var i=0; i<result.daftar_artikel.length;i++)
                    {
                        var line = result.daftar_artikel[i];
                        var url = "{{ url('readItem'/"+generateSEO(line.id, line.judul)+"') }}";
                        var arr = line.file_type.split("/");
                        var keterangan = removeTags(line.keterangan);
                        var index = keterangan.indexOf(".")  + 1;
                        var cut_on = keterangan.indexOf(".", index);

                        if(arr[0] == 'video')
                        {
                            var link_img = "<video controls  style='min-width:200px; min-height:200px; display:block; margin-left: auto; margin-right: auto;'><source src='"+line.header_url+"' type='"+line.file_type+"'></video>";
                        }else{
                            var link_img = "<a href='"+url+"'><img class='img-responsive img-blog' src='"+line.header_url+"' style='width:100%; display:block;' alt=''/></a>";
                        }

                        html +=`<div class='blog-item'>
                                    <div class='row' style='margin-bottom:15px;'>
                                        <div class='col-xs-12 col-sm-2 text-center'>
                                            <div class='entry-meta'>
                                                <span id='publish_date'>`+reverseDate(line.tgl_input)+`</span>
                                            </div>
                                        </div>
                                        <div class='col-xs-12 col-sm-10'>
                                            <h2 style='margin-top:5px;'><a href='`+url+`' style='color:#0066ff;'>`+line.judul+`</a></h2>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-xs-12 col-sm-12 blog-content'>
                                            <div style='overflow:hidden; max-height:400px;'>`+link_img+`
                                            </div>
                                            <h3>`+removeTags(line.keterangan).substr(0, cut_on+1)+`</h3>
                                            <a class='btn btn-sm btn-primary readmore' style='padding: 8px 8px;' href='`+url+`'>Read More <i class='fa fa-angle-right'></i></a>
                                        </div>
                                    </div>    
                                </div>
                            `;

                    }

                    html +=`
                    <center>`+generateWebPaging('/webjava/news', result.jumlah_artikel, result,item_per_page, result.active_page)+`</center>`;

                    if(result.categories.length > 0){

                        for(var i=0; i<result.categories.length;i++)
                        {
                            var cat = result.categories[i];
                            echo "<li><a href='webjava/search/news/categories/?str="+cat.kode_kategori+"'>"+cat.nama+" <span class='badge'>"+cat.jml+"</span></a></li>";
                        }
                    }
                }

            },
            fail: function(xhr, textStatus, errorThrown){
                alert('request failed:'+textStatus);
            }
        });
    }

    loadNews();
</script>
