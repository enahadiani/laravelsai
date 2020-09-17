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

</style>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <h1>Video</h1>
            <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row" id="content-video">
        <div class="col-md-12 text-center">
            <iframe src='https://www.youtube.com/embed/tbbZpqUeHcs' style='width:80%; height:50%; min-height:280px; min-width:280px; max-width:560px;'></iframe>
        </div>
    </div>
    <br>
    <div class="row" id="keterangan">
        <div class="col-md-12 text-center">
            <a href="https://www.youtube.com/watch?v=tbbZpqUeHcs&feature=youtu.be" target="_blank"> https://www.youtube.com/watch?v=tbbZpqUeHcs&feature=youtu.be</a>
        </div>
    </div>
</div>