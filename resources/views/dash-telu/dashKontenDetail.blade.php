
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
    .row-dok{
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <a class="btn btn-outline-light" href="#" id="btn-back" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-arrow-left" style="transform-style: ;"></i> &nbsp;&nbsp; Back</a>
        </div>
    </div>
    @php 
    $url = ( config('api.url') == "http://localhost:8080/api/" ? "https://api.simkug.com/api/" : config('api.url'));
    @endphp
    <div class="row mt-5">
        <div class="col-12 col-md-12 col-xl-8 col-left">
            <div class="card mb-4">
                <div class="lightbox">
                    <a href="{{ $url.'ypt-auth/storage2/'.$data[0]['file_gambar'] }}" class="detail-a-img">
                        <img alt="detail" src="{{ $url.'ypt-auth/storage2/'.$data[0]['file_gambar'] }}" class="responsive border-0 card-img-top mb-3 detail-img" />
                    </a>
                </div>
                <div class="card-body detail-body">
                <h6>{{ $data[0]['judul']}}</h6>
                {!! $data[0]['keterangan'] !!}
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-xl-4 col-right">
        
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title">Dokumen</h6>
                    <div class="list-dok">
                        @for($i=0; $i < count($data2); $i++)
                        @if($data2[$i]['kode_jenis'] == "DK02")
                        <div class="d-flex flex-row align-items-center mb-3 row-dok" href='#' data-href="{{ url('telu-dash/watch-video').'/'.$data2[$i]['no_bukti'] }}" data-jenis="{{ $data2[$i]['kode_jenis'] }}" data-watch_id="{{ $url }}ypt-auth/storage2/{{ $data2[$i]['file_dok'] }}" data-watch_ket="{{ $data2[$i]['nama'] }}" data-watch_tipe="2" data-watch_no="{{ $data2[$i]['no_bukti'] }}">
                            <a class="d-block position-relative" style="height:40px;width:40px">
                                <i class="simple-icon-social-youtube large-icon initial-height"></i>
                            </a>
                            <div class="pl-3 pt-2 pr-2 pb-2">
                                <a href="#">
                                <p class="list-item-heading mb-1">{{ $data2[$i]['nama'] }}</p>
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="d-flex flex-row align-items-center mb-3 row-dok" href='#' data-href="{{ $url }}ypt-auth/storage2/{{ $data2[$i]['file_dok'] }}" data-jenis="{{ $data2[$i]['kode_jenis'] }}">
                            <a class="d-block position-relative" style="height:40px;width:40px">
                                <i class="simple-icon-doc large-icon initial-height"></i>
                            </a>
                            <div class="pl-3 pt-2 pr-2 pb-2">
                                <a href="#">
                                <p class="list-item-heading mb-1">{{ $data2[$i]['nama'] }}</p>
                                </a>
                            </div>
                        </div>
                        @endif
                        @endfor
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#btn-back').click(function(e){
        e.preventDefault();
        loadForm("{{ url('dash-telu/form/dashKonten') }}");
    })

    $('.list-dok').on('click','.row-dok',function(e){
        e.preventDefault();
        var form = $(this).data('href');
        var jenis = $(this).data('jenis');
        if(jenis == 'DK02'){
            $watch_id = $(this).data('watch_id');
            $watch_ket = $(this).data('watch_ket');
            $watch_tipe = $(this).data('watch_tipe');
            $watch_no = $(this).data('watch_no');
            loadForm(form);
        }else{
            var link = form;
            window.open(link, '_blank'); 
        }
    });
</script>