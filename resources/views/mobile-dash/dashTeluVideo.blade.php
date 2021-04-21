<style>
    
    .btn-outline-light:hover {
        color: #131113;
        background-color: #ececec;
        border-color: #ececec;
    }
    .btn-outline-light {
        color: #131113;
        background-color: white;
        border-color: white !important;
    }

    #recent-works
    {
        padding-bottom: 70px;
    }

    .recent-work-wrap {
        position: relative;
    }

    .recent-work-wrap img{
        width: 100%;
    }

    .recent-work-wrap .recent-work-inner{
        top: 0;
        background: transparent;
        opacity: .8;
        width: 100%;
        border-radius: 0;
        margin-bottom: 0;
    }

    .recent-work-wrap .recent-work-inner h3{
        margin: 10px 0;
    }

    .recent-work-wrap .recent-work-inner h3 a{
        font-size: 24px;
        color: #fff;
    }

    .recent-work-wrap .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        border-radius: 0;
        background: #c52d2f;
        color: #fff;
        vertical-align: middle;
        -webkit-transition: opacity 500ms;
        -moz-transition: opacity 500ms;
        -o-transition: opacity 500ms;
        transition: opacity 500ms;  
        padding: 10px;
    }

    .recent-work-wrap .overlay .preview {
        bottom: 0;
        display: inline-block;
        height: 35px;
        line-height: 35px;
        border-radius: 0;
        background: transparent;
        text-align: center;
        color: #fff;
    }

    .recent-work-wrap:hover .overlay {
        opacity: 1;
    }

    .img-responsive {
        display: block;
        height: auto;
        max-width: 100%
    }

    .overlay{
        opacity: 0 !important;
    }
</style>
<div class="container-fluid mt-3">
@include('mobile-dash.back')
    <div class="row">
        <div class="col-12">
            <h6>Video</h6>
        </div>
    </div>
    <div class="row mt-3" id="list-video">
    </div>
</div>
<script>
 
 $('#scroll-top').hide();
 $('#scroll-bottom').hide();
 
 $('body').addClass('dash-contents');
 $('html').addClass('dash-contents');

 $('.navbar_bottom').hide();
 $('.nama-menu').html($nama_menu);
if(localStorage.getItem("dore-theme") == "dark"){
    $('#btn-filter').removeClass('btn-outline-light');
    $('#btn-filter').addClass('btn-outline-dark');
}else{
    $('#btn-filter').removeClass('btn-outline-dark');
    $('#btn-filter').addClass('btn-outline-light');
}

var $mode = localStorage.getItem("dore-theme");
var $watch_id = "";
var $watch_ket = "";
 function getVideoList(){
    $.ajax({
        type:"GET",
        url:"{{ url('mobile-dash/video-list') }}",
        dataType:"JSON",
        data:{mode: $mode},
        success: function(result){
            var html = "";
            $('#list-video').html(html);
            if(result.status){
                if(result.data.length > 0){
                    for(var i=0; i < result.data.length; i++){
                        var line = result.data[i];
                        var tmp = line.link.split("https://youtu.be/");
                        var link = "https://www.youtube.com/embed/"+tmp[1];
                        html+=`
                        <div class="col-xs-12 col-sm-4 col-md-3 mb-3">
                            <div class="recent-work-wrap">
                                <iframe class="img-responsive" src="`+link+`" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: -moz-available;width: -webkit-fill-available;"></iframe>
                                <div class="recent-work-inner">
                                    <p>`+line.keterangan+`</p>
                                </div> 
                                <div class="overlay" style="cursor:pointer" data-href="{{ url('mobile-dash/watch/') }}/`+line.no_bukti+`" data-watch_id="`+tmp[1]+`" data-watch_ket="`+line.keterangan+`">
                                </div>
                            </div>
                        </div>
                        `;
                    }
                    $('#list-video').html(html);
                    $('.recent-work-wrap').on('click','.overlay',function(e){
                        e.preventDefault();
                        var form = $(this).data('href');
                        $watch_id = $(this).data('watch_id');
                        $watch_ket = $(this).data('watch_ket');
                        var url = form;
                        if(form == "" || form == "-"){
                            return false;
                        }else{
                            loadForm(url); 
                        }
                    });

                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {       
            if(jqXHR.status == 422){
                var msg = jqXHR.responseText;
            }else if(jqXHR.status == 500) {
                var msg = "Internal server error";
            }else if(jqXHR.status == 401){
                var msg = "Unauthorized";
                window.location="{{ url('/mobile-dash/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
    
}

getVideoList();
</script>