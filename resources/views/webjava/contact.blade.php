<section id="contact-info" style='padding:0px;'>
    <div class="gmap-area" style='background-repeat:repeat-y;'>
        <div class="container" style='margin:0px; width:100%; min-height:550px;'>
            <div class="row">
                <div class="col-md-4">
                    <div class="latitude" hidden></div>
                    <div class="longitude" hidden></div>
                    <div id="map" style='width: 99%; height: 300px; margin-top:20px;'></div>
                    <!--<div id="google-map" style="height:100%;" data-latitude="-6.9781136" data-longitude="107.6376553"></div>-->
                </div>

                <div class="col-sm-4">
                    <center>
                        <img src="{{ config('api.url').'webjava/storage/kantor.jpg' }}" style='margin-top:20px;'>
                    </center>
                </div>

                <div class="col-sm-4 map-content">
                    <address>
                        
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->
<script>
function loadKontak()
{
    $.ajax({
        type: 'GET',
        url: "{{ url('webjava/kontak') }}",
        dataType: 'json',
        async:false,
        success:function(result){
            if(result.kontak.length > 0)
            {
                console.log(result.kontak.length);
                var line = result.kontak[0];
                $('.latitude').html(line.latitude);
                $('.longitude').html(line.longitude);
                $('.map-content address').html(line.keterangan);
            }

        },
        fail: function(xhr, textStatus, errorThrown){
            alert('request failed:'+textStatus);
        }
    });
}

loadKontak();
</script>