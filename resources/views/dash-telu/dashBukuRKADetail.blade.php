
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
    <div class="row mt-5" id="row-detail">
        <div class="col-12 col-md-12 col-xl-8 col-left">
            <div class="card mb-4">
                <div class="card-body detail-body">
                <h6>{{ $data[0]['kode_pp']}} - {{ $data[0]['nama_pp']}}</h6>
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
                        <div class="d-flex flex-row align-items-center mb-3 row-dok" href='#' data-href="{{ $data2[$i]['file_dok'] }}" data-jenis="{{ $data2[$i]['kode_jenis'] }}">
                            <a class="d-block position-relative" style="height:40px;width:40px">
                                <i class="simple-icon-doc large-icon initial-height"></i>
                            </a>
                            <div class="pl-3 pt-2 pr-2 pb-2">
                                <a href="#">
                                <p class="list-item-heading mb-1">{{ $data2[$i]['nama'] }}</p>
                                </a>
                            </div>
                        </div>
                        @endfor
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5" id="row-prev">
        <div class="row-prev-ket pr-2 pl-4 py-2 col-12">
            <div class="col-md-12">
                {!! $data[0]['keterangan'] !!}
            </div>
        </div>
        <div class="row-prev-pdf col-12"></div>
    </div>
</div>
<script>
    $('#row-prev').hide();
    $prev = 0;
    $('#btn-back').click(function(e){
        e.preventDefault();
        if($prev == 0){
            loadForm("{{ url('dash-telu/form/dashBukuRKA') }}");
        }else{
            $('#row-detail').show();
            $('#row-prev').hide();
            $('.row-prev-pdf').html('');
            $prev = 0;
        }
    })

    $('.list-dok').on('click','.row-dok',function(e){
        e.preventDefault();
        $('.row-prev-pdf').html('');
        var file_dok = $(this).data('href');
        var url = ("{{ config('api.url') }}" == "http://localhost:8080/api/" || "{{ config('api.url') }}" == "http://localhost:8080/lumenapi/public/api/" ? "https://api.simkug.com/api/" : "{{ config('api.url') }}" );
        $('.row-prev-pdf').html(`<div class='col-md-12'><embed src='`+url+`ypt-auth/storage2/`+file_dok+`' type="application/pdf" style="width:100%;height:calc(100vh - 200px)" />
        </div>`);
        $('#row-detail').hide();
        $('#row-prev').show();
        $prev = 1;
    });
</script>