<section id="portfolio">
    <div class="container">
        <ul class="portfolio-filter text-center">
        </ul>

        <div class="row">
            <div class="portfolio-items">
            </div>
        </div>
    </div>
</section><!--/#portfolio-item-->
<script>
function loadGallery()
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webjava/gallery') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            var html = '';
            if(result.daftar_kategori.length > 0)
            {

                for(var i=0;i<result.daftar_kategori.length;i++)
                {
                    var line = result.daftar_kategori[i];
                    html +="<li><a class='btn btn-default' style='border:1px solid black;' href='#' data-filter='."+line.kode_kategori+"'>"+line.nama+"</a></li>";
                }
            }
            $('.portfolio-filter').html(html);

            var html='';
            if(result.daftar_gambar.length > 0)
            {
                for(var i=0;i<result.daftar_gambar.length;i++)
                {
                    var line = result.daftar_gambar[i];
                    html+=`
                    <div class='portfolio-item `+line.nama_ktg+` col-xs-12 col-sm-4 col-md-3' style='padding:3px;'>
                        <div class='recent-work-wrap'>
                            <div style='height:250px; background-image: url("`+line.file_gambar+`"); background-repeat:no-repeat; background-size:cover;'>
                                <div style='height:20%; width:100%; position:absolute; bottom:0; background-color:black; opacity: 0.7;'>
                                <center>
                                <a style='color:white;' class='preview' href='`+line.file_gambar+`' rel='prettyPhoto'>
                                <p>`+line.keterangan+`</p>
                                </a>
                                </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                }
            }
            
            $('.portfolio-items').html('<center>'+html+'</center>');

        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed:'+textStatus);
        }
    });
}

loadGallery();
</script>