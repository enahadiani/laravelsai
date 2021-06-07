<style>
    .card-berita{
        border:none;
        box-shadow:none;
    }
    .bold{
        font-weight:bold;
    }
    .listing-desc{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }
    .listing-heading{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        height:50px !important;
    }
</style>
<link rel="stylesheet" href="{{ asset('asset_dore/css/main.css') }}">
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12">
            <nav class="navbar sticky-top navbar-light text-center" style="z-index:1 !important">
                <a class="navbar-brand ml-3" href="#"><h6>Berita</h6></a>
                <ul class="nav justify-content-center mx-auto" id="nav-kategori">
                    
                </ul>
            </nav>
            <!-- <a class="btn btn-outline-light" href="#" id="btn-filter" style="position: absolute;right: 15px;border:1px solid black;font-size:1rem;top:0"><i class="simple-icon-equalizer" style="transform-style: ;"></i> &nbsp;&nbsp; Filter</a> -->
        </div>
    </div>
    <div class="row mt-3" id="list-berita">
    </div>
</div>

<script src="{{ asset('asset_dore/js/vendor/jquery.autoellipsis.js') }}"></script>
<script>
 
 $('body').addClass('dash-contents');
 $('html').addClass('dash-contents');

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
var $watch_tipe = "";
var $watch_no = "";
function getBeritaList(kode=null){
    $.ajax({
        type:"GET",
        url:"{{ url('telu-dash/berita-list') }}",
        dataType:"JSON",
        data:{kode_kategori:kode},
        success: function(result){
            var html = "";
            $('#list-berita').html(html);
            if(result.status){
                if(result.data.length > 0){
                    for(var i=0; i < result.data.length; i++){
                        var line = result.data[i];
                        var url = ("{{ config('api.url') }}" == "http://localhost:8080/api/" ? "https://api.simkug.com/api/" : "{{ config('api.url') }}");

                        html+=`
                        <div class="col-12 col-lg-8 row-berita">
                            <p hidden class='no_bukti'>`+line.no_konten+`</p>
                            <div class="card flex-row listing-card-container p-2 card-berita">
                                <div class="w-40 position-relative">
                                    <a href="#">
                                        <img class="card-img-left" src="`+url+`ypt-auth/storage2/`+line.file_gambar+`" alt="Card image cap" style='border-radius:0'>
                                        <!--<span class="badge badge-pill badge-theme-1 position-absolute badge-top-left">NEW</span>-->
                                    </a>
                                </div>
                                <div class="w-60 d-flex align-items-center">
                                    <div class="card-body py-2 ">
                                        <p class='text-primary bold mb-0'>`+line.nama_kategori+`</p>
                                        <a href="#">
                                            <h6 class="mb-1 listing-heading ellipsis"><div style="margin: 0px; padding: 0px; border: 0px none;">`+line.judul+`</div></h6>
                                        </a>
                                        <p class='text-muted text-small'>By `+line.nama_buat+` - `+line.tanggal+`</p>
                                        <div class="listing-desc text-muted ellipsis" style="">`+line.keterangan+`</div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class='separator my-3'></div>
                        </div>
                        `;
                    }
                    $('#list-berita').html(html);
                    $('#list-berita').on('click','.row-berita',function(e){
                        e.preventDefault();
                        var kode = $(this).closest('div').find('p.no_bukti').html();
                        var url = "{{ url('telu-dash/berita-detail') }}/"+kode;
                        if(url == "" || url == "-"){
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
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
    
}

function getKategori(){
    $.ajax({
        type:"GET",
        url:"{{ url('telu-master/kategori-konten') }}",
        dataType:"JSON",
        success: function(result){
            var html = "";
            $('#nav-kategori').html(html);
            if(result.status){
                if(result.daftar.length > 0){
                    for(var i=0; i < result.daftar.length; i++){
                        var line = result.daftar[i];
                        html+=`
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-href='`+line.kode_ktg+`'>`+line.nama+`</a>
                        </li>
                        `;
                    }
                    $('#nav-kategori').html(html);
                   

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
                window.location="{{ url('/dash-telu/sesi-habis') }}";
            }else if(jqXHR.status == 405){
                var msg = "Route not valid. Page not found";
            }
            
        }
    });
    
}

getKategori();
getBeritaList();
$('#nav-kategori').on('click','.nav-link',function(e){
    e.preventDefault();
    console.log('click');
    var kode = $(this).data('href');
    getBeritaList(kode);
})

</script>