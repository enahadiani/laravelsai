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
    <div class="row">
        <div class="col-12">
            <h6>Video</h6>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
        </div>
    </div>
    <div class="row mt-3" >
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="recent-work-wrap">
                <iframe class="img-responsive" src="https://www.youtube.com/embed/tbbZpqUeHcs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="recent-work-inner">
                    <p>Proses Bisnis Penetapan Biaya Pendidikan di Telkom University</p>
                </div> 
                <div class="overlay" style="cursor:pointer" data-href="{{ url('telu-dash/watch/1') }}">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="recent-work-wrap">
                <iframe class="img-responsive" src="https://www.youtube.com/embed/tbbZpqUeHcs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="recent-work-inner">
                    <p>Proses Bisnis Penetapan Biaya Pendidikan di Telkom University</p>
                </div> 
                <div class="overlay" style="cursor:pointer" data-href="{{ url('telu-dash/watch/1') }}">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="recent-work-wrap">
                <iframe class="img-responsive" src="https://www.youtube.com/embed/tbbZpqUeHcs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="recent-work-inner">
                    <p>Proses Bisnis Penetapan Biaya Pendidikan di Telkom University</p>
                </div> 
                <div class="overlay" style="cursor:pointer" data-href="{{ url('telu-dash/watch/1') }}">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="recent-work-wrap">
                <iframe class="img-responsive" src="https://www.youtube.com/embed/tbbZpqUeHcs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="recent-work-inner">
                    <p>Proses Bisnis Penetapan Biaya Pendidikan di Telkom University</p>
                </div> 
                <div class="overlay" style="cursor:pointer" data-href="{{ url('telu-dash/watch/1') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 
 $('body').addClass('dash-contents');
 $('html').addClass('dash-contents');

$('.recent-work-wrap').on('click','.overlay',function(e){
    e.preventDefault();
    var form = $(this).data('href');
    var url = form;
    console.log(url);
    if(form == "" || form == "-"){
        return false;
    }else{
        loadForm(url); 
    }
});
</script>